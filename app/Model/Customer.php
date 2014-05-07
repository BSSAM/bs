<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



class Customer extends AppModel
{
  public $belongsTo = array( 'Salesperson','Referedby','Industry','Location','Paymentterm','Priority' );

}
