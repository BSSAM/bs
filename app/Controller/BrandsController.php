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
        $brand_data = $this->Brand->find('all');
        $this->set('brands', $brand_data);
        //pr($data);
    }
    
    public function add()
    {
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
        if($this->request->is('get'))
        {
            throw new MethodNotAllowedException();
        }
        if($this->Brand->delete($id))
        {
            $this->Session->setFlash(__('The Brand has been deleted',h($id)));
            return $this->redirect(array('controller'=>'Brands','action'=>'index'));
        }
    }
}