<?php
/*
 * Document     :   InstrumentsController.php
 * Controller   :   Instruments 
 * Model        :   Instrument 
 * Created By   :   M.Iyappan Samsys
 */
class AutosController extends AppController   
{
    public $helpers = array('Html', 'Form', 'Session');
    public $uses = array('Random','Priority', 'Paymentterm', 'Quotation', 'Currency', 'Document',
        'Country', 'Additionalcharge', 'Service', 'CustomerInstrument', 'Customerspecialneed',
        'Instrument', 'Brand', 'Customer', 'Device', 'Unit', 'Logactivity', 'InstrumentType',
        'Contactpersoninfo', 'CusSalesperson', 'Clientpo', 'branch','Datalog','Logactivity');

    
    public function index()
    {
        /*******************************************************
         *  BS V1.0
         *  User Role Permission
         *  Controller : instrumentforgroup
         *  Permission : Edit 
         *  Description   :   Edit instrumentforgroup Details page
         *******************************************************/

        $random =  $this->Random->findById(1); 
        
        if($this->request->is(array('post','put')))
        {
            $this->Random->id = 1;
            //pr($this->request->data);exit;
            if($this->Random->save($this->request->data))
            {
               
               $this->Session->setFlash(__('Random has been Updated'));
               return $this->redirect(array('controller'=>'Autos','action'=>'index'));
            }
            $this->Session->setFlash(__('Random Cant be Updated'));
        }
        else
        {
            $this->request->data = $random;
        }
    }
    
}

?>