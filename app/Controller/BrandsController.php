<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class BrandsController extends AppController
{
    
    public $helpers = array('Html','Form','Session');
    public $uses    =   array('Brand','Logactivity','Datalog');   
    
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
        $brand_data = $this->Brand->find('all',array('conditions'=>array('Brand.is_deleted ='=>0)));
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
                $last_insert_id =   $this->Brand->getLastInsertID();
                 /******************
                    * Log Activity For Approval
                    */
                    $this->request->data['Logactivity']['logname'] = 'Brand';
                    $this->request->data['Logactivity']['logactivity'] = 'Add Brand';
                    $this->request->data['Logactivity']['logid'] = $last_insert_id;
                    $this->request->data['Logactivity']['user_id'] = $this->Session->read('sess_userid');
                    $this->request->data['Logactivity']['logapprove'] = 1;

                    $a = $this->Logactivity->save($this->request->data['Logactivity']);
                    
                /******************/
                    
                /******************
                    * Data Log Activity
                    */
                    $this->request->data['Datalog']['logname'] = 'Brand';
                    $this->request->data['Datalog']['logactivity'] = 'Add';
                    $this->request->data['Datalog']['logid'] = $last_insert_id;
                    $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                    
                    $a = $this->Datalog->save($this->request->data['Datalog']);
                    
                /******************/
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
        $brand_dat = $this->Brand->find('first',array('conditions'=>array('Brand.id'=>$id),'recursive'=>'2'));
        $this->set('brand_dat',$brand_dat);
        if(empty($id))
        {
             $this->Session->setFlash(__('Invalid Entry'));
             return $this->redirect(array('action'=>'index'));
        }
        $brands =  $this->Brand->findById($id); 
        if(empty($brands))
        {
            $this->Session->setFlash(__('Invalid Brand'));
            return $this->redirect(array('action'=>'index'));
        }
        if($this->request->is(array('post','put')))
        {
            $this->Brand->id = $id;
            if($this->Brand->save($this->request->data))
            {
                 /******************
                    * Data Log Activity
                    */
                    $this->request->data['Datalog']['logname'] = 'Brand';
                    $this->request->data['Datalog']['logactivity'] = 'Edit';
                    $this->request->data['Datalog']['logid'] = $id;
                    $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                    
                    $a = $this->Datalog->save($this->request->data['Datalog']);
                    
                /******************/
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
             /******************
                    * Data Log Activity
                    */
                    $this->request->data['Datalog']['logname'] = 'Brand';
                    $this->request->data['Datalog']['logactivity'] = 'Delete';
                    $this->request->data['Datalog']['logid'] = $id;
                    $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                    
                    $a = $this->Datalog->save($this->request->data['Datalog']);
                    
            /******************/ 
            $this->Session->setFlash(__('The Brand has been deleted',h($id)));
            return $this->redirect(array('controller'=>'Brands','action'=>'index'));
        }
    }
    public function approve()
    {
            $this->autoRender=false;
            $id =  $this->request->data['id'];
            $this->Brand->updateAll(array('Brand.is_approved'=>1),array('Brand.id'=>$id));
            $user_id = $this->Session->read('sess_userid');
            $this->Logactivity->updateAll(array('Logactivity.logapprove'=>2,'Logactivity.approved_by'=>$user_id),array('Logactivity.logid'=>$id,'Logactivity.logactivity'=>'Add Brand'));
            $details=$this->Brand->find('first',array('conditions'=>array('Brand.id'=>$id)));
            
    }
}