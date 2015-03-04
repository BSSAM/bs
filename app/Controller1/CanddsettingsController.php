<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class CanddsettingsController extends AppController
{
    public $helpers =   array('Html','Form','Session');
    public $uses    =   array('Priority','Paymentterm','Quotation','Currency','Deliveryorder','ReadytodeliverItem','CollectionDelivery',
                            'Country','Additionalcharge','Service','CustomerInstrument','Customerspecialneed','Contactpersoninfo','Canddsetting',
                            'Instrument','Brand','Customer','Device','Salesorder','Description','Candd','Assign','branch','Logactivity','Datalog');
    public function index($id = NULL)
    {
        $canddsetting =    $this->Canddsetting->find('all',array('conditions'=>array('Canddsetting.is_deleted'=>0)));
        //pr($cd_statistics);exit;
        
        //echo date('Y-m-d', strtotime('0 days'));
        if(empty($id)):
            $this->set('deleted_val',$id=0);
        endif;
        
        if($id == '1'):
        $canddsetting =    $this->Canddsetting->find('all',array('conditions'=>array('Canddsetting.is_deleted'=>1)));
        $this->set('deleted_val',$id);
        
        else:
        $canddsetting =    $this->Canddsetting->find('all',array('conditions'=>array('Canddsetting.is_deleted'=>0)));
        $this->set('deleted_val',$id);
        endif;
        
        $this->set(compact('canddsetting'));
        
    }
    
    public function add()
    {
       
        $this->loadModel('branch');
         $data = $this->branch->find('list', array('fields'=>array('id','branchname')));
        // pr($data);exit;
         
        $this->set('branch',$data);
         
        //$this->set('country',$data);
        if($this->request->is('post'))
        {
             $this->request->data['status']=1;
            //pr($dat);exit;
             //$dat = $this->request->params[''];
             $match1 = $this->request->data['branch_id'];
             $data1 = $this->branch->findById($match1);
             $match2 = $this->request->data['purpose'];
             $data2 = $this->Canddsetting->findByPurpose($match2);
             
            if(!empty($data1) && !empty($data2))
            {
                $this->Session->setFlash(__('Candd Setting Entered is Already Exist'));
               
                return $this->redirect(array('action'=>'index'));
            }
            $this->Canddsetting->create();
           
            if($this->Canddsetting->save($this->request->data))
            {
                $this->Session->setFlash(__('Canddsetting has been  Added successfully'));
                return $this->redirect(array('action'=>'index'));
            }
            $this->Session->setFlash(__('Canddsetting Could Not be Added'));
           
        }
       
    }
    public function edit($id = null)
    {
        
       $this->loadModel('Branch');
         $data = $this->Branch->find('list', array('fields'=>array('id','branchname')));
        // pr($data);exit;
         
        $this->set('branch',$data);
         
         
        if(empty($id))
        {
             $this->Session->setFlash(__('Invalid Entry'));
             return $this->redirect(array('action'=>'index'));
          
        }
        
        $canddsetting =  $this->Canddsetting->findById($id); 
        //pr($branch);exit;
       if(empty($canddsetting))
       {
            $this->Session->setFlash(__('Invalid Canddsetting'));
            return $this->redirect(array('action'=>'index'));
          
       }
        //$this->set('country',$data);
        if($this->request->is(array('post','put')))
       {
             
              $this->Canddsetting->id = $id;
             // pr( $this->branch->id);exit;
             
          
              if($this->Canddsetting->save($this->request->data))
           {
               
               $this->Session->setFlash(__('Canddsetting is Updated'));
               return $this->redirect(array('action'=>'index'));
           }
            
            $this->Session->setFlash(__('Canddsetting Cant be Updated'));
        }
        else{
            $this->request->data = $canddsetting;
        }
       
    }
    public function delete($id)
    {
        
        if($this->request->is('get'))
        {
            throw new MethodNotAllowedException();
        }
         if($id!='')
        {
            if($this->Canddsetting->updateAll(array('Canddsetting.is_deleted'=>1),array('Canddsetting.id'=>$id)))
            {
            $this->Session->setFlash(__('The Canddsetting has been deleted',h($id)));
            return $this->redirect(array('action'=>'index'));
            }
        }
    }
    
    public function retrieve($id)
    {
        
        if($this->request->is('get'))
        {
            throw new MethodNotAllowedException();
        }
         if($id!='')
        {
            if($this->Canddsetting->updateAll(array('Canddsetting.is_deleted'=>0),array('Canddsetting.id'=>$id)))
            {
            $this->Session->setFlash(__('The Canddsetting has been Retrieved',h($id)));
            return $this->redirect(array('action'=>'index'));
            }
        }
    }
}