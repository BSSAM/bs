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
                        'Deliveryordertype','InvoiceType');
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
        $taglist_data = $this->Customer->find('all');
        
        $this->set('taglists', $taglist_data);
        
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
            $d=date ("d");
            $m=date ("m");
            $y=date ("Y");
            $t=time();
            $dmt='CUS'.($d+$m+$y+$t);
            $this->Session->write('customer_id',$dmt);
        }
        $this->set('customer_id',$this->Session->read('customer_id'));
       
        $data = $this->Salesperson->find('list', array('fields' => 'salesperson'));
        $this->set('salesperson',$data);
        
        $data1 = $this->Referedby->find('list', array('fields' => 'referedby'));
        $this->set('referedby',$data1);
        
        $data10 = $this->Address->find('all',array('conditions'=>array('customer_id'=>$this->Session->read('customer_id'),'status'=>0,'type'=>'registered')));
        $data10_count = $this->Address->find('count',array('conditions'=>array('customer_id'=>$this->Session->read('customer_id'),'status'=>0,'type'=>'registered')));
        
        $this->set('data10',$data10);
        $this->set('data10_count',$data10_count);
        
       
        $data11 = $this->Address->find('all',array('conditions'=>array('customer_id'=>$this->Session->read('customer_id'),'status'=>0,'type'=>'billing')));
        $data11_count = $this->Address->find('count',array('conditions'=>array('customer_id'=>$this->Session->read('customer_id'),'status'=>0,'type'=>'billing')));
        //pr($data10);pr($data10_count);exit;
        $this->set('data11',$data11);
        $this->set('data11_count',$data11_count);
        
        $data12 = $this->Address->find('all',array('conditions'=>array('customer_id'=>$this->Session->read('customer_id'),'status'=>0,'type'=>'delivery')));
        $data12_count = $this->Address->find('count',array('conditions'=>array('customer_id'=>$this->Session->read('customer_id'),'status'=>0,'type'=>'delivery')));
        //pr($data10);pr($data10_count);exit;
        $this->set('data12',$data12);
        $this->set('data12_count',$data12_count);
        
        $data13 = $this->Projectinfo->find('all',array('conditions'=>array('customer_id'=>$this->Session->read('customer_id'),'project_status'=>0)));
        $data13_count = $this->Projectinfo->find('count',array('conditions'=>array('customer_id'=>$this->Session->read('customer_id'),'project_status'=>0)));
        //pr($data10);pr($data10_count);exit;
        $this->set('data13',$data13);
        $this->set('data13_count',$data13_count);
        
        $this->loadModel('Industry');
        $data2 = $this->Industry->find('list', array('fields' => 'industryname'));
        $this->set('industry',$data2);
        
        $deliverorder_type = $this->Deliveryordertype->find('list', array('fields' => array('id','delivery_order_type')));
        $invoice_types = $this->InvoiceType->find('list', array('fields' => array('id','type_invoice')));
        
        $this->set(compact('deliverorder_type','invoice_types'));
        
        $this->loadModel('Location');
        $data3 = $this->Location->find('list', array('fields' => 'locationname'));
        $this->set('location',$data3);
        
        $this->loadModel('Paymentterm');
        
        $data5 = $this->Paymentterm->find('list', array('fields' => array('id','pay')));;
     
        $this->set('paymentterm',$data5);
        
        $this->loadModel('Priority');
        $data6 = $this->Priority->find('list', array('fields' => 'priority'));
        $this->set('priority', $data6);

        $this->loadModel('Userrole');
        $data = $this->Userrole->find('list', array('fields' => 'user_role'));
        $this->set('userrole', $data);

        if($this->request->is('post'))
        {
           
           // $this->request->data['paymentterm_id'] = $this->request->data['val_paymentterms_chosen'];
            $this->request->data['status'] = 1;
            $refer_array = $this->request->data['referedbies_id'];
            $sales_array = $this->request->data['salesperson_id'];
            $cust_id  =   $this->request->data['id'];
            if(!empty($sales_array))
            {
                foreach($sales_array as $key=>$value)
                {
                    $this->CusSalesperson->create();
                    $per_data = array('customer_id' =>$cust_id, 'salespeople_id' => $value);
                    $this->CusSalesperson->save($per_data);
                }
            }
            if(!empty($refer_array))
            {
                foreach($refer_array as $key=>$value)
                {
                    $this->CusReferby->create();
                    $ref_data = array('customer_id' =>$cust_id, 'referedby_id' => $value);
                    $this->CusReferby->save($ref_data);
                }
            }
            unset($this->request->data['Customer']);
            unset($this->request->data['salesperson_id']);
            unset($this->request->data['referedbies_id']);
             
            $match1 = $this->request->data['customername'];
            $data1 = $this->Customer->findByCustomername($match1);
           
            if(!empty($data1))
            {
                $this->Session->setFlash(__('Customer Name Already Exist'));
                return $this->redirect(array('action'=>'add'));
            }
            
            if($this->Customer->save($this->request->data))
            {
                //pr($this->request->data);exit;
                $project = $this->Projectinfo->find('count', array('conditions' => array('Projectinfo.customer_id' => $this->Session->read('customer_id'))));
                $contactperson = $this->Contactpersoninfo->find('count', array('conditions' => array('Contactpersoninfo.customer_id' => $this->Session->read('customer_id'))));
                $address = $this->Address->find('count', array('conditions' => array('Address.customer_id' => $this->Session->read('customer_id'))));
                if ($contactperson > 0) {
                    $this->Contactpersoninfo->updateAll(array('Contactpersoninfo.status' => 1), array('Contactpersoninfo.customer_id' => $this->Session->read('customer_id')));
                }
                if($address>0)
                {
                    $this->Address->updateAll(array('Address.status'=>1),array('Address.customer_id'=>$this->Session->read('customer_id')));
                }
                if($project>0)
                {
                    $this->Projectinfo->updateAll(array('Projectinfo.project_status'=>1),array('Projectinfo.customer_id'=>$this->Session->read('customer_id')));
                }
                $this->Session->setFlash(__('Customer has been Added Successfully'));
                return $this->redirect(array('action'=>'index'));
                $this->Session->delete('customer_id');
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
//        $data4 = $this->Paymentterm->find('list', array('fields' => 'paymentterm'));
//         //pr($data4);exit;
//        $data5 = $this->Paymentterm->find('list', array('fields' => 'paymenttype'));
//          
//        
//        
//        $array3 = '';
//        $i = 0 ; 
//        $array3 = array();
//        //pr($data4);pr($data5);exit;
//        count($data4);
//        for($i=1;$i<=count($data4);$i++)
//        {
//            $array3[] = $data4[$i].' '.$data5[$i];
//
//        }
//        $this->set('paymentterm', $array3);
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
        //pr($data);exit;
        $this->set('contactpersoninfo', $data);
        if(empty($id))
        {
             $this->Session->setFlash(__('Invalid Customer Entry'));
             return $this->redirect(array('action'=>'edit'));
        }
        $customer_details =  $this->Customer->findById($id); 
       
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
               $this->Session->setFlash(__('Customer has been Updated'));
               return $this->redirect(array('action'=>'index'));
               $this->Session->delete('customer_id');
            }
            $this->Session->setFlash(__('Customer Cant be Updated'));
        }
        else
        {
            $this->request->data =  $customer_details;
        }
    }
    public function delete($id)
    {
        /*******************************************************
         *  BS V1.0
         *  User Role Permission
         *  Controller : Procedures
         *  Permission : Delete 
         *  Description   :   Delete Procedures Details page
         *******************************************************/
        $user_role = $this->userrole_permission();
        if($user_role['other_role']['add'] == 1){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        /*
         * *****************************************************
         */
        if($this->request->is('get'))
        {
            throw new MethodNotAllowedException();
        }
        if($this->Procedure->delete($id))
        {
            $this->Session->setFlash(__('The Procedure has been deleted',h($id)));
            return $this->redirect(array('controller'=>'Procedures','action'=>'index'));
        }
    }
}
