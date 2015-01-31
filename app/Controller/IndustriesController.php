<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class IndustriesController extends AppController
{
    
    public $helpers = array('Html','Form','Session');
    
    public function index($id = NULL)
    {
        /*******************************************************
         *  BS V1.0
         *  Industry Permission
         *  Controller : Industry
         *  Permission : view 
         *******************************************************/
        
        $user_role = $this->userrole_permission();
        if($user_role['cus_industry']['view'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        $this->set('userrole_cus',$user_role['cus_industry']);
        /*
         * ---------------  Functionality of Users -----------------------------------
         */
        if(empty($id)):
            $this->set('deleted_val',$id=0);
        endif;
        
        //$data = $this->Location->find('all',array('conditions'=>array('Location.is_deleted'=>0)),array('order' => array('Location.id' => 'DESC')));
        if($id == '1'):
        $data = $this->Industry->find('all',array('conditions'=>array('Industry.is_deleted'=>1)),array('order' => array('Industry.id' => 'DESC')));
        $this->set('deleted_val',$id);
        else:
        $data = $this->Industry->find('all',array('conditions'=>array('Industry.is_deleted'=>0)),array('order' => array('Industry.id' => 'DESC')));
        $this->set('deleted_val',$id);
        endif;
        
        $this->set('industry', $data);
        //pr($data);
    }
    
    public function add()
    {
     
        /* 
         * ---------------  Industry Condition  -------------------------------------
         */
        $user_role = $this->userrole_permission();
        if($user_role['cus_industry']['add'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        
        /*
         * ---------------  Functionality of Industry -----------------------------------
         */
        if($this->request->is('post'))
        {
             $this->request->data['status']=1;
            //pr($dat);exit;
             //$dat = $this->request->params[''];
             $match1 = $this->request->data['industryname'];
             $data1 = $this->Industry->findByIndustryname($match1);
             
            if(!empty($data1))
            {
                $this->Session->setFlash(__('Industry Entered is Already Exist'));
               
                return $this->redirect(array('action'=>'index'));
            }
            $this->Industry->create();
           
            if($this->Industry->save($this->request->data))
            {
                $this->Session->setFlash(__('Industry is Added'));
                return $this->redirect(array('action'=>'index'));
            }
            $this->Session->setFlash(__('Industry Could Not be Added'));
           
        }
       
    }
    public function edit($id = NULL)
    {
        /* 
         * ---------------  Industry Condition  -------------------------------------
         */
        $user_role = $this->userrole_permission();
        if($user_role['cus_industry']['edit'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        
        /*
         * ---------------  Functionality of Industry -----------------------------------
         */
        if(empty($id))
        {
             $this->Session->setFlash(__('Invalid Entry'));
             return $this->redirect(array('action'=>'index'));
        }
        $industry_details =  $this->Industry->findById($id); 
        if(empty($industry_details))
        {
           $this->Session->setFlash(__('Invalid Industry'));
             return $this->redirect(array('action'=>'index'));
        }
        if($this->request->is(array('post','put')))
        {
            $this->Industry->id = $id;
            if($this->Industry->save($this->request->data))
            {
               $this->Session->setFlash(__('Industry is Updated'));
               return $this->redirect(array('action'=>'index'));
            }
            $this->Session->setFlash(__('Industry Cant be Updated'));
        }
        else{
            $this->request->data = $industry_details;
        }
    }
    public function delete($id)
    {
        /* 
         * ---------------  Industry Condition  -------------------------------------
         */
        $user_role = $this->userrole_permission();
        if($user_role['cus_industry']['delete'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        
        /*
         * ---------------  Functionality of Industry -----------------------------------
         */
        $this->autoRender=false;
        
        if($id=='')
        {
            throw new MethodNotAllowedException();
        }
        if($id!='')
        {
            if($this->Industry->updateAll(array('Industry.is_deleted'=>1),array('Industry.id'=>$id)))
            {
            $this->Session->setFlash(__('The Industry has been deleted'));
            return $this->redirect(array('action'=>'index'));
            }
        }
    }
    public function retrieve($id)
    {
        /* 
         * ---------------  Industry Condition  -------------------------------------
         */
        $user_role = $this->userrole_permission();
        if($user_role['cus_industry']['delete'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        
        /*
         * ---------------  Functionality of Industry -----------------------------------
         */
        $this->autoRender=false;
        
        if($id=='')
        {
            throw new MethodNotAllowedException();
        }
        if($id!='')
        {
            if($this->Industry->updateAll(array('Industry.is_deleted'=>0),array('Industry.id'=>$id)))
            {
            $this->Session->setFlash(__('The Industry has been Retrieved'));
            return $this->redirect(array('action'=>'index'));
            }
        }
    }
}