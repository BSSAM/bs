<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Temptemplate extends AppModel
{
    public $useTable    =   'temp_templates';
    public $hasMany = array(
        'Temptemplatedata' => array(
            'className' => 'Temptemplatedata',
            'foreignKey' => 'temp_templates_id',
            'conditions' => '',
            'dependent'=> true,
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => '',
        ));
}