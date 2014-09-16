<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class LocationsController extends AppController
{
    
    public $helpers = array('Html','Form','Session');
    
    public function index()
    {
        /*******************************************************
         *  BS V1.0
         *  Location Permission
         *  Controller : Location
         *  Permission : view 
         *******************************************************/
        
        $user_role = $this->userrole_permission();
        if($user_role['cus_location']['view'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        $this->set('userrole_cus',$user_role['cus_location']);
        /*
         * ---------------  Functionality of Users -----------------------------------
         */
        $data = $this->Location->find('all',array('conditions'=>array('Location.is_deleted'=>0)),array('order' => array('Location.id' => 'DESC')));
        $this->set('location', $data);
        //pr($data);
    }
    
    public function add()
    {
      
        /* 
         * ---------------  Location Condition  -------------------------------------
         */
        $user_role = $this->userrole_permission();
        if($user_role['cus_location']['add'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        
        /*
         * ---------------  Functionality of Location -----------------------------------
         */
        if($this->request->is('post'))
        {
             $this->request->data['status']=1;
            //pr($dat);exit;
             //$dat = $this->request->params[''];
             $match1 = $this->request->data['locationname'];
             $data1 = $this->Location->findByLocationname($match1);
             
            if(!empty($data1))
            {
                $this->Session->setFlash(__('Location Entered is Already Exist'));
               
                return $this->redirect(array('action'=>'index'));
            }
            $this->Location->create();
           
            if($this->Location->save($this->request->data))
            {
                $this->Session->setFlash(__('Location is Added'));
                return $this->redirect(array('action'=>'index'));
            }
            $this->Session->setFlash(__('Location Could Not be Added'));
           
        }
       
    }
    public function edit($id = NULL)
    {
        /* 
         * ---------------  Location Condition  -------------------------------------
         */
        $user_role = $this->userrole_permission();
        if($user_role['cus_location']['edit'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        
        /*
         * ---------------  Functionality of Location -----------------------------------
         */
        if(empty($id))
        {
             $this->Session->setFlash(__('Invalid Location'));
             return $this->redirect(array('action'=>'index'));
        }
        $location_details =  $this->Location->findById($id); 
        if(empty($location_details))
        {
           $this->Session->setFlash(__('Invalid Location'));
             return $this->redirect(array('action'=>'index'));
        }
        if($this->request->is(array('post','put')))
        {
            $this->Location->id = $id;
            if($this->Location->save($this->request->data))
            {
               $this->Session->setFlash(__('Location is Updated'));
               return $this->redirect(array('action'=>'index'));
            }
            $this->Session->setFlash(__('Location Cant be Updated'));
        }
        else
        {
            $this->request->data = $location_details;
        }
    }
    public function delete($id)
    {
        /* 
         * ---------------  Location Condition  -------------------------------------
         */
        $user_role = $this->userrole_permission();
        if($user_role['cus_location']['delete'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        
        /*
         * ---------------  Functionality of Location -----------------------------------
         */
        $this->autoRender=false;
        if($id=='')
        {
            throw new MethodNotAllowedException();
        }
        if($id!='')
        {
            if($this->Location->updateAll(array('Location.is_deleted'=>1),array('Location.id'=>$id)))
            {
            $this->Session->setFlash(__('The Location has been deleted'));
            return $this->redirect(array('action'=>'index'));
            }
        }
    }
}