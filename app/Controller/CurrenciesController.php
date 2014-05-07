<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class CurrenciesController extends AppController
{
    
    public $helpers = array('Html','Form','Session');
    
    public function index()
    {
        $data = $this->Currency->find('all',array('order' => array('Currency.id' => 'DESC')));
        $this->set('currency', $data);
       // pr($data);exit;
    }
    
    public function add()
    {
        $this->loadModel('Country');
         $data = $this->Country->find('list', array('fields' => 'country'));
         //pr($data);exit;
         
        $this->set('country',$data);
         
        //$this->set('country',$data);
        if($this->request->is('post'))
        {
             $this->request->data['status']=1;
            //pr($dat);exit;
             //$dat = $this->request->params[''];
             $match1 = $this->request->data['country_id'];
             $data1 = $this->Currency->findByCountryId($match1);
             
            if(!empty($data1))
            {
                $this->Session->setFlash(__('Country Entered is Already Exist'));
               
                return $this->redirect(array('action'=>'add'));
            }
            $this->Currency->create();
           
            if($this->Currency->save($this->request->data))
            {
                $this->Session->setFlash(__('Currency is Added'));
                return $this->redirect(array('action'=>'index'));
            }
            $this->Session->setFlash(__('Currency Could Not be Added'));
           
        }
       
    }
}