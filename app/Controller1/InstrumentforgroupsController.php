<?php
/*
 * Document     :   InstrumentsController.php
 * Controller   :   Instruments 
 * Model        :   Instrument 
 * Created By   :   M.Iyappan Samsys
 */
class InstrumentforgroupsController extends AppController   
{
    public $helpers = array('Html', 'Form', 'Session');
    public $uses = array('Priority', 'Paymentterm', 'Quotation', 'Currency', 'Document',
        'Country', 'Additionalcharge', 'Service', 'CustomerInstrument', 'Customerspecialneed',
        'Instrument', 'Brand', 'Customer', 'Device', 'Unit', 'Logactivity', 'InstrumentType',
        'Contactpersoninfo', 'CusSalesperson', 'Clientpo', 'branch','Datalog','Logactivity');

    public function index()
    {
        APP::import('Model','Instrumentforgroup');
        /*******************************************************
         *  BS V1.0
         *  User Role Permission
         *  Controller : instrumentforgroup
         *  Permission : view 
        *******************************************************/
        $user_role = $this->userrole_permission();
        if($user_role['ins_instrumentforgroup']['view'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        
        $this->set('userrole_cus',$user_role['ins_instrumentforgroup']);
        /*
         * *****************************************************
         */
        //,array('conditions'=>array('Instrumentforgroup.status'=>'1'),
        $instrument_type_data = $this->InstrumentType->find('all',array('conditions'=>array('InstrumentType.is_deleted'=>0)));//,array('group' => array('Instrumentforgroup.group_id'))
       
        $this->set('instrumentforgroups', $instrument_type_data);
        //pr($instrument_data);exit;
    } 
    public function add()
    {
         /*******************************************************
         *  BS V1.0
         *  User Role Permission
         *  Controller : instrumentforgroup
         *  Permission : add 
         *  Description   :   add instrumentforgroup Details page
         *******************************************************/
        $user_role = $this->userrole_permission();
        if($user_role['ins_instrumentforgroup']['add'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        /*
         * *****************************************************
         */
        $user_role = $this->userrole_permission();
        
        if($user_role['ins_range']['add'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        if($this->request->is('post'))
        {
            if($this->InstrumentType->save($this->request->data))
            {
                    $last_insert_id =   $this->InstrumentType->getLastInsertID();
                    /******************
                    * Log Activity For Approval
                    */
                    $this->request->data['Logactivity']['logname'] = 'Instrument For Group';
                    $this->request->data['Logactivity']['logactivity'] = 'Add Instrument For group';
                    $this->request->data['Logactivity']['logid'] = $last_insert_id;
                    $this->request->data['Logactivity']['user_id'] = $this->Session->read('sess_userid');
                    $this->request->data['Logactivity']['logapprove'] = 1;

                    $a = $this->Logactivity->save($this->request->data['Logactivity']);
                    
                /******************/
                    
                /******************
                    * Data Log Activity
                    */
                    $this->request->data['Datalog']['logname'] = 'Instrument For Group';
                    $this->request->data['Datalog']['logactivity'] = 'Add';
                    $this->request->data['Datalog']['logid'] = $last_insert_id;
                    $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                    
                    $a = $this->Datalog->save($this->request->data['Datalog']);
                    
                /******************/ 
                $this->Session->setFlash(__('Instrument Group has been added Successfully'));
                $this->redirect(array('controller'=>'Instrumentforgroups','action'=>'index'));
            }
            $this->Session->setFlash(__('Instrument Group Could Not be Added'));
        }
    }
    public function edit($id = null)
    {
        /*******************************************************
         *  BS V1.0
         *  User Role Permission
         *  Controller : instrumentforgroup
         *  Permission : Edit 
         *  Description   :   Edit instrumentforgroup Details page
         *******************************************************/
        $user_role = $this->userrole_permission();
        if($user_role['ins_instrumentforgroup']['edit'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        /*
         * *****************************************************
         */
        $user_role = $this->userrole_permission();
        
        if($user_role['ins_range']['edit'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        if(empty($id))
        {
             $this->Session->setFlash(__('Invalid Entry'));
             return $this->redirect(array('action'=>'edit'));
        }
        $instrumentgroup =  $this->InstrumentType->findById($id); 
        $ins_dat = $this->InstrumentType->find('first',array('conditions'=>array('InstrumentType.id'=>$id),'recursive'=>'2'));
        //pr($ins_dat);exit;
        $this->set('ins_dat',$ins_dat);
        if($this->request->is(array('post','put')))
        {
            $this->InstrumentType->id = $id;
            if($this->InstrumentType->save($this->request->data))
            {
                /******************
                    * Data Log Activity
                    */
                    $this->request->data['Datalog']['logname'] = 'Instrument For Group';
                    $this->request->data['Datalog']['logactivity'] = 'Edit';
                    $this->request->data['Datalog']['logid'] = $id;
                    $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                    
                    $a = $this->Datalog->save($this->request->data['Datalog']);
                    
                /******************/
               $this->Session->setFlash(__('Instrument Group has been Updated'));
               return $this->redirect(array('controller'=>'Instrumentforgroups','action'=>'index'));
            }
            $this->Session->setFlash(__('Instrument Group Cant be Updated'));
        }
        else
        {
            $this->request->data = $instrumentgroup;
            
        }
    }
    
    public function delete($id)
    {
        /*******************************************************
         *  BS V1.0
         *  User Role Permission
         *  Controller : instrumentforgroup
         *  Permission : Delete 
         *  Description   :   Delete instrumentforgroup Details page
         *******************************************************/
        $user_role = $this->userrole_permission();
        if($user_role['ins_instrumentforgroup']['delete'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        /*
         * *****************************************************
         */
               
        if($this->request->is('get'))
        {
            throw new MethodNotAllowedException();
        }
        if($this->InstrumentType->updateAll(array('InstrumentType.is_deleted'=>1,'InstrumentType.status'=>0),array('InstrumentType.id'=>$id)))
        {
            /******************
                    * Data Log Activity
                    */
                    $this->request->data['Datalog']['logname'] = 'Instrument For Group';
                    $this->request->data['Datalog']['logactivity'] = 'Delete';
                    $this->request->data['Datalog']['logid'] = $id;
                    $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                    
                    $a = $this->Datalog->save($this->request->data['Datalog']);
                    
            /******************/
            $this->Session->setFlash(__('The Instrument Group has been deleted',h($id)));
            return $this->redirect(array('controller'=>'Instrumentforgroups','action'=>'index'));
        }
    }
    
    public function add_group_quotation()
    {
        $this->autoRender   =   false;
        //pr($this->data);exit;
         if ($this->data) {
            App::uses('Sanitize', 'Utility');
            $title = Sanitize::clean($this->data['Instrumentforgroup']['type_name']);

            $this->Instrumentforgroup->id = $this->data['Instrumentforgroup']['id'];
            $this->Instrumentforgroup->saveField('type_name', $title);
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
    public function approve()
    {
            $this->autoRender=false;
            $id =  $this->request->data['id'];
            $this->InstrumentType->updateAll(array('InstrumentType.is_approved'=>1),array('InstrumentType.id'=>$id));
            $user_id = $this->Session->read('sess_userid');
            $this->Logactivity->updateAll(array('Logactivity.logapprove'=>2,'Logactivity.approved_by'=>$user_id),array('Logactivity.logid'=>$id,'Logactivity.logname'=>'Instrument For Group'));
            //$details=$this->Instrumentforgroup->find('first',array('conditions'=>array('Instrumentforgroup.id'=>$id)));
    }
}

?>