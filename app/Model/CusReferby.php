<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class CusReferby extends AppModel
{
 var $name   =   'CusReferby';
 
 
    public $belongsTo = array(
        'Customer' => array(
            'counterCache' => true,
        ),
         'Referedby' => array(
            'className' => 'Referedby',
            'foreignKey' => 'referedby_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
}