<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Tempinstrumentvalid extends AppModel
{
    public $useTable    =   'temp_instrumentvalid';
	
	 public $belongsTo = array(
        'Tempinstrument' => array(
            'className' => 'Tempinstrument',
            'foreignKey' => 'temp_instruments_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
        );
}
