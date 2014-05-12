<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class UsersController extends AppController
{
    
    public $helpers = array('Html','Form','Session');
    
    public function index()
    {
        $this->User->recursive = 1; 
        $data = $this->User->find('all',array('order' => array('User.id' => 'DESC')));
        //pr($data);exit;
        $this->set('user', $data);
       
//        //pr($data);
//               // pr($data);exit;
//        $data1 = $this->User->find('all');
//         $this->loadModel('Department');
//        // pr($data1);exit;
//       for($i=0;$i<(count($data1));$i++)
//       {
//        $a = $data1[$i]['User']['department_id'];
//        $b = explode(',', $a);
//        $c[]=$b;
//       }// pr($c);
//       foreach($c as $d=>$e)
//       {
//           foreach($e as $f)
//           {
//               pr($f);
//            $da2[]= $this->Department->findById($f,array('fields' => 'departmentname'));}
//        
//       }
//       pr($da2);exit;
//       for($i=0;$i<(count($c));$i++)
//       {
//           for($j=0;$j<$i;$j++)
//         
//           {
//               $d[]= $c[$i][$j];
//           }
//         }
//       pr($d);
//       exit;
//       exit;  
//          
    
    }
    
    public function add()
    {
        
     
        $this->loadModel('Userrole');
         $data = $this->Userrole->find('list', array('fields' => 'user_role'));
        $this->set('userrole',$data);
        
        $this->loadModel('Department');
         $data = $this->Department->find('list', array('fields' => 'departmentname'));
        $this->set('department',$data);
        
        
         if($this->request->is('post'))
        {
             $this->request->data['status']=1;
            //pr($dat);exit;
             //$dat = $this->request->params[''];
            
              $match2 = $this->request->data['department_id'];
              $dept = implode(',',$match2);
              $this->request->data['department_id'] = $dept;
              
             
             $match1 = $this->request->data['username'];
             $data1 = $this->User->findByUsername($match1);
             
            if(!empty($data1))
            {
                $this->Session->setFlash(__('Username Entered is Already Exist'));
               
                return $this->redirect(array('action'=>'add'));
            }
            $this->User->create();
           
            if($this->User->save($this->request->data))
            {
                $this->Session->setFlash(__('User is Added'));
                return $this->redirect(array('action'=>'index'));
            }
            $this->Session->setFlash(__('User Could Not be Added'));
           
        }
       
    }
    
    public function edit($id = null)
    {
          
        
        
        $this->loadModel('Userrole');
         $data = $this->Userrole->find('list', array('fields' => 'user_role'));
        $this->set('userrole',$data);
        
        $this->loadModel('Department');
         $data = $this->Department->find('list', array('fields' => 'departmentname'));
        $this->set('department',$data);
       
        if(empty($id))
        {
             $this->Session->setFlash(__('Invalid Entry'));
             return $this->redirect(array('action'=>'edit'));
          
        }
        
        $user =  $this->User->findById($id); 
       if(empty($user))
       {
           $this->Session->setFlash(__('Invalid User'));
             return $this->redirect(array('action'=>'edit'));
          
       }
       
        
         if($this->request->is(array('post','put')))
       {
             
             $match2 = $this->request->data['department_id'];
              $dept = implode(',',$match2);
              $this->request->data['department_id'] = $dept;
             
            
              $this->User->id = $id;
             
          
              if($this->User->save($this->request->data))
           {
               
               $this->Session->setFlash(__('User is Updated'));
               return $this->redirect(array('action'=>'index'));
           }
            
            $this->Session->setFlash(__('User Cant be Updated'));
        }
        else{
            $this->request->data = $user;
        }
   
    }
    
     public function delete($id)
    {
        if($this->request->is('get'))
        {
            throw new MethodNotAllowedException();
        }
        if($this->User->delete($id))
        {
            $this->Session->setFlash(__('The User has been deleted',h($id)));
            return $this->redirect(array('action'=>'index'));
        }
    }
    
}