<?php
include 'config.php';

// DB table to use
$table = 'quotations';

// Table's primary key
$primaryKey = 'id';
 
$columns = array(
    array( 'db' => 'quotationno', 'dt' => 0 ),
    array( 'db' => 'reg_date', 'dt' => 1 ),
    array( 'db' => 'branch_id',  'dt' => 2, 'formatter' => function( $d, $row ) {
            return SSP::get_branch_name($d);
        }),
    array( 'db' => 'customername',   'dt' => 3 ),
    array( 'db' => 'address', 'dt' => 4 ),
    array( 'db' => 'attn', 'dt' => 5, 'formatter' => function( $d, $row ) {
            return SSP::get_attn_name($d);
        }),
    array( 'db' => 'phone', 'dt' => 6 ),
    array( 'db' => 'email', 'dt' => 7 ),
    array( 'db' => 'attn', 'dt' => 8, 'formatter' => function( $d, $row ) {
            return SSP::get_attn_name($d);
        }),
    array( 'db' => 'id', 'dt' => 9, 'formatter' => function( $d, $row ) {
            return SSP::get_salesperson_name($d);
        }),
    array( 'db' => 'ref_no', 'dt' => 10 ),
    array( 'db' => 'id', 'dt' => 11, 'formatter' => function( $d, $row ) {
            return SSP::get_quo_device_total($d);
        }),
//    array( 'db' => 'status',     'dt' => 5, 'formatter' => function( $d, $row ) {
//            return ($d == 1)?'<span class="label label-success">Active</span>':'<span class="label label-danger">In Active</span>';
//        }),
    array( 'db' => 'id', 'dt' => 12 ,'formatter' => function ( $d, $row) {
            
            global $base_url;
            
            $cn = '<div class="btn-group">';
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
            }
            else
            {
                $cn .= '<a onclick="confirm(\'Are you sure want to Retrieve?\');" class="btn btn-xs btn-warning" title="" data-toggle="tooltip" href="'.$base_url.'Quotations/delete/'.$d.'" data-original-title="Retrieve">
<i class="fa fa-undo"></i></a>';
            }
            $cn .= '</div>';
                          
            return $cn;
    })
    
);

echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);