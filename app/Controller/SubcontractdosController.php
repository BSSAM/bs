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
                            'Instrument','Brand','Customer','Device','Salesorder','Description','Logactivity',
                            'Subcontractdo','SubcontractDescription');   
    
    public function index()
    {
        $subcontract_list   =   $this->Subcontractdo->find('all',array('recursive'=>2));
        $this->set(compact('subcontract_list'));
    }
    public function add()
    {
        $str = NULL;
        $d = date("d");
        $m = date("m");
        $y = date("Y");
        $t = time();
        $dmt = 'BSSDO' . ($d + $m + $y + $t);
        $this->set('subcontract_do_id',$dmt);
        $services=$this->Service->find('list',array('fields'=>array('id','servicetype')));
        $this->set(compact('services'));
        if($this->request->is('post'))
        {
            $description_list   =  $this->request->data['description_list'];
            if(!empty($this->request->data['Subcontractdo']))
            {
                   if($this->Subcontractdo->save($this->request->data['Subcontractdo']))
                   {
                       $last_id_subcontract    =   $this->Subcontractdo->getLastInsertId();
                       if(!empty($last_id_subcontract))
                       {
                           if(!empty($description_list))
                           {
                               foreach($description_list as $key=>$value)
                               {
                                    $this->request->data['SubcontractDescription']['subcontractdo_id']    =    $last_id_subcontract;  
                                    $this->request->data['SubcontractDescription']['description_id']    =    $value;
                                    $this->SubcontractDescription->create(); 
                                    $this->SubcontractDescription->save($this->request->data);  
                               }
                           }
                       }
                   $this->Session->setFlash('Sub Contract Delivery order has been Added Sucessfully');
                   $this->redirect(array('action'=>'index'));
                   }
                   else
                   {
                        $this->Session->setFlash('Sub Contract Delivery order cant be added');
                        $this->redirect(array('action'=>'add'));
                   }
                   
                   
            }
           
        }
    }
    public function delete($id = NULL) 
    {
        if ($id != '') {
            if ($this->Subcontractdo->delete($id, true)) {
                $this->Session->setFlash(__('The Subcontract Delivery order  has been deleted', h($id)));
                return $this->redirect(array('controller' => 'Subcontractdos', 'action' => 'index'));
            }
        } else {
            throw new MethodNotAllowedException();
        }
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
        if(!empty($c))
        {
            for ($i = 0; $i < $c; $i++) 
            {
                echo "<div class='subcontract_customer_show' align='left' id='" . $data[$i]['Customer']['id'] . "'>";
                echo $data[$i]['Customer']['customername'];
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
    public function get_customer_value()
    {
        $this->autoRender = false;
        $this->loadModel('Customer');
        $customer_id =  $this->request->data['cust_id'];
        $customer_data = $this->Customer->find('first',array('conditions'=>array('Customer.id'=>$customer_id),'recursive'=>'2'));
        if(!empty($customer_data))
        {
            echo json_encode($customer_data) ;
        }
    }

}
    
?>