<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class CollectionDelivery extends AppModel
{
     public $hasMany = array(
        'Candd' =>
            array(
                'className' => 'Candd',
                'foreignKey' => 'collection_delivery_id',
            ),
         'ReadytodeliverItem' =>
            array(
                'className' => 'ReadytodeliverItem',
                'foreignKey' => 'collection_delivery_id',
            ),
         
        );
     public $belongsTo = array(
        'branch' =>
            array(
                'className' => 'branch',
                'foreignKey' => 'branch_id',
            ),
        
        );
}
?>