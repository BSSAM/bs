<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class SubcontractDescription  extends AppModel
{
    var $name   =   'SubcontractDescription';
     public $belongsTo = array(
        'Description' => array(
            'className' => 'Description',
            'foreignKey' => 'description_id',
            'conditions' => array(),
      ));
    
}

?>