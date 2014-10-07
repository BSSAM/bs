<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Invoice extends AppModel
{
   // public $useTable = 'prepare_invoices';
    public $belongsTo   =  array(
                'Deliveryorder'=>array(
                'className'=>'Deliveryorder',
                'foreignKey'=>'deliveryorder_id',
                ),'Salesorder','branch'
                                
        );
}

?>