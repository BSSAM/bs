<?php
/**
 * Application level View Helper
 *
 * This file is application-wide helper file. You can put all
 * application-wide helper-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Helper
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Helper', 'View');

/**
 * Application helper
 *
 * Add your application-wide methods in the class below, your helpers
 * will inherit them.
 *
 * @package       app.View.Helper
 */
class SalesorderHelper extends AppHelper 
{
    public $uses    =   array('Salesorder','Description','Quotation');
    public function query_total($id = null)
    {
        APP::import('Model','Salesorder');
        $this->Salesorder   =   new Salesorder();
        $data_count = $this->Salesorder->find('all',array('conditions'=>array('Salesorder.is_approved'=>1,'Salesorder.id'=>$id),'group' => array('Salesorder.salesorderno')));
        return count($data_count[0]['Description']);
    }
    public function query_checking($id = null)
    {
        APP::import('Model','Salesorder');
        $this->Salesorder   =   new Salesorder();
        $data_count = $this->Salesorder->find('all',array('contain'=>array("Description" => array("conditions" => array("Description.checking" => 1,'Description.is_deleted'=>0))) ,'conditions'=>array('Salesorder.is_approved'=>1,'Salesorder.id'=>$id),'group' => array('Salesorder.salesorderno')));
       // pr(count($data_count[0]['Description']));exit;
        return count($data_count[0]['Description']);
    }
    
    public function query_processing($id = null)
    {
        APP::import('Model','Salesorder');
        $this->Salesorder   =   new Salesorder();
        $data_count = $this->Salesorder->find('all',array('contain'=>array("Description" => array("conditions" => array("Description.processing" => 1,"Description.checking !=" => 1,'Description.is_deleted'=>0))) ,'conditions'=>array('Salesorder.is_approved'=>1,'Salesorder.id'=>$id),'group' => array('Salesorder.salesorderno')));
       // pr(count($data_count[0]['Description']));exit;
        return count($data_count[0]['Description']);
    }
    
    
    public function query_pending($id = null)
    {
        APP::import('Model','Description');
        APP::import('Model','Salesorder');
        $this->Salesorder   =   new Salesorder();
        //$data_count_checking = $this->Salesorder->find('all',array('contain'=>array("Description" => array("conditions" => array("Description.checking" => 1))) ,'conditions'=>array('Salesorder.is_approved'=>1,'Salesorder.id'=>$id),'group' => array('Salesorder.salesorderno')));
        $data_count_processing = $this->Salesorder->find('all',array('contain'=>array("Description" => array("conditions" => array('AND'=>array("Description.processing" => 0,"Description.checking" => 0,'Description.is_deleted'=>0)))) ,'conditions'=>array('Salesorder.is_approved'=>1,'Salesorder.id'=>$id),'group' => array('Salesorder.salesorderno')));
        //$data_count_total = $this->Salesorder->find('all',array('conditions'=>array('Salesorder.is_approved'=>1,'Salesorder.id'=>$id),'group' => array('Salesorder.salesorderno')));
       // pr(count($data_count[0]['Description']));exit;
        $pending = count($data_count_processing[0]['Description']);
        return $pending;
    }
    public function call_query_total($id = null,$call_loc=NULL)
    {
        APP::import('Model','Description');
        if($call_loc=='all'):
            $conditions =    array('Description.is_deleted'=>0);
            else:
             $conditions =    array("Description.sales_calllocation" => $call_loc,'Description.is_deleted'=>0);
        endif;
        APP::import('Model','Salesorder');
        $this->Salesorder   =   new Salesorder();
        $data_count = $this->Salesorder->find('all',array('contain'=>array("Description" => array("conditions" => $conditions)),'conditions'=>array('Salesorder.is_approved'=>1,'Salesorder.id'=>$id),'group' => array('Salesorder.salesorderno')));
        return count($data_count[0]['Description']);
    }
    public function call_query_checking($id = null,$call_loc=NULL)
    {
        APP::import('Model','Description');
        $call_location  =   ($call_loc=='all')?'':$call_loc;
        APP::import('Model','Salesorder');
        $this->Salesorder   =   new Salesorder();
        $data_count = $this->Salesorder->find('all',array('contain'=>array("Description" => array("conditions" => array("Description.sales_calllocation" => $call_location,"Description.checking" => 1,'Description.is_deleted'=>0))) ,'conditions'=>array('Salesorder.is_approved'=>1,'Salesorder.id'=>$id),'group' => array('Salesorder.salesorderno')));
        // pr(count($data_count[0]['Description']));exit;
        return count($data_count[0]['Description']);
    }
    
