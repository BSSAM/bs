<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class JobmonitoringsController extends AppController
{
    public $helpers = array('Html','Form','Session');
    public $components = array('RequestHandler');
    public $uses    =   array('Deliveryorder','Invoice','Salesorder','Description','Customer');
    public function index()
    {
        $salesorder_approved_list    =   $this->Salesorder->find('all',array('conditions'=>array('Salesorder.is_approved'=>1),'recursive'=>2));
        foreach($salesorder_approved_list as $list_sales):
            $deliver = $this->Deliveryorder->find('all',array('conditions'=>array('Deliveryorder.is_approved'=>1)));
        endforeach;
        //pr($salesorder_approved_list);exit;'Deliveryorder.salesorder_id'=>$id,
        $this->set(compact('salesorder_approved_list'));
            
    }
    public function edit($id=NULL)
    {
            $this->set('job_sales_no',$id);
            $description_list    =   $this->Description->find('all',array('conditions'=>array('Description.salesorder_id'=>$id,'Description.is_deleted'=>0,'Description.is_approved'=>1),'recursive'=>2));
            $deliver = $this->Deliveryorder->find('all',array('conditions'=>array('Deliveryorder.salesorder_id'=>$id,'Deliveryorder.is_approved'=>1)));
            //pr($deliver);exit;
            if($deliver!=''):
                $this->set('deliver_order',$deliver);
            else:
                $this->set('deliver_order',0);
            endif;
            
            if($this->request->is(array('post','put')))
            {
                $description_ready_deliver_array = $this->request->data['Description']['ready_deliver'];
//                pr($description_ready_deliver_array);exit;
                if (!empty($description_ready_deliver_array)) 
                {
                    foreach ($description_ready_deliver_array as $key => $value) 
                    {
                        if($value!=0)
                        {
                   
                            $this->Description->id = $value;
                            $this->Description->saveField('ready_deliver', 1);
                        }
                    }
                    
                }
                $total_count    =   $this->Description->find('count',array('conditions'=>array('Description.salesorder_id'=>$id)));
                $deliver_count      =   $this->Description->find('count',array('conditions'=>array('Description.salesorder_id'=>$id,'Description.ready_deliver'=>1)));
                if($total_count==$deliver_count)
                {
                    $this->Deliveryorder->updateAll(array('Deliveryorder.ready_to_deliver'=>1),array('Deliveryorder.salesorder_id'=>$id));
                }
                $this->Session->setFlash(__('Job has been updated Successfully'));
                $this->redirect(array('controller'=>'Jobmonitorings','action'=>'index'));
            }
            else
            {
                $this->set('descriptions',$description_list);
            }
        }
}
