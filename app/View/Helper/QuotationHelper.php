<?php
/**
 * Application level View Helper
 *
 * This file is application-wide helper file. You can put all
 * application-wide helper-related methods here.
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
 * @package       app.View.Helper
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Helper', 'View');

/**
 * Application helper
 *
 * Add your application-wide methods in the class below, your helpers
 * will inherit them.
 *
 * @package       app.View.Helper
 */
class QuotationHelper extends AppHelper 
{
    public $uses    =   array('Quotation','Device');
    public function quotationtotal($id = null)
    {
        APP::import('Model','Device');
        $this->Device   =   new Device();
        $data = $this->Device->find('all',array('conditions'=>array('Device.quotationno'=>$id)));
        $arr = array();
        $arr_total = 0;
        foreach($data as $data1)
        {
            $arr = $data1['Device']['total'];
            $arr_total = $arr_total + $data1['Device']['total'];
        }
        //$id1 = implode(',',$arr);
        //$arra = array_sum($arr);
        return '$'.$arr_total;
    }
    public function salespersonname($id = null)
    {
        APP::import('Model','Customerspecialneed');
        $this->Customerspecialneed   =   new Customerspecialneed();
        $data = $this->Customerspecialneed->find('first',array('conditions'=>array('Customerspecialneed.quotation_id'=>$id)));
        return $data['Customerspecialneed']['salesperson_name'];
    }
    public function contactname($id = null)
    {
        APP::import('Model','Contactpersoninfo');
        $this->Contactpersoninfo   =   new Contactpersoninfo();
        $data = $this->Contactpersoninfo->find('first',array('conditions'=>array('Contactpersoninfo.id'=>$id)));
        return $data['Contactpersoninfo']['name'];
    }
    public function branchname($id = null)
    {
        APP::import('Model','Branch');
        $this->Branch   =   new Branch();
        $data = $this->Branch->find('first',array('conditions'=>array('Branch.id'=>$id)));
        return $data['Branch']['branchname'];
    }
}