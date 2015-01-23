<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');
/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
    class AppController extends Controller 
    {
        public $components = array('Session');
        public $uses    =   array('Description','Random','branch','Device','Customerspecialneed','PreqDevice','OnsiteInstrument','DelDescription','PreqDevice');
        
        public function beforeFilter()
        {
            //echo $this->Session->read('Config.time');
            //$id = $this->Session->read('sess_userrole');
            $sess_username = $this->Session->read('sess_username');
            $sess_userid = $this->Session->read('sess_userid');
            if(isset($sess_username))
            {
                $this->set('username',$sess_username);
                $this->set('userid',$sess_userid);
            }
            else
            { 
                if(($this->params['controller']!='Logins'))  
                {
                    return $this->redirect(array('controller' => 'Logins','action'=>'index'));
                }
            }
            $this->set('control',$this->params['controller']);
            $this->set('actions',$this->params['action']);
            /************************************** User Role ****************************************************/
             $id = $this->Session->read('sess_userrole');//pr($id);
             $this->loadModel('Userrole');
             //$userrole = 0;
             $userrole =  $this->Userrole->findByUserRoleId($id); 
             if(!empty($userrole))
             {
             //pr($userrole['Userrole']['js_enc']);

             $ca = $userrole['Userrole']['js_enc'];
             $user_role = unserialize($ca);
             $this->set('user_role', $user_role);
             }
             /*****************************************************************************************************/
             //$this->random();
             $this->default_branch    =   $this->branch->find('first',array('conditions'=>array('branch.defaultbranch'=>1,'branch.status'=>1)));
            // $this->set('branch',$default_branch);
        }
//        public function afterFilter() {
//            $var_base =  Router::url(null, true);
//            echo $var_base;
//            $this->Session->write('sess_base', $var_base, array('defaults' => 'cake','timeout' => 28800 ));
//        }
        public function userrole_permission()
        {
            $id = $this->Session->read('sess_userrole');//pr($id);
            $this->loadModel('Userrole');
            //$userrole = 0;
            $userrole =  $this->Userrole->findByUserRoleId($id); 
            if(!empty($userrole))
            {
                //pr($userrole['Userrole']['js_enc']);
                $ca = $userrole['Userrole']['js_enc'];
                $user_role = unserialize($ca);
                $this->set('user_role', $user_role);
            }
            return $user_role;
        }
        public function saleDescription($id=NULL)
        {
            $devices    =   $this->Device->find('first',array('conditions'=>array('Device.id'=>$id,'Device.status'=>1)));
            $this->request->data['Description']['device_id']            =   $devices['Device']['id'];
            $this->request->data['Description']['order_by']            =   $devices['Device']['order_by'];
            $this->request->data['Description']['customer_id']          =   $devices['Device']['customer_id'];
            $this->request->data['Description']['instrument_id']        =   $devices['Device']['instrument_id'];
            $this->request->data['Description']['brand_id']             =   $devices['Device']['brand_id'];
            $this->request->data['Description']['sales_quantity']       =   $devices['Device']['quantity'];
            $this->request->data['Description']['model_no']             =   $devices['Device']['model_no'];
            $this->request->data['Description']['sales_range']          =   $devices['Device']['range'];
            $this->request->data['Description']['sales_calllocation']   =   $devices['Device']['call_location'];
            $this->request->data['Description']['sales_calltype']       =   $devices['Device']['call_type'];
            $this->request->data['Description']['sales_validity']       =   $devices['Device']['validity'];
            $this->request->data['Description']['sales_discount']       =   $devices['Device']['discount'];
            $this->request->data['Description']['department_id']        =   $devices['Device']['department_id'];
            $this->request->data['Description']['sales_unitprice']      =   $devices['Device']['unit_price'];
            $this->request->data['Description']['sales_accountservice'] =   $devices['Device']['account_service'];
            //$this->request->data['Description']['sales_titles']         =   $devices['Device']['title'];
            $this->request->data['Description']['sales_total']          =   $devices['Device']['total'];
            $this->request->data['Description']['quotation_id']         =   $devices['Device']['quotation_id'];
            $this->request->data['Description']['quotationno']          =   $devices['Quotation']['quotationno'];
            $this->request->data['Description']['title1_val']           =   $devices['Device']['title1_val'];
            $this->request->data['Description']['title2_val']           =   $devices['Device']['title2_val'];
            $this->request->data['Description']['title3_val']           =   $devices['Device']['title3_val'];
            $this->request->data['Description']['title4_val']           =   $devices['Device']['title4_val'];
            $this->request->data['Description']['title5_val']           =   $devices['Device']['title5_val'];
            $this->request->data['Description']['title6_val']           =   $devices['Device']['title6_val'];
            $this->request->data['Description']['title7_val']           =   $devices['Device']['title7_val'];
            $this->request->data['Description']['title8_val']           =   $devices['Device']['title8_val'];
            $this->request->data['Description']['status']               =   0;
            $this->request->data['Description']['is_approved']          =   0;
            return $this->request->data;
        }
        public function saleDescription_pending($id=NULL)
        {
            $devices    =   $this->Device->find('first',array('conditions'=>array('Device.id'=>$id,'Device.status'=>1)));
            $this->request->data['Description']['customer_id']          =   $devices['Device']['customer_id'];
            $this->request->data['Description']['instrument_id']        =   $devices['Device']['instrument_id'];
            $this->request->data['Description']['brand_id']             =   $devices['Device']['brand_id'];
            $this->request->data['Description']['sales_quantity']       =   $devices['Device']['quantity'];
            $this->request->data['Description']['model_no']             =   $devices['Device']['model_no'];
            $this->request->data['Description']['sales_range']          =   $devices['Device']['range'];
            $this->request->data['Description']['sales_calllocation']   =   $devices['Device']['call_location'];
            $this->request->data['Description']['sales_calltype']       =   $devices['Device']['call_type'];
            $this->request->data['Description']['sales_validity']       =   $devices['Device']['validity'];
            $this->request->data['Description']['sales_discount']       =   $devices['Device']['discount'];
            $this->request->data['Description']['department_id']        =   $devices['Device']['department_id'];
            $this->request->data['Description']['sales_unitprice']      =   $devices['Device']['unit_price'];
            $this->request->data['Description']['sales_accountservice'] =   $devices['Device']['account_service'];
            //$this->request->data['Description']['sales_titles']         =   $devices['Device']['title'];
            $this->request->data['Description']['sales_total']          =   $devices['Device']['total'];
            $this->request->data['Description']['quotation_id']         =   $devices['Device']['quotation_id'];
            $this->request->data['Description']['quotationno']          =   $devices['Quotation']['quotationno'];
            $this->request->data['Description']['title1_val']           =   $devices['Device']['title1_val'];
            $this->request->data['Description']['title2_val']           =   $devices['Device']['title2_val'];
            $this->request->data['Description']['title3_val']           =   $devices['Device']['title3_val'];
            $this->request->data['Description']['title4_val']           =   $devices['Device']['title4_val'];
            $this->request->data['Description']['title5_val']           =   $devices['Device']['title5_val'];
            $this->request->data['Description']['title6_val']           =   $devices['Device']['title6_val'];
            $this->request->data['Description']['title7_val']           =   $devices['Device']['title7_val'];
            $this->request->data['Description']['title8_val']           =   $devices['Device']['title8_val'];
            $this->request->data['Description']['status']               =   0;
            $this->request->data['Description']['is_approved']          =   0;
            return $this->request->data;
        }
        public function random($module)
        {
            switch ($module)
            {
                // Customer Random ID
                case 'customer':
                  $random = $this->Random->find('first');
                    $str = $random['Random']['customer'];
                    $i = 1;
                    $parts = explode('-', $str);
                    if($parts[2]==99999999)
                    {
                        $parts[2]=10000000;
                        $parts[1] += $parts[1];
                        $parts[1] = sprintf("%02d", $parts[1]);
                    }
                    else
                    {
                        $parts[2] += $i;
                        $parts[2] = sprintf("%06d", $parts[2]);
                    }
                    $str1 = implode('-', $parts);
                    //$this->Random->updateAll(array('Random.customer'=>'"'.$str1.'"'),array('Random.id'=>1));  
                break;
                //Customer Tag Id
                case 'tag':
                  $random = $this->Random->find('first');
                    $str = $random['Random']['tag'];
                    $i = 1;
                    $parts = explode('-', $str);
                    if($parts[2]==99999999)
                    {
                        $parts[2]=10000000;
                        $parts[1] += $parts[1];
                        $parts[1] = sprintf("%02d", $parts[1]);
                    }
                    else
                    {
                        $parts[2] += $i;
                        $parts[2] = sprintf("%06d", $parts[2]);
                    }
                    $str1 = implode('-', $parts);
                    //$this->Random->updateAll(array('Random.tag'=>'"'.$str1.'"'),array('Random.id'=>1));  
                break;
                //Customer Group Id
                case 'group':
                  $random = $this->Random->find('first');
                    $str = $random['Random']['group'];
                    $i = 1;
                    $parts = explode('-', $str);
                    if($parts[2]==99999999)
                    {
                        $parts[2]=10000000;
                        $parts[1] += $parts[1];
                        $parts[1] = sprintf("%02d", $parts[1]);
                    }
                    else
                    {
                        $parts[2] += $i;
                        $parts[2] = sprintf("%06d", $parts[2]);
                    }
                    $str1 = implode('-', $parts);
                    //$this->Random->updateAll(array('Random.group'=>'"'.$str1.'"'),array('Random.id'=>1));  
                break;
                // Instrument Random ID
                case 'instrument':
                  $random = $this->Random->find('first');
                    $str = $random['Random']['customer'];
                    $i = 1;
                    $parts = explode('-', $str);
                    if($parts[2]==99999999)
                    {
                        $parts[2]=10000000;
                        $parts[1] += $parts[1];
                        $parts[1] = sprintf("%02d", $parts[1]);
                    }
                    else
                    {
                        $parts[2] += $i;
                        $parts[2] = sprintf("%06d", $parts[2]);
                    }
                    $str1 = implode('-', $parts);
                    $this->Random->updateAll(array('Random.instrument'=>'"'.$str1.'"'),array('Random.id'=>1));  
                break;
                
                // Quotation Random ID
                case 'quotation':
                  $random = $this->Random->find('first');
                    $str = $random['Random']['quotation'];
                    $i = 1;
                    $parts = explode('-', $str);
                    if($parts[2]==99999999)
                    {
                        $parts[2]=10000000;
                        $parts[1] += $parts[1];
                        $parts[1] = sprintf("%02d", $parts[1]);
                    }
                    else
                    {
                        $parts[2] += $i;
                        $parts[2] = sprintf("%06d", $parts[2]);
                    }
                    $str1 = implode('-', $parts);
                    //$this->Random->updateAll(array('Random.quotation'=>'"'.$str1.'"'),array('Random.id'=>1));  
                break;
                
                // SalesOrder Random ID
                case 'salesorder':
                  $random = $this->Random->find('first');
                    $str = $random['Random']['salesorder'];
                    $i = 1;
                    $parts = explode('-', $str);
                    if($parts[2]==99999999)
                    {
                        $parts[2]=10000000;
                        $parts[1] += $parts[1];
                        $parts[1] = sprintf("%02d", $parts[1]);
                    }
                    else
                    {
                        $parts[2] += $i;
                        $parts[2] = sprintf("%06d", $parts[2]);
                    }
                    $str1 = implode('-', $parts);
                    //$this->Random->updateAll(array('Random.salesorder'=>'"'.$str1.'"'),array('Random.id'=>1));  
                break;
                
                // DeliveryOrder Random ID
                case 'deliveryorder':
                  $random = $this->Random->find('first');
                    $str = $random['Random']['deliveryorder'];
                    $i = 1;
                    $parts = explode('-', $str);
                    if($parts[2]==99999999)
                    {
                        $parts[2]=10000000;
                        $parts[1] += $parts[1];
                        $parts[1] = sprintf("%02d", $parts[1]);
                    }
                    else
                    {
                        $parts[2] += $i;
                        $parts[2] = sprintf("%06d", $parts[2]);
                    }
                    $str1 = implode('-', $parts);
                    //$this->Random->updateAll(array('Random.deliveryorder'=>'"'.$str1.'"'),array('Random.id'=>1));  
                break;
                 // Invoice Random ID
                case 'invoice':
                  $random = $this->Random->find('first');
                    $str = $random['Random']['invoice'];
                    $i = 1;
                    $parts = explode('-', $str);
                    if($parts[2]==99999999)
                    {
                        $parts[2]=10000000;
                        $parts[1] += $parts[1];
                        $parts[1] = sprintf("%02d", $parts[1]);
                    }
                    else
                    {
                        $parts[2] += $i;
                        $parts[2] = sprintf("%06d", $parts[2]);
                    }
                    $str1 = implode('-', $parts);
                    //$this->Random->updateAll(array('Random.customer'=>'"'.$str1.'"'),array('Random.id'=>1));  
                break;
                case 'clientpo':
                  $random = $this->Random->find('first');
                    $str = $random['Random']['clientpo'];
                    $i = 1;
                    $parts = explode('-', $str);
                    if($parts[2]==99999999)
                    {
                        $parts[2]=10000000;
                        $parts[1] += $parts[1];
                        $parts[1] = sprintf("%02d", $parts[1]);
                    }
                    else
                    {
                        $parts[2] += $i;
                        $parts[2] = sprintf("%06d", $parts[2]);
                    }
                    $str1 = implode('-', $parts);
                    $this->Random->updateAll(array('Random.Clientpo'=>'"'.$str1.'"'),array('Random.id'=>1));  
                break;
                case 'proforma':
                  $random = $this->Random->find('first');
                    $str = $random['Random']['proforma'];
                    $i = 1;
                    $parts = explode('-', $str);
                    if($parts[2]==99999999)
                    {
                        $parts[2]=10000000;
                        $parts[1] += $parts[1];
                        $parts[1] = sprintf("%02d", $parts[1]);
                    }
                    else
                    {
                        $parts[2] += $i;
                        $parts[2] = sprintf("%06d", $parts[2]);
                    }
                    $str1 = implode('-', $parts);
                    $this->Random->updateAll(array('Random.proforma'=>'"'.$str1.'"'),array('Random.id'=>1));  
                    break;
                case 'track':
                  $random = $this->Random->find('first');
                    $str = $random['Random']['track'];
                    $i = 1;
                    $parts = explode('-', $str);
                    if($parts[2]==99999999)
                    {
                        $parts[2]=10000000;
                        $parts[1] += $parts[1];
                        $parts[1] = sprintf("%02d", $parts[1]);
                    }
                    else
                    {
                        $parts[2] += $i;
                        $parts[2] = sprintf("%06d", $parts[2]);
                    }
                    $str1 = implode('-', $parts);
                    $this->Random->updateAll(array('Random.track'=>'"'.$str1.'"'),array('Random.id'=>1));  
                break;
                case 'PurchasRequisition':
                  $random = $this->Random->find('first');
                    $str = $random['Random']['PurchasRequisition'];
                    $i = 1;
                    $parts = explode('-', $str);
                    if($parts[2]==99999999)
                    {
                        $parts[2]=10000000;
                        $parts[1] += $parts[1];
                        $parts[1] = sprintf("%02d", $parts[1]);
                    }
                    else
                    {
                        $parts[2] += $i;
                        $parts[2] = sprintf("%06d", $parts[2]);
                    }
                    $str1 = implode('-', $parts);
                    $this->Random->updateAll(array('Random.PurchasRequisition'=>'"'.$str1.'"'),array('Random.id'=>1));  
                break;
                case 'pr_purchaseorder':
                  $random = $this->Random->find('first');
                    $str = $random['Random']['pr_purchaseorder'];
                    $i = 1;
                    $parts = explode('-', $str);
                    if($parts[2]==99999999)
                    {
                        $parts[2]=10000000;
                        $parts[1] += $parts[1];
                        $parts[1] = sprintf("%02d", $parts[1]);
                    }
                    else
                    {
                        $parts[2] += $i;
                        $parts[2] = sprintf("%06d", $parts[2]);
                    }
                    $str1 = implode('-', $parts);
                    $this->Random->updateAll(array('Random.pr_purchaseorder'=>'"'.$str1.'"'),array('Random.id'=>1));  
                break;
                case 'onsites':
                  $random = $this->Random->find('first');
                    $str = $random['Random']['onsites'];
                    $i = 1;
                    $parts = explode('-', $str);
                    if($parts[2]==99999999)
                    {
                        $parts[2]=10000000;
                        $parts[1] += $parts[1];
                        $parts[1] = sprintf("%02d", $parts[1]);
                    }
                    else
                    {
                        $parts[2] += $i;
                        $parts[2] = sprintf("%06d", $parts[2]);
                    }
                    $str1 = implode('-', $parts);
                    //$this->Random->updateAll(array('Random.onsites'=>'"'.$str1.'"'),array('Random.id'=>1));  
                break;
                case 'subcon':
                  $random = $this->Random->find('first');
                    $str = $random['Random']['subcon'];
                    $i = 1;
                    $parts = explode('-', $str);
                    if($parts[2]==99999999)
                    {
                        $parts[2]=10000000;
                        $parts[1] += $parts[1];
                        $parts[1] = sprintf("%02d", $parts[1]);
                    }
                    else
                    {
                        $parts[2] += $i;
                        $parts[2] = sprintf("%06d", $parts[2]);
                    }
                    $str1 = implode('-', $parts);
                    //$this->Random->updateAll(array('Random.onsites'=>'"'.$str1.'"'),array('Random.id'=>1));  
                break;
                case 'uncertain':
                  $random = $this->Random->find('first');
                    $str = $random['Random']['uncertain'];
                    $i = 1;
                    $parts = explode('-', $str);
                    if($parts[2]==99999999)
                    {
                        $parts[2]=10000000;
                        $parts[1] += $parts[1];
                        $parts[1] = sprintf("%02d", $parts[1]);
                    }
                    else
                    {
                        $parts[2] += $i;
                        $parts[2] = sprintf("%06d", $parts[2]);
                    }
                    $str1 = implode('-', $parts);
                    //$this->Random->updateAll(array('Random.onsites'=>'"'.$str1.'"'),array('Random.id'=>1));  
                break;
                case 'purchaseorders':
                  $random = $this->Random->find('first');
                    $str = $random['Random']['purchaseorders'];
                    $i = 1;
                    $parts = explode('-', $str);
                    if($parts[2]==99999999)
                    {
                        $parts[2]=10000000;
                        $parts[1] += $parts[1];
                        $parts[1] = sprintf("%02d", $parts[1]);
                    }
                    else
                    {
                        $parts[2] += $i;
                        $parts[2] = sprintf("%06d", $parts[2]);
                    }
                    $str1 = implode('-', $parts);
                    //$this->Random->updateAll(array('Random.onsites'=>'"'.$str1.'"'),array('Random.id'=>1));  
                break;
                case 'certificateno':
                    $random = $this->Random->find('first');
                    $str = $random['Random']['certificateno'];
                    //TS-0004-13
                    $i = 1;
                    $parts = explode('-', $str);
                    if($parts[1]==9999)
                    {
                        $parts[1]=0000;
                        $parts[2] += $parts[1];
                        $parts[2] = sprintf("%02d", $parts[2]);
                    }
                    else
                    {
                        $parts[1] += $i;
                        $parts[1] = sprintf("%04d", $parts[1]);
                    }
                    $str1 = implode('-', $parts);
                    //$this->Random->updateAll(array('Random.onsites'=>'"'.$str1.'"'),array('Random.id'=>1));  
                break;
            }
            return $str1;
        }
        public function delDescription($des_id=NULL,$del_id=NULL)
        {
            
            $devices    =   $this->Description->find('first',array('conditions'=>array('Description.id'=>$des_id,'Description.status'=>1,'Description.processing'=>1,'Description.checking'=>1)));
            
            if(!empty($devices)):
                $this->request->data['DelDescription']['deliveryorder_id']          =   $del_id;
                $this->request->data['DelDescription']['salesorder_id']             =   $devices['Description']['salesorder_id'];
                $this->request->data['DelDescription']['quotation_id']              =   $devices['Description']['quotation_id'];
                $this->request->data['DelDescription']['quotationno']               =   $devices['Description']['quotationno'];
                $this->request->data['DelDescription']['customer_id']               =   $devices['Description']['customer_id'];
                $this->request->data['DelDescription']['delivery_quantity']         =   $devices['Description']['sales_quantity'];
                $this->request->data['DelDescription']['instrument_id']             =   $devices['Description']['instrument_id'];
                $this->request->data['DelDescription']['model_no']                  =   $devices['Description']['model_no'];
                $this->request->data['DelDescription']['brand_id']                  =   $devices['Description']['brand_id'];
                $this->request->data['DelDescription']['delivery_range']            =   $devices['Description']['sales_range'];
                $this->request->data['DelDescription']['delivery_calllocation']     =   $devices['Description']['sales_calllocation'];
                $this->request->data['DelDescription']['delivery_calltype']         =   $devices['Description']['sales_calltype'];
                $this->request->data['DelDescription']['delivery_validity']         =   $devices['Description']['sales_validity'];
                $this->request->data['DelDescription']['delivery_unitprice']        =   $devices['Description']['sales_unitprice'];
                $this->request->data['DelDescription']['delivery_discount']         =   $devices['Description']['sales_discount'];
                $this->request->data['DelDescription']['department_id']             =   $devices['Description']['department_id'];
                $this->request->data['DelDescription']['delivery_accountservice']   =   $devices['Description']['sales_accountservice'];
                $this->request->data['DelDescription']['delivery_titles']           =   $devices['Description']['sales_titles'];
                $this->request->data['DelDescription']['delivery_total']           =   $devices['Description']['sales_total'];
                return $this->request->data;
            endif;
        }
         public function delDescription_partial($des_id=NULL,$del_id=NULL)
        {
            
            $devices    =   $this->Description->find('first',array('conditions'=>array('Description.id'=>$des_id,'Description.status'=>1,'Description.processing'=>1,'Description.checking'=>1,'Description.is_deliveryorder_created'=>0)));
            
            if(!empty($devices)):
                $this->request->data['DelDescription']['deliveryorder_id']          =   $del_id;
                $this->request->data['DelDescription']['order_by']                  =   $devices['Description']['order_by'];
                $this->request->data['DelDescription']['salesorder_id']             =   $devices['Description']['salesorder_id'];
                $this->request->data['DelDescription']['quotation_id']              =   $devices['Description']['quotation_id'];
                $this->request->data['DelDescription']['quotationno']               =   $devices['Description']['quotationno'];
                $this->request->data['DelDescription']['customer_id']               =   $devices['Description']['customer_id'];
                $this->request->data['DelDescription']['delivery_quantity']         =   $devices['Description']['sales_quantity'];
                $this->request->data['DelDescription']['instrument_id']             =   $devices['Description']['instrument_id'];
                $this->request->data['DelDescription']['model_no']                  =   $devices['Description']['model_no'];
                $this->request->data['DelDescription']['brand_id']                  =   $devices['Description']['brand_id'];
                $this->request->data['DelDescription']['delivery_range']            =   $devices['Description']['sales_range'];
                $this->request->data['DelDescription']['delivery_calllocation']     =   $devices['Description']['sales_calllocation'];
                $this->request->data['DelDescription']['delivery_calltype']         =   $devices['Description']['sales_calltype'];
                $this->request->data['DelDescription']['delivery_validity']         =   $devices['Description']['sales_validity'];
                $this->request->data['DelDescription']['delivery_unitprice']        =   $devices['Description']['sales_unitprice'];
                $this->request->data['DelDescription']['delivery_discount']         =   $devices['Description']['sales_discount'];
                $this->request->data['DelDescription']['department_id']             =   $devices['Description']['department_id'];
                $this->request->data['DelDescription']['delivery_accountservice']   =   $devices['Description']['sales_accountservice'];
                $this->request->data['DelDescription']['delivery_titles']           =   $devices['Description']['sales_titles'];
                $this->request->data['DelDescription']['delivery_total']           =   $devices['Description']['sales_total'];
                return $this->request->data;
            endif;
        }
        public function ready_to_deliver($delivery_order_id=NULL,$assign_to=NULL,$cd_date=NULL,$assign_value=NULL)
        {
            $default_branch    =   $this->branch->find('first',array('conditions'=>array('branch.defaultbranch'=>1,'branch.status'=>1)));
            $order_data     =   $this->Deliveryorder->find('first',array('conditions'=>array('Deliveryorder.id'=>$delivery_order_id,'Deliveryorder.status'=>1,'Deliveryorder.is_deleted'=>0)));
            $this->request->data['ReadytodeliverItem']['cd_date']          =   $cd_date;
            $this->request->data['ReadytodeliverItem']['branch_id']        =   $default_branch['branch']['id'];
            $this->request->data['ReadytodeliverItem']['customer_id']      =   $order_data['Deliveryorder']['customer_id'];
            $this->request->data['ReadytodeliverItem']['quotation_id']     =   $order_data['Salesorder']['quotation_id'];
            $this->request->data['ReadytodeliverItem']['quotationno']      =   $order_data['Salesorder']['quotationno'];
            $this->request->data['ReadytodeliverItem']['salesorder_id']    =   $order_data['Salesorder']['id'];
            $this->request->data['ReadytodeliverItem']['salesorderno']     =   $order_data['Salesorder']['salesorderno'];
            $this->request->data['ReadytodeliverItem']['deliveryorder_id'] =   $order_data['Deliveryorder']['id'];
            $this->request->data['ReadytodeliverItem']['deliveryorderno']  =   $order_data['Deliveryorder']['delivery_order_no'];
            $this->request->data['ReadytodeliverItem']['assign_to']        =   $assign_value;
            $this->request->data['ReadytodeliverItem']['status']           =   1;
            $this->request->data['ReadytodeliverItem']['is_deleted']       =   0;
            return $this->request->data;
        }
         public function ready_to_deliver_tag($delivery_order_id=NULL,$assign_to=NULL,$cd_date=NULL,$assign_value=NULL)
        {
            $default_branch    =   $this->branch->find('first',array('conditions'=>array('branch.defaultbranch'=>1,'branch.status'=>1)));
            $order_data     =   $this->Deliveryorder->find('first',array('conditions'=>array('Deliveryorder.id'=>$delivery_order_id,'Deliveryorder.status'=>1,'Deliveryorder.is_deleted'=>0)));
            $cus = $this->Customer->find('first',array('conditions'=>array('Customer.id'=>$order_data['Deliveryorder']['customer_id'],'Customer.status'=>1,'Customer.is_deleted'=>0,'Customer.is_approved'=>1)));
            //$order_data['Deliveryorder']['customer_id'];
            $this->request->data['Candd']['purpose']                    =   'Delivery';
            $this->request->data['Candd']['branch_id']                  =   $default_branch['branch']['id'];
            $this->request->data['Candd']['customer_id']                =   $order_data['Deliveryorder']['customer_id'];
            $this->request->data['Candd']['customername']               =   $cus['Customer']['customername'];
            $this->request->data['Candd']['Contactpersoninfo_id']       =   $order_data['Deliveryorder']['attn'];
            $this->request->data['Candd']['assign_id']                  =   $assign_value;
            $this->request->data['Candd']['customer_address']           =   $order_data['Deliveryorder']['customer_address'];
            //$this->request->data['Candd']['address_id']                 =   $cd_date;
            $this->request->data['Candd']['phone']                      =   $order_data['Deliveryorder']['phone'];
            $this->request->data['Candd']['remarks']                    =   '';
            $this->request->data['Candd']['cd_date']                    =   $cd_date;
            $this->request->data['Candd']['status']                     =   1;
            $this->request->data['Candd']['is_deleted']                 =   0;
            return $this->request->data;
        }
        public function  description_update_shipping($deliveryorder_id  =NULL)
        {
            $salesorder_id  =   $this->Deliveryorder->find('first',array('conditions'=>array('Deliveryorder.id'=>$deliveryorder_id),'fields'=>array('salesorder_id')));
            $this->Description->updateAll(array('Description.shipping'=>1),array('Description.salesorder_id'=>$salesorder_id['Deliveryorder']['salesorder_id']));
        }
        public function create_automatic_quotation($sales_id=NULL)
        {
           $create_quotation_from_salesorder_details = $this->Salesorder->find('first',array('conditions'=>array('Salesorder.id'=>$sales_id,'Salesorder.is_deleted'=>0),'recursive'=>3));
           unset($create_quotation_from_salesorder_details['Salesorder']['id']);
           
           $form_quotation_array['Quotation']       =   $create_quotation_from_salesorder_details['Salesorder'];
           $form_quotation_array['Quotation']['instrument_type_id']=$create_quotation_from_salesorder_details['Salesorder']['instrument_type_id'];
           $form_quotation_array['Quotation']['quotation_id']=$sales_id;
           $form_quotation_array['Quotation']['salesorder_created']=1;
           unset($create_quotation_from_salesorder_details['Salesorder']['instrument_type_id']);
           if($this->Quotation->save($form_quotation_array['Quotation']))
           {
                $last_quotation_id  =   $this->Quotation->getLastInsertID();
                //For Salesorder Quotation id Update
                $this->Salesorder->updateAll(array('Salesorder.quotation_id'=>$last_quotation_id),array('Salesorder.id'=>$sales_id));
                //For Salesorder Description Quotation id Update
                $this->Description->updateAll(array('Description.quotation_id'=>$last_quotation_id),array('Description.salesorder_id'=>$sales_id));
                $form_quotation_array['Customerspecialneed']['quotation_id']=$last_quotation_id;
                $form_quotation_array['Customerspecialneed']['remarks']=$create_quotation_from_salesorder_details['Salesorder']['remarks'];
                $form_quotation_array['Customerspecialneed']['service_id']=$create_quotation_from_salesorder_details['Salesorder']['service_id'];
                $this->Customerspecialneed->save($form_quotation_array['Customerspecialneed']);
                $descriptions =    $create_quotation_from_salesorder_details['Description'];
                if(!empty($descriptions)):
                  foreach($descriptions as $description):
                    $this->Device->create();
                    $this->request->data['Device']['quotationno']   =   $create_quotation_from_salesorder_details['Salesorder']['quotationno'];
                    $this->request->data['Device']['customer_id']   =   $create_quotation_from_salesorder_details['Salesorder']['customer_id'];
                    $this->request->data['Device']['quotation_id']  =   $last_quotation_id;
                    $this->request->data['Device']['instrument_id'] =   $description['instrument_id'];
                    $this->request->data['Device']['brand_id']      =   $description['brand_id'];
                    $this->request->data['Device']['description_id']=   $description['id'];
                    $this->request->data['Device']['order_by']      =   $description['order_by'];
                    $this->request->data['Device']['quantity']      =   $description['sales_quantity'];
                    $this->request->data['Device']['model_no']      =   $description['model_no'];
                    $this->request->data['Device']['range']         =   $description['sales_range'];
                    $this->request->data['Device']['call_location'] =   $description['sales_calllocation'];
                    $this->request->data['Device']['call_type']     =   $description['sales_calltype'];
                    $this->request->data['Device']['validity']      =   $description['sales_validity'];
                    $this->request->data['Device']['discount']      =   $description['sales_discount'];
                    $this->request->data['Device']['department_id'] =   $description['department_id'];
                    $this->request->data['Device']['unit_price']    =   $description['sales_unitprice'];
                    $this->request->data['Device']['account_service']=  $description['sales_accountservice'];
                    $this->request->data['Device']['total']         =   $description['sales_total'];
                    $this->request->data['Device']['title']         =   $description['sales_titles'];
                    $this->request->data['Device']['title1_val']    =   $description['title1_val'];
                    $this->request->data['Device']['title2_val']    =   $description['title2_val'];
                    $this->request->data['Device']['title3_val']    =   $description['title3_val'];
                    $this->request->data['Device']['title4_val']    =   $description['title4_val'];
                    $this->request->data['Device']['title5_val']    =   $description['title5_val'];
                    $this->request->data['Device']['title6_val']    =   $description['title6_val'];
                    $this->request->data['Device']['title7_val']    =   $description['title7_val'];
                    $this->request->data['Device']['title8_val']    =   $description['title8_val'];
                    $this->request->data['Device']['status']        =  1;
                    $this->Device->save($this->request->data['Device']);
                    $last_device_id  =   $this->Device->getLastInsertID();
                    $this->Description->updateAll(array('Description.device_id'=>$last_device_id),array('Description.id'=>$description['id']));
                    
                  endforeach;
              endif;
              
           }
           return $last_quotation_id;
        }
        public function getLastQuery($model)
        {
            $dbo = $model->getDatasource();
            $logData = $dbo->getLog();
            $getLog = end($logData['log']);
            echo $getLog['query'];
        }
         public function get_solist_calllocation_details($solist=NULL,$call_location=NULL,$id=NULL){
            
             switch($solist)
             {
                case 'run':
                //pr($calllocation_id);
                if($call_location=='all'){
                        $data_description = $this->Description->find('all', array('conditions' => array('Description.is_approved' => 1, 'Description.salesorder_id' => $id,'Description.is_deleted'=>0)));
                        return $data_description;
                   } else{
                        $data_description = $this->Description->find('all', array('conditions' => array('Description.is_approved' => 1, 'Description.salesorder_id' => $id,'Description.is_deleted'=>0)));
                        return $data_description;
                   }
                    break;
                    //pr($labprocess);exit;
                    case 'out':
                    if($call_location=='all'):
                            $data_description = $this->Description->find('all', array('conditions' => array('Description.is_approved' => 1, 'Description.salesorder_id' => $id,'Description.is_deleted'=>0)));
                            return $data_description;
                            else:
                            $data_description = $this->Description->find('all', array('conditions' => array('Description.is_approved' => 1, 'Description.salesorder_id' => $id,'Description.sales_calllocation'=>$call_location,'Description.is_deleted'=>0)));
                            return $data_description;
                    endif;
                    //pr($labprocess);exit;
                    break;
                    case 'overdue': 
                         if($call_location=='all'):
                            $data_description = $this->Description->find('all', array('conditions' => array('Description.is_approved' => 1, 'Description.salesorder_id' => $id,'Description.is_deleted'=>0)));
                                return $data_description;
                        else:
                            $data_description = $this->Description->find('all', array('conditions' => array('Description.is_approved' => 1, 'Description.salesorder_id' => $id,'Description.is_deleted'=>0)));
                                return $data_description;
                    endif;
                    //pr($labprocess);exit;
                     break;
              }
        }
        //For Purchase order requistion based data creation
        public function preq_devices($id=NULL)
        {
            if($id){
                //echo $id; 
            $devices    =   $this->PreqDevice->find('first',array('conditions'=>array('PreqDevice.id'=>$id,'PreqDevice.status'=>1)));
            //pr($devices);exit;
            
            $this->request->data['ReqDevice']['customer_id']        =   $devices['PreqDevice']['customer_id'];
            $this->request->data['ReqDevice']['instrument_name']    =   $devices['PreqDevice']['instrument_name'];
            //$this->request->data['ReqDevice']['brand_id']           =   $devices['PreqDevice']['prequistionno'];
            $this->request->data['ReqDevice']['prequistionno']      =   $devices['PreqDevice']['prequistionno'];
            
            $this->request->data['ReqDevice']['brand_name']           =   $devices['PreqDevice']['brand_name'];
            $this->request->data['ReqDevice']['quantity']           =   $devices['PreqDevice']['quantity'];
            $this->request->data['ReqDevice']['model_no']           =   $devices['PreqDevice']['model_no'];
            $this->request->data['ReqDevice']['range']              =   $devices['PreqDevice']['range'];
            $this->request->data['ReqDevice']['validity']           =   $devices['PreqDevice']['validity'];
            $this->request->data['ReqDevice']['discount']           =   $devices['PreqDevice']['device_discount'];
            $this->request->data['ReqDevice']['department_name']    =   $devices['PreqDevice']['department_name'];
            $this->request->data['ReqDevice']['unit_price']         =   $devices['PreqDevice']['unit_price'];
            $this->request->data['ReqDevice']['account_service']    =   $devices['PreqDevice']['account_service'];
            $this->request->data['ReqDevice']['title']              =   $devices['PreqDevice']['title'];
            $this->request->data['ReqDevice']['total']              =   $devices['PreqDevice']['total'];
            $this->request->data['ReqDevice']['status']             =   1;
            $this->request->data['ReqDevice']['is_approved']        =   0;
            return $this->request->data;
            }
        }
         public function add_onsite_instruments($data=NULL,$quotation_id=NULL)
        {
            $device_count   =   count($data);
            $onsite_count   =   $this->OnsiteInstrument->find('count',array('OnsiteInstrument.quotationno'=>$quotation_id,'OnsiteInstrument.status'=>0,'OnsiteInstrument.is_deleted'=>0));
            if($onsite_count!=$device_count):
            foreach($data as $onsite_ins):
                $this->OnsiteInstrument->create();
                $this->request->data['OnsiteInstrument']['quotation_id']            =   $onsite_ins['Device']['quotation_id'];
                $this->request->data['OnsiteInstrument']['quotationno']             =   $onsite_ins['Device']['quotationno'];
                $this->request->data['OnsiteInstrument']['customer_id']             =   $onsite_ins['Device']['customer_id'];
                $this->request->data['OnsiteInstrument']['onsite_quantity']         =   $device_count;
                $this->request->data['OnsiteInstrument']['instrument_id']           =   $onsite_ins['Device']['instrument_id'];
                $this->request->data['OnsiteInstrument']['model_no']                =   $onsite_ins['Device']['model_no'];
                $this->request->data['OnsiteInstrument']['brand_id']                =   $onsite_ins['Device']['brand_id'];
                $this->request->data['OnsiteInstrument']['onsite_range']            =   $onsite_ins['Device']['range'];
                $this->request->data['OnsiteInstrument']['onsite_calllocation']     =   $onsite_ins['Device']['call_location'];
                $this->request->data['OnsiteInstrument']['onsite_calltype']         =   $onsite_ins['Device']['call_type'];
                $this->request->data['OnsiteInstrument']['onsite_validity']         =   $onsite_ins['Device']['validity'];
                $this->request->data['OnsiteInstrument']['onsite_discount']         =   $onsite_ins['Device']['discount'];
                $this->request->data['OnsiteInstrument']['department']              =   $onsite_ins['Department']['departmentname'];
                $this->request->data['OnsiteInstrument']['onsite_accountservice']   =   $onsite_ins['Device']['account_service'];
                $this->request->data['OnsiteInstrument']['onsite_unitprice']        =   $onsite_ins['Device']['unit_price'];
                $this->request->data['OnsiteInstrument']['onsite_titles']           =   $onsite_ins['Device']['title'];
                $this->request->data['OnsiteInstrument']['onsite_total']            =   $onsite_ins['Device']['total'];
                $this->request->data['OnsiteInstrument']['status']                  =   0;
                $this->OnsiteInstrument->save($this->request->data['OnsiteInstrument']);
            endforeach;
        endif;
        }
         
        public function device_id_session($data)
        {
            $sess_dev = $this->Session->read($data);
            if(isset($sess_dev)):
                $data1 = 0;
                //if(isset($sess_dev)):
                $data1 = $sess_dev + 1;
                //endif
                $ses_dev = $this->Session->write($data, $data1, array('defaults' => 'cake','timeout' => 14400 ));
            endif;
            if(!isset($sess_dev)):
                $data1 = 1;
                $ses_dev = $this->Session->write($data, $data1, array('defaults' => 'cake','timeout' => 14400 ));
            endif;
            return $data1;
        }
        
        
        
        
        public function device_id_session_logout($data)
        {
            $this->Session->delete($data);
        }
        public function unit_symbol($id = null)
        {
            APP::import('Model','Tempunit');
            $this->Tempunit   =   new Tempunit();
            $unit_data = $this->Tempunit->find('first',array('conditions'=>array('Tempunit.id'=>$id)));
            return $unit_data['Tempunit']['unitname'];
        }
}
