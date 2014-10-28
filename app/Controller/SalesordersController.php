<?php
    class SalesordersController extends AppController
    {
        public $helpers = array('Html','Form','Session','xls','Number');
        public $uses =array('Priority','Paymentterm','Quotation','Currency','Contactpersoninfo','SalesDocument',
                            'Country','Additionalcharge','Service','CustomerInstrument','Customerspecialneed',
                            'Instrument','Instrumentforgroup','Brand','Customer','Device','Salesorder','Description','Logactivity','branch','Datalog','InstrumentType','Title');
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
            $title =   $this->Title->find('all');
            foreach($title as $title_name)
            {
                $titles[] = $title_name['Title']['title_name'];
            }
            $this->set('titles',$titles);
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
                else
                {
                    $po_type = 'Automatic';
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
//                    echo "SalesLast - ".$sales_orderid;
//                    echo "<br>";
                    $create_quotation   =   $this->create_automatic_quotation($sales_orderid);
//                    echo "SalesLast : ".$sales_orderid;
//                    echo "<br>";
//                    echo "OtherSales : ".$this->request->data['Salesorder']['salesorderno'];
//                    echo "<br>";
//                   echo "Quotation - ".$create_quotation;
//                   echo "<br>";
                  // pr($create_quotation);
                    //pr($quotation_lists);exit;
                    /***********************for pending process in Salesorder*************************************/
                    $device_node    =   $this->Description->find('all',array('conditions'=>array('Description.customer_id'=>$customer_id,'Description.salesorder_id'=>$this->request->data['Salesorder']['salesorderno'],'Description.status'=>0)));
                    if(!empty($device_node))
                    {
                        $this->Description->updateAll(array('Description.quotationno'=>'"'.$quotation_id.'"','Description.salesorder_id'=>'"'.$this->request->data['Salesorder']['salesorderno'].'"','Description.status'=>1),array('Description.customer_id'=>$customer_id,'Description.salesorder_id'=>$this->request->data['Salesorder']['salesorderno'],'Description.status'=>0));
                    }
                    $sales_document =   $this->SalesDocument->deleteAll(array('SalesDocument.Salesorderno'=>$this->request->data['Salesorder']['salesorderno'],'SalesDocument.status'=>0));
                    $this->SalesDocument->updateAll(array('SalesDocument.salesorder_id'=>'"'.$this->request->data['Salesorder']['salesorderno'].'"','SalesDocument.customer_id'=>'"'.$customer_id.'"'),array('SalesDocument.salesorderno'=>$this->request->data['Salesorder']['salesorderno'],'SalesDocument.status'=>1));
                    /******************
                     * Data Log
                    */
//                    echo "After";
//                    echo "<br>";
//                    echo "SalesLast - ".$sales_orderid;
//                    echo "<br>";
//                    echo "OtherSales : ".$this->request->data['Salesorder']['salesorderno'];
//                    echo "<br>";
//                   echo "Quotation - ".$create_quotation;
//                   echo "<br>";
                    $this->request->data['Logactivity']['logname']   =   'Salesorder';
                    $this->request->data['Logactivity']['logactivity']   =   'Add SalesOrder';
                    $this->request->data['Logactivity']['logid']   =   $this->request->data['Salesorder']['salesorderno'];
                    $this->request->data['Logactivity']['logno']   =   $this->request->data['Salesorder']['salesorderno'];
                    $this->request->data['Logactivity']['user_id'] = $this->Session->read('sess_userid');
                    $this->request->data['Logactivity']['logapprove'] = 1;
                    $this->Logactivity->create();
                    $a = $this->Logactivity->save($this->request->data['Logactivity']);
                    //pr($a);exit;
                    /******************/
                    /******************
                    * Data Log Activity
                    */
                    $this->request->data['Datalog']['logname'] = 'Salesorder';
                    $this->request->data['Datalog']['logactivity'] = 'Add';
                    $this->request->data['Datalog']['logid'] = $this->request->data['Salesorder']['salesorderno'];
                    $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                    $this->Datalog->create();
                    $a = $this->Datalog->save($this->request->data['Datalog']);
                    
                    /******************/ 
                    
                    /******************
                    * Data Log
                    */
                    $quotation_lists = $this->Quotation->find('first',array('conditions'=>array('Quotation.is_deleted'=>'0','Quotation.status'=>'1','Quotation.id'=>$create_quotation)));
                    //pr($quotation_lists);
                    $this->request->data['Logactivity']['logname'] = 'Quotation';
                    $this->request->data['Logactivity']['logactivity'] = 'Add Quotation';
                    $this->request->data['Logactivity']['logid'] = $create_quotation;
                    $this->request->data['Logactivity']['logno'] = $quotation_lists['Quotation']['quotationno'];
                    $this->request->data['Logactivity']['user_id'] = $this->Session->read('sess_userid');
                    $this->request->data['Logactivity']['logapprove'] = 1;
                    $this->Logactivity->create();
                    $a = $this->Logactivity->save($this->request->data['Logactivity']);
                    
                    /******************/
                    
                    /******************
                    * Data Log Activity
                    */
                    $this->request->data['Datalog']['logname'] = 'Quotation';
                    $this->request->data['Datalog']['logactivity'] = 'Add';
                    $this->request->data['Datalog']['logid'] = $quotation_lists['Quotation']['quotationno'];
                    $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                    $this->Datalog->create();
                    $a = $this->Datalog->save($this->request->data['Datalog']);
//                    echo "Atlast";
//                    echo "<br>";
//                    echo "SalesLast - ".$sales_orderid;
//                    echo "<br>";
//                    echo "OtherSales : ".$this->request->data['Salesorder']['salesorderno'];
//                    echo "<br>";
//                   echo "Quotation - ".$create_quotation;
//                   echo "<br>";
                    /******************/ 
                    //exit;
                    
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
            $title =   $this->Title->find('all');
            foreach($title as $title_name)
            {
                $titles[] = $title_name['Title']['title_name'];
            }
            $this->set('titles',$titles);
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
                        
                        
                        //$this->request->data['Salesorder'] = $salesorder_details;
                        //pr($this->request->data['Salesorder']);exit;
                        
                        $quotation_details    =   $this->Quotation->find('first',array('conditions'=>array('Quotation.quotationno'=>$this->request->data['Salesorder']['quotation_id'],'Quotation.is_approved'=>'1'),'recursive'=>'2'));
                        //pr($quotation_details);exit;
                        $contact_list   =   $this->Contactpersoninfo->find('list',array('conditions'=>array('Contactpersoninfo.customer_id'=>$quotation_details['Quotation']['customer_id'],'Contactpersoninfo.status'=>1),'fields'=>array('id','name')));
                        //pr($contact_list);exit;
                        $this->set(compact('contact_list'));
                        $this->set('pendin',0);
                        if($salesorder_details['Customer']['invoice_type_id']!=3)
                        {
                            $this->set('sale',$salesorder_details);
                            $this->set('status_id','pending_status');
                            $this->request->data =   $salesorder_details;
                            $this->set('pendin',1);
                        }
                        else
                        {
                            $this->Session->setFlash('Salesorder full invoice');
                            $this->redirect(array('controller'=>'Salesorders','action'=>'index'));
                        }
                        //pr($quotation_details['Quotation']);exit;
                        
                        $sales_details =  $quotation_details['Quotation'];
                        $sales['Salesorder']   =    $sales_details;
                        //$sales['Description']  =    $quotation_details['Device'];
                        $sales['Salesorder']['quotation_id']   =    $sales_details['id'];
                         $this->set('status_id','');
                        $this->set('sale',$sales);
                        //pr($sales['Description']);exit;
                        
                        //pr($this->request->data);exit;
                        $con = $this->Quotation->find('first',array('conditions'=>array('Quotation.quotationno'=>$quotation_details['Quotation']['quotationno'],'Quotation.is_approved'=>1,'Quotation.status'=>1)));
                        $con_inv_type = $con['Customer']['invoice_type_id']; 
                        $this->set('con_inv_type',$con_inv_type);
                        //pr($con);exit;
                        //$contact_list   =   $this->Contactpersoninfo->find('list',array('conditions'=>array('Contactpersoninfo.customer_id'=>$quotation_details['Quotation']['customer_id'],'Contactpersoninfo.status'=>1),'fields'=>array('id','name')));
                        $instrument_type = array($con['InstrumentType']['id']=>$con['InstrumentType']['salesorder']);
                        //pr($instrument_type);exit;
                        //echo $instrument_type; exit;
                         $this->set('instrument_type',$instrument_type);
                         //pr($this->request->data['Salesorder']['quotationno']);
                         //pr($this->request->data['Salesorder']['salesorderno']);
                         $edit_device_details_check    =   $this->Description->find('all',array('conditions'=>array('Description.quotationno'=>$this->request->data['Salesorder']['quotationno'],'Description.pending'=>0)));
                         $this->Description->updateAll(array('Description.salesorder_id'=>'"'.$dmt.'"'),array('Description.quotationno'=>$this->request->data['Salesorder']['quotationno'],'Description.pending'=>0));
                        // pr($edit_device_details_check);exit;
                         //pr($sales['Description']);exit;
//                         foreach($sales['Description'] as $sale):
//                            $this->Description->create();
//                            $description_data  =   $this->saleDescription_pending($sale['id']);
//                            $description_data['Description']['salesorder_id']=$dmt;
//                            $this->Description->save($description_data);
//                        endforeach;
//                        //pr($sale['id']);exit;
//                        //pr($this->request->data);
//                        //pr($sales);exit;
//                        pr($sales);exit;
//                        $this->request->data =   $sales;
                   }
                   else
                   {
                        $con = $this->Quotation->find('first',array('conditions'=>array('Quotation.quotationno'=>$this->request->data['Salesorder']['quotation_id'],'Quotation.is_approved'=>1,'Quotation.status'=>1)));
                        //pr($con);
                        $con_inv_type = $con['Customer']['invoice_type_id']; 
                        //pr($con_inv_type);
                        $this->set('con_inv_type',$con_inv_type);
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
                            $description_data['Description']['salesorder_id']=$dmt;
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
                    //pr($quotation_details);exit;
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
            $title =   $this->Title->find('all');
            foreach($title as $title_name)
            {
                $titles[] = $title_name['Title']['title_name'];
            }
            $this->set('titles',$titles);
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
//            $this->autoRender = false;
//            $instrument =  $this->request->data['instrument'];
//            $customer_id =  $this->request->data['customer_id'];
//            $instrument_details=$this->CustomerInstrument->find('all',array('conditions'=>array('CustomerInstrument.customer_id'=>$customer_id)));
//            foreach($instrument_details as $instrument)
//            {
//                echo "<div class='sales_instrument_id' align='left' id='".$instrument['Instrument']['id']."'>";
//                $instrument_list= $this->Instrument->find('all',array('conditions'=>array('Instrument.name LIKE'=>'%'.$instrument['Instrument']['name'].'%'),'fields'=>array('Instrument.name')));
//                foreach($instrument_list as $li)
//                {
//                    echo $li['Instrument']['name'];
//                }
//                echo "<br>";
//                echo "</div>";
//            }
            $this->autoRender = false;
             $instrument =  $this->request->data['instrument'];
             $customer_id =  $this->request->data['customer_id'];
             //pr($customer_id);
            //$instrument =  'a';
            //$customer_id =  'CUS-01-10000003';
            $instrument_details=$this->CustomerInstrument->find('all',array('conditions'=>array('CustomerInstrument.customer_id'=>$customer_id),'group'=>array('Instrument.id'),'contain'=>array('Instrument'=>array('conditions'=>array('Instrument.name LIKE'=>'%'.$instrument.'%')))));
            //pr($instrument_details);
            //pr(count($instrument_details));
            //// echo json_encode($instrument_details);
           // exit;
            if(count($instrument_details)!=''):
                foreach($instrument_details as $list)
                {
                    //if($list['Instrument']['name'];
                    if($list['Instrument']['name']!='')
                    {
                    //echo "<br>";
                    echo "<div class='sales_instrument_id' align='left' id='".$list['Instrument']['id']."'>";
                    echo $list['Instrument']['name'];
                    echo "<br>";
                    echo "</div>";
                    }
                }
            else:
                echo "<div  align='left'>";
                echo 'No Results Found';
                echo "<br>";
                echo "</div>"; 
            endif;
           
           
        }
        
        public function model_search()
        {
            $this->autoRender = false;
             $model_no =  $this->request->data['model_no'];
             $device_id =  $this->request->data['device_id'];
             $customer_id =  $this->request->data['customer_id'];
            //$instrument =  'a';
            //$customer_id =  'CUS-01-10000003';
            $instrument_details=$this->CustomerInstrument->find('all',array('conditions'=>array('CustomerInstrument.customer_id'=>$customer_id,'CustomerInstrument.model_no LIKE'=>'%'.$model_no.'%','CustomerInstrument.instrument_id'=>$device_id)));
            //pr($instrument_details);
            //exit;
            //pr(count($instrument_details));
            if(count($instrument_details)!=''):
                foreach($instrument_details as $list)
                {
                    //if($list['Instrument']['name'];
                    if($list['CustomerInstrument']['model_no']!='')
                    {
                    //echo "<br>";
                    echo "<div class='customerins_id' align='left' id='".$list['CustomerInstrument']['id']."'>";
                    echo $list['CustomerInstrument']['model_no'];
                    echo "<br>";
                    echo "</div>";
                    }
                }
            else:
                echo "<div  align='left'>";
                echo 'No Results Found';
                echo "<br>";
                echo "</div>"; 
            endif;
        }
        public function get_brand_value()
        {
//            $this->autoRender = false;
//            $instrument_id =  $this->request->data['instrument_id'];
//            $brand_details=$this->CustomerInstrument->find('first',array('conditions'=>array('CustomerInstrument.instrument_id'=>$instrument_id),'recursive'=>'3'));
//            if(!empty($brand_details))
//            {
//                echo json_encode($brand_details);
//            }
//            //pr($brand_list);
            $this->autoRender = false;
            $instrument_id =  $this->request->data['instrument_id'];
            $customer_id =  $this->request->data['customer_id'];
            $brand_details=$this->CustomerInstrument->find('first',array('conditions'=>array('CustomerInstrument.instrument_id'=>$instrument_id,'CustomerInstrument.customer_id'=>$customer_id),'recursive'=>'3'));
            
            if(!empty($brand_details))
            {
                echo json_encode($brand_details);
            }
        }
        public function get_range_value()
        {
            $this->autoRender = false;
            $instrument_id =  $this->request->data['instrument_id'];
            $customer_id =  $this->request->data['customer_id'];
            $range_details=$this->CustomerInstrument->find('all',array('conditions'=>array('CustomerInstrument.id'=>$instrument_id,'CustomerInstrument.customer_id'=>$customer_id),'recursive'=>'3'));
            
            if(!empty($range_details))
            {
                return json_encode($range_details);
            }
           
        }
        public function sales_add_instrument()
        {
            $this->autoRender = false;
            $this->loadModel('Description');
            $this->request->data = json_decode(file_get_contents("php://input"));
            $data = array();
            //pr($this->request->data);
            //exit;
            
            $quantity = $this->request->data->instrument_quantity;
            
            $instrument_ids = array();
            
            for($i=0;$i<$quantity;$i++)
            {
                $data['customer_id']          =   $this->request->data->customer_id;
                $data['salesorder_id']        =   $this->request->data->salesorder_id;
                $data['instrument_id']        =   $this->request->data->instrument_id;
                $data['instrument_name']      =   $this->request->data->instrument_name;
                $data['brand_id']             =   $this->request->data->instrument_brand;
                $data['sales_quantity']       =   $this->request->data->instrument_quantity;
                $data['model_no']             =   $this->request->data->instrument_modelno;
                $data['sales_range']          =   $this->request->data->instrument_range;
                $data['sales_calllocation']   =   $this->request->data->instrument_calllocation;
                $data['sales_calltype']       =   $this->request->data->instrument_calltype;
                $data['sales_validity']       =   $this->request->data->instrument_validity;
                $data['sales_discount']       =   $this->request->data->instrument_discount;
                $data['department_id']        =   $this->request->data->instrument_department;
                $data['sales_unitprice']      =   $this->request->data->instrument_unitprice;
                $data['sales_accountservice'] =   $this->request->data->instrument_account;
//                $data['sales_titles']         =   $this->request->data->instrument_title;
                $data['sales_total']          =   $this->request->data->instrument_total;
                $data['status']               =   0;
                $data['is_approved']          =   0;
                $this->Description->create();
                if($this->Description->save($data))
                {
                    $instrument_ids[]=$this->Description->getLastInsertID();
                    $this->Session->setFlash(__('Instruments has been added Successfully'));
                }
            }
            header('Content-Type: application/json');
            echo json_encode($instrument_ids);
             
        }
        public function delete_instrument_quo($id = NULL)
        {
            $this->autoRender=false;
            //$device_id= $this->request->data['device_id'];
            $this->loadModel('Description');
            //pr($id);exit;
            //pr($this->Description->updateAll(array('Description.pending'=>1),array('Description.quo_ins_id'=>$device_id)));exit;
            if($this->Description->updateAll(array('Description.pending'=>1),array('Description.id'=>$id)))
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
            $this->request->data = json_decode(file_get_contents("php://input"));
             $data = array();
            
            $this->Description->id    =   $this->request->data->device_id;
            $data['salesorder_id']    =   $this->request->data->salesorder_id;
            $data['customer_id']      =   $this->request->data->customer_id;
            $data['instrument_id']    =   $this->request->data->instrument_id;
            $data['brand_id']         =   $this->request->data->instrument_brand;
            $data['sales_quantity']   =   $this->request->data->instrument_quantity;
            $data['model_no']         =   $this->request->data->instrument_modelno;
            $data['sales_range']      =   $this->request->data->instrument_range;
            $data['sales_calllocation'] =   $this->request->data->instrument_calllocation;
            $data['sales_calltype']   =   $this->request->data->instrument_calltype;
            $data['sales_validity']   =   $this->request->data->instrument_validity;
            $data['department_id']    =   $this->request->data->instrument_department;
            $data['sales_accountservice']=  $this->request->data->instrument_account;
            $data['sales_discount']       =   $this->request->data->instrument_discount;
            $data['sales_unitprice']      =   $this->request->data->instrument_unitprice;
            $data['sales_total']          =   $this->request->data->instrument_total;
//          $data['sales_titles']     =   $this->request->data->instrument_title;
            $data['status']           =   0;
            $data['is_approved']      =   0;
            if($this->Description->save($data))
            {
                $this->Session->setFlash(__('Instrument has been Updated Successfully'));
            }
     
        }
        public function update_instrument_edit()
        {
            $this->autoRender = false;
            $this->loadModel('Description');
           // $this->request->data = json_decode(file_get_contents("php://input"));
            // $data = array();
            
           // $this->Description->id    =   $this->request->data->device_id;
//            $data['salesorder_id']    =   $this->request->data->salesorder_id;
//            $data['customer_id']      =   $this->request->data->customer_id;
//            $data['instrument_id']    =   $this->request->data->instrument_id;
//            $data['brand_id']         =   $this->request->data->instrument_brand;
//            $data['sales_quantity']   =   $this->request->data->instrument_quantity;
//            $data['model_no']         =   $this->request->data->instrument_modelno;
//            $data['sales_range']      =   $this->request->data->instrument_range;
//            $data['sales_calllocation'] =   $this->request->data->instrument_calllocation;
//            $data['sales_calltype']   =   $this->request->data->instrument_calltype;
//            $data['sales_validity']   =   $this->request->data->instrument_validity;
//            $data['department_id']    =   $this->request->data->instrument_department;
//            $data['sales_accountservice']=  $this->request->data->instrument_account;
//            $data['sales_discount']       =   $this->request->data->instrument_discount;
//            $data['sales_unitprice']      =   $this->request->data->instrument_unitprice;
//            $data['sales_total']          =   $this->request->data->instrument_total;
//          $data['sales_titles']     =   $this->request->data->instrument_title;
//            $data['status']           =   0;
//            $data['is_approved']      =   0;
//            if($this->Description->save($data))
//            {
//                $this->Session->setFlash(__('Instrument has been Updated Successfully'));
//            }
     
        }
        public function instrument()
        {
            $this->autoRender=false;
            // = json_decode(file_get_contents("php://input"));
            //pr($this->params['requested']);exit;
            $this->request->data = json_decode(file_get_contents("php://input"));
            $sales_id= $this->request->data->sales_id;
            $quo_id = $this->request->data->quo_id;
            $this->loadModel('Description');
            $edit_device_details    =   $this->Description->find('all',array('conditions'=>array('Description.salesorder_id'=>$sales_id)));
            //pr($edit_device_details);
            foreach($edit_device_details as $edit_device):
                $edit_device_val[]=$edit_device;
            endforeach;
            //pr($edit_device_val);exit;
            if(empty($edit_device_details)):
            $edit_device_details    =   $this->Description->find('all',array('conditions'=>array('Description.quotationno'=>$quo_id,'Description.pending'=>1)));
            foreach($edit_device_details as $edit_device):
                $edit_device_val[]=$edit_device;
            endforeach;
            endif;
           //pr($edit_device_val);exit;
            if(!empty($edit_device_val ))
            {
                echo json_encode($edit_device_val);
            }
            
        }
        
        /// Continue for edit 
        
        public function instrument_edit()
        {
            $this->autoRender=false;
            // = json_decode(file_get_contents("php://input"));
            //pr($this->params['requested']);exit;
            $this->request->data = json_decode(file_get_contents("php://input"));
            $sales_id= $this->request->data->sales_id;
            
            
            $this->loadModel('Description');
            $edit_device_details_check    =   $this->Description->find('all',array('conditions'=>array('Description.salesorder_id'=>$sales_id,'Description.pending'=>1)));
            if(empty($edit_device_details_check)){
            $edit_device_details    =   $this->Description->find('all',array('conditions'=>array('Description.salesorder_id'=>$sales_id)));
            foreach($edit_device_details as $edit_device):
                $edit_device_val[]=$edit_device;
            endforeach; 
            echo json_encode($edit_device_val);
            }
            else
            {
            $edit_device_details    =   $this->Description->find('all',array('conditions'=>array('Description.salesorder_id'=>$sales_id,'Description.pending'=>1)));
            foreach($edit_device_details as $edit_device):
                $edit_device_val[]=$edit_device;
            endforeach; 
            echo json_encode($edit_device_val);
            }
           // pr($edit_device_val);
            //exit;
//            foreach($edit_device_val as $device):
//                  if($device['Description']['pending']==1)
//                  {
//                      $device_id[] = $device['Description']['id'];
//                  }
//            endforeach;
//           
//            if(empty($device_id)){
//           //pr($edit_device_val);exit;
//            if(!empty($edit_device_val ))
//            {
//                echo json_encode($edit_device_val);
//            }
//            }
//            else{echo json_encode($edit_device_val);
////                foreach($edit_device_val as $loop_dev):
////                    $loop_dev['Description']['id'];
////                endforeach;
////                $e[] = $edit_device_val[0];
////                echo json_encode($e);
//               //pr($edit_device_val[0]);exit; 
//            }
            
        }
        public function delete_instrument($device_id)
        {
            $this->autoRender=false;
            //$device_id= $this->request->data['device_id'];
            if($this->Description->updateAll(array('Description.is_deleted'=>1),array('Description.id'=>$device_id)))
            {
                $this->Session->setFlash(__('Instrument has been deleted Successfully'));
            }
        }
        public function get_brand_value_edit()
        {
            $this->autoRender = false;
            $this->request->data = json_decode(file_get_contents("php://input"));
            $instrument_id =  $this->request->data->instrument_id;
            $customer_id =  $this->request->data->customer_id;
            $brand_details=$this->CustomerInstrument->find('first',array('conditions'=>array('CustomerInstrument.instrument_id'=>$instrument_id,'CustomerInstrument.customer_id'=>$customer_id),'recursive'=>'3'));
            
            if(!empty($brand_details))
            {
                echo json_encode($brand_details);
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
            $quotation_data = $this->Quotation->find('first', array('conditions' => array('Quotation.id' => $salesorder_data['Salesorder']['quotation_id']),'recursive'=>2));
            //pr($salesorder_data);exit;
            $file_type = 'pdf';
            $filename = $salesorder_data['Salesorder']['salesorderno'];
//            $html = '<!DOCTYPE html>
//                    <html lang="en">
//                    <head>
//                    <meta charset="utf-8" />
//                    <title>'.$salesorder_data['Salesorder']['salesorderno'].'</title>
//                    <style>
//                    body { background-color:#fff; font-family:"Open Sans", "Helvetica Neue", Helvetica, Arial, sans-serif; color:#394263; font-size:14px; }
//                    * { text-decoration: none; font-size: 1em; outline: none; padding: 0; margin: 0; }
//                    .group:before, .group:after { content: ""; display: table; }
//                    .group:after { clear: both; }
//                    .group { zoom: 1; /* For IE 6/7 (trigger hasLayout) */ }
//                    .pdf_container { margin: 0 auto; min-height: 800px; padding: 10px; width: 700px; }
//                    .header_id { padding:10px 0; width:100%; display:block; }
//                    .logo { margin-top:10px;display:inline-block;width:50%; }
//                    .address_details { width:46%; line-height:20px; text-align:right;display:inline-block; }
//                    .address_details p { float:left; width:100%; }
//                    .address_details a { color: #1bbae1; float:left; width:100%; }
//                    .cmpny_reg { background:#FF8E00; padding:5px; color:#fff; text-transform:uppercase; width:100%; float:left; margin:10px 0 0 -8px; }
//                    .address_box { border: 1px solid #ccc; margin-top: 20px; padding: 10px; width: 47%; min-height: 185px;display:inline-block; }
//                    .address_box h2 { width:100%; padding:5px 0; font-size:23px; font-weight:bold; text-align:center; display:inline-block;}
//                    .address_box p { display:inline-block;}
//                    .invoice_address_blog { margin-top:20px; display:inline-block;width:100%;}
//                    .invoice_add {  margin:3px 0; display:inline-block;width:100%;}
//                    .invoice_add h5 { display:inline-block; width:30%; }
//                    .invoice_add span { margin-right:15px;display:inline-block; }
//                    .invoice_add abbr { font-style: italic;display:inline-block; }
//                    .services_details { margin-top:20px; width:100%; }
//                    .services_details h4 { width:100%; margin-top:20px; font-size:15px; font-weight:bold; }
//                    .services_details h4 abbr { width: 22%; display:inline-block;}
//                    .services_details h4 span { color:#fff; background-color:#1BBAE1; padding: 0 10px; }
//                    .invoice_table { width:100%; margin-top:20px;margin-bottom:30px; }
//                    .invoice_table table { width:100%; border:1px  solid #ccc !important; border-bottom:none !important; border-left:none !important; }
//                    .invoice_table th, td { padding: 10px; text-align: center; text-transform:uppercase; border:1px solid #ccc !important; border-top:none !important; border-right:none !important; }
//                    .invoice_table table thead { background-color: #f1f1f1; }
//                    .instrument h4 { font-weight:normal; }
//                    .instrument span { font-size: 13px; color: #2980b9; font-style: italic; margin: 0 10px; }
//                    .address_table{width:50%;display:inline-block;}
//                        .address_table table{width:100%;border:1px solid #ccc;}
//                      .address_table td { padding: 10px; text-align: left !important; text-transform:none; border:none !important; }
//                    </style>
//                    </head>';
//            //foreach ($salesorder_data as $salesorder_data_list):
//                $customername = $salesorder_data['Customer']['customername'];
//                $billing_address = $salesorder_data['Salesorder']['address'];
//                $postalcode = $salesorder_data['Customer']['postalcode'];
//                $contactperson = $salesorder_data['Quotation']['Customer']['Contactpersoninfo'][0]['name'];
//                $phone = $salesorder_data['Salesorder']['phone'];
//                $fax = $salesorder_data['Salesorder']['fax'];
//                $email = $salesorder_data['Salesorder']['email'];
//                //$our_ref_no = $salesorder_data_list['Quotation']['ref_no'];
//                $ref_no = $salesorder_data['Salesorder']['ref_no'];
//                $reg_date = $salesorder_data['Salesorder']['reg_date'];
//                $payment_term = $salesorder_data['Quotation']['Customer']['Paymentterm']['paymentterm'] . ' ' . $salesorder_data['Quotation']['Customer']['Paymentterm']['paymenttype'];
//                $salesorderno = $salesorder_data['Salesorder']['salesorderno'];
//            
//                foreach($salesorder_data['Description'] as $device):
//                    $device_name[] = $device;
//                endforeach;
//                
//            //endforeach;
//            $html .= '<body>
//                <div class="pdf_container group"> 
//                     <!-- header part-->
//                     <div class="header_id">
//                          <div class="f_left logo"><img src="img/logoBs.png" width="273" height="50" alt="" /></div>
//                          <div class="address_details f_right">
//                               <p>41 SENOKO DRIVE</p>
//                               <p>SINGAPORE</p>
//                               <p>758249</p>
//                               <p> 6458 4411</p>
//                               <a href="#" title="">invoice@bestandards.com</a>
//                               <div class="cmpny_reg">GST REG NO. M200510697 / COMPANY REG NO. 200510697M</div>
//                          </div>
//                     </div>
//                            <div class="address_table" style="margin-bottom:20px;">
//                          <table style="height:250px;">
//                          <tbody>
//                          <tr><td>'.$customername.'<br>'.$billing_address.'<br>'.$postalcode.'</td></tr>
//                          <tr><td style="text-transform:uppercase;font-weight:bold;">ATTN:<span style="font-weight:normal;text-transform:none;margin-left:20px;font-style:italic;">'.$contactperson.'</span></td></tr>
//                          <tr><td style="text-transform:uppercase;font-weight:bold;">TEL:<span style="font-weight:normal;text-transform:none;margin-left:20px;font-style:italic;">'.$phone.'</span></td></tr>
//                          <tr><td style="text-transform:uppercase;font-weight:bold;">FAX:<span style="font-weight:normal;text-transform:none;margin-left:20px;font-style:italic;">'.$fax.'</span></td></tr>
//                          <tr><td style="text-transform:uppercase;font-weight:bold;">EMAIL:<span style="font-weight:normal;text-transform:none;margin-left:20px;font-style:italic;">'.$email.'</span></td></tr>
//                </tbody>
//                          </table>
//
//                </div>
//                        <div class="address_table" style="margin-bottom:20px;">
//                          <table style="height:250px;">
//                          <tbody>
//                          <tr><td style="text-align:center;font-weight:bold;font-size:20px;">'.$salesorderno.'</td></tr>
//                         <tr><td style="text-transform:uppercase;font-weight:bold;width:36%;">PO NO:<span style="font-weight:normal;text-transform:none;margin-left:20px;font-style:italic;">'.$ref_no.'</span></td></tr>
//                          
//                          <tr><td style="text-transform:uppercase;font-weight:bold;width:36%;">DATE:<span style="font-weight:normal;text-transform:none;margin-left:20px;font-style:italic;">'.$reg_date.'</span></td></tr>
//                          <tr><td style="text-transform:uppercase;font-weight:bold;width:36%;">PAYMENT TERM:<span style="font-weight:normal;text-transform:none;margin-left:20px;font-style:italic;">'.$payment_term.'</span></td></tr>
//                </tbody>
//                          </table>
//
//                </div>
//                     <div class="services_details f_left">
//                          <p>Being provided calibration service of the following(s) :</p>
//                          <h4 class="f_left"><abbr>SALESORDER NO</abbr><span> '.$salesorderno.'</span></h4>
//                     </div>
//                     <div class="invoice_table f_left">
//                          <table cellpadding="0" cellspacing="0">
//                               <thead>
//                                    <tr>
//                                         <th>Instrument</th>
//                                         <th>Brand</th>
//                                         <th>Model</th>
//                                         <th>Serial No</th>
//                                         <th>Quantity</th>
//                                         <th>Unit Price $(SGD)</th>
//                                         <th>Total Price $(SGD)</th>
//                                    </tr>
//                               </thead>
//                               <tbody>';
//                $subtotal = 0;
//                foreach($device_name as $device):
//                    $html .= '
//                    <tr>
//                        <td class="instrument"><h4>'.$device['Instrument']['name'].'</h4>
//                            <span>Faulty</span> <span>'.$device['Range']['range_name'].'</span></td>
//                        <td>'.$device['Brand']['brandname'].'</td>
//                        <td>'.$device['model_no'].'</td>
//                        <td>53254324</td>
//                        <td>1</td>
//                        <td> $'.$device['sales_unitprice'].'</td>
//                        <td> $'.$device['sales_total'].'</td>
//                    </tr>';
//                $subtotal = $subtotal + $device['sales_total']; 
//                endforeach;
//                
//                $gst = $subtotal * 0.07;
//                $total_due = $gst + $subtotal;
//                App::uses('CakeNumber', 'Utility');$currency = 'USD';
//                $total_due = CakeNumber::currency($total_due, $currency);
//                $gst = CakeNumber::currency($gst, $currency);
//                $subtotal = CakeNumber::currency($subtotal, $currency);
//                $html .= '<tr>
//                         <td colspan="6">SUBTOTAL</td>
//                         <td>'.$subtotal.'</td>
//                    </tr>
//                    <tr>
//                         <td colspan="6">GST ( 7.00% )</td>
//                         <td>'.$gst.'</td>
//                    </tr>
//                    <tr>
//                         <td colspan="6"><h4>TOTAL DUE</h4></td>
//                         <td><h4>'.$total_due.'</h4></td>
//                    </tr>
//               </tbody>
//          </table>
//     </div>
//</div>
//</body>
//</html>';

             $title =   $this->Title->find('all');
            foreach($title as $title_name)
            {
                $titles[] = $title_name['Title']['title_name'];
            }
 
            //pr($titles);
            //exit;
 $html = '<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>'.$salesorder_data['Salesorder']['salesorderno'].'</title>
<style>
* { margin:0; padding:0; }
table td { font-size:13px; }

.table_format table { border:1px solid #000; border-bottom:none; border-left:none; }
.table_format td { border-bottom:1px solid #000; padding:10px; text-align:center; border-left:1px solid #000; }
</style>
</head>';
 $title =   $this->Title->find('all');
            foreach($title as $title_name)
            {
                $titles[] = $title_name['Title']['title_name'];
            }
            //pr($salesorder_data);
            //foreach ($salesorder_data as $salesorder_data_list):
                $customername = $salesorder_data['Customer']['customername'];
                $billing_address = $salesorder_data['Salesorder']['address'];
                $postalcode = $salesorder_data['Customer']['postalcode'];
                $contactperson = $quotation_data['Customer']['Contactpersoninfo'][0]['name'];
                $phone = $salesorder_data['Salesorder']['phone'];
                $fax = $salesorder_data['Salesorder']['fax'];
                $email = $salesorder_data['Salesorder']['email'];
                //$our_ref_no = $salesorder_data_list['Quotation']['ref_no'];
                $ref_no = $salesorder_data['Salesorder']['ref_no'];
                $reg_date = $salesorder_data['Salesorder']['reg_date'];
                 $payment_term = $quotation_data['Customer']['Paymentterm']['paymentterm'] . ' ' . $quotation_data['Customer']['Paymentterm']['paymenttype'];
                $salesorderno = $salesorder_data['Salesorder']['salesorderno'];
            
                foreach($salesorder_data['Description'] as $device):
                    $device_name[] = $device;
                endforeach;
                
            //endforeach;
            $html .=
'<body style="font-family:Arial, Helvetica, sans-serif;font-size:13px;padding:10px;margin:0;">
<div style="float:left;"></div>
<div style="float:right;text-align:right;">
     <p>41 Senoko Drive</p>
     <p>Singapore 758249</p>
     <p>Tel.+65 6458 4411</p>
     <p>Fax.+65 64584400</p>
     <p style="padding-bottom:20px;">www.bestandards.com<</p>
</div>
<div style="display:inline-block;font-size:17px;font-weight:bold;width:40%;">SALES ORDER</div>
<div style="display:inline-block;background:#313854;color:#fff;width:60%;padding:5px;font-size:12px;">GST REG NO. M200510697 / COMPANY REG NO. 200510697M</div>
<div style="width:100%;margin-top:30px;float:left;">
     <table cellpadding="1" cellspacing="1"  style="width:100%;">
          <tr>
               <td style="border:1px solid #000;padding:5px;width:50%;"><table cellpadding="0" cellspacing="0">
                         <tr>
                              <td>'.$customername.'</td>
                         </tr>
                         <tr>
                              <td>'.$billing_address.'</td>
                         </tr>
						 <tr>
                              <td>'.$postalcode.'</td>
                         </tr>
                         <tr  style="padding-top:30px;">
                              <td>ATTN </td>
                              <td>:</td>
                              <td>'.$contactperson.'</td>
                         </tr>
                         <tr>
                              <td>TEL </td>
                              <td>:</td>
                              <td> '.$phone.'</td>
                         </tr>
                         <tr>
                              <td>FAX </td>
                              <td>:</td>
                              <td> '.$fax.'</td>
                         </tr>
                         <tr>
                              <td>EMAIL</td>
                              <td> :</td>
                              <td> '.$email.'</td>
                         </tr>
                    </table></td>
               <td style="border:1px solid #000;padding:5px;width:50%;"><table cellpadding="0" cellspacing="0">
                         <tr>
                              <td style="font-size:24px;font-weight:bold;">'.$salesorderno.'</td>
                         </tr>
                         <tr  style="padding-top:30px;">
                              <td>SALES PERSON </td>
                              <td>:</td>
                              <td>Mr.Padma</td>
                         </tr>
                         <tr>
                              <td>YOUR REF NO (PO) </td>
                              <td>:</td>
                              <td> '.$ref_no.'</td>
                         </tr>
                         <tr>
                              <td>DATE </td>
                              <td>:</td>
                              <td> '.$reg_date.'</td>
                         </tr>
                         <tr>
                              <td>PAYMENT TERMS</td>
                              <td> :</td>
                              <td>'.$payment_term.'</td>
                         </tr>
                    </table></td>
          </tr>
     </table>
</div>
<div style="padding-top:10px;">Being provided calibration service of the following(s) :</div>

<div style="width:100%;margin-top:20px;display:block;" class="table_format">
     <table cellpadding="0" cellspacing="0"  style="width:100%;">
          <tr>
               <td><strong>Instrument</strong></td>
               <td><strong>Brand</strong></td>
               <td><strong>Model</strong></td>
               
               <td><strong>Quantity</strong></td>
               ';
			   $count = 0;
           $count = 0;
for($i=0;$i<=4;$i++):
     $html .='<td>';
    $html .= $titles[$i];
    $html .='</td>';
endfor;
$html .='</tr>';
           
                foreach($device_name as $device):
                    $html .= '
                    <tr>
                        <td class="instrument"><h4>'.$device['Instrument']['name'].'</h4>
                            <span>Faulty</span> <span>'.$device['Range']['range_name'].'</span></td>
                        <td>'.$device['Brand']['brandname'].'</td>
                        <td>'.$device['model_no'].'</td>
                        
                        <td>1</td>
                        <td>'.$device['title1_val'].'</td>
                        <td>'.$device['title2_val'].'</td>
                        <td>'.$device['title3_val'].'</td>
                        <td>'.$device['title4_val'].'</td>
                        <td>'.$device['title5_val'].'</td>
                        
                    </tr>';
                
                endforeach;
 
 
                
                $html .= '</table></div>

<div style="font-weight:bold;margin-top:20px;">TERMS AND CONDITIONS :</div>
<p style="margin-top:5px;font-size:10px;"><strong>1) TURNAROUND TIME :</strong> NORMAL SERVICE 5 - 7 WORKING DAYS EXPRESS SERVICE 2 - 3 WORKING DAYS** 1.5 TIMES NORMAL RATES</p>
<p style="margin-top:5px;font-size:10px;"><strong>2) COLLECTION & DELIVERY :</strong> TO BE ADVISED BY SALES PERSONNEL</p>
<p style="margin-top:5px;font-size:10px;">3) VALIDITY OF THIS QUOTE IS 30 DAYS FROM THE DATE OF THIS QUOTATION *PLEASE RETURN FAX OR RAISE YOUR PURCHASE ORDER UPON CONFIRMATION* ALL PRICE(S) ABOVE ARE SUBJECTED TO GST CHARGE</p>
<p style="margin-top:5px;font-size:10px;">4) THE LABORATORY SHALL RECOMMEND THE CALIBRATION DUE DATE AS PER THE CLIENTS REQUIREMENT OF 1 YEAR, UNLESS OTHERWISE AGREED ON THE TIME FRAME. **PLEASE CONTACT SALES DEPARTMENT FOR MORE QUERIES AT 64584411**</p>
<p style="margin-top:10px;font-size:10px;"><strong>NOTE :</strong> THIS IS COMPUTER GENERATED QUOTATION. NO SIGNATURE IS REQUIRED.</p>
<div style="width:100%;margin-top:40px;display:block;">
     <table cellpadding="0" cellspacing="0"  style="width:100%;">
          <tr>
               <td><strong>CONFIRMED AND ACCEPTED BY:</strong></td>
               <td><strong>COMPANYS STAMP,SIGNATURE AND DATE</strong></td>
          </tr>
          <tr>
               <td style="padding-top:20px;">-----------------------------</td>
               <td style="padding-top:20px;">DESIGNATION :</td>
          </tr>
          <tr>
               <td></td>
               <td style="padding-top:20px;">NAME :</td>
          </tr>
     </table>
</div>
<div style="background:#313854;color:#fff;padding:10px;font-size:12px;margin-top:30px;">BS TECH REFERENCE MEASUREMENT STANDARDS ARE TRACEABLE TO NATIONAL METROLOGY CENTRE (SINGAPORE), NPL (UK), NIST (USA) OR OTHER RECOGNIZED NATIONAL OR INTERNATIONAL STANDARDS</div>

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
    
    public function update_title1()
    {
        $this->autoRender   =   false;
         if ($this->request->data) {
            App::uses('Sanitize', 'Utility');
            $title = Sanitize::clean($this->request->data['title1']);

            $this->Description->id = $this->request->data['device_id'];
            //$this->Device->updateAll(array('Device.title1_val'=>$title),array('Device.id'=>$this->request->data['device_id']));
            $this->Description->saveField('title1_val', $title);
            echo $title;
        }
    }    
    public function update_title2()
    {
        $this->autoRender   =   false;
         if ($this->request->data) {
            App::uses('Sanitize', 'Utility');
            $title = Sanitize::clean($this->request->data['title2']);

            $this->Description->id = $this->request->data['device_id'];
            //$this->Device->updateAll(array('Device.title1_val'=>$title),array('Device.id'=>$this->request->data['device_id']));
            $this->Description->saveField('title2_val', $title);
            echo $title;
        }
    } 
    public function update_title3()
    {
        $this->autoRender   =   false;
         if ($this->request->data) {
            App::uses('Sanitize', 'Utility');
            $title = Sanitize::clean($this->request->data['title3']);

            $this->Description->id = $this->request->data['device_id'];
            //$this->Device->updateAll(array('Device.title1_val'=>$title),array('Device.id'=>$this->request->data['device_id']));
            $this->Description->saveField('title3_val', $title);
            echo $title;
        }
    } 
    public function update_title4()
    {
        $this->autoRender   =   false;
         if ($this->request->data) {
            App::uses('Sanitize', 'Utility');
            $title = Sanitize::clean($this->request->data['title4']);

            $this->Description->id = $this->request->data['device_id'];
            //$this->Device->updateAll(array('Device.title1_val'=>$title),array('Device.id'=>$this->request->data['device_id']));
            $this->Description->saveField('title4_val', $title);
            echo $title;
        }
    } 
    public function update_title5()
    {
        $this->autoRender   =   false;
         if ($this->request->data) {
            App::uses('Sanitize', 'Utility');
            $title = Sanitize::clean($this->request->data['title5']);

            $this->Description->id = $this->request->data['device_id'];
            //$this->Device->updateAll(array('Device.title1_val'=>$title),array('Device.id'=>$this->request->data['device_id']));
            $this->Description->saveField('title5_val', $title);
            echo $title;
        }
    } 
    public function update_title6()
    {
        $this->autoRender   =   false;
         if ($this->request->data) {
            App::uses('Sanitize', 'Utility');
            $title = Sanitize::clean($this->request->data['title6']);

            $this->Description->id = $this->request->data['device_id'];
            //$this->Device->updateAll(array('Device.title1_val'=>$title),array('Device.id'=>$this->request->data['device_id']));
            $this->Description->saveField('title6_val', $title);
            echo $title;
        }
    } 
    public function update_title7()
    {
        $this->autoRender   =   false;
         if ($this->request->data) {
            App::uses('Sanitize', 'Utility');
            $title = Sanitize::clean($this->request->data['title7']);

            $this->Description->id = $this->request->data['device_id'];
            //$this->Device->updateAll(array('Device.title1_val'=>$title),array('Device.id'=>$this->request->data['device_id']));
            $this->Description->saveField('title7_val', $title);
            echo $title;
        }
    } 
    public function update_title8()
    {
        $this->autoRender   =   false;
         if ($this->request->data) {
            App::uses('Sanitize', 'Utility');
            $title = Sanitize::clean($this->request->data['title8']);

            $this->Description->id = $this->request->data['device_id'];
            //$this->Device->updateAll(array('Device.title1_val'=>$title),array('Device.id'=>$this->request->data['device_id']));
            $this->Description->saveField('title8_val', $title);
            echo $title;
        }
    } 
        
        
}

?>
