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
        App::uses('InstrumentBrand_copy', 'Model');
       // APP::import('Model','InstrumentBrand_copy');
        $this->InstrumentBrand_copy  =   new InstrumentBrand_copy();
        $brand_date  =    $this->InstrumentBrand_copy->find('count',array('conditions'=>array('InstrumentBrand_copy.instrument_id'=>$ins_id,'InstrumentBrand_copy.brand_id'=>$brand_id)));
        if($brand_date):
            return TRUE;
            else:
            return FALSE;
        endif;
    }
    public function checkrange_value($ins_id=NULL,$range_id=NULL)
    {
        App::uses('InstrumentRange_copy', 'Model');
        //APP::import('Model','InstrumentRange_copy');
        $this->InstrumentRange_copy  =   new InstrumentRange_copy();
        $range_date  =    $this->InstrumentRange_copy->find('count',array('conditions'=>array('InstrumentRange_copy.instrument_id'=>$ins_id,'InstrumentRange_copy.range_id'=>$range_id)));
        if($range_date):
            return TRUE;
            else:
            return FALSE;
        endif;
    }
    
    public function checkprocedure_value($ins_id=NULL,$pro_id=NULL)
    {
        App::uses('InstrumentProcedure_copy', 'Model');
        //APP::import('Model','InstrumentProcedure_copy');
        $this->InstrumentProcedure_copy  =   new InstrumentProcedure_copy();
        $procedure_date  =    $this->InstrumentProcedure_copy->find('count',array('conditions'=>array('InstrumentProcedure_copy.instrument_id'=>$ins_id,'InstrumentProcedure_copy.procedure_id'=>$pro_id)));
        if($procedure_date):
            return TRUE;
            else:
            return FALSE;
        endif;
    }
    
    public function getprocedure_value($ins_id=NULL)
    {
        App::uses('InstrumentProcedure_copy', 'Model');
        //APP::import('Model','InstrumentProcedure_copy');
        $this->InstrumentProcedure_copy  =   new InstrumentProcedure_copy();
        $procedure_date  =    $this->InstrumentProcedure_copy->find('list',array('fields' => array("id", "procedure_id"), 'conditions'=>array('InstrumentProcedure_copy.instrument_id'=>$ins_id)));
        
        return array_values($procedure_date);
    }
    
    
     public function getbrand_value($ins_id=NULL)
    {
        App::uses('InstrumentBrand_copy', 'Model');
       // APP::import('Model','InstrumentBrand_copy');
        $this->InstrumentBrand_copy  =   new InstrumentBrand_copy();
        $brand_date  =    $this->InstrumentBrand_copy->find('list',array('fields' => array("id", "brand_id"), 'conditions'=>array('InstrumentBrand_copy.instrument_id'=>$ins_id)));
        
        return array_values($brand_date);
    }
    public function getrange_value($ins_id=NULL)
    {
        App::uses('InstrumentRange_copy', 'Model');
        //APP::import('Model','InstrumentRange_copy');
        $this->InstrumentRange_copy  =   new InstrumentRange_copy();
        $range_date  =    $this->InstrumentRange_copy->find('list',array('fields' => array("id", "range_id"), 'conditions'=>array('InstrumentRange_copy.instrument_id'=>$ins_id)));
        
        return array_values($range_date);
    }
}
