<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class ClientposController extends AppController
{
    public $helpers = array('Html','Form','Session');
    public $uses =array('Priority','Paymentterm','Quotation','Currency',
                            'Country','Additionalcharge','Service','CustomerInstrument','Customerspecialneed',
                            'Instrument','Brand','Customer','Device','Unit','Logactivity','InstrumentType',
                            'Contactpersoninfo','CusSalesperson','Clientpo');
    public function index()
    {
        $clientpos    =   $this->Clientpo->find('all');
        $this->set('clientpo', $clientpos);
    }
    public function Clientpo($id = null)
    {
          $clientpo_list=$this->Clientpo->find('first',array('conditions'=>array('Clientpo.id'=>$id)));
          $this->request->data=$clientpo_list;
          //$this->set('clientpo', $clientpos);
    }
}