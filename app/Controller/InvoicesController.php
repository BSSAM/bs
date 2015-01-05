<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class InvoicesController extends AppController
{
   
    public $helpers = array('Html','Form','Session');
    public $components = array('RequestHandler');
    public $uses =array('Priority','Paymentterm','Quotation','Currency','Contactpersoninfo','SalesDocument',
                            'Country','Additionalcharge','Service','CustomerInstrument','Customerspecialneed','Random','Title',
                            'Instrument','Instrumentforgroup','Brand','Customer','Device','Salesorder','Description','Logactivity','branch','Datalog','InstrumentType','Title','Invoice','DelDescription','Deliveryorder');
    public function index()
    {
       
      
        //******************* Salesorder Full Invoice *******************//
        $salesorder_list = $this->Salesorder->find('all',array('conditions'=>array('Salesorder.is_deleted'=>0,'Salesorder.is_approved'=>1,'Salesorder.is_poapproved'=>1,'Customer.invoice_type_id'=>3,'Salesorder.is_invoice_created'=>1,'Salesorder.is_invoice_approved'=>0),'order' => array('Salesorder.id' => 'DESC')));
        //******************* Quotation Full Invoice *******************//
        $quotation_lists = $this->Quotation->find('all',array('conditions'=>array('Quotation.is_deleted'=>'0','Quotation.is_approved'=>1,'Quotation.is_poapproved'=>1,'Customer.invoice_type_id'=>2,'Quotation.is_invoice_created'=>1,'Quotation.is_invoice_approved'=>0),'order' => array('Quotation.created' => 'ASC')));    
        

//        $po_number = '';
//        $same_po    =   array();
//        $po_lists1 = $this->Quotation->find('all',array('conditions'=>array('Quotation.is_deleted'=>'0','Customer.invoice_type_id'=>1,'Quotation.is_approved'=>1,'Quotation.is_invoice_created'=>1),'order' => array('Quotation.created' => 'ASC'),'recursive'=>2));    
//        $po_lists2 = $this->Quotation->find('all',array('conditions'=>array('Quotation.is_deleted'=>'0','Customer.invoice_type_id'=>1,'Quotation.is_approved'=>1,'Quotation.is_invoice_created'=>1),'order' => array('Quotation.created' => 'ASC'),'recursive'=>2));    
//      
//        foreach($po_lists1 as $po1=>$v):
//            if($v['Quotation']['ref_no']==$po_lists2[$po1]['Quotation']['ref_no']):
//                $same_po[$v['Quotation']['ref_no']][] = $v;  
//            endif;
//            
//        endforeach;
        
        //pr($same_po);exit;
        //******************* Purchase Order Full Invoice *******************//
        $po_lists = $this->Quotation->find('all',array('conditions'=>array('Quotation.is_deleted'=>'0','Customer.invoice_type_id'=>1,'Quotation.is_approved'=>1,'Quotation.is_poapproved'=>1,'Quotation.is_invoice_created'=>1,'Customer.invoice_type_id'=>1,'Quotation.is_invoice_approved'=>0),'group' => array('Quotation.ref_no'),'recursive'=>2));    
        //******************* Deliveryorder Full Invoice *******************//
        $prepareinvoice_approved_list    =   $this->Deliveryorder->find('all',array('conditions'=>array('Deliveryorder.is_approved'=>1,'Deliveryorder.is_poapproved'=>1,'Deliveryorder.status'=>1,'Deliveryorder.is_deleted'=>0,'Deliveryorder.is_invoice_created'=>1,'Customer.invoice_type_id'=>4,'Deliveryorder.is_invoice_approved'=>0)));
        
        $invoice_list =$this->Invoice->find('all',array('conditions'=>array('Invoice.is_approved'=>'1'),'recursive'=>3));
        
        $this->set(compact('prepareinvoice_approved_list','salesorder_list','quotation_lists','po_lists','invoice_list'));
    }
    
//    public function prepare()
//    {
//        //$prepareinvoice_approved_list   =    $this->Invoice->find('all',array('conditions'=>array('Invoice.is_approved'=>'1'),'recursive'=>3));
//        //$this->set(compact('prepareinvoice_approved_list'));
//    }
//     
    
    public function invoice()
    {
       ini_set('memory_limit', '512M');
    }
    public function update_puchaseid()
    {
        $this->autoRender   =   false;
        if ($this->data) 
        {
            App::uses('Sanitize', 'Utility');
            $purchase_id = Sanitize::clean($this->data['Invoice']['purchaseorder_id']);
            $this->Invoice->id = $this->data['Invoice']['id'];
            $this->Invoice->saveField('customer_puchaseorder_no', $purchase_id);
            echo $purchase_id;
        }
    }
    public function approve($id = NULL)
    {
        $result_string = substr($id, 0, 3);
        if($result_string == 'BSO'):
            $salesorder_list = $this->Salesorder->find('first',array('conditions'=>array('Salesorder.id'=>$id,'Salesorder.is_deleted'=>0,'Salesorder.is_approved'=>1,'Salesorder.is_poapproved'=>1,'Customer.invoice_type_id'=>3,'Salesorder.is_invoice_created'=>1),'recursive'=>3));
            $gst = $salesorder_list['Quotation']['Customerspecialneed']['gst'];
            $currency = $salesorder_list['Quotation']['Customerspecialneed']['currency_value'];
            $additional_charge = $salesorder_list['Quotation']['Customerspecialneed']['additional_service_value'];
            $this->set(compact('gst','currency','additional_charge'));
            $delivery_lis = '';
            foreach($salesorder_list['Deliveryorder'] as $delivery):
                $delivery_lis[] = $delivery['delivery_order_no'];
            endforeach;
            $deliveryorder_in_comma = implode(',',$delivery_lis);
            $salesorder_list_first = $this->Salesorder->find('first',array('conditions'=>array('Salesorder.id'=>$id,'Salesorder.is_deleted'=>0,'Salesorder.is_approved'=>1,'Salesorder.is_poapproved'=>1,'Customer.invoice_type_id'=>3,'Salesorder.is_invoice_created'=>1),'recursive'=>3));
            $contact_person = $this->Contactpersoninfo->find('first',array('conditions'=>array('Contactpersoninfo.id'=>$salesorder_list_first['Salesorder']['attn'])));
            $this->set('contactperson',$contact_person['Contactpersoninfo']);
            $this->set('deliveryorderno',$deliveryorder_in_comma);
            $service = $this->Service->find('first',array('conditions'=>array('Service.id'=>$salesorder_list_first['Salesorder']['service_id'])));
            $this->set('servicetype',$service['Service']['servicetype']);
            $desc = $salesorder_list_first['Description'];
            $total = 0;
            foreach($desc as $desc_total):
                $total = $total + $desc_total['sales_total'];
            endforeach;
            $this->set('total',$total);
            
            $this->set('desc',$desc);
            
            $title =   $this->Title->find('all');
            foreach($title as $title_name)
            {
                $titles[] = $title_name['Title']['title_name'];
            }
            $this->set('titles',$titles);
            
        elseif($result_string == 'BQS' || $result_string == 'BSQ'):
            $quotation_list = $this->Quotation->find('all',array('conditions'=>array('Quotation.quotationno'=>$id,'Quotation.is_deleted'=>'0','Quotation.is_approved'=>1,'Quotation.is_poapproved'=>1,'Customer.invoice_type_id'=>2,'Quotation.is_invoice_created'=>1)));    
            foreach($quotation_list as $polist):
                $quono[] = $polist['Device'];
            endforeach;
            //pr($polist);exit;
            $delivery_lists = $this->Deliveryorder->find('all',array('conditions'=>array('Deliveryorder.quotationno'=>$id,'Deliveryorder.is_approved'=>1,'Deliveryorder.is_poapproved'=>1,'Deliveryorder.status'=>1,'Deliveryorder.is_deleted'=>0,'Deliveryorder.is_invoice_created'=>1,'Customer.invoice_type_id'=>2)));
            //pr($delivery_lists);exit;
            $delivery_lis = '';
            foreach($delivery_lists as $delivery):
                //pr($delivery);
                $delivery_lis[] = $delivery['Deliveryorder']['delivery_order_no'];
            endforeach;
            $deliveryorder_in_comma = implode(',',$delivery_lis);
            
            $quotation_list = $this->Quotation->find('first',array('conditions'=>array('Quotation.quotationno'=>$id,'Quotation.is_deleted'=>0,'Quotation.is_approved'=>1,'Quotation.is_poapproved'=>1,'Customer.invoice_type_id'=>2,'Quotation.is_invoice_created'=>1),'recursive'=>3));
            
            $gst = $quotation_list['Customerspecialneed']['gst'];
            $currency = $quotation_list['Customerspecialneed']['currency_value'];
            $additional_charge = $quotation_list['Customerspecialneed']['additional_service_value'];
            $this->set(compact('gst','currency','additional_charge'));
            
            $contact_person = $this->Contactpersoninfo->find('first',array('conditions'=>array('Contactpersoninfo.id'=>$quotation_list['Quotation']['attn'])));
            $this->set('contactperson',$contact_person['Contactpersoninfo']);
            $this->set('deliveryorderno',$deliveryorder_in_comma);
            $service = $this->Service->find('first',array('conditions'=>array('Service.id'=>$quotation_list['Customerspecialneed']['service_id'])));
            if(empty($service)):
                $this->set('servicetype',$service='');
            else:
                $this->set('servicetype',$service['Service']['servicetype']);
            endif;
            
            //$desc = $po_list_first['Device'];
            $total = 0;
            foreach($po_lists as $desc):
                //pr($desc['Device']);
                foreach($desc['Device'] as $desc_total):
                   // pr($desc_total['total']);
                    $total = $total + $desc_total['total'];
                endforeach;
            endforeach;
            //exit;
            //pr($quono);exit;
            $title =   $this->Title->find('all');
            foreach($title as $title_name)
            {
                $titles[] = $title_name['Title']['title_name'];
            }
            $this->set('titles',$titles);
            $this->set('total',$total);
            $this->set('desc',$quono);
        elseif($result_string == 'BDO'):
            $delivery_lists = $this->Deliveryorder->find('all',array('conditions'=>array('Deliveryorder.is_approved'=>1,'Deliveryorder.is_poapproved'=>1,'Deliveryorder.status'=>1,'Deliveryorder.is_deleted'=>0,'Deliveryorder.is_invoice_created'=>1,'Customer.invoice_type_id'=>4)));
        else:
            $po_lists = $this->Quotation->find('all',array('conditions'=>array('Quotation.ref_no'=>$id,'Quotation.is_deleted'=>'0','Quotation.is_approved'=>1,'Quotation.is_poapproved'=>1,'Customer.invoice_type_id'=>1,'Quotation.is_invoice_created'=>1),'recursive'=>3));    
            foreach($po_lists as $polist):
                $quono[] = $polist['Device'];
            endforeach;
            //pr($polist);exit;
            $delivery_lists = $this->Deliveryorder->find('all',array('conditions'=>array('Deliveryorder.ref_no'=>$id,'Deliveryorder.is_approved'=>1,'Deliveryorder.is_poapproved'=>1,'Deliveryorder.status'=>1,'Deliveryorder.is_deleted'=>0,'Deliveryorder.is_invoice_created'=>1,'Customer.invoice_type_id'=>1)));
            //pr($delivery_lists);exit;
            $delivery_lis = '';
            foreach($delivery_lists as $delivery):
                //pr($delivery);
                $delivery_lis[] = $delivery['Deliveryorder']['delivery_order_no'];
            endforeach;
            $deliveryorder_in_comma = implode(',',$delivery_lis);
            
            $po_list_first = $this->Quotation->find('first',array('conditions'=>array('Quotation.ref_no'=>$id,'Quotation.is_deleted'=>0,'Quotation.is_approved'=>1,'Quotation.is_poapproved'=>1,'Customer.invoice_type_id'=>1,'Quotation.is_invoice_created'=>1),'recursive'=>3));
            
            $gst = $po_list_first['Customerspecialneed']['gst'];
            $currency = $po_list_first['Customerspecialneed']['currency_value'];
            $additional_charge = $po_list_first['Customerspecialneed']['additional_service_value'];
            $this->set(compact('gst','currency','additional_charge'));
            
            $contact_person = $this->Contactpersoninfo->find('first',array('conditions'=>array('Contactpersoninfo.id'=>$po_list_first['Quotation']['attn'])));
            $this->set('contactperson',$contact_person['Contactpersoninfo']);
            $this->set('deliveryorderno',$deliveryorder_in_comma);
            $service = $this->Service->find('first',array('conditions'=>array('Service.id'=>$po_list_first['Customerspecialneed']['service_id'])));
            if(empty($service)):
                $this->set('servicetype',$service='');
            else:
                $this->set('servicetype',$service['Service']['servicetype']);
            endif;
            
            //$desc = $po_list_first['Device'];
            $total = 0;
            foreach($po_lists as $desc):
                //pr($desc['Device']);
                foreach($desc['Device'] as $desc_total):
                   // pr($desc_total['total']);
                    $total = $total + $desc_total['total'];
                endforeach;
            endforeach;
            //exit;
            //pr($quono);exit;
            $title =   $this->Title->find('all');
            foreach($title as $title_name)
            {
                $titles[] = $title_name['Title']['title_name'];
            }
            $this->set('titles',$titles);
            $this->set('total',$total);
            $this->set('desc',$quono);
        endif;
        
        $this->set(compact('salesorder_list','quotation_lists','delivery_lists','po_list_first'));
        //exit;
        //pr($this->request->data);exit;
        $dmt    =   $this->random('invoice');
        
        if(!empty($this->request->data)):
            
            ///////////// PO //////////////////////

            if($this->request->data['Invoice']['full_type'] == 1):

                $ref_no_inv = $this->request->data['Invoice']['po_reference_no'];
                $invoice_delivery      =   $this->Deliveryorder->find('all',array('conditions'=>array('Deliveryorder.is_approved'=>1,'Deliveryorder.status'=>1,'Deliveryorder.is_deleted'=>0,'Deliveryorder.ref_no'=>$ref_no_inv),'recursive'=>3));
                $invoice_salesorder    =   $this->Salesorder->find('all',array('conditions'=>array('Salesorder.is_approved'=>1,'Salesorder.status'=>1,'Salesorder.is_deleted'=>0,'Salesorder.ref_no'=>$ref_no_inv),'recursive'=>3));
                //pr($invoice_salesorder); exit;
                $invoice_quotation    =   $this->Quotation->find('all',array('conditions'=>array('Quotation.is_approved'=>1,'Quotation.status'=>1,'Quotation.is_deleted'=>0,'Quotation.ref_no'=>$ref_no_inv),'recursive'=>3));
                function imp1($imp)
                {
                    return implode(",", $imp);
                }
                foreach($invoice_delivery as $del):
                    $del_id[] = $del['Deliveryorder']['id'];
                    $del_no[] = $del['Deliveryorder']['delivery_order_no'];
                endforeach;
                $deliveryorder_no = imp1($del_no); 
                $deliveryorder_id = imp1($del_id);

                foreach($invoice_quotation as $quo):
                    $quo_id[] = $quo['Quotation']['id'];
                    $quo_no[] = $quo['Quotation']['quotationno'];
                endforeach;
                $quotation_no = imp1($quo_no); 
                $quotation_id = imp1($quo_id);

                foreach($invoice_salesorder as $sales):
                    $sales_id[] = $sales['Salesorder']['id'];
                endforeach;
                $salesorder_no = imp1($sales_id); 
                //pr($salesorder_no);exit;

                foreach($invoice_quotation as $quotation):
                    $cus_id   = $quotation['Customer']['id'];
                    $cus_name = $quotation['Customer']['customername'];
                    $cus_invoice_type = $quotation['Customer']['invoice_type_id'];
                    $ref_no_invoice[] = $quotation['Quotation']['ref_no'];
                endforeach;
                $ref_no_invoice_all = imp1($ref_no_invoice); 


            endif;

            /////////////////////// SO ///////////////////////////

            if($this->request->data['Invoice']['full_type'] == 3):
                
                $salesorder_inv = $this->request->data['Invoice']['salesorder_id'];    

                $invoice_delivery      =   $this->Deliveryorder->find('all',array('conditions'=>array('Deliveryorder.is_approved'=>1,'Deliveryorder.status'=>1,'Deliveryorder.is_deleted'=>0,'Deliveryorder.salesorder_id'=>$salesorder_inv),'recursive'=>3));
                //$invoice_salesorder    =   $this->Salesorder->find('all',array('conditions'=>array('Salesorder.is_approved'=>1,'Salesorder.status'=>1,'Salesorder.is_deleted'=>0,'Salesorder.id'=>$salesorder_inv),'recursive'=>3));
                $invoice_quotation    =   $this->Quotation->find('all',array('conditions'=>array('Quotation.is_approved'=>1,'Quotation.status'=>1,'Quotation.is_deleted'=>0,'Quotation.track_id'=>$this->request->data['Invoice']['track_id']),'recursive'=>3));
                function imp1($imp)
                {
                    return implode(",", $imp);
                }
                foreach($invoice_delivery as $del):
                    $del_id[] = $del['Deliveryorder']['id'];
                    $del_no[] = $del['Deliveryorder']['delivery_order_no'];
                endforeach;
                $deliveryorder_no = imp1($del_no); 
                $deliveryorder_id = imp1($del_id);

                foreach($invoice_quotation as $quo):
                    $quo_id[] = $quo['Quotation']['id'];
                    $quo_no[] = $quo['Quotation']['quotationno'];
                endforeach;
                $quotation_no = imp1($quo_no); 
                $quotation_id = imp1($quo_id);

               $salesorder_no = $salesorder_inv;


                foreach($invoice_quotation as $quotation):
                    $cus_id   = $quotation['Customer']['id'];
                    $cus_name = $quotation['Customer']['customername'];
                    $cus_invoice_type = $quotation['Customer']['invoice_type_id'];
                    $ref_no_invoice[] = $quotation['Quotation']['ref_no'];
                endforeach;
                $ref_no_invoice_all = imp1($ref_no_invoice);
                

            endif;

            ////////////////////////////////////////////////////////    
            $this->request->data['Invoice']['invoiceno'] = $dmt;
            $this->request->data['Invoice']['invoice_type_id'] = $this->request->data['Invoice']['full_type'];
            $this->request->data['Invoice']['deliveryorder_id'] = $deliveryorder_no;
            $this->request->data['Invoice']['salesorder_id'] = $salesorder_no;
            $this->request->data['Invoice']['ref_no'] = $ref_no_invoice_all;
            $this->request->data['Invoice']['quotation_id'] = $quotation_no;
            $this->request->data['Invoice']['customer_id'] = $cus_id;
            $this->request->data['Invoice']['customername'] = $cus_name;
            $this->request->data['Invoice']['is_approved'] = 1;
            $this->request->data['Invoice']['approved_date'] = date('d-F-y');
            
            
                //pr($this->request->data);exit;
                if($this->Invoice->save($this->request->data['Invoice']))
                {
                   // pr($this->request->data['Invoice']);exit;
                    //invoiceno
                    $invoice_id  =   $this->Invoice->getLastInsertID();
                    $this->Random->updateAll(array('Random.invoice'=>'"'.$dmt.'"'),array('Random.id'=>1));  

                    if($this->request->data['Invoice']['full_type'] == 1):

                        $ref_no_inv = $this->request->data['Invoice']['po_reference_no'];
                        $this->Quotation->updateAll(array('Quotation.is_invoice_approved'=>1),array('Quotation.ref_no'=>$ref_no_inv));
                        $this->Salesorder->updateAll(array('Salesorder.is_invoice_approved'=>1),array('Salesorder.ref_no'=>$ref_no_inv));
                        $this->Deliveryorder->updateAll(array('Deliveryorder.is_invoice_approved'=>1),array('Deliveryorder.ref_no'=>$ref_no_inv));

                    endif;
                    if($this->request->data['Invoice']['full_type'] == 3):
                        $salesorder_inv = $this->request->data['Invoice']['salesorder_id'];
                        $this->Quotation->updateAll(array('Quotation.is_invoice_approved'=>1),array('Quotation.track_id'=>$this->request->data['Invoice']['track_id']));
                        $this->Salesorder->updateAll(array('Salesorder.is_invoice_approved'=>1),array('Salesorder.id'=>$salesorder_inv));
                        $this->Deliveryorder->updateAll(array('Deliveryorder.is_invoice_approved'=>1),array('Deliveryorder.salesorder_id'=>$salesorder_inv));
                        $this->Logactivity->updateAll(array('Logactivity.logapprove'=>2,'Logactivity.approved_by'=>$user_id),array('Logactivity.logno'=>$salesorder_inv,'Logactivity.logactivity'=>'Add','Logactivity.logname' =>'Invoice'));
                    endif;
                    
                        
                    
                    $user_id = $this->Session->read('sess_userid');
                    foreach($quotation_no as $quo_no_list):
                    $this->Logactivity->updateAll(array('Logactivity.logapprove'=>2,'Logactivity.approved_by'=>$user_id),array('Logactivity.logno'=>$quo_no_list,'Logactivity.logactivity'=>'Add','Logactivity.logname' =>'Invoice'));
                    $this->request->data['Datalog']['logname'] = 'Invoice';
                    $this->request->data['Datalog']['logactivity'] = 'Approve';
                    $this->request->data['Datalog']['logno'] = $quo_no_list;
                    $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                    $this->Datalog->create();
                    $this->Datalog->save($this->request->data['Datalog']);
                    endforeach;
                                
                                
                    $this->Session->setFlash(__('Invoice has been Approved Successfully'));
                    $this->redirect(array('controller'=>'Invoices','action'=>'index'));
                }
        
        endif;
        
        
//        $invoice_delivery      =   $this->Deliveryorder->find('all',array('conditions'=>array('Deliveryorder.is_approved'=>1,'Deliveryorder.status'=>1,'Deliveryorder.is_deleted'=>0,'Deliveryorder.quotationno'=>$id),'recursive'=>3));
//        $invoice_salesorder    =   $this->Salesorder->find('all',array('conditions'=>array('Salesorder.is_approved'=>1,'Salesorder.status'=>1,'Salesorder.is_deleted'=>0,'Salesorder.quotationno'=>$id),'recursive'=>3));
//        $invoice_quotation    =   $this->Quotation->find('all',array('conditions'=>array('Quotation.is_approved'=>1,'Quotation.status'=>1,'Quotation.is_deleted'=>0,'Quotation.quotationno'=>$id),'recursive'=>3));
        //$del_list    =   $this->Deliveryorder->find('all',array('conditions'=>array('Deliveryorder.is_approved'=>1,'Deliveryorder.status'=>1,'Deliveryorder.is_deleted'=>0,'Deliveryorder.quotationno'=>$quo_id),'recursive'=>3));
        //pr($del_list);exit;
//            function imp1($imp)
//            {
//                return implode(",", $imp);
//            }
//
//
//            ///////////////////////////
//            //  Delivery Order Func  //
//            ///////////////////////////
//
//            foreach($invoice_delivery as $del):
//                $del_id[] = $del['Deliveryorder']['id'];
//                $del_no[] = $del['Deliveryorder']['delivery_order_no'];
//            endforeach;
//            $deliveryorder_no = imp1($del_no); 
//            $deliveryorder_id = imp1($del_id);
//
//
//            ///////////////////////////
//            //  Quotation Func       //
//            ///////////////////////////
//
//            foreach($invoice_quotation as $quo):
//                $quo_id[] = $quo['Quotation']['id'];
//                $quo_no[] = $quo['Quotation']['quotationno'];
//            endforeach;
//            $quotation_no = imp1($quo_no); //pr($deliveryorder_no);exit;
//            $quotation_id = imp1($quo_id);
//
//
//            /////////////////////////////
//            //  Customer Details       //
//            /////////////////////////////
//
//            foreach($invoice_quotation as $quotation):
//                $cus_id   = $quotation['Customer']['id'];
//                $cus_name = $quotation['Customer']['customername'];
//                $cus_invoice_type = $quotation['Customer']['invoice_type_id'];
//            endforeach;
//
//
//            /*********************************** PO Full Invoice **********************************/
//
//            if($cus_invoice_type == 1):
//                $invoice_salesorder    =   $this->Salesorder->find('first',array('conditions'=>array('Salesorder.is_approved'=>1,'Salesorder.status'=>1,'Salesorder.is_deleted'=>0,'Salesorder.quotationno'=>$id),'recursive'=>3));
//                $contact_person = $this->Contactpersoninfo->find('first',array('conditions'=>array('Contactpersoninfo.id'=>$invoice_salesorder['Salesorder']['attn'])));
//                $this->set('contactperson',$contact_person['Contactpersoninfo']);
//                $this->set('deliveryorderno',$deliveryorder_no);
//                $service = $this->Service->find('first',array('conditions'=>array('Service.id'=>$invoice_salesorder['Salesorder']['service_id'])));
//                $this->set('servicetype',$service['Service']['servicetype']);
//                $this->set('type','sales');
//                $desc = $invoice_salesorder['Description'];
//                $total = 0;
//                foreach($desc as $desc_total):
//                    $total = $total + $desc_total['sales_total'];
//                endforeach;
//                $this->set('total',$total);
//                $this->set('invoices',$invoice_salesorder);
//                $this->set('desc',$desc);
//            endif;
//
//            /*********************************** Quotation Full Invoice **********************************/
//
//            if($cus_invoice_type == 2):
//                $invoice_quotation    =   $this->Quotation->find('first',array('conditions'=>array('Quotation.is_approved'=>1,'Quotation.status'=>1,'Quotation.is_deleted'=>0,'Quotation.quotationno'=>$quotation_no),'recursive'=>3));
//                $contact_person = $this->Contactpersoninfo->find('first',array('conditions'=>array('Contactpersoninfo.id'=>$invoice_quotation['Quotation']['attn'])));
//                $this->set('contactperson',$contact_person['Contactpersoninfo']);
//                $this->set('deliveryorderno',$deliveryorder_no);
//                $service = $this->Service->find('first',array('conditions'=>array('Service.id'=>$invoice_salesorder['Salesorder']['service_id'])));
//                $this->set('servicetype',$service['Service']['servicetype']);
//                $this->set('type','quo');
//                $desc = $invoice_quotation['Device'];
//                //$total = 0;
//                foreach($desc as $desc_total):
//                    $total = $total + $desc_total['total'];
//                endforeach;
//                $this->set('total',$total);
//                $this->set('invoices',$invoice_quotation);
//                $this->set('desc',$desc);
//            endif;
//
//            /*********************************** Salesorder Full Invoice **********************************/
//
//            
//
//            /*********************************** DO Full Invoice **********************************/
//
//            if($cus_invoice_type == 4):
//                $invoice_salesorder    =   $this->Salesorder->find('first',array('conditions'=>array('Salesorder.is_approved'=>1,'Salesorder.status'=>1,'Salesorder.is_deleted'=>0,'Salesorder.quotationno'=>$id),'recursive'=>3));
//                $contact_person = $this->Contactpersoninfo->find('first',array('conditions'=>array('Contactpersoninfo.id'=>$invoice_salesorder['Salesorder']['attn'])));
//                $this->set('contactperson',$contact_person['Contactpersoninfo']);
//                $this->set('deliveryorderno',$deliveryorder_no);
//                $service = $this->Service->find('first',array('conditions'=>array('Service.id'=>$invoice_salesorder['Salesorder']['service_id'])));
//                $this->set('servicetype',$service['Service']['servicetype']);
//                $this->set('type','sales');
//                $desc = $invoice_salesorder['Description'];
//                $total = 0;
//                foreach($desc as $desc_total):
//                    $total = $total + $desc_total['sales_total'];
//                endforeach;
//                $this->set('total',$total);
//                $this->set('invoices',$invoice_salesorder);
//                $this->set('desc',$desc);
//            endif;
        
         
         
         /////////////////// For all other Ack Types ///////////////////
         
         
//         if($quo['Customer']['acknowledgement_type_id'] != 2):
//             function imp1($imp)
//            {
//                return implode(",", $imp);
//            }
//
//
//            ///////////////////////////
//            //  Delivery Order Func  //
//            ///////////////////////////
//
//            foreach($invoice_delivery as $del):
//                $del_id[] = $del['Deliveryorder']['id'];
//                $del_no[] = $del['Deliveryorder']['delivery_order_no'];
//            endforeach;
//            $deliveryorder_no = imp1($del_no); 
//            $deliveryorder_id = imp1($del_id);
//
//
//            ///////////////////////////
//            //  Quotation Func       //
//            ///////////////////////////
//
//            foreach($invoice_quotation as $quo):
//                $quo_id[] = $quo['Quotation']['id'];
//                $quo_no[] = $quo['Quotation']['quotationno'];
//            endforeach;
//            $quotation_no = imp1($quo_no); //pr($deliveryorder_no);exit;
//            $quotation_id = imp1($quo_id);
//
//
//            /////////////////////////////
//            //  Customer Details       //
//            /////////////////////////////
//
//            foreach($invoice_quotation as $quotation):
//                $cus_id   = $quotation['Customer']['id'];
//                $cus_name = $quotation['Customer']['customername'];
//                $cus_invoice_type = $quotation['Customer']['invoice_type_id'];
//            endforeach;
//
//
//            /*********************************** PO Full Invoice **********************************/
//
//            if($cus_invoice_type == 1):
//                $invoice_salesorder    =   $this->Salesorder->find('first',array('conditions'=>array('Salesorder.is_approved'=>1,'Salesorder.status'=>1,'Salesorder.is_deleted'=>0,'Salesorder.quotationno'=>$id),'recursive'=>3));
//                $contact_person = $this->Contactpersoninfo->find('first',array('conditions'=>array('Contactpersoninfo.id'=>$invoice_salesorder['Salesorder']['attn'])));
//                $this->set('contactperson',$contact_person['Contactpersoninfo']);
//                $this->set('deliveryorderno',$deliveryorder_no);
//                $service = $this->Service->find('first',array('conditions'=>array('Service.id'=>$invoice_salesorder['Salesorder']['service_id'])));
//                $this->set('servicetype',$service['Service']['servicetype']);
//                $this->set('type','sales');
//                $desc = $invoice_salesorder['Description'];
//                $total = 0;
//                foreach($desc as $desc_total):
//                    $total = $total + $desc_total['sales_total'];
//                endforeach;
//                $this->set('total',$total);
//                $this->set('invoices',$invoice_salesorder);
//                $this->set('desc',$desc);
//            endif;
//
//            /*********************************** Quotation Full Invoice **********************************/
//
//            if($cus_invoice_type == 2):
//                $invoice_quotation    =   $this->Quotation->find('first',array('conditions'=>array('Quotation.is_approved'=>1,'Quotation.status'=>1,'Quotation.is_deleted'=>0,'Quotation.quotationno'=>$quotation_no),'recursive'=>3));
//                $contact_person = $this->Contactpersoninfo->find('first',array('conditions'=>array('Contactpersoninfo.id'=>$invoice_quotation['Quotation']['attn'])));
//                $this->set('contactperson',$contact_person['Contactpersoninfo']);
//                $this->set('deliveryorderno',$deliveryorder_no);
//                $service = $this->Service->find('first',array('conditions'=>array('Service.id'=>$invoice_salesorder['Salesorder']['service_id'])));
//                $this->set('servicetype',$service['Service']['servicetype']);
//                $this->set('type','quo');
//                $desc = $invoice_quotation['Device'];
//                //$total = 0;
//                foreach($desc as $desc_total):
//                    $total = $total + $desc_total['total'];
//                endforeach;
//                $this->set('total',$total);
//                $this->set('invoices',$invoice_quotation);
//                $this->set('desc',$desc);
//            endif;
//
//            /*********************************** Salesorder Full Invoice **********************************/
//
//            if($cus_invoice_type == 3):
//                $invoice_salesorder    =   $this->Salesorder->find('first',array('conditions'=>array('Salesorder.is_approved'=>1,'Salesorder.status'=>1,'Salesorder.is_deleted'=>0,'Salesorder.quotationno'=>$id),'recursive'=>3));
//            //pr($invoice_salesorder);exit;
//                $contact_person = $this->Contactpersoninfo->find('first',array('conditions'=>array('Contactpersoninfo.id'=>$invoice_salesorder['Salesorder']['attn'])));
//                $this->set('contactperson',$contact_person['Contactpersoninfo']);
//                $this->set('deliveryorderno',$deliveryorder_no);
//                $service = $this->Service->find('first',array('conditions'=>array('Service.id'=>$invoice_salesorder['Salesorder']['service_id'])));
//                $this->set('servicetype',$service['Service']['servicetype']);
//                $this->set('type','sales');
//                $desc = $invoice_salesorder['Description'];
//                $total = 0;
//                foreach($desc as $desc_total):
//                    $total = $total + $desc_total['sales_total'];
//                endforeach;
//                $this->set('total',$total);
//                $this->set('invoices',$invoice_salesorder);
//                $this->set('desc',$desc);
//            endif;
//
//            /*********************************** DO Full Invoice **********************************/
//
//            if($cus_invoice_type == 4):
//                $invoice_salesorder    =   $this->Salesorder->find('first',array('conditions'=>array('Salesorder.is_approved'=>1,'Salesorder.status'=>1,'Salesorder.is_deleted'=>0,'Salesorder.quotationno'=>$id),'recursive'=>3));
//                $contact_person = $this->Contactpersoninfo->find('first',array('conditions'=>array('Contactpersoninfo.id'=>$invoice_salesorder['Salesorder']['attn'])));
//                $this->set('contactperson',$contact_person['Contactpersoninfo']);
//                $this->set('deliveryorderno',$deliveryorder_no);
//                $service = $this->Service->find('first',array('conditions'=>array('Service.id'=>$invoice_salesorder['Salesorder']['service_id'])));
//                $this->set('servicetype',$service['Service']['servicetype']);
//                $this->set('type','sales');
//                $desc = $invoice_salesorder['Description'];
//                $total = 0;
//                foreach($desc as $desc_total):
//                    $total = $total + $desc_total['sales_total'];
//                endforeach;
//                $this->set('total',$total);
//                $this->set('invoices',$invoice_salesorder);
//                $this->set('desc',$desc);
//            endif;
//         endif;
            
    //        $desc = $invoice['Salesorder']['Description'];
    //        //pr($desc);exit;
    //        $total = 0;
    //        foreach($desc as $desc_total):
    //            $total = $total + $desc_total['sales_total'];
    //        endforeach;
    //        $this->set('total',$total);
    //        $this->set('invoices',$invoice);
    //        $this->set('desc',$desc);
    }
    
    public function view($id = NULL)
    {
        $inv = $this->Invoice->find('first',array('conditions'=>array('Invoice.invoiceno'=>$id)));
        $this->set('invoice_no',$id);
        $inv_type = $inv['Invoice']['invoice_type_id'];
        $salesorder = $inv['Invoice']['salesorder_id'];
        $quotationno = $inv['Invoice']['quotation_id'];
        $refno = $inv['Invoice']['ref_no'];
        if($inv_type == 3):
            $salesorder_list = $this->Salesorder->find('first',array('conditions'=>array('Salesorder.id'=>$salesorder,'Salesorder.is_deleted'=>0,'Salesorder.is_approved'=>1,'Salesorder.is_poapproved'=>1,'Customer.invoice_type_id'=>3,'Salesorder.is_invoice_created'=>1),'recursive'=>3));
            $gst = $salesorder_list['Quotation']['Customerspecialneed']['gst'];
            $currency = $salesorder_list['Quotation']['Customerspecialneed']['currency_value'];
            $additional_charge = $salesorder_list['Quotation']['Customerspecialneed']['additional_service_value'];
            $this->set(compact('gst','currency','additional_charge'));
            $delivery_lis = '';
            foreach($salesorder_list['Deliveryorder'] as $delivery):
                $delivery_lis[] = $delivery['delivery_order_no'];
            endforeach;
            $deliveryorder_in_comma = implode(',',$delivery_lis);
            $salesorder_list_first = $this->Salesorder->find('first',array('conditions'=>array('Salesorder.id'=>$salesorder,'Salesorder.is_deleted'=>0,'Salesorder.is_approved'=>1,'Salesorder.is_poapproved'=>1,'Customer.invoice_type_id'=>3,'Salesorder.is_invoice_created'=>1),'recursive'=>3));
            $contact_person = $this->Contactpersoninfo->find('first',array('conditions'=>array('Contactpersoninfo.id'=>$salesorder_list_first['Salesorder']['attn'])));
            $this->set('contactperson',$contact_person['Contactpersoninfo']);
            $this->set('deliveryorderno',$deliveryorder_in_comma);
            $service = $this->Service->find('first',array('conditions'=>array('Service.id'=>$salesorder_list_first['Salesorder']['service_id'])));
            $this->set('servicetype',$service['Service']['servicetype']);
            $desc = $salesorder_list_first['Description'];
            $total = 0;
            foreach($desc as $desc_total):
                $total = $total + $desc_total['sales_total'];
            endforeach;
            $this->set('total',$total);
            
            $this->set('desc',$desc);
            
            $title =   $this->Title->find('all');
            foreach($title as $title_name)
            {
                $titles[] = $title_name['Title']['title_name'];
            }
            $this->set('titles',$titles);
            
        elseif($inv_type == 2):
            $quotation_list = $this->Quotation->find('all',array('conditions'=>array('Quotation.quotationno'=>$quotationno,'Quotation.is_deleted'=>'0','Quotation.is_approved'=>1,'Quotation.is_poapproved'=>1,'Customer.invoice_type_id'=>2,'Quotation.is_invoice_created'=>1)));    
            foreach($quotation_list as $polist):
                $quono[] = $polist['Device'];
            endforeach;
            //pr($polist);exit;
            $delivery_lists = $this->Deliveryorder->find('all',array('conditions'=>array('Deliveryorder.quotationno'=>$quotationno,'Deliveryorder.is_approved'=>1,'Deliveryorder.is_poapproved'=>1,'Deliveryorder.status'=>1,'Deliveryorder.is_deleted'=>0,'Deliveryorder.is_invoice_created'=>1,'Customer.invoice_type_id'=>2)));
            //pr($delivery_lists);exit;
            $delivery_lis = '';
            foreach($delivery_lists as $delivery):
                //pr($delivery);
                $delivery_lis[] = $delivery['Deliveryorder']['delivery_order_no'];
            endforeach;
            $deliveryorder_in_comma = implode(',',$delivery_lis);
            
            $quotation_list = $this->Quotation->find('first',array('conditions'=>array('Quotation.quotationno'=>$quotationno,'Quotation.is_deleted'=>0,'Quotation.is_approved'=>1,'Quotation.is_poapproved'=>1,'Customer.invoice_type_id'=>2,'Quotation.is_invoice_created'=>1),'recursive'=>3));
            
            $gst = $quotation_list['Customerspecialneed']['gst'];
            $currency = $quotation_list['Customerspecialneed']['currency_value'];
            $additional_charge = $quotation_list['Customerspecialneed']['additional_service_value'];
            $this->set(compact('gst','currency','additional_charge'));
            
            $contact_person = $this->Contactpersoninfo->find('first',array('conditions'=>array('Contactpersoninfo.id'=>$quotation_list['Quotation']['attn'])));
            $this->set('contactperson',$contact_person['Contactpersoninfo']);
            $this->set('deliveryorderno',$deliveryorder_in_comma);
            $service = $this->Service->find('first',array('conditions'=>array('Service.id'=>$quotation_list['Customerspecialneed']['service_id'])));
            if(empty($service)):
                $this->set('servicetype',$service='');
            else:
                $this->set('servicetype',$service['Service']['servicetype']);
            endif;
            
            //$desc = $po_list_first['Device'];
            $total = 0;
            foreach($po_lists as $desc):
                //pr($desc['Device']);
                foreach($desc['Device'] as $desc_total):
                   // pr($desc_total['total']);
                    $total = $total + $desc_total['total'];
                endforeach;
            endforeach;
            //exit;
            //pr($quono);exit;
            $title =   $this->Title->find('all');
            foreach($title as $title_name)
            {
                $titles[] = $title_name['Title']['title_name'];
            }
            $this->set('titles',$titles);
            $this->set('total',$total);
            $this->set('desc',$quono);
        elseif($inv_type == 4):
            $delivery_lists = $this->Deliveryorder->find('all',array('conditions'=>array('Deliveryorder.is_approved'=>1,'Deliveryorder.is_poapproved'=>1,'Deliveryorder.status'=>1,'Deliveryorder.is_deleted'=>0,'Deliveryorder.is_invoice_created'=>1,'Customer.invoice_type_id'=>4)));
        else:
            $po_lists = $this->Quotation->find('all',array('conditions'=>array('Quotation.ref_no'=>$refno,'Quotation.is_deleted'=>'0','Quotation.is_approved'=>1,'Quotation.is_poapproved'=>1,'Customer.invoice_type_id'=>1,'Quotation.is_invoice_created'=>1),'recursive'=>3));    
            foreach($po_lists as $polist):
                $quono[] = $polist['Device'];
            endforeach;
            //pr($polist);exit;
            $delivery_lists = $this->Deliveryorder->find('all',array('conditions'=>array('Deliveryorder.ref_no'=>$refno,'Deliveryorder.is_approved'=>1,'Deliveryorder.is_poapproved'=>1,'Deliveryorder.status'=>1,'Deliveryorder.is_deleted'=>0,'Deliveryorder.is_invoice_created'=>1,'Customer.invoice_type_id'=>1)));
            //pr($delivery_lists);exit;
            $delivery_lis = '';
            foreach($delivery_lists as $delivery):
                //pr($delivery);
                $delivery_lis[] = $delivery['Deliveryorder']['delivery_order_no'];
            endforeach;
            $deliveryorder_in_comma = implode(',',$delivery_lis);
            
            $po_list_first = $this->Quotation->find('first',array('conditions'=>array('Quotation.ref_no'=>$refno,'Quotation.is_deleted'=>0,'Quotation.is_approved'=>1,'Quotation.is_poapproved'=>1,'Customer.invoice_type_id'=>1,'Quotation.is_invoice_created'=>1),'recursive'=>3));
            
            $gst = $po_list_first['Customerspecialneed']['gst'];
            $currency = $po_list_first['Customerspecialneed']['currency_value'];
            $additional_charge = $po_list_first['Customerspecialneed']['additional_service_value'];
            $this->set(compact('gst','currency','additional_charge'));
            
            $contact_person = $this->Contactpersoninfo->find('first',array('conditions'=>array('Contactpersoninfo.id'=>$po_list_first['Quotation']['attn'])));
            $this->set('contactperson',$contact_person['Contactpersoninfo']);
            $this->set('deliveryorderno',$deliveryorder_in_comma);
            $service = $this->Service->find('first',array('conditions'=>array('Service.id'=>$po_list_first['Customerspecialneed']['service_id'])));
            if(empty($service)):
                $this->set('servicetype',$service='');
            else:
                $this->set('servicetype',$service['Service']['servicetype']);
            endif;
            
            //$desc = $po_list_first['Device'];
            $total = 0;
            foreach($po_lists as $desc):
                //pr($desc['Device']);
                foreach($desc['Device'] as $desc_total):
                   // pr($desc_total['total']);
                    $total = $total + $desc_total['total'];
                endforeach;
            endforeach;
            //exit;
            //pr($quono);exit;
            $title =   $this->Title->find('all');
            foreach($title as $title_name)
            {
                $titles[] = $title_name['Title']['title_name'];
            }
            $this->set('titles',$titles);
            $this->set('total',$total);
            $this->set('desc',$quono);
        endif;
        
        $this->set(compact('salesorder_list','quotation_lists','delivery_lists','po_list_first'));
        
    }
    public function preparein()
    {
        $this->autoRender   =   false;
        $quo_id= $this->request->data['id'];
        $quo_list    =   $this->Quotation->find('first',array('conditions'=>array('Quotation.is_approved'=>1,'Quotation.is_deleted'=>0,'Quotation.status'=>1),'recursive'=>4));
        //pr($quo_list);exit;
        $del_list    =   $this->Deliveryorder->find('all',array('conditions'=>array('Deliveryorder.is_approved'=>1,'Deliveryorder.status'=>1,'Deliveryorder.is_deleted'=>0,'Deliveryorder.quotationno'=>$quo_id),'recursive'=>3));
        //pr($del_list);exit;
        function imp($imp)
        {
            return implode(",", $imp);
        }
        foreach($del_list as $del):
            $del_id[] = $del['Deliveryorder']['id'];
            $del_no[] = $del['Deliveryorder']['delivery_order_no'];
        endforeach;
        $deliveryorder_no = imp($del_no); //pr($deliveryorder_no);exit;
        $deliveryorder_id = imp($del_id);
        //pr($quo_list);exit;
        $counter = 0 ;
        foreach($quo_list['Customer']['Contactpersoninfo'] as $contact):
            if( $counter == 0):
            $contact_id = $contact['id'];
            $contact_name = $contact['name'];
            $contact_phone = $contact['phone'];
            $contact_email = $contact['email'];
            $counter++;
            endif;
        endforeach;
        foreach($del_list['Salesorder']['Description'] as $salesamount):
            $del_id[] = $del['Deliveryorder']['id'];
            $del_no[] = $del['Deliveryorder']['delivery_order_no'];
        endforeach;
        //echo $contact_id;
        //exit;
        
        //pr($del_list);exit;
        //pr($quo_list);exit;
        $dmt = $this->random('invoice');
        $this->request->data['Invoice']['invoiceno']   =   $dmt;
        $this->request->data['Invoice']['branch_id']   =   $quo_list['Quotation']['branch_id'];
        $this->request->data['Invoice']['deliveryorder_id']   =   $deliveryorder_no;
        $this->request->data['Invoice']['quotation_id'] = $quo_list['Quotation']['id'];
        $this->request->data['Invoice']['customer_id']   =   $quo_list['Quotation']['customer_id'];
        $this->request->data['Invoice']['customername'] = $quo_list['Quotation']['customername'];
        $this->request->data['Invoice']['regaddress'] = $quo_list['Quotation']['address'];
        $this->request->data['Invoice']['contactperson_id'] = $del['Deliveryorder']['attn'];
        $this->request->data['Invoice']['contactpersonname'] = $contact_name;
        $this->request->data['Invoice']['phone'] =  $del['Deliveryorder']['phone'];
        $this->request->data['Invoice']['fax'] = $del['Deliveryorder']['fax'];
        $this->request->data['Invoice']['email'] = $del['Deliveryorder']['email'];
        $this->request->data['Invoice']['totalprice'] = $contact_email;
        $this->request->data['Invoice']['jobstatus'] = $quo_list['Quotation']['is_jobcompleted'];
        $this->request->data['Invoice']['paymentterms_id'] = $quo_list['Quotation']['paymentterm_id'];
        $this->request->data['Invoice']['track_id'] = $quo_list['Quotation']['track_id'];
        $this->request->data['Invoice']['ourrefno'] = $quo_list['Quotation']['quotationno'];
        $this->request->data['Invoice']['regaddress'] = $quo_list['Quotation']['address'];
        $this->request->data['Invoice']['acknowledgement_type_id'] = $quo_list['Customer']['acknowledgement_type_id'];
        $this->request->data['Invoice']['instrument_type_id'] = $quo_list['Quotation']['instrument_type_id'];
        $this->request->data['Invoice']['salesperson_id'] = $quo_list['Quotation']['instrument_type_id'];
        $this->request->data['Invoice']['gst'] = $quo_list['Customerspecialneed']['gst'];
        $this->request->data['Invoice']['currency_id'] = $quo_list['Customerspecialneed']['currency_id'];
        $this->request->data['Invoice']['remarks'] = $quo_list['Customerspecialneed']['remarks'];
        $this->request->data['Invoice']['service_type'] = $quo_list['Customerspecialneed']['Service']['servicetype'];
        $this->request->data['Invoice']['currencyconversionrate'] = $quo_list['branch']['Currency']['exchangerate'];
        $this->request->data['Invoice']['discount'] = $quo_list['Quotation']['discount'];
        $this->request->data['Invoice']['salesorder_id'] = $del['Deliveryorder']['salesorder_id'];
        $this->request->data['Invoice']['po_generate_type'] = $quo_list['Quotation']['po_generate_type'];
        $this->request->data['Invoice']['is_assign_po'] = $quo_list['Quotation']['is_assign_po'];
        $this->request->data['Invoice']['is_approved'] = 0;
        $this->request->data['Invoice']['approved_date'] = '';
        $this->Invoice->create();
        $this->Invoice->save($this->request->data['Invoice']);
        $this->Quotation->updateAll(array('Quotation.is_invoice_created'=>1),array('Quotation.quotationno'=>$quo_list['Quotation']['quotationno']));
        foreach($del_list as $del):
            $this->Deliveryorder->updateAll(array('Deliveryorder.is_invoice_created'=>1),array('Deliveryorder.id'=>$del['Deliveryorder']['id']));
        endforeach;
        /******************
        * Data Log Activity
        */
        $this->request->data['Datalog']['logname'] = 'Invoice';
        $this->request->data['Datalog']['logactivity'] = 'Created';
        $this->request->data['Datalog']['logid'] = $dmt;
        $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');

        $a = $this->Datalog->save($this->request->data['Datalog']);

        /******************/   
        $this->Session->setFlash(__('The Invoice has been created',h($dmt)));
    }
    public function edit($id=NULL)
    {
        $invoice =$this->Invoice->find('first',array('conditions'=>array('Invoice.is_approved'=>'0'),'recursive'=>3));
        $desc = $invoice['Salesorder']['Description'];
        //pr($desc);exit;
        $total = 0;
        foreach($desc as $desc_total):
            $total = $total + $desc_total['sales_total'];
        endforeach;
        $this->set('total',$total);
        $this->set('invoices',$invoice);
        $this->set('desc',$desc);
    }
    public function invoice_approved()
    {
        $this->autoRender   =   false;
        $invoice_id= $this->request->data['invoice_id'];
        if($this->Invoice->updateAll(array('Invoice.is_approved'=>1,'Invoice.approved_date'=>'"'.date('d-M-y H:i:s').'"'),array('Invoice.id'=>$invoice_id)))
        {
           $updated_invoice =   $this->Invoice->find('first',array('conditions'=>array('Invoice.id'=>$invoice_id,'Invoice.is_approved'=>1),'recursive'=>4));
           $this->set('updated_invoice',$updated_invoice);
        }
    }
    public function invoice_approved_list()
    {
        
        //$updated_invoice =   $this->Invoice->find('all',array('conditions'=>array('Invoice.is_approved'=>0),'recursive'=>4));
        $updated_invoice =$this->Invoice->find('all',array('conditions'=>array('Invoice.is_approved'=>'0'),'recursive'=>4));
        if($updated_invoice!='')
        {
        $this->set('updated_invoice',$updated_invoice);
        }
    }
    public function create_pdf()
    {
        //$users = $this->User->find('all');
        $users = "New";
        $this->set(compact('users'));
        $this->layout = '/pdf/default';
        $this->render('/Pdf/my_pdf_view');
    }
    
    public function download_pdf() 
    {
        $this->create_pdf();
        $this->viewClass = 'Media';
        $params = array(
        'id' => 'test.pdf',
        'name' => 'your_test' ,
        'download' => true,
        'extension' => 'pdf',
        'path' => APP . 'files/pdf' . DS
        );
        $this->set($params);
    }
    public function show_pdf() 
    {
        $this->create_pdf();
        $this->viewClass = 'Media';
        $params = array(
            'id' => 'test.pdf',
            'name' => 'your_test',
            'download' => false,
            'extension' => 'pdf',
            'path' => APP . 'files/pdf' . DS
        );
        $this->set($params);
    }
    
    
    function pdf($id = NULL) 
        {
        
            $this->autoRender = false;
                      
            $inv = $this->Invoice->find('first',array('conditions'=>array('Invoice.invoiceno'=>$id)));
            $file_type = 'pdf';
            $filename = $id;
        
            $inv_type = $inv['Invoice']['invoice_type_id'];
            $salesorder = $inv['Invoice']['salesorder_id'];
            $quotationno = $inv['Invoice']['quotation_id'];
            $refno = $inv['Invoice']['ref_no'];
            if($inv_type == 3):
                $salesorder_list = $this->Salesorder->find('first',array('conditions'=>array('Salesorder.id'=>$salesorder,'Salesorder.is_deleted'=>0,'Salesorder.is_approved'=>1,'Salesorder.is_poapproved'=>1,'Customer.invoice_type_id'=>3,'Salesorder.is_invoice_created'=>1),'recursive'=>3));
                //pr($salesorder_list['Customer']);exit;
                //$customer = $salesorder_list['Customer'];
                $gst = $salesorder_list['Quotation']['Customerspecialneed']['gst'];
                $currency = $salesorder_list['Quotation']['Customerspecialneed']['currency_value'];
                $additional_charge = $salesorder_list['Quotation']['Customerspecialneed']['additional_service_value'];
                $this->set(compact('gst','currency','additional_charge'));
                $delivery_lis = '';
                foreach($salesorder_list['Deliveryorder'] as $delivery):
                    $delivery_lis[] = $delivery['delivery_order_no'];
                endforeach;
                $deliveryorder_in_comma = implode(',',$delivery_lis);
                $salesorder_list_first = $this->Salesorder->find('first',array('conditions'=>array('Salesorder.id'=>$salesorder,'Salesorder.is_deleted'=>0,'Salesorder.is_approved'=>1,'Salesorder.is_poapproved'=>1,'Customer.invoice_type_id'=>3,'Salesorder.is_invoice_created'=>1),'recursive'=>3));
                $contact_person = $this->Contactpersoninfo->find('first',array('conditions'=>array('Contactpersoninfo.id'=>$salesorder_list_first['Salesorder']['attn'])));
                $this->set('contactperson',$contact_person['Contactpersoninfo']);
                $this->set('deliveryorderno',$deliveryorder_in_comma);
                $service = $this->Service->find('first',array('conditions'=>array('Service.id'=>$salesorder_list_first['Salesorder']['service_id'])));
                $this->set('servicetype',$service['Service']['servicetype']);
                $desc = $salesorder_list_first['Description'];
                $total = 0;
                foreach($desc as $desc_total):
                    //$device_name[] = $desc_total;
                    $total = $total + $desc_total['sales_total'];
                endforeach;
                $this->set('total',$total);

                $this->set('desc',$desc);

                $title =   $this->Title->find('all');
                foreach($title as $title_name)
                {
                    $titles[] = $title_name['Title']['title_name'];
                }
                $this->set('titles',$titles);
                $quotation_data = $this->Quotation->find('first', array('conditions' => array('Quotation.quotationno' => $salesorder_list_first['Salesorder']['quotationno']),'recursive'=>2));
                $customername = $quotation_data['Customer']['customername'];
                $billing_address = $quotation_data['Customer']['Address'][0]['address'];
                $postalcode = $quotation_data['Customer']['postalcode'];
                $contactperson = $quotation_data['Customer']['Contactpersoninfo'][0]['name'];
                $phone = $quotation_data['Customer']['phone'];
                $fax = $quotation_data['Customer']['fax'];
                $email = $quotation_data['Quotation']['email'];
                $InstrumentType = $quotation_data['InstrumentType']['invoice'];
                //$our_ref_no = $quotation_data_list['Quotation']['ref_no'];
                $ref_no = $quotation_data['Quotation']['ref_no'];
                $reg_date = $quotation_data['Quotation']['reg_date'];
                $payment_term = $quotation_data['Customer']['Paymentterm']['paymentterm'] . ' ' . $quotation_data['Customer']['Paymentterm']['paymenttype'];
                $quotationno = $quotation_data['Quotation']['quotationno'];                
                foreach($quotation_data['Device'] as $device):
                    $device_name[] = $device;
                endforeach;
            
              $html ='<!DOCTYPE html>
<html lang="en">
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
#header { position: fixed; left: 0px; top: -180px; right: 0px; height: 350px; }
#footer { position: fixed; left: 0px; bottom: -180px; right: 0px; height: 330px; }
#footer .page:after { content: counter(page); }
</style>
</head>

<body style="font-family:Oswald, sans-serif;font-size:9px;padding:0;margin:0;font-weight: 300; color:#444 !important;">
<div id="header">
<table width="700px">
     <tr>
          <td width="435" style="padding:0 10px; border-right:2px solid #F60;"><div style="float:left; "><img src="img/logoBs.png" width="400;" height="auto" alt="" /></div></td>
          <td style="padding:0 10px;"><div style="float:left;text-align:right;">
                    <p>41 Senoko Drive</p>
                    <p>Singapore 758249</p>
                    <p>Tel.+65 6458 4411</p>
                    <p>Fax.+65 64584400</p>
                    <p>www.bestandards.com</p>
               </div></td>
     <tr>
</table>
<table width="623" height="56">
     <tr>
          <td width="222" style="padding:0 10px;"><div style="display:inline-block;font-size:16px;font-weight:bold; font-style:italic;color:#00005b !important">TAX INVOICE</div></td>
          <td width="389" style="padding:0 10px;"><div style="display:inline-block;background:#00005b;color:#fff !important;padding:5px;font-size:13px;">GST REG NO. M200510697 / COMPANY REG NO. 200510697M</div></td>
     </tr>
</table>
<div style="width:100%;margin-top:10px;float:left;">
     <table width="98%" cellpadding="1" cellspacing="1"  style="width:100%;margin-top:10px;">
          <tr>
              <td width="47%" style="border:1px solid #000;padding:5px;"><table width="288" cellpadding="0" cellspacing="0">
                        <tr>
                              <td width="128" colspan="3" height="10px" style="font-size:11px !important;">'.$salesorder_list['Customer']['customername'].'</td>
                         </tr>
                         <tr>
                              <td colspan="3" height="10px" style="font-size:11px !important;">'.$salesorder_list['Salesorder']['address'].'</td>
							  
                         </tr>
                        
                         <tr  style="padding-top:30px;">
                              <td style="line-height:20px !important;font-size:11px !important;">ATTN </td>
                              <td width="29">:</td>
                              <td width="145" style="line-height:30px !important;font-size:11px !important;">'.$contactperson.'</td>
                         </tr>
                         <tr>
                              <td style="line-height:20px !important;font-size:11px !important;">TEL </td>
                              <td width="29">:</td>
                              <td style="line-height:20px !important;font-size:11px !important;">'.$phone.'</td>
                         </tr>
                         <tr>
                              <td style="line-height:20px !important;font-size:11px !important;">FAX </td>
                              <td width="29">:</td>
                              <td style="line-height:20px !important;font-size:11px !important;">'.$salesorder_list['Salesorder']['fax'].'</td>
                         </tr>
                         <tr>
                              <td style="line-height:20px !important;font-size:11px !important;">EMAIL </td>
                              <td width="29">:</td>
                              <td style="line-height:20px !important;font-size:11px !important;">'.$email.'</td>
                         </tr>
                    </table></td>
               <td width="3%"></td>
               <td width="45%" style="border:1px solid #000;width:50%;padding:0"><table width="280" height="161" cellpadding="0" cellspacing="0">
                         <tr>
                              <td height=""  colspan="3" style="padding:10px 0;"><div align="center" style="font-size:24px;border-bottom:1px solid #000;width:98%;padding:10px 0;">'.$inv['Invoice']['invoiceno'].'</div></td>
						
                         </tr>
                         <tr>
                              <td width="139" style="line-height:20px !important;padding-left:5px;font-size:11px !important;">OUR REF NO </td>
                              <td width="24" style="font-size:11px !important;">:</td>
                              <td width="109" style="line-height:20px !important;font-size:11px !important;">'.$salesorder_list['Salesorder']['id'].'</td>
                         </tr>
                         <tr>
                              <td style="line-height:20px !important;padding-left:5px;font-size:11px !important;"> YOUR REF NO </td>
                              <td style="font-size:11px !important;">:</td>
                              <td style="line-height:20px !important;font-size:11px !important;"> '.$salesorder_list['Salesorder']['ref_no'].'</td>
                         </tr>
                         <tr>
                              <td style="line-height:20px !important;padding-left:5px;font-size:11px !important;"> DATE </td>
                              <td style="font-size:11px !important;">:</td>
                              <td style="line-height:20px !important;font-size:11px !important;"> '.$inv['Invoice']['invoice_date'].'</td>
                         </tr>
                         <tr>
                              <td  style="line-height:20px !important;padding-left:5px;font-size:11px !important;">PAYMENT TERMS </td>
                              <td style="font-size:11px !important;">:</td>
                              <td style="line-height:20px !important;font-size:11px !important;">'.$payment_term.'</td>
                         </tr>
                    </table></td>
               <td width="2%"></td>
          </tr>
     </table>
</div>
<div style="padding-top:10px;">'.$InstrumentType.'</div>
</div></div>';
              $html .='<div id="footer">
     <div style="width:100%;" class="page">
          
     <table cellpadding="1" cellspacing="1"  style="width:100%;">
          <tr>
               <td style="padding:5px;width:50%;border:1px solid #000;"><table cellpadding="0" cellspacing="0">
                         <tr>
                              <td>CONFIRMED AND ACCEPTED BY:</td>
                         </tr>
                         
                         <tr>
                              <td style="padding-top:20px;"><div style="border-top:1px solid #000;width:100%;">COMPANYS STAMP,SIGNATURE AND DATE</div></td>
                         </tr>
                         <tr>
                              <td style="padding-top:5px;">DESIGNATION :</td>
                         </tr>
                         <tr>
                              <td style="padding-top:5px;">NAME :</td>
                         </tr>
                    </table></td>
               <td></td>
               <td></td>
               <td></td>
               <td></td>
               <td style="border:1px dashed #000;padding:5px;width:50%;"><table width="270" cellpadding="0" cellspacing="0">
                         <tr>
                              <td width="214" style="text-align:center;padding-bottom:30px;">FOR BS TECH PTE LTD</td>
                         </tr>
                         <tr>
                              <td style="font-size:9px !important;color:#777 !important; text-align:center;"> Authorized Signature</td>
                         </tr>
                    </table></td>
          </tr>
     </table>

<table width="100%">
               <tr>
                    <td style="width:80%;padding-right:10px;"><div style="font-size:9px !important;">1) Payment must be made either by Crossed Cheque to the Order of BS TECH PTE LTD or by electronic transfer to OCBC Bank (Bank Code: 7339 /Branch Code: 581/Account No: 814589001/SWIFT: OCBCSGSG). Any discrepancy noted herein must be brought to the notice of the company within 7 days in writing from the date of this statement. Otherwise all charges will be deemed to be correct.</div>
                    <div style="font-size:9px !important;">2) Prompt payment settlement would be appreciated. Otherwise, interest charge of 2% per month or part thereof will be levied on any amount outstanding.</div>
                    <div style="font-size:9px !important;">3) All business is transacted in strict compliance of the Standard Terms & Conditions of BS Tech Pte Ltd; a copy of which can be made available on request.</div></td>
                    <td style="width:20%; text-align:right;"><img src="img/signature.jpg"  width="120px" height="auto" alt="" /></td>
               </tr>
          </table>

