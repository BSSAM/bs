<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Track extends AppModel
{
    public $useTable = false;
    
     public $belongsTo = array(
        'Quotation' => array(
            'className' => 'Quotation',
            'foreignKey' => 'track_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Salesperson' => array(
            'className' => 'Salesperson',
            'foreignKey' => 'salespeople_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
        
    );
}