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
    
    public function add_candds()
        {
            $this->autoRender = false;
            $this->loadModel('Candds');
            $this->request->data['Candds']['customer_id']   =   $this->request->data['customer_id'];
            $this->request->data['Candds']['instrument_id'] =   $this->request->data['instrument_id'];
            $this->request->data['Candds']['brand_id']      =   $this->request->data['instrument_brand'];
            $this->request->data['Candds']['quantity']      =   $this->request->data['instrument_quantity'];
            $this->request->data['Candds']['model_no']      =   $this->request->data['instrument_modelno'];
            $this->request->data['Candds']['range']         =   $this->request->data['instrument_range'];
            $this->request->data['Candds']['call_location'] =   $this->request->data['instrument_calllocation'];
            $this->request->data['Candds']['call_type']     =   $this->request->data['instrument_calltype'];
            $this->request->data['Candds']['validity']      =   $this->request->data['instrument_validity'];
            $this->request->data['Candds']['discount']      =   $this->request->data['instrument_discount'];
            $this->request->data['Candds']['department_id']    =   $this->request->data['instrument_department'];
            $this->request->data['Candds']['unit_price']    =   $this->request->data['instrument_unitprice'];
            $this->request->data['Candds']['account_service']=  $this->request->data['instrument_account'];
            $this->request->data['Candds']['title']         =   $this->request->data['instrument_title'];
            $this->request->data['Candds']['status']        =   0;
            if($this->Device->save($this->request->data))
            {
                $purpose_id=$this->Candds->getLastInsertID();
               
                echo $purpose_id;
            }
     
        }

}
?>