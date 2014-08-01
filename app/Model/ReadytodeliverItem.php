<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class ReadytodeliverItem extends AppModel
{   
   var $name    =   'ReadytodeliverItem';
    public $belongsTo = array(
        'Customer' => array(
            'className' => 'Customer',
            'foreignKey' => 'customer_id',
            'conditions' => array(),
        ),
        'Deliveryorder' => array(
            'className' => 'Deliveryorder',
            'foreignKey' => 'deliveryorder_id',
            'conditions' => array(),
        ),
        'Salesorder' => array(
            'className' => 'Salesorder',
            'foreignKey' => 'salesorder_id',
            'conditions' => array(),
        ),
        'Quotation' => array(
            'className' => 'Quotation',
            'foreignKey' => 'quotation_id',
            'conditions' => array(),
        ),
        'branch' => array(
            'className' => 'branch',
            'foreignKey' => 'branch_id',
            'conditions' => array(),
        ),
        
        );
   
}
