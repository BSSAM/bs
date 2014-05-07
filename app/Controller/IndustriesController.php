<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class IndustriesController extends AppController
{
    
    public $helpers = array('Html','Form','Session');
    
    public function index()
    {
        $data = $this->Industry->find('all',array('order' => array('Industry.id' => 'DESC')));
        $this->set('industry', $data);
        //pr($data);
    }
    
    public function add()
    {
      
        if($this->request->is('post'))
        {
             $this->request->data['status']=1;
            //pr($dat);exit;
             //$dat = $this->request->params[''];
             $match1 = $this->request->data['industryname'];
             $data1 = $this->Industry->findByIndustryname($match1);
             
            if(!empty($data1))
            {
                $this->Session->setFlash(__('Industry Entered is Already Exist'));
               
                return $this->redirect(array('action'=>'add'));
            }
            $this->Industry->create();
           
            if($this->Industry->save($this->request->data))
            {
                $this->Session->setFlash(__('Industry is Added'));
                return $this->redirect(array('action'=>'index'));
            }
            $this->Session->setFlash(__('Industry Could Not be Added'));
           
        }
       
    }
}