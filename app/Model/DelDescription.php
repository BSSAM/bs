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
        'Description' => array(
            'className' => 'Description',
            'foreignKey' => 'description_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Deliveryorder' => array(
            'className' => 'Deliveryorder',
            'foreignKey' => 'deliveryorder_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Salesorder' => array(
            'className' => 'Salesorder',
            'foreignKey' => 'salesorder_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
       
        );
}
