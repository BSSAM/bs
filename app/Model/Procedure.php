<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Procedure extends AppModel
{
    var $name   =   'Procedure';
     public $belongsTo = array(
        'Department' => array(
            'className' => 'Department',
            'foreignKey' => 'department_id ',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
       
    );
            
}
