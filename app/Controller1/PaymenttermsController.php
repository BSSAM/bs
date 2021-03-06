<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class PaymenttermsController extends AppController
{
    
    public $helpers = array('Html','Form','Session');
    
    public function index($id=NULL)
    {
        /*******************************************************
         *  BS V1.0
         *  Payment Permission
         *  Controller : Payment
         *  Permission : view 
         *******************************************************/
        
        $user_role = $this->userrole_permission();
        if($user_role['cus_paymentterms']['view'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        $this->set('userrole_cus',$user_role['cus_paymentterms']);
        /*
         * ---------------  Functionality of Users -----------------------------------
         */
        if(empty($id)):
            $this->set('deleted_val',$id=0);
        endif;
        
        if($id == '1'):
        $data = $this->Paymentterm->find('all',array('conditions'=>array('Paymentterm.is_deleted'=>1)),array('order' => array('Paymentterm.id' => 'ASC')));
        $this->set('deleted_val',$id);
        else:
        $data = $this->Paymentterm->find('all',array('conditions'=>array('Paymentterm.is_deleted'=>0)),array('order' => array('Paymentterm.id' => 'ASC')));
        $this->set('deleted_val',$id);
        endif;
        
        $this->set('paymentterm', $data);
        //pr($data);
    }
    
    public function add()
    {
        /* 
         * ---------------  Payment Condition  -------------------------------------
         */
        $user_role = $this->userrole_permission();
        if($user_role['cus_paymentterms']['add'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        
        /*
         * ---------------  Functionality of Payment -----------------------------------
         */
        if($this->request->is('post'))
        {
             $this->request->data['status']=1;
            //pr($dat);exit;
             //$dat = $this->request->params[''];
             $match1 = $this->request->data['paymentterm'];
             $match2 = $this->request->data['paymenttype'];
             $match3 = $match1.' '.$match2;
             $data1 = $this->Paymentterm->find('count',array('conditions'=>array('Paymentterm.pay ='=>$match3)));
            
            
            if($data1 != 0)
            {
            
                $this->Session->setFlash(__('Both Payment Type & Term  Already Exist'));
               
                return $this->redirect(array('action'=>'index'));
            }
            $this->Paymentterm->create();
           
            if($this->Paymentterm->save($this->request->data))
            {
                $this->Session->setFlash(__('Payment Term Added Successfully'));
                return $this->redirect(array('action'=>'index'));
            }
            $this->Session->setFlash(__('Payment Term Could Not be Added'));
           
        }
       
    }
    public function edit($id = NULL)
    {
        /* 
         * ---------------  Payment Condition  -------------------------------------
         */
        $user_role = $this->userrole_permission();
        if($user_role['cus_paymentterms']['edit'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        
        /*
         * ---------------  Functionality of Payment -----------------------------------
         */
        if(empty($id))
        {
             $this->Session->setFlash(__('Invalid Payment Term'));
             return $this->redirect(array('action'=>'index'));
        }
        $payment_details =  $this->Paymentterm->findById($id); 
        if(empty($payment_details))
        {
           $this->Session->setFlash(__('Invalid Payment Term'));
             return $this->redirect(array('action'=>'index'));
        }
        if($this->request->is(array('post','put')))
        {
            $this->Paymentterm->id = $id;
            if($this->Paymentterm->save($this->request->data))
            {
               $this->Session->setFlash(__('Payment Term is Updated'));
               return $this->redirect(array('action'=>'index'));
            }
            $this->Session->setFlash(__('Payment Term Cant be Updated'));
        }
        else
        {
            $this->request->data = $payment_details;
        }
    }
    public function delete($id)
    {
        /* 
         * ---------------  Payment Condition  -------------------------------------
         */
        $user_role = $this->userrole_permission();
        if($user_role['cus_paymentterms']['delete'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        
        /*
         * ---------------  Functionality of Payment -----------------------------------
         */
        $this->autoRender=false;
        if($id=='')
        {
            throw new MethodNotAllowedException();
        }
        if($id!='')
        {
            if($this->Paymentterm->updateAll(array('Paymentterm.is_deleted'=>1),array('Paymentterm.id'=>$id)))
            {
            $this->Session->setFlash(__('The Payment Term has been deleted'));
            return $this->redirect(array('action'=>'index'));
            }
        }
    }
    
    public function retrieve($id)
    {
        /* 
         * ---------------  Payment Condition  -------------------------------------
         */
        $user_role = $this->userrole_permission();
        if($user_role['cus_paymentterms']['delete'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        
        /*
         * ---------------  Functionality of Payment -----------------------------------
         */
        $this->autoRender=false;
        if($id=='')
        {
            throw new MethodNotAllowedException();
        }
        if($id!='')
        {
            if($this->Paymentterm->updateAll(array('Paymentterm.is_deleted'=>0),array('Paymentterm.id'=>$id)))
            {
            $this->Session->setFlash(__('The Payment Term has been Retrieved'));
            return $this->redirect(array('action'=>'index'));
            }
        }
    }
}