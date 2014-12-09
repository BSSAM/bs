<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class ClientposapprovalController extends AppController {

    public $helpers = array('Html', 'Form', 'Session');
    public $uses = array('Priority', 'Paymentterm', 'Quotation', 'Currency', 'Salesorder', 'Deliveryorder','Logactivity',
        'Qoinvoice','Soinvoice','Doinvoice','Poinvoice', 'Datalog','DelDescription','Description',
        'Country', 'Additionalcharge', 'Service', 'CustomerInstrument', 'Customerspecialneed','Address',
        'Instrument', 'Brand', 'Customer', 'Device', 'Unit', 'InstrumentType','Poinvoice','Location',
        'Contactpersoninfo', 'CusSalesperson', 'Clientpo');

    public function index() 
    {
        //$this->Quotation->recursive = 1;
//        if($user_role['app_clientpo']['view'] == 0){ 
//         return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
//        }
        $quotation_list_bybeforedo = $this->Quotation->find('all', array('conditions' => array('Quotation.is_deleted' =>0,'Customer.acknowledgement_type_id'=>1,'Customer.invoice_type_id'=>2,'Quotation.is_approved' =>1,'Quotation.is_deliveryorder_created'=>1,'Quotation.is_poapproved' =>0), 'order' => array('Quotation.id' => 'DESC')));
        $salesorder_list_bybeforedo = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deleted' =>0,'Customer.acknowledgement_type_id'=>1,'Customer.invoice_type_id'=>3,'Salesorder.is_approved' =>1,'Salesorder.is_deliveryorder_created'=>1,'Salesorder.is_poapproved' =>0), 'order' => array('Salesorder.id' => 'DESC')));
        //pr($salesorder_list_bybeforedo);exit;
        //$po_list_bybeforedo = $this->Quotation->find('all', array('conditions' => array('Quotation.is_deleted' =>0,'Customer.acknowledgement_type_id'=>1,'Customer.invoice_type_id'=>1,'Quotation.is_approved' =>1,'Quotation.is_deliveryorder_created'=>1,'Quotation.is_poapproved' =>0), 'group' => 'Quotation.ref_no','field'=>array('Quotation.quotationno')));
        $po_list_bybeforedo = $this->Quotation->find('all',array('conditions' => array('Quotation.is_deleted' =>0,'Customer.acknowledgement_type_id'=>1,'Customer.invoice_type_id'=>1,'Quotation.is_approved' =>1,'Quotation.is_deliveryorder_created'=>1,'Quotation.is_poapproved' =>0), 'group' => 'Quotation.ref_no'));
        $do_list_bybeforedo = $this->Deliveryorder->find('all', array('conditions' => array('Deliveryorder.is_deleted' =>0,'Customer.acknowledgement_type_id'=>1,'Customer.invoice_type_id'=>4,'Deliveryorder.is_approved' =>1,'Deliveryorder.is_poapproved' =>0), 'order' => array('Deliveryorder.id'=> 'DESC')));
        //pr($po_list_bybeforedo);exit;
        $quotation_lists_bybeforeinvoice = $this->Quotation->find('all', array('conditions' => array('Quotation.is_deleted' =>0,'Customer.acknowledgement_type_id'=>2,'Customer.invoice_type_id'=>2,'Quotation.is_approved' =>1,'Quotation.is_invoice_created'=>1,'Quotation.is_poapproved' =>0), 'order' => array('Quotation.id' => 'DESC')));
        $salesorder_lists_bybeforeinvoice = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_deleted' =>0,'Customer.acknowledgement_type_id'=>2,'Customer.invoice_type_id'=>3,'Salesorder.is_approved' =>1,'Salesorder.is_invoice_created'=>1,'Salesorder.is_poapproved' =>0), 'order' => array('Salesorder.id' => 'DESC')));
        $po_lists_bybeforeinvoice = $this->Quotation->find('all', array('conditions' => array('Quotation.is_deleted' =>0,'Customer.acknowledgement_type_id'=>2,'Customer.invoice_type_id'=>1,'Quotation.is_approved' =>1,'Quotation.is_invoice_created'=>1,'Quotation.is_poapproved' =>0), 'group' => array('Quotation.ref_no')));
        $do_lists_bybeforeinvoice = $this->Deliveryorder->find('all', array('conditions' => array('Deliveryorder.is_deleted' =>0,'Customer.acknowledgement_type_id'=>2,'Customer.invoice_type_id'=>4,'Deliveryorder.is_approved' =>1,'Deliveryorder.is_invoice_created'=>1,'Deliveryorder.is_poapproved' =>0), 'order' => array('Deliveryorder.id'=> 'DESC')));
        $this->set(compact('quotation_list_bybeforedo','salesorder_list_bybeforedo','po_list_bybeforedo','do_list_bybeforedo','quotation_lists_bybeforeinvoice','salesorder_lists_bybeforeinvoice','po_lists_bybeforeinvoice','do_lists_bybeforeinvoice'));
    }
    public function view($id = NULL) 
    {
        
        $this->layout   =   'ajax';
        //pr($this->request->data);exit;
        $q_id =  $this->request->data['q_id'];
        //pr($q_id);
        $pos = strpos($q_id, '/');
        if($pos == false):
            $q_id =  $this->request->data['q_id'];
        else:    
            $q_id_array = explode('/', $q_id);
            $q_id = $q_id_array[0];
            $i_id = $q_id_array[1];
        endif;
        //pr($q_id);
        //pr($i_id);exit;
        if($i_id == 1):
            
        endif;
        
        if($i_id == 2):
            
        endif;
        
        if($i_id == 3):         // Salesorder Full Invoice
            
            $q_class =  $this->request->data['q_class'];
            $this->set('title_name',$q_class);
            $this->set('invoicetype',$i_id);
            $data_sal = $this->Salesorder->find('first',array('conditions'=>array('Salesorder.id'=>$q_id,'Salesorder.is_deleted'=>0,'Salesorder.is_approved'=>1),'recursive'=>3));
            $data_quo = $this->Quotation->find('all',array('conditions'=>array('Quotation.quotationno'=>$data_sal['Salesorder']['quotationno'],'Quotation.is_deleted'=>0,'Quotation.is_approved'=>1),'recursive'=>3));
            $data_del = $this->Deliveryorder->find('all',array('conditions'=>array('Deliveryorder.salesorder_id'=>$q_id,'Deliveryorder.is_deleted'=>0),'recursive'=>3));
            
            // Salesorder Details
            $sales_id = $data_sal['Salesorder']['id'];
            $desc = count($data_sal['Description']);
            $this->set(compact('desc','sales_id'));
            
            // Customer Details - Address
            $customer_id = $data_sal['Customer']['id'];
            $customer_address_reg = $this->Address->find('all',array('conditions'=>array('Address.customer_id'=>$customer_id,'Address.type'=>'registered')));
            $customer_address_bill = $this->Address->find('all',array('conditions'=>array('Address.customer_id'=>$customer_id,'Address.type'=>'billing')));
            $customer_address_del = $this->Address->find('all',array('conditions'=>array('Address.customer_id'=>$customer_id,'Address.type'=>'delivery')));
            $this->set(compact('customer_address_reg','customer_address_bill','customer_address_del'));
            
            // Customer Details - SalesPerson
            $customer_sales = $this->CusSalesperson->find('all',array('conditions'=>array('CusSalesperson.customer_id'=>$customer_id)));
            $this->set('customer_sales',$customer_sales);
            
            // Customer Details - Location
            $location_id = $data_sal['Customer']['location_id'];
            $customer_location = $this->Location->find('first',array('conditions'=>array('Location.id'=>$location_id)));
            $this->set('customer_location',$customer_location);
            
            // Customer Details - Contactpersoninfo
            $customer_contact = $this->Contactpersoninfo->find('all',array('conditions'=>array('Contactpersoninfo.customer_id'=>$customer_id)));
            $this->set('customer_contact',$customer_contact);
            
            // Quotation Details 
            
            //pr($customer_address_reg);exit;
            $this->set('pos',$data_sal['Salesorder']['ref_no']);
            $this->set('pos_count',$data_sal['Salesorder']['ref_count']);
            $this->set('salesorderfullinvoice',0);
            $this->set(compact('data_sal','data_quo','data_del'));
            
            
            
        endif;
        
        if($i_id == 4):
            
        endif;
        
        
        $q_class =  $this->request->data['q_class'];
        $this->set('title_name',$q_class);
        //pr($q_id);
//        $data = $this->Quotation->find('first',array('conditions'=>array('Quotation.quotationno'=>$q_id,'Quotation.is_deleted'=>0,'Quotation.is_approved'=>1),'recursive'=>3));
//        $data_sal = $this->Salesorder->find('first',array('conditions'=>array('Salesorder.id'=>$s_id,'Salesorder.is_deleted'=>0,'Salesorder.is_approved'=>1),'recursive'=>3));
//        //pr($data_sal);exit;
//        $this->set('total_inst',$data['Quotation']['total_inst']);
//        //pr($data);exit;
//        if($data['Customer']['invoice_type_id']==3):
//        $sales_data = $this->Salesorder->find('all',array('conditions'=>array('Salesorder.id'=>$s_id,'Salesorder.is_deleted'=>0),'fields'=>array('salesorderno')));
//        else:
//        $sales_data = $this->Salesorder->find('all',array('conditions'=>array('Salesorder.quotationno'=>$q_id,'Salesorder.is_deleted'=>0),'fields'=>array('salesorderno')));
//        endif;
//        
//        //pr($sales_data['Salesorder']['is_deliveryorder_created']);exit;
//        $delivery_order =   array();
//        $sales_order =   array();
//        foreach($sales_data as $sale):
//            $sales_order['Salesorder'][]=$sale['Salesorder']['id'];
//            //$sales_order['Description'][]=$sale['Salesorder']['id'];
//            $delivery_orders    =   $this->Deliveryorder->find('all',array('conditions'=>array('Deliveryorder.salesorder_id'=>$sale['Salesorder']['id'],'Deliveryorder.is_deleted'=>0),'fields'=>array('delivery_order_no')));
//            foreach($delivery_orders as $delivery):
//                $delivery_order['Deliveryorder'][]=   $delivery['Deliveryorder']['delivery_order_no'];
//            endforeach;
//        endforeach;
//        $quotation_data = array_merge($delivery_order,$sales_order);
//        //pr($quotation_data);exit;
//       
//        $this->set('type_id',$data['Customer']['invoice_type_id']);
//        $this->set('quotation_data',$quotation_data);
//        
//        // Sales Description Count
//        
//        $sales_data_all = $this->Salesorder->find('all',array('conditions'=>array('Salesorder.id'=>$data_sal['Salesorder']['id'],'Salesorder.is_deleted'=>0,'Salesorder.is_approved'=>1)));
//        $count_sales_desc = 0;
//        foreach($sales_data_all as $sales_data):
//            foreach($sales_data['Description'] as $desc_count):
//
//                if($desc_count['is_deleted'] == 0):
//                    $count_sales_desc = $count_sales_desc + 1;
//                endif;
//
//            endforeach;
//        endforeach;
//        $this->set('count_sales_desc',$count_sales_desc);
//        
//        // Delivery Order Description Count
//        
//        $del_data_all = $this->Deliveryorder->find('all',array('conditions'=>array('Deliveryorder.salesorder_id'=>$sale['Salesorder']['id'],'Deliveryorder.is_deleted'=>0,'Deliveryorder.is_approved'=>1)));
//        $count_del_desc = 0;
//        foreach($del_data_all as $del_data):
//            foreach($del_data['DelDescription'] as $desc_count):
//
//                if($desc_count['is_deleted'] == 0):
//                    $count_del_desc = $count_del_desc + 1;
//                endif;
//
//            endforeach;
//        endforeach;
//        $this->set('count_del_desc',$count_del_desc);
//        
//        
//        $track_id=$this->random('track');
//        $this->set(compact('data','data_sal','track_id'));
        
        //pr($data);exit;
//        switch($data_sal['Customer']['invoice_type_id'])
//        {
//            case 1:
//                //echo $data['Quotation']['ref_no'];
//                $this->set('pos',$data_sal['Salesorder']['ref_no']);
//                $this->set('pos_count',$data_sal['Salesorder']['ref_count']);
//                $this->set('salesorderfullinvoice',0);
//                $this->set('invoicetype',1);
//                //pr($data['Quotation']['ref_count']);
//                //pr($data['Quotation']['ref_no']);
//                //$this->set('pos',$data['Quotation']['ref_no']);
////                $po_data_array  = $this->Poinvoice->find('first',array('conditions'=>array('Poinvoice.track_id'=>$data['Quotation']['track_id'])));
////                if($po_data_array=='')
////                {
////                    $po_data_array  = $this->Poinvoice->updateAll(array('conditions'=>array('Poinvoice.track_id'=>$data['Quotation']['track_id'])));
////                }
////                else
////                {
////               // pr($po_data_array);
////                //exit;
////                $pos    =   array($po_data_array['poinvoice']['clientpo_number']=>$po_data_array['Poinvoice']['po_count']);
////                $this->set('pos',$pos);
////                }
//                break;
//            case 2:
//                $this->set('pos',$data['Quotation']['ref_no']);
//                $this->set('pos_count',$data['Quotation']['ref_count']);
//                $this->set('salesorderfullinvoice',0);
//                $this->set('invoicetype',2);
//                //pr($data['Quotation']['ref_count']);
//                //pr($data['Quotation']['ref_no']);
////                $qo_data_array  = $this->Qoinvoice->find('first',array('conditions'=>array('Qoinvoice.track_id'=>$data['Quotation']['track_id'])));  
////                $quotation_data =   $qo_data_array['Qoinvoice']['quotation_data'];
////                $qos    = unserialize($quotation_data);
////                $pos    =   $qos['Clientpo']['Purchaseorder'];
////                $this->set('pos',$pos);
//                break;
//            case 3:
//                $this->set('pos',$data['Quotation']['ref_no']);
//                $this->set('pos_count',$data['Quotation']['ref_count']);
//                $this->set('salesorderfullinvoice',1);
//                $this->set('invoicetype',3);
//                //pr($data['Quotation']['ref_count']);
//                //pr($data['Quotation']['ref_no']);
////                $po_data_array  = $this->Soinvoice->find('first',array('conditions'=>array('Soinvoice.track_id'=>$data['Quotation']['track_id'])));  
////                $so_data =   $po_data_array['Soinvoice']['salesorder_data'];
////                $sos    = unserialize($so_data);
////                $pos    =   $sos['Clientpo']['Purchaseorder'];
////                $this->set('pos',$pos);
//                break;
//            case 4:
//                $this->set('pos',$data['Quotation']['ref_no']);
//                $this->set('pos_count',$data['Quotation']['ref_count']);
//                $this->set('salesorderfullinvoice',0);
//                $this->set('invoicetype',4);
//                //pr($data['Quotation']['ref_count']);
//                //pr($data['Quotation']['ref_no']);
////                $po_data_array  = $this->Doinvoice->find('first',array('conditions'=>array('Doinvoice.track_id'=>$data['Quotation']['track_id'])));  
////                if(!empty($po_data_array)):
////                $do_data =   $po_data_array['Doinvoice']['deliveryorder_data'];
////                $dos    = unserialize($do_data);
////                $pos    =   $dos['Clientpo']['Purchaseorder'];
////                $this->set('pos',$pos);
////                endif;
//                break;
//        }
      
      
    }
    public function quotation_po_update()
    {
        $this->autoRender=false;
        pr($this->request->data);
        foreach($this->request->data['ponumber'] as $ponumber[]):
            //$ponumber[];
        endforeach;
        pr($ponumber);
        pr($this->request->data['invoice_type']);
        exit;
        
        if($this->request->is('post')){
            $po_full_invoice_ref_no = $this->Quotation->find('first',array('conditions'=>array('Quotation.quotationno'=>$this->request->data['quotationno'],'Quotation.is_deleted'=>0,'Quotation.is_approved'=>1)));
            //$this->set('total_inst',$po_full_invoice_ref_no['Quotation']['total_inst']);
            function sum($carry, $item)
            {
            $carry += $item;
            return $carry;
            }
            $title_name   =   $this->request->data['title_name'];
            $po_array   =   $this->request->data['ponumber'];
            for($i=0;$i<count($po_array);$i++):
                //$po_array[$i];
            $check_string[] = strchr($po_array[$i], 'CPO');
            endfor;
            if(array_filter($check_string)):
                $ponumber_check = 0;  // Automatic
            else:
                $ponumber_check = 1;  // Manual
            endif;
            
            $po_array   =   $this->request->data['ponumber'];
            $ponumbers  =   implode($this->request->data['ponumber'],',');
            
            $po_count  =   implode($this->request->data['pocount'],',');
            $count = array_reduce($this->request->data['pocount'], "sum");
            
            
            $quotationno    =   $this->request->data['quotationno'];
            $Find_po_count_satisfied = $this->Quotation->find('first',array('conditions'=>array('Quotation.quotationno'=>$quotationno,'Quotation.is_deleted'=>0,'Quotation.is_approved'=>1),'recursive'=>3));
            
            $invoice_type = $Find_po_count_satisfied['Customer']['invoice_type_id'];
            $ack_type = $Find_po_count_satisfied['Customer']['acknowledgement_type_id'];
            
           /////////////////////////   Purchase Order Full Invoice  ////////////////////////////////////////////
            if($invoice_type == 1)
            {
                $ref_no_old = $po_full_invoice_ref_no['Quotation']['ref_no'];
               $quo_data = $this->Quotation->find('all',array('conditions'=>array('Quotation.ref_no'=>$ref_no_old,'Quotation.is_deleted'=>0,'Quotation.is_approved'=>1)));
                for($i=0;$i<count($quo_data);$i++)
                {
                   //pr($sales_data[$i]['Description']);
                   //echo count($sales_data[$i]['Description']);exit;
                   for($j=0;$j<count($quo_data[$i]['Device']);$j++)
                   {
                      //echo $j;
                   }
                }
                ///////////// Total Instrument //////////////////////
            
                $this->Quotation->updateAll(array('Quotation.total_inst'=>$this->request->data['total_inst']),array('Quotation.ref_no'=>$ref_no_old));
                $this->Salesorder->updateAll(array('Salesorder.total_inst'=>$this->request->data['total_inst']),array('Salesorder.ref_no'=>$ref_no_old));
                $this->Deliveryorder->updateAll(array('Deliveryorder.total_inst'=>$this->request->data['total_inst']),array('Deliveryorder.ref_no'=>$ref_no_old));

                ////////////////////////////////////////////////////
               // echo $j;
                if($count == $j && $ponumber_check == 1):
                    $this->Quotation->updateAll(array('Quotation.ref_no'=>'"'.$ponumbers.'"','Quotation.ref_count'=>'"'.$po_count.'"','Quotation.po_generate_type'=>'"Manual"','Quotation.is_assign_po'=>1),array('Quotation.ref_no'=>$ref_no_old));
                    $this->Salesorder->updateAll(array('Salesorder.ref_no'=>'"'.$ponumbers.'"','Salesorder.ref_count'=>'"'.$po_count.'"','Salesorder.po_generate_type'=>'"Manual"','Salesorder.is_assign_po'=>1),array('Salesorder.ref_no'=>$ref_no_old));
                    $this->Deliveryorder->updateAll(array('Deliveryorder.ref_no'=>'"'.$ponumbers.'"','Deliveryorder.ref_count'=>'"'.$po_count.'"','Deliveryorder.po_generate_type'=>'"Manual"','Deliveryorder.is_assignpo'=>1),array('Deliveryorder.ref_no'=>$ref_no_old));
                    $this->Session->setFlash(__('Purchase Order is Updated as Manual'));
                    
                    if($title_name == 'Approve'):
                        
                        $this->Quotation->updateAll(array('Quotation.is_poapproved'=>'1'),array('Quotation.quotationno'=>$quotationno));
                        $this->Salesorder->updateAll(array('Salesorder.is_poapproved'=>'1'),array('Salesorder.quotationno'=>$quotationno));
                        $this->Deliveryorder->updateAll(array('Deliveryorder.is_poapproved'=>'1'),array('Deliveryorder.quotationno'=>$quotationno));
                        // Log Activity Update
                        $this->Logactivity->updateAll(array('Logactivity.logapprove'=>2),array('Logactivity.logid'=>$quotationno,'Logactivity.logname'=>'ClientPO','Logactivity.logactivity'=>'Add'));
                        // Data Log
                        $this->Datalog->create();
                        $this->request->data['Datalog']['logname'] = 'ClientPO';
                        $this->request->data['Datalog']['logactivity'] = 'Approve';
                        $this->request->data['Datalog']['logid'] = $quotationno;
                        $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                        $this->Datalog->save($this->request->data['Datalog']);
                        
                        $this->Session->setFlash(__('Purchase Order Approved Successfully'));
                        if($ack_type == 2):
                            
                                $this->request->data['Logactivity']['logname'] = 'Invoice';
                                $this->request->data['Logactivity']['logactivity'] = 'Add';
                                $this->request->data['Logactivity']['logid'] = $id;
                                $this->request->data['Logactivity']['logno'] = $quotationno;
                                $this->request->data['Logactivity']['invoice_type_id'] = $invoice_type;
                                $this->request->data['Logactivity']['user_id'] = $this->Session->read('sess_userid');
                                $this->request->data['Logactivity']['logapprove'] = 1;
                                $this->Logactivity->create();
                                $this->Logactivity->save($this->request->data['Logactivity']);

                                $this->request->data['Datalog']['logname'] = 'Invoice';
                                $this->request->data['Datalog']['logactivity'] = 'Add';
                                $this->request->data['Datalog']['logid'] = $quotationno;
                                $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                                $this->Datalog->create();
                                $this->Datalog->save($this->request->data['Datalog']);
                            
                        endif;
                    endif;
                    
                else:
                    //$this->redirect(array('controller'=>'clientposapproval','action'=>'view','1'));
                    $this->Session->setFlash(__("Purchase Order Needs to match the Salesorder Instrument Count & Should not Contain 'CPO' in it"));
                endif;
            }
            /////////////////////////   Quotation Full Invoice  ////////////////////////////////////////////
            elseif($invoice_type == 2)
            {
                $quo_data = $this->Quotation->find('all',array('conditions'=>array('Quotation.quotationno'=>$quotationno,'Quotation.is_deleted'=>0,'Quotation.is_approved'=>1)));
                for($i=0;$i<count($quo_data);$i++)
                {
                   //pr($sales_data[$i]['Description']);
                   //echo count($sales_data[$i]['Description']);exit;
                   for($j=0;$j<count($quo_data[$i]['Device']);$j++)
                   {
                      //echo $j;
                   }
                }
               // echo $j;
                if($count == $j && $ponumber_check == 1):
                    $this->Quotation->updateAll(array('Quotation.ref_no'=>'"'.$ponumbers.'"','Quotation.ref_count'=>'"'.$po_count.'"','Quotation.po_generate_type'=>'"Manual"','Quotation.is_assign_po'=>1),array('Quotation.quotationno'=>$quotationno));
                    $this->Salesorder->updateAll(array('Salesorder.ref_no'=>'"'.$ponumbers.'"','Salesorder.ref_count'=>'"'.$po_count.'"','Salesorder.po_generate_type'=>'"Manual"','Salesorder.is_assign_po'=>1),array('Salesorder.quotationno'=>$quotationno));
                    $this->Deliveryorder->updateAll(array('Deliveryorder.ref_no'=>'"'.$ponumbers.'"','Deliveryorder.ref_count'=>'"'.$po_count.'"','Deliveryorder.po_generate_type'=>'"Manual"','Deliveryorder.is_assignpo'=>1),array('Deliveryorder.quotationno'=>$quotationno));
                    $this->Session->setFlash(__('Purchase Order is Updated as Manual'));
                    
                    if($title_name == 'Approve'):
                        $this->Quotation->updateAll(array('Quotation.is_poapproved'=>1),array('Quotation.quotationno'=>$quotationno));
                        $this->Salesorder->updateAll(array('Salesorder.is_poapproved'=>1),array('Salesorder.quotationno'=>$quotationno));
                        $this->Deliveryorder->updateAll(array('Deliveryorder.is_poapproved'=>1),array('Deliveryorder.quotationno'=>$quotationno));
                        // Log Activity Update
                        $this->Logactivity->updateAll(array('Logactivity.logapprove'=>2),array('Logactivity.logno'=>$quotationno,'Logactivity.logname'=>'ClientPO','Logactivity.logactivity'=>'Add'));
                        // Data Log
                        $this->Datalog->create();
                        $this->request->data['Datalog']['logname'] = 'ClientPO';
                        $this->request->data['Datalog']['logactivity'] = 'Approve';
                        $this->request->data['Datalog']['logid'] = $quotationno;
                        $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                        $this->Datalog->save($this->request->data['Datalog']);
                        
                        $this->Session->setFlash(__('Purchase Order Approved Successfully'));
                    endif;
                    
                else:
                    //$this->redirect(array('controller'=>'clientposapproval','action'=>'view','1'));
                    $this->Session->setFlash(__("Purchase Order Needs to match the Salesorder Instrument Count & Should not Contain 'CPO' in it"));
                endif;
            }
            /////////////////////////   SalesOrder Full Invoice  ////////////////////////////////////////////
            elseif($invoice_type == 3)
            {
                $sales = $this->request->data['salesorderid'];
                $sales_data = $this->Salesorder->find('first',array('conditions'=>array('Salesorder.id'=>$sales,'Salesorder.is_deleted'=>0,'Salesorder.is_approved'=>1)));
                $quo_data = $this->Quotation->find('all',array('conditions'=>array('Quotation.quotationno'=>$quotationno,'Quotation.is_deleted'=>0,'Quotation.is_approved'=>1)));
                
                $ack_type = $sales_data['Customer']['acknowledgement_type_id'];
                //pr($sales_data);exit;
//                for($i=0;$i<count($sales_data);$i++)
//                {
                   //pr($sales_data[$i]['Description']);
                   //echo count($sales_data[$i]['Description']);exit;
                   for($j=0;$j<count($sales_data['Description']);$j++)
                   {
                      //echo $j;
                   }
//                }
                //echo $j;exit;
                   //if()
                $this->Quotation->updateAll(array('Quotation.total_inst'=>$this->request->data['total_inst']),array('Quotation.quotationno'=>$quotationno));
                $this->Deliveryorder->updateAll(array('Deliveryorder.total_inst'=>$this->request['total_inst']),array('Deliveryorder.quotationno'=>$quotationno));
                $this->Salesorder->updateAll(array('Salesorder.total_inst'=>$this->request->data['total_inst']),array('Salesorder.quotationno'=>$quotationno));   
                   
                   
                   
                if($count == $j && $ponumber_check == 1):
                    
                    $this->Quotation->updateAll(array('Quotation.ref_no'=>'"'.$ponumbers.'"','Quotation.ref_count'=>'"'.$po_count.'"','Quotation.po_generate_type'=>'"Manual"','Quotation.is_assign_po'=>1),array('Quotation.quotationno'=>$quotationno));
                    $this->Deliveryorder->updateAll(array('Deliveryorder.ref_no'=>'"'.$ponumbers.'"','Deliveryorder.ref_count'=>'"'.$po_count.'"','Deliveryorder.po_generate_type'=>'"Manual"','Deliveryorder.is_assignpo'=>1),array('Deliveryorder.quotationno'=>$quotationno));
                    $this->Salesorder->updateAll(array('Salesorder.ref_no'=>'"'.$ponumbers.'"','Salesorder.ref_count'=>'"'.$po_count.'"','Salesorder.po_generate_type'=>'"Manual"','Salesorder.is_assign_po'=>1),array('Salesorder.quotationno'=>$quotationno));
                    
                    $this->Session->setFlash(__('Purchase Order is Updated as Manual'));
                     
                    if($title_name == 'Approve'):
                        $this->Quotation->updateAll(array('Quotation.is_poapproved'=>1),array('Quotation.quotationno'=>$quotationno));
                        $this->Salesorder->updateAll(array('Salesorder.is_poapproved'=>1),array('Salesorder.quotationno'=>$quotationno));
                        $this->Deliveryorder->updateAll(array('Deliveryorder.is_poapproved'=>1),array('Deliveryorder.quotationno'=>$quotationno));
                        // Log Activity Update
                        $this->Logactivity->updateAll(array('Logactivity.logapprove'=>2),array('Logactivity.logid'=>$quotationno,'Logactivity.logname'=>'ClientPO','Logactivity.logactivity'=>'Add'));
                        // Data Log
                        $this->Datalog->create();
                        $this->request->data['Datalog']['logname'] = 'ClientPO';
                        $this->request->data['Datalog']['logactivity'] = 'Approve';
                        $this->request->data['Datalog']['logid'] = $quotationno;
                        $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                        $this->Datalog->save($this->request->data['Datalog']);
                        
                        $this->Session->setFlash(__('Purchase Order Approved Successfully'));
                        if($ack_type == 2):
                            
                                $this->request->data['Logactivity']['logname'] = 'Invoice';
                                $this->request->data['Logactivity']['logactivity'] = 'Add';
                                $this->request->data['Logactivity']['logid'] = $id;
                                $this->request->data['Logactivity']['logno'] = $quotationno;
                                $this->request->data['Logactivity']['invoice_type_id'] = $invoice_type;
                                $this->request->data['Logactivity']['user_id'] = $this->Session->read('sess_userid');
                                $this->request->data['Logactivity']['logapprove'] = 1;
                                $this->Logactivity->create();
                                $this->Logactivity->save($this->request->data['Logactivity']);

                                $this->request->data['Datalog']['logname'] = 'Invoice';
                                $this->request->data['Datalog']['logactivity'] = 'Add';
                                $this->request->data['Datalog']['logid'] = $quotationno;
                                $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                                $this->Datalog->create();
                                $this->Datalog->save($this->request->data['Datalog']);
                            
                        endif;
                    endif;
                    
                else:
                    //$this->redirect(array('controller'=>'clientposapproval','action'=>'view','1'));
                    $this->Session->setFlash(__("Purchase Order Needs to match the Salesorder Instrument Count & Should not Contain 'CPO' in it"));
                endif;
            }
            /////////////////////////   Delivery Order Full Invoice  ////////////////////////////////////////////
            elseif($invoice_type == 4)
            {
               $deliver_data = $this->Deliveryorder->find('all',array('conditions'=>array('Deliveryorder.quotationno'=>$quotationno,'Deliveryorder.is_deleted'=>0,'Deliveryorder.is_approved'=>0)));
                for($i=0;$i<count($deliver_data);$i++)
                {
                   //pr($sales_data[$i]['Description']);
                   //echo count($sales_data[$i]['Description']);exit;
                   for($j=0;$j<count($deliver_data[$i]['DelDescription']);$j++)
                   {
                      //echo $j;
                   }
                }
               if($count == $j && $ponumber_check == 1):
                    
                    $this->Quotation->updateAll(array('Quotation.ref_no'=>'"'.$ponumbers.'"','Quotation.ref_count'=>'"'.$po_count.'"','Quotation.po_generate_type'=>'"Manual"','Quotation.is_assign_po'=>1),array('Quotation.quotationno'=>$quotationno));
                    $this->Deliveryorder->updateAll(array('Deliveryorder.ref_no'=>'"'.$ponumbers.'"','Deliveryorder.ref_count'=>'"'.$po_count.'"','Deliveryorder.po_generate_type'=>'"Manual"','Deliveryorder.is_assignpo'=>1),array('Deliveryorder.quotationno'=>$quotationno));
                    $this->Salesorder->updateAll(array('Salesorder.ref_no'=>'"'.$ponumbers.'"','Salesorder.ref_count'=>'"'.$po_count.'"','Salesorder.po_generate_type'=>'"Manual"','Salesorder.is_assign_po'=>1),array('Salesorder.quotationno'=>$quotationno));
                    
                    $this->Session->setFlash(__('Purchase Order is Updated as Manual'));
                    
                    if($title_name == 'Approve'):
                        $this->Quotation->updateAll(array('Quotation.is_poapproved'=>1),array('Quotation.quotationno'=>$quotationno));
                        $this->Salesorder->updateAll(array('Salesorder.is_poapproved'=>1),array('Salesorder.quotationno'=>$quotationno));
                        $this->Deliveryorder->updateAll(array('Deliveryorder.is_poapproved'=>1),array('Deliveryorder.quotationno'=>$quotationno));
                        // Log Activity Update
                        $this->Logactivity->updateAll(array('Logactivity.logapprove'=>2),array('Logactivity.logid'=>$quotationno,'Logactivity.logname'=>'ClientPO','Logactivity.logactivity'=>'Add'));
                        // Data Log
                        $this->Datalog->create();
                        $this->request->data['Datalog']['logname'] = 'ClientPO';
                        $this->request->data['Datalog']['logactivity'] = 'Approve';
                        $this->request->data['Datalog']['logid'] = $quotationno;
                        $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                        $this->Datalog->save($this->request->data['Datalog']);
                        
                        $this->Session->setFlash(__('Purchase Order Approved Successfully'));
                    endif;
                    
                else:
                    //$this->redirect(array('controller'=>'clientposapproval','action'=>'view','1'));
                    $this->Session->setFlash(__("Purchase Order Needs to match the Salesorder Instrument Count & Should not Contain 'CPO' in it"));
                endif;
            }
        }
    }
    
     public function calendar()
        {
            $this->autoRender = false;
            $cal = $this->Quotation->find('all', array('conditions' => array('Quotation.po_generate_type'=>'Manual','Quotation.is_assign_po'=>1,'Quotation.is_deleted'=>0,'Quotation.is_poapproved'=>1), 'group' => 'po_approval_date', 'fields' => array('count(Quotation.po_approval_date) as title', 'po_approval_date as start'), 'recursive' => '-1'));

            $event_array = array();
            foreach ($cal as $cal_list => $v) {

                $event_array[$cal_list]['title'] = $v[0]['title'];
                $event_array[$cal_list]['start'] = $v['Quotation']['start'];
            }
            return json_encode($event_array);

        }
        
}