<div style="background:#313854;float:left;width:100%;color:#fff !important;padding:5px;font-size:12px;margin-top:20px;text-align:center;">E. & O . E</div>
</div>
</div>
</div>';
$subtotal = 0;
$html .= '<div id="content">'; 


                foreach($device_name as $k=>$device):
                    if($k == 0)
                    {
					$html .='<div style="color:#000 !important;line-height:12px;font-size:11px;display:block;margin-top:260px;"> SALES ORDER NO : <span style="font-size:14px !important;">'.$inv['Invoice']['salesorder_id'].'</span></div>
<div style="color:#000 !important;line-height:12px;font-size:11px;"> DELIVERY ORDER NO : <span style="font-size:14px !important;">'.$inv['Invoice']['deliveryorder_id'].'</span></div>';
                        $html .= '<table cellpadding="0" cellspacing="0"  style="width:100%;">      <tr>
               <td style="border-bottom:1px solid #000;text-transform:uppercase;padding:3px 10px;font-size:11px !important;color: #000 !important;">Item</td>
               <td style="border-bottom:1px solid #000;text-transform:uppercase;padding:3px 10px;font-size:11px !important;color: #000 !important;">Qty</td>
               <td style="border-bottom:1px solid #000;text-transform:uppercase;padding:3px 10px;font-size:11px !important;color: #000 !important;width:20%;">Instrument</td>
               <td style="border-bottom:1px solid #000;text-transform:uppercase;padding:3px 10px;font-size:11px !important;color: #000 !important;">Brand</td>
               <td style="border-bottom:1px solid #000;text-transform:uppercase;padding:3px 10px;font-size:11px !important;color: #000 !important;">Model</td>
               <td style="border-bottom:1px solid #000;text-transform:uppercase;padding:3px 10px;font-size:11px !important;color: #000 !important;">Range</td>';
$count1 = 0;
for($i=0;$i<=4;$i++):
    if(isset($titles[$i])):
        $html .='<td style="border-bottom:1px solid #000;padding:3px 10px;font-size:11px !important;color: #000 !important;">';
        $html .= $titles[$i];
        $html .='</td>';
    endif;
    $count1 = $count1+1;
endfor;
$html .= '<td style="border-bottom:1px solid #000;padding:3px 10px;font-size:11px !important;color: #000 !important;">Total Price $(SGD)</td>';

$html .= '</tr>';
                    }
                    elseif($k%5 == 0)
                    {
                        $html .= '<table cellpadding="0" cellspacing="0"  style="width:100%;page-break-before: always;margin-top:230px;">      <tr>
               <td style="border-bottom:1px solid #000;text-transform:uppercase;padding:3px 10px;font-size:11px !important;color: #000 !important;">Item</td>
               <td style="border-bottom:1px solid #000;text-transform:uppercase;padding:3px 10px;font-size:11px !important;color: #000 !important;">Qty</td>
               <td style="border-bottom:1px solid #000;text-transform:uppercase;padding:3px 10px;font-size:11px !important;color: #000 !important;width:20%;">Instrument</td>
               <td style="border-bottom:1px solid #000;text-transform:uppercase;padding:3px 10px;font-size:11px !important;color: #000 !important;">Brand</td>
               <td style="border-bottom:1px solid #000;text-transform:uppercase;padding:3px 10px;font-size:11px !important;color: #000 !important;">Model</td>
               <td style="border-bottom:1px solid #000;text-transform:uppercase;padding:3px 10px;font-size:11px !important;color: #000 !important;">Range</td>';
$count1 = 0;
for($i=0;$i<=4;$i++):
    if(isset($titles[$i])):
        $html .='<td style="border-bottom:1px solid #000;text-transform:uppercase;padding:3px 10px;font-size:11px !important;color: #000 !important;">';
        $html .= $titles[$i];
        $html .='</td>';
    endif;
    $count1 = $count1+1;
endfor;
$count1 = $count1+1;
$html .= '<td style="border-bottom:1px solid #000;text-transform:uppercase;padding:3px 10px;font-size:11px !important;color: #000 !important;">Total Price $(SGD)</td>';

$html .= '</tr>';
                    }
                      
                      
                    //foreach($device_name as $device):
                    $html .= '
                    <tr>
                        <td style="padding:3px 10px;">'.$device['order_by'].'</td>
                        <td style="padding:3px 10px;">1</td>
                        <td style="padding:3px 10px;width:20%;">'.$device['Instrument']['name'].'</td>
                        <td style="padding:3px 10px;">'.$device['Brand']['brandname'].'</td>
                        <td style="padding:3px 10px;">'.$device['model_no'].'</td>
                        <td style="padding:3px 10px;">'.$device['Range']['range_name'].'</td>';
                        for($i=0;$i<=4;$i++):
                        if(isset($titles[$i])):
                        $html .='<td style="padding:3px 10px;">'.$device['title'.($i+1).'_val'].'</td>';
                        endif;
                        endfor;
                        
                    $html .='<td style="padding:3px 10px;">'.number_format($device['unit_price'], 2, '.', '').'</td></tr>';
                $subtotal = $subtotal + $device['unit_price']; 
                
                
         if($k+1 == count($device_name)){       
         $gst = $subtotal * 0.07;
                $total_due = $gst + $subtotal;
               
                $html .= '<tr>
                         <td colspan="'.($count1+5).'" style="text-align:right;padding:10px;font-size:11px !important;color: #000 !important;border-top:1px solid #333;">SUBTOTAL $(SGD)</td>
                         <td style="padding:3px 10px;font-size:11px !important;color: #000 !important;border-top:1px solid #333;">'.number_format($subtotal, 2, '.', '').'</td>
                    </tr>
                    <tr>
                         <td colspan="'.($count1+5).'" style="text-align:right;padding:10px;font-size:11px !important;color: #000 !important;border-top:1px solid #333;">GST ( 7.00% )</td>
                         <td style="padding:10px;font-size:11px !important;color: #000 !important;border-top:1px solid #333;">'.number_format($gst, 2, '.', '').'</td>
                    </tr>
                    <tr>
                         <td colspan="'.($count1+5).'" style="text-align:right;padding:10px;font-size:11px !important;color: #000 !important;border-top:1px solid #333;">TOTAL DUE $(SGD)</td>
                         <td style="padding:10px;font-size:11px !important;color: #000 !important;border-top:1px solid #333;">'.number_format($total_due, 2, '.', '').'</td>
                    </tr>
                     <tr>
               <td colspan="3" style="border:1px  dashed #000;text-align:right;padding:3px 10px;color: #000 !important;font-size:15px !important;">SPECIAL REQUIREMENTS :</td>
               <td  colspan="8" style="border:1px dashed #000; text-align:left;padding:3px 10px;font-size:15px !important;">Self Collect & Self Delivery Non-Singlas</td>
          </tr>';
         }
                if($k%5 == 4 || $k+1 == count($device_name)){
                $html .='</table>';
                }
                endforeach;
