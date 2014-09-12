<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Onsite extends AppModel
{
    public $actsAs = array('Containable');
    var $belongsTo  =   array('Customer','branch');
    public $hasMany = array(
        'OnsiteDocument' => array(
            'className' => 'OnsiteDocument',
            'foreignKey' => 'onsite_id',
            'conditions' => array('is_deleted'=>0),
            'dependent'=> true,
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => '',
        ),
        'OnsiteEngineer' => array(
            'className' => 'OnsiteEngineer',
            'foreignKey' => 'onsite_id',
            'conditions' => array('is_deleted'=>0),
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => '',
        ),
        'OnsiteInstrument' => array(
            'className' => 'OnsiteInstrument',
            'foreignKey' => 'onsite_id',
            'conditions' => array('is_deleted'=>0),
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => '',
        )
        );
  
}

?>