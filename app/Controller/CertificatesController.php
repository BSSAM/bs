<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class CertificatesController extends AppController
{   
     public $helpers = array('Html','Form','Session','xls','Number');
     public $uses =array('Priority','Paymentterm','Quotation','Currency','Document',
                            'Country','Additionalcharge','Service','CustomerInstrument','Customerspecialneed','Range',
                            'Instrument','Brand','Customer','Device','Unit','Logactivity','InstrumentType','Tempcertificatedata',
                            'Contactpersoninfo','CusSalesperson','Clientpo','branch','Datalog','Title','Random','InsPercent','Tempinstrument','Tempambient'
							 ,'Tempother','Temprange','Temprelativehumidity','Tempreadingtype','Tempchannel','Tempinstrumentvalid','Tempunit','Tempunitconvert',
							    'Tempformdata','Tempuncertainty','Tempuncertaintydata','InstrumentRange','Temptemplate','Tempcertificate','Temptemplatedata');
    public function index($id=NULL)
    {
        //pr($this->request->data);
        if($this->request->data)
        {
            
            //echo "if";
            //pr($_REQUEST);
            //pr($this->request->data);exit;
            
            $certificateno = $this->request->data['step1']['certificateno'];
            $readingtype_id = $this->request->data['step1']['readingtype_id'];
            $channel_id = $this->request->data['step1']['channel_id'];
            
            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            //
            //
            //
            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            //pr($this->request->data['step1']);
           
            function myfunction($num)
            {
                if(is_float($num)){
                    
                    return abs($num);
                }
                else{
                   return $num;
                }
            }
            $a = $b = array();
            $a= $this->request->data['step1'];
            //pr($a);
            $b = array_map("myfunction",$a);
            
            $this->request->data['step1'] = $b;
            
            //$temp1= $this->request->data['step1']['temp1'];
            
            
            $find_cert = $this->Tempcertificatedata->find('first',array('conditions'=>array('Tempcertificatedata.certificate_no'=>$certificateno,'Tempcertificatedata.temp_readingtype_id'=>$readingtype_id,'Tempcertificatedata.temp_channel_id'=>$channel_id)));
            //pr($find_cert);exit;
            if($find_cert)
            {
                if(isset($this->request->data['step1']['uncertainty1_val'])){
                $uncertainty1_val1 = $this->request->data['step1']['uncertainty1_val'];
                $uncertainty1_val = implode(',',$uncertainty1_val1);}
                if(isset($uncertainty1_val))
                {
                $this->request->data['step1']['uncertainty1_val'] = $uncertainty1_val;
                }
                
                if(isset($this->request->data['step1']['uncertainty2_val'])){
                $uncertainty2_val1 = $this->request->data['step1']['uncertainty2_val'];
                $uncertainty2_val = implode(',',$uncertainty2_val1);}
                if(isset($uncertainty2_val))
                {
                $this->request->data['step1']['uncertainty2_val'] = $uncertainty2_val;
                }
                
                if(isset($this->request->data['step1']['uncertainty3_val'])){
                $uncertainty3_val1 = $this->request->data['step1']['uncertainty3_val'];
                $uncertainty3_val = implode(',',$uncertainty3_val1);}
                if(isset($uncertainty3_val))
                {
                $this->request->data['step1']['uncertainty3_val'] = $uncertainty3_val;
                }
                
                if(isset($this->request->data['step1']['uncertainty4_val'])){
                $uncertainty4_val1 = $this->request->data['step1']['uncertainty4_val'];
                $uncertainty4_val = implode(',',$uncertainty4_val1);}
                if(isset($uncertainty4_val))
                {
                $this->request->data['step1']['uncertainty4_val'] = $uncertainty4_val;
                }
                
                //pr($this->request->data);exit;
                if(isset($this->request->data['step1']['uncertainty5_val'])){
                $uncertainty5_val1 = $this->request->data['step1']['uncertainty5_val'];
                $uncertainty5_val = implode(',',$uncertainty5_val1);}
                if(isset($uncertainty5_val))
                {
                $this->request->data['step1']['uncertainty5_val'] = $uncertainty5_val;
                }
                
                function stddev($array)
                {
                    //Don Knuth is the $deity of algorithms
                    //http://en.wikipedia.org/wiki/Algorithms_for_calculating_variance#III._On-line_algorithm
                    $n = 0;
                    $mean = 0;
                    $M2 = 0;
                    foreach($array as $x){
                        $n++;
                        $delta = $x - $mean;
                        $mean = $mean + $delta/$n;
                        $M2 = $M2 + $delta*($x - $mean);
                    }
                    $variance = $M2/($n - 1);
                    return sqrt($variance);
                }
                function stddev1($array)
                {
                    //Don Knuth is the $deity of algorithms
                    //http://en.wikipedia.org/wiki/Algorithms_for_calculating_variance#III._On-line_algorithm
                    $n = 0;
                    $mean = 0;
                    $M2 = 0;
                    foreach($array as $x){
                        $n++;
                        $delta = $x - $mean;
                        $mean = $mean + $delta/$n;
                        $M2 = $M2 + $delta*($x - $mean);
                    }
                    $variance = $M2/($n - 1);
                    return sqrt($variance);
                }
                function stddev2($array)
                {
                    //Don Knuth is the $deity of algorithms
                    //http://en.wikipedia.org/wiki/Algorithms_for_calculating_variance#III._On-line_algorithm
                    $n = 0;
                    $mean = 0;
                    $M2 = 0;
                    foreach($array as $x){
                        $n++;
                        $delta = $x - $mean;
                        $mean = $mean + $delta/$n;
                        $M2 = $M2 + $delta*($x - $mean);
                    }
                    $variance = $M2/($n - 1);
                    return sqrt($variance);
                }
                function t1($val, $min, $max) {
                                return ($val >= $min && $val <= $max);
                            }
                            
                            function powfn($para)
                            {
                                return $para*$para;
                            }
                            function powfn4($para)
                            {
                                return $para*$para*$para*$para;
                            }
                if(isset($this->request->data['step1']['no_runs']))
                {
                    //$aaaaaa = array();
                    // Twin FOR
                    for($j=1;$j<=15;$j++)
                    {
                        $arr1 = array();
                        //array_unique
                        $summed_val_m = 0;
                        $array_sd_m = array();
                        $sd_m = 0;
                        $mean_m = 0;
                        // Data Pack
                        //$uncert_data_pack = datapack($this->request->data['step1']['temp'.$j],$this->request->data['step1']['uncertainty'.$j.'_val']);
                        for($i=1;$i<=15;$i++)
                        {
                            if(isset($this->request->data['step1']['m'.$j.'_'.$i.'']))
                            {
                                $summed_val_m = $summed_val_m + $this->request->data['step1']['m'.$j.'_'.$i.''];
                                $array_sd_m[] = $this->request->data['step1']['m'.$j.'_'.$i.''];
                            }
                        }
                        //pr($array_sd_m); exit;
                        $this->request->data['step1']['m'.$j.'_12'] = $sd_m = stddev($array_sd_m);
                        $this->request->data['step1']['m'.$j.'_13'] = $sd_m/sqrt($this->request->data['step1']['no_runs']);
                        $this->request->data['step1']['m'.$j.'_11'] = $mean_m = $summed_val_m/$this->request->data['step1']['no_runs'];
                        
                        $uncer_va = array();
                        $arr1 = array();
                        static $aaaaaa = array();
                        if(isset($this->request->data['step1']['uncertainty'.$j.'_val']))
                        {
                        $uncer_va  = explode(',',$this->request->data['step1']['uncertainty'.$j.'_val']);
                        }
                        //pr($uncer_va);
                        foreach($uncer_va as $u)
                        {
                            $tempuncertaintydata1 = $this->Tempuncertaintydata->find('first', array('conditions' => array('Tempuncertaintydata.temp_uncertainty_id' => $u)));
                            $rangeid = $tempuncertaintydata1['Tempuncertaintydata']['range_id'];
                            $range_dat = $this->Temprange->find('first',array('conditions'=>array('Temprange.id'=>$rangeid),'recursive'=>'2'));
                            //pr($range_dat);
                            $temp_val = $this->request->data['step1']['temp'.$j];
                            //pr($temp_val);
                            if($range_dat){
                            if($range_dat['Temprange']['fromrange']!='' || $range_dat['Temprange']['torange']!=''){
                            $yesorno = t1($temp_val, $range_dat['Temprange']['fromrange'], $range_dat['Temprange']['torange']);}
                            else{
                                $yesorno = false;
                            }
                            

                            if($yesorno == true){
                               $aaaaaa[] = $arr1[]  = $tempuncertaintydata1['Tempuncertaintydata']['id'];
                            }
                            }
                        }
                        //pr($arr1);
                        
//                        if($this->request->data['step1']['temp'.$j]!= NULL)
//                        {
//                            //$arra2 = 
//                            $aaaaaa = implode(',',array($aaaaaa);
//                            
//                        }
                        
                       // pr($arr1);
//                        if($j == 15)
//                        {
                        //$comparable_uncert = array('22','23','22');
//                        if(count($arr1)!=1)
//                        {
//                            $comparable_uncert = array_unique($arr1);
//                        }
//                        else
//                        {
                            $comparable_uncert = $arr1;
                        //}
                                pr($comparable_uncert);exit;
                        //$uncertainty[] = array();
						//pr($comparable_uncert);exit;
                        //$count_al = $this->request->data['step1']['count'.$j];
//                        
                        foreach($comparable_uncert as $comcert)
                        {
                            //pr($comcert);
                            $step1infor = $this->Tempuncertaintydata->find('first', array('conditions' => array('Tempuncertaintydata.id' => $comcert)));
                           // pr($step1infor);
                            $uref1 = $step1infor['Tempuncertaintydata']['uref1_data1'];
                            $uref2 = $step1infor['Tempuncertaintydata']['uref2_data1'];
                            $uref3 = $step1infor['Tempuncertaintydata']['uref3_data1'];
                            $urefdivisor = $step1infor['Tempuncertaintydata']['urefdivisor'];
                            $uacc1 = $step1infor['Tempuncertaintydata']['uacc1_data1'];
                            $uacc2 = $step1infor['Tempuncertaintydata']['uacc2_data1'];
                            $uacc3 = $step1infor['Tempuncertaintydata']['uacc3_data1'];
                            $divisor = $step1infor['Tempuncertaintydata']['divisor'];
                            $uresdivisoranalog = $step1infor['Tempuncertaintydata']['uresdivisoranalog'];
                            //pr($uresdivisoranalog);
                            $uresdivisordigital = $step1infor['Tempuncertaintydata']['uresdivisordigital'];
                            //pr($uresdivisordigital);
                            $urepdivisor = $step1infor['Tempuncertaintydata']['urepdivisor'];
                            
                            ///// Others
                            
                            $u1_data2 = $step1infor['Tempuncertaintydata']['u1_data2'];
                            $u2_data2 = $step1infor['Tempuncertaintydata']['u2_data2'];
                            $u3_data2 = $step1infor['Tempuncertaintydata']['u3_data2'];
                            $u4_data2 = $step1infor['Tempuncertaintydata']['u4_data2'];
                            $u5_data2 = $step1infor['Tempuncertaintydata']['u5_data2'];
                            $u6_data2 = $step1infor['Tempuncertaintydata']['u6_data2'];
                            $u7_data2 = $step1infor['Tempuncertaintydata']['u7_data2'];
                            $u8_data2 = $step1infor['Tempuncertaintydata']['u8_data2'];
                            $u9_data2 = $step1infor['Tempuncertaintydata']['u9_data2'];
                            $u10_data2 = $step1infor['Tempuncertaintydata']['u10_data2'];
                            $u11_data2 = $step1infor['Tempuncertaintydata']['u11_data2'];
                            $u12_data2 = $step1infor['Tempuncertaintydata']['u12_data2'];
                            $u13_data2 = $step1infor['Tempuncertaintydata']['u13_data2'];
                            $u14_data2 = $step1infor['Tempuncertaintydata']['u14_data2'];
                            $u15_data2 = $step1infor['Tempuncertaintydata']['u15_data2'];
                            $u16_data2 = $step1infor['Tempuncertaintydata']['u16_data2'];
                            $u17_data2 = $step1infor['Tempuncertaintydata']['u17_data2'];
                            $u18_data2 = $step1infor['Tempuncertaintydata']['u18_data2'];
                            $u19_data2 = $step1infor['Tempuncertaintydata']['u19_data2'];
                            $u20_data2 = $step1infor['Tempuncertaintydata']['u20_data2'];
                            
                            
                            
                            $res = $this->request->data['step1']['res'.$j];
                            //$first = powfn($uref1/$urefdivisor);
                            $vc = array();
                            
                            $vc_uref = 0;
                            if($urefdivisor != 0){
                            $vc_uref = powfn($uref1/$urefdivisor)+powfn($uref2/$urefdivisor)+powfn($uref3/$urefdivisor);
                            } //pr("uref = ".$vc_uref);
                            
                            $vc_urep = 0;
                            if($urepdivisor != 0)  { 
                            $vc_urep = powfn($this->request->data['step1']['m'.$j.'_13']/$urepdivisor);
                            } //pr("urep = ".$vc_urep);
                            
                            $vc_digital = 0;
                            if($uresdivisordigital != 0)  { 
                            $vc_digital = powfn($res/$uresdivisordigital);
                            } //pr("udigital = ".$vc_digital);
                            
                            $vc_div = 0;
                            if($divisor != 0)  { 
                            $vc_div = powfn($this->request->data['step1']['acc'.$j]/$divisor) + powfn($this->request->data['step1']['count'.$j]/$divisor) + powfn($uacc1/$divisor)+powfn($uacc2/$divisor)+powfn($uacc3/$divisor)+powfn($u1_data2/$divisor)+powfn($u2_data2/$divisor)+
                                    powfn($u3_data2/$divisor)+powfn($u4_data2/$divisor)+powfn($u5_data2/$divisor)+powfn($u6_data2/$divisor)+powfn($u7_data2/$divisor)+powfn($u8_data2/$divisor)+
                                    powfn($u9_data2/$divisor)+powfn($u10_data2/$divisor)+powfn($u11_data2/$divisor)+powfn($u12_data2/$divisor)+powfn($u13_data2/$divisor)+powfn($u14_data2/$divisor)+
                                 powfn($u15_data2/$divisor)+powfn($u16_data2/$divisor)+powfn($u17_data2/$divisor)+powfn($u18_data2/$divisor)+powfn($u19_data2/$divisor)+powfn($u20_data2/$divisor);
                            } //pr("divisor = ".$divisor);
                                 
                            $vc[] = $vc_uref + $vc_div + $vc_digital +$vc_urep;     
                            //pr($vc);
                            

							
                            
                        }
                        $vc2=0;
                        foreach($vc as $vc1)
                        {
                            $vc2 = $vc2+$vc1;
                        }
                        $vc_final = sqrt($vc2);
                        //pr("vc_final = ".$vc_final);
                        $kfactor = 2;
                        $urep = $this->request->data['step1']['m'.$j.'_13'];
                        //pr($urep);
                        $po_val = (powfn4($urep)/($this->request->data['step1']['no_runs']-1));
                        //pr($po_val);
                        if($po_val){
                        $dof = (powfn4($vc_final)/$po_val);
                        //pr("dof = ".$dof);
                        }
                        $uncertainty = $kfactor * $vc_final;
                        //pr("uncert = ".$uncertainty);
//                        //pr($dof);
//                        
//                        
//                        //exit;
//                        //exit;
//                        if(count($comparable_uncert) != 0)
//                        {
//                        $uncer_sum = array_sum($uncertainty);
//                        $uncertainty = array();
                        if($this->request->data['step1']['m'.$j.'_1']!=NULL && $this->request->data['step1']['temp'.$j]!=NULL)
                        {
                            $this->request->data['step1']['uncert'.$j] = $uncertainty;
                        }
                        else
                        {
                            $this->request->data['step1']['uncert'.$j] = '';
                        }
                        if($po_val){
                        $this->request->data['step1']['dof'.$j] = $dof;
                        }
                        $this->request->data['step1']['uc'.$j] = $vc_final;
                        $this->request->data['step1']['kfac'.$j] = $kfactor;
//                        
//                        }
//                        
                        $summed_val_b = 0;
                        $array_sd_b = array();
                        $sd_b = 0;
                        $mean_b = 0;
                        for($i=1;$i<=15;$i++)
                        {
                            if(isset($this->request->data['step1']['b'.$j.'_'.$i.'']))
                            {
                                $summed_val_b = $summed_val_b + $this->request->data['step1']['b'.$j.'_'.$i.''];
                                $array_sd_b[] = $this->request->data['step1']['b'.$j.'_'.$i.''];
                            }
                        }
                        $this->request->data['step1']['b'.$j.'_12'] = $sd_b = stddev1($array_sd_b);
                        $this->request->data['step1']['b'.$j.'_13'] = $sd_b/sqrt($this->request->data['step1']['no_runs']);
                        $this->request->data['step1']['b'.$j.'_11'] = $mean_b = $summed_val_b/$this->request->data['step1']['no_runs']; 
                        //pr($sd_b);
                        if(isset($this->request->data['total']['is_afteradjust']))
                        {
                        
                            
                            $summed_val_a = 0;
                            $array_sd_a = array();
                            $sd_a = 0;
                            $mean_a = 0;
                            for($i=1;$i<=15;$i++)
                            {
                                if(isset($this->request->data['step1']['a'.$j.'_'.$i.'']))
                                {
                                    $summed_val_a = $summed_val_a + $this->request->data['step1']['a'.$j.'_'.$i.''];
                                    $array_sd_a[] = $this->request->data['step1']['a'.$j.'_'.$i.''];
                                }

                            }
                            $this->request->data['step1']['a'.$j.'_12'] = $sd_a = stddev2($array_sd_a);
                            $this->request->data['step1']['a'.$j.'_13'] = $sd_a/sqrt($this->request->data['step1']['no_runs']);
                            //pr($sd_a);
                            $this->request->data['step1']['a'.$j.'_11'] = $mean_a = $summed_val_a/$this->request->data['step1']['no_runs']; 
                        
                        }
                    //}
                        
                    }
                    
                    //pr($uncertainty);
                    //exit; 
                    //$unique = array();
                    //$unique[] = ;
                    
                    $this->request->data['step1']['uc_data_arr'] = implode(',',array_unique($aaaaaa));
                   // exit;
                }
                
                $this->request->data['Tempcertificatedata'] = $this->request->data['step1'];
                $this->request->data['Tempcertificatedata']['certificate_no'] = $certificateno;
                $this->request->data['Tempcertificatedata']['temp_readingtype_id'] = $readingtype_id;
                $this->request->data['Tempcertificatedata']['temp_channel_id'] = $channel_id;
                //$this->request->data['Tempcertificatedata']['temp1'] = $temp1;
                //pr($this->request->data);exit;
                
                $this->request->data['Tempcertificatedata']['id']= $find_cert['Tempcertificatedata']['id'];
                $this->Tempcertificatedata->save($this->request->data['Tempcertificatedata']);
                
                $get_cert_for_id = $this->Tempcertificate->find('first',array('conditions'=>array('Tempcertificate.certificate_no'=>$this->request->data['certificateno']),'recursive'=>'2'));
                
                if($this->request->data['Tempformdata']['cal_status']==1) // Rejected
                {
                    $get_desc = $this->Tempcertificate->find('first',array('conditions'=>array('Tempcertificate.certificate_no'=>$this->request->data['certificateno']),'recursive'=>'2'));
                    $desc_id = $get_desc['Tempcertificate']['description_id'];
                    //$data = $this->Description->find('first',array('conditions'=>array('Description.id'=>$desc_id)));
                    $this->Description->updateAll(array('Description.engineer'=>0),array('Description.id'=>$desc_id));
                }
                if($this->request->data['Tempformdata']['cal_status']==2)
                {
                    $get_desc = $this->Tempcertificate->find('first',array('conditions'=>array('Tempcertificate.certificate_no'=>$this->request->data['certificateno']),'recursive'=>'2'));
                    $desc_id = $get_desc['Tempcertificate']['description_id'];
                    //$data = $this->Description->find('first',array('conditions'=>array('Description.id'=>$desc_id)));
                    $this->Description->updateAll(array('Description.supervisor'=>1),array('Description.id'=>$desc_id));
                }
                
                if($this->request->data['Tempformdata']['approved_status']==1) // Rejected
                {
                    $get_desc = $this->Tempcertificate->find('first',array('conditions'=>array('Tempcertificate.certificate_no'=>$this->request->data['certificateno']),'recursive'=>'2'));
                    $desc_id = $get_desc['Tempcertificate']['description_id'];
                    //$data = $this->Description->find('first',array('conditions'=>array('Description.id'=>$desc_id)));
                    $this->Description->updateAll(array('Description.supervisor'=>0),array('Description.id'=>$desc_id));
                }
                if($this->request->data['Tempformdata']['approved_status']==2)
                {
                    $get_desc = $this->Tempcertificate->find('first',array('conditions'=>array('Tempcertificate.certificate_no'=>$this->request->data['certificateno']),'recursive'=>'2'));
                    $desc_id = $get_desc['Tempcertificate']['description_id'];
                    //$data = $this->Description->find('first',array('conditions'=>array('Description.id'=>$desc_id)));
                    $this->Description->updateAll(array('Description.manager'=>1),array('Description.id'=>$desc_id));
                }
                
                
                $this->request->data['Tempcertificate'] = $this->request->data['Tempformdata'];
                $this->request->data['Tempcertificate']['id']= $get_cert_for_id['Tempcertificate']['id'];
                $this->Tempcertificate->save($this->request->data['Tempcertificate']);
            }
            else
            {
                //pr($_REQUEST);
                //pr($this->request->data);exit;
                if(isset($this->request->data['step1']['uncertainty1_val'])){
                $uncertainty1_val1 = $this->request->data['step1']['uncertainty1_val'];
                $uncertainty1_val = implode(',',$uncertainty1_val1);
                $this->request->data['Tempcertificatedata']['uncertainty1_val'] = $uncertainty1_val;
                }
                $this->request->data['Tempcertificatedata']['uncertainty1_val'] = $uncertainty1_val;
                function stddev($array)
                {
                    //Don Knuth is the $deity of algorithms
                    //http://en.wikipedia.org/wiki/Algorithms_for_calculating_variance#III._On-line_algorithm
                    $n = 0;
                    $mean = 0;
                    $M2 = 0;
                    foreach($array as $x){
                        $n++;
                        $delta = $x - $mean;
                        $mean = $mean + $delta/$n;
                        $M2 = $M2 + $delta*($x - $mean);
                    }
                    $variance = $M2/($n - 1);
                    return sqrt($variance);
                }
                function stddev1($array)
                {
                    //Don Knuth is the $deity of algorithms
                    //http://en.wikipedia.org/wiki/Algorithms_for_calculating_variance#III._On-line_algorithm
                    $n = 0;
                    $mean = 0;
                    $M2 = 0;
                    foreach($array as $x){
                        $n++;
                        $delta = $x - $mean;
                        $mean = $mean + $delta/$n;
                        $M2 = $M2 + $delta*($x - $mean);
                    }
                    $variance = $M2/($n - 1);
                    return sqrt($variance);
                }
                function stddev2($array)
                {
                    //Don Knuth is the $deity of algorithms
                    //http://en.wikipedia.org/wiki/Algorithms_for_calculating_variance#III._On-line_algorithm
                    $n = 0;
                    $mean = 0;
                    $M2 = 0;
                    foreach($array as $x){
                        $n++;
                        $delta = $x - $mean;
                        $mean = $mean + $delta/$n;
                        $M2 = $M2 + $delta*($x - $mean);
                    }
                    $variance = $M2/($n - 1);
                    return sqrt($variance);
                }
                if(isset($this->request->data['step1']['no_runs']))
                {
                    // Twin FOR
                    for($j=1;$j<=15;$j++)
                    {
                        $summed_val_m = 0;
                        $array_sd_m = array();
                        $sd_m = 0;
                        $mean_m = 0;
                        for($i=1;$i<=15;$i++)
                        {
                            if(isset($this->request->data['step1']['m'.$j.'_'.$i.'']))
                            {
                                $summed_val_m = $summed_val_m + $this->request->data['step1']['m'.$j.'_'.$i.''];
                                $array_sd_m[] = $this->request->data['step1']['m'.$j.'_'.$i.''];
                            }
                        }
                        //pr($array_sd_m); exit;
                        $this->request->data['step1']['m'.$j.'_12'] = $sd_m = stddev($array_sd_m);
                        $this->request->data['step1']['m'.$j.'_13'] = $sd_m/sqrt($this->request->data['step1']['no_runs']);
                        $this->request->data['step1']['m'.$j.'_11'] = $mean_m = $summed_val_m/$this->request->data['step1']['no_runs'];
                        
                        
                        
                        
                        $summed_val_b = 0;
                        $array_sd_b = array();
                        $sd_b = 0;
                        $mean_b = 0;
                        for($i=1;$i<=15;$i++)
                        {
                            if(isset($this->request->data['step1']['b'.$j.'_'.$i.'']))
                            {
                                $summed_val_b = $summed_val_b + $this->request->data['step1']['b'.$j.'_'.$i.''];
                                $array_sd_b[] = $this->request->data['step1']['b'.$j.'_'.$i.''];
                            }
                        }
                        $this->request->data['step1']['b'.$j.'_12'] = $sd_b = stddev1($array_sd_b);
                        $this->request->data['step1']['b'.$j.'_13'] = $sd_b/sqrt($this->request->data['step1']['no_runs']);
                        $this->request->data['step1']['b'.$j.'_11'] = $mean_b = $summed_val_b/$this->request->data['step1']['no_runs']; 
                        //pr($sd_b);
                        if(isset($this->request->data['total']['is_afteradjust']))
                        {
                        
                            
                            $summed_val_a = 0;
                            $array_sd_a = array();
                            $sd_a = 0;
                            $mean_a = 0;
                            for($i=1;$i<=15;$i++)
                            {
                                if(isset($this->request->data['step1']['a'.$j.'_'.$i.'']))
                                {
                                    $summed_val_a = $summed_val_a + $this->request->data['step1']['a'.$j.'_'.$i.''];
                                    $array_sd_a[] = $this->request->data['step1']['a'.$j.'_'.$i.''];
                                }

                            }
                            $this->request->data['step1']['a'.$j.'_12'] = $sd_a = stddev2($array_sd_a);
                            $this->request->data['step1']['a'.$j.'_13'] = $sd_a/sqrt($this->request->data['step1']['no_runs']);
                            //pr($sd_a);
                            $this->request->data['step1']['a'.$j.'_11'] = $mean_a = $summed_val_a/$this->request->data['step1']['no_runs']; 
                        
                        }
                    }
                }
                
                
                $this->request->data['Tempcertificatedata'] = $this->request->data['step1'];
                $this->request->data['Tempcertificatedata']['certificate_no'] = $certificateno;
                $this->request->data['Tempcertificatedata']['temp_readingtype_id'] = $readingtype_id;
                $this->request->data['Tempcertificatedata']['temp_channel_id'] = $channel_id;
                //$this->request->data['Tempcertificatedata']['temp1'] = $temp1;
                 
                $this->Tempcertificatedata->create();
                $this->Tempcertificatedata->save($this->request->data['Tempcertificatedata']);
            }
            
            $unit_list = $this->Tempunit->find('list', array('conditions' => array('Tempunit.status' => 1),'fields' => array('Tempunit.id','unitname')));
            $this->set('unit_list',$unit_list);
        
            $uncertainty = $this->Tempuncertainty->find('all');
            $this->set('uncertainty',$uncertainty);
            
            $find_cert = $this->Tempcertificatedata->find('first',array('conditions'=>array('Tempcertificatedata.certificate_no'=>$certificateno,'Tempcertificatedata.temp_readingtype_id'=>$readingtype_id,'Tempcertificatedata.temp_channel_id'=>$channel_id)));
            $this->set('cert',$find_cert);
            
            $find_cert_uc_data_arr = $this->Tempcertificatedata->find('first',array('conditions'=>array('Tempcertificatedata.certificate_no'=>$certificateno,'Tempcertificatedata.temp_readingtype_id'=>$readingtype_id,'Tempcertificatedata.temp_channel_id'=>$channel_id)));
            $res = $find_cert_uc_data_arr['Tempcertificatedata']['uc_data_arr'];
            if(isset($res))
            {
                $explo = explode(',',$res);
                
                $uncertaintyda[] = $this->Tempuncertaintydata->find('all',array('conditions'=>array('Tempuncertaintydata.id'=>$explo)));
                
                $this->set('uncertaintyda',$uncertaintyda);
            }
        //pr($uncertaintyda);exit;
            $find_cert_main_data = $this->Description->find('first',array('conditions'=>array('Description.certificateno'=>$certificateno),'recursive'=>'2'));
            $this->set('get_cert_main',$find_cert_main_data);

            $get_cert_sales = $this->Tempcertificate->find('first',array('conditions'=>array('Tempcertificate.certificate_no'=>$certificateno),'recursive'=>'2'));
            $this->set('get_cert_sales',$get_cert_sales);
            
            
            
            
            
            //// -----------------------Static Details
            
            
            $get_cert_certno = $this->Tempcertificate->find('list',array('fields' => array('certificate_no','certificate_no')),array('recursive'=>'2'));
            $this->set('get_cert_certno',$get_cert_certno);

            $uncertainty = $this->Tempuncertainty->find('all');
            $this->set('uncertainty',$uncertainty);
            
            $readingtype_data = $this->Tempreadingtype->find('list',array('fields' => array('Tempreadingtype.id','Tempreadingtype.readingtypename'),'conditions'=>array('Tempreadingtype.is_deleted'=>0,'Tempreadingtype.status'=>1)),array('order'=>'Tempreadingtype.id Desc','recursive'=>'2'));
            $this->set('readingtype_data',$readingtype_data);

            $channel_data = $this->Tempchannel->find('list',array('fields' => array('Tempchannel.id','Tempchannel.channelname'),'conditions'=>array('Tempchannel.is_deleted'=>0,'Tempchannel.status'=>1)),array('order'=>'Tempchannel.id Desc','recursive'=>'2'));
            $this->set('channel_data',$channel_data);

            $tempform_data = $this->Tempformdata->find('first');
            $this->set('formdata',$tempform_data);

            $instrument_cal_status = array('1'=>'Faulty','2'=>'Calibration','3'=>'No Capability','4'=>'Return without cal','5'=>'Out of tolerance');
            $this->set('instrument_cal_status',$instrument_cal_status);
           
        }
        else
        {
            //pr('else');
            //exit;
            $ids = array();
            $ids = explode("$", $id);
            $instrument_id = $ids[0];
            $range_id = $ids[3];
            $model_no = $ids[2];
            $brand_id = $ids[1];
            $salesorder_id = $ids[4];
            $description_id = $ids[5];

            $find_cert_main_data = $this->Description->find('first',array('conditions'=>array('Description.id'=>$description_id),'recursive'=>'2'));
            //pr($find_cert_main_data);exit;
            $this->set('get_cert_main',$find_cert_main_data);

            $get_cert_sales = $this->Tempcertificate->find('first',array('conditions'=>array('Tempcertificate.description_id'=>$description_id),'recursive'=>'2'));
            $this->set('get_cert_sales',$get_cert_sales);
            
            
//            $tempcert = $this->Tempcertificate->find('first',array('conditions'=>array('Tempcertificate.certificate_no'=>$certificateno),'recursive'=>'2'));
//            $tempcertdata = $this->Tempcertificatedata->find('first',array('conditions'=>array('Tempcertificatedata.certificate_no'=>$certificateno,'Tempcertificatedata.temp_readingtype_id'=>$readingtype_id,'Tempcertificatedata.temp_channel_id'=>$channel_id)));
//            
//            $temptemplate = $this->Temptemplate->find('first', array('conditions' => array('Temptemplate.temp_instruments_id' =>$instrument_id,
//                'Temptemplate.model' =>$model_no,'Temptemplate.brand_id' =>$brand_id,
//                'Temptemplate.range_id' =>$range_id)));
//            $this->set('tempdata',$temptemplate['Temptemplatedata']);
//            //pr($temptemplate['Temptemplatedata']);exit;
//            $temptemplatedata = $this->Temptemplatedata->find('all', array('conditions' => array('Temptemplatedata.temp_templates_id' =>$tempcert['Tempcertificate']['template_id'])));
//            
            
            
            //// -----------------------Static Details
            
            $get_cert_certno = $this->Tempcertificate->find('list',array('fields' => array('certificate_no','certificate_no')),array('recursive'=>'2'));
            $this->set('get_cert_certno',$get_cert_certno);

            $uncertainty = $this->Tempuncertainty->find('all');
            $this->set('uncertainty',$uncertainty);
            
            $readingtype_data = $this->Tempreadingtype->find('list',array('fields' => array('Tempreadingtype.id','Tempreadingtype.readingtypename'),'conditions'=>array('Tempreadingtype.is_deleted'=>0,'Tempreadingtype.status'=>1)),array('order'=>'Tempreadingtype.id Desc','recursive'=>'2'));
            $this->set('readingtype_data',$readingtype_data);

            $channel_data = $this->Tempchannel->find('list',array('fields' => array('Tempchannel.id','Tempchannel.channelname'),'conditions'=>array('Tempchannel.is_deleted'=>0,'Tempchannel.status'=>1)),array('order'=>'Tempchannel.id Desc','recursive'=>'2'));
            $this->set('channel_data',$channel_data);

            $tempform_data = $this->Tempformdata->find('first');
            $this->set('formdata',$tempform_data);

            $instrument_cal_status = array('1'=>'Faulty','2'=>'Calibration','3'=>'No Capability','4'=>'Return without cal','5'=>'Out of tolerance');
            $this->set('instrument_cal_status',$instrument_cal_status);
            
        }
        //exit;
        
    }
    public function temperature()
    {
        //$template_data = $this->Temptemplate->find('all',array('conditions'=>array('Temptemplate.is_deleted'=>0)),array('order'=>'Temptemplate.id Desc','recursive'=>'2'));
        //
        //$description = $this->Description->find('all',array('conditions'=>array('Description.status'=>1,'Description.checking'=>0,'Description.processing'=>0,'Description.department_id'=>2)));
        
        
        //$template_data = $this->Temptemplate->find('all');pr($template_data);exit;
        $eng_data = $this->Description->query('SELECT *
                        FROM sal_description AS Description
                        LEFT JOIN `temp_templates` AS `Temptemplate` ON Description.instrument_id = Temptemplate.temp_instruments_id
                        WHERE Description.model_no = Temptemplate.model
                        AND Description.brand_id = Temptemplate.brand_id
                        AND Description.sales_range = Temptemplate.range_id
                        AND Temptemplate.is_deleted =0
                        AND Description.checking =0
                        AND Description.department_id =2
                        AND Description.engineer =0
                        GROUP BY Description.id DESC');

        $this->set('eng_data',$eng_data);
        
        $sup_app_data = $this->Description->query('SELECT *
                        FROM sal_description AS Description
                        LEFT JOIN `temp_templates` AS `Temptemplate` ON Description.instrument_id = Temptemplate.temp_instruments_id
                        WHERE Description.model_no = Temptemplate.model
                        AND Description.brand_id = Temptemplate.brand_id
                        AND Description.sales_range = Temptemplate.range_id
                        AND Temptemplate.is_deleted =0
                        AND Description.checking =0
                        AND Description.department_id =2
                        AND Description.engineer =1
                        AND Description.supervisor =0
                        GROUP BY Description.id DESC');
        $this->set('sup_app_data',$sup_app_data);
        
        $man_app_data = $this->Description->query('SELECT *
                        FROM sal_description AS Description
                        LEFT JOIN `temp_templates` AS `Temptemplate` ON Description.instrument_id = Temptemplate.temp_instruments_id
                        WHERE Description.model_no = Temptemplate.model
                        AND Description.brand_id = Temptemplate.brand_id
                        AND Description.sales_range = Temptemplate.range_id
                        AND Temptemplate.is_deleted =0
                        AND Description.checking =0
                        AND Description.department_id =2
                        AND Description.engineer =1
                        AND Description.supervisor =1
                        AND Description.manager =0
                        GROUP BY Description.id DESC');
        $this->set('man_app_data',$man_app_data);
        
        $cer_total_data = $this->Description->query('SELECT *
                        FROM sal_description AS Description
                        LEFT JOIN `temp_templates` AS `Temptemplate` ON Description.instrument_id = Temptemplate.temp_instruments_id
                        WHERE Description.model_no = Temptemplate.model
                        AND Description.brand_id = Temptemplate.brand_id
                        AND Description.sales_range = Temptemplate.range_id
                        AND Temptemplate.is_deleted =0
                        AND Description.checking =0
                        AND Description.department_id =2
                        AND Description.engineer =1
                        AND Description.supervisor =1
                        AND Description.manager =1
                        GROUP BY Description.id DESC');
        $this->set('cer_total_data',$cer_total_data);
        //pr($eng_data);exit;
        foreach($eng_data as $data_arr)
        {
            $data_arr_val[] = $data_arr['Description']['id'];
            //Tempcertificate
                $get_cert_list = $this->Tempcertificate->find('first',array('conditions'=>array('Tempcertificate.description_id'=>$data_arr['Description']['id']),'recursive'=>'2'));
                if(!$get_cert_list)
                {
                    $get_cert_sales = $this->Tempcertificate->find('all',array('conditions'=>array('Tempcertificate.salesorder_id'=>$data_arr['Description']['salesorder_id']),'recursive'=>'2'));
                    
//                        //pr($get_cert_sales);exit;
//                    }
//                    
                    // Heard http://8tracks.com/evansmusic/99-songs-to-make-your-homework-awesome Awesome u know
                    
                    $dmt    =   $this->random('certificateno');
                    //pr($dmt);exit;
                    
                    $certificate_no = $dmt;
                    $this->request->data['Tempcertificate']['certificate_no'] = $certificate_no;
                    $this->request->data['Tempcertificate']['template_id'] = $data_arr['Temptemplate']['id'];
                    $this->request->data['Tempcertificate']['salesorder_id'] = $data_arr['Description']['salesorder_id'];
                    $this->request->data['Tempcertificate']['description_id'] = $data_arr['Description']['id'];
                    $this->request->data['Tempcertificate']['instrument_id'] = $data_arr['Description']['instrument_id'];
                    $ins_id = $data_arr['Description']['instrument_id'];
                    $this->request->data['Tempcertificate']['brand_id'] = $data_arr['Description']['brand_id'];
                    $brand_id = $data_arr['Description']['brand_id'];
                    $this->request->data['Tempcertificate']['model'] = $data_arr['Description']['model_no'];
                    $modelno = $data_arr['Description']['model_no'];
                    $this->request->data['Tempcertificate']['range_id'] = $data_arr['Description']['sales_range'];
                    $range = $data_arr['Description']['sales_range'];
                    $this->request->data['Tempcertificate']['is_template_created'] = 1;
                    $this->request->data['Tempcertificate']['is_template_match'] = 1;
                    $this->Description->updateAll(array('Description.processing'=>1,'Description.template_created'=>1,'Description.certificateno'=>'"'.$certificate_no.'"'),array('Description.id'=>$data_arr['Description']['id'],'Description.status'=>1));
                    //pr($a);exit;
                    if($this->Tempcertificate->save($this->request->data['Tempcertificate']))
                    {
                        $last_insert_id = $this->Tempcertificate->getLastInsertID();
                        $this->Random->updateAll(array('Random.certificateno'=>'"'.$dmt.'"'),array('Random.id'=>1));  
                        //$this->Temptemplatedata->updateAll(array('Temptemplatedata.status'=>1,'Temptemplatedata.temp_templates_id'=>$last_insert_id),array('Temptemplatedata.status'=>0));
                        $this->Session->setFlash(__('Template & Template Data are Added Successfully'));
                    }
                    $desc = $this->Description->find('all',array('conditions'=>array('Description.salesorder_id'=>$data_arr['Description']['salesorder_id'],'Description.department_id'=>2)));
                    foreach($desc as $desc_all)
                    {
                        if($desc_all['Description']['id']!=$data_arr['Description']['id'])
                        {
                            $dmt    =   $this->random('certificateno');
                            //pr($dmt);exit;
                            if($desc_all['Description']['instrument_id']==$ins_id && $desc_all['Description']['brand_id']==$brand_id && $desc_all['Description']['model_no']==$modelno && $desc_all['Description']['sales_range']==$range)
                            {
                                $certificate_no = $dmt;
                                $this->request->data['Tempcertificate']['certificate_no'] = $certificate_no;
                                $this->request->data['Tempcertificate']['template_id'] = $data_arr['Temptemplate']['id'];
                                $this->request->data['Tempcertificate']['salesorder_id'] = $desc_all['Description']['salesorder_id'];
                                $this->request->data['Tempcertificate']['description_id'] = $desc_all['Description']['id'];
                                $this->request->data['Tempcertificate']['instrument_id'] = $desc_all['Description']['instrument_id'];
                                $this->request->data['Tempcertificate']['brand_id'] = $desc_all['Description']['brand_id'];
                                $this->request->data['Tempcertificate']['model'] = $desc_all['Description']['model_no'];
                                $this->request->data['Tempcertificate']['range_id'] = $desc_all['Description']['sales_range'];
                                $this->request->data['Tempcertificate']['is_template_created'] = 1;
                                $this->request->data['Tempcertificate']['is_template_match'] = 1;
                                $this->Description->updateAll(array('Description.processing'=>1,'Description.template_created'=>1,'Description.certificateno'=>'"'.$certificate_no.'"'),array('Description.id'=>$desc_all['Description']['id'],'Description.status'=>1));
                                $this->Tempcertificate->create();
                                if($this->Tempcertificate->save($this->request->data['Tempcertificate']))
                                {
                                    $last_insert_id = $this->Tempcertificate->getLastInsertID();
                                    $this->Random->updateAll(array('Random.certificateno'=>'"'.$dmt.'"'),array('Random.id'=>1));  
                                    //$this->Temptemplatedata->updateAll(array('Temptemplatedata.status'=>1,'Temptemplatedata.temp_templates_id'=>$last_insert_id),array('Temptemplatedata.status'=>0));
                                    //$this->Session->setFlash(__('Template & Template Data are Added Successfully'));
                                }
                            }
                            else
                            {
                                $certificate_no = $dmt;
                                $this->request->data['Tempcertificate']['certificate_no'] = $certificate_no;
                                $this->request->data['Tempcertificate']['template_id'] = '';
                                $this->request->data['Tempcertificate']['salesorder_id'] = $desc_all['Description']['salesorder_id'];
                                $this->request->data['Tempcertificate']['description_id'] = $desc_all['Description']['id'];
                                $this->request->data['Tempcertificate']['instrument_id'] = $desc_all['Description']['instrument_id'];
                                $this->request->data['Tempcertificate']['brand_id'] = $desc_all['Description']['brand_id'];
                                $this->request->data['Tempcertificate']['model'] = $desc_all['Description']['model_no'];
                                $this->request->data['Tempcertificate']['range_id'] = $desc_all['Description']['sales_range'];
                                $this->request->data['Tempcertificate']['is_template_created'] = 0;
                                $this->request->data['Tempcertificate']['is_template_match'] = 0;
                                $this->Tempcertificate->create();
                                if($this->Tempcertificate->save($this->request->data['Tempcertificate']))
                                {
                                    $last_insert_id = $this->Tempcertificate->getLastInsertID();
                                    $this->Random->updateAll(array('Random.certificateno'=>'"'.$dmt.'"'),array('Random.id'=>1));  
                                    //$this->Temptemplatedata->updateAll(array('Temptemplatedata.status'=>1,'Temptemplatedata.temp_templates_id'=>$last_insert_id),array('Temptemplatedata.status'=>0));
                                    //$this->Session->setFlash(__('Template & Template Data are Added Successfully'));
                                }
                            }
                        }
                        
                    }
                   // pr($desc);exit;
                    
//                    {
                    //pr($data_arr);
                }
                else
                {
                    
                    
                    //$this->Session->setFlash(__('Certificate Already Exists!'));
                }
        }
        
        foreach($sup_app_data as $data_arr)
        {
            $data_arr_val[] = $data_arr['Description']['id'];
            //Tempcertificate
                $get_cert_list = $this->Tempcertificate->find('first',array('conditions'=>array('Tempcertificate.description_id'=>$data_arr['Description']['id']),'recursive'=>'2'));
                if(!$get_cert_list)
                {
                    $get_cert_sales = $this->Tempcertificate->find('all',array('conditions'=>array('Tempcertificate.salesorder_id'=>$data_arr['Description']['salesorder_id']),'recursive'=>'2'));
                    
//                        //pr($get_cert_sales);exit;
//                    }
//                    
                    // Heard http://8tracks.com/evansmusic/99-songs-to-make-your-homework-awesome Awesome u know
                    
                    $dmt    =   $this->random('certificateno');
                    //pr($dmt);exit;
                    
                    $certificate_no = $dmt;
                    $this->request->data['Tempcertificate']['certificate_no'] = $certificate_no;
                    $this->request->data['Tempcertificate']['template_id'] = $data_arr['Temptemplate']['id'];
                    $this->request->data['Tempcertificate']['salesorder_id'] = $data_arr['Description']['salesorder_id'];
                    $this->request->data['Tempcertificate']['description_id'] = $data_arr['Description']['id'];
                    $this->request->data['Tempcertificate']['instrument_id'] = $data_arr['Description']['instrument_id'];
                    $ins_id = $data_arr['Description']['instrument_id'];
                    $this->request->data['Tempcertificate']['brand_id'] = $data_arr['Description']['brand_id'];
                    $brand_id = $data_arr['Description']['brand_id'];
                    $this->request->data['Tempcertificate']['model'] = $data_arr['Description']['model_no'];
                    $modelno = $data_arr['Description']['model_no'];
                    $this->request->data['Tempcertificate']['range_id'] = $data_arr['Description']['sales_range'];
                    $range = $data_arr['Description']['sales_range'];
                    $this->request->data['Tempcertificate']['is_template_created'] = 1;
                    $this->request->data['Tempcertificate']['is_template_match'] = 1;
                    $this->Description->updateAll(array('Description.processing'=>1,'Description.template_created'=>1,'Description.certificateno'=>'"'.$certificate_no.'"'),array('Description.id'=>$data_arr['Description']['id'],'Description.status'=>1));
                    //pr($a);exit;
                    if($this->Tempcertificate->save($this->request->data['Tempcertificate']))
                    {
                        $last_insert_id = $this->Tempcertificate->getLastInsertID();
                        $this->Random->updateAll(array('Random.certificateno'=>'"'.$dmt.'"'),array('Random.id'=>1));  
                        //$this->Temptemplatedata->updateAll(array('Temptemplatedata.status'=>1,'Temptemplatedata.temp_templates_id'=>$last_insert_id),array('Temptemplatedata.status'=>0));
                        $this->Session->setFlash(__('Template & Template Data are Added Successfully'));
                    }
                    $desc = $this->Description->find('all',array('conditions'=>array('Description.salesorder_id'=>$data_arr['Description']['salesorder_id'],'Description.department_id'=>2)));
                    foreach($desc as $desc_all)
                    {
                        if($desc_all['Description']['id']!=$data_arr['Description']['id'])
                        {
                            $dmt    =   $this->random('certificateno');
                            //pr($dmt);exit;
                            if($desc_all['Description']['instrument_id']==$ins_id && $desc_all['Description']['brand_id']==$brand_id && $desc_all['Description']['model_no']==$modelno && $desc_all['Description']['sales_range']==$range)
                            {
                                $certificate_no = $dmt;
                                $this->request->data['Tempcertificate']['certificate_no'] = $certificate_no;
                                $this->request->data['Tempcertificate']['template_id'] = $data_arr['Temptemplate']['id'];
                                $this->request->data['Tempcertificate']['salesorder_id'] = $desc_all['Description']['salesorder_id'];
                                $this->request->data['Tempcertificate']['description_id'] = $desc_all['Description']['id'];
                                $this->request->data['Tempcertificate']['instrument_id'] = $desc_all['Description']['instrument_id'];
                                $this->request->data['Tempcertificate']['brand_id'] = $desc_all['Description']['brand_id'];
                                $this->request->data['Tempcertificate']['model'] = $desc_all['Description']['model_no'];
                                $this->request->data['Tempcertificate']['range_id'] = $desc_all['Description']['sales_range'];
                                $this->request->data['Tempcertificate']['is_template_created'] = 1;
                                $this->request->data['Tempcertificate']['is_template_match'] = 1;
                                $this->Description->updateAll(array('Description.processing'=>1,'Description.template_created'=>1,'Description.certificateno'=>'"'.$certificate_no.'"'),array('Description.id'=>$desc_all['Description']['id'],'Description.status'=>1));
                                $this->Tempcertificate->create();
                                if($this->Tempcertificate->save($this->request->data['Tempcertificate']))
                                {
                                    $last_insert_id = $this->Tempcertificate->getLastInsertID();
                                    $this->Random->updateAll(array('Random.certificateno'=>'"'.$dmt.'"'),array('Random.id'=>1));  
                                    //$this->Temptemplatedata->updateAll(array('Temptemplatedata.status'=>1,'Temptemplatedata.temp_templates_id'=>$last_insert_id),array('Temptemplatedata.status'=>0));
                                    //$this->Session->setFlash(__('Template & Template Data are Added Successfully'));
                                }
                            }
                            else
                            {
                                $certificate_no = $dmt;
                                $this->request->data['Tempcertificate']['certificate_no'] = $certificate_no;
                                $this->request->data['Tempcertificate']['template_id'] = '';
                                $this->request->data['Tempcertificate']['salesorder_id'] = $desc_all['Description']['salesorder_id'];
                                $this->request->data['Tempcertificate']['description_id'] = $desc_all['Description']['id'];
                                $this->request->data['Tempcertificate']['instrument_id'] = $desc_all['Description']['instrument_id'];
                                $this->request->data['Tempcertificate']['brand_id'] = $desc_all['Description']['brand_id'];
                                $this->request->data['Tempcertificate']['model'] = $desc_all['Description']['model_no'];
                                $this->request->data['Tempcertificate']['range_id'] = $desc_all['Description']['sales_range'];
                                $this->request->data['Tempcertificate']['is_template_created'] = 0;
                                $this->request->data['Tempcertificate']['is_template_match'] = 0;
                                $this->Tempcertificate->create();
                                if($this->Tempcertificate->save($this->request->data['Tempcertificate']))
                                {
                                    $last_insert_id = $this->Tempcertificate->getLastInsertID();
                                    $this->Random->updateAll(array('Random.certificateno'=>'"'.$dmt.'"'),array('Random.id'=>1));  
                                    //$this->Temptemplatedata->updateAll(array('Temptemplatedata.status'=>1,'Temptemplatedata.temp_templates_id'=>$last_insert_id),array('Temptemplatedata.status'=>0));
                                    //$this->Session->setFlash(__('Template & Template Data are Added Successfully'));
                                }
                            }
                        }
                        
                    }
                   // pr($desc);exit;
                    
//                    {
                    //pr($data_arr);
                }
                else
                {
                    
                    
                    //$this->Session->setFlash(__('Certificate Already Exists!'));
                }
        }
        
        foreach($man_app_data as $data_arr)
        {
            $data_arr_val[] = $data_arr['Description']['id'];
            //Tempcertificate
                $get_cert_list = $this->Tempcertificate->find('first',array('conditions'=>array('Tempcertificate.description_id'=>$data_arr['Description']['id']),'recursive'=>'2'));
                if(!$get_cert_list)
                {
                    $get_cert_sales = $this->Tempcertificate->find('all',array('conditions'=>array('Tempcertificate.salesorder_id'=>$data_arr['Description']['salesorder_id']),'recursive'=>'2'));
                    
//                        //pr($get_cert_sales);exit;
//                    }
//                    
                    // Heard http://8tracks.com/evansmusic/99-songs-to-make-your-homework-awesome Awesome u know
                    
                    $dmt    =   $this->random('certificateno');
                    //pr($dmt);exit;
                    
                    $certificate_no = $dmt;
                    $this->request->data['Tempcertificate']['certificate_no'] = $certificate_no;
                    $this->request->data['Tempcertificate']['template_id'] = $data_arr['Temptemplate']['id'];
                    $this->request->data['Tempcertificate']['salesorder_id'] = $data_arr['Description']['salesorder_id'];
                    $this->request->data['Tempcertificate']['description_id'] = $data_arr['Description']['id'];
                    $this->request->data['Tempcertificate']['instrument_id'] = $data_arr['Description']['instrument_id'];
                    $ins_id = $data_arr['Description']['instrument_id'];
                    $this->request->data['Tempcertificate']['brand_id'] = $data_arr['Description']['brand_id'];
                    $brand_id = $data_arr['Description']['brand_id'];
                    $this->request->data['Tempcertificate']['model'] = $data_arr['Description']['model_no'];
                    $modelno = $data_arr['Description']['model_no'];
                    $this->request->data['Tempcertificate']['range_id'] = $data_arr['Description']['sales_range'];
                    $range = $data_arr['Description']['sales_range'];
                    $this->request->data['Tempcertificate']['is_template_created'] = 1;
                    $this->request->data['Tempcertificate']['is_template_match'] = 1;
                    $this->Description->updateAll(array('Description.processing'=>1,'Description.template_created'=>1,'Description.certificateno'=>'"'.$certificate_no.'"'),array('Description.id'=>$data_arr['Description']['id'],'Description.status'=>1));
                    //pr($a);exit;
                    if($this->Tempcertificate->save($this->request->data['Tempcertificate']))
                    {
                        $last_insert_id = $this->Tempcertificate->getLastInsertID();
                        $this->Random->updateAll(array('Random.certificateno'=>'"'.$dmt.'"'),array('Random.id'=>1));  
                        //$this->Temptemplatedata->updateAll(array('Temptemplatedata.status'=>1,'Temptemplatedata.temp_templates_id'=>$last_insert_id),array('Temptemplatedata.status'=>0));
                        $this->Session->setFlash(__('Template & Template Data are Added Successfully'));
                    }
                    $desc = $this->Description->find('all',array('conditions'=>array('Description.salesorder_id'=>$data_arr['Description']['salesorder_id'],'Description.department_id'=>2)));
                    foreach($desc as $desc_all)
                    {
                        if($desc_all['Description']['id']!=$data_arr['Description']['id'])
                        {
                            $dmt    =   $this->random('certificateno');
                            //pr($dmt);exit;
                            if($desc_all['Description']['instrument_id']==$ins_id && $desc_all['Description']['brand_id']==$brand_id && $desc_all['Description']['model_no']==$modelno && $desc_all['Description']['sales_range']==$range)
                            {
                                $certificate_no = $dmt;
                                $this->request->data['Tempcertificate']['certificate_no'] = $certificate_no;
                                $this->request->data['Tempcertificate']['template_id'] = $data_arr['Temptemplate']['id'];
                                $this->request->data['Tempcertificate']['salesorder_id'] = $desc_all['Description']['salesorder_id'];
                                $this->request->data['Tempcertificate']['description_id'] = $desc_all['Description']['id'];
                                $this->request->data['Tempcertificate']['instrument_id'] = $desc_all['Description']['instrument_id'];
                                $this->request->data['Tempcertificate']['brand_id'] = $desc_all['Description']['brand_id'];
                                $this->request->data['Tempcertificate']['model'] = $desc_all['Description']['model_no'];
                                $this->request->data['Tempcertificate']['range_id'] = $desc_all['Description']['sales_range'];
                                $this->request->data['Tempcertificate']['is_template_created'] = 1;
                                $this->request->data['Tempcertificate']['is_template_match'] = 1;
                                $this->Description->updateAll(array('Description.processing'=>1,'Description.template_created'=>1,'Description.certificateno'=>'"'.$certificate_no.'"'),array('Description.id'=>$desc_all['Description']['id'],'Description.status'=>1));
                                $this->Tempcertificate->create();
                                if($this->Tempcertificate->save($this->request->data['Tempcertificate']))
                                {
                                    $last_insert_id = $this->Tempcertificate->getLastInsertID();
                                    $this->Random->updateAll(array('Random.certificateno'=>'"'.$dmt.'"'),array('Random.id'=>1));  
                                    //$this->Temptemplatedata->updateAll(array('Temptemplatedata.status'=>1,'Temptemplatedata.temp_templates_id'=>$last_insert_id),array('Temptemplatedata.status'=>0));
                                    //$this->Session->setFlash(__('Template & Template Data are Added Successfully'));
                                }
                            }
                            else
                            {
                                $certificate_no = $dmt;
                                $this->request->data['Tempcertificate']['certificate_no'] = $certificate_no;
                                $this->request->data['Tempcertificate']['template_id'] = '';
                                $this->request->data['Tempcertificate']['salesorder_id'] = $desc_all['Description']['salesorder_id'];
                                $this->request->data['Tempcertificate']['description_id'] = $desc_all['Description']['id'];
                                $this->request->data['Tempcertificate']['instrument_id'] = $desc_all['Description']['instrument_id'];
                                $this->request->data['Tempcertificate']['brand_id'] = $desc_all['Description']['brand_id'];
                                $this->request->data['Tempcertificate']['model'] = $desc_all['Description']['model_no'];
                                $this->request->data['Tempcertificate']['range_id'] = $desc_all['Description']['sales_range'];
                                $this->request->data['Tempcertificate']['is_template_created'] = 0;
                                $this->request->data['Tempcertificate']['is_template_match'] = 0;
                                $this->Tempcertificate->create();
                                if($this->Tempcertificate->save($this->request->data['Tempcertificate']))
                                {
                                    $last_insert_id = $this->Tempcertificate->getLastInsertID();
                                    $this->Random->updateAll(array('Random.certificateno'=>'"'.$dmt.'"'),array('Random.id'=>1));  
                                    //$this->Temptemplatedata->updateAll(array('Temptemplatedata.status'=>1,'Temptemplatedata.temp_templates_id'=>$last_insert_id),array('Temptemplatedata.status'=>0));
                                    //$this->Session->setFlash(__('Template & Template Data are Added Successfully'));
                                }
                            }
                        }
                        
                    }
                   // pr($desc);exit;
                    
//                    {
                    //pr($data_arr);
                }
                else
                {
                    
                    
                    //$this->Session->setFlash(__('Certificate Already Exists!'));
                }
        }
        
        foreach($cer_total_data as $data_arr)
        {
            $data_arr_val[] = $data_arr['Description']['id'];
            //Tempcertificate
                $get_cert_list = $this->Tempcertificate->find('first',array('conditions'=>array('Tempcertificate.description_id'=>$data_arr['Description']['id']),'recursive'=>'2'));
                if(!$get_cert_list)
                {
                    $get_cert_sales = $this->Tempcertificate->find('all',array('conditions'=>array('Tempcertificate.salesorder_id'=>$data_arr['Description']['salesorder_id']),'recursive'=>'2'));
                    
//                        //pr($get_cert_sales);exit;
//                    }
//                    
                    // Heard http://8tracks.com/evansmusic/99-songs-to-make-your-homework-awesome Awesome u know
                    
                    $dmt    =   $this->random('certificateno');
                    //pr($dmt);exit;
                    
                    $certificate_no = $dmt;
                    $this->request->data['Tempcertificate']['certificate_no'] = $certificate_no;
                    $this->request->data['Tempcertificate']['template_id'] = $data_arr['Temptemplate']['id'];
                    $this->request->data['Tempcertificate']['salesorder_id'] = $data_arr['Description']['salesorder_id'];
                    $this->request->data['Tempcertificate']['description_id'] = $data_arr['Description']['id'];
                    $this->request->data['Tempcertificate']['instrument_id'] = $data_arr['Description']['instrument_id'];
                    $ins_id = $data_arr['Description']['instrument_id'];
                    $this->request->data['Tempcertificate']['brand_id'] = $data_arr['Description']['brand_id'];
                    $brand_id = $data_arr['Description']['brand_id'];
                    $this->request->data['Tempcertificate']['model'] = $data_arr['Description']['model_no'];
                    $modelno = $data_arr['Description']['model_no'];
                    $this->request->data['Tempcertificate']['range_id'] = $data_arr['Description']['sales_range'];
                    $range = $data_arr['Description']['sales_range'];
                    $this->request->data['Tempcertificate']['is_template_created'] = 1;
                    $this->request->data['Tempcertificate']['is_template_match'] = 1;
                    $this->Description->updateAll(array('Description.processing'=>1,'Description.template_created'=>1,'Description.certificateno'=>'"'.$certificate_no.'"'),array('Description.id'=>$data_arr['Description']['id'],'Description.status'=>1));
                    //pr($a);exit;
                    if($this->Tempcertificate->save($this->request->data['Tempcertificate']))
                    {
                        $last_insert_id = $this->Tempcertificate->getLastInsertID();
                        $this->Random->updateAll(array('Random.certificateno'=>'"'.$dmt.'"'),array('Random.id'=>1));  
                        //$this->Temptemplatedata->updateAll(array('Temptemplatedata.status'=>1,'Temptemplatedata.temp_templates_id'=>$last_insert_id),array('Temptemplatedata.status'=>0));
                        $this->Session->setFlash(__('Template & Template Data are Added Successfully'));
                    }
                    $desc = $this->Description->find('all',array('conditions'=>array('Description.salesorder_id'=>$data_arr['Description']['salesorder_id'],'Description.department_id'=>2)));
                    foreach($desc as $desc_all)
                    {
                        if($desc_all['Description']['id']!=$data_arr['Description']['id'])
                        {
                            $dmt    =   $this->random('certificateno');
                            //pr($dmt);exit;
                            if($desc_all['Description']['instrument_id']==$ins_id && $desc_all['Description']['brand_id']==$brand_id && $desc_all['Description']['model_no']==$modelno && $desc_all['Description']['sales_range']==$range)
                            {
                                $certificate_no = $dmt;
                                $this->request->data['Tempcertificate']['certificate_no'] = $certificate_no;
                                $this->request->data['Tempcertificate']['template_id'] = $data_arr['Temptemplate']['id'];
                                $this->request->data['Tempcertificate']['salesorder_id'] = $desc_all['Description']['salesorder_id'];
                                $this->request->data['Tempcertificate']['description_id'] = $desc_all['Description']['id'];
                                $this->request->data['Tempcertificate']['instrument_id'] = $desc_all['Description']['instrument_id'];
                                $this->request->data['Tempcertificate']['brand_id'] = $desc_all['Description']['brand_id'];
                                $this->request->data['Tempcertificate']['model'] = $desc_all['Description']['model_no'];
                                $this->request->data['Tempcertificate']['range_id'] = $desc_all['Description']['sales_range'];
                                $this->request->data['Tempcertificate']['is_template_created'] = 1;
                                $this->request->data['Tempcertificate']['is_template_match'] = 1;
                                $this->Description->updateAll(array('Description.processing'=>1,'Description.template_created'=>1,'Description.certificateno'=>'"'.$certificate_no.'"'),array('Description.id'=>$desc_all['Description']['id'],'Description.status'=>1));
                                $this->Tempcertificate->create();
                                if($this->Tempcertificate->save($this->request->data['Tempcertificate']))
                                {
                                    $last_insert_id = $this->Tempcertificate->getLastInsertID();
                                    $this->Random->updateAll(array('Random.certificateno'=>'"'.$dmt.'"'),array('Random.id'=>1));  
                                    //$this->Temptemplatedata->updateAll(array('Temptemplatedata.status'=>1,'Temptemplatedata.temp_templates_id'=>$last_insert_id),array('Temptemplatedata.status'=>0));
                                    //$this->Session->setFlash(__('Template & Template Data are Added Successfully'));
                                }
                            }
                            else
                            {
                                $certificate_no = $dmt;
                                $this->request->data['Tempcertificate']['certificate_no'] = $certificate_no;
                                $this->request->data['Tempcertificate']['template_id'] = '';
                                $this->request->data['Tempcertificate']['salesorder_id'] = $desc_all['Description']['salesorder_id'];
                                $this->request->data['Tempcertificate']['description_id'] = $desc_all['Description']['id'];
                                $this->request->data['Tempcertificate']['instrument_id'] = $desc_all['Description']['instrument_id'];
                                $this->request->data['Tempcertificate']['brand_id'] = $desc_all['Description']['brand_id'];
                                $this->request->data['Tempcertificate']['model'] = $desc_all['Description']['model_no'];
                                $this->request->data['Tempcertificate']['range_id'] = $desc_all['Description']['sales_range'];
                                $this->request->data['Tempcertificate']['is_template_created'] = 0;
                                $this->request->data['Tempcertificate']['is_template_match'] = 0;
                                $this->Tempcertificate->create();
                                if($this->Tempcertificate->save($this->request->data['Tempcertificate']))
                                {
                                    $last_insert_id = $this->Tempcertificate->getLastInsertID();
                                    $this->Random->updateAll(array('Random.certificateno'=>'"'.$dmt.'"'),array('Random.id'=>1));  
                                    //$this->Temptemplatedata->updateAll(array('Temptemplatedata.status'=>1,'Temptemplatedata.temp_templates_id'=>$last_insert_id),array('Temptemplatedata.status'=>0));
                                    //$this->Session->setFlash(__('Template & Template Data are Added Successfully'));
                                }
                            }
                        }
                        
                    }
                   // pr($desc);exit;
                    
//                    {
                    //pr($data_arr);
                }
                else
                {
                    
                    
                    //$this->Session->setFlash(__('Certificate Already Exists!'));
                }
        }
        
        
        $sup_data = $this->Description->find('all',array('conditions'=>array('NOT' => array('Description.id'=>$data_arr_val),'Description.status'=>1,'Description.checking'=>0,'Description.processing'=>0,'Description.template_created'=>0,'Description.department_id'=>2)));
        $this->set('sup_data',$sup_data);
        //pr($description);exit;
//        foreach($description as $data_arr)
//        {
//            $description1[] = $data_arr['Description']['id'];
//        }
        
//        $description = $this->Description->query('SELECT *
//                        FROM sal_description AS Description
//                        LEFT JOIN `best`.`temp_templates` AS `Temptemplate` ON Description.instrument_id != Temptemplate.temp_instruments_id
//                        WHERE Description.model_no != Temptemplate.model
//                        AND Description.brand_id != Temptemplate.brand_id
//                        AND Description.sales_range != Temptemplate.range_id
//                        AND Temptemplate.is_deleted =0
//                        AND Description.checking =0
//                        AND Description.processing =0
//                        GROUP BY Description.id ASC');
//        //$template_data_arr = 
//        foreach($description as $data_arr1)
//        {
//            $data_arr_val1[] = $data_arr1['Description']['id'];
//        }
        ///pr($eng_data);
        //pr($description1);
        //pr($data_arr_val1);
        //exit;
        

        
        
        
        
        
        
        
        
        
//        if($template_data)
//        {
//            $description_sup = $description_eng = $arr1 = array();
//            foreach($template_data as $temp1)
//            {
//                foreach($description as $temp2)
//                {
//                    //pr($temp2);exit;
//                    if($temp1['Temptemplate']['temp_instruments_id'] == $temp2['Description']['instrument_id'] && $temp1['Temptemplate']['model'] == $temp2['Description']['model_no'] && $temp1['Temptemplate']['brand_id'] == $temp2['Description']['brand_id'] && $temp1['Temptemplate']['range_id'] == $temp2['Description']['sales_range'])
//                    {
//                        
//                        if(!in_array($temp2['Description']['id'], $arr1))
//                        {
//                            $arr1[] = $temp2['Description']['id'];
//                            $description_eng[] = $temp2;
//                            
//                        }
//
//                    }
////                    else
////                    {
////                        if(!in_array($temp2['Description']['id'], $arr1))
////                        {
////                            $arr1[] = $temp2['Description']['id'];
////                            $description_sup[] = $temp2;
////                            //pr($arr2);
////                        }
////                    }
//                }
//                //exit;
//            }
//        }
//        else
//        {
//            $description_sup = $description_eng = $arr1 = array();
//            foreach($description as $temp2)
//            {
//                //pr($temp2);exit;
//                if(!in_array($temp2['Description']['id'], $arr1))
//                {
//                    $arr1[] = $temp2['Description']['id'];
//                    $description_sup[] = $temp2;
//                    //$description_eng[] = '';
//                }
//                
//            }
//        }
//        $this->set('description_sup',$description_sup);
//        $this->set('description_eng',$description_eng);
        
        ////////////// Form 2 /////////////////
        
    }
    
//    public function template()
//    {
//        
//    }
    
    public function calculation_form()
    {
        $this->layout = 'ajax';
        $unit_list = $this->Tempunit->find('list', array('conditions' => array('Tempunit.status' => 1),'fields' => array('Tempunit.id','unitname')));
        $this->set('unit_list',$unit_list);
        
        $uncertainty = $this->Tempuncertainty->find('all');
        $this->set('uncertainty',$uncertainty);
        
        $certificateno = $this->request->data['certificateno'];
        $readingtype_id = $this->request->data['readingtype'];
        $channel_id = $this->request->data['channel'];
        
        $tempcertdata_check = $this->Tempcertificatedata->find('first',array('conditions'=>array('Tempcertificatedata.certificate_no'=>$certificateno,'Tempcertificatedata.temp_readingtype_id'=>$readingtype_id,'Tempcertificatedata.temp_channel_id'=>$channel_id)));
        //pr($tempcertdata_check);exit;
        if(!$tempcertdata_check)
        {
            
            $this->request->data['Tempcertificatedata']['certificate_no'] = $certificateno;
            $this->request->data['Tempcertificatedata']['temp_readingtype_id'] = $readingtype_id;
            $this->request->data['Tempcertificatedata']['temp_channel_id'] = $channel_id;
            //$this->request->data['Tempcertificatedata']['temp1'] = $temp1;

            $this->Tempcertificatedata->create();
            $this->Tempcertificatedata->save($this->request->data['Tempcertificatedata']);
        }
        $tempcert = $this->Tempcertificate->find('first',array('conditions'=>array('Tempcertificate.certificate_no'=>$certificateno),'recursive'=>'2'));
        $tempcertdata = $this->Tempcertificatedata->find('first',array('conditions'=>array('Tempcertificatedata.certificate_no'=>$certificateno,'Tempcertificatedata.temp_readingtype_id'=>$readingtype_id,'Tempcertificatedata.temp_channel_id'=>$channel_id)));
        
        $instrument_id = $tempcert['Tempcertificate']['instrument_id'];
        $range_id = $tempcert['Tempcertificate']['range_id'];
        $model_no = $tempcert['Tempcertificate']['model'];
        $brand_id = $tempcert['Tempcertificate']['brand_id'];

        $temptemplate = $this->Temptemplate->find('first', array('conditions' => array('Temptemplate.temp_instruments_id' =>$instrument_id,
            'Temptemplate.model' =>$model_no,'Temptemplate.brand_id' =>$brand_id,
            'Temptemplate.range_id' =>$range_id)));
        //pr($temptemplate['Temptemplatedata']);exit;
        /////////// Data Setpoint
        $this->set('tempdata',$temptemplate['Temptemplatedata']);

        //pr($temptemplate['Temptemplatedata']);exit;
        $temptemplatedata = $this->Temptemplatedata->find('all', array('conditions' => array('Temptemplatedata.temp_templates_id' =>$tempcert['Tempcertificate']['template_id'])));

            
            
            
        
        
        
        
        
        $find_cert = $this->Tempcertificatedata->find('first',array('conditions'=>array('Tempcertificatedata.certificate_no'=>$certificateno,'Tempcertificatedata.temp_readingtype_id'=>$readingtype_id,'Tempcertificatedata.temp_channel_id'=>$channel_id)));
        
        $this->set('cert',$find_cert);
        
         
        
        $get_cert_sales = $this->Tempcertificate->find('first',array('conditions'=>array('Tempcertificate.certificate_no'=>$certificateno),'recursive'=>'2'));
        $this->set('get_cert_sales',$get_cert_sales);
        
        $find_cert_main_data = $this->Description->find('first',array('conditions'=>array('Description.id'=>$get_cert_sales['Tempcertificate']['description_id']),'recursive'=>'2'));
        $this->set('cert1_main_data',$find_cert_main_data);
        
        $template_data = $this->Temptemplate->find('first',array('conditions'=>array('Temptemplate.id'=>$get_cert_sales['Tempcertificate']['template_id']),'recursive'=>'2'));
        $this->set('tempdata_all',$template_data['Temptemplatedata']);
       

        

        $get_cert_certno = $this->Tempcertificate->find('list',array('fields' => array('certificate_no','certificate_no')),array('recursive'=>'2'));
        
        $this->set('get_cert_certno',$get_cert_certno);

        
            $uncertainty = $this->Tempuncertainty->find('all');
            $this->set('uncertainty',$uncertainty);
            $readingtype_data = $this->Tempreadingtype->find('list',array('fields' => array('Tempreadingtype.id','Tempreadingtype.readingtypename'),'conditions'=>array('Tempreadingtype.is_deleted'=>0,'Tempreadingtype.status'=>1)),array('order'=>'Tempreadingtype.id Desc','recursive'=>'2'));
            $this->set('readingtype_data',$readingtype_data);

            $channel_data = $this->Tempchannel->find('list',array('fields' => array('Tempchannel.id','Tempchannel.channelname'),'conditions'=>array('Tempchannel.is_deleted'=>0,'Tempchannel.status'=>1)),array('order'=>'Tempchannel.id Desc','recursive'=>'2'));
            $this->set('channel_data',$channel_data);
            
             $temp_temperature = $this->Tempambient->find('list',array('fields' => array('Tempambient.id','Tempambient.ambientname'),'conditions'=>array('Tempambient.is_deleted'=>0,'Tempambient.status'=>1,'Tempambient.default'=>1)),array('order'=>'Tempambient.id Desc','recursive'=>'2'));
            $this->set('temp_temperature',$temp_temperature);
            
             $rel_humidity = $this->Temprelativehumidity->find('list',array('fields' => array('Temprelativehumidity.id','Temprelativehumidity.relativehumidity'),'conditions'=>array('Temprelativehumidity.is_deleted'=>0,'Temprelativehumidity.status'=>1)),array('order'=>'Temprelativehumidity.id Desc','recursive'=>'2'));
            $this->set('rel_humidity',$rel_humidity);

            $tempform_data = $this->Tempformdata->find('first');
            $this->set('formdata',$tempform_data);

            $instrument_cal_status = array('1'=>'Faulty','2'=>'Calibration','3'=>'No Capability','4'=>'Return without cal','5'=>'Out of tolerance');
            $this->set('instrument_cal_status',$instrument_cal_status);
    }
    
    public function dummy_sup_approval()
    {
        $this->autoRender   =   false;
        $id = $this->request->data['id'];
        $get_desc = $this->Tempcertificate->find('first',array('conditions'=>array('Tempcertificate.certificate_no'=>$id),'recursive'=>'2'));
        $desc_id = $get_desc['Tempcertificate']['description_id'];
        //$data = $this->Description->find('first',array('conditions'=>array('Description.id'=>$desc_id)));
        $this->Description->updateAll(array('Description.engineer'=>1),array('Description.id'=>$desc_id));
        //pr($id);exit;
    }
    
    
    
    ///////////////////////////////////////////////////////  PDF  /////////////////////////////////////////////////
    
    function pdf($id = NULL) 
        {
        
            $this->autoRender = false;
            $tempcer_data = $this->Tempcertificate->find('first', array('conditions' => array('Tempcertificate.certificate_no' => $id),'recursive'=>2));
            $desc_id = $tempcer_data['Tempcertificate']['description_id'];
            $temperature = $tempcer_data['Tempcertificate']['temperature'];
            $relhum = $tempcer_data['Tempcertificate']['humidity'];
            $find_cert = $this->Tempcertificatedata->find('first',array('conditions'=>array('Tempcertificatedata.certificate_no'=>$tempcer_data['Tempcertificate']['certificate_no'])));
            //$this->set('cert',$find_cert);
            $ambient_data = $this->Tempambient->find('first', array('conditions' => array('Tempambient.id' => $temperature),'recursive'=>2));
            $relhum_data = $this->Temprelativehumidity->find('first', array('conditions' => array('Temprelativehumidity.id' => $relhum),'recursive'=>2));
            $desc_data = $this->Description->find('first', array('conditions' => array('Description.id' => $desc_id),'recursive'=>2));
            //pr($quotation_data);exit;
            $file_type = 'pdf';
            $filename = $tempcer_data['Tempcertificate']['certificate_no'];

           $html = '<html>
<head>
<meta charset="utf-8" />
<title>'.$tempcer_data['Tempcertificate']['certificate_no'].'</title>
<link href="http://fonts.googleapis.com/css?family=Oswald" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Oswald:300,700" rel="stylesheet" type="text/css">
<style>
table td { font-size:9px; line-height:11px; }
.table_format table { }
.table_format td { text-align:center; padding:5px; }
@page {
margin: 180px 50px;
}
#header { position: fixed; left: 0px; top: -150px; right: 0px; height: 30px; }
#footer { position: fixed; left: 0px; bottom: -180px; right: 0px; height: 70px; }
#footer .page:after { content: counter(page); }
</style>
</head>';
           

          
               
$html .=
'<body style="font-family:Oswald, sans-serif;font-size:11px;padding:0;margin:0;font-weight: 300; color:#444 !important;">
<div id="header">
<div style="width:100%;margin:10px 0"><img src="img/report_logo.png" width="100%"  alt="" /></div>
     </div>';
$html .='<div id="footer">
     <div style="width:100%;" class="page">
     
     </div>
</div>';

$html .= '<div id="content" style="">'; 
               
          $html .= ' <table cellpadding="0" cellspacing="0"  style="width:100%;margin-top:-40px;">
		        <tr>
				 <td width="30%" style="font-size:11px;color:#000 !important;padding:5px;">CERTIFICATE NO.</td>
				 <td width="10%" style="font-size:11px;color:#000 !important;padding:5px;">:</td>
				 <td width="60%" style="font-size:11px;padding:5px;">'.$tempcer_data['Tempcertificate']['certificate_no'].'</td>
				</tr>
				<tr>
				 <td width="30%" style="font-size:11px;color:#000 !important;padding:5px;">SALES ORDER NO.</td>
				 <td width="10%" style="font-size:11px;color:#000 !important;padding:5px;">:</td>
				 <td width="60%" style="font-size:11px;padding:5px;">'.$tempcer_data['Tempcertificate']['salesorder_id'].'</td>
				</tr>
				<tr>
				 <td width="30%" style="font-size:11px;color:#000 !important;padding:5px;">CUSTOMER</td>
				 <td width="10%" style="font-size:11px;color:#000 !important;padding:5px;">:</td>
				 <td width="60%" style="font-size:11px;padding:5px;">'.$desc_data['Customer']['customername'].'</td>
				</tr>
				<tr>
				 <td width="30%" style="font-size:11px;color:#000 !important;padding:5px;">INSTRUMENT</td>
				 <td width="10%" style="font-size:11px;color:#000 !important;padding:5px;">:</td>
				 <td width="60%" style="font-size:11px;padding:5px;">'.$desc_data['Instrument']['name'].'</td>
				</tr>
				
				<tr>
				 <td width="30%" style="font-size:11px;color:#000 !important;padding:5px;">MANUFACTURER</td>
				 <td width="10%" style="font-size:11px;color:#000 !important;padding:5px;">:</td>
				 <td width="60%" style="font-size:11px;padding:5px;">'.$desc_data['Brand']['brandname'].'</td>
				</tr>
				
				<tr>
				 <td width="30%" style="font-size:11px;color:#000 !important;padding:5px;">MODEL NO.</td>
				 <td width="10%" style="font-size:11px;color:#000 !important;padding:5px;">:</td>
				 <td width="60%" style="font-size:11px;padding:5px;">'.$desc_data['Description']['model_no'].'</td>
				</tr>
				
				<tr>
				 <td width="30%" style="font-size:11px;color:#000 !important;padding:5px;">SERIAL NO.</td>
				 <td width="10%" style="font-size:11px;color:#000 !important;padding:5px;">:</td>
				 <td width="60%" style="font-size:11px;padding:5px;"></td>
				</tr>
				
				<tr>
				 <td width="30%" style="font-size:11px;color:#000 !important;padding:5px;">RANGE</td>
				 <td width="10%" style="font-size:11px;color:#000 !important;padding:5px;">:</td>
				 <td width="60%" style="font-size:11px;padding:5px;">'.$desc_data['Range']['range_name'].'</td>
				</tr>
				
				<tr>
				 <td width="30%" style="font-size:11px;color:#000 !important;padding:5px;">TAG NO.</td>
				 <td width="10%" style="font-size:11px;color:#000 !important;padding:5px;">:</td>
				 <td width="60%" style="font-size:11px;padding:5px;"></td>
				</tr>
				
				<tr>
				 <td width="30%" style="font-size:11px;color:#000 !important;padding:5px;">DATE CALIBRATED</td>
				 <td width="10%" style="font-size:11px;color:#000 !important;padding:5px;">:</td>
				 <td width="60%" style="font-size:11px;padding:5px;">'.$tempcer_data['Tempcertificate']['date_calibrated'].'</td>
				</tr>
				
				<tr>
				 <td width="30%" style="font-size:11px;color:#000 !important;padding:5px;">RECOMMENDED DUE DATE</td>
				 <td width="10%" style="font-size:11px;color:#000 !important;padding:5px;">:</td>
				 <td width="60%" style="font-size:11px;padding:5px;">'.$tempcer_data['Tempcertificate']['due_date'].'</td>
				</tr>
				
				<tr>
				 <td width="30%" style="font-size:11px;color:#000 !important;padding:5px;">AMBIENT TEMPERATURE</td>
				 <td width="10%" style="font-size:11px;color:#000 !important;padding:5px;">:</td>
				 <td width="60%" style="font-size:11px;padding:5px;">'.$ambient_data['Tempambient']['ambientname'].'</td>
				</tr>
				
				<tr>
				 <td width="30%" style="font-size:11px;color:#000 !important;padding:5px;">RELATIVE HUMIDITY</td>
				 <td width="10%" style="font-size:11px;color:#000 !important;padding:5px;">:</td>
				 <td width="60%" style="font-size:11px;padding:5px;">'.$relhum_data['Temprelativehumidity']['relativehumidity'].'</td>
				</tr>
				
		  
		   </table>
		   <div style="margin-top:10px;">BS Tech´s organisation and practices have been duly accredited and are compliant to the requirements of ISO/IEC 17025; the laboratory accreditation standard. Our Quality Management System ensures its compatibility with the requirements of ISO 9001</div>
		   
		   <div style="margin-top:20px;">The reference measurement standards used are traceable to National Metrology Centre,(NMC,SINGAPORE) and/or other National standards.</div>
		    <div style="margin:15px 0;color:#000 !important;">MEASUREMENT TRACEABILITY</div>
		   <table cellpadding="0" cellspacing="0"  style="width:100%;text-align:center;border-left:1px solid #000;border-top:1px solid #000;">
		     <tr>
			  <td style="font-size:11px;color:#000 !important;padding:5px;border-right:1px solid #000;border-bottom:1px solid #000;">REFERENCE STANDARDS</td>
			  <td style="font-size:11px;color:#000 !important;padding:5px;border-right:1px solid #000;border-bottom:1px solid #000;">TAG NO.</td>
			  <td style="font-size:11px;color:#000 !important;padding:5px;border-right:1px solid #000;border-bottom:1px solid #000;">SERIAL NO.</td>
			  <td style="font-size:11px;color:#000 !important;padding:5px;border-right:1px solid #000;border-bottom:1px solid #000;">CAL DATE</td>
			  <td style="font-size:11px;color:#000 !important;padding:5px;border-right:1px solid #000;border-bottom:1px solid #000;">DUE DATE</td>
			 </tr>
			 
			    <tr>
			  <td style="font-size:11px;padding:5px;border-right:1px solid #000;border-bottom:1px solid #000;">STANDARD PLATINUM RESISTANCE
THERMOMETER</td>
			  <td style="font-size:11px;padding:5px;border-right:1px solid #000;border-bottom:1px solid #000;">BS 1328</td>
			  <td style="font-size:11px;padding:5px;border-right:1px solid #000;border-bottom:1px solid #000;">088</td>
			  <td style="font-size:11px;padding:5px;border-right:1px solid #000;border-bottom:1px solid #000;">28-Oct-2011</td>
			  <td style="font-size:11px;padding:5px;border-right:1px solid #000;border-bottom:1px solid #000;">28-Oct-2013</td>
			 </tr>
		   </table>
		   
		   <table style="margin-top:20px;width:100%;">
		    <tr>
                        <td style="color:#000 !important;padding:5px;">CALIBRATED BY :</td>
                        <td style="color:#000 !important;padding:5px;">APPROVED BY :</td>
                    </tr>
                    <tr>
                        <td style="padding:5px;text-align:center;">Krishnan</td>
                        <td style="padding:5px;text-align:center;">Krishnan</td>
                    </tr>
		   
		   </table>
		   
		   <div style="page-break-before: always;margin-top:-40px;width:100%;">
		    <table cellpadding="0" cellspacing="0"  style="width:100%;">
		        <tr>
				 <td width="30%" style="font-size:11px;color:#000 !important;padding:5px;">CERTIFICATE NO.</td>
				 <td width="10%" style="font-size:11px;color:#000 !important;padding:5px;">:</td>
				 <td width="60%" style="font-size:11px;padding:5px;">'.$tempcer_data['Tempcertificate']['certificate_no'].'</td>
				</tr>
			</table>
			
			<div style="margin-top:20px;color:#000 !important;">METHOD OF CALIBRATION</div>
			<div style="margin-top:10px;">* '.$tempcer_data['Tempcertificate']['methodofcal1'].'</div>
			<div style="margin-top:10px;">* '.$tempcer_data['Tempcertificate']['methodofcal2'].'</div>
			
			<div style="margin-top:20px;color:#000 !important;">RESULTS OF CALIBRATION</div>
			<div style="margin-top:10px;">* '.$tempcer_data['Tempcertificate']['resultofcal1'].'</div>
			<div style="margin-top:10px;">* '.$tempcer_data['Tempcertificate']['resultofcal2'].'</div>
			
			
			<div style="margin-top:20px;color:#000 !important;">REMARKS</div>
			<div style="margin-top:10px;">* '.$tempcer_data['Tempcertificate']['remark1'].'</div>
			<div style="margin-top:10px;">* '.$tempcer_data['Tempcertificate']['remark2'].'</div>
			<div style="margin-top:10px;">* '.$tempcer_data['Tempcertificate']['remark3'].'</div>
			<div style="margin-top:10px;">* '.$tempcer_data['Tempcertificate']['remark4'].'</div>
			<div style="margin-top:10px;">* '.$tempcer_data['Tempcertificate']['remark5'].'</div>
			
		   </div>
		   
		   <div style="page-break-before: always;margin-top:-40px;width:100%;">
		      <table cellpadding="0" cellspacing="0"  style="width:100%;">
		        <tr>
				 <td width="30%" style="font-size:11px;color:#000 !important;padding:5px;">CERTIFICATE NO.</td>
				 <td width="10%" style="font-size:11px;color:#000 !important;padding:5px;">:</td>
				 <td width="60%" style="font-size:11px;padding:5px;">'.$tempcer_data['Tempcertificate']['certificate_no'].'</td>
				</tr>
			</table>
			
		
<table cellpadding="0" cellspacing="0"  style="text-align:center;width:100%;margin-top:20px; border-left:1px solid #000; border-bottom:1px solid #000;border-top:1px solid #000;">
     <tr style="background:#ccc;">
          <td style="font-size:11px;color:#000 !important;padding:5px; border-right:1px solid #000;">ACTUAL </td>
          <td colspan="2" style="font-size:11px;color:#000 !important;padding:5px; border-right:1px solid #000;border-bottom:1px solid #000;">INSTRUMENT READING</td>
          <td style="font-size:11px;color:#000 !important;padding:5px;">CORRECTION</td>
          <td style="font-size:11px;color:#000 !important;padding:5px; border-right:1px solid #000;">EXPANDED </td>
     </tr>
     <tr style="background:#ccc;">
          <td style="font-size:11px;color:#000 !important;padding:5px; border-right:1px solid #000;border-bottom:1px solid #000;">READING</td>
          <td style="font-size:11px;color:#000 !important;padding:5px; border-right:1px solid #000;border-bottom:1px solid #000;">BEF ADJ</td>
          <td style="font-size:11px;color:#000 !important;padding:5px; border-right:1px solid #000;border-bottom:1px solid #000;">AFT ADJ</td>
          <td style="font-size:11px;color:#000 !important;padding:5px; border-bottom:1px solid #000;"></td>
          <td style="font-size:11px;color:#000 !important;padding:5px; border-right:1px solid #000;border-bottom:1px solid #000;">UNCERTAINTY</td>
     </tr>
     <tr style="background:#f1f1f1;">
          <td colspan="5" style="padding:5px;border-bottom:1px solid #000;border-right:1px solid #000;">°C</td>
     </tr>';
     $html .= '
     <tr>
          <td colspan="5" style="color:#000 !important;padding:5px;border-right:1px solid #000; text-align:left;">CHANNEL-1</td>
     </tr>
     <tr>
          <td style="padding:5px;">0.00</td>
          <td style="padding:5px;">-</td>
          <td style="padding:5px;">-</td>
          <td style="padding:5px;">-0.10</td>
          <td style="padding:5px;border-right:1px solid #000;">0.08</td>
     </tr>
     <tr>
          <td style="padding:5px;">100.10</td>
          <td style="padding:5px;">-</td>
          <td style="padding:5px;">-</td>
          <td style="padding:5px;">-0.10</td>
          <td style="padding:5px;border-right:1px solid #000;">0.08</td>
     </tr>
	  <tr>
          <td style="padding:5px;">200.30</td>
          <td style="padding:5px;">200.50</td>
          <td style="padding:5px;">-</td>
          <td style="padding:5px;">-0.20</td>
          <td style="padding:5px;border-right:1px solid #000;">0.08</td>
     </tr>
	 
	    <tr>
          <td colspan="5" style="color:#000 !important;padding:5px;border-right:1px solid #000; text-align:left;">CHANNEL-2</td>
     </tr>
     <tr>
          <td style="padding:5px;">0.00</td>
          <td style="padding:5px;">-</td>
          <td style="padding:5px;">-</td>
          <td style="padding:5px;">-0.10</td>
          <td style="padding:5px;border-right:1px solid #000;">0.08</td>
     </tr>
     <tr>
          <td style="padding:5px;">100.10</td>
          <td style="padding:5px;">-</td>
          <td style="padding:5px;">-</td>
          <td style="padding:5px;">-0.10</td>
          <td style="padding:5px;border-right:1px solid #000;">0.08</td>
     </tr>
	  <tr>
          <td style="padding:5px;">200.30</td>
          <td style="padding:5px;">200.50</td>
          <td style="padding:5px;">-</td>
          <td style="padding:5px;">-0.20</td>
          <td style="padding:5px;border-right:1px solid #000;">0.08</td>
     </tr>
	 
	    <tr>
          <td colspan="5" style="color:#000 !important;padding:5px;border-right:1px solid #000; text-align:left;">CHANNEL-3</td>
     </tr>
     <tr>
          <td style="padding:5px;">0.00</td>
          <td style="padding:5px;">-</td>
          <td style="padding:5px;">-</td>
          <td style="padding:5px;">-0.10</td>
          <td style="padding:5px;border-right:1px solid #000;">0.08</td>
     </tr>
     <tr>
          <td style="padding:5px;">100.10</td>
          <td style="padding:5px;">-</td>
          <td style="padding:5px;">-</td>
          <td style="padding:5px;">-0.10</td>
          <td style="padding:5px;border-right:1px solid #000;">0.08</td>
     </tr>
	  <tr>
          <td style="padding:5px;">200.30</td>
          <td style="padding:5px;">200.50</td>
          <td style="padding:5px;">-</td>
          <td style="padding:5px;">-0.20</td>
          <td style="padding:5px;border-right:1px solid #000;">0.08</td>
     </tr>
</table>

		   </div>
		   ';       

$html .= '</div>'; 
                //pr($html);exit;
        $this->export_report_all_format($file_type, $filename, $html);
    }
    function export_report_all_format($file_type, $filename, $html)
    {    
        
        if($file_type == 'pdf')
        {
    
            App::import('Vendor', 'dompdf', array('file' => 'dompdf' . DS . 'dompdf_config.inc.php'));
            $this->dompdf = new DOMPDF();        
            $papersize = "a4";
            $orientation = 'portrait';        
            $this->dompdf->load_html($html);
            $this->dompdf->set_paper($papersize, $orientation);        
            $this->dompdf->render();
            $this->dompdf->stream("Certificate-".$filename.".pdf");
            echo $this->dompdf->output();
           // $output = $this->dompdf->output();
            //file_put_contents($filename.'.pdf', $output);
            die();
            
        
        }    
        else if($file_type == 'xls')
        {    
            $file = $filename.".xls";
            header('Content-Type: text/html');
            header("Content-type: application/x-msexcel"); //tried adding  charset='utf-8' into header
            header("Content-Disposition: attachment; filename=$file");
            echo $html;
            
        }
        else if($file_type == 'doc')
        {                
            $file = $filename.".doc";
            header("Content-type: application/vnd.ms-word");
            header("Content-Disposition: attachment;Filename=$file");
            echo $html;
            
        }

        
    }
    
}

?>