$html .= '</div>';
//pr($html);
//exit; 
$this->export_report_all_format($file_type, $filename, $html);
//<div style="color:#000 !important;"> SALES ORDER NO : <span style="font-size:18px !important;">BSO-14-005635</span></div>
//<div style="color:#000 !important;"> DELIVERY ORDER NO : <span style="font-size:18px !important;">BDO-14-005920</span></div>
//<div style="width:100%;display:block;margin-top:10px; class="table_format">
//     <table cellpadding="0" cellspacing="0"  style="width:100%;min-height:400px;">
//          <tr>
//               <td style="border-bottom:1px solid #000;padding:3px 10px;font-size:11px !important;">ITEM</td>
//               <td style="border-bottom:1px solid #000;padding:3px 10px;font-size:11px !important;">QTY</td>
//               <td style="border-bottom:1px solid #000;padding:3px 10px;font-size:11px !important;">DESCRIPTION</td>
//               <td style="border-bottom:1px solid #000;padding:3px 10px;font-size:11px !important;">MODEL NO</td>
//               <td style="border-bottom:1px solid #000;padding:3px 10px;font-size:11px !important;">SERIAL NO</td>
//               <td style="border-bottom:1px solid #000;padding:3px 10px;font-size:11px !important;">RANGE</td>
//               <td style="border-bottom:1px solid #000;padding:3px 10px;font-size:11px !important;">REMARKS</td>
//			   <td style="border-bottom:1px solid #000;padding:3px 10px;font-size:11px !important;">UNIT PRICE $(SGD)</td>
//			   <td style="border-bottom:1px solid #000;padding:3px 10px;font-size:11px !important;">TOTAL PRICE $(SGD)</td>
//          </tr>
//          <tr>
//               <td style="padding:3px 10px;font-size:11px !important;">1</td>
//               <td style="padding:3px 10px;font-size:11px !important;">1</td>
//               <td style="padding:3px 10px;font-size:11px !important;">MAGNEHELIC</td>
//               <td style="padding:3px 10px;font-size:11px !important;">-</td>
//               <td style="padding:3px 10px;font-size:11px !important;">2000-6</td>
//               <td style="padding:3px 10px;font-size:11px !important;">ME-0240</td>
//               <td style="padding:3px 10px;font-size:11px !important;">(-)/-</td>
//			   <td style="padding:3px 10px;font-size:11px !important;">40</td>
//			   <td style="padding:3px 10px;font-size:11px !important;">40</td>
//          </tr>
//       <tr>
//               <td colspan="8" style="border-top:1px solid #000;padding:3px 10px;font-size:11px !important;">SUB TOTAL $(SGD)</td>
//               <td style="border-top:1px solid #000;padding:3px 10px;font-size:11px !important;">40</td>
//          </tr>
//          <tr>
//               <td colspan="8" style="border-bottom:1px solid #000;padding:3px 10px;font-size:11px !important;color: #000 !important;">GST ( 7.00% )</td>
//               <td style="border-bottom:1px solid #000;padding:3px 10px;font-size:11px !important;color: #000 !important;">2.80</td>
//          </tr>
//		   <tr>
//               <td colspan="8" style="padding:3px 10px;font-size:11px !important;color: #000 !important;">GRAND TOTAL $(SGD)</td>
//               <td style="padding:3px 10px;font-size:11px !important;color: #000 !important;">42.80</td>
//          </tr>
//          <tr>
//               <td colspan="3" style="border:1px  dashed #000;text-align:right;padding:3px 10px;font-size:15px !important;">SPECIAL REQUIREMENTS :</td>
//               <td  colspan="8" style="border:1px  dashed #000;text-align:left;padding:3px 10px;font-size:15px !important;">Self Collect & Self Delivery
//                    
//                    Non-Singlas</td>
//          </tr>
//     </table>
//</div>
//<div style="width:100%;margin-top:10px;float:left;">
//     <table cellpadding="1" cellspacing="1"  style="width:100%;">
//          <tr>
//               <td style="padding:5px;width:50%;border:1px solid #000;"><table cellpadding="0" cellspacing="0">
//                         <tr>
//                              <td>CONFIRMED AND ACCEPTED BY:</td>
//                         </tr>
//                         
//                         <tr>
//                              <td style="padding-top:20px;"><div style="border-top:1px solid #000;width:100%;">COMPANYS STAMP,SIGNATURE AND DATE</div></td>
//                         </tr>
//                         <tr>
//                              <td style="padding-top:5px;">DESIGNATION :</td>
//                         </tr>
//                         <tr>
//                              <td style="padding-top:5px;">NAME :</td>
//                         </tr>
//                    </table></td>
//               <td></td>
//               <td></td>
//               <td></td>
//               <td></td>
//               <td style="border:1px dashed #000;padding:5px;width:50%;"><table width="270" cellpadding="0" cellspacing="0">
//                         <tr>
//                              <td width="214" style="text-align:center;padding-bottom:30px;">FOR BS TECH PTE LTD</td>
//                         </tr>
//                         <tr>
//                              <td style="font-size:9px !important;color:#777 !important; text-align:center;"> Authorized Signature</td>
//                         </tr>
//                    </table></td>
//          </tr>
//     </table>
//</div>
//<div style="position:fixed;bottom:10px;left:10px;right:10px;height:130px;width:100%;">
//<div style="font-size:9px !important;width:100%;margin-top:10px;">1) Payment must be made either by Crossed Cheque to the Order of BS TECH PTE LTD or by electronic transfer to OCBC Bank (Bank Code: 7339 /Branch Code: 581/Account No: 814589001/SWIFT: OCBCSGSG). Any discrepancy noted herein must be brought to the notice of the company within 7 days in writing from the date of this statement. Otherwise all charges will be deemed to be correct.</div>
//<div style="font-size:9px !important;width:100%;">2) Prompt payment settlement would be appreciated. Otherwise, interest charge of 2% per month or part thereof will be levied on any amount outstanding.</div>
//<div style="font-size:9px !important;width:100%;">3) All business is transacted in strict compliance of the Standard Terms & Conditions of BS Tech Pte Ltd; a copy of which can be made available on request.</div>
//<div style="background:#313854;float:left;width:100%;color:#fff !important;padding:10px;font-size:12px;margin-top:10px;text-align:center;">E. & O . E</div>
//</div>
//</body>
//</html>';

