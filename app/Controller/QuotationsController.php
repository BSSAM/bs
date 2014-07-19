<?php
    App::import('Vendor', 'UploadHandler');
    class QuotationsController extends AppController
    {
        public $helpers = array('Html','Form','Session');
        public $uses =array('Priority','Paymentterm','Quotation','Currency',
                            'Country','Additionalcharge','Service','CustomerInstrument','Customerspecialneed',
                            'Instrument','Brand','Customer','Device','Unit','Logactivity','InstrumentType',
                            'Contactpersoninfo','CusSalesperson','Clientpo');
        public function index()
        {
            //$this->Quotation->recursive = 1; 
            $data = $this->Quotation->find('all',array('conditions'=>array('Quotation.is_deleted'=>'0'),'order' => array('Quotation.id' => 'DESC')));
            $this->set('quotation', $data);
        }
        public function add()
        {
            $dmt=$this->random('quotation');
            $track_id=$this->random('track');
            $this->set('quotationno', $dmt);
            $this->set('our_ref_no', $track_id);
            
            $priority=$this->Priority->find('list',array('fields'=>array('id','priority')));
            $payment=$this->Paymentterm->find('list',array('fields'=>array('id','pay')));
            $country=$this->Country->find('list',array('fields'=>array('id','country')));
            $instrument_types=$this->InstrumentType->find('list',array('conditions'=>array('type_for'=>'Quotation'),'fields'=>array('id','type_name')));
            $additional=$this->Additionalcharge->find('list',array('fields'=>array('id','additionalcharge')));
            $service=$this->Service->find('list',array('fields'=>array('id','servicetype')));
            
            $this->set(compact('service','additional','instrument_types','country','priority','payment'));
           
            if($this->request->is('post'))
            {
                $date = date('m/d/Y h:i:s a', time());
                $this->request->data['Quotation']['created_by'] = $date;

                $customer_id=$this->request->data['Quotation']['customer_id'];
                $this->request->data['Quotation']['customername']=$this->request->data['customername'];
               
                if($this->Quotation->save($this->request->data['Quotation']))
                {
                    
                    $quotation_id   =   $this->Quotation->getLastInsertID();
                    $device_node    =   $this->Device->find('all',array('conditions'=>array('Device.customer_id'=>$customer_id)));
                    $this->Device->deleteAll(array('Device.quotation_id'=>'','Device.status'=>0));
                    if(!empty($device_node))
                    {  
                        $this->Device->updateAll(array('Device.quotation_id'=>$quotation_id,'Device.status'=>1,'Device.quotationno'=>'"'.$this->request->data['Quotation']['quotationno'].'"'),array('Device.customer_id'=>$customer_id));
                    }
                    $this->request->data['Customerspecialneed']['quotation_id']=$quotation_id;
                    $this->Customerspecialneed->save($this->request->data['Customerspecialneed']); 
                    /******************
                    * Data Log
                    */
                    $this->request->data['Logactivity']['logname'] = 'Quotation';
                    $this->request->data['Logactivity']['logactivity'] = 'Add Quotation';
                    $this->request->data['Logactivity']['logid'] = $quotation_id;
                    $this->request->data['Logactivity']['user_id'] = $this->Session->read('sess_userid');
                    $this->request->data['Logactivity']['logapprove'] = 1;

                    $a = $this->Logactivity->save($this->request->data['Logactivity']);
                    
                    /******************/

                    $this->Session->setFlash(__('Quotation has been Added Succefully '));
                    $this->redirect(array('action'=>'index'));
                }
               
            }
        }
       
        public function edit($id=NULL)
        {
            $quotations_list=$this->Quotation->find('first',array('conditions'=>array('Quotation.id'=>$id,'Quotation.is_deleted'=>'0'),'recursive'=>2));
            //for Contact person info
           
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
            $instrument_types=$this->InstrumentType->find('list',array('conditions'=>array('type_for'=>'Quotation'),'fields'=>array('id','type_name')));
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
                $this->Quotation->id=$id;
                if($this->Quotation->save($this->request->data['Quotation']))
                {
                    $customer_id=$quotations_list['Quotation']['customer_id'];
                    $device_node    =   $this->Device->find('all',array('conditions'=>array('Device.customer_id'=>$customer_id)));
                    if(!empty($device_node))
                    {
                        $this->Device->updateAll(array('Device.quotation_id'=>$id,'Device.status'=>1),array('Device.customer_id'=>$customer_id));
                    }
                    $this->Customerspecialneed->id=$this->request->data['Customerspecialneed']['id'];
                    $this->Customerspecialneed->save($this->request->data['Customerspecialneed']);  
                    
                     $this->request->data['Logactivity']['logname']   =   'Quotation';
                     $this->request->data['Logactivity']['logactivity']   =   'Add Quotation';
                     $this->request->data['Logactivity']['logid']   =   $quotations_list['Quotation']['quotationno'];
                     $this->request->data['Logactivity']['loguser'] = $this->Session->read('sess_userid');
                     $this->request->data['Logactivity']['logapprove'] = 1;
                     $a = $this->Logactivity->save($this->request->data['Logactivity']);
                    $this->Session->setFlash(__('Quotation has been Updated Successfully '));
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
            if($id!='')
            {
                if($this->Quotation->updateAll(array('Quotation.is_deleted'=>1),array('Quotation.id'=>$id)))
                {
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
            $data = $this->Customer->find('all',array('conditions'=>array('Customertagname LIKE'=>'%'.$name.'%','is_deleted'=>0,'Customer.status'=>1)));
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
                for($i = 0; $i<$c;$i++)
                { 
                    echo "<div class='instrument_id' align='left' id='".$instrument_details[$i]['Instrument']['id']."'>";
                    echo $name=($instrument_details[$i]['Instrument']['name']!='')?$instrument_details[$i]['Instrument']['name']:'No Results Found';
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
           
        }
        public function add_instrument()
        {
            $this->autoRender = false;
            $this->loadModel('Device');
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
            $this->Quotation->updateAll(array('Quotation.is_approved'=>1),array('Quotation.quotationno'=>$id));
            $user_id = $this->Session->read('sess_userid');
            $this->Logactivity->updateAll(array('Logactivity.logapprove'=>2,'Logactivity.approved_by'=>$user_id),array('Logactivity.logid'=>$id,'Logactivity.logactivity'=>'Add Quotation'));
            $details=$this->Quotation->find('first',array('conditions'=>array('Quotation.quotationno'=>$id)));
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
}
