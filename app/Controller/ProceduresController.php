<?php
/*
 * Document     :   ProceduresController.php
 * Controller   :   Procedures No
 * Model        :   Procedure 
 * Created By   :   M.Iyappan Samsys
 */
class ProceduresController extends AppController
{
    
    public $helpers = array('Html','Form','Session');
    public $uses    =   array('Range','Unit','Department','Procedure','Logactivity','Datalog');   
    
    public function index($id=NULL)
    {
        /*******************************************************
         *  BS V1.0
         *  User Role Permission
         *  Controller : Procedures
         *  Permission : view 
        *******************************************************/
        $user_role = $this->userrole_permission();
        if($user_role['ins_procedureno']['view'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        
        $this->set('userrole_cus',$user_role['ins_instrument']);
        /*
         * *****************************************************
         */
        
        if(empty($id)):
            $this->set('deleted_val',$id=0);
        endif;
        if($id == '3'):
        $procedure_data = $this->Procedure->find('all',array('conditions'=>array('Procedure.is_deleted'=>1)),array('order'=>'Procedure.id Desc'));
        $this->set('deleted_val',$id);
        elseif($id == '2'):
        $procedure_data = $this->Procedure->find('all',array('conditions'=>array('Procedure.is_deleted'=>0,'Procedure.is_approved'=>0)),array('order'=>'Procedure.id Desc'));
        $this->set('deleted_val',$id);
        elseif($id == '1'):
        $procedure_data = $this->Procedure->find('all',array('conditions'=>array('Procedure.is_deleted'=>0,'Procedure.is_approved'=>1)),array('order'=>'Procedure.id Desc'));
        $this->set('deleted_val',$id);
        else:
        $procedure_data = $this->Procedure->find('all',array('conditions'=>array('Procedure.is_deleted'=>0)),array('order'=>'Procedure.id Desc'));
        $this->set('deleted_val',$id);
        endif;
        
        //$procedure_data = $this->Procedure->find('all',array('conditions'=>array('Procedure.is_deleted'=>0)),array('order'=>'Procedure.id Desc'));
        $this->set('procedures', $procedure_data);
        
    }
    
    public function add()
    {
        /*******************************************************
         *  BS V1.0
         *  User Role Permission
         *  Controller : Procedures
         *  Permission : add 
         *  Description   :   add Procedures Details page
         *******************************************************/
        $user_role = $this->userrole_permission();
        if($user_role['ins_procedureno']['add'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        /*
         * *****************************************************
         */
       $department_array =   $this->Department->find('list',array('conditions'=>array('Department.status'=>1,'Department.is_deleted'=>0),'fields'=>array('id','departmentname')));
        $this->set('departments',$department_array);
        if($this->request->is('post'))
        {
            if($this->Procedure->save($this->request->data))
            {
                $last_insert_id =   $this->Procedure->getLastInsertID();
                /******************
                    * Log Activity For Approval
                    */
                    $this->request->data['Logactivity']['logname'] = 'Procedure No';
                    $this->request->data['Logactivity']['logactivity'] = 'Add Procedure No';
                    $this->request->data['Logactivity']['logid'] = $last_insert_id;
                    $this->request->data['Logactivity']['user_id'] = $this->Session->read('sess_userid');
                    $this->request->data['Logactivity']['logapprove'] = 1;

                    $a = $this->Logactivity->save($this->request->data['Logactivity']);
                    
                /******************/
                    
                /******************
                    * Data Log Activity
                    */
                    $this->request->data['Datalog']['logname'] = 'Procedure No';
                    $this->request->data['Datalog']['logactivity'] = 'Add';
                    $this->request->data['Datalog']['logid'] = $last_insert_id;
                    $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                    
                    $a = $this->Datalog->save($this->request->data['Datalog']);
                    
                /******************/ 
                $this->Session->setFlash(__('Procedure is Added Successfully'));
                $this->redirect(array('controller'=>'Procedures','action'=>'index'));
            }
            $this->Session->setFlash(__('Procedure Could Not be Added'));
        }
    }
    public function edit($id = NULL)
    {
         /*******************************************************
         *  BS V1.0
         *  User Role Permission
         *  Controller : Procedures
         *  Permission : Edit 
         *  Description   :   Edit Procedures Details page
         *******************************************************/
        $user_role = $this->userrole_permission();
        if($user_role['ins_procedureno']['edit'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        /*
         * *****************************************************
         */
        $procedure_dat = $this->Procedure->find('first',array('conditions'=>array('Procedure.id'=>$id),'recursive'=>'2'));
        $this->set('procedure_dat',$procedure_dat);
        $department_array =   $this->Department->find('list',array('conditions'=>array('Department.status'=>1,'Department.is_deleted'=>0),'fields'=>array('id','departmentname')));
        $this->set('departments',$department_array);
        if(empty($id))
        {
             $this->Session->setFlash(__('Invalid Entry'));
             return $this->redirect(array('action'=>'index'));
        }
        $procedure_data = $this->Procedure->findById($id); 
        if($this->request->is(array('post','put')))
        {
            $this->Procedure->id = $id;
            if($this->Procedure->save($this->request->data))
            {
                /******************
                    * Data Log Activity
                    */
                    $this->request->data['Datalog']['logname'] = 'Procedure No';
                    $this->request->data['Datalog']['logactivity'] = 'Edit';
                    $this->request->data['Datalog']['logid'] = $id;
                    $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                    
                    $a = $this->Datalog->save($this->request->data['Datalog']);
                    
                /******************/
               $this->Session->setFlash(__('Procedure is Updated Successfully'));
               return $this->redirect(array('controller'=>'Procedures','action'=>'index'));
            }
            $this->Session->setFlash(__('Procedure Cant be Updated'));
        }
        else
        {
            $this->request->data = $procedure_data;
        }
    }
    public function delete($id)
    {
        /*******************************************************
         *  BS V1.0
         *  User Role Permission
         *  Controller : Procedures
         *  Permission : Delete 
         *  Description   :   Delete Procedures Details page
         *******************************************************/
        $user_role = $this->userrole_permission();
        if($user_role['ins_procedureno']['delete'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        /*
         * *****************************************************
         */
        if($this->request->is('get'))
        {
            throw new MethodNotAllowedException();
        }
        if($this->Procedure->updateAll(array('Procedure.is_deleted'=>1,'Procedure.status'=>0),array('Procedure.id'=>$id)))
        {
            /******************
                    * Data Log Activity
                    */
                    $this->request->data['Datalog']['logname'] = 'Procedure No';
                    $this->request->data['Datalog']['logactivity'] = 'Delete';
                    $this->request->data['Datalog']['logid'] = $id;
                    $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                    
                    $a = $this->Datalog->save($this->request->data['Datalog']);
                    
            /******************/ 
            $this->Session->setFlash(__('The Procedure has been deleted',h($id)));
            return $this->redirect(array('controller'=>'Procedures','action'=>'index'));
        }
    }
    
    public function retrieve($id)
    {
        /*******************************************************
         *  BS V1.0
         *  User Role Permission
         *  Controller : Procedures
         *  Permission : Delete 
         *  Description   :   Delete Procedures Details page
         *******************************************************/
        $user_role = $this->userrole_permission();
        if($user_role['ins_procedureno']['delete'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        /*
         * *****************************************************
         */
        if($this->request->is('get'))
        {
            throw new MethodNotAllowedException();
        }
        if($this->Procedure->updateAll(array('Procedure.is_deleted'=>0,'Procedure.status'=>1),array('Procedure.id'=>$id)))
        {
            /******************
                    * Data Log Activity
                    */
                    $this->request->data['Datalog']['logname'] = 'Procedure No';
                    $this->request->data['Datalog']['logactivity'] = 'Retrieve';
                    $this->request->data['Datalog']['logid'] = $id;
                    $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                    
                    $a = $this->Datalog->save($this->request->data['Datalog']);
                    
            /******************/ 
            $this->Session->setFlash(__('The Procedure has been Retrieved',h($id)));
            return $this->redirect(array('controller'=>'Procedures','action'=>'index'));
        }
    }
    
    public function approve()
    {
            $this->autoRender=false;
            $id =  $this->request->data['id'];
            $this->Procedure->updateAll(array('Procedure.is_approved'=>1),array('Procedure.id'=>$id));
            $user_id = $this->Session->read('sess_userid');
            $this->Logactivity->updateAll(array('Logactivity.logapprove'=>2,'Logactivity.approved_by'=>$user_id),array('Logactivity.logid'=>$id,'Logactivity.logactivity'=>'Add Procedure No'));
            $details=$this->Procedure->find('first',array('conditions'=>array('Procedure.id'=>$id)));
            
    }
}