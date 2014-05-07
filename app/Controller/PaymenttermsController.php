<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class PaymenttermsController extends AppController
{
    
    public $helpers = array('Html','Form','Session');
    
    public function index()
    {
        $data = $this->Paymentterm->find('all',array('order' => array('Paymentterm.id' => 'DESC')));
        $this->set('paymentterm', $data);
        //pr($data);
    }
    
    public function add()
    {
      
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
               
                return $this->redirect(array('action'=>'add'));
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
}