<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class BranchesController extends AppController
{
    
    public $helpers = array('Html','Form','Session');
    public $uses    =   array('branch');   
    public function index()
    {
        /*******************************************************
         *  BS V1.0
         *  User Branch Permission
         *  Controller : Branch
         *  Permission : view 
         *******************************************************/
        
        $user_role = $this->userrole_permission();
        if($user_role['other_branch']['view'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        $this->set('userrole',$user_role['other_branch']);
        /*
         * ---------------  Functionality of Users -----------------------------------
         */
        $data = $this->branch->find('all',array('conditions'=>array('branch.is_deleted'=>0)),array('order' => array('branch.id' => 'DESC')));
        $this->set('branch', $data);
       // pr($data);exit;
    }
    
    public function add()
    {
         /* 
         * ---------------  User Branch Condition  -------------------------------------
         */
        $user_role = $this->userrole_permission();
        if($user_role['other_branch']['add'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        
        /*
         * ---------------  Functionality of Users -----------------------------------
         */
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
             $data1 = $this->branch->findByBranchname($match1);
             
            if(!empty($data1))
            {
                $this->Session->setFlash(__('Branch Entered is Already Exist'));
               
                return $this->redirect(array('action'=>'add'));
            }
            $this->branch->create();
           
            if($this->branch->save($this->request->data))
            {
                $this->Session->setFlash(__('Branch has been  Added successfully'));
                return $this->redirect(array('action'=>'index'));
            }
            $this->Session->setFlash(__('Branch Could Not be Added'));
           
        }
       
    }
    
    public function edit($id = null)
    {
        /* 
         * ---------------  User Branch Condition  -------------------------------------
         */
        $user_role = $this->userrole_permission();
        if($user_role['other_branch']['edit'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        
        /*
         * ---------------  Functionality of Users -----------------------------------
         */
        $this->loadModel('Currency');
         $data = $this->Currency->find('list', array('fields' => 'currencycode'));
        // pr($data);exit;
         
        $this->set('currency',$data);
         
        if(empty($id))
        {
             $this->Session->setFlash(__('Invalid Entry'));
             return $this->redirect(array('action'=>'edit'));
          
        }
        
        $branch =  $this->branch->findById($id); 
        //pr($branch);exit;
       if(empty($branch))
       {
            $this->Session->setFlash(__('Invalid Branch'));
            return $this->redirect(array('action'=>'edit'));
          
       }
        //$this->set('country',$data);
        if($this->request->is(array('post','put')))
       {
             
              $this->branch->id = $id;
             // pr( $this->branch->id);exit;
             
          
              if($this->branch->save($this->request->data))
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
        /* 
         * ---------------  User Branch Condition  -------------------------------------
         */
        $user_role = $this->userrole_permission();
        if($user_role['other_branch']['delete'] == 0){ 
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
            if($this->branch->updateAll(array('branch.is_deleted'=>1),array('branch.id'=>$id)))
            {
            $this->Session->setFlash(__('The Branch has been deleted',h($id)));
            return $this->redirect(array('action'=>'index'));
            }
        }
    }
}