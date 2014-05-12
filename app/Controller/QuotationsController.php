<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class QuotationsController extends AppController
{
    
    public $helpers = array('Html','Form','Session');
    
    public function index()
    {
        //$this->Quotation->recursive = 1; 
        $data = $this->Quotation->find('all',array('order' => array('Quotation.id' => 'DESC')));
        $this->set('quotation', $data);
    }
    
    public function add()
    {
       //echo  md5(substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, rand(1,10))); 
      
       
        echo $str = 'BSQ-13-'.str_pad($str + 1, 5, 0, STR_PAD_LEFT);
        $str++;
       
        $this->set('quotationno', $str);
    }
    
    public function search()
    {
        $this->loadModel('Customer');
        $name =  $this->request->data['name'];
    $this->autoRender = false;
    $data = $this->Customer->find('all',array('conditions'=>array('customername LIKE'=>'%'.$name.'%')));
    $c = count($data);
        
    for($i = 0; $i<$c;$i++)
    { 
        echo "<div class='show' align='left'>";
        echo $data[$i]['Customer']['customername'];
        echo "<br>";
         echo "</div>";
    }
   }
}
