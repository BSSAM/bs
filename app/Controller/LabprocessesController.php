<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class LabprocessesController extends AppController
{
    public $helpers =   array('Html','Form','Session');
    public $uses    =   array('Priority','Paymentterm','Quotation','Currency','Deliveryorder','Address','DelDescription','Logactivity',
                            'Country','Additionalcharge','Service','CustomerInstrument','Customerspecialneed',
                            'Instrument','Brand','Customer','Device','Salesorder','Description','Labprocess','branch','Datalog');
    public $components = array('RequestHandler');
     
    public function index()
    {
        $labprocess = $this->Salesorder->find('all',array('conditions'=>array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved'=>1,'Salesorder.is_approved_lab'=>0),'group' => array('Salesorder.salesorderno')));
        
        $this->set('labprocess', $labprocess);
        //pr($labprocess);
        $data_checking_count = $this->Salesorder->find('all',array('contain'=>array("Description" => array("conditions" => array("Description.checking" => 1))) ,'conditions'=>array('Salesorder.is_approved'=>1,'Salesorder.is_approved_lab'=>0),'group' => array('Salesorder.salesorderno')));
        $salesordercount = $this->Salesorder->find('count',array('conditions'=>array('Salesorder.is_approved'=>1,'Salesorder.is_approved_lab'=>0)));
        
        $this->Description->unbindModel(array('belongsTo' => array('Brand','Customer','Instrument','Department','Salesorder')), true);
        
        $data_description_count = $this->Description->find('count',array('conditions'=>array('Description.is_approved'=>1,'Description.is_approved_lab'=>0)));
        
        $this->Description->unbindModel(array('belongsTo' => array('Brand','Customer','Instrument','Department','Salesorder')), true);
        $data_pending_count = $this->Description->find('count',array('conditions'=>array('AND'=>array('Description.checking'=>0,'Description.is_approved_lab'=>0,'Description.is_approved'=>1,'Description.salesorder_id !='=>''))));
        
        $this->Description->unbindModel(array('belongsTo' => array('Brand','Customer','Instrument','Department','Salesorder')), true);
        
        $data_processing = $this->Salesorder->find('all',array('conditions'=>array('Salesorder.is_deliveryorder_created'=>0)));
        $count_process = 0;
        $count_process1 = 0; 
        foreach($data_processing as $data_processing_list)
        {
        $count_process = $this->Description->find('count',array('conditions'=>array('Description.processing'=>1,'Description.salesorder_id'=>$data_processing_list['Salesorder']['salesorderno'])));
        $count_process1 += $count_process;//echo $count;exit;
        }
        //pr();exit;
        $data_processing_count = $count_process1;
        $this->Description->unbindModel(array('belongsTo' => array('Brand','Customer','Instrument','Department','Salesorder')), true);
         $data_checking = $this->Salesorder->find('all',array('conditions'=>array('Salesorder.is_deliveryorder_created'=>0)));
        $count_check = 0;
        $count_check1 = 0; 
        foreach($data_checking as $data_checking_list)
        {
        $count_check = $this->Description->find('count',array('conditions'=>array('Description.checking ='=>1,'Description.is_approved_lab'=>1,'Description.salesorder_id'=>$data_processing_list['Salesorder']['salesorderno'])));
        $count_check1 += $count_check;//echo $count;exit;
        }
        //pr();exit;
        $data_checking_count = $count_check1;
        
        
        
        //$data_checking_count = $this->Description->find('count',array('conditions'=>array('Description.checking ='=>1,'Description.is_approved_lab'=>1 )));
        $this->set(compact('data_checking_count','data_processing_count','data_pending_count','data_description_count','salesordercount','labprocess'));
        $this->set('count_data', $data_checking_count);
    }  
    public function labs($id=null)
    {
        $salesorder_list    =   $this->Salesorder->find('first',array('conditions'=>array('Salesorder.id'=>$id,'Salesorder.is_approved'=>1,'Salesorder.is_deliveryorder_created'=>0)));
        
        $this->set('lab_sales_id',$id);
        $branch =   $this->branch->find('first',array('conditions'=>array('branch.defaultbranch'=>1,'branch.status'=>1)));
        
        /******************************************************************
         * 
         *                      Full Delivery Order
         * 
         ******************************************************************/
               
        if($salesorder_list['Customer']['deliveryordertype_id']==1)
        {
            $data_description = $this->Description->find('all', array('conditions' => array('Description.is_approved' => 1, 'Description.salesorder_id' => $id)));
            $this->Description->updateAll(array('Description.processing' => 1), array('Description.salesorder_id' => $id));
            $this->set('labs', $data_description);
            if ($this->request->is(array('post', 'put'))) 
            {
                $checking_array = $this->request->data['Description']['checking'];
                $description_array = $this->request->data['Description']['processing'];
                if (!empty($description_array)) 
                {
                    foreach ($description_array as $key => $value) 
                    {
                        $this->Description->id = $key;
                        $this->Description->saveField('processing', $value);
                    }
                }
                if(!empty($checking_array))
                {
                    foreach ($checking_array as $key => $value) 
                    {
                        $this->Description->id = $key;
                        $this->Description->saveField('checking', $value);
                        if($value==1)
                        {
                            $this->Description->id = $key;
                            $this->Description->saveField('is_approved_lab', 1);
                        }
                    }
                }  
               $device_count = $this->Description->find('count', array('conditions' => array('Description.is_approved' => 1, 'Description.salesorder_id' => $id)));
               $lab_approved = $this->Description->find('count', array('conditions' => array('Description.is_approved' => 1, 'Description.salesorder_id' => $id, 'Description.checking' => 1, 'Description.is_approved_lab' => 1, 'Description.processing' => 1)));
               if($device_count==$lab_approved)
               {
                    $address_list    =   $this->Address->find('first',array('conditions'=>array('Address.customer_id'=>$salesorder_list['Customer']['id'],'Address.status'=>1,'Address.type'=>'delivery')));
                    $dmt=$this->random('deliveryorder');
                    $delivery['Deliverorder']   =  $salesorder_list['Salesorder'];
                    $delivery['Deliverorder']['po_reference_no']   =  $salesorder_list['Salesorder']['ref_no'];
                    $delivery['Deliverorder']['delivery_order_no']  = $dmt;  
                    $delivery['Deliverorder']['salesorder_id']  = $id; 
                    $delivery['Deliverorder']['delivery_address']  = $address_list['Address']['address']; 
                    $delivery['Deliverorder']['customer_address']  = $salesorder_list['Salesorder']['address']; 
                    $delivery['Deliverorder']['delivery_order_date']  = date('d-M-y');
                    $delivery['Deliverorder']['our_reference_no']  = $salesorder_list['Salesorder']['track_id']; 
                    $delivery['Deliverorder']['your_reference_no']  = $salesorder_list['Salesorder']['ref_no']; 
                    $delivery['Deliverorder']['branch_id']  = $branch['branch']['id'];
                    unset($delivery['Deliverorder']['id']);
                    unset($delivery['Deliverorder']['is_approved']);
                    //pr($delivery['Deliverorder']);exit;
                    if($this->Deliveryorder->save($delivery['Deliverorder']))
                    {
                        
                        $last_id    =   $this->Deliveryorder->getLastInsertId();
                        
                        $this->Salesorder->updateAll(array('Salesorder.is_deliveryorder_created'=>1),array('Salesorder.id'=>$salesorder_list['Salesorder']['id']));
                        
                        foreach($salesorder_list['Description'] as $sale):
                            $this->DelDescription->create();
                            $description_data  =   $this->delDescription($sale['id'],$last_id);
                            $this->DelDescription->save($description_data);
                        endforeach;   
                        /******************
                        * Data Log
                        */
                        $this->request->data['Logactivity']['logname'] = 'Quotation';
                        $this->request->data['Logactivity']['logactivity'] = 'Add Delivery Order';
                        $this->request->data['Logactivity']['logid'] = $last_id;
                        $this->request->data['Logactivity']['user_id'] = $this->Session->read('sess_userid');
                        $this->request->data['Logactivity']['logapprove'] = 1;
                        $this->Logactivity->save($this->request->data['Logactivity']);
                        /******************/
                        /*
                         * Data Log Activity
                        */
                        $this->request->data['Datalog']['logname'] = 'Deliveryorder';
                        $this->request->data['Datalog']['logactivity'] = 'Add';
                        $this->request->data['Datalog']['logid'] = $last_id;
                        $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                    
                        $a = $this->Datalog->save($this->request->data['Datalog']);
                    
                        /******************/ 
                    }
                    
                        ////////////////////////////////
                        //      Lab Process Logactivity
                        ////////////////////////////////
                        $this->request->data['Logactivity']['logname'] = 'Labprocess';
                        $this->request->data['Logactivity']['logactivity'] = 'Add Labprocess';
                        $this->request->data['Logactivity']['logid'] = $id;
                        $this->request->data['Logactivity']['user_id'] = $this->Session->read('sess_userid');
                        $this->request->data['Logactivity']['logapprove'] = 2;
                        $this->Logactivity->save($this->request->data['Logactivity']);
                        
                    $this->Salesorder->updateAll(array('Salesorder.is_approved_lab' => 1),array('Salesorder.id' => $id));
                    $this->Description->updateAll(array('Description.is_approved_lab' => 1),array('Description.salesorder_id' => $id));
                    $check_description_count    =   $this->Description->find('all',array('conditions'=>array('AND'=>array('Description.salesorder_id'=>$id,'Description.processing' => 1,'Description.checking' => 1))));
                    if($check_description_count !=0)
                    {
                        foreach($check_description_count as $description)
                        {
                            $this->request->data['Labprocess']['salesorder_id']    =    $id;  
                            $this->request->data['Labprocess']['description_id']    =    $description['Description']['id'];
                            $this->request->data['Labprocess']['status']           =     1 ;
                            $this->Labprocess->create(); 
                            $this->Labprocess->save($this->request->data);  
                        }
                    }
                    $this->redirect(array('controller' => 'Labprocesses', 'action' => 'index'));
                }
                else
                {
                    $this->Salesorder->updateAll(array('Salesorder.is_approved_lab' =>0),array('Salesorder.id' => $id));
                }
                $this->redirect(array('controller' => 'Labprocesses', 'action' => 'index'));
            }
            
        }
        /*****************************************************************
         * 
         *                    Partial Delivery Order
         * 
         *****************************************************************/
         
        
        elseif($salesorder_list['Customer']['deliveryordertype_id']==2)
        {
            $data_description = $this->Description->find('all', array('conditions' => array('Description.is_approved' => 1, 'Description.salesorder_id' => $id, 'Description.is_approved_lab' => 0)));
            $this->Description->updateAll(array('Description.processing' => 1), array('Description.salesorder_id' => $id));
            $this->set('labs', $data_description);
            if ($this->request->is(array('post', 'put'))) 
            {
                $checking_array = $this->request->data['Description']['checking'];
                $description_array = $this->request->data['Description']['processing'];
                if (!empty($description_array)) 
                {
                    foreach ($description_array as $key => $value) 
                    {
                        $this->Description->id = $key;
                        $this->Description->saveField('processing', $value);
                    }
                }
                if(!empty($checking_array))
                {
                    foreach ($checking_array as $key => $value) 
                    {
                        $this->Description->id = $key;
                        $this->Description->saveField('checking', $value);
                        if($value==1)
                        {
                            $this->Description->id = $key;
                            $this->Description->saveField('is_approved_lab', 1);
                        }
                    }
                }  
                $device_count = $this->Description->find('count', array('conditions' => array('Description.is_approved' => 1, 'Description.salesorder_id' => $id)));
                $lab_approved = $this->Description->find('count', array('conditions' => array('Description.is_approved' => 1, 'Description.salesorder_id' => $id, 'Description.checking' => 1, 'Description.is_approved_lab' => 1, 'Description.processing' => 1)));
                if($device_count==$lab_approved)
                {
                    $this->Salesorder->updateAll(array('Salesorder.is_approved_lab' => 1),array('Salesorder.id' => $id));
                    ///////////////////////////////////////////////////
                    //      Lab Process Logactivity - Partial
                    ///////////////////////////////////////////////////
                        $this->request->data['Logactivity']['logname'] = 'Labprocess';
                        $this->request->data['Logactivity']['logactivity'] = 'Add Labprocess - Partial';
                        $this->request->data['Logactivity']['logid'] = $id;
                        $this->request->data['Logactivity']['user_id'] = $this->Session->read('sess_userid');
                        $this->request->data['Logactivity']['logapprove'] = 2;
                        $this->Logactivity->save($this->request->data['Logactivity']);
                }
                if($lab_approved >=1)
                {
                    $approved_device = $this->Description->find('all', array('conditions' => array('Description.is_approved' => 1, 'Description.salesorder_id' => $id,'Description.is_approved_lab' => 1,)));
                    $approved = Hash::extract($approved_device,'{n}.Description.id');
                    $address_list    =   $this->Address->find('first',array('conditions'=>array('Address.customer_id'=>$salesorder_list['Customer']['id'],'Address.status'=>1,'Address.type'=>'delivery')));
                    $dmt=$this->random('deliveryorder');
                    $delivery['Deliverorder']   =  $salesorder_list['Salesorder'];
                    $delivery['Deliverorder']['po_reference_no']   =  $salesorder_list['Salesorder']['ref_no'];
                    $delivery['Deliverorder']['delivery_order_no']  = $dmt;  
                    $delivery['Deliverorder']['salesorder_id']  = $id; 
                    $delivery['Deliverorder']['delivery_address']  = $address_list['Address']['address']; 
                    $delivery['Deliverorder']['customer_address']  = $salesorder_list['Salesorder']['address']; 
                    $delivery['Deliverorder']['delivery_order_date']  = date('d-M-y');
                    $delivery['Deliverorder']['our_reference_no']  = $salesorder_list['Salesorder']['track_id']; 
                    $delivery['Deliverorder']['your_reference_no']  = $salesorder_list['Salesorder']['ref_no']; 
                    $delivery['Deliverorder']['branch_id']  = $branch['branch']['id'];
                    unset($delivery['Deliverorder']['id']);
                    unset($delivery['Deliverorder']['is_approved']);
                    
                    if($this->Deliveryorder->save($delivery['Deliverorder']))
                    {
                        $this->Salesorder->updateAll(array('Salesorder.is_deliveryorder_created'=>1),array('Salesorder.id'=>$salesorder_list['Salesorder']['id']));
                        $last_id    =   $this->Deliveryorder->getLastInsertId();
                        foreach($salesorder_list['Description'] as $sale):
                            $this->DelDescription->create();
                            $description_data  =   $this->delDescription($sale['id'],$last_id);
                            $this->DelDescription->save($description_data);
                        endforeach;   
                        
                        /******************
                        * Data Log
                        */
                        $this->request->data['Logactivity']['logname'] = 'Deliveryorder';
                        $this->request->data['Logactivity']['logactivity'] = 'Add Delivery Order';
                        $this->request->data['Logactivity']['logid'] = $last_id;
                        $this->request->data['Logactivity']['user_id'] = $this->Session->read('sess_userid');
                        $this->request->data['Logactivity']['logapprove'] = 1;

                        $a = $this->Logactivity->save($this->request->data['Logactivity']);
                        
                        /******************/
                        /******************
                         * Data Log Activity
                        */
                        $this->request->data['Datalog']['logname'] = 'Deliveryorder';
                        $this->request->data['Datalog']['logactivity'] = 'Add';
                        $this->request->data['Datalog']['logid'] = $last_id;
                        $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                    
                        $a = $this->Datalog->save($this->request->data['Datalog']);
                    
                        /******************/ 
                        foreach($approved as $key=>$value)
                        {
                            $this->request->data['DelDescription']['deliveryorder_id']    =    $last_id;  
                            $this->request->data['DelDescription']['description_id'] =    $value;
                            $this->request->data['DelDescription']['salesorder_id']  =  $id ;
                            $this->DelDescription->create(); 
                            $this->DelDescription->save($this->request->data);  
                        }
                    }
                    $check_description_count    =   $this->Description->find('all',array('conditions'=>array('AND'=>array('Description.salesorder_id'=>$id,'Description.processing' => 1,'Description.checking' => 1))));
                    if($check_description_count !=0)    
                    {
                        foreach($check_description_count as $description)
                        {
                            $this->request->data['Labprocess']['salesorder_id']    =    $id;  
                            $this->request->data['Labprocess']['description_id']   =    $description['Description']['id'];
                            $this->request->data['Labprocess']['status']           =     1 ;
                            $this->Labprocess->create(); 
                            $this->Labprocess->save($this->request->data);  
                        }
                    }
                    $this->redirect(array('controller' => 'Labprocesses', 'action' => 'index'));
                }
                else
                {
                    $this->Salesorder->updateAll(array('Salesorder.is_approved_lab' =>0),array('Salesorder.id' => $id));
                }

            }
        }
    }
    public function so_list_variations()
    {
        $this->layout   =   'ajax';
        $solist_id  =    $this->request->data['solist'];
        $calllocation_id    =   $this->request->data['calllocation'];
        //pr($calllocation_id);exit;
        switch($solist_id)
        {
            case 'run':
                if($calllocation_id=='all'){
                    
                    $labprocess = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 1))),'recursive'=>2));
                    $this->set('labprocess', $labprocess);
                   } else{
                        $labprocess = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array( 'Description.sales_calllocation' =>$calllocation_id)))));
                        $this->set('labprocess', $labprocess);
                   }
                    break;
                    //pr($labprocess);exit;
            case 'out':
                  
            if($calllocation_id=='all'):
                
                    $labprocess = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 0)))));
                    $this->set('labprocess', $labprocess);
                    else:
                       $labprocess = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 0, 'Description.sales_calllocation' => $calllocation_id)))));
                    $this->set('labprocess', $labprocess);
            endif;
            //pr($labprocess);exit;
            break;
            case 'overdue': 
                
                 if($calllocation_id=='all'):
                    
                     $labprocess = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff >' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 1)))));
                    $this->set('labprocess', $labprocess);
                else:
                     
                        $labprocess = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1,'Salesorder.solist_diff >' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 0, 'Description.sales_calllocation' => $calllocation_id)))));
                    $this->set('labprocess', $labprocess);
            endif;
            //pr($labprocess);exit;
             break;
             
        }
    }
    public function update_delay()
    {
        $this->autoRender   =   false;
         if ($this->data) {
            App::uses('Sanitize', 'Utility');
            $title = Sanitize::clean($this->data['Description']['delay']);

            $this->Description->id = $this->data['Description']['id'];
            $this->Description->saveField('delay', $title);
            echo $title;
        }
    }
} 
