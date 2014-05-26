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
class SalesorderHelper extends AppHelper 
{
    public $uses    =   array('Salesorder','Description');
    
    public function query_checking($id = null)
    {
        APP::import('Model','Salesorder');
        $this->Salesorder   =   new Salesorder();
        $data_count = $this->Salesorder->find('all',array('contain'=>array("Description" => array("conditions" => array("Description.checking" => 1))) ,'conditions'=>array('Salesorder.is_approved'=>1,'Salesorder.id'=>$id),'group' => array('Salesorder.salesorderno')));
       // pr(count($data_count[0]['Description']));exit;
        return count($data_count[0]['Description']);
    }
    public function query_processing($id = null)
    {
        APP::import('Model','Salesorder');
        $this->Salesorder   =   new Salesorder();
        $data_count = $this->Salesorder->find('all',array('contain'=>array("Description" => array("conditions" => array("Description.processing" => 1))) ,'conditions'=>array('Salesorder.is_approved'=>1,'Salesorder.id'=>$id),'group' => array('Salesorder.salesorderno')));
       // pr(count($data_count[0]['Description']));exit;
        return count($data_count[0]['Description']);
    }
    public function query_total($id = null)
    {
        APP::import('Model','Salesorder');
        $this->Salesorder   =   new Salesorder();
        $data_count = $this->Salesorder->find('all',array('conditions'=>array('Salesorder.is_approved'=>1,'Salesorder.id'=>$id),'group' => array('Salesorder.salesorderno')));
       // pr(count($data_count[0]['Description']));exit;
        return count($data_count[0]['Description']);
    }
    
    public function query_pending($id = null)
    {
        APP::import('Model','Salesorder');
        $this->Salesorder   =   new Salesorder();
        $data_count_checking = $this->Salesorder->find('all',array('contain'=>array("Description" => array("conditions" => array("Description.checking" => 1))) ,'conditions'=>array('Salesorder.is_approved'=>1,'Salesorder.id'=>$id),'group' => array('Salesorder.salesorderno')));
        $data_count_processing = $this->Salesorder->find('all',array('contain'=>array("Description" => array("conditions" => array("Description.processing" => 1))) ,'conditions'=>array('Salesorder.is_approved'=>1,'Salesorder.id'=>$id),'group' => array('Salesorder.salesorderno')));
        $data_count_total = $this->Salesorder->find('all',array('conditions'=>array('Salesorder.is_approved'=>1,'Salesorder.id'=>$id),'group' => array('Salesorder.salesorderno')));
       // pr(count($data_count[0]['Description']));exit;
        $pending = count($data_count_total[0]['Description'])-(count($data_count_checking[0]['Description'])+count($data_count_processing[0]['Description']));
        return $pending;
    }
    
}