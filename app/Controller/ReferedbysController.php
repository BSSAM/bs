<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ReferedbysController extends AppController
{
    
    public $helpers = array('Html','Form','Session');
    
    public function index()
    {
        /*******************************************************
         *  BS V1.0
         *  Referred By Permission
         *  Controller : Referred By
         *  Permission : view 
         *******************************************************/
        
        $user_role = $this->userrole_permission();
        if($user_role['cus_referredby']['view'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        $this->set('userrole_cus',$user_role['cus_referredby']);
        /*
         * ---------------  Functionality of Referred By -----------------------------------
         */
        $data = $this->Referedby->find('all',array('conditions'=>array('Referedby.is_deleted'=>0)),array('order' => array('Referedby.id' => 'DESC')));
        $this->set('referedby', $data);
        //pr($data);
    }
    
    public function add()
    {
        /* 
         * ---------------  Referred By Condition  -------------------------------------
         */
        $user_role = $this->userrole_permission();
        if($user_role['cus_referredby']['add'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        
        /*
         * ---------------  Functionality of Referred By -----------------------------------
         */
      
        if($this->request->is('post'))
        {
             $this->request->data['status']=1;
            //pr($dat);exit;
             //$dat = $this->request->params[''];
             $match1 = $this->request->data['referedby'];
             $data1 = $this->Referedby->findByReferedby($match1);
             
            if(!empty($data1))
            {
                $this->Session->setFlash(__('Referred By Entered is Already Exist'));
               
                return $this->redirect(array('action'=>'add'));
            }
            $this->Referedby->create();
           
            if($this->Referedby->save($this->request->data))
            {
                $this->Session->setFlash(__('Referred By is Added'));
                return $this->redirect(array('action'=>'index'));
            }
            $this->Session->setFlash(__('Referred By Could Not be Added'));
           
        }
       
    }
    public function edit($id = NULL)
    {
        /* 
         * ---------------  Referred By Condition  -------------------------------------
         */
        $user_role = $this->userrole_permission();
        if($user_role['cus_referredby']['edit'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        
        /*
         * ---------------  Functionality of Referred By -----------------------------------
         */
        if(empty($id))
        {
             $this->Session->setFlash(__('Invalid Refered Entry'));
             return $this->redirect(array('action'=>'edit'));
        }
        $refer_details =  $this->Referedby->findById($id); 
        if(empty($refer_details))
        {
           $this->Session->setFlash(__('Invalid Refered Entry'));
             return $this->redirect(array('action'=>'edit'));
        }
        if($this->request->is(array('post','put')))
        {
            $this->Referedby->id = $id;
            if($this->Referedby->save($this->request->data))
            {
               $this->Session->setFlash(__('Refered Entry is Updated'));
               return $this->redirect(array('action'=>'index'));
            }
            $this->Session->setFlash(__('Refered Entry Cant be Updated'));
        }
        else
        {
            $this->request->data =  $refer_details;
        }
    }
    public function delete($id)
    {
        /* 
         * ---------------  Referred By Condition  -------------------------------------
         */
        $user_role = $this->userrole_permission();
        if($user_role['cus_referredby']['delete'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        
        /*
         * ---------------  Functionality of Referred By -----------------------------------
         */
        $this->autoRender=false;
        if($id=='')
        {
            throw new MethodNotAllowedException();
        }
        if($id!='')
        {
            if($this->Referedby->updateAll(array('Referedby.is_deleted'=>1),array('Referedby.id'=>$id)))
            {
            $this->Session->setFlash(__('Referred By has been deleted'));
            return $this->redirect(array('action'=>'index'));
            }
        }
    }
}