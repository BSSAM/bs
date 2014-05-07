<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class UserrolesController extends AppController
{
    
    public $helpers = array('Html','Form','Session');
    
    public function index()
    {
        $this->loadModel('User');
        $data = $this->Userrole->find('all',array('order' => array('Userrole.id' => 'DESC')));
        $this->set('userrole', $data);
        //pr($data);
    }
    
    public function add()
    {
        if($this->request->is('post'))
        {
             $this->request->data['status']=1;
            //pr($dat);exit;
             //$dat = $this->request->params[''];
             $match1 = $this->request->data['user_role'];
             $data1 = $this->Userrole->findByUserRole($match1);
             
            if(!empty($data1))
            {
                $this->Session->setFlash(__('User Role Already Exist'));
               
                return $this->redirect(array('action'=>'add'));
            }
            $this->Userrole->create();
           
            if($this->Userrole->save($this->request->data))
            {
                $this->Session->setFlash(__('User Role is Added'));
                return $this->redirect(array('action'=>'index'));
            }
            $this->Session->setFlash(__('User Role Could Not be Added'));
           
        }
       
    }
    
    public function edit($id = null)
    {
        
       
        $this->loadModel('Department');
         $data = $this->Department->find('list', array('fields' => 'departmentname'));
        $this->set('department',$data);
       
        if(empty($id))
        {
             $this->Session->setFlash(__('Invalid Entry'));
             return $this->redirect(array('action'=>'edit'));
          
        }
        
        $user =  $this->User->findById($id); 
       if(empty($user))
       {
           $this->Session->setFlash(__('Invalid User'));
             return $this->redirect(array('action'=>'edit'));
          
       }
       
        
         if($this->request->is(array('post','put')))
       {
             
             $match2 = $this->request->data['department_id'];
              $dept = implode(',',$match2);
              $this->request->data['department_id'] = $dept;
             
            
              $this->User->id = $id;
             
          
              if($this->User->save($this->request->data))
           {
               
               $this->Session->setFlash(__('User is Updated'));
               return $this->redirect(array('action'=>'index'));
           }
            
            $this->Session->setFlash(__('User Cant be Updated'));
        }
        else{
            $this->request->data = $user;
        }
   
        
       
       
    }
}