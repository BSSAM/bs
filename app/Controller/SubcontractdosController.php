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
                            'Subcontractdo','CusSalesperson','SubcontractDescription','Random','Contactpersoninfo','InstrumentType');   
    
    public function index()
    {
        $subcontract_list   =   $this->Subcontractdo->find('all',array('recursive'=>2));
        $this->set(compact('subcontract_list'));
    }
    public function add()
    {
        //$str = NULL;
//        $d = date("d");
//        $m = date("m");
//        $y = date("Y");
//        $t = time();
//        $dmt = 'BSD' . ($d + $m + $y + $t);
        $dmt=$this->random('subcon');
        
        $this->set('subcontract_do_id',$dmt);
        $services=$this->Service->find('list',array('fields'=>array('id','servicetype')));
        $this->set(compact('services'));
        if($this->request->is('post'))
        {
            //pr($this->request->data);exit;
            $description_list   =  $this->request->data['description_list'];
            $salesorder_id = $this->request->data['Subcontractdo']['salesorder_id'];
            if(!empty($this->request->data['Subcontractdo']))
            {
                   if($this->Subcontractdo->save($this->request->data['Subcontractdo']))
                   {
                       $last_id_subcontract    =   $this->Subcontractdo->getLastInsertId();
                       $this->Description->updateAll(array('Description.sales_sub_con'=>1),array('Description.salesorder_id'=>$salesorder_id));
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
            
            $subcontractdo_details=$this->Subcontractdo->find('first',array('conditions'=>array('Subcontractdo.id'=>$id),'recursive'=>'2'));
            $salesorder_details=$this->Salesorder->find('first',array('conditions'=>array('Salesorder.id'=>$subcontractdo_details['Subcontractdo']['salesorder_id']),'recursive'=>'2','contain'=>array('Description'=>array('conditions'=>array('Description.sales_calllocation'=>'subcontract'),'Instrument','Brand','Range','Department'))));
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
                $customer_id    =   $this->request->data['Salesorder']['customer_id'];
                $this->Salesorder->id=$id;
                if($this->Salesorder->save($this->request->data['Salesorder']))
                {
                    /******************
                        * Data Log Activity
                        */
                        $this->request->data['Datalog']['logname'] = 'Salesorder';
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
                    $this->Session->setFlash(__('Salesorder has been Updated Succefully '));
                    $this->redirect(array('action'=>'index'));
                }
            }
            else
            {
                $this->request->data=$salesorder_details;
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
        $sales_data = $this->Description->find('all', array('conditions' => array('Description.salesorder_id' => $sales_id,'Description.sales_calllocation'=>'subcontract'),'order'=>'order_by ASC'));
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
        if($this->Description->deleteAll(array('Description.id'=>$device_id)))
        {
            echo "deleted";
        }
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

}
    
?>