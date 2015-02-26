<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class SubcontractdosController extends AppController
{
    public $helpers = array('Html','Form','Session');
    public $uses =array('Priority','Paymentterm','Quotation','Currency',
                            'Country','Additionalcharge','Service','CustomerInstrument','Customerspecialneed',
                            'Instrument','Brand','Customer','Device','Salesorder','Description','Logactivity','Datalog',
                            'Subcontractdo','CusSalesperson','SubcontractDescription','Random','Contactpersoninfo','InstrumentType','Description','Title');   
    
    public function index()
    {
        $subcontract_list   =   $this->Subcontractdo->find('all',array('recursive'=>2));
        $this->set(compact('subcontract_list'));
    }
    public function add()
    {
       
        $dmt=$this->random('subcon');
        
        $this->set('subcontract_do_id',$dmt);
        $services=$this->Service->find('list',array('fields'=>array('id','servicetype')));
        $this->set(compact('services'));
        $title =   $this->Title->find('all');
            foreach($title as $title_name)
            {
                $titles[] = $title_name['Title']['title_name'];
            }
            $this->set('titles',$titles);
        if($this->request->is('post'))
        {
            //pr($this->request->data);exit;
            $description_list   =  $this->request->data['description_list'];
            $salesorder_id = $this->request->data['Subcontractdo']['salesorder_id'];
            if(!empty($this->request->data['Subcontractdo']))
            {
                   $this->Description->updateAll(array('Description.sales_sub_con'=>1),array('Description.salesorder_id'=>$salesorder_id,'Description.sales_sub_con_del'=>0));
                   if($this->Subcontractdo->save($this->request->data['Subcontractdo']))
                   {
                       
                       $last_id_subcontract    =   $this->Subcontractdo->getLastInsertId();
                       $this->Description->updateAll(array('Description.sales_sub_con_id'=>$last_id_subcontract),array('Description.salesorder_id'=>$salesorder_id,'Description.sales_sub_con_del'=>0,'Description.sales_sub_con_id'=>''));
                       $this->Description->updateAll(array('Description.sales_sub_con_del'=>0),array('Description.salesorder_id'=>$salesorder_id,'Description.sales_sub_con_del'=>1));
                       $this->Random->updateAll(array('Random.subcon'=>'"'.$dmt.'"'),array('Random.id'=>1));  
                       /******************
                        * Data Log
                        */
                        $this->request->data['Logactivity']['logname'] = 'SubCon';
                        $this->request->data['Logactivity']['logactivity'] = 'Add SubCon';
                        $this->request->data['Logactivity']['logid'] = $last_id_subcontract;
                        $this->request->data['Logactivity']['logno'] = $dmt;
                        $this->request->data['Logactivity']['user_id'] = $this->Session->read('sess_userid');
                        $this->request->data['Logactivity']['logapprove'] = 1;

                        $a = $this->Logactivity->save($this->request->data['Logactivity']);

                        /******************/

                        /******************
                        * Data Log Activity
                        */
                        $this->request->data['Datalog']['logname'] = 'SubCon';
                        $this->request->data['Datalog']['logactivity'] = 'Add';
                        $this->request->data['Datalog']['logid'] = $last_id_subcontract;
                        $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');

                        $a = $this->Datalog->save($this->request->data['Datalog']);

                        /******************/ 
                       if(!empty($last_id_subcontract))
                       {
                           if(!empty($description_list))
                           {
                               foreach($description_list as $key=>$value)
                               {
                                    $this->request->data['SubcontractDescription']['subcontractdo_id']    =    $last_id_subcontract;  
                                    $this->request->data['SubcontractDescription']['description_id']    =    $value;
                                    $this->SubcontractDescription->create(); 
                                    $this->SubcontractDescription->save($this->request->data);  
                               }
                           }
                       }
                   $this->Session->setFlash('Sub Contract Delivery order has been Added Sucessfully');
                   $this->redirect(array('action'=>'index'));
                   }
                   else
                   {
                        $this->Session->setFlash('Sub Contract Delivery order cant be added');
                        $this->redirect(array('action'=>'add'));
                   }
                   
                   
            }
           
        }
    }
    
    public function edit($id=NULL)
    {
        /*******************************************************
         *  BS V1.0
         *  User Role Permission
         *  Controller : Sub Con
         *  Permission : Edit 
         *  Description   :   Edit Sub Con Details page
         *******************************************************/
//        $user_role = $this->userrole_permission();
//        if($user_role['job_salesorder']['edit'] == 0){ 
//            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
//        }
        /*
         * *****************************************************
         */
        
            //$priority=$this->Priority->find('list',array('fields'=>array('id','priority')));
            //$payment=$this->Paymentterm->find('list',array('fields'=>array('id','pay')));
            $title =   $this->Title->find('all');
            foreach($title as $title_name)
            {
                $titles[] = $title_name['Title']['title_name'];
            }
            $this->set('titles',$titles);
            $subcontractdo_details=$this->Subcontractdo->find('first',array('conditions'=>array('Subcontractdo.id'=>$id),'recursive'=>'2'));
            $salesorder_details=$this->Salesorder->find('first',array('conditions'=>array('Salesorder.id'=>$subcontractdo_details['Subcontractdo']['salesorder_id']),'recursive'=>'2','contain'=>array('Description'=>array('conditions'=>array('Description.sales_calllocation'=>'subcontract','Description.sales_sub_con_id'=>$id),'Instrument','Brand','Range','Department'))));
            //pr($salesorder_details);exit;
            //pr($salesorder_details);exit;
            $this->set('subcondo',$subcontractdo_details);
            $this->set('salesorder',$salesorder_details);
            $quo = $this->Quotation->find('first',array('conditions'=>array('Quotation.quotationno'=>$salesorder_details['Salesorder']['quotationno'],'Quotation.status'=>1)));
                    $instrument_type = $quo['InstrumentType']['salesorder'];
                    //pr($instrument_type);
                    $this->set('instrument_type',$instrument_type);
            
            $contact_list   =   $this->Contactpersoninfo->find('first',array('conditions'=>array('Contactpersoninfo.id'=>$subcontractdo_details['Subcontractdo']['subcontract_attn'],'Contactpersoninfo.status'=>1)));
            $service=$this->Service->find('first',array('conditions'=>array('Service.id'=>$subcontractdo_details['Subcontractdo']['service_id'])));
            $this->set(compact('contact_list','service'));
            //pr($salesorder_details);exit;
//            $this->set(compact('priority','payment','service'));
//            $title =   $this->Title->find('all');
//            foreach($title as $title_name)
//            {
//                $titles[] = $title_name['Title']['title_name'];
//            }
//            $this->set('titles',$titles);
            if($this->request->is(array('post','put')))
            {
                //pr($this->request->data);exit;
               // $customer_id    =   $this->request->data['Subcontractdo']['customer_id'];
                $this->Subcontractdo->id=$id;
                if($this->Subcontractdo->save($this->request->data['Subcontractdo']))
                {
                    /******************
                        * Data Log Activity
                        */
                        $this->request->data['Datalog']['logname'] = 'Subcontractdo';
                        $this->request->data['Datalog']['logactivity'] = 'Edit';
                        $this->request->data['Datalog']['logid'] = $id;
                        $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                    
                        $a = $this->Datalog->save($this->request->data['Datalog']);
                    
                        /******************/   
//                    $device_node    =   $this->Description->find('all',array('conditions'=>array('Description.customer_id'=>$customer_id)));
//                    if(!empty($device_node))
//                    {
//                        $this->Description->updateAll(array('Description.salesorder_id'=>'"'.$id.'"','Description.status'=>'1'),array('Description.customer_id'=>$customer_id));
//                    }
                    $this->Session->setFlash(__('Subcontractdo has been Updated Succefully '));
                    $this->redirect(array('action'=>'index'));
                }
            }
            else
            {
                $this->request->data=$subcontractdo_details;
            }
    }
    
    public function delete($id = NULL) 
    {
        if ($id != '') {
            if ($this->Subcontractdo->delete($id, true)) {
                $this->Session->setFlash(__('The Subcontract Delivery order  has been deleted', h($id)));
                return $this->redirect(array('controller' => 'Subcontractdos', 'action' => 'index'));
            }
        } else {
            throw new MethodNotAllowedException();
        }
    }

    public function salesorder_id_search()
    {
            $sales_id =  $this->request->data['sale_id'];
            $this->autoRender = false;
            $data = $this->Description->find('all',array('conditions'=>array('salesorder_id LIKE'=>'%'.$sales_id.'%','Description.is_approved'=>'1','Description.sales_calllocation'=>'subcontract','Description.sales_sub_con'=>0),'group'=>'Description.salesorder_id'));
            $c = count($data);
            if(!empty($c))
            {
                for($i = 0; $i<$c;$i++)
                {    
                    echo "<div class='subcontract_show instrument_drop_show' align='left' id='".$data[$i]['Description']['salesorder_id']."'>";
                    echo $data[$i]['Description']['salesorder_id'];
                    echo "<br>";
                    echo "</div>";
                }   
            }
            else
            {
                echo "<div class='subcontract_no_result instrument_drop_show' align='left'>";
                echo "No Results Found";
                echo "<br>";
                echo "</div>";
            }
    }
    public function get_sales_details() 
    {
        $sales_id = $this->request->data['sales_id'];
        $this->autoRender = false;
        $sales_data = $this->Description->find('all', array('conditions' => array('Description.salesorder_id' => $sales_id,'Description.sales_calllocation'=>'subcontract','Description.sales_sub_con_id'=>''),'order'=>'order_by ASC'));
        $this->Salesorder->recursive = 3;
        $sales_data1 = $this->Salesorder->find('first', array('conditions' => array('Salesorder.salesorderno' => $sales_id, 'Salesorder.is_approved' => 1),'contain'=>array('Description'=>array('conditions'=>array('Description.sales_calllocation'=>'subcontract')))));
        $quo_data = $this->Quotation->find('first', array('conditions' => array('Quotation.quotationno' => $sales_data1['Salesorder']['quotationno'], 'Quotation.is_approved' => 1), 'recursive' => '3'));
        $sale = array_merge($sales_data,$sales_data1);
        $sale = array_merge($sale,$quo_data);
        if (!empty($sales_data)) {
            echo json_encode($sale);
            //echo json_encode($sales_data1);
        } else {
            echo "failure";
        }
    }
    public function delete_instrument()
    {
        $this->autoRender=false;
        $device_id= $this->request->data['device_id'];
        $this->loadModel('Description');
        $this->Description->updateAll(array('Description.sales_sub_con_del'=>1),array('Description.id'=>$device_id,'Description.sales_sub_con_del'=>0));
        echo "deleted";
    }
    public function search() 
    {
        
        $name = $this->request->data['name'];
        $this->autoRender = false;
        $data = $this->Customer->find('all', array('conditions' => array('AND'=>array('OR'=>array('Customer.customertype'=>array('Sub-Contractor','Customer/Sub-Contractor')),'customername LIKE' => '%' . $name . '%'))));
        $c = count($data);
        if(!empty($c))
        {
            for ($i = 0; $i < $c; $i++) 
            {
                echo "<div class='subcontract_customer_show' align='left' id='" . $data[$i]['Customer']['id'] . "'>";
                echo $data[$i]['Customer']['customername'];
                echo "<br>";
                echo "</div>";
            }
        }
        else
        {
            echo "<div class='subcontract_no_result' align='left'>";
            echo "No Results Found";
            echo "<br>";
            echo "</div>";
        }
    }
    public function get_customer_value()
    {
        $this->autoRender = false;
        $this->loadModel('Customer');
        $customer_id =  $this->request->data['cust_id'];
        $customer_data = $this->Customer->find('first',array('conditions'=>array('Customer.id'=>$customer_id),'recursive'=>'2'));
        if(!empty($customer_data))
        {
            echo json_encode($customer_data) ;
        }
    }
    
     function pdf($id = NULL) 
        {
        
            $this->autoRender = false;
            $subcontractdo_details=$this->Subcontractdo->find('first',array('conditions'=>array('Subcontractdo.id'=>$id),'recursive'=>'2'));
            $salesorder_details=$this->Salesorder->find('first',array('conditions'=>array('Salesorder.id'=>$subcontractdo_details['Subcontractdo']['salesorder_id']),'recursive'=>'2','contain'=>array('Description'=>array('conditions'=>array('Description.sales_calllocation'=>'subcontract','Description.sales_sub_con_id'=>$id),'Instrument','Brand','Range','Department'))));
            $quotation_data = $this->Quotation->find('first',array('conditions'=>array('Quotation.quotationno'=>$salesorder_details['Salesorder']['quotationno'],'Quotation.status'=>1)));
//            $salesorder_data = $this->Salesorder->find('first', array('conditions' => array('Salesorder.id' => $id),'recursive'=>3));
//            $quotation_data = $this->Quotation->find('first', array('conditions' => array('Quotation.id' => $salesorder_data['Salesorder']['quotation_id']),'recursive'=>2));
//            //pr($salesorder_data);exit;
            $file_type = 'pdf';
            $filename = $subcontractdo_details['Subcontractdo']['subcontract_dono'];
      
      
 $html = '<html>
<head>
<meta charset="utf-8" />
<title>'.$subcontractdo_details['Subcontractdo']['subcontract_dono'].'</title>
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
            //pr($salesorder_data);
            //foreach ($salesorder_data as $salesorder_data_list):
                $customername = $salesorder_details['Customer']['customername'];
                $billing_address = $salesorder_details['Salesorder']['address'];
                $postalcode = $salesorder_details['Customer']['postalcode'];
                $contactperson = $quotation_data['Customer']['Contactpersoninfo'][0]['name'];
                $phone = $salesorder_details['Salesorder']['phone'];
                $fax = $salesorder_details['Salesorder']['fax'];
                $email = $salesorder_details['Salesorder']['email'];
                //$our_ref_no = $salesorder_data_list['Quotation']['ref_no'];
                $ref_no = $salesorder_details['Salesorder']['ref_no'];
                $reg_date = $salesorder_details['Salesorder']['reg_date'];
                 $payment_term = $quotation_data['Customer']['Paymentterm']['paymentterm'] . ' ' . $quotation_data['Customer']['Paymentterm']['paymenttype'];
                $salesorderno = $salesorder_details['Salesorder']['salesorderno'];
                $quotationno = $salesorder_details['Salesorder']['quotationno'];
                foreach($salesorder_details['Description'] as $device):
                    $device_name[] = $device;
                endforeach;
                $ins_type = $salesorder_details['Quotation']['InstrumentType']['salesorder'];
                

$html .=
'<body style="font-family:Oswald, sans-serif;font-size:9px;padding:0;margin:0;font-weight: 300; color:#444 !important;">
<div id="header">
     <table width="700px" style="margin-top:20px;">
          <tr>
               <td width="335" ><div style="float:left; "><img src="img/logo.jpg" width="450" height="80" alt="" /></div></td>
               <td><div style="float:left;text-align:right;float:right;line-height:7px !important;font-size:8px !important;">
                     41 Senoko Drive<br />
                      Singapore 758249<br />
                        Tel.+65 6458 4411<br />
                         Fax.+65 64584400<br />
                         www.bestandards.com
                    </div>
					</td>
          <tr>
     </table>
     <table width="623" height="56">
          <tr>
               <td width="198" style="padding:0 10px;"><div style="display:inline-block;font-size:18px;font-weight:bold; font-style:italic;color:#00005b !important">SUBCONTRACT DO</div></td>
               <td width="391" style="padding:0 10px;"><div style="display:inline-block;background:#00005b;color:#fff !important;padding:5px;font-size:13px;">GST REG NO. M200510697 / COMPANY REG NO. 200510697M</div></td>
          </tr>
     </table>
     <table width="98%" cellpadding="1" cellspacing="1"  style="width:100%;margin-top:20px;">
          <tr>
               <td width="47%" style="border:1px solid #000;padding:5px;"><table width="100%" cellpadding="0" cellspacing="0">
                         <tr>
                              <td width="128" colspan="3" height="10px" style="font-size:9px !important;">'.$customername.'</td>
                         </tr>
                         <tr>
                              <td colspan="3" height="10px" style="font-size:9px !important;">'.$billing_address.'</td>
                         </tr>
                         <tr>
                              <td style="font-size:9px !important;">'.$postalcode.'</td>
                         </tr>
						 <tr>
						 <td><br /></td>
						 <td><br /></td>
						 <td><br /></td>
						 </tr>
						 
                         <tr  style="padding-top:30px;width:50px;" width="50">
                              <td>ATTN </td>
                            
                              <td>: &nbsp;&nbsp;&nbsp; '.$contactperson.'</td>
							  <td></td>
                         </tr>
                         <tr>
                              <td>TEL </td>
                              
                              <td>: &nbsp;&nbsp;&nbsp;'.$phone.'</td>
							  <td></td>
                         </tr>
                         <tr>
                              <td>FAX </td>
                            
                              <td>: &nbsp;&nbsp;&nbsp;'.$fax.'</td>
							  <td></td>
                         </tr>
                         <tr>
                              <td>EMAIL </td>
                             
                              <td>: &nbsp;&nbsp;&nbsp;'.$email.'</td>
							  <td></td>
                         </tr>
                    </table></td>
               <td width="3%"></td>
               <td width="45%" style="border:1px solid #000;width:50%;padding:0"><table width="230" cellpadding="0" cellspacing="0">
                         <tr>
                              <td  width="270" colspan="3" style="padding:5px 0;"><div align="center" style="font-size:28px;border-bottom:1px solid #000;width:100%;padding:5px 0; position:relative;top:-10px;">'.$subcontractdo_details['Subcontractdo']['subcontract_dono'].'</div></td>
                         </tr>
                         <tr>
						     
                              <td style="padding-left:5px;width:50px;" width="50">OUR REF NO </td>
                              
                              <td style="padding-right:10px;">: &nbsp;&nbsp;&nbsp;'.$salesorderno.'</td>
							  <td></td>
						
                         </tr>
                         <tr>
                              <td style="padding-left:5px;">YOUR REF NO </td>
                              
                              <td colspan="2" style="padding-right:10px;">: &nbsp;&nbsp;&nbsp;'.$ref_no.'</td>
							   
							 
                         </tr>
                         <tr>
                              <td style="padding-left:5px;"> DATE </td>
                             
                              <td style="padding-right:10px;">: &nbsp;&nbsp;&nbsp;'.$reg_date.'</td>
							   <td></td>
							 
                         </tr>
                         <tr>
                              <td style="padding-left:5px;">PAYMENT TERMS </td>
                             
                              <td style="padding-right:10px;">: &nbsp;&nbsp;&nbsp;'.$payment_term.'</td>
							   <td></td>
							  
                         </tr>
                    </table></td>
               
          </tr>
     </table>
<div style="padding-top:10px;">'.$ins_type.' :</div>

</div></div>';
$html .='<div id="footer">
     <div style="width:100%;">
          <table cellpadding="1" cellspacing="1"  style="width:100%;">
          <tr>
               <td style="padding:5px;width:50%;border:1px solid #000;"><table cellpadding="0" cellspacing="0">
                         <tr>
                              <td>ITEMS RECEIVED IN GOOD ORDER AND CONDITION:</td>
                         </tr>
                         
                         <tr>
                              <td style="padding-top:30px;"><div style="border-top:1px solid #000;width:100%;">COMPANYS STAMP,SIGNATURE AND DATE</div></td>
                         </tr>
                         
                    </table></td>
               <td></td>
               <td></td>
               <td></td>
               <td></td>
               <td style="border:1px dashed #000;padding:5px;width:50%;"><table width="270" cellpadding="0" cellspacing="0">
                         <tr>
                              <td width="214" style="text-align:center;padding-bottom:50px;">FOR BS TECH PTE LTD</td>
                         </tr>
                         <tr>
                              <td style="font-size:9px !important;color:#777 !important; text-align:center;"> Authorized Signature</td>
                         </tr>
                    </table></td>
          </tr>
     </table>
     

<div style="background:#313854;float:left;width:100%;color:#fff !important;padding:10px;font-size:12px;margin-top:10px;text-align:center;">E. & O . E</div>

       </div> 
       <table width="100%">
               <tr>
                    <td  style="width:80%;">'.date('Y-m-d H:i:s').'</td><td  style="width:7%;">Page: <span class="page"></span></td>
                        </tr></table>
</div>';
$html .= '<div id="content" style="">'; 
                foreach($device_name as $k=>$device):
                    if($k == 0)
                    {
                        $html .= '<table cellpadding="0" cellspacing="0"  style="width:100%;margin-top:150px;">      <tr>
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
                        
                    $html .='</tr><tr><td colspan="4" style="border:1px  dashed #666;text-align:right;padding:10px;color: #000 !important;font-size:11px !important;">SPECIAL REQUIREMENTS :</td>
               <td  colspan="8" style="border:1px dashed #666; text-align:left;padding: 10px;font-size:11px !important;">Self Collect & Self Delivery Non-Singlas</td></tr></table>';
                
                endforeach;
$html .= '</div>'; 

                //pr($html);exit;
        $this->export_report_all_format($file_type, $filename, $html);
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
            $this->dompdf->stream("Saleorder-".$filename.".pdf");
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
    public function approve()
    {
        $this->autoRender=false;
        $id =  $this->request->data['id'];
        $this->Subcontractdo->updateAll(array('Subcontractdo.is_approved'=>1),array('Subcontractdo.id'=>$id));
        //$qo = $this->Quotation->find('first',array('conditions'=>array('Quotation.id'=>$id));

        $user_id = $this->Session->read('sess_userid');
        $sales = $this->Logactivity->find('first',array('conditions'=>array('Logactivity.logid'=>$id,'Logactivity.logactivity'=>'Add SubCon')));
        if(!empty($sales['Logactivity']['logid'])):

            $this->request->data['Logactivity']['logname']   =   'SubCon';
            $this->request->data['Logactivity']['logactivity']   =   'Add SubCon';
            $this->request->data['Logactivity']['logid']   =   $sales['Logactivity']['logid'];
            $this->request->data['Logactivity']['logno']   =   $sales['Logactivity']['logno'];
            $this->request->data['Logactivity']['user_id'] = $this->Session->read('sess_userid');
            $this->request->data['Logactivity']['logapprove'] = 1;
            $this->Logactivity->create();
            $a = $this->Logactivity->save($this->request->data['Logactivity']);
            //pr($a);exit;
            /******************/
            /******************
            * Data Log Activity
            */
            $this->request->data['Datalog']['logname'] = 'SubCon';
            $this->request->data['Datalog']['logactivity'] = 'Add';
            $this->request->data['Datalog']['logid'] = $sales['Logactivity']['logid'];
            $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
            $this->Datalog->create();
            $a = $this->Datalog->save($this->request->data['Datalog']);

            $this->Logactivity->updateAll(array('Logactivity.logapprove'=>2,'Logactivity.approved_by'=>$user_id),array('Logactivity.logid'=>$id,'Logactivity.logactivity'=>'Add SubCon'));

        else:

            $this->Logactivity->updateAll(array('Logactivity.logapprove'=>2,'Logactivity.approved_by'=>$user_id),array('Logactivity.logid'=>$id,'Logactivity.logactivity'=>'Add SubCon'));

        endif;

    }
    

}
    
?>