<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



class Paymentterm extends AppModel
{
   // public $virtualField = 
 public $virtualFields = array(
'pay' => 'CONCAT(Paymentterm.paymentterm, " ", Paymentterm.paymenttype)'
);

}
