<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class ProformasController extends AppController
{

    public $helpers = array('Html', 'Form', 'Session');
    public $uses =array('Priority','Paymentterm','Quotation','Currency',
                            'Country','Additionalcharge','Service','CustomerInstrument','Customerspecialneed','Invoice',
                            'Instrument','Brand','Customer','Device','Salesorder','Description','Deliveryorder','Proforma');

    public function index() {
        $delivery_data = $this->Proforma->find('all', array('order' => array('Proforma.id' => 'DESC')));
        $this->set('proforma', $delivery_data);
    }
    
    public function add() {

        $str = NULL;
        $dmt = $this->random('proforma');
        $this->set('proforma_id', $dmt);
        $payment = $this->Paymentterm->find('list', array('fields' => array('id', 'pay')));
        $this->set('payment', $payment);
        $services = $this->Service->find('list', array('fields' => array('id', 'servicetype')));
        $this->set('service', $services);
        $this->request->data['Proforma']['proforma_id'] = $dmt;
        if ($this->request->is('post')) {
            if ($this->Deliveryorder->save($this->request->data['Proforma'])) {
                $this->Session->setFlash(__('Proforma Invoice has been Added Successfully '));
                $this->redirect(array('action' => 'index'));
            }
        }
    }

    public function salesorder_id_search($sales_id = NULL)
        {
            
            $this->loadModel('Salesorder');
            $sales_id =  $this->request->data['sale_id'];
            $this->autoRender = false;
            $data = $this->Salesorder->find('all',array('conditions'=>array('Salesorder.salesorderno LIKE'=>'%'.$sales_id.'%','Salesorder.is_approved'=>'1')));
            $c = count($data);
            if(!empty($c))
            {
                for($i = 0; $i<$c;$i++)
                {    
                    echo "<div class='proforma_show' align='left' id='".$data[$i]['Salesorder']['id']."'>";
                    echo $data[$i]['Salesorder']['salesorderno'];
                    echo "<br>";
                    echo "</div>";
                }   
            }
            else
            {
                echo "<div class='delivery_no_result' align='left'>";
                echo "No Results Found";
                echo "<br>";
                echo "</div>";
            }
        }
        
        public function get_sales_details()
        {
            $this->loadModel('Salesorder');
            $sales_id =  $this->request->data['sales_id'];
            $this->autoRender = false;
            $sales_data = $this->Salesorder->find('first',array('conditions'=>array('Salesorder.salesorderno'=>$sales_id,'Salesorder.is_approved'=>'1'),'recursive'=>'2'));
            if(!empty($sales_data))
            {
                echo json_encode($sales_data);
            }
            else
            {
                echo "failure";
            }
            
        }

}