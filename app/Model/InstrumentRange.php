<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class InstrumentRange extends AppModel
{
    
    var $name   =   'InstrumentRange';
    public $belongsTo = array(
        'Instrument' => array(
            'counterCache' => true,
        ),
        'Range' => array(
            'counterCache' => true,
            
        )
    );
}
