<?php
    class SalesordersController extends AppController
    {
        public $helpers = array('Html','Form','Session');
        public $uses =array('Priority','Paymentterm','Salesorder','Service');
        public function index()
        {
            //$this->Quotation->recursive = 1; 
            $data = $this->Salesorder->find('all',array('order' => array('Salesorder.id' => 'DESC')));
            $this->set('salesorder', $data);
        }
        public function add()
        {
           //echo  md5(substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, rand(1,10))); 
            $str=NULL;
            $d=date("d");
            $m=date("m");
            $y=date("Y");
            $t=time();
            $dmt='BSO'.($d+$m+$y+$t);
            //$str = 'BSQ-13-'.str_pad($str + 1, 5, 0, STR_PAD_LEFT);
            $this->set('salesorderno', $dmt);
            $priority=$this->Priority->find('list',array('fields'=>array('id','priority')));
            $this->set('priority',$priority);
            $payment=$this->Paymentterm->find('list',array('fields'=>array('id','pay')));
            $this->set('payment',$payment);
            $services=$this->Service->find('list',array('fields'=>array('id','servicetype')));
            $this->set('service',$services);
            $this->request->data['Salesorder']['salesorderno']=$dmt;
            if($this->request->is('post'))
            {
                $this->request->data['Quotation']['customername']=$this->request->data['sales_customername'];
                if($this->Salesorder->save($this->request->data['Salesorder']))
                {
                    $this->Session->setFlash(__('Salesorder has been Added Succefully '));
                    $this->redirect(array('action'=>'index'));
                }
               
            }
        }
        public function edit($id=NULL)
        {
            $priority=$this->Priority->find('list',array('fields'=>array('id','priority')));
            $this->set('priority',$priority);
            $payment=$this->Paymentterm->find('list',array('fields'=>array('id','pay')));
            $this->set('payment',$payment);
            $services=$this->Service->find('list',array('fields'=>array('id','servicetype')));
            $this->set('service',$services);
            $salesorder_details=$this->Salesorder->find('first',array('conditions'=>array('Salesorder.id'=>$id)));
           
            if($this->request->is(array('post','put')))
            {
                $this->Salesorder->id=$id;
                if($this->Salesorder->save($this->request->data['Salesorder']))
                {
                    $this->Session->setFlash(__('Salesorder has been Added Succefully '));
                    $this->redirect(array('action'=>'index'));
                }
            }
            else
            {
                $this->request->data=$salesorder_details;
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
}
