<?php
    class QuotationsController extends AppController
    {
        public $helpers = array('Html','Form','Session');
        public $uses =array('Priority','Paymentterm','Quotation','Currency','Country','Additionalcharge','Service');
        public function index()
        {
            //$this->Quotation->recursive = 1; 
            $data = $this->Quotation->find('all',array('order' => array('Quotation.id' => 'DESC')));
            $this->set('quotation', $data);
        }
        public function add()
        {
           //echo  md5(substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, rand(1,10))); 
            $str=NULL;
            $d=date("d");
            $m=date("m");
            $y=date("Y");
            $t=time();
            $dmt='BSQ'.($d+$m+$y+$t);
            //$str = 'BSQ-13-'.str_pad($str + 1, 5, 0, STR_PAD_LEFT);
            $this->set('quotationno', $dmt);
            $priority=$this->Priority->find('list',array('fields'=>array('id','priority')));
            $this->set('priority',$priority);
            $payment=$this->Paymentterm->find('list',array('fields'=>array('id','pay')));
            $this->set('payment',$payment);
            $country=$this->Country->find('list',array('fields'=>array('id','country')));
            $this->set('country',$country);
            
            $additional_charge=$this->Additionalcharge->find('list',array('fields'=>array('id','additionalcharge')));
            $this->set('additional',$additional_charge);
            
            $services=$this->Service->find('list',array('fields'=>array('id','servicetype')));
            $this->set('service',$services);
            
            $this->request->data['Quotation']['quotationno']=$dmt;
            if($this->request->is('post'))
            {
                if($this->Quotation->save($this->request->data['Quotation']))
                {
                    $this->Session->setFlash(__('Quotation has been Added Succefully '));
                    $this->redirect(array('action'=>'index'));
                }
               
            }
        }
        public function search()
        {
            $this->loadModel('Customer');
            $name =  $this->request->data['name'];
            $this->autoRender = false;
            $data = $this->Customer->find('all',array('conditions'=>array('customername LIKE'=>'%'.$name.'%')));
            $c = count($data);
            for($i = 0; $i<$c;$i++)
            { 
                echo "<div class='show' align='left' id='".$data[$i]['Customer']['id']."'>";
                echo $data[$i]['Customer']['customername'];
                echo "<br>";
                echo "</div>";
            }
        }
        public function get_customer_value()
        {
            $this->loadModel('Customer');
            $this->autoRender = false;
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
        public function get_gst_value()
        {
            $this->autoRender = false;
            $gst_id =  $this->request->data['gst_id'];
            switch($gst_id)
            {
                case 'Standard':
                    echo "7.00";
                    break;
                case 'Zero':
                    echo "0.00";
                    break;
            }
        }
}
