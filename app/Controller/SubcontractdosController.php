<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class SubcontractdosController extends AppController
{
    public $helpers = array('Html','Form','Session');
    public $uses =array('Priority','Paymentterm','Quotation','Currency',
                            'Country','Additionalcharge','Service','CustomerInstrument','Customerspecialneed',
                            'Instrument','Brand','Customer','Device','Salesorder','Description','Logactivity');   
    
    public function index()
    {
      $data = $this->Customer->find('all', array('conditions' => array('AND'=>array('OR'=>array('Customer.customertype'=>array('Sub-Contractor','Customer/Sub-Contractor')),'customername LIKE' => '%i%'))));
      $this->set('data1',$data);
    }
    public function add()
    {
        
    }
    public function salesorder_id_search()
    {
            $sales_id =  $this->request->data['sale_id'];
            $this->autoRender = false;
            $data = $this->Description->find('all',array('conditions'=>array('salesorder_id LIKE'=>'%'.$sales_id.'%','Description.is_approved'=>'1','Description.sales_calllocation'=>'subcontract')));
            $c = count($data);
            if(!empty($c))
            {
                for($i = 0; $i<$c;$i++)
                {    
                    echo "<div class='subcontract_show' align='left' id='".$data[$i]['Description']['salesorder_id']."'>";
                    echo $data[$i]['Description']['salesorder_id'];
                    echo "<br>";
                    echo "</div>";
                }   
            }
            else
            {
                echo "<div class='subcontract_no_result' align='left'>";
                echo "No Results Found";
                echo "<br>";
                echo "</div>";
            }
    }
    public function get_sales_details() 
    {
       
        $sales_id = $this->request->data['sales_id'];
        $this->autoRender = false;
        $sales_data = $this->Description->find('all', array('conditions' => array('Description.salesorder_id' => $sales_id, 'Description.is_approved' => '1','Description.sales_calllocation'=>'subcontract')));
       
//        $sales_data = $this->Salesorder->find('first', array('conditions' => array('salesorderno' => $sales_id, 'is_approved' => '1'), 'recursive' => '2','contain'=>array('Description'=>array('conditions'=>array('Description.sales_calllocation'=>'subcontract')))));
        if (!empty($sales_data)) {
            echo json_encode($sales_data);
        } else {
            echo "failure";
        }
    }
    public function delete_instrument()
    {
        $this->autoRender=false;
        $device_id= $this->request->data['device_id'];
        $this->loadModel('Description');
        if($this->Description->deleteAll(array('Description.id'=>$device_id)))
        {
            echo "deleted";
        }
    }
    public function search() 
    {
        
        $name = $this->request->data['name'];
        $this->autoRender = false;
        $data = $this->Customer->find('all', array('conditions' => array('AND'=>array('OR'=>array('Customer.customertype'=>array('Sub-Contractor','Customer/Sub-Contractor')),'customername LIKE' => '%' . $name . '%'))));
        $c = count($data);
        for ($i = 0; $i < $c; $i++) {
            echo "<div class='subcontract_show' align='left' id='" . $data[$i]['Customer']['id'] . "'>";
            echo $data[$i]['Customer']['customername'];
            echo "<br>";
            echo "</div>";
        }
    }

}
    
?>