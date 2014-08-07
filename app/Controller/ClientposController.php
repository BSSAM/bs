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
          $this->set(compact('po_list','customer_quotation_list','po_single'));
          if($this->request->is(array('post','put')))
          {
              $po_number_array  =   $this->request->data['clientpos_no'];
              $po_count_array   =   $this->request->data['po_quantity'];
              $po_array         = array_combine($po_number_array,$po_count_array);
              $clientpo_data_for_customer_id  =   $this->Clientpo->find('all',array('conditions'=>array('Clientpo.quotation_id'=>$this->request->data['quotation_id'])));
              if(count($clientpo_data_for_customer_id>0))
              {
                  $this->Clientpo->deleteAll(array('Clientpo.quotation_id'=>$this->request->data['quotation_id']));
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
      
        
        $customer_quotation_list=$this->Quotation->find('all',array('conditions'=>
                        array('Quotation.customer_id'=>$id,'Quotation.is_approved'=>1,'Quotation.is_assign_po'=>0)));
        $quotation_array_id=array();
        foreach($customer_quotation_list as $quo)
        {
            $quotation_array_id[count($quo['Device'])] = $quo['Quotation']['quotationno'];
        }
        $po_list=$this->Clientpo->find('all',array('conditions'=>array('Clientpo.customer_id'=>$id)));
        $po_single=$this->Clientpo->find('first',array('conditions'=>array('Clientpo.customer_id'=>$id)));
        $this->set(compact('po_list','customer_quotation_list','pos','po_first','po_single','quotation_array_id'));
        $this->set('customer_id',$id);
        if($this->request->is(array('post','put')))
        {
            $clientpo_number    =   $this->request->data['clientpo_no'];
            $clientpo_quantity    =   $this->request->data['po_quantity'];
             //For Quotation array
            $qo_id_array  =   $this->request->data['quotation_no'];
            $qo_count_array   =   $this->request->data['quo_quantity'];
            $qo_array         = array_combine($qo_id_array,$qo_count_array);
            
            //For Sales order array
            $so_id_array  =   $this->request->data['salesorder_id'];
            $so_count_array   =   $this->request->data['sales_quantity'];
            $so_array         = array_combine($so_id_array,$so_count_array);
            
            //For Delivery order Array
            $do_id_array  =   $this->request->data['deliveryorder_id'];
            $do_count_array   =   $this->request->data['delivery_quantity'];
            $do_array         = array_combine($do_id_array,$do_count_array);
            
             pr($this->request->data);exit;
            
           
            
            $quotation_no = $this->request->data['quotation_no'];
            
            $clientpo_data_for_customer_id  =   $this->Clientpo->find('all',array('conditions'=>array('Clientpo.clientpos_no'=>$this->request->data['clientpo_no'])));
            if(count($clientpo_data_for_customer_id>0))
            {
                $this->Clientpo->deleteAll(array('Clientpo.clientpos_no'=>$this->request->data['clientpo_no']));
            }
            $qo_no=-1;
            foreach($qo_array as $key=>$value)
            {
                $qo_no  =   $qo_no+1;
                $this->Clientpo->create();
                $this->request->data['Clientpo']['quotation_id']=$key;
                $this->request->data['Clientpo']['quo_quantity']=$value;
                $this->request->data['Clientpo']['quotation_no']=$quotation_no[$qo_no];
                $this->request->data['Clientpo']['clientpos_no']=$this->request->data['clientpo_no'];
                $this->request->data['Clientpo']['po_quantity']=$this->request->data['po_quantity'];
                $this->request->data['Clientpo']['salesorder_id ']=$this->request->data['salesorder_id'];
                $this->request->data['Clientpo']['sales_quantity']=$this->request->data['sales_quantity'];
                $this->request->data['Clientpo']['deliveryorder_id']=$this->request->data['deliveryorder_id'];
                $this->request->data['Clientpo']['deliver_quantity']=$this->request->data['deliver_quantity'];
                $this->request->data['Clientpo']['invoiceno']=$this->request->data['invoiceno'];
                $this->request->data['Clientpo']['track_id']=$this->request->data['track_id'];
                $this->request->data['Clientpo']['customer_id']=$this->request->data['customer_for_quotation_id'];
                $this->Clientpo->save($this->request->data['Clientpo']);
            }
            $Quotation_list =   $this->Clientpo->find('list',array('conditions'=>array('Clientpo.clientpos_no'=>$this->request->data['clientpo_no']),'fields'=>array('id','quotation_no')));
            foreach($Quotation_list as $key=>$val)
            {
                $this->Quotation->updateAll(array('Quotation.is_assign_po'=>1),array('Quotation.quotationno'=>$val,'Quotation.customer_id'=>$this->request->data['customer_for_quotation_id']));
            }
            $this->redirect(array('controller'=>'Clientpos','action'=>'index'));
        }
          //$this->set('clientpo', $clientpos);
    }
    public function Salesorder_fullinvoice($id = null)
    {
        $customer_quotation_list=$this->Quotation->find('list',array('conditions'=>
                        array('Quotation.customer_id'=>$id,'Quotation.is_approved'=>1),'fields'=>array('id','quotationno')));
        $po_list=$this->Clientpo->find('all',array('conditions'=>array('Clientpo.customer_id'=>$id)));
        $po_single=$this->Clientpo->find('first',array('conditions'=>array('Clientpo.customer_id'=>$id)));
        $this->set(compact('po_list','customer_quotation_list','pos','po_first','po_single'));
        $this->set('customer_id',$id);
        
        if($this->request->is(array('post','put')))
        {
            
            /*for quotation array -----later Changes*/
            $qo_id_array  =   $this->request->data['quotation_id'];
            $qo_count_array   =   $this->request->data['quo_quantity'];
            $qo_array         = array_combine($qo_id_array,$qo_count_array);
            
            /*for po array*/
            $po_id_array  =   $this->request->data['clientpos_no'];
            $po_count_array   =   $this->request->data['po_quantity'];
            $po_array         = array_combine($po_id_array,$po_count_array);
            
            $quotation_no = $this->request->data['quotation_no'];
            $clientpo_data_for_customer_id  =   $this->Clientpo->find('all',array('conditions'=>array('Clientpo.salesorder_id'=>$this->request->data['salesorder_id'])));
            $quotation_no = $this->request->data['quotation_no'];
            if(count($clientpo_data_for_customer_id>0))
            {
                $this->Clientpo->deleteAll(array('Clientpo.salesorder_id'=>$this->request->data['salesorder_id']));
            }
            foreach($po_array as $key=>$value)
            {
                $this->Clientpo->create();
                $this->request->data['Clientpo']['quotation_id']=$qo_id_array[0];
                $this->request->data['Clientpo']['quo_quantity']=$qo_count_array[0];
                $this->request->data['Clientpo']['quotation_no']=$quotation_no[0];
                $this->request->data['Clientpo']['clientpos_no']= $key;
                $this->request->data['Clientpo']['po_quantity']=$value;
                $this->request->data['Clientpo']['salesorder_id']=$this->request->data['salesorder_id'];
                $this->request->data['Clientpo']['sales_quantity']=$this->request->data['sales_quantity'];
                $this->request->data['Clientpo']['deliveryorder_id']=$this->request->data['deliveryorder_id'];
                $this->request->data['Clientpo']['deliver_quantity']=$this->request->data['deliver_quantity'];
                $this->request->data['Clientpo']['invoiceno']=$this->request->data['invoiceno'];
                $this->request->data['Clientpo']['track_id']=$this->request->data['track_id'];
                $this->request->data['Clientpo']['customer_id']=$this->request->data['customer_for_quotation_id'];
                $this->Clientpo->save($this->request->data['Clientpo']);
            }
            $this->redirect(array('controller'=>'Clientpos','action'=>'index'));
        }
          //$this->set('clientpo', $clientpos);
    }
    public function Deliveryorder_fullinvoice($id = null)
    {
        $customer_salesorder_list=$this->Salesorder->find('list',array('conditions'=>
                        array('Salesorder.customer_id'=>$id,'Salesorder.is_approved'=>1),'fields'=>array('id','salesorderno')));
        $po_list=$this->Clientpo->find('all',array('conditions'=>array('Clientpo.customer_id'=>$id)));
        $po_single=$this->Clientpo->find('first',array('conditions'=>array('Clientpo.customer_id'=>$id)));
        $this->set(compact('po_list','customer_salesorder_list','pos','po_first','po_single'));
        $this->set('customer_id',$id);
        
        if($this->request->is(array('post','put')))
        {
            
            /*for quotation array -----later Changes*/
            $qo_id_array  =   $this->request->data['quotation_id'];
            $qo_count_array   =   $this->request->data['quo_quantity'];
            $qo_array         = array_combine($qo_id_array,$qo_count_array);
            
            /*for po array*/
            $po_id_array  =   $this->request->data['clientpos_no'];
            $po_count_array   =   $this->request->data['po_quantity'];
            $po_array         = array_combine($po_id_array,$po_count_array);
            
            $quotation_no = $this->request->data['quotation_no'];
            $clientpo_data_for_customer_id  =   $this->Clientpo->find('all',array('conditions'=>array('Clientpo.salesorder_id'=>$this->request->data['salesorder_id'])));
            $quotation_no = $this->request->data['quotation_no'];
            if(count($clientpo_data_for_customer_id>0))
            {
                $this->Clientpo->deleteAll(array('Clientpo.salesorder_id'=>$this->request->data['salesorder_id']));
            }
            
            foreach($po_array as $key=>$value)
            {
                $this->Clientpo->create();
                $this->request->data['Clientpo']['quotation_id']=$qo_id_array[0];
                $this->request->data['Clientpo']['quo_quantity']=$qo_count_array[0];
                $this->request->data['Clientpo']['quotation_no']=$quotation_no[0];
                $this->request->data['Clientpo']['clientpos_no']= $key;
                $this->request->data['Clientpo']['po_quantity']=$value;
                $this->request->data['Clientpo']['salesorder_id']=$this->request->data['salesorder_id'];
                $this->request->data['Clientpo']['sales_quantity']=$this->request->data['sales_quantity'];
                $this->request->data['Clientpo']['deliveryorder_id']=$this->request->data['deliveryorder_id'];
                $this->request->data['Clientpo']['deliver_quantity']=$this->request->data['deliver_quantity'];
                $this->request->data['Clientpo']['invoiceno']=$this->request->data['invoiceno'];
                $this->request->data['Clientpo']['track_id']=$this->request->data['track_id'];
                $this->request->data['Clientpo']['customer_id']=$this->request->data['customer_for_quotation_id'];
                $this->Clientpo->save($this->request->data['Clientpo']);
            }
            $this->redirect(array('controller'=>'Clientpos','action'=>'index'));
        }
          //$this->set('clientpo', $clientpos);
   }
    public function get_quotation_values()
    {
        $this->layout   =   "ajax";
        $quotation_id= $this->request->data['quotation_id'];
        if($quotation_id!=''){
            $quotation_details    =   $this->Quotation->find('first',array('conditions'=>array('Quotation.id'=>$quotation_id)));
            $this->set('quotation_details',$quotation_details);
       }
       
    }
    public function get_delivery_id_details()
    {
        $this->layout   =   "ajax";
        $delivery_id= $this->request->data['del_id'];
        $customer_id= $this->request->data['customer_id'];
        if($delivery_id!=''){
            $delivery_order_details    =   $this->Deliveryorder->find('first',array('conditions'=>array('Deliveryorder.id'=>$delivery_id,'Deliveryorder.customer_id'=>$customer_id)));
            $sales_details=$this->Salesorder->find('first',array('conditions'=>array('Salesorder.id'=>$delivery_order_details['Deliveryorder']['salesorder_id'])));
            echo json_encode($sales_details);
       }
       
    }
    public function po_search()
    {
        $this->autoRender   =   false;
        $name =  $this->request->data['po_id'];
        $customer_id    =   $this->request->data['customer_id'];
        $data = $this->Quotation->find('all',array('conditions'=>array('Quotation.ref_no LIKE'=>'%'.$name.'%','Quotation.customer_id'=>$customer_id)));
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
        $data = $this->Salesorder->find('all',array('conditions'=>array('Salesorder.salesorderno LIKE'=>'%'.$id.'%','Salesorder.customer_id'=>$customer_id)));
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
        $data = $this->Deliveryorder->find('all',array('conditions'=>array('Deliveryorder.delivery_order_no LIKE'=>'%'.$name.'%','Deliveryorder.customer_id'=>$customer_id)));
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
        $quotations = $this->Clientpo->find('all',array('conditions'=>array('clientpos_no'=>$po_id,'Clientpo.customer_id'=>$customer_id)));
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
        $salesorder_details = $this->Salesorder->find('first',array('conditions'=>array('Salesorder.salesorderno'=>$so_id,'Salesorder.customer_id'=>$customer_id)));
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
        $salesorder_details = $this->Salesorder->find('all',array('conditions'=>array('Salesorder.quotationno'=>$qo_id,'Salesorder.is_approved'=>1,'Salesorder.is_deleted'=>0)));
        
        $sales_array['Salesorder']=array();$delivery_array['Deliveryorder']=array();
        if(!empty($salesorder_details)){
        foreach($salesorder_details as $salesorder):
            $sales_array['Salesorder'][$salesorder['Salesorder']['salesorderno']]    =   count($salesorder['Description']);
            $deliveryorder_details = $this->Deliveryorder->find('all',array('conditions'=>array('Deliveryorder.salesorder_id'=>$salesorder['Salesorder']['salesorderno'],'Deliveryorder.is_approved'=>1,'Deliveryorder.is_deleted'=>0)));
            foreach($deliveryorder_details as $delivery):
                $delivery_array['Deliveryorder'][$delivery['Deliveryorder']['delivery_order_no']]=$delivery['Deliveryorder']['del_description_count'];
            endforeach;
        endforeach;
        } else{ $sales_array;$delivery_array;}
        $sales_plus_delivery    = array_merge($delivery_array, $sales_array);
        echo json_encode($sales_plus_delivery);
    }
}