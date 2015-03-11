<?php
include 'config.php';

// DB table to use
$table = "deliveryorders as del";
$join = " LEFT JOIN customers as cus ON (del.customer_id = cus.id)";
// Table's primary key
$primaryKey = 'id';
$val = $_GET['val'];
//'1'=>'Active','2'=>'Pending Approval','3'=>'InActive'

if($val == 2)
{
    $where1 = ' AND del.is_approved = 0 AND del.is_deleted = 0';
    $where2 = ' where del.is_approved = 0 AND del.is_deleted = 0';
}
elseif($val == 3)
{
    $where1 = ' AND del.is_deleted = 1';
    $where2 = ' where del.is_deleted = 1';
}
else
{
    $where1 = ' AND del.is_deleted = 0';
    $where2 = ' where del.is_deleted = 0';
}

$columns = array(
    array( 'db' => 'del.delivery_order_no', 'dt' => 0 , 'field' => 'delivery_order_no'),
    array( 'db' => 'del.delivery_order_date', 'dt' => 1 , 'field' => 'delivery_order_date'),
    array( 'db' => 'del.branch_id',  'dt' => 2, 'formatter' => function( $d, $row ) {
            return SSP::get_branch_name($d);
        } , 'field' => 'branch_id'),
    array( 'db' => 'cus.customername', 'dt' => 3  , 'field' => 'customername'),
    array( 'db' => 'del.delivery_address',   'dt' => 4  , 'field' => 'delivery_address'),
    array( 'db' => 'del.customer_address',   'dt' => 5  , 'field' => 'customer_address'),
    array( 'db' => 'del.attn', 'dt' => 6, 'formatter' => function( $d, $row ) {
            return SSP::get_attn_name($d);
        } , 'field' => 'attn'),
    array( 'db' => 'del.phone', 'dt' => 7  , 'field' => 'phone'),
    array( 'db' => 'del.email', 'dt' => 8 , 'field' => 'email' ),
    array( 'db' => 'del.salesorder_id',   'dt' => 9 , 'field' => 'salesorder_id' ),
    array( 'db' => 'del.quotationno',   'dt' => 10 , 'field' => 'quotationno' ),
    
    array( 'db' => 'del.ref_no', 'dt' => 11  , 'field' => 'ref_no'),
    array( 'db' => 'del.id', 'dt' => 12 ,'formatter' => function ( $d, $row) {
            
            global $base_url;
            
            $cn = '<div class="btn-group">';
            $val = SSP::get_delivery_details($d);
            if(!$val[0]['is_deleted'])
            {
                if($_GET['edit']==1){
                    $cn .= '<a class="btn btn-xs btn-default" title="" data-toggle="tooltip" href="'.$base_url.'Deliveryorders/edit/'.$d.'" data-original-title="Edit">
<i class="fa fa-pencil"></i></a>';
                }
                if($_GET['delete']==1){
                    $cn .= '<a class="btn btn-xs btn-danger" title="" data-toggle="tooltip" href="'.$base_url.'Deliveryorders/delete/'.$d.'" data-original-title="Delete">
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
    } , 'field' => 'id'),
    array( 'db' => 'del.id', 'dt' => 13 ,'formatter' => function ( $d, $row) {
         return SSP::get_poapproved_status($d);
    } , 'field' => 'id')
);
   // print_r($columns);
//print_r($_GET);exit;
echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns, $where1, $where2, $join )
);