<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class UnitsController extends AppController
{
    
    public $helpers = array('Html','Form','Session');
    public $uses    =   array('Unit','Logactivity','Datalog');   
    
    public function index()
    {
        /*******************************************************
         *  BS V1.0
         *  User Role Permission
         *  Controller : Units
         *  Permission : view 
        *******************************************************/
        $user_role = $this->userrole_permission();
        if($user_role['ins_unit']['view'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        
        $this->set('userrole_cus',$user_role['ins_unit']);
        /*
         * *****************************************************
         */
        $unit_data = $this->Unit->find('all',array('conditions'=>array('Unit.is_deleted ='=>0)));
        $this->set('units', $unit_data);
        //pr($data);
    }
    
    public function add()
    {
        /*******************************************************
         *  BS V1.0
         *  User Role Permission
         *  Controller : Unit
         *  Permission : add 
         *  Description   :   add Unit Details page
         *******************************************************/
        $user_role = $this->userrole_permission();
        if($user_role['ins_unit']['add'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        /*
         * *****************************************************
         */
        $user_role = $this->userrole_permission();
        if($user_role['ins_unit']['add'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        
        if($this->request->is('post'))
        {
            if($this->Unit->save($this->request->data))
            {
                $last_insert_id =   $this->Unit->getLastInsertID();
                /******************
                    * Log Activity For Approval
                    */
                    $this->request->data['Logactivity']['logname'] = 'Unit';
                    $this->request->data['Logactivity']['logactivity'] = 'Add Unit';
                    $this->request->data['Logactivity']['logid'] = $last_insert_id;
                    $this->request->data['Logactivity']['user_id'] = $this->Session->read('sess_userid');
                    $this->request->data['Logactivity']['logapprove'] = 1;

                    $a = $this->Logactivity->save($this->request->data['Logactivity']);
                    
                /******************/
                    
                /******************
                    * Data Log Activity
                    */
                    $this->request->data['Datalog']['logname'] = 'Unit';
                    $this->request->data['Datalog']['logactivity'] = 'Add';
                    $this->request->data['Datalog']['logid'] = $last_insert_id;
                    $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                    
                    $a = $this->Datalog->save($this->request->data['Datalog']);
                    
                /******************/ 
                
                    
                $this->Session->setFlash(__('Unit is Added'));
                $this->redirect(array('controller'=>'Units','action'=>'index'));
            }
            $this->Session->setFlash(__('Unit Could Not be Added'));
        }
    }
    public function edit($id = null)
    {
        /*******************************************************
         *  BS V1.0
         *  User Role Permission
         *  Controller : Unit
         *  Permission : edit 
         *  Description   :   edit Unit Details page
         *******************************************************/
        $user_role = $this->userrole_permission();
        if($user_role['ins_unit']['edit'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        /*
         * *****************************************************
         */
        $user_role = $this->userrole_permission();
        
        $unit_dat = $this->Unit->find('first',array('conditions'=>array('Unit.id'=>$id),'recursive'=>'2'));
        $this->set('unit_dat',$unit_dat);
        
        if($user_role['ins_unit']['edit'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        if(empty($id))
        {
             $this->Session->setFlash(__('Invalid Entry'));
             return $this->redirect(array('action'=>'index'));
        }
        $units =  $this->Unit->findById($id); 
        if(empty($units))
        {
            $this->Session->setFlash(__('Invalid Unit'));
            return $this->redirect(array('action'=>'index'));
        }
        if($this->request->is(array('post','put')))
        {
            $this->Unit->id = $id;
            if($this->Unit->save($this->request->data))
            {
                /******************
                    * Data Log Activity
                    */
                    $this->request->data['Datalog']['logname'] = 'Unit';
                    $this->request->data['Datalog']['logactivity'] = 'Edit';
                    $this->request->data['Datalog']['logid'] = $id;
                    $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                    
                    $a = $this->Datalog->save($this->request->data['Datalog']);
                    
                /******************/
               $this->Session->setFlash(__('Unit is Updated'));
               return $this->redirect(array('controller'=>'Units','action'=>'index'));
            }
            $this->Session->setFlash(__('Unit Cant be Updated'));
        }
        else
        {
            $this->request->data = $units;
        }
    }
    
    public function delete($id)
    {
        /*******************************************************
         *  BS V1.0
         *  User Role Permission
         *  Controller : Unit
         *  Permission : Delete 
         *  Description   :   Delete Unit Details page
         *******************************************************/
        $user_role = $this->userrole_permission();
        if($user_role['ins_unit']['delete'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        /*
         * *****************************************************
         */
        $user_role = $this->userrole_permission();
        
        if($user_role['ins_unit']['delete'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
		
      /*  if($this->request->is('get'))
        {
            throw new MethodNotAllowedException();
        }*/
		
        if($this->Unit->updateAll(array('Unit.is_deleted'=>1,'Unit.status'=>0),array('Unit.id'=>$id)))
        {
            /******************
                    * Data Log Activity
                    */
                    $this->request->data['Datalog']['logname'] = 'Unit';
                    $this->request->data['Datalog']['logactivity'] = 'Delete';
                    $this->request->data['Datalog']['logid'] = $id;
                    $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                    
                    $a = $this->Datalog->save($this->request->data['Datalog']);
                    
            /******************/ 
            $this->Session->setFlash(__('The Unit has been deleted',h($id)));
            return $this->redirect(array('controller'=>'Units','action'=>'index'));
        }
    }
    
    public function approve()
    {
            $this->autoRender=false;
            $id =  $this->request->data['id'];
            $this->Unit->updateAll(array('Unit.is_approved'=>1),array('Unit.id'=>$id));
            $user_id = $this->Session->read('sess_userid');
            $this->Logactivity->updateAll(array('Logactivity.logapprove'=>2,'Logactivity.approved_by'=>$user_id),array('Logactivity.logid'=>$id,'Logactivity.logactivity'=>'Add Unit'));
            $details=$this->Unit->find('first',array('conditions'=>array('Unit.id'=>$id)));
            
    }
}