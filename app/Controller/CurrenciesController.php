<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class CurrenciesController extends AppController
{
    
    public $helpers = array('Html','Form','Session');
    
    public function index()
    {
        /*******************************************************
         *  BS V1.0
         *  User Currency Permission
         *  Controller : Currency
         *  Permission : view 
         *******************************************************/
        
        $user_role = $this->userrole_permission();
        if($user_role['other_currency']['view'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        $this->set('userrole',$user_role['other_currency']);
        /*
         * ---------------  Functionality of Currency -----------------------------------
         */
        $data = $this->Currency->find('all',array('conditions'=>array('Currency.is_deleted'=>0)),array('order' => array('Currency.id' => 'DESC')));
        $this->set('currency', $data);
       // pr($data);exit;
    }
    
    public function add()
    {
         /* 
         * ---------------  User Country Condition  -------------------------------------
         */
        $user_role = $this->userrole_permission();
        if($user_role['other_currency']['add'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        
        /*
         * ---------------  Functionality of Users -----------------------------------
         */ 
        $this->loadModel('Country');
         $data = $this->Country->find('list', array('fields' => 'country'));
         //pr($data);exit;
         
        $this->set('country',$data);
         
        //$this->set('country',$data);
        if($this->request->is('post'))
        {
             $this->request->data['status']=1;
            //pr($dat);exit;
             //$dat = $this->request->params[''];
             $match1 = $this->request->data['country_id'];
             $data1 = $this->Currency->findByCountryId($match1);
             
            if(!empty($data1))
            {
                $this->Session->setFlash(__('Country Entered is Already Exist'));
               
                return $this->redirect(array('action'=>'add'));
            }
            $this->Currency->create();
           
            if($this->Currency->save($this->request->data))
            {
                $this->Session->setFlash(__('Currency is Added'));
                return $this->redirect(array('action'=>'index'));
            }
            $this->Session->setFlash(__('Currency Could Not be Added'));
           
        }
       
    }
    
    public function edit($id = null)
    {
        /* 
         * ---------------  User Country Condition  -------------------------------------
         */
        $user_role = $this->userrole_permission();
        if($user_role['other_currency']['edit'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        
        /*
         * ---------------  Functionality of Users -----------------------------------
         */ 
        $this->loadModel('Country');
        $data = $this->Country->find('list', array('fields' => 'country'));
        $this->set('country',$data);
         
        if(empty($id))
        {
             $this->Session->setFlash(__('Invalid Entry'));
             return $this->redirect(array('action'=>'edit'));
          
        }
        
        $currency =  $this->Currency->findById($id); 
       if(empty($currency))
       {
            $this->Session->setFlash(__('Invalid Currency'));
            return $this->redirect(array('action'=>'edit'));
          
       }
        //$this->set('country',$data);
        if($this->request->is(array('post','put')))
       {
             
              $this->Currency->id = $id;
             
          
              if($this->Currency->save($this->request->data))
           {
               
               $this->Session->setFlash(__('Currency is Updated'));
               return $this->redirect(array('action'=>'index'));
           }
            
            $this->Session->setFlash(__('Currency Cant be Updated'));
        }
        else{
            $this->request->data = $currency;
        }
       
    }
    
    public function delete($id)
    {
        /* 
         * ---------------  User Country Condition  -------------------------------------
         */
        $user_role = $this->userrole_permission();
        if($user_role['other_currency']['delete'] == 0){ 
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
            if($this->Currency->updateAll(array('Currency.is_deleted'=>1),array('Currency.id'=>$id)))
            {
            $this->Session->setFlash(__('The Currency has been deleted',h($id)));
            return $this->redirect(array('action'=>'index'));
            }
        }
    }
}