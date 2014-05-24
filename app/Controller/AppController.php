<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	public $components = array(
    'Session'
);
public function beforeFilter()
{
   
        $sess_username = $this->Session->read('sess_username');
        if(isset($sess_username))
        {
            $this->set('username',$sess_username);
        }
        else
        { 
            if(($this->params['controller']!='Logins'))  
            {
            return $this->redirect(array('controller' => 'Logins','action'=>'index'));
            }
        }
        $this->set('control',$this->params['controller']);
        
        /************************************** User Role ***************************************************
        */
         $id = $this->Session->read('sess_userrole');//pr($id);
         $this->loadModel('Userrole');
         //$userrole = 0;
         $userrole =  $this->Userrole->findByUserRoleId($id); 
         if(!empty($userrole))
         {
         //pr($userrole['Userrole']['js_enc']);
         
         $ca = $userrole['Userrole']['js_enc'];
         $user_role = unserialize($ca);
         $this->set('user_role', $user_role);
         }
        
         /****************************************************************************************************
        */
}
     
}
