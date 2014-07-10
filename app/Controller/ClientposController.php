<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class ClientposController extends AppController
{
    public $helpers = array('Html','Form','Session');
    public $uses =array('Priority','Paymentterm','Quotation','Currency',
                            'Country','Additionalcharge','Service','CustomerInstrument','Customerspecialneed',
                            'Instrument','Brand','Customer','Device','Unit','Logactivity','InstrumentType',
                            'Contactpersoninfo','CusSalesperson','Clientpo');
    public function index()
    {
        $clientpo    =   $this->Customer->find('all',array('conditions'=>array('Customer.status'=>1,'Customer.is_deleted'=>0)));
        //pr($clientpo);exit;
        $this->set(compact('clientpo'));
    }
    public function Quotation_fullinvoice($id = null)
    {
        
          $customer_quotation_list=$this->Quotation->find('list',array('conditions'=>
                        array('Quotation.customer_id'=>$id,'Quotation.is_approved'=>1),'fields'=>array('id','quotationno')));
          $po_list=$this->Clientpo->find('all',array('conditions'=>array('Clientpo.customer_id'=>$id)));
          $po_single=$this->Clientpo->find('first',array('conditions'=>array('Clientpo.customer_id'=>$id)));
          $this->set(compact('po_list','customer_quotation_list'));
          if($this->request->is(array('post','put')))
          {
              $po_number_array  =   $this->request->data['clientpos_no'];
              $po_count_array   =   $this->request->data['po_quantity'];
              $po_array         = array_combine($po_number_array,$po_count_array);
              $clientpo_data_for_customer_id  =   $this->Clientpo->find('all',array('conditions'=>array('Clientpo.customer_id'=>$id)));
              if(count($clientpo_data_for_customer_id>0))
              {
                  $this->Clientpo->deleteAll(array('Clientpo.customer_id'=>$id));
              }
              foreach($po_array as $key=>$value)
              {
                    $this->Clientpo->create();
                    $this->request->data['Clientpo']['clientpos_no']=$key;
                    $this->request->data['Clientpo']['po_quantity']=$value;
                    $this->request->data['Clientpo']['quotation_no']=$this->request->data['quotation_no'];
                    $this->request->data['Clientpo']['quotation_id']=$this->request->data['quotation_id'];
                    $this->request->data['Clientpo']['quo_quantity']=$this->request->data['quo_quantity'];
                    $this->request->data['Clientpo']['salesorder_id ']=$this->request->data['salesorder_id'];
                    $this->request->data['Clientpo']['sales_quantity']=$this->request->data['sales_quantity'];
                    $this->request->data['Clientpo']['deliveryorder_id']=$this->request->data['deliveryorder_id'];
                    $this->request->data['Clientpo']['deliver_quantity']=$this->request->data['deliver_quantity'];
                    $this->request->data['Clientpo']['invoiceno']=$this->request->data['invoiceno'];
                    $this->request->data['Clientpo']['track_id']=$this->request->data['track_id'];
                    $this->request->data['Clientpo']['customer_id']=$id;
                    $this->Clientpo->save($this->request->data['Clientpo']);
              }

               
             
              $this->redirect(array('controller'=>'Clientpos','action'=>'index'));
          }
          
         
          //$this->set('clientpo', $clientpos);
    }
    public function Purchaseorder_fullinvoice($id = null)
    {
          $pos=$this->Clientpo->find('all',array('conditions'=>array('Clientpo.customer_id'=>$id)));
          $po_first=$this->Clientpo->find('first',array('conditions'=>array('Clientpo.customer_id'=>$id)));
          
          $this->set(compact('pos','po_first'));
          if($this->request->is(array('post','put')))
          {
              pr($this->request->data);exit;
              $po_number_array  =   $this->request->data['clientpos_no'];
              $po_count_array   =   $this->request->data['po_quantity'];
              $po_array         = array_combine($po_number_array,$po_count_array);
              $quotation_id = $this->request->data['quotation_id'];
              
              if($this->Clientpo->deleteAll(array('Clientpo.customer_id'=>$id)))
              {
                  foreach($po_array as $key=>$value)
                  {
                      $this->Clientpo->create();
                      $this->request->data['Clientpo']['clientpos_no']=$key;
                      $this->request->data['Clientpo']['po_quantity']=$value;
                      $this->request->data['Clientpo']['quotation_no']=$quotation_id;
                      $this->request->data['Clientpo']['quotation_id']=$this->request->data['quotation_id'];
                      $this->request->data['Clientpo']['quo_quantity']=$this->request->data['quo_quantity'];
                      $this->request->data['Clientpo']['salesorder_id ']=$this->request->data['salesorder_id'];
                      $this->request->data['Clientpo']['sales_quantity']=$this->request->data['sales_quantity'];
                      $this->request->data['Clientpo']['deliveryorder_id']=$this->request->data['deliveryorder_id'];
                      $this->request->data['Clientpo']['deliver_quantity']=$this->request->data['deliver_quantity'];
                      $this->request->data['Clientpo']['invoiceno']=$this->request->data['invoiceno'];
                      $this->request->data['Clientpo']['track_id']=$this->request->data['track_id'];
                      $this->request->data['Clientpo']['customer_id']=$this->request->data['customer_id'];
                      $this->Clientpo->save($this->request->data['Clientpo']);
                  }
                 
              }
              $this->redirect(array('controller'=>'Clientpos','action'=>'index'));
          }
          
         
          //$this->set('clientpo', $clientpos);
    }
    public function Salesorder_fullinvoice($id = null)
    {
          $pos=$this->Clientpo->find('all',array('conditions'=>array('Clientpo.quotation_id'=>$id)));
          $po_first=$this->Clientpo->find('first',array('conditions'=>array('Clientpo.quotation_id'=>$id)));
          pr($po_first);exit;
          $this->set(compact('pos','po_first'));
          if($this->request->is(array('post','put')))
          {
              $po_number_array  =   $this->request->data['clientpos_no'];
              $po_count_array   =   $this->request->data['po_quantity'];
              $po_array         = array_combine($po_number_array,$po_count_array);
              $quotation_id = $this->request->data['quotation_id'];
              
              if($this->Clientpo->deleteAll(array('Clientpo.quotation_id'=>$id)))
              {
                  foreach($po_array as $key=>$value)
                  {
                      $this->Clientpo->create();
                      $this->request->data['Clientpo']['clientpos_no']=$key;
                      $this->request->data['Clientpo']['po_quantity']=$value;
                      $this->request->data['Clientpo']['quotation_no']=$quotation_id;
                      $this->request->data['Clientpo']['quotation_id']=$id;
                      $this->request->data['Clientpo']['quo_quantity']=$this->request->data['quo_quantity'];
                      $this->request->data['Clientpo']['salesorder_id ']=$this->request->data['salesorder_id'];
                      $this->request->data['Clientpo']['sales_quantity']=$this->request->data['sales_quantity'];
                      $this->request->data['Clientpo']['deliveryorder_id']=$this->request->data['deliveryorder_id'];
                      $this->request->data['Clientpo']['deliver_quantity']=$this->request->data['deliver_quantity'];
                      $this->request->data['Clientpo']['invoiceno']=$this->request->data['invoiceno'];
                      $this->request->data['Clientpo']['track_id']=$this->request->data['track_id'];
                      $this->request->data['Clientpo']['customer_id']=$this->request->data['customer_id'];
                      $this->Clientpo->save($this->request->data['Clientpo']);
                  }
                 
              }
              $this->redirect(array('controller'=>'Clientpos','action'=>'index'));
          }
          
         
          //$this->set('clientpo', $clientpos);
    }
    public function Deliveryorder_fullinvoice($id = null)
    {
          $pos=$this->Clientpo->find('all',array('conditions'=>array('Clientpo.quotation_id'=>$id)));
          $po_first=$this->Clientpo->find('first',array('conditions'=>array('Clientpo.quotation_id'=>$id)));
          pr($po_first);exit;
          $this->set(compact('pos','po_first'));
          if($this->request->is(array('post','put')))
          {
              $po_number_array  =   $this->request->data['clientpos_no'];
              $po_count_array   =   $this->request->data['po_quantity'];
              $po_array         = array_combine($po_number_array,$po_count_array);
              $quotation_id = $this->request->data['quotation_id'];
              
              if($this->Clientpo->deleteAll(array('Clientpo.quotation_id'=>$id)))
              {
                  foreach($po_array as $key=>$value)
                  {
                      $this->Clientpo->create();
                      $this->request->data['Clientpo']['clientpos_no']=$key;
                      $this->request->data['Clientpo']['po_quantity']=$value;
                      $this->request->data['Clientpo']['quotation_no']=$quotation_id;
                      $this->request->data['Clientpo']['quotation_id']=$id;
                      $this->request->data['Clientpo']['quo_quantity']=$this->request->data['quo_quantity'];
                      $this->request->data['Clientpo']['salesorder_id ']=$this->request->data['salesorder_id'];
                      $this->request->data['Clientpo']['sales_quantity']=$this->request->data['sales_quantity'];
                      $this->request->data['Clientpo']['deliveryorder_id']=$this->request->data['deliveryorder_id'];
                      $this->request->data['Clientpo']['deliver_quantity']=$this->request->data['deliver_quantity'];
                      $this->request->data['Clientpo']['invoiceno']=$this->request->data['invoiceno'];
                      $this->request->data['Clientpo']['track_id']=$this->request->data['track_id'];
                      $this->request->data['Clientpo']['customer_id']=$this->request->data['customer_id'];
                      $this->Clientpo->save($this->request->data['Clientpo']);
                  }
                 
              }
              $this->redirect(array('controller'=>'Clientpos','action'=>'index'));
          }
          
         
          //$this->set('clientpo', $clientpos);
    }
    public function get_quotation_values()
    {
       $this->autoRender =   false;
       $quotation_id= $this->request->data['quotation_id'];
       if($quotation_id!=''){
            $quotation_details    =   $this->Quotation->find('first',array('conditions'=>array('Quotation.id'=>$quotation_id,'Quotation.is_approved'=>1)));
            if(!empty($quotation_details ))
            {
               echo json_encode($quotation_details);
            }
       }
       
    }
}