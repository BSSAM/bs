<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class ProformasController extends AppController
{

    public $helpers = array('Html', 'Form', 'Session');
    public $uses = array('Priority', 'Paymentterm', 'Quotation', 'Currency',
        'Country', 'Additionalcharge', 'Service', 'CustomerInstrument', 'Customerspecialneed', 'Invoice',
        'Instrument', 'Brand', 'Customer', 'Device', 'Salesorder', 'Description', 'Deliveryorder', 'Proforma');

    public function index() {
        $delivery_data = $this->Proforma->find('all', array('order' => array('Proforma.id' => 'DESC')));
        $this->set('proforma', $delivery_data);
    }

    public function salesorder_search() {
        $this->loadModel('Salesorder');
        $name = $this->request->data['id'];
        $this->autoRender = false;
        $data = $this->Salesorder->find('all', array('conditions' => array('Salesorder.salesorderno LIKE' => '%' . $name . '%', 'Salesorder.is_approved' => '1')));
        $c = count($data);
        if ($c != 0) {
            for ($i = 0; $i < $c; $i++) {
                echo "<div class='salesorder_single' align='left' id='" . $data[$i]['Salesorder']['id'] . "'>";
                echo $data[$i]['Salesorder']['salesorderno'];
                echo "<br>";
                echo "</div>";
            }
        } else {
            echo "<div class='no_result' align='left'>";
            echo "No Results Found";
            echo "<br>";
            echo "</div>";
        }
    }

}