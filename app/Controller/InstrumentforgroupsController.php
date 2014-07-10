<?php
/*
 * Document     :   InstrumentsController.php
 * Controller   :   Instruments 
 * Model        :   Instrument 
 * Created By   :   M.Iyappan Samsys
 */
class InstrumentforgroupsController extends AppController   
{
    public function index()
    {
        APP::import('Model','Instrumentforgroup');
        //,array('conditions'=>array('Instrumentforgroup.status'=>'1'),
        $instrument_data = $this->Instrumentforgroup->find('all',array('group' => array('Instrumentforgroup.group_id')));
        $this->set('instrumentforgroups', $instrument_data);
        //pr($instrument_data);exit;
    } 
    public function add()
    {
        APP::import('Model','Instrumentforgroup');
        //,array('conditions'=>array('Instrumentforgroup.status'=>'1'),
        $instrument_data = $this->Instrumentforgroup->find('all',array('group' => array('Instrumentforgroup.group_id')));
        $this->set('instrumentforgroups', $instrument_data);
        //pr($instrument_data);exit;
    } 
    
    public function add_group_quotation()
    {
        $this->autoRender   =   false;
         if ($this->data) {
            App::uses('Sanitize', 'Utility');
            $title = Sanitize::clean($this->data['Instrumentforgroup']['type_name']);

            $this->Instrumentforgroup->id = $this->data['Instrumentforgroup']['id'];
            $this->Instrumentforgroup->saveField('delay', $title);
            echo $title;
        }
    }
    public function add_group_salesorder()
    {
        $this->autoRender   =   false;
         if ($this->data) {
            App::uses('Sanitize', 'Utility');
            $title = Sanitize::clean($this->data['Instrumentforgroup']['type_name']);

            $this->Instrumentforgroup->id = $this->data['Instrumentforgroup']['id'];
            $this->Instrumentforgroup->saveField('delay', $title);
            echo $title;
        }
    }
    public function add_group_deliveryorder()
    {
        $this->autoRender   =   false;
         if ($this->data) {
            App::uses('Sanitize', 'Utility');
            $title = Sanitize::clean($this->data['Instrumentforgroup']['type_name']);

            $this->Instrumentforgroup->id = $this->data['Instrumentforgroup']['id'];
            $this->Instrumentforgroup->saveField('delay', $title);
            echo $title;
        }
    }
    public function add_group_invoice()
    {
        $this->autoRender   =   false;
         if ($this->data) {
            App::uses('Sanitize', 'Utility');
            $title = Sanitize::clean($this->data['Instrumentforgroup']['type_name']);

            $this->Instrumentforgroup->id = $this->data['Instrumentforgroup']['id'];
            $this->Instrumentforgroup->saveField('delay', $title);
            echo $title;
        }
    }
    public function add_group_purchaseorder()
    {
        $this->autoRender   =   false;
         if ($this->data) {
            App::uses('Sanitize', 'Utility');
            $title = Sanitize::clean($this->data['Instrumentforgroup']['type_name']);

            $this->Instrumentforgroup->id = $this->data['Instrumentforgroup']['id'];
            $this->Instrumentforgroup->saveField('delay', $title);
            echo $title;
        }
    }
    public function add_group_subcontract()
    {
        $this->autoRender   =   false;
         if ($this->data) {
            App::uses('Sanitize', 'Utility');
            $title = Sanitize::clean($this->data['Instrumentforgroup']['type_name']);

            $this->Instrumentforgroup->id = $this->data['Instrumentforgroup']['id'];
            $this->Instrumentforgroup->saveField('delay', $title);
            echo $title;
        }
    }
    public function add_group_proforma()
    {
        $this->autoRender   =   false;
         if ($this->data) {
            App::uses('Sanitize', 'Utility');
            $title = Sanitize::clean($this->data['Instrumentforgroup']['type_name']);

            $this->Instrumentforgroup->id = $this->data['Instrumentforgroup']['id'];
            $this->Instrumentforgroup->saveField('delay', $title);
            echo $title;
        }
    }
    public function add_group_porequisition()
    {
        $this->autoRender   =   false;
         if ($this->data) {
            App::uses('Sanitize', 'Utility');
            $title = Sanitize::clean($this->data['Instrumentforgroup']['type_name']);

            $this->Instrumentforgroup->id = $this->data['Instrumentforgroup']['id'];
            $this->Instrumentforgroup->saveField('delay', $title);
            echo $title;
        }
    }
     public function add_group_recall()
    {
        $this->autoRender   =   false;
         if ($this->data) {
            App::uses('Sanitize', 'Utility');
            $title = Sanitize::clean($this->data['Instrumentforgroup']['type_name']);

            $this->Instrumentforgroup->id = $this->data['Instrumentforgroup']['id'];
            $this->Instrumentforgroup->saveField('delay', $title);
            echo $title;
        }
    }
     public function add_group_onsite()
    {
        $this->autoRender   =   false;
         if ($this->data) {
            App::uses('Sanitize', 'Utility');
            $title = Sanitize::clean($this->data['Instrumentforgroup']['type_name']);

            $this->Instrumentforgroup->id = $this->data['Instrumentforgroup']['id'];
            $this->Instrumentforgroup->saveField('delay', $title);
            echo $title;
        }
    }
}

?>