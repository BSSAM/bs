<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Salesorder extends AppModel
{
    public $actsAs  =   array('Containable');
    public $virtualFields = array(
    'solist_diff' => 'DATEDIFF(CURDATE(),STR_TO_DATE(Salesorder.due_date,"%d-%M-%y"))'
);
   
    public $hasMany = array(
        'Description' => array(
            'className' => 'Description',
            'foreignKey' => 'salesorder_id',
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
