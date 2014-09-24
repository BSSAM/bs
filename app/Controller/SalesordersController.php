<?php
    class SalesordersController extends AppController
    {
        public $helpers = array('Html','Form','Session','xls','Number');
        public $uses =array('Priority','Paymentterm','Quotation','Currency','Contactpersoninfo','SalesDocument',
                            'Country','Additionalcharge','Service','CustomerInstrument','Customerspecialneed',
                            'Instrument','Instrumentforgroup','Brand','Customer','Device','Salesorder','Description','Logactivity','branch','Datalog','InstrumentType');
        public function index()
        {
        /*******************************************************
         *  BS V1.0
         *  User Role Permission
         *  Controller : Salesorder
         *  Permission : view 
        *******************************************************/
        $user_role = $this->userrole_permission();
        if($user_role['job_salesorder']['view'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        
        $this->set('userrole_cus',$user_role['job_salesorder']);
        /*
         * *****************************************************
         */
            //$this->Quotation->recursive = 1; 
            $salesorder_list = $this->Salesorder->find('all',array('conditions'=>array('Salesorder.is_deleted'=>0),'order' => array('Salesorder.id' => 'DESC')));
            $this->set('salesorder', $salesorder_list);
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
        if($user_role['job_salesorder']['add'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        /*
         * *****************************************************
         */
            $dmt    =   $this->random('salesorder');
            $track_id=$this->random('track');
            $this->set('our_ref_no', $track_id);
            $this->set('salesorderno', $dmt);
            $priority=$this->Priority->find('list',array('fields'=>array('id','priority')));
            $payment=$this->Paymentterm->find('list',array('fields'=>array('id','pay')));
            $service=$this->Service->find('list',array('fields'=>array('id','servicetype')));
            $instrument_types=$this->InstrumentType->find('list',array('conditions'=>array('InstrumentType.status'=>1,'is_deleted'=>0),'fields'=>array('id','salesorder')));
            
            $this->set(compact('service','payment','priority','instrument_types'));
            $branch =   $this->branch->find('first',array('conditions'=>array('branch.defaultbranch'=>1,'branch.status'=>1)));
            
            if($this->request->is('post'))
            {
               
                //$con = $this->Quotation->find('first',array('conditions'=>array('Quotation.quotationno'=>$this->request->data['Salesorder']['quotationno'],'Quotation.is_approved'=>1,'Quotation.status'=>1)));
                        //$instrument_type = $con['InstrumentType']['salesorder'];
                        //pr($instrument_type);exit;
                        //echo $instrument_type; exit;
                $this->set('instrument_types',$instrument_types);
                $customer_id    =   $this->request->data['Salesorder']['customer_id'];
                $this->request->data['Salesorder']['customername']=$this->request->data['sales_customername'];
                $this->request->data['Salesorder']['id']=$this->request->data['Salesorder']['salesorderno'];
                $quotation_array  = explode('-', $this->request->data['Salesorder']['salesorderno']);
                $quotation_array[0]="BSQ";$quotation_id  =  implode($quotation_array,'-');
                
                $this->request->data['Salesorder']['branch_id']=$branch['branch']['id'];
                $this->request->data['Salesorder']['quotationno']=$quotation_id;
                
                // PO Auto Generate
                $ref_no_po =   explode(',',$this->request->data['Salesorder']['ref_no']);
                foreach($ref_no_po as $k=>$v):
                    $count_po[$k]   =   0;
                endforeach;
                $p_count_string =   implode($count_po,',');
                if ($this->request->data['Salesorder']['ref_no'] != '') 
                {
                    $check_string = strchr($this->request->data['Salesorder']['ref_no'], 'CPO');
                    $po_type = ($check_string == "") ? 'Manual' : 'Automatic';
                }
                //For Quotation array
//                if( $this->request->data['Quotation']['quotation_no']!=''):
//                $qo_id_array  =   $this->request->data['Quotation']['quotation_no'];
//                $qo_count_array   =   $this->request->data['Quotation']['quo_quantity'];
//                $po_array['Clientpo']['Quotation']         = array_combine($qo_id_array,$qo_count_array);
//                    foreach($po_array['Clientpo']['Quotation'] as $quotationno=>$quotationcount){
//                        $this->Quotation->updateAll(array('Quotation.ref_no'=>'"'.$this->request->data['Quotation']['clientpo_no'].'"','Quotation.po_generate_type'=>'"'.$po_type.'"','Quotation.is_assign_po'=>1),array('Quotation.quotationno'=>$quotationno));
//                    }
//                endif;
                $this->request->data['Salesorder']['po_generate_type']=$po_type;
                $this->request->data['Salesorder']['ref_count']=$p_count_string;
                if($this->Salesorder->save($this->request->data['Salesorder']))
                {
                    $sales_orderid  =   $this->Salesorder->getLastInsertID();
                    $create_quotation   =   $this->create_automatic_quotation($sales_orderid);
                   
                    /***********************for pending process in Salesorder*************************************/
                    $device_node    =   $this->Description->find('all',array('conditions'=>array('Description.customer_id'=>$customer_id,'Description.salesorder_id'=>$this->request->data['Salesorder']['salesorderno'],'Description.status'=>0)));
                    if(!empty($device_node))
                    {
                        $this->Description->updateAll(array('Description.quotationno'=>'"'.$quotation_id.'"','Description.salesorder_id'=>'"'.$sales_orderid.'"','Description.status'=>1),array('Description.customer_id'=>$customer_id,'Description.salesorder_id'=>$this->request->data['Salesorder']['salesorderno'],'Description.status'=>0));
                    }
                    $sales_document =   $this->SalesDocument->deleteAll(array('SalesDocument.Salesorderno'=>$this->request->data['Salesorder']['salesorderno'],'SalesDocument.status'=>0));
                    $this->SalesDocument->updateAll(array('SalesDocument.salesorder_id'=>'"'.$this->request->data['Salesorder']['salesorderno'].'"','SalesDocument.customer_id'=>'"'.$customer_id.'"'),array('SalesDocument.salesorderno'=>$this->request->data['Salesorder']['salesorderno'],'SalesDocument.status'=>1));
                    /******************
                     * Data Log
                    */
                    $this->request->data['Logactivity']['logname']   =   'Salesorder';
                    $this->request->data['Logactivity']['logactivity']   =   'Add SalesOrder';
                    $this->request->data['Logactivity']['logid']   =   $sales_orderid;
                    $this->request->data['Logactivity']['logno']   =   $sales_orderid;
                    $this->request->data['Logactivity']['loguser'] = $this->Session->read('sess_userid');
                    $this->request->data['Logactivity']['logapprove'] = 1;
                    $a = $this->Logactivity->save($this->request->data['Logactivity']);
                    //pr($a);exit;
                    /******************/
                    /******************
                    * Data Log Activity
                    */
                    $this->request->data['Datalog']['logname'] = 'Salesorder';
                    $this->request->data['Datalog']['logactivity'] = 'Add';
                    $this->request->data['Datalog']['logid'] = $sales_orderid;
                    $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                    
                    $a = $this->Datalog->save($this->request->data['Datalog']);
                    
                    /******************/ 
                    $this->Session->setFlash(__('Salesorder & Quotation has been Added Successfully'));
                    $this->redirect(array('controller'=>'Salesorders','action'=>'index'));
                }
            }
        }
        public function Salesorder_by_quotation($id=NULL)
        {
            
        /*******************************************************
         *  BS V1.0
         *  User Role Permission
         *  Controller : Sales Order
         *  Permission : add 
         *  Description   :   add Salesorder Details page
         *******************************************************/
        $user_role = $this->userrole_permission();
        if($user_role['job_salesorder']['add'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        /*
         * *****************************************************
         */
            $dmt    =   $this->random('salesorder');
            $this->set('salesorderno', $dmt);
            $priority=$this->Priority->find('list',array('fields'=>array('id','priority')));
            
            
            //$instrumentforgroup=$this->Instrumentforgroup->find('list',array('fields'=>array('id','priority')));
            $payment=$this->Paymentterm->find('list',array('fields'=>array('id','pay')));
            $service=$this->Service->find('list',array('fields'=>array('id','servicetype')));
            $this->set(compact('service','payment','priority'));
            $branch =   $this->branch->find('first',array('conditions'=>array('branch.defaultbranch'=>1,'branch.status'=>1)));
            
            if($this->request->is('post'))
            {
                
              // pr($this->request->data);exit;
                
            
            //endforeach;
            //pr($instrument_type);exit;
            //pr($con);exit;
                
               if(isset($this->request->data['Salesorder']['salesorder_created']) && $this->request->data['Salesorder']['salesorder_created']==1)
               {
                   //For pending process in Salesorder by quotation
                   $device_current_status   =  $this->request->data['quotation_device_status']; 
                   if($device_current_status=='pending')
                   {
                        $salesorder_details    =   $this->Salesorder->find('first',array('conditions'=>array('Salesorder.quotationno'=>$this->request->data['Salesorder']['quotation_id']),'contain'=>array('Description'=>array('Instrument','Brand','Range','Department','conditions'=>array('Description.pending'=>'1')),'Customer'),'recursive'=>3));
                        //pr($salesorder_details);exit;
                        $quotation_details    =   $this->Quotation->find('first',array('conditions'=>array('Quotation.quotationno'=>$this->request->data['Salesorder']['quotation_id'],'Quotation.is_approved'=>'1'),'recursive'=>'2'));
                        $contact_list   =   $this->Contactpersoninfo->find('list',array('conditions'=>array('Contactpersoninfo.customer_id'=>$quotation_details['Quotation']['customer_id'],'Contactpersoninfo.status'=>1),'fields'=>array('id','name')));
                        $this->set(compact('contact_list'));
                        if($salesorder_details['Customer']['invoice_type_id']!=3)
                        {
                            $this->set('sale',$salesorder_details);
                            $this->set('status_id','pending_status');
                            $this->request->data =   $salesorder_details;
                            
                            $this->set('pendin',1);
                        }
                        $con = $this->Quotation->find('first',array('conditions'=>array('Quotation.quotationno'=>$this->request->data['Salesorder']['quotationno'],'Quotation.is_approved'=>1,'Quotation.status'=>1)));
                        
                        $instrument_type = $con['InstrumentType']['salesorder'];
                        //pr($instrument_type);exit;
                        //echo $instrument_type; exit;
                         $this->set('instrument_type',$instrument_type);
                   }
                   else
                   {
                        $con = $this->Quotation->find('first',array('conditions'=>array('Quotation.quotationno'=>$this->request->data['Salesorder']['quotation_id'],'Quotation.is_approved'=>1,'Quotation.status'=>1)));
                        //pr($this->request->data['Salesorder']['quotation_id']);
                        $instrument_type = $con['InstrumentType']['salesorder'];
                        $this->set('pendin',0);
                        //pr($instrument_type); exit;
                         $this->set('instrument_type',$instrument_type);
                        $quotation_details    =   $this->Quotation->find('first',array('conditions'=>array('Quotation.quotationno'=>$this->request->data['Salesorder']['quotation_id'],'Quotation.is_approved'=>'1'),'recursive'=>'2'));
                        $contact_list   =   $this->Contactpersoninfo->find('list',array('conditions'=>array('Contactpersoninfo.customer_id'=>$quotation_details['Quotation']['customer_id'],'Contactpersoninfo.status'=>1),'fields'=>array('id','name')));
                        //pr($contact_list);exit;
                        $this->set(compact('contact_list'));
                        $sales_details =  $quotation_details['Quotation'];
                        $sales['Salesorder']   =    $sales_details;
                        $sales['Description']  =    $quotation_details['Device'];
                        $sales['Salesorder']['quotation_id']   =    $sales_details['id'];
                        //pr($sales['Description']);exit;
                        
                        $device_node_nonstatus    =   $this->Description->find('all',array('conditions'=>array('Description.quotation_id'=>$sales['Salesorder']['quotation_id'],'Description.status'=>0)));
                        //pr($device_node_nonstatus);exit;
                        if(!empty($device_node_nonstatus))
                        {
                             $this->Description->deleteAll(array('Description.quotation_id'=>$sales['Salesorder']['quotation_id'],'Description.status'=>0));
                        }
                       
                        $this->set('sale',$sales);
                        $this->set('status_id','');
                        foreach($sales['Description'] as $sale):
                            $this->Description->create();
                            $description_data  =   $this->saleDescription($sale['id']);
                            
                            $this->Description->save($description_data);
                        endforeach;
                        //pr($sale['id']);exit;
                        //pr($this->request->data);
                        //pr($sales);exit;
                        $this->request->data =   $sales;
                   }
               }
               else 
               {
                    $customer_id    =   $this->request->data['Salesorder']['customer_id'];
                    $this->request->data['Quotation']['customername']=$this->request->data['sales_customername'];
                    $this->request->data['Salesorder']['id']=$this->request->data['Salesorder']['salesorderno'];
                    $quotation_id   =   $this->request->data['Salesorder']['quotation_id'];
                    $this->request->data['Salesorder']['branch_id']=$branch['branch']['id'];
                    $this->request->data['Salesorder']['created_by']=$this->Session->read('sess_userid');
                    $quotation_details    =   $this->Quotation->find('first',array('conditions'=>array('Quotation.quotationno'=>$this->request->data['Salesorder']['quotationno'],'Quotation.is_approved'=>'1'),'recursive'=>'2'));
                    $this->request->data['Salesorder']['po_generate_type']=$quotation_details['Quotation']['po_generate_type'];
                    /* Instrument Type */
                    $con = $this->Quotation->find('first',array('conditions'=>array('Quotation.quotationno'=>$this->request->data['Salesorder']['quotationno'],'Quotation.is_approved'=>1,'Quotation.status'=>1)));
                    $instrument_type = $con['InstrumentType']['salesorder'];
                    $this->set('instrument_type',$instrument_type);
                    $this->set('pendin',0);
                    
                    if($this->Salesorder->save($this->request->data['Salesorder']))
                    {
                        $sales_orderid  =   $this->Salesorder->getLastInsertID();
                        
                        if(!empty($this->request->data['Salesorder']['device_status']))
                        {
                            $device_node_pending    =   $this->Description->find('all',array('conditions'=>array('Description.customer_id'=>$customer_id,'Description.pending'=>1)));
                            if(!empty($device_node_pending))
                            {
                                $this->Description->updateAll(array('Description.salesorder_id'=>'"'.$sales_orderid.'"','Description.status'=>1,'Description.pending'=>0),array('Description.customer_id'=>$customer_id,'Description.pending'=>1));
                            }
                            $this->Quotation->updateAll(array('Quotation.salesorder_created'=>1),array('Quotation.id'=>$quotation_id));
                        }
                        else
                        {
                            $device_node    =   $this->Description->find('all',array('conditions'=>array('Description.customer_id'=>$customer_id,'Description.status'=>0)));
                            
                            if(!empty($device_node))
                            {
                                $this->Description->updateAll(array('Description.salesorder_id'=>'"'.$sales_orderid.'"','Description.status'=>1),array('Description.customer_id'=>$customer_id,'Description.status'=>0));
                            }
                           
                            $this->Quotation->updateAll(array('Quotation.salesorder_created'=>1),array('Quotation.id'=>$quotation_id));
                        }
                        $sales_document =   $this->SalesDocument->deleteAll(array('SalesDocument.Salesorderno'=>$this->request->data['Salesorder']['salesorderno'],'SalesDocument.status'=>0));
                        $this->SalesDocument->updateAll(array('SalesDocument.salesorder_id'=>'"'.$id.'"','SalesDocument.customer_id'=>'"'.$customer_id.'"'),array('SalesDocument.salesorderno'=>$this->request->data['Salesorder']['salesorderno'],'SalesDocument.status'=>1));
                   
                        /******************
                        * Data Log
                        */
                        $this->request->data['Logactivity']['logname']   =   'Salesorder';
                        $this->request->data['Logactivity']['logactivity']   =   'Add SalesOrder';
                        $this->request->data['Logactivity']['logid']   =   $sales_orderid;
                        $this->request->data['Logactivity']['loguser'] = $this->Session->read('sess_userid');
                        $this->request->data['Logactivity']['logapprove'] = 1;
                        $a = $this->Logactivity->save($this->request->data['Logactivity']);
                        //pr($a);exit;
                        /******************/
                        
                        /******************
                        * Data Log Activity
                        */
                        $this->request->data['Datalog']['logname'] = 'Salesorder';
                        $this->request->data['Datalog']['logactivity'] = 'Add';
                        $this->request->data['Datalog']['logid'] = $id;
                        $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                    
                        $a = $this->Datalog->save($this->request->data['Datalog']);
                    
                        /******************/   
                        $this->Session->setFlash(__('Salesorder has been Added Successfully'));
                        $this->redirect(array('controller'=>'Salesorders','action'=>'index'));
                    }
               }
            }
            else
            {
                $this->redirect(array('controller'=>'Salesorders','action'=>'index'));
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
        if($user_role['job_salesorder']['edit'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        /*
         * *****************************************************
         */
            $priority=$this->Priority->find('list',array('fields'=>array('id','priority')));
            $payment=$this->Paymentterm->find('list',array('fields'=>array('id','pay')));
            $service=$this->Service->find('list',array('fields'=>array('id','servicetype')));
            
            $salesorder_details=$this->Salesorder->find('first',array('conditions'=>array('Salesorder.id'=>$id),'recursive'=>'2'));
            //pr($salesorder_details);exit;
            $this->set('salesorder',$salesorder_details);
            $con = $this->Quotation->find('first',array('conditions'=>array('Quotation.quotationno'=>$salesorder_details['Quotation']['quotationno'],'Quotation.status'=>1)));
                    $instrument_type = $con['InstrumentType']['salesorder'];
                    //pr($instrument_type);
                    $this->set('instrument_type',$instrument_type);
            //pr($salesorder_details);exit;
            $contact_list   =   $this->Contactpersoninfo->find('list',array('conditions'=>array('Contactpersoninfo.customer_id'=>$con['Quotation']['customer_id'],'Contactpersoninfo.status'=>1),'fields'=>array('id','name')));
            $this->set(compact('contact_list'));
            $this->set(compact('priority','payment','service'));
            if($this->request->is(array('post','put')))
            {
                $customer_id    =   $this->request->data['Salesorder']['customer_id'];
                $this->Salesorder->id=$id;
                if($this->Salesorder->save($this->request->data['Salesorder']))
                {
                    /******************
                        * Data Log Activity
                        */
                        $this->request->data['Datalog']['logname'] = 'Salesorder';
                        $this->request->data['Datalog']['logactivity'] = 'Edit';
                        $this->request->data['Datalog']['logid'] = $id;
                        $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                    
                        $a = $this->Datalog->save($this->request->data['Datalog']);
                    
                        /******************/   
//                    $device_node    =   $this->Description->find('all',array('conditions'=>array('Description.customer_id'=>$customer_id)));
//                    if(!empty($device_node))
//                    {
//                        $this->Description->updateAll(array('Description.salesorder_id'=>'"'.$id.'"','Description.status'=>'1'),array('Description.customer_id'=>$customer_id));
//                    }
                    $this->Session->setFlash(__('Salesorder has been Updated Succefully '));
                    $this->redirect(array('action'=>'index'));
                }
            }
            else
            {
                $this->request->data=$salesorder_details;
            }
        }
        public function delete($id=NULL)
        {
        /*******************************************************
         *  BS V1.0
         *  User Role Permission
         *  Controller : Sales Order
         *  Permission : Delete 
         *  Description   :   Delete Salesorder Details page
         *******************************************************/
        $user_role = $this->userrole_permission();
        if($user_role['job_salesorder']['delete'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        /*
         * *****************************************************
         */
            if($id!='')
            {
                if($this->Salesorder->updateAll(array('Salesorder.is_deleted'=>1),array('Salesorder.id'=>$id)))
                {
                    /******************
                        * Data Log Activity
                        */
                        $this->request->data['Datalog']['logname'] = 'Salesorder';
                        $this->request->data['Datalog']['logactivity'] = 'Delete';
                        $this->request->data['Datalog']['logid'] = $id;
                        $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                    
                        $a = $this->Datalog->save($this->request->data['Datalog']);
                    
                        /******************/   
                    $this->Session->setFlash(__('The SalesOrder has been deleted',h($id)));
                    return $this->redirect(array('controller'=>'Salesorders','action'=>'index'));
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
        public function instrument_search()
        {
            $this->autoRender = false;
            $instrument =  $this->request->data['instrument'];
            $customer_id =  $this->request->data['customer_id'];
            $instrument_details=$this->CustomerInstrument->find('all',array('conditions'=>array('CustomerInstrument.customer_id'=>$customer_id)));
            foreach($instrument_details as $instrument)
            {
                echo "<div class='sales_instrument_id' align='left' id='".$instrument['Instrument']['id']."'>";
                $instrument_list= $this->Instrument->find('all',array('conditions'=>array('Instrument.name LIKE'=>'%'.$instrument['Instrument']['name'].'%'),'fields'=>array('Instrument.name')));
                foreach($instrument_list as $li)
                {
                    echo $li['Instrument']['name'];
                }
                echo "<br>";
                echo "</div>";
            }
        }
        public function get_brand_value()
        {
            $this->autoRender = false;
            $instrument_id =  $this->request->data['instrument_id'];
            $brand_details=$this->CustomerInstrument->find('first',array('conditions'=>array('CustomerInstrument.instrument_id'=>$instrument_id),'recursive'=>'3'));
            if(!empty($brand_details))
            {
                echo json_encode($brand_details);
            }
            //pr($brand_list);
     
        }
        public function sales_add_instrument()
        {
            $this->autoRender = false;
            $this->loadModel('Description');
            $this->request->data['Description']['customer_id']          =   $this->request->data['customer_id'];
            $this->request->data['Description']['salesorder_id']        =   $this->request->data['salesorder_id'];
            $this->request->data['Description']['instrument_id']        =   $this->request->data['instrument_id'];
            $this->request->data['Description']['brand_id']             =   $this->request->data['instrument_brand'];
            $this->request->data['Description']['sales_quantity']       =   $this->request->data['instrument_quantity'];
            $this->request->data['Description']['model_no']             =   $this->request->data['instrument_modelno'];
            $this->request->data['Description']['sales_range']          =   $this->request->data['instrument_range'];
            $this->request->data['Description']['sales_calllocation']   =   $this->request->data['instrument_calllocation'];
            $this->request->data['Description']['sales_calltype']       =   $this->request->data['instrument_calltype'];
            $this->request->data['Description']['sales_validity']       =   $this->request->data['instrument_validity'];
            $this->request->data['Description']['sales_discount']       =   $this->request->data['instrument_discount'];
            $this->request->data['Description']['department_id']        =   $this->request->data['instrument_department'];
            $this->request->data['Description']['sales_unitprice']      =   $this->request->data['instrument_unitprice'];
            $this->request->data['Description']['sales_accountservice'] =   $this->request->data['instrument_account'];
            $this->request->data['Description']['sales_titles']         =   $this->request->data['instrument_title'];
            $this->request->data['Description']['sales_total']          =   $this->request->data['instrument_total'];
            $this->request->data['Description']['status']               =   0;
            $this->request->data['Description']['is_approved']          =   0;
            if($this->Description->save($this->request->data))
            {
                $device_id=$this->Description->getLastInsertID();
                $get_lastdevice_details    =   $this->Description->find('first',array('conditions'=>array('Description.id'=>$device_id)));
                echo json_encode($get_lastdevice_details);
            }
        }
        public function delete_instrument()
        {
            $this->autoRender=false;
            $device_id= $this->request->data['device_id'];
            $this->loadModel('Description');
            //pr($this->Description->updateAll(array('Description.pending'=>1),array('Description.quo_ins_id'=>$device_id)));exit;
            if($this->Description->updateAll(array('Description.pending'=>1),array('Description.quo_ins_id'=>$device_id)))
            {
                echo "deleted";
            }
        }
        
        public function sales_by_quotation_edit_instrument()
        {
            $this->autoRender=false;
            $device_id= $this->request->data['edit_device_id'];
            //echo $this->request->data['edit_device_id'];
            $this->loadModel('Device');
            $edit_device_details    =   $this->Device->find('first',array('conditions'=>array('Device.id'=>$device_id)));
            //pr($this->Device->find('first',array('conditions'=>array('Device.id'=>$device_id))));exit;
            if(!empty($edit_device_details ))
            {
                echo json_encode($edit_device_details);
            }
        }
        public function sales_edit_instrument()
        {
            $this->autoRender=false;
            $device_id= $this->request->data['edit_device_id'];
            //echo $this->request->data['edit_device_id'];
            $this->loadModel('Description');
            $edit_device_details    =   $this->Description->find('first',array('conditions'=>array('Description.id'=>$device_id)));
            //pr($this->Device->find('first',array('conditions'=>array('Device.id'=>$device_id))));exit;
            if(!empty($edit_device_details ))
            {
                echo json_encode($edit_device_details);
            }
        }
        public function update_instrument()
        {
            $this->autoRender = false;
            $this->loadModel('Description');
            $device_id                                              =   $this->request->data['device_id'];
            $this->Description->id                                  =   $this->request->data['device_id'];
            $this->request->data['Description']['customer_id']      =   $this->request->data['customer_id'];
            $this->request->data['Description']['instrument_id']    =   $this->request->data['instrument_id'];
            $this->request->data['Description']['brand_id']         =   $this->request->data['instrument_brand'];
            $this->request->data['Description']['sales_quantity']   =   $this->request->data['instrument_quantity'];
            $this->request->data['Description']['model_no']         =   $this->request->data['instrument_modelno'];
            $this->request->data['Description']['sales_range']      =   $this->request->data['instrument_range'];
            $this->request->data['Description']['sales_calllocation'] =   $this->request->data['instrument_calllocation'];
            $this->request->data['Description']['sales_calltype']   =   $this->request->data['instrument_calltype'];
            $this->request->data['Description']['sales_validity']   =   $this->request->data['instrument_validity'];
            $this->request->data['Description']['sales_discount']   =   $this->request->data['instrument_discount'];
            $this->request->data['Description']['department_id']    =   $this->request->data['instrument_department'];
            $this->request->data['Description']['sales_unitprice']  =   $this->request->data['instrument_unitprice'];
            $this->request->data['Description']['sales_accountservice']=  $this->request->data['instrument_account'];
            $this->request->data['Description']['sales_titles']     =   $this->request->data['instrument_title'];
            $this->request->data['Description']['sales_total']     =   $this->request->data['instrument_total'];
            $this->request->data['Description']['status']       =   0;
            $this->request->data['Description']['is_approved']       =   0;
            if($this->Description->save($this->request->data))
            {
                $get_updatedevice_details    =   $this->Description->find('first',array('conditions'=>array('Description.id'=>$device_id)));
                echo json_encode($get_updatedevice_details);
            }
     
        }
        public function quotation_search()
        {
            
            $this->autoRender = false;
            $this->loadModel('Quotation');
            $name =  $this->request->data['id'];
            $cus_id = $this->request->data['single_cus_id'];
            $device_status =  $this->request->data['device_status'];
            if($device_status=='pending')
            {
                $data = $this->Description->find('all',array('conditions'=>array('Description.pending'=>1,'Description.is_deleted'=>0),'group' => array('Salesorder.salesorderno')));
                $c = count($data);
                if($c!=0)
                {
                     for($i = 0; $i<$c;$i++)
                     { 
                         echo "<div class='quotation_single' align='left' id='".$data[$i]['Description']['quotation_id']."'>";
                         echo $data[$i]['Description']['quotationno'];
                         echo "<br>";
                         echo "</div>";
                     }
                 }
                 else
                 {
                     echo "<div class='no_result' align='left'>";
                     echo "No Results Found";
                     echo "<br>";
                     echo "</div>";
                 }  
            
                
            }
            else
            {
                 if($cus_id == ''):
                 $data = $this->Quotation->find('all',array('conditions'=>array('Quotation.quotationno LIKE'=>'%'.$name.'%','Quotation.is_approved'=>'1','Quotation.salesorder_created'=>0)));
                 else:
                 $data = $this->Quotation->find('all',array('conditions'=>array('Quotation.quotationno LIKE'=>'%'.$name.'%','Quotation.customer_id'=>$cus_id,'Quotation.is_approved'=>'1','Quotation.salesorder_created'=>0)));
                 endif;
                 $c = count($data);
                 if($c!=0)
                 {
                     for($i = 0; $i<$c;$i++)
                     { 
                         echo "<div class='quotation_single' align='left' id='".$data[$i]['Quotation']['id']."'>";
                         echo $data[$i]['Quotation']['quotationno'];
                         echo "<br>";
                         echo "</div>";
                     }
                 }
                 else
                 {
                     echo "<div class='no_result' align='left'>";
                     echo "No Results Found";
                     echo "<br>";
                     echo "</div>";
                 } 
            }
            
        }
        public function check_quotation_count()
        {
            $this->autoRender = false;
            $this->loadModel('Quotation');
            $name =  $this->request->data['single_quote_id'];
            $data = $this->Quotation->find('all',array('conditions'=>array('Quotation.quotationno'=>$name,'Quotation.is_approved'=>'1')));
            $c = count($data);
            if($c!=0)
            {
                echo "success";
            }
            else 
            {
                echo "failure";
            }
        }
        
        public function approve()
        {
            $this->autoRender=false;
            $id =  $this->request->data['id'];
            $this->Salesorder->updateAll(array('Salesorder.is_approved'=>1),array('Salesorder.salesorderno'=>$id));
            $this->Description->updateAll(array('Description.is_approved'=>1),array('Description.salesorder_id'=>$id));
            //pr($id1);exit;
            $user_id = $this->Session->read('sess_userid');
            $this->Logactivity->updateAll(array('Logactivity.logapprove'=>2,'Logactivity.approved_by'=>$user_id),array('Logactivity.logid'=>$id,'Logactivity.logactivity'=>'Add SalesOrder'));
            
//            $this->request->data['Logactivity']['logname']   =   'Labprocess';
//            $this->request->data['Logactivity']['logactivity']   =   'Labprocess Check';
//            $this->request->data['Logactivity']['logid']   =   $id;
//            $this->request->data['Logactivity']['loguser'] = $this->Session->read('sess_userid');
//            $this->request->data['Logactivity']['logapprove'] = 1;
//            $a = $this->Logactivity->save($this->request->data['Logactivity']);
        }
        public function file_upload($id=NULL)
        {
            $this->autoRender=false;
            if($this->request->is('post'))
            {
                $salesorder_no  =   $_POST['salesorder_no'] ;  
                $salesorder_files   =   $_FILES['file'];
                $document_array    = array();
                if(!empty($salesorder_files))
                {
                    if(!is_dir(APP.'webroot'.DS.'files'.DS.'Salesorders'.DS.$salesorder_no)):
                            mkdir(APP.'webroot'.DS.'files'.DS.'Salesorders'.DS.$salesorder_no);
                    endif;
                    $document_name  =   time().'_'.$salesorder_files['name'];
                    $type = $salesorder_files['type'];
                    $size = $salesorder_files['size'];
                    $tmpPath = $salesorder_files['tmp_name'];
                    $originalPath = APP.'webroot'.DS.'files'.DS.'Salesorders'.DS.$salesorder_no.DS.$document_name;
                    if(move_uploaded_file($tmpPath,$originalPath))
                    {
                        $document_array['SalesDocument']['document_name']= $document_name;
                        $document_array['SalesDocument']['salesorderno']= $salesorder_no;
                        $document_array['SalesDocument']['document_size']= $size;
                        $document_array['SalesDocument']['upload_type']= 'Individual';
                        $document_array['SalesDocument']['document_type']= $salesorder_files['type'];
                        $this->SalesDocument->create();
                        $this->SalesDocument->save($document_array);
                    }
                }
              }
        }
        public function delete_document($id=NULL)
        {
            $this->autoRender   =   false;
            $document_id    =   $this->request->data['document_id'];
            $files = scandir(APP.'webroot'.DS.'files'.DS.'Salesorders'.DS.$id); 
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
                 $this->SalesDocument->updateAll(array('SalesDocument.status'=>0),array('SalesDocument.salesorderno'=>$id,'SalesDocument.document_name LIKE'=>'%'.$document_id.'%'));
            }
        }
        public function attachment($salesorder_id= NULL,$doc_name=NULL)
        {
            $file_name    = explode('_',$doc_name);unset($file_name[0]); 
            $document_file_name   =   implode($file_name,'-') ;
            $this->response->file(APP.'webroot'.DS.'files'.DS.'Salesorders'.DS.$salesorder_id.DS.$doc_name,
			array('download'=> true, 'name'=>$document_file_name));
            
            return $this->response;  
	}
        public function remove_salesdocument()
        {
            $this->autoRender   =   false;
            $document_id    =   $this->request->data['doc_id'];
            $document_name    =   $this->request->data['doc_org_name'];
            $salesorder_id    =   $this->request->data['salesorder_id'];
            if( $this->SalesDocument->deleteAll(array('SalesDocument.id'=>$document_id)))
            {
                 if(unlink(APP.'webroot'.DS.'files'.DS.'Salesorders'.DS.$salesorder_id.DS.$document_name))
                 {
                     echo 'Success';
                 }
            }
            
	}
        
        public function dates_sales()
        {
            $this->autoRender=false;
            $this->layout   =   'ajax';
            $priority_id  =   $this->request->data['priority_id'];
            $priority_info    =    $this->Priority->find('first',array('conditions'=>array('Priority.id'=>$priority_id),'order'=>'Priority.id desc'));
            //pr($priority_info);
            $val = $priority_info['Priority']['noofdays'];
            echo $val;
        }
        
        public function calendar()
        {
            $this->autoRender=false;
            $cal  =   $this->Salesorder->find('all',array('conditions'=>array('Salesorder.status'=>1,'Salesorder.is_approved'=>1),'group'=>'reg_date','fields'=>array('count(Salesorder.in_date) as title','in_date as start'),'recursive'=>'-1'));
           
            $event_array=array();   
            foreach($cal as $cal_list=>$v)
                {
                  
                   $event_array[$cal_list]['title']=$v[0]['title'];
                   $event_array[$cal_list]['start']=$v['Salesorder']['start'];
                    //echo json_encode($cal_list1);
                        //$cal_list1 = array_push($res1,"allDay: true");
                   // $res = json_encode($cal_list1);
                    
                    // $res1[] = str_replace(array( '{', '}','"' ), '', $res); 
                    }
              return json_encode($event_array);
        }
        
        public function search_sales_customer_no()
        {
            $this->loadModel('Customer');
            $name =  $this->request->data['name'];
            $this->autoRender = false;
            $data = $this->Customer->find('all',array('conditions'=>array('Customertagname LIKE'=>'%'.$name.'%','Customer.is_deleted'=>0,'Customer.is_approved'=>1,'Customer.status'=>1)));
            $c = count($data);
            if($c>0)
            {
                for($i = 0; $i<$c;$i++)
                { 
                    echo "<div class='customer_show_sales' align='left' id='".$data[$i]['Customer']['id']."'>";
                    echo $data[$i]['Customer']['Customertagname'];
                    echo "<br>";
                    echo "</div>";
                }
            }
            else
            {
                    echo "<div class='no_result' align='left'>";
                    echo "No Results Found";
                    echo "<br>";
                    echo "</div>";
            }
            
        }
        
        function pdf($id = NULL) 
        {
        
            $this->autoRender = false;
            $salesorder_data = $this->Salesorder->find('first', array('conditions' => array('Salesorder.id' => $id),'recursive'=>3));
            //pr($salesorder_data);exit;
            $file_type = 'pdf';
            $filename = $salesorder_data['Salesorder']['salesorderno'];
            $html = '<!DOCTYPE html>
                    <html lang="en">
                    <head>
                    <meta charset="utf-8" />
                    <title>'.$salesorder_data['Salesorder']['salesorderno'].'</title>
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
                $customername = $salesorder_data['Customer']['customername'];
                $billing_address = $salesorder_data['Salesorder']['address'];
                $postalcode = $salesorder_data['Customer']['postalcode'];
                $contactperson = $salesorder_data['Quotation']['Customer']['Contactpersoninfo'][0]['name'];
                $phone = $salesorder_data['Salesorder']['phone'];
                $fax = $salesorder_data['Salesorder']['fax'];
                $email = $salesorder_data['Salesorder']['email'];
                //$our_ref_no = $salesorder_data_list['Quotation']['ref_no'];
                $ref_no = $salesorder_data['Salesorder']['ref_no'];
                $reg_date = $salesorder_data['Salesorder']['reg_date'];
                $payment_term = $salesorder_data['Quotation']['Customer']['Paymentterm']['paymentterm'] . ' ' . $salesorder_data['Quotation']['Customer']['Paymentterm']['paymenttype'];
                $salesorderno = $salesorder_data['Salesorder']['salesorderno'];
            
                foreach($salesorder_data['Description'] as $device):
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
                          <tr><td style="text-align:center;font-weight:bold;font-size:20px;">'.$salesorderno.'</td></tr>
                         <tr><td style="text-transform:uppercase;font-weight:bold;width:36%;">PO NO:<span style="font-weight:normal;text-transform:none;margin-left:20px;font-style:italic;">'.$ref_no.'</span></td></tr>
                          
                          <tr><td style="text-transform:uppercase;font-weight:bold;width:36%;">DATE:<span style="font-weight:normal;text-transform:none;margin-left:20px;font-style:italic;">'.$reg_date.'</span></td></tr>
                          <tr><td style="text-transform:uppercase;font-weight:bold;width:36%;">PAYMENT TERM:<span style="font-weight:normal;text-transform:none;margin-left:20px;font-style:italic;">'.$payment_term.'</span></td></tr>
                </tbody>
                          </table>

                </div>
                     <div class="services_details f_left">
                          <p>Being provided calibration service of the following(s) :</p>
                          <h4 class="f_left"><abbr>SALESORDER NO</abbr><span> '.$salesorderno.'</span></h4>
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
            $this->dompdf->stream("Saleorder-".$filename.".pdf");
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

?>
