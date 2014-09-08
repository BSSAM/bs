<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class ClientposController extends AppController
{
    public $helpers = array('Html','Form','Session');
    public $uses =array('Priority','Paymentterm','Quotation','Currency','Salesorder','Deliveryorder','Poinvoice','Podata','Doinvoice','Dodata','Soinvoice','Sodata','Qoinvoice','Qodata',
                            'Country','Additionalcharge','Service','CustomerInstrument','Customerspecialneed','Logactivity','Datalog',
                            'Instrument','Brand','Customer','Device','Unit','Logactivity','InstrumentType',
                            'Contactpersoninfo','CusSalesperson','Clientpo');
    public function index()
    {
        $clientpo    =   $this->Customer->find('all',array('conditions'=>array('Customer.status'=>1,'Customer.is_deleted'=>0,'Customer.is_approved'=>1)));
        //pr($clientpo);exit;
        $this->set(compact('clientpo'));
    }
    public function Quotation_fullinvoice($id = null)
    {
        
          $customer_quotation_list=$this->Quotation->find('list',array('conditions'=>
                        array('Quotation.customer_id'=>$id,'Quotation.is_approved'=>1),'fields'=>array('id','quotationno')));
          $quotation_list    =   $this->Quotation->find('all',array('conditions'=>
                        array('Quotation.customer_id'=>$id,'Quotation.is_approved'=>1,'Quotation.is_deleted'=>0,'Quotation.is_assign_po'=>0)));
            if(count($quotation_list)==0){
             $this->Session->setFlash('No Quotation found to assign PO for Customer '.$id);
            $this->redirect(array('controller'=>'Clientpos','action'=>'index'));
            } 
          $track_id=$this->random('track');
          $po_list=$this->Clientpo->find('all',array('conditions'=>array('Clientpo.customer_id'=>$id)));
          $po_single=$this->Clientpo->find('first',array('conditions'=>array('Clientpo.customer_id'=>$id)));
          $this->set(compact('po_list','customer_quotation_list','po_single','track_id'));
          if($this->request->is(array('post','put')))
          {
              
             
              if(!empty($this->request->data['clientpos_id'])&& !empty($this->request->data['po_quantity'])):
                $po_number_array    =   $this->request->data['clientpos_id'];
                $imploded_po        =   implode(',',$po_number_array);
                $po_count_array     =   $this->request->data['po_quantity'];
                $imploded_po_count  =   implode(',',$po_count_array);
                $qo_array['Clientpo']['Purchaseorder']           =   array_combine($po_number_array,$po_count_array);
              endif;
             
              if ($this->request->data['quotation_no'] != '' &&$this->request->data['quo_quantity'] != ''):
                $qo_id_array = $this->request->data['quotation_no'];
                $qo_count_array = $this->request->data['quo_quantity'];
                $qo_array['Clientpo']['Quotation'] = array($qo_id_array => $qo_count_array);
                foreach ($qo_array['Clientpo']['Quotation'] as $qokey => $qocount) {
                    $this->Quotation->updateAll(array('Quotation.track_id'=>'"'.$this->request->data['track_id'].'"','Quotation.ref_count'=>'"'.$imploded_po_count.'"','Quotation.ref_no'=>'"'.$imploded_po.'"','Quotation.po_generate_type'=>'"Manual"','Quotation.is_assign_po'=>1,'Quotation.is_pocount_satisfied'=>1),array('Quotation.quotationno'=>$qokey));
                        //For data  log and log activity
                        $this->Logactivity->create();
                        $this->request->data['Logactivity']['logname'] = 'ClientPO';
                        $this->request->data['Logactivity']['logactivity'] = 'Add';
                        $this->request->data['Logactivity']['logid'] = $qokey;
                        $this->request->data['Logactivity']['user_id'] = $this->Session->read('sess_userid');
                        $this->request->data['Logactivity']['logapprove'] = 0;
                        $this->Logactivity->save($this->request->data['Logactivity']);
                        
                        //For data log
                        $this->Datalog->create();
                        $this->request->data['Datalog']['logname'] = 'ClientPO';
                        $this->request->data['Datalog']['logactivity'] = 'Add';
                        $this->request->data['Datalog']['logid'] = $qokey;
                        $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                        $this->Datalog->save($this->request->data['Datalog']);
                    
                }
            endif;
                //For Salesorder array
                if(!empty($this->request->data['salesorder_id'])&& !empty($this->request->data['sales_quantity'])):
                    $salesorder_id  =   $this->request->data['salesorder_id'];
                    $sales_quantity   =   $this->request->data['sales_quantity'];
                    $qo_array['Clientpo']['Salesorder']           = array_combine($salesorder_id,$sales_quantity);
                    foreach($qo_array['Clientpo']['Salesorder'] as $salesorderno=>$salesordercount){
                            $this->Salesorder->updateAll(array('Salesorder.track_id'=>'"'.$this->request->data['track_id'].'"','Salesorder.ref_count'=>'"'.$imploded_po_count.'"','Salesorder.ref_no'=>'"'.$imploded_po.'"','Salesorder.po_generate_type'=>'"Manual"','Salesorder.is_assign_po'=>1,'Salesorder.is_pocount_satisfied'=>1),array('Salesorder.id'=>$salesorderno));
                    }
                endif;
              
                //for Delivery order array
                if( !empty($this->request->data['deliveryorder_id'])&&!empty($this->request->data['delivery_quantity'])):
                    $do_id_array  =   $this->request->data['deliveryorder_id'];
                    $do_count_array   =   $this->request->data['delivery_quantity'];
                    $qo_array['Clientpo']['Deliveryorder']         = array_combine($do_id_array,$do_count_array);
                    foreach($qo_array['Clientpo']['Deliveryorder'] as $deliveryorderno=>$deliveryordercount){
                            $this->Deliveryorder->updateAll(array('Deliveryorder.track_id'=>'"'.$this->request->data['track_id'].'"','Deliveryorder.ref_count'=>'"'.$imploded_po_count.'"','Deliveryorder.po_reference_no'=>'"'.$imploded_po.'"','Deliveryorder.po_generate_type'=>'"Manual"','Deliveryorder.is_assignpo'=>1,'Deliveryorder.is_pocount_satisfied'=>1),array('Deliveryorder.delivery_order_no'=>$deliveryorderno));
                        }
                endif;
                
                if(!empty($qo_array))
                {
                    $clientpo   = serialize($qo_array);
                    $data['Qoinvoice']['quotationno']=$this->request->data['quotation_no'];
                    $data['Qoinvoice']['quotation_data']=$clientpo;
                    $data['Qoinvoice']['qo_count']=$this->request->data['quo_quantity'];
                    $data['Qoinvoice']['status']='1';
                    if($this->Qoinvoice->save($data))
                    {
                        $this->redirect(array('controller'=>'Clientpos','action'=>'index'));
                    }
                }
              $this->redirect(array('controller'=>'Clientpos','action'=>'index'));
          }
         
    }
    public function Purchaseorder_fullinvoice($id = null)
    {
        //To check remaining Quotations there to assign po 
        $customer_quotation_list=$this->Quotation->find('all',array('conditions'=>
                        array('Quotation.customer_id'=>$id,'Quotation.is_approved'=>1,'Quotation.is_assign_po'=>0)));
       
        if(!empty($customer_quotation_list))
        {
            $track_id=$this->random('track');
            $quotation_array_id=array();
            foreach($customer_quotation_list as $quo)
            {
                $quotation_array_id[count($quo['Device'])] = $quo['Quotation']['quotationno'];
            }   
            $po_list=$this->Clientpo->find('all',array('conditions'=>array('Clientpo.customer_id'=>$id)));
            $po_single=$this->Clientpo->find('first',array('conditions'=>array('Clientpo.customer_id'=>$id)));
            $this->set(compact('po_list','customer_quotation_list','pos','po_first','po_single','quotation_array_id','track_id'));
            $this->set('customer_id',$id);

            if($this->request->is(array('post','put')))
            {
               
                $clientpo_number    =   $this->request->data['clientpo_no'];
                $clientpo_quantity    =   $this->request->data['po_quantity'];
                // For po count satisfied calculation
                $quo_total_count=0;
                foreach($this->request->data['quo_quantity'] as $k=>$v):
                    $quo_total_count    +=   $v;
                endforeach;
                $po_sat =   ($quo_total_count==$clientpo_quantity)?1:0;
                
//                if ($this->request->data['clientpo_no'] != '') 
//                {
//                    //$check_string = strchr($this->request->data['clientpo_no'], 'CPO');
//                    $po_type = ($check_string == "") ? 'Manual' : 'Auotomatic';
//                }
                //For Quotation array
                $po_type = 'Manual';
                if( $this->request->data['quotation_no']!=''&& $this->request->data['quo_quantity']!=''):
                $qo_id_array  =   $this->request->data['quotation_no'];
                $qo_count_array   =   $this->request->data['quo_quantity'];
                $po_array['Clientpo']['Quotation']         = array_combine($qo_id_array,$qo_count_array);
                    foreach($po_array['Clientpo']['Quotation'] as $quotationno=>$quotationcount){
                        $this->Quotation->updateAll(array('Quotation.track_id'=>'"'.$this->request->data['track_id'].'"','Quotation.ref_count'=>'"'.$this->request->data['po_quantity'].'"','Quotation.ref_no'=>'"'.$this->request->data['clientpo_no'].'"','Quotation.po_generate_type'=>'"'.$po_type.'"','Quotation.is_assign_po'=>1,'Quotation.is_pocount_satisfied'=>$po_sat),array('Quotation.quotationno'=>$quotationno));
                        //For data  log and log activity
                        $this->Logactivity->create();
                        $this->request->data['Logactivity']['logname'] = 'ClientPO';
                        $this->request->data['Logactivity']['logactivity'] = 'Add';
                        $this->request->data['Logactivity']['logid'] = $quotationno;
                        $this->request->data['Logactivity']['user_id'] = $this->Session->read('sess_userid');
                        $this->request->data['Logactivity']['logapprove'] = 0;
                        $this->Logactivity->save($this->request->data['Logactivity']);
                        
                        //For data log
                        $this->Datalog->create();
                        $this->request->data['Datalog']['logname'] = 'ClientPO';
                        $this->request->data['Datalog']['logactivity'] = 'Add';
                        $this->request->data['Datalog']['logid'] = $quotationno;
                        $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                        $this->Datalog->save($this->request->data['Datalog']);
                        
                    }
                endif;
                //For Sales order array
                if( !empty($this->request->data['salesorder_id'])&&!empty( $this->request->data['sales_quantity'])):
                $so_id_array  =   $this->request->data['salesorder_id'];
                $so_count_array   =   $this->request->data['sales_quantity'];
                $po_array['Clientpo']['Salesorder']           = array_combine($so_id_array,$so_count_array);
                foreach($po_array['Clientpo']['Salesorder'] as $salesorderno=>$salesordercount){
                        $this->Salesorder->updateAll(array('Salesorder.track_id'=>'"'.$this->request->data['track_id'].'"','Salesorder.ref_count'=>'"'.$clientpo_quantity.'"','Salesorder.ref_no'=>'"'.$this->request->data['clientpo_no'].'"','Salesorder.po_generate_type'=>'"'.$po_type.'"','Salesorder.is_assign_po'=>1,'Salesorder.is_pocount_satisfied'=>$po_sat),array('Salesorder.id'=>$salesorderno));
                    }
                endif;
                if( !empty($this->request->data['deliveryorder_id'])&&!empty($this->request->data['delivery_quantity'])):
                //For Delivery order Array
                $do_id_array  =   $this->request->data['deliveryorder_id'];
                $do_count_array   =   $this->request->data['delivery_quantity'];
                $po_array['Clientpo']['Deliveryorder']         = array_combine($do_id_array,$do_count_array);
                foreach($po_array['Clientpo']['Deliveryorder'] as $deliveryorderno=>$deliveryordercount){
                        $this->Deliveryorder->updateAll(array('Salesorder.track_id'=>'"'.$this->request->data['track_id'].'"','Deliveryorder.ref_count'=>'"'.$clientpo_quantity.'"','Deliveryorder.po_reference_no'=>'"'.$this->request->data['clientpo_no'].'"','Deliveryorder.po_generate_type'=>'"'.$po_type.'"','Deliveryorder.is_assignpo'=>1,'Deliveryorder.is_pocount_satisfied'=>$po_sat),array('Deliveryorder.delivery_order_no'=>$deliveryorderno));
                    }
                endif;
                
                //For Invoice order Array need to change(Correction)
                if( $this->request->data['deliveryorder_id']!=''&& $this->request->data['delivery_quantity']!=''):
                
                $invoice_id_array           =   $this->request->data['deliveryorder_id'];
                $invoice_count_array        =   $this->request->data['delivery_quantity'];
                $po_array['Clientpo']['Invoice']   =   array_combine($do_id_array,$do_count_array);
                 foreach($po_array['Clientpo']['Invoice'] as $invoiceno=>$invoicecount){
                        $this->Invoice->updateAll(array('Invoice.ref_no'=>'"'.$this->request->data['clientpo_no'].'"','Invoice.po_generate_type'=>'"'.$po_type.'"','Deliveryorder.is_assign_po'=>1),array('Invoice.invoice_id'=>$invoiceno));
                    }
                endif;
                    
                if(!empty($po_array))
                {
                    $clientpo   = serialize($po_array);
                    $data['Poinvoice']['clientpo_number']=$this->request->data['clientpo_no'];
                    $data['Poinvoice']['clientpo_data']=$clientpo;
                    $data['Poinvoice']['status']='1';
                    if($this->Poinvoice->save($data))
                    {
                        $this->redirect(array('controller'=>'Clientpos','action'=>'index'));
                    }
                }

        }
          //$this->set('clientpo', $clientpos);
        }
        else
        {
            $this->Session->setFlash('No more Quotations to assign PO for Customer '.$id);
            $this->redirect(array('controller'=>'Clientpos','action'=>'index'));
        }
    }
    public function Salesorder_fullinvoice($id = null)
    {
        $customer_quotation_list=$this->Quotation->find('list',array('conditions'=>
                        array('Quotation.customer_id'=>$id,'Quotation.is_approved'=>1,'Quotation.is_assign_po'=>0),'fields'=>array('id','quotationno')));
        $salesorder_list    =   $this->Salesorder->find('all',array('conditions'=>
                        array('Salesorder.customer_id'=>$id,'Salesorder.is_approved'=>1,'Salesorder.is_deleted'=>0,'Salesorder.is_assign_po'=>0)));
       
        if(!empty($salesorder_list))
        {
            $track_id=$this->random('track');
            $po_list=$this->Clientpo->find('all',array('conditions'=>array('Clientpo.customer_id'=>$id)));
            $po_single=$this->Clientpo->find('first',array('conditions'=>array('Clientpo.customer_id'=>$id)));
            $this->set(compact('po_list','customer_quotation_list','pos','po_first','po_single','track_id'));
            $this->set('customer_id',$id);

            if($this->request->is(array('post','put')))
            {
                
                $customer_id    =   $this->request->data['customer_for_quotation_id'];
                $so_array['Clientpo']['Customer']   =   array('Customer id'=>$customer_id);
                /*for quotation array later Changes*/
                if($this->request->data['quotation_no']!=''&&$this->request->data['quo_quantity']!=''):
                $qo_id_array  =   $this->request->data['quotation_no'];
                $qo_count_array   =   $this->request->data['quo_quantity'];
                $so_array['Clientpo']['Quotation']   =   array_combine($qo_id_array,$qo_count_array);
                endif;
                /*for po array*/
                if($this->request->data['clientpos_no']!=''&&$this->request->data['po_quantity']!=''):
                $po_id_array  =   $this->request->data['clientpos_no'];
                $po_count_array   =   $this->request->data['po_quantity'];
                $so_array['Clientpo']['Purchaseorder']         = array_combine($po_id_array,$po_count_array);
                endif;
                /*for Salesorder Update*/
                if(!empty($this->request->data['clientpos_no'])):
                    $po_ids         =   $this->request->data['clientpos_no'];
                    $po_for_quotation   =   implode(',',$po_ids);
                    $po_quantity        =   $this->request->data['po_quantity'];
                    $count_for_po   =   implode(',',$po_quantity);
                    foreach($so_array['Clientpo']['Quotation'] as $quotationkey=>$quotationvalue){
                        $this->Quotation->updateAll(array('Quotation.track_id'=>'"'.$this->request->data['track_id'].'"','Quotation.ref_count'=>'"'.$count_for_po.'"','Quotation.ref_no'=>'"'.$po_for_quotation.'"','Quotation.po_generate_type'=>'"Manual"','Quotation.is_assign_po'=>1,'Quotation.is_pocount_satisfied'=>1),array('Quotation.quotationno'=>$quotationkey));
                        //For data  log and log activity
                        $this->Logactivity->create();
                        $this->request->data['Logactivity']['logname'] = 'ClientPO';
                        $this->request->data['Logactivity']['logactivity'] = 'Add';
                        $this->request->data['Logactivity']['logid'] = $quotationkey;
                        $this->request->data['Logactivity']['user_id'] = $this->Session->read('sess_userid');
                        $this->request->data['Logactivity']['logapprove'] = 0;
                        $this->Logactivity->save($this->request->data['Logactivity']);
                        
                        //For data log
                         $this->Datalog->create();
                        $this->request->data['Datalog']['logname'] = 'ClientPO';
                        $this->request->data['Datalog']['logactivity'] = 'Add';
                        $this->request->data['Datalog']['logid'] = $quotationkey;
                        $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                        $this->Datalog->save($this->request->data['Datalog']);
                    }
                    if ($this->request->data['salesorder_id'] != ''):
                    $sales_id_array = $this->request->data['salesorder_id'];
                    $sales_count_array = $this->request->data['sales_quantity'];
                    $so_array['Clientpo']['Salesorder'] = array($sales_id_array => $sales_count_array);
                    foreach($so_array['Clientpo']['Salesorder'] as $salesorderkey => $salesordercount){
                        $this->Salesorder->updateAll(array('Salesorder.track_id'=>'"'.$this->request->data['track_id'].'"','Salesorder.ref_no'=>'"'.$po_for_quotation.'"','Salesorder.ref_count'=>'"'.$salesordercount.'"','Salesorder.po_generate_type'=>'"Manual"','Salesorder.is_assign_po'=>1,'Salesorder.is_pocount_satisfied'=>1),array('Salesorder.id'=>$salesorderkey));
                    }
                    endif;
                endif;
                if(!empty($so_array))
                {
                    $clientSo   = serialize($so_array);
                    $data['Soinvoice']['salesorder_id']=$this->request->data['salesorder_id'];
                    $data['Soinvoice']['salesorder_data']=$clientSo;
                    $data['Soinvoice']['so_count']=$this->request->data['sales_quantity'];
                    $data['Soinvoice']['status']='1';
                    if($this->Soinvoice->save($data))
                    {
                        $this->redirect(array('controller'=>'Clientpos','action'=>'index'));
                    }
                }
                
            }
        }
        else 
        {
            $this->Session->setFlash('No Salesorder found to assign PO for Customer '.$id);
            $this->redirect(array('controller'=>'Clientpos','action'=>'index'));
        }
    }
    public function Deliveryorder_fullinvoice($id = null)
    {
        /*
         * For Delivery order count check for the respective customer
         */
        $deliveryorder_list    =   $this->Deliveryorder->find('all',array('conditions'=>
                        array('Deliveryorder.customer_id'=>$id,'Deliveryorder.is_approved'=>1,'Deliveryorder.is_deleted'=>0,'Deliveryorder.is_assignpo'=>0)));
        if(count($deliveryorder_list)==0){
             $this->Session->setFlash('No Delivery orders  found to assign PO for Customer '.$id);
            $this->redirect(array('controller'=>'Clientpos','action'=>'index'));
        } 
        $customer_salesorder_list=$this->Salesorder->find('list',array('conditions'=>
                        array('Salesorder.customer_id'=>$id,'Salesorder.is_approved'=>1),'fields'=>array('id','salesorderno')));
        $po_list=$this->Clientpo->find('all',array('conditions'=>array('Clientpo.customer_id'=>$id)));
        $po_single=$this->Clientpo->find('first',array('conditions'=>array('Clientpo.customer_id'=>$id)));
        $this->set(compact('po_list','customer_salesorder_list','pos','po_first','po_single'));
        $this->set('customer_id',$id);
        
        if($this->request->is(array('post','put')))
        {
               
                $clientpo_number    =   $this->request->data['clientpos_no'];
                $clientpo_quantity    =   $this->request->data['po_quantity'];
                
                if($clientpo_number!='' &&$clientpo_quantity!=''):
                $po_ids         =   $this->request->data['clientpos_no'];
                $po_for_deliveryorder   =   implode(',',$po_ids);
                $po_quantity             =   $this->request->data['po_quantity'];
                $pocount_for_deliveryorder   =   implode(',',$po_quantity);
                $do_array['Clientpo']['Purchaseorder']         = array_combine($clientpo_number,$clientpo_quantity);   
                endif;
                
                // For Quotation array
                if( !empty($this->request->data['quotation_id'])&& !empty($this->request->data['quotation_quantity'])):
                $qo_id_array  =   $this->request->data['quotation_id'];
                $qo_count_array   =   $this->request->data['quotation_quantity'];
                $do_array['Clientpo']['Quotation']         = array_combine($qo_id_array,$qo_count_array);
                    foreach($do_array['Clientpo']['Quotation'] as $quotationno=>$quotationcount){
                        $this->Quotation->updateAll(array('Quotation.track_id'=>'"'.$this->request->data['track_id'].'"','Quotation.ref_count'=>'"'.$pocount_for_deliveryorder.'"','Quotation.ref_no'=>'"'.$po_for_deliveryorder.'"','Quotation.po_generate_type'=>'"Manual"','Quotation.is_assign_po'=>1,'Quotation.is_pocount_satisfied'=>1),array('Quotation.quotationno'=>$quotationno));
                        //For data  log and log activity
                        $this->Logactivity->create();
                        $this->request->data['Logactivity']['logname'] = 'ClientPO';
                        $this->request->data['Logactivity']['logactivity'] = 'Add';
                        $this->request->data['Logactivity']['logid'] = $quotationno;
                        $this->request->data['Logactivity']['user_id'] = $this->Session->read('sess_userid');
                        $this->request->data['Logactivity']['logapprove'] = 0;
                        $this->Logactivity->save($this->request->data['Logactivity']);
                        
                        //For data log
                        $this->Datalog->create();
                        $this->request->data['Datalog']['logname'] = 'ClientPO';
                        $this->request->data['Datalog']['logactivity'] = 'Add';
                        $this->request->data['Datalog']['logid'] = $quotationno;
                        $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                        $this->Datalog->save($this->request->data['Datalog']);
                        
                    }
                endif;
                
                
                //For Sales order array
                if( !empty($this->request->data['salesorder_id'])&&!empty( $this->request->data['salesorder_quantity'])):
                $so_id_array  =   $this->request->data['salesorder_id'];
                $so_count_array   =   $this->request->data['salesorder_quantity'];
                $do_array['Clientpo']['Salesorder']           = array_combine($so_id_array,$so_count_array);
                foreach($do_array['Clientpo']['Salesorder'] as $salesorderno=>$salesordercount){
                        $this->Salesorder->updateAll(array('Salesorder.track_id'=>'"'.$this->request->data['track_id'].'"','Salesorder.ref_count'=>'"'.$pocount_for_deliveryorder.'"','Salesorder.ref_no'=>'"'.$po_for_deliveryorder.'"','Salesorder.po_generate_type'=>'"Manual"','Salesorder.is_assign_po'=>1,'Salesorder.is_pocount_satisfied'=>1),array('Salesorder.id'=>$salesorderno));
                    }
                endif;
                
                //For Delivery order Array
                if( !empty($this->request->data['deliveryorder_id'])&&!empty($this->request->data['deliver_quantity'])):
                $do_id_array  =   $this->request->data['deliveryorder_id'];
                $do_count_array   =   $this->request->data['deliver_quantity'];
                     $this->Deliveryorder->updateAll(array('Deliveryorder.track_id'=>'"'.$this->request->data['track_id'].'"','Deliveryorder.ref_count'=>'"'.$pocount_for_deliveryorder.'"','Deliveryorder.po_reference_no'=>'"'.$po_for_deliveryorder.'"','Deliveryorder.po_generate_type'=>'"Manual"','Deliveryorder.is_assignpo'=>1,'Deliveryorder.is_pocount_satisfied'=>1),array('Deliveryorder.delivery_order_no'=>$do_id_array));
                endif;
                                
                //For Invoice order Array need to change(Correction)
                if( $this->request->data['deliveryorder_id']!=''&& $this->request->data['delivery_quantity']!=''):
                $invoice_id_array           =   $this->request->data['deliveryorder_id'];
                $invoice_count_array        =   $this->request->data['delivery_quantity'];
                $po_array['Clientpo']['Invoice']   =   array_combine($do_id_array,$do_count_array);
                 foreach($po_array['Clientpo']['Invoice'] as $invoiceno=>$invoicecount){
                        $this->Invoice->updateAll(array('Invoice.ref_no'=>'"'.$this->request->data['clientpo_no'].'"','Invoice.po_generate_type'=>'"'.$po_type.'"','Deliveryorder.is_assign_po'=>1),array('Invoice.invoice_id'=>$invoiceno));
                    }
                endif;
                
                
                if(!empty($do_array))
                {
                    $clientpo   = serialize($do_array);
                    $data['Doinvoice']['deliveryorderno']=$this->request->data['deliveryorder_id'];
                    $data['Doinvoice']['deliveryorder_data']=$clientpo;
                    $data['Doinvoice']['do_count']=$this->request->data['deliver_quantity'];
                    $data['Doinvoice']['status']='1';
                    
                    if($this->Doinvoice->save($data))
                    {
                        $this->redirect(array('controller'=>'Clientpos','action'=>'index'));
                    }
                }

            $this->redirect(array('controller'=>'Clientpos','action'=>'index'));
        }
          //$this->set('clientpo', $clientpos);
   }
    public function get_quotation_values()
    {
        $this->autoRender   =   false;
        $this->layout   =   "ajax";
        $quotation_id= $this->request->data['quotation_id'];
        $quotation_details    =   $this->Quotation->find('first',array('conditions'=>array('Quotation.id'=>$quotation_id)));
        $total_array['Quotation']    =   array('quotation_no'=>$quotation_details['Quotation']['quotationno'],'quo_count'=>count($quotation_details['Device']));
        
        $imploded_ref_no        =   $quotation_details['Quotation']['ref_no'];
        $exploded_ref_no        =   explode(',', $imploded_ref_no);
        $imploded_ref_count     =   $quotation_details['Quotation']['ref_count'];
        $exploded_ref_count     =   explode(',', $imploded_ref_count);
        
        $pos_array  = array_combine($exploded_ref_no, $exploded_ref_count);
        $count=0;
      
        if(!empty($pos_array)):
            foreach($pos_array as $k=>$v):
                $total_array['Purchaseorder'][$count]    =   array('po_no'=>$k,'po_count'=>$v);
                $count  =   $count+1;
            endforeach;
        endif;
        $salesorder_details    =   $this->Salesorder->find('all',array('conditions'=>array('Salesorder.quotationno'=>$quotation_details['Quotation']['quotationno'])));
        if(!empty($salesorder_details)):
            foreach($salesorder_details as $salesorder=>$v):
                $total_array['Salesorder'][$salesorder]  =   array('salesorder_no'=>$v['Salesorder']['salesorderno'],'so_count'=>count($v['Description'])); 
            endforeach;
        endif;
        $delivery_details    =   $this->Deliveryorder->find('all',array('conditions'=>array('Deliveryorder.quotationno'=>$quotation_details['Quotation']['quotationno'])));
        if(!empty($delivery_details)):
            foreach($delivery_details as $k=>$v):
                $total_array['Deliveryorder'][$k]  =   array('deliveryorder_no'=>$v['Deliveryorder']['delivery_order_no'],'do_count'=>count($v['DelDescription'])); 
            endforeach;
        endif;
        
        if(!empty($total_array)):
            echo json_encode($total_array);
        endif;
//        if($quotation_id!=''){
//            $quotation_details    =   $this->Quotation->find('first',array('conditions'=>array('Quotation.id'=>$quotation_id)));
//            $this->set('quotation_details',$quotation_details);
//       }
//       
    }
    public function get_delivery_id_details()
    {
        $this->autoRender   =   false;
        $delivery_id= $this->request->data['del_id'];
        $customer_id= $this->request->data['customer_id'];
        if($delivery_id!=''){
            $delivery_order_details    =   $this->Deliveryorder->find('first',array('conditions'=>array('Deliveryorder.id'=>$delivery_id,'Deliveryorder.customer_id'=>$customer_id),'recursive'=>3));
            if(!empty($delivery_order_details)){
            $delivery_array['Deliveryorder']['deliveryorderno']    = $delivery_order_details['Deliveryorder']['delivery_order_no'];
            $delivery_array['Deliveryorder']['id']    = $delivery_order_details['Deliveryorder']['id'];
            $delivery_array['Deliveryorder']['DelDescription_count']    = count($delivery_order_details['DelDescription']);
            }
            if(!empty($delivery_order_details['Salesorder']['Description'])){
            $delivery_array['Salesorder']['salesorderno']    = $delivery_order_details['Salesorder']['salesorderno'];
            $delivery_array['Salesorder']['id']    = $delivery_order_details['Salesorder']['id'];
            $delivery_array['Salesorder']['Description_count']    = count($delivery_order_details['Salesorder']['Description']);
            }
            if(!empty($delivery_order_details['Salesorder']['Quotation'])){
            $delivery_array['Quotation']['quotationno']    = $delivery_order_details['Salesorder']['Quotation']['quotationno'];
            $delivery_array['Quotation']['id']    = $delivery_order_details['Salesorder']['Quotation']['id'];
            $delivery_array['Quotation']['device_count']    = count($delivery_order_details['Salesorder']['Quotation']['Device']);
            }
            $delivery_array['Purchaseorder']['po_reference_no']    = $delivery_order_details['Deliveryorder']['po_reference_no'];
            echo json_encode($delivery_array);
            
       }
    }
    public function po_search()
    {
        $this->autoRender   =   false;
        $name =  $this->request->data['po_id'];
        //echo $name;
        $customer_id    =   $this->request->data['customer_id'];
        $data = $this->Quotation->find('all',array('conditions'=>array('Quotation.ref_no LIKE'=>'%'.$name.'%','Quotation.customer_id'=>$customer_id,'Quotation.is_pocount_satisfied'=>0)));
        pr($data);exit;
        $c = count($data);
        if($c>0)
        {
            for($i = 0; $i<$c;$i++)
            { 
                echo "<div class='po_single_show' align='left' id='".$data[$i]['Quotation']['ref_no']."'>";
                echo $data[$i]['Quotation']['ref_no'];
                echo "<br>";
                echo "</div>";
            }
        }
        else
        {
            echo "<div class='po_no_result' align='left'>";
            echo "No Results Found";
            echo "<br>";
            echo "</div>";
        }
    }
    public function so_search()
    {
        $this->autoRender   =   false;
        $id =  $this->request->data['so_id'];
        $customer_id    =   $this->request->data['customer_id'];
        $data = $this->Salesorder->find('all',array('conditions'=>array('Salesorder.is_assign_po'=>0,'Salesorder.salesorderno LIKE'=>'%'.$id.'%','Salesorder.customer_id'=>$customer_id,'Salesorder.is_deleted'=>0)));
        $c = count($data);
        if($c>0)
        {
            for($i = 0; $i<$c;$i++)
            { 
                echo "<div class='so_single_show' align='left' id='".$data[$i]['Salesorder']['salesorderno']."'>";
                echo $data[$i]['Salesorder']['salesorderno'];
                echo "<br>";
                echo "</div>";
            }
        }
        else
        {
            echo "<div class='so_no_result' align='left'>";
            echo "No Results Found";
            echo "<br>";
            echo "</div>";
        }
            
    }
    public function do_search()
    {
        $this->autoRender   =   false;
        $name =  $this->request->data['do_id'];
        $customer_id    =   $this->request->data['customer_id'];
        $data = $this->Deliveryorder->find('all',array('conditions'=>array('Deliveryorder.delivery_order_no LIKE'=>'%'.$name.'%','Deliveryorder.customer_id'=>$customer_id,'Deliveryorder.is_deleted'=>0,'Deliveryorder.is_assignpo'=>0,'Deliveryorder.is_approved'=>1)));
        $c = count($data);
        if($c>0)
        {
            for($i = 0; $i<$c;$i++)
            { 
                echo "<div class='do_single_show' align='left' id='".$data[$i]['Deliveryorder']['id']."' data-count='".$data[$i]['Deliveryorder']['del_description_count']."'>";
                echo $data[$i]['Deliveryorder']['delivery_order_no'];
                echo "<br>";
                echo "</div>";
            }
        }
        else
        {
            echo "<div class='po_no_result' align='left'>";
            echo "No Results Found";
            echo "<br>";
            echo "</div>";
        }
            
    }
    public function get_po_quotations()
    {
        $this->layout   =   'ajax';
        $po_id =  $this->request->data['po_id'];
        $customer_id    =   $this->request->data['customer_id'];
        $quotations = $this->Clientpo->find('all',array('conditions'=>array('clientpos_no'=>$po_id,'Clientpo.customer_id'=>$customer_id,'Clientpo.is_pocount_satisfied'=>0)));
        $this->set(compact('quotations'));
//        if(!empty($data))
//        {
//            foreach($data as $key=>$val)
//            {
//                if($val['Clientpo']['clientpos_no']==$po_id)
//                {
//                    $quotation_array[$po_id][]=$val['Quotation'];
//                }
//            }
//            $this-set('quotations',$quotation_array);
//        }
        
    }
    public function get_so_quotations()
    {
//      $salesorder_details = $this->Salesorder->find('first',array('conditions'=>array('Salesorder.salesorderno'=>'BSO1404136667','Salesorder.customer_id'=>'CUS1403693631')));
//      pr($salesorder_details);exit;
        $this->autoRender    =   false;
        $so_id =  $this->request->data['so_id'];
        $customer_id    =   $this->request->data['customer_id'];
        $salesorder_details = $this->Salesorder->find('first',array('conditions'=>array('Salesorder.salesorderno'=>$so_id,'Salesorder.customer_id'=>$customer_id,'Salesorder.is_deleted'=>0)));
        if(!empty($salesorder_details))
        {
            echo json_encode($salesorder_details);
        }
    }
    public function get_random_ponumber()
    {
        $this->autoRender   =   false;
        echo $this->random('clientpo');
        
    }
    public function get_quotation_relateddetails()
    {
        $this->autoRender    =   false;
        $qo_id =  $this->request->data['qo_id'];
        $salesorder_details = $this->Salesorder->find('all',array('conditions'=>array('Salesorder.is_assign_po'=>0,'Salesorder.quotationno'=>$qo_id,'Salesorder.is_approved'=>1,'Salesorder.is_deleted'=>0)));
        
        $sales_array['Salesorder']=array();$delivery_array['Deliveryorder']=array();
        if(!empty($salesorder_details)){
        foreach($salesorder_details as $salesorder):
            $sales_array['Salesorder'][$salesorder['Salesorder']['salesorderno']]    =   count($salesorder['Description']);
            $deliveryorder_details = $this->Deliveryorder->find('all',array('conditions'=>array('Deliveryorder.is_assign_po'=>0,'Deliveryorder.salesorder_id'=>$salesorder['Salesorder']['salesorderno'],'Deliveryorder.is_approved'=>1,'Deliveryorder.is_deleted'=>0)));
            foreach($deliveryorder_details as $delivery):
                $delivery_array['Deliveryorder'][$delivery['Deliveryorder']['delivery_order_no']]=$delivery['Deliveryorder']['del_description_count'];
            endforeach;
        endforeach;
        } else{ $sales_array;$delivery_array;}
        $sales_plus_delivery    = array_merge($delivery_array, $sales_array);
        echo json_encode($sales_plus_delivery);
    }
    
    public function approve()
        {
            $this->autoRender=false;
            $id =  $this->request->data['id'];
            $quotation=$this->Quotation->find('first',array('conditions'=>array('Quotation.quotationno'=>$id),'recursive'=>2));
            //$quotation
            $updated    =   $this->Quotation->updateAll(array('Quotation.is_poapproved'=>1,'Quotation.po_approval_date'=>date('d-m-y')),array('Quotation.quotationno'=>$id,'Quotation.po_generate_type !='=>'Manual'));
            //return $updated;
            if($updated!=1)
            {
                //pr($id1);exit;
                $user_id = $this->Session->read('sess_userid');
                $this->Logactivity->updateAll(array('Logactivity.logapprove'=>2,'Logactivity.approved_by'=>$user_id),array('Logactivity.logid'=>$id,'Logactivity.logactivity'=>'Add Clientpo'));
                echo "success";
//                $this->request->data['Invoice']['deliveryorder_id']=$id;
//                $this->request->data['Invoice']['customer_purchaseorder_no']='';
//                $this->request->data['Invoice']['is_approved']=0;
//                $this->Invoice->save($this->request->data);
            }
            else
            {
                $text = "Purchase Order Needs to be Given(Manually) to get Approval";
                return $text;
                echo "failure";
//                $this->Session->setFlash(__('Purchase Order Needs to be Given(Manually) to get Approval'));
//                $this->redirect(array('controller'=>'Deliveryorders','action'=>'index'));
            }
         }
}