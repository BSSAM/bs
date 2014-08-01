<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Candd extends AppModel
{
     public $belongsTo = array(
        'Customer' => array(
            'className' => 'Customer',
            'foreignKey' => 'customer_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
          'Contactpersoninfo' => array(
            'className' => 'Contactpersoninfo',
            'foreignKey' => 'Contactpersoninfo_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
          'assign' => array(
            'className' => 'assign',
            'foreignKey' => 'assign_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
           'branch' => array(
            'className' => 'branch',
            'foreignKey' => 'branch_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
        );
}
?>