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
    public $uses    =   array('Deliveryorder','Invoice');
    public function index()
    {
        $deliveryorder_approved_list    =   $this->Deliveryorder->find('all',array('conditions'=>array('Deliveryorder.is_approved'=>1),'recursive'=>2));
//       pr($deliveryorder_approved_list);exit;
        $this->set(compact('deliveryorder_approved_list'));
    }
    public function edit($id=NULL)
    {
          pr($id);exit;
            if($this->request->is(array('post','put')))
            {
                $customer_id    =   $this->request->data['Salesorder']['customer_id'];
                $this->Salesorder->id=$id;
                if($this->Salesorder->save($this->request->data['Salesorder']))
                {
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
                $this->request->data=$salesorder_details;
            }
        }
}
