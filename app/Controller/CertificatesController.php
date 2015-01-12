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
							    'Tempformdata','Tempuncertainty','Tempuncertaintydata','InstrumentRange');
    public function index()
    {
        $readingtype_data = $this->Tempreadingtype->find('list',array('fields' => array('Tempreadingtype.id','Tempreadingtype.readingtypename'),'conditions'=>array('Tempreadingtype.is_deleted'=>0,'Tempreadingtype.status'=>1)),array('order'=>'Tempreadingtype.id Desc','recursive'=>'2'));
		$this->set('readingtype_data',$readingtype_data);
		
		$channel_data = $this->Tempchannel->find('list',array('fields' => array('Tempchannel.id','Tempchannel.channelname'),'conditions'=>array('Tempchannel.is_deleted'=>0,'Tempchannel.status'=>1)),array('order'=>'Tempchannel.id Desc','recursive'=>'2'));
		$this->set('channel_data',$channel_data);
		
    }
}

?>