elseif($inv_type == 2):
                $quotation_list = $this->Quotation->find('all',array('conditions'=>array('Quotation.quotationno'=>$quotationno,'Quotation.is_deleted'=>'0','Quotation.is_approved'=>1,'Quotation.is_poapproved'=>1,'Customer.invoice_type_id'=>2,'Quotation.is_invoice_created'=>1)));    
                foreach($quotation_list as $polist):
                    $quono[] = $polist['Device'];
                endforeach;
                //pr($polist);exit;
                $delivery_lists = $this->Deliveryorder->find('all',array('conditions'=>array('Deliveryorder.quotationno'=>$quotationno,'Deliveryorder.is_approved'=>1,'Deliveryorder.is_poapproved'=>1,'Deliveryorder.status'=>1,'Deliveryorder.is_deleted'=>0,'Deliveryorder.is_invoice_created'=>1,'Customer.invoice_type_id'=>2)));
                //pr($delivery_lists);exit;
                $delivery_lis = '';
                foreach($delivery_lists as $delivery):
                    //pr($delivery);
                    $delivery_lis[] = $delivery['Deliveryorder']['delivery_order_no'];
                endforeach;
                $deliveryorder_in_comma = implode(',',$delivery_lis);

                $quotation_list = $this->Quotation->find('first',array('conditions'=>array('Quotation.quotationno'=>$quotationno,'Quotation.is_deleted'=>0,'Quotation.is_approved'=>1,'Quotation.is_poapproved'=>1,'Customer.invoice_type_id'=>2,'Quotation.is_invoice_created'=>1),'recursive'=>3));

                $gst = $quotation_list['Customerspecialneed']['gst'];
                $currency = $quotation_list['Customerspecialneed']['currency_value'];
                $additional_charge = $quotation_list['Customerspecialneed']['additional_service_value'];
                $this->set(compact('gst','currency','additional_charge'));

                $contact_person = $this->Contactpersoninfo->find('first',array('conditions'=>array('Contactpersoninfo.id'=>$quotation_list['Quotation']['attn'])));
                $this->set('contactperson',$contact_person['Contactpersoninfo']);
                $this->set('deliveryorderno',$deliveryorder_in_comma);
                $service = $this->Service->find('first',array('conditions'=>array('Service.id'=>$quotation_list['Customerspecialneed']['service_id'])));
                if(empty($service)):
                    $this->set('servicetype',$service='');
                else:
                    $this->set('servicetype',$service['Service']['servicetype']);
                endif;

                //$desc = $po_list_first['Device'];
                $total = 0;
                foreach($po_lists as $desc):
                    //pr($desc['Device']);
                    foreach($desc['Device'] as $desc_total):
                       // pr($desc_total['total']);
                        $total = $total + $desc_total['total'];
                    endforeach;
                endforeach;
                //exit;
                //pr($quono);exit;
                $title =   $this->Title->find('all');
                foreach($title as $title_name)
                {
                    $titles[] = $title_name['Title']['title_name'];
                }
                $this->set('titles',$titles);
                $this->set('total',$total);
                $this->set('desc',$quono);
