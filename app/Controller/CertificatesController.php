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
                            'Instrument','Brand','Customer','Device','Unit','Logactivity','InstrumentType',
                            'Contactpersoninfo','CusSalesperson','Clientpo','branch','Datalog','Title','Random','InsPercent','Tempinstrument','Tempambient'
							 ,'Tempother','Temprange','Temprelativehumidity','Tempreadingtype','Tempchannel','Tempinstrumentvalid','Tempunit','Tempunitconvert',
							    'Tempformdata','Tempuncertainty','Tempuncertaintydata','InstrumentRange','Temptemplate');
    public function index($id=NULL)
    {
        
        //if(Temptemplate)
        $uncertainty = $this->Tempuncertainty->find('all');
        $this->set('uncertainty',$uncertainty);
        $readingtype_data = $this->Tempreadingtype->find('list',array('fields' => array('Tempreadingtype.id','Tempreadingtype.readingtypename'),'conditions'=>array('Tempreadingtype.is_deleted'=>0,'Tempreadingtype.status'=>1)),array('order'=>'Tempreadingtype.id Desc','recursive'=>'2'));
        $this->set('readingtype_data',$readingtype_data);

        $channel_data = $this->Tempchannel->find('list',array('fields' => array('Tempchannel.id','Tempchannel.channelname'),'conditions'=>array('Tempchannel.is_deleted'=>0,'Tempchannel.status'=>1)),array('order'=>'Tempchannel.id Desc','recursive'=>'2'));
        $this->set('channel_data',$channel_data);
		
    }
    public function temperature()
    {
        $template_data = $this->Temptemplate->find('all',array('conditions'=>array('Temptemplate.is_deleted'=>0)),array('order'=>'Temptemplate.id Desc','recursive'=>'2'));
        
        $description = $this->Description->find('all',array('conditions'=>array('Description.processing'=>1,'Description.status'=>1,'Description.department_id'=>2)));
        $description_sup = $description_eng = $arr1 = $arr2 = array();
        foreach($template_data as $temp1)
        {
            foreach($description as $temp2)
            {
                if($temp1['Temptemplate']['temp_instruments_id'] == $temp2['Description']['instrument_id'] && $temp1['Temptemplate']['model'] == $temp2['Description']['model_no'] && $temp1['Temptemplate']['brand_id'] == $temp2['Description']['brand_id'] && $temp1['Temptemplate']['range_id'] == $temp2['Description']['sales_range'])
                {
                    if(!in_array($temp2['Description']['instrument_id'], $arr1))
                    {
                        $arr1[] = $temp2['Description']['instrument_id'];
                        $description_sup[] = $temp2;
                    }

                }
                else
                {
                    if(!in_array($temp2['Description']['instrument_id'], $arr2))
                    {
                        $arr2[] = $temp2['Description']['instrument_id'];
                        $description_eng[] = $temp2;
                    }
                }
            }
        }
        
        $this->set('description_sup',$description_sup);
        $this->set('description_eng',$description_eng);
        //exit;
        //pr($description);exit;
        //$this->set('description',$description);
        
    }
}

?>
