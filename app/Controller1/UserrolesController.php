<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class UserrolesController extends AppController
{
    
    public $helpers = array('Html','Form','Session');
    
    public function index($id=NULL)
    {
        /*******************************************************
         *  BS V1.0
         *  User Role Permission
         *  Controller : Userroles
         *  Permission : view 
         *******************************************************/
        
        $user_role = $this->userrole_permission();
        if($user_role['other_role']['view'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        $this->set('userrole_term',$user_role['other_role']);
        /*
         * ---------------  Functionality of Users -----------------------------------
         */
        $this->loadModel('User');
        
        if(empty($id)):
            $this->set('deleted_val',$id=0);
        endif;
        
        if($id == '1'):
        $data = $this->Userrole->find('all',array('conditions'=>array('Userrole.is_deleted'=>1)),array('order' => array('Userrole.id' => 'DESC')));
        $this->set('deleted_val',$id);
        
        else:
        $data = $this->Userrole->find('all',array('conditions'=>array('Userrole.is_deleted'=>0)),array('order' => array('Userrole.id' => 'DESC')));
        $this->set('deleted_val',$id);
        endif;
        
        
        $this->set('userrole', $data);
        //pr($data);
    }
    
    public function add()
    {
        
        /*******************************************************
         *  BS V1.0
         *  User Role Permission
         *  Controller : Userroles
         *  Permission : Add 
         *******************************************************/
        
        $user_role = $this->userrole_permission();
        if($user_role['other_role']['add'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        
        /*
         * *****************************************************
         */
        
        
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
            $results = $this->Userrole->find('first', array('fields' => array('MAX(Userrole.user_role_id) as max_userroleid')));
            $max_userroleid = $results[0]['max_userroleid'];
            if(empty($max_userroleid))
            {
                $this->request->data['user_role_id']=1;
            }
            else
            {
                $this->request->data['user_role_id']=$max_userroleid+1;
            }    
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
        /*******************************************************
         *  BS V1.0
         *  User Role Permission
         *  Controller : Userroles
         *  Permission : Edit 
         *******************************************************/
        
        $user_role = $this->userrole_permission();
        if($user_role['other_role']['edit'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        
        /*
         * *****************************************************
         */
       
       
        if(empty($id))
        {
             $this->Session->setFlash(__('Invalid Entry'));
             return $this->redirect(array('action'=>'edit'));
          
        }
        
        $userrole =  $this->Userrole->findById($id);
        $user_role_id = $userrole['Userrole']['user_role_id'];
        
         if($user_role_id == 1 || $user_role_id == 2)
        {
             return $this->redirect(array('action'=>'index'));
          
        }
       if(empty($userrole))
       {
           $this->Session->setFlash(__('Invalid Userrole'));
             return $this->redirect(array('action'=>'index'));
          
       }
       
        
         if($this->request->is(array('post','put')))
       {
             $match1 = $this->request->data['user_role'];
        //pr($match1);exit;
             $data1 = $this->Userrole->findByUserRole($match1);
             
            if(!empty($data1))
            {
                $this->Session->setFlash(__('User Role Already Exist'));
               
                return $this->redirect(array('action'=>'index'));
            }
              $this->Userrole->id = $id;
             
          
              if($this->Userrole->save($this->request->data))
           {
               
               $this->Session->setFlash(__('Userrole is Updated'));
               return $this->redirect(array('action'=>'index'));
           }
            
            $this->Session->setFlash(__('Userrole Cant be Updated'));
        }
        else{
            $this->request->data = $userrole;
        }
   
        
       
       
    }
    
     public function delete($id)
    {
         
         /*******************************************************
         *  BS V1.0
         *  User Role Permission
         *  Controller : Userroles
         *  Permission : delete 
         *******************************************************/
        
        $user_role = $this->userrole_permission();
        if($user_role['other_role']['delete'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        
        /*
         * *****************************************************
         */
        
        $userrole =  $this->Userrole->findById($id);
        $user_role_id = $userrole['Userrole']['user_role_id'];
         if($user_role_id == 1 || $user_role_id == 2)
        {
             
             return $this->redirect(array('action'=>'index'));
          
        }
        if($this->request->is('get'))
        {
            throw new MethodNotAllowedException();
        }
       if($id!='')
        {
            if($this->Userrole->updateAll(array('Userrole.is_deleted'=>1),array('Userrole.id'=>$id)))
            {
            $this->Session->setFlash(__('The Userrole has been deleted',h($id)));
            return $this->redirect(array('action'=>'index'));
            }
        }
    }
     public function retrieve($id)
    {
         
         /*******************************************************
         *  BS V1.0
         *  User Role Permission
         *  Controller : Userroles
         *  Permission : delete 
         *******************************************************/
        
        $user_role = $this->userrole_permission();
        if($user_role['other_role']['delete'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        
        /*
         * *****************************************************
         */
        
        $userrole =  $this->Userrole->findById($id);
        $user_role_id = $userrole['Userrole']['user_role_id'];
         if($user_role_id == 1 || $user_role_id == 2)
        {
             
             return $this->redirect(array('action'=>'index'));
          
        }
        if($this->request->is('get'))
        {
            throw new MethodNotAllowedException();
        }
       if($id!='')
        {
            if($this->Userrole->updateAll(array('Userrole.is_deleted'=>0),array('Userrole.id'=>$id)))
            {
            $this->Session->setFlash(__('The Userrole has been Retrieved',h($id)));
            return $this->redirect(array('action'=>'index'));
            }
        }
    }
    public function roles($ids = null)
    {
        /*******************************************************
         *  BS V1.0
         *  User Role Permission
         *  Controller : Userroles
         *  Permission : view 
         *******************************************************/
        
        $user_role = $this->userrole_permission();
        if($user_role['other_role']['edit'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        
        /*
         * *****************************************************
         */
        
        $userrole =  $this->Userrole->findById($ids);
        //pr($userrole);exit;
        if(!empty($userrole))
        {
            $user_role_name = $userrole['Userrole']['user_role'];
            $this->set('user_name',$user_role_name);
            $user_role_id = $userrole['Userrole']['user_role_id'];
            //if($user_role_id == 1 || $user_role_id == 2) hidden by michael
            //{
             //   return $this->redirect(array('action'=>'index'));
            //}
            
        }
        else 
        {
            $this->set('user_name','Unknown Role');
        }
        $id = $this->Session->read('sess_userrole');
        if($this->request->is(array('post','put')))
        {
            $a = serialize($this->request->data);
                   //pr($a);echo "a";exit;
            if($this->Userrole->updateAll(array('Userrole.js_enc'=>"'".$a."'"),array('Userrole.user_role_id'=>$ids)))
            {
                $this->Session->setFlash(__('Userrole is Updated'));
                return $this->redirect(array('action'=>'index'));
            }
            $this->Session->setFlash(__('Userrole Cant be Updated'));
        }
        else
        {
            $userrole =  $this->Userrole->findByUserRoleId($ids); 
            
            $b = unserialize($userrole['Userrole']['js_enc']);
            
            $this->request->data = $b;
            
        }
    }
    
    public function template($ids = null)
    {
        /*******************************************************
         *  BS V1.0
         *  User Role Permission
         *  Controller : Userroles
         *  Permission : view 
         *******************************************************/
        
        $user_role = $this->userrole_permission();
        if($user_role['other_role']['view'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        
        /*
         * *****************************************************
         */
        
        $userrole =  $this->Userrole->findById($ids);
        if(!empty($userrole))
        {
            $user_role_name = $userrole['Userrole']['user_role'];
            $this->set('user_name',$user_role_name);
            $user_role_id = $userrole['Userrole']['user_role_id'];
            if($user_role_id == 1 || $user_role_id == 2)
            {
                return $this->redirect(array('action'=>'index'));
            }
            
        }
        else 
        {
            $this->set('user_name','Unknown Role');
        }
        $id = $this->Session->read('sess_userrole');
        if($this->request->is(array('post','put')))
        {
            $a = serialize($this->request->data);
                   //pr($a);echo "a";exit;
            if($this->Userrole->updateAll(array('Userrole.js_enc'=>"'".$a."'"),array('Userrole.user_role_id'=>$ids)))
            {
                $this->Session->setFlash(__('Userrole is Updated'));
            }
            $this->Session->setFlash(__('Userrole Cant be Updated'));
        }
        else
        {
            $userrole =  $this->Userrole->findByUserRoleId($ids); 
            $b = unserialize($userrole['Userrole']['js_enc']);
            //pr($b);echo "b";exit;
            $this->request->data = $b;
        }
    }
}