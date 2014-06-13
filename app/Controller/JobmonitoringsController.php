<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class JobmonitoringsController extends AppController
{
   
    public $helpers = array('Html','Form','Session');
    public $components = array('RequestHandler');
    public $uses    =   array('Deliveryorder','Invoice');
    public function index()
    {
        $deliveryorder_approved_list    =   $this->Invoice->find('all',array('conditions'=>array('Invoice.is_approved'=>'0'),'recursive'=>4));
        $this->set(compact('unapproved_order_list','prepareinvoice_approved_list'));
    }
    
}