elseif($inv_type == 4):
                $delivery_lists = $this->Deliveryorder->find('all',array('conditions'=>array('Deliveryorder.is_approved'=>1,'Deliveryorder.is_poapproved'=>1,'Deliveryorder.status'=>1,'Deliveryorder.is_deleted'=>0,'Deliveryorder.is_invoice_created'=>1,'Customer.invoice_type_id'=>4)));
            
            
            //                                                              //
            //------------------ PO Full Invoice  ---------------------------
            /*                                                              */
else:
                $po_lists = $this->Quotation->find('all',array('conditions'=>array('Quotation.ref_no'=>$refno,'Quotation.is_deleted'=>'0','Quotation.is_approved'=>1,'Quotation.is_poapproved'=>1,'Customer.invoice_type_id'=>1,'Quotation.is_invoice_created'=>1),'recursive'=>3));    
                //echo 'po';
                
                //pr($po_lists[0]['Customer']);exit;
                foreach($po_lists as $polist):
                    $quono[] = $polist['Device'];
                
                endforeach;
                //pr($polist);exit;
                $delivery_lists = $this->Deliveryorder->find('all',array('conditions'=>array('Deliveryorder.ref_no'=>$refno,'Deliveryorder.is_approved'=>1,'Deliveryorder.is_poapproved'=>1,'Deliveryorder.status'=>1,'Deliveryorder.is_deleted'=>0,'Deliveryorder.is_invoice_created'=>1,'Customer.invoice_type_id'=>1)));
                //pr($delivery_lists);exit;
                $delivery_lis = '';
                foreach($delivery_lists as $delivery):
                    //pr($delivery);
                    $delivery_lis[] = $delivery['Deliveryorder']['delivery_order_no'];
                endforeach;
                $deliveryorder_in_comma = implode(',',$delivery_lis);

                $po_list_first = $this->Quotation->find('first',array('conditions'=>array('Quotation.ref_no'=>$refno,'Quotation.is_deleted'=>0,'Quotation.is_approved'=>1,'Quotation.is_poapproved'=>1,'Customer.invoice_type_id'=>1,'Quotation.is_invoice_created'=>1),'recursive'=>3));
                
                $gst = $po_list_first['Customerspecialneed']['gst'];
                $currency = $po_list_first['Customerspecialneed']['currency_value'];
                $additional_charge = $po_list_first['Customerspecialneed']['additional_service_value'];
                $this->set(compact('gst','currency','additional_charge'));

                $contact_person = $this->Contactpersoninfo->find('first',array('conditions'=>array('Contactpersoninfo.id'=>$po_list_first['Quotation']['attn'])));
                $this->set('contactperson',$contact_person['Contactpersoninfo']);
                $this->set('deliveryorderno',$deliveryorder_in_comma);
                $service = $this->Service->find('first',array('conditions'=>array('Service.id'=>$po_list_first['Customerspecialneed']['service_id'])));
                if(empty($service)):
                    $this->set('servicetype',$service='');
                else:
                    $this->set('servicetype',$service['Service']['servicetype']);
                endif;

                //$desc = $po_list_first['Device'];
                $total = 0;
                foreach($po_lists as $desc):
                    //pr($desc['Device']);
                    foreach($desc['Device'] as $desc_total):
                       // pr($desc_total['total']);
                    $device_name[] = $desc_total;
                        $total = $total + $desc_total['total'];
                    endforeach;
                endforeach;
                //exit;
                //pr($quono);exit;
                $title =   $this->Title->find('all');
                foreach($title as $title_name)
                {
                    $titles[] = $title_name['Title']['title_name'];
                }
                $customername = $po_list_first['Customer']['customername'];
                $billing_address = $po_list_first['Customer']['Address'][0]['address'];
                $postalcode = $po_list_first['Customer']['postalcode'];
                $contactperson = $po_list_first['Customer']['Contactpersoninfo'][0]['name'];
                $phone = $po_list_first['Customer']['phone'];
                $fax = $po_list_first['Customer']['fax'];
                $email = $po_list_first['Quotation']['email'];
                $InstrumentType = $po_list_first['InstrumentType']['invoice'];
                //$our_ref_no = $quotation_data_list['Quotation']['ref_no'];
                $ref_no = $po_list_first['Quotation']['ref_no'];
                $reg_date = $po_list_first['Quotation']['reg_date'];
                $payment_term = $po_list_first['Customer']['Paymentterm']['paymentterm'] . ' ' . $po_list_first['Customer']['Paymentterm']['paymenttype'];
                $quotationno = $po_list_first['Quotation']['quotationno'];      
                $this->set('titles',$titles);
                $this->set('total',$total);
                $this->set('desc',$quono);
                
                
                $file_type = 'pdf';
            $filename = $po_list_first['Quotation']['quotationno'];

           $html = '<!DOCTYPE html>
