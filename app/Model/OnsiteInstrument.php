<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class OnsiteInstrument extends AppModel
{
    var $name   =   'OnsiteInstrument';
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
       
        'Range' => array(
            'className' => 'Range',
            'foreignKey' => 'onsite_range',
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
        
    );
}
