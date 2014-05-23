<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class UnitsController extends AppController
{
    
    public $helpers = array('Html','Form','Session');
    public $uses    =   array('Unit');   
    
    public function index()
    {
        $unit_data = $this->Unit->find('all');
        $this->set('units', $unit_data);
        //pr($data);
    }
    
    public function add()
    {
        if($this->request->is('post'))
        {
            if($this->Unit->save($this->request->data))
            {
                $this->Session->setFlash(__('Unit is Added'));
                $this->redirect(array('controller'=>'Units','action'=>'index'));
            }
            $this->Session->setFlash(__('Unit Could Not be Added'));
        }
    }
    public function edit($id = null)
    {
        if(empty($id))
        {
             $this->Session->setFlash(__('Invalid Entry'));
             return $this->redirect(array('action'=>'edit'));
        }
        $units =  $this->Unit->findById($id); 
        if(empty($units))
        {
            $this->Session->setFlash(__('Invalid Unit'));
            return $this->redirect(array('action'=>'edit'));
        }
        if($this->request->is(array('post','put')))
        {
            $this->Unit->id = $id;
            if($this->Unit->save($this->request->data))
            {
               $this->Session->setFlash(__('Unit is Updated'));
               return $this->redirect(array('controller'=>'Units','action'=>'index'));
            }
            $this->Session->setFlash(__('Unit Cant be Updated'));
        }
        else
        {
            $this->request->data = $units;
        }
    }
    
    public function delete($id)
    {
        if($this->request->is('get'))
        {
            throw new MethodNotAllowedException();
        }
        if($this->Unit->delete($id))
        {
            $this->Session->setFlash(__('The Unit has been deleted',h($id)));
            return $this->redirect(array('controller'=>'Units','action'=>'index'));
        }
    }
}