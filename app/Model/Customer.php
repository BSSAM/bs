<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



class Customer extends AppModel
{
  public $actsAs  =   array('Containable');
  public $belongsTo = array('Industry','Location','Paymentterm','Priority' );
  public $virtualFields = array( 'Customertagname' => 'CONCAT(Customer.customername, " ( ", Customer.tag_name," ) ")');

  public $hasMany = array(
        'CusSalesperson' =>
            array(
                'className' => 'CusSalesperson',
                'foreignKey' => 'customer_id',
            ),
        'CusReferby' =>
            array(
                'className' => 'CusReferby',
                'foreignKey' => 'customer_id',
            ),
       'Contactpersoninfo' =>
            array(
                'className' => 'Contactpersoninfo',
                'foreignKey' => 'customer_id',
            ),
            'Address' =>
            array(
            'className' => 'Address',
            'foreignKey' => 'customer_id',
        ),
    );

}
