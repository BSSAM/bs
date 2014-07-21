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
        //pr($salesorder_approved_list);exit;    
        //pr($salesorder_approved_list);exit; 
        $this->set(compact('salesorder_approved_list'));
            
    }
    public function edit($id=NULL)
    {
            $this->set('job_sales_no',$id);
            $description_list    =   $this->Description->find('all',array('conditions'=>array('Description.is_approved'=>1),'recursive'=>2));
            pr($description_list);exit;
            $deliver = $this->Deliveryorder->find('all',array('conditions'=>array('Deliveryorder.salesorder_id'=>$id)));
            
            if($deliver!=''):
                $this->set('deliver_order',$deliver);
            else:
                $this->set('deliver_order',0);
            endif;
    
            
            if($this->request->is(array('post','put')))
            {
               
                $customer_id    =   $this->request->data['Salesorder']['customer_id'];
                $this->Salesorder->id=$id;
                
                if($this->Salesorder->save($this->request->data['Salesorder']))
                {
                    $description_array = $this->request->data['Description']['processing'];
                    if (!empty($description_array)) 
                    {
                        foreach ($description_array as $key => $value) 
                        {
                            $this->Description->id = $key;
                            $this->Description->saveField('processing', $value);
                        }
                    }
                    //pr($this->request->data['Salesorder']);exit;
                    $device_node    =   $this->Description->find('all',array('conditions'=>array('Description.customer_id'=>$customer_id)));
                    if(!empty($device_node))
                    {
                        $this->Description->updateAll(array('Description.salesorder_id'=>'"'.$id.'"','Description.status'=>'1'),array('Description.customer_id'=>$customer_id));
                    }
                    $this->Session->setFlash(__('Salesorder has been Updated Succefully '));
                    $this->redirect(array('action'=>'index'));
                }
            }
            else
            {
                $this->set('descriptions',$description_list);
            }
        }
}
