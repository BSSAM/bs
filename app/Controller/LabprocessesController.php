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
     public $components = array('RequestHandler');
     
   public function index()
    {
        $labprocess = $this->Salesorder->find('all',array('conditions'=>array('Salesorder.is_approved'=>1),'group' => array('Salesorder.salesorderno')));
        $data_checking_count = $this->Salesorder->find('all',array('contain'=>array("Description" => array("conditions" => array("Description.checking" => 1))) ,'conditions'=>array('Salesorder.is_approved'=>1),'group' => array('Salesorder.salesorderno')));
        $salesordercount = $this->Salesorder->find('count',array('conditions'=>array('Salesorder.is_approved'=>1)));
         
        $this->Description->unbindModel(array('belongsTo' => array('Brand','Customer','Instrument','Department','Salesorder')), true);
        $data_description_count = $this->Description->find('count',array('conditions'=>array('Description.is_approved'=>1)));
        $this->Description->unbindModel(array('belongsTo' => array('Brand','Customer','Instrument','Department','Salesorder')), true);
        $data_pending_count = $this->Description->find('count',array('conditions'=>array('AND'=>array('Description.processing'=>0,'Description.checking'=>0) )));
        $this->Description->unbindModel(array('belongsTo' => array('Brand','Customer','Instrument','Department','Salesorder')), true);
        $data_processing_count = $this->Description->find('count',array('conditions'=>array('Description.processing ='=>1 )));
        $this->Description->unbindModel(array('belongsTo' => array('Brand','Customer','Instrument','Department','Salesorder')), true);
        $data_checking_count = $this->Description->find('count',array('conditions'=>array('Description.checking ='=>1 )));
        $this->set(compact('data_checking_count','data_processing_count','data_pending_count','data_description_count','salesordercount','labprocess'));
        $this->set('count_data', $data_checking_count);
    }  
    public function labs($id=null)
    {
        $this->Description->unbindModel(array('belongsTo' => array('Brand', 'Customer', 'Salesorder')), true);
        $data_description = $this->Description->find('all', array('conditions' => array('Description.is_approved' => 1, 'Description.salesorder_id' => $id)));
        $this->Description->updateAll(array('Description.processing' => 1),array('Description.salesorder_id' => $id));
        $this->set('labs', $data_description);
        if ($this->request->is(array('post', 'put'))) 
        {
            $checking_array = $this->request->data['Description']['checking'];
            $description_array = $this->request->data['Description']['processing'];
            if(!empty($description_array))
            {
                foreach ($description_array as $key => $value) 
                {
                    $this->Description->id = $key;
                    $this->Description->saveField('processing',$value);
                }
            }
            $checking_array = $this->request->data['Description']['checking'];
            if(!empty($checking_array))
            {
                foreach ($checking_array as $key => $value) 
                {
                    $this->Description->id = $key;
                    $this->Description->saveField('checking', $value);
                }
            }  
            
            $lab_approved = $this->Description->find('count', array('conditions' => array('Description.is_approved' => 1, 'Description.salesorder_id' => $id,'Description.checking'=>1)));
            if(count($data_description)==$lab_approved)
            {
                $this->Salesorder->updateAll(array('Salesorder.is_approved_lab' => 1),array('Salesorder.id' => $id));
            }
            else
            {
                $this->Salesorder->updateAll(array('Salesorder.is_approved_lab' =>0),array('Salesorder.id' => $id));
            }
            $this->redirect(array('controller' => 'Labprocesses', 'action' => 'index'));
        }
       
    }

    public function so_list_variations()
    {
        $this->layout   =   'ajax';
        $solist_id  =    $this->request->data['solist'];
        $calllocation_id    =   $this->request->data['calllocation'];
        
        switch($solist_id)
        {
            case 'run':
                if($calllocation_id=='all'):
                    $labprocess = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_approved' => 1, 'Salesorder.solist_diff >=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('Description' => array('conditions' => array('Description.processing' => 1)))));
                    $this->set('labprocess', $labprocess);
                    else:
                        $labprocess = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_approved' => 1, 'Salesorder.solist_diff >=' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('Description' => array('conditions' => array('Description.processing' => 1, 'Description.sales_calllocation' => $calllocation_id)))));
                    $this->set('labprocess', $labprocess);
            endif;
            
            case 'out':
            if($calllocation_id=='all'):
                    $labprocess = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_approved' => 1,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('Description' => array('conditions' => array('Description.processing' => 0)))));
                    $this->set('labprocess', $labprocess);
                    else:
                       $labprocess = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_approved' => 1,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('Description' => array('conditions' => array('Description.processing' => 0, 'Description.sales_calllocation' => $calllocation_id)))));
                    $this->set('labprocess', $labprocess);
            endif;
            
            case 'overdue':
                 if($calllocation_id=='all'):
                     $labprocess = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_approved' => 1, 'Salesorder.solist_diff <' => 0,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('Description' => array('conditions' => array('Description.processing' => 1)))));
                    $this->set('labprocess', $labprocess);
                else:
                        $labprocess = $this->Salesorder->find('all', array('conditions' => array('Salesorder.is_approved' => 1,
                        ), 'group' => array('Salesorder.salesorderno'), 'contain' => array('Description' => array('conditions' => array('Description.processing' => 0, 'Description.sales_calllocation' => $calllocation_id)))));
                    $this->set('labprocess', $labprocess);
            endif;
        }
    }
    public function update_delay()
    {
        $this->autoRender   =   false;
         if ($this->data) {
            App::uses('Sanitize', 'Utility');
            $title = Sanitize::clean($this->data['Description']['delay']);

            $this->Description->id = $this->data['Description']['id'];
            $this->Description->saveField('delay', $title);
            echo $title;
        }
    }
} 
