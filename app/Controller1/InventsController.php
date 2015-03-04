<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class InventsController extends AppController
{
    
    public $helpers = array('Html','Form','Session');
    
    public function index()
    {
       
         if($this->request->is('post'))
        {
            $post_output = $this->request->data;
            if($post_output['top-search']!='')
            {
                $this->set('search',$post_output['top-search']);
            }
           
        }
    }
    
}