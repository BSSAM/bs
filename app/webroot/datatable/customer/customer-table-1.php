<?php
include 'config.php';

// DB table to use
$table = 'customers';

// Table's primary key
$primaryKey = 'id';

$val = $_GET['val'];

if($val == 2)
{
    $where1 = ' AND is_approved = 0 AND is_deleted = 0 AND is_default = 1';
    $where2 = ' where is_approved = 0 AND is_deleted = 0 AND is_default = 1';
}
elseif($val == 3)
{
    $where1 = ' AND is_deleted = 1 AND is_default = 1';
    $where2 = ' where is_deleted = 1 AND is_default = 1';
}
else
{
    $where1 = ' AND is_deleted = 0 AND is_default = 1';
    $where2 = ' where is_deleted = 0 AND is_default = 1';
}
 
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
			
            //$cn = '<div class="btn-group">'; 
			$cn = ' '; 
            
			/*if($val[0]['status']== 1){  
			$cn .= '<span class="label label-success">Active</span>'; } else {  $cn .= '<span class="label label-danger">In Active</span>'; }
			*/
			
			if(!$val[0]['is_deleted'])
            {
				
			if($val[0]['is_approved'] == 1)
            {
                if($_GET['instrument']==1){
					
                    $cn .= '<div class="btn-group"><a class="btn  btn-xs btn-primary" data-toggle="tooltip" href="'.$base_url.'Customers/instrument_map/'.$d.'" title="Map Instrument">Instrument</a></div>  ';

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
					 
					 
                    $cn .= '<div class="btn-group"><a class="btn  btn-xs btn-warning" data-toggle="tooltip" href="'.$base_url.$controller.'/'.$action.'/'.$d.'" title="Tags">'.$tag_name.'</a></div>  <br>';

                }
            }
           
                if($_GET['edit']==1){
                    $cn .= '<div class="btn-group"><a class="btn btn-xs btn-default" title="" data-toggle="tooltip" href="'.$base_url.'Customers/edit/'.$d.'" data-original-title="Edit"><i class="fa fa-pencil"></i></a></div>  ';
                }
                if($_GET['delete']==1){
                    $cn .= '<div class="btn-group"><a class="btn btn-xs btn-danger" title="" data-toggle="tooltip" href="'.$base_url.'Customers/delete/'.$d.'" data-original-title="Delete"><i class="fa fa-times"></i></a></div>  ';
                }
            }
            else
            {
               /* $cn .= '<a onclick="confirm(\'Are you sure want to Retrieve?\');" class="btn btn-xs btn-warning" title="" data-toggle="tooltip" href="'.$base_url.'Customers/delete/'.$d.'" data-original-title="Retrieve">
<i class="fa fa-undo"></i></a>';*/
				$cn .= '';
            }
           // $cn .= '</div>';
                          
            return $cn;
    })
    
);

echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns , $where1, $where2 )
);