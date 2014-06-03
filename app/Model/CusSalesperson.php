<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class CusSalesperson extends AppModel
{
 var $name   =   'CusSalesperson';
 
    public $belongsTo = array(
        'Customer' => array(
            'counterCache' => true,
        ),
        'Salesperson' => array(
            'className' => 'Salesperson',
            'foreignKey' => 'salespeople_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
        
    );
}