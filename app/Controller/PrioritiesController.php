<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class PrioritiesController extends AppController
{
    
    public $helpers = array('Html','Form','Session');
    
    public function index()
    {
        $data = $this->Priority->find('all',array('order' => array('Priority.id' => 'DESC')));
        $this->set('priority', $data);
        //pr($data);
    }
    
    public function add()
    {
      
        if($this->request->is('post'))
        {
             $this->request->data['status']=1;
            //pr($dat);exit;
             //$dat = $this->request->params[''];
             $match1 = $this->request->data['priority'];
             $data1 = $this->Priority->findByPriority($match1);
            
            
            if(!empty($data1))
            {
            
                $this->Session->setFlash(__('Priority Already Exist'));
               
                return $this->redirect(array('action'=>'add'));
            }
            $this->Priority->create();
           
            if($this->Priority->save($this->request->data))
            {
                $this->Session->setFlash(__('Priority Added Successfully'));
                return $this->redirect(array('action'=>'index'));
            }
            $this->Session->setFlash(__('Priority Could Not be Added'));
           
        }
       
    }
}