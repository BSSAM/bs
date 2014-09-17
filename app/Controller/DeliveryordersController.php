<?php
/*
 * Document     :   DeliveryordersController.php
 * Controller   :   Delivery Order
 * Model        :   Deliveryorder 
 * Created By   :   M.Iyappan Samsys
 */
    class DeliveryordersController extends AppController
    {
        public $helpers = array('Html','Form','Session');
        public $uses =array('Priority','Paymentterm','Quotation','Currency','DoDocument',
                            'Country','Additionalcharge','Service','CustomerInstrument','Customerspecialneed','Invoice',
                            'Instrument','Brand','Customer','Device','Salesorder','Description','Deliveryorder','Datalog','Logactivity','Contactpersoninfo');
        public function index()
        {
            //$this->Quotation->recursive = 1; 
            $delivery_data = $this->Deliveryorder->find('all',array('conditions'=>array('Deliveryorder.is_deleted'=>0),'order' => array('Deliveryorder.id' => 'DESC')));
            $this->set('deliveryorders', $delivery_data);
        }
        public function add()
        {
            $dmt = $this->random('deliveryorder');
            $this->set('deliveryorderno', $dmt);
            $payment=$this->Paymentterm->find('list',array('fields'=>array('id','pay')));
            $this->set('payment',$payment);
            $services=$this->Service->find('list',array('fields'=>array('id','servicetype')));
            $this->set('service',$services);
            //is_deliveryorder_created
            //$this->request->data['Deliveryorder']['delivery_order_no']=$dmt;
        
            
            if($this->request->is('post'))
            {
               
                if($this->Deliveryorder->save($this->request->data['Deliveryorder']))
                {
                   
                    $del_last_id    =   $this->Deliveryorder->getLastInsertID();
                    $this->request->data['Deliveryorder']['is_deliveryorder_created']=1;
                    $document_node    =   $this->DoDocument->find('all',array('conditions'=>array('DoDocument.deliveryorder_no'=>$this->request->data['Deliveryorder']['delivery_order_no'])));
                   
                    if(!empty($document_node))
                    {  
                        $this->DoDocument->updateAll(array('DoDocument.deliveryorder_id'=>$del_last_id,'DoDocument.customer_id'=>'"'.$this->request->data['Deliveryorder']['customer_id'].'"'),array('DoDocument.deliveryorder_no'=>$this->request->data['Deliveryorder']['delivery_order_no'],'DoDocument.status'=>1));
                    }
                    /******************* Data Log*/
                        $this->request->data['Logactivity']['logname']   =   'Deliveryorder';
                        $this->request->data['Logactivity']['logactivity']   =   'Add DeliveryOrder';
                        $this->request->data['Logactivity']['logid']   =   $dmt;
                        $this->request->data['Logactivity']['loguser'] = $this->Session->read('sess_userid');
                        $this->request->data['Logactivity']['logapprove'] = 1;
                        $a = $this->Logactivity->save($this->request->data['Logactivity']);
                        
                            
                /******************
                    * Data Log Activity
                    */
                    $this->request->data['Datalog']['logname'] = 'Deliveryorder';
                    $this->request->data['Datalog']['logactivity'] = 'Add';
                    $this->request->data['Datalog']['logid'] = $dmt;
                    $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                    
                    $a = $this->Datalog->save($this->request->data['Datalog']);
                    
                /******************/    
                    //pr($a);exit;
                    $this->Session->setFlash(__('Delivery Order has been Added Successfully '));
                    $this->redirect(array('action'=>'index'));
                }
            }
        }
        public function edit($id=NULL)
        {
            $service=$this->Service->find('list',array('fields'=>array('id','servicetype')));
            $deliveryorder=$this->Deliveryorder->find('first',array('conditions'=>array('Deliveryorder.id'=>$id),'recursive'=>2));
            //pr($deliveryorder);
            $quo_no = $deliveryorder['Salesorder']['Quotation']['quotationno'];
            $quo=$this->Quotation->find('first',array('conditions'=>array('Quotation.quotationno'=>$quo_no),'recursive'=>2));
            $posat = $quo['Quotation']['is_pocount_satisfied'];
            //pr($deliveryorder);exit;
            //pr($deliveryorder['Customer']['Contactpersoninfo']);
            //$this->request->data['Contactpersoninfo
            if($deliveryorder['Deliveryorder']['po_generate_type']=='Automatic' && $deliveryorder['Customer']['acknowledgement_type_id']==1):
                $this->set('approval','automaticdo');
                $this->Session->setFlash(__($quo_no.' - Cannot Approve Deliveryorder without PO Number(Manual) '));
                $this->redirect(array('controller'=>'Deliveryorders','action'=>'index'));
            elseif($deliveryorder['Deliveryorder']['po_generate_type']=='Manual' && $deliveryorder['Customer']['acknowledgement_type_id']==1 && $posat !=1 ):
                $this->set('approval','manualdo');
                $this->Session->setFlash(__($quo_no.' - Cannot Approve Deliveryorder without Equal PO Count(Manual) '));
                $this->redirect(array('controller'=>'Deliveryorders','action'=>'index'));
             else:
                 $this->set('approval','manualdocount');
            endif;
            $this->set(compact('service','deliveryorder'));
            
            //$con = $this->Quotation->find('first',array('conditions'=>array('Quotation.quotationno'=>$this->request->data['Salesorder']['Quotation']['quotationno'],'Quotation.is_approved'=>1,'Quotation.status'=>1)));
            //pr($con);            
            
            $instrument_type = $deliveryorder['InstrumentType']['deliveryorder'];
            $contact = $deliveryorder['Customer']['Contactpersoninfo'];
            foreach($contact as $contactlist)
            {
                $var = $contactlist['name'];
            }
                        //echo $instrument_type; exit;
                         $this->set('instrument_type',$instrument_type);
                          $this->set('contact',$var);
            
            if($this->request->is(array('post','put')))
            {
                
                $this->Deliveryorder->id=$id;
                if($this->Deliveryorder->save($this->request->data['Deliveryorder']))
                {
                    /******************
                    * Data Log Activity
                    */
                    $this->request->data['Datalog']['logname'] = 'Deliveryorder';
                    $this->request->data['Datalog']['logactivity'] = 'Edit';
                    $this->request->data['Datalog']['logid'] = $id;
                    $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                    
                    $a = $this->Datalog->save($this->request->data['Datalog']);
                    
                    /******************/   
                    $this->Session->setFlash(__($deliveryorder['Deliveryorder']['delivery_order_no'].' has been Updated Succefully'));
                    $this->redirect(array('controller'=>'Deliveryorders','action'=>'index'));
                }
            }
            else
            {
                $this->request->data=$deliveryorder;
            }
        }
        public function delete($id=NULL)
        {
            if($id!='')
            {
                if($this->Deliveryorder->updateAll(array('Deliveryorder.is_deleted'=>1),array('Deliveryorder.id'=>$id)));
                {
                     /******************
                    * Data Log Activity
                    */
                    $this->request->data['Datalog']['logname'] = 'Deliveryorder';
                    $this->request->data['Datalog']['logactivity'] = 'Delete';
                    $this->request->data['Datalog']['logid'] = $id;
                    $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                    
                    $a = $this->Datalog->save($this->request->data['Datalog']);
                    
                    /******************/   
                    $this->Session->setFlash(__('The Delivery order has been deleted',h($id)));
                    return $this->redirect(array('controller'=>'Deliveryorders','action'=>'index'));
                }
            }
            else
            {
                throw new MethodNotAllowedException();
            }
        }
        public function approve()
        {
            $this->autoRender=false;
            $id =  $this->request->data['id'];
            //pr($id);exit;
            $deliveryorder=$this->Deliveryorder->find('first',array('conditions'=>array('Deliveryorder.delivery_order_no'=>$id),'recursive'=>2));
            $deliver_customer = $deliveryorder['Deliveryorder']['customer_id'];
            $ack_type = $deliveryorder['Customer']['acknowledgement_type_id'];
            if($ack_type == 1)
            {
                //pr($deliveryorder);exit;
                $updated    =   $this->Deliveryorder->updateAll(array('Deliveryorder.is_approved'=>1,'Deliveryorder.is_approved_date'=>date('d-m-y')),array('Deliveryorder.delivery_order_no'=>$id,'Deliveryorder.po_generate_type'=>'Manual','Deliveryorder.is_poapproved'=>1,'Customer.acknowledgement_type_id'=>1));
                //return $updated;
                if($updated==1)
                {
                    //pr($id1);exit;
                    $user_id = $this->Session->read('sess_userid');
                    $this->Logactivity->updateAll(array('Logactivity.logapprove'=>2,'Logactivity.approved_by'=>$user_id),array('Logactivity.logid'=>$deliveryorder['Deliveryorder']['id'],'Logactivity.logactivity'=>'Add Delivery order'));
                    $this->request->data['Invoice']['deliveryorder_id']=$id;
                    $this->request->data['Invoice']['customer_purchaseorder_no']='';
                    $this->request->data['Invoice']['is_approved']=0;
                    $this->Invoice->save($this->request->data);
                }
                else
                {
                    $this->Session->setFlash(__('Purchase Order Needs to be Given(Manually) to get Approval'));
                    $text = "Purchase Order Needs to be Given(Manually) to get Approval";
                    return $text;
                    
    //                $this->redirect(array('controller'=>'Deliveryorders','action'=>'index'));
                }
            }
            else
            {
                $updated    =   $this->Deliveryorder->updateAll(array('Deliveryorder.is_approved'=>1,'Deliveryorder.is_approved_date'=>date('d-m-y')),array('Deliveryorder.delivery_order_no'=>$id,'Customer.acknowledgement_type_id'=>2));
                if($updated==1)
                {
                //pr($id1);exit;
                $user_id = $this->Session->read('sess_userid');
                $this->Logactivity->updateAll(array('Logactivity.logapprove'=>2,'Logactivity.approved_by'=>$user_id),array('Logactivity.logid'=>$deliveryorder['Deliveryorder']['id'],'Logactivity.logactivity'=>'Add Delivery order'));
                $this->request->data['Invoice']['deliveryorder_id']=$id;
                $this->request->data['Invoice']['customer_purchaseorder_no']='';
                $this->request->data['Invoice']['is_approved']=0;
                $this->Invoice->save($this->request->data);
                }
            }
            
        }
        /*
         * Function Name:salesorder_id_search
         * Description   :   for salesorder Search
         * Created on    :   29/05/2014 1.51PM 
         * BS V1.0 
         */
        public function salesorder_id_search()
        {
            $this->loadModel('Salesorder');
            $sales_id =  $this->request->data['sale_id'];
            $this->autoRender = false;
            $data = $this->Salesorder->find('all',array('conditions'=>array('salesorderno LIKE'=>'%'.$sales_id.'%','Salesorder.is_approved'=>1,'Salesorder.is_deliveryorder_created'=>0)));
            $c = count($data);
            if(!empty($c))
            {
                for($i = 0; $i<$c;$i++)
                {    
                    echo "<div class='delivery_show' align='left' id='".$data[$i]['Salesorder']['id']."'>";
                    echo $data[$i]['Salesorder']['salesorderno'];
                    echo "<br>";
                    echo "</div>";
                }   
            }
            else
            {
                echo "<div class='delivery_no_result' align='left'>";
                echo "No Results Found";
                echo "<br>";
                echo "</div>";
            }
        }
        public function get_sales_details()
        {
            $this->loadModel('Salesorder');
            $sales_id =  $this->request->data['sales_id'];
            $this->autoRender = false;
            $sales_data = $this->Salesorder->find('first',array('conditions'=>array('salesorderno'=>$sales_id,'Salesorder.is_approved'=>'1'),'recursive'=>'2'));
            $contact_list   =   $this->Contactpersoninfo->find('first',array('conditions'=>array('Contactpersoninfo.customer_id'=>$sales_data['Customer']['id'],'Contactpersoninfo.status'=>1),'fields'=>array('id','name')));
            //$this->set(compact('contact_list'));
            
            $sales_data= array_merge($sales_data, $contact_list);
            //pr($sales_data1);
            if(!empty($sales_data))
            {
                echo json_encode($sales_data);
                //echo json_encode($contact_list);
            }
            else
            {
                echo "failure";
            }
            
        }
        public function get_delivery_address() 
        {
        $this->autoRender = false;
        $this->loadModel('Address');
        $address = $this->request->data['address'];
        $customer_id = $this->request->data['customer_id'];
        $customer_address_data = $this->Address->find('first', array('conditions' => array('Address.customer_id' => $customer_id,'Address.type' => $address,'Address.status'=>1)));
        if (!empty($customer_address_data)) {
           echo $customer_address_data['Address']['address'];
        }
        }
         public function file_upload($id=NULL)
        {
            $this->autoRender=false;
            if($this->request->is('post'))
            {
                $deliveryorder_no  =   $_POST['deliveryorder_no'] ;  
                $deliveryorder_files   =   $_FILES['file'];
                $document_array    = array();
                if(!empty($deliveryorder_files))
                {
                    if(!is_dir(APP.'webroot'.DS.'files'.DS.'Deliveryorders'.DS.$deliveryorder_no)):
                            mkdir(APP.'webroot'.DS.'files'.DS.'Deliveryorders'.DS.$deliveryorder_no);
                    endif;
                    $document_name  =   time().'_'.$deliveryorder_files['name'];
                    $type = $deliveryorder_files['type'];
                    $size = $deliveryorder_files['size'];
                    $tmpPath = $deliveryorder_files['tmp_name'];
                    $originalPath = APP.'webroot'.DS.'files'.DS.'Deliveryorders'.DS.$deliveryorder_no.DS.$document_name;
                    if(move_uploaded_file($tmpPath,$originalPath))
                    {
                        $document_array['DoDocument']['document_name']= $document_name;
                        $document_array['DoDocument']['deliveryorder_no']= $deliveryorder_no;
                        $document_array['DoDocument']['document_size']= $size;
                        $document_array['DoDocument']['upload_type']= 'Individual';
                        $document_array['DoDocument']['document_type']= $deliveryorder_files['type'];
                        $this->DoDocument->create();
                        $this->DoDocument->save($document_array);
                    }
                }
              }
        }
        public function delete_document($id=NULL)
        {
            $this->autoRender   =   false;
            $document_id    =   $this->request->data['document_id'];
            $files = scandir(APP.'webroot'.DS.'files'.DS.'Deliveryorders'.DS.$id); 
//            if(in_array($document_id,$files))
//            {
//                echo "yes";exit;
//                foreach($files as $file=>$v)
//                {
//                    unlink(APP.'webroot'.DS.'files'.DS.'Quotations'.DS.$id.DS.$v);
//                }
//            }
            if($document_id!='')
            {
                 $this->DoDocument->updateAll(array('DoDocument.status'=>0),array('DoDocument.deliveryorder_no'=>$id,'DoDocument.document_name LIKE'=>'%'.$document_id.'%'));
            }
        }
         public function attachment($deliveryorder_id= NULL,$doc_name=NULL)
        {
            $file_name    = explode('_',$doc_name);unset($file_name[0]); 
            $document_file_name   =   implode($file_name,'-') ;
            $this->response->file(APP.'webroot'.DS.'files'.DS.'Deliveryorders'.DS.$deliveryorder_id.DS.$doc_name,
			array('download'=> true, 'name'=>$document_file_name));
            return $this->response;  
	}
        public function calendar()
        {
            $this->autoRender = false;
            $cal = $this->Deliveryorder->find('all', array('conditions' => array('Deliveryorder.status' => 1, 'Deliveryorder.is_approved' => 1), 'group' => 'delivery_order_date', 'fields' => array('count(Deliveryorder.delivery_order_date) as title', 'delivery_order_date as start'), 'recursive' => '-1'));

            $event_array = array();
            foreach ($cal as $cal_list => $v) {

                $event_array[$cal_list]['title'] = $v[0]['title'];
                $event_array[$cal_list]['start'] = $v['Deliveryorder']['start'];
            }
            return json_encode($event_array);

        }
        
       
}
