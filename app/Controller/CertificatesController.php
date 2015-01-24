<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class CertificatesController extends AppController
{   
     public $helpers = array('Html','Form','Session','xls','Number');
     public $uses =array('Priority','Paymentterm','Quotation','Currency','Document',
                            'Country','Additionalcharge','Service','CustomerInstrument','Customerspecialneed',
                            'Instrument','Brand','Customer','Device','Unit','Logactivity','InstrumentType','Tempcertificatedata',
                            'Contactpersoninfo','CusSalesperson','Clientpo','branch','Datalog','Title','Random','InsPercent','Tempinstrument','Tempambient'
							 ,'Tempother','Temprange','Temprelativehumidity','Tempreadingtype','Tempchannel','Tempinstrumentvalid','Tempunit','Tempunitconvert',
							    'Tempformdata','Tempuncertainty','Tempuncertaintydata','InstrumentRange','Temptemplate','Tempcertificate','Temptemplatedata');
    public function index($id=NULL)
    {
        
        if($this->request->data)
        {
            
            $certificateno = $this->request->data['step1']['certificateno'];
            $readingtype_id = $this->request->data['step1']['readingtype_id'];
            $channel_id = $this->request->data['step1']['channel_id'];
            $temp1= $this->request->data['step1']['temp1'];
            
            $uncertainty1_val1 = $this->request->data['step1']['uncertainty1_val'];
            $uncertainty1_val = implode(',',$uncertainty1_val1);
            
            $find_cert = $this->Tempcertificatedata->find('first',array('conditions'=>array('Tempcertificatedata.certificate_no'=>$certificateno,'Tempcertificatedata.temp_readingtype_id'=>$readingtype_id,'Tempcertificatedata.temp_channel_id'=>$channel_id)));
            //pr($find_cert);exit;
            if(count($find_cert))
            {
                
                $this->request->data['Tempcertificatedata'] = $this->request->data['step1'];
                $this->request->data['Tempcertificatedata']['certificate_no'] = $certificateno;
                $this->request->data['Tempcertificatedata']['temp_readingtype_id'] = $readingtype_id;
                $this->request->data['Tempcertificatedata']['temp_channel_id'] = $channel_id;
                //$this->request->data['Tempcertificatedata']['temp1'] = $temp1;
                $this->request->data['Tempcertificatedata']['uncertainty1_val'] = $uncertainty1_val;
                $this->request->data['Tempcertificatedata']['id']= $find_cert['Tempcertificatedata']['id'];
                $this->Tempcertificatedata->save($this->request->data['Tempcertificatedata']);
            }
            else
            {
                $this->request->data['Tempcertificatedata'] = $this->request->data['step1'];
                $this->request->data['Tempcertificatedata']['certificate_no'] = $certificateno;
                $this->request->data['Tempcertificatedata']['temp_readingtype_id'] = $readingtype_id;
                $this->request->data['Tempcertificatedata']['temp_channel_id'] = $channel_id;
                //$this->request->data['Tempcertificatedata']['temp1'] = $temp1;
                 
                $this->request->data['Tempcertificatedata']['uncertainty1_val'] = $uncertainty1_val;
                $this->Tempcertificatedata->create();
                $this->Tempcertificatedata->save($this->request->data['Tempcertificatedata']);
            }
            
            
           // pr($this->request->data['Tempcertificatedata']);exit;
        }
        else
        {
            $ids = array();
            $ids = explode("$", $id);
            $instrument_id = $ids[0];
            $range_id = $ids[1];
            $model_no = $ids[2];
            $brand_id = $ids[3];
            $salesorder_id = $ids[4];
            $description_id = $ids[5];

            $find_cert_main_data = $this->Description->find('first',array('conditions'=>array('Description.id'=>$description_id),'recursive'=>'2'));
            //pr($find_cert_main_data);exit;
            $this->set('get_cert_main',$find_cert_main_data);

            $get_cert_sales = $this->Tempcertificate->find('first',array('conditions'=>array('Tempcertificate.description_id'=>$description_id),'recursive'=>'2'));
            //pr($get_cert_sales);exit;
            $get_cert_certno = $this->Tempcertificate->find('list',array('fields' => array('certificate_no','certificate_no')),array('recursive'=>'2'));
            $this->set('get_cert_sales',$get_cert_sales);
            $this->set('get_cert_certno',$get_cert_certno);


    // pr($ids);exit;
            //if(Temptemplate)
            $uncertainty = $this->Tempuncertainty->find('all');
            $this->set('uncertainty',$uncertainty);
            $readingtype_data = $this->Tempreadingtype->find('list',array('fields' => array('Tempreadingtype.id','Tempreadingtype.readingtypename'),'conditions'=>array('Tempreadingtype.is_deleted'=>0,'Tempreadingtype.status'=>1)),array('order'=>'Tempreadingtype.id Desc','recursive'=>'2'));
            $this->set('readingtype_data',$readingtype_data);

            $channel_data = $this->Tempchannel->find('list',array('fields' => array('Tempchannel.id','Tempchannel.channelname'),'conditions'=>array('Tempchannel.is_deleted'=>0,'Tempchannel.status'=>1)),array('order'=>'Tempchannel.id Desc','recursive'=>'2'));
            $this->set('channel_data',$channel_data);

            $tempform_data = $this->Tempformdata->find('first');
            $this->set('formdata',$tempform_data);

            $instrument_cal_status = array('1'=>'Faulty','2'=>'Non Capability','3'=>'No Capability','4'=>'Return without cal','5'=>'Out of tolerance');
            $this->set('instrument_cal_status',$instrument_cal_status);
        }
        
    }
    public function temperature()
    {
        //$template_data = $this->Temptemplate->find('all',array('conditions'=>array('Temptemplate.is_deleted'=>0)),array('order'=>'Temptemplate.id Desc','recursive'=>'2'));
        //
        //$description = $this->Description->find('all',array('conditions'=>array('Description.status'=>1,'Description.checking'=>0,'Description.processing'=>0,'Description.department_id'=>2)));
        //pr($template_data);exit;
        
        //$template_data = $this->Temptemplate->find('all',array('joins' => array('table' => 'sal_description', 'type' => 'INNER', 'alias' => 'Description','conditions' => 'Description.instrument_id=Temptemplate.temp_instruments_id,Description.model_no=Temptemplate.model,Description.brand_id=Temptemplate.brand_id,Description.sales_range=Temptemplate.range_id'), 'conditions'=>array('Temptemplate.is_deleted'=>0)),array('order'=>'Temptemplate.id Desc','recursive'=>'2'));
        $eng_data = $this->Description->query('SELECT *
                        FROM sal_description AS Description
                        LEFT JOIN `best`.`temp_templates` AS `Temptemplate` ON Description.instrument_id = Temptemplate.temp_instruments_id
                        WHERE Description.model_no = Temptemplate.model
                        AND Description.brand_id = Temptemplate.brand_id
                        AND Description.sales_range = Temptemplate.range_id
                        AND Temptemplate.is_deleted =0
                        AND Description.checking =0
                        GROUP BY Description.id DESC');
        $this->set('eng_data',$eng_data);
        foreach($eng_data as $data_arr)
        {
            $data_arr_val[] = $data_arr['Description']['id'];
            //Tempcertificate
                $get_cert_list = $this->Tempcertificate->find('first',array('conditions'=>array('Tempcertificate.description_id'=>$data_arr['Description']['id']),'recursive'=>'2'));
                if(!$get_cert_list)
                {
                    $get_cert_sales = $this->Tempcertificate->find('all',array('conditions'=>array('Tempcertificate.description_id'=>$data_arr['Description']['salesorder_id']),'recursive'=>'2'));
                    {
                        pr($get_cert_sales);exit;
                    }
                    
                    // Heard http://8tracks.com/evansmusic/99-songs-to-make-your-homework-awesome Awesome u know
                    
                    $dmt    =   $this->random('certificateno');
                    //pr($dmt);exit;
                    
                    $certificate_no = $dmt;
                    $this->request->data['Tempcertificate']['certificate_no'] = $certificate_no;
                    $this->request->data['Tempcertificate']['template_id'] = $data_arr['Temptemplate']['id'];
                    $this->request->data['Tempcertificate']['salesorder_id'] = $data_arr['Description']['salesorder_id'];
                    $this->request->data['Tempcertificate']['description_id'] = $data_arr['Description']['id'];
                    $this->request->data['Tempcertificate']['instrument_id'] = $data_arr['Description']['instrument_id'];
                    $this->request->data['Tempcertificate']['brand_id'] = $data_arr['Description']['brand_id'];
                    $this->request->data['Tempcertificate']['model'] = $data_arr['Description']['model_no'];
                    $this->request->data['Tempcertificate']['range_id'] = $data_arr['Description']['sales_range'];
                    $this->request->data['Tempcertificate']['is_template_created'] = 1;
                    $this->request->data['Tempcertificate']['is_template_match'] = 1;
                    if($this->Tempcertificate->save($this->request->data['Tempcertificate']))
                    {
                        $last_insert_id = $this->Tempcertificate->getLastInsertID();
                        $this->Random->updateAll(array('Random.certificateno'=>'"'.$dmt.'"'),array('Random.id'=>1));  
                        //$this->Temptemplatedata->updateAll(array('Temptemplatedata.status'=>1,'Temptemplatedata.temp_templates_id'=>$last_insert_id),array('Temptemplatedata.status'=>0));
                        $this->Session->setFlash(__('Template & Template Data are Added Successfully'));
                    }
                    //pr($data_arr);
                }
                else
                {
                    
                    
                    //$this->Session->setFlash(__('Certificate Already Exists!'));
                }
        }
        
        $sup_data = $this->Description->find('all',array('conditions'=>array('NOT' => array('Description.id'=>$data_arr_val),'Description.status'=>1,'Description.checking'=>0,'Description.processing'=>0,'Description.department_id'=>2)));
        $this->set('sup_data',$sup_data);
        //pr($description);exit;
//        foreach($description as $data_arr)
//        {
//            $description1[] = $data_arr['Description']['id'];
//        }
        
//        $description = $this->Description->query('SELECT *
//                        FROM sal_description AS Description
//                        LEFT JOIN `best`.`temp_templates` AS `Temptemplate` ON Description.instrument_id != Temptemplate.temp_instruments_id
//                        WHERE Description.model_no != Temptemplate.model
//                        AND Description.brand_id != Temptemplate.brand_id
//                        AND Description.sales_range != Temptemplate.range_id
//                        AND Temptemplate.is_deleted =0
//                        AND Description.checking =0
//                        AND Description.processing =0
//                        GROUP BY Description.id ASC');
//        //$template_data_arr = 
//        foreach($description as $data_arr1)
//        {
//            $data_arr_val1[] = $data_arr1['Description']['id'];
//        }
        ///pr($eng_data);
        //pr($description1);
        //pr($data_arr_val1);
        //exit;
        

        
        
        
        
        
        
        
        
        
//        if($template_data)
//        {
//            $description_sup = $description_eng = $arr1 = array();
//            foreach($template_data as $temp1)
//            {
//                foreach($description as $temp2)
//                {
//                    //pr($temp2);exit;
//                    if($temp1['Temptemplate']['temp_instruments_id'] == $temp2['Description']['instrument_id'] && $temp1['Temptemplate']['model'] == $temp2['Description']['model_no'] && $temp1['Temptemplate']['brand_id'] == $temp2['Description']['brand_id'] && $temp1['Temptemplate']['range_id'] == $temp2['Description']['sales_range'])
//                    {
//                        
//                        if(!in_array($temp2['Description']['id'], $arr1))
//                        {
//                            $arr1[] = $temp2['Description']['id'];
//                            $description_eng[] = $temp2;
//                            
//                        }
//
//                    }
////                    else
////                    {
////                        if(!in_array($temp2['Description']['id'], $arr1))
////                        {
////                            $arr1[] = $temp2['Description']['id'];
////                            $description_sup[] = $temp2;
////                            //pr($arr2);
////                        }
////                    }
//                }
//                //exit;
//            }
//        }
//        else
//        {
//            $description_sup = $description_eng = $arr1 = array();
//            foreach($description as $temp2)
//            {
//                //pr($temp2);exit;
//                if(!in_array($temp2['Description']['id'], $arr1))
//                {
//                    $arr1[] = $temp2['Description']['id'];
//                    $description_sup[] = $temp2;
//                    //$description_eng[] = '';
//                }
//                
//            }
//        }
//        $this->set('description_sup',$description_sup);
//        $this->set('description_eng',$description_eng);
        
        ////////////// Form 2 /////////////////
        
    }
    
    public function template()
    {
        
    }
    
    public function calculation_form()
    {
        $this->layout = 'ajax';
        $unit_list = $this->Tempunit->find('list', array('conditions' => array('Tempunit.status' => 1),'fields' => array('Tempunit.id','unitname')));
        $this->set('unit_list',$unit_list);
        
        $uncertainty = $this->Tempuncertainty->find('all');
        $this->set('uncertainty',$uncertainty);
        
        $certificateno = $this->request->data['certificateno'];
        $readingtype_id = $this->request->data['readingtype'];
        $channel_id = $this->request->data['channel'];
        //$temp1= $this->request->data['step1']['temp1'];
        //pr($this->request->data);exit;
        $find_cert = $this->Tempcertificatedata->find('first',array('conditions'=>array('Tempcertificatedata.certificate_no'=>$certificateno,'Tempcertificatedata.temp_readingtype_id'=>$readingtype_id,'Tempcertificatedata.temp_channel_id'=>$channel_id)));
        //$this->request->data['Tempcertificatedata']['uncertainty1_val'] = $uncertainty_val1;
        //$find_cert['Tempcertificatedata']['uncertainty1_val']
        $this->set('cert',$find_cert);
        //pr($find_cert['Tempcertificatedata']);exit;
        //pr($find_cert);exit;
         
        
        $get_cert_sales = $this->Tempcertificate->find('first',array('conditions'=>array('Tempcertificate.certificate_no'=>$certificateno),'recursive'=>'2'));
        //$get_cert_sales_data = $this->Tempcertificatedata->find('first',array('conditions'=>array('Tempcertificatedata.certificate_no'=>$certificateno),'recursive'=>'2'));
        //$get_cert_sales['Tempcertificate']['template_id']
        $this->set('get_cert_sales',$get_cert_sales);
        $find_cert_main_data = $this->Description->find('first',array('conditions'=>array('Description.id'=>$get_cert_sales['Tempcertificate']['description_id']),'recursive'=>'2'));
        $this->set('cert1_main_data',$find_cert_main_data);
        //pr($find_cert_main_data);exit;
        $template_data = $this->Temptemplate->find('first',array('conditions'=>array('Temptemplate.id'=>$get_cert_sales['Tempcertificate']['template_id']),'recursive'=>'2'));
        $this->set('tempdata_all',$template_data['Temptemplatedata']);
        //pr($template_data['Temptemplatedata']);exit;
////Continue from here



//pr($template_data);exit;
        $get_cert_certno = $this->Tempcertificate->find('list',array('fields' => array('certificate_no','certificate_no')),array('recursive'=>'2'));
        
        $this->set('get_cert_certno',$get_cert_certno);

        
            $uncertainty = $this->Tempuncertainty->find('all');
            $this->set('uncertainty',$uncertainty);
            $readingtype_data = $this->Tempreadingtype->find('list',array('fields' => array('Tempreadingtype.id','Tempreadingtype.readingtypename'),'conditions'=>array('Tempreadingtype.is_deleted'=>0,'Tempreadingtype.status'=>1)),array('order'=>'Tempreadingtype.id Desc','recursive'=>'2'));
            $this->set('readingtype_data',$readingtype_data);

            $channel_data = $this->Tempchannel->find('list',array('fields' => array('Tempchannel.id','Tempchannel.channelname'),'conditions'=>array('Tempchannel.is_deleted'=>0,'Tempchannel.status'=>1)),array('order'=>'Tempchannel.id Desc','recursive'=>'2'));
            $this->set('channel_data',$channel_data);
            
             $temp_temperature = $this->Tempambient->find('list',array('fields' => array('Tempambient.id','Tempambient.ambientname'),'conditions'=>array('Tempambient.is_deleted'=>0,'Tempambient.status'=>1,'Tempambient.default'=>1)),array('order'=>'Tempambient.id Desc','recursive'=>'2'));
            $this->set('temp_temperature',$temp_temperature);
            
             $rel_humidity = $this->Temprelativehumidity->find('list',array('fields' => array('Temprelativehumidity.id','Temprelativehumidity.relativehumidity'),'conditions'=>array('Temprelativehumidity.is_deleted'=>0,'Temprelativehumidity.status'=>1)),array('order'=>'Temprelativehumidity.id Desc','recursive'=>'2'));
            $this->set('rel_humidity',$rel_humidity);

            $tempform_data = $this->Tempformdata->find('first');
            $this->set('formdata',$tempform_data);

            $instrument_cal_status = array('1'=>'Faulty','2'=>'Non Capability','3'=>'No Capability','4'=>'Return without cal','5'=>'Out of tolerance');
            $this->set('instrument_cal_status',$instrument_cal_status);
    }
    
    
}

?>