    public function call_query_processing($id = null,$call_loc=NULL)
    {
        APP::import('Model','Description');
        if($call_loc=='all'):
            $conditions =   array("Description.processing" => 1);
            else:
             $conditions =   array("Description.processing" => 1,"Description.sales_calllocation" => $call_loc);
        endif;
        $call_location  =   ($call_loc=='all')?'':$call_loc;
        APP::import('Model','Salesorder');
        $this->Salesorder   =   new Salesorder();
        $data_count = $this->Salesorder->find('all',array('contain'=>array("Description" => array("conditions" => $conditions,'Description.is_deleted'=>0)) ,'conditions'=>array('Salesorder.is_approved'=>1,'Salesorder.id'=>$id),'group' => array('Salesorder.salesorderno')));
        // pr(count($data_count[0]['Description']));exit;
        return count($data_count[0]['Description']);
    }
    
    
    public function call_query_pending($id = null,$call_loc=NULL)
    {
        APP::import('Model','Description');
        if($call_loc=='all'):
            $conditions =   array('AND'=>array("Description.processing" => 0,"Description.checking" => 0));
            else:
             $conditions =   array('AND'=>array("Description.processing" => 0,"Description.checking" => 0,"Description.sales_calllocation" =>$call_loc));
        endif;
        APP::import('Model','Salesorder');
         
        $this->Salesorder   =   new Salesorder();
        $data_count_processing = $this->Salesorder->find('all',array('contain'=>array("Description" => array("conditions" => $conditions,'Description.is_deleted'=>0)) ,'conditions'=>array('Salesorder.is_approved'=>1,'Salesorder.id'=>$id),'group' => array('Salesorder.salesorderno')));
        //pr($data_count_processing[0]['Description']);exit;
        $data_count_total = $this->Salesorder->find('all',array('conditions'=>array('Salesorder.is_approved'=>1,'Salesorder.id'=>$id),'group' => array('Salesorder.salesorderno')));
        $pending = count($data_count_processing[0]['Description']);
        return $pending;
       
    }
    
    public function quotation_ret($id = null)
    {
        APP::import('Model','Salesorder');
        $this->Salesorder   =   new Salesorder();
        $data_count = $this->Salesorder->find('all',array('conditions'=>array('Salesorder.is_approved'=>1,'Salesorder.id'=>$id),'group' => array('Salesorder.salesorderno')));
        return count($data_count[0]['Description']);
    }
    public function find_sales_order($quotation_id=NULL)
    {
        APP::import('Model','Salesorder');
        $this->Salesorder   =   new Salesorder();
        $quotation = $this->Salesorder->find('all',array('conditions'=>array('Salesorder.quotationno'=>$quotation_id,'Salesorder.is_approved'=>1)));
        foreach($quotation as $quotation_list):
            $sales[] = $quotation_list['Salesorder']['id'];
        endforeach;
        $sales = implode(',',$sales);
        return $sales;
    }
    public function find_quo($quotation_id=NULL)
    {
        APP::import('Model','Quotation');
        $this->Quotation   =   new Quotation();
        $quotation = $this->Quotation->find('all',array('conditions'=>array('Quotation.ref_no'=>$quotation_id,'Quotation.is_approved'=>1)));
        foreach($quotation as $quotation_list):
            $sales[] = $quotation_list['Quotation']['quotationno'];
        endforeach;
        $sales = implode(',',$sales);
        return $sales;
    }
    public function find_sales_order_po($quotation_id=NULL)
    {
        APP::import('Model','Salesorder');
        $this->Salesorder   =   new Salesorder();
        $quotation = $this->Salesorder->find('all',array('conditions'=>array('Salesorder.ref_no'=>$quotation_id,'Salesorder.is_approved'=>1)));
        foreach($quotation as $quotation_list):
            $sales[] = $quotation_list['Salesorder']['id'];
        endforeach;
        $sales = implode(',',$sales);
        return $sales;
    }
    
    public function find_sales_order_customer($sales_id=NULL)
    {
        APP::import('Model','Salesorder');
        APP::import('Model','Customer');
        $this->Salesorder   =   new Salesorder();
        $this->Customer   =   new Customer();
        $salesorder = $this->Salesorder->find('first',array('conditions'=>array('Salesorder.id'=>$sales_id,'Salesorder.is_approved'=>1)));
        $sales_customer = $salesorder['Salesorder']['customer_id'];
        $customer = $this->Customer->find('first',array('conditions'=>array('Customer.id'=>$sales_customer,'Customer.is_approved'=>1)));
        $customer_name = $customer['Customer']['customername'];
        return $customer_name;
    }
    public function find_deliveryorder_nos($sales_id=NULL)
    {
        APP::import('Model','Deliveryorder');
        $this->Deliveryorder   =   new Deliveryorder();
        //$id1 = implode(',',$id);
        $sales = $this->Deliveryorder->find('count',array('conditions'=>array('Deliveryorder.salesorder_id'=>$sales_id)));
        return $sales;
    }
    
