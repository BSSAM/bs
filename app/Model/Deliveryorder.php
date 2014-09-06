<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Deliveryorder extends AppModel
{
    //public $actsAs  =   'Containable';
    var $name   =   'Deliveryorder';
    //public $belongsTo  =   ;
    public $hasMany = array(
        'DelDescription' => array(
            'className' => 'DelDescription',
            'foreignKey' => 'deliveryorder_id',
            'conditions' => '',
            'fields' => '',
            'order' => '',
           
        ),
        'DoDocument' => array(
            'className' => 'DoDocument',
            'foreignKey' => 'deliveryorder_id',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => '',
        ));
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
            'foreignKey' => 'salesorder_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Quotation' => array(
            'className' => 'Quotation',
            'foreignKey' => 'quotationno',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Invoice' => array(
            'className' => 'Invoice',
            'foreignKey' => 'delivery_order_no',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
         'branch' => array(
            'className' => 'branch',
            'foreignKey' => 'branch_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'InstrumentType' => array(
            'className' => 'InstrumentType',
            'foreignKey' => 'instrument_type_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        );
}

