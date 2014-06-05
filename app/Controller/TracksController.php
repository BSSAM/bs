<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    class TracksController extends AppController
    {
        public $helpers = array('Html','Form','Session');
        public $uses =array('Priority','Paymentterm','Quotation','Currency',
                            'Country','Additionalcharge','Service','CustomerInstrument','Customerspecialneed',
                            'Instrument','Brand','Customer','Device','Salesorder','Description','Logactivity');
        public function index()
        {
//            if($this->request->is('get'))
//            {
            //$this->request->params['track_id'];
            $track_id = $this->request->query['track_id'];
            if(!empty($track_id)){
                $this->set('track',$track_id);
                $quotation = $this->Quotation->find('all',array('conditions'=>array('track_id'=>$track_id)));
                //$customer = $this->Customer->find('all',array('customer_id'=>$quotation[0]['Quotation']['customer_id']));
                pr($quotation);
                //pr($customer);
                $this->set('Quo_det',$quotation);
                //$this->set('Cus_det',$customer);
            }
//            }
//            else{
//                exit;
//            }
        }
    }
    
?>