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
class ClientPOHelper extends AppHelper 
{

    public function getpos($quotation_id=NULL)
    {
        APP::import('Model','Clientpo');
        $this->Clientpo  =   new Clientpo();
        $po_list    =    $this->Clientpo->find('all',array('conditions'=>array('Clientpo.quotation_id'=>$quotation_id)));
        $po_array   =  array();
        if(count($po_list)>0):
            foreach($po_list as $po):
                $po_array[] =  $po['Clientpo']['clientpos_no']; 
            endforeach;
            return $po_array;
        endif;
    }
    public function getinvoice_type($customer_id=NULL)
    {
        APP::import('Model','Customer');
        $this->Customer  =   new Customer();
        $customer_list    =    $this->Customer->find('first',array('conditions'=>array('Customer.id'=>$customer_id)));
        $invoice_type   =   $customer_list['InvoiceType']['type_invoice'];
        switch($invoice_type)
        {
            case 'Purchase order Full invoice':
                return 'Purchaseorder_fullinvoice';
                break;
            case 'Quotation Full invioce':
                return 'Quotation_fullinvoice';
                break;
            case 'Sales order Full invioce':
                return 'Salesorder_fullinvoice';
                break;
            case 'Delivery order Full invoice':
                return 'Deliveryorder_fullinvoice';
                break;
        }
        
    }
    
}
