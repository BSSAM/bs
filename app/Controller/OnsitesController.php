<?php
    class OnsitesController extends AppController
    {
        public $helpers = array('Html','Form','Session');
        public $uses =array('Priority','Paymentterm','Quotation','Currency','OnsiteDocument','User','OnsiteEngineer','OnsiteInstrument','Onsite',
                            'Country','Additionalcharge','Service','CustomerInstrument','Customerspecialneed',
                            'Instrument','Brand','Customer','Device','Unit','Logactivity','InstrumentType',
                            'Contactpersoninfo','CusSalesperson','Clientpo','branch','Datalog');
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
            $quotation_lists = $this->Quotation->find('all',array('conditions'=>array('Quotation.is_deleted'=>'0'),'order' => array('Quotation.id' => 'DESC')));
            $this->set('quotation', $quotation_lists);
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
            $onsite_no=$this->random('onsites');
            $track_id=$this->random('track');
            $user_list  =   $this->User->find('list',array('conditions'=>array('User.status'=>'1','User.is_deleted'=>0),'fields'=>array('emailid','full_name')));
            
            $this->set(compact('onsite_no','track_id','user_list'));
            $priority=$this->Priority->find('list',array('fields'=>array('id','priority')));
            $payment=$this->Paymentterm->find('list',array('fields'=>array('id','pay')));
            $country=$this->Country->find('list',array('fields'=>array('id','country')));
            $instrument_types=$this->InstrumentType->find('list',array('conditions'=>array('InstrumentType.status'=>1,'is_deleted'=>0),'fields'=>array('id','quotation')));
            
            $additional=$this->Additionalcharge->find('list',array('fields'=>array('id','additionalcharge')));
            $service=$this->Service->find('list',array('fields'=>array('id','servicetype')));
            
            $branch =   $this->branch->find('first',array('conditions'=>array('branch.defaultbranch'=>1,'branch.status'=>1)));
            $this->set(compact('service','additional','instrument_types','country','priority','payment'));
           
            if($this->request->is('post'))
            {
                
                $date = date('m/d/Y h:i:s a', time());
                $this->request->data['Quotation']['created_by'] = $date;
                $customer_id=$this->request->data['Onsite']['customer_id'];
                $this->request->data['Onsite']['customername']=$this->request->data['customername'];
                $this->request->data['Onsite']['branch_id']=$branch['branch']['id'];
                $quotationno    =   $this->request->data['Onsite']['quotationno'];
                if($this->Onsite->save($this->request->data['Onsite']))
                {
                    $onsite_id   =   $this->Onsite->getLastInsertID();
                    
                    $device_node    =   $this->OnsiteInstrument->find('all',array('conditions'=>array('OnsiteInstrument.quotationno'=>$quotationno)));
                    if(!empty($device_node))
                    {  
                        $this->OnsiteInstrument->updateAll(array('OnsiteInstrument.onsite_id'=>$onsite_id,'OnsiteInstrument.status'=>1),array('OnsiteInstrument.quotationno'=>$quotationno,'OnsiteInstrument.status'=>0));
                    }
                    $this->OnsiteDocument->updateAll(array('OnsiteDocument.onsite_id'=>$onsite_id,'OnsiteDocument.customer_id'=>'"'.$this->request->data['Onsite']['customer_id'].'"'),array('OnsiteDocument.quotationno'=>$quotationno,'OnsiteDocument.status'=>1));
                   
                    $onsiteschdule_no=$this->request->data['Onsite']['onsiteschedule_no'];
                    $this->OnsiteEngineer->updateAll(array('OnsiteEngineer.onsite_id'=>$onsite_id),array('OnsiteEngineer.onsiteschedule_no'=>$onsiteschdule_no));
                   
                    /******************
                    * Data Log
                    */
                    $this->request->data['Logactivity']['logname'] = 'Quotation';
                    $this->request->data['Logactivity']['logactivity'] = 'Add Quotation';
                    $this->request->data['Logactivity']['logid'] = $quotation_id;
                    $this->request->data['Logactivity']['logno'] = $quotationno;
                    $this->request->data['Logactivity']['user_id'] = $this->Session->read('sess_userid');
                    $this->request->data['Logactivity']['logapprove'] = 1;

                    $a = $this->Logactivity->save($this->request->data['Logactivity']);
                    
                    /******************/
                    
                    /******************
                    * Data Log Activity
                    */
                    $this->request->data['Datalog']['logname'] = 'Quotation';
                    $this->request->data['Datalog']['logactivity'] = 'Add';
                    $this->request->data['Datalog']['logid'] = $quotationno;
                    $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                    
                    $a = $this->Datalog->save($this->request->data['Datalog']);
                    
                    /******************/ 

                    $this->Session->setFlash(__('Quotation has been added Successfully'));
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
            $quotations_list=$this->Onsite->find('first',array('conditions'=>array('Quotation.id'=>$id,'Quotation.is_deleted'=>'0'),'recursive'=>2));
            //for Contact person info
            //pr($quotations_list);exit;
            $customer_id    =   $quotations_list['Customer']['id'];
            $salesperson_list    =   $this->CusSalesperson->find('all',array('conditions'=>array('CusSalesperson.customer_id'=>$customer_id)));
            $salespeople         =   '';
            if(!empty($quotations_list['Clientpo']))
            {
                $po_list        =   '';
                foreach($quotations_list['Clientpo'] as $po)
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
            if(empty($quotation_details)){
                $quotation_details=$this->Quotation->find('first',array('conditions'=>array('Quotation.quotationno'=>$id),'recursive'=>2));
            }
            //pr($quotation_details);exit;
            $instrument_types=$this->InstrumentType->find('list',array('conditions'=>array('InstrumentType.status'=>1,'is_deleted'=>0),'fields'=>array('id','quotation')));
            $our_ref_no=$quotations_list['Quotation']['track_id'];
            $priority=$this->Priority->find('list',array('fields'=>array('id','priority')));
            $payment=$this->Paymentterm->find('list',array('fields'=>array('id','pay')));
            $country=$this->Country->find('list',array('fields'=>array('id','country')));
            
            $additional=$this->Additionalcharge->find('list',array('fields'=>array('id','additionalcharge')));
            $service=$this->Service->find('list',array('fields'=>array('id','servicetype')));
            $services=$this->Service->find('list',array('fields'=>array('id','servicetype')));
            
            $this->set(compact('instrument_types','person_list','our_ref_no','country','priority','payment','quotations_list','additional','service','quotations_list','salespeople'));
            if($this->request->is(array('post','put')))
            {
                //to update quotation po generate type
                if($quotations_list['Quotation']['ref_no']!=$this->request->data['Quotation']['ref_no'])
                {
                    $this->request->data['Quotation']['po_generate_type']='Manual';
                }
                $this->Quotation->id=$id;
                $quotationno = $quotations_list['Quotation']['quotationno'];
                if($this->Quotation->save($this->request->data['Quotation']))
                {
                    $customer_id=$quotations_list['Quotation']['customer_id'];
//                    $this->Device->deleteAll(array('Device.quotation_id'=>'','Device.status'=>0));
//                    if(!empty($device_node))
//                    {
//                        $this->Device->updateAll(array('Device.quotation_id'=>$id,'Device.status'=>1,'Device.quotationno'=>'"'.$this->request->data['Quotation']['quotationno'].'"'),array('Device.customer_id'=>$customer_id,'Device.quotationno'=>$this->request->data['Quotation']['quotationno'],'Device.status'=>0));
//                    }
                    $this->Customerspecialneed->id=$this->request->data['Customerspecialneed']['id'];
                    $this->Customerspecialneed->save($this->request->data['Customerspecialneed']);  
                    
                    /******************
                    * Data Log Activity
                    */
                    $this->request->data['Datalog']['logname'] = 'Quotation';
                    $this->request->data['Datalog']['logactivity'] = 'Add';
                    $this->request->data['Datalog']['logid'] = $quotationno;
                    $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                    
                    $a = $this->Datalog->save($this->request->data['Datalog']);
                    
                    /******************/ 
                    $this->Session->setFlash(__('Quotation has been Updated Successfully'));
                    $this->redirect(array('action'=>'index'));
                }
                
            }
            else
            {
                $this->request->data=$quotations_list;
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
                if($this->Quotation->updateAll(array('Quotation.is_deleted'=>1),array('Quotation.id'=>$id)))
                {
                    $quotation_details=$this->Quotation->find('first',array('conditions'=>array('Quotation.id'=>$id),'recursive'=>2));
                    $quotationno = $quotation_details['Quotation']['quotationno'];
                    /******************
                    * Data Log Activity
                    */
                    $this->request->data['Datalog']['logname'] = 'Quotation';
                    $this->request->data['Datalog']['logactivity'] = 'Add';
                    $this->request->data['Datalog']['logid'] = $quotationno;
                    $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                    
                    $a = $this->Datalog->save($this->request->data['Datalog']);
                    
                    /******************/ 
                    $this->Session->setFlash(__('The Quotation has been deleted',h($id)));
                    return $this->redirect(array('controller'=>'Quotations','action'=>'index'));
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
            $data = $this->Customer->find('all',array('conditions'=>array('Customertagname LIKE'=>'%'.$name.'%','Customer.is_deleted'=>0,'Customer.is_approved'=>1,'Customer.status'=>1)));
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
                    echo "<div class='no_result' align='left'>";
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
            $customer_data = $this->Customer->find('first',array('conditions'=>array('Customer.id'=>$customer_id,'Customer.is_deleted'=>0,'Customer.is_approved'=>1),'recursive'=>'2'));
           
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
            if(!$instrument_details)
            {
                echo 'No Results Found';
            }else{
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
            $this->loadModel('Device');
            $this->request->data['Device']['quotationno']   =   $this->request->data['quotationno'];
            $this->request->data['Device']['customer_id']   =   $this->request->data['customer_id'];
            $this->request->data['Device']['instrument_id'] =   $this->request->data['instrument_id'];
            $this->request->data['Device']['brand_id']      =   $this->request->data['instrument_brand'];
            $this->request->data['Device']['quantity']      =   $this->request->data['instrument_quantity'];
            $this->request->data['Device']['model_no']      =   $this->request->data['instrument_modelno'];
            $this->request->data['Device']['range']         =   $this->request->data['instrument_range'];
            $this->request->data['Device']['call_location'] =   $this->request->data['instrument_calllocation'];
            $this->request->data['Device']['call_type']     =   $this->request->data['instrument_calltype'];
            $this->request->data['Device']['validity']      =   $this->request->data['instrument_validity'];
            $this->request->data['Device']['discount']      =   $this->request->data['instrument_discount'];
            $this->request->data['Device']['department_id'] =   $this->request->data['instrument_department'];
            $this->request->data['Device']['unit_price']    =   $this->request->data['instrument_unitprice'];
            $this->request->data['Device']['account_service']=  $this->request->data['instrument_account'];
            $this->request->data['Device']['total']         =   $this->request->data['instrument_total'];
            $this->request->data['Device']['title']         =   $this->request->data['instrument_title'];
            $this->request->data['Device']['status']        =   0;
            if($this->Device->save($this->request->data))
            {
                $device_id=$this->Device->getLastInsertID();
                echo $device_id;
            }
     
        }
        public function delete_instrument()
        {
            $this->autoRender=false;
            $device_id= $this->request->data['device_id'];
            if($this->Device->updateAll(array('Device.is_deleted'=>1),array('Device.id'=>$device_id)))
            {
                echo "deleted";
            }
        }
        public function edit_instrument()
        {
            $this->autoRender=false;
            $device_id= $this->request->data['edit_device_id'];
            $this->loadModel('Device');
            $edit_device_details    =   $this->Device->find('first',array('conditions'=>array('Device.id'=>$device_id)));
            if(!empty($edit_device_details ))
            {
                echo json_encode($edit_device_details);
            }
        }
        public function update_instrument()
        {
            $this->autoRender = false;
            $this->Device->id                               =   $this->request->data['device_id'];
            $this->request->data['Device']['customer_id']   =   $this->request->data['customer_id'];
            $this->request->data['Device']['instrument_id'] =   $this->request->data['instrument_id'];
            $this->request->data['Device']['brand_id']      =   $this->request->data['instrument_brand'];
            $this->request->data['Device']['quantity']      =   $this->request->data['instrument_quantity'];
            $this->request->data['Device']['model_no']      =   $this->request->data['instrument_modelno'];
            $this->request->data['Device']['range']         =   $this->request->data['instrument_range'];
            $this->request->data['Device']['call_location'] =   $this->request->data['instrument_calllocation'];
            $this->request->data['Device']['call_type']     =   $this->request->data['instrument_calltype'];
            $this->request->data['Device']['validity']      =   $this->request->data['instrument_validity'];
            $this->request->data['Device']['discount']      =   $this->request->data['instrument_discount'];
            $this->request->data['Device']['department']    =   $this->request->data['instrument_department'];
            $this->request->data['Device']['unit_price']    =   $this->request->data['instrument_unitprice'];
            $this->request->data['Device']['account_service']=  $this->request->data['instrument_account'];
             $this->request->data['Device']['total']         =   $this->request->data['instrument_total'];
            $this->request->data['Device']['title']         =   $this->request->data['instrument_title'];
            $this->request->data['Device']['status']        =   1;
            if($this->Device->save($this->request->data))
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
                $onsite_no  =   $_POST['onsiteschedule_no'] ;  
                $onsite_files   =   $_FILES['file'];
                $document_array    = array();
                if(!empty($onsite_files))
                {
                    if(!is_dir(APP.'webroot'.DS.'files'.DS.'Onsites'.DS.$onsite_no)):
                            mkdir(APP.'webroot'.DS.'files'.DS.'Onsites'.DS.$onsite_no);
                    endif;
                    $document_name  =   time().'_'.$onsite_files['name'];
                    $type = $onsite_files['type'];
                    $size = $onsite_files['size'];
                    $tmpPath = $onsite_files['tmp_name'];
                    $originalPath = APP.'webroot'.DS.'files'.DS.'Onsites'.DS.$onsite_no.DS.$document_name;
                    if(move_uploaded_file($tmpPath,$originalPath))
                    {
                        $document_array['OnsiteDocument']['document_name']= $document_name;
                        $document_array['OnsiteDocument']['onsiteschedule_no']= $onsite_no;
                        $document_array['OnsiteDocument']['document_size']= $size;
                        $document_array['OnsiteDocument']['upload_type']= 'Individual';
                        $document_array['OnsiteDocument']['document_type']= $onsite_files['type'];
                        $this->OnsiteDocument->create();
                        $this->OnsiteDocument->save($document_array);
                    }
                }
              }
        }
        public function delete_document($id=NULL)
        {
            $this->autoRender   =   false;
            $document_id    =   $this->request->data['document_id'];
            $files = scandir(APP.'webroot'.DS.'files'.DS.'Onsites'.DS.$id); 
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
                 $this->OnsiteDocument->updateAll(array('OnsiteDocument.status'=>0),array('OnsiteDocument.onsiteschedule_no'=>$id,'OnsiteDocument.document_name LIKE'=>'%'.$document_id.'%'));
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
        public function quotation_search()
        {
            $this->autoRender = false;
            $this->loadModel('Quotation');
            $name =  $this->request->data['id'];
            //$device_status =  $this->request->data['device_status'];
            if($name!='')
            {
                $data = $this->Device->find('all',array('conditions'=>array('Device.call_location'=>'Onsite','Device.is_deleted'=>0),'group' => array('Device.quotationno')));
                $c = count($data);
                if($c!=0)
                {
                     for($i = 0; $i<$c;$i++)
                     { 
                         echo "<div class='onsite_qo_single' align='left' id='".$data[$i]['Device']['quotation_id']."'>";
                         echo $data[$i]['Device']['quotationno'];
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
        
        //for add Engineers
        public function add_engineers()
        {
            $this->autoRender = false;
            $length =   $this->OnsiteEngineer->find('all',array('conditions'=>array('OnsiteEngineer.onsiteschedule_no'=>$this->request->data['onsiteschedule_no'],'OnsiteEngineer.engineer_email_id'=>$this->request->data['engineer_email'])));
            if(count($length)==0):
                $name =  $this->request->data['engineer_name'];
                $email =  $this->request->data['engineer_email'];
                $this->request->data['OnsiteEngineer']['onsiteschedule_no']=$this->request->data['onsiteschedule_no'];
                $this->request->data['OnsiteEngineer']['engineer_name']=$this->request->data['engineer_name'];
                $this->request->data['OnsiteEngineer']['engineer_email_id']=$this->request->data['engineer_email'];
                if($this->OnsiteEngineer->save($this->request->data['OnsiteEngineer']))
                {
                   return $this->OnsiteEngineer->getLastInsertID();

                }
            endif;
            
            
        }
         public function delete_engineer()
        {
            $this->autoRender=false;
            $engineer_id= $this->request->data['engineer_id'];
            if($this->OnsiteEngineer->deleteAll(array('OnsiteEngineer.id'=>$engineer_id)))
            {
                return 1;
            }
        }
       public function get_qo_details()
        {
            
            $this->loadModel('Quotation');
            $qo_id =  $this->request->data['qo_id'];
            $this->autoRender = false;
            $qo_data = $this->Quotation->find('first',array('conditions'=>array('quotationno'=>$qo_id,'Quotation.is_approved'=>'1','Quotation.is_deleted'=>0),'recursive'=>'2'));
            unset($qo_data['Device']);
            $qo_device['Device']   =   $this->Device->find('all',array('conditions'=>array('Device.quotationno'=>$qo_id,'Device.is_deleted'=>0,'Device.call_location'=>'Onsite'),'recursive'=>'1'));
            // for Onsite instruments add
            $this->add_onsite_instruments($qo_device['Device']);
            $onsite_device['OnsiteInstrument']  =   $this->OnsiteInstrument->find('all',array('conditions'=>array('OnsiteInstrument.quotationno'=>$qo_id,'OnsiteInstrument.is_deleted'=>0,'OnsiteInstrument.onsite_calllocation'=>'Onsite'),'recursive'=>'1'));
           
            $contact_list   =   $this->Contactpersoninfo->find('first',array('conditions'=>array('Contactpersoninfo.customer_id'=>$qo_data['Customer']['id'],'Contactpersoninfo.status'=>1),'fields'=>array('id','name')));
            //$this->set(compact('contact_list'));
            
            $qo_data_merge= array_merge($qo_data, $contact_list);
            $total_qo   =   array_merge($qo_data_merge, $onsite_device);
            
            if(!empty($total_qo))
            {
               
                echo json_encode($total_qo);
                //echo json_encode($contact_list);
            }
            else
            {
                echo "failure";
            }
            
        }             

        
}
