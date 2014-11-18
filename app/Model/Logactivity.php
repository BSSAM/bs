<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Logactivity extends AppModel
{
    public $belongsTo    =array('User');
//     public $hasOne = array(
//        'Quotation' => array(
//            'className' => 'Quotation',
//            'foreignKey' => 'quotation_id',
//            'dependent'=> true,
//        ));
}
