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
                if(!$quotation):
                    $this->set('message',"This TRACK ID doesn't provide any Details!!!");
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
        public function tracklist()
        {
            if(isset($this->request->data['gate']) && isset($this->request->data['query_input']) && isset($this->request->data['equal_input']) && isset($this->request->data['val']))
            {
                $andor = $this->request->data['gate'];

                $condition = $this->request->data['query_input'];
                $conditiontype = $this->request->data['equal_input'];
                $value = $this->request->data['val'];
                $conditions = $ccres = array();

                $conditions['Salesorder.is_deleted'] = 0;
                $conditions['branch.branchname'] = 'Singapore';
                ///$conditions1['Device.quotationno'] = 'BSQ-05-000002';
                foreach($condition as $k => $con)
                {
                    if($conditiontype[$k]!='LIKE')
                    $ccres[$con.' '.$conditiontype[$k]]  = $value[$k];       
                //  else    
                //  $ccres[$con.' LIKE "%'.$value[$k].'%"']  = ''; 
                }

                $conditions[$andor] = $ccres;
                $salesorder_list = $this->Salesorder->find('all',array('conditions'=>$conditions,'order' => array('Salesorder.id' => 'DESC')));
                //$quotation_lists = $this->Quotation->find('all',array('conditions'=>$conditions,'order' => array('Quotation.created' => 'ASC')));    
                //pr($salesorder_list);
                $this->set('track_list', $salesorder_list);
                //$log = $this->Salesorder->getDataSource()->getLog(false, false);
                //debug($log);
                //exit;
            }
            else
            {
                $salesorder_list = $this->Salesorder->find('all',array('conditions'=>array('Salesorder.is_deleted'=>0),'order' => array('Salesorder.id' => 'DESC')));
                //pr($salesorder_list);exit;
                $this->set('track_list',$salesorder_list);
    //           
            }
        }
        public function reportfinal() {
            $this->viewClass = 'Media';
            // Download app/webroot/files/example.csv
            $params = array(
               'id'        => 'tracking.csv',
               'name'      => 'tracking',
               'extension' => 'csv',
               'download'  => true,
               'path'      => APP . 'webroot' . DS. 'excel'. DS  // file path
           );
           $this->set($params);
        }
        
    }     
    
?>