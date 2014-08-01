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
class CanddHelper extends AppHelper 
{

    public function get_customer_deliver_address($customer_id=NULL)
    {
        APP::import('Model','Address');
        $this->Address  =   new Address();
        $delivery_address    =    $this->Address->find('first',array('conditions'=>array('Address.customer_id'=>$customer_id,'Address.type'=>'delivery')));
        if(!empty($delivery_address))
        {
            return $delivery_address['Address']['address'];
        }
    }
    public function get_delivery_order_no($salesorder_id=NULL)
    {
        APP::import('Model','Deliveryorder');
        $this->Deliveryorder  =   new Deliveryorder();
        $delivery_orders    =    $this->Deliveryorder->find('first',array('conditions'=>array('Deliveryorder.salesorder_id'=>$salesorder_id)));
        
        if(!empty($delivery_orders))
        {
            return $delivery_orders['Deliveryorder']['delivery_order_no'];
        }
    }
    public function get_delivery_order_date($salesorder_id=NULL)
    {
        APP::import('Model','Deliveryorder');
        $this->Deliveryorder  =   new Deliveryorder();
        $delivery_orders    =    $this->Deliveryorder->find('first',array('conditions'=>array('Deliveryorder.salesorder_id'=>$salesorder_id)));
        if(!empty($delivery_orders))
        {
            return $delivery_orders['Deliveryorder']['delivery_order_date'];
        }
    }
    public function get_task($cd_date=NULL)
    {
        APP::import('Model','ReadytodeliverItem');
        $this->ReadytodeliverItem  =   new ReadytodeliverItem();
        APP::import('Model','Candd');
        $this->Candd  =   new Candd();
        $collectioncount_basedon_date    =    $this->Candd->find('count',array('conditions'=>array('Candd.cd_date'=>$cd_date,'Candd.status'=>1)));
        $count_basedon_date    =    $this->ReadytodeliverItem->find('count',array('conditions'=>array('ReadytodeliverItem.cd_date'=>$cd_date,'ReadytodeliverItem.status'=>1)));
        return $collectioncount_basedon_date+$count_basedon_date;
        
    }
    public function get_collection_count($cd_date=NULL)
    {
        APP::import('Model','Candd');
        $this->Candd  =   new Candd();
        $collectioncount_basedon_date    =    $this->Candd->find('count',array('conditions'=>array('Candd.cd_date'=>$cd_date)));
        if(!empty($collectioncount_basedon_date))
        {
            return $collectioncount_basedon_date;
        }
    }
    public function get_delivery_count($cd_date=NULL)
    {
        APP::import('Model','ReadytodeliverItem');
        $this->ReadytodeliverItem  =   new ReadytodeliverItem();
        $delivercount_basedon_date    =    $this->ReadytodeliverItem->find('count',array('conditions'=>array('ReadytodeliverItem.cd_date'=>$cd_date)));
        if(!empty($delivercount_basedon_date))
        {
            return $delivercount_basedon_date;
        }
    }
}