<html lang="en">
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
#header { position: fixed; left: 0px; top: -180px; right: 0px; height: 350px; }
#footer { position: fixed; left: 0px; bottom: -180px; right: 0px; height: 330px; }
#footer .page:after { content: counter(page); }
</style>
</head>';
           
 $title =   $this->Title->find('all');
            foreach($title as $title_name)
            {
                $titles[] = $title_name['Title']['title_name'];
            }
            //$this->set('titles',$titles);
            
                
               // pr($device_name);exit;
               
$html .=
'<body style="font-family:Oswald, sans-serif;font-size:9px;padding:0;margin:0;font-weight: 300; color:#444 !important;">
<div id="header">
<table width="700px">
     <tr>
          <td width="435" style="padding:0 10px; border-right:2px solid #F60;"><div style="float:left; "><img src="img/logoBs.png" width="400;" height="auto" alt="" /></div></td>
          <td style="padding:0 10px;"><div style="float:left;text-align:right;">
                    <p>41 Senoko Drive</p>
                    <p>Singapore 758249</p>
                    <p>Tel.+65 6458 4411</p>
                    <p>Fax.+65 64584400</p>
                    <p>www.bestandards.com</p>
               </div></td>
     <tr>
</table>
<table width="623" height="56">
     <tr>
          <td width="222" style="padding:0 10px;"><div style="display:inline-block;font-size:16px;font-weight:bold; font-style:italic;color:#00005b !important">TAX INVOICE</div></td>
          <td width="389" style="padding:0 10px;"><div style="display:inline-block;background:#00005b;color:#fff !important;padding:5px;font-size:13px;">GST REG NO. M200510697 / COMPANY REG NO. 200510697M</div></td>
     </tr>
