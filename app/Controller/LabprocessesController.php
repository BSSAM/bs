<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class LabprocessesController extends AppController
{
    public $helpers =   array('Html','Form','Session');
    public $uses    =   array('Priority','Paymentterm','Quotation','Currency',
                            'Country','Additionalcharge','Service','CustomerInstrument','Customerspecialneed',
                            'Instrument','Brand','Customer','Device','Salesorder','Description');
   public function index()
    {
         $labprocess = $this->Salesorder->find('all');
            
           pr( $labprocess[0]['Salesorder']['due_date']); exit;
        $labprocess = $this->Salesorder->find('all',array('conditions'=>array('Salesorder.is_approved'=>1),'group' => array('Salesorder.salesorderno')));
        $data_checking_count = $this->Salesorder->find('all',array('contain'=>array("Description" => array("conditions" => array("Description.checking" => 1))) ,'conditions'=>array('Salesorder.is_approved'=>1),'group' => array('Salesorder.salesorderno')));
        $salesordercount = $this->Salesorder->find('count',array('conditions'=>array('Salesorder.is_approved'=>1)));
         
        $this->Description->unbindModel(array('belongsTo' => array('Brand','Customer','Instrument','Department','Salesorder')), true);
        $data_description_count = $this->Description->find('count',array('conditions'=>array('Description.is_approved'=>1)));
        $this->Description->unbindModel(array('belongsTo' => array('Brand','Customer','Instrument','Department','Salesorder')), true);
        $data_pending_count = $this->Description->find('count',array('conditions'=>array('AND'=>array('Description.processing ='=>0,'Description.checking ='=>0) )));
        $this->Description->unbindModel(array('belongsTo' => array('Brand','Customer','Instrument','Department','Salesorder')), true);
        $data_processing_count = $this->Description->find('count',array('conditions'=>array('Description.processing ='=>1 )));
        $this->Description->unbindModel(array('belongsTo' => array('Brand','Customer','Instrument','Department','Salesorder')), true);
        $data_checking_count = $this->Description->find('count',array('conditions'=>array('Description.checking ='=>1 )));
        $this->set(compact('data_checking_count','data_processing_count','data_pending_count','data_description_count','salesordercount','labprocess'));
        $this->set('count_data', $data_checking_count);
    }  
    public function labs($id=null)
    {
       // $this->Description->recursive = 1;
        $this->Description->unbindModel(array('belongsTo' => array('Brand','Customer','Salesorder')), true);
        $data_description = $this->Description->find('all',array('conditions'=>array('Description.is_approved'=>1,'Description.salesorder_id'=>$id)));
       
      
      //pr($data_description);exit;
        $this->set('labs', $data_description);
       
    }

    public function so_list_variations()
    {
        $this->autoRender   =   false;  
        
        $solist_id  =    $this->request->data['solist'];
        $calllocation_id    =   $this->request->data['calllocation'];
        if($solist_id=='run'    &&  $calllocation_id=='all')
        {
            $current_date   =   strtotime(date('d-M-y')) ;
            
            $labprocess = $this->Salesorder->find('all');
            
           pr( $labprocess); 
        }
        else if($solist_id=='run')
        {
            
        }
        else 
        {echo "no1401235200";}
      
    }
   
} 
