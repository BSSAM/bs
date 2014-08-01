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
class FileuploadHelper extends AppHelper 
{

    public function calculateSize($size=NULL,$sep=' ')
    {
        $unit = null;
        $units = array('B', 'KB', 'MB', 'GB', 'TB');
        for($i = 0, $c = count($units); $i < $c; $i++)
        {
            if ($size > 1024)
            {
                $size = $size / 1024;
            }
            else
            {
                $unit = $units[$i];
                break;
            }
        }
        return round($size, 2).$sep.$unit;
    }
}
