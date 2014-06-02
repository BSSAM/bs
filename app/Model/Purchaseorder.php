<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Purchaseorder extends AppModel
{
    var $name = 'Purchaseorder';
    public $hasMany = array(
        'Description' => array(
            'className' => 'PurchaseCustomerspecialneed',
            'foreignKey' => 'purchaseorder_id',
            'conditions' => array(),
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'dependent'=>true,
            'counterQuery' => '',
             
      ));
    public $belongsTo = array(
        'Customer' => array(
            'className' => 'Customer',
            'foreignKey' => 'customer_id ',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
       
    );
}
