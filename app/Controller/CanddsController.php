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
                            'Country','Additionalcharge','Service','CustomerInstrument','Customerspecialneed','Contactpersoninfo','Canddsetting',
                            'Instrument','Brand','Customer','Device','Salesorder','Description','Candd','Assign','Branch','Logactivity','Datalog');
    public function index()
    {
        $cd_statistics =    $this->Candd->find('all',array('conditions'=>array('Candd.is_deleted'=>0),'group'=>'Candd.cd_date','recursive'=>2));
        //pr($cd_statistics);exit;
        $this->set(compact('cd_statistics'));
        //echo date('Y-m-d', strtotime('0 days'));
    }
    public function add()
    {   
        $assignto =   $this->Assign->find('list',array('conditions'=>array('Assign.status'=>1),'fields'=>array('id','assignedto')));
        $ready_to_deliver_item =   $this->Deliveryorder->find('all',array('conditions'=>array('Deliveryorder.move_to_deliver !='=>1,'Deliveryorder.is_deleted'=>0,'Deliveryorder.status'=>1,'Deliveryorder.is_approved'=>1)));
        $dummy = array();
        foreach($ready_to_deliver_item as $abc)
        {
            $c = count($abc['DelDescription']);
            $count_1 = '';
            foreach($abc['DelDescription'] as $a)
            {
                if($a['sales_desc_id'])
                {
                $device_no = $this->Description->find('first',array('conditions'=>array('Description.id'=>$a['sales_desc_id'],'Description.ready_deliver'=>1))); 
                }
                else
                {
                    $device_no ='';
                }
                if($device_no)
                {
                    $count_1 = $count_1 + 1;
                }
            }
            if($c == $count_1)
            {
                $dummy[] = $abc['Deliveryorder']['id'];
            }
        }
        $ready_del = array();
        foreach($dummy as $lastone)
        {
            $ready_del[] =   $this->Deliveryorder->find('first',array('conditions'=>array('Deliveryorder.id'=>$lastone,'Deliveryorder.move_to_deliver !='=>1,'Deliveryorder.is_deleted'=>0,'Deliveryorder.status'=>1,'Deliveryorder.is_approved'=>1)));
        }
        $ready_to_deliver_items =  $ready_del;
        
        //pr($ready_to_deliver_items);
        //exit;
        $collection_items   =   $this->Candd->find('all',array('conditions'=>array('Candd.is_deleted'=>0)));
        //pr($collection_items);exit;
        $default_branch    =   $this->branch->find('first',array('conditions'=>array('branch.defaultbranch'=>1,'branch.status'=>1)));
        
        $canddsetting_col =    $this->Canddsetting->find('first',array('conditions'=>array('Canddsetting.status'=>1,'Canddsetting.purpose'=>'C')));
        $canddsetting_del =    $this->Canddsetting->find('first',array('conditions'=>array('Canddsetting.status'=>1,'Canddsetting.purpose'=>'D')));
        
        $this->set(compact('assignto','ready_to_deliver_items','collection_items','canddsetting_col','canddsetting_del'));
        //pr($this->request->data);exit;
        if($this->request->is('post'))
        {
            //echo date('Y-m-d',$this->request->data['Candd']['col_an_del_date']);
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
        //$ready_to_deliver_items =   $this->Deliveryorder->find('all',array('conditions'=>array('Deliveryorder.move_to_deliver'=>0,'Deliveryorder.ready_to_deliver'=>1,'Deliveryorder.is_deleted'=>0,'Deliveryorder.status'=>1,'Deliveryorder.is_approved'=>1)));
        $ready_to_deliver_item =   $this->Deliveryorder->find('all',array('conditions'=>array('Deliveryorder.move_to_deliver !='=>1,'Deliveryorder.is_deleted'=>0,'Deliveryorder.status'=>1,'Deliveryorder.is_approved'=>1)));
        $dummy = array();
        foreach($ready_to_deliver_item as $abc)
        {
            $c = count($abc['DelDescription']);
            $count_1 = '';
            foreach($abc['DelDescription'] as $a)
            {
                if($a['sales_desc_id'])
                {
                $device_no = $this->Description->find('first',array('conditions'=>array('Description.id'=>$a['sales_desc_id'],'Description.ready_deliver'=>1))); 
                }
                else
                {
                    $device_no ='';
                }
                if($device_no)
                {
                    $count_1 = $count_1 + 1;
                }
            }
            if($c == $count_1)
            {
                $dummy[] = $abc['Deliveryorder']['id'];
            }
        }
        $ready_del = array();
        foreach($dummy as $lastone)
        {
            $ready_del[] =   $this->Deliveryorder->find('first',array('conditions'=>array('Deliveryorder.id'=>$lastone,'Deliveryorder.move_to_deliver !='=>1,'Deliveryorder.is_deleted'=>0,'Deliveryorder.status'=>1,'Deliveryorder.is_approved'=>1)));
        }
        $ready_to_deliver_items =  $ready_del;
        //pr($ready_to_deliver_items);exit;
        $collection_delivery_data   =   $this->Candd->find('first',array('conditions'=>array('Candd.is_deleted'=>0,'Candd.id'=>$id),'recursive'=>2));
        $canddsetting_col =    $this->Canddsetting->find('first',array('conditions'=>array('Canddsetting.status'=>1,'Canddsetting.purpose'=>'C')));
        $canddsetting_del =    $this->Canddsetting->find('first',array('conditions'=>array('Canddsetting.status'=>1,'Canddsetting.purpose'=>'D')));
        $this->set(compact('assignto','collection_delivery_data','ready_to_deliver_items','canddsetting_col','canddsetting_del'));
    }
    public function search() 
    {
        $this->loadModel('Customer');
        $name = $this->request->data['name'];
        $this->autoRender = false;
        $data = $this->Customer->find('all', array('conditions' => array('customername LIKE' => '%'.$name.'%','Customer.is_deleted'=>0)));
        $c = count($data);
        if (!empty($c)) 
        {
            for ($i = 0; $i < $c; $i++) 
            {
                echo "<div class='candd_single' align='left' id='".$data[$i]['Customer']['id']."'>";
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
        $customer_data = $this->Customer->find('first', array('conditions' => array('Customer.id' => $customer_id,'Customer.is_deleted'=>0), 'recursive' => '2'));
        if (!empty($contact_person_data)) {
            if(!empty($contact_person_data['Contactpersoninfo']['phone']))
            {
                echo $contact_person_data['Contactpersoninfo']['phone'];
            }
            else
            {
                echo $customer_data['Customer']['phone'];
            }
        }
        else
        {
            echo $customer_data['Customer']['phone'];
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
        $this->request->data['Candd']['branch_id']                  =   1;
        $this->request->data['Candd']['assign_id']                  =   $this->request->data['assigned'];
        $this->request->data['Candd']['customer_address']           =   $this->request->data['customer_address'];
        $this->request->data['Candd']['address_id']                 =   $this->request->data['address_id'];
        $this->request->data['Candd']['phone']                      =   $this->request->data['phone'];
        $this->request->data['Candd']['remarks']                    =   $this->request->data['remark'];
        $this->request->data['Candd']['cd_date']                    =   $this->request->data['cd_date'];
        $this->request->data['Candd']['purpose']                    =   $this->request->data['purpose'];
        $this->request->data['Candd']['status']                     =   0;
        
        $date_cd = $this->request->data['cd_date'];
        $candd_data =   $this->Candd->find('count',array('conditions'=>array('Candd.cd_date'=>$date_cd,'Candd.purpose'=>'Collection')));
        $canddsetting =   $this->Canddsetting->find('first',array('conditions'=>array('Canddsetting.is_deleted'=>0,'Canddsetting.purpose'=>'C')));
        
        $f = date("H:i");
        
        if($canddsetting['Canddsetting']['maxtime'] <= $f)
        {
            echo "maxtime";
        }
        else
        {
            if($candd_data>$canddsetting['Canddsetting']['maxtask'])
            {
                echo "maxtask";
            }
            else
            {
                if($this->Candd->save($this->request->data))
                {
                    $candd_last_id=$this->Candd->getLastInsertID();
                    $candd_data =   $this->Candd->find('first',array('conditions'=>array('Candd.id'=>$candd_last_id)));
                    /******************
                            * Log Activity For Approval
                            */
                    if($this->request->data['purpose'] == 'Collection')
                    {
                            $this->request->data['Logactivity']['logname'] = 'C&Dinfo';
                            $this->request->data['Logactivity']['logactivity'] = 'Add Collection';
                            $this->request->data['Logactivity']['logid'] = $candd_last_id;
                            $this->request->data['Logactivity']['logno'] = $this->request->data['customer_name'];
                            $this->request->data['Logactivity']['loglink'] = $date_cd;
                            $this->request->data['Logactivity']['user_id'] = $this->Session->read('sess_userid');
                            $this->request->data['Logactivity']['logapprove'] = 1;

                            $a = $this->Logactivity->save($this->request->data['Logactivity']);

                        /******************/

                        /******************
                            * Data Log Activity
                            */
                            $this->request->data['Datalog']['logname'] = 'C&Dinfo';
                            $this->request->data['Datalog']['logactivity'] = 'Add Collection';
                            $this->request->data['Datalog']['logid'] = $candd_last_id;
                            $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');

                            $a = $this->Datalog->save($this->request->data['Datalog']);
                    }     
                    if($this->request->data['purpose'] == 'Delivery')
                    {
        //                    $this->request->data['Logactivity']['logname'] = 'C&Dinfo';
        //                    $this->request->data['Logactivity']['logactivity'] = 'Add Delivery';
        //                    $this->request->data['Logactivity']['logid'] = $candd_last_id;
        //                    $this->request->data['Logactivity']['loglink'] = $date_cd;
        //                    $this->request->data['Logactivity']['user_id'] = $this->Session->read('sess_userid');
        //                    $this->request->data['Logactivity']['logapprove'] = 1;
        //
        //                    $a = $this->Logactivity->save($this->request->data['Logactivity']);
        //                    
        //                /******************/
        //                    
                        /******************
                            * Data Log Activity
                            */
                            $this->request->data['Datalog']['logname'] = 'C&Dinfo';
                            $this->request->data['Datalog']['logactivity'] = 'Add Delivery';
                            $this->request->data['Datalog']['logid'] = $candd_last_id;
                            $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');

                            $a = $this->Datalog->save($this->request->data['Datalog']);
                    }
                        /******************/ 
                    if(!empty($candd_data))
                    {
                        echo json_encode($candd_data);
                    }
                }
            }
        }
    }
    public function move_deliveryorder()
    {
        $this->autoRender = false;
        //pr($this->request->data);exit;
        $description_string =$this->request->data['description_move'];
        $assign_to =$this->request->data['assign_to'];
        $cd_date =$this->request->data['cd_date'];
        $assign_value =$this->request->data['assign_value'];
        $export = explode(',', $description_string);
        $candd_data =   $this->Candd->find('count',array('conditions'=>array('Candd.cd_date'=>$cd_date,'Candd.purpose'=>'Delivery')));
        $canddsetting =   $this->Canddsetting->find('first',array('conditions'=>array('Canddsetting.is_deleted'=>0,'Canddsetting.purpose'=>'D')));
        
        if($candd_data>$canddsetting['Canddsetting']['maxtask'])
        {
            echo "maxtask";
        }
        else
        {
        foreach ($export as $ex=>$val)
        {
            $move_deliver_data  =   $this->ready_to_deliver($val,$assign_to,$cd_date,$assign_value);
            $deliver_data_for_tag  =   $this->ready_to_deliver_tag($val,$assign_to,$cd_date,$assign_value);
            //pr($move_deliver_data);
            //pr($deliver_data_for_tag);exit;
            $this->ReadytodeliverItem->create();
            $this->Candd->create();
            $this->Candd->save($deliver_data_for_tag);
            
            if($this->ReadytodeliverItem->save($move_deliver_data))
            {
                $ready_id = $this->ReadytodeliverItem->getLastInsertId();
                $cand_id = $this->Candd->getLastInsertId();
                $this->Candd->updateAll(array('Candd.readytodeliver_items_id'=>$ready_id),array('Candd.id'=>$cand_id));
                $this->ReadytodeliverItem->updateAll(array('ReadytodeliverItem.collection_delivery_id'=>$cand_id),array('ReadytodeliverItem.id'=>$ready_id));
                
                //$this->description_update_shipping($val);
                $this->Deliveryorder->updateAll(array('Deliveryorder.move_to_deliver'=>1,'assign_to'=>'"'.$assign_value.'"'),array('Deliveryorder.id'=>$val));
                /******************
                    * Log Activity For Approval
                    */
//                    $this->request->data['Logactivity']['logname'] = 'C&Dinfo';
//                    $this->request->data['Logactivity']['logactivity'] = 'Add Delivery';
//                    $this->request->data['Logactivity']['logid'] = $cand_id;
//                    $this->request->data['Logactivity']['logno'] = $val;
//                    $this->request->data['Logactivity']['loglink'] = $cd_date;
//                    $this->request->data['Logactivity']['user_id'] = $this->Session->read('sess_userid');
//                    $this->request->data['Logactivity']['logapprove'] = 1;
//
//                    $a = $this->Logactivity->save($this->request->data['Logactivity']);
//                    
                /******************/
                    
                /******************
                    * Data Log Activity
                    */
                    $this->request->data['Datalog']['logname'] = 'C&Dinfo';
                    $this->request->data['Datalog']['logactivity'] = 'Add Delivery';
                    $this->request->data['Datalog']['logid'] = $cand_id;
                    $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                    
                    $a = $this->Datalog->save($this->request->data['Datalog']);
                    
                /******************/ 
            }
        }
       echo  json_encode($export);
        }
    }
    
    public function shipped_check()
    {
        $this->autoRender = false;
        //pr($this->request->data);exit;
        $shipped_check =$this->request->data['shipped_check'];
        $delivered_check =$this->request->data['delivered_check'];
        //$assign_to =$this->request->data['assign_to'];
        $cd_date =$this->request->data['cd_date'];
        //pr($this->request->data);exit;
        //$assign_value =$this->request->data['assign_value'];
        $export = explode(',', $shipped_check);
        $export1 = explode(',', $delivered_check);
        foreach ($export as $ex=>$val)
        {
            $shipped_data  =   $this->is_shipped($val,$cd_date);
            
        }
        foreach ($export1 as $ex=>$val)
        {
            $deli_data  =   $this->is_delivered($val,$cd_date);
            
        }
    }
    
    
    
    public function edit_candds()
    {
        $this->autoRender = false;
        $ready_to_edit =$this->request->data['ready_to_edit'];
        //$this->loadModel('Deliveryorder');
        $candd_edit =   $this->Candd->find('first',array('conditions'=>array('Candd.id'=>$ready_to_edit),'recursive'=>3));
        echo  json_encode($candd_edit);
        //pr($candd_edit);
    }
    public function ready_to_delete()
    {
        $this->autoRender = false;
        $ready_to_edit =$this->request->data['ready_to_edit'];
        //$this->loadModel('Deliveryorder');
        $ready_to_deliver_items =   $this->ReadytodeliverItem->find('first',array('conditions'=>array('ReadytodeliverItem.id'=>$ready_to_edit,'ReadytodeliverItem.is_shipped'=>0)));
        if($ready_to_deliver_items)
        {
        $candd_edit =   $this->Deliveryorder->updateAll(array('Deliveryorder.move_to_deliver'=>0),array('Deliveryorder.id'=>$ready_to_deliver_items['ReadytodeliverItem']['deliveryorder_id']));
        
        $this->ReadytodeliverItem->deleteAll(array('ReadytodeliverItem.id'=>$ready_to_edit));
        $this->Candd->deleteAll(array('Candd.readytodeliver_items_id'=>$ready_to_edit));
        
        //echo  json_encode($candd_edit);
        //pr($candd_edit);
        
        return 'success';
        
        }
        else
        {
            return 'failure'; 
        }
    }
    
     public function approve()
    {
        $this->autoRender = false;
        $this->loadModel('Description');
        $this->loadModel('Logactivity');
        $id =$this->request->data['id'];
        $user_id = $this->Session->read('sess_userid');
       // $this->loadModel('');
        $candd_data =   $this->Candd->find('first',array('conditions'=>array('Candd.id'=>$id)));
        $readytodeliver_items_id = $candd_data['Candd']['readytodeliver_items_id'];
        //pr($candd_data);
        if(empty($readytodeliver_items_id))
        {
            $this->Candd->updateAll(array('Candd.is_approved'=>1),array('Candd.id'=>$id));
            $this->Logactivity->updateAll(array('Logactivity.logapprove'=>2,'Logactivity.approved_by'=>$user_id),array('Logactivity.logid'=>$id,'Logactivity.logname'=>'C&Dinfo'));
        }
        else
        {
            $this->Candd->updateAll(array('Candd.is_approved'=>1),array('Candd.id'=>$id));
            $this->ReadytodeliverItem->updateAll(array('ReadytodeliverItem.is_approved'=>1),array('ReadytodeliverItem.id'=>$readytodeliver_items_id));
            $this->Logactivity->updateAll(array('Logactivity.logapprove'=>2,'Logactivity.approved_by'=>$user_id),array('Logactivity.logid'=>$id,'Logactivity.logname'=>'C&Dinfo'));
            $ready_items =   $this->ReadytodeliverItem->find('first',array('conditions'=>array('ReadytodeliverItem.id'=>$readytodeliver_items_id)));
            $sales_id = $ready_items['ReadytodeliverItem']['salesorderno'];
            $this->Description->updateAll(array('Description.shipping'=>1),array('Description.salesorder_id'=>$sales_id));
            //$salesorder_details    =   $this->Description->find('first',array('conditions'=>array('Description.salesorder_id'=>$sales_id),'contain'=>array('Description'=>array('Instrument','Brand','Range','Department','conditions'=>array('Description.pending'=>'1')),'Customer'),'recursive'=>3));
            
        }
        //echo "success";
        //pr($candd_edit);
    }
    
    function pdf($id = NULL) 
        {
        
            $this->autoRender = false;
           // $quotation_data = $this->Quotation->find('first', array('conditions' => array('Quotation.id' => $id),'recursive'=>2));
            //pr($quotation_data);exit;
            $file_type = 'pdf';
            
        //pr($cd_statistics);exit;
        //$this->set(compact('cd_statistics'));
            $filename = $id;

           $html = '<html>
<head>
<meta charset="utf-8" />
<title></title>
<link href="http://fonts.googleapis.com/css?family=Oswald" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Oswald:300,700" rel="stylesheet" type="text/css">
<style>
table td { font-size:9px; line-height:11px; }
.table_format table { }
.table_format td { text-align:center; padding:5px; }
@page {
margin: 180px 50px;
}
#header { position: fixed; left: 0px; top: -180px; right: 0px; height: 50px; }
#footer { position: fixed; left: 0px; bottom: -180px; right: 0px; height: 100px; }
#footer .page:after { content: counter(page); }
</style>
</head>
<body style="font-family:Oswald, sans-serif;font-size:9px;padding:0;margin:0;font-weight: 300; color:#444;">';
 $html .='<div id="header">
     <h3 style="text-align:center;margin:10px 0;color:#000;font-size:28px;">BS TECH PTE LTD</h3>
     <div style="font-size:10px;color:#666;margin-top:20px;">DATE :<span style="margin-left:10px;"> '.$id.'</span></div>
     <div style="font-size:11px;color:#333;margin-top:10px;">BS TECH PTE LTD</div>
     
</div>
<div id="footer">
     <div style="width:100%;" class="page">
          <div style="font-size:10px;color:#666;margin-top:20px;">'.date('Y-m-d H:i:s').'</div>
     </div>
</div>';
           $data = $this->Assign->find('all',array('conditions'=>array('Assign.is_deleted'=>0)),array('order' => array('Assign.id' => 'DESC')));
           
            foreach($data as $data_assignto)
            {
		$cd_statistics =    $this->Candd->find('all',array('conditions'=>array('Candd.cd_date'=>$id,'Candd.assign_id'=>$data_assignto['Assign']['id']),'recursive'=>2));
               if($cd_statistics)
               {
                $html .= '<div id="content" style="page-break-after: always;"><div style="font-size:11px;color:#333;margin-top:5px;margin-top:-40px;">ASSIGNED TO : '.$data_assignto['Assign']['assignedto'].'</div>';
                        
            $cd_statistics =    $this->Candd->find('all',array('conditions'=>array('Candd.cd_date'=>$id,'Candd.assign_id'=>$data_assignto['Assign']['id']),'recursive'=>2));
            
            foreach($cd_statistics as $k=>$cd):
               if(($cd['Candd']['purpose']=='Collection' && $cd['Candd']['is_approved']==1) || $cd['Candd']['purpose']=='Delivery')
               {
               $cd_contact_id = $cd['Candd']['Contactpersoninfo_id'];
               $data = $this->Contactpersoninfo->find('first',array('conditions'=>array('Contactpersoninfo.id'=>$cd_contact_id)));
               $cd_contact_name ='';
               if($data)
               {
               $cd_contact_name = $data['Contactpersoninfo']['name'];
               }
               $cd_readytodeliver_id = $cd['Candd']['readytodeliver_items_id'];
               $data_r = $this->ReadytodeliverItem->find('first',array('conditions'=>array('ReadytodeliverItem.id'=>$cd_readytodeliver_id)));
               $sales = '';
               $delivery = '';
               if($data_r)
               {
               $sales = $data_r['ReadytodeliverItem']['salesorderno'];
               $delivery = $data_r['ReadytodeliverItem']['deliveryorderno'];
               }
             if($k == 0)
                    {  
           

 $html .='
     <table cellpadding="0" cellspacing="0"  style="width:100%;text-align:center;border-left:1px solid #333;border-top:1px solid #333;">
          <tr style="background:#333;">
               <th style="font-size:11px;text-transform:uppercase;color:#fff;border-right:1px solid #333;border-bottom:1px solid #333;padding:5px;">S NO.</th>
               <th style="font-size:11px;text-transform:uppercase;color:#fff;border-right:1px solid #333;border-bottom:1px solid #333;padding:5px;">PURPOSE TO</th>
               <th style="font-size:11px;text-transform:uppercase;color:#fff;border-right:1px solid #333;border-bottom:1px solid #333;padding:5px;">REQUESTED BY</th>
               <th style="font-size:11px;text-transform:uppercase;color:#fff;border-right:1px solid #333;border-bottom:1px solid #333;padding:5px;">CUSTOMER</th>
               <th style="font-size:11px;text-transform:uppercase;color:#fff;border-right:1px solid #333;border-bottom:1px solid #333;padding:5px;">ADDRESS OF LOCATION</th>
               <th style="font-size:11px;text-transform:uppercase;color:#fff;border-right:1px solid #333;border-bottom:1px solid #333;padding:5px;">PERSON TO CONTACT</th>
               <th style="font-size:11px;text-transform:uppercase;color:#fff;border-right:1px solid #333;border-bottom:1px solid #333;padding:5px;">PHONE NO.</th>
               <th style="font-size:11px;text-transform:uppercase;color:#fff;border-right:1px solid #333;border-bottom:1px solid #333;padding:5px;">SALES ORDER NO.</th>
               <th style="font-size:11px;text-transform:uppercase;color:#fff;border-right:1px solid #333;border-bottom:1px solid #333;padding:5px;">DELIVERY ORDER NO.</th>
               <th  width="200" style="font-size:11px;text-transform:uppercase;color:#fff;border-right:1px solid #333;border-bottom:1px solid #333;padding:5px;">REMARKS</th>
          </tr>';
 }
                    elseif($k%5 == 0)
                    {
    $html .= '<table cellpadding="0" cellspacing="0"  style="width:100%;margin-top:-50px;text-align:center;border-left:1px solid #333;page-break-before: always;border-top:1px solid #333;">
          <tr style="background:#333;">
               <th style="font-size:11px;text-transform:uppercase;color:#fff;border-right:1px solid #333;border-bottom:1px solid #333;padding:5px;">S NO.</th>
               <th style="font-size:11px;text-transform:uppercase;color:#fff;border-right:1px solid #333;border-bottom:1px solid #333;padding:5px;">PURPOSE TO</th>
               <th style="font-size:11px;text-transform:uppercase;color:#fff;border-right:1px solid #333;border-bottom:1px solid #333;padding:5px;">REQUESTED BY</th>
               <th style="font-size:11px;text-transform:uppercase;color:#fff;border-right:1px solid #333;border-bottom:1px solid #333;padding:5px;">CUSTOMER</th>
               <th style="font-size:11px;text-transform:uppercase;color:#fff;border-right:1px solid #333;border-bottom:1px solid #333;padding:5px;">ADDRESS OF LOCATION</th>
               <th style="font-size:11px;text-transform:uppercase;color:#fff;border-right:1px solid #333;border-bottom:1px solid #333;padding:5px;">PERSON TO CONTACT</th>
               <th style="font-size:11px;text-transform:uppercase;color:#fff;border-right:1px solid #333;border-bottom:1px solid #333;padding:5px;">PHONE NO.</th>
               <th style="font-size:11px;text-transform:uppercase;color:#fff;border-right:1px solid #333;border-bottom:1px solid #333;padding:5px;">SALES ORDER NO.</th>
               <th style="font-size:11px;text-transform:uppercase;color:#fff;border-right:1px solid #333;border-bottom:1px solid #333;padding:5px;">DELIVERY ORDER NO.</th>
               <th  width="200" style="font-size:11px;text-transform:uppercase;color:#fff;border-right:1px solid #333;border-bottom:1px solid #333;padding:5px;">REMARKS</th>
          </tr>';
                    }
                    
                    $html .='<tr>
               <td style="font-size:11px;text-transform:uppercase;color:#666;border-right:1px solid #333;border-bottom:1px solid #333;padding:3px;">'.($k+1).'</td>
               <td style="font-size:11px;text-transform:uppercase;color:#666;border-right:1px solid #333;border-bottom:1px solid #333;padding:3px;">'.$cd['Candd']['purpose'].'</td>
               <td style="font-size:11px;text-transform:uppercase;color:#666;border-right:1px solid #333;border-bottom:1px solid #333;padding:3px;">'.$cd['Candd']['purpose'].'</td>
               <td style="font-size:11px;text-transform:uppercase;color:#666;border-right:1px solid #333;border-bottom:1px solid #333;padding:3px;">'.$cd['Candd']['customername'].'</td>
               <td style="font-size:11px;text-transform:uppercase;color:#666;border-right:1px solid #333;border-bottom:1px solid #333;padding:3px;">'.$cd['Candd']['customer_address'].'</td>
               <td style="font-size:11px;text-transform:uppercase;color:#666;border-right:1px solid #333;border-bottom:1px solid #333;padding:3px;">'.$cd_contact_name.'</td>
               <td style="font-size:11px;text-transform:uppercase;color:#666;border-right:1px solid #333;border-bottom:1px solid #333;padding:3px;">'.$cd['Candd']['phone'].'</td>
               <td style="font-size:11px;text-transform:uppercase;color:#666;border-right:1px solid #333;border-bottom:1px solid #333;padding:3px;">'.$sales.'</td>
               <td style="font-size:11px;text-transform:uppercase;color:#666;border-right:1px solid #333;border-bottom:1px solid #333;padding:3px;">'.$delivery.'</td>
               <td style="font-size:11px;text-transform:uppercase;color:#666;border-right:1px solid #333;border-bottom:1px solid #333;padding:3px;">'.$cd['Candd']['remarks'].'</td>
          </tr>';
                    
          if($k%5 == 4 || $k+1 == count($cd_statistics)){
                $html .='</table>';
                }
               }
                endforeach;
                
                $html .='</div>';
                //pr($cd_statistics);
            }
            
           
     $html .= '</body>
</html>'; 
                //pr($html);exit;
        $this->export_report_all_format($file_type, $filename, $html);
        }
    }
    function export_report_all_format($file_type, $filename, $html)
    {    
        
        if($file_type == 'pdf')
        {
    
            App::import('Vendor', 'dompdf', array('file' => 'dompdf' . DS . 'dompdf_config.inc.php'));
            $this->dompdf = new DOMPDF();        
            $papersize = "a4";
            $orientation = 'landscape';        
            $this->dompdf->load_html($html);
            $this->dompdf->set_paper($papersize, $orientation);        
            $this->dompdf->render();
            $this->dompdf->stream("CandD-".$filename.".pdf");
            echo $this->dompdf->output();
           // $output = $this->dompdf->output();
            //file_put_contents($filename.'.pdf', $output);
            die();
            
        
        }    
        else if($file_type == 'xls')
        {    
            $file = $filename.".xls";
            header('Content-Type: text/html');
            header("Content-type: application/x-msexcel"); //tried adding  charset='utf-8' into header
            header("Content-Disposition: attachment; filename=$file");
            echo $html;
            
        }
        else if($file_type == 'doc')
        {                
            $file = $filename.".doc";
            header("Content-type: application/vnd.ms-word");
            header("Content-Disposition: attachment;Filename=$file");
            echo $html;
            
        }

        
    }
    
    
    
}
?>