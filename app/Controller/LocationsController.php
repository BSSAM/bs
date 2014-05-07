<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class LocationsController extends AppController
{
    
    public $helpers = array('Html','Form','Session');
    
    public function index()
    {
        $data = $this->Location->find('all',array('order' => array('Location.id' => 'DESC')));
        $this->set('location', $data);
        //pr($data);
    }
    
    public function add()
    {
      
        if($this->request->is('post'))
        {
             $this->request->data['status']=1;
            //pr($dat);exit;
             //$dat = $this->request->params[''];
             $match1 = $this->request->data['locationname'];
             $data1 = $this->Location->findByLocationname($match1);
             
            if(!empty($data1))
            {
                $this->Session->setFlash(__('Location Entered is Already Exist'));
               
                return $this->redirect(array('action'=>'add'));
            }
            $this->Location->create();
           
            if($this->Location->save($this->request->data))
            {
                $this->Session->setFlash(__('Location is Added'));
                return $this->redirect(array('action'=>'index'));
            }
            $this->Session->setFlash(__('Location Could Not be Added'));
           
        }
       
    }
}