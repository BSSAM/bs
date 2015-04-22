<?php
include 'config.php';

// DB table to use
$table = 'customers as cus';
$join = " LEFT JOIN  industries as ins ON (cus.industry_id = ins.id) LEFT JOIN  locations as loc ON (cus.location_id = loc.id)";
// Table's primary key
$primaryKey = 'cus.id';

$val = $_GET['val'];

if($val == 2)
{
    $where1 = ' AND cus.is_approved = 0 AND cus.is_deleted = 0 AND cus.is_default = 1';
    $where2 = ' where cus.is_approved = 0 AND cus.is_deleted = 0 AND cus.is_default = 1';
}
elseif($val == 3)
{
    $where1 = ' AND cus.is_deleted = 1 AND cus.is_default = 1';
    $where2 = ' where cus.is_deleted = 1 AND cus.is_default = 1';
}
else
{
    $where1 = ' AND cus.is_deleted = 0 AND cus.is_default = 1';
    $where2 = ' where cus.is_deleted = 0 AND cus.is_default = 1';
}
 
$columns = array(
    array( 'db' => 'cus.id', 'dt' => 0 , 'field' => 'id'),
    array( 'db' => 'cus.customername',  'dt' => 1 , 'field' => 'customername'),
	array( 'db' => 'cus.phone',   'dt' => 2 , 'field' => 'phone'),
    array( 'db' => 'cus.customertype',  'dt' => 3 , 'field' => 'customertype'),
	array( 'db' => 'ins.industryname',     'dt' => 4, 'field' => 'industryname' ),
	array( 'db' => 'loc.locationname',     'dt' => 5, 'field' => 'locationname'),
    array( 'db' => 'cus.id', 'dt' => 6 , 'field' => 'id','formatter' => function ( $d, $row) {
            
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
					 
					 
                    $cn .= '<div class="btn-group"><a class="btn  btn-xs btn-warning" data-toggle="tooltip" href="'.$base_url.$controller.'/'.$action.'/'.$d.'" title="Tags">'.$tag_name.'</a></div>';

                }
            }
           
                if($_GET['edit']==1){
                    $cn .= '&nbsp;<div class="btn-group"><a class="btn btn-xs btn-default" title="" data-toggle="tooltip" href="'.$base_url.'Customers/edit/'.$d.'" data-original-title="Edit"><i class="fa fa-pencil"></i></a></div>  ';
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
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns , $where1, $where2,$join )
);