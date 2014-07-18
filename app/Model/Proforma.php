<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Proforma extends AppModel
{
    //public $actsAs  =   'Containable';
    //var $name   =   'Deliveryorder';
   
    public $belongsTo = array(
        'Customer' => array(
            'className' => 'Customer',
            'foreignKey' => 'customer_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Salesorder' => array(
            'className' => 'Salesorder',
            'foreignKey' => 'salesorderno',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        
        );

}