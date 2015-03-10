<?php
include 'config.php';

// DB table to use
$table = 'units';
 
// Table's primary key
$primaryKey = 'id';
 
$columns = array(
    array( 'db' => 'id', 'dt' => 0 ),
    array(
        'db'        => 'created',
        'dt'        => 1,
        'formatter' => function( $d, $row ) {
            return date( 'F jS, Y h:i A', strtotime($d));
        }),
    array( 'db' => 'unit_name',  'dt' => 2 ),
	 array( 'db' => 'unit_description',   'dt' => 3 ),
    array( 'db' => 'status',     'dt' => 4, 'formatter' => function( $d, $row ) {
            return ($d == 1)?'<span class="label label-success">Active</span>':'<span class="label label-danger">In Active</span>';
        }),
    array( 'db' => 'id', 'dt' => 5 ,'formatter' => function ( $d, $row) {
            
            global $base_url;
            
            $cn = '<div class="btn-group">';
            $val = SSP::get_units_details($d);
            if(!$val[0]['is_deleted'])
            {
                if($_GET['edit']==1){
                    $cn .= '<a class="btn btn-xs btn-default" title="" data-toggle="tooltip" href="'.$base_url.'Units/edit/'.$d.'" data-original-title="Edit">
<i class="fa fa-pencil"></i></a>';
                }
                if($_GET['delete']==1){
                    $cn .= '<a class="btn btn-xs btn-danger" title="" data-toggle="tooltip" href="'.$base_url.'Units/delete/'.$d.'" data-original-title="Delete">
<i class="fa fa-times"></i></a>';
                }
            }
            else
            {
                $cn .= '<a onclick="confirm(\'Are you sure want to Retrieve?\');" class="btn btn-xs btn-warning" title="" data-toggle="tooltip" href="'.$base_url.'Units/delete/'.$d.'" data-original-title="Retrieve">
<i class="fa fa-undo"></i></a>';
            }
            $cn .= '</div>';
                          
            return $cn;
    })
    
);

echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);