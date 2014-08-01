<?php
    class SalesordersController extends AppController
    {
        public $helpers = array('Html','Form','Session');
        public $uses =array('Priority','Paymentterm','Quotation','Currency','Contactpersoninfo','SalesDocument',
                            'Country','Additionalcharge','Service','CustomerInstrument','Customerspecialneed',
                            'Instrument','Brand','Customer','Device','Salesorder','Description','Logactivity','branch');
        public function index()
        {
            //$this->Quotation->recursive = 1; 
            $salesorder_list = $this->Salesorder->find('all',array('conditions'=>array('Salesorder.is_deleted'=>0),'order' => array('Salesorder.id' => 'DESC')));
            $this->set('salesorder', $salesorder_list);
        }
        public function add()
        {
            $dmt    =   $this->random('salesorder');
            $this->set('salesorderno', $dmt);
            $priority=$this->Priority->find('list',array('fields'=>array('id','priority')));
            $payment=$this->Paymentterm->find('list',array('fields'=>array('id','pay')));
            $service=$this->Service->find('list',array('fields'=>array('id','servicetype')));
            $this->set(compact('service','payment','priority'));
            $branch =   $this->branch->find('first',array('conditions'=>array('branch.defaultbranch'=>1,'branch.status'=>1)));
            
            if($this->request->is('post'))
            {
                $customer_id    =   $this->request->data['Salesorder']['customer_id'];
                $this->request->data['Quotation']['customername']=$this->request->data['sales_customername'];
                $this->request->data['Salesorder']['id']=$this->request->data['Salesorder']['salesorderno'];
                $quotation_id   =   $this->request->data['Salesorder']['quotation_id'];
                $this->request->data['Salesorder']['branch_id']=$branch['branch']['id'];
               
                if($this->Salesorder->save($this->request->data['Salesorder']))
                {
                    $sales_orderid  =   $this->Salesorder->getLastInsertID();
                    /***********************for pending process in Salesorder*************************************/
                    if(!empty($this->request->data['Salesorder']['device_status']))
                    {
                        $device_node_pending    =   $this->Description->find('all',array('conditions'=>array('Description.customer_id'=>$customer_id,'Description.pending'=>1)));
                        if(!empty($device_node_pending))
                        {
                            $this->Description->updateAll(array('Description.salesorder_id'=>'"'.$sales_orderid.'"','Description.status'=>1,'Description.pending'=>0),array('Description.customer_id'=>$customer_id,'Description.pending'=>1));
                        }
                        $this->Quotation->updateAll(array('Quotation.salesorder_created'=>1),array('Quotation.id'=>$quotation_id));
                        $sales_document =   $this->SalesDocument->deleteAll(array('SalesDocument.Salesorderno'=>$this->request->data['Salesorder']['salesorderno'],'SalesDocument.status'=>0));
                        if(!empty($sales_document))
                        {  
                            $this->SalesDocument->updateAll(array('SalesDocument.salesorder_id'=>'"'.$sales_orderid.'"','SalesDocument.customer_id'=>'"'.$customer_id.'"'),array('SalesDocument.salesorderno'=>$this->request->data['Salesorder']['salesorderno'],'SalesDocument.status'=>1));
                        }
                    }
                    else
                    {
                        $device_node    =   $this->Description->find('all',array('conditions'=>array('Description.customer_id'=>$customer_id)));
                        if(!empty($device_node))
                        {
                            $this->Description->updateAll(array('Description.salesorder_id'=>'"'.$sales_orderid.'"','Description.status'=>1),array('Description.customer_id'=>$customer_id,'Description.status'=>0));
                        }
                        $this->Quotation->updateAll(array('Quotation.salesorder_created'=>1),array('Quotation.id'=>$quotation_id));
                        $sales_document =   $this->SalesDocument->deleteAll(array('SalesDocument.Salesorderno'=>$this->request->data['Salesorder']['salesorderno'],'SalesDocument.status'=>0));
                        if(!empty($sales_document))
                        {  
                            $this->SalesDocument->updateAll(array('SalesDocument.salesorder_id'=>'"'.$sales_orderid.'"','SalesDocument.customer_id'=>'"'.$customer_id.'"'),array('SalesDocument.salesorderno'=>$this->request->data['Salesorder']['salesorderno'],'SalesDocument.status'=>1));
                        }
                    }
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
                    $this->Session->setFlash(__('Salesorder has been Added Successfully'));
                    $this->redirect(array('controller'=>'Salesorders','action'=>'index'));
                }
            }
        }
        public function Salesorder_by_quotation($id=NULL)
        {
            $dmt    =   $this->random('salesorder');
            $this->set('salesorderno', $dmt);
            $priority=$this->Priority->find('list',array('fields'=>array('id','priority')));
            $payment=$this->Paymentterm->find('list',array('fields'=>array('id','pay')));
            $service=$this->Service->find('list',array('fields'=>array('id','servicetype')));
            $this->set(compact('service','payment','priority'));
            $branch =   $this->branch->find('first',array('conditions'=>array('branch.defaultbranch'=>1,'branch.status'=>1)));
            
            if($this->request->is('post'))
            {
               
               if(isset($this->request->data['Salesorder']['salesorder_created']) && $this->request->data['Salesorder']['salesorder_created']==1)
               {
                   //For pending process in Salesorder by quotation
                   $device_current_status   =  $this->request->data['quotation_device_status']; 
                   if($device_current_status=='pending')
                   {
                        $salesorder_details    =   $this->Salesorder->find('first',array('conditions'=>array('Salesorder.quotationno'=>$this->request->data['Salesorder']['quotation_id']),'contain'=>array('Description'=>array('Instrument','Brand','Range','Department','conditions'=>array('Description.pending'=>'1')),'Customer'),'recursive'=>3));
                        if($salesorder_details['Customer']['invoice_type_id']!=3)
                        {
                            $this->set('sale',$salesorder_details);
                            $this->set('status_id','pending_status');
                            $this->request->data =   $salesorder_details;
                        }
                   }
                   else
                   {
                        $quotation_details    =   $this->Quotation->find('first',array('conditions'=>array('Quotation.quotationno'=>$this->request->data['Salesorder']['quotation_id'],'Quotation.is_approved'=>'1'),'recursive'=>'2'));
                        // pr($quotation_details);exit;
                        $contact_list   =   $this->Contactpersoninfo->find('list',array('conditions'=>array('Contactpersoninfo.customer_id'=>$quotation_details['Quotation']['customer_id'],'Contactpersoninfo.status'=>1),'fields'=>array('id','name')));
                        $this->set(compact('contact_list'));
                        $sales_details =  $quotation_details['Quotation']  ;
                        $sales['Salesorder']   =    $sales_details;
                        $sales['Description']  =    $quotation_details['Device'];
                        $sales['Salesorder']['quotation_id']   =    $sales_details['id'];
                        $device_node_nonstatus    =   $this->Description->find('all',array('conditions'=>array('Description.quotation_id'=>$sales['Salesorder']['quotation_id'],'Description.status'=>0)));
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
                            $device_node    =   $this->Description->find('all',array('conditions'=>array('Description.customer_id'=>$customer_id)));
                            if(!empty($device_node))
                            {
                                $this->Description->updateAll(array('Description.salesorder_id'=>'"'.$sales_orderid.'"','Description.status'=>1),array('Description.customer_id'=>$customer_id,'Description.status'=>0));
                            }
                            $this->Quotation->updateAll(array('Quotation.salesorder_created'=>1),array('Quotation.id'=>$quotation_id));
                        }
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
            $priority=$this->Priority->find('list',array('fields'=>array('id','priority')));
            $payment=$this->Paymentterm->find('list',array('fields'=>array('id','pay')));
            $service=$this->Service->find('list',array('fields'=>array('id','servicetype')));
            
            $salesorder_details=$this->Salesorder->find('first',array('conditions'=>array('Salesorder.id'=>$id),'recursive'=>'2'));
            
            $this->set('salesorder',$salesorder_details);
            //pr($salesorder_details);exit;
            
            $this->set(compact('priority','payment','service'));
            if($this->request->is(array('post','put')))
            {
                $customer_id    =   $this->request->data['Salesorder']['customer_id'];
                $this->Salesorder->id=$id;
                if($this->Salesorder->save($this->request->data['Salesorder']))
                {
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
            
            if($id!='')
            {
                if($this->Salesorder->updateAll(array('Salesorder.is_deleted'=>1),array('Salesorder.id'=>$id)))
                {
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
        public function quotation_search()
        {
            
            $this->autoRender = false;
            $this->loadModel('Quotation');
            $name =  $this->request->data['id'];
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
                 
                 $data = $this->Quotation->find('all',array('conditions'=>array('Quotation.quotationno LIKE'=>'%'.$name.'%','Quotation.is_approved'=>'1','Quotation.salesorder_created'=>0)));
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
        
      
}
