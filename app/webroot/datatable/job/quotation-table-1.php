<?php
include 'config.php';

// DB table to use
$table = 'quotations as quo';
$join = " LEFT JOIN  branches as bra ON (quo.branch_id = bra.id) LEFT JOIN  cus_contactpersoninfos as con ON (quo.attn = con.id) LEFT JOIN  quo_customerspecialneeds as sale ON (quo.id = sale.quotation_id)";
// Table's primary key
$primaryKey = 'quo.id';
$val = $_GET['val'];
//'1'=>'Active','2'=>'Pending Approval','3'=>'InActive'

if($val == 2)
{
    $where1 = ' AND quo.is_approved = 0 AND quo.is_deleted = 0';
    $where2 = ' where quo.is_approved = 0 AND quo.is_deleted = 0';
}
elseif($val == 3)
{
    $where1 = ' AND quo.is_deleted = 1';
    $where2 = ' where quo.is_deleted = 1';
}
else
{
    $where1 = ' AND quo.is_deleted = 0';
    $where2 = ' where quo.is_deleted = 0';
}

$columns = array(
    array( 'db' => 'quo.quotationno', 'dt' => 0 ,'field' => 'quotationno'),
    array( 'db' => 'quo.reg_date', 'dt' => 1 ,'field' => 'reg_date'),
    array( 'db' => 'bra.branchname',  'dt' => 2,'field' => 'branchname'),
    array( 'db' => 'quo.customername',   'dt' => 3 ,'field' => 'customername'),
    array( 'db' => 'quo.address', 'dt' => 4 ,'field' => 'address'),
    array( 'db' => 'con.name', 'dt' => 5,'field' => 'name'),
    array( 'db' => 'quo.phone', 'dt' => 6 ,'field' => 'phone'),
    array( 'db' => 'quo.email', 'dt' => 7 ,'field' => 'email'),
    
    array( 'db' => 'sale.salesperson_name', 'dt' => 8,'field' => 'salesperson_name'),
    array( 'db' => 'quo.ref_no', 'dt' => 9 ,'field' => 'ref_no'),
    array( 'db' => 'quo.id', 'dt' => 10, 'formatter' => function( $d, $row ) {
            return SSP::get_quo_device_total($d);
        },'field' => 'id'),
//    array( 'db' => 'status',     'dt' => 5, 'formatter' => function( $d, $row ) {
//            return ($d == 1)?'<span class="label label-success">Active</span>':'<span class="label label-danger">In Active</span>';
//        }),
    array( 'db' => 'quo.id', 'dt' => 11 ,'formatter' => function ( $d, $row) {
            
            global $base_url;
            
            $cn = '<div class="btn-group" style="white-space: nowrap; width: 100px;">';
            $val = SSP::get_quo_details($d);
            if(!$val[0]['is_deleted'])
            {
                if($_GET['edit']==1){
                    $cn .= '<a class="btn btn-xs btn-default" title="" data-toggle="tooltip" href="'.$base_url.'Quotations/edit/'.$d.'" data-original-title="Edit">
<i class="fa fa-pencil"></i></a>';
                }
                if($_GET['delete']==1){
                    $cn .= '<a class="btn btn-xs btn-danger" title="" data-toggle="tooltip" href="'.$base_url.'Quotations/delete/'.$d.'" data-original-title="Delete">
<i class="fa fa-times"></i></a>';
                }
                if($val[0]['is_approved']==1)
                {
                $cn .= '<a class="btn btn-xs btn-default" title="" data-toggle="tooltip" href="'.$base_url.'Quotations/pdf/'.$d.'" data-original-title="Report">
<i class="gi gi-print"></i></a>';
                }
            }
            else
            {
                $cn .='';
//                $cn .= '<a onclick="confirm(\'Are you sure want to Retrieve?\');" class="btn btn-xs btn-warning" title="" data-toggle="tooltip" href="'.$base_url.'Quotations/delete/'.$d.'" data-original-title="Retrieve">
//<i class="fa fa-undo"></i></a>';
            }
            $cn .= '</div>';
                          
            return $cn;
    },'field' => 'id')
    
);

echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns, $where1, $where2, $join )
);