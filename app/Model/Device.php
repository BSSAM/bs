<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Device extends AppModel
{   
    public $useTable    =   'quo_devices';
    public $belongsTo = array(
        'Customer' => array(
            'className' => 'Customer',
            'foreignKey' => 'customer_id ',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Instrument' => array(
            'className' => 'Instrument',
            'foreignKey' => 'instrument_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Quotation' => array(
            'className' => 'Quotation',
            'foreignKey' => 'quotation_id',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'counterCache' => true,
        ),
        'Range' => array(
            'className' => 'Range',
            'foreignKey' => 'range',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Brand' => array(
            'className' => 'Brand',
            'foreignKey' => 'brand_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Department' => array(
            'className' => 'Department',
            'foreignKey' => 'department_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
   
   
}
