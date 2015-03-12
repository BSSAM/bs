<?php
include 'config.php';

// DB table to use
$table = ' proformas';
$join = '';
// Table's primary key
$primaryKey = 'id';
$val = '';
//'1'=>'Active','2'=>'Pending Approval','3'=>'InActive'

if($val == 2)
{
    $where1 = ' AND is_approved = 0 AND is_deleted = 0';
    $where2 = ' where is_approved = 0 AND is_deleted = 0';
}
elseif($val == 3)
{
    $where1 = ' AND is_deleted = 1';
    $where2 = ' where is_deleted = 1';
}
else
{
    $where1 = ' AND is_deleted = 0';
    $where2 = ' where is_deleted = 0';
}

$columns = array(
    array( 'db' => 'id', 'dt' => 0 ,'field' => 'id'),
    array( 'db' => 'salesorderno', 'dt' => 1 ,'field' => 'salesorderno'),
    array( 'db' => 'reg_date', 'dt' => 2 ,'field' => 'reg_date'),
    array( 'db' => 'phone', 'dt' =>3 ,'field' => 'phone'),
    array( 'db' => 'email', 'dt' => 4 ,'field' => 'email'),
    array( 'db' => 'ref_no', 'dt' => 5 ,'field' => 'ref_no'),
    array( 'db' => 'id', 'dt' => 6 ,'formatter' => function ( $d, $row) {
		
            global $base_url;
            
            $cn = '<div class="btn-group">';
            $val = SSP::get_proformas_details($d);
            if(!$val[0]['is_deleted'])
            {
                if($_GET['edit']==1){
                    $cn .= '<a class="btn btn-xs btn-default" title="" data-toggle="tooltip" href="'.$base_url.'Proformas/edit/'.$d.'" data-original-title="Edit">
<i class="fa fa-pencil"></i></a>';
                }
               
                if($val[0]['is_approved']==1){
					
					
                $cn .= '<a class="btn btn-xs btn-danger label" title="" data-toggle="tooltip" href="'.$base_url.'Proformas/pdf/'.$d.'" data-original-title="Download">PDF</a>';
                }
            }
            else
            {
                $cn .='';
//                $cn .= '<a onclick="confirm(\'Are you sure want to Retrieve?\');" class="btn btn-xs btn-warning" title="" data-toggle="tooltip" href="'.$base_url.'Salesorders/r/'.$d.'" data-original-title="Retrieve">
//<i class="fa fa-undo"></i></a>';
            }
            $cn .= '</div>';
                          
            return $cn;
    },'field' => 'id')
    
);
   // print_r($columns);
//print_r($_GET);exit;
echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns, $where1, $where2, $join )
);