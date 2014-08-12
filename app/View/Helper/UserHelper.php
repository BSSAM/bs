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
class UserHelper extends AppHelper 
{
    public function checkdepartment_value($user_id=NULL,$department_id=NULL)
    {
        APP::import('Model','UserDepartment');
        $this->UserDepartment  =   new UserDepartment();
        $userdepartment  =    $this->UserDepartment->find('all',array('conditions'=>array('UserDepartment.user_id'=>$user_id,'UserDepartment.department_id'=>$department_id)));
        if(count($userdepartment)>0):
            return TRUE;
            else:
            return FALSE;
        endif;
    }
    
}
