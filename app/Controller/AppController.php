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
        public $uses    =   array('Description','Random');
        public function beforeFilter()
        {
                
            $sess_username = $this->Session->read('sess_username');
            if(isset($sess_username))
            {
                $this->set('username',$sess_username);
            }
            else
            { 
                if(($this->params['controller']!='Logins'))  
                {
                    return $this->redirect(array('controller' => 'Logins','action'=>'index'));
                }
            }
            $this->set('control',$this->params['controller']);
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
        }
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
            $this->request->data['Description']['sales_titles']         =   $devices['Device']['title'];
            $this->request->data['Description']['sales_total']          =   $devices['Device']['total'];
            $this->request->data['Description']['quotation_id']         =   $devices['Device']['quotation_id'];
            $this->request->data['Description']['quotationno']          =   $devices['Quotation']['quotationno'];
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
                    }
                    $str1 = implode('-', $parts);
                    $this->Random->updateAll(array('Random.customer'=>'"'.$str1.'"'),array('Random.id'=>1));  
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
                    }
                    $str1 = implode('-', $parts);
                    $this->Random->updateAll(array('Random.tag'=>'"'.$str1.'"'),array('Random.id'=>1));  
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
                    }
                    $str1 = implode('-', $parts);
                    $this->Random->updateAll(array('Random.group'=>'"'.$str1.'"'),array('Random.id'=>1));  
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
                    }
                    $str1 = implode('-', $parts);
                    $this->Random->updateAll(array('Random.customer'=>'"'.$str1.'"'),array('Random.id'=>1));  
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
                    }
                    $str1 = implode('-', $parts);
                    $this->Random->updateAll(array('Random.quotation'=>'"'.$str1.'"'),array('Random.id'=>1));  
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
                    }
                    $str1 = implode('-', $parts);
                    $this->Random->updateAll(array('Random.salesorder'=>'"'.$str1.'"'),array('Random.id'=>1));  
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
                    }
                    $str1 = implode('-', $parts);
                    $this->Random->updateAll(array('Random.deliveryorder'=>'"'.$str1.'"'),array('Random.id'=>1));  
                break;
                
                 // Invoice Random ID
                case 'invoice':
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
                    }
                    $str1 = implode('-', $parts);
                    $this->Random->updateAll(array('Random.customer'=>'"'.$str1.'"'),array('Random.id'=>1));  
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
                    }
                    $str1 = implode('-', $parts);
                    $this->Random->updateAll(array('Random.track'=>'"'.$str1.'"'),array('Random.id'=>1));  
                break;
            }
            return $str1;
        }
        public function delDescription($des_id=NULL,$del_id=NULL)
        {
            
            $devices    =   $this->Description->find('first',array('conditions'=>array('Description.id'=>$des_id,'Description.status'=>1,'Description.processing'=>1,'Description.checking'=>1)));
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
        }
}
