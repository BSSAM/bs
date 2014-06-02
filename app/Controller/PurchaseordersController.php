<?php
/*
 * Document     :   PurchaseOrder Controller.php
 * Controller   :   PurchaseOrder
 * Model        :   Purchaseorder 
 * Created By   :   M.Iyappan Samsys
 */
class PurchaseordersController extends AppController
{
    public $helpers = array('Html', 'Form', 'Session');
    public $uses = array('Priority', 'Paymentterm', 'Quotation', 'Currency',
        'Country', 'Additionalcharge', 'Service', 'CustomerInstrument', 'Customerspecialneed',
        'Instrument', 'Brand', 'Customer', 'Device','Purchaseorder','PurchaseCustomerspecialneed');
        public function index()
        {
            //$this->Quotation->recursive = 1; 
            $purchase_order_data = $this->Purchaseorder->find('all',array('order' => array('Purchaseorder.id' => 'DESC')));
            $this->set('purchaseorders', $purchase_order_data);
        }
        public function add()
        {
                
            $str=NULL;
            $d=date("d");
            $m=date("m");
            $y=date("Y");
            $t=time();
            $purchaseorderno='BSP'.($d+$m+$y+$t);
            $country=$this->Country->find('list',array('fields'=>array('id','country')));
            $additional=$this->Additionalcharge->find('list',array('fields'=>array('id','additionalcharge')));
            $service=$this->Service->find('list',array('fields'=>array('id','servicetype')));
            $this->set(compact('purchaseorderno','country','additional','service'));
           
            
            if($this->request->is('post'))
            {
                
                if($this->Purchaseorder->save($this->request->data['Purchaseorder']))
                {
                    $purchase_id   =   $this->Purchaseorder->getLastInsertID();
                    if($purchase_id!='')
                    {
                        $this->request->data['PurchaseCustomerspecialneed']['purchaseorder_id']=$purchase_id;
                        $this->PurchaseCustomerspecialneed->save($this->request->data['PurchaseCustomerspecialneed']);
                    }
                    $this->Session->setFlash(__('Purchase Order has been Added Succefully'));
                    $this->redirect(array('action'=>'index'));
                }
               
            }
        }
        public function edit($id=NULL)
        {
            $purchase_edit_data = $this->Purchaseorder->find('first',array('conditions'=>array('Purchaseorder.id'=>$id),'recursive'=>3));
           
            $country=$this->Country->find('list',array('fields'=>array('id','country')));
            $additional=$this->Additionalcharge->find('list',array('fields'=>array('id','additionalcharge')));
            $service=$this->Service->find('list',array('fields'=>array('id','servicetype')));
            $purchaseorderno    =  $purchase_edit_data['Purchaseorder']['purchaseorder_no'];
            $this->set(compact('purchaseorderno','country','additional','service'));
            
            
            if($this->request->is(array('post','put')))
            {
                 pr($this->request->data);exit;
                $this->Purchaseorder->id=$id;
                if($this->Purchaseorder->save($this->request->data['Quotation']))
                {
                    $this->PurchaseCustomerspecialneed->id=$purchase_id;
                    $this->PurchaseCustomerspecialneed->save($this->request->data['PurchaseCustomerspecialneed']);
                    $this->Session->setFlash(__('Purchase order has been Updated Succefully '));
                    $this->redirect(array('action'=>'index'));
                }
                
            }
            else
            {
                $this->request->data=$purchase_edit_data;
            }
        }
        public function delete($id=NULL)
        {
            if($id!='')
            {
                if($this->Purchaseorder->delete($id,true))
                {
                    $this->Session->setFlash(__('The Purchaseorder has been deleted',h($id)));
                    return $this->redirect(array('controller'=>'Purchaseorders','action'=>'index'));
                }
            }
            else
            {
                throw new MethodNotAllowedException();
            }
        }
        public function customer_search()
        {
            $this->loadModel('Customer');
            $name =  $this->request->data['name'];
            $this->autoRender = false;
            $data = $this->Customer->find('all',array('conditions'=>array('customername LIKE'=>'%'.$name.'%')));
            $c = count($data);
            if($c!=0)
            {
                for($i = 0; $i<$c;$i++)
                { 
                    echo "<div class='customer_show' align='left' id='".$data[$i]['Customer']['id']."'>";
                    echo $data[$i]['Customer']['customername'];
                    echo "<br>";
                    echo "</div>";
                }
            }
            else
            {
                echo "<div class='no_show' align='left'>";
                echo 'No Results Found';
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
        public function get_country_value()
        {
            $this->autoRender = false;
            $country_id =  $this->request->data['country_id'];
            $currency_data = $this->Currency->find('first',array('conditions'=>array('Currency.country_id'=>$country_id),'recursive'=>'2'));
            if(!empty($currency_data))
            {
                echo $currency_data['Currency']['exchangerate'];
            }
        }
       
        public function instrument_search()
        {
            $this->autoRender = false;
            $instrument =  $this->request->data['instrument'];
            $customer_id =  $this->request->data['customer_id'];
            $instrument_details=$this->CustomerInstrument->find('all',array('conditions'=>array('CustomerInstrument.customer_id'=>$customer_id)));
            foreach($instrument_details as $instrument)
            {
                echo "<div class='instrument_id' align='left' id='".$instrument['Instrument']['id']."'>";
                $instrument_list= $this->Instrument->find('all',array('conditions'=>array('Instrument.name LIKE'=>'%'.$instrument['Instrument']['name'].'%'),'fields'=>array('Instrument.name')));
                foreach($instrument_list as $li)
                {
                    echo $li['Instrument']['name'];
                }
                echo "<br>";
                echo "</div>";
            }
            
        }
        public function get_brand_value()
        {
            $this->autoRender = false;
            $instrument_id =  $this->request->data['instrument_id'];
            $brand_details=$this->CustomerInstrument->find('first',array('conditions'=>array('CustomerInstrument.instrument_id'=>$instrument_id),'recursive'=>'2'));
            if(!empty($brand_details))
            {
                echo json_encode($brand_details);
            }
            //pr($brand_list);,lp,
     
        }
        public function add_instrument()
        {
            $this->autoRender = false;
            $this->loadModel('Device');
            $this->request->data['Device']['customer_id']   =   $this->request->data['customer_id'];
            $this->request->data['Device']['instrument_id'] =   $this->request->data['instrument_id'];
            $this->request->data['Device']['brand_id']      =   $this->request->data['instrument_brand'];
            $this->request->data['Device']['quantity']      =   $this->request->data['instrument_quantity'];
            $this->request->data['Device']['model_no']      =   $this->request->data['instrument_modelno'];
            $this->request->data['Device']['range']         =   $this->request->data['instrument_range'];
            $this->request->data['Device']['call_location'] =   $this->request->data['instrument_calllocation'];
            $this->request->data['Device']['call_type']     =   $this->request->data['instrument_calltype'];
            $this->request->data['Device']['validity']      =   $this->request->data['instrument_validity'];
            $this->request->data['Device']['discount']      =   $this->request->data['instrument_discount'];
            $this->request->data['Device']['department']    =   $this->request->data['instrument_department'];
            $this->request->data['Device']['unit_price']    =   $this->request->data['instrument_unitprice'];
            $this->request->data['Device']['account_service']=  $this->request->data['instrument_account'];
            $this->request->data['Device']['title']         =   $this->request->data['instrument_title'];
            $this->request->data['Device']['status']        =   0;
            if($this->Device->save($this->request->data))
            {
                $device_id=$this->Device->getLastInsertID();
                echo $device_id;
            }
     
        }
        public function delete_instrument()
        {
            $this->autoRender=false;
            $device_id= $this->request->data['device_id'];
            $this->loadModel('Device');
            if($this->Device->deleteAll(array('Device.id'=>$device_id)))
            {
                echo "deleted";
            }
        }
        public function edit_instrument()
        {
            $this->autoRender=false;
            $device_id= $this->request->data['edit_device_id'];
            $this->loadModel('Device');
            $edit_device_details    =   $this->Device->find('first',array('conditions'=>array('Device.id'=>$device_id)));
            if(!empty($edit_device_details ))
            {
                echo json_encode($edit_device_details);
            }
        }
        public function update_instrument()
        {
            $this->autoRender = false;
            $this->loadModel('Device');
            $this->Device->id                               =   $this->request->data['device_id'];
            $this->request->data['Device']['customer_id']   =   $this->request->data['customer_id'];
            $this->request->data['Device']['instrument_id'] =   $this->request->data['instrument_id'];
            $this->request->data['Device']['brand_id']      =   $this->request->data['instrument_brand'];
            $this->request->data['Device']['quantity']      =   $this->request->data['instrument_quantity'];
            $this->request->data['Device']['model_no']      =   $this->request->data['instrument_modelno'];
            $this->request->data['Device']['range']         =   $this->request->data['instrument_range'];
            $this->request->data['Device']['call_location'] =   $this->request->data['instrument_calllocation'];
            $this->request->data['Device']['call_type']     =   $this->request->data['instrument_calltype'];
            $this->request->data['Device']['validity']      =   $this->request->data['instrument_validity'];
            $this->request->data['Device']['discount']      =   $this->request->data['instrument_discount'];
            $this->request->data['Device']['department']    =   $this->request->data['instrument_department'];
            $this->request->data['Device']['unit_price']    =   $this->request->data['instrument_unitprice'];
            $this->request->data['Device']['account_service']=  $this->request->data['instrument_account'];
            $this->request->data['Device']['title']         =   $this->request->data['instrument_title'];
            $this->request->data['Device']['status']        =   0;
            if($this->Device->save($this->request->data))
            {
               echo "Updated";
                
            }
     
        }
}