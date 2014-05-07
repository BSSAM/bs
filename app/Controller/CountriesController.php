<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class CountriesController extends AppController
{
    
    public $helpers = array('Html','Form','Session');
    
    public function index()
    {
        $data = $this->Country->find('all',array('order' => array('Country.id' => 'DESC')));
        $this->set('country', $data);
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
         
            $this->Country->create();
           
            if($this->Country->save($this->request->data))
            {
                $this->Session->setFlash(__('Country is Added'));
                return $this->redirect(array('action'=>'index'));
            }
            $this->Session->setFlash(__('Country Could Not Added'));
        }
       
    }
}