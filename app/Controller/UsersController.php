<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class UsersController extends AppController {

    public $helpers = array('Html', 'Form', 'Session');
    public $uses    =   array('UserDepartment','User');

    public function index($id=NULL) {
        /* 
         * ---------------  User Role Condition  -------------------------------------
         */
        $user_role = $this->userrole_permission();
        if($user_role['other_user']['view'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        $this->set('userrole',$user_role['other_user']);
        /*
         * ---------------  Functionality of Users -----------------------------------
         */
        $this->User->recursive = 1;
        
        
        if(empty($id)):
            $this->set('deleted_val',$id=0);
        endif;
        
        if($id == '1'):
        $data = $this->User->find('all',array('conditions'=>array('User.is_deleted'=>1),'order'=>array('User.id' => 'DESC'),'recursive'=>2));
        $this->set('deleted_val',$id);
        
        else:
        $data = $this->User->find('all',array('conditions'=>array('User.is_deleted'=>0),'order'=>array('User.id' => 'DESC'),'recursive'=>2));
        $this->set('deleted_val',$id);
        endif;
        
        
        $this->set('user', $data);
    }

    public function add() {

        /* 
         * ---------------  User Role Condition  -------------------------------------
         */
        $user_role = $this->userrole_permission();
        if($user_role['other_user']['add'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        
        /*
         * ---------------  Functionality of Users -----------------------------------
         */
        $this->loadModel('Userrole');
        $data = $this->Userrole->find('list', array('fields' => 'user_role'));
        $this->set('userrole', $data);

        $this->loadModel('Department');
        $data = $this->Department->find('list', array('fields' => 'departmentname'));
        $this->set('department', $data);


        if ($this->request->is('post')) {
            $this->request->data['status'] = 1;
            //pr($dat);exit;
            //$dat = $this->request->params[''];
           
            $match1 = $this->request->data['username'];
            $data1 = $this->User->findByUsername($match1);

            if (!empty($data1)) {
                $this->Session->setFlash(__('Username Entered is Already Exist'));

                return $this->redirect(array('action' => 'index'));
            }
            $this->User->create();
            
            if ($this->User->save($this->request->data)) {
                $user_id    =   $this->User->getLastInsertId();
                foreach($this->request->data['department_id'] as $k=>$v):
                    $this->UserDepartment->create();
                    $data['UserDepartment']['user_id']=$user_id;
                    $data['UserDepartment']['department_id']=$v;
                    $this->UserDepartment->save($data);
                endforeach;
                $this->Session->setFlash(__('User is Added'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('User Could Not be Added'));
        }
    }

    public function edit($id = null) {

        /* 
         * ---------------  User Role Condition  -------------------------------------
         */
        $user_role = $this->userrole_permission();
        if($user_role['other_user']['edit'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        
        /*
         * ---------------  Functionality of Users -----------------------------------
         */

        $this->loadModel('Userrole');
        $data = $this->Userrole->find('list', array('fields' => 'user_role'));
        $this->set('userrole', $data);

        $this->loadModel('Department');
        $data = $this->Department->find('list', array('fields' => 'departmentname'));
        $this->set('department', $data);

        if (empty($id)) {
            $this->Session->setFlash(__('Invalid Entry'));
            return $this->redirect(array('action' => 'index'));
        }

        $user = $this->User->findById($id);
       
        if (empty($user)) {
            $this->Session->setFlash(__('Invalid User'));
            return $this->redirect(array('action' => 'index'));
        }


        if ($this->request->is(array('post', 'put'))) {

           $userdepartment_array    =   $this->request->data['department_id'];
            if(!empty($userdepartment_array))
            {
                $this->UserDepartment->deleteAll(array('UserDepartment.user_id' => $id));
                foreach ($userdepartment_array as $key => $value) {
                    
                    $this->UserDepartment->create();
                    $dept_data = array('user_id' => $id, 'department_id' => $value);
                    $this->UserDepartment->save($dept_data);
                }
               
            }    

            $this->User->id = $id;


            if ($this->User->save($this->request->data)) {

                $this->Session->setFlash(__('User is Updated'));
                return $this->redirect(array('action' => 'index'));
            }

            $this->Session->setFlash(__('User Cant be Updated'));
        } else {
            $this->request->data = $user;
        }
    }

    public function delete($id) {
        
        /* 
         * ---------------  User Role Condition  -------------------------------------
         */
        $user_role = $this->userrole_permission();
        if($user_role['other_user']['delete'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        
        /*
         * ---------------  Functionality of Users -----------------------------------
         */
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
        if($id!='')
        {
            if($this->User->updateAll(array('User.is_deleted'=>1),array('User.id'=>$id)))
            {
            $this->Session->setFlash(__('The User has been deleted', h($id)));
            return $this->redirect(array('action' => 'index'));
            }
        }
    }
    
    public function retrieve($id) {
        
        /* 
         * ---------------  User Role Condition  -------------------------------------
         */
        $user_role = $this->userrole_permission();
        if($user_role['other_user']['delete'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        
        /*
         * ---------------  Functionality of Users -----------------------------------
         */
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
        if($id!='')
        {
            if($this->User->updateAll(array('User.is_deleted'=>0),array('User.id'=>$id)))
            {
            $this->Session->setFlash(__('The User has been Retrieved', h($id)));
            return $this->redirect(array('action' => 'index'));
            }
        }
    }

}
