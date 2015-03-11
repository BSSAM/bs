<?php
include 'config.php';

// DB table to use
$table = "invoices as inv";
$join = " LEFT JOIN salesorders as sales ON (sales.id = inv.salesorder_id) ";
// Table's primary key
$primaryKey = 'id';
//$val = $_GET['val'];
//'1'=>'Active','2'=>'Pending Approval','3'=>'InActive'

//if($val == 2)
//{
//    $where1 = ' AND del.is_approved = 0 AND del.is_deleted = 0';
//    $where2 = ' where del.is_approved = 0 AND del.is_deleted = 0';
//}
//elseif($val == 3)
//{
//    $where1 = ' AND del.is_deleted = 1';
//    $where2 = ' where del.is_deleted = 1';
//}
//else
//{
//    $where1 = ' AND del.is_deleted = 0';
//    $where2 = ' where del.is_deleted = 0';
//}

$columns = array(
    array( 'db' => 'inv.invoiceno', 'dt' => 0 , 'field' => 'invoiceno'),
    array( 'db' => 'inv.invoice_date', 'dt' => 1 , 'field' => 'invoice_date'),
    array( 'db' => 'sales.branch_id',  'dt' => 2, 'formatter' => function( $d, $row ) {
            return SSP::get_branch_name($d);
        } , 'field' => 'branch_id'),
    array( 'db' => 'inv.customername', 'dt' => 3  , 'field' => 'customername'),
    array( 'db' => 'inv.regaddress',   'dt' => 4  , 'field' => 'regaddress'),
    array( 'db' => 'inv.regaddress',   'dt' => 5  , 'field' => 'regaddress'),
    array( 'db' => 'inv.contactpersonname', 'dt' => 6 , 'field' => 'contactpersonname'),
    array( 'db' => 'inv.phone', 'dt' => 7  , 'field' => 'phone'),
    array( 'db' => 'inv.email', 'dt' => 8 , 'field' => 'email' ),
    array( 'db' => '',   'dt' => 9 , 'field' => '' ),
    array( 'db' => 'inv.salesorder_id',   'dt' => 10 , 'field' => 'salesorder_id' ),
    
    array( 'db' => 'inv.deliveryorder_id', 'dt' => 11  , 'field' => 'deliveryorder_id'),
    array( 'db' => 'inv.quotation_id', 'dt' => 12  , 'field' => 'quotation_id'),
    array( 'db' => 'inv.ref_no', 'dt' => 13  , 'field' => 'ref_no'),
    array( 'db' => 'inv.quotation_id',  'dt' => 14, 'formatter' => function( $d, $row ) {
            return SSP::get_quo_inv_device_total($d);
        } , 'field' => 'quotation_id'),
    array( 'db' => 'inv.invoiceno', 'dt' => 12 ,'formatter' => function ( $d, $row) {
            
            global $base_url;
            
            $cn = '<div class="btn-group">';
            $val = SSP::get_invoice_details($d);
            if(!$val[0]['is_approved'])
            {
                
                    $cn .= '<a class="btn btn-xs btn-default" title="" data-toggle="tooltip" href="'.$base_url.'Invoices/view/'.$d.'" data-original-title="View">
<i class="fa fa-file-text"></i></a>';
                
                    $cn .= '<a class="btn btn-xs btn-default" title="" data-toggle="tooltip" href="'.$base_url.'Invoices/pdf/'.$d.'" data-original-title="Report">
<i class="gi gi-print"></i></a>';
                
            }
            else
            {
                $cn .='';
//                $cn .= '<a onclick="confirm(\'Are you sure want to Retrieve?\');" class="btn btn-xs btn-warning" title="" data-toggle="tooltip" href="'.$base_url.'Salesorders/r/'.$d.'" data-original-title="Retrieve">
//<i class="fa fa-undo"></i></a>';
            }
            $cn .= '</div>';
                          
            return $cn;
    } , 'field' => 'invoiceno')
    
);
   // print_r($columns);
//print_r($_GET);exit;
echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns, $where1, $where2, $join )
);