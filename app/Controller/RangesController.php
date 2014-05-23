<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class RangesController extends AppController
{
    
    public $helpers = array('Html','Form','Session');
    public $uses    =   array('Range','Unit');   
    
    public function index()
    {
        $range_data = $this->Range->find('all');
        $this->set('ranges', $range_data);
        
    }
    
    public function add()
    {
        $unit_array =   $this->Unit->find('list',array('conditions'=>array('Unit.status'=>'1'),'fields'=>array('id','unit_name')));
        $this->set('units',$unit_array);
      
        if($this->request->is('post'))
        {
            if($this->Range->save($this->request->data))
            {
                $this->Session->setFlash(__('Range is Added'));
                $this->redirect(array('controller'=>'Ranges','action'=>'index'));
            }
            $this->Session->setFlash(__('Range Could Not be Added'));
        }
    }
    public function edit($id = null)
    {
        $unit_array =   $this->Unit->find('list',array('conditions'=>array('Unit.status'=>'1'),'fields'=>array('id','unit_name')));
        $this->set('units',$unit_array);
        if(empty($id))
        {
             $this->Session->setFlash(__('Invalid Entry'));
             return $this->redirect(array('action'=>'edit'));
        }
        $ranges =  $this->Range->findById($id); 
        if(empty($ranges))
        {
            $this->Session->setFlash(__('Invalid Range'));
            return $this->redirect(array('action'=>'edit'));
        }
        if($this->request->is(array('post','put')))
        {
            $this->Range->id = $id;
            if($this->Range->save($this->request->data))
            {
               $this->Session->setFlash(__('Range is Updated'));
               return $this->redirect(array('controller'=>'Ranges','action'=>'index'));
            }
            $this->Session->setFlash(__('Range Cant be Updated'));
        }
        else
        {
            $this->request->data = $ranges;
        }
    }
    
    public function delete($id)
    {
        if($this->request->is('get'))
        {
            throw new MethodNotAllowedException();
        }
        if($this->Range->delete($id))
        {
            $this->Session->setFlash(__('The Range has been deleted',h($id)));
            return $this->redirect(array('controller'=>'Ranges','action'=>'index'));
        }
    }
}