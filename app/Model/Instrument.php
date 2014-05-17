<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Instrument extends AppModel
{
    var $hasMany=array('Brand','Range','Department','Procedure');
}