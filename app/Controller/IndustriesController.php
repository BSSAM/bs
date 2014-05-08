<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class IndustriesController extends AppController
{
    
    public $helpers = array('Html','Form','Session');
    
    public function index()
    {
        $data = $this->Industry->find('all',array('order' => array('Industry.id' => 'DESC')));
        $this->set('industry', $data);
        //pr($data);
    }
    
    public function add()
    {
      
        if($this->request->is('post'))
        {
             $this->request->data['status']=1;
            //pr($dat);exit;
             //$dat = $this->request->params[''];
             $match1 = $this->request->data['industryname'];
             $data1 = $this->Industry->findByIndustryname($match1);
             
            if(!empty($data1))
            {
                $this->Session->setFlash(__('Industry Entered is Already Exist'));
               
                return $this->redirect(array('action'=>'add'));
            }
            $this->Industry->create();
           
            if($this->Industry->save($this->request->data))
            {
                $this->Session->setFlash(__('Industry is Added'));
                return $this->redirect(array('action'=>'index'));
            }
            $this->Session->setFlash(__('Industry Could Not be Added'));
           
        }
       
    }
    public function edit($id = NULL)
    {
        if(empty($id))
        {
             $this->Session->setFlash(__('Invalid Entry'));
             return $this->redirect(array('action'=>'edit'));
        }
        $industry_details =  $this->Industry->findById($id); 
        if(empty($industry_details))
        {
           $this->Session->setFlash(__('Invalid Industry'));
             return $this->redirect(array('action'=>'edit'));
        }
        if($this->request->is(array('post','put')))
        {
            $this->Industry->id = $id;
            if($this->Industry->save($this->request->data))
            {
               $this->Session->setFlash(__('Industry is Updated'));
               return $this->redirect(array('action'=>'index'));
            }
            $this->Session->setFlash(__('Industry Cant be Updated'));
        }
        else{
            $this->request->data = $industry_details;
        }
    }
    public function delete($id)
    {
        $this->autoRender=false;
        
        if($id=='')
        {
            throw new MethodNotAllowedException();
        }
        if($this->Industry->delete($id))
        {
            $this->Session->setFlash(__('The Industry has been deleted'));
            return $this->redirect(array('action'=>'index'));
        }
    }
}