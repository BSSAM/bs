<?php
    class PurchaseRequisitionsController extends AppController
    {
        public $helpers = array('Html','Form','Session');
        public $uses =array('Priority','Paymentterm','Quotation','Currency','Document','branch',
                            'Country','Additionalcharge','Service','CustomerInstrument','Customerspecialneed',
                            'Instrument','Brand','Customer','Device','Unit','Logactivity','InstrumentType','Title',
                            'Contactpersoninfo','CusSalesperson','Clientpo','branch','PurchaseRequisition','PreqDevice','PreqCustomerSpecialNeed');
        public function index()
        {
            /*******************************************************
             *  BS V1.0
             *  User Role Permission
             *  Controller : Quotations
             *  Permission : view 
            *******************************************************/
            $user_role = $this->userrole_permission();
            if($user_role['job_purchasereq']['view'] == 0){ 
                return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
            }

            $this->set('userrole_cus',$user_role['job_purchasereq']);
            /*
             * *****************************************************
             */
            //$this->Quotation->recursive = 1; 
            $PurchaseRequisition_lists = $this->PurchaseRequisition->find('all',array('conditions'=>array('PurchaseRequisition.is_deleted'=>'0'),'order' => array('PurchaseRequisition.id' => 'DESC')));
            $this->set('prequistion', $PurchaseRequisition_lists);
        }
        public function add()
        {
            /*******************************************************
             *  BS V1.0
             *  User Role Permission
             *  Controller : Quotation
             *  Permission : add 
             *  Description   :   add Quotation Details page
             *******************************************************/
            $user_role = $this->userrole_permission();
            if($user_role['job_purchasereq']['add'] == 0){ 
                return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
            }
            /*
             * *****************************************************
             */
            $dmt=$this->random('PurchasRequisition');
            $track_id=$this->random('track');
            $this->set('prequistionno', $dmt);
            $this->set('our_ref_no', $track_id);
            
            $priority=$this->Priority->find('list',array('fields'=>array('id','priority')));
            $payment=$this->Paymentterm->find('list',array('fields'=>array('id','pay')));
            $country=$this->Country->find('list',array('fields'=>array('id','country')));
            $instrument_types=$this->InstrumentType->find('list',array('conditions'=>array('InstrumentType.status'=>1,'is_deleted'=>0),'fields'=>array('id','purchase_requisition')));
           
            $additional=$this->Additionalcharge->find('list',array('fields'=>array('id','additionalcharge')));
            $service=$this->Service->find('list',array('fields'=>array('id','servicetype')));
            
            $branch =   $this->branch->find('first',array('conditions'=>array('branch.defaultbranch'=>1,'branch.status'=>1)));
            $this->set(compact('service','additional','instrument_types','country','priority','payment'));
            $title =   $this->Title->find('all');
            foreach($title as $title_name)
            {
                $titles[] = $title_name['Title']['title_name'];
            }
            $this->set('titles',$titles);
            if($this->request->is('post'))
            {
                
                $date = date('Y-m-d h:i:s a', time());
                $this->request->data['PurchaseRequisition']['created_by'] = $date;
                $customer_id=$this->request->data['PurchaseRequisition']['customer_id'];
                $this->request->data['PurchaseRequisition']['customername']=$this->request->data['customername'];
                $this->request->data['PurchaseRequisition']['branch_id']=$branch['branch']['id'];
                
                if($this->PurchaseRequisition->save($this->request->data['PurchaseRequisition']))
                {
                    $purchaserequisitions_id   =   $this->PurchaseRequisition->getLastInsertID();
                    $requistion_no  =   $this->request->data['PurchaseRequisition']['prequistionno'];
                    $device_node    =   $this->PreqDevice->find('all',array('conditions'=>array('PreqDevice.prequistionno'=>$requistion_no)));
                    //
                    if(!empty($device_node))
                    {  
                        $this->PreqDevice->updateAll(array('PreqDevice.customer_id'=>'"'.$customer_id.'"','PreqDevice.prequistion_id'=>$purchaserequisitions_id,'PreqDevice.status'=>1),array('PreqDevice.prequistionno'=>$requistion_no,'PreqDevice.status'=>1));
                    }
                    $this->request->data['PreqCustomerSpecialNeed']['prequistion_id']=$purchaserequisitions_id;
                    $this->PreqCustomerSpecialNeed->save($this->request->data['PreqCustomerSpecialNeed']); 
                    $this->PreqDevice->deleteAll(array('PreqDevice.prequistionno'=>'','PreqDevice.status'=>0));
                    /************
                    * Log Activities - Prequisition Approval
                    */
                    $this->request->data['Logactivity']['logname'] = 'Prequisition';
                    $this->request->data['Logactivity']['logactivity'] = 'Add Supervisor';
                    $this->request->data['Logactivity']['logid'] = $purchaserequisitions_id;
                    $this->request->data['Logactivity']['logno'] = $requistion_no;
                    $this->request->data['Logactivity']['user_id'] = $this->Session->read('sess_userid');
                    $this->request->data['Logactivity']['logapprove'] = 1;

                    $a = $this->Logactivity->save($this->request->data['Logactivity']);
                    
                    $this->Logactivity->create();
                    
                    
                    
                    /******************/

                    $this->Session->setFlash(__('PurchaseRequisition has been added Successfully'));
                    $this->redirect(array('action'=>'index'));
                }
               
            }
        }
       
        public function edit($id=NULL)
        {
               /*******************************************************
                *  BS V1.0
                *  User Role Permission
                *  Controller : Quotation
                *  Permission : Edit 
                *  Description   :   Edit Quotation Details page
                *******************************************************/
        $user_role = $this->userrole_permission();
        if($user_role['job_purchasereq']['edit'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
		 $this->set('userrole_cus',$user_role['job_purchasereq']);
        /*
         * *****************************************************
         */
            $purchase_requistion_list=$this->PurchaseRequisition->find('first',array('conditions'=>array('PurchaseRequisition.id'=>$id,'PurchaseRequisition.is_deleted'=>'0'),'recursive'=>2));
            //for Contact person info
           $this->set('pr_dat',$purchase_requistion_list);
            $customer_id    =   $purchase_requistion_list['Customer']['id'];
            $salesperson_list    =   $this->CusSalesperson->find('all',array('conditions'=>array('CusSalesperson.customer_id'=>$customer_id)));
            $salespeople         =   '';
            if(!empty($purchase_requistion_list['Clientpo']))
            {
                $po_list        =   '';
                foreach($purchase_requistion_list['Clientpo'] as $po)
                {
                    $po_list .=$po['clientpos_no'].',';
                }
                $this->set('po_list',$po_list);
            }
            else {
                $this->set('po_list','');
            }
            foreach($salesperson_list as $salesper)
            {
                $salespeople.=$salesper['Salesperson']['salesperson'].' , ';
            }
            $person_list    =   $this->Contactpersoninfo->find('list',array('conditions'=>array('Contactpersoninfo.customer_id'=>$customer_id),'fields'=>array('id','name')));
            $title =   $this->Title->find('all');
            foreach($title as $title_name)
            {
                $titles[] = $title_name['Title']['title_name'];
            }
            $this->set('titles',$titles);
            //pr($quotation_details);exit;
            $instrument_types=$this->InstrumentType->find('list',array('conditions'=>array('InstrumentType.status'=>1,'is_deleted'=>0),'fields'=>array('id','quotation')));
            $our_ref_no=$purchase_requistion_list['PurchaseRequisition']['track_id'];
            $priority=$this->Priority->find('list',array('fields'=>array('id','priority')));
            $payment=$this->Paymentterm->find('list',array('fields'=>array('id','pay')));
            $country=$this->Country->find('list',array('fields'=>array('id','country')));
            
            $additional=$this->Additionalcharge->find('list',array('fields'=>array('id','additionalcharge')));
            $service=$this->Service->find('list',array('fields'=>array('id','servicetype')));
            $services=$this->Service->find('list',array('fields'=>array('id','servicetype')));
            //pr($purchase_requistion_list);exit;
            $this->set(compact('purchase_requistion_list','instrument_types','person_list','our_ref_no','country','priority','payment','additional','service','quotations_list','salespeople'));
            if($this->request->is(array('post','put')))
            {
               
                //to update quotation po generate type
                $this->PurchaseRequisition->id=$id;
                if($this->PurchaseRequisition->save($this->request->data['PurchaseRequisition']))
                {
                    $customer_id=$purchase_requistion_list['PurchaseRequisition']['customer_id'];
                    $this->PreqCustomerSpecialNeed->id=$this->request->data['PreqCustomerSpecialNeed']['id'];
                    $this->PreqCustomerSpecialNeed->save($this->request->data['PreqCustomerSpecialNeed']);  
                    
                   
                    $this->Session->setFlash(__('PurchaseRequisition has been Updated Successfully'));
                    $this->redirect(array('action'=>'index'));
                }
                
            }
            else
            {
                $this->request->data= $purchase_requistion_list;
            }
        }
        public function delete($id=NULL)
        {
              /*******************************************************
                *  BS V1.0
                *  User Role Permission
                *  Controller : Quotation
                *  Permission : Delete 
                *  Description   :   Delete Quotation Details page
                *******************************************************/
               $user_role = $this->userrole_permission();
               if($user_role['job_quotation']['delete'] == 0){ 
                   return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
               }
                /*
                * *****************************************************
                */
            if($id!='')
            {
                if($this->PurchaseRequisition->updateAll(array('PurchaseRequisition.is_deleted'=>1),array('PurchaseRequisition.id'=>$id)))
                {
                    $this->Session->setFlash(__('The PurchaseRequisition has been deleted',h($id)));
                    return $this->redirect(array('controller'=>'PurchaseRequisitions','action'=>'index'));
                }
            }
            else
            {
                throw new MethodNotAllowedException();
            }
        }
        public function search()
        {
            $this->loadModel('Customer');
            $name =  $this->request->data['name'];
            $this->autoRender = false;
            $data = $this->Customer->find('all',array('conditions'=>array('Customertagname LIKE'=>'%'.$name.'%','Customer.is_deleted'=>0,'Customer.status'=>1,'Customer.customertype'=>'Supplier')));
            $c = count($data);
            if($c>0)
            {
                for($i = 0; $i<$c;$i++)
                { 
                    echo "<div class='customer_show instrument_drop_show' align='left' id='".$data[$i]['Customer']['id']."'>";
                    echo $data[$i]['Customer']['Customertagname'];
                    echo "<br>";
                    echo "</div>";
                }
            }
            else
            {
                    echo "<div class='preno_result instrument_drop_show' align='left'>";
                    echo "No Results Found";
                    echo "<br>";
                    echo "</div>";
            }
            
        }
        public function get_customer_value()
        {
            $this->autoRender = false;
            $this->loadModel('Customer');
            $customer_id =  $this->request->data['cust_id'];
            $customer_data = $this->Customer->find('first',array('conditions'=>array('Customer.id'=>$customer_id),'recursive'=>'2'));
           
            if(!empty($customer_data))
            {
                echo json_encode($customer_data) ;
            }
        }
        public function get_country_value()
        {
            $this->autoRender = false;
            $country_id =  $this->request->data['country_id'];
            $currency_data = $this->Currency->find('first',array('conditions'=>array('Currency.country_id'=>$country_id),'recursive'=>'2'));
            if(!empty($currency_data))
            {
                echo $currency_data['Currency']['exchangerate'];
            }
        }
        public function get_gst_value()
        {
            $this->autoRender = false;
            $gst_id =  $this->request->data['gst_id'];
            switch($gst_id)
            {
                case 'Standard':
                    echo "7.00";
                    break;
                case 'Zero':
                    echo "0.00";
                    break;
            }
        }
        public function instrument_search()
        {
            $this->autoRender = false;
            $instrument =  $this->request->data['instrument'];
            $customer_id =  $this->request->data['customer_id'];
            $instrument_details=$this->CustomerInstrument->find('all',array('conditions'=>array('CustomerInstrument.customer_id'=>$customer_id),'contain'=>array('Instrument'=>array('conditions'=>array('Instrument.name LIKE'=>'%'.$instrument.'%')))));
            $c = count($instrument_details);
            if($c>0&&$instrument_details[0]['Instrument']['name']!='')
            {
                for($i = 0; $i<$c;$i++)
                { 
                    echo "<div class='instrument_id' align='left' id='".$instrument_details[$i]['Instrument']['id']."'>";
                    echo $instrument_details[$i]['Instrument']['name'];
                    echo "<br>";
                    echo "</div>";
                }
            }
            if($instrument_details[0]['Instrument']['name']=='')
            {
                echo "<div  align='left'>";
                echo 'No Results Found';
                echo "<br>";
                echo "</div>"; 
            }
            
        }
        public function get_brand_value()
        {
            $this->autoRender = false;
            $instrument_id =  $this->request->data['instrument_id'];
            $customer_id =  $this->request->data['customer_id'];
            $brand_details=$this->CustomerInstrument->find('first',array('conditions'=>array('CustomerInstrument.instrument_id'=>$instrument_id,'CustomerInstrument.customer_id'=>$customer_id),'recursive'=>'3'));
            
            if(!empty($brand_details))
            {
                echo json_encode($brand_details);
            }
           
        }
        public function add_instrument()
        {
            $this->autoRender = false;
            $this->loadModel('PreqDevice');
            $this->request->data['PreqDevice']['prequistionno'] =   $this->request->data['prequistion_id'];
            $this->request->data['PreqDevice']['instrument_name']      =   $this->request->data['instrument_name'];
            $this->request->data['PreqDevice']['brand_name']      =   $this->request->data['instrument_brand'];
            $this->request->data['PreqDevice']['quantity']      =   $this->request->data['instrument_quantity'];
            $this->request->data['PreqDevice']['model_no']      =   $this->request->data['instrument_modelno'];
            $this->request->data['PreqDevice']['range']         =   $this->request->data['instrument_range'];
            $this->request->data['PreqDevice']['validity']      =   $this->request->data['instrument_validity'];
            $this->request->data['PreqDevice']['device_discount']      =   $this->request->data['instrument_discount'];
            $this->request->data['PreqDevice']['department_name'] =   $this->request->data['instrument_department'];
            $this->request->data['PreqDevice']['unit_price']    =   $this->request->data['instrument_unitprice'];
            $this->request->data['PreqDevice']['account_service']=  $this->request->data['instrument_account'];
            $this->request->data['PreqDevice']['total']         =   $this->request->data['instrument_total'];
            $this->request->data['PreqDevice']['title']         =   $this->request->data['instrument_title'];
            $this->request->data['PreqDevice']['status']        =   1;
            if($this->PreqDevice->save($this->request->data))
            {
                $device_id=$this->PreqDevice->getLastInsertID();
                echo $device_id;
            }
     
        }
        public function delete_instrument()
        {
            $this->autoRender=false;
            $device_id= $this->request->data['device_id'];
            if($this->PreqDevice->updateAll(array('PreqDevice.is_deleted'=>1),array('PreqDevice.id'=>$device_id)))
            {
                echo "deleted";
            }
        }
        public function edit_instrument()
        {
           
            $this->autoRender=false;
            $device_id= $this->request->data['edit_device_id'];
            $edit_device_details    =   $this->PreqDevice->find('first',array('conditions'=>array('PreqDevice.id'=>$device_id)));
            if(!empty($edit_device_details ))
            {
                echo json_encode($edit_device_details);
            }
        }
        public function update_instrument()
        {
            $this->autoRender = false;
            $this->PreqDevice->id                               =   $this->request->data['device_id'];
            $this->request->data['PreqDevice']['instrument_name']      =   $this->request->data['instrument_name'];
            $this->request->data['PreqDevice']['brand_name']      =   $this->request->data['instrument_brand'];
            $this->request->data['PreqDevice']['quantity']      =   $this->request->data['instrument_quantity'];
            $this->request->data['PreqDevice']['model_no']      =   $this->request->data['instrument_modelno'];
            $this->request->data['PreqDevice']['range']         =   $this->request->data['instrument_range'];
            $this->request->data['PreqDevice']['validity']      =   $this->request->data['instrument_validity'];
            $this->request->data['PreqDevice']['device_discount']=   $this->request->data['instrument_discount'];
            $this->request->data['PreqDevice']['department_name'] =   $this->request->data['instrument_department'];
            $this->request->data['PreqDevice']['unit_price']    =   $this->request->data['instrument_unitprice'];
            $this->request->data['PreqDevice']['account_service']=  $this->request->data['instrument_account'];
            $this->request->data['PreqDevice']['total']         =   $this->request->data['instrument_total'];
            $this->request->data['PreqDevice']['title']         =   $this->request->data['instrument_title'];
            $this->request->data['PreqDevice']['status']        =   1;
            if($this->PreqDevice->save($this->request->data))
            {
               echo "Updated";
                
            }
     
        }
        public function approve_superviser()
        {
            $this->autoRender=false;
            $id =  $this->request->data['id'];
            if($this->PurchaseRequisition->updateAll(array('PurchaseRequisition.is_superviser_approved'=>1),array('PurchaseRequisition.id'=>$id)))
            {
            $user_id = $this->Session->read('sess_userid');
            $this->Logactivity->updateAll(array('Logactivity.logapprove'=>2,'Logactivity.approved_by'=>$user_id),array('Logactivity.logid'=>$id,'Logactivity.logactivity'=>'Add Supervisor'));
            $purchase_requistion_list=$this->PurchaseRequisition->find('first',array('conditions'=>array('PurchaseRequisition.id'=>$id,'PurchaseRequisition.is_deleted'=>'0'),'recursive'=>2));
            $this->request->data['Logactivity']['logname'] = 'Prequisition';
            $this->request->data['Logactivity']['logactivity'] = 'Add Manager';
            $this->request->data['Logactivity']['logid'] = $id;
            $this->request->data['Logactivity']['logno'] = $purchase_requistion_list['PurchaseRequisition']['prequistionno'];
            $this->request->data['Logactivity']['user_id'] = $this->Session->read('sess_userid');
            $this->request->data['Logactivity']['logapprove'] = 1;

            $b = $this->Logactivity->save($this->request->data['Logactivity']);
            echo "success";
            }
            else{
                echo "failure";
            }
            
        }
        public function approve_manager()
        {
            $this->autoRender=false;
            $id =  $this->request->data['id'];
            $this->PurchaseRequisition->updateAll(array('PurchaseRequisition.is_manager_approved'=>1),array('PurchaseRequisition.id'=>$id,'PurchaseRequisition.is_superviser_approved'=>1));
            $user_id = $this->Session->read('sess_userid');
            $this->Logactivity->updateAll(array('Logactivity.logapprove'=>2,'Logactivity.approved_by'=>$user_id),array('Logactivity.logid'=>$id,'Logactivity.logactivity'=>'Add Manager'));
        }
        public function get_contact_email()
        {
            $this->autoRender   =   false;
            $id =  $this->request->data['cid'];
            $email  =   $this->Contactpersoninfo->find('first',array('conditions'=>array('Contactpersoninfo.status'=>'1','Contactpersoninfo.id'=>$id),'fields'=>array('email')));
            if(!empty($email))
            {
                echo $email['Contactpersoninfo']['email'];
            }
            else {
                echo "";
            }
           
        }
        public function attachment($quotation_id= NULL,$doc_name=NULL)
        {
            $file_name    = explode('_',$doc_name);unset($file_name[0]); 
            $document_file_name   =   implode($file_name,'-') ;
            $this->response->file(APP.'webroot'.DS.'files'.DS.'Quotations'.DS.$quotation_id.DS.$doc_name,
			array('download'=> true, 'name'=>$document_file_name));
            return $this->response;  
	}
        public function get_document_files()
        {
           
            $this->autoRender   =   false;
            $id =  $this->request->data['id'];
            $documents  =   $this->Document->find('all',array('conditions'=>array('Document.quotationno'=>$id,'Document.status'=>0)));
            if(!empty($documents))
            {
                echo json_encode($documents);
            }
           
        }
        public function file_upload($id=NULL)
        {
            $this->autoRender=false;
            if($this->request->is('post'))
            {
                $quotation_no  =   $_POST['quotation_no'] ;  
                $quotation_files   =   $_FILES['file'];
                $document_array    = array();
                if(!empty($quotation_files))
                {
                    if(!is_dir(APP.'webroot'.DS.'files'.DS.'Quotations'.DS.$quotation_no)):
                        mkdir(APP.'webroot'.DS.'files'.DS.'Quotations'.DS.$quotation_no);
                    endif;
                    $document_name  =   time().'_'.$quotation_files['name'];
                    $type = $quotation_files['type'];
                    $size = $quotation_files['size'];
                    $tmpPath = $quotation_files['tmp_name'];
                    $originalPath = APP.'webroot'.DS.'files'.DS.'Quotations'.DS.$quotation_no.DS.$document_name;
                    if(move_uploaded_file($tmpPath,$originalPath))
                    {
                        $document_array['Document']['document_name']= $document_name;
                        $document_array['Document']['quotationno']= $quotation_no;
                        $document_array['Document']['document_size']= $size;
                        $document_array['Document']['upload_type']= 'Individual';
                        $document_array['Document']['document_type']= $quotation_files['type'];
                        $this->Document->create();
                        $this->Document->save($document_array);
                    }
                }
              }
        }
        public function delete_document($id=NULL)
        {
            $this->autoRender   =   false;
            $document_id    =   $this->request->data['document_id'];
            $files = scandir(APP.'webroot'.DS.'files'.DS.'Quotations'.DS.$id); 
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
                 $this->Document->updateAll(array('Document.status'=>0),array('Document.quotationno'=>$id,'Document.document_name LIKE'=>'%'.$document_id.'%'));
            }
        }
        
        public function calendar()
        {
            $this->autoRender = false;
            $cal = $this->Quotation->find('all', array('conditions' => array('Quotation.status' => 1, 'Quotation.is_approved' => 1), 'group' => 'reg_date', 'fields' => array('count(Quotation.reg_date) as title', 'reg_date as start'), 'recursive' => '-1'));

            $event_array = array();
            foreach ($cal as $cal_list => $v) {

                $event_array[$cal_list]['title'] = $v[0]['title'];
                $event_array[$cal_list]['start'] = $v['Quotation']['start'];
            }
            return json_encode($event_array);

        }
        
          function pdf($id = NULL) 
        {
        
            $this->autoRender = false;
            $purchase_requistion_list=$this->PurchaseRequisition->find('first',array('conditions'=>array('PurchaseRequisition.id'=>$id,'PurchaseRequisition.is_deleted'=>'0'),'recursive'=>2));
            $data = $this->branch->find('first',array('conditions'=>array('branch.id'=>$purchase_requistion_list['PurchaseRequisition']['branch_id'])));
            //$data_cu = currency_id
              $data1 = $this->Currency->findByCountryId($data['branch']['currency_id']);
                    ////return $data['Branch']['branchname'];
            //$reqpurchaseorder_details=$this->Reqpurchaseorder->find('first',array('conditions'=>array('Reqpurchaseorder.id'=>$id),'recursive'=>'2'));
            //pr($reqpurchaseorder_details);exit;
            //$salesorder_details=$this->Salesorder->find('first',array('conditions'=>array('Salesorder.id'=>$reqpurchaseorder_details['Reqpurchaseorder']['salesorder_id']),'recursive'=>'2','contain'=>array('Description'=>array('conditions'=>array('Description.sales_calllocation'=>'subcontract','Description.sales_sub_con_id'=>$id),'Instrument','Brand','Range','Department'),'Customer'=>array('Contactpersoninfo','Paymentterm'))));
			//pr($salesorder_details);exit;
            //$quotation_data = $this->Quotation->find('first',array('conditions'=>array('Quotation.quotationno'=>$salesorder_details['Salesorder']['quotationno'],'Quotation.status'=>1),'recursive'=>'3'));
//            $salesorder_data = $this->Salesorder->find('first', array('conditions' => array('Salesorder.id' => $id),'recursive'=>3));
//            $quotation_data = $this->Quotation->find('first', array('conditions' => array('Quotation.id' => $salesorder_data['Salesorder']['quotation_id']),'recursive'=>2));
            //pr($quotation_data);exit;
            $file_type = 'pdf';
            $filename = $purchase_requistion_list['PurchaseRequisition']['prequistionno'];
      
      
 $html = '<html>
<head>
<meta charset="utf-8" />
<title>'.$purchase_requistion_list['PurchaseRequisition']['prequistionno'].'</title>
<link href="http://fonts.googleapis.com/css?family=Oswald" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Oswald:300,700" rel="stylesheet" type="text/css">
<style>
table td { font-size:9px; line-height:11px; }
.table_format table { }
.table_format td { text-align:center; padding:5px; }
@page {
margin: 180px 50px;
}
#header { position: fixed; left: 0px; top: -180px; right: 0px; height: 350px; }
#footer { position: fixed; left: 0px; bottom: -300px; right: 0px; height: 330px; }
#footer .page:after { content: counter(page); }
</style>
</head>';
 
            $title =   $this->Title->find('all');
            foreach($title as $title_name)
            {
                $titles[] = $title_name['Title']['title_name'];
            }
            //pr($salesorder_data);
            //foreach ($salesorder_data as $salesorder_data_list):
                $customername = $purchase_requistion_list['PurchaseRequisition']['customername'];
                $billing_address = $purchase_requistion_list['PurchaseRequisition']['address'];
               // $postalcode = $salesorder_details['Customer']['postalcode'];
                $contactperson = $purchase_requistion_list['PurchaseRequisition']['attn'];
                $phone = $purchase_requistion_list['PurchaseRequisition']['phone'];
                $fax = $purchase_requistion_list['PurchaseRequisition']['fax'];
                $email = $purchase_requistion_list['PurchaseRequisition']['email'];
                //$our_ref_no = $salesorder_data_list['Quotation']['ref_no'];
                $ref_no = $purchase_requistion_list['PurchaseRequisition']['ref_no'];
                $reg_date = $purchase_requistion_list['PurchaseRequisition']['reg_date'];
                 $payment_term = $purchase_requistion_list['PurchaseRequisition']['paymentterm_name'];
                //$salesorderno = $salesorder_details['Salesorder']['salesorderno'];
                //$quotationno = $salesorder_details['Salesorder']['quotationno'];
                //pr($purchase_requistion_list);exit;
                 $a = array();
                $b = array();
                $c = array();
                $d = array();
                $e = array();
                foreach($purchase_requistion_list['PreqDevice'] as $device):
                    $device_name[] = $device;
                    $a[] = $device['title1_val'];
                    $b[] = $device['title2_val'];
                    $c[] = $device['title3_val'];
                    $d[] = $device['title4_val'];
                    $e[] = $device['title5_val'];
                endforeach;
                $a = array_filter($a);
                $b = array_filter($b);
                $c = array_filter($c);
                $d = array_filter($d);
                $e = array_filter($e);
                
                
                //$ins_type = $purchase_requistion_list['PurchaseRequisition']['instrument_type_id'];
                $ins_type = $purchase_requistion_list['InstrumentType']['purchase_requisition'];
                

$html .=
'<body style="font-family:Oswald, sans-serif;font-size:9px;padding:0;margin:0;font-weight: 300; color:#444 !important;">
<div id="header">
     <table width="700px" style="margin-top:20px;">
          <tr>
               <td width="335" ><div style="float:left; "><img src="img/logo.jpg" width="450" height="80" alt="" /></div></td>
               <td><div style="float:left;text-align:right;float:right;line-height:7px !important;font-size:8px !important;">
                     '.$data['branch']['address'].'<br/>
                     Tel - '.$data['branch']['phone'].'<br/>
                     Fax - '.$data['branch']['fax'].'<br/>
                     '.$data['branch']['website'].'
                    </div>
					</td>
          <tr>
     </table>
     <table width="98%" height="56">
          <tr>
               <td width="198" style="padding:0 10px;"><div style="display:inline-block;font-size:18px;font-weight:bold; font-style:italic;color:#00005b !important">PR Purchase Order</div></td>
               <td width="300" style="padding:0 10px;"><div style="display:inline-block;background:#00005b;color:#fff !important;padding:5px;font-size:13px;text-align:right;">GST REG NO. '.$data['branch']['gstregno'].' / COMPANY REG NO. '.$data['branch']['companyregno'].'</div></td>
          </tr>
     </table>
     <table width="98%" cellpadding="1" cellspacing="1"  style="width:100%;margin-top:20px;">
          <tr>
               <td width="47%" style="border:1px solid #000;padding:5px;"><table width="100%" cellpadding="0" cellspacing="0">
                         <tr>
                              <td width="128" colspan="3" height="10px" style="font-size:9px !important;">'.$customername.'</td>
                         </tr>
                         <tr>
                              <td colspan="3" height="10px" style="font-size:9px !important;">'.$billing_address.'</td>
                         </tr>
                         <tr>
                              <td style="font-size:9px !important;"></td>
                         </tr>
						 <tr>
						 <td><br /></td>
						 <td><br /></td>
						 <td><br /></td>
						 </tr>
						 
                         <tr  style="padding-top:30px;width:50px;" width="50">
                              <td>ATTN </td>
                            
                              <td>: &nbsp;&nbsp;&nbsp; '.$contactperson.'</td>
							  <td></td>
                         </tr>
                         <tr>
                              <td>TEL </td>
                              
                              <td>: &nbsp;&nbsp;&nbsp;'.$phone.'</td>
							  <td></td>
                         </tr>
                         <tr>
                              <td>FAX </td>
                            
                              <td>: &nbsp;&nbsp;&nbsp;'.$fax.'</td>
							  <td></td>
                         </tr>
                         <tr>
                              <td>EMAIL </td>
                             
                              <td>: &nbsp;&nbsp;&nbsp;'.$email.'</td>
							  <td></td>
                         </tr>
                    </table></td>
               <td width="3%"></td>
               <td width="45%" style="border:1px solid #000;width:50%;padding:0"><table width="230" cellpadding="0" cellspacing="0">
                         <tr>
                              <td  width="260" colspan="3" style="padding:5px 0;"><div align="center" style="font-size:28px;border-bottom:1px solid #000;width:100%;padding:5px 0;font-weight:bolder;  position:relative;top:-8px;">'.$purchase_requistion_list['PurchaseRequisition']['prequistionno'].'</div></td>
                         </tr>
                         <tr>
						     
                              <td style="padding-left:5px;width:50px;" width="50">OUR REF NO </td>
                              
                              <td style="padding-right:10px;">: &nbsp;&nbsp;&nbsp;'.$ref_no.'</td>
							  <td></td>
						
                         </tr>
                         <tr>
                              <td style="padding-left:5px;">YOUR REF NO </td>
                              
                              <td colspan="2" style="padding-right:10px;">: &nbsp;&nbsp;&nbsp;'.$ref_no.'</td>
							   
							 
                         </tr>
                         <tr>
                              <td style="padding-left:5px;"> DATE </td>
                             
                              <td style="padding-right:10px;">: &nbsp;&nbsp;&nbsp;'.$reg_date.'</td>
							   <td></td>
							 
                         </tr>
                         <tr>
                              <td style="padding-left:5px;">PAYMENT TERMS </td>
                             
                              <td style="padding-right:10px;">: &nbsp;&nbsp;&nbsp;'.$payment_term.'</td>
							   <td></td>
							  
                         </tr>
                    </table></td>
               
          </tr>
     </table>
<div style="padding-top:10px;">'.$ins_type.' :</div>

</div></div>';
$html .='<div id="footer">
     <div style="width:100%;">
          <table cellpadding="1" cellspacing="1"  style="width:100%;">
          <tr>
               <td style="padding:5px;width:50%;border:1px solid #000;"><table cellpadding="0" cellspacing="0">
                         <tr>
                              <td>ITEMS RECEIVED IN GOOD ORDER AND CONDITION:</td>
                         </tr>
                         
                         <tr>
                              <td style="padding-top:30px;"><div style="border-top:1px solid #000;width:100%;">COMPANYS STAMP,SIGNATURE AND DATE</div></td>
                         </tr>
                         
                    </table></td>
               <td></td>
               <td></td>
               <td></td>
               <td></td>
               <td style="border:1px dashed #000;padding:5px;width:60%;"><table width="270" cellpadding="0" cellspacing="0">
                         <tr>
                              <td width="214" style="text-align:center;padding-bottom:50px;">FOR BS TECH PTE LTD</td>
                         </tr>
                         <tr>
                              <td style="font-size:9px !important;color:#777 !important; text-align:center;"> Authorized Signature</td>
                         </tr>
                    </table></td>
          </tr>
     </table>
     

<div style="background:#00005b;line-height:7px !important;width:100%;color:#fff !important;font-size:8px;margin-top:20px;text-align:center;">E. & O . E</div>

       </div> 
       <table width="100%">
               <tr>
                    <td  style="width:80%;">'.date('Y-m-d H:i:s').'</td><td  style="width:20%;">Page: <span class="page"></span></td>
                        </tr></table>
</div>';
$subtotal = 0;
$subtotal1 = 0;
$sub = 0;
$distotal = 0;
$html .= '<div id="content" style="">'; 
                foreach($device_name as $k=>$device):
                    if($k == 0)
                    {
                        $html .= '<table cellpadding="0" cellspacing="0"  style="width:100%;margin-top:150px;"><tr>
               <td style="border-bottom:1px solid #000;text-transform:uppercase;padding:3px;font-size:11px !important;color: #000 !important;">Item</td>
               <td style="border-bottom:1px solid #000;text-transform:uppercase;padding:3px;font-size:11px !important;color: #000 !important;">Qty</td>
               <td style="border-bottom:1px solid #000;text-transform:uppercase;padding:3px;font-size:11px !important;color: #000 !important;width:20%;">Instrument</td>
               <td style="border-bottom:1px solid #000;text-transform:uppercase;padding:3px;font-size:11px !important;color: #000 !important;">Brand</td>
               <td style="border-bottom:1px solid #000;text-transform:uppercase;padding:3px;font-size:11px !important;color: #000 !important;">Model</td>
               <td style="border-bottom:1px solid #000;text-transform:uppercase;padding:3px;font-size:11px !important;color: #000 !important;">Range</td>';
$count1 = 0;
for($i=0;$i<=4;$i++):
    if(isset($titles[$i])):
        if(($i==2 && count($c))||($i==3 && count($d))||($i==4 && count($e)||($i==0)||($i==1)))
        {
            $html .='<td style="border-bottom:1px solid #000;padding:3px;font-size:11px !important;color: #000 !important;">';
            $html .= $titles[$i];
            $html .='</td>';
        }
    endif;
    $count1 = $count1+1;
    $currency_symbol = $data1['Currency']['symbol'];
    $currency_code = $data1['Currency']['currencycode'];
endfor;

$html .= '<td style="border-bottom:1px solid #666;text-transform:uppercase;padding:3px;font-size:11px !important;color: #000 !important;">Discount(%)</td>';
$html .= '<td style="border-bottom:1px solid #000;padding:3px;font-size:11px !important;color: #000 !important;">Total Price '.$currency_symbol.'('.$currency_code.')</td>';

$html .= '</tr>';
                    }
                    elseif($k%5 == 0)
                    {
                        $html .= '<table cellpadding="0" cellspacing="0"  style="width:100%;page-break-before: always;margin-top:230px;"><tr>
               <td style="border-bottom:1px solid #000;text-transform:uppercase;padding:3px;font-size:11px !important;color: #000 !important;">Item</td>
               <td style="border-bottom:1px solid #000;text-transform:uppercase;padding:3px;font-size:11px !important;color: #000 !important;">Qty</td>
               <td style="border-bottom:1px solid #000;text-transform:uppercase;padding:3px;font-size:11px !important;color: #000 !important;width:20%;">Instrument</td>
               <td style="border-bottom:1px solid #000;text-transform:uppercase;padding:3px;font-size:11px !important;color: #000 !important;">Brand</td>
               <td style="border-bottom:1px solid #000;text-transform:uppercase;padding:3px;font-size:11px !important;color: #000 !important;">Model</td>
               <td style="border-bottom:1px solid #000;text-transform:uppercase;padding:3px;font-size:11px !important;color: #000 !important;">Range</td>';
$count1 = 0;
for($i=0;$i<=4;$i++):
    if(isset($titles[$i])):
         if(($i==2 && count($c))||($i==3 && count($d))||($i==4 && count($e)||($i==0)||($i==1)))
        {
            $html .='<td style="border-bottom:1px solid #000;padding:3px;font-size:11px !important;color: #000 !important;">';
            $html .= $titles[$i];
            $html .='</td>';
        }
    endif;
    $count1 = $count1+1;
    $currency_symbol = $data1['Currency']['symbol'];
    $currency_code = $data1['Currency']['currencycode'];
endfor;

$html .= '<td style="border-bottom:1px solid #666;text-transform:uppercase;padding:3px;font-size:11px !important;color: #000 !important;">Discount(%)</td>';
$html .= '<td style="border-bottom:1px solid #000;padding:3px;font-size:11px !important;color: #000 !important;">Total Price '.$currency_symbol.'('.$currency_code.')</td>';

$html .= '</tr>';
                    }
                      
                      
                    //foreach($device_name as $device):
                    $html .= '
                    <tr>
                        <td style="padding:3px;">'.($k+1).'</td>
                        <td style="padding:3px;">1</td>
                        <td style="padding:3px;width:20%;">'.$device['instrument_name'].'</td>
                        <td style="padding:3px;">'.$device['brand_name'].'</td>
                        <td style="padding:3px;">'.$device['model_no'].'</td>
                        <td style="padding:3px;">'.$device['range'].'</td>';
                        for($i=0;$i<=4;$i++):
                        if(isset($titles[$i])):
                            if(($i==2 && count($c))||($i==3 && count($d))||($i==4 && count($e)||($i==0)||($i==1)))
                            {
                                $html .='<td style="padding:3px;">'.$device['title'.($i+1).'_val'].'</td>';
                            }
                        endif;
                        endfor;
                        
                    $html .='<td style="padding:3px;">'.$device['device_discount'].'</td>';
                    $html .='<td style="padding:3px;">'.number_format($device['total'], 2, '.', '').'</td></tr>';
                    $sub = $sub + ($device['unit_price'] - $device['total']);
                    $subtotal = $subtotal + $device['total']; 
                
                $subtotal1 = $subtotal1 + $device['unit_price']; 
                    
                 if($k+1 == count($device_name)){  
                        if(!count($c))
                        {
                            $count1 = $count1 - 1;
                        }
                        if(!count($d))
                        {
                            $count1 = $count1 - 1;
                        }
                        if(!count($e))
                        {
                            $count1 = $count1 - 1;
                        }
                if($purchase_requistion_list['PreqCustomerSpecialNeed']['gst'] == 7)
                {
                $gst = $subtotal * 0.07;
                }
                else {
                    $gst = 0.00;
                }
                
                $total_due = ($gst + $subtotal + $purchase_requistion_list['PreqCustomerSpecialNeed']['additional_service_value']);
               
                $html .= '<tr>
                         <td colspan="'.($count1+7).'" style="text-align:right;padding:10px;font-size:11px !important;border-top:1px  dashed #666;border-left:1px  dashed #666;">SUBTOTAL '.$currency_symbol.'('.$currency_code.')</td>
                         <td style="padding:3px 10px;font-size:11px !important;color: #000 !important;border-top:1px  dashed #666;border-right:1px  dashed #666;">'.number_format($subtotal, 2, '.', '').'</td>
                    </tr>
                    <tr>
                         <td colspan="'.($count1+7).'" style="text-align:right;padding:10px;font-size:11px !important;border-left:1px  dashed #666;">GST ( '.$purchase_requistion_list['PreqCustomerSpecialNeed']['gst'].'% )</td>
                         <td style="padding:10px;font-size:11px !important;color: #000 !important;border-right:1px  dashed #666;">'.number_format($gst, 2, '.', '').'</td>
                    </tr>
                    <tr>
                         <td colspan="'.($count1+7).'" style="text-align:right;padding:10px;font-size:11px !important;border-left:1px  dashed #666;">DISCOUNT</td>
                         <td style="padding:10px;font-size:11px !important;color: #000 !important;border-right:1px  dashed #666;">'.number_format($sub, 2, '.', '').'</td>
                    </tr>
                    <tr>
                         <td colspan="'.($count1+7).'" style="text-align:right;padding:10px;font-size:11px !important;border-left:1px  dashed #666;">OTHER CHARGES '.$currency_symbol.'('.$currency_code.')</td>
                         <td style="padding:10px;font-size:11px !important;color: #000 !important;border-right:1px  dashed #666;">'.number_format($purchase_requistion_list['PreqCustomerSpecialNeed']['additional_service_value'], 2, '.', '').'</td>
                    </tr>
                    <tr>
                         <td colspan="'.($count1+7).'" style="text-align:right;padding:10px;font-size:11px !important;color: #000 !important;border-bottom:1px  dashed #666;border-left:1px  dashed #666;">TOTAL DUE '.$currency_symbol.'('.$currency_code.')</td>
                         <td style="padding:10px;font-size:11px !important;color: #000 !important;border-bottom:1px  dashed #666;border-right:1px  dashed #666;">'.number_format($total_due, 2, '.', '').'</td>
                    </tr>
                    <tr>
                    <td colspan="4" style="padding:10px;"></td>
                    <td colspan="8" style="padding:10px;"></td>
                    </tr>
                     <tr>
               <td colspan="4" style="border:1px  dashed #666;text-align:right;padding:10px;color: #000 !important;font-size:11px !important;">SPECIAL REQUIREMENTS :</td>
               <td  colspan="8" style="border:1px dashed #666; text-align:left;padding: 10px;font-size:11px !important;">'.$purchase_requistion_list['PreqCustomerSpecialNeed']['remarks'].'</td>
          </tr>';
         }
                if($k%5 == 4 || $k+1 == count($device_name)){
                $html .='</table>';
                }
                endforeach;
$html .= '</div>'; 
              

                //pr($html);exit;
        $this->export_report_all_format($file_type, $filename, $html);
    }
    
    function export_report_all_format($file_type, $filename, $html)
    {    
        
        if($file_type == 'pdf')
        {
    
            App::import('Vendor', 'dompdf', array('file' => 'dompdf' . DS . 'dompdf_config.inc.php'));
            $this->dompdf = new DOMPDF();        
            $papersize = "a4";
            $orientation = 'portrait';        
            $this->dompdf->load_html($html);
            $this->dompdf->set_paper($papersize, $orientation);        
            $this->dompdf->render();
            $this->dompdf->stream("PRPURCHASEREQ-".$filename.".pdf");
            echo $this->dompdf->output();
           // $output = $this->dompdf->output();
            //file_put_contents($filename.'.pdf', $output);
            die();
            
        
        }    
        else if($file_type == 'xls')
        {    
            $file = $filename.".xls";
            header('Content-Type: text/html');
            header("Content-type: application/x-msexcel"); //tried adding  charset='utf-8' into header
            header("Content-Disposition: attachment; filename=$file");
            echo $html;
            
        }
        else if($file_type == 'doc')
        {                
            $file = $filename.".doc";
            header("Content-type: application/vnd.ms-word");
            header("Content-Disposition: attachment;Filename=$file");
            echo $html;
            
        }

        
    }
        
        
        
}
