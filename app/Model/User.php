<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class User extends AppModel
{
//   public $belongsTo = array( 'role'  => array(
//           'className'              => 'Userrole',
//           'foreignKey'  => 'role',
//          'associationForeignKey'  => 'user_role_id'
//           )); 
    public $belongsTo = array( 'Userrole');
     public $hasMany = array(
        'UserDepartment' => array(
            'className' => 'UserDepartment',
            'foreignKey' => 'user_id',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'dependent'=>true,
            'counterQuery' => '',
      ));
    
}