    public function find_deliveryorder_no($sales_id = null)
    {
       APP::import('Model','Deliveryorder');
        $this->Deliveryorder   =   new Deliveryorder();
        //$id1 = implode(',',$id);
        $sales = $this->Deliveryorder->find('all',array('conditions'=>array('Deliveryorder.salesorder_id'=>$sales_id)));
        $sa = array();
        foreach($sales as $sales1):
            $sa[] = $sales1['Deliveryorder']['delivery_order_no'];
        endforeach;
        $id1 = implode(',',$sa);
        return $id1;
    }
    public function find_deliveryorder_date($sales_id = null)
    {
       APP::import('Model','Deliveryorder');
        $this->Deliveryorder   =   new Deliveryorder();
        //$id1 = implode(',',$id);
        $sales = $this->Deliveryorder->find('all',array('conditions'=>array('Deliveryorder.salesorder_id'=>$sales_id)));
        $sa = array();
        foreach($sales as $sales1):
            $sa[] = $sales1['Deliveryorder']['delivery_order_date'];
        endforeach;
        $id1 = implode(',',$sa);
        return $id1;
    }
    public function find_invoice_no($sales_id = null)
    {
       APP::import('Model','Invoice');
        $this->Invoice   =   new Invoice();
        //$id1 = implode(',',$id);
        $sales = $this->Invoice->find('all',array('conditions'=>array('Invoice.salesorder_id'=>$sales_id)));
        $sa = array();
        foreach($sales as $sales1):
            $sa[] = $sales1['Invoice']['invoiceno'];
        endforeach;
        $id1 = implode(',',$sa);
        return $id1;
    }
    public function find_invoice_date($sales_id = null)
    {
       APP::import('Model','Invoice');
        $this->Invoice   =   new Invoice();
        //$id1 = implode(',',$id);
        $sales = $this->Invoice->find('all',array('conditions'=>array('Invoice.salesorder_id'=>$sales_id)));
        $sa = array();
        foreach($sales as $sales1):
            $sa[] = $sales1['Invoice']['invoice_date'];
        endforeach;
        $id1 = implode(',',$sa);
        return $id1;
    }
    
    public function salesperson($attn=NULL)
    {
        APP::import('Model','Contactpersoninfo');
        $this->Contactpersoninfo  =   new Contactpersoninfo();
        $sales_person  =    $this->Contactpersoninfo->find('first',array('conditions'=>array('Contactpersoninfo.id'=>$attn)));
        return $sales_person['Contactpersoninfo']['name'];
    }
    public function getservicetype($id=NULL)
    {
        APP::import('Model','Service');
        $this->Service   =   new Service();
        $service=$this->Service->find('first',array('conditions'=>array('Service.id'=>$id)));
        return $service['Service']['servicetype'];
    }
    public function getinvoiceno($id=NULL)
    {
        APP::import('Model','Invoice');
        $this->Invoice   =   new Invoice();
        $invoice=$this->Invoice->find('first',array('conditions'=>array('Invoice.salesorder_id'=>$id)));
        return $invoice['Invoice']['invoiceno'];
    }
    public function getinvoicedate($id=NULL)
    {
        APP::import('Model','Invoice');
        $this->Invoice   =   new Invoice();
        $invoice=$this->Invoice->find('first',array('conditions'=>array('Invoice.salesorder_id'=>$id)));
        return $invoice['Invoice']['invoice_date'];
    }
    public function getinvoicebranch($id=NULL)
    {
        APP::import('Model','Branch');
        $this->Branch   =   new Branch();
        $invoice=$this->Branch->find('first',array('conditions'=>array('Branch.id'=>$id)));
        return $invoice['Branch']['branchname'];
    }
    public function getinvoicedelno($id=NULL)
    {
        APP::import('Model','Invoice');
        $this->Invoice   =   new Invoice();
        $invoice=$this->Invoice->find('first',array('conditions'=>array('Invoice.salesorder_id'=>$id)));
        return $invoice['Invoice']['deliveryorder_id'];
    }
    public function getinvoicedelapprove($id=NULL)
    {
        APP::import('Model','Invoice');
        $this->Invoice   =   new Invoice();
        $invoice=$this->Invoice->find('first',array('conditions'=>array('Invoice.salesorder_id'=>$id)));
        return $invoice['Invoice']['is_approved'];
    }
    
}
