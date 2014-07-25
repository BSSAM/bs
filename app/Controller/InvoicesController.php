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
    public $uses    =   array('Deliveryorder','Invoice');
    public function index()
    {
       
        $unapproved_order_list    =   $this->Invoice->find('all',array('conditions'=>array('Invoice.is_approved'=>'0'),'recursive'=>4));
        //pr($unapproved_order_list);exit;
        
        $prepareinvoice_approved_list    =   $this->Deliveryorder->find('all',array('conditions'=>array('Deliveryorder.is_approved'=>1,'Deliveryorder.status'=>1)));
//              pr($prepareinvoice_approved_list);exit;
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