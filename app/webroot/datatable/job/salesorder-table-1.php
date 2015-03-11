<?php
include 'config.php';

// DB table to use
$table = 'salesorders';
$join = '';
// Table's primary key
$primaryKey = 'id';
$val = $_GET['val'];
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
    array( 'db' => 'reg_date', 'dt' => 1 ,'field' => 'reg_date'),
    array( 'db' => 'due_date', 'dt' => 2 ,'field' => 'due_date'),
    array( 'db' => 'branch_id',  'dt' => 3, 'formatter' => function( $d, $row ) {
            return SSP::get_branch_name($d);
        },'field' => 'branch_id'),
    array( 'db' => 'customername',   'dt' => 4 ,'field' => 'customername'),
    array( 'db' => 'attn', 'dt' => 5, 'formatter' => function( $d, $row ) {
            return SSP::get_attn_name($d);
        },'field' => 'attn'),
    array( 'db' => 'phone', 'dt' => 6 ,'field' => 'phone'),
    array( 'db' => 'email', 'dt' => 7 ,'field' => 'email'),
    array( 'db' => 'quotationno',   'dt' => 8 ,'field' => 'quotationno'),
    
    array( 'db' => 'ref_no', 'dt' => 9 ,'field' => 'ref_no'),
    array( 'db' => 'quotation_id', 'dt' => 10, 'formatter' => function( $d, $row ) {
            return SSP::get_salesperson_name($d);
        },'field' => 'quotation_id'),
    array( 'db' => 'id', 'dt' => 11 ,'formatter' => function ( $d, $row) {
            
            global $base_url;
            
            $cn = '<div class="btn-group">';
            $val = SSP::get_sales_details($d);
            if(!$val[0]['is_deleted'])
            {
                if($_GET['edit']==1){
                    $cn .= '<a class="btn btn-xs btn-default" title="" data-toggle="tooltip" href="'.$base_url.'Salesorders/edit/'.$d.'" data-original-title="Edit">
<i class="fa fa-pencil"></i></a>';
                }
                if($_GET['delete']==1){
                    $cn .= '<a class="btn btn-xs btn-danger" title="" data-toggle="tooltip" href="'.$base_url.'Salesorders/delete/'.$d.'" data-original-title="Delete">
<i class="fa fa-times"></i></a>';
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