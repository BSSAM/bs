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
    
    public function edit($id = null)
    {
        
        if(empty($id))
        {
             $this->Session->setFlash(__('Invalid Entry'));
             return $this->redirect(array('action'=>'edit'));
          
        }
        
        $additionalcharge =  $this->Additionalcharge->findById($id); 
       if(empty($additionalcharge))
       {
            $this->Session->setFlash(__('Invalid Additional Charge'));
            return $this->redirect(array('action'=>'edit'));
          
       }
        //$this->set('country',$data);
        if($this->request->is(array('post','put')))
       {
             
              $this->Additionalcharge->id = $id;
             
          
              if($this->Additionalcharge->save($this->request->data))
           {
               
               $this->Session->setFlash(__('Additional Charge is Updated'));
               return $this->redirect(array('action'=>'index'));
           }
            
            $this->Session->setFlash(__('Additional Charge Cant be Updated'));
        }
        else{
            $this->request->data = $additionalcharge;
        }
       
    }
    
    public function delete($id)
    {
        if($this->request->is('get'))
        {
            throw new MethodNotAllowedException();
        }
        if($this->Additionalcharge->delete($id))
        {
            $this->Session->setFlash(__('The Additional Charge has been deleted',h($id)));
            return $this->redirect(array('action'=>'index'));
        }
    }
}