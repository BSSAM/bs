<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class InvoicesController extends AppController
{
    
    public $helpers = array('Html','Form','Session');
    
    public function index()
    {
       
        
      
      
    }
    public function invoice()
    {
       
        
      
      
    }
    
    public function create_pdf()
    {
        
    //$users = $this->User->find('all');
    $users = "New";
    $this->set(compact('users'));
 
    $this->layout = '/pdf/default';
 
    $this->render('/Pdf/my_pdf_view');
 
    }
    
    public function download_pdf() {
        $this->create_pdf();
 
    $this->viewClass = 'Media';
 
    $params = array(
 
        'id' => 'test.pdf',
        'name' => 'your_test' ,
        'download' => true,
        'extension' => 'pdf',
        'path' => APP . 'files/pdf' . DS
    );
 
    $this->set($params);
 
    }
    
    public function show_pdf() {
        
        $this->create_pdf();
 
    $this->viewClass = 'Media';
 
    $params = array(
 
        'id' => 'test.pdf',
        'name' => 'your_test' ,
        'download' =>false,
        'extension' => 'pdf',
        'path' => APP . 'files/pdf' . DS
    );
 
    $this->set($params);
 
    }
    
}