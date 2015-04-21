<?php
include 'config.php';

// DB table to use
$table = 'instruments as ins';
$join = " LEFT JOIN  departments as dpt ON (ins.department_id = dpt.id)";

// Table's primary key
$primaryKey = 'id';

$val = $_GET['val'];

if($val == 2)
{
    $where1 = ' AND ins.is_approved = 0 AND ins.is_deleted = 0';
    $where2 = ' where ins.is_approved = 0 AND ins.is_deleted = 0';
}
elseif($val == 3)
{
    $where1 = ' AND ins.is_deleted = 1';
    $where2 = ' where ins.is_deleted = 1';
}
else
{
    $where1 = ' AND ins.is_deleted = 0';
    $where2 = ' where ins.is_deleted = 0';
}
  
$columns = array(
    array( 'db' => 'ins.id', 'dt' => 0 , 'field' => 'id'),
    array( 'db' => 'ins.created', 'dt' => 1, 'field' => 'created'),
    array( 'db' => 'ins.name',  'dt' => 2 ,'field' => 'name'),
    array( 'db' => 'ins.description',   'dt' => 3 ,'field' => 'description'),
    array( 'db' => 'dpt.departmentname',     'dt' => 4 ,'field' => 'departmentname'),
    array( 'db' => 'ins.status', 'dt' => 5 ,'field' => 'status', 'formatter' => function( $d, $row ) {
            return ($d == 1)?'<span class="label label-success">Active</span>':'<span class="label label-danger">In Active</span>';
        }),
    array( 'db' => 'ins.id', 'dt' => 6 ,'formatter' => function ( $d, $row) {
            
            global $base_url;
            
            $cn = '<div class="btn-group">';
            $val = SSP::get_instrument_details($d);
            if(!$val[0]['is_deleted'])
            {
                if($_GET['edit']==1){
                    $cn .= '<a class="btn btn-xs btn-default" title="" data-toggle="tooltip" href="'.$base_url.'instruments/edit/'.$d.'" data-original-title="Edit">
<i class="fa fa-pencil"></i></a>';
                }
                if($_GET['delete']==1){
                    $cn .= '<a class="btn btn-xs btn-danger" title="" data-toggle="tooltip" href="'.$base_url.'instruments/delete/'.$d.'" data-original-title="Edit">
<i class="fa fa-times"></i></a>';
                }
            }
            else
            {
                /*$cn .= '<a onclick="confirm(\'Are you sure want to Retrieve?\');" class="btn btn-xs btn-warning" title="" data-toggle="tooltip" href="'.$base_url.'instruments/delete/'.$d.'" data-original-title="Edit">
<i class="fa fa-undo"></i></a>';*/

				 $cn .= '';
            }
            $cn .= '</div>';
                          
            return $cn;
    },'field' => 'id')
    
);

echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns , $where1, $where2, $join )
);