<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class PrioritiesController extends AppController
{
    
    public $helpers = array('Html','Form','Session');
    
    public function index()
    {
        /*******************************************************
         *  BS V1.0
         *  Priority Permission
         *  Controller : Priority
         *  Permission : view 
         *******************************************************/
        
        $user_role = $this->userrole_permission();
        if($user_role['cus_priority']['view'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        $this->set('userrole_cus',$user_role['cus_priority']);
        /*
         * ---------------  Functionality of Users -----------------------------------
         */
        $data = $this->Priority->find('all',array('conditions'=>array('Priority.is_deleted'=>0)),array('order' => array('Priority.id' => 'DESC')));
        $this->set('priority', $data);
        //pr($data);
    }
    
    public function add()
    {
        
        /* 
         * ---------------  Priority Condition  -------------------------------------
         */
        $user_role = $this->userrole_permission();
        if($user_role['cus_priority']['add'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        
        /*
         * ---------------  Functionality of Priority -----------------------------------
         */
        if($this->request->is('post'))
        {
             $this->request->data['status']=1;
            //pr($dat);exit;
             //$dat = $this->request->params[''];
             $match1 = $this->request->data['priority'];
             $data1 = $this->Priority->findByPriority($match1);
            
            
            if(!empty($data1))
            {
            
                $this->Session->setFlash(__('Priority Already Exist'));
               
                return $this->redirect(array('action'=>'add'));
            }
            $this->Priority->create();
           
            if($this->Priority->save($this->request->data))
            {
                $this->Session->setFlash(__('Priority Added Successfully'));
                return $this->redirect(array('action'=>'index'));
            }
            $this->Session->setFlash(__('Priority Could Not be Added'));
           
        }
       
    }
    public function edit($id = NULL)
    {
        /* 
         * ---------------  Priority Condition  -------------------------------------
         */
        $user_role = $this->userrole_permission();
        if($user_role['cus_priority']['edit'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        
        /*
         * ---------------  Functionality of Priority -----------------------------------
         */
        if(empty($id))
        {
             $this->Session->setFlash(__('Invalid Priority'));
             return $this->redirect(array('action'=>'edit'));
        }
        $priority_details =  $this->Priority->findById($id); 
        if(empty($priority_details))
        {
           $this->Session->setFlash(__('Invalid Priority'));
             return $this->redirect(array('action'=>'edit'));
        }
        if($this->request->is(array('post','put')))
        {
            $this->Priority->id = $id;
            if($this->Priority->save($this->request->data))
            {
               $this->Session->setFlash(__('Priority is Updated'));
               return $this->redirect(array('action'=>'index'));
            }
            $this->Session->setFlash(__('Priority Cant be Updated'));
        }
        else
        {
            $this->request->data = $priority_details;
        }
    }
    public function delete($id)
    {
        /* 
         * ---------------  Priority Condition  -------------------------------------
         */
        $user_role = $this->userrole_permission();
        if($user_role['cus_priority']['delete'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        
        /*
         * ---------------  Functionality of Priority -----------------------------------
         */
        $this->autoRender=false;
        if($id=='')
        {
            throw new MethodNotAllowedException();
        }
        if($id!='')
        {
            if($this->Priority->updateAll(array('Priority.is_deleted'=>1),array('Priority.id'=>$id)))
            {
            $this->Session->setFlash(__('Priority has been deleted'));
            return $this->redirect(array('action'=>'index'));
            }
        }
    }
}