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
    
    public function edit($id = null)
    {
        
        if(empty($id))
        {
             $this->Session->setFlash(__('Invalid Entry'));
             return $this->redirect(array('action'=>'edit'));
          
        }
        
        $country =  $this->Country->findById($id); 
       if(empty($country))
       {
            $this->Session->setFlash(__('Invalid Country'));
            return $this->redirect(array('action'=>'edit'));
          
       }
        //$this->set('country',$data);
        if($this->request->is(array('post','put')))
       {
             
              $this->Country->id = $id;
             
          
              if($this->Country->save($this->request->data))
           {
               
               $this->Session->setFlash(__('Country is Updated'));
               return $this->redirect(array('action'=>'index'));
           }
            
            $this->Session->setFlash(__('Country Cant be Updated'));
        }
        else{
            $this->request->data = $country;
        }
       
    }
    
    public function delete($id)
    {
        if($this->request->is('get'))
        {
            throw new MethodNotAllowedException();
        }
        if($this->Country->delete($id))
        {
            $this->Session->setFlash(__('The Country has been deleted',h($id)));
            return $this->redirect(array('action'=>'index'));
        }
    }
}