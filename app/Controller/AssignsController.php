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
    
    public function edit($id = null)
    {
        
        if(empty($id))
        {
             $this->Session->setFlash(__('Invalid Entry'));
             return $this->redirect(array('action'=>'edit'));
          
        }
        
        $assign =  $this->Assign->findById($id); 
       if(empty($assign))
       {
            $this->Session->setFlash(__('Invalid Assign To'));
            return $this->redirect(array('action'=>'edit'));
          
       }
        //$this->set('country',$data);
        if($this->request->is(array('post','put')))
       {
             
              $this->Assign->id = $id;
             
          
              if($this->Assign->save($this->request->data))
           {
               
               $this->Session->setFlash(__('Assigned To is Updated'));
               return $this->redirect(array('action'=>'index'));
           }
            
            $this->Session->setFlash(__('Assigned To Cant be Updated'));
        }
        else{
            $this->request->data = $assign;
        }
       
    }
    
    public function delete($id)
    {
        if($this->request->is('get'))
        {
            throw new MethodNotAllowedException();
        }
        if($this->Assign->delete($id))
        {
            $this->Session->setFlash(__('The Assigned To has been deleted',h($id)));
            return $this->redirect(array('action'=>'index'));
        }
    }
}