<?php
    
    class TemperaturesController extends AppController
    {
        public $helpers = array('Html','Form','Session','xls','Number');
        public $uses =array('Priority','Paymentterm','Quotation','Currency','Document',
                            'Country','Additionalcharge','Service','CustomerInstrument','Customerspecialneed',
                            'Instrument','Brand','Customer','Device','Unit','Logactivity','InstrumentType',
                            'Contactpersoninfo','CusSalesperson','Clientpo','branch','Datalog','Title','Random','InsPercent','Tempinstrument','Tempambient');
        public function uncertainty()
        {
            
            
        }
        public function adduncertainty()
        {
            
            
        }
        public function edituncertainty()
        {
            
            
        }
        
        
        public function instrument($file=null,$id=null)
        {
            //pr($file);exit;
            //pr('Instrument/'.$file.'/'.$id);exit;
            if($file!='' && $id!='')
            {
                if($file == 'editinstrument'):
                $this->editinstrument($file, $id);
                elseif($file == 'deleteinstrument'):
                $this->deleteinstrument($file, $id);
                else:
                $this->addinstrument($file); 
                endif;
            }
            elseif($file!='' && $id=='')
            {
                if($file == 'addinstrument'):
                $this->addinstrument($file);
                endif;
                //$this->render('Instrument/'.$file);
            }
            else
            {
                $this->instrument_list();
                //$this->render('Instrument/index'.$file);
            }
        }
        public function instrument_list()
        {
           
            
            $user_role = $this->userrole_permission();
            if($user_role['ins_instrument']['view'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
            }
            $this->set('userrole_cus',$user_role['ins_instrument']);
        
            $instrument_data = $this->Tempinstrument->find('all',array('conditions'=>array('Tempinstrument.is_deleted'=>0)),array('order'=>'Tempinstrument.id Desc','recursive'=>'2'));
            $this->set('instrument', $instrument_data);
            $this->render('Instrument/index');
        }
        public function addinstrument($file)
        {
            if($this->request->is('post'))
            {
                $instrumentname = $this->request->data['instrumentname'];
                $tagno = $this->request->data['tagno'];
                $description = $this->request->data['description'];
                $instrument_data = $this->Tempinstrument->find('first',array('conditions'=>array('Tempinstrument.instrumentname ='=>$this->request->data['instrumentname']),'recursive'=>'2'));
                if(!$instrument_data){
                if($this->Tempinstrument->save($this->request->data))
                {
                    $last_insert_id =   $this->Tempinstrument->getLastInsertID();
                    $this->Session->setFlash(__('Instrument is Added Successfully'));
                }
                    
                }
                else{
                    $this->Session->setFlash(__('Instrument Name Already Exists!'));
                }
            
            $this->redirect(array('controller'=>'Temperatures','action'=>'instrument'));
            }
            $this->render('Instrument/'.$file);
        }
        public function editinstrument($file, $id = null)
        {
            $instrument_data = $this->Tempinstrument->find('first',array('conditions'=>array('Tempinstrument.id'=>$id),'recursive'=>'2'));
            if($this->request->is(array('post','put')))
            {
                $instrumentname = $this->request->data['instrumentname'];
                $tagno = $this->request->data['tagno'];
                $description = $this->request->data['description'];
                $this->Tempinstrument->id   =  $id; 
                if($this->Tempinstrument->save($this->request->data))
                {
                    $this->Session->setFlash(__('Instrument is Updated Successfully'));
                }
                $this->redirect(array('controller'=>'Temperatures','action'=>'instrument'));
            }
            else
            {
                $this->request->data = $instrument_data;
            }
            $this->render('Instrument/'.$file);
        }
        public function deleteinstrument($file, $id = null)
        {
        
            if($this->Tempinstrument->updateAll(array('Tempinstrument.is_deleted'=>1,'Tempinstrument.status'=>0),array('Tempinstrument.id'=>$id)))
            {
                 
                $this->Session->setFlash(__('The Instrument has been deleted',h($id)));
                return  $this->redirect(array('controller'=>'Temperatures','action'=>'instrument'));
            }
        }
        
        
        ///////////////////////////////////
        //////////Ambient Temp/////////////
        ///////////////////////////////////
        
        public function ambient($file=null,$id=null)
        {
            //pr($file);exit;
            //pr('Instrument/'.$file.'/'.$id);exit;
            if($file!='' && $id!='')
            {
                if($file == 'editambient'):
                $this->editambient($file, $id);
                elseif($file == 'deleteambient'):
                $this->deleteambient($file, $id);
                else:
                $this->addambient($file); 
                endif;
            }
            elseif($file!='' && $id=='')
            {
                if($file == 'addambient'):
                $this->addambient($file);
                endif;
                //$this->render('Instrument/'.$file);
            }
            else
            {
                $this->ambient_list();
                //$this->render('Instrument/index'.$file);
            }
        }
        
        public function ambient_list()
        {
           
            
            $user_role = $this->userrole_permission();
            if($user_role['ins_instrument']['view'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
            }
            $this->set('userrole_cus',$user_role['ins_instrument']);
        
            $ambient_data = $this->Tempambient->find('all',array('conditions'=>array('Tempambient.is_deleted'=>0)),array('order'=>'Tempambient.id Desc','recursive'=>'2'));
            $this->set('ambient', $ambient_data);
            $this->render('Ambient/index');
        }
        public function addambient($file)
        {
            if($this->request->is('post'))
            {
                $ambientname = $this->request->data['ambientname'];
                $description = $this->request->data['description'];
                $default = $this->request->data['default'];
                $ambient_data = $this->Tempambient->find('first',array('conditions'=>array('Tempambient.ambientname ='=>$this->request->data['ambientname']),'recursive'=>'2'));
                if(!$ambient_data){
                if($this->Tempambient->save($this->request->data))
                {
                    $last_insert_id =   $this->Tempambient->getLastInsertID();
                    $this->Session->setFlash(__('Ambient Temperature is Added Successfully'));
                }
                    
                }
                else{
                    $this->Session->setFlash(__('Ambient Temperature Already Exists!'));
                }
            
            $this->redirect(array('controller'=>'Temperatures','action'=>'ambient'));
            }
            $this->render('Ambient/'.$file);
        }
        public function editambient($file, $id = null)
        {
            $ambient_data = $this->Tempambient->find('first',array('conditions'=>array('Tempambient.id'=>$id),'recursive'=>'2'));
            if($this->request->is(array('post','put')))
            {
                $ambientname = $this->request->data['ambientname'];
                $description = $this->request->data['description'];
                $default = $this->request->data['default'];
                $this->Tempambient->id   =  $id; 
                if($this->Tempambient->save($this->request->data))
                {
                    $this->Session->setFlash(__('Ambient Temperature is Updated Successfully'));
                }
                $this->redirect(array('controller'=>'Temperatures','action'=>'ambient'));
            }
            else
            {
                $this->request->data = $ambient_data;
            }
            $this->render('Ambient/'.$file);
        }
        public function deleteambient($file, $id = null)
        {
        
            if($this->Tempambient->updateAll(array('Tempambient.is_deleted'=>1,'Tempambient.status'=>0),array('Tempambient.id'=>$id)))
            {
                 
                $this->Session->setFlash(__('Ambient Temperature has been deleted',h($id)));
                return  $this->redirect(array('controller'=>'Temperatures','action'=>'ambient'));
            }
        }
        
        ///////////////////////////////////
        /////////////////////////////////////
        ////////////////////////////////////
        
        public function other($file=null,$id=null)
        {
            //pr($file);exit;
            //pr('Instrument/'.$file.'/'.$id);exit;
            if($file!='' && $id!='')
            {
                if($file == 'editother'):
                $this->editother($file, $id);
                elseif($file == 'deleteother'):
                $this->deleteother($file, $id);
                else:
                $this->addother($file); 
                endif;
            }
            elseif($file!='' && $id=='')
            {
                if($file == 'addother'):
                $this->addother($file);
                endif;
                //$this->render('Instrument/'.$file);
            }
            else
            {
                $this->other_list();
                //$this->render('Instrument/index'.$file);
            }
        }
        public function other_list()
        {
           
            
            $user_role = $this->userrole_permission();
            if($user_role['ins_instrument']['view'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
            }
            $this->set('userrole_cus',$user_role['ins_instrument']);
        
            $instrument_data = $this->Tempinstrument->find('all',array('conditions'=>array('Tempinstrument.is_deleted'=>0)),array('order'=>'Tempinstrument.id Desc','recursive'=>'2'));
            $this->set('instrument', $instrument_data);
            $this->render('Instrument/index');
        }
        public function addinstrument($file)
        {
            if($this->request->is('post'))
            {
                $instrumentname = $this->request->data['instrumentname'];
                $tagno = $this->request->data['tagno'];
                $description = $this->request->data['description'];
                $instrument_data = $this->Tempinstrument->find('first',array('conditions'=>array('Tempinstrument.instrumentname ='=>$this->request->data['instrumentname']),'recursive'=>'2'));
                if(!$instrument_data){
                if($this->Tempinstrument->save($this->request->data))
                {
                    $last_insert_id =   $this->Tempinstrument->getLastInsertID();
                    $this->Session->setFlash(__('Instrument is Added Successfully'));
                }
                    
                }
                else{
                    $this->Session->setFlash(__('Instrument Name Already Exists!'));
                }
            
            $this->redirect(array('controller'=>'Temperatures','action'=>'instrument'));
            }
            $this->render('Instrument/'.$file);
        }
        public function editinstrument($file, $id = null)
        {
            $instrument_data = $this->Tempinstrument->find('first',array('conditions'=>array('Tempinstrument.id'=>$id),'recursive'=>'2'));
            if($this->request->is(array('post','put')))
            {
                $instrumentname = $this->request->data['instrumentname'];
                $tagno = $this->request->data['tagno'];
                $description = $this->request->data['description'];
                $this->Tempinstrument->id   =  $id; 
                if($this->Tempinstrument->save($this->request->data))
                {
                    $this->Session->setFlash(__('Instrument is Updated Successfully'));
                }
                $this->redirect(array('controller'=>'Temperatures','action'=>'instrument'));
            }
            else
            {
                $this->request->data = $instrument_data;
            }
            $this->render('Instrument/'.$file);
        }
        public function deleteinstrument($file, $id = null)
        {
        
            if($this->Tempinstrument->updateAll(array('Tempinstrument.is_deleted'=>1,'Tempinstrument.status'=>0),array('Tempinstrument.id'=>$id)))
            {
                 
                $this->Session->setFlash(__('The Instrument has been deleted',h($id)));
                return  $this->redirect(array('controller'=>'Temperatures','action'=>'instrument'));
            }
        }
        
    
    }
    
?>