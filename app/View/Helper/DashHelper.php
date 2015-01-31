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
class DashHelper extends AppHelper 
{
    public $uses    =   array('Salesorder','Description','Quotation','Temptemplate','Temptemplatedata','Tempinstrument','Tempambient'
							 ,'Tempother','Temprange','Temprelativehumidity','Tempreadingtype','Tempchannel','Tempinstrumentvalid','Tempunit','Tempunitconvert',
							    'Tempformdata','Tempuncertainty','Tempuncertaintydata','Customer','Instrument','Range','Brand','CustomerInstrument');
    
    public function customerinstrument($id = null)
    {
        APP::import('Model','CustomerInstrument');
        $this->CustomerInstrument   =   new CustomerInstrument();
        APP::import('Model','Instrument');
        $this->Instrument   =   new Instrument();
        APP::import('Model','Range');
        $this->Range   =   new Range();
        APP::import('Model','Customer');
        $this->Customer   =   new Customer();
        
        $data_0 = $this->CustomerInstrument->find('first',array('conditions'=>array('CustomerInstrument.id'=>$id)));
        $data_1 = $this->Instrument->find('first',array('conditions'=>array('Instrument.id'=>$data_0['CustomerInstrument']['instrument_id'])));
        $data_2 = $this->Range->find('first',array('conditions'=>array('Range.id'=>$data_0['CustomerInstrument']['range_id'])));
        $data_3 = $this->Customer->find('first',array('conditions'=>array('Customer.id'=>$data_0['CustomerInstrument']['customer_id'])));
        $instrumentname = $data_1['Instrument']['name'];
        $range = $data_2['Range']['range_name'];
        $model = $data_0['CustomerInstrument']['model_no'];
        $cost = $data_0['CustomerInstrument']['cost'];
        $customer = $data_3['Customer']['customername'];
        return $customer.' - '.$instrumentname.' - '.$range.' - '.$model.' - $'.$cost;
    }
    
}


?>