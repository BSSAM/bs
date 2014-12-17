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
        $user_role = $this->userrole_permission();
        $this->set('user_role', $user_role);
        $sess_userrole = $this->Session->read('sess_userrole');
        $this->set('user_me', $sess_userrole);
        
        /* Customer */
        $data_cus = $this->Customer->find('count');
        $this->set('total_customer_count', $data_cus);
        $data_quo = $this->Quotation->find('count');
        $this->set('total_quotation_count', $data_quo);
        $data_quo_view = $this->Quotation->find('count',array('conditions'=>array('Quotation.view'=>'0')));
        $this->set('total_quotation_view', $data_quo_view);
        $data_quo_view_by_date = $this->Quotation->find('all',array('conditions'=>array('Quotation.is_approved'=>2)));
        $this->set('data_quo_view_by_date', $data_quo_view_by_date);
        /* Sales Order */
        $data_sales = $this->Salesorder->find('count');
        $this->set('total_salesorder_count', $data_sales);
        //Purchase order
         $data_pur = $this->Quotation->find('count',array('conditions'=>array('Quotation.is_pocount_satisfied'=>'0','Quotation.is_poapproved'=>'0')));
        $this->set('total_po_count', $data_pur);
        $data_sales_view = $this->Salesorder->find('count',array('conditions'=>array('Salesorder.view'=>'0')));
        $this->set('total_salesorder_view', $data_sales_view);
        /* Lab Process */
        $data_lab = $this->Salesorder->find('count',array('conditions'=>array('Salesorder.is_approved'=>'1')));
        $this->set('total_labprocess_count', $data_lab);
        $data_invoice = $this->Deliveryorder->find('count',array('conditions'=>array('Deliveryorder.is_invoice_created'=>'1')));
        $this->set('total_invoice_count', $data_invoice);
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
         /****************** Log Activity - Brand ********************/
        
        $logactivity_brand = $this->Logactivity->find('all',array('conditions'=>array('Logactivity.logapprove'=>1,'Logactivity.logname'=>"Brand")));
        //pr($logactivity);exit;
        $this->set('log_activity_brand', $logactivity_brand);
        
        $logactivity_brand_count = $this->Logactivity->find('count',array('conditions'=>array('Logactivity.logapprove'=>1,'Logactivity.logname'=>"Brand")));
        //pr($logactivity);exit;
        $this->set('log_activity_brand_count', $logactivity_brand_count);
        
        /*****************************************************/
         /****************** Log Activity - Instrument For Group ********************/
        
        $logactivity_group = $this->Logactivity->find('all',array('conditions'=>array('Logactivity.logapprove'=>1,'Logactivity.logname'=>"Instrument For Group")));
        //pr($logactivity);exit;
        $this->set('log_activity_group', $logactivity_group);
        
        $logactivity_group_count = $this->Logactivity->find('count',array('conditions'=>array('Logactivity.logapprove'=>1,'Logactivity.logname'=>"Instrument For Group")));
        //pr($logactivity);exit;
        $this->set('log_activity_group_count', $logactivity_group_count);
        
        /*****************************************************/
        
        /****************** Log Activity - Customer ********************/
        
        $logactivity_customer = $this->Logactivity->find('all',array('conditions'=>array('Logactivity.logapprove'=>1,'Logactivity.logname'=>"Customer")));
        //pr($logactivity);exit;
        $this->set('log_activity_customer', $logactivity_customer);
        
        $logactivity_customer_count = $this->Logactivity->find('count',array('conditions'=>array('Logactivity.logapprove'=>1,'Logactivity.logname'=>"Customer")));
        //pr($logactivity);exit;
        $this->set('log_activity_customer_count', $logactivity_customer_count);
        
        $logactivity_customertag = $this->Logactivity->find('all',array('conditions'=>array('Logactivity.logapprove'=>1,'Logactivity.logname'=>"CustomerTagList")));
        //pr($logactivity);exit;
        $this->set('log_activity_customertag', $logactivity_customertag);
        
        $logactivity_customertag_count = $this->Logactivity->find('count',array('conditions'=>array('Logactivity.logapprove'=>1,'Logactivity.logname'=>"CustomerTagList")));
        //pr($logactivity);exit;
        $this->set('log_activity_customertag_count', $logactivity_customertag_count);
        
        /*****************************************************/
        
        /****************** Log Activity - Quotation ********************/
        
        $logactivity_quotation = $this->Logactivity->find('all',array('conditions'=>array('Logactivity.logapprove'=>1,'Logactivity.logname'=>"Quotation")));
        //pr($logactivity);exit;
        $this->set('log_activity_quotation', $logactivity_quotation);
        
        $logactivity_quotation_count = $this->Logactivity->find('count',array('conditions'=>array('Logactivity.logapprove'=>1,'Logactivity.logname'=>"Quotation")));
        //pr($logactivity);exit;
        $this->set('log_activity_quotation_count', $logactivity_quotation_count);
        
        /*****************************************************/
        
        /****************** Log Activity - Sales Order ********************/
        
        $logactivity_salesorder = $this->Logactivity->find('all',array('conditions'=>array('Logactivity.logapprove'=>1,'Logactivity.logname'=>"Salesorder")));
        //pr($logactivity_salesorder);exit;
        $this->set('log_activity_salesorder', $logactivity_salesorder);
        
        $logactivity_salesorder_count = $this->Logactivity->find('count',array('conditions'=>array('Logactivity.logapprove'=>1,'Logactivity.logname'=>"Salesorder")));
        //pr($logactivity);exit;
        $this->set('log_activity_salesorder_count', $logactivity_salesorder_count);
        
        /*****************************************************/
        
        /****************** Log Activity - Delivery Order ********************/
        
        $logactivity_deliveryorder = $this->Logactivity->find('all',array('conditions'=>array('Logactivity.logapprove'=>1,'Logactivity.logname'=>"Deliveryorder")));
        $logactivity_deliveryorder_count1 = 0;
        $logactivity_deliveryorder_count2 = 0;
        $log_del = '';
        foreach($logactivity_deliveryorder as $delivery_details):
            
            $deli_no = $delivery_details['Logactivity']['logno'];
            $deliveryorder=$this->Deliveryorder->find('first',array('conditions'=>array('Deliveryorder.delivery_order_no'=>$deli_no),'recursive'=>2));
            //pr($deli_no); 
            $logactivity_deliveryorder = '';
            if($deliveryorder['Deliveryorder']['is_poapproved']==1 && $deliveryorder['Customer']['acknowledgement_type_id']==1):
               
                $logactivity_deliveryorder = $this->Logactivity->find('all',array('conditions'=>array('Logactivity.logapprove'=>1,'Logactivity.logname'=>"Deliveryorder",'Logactivity.logno'=>$deli_no)));
                
                $logactivity_deliveryorder_count1 = $logactivity_deliveryorder_count1 + $this->Logactivity->find('count',array('conditions'=>array('Logactivity.logapprove'=>1,'Logactivity.logname'=>"Deliveryorder",'Logactivity.logno'=>$deli_no)));
            
            endif;
            
            if($deliveryorder['Customer']['acknowledgement_type_id']!=1): 
                
                $logactivity_deliveryorder = $this->Logactivity->find('all',array('conditions'=>array('Logactivity.logapprove'=>1,'Logactivity.logname'=>"Deliveryorder",'Logactivity.logno'=>$deli_no)));
                
                $logactivity_deliveryorder_count2 = $logactivity_deliveryorder_count2 + $this->Logactivity->find('count',array('conditions'=>array('Logactivity.logapprove'=>1,'Logactivity.logname'=>"Deliveryorder",'Logactivity.logno'=>$deli_no)));
            
            endif;
            //pr($logactivity_deliveryorder);
            $log_del[] = $logactivity_deliveryorder;
        endforeach;
        
        $count = $logactivity_deliveryorder_count1 + $logactivity_deliveryorder_count2;
        //pr($log_del);
        //exit;
        if(is_array($log_del)):
            $this->set('log_activity_deliveryorder', array_filter($log_del));
            $this->set('log_activity_deliveryorder_count', $count);
        else:
            $this->set('log_activity_deliveryorder', $log_del);
            $this->set('log_activity_deliveryorder_count', $count);
        endif;
        /*****************************************************/
        
         /****************** Log Activity - C & D Info ********************/
        
        $logactivity_cdinfo = $this->Logactivity->find('all',array('conditions'=>array('Logactivity.logapprove'=>1,'Logactivity.logname'=>"C&Dinfo")));
        //pr($logactivity);exit;
        $this->set('log_activity_cdinfo', $logactivity_cdinfo);
        
        $logactivity_cdinfo_count = $this->Logactivity->find('count',array('conditions'=>array('Logactivity.logapprove'=>1,'Logactivity.logname'=>"C&Dinfo")));
        //pr($logactivity);exit;
        $this->set('log_activity_cdinfo_count', $logactivity_cdinfo_count);
        /*****************************************************/
         /****************** Log Activity - Client PO ********************/
        
        $logactivity_client = $this->Logactivity->find('all',array('conditions'=>array('Logactivity.logapprove'=>1,'Logactivity.logname'=>"ClientPO")));
        //pr($logactivity);exit;
        $this->set('log_activity_client', $logactivity_client);
        
        $logactivity_client_count = $this->Logactivity->find('count',array('conditions'=>array('Logactivity.logapprove'=>1,'Logactivity.logname'=>"ClientPO")));
        //pr($logactivity);exit;
        $this->set('log_activity_client_count', $logactivity_client_count);
        /*****************************************************/
         /****************** Log Activity - PR Manager ********************/
        
        $logactivity_prman = $this->Logactivity->find('all',array('conditions'=>array('Logactivity.logapprove'=>1,'Logactivity.logname'=>"Prequisition",'Logactivity.logactivity'=>"Add Manager")));
        //pr($logactivity);exit;
        $this->set('log_activity_prman', $logactivity_prman);
        
        $logactivity_prman_count = $this->Logactivity->find('count',array('conditions'=>array('Logactivity.logapprove'=>1,'Logactivity.logname'=>"Prequisition",'Logactivity.logactivity'=>"Add Manager")));
        //pr($logactivity);exit;
        $this->set('log_activity_prman_count', $logactivity_prman_count);
        /*****************************************************/
         /****************** Log Activity - PR Supervisor ********************/
        
        $logactivity_prsuper = $this->Logactivity->find('all',array('conditions'=>array('Logactivity.logapprove'=>1,'Logactivity.logname'=>"Prequisition",'Logactivity.logactivity'=>"Add Supervisor")));
        //pr($logactivity);exit;
        $this->set('log_activity_prsuper', $logactivity_prsuper);
        
        $logactivity_prsuper_count = $this->Logactivity->find('count',array('conditions'=>array('Logactivity.logapprove'=>1,'Logactivity.logname'=>"Prequisition",'Logactivity.logactivity'=>"Add Supervisor")));
        //pr($logactivity);exit;
        $this->set('log_activity_prsuper_count', $logactivity_prsuper_count);
        /*****************************************************/
        
        /****************** Log Activity - PR Purchase Order ********************/
        
        $logactivity_prpur = $this->Logactivity->find('all',array('conditions'=>array('Logactivity.logapprove'=>1,'Logactivity.logname'=>"PRPurchase")));
        //pr($logactivity);exit;
        $this->set('log_activity_prpur', $logactivity_prpur);
        
        $logactivity_prpur_count = $this->Logactivity->find('count',array('conditions'=>array('Logactivity.logapprove'=>1,'Logactivity.logname'=>"PRPurchase")));
        //pr($logactivity);exit;
        $this->set('log_activity_prpur_count', $logactivity_prpur_count);
        /*****************************************************/
        
         /****************** Log Activity - Invoice ********************/
        
        $logactivity_invoice = $this->Logactivity->find('all',array('conditions'=>array('Logactivity.logapprove'=>1,'Logactivity.logname'=>"Invoice")));
        //pr($logactivity);exit;
        $this->set('log_activity_invoice', $logactivity_invoice);
        $logactivity_invoice_count = $this->Logactivity->find('count',array('conditions'=>array('Logactivity.logapprove'=>1,'Logactivity.logname'=>"Invoice")));
        //pr($logactivity);exit;
        $this->set('log_activity_invoice_count', $logactivity_invoice_count);
        
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
    
    public function GetEvents()
    {
        
    }
}