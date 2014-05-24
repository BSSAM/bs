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
       // $this->Salesorder->recursive = 1; 
            $data = $this->Salesorder->find('all',array('conditions'=>array('Salesorder.is_approved'=>1),'group' => array('Salesorder.salesorderno')));
            $datacount = $this->Salesorder->find('count',array('conditions'=>array('Salesorder.is_approved'=>1)));
           // $data_processing = $this->Salesorder->find('all',array('group' => array('Salesorder.processing')));
            //$data = $this->Salesorder->find('all',array('conditions'=>array('Salesorder.is_approved'=>1)));
             //pr($data);exit;
            $this->set('salesordercount', $datacount);
             $this->set('count_data', count($data[0]['Description']));
           
            $this->set('labprocess', $data);
       
    }  
    public function labs($id=null)
    {
       // pr($id);exit;
        $labs_details=$this->Salesorder->find('all',array('conditions'=>array('Salesorder.salesorderno'=>$id,'Salesorder.is_approved'=>1)));
        $datacount = $this->Salesorder->find('count',array('conditions'=>array('Salesorder.is_approved'=>1)));
        $this->set('labs', $labs_details);
        $this->set('labs_ins', $labs_details[0]['Description']);
          $this->set('count_data', count($labs_details[0]['Description']));
        //pr($labs_details[0]['Description']);exit;
        //$data = $this->Salesorder->find('all',array('conditions'=>array('Salesorder.is_approved'=>1),'group' => array('Salesorder.salesorderno')));
    }
    
   
} 