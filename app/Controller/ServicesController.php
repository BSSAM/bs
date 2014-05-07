<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ServicesController extends AppController
{
    
    public $helpers = array('Html','Form','Session');
    
    public function index()
    {
        $data = $this->Service->find('all',array('order' => array('Service.id' => 'DESC')));
        $this->set('service', $data);
        //pr($data);
    }
    
    public function add()
    {
       
         
        //$this->set('country',$data);
        if($this->request->is('post'))
        {
             $this->request->data['status']=1;
            //pr($dat);exit;
             //$dat = $this->request->params[''];
         
            $this->Service->create();
           
            if($this->Service->save($this->request->data))
            {
                $this->Session->setFlash(__('Service Type is Added'));
                return $this->redirect(array('action'=>'index'));
            }
            $this->Session->setFlash(__('Service Type Could Not be Added'));
        }
       
    }
}