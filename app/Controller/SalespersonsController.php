<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class SalespersonsController extends AppController
{
    
    public $helpers = array('Html','Form','Session');
    
    public function index()
    {
        /*******************************************************
         *  BS V1.0
         *  Salespersons Permission
         *  Controller : Salespersons
         *  Permission : view 
         *******************************************************/
        
        $user_role = $this->userrole_permission();
        if($user_role['cus_salesperson']['view'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        $this->set('userrole_cus',$user_role['cus_salesperson']);
        /*
         * ---------------  Functionality of Sales Persons -----------------------------------
         */
        $data = $this->Salesperson->find('all',array('conditions'=>array('Salesperson.is_deleted'=>0)),array('order' => array('Salesperson.id' => 'DESC')));
        $this->set('salesperson', $data);
        //pr($data);
    }
    
    public function find()
    {
        
        $data = $this->Salesperson->find('all');
        $this->set('salesperson', $data);
        
        Configure::write('debug', 0);
        $this->layout = 'ajax';
        $this->autoRender = false;
        $this->RequestHandler->respondAs('text/x-json');
//echo json_encode($this->Client->getSurname($this->params['url']['term'],$ClientSearchby));
        $str=$this->params['url']['term'];
        echo $str;exit;
        if(!empty($str))
        {
        $rs = array();
        $search1 = array();
        $search1 = $this->Resource->find('all', array(
        'recursive' => 2,
        'conditions'=>array('Resource.name LIKE'=>'%'.$str.'%'),
        'fields'=>array('surname','firstname','id')
        ));
        if (!empty($search1))
        {
        foreach ($search1 as $key => $val)
        {
        $image=$val["ResourceImage"][0]["url"];
        $rs[] = array('value' => $val['Resource']['id'],
        'label' =>$val['Resource']['firstname']." ".$val['Resource']['surname'],'image'=>$image,
        );
        }
        }
        echo json_encode($rs);
        }
        exit;
        //pr($data);
    }
    
    public function search($ClientSearchby = null)
    {
        //$ClientSearchby = 'surname';
        //echo json_encode($this->Client->getSurname($this->params['url']['term']));
Configure::write('debug', 0);
$this->layout = 'ajax';
$this->autoRender = false;
$this->RequestHandler->respondAs('text/x-json');
//echo json_encode($this->Client->getSurname($this->params['url']['term'],$ClientSearchby));
$str=$this->params['url']['term'];
if(!empty($str))
{
$rs = array();
$search1 = array();
$search1 = $this->Resource->find('all', array(
'recursive' => 2,
'conditions'=>array('Resource.name LIKE'=>'%'.$str.'%'),
'fields'=>array('surname','firstname','id')
));
if (!empty($search1))
{
foreach ($search1 as $key => $val)
{
$image=$val["ResourceImage"][0]["url"];
$rs[] = array('value' => $val['Resource']['id'],
'label' =>$val['Resource']['firstname']." ".$val['Resource']['surname'],'image'=>$image,
);
}
}
echo json_encode($rs);
}
exit;
}


    
    public function add()
    {
        /* 
         * ---------------  Sales Persons Condition  -------------------------------------
         */
        $user_role = $this->userrole_permission();
        if($user_role['cus_salesperson']['add'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        
        /*
         * ---------------  Functionality of Sales Persons -----------------------------------
         */
      
        if($this->request->is('post'))
        {
             $this->request->data['status']=1;
            //pr($dat);exit;
             //$dat = $this->request->params[''];
             $match1 = $this->request->data['salesperson'];
             $data1 = $this->Salesperson->findBySalesperson($match1);
             
            if(!empty($data1))
            {
                $this->Session->setFlash(__('Sales Person Name is Already Exist'));
               
                return $this->redirect(array('action'=>'add'));
            }
            $this->Salesperson->create();
           
            if($this->Salesperson->save($this->request->data))
            {
                $this->Session->setFlash(__('Sales Person is Added'));
                return $this->redirect(array('action'=>'index'));
            }
            $this->Session->setFlash(__('Sales Person Could Not be Added'));
           
        }
       
    }
    public function edit($id = NULL)
    {
        /* 
         * ---------------  Sales Persons Condition  -------------------------------------
         */
        $user_role = $this->userrole_permission();
        if($user_role['cus_salesperson']['edit'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        
        /*
         * ---------------  Functionality of Sales Persons -----------------------------------
         */
        if(empty($id))
        {
             $this->Session->setFlash(__('Invalid Sales Person'));
             return $this->redirect(array('action'=>'edit'));
        }
        $sales_details =  $this->Salesperson->findById($id); 
        if(empty($sales_details))
        {
           $this->Session->setFlash(__('Invalid Sales Person'));
             return $this->redirect(array('action'=>'edit'));
        }
        if($this->request->is(array('post','put')))
        {
            $this->Salesperson->id = $id;
            if($this->Salesperson->save($this->request->data))
            {
               $this->Session->setFlash(__('Sales Person is Updated'));
               return $this->redirect(array('action'=>'index'));
            }
            $this->Session->setFlash(__('Sales Person Cant be Updated'));
        }
        else
        {
            $this->request->data =  $sales_details;
        }
    }
    public function delete($id)
    {
        /* 
         * ---------------  Sales Persons Condition  -------------------------------------
         */
        $user_role = $this->userrole_permission();
        if($user_role['cus_salesperson']['delete'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        
        /*
         * ---------------  Functionality of Sales Persons -----------------------------------
         */
        $this->autoRender=false;
        if($id=='')
        {
            throw new MethodNotAllowedException();
        }
        
        if($id!='')
        {
            if($this->Salesperson->updateAll(array('Salesperson.is_deleted'=>1),array('Salesperson.id'=>$id)))
            {
            $this->Session->setFlash(__('Sales Person Cant be Updated'));
            return $this->redirect(array('action'=>'index'));
            }
        }
    }
}