<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class InstrumentBrand extends AppModel
{
    var $name   =   'InstrumentBrand';
    public $belongsTo = array(
        'Instrument' => array(
            'counterCache' => true,
        ),
        'Brand' => array(
            'counterCache' => true,
        )
    );
}
