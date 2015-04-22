<?php
include 'config.php';

// DB table to use
$table = 'procedures as pro';
$join = " LEFT JOIN  departments as dpt ON (pro.department_id = dpt.id)";
// Table's primary key
$primaryKey = 'pro.id';

$val = $_GET['val'];

if($val == 2)
{
    $where1 = ' AND pro.is_approved = 0 AND pro.is_deleted = 0';
    $where2 = ' where pro.is_approved = 0 AND pro.is_deleted = 0';
}
elseif($val == 3)
{
    $where1 = ' AND pro.is_deleted = 1';
    $where2 = ' where pro.is_deleted = 1';
}
else
{
    $where1 = ' AND pro.is_deleted = 0';
    $where2 = ' where pro.is_deleted = 0';
}
 
$columns = array(
    array( 'db' => 'pro.id', 'dt' => 0 , 'field' => 'id'),
    array( 'db' => 'pro.created', 'dt' => 1, 'field' => 'created'),
    array( 'db' => 'pro.procedure_no',  'dt' => 2 , 'field' => 'procedure_no'),
    array( 'db' => 'dpt.departmentname' , 'field' => 'departmentname' , 'dt' => 3),
    array( 'db' => 'pro.description',   'dt' => 4 , 'field' => 'description'),
    array( 'db' => 'pro.status',     'dt' => 5 , 'field' => 'status' , 'formatter' => function( $d, $row ) {
            return ($d == 1)?'<span class="label label-success">Active</span>':'<span class="label label-danger">In Active</span>';
        }),
    array( 'db' => 'pro.id', 'dt' => 6 , 'field' => 'id','formatter' => function ( $d, $row) {
            
            global $base_url;
            
            $cn = '<div class="btn-group">';
            $val = SSP::get_procedures_details($d);
            if(!$val[0]['is_deleted'])
            {
                if($_GET['edit']==1){
                    $cn .= '<a class="btn btn-xs btn-default" title="" data-toggle="tooltip" href="'.$base_url.'Procedures/edit/'.$d.'" data-original-title="Edit">
<i class="fa fa-pencil"></i></a>';
                }
                if($_GET['delete']==1){
                    $cn .= '<a class="btn btn-xs btn-danger" title="" data-toggle="tooltip" href="'.$base_url.'Procedures/delete/'.$d.'" data-original-title="Delete">
<i class="fa fa-times"></i></a>';
                }
            }
            else
            {
                /*$cn .= '<a onclick="confirm(\'Are you sure want to Retrieve?\');" class="btn btn-xs btn-warning" title="" data-toggle="tooltip" href="'.$base_url.'Procedures/delete/'.$d.'" data-original-title="Retrieve">
<i class="fa fa-undo"></i></a>';*/

				$cn .= '';
            }
            $cn .= '</div>';
                          
            return $cn;
    })
    
);

echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns , $where1, $where2 ,$join)
);