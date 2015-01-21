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
							    'Tempformdata','Tempuncertainty','Tempuncertaintydata','InstrumentRange','Temptemplate');
    public function index($id=NULL)
    {
        if($this->request->data){
            $certificateno = $this->request->data['step1']['certificateno'];
            $readingtype_id = $this->request->data['step1']['readingtype_id'];
            $channel_id = $this->request->data['step1']['channel_id'];
            $temp1= $this->request->data['step1']['temp1'];
            $uncertainty1_val = $this->request->data['step1']['uncertainty1_val'];
            $find_cert = $this->Tempcertificatedata->find('first',array('conditions'=>array('Tempcertificatedata.certificate_no'=>$certificateno,'Tempcertificatedata.temp_readingtype_id'=>$readingtype_id,'Tempcertificatedata.temp_channel_id'=>$channel_id)));
            //pr($find_cert);exit;
            if(count($find_cert))
            {
                
                $this->request->data['Tempcertificatedata'] = $this->request->data['step1'];
                $this->request->data['Tempcertificatedata']['certificate_no'] = $certificateno;
                $this->request->data['Tempcertificatedata']['temp_readingtype_id'] = $readingtype_id;
                $this->request->data['Tempcertificatedata']['temp_channel_id'] = $channel_id;
                //$this->request->data['Tempcertificatedata']['temp1'] = $temp1;
                //$this->request->data['Tempcertificatedata']['uncertainty1_val'] = $uncertainty1_val;
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
                //$this->request->data['Tempcertificatedata']['uncertainty1_val'] = $uncertainty1_val;
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
        //$salesorder_id = $ids[4];
        //$description_id = $ids[5];
        
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
        $template_data = $this->Temptemplate->find('all',array('conditions'=>array('Temptemplate.is_deleted'=>0)),array('order'=>'Temptemplate.id Desc','recursive'=>'2'));
        //
        $description = $this->Description->find('all',array('conditions'=>array('Description.status'=>1,'Description.checking'=>0,'Description.processing'=>0,'Description.department_id'=>2)));
        //pr($template_data);exit;
        if($template_data)
        {
            $description_sup = $description_eng = $arr1 = $arr2 = array();
            foreach($template_data as $temp1)
            {
                foreach($description as $temp2)
                {
                    //pr($temp2);exit;
                    if($temp1['Temptemplate']['temp_instruments_id'] == $temp2['Description']['instrument_id'] && $temp1['Temptemplate']['model'] == $temp2['Description']['model_no'] && $temp1['Temptemplate']['brand_id'] == $temp2['Description']['brand_id'] && $temp1['Temptemplate']['range_id'] == $temp2['Description']['sales_range'])
                    {
                        if(!in_array($temp2['Description']['instrument_id'], $arr1))
                        {
                            $arr1[] = $temp2['Description']['instrument_id'];
                            $description_eng[] = $temp2;
                            //pr($description_sup);exit;
                        }

                    }
                    else
                    {
                        if(!in_array($temp2['Description']['instrument_id'], $arr2))
                        {
                            $arr2[] = $temp2['Description']['instrument_id'];
                            $description_sup[] = $temp2;
                        }
                    }
                }
            }
        }
        else
        {
            $description_sup = $description_eng = $arr1 = $arr2 = array();
            foreach($description as $temp2)
            {
                //pr($temp2);exit;
                if(!in_array($temp2['Description']['instrument_id'], $arr2))
                {
                    $arr2[] = $temp2['Description']['instrument_id'];
                    $description_sup[] = $temp2;
                    //$description_eng[] = '';
                }
                
            }
        }
        $this->set('description_sup',$description_sup);
        $this->set('description_eng',$description_eng);
        
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
        
        $this->set('cert',$find_cert);
        //pr($find_cert['Tempcertificatedata']);exit;
        //pr($find_cert);exit;
    }
    
    
}

?>
