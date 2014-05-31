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
        'Instrument', 'Brand', 'Customer', 'Device', 'Salesorder', 'Description', 'Deliveryorder','InstrumentBrand','InstrumentRange','InstrumentProcedure');
    public function index()
    {
        /*******************************************************
         *  BS V1.0
         *  User Role Permission
         *  Controller : Procedures
         *  Permission : view 
        *******************************************************/
        $user_role = $this->userrole_permission();
        if($user_role['other_role']['view'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        /*
         * *****************************************************
         */
        $instrument_data = $this->Instrument->find('all',array('order'=>'Instrument.id Desc','recursive'=>'2'));
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
        if($user_role['other_role']['add'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        /*
         * *****************************************************
         */
//         $this->virtualFields['range_name'] =  sprintf('CONCAT(%s.name, " - ", %s.model)', $this->Range->range_name, $this->Unit->unit_name);
        $brand_array =   $this->Brand->find('list',array('conditions'=>array('Brand.status'=>'1'),'fields'=>array('id','brandname')));
        $department_array =   $this->Department->find('list',array('conditions'=>array('Department.status'=>'1'),'fields'=>array('id','departmentname')));
        $procedure_array =   $this->Procedure->find('list',array('conditions'=>array('Procedure.status'=>'1'),'fields'=>array('id','procedure_no')));
        $range_array =   $this->Range->find('list',array('conditions'=>array('Range.status'=>'1'),'fields'=>array('id','range_name'),'contain' => array('Unit')));
        $this->set(compact('brand_array','range_array','procedure_array','department_array'));
        if($this->request->is('post'))
        {
            $instrumentpro_array = $this->request->data['InstrumentProcedure']['procedure_id'];
            $instrumentbra_array = $this->request->data['InstrumentBrand']['brand_id'];
            $instrumentran_array = $this->request->data['InstrumentRange']['range_id'];
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
        if($user_role['other_role']['add'] ==0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        /*
         * *****************************************************
         */
        $instrument_data = $this->Instrument->find('first',array('conditions'=>array('Instrument.id'=>$id),'recursive'=>'2'));
      
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
                $this->Session->setFlash(__('Procedure Cant be Updated'));
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
         *  Controller : Procedures
         *  Permission : Delete 
         *  Description   :   Delete Procedures Details page
         *******************************************************/
        $user_role = $this->userrole_permission();
        if($user_role['other_role']['add'] == 1){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        /*
         * *****************************************************
         */
        if($this->request->is('get'))
        {
            throw new MethodNotAllowedException();
        }
        if($this->Procedure->delete($id))
        {
            $this->Session->setFlash(__('The Procedure has been deleted',h($id)));
            return $this->redirect(array('controller'=>'Procedures','action'=>'index'));
        }
    }
}
