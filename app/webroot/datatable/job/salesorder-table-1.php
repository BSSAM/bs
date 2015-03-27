<?php
include 'config.php';

// DB table to use
$table = 'salesorders as sales';
$join = 'LEFT JOIN  customers as cus ON (sales.customer_id = cus.id)';
// Table's primary key
$primaryKey = 'sales.id';
$val = $_GET['val'];
//'1'=>'Active','2'=>'Pending Approval','3'=>'InActive'

if($val == 2)
{
    $where1 = ' AND sales.is_approved = 0 AND sales.is_deleted = 0';
    $where2 = ' where sales.is_approved = 0 AND sales.is_deleted = 0';
}
elseif($val == 3)
{
    $where1 = ' AND sales.is_deleted = 1';
    $where2 = ' where sales.is_deleted = 1';
}
else
{
    $where1 = ' AND sales.is_deleted = 0';
    $where2 = ' where sales.is_deleted = 0';
}

$columns = array(
    array( 'db' => 'sales.id', 'dt' => 0 ,'field' => 'id'),
    array( 'db' => 'sales.reg_date', 'dt' => 1 ,'field' => 'reg_date'),
    array( 'db' => 'sales.due_date', 'dt' => 2 ,'field' => 'due_date'),
    array( 'db' => 'sales.branch_id',  'dt' => 3, 'formatter' => function( $d, $row ) {
            return SSP::get_branch_name($d);
        },'field' => 'branch_id'),
    array( 'db' => 'cus.customername',   'dt' => 4 ,'field' => 'customername'),
    array( 'db' => 'sales.attn', 'dt' => 5, 'formatter' => function( $d, $row ) {
            return SSP::get_attn_name($d);
        },'field' => 'attn'),
    array( 'db' => 'sales.phone', 'dt' => 6 ,'field' => 'phone'),
    array( 'db' => 'sales.email', 'dt' => 7 ,'field' => 'email'),
    array( 'db' => 'sales.quotationno',   'dt' => 8 ,'field' => 'quotationno'),
    
    array( 'db' => 'sales.ref_no', 'dt' => 9 ,'field' => 'ref_no'),
    array( 'db' => 'sales.quotation_id', 'dt' => 10, 'formatter' => function( $d, $row ) {
            return SSP::get_salesperson_name($d);
        },'field' => 'quotation_id'),
    array( 'db' => 'sales.id', 'dt' => 11 ,'formatter' => function ( $d, $row) {
            
            global $base_url;
            
            $cn = '<div class="btn-group"  style="white-space: nowrap; width: 100px;">';
            $val = SSP::get_sales_details($d);
            if(!$val[0]['is_deleted'])
            {
                if($_GET['edit']==1){
                    $cn .= '<a class="btn btn-xs btn-default" title="Edit" data-toggle="tooltip" href="'.$base_url.'Salesorders/edit/'.$d.'" data-original-title="Edit">
<i class="fa fa-pencil"></i></a>';
                }
                if($_GET['delete']==1){
                    $cn .= '<a class="btn btn-xs btn-danger" title="Delete" data-toggle="tooltip" href="'.$base_url.'Salesorders/delete/'.$d.'" data-original-title="Delete">
<i class="fa fa-times"></i></a>';
                }
                if($val[0]['is_approved']==1)
                {
                $cn .= '<a class="btn btn-xs btn-default" title="Report" data-toggle="tooltip" href="'.$base_url.'Salesorders/pdf/'.$d.'" data-original-title="Report">
<i class="gi gi-print"></i></a>';
                $cn .= '<a class="btn btn-xs btn-default" title="Tags" data-toggle="tooltip" href="'.$base_url.'Salesorders/pdf_tag/'.$d.'" data-original-title="Tags">
<i class="fa fa-tags"></i></a>';
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