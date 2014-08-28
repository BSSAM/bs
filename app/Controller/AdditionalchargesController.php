<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class AdditionalchargesController extends AppController
{

    public $helpers = array('Html','Form','Session');

    public function index()
    {
        /*******************************************************
         *  BS V1.0
         *  User Additional Charges Permission
         *  Controller : Additional Charges
         *  Permission : view
         *******************************************************/
         $this->mj->find('all');
         $this->Model->find('all');
         echo $this->Html->link('ghg', array('controller' => 'gf', 'action' => 'fdf'));


        $user_role = $this->userrole_permission();
        if($user_role['other_additional']['view'] == 0){
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        $this->set('userrole',$user_role['other_additional']);
        /*
         * ---------------  Functionality of Users -----------------------------------
         */
        $data = $this->Additionalcharge->find('all',array('conditions'=>array('Additionalcharge.is_deleted'=>0)),array('order' => array('Additionalcharge.id' => 'DESC')));
        $this->set('additionalcharge', $data);
        //pr($data);
    }

    public function add()
    {
        /*
         * ---------------  User Additional Charges Condition  -------------------------------------
         */
        $user_role = $this->userrole_permission();
        if($user_role['other_additional']['add'] == 0){
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

            $this->Additionalcharge->create();

            if($this->Additionalcharge->save($this->request->data))
            {
                $this->Session->setFlash(__('Additional Charge is Added'));
                return $this->redirect(array('action'=>'index'));
            }
            $this->Session->setFlash(__('Additional Charge Could Not be Added'));
        }

    }

    public function edit($id = null)
    {
         /*
         * ---------------  User Additional Charges Condition  -------------------------------------
         */
        $user_role = $this->userrole_permission();
        if($user_role['other_additional']['edit'] == 0){
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }

        /*
         * ---------------  Functionality of Users -----------------------------------
         */
        if(empty($id))
        {
             $this->Session->setFlash(__('Invalid Entry'));
             return $this->redirect(array('action'=>'edit'));

        }

        $additionalcharge =  $this->Additionalcharge->findById($id);
       if(empty($additionalcharge))
       {
            $this->Session->setFlash(__('Invalid Additional Charge'));
            return $this->redirect(array('action'=>'edit'));

       }
        //$this->set('country',$data);
        if($this->request->is(array('post','put')))
       {

              $this->Additionalcharge->id = $id;


              if($this->Additionalcharge->save($this->request->data))
           {

               $this->Session->setFlash(__('Additional Charge is Updated'));
               return $this->redirect(array('action'=>'index'));
           }

            $this->Session->setFlash(__('Additional Charge Cant be Updated'));
        }
        else{
            $this->request->data = $additionalcharge;
        }

    }

    public function delete($id)
    {
         /*
         * ---------------  User Additional Charges Condition  -------------------------------------
         */
        $user_role = $this->userrole_permission();
        if($user_role['other_additional']['delete'] == 0){
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
            if($this->Additionalcharge->updateAll(array('Additionalcharge.is_deleted'=>1),array('Additionalcharge.id'=>$id)))
            {
            $this->Session->setFlash(__('The Additional Charge has been deleted',h($id)));
            return $this->redirect(array('action'=>'index'));
            }
        }
    }
}
