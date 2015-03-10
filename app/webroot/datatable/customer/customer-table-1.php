<?php
include 'config.php';

// DB table to use
$table = 'customers';
$where = ''; 
// Table's primary key
$primaryKey = 'id';
 
$columns = array(
    array( 'db' => 'id', 'dt' => 0 ),
    array( 'db' => 'customername',  'dt' => 1 ),
	array( 'db' => 'phone',   'dt' => 2 ),
    array( 'db' => 'customertype',  'dt' => 3 ),
	array( 'db' => 'industry_id',     'dt' => 4,'formatter' => function( $d, $row ) {
            
			return SSP::get_industryname($d);
    } ),
	array( 'db' => 'location_id',     'dt' => 5,'formatter' => function( $d, $row ) {
            
			return SSP::get_locationname($d);
    } ),
    array( 'db' => 'id', 'dt' => 6 ,'formatter' => function ( $d, $row) {
            
            global $base_url;
			
            $val = SSP::get_customers_details($d);
			
            $cn = '<div class="btn-group">'; 
            
			/*if($val[0]['status']== 1){  
			$cn .= '<span class="label label-success">Active</span>'; } else {  $cn .= '<span class="label label-danger">In Active</span>'; }
			*/
			if($val[0]['is_approved'] == 1)
            {
                if($_GET['instrument']==1){
					
                    $cn .= '<a class="btn  btn-xs btn-primary" data-toggle="tooltip" href="'.$base_url.'Customers/instrument_map/'.$d.'" title="Map Instrument">Instrument</a>';

                }
                if($_GET['tag']==1){
					
					 					$tag_count = SSP::get_tag_count($val[0]['customergroup_id']);
					 					if($tag_count == 1):
                                        $tag_name   = 'Add Tag';
                                        $controller='Customertaglists';$action='add' ;
                                        else:
                                        $tag_name   = 'Tag list';$controller='Customertaglists';
                                        $action='index';
                                        endif;
					 
					 
                    $cn .= '<a class="btn  btn-xs btn-warning" data-toggle="tooltip" href="'.$base_url.$controller.'/'.$action.'/'.$d.'" title="Tags">'.$tag_name.'</a>';

                }
            }
			
            if(!$val[0]['is_deleted'])
            {
                if($_GET['edit']==1){
                    $cn .= '<a class="btn btn-xs btn-default" title="" data-toggle="tooltip" href="'.$base_url.'Customers/edit/'.$d.'" data-original-title="Edit">
<i class="fa fa-pencil"></i></a>';
                }
                if($_GET['delete']==1){
                    $cn .= '<a class="btn btn-xs btn-danger" title="" data-toggle="tooltip" href="'.$base_url.'Customers/delete/'.$d.'" data-original-title="Delete">
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
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns ,$where)
);