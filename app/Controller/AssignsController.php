<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class AssignsController extends AppController
{
    
    public $helpers = array('Html','Form','Session');
    
    public function index()
    {
        $data = $this->Assign->find('all',array('order' => array('Assign.id' => 'DESC')));
        $this->set('assign', $data);
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
         
            $this->Assign->create();
           
            if($this->Assign->save($this->request->data))
            {
                $this->Session->setFlash(__('Assigned To is Added'));
                return $this->redirect(array('action'=>'index'));
            }
            $this->Session->setFlash(__('Assigned To Could Not be Added'));
        }
       
    }
}