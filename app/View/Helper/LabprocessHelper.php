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
class LabprocessHelper extends AppHelper 
{
    public $uses    =   array('Salesorder','Description');
   
    public function labperocess_checking($id = null)
    {
        APP::import('Model','Description');
        $this->Description   =   new Description();
        $check_value = $this->Description->find('all',array('conditions'=>array('Description.checking'=>1,'Description.id'=>$id)));
       // pr(count($data_count[0]['Description']));exit;
        $check_count    =   count($check_value);
        if($check_count==1)
        {
            $data   =   'checked="checked"';
        }
        else
        {
            $data=  '';
        }
        return $data;
    }
    public function labperocess_processing($id = null)
    {
        APP::import('Model','Description');
        $this->Description   =   new Description();
        $check_value = $this->Description->find('all',array('conditions'=>array('Description.processing'=>1,'Description.id'=>$id)));
       // pr(count($data_count[0]['Description']));exit;
        $check_count    =   count($check_value);
        if($check_count==1)
        {
            $data   =   'checked="checked"';
        }
        else
        {
            $data=  '';
        }
        return $data;
    }
   
}
