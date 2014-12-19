<?php
    class QuotationsController extends AppController
    {
        public $helpers = array('Html','Form','Session','xls','Number');
        public $uses =array('Priority','Paymentterm','Quotation','Currency','Document',
                            'Country','Additionalcharge','Service','CustomerInstrument','Customerspecialneed',
                            'Instrument','Brand','Customer','Device','Unit','Logactivity','InstrumentType',
                            'Contactpersoninfo','CusSalesperson','Clientpo','branch','Datalog','Title','Random','InsPercent');
        public function index($id=NULL)
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
        if(empty($id)):
            $this->set('deleted_val',$id=0);
        endif;
        
        $this->set('userrole_cus',$user_role['job_quotation']);
        
        // Delete Device when Status '0'
        
        $this->Device->deleteAll(array('Device.status'=>0));
        
        //
        /*
         * *****************************************************
         */
            //$this->Quotation->recursive = 1; 
        if($id == '3'):
        $quotation_lists = $this->Quotation->find('all',array('conditions'=>array('Quotation.is_deleted'=>'1'),'order' => array('Quotation.created' => 'ASC')));
        $this->set('deleted_val',$id);
        elseif($id == '2'):
        $quotation_lists = $this->Quotation->find('all',array('conditions'=>array('Quotation.is_deleted'=>'0','Quotation.is_approved'=>0),'order' => array('Quotation.created' => 'ASC')));
        $this->set('deleted_val',$id);
        elseif($id == '1'):
        $quotation_lists = $this->Quotation->find('all',array('conditions'=>array('Quotation.is_deleted'=>'0','Quotation.is_approved'=>1),'order' => array('Quotation.created' => 'ASC')));    
        $this->set('deleted_val',$id);
        else:
        $quotation_lists = $this->Quotation->find('all',array('conditions'=>array('Quotation.is_deleted'=>'0'),'order' => array('Quotation.created' => 'ASC')));    
        $this->set('deleted_val',$id);
        endif;
            
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
        
        
        $this->set(compact('ins_cost_user','ins_cost_super','ins_cost_man'));
        $percents =  $this->InsPercent->findById(1);
        
        if($user_role['instr_costing']['edit'] == 1)
        {
            $this->set('ins_cost_user',$percents['InsPercent']['user']);
        }
        elseif($user_role['instr_costing']['view'] == 1)
        {
            $this->set('ins_cost_user',$percents['InsPercent']['supervisor']);
        }
        elseif($user_role['instr_costing']['delete'] == 1)
        {
            $this->set('ins_cost_user',$percents['InsPercent']['manager']);
        }
        else 
        {
            $this->set('ins_cost_user',0);
        }
        
        if($user_role['job_quotation']['add'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        $this->Device->deleteAll(array('Device.quotation_id'=>'','Device.status'=>0));
        /*
         * *****************************************************
         */
            $dmt=$this->random('quotation');
            $track_id=$this->random('track');
            $this->set('quotationno', $dmt);
            $this->set('our_ref_no', $track_id);
            
            // Session Device Id Order Clear
            $this->device_id_session_logout($dmt);
            
            
            $priority=$this->Priority->find('list',array('fields'=>array('id','priority')));
            $payment=$this->Paymentterm->find('list',array('fields'=>array('id','pay')));
            $country=$this->Country->find('list',array('fields'=>array('id','country')));
            $instrument_types=$this->InstrumentType->find('list',array('conditions'=>array('InstrumentType.status'=>1,'is_deleted'=>0),'fields'=>array('id','quotation')));
            
            $additional=$this->Additionalcharge->find('list',array('fields'=>array('id','additionalcharge')));
            $service=$this->Service->find('list',array('fields'=>array('id','servicetype')));
            
            $branch =   $this->branch->find('first',array('conditions'=>array('branch.defaultbranch'=>1,'branch.status'=>1)));
            $this->set(compact('service','additional','instrument_types','country','priority','payment'));
            $title =   $this->Title->find('all');
            foreach($title as $title_name)
            {
                $titles[] = $title_name['Title']['title_name'];
            }
            $this->set('titles',$titles);
            if($this->request->is('post'))
            {
                $date = date('m/d/Y h:i:s a', time());
                $this->request->data['Quotation']['created_by'] = $date;
                $customer_id=$this->request->data['Quotation']['customer_id'];
                $this->request->data['Quotation']['customername']=$this->request->data['customername'];
                $this->request->data['Quotation']['branch_id']=$branch['branch']['id'];
//                pr($this->request->data['Quotation']['ref_no']);exit;
//                $this->request->data['Quotation']['po_generate_type']=$this->request->data['ref_no'];
//                pr($this->request->data);
                
                $ref_no_po =   explode(',',$this->request->data['Quotation']['ref_no']);
                foreach($ref_no_po as $k=>$v):
                    $count_po[$k]   =   0;
                endforeach;
                $p_count_string =   implode($count_po,',');
                if ($this->request->data['Quotation']['ref_no'] != '') 
                {
                    $check_string = strchr($this->request->data['Quotation']['ref_no'], 'CPO');
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
                $this->request->data['Quotation']['po_generate_type']=$po_type;
                $this->request->data['Quotation']['ref_count']=$p_count_string;
                if($this->Quotation->save($this->request->data['Quotation']))
                {
                    $quotation_id   =   $this->Quotation->getLastInsertID();
                    
                    $quotationno    =   $this->request->data['Quotation']['quotationno'];
                    
                    // Session Device Id Order Clear
                    $this->device_id_session_logout($quotationno);
                    
                    
                    $this->Random->updateAll(array('Random.quotation'=>'"'.$quotationno.'"'),array('Random.id'=>1));  
                    $device_node    =   $this->Device->find('all',array('conditions'=>array('Device.customer_id'=>$customer_id)));
                    
                    $this->Device->deleteAll(array('Device.quotation_id'=>'','Device.status'=>0));
                    if(!empty($device_node))
                    {  
                        $this->Device->updateAll(array('Device.quotation_id'=>$quotation_id,'Device.status'=>1,'Device.quotationno'=>'"'.$this->request->data['Quotation']['quotationno'].'"'),array('Device.customer_id'=>$customer_id,'Device.quotationno'=>$this->request->data['Quotation']['quotationno'],'Device.status'=>0));
                    }
                    $this->Document->deleteAll(array('Document.quotationno'=>$this->request->data['Quotation']['quotationno'],'Document.status'=>0));
                    if(!empty($device_node))
                    {  
                        $this->Document->updateAll(array('Document.quotation_id'=>$quotation_id,'Document.customer_id'=>'"'.$customer_id.'"'),array('Document.quotationno'=>$this->request->data['Quotation']['quotationno'],'Document.status'=>1));
                    }
                    $this->request->data['Customerspecialneed']['quotation_id']=$quotation_id;
                    $this->Customerspecialneed->save($this->request->data['Customerspecialneed']); 
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
            $quotations_list=$this->Quotation->find('first',array('conditions'=>array('Quotation.id'=>$id,'Quotation.is_deleted'=>'0'),'recursive'=>2));
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
                $quotation_details=$this->Quotation->find('first',array('conditions'=>array('Quotation.id'=>$id),'recursive'=>2));
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
            $title =   $this->Title->find('all');
            foreach($title as $title_name)
            {
                $titles[] = $title_name['Title']['title_name'];
            }
            $this->set('titles',$titles);
            
            // Order Last Device
            $device_last_insert_no = $this->Device->find('first',array('conditions'=>array('Device.quotation_id'=>$id),'order'=>'order_by DESC')); 
            //pr($device_last_insert_no['Device']['order_by']);
            
            
            
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
                    echo "<div class='customer_show instrument_drop_show' align='left' id='".$data[$i]['Customer']['id']."'>";
                    echo $data[$i]['Customer']['Customertagname'];
                    echo "<br>";
                    echo "</div>";
                }
            }
            else
            {
                    echo "<div class='no_result instrument_drop_show' align='left'>";
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
                    echo "<div class='instrument_id instrument_drop_show' align='left' id='".$list['Instrument']['id']."'>";
                    echo $list['Instrument']['name'];
                    echo "<br>";
                    echo "</div>";
                    }
                }
            else:
                echo "<div  align='left' class='instrument_drop_show'>";
                echo 'No Results Found';
                echo "<br>";
                echo "</div>"; 
            endif;
           
           
           
//            foreach($instrument_details as $loop):
//            echo json_encode($loop['Instrument']);
//            endforeach;
           // echo json_encode($instrument_details);
           // exit;
//            $c = count($instrument_details);
//            if(!$instrument_details)
//            {
//                echo 'No Results Found';
//            }
//            else
//            {
//                if($c>0&&$instrument_details[0]['Instrument']['name']!='')
//                {
//                    for($i = 0; $i<$c;$i++)
//                    { 
//                        echo "<div class='instrument_id' align='left' id='".$instrument_details[$i]['Instrument']['id']."'>";
//                        echo $instrument_details[$i]['Instrument']['name'];
//                        echo "<br>";
//                        echo "</div>";
//                    }
//                }
//                else
//                {
//                    echo "<div  align='left'>";
//                    echo 'No Results Found';
//                    echo "<br>";
//                    echo "</div>"; 
//                }
//            }
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
                    echo "<div class='customerins_id' id='".$list['CustomerInstrument']['id']."'>";
                    echo $list['CustomerInstrument']['model_no'];
                    echo "<br>";
                    echo "</div>";
                    }
                }
            else:
                echo "<div  align='left' class='instrument_drop_show'>";
                echo 'No Results Found';
                echo "<br>";
                echo "</div>"; 
            endif;
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
        public function add_instrument()
        {
            $this->autoRender = false;
            $this->loadModel('Device');
            
            $this->request->data = json_decode(file_get_contents("php://input"));
            $data = array();
            //pr($this->request->data);
            //exit;
            //$order = 1;
            $quantity = $this->request->data->instrument_quantity;
            //pr($quantity);exit;
            $instrument_ids = array();
            
            for($i=0;$i<$quantity;$i++)
            {
                $order_by = $this->device_id_session($this->request->data->quotationno);
                $data['quotationno']   =   $this->request->data->quotationno;
                $data['customer_id']   =   $this->request->data->customer_id;
                $data['instrument_id'] =   $this->request->data->instrument_id;
                $data['brand_id']      =   $this->request->data->instrument_brand;
                $data['quantity']      =   $this->request->data->instrument_quantity;
                $data['model_no']      =   $this->request->data->instrument_modelno;
                $data['range']         =   $this->request->data->instrument_range;
                $data['call_location'] =   $this->request->data->instrument_calllocation;
                $data['call_type']     =   $this->request->data->instrument_calltype;
                $data['validity']      =   $this->request->data->instrument_validity;
                $data['discount']      =   $this->request->data->instrument_discount;
                $data['department_id'] =   $this->request->data->instrument_department;
                $data['unit_price']    =   $this->request->data->instrument_unitprice;
                $data['account_service']=  $this->request->data->instrument_account;
                $data['total']         =   $this->request->data->instrument_total;
                $data['title']         =   $this->request->data->instrument_title;
                $data['order_by']      =   $order_by;
                $data['status']        =   0;
                //pr($data);//exit;
                $this->Device->create();
                if($this->Device->save($data))
                {
                    $instrument_ids[]=$this->Device->getLastInsertID();
                    $this->Session->setFlash(__('Instruments has been added Successfully'));
                }   
            }
            //exit;
            header('Content-Type: application/json');
            echo json_encode($instrument_ids);
            //exit;
        }
        public function delete_instrument($device_id)
        {
            $this->autoRender=false;
            //$device_id= $this->request->data['device_id'];
            if($this->Device->updateAll(array('Device.is_deleted'=>1),array('Device.id'=>$device_id)))
            {
                $this->Session->setFlash(__('Instrument has been deleted Successfully'));
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
        public function instrument()
        {
            $this->autoRender=false;
            // = json_decode(file_get_contents("php://input"));
            //pr($this->params['requested']);exit;
            $this->request->data = json_decode(file_get_contents("php://input"));
            $quo_id= $this->request->data->quo_id;
            $this->loadModel('Device');
            $edit_device_details    =   $this->Device->find('all',array('conditions'=>array('Device.quotation_id'=>$quo_id),'order'=>'Device.order_by ASC'));
            foreach($edit_device_details as $edit_device):
                $edit_device_val[]=$edit_device;
            endforeach;
           //pr($edit_device_val);exit;
            if(!empty($edit_device_val ))
            {
                echo json_encode($edit_device_val);
            }
            
        }
        public function update_instrument()
        {
            $this->autoRender = false;
            
            $this->loadModel('Device');
            
            $this->request->data = json_decode(file_get_contents("php://input"));
             $data = array();
            //pr($this->request->data);exit;
            $this->Device->id      =   $this->request->data->device_id;
            $data['customer_id']   =   $this->request->data->customer_id;
            $data['instrument_id'] =   $this->request->data->instrument_id;
            $data['brand_id']      =   $this->request->data->instrument_brand;
            $data['quantity']      =   $this->request->data->instrument_quantity;
            $data['model_no']      =   $this->request->data->instrument_modelno;
            $data['range']         =   $this->request->data->instrument_range;
            $data['call_location'] =   $this->request->data->instrument_calllocation;
            $data['call_type']     =   $this->request->data->instrument_calltype;
            $data['discount']      =   $this->request->data->instrument_discount;
            $data['department']    =   $this->request->data->instrument_department;
            $data['unit_price']    =   $this->request->data->instrument_unitprice;
            $data['account_service']=  $this->request->data->instrument_account;
            $data['total']          =  $this->request->data->instrument_total;
            if($this->Device->save($data))
            {
               $this->Session->setFlash(__('Instrument has been Updated Successfully'));
                
            }
     
        }
        public function approve()
        {
            $this->autoRender=false;
            $id =  $this->request->data['id'];
            $this->Quotation->updateAll(array('Quotation.is_approved'=>1),array('Quotation.id'=>$id));
            //$qo = $this->Quotation->find('first',array('conditions'=>array('Quotation.id'=>$id));
            
            $user_id = $this->Session->read('sess_userid');
            $sales = $this->Logactivity->find('first',array('conditions'=>array('Logactivity.logid'=>$id,'Logactivity.logactivity'=>'Add Quotation')));
            if(!empty($sales['Logactivity']['loglink'])):
                
                $this->request->data['Logactivity']['logname']   =   'Salesorder';
                $this->request->data['Logactivity']['logactivity']   =   'Add SalesOrder';
                $this->request->data['Logactivity']['logid']   =   $sales['Logactivity']['loglink'];
                $this->request->data['Logactivity']['logno']   =   $sales['Logactivity']['loglink'];
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
                $this->request->data['Datalog']['logid'] = $sales['Logactivity']['loglink'];
                $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                $this->Datalog->create();
                $a = $this->Datalog->save($this->request->data['Datalog']);
                
                $this->Logactivity->updateAll(array('Logactivity.logapprove'=>2,'Logactivity.approved_by'=>$user_id),array('Logactivity.logid'=>$id,'Logactivity.logactivity'=>'Add Quotation'));
                
            else:
                
                $this->Logactivity->updateAll(array('Logactivity.logapprove'=>2,'Logactivity.approved_by'=>$user_id),array('Logactivity.logid'=>$id,'Logactivity.logactivity'=>'Add Quotation'));
            
            endif;
            
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
        public function calendar_clientpo()
        {
            $this->autoRender = false;
            $cal = $this->Quotation->find('all', array('conditions' => array('Quotation.is_assign_po' => 1), 'group' => 'reg_date', 'fields' => array('count(Quotation.reg_date) as title', 'reg_date as start'), 'recursive' => '-1'));

            $event_array = array();
            foreach ($cal as $cal_list => $v) {

                $event_array[$cal_list]['title'] = $v[0]['title'];
                $event_array[$cal_list]['start'] = $v['Quotation']['start'];
            }
            return json_encode($event_array);

        }
        
        function pdf($id = NULL) 
        {
        
            $this->autoRender = false;
            $quotation_data = $this->Quotation->find('first', array('conditions' => array('Quotation.id' => $id),'recursive'=>2));
            //pr($quotation_data);exit;
            $file_type = 'pdf';
            $filename = $quotation_data['Quotation']['quotationno'];

           $html = '<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>'.$quotation_data['Quotation']['quotationno'].'</title>
<link href="http://fonts.googleapis.com/css?family=Oswald" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Oswald:300,700" rel="stylesheet" type="text/css">
<style>
* { margin:0; padding:0; font-size:11px; color:#333 !important; }
table td { font-size:11px; line-height:18px; }
.table_format table { }
.table_format td { text-align:center; }
</style>
</head>';
           
 $title =   $this->Title->find('all');
            foreach($title as $title_name)
            {
                $titles[] = $title_name['Title']['title_name'];
            }
            //$this->set('titles',$titles);
            
                $customername = $quotation_data['Customer']['customername'];
                $billing_address = $quotation_data['Customer']['Address'][0]['address'];
                $postalcode = $quotation_data['Customer']['postalcode'];
                $contactperson = $quotation_data['Customer']['Contactpersoninfo'][0]['name'];
                $phone = $quotation_data['Customer']['phone'];
                $fax = $quotation_data['Customer']['fax'];
                $email = $quotation_data['Quotation']['email'];
                //$our_ref_no = $quotation_data_list['Quotation']['ref_no'];
                $ref_no = $quotation_data['Quotation']['ref_no'];
                $reg_date = $quotation_data['Quotation']['reg_date'];
                $payment_term = $quotation_data['Customer']['Paymentterm']['paymentterm'] . ' ' . $quotation_data['Customer']['Paymentterm']['paymenttype'];
                $quotationno = $quotation_data['Quotation']['quotationno'];
            
                foreach($quotation_data['Device'] as $device):
                    $device_name[] = $device;
                endforeach;
               // pr($device_name);exit;
               
$html .=
'<body style="font-family:Oswald;font-size:11px;padding:10px;margin:0;font-weight: 300;">
<table width="700px">
     <tr>
          <td width="435" style="padding:0 10px; border-right:2px solid #F60;"><div style="float:left; "><img src="img/logoBs.png" width="400;" height="auto" alt="" /></div></td>
          <td style="padding:0 10px;"><div style="float:left;text-align:right;">
                    <p>41 Senoko Drive</p>
                    <p>Singapore 758249</p>
                    <p>Tel.+65 6458 4411</p>
                    <p>Fax.+65 64584400</p>
                    <p>www.bestandards.com</p>
               </div></td>
     <tr>
</table>
<table width="623" height="56">
     <tr>
          <td width="198" style="padding:0 10px;"><div style="display:inline-block;font-size:18px;font-weight:bold; font-style:italic;color:#00005b !important">QUOTATION</div></td>
          <td width="391" style="padding:0 10px;"><div style="display:inline-block;background:#00005b;color:#fff !important;padding:5px;font-size:13px;">GST REG NO. M200510697 / COMPANY REG NO. 200510697M</div></td>
     </tr>
</table>
<div style="width:100%;margin-top:10px;float:left;">
     <table width="98%" cellpadding="1" cellspacing="1"  style="width:100%;margin-top:20px;">
          <tr>
               <td width="47%" style="border:1px solid #000;padding:5px;"><table width="288" cellpadding="0" cellspacing="0">
                         <tr>
                              <td width="128" colspan="3" height="10px" style="font-size:11px !important;">'.$customername.'</td>
                         </tr> 
                        <tr>
                              <td colspan="3" height="10px" style="font-size:11px !important;">'.$billing_address.'</td>
                         </tr>
                        <tr>
                              <td>'.$postalcode.'</td>
                         </tr>
                         <tr  style="padding-top:30px;">
                              <td style="line-height:10px !important;font-size:11px !important;">ATTN </td>
                              <td width="29">:</td>
                              <td width="145" style="line-height:20px !important;font-size:11px !important;">'.$contactperson.'</td>
                         </tr>
                         <tr>
                              <td style="line-height:10px !important;font-size:11px !important;">TEL </td>
                              <td width="29">:</td>
                              <td style="line-height:10px !important;font-size:11px !important;">'.$phone.'</td>
                         </tr>
                         <tr>
                              <td style="line-height:10px !important;font-size:11px !important;">FAX </td>
                              <td width="29">:</td>
                              <td style="line-height:10px !important;font-size:11px !important;">'.$fax.'</td>
                         </tr>
                         <tr>
                              <td style="line-height:10px !important;font-size:11px !important;">EMAIL </td>
                              <td width="29">:</td>
                              <td style="line-height:10px !important;font-size:11px !important;">'.$email.'</td>
                         </tr>
                         
                    </table></td>
                    <td width="3%"></td>
               <td width="45%" style="border:1px solid #000;width:50%;padding:0"><table width="285" cellpadding="0" cellspacing="0">
                         <tr>
                              <td height=""  colspan="3" style="padding:10px 0;"><div align="center" style="font-size:18px;border-bottom:1px solid #000;width:98%;padding:10px 0;">'.$quotationno.'</div></td>
                         </tr>
                         <tr>
                              <td width="139" style="line-height:10px !important;padding-left:5px;font-size:11px !important;">SALES PERSON </td>
                              <td width="24" style="font-size:11px !important;">:</td>
                              <td width="109" style="line-height:10px !important;font-size:11px !important;">Mr.Padma</td>
                         </tr>
                         <tr>
                              <td style="line-height:10px !important;padding-left:5px;font-size:11px !important;">YOUR REF NO </td>
                              <td style="font-size:11px !important;">:</td>
                              <td style="line-height:10px !important;font-size:11px !important;">'.$ref_no.'</td>
                         </tr>
                         <tr>
                              <td style="line-height:10px !important;padding-left:5px;font-size:11px !important;"> DATE </td>
                              <td style="font-size:11px !important;">:</td>
                              <td style="line-height:10px !important;font-size:11px !important;">'.$reg_date.'</td>
                         </tr>
                         <tr>
                              <td  style="line-height:20px !important;padding-left:5px;font-size:11px !important;">PAYMENT TERMS </td>
                              <td style="font-size:11px !important;">:</td>
                              <td style="line-height:10px !important;font-size:11px !important;">'.$payment_term.'</td>
                         </tr>
                    </table></td>
               <td width="2%"></td>
            </tr>
     </table>
</div>
<div style="padding-top:10px;">Being provided calibration service of the following(s) :</div>

<div style="width:100%;margin-top:20px;display:block;" class="table_format">
     <table cellpadding="0" cellspacing="0"  style="width:100%;">
          <tr>
               <td style="border-bottom:1px solid #000;padding:3px 10px;font-size:11px !important;color: #000 !important;">Item</td>
               <td style="border-bottom:1px solid #000;padding:3px 10px;font-size:11px !important;color: #000 !important;">Qty</td>
               <td style="border-bottom:1px solid #000;padding:3px 10px;font-size:11px !important;color: #000 !important;">Instrument</td>
               <td style="border-bottom:1px solid #000;padding:3px 10px;font-size:11px !important;color: #000 !important;">Brand</td>
               <td style="border-bottom:1px solid #000;padding:3px 10px;font-size:11px !important;color: #000 !important;">Model</td>
               <td style="border-bottom:1px solid #000;padding:3px 10px;font-size:11px !important;color: #000 !important;">Range</td>';
$count1 = 0;
for($i=0;$i<=4;$i++):
    if(isset($titles[$i])):
        $html .='<td style="border-bottom:1px solid #000;padding:3px 10px;font-size:11px !important;color: #000 !important;">';
        $html .= $titles[$i];
        $html .='</td>';
    endif;
    $count1 = $count1+1;
endfor;


$html .= '<td style="border-bottom:1px solid #000;padding:3px 10px;font-size:11px !important;color: #000 !important;">Total Price $(SGD)</td></tr>';
		  $subtotal = 0;
                foreach($device_name as $device):
                    $html .= '
                    <tr>
                        <td style="padding:3px 10px;font-size:11px !important;">'.$device['order_by'].'</td>
                        <td style="padding:3px 10px;font-size:11px !important;">1</td>
                        <td style="padding:3px 10px;font-size:11px !important;">'.$device['Instrument']['name'].'</td>
                        <td style="padding:3px 10px;font-size:11px !important;">'.$device['Brand']['brandname'].'</td>
                        <td style="padding:3px 10px;font-size:11px !important;">'.$device['model_no'].'</td>
                        <td style="padding:3px 10px;font-size:11px !important;">'.$device['Range']['range_name'].'</td>';
                        for($i=0;$i<=4;$i++):
                        if(isset($titles[$i])):
                        $html .='<td style="padding:3px 10px;font-size:11px !important;">'.$device['title'.($i+1).'_val'].'</td>';
                        endif;
                        endfor;
                        
                    $html .='<td style="padding:3px 10px;font-size:11px !important;">'.number_format($device['unit_price'], 2, '.', '').'</td></tr>';
                $subtotal = $subtotal + $device['unit_price']; 
                endforeach;
                
                
         $gst = $subtotal * 0.07;
                $total_due = $gst + $subtotal;
               
                $html .= '<tr>
                         <td colspan="'.($count1+5).'" style="padding:3px 10px;font-size:11px !important;color: #000 !important;">SUBTOTAL $(SGD)</td>
                         <td style="padding:3px 10px;font-size:11px !important;color: #000 !important;">'.number_format($subtotal, 2, '.', '').'</td>
                    </tr>
                    <tr>
                         <td colspan="'.($count1+5).'" style="padding:3px 10px;font-size:11px !important;color: #000 !important;">GST ( 7.00% )</td>
                         <td style="padding:3px 10px;font-size:11px !important;color: #000 !important;">'.number_format($gst, 2, '.', '').'</td>
                    </tr>
                    <tr>
                         <td colspan="'.($count1+5).'" style="padding:3px 10px;font-size:11px !important;color: #000 !important;">TOTAL DUE $(SGD)</td>
                         <td style="padding:3px 10px;font-size:11px !important;color: #000 !important;">'.number_format($total_due, 2, '.', '').'</td>
                    </tr>
                     <tr>
               <td colspan="3" style="border:1px  dashed #000;text-align:right;padding:3px 10px;color: #000 !important;font-size:15px !important;">SPECIAL REQUIREMENTS :</td>
               <td  colspan="8" style="border:1px dashed #000; text-align:left;padding:3px 10px;font-size:15px !important;">Self Collect & Self Delivery Non-Singlas</td>
          </tr>
     </table>
</div>

<div style="width:100%;margin-top:30px;">
     <table width="93%" cellpadding="1" cellspacing="1"  style="width:100%;">
          <tr>
               <td width="55%" style="padding:5px;width:50%;"><table cellpadding="0" cellspacing="0" width="300" height="150">
                         <tr>
                              <td style="font-size:9px !important;padding:0px 5px;"><p style="color: #000 !important;">
                                   
                                   <div style="color: #000 !important;margin-top:10px;font-size:14px !important;">TERMS AND CONDITIONS :</div></td>
                         </tr>
                         <tr  style="padding-top:30px;">
                              <td style="font-size:9px !important;padding:0px 5px;"><p style="color: #000 !important;">1) TURNAROUND TIME :</p>
                                   <p style="text-transform:lowercase;line-height:12px !important;">NORMAL SERVICE 5 - 7 WORKING DAYS</p>
                                   <p style="text-transform:lowercase;line-height:12px !important;"> EXPRESS SERVICE 2 - 3 WORKING DAYS** 1.5 TIMES NORMAL RATES</p>
                                   <p style="text-transform:lowercase;line-height:12px !important;">PLATINUM SERVICE 1 WORKING DAY** 2 TIMES NORMAL RATES</p></td>
                         </tr>
                         <tr>
                              <td style="font-size:9px !important;padding:0px 5px;"><p style="color: #000 !important;">2) COLLECTION & DELIVERY :</p>
                                   <p style="text-transform:lowercase;line-height:12px !important;"> TO BE ADVISED BY SALES PERSONNEL</p></td>
                         </tr>
                         <tr>
                              <td style="font-size:9px !important;padding:0px 5px;"><p style="text-transform:lowercase;line-height:12px !important;">3) VALIDITY OF THIS QUOTE IS 30 DAYS FROM THE DATE OF THIS QUOTATION</p>
                                   <p style="text-transform:lowercase;line-height:12px !important;"> *PLEASE RETURN FAX OR RAISE YOUR PURCHASE ORDER UPON CONFIRMATION*</p>
                                   <p style="text-transform:lowercase;line-height:12px !important;"> ALL PRICE(S) ABOVE ARE SUBJECTED TO GST CHARGE</p></td>
                         </tr>
                         <tr>
                              <td style="font-size:9px !important;padding:0px 5px;"><p style="text-transform:lowercase;line-height:12px !important;">4) THE LABORATORY SHALL RECOMMEND THE CALIBRATION DUE DATE AS PER THE CLIENTS REQUIREMENT OF 1 YEAR, UNLESS OTHERWISE AGREED ON THE TIME FRAME.</p></td>
                         </tr>
                         <tr>
                              <td style="font-size:9px !important;padding:0px 5px;"> **PLEASE CONTACT SALES DEPARTMENT FOR MORE QUERIES AT 64584411**</td>
                         </tr>
                    </table></td>
               <td width="45%" height="150" style="border:1px dashed #000;padding:5px;"><table width="269" cellpadding="0" cellspacing="0">
                         <tr>
                              <td width="269"  style="color: #000 !important;">CONFIRMED AND ACCEPTED BY:</td>
                         </tr>
                         <tr>
                              <td width="269"  height="30"  style="color: #000 !important;"></td>
                         </tr>
                         <tr>
                              <td style="padding-top:5px;color: #000 !important;"><div style="border-top:1px solid #000;width:100%;">COMPANYS STAMP,SIGNATURE AND DATE</div></td>
                         </tr>
                         <tr>
                              <td style="padding-top:5px;color: #000 !important;">DESIGNATION :</td>
                         </tr>
                         <tr>
                              <td style="padding-top:5px; color: #000 !important;">NAME :</td>
                         </tr>
                    </table></td>
          </tr>
     </table>
     <table width="639">
          <tr>
               <td width="456" style="font-size:9px !important;"><p style="color: #000 !important;">NOTE :</p>
                    THIS IS COMPUTER GENERATED QUOTATION. NO SIGNATURE IS REQUIRED.
                    </p></td>
               <td width="171"><img src="img/signature.jpg"  width="120px" height="auto" alt="" /></td>
          </tr>
     </table>
     <div style="background:#313854;color:#fff !important;padding:10px;font-size:12px;margin-top:30px;">BS TECH REFERENCE MEASUREMENT STANDARDS ARE TRACEABLE TO NATIONAL METROLOGY CENTRE (SINGAPORE), NPL (UK), NIST (USA) OR OTHER RECOGNIZED NATIONAL OR INTERNATIONAL STANDARDS</div>
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
            $this->dompdf->stream("Quotation-".$filename.".pdf");
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

            $this->Device->id = $this->request->data['device_id'];
            //$this->Device->updateAll(array('Device.title1_val'=>$title),array('Device.id'=>$this->request->data['device_id']));
            $this->Device->saveField('title1_val', $title);
            echo $title;
        }
    }    
    public function update_title2()
    {
        $this->autoRender   =   false;
         if ($this->request->data) {
            App::uses('Sanitize', 'Utility');
            $title = Sanitize::clean($this->request->data['title2']);

            $this->Device->id = $this->request->data['device_id'];
            //$this->Device->updateAll(array('Device.title1_val'=>$title),array('Device.id'=>$this->request->data['device_id']));
            $this->Device->saveField('title2_val', $title);
            echo $title;
        }
    } 
    public function update_title3()
    {
        $this->autoRender   =   false;
         if ($this->request->data) {
            App::uses('Sanitize', 'Utility');
            $title = Sanitize::clean($this->request->data['title3']);

            $this->Device->id = $this->request->data['device_id'];
            //$this->Device->updateAll(array('Device.title1_val'=>$title),array('Device.id'=>$this->request->data['device_id']));
            $this->Device->saveField('title3_val', $title);
            echo $title;
        }
    } 
    public function update_title4()
    {
        $this->autoRender   =   false;
         if ($this->request->data) {
            App::uses('Sanitize', 'Utility');
            $title = Sanitize::clean($this->request->data['title4']);

            $this->Device->id = $this->request->data['device_id'];
            //$this->Device->updateAll(array('Device.title1_val'=>$title),array('Device.id'=>$this->request->data['device_id']));
            $this->Device->saveField('title4_val', $title);
            echo $title;
        }
    } 
    public function update_title5()
    {
        $this->autoRender   =   false;
         if ($this->request->data) {
            App::uses('Sanitize', 'Utility');
            $title = Sanitize::clean($this->request->data['title5']);

            $this->Device->id = $this->request->data['device_id'];
            //$this->Device->updateAll(array('Device.title1_val'=>$title),array('Device.id'=>$this->request->data['device_id']));
            $this->Device->saveField('title5_val', $title);
            echo $title;
        }
    } 
    public function update_title6()
    {
        $this->autoRender   =   false;
         if ($this->request->data) {
            App::uses('Sanitize', 'Utility');
            $title = Sanitize::clean($this->request->data['title6']);

            $this->Device->id = $this->request->data['device_id'];
            //$this->Device->updateAll(array('Device.title1_val'=>$title),array('Device.id'=>$this->request->data['device_id']));
            $this->Device->saveField('title6_val', $title);
            echo $title;
        }
    } 
    public function update_title7()
    {
        $this->autoRender   =   false;
         if ($this->request->data) {
            App::uses('Sanitize', 'Utility');
            $title = Sanitize::clean($this->request->data['title7']);

            $this->Device->id = $this->request->data['device_id'];
            //$this->Device->updateAll(array('Device.title1_val'=>$title),array('Device.id'=>$this->request->data['device_id']));
            $this->Device->saveField('title7_val', $title);
            echo $title;
        }
    } 
    public function update_title8()
    {
        $this->autoRender   =   false;
         if ($this->request->data) {
            App::uses('Sanitize', 'Utility');
            $title = Sanitize::clean($this->request->data['title8']);

            $this->Device->id = $this->request->data['device_id'];
            //$this->Device->updateAll(array('Device.title1_val'=>$title),array('Device.id'=>$this->request->data['device_id']));
            $this->Device->saveField('title8_val', $title);
            echo $title;
        }
    } 
        
    public function inv_title1()
    {
        $this->autoRender   =   false;
         if ($this->request->data) {
            App::uses('Sanitize', 'Utility');
            $title = Sanitize::clean($this->request->data['title1']);

            $this->Device->id = $this->request->data['device_id'];
            //$this->Device->updateAll(array('Device.title1_val'=>$title),array('Device.id'=>$this->request->data['device_id']));
            $this->Device->saveField('title1_val', $title);
            echo $title;
        }
    }    
    public function inv_title2()
    {
        $this->autoRender   =   false;
         if ($this->request->data) {
            App::uses('Sanitize', 'Utility');
            $title = Sanitize::clean($this->request->data['title2']);

            $this->Device->id = $this->request->data['device_id'];
            //$this->Device->updateAll(array('Device.title1_val'=>$title),array('Device.id'=>$this->request->data['device_id']));
            $this->Device->saveField('title2_val', $title);
            echo $title;
        }
    } 
    public function inv_title3()
    {
        $this->autoRender   =   false;
         if ($this->request->data) {
            App::uses('Sanitize', 'Utility');
            $title = Sanitize::clean($this->request->data['title3']);

            $this->Device->id = $this->request->data['device_id'];
            //$this->Device->updateAll(array('Device.title1_val'=>$title),array('Device.id'=>$this->request->data['device_id']));
            $this->Device->saveField('title3_val', $title);
            echo $title;
        }
    } 
    public function inv_title4()
    {
        $this->autoRender   =   false;
         if ($this->request->data) {
            App::uses('Sanitize', 'Utility');
            $title = Sanitize::clean($this->request->data['title4']);

            $this->Device->id = $this->request->data['device_id'];
            //$this->Device->updateAll(array('Device.title1_val'=>$title),array('Device.id'=>$this->request->data['device_id']));
            $this->Device->saveField('title4_val', $title);
            echo $title;
        }
    } 
    public function inv_title5()
    {
        $this->autoRender   =   false;
         if ($this->request->data) {
            App::uses('Sanitize', 'Utility');
            $title = Sanitize::clean($this->request->data['title5']);

            $this->Device->id = $this->request->data['device_id'];
            //$this->Device->updateAll(array('Device.title1_val'=>$title),array('Device.id'=>$this->request->data['device_id']));
            $this->Device->saveField('title5_val', $title);
            echo $title;
        }
    } 
    public function inv_title6()
    {
        $this->autoRender   =   false;
         if ($this->request->data) {
            App::uses('Sanitize', 'Utility');
            $title = Sanitize::clean($this->request->data['title6']);

            $this->Device->id = $this->request->data['device_id'];
            //$this->Device->updateAll(array('Device.title1_val'=>$title),array('Device.id'=>$this->request->data['device_id']));
            $this->Device->saveField('title6_val', $title);
            echo $title;
        }
    } 
    public function inv_title7()
    {
        $this->autoRender   =   false;
         if ($this->request->data) {
            App::uses('Sanitize', 'Utility');
            $title = Sanitize::clean($this->request->data['title7']);

            $this->Device->id = $this->request->data['device_id'];
            //$this->Device->updateAll(array('Device.title1_val'=>$title),array('Device.id'=>$this->request->data['device_id']));
            $this->Device->saveField('title7_val', $title);
            echo $title;
        }
    } 
    public function inv_title8()
    {
        $this->autoRender   =   false;
         if ($this->request->data) {
            App::uses('Sanitize', 'Utility');
            $title = Sanitize::clean($this->request->data['title8']);

            $this->Device->id = $this->request->data['device_id'];
            //$this->Device->updateAll(array('Device.title1_val'=>$title),array('Device.id'=>$this->request->data['device_id']));
            $this->Device->saveField('title8_val', $title);
            echo $title;
        }
    }
    public function price_change()
    {
        $this->autoRender   =   false;
         if ($this->request->data) {
            App::uses('Sanitize', 'Utility');
            $unit_price = Sanitize::clean($this->request->data['unit_price']);
            
             $this->Device->id = $this->request->data['device_id'];
            //$this->Device->updateAll(array('Device.title1_val'=>$title),array('Device.id'=>$this->request->data['device_id']));
            $this->Device->saveField('unit_price', $unit_price);
            $this->Device->saveField('total', $unit_price);
            echo $unit_price;
        }
    }
    public function price_change_discount()
    {
        $this->autoRender   =   false;
         if ($this->request->data) {
            App::uses('Sanitize', 'Utility');
            $discount = Sanitize::clean($this->request->data['discount']);
            
             $this->Device->id = $this->request->data['device_id'];
            $dev = $this->Device->find('first',array('conditions'=>array('Device.id'=>$this->request->data['device_id'])));
            $total = $dev['Device']['total'];
            $total_total = $total - ($total * $discount/100);
            //$this->Device->updateAll(array('Device.title1_val'=>$title),array('Device.id'=>$this->request->data['device_id']));
            $this->Device->saveField('discount', $discount);
            $this->Device->saveField('total', $total_total);
            echo $discount;
        }
    }
}
