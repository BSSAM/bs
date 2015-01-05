<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Userrole extends AppModel
{
   
    //var $displayField = 'user_role';
    public $hasMany = array('User');
     
}

