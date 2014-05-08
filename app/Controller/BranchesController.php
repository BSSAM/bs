<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class BranchesController extends AppController
{
    
    public $helpers = array('Html','Form','Session');
    
    public function index()
    {
        $data = $this->Branch->find('all',array('order' => array('Branch.id' => 'DESC')));
        $this->set('branch', $data);
       // pr($data);exit;
    }
    
    public function add()
    {
        $this->loadModel('Currency');
         $data = $this->Currency->find('list', array('fields' => 'currencycode'));
        // pr($data);exit;
         
        $this->set('currency',$data);
         
        //$this->set('country',$data);
        if($this->request->is('post'))
        {
             $this->request->data['status']=1;
            //pr($dat);exit;
             //$dat = $this->request->params[''];
             $match1 = $this->request->data['branchname'];
             $data1 = $this->Branch->findByBranchname($match1);
             
            if(!empty($data1))
            {
                $this->Session->setFlash(__('Branch Entered is Already Exist'));
               
                return $this->redirect(array('action'=>'add'));
            }
            $this->Branch->create();
           
            if($this->Branch->save($this->request->data))
            {
                $this->Session->setFlash(__('Branch is Added'));
                return $this->redirect(array('action'=>'index'));
            }
            $this->Session->setFlash(__('Branch Could Not be Added'));
           
        }
       
    }
    
    public function edit($id = null)
    {
        $this->loadModel('Currency');
         $data = $this->Currency->find('list', array('fields' => 'currencycode'));
        // pr($data);exit;
         
        $this->set('currency',$data);
         
        if(empty($id))
        {
             $this->Session->setFlash(__('Invalid Entry'));
             return $this->redirect(array('action'=>'edit'));
          
        }
        
        $branch =  $this->Branch->findById($id); 
       if(empty($branch))
       {
            $this->Session->setFlash(__('Invalid Branch'));
            return $this->redirect(array('action'=>'edit'));
          
       }
        //$this->set('country',$data);
        if($this->request->is(array('post','put')))
       {
             
              $this->Branch->id = $id;
             
          
              if($this->Branch->save($this->request->data))
           {
               
               $this->Session->setFlash(__('Branch is Updated'));
               return $this->redirect(array('action'=>'index'));
           }
            
            $this->Session->setFlash(__('Branch Cant be Updated'));
        }
        else{
            $this->request->data = $branch;
        }
       
    }
    
    public function delete($id)
    {
        if($this->request->is('get'))
        {
            throw new MethodNotAllowedException();
        }
        if($this->Branch->delete($id))
        {
            $this->Session->setFlash(__('The Branch has been deleted',h($id)));
            return $this->redirect(array('action'=>'index'));
        }
    }
}