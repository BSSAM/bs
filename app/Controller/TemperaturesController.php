<?php
    
    class TemperaturesController extends AppController
    {
        public $helpers = array('Html','Form','Session','xls','Number');
        public $uses =array('Priority','Paymentterm','Quotation','Currency','Document',
                            'Country','Additionalcharge','Service','CustomerInstrument','Customerspecialneed',
                            'Instrument','Brand','Customer','Device','Unit','Logactivity','InstrumentType',
                            'Contactpersoninfo','CusSalesperson','Clientpo','branch','Datalog','Title','Random','InsPercent','Tempinstrument','Tempambient','Tempother','Temprange','Temprelativehumidity','Tempreadingtype','Tempchannel','Tempinstrumentvalid','Tempunit','Tempunitconvert',
							    'Tempformdata');
        public function uncertainty()
        {
            
            
        }
        public function adduncertainty()
        {
            
            
        }
        public function edituncertainty()
        {
            
            
        }
        ///////////////////////////////////////
        ///////////////////////////////////////
        public function template($file=null,$id=null)
        {
            //pr($file);exit;
            //pr('Instrument/'.$file.'/'.$id);exit;
            if($file!='' && $id!='')
            {
                if($file == 'edittemplate'):
                $this->editinstrument($file, $id);
                elseif($file == 'deletetemplate'):
                $this->deletetemplate($file, $id);
                else:
                $this->addtemplate($file); 
                endif;
            }
            elseif($file!='' && $id=='')
            {
                if($file == 'addtemplate'):
                $this->addtemplate($file);
                endif;
                //$this->render('Instrument/'.$file);
            }
            else
            {
                $this->template_list();
                //$this->render('Instrument/index'.$file);
            }
        }
        public function template_list()
        {
            $template_data = $this->Temptemplate->find('all',array('conditions'=>array('Temptemplate.is_deleted'=>0)),array('order'=>'Temptemplate.id Desc','recursive'=>'2'));
            $this->set('template', $template_data);
            $this->render('template/index');
        }
        public function addtemplate($file)
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
            $this->render('template/'.$file);
        }
        ////////////////////////////////////
        ////////////////////////////////////
        ////////////////////////////////////
        
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
        ////////////////Other/////////////
        ////////////////////////////////////
        
        public function other($file=null,$id=null)
        {
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
        
            $other_data = $this->Tempother->find('all',array('conditions'=>array('Tempother.is_deleted'=>0)),array('order'=>'Tempother.id Desc','recursive'=>'2'));
            $this->set('other', $other_data);
            $this->render('Other/index');
        }
        public function addother($file)
        {    //exit;
            if($this->request->is('post'))
            {
                $instrumentname = $this->request->data['othername'];
                $description = $this->request->data['description'];
                $other_data = $this->Tempother->find('first',array('conditions'=>array('Tempother.othername ='=>$this->request->data['othername']),'recursive'=>'2'));
                if(!$other_data){
                if($this->Tempother->save($this->request->data))
                {
                    $last_insert_id =   $this->Tempother->getLastInsertID();
                    $this->Session->setFlash(__('Other is Added Successfully'));
                }
                    
                }
                else{
                    $this->Session->setFlash(__('Other Name Already Exists!'));
                }
            
            $this->redirect(array('controller'=>'Temperatures','action'=>'other'));
            }
            $this->render('Other/'.$file);
        }
        public function editother($file, $id = null)
        {
            $other_data = $this->Tempother->find('first',array('conditions'=>array('Tempother.id'=>$id),'recursive'=>'2'));
            if($this->request->is(array('post','put')))
            {
                $othername = $this->request->data['othername'];
                $description = $this->request->data['description'];
                $this->Tempother->id   =  $id; 
                if($this->Tempother->save($this->request->data))
                {  
                    $this->Session->setFlash(__('Other is Updated Successfully'));
                }
                $this->redirect(array('controller'=>'Temperatures','action'=>'other'));
            }
            else
            {
                $this->request->data = $other_data;
            }
            $this->render('Other/'.$file);
        }
        public function deleteother($file, $id = null)
        {
        
            if($this->Tempother->updateAll(array('Tempother.is_deleted'=>1,'Tempother.status'=>0),array('Tempother.id'=>$id)))
            {
                 
                $this->Session->setFlash(__('The Other has been deleted',h($id)));
                return  $this->redirect(array('controller'=>'Temperatures','action'=>'other'));
            }
        }
		
		 ///////////////////////////////////
        ////////////////Range/////////////
        ////////////////////////////////////
        
        public function range($file=null,$id=null)
        {
            if($file!='' && $id!='')
            {
                if($file == 'editrange'):
                $this->editrange($file, $id);
                elseif($file == 'deleterange'):
                $this->deleterange($file, $id);
                else:
                $this->addrange($file); 
                endif;
            }
            elseif($file!='' && $id=='')
            {
                if($file == 'addrange'):
                $this->addrange($file);
                endif;
                //$this->render('Instrument/'.$file);
            }
            else
            {
                $this->range_list();
                //$this->render('Instrument/index'.$file);
            }
        }
        public function range_list()
        {
            $user_role = $this->userrole_permission();
            if($user_role['ins_instrument']['view'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
            }
            $this->set('userrole_cus',$user_role['ins_instrument']);
        
            $range_data = $this->Temprange->find('all',array('conditions'=>array('Temprange.is_deleted'=>0)),array('order'=>'Temprange.id Desc','recursive'=>'2'));
            $this->set('range', $range_data);
            $this->render('Range/index');
        }
        public function addrange($file)
        {   
		    $unit_list = $this->Unit->find('list', array('conditions' => array('Unit.status' => 1),'fields' => array('Unit.id','Unit_name')));
			$this->set('unit_list',$unit_list);
			 
            if($this->request->is('post'))
            {
                $fromrange = $this->request->data['fromrange'];
				$torange = $this->request->data['torange'];
				$temp_unit_id = $this->request->data['temp_unit_id'];
				$this->request->data['rangename'] =  "(".$fromrange.' ~ '.$torange.")/".$this->unit_symbol($temp_unit_id);
                $description = $this->request->data['description'];
                $range_data = $this->Temprange->find('first',array('conditions'=>array('Temprange.fromrange'=>$this->request->data['fromrange'],'Temprange.torange'=>$this->request->data['torange'],'Temprange.temp_unit_id'=>$this->request->data['temp_unit_id']),'recursive'=>'2'));
                if(!$range_data){
                if($this->Temprange->save($this->request->data))
                {
                    $last_insert_id =   $this->Temprange->getLastInsertID();
                    $this->Session->setFlash(__('range is Added Successfully'));
                }
                    
                }
                else{
                    $this->Session->setFlash(__('Range Name Already Exists!'));
                }
            
            $this->redirect(array('controller'=>'Temperatures','action'=>'range'));
            }
            $this->render('Range/'.$file);
        }
        public function editrange($file, $id = null)
        {
			$unit_list = $this->Unit->find('list', array('conditions' => array('Unit.status' => 1),'fields' => array('Unit.id','Unit_name')));
			$this->set('unit_list',$unit_list);
			
            $range_data = $this->Temprange->find('first',array('conditions'=>array('Temprange.id'=>$id),'recursive'=>'2'));
			//pr($range_data);exit;
            if($this->request->is(array('post','put')))
            {
                $fromrange = $this->request->data['fromrange'];
				$torange = $this->request->data['torange'];
				$temp_unit_id = $this->request->data['temp_unit_id'];
				$this->request->data['rangename'] =  "(".$fromrange.' ~ '.$torange.")/".$this->unit_symbol($temp_unit_id);
                $description = $this->request->data['description'];
				
                $this->Temprange->id   =  $id; 
                if($this->Temprange->save($this->request->data))
                {  
                    $this->Session->setFlash(__('Range is Updated Successfully'));
                }
                $this->redirect(array('controller'=>'Temperatures','action'=>'range'));
            }
            else
            {
                $this->request->data = $range_data;
				$this->set('range_data',$range_data);
            }
            $this->render('Range/'.$file);
        }
        public function deleterange($file, $id = null)
        {
        
            if($this->Temprange->updateAll(array('Temprange.is_deleted'=>1,'Temprange.status'=>0),array('Temprange.id'=>$id)))
            {
                 
                $this->Session->setFlash(__('The Range has been deleted',h($id)));
                return  $this->redirect(array('controller'=>'Temperatures','action'=>'range'));
            }
        }
		
		///////////////////////////////////
        ////////////////relativehumidity/////////////
        ////////////////////////////////////
        
        public function relativehumidity($file=null,$id=null)
        {
            if($file!='' && $id!='')
            {
                if($file == 'editrelativehumidity'):
                $this->editrelativehumidity($file, $id);
                elseif($file == 'deleterelativehumidity'):
                $this->deleterelativehumidity($file, $id);
                else:
                $this->addrelativehumidity($file); 
                endif;
            }
            elseif($file!='' && $id=='')
            {
                if($file == 'addrelativehumidity'):
                $this->addrelativehumidity($file);
                endif;
                //$this->render('Instrument/'.$file);
            }
            else
            {
                $this->relativehumidity_list();
                //$this->render('Instrument/index'.$file);
            }
        }
        public function relativehumidity_list()
        {
            $user_role = $this->userrole_permission();
            if($user_role['ins_instrument']['view'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
            }
            $this->set('userrole_cus',$user_role['ins_instrument']);
        
            $relativehumidity_data = $this->Temprelativehumidity->find('all',array('conditions'=>array('Temprelativehumidity.is_deleted'=>0)),array('order'=>'Temprelativehumidity.id Desc','recursive'=>'2'));
            $this->set('relativehumidity', $relativehumidity_data);
            $this->render('Relativehumidity/index');
        }
        public function addrelativehumidity($file)
        {    //exit;
            if($this->request->is('post'))
            {
                $relativehumidity = $this->request->data['relativehumidity'];
                $description = $this->request->data['description'];
                $relativehumidity_data = $this->Temprelativehumidity->find('first',array('conditions'=>array('Temprelativehumidity.relativehumidity ='=>$this->request->data['relativehumidity']),'recursive'=>'2'));
                if(!$relativehumidity_data){
                if($this->Temprelativehumidity->save($this->request->data))
                {
                    $last_insert_id =   $this->Temprelativehumidity->getLastInsertID();
                    $this->Session->setFlash(__('Relativehumidity is Added Successfully'));
                }
                    
                }
                else{
                    $this->Session->setFlash(__('Relativehumidity Name Already Exists!'));
                }
            
            $this->redirect(array('controller'=>'Temperatures','action'=>'relativehumidity'));
            }
            $this->render('Relativehumidity/'.$file);
        }
        public function editrelativehumidity($file, $id = null)
        {
            $relativehumidity_data = $this->Temprelativehumidity->find('first',array('conditions'=>array('Temprelativehumidity.id'=>$id),'recursive'=>'2'));
            if($this->request->is(array('post','put')))
            { //pr($this->request->data);
                $relativehumidity = $this->request->data['Temprelativehumidity']['relativehumidity'];
                $description = $this->request->data['Temprelativehumidity']['description'];
                $this->Temprelativehumidity->id   =  $id; 
                if($this->Temprelativehumidity->save($this->request->data))
                {  
                    $this->Session->setFlash(__('Relativehumidity is Updated Successfully'));
                }
                $this->redirect(array('controller'=>'Temperatures','action'=>'relativehumidity'));
            }
            else
            {
                $this->request->data = $relativehumidity_data;
            }
            $this->render('Relativehumidity/'.$file);
        }
        public function deleterelativehumidity($file, $id = null)
        {
        
            if($this->Temprelativehumidity->updateAll(array('Temprelativehumidity.is_deleted'=>1,'Temprelativehumidity.status'=>0),array('Temprelativehumidity.id'=>$id)))
            {
                 
                $this->Session->setFlash(__('The Relativehumidity has been deleted',h($id)));
                return  $this->redirect(array('controller'=>'Temperatures','action'=>'relativehumidity'));
            }
        }
		
		///////////////////////////////////
        ////////////////readingtype/////////////
        ////////////////////////////////////
        
        public function readingtype($file=null,$id=null)
        {
            if($file!='' && $id!='')
            {
                if($file == 'editreadingtype'):
                $this->editreadingtype($file, $id);
                elseif($file == 'deletereadingtype'):
                $this->deletereadingtype($file, $id);
                else:
                $this->addreadingtype($file); 
                endif;
            }
            elseif($file!='' && $id=='')
            {
                if($file == 'addreadingtype'):
                $this->addreadingtype($file);
                endif;
                //$this->render('Instrument/'.$file);
            }
            else
            {
                $this->readingtype_list();
                //$this->render('Instrument/index'.$file);
            }
        }
        public function readingtype_list()
        {
            $user_role = $this->userrole_permission();
            if($user_role['ins_instrument']['view'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
            }
            $this->set('userrole_cus',$user_role['ins_instrument']);
        
            $readingtype_data = $this->Tempreadingtype->find('all',array('conditions'=>array('Tempreadingtype.is_deleted'=>0)),array('order'=>'Tempreadingtype.id Desc','recursive'=>'2'));
            $this->set('readingtype', $readingtype_data);
            $this->render('readingtype/index');
        }
        public function addreadingtype($file)
        {    //exit;
            if($this->request->is('post'))
            { //pr($this->request->data); exit;
                $readingtypename = $this->request->data['readingtypename'];
                $description = $this->request->data['description'];
                $readingtype_data = $this->Tempreadingtype->find('first',array('conditions'=>array('Tempreadingtype.readingtypename ='=>$this->request->data['readingtypename']),'recursive'=>'2'));
                if(!$readingtype_data){
                if($this->Tempreadingtype->save($this->request->data))
                {
                    $last_insert_id =   $this->Tempreadingtype->getLastInsertID();
                    $this->Session->setFlash(__('Readingtype is Added Successfully'));
                }
                    
                }
                else{
                    $this->Session->setFlash(__('Readingtype Name Already Exists!'));
                }
            
            $this->redirect(array('controller'=>'Temperatures','action'=>'readingtype'));
            }
            $this->render('readingtype/'.$file);
        }
        public function editreadingtype($file, $id = null)
        {
            $readingtype_data = $this->Tempreadingtype->find('first',array('conditions'=>array('Tempreadingtype.id'=>$id),'recursive'=>'2'));
            if($this->request->is(array('post','put')))
            { //pr($this->request->data);
                $readingtype = $this->request->data['Tempreadingtype']['readingtypename'];
                $description = $this->request->data['Tempreadingtype']['description'];
                $this->Tempreadingtype->id   =  $id; 
                if($this->Tempreadingtype->save($this->request->data))
                {  
                    $this->Session->setFlash(__('Readingtype is Updated Successfully'));
                }
                $this->redirect(array('controller'=>'Temperatures','action'=>'readingtype'));
            }
            else
            {
                $this->request->data = $readingtype_data;
            }
            $this->render('readingtype/'.$file);
        }
        public function deletereadingtype($file, $id = null)
        {
        
            if($this->Tempreadingtype->updateAll(array('Tempreadingtype.is_deleted'=>1,'Tempreadingtype.status'=>0),array('Tempreadingtype.id'=>$id)))
            {
                 
                $this->Session->setFlash(__('The Readingtype has been deleted',h($id)));
                return  $this->redirect(array('controller'=>'Temperatures','action'=>'readingtype'));
            }
        }
		
		///////////////////////////////////
        ////////////////channel/////////////
        ////////////////////////////////////
        
        public function channel($file=null,$id=null)
        {
            if($file!='' && $id!='')
            {
                if($file == 'editchannel'):
                $this->editchannel($file, $id);
                elseif($file == 'deletechannel'):
                $this->deletechannel($file, $id);
                else:
                $this->addchannel($file); 
                endif;
            }
            elseif($file!='' && $id=='')
            {
                if($file == 'addchannel'):
                $this->addchannel($file);
                endif;
                //$this->render('Instrument/'.$file);
            }
            else
            {
                $this->channel_list();
                //$this->render('Instrument/index'.$file);
            }
        }
        public function channel_list()
        {
            $user_role = $this->userrole_permission();
            if($user_role['ins_instrument']['view'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
            }
            $this->set('userrole_cus',$user_role['ins_instrument']);
        
            $channel_data = $this->Tempchannel->find('all',array('conditions'=>array('Tempchannel.is_deleted'=>0)),array('order'=>'Tempchannel.id Desc','recursive'=>'2'));
            $this->set('channel', $channel_data);
            $this->render('channel/index');
        }
        public function addchannel($file)
        {    //exit;
            if($this->request->is('post'))
            {
				
                $channel = $this->request->data['channelname'];
                $description = $this->request->data['description'];
                $channel_data = $this->Tempchannel->find('first',array('conditions'=>array('Tempchannel.channelname ='=>$this->request->data['channelname']),'recursive'=>'2'));
                if(!$channel_data){
                if($this->Tempchannel->save($this->request->data))
                {
                    $last_insert_id =   $this->Tempchannel->getLastInsertID();
                    $this->Session->setFlash(__('channel is Added Successfully'));
                }
                    
                }
                else{
                    $this->Session->setFlash(__('channel Name Already Exists!'));
                }
            
            $this->redirect(array('controller'=>'Temperatures','action'=>'channel'));
            }
            $this->render('channel/'.$file);
        }
        public function editchannel($file, $id = null)
        {
            $channel_data = $this->Tempchannel->find('first',array('conditions'=>array('Tempchannel.id'=>$id),'recursive'=>'2'));
            if($this->request->is(array('post','put')))
            { //pr($this->request->data);
                $channel = $this->request->data['Tempchannel']['channelname'];
                $description = $this->request->data['Tempchannel']['description'];
				
				
                $this->Tempchannel->id   =  $id; 
                if($this->Tempchannel->save($this->request->data))
                {  
                    $this->Session->setFlash(__('channel is Updated Successfully'));
                }
                $this->redirect(array('controller'=>'Temperatures','action'=>'channel'));
            }
            else
            {
                $this->request->data = $channel_data;
            }
            $this->render('channel/'.$file);
        }
        public function deletechannel($file, $id = null)
        {
        
            if($this->Tempchannel->updateAll(array('Tempchannel.is_deleted'=>1,'Tempchannel.status'=>0),array('Tempchannel.id'=>$id)))
            {
                 
                $this->Session->setFlash(__('The channel has been deleted',h($id)));
                return  $this->redirect(array('controller'=>'Temperatures','action'=>'channel'));
            }
        }
		
		///////////////////////////////////
        ////////////////Instrument validity/////////////
        ////////////////////////////////////
        
        public function instrumentvalidity($file=null,$id=null)
        {
            if($file!='' && $id!='')
            {
                if($file == 'editinstrumentvalidity'):
                $this->editinstrumentvalidity($file, $id);
                elseif($file == 'deleteinstrumentvalidity'):
                $this->deleteinstrumentvalidity($file, $id);
                else:
                $this->addinstrumentvalidity($file); 
                endif;
            }
            elseif($file!='' && $id=='')
            {
                if($file == 'addinstrumentvalidity'):
                $this->addinstrumentvalidity($file);
                endif;
                //$this->render('Instrument/'.$file);
            }
            else
            { //exit;
                $this->instrumentvalidity_list();
                //$this->render('Instrument/index'.$file);
            }
        }
        public function instrumentvalidity_list()
        {
            $user_role = $this->userrole_permission();
            if($user_role['ins_instrument']['view'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
            }
            $this->set('userrole_cus',$user_role['ins_instrument']);
        
            $instrumentvalidity_data = $this->Tempinstrumentvalid->find('all',array('conditions'=>array('Tempinstrumentvalid.is_deleted'=>0)),array('order'=>'Tempinstrumentvalid.id Desc','recursive'=>'2'));
            $this->set('instrumentvalidity', $instrumentvalidity_data);
			//pr($instrumentvalidity_data);exit;
            $this->render('instrumentvalidity/index');
        }
        public function addinstrumentvalidity($file)
        {    
		    $instruments_list = $this->Tempinstrument->find('list',array('fields' => array('id','instrumentname'),'conditions' => array('Tempinstrument.is_deleted'=>0,'Tempinstrument.status' => 1)));
			$this->set('instruments_list',$instruments_list);
			
            if($this->request->is('post'))
            {

                $instrumentvalidity_data = $this->Tempinstrumentvalid->find('first',array('conditions'=>array('Tempinstrumentvalid.temp_instruments_id'=>$this->request->data['Tempinstrumentvalid']['temp_instruments_id'],'Tempinstrumentvalid.duedate'=>$this->request->data['Tempinstrumentvalid']['duedate'],'Tempinstrumentvalid.validdays'=>$this->request->data['Tempinstrumentvalid']['validdays']),'recursive'=>'2'));
                if(!$instrumentvalidity_data){
                if($this->Tempinstrumentvalid->save($this->request->data))
                {
                    $last_insert_id =   $this->Tempinstrumentvalid->getLastInsertID();
                    $this->Session->setFlash(__('Instrumentvalidity is Added Successfully'));
                }
                    
                }
                else{
                    $this->Session->setFlash(__('Instrumentvalidity Name Already Exists!'));
                }
            
            $this->redirect(array('controller'=>'Temperatures','action'=>'instrumentvalidity'));
            }
            $this->render('instrumentvalidity/'.$file);
        }
        public function editinstrumentvalidity($file, $id = null)
        {
			$instruments_list = $this->Tempinstrument->find('list',array('fields' => array('id','instrumentname'),'conditions' => array('Tempinstrument.is_deleted'=>0,'Tempinstrument.status' => 1)));
			$this->set('instruments_list',$instruments_list);
			
            $instrumentvalidity_data = $this->Tempinstrumentvalid->find('first',array('conditions'=>array('Tempinstrumentvalid.id'=>$id),'recursive'=>'2'));
            if($this->request->is(array('post','put')))
            { 
                $this->Tempinstrumentvalid->id   =  $id; 
                if($this->Tempinstrumentvalid->save($this->request->data))
                {  
                    $this->Session->setFlash(__('Instrumentvalidity is Updated Successfully'));
                }
                $this->redirect(array('controller'=>'Temperatures','action'=>'instrumentvalidity'));
            }
            else
            {
                $this->request->data = $instrumentvalidity_data;
				$this->set('instrumentvalidity_data',$instrumentvalidity_data);
            }
            $this->render('instrumentvalidity/'.$file);
        }
        public function deleteinstrumentvalidity($file, $id = null)
        {
        
            if($this->Tempinstrumentvalid->updateAll(array('Tempinstrumentvalid.is_deleted'=>1,'Tempinstrumentvalid.status'=>0),array('Tempinstrumentvalid.id'=>$id)))
            {
                 
                $this->Session->setFlash(__('The Instrument validity has been deleted',h($id)));
                return  $this->redirect(array('controller'=>'Temperatures','action'=>'instrumentvalidity'));
            }
        }
		
		 ///////////////////////////////////
        ////////////////unit/////////////
        ////////////////////////////////////
        
        public function unit($file=null,$id=null)
        {
            if($file!='' && $id!='')
            {
                if($file == 'editunit'):
                $this->editunit($file, $id);
                elseif($file == 'deleteunit'):
                $this->deleteunit($file, $id);
                else:
                $this->addunit($file); 
                endif;
            }
            elseif($file!='' && $id=='')
            {
                if($file == 'addunit'):
                $this->addunit($file);
                endif;
                //$this->render('Instrument/'.$file);
            }
            else
            {
                $this->unit_list();
                //$this->render('Instrument/index'.$file);
            }
        }
        public function unit_list()
        {
            $user_role = $this->userrole_permission();
            if($user_role['ins_instrument']['view'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
            }
            $this->set('userrole_cus',$user_role['ins_instrument']);
        
            $unit_data = $this->Tempunit->find('all',array('conditions'=>array('Tempunit.is_deleted'=>0)),array('order'=>'Tempunit.id Desc','recursive'=>'2'));
            $this->set('unit', $unit_data);
            $this->render('unit/index');
        }
        public function addunit($file)
        {    //exit;
            if($this->request->is('post'))
            {
                $instrumentname = $this->request->data['unitname'];
                $description = $this->request->data['description'];
                $unit_data = $this->Tempunit->find('first',array('conditions'=>array('Tempunit.unitname ='=>$this->request->data['unitname']),'recursive'=>'2'));
                if(!$unit_data){
                if($this->Tempunit->save($this->request->data))
                {
                    $last_insert_id =   $this->Tempunit->getLastInsertID();
                    $this->Session->setFlash(__('unit is Added Successfully'));
                }
                    
                }
                else{
                    $this->Session->setFlash(__('unit Name Already Exists!'));
                }
            
            $this->redirect(array('controller'=>'Temperatures','action'=>'unit'));
            }
            $this->render('unit/'.$file);
        }
        public function editunit($file, $id = null)
        {
            $unit_data = $this->Tempunit->find('first',array('conditions'=>array('Tempunit.id'=>$id),'recursive'=>'2'));
            if($this->request->is(array('post','put')))
            {
                $unitname = $this->request->data['unitname'];
                $description = $this->request->data['description'];
                $this->Tempunit->id   =  $id; 
                if($this->Tempunit->save($this->request->data))
                {  
                    $this->Session->setFlash(__('unit is Updated Successfully'));
                }
                $this->redirect(array('controller'=>'Temperatures','action'=>'unit'));
            }
            else
            {
                $this->request->data = $unit_data;
            }
            $this->render('unit/'.$file);
        }
        public function deleteunit($file, $id = null)
        {
        
            if($this->Tempunit->updateAll(array('Tempunit.is_deleted'=>1,'Tempunit.status'=>0),array('Tempunit.id'=>$id)))
            {
                 
                $this->Session->setFlash(__('The unit has been deleted',h($id)));
                return  $this->redirect(array('controller'=>'Temperatures','action'=>'unit'));
            }
        }
		
		  ///////////////////////////////////
        ////////////////unitconvert/////////////
        ////////////////////////////////////
        
        public function unitconvert($file=null,$id=null)
        {
            if($file!='' && $id!='')
            {
                if($file == 'editunitconvert'):
                $this->editunitconvert($file, $id);
                elseif($file == 'deleteunitconvert'):
                $this->deleteunitconvert($file, $id);
                else:
                $this->addunitconvert($file); 
                endif;
            }
            elseif($file!='' && $id=='')
            {
                if($file == 'addunitconvert'):
                $this->addunitconvert($file);
                endif;
                //$this->render('Instrument/'.$file);
            }
            else
            {
                $this->unitconvert_list();
                //$this->render('Instrument/index'.$file);
            }
        }
        public function unitconvert_list()
        {
            $user_role = $this->userrole_permission();
            if($user_role['ins_instrument']['view'] == 0){ 
            return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
            }
            $this->set('userrole_cus',$user_role['ins_instrument']);
        
            $unitconvert_data = $this->Tempunitconvert->find('all',array('conditions'=>array('Tempunitconvert.is_deleted'=>0)),array('order'=>'Tempunitconvert.id Desc','recursive'=>'2'));
            $this->set('unitconvert', $unitconvert_data);
            $this->render('unitconvert/index');
        }
        public function addunitconvert($file)
        {    
		    $tempunit_list = $this->Tempunit->find('list',array('fields' => array('id','unitname'),'conditions' => array('Tempunit.is_deleted'=>0,'Tempunit.status' => 1)));
			$this->set('tempunit_list',$tempunit_list);
			
            if($this->request->is('post'))
            {

                $unitconvert_data = $this->Tempunitconvert->find('first',array('conditions'=>array('Tempunitconvert.fromunit'=>$this->request->data['Tempunitconvert']['fromunit'],'Tempunitconvert.tounit ='=>$this->request->data['Tempunitconvert']['tounit'],'Tempunitconvert.factor ='=>$this->request->data['Tempunitconvert']['factor']),'recursive'=>'2'));
                if(!$unitconvert_data){
                if($this->Tempunitconvert->save($this->request->data))
                {
                    $last_insert_id =   $this->Tempunitconvert->getLastInsertID();
                    $this->Session->setFlash(__('unitconvert is Added Successfully'));
                }
                    
                }
                else{
                    $this->Session->setFlash(__('unitconvert Name Already Exists!'));
                }
            
            $this->redirect(array('controller'=>'Temperatures','action'=>'unitconvert'));
            }
            $this->render('unitconvert/'.$file);
        }
        public function editunitconvert($file, $id = null)
        {
			$tempunit_list = $this->Tempunit->find('list',array('fields' => array('id','unitname'),'conditions' => array('Tempunit.is_deleted'=>0,'Tempunit.status' => 1)));
			$this->set('tempunit_list',$tempunit_list);
			
            $unitconvert_data = $this->Tempunitconvert->find('first',array('conditions'=>array('Tempunitconvert.id'=>$id),'recursive'=>'2'));
            if($this->request->is(array('post','put')))
            {
                $this->Tempunitconvert->id   =  $id; 
                if($this->Tempunitconvert->save($this->request->data))
                {  
                    $this->Session->setFlash(__('unitconvert is Updated Successfully'));
                }
                $this->redirect(array('controller'=>'Temperatures','action'=>'unitconvert'));
            }
            else
            {
                $this->request->data = $unitconvert_data;
				$this->set('unitconvert_data',$unitconvert_data);
            }
            $this->render('unitconvert/'.$file);
        }
        public function deleteunitconvert($file, $id = null)
        {
        
            if($this->Tempunitconvert->updateAll(array('Tempunitconvert.is_deleted'=>1,'Tempunitconvert.status'=>0),array('Tempunitconvert.id'=>$id)))
            {
                 
                $this->Session->setFlash(__('The unitconvert has been deleted',h($id)));
                return  $this->redirect(array('controller'=>'Temperatures','action'=>'unitconvert'));
            }
        }
        
		  ///////////////////////////////////
        ////////////////Form Data/////////////
        ////////////////////////////////////
        
        public function formdatas()
        {
			
            $tempform_data = $this->Tempformdata->find('first');
            if($this->request->is(array('post','put')))
            {
                $this->Tempformdata->id   =  1; 
                if($this->Tempformdata->save($this->request->data))
                {  
                    $this->Session->setFlash(__('Formdata Updated Successfully'));
                }
                $this->redirect(array('controller'=>'Temperatures','action'=>'formdatas'));
            }
            else
            {
                 
				$this->set('formdata',$tempform_data);
            }
           
        }
        
    
    }
    
?>