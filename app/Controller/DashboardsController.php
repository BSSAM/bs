<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class DashboardsController extends AppController
{
    public $helpers = array('Html','Form','Session');
    public $uses =array('Priority','Paymentterm','Quotation','Currency',
                            'Country','Additionalcharge','Service','CustomerInstrument','Customerspecialneed',
                            'Instrument','Brand','Customer','Device','Salesorder','Deliveryorder','Logactivity');
    public function index()
    {
        /*  
         * User Role Session
         */
        $sess_userrole = $this->Session->read('sess_userrole');
        $this->set('user_me', $sess_userrole);
        
        /* Quotation */
        $data_quo = $this->Quotation->find('count');
        $this->set('total_quotation_count', $data_quo);
        $data_quo_view = $this->Quotation->find('count',array('conditions'=>array('Quotation.view'=>'0')));
        $this->set('total_quotation_view', $data_quo_view);
        /* Sales Order */
        $data_sales = $this->Salesorder->find('count');
        $this->set('total_salesorder_count', $data_sales);
        $data_sales_view = $this->Salesorder->find('count',array('conditions'=>array('Salesorder.view'=>'0')));
        $this->set('total_salesorder_view', $data_sales_view);
        /* Lab Process */
        $data_lab = $this->Salesorder->find('count',array('conditions'=>array('Salesorder.is_approved'=>'1')));
        $this->set('total_labprocess_count', $data_lab);
        $data_lab_view = $this->Salesorder->find('count',array('conditions'=>array('Salesorder.view'=>'0','Salesorder.is_approved'=>'1')));
        $this->set('total_labprocess_view', $data_lab_view);
        /* Delivery Order */
        $data_delivery = $this->Deliveryorder->find('count',array('conditions'=>array('Deliveryorder.status'=>'1')));
        $this->set('total_delivery_count', $data_delivery);
        $data_delivery_view = $this->Deliveryorder->find('count',array('conditions'=>array('Deliveryorder.view'=>'0','Deliveryorder.status'=>'1')));
        $this->set('total_delivery_view', $data_delivery_view);
        $logactivity_count = $this->Logactivity->find('count',array('conditions'=>array('Logactivity.logapprove'=>1)));
        $this->set('log_activity_count', $logactivity_count);
        $logactivity = $this->Logactivity->find('all',array('conditions'=>array('Logactivity.logapprove'=>1)));
        //pr($logactivity);exit;
        $this->set('log_activity', $logactivity);
        
        $logactivity_message = $this->Logactivity->find('all',array('conditions'=>array('Logactivity.logapprove'=>0)));
        //pr($logactivity);exit;
        $this->set('log_activity_message', $logactivity_message);
      
    }
}