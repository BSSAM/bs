<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


class Country extends AppModel
{
    var $hasOne = 'Currency';
//   var $hasOne = array('Currency' => array(
//        'fields' => '*',
//        'foreignKey' => 'country_id',
//        'className' => 'Country',
//        'conditions' => array('Country.id' => 'Currency.country_id')));
   
   //$con = $this->params['controller'];
//   if(($this->params['controller']=='Currencies'))
//   {
//       
//   }
    
     
}

