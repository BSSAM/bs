<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ServicesController extends AppController
{
    
    public $helpers = array('Html','Form','Session');
    
    public function index()
    {
        /*******************************************************
         *  BS V1.0
         *  User Service To Permission
         *  Controller : Service Type 
         *  Permission : view 
         *******************************************************/
        
        $user_role = $this->userrole_permission();
        if($user_role['other_servicetype']['view'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        $this->set('userrole',$user_role['other_servicetype']);
        /*
         * ---------------  Functionality of Users -----------------------------------
         */
        $data = $this->Service->find('all',array('order' => array('Service.id' => 'DESC')));
        $this->set('service', $data);
        //pr($data);
    }
    
    public function add()
    {
       
        /* 
         * ---------------  User Service Type Condition  -------------------------------------
         */
        $user_role = $this->userrole_permission();
        if($user_role['other_servicetype']['add'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        
        /*
         * ---------------  Functionality of Users -----------------------------------
         */ 
        //$this->set('country',$data);
        if($this->request->is('post'))
        {
             $this->request->data['status']=1;
            //pr($dat);exit;
             //$dat = $this->request->params[''];
         
            $this->Service->create();
           
            if($this->Service->save($this->request->data))
            {
                $this->Session->setFlash(__('Service Type is Added'));
                return $this->redirect(array('action'=>'index'));
            }
            $this->Session->setFlash(__('Service Type Could Not be Added'));
        }
       
    }
    
       
    public function edit($id = null)
    {
         /* 
         * ---------------  User Service Type Condition  -------------------------------------
         */
        $user_role = $this->userrole_permission();
        if($user_role['other_servicetype']['edit'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        
        /*
         * ---------------  Functionality of Users -----------------------------------
         */ 
        if(empty($id))
        {
             $this->Session->setFlash(__('Invalid Entry'));
             return $this->redirect(array('action'=>'edit'));
          
        }
        
        $service =  $this->Service->findById($id); 
       if(empty($service))
       {
            $this->Session->setFlash(__('Invalid Service Type'));
            return $this->redirect(array('action'=>'edit'));
          
       }
        //$this->set('country',$data);
        if($this->request->is(array('post','put')))
       {
             
              $this->Service->id = $id;
             
          
              if($this->Service->save($this->request->data))
           {
               
               $this->Session->setFlash(__('Service Type is Updated'));
               return $this->redirect(array('action'=>'index'));
           }
            
            $this->Session->setFlash(__('Service Type Cant be Updated'));
        }
        else{
            $this->request->data = $service;
        }
       
    }
    
    public function delete($id)
    {
        /* 
         * ---------------  User Service Type Condition  -------------------------------------
         */
        $user_role = $this->userrole_permission();
        if($user_role['other_servicetype']['delete'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        
        /*
         * ---------------  Functionality of Users -----------------------------------
         */ 
        if($this->request->is('get'))
        {
            throw new MethodNotAllowedException();
        }
        if($id!='')
        {
            if($this->Service->updateAll(array('Service.is_deleted'=>1),array('Service.id'=>$id)))
            {
            $this->Session->setFlash(__('The Service Type has been deleted',h($id)));
            return $this->redirect(array('action'=>'index'));
            }
        }
    }
}