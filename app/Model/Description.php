<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Description extends AppModel
{
    public $useTable   =   'sal_description';
   
     public $belongsTo = array(
        'Customer' => array(
            'className' => 'Customer',
            'foreignKey' => 'customer_id ',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Instrument' => array(
            'className' => 'Instrument',
            'foreignKey' => 'instrument_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Brand' => array(
            'className' => 'Brand',
            'foreignKey' => 'brand_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
         'Department' => array(
            'className' => 'Department',
            'foreignKey' => 'department_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
          'Salesorder' => array(
            'className' => 'Salesorder',
            'foreignKey' => 'salesorder_id',
            'conditions' => '',
            'counterCache' => true,
        ),
         'Range' => array(
            'className' => 'Range',
            'foreignKey' => 'sales_range',
            'conditions' => '',
            'fields' => '',
            'order' => '',
           
        )
    );
}