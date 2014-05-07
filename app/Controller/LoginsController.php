<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class LoginsController extends AppController
{
    public $helpers = array('Session');
     
    public function index()
    {
        $i = 0;
        $this->loadModel('User');
        $sess_username = $this->Session->read('sess_username');
        $sess_login_failure = $this->Session->read('sess_login_failure');
        if(isset($sess_login_failure))
        {
            $this->set('sess_login_failure',$sess_login_failure);
            $this->Session->delete('sess_login_failure');
        }
        if(isset($sess_username))
        {
            return $this->redirect(array('controller' => 'Dashboards','action'=>'index'));
        }
        else
        {
        if($this->request->is('post'))
        {
            $data = $this->User->find('all');
            $count_user = $this->User->find('count');
            $post_output = $this->request->data;
        
            for($i=$count_user; $i--;)
            {
                $user_check = $data[$i]['User']['username'];
                $pass_check = $data[$i]['User']['password'];
                if(($user_check == $post_output['val_username'])&&($pass_check == $post_output['val_password']))
                {
                    $this->Session->write('sess_username', $data[$i]['User']['username']);
                    $this->Session->write('sess_userid', $data[$i]['User']['id']);
                    return $this->redirect(array('controller' => 'Dashboards','action'=>'index'));
                }
            }
            $this->Session->write('sess_login_failure','Your Username or Password is Wrong');
            return $this->redirect(array('action'=>'index'));
        }  
        }
       
    }
    
    public function logout()
    {
        $this->Session->destroy();
        return $this->redirect(array('action'=>'/'));
    }
   
}
