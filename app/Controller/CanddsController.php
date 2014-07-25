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
                            'Instrument','Brand','Customer','Device','Salesorder','Description','Candd','Assign');
    public function index()
    {
        $data = $this->Candd->find('all');
        $this->set('candd', $data);
    }
    public function add()
    {   
        $assignto =   $this->Assign->find('list',array('conditions'=>array('Assign.status'=>1),'fields'=>array('id','assignedto')));
        $this->set(compact('assignto'));
        if($this->request->is('post'))
        {
            
        }
    }
    public function search() 
    {
        $this->loadModel('Customer');
        $name = $this->request->data['name'];
        $this->autoRender = false;
        $data = $this->Customer->find('all', array('conditions' => array('customername LIKE' => '%' . $name . '%','Customer.is_deleted'=>0)));
        $c = count($data);
        if (!empty($c)) 
        {
            for ($i = 0; $i < $c; $i++) 
            {
                echo "<div class='candd_single' align='left' id='" . $data[$i]['Customer']['id'] . "'>";
                echo $data[$i]['Customer']['Customertagname'];
                echo "<br>";
                echo "</div>";
            }
        } 
        else 
        {
            echo "<div class='candd_no_result' align='left'>";
            echo "No Results Found";
            echo "<br>";
            echo "</div>";
        }
    }
    public function get_customer_value() 
    {
        $this->autoRender = false;
        $this->loadModel('Customer');
        $customer_id = $this->request->data['cust_id'];
        $customer_data = $this->Customer->find('first', array('conditions' => array('Customer.id' => $customer_id,'Customer.is_deleted'=>0), 'recursive' => '2'));
        if (!empty($customer_data)) {
            echo json_encode($customer_data);
        }
    }
    public function get_contact_person_value() 
    {
        $this->autoRender = false;
        $this->loadModel('Contactpersoninfo');
        $customer_id = $this->request->data['cust_id'];
        $contact_person = $this->request->data['contact_person_value'];
        $contact_person_data = $this->Contactpersoninfo->find('first', array('conditions' => array('Contactpersoninfo.id' => $contact_person,'Contactpersoninfo.customer_id' => $customer_id,'Contactpersoninfo.status'=>1),'fields'=>array('phone')));
        if (!empty($contact_person_data)) {
            echo $contact_person_data['Contactpersoninfo']['phone'];
        }
    }
    public function get_candd_customer_address() 
    {
        $this->autoRender = false;
        $this->loadModel('Address');
        $address = $this->request->data['address'];
        $customer_id = $this->request->data['customer_id'];
        $customer_address_data = $this->Address->find('first', array('conditions' => array('Address.customer_id' => $customer_id,'Address.type' => $address,'Address.status'=>1)));
        if (!empty($customer_address_data)) {
           echo $customer_address_data['Address']['address'];
        }
    }
    
    public function add_candds()
    {
        $this->autoRender = false;
        $this->loadModel('Candd');
        $this->request->data['Candd']['purpose']   =   $this->request->data['purpose'];
        $this->request->data['Candd']['customer_id'] =   $this->request->data['customer_id'];
        $this->request->data['Candd']['customername']      =   $this->request->data['customer_name'];
        $this->request->data['Candd']['Contactpersoninfo_id']      =   $this->request->data['attn_id'];
        $this->request->data['Candd']['assign_id']      =   $this->request->data['assigned'];
        $this->request->data['Candd']['customer_address']         =   $this->request->data['customer_address'];
        $this->request->data['Candd']['address_id'] =   $this->request->data['address_id'];
        $this->request->data['Candd']['phone']      =   $this->request->data['phone'];
        $this->request->data['Candd']['remarks']     =   $this->request->data['remark'];
        $this->request->data['Candd']['status']        =   1;
        if($this->Candd->save($this->request->data))
        {
            $candd_last_id=$this->Candd->getLastInsertID();
            $candd_data =   $this->Candd->find('first',array('conditions'=>array('Candd.id'=>$candd_last_id,'Candd.status'=>1)));
            pr($candd_data);
        }
    }

}
?>