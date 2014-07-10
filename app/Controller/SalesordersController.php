<?php
    class SalesordersController extends AppController
    {
        public $helpers = array('Html','Form','Session');
        public $uses =array('Priority','Paymentterm','Quotation','Currency',
                            'Country','Additionalcharge','Service','CustomerInstrument','Customerspecialneed',
                            'Instrument','Brand','Customer','Device','Salesorder','Description','Logactivity');
        public function index()
        {
            //$this->Quotation->recursive = 1; 
            $data = $this->Salesorder->find('all',array('order' => array('Salesorder.id' => 'DESC')));
            //pr($data);exit;
            $this->set('salesorder', $data);
        }
        public function add()
        {
            $str=NULL;
            $d=date("d");
            $m=date("m");
            $y=date("Y");
            $t=time();
            $dmt='BSO'.($d+$m+$y+$t);
            //$str = 'BSQ-13-'.str_pad($str + 1, 5, 0, STR_PAD_LEFT);
            $this->set('salesorderno', $dmt);
            $priority=$this->Priority->find('list',array('fields'=>array('id','priority')));
            $this->set('priority',$priority);
            $payment=$this->Paymentterm->find('list',array('fields'=>array('id','pay')));
            $this->set('payment',$payment);
            $services=$this->Service->find('list',array('fields'=>array('id','servicetype')));
            $this->set('service',$services);
            $this->request->data['Salesorder']['id']=$dmt;
            $this->request->data['Salesorder']['salesorderno']=$dmt;
            
            if($this->request->is('post'))
            {
               
               if(isset($this->request->data['Salesorder']['salesorder_created']) && $this->request->data['Salesorder']['salesorder_created']==1)
               {
                 $quotation_details    =   $this->Quotation->find('first',array('conditions'=>array('Quotation.quotationno'=>$this->request->data['Salesorder']['quotation_id'],'Quotation.is_approved'=>'1'),'recursive'=>'2'));
                 $sales_details =  $quotation_details['Quotation']  ;
                 $sales['Salesorder']   =    $sales_details;
                 $sales['Description']  =    $quotation_details['Device'];
                 $sales['Salesorder']   =    $sales_details;
                 $this->set('sale',$sales);
                 foreach($sales['Description'] as $sale):
                     $this->Description->create();
                     $description_data  =   $this->saleDescription($sale['id']);
                     $this->Description->save($description_data);
                 endforeach;   
                //pr($sales);exit;
                 $this->request->data =   $sales;
               }
               else 
               {
                    $customer_id    =   $this->request->data['Salesorder']['customer_id'];
                    $this->request->data['Quotation']['customername']=$this->request->data['sales_customername'];
                   
                    if($this->Salesorder->save($this->request->data['Salesorder']))
                    {
                        $sales_orderid  =   $this->Salesorder->getLastInsertID();
                        $device_node    =   $this->Description->find('all',array('conditions'=>array('Description.customer_id'=>$customer_id)));
                        if(!empty($device_node))
                        {
                            $this->Description->updateAll(array('Description.salesorder_id'=>'"'.$sales_orderid.'"','Description.status'=>'1'),array('Description.customer_id'=>$customer_id));
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
                        $this->Session->setFlash(__('Salesorder has been Added Successfully '));
                        $this->redirect(array('action'=>'index'));
                    }
               }
            }
           
        }
        public function edit($id=NULL)
        {
            $priority=$this->Priority->find('list',array('fields'=>array('id','priority')));
            $this->set('priority',$priority);
            $payment=$this->Paymentterm->find('list',array('fields'=>array('id','pay')));
            $this->set('payment',$payment);
            $services=$this->Service->find('list',array('fields'=>array('id','servicetype')));
            $this->set('service',$services);
            $salesorder_details=$this->Salesorder->find('first',array('conditions'=>array('Salesorder.id'=>$id),'recursive'=>'2'));
            $this->set('salesorder',$salesorder_details);
            //pr($salesorder_details);exit;
            if($this->request->is(array('post','put')))
            {
                $customer_id    =   $this->request->data['Salesorder']['customer_id'];
                $this->Salesorder->id=$id;
                if($this->Salesorder->save($this->request->data['Salesorder']))
                {
                    $device_node    =   $this->Description->find('all',array('conditions'=>array('Description.customer_id'=>$customer_id)));
                    if(!empty($device_node))
                    {
                        $this->Description->updateAll(array('Description.salesorder_id'=>'"'.$id.'"','Description.status'=>'1'),array('Description.customer_id'=>$customer_id));
                    }
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
            pr($id);exit;
            if($id!='')
            {
                if($this->Salesorder->delete($id,true))
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
            if($this->Description->deleteAll(array('Description.id'=>$device_id)))
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
            $this->loadModel('Quotation');
            $name =  $this->request->data['id'];
            $this->autoRender = false;
            $data = $this->Quotation->find('all',array('conditions'=>array('Quotation.quotationno LIKE'=>'%'.$name.'%','Quotation.is_approved'=>'1')));
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
      
}
