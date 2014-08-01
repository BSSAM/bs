<?php
/*
 * Document     :   File uploadsController.php
 * Controller   :   File Uploads Controller 
 * Model        :   File Upload 
 * Created By   :   M.Iyappan Samsys
 */
class FileuploadsController extends AppController   
{
    public $helpers = array('Html','Form','Session');
    public $uses = array('Contactpersoninfo','Billingaddress','Deliveryaddress','Projectinfo','Quotation','Document',
                        'Customer','Address','Salesperson','Referedby','CusSalesperson','CusReferby',
                        'Industry','Location','Paymentterm','Instrument','InstrumentRange','CustomerInstrument',
                        'Deliveryordertype','InvoiceType','Priority');
    public function index($id=NULL)
    {
        /*******************************************************
         *  BS V1.0
         *  File upload  list for Customer
         *  Controller : File uploads Controller
         *  Permission : view 
        *******************************************************/
        $file_upload_customerlist   =   $this->Customer->find('all',array('conditions'=>array('Customer.status'=>1,'Customer.is_deleted'=>0)));
        //pr($clientpo);exit;
        $this->set(compact('file_upload_customerlist'));
    }
    public function file_upload()
    {
        $this->autoRender=  false;
        $sess_quotation_id   =$this->Session->read('sess_quotation_id');
        
        if($this->request->is('post'))
          {
            $quotation_id  =   $_POST['quotation_id'] ;  
            $quotation_no  =   $_POST['quotation_no'] ;  
            $customer_id  =   $_POST['customer_id'] ;  
            $quotation_files   =   $_FILES['file'];
            $document_array    = array();
            if(!empty($quotation_files))
            {
                if(!is_dir(APP.'webroot'.DS.'files'.DS.'Quotations'.DS.$quotation_no)):
                        mkdir(APP.'webroot'.DS.'files'.DS.'Quotations'.DS.$quotation_no);
                endif;
                $document_name  =   time().'_'.$quotation_files['name'];
                $type = $quotation_files['type'];
                $size = $quotation_files['size'];
                $tmpPath = $quotation_files['tmp_name'];
                $originalPath = APP.'webroot'.DS.'files'.DS.'Quotations'.DS.$quotation_no.DS.$document_name;
                if(move_uploaded_file($tmpPath,$originalPath))
                {
                    $document_array['Document']['document_name']= $document_name;
                    $document_array['Document']['customer_id']= $customer_id;
                    $document_array['Document']['quotation_id']= $quotation_id;
                    $document_array['Document']['document_size']= $size;
                    $document_array['Document']['document_type']= $quotation_files['type'];
                    $this->Document->create();
                    $this->Document->save($document_array);
                }
            }
            
          }
          else 
            {                                                            
                $result  = array();
                $files = scandir(APP.'webroot'.DS.'files'.DS.'Quotations'.DS.$sess_quotation_id);                 //1
                if ( false!==$files ) {
                    foreach ( $files as $file ) {
                        if ( '.'!=$file && '..'!=$file) {       //2
                            $obj['name'] = $file;
                            $obj['size'] = filesize(APP.'webroot'.DS.'files'.DS.'Quotations'.DS.$sess_quotation_id.DS.$file);
                            $result[] = $obj;
                        }
                    }
                }
                echo json_encode($result);
            }
    }
    public function delete_document()
    {
        $this->autoRender   =   false;
        $sess_quotation_id   =$this->Session->read('sess_quotation_id');
        $document_id    =   $this->request->data['document_id'];
        if(unlink(APP.'webroot'.DS.'files'.DS.'Quotations'.DS.$sess_quotation_id.DS.$document_id))
        {
            $this->Document->updateAll(array('Document.status'=>0),array('Document.document_name'=>$document_id));
        }
        
    }
    public function add($id=NULL)
    {
      
        /*******************************************************
         *  BS V1.0
         *  User Role Permission
         *  Controller : Procedures
         *  Permission : add 
         *  Description   :   add Procedures Details page
         *******************************************************/
     $this->Session->write('sess_quotation_id',$id);
     
     $customer_quotation=$this->Quotation->find('first',array('conditions'=> array('Quotation.quotationno'=>$id)));
     $this->set(compact('customer_quotation'));  
    }
    public function individual($id=NULL)
    {
      
        /*******************************************************
         *  BS V1.0
         *  User Role Permission
         *  Controller : Procedures
         *  Permission : add 
         *  Description   :   add Procedures Details page
         *******************************************************/
     $this->Session->write('sess_quotation_id',$id);
     
     $customer_quotation=$this->Quotation->find('first',array('conditions'=> array('Quotation.quotationno'=>$id)));
     $this->set(compact('customer_quotation'));  
    }
    public function Customer_quotation_list($id=NULL)
    {
        $customer_detatils  =   $this->Customer->find('first',array('conditions'=> array('Customer.id'=>$id)));
        $customer_quotation_list=$this->Quotation->find('all',array('conditions'=> array('Quotation.customer_id'=>$id)));
        $this->set(compact('customer_quotation_list','customer_detatils'));
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
    }
     public function delete($id=NULL)
    {
      
        $this->autoRender=false;
        if($this->Customer->updateAll(array('Customer.is_deleted'=>1,'Customer.status'=>0),array('Customer.id'=>$id)))
        {
            $this->Session->setFlash(__('Customer has been deleted'));
            return $this->redirect(array('action'=>'index',$id));
        }
    }
   
