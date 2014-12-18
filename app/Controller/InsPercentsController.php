<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class InsPercentsController extends AppController
{
    
    public $helpers = array('Html','Form','Session');
    public $uses    =   array('InsPercent','Logactivity','Datalog');   
    
    public function index()
    {
        /*******************************************************
         *  BS V1.0
         *  User Role Permission
         *  Controller : InsPercent
         *  Permission : view 
        *******************************************************/
//        $user_role = $this->userrole_permission();
//        if($user_role['ins_brand']['view'] == 0){ 
//            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
//        }
        
        //$this->set('userrole_cus',$user_role['ins_brand']);
        /*
         * *****************************************************
         */
        $InsPercent_data = $this->InsPercent->find('all',array('conditions'=>array('InsPercent.is_deleted ='=>0)));
        $this->set('percent', $InsPercent_data);
        //pr($data);
    }
    
    public function add()
    {
        /*******************************************************
         *  BS V1.0
         *  User Role Permission
         *  Controller : InsPercent
         *  Permission : add 
         *  Description   :   add Percent Details page
         *******************************************************/
//        $user_role = $this->userrole_permission();
//        if($user_role['ins_brand']['add'] == 0){ 
//            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
//        }
        /*
         * *****************************************************
         */
        if($this->request->is('post'))
        {
            $this->request->data['status']=1;
            if($this->InsPercent->save($this->request->data))
            {
                $last_insert_id =   $this->InsPercent->getLastInsertID();
                
                $this->Session->setFlash(__('Percent is Added'));
                $this->redirect(array('controller'=>'InsPercents','action'=>'index'));
            }
            $this->Session->setFlash(__('Percent Could Not be Added'));
        }
    }
    public function edit($id = null)
    {
        /*******************************************************
         *  BS V1.0
         *  User Role Permission
         *  Controller : InsPercent
         *  Permission : Edit 
         *  Description   :   Edit Percent Details page
         *******************************************************/
//        $user_role = $this->userrole_permission();
//        if($user_role['ins_brand']['edit'] == 0){ 
//            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
//        }
        /*
         * *****************************************************
         */
        $percent_dat = $this->InsPercent->find('first',array('conditions'=>array('InsPercent.id'=>$id),'recursive'=>'2'));
        
        $this->set('percent_dat',$percent_dat);
        if(empty($id))
        {
             $this->Session->setFlash(__('Invalid Entry'));
             return $this->redirect(array('action'=>'index'));
        }
        $percents =  $this->InsPercent->findById($id); 
        if(empty($percents))
        {
            $this->Session->setFlash(__('Invalid Percent'));
            return $this->redirect(array('action'=>'index'));
        }
        if($this->request->is(array('post','put')))
        {
            
            $this->InsPercent->id = $id;
            if($this->InsPercent->save($this->request->data))
            {
                
               $this->Session->setFlash(__('Percent is Updated'));
               return $this->redirect(array('controller'=>'InsPercents','action'=>'index'));
            }
            $this->Session->setFlash(__('Percent Cant be Updated'));
        }
        else
        {
            $this->request->data = $percents;
        }
    }
    
    public function delete($id)
    {
        /*******************************************************
         *  BS V1.0
         *  User Role Permission
         *  Controller : Percent
         *  Permission : Delete 
         *  Description   :   Delete Percent Details page
         *******************************************************/
//        $user_role = $this->userrole_permission();
//        if($user_role['ins_brand']['delete'] == 0){ 
//            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
//        }
        /*
         * *****************************************************
         */
        if($this->request->is('get'))
        {
            throw new MethodNotAllowedException();
        }
        if($this->InsPercent->updateAll(array('InsPercent.is_deleted'=>1,'InsPercent.status'=>0),array('InsPercent.id'=>$id)))
        {
             
            $this->Session->setFlash(__('The Percent has been deleted',h($id)));
            return $this->redirect(array('controller'=>'InsPercents','action'=>'index'));
        }
    }
//    public function approve()
//    {
//            $this->autoRender=false;
//            $id =  $this->request->data['id'];
//            $this->Brand->updateAll(array('Brand.is_approved'=>1),array('Brand.id'=>$id));
//            $user_id = $this->Session->read('sess_userid');
//            $this->Logactivity->updateAll(array('Logactivity.logapprove'=>2,'Logactivity.approved_by'=>$user_id),array('Logactivity.logid'=>$id,'Logactivity.logactivity'=>'Add Brand'));
//            $details=$this->Brand->find('first',array('conditions'=>array('Brand.id'=>$id)));
//            
//    }
}