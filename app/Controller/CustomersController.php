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
           pr($this->request->data);exit;
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
    
   
}