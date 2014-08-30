<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class PurchaseRequisition extends AppModel
{
    public $actsAs = array('Containable');
    public $useTable   =   'prequistions';
    var $belongsTo  =   array('Customer','branch','InstrumentType');
    public $hasMany = array(
        'PreqDevice' => array(
            'className' => 'PreqDevice',
            'foreignKey' => 'prequistion_id',
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
        );
    public $hasOne = array(
        'PreqCustomerSpecialNeed' => array(
            'className' => 'PreqCustomerSpecialNeed',
            'foreignKey' => 'prequistion_id',
            'dependent'=> true,
        ));
}
