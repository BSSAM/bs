<?php
/*
 * Document     :   CustomertaglistsController.php
 * Controller   :   Taglists 
 * Model        :   Customertaglist 
 * Created By   :   M.Iyappan Samsys
 */
class CustomertaglistsController extends AppController   
{
    public $helpers = array('Html','Form','Session');
    public $uses = array('Contactpersoninfo','Billingaddress','Deliveryaddress','Projectinfo',
                        'Customer','Address','Salesperson','Referedby','CusSalesperson','CusReferby','Random',
                        'Industry','Location','Paymentterm','Instrument','InstrumentRange','CustomerInstrument',
                        'Deliveryordertype','InvoiceType','Priority','AcknowledgementType','Quotation','Logactivity','Datalog');
    public function index($id=NULL)
    {
       /*******************************************************
         *  BS V1.0
         *  Customers Permission
         *  Controller : Customers
         *  Permission : view 
         *******************************************************/
        $user_role = $this->userrole_permission();
        if($user_role['cus_customer']['view'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        $this->set('userrole_cus',$user_role['cus_customer']);
        /*
         * ---------------  Functionality of Users -----------------------------------
         */
        $this->set('customer_id',$id);
        $maintag_data = $this->Customer->find('first',array('conditions'=>array('Customer.status'=>1,'Customer.id'=>$id,'Customer.is_deleted'=>0),'fields'=>array('Customername','customergroup_id')));
        if(!empty($maintag_data['Customer'])){ 
		$this -> set('cust',$maintag_data['Customer']['Customername']); 
		$this -> set('group_id',$maintag_data['Customer']['customergroup_id']); } else { $this -> set('cust',''); $this -> set('group_id',''); }
		
		
        $this->Address->deleteAll(array('Address.status'=>0));
        if(!empty($maintag_data))
        {
            $taglist_data = $this->Customer->find('all',array('conditions'=>array('Customer.status'=>1,'customergroup_id'=>$maintag_data['Customer']['customergroup_id'],'Customer.is_deleted'=>0),'order' => array('Customer.id' => 'DESC'),'recursive'=>'2'));
            $this->set('taglists', $taglist_data);
        }
    }
    
    public function add($id=NULL)
    {
      /*******************************************************
         *  BS V1.0
         *  Customers Permission
         *  Controller : Customers
         *  Permission : view 
         *******************************************************/
        $user_role = $this->userrole_permission();
        if($user_role['cus_customer']['add'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        
        /*******************************************************
         *  BS V1.0
         *  User Role Permission
         *  Controller : Procedures
         *  Permission : add 
         *  Description   :   add Procedures Details page
         *******************************************************/
        $tag_customer_details   =   $this->Customer->find('first',array('conditions'=>array('Customer.id'=>$id,'Customer.status'=>1,'Customer.is_deleted'=>0)));
       
        $this->set('customer_id',$this->random('customer'));
        $this->set('tag_id',$this->random('tag'));
        $this->set('group_id',$tag_customer_details['Customer']['customergroup_id']);
        
        $salesperson = $this->Salesperson->find('list', array('fields' => 'salesperson'));
        $referedby = $this->Referedby->find('list', array('fields' => 'referedby'));
       
        $data10 = $this->Address->find('all',array('conditions'=>array('customer_id'=>$this->Session->read('customer_id'),'status'=>0,'type'=>'registered')));
        $data10_count = $this->Address->find('count',array('conditions'=>array('customer_id'=>$this->Session->read('customer_id'),'status'=>0,'type'=>'registered')));
        
        $data11 = $this->Address->find('all',array('conditions'=>array('customer_id'=>$this->Session->read('customer_id'),'status'=>0,'type'=>'billing')));
        $data11_count = $this->Address->find('count',array('conditions'=>array('customer_id'=>$this->Session->read('customer_id'),'status'=>0,'type'=>'billing')));
       
        $data12 = $this->Address->find('all',array('conditions'=>array('customer_id'=>$this->Session->read('customer_id'),'status'=>0,'type'=>'delivery')));
        $data12_count = $this->Address->find('count',array('conditions'=>array('customer_id'=>$this->Session->read('customer_id'),'status'=>0,'type'=>'delivery')));
       
        
        $industry = $this->Industry->find('list', array('conditions'=>array('Industry.is_deleted'=>0),'fields' => 'industryname'));
        $deliverorder_type = $this->Deliveryordertype->find('list', array('fields' => array('id','delivery_order_type')));
        $invoice_types = $this->InvoiceType->find('list', array('fields' => array('id','type_invoice')));
        $location = $this->Location->find('list', array('conditions'=>array('Location.is_deleted'=>0),'fields' => 'locationname'));
        
        $paymentterm = $this->Paymentterm->find('list', array('conditions'=>array('Paymentterm.is_deleted'=>0),'fields' => array('id','pay')));
        $priority= $this->Priority->find('list', array('conditions'=>array('Priority.is_deleted'=>0),'fields' => 'priority'));
        $userrole = $this->Userrole->find('list', array('fields' => 'user_role'));
        $acknowledgement_type = $this->AcknowledgementType->find('list', array('fields' => array('id','acknowledgement_type')));
        $this->set(compact('salesperson','referedby','data10','data10_count','data11',
                            'data11_count','data12','data12_count','data13','data13_count',
                            'industry','deliverorder_type','invoice_types','location',
                            'paymentterm','userrole','priority','tag_customer_details','acknowledgement_type'));
     

        if($this->request->is('post'))
        {
           // $this->request->data['paymentterm_id'] = $this->request->data['val_paymentterms_chosen'];
            $this->request->data['status'] = 1;
            $refer_array = $this->request->data['referedbies_id'];
            $sales_array = $this->request->data['salesperson_id'];
            $cust_id  =   $this->request->data['id'];
            $tag_id  =   $this->request->data['tag_id'];
            $group_id  =   $this->request->data['customergroup_id'];
            
            $this->request->data['is_default']  =   0;
            if(!empty($sales_array))
            {
                foreach($sales_array as $key=>$value)
                {
                    $this->CusSalesperson->create();
                    $per_data = array('customer_id' =>$cust_id, 'salespeople_id' => $value,'tag_id'=>$tag_id,'customergroup_id'=>$group_id);
                    $this->CusSalesperson->save($per_data);
                }
            }
            if(!empty($refer_array))
            {
                foreach($refer_array as $key=>$value)
                {
                    $this->CusReferby->create();
                    $ref_data = array('customer_id' =>$cust_id, 'referedby_id' => $value,'tag_id'=>$tag_id,'customergroup_id'=>$group_id);
                    $this->CusReferby->save($ref_data);
                }
            }
            
            unset($this->request->data['Customer']);
            unset($this->request->data['salesperson_id']);
            unset($this->request->data['referedbies_id']);
            
            if($this->Customer->save($this->request->data))
            {
                $this->Random->updateAll(array('Random.customer'=>'"'.$cust_id.'"'),array('Random.id'=>1));  
                $this->Random->updateAll(array('Random.tag'=>'"'.$tag_id.'"'),array('Random.id'=>1));  
                $this->Random->updateAll(array('Random.group'=>'"'.$group_id.'"'),array('Random.id'=>1));
                $contactperson = $this->Contactpersoninfo->find('count', array('conditions' => array('Contactpersoninfo.customer_id' =>$cust_id )));
                $address = $this->Address->find('count', array('conditions' => array('Address.customer_id' => $cust_id)));
                if ($contactperson > 0) 
                {
                    $this->Contactpersoninfo->updateAll(array('Contactpersoninfo.status' => 1), array('Contactpersoninfo.customer_id' => $cust_id));
                }
                if($address>0)
                {
                    $this->Address->updateAll(array('Address.status'=>1),array('Address.customer_id'=>$cust_id));
                }
                
                
                 /******************
                    * Log Activity For Approval
                    */
                    $this->request->data['Logactivity']['logname'] = 'CustomerTagList';
                    $this->request->data['Logactivity']['logactivity'] = 'Add CustomerTagList';
                    $this->request->data['Logactivity']['logid'] = $cust_id;
                    $this->request->data['Logactivity']['user_id'] = $this->Session->read('sess_userid');
                    $this->request->data['Logactivity']['logapprove'] = 1;

                    $a = $this->Logactivity->save($this->request->data['Logactivity']);
                    
                /******************/
                    
                /******************
                    * Data Log Activity
                    */
                    $this->request->data['Datalog']['logname'] = 'CustomerTagList';
                    $this->request->data['Datalog']['logactivity'] = 'Add';
                    $this->request->data['Datalog']['logid'] = $cust_id;
                    $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                    
                    $a = $this->Datalog->save($this->request->data['Datalog']);
                    
                /******************/ 
                
                $this->Session->setFlash(__('Customer Tag has been Added Successfully'));
                $this->Session->delete('tag_id');
                return $this->redirect(array('controller'=>'Customertaglists','action'=>'index',$id));
                
            }
            $this->Session->setFlash(__('Customer Could Not be Added'));
        }
       
    }
    public function edit($id = NULL)
    {
         /*******************************************************
         *  BS V1.0
         *  User Role Permission
         *  Controller : Procedures
         *  Permission : Edit 
         *  Description   :   Edit Procedures Details page
         *******************************************************/
        $user_role = $this->userrole_permission();
        if($user_role['cus_customer']['edit'] ==0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        /*
         * *****************************************************
         */
        if(empty($id))
        {
             $this->Session->setFlash(__('Invalid Customer Entry'));
             return $this->redirect(array('action'=>'edit'));
        }
        $customer_details = $this->Customer->find('first',array('conditions'=>array('Customer.status'=>1,'Customer.id'=>$id,'Customer.is_deleted'=>0),'order' => array('Customer.id' => 'DESC'),'recursive'=>'2'));
        $customer_dat = $this->Customer->find('first',array('conditions'=>array('Customer.id'=>$id),'recursive'=>'2'));
        $this->set('customer_dat',$customer_dat);
        $completed_quotation    =   $this->Quotation->find('all',array('conditions'=>array('Quotation.customer_id'=>$id,'Quotation.is_jobcompleted'=>0,'Quotation.is_deleted'=>0)));
      
        if(count($completed_quotation)>0):
            $disabled   =   'disabled';
            $this->set('disabled',$disabled);
            else:
                $disabled   =   '';
                $this->set('disabled',$disabled);
        endif;
        if($this->Session->read('customer_id')==''){ $this->Session->write('customer_id',$id);  }
        $this->set('customer_id',$id);
        
        $salesperson = $this->Salesperson->find('list', array('fields' => 'salesperson'));
        $referedby = $this->Referedby->find('list', array('fields' => 'referedby'));
      
        $data10 = $this->Address->find('all',array('conditions'=>array('customer_id'=>$id,'status'=>1,'type'=>'registered')));
        $data10_count = $this->Address->find('count',array('conditions'=>array('customer_id'=>$this->Session->read('customer_id'),'status'=>1,'type'=>'registered')));
       
        $data11 = $this->Address->find('all',array('conditions'=>array('customer_id'=>$id,'status'=>1,'type'=>'billing')));
        $data11_count = $this->Address->find('count',array('conditions'=>array('customer_id'=>$this->Session->read('customer_id'),'status'=>1,'type'=>'billing')));
      
        $data12 = $this->Address->find('all',array('conditions'=>array('customer_id'=>$id,'status'=>1,'type'=>'delivery')));
        $data12_count = $this->Address->find('count',array('conditions'=>array('customer_id'=>$id,'status'=>1,'type'=>'delivery')));
     
        
        $invoice_types = $this->InvoiceType->find('list', array('fields' => array('id','type_invoice')));
        $industry = $this->Industry->find('list', array('fields' => 'industryname'));
        $location = $this->Location->find('list', array('fields' => 'locationname'));
        $deliverorder_type = $this->Deliveryordertype->find('list', array('fields' => array('id','delivery_order_type')));
        $paymentterm= $this->Paymentterm->find('list', array('fields' => array('id','pay')));;
        
        $priority = $this->Priority->find('list', array('fields' => 'priority'));
        $userrole = $this->Userrole->find('list', array('fields' => 'user_role'));

        // Model For the Tab Edit Contact Info
        $contactpersoninfo = $this->Contactpersoninfo->find('all', array('conditions' => array('Contactpersoninfo.status' => 1, 'Contactpersoninfo.customer_id' => $id), 'order' => array('Contactpersoninfo.id' => 'DESC')));
        $acknowledgement_type = $this->AcknowledgementType->find('list', array('fields' => array('id','acknowledgement_type')));
        
        $this->set(compact('salesperson','referedby','data10','data10_count','data11',
                            'data11_count','data12','data12_count',
                            'industry','deliverorder_type','invoice_types','location',
                            'paymentterm','userrole','priority','tag_customer_details','contactpersoninfo','acknowledgement_type'));
        
        if($this->request->is(array('post','put')))
        {
           
            $this->Customer->id = $id;
            $refer_array = $this->request->data['referedbies_id'];
            $sales_array = $this->request->data['salesperson_id'];
            $cust_id  =   $id;
            if(!empty($sales_array))
            {
                $this->CusSalesperson->deleteAll(array('CusSalesperson.customer_id' => $id));
                foreach ($sales_array as $key => $value) {
                    
                    $this->CusSalesperson->create();
                    $sal_data = array('customer_id' => $id, 'salespeople_id' => $value);
                    $this->CusSalesperson->save($sal_data);
                }
            }
            if(!empty($refer_array))
            {
                $this->CusReferby->deleteAll(array('CusReferby.customer_id' => $id));
                foreach ($refer_array as $key => $value) {
                    
                    $this->CusReferby->create();
                    $ref_data = array('customer_id' => $id, 'referedby_id' => $value);
                    $this->CusReferby->save($ref_data);
                }
                
            }
            unset($this->request->data['Customer']);
            unset($this->request->data['salesperson_id']);
            unset($this->request->data['referedbies_id']);
            
            if($this->Customer->save($this->request->data))
            {
                $project= $this->Projectinfo->find('count',array('conditions'=>array('Projectinfo.customer_id'=>$this->Session->read('customer_id'))));
                $contactperson= $this->Contactpersoninfo->find('count',array('conditions'=>array('Contactpersoninfo.customer_id'=>$this->Session->read('customer_id'))));
                $address= $this->Address->find('count',array('conditions'=>array('Address.customer_id'=>$this->Session->read('customer_id'))));
                if($contactperson>0)
                {
                    $this->Contactpersoninfo->updateAll(array('Contactpersoninfo.status'=>1),array('Contactpersoninfo.customer_id'=>$this->Session->read('customer_id')));
                }
                if($address>0)
                {
                     $this->Address->updateAll(array('Address.status'=>1),array('Address.customer_id'=>$this->Session->read('customer_id')));
                }
               
                /******************
                    * Data Log Activity
                    */
                    $this->request->data['Datalog']['logname'] = 'CustomerTagList';
                    $this->request->data['Datalog']['logactivity'] = 'Edit';
                    $this->request->data['Datalog']['logid'] = $id;
                    $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                    
                    $a = $this->Datalog->save($this->request->data['Datalog']);
                    
                /******************/   
                
               $this->Session->setFlash(__('Customer Tag has been Updated'));
               return $this->redirect(array('controller'=>'Customertaglists','action'=>'index',$id));
               $this->Session->delete('customer_id');
            }
            $this->Session->setFlash(__('Customer Cant be Updated'));
        }
        else
        {
            $this->request->data =  $customer_details;
        }
    }
     public function delete($id=NULL)
    {
      
        $this->autoRender=false;
        if($this->Customer->updateAll(array('Customer.is_deleted'=>1,'Customer.status'=>0),array('Customer.id'=>$id)))
        {
            /******************
                    * Data Log Activity
                    */
                    $this->request->data['Datalog']['logname'] = 'CustomerTagList';
                    $this->request->data['Datalog']['logactivity'] = 'Delete';
                    $this->request->data['Datalog']['logid'] = $id;
                    $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                    
                    $a = $this->Datalog->save($this->request->data['Datalog']);
                    
            /******************/   
            $res = $this->Customer->findById($id);
            $this->Session->setFlash(__('Customer has been deleted'));
            return $this->redirect(array('action'=>'index',$res['Customer']['customergroup_id']));
        }
    }
   
     public function tag_contact_person_add()
    {
        $this->autoRender=false;
        //echo $this->Session->read('customer_id');
        $this->loadModel('Contactpersoninfo');
        $this->request->data['Contactpersoninfo']['email']=$this->request->data['contact_email'];
        $this->request->data['Contactpersoninfo']['remarks']=$this->request->data['contact_remark'];
        $this->request->data['Contactpersoninfo']['name']=$this->request->data['contact_name'];
        $this->request->data['Contactpersoninfo']['department']=$this->request->data['contact_department'];
        $this->request->data['Contactpersoninfo']['phone']=$this->request->data['contact_phone'];
        $this->request->data['Contactpersoninfo']['position']=$this->request->data['contact_position'];
        $this->request->data['Contactpersoninfo']['mobile']=$this->request->data['contact_mobile'];
        $this->request->data['Contactpersoninfo']['purpose']=$this->request->data['contact_purpose'];
        $this->request->data['Contactpersoninfo']['customer_id']=$this->request->data['customer_id'];
        $this->request->data['Contactpersoninfo']['tag_id']=$this->request->data['tag_id'];
        $this->request->data['Contactpersoninfo']['customergroup_id']=$this->request->data['group_id'];
        $this->request->data['Contactpersoninfo']['status']=0;
        if($this->Contactpersoninfo->save($this->request->data))
        {
            $last_id    =   $this->Contactpersoninfo->getLastInsertID();
            echo $last_id;
        }
    }
    public function contact_delete()
    {
        $this->autoRender=false;
        $delete_id= $this->request->data['delete_id'];
        if($this->Contactpersoninfo->deleteAll(array('Contactpersoninfo.id'=>$delete_id)))
        {
            echo "deleted";
        }
    }
    
     public function approve()
    {
            $this->autoRender=false;
            $id =  $this->request->data['id'];
            $this->Customer->updateAll(array('Customer.is_approved'=>1,'Customer.is_approved_date'=>date('Y-m-d'),'Customer.is_approved_by'=>$user_id),array('Customer.id'=>$id));
            $user_id = $this->Session->read('sess_userid');
            $this->Logactivity->updateAll(array('Logactivity.logapprove'=>2,'Logactivity.approved_by'=>$user_id),array('Logactivity.logid'=>$id,'Logactivity.logactivity'=>'Add CustomerTagList'));
            $details=$this->Customer->find('first',array('conditions'=>array('Customer.id'=>$id)));
			$this->xml_tally($id);
            
    }
	
	public function xml_tally($id = NULL)
    {
        $this->autoRender=false;
        $customer_details =  $this->Customer->find('first',array('conditions'=>array('Customer.id'=>$id,'Customer.status'=>1,'Customer.is_deleted'=>0))); 
        //pr($customer_details['Customer']['customername']);
        //exit;
    $strXML = "<ENVELOPE>
    <HEADER>
    <TALLYREQUEST>Import Data</TALLYREQUEST>
    </HEADER>
    <BODY>
    <IMPORTDATA>
    <REQUESTDESC>
    <REPORTNAME>Vouchers</REPORTNAME>
    <STATICVARIABLES>
     <SVCURRENTCOMPANY>BS TECH PTE LTD</SVCURRENTCOMPANY>
    </STATICVARIABLES>
    </REQUESTDESC>
    <REQUESTDATA>
    <TALLYMESSAGE xmlns:UDF='TallyUDF'>
     <LEDGER NAME='".$customer_details['Customer']['customername']."' RESERVEDNAME=''>
      <ADDRESS.LIST TYPE='String'>
       <ADDRESS>".$customer_details['Address'][0]['address']."</ADDRESS>
      </ADDRESS.LIST>
      <MAILINGNAME.LIST TYPE='String'>
       <MAILINGNAME>".$customer_details['Customer']['customername']."</MAILINGNAME>
      </MAILINGNAME.LIST>
      <OLDAUDITENTRYIDS.LIST TYPE='Number'>
       <OLDAUDITENTRYIDS>-2</OLDAUDITENTRYIDS>
      </OLDAUDITENTRYIDS.LIST>
      <CURRENCYNAME>S$</CURRENCYNAME>
      <PARENT>Sundry Debtors</PARENT>
      <TAXCLASSIFICATIONNAME/>
      <TAXTYPE>Others</TAXTYPE>
      <BILLCREDITPERIOD>".$customer_details['Paymentterm']['paymentterm']." ".$customer_details['Paymentterm']['paymenttype']."</BILLCREDITPERIOD>
      <GSTTYPE/>
      <APPROPRIATEFOR/>
      <SERVICECATEGORY/>
      <EXCISELEDGERCLASSIFICATION/>
      <EXCISEDUTYTYPE/>
      <EXCISENATUREOFPURCHASE/>
      <LEDGERFBTCATEGORY/>
      <ISBILLWISEON>Yes</ISBILLWISEON>
      <ISCOSTCENTRESON>No</ISCOSTCENTRESON>
      <ISINTERESTON>No</ISINTERESTON>
      <ALLOWINMOBILE>No</ALLOWINMOBILE>
      <ISCOSTTRACKINGON>No</ISCOSTTRACKINGON>
      <ISCONDENSED>No</ISCONDENSED>
      <AFFECTSSTOCK>No</AFFECTSSTOCK>
      <FORPAYROLL>No</FORPAYROLL>
      <ISABCENABLED>No</ISABCENABLED>
      <INTERESTONBILLWISE>No</INTERESTONBILLWISE>
      <OVERRIDEINTEREST>No</OVERRIDEINTEREST>
      <OVERRIDEADVINTEREST>No</OVERRIDEADVINTEREST>
      <USEFORVAT>No</USEFORVAT>
      <IGNORETDSEXEMPT>No</IGNORETDSEXEMPT>
      <ISTCSAPPLICABLE>No</ISTCSAPPLICABLE>
      <ISTDSAPPLICABLE>No</ISTDSAPPLICABLE>
      <ISFBTAPPLICABLE>No</ISFBTAPPLICABLE>
      <ISGSTAPPLICABLE>No</ISGSTAPPLICABLE>
      <ISEXCISEAPPLICABLE>No</ISEXCISEAPPLICABLE>
      <ISTDSEXPENSE>No</ISTDSEXPENSE>
      <ISEDLIAPPLICABLE>No</ISEDLIAPPLICABLE>
      <ISRELATEDPARTY>No</ISRELATEDPARTY>
      <USEFORESIELIGIBILITY>No</USEFORESIELIGIBILITY>
      <SHOWINPAYSLIP>No</SHOWINPAYSLIP>
      <USEFORGRATUITY>No</USEFORGRATUITY>
      <ISTDSPROJECTED>No</ISTDSPROJECTED>
      <FORSERVICETAX>No</FORSERVICETAX>
      <ISINPUTCREDIT>No</ISINPUTCREDIT>
      <ISEXEMPTED>No</ISEXEMPTED>
      <ISABATEMENTAPPLICABLE>No</ISABATEMENTAPPLICABLE>
      <ISSTXPARTY>No</ISSTXPARTY>
      <ISSTXNONREALIZEDTYPE>No</ISSTXNONREALIZEDTYPE>
      <TDSDEDUCTEEISSPECIALRATE>No</TDSDEDUCTEEISSPECIALRATE>
      <AUDITED>No</AUDITED>
      <SORTPOSITION> 1000</SORTPOSITION>
      <LANGUAGENAME.LIST>
       <NAME.LIST TYPE='String'>
        <NAME>".$customer_details['Customer']['customername']."</NAME>
       </NAME.LIST>
       <LANGUAGEID> 1033</LANGUAGEID>
      </LANGUAGENAME.LIST>
      <XBRLDETAIL.LIST>      </XBRLDETAIL.LIST>
      <AUDITDETAILS.LIST>      </AUDITDETAILS.LIST>
      <SCHVIDETAILS.LIST>      </SCHVIDETAILS.LIST>
      <SLABPERIOD.LIST>      </SLABPERIOD.LIST>
      <GRATUITYPERIOD.LIST>      </GRATUITYPERIOD.LIST>
      <ADDITIONALCOMPUTATIONS.LIST>      </ADDITIONALCOMPUTATIONS.LIST>
      <BANKALLOCATIONS.LIST>      </BANKALLOCATIONS.LIST>
      <PAYMENTDETAILS.LIST>      </PAYMENTDETAILS.LIST>
      <BANKEXPORTFORMATS.LIST>      </BANKEXPORTFORMATS.LIST>
      <BILLALLOCATIONS.LIST>      </BILLALLOCATIONS.LIST>
      <INTERESTCOLLECTION.LIST>      </INTERESTCOLLECTION.LIST>
      <LEDGERCLOSINGVALUES.LIST>      </LEDGERCLOSINGVALUES.LIST>
      <LEDGERAUDITCLASS.LIST>      </LEDGERAUDITCLASS.LIST>
      <OLDAUDITENTRIES.LIST>      </OLDAUDITENTRIES.LIST>
      <TDSEXEMPTIONRULES.LIST>      </TDSEXEMPTIONRULES.LIST>
      <DEDUCTINSAMEVCHRULES.LIST>      </DEDUCTINSAMEVCHRULES.LIST>
      <LOWERDEDUCTION.LIST>      </LOWERDEDUCTION.LIST>
      <STXABATEMENTDETAILS.LIST>      </STXABATEMENTDETAILS.LIST>
      <LEDMULTIADDRESSLIST.LIST>      </LEDMULTIADDRESSLIST.LIST>
      <STXTAXDETAILS.LIST>      </STXTAXDETAILS.LIST>
      <CHEQUERANGE.LIST>      </CHEQUERANGE.LIST>
      <DEFAULTVCHCHEQUEDETAILS.LIST>      </DEFAULTVCHCHEQUEDETAILS.LIST>
      <ACCOUNTAUDITENTRIES.LIST>      </ACCOUNTAUDITENTRIES.LIST>
      <AUDITENTRIES.LIST>      </AUDITENTRIES.LIST>
      <BRSIMPORTEDINFO.LIST>      </BRSIMPORTEDINFO.LIST>
      <AUTOBRSCONFIGS.LIST>      </AUTOBRSCONFIGS.LIST>
      <BANKURENTRIES.LIST>      </BANKURENTRIES.LIST>
      <DEFAULTCHEQUEDETAILS.LIST>      </DEFAULTCHEQUEDETAILS.LIST>
      <DEFAULTOPENINGCHEQUEDETAILS.LIST>      </DEFAULTOPENINGCHEQUEDETAILS.LIST>
     </LEDGER>
    </TALLYMESSAGE>
    </REQUESTDATA>
    </IMPORTDATA>
    </BODY>
    </ENVELOPE>";

    $server = "http://203.175.170.64:8000/";
    //$server = "http://localhost:9002/";
    $headers = array( "Content-type: text/xml" ,"Content-length: ".strlen($strXML) ,"Connection: close" );

    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_URL,$server);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 20);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $strXML);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $server_output = curl_exec($ch);
    echo $server_output;

//
//    if(curl_errno($ch)){
//        echo curl_error($ch);
//        echo " $server  something went wrong..... try later ";
//        //if($_GET[counter]==$_GET[total])
//        //echo 'done###';
//    }else{
//		echo $server_output;
//        curl_close($ch);
//    }
    }
}
