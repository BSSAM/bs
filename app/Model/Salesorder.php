<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Salesorder extends AppModel
{
    public $actsAs  =   array('Containable');
    public $virtualFields = array(
    'solist_diff' => 'DATEDIFF(CURDATE(),STR_TO_DATE(Salesorder.due_date,"%Y-%m-%d"))'
);
    public $primaryKey   =   'id' ;
    public $hasMany = array(
        'Description' => array(
            'className' => 'Description',
            'foreignKey' => 'salesorder_id',
            'conditions' => array('is_deleted'=>0),
            'fields' => '',
            'order' => array('order_by ASC'),
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'dependent'=>true,
            'counterQuery' => '',
      ),
        'SalesDocument' => array(
            'className' => 'SalesDocument',
            'foreignKey' => 'salesorderno',
            'conditions' => array('status'=>1),
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'dependent'=>true,
            'counterQuery' => '',
      ),
        'Clientpo' => array(
            'className' => 'Clientpo',
            'foreignKey' => 'salesorder_id',
            'conditions' => array(),
      ),
        'Deliveryorder' => array(
            'className' => 'Deliveryorder',
            'foreignKey' => 'salesorder_id',
            'conditions' => array(),
      ),
        );
    public $belongsTo = array(
        'Customer' => array(
            'className' => 'Customer',
            'foreignKey' => 'customer_id ',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
         'Quotation' => array(
            'className' => 'Quotation',
            'foreignKey' => 'quotation_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
         'branch' => array(
            'className' => 'branch',
            'foreignKey' => 'branch_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Instrumentforgroup' => array(
            'className' => 'Instrumentforgroup',
            'foreignKey' => 'instrument_type_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
       
    );
}
