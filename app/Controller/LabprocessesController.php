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
                            'Country','Additionalcharge','Service','CustomerInstrument','Customerspecialneed','Random',
                            'Instrument','Brand','Customer','Device','Salesorder','Description','Labprocess','branch','Datalog');
    public $components = array('RequestHandler');
     
    public function index()
    {
        $labprocess = $this->Salesorder->find('all',array('conditions'=>array('Salesorder.is_approved_lab'=>0,'Salesorder.is_approved'=>1,'Salesorder.is_approved_lab'=>0),'group' => array('Salesorder.salesorderno'),'contain'=>array('Customer','branch','Description')));
        
        //$labprocess2 = $this->Salesorder->find('all',array('recursive'=>-1));
        //pr($labprocess);exit;
        $this->set('labprocess', $labprocess);
        
        $dimentional = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1,
            ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.department_id'=>1,'Description.is_deleted'=>0))),'recursive'=>2));
        $electrical = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1,
            ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.department_id'=>2,'Description.is_deleted'=>0))),'recursive'=>2));
        $pressure = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1,
            ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.department_id'=>3,'Description.is_deleted'=>0))),'recursive'=>2));
        //pr($pressure);exit;
        $temperature = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1,
            ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.department_id'=>4,'Description.is_deleted'=>0))),'recursive'=>2));
        $miscellaneous = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1,
            ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.department_id >='=>5,'Description.is_deleted'=>0))),'recursive'=>2));

        $this->set('dimentional', $dimentional);
        $this->set('electrical', $electrical);
        $this->set('pressure', $pressure);
        $this->set('temperature', $temperature);
        $this->set('miscellaneous', $miscellaneous);
        
        // Dimensional
        
        $dimensional_processing = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1
            ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 1,'Description.checking' => 0,'Description.department_id'=>1,'Description.is_deleted'=>0))),'recursive'=>2));
        $dimensional_pending = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1
            ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 0,'Description.checking' => 0,'Description.department_id'=>1,'Description.is_deleted'=>0))),'recursive'=>2));
        $dimensional_checking = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1
            ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 1,'Description.checking' => 1,'Description.department_id'=>1,'Description.is_deleted'=>0))),'recursive'=>2));
        $this->set('dimensional_proc', $dimensional_processing);
        $this->set('dimensional_pend', $dimensional_pending);
        $this->set('dimensional_check', $dimensional_checking);


        // Electrical

        $electrical_processing = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1
            ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 1,'Description.checking' => 0,'Description.department_id'=>2,'Description.is_deleted'=>0))),'recursive'=>2));
        $electrical_pending = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1
            ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 0,'Description.checking' => 0,'Description.department_id'=>2,'Description.is_deleted'=>0))),'recursive'=>2));
        $electrical_checking = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1
            ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 1,'Description.checking' => 1,'Description.department_id'=>2,'Description.is_deleted'=>0))),'recursive'=>2));
        $this->set('electrical_proc', $electrical_processing);
        $this->set('electrical_pend', $electrical_pending);
        $this->set('electrical_check', $electrical_checking);

        // Pressure

        $pressure_processing = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1
            ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 1,'Description.checking' => 0,'Description.department_id'=>3,'Description.is_deleted'=>0))),'recursive'=>2));
        $pressure_pending = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1
            ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 0,'Description.checking' => 0,'Description.department_id'=>3,'Description.is_deleted'=>0))),'recursive'=>2));
        //pr($pressure_processing);exit;
        $pressure_checking = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1
            ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 1,'Description.checking' => 1,'Description.department_id'=>3,'Description.is_deleted'=>0))),'recursive'=>2));
        //pr($pressure_processing);exit;
        $this->set('pressure_proc', $pressure_processing);
        $this->set('pressure_pend', $pressure_pending);
        $this->set('pressure_check', $pressure_checking);

        // Temperature

        $temperature_processing = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1
            ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 1,'Description.checking' => 0,'Description.department_id'=>4,'Description.is_deleted'=>0))),'recursive'=>2));
        $temperature_pending = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1
            ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 0,'Description.checking' => 0,'Description.department_id'=>4,'Description.is_deleted'=>0))),'recursive'=>2));
        $temperature_checking = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1
            ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 1,'Description.checking' => 1,'Description.department_id'=>4,'Description.is_deleted'=>0))),'recursive'=>2));
        $this->set('temperature_proc', $temperature_processing);
        $this->set('temperature_pend', $temperature_pending);
        $this->set('temperature_check', $temperature_checking);

        // Miscellaneous

        $miscellaneous_processing = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1
            ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 1,'Description.checking' => 0,'Description.department_id >='=>5,'Description.is_deleted'=>0))),'recursive'=>2));
        $miscellaneous_pending = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1
            ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 0,'Description.checking' => 0,'Description.department_id >='=>5,'Description.is_deleted'=>0))),'recursive'=>2));
        $miscellaneous_checking = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1
            ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 1,'Description.checking' => 1,'Description.department_id >='=>5,'Description.is_deleted'=>0))),'recursive'=>2));
        $this->set('miscel_proc', $miscellaneous_processing);
        $this->set('miscel_pend', $miscellaneous_pending);
        $this->set('miscel_check', $miscellaneous_checking);
                    
                    
        
        $data_checking_count = $this->Salesorder->find('all',array('contain'=>array("Description" => array("conditions" => array("Description.checking" => 1,'Description.processing'=>1))) ,'conditions'=>array('Salesorder.is_approved'=>1,'Salesorder.is_approved_lab'=>0),'group' => array('Salesorder.salesorderno')));
        $salesordercount = $this->Salesorder->find('count',array('conditions'=>array('Salesorder.is_approved'=>1,'Salesorder.is_approved_lab'=>0)));
        
        $this->Description->unbindModel(array('belongsTo' => array('Brand','Customer','Instrument','Department','Salesorder')), true);
        
        $data_description_count = $this->Description->find('count',array('conditions'=>array('Description.is_approved'=>1,'Description.is_approved_lab'=>0,'Description.is_deleted'=>0)));
        
        $this->Description->unbindModel(array('belongsTo' => array('Brand','Customer','Instrument','Department','Salesorder')), true);
        $data_pending_count = $this->Description->find('count',array('conditions'=>array('AND'=>array('Description.checking'=>0,'Description.processing'=>0,'Description.is_approved_lab'=>0,'Description.is_approved'=>1,'Description.salesorder_id !='=>'','Description.is_deleted'=>0))));
        
        $this->Description->unbindModel(array('belongsTo' => array('Brand','Customer','Instrument','Department','Salesorder')), true);
        
        $data_processing = $this->Salesorder->find('all',array('conditions'=>array('Salesorder.is_deliveryorder_created'=>0)));
        $count_process = 0;
        $count_process1 = 0; 
        foreach($data_processing as $data_processing_list)
        {
        $count_process = $this->Description->find('count',array('conditions'=>array('Description.processing'=>1,'Description.checking'=>0,'Description.salesorder_id'=>$data_processing_list['Salesorder']['salesorderno'],'Description.is_deleted'=>0)));
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
            $count_check = $this->Description->find('count',array('conditions'=>array('Description.checking ='=>1,'Description.is_approved_lab'=>1,'Description.salesorder_id'=>$data_processing_list['Salesorder']['salesorderno'],'Description.is_deleted'=>0)));
            $count_check1 += $count_check;//echo $count;exit;
        }
        //pr();exit;
        $data_checking_count = $count_check1;
        
        
        
        //$data_checking_count = $this->Description->find('count',array('conditions'=>array('Description.checking ='=>1,'Description.is_approved_lab'=>1 )));
        $this->set(compact('data_checking_count','data_processing_count','data_pending_count','data_description_count','salesordercount','labprocess'));
        $this->set('count_data', $data_checking_count);
    }  
    public function labs($solist=NULL,$call_location=NULL,$id=NULL)
    {
       
        $salesorder_list    =   $this->Salesorder->find('first',array('conditions'=>array('Salesorder.id'=>$id,'Salesorder.is_approved'=>1,'Salesorder.is_approved_lab'=>0)));
        //$salesorder_list_partial    =   $this->Salesorder->find('first',array('conditions'=>array('Salesorder.id'=>$id,'Salesorder.is_approved'=>1,'Salesorder.is_approved_lab'=>0)));
        $quotation_list    =   $this->Quotation->find('first',array('conditions'=>array('Quotation.quotationno'=>$salesorder_list['Salesorder']['quotationno'],'Quotation.is_approved'=>1,'Quotation.is_deliveryorder_created'=>0)));
        //pr($salesorder_list);exit;
        $deliveryorder_typ = $quotation_list['Customer']['acknowledgement_type_id'];
        $this->set('lab_sales_id',$id);
        $branch =   $this->branch->find('first',array('conditions'=>array('branch.defaultbranch'=>1,'branch.status'=>1)));
        
        /******************************************************************
         * 
         *                      Full Delivery Order
         * 
        ******************************************************************/
               
        if($salesorder_list['Customer']['deliveryordertype_id']==1)
        {
            //$data_description = $this->Description->find('all', array('conditions' => array('Description.is_approved' => 1, 'Description.salesorder_id' => $id)));
            
            $data_description=  $this->get_solist_calllocation_details($solist,$call_location,$id);
                //pr($data_description);exit;
            //$this->Description->updateAll(array('Description.processing' => 1), array('Description.salesorder_id' => $id));
            
            //pr()
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
                $device_count = $this->Description->find('count', array('conditions' => array('Description.is_approved' => 1, 'Description.salesorder_id' => $id,'Description.is_deleted'=>0)));
                $lab_approved = $this->Description->find('count', array('conditions' => array('Description.is_approved' => 1, 'Description.salesorder_id' => $id, 'Description.checking' => 1, 'Description.is_approved_lab' => 1, 'Description.processing' => 1,'Description.is_deleted'=>0)));
                if($device_count==$lab_approved)
                {
                   
                    $address_list    =   $this->Address->find('first',array('conditions'=>array('Address.customer_id'=>$salesorder_list['Customer']['id'],'Address.status'=>1,'Address.type'=>'delivery')));
                    if(empty($address_list)):
                        $address_list    =   $this->Address->find('first',array('conditions'=>array('Address.customer_id'=>$salesorder_list['Customer']['id'],'Address.status'=>1,'Address.type'=>'registered')));
                    endif;
                    if(empty($address_list)):
                        $address_list    =   $this->Address->find('first',array('conditions'=>array('Address.customer_id'=>$salesorder_list['Customer']['id'],'Address.status'=>1,'Address.type'=>'billing')));
                    endif;
                    $dmt=$this->random('deliveryorder');
                    $delivery['Deliverorder']   =  $salesorder_list['Salesorder'];
                    $delivery['Deliverorder']['po_reference_no']   =  $salesorder_list['Salesorder']['ref_no'];
                    $delivery['Deliverorder']['delivery_order_no']  = $dmt;  
                    $delivery['Deliverorder']['salesorder_id']  = $id; 
                    $delivery['Deliverorder']['delivery_address']  = $address_list['Address']['address']; 
                    $delivery['Deliverorder']['customer_address']  = $salesorder_list['Salesorder']['address']; 
                    $delivery['Deliverorder']['delivery_order_date']  = date('d-F-y');
                    $delivery['Deliverorder']['instrument_type_id']  = $salesorder_list['Salesorder']['instrument_type_id']; 
                    $delivery['Deliverorder']['our_reference_no']  = $salesorder_list['Salesorder']['track_id']; 
                    $delivery['Deliverorder']['your_reference_no']  = $salesorder_list['Salesorder']['ref_no']; 
                    $delivery['Deliverorder']['branch_id']  = $branch['branch']['id'];
                    unset($delivery['Deliverorder']['id']);
                    unset($delivery['Deliverorder']['is_approved']);
                    
                    if($this->Deliveryorder->save($delivery['Deliverorder']))
                    {
                        
                       $last_id    =   $this->Deliveryorder->getLastInsertId();
                       $this->Random->updateAll(array('Random.deliveryorder'=>'"'.$dmt.'"'),array('Random.id'=>1));  
                        $this->Quotation->updateAll(array('Quotation.is_deliveryorder_created'=>1),array('Quotation.id'=>$salesorder_list['Quotation']['id']));
                        $this->Salesorder->updateAll(array('Salesorder.is_deliveryorder_created'=>1),array('Salesorder.id'=>$salesorder_list['Salesorder']['id']));
                        
                        foreach($salesorder_list['Description'] as $sale):
                            $this->DelDescription->create();
                            $description_data  =   $this->delDescription($sale['id'],$last_id);
                            $this->DelDescription->save($description_data);
                        endforeach;   
                        
                    }
                        $quotation_for_log = $this->Quotation->find('first',array('conditions'=>array('Quotation.quotationno'=>$salesorder_list['Quotation']['quotationno'])));
                        $deliveryorder_type = $quotation_for_log['Customer']['acknowledgement_type_id'];
                        $invoice_type = $quotation_for_log['Customer']['invoice_type_id'];
                        
                        ////////////////////////////////
                        //      Lab Process Logactivity
                        ////////////////////////////////
                        $this->request->data['Logactivity']['logname'] = 'Labprocess';
                        $this->request->data['Logactivity']['logactivity'] = 'Add Labprocess';
                        $this->request->data['Logactivity']['logid'] = $last_id;
                        $this->request->data['Logactivity']['logno'] = $dmt;
                        $this->request->data['Logactivity']['user_id'] = $this->Session->read('sess_userid');
                        $this->request->data['Logactivity']['logapprove'] = 2;
                        $this->Logactivity->create();
                        $this->Logactivity->save($this->request->data['Logactivity']);
                        
                        /******************
                        * Data Log
                        */
                        $this->request->data['Logactivity']['logname'] = 'Deliveryorder';
                        $this->request->data['Logactivity']['logactivity'] = 'Add Delivery Order';
                        $this->request->data['Logactivity']['logid'] = $last_id;
                        $this->request->data['Logactivity']['logno'] = $dmt;
                        $this->request->data['Logactivity']['loglink'] = $deliveryorder_type;
                        $this->request->data['Logactivity']['user_id'] = $this->Session->read('sess_userid');
                        $this->request->data['Logactivity']['logapprove'] = 1;
                        $this->Logactivity->create();
                        $this->Logactivity->save($this->request->data['Logactivity']);
                        /******************/
                        /*
                         * Data Log Activity
                        */
                        $this->request->data['Datalog']['logname'] = 'Deliveryorder';
                        $this->request->data['Datalog']['logactivity'] = 'Add';
                        $this->request->data['Datalog']['logid'] = $dmt;
                        $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                        $this->Datalog->create();
                        $a = $this->Datalog->save($this->request->data['Datalog']);
                    
                        /******************/ 
                        
                        if($deliveryorder_type == 1):
                            if($invoice_type == 1):    
                                /******************
                                * Data Log - Client PO
                                */
                                $this->request->data['Logactivity']['logname'] = 'ClientPO';
                                $this->request->data['Logactivity']['logactivity'] = 'Add';
                                $this->request->data['Logactivity']['logid'] = $salesorder_list['Quotation']['ref_no'];
                                $this->request->data['Logactivity']['logno'] = $salesorder_list['Quotation']['ref_no'];
                                $this->request->data['Logactivity']['invoice_type_id'] = $invoice_type;
                                $this->request->data['Logactivity']['user_id'] = $this->Session->read('sess_userid');
                                $this->request->data['Logactivity']['logapprove'] = 1;
                                $this->Logactivity->create();
                                $this->Logactivity->save($this->request->data['Logactivity']);

                                $this->request->data['Datalog']['logname'] = 'ClientPO';
                                $this->request->data['Datalog']['logactivity'] = 'Add';
                                $this->request->data['Datalog']['logid'] = $salesorder_list['Quotation']['ref_no'];
                                $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                                $this->Datalog->create();
                                $this->Datalog->save($this->request->data['Datalog']);

                                /******************/ 
                            endif;
                            if($invoice_type == 2):    
                                /******************
                                * Data Log - Client PO
                                */
                                $this->request->data['Logactivity']['logname'] = 'ClientPO';
                                $this->request->data['Logactivity']['logactivity'] = 'Add';
                                $this->request->data['Logactivity']['logid'] = $salesorder_list['Quotation']['quotationno'];
                                $this->request->data['Logactivity']['logno'] = $salesorder_list['Quotation']['quotationno'];
                                $this->request->data['Logactivity']['invoice_type_id'] = $invoice_type;
                                $this->request->data['Logactivity']['user_id'] = $this->Session->read('sess_userid');
                                $this->request->data['Logactivity']['logapprove'] = 1;
                                $this->Logactivity->create();
                                $this->Logactivity->save($this->request->data['Logactivity']);

                                $this->request->data['Datalog']['logname'] = 'ClientPO';
                                $this->request->data['Datalog']['logactivity'] = 'Add';
                                $this->request->data['Datalog']['logid'] = $salesorder_list['Quotation']['quotationno'];
                                $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                                $this->Datalog->create();
                                $this->Datalog->save($this->request->data['Datalog']);

                                /******************/ 
                            endif;
                            if($invoice_type == 3):
                                /******************
                                * Data Log - Client PO
                                */
                                $this->request->data['Logactivity']['logname'] = 'ClientPO';
                                $this->request->data['Logactivity']['logactivity'] = 'Add';
                                $this->request->data['Logactivity']['logid'] = $salesorder_list['Salesorder']['id'];
                                $this->request->data['Logactivity']['logno'] = $salesorder_list['Salesorder']['id'];
                                $this->request->data['Logactivity']['invoice_type_id'] = $invoice_type;
                                $this->request->data['Logactivity']['user_id'] = $this->Session->read('sess_userid');
                                $this->request->data['Logactivity']['logapprove'] = 1;
                                $this->Logactivity->create();
                                $this->Logactivity->save($this->request->data['Logactivity']);

                                $this->request->data['Datalog']['logname'] = 'ClientPO';
                                $this->request->data['Datalog']['logactivity'] = 'Add';
                                $this->request->data['Datalog']['logid'] = $salesorder_list['Salesorder']['id'];
                                $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                                $this->Datalog->create();
                                $this->Datalog->save($this->request->data['Datalog']);

                                /******************/ 
                            endif;
                            if($invoice_type == 4):    
                                /******************
                                * Data Log - Client PO
                                */
                                $this->request->data['Logactivity']['logname'] = 'ClientPO';
                                $this->request->data['Logactivity']['logactivity'] = 'Add';
                                $this->request->data['Logactivity']['logid'] = $last_id;
                                $this->request->data['Logactivity']['logno'] = $last_id;
                                $this->request->data['Logactivity']['invoice_type_id'] = $invoice_type;
                                $this->request->data['Logactivity']['user_id'] = $this->Session->read('sess_userid');
                                $this->request->data['Logactivity']['logapprove'] = 1;
                                $this->Logactivity->create();
                                $this->Logactivity->save($this->request->data['Logactivity']);

                                $this->request->data['Datalog']['logname'] = 'ClientPO';
                                $this->request->data['Datalog']['logactivity'] = 'Add';
                                $this->request->data['Datalog']['logid'] = $last_id;
                                $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                                $this->Datalog->create();
                                $this->Datalog->save($this->request->data['Datalog']);

                                /******************/ 
                            endif;
                            
                        endif;
                        
                        
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
            $data_description=  $this->get_solist_calllocation_details($solist,$call_location,$id);
                //pr($data_description);exit;
            //$this->Description->updateAll(array('Description.processing' => 1), array('Description.salesorder_id' => $id));
            
            //pr()
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
               $device_count = $this->Description->find('count', array('conditions' => array('Description.is_approved' => 1, 'Description.salesorder_id' => $id,'Description.is_deleted'=>0)));
               $lab_approved = $this->Description->find('count', array('conditions' => array('Description.is_approved' => 1, 'Description.salesorder_id' => $id, 'Description.checking' => 1, 'Description.is_approved_lab' => 1, 'Description.processing' => 1,'Description.is_deleted'=>0)));
               if($device_count==$lab_approved)
               {
                    $address_list    =   $this->Address->find('first',array('conditions'=>array('Address.customer_id'=>$salesorder_list['Customer']['id'],'Address.status'=>1,'Address.type'=>'delivery')));
                    if(empty($address_list)):
                        $address_list    =   $this->Address->find('first',array('conditions'=>array('Address.customer_id'=>$salesorder_list['Customer']['id'],'Address.status'=>1,'Address.type'=>'registered')));
                    endif;
                    if(empty($address_list)):
                        $address_list    =   $this->Address->find('first',array('conditions'=>array('Address.customer_id'=>$salesorder_list['Customer']['id'],'Address.status'=>1,'Address.type'=>'billing')));
                    endif;
                    $dmt=$this->random('deliveryorder');
                    $delivery['Deliverorder']   =  $salesorder_list['Salesorder'];
                    $delivery['Deliverorder']['po_reference_no']   =  $salesorder_list['Salesorder']['ref_no'];
                    $delivery['Deliverorder']['delivery_order_no']  = $dmt;  
                    $delivery['Deliverorder']['salesorder_id']  = $id; 
                    $delivery['Deliverorder']['delivery_address']  = $address_list['Address']['address']; 
                    $delivery['Deliverorder']['customer_address']  = $salesorder_list['Salesorder']['address']; 
                    $delivery['Deliverorder']['delivery_order_date']  = date('d-F-y');
                    $delivery['Deliverorder']['instrument_type_id']  = $salesorder_list['Salesorder']['instrument_type_id']; 
                    $delivery['Deliverorder']['our_reference_no']  = $salesorder_list['Salesorder']['track_id']; 
                    $delivery['Deliverorder']['your_reference_no']  = $salesorder_list['Salesorder']['ref_no']; 
                    $delivery['Deliverorder']['branch_id']  = $branch['branch']['id'];
                    unset($delivery['Deliverorder']['id']);
                    unset($delivery['Deliverorder']['is_approved']);
                    
                    if($this->Deliveryorder->save($delivery['Deliverorder']))
                    {
                        
                       $last_id    =   $this->Deliveryorder->getLastInsertId();
                       $this->Random->updateAll(array('Random.deliveryorder'=>'"'.$dmt.'"'),array('Random.id'=>1));  
                        $this->Quotation->updateAll(array('Quotation.is_deliveryorder_created'=>1),array('Quotation.id'=>$salesorder_list['Quotation']['id']));
                        $this->Salesorder->updateAll(array('Salesorder.is_deliveryorder_created'=>1),array('Salesorder.id'=>$salesorder_list['Salesorder']['id']));
                        
                        foreach($salesorder_list['Description'] as $sale):
                            $this->DelDescription->create();
                            $description_data  =   $this->delDescription_partial($sale['id'],$last_id);
                            if(!empty($description_data)):
                            $this->DelDescription->save($description_data);
                            endif;
                        endforeach;   
                        
                    }
                    
                        ////////////////////////////////
                        //      Lab Process Logactivity
                        ////////////////////////////////
                        $this->request->data['Logactivity']['logname'] = 'Labprocess';
                        $this->request->data['Logactivity']['logactivity'] = 'Add Labprocess';
                        $this->request->data['Logactivity']['logid'] = $last_id;
                        $this->request->data['Logactivity']['logno'] = $dmt;
                        $this->request->data['Logactivity']['user_id'] = $this->Session->read('sess_userid');
                        $this->request->data['Logactivity']['logapprove'] = 2;
                        $this->Logactivity->create();
                        $this->Logactivity->save($this->request->data['Logactivity']);
                        
                        /******************
                        * Data Log
                        */
                        $this->request->data['Logactivity']['logname'] = 'Deliveryorder';
                        $this->request->data['Logactivity']['logactivity'] = 'Add Delivery Order';
                        $this->request->data['Logactivity']['logid'] = $last_id;
                        $this->request->data['Logactivity']['logno'] = $dmt;
                        $this->request->data['Logactivity']['loglink'] = $deliveryorder_typ;
                        $this->request->data['Logactivity']['user_id'] = $this->Session->read('sess_userid');
                        $this->request->data['Logactivity']['logapprove'] = 1;
                        $this->Logactivity->create();
                        $this->Logactivity->save($this->request->data['Logactivity']);
                        /******************/
                    //pr($delivery['Deliverorder']);exit;
                         /*
                         * Data Log Activity
                        */
                        $this->request->data['Datalog']['logname'] = 'Deliveryorder';
                        $this->request->data['Datalog']['logactivity'] = 'Add';
                        $this->request->data['Datalog']['logid'] = $dmt;
                        $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                        $this->Datalog->create();
                        $a = $this->Datalog->save($this->request->data['Datalog']);
                    
                        $quotation_for_log = $this->Quotation->find('first',array('conditions'=>array('Quotation.quotationno'=>$salesorder_list['Quotation']['quotationno'])));
                        //pr($quotation_for_log);
                        $deliveryorder_type = $quotation_for_log['Customer']['acknowledgement_type_id'];
                        $invoice_type = $quotation_for_log['Customer']['invoice_type_id'];
                        //pr($deliveryorder_type);
                        //pr($deliveryorder_type);exit;
                        if($deliveryorder_type == 1):
                            if($invoice_type == 1):    
                                /******************
                                * Data Log - Client PO
                                */
                                $this->request->data['Logactivity']['logname'] = 'ClientPO';
                                $this->request->data['Logactivity']['logactivity'] = 'Add';
                                $this->request->data['Logactivity']['logid'] = $salesorder_list['Quotation']['ref_no'];
                                $this->request->data['Logactivity']['logno'] = $salesorder_list['Quotation']['ref_no'];
                                $this->request->data['Logactivity']['invoice_type_id'] = $invoice_type;
                                $this->request->data['Logactivity']['user_id'] = $this->Session->read('sess_userid');
                                $this->request->data['Logactivity']['logapprove'] = 1;
                                $this->Logactivity->create();
                                $this->Logactivity->save($this->request->data['Logactivity']);

                                $this->request->data['Datalog']['logname'] = 'ClientPO';
                                $this->request->data['Datalog']['logactivity'] = 'Add';
                                $this->request->data['Datalog']['logid'] = $salesorder_list['Quotation']['ref_no'];
                                $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                                $this->Datalog->create();
                                $this->Datalog->save($this->request->data['Datalog']);

                                /******************/ 
                            endif;
                            if($invoice_type == 2):    
                                /******************
                                * Data Log - Client PO
                                */
                                $this->request->data['Logactivity']['logname'] = 'ClientPO';
                                $this->request->data['Logactivity']['logactivity'] = 'Add';
                                $this->request->data['Logactivity']['logid'] = $salesorder_list['Quotation']['quotationno'];
                                $this->request->data['Logactivity']['logno'] = $salesorder_list['Quotation']['quotationno'];
                                $this->request->data['Logactivity']['invoice_type_id'] = $invoice_type;
                                $this->request->data['Logactivity']['user_id'] = $this->Session->read('sess_userid');
                                $this->request->data['Logactivity']['logapprove'] = 1;
                                $this->Logactivity->create();
                                $this->Logactivity->save($this->request->data['Logactivity']);

                                $this->request->data['Datalog']['logname'] = 'ClientPO';
                                $this->request->data['Datalog']['logactivity'] = 'Add';
                                $this->request->data['Datalog']['logid'] = $salesorder_list['Quotation']['quotationno'];
                                $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                                $this->Datalog->create();
                                $this->Datalog->save($this->request->data['Datalog']);

                                /******************/ 
                            endif;
                            if($invoice_type == 3):
                                /******************
                                * Data Log - Client PO
                                */
                                $this->request->data['Logactivity']['logname'] = 'ClientPO';
                                $this->request->data['Logactivity']['logactivity'] = 'Add';
                                $this->request->data['Logactivity']['logid'] = $salesorder_list['Salesorder']['id'];
                                $this->request->data['Logactivity']['logno'] = $salesorder_list['Salesorder']['id'];
                                $this->request->data['Logactivity']['invoice_type_id'] = $invoice_type;
                                $this->request->data['Logactivity']['user_id'] = $this->Session->read('sess_userid');
                                $this->request->data['Logactivity']['logapprove'] = 1;
                                $this->Logactivity->create();
                                $this->Logactivity->save($this->request->data['Logactivity']);

                                $this->request->data['Datalog']['logname'] = 'ClientPO';
                                $this->request->data['Datalog']['logactivity'] = 'Add';
                                $this->request->data['Datalog']['logid'] = $salesorder_list['Salesorder']['id'];
                                $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                                $this->Datalog->create();
                                $this->Datalog->save($this->request->data['Datalog']);

                                /******************/ 
                            endif;
                            if($invoice_type == 4):    
                                /******************
                                * Data Log - Client PO
                                */
                                $this->request->data['Logactivity']['logname'] = 'ClientPO';
                                $this->request->data['Logactivity']['logactivity'] = 'Add';
                                $this->request->data['Logactivity']['logid'] = $last_id;
                                $this->request->data['Logactivity']['logno'] = $last_id;
                                $this->request->data['Logactivity']['invoice_type_id'] = $invoice_type;
                                $this->request->data['Logactivity']['user_id'] = $this->Session->read('sess_userid');
                                $this->request->data['Logactivity']['logapprove'] = 1;
                                $this->Logactivity->create();
                                $this->Logactivity->save($this->request->data['Logactivity']);

                                $this->request->data['Datalog']['logname'] = 'ClientPO';
                                $this->request->data['Datalog']['logactivity'] = 'Add';
                                $this->request->data['Datalog']['logid'] = $last_id;
                                $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                                $this->Datalog->create();
                                $this->Datalog->save($this->request->data['Datalog']);

                                /******************/ 
                            endif;
                            
                            
                        endif;
                        
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
                    //exit;
                    $this->redirect(array('controller' => 'Labprocesses', 'action' => 'index'));
                }
                else
                {
                    $this->Salesorder->updateAll(array('Salesorder.is_approved_lab' =>0),array('Salesorder.id' => $id));
                }
                $this->redirect(array('controller' => 'Labprocesses', 'action' => 'index'));
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
                //pr($calllocation_id);
        if($calllocation_id=='all'){
                    
                    /*
                     *  For callocation All & Processing 1 
                     */
                    
                    $labprocess = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description'),'recursive'=>2));
                    $dimentional = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 1,'Description.department_id'=>1,'Description.is_deleted'=>0))),'recursive'=>2));
                    $electrical = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 1,'Description.department_id'=>2,'Description.is_deleted'=>0))),'recursive'=>2));
                    $pressure = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 1,'Description.department_id'=>3,'Description.is_deleted'=>0))),'recursive'=>2));
                    $temperature = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 1,'Description.department_id'=>4,'Description.is_deleted'=>0))),'recursive'=>2));
                    $miscellaneous = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 1,'Description.department_id >='=>5,'Description.is_deleted'=>0))),'recursive'=>2));
                    
                    $this->set('dimentional', $dimentional);
                    $this->set('electrical', $electrical);
                    $this->set('pressure', $pressure);
                    $this->set('temperature', $temperature);
                    $this->set('miscellaneous', $miscellaneous);
                    $this->set('labprocess', $labprocess);
                    
                    // Dimentional
                    
                    $dimensional_processing = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 1,'Description.department_id'=>1,'Description.is_deleted'=>0))),'recursive'=>2));
                    $dimensional_pending = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 0,'Description.checking' => 0,'Description.department_id'=>1,'Description.is_deleted'=>0))),'recursive'=>2));
                    $dimensional_checking = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 1,'Description.checking' => 1,'Description.department_id'=>1,'Description.is_deleted'=>0))),'recursive'=>2));
                    $this->set('dimensional_proc', $dimensional_processing);
                    $this->set('dimensional_pend', $dimensional_pending);
                    $this->set('dimensional_check', $dimensional_checking);
                    
                    
                    // Electrical
                                           
                    $electrical_processing = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 1,'Description.department_id'=>2,'Description.is_deleted'=>0))),'recursive'=>2));
                    $electrical_pending = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 0,'Description.checking' => 0,'Description.department_id'=>2,'Description.is_deleted'=>0))),'recursive'=>2));
                    $electrical_checking = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 1,'Description.checking' => 1,'Description.department_id'=>2,'Description.is_deleted'=>0))),'recursive'=>2));
                    $this->set('electrical_proc', $electrical_processing);
                    $this->set('electrical_pend', $electrical_pending);
                    $this->set('electrical_check', $electrical_checking);
                    
                    // Pressure
                       
                    $pressure_processing = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 1,'Description.department_id'=>3,'Description.is_deleted'=>0))),'recursive'=>2));
                    
                    $pressure_pending = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 0,'Description.checking' => 0,'Description.department_id'=>3,'Description.is_deleted'=>0))),'recursive'=>2));
                    $pressure_checking = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 1,'Description.checking' => 1,'Description.department_id'=>3,'Description.is_deleted'=>0))),'recursive'=>2));
                    $this->set('pressure_proc', $pressure_processing);
                    $this->set('pressure_pend', $pressure_pending);
                    $this->set('pressure_check', $pressure_checking);
                  
                    // Temperature
                       
                    $temperature_processing = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 1,'Description.department_id'=>4,'Description.is_deleted'=>0))),'recursive'=>2));
                    $temperature_pending = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 0,'Description.checking' => 0,'Description.department_id'=>4,'Description.is_deleted'=>0))),'recursive'=>2));
                    $temperature_checking = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 1,'Description.checking' => 1,'Description.department_id'=>4,'Description.is_deleted'=>0))),'recursive'=>2));
                    $this->set('temperature_proc', $temperature_processing);
                    $this->set('temperature_pend', $temperature_pending);
                    $this->set('temperature_check', $temperature_checking);
                    
                    // Miscellaneous
                       
                    $miscellaneous_processing = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 1,'Description.department_id >='=>5,'Description.is_deleted'=>0))),'recursive'=>2));
                    $miscellaneous_pending = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 0,'Description.checking' => 0,'Description.department_id >='=>5,'Description.is_deleted'=>0))),'recursive'=>2));
                    $miscellaneous_checking = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 1,'Description.checking' => 1,'Description.department_id >='=>5,'Description.is_deleted'=>0))),'recursive'=>2));
                    $this->set('miscel_proc', $miscellaneous_processing);
                    $this->set('miscel_pend', $miscellaneous_pending);
                    $this->set('miscel_check', $miscellaneous_checking);
                   
                    $this->set('call_location', $calllocation_id);
                    $this->set('solist', $solist_id);
                    
                    /*
                     *  For callocation All & Processing 1-------------------------------------------------------------------------------------------------- 
                     */
                    
        } 
        else{
                    /*
                     *  For callocation Specific & Processing 1 
                     */   
            
                    $labprocess = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                    ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array( 'Description.sales_calllocation' =>$calllocation_id,'Description.is_deleted'=>0)))));
                    $dimentional = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array( 'Description.sales_calllocation' =>$calllocation_id,'Description.processing' => 1,'Description.department_id'=>1,'Description.is_deleted'=>0))),'recursive'=>2));
                    $electrical = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array( 'Description.sales_calllocation' =>$calllocation_id,'Description.processing' => 1,'Description.department_id'=>2,'Description.is_deleted'=>0))),'recursive'=>2));
                    $pressure = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array( 'Description.sales_calllocation' =>$calllocation_id,'Description.processing' => 1,'Description.department_id'=>3,'Description.is_deleted'=>0))),'recursive'=>2));
                    $temperature = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array( 'Description.sales_calllocation' =>$calllocation_id,'Description.processing' => 1,'Description.department_id'=>4,'Description.is_deleted'=>0))),'recursive'=>2));
                    $miscellaneous = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array( 'Description.sales_calllocation' =>$calllocation_id,'Description.processing' => 1,'Description.department_id >='=>5,'Description.is_deleted'=>0))),'recursive'=>2));
                    
                    $this->set('dimentional', $dimentional);
                    $this->set('electrical', $electrical);
                    $this->set('pressure', $pressure);
                    $this->set('temperature', $temperature);
                    $this->set('miscellaneous', $miscellaneous);
                    
                    // Dimentional
                    
                    $dimensional_processing = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.sales_calllocation' =>$calllocation_id,'Description.processing' => 1,'Description.department_id'=>1,'Description.is_deleted'=>0))),'recursive'=>2));
                    $dimensional_pending = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.sales_calllocation' =>$calllocation_id,'Description.processing' => 0,'Description.checking' => 0,'Description.department_id'=>1,'Description.is_deleted'=>0))),'recursive'=>2));
                    $dimensional_checking = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.sales_calllocation' =>$calllocation_id,'Description.processing' => 1,'Description.checking' => 1,'Description.department_id'=>1,'Description.is_deleted'=>0))),'recursive'=>2));
                    $this->set('dimensional_proc', $dimensional_processing);
                    $this->set('dimensional_pend', $dimensional_pending);
                    $this->set('dimensional_check', $dimensional_checking);
                    
                    
                    // Electrical
                                           
                    $electrical_processing = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.sales_calllocation' =>$calllocation_id,'Description.processing' => 1,'Description.department_id'=>2,'Description.is_deleted'=>0))),'recursive'=>2));
                    $electrical_pending = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.sales_calllocation' =>$calllocation_id,'Description.processing' => 0,'Description.checking' => 0,'Description.department_id'=>2,'Description.is_deleted'=>0))),'recursive'=>2));
                    $electrical_checking = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.sales_calllocation' =>$calllocation_id,'Description.processing' => 1,'Description.checking' => 1,'Description.department_id'=>2,'Description.is_deleted'=>0))),'recursive'=>2));
                    $this->set('electrical_proc', $electrical_processing);
                    $this->set('electrical_pend', $electrical_pending);
                    $this->set('electrical_check', $electrical_checking);
                    
                    // Pressure
                       
                    $pressure_processing = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.sales_calllocation' =>$calllocation_id,'Description.processing' => 1,'Description.department_id'=>3,'Description.is_deleted'=>0))),'recursive'=>2));
                    $pressure_pending = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.sales_calllocation' =>$calllocation_id,'Description.processing' => 0,'Description.checking' => 0,'Description.department_id'=>3,'Description.is_deleted'=>0))),'recursive'=>2));
                    $pressure_checking = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.sales_calllocation' =>$calllocation_id,'Description.processing' => 1,'Description.checking' => 1,'Description.department_id'=>3,'Description.is_deleted'=>0))),'recursive'=>2));
                    $this->set('pressure_proc', $pressure_processing);
                    $this->set('pressure_pend', $pressure_pending);
                    $this->set('pressure_check', $pressure_checking);
                  
                    // Temperature
                       
                    $temperature_processing = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.sales_calllocation' =>$calllocation_id,'Description.processing' => 1,'Description.department_id'=>4,'Description.is_deleted'=>0))),'recursive'=>2));
                    $temperature_pending = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.sales_calllocation' =>$calllocation_id,'Description.processing' => 0,'Description.checking' => 0,'Description.department_id'=>4,'Description.is_deleted'=>0))),'recursive'=>2));
                    $temperature_checking = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.sales_calllocation' =>$calllocation_id,'Description.processing' => 1,'Description.checking' => 1,'Description.department_id'=>4,'Description.is_deleted'=>0))),'recursive'=>2));
                    $this->set('temperature_proc', $temperature_processing);
                    $this->set('temperature_pend', $temperature_pending);
                    $this->set('temperature_check', $temperature_checking);
                    
                    // Miscellaneous
                       
                    $miscellaneous_processing = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.sales_calllocation' =>$calllocation_id,'Description.processing' => 1,'Description.department_id >='=>5,'Description.is_deleted'=>0))),'recursive'=>2));
                    $miscellaneous_pending = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.sales_calllocation' =>$calllocation_id,'Description.processing' => 0,'Description.checking' => 0,'Description.department_id >='=>5,'Description.is_deleted'=>0))),'recursive'=>2));
                    $miscellaneous_checking = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.sales_calllocation' =>$calllocation_id,'Description.processing' => 1,'Description.checking' => 1,'Description.department_id >='=>5,'Description.is_deleted'=>0))),'recursive'=>2));
                    $this->set('miscel_proc', $miscellaneous_processing);
                    $this->set('miscel_pend', $miscellaneous_pending);
                    $this->set('miscel_check', $miscellaneous_checking);
                    
                    $this->set('labprocess', $labprocess);
                    $this->set('call_location', $calllocation_id);
                    $this->set('solist', $solist_id);
                    /*
                     *  For callocation Specific & Processing 1-------------------------------------------------------------------------------------------------- 
                     */
        }
                    break;
                    //pr($labprocess);exit;
            case 'out':
                
                     /*
                     *  For callocation All & Pending 1 
                     */   
                    if($calllocation_id=='all'):
                    $labprocess = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description'),'recursive'=>2));
                    //pr($labprocess);exit;
                    $this->set('labprocess', $labprocess);
                    $dimentional = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 0,'Description.checking' => 0,'Description.department_id'=>1,'Description.is_deleted'=>0))),'recursive'=>2));
                    $electrical = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 0,'Description.checking' => 0,'Description.department_id'=>2,'Description.is_deleted'=>0))),'recursive'=>2));
                    $pressure = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 0,'Description.checking' => 0,'Description.department_id'=>3,'Description.is_deleted'=>0))),'recursive'=>2));
                    $temperature = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 0,'Description.checking' => 0,'Description.department_id'=>4,'Description.is_deleted'=>0))),'recursive'=>2));
                    $miscellaneous = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 0,'Description.checking' => 0,'Description.department_id >='=>5,'Description.is_deleted'=>0))),'recursive'=>2));
                    
                    $this->set('dimentional', $dimentional);
                    $this->set('electrical', $electrical);
                    $this->set('pressure', $pressure);
                    $this->set('temperature', $temperature);
                    $this->set('miscellaneous', $miscellaneous);
                    // Dimentional
                    
                    $dimensional_processing = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 0,'Description.checking' => 0,'Description.department_id'=>1,'Description.is_deleted'=>0))),'recursive'=>2));
                    $dimensional_pending = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 0,'Description.checking' => 0,'Description.department_id'=>1,'Description.is_deleted'=>0))),'recursive'=>2));
                    $dimensional_checking = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 1,'Description.checking' => 1,'Description.department_id'=>1,'Description.is_deleted'=>0))),'recursive'=>2));
                    $this->set('dimensional_proc', $dimensional_processing);
                    $this->set('dimensional_pend', $dimensional_pending);
                    $this->set('dimensional_check', $dimensional_checking);
                    
                    
                    // Electrical
                                           
                    $electrical_processing = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 0,'Description.checking' => 0,'Description.department_id'=>2,'Description.is_deleted'=>0))),'recursive'=>2));
                    $electrical_pending = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 0,'Description.checking' => 0,'Description.department_id'=>2,'Description.is_deleted'=>0))),'recursive'=>2));
                    $electrical_checking = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 1,'Description.checking' => 1,'Description.department_id'=>2,'Description.is_deleted'=>0))),'recursive'=>2));
                    $this->set('electrical_proc', $electrical_processing);
                    $this->set('electrical_pend', $electrical_pending);
                    $this->set('electrical_check', $electrical_checking);
                    
                    // Pressure
                       
                    $pressure_processing = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 0,'Description.checking' => 0,'Description.department_id'=>3,'Description.is_deleted'=>0))),'recursive'=>2));
                    //pr($pressure_processing);exit;
                    $pressure_pending = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 0,'Description.checking' => 0,'Description.department_id'=>3,'Description.is_deleted'=>0))),'recursive'=>2));
                    $pressure_checking = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 1,'Description.checking' => 1,'Description.department_id'=>3,'Description.is_deleted'=>0))),'recursive'=>2));
                    $this->set('pressure_proc', $pressure_processing);
                    $this->set('pressure_pend', $pressure_pending);
                    $this->set('pressure_check', $pressure_checking);
                  
                    // Temperature
                       
                    $temperature_processing = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 0,'Description.checking' => 0,'Description.department_id'=>4,'Description.is_deleted'=>0))),'recursive'=>2));
                    $temperature_pending = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 0,'Description.checking' => 0,'Description.department_id'=>4,'Description.is_deleted'=>0))),'recursive'=>2));
                    $temperature_checking = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 1,'Description.checking' => 1,'Description.department_id'=>4,'Description.is_deleted'=>0))),'recursive'=>2));
                    $this->set('temperature_proc', $temperature_processing);
                    $this->set('temperature_pend', $temperature_pending);
                    $this->set('temperature_check', $temperature_checking);
                    
                    // Miscellaneous
                       
                    $miscellaneous_processing = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 0,'Description.checking' => 0,'Description.department_id >='=>5,'Description.is_deleted'=>0))),'recursive'=>2));
                    $miscellaneous_pending = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 0,'Description.checking' => 0,'Description.department_id >='=>5,'Description.is_deleted'=>0))),'recursive'=>2));
                    $miscellaneous_checking = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 1,'Description.checking' => 1,'Description.department_id >='=>5,'Description.is_deleted'=>0))),'recursive'=>2));
                    $this->set('miscel_proc', $miscellaneous_processing);
                    $this->set('miscel_pend', $miscellaneous_pending);
                    $this->set('miscel_check', $miscellaneous_checking);
                    
                        $this->set('call_location', $calllocation_id);
                        $this->set('solist', $solist_id);
                    /*
                     *  For callocation All & Pending 1-------------------------------------------------------------------------------------------------- 
                     */
                   else:
                       
                    /*
                     *  For callocation Specific & Pending 1
                     */
                        $labprocess = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array( 'Description.sales_calllocation' =>$calllocation_id,'Description.is_deleted'=>0)))));
                        //pr($labprocess);exit;
                        $this->set('labprocess', $labprocess);
                        
                        $dimentional = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 0,'Description.checking' => 0,'Description.sales_calllocation' =>$calllocation_id,'Description.department_id'=>1,'Description.is_deleted'=>0))),'recursive'=>2));
                        $electrical = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                            ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 0,'Description.checking' => 0,'Description.sales_calllocation' =>$calllocation_id,'Description.department_id'=>2,'Description.is_deleted'=>0))),'recursive'=>2));
                        $pressure = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                            ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 0,'Description.checking' => 0,'Description.sales_calllocation' =>$calllocation_id,'Description.department_id'=>3,'Description.is_deleted'=>0))),'recursive'=>2));
                        $temperature = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                            ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 0,'Description.checking' => 0,'Description.sales_calllocation' =>$calllocation_id,'Description.department_id'=>4,'Description.is_deleted'=>0))),'recursive'=>2));
                        $miscellaneous = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                            ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 0,'Description.checking' => 0,'Description.sales_calllocation' =>$calllocation_id,'Description.department_id >='=>5,'Description.is_deleted'=>0))),'recursive'=>2));

                        $this->set('dimentional', $dimentional);
                        $this->set('electrical', $electrical);
                        $this->set('pressure', $pressure);
                        $this->set('temperature', $temperature);
                        $this->set('miscellaneous', $miscellaneous);
                        
                        // Dimentional
                    
                    $dimensional_processing = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.sales_calllocation' =>$calllocation_id,'Description.processing' => 0,'Description.department_id'=>1,'Description.is_deleted'=>0))),'recursive'=>2));
                    $dimensional_pending = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.sales_calllocation' =>$calllocation_id,'Description.processing' => 0,'Description.checking' => 0,'Description.department_id'=>1,'Description.is_deleted'=>0))),'recursive'=>2));
                    $dimensional_checking = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.sales_calllocation' =>$calllocation_id,'Description.processing' => 1,'Description.checking' => 1,'Description.department_id'=>1,'Description.is_deleted'=>0))),'recursive'=>2));
                    $this->set('dimensional_proc', $dimensional_processing);
                    $this->set('dimensional_pend', $dimensional_pending);
                    $this->set('dimensional_check', $dimensional_checking);
                    
                    
                    // Electrical
                                           
                    $electrical_processing = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.sales_calllocation' =>$calllocation_id,'Description.processing' => 0,'Description.department_id'=>2,'Description.is_deleted'=>0))),'recursive'=>2));
                    $electrical_pending = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.sales_calllocation' =>$calllocation_id,'Description.processing' => 0,'Description.checking' => 0,'Description.department_id'=>2,'Description.is_deleted'=>0))),'recursive'=>2));
                    $electrical_checking = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.sales_calllocation' =>$calllocation_id,'Description.processing' => 1,'Description.checking' => 1,'Description.department_id'=>2,'Description.is_deleted'=>0))),'recursive'=>2));
                    $this->set('electrical_proc', $electrical_processing);
                    $this->set('electrical_pend', $electrical_pending);
                    $this->set('electrical_check', $electrical_checking);
                    
                    // Pressure
                       
                    $pressure_processing = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.sales_calllocation' =>$calllocation_id,'Description.processing' => 0,'Description.department_id'=>3,'Description.is_deleted'=>0))),'recursive'=>2));
                    $pressure_pending = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.sales_calllocation' =>$calllocation_id,'Description.processing' => 0,'Description.checking' => 0,'Description.department_id'=>3,'Description.is_deleted'=>0))),'recursive'=>2));
                    $pressure_checking = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.sales_calllocation' =>$calllocation_id,'Description.processing' => 1,'Description.checking' => 1,'Description.department_id'=>3,'Description.is_deleted'=>0))),'recursive'=>2));
                    $this->set('pressure_proc', $pressure_processing);
                    $this->set('pressure_pend', $pressure_pending);
                    $this->set('pressure_check', $pressure_checking);
                  
                    // Temperature
                       
                    $temperature_processing = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.sales_calllocation' =>$calllocation_id,'Description.processing' => 0,'Description.department_id'=>4,'Description.is_deleted'=>0))),'recursive'=>2));
                    $temperature_pending = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.sales_calllocation' =>$calllocation_id,'Description.processing' => 0,'Description.checking' => 0,'Description.department_id'=>4,'Description.is_deleted'=>0))),'recursive'=>2));
                    $temperature_checking = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.sales_calllocation' =>$calllocation_id,'Description.processing' => 1,'Description.checking' => 1,'Description.department_id'=>4,'Description.is_deleted'=>0))),'recursive'=>2));
                    $this->set('temperature_proc', $temperature_processing);
                    $this->set('temperature_pend', $temperature_pending);
                    $this->set('temperature_check', $temperature_checking);
                    
                    // Miscellaneous
                       
                    $miscellaneous_processing = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.sales_calllocation' =>$calllocation_id,'Description.processing' => 0,'Description.department_id >='=>5,'Description.is_deleted'=>0))),'recursive'=>2));
                    $miscellaneous_pending = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.sales_calllocation' =>$calllocation_id,'Description.processing' => 0,'Description.checking' => 0,'Description.department_id >='=>5,'Description.is_deleted'=>0))),'recursive'=>2));
                    $miscellaneous_checking = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff <=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.sales_calllocation' =>$calllocation_id,'Description.processing' => 1,'Description.checking' => 1,'Description.department_id >='=>5,'Description.is_deleted'=>0))),'recursive'=>2));
                    $this->set('miscel_proc', $miscellaneous_processing);
                    $this->set('miscel_pend', $miscellaneous_pending);
                    $this->set('miscel_check', $miscellaneous_checking);
                    
                        $this->set('call_location', $calllocation_id);
                        $this->set('solist', $solist_id);
                     /*
                     *  For callocation Specific & Pending 1-------------------------------------------------------------------------------------------------- 
                     */
                   
            endif;
            //pr($labprocess);exit;
            break;
            case 'overdue': 
                 if($calllocation_id=='all'):
                     $labprocess = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff >' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description')));
                    $this->set('labprocess', $labprocess);
                    
                    $dimentional = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1,'Salesorder.solist_diff >' => 0,
                    ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.department_id'=>1,'Description.is_deleted'=>0))),'recursive'=>2));
                    $electrical = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1,'Salesorder.solist_diff >' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.department_id'=>2,'Description.is_deleted'=>0))),'recursive'=>2));
                    $pressure = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1,'Salesorder.solist_diff >' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.department_id'=>3,'Description.is_deleted'=>0))),'recursive'=>2));
                    $temperature = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1,'Salesorder.solist_diff >' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.department_id'=>4,'Description.is_deleted'=>0))),'recursive'=>2));
                    $miscellaneous = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1,'Salesorder.solist_diff >' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.department_id >='=>5,'Description.is_deleted'=>0))),'recursive'=>2));

                    $this->set('dimentional', $dimentional);
                    $this->set('electrical', $electrical);
                    $this->set('pressure', $pressure);
                    $this->set('temperature', $temperature);
                    $this->set('miscellaneous', $miscellaneous);

                    
                    
                    // Dimentional
                    
                    $dimensional_processing = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff >' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 1,'Description.department_id'=>1,'Description.is_deleted'=>0))),'recursive'=>2));
                    $dimensional_pending = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff >' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 0,'Description.checking' => 0,'Description.department_id'=>1,'Description.is_deleted'=>0))),'recursive'=>2));
                    $dimensional_checking = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff >' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 1,'Description.checking' => 1,'Description.department_id'=>1,'Description.is_deleted'=>0))),'recursive'=>2));
                    $this->set('dimensional_proc', $dimensional_processing);
                    $this->set('dimensional_pend', $dimensional_pending);
                    $this->set('dimensional_check', $dimensional_checking);
                    
                    
                    // Electrical
                                           
                    $electrical_processing = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff >' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 1,'Description.department_id'=>2,'Description.is_deleted'=>0))),'recursive'=>2));
                    $electrical_pending = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff >' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 0,'Description.checking' => 0,'Description.department_id'=>2,'Description.is_deleted'=>0))),'recursive'=>2));
                    $electrical_checking = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff >' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 1,'Description.checking' => 1,'Description.department_id'=>2,'Description.is_deleted'=>0))),'recursive'=>2));
                    $this->set('electrical_proc', $electrical_processing);
                    $this->set('electrical_pend', $electrical_pending);
                    $this->set('electrical_check', $electrical_checking);
                    
                    // Pressure
                       
                    $pressure_processing = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff >' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 1,'Description.department_id'=>3,'Description.is_deleted'=>0))),'recursive'=>2));
                    $pressure_pending = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff >' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 0,'Description.checking' => 0,'Description.department_id'=>3,'Description.is_deleted'=>0))),'recursive'=>2));
                    $pressure_checking = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff >' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 1,'Description.checking' => 1,'Description.department_id'=>3,'Description.is_deleted'=>0))),'recursive'=>2));
                    $this->set('pressure_proc', $pressure_processing);
                    $this->set('pressure_pend', $pressure_pending);
                    $this->set('pressure_check', $pressure_checking);
                  
                    // Temperature
                       
                    $temperature_processing = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff >' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 1,'Description.department_id'=>4,'Description.is_deleted'=>0))),'recursive'=>2));
                    $temperature_pending = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff >' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 0,'Description.checking' => 0,'Description.department_id'=>4,'Description.is_deleted'=>0))),'recursive'=>2));
                    $temperature_checking = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff >' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 1,'Description.checking' => 1,'Description.department_id'=>4,'Description.is_deleted'=>0))),'recursive'=>2));
                    $this->set('temperature_proc', $temperature_processing);
                    $this->set('temperature_pend', $temperature_pending);
                    $this->set('temperature_check', $temperature_checking);
                    
                    // Miscellaneous
                       
                    $miscellaneous_processing = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff >' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 1,'Description.department_id >='=>5,'Description.is_deleted'=>0))),'recursive'=>2));
                    $miscellaneous_pending = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff >' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 0,'Description.checking' => 0,'Description.department_id >='=>5,'Description.is_deleted'=>0))),'recursive'=>2));
                    $miscellaneous_checking = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff >' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 1,'Description.checking' => 1,'Description.department_id >='=>5,'Description.is_deleted'=>0))),'recursive'=>2));
                    $this->set('miscel_proc', $miscellaneous_processing);
                    $this->set('miscel_pend', $miscellaneous_pending);
                    $this->set('miscel_check', $miscellaneous_checking);
                    $this->set('call_location', $calllocation_id);
                    $this->set('solist', $solist_id);
                else:
                        $labprocess = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1,'Salesorder.solist_diff >' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array( 'Description.sales_calllocation' => $calllocation_id,'Description.is_deleted'=>0)))));
                    $this->set('labprocess', $labprocess);
                    
                    
                    $dimentional = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff >' => 0,
                    ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.sales_calllocation' =>$calllocation_id,'Description.department_id'=>1,'Description.is_deleted'=>0))),'recursive'=>2));
                    $electrical = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff >' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.sales_calllocation' =>$calllocation_id,'Description.department_id'=>2,'Description.is_deleted'=>0))),'recursive'=>2));
                    $pressure = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff >' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.sales_calllocation' =>$calllocation_id,'Description.department_id'=>3,'Description.is_deleted'=>0))),'recursive'=>2));
                    $temperature = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff >' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.sales_calllocation' =>$calllocation_id,'Description.department_id'=>4,'Description.is_deleted'=>0))),'recursive'=>2));
                    $miscellaneous = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff >' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.sales_calllocation' =>$calllocation_id,'Description.department_id >='=>5,'Description.is_deleted'=>0))),'recursive'=>2));

                    $this->set('dimentional', $dimentional);
                    $this->set('electrical', $electrical);
                    $this->set('pressure', $pressure);
                    $this->set('temperature', $temperature);
                    $this->set('miscellaneous', $miscellaneous);

                    
                    // Dimentional
                    
                    $dimensional_processing = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff >' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 1,'Description.department_id'=>1, 'Description.sales_calllocation' => $calllocation_id,'Description.is_deleted'=>0))),'recursive'=>2));
                    $dimensional_pending = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff >' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 0,'Description.checking' => 0,'Description.department_id'=>1, 'Description.sales_calllocation' => $calllocation_id,'Description.is_deleted'=>0))),'recursive'=>2));
                    $dimensional_checking = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff >' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 1,'Description.checking' => 1,'Description.department_id'=>1, 'Description.sales_calllocation' => $calllocation_id,'Description.is_deleted'=>0))),'recursive'=>2));
                    $this->set('dimensional_proc', $dimensional_processing);
                    $this->set('dimensional_pend', $dimensional_pending);
                    $this->set('dimensional_check', $dimensional_checking);
                    
                    
                    // Electrical
                                           
                    $electrical_processing = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff >' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 1,'Description.department_id'=>2, 'Description.sales_calllocation' => $calllocation_id,'Description.is_deleted'=>0))),'recursive'=>2));
                    $electrical_pending = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff >' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 0,'Description.checking' => 0,'Description.department_id'=>2, 'Description.sales_calllocation' => $calllocation_id,'Description.is_deleted'=>0))),'recursive'=>2));
                    $electrical_checking = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff >' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 1,'Description.checking' => 1,'Description.department_id'=>2, 'Description.sales_calllocation' => $calllocation_id,'Description.is_deleted'=>0))),'recursive'=>2));
                    $this->set('electrical_proc', $electrical_processing);
                    $this->set('electrical_pend', $electrical_pending);
                    $this->set('electrical_check', $electrical_checking);
                    
                    // Pressure
                       
                    $pressure_processing = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff >' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 1,'Description.department_id'=>3, 'Description.sales_calllocation' => $calllocation_id,'Description.is_deleted'=>0))),'recursive'=>2));
                    $pressure_pending = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff >' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 0,'Description.checking' => 0,'Description.department_id'=>3, 'Description.sales_calllocation' => $calllocation_id,'Description.is_deleted'=>0))),'recursive'=>2));
                    $pressure_checking = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff >' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 1,'Description.checking' => 1,'Description.department_id'=>3, 'Description.sales_calllocation' => $calllocation_id,'Description.is_deleted'=>0))),'recursive'=>2));
                    $this->set('pressure_proc', $pressure_processing);
                    $this->set('pressure_pend', $pressure_pending);
                    $this->set('pressure_check', $pressure_checking);
                  
                    // Temperature
                       
                    $temperature_processing = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff >' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 1,'Description.department_id'=>4, 'Description.sales_calllocation' => $calllocation_id,'Description.is_deleted'=>0))),'recursive'=>2));
                    $temperature_pending = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff >' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 0,'Description.checking' => 0,'Description.department_id'=>4, 'Description.sales_calllocation' => $calllocation_id,'Description.is_deleted'=>0))),'recursive'=>2));
                    $temperature_checking = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff >' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 1,'Description.checking' => 1,'Description.department_id'=>4, 'Description.sales_calllocation' => $calllocation_id,'Description.is_deleted'=>0))),'recursive'=>2));
                    $this->set('temperature_proc', $temperature_processing);
                    $this->set('temperature_pend', $temperature_pending);
                    $this->set('temperature_check', $temperature_checking);
                    
                    // Miscellaneous
                       
                    $miscellaneous_processing = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff >' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 1,'Description.department_id >='=>5, 'Description.sales_calllocation' => $calllocation_id,'Description.is_deleted'=>0))),'recursive'=>2));
                    $miscellaneous_pending = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff >' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 0,'Description.checking' => 0,'Description.department_id >='=>5, 'Description.sales_calllocation' => $calllocation_id,'Description.is_deleted'=>0))),'recursive'=>2));
                    $miscellaneous_checking = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deliveryorder_created'=>0,'Salesorder.is_approved' => 1, 'Salesorder.solist_diff >' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('branch','Customer'=>array('Priority'),'Description' => array('conditions' => array('Description.processing' => 1,'Description.checking' => 1,'Description.department_id >='=>5, 'Description.sales_calllocation' => $calllocation_id,'Description.is_deleted'=>0))),'recursive'=>2));
                    $this->set('miscel_proc', $miscellaneous_processing);
                    $this->set('miscel_pend', $miscellaneous_pending);
                    $this->set('miscel_check', $miscellaneous_checking);
                    $this->set('call_location', $calllocation_id);
                    $this->set('solist', $solist_id);
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
