<?php
    class SalesordersController extends AppController
    {
        public $helpers = array('Html','Form','Session','xls','Number');
        public $uses =array('Priority','Paymentterm','Quotation','Currency','Contactpersoninfo','SalesDocument',
                            'Country','Additionalcharge','Service','CustomerInstrument','Customerspecialneed','Random',
                            'Instrument','Instrumentforgroup','Brand','Customer','Device','Salesorder','Description','Logactivity','branch','Datalog','InstrumentType','Title');
        public function index($id=NULL)
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
        if(empty($id)):
            $this->set('deleted_val',$id=0);
        endif;
        $this->set('userrole_cus',$user_role['job_salesorder']);
        /*
         * *****************************************************
         */
        
        $this->Description->deleteAll(array('Description.status'=>0));
        
        
            //$this->Quotation->recursive = 1;
        if($id == '3'):
            $salesorder_list = $this->Salesorder->find('all',array('conditions'=>array('Salesorder.is_deleted'=>1),'order' => array('Salesorder.id' => 'DESC')));
            $this->set('deleted_val',$id);
        elseif($id == '2'):
            $salesorder_list = $this->Salesorder->find('all',array('conditions'=>array('Salesorder.is_deleted'=>0,'Salesorder.is_approved'=>0),'order' => array('Salesorder.id' => 'DESC')));
            $this->set('deleted_val',$id);
        elseif($id == '1'):
            $salesorder_list = $this->Salesorder->find('all',array('conditions'=>array('Salesorder.is_deleted'=>0,'Salesorder.is_approved'=>1),'order' => array('Salesorder.id' => 'DESC')));
            $this->set('deleted_val',$id);
        else:
            $salesorder_list = $this->Salesorder->find('all',array('conditions'=>array('Salesorder.is_deleted'=>0),'order' => array('Salesorder.id' => 'DESC')));
            $this->set('deleted_val',$id);
        endif;
        
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
            $priority=$this->Priority->find('list',array('conditions'=>array('Priority.is_deleted'=>0,'Priority.status'=>1),'fields'=>array('id','priority')));
            $payment=$this->Paymentterm->find('list',array('conditions'=>array('Paymentterm.is_deleted'=>0,'Paymentterm.status'=>1),'fields'=>array('id','pay')));
            $service=$this->Service->find('list',array('conditions'=>array('Service.is_deleted'=>0,'Service.status'=>1),'fields'=>array('id','servicetype')));
            $instrument_types=$this->InstrumentType->find('list',array('conditions'=>array('InstrumentType.status'=>1,'is_deleted'=>0),'fields'=>array('id','salesorder')));
            
            $this->set(compact('service','payment','priority','instrument_types'));
            $branch =   $this->branch->find('first',array('conditions'=>array('branch.defaultbranch'=>1,'branch.status'=>1)));
           $title =   $this->Title->find('all',array('conditions'=>array('Title.is_deleted'=>0,'Title.status'=>1)));
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
                    $this->Random->updateAll(array('Random.salesorder'=>'"'.$sales_orderid.'"'),array('Random.id'=>1));  
                    $this->device_id_session_logout($sales_orderid);
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
//                    $this->request->data['Logactivity']['logname']   =   'Salesorder';
//                    $this->request->data['Logactivity']['logactivity']   =   'Add SalesOrder';
//                    $this->request->data['Logactivity']['logid']   =   $this->request->data['Salesorder']['salesorderno'];
//                    $this->request->data['Logactivity']['logno']   =   $this->request->data['Salesorder']['salesorderno'];
//                    $this->request->data['Logactivity']['user_id'] = $this->Session->read('sess_userid');
//                    $this->request->data['Logactivity']['logapprove'] = 1;
//                    $this->Logactivity->create();
//                    $a = $this->Logactivity->save($this->request->data['Logactivity']);
//                    //pr($a);exit;
//                    /******************/
//                    /******************
//                    * Data Log Activity
//                    */
//                    $this->request->data['Datalog']['logname'] = 'Salesorder';
//                    $this->request->data['Datalog']['logactivity'] = 'Add';
//                    $this->request->data['Datalog']['logid'] = $this->request->data['Salesorder']['salesorderno'];
//                    $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
//                    $this->Datalog->create();
//                    $a = $this->Datalog->save($this->request->data['Datalog']);
                    
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
                    $this->request->data['Logactivity']['loglink'] = $this->request->data['Salesorder']['salesorderno'];
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
            $title =   $this->Title->find('all',array('conditions'=>array('Title.is_deleted'=>0,'Title.status'=>1)));
            foreach($title as $title_name)
            {
                $titles[] = $title_name['Title']['title_name'];
            }
            $this->set('titles',$titles);
            if($this->request->is('post'))
            {
                
               // $this->request->data['Salesorder']['our_ref_no'] = $id;
               //pr($this->request->data);exit;
                
            
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
//                        if($salesorder_details['Customer']['invoice_type_id']!=3)
//                        {
                            $this->set('sale',$salesorder_details);
                            $this->set('status_id','pending_status');
                            $this->request->data =   $salesorder_details;
                            $this->set('pendin',1);
                        //}
                        //else
                        //{
                        //    $this->Session->setFlash('Salesorder full invoice');
                         //   $this->redirect(array('controller'=>'Salesorders','action'=>'index'));
                       // }
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
                         $edit_device_details_check    =   $this->Description->find('all',array('conditions'=>array('Description.quotationno'=>$this->request->data['Salesorder']['quotationno'],'Description.pending'=>1)));
                         $this->Description->updateAll(array('Description.salesorder_id'=>'"'.$dmt.'"'),array('Description.quotationno'=>$this->request->data['Salesorder']['quotationno'],'Description.pending'=>1));
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
                       
                        // Status '0' will be deleted
                        $device_node_nonstatus    =   $this->Description->find('all',array('conditions'=>array('Description.status'=>0)));
                        
                        if(!empty($device_node_nonstatus))
                        {
                            $this->Description->deleteAll(array('Description.status'=>0));
                        }
                                               
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
                        $this->Random->updateAll(array('Random.salesorder'=>'"'.$sales_orderid.'"'),array('Random.id'=>1));  
                        if(!empty($this->request->data['Salesorder']['device_status']))
                        {
                            $device_node_pending    =   $this->Description->find('all',array('conditions'=>array('Description.customer_id'=>$customer_id,'Description.pending'=>1)));
                            if(!empty($device_node_pending))
                            {
                                $this->Description->updateAll(array('Description.salesorder_id'=>'"'.$sales_orderid.'"','Description.status'=>1,'Description.pending'=>0),array('Description.salesorder_id'=>'"'.$sales_orderid.'"','Description.customer_id'=>$customer_id,'Description.pending'=>1));
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
            $instrument_details=$this->CustomerInstrument->find('all',array('conditions'=>array('CustomerInstrument.customer_id'=>$customer_id,'CustomerInstrument.is_approved'=>1),'group'=>array('Instrument.id'),'contain'=>array('Instrument'=>array('conditions'=>array('Instrument.name LIKE'=>'%'.$instrument.'%')))));
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
                    echo "<div class='sales_instrument_id instrument_drop_show' align='left' id='".$list['Instrument']['id']."'>";
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
            $instrument_details=$this->CustomerInstrument->find('all',array('conditions'=>array('CustomerInstrument.customer_id'=>$customer_id,'CustomerInstrument.model_no LIKE'=>'%'.$model_no.'%','CustomerInstrument.instrument_id'=>$device_id,'CustomerInstrument.is_approved'=>1)));
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
            $brand_details=$this->CustomerInstrument->find('first',array('conditions'=>array('CustomerInstrument.instrument_id'=>$instrument_id,'CustomerInstrument.customer_id'=>$customer_id,'CustomerInstrument.is_approved'=>1),'recursive'=>'3'));
            
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
            $range_details=$this->CustomerInstrument->find('all',array('conditions'=>array('CustomerInstrument.id'=>$instrument_id,'CustomerInstrument.customer_id'=>$customer_id,'CustomerInstrument.is_approved'=>1),'recursive'=>'3'));
            
            if(!empty($range_details))
            {
                return json_encode($range_details);
            }
           
        }
        public function sales_add_instrument()
        {
            $this->autoRender = false;
            $this->loadModel('Description');
            $this->loadModel('Device');
            $this->request->data = json_decode(file_get_contents("php://input"));
            $data = array();
            //echo json_encode($this->request->data);
            //exit;
            
            $quantity = $this->request->data->instrument_quantity;
            
            $instrument_ids = array();
            
            for($i=0;$i<$quantity;$i++)
            {
                $device_last_insert_no = $this->Description->find('first',array('conditions'=>array('Description.salesorder_id'=>$this->request->data->salesorder_id),'order'=>'order_by DESC')); 
                $order_by_count = $device_last_insert_no['Description']['order_by'];
                //$order_by = $this->device_id_session($this->request->data->salesorder_id);
                $data['customer_id']          =   $this->request->data->customer_id;
                $data['salesorder_id']        =   $this->request->data->salesorder_id;
                $data['quotation_id']        =   $this->request->data->quotation_id;
                $data['quotationno']        =   $this->request->data->quotationno;
                $data['instrument_id']        =   $this->request->data->instrument_id;
                $data['device_id']            =   $this->request->data->device_id;
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
                $data['order_by']             =   $order_by_count+1;
                $data['status']               =   0;
                $data['is_approved']          =   0;
                $this->Description->create();
                if($this->Description->save($data))
                {
                    $instrument_ids[]=$this->Description->getLastInsertID();
                   
                    // Quotation Insert 
                    
                    // Order By Count
                    $device_last_insert_no = $this->Device->find('first',array('conditions'=>array('Device.quotationno'=>$this->request->data->quotationno),'order'=>'order_by DESC')); 
                    $order_by_count = $device_last_insert_no['Device']['order_by'];
                    
                    $data_quo['quotationno']   =   $this->request->data->quotationno;
                    $data_quo['quotation_id']   =   $this->request->data->quotation_id;
                    $data_quo['customer_id']   =   $this->request->data->customer_id;
                    $data_quo['instrument_id'] =   $this->request->data->instrument_id;
                    $data_quo['description_id']=   $this->Description->getLastInsertID();
                    $data_quo['brand_id']      =   $this->request->data->instrument_brand;
                    $data_quo['quantity']      =   $this->request->data->instrument_quantity;
                    $data_quo['model_no']      =   $this->request->data->instrument_modelno;
                    $data_quo['range']         =   $this->request->data->instrument_range;
                    $data_quo['call_location'] =   $this->request->data->instrument_calllocation;
                    $data_quo['call_type']     =   $this->request->data->instrument_calltype;
                    $data_quo['validity']      =   $this->request->data->instrument_validity;
                    $data_quo['discount']      =   $this->request->data->instrument_discount;
                    $data_quo['department_id'] =   $this->request->data->instrument_department;
                    $data_quo['unit_price']    =   $this->request->data->instrument_unitprice;
                    $data_quo['account_service']=  $this->request->data->instrument_account;
                    $data_quo['total']         =   $this->request->data->instrument_total;
                    //$data_quo['title']         =   $this->request->data->instrument_title;
                    $data_quo['order_by']      =   $order_by_count+1;
                    $data_quo['status']        =   1;
                    $des_id = $this->Description->getLastInsertID();
                    //pr($data_quo);//exit;
                    $this->Device->create();
                    if($this->Device->save($data_quo))
                    {
                        $instrument_id_dev=$this->Device->getLastInsertID();
                        $this->Description->updateAll(array('Description.device_id'=>$instrument_id_dev),array('Description.id'=>$des_id));
                    }
                    
                   
                    
                    $this->Session->setFlash(__('Instruments has been added Successfully'));
                }
                 $desc_make_all = $this->Description->find('all'); 
                    
                foreach($desc_make_all as $desc_quo):
                    $this->Device->updateAll(array('Device.description_id'=>$desc_quo['Description']['id']),array('Device.id'=>$desc_quo['Description']['device_id']));
                    //$desc_quo['Description']['device_id'];
                endforeach;
            }
            
            
            header('Content-Type: application/json');
            echo json_encode($instrument_ids);
             
        }
        public function sales_add_instrument_2()
        {
            $this->autoRender = false;
            $this->loadModel('Description');
            $this->request->data = json_decode(file_get_contents("php://input"));
            $data = array();
            //echo json_encode($this->request->data);
            //exit;
            
            $quantity = $this->request->data->instrument_quantity;
            
            $instrument_ids = array();
            
            for($i=0;$i<$quantity;$i++)
            {
                $order_by = $this->device_id_session($this->request->data->salesorder_id);
                $data['customer_id']          =   $this->request->data->customer_id;
                $data['salesorder_id']        =   $this->request->data->salesorder_id;
                $data['instrument_id']        =   $this->request->data->instrument_id;
//                if($this->request->data->device_id):
//                $data['device_id']            =   $this->request->data->device_id;
//                endif;
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
                $data['order_by']             =   $order_by;
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
            //pr($this->request->data);exit;
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
            $edit_device_details    =   $this->Description->find('all',array('conditions'=>array('Description.salesorder_id'=>$sales_id),'order'=>'Description.order_by asc'));
            //pr($edit_device_details);
            foreach($edit_device_details as $edit_device):
                $edit_device_val[]=$edit_device;
            endforeach;
            //pr($edit_device_val);exit;
            if(empty($edit_device_details)):
            $edit_device_details    =   $this->Description->find('all',array('conditions'=>array('Description.quotationno'=>$quo_id,'Description.pending'=>1),'order'=>'Description.order_by asc'));
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
            $edit_device_details_check    =   $this->Description->find('all',array('conditions'=>array('Description.salesorder_id'=>$sales_id,'Description.pending'=>1,'Description.is_deleted'=>0),'order'=>'Description.order_by asc'));
            if(empty($edit_device_details_check)){
            $edit_device_details    =   $this->Description->find('all',array('conditions'=>array('Description.salesorder_id'=>$sales_id,'Description.is_deleted'=>0),'order'=>'Description.order_by asc'));
            foreach($edit_device_details as $edit_device):
                $edit_device_val[]=$edit_device;
            endforeach; 
            echo json_encode($edit_device_val);
            }
            else
            {
            $edit_device_details    =   $this->Description->find('all',array('conditions'=>array('Description.salesorder_id'=>$sales_id,'Description.pending'=>1,'Description.is_deleted'=>0),'order'=>'Description.order_by asc'));
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
            $data1 = $this->Salesorder->find('first',array('conditions'=>array('Salesorder.salesorderno'=>$id)));
            $data2 = $this->Quotation->find('first',array('conditions'=>array('Quotation.quotationno'=>$data1['Salesorder']['quotationno'])));
            $appr_id = $data2['Quotation']['is_approved'];
            if($appr_id == 1):
            $this->Salesorder->updateAll(array('Salesorder.is_approved'=>1),array('Salesorder.salesorderno'=>$id));
            $this->Description->updateAll(array('Description.is_approved'=>1),array('Description.salesorder_id'=>$id));
            //pr($id1);exit;
            $user_id = $this->Session->read('sess_userid');
            $this->Logactivity->updateAll(array('Logactivity.logapprove'=>2,'Logactivity.approved_by'=>$user_id),array('Logactivity.logid'=>$id,'Logactivity.logactivity'=>'Add SalesOrder'));
            else:
                echo "failure";
            endif;
            
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
                    echo "<div class='customer_show_sales instrument_drop_show' align='left' id='".$data[$i]['Customer']['id']."'>";
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


            
 $html = '<html>
<head>
<meta charset="utf-8" />
<title>'.$salesorder_data['Salesorder']['salesorderno'].'</title>
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
#footer { position: fixed; left: 0px; bottom: -180px; right: 0px; height: 330px; }
#footer .page:after { content: counter(page); }
</style>
</head>';
 
            $title =   $this->Title->find('all');
            foreach($title as $title_name)
            {
                $titles[] = $title_name['Title']['title_name'];
            }
           // pr($salesorder_data);exit;
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
                $quotationno = $salesorder_data['Salesorder']['quotationno'];
                foreach($salesorder_data['Description'] as $device):
                    $device_name[] = $device;
                endforeach;
                $ins_type = $salesorder_data['Quotation']['InstrumentType']['salesorder'];
               // pr($device_name);exit;

  

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
               <td width="198" style="padding:0 10px;"><div style="display:inline-block;font-size:18px;font-weight:bold; font-style:italic;color:#00005b !important">SALESORDER</div></td>
               <td width="391" style="padding:0 10px;"><div style="display:inline-block;background:#00005b;color:#fff !important;padding:5px;font-size:13px;text-align:right;"">COMPANY REG NO. 200510697M</div></td>
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
                              <td  width="270" colspan="3" style="padding:5px 0;"><div align="center" style="font-size:28px;border-bottom:1px solid #000;width:100%;padding:5px 0;font-weight:bolder; position:relative;top:-10px;">'.$salesorderno.'</div></td>
                         </tr>
                         <tr>
						     
                              <td style="padding-left:5px;width:50px;" width="50">OUR REF NO </td>
                              
                              <td style="padding-right:10px;">: &nbsp;&nbsp;&nbsp;'.$quotationno.'</td>
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
<div style="padding-top:5px;">'.$ins_type.' :</div>

</div></div>';
$html .='<div id="footer">
     <div style="width:100%;">
          <table cellpadding="1" cellspacing="1"  style="width:100%;">
          <tr>
               <td style="padding:5px;width:50%;border:1px solid #000;"><table cellpadding="0" cellspacing="0">
                         <tr>
                              <td>CONFIRMED AND ACCEPTED BY:</td>
                         </tr>
                         
                         <tr>
                              <td style="padding-top:30px;"><div style="border-top:1px solid #000;width:100%;">COMPANYS STAMP,SIGNATURE AND DATE</div></td>
                         </tr>
                         <tr>
                              <td style="padding-top:10px;">DESIGNATION :</td>
                         </tr>
                         <tr>
                              <td style="padding-top:10px;">NAME :</td>
                         </tr>
                    </table></td>
               <td></td>
               <td></td>
               <td></td>
               <td></td>
               <td style="border:1px dashed #000;padding:5px;width:50%;"><table width="270" cellpadding="0" cellspacing="0">
                         <tr>
                              <td width="214" style="text-align:center;padding-bottom:50px;">FOR BS TECH PTE LTD</td>
                         </tr>
                         <tr>
                              <td style="font-size:9px !important;color:#777 !important; text-align:center;"> Authorized Signature</td>
                         </tr>
                    </table></td>
          </tr>
     </table>
     

<div style="font-size:9px !important;width:100%;margin-top:10px;">1) THE LABORATORY SHALL RECOMMEND THE CALIBRATION DUE DATE AS PER THE CLIENTS REQUIREMENT OF 1 YEAR, UNLESS OTHERWISE AGREED ON THE TIME FRAME.</div>
<div style="font-size:9px !important;width:100%;">2) ANY DISCREPANCY NOTED HEREIN MUST BE BROUGHT TO THE NOTICE OF THE COMPANY WITHIN 24 HOURS; OTHERWISE ALL DOCUMENTATIONS WILL BE DEEMED TO BE CORRECT.</div>
<div style="font-size:9px !important;width:100%;">3) PLEASE RETURN FAX OR RAISE YOUR PURCHASE ORDER UPON CONFIRMATION. YOU MAY CONTACT SALES PERSONNEL IF THERE ARE ANY QUERIES AT 6458 4411.</div>
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
                        $html .= '<table cellpadding="0" cellspacing="0"  style="width:100%;margin-top:180px;">      <tr>
               <td style="border-bottom:1px solid #000;text-transform:uppercase;padding:3px 10px;font-size:11px !important;color: #000 !important;">Item</td>
               <td style="border-bottom:1px solid #000;text-transform:uppercase;padding:3px 10px;font-size:11px !important;color: #000 !important;">Qty</td>
               <td style="border-bottom:1px solid #000;text-transform:uppercase;padding:3px 10px;font-size:11px !important;color: #000 !important;width:20%;">Description</td>
               <td style="border-bottom:1px solid #000;text-transform:uppercase;padding:3px 10px;font-size:11px !important;color: #000 !important;">Brand</td>
               <td style="border-bottom:1px solid #000;text-transform:uppercase;padding:3px 10px;font-size:11px !important;color: #000 !important;width:10%;">Model No</td>
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
                        $html .= '<table cellpadding="0" cellspacing="0"  style="width:100%;page-break-before: always;margin-top:180px;">      <tr>
               <td style="border-bottom:1px solid #000;text-transform:uppercase;padding:3px 10px;font-size:11px !important;color: #000 !important;">Item</td>
               <td style="border-bottom:1px solid #000;text-transform:uppercase;padding:3px 10px;font-size:11px !important;color: #000 !important;">Qty</td>
               <td style="border-bottom:1px solid #000;text-transform:uppercase;padding:3px 10px;font-size:11px !important;color: #000 !important;width:20%;">Description</td>
               <td style="border-bottom:1px solid #000;text-transform:uppercase;padding:3px 10px;font-size:11px !important;color: #000 !important;">Brand</td>
               <td style="border-bottom:1px solid #000;text-transform:uppercase;padding:3px 10px;font-size:11px !important;color: #000 !important;width:10%;">Model No</td>
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
                        <td style="padding:3px 10px ;">'.$device['order_by'].'</td>
                        <td style="padding:3px 10px;">1</td>
                        <td style="padding:3px 10px;width:20%;">'.$device['Instrument']['name'].'</td>
                        <td style="padding:3px 10px;">'.$device['Brand']['brandname'].'</td>
                        <td style="padding:3px 10px;width:10%;">'.$device['model_no'].'</td>
                        <td style="padding:3px 10px;">'.$device['Range']['range_name'].'</td>';
                        for($i=0;$i<=4;$i++):
                        if(isset($titles[$i])):
                        $html .='<td style="padding:3px 10px;">'.$device['title'.($i+1).'_val'].'</td>';
                        endif;
                        endfor;
                        $html .='</tr>';
                    
                endforeach;
                $html .='<tr><td colspan="4" style="padding:20px 0px;"><div style="border:1px  dashed #666;text-align:right;padding:10px;color: #000 !important;font-size:11px !important;">SPECIAL REQUIREMENTS :</div></td>
               <td  colspan="5"  style="padding:20px 0px;"><div style="border:1px dashed #666;border-left:none; text-align:left;padding: 10px;font-size:11px !important;">
               Self Collect & Self Delivery Non-Singlas</div></td></tr></table>';
                
$html .= '</div>'; 

                //pr($html);exit;
        $this->export_report_all_format($file_type, $filename, $html);
    }
    function pdf_tag($id = NULL) 
    {

        $this->autoRender = false;
        $salesorder_data = $this->Salesorder->find('first', array('conditions' => array('Salesorder.id' => $id),'recursive'=>3));
        $quotation_data = $this->Quotation->find('first', array('conditions' => array('Quotation.id' => $salesorder_data['Salesorder']['quotation_id']),'recursive'=>2));
        //pr($salesorder_data);exit;
        $file_type = 'pdf';
        $filename = $salesorder_data['Salesorder']['salesorderno'];


             $title =   $this->Title->find('all');
            foreach($title as $title_name)
            {
                $titles[] = $title_name['Title']['title_name'];
            }
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
                
            //pr($titles);
            //exit;
 $html = '<html lang="en">
<head>
<meta charset="utf-8" />
<title></title>
<link href="http://fonts.googleapis.com/css?family=Oswald" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Oswald:300,700" rel="stylesheet" type="text/css">
<style>
* { margin:0; padding:0; font-size:13px; color:#333 !important;line-height:1; }
table td { font-size:13px; line-height:18px; }
.table_format table { }
.table_format td { text-align:center; }
</style>
</head>
<body style="font-family:Oswald;font-size:11px;padding:10px;margin:0;font-weight:300;">
<div style="margin-top:20px;">
          ';
 $n = 0;
 foreach($device_name as $device):
      if(!($n%2)):
     $html .=' <div style="width:100%;">';
      endif;
      $count = 0;

                   $html .='
                     
<div style="width:50%;display:inline-block;margin-bottom: 5px;height:171.5px;">
     <table width="100%" cellpadding="0" cellspacing="1"  style="border:1px solid #333;">
                        
                         <tr  style="padding-top:30px;">
                              <td  style="line-height:10px !important;font-size:11px !important; text-align:center !important;border-bottom:1px solid #000 !important;border-right:1px solid #000 !important;">'.$device['order_by'].' </td>
                              <td   style="font-size:12px !important;border-bottom:1px solid #000 !important;text-align:center !important;border-right:1px solid #000 !important;">REGISTRATION TAG</td>
                              <td   style="line-height:10px !important;font-size:11px !important;border-bottom:1px solid #000 !important;text-align:center !important;">'.$reg_date.'</td>
                         </tr>
                         <tr  style="padding-top:30px;">
                              <td style="line-height:10px !important;font-size:11px !important;padding:0 5px;">JOB NO. </td>
                              
                              <td  style="line-height:10px !important;font-size:11px !important;padding:0 5px;">'.$salesorderno.'</td>
                                  <td></td>
                         </tr>
                         <tr>
                              <td style="line-height:10px !important;font-size:11px !important;padding:0 5px;">CUSTOMER </td>
                              
                              <td  style="line-height:10px !important;font-size:11px !important;padding:0 5px;">'.$customername.'</td>
                                  <td></td>
                         </tr>
                         <tr>
                              <td style="line-height:10px !important;font-size:11px !important;padding:0 5px;">INSTRUMENT </td>
                             
                              <td  style="line-height:10px !important;font-size:11px !important;padding:0 5px;"> '.$device['Instrument']['name'].'</td>
                                  <td></td>
                         </tr>
                         <tr>
                              <td style="line-height:10px !important;font-size:11px !important;padding:0 5px;">MODEL NO </td>
                            
                              <td style="line-height:10px !important;font-size:11px !important;padding:0 5px;"> '.$device['model_no'].'</td>
                                  <td></td>
                         </tr>
                         <tr>
                              <td style="line-height:10px !important;font-size:11px !important;padding:0 5px;">BRAND </td>
                             
                              <td  style="line-height:10px !important;font-size:11px !important;padding:0 5px;">'.$device['Brand']['brandname'].'</td>
                                  <td></td>
                         </tr>
                         <tr>
                              <td style="line-height:10px !important;font-size:11px !important;padding:0 5px;">RANGE </td>
                              
                              <td style="line-height:10px !important;font-size:11px !important;padding:0 5px;">'.$device['Range']['range_name'].'</td>
                                  <td></td>
                         </tr>';
                         for($i=0;$i<=4;$i++):
                             if(isset($titles[$i])):
                        $html .='<tr>
                              <td style="line-height:10px !important;font-size:11px !important;padding:0 5px;">'.$titles[$i].'</td>
                             
                              <td style="line-height:10px !important;font-size:11px !important;padding:0 5px;">'.$device['title'.($i+1).'_val'].'</td>
                                  <td></td>
                         </tr>';
                             endif;
                         endfor;
                         $html .='<tr>
                              <td style="line-height:10px !important;font-size:11px !important;padding:0 5px;">SERVICE </td>
                              
                              <td style="line-height:10px !important;font-size:11px !important;padding:0 5px;">'.$device['sales_accountservice'].'</td>
                                  <td></td>
                         </tr>
                         <tr>
                              <td style="line-height:10px !important;font-size:11px !important;padding:0 5px;">DEPARTMENT </td>
                              
                              <td style="line-height:10px !important;font-size:11px !important;padding:0 5px;">'.$device['Instrument']['Department']['departmentname'].'</td>
                                  <td></td>
                         </tr>
                         
                         <tr>
                            <td colspan="3" style="line-height:10px !important;font-size:11px !important;padding:3px; text-align: center;border-top:1px solid #000">BS TECH PTE LTD </td>
                         </tr>
                   
               
              
     </table>
</div>

 ';if(($n%2)):
                   $html .='</div>';
 endif;
 
 $n=$n+1;
                    endforeach;
               $html .='
</div>
</body>
</html>';
               //print($html);exit;
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
    
    public function inv_title1()
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
    public function inv_title2()
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
    public function inv_title3()
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
    public function inv_title4()
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
    public function inv_title5()
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
    public function inv_title6()
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
    public function inv_title7()
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
    public function inv_title8()
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
    public function edit_unit()
    {
        $this->autoRender   =   false;
         if ($this->request->data) {
            App::uses('Sanitize', 'Utility');
            $unit_price = Sanitize::clean($this->request->data['unit_price']);
            $this->Description->id = $this->request->data['device_id'];
            $dev = $this->Description->find('first',array('conditions'=>array('Description.id'=>$this->request->data['device_id'])));
            $this->Device->updateAll(array('Device.unit_price'=>$unit_price,'Device.total'=>$unit_price),array('Device.id'=>$dev['Description']['device_id']));
            $this->Description->saveField('sales_unitprice', $unit_price);
            $this->Description->saveField('sales_total', $unit_price);
            
            
//            $this->Description->id = $this->request->data['device_id'];
//            //$this->Device->updateAll(array('Device.title1_val'=>$title),array('Device.id'=>$this->request->data['device_id']));
//            $this->Description->saveField('title8_val', $title);
            echo $unit_price;
        }
    }
    public function price_change()
    {
        $this->autoRender   =   false;
         if ($this->request->data) {
            App::uses('Sanitize', 'Utility');
            $sales_unitprice = Sanitize::clean($this->request->data['sales_unitprice']);

            $this->Description->id = $this->request->data['device_id'];
            $dev = $this->Description->find('first',array('conditions'=>array('Description.id'=>$this->request->data['device_id'])));
            $this->Device->updateAll(array('Device.unit_price'=>$sales_unitprice,'Device.total'=>$sales_unitprice),array('Device.id'=>$dev['Description']['device_id']));
            $this->Description->saveField('sales_unitprice', $sales_unitprice);
            $this->Description->saveField('sales_total', $sales_unitprice);
            echo $sales_unitprice;
        }
    }
    public function price_change_discount()
    {
        $this->autoRender   =   false;
         if ($this->request->data) {
            App::uses('Sanitize', 'Utility');
            $sales_discount = Sanitize::clean($this->request->data['sales_discount']);

            $this->Description->id = $this->request->data['device_id'];
            $dev = $this->Description->find('first',array('conditions'=>array('Description.id'=>$this->request->data['device_id'])));
            $sales_total = $dev['Description']['sales_total'];
            $sales_total_total = $sales_total - ($sales_total * $sales_discount/100);
            $this->Device->updateAll(array('Device.discount' => $sales_discount,'Device.total' => $sales_total_total),array('Device.id' => $dev['Description']['device_id']));
            $this->Description->saveField('sales_total', $sales_total_total);
            $this->Description->saveField('sales_discount', $sales_discount);
            echo $sales_discount;
        }
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
        
    public function datalog()
    {
        
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
            $salesorder_list = $this->Description->find('all',array('conditions'=>$conditions));
            //$quotation_lists = $this->Device->find('all',array('conditions'=>$conditions));
        }
        else
        {
            $salesorder_list = $this->Salesorder->find('all',array('conditions'=>$conditions,'order' => array('Salesorder.id' => 'DESC')));
            //$quotation_lists = $this->Quotation->find('all',array('conditions'=>$conditions,'order' => array('Quotation.created' => 'ASC')));    
        }
        //$quotation_lists = $this->Quotation->find('all',array('conditions'=>$conditions,'order' => array('Quotation.created' => 'ASC')));
        
        //pr($quotation_dev_lists);exit;
        //pr($quotation_lists);
        $this->set('salesorder', $salesorder_list);
        //$log = $this->Quotation->getDataSource()->getLog(false, false);
        //debug($log);
        //exit;
        }
        else
        {
            //pr($this->request->data['fulllist']);exit;
        if(!isset($this->request->data['fulllist'])){
         $salesorder_list = $this->Salesorder->find('all',array('conditions'=>array('Salesorder.is_deleted'=>0),'order' => array('Salesorder.id' => 'DESC')));
         $this->set('fulllist', 0);
        }
        else
        {
         $salesorder_list = $this->Description->find('all',array('conditions'=>array('Salesorder.is_deleted'=>0)));  
         $this->set('fulllist', 1);
        }
        $this->set('salesorder', $salesorder_list);
        }
        
        
        
        
        
    }
    public function reportfinal() {
            $this->viewClass = 'Media';
            // Download app/webroot/files/example.csv
            $params = array(
               'id'        => 'salesorderdatas.csv',
               'name'      => 'salesorderdatas',
               'extension' => 'csv',
               'download'  => true,
               'path'      => APP . 'webroot' . DS. 'excel'. DS  // file path
           );
           $this->set($params);
        }
		
	public function update_remark_track()
    {
        $this->autoRender   =   false;
         if ($this->request->data) {
            App::uses('Sanitize', 'Utility');
            $title = Sanitize::clean($this->request->data['remarks']);

            $this->Salesorder->id = $this->request->data['id'];
           // $this->Salesorder->updateAll(array('Salesorder.remark_track'=>$title),array('Salesorder.id'=>$this->request->data['id']));
            $this->Salesorder->saveField('Salesorder.remark_track', $title);
            echo $title;
        }
    } 
}

?>
