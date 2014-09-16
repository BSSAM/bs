<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class TallyledgersController extends AppController
{
    
    public $helpers = array('Html','Form','Session');
    
    public function index()
    {
        /*******************************************************
         *  BS V1.0
         *  User Tally ledgers Permission
         *  Controller : Tally Ledgers
         *  Permission : view 
         *******************************************************/
        
        $user_role = $this->userrole_permission();
        if($user_role['other_tallyledger']['view'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        $this->set('userrole',$user_role['other_tallyledger']);
        /*
         * ---------------  Functionality of Users -----------------------------------
         */
        $data = $this->Tallyledger->find('all',array('conditions'=>array('Tallyledger.is_deleted'=>0)),array('order' => array('Tallyledger.id' => 'DESC')));
        $this->set('tallyledger', $data);
        //pr($data);
    }
    
    public function add()
    {
        /* 
         * ---------------  User Tally ledger Condition  -------------------------------------
         */
        $user_role = $this->userrole_permission();
        if($user_role['other_tallyledger']['add'] == 0){ 
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
             $match1 = $this->request->data['tallyledgeraccount'];
             $data1 = $this->Tallyledger->findByTallyledgeraccount($match1);
            if(!empty($data1))
            {
                $this->Session->setFlash(__('Tally Ledger A/C Entered is Already Exist'));
               
                return $this->redirect(array('action'=>'index'));
            }
            $this->Tallyledger->create();
           
            if($this->Tallyledger->save($this->request->data))
            {
                $this->Session->setFlash(__('Tally Ledger A/C is Added'));
                return $this->redirect(array('action'=>'index'));
            }
            $this->Session->setFlash(__('Tally Ledger A/C Could Not be Added'));
           
        }
       
    }
    
    public function edit($id = null)
    {
        /* 
         * ---------------  User Tally ledger Condition  -------------------------------------
         */
        $user_role = $this->userrole_permission();
        if($user_role['other_tallyledger']['edit'] == 0){ 
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
        
        $tallyledger =  $this->Tallyledger->findById($id); 
       if(empty($tallyledger))
       {
            $this->Session->setFlash(__('Invalid Tally ledger A/C'));
            return $this->redirect(array('action'=>'index'));
          
       }
        //$this->set('country',$data);
        if($this->request->is(array('post','put')))
       {
             
              $this->Tallyledger->id = $id;
             
          
              if($this->Tallyledger->save($this->request->data))
           {
               
               $this->Session->setFlash(__('Tally Ledger A/C is Updated'));
               return $this->redirect(array('action'=>'index'));
           }
            
            $this->Session->setFlash(__('Tally Ledger A/C Cant be Updated'));
        }
        else{
            $this->request->data = $tallyledger;
        }
       
    }
    
    public function delete($id)
    {
        /* 
         * ---------------  User Tally ledger Condition  -------------------------------------
         */
        $user_role = $this->userrole_permission();
        if($user_role['other_tallyledger']['delete'] == 0){ 
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
            if($this->Tallyledger->updateAll(array('Tallyledger.is_deleted'=>1),array('Tallyledger.id'=>$id)))
            {
            $this->Session->setFlash(__('Tally Ledger A/C has been deleted',h($id)));
            return $this->redirect(array('action'=>'index'));
            }
        }
    }
}