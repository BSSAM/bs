<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class CustomersController extends AppController
{
    public $helpers = array('Html','Form','Session');
    public $uses = array('Contactpersoninfo','Billingaddress','Deliveryaddress','Projectinfo','AcknowledgementType','Quotation',
                        'Customer','Address','Salesperson','Referedby','CusSalesperson','CusReferby','Random','Instrument_copy',
                        'Industry','Location','Paymentterm','Instrument','InstrumentRange','CustomerInstrument',
                        'Deliveryordertype','InvoiceType','Priority','Contactpersoninfo','Logactivity','Datalog','InsPercent');
    
    public function index()
    {
        /*******************************************************
         *  BS V1.0
         *  Customers Permission
         *  Controller : Customers
         *  Permission : view 
         *******************************************************/
        $user_role = $this->userrole_permission();
        if($user_role['cus_customer']['view'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
		
        $this->set('userrole_cus',$user_role['cus_customer']);
        $this->set('userrole_ins',$user_role['instr_costing']);
        /*
         * ---------------  Functionality of Users -----------------------------------
         */
        $Customer_lists = $this->Customer->find('all',array('conditions'=>array('Customer.is_default'=>1,'Customer.is_deleted'=>0),
		'order' => array('Customer.id' => 'DESC'),'recursive'=>'2'));
        $this->set('customer', $Customer_lists);
//        $this->Address->deleteAll(array('Address.status'=>0));
//        $this->Projectinfo->deleteAll(array('Projectinfo.project_status'=>0));
//        $this->Contactpersoninfo->deleteAll(array('Contactpersoninfo.status'=>0));
        
    }
    public function add()
    {
        /* 
         * ---------------  Customer Condition  -------------------------------------
         */
        $user_role = $this->userrole_permission();
        if($user_role['cus_customer']['add'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        
        /*
         * ---------------  Functionality of Customers -----------------------------------
         */
        $this->set('customer_id',$this->random('customer'));
        $this->set('tag_id',$this->random('tag'));
        $this->set('group_id',$this->random('group'));
        
        $salesperson = $this->Salesperson->find('list', array('conditions'=>array('Salesperson.is_deleted'=>0),'fields' => 'salesperson'));
        $referedby = $this->Referedby->find('list', array('conditions'=>array('Referedby.is_deleted'=>0),'fields' => 'referedby'));
        
        $data10 = $this->Address->find('all',array('conditions'=>array('customer_id'=>$this->Session->read('customer_id'),'status'=>0,'type'=>'registered')));
        $data10_count = $this->Address->find('count',array('conditions'=>array('customer_id'=>$this->Session->read('customer_id'),'status'=>0,'type'=>'registered')));
        
        $data11 = $this->Address->find('all',array('conditions'=>array('customer_id'=>$this->Session->read('customer_id'),'status'=>0,'type'=>'billing')));
        $data11_count = $this->Address->find('count',array('conditions'=>array('customer_id'=>$this->Session->read('customer_id'),'status'=>0,'type'=>'billing')));
       
        $data12 = $this->Address->find('all',array('conditions'=>array('customer_id'=>$this->Session->read('customer_id'),'status'=>0,'type'=>'delivery')));
        $data12_count = $this->Address->find('count',array('conditions'=>array('customer_id'=>$this->Session->read('customer_id'),'status'=>0,'type'=>'delivery')));
       
        $industry = $this->Industry->find('list', array('conditions'=>array('Industry.is_deleted'=>0),'fields' => 'industryname'));
        $deliverorder_type = $this->Deliveryordertype->find('list', array('fields' => array('id','delivery_order_type')));
        $invoice_types = $this->InvoiceType->find('list', array('fields' => array('id','type_invoice')));
        $location = $this->Location->find('list', array('conditions'=>array('Location.is_deleted'=>0),'fields' => 'locationname'));
        
        $paymentterm = $this->Paymentterm->find('list', array('conditions'=>array('Paymentterm.is_deleted'=>0),'fields' => array('id','pay')));
        $priority= $this->Priority->find('list', array('conditions'=>array('Priority.is_deleted'=>0),'fields' => 'priority'));
        $userrole = $this->Userrole->find('list', array('fields' => 'user_role'));
        $acknowledgement_type = $this->AcknowledgementType->find('list', array('fields' => array('id','acknowledgement_type')));
       
        $this->set(compact('priority','location','salesperson','referedby','data10','data10_count','data11',
                            'data11_count','data12','data12_count','industry','deliverorder_type',
                            'invoice_types','paymentterm','userrole','industry','contactpersoninfo','acknowledgement_type'));
        
        if($this->request->is('post'))
        {
            $this->request->data['status'] = 1;
            $refer_array = $this->request->data['referedbies_id'];
            $sales_array = $this->request->data['salesperson_id'];
            $cust_id  =   $this->request->data['id'];
            //pr($cust_id);exit;
            $group_id  =   $this->request->data['customergroup_id'];
            $tag_id  =   $this->request->data['tag_id'];
            $this->request->data['is_default']  =   1;
            if(!empty($sales_array))
            {
                foreach($sales_array as $key=>$value)
                {
                    $this->CusSalesperson->create();
                    $per_data = array('customer_id' =>$cust_id, 'salespeople_id' => $value,'tag_id'=>$tag_id,'customergroup_id'=>$group_id);
                    $this->CusSalesperson->save($per_data);
                }
            }
            if(!empty($refer_array))
            {
                foreach($refer_array as $key=>$value)
                {
                    $this->CusReferby->create();
                    $ref_data = array('customer_id' =>$cust_id, 'referedby_id' => $value,'tag_id'=>$tag_id,'customergroup_id'=>$group_id);
                    $this->CusReferby->save($ref_data);
                }
            }
            unset($this->request->data['Customer']);
            unset($this->request->data['salesperson_id']);
            unset($this->request->data['referedbies_id']);
            
            if($this->Customer->save($this->request->data))
            {
//                $this->Random->updateAll(array('Random.customer'=>'"'.$cust_id.'"'),array('Random.id'=>1));  
//                $this->Random->updateAll(array('Random.tag'=>'"'.$tag_id.'"'),array('Random.id'=>1));  
//                $this->Random->updateAll(array('Random.group'=>'"'.$group_id.'"'),array('Random.id'=>1));  
                $contactperson = $this->Contactpersoninfo->find('count', array('conditions' => array('Contactpersoninfo.customer_id' => $cust_id)));
                $address = $this->Address->find('count', array('conditions' => array('Address.customer_id' =>$cust_id)));
                $contactperson1 = $this->Contactpersoninfo->find('all', array('conditions' => array('Contactpersoninfo.customer_id' => $cust_id)));
                $address1 = $this->Address->find('all', array('conditions' => array('Address.customer_id' =>$cust_id)));
                //pr($contactperson1);
                //pr($address1); 
                //exit;
                if ($contactperson > 0) {
                    $this->Contactpersoninfo->updateAll(array('Contactpersoninfo.status' => 1), array('Contactpersoninfo.customer_id' => $cust_id));
                }
                if($address>0)
                {
                    $this->Address->updateAll(array('Address.status'=>1),array('Address.customer_id'=>$cust_id));
                }
                
                 /******************
                    * Log Activity For Approval
                    */
                    $this->request->data['Logactivity']['logname'] = 'Customer';
                    $this->request->data['Logactivity']['logactivity'] = 'Add Customer';
                    $this->request->data['Logactivity']['logid'] = $cust_id;
                    $this->request->data['Logactivity']['user_id'] = $this->Session->read('sess_userid');
                    $this->request->data['Logactivity']['logapprove'] = 1;

                    $a = $this->Logactivity->save($this->request->data['Logactivity']);
                    
                /******************/
                    
                /******************
                    * Data Log Activity
                    */
                    $this->request->data['Datalog']['logname'] = 'Customer';
                    $this->request->data['Datalog']['logactivity'] = 'Add';
                    $this->request->data['Datalog']['logid'] = $cust_id;
                    $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                    
                    $a = $this->Datalog->save($this->request->data['Datalog']);
                    
                /******************/  
                
                $this->Session->setFlash(__('Customer has been Added Successfully'));
                return $this->redirect(array('action'=>'index'));
            }
            $this->Session->setFlash(__('Customer Could Not be Added'));
        }
       
    }
    public function edit($id = NULL)
    {
        //pr($id);exit;
        /* 
         * ---------------  Customer Condition  -------------------------------------
         */
        $user_role = $this->userrole_permission();
        if($user_role['cus_customer']['add'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        
        /*
         * ---------------  Functionality of Customers -----------------------------------
         */
        if(empty($id))
        {
             $this->Session->setFlash(__('Invalid Customer Entry'));
             return $this->redirect(array('action'=>'index'));
        }
        
        $customer_details =  $this->Customer->find('first',array('conditions'=>array('Customer.id'=>$id,'Customer.status'=>1,'Customer.is_deleted'=>0))); 
        $customer_dat = $this->Customer->find('first',array('conditions'=>array('Customer.id'=>$id),'recursive'=>'2'));
        $this->set('customer_dat',$customer_dat);
        $completed_quotation    =   $this->Quotation->find('all',array('conditions'=>array('Quotation.customer_id'=>$id,'Quotation.is_jobcompleted'=>0,'Quotation.is_deleted'=>0)));
        if(count($completed_quotation)>0):
            $disabled   =   'disabled';
            $this->set('disabled',$disabled);
            else:
                $disabled   =   '';
                $this->set('disabled',$disabled);
        endif;
        
        if($this->Session->read('customer_id')==''){ $this->Session->write('customer_id',$id);  }
        $this->set('customer_id',$id);
        
        $salesperson = $this->Salesperson->find('list', array('conditions'=>array('Salesperson.is_deleted'=>0),'fields' => 'salesperson'));
        $referedby = $this->Referedby->find('list', array('conditions'=>array('Referedby.is_deleted'=>0),'fields' => 'referedby'));
        
        $data10 = $this->Address->find('all',array('conditions'=>array('customer_id'=>$id,'status'=>1,'type'=>'registered')));
        $data10_count = $this->Address->find('count',array('conditions'=>array('customer_id'=>$id,'status'=>1,'type'=>'registered')));
        
        $data11 = $this->Address->find('all',array('conditions'=>array('customer_id'=>$id,'status'=>1,'type'=>'billing')));
        $data11_count = $this->Address->find('count',array('conditions'=>array('customer_id'=>$id,'status'=>1,'type'=>'billing')));
       
        $data12 = $this->Address->find('all',array('conditions'=>array('customer_id'=>$id,'status'=>1,'type'=>'delivery')));
        $data12_count = $this->Address->find('count',array('conditions'=>array('customer_id'=>$id,'status'=>1,'type'=>'delivery')));
       
        $invoice_types = $this->InvoiceType->find('list', array('fields' => array('id','type_invoice')));
        $industry = $this->Industry->find('list', array('conditions'=>array('Industry.is_deleted'=>0),'fields' => 'industryname'));
        
        $location = $this->Location->find('list', array('conditions'=>array('Location.is_deleted'=>0),'fields' => 'locationname'));
        $deliverorder_type = $this->Deliveryordertype->find('list', array('fields' => array('id','delivery_order_type')));
        $paymentterm = $this->Paymentterm->find('list', array('conditions'=>array('Paymentterm.is_deleted'=>0),'fields' => array('id','pay')));;
        
        $priority = $this->Priority->find('list', array('conditions'=>array('Priority.is_deleted'=>0),'fields' => 'priority'));
        $userrole = $this->Userrole->find('list', array('fields' => 'user_role'));
        $acknowledgement_type = $this->AcknowledgementType->find('list', array('fields' => array('id','acknowledgement_type')));
        // Model For the Tab Edit Contact Info
        //pr($id);exit;
        $contactpersoninfo = $this->Contactpersoninfo->find('all', array('conditions' => array('Contactpersoninfo.status' => 1, 'Contactpersoninfo.customer_id' => $id)));
        //pr($contactpersoninfo);exit;
        $this->set(compact('priority','location','salesperson','referedby','data10','data10_count','data11',
                            'data11_count','data12','data12_count','industry','deliverorder_type',
                            'invoice_types','paymentterm','userrole','industry','contactpersoninfo','acknowledgement_type'));
     
        if($this->request->is(array('post','put')))
        {
            //pr($id);exit;
            $this->Customer->id = $id;
            $refer_array = $this->request->data['referedbies_id'];
            $sales_array = $this->request->data['salesperson_id'];
            $cust_id  =   $id;
            if(!empty($sales_array))
            {
                $this->CusSalesperson->deleteAll(array('CusSalesperson.customer_id' => $id));
                foreach ($sales_array as $key => $value) {
                    
                    $this->CusSalesperson->create();
                    $sal_data = array('customer_id' => $id, 'salespeople_id' => $value);
                    $this->CusSalesperson->save($sal_data);
                }
               
            }
            if(!empty($refer_array))
            {
                $this->CusReferby->deleteAll(array('CusReferby.customer_id' => $id));
                foreach ($refer_array as $key => $value) {
                    
                    $this->CusReferby->create();
                    $ref_data = array('customer_id' => $id, 'referedby_id' => $value);
                    $this->CusReferby->save($ref_data);
                }
            }
            unset($this->request->data['Customer']);
            unset($this->request->data['salesperson_id']);
            unset($this->request->data['referedbies_id']);
            
            if($this->Customer->save($this->request->data))
            {
               $contactperson   = $this->Contactpersoninfo->find('count',array('conditions'=>array('Contactpersoninfo.customer_id'=>$id)));
               $address= $this->Address->find('count',array('conditions'=>array('Address.customer_id'=>$id)));
                if($contactperson>0)
                {
                    $this->Contactpersoninfo->updateAll(array('Contactpersoninfo.status'=>1),array('Contactpersoninfo.customer_id'=>$id));
                }
                if($address>0)
                {
                     $this->Address->updateAll(array('Address.status'=>1),array('Address.customer_id'=>$id));
                }
                
                /******************
                    * Data Log Activity
                    */
                    $this->request->data['Datalog']['logname'] = 'Customer';
                    $this->request->data['Datalog']['logactivity'] = 'Edit';
                    $this->request->data['Datalog']['logid'] = $id;
                    $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                    
                    $a = $this->Datalog->save($this->request->data['Datalog']);
                    
                /******************/   
                
               $this->Session->setFlash(__('Customer has been Updated'));
               $this->redirect(array('action'=>'index'));
            }
            $this->Session->setFlash(__('Customer Cant be Updated'));
        }
        else
        {
            $this->request->data =  $customer_details;
        }
    }
    
    public function delete($id=NULL)
    {
        /* 
         * ---------------  Customer Condition  -------------------------------------
         */
        $user_role = $this->userrole_permission();
        if($user_role['cus_customer']['delete'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        
        /*
         * ---------------  Functionality of Customers -----------------------------------
         */
        $this->autoRender=false;
        if($this->Customer->updateAll(array('Customer.is_deleted'=>1,'Customer.status'=>0),array('Customer.id'=>$id)))
        {
             /******************
                    * Data Log Activity
                    */
                    $this->request->data['Datalog']['logname'] = 'Customer';
                    $this->request->data['Datalog']['logactivity'] = 'Delete';
                    $this->request->data['Datalog']['logid'] = $id;
                    $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                    
                    $a = $this->Datalog->save($this->request->data['Datalog']);
                    
            /******************/   
            $this->Session->setFlash(__('Customer has been deleted'));
            return $this->redirect(array('action'=>'index'));
        }
    }
    public function project_add()
    {
        $this->autoRender=false;
        $serial_id= $this->request->data['serial_id'];
        $project_name=$this->request->data['project_name'];
        $status=0;
        $this->loadModel('Projectinfo');
        $this->request->data['Projectinfo']['project_id']=$serial_id;
        $this->request->data['Projectinfo']['customer_id']=$this->Session->read('customer_id');;
        $this->request->data['Projectinfo']['project_name']=$project_name;
        $this->request->data['Projectinfo']['project_status']=$status;
        if($this->Projectinfo->save($this->request->data))
        {
            echo "success";
        }
    }
     public function project_edit_add()
    {
        $this->autoRender=false;
        $serial_id= $this->request->data['serial_id'];
        $project_name=$this->request->data['project_name'];
        
        $status=1;
        $this->loadModel('Projectinfo');
        $this->request->data['Projectinfo']['project_id']=$serial_id;
        $this->request->data['Projectinfo']['customer_id']=$this->Session->read('customer_id');;
        $this->request->data['Projectinfo']['project_name']=$project_name;
        $this->request->data['Projectinfo']['project_status']=$status;
        $this->Projectinfo->save($this->request->data);
        $pro_id = $this->Projectinfo->getLastInsertID();
        return $pro_id+1;
    }
    public function project_edit_update()
    {
        $this->autoRender=false;
        $pro_id= $this->request->data['id'];
        $this->loadModel('Projectinfo');
        $projectinfo =  $this->Projectinfo->findById($pro_id);
        echo $str = implode(',',$projectinfo['Projectinfo']);
    }
    public function project_edit_rule()
    {
        $this->autoRender=false;
        $pro_id= $this->request->data['id'];
        $pro_name= $this->request->data['pro_name'];
        $this->loadModel('Projectinfo');
        
        $data = $this->Projectinfo->updateAll(array('Projectinfo.project_name'=>'"'.$pro_name.'"'),array('Projectinfo.id'=>$pro_id));
        //echo 'success';
    }
    public function project_delete()
    {
        $this->autoRender=false;
        $delete_id= $this->request->data['delete_id'];
        
        $this->loadModel('Projectinfo');
        if($this->Projectinfo->deleteAll(array('Projectinfo.project_id'=>$delete_id)))
        {
            echo "deleted";
        }
    }
    public function delivery_add()
    {
        
        $this->autoRender=false;
        $delivery_id= $this->request->data['delivery_id'];
        $delivery_address=$this->request->data['delivery_address'];
        $status=0;
        $this->loadModel('Deliveryaddress');
        
        $this->request->data['Deliveryaddress']['delivery_id']=$delivery_id;
        $this->request->data['Deliveryaddress']['customer_id']=$this->Session->read('customer_id');;
        $this->request->data['Deliveryaddress']['delivery_address']=$delivery_address;
        $this->request->data['Deliveryaddress']['project_status']=$status;
        if($this->Deliveryaddress->save($this->request->data))
        {
            echo "success";
        }
    }
    public function delivery_delete()
    {
        $this->autoRender=false;
        $delete_id= $this->request->data['delete_id'];
        
        $this->loadModel('Deliveryaddress');
        if($this->Deliveryaddress->deleteAll(array('Deliveryaddress.delivery_id'=>$delete_id)))
        {
            echo "deleted";
        }
    }
    public function billing_add()
    {
        $this->autoRender=false;
        $billing_id= $this->request->data['billing_id'];
        $billing_address=$this->request->data['billing_address'];
        $status=0;
        $this->loadModel('Billingaddress');
        $this->request->data['Billingaddress']['billing_id']=$billing_id;
        $this->request->data['Billingaddress']['customer_id']=$this->Session->read('customer_id');;
        $this->request->data['Billingaddress']['billing_address']=$billing_address;
        $this->request->data['Billingaddress']['status']=$status;
        if($this->Billingaddress->save($this->request->data))
        {
            echo "success";
        }
    }
    public function billing_delete()
    {
        $this->autoRender=false;
        $delete_id= $this->request->data['delete_id'];
        
        $this->loadModel('Billingaddress');
        if($this->Billingaddress->deleteAll(array('Billingaddress.billing_id'=>$delete_id)))
        {
            echo "deleted";
        }
    }
    public function contact_person_add()
    {
        $this->autoRender=false;
        //echo $this->Session->read('customer_id');
        $this->loadModel('Contactpersoninfo');
        $this->request->data['Contactpersoninfo']['email']=$this->request->data['contact_email'];
        $this->request->data['Contactpersoninfo']['remarks']=$this->request->data['contact_remark'];
        $this->request->data['Contactpersoninfo']['name']=$this->request->data['contact_name'];
        $this->request->data['Contactpersoninfo']['department']=$this->request->data['contact_department'];
        $this->request->data['Contactpersoninfo']['phone']=$this->request->data['contact_phone'];
        $this->request->data['Contactpersoninfo']['position']=$this->request->data['contact_position'];
        $this->request->data['Contactpersoninfo']['mobile']=$this->request->data['contact_mobile'];
        $this->request->data['Contactpersoninfo']['purpose']=$this->request->data['contact_purpose'];
        $this->request->data['Contactpersoninfo']['customer_id']=$this->request->data['customer_id'];
        $this->request->data['Contactpersoninfo']['tag_id']=$this->request->data['tag_id'];
        $this->request->data['Contactpersoninfo']['serial_id']=$this->request->data['serial_id'];
        $this->request->data['Contactpersoninfo']['customergroup_id']=$this->request->data['group_id'];
        $this->request->data['Contactpersoninfo']['status']=0;
        if($this->Contactpersoninfo->save($this->request->data))
        {
            $contact_last_id    =   $this->Contactpersoninfo->getLastInsertID();
            echo $contact_last_id;
        }
    }
    public function contact_person_edit()
    {
        
        $this->autoRender=false;
        //echo $this->Session->read('customer_id');
        $con_id= $this->request->data['edit_con_id'];
        $this->loadModel('Contactpersoninfo');
        $edit_con_details    =   $this->Contactpersoninfo->find('first',array('conditions'=>array('Contactpersoninfo.id'=>$con_id)));
        if(!empty($edit_con_details ))
        {
            echo json_encode($edit_con_details);
        }
        
    }
    public function contact_delete()
    {
        $this->autoRender=false;
        $delete_id= $this->request->data['delete_id'];
        $this->loadModel('Contactpersoninfo');
        if($this->Contactpersoninfo->deleteAll(array('Contactpersoninfo.id'=>$delete_id)))
        {
            echo "deleted";
        }
    }
    
     public function contact_edit_update()
    {
        $this->autoRender=false;
        
        
//        $this->Contactpersoninfo->updateAll(array('Contactpersoninfo.email'=>'"'.$this->request->data['contact_email'].'"',
//                                                   'Contactpersoninfo.remarks'=>'"'.$this->request->data['contact_remark'].'"',
//                                                    'Contactpersoninfo.name'=>'"'.$this->request->data['contact_name'].'"',
//                                                    'Contactpersoninfo.department'=>'"'.$this->request->data['contact_department'].'"',
//                                                    'Contactpersoninfo.phone'=>'"'.$this->request->data['contact_phone'].'"',
//                                                    'Contactpersoninfo.position'=>'"'.$this->request->data['contact_position'].'"',
//                                                    'Contactpersoninfo.mobile'=>'"'.$this->request->data['contact_mobile'].'"', 
//                                                    'Contactpersoninfo.purpose'=>'"'.$this->request->data['contact_purpose'].'"', 
//                                                    ),array('Contactpersoninfo.id'=>'"'.$this->request->data['id']));
//       
    
        $this->Contactpersoninfo->id=   $this->request->data['id'];
        $this->request->data['Contactpersoninfo']['email']=$this->request->data['contact_email'];
        $this->request->data['Contactpersoninfo']['remarks']=$this->request->data['contact_remark'];
        $this->request->data['Contactpersoninfo']['name']=$this->request->data['contact_name'];
        $this->request->data['Contactpersoninfo']['department']=$this->request->data['contact_department'];
        $this->request->data['Contactpersoninfo']['phone']=$this->request->data['contact_phone'];
        $this->request->data['Contactpersoninfo']['position']=$this->request->data['contact_position'];
        $this->request->data['Contactpersoninfo']['mobile']=$this->request->data['contact_mobile'];
        $this->request->data['Contactpersoninfo']['purpose']=$this->request->data['contact_purpose'];
        $this->request->data['Contactpersoninfo']['customer_id']=$this->request->data['customer_id'];
        $this->request->data['Contactpersoninfo']['tag_id']=$this->request->data['tag_id'];
        //$this->request->data['Contactpersoninfo']['serial_id']=$this->request->data['serial_id'];
        $this->request->data['Contactpersoninfo']['customergroup_id']=$this->request->data['group_id'];
        $this->request->data['Contactpersoninfo']['status']=1;
        
        if($this->Contactpersoninfo->save($this->request->data['Contactpersoninfo']))
        {
            $contact_last_id    =  $this->request->data['id'];
            echo $contact_last_id;
        }
        
        
    }
    
    public function contact_edit_add()
    {
        $this->autoRender=false;
        //$serial_id= $this->request->data['serial_id'];
        $project_name=$this->request->data['project_name'];
        
        $status=1;
        $this->request->data['Projectinfo']['project_id']=$serial_id;
        $this->request->data['Projectinfo']['customer_id']=$this->Session->read('customer_id');;
        $this->request->data['Projectinfo']['project_name']=$project_name;
        $this->request->data['Projectinfo']['project_status']=$status;
        $this->Projectinfo->save($this->request->data);
        $pro_id = $this->Projectinfo->getLastInsertID();
        return $pro_id+1;
    }
//    public function project_edit_update()
//    {
//        $this->autoRender=false;
//        $pro_id= $this->request->data['id'];
//        $this->loadModel('Projectinfo');
//        $projectinfo =  $this->Projectinfo->findById($pro_id);
//        echo $str = implode(',',$projectinfo['Projectinfo']);
//    }
    public function contact_edit_rule()
    {
        $this->autoRender=false;
        
        $con_id= $this->request->data['id'];
        $contact_name= $this->request->data['contact_name'];
        $contact_email= $this->request->data['contact_email'];
        $contact_department= $this->request->data['contact_department'];
        $contact_phone= $this->request->data['contact_phone'];
        $contact_position= $this->request->data['contact_position'];
        $contact_mobile= $this->request->data['contact_mobile'];
        $contact_purpose= $this->request->data['contact_purpose'];
        $contact_remark= $this->request->data['contact_remark'];
        
        $this->loadModel('Contactpersoninfo');
        
        $data = $this->Contactpersoninfo->updateAll(array('Contactpersoninfo.name'=>'"'.$contact_name.'"','Contactpersoninfo.email'=>'"'.$contact_email.'"','Contactpersoninfo.department'=>'"'.$contact_department.'"','Contactpersoninfo.phone'=>'"'.$contact_phone.'"','Contactpersoninfo.position'=>'"'.$contact_position.'"','Contactpersoninfo.mobile'=>'"'.$contact_mobile.'"','Contactpersoninfo.purpose'=>'"'.$contact_purpose.'"','Contactpersoninfo.remarks'=>'"'.$contact_remark.'"'),array('Contactpersoninfo.id'=>$con_id));
        
        //echo 'success';
    }
    public function instrument_map($id=NULL,$id1=NULL)
    {
        
        $this->set('approve',1);
        $user_role = $this->userrole_permission();
        $this->set('userrole_cus',$user_role['app_cusinstrument']);
        $this->set('userrole_edit',$user_role['instr_costing']);
        if($id!=NULL)
        {
            
           $customer_entry  =    $this->Customer->find('first',array('conditions'=>array('Customer.id'=>$id),'recursive'=>'3'));
           $instruments   =   $this->Instrument->find('list',array('conditions'=>array('Instrument.status'=>'1'),'order'=>'Instrument.id desc','fields'=>array('id','name')));
           $customer_instruments   =   $this->CustomerInstrument->find('all',array('conditions'=>array('CustomerInstrument.customer_id'=>$id),'order'=>'CustomerInstrument.id ASC'));
           $customer_instruments_map   =   $this->CustomerInstrument->find('first',array('conditions'=>array('CustomerInstrument.id'=>$id1),'order'=>'CustomerInstrument.id ASC'));
           //echo $customer_instruments_map['CustomerInstrument']['is_approved'];
           $this->set('id1','');
            if($customer_instruments_map)
            {
                if($customer_instruments_map['CustomerInstrument']['is_approved']==1)
                {
                    $this->set('approve',1);
                }
                else
                {
                    $this->set('approve',0);
                }
//                    //echo 'dfs2f';
//                 $this->set('id1','');
//                }
//                else
//                {
                    //echo 'dfsf';
                 $this->set('id1',$id1);
               // }
            }
           $this->set(compact('customer_entry','instruments','customer_instruments'));
        }
    }
    public function edit_instrument()
    {
        $this->autoRender=false;
        $device_id= $this->request->data['edit_device_id'];
        $edit_device_details    =   $this->CustomerInstrument->find('first',array('conditions'=>array('CustomerInstrument.id'=>$device_id)));
        if(!empty($edit_device_details ))
        {
                echo json_encode($edit_device_details);
        }
    }
    public function find_approved_or_not()
    {
        $this->autoRender=false;
        $device_id= $this->request->data['instrument_id'];
        $edit_device_details    =   $this->CustomerInstrument->find('count',array('conditions'=>array('CustomerInstrument.id'=>$device_id,'CustomerInstrument.is_approved'=>1)));
        return $edit_device_details;
    }
    public function get_range()
    {
        $this->layout   =   'ajax';
        $instrument_id  =   $this->request->data['instrument_id'];
        $instrument_range    =    $this->InstrumentRange->find('all',array('conditions'=>array('InstrumentRange.instrument_id'=>$instrument_id),'order'=>'InstrumentRange.id desc','contain'=>array('Range'=>array('fields'=>array('id','range_name')))));
        $this->set('ranges',$instrument_range);
        
    }
    public function get_price()
    {
        $this->autoRender=false;
        $price  =   $this->request->data['price'];
        $instrument_range    =    $this->InsPercent->find('first');
        $percent = $instrument_range['InsPercent']['percent'];
        return $price+$price*$percent/100;
    }
    
    public function get_disc()
    {
        $this->autoRender=false;
        $total  =   $this->request->data['total'];
        $instrument_range    =    $this->InsPercent->find('first');
        $percent = $instrument_range['InsPercent']['percent'];
        $di = $total+($total*$percent/100);
        $disc  =   $this->request->data['disc'];
        
        return $di-$disc;
    }
    public function add_customer_instrument()
    {
        $this->autoRender=false;
        $this->loadModel('CustomerInstrument');
        $instrument_id  =   $this->request->data['instrument_id'];
        $customer_id  =   $this->request->data['customer_id'];
        $range_id       =   $this->request->data['range_id'];
        $model_no       =   $this->request->data['model_no'];
        $cost       =   $this->request->data['cost'];
        $disc       =   $this->request->data['disc'];
        $total_price       =   $this->request->data['total_price'];
        if($cost=='')
        {
            $cost = 0;
        }
        if($disc=='')
        {
            $disc = 0;
        }
        if($total_price=='')
        {
            $total_price = 0;
        }
        
        $customer_instruments_count  = $this->CustomerInstrument->find('count',  array('conditions'=>array('CustomerInstrument.is_deleted'=>0,'CustomerInstrument.customer_id'=>$customer_id),'order'=>'CustomerInstrument.order_by DESC'));
        //pr($customer_instruments_count);exit;
        // When Order By is above '0'
        if($customer_instruments_count)
        {
            $customer_instruments_max  = $this->CustomerInstrument->find('first',  array('conditions'=>array('CustomerInstrument.is_deleted'=>0,'CustomerInstrument.customer_id'=>$customer_id),'order'=>'CustomerInstrument.order_by DESC'));    
            $order_by = $customer_instruments_max['CustomerInstrument']['order_by'];
            $customer_instruments  = $this->CustomerInstrument->find('all',  array('conditions'=>array('model_no'=>$model_no,'range_id'=>$range_id,'cost'=>$cost,'unit_price'=>$total_price, 'instrument_id'=>$instrument_id,'CustomerInstrument.is_deleted'=>0,'customer_id'=>$customer_id)));
        
            if(count($customer_instruments)==0){
            // Order By    
            $customer_id = $customer_instruments_max['CustomerInstrument']['customer_id'];
            $this->request->data['order_by'] = $order_by+1;
            //$this->request->data['CustomerInstrument']['cost'] = $this->request->data['cost'];
            $this->request->data['unit_price'] = $total_price;
            $this->request->data['contract_disc'] = $disc;
            //pr($this->request->data);exit;
            $data = $this->CustomerInstrument->save($this->request->data);
                if($data)
                {
                  $last_id  =    $this->CustomerInstrument->getLastInsertId();

                  /******************
                        * Log Activity For Approval Customer Instrument
                        */
                        $this->request->data['Logactivity']['logname'] = 'Costing';
                        $this->request->data['Logactivity']['logactivity'] = 'Add Costing';
                        $this->request->data['Logactivity']['logid'] = $last_id;
                        $this->request->data['Logactivity']['logno'] = $customer_id;
                        $this->request->data['Logactivity']['user_id'] = $this->Session->read('sess_userid');
                        $this->request->data['Logactivity']['logapprove'] = 1;

                        $a = $this->Logactivity->save($this->request->data['Logactivity']);

                    /******************/

                    /******************
                        * Data Log Activity Customer Instrument
                        */
                        $this->request->data['Datalog']['logname'] = 'Costing';
                        $this->request->data['Datalog']['logactivity'] = 'Add';
                        $this->request->data['Datalog']['logid'] = $last_id;
                        $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');

                        $a = $this->Datalog->save($this->request->data['Datalog']);

                    /******************/ 
                  if($last_id!='')
                  {
                      $last_data = $this->CustomerInstrument->find('first', array('conditions' => array('CustomerInstrument.id' => $last_id)));
                       if(!empty($last_data))
                       {
                          echo json_encode($last_data);
                       }
                    }
                }
            }
            else
            {
                return 0;
            }
        }
        // When Order By is '0'
        else
        {
            $customer_instruments  = $this->CustomerInstrument->find('all',  array('conditions'=>array('model_no'=>$model_no,'range_id'=>$range_id,'cost'=>$cost,'unit_price'=>$total_price, 'instrument_id'=>$instrument_id,'CustomerInstrument.is_deleted'=>0,'customer_id'=>$customer_id)));
            
            if(count($customer_instruments)==0)
            {
            // Order By    
            $customer_id = $customer_id;
            $this->request->data['order_by'] = 1;
            $this->request->data['contract_disc'] = $disc;
            $this->request->data['unit_price'] = $total_price;
            //pr($this->request->data);exit;
            $data = $this->CustomerInstrument->save($this->request->data);
                if($data)
                {
                  $last_id  =    $this->CustomerInstrument->getLastInsertId();

                  /******************
                        * Log Activity For Approval Customer Instrument
                        */
                        $this->request->data['Logactivity']['logname'] = 'Costing';
                        $this->request->data['Logactivity']['logactivity'] = 'Add Costing';
                        $this->request->data['Logactivity']['logid'] = $last_id;
                        $this->request->data['Logactivity']['logno'] = $customer_id;
                        $this->request->data['Logactivity']['user_id'] = $this->Session->read('sess_userid');
                        $this->request->data['Logactivity']['logapprove'] = 1;

                        $a = $this->Logactivity->save($this->request->data['Logactivity']);

                    /******************/

                    /******************
                        * Data Log Activity Customer Instrument
                        */
                        $this->request->data['Datalog']['logname'] = 'Costing';
                        $this->request->data['Datalog']['logactivity'] = 'Add';
                        $this->request->data['Datalog']['logid'] = $last_id;
                        $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');

                        $a = $this->Datalog->save($this->request->data['Datalog']);

                    /******************/ 
                  if($last_id!='')
                  {
                      $last_data = $this->CustomerInstrument->find('first', array('conditions' => array('CustomerInstrument.id' => $last_id)));
                       if(!empty($last_data))
                       {
                          echo json_encode($last_data);
                       }
                    }
                }
            }
            else
            {
                return 0;
            } 
        }
    }
    public function delete_cusinstrument()
    {
        $this->autoRender=  false;
        $delete_id  =   $this->request->data['device_id'];
        if($delete_id!='')
        {
            $delete_data    =   $this->CustomerInstrument->deleteAll(array('CustomerInstrument.id'=>$delete_id));
            
            if($delete_data)
            {
                echo 'deleted';
            }
        }
    }

    public function addregaddress()
    {
        
        $this->autoRender=false;
        $regaddress= $this->request->data['regaddress'];
        $customer_id=$this->request->data['customer_id'];
        $tag_id=$this->request->data['tag_id'];
        $status=0;
        $random =mt_rand();
        $this->request->data['Address']['customer_id']=$customer_id;
        $this->request->data['Address']['address_id']=$random;
        $this->request->data['Address']['address']=$regaddress;
        $this->request->data['Address']['type']='registered';
        $this->request->data['Address']['status']=$status;
        $this->request->data['Address']['tag_id']=$tag_id;
        $this->request->data['Address']['customergroup_id']=$this->request->data['group_id'];
        if($this->Address->save($this->request->data))
        {
            echo $random;
        }
    
    }
     public function editregaddress()
    {
        
        $this->autoRender=false;
        $regaddress= $this->request->data['regaddress'];
        $customer_id=$this->request->data['customer_id'];
        $tag_id=$this->request->data['tag_id'];
        $status=1;
        $random =mt_rand();
        $this->request->data['Address']['customer_id']=$customer_id;
        $this->request->data['Address']['address_id']=$random;
        $this->request->data['Address']['address']=$regaddress;
        $this->request->data['Address']['type']='registered';
        $this->request->data['Address']['status']=$status;
        $this->request->data['Address']['tag_id']=$tag_id;
        if($this->Address->save($this->request->data))
        {
            echo $random;
        }
    
    }
    
     public function deleteregaddress()
    {
        $this->autoRender=false;
        $delete_id= $this->request->data['delete_id'];
        if($this->Address->deleteAll(array('Address.address_id'=>$delete_id)))
        {
            echo "deleted";
        }
    }
    
    public function addbilladdress()
    {
        
        $this->autoRender=false;
        $billaddress= $this->request->data['billaddress'];
        $customer_id=$this->request->data['customer_id'];
        $tag_id=$this->request->data['tag_id'];
        $status=0;
        $random =mt_rand();
        $this->request->data['Address']['customer_id']=$customer_id;
        $this->request->data['Address']['address_id']=$random;
        $this->request->data['Address']['address']=$billaddress;
        $this->request->data['Address']['type']='billing';
        $this->request->data['Address']['status']=$status;
        $this->request->data['Address']['tag_id']=$tag_id;
        $this->request->data['Address']['customergroup_id']=$this->request->data['group_id'];
        if($this->Address->save($this->request->data))
        {
            echo $random;
        }
    
    }
     public function editbilladdress()
    {
        
        $this->autoRender=false;
        $billaddress= $this->request->data['billaddress'];
        $customer_id=$this->request->data['customer_id'];
        $tag_id=$this->request->data['tag_id'];
        $status=1;
        $random =mt_rand();
        $this->request->data['Address']['customer_id']=$customer_id;
        $this->request->data['Address']['address_id']=$random;
        $this->request->data['Address']['address']=$billaddress;
        $this->request->data['Address']['type']='billing';
        $this->request->data['Address']['status']=$status;
        $this->request->data['Address']['tag_id']=$tag_id;
        if($this->Address->save($this->request->data))
        {
            echo $random;
        }
    
    }
    
     public function deletebilladdress()
    {
        $this->autoRender=false;
        $delete_id= $this->request->data['delete_id'];
        if($this->Address->deleteAll(array('Address.address_id'=>$delete_id)))
        {
            echo "deleted";
        }
    }
    
    public function adddeliveryaddress()
    {
        
        $this->autoRender=false;
        $deliveryaddress= $this->request->data['deliveryaddress'];
        $customer_id=$this->request->data['customer_id'];
        $random =mt_rand();
        $this->request->data['Address']['customer_id']=$customer_id;
        $this->request->data['Address']['address_id']=$random;
        $this->request->data['Address']['address']=$deliveryaddress;
        $this->request->data['Address']['type']='delivery';
        $this->request->data['Address']['status']=0;
        $this->request->data['Address']['tag_id']=$this->request->data['tag_id'];
        $this->request->data['Address']['customergroup_id']=$this->request->data['group_id'];
        if($this->Address->save($this->request->data))
        {
            echo $random;
        }
    
    }
    public function editdeliveryaddress()
    {
        $this->autoRender=false;
        $deliveryaddress= $this->request->data['deliveryaddress'];
        $customer_id=$this->request->data['customer_id'];
        $tag_id=$this->request->data['tag_id'];
        $status=1;
        $random =mt_rand();
        $this->request->data['Address']['customer_id']=$customer_id;
        $this->request->data['Address']['address_id']=$random;
        $this->request->data['Address']['address']=$deliveryaddress;
        $this->request->data['Address']['type']='delivery';
        $this->request->data['Address']['status']=$status;
         $this->request->data['Address']['tag_id']=$tag_id;
        if($this->Address->save($this->request->data))
        {
            echo $random;
        }
    
    }
    
     public function deletedeliveryaddress()
    {
        $this->autoRender=false;
        $delete_id= $this->request->data['delete_id'];
        if($this->Address->deleteAll(array('Address.address_id'=>$delete_id)))
        {
            echo "deleted";
        }
    }
    
    public function addprojectinfo()
    {
        $this->autoRender=false;
        $projectname= $this->request->data['projectname'];
        $customer_id=$this->request->data['customer_id'];
        $status=0;
        $random =mt_rand();
        $this->request->data['Projectinfo']['customer_id']=$customer_id;
        $this->request->data['Projectinfo']['project_id']=$random;
        $this->request->data['Projectinfo']['project_name']=$projectname;
        $this->request->data['Projectinfo']['project_status']=$status;
        if($this->Projectinfo->save($this->request->data))
        {
            echo $random;
        }
    }
    public function editprojectinfo()
    {
        
        $this->autoRender=false;
        $projectname= $this->request->data['projectname'];
        $customer_id=$this->request->data['customer_id'];
        $status=1;
        $random =mt_rand();
        $this->request->data['Projectinfo']['customer_id']=$customer_id;
        $this->request->data['Projectinfo']['project_id']=$random;
        $this->request->data['Projectinfo']['project_name']=$projectname;
        $this->request->data['Projectinfo']['project_status']=$status;
        if($this->Projectinfo->save($this->request->data))
        {
            echo $random;
        }
    
    }
    
    public function deleteprojectinfo()
    {
        $this->autoRender=false;
        $delete_id= $this->request->data['delete_id'];
        if($this->Projectinfo->deleteAll(array('Projectinfo.project_id'=>$delete_id)))
        {
            echo "deleted";
        }
    }
    public function update_instrument()
    {
        $this->autoRender = false;
        $this->loadModel('Device');
        $this->CustomerInstrument->id = $this->request->data['device_id'];
        $this->request->data['CustomerInstrument']['instrument_id'] = $this->request->data['instrument_id'];
        $this->request->data['CustomerInstrument']['instrument_name'] = $this->request->data['instrument_name'];
        $this->request->data['CustomerInstrument']['model_no'] = $this->request->data['model_no'];
        $this->request->data['CustomerInstrument']['range_id'] = $this->request->data['range_id'];
        $this->request->data['CustomerInstrument']['cost'] = $this->request->data['cost'];
        $this->request->data['CustomerInstrument']['unit_price'] = $this->request->data['total_price'];
         $this->request->data['CustomerInstrument']['contract_disc'] = $this->request->data['disc'];
        $this->request->data['CustomerInstrument']['status'] = $this->request->data['status'];
        if ($this->CustomerInstrument->save($this->request->data)) 
        {
            $device_details =   $this->CustomerInstrument->find('first',array('conditions'=>array('CustomerInstrument.id'=>$this->request->data['device_id'])));
            echo json_encode($device_details);
           
        }
    }
    
    public function approve()
    {
        $this->autoRender=false;
        $id =  $this->request->data['id'];
        $user_id = $this->Session->read('sess_userid');
        $this->Customer->updateAll(array('Customer.is_approved'=>1,'Customer.is_approved_date'=>'"'.date('Y-m-d').'"','Customer.is_approved_by'=>$user_id),array('Customer.id'=>$id));
        $this->Logactivity->updateAll(array('Logactivity.logapprove'=>2,'Logactivity.approved_by'=>$user_id),array('Logactivity.logid'=>$id,'Logactivity.logactivity'=>'Add Customer'));
        $details=$this->Customer->find('first',array('conditions'=>array('Customer.id'=>$id)));
        //$this->xml_tally($id);
    }
    public function xml_tally($id = NULL)
    {
        $this->autoRender=false;
        $customer_details =  $this->Customer->find('first',array('conditions'=>array('Customer.id'=>$id,'Customer.status'=>1,'Customer.is_deleted'=>0))); 
        //pr($customer_details['Customer']['customername']);
        //exit;
    $strXML = "<ENVELOPE>
    <HEADER>
    <TALLYREQUEST>Import Data</TALLYREQUEST>
    </HEADER>
    <BODY>
    <IMPORTDATA>
    <REQUESTDESC>
    <REPORTNAME>Vouchers</REPORTNAME>
    <STATICVARIABLES>
     <SVCURRENTCOMPANY>BS TECH PTE LTD</SVCURRENTCOMPANY>
    </STATICVARIABLES>
    </REQUESTDESC>
    <REQUESTDATA>
    <TALLYMESSAGE xmlns:UDF='TallyUDF'>
     <LEDGER NAME='".$customer_details['Customer']['customername']."' RESERVEDNAME=''>
      <ADDRESS.LIST TYPE='String'>
       <ADDRESS>".$customer_details['Address'][0]['address']."</ADDRESS>
      </ADDRESS.LIST>
      <MAILINGNAME.LIST TYPE='String'>
       <MAILINGNAME>".$customer_details['Customer']['customername']."</MAILINGNAME>
      </MAILINGNAME.LIST>
      <OLDAUDITENTRYIDS.LIST TYPE='Number'>
       <OLDAUDITENTRYIDS>-2</OLDAUDITENTRYIDS>
      </OLDAUDITENTRYIDS.LIST>
      <CURRENCYNAME>S$</CURRENCYNAME>
      <PARENT>Sundry Debtors</PARENT>
      <TAXCLASSIFICATIONNAME/>
      <TAXTYPE>Others</TAXTYPE>
      <BILLCREDITPERIOD>".$customer_details['Paymentterm']['paymentterm']." ".$customer_details['Paymentterm']['paymenttype']."</BILLCREDITPERIOD>
      <GSTTYPE/>
      <APPROPRIATEFOR/>
      <SERVICECATEGORY/>
      <EXCISELEDGERCLASSIFICATION/>
      <EXCISEDUTYTYPE/>
      <EXCISENATUREOFPURCHASE/>
      <LEDGERFBTCATEGORY/>
      <ISBILLWISEON>Yes</ISBILLWISEON>
      <ISCOSTCENTRESON>No</ISCOSTCENTRESON>
      <ISINTERESTON>No</ISINTERESTON>
      <ALLOWINMOBILE>No</ALLOWINMOBILE>
      <ISCOSTTRACKINGON>No</ISCOSTTRACKINGON>
      <ISCONDENSED>No</ISCONDENSED>
      <AFFECTSSTOCK>No</AFFECTSSTOCK>
      <FORPAYROLL>No</FORPAYROLL>
      <ISABCENABLED>No</ISABCENABLED>
      <INTERESTONBILLWISE>No</INTERESTONBILLWISE>
      <OVERRIDEINTEREST>No</OVERRIDEINTEREST>
      <OVERRIDEADVINTEREST>No</OVERRIDEADVINTEREST>
      <USEFORVAT>No</USEFORVAT>
      <IGNORETDSEXEMPT>No</IGNORETDSEXEMPT>
      <ISTCSAPPLICABLE>No</ISTCSAPPLICABLE>
      <ISTDSAPPLICABLE>No</ISTDSAPPLICABLE>
      <ISFBTAPPLICABLE>No</ISFBTAPPLICABLE>
      <ISGSTAPPLICABLE>No</ISGSTAPPLICABLE>
      <ISEXCISEAPPLICABLE>No</ISEXCISEAPPLICABLE>
      <ISTDSEXPENSE>No</ISTDSEXPENSE>
      <ISEDLIAPPLICABLE>No</ISEDLIAPPLICABLE>
      <ISRELATEDPARTY>No</ISRELATEDPARTY>
      <USEFORESIELIGIBILITY>No</USEFORESIELIGIBILITY>
      <SHOWINPAYSLIP>No</SHOWINPAYSLIP>
      <USEFORGRATUITY>No</USEFORGRATUITY>
      <ISTDSPROJECTED>No</ISTDSPROJECTED>
      <FORSERVICETAX>No</FORSERVICETAX>
      <ISINPUTCREDIT>No</ISINPUTCREDIT>
      <ISEXEMPTED>No</ISEXEMPTED>
      <ISABATEMENTAPPLICABLE>No</ISABATEMENTAPPLICABLE>
      <ISSTXPARTY>No</ISSTXPARTY>
      <ISSTXNONREALIZEDTYPE>No</ISSTXNONREALIZEDTYPE>
      <TDSDEDUCTEEISSPECIALRATE>No</TDSDEDUCTEEISSPECIALRATE>
      <AUDITED>No</AUDITED>
      <SORTPOSITION> 1000</SORTPOSITION>
      <LANGUAGENAME.LIST>
       <NAME.LIST TYPE='String'>
        <NAME>".$customer_details['Customer']['customername']."</NAME>
       </NAME.LIST>
       <LANGUAGEID> 1033</LANGUAGEID>
      </LANGUAGENAME.LIST>
      <XBRLDETAIL.LIST>      </XBRLDETAIL.LIST>
      <AUDITDETAILS.LIST>      </AUDITDETAILS.LIST>
      <SCHVIDETAILS.LIST>      </SCHVIDETAILS.LIST>
      <SLABPERIOD.LIST>      </SLABPERIOD.LIST>
      <GRATUITYPERIOD.LIST>      </GRATUITYPERIOD.LIST>
      <ADDITIONALCOMPUTATIONS.LIST>      </ADDITIONALCOMPUTATIONS.LIST>
      <BANKALLOCATIONS.LIST>      </BANKALLOCATIONS.LIST>
      <PAYMENTDETAILS.LIST>      </PAYMENTDETAILS.LIST>
      <BANKEXPORTFORMATS.LIST>      </BANKEXPORTFORMATS.LIST>
      <BILLALLOCATIONS.LIST>      </BILLALLOCATIONS.LIST>
      <INTERESTCOLLECTION.LIST>      </INTERESTCOLLECTION.LIST>
      <LEDGERCLOSINGVALUES.LIST>      </LEDGERCLOSINGVALUES.LIST>
      <LEDGERAUDITCLASS.LIST>      </LEDGERAUDITCLASS.LIST>
      <OLDAUDITENTRIES.LIST>      </OLDAUDITENTRIES.LIST>
      <TDSEXEMPTIONRULES.LIST>      </TDSEXEMPTIONRULES.LIST>
      <DEDUCTINSAMEVCHRULES.LIST>      </DEDUCTINSAMEVCHRULES.LIST>
      <LOWERDEDUCTION.LIST>      </LOWERDEDUCTION.LIST>
      <STXABATEMENTDETAILS.LIST>      </STXABATEMENTDETAILS.LIST>
      <LEDMULTIADDRESSLIST.LIST>      </LEDMULTIADDRESSLIST.LIST>
      <STXTAXDETAILS.LIST>      </STXTAXDETAILS.LIST>
      <CHEQUERANGE.LIST>      </CHEQUERANGE.LIST>
      <DEFAULTVCHCHEQUEDETAILS.LIST>      </DEFAULTVCHCHEQUEDETAILS.LIST>
      <ACCOUNTAUDITENTRIES.LIST>      </ACCOUNTAUDITENTRIES.LIST>
      <AUDITENTRIES.LIST>      </AUDITENTRIES.LIST>
      <BRSIMPORTEDINFO.LIST>      </BRSIMPORTEDINFO.LIST>
      <AUTOBRSCONFIGS.LIST>      </AUTOBRSCONFIGS.LIST>
      <BANKURENTRIES.LIST>      </BANKURENTRIES.LIST>
      <DEFAULTCHEQUEDETAILS.LIST>      </DEFAULTCHEQUEDETAILS.LIST>
      <DEFAULTOPENINGCHEQUEDETAILS.LIST>      </DEFAULTOPENINGCHEQUEDETAILS.LIST>
     </LEDGER>
    </TALLYMESSAGE>
    </REQUESTDATA>
    </IMPORTDATA>
    </BODY>
    </ENVELOPE>";

    $server = "http://203.175.170.64:8000/";
    //$server = "http://localhost:9002/";
    $headers = array( "Content-type: text/xml" ,"Content-length: ".strlen($strXML) ,"Connection: close" );

    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_URL,$server);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 20);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $strXML);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $server_output = curl_exec($ch);
    echo $server_output;

//
//    if(curl_errno($ch)){
//        echo curl_error($ch);
//        echo " $server  something went wrong..... try later ";
//        //if($_GET[counter]==$_GET[total])
//        //echo 'done###';
//    }else{
//		echo $server_output;
//        curl_close($ch);
//    }
    }
    public function instrument_search()
    {
        $this->autoRender = false;
        $name =  $this->request->data['name'];
        $data = $this->Instrument_copy->find('all',array('conditions'=>array('Instrument_copy.name LIKE'=>'%'.$name.'%','Instrument_copy.is_deleted'=>0,'Instrument_copy.is_approved'=>1)));
        $c = count($data);
        //echo $c; 
            if($c>0)
            {
                for($i = 0; $i<$c;$i++)
                { 
                    echo "<div class='customer_instrument_show' align='left' id='".$data[$i]['Instrument_copy']['id']."'>";
                    echo $data[$i]['Instrument_copy']['name'];
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
    
    public function approve_ins_cus()
    {
        $this->autoRender = false;
        $id =  $this->request->data['device_id'];
        $user_id = $this->Session->read('sess_userid');
        $this->CustomerInstrument->updateAll(array('CustomerInstrument.is_approved'=>1,'CustomerInstrument.is_approved_date'=>'"'.date('Y-m-d').'"','CustomerInstrument.is_approved_by'=>$user_id),array('CustomerInstrument.id'=>$id));
        $this->Logactivity->updateAll(array('Logactivity.logapprove'=>2,'Logactivity.approved_by'=>$user_id),array('Logactivity.logid'=>$id,'Logactivity.logactivity'=>'Add Costing','Logactivity.logname'=>'Costing'));
    }
    

}
