<?php
    class ReqpurchaseordersController extends AppController
    {
        public $helpers = array('Html','Form','Session');
        public $uses =array('Priority','Paymentterm','Quotation','Currency','Contactpersoninfo','SalesDocument','PurchaseRequisition','ReqDevice',
                            'Country','Additionalcharge','Service','CustomerInstrument','Customerspecialneed','Reqpurchaseorder','ReqCustomerSpecialNeed',
                            'Instrument','Instrumentforgroup','Brand','Customer','Device','Salesorder','Description','Logactivity','branch','Datalog','Title');
        public function index()
        {
            /*******************************************************
             *  BS V1.0
             *  User Role Permission
             *  Controller : Salesorder
             *  Permission : view 
            *******************************************************/
            $user_role = $this->userrole_permission();
            if($user_role['job_prpurchaseorder']['view'] == 0){ 
                return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
            }

            $this->set('userrole_cus',$user_role['job_prpurchaseorder']);
            /*
             * *****************************************************
             */
                //$this->Quotation->recursive = 1; 
                $reqpurchaseorder_list = $this->Reqpurchaseorder->find('all',array('conditions'=>array('Reqpurchaseorder.is_deleted'=>0),'order' => array('Reqpurchaseorder.id' => 'DESC')));
                //pr($reqpurchaseorder_list);exit;
                $this->set('req_purchase', $reqpurchaseorder_list);
       }
        public function add()
        {
            /*******************************************************
             *  BS V1.0
             *  User Role Permission
             *  Controller : Sales Order
             *  Permission : add 
             *  Description   :   add Salesorder Details page
             *******************************************************/
            $user_role = $this->userrole_permission();
            if($user_role['job_prpurchaseorder']['add'] == 0){ 
                return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
            }
            /*
             * *****************************************************
             */
            $priority=$this->Priority->find('list',array('fields'=>array('id','priority')));
            $payment=$this->Paymentterm->find('list',array('fields'=>array('id','pay')));
            $service=$this->Service->find('list',array('fields'=>array('id','servicetype')));
            $this->set(compact('service','payment','priority'));
            
            if($this->request->is('post'))
            {
                $branch =   $this->branch->find('first',array('conditions'=>array('branch.defaultbranch'=>1,'branch.status'=>1)));
                $this->request->data['Reqpurchaseorder']['branch_id']=$branch['branch']['id'];
                if($this->Reqpurchaseorder->save($this->request->data['Reqpurchaseorder']))
                {
                    $req_purchaseorderid  =   $this->Reqpurchaseorder->getLastInsertID();
                    /***********************for pending process in Salesorder*************************************/
                    $device_node    =   $this->ReqDevice->find('all',array('conditions'=>array('ReqDevice.prequistionno'=>$this->request->data['Reqpurchaseorder']['prequisitionno'],'ReqDevice.status'=>0)));
                    if(!empty($device_node))
                    {
                        $this->ReqDevice->updateAll(array('ReqDevice.reqpurchaseorder_id'=>'"'.$req_purchaseorderid.'"','ReqDevice.status'=>1),array('ReqDevice.prequistionno'=>$this->request->data['Reqpurchaseorder']['prequisitionno'],'ReqDevice.status'=>0));
                    }
                    $this->request->data['ReqCustomerSpecialNeed']['reqpurchaseorder_id']=$req_purchaseorderid;
                    $this->ReqCustomerSpecialNeed->save($this->request->data['ReqCustomerSpecialNeed']); 
                    
                    $this->PurchaseRequisition->updateAll(array('PurchaseRequisition.is_prpurchaseorder_created'=>1),array('PurchaseRequisition.prequistionno'=>$this->request->data['Reqpurchaseorder']['prequisitionno']));
                 
                    /******************
                     * Data Log
                    */
                    $this->request->data['Logactivity']['logname']   =   'Reqpurchaseorder';
                    $this->request->data['Logactivity']['logactivity']   =   'Add Reqpurchaseorder';
                    $this->request->data['Logactivity']['logid']   =   $req_purchaseorderid;
                    $this->request->data['Logactivity']['loguser'] = $this->Session->read('sess_userid');
                    $this->request->data['Logactivity']['logapprove'] = 1;
                    $a = $this->Logactivity->save($this->request->data['Logactivity']);
                    //pr($a);exit;
                    /******************/
                    $this->Session->setFlash(__('PR_Purchase order  has been Added Successfully'));
                    $this->redirect(array('controller'=>'Reqpurchaseorders','action'=>'index'));
                }
            }
        }
        public function pr_purchaseorder($id=NULL)
        {
            
            /*******************************************************
             *  BS V1.0
             *  User Role Permission
             *  Controller : Sales Order
             *  Permission : add 
             *  Description   :   add Salesorder Details page
             *******************************************************/
            $user_role = $this->userrole_permission();
            if($user_role['job_prpurchaseorder']['add'] == 0){ 
                return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
            }
            /*
             * *****************************************************
             */
            $dmt    =   $this->random('pr_purchaseorder');
            $this->set('prequistionno', $dmt);
            $priority=$this->Priority->find('list',array('fields'=>array('id','priority')));
            
            
            //$instrumentforgroup=$this->Instrumentforgroup->find('list',array('fields'=>array('id','priority')));
            $payment=$this->Paymentterm->find('list',array('fields'=>array('id','pay')));
            $service=$this->Service->find('list',array('fields'=>array('id','servicetype')));
            $this->set(compact('service','payment','priority'));
            $branch =   $this->branch->find('first',array('conditions'=>array('branch.defaultbranch'=>1,'branch.status'=>1)));
            
            if($this->request->is('post'))
            {
                //pr($this->request->data);exit;
                //pr($this->ReqDevice->find('all'));
                $req_purchaseorderid  =   $this->Reqpurchaseorder->getLastInsertID();       
                $this->ReqDevice->deleteAll(array('ReqDevice.status'=>0));
                $requistion_id  =   $this->request->data['Reqpurchaseorder']['prequistion_id'];
                $additional=$this->Additionalcharge->find('list',array('fields'=>array('id','additionalcharge')));
                $country=$this->Country->find('list',array('fields'=>array('id','country')));
                $con = $this->PurchaseRequisition->find('first',array('conditions'=>array('PurchaseRequisition.prequistionno'=>$this->request->data['Reqpurchaseorder']['prequistion_id'],'PurchaseRequisition.is_superviser_approved'=>1,'PurchaseRequisition.is_manager_approved'=>1,'PurchaseRequisition.is_deleted '=>0)));
                $instrument_type = $con['InstrumentType']['purchase_requisition'];
                //pr($instrument_type); exit;
                $this->set(compact('instrument_type','country','additional'));
                $contact_list   =   $this->Contactpersoninfo->find('list',array('conditions'=>array('Contactpersoninfo.customer_id'=>$con['PurchaseRequisition']['customer_id'],'Contactpersoninfo.status'=>1),'fields'=>array('id','name')));
                //pr($contact_list);exit;
                $this->set(compact('contact_list'));
                $req_details =  $con['PurchaseRequisition'];
                $req_pur['Reqpurchaseorder']          =    $req_details;
                $req_pur['ReqCustomerSpecialNeed']    =    $con['PreqCustomerSpecialNeed'];
                $req_pur['InstrumentType']            =    $con['InstrumentType'];
                $req_pur['ReqDevice']                 =    $con['PreqDevice'];
                           
                $this->set('requistion_details',$req_pur);
                
                foreach($req_pur['ReqDevice'] as $sale):
                    //pr($sale);
                    $this->ReqDevice->create();
                    $this->request->data['ReqDevice']['is_approved']    =   0;
                    //pr($req_purchaseorderid);
                    $this->request->data['ReqDevice']['reqpurchaseorder_id'] = $req_purchaseorderid;
                    //$this->request->data['req_purchaseorderid'] = $req_purchaseorderid;
                    $description_data  =   $this->preq_devices($sale['id']);
                    
                    $this->ReqDevice->save($description_data);
                endforeach;
                //exit;
                $this->request->data =   $req_pur;
                //pr($req_pur);exit;
                 /******************
                     * Data Log
                    */ 
//                if($this->request->data)
//                {
                    $reqpurchaseorder_id   =   $this->Reqpurchaseorder->getLastInsertID();
                   if($reqpurchaseorder_id)
                   {
                    $this->Logactivity->create();
                    $this->request->data['Logactivity']['logname']   =   'Reqpurchaseorder';
                    $this->request->data['Logactivity']['logactivity']   =   'Add Reqpurchaseorder';
                    $this->request->data['Logactivity']['logid']   =   $reqpurchaseorder_id;
                    $this->request->data['Logactivity']['logno']   =   $this->random('pr_purchaseorder');
                    $this->request->data['Logactivity']['loguser'] = $this->Session->read('sess_userid');
                    $this->request->data['Logactivity']['logapprove'] = 1;
                   
                    $a = $this->Logactivity->save($this->request->data['Logactivity']);
                   }
                    //pr($a);exit;
                    /******************/
                //}
            }
            else
            {
                $this->redirect(array('controller'=>'Reqpurchaseorders','action'=>'index'));
            }
           
        }
        public function edit($id=NULL)
        {
            /*******************************************************
             *  BS V1.0
             *  User Role Permission
             *  Controller : Sales Order
             *  Permission : Edit 
             *  Description   :   Edit Salesorder Details page
             *******************************************************/
            $user_role = $this->userrole_permission();
            if($user_role['job_prpurchaseorder']['edit'] == 0){ 
                return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
            }
            /*
             * *****************************************************
             */
            $priority=$this->Priority->find('list',array('fields'=>array('id','priority')));
            $payment=$this->Paymentterm->find('list',array('fields'=>array('id','pay')));
            $service=$this->Service->find('list',array('fields'=>array('id','servicetype')));
            
            $additional=$this->Additionalcharge->find('list',array('fields'=>array('id','additionalcharge')));
            $country=$this->Country->find('list',array('fields'=>array('id','country')));
            
            $reqpurchaseorder_details=$this->Reqpurchaseorder->find('first',array('conditions'=>array('Reqpurchaseorder.id'=>$id),'recursive'=>'2'));
            //pr($reqpurchaseorder_details);exit;
            $this->set('requistion_details',$reqpurchaseorder_details);
            $this->set(compact('priority','payment','service','country','additional'));
            if($this->request->is(array('post','put')))
            {
                $this->Reqpurchaseorder->id =    $id;
                if($this->Reqpurchaseorder->save($this->request->data['Reqpurchaseorder']))
                {
                    $this->ReqCustomerSpecialNeed->id =    $this->request->data['ReqCustomerSpecialNeed']['id'];
                    $this->ReqCustomerSpecialNeed->save($this->request->data['ReqCustomerSpecialNeed']); 
                    /******************
                    * Data Log
                    */
//                    $req_purchaseorderid    =  $this->request->data['Reqpurchaseorder']['reqpurchaseno']; 
//                    $this->request->data['Logactivity']['logname'] = 'PRPurchase';
//                    $this->request->data['Logactivity']['logactivity'] = 'Edit PRPurchase';
//                    $this->request->data['Logactivity']['logid'] = $id;
//                    $this->request->data['Logactivity']['logid'] = $req_purchaseorderid;
//                    $this->request->data['Logactivity']['loguser'] = $this->Session->read('sess_userid');
//                    $this->request->data['Logactivity']['logapprove'] = 1;
//                    $a = $this->Logactivity->save($this->request->data['Logactivity']);

                    $this->Session->setFlash(__('PRPurchase Order has been Updated Successfully '));
                    $this->redirect(array('controller'=>'Reqpurchaseorders','action'=>'index'));
                }
                
            }
                else
                {
                    $this->request->data=$reqpurchaseorder_details;
                }
        }
        public function delete($id=NULL)
        {
        /*******************************************************
         *  BS V1.0
         *  User Role Permission
         *  Controller : Requisition Purchase Order
         *  Permission : Delete 
         *  Description   :   Delete Requisition Purchase Order Details page
         *******************************************************/
        $user_role = $this->userrole_permission();
        if($user_role['job_prpurchaseorder']['delete'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        /*
         * *****************************************************
         */
            if($id!='')
            {
                if($this->Reqpurchaseorder->updateAll(array('Reqpurchaseorder.is_deleted'=>1),array('Reqpurchaseorder.id'=>$id)))
                {
                    /******************
                        * Data Log Activity
                        */
                        $this->request->data['Datalog']['logname'] = 'PRPurchase';
                        $this->request->data['Datalog']['logactivity'] = 'Delete';
                        $this->request->data['Datalog']['logid'] = $id;
                        $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                    
                        $a = $this->Datalog->save($this->request->data['Datalog']);
                    
                        /******************/   
                    $this->Session->setFlash(__('The PR Purchase Order has been deleted',h($id)));
                    return $this->redirect(array('controller'=>'Reqpurchaseorders','action'=>'index'));
                }
            }
            else
            {
                throw new MethodNotAllowedException();
            }
        }
        public function search()
        {
            $this->loadModel('Customer');
            $name =  $this->request->data['name'];
            $this->autoRender = false;
            $data = $this->Customer->find('all',array('conditions'=>array('customername LIKE'=>'%'.$name.'%')));
            $c = count($data);
            for($i = 0; $i<$c;$i++)
            { 
                echo "<div class='show' align='left' id='".$data[$i]['Customer']['id']."'>";
                echo $data[$i]['Customer']['customername'];
                echo "<br>";
                echo "</div>";
            }
        }
        public function get_customer_value()
        {
            $this->loadModel('Customer');
            $this->autoRender = false;
            $customer_id =  $this->request->data['cust_id'];
            $customer_data = $this->Customer->find('first',array('conditions'=>array('Customer.id'=>$customer_id),'recursive'=>'2'));
           
            if(!empty($customer_data))
            {
                echo json_encode($customer_data) ;
            }
        }
        
        public function preq_search()
        {
            
            $this->autoRender = false;
            $this->loadModel('PurchaseRequisition');
            $name =  $this->request->data['id'];
       
                $data = $this->PurchaseRequisition->find('all',array('conditions'=>array('PurchaseRequisition.is_manager_approved'=>1,'PurchaseRequisition.is_superviser_approved'=>1,'PurchaseRequisition.is_deleted'=>0,'PurchaseRequisition.is_prpurchaseorder_created'=>0,'PurchaseRequisition.prequistionno  LIKE'=>'%'.$name.'%',)));
               
                $c = count($data);
                if($c!=0)
                {
                     for($i = 0; $i<$c;$i++)
                     { 
                         echo "<div class='quotation_single instrument_drop_show' align='left' id='".$data[$i]['PurchaseRequisition']['id']."'>";
                         echo $data[$i]['PurchaseRequisition']['prequistionno'];
                         echo "<br>";
                         echo "</div>";
                     }
                 }
                 else
                 {
                     echo "<div class='no_result instrument_drop_show' align='left'>";
                     echo "No Results Found";
                     echo "<br>";
                     echo "</div>";
                 }  
                 
        }
        
       
        public function approve()
        {
            $this->autoRender=false;
            $id =  $this->request->data['id'];
            $this->Reqpurchaseorder->updateAll(array('Reqpurchaseorder.is_approved'=>1),array('Reqpurchaseorder.id'=>$id));
            $user_id = $this->Session->read('sess_userid');
            $this->Logactivity->updateAll(array('Logactivity.logapprove'=>2,'Logactivity.approved_by'=>$user_id),array('Logactivity.logid'=>$id,'Logactivity.logname'=>'PRPurchase'));
        }
        public function calendar()
        {
            $this->autoRender = false;
            $cal = $this->Reqpurchaseorder->find('all', array('conditions' => array('Reqpurchaseorder.status' => 1, 'Reqpurchaseorder.is_approved' => 1), 'group' => 'reg_date', 'fields' => array('count(Reqpurchaseorder.reg_date) as title', 'reg_date as start'), 'recursive' => '-1'));

            $event_array = array();
            foreach ($cal as $cal_list => $v) {

                $event_array[$cal_list]['title'] = $v[0]['title'];
                $event_array[$cal_list]['start'] = $v['Reqpurchaseorder']['start'];
            }
            return json_encode($event_array);

        }
        public function delete_instrument()
        {
            $this->autoRender=false;
            $device_id= $this->request->data['device_id'];
            if($this->ReqDevice->updateAll(array('ReqDevice.is_deleted'=>1),array('ReqDevice.id'=>$device_id)))
            {
                echo "deleted";
            }
        }
          function pdf($id = NULL) 
        {
        
            $this->autoRender = false;
            $reqpurchaseorder_details=$this->Reqpurchaseorder->find('first',array('conditions'=>array('Reqpurchaseorder.id'=>$id),'recursive'=>'2'));
            //pr($reqpurchaseorder_details);exit;
            //$salesorder_details=$this->Salesorder->find('first',array('conditions'=>array('Salesorder.id'=>$reqpurchaseorder_details['Reqpurchaseorder']['salesorder_id']),'recursive'=>'2','contain'=>array('Description'=>array('conditions'=>array('Description.sales_calllocation'=>'subcontract','Description.sales_sub_con_id'=>$id),'Instrument','Brand','Range','Department'),'Customer'=>array('Contactpersoninfo','Paymentterm'))));
			//pr($salesorder_details);exit;
            //$quotation_data = $this->Quotation->find('first',array('conditions'=>array('Quotation.quotationno'=>$salesorder_details['Salesorder']['quotationno'],'Quotation.status'=>1),'recursive'=>'3'));
//            $salesorder_data = $this->Salesorder->find('first', array('conditions' => array('Salesorder.id' => $id),'recursive'=>3));
//            $quotation_data = $this->Quotation->find('first', array('conditions' => array('Quotation.id' => $salesorder_data['Salesorder']['quotation_id']),'recursive'=>2));
            //pr($quotation_data);exit;
            $file_type = 'pdf';
            $filename = $reqpurchaseorder_details['Reqpurchaseorder']['reqpurchaseno'];
      
      
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
                $customername = $reqpurchaseorder_details['Reqpurchaseorder']['customername'];
                $billing_address = $reqpurchaseorder_details['Reqpurchaseorder']['address'];
               // $postalcode = $salesorder_details['Customer']['postalcode'];
                $contactperson = $reqpurchaseorder_details['Reqpurchaseorder']['attn'];
                $phone = $reqpurchaseorder_details['Reqpurchaseorder']['phone'];
                $fax = $reqpurchaseorder_details['Reqpurchaseorder']['fax'];
                $email = $reqpurchaseorder_details['Reqpurchaseorder']['email'];
                //$our_ref_no = $salesorder_data_list['Quotation']['ref_no'];
                $ref_no = $reqpurchaseorder_details['Reqpurchaseorder']['ref_no'];
                $reg_date = $reqpurchaseorder_details['Reqpurchaseorder']['reg_date'];
                 $payment_term = $reqpurchaseorder_details['Reqpurchaseorder']['paymentterm_name'];
                //$salesorderno = $salesorder_details['Salesorder']['salesorderno'];
                //$quotationno = $salesorder_details['Salesorder']['quotationno'];
                foreach($reqpurchaseorder_details['ReqDevice'] as $device):
                    $device_name[] = $device;
                endforeach;
                $ins_type = $reqpurchaseorder_details['Reqpurchaseorder']['instrument_type_name'];
                

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
               <td width="198" style="padding:0 10px;"><div style="display:inline-block;font-size:18px;font-weight:bold; font-style:italic;color:#00005b !important">PR Purchase Order</div></td>
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
                              <td style="font-size:9px !important;"></td>
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
                              <td  width="270" colspan="3" style="padding:5px 0;"><div align="center" style="font-size:28px;border-bottom:1px solid #000;width:100%;padding:5px 0; position:relative;top:-10px;">'.$reqpurchaseorder_details['Reqpurchaseorder']['reqpurchaseno'].'</div></td>
                         </tr>
                         <tr>
						     
                              <td style="padding-left:5px;width:50px;" width="50">OUR REF NO </td>
                              
                              <td style="padding-right:10px;">: &nbsp;&nbsp;&nbsp;'.$ref_no.'</td>
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
                    <td  style="width:80%;">'.date('Y-m-d H:i:s').'</td><td  style="width:20%;">Page: <span class="page"></span></td>
                        </tr></table>
</div>';
$html .= '<div id="content" style="">'; 
                foreach($device_name as $k=>$device):
                    if($k == 0)
                    {
                        $html .= '<table cellpadding="0" cellspacing="0"  style="width:100%;margin-top:150px;"><tr>
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
                        $html .= '<table cellpadding="0" cellspacing="0"  style="width:100%;page-break-before: always;margin-top:230px;"><tr>
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
                        <td style="padding:3px 10px;">'.$k.'</td>
                        <td style="padding:3px 10px;">1</td>
                        <td style="padding:3px 10px;width:20%;">'.$device['instrument_name'].'</td>
                        <td style="padding:3px 10px;">'.$device['brand_name'].'</td>
                        <td style="padding:3px 10px;">'.$device['model_no'].'</td>
                        <td style="padding:3px 10px;">'.$device['range'].'</td>';
                        for($i=0;$i<=4;$i++):
                        if(isset($titles[$i])):
                        $html .='<td style="padding:3px 10px;">'.$device['title'.($i+1).'_val'].'</td>';
                        endif;
                        endfor;
                        
                   $html .='</tr>';
                    
                endforeach;
                $html .='<tr><td colspan="4" style="border:1px  dashed #666;text-align:right;padding:10px;color: #000 !important;font-size:11px !important;">SPECIAL REQUIREMENTS :</td>
               <td  colspan="8" style="border:1px dashed #666; text-align:left;padding: 10px;font-size:11px !important;">Self Collect & Self Delivery Non-Singlas</td></tr></table>';
                
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
            $this->dompdf->stream("PRPURCHASE-".$filename.".pdf");
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
    public function check_pr_count()
    {
        $this->autoRender = false;
        $this->loadModel('PurchaseRequisition');
        $name =  $this->request->data['single_quote_id'];
        $data = $this->PurchaseRequisition->find('all',array('conditions'=>array('PurchaseRequisition.prequistionno'=>$name,'PurchaseRequisition.is_manager_approved'=>1)));
        $c = count($data);
        if($c!=0)
        {
            echo "success";
        }
        else 
        {
            echo "failure";
        }
    }
}

?>
