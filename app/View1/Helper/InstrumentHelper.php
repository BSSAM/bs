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
class InstrumentHelper extends AppHelper 
{

    public function checkbrand_value($ins_id=NULL,$brand_id=NULL)
    {
        APP::import('Model','InstrumentBrand');
        $this->InstrumentBrand  =   new InstrumentBrand();
        $brand_date  =    $this->InstrumentBrand->find('all',array('conditions'=>array('InstrumentBrand.instrument_id'=>$ins_id,'InstrumentBrand.brand_id'=>$brand_id)));
        if(count($brand_date)>0):
            
            return TRUE;
            else:
            return FALSE;
        endif;
    }
    public function checkrange_value($ins_id=NULL,$range_id=NULL)
    {
        APP::import('Model','InstrumentRange');
        $this->InstrumentRange  =   new InstrumentRange();
        $range_date  =    $this->InstrumentRange->find('all',array('conditions'=>array('InstrumentRange.instrument_id'=>$ins_id,'InstrumentRange.range_id'=>$range_id)));
        if(count($range_date)>0):
            return TRUE;
            else:
            return FALSE;
        endif;
    }
    public function checkprocedure_value($ins_id=NULL,$pro_id=NULL)
    {
        APP::import('Model','InstrumentProcedure');
        $this->InstrumentProcedure  =   new InstrumentProcedure();
        $procedure_date  =    $this->InstrumentProcedure->find('all',array('conditions'=>array('InstrumentProcedure.instrument_id'=>$ins_id,'InstrumentProcedure.procedure_id'=>$pro_id)));
        if(count($procedure_date)>0):
            return TRUE;
            else:
            return FALSE;
        endif;
    }
}
