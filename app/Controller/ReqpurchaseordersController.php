<?php
    class ReqpurchaseordersController extends AppController
    {
        public $helpers = array('Html','Form','Session');
        public $uses =array('Priority','Paymentterm','Quotation','Currency','Contactpersoninfo','SalesDocument','PurchaseRequisition','ReqDevice',
                            'Country','Additionalcharge','Service','CustomerInstrument','Customerspecialneed','Reqpurchaseorder','ReqCustomerSpecialNeed',
                            'Instrument','Instrumentforgroup','Brand','Customer','Device','Salesorder','Description','Logactivity','branch','Datalog');
        public function index()
        {
            /*******************************************************
             *  BS V1.0
             *  User Role Permission
             *  Controller : Salesorder
             *  Permission : view 
            *******************************************************/
            $user_role = $this->userrole_permission();
            if($user_role['job_prpurchaseorder']['view'] == 0){ 
                return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
            }

            $this->set('userrole_cus',$user_role['job_prpurchaseorder']);
            /*
             * *****************************************************
             */
                //$this->Quotation->recursive = 1; 
                $reqpurchaseorder_list = $this->Reqpurchaseorder->find('all',array('conditions'=>array('Reqpurchaseorder.is_deleted'=>0),'order' => array('Reqpurchaseorder.id' => 'DESC')));
                //pr($reqpurchaseorder_list);exit;
                $this->set('req_purchase', $reqpurchaseorder_list);
       }
        public function add()
        {
            /*******************************************************
             *  BS V1.0
             *  User Role Permission
             *  Controller : Sales Order
             *  Permission : add 
             *  Description   :   add Salesorder Details page
             *******************************************************/
            $user_role = $this->userrole_permission();
            if($user_role['job_prpurchaseorder']['add'] == 0){ 
                return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
            }
            /*
             * *****************************************************
             */
            $priority=$this->Priority->find('list',array('fields'=>array('id','priority')));
            $payment=$this->Paymentterm->find('list',array('fields'=>array('id','pay')));
            $service=$this->Service->find('list',array('fields'=>array('id','servicetype')));
            $this->set(compact('service','payment','priority'));
            
            if($this->request->is('post'))
            {
                $branch =   $this->branch->find('first',array('conditions'=>array('branch.defaultbranch'=>1,'branch.status'=>1)));
                $this->request->data['Reqpurchaseorder']['branch_id']=$branch['branch']['id'];
                if($this->Reqpurchaseorder->save($this->request->data['Reqpurchaseorder']))
                {
                    $req_purchaseorderid  =   $this->Reqpurchaseorder->getLastInsertID();
                    /***********************for pending process in Salesorder*************************************/
                    $device_node    =   $this->ReqDevice->find('all',array('conditions'=>array('ReqDevice.prequistionno'=>$this->request->data['Reqpurchaseorder']['prequisitionno'],'ReqDevice.status'=>0)));
                    if(!empty($device_node))
                    {
                        $this->ReqDevice->updateAll(array('ReqDevice.reqpurchaseorder_id'=>'"'.$req_purchaseorderid.'"','ReqDevice.status'=>1),array('ReqDevice.prequistionno'=>$this->request->data['Reqpurchaseorder']['prequisitionno'],'ReqDevice.status'=>0));
                    }
                    $this->request->data['ReqCustomerSpecialNeed']['reqpurchaseorder_id']=$req_purchaseorderid;
                    $this->ReqCustomerSpecialNeed->save($this->request->data['ReqCustomerSpecialNeed']); 
                    
                    $this->PurchaseRequisition->updateAll(array('PurchaseRequisition.is_prpurchaseorder_created'=>1),array('PurchaseRequisition.prequistionno'=>$this->request->data['Reqpurchaseorder']['prequisitionno']));
                 
                    /******************
                     * Data Log
                    */
                    $this->request->data['Logactivity']['logname']   =   'Reqpurchaseorder';
                    $this->request->data['Logactivity']['logactivity']   =   'Add Reqpurchaseorder';
                    $this->request->data['Logactivity']['logid']   =   $req_purchaseorderid;
                    $this->request->data['Logactivity']['loguser'] = $this->Session->read('sess_userid');
                    $this->request->data['Logactivity']['logapprove'] = 1;
                    $a = $this->Logactivity->save($this->request->data['Logactivity']);
                    //pr($a);exit;
                    /******************/
                    $this->Session->setFlash(__('PR_Purchase order  has been Added Successfully'));
                    $this->redirect(array('controller'=>'Reqpurchaseorders','action'=>'index'));
                }
            }
        }
        public function pr_purchaseorder($id=NULL)
        {
            
            /*******************************************************
             *  BS V1.0
             *  User Role Permission
             *  Controller : Sales Order
             *  Permission : add 
             *  Description   :   add Salesorder Details page
             *******************************************************/
            $user_role = $this->userrole_permission();
            if($user_role['job_prpurchaseorder']['add'] == 0){ 
                return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
            }
            /*
             * *****************************************************
             */
            $dmt    =   $this->random('pr_purchaseorder');
            $this->set('prequistionno', $dmt);
            $priority=$this->Priority->find('list',array('fields'=>array('id','priority')));
            
            
            //$instrumentforgroup=$this->Instrumentforgroup->find('list',array('fields'=>array('id','priority')));
            $payment=$this->Paymentterm->find('list',array('fields'=>array('id','pay')));
            $service=$this->Service->find('list',array('fields'=>array('id','servicetype')));
            $this->set(compact('service','payment','priority'));
            $branch =   $this->branch->find('first',array('conditions'=>array('branch.defaultbranch'=>1,'branch.status'=>1)));
            
            if($this->request->is('post'))
            {
                $req_purchaseorderid  =   $this->Reqpurchaseorder->getLastInsertID();       
                $this->ReqDevice->deleteAll(array('ReqDevice.reqpurchaseorder_id'=>$id,'ReqDevice.status'=>0));
                $requistion_id  =   $this->request->data['Reqpurchaseorder']['prequistion_id'];
                $additional=$this->Additionalcharge->find('list',array('fields'=>array('id','additionalcharge')));
                $country=$this->Country->find('list',array('fields'=>array('id','country')));
                $con = $this->PurchaseRequisition->find('first',array('conditions'=>array('PurchaseRequisition.prequistionno'=>$this->request->data['Reqpurchaseorder']['prequistion_id'],'PurchaseRequisition.is_superviser_approved'=>1,'PurchaseRequisition.is_manager_approved'=>1,'PurchaseRequisition.is_deleted '=>0)));
                $instrument_type = $con['InstrumentType']['purchase_requisition'];
                //pr($instrument_type); exit;
                $this->set(compact('instrument_type','country','additional'));
                $contact_list   =   $this->Contactpersoninfo->find('list',array('conditions'=>array('Contactpersoninfo.customer_id'=>$con['PurchaseRequisition']['customer_id'],'Contactpersoninfo.status'=>1),'fields'=>array('id','name')));
                //pr($contact_list);exit;
                $this->set(compact('contact_list'));
                $req_details =  $con['PurchaseRequisition'];
                $req_pur['Reqpurchaseorder']          =    $req_details;
                $req_pur['ReqCustomerSpecialNeed']    =    $con['PreqCustomerSpecialNeed'];
                $req_pur['InstrumentType']            =    $con['InstrumentType'];
                $req_pur['ReqDevice']                 =    $con['PreqDevice'];
                           
                $this->set('requistion_details',$req_pur);
                
                foreach($req_pur['ReqDevice'] as $sale):
                    $this->ReqDevice->create();
                    $this->request->data['ReqDevice']['is_approved']    =   0;
                    $description_data  =   $this->preq_devices($sale['id']);
                    $this->ReqDevice->save($description_data);
                endforeach;   
                $this->request->data =   $req_pur;
                 /******************
                     * Data Log
                    */
                    $this->request->data['Logactivity']['logname']   =   'Reqpurchaseorder';
                    $this->request->data['Logactivity']['logactivity']   =   'Add Reqpurchaseorder';
                    $this->request->data['Logactivity']['logid']   =   $req_purchaseorderid;
                    $this->request->data['Logactivity']['loguser'] = $this->Session->read('sess_userid');
                    $this->request->data['Logactivity']['logapprove'] = 1;
                    $a = $this->Logactivity->save($this->request->data['Logactivity']);
                    //pr($a);exit;
                    /******************/
            }
            else
            {
                $this->redirect(array('controller'=>'Reqpurchaseorders','action'=>'index'));
            }
           
        }
        public function edit($id=NULL)
        {
            /*******************************************************
             *  BS V1.0
             *  User Role Permission
             *  Controller : Sales Order
             *  Permission : Edit 
             *  Description   :   Edit Salesorder Details page
             *******************************************************/
            $user_role = $this->userrole_permission();
            if($user_role['job_prpurchaseorder']['edit'] == 0){ 
                return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
            }
            /*
             * *****************************************************
             */
            $priority=$this->Priority->find('list',array('fields'=>array('id','priority')));
            $payment=$this->Paymentterm->find('list',array('fields'=>array('id','pay')));
            $service=$this->Service->find('list',array('fields'=>array('id','servicetype')));
            
            $additional=$this->Additionalcharge->find('list',array('fields'=>array('id','additionalcharge')));
            $country=$this->Country->find('list',array('fields'=>array('id','country')));
            
            $reqpurchaseorder_details=$this->Reqpurchaseorder->find('first',array('conditions'=>array('Reqpurchaseorder.id'=>$id),'recursive'=>'2'));
            $this->set('requistion_details',$reqpurchaseorder_details);
            $this->set(compact('priority','payment','service','country','additional'));
            if($this->request->is(array('post','put')))
            {
                $this->Reqpurchaseorder->id =    $id;
                if($this->Reqpurchaseorder->save($this->request->data['Reqpurchaseorder']))
                {
                    $this->ReqCustomerSpecialNeed->id =    $this->request->data['ReqCustomerSpecialNeed']['id'];
                    $this->ReqCustomerSpecialNeed->save($this->request->data['ReqCustomerSpecialNeed']); 
                    /******************
                    * Data Log
                    */
//                    $req_purchaseorderid    =  $this->request->data['Reqpurchaseorder']['reqpurchaseno']; 
//                    $this->request->data['Logactivity']['logname'] = 'PRPurchase';
//                    $this->request->data['Logactivity']['logactivity'] = 'Edit PRPurchase';
//                    $this->request->data['Logactivity']['logid'] = $id;
//                    $this->request->data['Logactivity']['logid'] = $req_purchaseorderid;
//                    $this->request->data['Logactivity']['loguser'] = $this->Session->read('sess_userid');
//                    $this->request->data['Logactivity']['logapprove'] = 1;
//                    $a = $this->Logactivity->save($this->request->data['Logactivity']);

                    $this->Session->setFlash(__('PRPurchase Order has been Updated Successfully '));
                    $this->redirect(array('controller'=>'Reqpurchaseorders','action'=>'index'));
                }
                
            }
                else
                {
                    $this->request->data=$reqpurchaseorder_details;
                }
        }
        public function delete($id=NULL)
        {
        /*******************************************************
         *  BS V1.0
         *  User Role Permission
         *  Controller : Requisition Purchase Order
         *  Permission : Delete 
         *  Description   :   Delete Requisition Purchase Order Details page
         *******************************************************/
        $user_role = $this->userrole_permission();
        if($user_role['job_prpurchaseorder']['delete'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        /*
         * *****************************************************
         */
            if($id!='')
            {
                if($this->Reqpurchaseorder->updateAll(array('Reqpurchaseorder.is_deleted'=>1),array('Reqpurchaseorder.id'=>$id)))
                {
                    /******************
                        * Data Log Activity
                        */
                        $this->request->data['Datalog']['logname'] = 'PRPurchase';
                        $this->request->data['Datalog']['logactivity'] = 'Delete';
                        $this->request->data['Datalog']['logid'] = $id;
                        $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                    
                        $a = $this->Datalog->save($this->request->data['Datalog']);
                    
                        /******************/   
                    $this->Session->setFlash(__('The PR Purchase Order has been deleted',h($id)));
                    return $this->redirect(array('controller'=>'Reqpurchaseorders','action'=>'index'));
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
            $data = $this->Customer->find('all',array('conditions'=>array('customername LIKE'=>'%'.$name.'%')));
            $c = count($data);
            for($i = 0; $i<$c;$i++)
            { 
                echo "<div class='show' align='left' id='".$data[$i]['Customer']['id']."'>";
                echo $data[$i]['Customer']['customername'];
                echo "<br>";
                echo "</div>";
            }
        }
        public function get_customer_value()
        {
            $this->loadModel('Customer');
            $this->autoRender = false;
            $customer_id =  $this->request->data['cust_id'];
            $customer_data = $this->Customer->find('first',array('conditions'=>array('Customer.id'=>$customer_id),'recursive'=>'2'));
           
            if(!empty($customer_data))
            {
                echo json_encode($customer_data) ;
            }
        }
        
        public function preq_search()
        {
            
            $this->autoRender = false;
            $this->loadModel('PurchaseRequisition');
            $name =  $this->request->data['id'];
       
                $data = $this->PurchaseRequisition->find('all',array('conditions'=>array('PurchaseRequisition.is_manager_approved'=>1,'PurchaseRequisition.is_superviser_approved'=>1,'PurchaseRequisition.is_deleted'=>0,'PurchaseRequisition.is_prpurchaseorder_created'=>0,'PurchaseRequisition.prequistionno  LIKE'=>'%'.$name.'%',)));
               
                $c = count($data);
                if($c!=0)
                {
                     for($i = 0; $i<$c;$i++)
                     { 
                         echo "<div class='quotation_single instrument_drop_show' align='left' id='".$data[$i]['PurchaseRequisition']['id']."'>";
                         echo $data[$i]['PurchaseRequisition']['prequistionno'];
                         echo "<br>";
                         echo "</div>";
                     }
                 }
                 else
                 {
                     echo "<div class='no_result instrument_drop_show' align='left'>";
                     echo "No Results Found";
                     echo "<br>";
                     echo "</div>";
                 }  
                 
        }
        
       
        public function approve()
        {
            $this->autoRender=false;
            $id =  $this->request->data['id'];
            $this->Reqpurchaseorder->updateAll(array('Reqpurchaseorder.is_approved'=>1),array('Reqpurchaseorder.id'=>$id));
            $user_id = $this->Session->read('sess_userid');
            $this->Logactivity->updateAll(array('Logactivity.logapprove'=>2,'Logactivity.approved_by'=>$user_id),array('Logactivity.logid'=>$id,'Logactivity.logname'=>'PRPurchase'));
        }
        public function calendar()
        {
            $this->autoRender = false;
            $cal = $this->Reqpurchaseorder->find('all', array('conditions' => array('Reqpurchaseorder.status' => 1, 'Reqpurchaseorder.is_approved' => 1), 'group' => 'reg_date', 'fields' => array('count(Reqpurchaseorder.reg_date) as title', 'reg_date as start'), 'recursive' => '-1'));

            $event_array = array();
            foreach ($cal as $cal_list => $v) {

                $event_array[$cal_list]['title'] = $v[0]['title'];
                $event_array[$cal_list]['start'] = $v['Reqpurchaseorder']['start'];
            }
            return json_encode($event_array);

        }
        
}

?>
