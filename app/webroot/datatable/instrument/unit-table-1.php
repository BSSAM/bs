<?php
include 'config.php';

// DB table to use
$table = 'units';
$join = '';  
// Table's primary key
$primaryKey = 'id';
 
$val = $_GET['val'];

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
    array( 'db' => 'id', 'dt' => 0 , 'field' => 'id'),
    array( 'db' => 'created', 'dt' => 1, 'field' => 'created'),
    array( 'db' => 'unit_name',  'dt' => 2, 'field' => 'unit_name' ),
	 array( 'db' => 'unit_description',   'dt' => 3, 'field' => 'unit_description' ),
    array( 'db' => 'status',     'dt' => 4 , 'field' => 'status' , 'formatter' => function( $d, $row ) {
            return ($d == 1)?'<span class="label label-success">Active</span>':'<span class="label label-danger">In Active</span>';
        }),
    array( 'db' => 'id', 'dt' => 5, 'field' => 'id' ,'formatter' => function ( $d, $row) {
            
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
                /*$cn .= '<a onclick="confirm(\'Are you sure want to Retrieve?\');" class="btn btn-xs btn-warning" title="" data-toggle="tooltip" href="'.$base_url.'Units/delete/'.$d.'" data-original-title="Retrieve">
<i class="fa fa-undo"></i></a>';*/
				 $cn .= ' ';
            }
            $cn .= '</div>';
                          
            return $cn;
    })
    
);

echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns , $where1, $where2 ,$join)
);