<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class CanddsController extends AppController
{
    public $helpers =   array('Html','Form','Session');
    public $uses    =   array('Priority','Paymentterm','Quotation','Currency','Deliveryorder','ReadytodeliverItem','CollectionDelivery',
                            'Country','Additionalcharge','Service','CustomerInstrument','Customerspecialneed',
                            'Instrument','Brand','Customer','Device','Salesorder','Description','Candd','Assign','Branch','Logactivity','Datalog');
    public function index()
    {
        $cd_statistics =    $this->CollectionDelivery->find('all',array('conditions'=>array('CollectionDelivery.status'=>1,'CollectionDelivery.is_deleted'=>0),'group'=>'CollectionDelivery.collection_delivery_date','recursive'=>2));
        //pr($cd_statistics);exit;
        $this->set(compact('cd_statistics'));
        //echo date('Y-m-d', strtotime('0 days'));
    }
    public function add()
    {   
        $assignto =   $this->Assign->find('list',array('conditions'=>array('Assign.status'=>1),'fields'=>array('id','assignedto')));
        $ready_to_deliver_items =   $this->Deliveryorder->find('all',array('conditions'=>array('Deliveryorder.move_to_deliver'=>0,'Deliveryorder.ready_to_deliver'=>1,'Deliveryorder.is_deleted'=>0,'Deliveryorder.status'=>1,'Deliveryorder.is_approved'=>1)));
        $collection_items   =   $this->Candd->find('all',array('conditions'=>array('Candd.status'=>1,'Candd.is_deleted'=>0)));
        //pr($collection_items);exit;
        $default_branch    =   $this->branch->find('first',array('conditions'=>array('branch.defaultbranch'=>1,'branch.status'=>1)));
        $this->set(compact('assignto','ready_to_deliver_items','collection_items'));
        if($this->request->is('post'))
        {
            echo date('Y-m-d',$this->request->data['Candd']['col_an_del_date']);
            //exit;
            if(date('Y-m-d',$this->request->data['Candd']['col_an_del_date'])>=date('Y-m-d'))
            {
            $collections_count =   $this->Candd->find('count',array('conditions'=>array('Candd.cd_date'=>$this->request->data['Candd']['col_an_del_date'])));
            $delivery_count    =    $this->ReadytodeliverItem->find('count',array('conditions'=>array('ReadytodeliverItem.cd_date'=>$this->request->data['Candd']['col_an_del_date'])));
            $this->request->data['CollectionDelivery']['collection_delivery_date']=$this->request->data['Candd']['col_an_del_date'];
            $this->request->data['CollectionDelivery']['tasks']=$collections_count+$delivery_count;
            $this->request->data['CollectionDelivery']['venues']='';
            $this->request->data['CollectionDelivery']['collections']=$collections_count;
            $this->request->data['CollectionDelivery']['branch_id']=$default_branch['branch']['id'];
            $this->request->data['CollectionDelivery']['deliveries']=$delivery_count;
            $delivery_lists =   $this->CollectionDelivery->find('all',array('conditions'=>array('CollectionDelivery.collection_delivery_date'=>$this->request->data['Candd']['col_an_del_date'])));
            if(count($delivery_lists)>0)
            {
                $this->CollectionDelivery->deleteAll(array('CollectionDelivery.collection_delivery_date'=>$this->request->data['Candd']['col_an_del_date']));
            }
            if($this->CollectionDelivery->save($this->request->data['CollectionDelivery']))
            {
                $cd_last_id =   $this->CollectionDelivery->getLastInsertID();
                $this->Candd->updateAll(array('Candd.status'=>1 ,'Candd.collection_delivery_id'=>$cd_last_id),array('Candd.cd_date'=>$this->request->data['Candd']['col_an_del_date']));
                $this->ReadytodeliverItem->updateAll(array('ReadytodeliverItem.status'=>1,'ReadytodeliverItem.collection_delivery_id'=>$cd_last_id),array('ReadytodeliverItem.cd_date'=>$this->request->data['Candd']['col_an_del_date']));
                
            }
            $this->redirect(array('controller'=>'Candds','action'=>'index'));
            }
            else {
                $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
            }
        }
    }
    public function edit($id=NULL)
    {
        $assignto =   $this->Assign->find('list',array('conditions'=>array('Assign.status'=>1),'fields'=>array('id','assignedto')));
        $ready_to_deliver_items =   $this->Deliveryorder->find('all',array('conditions'=>array('Deliveryorder.move_to_deliver'=>0,'Deliveryorder.ready_to_deliver'=>1,'Deliveryorder.is_deleted'=>0,'Deliveryorder.status'=>1,'Deliveryorder.is_approved'=>1)));
        $collection_delivery_data   =   $this->CollectionDelivery->find('first',array('conditions'=>array('CollectionDelivery.status'=>1,'CollectionDelivery.is_deleted'=>0),'recursive'=>2));
        $this->set(compact('assignto','collection_delivery_data','ready_to_deliver_items'));
        
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
    
    public function get_delivery_info() 
    {
        $this->autoRender = false;
        $cd_date    =   $this->request->data['cd_date'];
        $delivery_data = $this->ReadytodeliverItem->find('all', array('conditions' => array('ReadytodeliverItem.cd_date' =>$cd_date,'ReadytodeliverItem.is_deleted'=>0), 'recursive' => '2'));
        if (!empty($delivery_data)) {
            echo json_encode($delivery_data);
        }
    }
    public function get_delivery_tab_info() 
    {
        $this->autoRender = false;
        $cd_date    =   $this->request->data['cd_date'];
        $delivery_data1 = $this->Candd->find('all', array('conditions' => array('Candd.cd_date' =>$cd_date,'Candd.is_deleted'=>0,'Candd.purpose'=>'Delivery'), 'recursive' => '2'));
        if (!empty($delivery_data1)) {
            echo json_encode($delivery_data1);
        }
    }
    public function get_collection_info() 
    {
        $this->autoRender = false;
        $cd_date    =   $this->request->data['cd_date'];
        $collection_data = $this->Candd->find('all', array('conditions' => array('Candd.cd_date' =>$cd_date,'Candd.is_deleted'=>0,'Candd.purpose'=>'Collection'), 'recursive' => '2'));
        if (!empty($collection_data)) {
            echo json_encode($collection_data);
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
        $this->request->data['Candd']['purpose']                    =   $this->request->data['purpose'];
        $this->request->data['Candd']['customer_id']                =   $this->request->data['customer_id'];
        $this->request->data['Candd']['customername']               =   $this->request->data['customer_name'];
        $this->request->data['Candd']['Contactpersoninfo_id']       =   $this->request->data['attn_id'];
        $this->request->data['Candd']['assign_id']                  =   $this->request->data['assigned'];
        $this->request->data['Candd']['customer_address']           =   $this->request->data['customer_address'];
        $this->request->data['Candd']['address_id']                 =   $this->request->data['address_id'];
        $this->request->data['Candd']['phone']                      =   $this->request->data['phone'];
        $this->request->data['Candd']['remarks']                    =   $this->request->data['remark'];
        $this->request->data['Candd']['cd_date']                    =   $this->request->data['cd_date'];
        $this->request->data['Candd']['status']                     =   0;
        if($this->Candd->save($this->request->data))
        {
            $candd_last_id=$this->Candd->getLastInsertID();
            $candd_data =   $this->Candd->find('first',array('conditions'=>array('Candd.id'=>$candd_last_id)));
            /******************
                    * Log Activity For Approval
                    */
//                    $this->request->data['Logactivity']['logname'] = 'C&Dinfo';
//                    $this->request->data['Logactivity']['logactivity'] = 'Add Collection';
//                    $this->request->data['Logactivity']['logid'] = $candd_last_id;
//                    $this->request->data['Logactivity']['user_id'] = $this->Session->read('sess_userid');
//                    $this->request->data['Logactivity']['logapprove'] = 1;
//
//                    $a = $this->Logactivity->save($this->request->data['Logactivity']);
//                    
                /******************/
                    
                /******************
                    * Data Log Activity
                    */
//                    $this->request->data['Datalog']['logname'] = 'C&Dinfo';
//                    $this->request->data['Datalog']['logactivity'] = 'Add Collection';
//                    $this->request->data['Datalog']['logid'] = $candd_last_id;
//                    $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
//                    
//                    $a = $this->Datalog->save($this->request->data['Datalog']);
                    
                /******************/ 
            if(!empty($candd_data))
            {
                echo json_encode($candd_data);
            }
           
        }
    }
    public function move_deliveryorder()
    {
        $this->autoRender = false;
        $description_string =$this->request->data['description_move'];
        $assign_to =$this->request->data['assign_to'];
        $cd_date =$this->request->data['cd_date'];
        $export = explode(',', $description_string);
        foreach ($export as $ex=>$val)
        {
            $move_deliver_data  =   $this->ready_to_deliver($val,$assign_to,$cd_date);
            $deliver_data_for_tag  =   $this->ready_to_deliver_tag($val,$assign_to,$cd_date);
            pr($deliver_data_for_tag);exit;
            $this->ReadytodeliverItem->create();
            $this->Candd->create();
            $this->Candd->save($deliver_data_for_tag);
            
            if($this->ReadytodeliverItem->save($move_deliver_data))
            {
                $this->description_update_shipping($val);
                $this->Deliveryorder->updateAll(array('Deliveryorder.move_to_deliver'=>1,'assign_to'=>'"'.$assign_to.'"'),array('Deliveryorder.id'=>$val));
                /******************
                    * Log Activity For Approval
                    */
//                    $this->request->data['Logactivity']['logname'] = 'C&Dinfo';
//                    $this->request->data['Logactivity']['logactivity'] = 'Add Delivery';
//                    $this->request->data['Logactivity']['logid'] = $val;
//                    $this->request->data['Logactivity']['user_id'] = $this->Session->read('sess_userid');
//                    $this->request->data['Logactivity']['logapprove'] = 1;
//
//                    $a = $this->Logactivity->save($this->request->data['Logactivity']);
                    
                /******************/
                    
                /******************
                    * Data Log Activity
                    */
//                    $this->request->data['Datalog']['logname'] = 'C&Dinfo';
//                    $this->request->data['Datalog']['logactivity'] = 'Add Delivery';
//                    $this->request->data['Datalog']['logid'] = $val;
//                    $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
//                    
//                    $a = $this->Datalog->save($this->request->data['Datalog']);
                    
                /******************/ 
            }
        }
       echo  json_encode($export);
    }
}
?>