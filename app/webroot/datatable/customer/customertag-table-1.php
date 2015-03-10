<?php
include 'config.php';

// DB table to use
$table = 'customers';
$group_id = $_GET['group_id'];
//$where = "where customergroup_id = '".$group_id."'";

// Table's primary key
$primaryKey = 'id';

$valus = $_GET['val'];
//'1'=>'Active','2'=>'Pending Approval','3'=>'InActive'

	if($valus == 2)
	{
		$where = "where is_approved = 0 AND is_deleted = 0  AND customergroup_id = '".$group_id."'";
	}
	elseif($valus == 3)
	{
		$where = "where is_deleted = 1 AND customergroup_id = '".$group_id."'";
	}
	else
	{
		$where = "where customergroup_id = '".$group_id."'";
	}

 
$columns = array(
    array( 'db' => 'id', 'dt' => 0 ),
    array( 'db' => 'customername',  'dt' => 1 ),
    array( 'db' => 'customertype',  'dt' => 2 ),
	array( 'db' => 'industry_id',     'dt' => 3,'formatter' => function( $d, $row ) {
            
			return SSP::get_industryname($d);
    } ),
	
    array( 'db' => 'id', 'dt' => 4 ,'formatter' => function ( $d, $row) {
            
            global $base_url;
			
           $val = SSP::get_customers_details($d);
			
            $cn = '<div class="btn-group">'; 
            
			/*if($val[0]['status']== 1){  
			$cn .= '<span class="label label-success">Active</span>'; } else {  $cn .= '<span class="label label-danger">In Active</span>'; }
			*/
			
            if(!$val[0]['is_deleted'])
            {
                if($_GET['edit']==1){
                    $cn .= '<a class="btn btn-xs btn-default" title="" data-toggle="tooltip" href="'.$base_url.'Customertaglists/edit/'.$d.'" data-original-title="Edit">
<i class="fa fa-pencil"></i></a>';
                }
                if($_GET['delete']==1){
                    $cn .= '<a class="btn btn-xs btn-danger" title="" data-toggle="tooltip" href="'.$base_url.'Customertaglists/delete/'.$d.'" data-original-title="Delete">
<i class="fa fa-times"></i></a>';
                }
            }
            else
            {
                $cn .= '<a onclick="confirm(\'Are you sure want to Retrieve?\');" class="btn btn-xs btn-warning" title="" data-toggle="tooltip" href="'.$base_url.'Customers/delete/'.$d.'" data-original-title="Retrieve">
<i class="fa fa-undo"></i></a>';
            }
            $cn .= '</div>';
             
            return $cn;
    })
    
);

echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns , $where )
);