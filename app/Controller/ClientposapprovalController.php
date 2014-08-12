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
        $quotation_list_bybeforedo = $this->Quotation->find('all', array('conditions' => array('Quotation.is_deleted' => '0','Customer.acknowledgement_type_id'=>1), 'order' => array('Quotation.id' => 'DESC')));
        $quotation_lists_bybeforeinvoice = $this->Quotation->find('all', array('conditions' => array('Quotation.is_deleted' => '0','Customer.acknowledgement_type_id'=>2), 'order' => array('Quotation.id' => 'DESC')));
        $this->set(compact('quotation_list_bybeforedo','quotation_lists_bybeforeinvoice'));
    }
    public function view() 
    {
        $data = $this->Quotation->find('first',array('conditions'=>array('Quotation.id'=>1,'Quotation.is_deleted'=>0),'recursive'=>3));
        pr($data);
        $this->autoRender   =   false;
        $q_id =  $this->request->data['q_id'];
        $data = $this->Quotation->find('all',array('conditions'=>array('Quotation.id'=>$q_id,'Quotation.is_deleted'=>0)));
        $this->set(compact('data'));
        
       
    }
    
    public function view() {
        
    }

}
