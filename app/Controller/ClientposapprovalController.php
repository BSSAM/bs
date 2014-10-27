<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class ClientposapprovalController extends AppController {

    public $helpers = array('Html', 'Form', 'Session');
    public $uses = array('Priority', 'Paymentterm', 'Quotation', 'Currency', 'Salesorder', 'Deliveryorder','Logactivity',
        'Qoinvoice','Soinvoice','Doinvoice','Poinvoice',
        'Country', 'Additionalcharge', 'Service', 'CustomerInstrument', 'Customerspecialneed',
        'Instrument', 'Brand', 'Customer', 'Device', 'Unit', 'Logactivity', 'InstrumentType','Poinvoice',
        'Contactpersoninfo', 'CusSalesperson', 'Clientpo');

    public function index() 
    {
        //$this->Quotation->recursive = 1;
//        if($user_role['app_clientpo']['view'] == 0){ 
//         return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
//        }
        $quotation_list_bybeforedo = $this->Quotation->find('all', array('conditions' => array('Quotation.is_deleted' =>0,'Customer.acknowledgement_type_id'=>1,'Quotation.is_approved' =>1,'Quotation.is_deliveryorder_created'=>1), 'order' => array('Quotation.id' => 'DESC')));
        //pr($quotation_list_bybeforedo);exit;
        $quotation_lists_bybeforeinvoice = $this->Quotation->find('all', array('conditions' => array('Quotation.is_deleted' =>0,'Customer.acknowledgement_type_id'=>2,'Quotation.is_approved' =>1,'Quotation.is_invoice_created'=>1), 'order' => array('Quotation.id' => 'DESC')));
        $this->set(compact('quotation_list_bybeforedo','quotation_lists_bybeforeinvoice'));
    }
    public function view($id = NULL) 
    {
        
        $this->layout   =   'ajax';
        $q_id =  $this->request->data['q_id'];
        $data = $this->Quotation->find('first',array('conditions'=>array('Quotation.id'=>$q_id,'Quotation.is_deleted'=>0,'Quotation.is_approved'=>1),'recursive'=>3));
        //pr($data);exit;
        $sales_data = $this->Salesorder->find('all',array('conditions'=>array('Salesorder.quotation_id'=>$q_id,'Salesorder.is_deleted'=>0),'fields'=>array('salesorderno')));
        //pr($sales_data['Salesorder']['is_deliveryorder_created']);exit;
        $delivery_order =   array();
        $sales_order =   array();
        foreach($sales_data as $sale):
            $sales_order['Salesorder'][]=$sale['Salesorder']['id'];
            $delivery_orders    =   $this->Deliveryorder->find('all',array('conditions'=>array('Deliveryorder.salesorder_id'=>$sale['Salesorder']['id'],'Deliveryorder.is_deleted'=>0),'fields'=>array('delivery_order_no')));
            foreach($delivery_orders as $delivery):
                $delivery_order['Deliveryorder'][]=   $delivery['Deliveryorder']['delivery_order_no'];
            endforeach;
        endforeach;
        $quotation_data = array_merge($delivery_order,$sales_order);
       
        $this->set('type_id',$data['Customer']['invoice_type_id']);
        $this->set('quotation_data',$quotation_data);
        
        $track_id=$this->random('track');
        $this->set(compact('data','track_id'));
        //pr($data);exit;
        switch($data['Customer']['invoice_type_id'])
        {
            case 1:
                //echo $data['Quotation']['ref_no'];
                $this->set('pos',$data['Quotation']['ref_no']);
                $this->set('pos_count',$data['Quotation']['ref_count']);
                //pr($data['Quotation']['ref_count']);
                //pr($data['Quotation']['ref_no']);
                //$this->set('pos',$data['Quotation']['ref_no']);
//                $po_data_array  = $this->Poinvoice->find('first',array('conditions'=>array('Poinvoice.track_id'=>$data['Quotation']['track_id'])));
//                if($po_data_array=='')
//                {
//                    $po_data_array  = $this->Poinvoice->updateAll(array('conditions'=>array('Poinvoice.track_id'=>$data['Quotation']['track_id'])));
//                }
//                else
//                {
//               // pr($po_data_array);
//                //exit;
//                $pos    =   array($po_data_array['poinvoice']['clientpo_number']=>$po_data_array['Poinvoice']['po_count']);
//                $this->set('pos',$pos);
//                }
                break;
            case 2:
                $this->set('pos',$data['Quotation']['ref_no']);
                $this->set('pos_count',$data['Quotation']['ref_count']);
                //pr($data['Quotation']['ref_count']);
                //pr($data['Quotation']['ref_no']);
//                $qo_data_array  = $this->Qoinvoice->find('first',array('conditions'=>array('Qoinvoice.track_id'=>$data['Quotation']['track_id'])));  
//                $quotation_data =   $qo_data_array['Qoinvoice']['quotation_data'];
//                $qos    = unserialize($quotation_data);
//                $pos    =   $qos['Clientpo']['Purchaseorder'];
//                $this->set('pos',$pos);
                break;
            case 3:
                $this->set('pos',$data['Quotation']['ref_no']);
                $this->set('pos_count',$data['Quotation']['ref_count']);
                //pr($data['Quotation']['ref_count']);
                //pr($data['Quotation']['ref_no']);
//                $po_data_array  = $this->Soinvoice->find('first',array('conditions'=>array('Soinvoice.track_id'=>$data['Quotation']['track_id'])));  
//                $so_data =   $po_data_array['Soinvoice']['salesorder_data'];
//                $sos    = unserialize($so_data);
//                $pos    =   $sos['Clientpo']['Purchaseorder'];
//                $this->set('pos',$pos);
                break;
            case 4:
                $this->set('pos',$data['Quotation']['ref_no']);
                $this->set('pos_count',$data['Quotation']['ref_count']);
                //pr($data['Quotation']['ref_count']);
                //pr($data['Quotation']['ref_no']);
//                $po_data_array  = $this->Doinvoice->find('first',array('conditions'=>array('Doinvoice.track_id'=>$data['Quotation']['track_id'])));  
//                if(!empty($po_data_array)):
//                $do_data =   $po_data_array['Doinvoice']['deliveryorder_data'];
//                $dos    = unserialize($do_data);
//                $pos    =   $dos['Clientpo']['Purchaseorder'];
//                $this->set('pos',$pos);
//                endif;
                break;
        }
      
      
    }
    public function quotation_po_update()
    {
        $this->autoRender=false;
        if($this->request->is('post')){
            
//            if(!empty($this->request->data['ponumber'])&&!empty($this->request->data['pocount'])):
//            $po_array   =   $this->request->data['ponumber'];
//            $ponumbers  =   implode($this->request->data['ponumber'],',');
//            $po_count   =   $this->request->data['pocount'];
//            $po_list_merge    = array_merge($po_array,$po_count);
//            endif;
            function sum($carry, $item)
            {
            $carry += $item;
            return $carry;
            }
            $po_array   =   $this->request->data['ponumber'];
            $ponumbers  =   implode($this->request->data['ponumber'],',');
            
            $po_count  =   implode($this->request->data['pocount'],',');
            $count = array_reduce($this->request->data['pocount'], "sum");
            //echo join(' and ', array_filter(array_merge(array(join(', ', array_slice($po_count, 0, -1))), array_slice($po_count, -1))));
            //$count = explode($po_count,',');
            //$count = $this->request->data['pocount'];
            //pr($po_count);
            //$po_count += $po_count;
            //echo $po_count;
            $quotationno    =   $this->request->data['quotationno'];
            $Find_po_count_satisfied = $this->Quotation->find('first',array('conditions'=>array('Quotation.quotationno'=>$quotationno,'Quotation.is_deleted'=>0,'Quotation.is_approved'=>1),'recursive'=>3));
            
            $invoice_type = $Find_po_count_satisfied['Customer']['invoice_type_id'];
           //pr($invoice_type);
           //
           //
           //
           /////////////////////////   Purchase Order Full Invoice  ////////////////////////////////////////////
            if($invoice_type == 1)
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
                if($count == $j):
                    if($this->Quotation->updateAll(array('Quotation.ref_no'=>'"'.$ponumbers.'"','Quotation.ref_count'=>'"'.$po_count.'"','Quotation.po_generate_type'=>'"Manual"','Quotation.is_assign_po'=>1),array('Quotation.quotationno'=>$quotationno))):
                        $data = $this->Quotation->find('first',array('conditions'=>array('Quotation.quotationno'=>$quotationno,'Quotation.po_generate_type'=>'Manual','Quotation.is_assign_po'=>1,'Quotation.is_deleted'=>0,'Quotation.is_approved'=>1),'recursive'=>3));
                        if($data['Quotation']['is_poapproved']==0):
                            $data = $this->Logactivity->find('first',array('conditions'=>array('Logactivity.logid'=>$quotationno,'Logactivity.logname'=>'ClientPO','Logactivity.logactivity'=>'Add','Logactivity.logapprove'=>1)));
                            if($data == ''):
                            $this->request->data['Logactivity']['logname'] = 'ClientPO';
                            $this->request->data['Logactivity']['logactivity'] = 'Add';
                            $this->request->data['Logactivity']['logid'] = $quotationno;
                            $this->request->data['Logactivity']['user_id'] = $this->Session->read('sess_userid');
                            $this->request->data['Logactivity']['logapprove'] = 1;
                            $a = $this->Logactivity->save($this->request->data['Logactivity']);
                            endif;
                            /******************/
                        endif;
                    
                    endif;
                    
                    $this->Session->setFlash(__('Purchase Order is Updated'));
                else:
                    //$this->redirect(array('controller'=>'clientposapproval','action'=>'view','1'));
                    $this->Session->setFlash(__('Purchase Order Needs to match the Salesorder Instrument Count'));
                endif;
            }
            /////////////////////////   Quotation Full Invoice  ////////////////////////////////////////////
            elseif($invoice_type == 2)
            {
                if($this->Quotation->updateAll(array('Quotation.ref_no'=>'"'.$ponumbers.'"','Quotation.ref_count'=>'"'.$po_count.'"','Quotation.po_generate_type'=>'"Manual"','Quotation.is_assign_po'=>1),array('Quotation.quotationno'=>$quotationno))):
                    $data = $this->Quotation->find('first',array('conditions'=>array('Quotation.quotationno'=>$quotationno,'Quotation.po_generate_type'=>'Manual','Quotation.is_assign_po'=>1,'Quotation.is_deleted'=>0,'Quotation.is_approved'=>1),'recursive'=>3));
                    if($data['Quotation']['is_poapproved']==0):
                        $data = $this->Logactivity->find('first',array('conditions'=>array('Logactivity.logid'=>$quotationno,'Logactivity.logname'=>'ClientPO','Logactivity.logactivity'=>'Add','Logactivity.logapprove'=>1)));
                        if($data == ''):
                        $this->request->data['Logactivity']['logname'] = 'ClientPO';
                        $this->request->data['Logactivity']['logactivity'] = 'Add';
                        $this->request->data['Logactivity']['logid'] = $quotationno;
                        $this->request->data['Logactivity']['user_id'] = $this->Session->read('sess_userid');
                        $this->request->data['Logactivity']['logapprove'] = 1;
                        $a = $this->Logactivity->save($this->request->data['Logactivity']);
                        endif;
                        /******************/
                    endif;
                endif;
                $this->Session->setFlash(__('Purchase Order is Updated'));
            }
            /////////////////////////   SalesOrder Full Invoice  ////////////////////////////////////////////
            elseif($invoice_type == 3)
            {
                //BSTRA-01-10000009
                $sales_data = $this->Salesorder->find('all',array('conditions'=>array('Salesorder.quotationno'=>$quotationno,'Salesorder.is_deleted'=>0,'Salesorder.is_approved'=>1)));
                //pr($sales_data);exit;
                for($i=0;$i<count($sales_data);$i++)
                {
                   //pr($sales_data[$i]['Description']);
                   //echo count($sales_data[$i]['Description']);exit;
                   for($j=0;$j<count($sales_data[$i]['Description']);$j++)
                   {
                      //echo $j;
                   }
                }
                //echo $j;exit;
                if($count == $j):
                    if($this->Quotation->updateAll(array('Quotation.ref_no'=>'"'.$ponumbers.'"','Quotation.ref_count'=>'"'.$po_count.'"','Quotation.po_generate_type'=>'"Manual"','Quotation.is_assign_po'=>1),array('Quotation.quotationno'=>$quotationno))):
                        $this->Deliveryorder->updateAll(array('Deliveryorder.ref_no'=>'"'.$ponumbers.'"','Deliveryorder.ref_count'=>'"'.$po_count.'"','Deliveryorder.po_generate_type'=>'"Manual"','Deliveryorder.is_assignpo'=>1),array('Deliveryorder.quotationno'=>$quotationno));
                        $data = $this->Quotation->find('first',array('conditions'=>array('Quotation.quotationno'=>$quotationno,'Quotation.po_generate_type'=>'Manual','Quotation.is_assign_po'=>1,'Quotation.is_deleted'=>0,'Quotation.is_approved'=>1),'recursive'=>3));
                    //echo $data['Quotation']['is_poapproved']; exit;
                        if($data['Quotation']['is_poapproved']==0):
                            $data = $this->Logactivity->find('first',array('conditions'=>array('Logactivity.logid'=>$quotationno,'Logactivity.logname'=>'ClientPO','Logactivity.logactivity'=>'Add','Logactivity.logapprove'=>1)));
                       //pr($data);exit;
                            if(!$data):
                            $this->request->data['Logactivity']['logname'] = 'ClientPO';
                            $this->request->data['Logactivity']['logactivity'] = 'Add';
                            $this->request->data['Logactivity']['logid'] = $quotationno;
                            $this->request->data['Logactivity']['user_id'] = $this->Session->read('sess_userid');
                            $this->request->data['Logactivity']['logapprove'] = 1;
                            //pr($this->request->data['Logactivity']);exit;
                            //$this->Logactivity->create();
                            $this->Logactivity->save($this->request->data['Logactivity']);
                            //pr($a);
                            endif;
                            /******************/
                        endif;
                    
                    endif;
                    
                    $this->Session->setFlash(__('Purchase Order is Updated'));
                else:
                    //$this->redirect(array('controller'=>'clientposapproval','action'=>'view','1'));
                    $this->Session->setFlash(__('Purchase Order Needs to match the Salesorder Instrument Count'));
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
               // echo $j;
                if($count == $j):
                    if($this->Quotation->updateAll(array('Quotation.ref_no'=>'"'.$ponumbers.'"','Quotation.ref_count'=>'"'.$po_count.'"','Quotation.po_generate_type'=>'"Manual"','Quotation.is_assign_po'=>1),array('Quotation.quotationno'=>$quotationno))):
                        $data = $this->Quotation->find('first',array('conditions'=>array('Quotation.quotationno'=>$quotationno,'Quotation.po_generate_type'=>'Manual','Quotation.is_assign_po'=>1,'Quotation.is_deleted'=>0,'Quotation.is_approved'=>1),'recursive'=>3));
                        if($data['Quotation']['is_poapproved']==0):
                            $data = $this->Logactivity->find('first',array('conditions'=>array('Logactivity.logid'=>$quotationno,'Logactivity.logname'=>'ClientPO','Logactivity.logactivity'=>'Add','Logactivity.logapprove'=>1)));
                            if($data == ''):
                            $this->request->data['Logactivity']['logname'] = 'ClientPO';
                            $this->request->data['Logactivity']['logactivity'] = 'Add';
                            $this->request->data['Logactivity']['logid'] = $quotationno;
                            $this->request->data['Logactivity']['user_id'] = $this->Session->read('sess_userid');
                            $this->request->data['Logactivity']['logapprove'] = 1;
                            $a = $this->Logactivity->save($this->request->data['Logactivity']);
                            endif;
                            /******************/
                        endif;
                    
                    endif;
                    
                    $this->Session->setFlash(__('Purchase Order is Updated'));
                else:
                    //$this->redirect(array('controller'=>'clientposapproval','action'=>'view','1'));
                    $this->Session->setFlash(__('Purchase Order Needs to match the Salesorder Instrument Count'));
                endif;
            }
           
           //exit;
            
                
                //,'Quotation.po_approval_date'=>date('Y-m-d')
               // $this->Salesorder->updateAll(array('Salesorder.ref_no'=>'"'.$ponumbers.'"','Salesorder.po_generate_type'=>'"Manual"','Salesorder.is_assign_po'=>1),array('Quotation.quotationno'=>$quotationno));
//                 $data = $this->Quotation->find('first',array('conditions'=>array('Quotation.quotationno'=>$quotationno,'Quotation.is_deleted'=>0),'recursive'=>3));
//                 switch($data['Customer']['invoice_type_id'])
//                 {
//                    case 1:
//                        $po_data_array  = $this->Poinvoice->updateAll(array('Poinvoice.clientpo_number'=>'"'.$po_array[0].'"','Poinvoice.po_count'=>$po_count[0]),array('Poinvoice.track_id'=>$data['Quotation']['track_id']));  
//                        break;
//                    case 2:
//                        $qo_data_array  = $this->Qoinvoice->find('first',array('conditions'=>array('Qoinvoice.track_id'=>$data['Quotation']['track_id'])));  
//                        $quotation_data =   $qo_data_array['Qoinvoice']['quotation_data'];
//                        $qos    = unserialize($quotation_data);
//                        unset( $qos['Clientpo']['Purchaseorder']);
//                        $qos['Clientpo']['Purchaseorder']   =   $po_list_merge;
//                        $data_list_for_po   = serialize($qos);
//                        $this->Qoinvoice->updateAll(array('Qoinvoice.quotation_data'=>'"'.$data_list_for_po."'"),array('Qoinvoice.track_id'=>$data['Quotation']['track_id']));  
//                        break;
//                    case 3:
//                        $po_data_array  = $this->Soinvoice->find('first',array('conditions'=>array('Soinvoice.track_id'=>$data['Quotation']['track_id'])));  
//                        $so_data =   $po_data_array['Soinvoice']['salesorder_data'];
//                        $sos    = unserialize($so_data);
//                        unset( $sos['Clientpo']['Purchaseorder']);
//                        $sos['Clientpo']['Purchaseorder']   =   $po_list_merge;
//                        $data_list_for_so   = serialize($sos);
//                        $this->Soinvoice->updateAll(array('Soinvoice.salesorder_data'=>'"'.$data_list_for_so.'"'),array('Soinvoice.track_id'=>$data['Quotation']['track_id']));  
//                        break;
//                    case 4:
//                        $po_data_array  = $this->Doinvoice->find('first',array('conditions'=>array('Doinvoice.track_id'=>$data['Quotation']['track_id'])));  
//                        if(!empty($po_data_array)):
//                        $do_data =   $po_data_array['Doinvoice']['deliveryorder_data'];
//                        $dos    = unserialize($do_data);
//                        unset( $dos['Clientpo']['Purchaseorder']);
//                        $dos['Clientpo']['Purchaseorder']   =   $po_list_merge;
//                        $data_list_for_do   = serialize($dos);
//                        $this->Soinvoice->updateAll(array('Soinvoice.salesorder_data'=>'"'.$data_list_for_do.'"'),array('Soinvoice.track_id'=>$data['Quotation']['track_id']));  
//                        endif;
//                        break;
//                    }
                /******************
                * Data Log
                */
               
                
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
