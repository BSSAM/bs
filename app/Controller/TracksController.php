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
                            'Instrument','Brand','Customer','Device','Salesorder','Description','Logactivity','Deliveryorder','Title');
       
	   
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
			$completed_list = $this->Salesorder->find('all',array('conditions'=>array('Salesorder.is_deleted'=>0,'Salesorder.is_approved'=>1,
			'Salesorder.is_trackcompleted'=>1),'order' => array('Salesorder.id' =>'DESC')));
                       // pr($completed_list);
            $this->set('completed_list',$completed_list);
			$title =   $this->Title->find('all');
            foreach($title as $title_name)
            {
                $titles[] = $title_name['Title']['title_name'];
            }
        $this->set('titles', $titles);
			$request_search =  1;
			
			if(isset($this->request->data['salestrack']) && !empty($this->request->data['TrackComplete']))
			{
					foreach($this->request->data['TrackComplete'] as $salesid)
					{
						 $this->Salesorder->id = $salesid;
    					 $this->Salesorder->saveField("is_trackcompleted","1");
					}
					$this->Session->setFlash(__('Tracking Status Changed Successfully'));
			}
				
				
				
            if(isset($this->request->data['gate']) && isset($this->request->data['query_input']) && isset($this->request->data['equal_input']) &&
			 isset($this->request->data['val']))
            {
			    $andor = $this->request->data['gate'];
                $condition = $this->request->data['query_input'];
                $conditiontype = $this->request->data['equal_input'];
                $value = $this->request->data['val'];
                $conditions = $ccres = array();

                $conditions['Salesorder.is_deleted'] = 0;
                $device = array();
                foreach($condition as $k => $con)
                {
                    if($conditiontype[$k]!='LIKE')
					{
						if($con == 'Device.model_no')   $device[$con.' '.$conditiontype[$k]] =  $value[$k];
						
						else if($con == 'Device.quantity')   $device[$con.' '.$conditiontype[$k]] =  $value[$k];
						
						else  $ccres[$con.' '.$conditiontype[$k]] =  $value[$k];
						
					}
                	else    
                	$ccres[$con.' LIKE "%'.$value[$k].'%"']  = ''; 
                }
				
				
				
				$Deviceid = $this->Device->find('list',array('fields'=>array('id'),'conditions'=>$device)); // pr($Deviceid);exit;
				if(!empty($Deviceid))
				{
					$Description = $this->Description->find('list',array('fields'=>array('salesorder_id'),'conditions'=>array('Description.device_id'=>$Deviceid)));
					$ccres['Salesorder.id'] =  $Description;
				}
               
			    $conditions[$andor] = $ccres;
				
				$salesgetid = array();
                $sales_all = $this->Salesorder->find('all',array('conditions'=>$conditions));  
				foreach($sales_all as $k => $vv)
				{
					$salesgetid[$k] = $vv['Salesorder']['id'];
				}
				
				$request_search = $salesgetid;
				
				$salesorder_list = $this->Salesorder->find('all',array('conditions'=>array('Salesorder.id'=>$salesgetid,'Salesorder.is_approved'=>1)));
                //pr($request_search);exit;
			}
            else
            {
                $salesorder_list = $this->Description->find('all',array('conditions'=>array('Description.is_deleted'=>0)));
              
            }
			
			$this->set('track_list',$salesorder_list);
			$this->set('request_search', $request_search);
			
			
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
	public function remarks()
        {
            $this->autoRender   =   false;
             if ($this->data) {
                App::uses('Sanitize', 'Utility');
                $title = Sanitize::clean($this->request->data['track_remark']);

                $this->Salesorder->id = $this->request->data['id'];
                $this->Salesorder->saveField('track_remark', $title);
                echo $title;
            }
        }	
		
        
    }     
    
?>