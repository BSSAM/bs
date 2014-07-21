<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class DelDescription extends AppModel
{
    var $name   =   'DelDescription';
    public $belongsTo = array(
        'Deliveryorder' => array(
            'className' => 'Deliveryorder',
            'foreignKey' => 'deliveryorder_id',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'counterCache' => true,
        ),
        'Salesorder' => array(
            'className' => 'Salesorder',
            'foreignKey' => 'salesorder_id',
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
        ),
         'Range' => array(
            'className' => 'Range',
            'foreignKey' => 'delivery_range',
            'conditions' => '',
            'fields' => '',
            'order' => '',
           
        )
       
        );
}
