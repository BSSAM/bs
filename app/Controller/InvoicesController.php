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
    
}