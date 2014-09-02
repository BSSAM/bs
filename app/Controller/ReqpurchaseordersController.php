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
            $priority=$this->Priority->find('list',array('fields'=>array('id','priority')));
            $payment=$this->Paymentterm->find('list',array('fields'=>array('id','pay')));
            $service=$this->Service->find('list',array('fields'=>array('id','servicetype')));
            $this->set(compact('service','payment','priority'));
            $branch =   $this->branch->find('first',array('conditions'=>array('branch.defaultbranch'=>1,'branch.status'=>1)));
            
            if($this->request->is('post'))
            {
               
                if($this->Reqpurchaseorder->save($this->request->data['Reqpurchaseorder']))
                {
                    $req_purchaseorderid  =   $this->Reqpurchaseorder->getLastInsertID();
                    /***********************for pending process in Salesorder*************************************/
                    $device_node    =   $this->ReqDevice->find('all',array('conditions'=>array('ReqDevice.prequistionno'=>$this->request->data['Reqpurchaseorder']['requisitionno'],'ReqDevice.status'=>0)));
                    if(!empty($device_node))
                    {
                        $this->ReqDevice->updateAll(array('ReqDevice.reqpurchaseorder_id'=>'"'.$req_purchaseorderid.'"','ReqDevice.status'=>1),array('ReqDevice.prequistionno'=>$this->request->data['Reqpurchaseorder']['requisitionno'],'ReqDevice.status'=>0));
                    }
                    $this->request->data['ReqCustomerSpecialNeed']['reqpurchaseorder_id']=$req_purchaseorderid;
                    $this->ReqCustomerSpecialNeed->save($this->request->data['ReqCustomerSpecialNeed']); 
                    
                    $this->PurchaseRequisition->updateAll(array('PurchaseRequisition.is_prpurchaseorder_created'=>1),array('PurchaseRequisition.prequistionno'=>$this->request->data['Reqpurchaseorder']['requisitionno']));
                 
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
        if($user_role['job_salesorder']['add'] == 0){ 
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
                       
                $this->ReqDevice->deleteAll(array('ReqDevice.prequistionno'=>$id,'ReqDevice.status'=>0));
                $requistion_id  =   $this->request->data['Reqpurchaseorder']['prequistion_id'];
                $con = $this->PurchaseRequisition->find('first',array('conditions'=>array('PurchaseRequisition.prequistionno'=>$this->request->data['Reqpurchaseorder']['prequistion_id'],'PurchaseRequisition.is_superviser_approved'=>1,'PurchaseRequisition.is_manager_approved'=>1,'PurchaseRequisition.is_deleted '=>0)));
                
                $instrument_type = $con['InstrumentType']['purchase_requisition'];
                //pr($instrument_type); exit;
                $this->set('instrument_type',$instrument_type);
                $contact_list   =   $this->Contactpersoninfo->find('list',array('conditions'=>array('Contactpersoninfo.customer_id'=>$con['PurchaseRequisition']['customer_id'],'Contactpersoninfo.status'=>1),'fields'=>array('id','name')));
                //pr($contact_list);exit;
                $this->set(compact('contact_list'));
                $req_details =  $con['PurchaseRequisition'];
                $req_pur['Reqpurchaseorder']          =    $req_details;
                $req_pur['ReqCustomerSpecialNeed']    =    $con['PreqCustomerSpecialNeed'];
                $req_pur['ReqDevice']                 =    $con['PreqDevice'];
                           
                $this->set('requistion_details',$req_pur);
                
                foreach($req_pur['ReqDevice'] as $sale):
                    $this->ReqDevice->create();
                     $this->request->data['ReqDevice']['is_approved']          =   0;
                    $description_data  =   $this->preq_devices($sale['id']);
                    
                    $this->ReqDevice->save($description_data);
                endforeach;   
                $this->request->data =   $req_pur;
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
            $con = $this->Quotation->find('first',array('conditions'=>array('Quotation.quotationno'=>$salesorder_details['Quotation']['quotationno'],'Quotation.is_approved'=>1,'Quotation.status'=>1)));
                    $instrument_type = $con['InstrumentType']['salesorder'];
                    //pr($instrument_type);
                    $this->set('instrument_type',$instrument_type);
            //pr($salesorder_details);exit;
            
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
                        //$device_node    =   $this->Description->find('all',array('conditions'=>array('Description.customer_id'=>$customer_id)));
                        //if(!empty($device_node))
                        //{
                        //$this->Description->updateAll(array('Description.salesorder_id'=>'"'.$id.'"','Description.status'=>'1'),array('Description.customer_id'=>$customer_id));
                        //}
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
            if($this->Description->updateAll(array('Description.pending'=>1),array('Description.id'=>$device_id)))
            {
                echo "deleted";
            }
        }
        public function sales_edit_instrument()
        {
            $this->autoRender=false;
            $device_id= $this->request->data['edit_device_id'];
            $this->loadModel('Description');
            $edit_device_details    =   $this->Description->find('first',array('conditions'=>array('Description.id'=>$device_id)));
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
        public function preq_search()
        {
            
            $this->autoRender = false;
            $this->loadModel('PurchaseRequisition');
            $name =  $this->request->data['id'];
       
                $data = $this->PurchaseRequisition->find('all',array('conditions'=>array('PurchaseRequisition.is_manager_approved'=>1,'PurchaseRequisition.is_superviser_approved'=>1,'PurchaseRequisition.is_deleted'=>0,'PurchaseRequisition.prequistionno  LIKE'=>'%'.$name.'%',)));
               
                $c = count($data);
                if($c!=0)
                {
                     for($i = 0; $i<$c;$i++)
                     { 
                         echo "<div class='quotation_single' align='left' id='".$data[$i]['PurchaseRequisition']['id']."'>";
                         echo $data[$i]['PurchaseRequisition']['prequistionno'];
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
        
      
}

?>
