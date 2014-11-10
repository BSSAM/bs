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
        public $uses =array('Priority','Paymentterm','Quotation','Currency','DoDocument','PrepareInvoice',
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
            //$this->Quotation->recursive = 1; 
            if($id):
                $delivery_data = $this->Deliveryorder->find('all',array('conditions'=>array('Deliveryorder.is_deleted'=>$id),'order' => array('Deliveryorder.id' => 'DESC')));
                $this->set('deleted_val',$id);
            else:
                $delivery_data = $this->Deliveryorder->find('all',array('conditions'=>array('Deliveryorder.is_deleted'=>0),'order' => array('Deliveryorder.id' => 'DESC')));
            endif;
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
               //pr($delivery_before_quo);
               //pr($delivery_before['Salesorder']);
//               pr($this->request->data['Deliveryorder']);
               //exit;
                //$this->Description->updateAll(array('Description.is_deliveryorder_created'=>1),array('Quotation.id'=>$delivery_before_quo['Quotation']['id']));
               
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
                $new_array['salesorder_id'] = $this->request->data['Deliveryorder']['salesorder_id'];
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
                    $this->Salesorder->updateAll(array('Salesorder.is_deliveryorder_created'=>1),array('Salesorder.salesorderno'=>$this->request->data['Deliveryorder']['salesorder_id']));
                    $this->Quotation->updateAll(array('Quotation.is_deliveryorder_created'=>1),array('Quotation.quotationno'=>$delivery_before['Salesorder']['quotationno']));
                    $this->Description->updateAll(array('Description.is_deliveryorder_created'=>1),array('Description.salesorder_id'=>$this->request->data['Deliveryorder']['salesorder_id'],'Description.checking'=>1));
                    foreach($delivery_before['Description'] as $desc):
                        if($desc['checking'] == 1):
                            $this->request->data['DelDescription']['deliveryorder_id']          =   $del_last_id;
                            $this->request->data['DelDescription']['salesorder_id']             =   $desc['salesorder_id'];
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
                        $this->request->data['Logactivity']['logactivity']   =   'Add DeliveryOrder';
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
            //pr($deliveryorder);
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
            $this->set(compact('service','deliveryorder'));
            
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
            //pr($id);exit;
            $deliveryorder=$this->Deliveryorder->find('first',array('conditions'=>array('Deliveryorder.delivery_order_no'=>$id),'recursive'=>2));
            $deliver_customer = $deliveryorder['Deliveryorder']['customer_id'];
            $deliver_quotation = $deliveryorder['Deliveryorder']['quotationno'];
            $deliver_salesorder = $deliveryorder['Deliveryorder']['salesorder_id'];
            //pr($deliveryorder);exit;
            $customer=$this->Customer->find('first',array('conditions'=>array('Customer.id'=>$deliver_customer),'recursive'=>2));
            //$this->request->data['PrepareInvoice']['deliveryorder_id']=$id;
            //$this->PrepareInvoice->save($this->request->data);
            //pr($this->PrepareInvoice->find('all'));
            //pr($customer);exit;
            $ack_type = $deliveryorder['Customer']['acknowledgement_type_id'];
            if($ack_type == 1)
            {
                //pr($deliveryorder);exit;
                $updated    =   $this->Deliveryorder->updateAll(array('Deliveryorder.is_invoice_created'=>1,'Deliveryorder.is_approved'=>1,'Deliveryorder.is_approved_date'=>date('d-m-y')),array('Deliveryorder.delivery_order_no'=>$id,'Deliveryorder.po_generate_type'=>'Manual','Deliveryorder.is_poapproved'=>1,'Customer.acknowledgement_type_id'=>1));
                //return $updated;
                if($updated==1)
                {
                    $this->Quotation->updateAll(array('Quotation.is_invoice_created'=>1,'Quotation.is_delivery_approved'=>1),array('Quotation.quotationno'=>$deliver_quotation));
                    $this->Salesorder->updateAll(array('Salesorder.is_invoice_created'=>1,'Salesorder.is_delivery_approved'=>1),array('Salesorder.id'=>$deliver_salesorder));
                    //pr($this->request->data['Invoice']);exit;
                    //pr($id1);exit;
                    //$customer=$this->Customer->find('first',array('conditions'=>array('Customer.id'=>$deliver_customer),'recursive'=>2));
                    //$this->request->data['PrepareInvoice']['deliveryorder_id']=$id;
                    //$this->PrepareInvoice->save($this->request->data);
                    //pr($customer);exit;
                    $user_id = $this->Session->read('sess_userid');
                    $this->Logactivity->updateAll(array('Logactivity.logapprove'=>2,'Logactivity.approved_by'=>$user_id),array('Logactivity.logid'=>$deliveryorder['Deliveryorder']['id'],'Logactivity.logactivity'=>'Add Delivery order'));
//                    $this->request->data['Invoice']['deliveryorder_id']=$id;
//                    $this->request->data['Invoice']['customer_purchaseorder_no']='';
//                    $this->request->data['Invoice']['is_approved']=0;
//                    $this->request->data['Invoice'] = $customer;
//                    $this->Invoice->save($this->request->data);
                    $this->request->data['Datalog']['logname'] = 'Deliveryorder';
                    $this->request->data['Datalog']['logactivity'] = 'Approve';
                    $this->request->data['Datalog']['logid'] = $deliveryorder['Deliveryorder']['id'];
                    $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                    $this->Datalog->create();
                    $this->Datalog->save($this->request->data['Datalog']);
                    
                    /******************
                    * Data Log - Invoice
                    */
                    $this->request->data['Logactivity']['logname'] = 'Invoice';
                    $this->request->data['Logactivity']['logactivity'] = 'Add';
                    $this->request->data['Logactivity']['logid'] = $id;
                    $this->request->data['Logactivity']['user_id'] = $this->Session->read('sess_userid');
                    $this->request->data['Logactivity']['logapprove'] = 1;
                    $this->Logactivity->create();
                    $this->Logactivity->save($this->request->data['Logactivity']);

                    $this->request->data['Datalog']['logname'] = 'Invoice';
                    $this->request->data['Datalog']['logactivity'] = 'Add';
                    $this->request->data['Datalog']['logid'] = $id;
                    $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                    $this->Datalog->create();
                    $this->Datalog->save($this->request->data['Datalog']);

                    /******************/ 
                }
                else
                {
                    $this->Session->setFlash(__('Purchase Order Needs to be Given(Manually) to get Approval'));
                    $text = "Purchase Order Needs to be Given(Manually) to get Approval";
                    return $text;
                    
    //                $this->redirect(array('controller'=>'Deliveryorders','action'=>'index'));
                }
            }
            else if($ack_type == 2)
            {
                //pr($deliveryorder);exit;
                $updated    =   $this->Deliveryorder->updateAll(array('Deliveryorder.is_invoice_created'=>1,'Deliveryorder.is_approved'=>1,'Deliveryorder.is_approved_date'=>date('d-m-y')),array('Deliveryorder.delivery_order_no'=>$id,'Customer.acknowledgement_type_id'=>2));
                $this->Quotation->updateAll(array('Quotation.is_invoice_created'=>1,'Quotation.is_delivery_approved'=>1),array('Quotation.quotationno'=>$deliver_quotation));
                $this->Salesorder->updateAll(array('Salesorder.is_invoice_created'=>1,'Salesorder.is_delivery_approved'=>1),array('Salesorder.id'=>$deliver_salesorder));
                //return $updated;
                if($updated==1)
                {
                    //pr($this->request->data['Invoice']);exit;
                    //pr($id1);exit;
                    //$customer=$this->Customer->find('first',array('conditions'=>array('Customer.id'=>$deliver_customer),'recursive'=>2));
                    //$this->request->data['PrepareInvoice']['deliveryorder_id']=$id;
                    //$this->PrepareInvoice->save($this->request->data);
                    //pr($customer);exit;
                    $user_id = $this->Session->read('sess_userid');
                    $this->Logactivity->updateAll(array('Logactivity.logapprove'=>2,'Logactivity.approved_by'=>$user_id),array('Logactivity.logid'=>$deliveryorder['Deliveryorder']['id'],'Logactivity.logactivity'=>'Add Delivery order'));
                    
                    /******************
                    * Data Log - Client PO
                    */
                    $this->request->data['Logactivity']['logname'] = 'ClientPO';
                    $this->request->data['Logactivity']['logactivity'] = 'Add';
                    $this->request->data['Logactivity']['logid'] = $id;
                    $this->request->data['Logactivity']['user_id'] = $this->Session->read('sess_userid');
                    $this->request->data['Logactivity']['logapprove'] = 1;
                    $this->Logactivity->create();
                    $this->Logactivity->save($this->request->data['Logactivity']);

                    $this->request->data['Datalog']['logname'] = 'ClientPO';
                    $this->request->data['Datalog']['logactivity'] = 'Add';
                    $this->request->data['Datalog']['logid'] = $id;
                    $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                    $this->Datalog->create();
                    $this->Datalog->save($this->request->data['Datalog']);

                    /******************/ 
                     /******************
                    * Data Log - Invoice
                    */
                    $this->request->data['Logactivity']['logname'] = 'Invoice';
                    $this->request->data['Logactivity']['logactivity'] = 'Add';
                    $this->request->data['Logactivity']['logid'] = $id;
                    $this->request->data['Logactivity']['user_id'] = $this->Session->read('sess_userid');
                    $this->request->data['Logactivity']['logapprove'] = 1;
                    $this->Logactivity->create();
                    $this->Logactivity->save($this->request->data['Logactivity']);

                    $this->request->data['Datalog']['logname'] = 'Invoice';
                    $this->request->data['Datalog']['logactivity'] = 'Add';
                    $this->request->data['Datalog']['logid'] = $id;
                    $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                    $this->Datalog->create();
                    $this->Datalog->save($this->request->data['Datalog']);

                    /******************/ 
                    
                    
                    $this->request->data['Datalog']['logname'] = 'Deliveryorder';
                    $this->request->data['Datalog']['logactivity'] = 'Approve';
                    $this->request->data['Datalog']['logid'] = $deliveryorder['Deliveryorder']['id'];
                    $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                    $this->Datalog->create();
                    $this->Datalog->save($this->request->data['Datalog']);
                    
                }
                
            }
            else
            {
                $updated    =   $this->Deliveryorder->updateAll(array('Deliveryorder.is_invoice_created'=>1,'Deliveryorder.is_approved'=>1,'Deliveryorder.is_approved_date'=>date('d-m-y','now')),array('Deliveryorder.delivery_order_no'=>$id,'Customer.acknowledgement_type_id'=>3));
                $this->Quotation->updateAll(array('Quotation.is_invoice_created'=>1,'Quotation.is_delivery_approved'=>1),array('Quotation.quotationno'=>$deliver_quotation));
                $this->Salesorder->updateAll(array('Salesorder.is_invoice_created'=>1,'Salesorder.is_delivery_approved'=>1),array('Salesorder.id'=>$deliver_salesorder));
                if($updated==1)
                {
                //pr($id1);exit;
                $user_id = $this->Session->read('sess_userid');
                $this->Logactivity->updateAll(array('Logactivity.logapprove'=>2,'Logactivity.approved_by'=>$user_id),array('Logactivity.logid'=>$deliveryorder['Deliveryorder']['id'],'Logactivity.logactivity'=>'Add Delivery order'));
//                $this->request->data['Invoice']['deliveryorder_id']=$id;
//                $this->request->data['Invoice']['customer_purchaseorder_no']='';
//                $this->request->data['Invoice']['is_approved']=0;
//                $this->Invoice->save($this->request->data);
                $this->request->data['Datalog']['logname'] = 'Deliveryorder';
                $this->request->data['Datalog']['logactivity'] = 'Approve';
                $this->request->data['Datalog']['logid'] = $deliveryorder['Deliveryorder']['id'];
                $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                $this->Datalog->create();
                $this->Datalog->save($this->request->data['Datalog']);
                
                /******************
                * Data Log - Invoice
                */
                $this->request->data['Logactivity']['logname'] = 'Invoice';
                $this->request->data['Logactivity']['logactivity'] = 'Add';
                $this->request->data['Logactivity']['logid'] = $id;
                $this->request->data['Logactivity']['user_id'] = $this->Session->read('sess_userid');
                $this->request->data['Logactivity']['logapprove'] = 1;
                $this->Logactivity->create();
                $this->Logactivity->save($this->request->data['Logactivity']);

                $this->request->data['Datalog']['logname'] = 'Invoice';
                $this->request->data['Datalog']['logactivity'] = 'Add';
                $this->request->data['Datalog']['logid'] = $id;
                $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                $this->Datalog->create();
                $this->Datalog->save($this->request->data['Datalog']);

                /******************/ 
                
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
                    echo "<div class='delivery_no_result' align='left'>";
                    echo "No Results Found";
                    echo "<br>";
                    echo "</div>";
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
                echo "Search is Empty";
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
        function pdf($id = NULL) 
        {
        
            $this->autoRender = false;
            $deliveryorder_data = $this->Deliveryorder->find('first', array('conditions' => array('Deliveryorder.id' => $id),'recursive'=>3));
            //pr($deliveryorder_data);exit;
            $file_type = 'pdf';
            $filename = $deliveryorder_data['Deliveryorder']['delivery_order_no'];
            $html = '<!DOCTYPE html>
                    <html lang="en">
                    <head>
                    <meta charset="utf-8" />
                    <title>'.$deliveryorder_data['Deliveryorder']['delivery_order_no'].'</title>
                    <style>
                    body { background-color:#fff; font-family:"Open Sans", "Helvetica Neue", Helvetica, Arial, sans-serif; color:#394263; font-size:14px; }
                    * { text-decoration: none; font-size: 1em; outline: none; padding: 0; margin: 0; }
                    .group:before, .group:after { content: ""; display: table; }
                    .group:after { clear: both; }
                    .group { zoom: 1; /* For IE 6/7 (trigger hasLayout) */ }
                    .pdf_container { margin: 0 auto; min-height: 800px; padding: 10px; width: 700px; }
                    .header_id { padding:10px 0; width:100%; display:block; }
                    .logo { margin-top:10px;display:inline-block;width:50%; }
                    .address_details { width:46%; line-height:20px; text-align:right;display:inline-block; }
                    .address_details p { float:left; width:100%; }
                    .address_details a { color: #1bbae1; float:left; width:100%; }
                    .cmpny_reg { background:#FF8E00; padding:5px; color:#fff; text-transform:uppercase; width:100%; float:left; margin:10px 0 0 -8px; }
                    .address_box { border: 1px solid #ccc; margin-top: 20px; padding: 10px; width: 47%; min-height: 185px;display:inline-block; }
                    .address_box h2 { width:100%; padding:5px 0; font-size:23px; font-weight:bold; text-align:center; display:inline-block;}
                    .address_box p { display:inline-block;}
                    .invoice_address_blog { margin-top:20px; display:inline-block;width:100%;}
                    .invoice_add {  margin:3px 0; display:inline-block;width:100%;}
                    .invoice_add h5 { display:inline-block; width:30%; }
                    .invoice_add span { margin-right:15px;display:inline-block; }
                    .invoice_add abbr { font-style: italic;display:inline-block; }
                    .services_details { margin-top:20px; width:100%; }
                    .services_details h4 { width:100%; margin-top:20px; font-size:15px; font-weight:bold; }
                    .services_details h4 abbr { width: 22%; display:inline-block;}
                    .services_details h4 span { color:#fff; background-color:#1BBAE1; padding: 0 10px; }
                    .invoice_table { width:100%; margin-top:20px;margin-bottom:30px; }
                    .invoice_table table { width:100%; border:1px  solid #ccc !important; border-bottom:none !important; border-left:none !important; }
                    .invoice_table th, td { padding: 10px; text-align: center; text-transform:uppercase; border:1px solid #ccc !important; border-top:none !important; border-right:none !important; }
                    .invoice_table table thead { background-color: #f1f1f1; }
                    .instrument h4 { font-weight:normal; }
                    .instrument span { font-size: 13px; color: #2980b9; font-style: italic; margin: 0 10px; }
                    .address_table{width:50%;display:inline-block;}
                        .address_table table{width:100%;border:1px solid #ccc;}
                      .address_table td { padding: 10px; text-align: left !important; text-transform:none; border:none !important; }
                    </style>
                    </head>';
            //foreach ($salesorder_data as $salesorder_data_list):
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
            
                foreach($deliveryorder_data['Salesorder']['Description'] as $device):
                    $device_name[] = $device;
                endforeach;
                
            //endforeach;
            $html .= '<body>
                <div class="pdf_container group"> 
                     <!-- header part-->
                     <div class="header_id">
                          <div class="f_left logo"><img src="img/logoBs.png" width="273" height="50" alt="" /></div>
                          <div class="address_details f_right">
                               <p>41 SENOKO DRIVE</p>
                               <p>SINGAPORE</p>
                               <p>758249</p>
                               <p> 6458 4411</p>
                               <a href="#" title="">invoice@bestandards.com</a>
                               <div class="cmpny_reg">GST REG NO. M200510697 / COMPANY REG NO. 200510697M</div>
                          </div>
                     </div>
                            <div class="address_table" style="margin-bottom:20px;">
                          <table style="height:250px;">
                          <tbody>
                          <tr><td>'.$customername.'<br>'.$billing_address.'<br>'.$postalcode.'</td></tr>
                          <tr><td style="text-transform:uppercase;font-weight:bold;">ATTN:<span style="font-weight:normal;text-transform:none;margin-left:20px;font-style:italic;">'.$contactperson.'</span></td></tr>
                          <tr><td style="text-transform:uppercase;font-weight:bold;">TEL:<span style="font-weight:normal;text-transform:none;margin-left:20px;font-style:italic;">'.$phone.'</span></td></tr>
                          <tr><td style="text-transform:uppercase;font-weight:bold;">FAX:<span style="font-weight:normal;text-transform:none;margin-left:20px;font-style:italic;">'.$fax.'</span></td></tr>
                          <tr><td style="text-transform:uppercase;font-weight:bold;">EMAIL:<span style="font-weight:normal;text-transform:none;margin-left:20px;font-style:italic;">'.$email.'</span></td></tr>
                </tbody>
                          </table>

                </div>
                        <div class="address_table" style="margin-bottom:20px;">
                          <table style="height:250px;">
                          <tbody>
                          <tr><td style="text-align:center;font-weight:bold;font-size:20px;">'.$deliveryorderno.'</td></tr>
                         <tr><td style="text-transform:uppercase;font-weight:bold;width:36%;">PO NO:<span style="font-weight:normal;text-transform:none;margin-left:20px;font-style:italic;">'.$ref_no.'</span></td></tr>
                          
                          <tr><td style="text-transform:uppercase;font-weight:bold;width:36%;">DATE:<span style="font-weight:normal;text-transform:none;margin-left:20px;font-style:italic;">'.$reg_date.'</span></td></tr>
                          <tr><td style="text-transform:uppercase;font-weight:bold;width:36%;">PAYMENT TERM:<span style="font-weight:normal;text-transform:none;margin-left:20px;font-style:italic;">'.$payment_term.'</span></td></tr>
                </tbody>
                          </table>

                </div>
                     <div class="services_details f_left">
                          <p>Being provided calibration service of the following(s) :</p>
                          <h4 class="f_left"><abbr>DELIVERY ORDER NO</abbr><span> '.$deliveryorderno.'</span></h4>
                     </div>
                     <div class="invoice_table f_left">
                          <table cellpadding="0" cellspacing="0">
                               <thead>
                                    <tr>
                                         <th>Instrument</th>
                                         <th>Brand</th>
                                         <th>Model</th>
                                         <th>Serial No</th>
                                         <th>Quantity</th>
                                         <th>Unit Price $(SGD)</th>
                                         <th>Total Price $(SGD)</th>
                                    </tr>
                               </thead>
                               <tbody>';
                $subtotal = 0;
                foreach($device_name as $device):
                    $html .= '
                    <tr>
                        <td class="instrument"><h4>'.$device['Instrument']['name'].'</h4>
                            <span>Faulty</span> <span>'.$device['Range']['range_name'].'</span></td>
                        <td>'.$device['Brand']['brandname'].'</td>
                        <td>'.$device['model_no'].'</td>
                        <td>53254324</td>
                        <td>1</td>
                        <td> $'.$device['sales_unitprice'].'</td>
                        <td> $'.$device['sales_total'].'</td>
                    </tr>';
                $subtotal = $subtotal + $device['sales_total']; 
                endforeach;
                
                $gst = $subtotal * 0.07;
                $total_due = $gst + $subtotal;
                App::uses('CakeNumber', 'Utility');$currency = 'USD';
                $total_due = CakeNumber::currency($total_due, $currency);
                $gst = CakeNumber::currency($gst, $currency);
                $subtotal = CakeNumber::currency($subtotal, $currency);
                $html .= '<tr>
                         <td colspan="6">SUBTOTAL</td>
                         <td>'.$subtotal.'</td>
                    </tr>
                    <tr>
                         <td colspan="6">GST ( 7.00% )</td>
                         <td>'.$gst.'</td>
                    </tr>
                    <tr>
                         <td colspan="6"><h4>TOTAL DUE</h4></td>
                         <td><h4>'.$total_due.'</h4></td>
                    </tr>
               </tbody>
          </table>
     </div>
</div>
</body>
</html>';
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
       
}
