<?php
include 'config.php';

// DB table to use
$table = "subcontractdos as del";
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
    array( 'db' => 'del.subcontract_dono', 'dt' => 0 , 'field' => 'subcontract_dono'),
    array( 'db' => 'del.subcontract_date', 'dt' => 1 , 'field' => 'subcontract_date'),
	array( 'db' => 'del.subcontract_duedate', 'dt' => 2 , 'field' => 'subcontract_duedate'),
    array( 'db' => 'cus.customername', 'dt' => 3  , 'field' => 'customername'),
    array( 'db' => 'del.subcontract_name', 'dt' =>4  , 'field' => 'subcontract_name'),
	array( 'db' => 'del.subcontract_phone', 'dt' =>5  , 'field' => 'subcontract_phone'),
    array( 'db' => 'del.subcontract_email', 'dt' => 6 , 'field' => 'subcontract_email' ),
    array( 'db' => 'del.salesorder_id',   'dt' => 7 , 'field' => 'salesorder_id' ),
    array( 'db' => 'del.subcontract_ref_no',   'dt' => 8 , 'field' => 'subcontract_ref_no' ),
    array( 'db' => 'del.id', 'dt' => 9 ,'formatter' => function ( $d, $row) {
            
            global $base_url;
            
            $cn = '<div class="btn-group">';
            $val = SSP::get_subcontractdos_details($d);
            if(!$val[0]['is_deleted'])
            {
                if($_GET['edit']==1){
                    $cn .= '<a class="btn btn-xs btn-default" title="" data-toggle="tooltip" href="'.$base_url.'Subcontractdos/edit/'.$d.'" data-original-title="Edit">
<i class="fa fa-pencil"></i></a>';
                }
                if($_GET['delete']==1){
                    $cn .= '<a class="btn btn-xs btn-danger" title="" data-toggle="tooltip" href="'.$base_url.'Subcontractdos/delete/'.$d.'" data-original-title="Delete">
<i class="fa fa-times"></i></a>';
                }
                if($val[0]['is_approved']==1)
                {
                $cn .= '<a class="btn btn-xs btn-default" title="" data-toggle="tooltip" href="'.$base_url.'Subcontractdos/pdf/'.$d.'" data-original-title="Report">
<i class="gi gi-print"></i></a>';
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