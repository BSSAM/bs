<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class TallyledgersController extends AppController
{
    
    public $helpers = array('Html','Form','Session');
    
    public function index()
    {
        $data = $this->Tallyledger->find('all',array('order' => array('Tallyledger.id' => 'DESC')));
        $this->set('tallyledger', $data);
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
             $match1 = $this->request->data['tallyledgeraccount'];
             $data1 = $this->Tallyledger->findByTallyledgeraccount($match1);
            if(!empty($data1))
            {
                $this->Session->setFlash(__('Tally Ledger A/C Entered is Already Exist'));
               
                return $this->redirect(array('action'=>'add'));
            }
            $this->Tallyledger->create();
           
            if($this->Tallyledger->save($this->request->data))
            {
                $this->Session->setFlash(__('Tally Ledger A/C is Added'));
                return $this->redirect(array('action'=>'index'));
            }
            $this->Session->setFlash(__('Tally Ledger A/C Could Not be Added'));
           
        }
       
    }
}