<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class BrandsController extends AppController
{
    
    public $helpers = array('Html','Form','Session');
    public $uses    =   array('Brand');   
    
    public function index()
    {
        /*******************************************************
         *  BS V1.0
         *  User Role Permission
         *  Controller : Brand
         *  Permission : view 
        *******************************************************/
        $user_role = $this->userrole_permission();
        if($user_role['ins_brand']['view'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        
        $this->set('userrole_cus',$user_role['ins_brand']);
        /*
         * *****************************************************
         */
        $brand_data = $this->Brand->find('all');
        $this->set('brands', $brand_data);
        //pr($data);
    }
    
    public function add()
    {
        /*******************************************************
         *  BS V1.0
         *  User Role Permission
         *  Controller : Brand
         *  Permission : add 
         *  Description   :   add Brand Details page
         *******************************************************/
        $user_role = $this->userrole_permission();
        if($user_role['ins_brand']['add'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        /*
         * *****************************************************
         */
        if($this->request->is('post'))
        {
            $this->request->data['status']=1;
            if($this->Brand->save($this->request->data))
            {
                $this->Session->setFlash(__('Brand is Added'));
                $this->redirect(array('controller'=>'Brands','action'=>'index'));
            }
            $this->Session->setFlash(__('Department Could Not be Added'));
        }
    }
    public function edit($id = null)
    {
        /*******************************************************
         *  BS V1.0
         *  User Role Permission
         *  Controller : Brand
         *  Permission : Edit 
         *  Description   :   Edit Brand Details page
         *******************************************************/
        $user_role = $this->userrole_permission();
        if($user_role['ins_brand']['edit'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        /*
         * *****************************************************
         */
        if(empty($id))
        {
             $this->Session->setFlash(__('Invalid Entry'));
             return $this->redirect(array('action'=>'edit'));
        }
        $brands =  $this->Brand->findById($id); 
        if(empty($brands))
        {
            $this->Session->setFlash(__('Invalid Brand'));
            return $this->redirect(array('action'=>'edit'));
        }
        if($this->request->is(array('post','put')))
        {
            $this->Brand->id = $id;
            if($this->Brand->save($this->request->data))
            {
               $this->Session->setFlash(__('Brand is Updated'));
               return $this->redirect(array('controller'=>'Brands','action'=>'index'));
            }
            $this->Session->setFlash(__('Brand Cant be Updated'));
        }
        else
        {
            $this->request->data = $brands;
        }
    }
    
    public function delete($id)
    {
        /*******************************************************
         *  BS V1.0
         *  User Role Permission
         *  Controller : Brand
         *  Permission : Delete 
         *  Description   :   Delete Brand Details page
         *******************************************************/
        $user_role = $this->userrole_permission();
        if($user_role['ins_brand']['delete'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        /*
         * *****************************************************
         */
        if($this->request->is('get'))
        {
            throw new MethodNotAllowedException();
        }
        if($this->Brand->updateAll(array('Brand.is_deleted'=>1,'Brand.status'=>0),array('Brand.id'=>$id)))
        {
            $this->Session->setFlash(__('The Brand has been deleted',h($id)));
            return $this->redirect(array('controller'=>'Brands','action'=>'index'));
        }
    }
}