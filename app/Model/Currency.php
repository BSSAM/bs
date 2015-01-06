<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


class Currency extends AppModel
{
  var $belongsTo = array('Country');
  var $hasMany = array('Branch');
//     var $hasOne = array('Country' => array(
//        'fields' => '*',
//        'foreignKey' => 'country_id',
//        'className' => 'Country',
//         'conditions' => array('country.id' => 'currency.country_id')));
//     
}