     public function tag_contact_person_add()
    {
        $this->autoRender=false;
        //echo $this->Session->read('customer_id');
        $this->loadModel('Contactpersoninfo');
        $this->request->data['Contactpersoninfo']['email']=$this->request->data['contact_email'];
        $this->request->data['Contactpersoninfo']['remarks']=$this->request->data['contact_remark'];
        $this->request->data['Contactpersoninfo']['name']=$this->request->data['contact_name'];
        $this->request->data['Contactpersoninfo']['department']=$this->request->data['contact_department'];
        $this->request->data['Contactpersoninfo']['phone']=$this->request->data['contact_phone'];
        $this->request->data['Contactpersoninfo']['position']=$this->request->data['contact_position'];
        $this->request->data['Contactpersoninfo']['mobile']=$this->request->data['contact_mobile'];
        $this->request->data['Contactpersoninfo']['purpose']=$this->request->data['contact_purpose'];
        $this->request->data['Contactpersoninfo']['customer_id']=$this->request->data['customer_id'];
        $this->request->data['Contactpersoninfo']['tag_id']=$this->request->data['tag_id'];
        $this->request->data['Contactpersoninfo']['customergroup_id']=$this->request->data['group_id'];
        $this->request->data['Contactpersoninfo']['status']=0;
        if($this->Contactpersoninfo->save($this->request->data))
        {
            echo "success";
        }
    }
    public function contact_delete()
    {
        $this->autoRender=false;
        $delete_id= $this->request->data['delete_id'];
        if($this->Contactpersoninfo->deleteAll(array('Contactpersoninfo.tag_id'=>$delete_id)))
        {
            echo "deleted";
        }
    }
    public function add_individual($id=NULL)
    {}
    public function upload_individual($id=NULL)
    {
        $this->autoRender=  false;
        if($this->request->is('post'))
          {
            
            $quotation_no  =   $_POST['quotation_no'] ;  
            $quotation_files   =   $_FILES['file'];
            $document_array    = array();
            if(!empty($quotation_files))
            {
                if(!is_dir(APP.'webroot'.DS.'files'.DS.'Quotations'.DS.$quotation_no)):
                        mkdir(APP.'webroot'.DS.'files'.DS.'Quotations'.DS.$quotation_no);
                endif;
                $document_name  =   time().'_'.$quotation_files['name'];
                $type = $quotation_files['type'];
                $size = $quotation_files['size'];
                $tmpPath = $quotation_files['tmp_name'];
                $originalPath = APP.'webroot'.DS.'files'.DS.'Quotations'.DS.$quotation_no.DS.$document_name;
                if(move_uploaded_file($tmpPath,$originalPath))
                {
                    $document_array['Document']['document_name']= $document_name;
                    $document_array['Document']['document_size']= $size;
                    $document_array['Document']['upload_type']= 'individual';
                    $document_array['Document']['quotationno']= $quotation_no;
                    $document_array['Document']['document_type']= $quotation_files['type'];
                    $document_array['Document']['status']= 0;
                    $this->Document->create();
                    $this->Document->save($document_array);
                }
            }
            
          }
          else 
            {        
             
                $result  = array();
                if(is_dir(APP.'webroot'.DS.'files'.DS.'Quotations'.DS.$id))
                {        
                        $files = scandir(APP.'webroot'.DS.'files'.DS.'Quotations'.DS.$id);   
                        if ( false!==$files ) 
                        {
                            foreach ( $files as $file ) 
                            {
                                if ( '.'!=$file && '..'!=$file) 
                                {       //2
                                    $obj['name'] = $file;
                                    $obj['size'] = filesize(APP.'webroot'.DS.'files'.DS.'Quotations'.DS.$id.DS.$file);
                                    $result[] = $obj;
                                }
                            }
                        }
                    echo json_encode($result);
                }
            }
    
    }
}
