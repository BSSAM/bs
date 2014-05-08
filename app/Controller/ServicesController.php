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
    
       
    public function edit($id = null)
    {
        
        if(empty($id))
        {
             $this->Session->setFlash(__('Invalid Entry'));
             return $this->redirect(array('action'=>'edit'));
          
        }
        
        $service =  $this->Service->findById($id); 
       if(empty($service))
       {
            $this->Session->setFlash(__('Invalid Service Type'));
            return $this->redirect(array('action'=>'edit'));
          
       }
        //$this->set('country',$data);
        if($this->request->is(array('post','put')))
       {
             
              $this->Service->id = $id;
             
          
              if($this->Service->save($this->request->data))
           {
               
               $this->Session->setFlash(__('Service Type is Updated'));
               return $this->redirect(array('action'=>'index'));
           }
            
            $this->Session->setFlash(__('Service Type Cant be Updated'));
        }
        else{
            $this->request->data = $service;
        }
       
    }
    
    public function delete($id)
    {
        if($this->request->is('get'))
        {
            throw new MethodNotAllowedException();
        }
        if($this->Service->delete($id))
        {
            $this->Session->setFlash(__('The Service Type has been deleted',h($id)));
            return $this->redirect(array('action'=>'index'));
        }
    }
}