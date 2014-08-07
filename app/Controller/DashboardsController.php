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
                            'Instrument','Brand','Customer','Device','Salesorder','Deliveryorder','Logactivity','Datalog');
    public function index()
    {
        /*  
         * User Role Session
         */
       // $this->random();
        
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
        
        /****************** Log Activity  ********************/
        //$logactivity = $this->Logactivity->find('all',array('conditions'=>array('Logactivity.logapprove'=>1)));
        //pr($logactivity);exit;
        //$this->set('log_activity', $logactivity);
        /*****************************************************/
        
        /****************** Log Activity - Instrument ********************/
        
        $logactivity_instrument = $this->Logactivity->find('all',array('conditions'=>array('Logactivity.logapprove'=>1,'Logactivity.logname'=>"Instrument")));
        //pr($logactivity);exit;
        $this->set('log_activity_instrument', $logactivity_instrument);
        
        $logactivity_instrument_count = $this->Logactivity->find('count',array('conditions'=>array('Logactivity.logapprove'=>1,'Logactivity.logname'=>"Instrument")));
        //pr($logactivity);exit;
        $this->set('log_activity_instrument_count', $logactivity_instrument_count);
        
        /*****************************************************/
        /****************** Log Activity - Procedure No ********************/
        
        $logactivity_procedure = $this->Logactivity->find('all',array('conditions'=>array('Logactivity.logapprove'=>1,'Logactivity.logname'=>"Procedure No")));
        //pr($logactivity);exit;
        $this->set('log_activity_procedure', $logactivity_procedure);
        
        $logactivity_procedure_count = $this->Logactivity->find('count',array('conditions'=>array('Logactivity.logapprove'=>1,'Logactivity.logname'=>"Procedure No")));
        //pr($logactivity);exit;
        $this->set('log_activity_procedure_count', $logactivity_procedure_count);
        
        /*****************************************************/
        
        /****************** Log Activity - Unit ********************/
        
        $logactivity_unit = $this->Logactivity->find('all',array('conditions'=>array('Logactivity.logapprove'=>1,'Logactivity.logname'=>"Unit")));
        //pr($logactivity);exit;
        $this->set('log_activity_unit', $logactivity_unit);
        
        $logactivity_unit_count = $this->Logactivity->find('count',array('conditions'=>array('Logactivity.logapprove'=>1,'Logactivity.logname'=>"Unit")));
        //pr($logactivity);exit;
        $this->set('log_activity_unit_count', $logactivity_unit_count);
        
        /*****************************************************/
        
        /****************** Log Activity - Range ********************/
        
        $logactivity_range = $this->Logactivity->find('all',array('conditions'=>array('Logactivity.logapprove'=>1,'Logactivity.logname'=>"Range")));
        //pr($logactivity);exit;
        $this->set('log_activity_range', $logactivity_range);
        
        $logactivity_range_count = $this->Logactivity->find('count',array('conditions'=>array('Logactivity.logapprove'=>1,'Logactivity.logname'=>"Range")));
        //pr($logactivity);exit;
        $this->set('log_activity_range_count', $logactivity_range_count);
        
        /*****************************************************/
        
        /****************** Log Activity - Quotation ********************/
        
        $logactivity_quotation = $this->Logactivity->find('all',array('conditions'=>array('Logactivity.logapprove'=>1,'Logactivity.logname'=>"Quotation")));
        //pr($logactivity);exit;
        $this->set('log_activity_quotation', $logactivity_quotation);
        
        /*****************************************************/
        
        /****************** Log Activity - Sales Order ********************/
        
        $logactivity_salesorder = $this->Logactivity->find('all',array('conditions'=>array('Logactivity.logapprove'=>1,'Logactivity.logname'=>"Salesorder")));
        //pr($logactivity_salesorder);exit;
        $this->set('log_activity_salesorder', $logactivity_salesorder);
        
        /*****************************************************/
        
        /****************** Log Activity - Delivery Order ********************/
        
        $logactivity_deliveryorder = $this->Logactivity->find('all',array('conditions'=>array('Logactivity.logapprove'=>1,'Logactivity.logname'=>"Deliveryorder")));
        //pr($logactivity);exit;
        $this->set('log_activity_labprocess', $logactivity_deliveryorder);
        
        /*****************************************************/
        
         /****************** Log Activity - C & D Info ********************/
        
        $logactivity_cdinfo = $this->Logactivity->find('all',array('conditions'=>array('Logactivity.logapprove'=>1,'Logactivity.logname'=>"C&Dinfo")));
        //pr($logactivity);exit;
        $this->set('log_activity_cdinfo', $logactivity_cdinfo);
        
        /*****************************************************/
        
         /****************** Log Activity - Invoice ********************/
        
        $logactivity_invoice = $this->Logactivity->find('all',array('conditions'=>array('Logactivity.logapprove'=>1,'Logactivity.logname'=>"Invoice")));
        //pr($logactivity);exit;
        $this->set('log_activity_invoice', $logactivity_invoice);
        
        /*****************************************************/
        
        
        /****************** DataLog ********************/
        
        //$logactivity_message = $this->Datalog->find('all',array('conditions'=>array('Datalog.logapprove'=>0)));
        $logactivity_message = $this->Datalog->find('all');
        //pr($logactivity_message);exit;
        $this->set('log_activity_message', $logactivity_message);
        $logactivity_message_count = $this->Datalog->find('count');
        $this->set('log_activity_message_count', $logactivity_message_count);
        /*****************************************************/
       
      
    }
}