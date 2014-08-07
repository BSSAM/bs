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
class LogHelper extends AppHelper 
{

    public function getlog_approve($quotation_id=NULL)
    {
        APP::import('Model','Logactivity');
        $this->Logactivity  =   new Logactivity();
        $log_list    =    $this->Logactivity->find('first',array('conditions'=>array('Logactivity.logid'=>$quotation_id)));
        return $log_list['User']['username'];
    }
    
    public function getlog_approve_sales($salesorder_id=NULL)
    {
        APP::import('Model','Logactivity');
        $this->Logactivity  =   new Logactivity();
        $log_list    =    $this->Logactivity->find('first',array('conditions'=>array('Logactivity.logid'=>$salesorder_id)));
        return $log_list['User']['username'];
    }
    
    
}
