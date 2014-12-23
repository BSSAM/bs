<?php
/*
 * Document     :   TitlesController.php
 * Controller   :   Titles 
 * Model        :   Title 
 * Created By   :   M.Iyappan Samsys
 */
class TitlesController extends AppController   
{
    public $helpers = array('Html', 'Form', 'Session');
    public $uses = array('Procedure','Department','Country','Range','Service', 'CustomerInstrument', 'Customerspecialneed',
        'Instrument', 'Brand', 'Customer', 'Device', 'Salesorder', 'Description', 'Deliveryorder','InstrumentBrand',
        'InstrumentRange','InstrumentProcedure','Title');
    public function index()
    {
        /*******************************************************
         *  BS V1.0
         *  User Role Permission
         *  Controller : Title
         *  Permission : view 
        *******************************************************/
        $user_role = $this->userrole_permission();
        if($user_role['ins_title']['view'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        
        $this->set('userrole_cus',$user_role['ins_title']);
        /*
         * *****************************************************
         */
        $title_data = $this->Title->find('all',array('order'=>'Title.id Desc','recursive'=>'2'));
        $this->set('titles', $title_data);
        
    }
    
    public function add()
    {
        /*******************************************************
         *  BS V1.0
         *  User Role Permission
         *  Controller : Title
         *  Permission : add 
         *  Description   :   add Title Details page
         *******************************************************/
        $user_role = $this->userrole_permission();
        if($user_role['ins_title']['add'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        /*
         * *****************************************************
         */
        if($this->request->is('post'))
        {
            if($this->Title->save($this->request->data))
            {
                $this->Session->setFlash(__('Title has been  Added Successfully'));
                $this->redirect(array('controller'=>'Titles','action'=>'index'));
            }
            $this->Session->setFlash(__('Title Could Not be Added'));
        }
    }
    public function edit($id = null)
    {
        /*******************************************************
         *  BS V1.0
         *  User Role Permission
         *  Controller : Title
         *  Permission : edit 
         *  Description   :   edit Title Details page
         *******************************************************/
        $user_role = $this->userrole_permission();
        if($user_role['ins_title']['edit'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        /*
         * *****************************************************
         */
        if(empty($id))
        {
             $this->Session->setFlash(__('Invalid Entry'));
             return $this->redirect(array('action'=>'edit'));
        }
        $titles =  $this->Title->findById($id); 
        if(empty($titles))
        {
            $this->Session->setFlash(__('Invalid Title'));
            return $this->redirect(array('action'=>'edit'));
        }
        if($this->request->is(array('post','put')))
        {
            $this->Title->id = $id;
            if($this->Title->save($this->request->data))
            {
               $this->Session->setFlash(__('Title has been  Updated'));
               return $this->redirect(array('controller'=>'Titles','action'=>'index'));
            }
            $this->Session->setFlash(__('Title Cant be Updated'));
        }
        else
        {
            $this->request->data = $titles;
        }
    }
    
    public function delete($id)
    {
        /*******************************************************
         *  BS V1.0
         *  User Role Permission
         *  Controller : Title
         *  Permission : delete 
         *  Description   :   delete Title Details page
         *******************************************************/
        $user_role = $this->userrole_permission();
        if($user_role['ins_title']['delete'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
        }
        /*
         * *****************************************************
         */
        if($this->request->is('get'))
        {
            throw new MethodNotAllowedException();
        }
        if($this->Title->deleteAll(array('Title.id'=>$id)))
        {
            $this->Session->setFlash(__('The Title has been deleted',h($id)));
            return $this->redirect(array('controller'=>'Titles','action'=>'index'));
        }
    }
}
