<?php
    class QuotationsController extends AppController
    {
        public $helpers = array('Html','Form','Session');
        public $uses =array('Priority','Paymentterm','Quotation','Currency',
                            'Country','Additionalcharge','Service','CustomerInstrument','Customerspecialneed',
                            'Instrument','Brand','Customer','Device');
        public function index()
        {
            //$this->Quotation->recursive = 1; 
            $data = $this->Quotation->find('all',array('order' => array('Quotation.id' => 'DESC')));
            $this->set('quotation', $data);
        }
        public function add()
        {
//          $customer_data = $this->Customer->find('first',array('conditions'=>array('Customer.id'=>1399899781),'recursive'=>'2'));
//          pr($customer_data);exit;
            $str=NULL;
            $d=date("d");
            $m=date("m");
            $y=date("Y");
            $t=time();
            $dmt='BSQ'.($d+$m+$y+$t);
            //$str = 'BSQ-13-'.str_pad($str + 1, 5, 0, STR_PAD_LEFT);
            $this->set('quotationno', $dmt);
            $priority=$this->Priority->find('list',array('fields'=>array('id','priority')));
            $this->set('priority',$priority);
            $payment=$this->Paymentterm->find('list',array('fields'=>array('id','pay')));
            $this->set('payment',$payment);
            $country=$this->Country->find('list',array('fields'=>array('id','country')));
            $this->set('country',$country);
            
            $additional_charge=$this->Additionalcharge->find('list',array('fields'=>array('id','additionalcharge')));
            $this->set('additional',$additional_charge);
            
            $services=$this->Service->find('list',array('fields'=>array('id','servicetype')));
            $this->set('service',$services);
            
            $this->request->data['Quotation']['quotationno']=$dmt;
           
            if($this->request->is('post'))
            {
             
                $customer_id=$this->request->data['Quotation']['customer_id'];
                $this->request->data['Quotation']['customername']=$this->request->data['customername'];
                if($this->Quotation->save($this->request->data['Quotation']))
                {
                    $quotation_id   =   $this->Quotation->getLastInsertID();
                    $device_node    =   $this->Device->find('all',array('conditions'=>array('Device.customer_id'=>$customer_id)));
                    if(!empty($device_node))
                    {
                        $this->Device->updateAll(array('Device.quotation_id'=>$quotation_id,'Device.status'=>1),array('Device.customer_id'=>$customer_id));
                    }
                    $this->request->data['Customerspecialneed']['quotation_id']=$quotation_id;
                    $this->Customerspecialneed->save($this->request->data['Customerspecialneed']);                    
                    $this->Session->setFlash(__('Quotation has been Added Succefully '));
                    $this->redirect(array('action'=>'index'));
                }
               
            }
        }
        public function edit($id=NULL)
        {
            $quotation_details=$this->Quotation->find('first',array('conditions'=>array('Quotation.id'=>$id),'recursive'=>2));
            //pr($quotation_details);exit;
            $priority=$this->Priority->find('list',array('fields'=>array('id','priority')));
            $this->set('priority',$priority);
            $payment=$this->Paymentterm->find('list',array('fields'=>array('id','pay')));
            $this->set('payment',$payment);
            $country=$this->Country->find('list',array('fields'=>array('id','country')));
            $this->set('country',$country);
            
            $additional_charge=$this->Additionalcharge->find('list',array('fields'=>array('id','additionalcharge')));
            $this->set('additional',$additional_charge);
            
            $services=$this->Service->find('list',array('fields'=>array('id','servicetype')));
            $this->set('service',$services);
            $services=$this->Service->find('list',array('fields'=>array('id','servicetype')));
            
            $this->set('quotations_list',$quotation_details);
           
            if($this->request->is(array('post','put')))
            {
                $this->Quotation->id=$id;
                if($this->Quotation->save($this->request->data['Quotation']))
                {
                    $customer_id=$quotation_details['Quotation']['customer_id'];
                    $device_node    =   $this->Device->find('all',array('conditions'=>array('Device.customer_id'=>$customer_id)));
                    if(!empty($device_node))
                    {
                        $this->Device->updateAll(array('Device.quotation_id'=>$id,'Device.status'=>1),array('Device.customer_id'=>$customer_id));
                    }
                    $this->Customerspecialneed->id=$this->request->data['Customerspecialneed']['id'];
                    $this->Customerspecialneed->save($this->request->data['Customerspecialneed']);                    
                    $this->Session->setFlash(__('Quotation has been Added Succefully '));
                    $this->redirect(array('action'=>'index'));
                }
                
            }
            else
            {
                $this->request->data=$quotation_details;
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
            $instrument_details=$this->CustomerInstrument->find('all',array('conditions'=>array('CustomerInstrument.customer_id'=>$customer_id)));
            foreach($instrument_details as $instrument)
            {
                echo "<div class='instrument_id' align='left' id='".$instrument['Instrument']['id']."'>";
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
            $brand_details=$this->CustomerInstrument->find('first',array('conditions'=>array('CustomerInstrument.instrument_id'=>$instrument_id),'recursive'=>'2'));
            if(!empty($brand_details))
            {
                echo json_encode($brand_details);
            }
            //pr($brand_list);,lp,
     
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
            $this->request->data['Device']['department']    =   $this->request->data['instrument_department'];
            $this->request->data['Device']['unit_price']    =   $this->request->data['instrument_unitprice'];
            $this->request->data['Device']['account_service']=  $this->request->data['instrument_account'];
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
            $this->loadModel('Device');
            if($this->Device->deleteAll(array('Device.id'=>$device_id)))
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
            $this->loadModel('Device');
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
            $this->request->data['Device']['title']         =   $this->request->data['instrument_title'];
            $this->request->data['Device']['status']        =   0;
            if($this->Device->save($this->request->data))
            {
               echo "Updated";
                
            }
     
        }
}
