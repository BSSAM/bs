<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class LabprocessesController extends AppController
{
    public $helpers = array('Html','Form','Session');
    public $uses =array('Priority','Paymentterm','Quotation','Currency',
                            'Country','Additionalcharge','Service','CustomerInstrument','Customerspecialneed',
                            'Instrument','Brand','Customer','Device','Salesorder','Description');
    
   public function index()
    {
        //$this->Salesorder->recursive = 1; 
            $data = $this->Salesorder->find('all',array('conditions'=>array('Salesorder.is_approved'=>1),'group' => array('Salesorder.salesorderno')));
            
            $data_checking_count = $this->Salesorder->find('all',array('contain'=>array("Description" => array("conditions" => array("Description.checking" => 1))) ,'conditions'=>array('Salesorder.is_approved'=>1),'group' => array('Salesorder.salesorderno')));
            
           $data_total_count = $this->Salesorder->find('count',array('conditions'=>array('Salesorder.is_approved'=>1)));
           //$data_desription_count = $this->Salesorder->find('all',array('conditions'=>array('Salesorder.is_approved'=>1)));
           // $data_processing = $this->Salesorder->find('all',array('group' => array('Salesorder.processing')));
            //$data = $this->Salesorder->find('all',array('conditions'=>array('Salesorder.is_approved'=>1)));
             //pr($data);exit;
           
           $this->Description->unbindModel(array('belongsTo' => array('Brand','Customer','Instrument','Department','Salesorder')), true);
           $data_description_count = $this->Description->find('count',array('conditions'=>array('Description.is_approved'=>1)));
           $this->Description->unbindModel(array('belongsTo' => array('Brand','Customer','Instrument','Department','Salesorder')), true);
           $data_pending_count = $this->Description->find('count',array('conditions'=>array('AND'=>array('Description.processing ='=>0,'Description.checking ='=>0) )));
           $this->Description->unbindModel(array('belongsTo' => array('Brand','Customer','Instrument','Department','Salesorder')), true);
           $data_processing_count = $this->Description->find('count',array('conditions'=>array('Description.processing ='=>1 )));
           $this->Description->unbindModel(array('belongsTo' => array('Brand','Customer','Instrument','Department','Salesorder')), true);
           $data_checking_count = $this->Description->find('count',array('conditions'=>array('Description.checking ='=>1 )));
//           foreach($data_desription_count as $data_desription_count_list)
//           {
//               count = $data_desription_count_list[0]['Description'];
//           }
           //pr($data_pending_count);exit;
           $this->set('data_checking_count', $data_checking_count);
           $this->set('data_processing_count', $data_processing_count);
           $this->set('data_pending_count', $data_pending_count);
            $this->set('data_description_count', $data_description_count);
            $this->set('salesordercount', $data_total_count);
            //pr($data_count);exit;
             $this->set('count_data', $data_checking_count);
           
            $this->set('labprocess', $data);
       
    }  
    public function labs($id=null)
    {
       // pr($id);exit;
        //$labs_details=$this->Description->find('all',array('conditions'=>array('Description.salesorder_id'=>$id,'Description.is_approved'=>1)));
        //pr($labs_details);exit;
        $datacount = $this->Salesorder->find('all',array('conditions'=>array('Salesorder.is_approved'=>1),'contain'=>array('Description','conditions'=>array('Description.salesorder_id'=>$id))));
        pr($datacount);exit;
        $this->set('labs', $labs_details);
        $this->set('labs_ins', $labs_details[0]['Description']);
          $this->set('count_data', count($labs_details[0]['Description']));
        //pr($labs_details[0]['Description']);exit;
        //$data = $this->Salesorder->find('all',array('conditions'=>array('Salesorder.is_approved'=>1),'group' => array('Salesorder.salesorderno')));
    }
    
   
} 