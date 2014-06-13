<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class CanddsController extends AppController
{
    public $helpers =   array('Html','Form','Session');
    public $uses    =   array('Priority','Paymentterm','Quotation','Currency',
                            'Country','Additionalcharge','Service','CustomerInstrument','Customerspecialneed',
                            'Instrument','Brand','Customer','Device','Salesorder','Description');
public function index()
{
    
}
public function add()
{
    
}
public function search() {
        $this->loadModel('Customer');
        $name = $this->request->data['name'];
        $this->autoRender = false;
        $data = $this->Customer->find('all', array('conditions' => array('customername LIKE' => '%' . $name . '%')));
        $c = count($data);
        if (!empty($c)) {
            for ($i = 0; $i < $c; $i++) {
                echo "<div class='show' align='left' id='" . $data[$i]['Customer']['id'] . "'>";
                echo $data[$i]['Customer']['customername'];
                echo "<br>";
                echo "</div>";
            }
        } else {
            echo "<div class='result' align='left'>";
            echo "No Results Found";
            echo "<br>";
            echo "</div>";
        }
    }

public function get_customer_value() {
        $this->autoRender = false;
        $this->loadModel('Customer');
        $customer_id = $this->request->data['cust_id'];
        $customer_data = $this->Customer->find('first', array('conditions' => array('Customer.id' => $customer_id), 'recursive' => '2'));

        if (!empty($customer_data)) {
            echo json_encode($customer_data);
        }
    }

}
?>