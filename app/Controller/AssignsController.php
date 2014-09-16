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
        /*******************************************************
         *  BS V1.0
         *  User Assigned To Permission
         *  Controller : Assigned To 
         *  Permission : view 
         *******************************************************/
        
        $user_role = $this->userrole_permission();
        if($user_role['other_assignedto']['view'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        $this->set('userrole',$user_role['other_assignedto']);
        /*
         * ---------------  Functionality of Users -----------------------------------
         */
        $data = $this->Assign->find('all',array('conditions'=>array('Assign.is_deleted'=>0)),array('order' => array('Assign.id' => 'DESC')));
        $this->set('assign', $data);
        //pr($data);
    }
    
    public function add()
    {
       
         /* 
         * ---------------  User Assigned To Condition  -------------------------------------
         */
        $user_role = $this->userrole_permission();
        if($user_role['other_assignedto']['add'] == 0){ 
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
         /* 
         * ---------------  User Assigned To Condition  -------------------------------------
         */
        $user_role = $this->userrole_permission();
        if($user_role['other_assignedto']['edit'] == 0){ 
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
        
        $assign =  $this->Assign->findById($id); 
       if(empty($assign))
       {
            $this->Session->setFlash(__('Invalid Assign To'));
            return $this->redirect(array('action'=>'index'));
          
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
         /* 
         * ---------------  User Assigned To Condition  -------------------------------------
         */
        $user_role = $this->userrole_permission();
        if($user_role['other_assignedto']['delete'] == 0){ 
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
            if($this->Assign->updateAll(array('Assign.is_deleted'=>1),array('Assign.id'=>$id)))
            {
            $this->Session->setFlash(__('The Assigned To has been deleted',h($id)));
            return $this->redirect(array('action'=>'index'));
            }
        }
    }
}