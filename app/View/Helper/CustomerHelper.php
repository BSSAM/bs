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
class CustomerHelper extends AppHelper 
{

    public function checksalesperson_value($cus_id=NULL,$sales_id=NULL)
    {
        APP::import('Model','CusSalesperson');
        $this->CusSalesperson  =   new CusSalesperson();
        $sales_date  =    $this->CusSalesperson->find('all',array('conditions'=>array('CusSalesperson.customer_id'=>$cus_id,'CusSalesperson.salespeople_id'=>$sales_id)));
        if(count($sales_date)>0):
            return TRUE;
            else:
            return FALSE;
        endif;
    }
    public function checkrefer_value($cus_id=NULL,$ref_id=NULL)
    {
        APP::import('Model','CusReferby');
        $this->CusReferby  =   new CusReferby();
        $ref_data  =    $this->CusReferby->find('all',array('conditions'=>array('CusReferby.customer_id'=>$cus_id,'CusReferby.referedby_id'=>$ref_id)));
        if(count($ref_data)>0):
            return TRUE;
            else:
            return FALSE;
        endif;
    }
    public function checktag_list($group_id=NULL)
    {
        APP::import('Model','Customer');
        $this->Customer  =   new Customer();
        $group_data  =    $this->Customer->find('all',array('conditions'=>array('Customer.customergroup_id'=>$group_id,'Customer.status'=>1)));
        return count($group_data);
    }
}
