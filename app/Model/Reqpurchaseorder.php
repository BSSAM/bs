<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Reqpurchaseorder extends AppModel
{
    public $actsAs = array('Containable');
    public $useTable   =   'reqpurchaseorders';
    var $belongsTo  =   array('Customer','branch');
    public $hasMany = array(
        'ReqDevice' => array(
            'className' => 'ReqDevice',
            'foreignKey' => 'reqpurchaseorder_id',
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
        'ReqCustomerSpecialNeed' => array(
            'className' => 'ReqCustomerSpecialNeed',
            'foreignKey' => 'reqpurchaseorder_id',
            'dependent'=> true,
        ));
}
