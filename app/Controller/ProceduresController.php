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
    public $uses    =   array('Range','Unit','Department','Procedure');   
    
    public function index()
    {
        /*******************************************************
         *  BS V1.0
         *  User Role Permission
         *  Controller : Procedures
         *  Permission : view 
        *******************************************************/
        $user_role = $this->userrole_permission();
        if($user_role['other_role']['view'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        /*
         * *****************************************************
         */
        $procedure_data = $this->Procedure->find('all',array('order'=>'Procedure.id Desc'));
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
        if($user_role['other_role']['add'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        /*
         * *****************************************************
         */
        $department_array =   $this->Department->find('list',array('conditions'=>array('Department.status'=>'1'),'fields'=>array('id','departmentname')));
        $this->set('departments',$department_array);
        if($this->request->is('post'))
        {
            if($this->Procedure->save($this->request->data))
            {
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
        if($user_role['other_role']['add'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        /*
         * *****************************************************
         */
       
        $department_array =   $this->Department->find('list',array('conditions'=>array('Department.status'=>'1'),'fields'=>array('id','departmentname')));
        $this->set('departments',$department_array);
        if(empty($id))
        {
             $this->Session->setFlash(__('Invalid Entry'));
             return $this->redirect(array('action'=>'edit'));
        }
        $procedure_data = $this->Procedure->findById($id); 
        if($this->request->is(array('post','put')))
        {
            $this->Procedure->id = $id;
            if($this->Procedure->save($this->request->data))
            {
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
        if($user_role['other_role']['add'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        /*
         * *****************************************************
         */
        if($this->request->is('get'))
        {
            throw new MethodNotAllowedException();
        }
        if($this->Procedure->delete($id))
        {
            $this->Session->setFlash(__('The Procedure has been deleted',h($id)));
            return $this->redirect(array('controller'=>'Procedures','action'=>'index'));
        }
    }
}