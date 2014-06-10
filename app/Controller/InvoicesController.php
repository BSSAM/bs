<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class InvoicesController extends AppController
{
    
    public $helpers = array('Html','Form','Session');
    public $components = array('RequestHandler');
    public function index()
    {
        
    }
    public function invoice()
    {
       ini_set('memory_limit', '512M');
    }
    
}