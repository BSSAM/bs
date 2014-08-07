<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Quotation extends AppModel
{
    public $actsAs = array('Containable');
    var $belongsTo  =   array('Customer','branch','InstrumentType');
    public $hasMany = array(
        'Device' => array(
            'className' => 'Device',
            'foreignKey' => 'quotation_id',
            'conditions' => array('is_deleted'=>0),
            'dependent'=> true,
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => '',
        ),
        'Clientpo' => array(
            'className' => 'Clientpo',
            'foreignKey' => 'quotation_id',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => '',
        ),
        'Document' => array(
            'className' => 'Document',
            'foreignKey' => 'quotation_id',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => '',
        )
        );
    public $hasOne = array(
        'Customerspecialneed' => array(
            'className' => 'Customerspecialneed',
            'foreignKey' => 'quotation_id',
            'dependent'=> true,
        ));
}
