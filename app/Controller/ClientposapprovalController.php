<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ClientposapprovalController extends AppController {

    public $helpers = array('Html', 'Form', 'Session');
    public $uses = array('Priority', 'Paymentterm', 'Quotation', 'Currency', 'Salesorder', 'Deliveryorder',
        'Country', 'Additionalcharge', 'Service', 'CustomerInstrument', 'Customerspecialneed',
        'Instrument', 'Brand', 'Customer', 'Device', 'Unit', 'Logactivity', 'InstrumentType',
        'Contactpersoninfo', 'CusSalesperson', 'Clientpo');

    public function index() {

        //$this->Quotation->recursive = 1; 
        $quotation_lists = $this->Quotation->find('all', array('conditions' => array('Quotation.is_deleted' => '0','Customer.acknowledgement_type_id'=>1), 'order' => array('Quotation.id' => 'DESC')));
        $this->set('quotation', $quotation_lists);
    }

}
