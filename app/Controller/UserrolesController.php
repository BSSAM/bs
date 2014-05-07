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
    
    public function edit($user_role_id = null)
    {
       // $this->loadModel('User');
        
        $data = $this->Userrole->find('list');
        $this->set('userrole',$data);
       // pr($data);exit;
        if(!$user_role_id)
        {
            throw new NotFoundException(__('Invalid User Role'));
        }
       $userrole =  $this->Userrole->findByUserRoleId($user_role_id);
        $this->set('role',$userrole);
    //pr($userrole);exit; 
       if(!$userrole)
       {
           throw new NotFoundException(__('Invalid User Role'));
       }
       if($this->request->is(array('post')))
       {
           $this->Userrole->user_role_id = $user_role_id;
           
           
           if($this->Userrole->save($this->request->data))
           {
               $this->Session->setFlash(__('User Role is Updated'));
               return $this->redirect(array('action'=>'index'));
           }
           $this->Session->setFlash(__('User Role Cant be Updated'));
       }
       else 
       {
           $this->request->data = $userrole;
       }
       
    }
}