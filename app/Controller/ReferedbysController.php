<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ReferedbysController extends AppController
{
    
    public $helpers = array('Html','Form','Session');
    
    public function index()
    {
        $data = $this->Referedby->find('all',array('order' => array('Referedby.id' => 'DESC')));
        $this->set('referedby', $data);
        //pr($data);
    }
    
    public function add()
    {
      
        if($this->request->is('post'))
        {
             $this->request->data['status']=1;
            //pr($dat);exit;
             //$dat = $this->request->params[''];
             $match1 = $this->request->data['referedby'];
             $data1 = $this->Referedby->findByReferedby($match1);
             
            if(!empty($data1))
            {
                $this->Session->setFlash(__('Referred By Entered is Already Exist'));
               
                return $this->redirect(array('action'=>'add'));
            }
            $this->Referedby->create();
           
            if($this->Referedby->save($this->request->data))
            {
                $this->Session->setFlash(__('Referred By is Added'));
                return $this->redirect(array('action'=>'index'));
            }
            $this->Session->setFlash(__('Referred By Could Not be Added'));
           
        }
       
    }
}