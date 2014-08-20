<?php
    class SalesordersController extends AppController
    {
        public $helpers = array('Html','Form','Session');
        public $uses =array('Priority','Paymentterm','Quotation','Currency','Contactpersoninfo','SalesDocument',
                            'Country','Additionalcharge','Service','CustomerInstrument','Customerspecialneed',
                            'Instrument','Brand','Customer','Device','Salesorder','Description','Logactivity','branch','Datalog');
        public function index()
        {
        
        }
    }
?>