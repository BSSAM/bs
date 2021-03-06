<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class CountriesController extends AppController
{
    
    public $helpers = array('Html','Form','Session');
    
    public function index($id=NULL)
    {
         /*******************************************************
         *  BS V1.0
         *  User Country Permission
         *  Controller : Country
         *  Permission : view 
         *******************************************************/
        
        $user_role = $this->userrole_permission();
        if($user_role['other_country']['view'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        $this->set('userrole',$user_role['other_country']);
        /*
         * ---------------  Functionality of Country -----------------------------------
         */
        
        if(empty($id)):
            $this->set('deleted_val',$id=0);
        endif;
        
        if($id == '1'):
        $data = $this->Country->find('all',array('conditions'=>array('Country.is_deleted'=>1)),array('order' => array('Country.id' => 'DESC')));
        $this->set('deleted_val',$id);
        
        else:
        $data = $this->Country->find('all',array('conditions'=>array('Country.is_deleted'=>0)),array('order' => array('Country.id' => 'DESC')));
        $this->set('deleted_val',$id);
        endif;
        
        
        $this->set('country', $data);
        //pr($data);
    }
    
    public function add()
    {
       
         /* 
         * ---------------  User Country Condition  -------------------------------------
         */
        $user_role = $this->userrole_permission();
        if($user_role['other_country']['add'] == 0){ 
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
         
            $this->Country->create();
           
            if($this->Country->save($this->request->data))
            {
                $this->Session->setFlash(__('Country is Added'));
                return $this->redirect(array('action'=>'index'));
            }
            $this->Session->setFlash(__('Country Could Not Added'));
        }
       
    }
    
    public function edit($id = null)
    {
         /* 
         * ---------------  User Country Condition  -------------------------------------
         */
        $user_role = $this->userrole_permission();
        if($user_role['other_country']['edit'] == 0){ 
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
        
        $country =  $this->Country->findById($id); 
       if(empty($country))
       {
            $this->Session->setFlash(__('Invalid Country'));
            return $this->redirect(array('action'=>'index'));
          
       }
        //$this->set('country',$data);
        if($this->request->is(array('post','put')))
       {
             
              $this->Country->id = $id;
             
          
              if($this->Country->save($this->request->data))
           {
               
               $this->Session->setFlash(__('Country is Updated'));
               return $this->redirect(array('action'=>'index'));
           }
            
            $this->Session->setFlash(__('Country Cant be Updated'));
        }
        else{
            $this->request->data = $country;
        }
       
    }
    
    public function delete($id)
    {
         /* 
         * ---------------  User Country Condition  -------------------------------------
         */
        $user_role = $this->userrole_permission();
        if($user_role['other_country']['delete'] == 0){ 
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
            if($this->Country->updateAll(array('Country.is_deleted'=>1),array('Country.id'=>$id)))
            {
            $this->Session->setFlash(__('The Country has been deleted',h($id)));
            return $this->redirect(array('action'=>'index'));
            }
        }
    }
    
    public function retrieve($id)
    {
         /* 
         * ---------------  User Country Condition  -------------------------------------
         */
        $user_role = $this->userrole_permission();
        if($user_role['other_country']['delete'] == 0){ 
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
            if($this->Country->updateAll(array('Country.is_deleted'=>0),array('Country.id'=>$id)))
            {
            $this->Session->setFlash(__('The Country has been Retrieved',h($id)));
            return $this->redirect(array('action'=>'index'));
            }
        }
    }
}