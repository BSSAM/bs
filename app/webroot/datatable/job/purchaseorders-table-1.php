<?php
include 'config.php';

// DB table to use
$table = "purchaseorders as del";
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
    array( 'db' => 'del.purchaseorder_no', 'dt' => 0 , 'field' => 'purchaseorder_no'),
    array( 'db' => 'del.customer_id', 'dt' => 1 , 'field' => 'customer_id'),
    array( 'db' => 'cus.customername', 'dt' => 2  , 'field' => 'customername'),
    array( 'db' => 'del.phone', 'dt' =>3  , 'field' => 'phone'),
    array( 'db' => 'del.email', 'dt' => 4 , 'field' => 'email' ),
    array( 'db' => 'del.your_ref_no',   'dt' => 5 , 'field' => 'your_ref_no' ),
    array( 'db' => 'del.due_amount',   'dt' => 6 , 'field' => 'due_amount' ),
    array( 'db' => 'del.id', 'dt' => 7 ,'formatter' => function ( $d, $row) {
            
            global $base_url;
            
            $cn = '<div class="btn-group">';
            $val = SSP::get_purchaseorders_details($d);
            if(!$val[0]['is_deleted'])
            {
                if($_GET['edit']==1){
                    $cn .= '<a class="btn btn-xs btn-default" title="" data-toggle="tooltip" href="'.$base_url.'Purchaseorders/edit/'.$d.'" data-original-title="Edit">
<i class="fa fa-pencil"></i></a>';
                }
                if($_GET['delete']==1){
                    $cn .= '<a class="btn btn-xs btn-danger" title="" data-toggle="tooltip" href="'.$base_url.'Purchaseorders/delete/'.$d.'" data-original-title="Delete">
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
    } , 'field' => 'id')
);
   // print_r($columns);
//print_r($_GET);exit;
echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns, $where1, $where2, $join )
);