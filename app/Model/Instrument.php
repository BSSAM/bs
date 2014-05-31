<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Instrument extends AppModel
{
    
    var $belongsTo=array('Department');
    public $hasMany = array(
        'InstrumentBrand' =>
            array(
                'className' => 'InstrumentBrand',
                'foreignKey' => 'instrument_id',
               
            ),
        'InstrumentProcedure' =>
            array(
                'className' => 'InstrumentProcedure',
                
                'foreignKey' => 'instrument_id',
               
            ),
        'InstrumentRange' =>
            array(
                'className' => 'InstrumentRange',
              
                'foreignKey' => 'instrument_id',
               
            ),
        
    );
}