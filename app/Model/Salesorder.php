<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Salesorder extends AppModel
{
    public $hasMany = array(
        'Description' => array(
            'className' => 'Description',
            'foreignKey' => false,
            'conditions' => array('status'=>'1'),
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'dependent'=>true,
            'counterQuery' => '',
            'associatedkey' => 'salesorder_id',
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
