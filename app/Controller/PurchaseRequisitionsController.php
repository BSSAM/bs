<?php
    class PurchaseRequisitionsController extends AppController
    {
        public $helpers = array('Html','Form','Session');
        public $uses =array('Priority','Paymentterm','Quotation','Currency','Document',
                            'Country','Additionalcharge','Service','CustomerInstrument','Customerspecialneed',
                            'Instrument','Brand','Customer','Device','Unit','Logactivity','InstrumentType',
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
            if($user_role['job_quotation']['view'] == 0){ 
                return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
            }

            $this->set('userrole_cus',$user_role['job_quotation']);
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
            if($user_role['job_quotation']['add'] == 0){ 
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
           
            if($this->request->is('post'))
            {
                
                $date = date('m/d/Y h:i:s a', time());
                $this->request->data['PurchaseRequisition']['created_by'] = $date;
                $customer_id=$this->request->data['PurchaseRequisition']['customer_id'];
                $this->request->data['PurchaseRequisition']['customername']=$this->request->data['customername'];
                $this->request->data['PurchaseRequisition']['branch_id']=$branch['branch']['id'];
                
                if($this->PurchaseRequisition->save($this->request->data['PurchaseRequisition']))
                {
                    $purchaserequisitions_id   =   $this->PurchaseRequisition->getLastInsertID();
                    
                    $requistion_no  =   $this->request->data['PurchaseRequisition']['prequistionno'];
                    $device_node    =   $this->PreqDevice->find('all',array('conditions'=>array('PreqDevice.prequistionno'=>$requistion_no)));
                    $this->PreqDevice->deleteAll(array('PreqDevice.prequistionno'=>'','PreqDevice.status'=>0));
                    if(!empty($device_node))
                    {  
                        $this->PreqDevice->updateAll(array('PreqDevice.customer_id'=>'"'.$customer_id.'"','PreqDevice.prequistion_id'=>$purchaserequisitions_id,'PreqDevice.status'=>1),array('PreqDevice.prequistionno'=>$requistion_no,'PreqDevice.status'=>0));
                    }
                    $this->request->data['PreqCustomerSpecialNeed']['prequistion_id']=$purchaserequisitions_id;
                    $this->PreqCustomerSpecialNeed->save($this->request->data['PreqCustomerSpecialNeed']); 
                    /************
                    * Data Log
                    */
                    $this->request->data['Logactivity']['logname'] = 'prequistion_id';
                    $this->request->data['Logactivity']['logactivity'] = 'Add Quotation';
                    $this->request->data['Logactivity']['logid'] = $purchaserequisitions_id;
                    $this->request->data['Logactivity']['user_id'] = $this->Session->read('sess_userid');
                    $this->request->data['Logactivity']['logapprove'] = 1;

                    $a = $this->Logactivity->save($this->request->data['Logactivity']);
                    
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
        if($user_role['job_quotation']['edit'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        /*
         * *****************************************************
         */
            $purchase_requistion_list=$this->PurchaseRequisition->find('first',array('conditions'=>array('PurchaseRequisition.id'=>$id,'PurchaseRequisition.is_deleted'=>'0'),'recursive'=>2));
            //for Contact person info
           
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
            
            //pr($quotation_details);exit;
            $instrument_types=$this->InstrumentType->find('list',array('conditions'=>array('InstrumentType.status'=>1,'is_deleted'=>0),'fields'=>array('id','quotation')));
            $our_ref_no=$purchase_requistion_list['PurchaseRequisition']['track_id'];
            $priority=$this->Priority->find('list',array('fields'=>array('id','priority')));
            $payment=$this->Paymentterm->find('list',array('fields'=>array('id','pay')));
            $country=$this->Country->find('list',array('fields'=>array('id','country')));
            
            $additional=$this->Additionalcharge->find('list',array('fields'=>array('id','additionalcharge')));
            $service=$this->Service->find('list',array('fields'=>array('id','servicetype')));
            $services=$this->Service->find('list',array('fields'=>array('id','servicetype')));
            
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
                    
                    $this->request->data['Logactivity']['logname']   =   'PurchaseRequisition';
                    $this->request->data['Logactivity']['logactivity']   =   'Add PurchaseRequisition';
                    $this->request->data['Logactivity']['logid']   =   $this->request->data['PurchaseRequisition']['prequistionno'];
                    $this->request->data['Logactivity']['loguser'] = $this->Session->read('sess_userid');
                    $this->request->data['Logactivity']['logapprove'] = 1;
                    $a = $this->Logactivity->save($this->request->data['Logactivity']);
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
                    echo "<div class='customer_show' align='left' id='".$data[$i]['Customer']['id']."'>";
                    echo $data[$i]['Customer']['Customertagname'];
                    echo "<br>";
                    echo "</div>";
                }
            }
            else
            {
                    echo "<div class='preno_result' align='left'>";
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
            $this->request->data['PreqDevice']['status']        =   0;
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
            $this->request->data['PreqDevice']['status']        =   0;
            if($this->PreqDevice->save($this->request->data))
            {
               echo "Updated";
                
            }
     
        }
        public function approve()
        {
            $this->autoRender=false;
            $id =  $this->request->data['id'];
            $this->Quotation->updateAll(array('Quotation.is_approved'=>1),array('Quotation.id'=>$id));
            $user_id = $this->Session->read('sess_userid');
            $this->Logactivity->updateAll(array('Logactivity.logapprove'=>2,'Logactivity.approved_by'=>$user_id),array('Logactivity.logid'=>$id,'Logactivity.logactivity'=>'Add Quotation'));
            //pr($log);exit;
            //$details=$this->Quotation->find('first',array('conditions'=>array('Quotation.quotationno'=>$id)));
//            $track_id = $details['Quotation']['track_id'];
//            $customer_id = $details['Quotation']['customer_id'];
//            $quo_id = $details['Quotation']['id'];
//            $d=date("d");
//            $m=date("m");
//            $y=date("Y");
//            $t=time();
//            $dmt='CPO'.($d+$m+$y+$t);
//            $clientpo_id = $dmt;
//            $device_node    =   $this->Device->find('count',array('conditions'=>array('Device.quotation_id'=>$quo_id)));
//            $this->Clientpo->save(array('quotation_no'=>$id,'quotation_id'=> $quo_id,'clientpos_no'=>$clientpo_id,'track_id'=>$track_id,'customer_id'=>$customer_id,'quo_quantity'=>$device_node));
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
        
        
        
}
