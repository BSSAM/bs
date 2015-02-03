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
class TempHelper extends AppHelper 
{
    public $uses    =   array('Salesorder','Description','Quotation','Temptemplate','Temptemplatedata','Tempinstrument','Tempambient'
							 ,'Tempother','Temprange','Temprelativehumidity','Tempreadingtype','Tempchannel','Tempinstrumentvalid','Tempunit','Tempunitconvert',
							    'Tempformdata','Tempuncertainty','Tempuncertaintydata','Customer','Instrument','Range','Brand');
    
    public function uncertainity_name($id = null)
    {
        APP::import('Model','Tempuncertainty');
        $this->Tempuncertainty   =   new Tempuncertainty();
        $id1 = array();
        $id1 = explode(',',$id);
        $data1 = array();
        foreach($id1 as $ids)
        {
            $data = $this->Tempuncertainty->find('first',array('conditions'=>array('Tempuncertainty.id'=>$ids)));
            $data1[] = $data['Tempuncertainty']['totalname'];
        }
        $data2 = implode(',',$data1);
        return $data2;
    }
    public function get_instrument_name($id = null)
    {
        APP::import('Model','Description');
        $this->Description   =   new Description();
        $data = $this->Description->find('first',array('conditions'=>array('Description.instrument_id'=>$id)));
        //pr($data);
        return $data['Instrument']['name'];
    }
    public function get_range_name($id = null)
    {
        APP::import('Model','Description');
        $this->Description   =   new Description();
        $data = $this->Description->find('first',array('conditions'=>array('Description.sales_range'=>$id)));
        return $data['Range']['range_name'];
    }
    public function get_brand_name($id = null)
    {
        APP::import('Model','Description');
        $this->Description   =   new Description();
        $data = $this->Description->find('first',array('conditions'=>array('Description.brand_id'=>$id)));
        return $data['Brand']['brandname'];
    }
    public function get_customer_name($id = null)
    {
        APP::import('Model','Customer');
        $this->Customer   =   new Customer();
        $data = $this->Customer->find('first',array('conditions'=>array('Customer.id'=>$id)));
        return $data['Customer']['customername'];
    }
    public function inst_valid($id = null)
    {
        APP::import('Model','Tempuncertainty');
        $this->Tempuncertainty   =   new Tempuncertainty();
        $data = $this->Tempuncertainty->find('first',array('conditions'=>array('Tempuncertainty.id'=>$id)));
        $date1 = new DateTime($data['Tempuncertainty']['duedate']);
        $date2 = new DateTime($data['Tempuncertainty']['caldate']);
        $interval = $date1->diff($date2);
        return $interval->days;;
    }
    public function get_certificate_no($id = null)
    {
        APP::import('Model','Customer');
        $this->Tempcertificate   =   new Tempcertificate();
        $data = $this->Tempcertificate->find('first',array('conditions'=>array('Tempcertificate.description_id'=>$id)));
        return $data['Tempcertificate']['certificate_no'];
    }
    public function get_calibrated_date($id = null)
    {
        APP::import('Model','Customer');
        $this->Tempcertificate   =   new Tempcertificate();
        $data = $this->Tempcertificate->find('first',array('conditions'=>array('Tempcertificate.description_id'=>$id)));
        return $data['Tempcertificate']['date_calibrated'];
    }
    public function get_due_date($id = null)
    {
        APP::import('Model','Customer');
        $this->Tempcertificate   =   new Tempcertificate();
        $data = $this->Tempcertificate->find('first',array('conditions'=>array('Tempcertificate.description_id'=>$id)));
        return $data['Tempcertificate']['due_date'];
    }
}


?>