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

    public function index() {

        //$this->Quotation->recursive = 1; 
        $quotation_list_bybeforedo = $this->Quotation->find('all', array('conditions' => array('Quotation.is_deleted' => '0','Customer.acknowledgement_type_id'=>1), 'order' => array('Quotation.id' => 'DESC')));
        $quotation_lists_bybeforeinvoice = $this->Quotation->find('all', array('conditions' => array('Quotation.is_deleted' => '0','Customer.acknowledgement_type_id'=>2), 'order' => array('Quotation.id' => 'DESC')));
        $this->set(compact('quotation_list_bybeforedo','quotation_lists_bybeforeinvoice'));
    }
    public function view() 
    {
        $this->layout   =   'ajax';
        $q_id =  $this->request->data['q_id'];
        $data = $this->Quotation->find('first',array('conditions'=>array('Quotation.id'=>$q_id,'Quotation.is_deleted'=>0),'recursive'=>3));
        
        $sales_data = $this->Salesorder->find('all',array('conditions'=>array('Salesorder.quotation_id'=>$q_id,'Salesorder.is_deleted'=>0),'fields'=>array('salesorderno')));
        $delivery_order =   array();$sales_order =   array();
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
                $po_data_array  = $this->Poinvoice->find('first',array('conditions'=>array('Poinvoice.track_id'=>$data['Quotation']['track_id'])));
                if($po_data_array=='')
                {
                    $po_data_array  = $this->Poinvoice->updateAll(array('conditions'=>array('Poinvoice.track_id'=>$data['Quotation']['track_id'])));
                }
                else
                {
               // pr($po_data_array);
                //exit;
                $pos    =   array($po_data_array['poinvoice']['clientpo_number']=>$po_data_array['Poinvoice']['po_count']);
                $this->set('pos',$pos);
                }
                break;
            case 2:
                $qo_data_array  = $this->Qoinvoice->find('first',array('conditions'=>array('Qoinvoice.track_id'=>$data['Quotation']['track_id'])));  
                $quotation_data =   $qo_data_array['Qoinvoice']['quotation_data'];
                $qos    = unserialize($quotation_data);
                $pos    =   $qos['Clientpo']['Purchaseorder'];
                $this->set('pos',$pos);
                break;
            case 3:
                $po_data_array  = $this->Soinvoice->find('first',array('conditions'=>array('Soinvoice.track_id'=>$data['Quotation']['track_id'])));  
                $so_data =   $po_data_array['Soinvoice']['salesorder_data'];
                $sos    = unserialize($so_data);
                $pos    =   $sos['Clientpo']['Purchaseorder'];
                $this->set('pos',$pos);
                break;
            case 4:
                $po_data_array  = $this->Doinvoice->find('first',array('conditions'=>array('Doinvoice.track_id'=>$data['Quotation']['track_id'])));  
                if(!empty($po_data_array)):
                $do_data =   $po_data_array['Doinvoice']['deliveryorder_data'];
                $dos    = unserialize($do_data);
                $pos    =   $dos['Clientpo']['Purchaseorder'];
                $this->set('pos',$pos);
                endif;
                break;
        }
      
    }
    public function quotation_po_update()
    {
        if($this->request->is('post')){
            
            if(!empty($this->request->data['ponumber'])&&!empty($this->request->data['pocount'])):
            $po_array   =   $this->request->data['ponumber'];
            $ponumbers  =   implode($this->request->data['ponumber'],',');
            $po_count   =   $this->request->data['pocount'];
            $po_list_merge    = array_merge($po_array,$po_count);
            endif;
            $po_array   =   $this->request->data['ponumber'];
            $ponumbers  =   implode($this->request->data['ponumber'],',');
            $quotationno    =   $this->request->data['quotationno'];
            
            if($this->Quotation->updateAll(array('Quotation.ref_no'=>'"'.$ponumbers.'"','Quotation.po_generate_type'=>'"Manual"','Quotation.is_assign_po'=>1),array('Quotation.quotationno'=>$quotationno))):
               // $this->Salesorder->updateAll(array('Salesorder.ref_no'=>'"'.$ponumbers.'"','Salesorder.po_generate_type'=>'"Manual"','Salesorder.is_assign_po'=>1),array('Quotation.quotationno'=>$quotationno));
                 $data = $this->Quotation->find('first',array('conditions'=>array('Quotation.quotationno'=>$quotationno,'Quotation.is_deleted'=>0),'recursive'=>3));
                 switch($data['Customer']['invoice_type_id'])
                 {
                    case 1:
                        $po_data_array  = $this->Poinvoice->updateAll(array('Poinvoice.clientpo_number'=>'"'.$po_array[0].'"','Poinvoice.po_count'=>$po_count[0]),array('Poinvoice.track_id'=>$data['Quotation']['track_id']));  
                        break;
                    case 2:
                        $qo_data_array  = $this->Qoinvoice->find('first',array('conditions'=>array('Qoinvoice.track_id'=>$data['Quotation']['track_id'])));  
                        $quotation_data =   $qo_data_array['Qoinvoice']['quotation_data'];
                        $qos    = unserialize($quotation_data);
                        unset( $qos['Clientpo']['Purchaseorder']);
                        $qos['Clientpo']['Purchaseorder']   =   $po_list_merge;
                        $data_list_for_po   = serialize($qos);
                        $this->Qoinvoice->updateAll(array('Qoinvoice.quotation_data'=>'"'.$data_list_for_po."'"),array('Qoinvoice.track_id'=>$data['Quotation']['track_id']));  
                        break;
                    case 3:
                        $po_data_array  = $this->Soinvoice->find('first',array('conditions'=>array('Soinvoice.track_id'=>$data['Quotation']['track_id'])));  
                        $so_data =   $po_data_array['Soinvoice']['salesorder_data'];
                        $sos    = unserialize($so_data);
                        unset( $sos['Clientpo']['Purchaseorder']);
                        $sos['Clientpo']['Purchaseorder']   =   $po_list_merge;
                        $data_list_for_so   = serialize($sos);
                        $this->Soinvoice->updateAll(array('Soinvoice.salesorder_data'=>'"'.$data_list_for_so.'"'),array('Soinvoice.track_id'=>$data['Quotation']['track_id']));  
                        break;
                    case 4:
                        $po_data_array  = $this->Doinvoice->find('first',array('conditions'=>array('Doinvoice.track_id'=>$data['Quotation']['track_id'])));  
                        if(!empty($po_data_array)):
                        $do_data =   $po_data_array['Doinvoice']['deliveryorder_data'];
                        $dos    = unserialize($do_data);
                        unset( $dos['Clientpo']['Purchaseorder']);
                        $dos['Clientpo']['Purchaseorder']   =   $po_list_merge;
                        $data_list_for_do   = serialize($dos);
                        $this->Soinvoice->updateAll(array('Soinvoice.salesorder_data'=>'"'.$data_list_for_do.'"'),array('Soinvoice.track_id'=>$data['Quotation']['track_id']));  
                        endif;
                        break;
                    }
                /******************
                * Data Log
                */
                    $this->request->data['Logactivity']['logname'] = 'Quotation';
                    $this->request->data['Logactivity']['logactivity'] = 'Manual PO';
                    $this->request->data['Logactivity']['logid'] = $quotationno;
                    $this->request->data['Logactivity']['user_id'] = $this->Session->read('sess_userid');
                    $this->request->data['Logactivity']['logapprove'] = 1;
                    $a = $this->Logactivity->save($this->request->data['Logactivity']);
                /******************/
                $this->redirect(array('controller'=>'clientposapproval','action'=>'index'));
            endif;
        }
    }
}
