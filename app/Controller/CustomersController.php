<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class CustomersController extends AppController
{
    
    public $helpers = array('Html','Form','Session');
    
    public function index()
    {
        $data = $this->Customer->find('all',array('order' => array('Customer.id' => 'DESC')));
        $this->set('customer', $data);
        //pr($data);
    }
    
    public function add()
    {
        $this->loadModel('Salesperson');
        $data = $this->Salesperson->find('list', array('fields' => 'salesperson'));
        $this->set('salesperson',$data);
        
        $this->loadModel('Referedby');
        $data1 = $this->Referedby->find('list', array('fields' => 'referedby'));
        $this->set('referedby',$data1);
        
        $this->loadModel('Industry');
        $data2 = $this->Industry->find('list', array('fields' => 'industryname'));
        $this->set('industry',$data2);
        
        $this->loadModel('Location');
        $data3 = $this->Location->find('list', array('fields' => 'locationname'));
        $this->set('location',$data3);
        
        $this->loadModel('Paymentterm');
        $data4 = $this->Paymentterm->find('list', array('fields' => 'paymentterm'));
         //pr($data4);exit;
        $data5 = $this->Paymentterm->find('list', array('fields' => 'paymenttype'));
          
        $array3 = '';
        $i = 0 ; 
        $array3 = array();
        //pr($data4);pr($data5);exit;
        count($data4);
        for($i=1;$i<=count($data4);$i++)
        {
            $array3[] = $data4[$i].' '.$data5[$i];

        }
        $this->set('paymentterm',$array3);
        
         $this->loadModel('Priority');
         $data6 = $this->Priority->find('list', array('fields' => 'priority'));
        $this->set('priority',$data6);
		
		 $this->loadModel('Userrole');
         $data = $this->Userrole->find('list', array('fields' => 'user_role'));
        $this->set('userrole',$data);
        
        if($this->request->is('post'))
        {
           
             $this->request->data['status']=1;
            //pr($dat);exit;
             //$dat = $this->request->params[''];
             $match2 = $this->request->data['salesperson_id'];
              $dept = implode(',',$match2);
              $this->request->data['salesperson_id'] = $dept;
              
              $match3 = $this->request->data['referedbies_id'];
              $dept1 = implode(',',$match3);
              $this->request->data['referedbies_id'] = $dept1;
             
             $match1 = $this->request->data['customername'];
             $data1 = $this->Customer->findByCustomername($match1);
            
            
            if(!empty($data1))
            {
            
                $this->Session->setFlash(__('Customer Name Already Exist'));
               
                return $this->redirect(array('action'=>'add'));
            }
            $this->Customer->create();
            
            if($this->Customer->save($this->request->data))
            {
                $this->Session->setFlash(__('Customer Added Successfully'));
                return $this->redirect(array('action'=>'index'));
            }
            $this->Session->setFlash(__('Customer Could Not be Added'));
           
        }
       
    }
    public function edit($id = NULL)
    {
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
            if($this->Customer->save($this->request->data))
            {
               $this->Session->setFlash(__('Customer is Updated'));
               return $this->redirect(array('action'=>'index'));
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
        $this->autoRender=false;
        if($id=='')
        {
            throw new MethodNotAllowedException();
        }
        if($this->Customer->delete($id))
        {
            $this->Session->setFlash(__('Customer Cant be Updated'));
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
        $this->request->data['Projectinfo']['customer_id']=2;
        $this->request->data['Projectinfo']['project_name']=$project_name;
        $this->request->data['Projectinfo']['project_status']=$status;
        if($this->Projectinfo->save($this->request->data))
        {
            echo "success";
        }
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
        $this->request->data['Deliveryaddress']['customer_id']=2;
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
        $this->request->data['Billingaddress']['customer_id']=2;
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
        $this->loadModel('Contactpersoninfo');
        $this->request->data['Contactpersoninfo']['email']=$this->request->data['contact_email'];
        $this->request->data['Contactpersoninfo']['remarks']=$this->request->data['contact_remark'];
        $this->request->data['Contactpersoninfo']['name']=$this->request->data['contact_name'];
        $this->request->data['Contactpersoninfo']['department']=$this->request->data['contact_department'];
        $this->request->data['Contactpersoninfo']['phone']=$this->request->data['contact_phone'];
        $this->request->data['Contactpersoninfo']['position']=$this->request->data['contact_position'];
        $this->request->data['Contactpersoninfo']['mobile']=$this->request->data['contact_mobile'];
        $this->request->data['Contactpersoninfo']['purpose']=$this->request->data['contact_purpose'];
        $this->request->data['Contactpersoninfo']['customer_id']=2;
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
        
        $this->loadModel('Contactpersoninfo');
        if($this->Projectinfo->deleteAll(array('Contactpersoninfo.serial_id'=>$delete_id)))
        {
            echo "deleted";
        }
    }
}