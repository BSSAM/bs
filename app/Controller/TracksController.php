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
                            'Instrument','Brand','Customer','Device','Salesorder','Description','Logactivity','Deliveryorder');
        public function index()
        {
            $track_id = $this->request->query['track_id'];
            

            
            if(!empty($track_id)){
                $this->set('track',$track_id);
                $quotation = $this->Quotation->find('all',array('conditions'=>array('Quotation.track_id'=>$track_id,'Quotation.is_deleted'=>0),'recursive'=>'1'));
                //pr($quotation);exit;
                if($quotation==''):
                    $this->set('message',"There is No Details Found in this Track ID!!!");
                else:
                    $this->set('message',"");
                $salesorder = $this->Salesorder->find('all',array('conditions'=>array('Salesorder.track_id'=>$track_id)));
                $deliveryorder = $this->Deliveryorder->find('all',array('conditions'=>array('Deliveryorder.track_id'=>$track_id)));
                //pr($quotation);exit;
               // pr($salesorder);
                //pr($deliveryorder);
                //exit;
                $this->set('Quo_det',$quotation);
                $this->set('Sal_det',$salesorder);
                $this->set('Del_det',$deliveryorder);
                endif;
            }
            else{
                return $this->redirect(array('controller' => 'Dashboards','action'=>'index'));
            }
//           
        }
    }
    
?>