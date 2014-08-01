<?php
/*
 * Document     :   InstrumentsController.php
 * Controller   :   Instruments 
 * Model        :   Instrument 
 * Created By   :   M.Iyappan Samsys
 */
class InstrumentsController extends AppController   
{
    public $helpers = array('Html', 'Form', 'Session');
    public $uses = array('Procedure','Department','Country','Range','Service', 'CustomerInstrument', 'Customerspecialneed',
        'Instrument', 'Brand', 'Customer', 'Device', 'Salesorder', 'Description', 'Deliveryorder','InstrumentBrand','InstrumentRange','InstrumentProcedure','Logactivity','Datalog');
    public function index()
    {
        /*******************************************************
         *  BS V1.0
         *  User Role Permission
         *  Controller : Procedures
         *  Permission : view 
        *******************************************************/
        $user_role = $this->userrole_permission();
        if($user_role['ins_instrument']['view'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        /*
         * *****************************************************
         */
        //$instrument_data = $this->Instrument->find('all',array('conditions'=>array('Instrument.is_approved'=>1),'order'=>'Instrument.id Desc','recursive'=>'2'));
        $instrument_data = $this->Instrument->find('all',array('conditions'=>array('Instrument.is_deleted'=>0)),array('order'=>'Instrument.id Desc','recursive'=>'2'));
        //pr($instrument_data);exit;
        $this->set('instruments', $instrument_data);
        
    }
    
    public function add()
    {
        /*******************************************************
         *  BS V1.0
         *  User Role Permission
         *  Controller : Procedures
         *  Permission : add 
         *  Description   :   add Procedures Details page
         *******************************************************/
        $user_role = $this->userrole_permission();
        if($user_role['ins_instrument']['add'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        /*
         * *****************************************************
         */
//         $this->virtualFields['range_name'] =  sprintf('CONCAT(%s.name, " - ", %s.model)', $this->Range->range_name, $this->Unit->unit_name);
        $brand_array =   $this->Brand->find('list',array('conditions'=>array('Brand.status'=>'1'),'fields'=>array('id','brandname')));
        $department_array =   $this->Department->find('list',array('conditions'=>array('Department.status'=>'1'),'fields'=>array('id','departmentname')));
        $procedure_array =   $this->Procedure->find('list',array('conditions'=>array('Procedure.status'=>'1'),'fields'=>array('id','procedure_no')));
        //pr($procedure_array);exit;
        $range_array =   $this->Range->find('list',array('conditions'=>array('Range.status'=>'1'),'fields'=>array('id','range_name'),'contain' => array('Unit')));
        $this->set(compact('brand_array','range_array','procedure_array','department_array'));
        if($this->request->is('post'))
        {
            $instrumentpro_array = $this->request->data['InstrumentProcedure']['procedure_id'];
            $instrumentbra_array = $this->request->data['InstrumentBrand']['brand_id'];
            $instrumentran_array = $this->request->data['InstrumentRange']['range_id'];
           // pr($this->request->data);exit;
            if($this->Instrument->save($this->request->data))
            {
                $last_insert_id =   $this->Instrument->getLastInsertID();
                if(!empty($instrumentpro_array))
                {
                    foreach($instrumentpro_array as $key=>$value)
                    {
                        $this->InstrumentProcedure->create();
                        $pro_data = array('instrument_id' =>$last_insert_id, 'procedure_id' => $value);
                        $this->InstrumentProcedure->save($pro_data);
                    }
                }
                if(!empty($instrumentbra_array))
                {
                    foreach($instrumentbra_array as $key=>$value)
                    {
                        $this->InstrumentBrand->create();
                        $bra_data = array('instrument_id' =>$last_insert_id, 'brand_id' => $value);
                        $this->InstrumentBrand->save($bra_data);
                    }
                }
                if(!empty($instrumentran_array))
                {
                    foreach ($instrumentran_array as $key => $value) 
                    {
                        $this->InstrumentRange->create();
                        $ran_data = array('instrument_id' => $last_insert_id, 'range_id' => $value);
                        $this->InstrumentRange->save($ran_data);
                    }
                }
                
                /******************
                    * Log Activity For Approval
                    */
                    $this->request->data['Logactivity']['logname'] = 'Instrument';
                    $this->request->data['Logactivity']['logactivity'] = 'Add Instrument';
                    $this->request->data['Logactivity']['logid'] = $last_insert_id;
                    $this->request->data['Logactivity']['user_id'] = $this->Session->read('sess_userid');
                    $this->request->data['Logactivity']['logapprove'] = 1;

                    $a = $this->Logactivity->save($this->request->data['Logactivity']);
                    
                /******************/
                    
                /******************
                    * Data Log Activity
                    */
                    $this->request->data['Datalog']['logname'] = 'Instrument';
                    $this->request->data['Datalog']['logactivity'] = 'Add';
                    $this->request->data['Datalog']['logid'] = $last_insert_id;
                    $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                    
                    $a = $this->Datalog->save($this->request->data['Datalog']);
                    
                /******************/    

                
                $this->Session->setFlash(__('Instrument is Added Successfully'));
                $this->redirect(array('controller'=>'Instruments','action'=>'index'));
            }
            $this->Session->setFlash(__('Instrument Could Not be Added'));
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
        if($user_role['ins_instrument']['add'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        /*
         * *****************************************************
         */
        $instrument_data = $this->Instrument->find('first',array('conditions'=>array('Instrument.id'=>$id),'recursive'=>'2'));
        $instrument_dat = $this->Instrument->find('first',array('conditions'=>array('Instrument.id'=>$id),'recursive'=>'2'));
        $this->set('instrument_dat',$instrument_dat);
      
        $brand_array =   $this->Brand->find('list',array('conditions'=>array('Brand.status'=>'1'),'fields'=>array('id','brandname')));
        $department_array =   $this->Department->find('list',array('conditions'=>array('Department.status'=>'1'),'fields'=>array('id','departmentname')));
        $procedure_array =   $this->Procedure->find('list',array('conditions'=>array('Procedure.status'=>'1'),'fields'=>array('id','procedure_no')));
        $range_array =   $this->Range->find('list',array('conditions'=>array('Range.status'=>'1'),'fields'=>array('id','range_name'),'contain' => array('Unit')));
        $this->set(compact('brand_array','range_array','procedure_array','department_array'));
        
        
        if($this->request->is(array('post','put')))
        {
            $instrumentpro_array = $this->request->data['InstrumentProcedure']['procedure_id'];
            $instrumentbra_array = $this->request->data['InstrumentBrand']['brand_id'];
            $instrumentran_array = $this->request->data['InstrumentRange']['range_id'];
            $this->Instrument->id   =  $id;   
            if($this->Instrument->save($this->request->data))
            {
                /******************
                    * Data Log Activity
                    */
                    $this->request->data['Datalog']['logname'] = 'Instrument';
                    $this->request->data['Datalog']['logactivity'] = 'Edit';
                    $this->request->data['Datalog']['logid'] = $id;
                    $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                    
                    $a = $this->Datalog->save($this->request->data['Datalog']);
                    
                /******************/    
                
                if(!empty($instrumentpro_array))
                {
                    $this->InstrumentProcedure->deleteAll(array('InstrumentProcedure.instrument_id'=>$id));
                    foreach($instrumentpro_array as $key=>$value)
                    {
                        $this->InstrumentProcedure->create();
                        $pro_data = array('instrument_id' =>$id, 'procedure_id' => $value);
                        $this->InstrumentProcedure->save($pro_data);
                    }
                }
                if(!empty($instrumentbra_array))
                {
                    $this->InstrumentBrand->deleteAll(array('InstrumentBrand.instrument_id'=>$id));
                    foreach($instrumentbra_array as $key=>$value)
                    {
                        
                        $this->InstrumentBrand->create();
                        $bra_data = array('instrument_id' =>$id, 'brand_id' => $value);
                        $this->InstrumentBrand->save($bra_data);
                       
                    }
                }
                if(!empty($instrumentran_array))
                {
                    $this->InstrumentRange->deleteAll(array('InstrumentRange.instrument_id'=>$id));
                    foreach ($instrumentran_array as $key => $value) 
                    {
                        
                        $this->InstrumentRange->create();
                        $ran_data = array('instrument_id' =>$id, 'range_id' => $value);
                        $this->InstrumentRange->save($ran_data);
                    }
                }
                $this->Session->setFlash(__('Instrument is Added Successfully'));
                $this->redirect(array('controller'=>'Instruments','action'=>'index'));
                
            }
            else
            {
                $this->Session->setFlash(__('Instrument Cant be Updated'));
                $this->redirect(array('controller'=>'Instruments','action'=>'index'));
            }
        }
        else
        {
            $this->request->data = $instrument_data;
        }
    }
    public function delete($id)
    {
        /*******************************************************
         *  BS V1.0
         *  User Role Permission
         *  Controller : Instrument
         *  Permission : Delete 
         *  Description   :   Delete Instrument Details page
         *******************************************************/
        $user_role = $this->userrole_permission();
        if($user_role['ins_instrument']['delete'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        /*
         * *****************************************************
         */
        if($this->request->is('get'))
        {
            throw new MethodNotAllowedException();
        }
        //pr($id);exit;
        if($this->Instrument->updateAll(array('Instrument.is_deleted'=>1,'Instrument.status'=>0),array('Instrument.id'=>$id)))
        {
            /******************
                    * Data Log Activity
                    */
                    $this->request->data['Datalog']['logname'] = 'Instrument';
                    $this->request->data['Datalog']['logactivity'] = 'Delete';
                    $this->request->data['Datalog']['logid'] = $id;
                    $this->request->data['Datalog']['user_id'] = $this->Session->read('sess_userid');
                    
                    $a = $this->Datalog->save($this->request->data['Datalog']);
                    
            /******************/    
            $this->Session->setFlash(__('The Instrument has been deleted',h($id)));
            return $this->redirect(array('controller'=>'Instruments','action'=>'index'));
        }
    }
    
    public function approve()
    {
            $this->autoRender=false;
            $id =  $this->request->data['id'];
            $this->Instrument->updateAll(array('Instrument.is_approved'=>1),array('Instrument.id'=>$id));
            $user_id = $this->Session->read('sess_userid');
            $this->Logactivity->updateAll(array('Logactivity.logapprove'=>2,'Logactivity.approved_by'=>$user_id),array('Logactivity.logid'=>$id,'Logactivity.logactivity'=>'Add Instrument'));
            $details=$this->Instrument->find('first',array('conditions'=>array('Instrument.id'=>$id)));
            
    }
}
