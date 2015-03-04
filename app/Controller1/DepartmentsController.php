<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class DepartmentsController extends AppController
{
    
    public $helpers = array('Html','Form','Session');
    
    public function index($id=NULL)
    {
         /*******************************************************
         *  BS V1.0
         *  User Department Permission
         *  Controller : Department
         *  Permission : view 
         *******************************************************/
        
        $user_role = $this->userrole_permission();
        if($user_role['other_department']['view'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        $this->set('userrole',$user_role['other_department']);
        /*
         * ---------------  Functionality of Users -----------------------------------
         */
        
        if(empty($id)):
            $this->set('deleted_val',$id=0);
        endif;
        
        if($id == '1'):
        $data = $this->Department->find('all',array('conditions'=>array('Department.is_deleted'=>1)),array('order' => array('Department.id' => 'DESC')));
        $this->set('deleted_val',$id);
        
        else:
        $data = $this->Department->find('all',array('conditions'=>array('Department.is_deleted'=>0)),array('order' => array('Department.id' => 'DESC')));
        $this->set('deleted_val',$id);
        endif;
        
        
        $this->set('department', $data);
        //pr($data);
    }
    
    public function add()
    {
       
        /* 
         * ---------------  User Department Condition  -------------------------------------
         */
        $user_role = $this->userrole_permission();
        if($user_role['other_department']['add'] == 0){ 
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
        /* 
         * ---------------  User Department Condition  -------------------------------------
         */
        $user_role = $this->userrole_permission();
        if($user_role['other_department']['edit'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        
        /*
         * ---------------  Functionality of Users -----------------------------------
         */ 
        if(empty($id))
        {
             $this->Session->setFlash(__('Invalid Entry'));
             return $this->redirect(array('action'=>'index'));
          
        }
        
        $department =  $this->Department->findById($id); 
       if(empty($department))
       {
            $this->Session->setFlash(__('Invalid Department'));
            return $this->redirect(array('action'=>'index'));
          
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
        /* 
         * ---------------  User Department Condition  -------------------------------------
         */
        $user_role = $this->userrole_permission();
        if($user_role['other_department']['delete'] == 0){ 
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
            if($this->Department->updateAll(array('Department.is_deleted'=>1),array('Department.id'=>$id)))
            {
            $this->Session->setFlash(__('The Department has been deleted',h($id)));
            return $this->redirect(array('action'=>'index'));
            }
        }
    }
    
    public function retrieve($id)
    {
        /* 
         * ---------------  User Department Condition  -------------------------------------
         */
        $user_role = $this->userrole_permission();
        if($user_role['other_department']['delete'] == 0){ 
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
            if($this->Department->updateAll(array('Department.is_deleted'=>0),array('Department.id'=>$id)))
            {
            $this->Session->setFlash(__('The Department has been Retrieved',h($id)));
            return $this->redirect(array('action'=>'index'));
            }
        }
    }
}