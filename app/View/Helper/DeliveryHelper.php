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
class DeliveryHelper extends AppHelper 
{
    public $uses    =   array('Deliveryorder','Salesorder','Priority');
    
    public function find_salesorder($id = null)
    {
        APP::import('Model','Salesorder');
        $this->Salesorder   =   new Salesorder();
        //$id1 = implode(',',$id);
        $sales = $this->Salesorder->find('all',array('conditions'=>array('Salesorder.ref_no'=>$id)));
        $sa = '';
        foreach($sales as $sales1):
            $sa[] = $sales1['Salesorder']['id'];
        endforeach;
        $id1 = implode(',',$sa);
      
             return $id1;
        //}
       // pr(count($data_count[0]['Description']));exit;
       
    }
    public function find_deliveryorder($id = null)
    {
       APP::import('Model','Deliveryorder');
        $this->Deliveryorder   =   new Deliveryorder();
        //$id1 = implode(',',$id);
        $sales = $this->Deliveryorder->find('all',array('conditions'=>array('Deliveryorder.ref_no'=>$id)));
        $sa = '';
        foreach($sales as $sales1):
            $sa[] = $sales1['Deliveryorder']['delivery_order_no'];
        endforeach;
        $id1 = implode(',',$sa);
      
             return $id1;
    }
    public function find_quotation($id = null)
    {
       APP::import('Model','Quotation');
        $this->Quotation   =   new Quotation();
        //$id1 = implode(',',$id);
        $sales = $this->Quotation->find('all',array('conditions'=>array('Quotation.ref_no'=>$id)));
        $sa = '';
        foreach($sales as $sales1):
            $sa[] = $sales1['Quotation']['quotationno'];
        endforeach;
        $id1 = implode(',',$sa);
      
             return $id1;
    }
    
    
    
}