<?php
/*
 * Document     :   CustomertaglistsController.php
 * Controller   :   Taglists 
 * Model        :   Customertaglist 
 * Created By   :   M.Iyappan Samsys
 */
class CustomertaglistsController extends AppController   
{
    public $helpers = array('Html','Form','Session');
    public $uses = array('Contactpersoninfo','Billingaddress','Deliveryaddress','Projectinfo',
                        'Customer','Address','Salesperson','Referedby','CusSalesperson','CusReferby',
                        'Industry','Location','Paymentterm','Instrument','InstrumentRange','CustomerInstrument',
                        'Deliveryordertype','InvoiceType','Priority');
    public function index($id=NULL)
    {
        /*******************************************************
         *  BS V1.0
         *  User Role Customertaglist
         *  Controller : Procedures
         *  Permission : view 
        *******************************************************/
        $user_role = $this->userrole_permission();
        if($user_role['other_role']['view'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        /*
         * *****************************************************
         */
        $this->set('customer_id',$id);
        $maintag_data = $this->Customer->find('first',array('conditions'=>array('Customer.status'=>1,'Customer.id'=>$id,'is_deleted'=>0),'fields'=>array('customergroup_id')));
        if(!empty($maintag_data))
        {
            $taglist_data = $this->Customer->find('all',array('conditions'=>array('Customer.status'=>1,'customergroup_id'=>$maintag_data['Customer']['customergroup_id'],'is_deleted'=>0),'order' => array('Customer.id' => 'DESC'),'recursive'=>'2'));
            $this->set('taglists', $taglist_data);
        }
    }
    
    public function add($id=NULL)
    {
      
        /*******************************************************
         *  BS V1.0
         *  User Role Permission
         *  Controller : Procedures
         *  Permission : add 
         *  Description   :   add Procedures Details page
         *******************************************************/
        
        if($this->Session->read('customer_id')=='')
        {
            $d=date ("d"); $m=date ("m"); $y=date ("Y"); $t=time();
            $dmt='CUS'.($d+$m+$y+$t);
            $tag='TAG'.($d+$m+$y+$t);
            $this->Session->write('tag_id',$tag);
            $this->Session->write('customer_id',$dmt);
        }
        $this->set('customer_id',$this->Session->read('customer_id'));
        $this->set('tag_id',$this->Session->read('tag_id'));
        
        $tag_customer_details   =   $this->Customer->find('first',array('conditions'=>array('Customer.id'=>$id)));
        $salesperson = $this->Salesperson->find('list', array('fields' => 'salesperson'));
        $referedby = $this->Referedby->find('list', array('fields' => 'referedby'));
        $this->set('group_id',$tag_customer_details['Customer']['customergroup_id']);
       
        $data10 = $this->Address->find('all',array('conditions'=>array('customer_id'=>$this->Session->read('customer_id'),'status'=>0,'type'=>'registered')));
        $data10_count = $this->Address->find('count',array('conditions'=>array('customer_id'=>$this->Session->read('customer_id'),'status'=>0,'type'=>'registered')));
        
        $data11 = $this->Address->find('all',array('conditions'=>array('customer_id'=>$this->Session->read('customer_id'),'status'=>0,'type'=>'billing')));
        $data11_count = $this->Address->find('count',array('conditions'=>array('customer_id'=>$this->Session->read('customer_id'),'status'=>0,'type'=>'billing')));
       
        $data12 = $this->Address->find('all',array('conditions'=>array('customer_id'=>$this->Session->read('customer_id'),'status'=>0,'type'=>'delivery')));
        $data12_count = $this->Address->find('count',array('conditions'=>array('customer_id'=>$this->Session->read('customer_id'),'status'=>0,'type'=>'delivery')));
       
        $data13 = $this->Projectinfo->find('all',array('conditions'=>array('customer_id'=>$this->Session->read('customer_id'),'project_status'=>0)));
        $data13_count = $this->Projectinfo->find('count',array('conditions'=>array('customer_id'=>$this->Session->read('customer_id'),'project_status'=>0)));
        
        $industry = $this->Industry->find('list', array('fields' => 'industryname'));
        $deliverorder_type = $this->Deliveryordertype->find('list', array('fields' => array('id','delivery_order_type')));
        
        $invoice_types = $this->InvoiceType->find('list', array('fields' => array('id','type_invoice')));
        $location = $this->Location->find('list', array('fields' => 'locationname'));
        
        $paymentterm = $this->Paymentterm->find('list', array('fields' => array('id','pay')));
        $priority = $this->Priority->find('list', array('fields' => 'priority'));
       
        $userrole = $this->Userrole->find('list', array('fields' => 'user_role'));
        $this->set(compact('salesperson','referedby','data10','data10_count','data11',
                            'data11_count','data12','data12_count','data13','data13_count',
                            'industry','deliverorder_type','invoice_types','location',
                            'paymentterm','userrole','priority','tag_customer_details'));
     

        if($this->request->is('post'))
        {
           // $this->request->data['paymentterm_id'] = $this->request->data['val_paymentterms_chosen'];
            $this->request->data['status'] = 1;
            $refer_array = $this->request->data['referedbies_id'];
            $sales_array = $this->request->data['salesperson_id'];
            $cust_id  =   $this->request->data['id'];
            $tag_id  =   $this->request->data['tag_id'];
            $group_id  =   $this->request->data['customergroup_id'];
            
            $this->request->data['is_default']  =   0;
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
                $contactperson = $this->Contactpersoninfo->find('count', array('conditions' => array('Contactpersoninfo.customer_id' =>$id )));
                $address = $this->Address->find('count', array('conditions' => array('Address.customer_id' => $id)));
                if ($contactperson > 0) 
                {
                    $this->Contactpersoninfo->updateAll(array('Contactpersoninfo.status' => 1), array('Contactpersoninfo.customer_id' => $id));
                }
                if($address>0)
                {
                    $this->Address->updateAll(array('Address.status'=>1),array('Address.customer_id'=>$id));
                }
                
                $this->Session->setFlash(__('Customer Tag has been Added Successfully'));
                $this->Session->delete('tag_id');
                return $this->redirect(array('controller'=>'Customertaglists','action'=>'index',$id));
                
            }
            $this->Session->setFlash(__('Customer Could Not be Added'));
        }
       
    }
    public function edit($id = NULL)
    {
         /*******************************************************
         *  BS V1.0
         *  User Role Permission
         *  Controller : Procedures
         *  Permission : Edit 
         *  Description   :   Edit Procedures Details page
         *******************************************************/
        $user_role = $this->userrole_permission();
        if($user_role['other_role']['add'] ==0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        /*
         * *****************************************************
         */
        
        if($this->Session->read('customer_id')==''){ $this->Session->write('customer_id',$id);  }
        $this->set('customer_id',$this->Session->read('customer_id'));
        
        $salesperson = $this->Salesperson->find('list', array('fields' => 'salesperson'));
        $referedby = $this->Referedby->find('list', array('fields' => 'referedby'));
        $this->set(compact('salesperson','referedby'));
        $data10 = $this->Address->find('all',array('conditions'=>array('customer_id'=>$this->Session->read('customer_id'),'status'=>1,'type'=>'registered')));
        $data10_count = $this->Address->find('count',array('conditions'=>array('customer_id'=>$this->Session->read('customer_id'),'status'=>1,'type'=>'registered')));
        $this->set('data10',$data10);
        $this->set('data10_count',$data10_count);
        
        $data11 = $this->Address->find('all',array('conditions'=>array('customer_id'=>$this->Session->read('customer_id'),'status'=>1,'type'=>'billing')));
        $data11_count = $this->Address->find('count',array('conditions'=>array('customer_id'=>$this->Session->read('customer_id'),'status'=>1,'type'=>'billing')));
        $this->set('data11',$data11);
        $this->set('data11_count',$data11_count);
        
        $data12 = $this->Address->find('all',array('conditions'=>array('customer_id'=>$this->Session->read('customer_id'),'status'=>1,'type'=>'delivery')));
        $data12_count = $this->Address->find('count',array('conditions'=>array('customer_id'=>$this->Session->read('customer_id'),'status'=>1,'type'=>'delivery')));
        $this->set('data12',$data12);
        $this->set('data12_count',$data12_count);
        
        $data13 = $this->Projectinfo->find('all',array('conditions'=>array('customer_id'=>$this->Session->read('customer_id'),'project_status'=>1)));
        $data13_count = $this->Projectinfo->find('count',array('conditions'=>array('customer_id'=>$this->Session->read('customer_id'),'project_status'=>1)));
        $this->set('data13',$data13);
        $this->set('data13_count',$data13_count);
        
        $invoice_types = $this->InvoiceType->find('list', array('fields' => array('id','type_invoice')));
        $this->set('invoice_types',$invoice_types);
        
        $data2 = $this->Industry->find('list', array('fields' => 'industryname'));
        $this->set('industry',$data2);
        
        $data3 = $this->Location->find('list', array('fields' => 'locationname'));
        $this->set('location',$data3);
        
        $deliverorder_type = $this->Deliveryordertype->find('list', array('fields' => array('id','delivery_order_type')));
        $this->set(compact('deliverorder_type'));

        $data5 = $this->Paymentterm->find('list', array('fields' => array('id','pay')));;
        $this->set('paymentterm',$data5);

        $this->loadModel('Priority');
        $data6 = $this->Priority->find('list', array('fields' => 'priority'));
        $this->set('priority', $data6);

        $this->loadModel('Userrole');
        $data = $this->Userrole->find('list', array('fields' => 'user_role'));
        $this->set('userrole', $data);

        // Model For the Tab Edit Contact Info

        $this->loadModel('Contactpersoninfo');
        $data = $this->Contactpersoninfo->find('all', array('conditions' => array('Contactpersoninfo.status' => 1, 'Contactpersoninfo.customer_id' => $id), 'order' => array('Contactpersoninfo.id' => 'DESC')));
        
        $this->set('contactpersoninfo', $data);
        if(empty($id))
        {
             $this->Session->setFlash(__('Invalid Customer Entry'));
             return $this->redirect(array('action'=>'edit'));
        }
        $customer_details = $this->Customer->find('first',array('conditions'=>array('Customer.status'=>1,'Customer.id'=>$id,'is_deleted'=>0),'order' => array('Customer.id' => 'DESC'),'recursive'=>'2'));
       
        if(empty($customer_details))
        {
           $this->Session->setFlash(__('Invalid Customer'));
             return $this->redirect(array('action'=>'edit'));
        }
        
        if($this->request->is(array('post','put')))
        {
           
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
                
               $project= $this->Projectinfo->find('count',array('conditions'=>array('Projectinfo.customer_id'=>$this->Session->read('customer_id'))));
               $contactperson= $this->Contactpersoninfo->find('count',array('conditions'=>array('Contactpersoninfo.customer_id'=>$this->Session->read('customer_id'))));
               $address= $this->Address->find('count',array('conditions'=>array('Address.customer_id'=>$this->Session->read('customer_id'))));
                if($contactperson>0)
                {
                    $this->Contactpersoninfo->updateAll(array('Contactpersoninfo.status'=>1),array('Contactpersoninfo.customer_id'=>$this->Session->read('customer_id')));
                }
                if($address>0)
                {
                     $this->Address->updateAll(array('Address.status'=>1),array('Address.customer_id'=>$this->Session->read('customer_id')));
                }
                if($project>0)
                {
                    $this->Projectinfo->updateAll(array('Projectinfo.project_status'=>1),array('Projectinfo.customer_id'=>$this->Session->read('customer_id')));
                }
               $this->Session->setFlash(__('Customer Taglist has been Updated'));
               return $this->redirect(array('controller'=>'Customertaglists','action'=>'index',$id));
               $this->Session->delete('customer_id');
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
      
        $this->autoRender=false;
        if($this->Customer->updateAll(array('Customer.is_deleted'=>1,'Customer.status'=>0),array('Customer.id'=>$id)))
        {
            $this->Session->setFlash(__('Customer has been deleted'));
            return $this->redirect(array('action'=>'index',$id));
        }
    }
   
     public function tag_contact_person_add()
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
        $this->request->data['Contactpersoninfo']['customergroup_id']=$this->request->data['group_id'];
        $this->request->data['Contactpersoninfo']['status']=0;
        if($this->Contactpersoninfo->save($this->request->data))
        {
            echo "success";
        }
    }
    public function contact_delete()
    {
        $this->autoRender=false;
        $delete_id= $this->request->data['delete_id'];
        if($this->Contactpersoninfo->deleteAll(array('Contactpersoninfo.tag_id'=>$delete_id)))
        {
            echo "deleted";
        }
    }
}
