<?php
/*
 * Document     :   DeliveryordersController.php
 * Controller   :   Delivery Order
 * Model        :   Deliveryorder 
 * Created By   :   M.Iyappan Samsys
 */
    class DeliveryordersController extends AppController
    {
        public $helpers = array('Html','Form','Session','xls','Number');
        public $uses =array('Priority','Paymentterm','Quotation','Currency','DoDocument','PrepareInvoice','Random',
                            'Country','Additionalcharge','Service','CustomerInstrument','Customerspecialneed','Invoice','DelDescription',
                            'Instrument','Brand','Customer','Device','Salesorder','Description','Deliveryorder','Datalog','Logactivity','Contactpersoninfo','Title');
        public function index($id=NULL)
        {
            /*******************************************************
            *  BS V1.0
            *  User Role Permission
            *  Controller : Salesorder
            *  Permission : view 
            *******************************************************/
            $user_role = $this->userrole_permission();
            if($user_role['job_deliveryorder']['view'] == 0){ 
               return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
            }
            if(empty($id)):
                $this->set('deleted_val',$id=0);
            endif;
            $this->set('userrole_cus',$user_role['job_deliveryorder']);
            /*
            * *****************************************************
            */
                        
            if($id == '3'):
                $delivery_data = $this->Deliveryorder->find('all',array('conditions'=>array('Deliveryorder.is_deleted'=>1),'order' => array('Deliveryorder.id' => 'DESC')));
                $this->set('deleted_val',$id);
            elseif($id == '2'):
                $delivery_data = $this->Deliveryorder->find('all',array('conditions'=>array('Deliveryorder.is_deleted'=>0,'Deliveryorder.is_approved'=>0),'order' => array('Deliveryorder.id' => 'DESC')));
                $this->set('deleted_val',$id);
            elseif($id == '1'):
                $delivery_data = $this->Deliveryorder->find('all',array('conditions'=>array('Deliveryorder.is_deleted'=>0,'Deliveryorder.is_approved'=>1),'order' => array('Deliveryorder.id' => 'DESC')));
                $this->set('deleted_val',$id);
            else:
                $delivery_data = $this->Deliveryorder->find('all',array('conditions'=>array('Deliveryorder.is_deleted'=>0),'order' => array('Deliveryorder.id' => 'DESC')));
                $this->set('deleted_val',$id);
            endif;
            //$log = $this->Deliveryorder->getDataSource()->getLog(false, false);
            //debug($log);
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
                //pr($this->request->data['Deliveryorder']);
                $delivery_before = $this->Salesorder->find('first',array('conditions'=>array('Salesorder.is_approved_lab'=>0,'Salesorder.is_approved'=>1,'Salesorder.salesorderno'=>$this->request->data['Deliveryorder']['salesorder_id']),'group' => array('Salesorder.salesorderno'),'contain'=>array('Customer','branch','Description')));
                $delivery_before_quo = $this->Quotation->find('first',array('conditions'=>array('Quotation.quotationno'=>$delivery_before['Salesorder']['quotationno']),'contain'=>array('Customer','branch','Device')));
                $ack_type = $delivery_before['Customer']['acknowledgement_type_id'];
                $del_type = $delivery_before['Customer']['deliveryordertype_id'];
                $inv_type = $delivery_before['Customer']['invoice_type_id'];
                //pr($delivery_before_quo);
                //pr($delivery_before['Salesorder']);
 //               pr($this->request->data['Deliveryorder']);
                //exit;
                 //$this->Description->updateAll(array('Description.is_deliveryorder_created'=>1),array('Quotation.id'=>$delivery_before_quo['Quotation']['id']));
                //pr($delivery_before_quo);exit;
                $new_array = array();

                $new_array['customer_id'] = $delivery_before['Salesorder']['customer_id'];
                $new_array['branch_id'] = $delivery_before['Salesorder']['branch_id'];
                $new_array['delivery_address'] = $this->request->data['Deliveryorder']['customer_address'];
                $new_array['customer_address'] = $this->request->data['Deliveryorder']['customer_address'];
                $new_array['due_amount'] = $delivery_before_quo['Quotation']['due_amount'];
                $new_array['attn'] = $this->request->data['Deliveryorder']['attn'];
                $new_array['track_id'] = $delivery_before_quo['Quotation']['track_id'];
                $new_array['phone'] = $this->request->data['Deliveryorder']['phone'];
                $new_array['fax'] = $this->request->data['Deliveryorder']['fax'];
                $new_array['email'] = $this->request->data['Deliveryorder']['email'];
                $new_array['delivery_order_no'] = $dmt;
                $new_array['salesorder_id'] = $delivery_before['Salesorder']['id'];
                $new_array['quotationno'] = $delivery_before['Salesorder']['quotationno'];
                $new_array['delivery_order_date'] = $this->request->data['Deliveryorder']['delivery_order_date'];
                $new_array['our_reference_no'] = $delivery_before['Salesorder']['track_id'];
                $new_array['po_reference_no'] = $this->request->data['Deliveryorder']['po_reference_no'];
                $new_array['ref_no'] = $delivery_before_quo['Quotation']['ref_no'];
                $new_array['ref_count'] = $delivery_before_quo['Quotation']['ref_count'];
                $new_array['remarks'] = $this->request->data['Deliveryorder']['remarks'];
                $new_array['service_id'] = $this->request->data['Deliveryorder']['service_id'];
                $new_array['is_approved'] = 0;
                $new_array['instrument_type_id'] = $delivery_before_quo['Quotation']['instrument_type_id'];
                $new_array['status'] = 1;
                $new_array['is_invoice_created'] = 0;
                $new_array['is_invoice_approved'] = 0;
                $new_array['po_generate_type'] = $delivery_before_quo['Quotation']['po_generate_type'];
                $new_array['is_assignpo'] = $delivery_before_quo['Quotation']['is_assign_po'];
                $new_array['is_poapproved'] = $delivery_before_quo['Quotation']['is_poapproved'];
                $new_array['po_approval_date'] = $delivery_before_quo['Quotation']['po_approval_date'];
                $new_array['is_pocount_satisfied'] = $delivery_before_quo['Quotation']['is_pocount_satisfied'];
                $new_array['is_deleted'] = 0;
                $new_array['job_finished'] = 0;
                $new_array['is_jobcompleted'] = 0;
                //pr($new_array);exit;
                $this->Deliveryorder->create();
                if($this->Deliveryorder->save($new_array))
                {
                   
                    $del_last_id    =   $this->Deliveryorder->getLastInsertID();
                    $this->Random->updateAll(array('Random.deliveryorder'=>'"'.$dmt.'"'),array('Random.id'=>1));  
                    $this->Salesorder->updateAll(array('Salesorder.is_deliveryorder_created'=>1),array('Salesorder.salesorderno'=>$this->request->data['Deliveryorder']['salesorder_id']));
                    $this->Quotation->updateAll(array('Quotation.is_deliveryorder_created'=>1),array('Quotation.quotationno'=>$delivery_before['Salesorder']['quotationno']));
                    $this->Description->updateAll(array('Description.is_deliveryorder_created'=>1),array('Description.salesorder_id'=>$this->request->data['Deliveryorder']['salesorder_id'],'Description.checking'=>1));
                    foreach($delivery_before['Description'] as $desc):
                        if($desc['checking'] == 1):
                            $this->request->data['DelDescription']['deliveryorder_id']          =   $del_last_id;
                            $this->request->data['DelDescription']['salesorder_id']             =   $desc['id'];
                            $this->request->data['DelDescription']['order_by']                  =   $desc['order_by'];
                            $this->request->data['DelDescription']['quotation_id']              =   $desc['quotation_id'];
                            $this->request->data['DelDescription']['quotationno']               =   $desc['quotationno'];
                            $this->request->data['DelDescription']['customer_id']               =   $desc['customer_id'];
                            $this->request->data['DelDescription']['delivery_quantity']         =   $desc['sales_quantity'];
                            $this->request->data['DelDescription']['instrument_id']             =   $desc['instrument_id'];
                            $this->request->data['DelDescription']['model_no']                  =   $desc['model_no'];
                            $this->request->data['DelDescription']['brand_id']                  =   $desc['brand_id'];
                            $this->request->data['DelDescription']['delivery_range']            =   $desc['sales_range'];
                            $this->request->data['DelDescription']['delivery_calllocation']     =   $desc['sales_calllocation'];
                            $this->request->data['DelDescription']['delivery_calltype']         =   $desc['sales_calltype'];
                            $this->request->data['DelDescription']['delivery_validity']         =   $desc['sales_validity'];
                            $this->request->data['DelDescription']['delivery_unitprice']        =   $desc['sales_unitprice'];
                            $this->request->data['DelDescription']['delivery_discount']         =   $desc['sales_discount'];
                            $this->request->data['DelDescription']['department_id']             =   $desc['department_id'];
                            $this->request->data['DelDescription']['delivery_accountservice']   =   $desc['sales_accountservice'];
                            $this->request->data['DelDescription']['delivery_titles']           =   $desc['sales_titles'];
                            $this->request->data['DelDescription']['delivery_total']            =   $desc['sales_total'];
                            $this->request->data['DelDescription']['title1_val']                =   $desc['title1_val'];
                            $this->request->data['DelDescription']['title2_val']                =   $desc['title2_val'];
                            $this->request->data['DelDescription']['title3_val']                =   $desc['title3_val'];
                            $this->request->data['DelDescription']['title4_val']                =   $desc['title4_val'];
                            $this->request->data['DelDescription']['title5_val']                =   $desc['title5_val'];
                            $this->request->data['DelDescription']['title6_val']                =   $desc['title6_val'];
                            $this->request->data['DelDescription']['title7_val']                =   $desc['title7_val'];
                            $this->request->data['DelDescription']['title8_val']                =   $desc['title8_val'];
                            $this->DelDescription->create();
                            $this->DelDescription->save($this->request->data['DelDescription']);
                            $this->Description->updateAll(array('Description.del_id'=>$del_last_id),array('Description.id'=>$desc['id']));
                            //$this->Description->updateAll(array('Description.del_id'=>$del_last_id),array('salesorder_id'=>$this->request->data['Deliveryorder']['salesorder_id'],'Description.checking'=>1));
                        endif;
                    endforeach;
                    $this->request->data['Deliveryorder']['is_deliveryorder_created']=1;
                    $document_node    =   $this->DoDocument->find('all',array('conditions'=>array('DoDocument.deliveryorder_no'=>$this->request->data['Deliveryorder']['delivery_order_no'])));
                   
                    if(!empty($document_node))
                    {  
                        $this->DoDocument->updateAll(array('DoDocument.deliveryorder_id'=>$del_last_id,'DoDocument.customer_id'=>'"'.$this->request->data['Deliveryorder']['customer_id'].'"'),array('DoDocument.deliveryorder_no'=>$this->request->data['Deliveryorder']['delivery_order_no'],'DoDocument.status'=>1));
                    }
                    /******************* Data Log*/
                        $this->request->data['Logactivity']['logname']   =   'Deliveryorder';
                        $this->request->data['Logactivity']['logactivity']   =   'Add Delivery Order';
                        $this->request->data['Logactivity']['logid']   =   $del_last_id;
                        $this->request->data['Logactivity']['logno'] = $dmt;
                        $this->request->data['Logactivity']['user_id'] = $this->Session->read('sess_userid');
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
                    
                    if($ack_type==1 && $del_type==2)
                    {
                    if($inv_type == 3)
                    {
                        $this->request->data['Logactivity']['logname'] = 'ClientPO';
                        $this->request->data['Logactivity']['logactivity'] = 'Add';
                        $this->request->data['Logactivity']['logid'] = $this->request->data['Deliveryorder']['salesorder_id'];
                        $this->request->data['Logactivity']['logno'] = $this->request->data['Deliveryorder']['salesorder_id'];
                        $this->request->data['Logactivity']['user_id'] = $this->Session->read('sess_userid');
                        $this->request->data['Logactivity']['logapprove'] = 1;
                        $this->Logactivity->create();
                        $this->Logactivity->save($this->request->data['Logactivity']);
                    }
                    if($inv_type == 1)
                    {
                        $this->request->data['Logactivity']['logname'] = 'ClientPO';
                        $this->request->data['Logactivity']['logactivity'] = 'Add';
                        $this->request->data['Logactivity']['logid'] = $delivery_before_quo['Quotation']['ref_no'];
                        $this->request->data['Logactivity']['logno'] = $delivery_before_quo['Quotation']['ref_no'];
                        $this->request->data['Logactivity']['user_id'] = $this->Session->read('sess_userid');
                        $this->request->data['Logactivity']['logapprove'] = 1;
                        $this->Logactivity->create();
                        $this->Logactivity->save($this->request->data['Logactivity']);
                    }
                    }
                /******************/ 
                    /******************/ 
//                        $quotation_for_log = $this->Quotation->find('first',array('conditions'=>array('Quotation.quotationno'=>$delivery_before_quo['Quotation']['quotationno'])));
//                        $deliveryorder_type = $quotation_for_log['Customer']['acknowledgement_type_id'];
//                        if($deliveryorder_type == 1):
//                        
//                            /******************
//                            * Data Log - Client PO
//                            */
//                            $this->request->data['Logactivity']['logname'] = 'ClientPO';
//                            $this->request->data['Logactivity']['logactivity'] = 'Add';
//                            $this->request->data['Logactivity']['logid'] = $delivery_before_quo['Quotation']['quotationno'];
//                            $this->request->data['Logactivity']['user_id'] = $this->Session->read('sess_userid');
//                            $this->request->data['Logactivity']['logapprove'] = 1;
//                            $this->Logactivity->create();
//                            $this->Logactivity->save($this->request->data['Logactivity']);
//
//                            $this->request->data['Datalog']['logname'] = 'ClientPO';
//                            $this->request->data['Datalog']['logactivity'] = 'Add';
//                            $this->request->data['Datalog']['logid'] = $delivery_before_quo['Quotation']['quotationno'];
//                            $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
//                            $this->Datalog->create();
//                            $this->Datalog->save($this->request->data['Datalog']);
//
//                            /******************/ 
//                        endif;
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
            $contact_name  =   $this->Contactpersoninfo->find('list',array('conditions'=>array('Contactpersoninfo.status'=>'1','Contactpersoninfo.customer_id'=>$deliveryorder['Deliveryorder']['customer_id']),'fields'=>array('id','name')));
            //pr($contact_name);exit;
            ///////////// Delivery Address List //////////////////
            ////////////////////////////////////////////////////////////// Here//////////////////////////////////////
            //pr($deliveryorder['Deliveryorder']['customer_address']);exit;
            //if($deliveryorder['Deliveryorder']['customer_address']==''):
                $address_list = $deliveryorder['Customer']['Address'];
                $count_del_addr = 0;
                foreach($address_list as $address_delivery):
                    if($address_delivery['type'] == 'delivery' && $address_delivery['status'] == 1 && $address_delivery['is_deleted'] == 0):
                        $count_del_addr = $count_del_addr + 1;
                    endif;
                endforeach;
                $this->set('count_del_addr',$count_del_addr);
                $this->set('address_register',$address_register='');
                $this->set('val_address',$deliveraddress='');
                if($count_del_addr != 0):
                    for($i=1;$i<=$count_del_addr;$i++):
                        $deliveraddress[] = "delivery".$i;
                    endfor;
                    $this->set('val_address',$deliveraddress);
                else:
                    foreach($address_list as $address_delivery):
                        if($address_delivery['type'] == 'registered' && $address_delivery['status'] == 1 && $address_delivery['is_deleted'] == 0):
                            $address_register = $address_delivery['address'];
                        endif;
                    endforeach;
                    $this->set('address_register',$address_register);
                endif;
            //endif;
           
            //pr($deliveraddress);exit;
            
            //----------------------------------------------------
            
            $quo_no = $deliveryorder['Salesorder']['Quotation']['quotationno'];
            $quo=$this->Quotation->find('first',array('conditions'=>array('Quotation.quotationno'=>$quo_no),'recursive'=>2));
            $posat = $quo['Quotation']['is_poapproved'];
            $instrument_type = $quo['InstrumentType']['deliveryorder'];
            //pr($instrument_type);exit;
            $this->set('instrument_type',$instrument_type);
            $title =   $this->Title->find('all');
            foreach($title as $title_name)
            {
                $titles[] = $title_name['Title']['title_name'];
            }
            $this->set('titles',$titles);
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
            
            //pr($deliveryorder);exit;
            $this->set(compact('service','deliveryorder','contact_name'));
            
            //$con = $this->Quotation->find('first',array('conditions'=>array('Quotation.quotationno'=>$this->request->data['Salesorder']['Quotation']['quotationno'],'Quotation.is_approved'=>1,'Quotation.status'=>1)));
            //pr($con);            
            
            //$instrument_type = $deliveryorder['InstrumentType']['deliveryorder'];
            $contact = $deliveryorder['Customer']['Contactpersoninfo'];
            foreach($contact as $contactlist)
            {
                $var = $contactlist['name'];
            }
                        //echo $instrument_type; exit;
                         //$this->set('instrument_type',$instrument_type);
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
            
            $deliveryorder=$this->Deliveryorder->find('first',array('conditions'=>array('Deliveryorder.delivery_order_no'=>$id),'recursive'=>2));
            $deliver_customer = $deliveryorder['Deliveryorder']['customer_id'];
            $deliver_quotation = $deliveryorder['Deliveryorder']['quotationno'];
            $deliver_salesorder = $deliveryorder['Deliveryorder']['salesorder_id'];
            //pr($deliver_salesorder);
            $deliver_ref_no = $deliveryorder['Deliveryorder']['ref_no'];
            //$deliver_ref_no = $deliveryorder['Deliveryorder']['ref_no'];
            $customer=$this->Customer->find('first',array('conditions'=>array('Customer.id'=>$deliver_customer),'recursive'=>2));
            $ack_type = $deliveryorder['Customer']['acknowledgement_type_id'];
            $inv_type = $deliveryorder['Customer']['invoice_type_id'];
            
            /////// PO Before DO ////////////
            
            if($ack_type == 1)
            {
                if($inv_type == 1)
                {
                    // Deliveryorder Approve
                    
                    $this->Deliveryorder->updateAll(array('Deliveryorder.is_approved'=>1,'Deliveryorder.is_approved_date'=>date('Y-m-d')),array('Deliveryorder.delivery_order_no'=>$id,'Deliveryorder.po_generate_type'=>'Manual','Deliveryorder.is_poapproved'=>1,'Customer.acknowledgement_type_id'=>1));
                    $user_id = $this->Session->read('sess_userid');
                    $this->Logactivity->updateAll(array('Logactivity.logapprove'=>2,'Logactivity.approved_by'=>$user_id),array('Logactivity.logid'=>$deliveryorder['Deliveryorder']['id'],'Logactivity.logactivity'=>'Add Delivery order'));
                    $this->request->data['Datalog']['logname'] = 'Deliveryorder';
                    $this->request->data['Datalog']['logactivity'] = 'Approve';
                    $this->request->data['Datalog']['logid'] = $deliveryorder['Deliveryorder']['id'];
                    $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                    $this->Datalog->create();
                    $this->Datalog->save($this->request->data['Datalog']);
                    
                    $data_quo = $this->Quotation->find('all',array('conditions'=>array('Quotation.quotationno'=>$deliver_quotation,'Quotation.is_deleted'=>0,'Quotation.is_approved'=>1),'recursive'=>3));
                    //pr($data_quo);
                    $quotation_instrument_count = 0;
                    foreach($data_quo as $quo_data):
                        
                        $quotation_no[] = $quo_data['Quotation']['quotationno']; 
                        foreach($quo_data['Device'] as $instrument_count):
                            if($instrument_count['is_deleted'] == 0 && $instrument_count['status'] == 1):
                                $quotation_instrument_count = $quotation_instrument_count + 1;
                            endif;
                        endforeach;
                       // $count_quo[] = $quotation_instrument_count;    
                    endforeach;
                    // Quotation Delivery Approval Check for Updating 
                    
                    $data_quo_del = $this->Deliveryorder->find('all',array('conditions'=>array('Deliveryorder.quotationno'=>$deliver_quotation,'Deliveryorder.is_deleted'=>0),'recursive'=>3));
                    $count_quo_del = 0;
                    $deliveryorder_instrument_count = 0;
                    foreach($data_quo_del as $del_quo_data):
                        
                        $count_quo_del = $count_quo_del + 1;
                        foreach($del_quo_data['DelDescription'] as $instrument_count):
                            if($instrument_count['is_deleted'] == 0 && $instrument_count['status'] == 1):
                                $deliveryorder_instrument_count = $deliveryorder_instrument_count + 1;
                            endif;
                        endforeach;
                    endforeach;
                    
                    
                    $data_quo_del_app = $this->Deliveryorder->find('all',array('conditions'=>array('Deliveryorder.quotationno'=>$deliver_quotation,'Deliveryorder.is_deleted'=>0,'Deliveryorder.is_approved'=>1),'recursive'=>3));
                    $count_quo_del_app = 0;
                    foreach($data_quo_del_app as $del_quo_data_app):
                        $count_quo_del_app = $count_quo_del_app + 1;
                    endforeach;
                    /////////////////////////////////
                    /////////////////////////////////  Check This
                    /////////////////////////////////
                    /////////////////////////////////
                    //pr($deliveryorder_instrument_count);
                    //pr($quotation_instrument_count);
                    if($deliveryorder_instrument_count == $quotation_instrument_count)
                    {
                        if($count_quo_del == $count_quo_del_app)
                        {
                            $this->Quotation->updateAll(array('Quotation.is_delivery_approved'=>1),array('Quotation.quotationno'=>$deliver_quotation));
                            $this->Salesorder->updateAll(array('Salesorder.is_delivery_approved'=>1),array('Salesorder.quotationno'=>$deliver_quotation));
                        }

                        /////////////////////////////////////////
                        // Check All Deliveryorders are Approved

                        $data_del = $this->Deliveryorder->find('all',array('conditions'=>array('Deliveryorder.ref_no'=>$deliver_ref_no,'Deliveryorder.is_deleted'=>0),'recursive'=>3));
                        $count_del = 0;
                        foreach($data_del as $del_data):
                            $delivery_order_no[] = $del_data['Deliveryorder']['delivery_order_no'];
                            $count_del = $count_del + 1;
                        endforeach;


                        $data_del_app = $this->Deliveryorder->find('all',array('conditions'=>array('Deliveryorder.ref_no'=>$deliver_ref_no,'Deliveryorder.is_deleted'=>0,'Deliveryorder.is_approved'=>1),'recursive'=>3));
                        $count_del_app = 0;
                        foreach($data_del_app as $del_data_app):
                            $delivery_order_no_app[] = $del_data_app['Deliveryorder']['delivery_order_no'];
                            $count_del_app = $count_del_app + 1;
                        endforeach;

                        if($count_del == $count_del_app)
                        {
                            $this->Deliveryorder->updateAll(array('Deliveryorder.is_invoice_created'=>1),array('Deliveryorder.ref_no'=>$deliver_ref_no,'Deliveryorder.po_generate_type'=>'Manual','Deliveryorder.is_poapproved'=>1));
                            $this->Quotation->updateAll(array('Quotation.is_invoice_created'=>1),array('Quotation.ref_no'=>$deliver_ref_no,'Quotation.po_generate_type'=>'Manual','Quotation.is_poapproved'=>1));
                            $this->Salesorder->updateAll(array('Salesorder.is_invoice_created'=>1),array('Salesorder.ref_no'=>$deliver_ref_no,'Salesorder.po_generate_type'=>'Manual','Salesorder.is_poapproved'=>1));

                            $this->request->data['Logactivity']['logname'] = 'Invoice';
                            $this->request->data['Logactivity']['logactivity'] = 'Add';
                            $this->request->data['Logactivity']['logid'] = $deliver_ref_no;
                            $this->request->data['Logactivity']['logno'] = $deliver_ref_no;
                            $this->request->data['Logactivity']['invoice_type_id'] = $inv_type;
                            $this->request->data['Logactivity']['user_id'] = $this->Session->read('sess_userid');
                            $this->request->data['Logactivity']['logapprove'] = 1;
                            $this->Logactivity->create();
                            $this->Logactivity->save($this->request->data['Logactivity']);

                            $this->request->data['Datalog']['logname'] = 'Invoice';
                            $this->request->data['Datalog']['logactivity'] = 'Add';
                            $this->request->data['Datalog']['logid'] = $deliver_ref_no;
                            $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                            $this->Datalog->create();
                            $this->Datalog->save($this->request->data['Datalog']);

                            $this->Session->setFlash(__("Invoice has been Created after the DO Approval"));
                        }
                    }
                }
                if($inv_type == 3)
                {
                    // Deliveryorder Approve
                    
                    $this->Deliveryorder->updateAll(array('Deliveryorder.is_approved'=>1,'Deliveryorder.is_approved_date'=>date('Y-m-d')),array('Deliveryorder.delivery_order_no'=>$id,'Deliveryorder.po_generate_type'=>'Manual','Deliveryorder.is_poapproved'=>1,'Customer.acknowledgement_type_id'=>1));
                    $user_id = $this->Session->read('sess_userid');
                    $this->Logactivity->updateAll(array('Logactivity.logapprove'=>2,'Logactivity.approved_by'=>$user_id),array('Logactivity.logid'=>$deliveryorder['Deliveryorder']['id'],'Logactivity.logactivity'=>'Add Delivery order'));
                    $this->request->data['Datalog']['logname'] = 'Deliveryorder';
                    $this->request->data['Datalog']['logactivity'] = 'Approve';
                    $this->request->data['Datalog']['logid'] = $deliveryorder['Deliveryorder']['id'];
                    $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                    $this->Datalog->create();
                    $this->Datalog->save($this->request->data['Datalog']);
                    
                    // Quotation Delivery Approval Check for Updating 
                    
                    $data_quo_del = $this->Deliveryorder->find('all',array('conditions'=>array('Deliveryorder.quotationno'=>$deliver_quotation,'Deliveryorder.is_deleted'=>0),'recursive'=>3));
                    $count_quo_del = 0;
                    foreach($data_quo_del as $del_quo_data):
                        $count_quo_del = $count_quo_del + 1;
                    endforeach;
                    
                    
                    $data_quo_del_app = $this->Deliveryorder->find('all',array('conditions'=>array('Deliveryorder.quotationno'=>$deliver_quotation,'Deliveryorder.is_deleted'=>0,'Deliveryorder.is_approved'=>1),'recursive'=>3));
                    $count_quo_del_app = 0;
                    foreach($data_quo_del_app as $del_quo_data_app):
                        $count_quo_del_app = $count_quo_del_app + 1;
                    endforeach;
                    
                    if($count_quo_del == $count_quo_del_app)
                    {
                        $this->Quotation->updateAll(array('Quotation.is_delivery_approved'=>1),array('Quotation.quotationno'=>$deliver_quotation));
                        //$this->Salesorder->updateAll(array('Salesorder.is_delivery_approved'=>1),array('Salesorder.quotationno'=>$deliver_quotation));
                    }
                    
                    $data_sal = $this->Salesorder->find('all',array('conditions'=>array('Salesorder.id'=>$deliver_salesorder,'Salesorder.is_deleted'=>0,'Salesorder.is_approved'=>1),'recursive'=>3));
                    //pr($data_sal);
                            // Salesorder Details
                    $salesorder_instrument_count = 0;
                    foreach($data_sal as $sal_data):
                        foreach($sal_data['Description'] as $instrument_count):
                            if($instrument_count['is_deleted'] == 0 && $instrument_count['status'] == 1):
                                $salesorder_instrument_count = $salesorder_instrument_count + 1;
                            //pr($salesorder_instrument_count);
                            endif;
                        endforeach;
                    endforeach;
                    
                    // Salesorder Delivery Approval Check for Updating 
                    
                    $data_sales_del = $this->Deliveryorder->find('all',array('conditions'=>array('Deliveryorder.salesorder_id'=>$deliver_salesorder,'Deliveryorder.is_deleted'=>0),'recursive'=>3));
                    $count_sales_del = 0;
                    $deliveryorder_instrument_count = 0;
                    foreach($data_sales_del as $del_sales_data):
                        
                        $count_sales_del = $count_sales_del + 1;
                        foreach($del_sales_data['DelDescription'] as $instrument_count):
                            if($instrument_count['is_deleted'] == 0 && $instrument_count['status'] == 1):
                                $deliveryorder_instrument_count = $deliveryorder_instrument_count + 1;
                            endif;
                        endforeach;
                    endforeach;
                    //pr($salesorder_instrument_count);
                   // pr($deliveryorder_instrument_count);
                    if($salesorder_instrument_count == $deliveryorder_instrument_count)
                    {
                        $data_sales_del_app = $this->Deliveryorder->find('all',array('conditions'=>array('Deliveryorder.salesorder_id'=>$deliver_salesorder,'Deliveryorder.is_deleted'=>0,'Deliveryorder.is_approved'=>1),'recursive'=>3));
                        $count_sales_del_app = 0;
                        foreach($data_sales_del_app as $del_sales_data_app):
                            $count_sales_del_app = $count_sales_del_app + 1;
                        endforeach;

                        if($count_sales_del == $count_sales_del_app)
                        {
                            $this->Salesorder->updateAll(array('Salesorder.is_delivery_approved'=>1),array('Salesorder.id'=>$deliver_salesorder));
                        }

                        /////////////////////////////////////////
                        // Check All Deliveryorders are Approved

                        $data_del = $this->Deliveryorder->find('all',array('conditions'=>array('Deliveryorder.salesorder_id'=>$deliver_salesorder,'Deliveryorder.is_deleted'=>0),'recursive'=>3));
                        $count_del = 0;
                        foreach($data_del as $del_data):
                            $delivery_order_no[] = $del_data['Deliveryorder']['delivery_order_no'];
                            $count_del = $count_del + 1;
                        endforeach;


                        $data_del_app = $this->Deliveryorder->find('all',array('conditions'=>array('Deliveryorder.salesorder_id'=>$deliver_salesorder,'Deliveryorder.is_deleted'=>0,'Deliveryorder.is_approved'=>1),'recursive'=>3));
                        $count_del_app = 0;
                        foreach($data_del_app as $del_data_app):
                            $delivery_order_no_app[] = $del_data_app['Deliveryorder']['delivery_order_no'];
                            $count_del_app = $count_del_app + 1;
                        endforeach;
                        //pr($count_del);
                        //pr($count_del_app);
                        //exit;
                        if($count_del == $count_del_app)
                        {
                            $this->Deliveryorder->updateAll(array('Deliveryorder.is_invoice_created'=>1),array('Deliveryorder.salesorder_id'=>$deliver_salesorder,'Deliveryorder.po_generate_type'=>'Manual','Deliveryorder.is_poapproved'=>1));
                            //$this->Quotation->updateAll(array('Quotation.is_invoice_created'=>1),array('Quotation.ref_no'=>$deliver_ref_no,'Quotation.po_generate_type'=>'Manual','Quotation.is_poapproved'=>1));
                            $this->Salesorder->updateAll(array('Salesorder.is_invoice_created'=>1),array('Salesorder.id'=>$deliver_salesorder,'Salesorder.po_generate_type'=>'Manual','Salesorder.is_poapproved'=>1));

                            $this->request->data['Logactivity']['logname'] = 'Invoice';
                            $this->request->data['Logactivity']['logactivity'] = 'Add';
                            $this->request->data['Logactivity']['logid'] = $deliver_salesorder;
                            $this->request->data['Logactivity']['logno'] = $deliver_salesorder;
                            $this->request->data['Logactivity']['invoice_type_id'] = $inv_type;
                            $this->request->data['Logactivity']['user_id'] = $this->Session->read('sess_userid');
                            $this->request->data['Logactivity']['logapprove'] = 1;
                            $this->Logactivity->create();
                            $this->Logactivity->save($this->request->data['Logactivity']);

                            $this->request->data['Datalog']['logname'] = 'Invoice';
                            $this->request->data['Datalog']['logactivity'] = 'Add';
                            $this->request->data['Datalog']['logid'] = $deliver_salesorder;
                            $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                            $this->Datalog->create();
                            $this->Datalog->save($this->request->data['Datalog']);
                            $this->Session->setFlash(__("Invoice has been Created after the DO Approval"));
                        }
                    }
                }
            }
            
            /////// PO Before Invoice ///////////
            
            else if($ack_type == 2)
            {
                if($inv_type == 1)
                {
                    
                // Deliveryorder Approve
                    
                    $this->Deliveryorder->updateAll(array('Deliveryorder.is_approved'=>1,'Deliveryorder.is_approved_date'=>date('Y-m-d')),array('Deliveryorder.delivery_order_no'=>$id));
                    $user_id = $this->Session->read('sess_userid');
                    $this->Logactivity->updateAll(array('Logactivity.logapprove'=>2,'Logactivity.approved_by'=>$user_id),array('Logactivity.logid'=>$deliveryorder['Deliveryorder']['id'],'Logactivity.logactivity'=>'Add Delivery order'));
                    $this->request->data['Datalog']['logname'] = 'Deliveryorder';
                    $this->request->data['Datalog']['logactivity'] = 'Approve';
                    $this->request->data['Datalog']['logid'] = $deliveryorder['Deliveryorder']['id'];
                    $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                    $this->Datalog->create();
                    $this->Datalog->save($this->request->data['Datalog']);
                    
                    // Quotation Delivery Approval Check for Updating 
                    
                    $data_quo_del = $this->Deliveryorder->find('all',array('conditions'=>array('Deliveryorder.quotationno'=>$deliver_quotation,'Deliveryorder.is_deleted'=>0),'recursive'=>3));
                    $count_quo_del = 0;
                    foreach($data_quo_del as $del_quo_data):
                        $count_quo_del = $count_quo_del + 1;
                    endforeach;
                    
                    
                    $data_quo_del_app = $this->Deliveryorder->find('all',array('conditions'=>array('Deliveryorder.quotationno'=>$deliver_quotation,'Deliveryorder.is_deleted'=>0,'Deliveryorder.is_approved'=>1),'recursive'=>3));
                    $count_quo_del_app = 0;
                    foreach($data_quo_del_app as $del_quo_data_app):
                        $count_quo_del_app = $count_quo_del_app + 1;
                    endforeach;
                    
                    if($count_quo_del == $count_quo_del_app)
                    {
                        $this->Quotation->updateAll(array('Quotation.is_delivery_approved'=>1),array('Quotation.quotationno'=>$deliver_quotation));
                        $this->Salesorder->updateAll(array('Salesorder.is_delivery_approved'=>1),array('Salesorder.quotationno'=>$deliver_quotation));
                        
                        /******************
                        * Data Log - Client PO
                        */
                    $logactivity_client = $this->Logactivity->find('count',array('conditions'=>array('Logactivity.logname'=>"ClientPO",'Logactivity.logactivity'=>"Add",'Logactivity.logid'=>$deliver_ref_no,'Logactivity.logno'=>$deliver_ref_no)));
                    if(!$logactivity_client)
                    {

                        $this->request->data['Logactivity']['logname'] = 'ClientPO';
                        $this->request->data['Logactivity']['logactivity'] = 'Add';
                        $this->request->data['Logactivity']['logid'] = $deliver_ref_no;
                        $this->request->data['Logactivity']['logno'] = $deliver_ref_no;
                        $this->request->data['Logactivity']['user_id'] = $this->Session->read('sess_userid');
                        $this->request->data['Logactivity']['logapprove'] = 1;
                        $this->Logactivity->create();
                        $this->Logactivity->save($this->request->data['Logactivity']);

                        $this->request->data['Datalog']['logname'] = 'ClientPO';
                        $this->request->data['Datalog']['logactivity'] = 'Add';
                        $this->request->data['Datalog']['logid'] = $deliver_ref_no;
                        $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                        $this->Datalog->create();
                        $this->Datalog->save($this->request->data['Datalog']);
                    }
                    }           
                    /////////////////////////////////////////
                    // Check All Deliveryorders are Approved
                    //$deliver_total_inst = $deliveryorder['Deliveryorder']['total_inst'];
                     
//                    $data_del = $this->Deliveryorder->find('all',array('conditions'=>array('Deliveryorder.ref_no'=>$deliver_ref_no,'Deliveryorder.is_deleted'=>0),'recursive'=>3));
//                    $count_del = 0;
//                    foreach($data_del as $del_data):
//                        $delivery_order_no[] = $del_data['Deliveryorder']['delivery_order_no'];
//                        $count_del = $count_del + 1;
//                    endforeach;
//                    
//                    
//                    $data_del_app = $this->Deliveryorder->find('all',array('conditions'=>array('Deliveryorder.ref_no'=>$deliver_ref_no,'Deliveryorder.is_deleted'=>0,'Deliveryorder.is_approved'=>1),'recursive'=>3));
//                    $count_del_app = 0;
//                    foreach($data_del_app as $del_data_app):
//                        $delivery_order_no_app[] = $del_data_app['Deliveryorder']['delivery_order_no'];
//                        $count_del_app = $count_del_app + 1;
//                    endforeach;
//                    
//                    if($count_del == $count_del_app)
//                    {
//                        $this->Deliveryorder->updateAll(array('Deliveryorder.is_invoice_created'=>1),array('Deliveryorder.ref_no'=>$deliver_ref_no,'Deliveryorder.po_generate_type'=>'Manual','Deliveryorder.is_poapproved'=>1));
//                        $this->Quotation->updateAll(array('Quotation.is_invoice_created'=>1),array('Quotation.ref_no'=>$deliver_ref_no,'Quotation.po_generate_type'=>'Manual','Quotation.is_poapproved'=>1));
//                        $this->Salesorder->updateAll(array('Salesorder.is_invoice_created'=>1),array('Salesorder.ref_no'=>$deliver_ref_no,'Salesorder.po_generate_type'=>'Manual','Salesorder.is_poapproved'=>1));
//                        
//                        $this->request->data['Logactivity']['logname'] = 'Invoice';
//                        $this->request->data['Logactivity']['logactivity'] = 'Add';
//                        $this->request->data['Logactivity']['logid'] = $deliver_ref_no;
//                        $this->request->data['Logactivity']['logno'] = $deliver_ref_no;
//                        $this->request->data['Logactivity']['invoice_type_id'] = $inv_type;
//                        $this->request->data['Logactivity']['user_id'] = $this->Session->read('sess_userid');
//                        $this->request->data['Logactivity']['logapprove'] = 1;
//                        $this->Logactivity->create();
//                        $this->Logactivity->save($this->request->data['Logactivity']);
//
//                        $this->request->data['Datalog']['logname'] = 'Invoice';
//                        $this->request->data['Datalog']['logactivity'] = 'Add';
//                        $this->request->data['Datalog']['logid'] = $deliver_ref_no;
//                        $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
//                        $this->Datalog->create();
//                        $this->Datalog->save($this->request->data['Datalog']);
//                        
//                        $this->Session->setFlash(__("Invoice has been Created after the DO Approval"));
                    }    
                    
                    
                 //////////////////////////////////////////////////////////////////   
                    
               
                
                // Salesorder Full Invoice
                if($inv_type == 3)
                {
                    $this->Deliveryorder->updateAll(array('Deliveryorder.is_approved'=>1,'Deliveryorder.is_approved_date'=>date('Y-m-d')),array('Deliveryorder.delivery_order_no'=>$id));
                    $user_id = $this->Session->read('sess_userid');
                    $this->Logactivity->updateAll(array('Logactivity.logapprove'=>2,'Logactivity.approved_by'=>$user_id),array('Logactivity.logid'=>$deliveryorder['Deliveryorder']['id'],'Logactivity.logactivity'=>'Add Delivery order'));
                    $this->request->data['Datalog']['logname'] = 'Deliveryorder';
                    $this->request->data['Datalog']['logactivity'] = 'Approve';
                    $this->request->data['Datalog']['logid'] = $deliveryorder['Deliveryorder']['id'];
                    $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                    $this->Datalog->create();
                    $this->Datalog->save($this->request->data['Datalog']);
                    
                    // Quotation Delivery Approval Check for Updating 
                    
                    $data_quo_del = $this->Deliveryorder->find('all',array('conditions'=>array('Deliveryorder.quotationno'=>$deliver_quotation,'Deliveryorder.is_deleted'=>0),'recursive'=>3));
                    $count_quo_del = 0;
                    foreach($data_quo_del as $del_quo_data):
                        $count_quo_del = $count_quo_del + 1;
                    endforeach;
                    
                    
                    $data_quo_del_app = $this->Deliveryorder->find('all',array('conditions'=>array('Deliveryorder.quotationno'=>$deliver_quotation,'Deliveryorder.is_deleted'=>0,'Deliveryorder.is_approved'=>1),'recursive'=>3));
                    $count_quo_del_app = 0;
                    foreach($data_quo_del_app as $del_quo_data_app):
                        $count_quo_del_app = $count_quo_del_app + 1;
                    endforeach;
                    
                    if($count_quo_del == $count_quo_del_app)
                    {
                        $this->Quotation->updateAll(array('Quotation.is_delivery_approved'=>1),array('Quotation.quotationno'=>$deliver_quotation));
                        //$this->Salesorder->updateAll(array('Salesorder.is_delivery_approved'=>1),array('Salesorder.quotationno'=>$deliver_quotation));
                    }
                    
                    $data_sal = $this->Salesorder->find('all',array('conditions'=>array('Salesorder.id'=>$deliver_salesorder,'Salesorder.is_deleted'=>0,'Salesorder.is_approved'=>1),'recursive'=>3));
                            // Salesorder Details
                    foreach($data_sal as $sal_data):
                        $salesorder_instrument_count = 0;
                        
                        foreach($sal_data['Description'] as $instrument_count):
                            if($instrument_count['is_deleted'] == 0 && $instrument_count['status'] == 1):
                                $salesorder_instrument_count = $salesorder_instrument_count + 1;
                            endif;
                        endforeach;
                        
                    endforeach;
                    
                    // Salesorder Delivery Approval Check for Updating 
                    
                    $data_sales_del = $this->Deliveryorder->find('all',array('conditions'=>array('Deliveryorder.salesorder_id'=>$deliver_salesorder,'Deliveryorder.is_deleted'=>0),'recursive'=>3));
                    $count_sales_del = 0;
                    $deliveryorder_instrument_count = 0;
                    foreach($data_sales_del as $del_sales_data):
                        
                        $count_sales_del = $count_sales_del + 1;
                        foreach($del_sales_data['DelDescription'] as $instrument_count):
                            if($instrument_count['is_deleted'] == 0 && $instrument_count['status'] == 1):
                                $deliveryorder_instrument_count = $deliveryorder_instrument_count + 1;
                            endif;
                        endforeach;
                    endforeach;
                    //pr($salesorder_instrument_count);
                    //pr($deliveryorder_instrument_count);
                    //exit;
                    $logactivity_client = $this->Logactivity->find('count',array('conditions'=>array('Logactivity.logname'=>"ClientPO",'Logactivity.logactivity'=>"Add",'Logactivity.logid'=>$deliver_salesorder,'Logactivity.logno'=>$deliver_salesorder)));
                    if(!$logactivity_client)
                    {
                                    $this->request->data['Logactivity']['logname'] = 'ClientPO';
                                    $this->request->data['Logactivity']['logactivity'] = 'Add';
                                    $this->request->data['Logactivity']['logid'] = $deliver_salesorder;
                                    $this->request->data['Logactivity']['logno'] = $deliver_salesorder;
                                    $this->request->data['Logactivity']['user_id'] = $this->Session->read('sess_userid');
                                    $this->request->data['Logactivity']['logapprove'] = 1;
                                    $this->Logactivity->create();
                                    $this->Logactivity->save($this->request->data['Logactivity']);

                                    $this->request->data['Datalog']['logname'] = 'ClientPO';
                                    $this->request->data['Datalog']['logactivity'] = 'Add';
                                    $this->request->data['Datalog']['logid'] = $deliver_salesorder;
                                    $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                                    $this->Datalog->create();
                                    $this->Datalog->save($this->request->data['Datalog']);
                    }
                    if($salesorder_instrument_count == $deliveryorder_instrument_count)
                    {
                        $data_sales_del_app = $this->Deliveryorder->find('all',array('conditions'=>array('Deliveryorder.salesorder_id'=>$deliver_salesorder,'Deliveryorder.is_deleted'=>0,'Deliveryorder.is_approved'=>1),'recursive'=>3));
                        $count_sales_del_app = 0;
                        foreach($data_sales_del_app as $del_sales_data_app):
                            $count_sales_del_app = $count_sales_del_app + 1;
                        endforeach;

                        if($count_sales_del == $count_sales_del_app)
                        {
                            $this->Salesorder->updateAll(array('Salesorder.is_delivery_approved'=>1),array('Salesorder.id'=>$deliver_salesorder));
                        }

                        /////////////////////////////////////////
                        // Check All Deliveryorders are Approved

                        $data_del = $this->Deliveryorder->find('all',array('conditions'=>array('Deliveryorder.salesorder_id'=>$deliver_salesorder,'Deliveryorder.is_deleted'=>0),'recursive'=>3));
                        $count_del = 0;
                        foreach($data_del as $del_data):
                            $delivery_order_no[] = $del_data['Deliveryorder']['delivery_order_no'];
                            $count_del = $count_del + 1;
                        endforeach;


                        $data_del_app = $this->Deliveryorder->find('all',array('conditions'=>array('Deliveryorder.salesorder_id'=>$deliver_salesorder,'Deliveryorder.is_deleted'=>0,'Deliveryorder.is_approved'=>1),'recursive'=>3));
                        $count_del_app = 0;
                        foreach($data_del_app as $del_data_app):
                            $delivery_order_no_app[] = $del_data_app['Deliveryorder']['delivery_order_no'];
                            $count_del_app = $count_del_app + 1;
                        endforeach;

                        if($count_del == $count_del_app)
                        {
                            /******************
                        * Data Log - Client PO
                        */
                            
        
                        }
                        }
                }
            }
                
            else
            {
                $this->Deliveryorder->updateAll(array('Deliveryorder.is_invoice_created'=>1,'Deliveryorder.is_approved'=>1,'Deliveryorder.is_approved_date'=>'"'.date('Y-m-d').'"'),array('Deliveryorder.delivery_order_no'=>$id));
                
                //$this->Deliveryorder->updateAll(array('Deliveryorder.is_invoice_created'=>1,'Deliveryorder.is_approved'=>1,'Deliveryorder.is_approved_date'=>'"'.date('d-F-y').'"'),array('Deliveryorder.delivery_order_no'=>$id));
                $this->Quotation->updateAll(array('Quotation.is_invoice_created'=>1,'Quotation.is_delivery_approved'=>1),array('Quotation.quotationno'=>$deliver_quotation));
                $this->Salesorder->updateAll(array('Salesorder.is_invoice_created'=>1,'Salesorder.is_delivery_approved'=>1),array('Salesorder.id'=>$deliver_salesorder));
                
                $user_id = $this->Session->read('sess_userid');
                $this->Logactivity->updateAll(array('Logactivity.logapprove'=>2,'Logactivity.approved_by'=>$user_id),array('Logactivity.logid'=>$deliveryorder['Deliveryorder']['id'],'Logactivity.logactivity'=>'Add Delivery order'));
                $this->request->data['Datalog']['logname'] = 'Deliveryorder';
                $this->request->data['Datalog']['logactivity'] = 'Approve';
                $this->request->data['Datalog']['logid'] = $deliveryorder['Deliveryorder']['id'];
                $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                $this->Datalog->create();
                $this->Datalog->save($this->request->data['Datalog']);

                $po_quo_count = $this->Device->find('count',array('conditions'=>array('Device.quotationno'=>$deliver_quotation)));
                $po_inv_type_1 = $this->Deliveryorder->find('all',array('conditions'=>array('Deliveryorder.quotationno'=>$deliver_quotation,'Deliveryorder.is_approved'=>1)));
                $count_po_inv = 0;
                foreach($po_inv_type_1 as $po_inv):
                    $deliveryorder_po_desc = $po_inv['DelDescription'];
                    $count_po_inv = $count_po_inv + count($deliveryorder_po_desc);
                endforeach;

                if($po_quo_count == $count_po_inv)
                {
                    /******************
                    * Data Log - Invoice
                    */
//                    if($inv_type == 3)
//                    {
//                        $this->request->data['Logactivity']['logname'] = 'Invoice';
//                        $this->request->data['Logactivity']['logactivity'] = 'Add';
//                        $this->request->data['Logactivity']['logid'] = $id;
//                        $this->request->data['Logactivity']['logno'] = $deliver_salesorder;
//                        $this->request->data['Logactivity']['user_id'] = $this->Session->read('sess_userid');
//                        $this->request->data['Logactivity']['logapprove'] = 1;
//                        $this->Logactivity->create();
//                        $this->Logactivity->save($this->request->data['Logactivity']);
//
//                        $this->request->data['Datalog']['logname'] = 'Invoice';
//                        $this->request->data['Datalog']['logactivity'] = 'Add';
//                        $this->request->data['Datalog']['logid'] = $deliver_salesorder;
//                        $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
//                        $this->Datalog->create();
//                        $this->Datalog->save($this->request->data['Datalog']);
//                    }
//                    else
//                    {
                        $this->request->data['Logactivity']['logname'] = 'Invoice';
                        $this->request->data['Logactivity']['logactivity'] = 'Add';
                        $this->request->data['Logactivity']['logid'] = $id;
                        $this->request->data['Logactivity']['logno'] = $deliver_quotation;
                        $this->request->data['Logactivity']['user_id'] = $this->Session->read('sess_userid');
                        $this->request->data['Logactivity']['logapprove'] = 1;
                        $this->Logactivity->create();
                        $this->Logactivity->save($this->request->data['Logactivity']);

                        $this->request->data['Datalog']['logname'] = 'Invoice';
                        $this->request->data['Datalog']['logactivity'] = 'Add';
                        $this->request->data['Datalog']['logid'] = $deliver_quotation;
                        $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                        $this->Datalog->create();
                        $this->Datalog->save($this->request->data['Datalog']);
//                    }
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
            //pr($data['Description']);exit;
            $count = 0;
            foreach($data as $data_val):
                //pr($data_val);
                $cou = 0;
                foreach($data_val['Description'] as $data_desc):
                if($data_desc['checking'] == 1):
                    $cou = $cou + 1;
                endif;
                endforeach;
                if($cou == 0):
//                    echo "<div class='delivery_no_result' align='left'>";
//                    echo "No Results Found";
//                    echo "<br>";
//                    echo "</div>";
                else:
                if($data_val['Customer']['deliveryordertype_id']==2):
                $count = $count+1;
                    //echo $count;
                    foreach($data_val['Description'] as $desc):
                    
                        if($desc['checking']==1):
                            $check = 1;
                            break;
                        endif;                           
                    endforeach;
                    if($check == 1):
                        echo "<div class='delivery_show instrument_drop_show' align='left' id='".$data_val['Salesorder']['id']."'>";
                        echo $data_val['Salesorder']['salesorderno'];
                        echo "<br>";
                        echo "</div>";
                    endif;
                endif;
                endif;
            endforeach;
            if($count == 0):
                echo "<div class='delivery_no_result' align='left'>";
                echo "No Results Found";
                echo "<br>";
                echo "</div>";
            endif;
            
            //exit;
//            $c = count($data);
//            if(!empty($c))
//            {
//                for($i = 0; $i<$c;$i++)
//                {    
//                    echo "<div class='delivery_show instrument_drop_show' align='left' id='".$data[$i]['Salesorder']['id']."'>";
//                    echo $data[$i]['Salesorder']['salesorderno'];
//                    echo "<br>";
//                    echo "</div>";
//                }   
//            }
//            else
//            {
//                echo "<div class='delivery_no_result' align='left'>";
//                echo "No Results Found";
//                echo "<br>";
//                echo "</div>";
//            }
        }
        public function get_sales_details()
        {
            $this->loadModel('Salesorder');
            $sales_id =  $this->request->data['sales_id'];
            $this->autoRender = false;
            $sales_data = $this->Salesorder->find('first',array('conditions'=>array('salesorderno'=>$sales_id,'Salesorder.is_approved'=>'1'),'recursive'=>'3'));
            $contact_list['contact']   =   $this->Contactpersoninfo->find('all',array('conditions'=>array('Contactpersoninfo.customer_id'=>$sales_data['Customer']['id'],'Contactpersoninfo.status'=>1),'fields'=>array('id','name')));
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
                echo "Search is Empty";
            }
            
        }
        public function get_delivery_address() 
        {
        $this->autoRender = false;
        $this->loadModel('Address');
        $address = $this->request->data['address'];
        $customer_id = $this->request->data['customer_id'];
        $customer_address_data = $this->Address->find('all', array('conditions' => array('Address.customer_id' => $customer_id,'Address.type' => 'Delivery','Address.status'=>1,'Address.is_deleted'=>0)));
        //pr($customer_address_data);exit;
        $customer_address_data_del = $customer_address_data[$address]['Address']['address'];
        if (!empty($customer_address_data_del))
        {
           echo $customer_address_data_del;
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
        function pdf($id = NULL) 
        {
        
            $this->autoRender = false;
            $deliveryorder_data = $this->Deliveryorder->find('first', array('conditions' => array('Deliveryorder.id' => $id),'recursive'=>3));
            //pr($deliveryorder_data);exit;
            $file_type = 'pdf';
            $filename = $deliveryorder_data['Deliveryorder']['delivery_order_no'];
            
            //foreach ($salesorder_data as $salesorder_data_list):
             $title =   $this->Title->find('all');
            foreach($title as $title_name)
            {
                $titles[] = $title_name['Title']['title_name'];
            }
                $customername = $deliveryorder_data['Customer']['customername'];
                $billing_address = $deliveryorder_data['Deliveryorder']['customer_address'];
                $postalcode = $deliveryorder_data['Customer']['postalcode'];
                $contactperson = $deliveryorder_data['Customer']['Contactpersoninfo'][0]['name'];
                $phone = $deliveryorder_data['Deliveryorder']['phone'];
                $fax = $deliveryorder_data['Deliveryorder']['fax'];
                $email = $deliveryorder_data['Deliveryorder']['email'];
                //$our_ref_no = $salesorder_data_list['Quotation']['ref_no'];
                $ref_no = $deliveryorder_data['Deliveryorder']['ref_no'];
                $reg_date = $deliveryorder_data['Deliveryorder']['delivery_order_date'];
                $payment_term = $deliveryorder_data['Customer']['Paymentterm']['paymentterm'] . ' ' . $deliveryorder_data['Customer']['Paymentterm']['paymenttype'];
                $deliveryorderno = $deliveryorder_data['Deliveryorder']['delivery_order_no'];
                $quo_no = $deliveryorder_data['Deliveryorder']['quotationno'];
                $sal_no = $deliveryorder_data['Deliveryorder']['salesorder_id'];
                $instrument_type = $deliveryorder_data['Salesorder']['Quotation']['InstrumentType']['deliveryorder'];
                //pr($deliveryorder_data);exit;
                foreach($deliveryorder_data['Salesorder']['Description'] as $device):
                    if($device['del_id']==$deliveryorder_data['Deliveryorder']['id'])
                    {
                    
                    $device_name[] = $device;
                        
                    }
                endforeach;
                
     $html = '<html>
<head>
<meta charset="utf-8" />
<title></title>
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
#footer { position: fixed; left: 0px; bottom: -280px; right: 0px; height: 330px; }
#footer .page:after { content: counter(page); }
</style>
</head>'; 
$html .=
'<body style="font-family:Oswald, sans-serif;font-size:9px;padding:0;margin:0;font-weight: 300; color:#444 !important;">
<div id="header">
     <table width="700px" style="margin-top:20px;">
          <tr>
               <td width="335" ><div style="float:left; "><img src="img/logo.jpg" width="450" height="80" alt="" /></div></td>
               <td><div style="float:left;text-align:right;float:right;line-height:7px !important;font-size:8px !important;">
                     41 Senoko Drive<br />
                      Singapore 758249<br />
                        Tel.+65 6458 4411<br />
                         Fax.+65 64584400<br />
                         www.bestandards.com
                    </div>
					</td>
          <tr>
     </table>
     <table width="98%" height="56">
          <tr>
               <td width="198" style="padding:0 10px;"><div style="display:inline-block;font-size:18px;font-weight:bold; font-style:italic;color:#00005b !important">DELIVERY ORDER</div></td>
               <td width="300" style="padding:0 10px;"><div style="display:inline-block;background:#00005b;color:#fff !important;padding:5px;font-size:13px;text-align:right;">COMPANY REG NO. 200510697M</div></td>
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
                              <td style="font-size:9px !important;">'.$postalcode.'</td>
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
                              <td  width="270" colspan="3" style="padding:5px 0;"><div align="center" style="font-size:28px;border-bottom:1px solid #000;width:100%;padding:5px 0; position:relative;top:-10px;font-weight:bolder;">'.$deliveryorder_data['Deliveryorder']['delivery_order_no'].'</div></td>
                         </tr>
                         <tr>
						     
                              <td style="padding-left:5px;width:50px;" width="50">SALES ORDER NO </td>
                              
                              <td style="padding-right:10px;">: &nbsp;&nbsp;&nbsp;'.$sal_no.'</td>
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
<div style="padding-top:10px;">'.$instrument_type.' :</div>

</div></div>';
$html .='<div id="footer">
     <div style="width:100%;">
          <table cellpadding="1" cellspacing="1"  style="width:100%;">
          <tr>
               <td style="padding:5px;width:50%;border:1px solid #000;"><table cellpadding="0" cellspacing="0" width="245" >
                         <tr>
                              <td style="text-align:center;padding-bottom:50px;">ITEMS RECEIVED IN GOOD ORDER AND CONDITION</td>
                         </tr>
						 <tr>
                              <td style="font-size:9px !important;color:#777 !important;text-align:center;border-top:1px solid #000;">COMPANYS STAMP, SIGNATURE AND DATE</td>
                         </tr>
                        </table>
                    </td>
               <td></td>
               <td></td>
               <td></td>
               <td></td>
               <td style="border:1px dashed #000;padding:5px;width:50%;"><table width="245" cellpadding="0" cellspacing="0">
                         <tr>
                              <td width="214" style="text-align:center;padding-bottom:50px;">FOR BS TECH PTE LTD</td>
                         </tr>
						 <tr>
                              <td style="font-size:9px !important;color:#777 !important; text-align:center;padding-top:5px;border-top:1px solid #000;">Authorized Signature</td>
                         </tr>
                        
               </table></td>
          </tr>
     </table>
     

<div style="background:#00005b;line-height:7px !important;width:100%;color:#fff !important;font-size:8px;margin-top:20px;text-align:center;">E. & O . E</div>
       </div>  
       <table width="100%">
               <tr>
                    <td  style="width:80%;">'.date('Y-m-d H:i:s').'</td><td  style="width:7%;">Page: <span class="page"></span></td>
                        </tr></table>
</div>';
$subtotal = 0;
$html .= '<div id="content" style="">'; 
                foreach($device_name as $k=>$device):
                    if($k == 0)
                    {
                        $html .= '<table cellpadding="0" cellspacing="0"  style="width:100%;margin-top:150px;">      <tr>
               <td style="border-bottom:1px solid #000;text-transform:uppercase;padding:3px 10px;font-size:11px !important;color: #000 !important;">Item</td>
               <td style="border-bottom:1px solid #000;text-transform:uppercase;padding:3px 10px;font-size:11px !important;color: #000 !important;">Qty</td>
               <td style="border-bottom:1px solid #000;text-transform:uppercase;padding:3px 10px;font-size:11px !important;color: #000 !important;width:20%;">Instrument</td>
               <td style="border-bottom:1px solid #000;text-transform:uppercase;padding:3px 10px;font-size:11px !important;color: #000 !important;">Brand</td>
               <td style="border-bottom:1px solid #000;text-transform:uppercase;padding:3px 10px;font-size:11px !important;color: #000 !important;">Model</td>
               <td style="border-bottom:1px solid #000;text-transform:uppercase;padding:3px 10px;font-size:11px !important;color: #000 !important;">Range</td>';
$count1 = 0;
for($i=0;$i<=4;$i++):
    if(isset($titles[$i])):
        $html .='<td style="border-bottom:1px solid #000;padding:3px 10px;font-size:11px !important;color: #000 !important;">';
        $html .= $titles[$i];
        $html .='</td>';
    endif;
    $count1 = $count1+1;
endfor;


$html .= '</tr>';
                    }
                    elseif($k%5 == 0)
                    {
                        $html .= '<table cellpadding="0" cellspacing="0"  style="width:100%;page-break-before: always;margin-top:230px;">      <tr>
               <td style="border-bottom:1px solid #000;text-transform:uppercase;padding:3px 10px;font-size:11px !important;color: #000 !important;">Item</td>
               <td style="border-bottom:1px solid #000;text-transform:uppercase;padding:3px 10px;font-size:11px !important;color: #000 !important;">Qty</td>
               <td style="border-bottom:1px solid #000;text-transform:uppercase;padding:3px 10px;font-size:11px !important;color: #000 !important;width:20%;">Instrument</td>
               <td style="border-bottom:1px solid #000;text-transform:uppercase;padding:3px 10px;font-size:11px !important;color: #000 !important;">Brand</td>
               <td style="border-bottom:1px solid #000;text-transform:uppercase;padding:3px 10px;font-size:11px !important;color: #000 !important;">Model</td>
               <td style="border-bottom:1px solid #000;text-transform:uppercase;padding:3px 10px;font-size:11px !important;color: #000 !important;">Range</td>';
$count1 = 0;
for($i=0;$i<=4;$i++):
    if(isset($titles[$i])):
        $html .='<td style="border-bottom:1px solid #000;text-transform:uppercase;padding:3px 10px;font-size:11px !important;color: #000 !important;">';
        $html .= $titles[$i];
        $html .='</td>';
    endif;
    $count1 = $count1+1;
endfor;
$count1 = $count1+1;

$html .= '</tr>';
                    }
                      
                      
                    //foreach($device_name as $device):
                    $html .= '
                    <tr>
                        <td style="padding:3px 10px;">'.$device['order_by'].'</td>
                        <td style="padding:3px 10px;">1</td>
                        <td style="padding:3px 10px;width:20%;">'.$device['Instrument']['name'].'</td>
                        <td style="padding:3px 10px;">'.$device['Brand']['brandname'].'</td>
                        <td style="padding:3px 10px;">'.$device['model_no'].'</td>
                        <td style="padding:3px 10px;">'.$device['Range']['range_name'].'</td>';
                        for($i=0;$i<=4;$i++):
                        if(isset($titles[$i])):
                        $html .='<td style="padding:3px 10px;">'.$device['title'.($i+1).'_val'].'</td>';
                        endif;
                        endfor;
                     $html .='</tr>';
                    
                endforeach;
                $html .='<tr><td colspan="4" style="border:1px  dashed #666;text-align:right;padding:10px;color: #000 !important;font-size:11px !important;">SPECIAL REQUIREMENTS :</td>
               <td  colspan="8" style="border:1px dashed #666; text-align:left;padding: 10px;font-size:11px !important;">Self Collect & Self Delivery Non-Singlas</td></tr></table>';
                
                
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
            $this->dompdf->stream("Deliveryorder-".$filename.".pdf");
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
    public function update_title1()
    {
        $this->autoRender   =   false;
         if ($this->request->data) {
            App::uses('Sanitize', 'Utility');
            $title = Sanitize::clean($this->request->data['title1']);

            $this->DelDescription->id = $this->request->data['device_id'];
            //$this->Device->updateAll(array('Device.title1_val'=>$title),array('Device.id'=>$this->request->data['device_id']));
            $this->DelDescription->saveField('title1_val', $title);
            echo $title;
        }
    }    
    public function update_title2()
    {
        $this->autoRender   =   false;
         if ($this->request->data) {
            App::uses('Sanitize', 'Utility');
            $title = Sanitize::clean($this->request->data['title2']);

            $this->DelDescription->id = $this->request->data['device_id'];
            //$this->Device->updateAll(array('Device.title1_val'=>$title),array('Device.id'=>$this->request->data['device_id']));
            $this->DelDescription->saveField('title2_val', $title);
            echo $title;
        }
    } 
    public function update_title3()
    {
        $this->autoRender   =   false;
         if ($this->request->data) {
            App::uses('Sanitize', 'Utility');
            $title = Sanitize::clean($this->request->data['title3']);

            $this->DelDescription->id = $this->request->data['device_id'];
            //$this->Device->updateAll(array('Device.title1_val'=>$title),array('Device.id'=>$this->request->data['device_id']));
            $this->DelDescription->saveField('title3_val', $title);
            echo $title;
        }
    } 
    public function update_title4()
    {
        $this->autoRender   =   false;
         if ($this->request->data) {
            App::uses('Sanitize', 'Utility');
            $title = Sanitize::clean($this->request->data['title4']);

            $this->DelDescription->id = $this->request->data['device_id'];
            //$this->Device->updateAll(array('Device.title1_val'=>$title),array('Device.id'=>$this->request->data['device_id']));
            $this->DelDescription->saveField('title4_val', $title);
            echo $title;
        }
    } 
    public function update_title5()
    {
        $this->autoRender   =   false;
         if ($this->request->data) {
            App::uses('Sanitize', 'Utility');
            $title = Sanitize::clean($this->request->data['title5']);

            $this->DelDescription->id = $this->request->data['device_id'];
            //$this->Device->updateAll(array('Device.title1_val'=>$title),array('Device.id'=>$this->request->data['device_id']));
            $this->DelDescription->saveField('title5_val', $title);
            echo $title;
        }
    } 
    public function update_title6()
    {
        $this->autoRender   =   false;
         if ($this->request->data) {
            App::uses('Sanitize', 'Utility');
            $title = Sanitize::clean($this->request->data['title6']);

            $this->DelDescription->id = $this->request->data['device_id'];
            //$this->Device->updateAll(array('Device.title1_val'=>$title),array('Device.id'=>$this->request->data['device_id']));
            $this->DelDescription->saveField('title6_val', $title);
            echo $title;
        }
    } 
    public function update_title7()
    {
        $this->autoRender   =   false;
         if ($this->request->data) {
            App::uses('Sanitize', 'Utility');
            $title = Sanitize::clean($this->request->data['title7']);

            $this->DelDescription->id = $this->request->data['device_id'];
            //$this->Device->updateAll(array('Device.title1_val'=>$title),array('Device.id'=>$this->request->data['device_id']));
            $this->DelDescription->saveField('title7_val', $title);
            echo $title;
        }
    } 
    public function update_title8()
    {
        $this->autoRender   =   false;
         if ($this->request->data) {
            App::uses('Sanitize', 'Utility');
            $title = Sanitize::clean($this->request->data['title8']);

            $this->DelDescription->id = $this->request->data['device_id'];
            //$this->Device->updateAll(array('Device.title1_val'=>$title),array('Device.id'=>$this->request->data['device_id']));
            $this->DelDescription->saveField('title8_val', $title);
            echo $title;
        }
    }
    
    public function datalog($id=NULL)
    {
        
//            $delivery_data = $this->Deliveryorder->find('all',array('conditions'=>array('Deliveryorder.is_deleted'=>0),'order' => array('Deliveryorder.id' => 'DESC')));
//        
//        $this->set('deliveryorders', $delivery_data);
    $title =   $this->Title->find('all');
            foreach($title as $title_name)
            {
                $titles[] = $title_name['Title']['title_name'];
            }
        $this->set('titles', $titles);
        if(isset($this->request->data['gate']) && isset($this->request->data['query_input']) && isset($this->request->data['equal_input']) && isset($this->request->data['val']))
        {
            //pr($this->request->data['fulllist']);exit;
        $andor = $this->request->data['gate'];
        
        $condition = $this->request->data['query_input'];
        $conditiontype = $this->request->data['equal_input'];
        $value = $this->request->data['val'];
        $conditions = $ccres = array();
        
//        $conditions['Quotation.is_deleted'] = 0;
//        $conditions['Device.quotationno'] = 'BSQ-05-000002';
        foreach($condition as $k => $con)
        {
            if($conditiontype[$k]!='LIKE')
            $ccres[$con.' '.$conditiontype[$k]]  = $value[$k];       
//            else    
//            $ccres[$con.' LIKE "%'.$value[$k].'%"']  = ''; 
        }
        
        $conditions[$andor] = $ccres;
        
        if($this->request->data['fulllist'] == 1)
        {
            
            $quotation_lists = $this->DelDescription->find('all',array('conditions'=>$conditions));
        }
        else
        {
            $quotation_lists = $this->Deliveryorder->find('all',array('conditions'=>$conditions,'order'=> array('Deliveryorder.id' => 'ASC')));
            //$quotation_lists = $this->Quotation->find('all',array('conditions'=>$conditions,'order' => array('Quotation.created' => 'ASC')));    
        }
        //$quotation_lists = $this->Quotation->find('all',array('conditions'=>$conditions,'order' => array('Quotation.created' => 'ASC')));
        
        //pr($quotation_dev_lists);exit;
        //pr($quotation_lists);
        $this->set('deliveryorders', $quotation_lists);
        //$log = $this->Quotation->getDataSource()->getLog(false, false);
        //debug($log);
        //exit;
        }
        else
        {
            //pr($this->request->data['fulllist']);exit;
        if(!isset($this->request->data['fulllist'])){
         $quotation_lists = $this->Deliveryorder->find('all',array('conditions'=>array('Deliveryorder.is_deleted'=>0),'order' => array('Deliveryorder.created' => 'ASC')));
         //$quotation_lists = $this->Quotation->find('all',array('conditions'=>array('Quotation.is_deleted'=>'0'),'order' => array('Quotation.created' => 'ASC')));    
         $this->set('fulllist', 0);
        }
        else
        {
         $quotation_lists = $this->DelDescription->find('all',array('conditions'=>array('Deliveryorder.is_deleted'=>0)));
        // $quotation_lists = $this->DelDescription->find('all',array('conditions'=>array('Quotation.is_deleted'=>0)));  
         $this->set('fulllist', 1);
        }
        $this->set('deliveryorders', $quotation_lists);
        }
    }
    
    public function reportfinal() {
            $this->viewClass = 'Media';
            // Download app/webroot/files/example.csv
            $params = array(
               'id'        => 'deliveryorderdatas.csv',
               'name'      => 'deliveryorderdatas',
               'extension' => 'csv',
               'download'  => true,
               'path'      => APP . 'webroot' . DS. 'excel'. DS  // file path
           );
           $this->set($params);
        }
}
