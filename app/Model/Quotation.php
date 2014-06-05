<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Quotation extends AppModel
{
    public $actsAs = array('Containable');
    var $hasOne=array('Customerspecialneed');
    var $belongsTo  =   array('Customer');
    public $hasMany = array(
        'Device' => array(
            'className' => 'Device',
            'foreignKey' => 'quotation_id',
            'conditions' => array('status'=>'1'),
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ));
}
