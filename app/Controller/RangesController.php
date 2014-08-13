<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class RangesController extends AppController
{
    
    public $helpers = array('Html','Form','Session');
    public $uses    =   array('Range','Unit','Logactivity','Datalog');   
    
    public function index()
    {
        /*******************************************************
         *  BS V1.0
         *  User Role Permission
         *  Controller : Ranges
         *  Permission : view 
        *******************************************************/
        $user_role = $this->userrole_permission();
        if($user_role['ins_range']['view'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        
        $this->set('userrole_cus',$user_role['ins_range']);
        /*
         * *****************************************************
         */
        $range_data = $this->Range->find('all');
        $this->set('ranges', $range_data);
        
    }
    
    public function add()
    {
        /*******************************************************
         *  BS V1.0
         *  User Role Permission
         *  Controller : Range
         *  Permission : add 
         *  Description   :   add Range Details page
         *******************************************************/
        $user_role = $this->userrole_permission();
        if($user_role['ins_range']['add'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        /*
         * *****************************************************
         */
        $user_role = $this->userrole_permission();
        
        if($user_role['ins_range']['add'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        
        $unit_array =   $this->Unit->find('list',array('conditions'=>array('Unit.status'=>'1'),'fields'=>array('id','unit_name')));
        $this->set('units',$unit_array);
      
        if($this->request->is('post'))
        {
            if($this->Range->save($this->request->data))
            {
                $last_insert_id =   $this->Range->getLastInsertID();
                /******************
                    * Log Activity For Approval
                    */
                    $this->request->data['Logactivity']['logname'] = 'Range';
                    $this->request->data['Logactivity']['logactivity'] = 'Add Range';
                    $this->request->data['Logactivity']['logid'] = $last_insert_id;
                    $this->request->data['Logactivity']['user_id'] = $this->Session->read('sess_userid');
                    $this->request->data['Logactivity']['logapprove'] = 1;

                    $a = $this->Logactivity->save($this->request->data['Logactivity']);
                    
                /******************/
                    
                /******************
                    * Data Log Activity
                    */
                    $this->request->data['Datalog']['logname'] = 'Range';
                    $this->request->data['Datalog']['logactivity'] = 'Add';
                    $this->request->data['Datalog']['logid'] = $last_insert_id;
                    $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                    
                    $a = $this->Datalog->save($this->request->data['Datalog']);
                    
                /******************/ 
                $this->Session->setFlash(__('Range is Added'));
                $this->redirect(array('controller'=>'Ranges','action'=>'index'));
            }
            $this->Session->setFlash(__('Range Could Not be Added'));
        }
    }
    public function edit($id = null)
    {
        /*******************************************************
         *  BS V1.0
         *  User Role Permission
         *  Controller : Range
         *  Permission : Edit 
         *  Description   :   Edit Range Details page
         *******************************************************/
        $user_role = $this->userrole_permission();
        if($user_role['ins_range']['edit'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        /*
         * *****************************************************
         */
        $user_role = $this->userrole_permission();
        
        if($user_role['ins_range']['edit'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        
        $unit_array =   $this->Unit->find('list',array('conditions'=>array('Unit.status'=>'1'),'fields'=>array('id','unit_name')));
        $this->set('units',$unit_array);
        
        $range_dat = $this->Range->find('first',array('conditions'=>array('Range.id'=>$id),'recursive'=>'2'));
        $this->set('range_dat',$range_dat);
        
        if(empty($id))
        {
             $this->Session->setFlash(__('Invalid Entry'));
             return $this->redirect(array('action'=>'edit'));
        }
        $ranges =  $this->Range->findById($id); 
        if(empty($ranges))
        {
            $this->Session->setFlash(__('Invalid Range'));
            return $this->redirect(array('action'=>'edit'));
        }
        if($this->request->is(array('post','put')))
        {
            $this->Range->id = $id;
            if($this->Range->save($this->request->data))
            {
                /******************
                    * Data Log Activity
                    */
                    $this->request->data['Datalog']['logname'] = 'Range';
                    $this->request->data['Datalog']['logactivity'] = 'Edit';
                    $this->request->data['Datalog']['logid'] = $id;
                    $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                    
                    $a = $this->Datalog->save($this->request->data['Datalog']);
                    
                /******************/
               $this->Session->setFlash(__('Range is Updated'));
               return $this->redirect(array('controller'=>'Ranges','action'=>'index'));
            }
            $this->Session->setFlash(__('Range Cant be Updated'));
        }
        else
        {
            $this->request->data = $ranges;
        }
    }
    
    public function delete($id)
    {
        /*******************************************************
         *  BS V1.0
         *  User Role Permission
         *  Controller : Range
         *  Permission : Delete 
         *  Description   :   Delete Range Details page
         *******************************************************/
        $user_role = $this->userrole_permission();
        if($user_role['ins_range']['delete'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        /*
         * *****************************************************
         */
        $user_role = $this->userrole_permission();
        
        if($user_role['ins_range']['delete'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        
        if($this->request->is('get'))
        {
            throw new MethodNotAllowedException();
        }
        if($this->Range->updateAll(array('Range.is_deleted'=>1,'Range.status'=>0),array('Range.id'=>$id)))
        {
            /******************
                    * Data Log Activity
                    */
                    $this->request->data['Datalog']['logname'] = 'Range';
                    $this->request->data['Datalog']['logactivity'] = 'Delete';
                    $this->request->data['Datalog']['logid'] = $id;
                    $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                    
                    $a = $this->Datalog->save($this->request->data['Datalog']);
                    
            /******************/
            $this->Session->setFlash(__('The Range has been deleted',h($id)));
            return $this->redirect(array('controller'=>'Ranges','action'=>'index'));
        }
    }
    
    public function approve()
    {
            $this->autoRender=false;
            $id =  $this->request->data['id'];
            $this->Range->updateAll(array('Range.is_approved'=>1),array('Range.id'=>$id));
            $user_id = $this->Session->read('sess_userid');
            $this->Logactivity->updateAll(array('Logactivity.logapprove'=>2,'Logactivity.approved_by'=>$user_id),array('Logactivity.logid'=>$id,'Logactivity.logactivity'=>'Add Range'));
            $details=$this->Range->find('first',array('conditions'=>array('Range.id'=>$id)));
            
    }
}