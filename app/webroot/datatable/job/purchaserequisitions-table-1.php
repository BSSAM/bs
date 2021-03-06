<?php
include 'config.php';

// DB table to use
$table = ' prequistions';
$join = '';
// Table's primary key
$primaryKey = 'id';
$val = '';
//'1'=>'Active','2'=>'Pending Approval','3'=>'InActive'

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
    array( 'db' => 'prequistionno', 'dt' => 0 ,'field' => 'prequistionno'),
    array( 'db' => 'reg_date', 'dt' => 1 ,'field' => 'reg_date'),
   array( 'db' => 'branch_id', 'dt' => 2,'field' => 'branch_id','formatter' => function( $d, $row ) {
            
			return SSP::get_branchname($d);
    } ),
    array( 'db' => 'customername', 'dt' =>3 ,'field' => 'customername'),
    array( 'db' => 'phone', 'dt' => 4 ,'field' => 'phone'),
    array( 'db' => 'email', 'dt' => 5 ,'field' => 'email'),
    array( 'db' => 'id', 'dt' => 6 ,'field' => 'id','formatter' => function ( $d, $row) {
            
			$val = SSP::get_prequistions_details($d);
			
            if($val[0]['po_generate_type'] == 'Auotmatic'){$cn = '<span class="label label-danger">'.$val[0]['ref_no'].' </span>';}
			elseif($val[0]['po_generate_type'] == 'Manual'){$cn = '<span class="label label-success">'.$val[0]['ref_no'].' </span>';}
			else{$cn = '<span class="label label-warning">'.$val[0]['ref_no'].' </span>';}
			if(!empty($val[0]['ref_no'])) return $cn; 
			
    } ),
    array( 'db' => 'id', 'dt' => 7,'field' => 'id' ,'formatter' => function ( $d, $row) {
		
            global $base_url;
            
            $cn = '<div class="btn-group">';
            $val = SSP::get_prequistions_details($d);
            if(!$val[0]['is_deleted'])
            {
                if($_GET['edit']==1){
                    $cn .= '<a class="btn btn-xs btn-default" title="" data-toggle="tooltip" href="'.$base_url.'PurchaseRequisitions/edit/'.$d.'" data-original-title="Edit">
<i class="fa fa-pencil"></i></a>';
                }
				
				 if($_GET['delete']==1){
                    $cn .= '<a class="btn btn-xs btn-danger" title="" data-toggle="tooltip" href="'.$base_url.'PurchaseRequisitions/delete/'.$d.'" data-original-title="Delete">
<i class="fa fa-times"></i></a>';
                }
                if($val[0]['is_manager_approved']==1)
                {
                $cn .= '<a class="btn btn-xs btn-default" title="" data-toggle="tooltip" href="'.$base_url.'PurchaseRequisitions/pdf/'.$d.'" data-original-title="Report">
<i class="gi gi-print"></i></a>';
                }
               
            }
            else
            {
                $cn .='';
//                $cn .= '<a onclick="confirm(\'Are you sure want to Retrieve?\');" class="btn btn-xs btn-warning" title="" data-toggle="tooltip" href="'.$base_url.'Salesorders/r/'.$d.'" data-original-title="Retrieve">
//<i class="fa fa-undo"></i></a>';
            }
            $cn .= '</div>';
                          
            return $cn;
    },'field' => 'id')
    
);
   // print_r($columns);
//print_r($_GET);exit;
echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns, $where1, $where2, $join )
);