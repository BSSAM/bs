<?php
/*
 * Document     :   DeliveryordersController.php
 * Controller   :   Delivery Order
 * Model        :   Deliveryorder 
 * Created By   :   M.Iyappan Samsys
 */
    class DeliveryordersController extends AppController
    {
        public $helpers = array('Html','Form','Session');
        public $uses =array('Priority','Paymentterm','Quotation','Currency',
                            'Country','Additionalcharge','Service','CustomerInstrument','Customerspecialneed','Invoice',
                            'Instrument','Brand','Customer','Device','Salesorder','Description','Deliveryorder');
        public function index()
        {
            //$this->Quotation->recursive = 1; 
            $delivery_data = $this->Deliveryorder->find('all',array('order' => array('Deliveryorder.id' => 'DESC')));
            $this->set('deliveryorders', $delivery_data);
        }
        public function add()
        {
            
            $str=NULL;$d=date("d");$m=date("m");$y=date("Y");$t=time();
            $dmt='BDO'.($d+$m+$y+$t);
            $this->set('deliveryorderno', $dmt);
            $payment=$this->Paymentterm->find('list',array('fields'=>array('id','pay')));
            $this->set('payment',$payment);
            $services=$this->Service->find('list',array('fields'=>array('id','servicetype')));
            $this->set('service',$services);
            $this->request->data['Deliveryorder']['delivery_order_no']=$dmt;
            if($this->request->is('post'))
            {
                if($this->Deliveryorder->save($this->request->data['Deliveryorder']))
                {
                    $this->Session->setFlash(__('Delivery Order has been Added Succefully '));
                    $this->redirect(array('action'=>'index'));
                }
            }
        }
        public function edit($id=NULL)
        {
            $services=$this->Service->find('list',array('fields'=>array('id','servicetype')));
            $this->set('service',$services);
            $deliveryorder_details=$this->Deliveryorder->find('first',array('conditions'=>array('Deliveryorder.id'=>$id),'recursive'=>3));
            $this->set('deliveryorder',$deliveryorder_details);
            if($this->request->is(array('post','put')))
            {
                $this->Deliveryorder->id=$id;
                if($this->Deliveryorder->save($this->request->data['Deliveryorder']))
                {
                    $this->Session->setFlash(__($deliveryorder_details['Deliveryorder']['delivery_order_no'].' has been Updated Succefully'));
                    $this->redirect(array('action'=>'index'));
                }
            }
            else
            {
                $this->request->data=$deliveryorder_details;
            }
        }
        public function delete($id=NULL)
        {
            
            if($id!='')
            {
                if($this->Deliveryorder->delete($id))
                {
                    $this->Session->setFlash(__('The Delivery order has been deleted',h($id)));
                    return $this->redirect(array('controller'=>'Deliveryorders','action'=>'index'));
                }
            }
            else
            {
                throw new MethodNotAllowedException();
            }
        }
        public function approve()
        {
            $this->autoRender=false;
            $id =  $this->request->data['id'];
            $updated    =   $this->Deliveryorder->updateAll(array('Deliveryorder.is_approved'=>1),array('Deliveryorder.id'=>$id));
            if($updated)
            {
                //pr($id1);exit;
                $user_id = $this->Session->read('sess_userid');
                $this->Logactivity->updateAll(array('Logactivity.logapprove'=>2,'Logactivity.approved_by'=>$user_id),array('Logactivity.logid'=>$id,'Logactivity.logactivity'=>'Approved Delivery order'));
                $this->request->data['Invoice']['deliveryorder_id']=$id;
                $this->request->data['Invoice']['customer_purchaseorder_no']='';
                $this->request->data['Invoice']['is_approved']=0;
                $this->Invoice->save($this->request->data);
               
            }
         }
        /*
         * Function Name:salesorder_id_search
         * Description   :   for salesorder Search
         * Created on    :   29/05/2014 1.51PM 
         * BS V1.0 
         */
        public function salesorder_id_search()
        {
            
            $this->loadModel('Salesorder');
            $sales_id =  $this->request->data['sale_id'];
            $this->autoRender = false;
            $data = $this->Salesorder->find('all',array('conditions'=>array('salesorderno LIKE'=>'%'.$sales_id.'%','is_approved'=>'1')));
            $c = count($data);
            if(!empty($c))
            {
                for($i = 0; $i<$c;$i++)
                {    
                    echo "<div class='delivery_show' align='left' id='".$data[$i]['Salesorder']['id']."'>";
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
            $sales_data = $this->Salesorder->find('first',array('conditions'=>array('salesorderno'=>$sales_id,'is_approved'=>'1'),'recursive'=>'2'));
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
