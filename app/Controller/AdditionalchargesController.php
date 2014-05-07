<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class AdditionalchargesController extends AppController
{
    
    public $helpers = array('Html','Form','Session');
    
    public function index()
    {
        $data = $this->Additionalcharge->find('all',array('order' => array('Additionalcharge.id' => 'DESC')));
        $this->set('additionalcharge', $data);
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
         
            $this->Additionalcharge->create();
           
            if($this->Additionalcharge->save($this->request->data))
            {
                $this->Session->setFlash(__('Additional Charge is Added'));
                return $this->redirect(array('action'=>'index'));
            }
            $this->Session->setFlash(__('Additional Charge Could Not be Added'));
        }
       
    }
}