</table>
<div style="width:100%;margin-top:10px;float:left;">
     <table width="98%" cellpadding="1" cellspacing="1"  style="width:100%;margin-top:10px;">
          <tr>
              <td width="47%" style="border:1px solid #000;padding:5px;"><table width="288" cellpadding="0" cellspacing="0">
                        <tr>
                              <td width="128" colspan="3" height="10px" style="font-size:11px !important;">'.$customername.'</td>
                         </tr>
                         <tr>
                              <td colspan="3" height="10px" style="font-size:11px !important;">'.$billing_address.'</td>
							  
                         </tr>
                        
                         <tr  style="padding-top:30px;">
                              <td style="line-height:20px !important;font-size:11px !important;">ATTN </td>
                              <td width="29">:</td>
                              <td width="145" style="line-height:30px !important;font-size:11px !important;">'.$contactperson.'</td>
                         </tr>
                         <tr>
                              <td style="line-height:20px !important;font-size:11px !important;">TEL </td>
                              <td width="29">:</td>
                              <td style="line-height:20px !important;font-size:11px !important;">'.$phone.'</td>
                         </tr>
                         <tr>
                              <td style="line-height:20px !important;font-size:11px !important;">FAX </td>
                              <td width="29">:</td>
                              <td style="line-height:20px !important;font-size:11px !important;">'.$fax.'</td>
                         </tr>
                         <tr>
                              <td style="line-height:20px !important;font-size:11px !important;">EMAIL </td>
                              <td width="29">:</td>
                              <td style="line-height:20px !important;font-size:11px !important;">'.$email.'</td>
                         </tr>
                    </table></td>
               <td width="3%"></td>
               <td width="45%" style="border:1px solid #000;width:50%;padding:0"><table width="280" height="161" cellpadding="0" cellspacing="0">
                         <tr>
                              <td height=""  colspan="3" style="padding:10px 0;"><div align="center" style="font-size:24px;border-bottom:1px solid #000;width:98%;padding:10px 0;">'.$inv['Invoice']['invoiceno'].'</div></td>
						
                         </tr>
                         <tr>
                              <td width="139" style="line-height:20px !important;padding-left:5px;font-size:11px !important;">OUR REF NO </td>
                              <td width="24" style="font-size:11px !important;">:</td>
                              <td width="109" style="line-height:20px !important;font-size:11px !important;">'.$inv['Invoice']['quotation_id'].'</td>
                         </tr>
                         <tr>
                              <td style="line-height:20px !important;padding-left:5px;font-size:11px !important;"> YOUR REF NO </td>
                              <td style="font-size:11px !important;">:</td>
                              <td style="line-height:20px !important;font-size:11px !important;"> '.$ref_no.'</td>
                         </tr>
                         <tr>
                              <td style="line-height:20px !important;padding-left:5px;font-size:11px !important;"> DATE </td>
                              <td style="font-size:11px !important;">:</td>
                              <td style="line-height:20px !important;font-size:11px !important;"> '.$inv['Invoice']['invoice_date'].'</td>
                         </tr>
                         <tr>
                              <td  style="line-height:20px !important;padding-left:5px;font-size:11px !important;">PAYMENT TERMS </td>
                              <td style="font-size:11px !important;">:</td>
                              <td style="line-height:20px !important;font-size:11px !important;">'.$payment_term.'</td>
                         </tr>
                    </table></td>
               <td width="2%"></td>
          </tr>
     </table>
