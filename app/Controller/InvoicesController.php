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
    public $uses    =   array('Deliveryorder','Invoice','Quotation','Datalog');
    public function index()
    {
       
        $unapproved_order_list    =   $this->Invoice->find('all',array('recursive'=>4));
        //pr($unapproved_order_list);exit;
        //,array('conditions'=>array('Invoice.is_approved'=>'0')
        
        $prepareinvoice_approved_list    =   $this->Deliveryorder->find('all',array('conditions'=>array('Deliveryorder.is_approved'=>1,'Deliveryorder.status'=>1,'Deliveryorder.is_deleted'=>0,'Deliveryorder.is_invoice_created'=>0),'group' => 'Deliveryorder.quotationno'));
              //pr($prepareinvoice_approved_list);exit;
        $approved_order_list   =    $this->Invoice->find('all',array('conditions'=>array('Invoice.is_approved'=>'1'),'recursive'=>3));
        //pr($approved_order_list);exit;
        $this->set(compact('unapproved_order_list','prepareinvoice_approved_list','approved_order_list'));
    }
    
    public function prepare()
    {
        //$prepareinvoice_approved_list   =    $this->Invoice->find('all',array('conditions'=>array('Invoice.is_approved'=>'1'),'recursive'=>3));
        //$this->set(compact('prepareinvoice_approved_list'));
    }
     
    
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
    public function preparein()
    {
        $this->autoRender   =   false;
        $quo_id= $this->request->data['id'];
        $quo_list    =   $this->Quotation->find('first',array('conditions'=>array('Quotation.is_approved'=>1,'Quotation.is_deleted'=>0,'Quotation.status'=>1),'recursive'=>4));
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
        $this->request->data['Invoice']['ref_no'] = $quo_list['Quotation']['ref_no'];
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