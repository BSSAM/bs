<?php
    class QuotationsController extends AppController
    {
        public $helpers = array('Html','Form','Session');
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
            $str = 'BSQ-13-'.str_pad($str + 1, 5, 0, STR_PAD_LEFT);
            $this->set('quotationno', $str);
            if($this->request->is('post'))
            {
                pr($this->request->data);exit;
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
            $customer_data = $this->Customer->find('first',array('conditions'=>array('Customer.id'=>$customer_id),'fields'=>'Customer.regaddress'));
            if(!empty($customer_data))
            {
                echo $customer_data['Customer']['regaddress'];
            }
        }
}
