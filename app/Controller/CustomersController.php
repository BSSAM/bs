<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class CustomersController extends AppController
{
    
    public $helpers = array('Html','Form','Session');
    public $uses = array('Contactpersoninfo','Billingaddress','Deliveryaddress','Projectinfo','Customer');
    
        
    public function index()
    {
        $this->Session->delete('customer_id');
        $data = $this->Customer->find('all',array('order' => array('Customer.id' => 'DESC')));
       // pr($data);exit;
        $this->set('customer', $data);
        $this->loadModel('Address');
        $this->Address->deleteAll(array('Address.status'=>0));
        $this->loadModel('Projectinfo');
        $this->Projectinfo->deleteAll(array('Projectinfo.project_status'=>0));
        //pr($data);
    }
    
    public function addregaddress()
    {
        
    $this->autoRender=false;
    $regaddress= $this->request->data['regaddress'];
        $customer_id=$this->request->data['customer_id'];
        
        $status=0;
        $this->loadModel('Address');
        $random =mt_rand();
        $this->request->data['Address']['customer_id']=$customer_id;
        $this->request->data['Address']['address_id']=$random;
        $this->request->data['Address']['address']=$regaddress;
        $this->request->data['Address']['type']='registered';
        $this->request->data['Address']['status']=$status;
        if($this->Address->save($this->request->data))
        {
            echo $random;
        }
    
    }
     public function editregaddress()
    {
        
    $this->autoRender=false;
    $regaddress= $this->request->data['regaddress'];
        $customer_id=$this->request->data['customer_id'];
        
        $status=1;
        $this->loadModel('Address');
        $random =mt_rand();
        $this->request->data['Address']['customer_id']=$customer_id;
        $this->request->data['Address']['address_id']=$random;
        $this->request->data['Address']['address']=$regaddress;
        $this->request->data['Address']['type']='registered';
        $this->request->data['Address']['status']=$status;
        if($this->Address->save($this->request->data))
        {
            echo $random;
        }
    
    }
    
     public function deleteregaddress()
    {
        $this->autoRender=false;
        $delete_id= $this->request->data['delete_id'];
        
        $this->loadModel('Address');
        
        if($this->Address->deleteAll(array('Address.address_id'=>$delete_id)))
        {
            echo "deleted";
        }
    }
    
    public function addbilladdress()
    {
        
    $this->autoRender=false;
    $billaddress= $this->request->data['billaddress'];
        $customer_id=$this->request->data['customer_id'];
        
        $status=0;
        $this->loadModel('Address');
        $random =mt_rand();
        $this->request->data['Address']['customer_id']=$customer_id;
        $this->request->data['Address']['address_id']=$random;
        $this->request->data['Address']['address']=$billaddress;
        $this->request->data['Address']['type']='billing';
        $this->request->data['Address']['status']=$status;
        if($this->Address->save($this->request->data))
        {
            echo $random;
        }
    
    }
     public function editbilladdress()
    {
        
    $this->autoRender=false;
    $billaddress= $this->request->data['billaddress'];
        $customer_id=$this->request->data['customer_id'];
        
        $status=1;
        $this->loadModel('Address');
        $random =mt_rand();
        $this->request->data['Address']['customer_id']=$customer_id;
        $this->request->data['Address']['address_id']=$random;
        $this->request->data['Address']['address']=$billaddress;
        $this->request->data['Address']['type']='billing';
        $this->request->data['Address']['status']=$status;
        if($this->Address->save($this->request->data))
        {
            echo $random;
        }
    
    }
    
     public function deletebilladdress()
    {
        $this->autoRender=false;
        $delete_id= $this->request->data['delete_id'];
        
        $this->loadModel('Address');
        
        if($this->Address->deleteAll(array('Address.address_id'=>$delete_id)))
        {
            echo "deleted";
        }
    }
    
    public function adddeliveryaddress()
    {
        
    $this->autoRender=false;
    $deliveryaddress= $this->request->data['deliveryaddress'];
        $customer_id=$this->request->data['customer_id'];
        
        $status=0;
        $this->loadModel('Address');
        $random =mt_rand();
        $this->request->data['Address']['customer_id']=$customer_id;
        $this->request->data['Address']['address_id']=$random;
        $this->request->data['Address']['address']=$deliveryaddress;
        $this->request->data['Address']['type']='delivery';
        $this->request->data['Address']['status']=$status;
        if($this->Address->save($this->request->data))
        {
            echo $random;
        }
    
    }
    public function editdeliveryaddress()
    {
        
    $this->autoRender=false;
    $deliveryaddress= $this->request->data['deliveryaddress'];
        $customer_id=$this->request->data['customer_id'];
        
        $status=1;
        $this->loadModel('Address');
        $random =mt_rand();
        $this->request->data['Address']['customer_id']=$customer_id;
        $this->request->data['Address']['address_id']=$random;
        $this->request->data['Address']['address']=$deliveryaddress;
        $this->request->data['Address']['type']='delivery';
        $this->request->data['Address']['status']=$status;
        if($this->Address->save($this->request->data))
        {
            echo $random;
        }
    
    }
    
     public function deletedeliveryaddress()
    {
        $this->autoRender=false;
        $delete_id= $this->request->data['delete_id'];
        
        $this->loadModel('Address');
        
        if($this->Address->deleteAll(array('Address.address_id'=>$delete_id)))
        {
            echo "deleted";
        }
    }
    
    public function addprojectinfo()
    {
        
    $this->autoRender=false;
    $projectname= $this->request->data['projectname'];
        $customer_id=$this->request->data['customer_id'];
        
        $status=0;
        $this->loadModel('Projectinfo');
        $random =mt_rand();
        $this->request->data['Projectinfo']['customer_id']=$customer_id;
        $this->request->data['Projectinfo']['project_id']=$random;
        $this->request->data['Projectinfo']['project_name']=$projectname;
        $this->request->data['Projectinfo']['project_status']=$status;
        if($this->Projectinfo->save($this->request->data))
        {
            echo $random;
        }
    
    }
    public function editprojectinfo()
    {
        
    $this->autoRender=false;
    $projectname= $this->request->data['projectname'];
        $customer_id=$this->request->data['customer_id'];
        
        $status=1;
        $this->loadModel('Projectinfo');
        $random =mt_rand();
        $this->request->data['Projectinfo']['customer_id']=$customer_id;
        $this->request->data['Projectinfo']['project_id']=$random;
        $this->request->data['Projectinfo']['project_name']=$projectname;
        $this->request->data['Projectinfo']['project_status']=$status;
        if($this->Projectinfo->save($this->request->data))
        {
            echo $random;
        }
    
    }
    
     public function deleteprojectinfo()
    {
        $this->autoRender=false;
        $delete_id= $this->request->data['delete_id'];
        
        $this->loadModel('Projectinfo');
        
        if($this->Projectinfo->deleteAll(array('Projectinfo.project_id'=>$delete_id)))
        {
            echo "deleted";
        }
    }
    
    public function add()
    {
        
        if($this->Session->read('customer_id')=='')
        {
        $d=date ("d");
        $m=date ("m");
        $y=date ("Y");
        $t=time();
        $dmt='CUS'.($d+$m+$y+$t);
        $this->Session->write('customer_id',$dmt);
        }
        $this->set('customer_id',$this->Session->read('customer_id'));
        
        $this->loadModel('Salesperson');
        $data = $this->Salesperson->find('list', array('fields' => 'salesperson'));
        $this->set('salesperson',$data);
        
        $this->loadModel('Referedby');
        $data1 = $this->Referedby->find('list', array('fields' => 'referedby'));
        $this->set('referedby',$data1);
        
        $this->loadModel('Address');
        $data10 = $this->Address->find('all',array('conditions'=>array('customer_id'=>$this->Session->read('customer_id'),'status'=>0,'type'=>'registered')));
        $data10_count = $this->Address->find('count',array('conditions'=>array('customer_id'=>$this->Session->read('customer_id'),'status'=>0,'type'=>'registered')));
        //pr($data10);pr($data10_count);exit;
        $this->set('data10',$data10);
        $this->set('data10_count',$data10_count);
        
       
        $data11 = $this->Address->find('all',array('conditions'=>array('customer_id'=>$this->Session->read('customer_id'),'status'=>0,'type'=>'billing')));
        $data11_count = $this->Address->find('count',array('conditions'=>array('customer_id'=>$this->Session->read('customer_id'),'status'=>0,'type'=>'billing')));
        //pr($data10);pr($data10_count);exit;
        $this->set('data11',$data11);
        $this->set('data11_count',$data11_count);
        
        $data12 = $this->Address->find('all',array('conditions'=>array('customer_id'=>$this->Session->read('customer_id'),'status'=>0,'type'=>'delivery')));
        $data12_count = $this->Address->find('count',array('conditions'=>array('customer_id'=>$this->Session->read('customer_id'),'status'=>0,'type'=>'delivery')));
        //pr($data10);pr($data10_count);exit;
        $this->set('data12',$data12);
        $this->set('data12_count',$data12_count);
        
        $data13 = $this->Projectinfo->find('all',array('conditions'=>array('customer_id'=>$this->Session->read('customer_id'),'project_status'=>0)));
        $data13_count = $this->Projectinfo->find('count',array('conditions'=>array('customer_id'=>$this->Session->read('customer_id'),'project_status'=>0)));
        //pr($data10);pr($data10_count);exit;
        $this->set('data13',$data13);
        $this->set('data13_count',$data13_count);
        
        $this->loadModel('Industry');
        $data2 = $this->Industry->find('list', array('fields' => 'industryname'));
        $this->set('industry',$data2);
        
        $this->loadModel('Location');
        $data3 = $this->Location->find('list', array('fields' => 'locationname'));
        $this->set('location',$data3);
        
        $this->loadModel('Paymentterm');
        $data4 = $this->Paymentterm->find('list', array('fields' => 'paymentterm'));
         //pr($data4);exit;
        $data5 = $this->Paymentterm->find('list', array('fields' => 'paymenttype'));
          
        
        
        $array3 = '';
        $i = 0 ; 
        $array3 = array();
        //pr($data4);pr($data5);exit;
        count($data4);
        for($i=1;$i<=count($data4);$i++)
        {
            $array3[] = $data4[$i].' '.$data5[$i];

        }
        $this->set('paymentterm',$array3);
        
         $this->loadModel('Priority');
         $data6 = $this->Priority->find('list', array('fields' => 'priority'));
        $this->set('priority',$data6);
		
		 $this->loadModel('Userrole');
         $data = $this->Userrole->find('list', array('fields' => 'user_role'));
        $this->set('userrole',$data);
        
        if($this->request->is('post'))
        {
           
             $this->request->data['status']=1;
            //pr($dat);exit;
             //$dat = $this->request->params[''];
             $match2 = $this->request->data['salesperson_id'];
              $dept = implode(',',$match2);
              $this->request->data['salesperson_id'] = $dept;
              
              $match3 = $this->request->data['referedbies_id'];
              $dept1 = implode(',',$match3);
              $this->request->data['referedbies_id'] = $dept1;
             
             $match1 = $this->request->data['customername'];
             $data1 = $this->Customer->findByCustomername($match1);
            
            
            if(!empty($data1))
            {
            
                $this->Session->setFlash(__('Customer Name Already Exist'));
               
                return $this->redirect(array('action'=>'add'));
            }
            $this->Customer->create();
           // pr($this->request->data);exit;
            unset($this->request->data['Customer']);
            $this->request->data['id'] = $this->Session->read('customer_id');
            
                        //pr($this->request->data);exit;

            
            if($this->Customer->save($this->request->data))
            {
               $project= $this->Projectinfo->find('count',array('conditions'=>array('Projectinfo.customer_id'=>$this->Session->read('customer_id'))));
               $contactperson= $this->Contactpersoninfo->find('count',array('conditions'=>array('Contactpersoninfo.customer_id'=>$this->Session->read('customer_id'))));
//               $billingaddress= $this->Billingaddress->find('count',array('conditions'=>array('Billingaddress.customer_id'=>$this->Session->read('customer_id'))));
//               $delivery=$this->Deliveryaddress->find('count',array('conditions'=>array('Deliveryaddress.customer_id'=>$this->Session->read('customer_id'))));
               $address= $this->Address->find('count',array('conditions'=>array('Address.customer_id'=>$this->Session->read('customer_id'))));
                if($contactperson>0)
                {
                $this->Contactpersoninfo->updateAll(array('Contactpersoninfo.status'=>1),array('Contactpersoninfo.customer_id'=>$this->Session->read('customer_id')));
                }
//                if($billingaddress>0)
//                {
//                $this->Billingaddress->updateAll(array('Billingaddress.status'=>1),array('Billingaddress.customer_id'=>$this->Session->read('customer_id')));
//                }
//                if($delivery>0)
//                {
//                $this->Deliveryaddress->updateAll(array('Deliveryaddress.status'=>1),array('Deliveryaddress.customer_id'=>$this->Session->read('customer_id')));
//                }
                if($address>0)
                {
                $this->Address->updateAll(array('Address.status'=>1),array('Address.customer_id'=>$this->Session->read('customer_id')));
                }
                
                if($project>0)
                {
                    $this->Projectinfo->updateAll(array('Projectinfo.project_status'=>1),array('Projectinfo.customer_id'=>$this->Session->read('customer_id')));
                }
                $this->Session->setFlash(__('Customer Added Successfully'));
                return $this->redirect(array('action'=>'index'));
                $this->Session->delete('customer_id');
            }
            $this->Session->setFlash(__('Customer Could Not be Added'));
           
        }
       
    }
    public function edit($id = NULL)
    {
        if($this->Session->read('customer_id')=='')
        {
            $this->Session->write('customer_id',$id);
        }
          $this->set('customer_id',$this->Session->read('customer_id'));
        
        
         $this->loadModel('Salesperson');
        $data = $this->Salesperson->find('list', array('fields' => 'salesperson'));
        $this->set('salesperson',$data);
        
        $this->loadModel('Referedby');
        $data1 = $this->Referedby->find('list', array('fields' => 'referedby'));
        $this->set('referedby',$data1);
        
        $this->loadModel('Address');
        $data10 = $this->Address->find('all',array('conditions'=>array('customer_id'=>$this->Session->read('customer_id'),'status'=>1,'type'=>'registered')));
        $data10_count = $this->Address->find('count',array('conditions'=>array('customer_id'=>$this->Session->read('customer_id'),'status'=>1,'type'=>'registered')));
        //pr($data10);pr($data10_count);exit;
        $this->set('data10',$data10);
        $this->set('data10_count',$data10_count);
        
       
        $data11 = $this->Address->find('all',array('conditions'=>array('customer_id'=>$this->Session->read('customer_id'),'status'=>1,'type'=>'billing')));
        $data11_count = $this->Address->find('count',array('conditions'=>array('customer_id'=>$this->Session->read('customer_id'),'status'=>1,'type'=>'billing')));
        //pr($data10);pr($data10_count);exit;
        $this->set('data11',$data11);
        $this->set('data11_count',$data11_count);
        
        $data12 = $this->Address->find('all',array('conditions'=>array('customer_id'=>$this->Session->read('customer_id'),'status'=>1,'type'=>'delivery')));
        $data12_count = $this->Address->find('count',array('conditions'=>array('customer_id'=>$this->Session->read('customer_id'),'status'=>1,'type'=>'delivery')));
        //pr($data10);pr($data10_count);exit;
        $this->set('data12',$data12);
        $this->set('data12_count',$data12_count);
        
        $data13 = $this->Projectinfo->find('all',array('conditions'=>array('customer_id'=>$this->Session->read('customer_id'),'project_status'=>1)));
        $data13_count = $this->Projectinfo->find('count',array('conditions'=>array('customer_id'=>$this->Session->read('customer_id'),'project_status'=>1)));
        //pr($data10);pr($data10_count);exit;
        $this->set('data13',$data13);
        $this->set('data13_count',$data13_count);
        
        
        $this->loadModel('Industry');
        $data2 = $this->Industry->find('list', array('fields' => 'industryname'));
        $this->set('industry',$data2);
        
        $this->loadModel('Location');
        $data3 = $this->Location->find('list', array('fields' => 'locationname'));
        $this->set('location',$data3);
        
        $this->loadModel('Paymentterm');
        $data4 = $this->Paymentterm->find('list', array('fields' => 'paymentterm'));
         //pr($data4);exit;
        $data5 = $this->Paymentterm->find('list', array('fields' => 'paymenttype'));
          
        
        
        $array3 = '';
        $i = 0 ; 
        $array3 = array();
        //pr($data4);pr($data5);exit;
        count($data4);
        for($i=1;$i<=count($data4);$i++)
        {
            $array3[] = $data4[$i].' '.$data5[$i];

        }
        $this->set('paymentterm',$array3);
        
         $this->loadModel('Priority');
         $data6 = $this->Priority->find('list', array('fields' => 'priority'));
        $this->set('priority',$data6);
		
		 $this->loadModel('Userrole');
         $data = $this->Userrole->find('list', array('fields' => 'user_role'));
        $this->set('userrole',$data);
        
        // Model For the Tab Edit Contact Info
        
        $this->loadModel('Contactpersoninfo');
        $data = $this->Contactpersoninfo->find('all',array('conditions'=>array('Contactpersoninfo.status'=>1,'Contactpersoninfo.customer_id'=>$id),'order' => array('Contactpersoninfo.id' => 'DESC')));
        //pr($data);exit;
        $this->set('contactpersoninfo', $data);
        
//          $this->loadModel('Projectinfo');
//        $data = $this->Projectinfo->find('all',array('conditions'=>array('Projectinfo.project_status'=>1,'Projectinfo.customer_id'=>$id),'order' => array('Projectinfo.id' => 'DESC')));
//        //pr($data);exit;
//        $this->set('projectinfo', $data);
//        
//        //Billingaddress
//        //
//        $this->loadModel('Billingaddress');
//        $data = $this->Billingaddress->find('all',array('conditions'=>array('Billingaddress.status'=>1,'Billingaddress.customer_id'=>$id),'order' => array('Billingaddress.id' => 'DESC')));
//        //pr($data);exit;
//        $this->set('billingaddress', $data);
//        
//         $this->loadModel('Deliveryaddress');
//        $data = $this->Deliveryaddress->find('all',array('conditions'=>array('Deliveryaddress.status'=>1,'Deliveryaddress.customer_id'=>$id),'order' => array('Deliveryaddress.id' => 'DESC')));
//        //pr($data);exit;
//        $this->set('Deliveryaddress', $data);
        //------------------------------------
        
        if(empty($id))
        {
             $this->Session->setFlash(__('Invalid Customer Entry'));
             return $this->redirect(array('action'=>'edit'));
        }
        $customer_details =  $this->Customer->findById($id); 
       
        if(empty($customer_details))
        {
           $this->Session->setFlash(__('Invalid Customer'));
             return $this->redirect(array('action'=>'edit'));
        }
        if($this->request->is(array('post','put')))
        {
            $this->Customer->id = $id;
             $match2 = $this->request->data['salesperson_id'];
              $dept = implode(',',$match2);
              $this->request->data['salesperson_id'] = $dept;
              
              $match3 = $this->request->data['referedbies_id'];
              if($match3!='')
              {
              $dept1 = implode(',',$match3);
              $this->request->data['referedbies_id'] = $dept1;
              }
              pr($this->request->data);
            if($this->Customer->save($this->request->data))
            {
                
               $project= $this->Projectinfo->find('count',array('conditions'=>array('Projectinfo.customer_id'=>$this->Session->read('customer_id'))));
               $contactperson= $this->Contactpersoninfo->find('count',array('conditions'=>array('Contactpersoninfo.customer_id'=>$this->Session->read('customer_id'))));
//               $billingaddress= $this->Billingaddress->find('count',array('conditions'=>array('Billingaddress.customer_id'=>$this->Session->read('customer_id'))));
//               $delivery=$this->Deliveryaddress->find('count',array('conditions'=>array('Deliveryaddress.customer_id'=>$this->Session->read('customer_id'))));
               $address= $this->Address->find('count',array('conditions'=>array('Address.customer_id'=>$this->Session->read('customer_id'))));
                if($contactperson>0)
                {
                $this->Contactpersoninfo->updateAll(array('Contactpersoninfo.status'=>1),array('Contactpersoninfo.customer_id'=>$this->Session->read('customer_id')));
                }
//                if($billingaddress>0)
//                {
//                $this->Billingaddress->updateAll(array('Billingaddress.status'=>1),array('Billingaddress.customer_id'=>$this->Session->read('customer_id')));
//                }
//                if($delivery>0)
//                {
//                $this->Deliveryaddress->updateAll(array('Deliveryaddress.status'=>1),array('Deliveryaddress.customer_id'=>$this->Session->read('customer_id')));
//                }
                if($address>0)
                {
                $this->Address->updateAll(array('Address.status'=>1),array('Address.customer_id'=>$this->Session->read('customer_id')));
                }
                
                if($project>0)
                {
                    $this->Projectinfo->updateAll(array('Projectinfo.project_status'=>1),array('Projectinfo.customer_id'=>$this->Session->read('customer_id')));
                }
               $this->Session->setFlash(__('Customer is Updated'));
               return $this->redirect(array('action'=>'index'));
               $this->Session->delete('customer_id');
            }
            $this->Session->setFlash(__('Customer Cant be Updated'));
        }
        else
        {
            $this->request->data =  $customer_details;
        }
    }
    public function delete($id)
    {
        $this->autoRender=false;
        if($id=='')
        {
            throw new MethodNotAllowedException();
        }
        if($this->Customer->delete($id))
        {
            $this->Session->setFlash(__('Customer Cant be Updated'));
            return $this->redirect(array('action'=>'index'));
        }
    }
    public function project_add()
    {
        $this->autoRender=false;
        $serial_id= $this->request->data['serial_id'];
        $project_name=$this->request->data['project_name'];
        
        $status=0;
        $this->loadModel('Projectinfo');
        $this->request->data['Projectinfo']['project_id']=$serial_id;
        $this->request->data['Projectinfo']['customer_id']=$this->Session->read('customer_id');;
        $this->request->data['Projectinfo']['project_name']=$project_name;
        $this->request->data['Projectinfo']['project_status']=$status;
        if($this->Projectinfo->save($this->request->data))
        {
            echo "success";
        }
    }
     public function project_edit_add()
    {
        $this->autoRender=false;
        $serial_id= $this->request->data['serial_id'];
        $project_name=$this->request->data['project_name'];
        
        $status=1;
        $this->loadModel('Projectinfo');
        $this->request->data['Projectinfo']['project_id']=$serial_id;
        $this->request->data['Projectinfo']['customer_id']=$this->Session->read('customer_id');;
        $this->request->data['Projectinfo']['project_name']=$project_name;
        $this->request->data['Projectinfo']['project_status']=$status;
        $this->Projectinfo->save($this->request->data);
        $pro_id = $this->Projectinfo->getLastInsertID();
        return $pro_id+1;
    }
    public function project_edit_update()
    {
        $this->autoRender=false;
        $pro_id= $this->request->data['id'];
        $this->loadModel('Projectinfo');
        $projectinfo =  $this->Projectinfo->findById($pro_id);
        echo $str = implode(',',$projectinfo['Projectinfo']);
    }
    public function project_edit_rule()
    {
        $this->autoRender=false;
        $pro_id= $this->request->data['id'];
        $pro_name= $this->request->data['pro_name'];
        $this->loadModel('Projectinfo');
        
        $data = $this->Projectinfo->updateAll(array('Projectinfo.project_name'=>'"'.$pro_name.'"'),array('Projectinfo.id'=>$pro_id));
        pr($data);
        //echo 'success';
    }
    public function project_delete()
    {
        $this->autoRender=false;
        $delete_id= $this->request->data['delete_id'];
        
        $this->loadModel('Projectinfo');
        if($this->Projectinfo->deleteAll(array('Projectinfo.project_id'=>$delete_id)))
        {
            echo "deleted";
        }
    }
    public function delivery_add()
    {
        
        $this->autoRender=false;
        $delivery_id= $this->request->data['delivery_id'];
        $delivery_address=$this->request->data['delivery_address'];
        $status=0;
        $this->loadModel('Deliveryaddress');
        
        $this->request->data['Deliveryaddress']['delivery_id']=$delivery_id;
        $this->request->data['Deliveryaddress']['customer_id']=$this->Session->read('customer_id');;
        $this->request->data['Deliveryaddress']['delivery_address']=$delivery_address;
        $this->request->data['Deliveryaddress']['project_status']=$status;
        if($this->Deliveryaddress->save($this->request->data))
        {
            echo "success";
        }
    }
    public function delivery_delete()
    {
        $this->autoRender=false;
        $delete_id= $this->request->data['delete_id'];
        
        $this->loadModel('Deliveryaddress');
        if($this->Deliveryaddress->deleteAll(array('Deliveryaddress.delivery_id'=>$delete_id)))
        {
            echo "deleted";
        }
    }
    public function billing_add()
    {
        $this->autoRender=false;
        $billing_id= $this->request->data['billing_id'];
        $billing_address=$this->request->data['billing_address'];
        $status=0;
        $this->loadModel('Billingaddress');
        $this->request->data['Billingaddress']['billing_id']=$billing_id;
        $this->request->data['Billingaddress']['customer_id']=$this->Session->read('customer_id');;
        $this->request->data['Billingaddress']['billing_address']=$billing_address;
        $this->request->data['Billingaddress']['status']=$status;
        if($this->Billingaddress->save($this->request->data))
        {
            echo "success";
        }
    }
    public function billing_delete()
    {
        $this->autoRender=false;
        $delete_id= $this->request->data['delete_id'];
        
        $this->loadModel('Billingaddress');
        if($this->Billingaddress->deleteAll(array('Billingaddress.billing_id'=>$delete_id)))
        {
            echo "deleted";
        }
    }
    public function contact_person_add()
    {
        $this->autoRender=false;
        //echo $this->Session->read('customer_id');
        $this->loadModel('Contactpersoninfo');
        $this->request->data['Contactpersoninfo']['email']=$this->request->data['contact_email'];
        $this->request->data['Contactpersoninfo']['remarks']=$this->request->data['contact_remark'];
        $this->request->data['Contactpersoninfo']['name']=$this->request->data['contact_name'];
        $this->request->data['Contactpersoninfo']['department']=$this->request->data['contact_department'];
        $this->request->data['Contactpersoninfo']['phone']=$this->request->data['contact_phone'];
        $this->request->data['Contactpersoninfo']['position']=$this->request->data['contact_position'];
        $this->request->data['Contactpersoninfo']['mobile']=$this->request->data['contact_mobile'];
        $this->request->data['Contactpersoninfo']['purpose']=$this->request->data['contact_purpose'];
        $this->request->data['Contactpersoninfo']['customer_id']=$this->Session->read('customer_id');
        $this->request->data['Contactpersoninfo']['status']=0;
        if($this->Contactpersoninfo->save($this->request->data))
        {
            echo "success";
        }
    }
    public function contact_person_edit()
    {
        $this->autoRender=false;
        //echo $this->Session->read('customer_id');
        $this->loadModel('Contactpersoninfo');
        $this->request->data['Contactpersoninfo']['email']=$this->request->data['contact_email'];
        $this->request->data['Contactpersoninfo']['remarks']=$this->request->data['contact_remark'];
        $this->request->data['Contactpersoninfo']['name']=$this->request->data['contact_name'];
        $this->request->data['Contactpersoninfo']['department']=$this->request->data['contact_department'];
        $this->request->data['Contactpersoninfo']['phone']=$this->request->data['contact_phone'];
        $this->request->data['Contactpersoninfo']['position']=$this->request->data['contact_position'];
        $this->request->data['Contactpersoninfo']['mobile']=$this->request->data['contact_mobile'];
        $this->request->data['Contactpersoninfo']['purpose']=$this->request->data['contact_purpose'];
        $this->request->data['Contactpersoninfo']['customer_id']=$this->Session->read('customer_id');
        $this->request->data['Contactpersoninfo']['status']=1;
        if($this->Contactpersoninfo->save($this->request->data))
        {
            
            echo $this->Contactpersoninfo->id;
        }
    }
    public function contact_delete()
    {
        $this->autoRender=false;
        $delete_id= $this->request->data['delete_id'];
        
        $this->loadModel('Contactpersoninfo');
        if($this->Projectinfo->deleteAll(array('Contactpersoninfo.serial_id'=>$delete_id)))
        {
            echo "deleted";
        }
    }
    
     public function contact_edit_update()
    {
        $this->autoRender=false;
        $con_id= $this->request->data['id'];
        $this->loadModel('Contactpersoninfo');
        $contactpersoninfo =  $this->Contactpersoninfo->findById($con_id);
        echo $str = implode(',',$contactpersoninfo['Contactpersoninfo']);
    }
    
    public function contact_edit_add()
    {
        $this->autoRender=false;
        //$serial_id= $this->request->data['serial_id'];
        $project_name=$this->request->data['project_name'];
        
        $status=1;
        $this->loadModel('Projectinfo');
        $this->request->data['Projectinfo']['project_id']=$serial_id;
        $this->request->data['Projectinfo']['customer_id']=$this->Session->read('customer_id');;
        $this->request->data['Projectinfo']['project_name']=$project_name;
        $this->request->data['Projectinfo']['project_status']=$status;
        $this->Projectinfo->save($this->request->data);
        $pro_id = $this->Projectinfo->getLastInsertID();
        return $pro_id+1;
    }
//    public function project_edit_update()
//    {
//        $this->autoRender=false;
//        $pro_id= $this->request->data['id'];
//        $this->loadModel('Projectinfo');
//        $projectinfo =  $this->Projectinfo->findById($pro_id);
//        echo $str = implode(',',$projectinfo['Projectinfo']);
//    }
    public function contact_edit_rule()
    {
        $this->autoRender=false;
        
        $con_id= $this->request->data['id'];
        $contact_name= $this->request->data['contact_name'];
        $contact_email= $this->request->data['contact_email'];
        $contact_department= $this->request->data['contact_department'];
        $contact_phone= $this->request->data['contact_phone'];
        $contact_position= $this->request->data['contact_position'];
        $contact_mobile= $this->request->data['contact_mobile'];
        $contact_purpose= $this->request->data['contact_purpose'];
        $contact_remark= $this->request->data['contact_remark'];
        
        $this->loadModel('Contactpersoninfo');
        
        $data = $this->Contactpersoninfo->updateAll(array('Contactpersoninfo.name'=>'"'.$contact_name.'"','Contactpersoninfo.email'=>'"'.$contact_email.'"','Contactpersoninfo.department'=>'"'.$contact_department.'"','Contactpersoninfo.phone'=>'"'.$contact_phone.'"','Contactpersoninfo.position'=>'"'.$contact_position.'"','Contactpersoninfo.mobile'=>'"'.$contact_mobile.'"','Contactpersoninfo.purpose'=>'"'.$contact_purpose.'"','Contactpersoninfo.remarks'=>'"'.$contact_remark.'"'),array('Contactpersoninfo.id'=>$con_id));
        pr($data);
        //echo 'success';
    }
//    public function project_delete()
//    {
//        $this->autoRender=false;
//        $delete_id= $this->request->data['delete_id'];
//        
//        $this->loadModel('Projectinfo');
//        if($this->Projectinfo->deleteAll(array('Projectinfo.project_id'=>$delete_id)))
//        {
//            echo "deleted";
//        }
//    }
}