</div>
<div style="padding-top:10px;">'.$InstrumentType.'</div>
</div></div>';
$html .='<div id="footer">
     <div style="width:100%;" class="page">
          
     <table cellpadding="1" cellspacing="1"  style="width:100%;">
          <tr>
               <td style="padding:5px;width:50%;border:1px solid #000;"><table cellpadding="0" cellspacing="0">
                         <tr>
                              <td>CONFIRMED AND ACCEPTED BY:</td>
                         </tr>
                         
                         <tr>
                              <td style="padding-top:20px;"><div style="border-top:1px solid #000;width:100%;">COMPANYS STAMP,SIGNATURE AND DATE</div></td>
                         </tr>
                         <tr>
                              <td style="padding-top:5px;">DESIGNATION :</td>
                         </tr>
                         <tr>
                              <td style="padding-top:5px;">NAME :</td>
                         </tr>
                    </table></td>
               <td></td>
               <td></td>
               <td></td>
               <td></td>
               <td style="border:1px dashed #000;padding:5px;width:50%;"><table width="270" cellpadding="0" cellspacing="0">
                         <tr>
                              <td width="214" style="text-align:center;padding-bottom:30px;">FOR BS TECH PTE LTD</td>
                         </tr>
                         <tr>
                              <td style="font-size:9px !important;color:#777 !important; text-align:center;"> Authorized Signature</td>
                         </tr>
                    </table></td>
          </tr>
     </table>

<table width="100%">
               <tr>
                    <td style="width:80%;padding-right:10px;"><div style="font-size:9px !important;">1) Payment must be made either by Crossed Cheque to the Order of BS TECH PTE LTD or by electronic transfer to OCBC Bank (Bank Code: 7339 /Branch Code: 581/Account No: 814589001/SWIFT: OCBCSGSG). Any discrepancy noted herein must be brought to the notice of the company within 7 days in writing from the date of this statement. Otherwise all charges will be deemed to be correct.</div>
                    <div style="font-size:9px !important;">2) Prompt payment settlement would be appreciated. Otherwise, interest charge of 2% per month or part thereof will be levied on any amount outstanding.</div>
                    <div style="font-size:9px !important;">3) All business is transacted in strict compliance of the Standard Terms & Conditions of BS Tech Pte Ltd; a copy of which can be made available on request.</div></td>
                    <td style="width:20%; text-align:right;"><img src="img/signature.jpg"  width="120px" height="auto" alt="" /></td>
               </tr>
          </table>

<div style="background:#313854;float:left;width:100%;color:#fff !important;padding:5px;font-size:12px;margin-top:20px;text-align:center;">E. & O . E</div>
</div>
</div>
</div>';
$subtotal = 0;
$html .= '<div id="content">'; 


                foreach($device_name as $k=>$device):
                    if($k == 0)
                    {
					$html .='<div style="color:#000 !important;line-height:12px;font-size:11px;display:block;margin-top:260px;"> SALES ORDER NO : <span style="font-size:14px !important;">'.$inv['Invoice']['salesorder_id'].'</span></div>
<div style="color:#000 !important;line-height:12px;font-size:11px;"> DELIVERY ORDER NO : <span style="font-size:14px !important;">'.$inv['Invoice']['deliveryorder_id'].'</span></div>';
                        $html .= '<table cellpadding="0" cellspacing="0"  style="width:100%;">      <tr>
               <td style="border-bottom:1px solid #000;text-transform:uppercase;padding:3px 10px;font-size:11px !important;color: #000 !important;">Item</td>
               <td style="border-bottom:1px solid #000;text-transform:uppercase;padding:3px 10px;font-size:11px !important;color: #000 !important;">Qty</td>
               <td style="border-bottom:1px solid #000;text-transform:uppercase;padding:3px 10px;font-size:11px !important;color: #000 !important;width:20%;">Instrument</td>
               <td style="border-bottom:1px solid #000;text-transform:uppercase;padding:3px 10px;font-size:11px !important;color: #000 !important;">Brand</td>
               <td style="border-bottom:1px solid #000;text-transform:uppercase;padding:3px 10px;font-size:11px !important;color: #000 !important;">Model</td>
               <td style="border-bottom:1px solid #000;text-transform:uppercase;padding:3px 10px;font-size:11px !important;color: #000 !important;">Range</td>';
$count1 = 0;
for($i=0;$i<=4;$i++):
    if(isset($titles[$i])):
        $html .='<td style="border-bottom:1px solid #000;padding:3px 10px;font-size:11px !important;color: #000 !important;">';
        $html .= $titles[$i];
        $html .='</td>';
    endif;
    $count1 = $count1+1;
endfor;
$html .= '<td style="border-bottom:1px solid #000;padding:3px 10px;font-size:11px !important;color: #000 !important;">Total Price $(SGD)</td>';

$html .= '</tr>';
                    }
                    elseif($k%5 == 0)
                    {
                        $html .= '<table cellpadding="0" cellspacing="0"  style="width:100%;page-break-before: always;margin-top:230px;">      <tr>
               <td style="border-bottom:1px solid #000;text-transform:uppercase;padding:3px 10px;font-size:11px !important;color: #000 !important;">Item</td>
               <td style="border-bottom:1px solid #000;text-transform:uppercase;padding:3px 10px;font-size:11px !important;color: #000 !important;">Qty</td>
               <td style="border-bottom:1px solid #000;text-transform:uppercase;padding:3px 10px;font-size:11px !important;color: #000 !important;width:20%;">Instrument</td>
               <td style="border-bottom:1px solid #000;text-transform:uppercase;padding:3px 10px;font-size:11px !important;color: #000 !important;">Brand</td>
               <td style="border-bottom:1px solid #000;text-transform:uppercase;padding:3px 10px;font-size:11px !important;color: #000 !important;">Model</td>
               <td style="border-bottom:1px solid #000;text-transform:uppercase;padding:3px 10px;font-size:11px !important;color: #000 !important;">Range</td>';
$count1 = 0;
for($i=0;$i<=4;$i++):
    if(isset($titles[$i])):
        $html .='<td style="border-bottom:1px solid #000;text-transform:uppercase;padding:3px 10px;font-size:11px !important;color: #000 !important;">';
        $html .= $titles[$i];
        $html .='</td>';
    endif;
    $count1 = $count1+1;
endfor;
$count1 = $count1+1;
$html .= '<td style="border-bottom:1px solid #000;text-transform:uppercase;padding:3px 10px;font-size:11px !important;color: #000 !important;">Total Price $(SGD)</td>';

$html .= '</tr>';
                    }
                      
                      
                    //foreach($device_name as $device):
                    $html .= '
                    <tr>
                        <td style="padding:3px 10px;">'.$device['order_by'].'</td>
                        <td style="padding:3px 10px;">1</td>
                        <td style="padding:3px 10px;width:20%;">'.$device['Instrument']['name'].'</td>
                        <td style="padding:3px 10px;">'.$device['Brand']['brandname'].'</td>
                        <td style="padding:3px 10px;">'.$device['model_no'].'</td>
                        <td style="padding:3px 10px;">'.$device['Range']['range_name'].'</td>';
                        for($i=0;$i<=4;$i++):
                        if(isset($titles[$i])):
                        $html .='<td style="padding:3px 10px;">'.$device['title'.($i+1).'_val'].'</td>';
                        endif;
                        endfor;
                        
                    $html .='<td style="padding:3px 10px;">'.number_format($device['unit_price'], 2, '.', '').'</td></tr>';
                $subtotal = $subtotal + $device['unit_price']; 
                
                
         if($k+1 == count($device_name)){       
         $gst = $subtotal * 0.07;
                $total_due = $gst + $subtotal;
               
                $html .= '<tr>
                         <td colspan="'.($count1+5).'" style="text-align:right;padding:10px;font-size:11px !important;color: #000 !important;border-top:1px solid #333;">SUBTOTAL $(SGD)</td>
                         <td style="padding:3px 10px;font-size:11px !important;color: #000 !important;border-top:1px solid #333;">'.number_format($subtotal, 2, '.', '').'</td>
                    </tr>
                    <tr>
                         <td colspan="'.($count1+5).'" style="text-align:right;padding:10px;font-size:11px !important;color: #000 !important;border-top:1px solid #333;">GST ( 7.00% )</td>
                         <td style="padding:10px;font-size:11px !important;color: #000 !important;border-top:1px solid #333;">'.number_format($gst, 2, '.', '').'</td>
                    </tr>
                    <tr>
                         <td colspan="'.($count1+5).'" style="text-align:right;padding:10px;font-size:11px !important;color: #000 !important;border-top:1px solid #333;">TOTAL DUE $(SGD)</td>
                         <td style="padding:10px;font-size:11px !important;color: #000 !important;border-top:1px solid #333;">'.number_format($total_due, 2, '.', '').'</td>
                    </tr>
                     <tr>
               <td colspan="3" style="border:1px  dashed #000;text-align:right;padding:3px 10px;color: #000 !important;font-size:15px !important;">SPECIAL REQUIREMENTS :</td>
               <td  colspan="8" style="border:1px dashed #000; text-align:left;padding:3px 10px;font-size:15px !important;">Self Collect & Self Delivery Non-Singlas</td>
          </tr>';
         }
                if($k%5 == 4 || $k+1 == count($device_name)){
                $html .='</table>';
                }
                endforeach;
$html .= '</div>';
                //pr($html);exit;
        $this->export_report_all_format_po($file_type, $filename, $html);
                
                
            endif;
        
                //pr($html);exit;
//        $this->export_report_all_format($file_type, $filename, $html);
    }
    function export_report_all_format($file_type, $filename, $html)
    {    
        
        if($file_type == 'pdf')
        {
    
            App::import('Vendor', 'dompdf', array('file' => 'dompdf' . DS . 'dompdf_config.inc.php'));
            $this->dompdf = new DOMPDF();        
            $papersize = "a4";
            $orientation = 'portrait';        
            $this->dompdf->load_html($html);
            $this->dompdf->set_paper($papersize, $orientation);        
            $this->dompdf->render();
            $this->dompdf->stream("Invoice-".$filename.".pdf");
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
    function export_report_all_format_po($file_type, $filename, $html)
    {    
        
        if($file_type == 'pdf')
        {
    
            App::import('Vendor', 'dompdf', array('file' => 'dompdf' . DS . 'dompdf_config.inc.php'));
            $this->dompdf = new DOMPDF();        
            $papersize = "a4";
            $orientation = 'portrait';        
            $this->dompdf->load_html($html);
            $this->dompdf->set_paper($papersize, $orientation);        
            $this->dompdf->render();
            $this->dompdf->stream("Invoice-".$filename.".pdf");
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