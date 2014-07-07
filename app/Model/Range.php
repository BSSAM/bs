<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Range extends AppModel
{
    
    public $actsAs = array('Containable');
//    public $virtualFields = array(
//    'range_name' => 'CONCAT("( ",Range.from_range, " ~ ", Range.to_range," )"," / ",Unit.unit_name)',
//    );
    public $virtualFields = array(
    'range_name' => 'CONCAT("( ",Range.from_range, " ~ ", Range.to_range," )","")',
    );
    
    public $belongsTo = array(
        'Unit' => array(
            'className' => 'Unit',
            'foreignKey' => 'unit_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
        );
    
}