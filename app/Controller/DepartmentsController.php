<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class DepartmentsController extends AppController
{
    
    public $helpers = array('Html','Form','Session');
    
    public function index()
    {
        $data = $this->Department->find('all',array('order' => array('Department.id' => 'DESC')));
        $this->set('department', $data);
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
         
            $this->Department->create();
           
            if($this->Department->save($this->request->data))
            {
                $this->Session->setFlash(__('Department is Added'));
                return $this->redirect(array('action'=>'index'));
            }
            $this->Session->setFlash(__('Department Could Not be Added'));
        }
       
    }
    
    public function edit($id = null)
    {
        
        if(empty($id))
        {
             $this->Session->setFlash(__('Invalid Entry'));
             return $this->redirect(array('action'=>'edit'));
          
        }
        
        $department =  $this->Department->findById($id); 
       if(empty($department))
       {
            $this->Session->setFlash(__('Invalid Department'));
            return $this->redirect(array('action'=>'edit'));
          
       }
        //$this->set('country',$data);
        if($this->request->is(array('post','put')))
       {
             
              $this->Department->id = $id;
             
          
              if($this->Department->save($this->request->data))
           {
               
               $this->Session->setFlash(__('Department is Updated'));
               return $this->redirect(array('action'=>'index'));
           }
            
            $this->Session->setFlash(__('Department Cant be Updated'));
        }
        else{
            $this->request->data = $department;
        }
       
    }
    
    public function delete($id)
    {
        if($this->request->is('get'))
        {
            throw new MethodNotAllowedException();
        }
        if($this->Department->delete($id))
        {
            $this->Session->setFlash(__('The Department has been deleted',h($id)));
            return $this->redirect(array('action'=>'index'));
        }
    }
}