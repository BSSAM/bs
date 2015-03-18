<?php
include 'config.php';

// DB table to use
$table = 'salesorders as sals';
$join = " LEFT JOIN customers as cus ON (sals.customer_id = cus.id)"; 
// Table's primary key
$primaryKey = 'id';
 

    $where1 = ' AND sals.is_deleted = 0 AND sals.is_trackcompleted = 0';
    $where2 = ' where sals.is_deleted = 0 AND sals.is_trackcompleted = 0';

 
$columns = array(
    array( 'db' => 'sals.id', 'dt' => 0 , 'field' => 'id'),
    array(
        'db'        => 'sals.due_date',
        'dt'        => 1 , 'field' => 'due_date',
        'formatter' => function( $d, $row ) {
            return date( 'F jS, Y h:i A', strtotime($d));
        }),
		
	array( 'db' => 'sals.id' , 'field' => 'id' , 'dt' => 2,'formatter' => function( $d, $row ) {
            
			return SSP::find_deliveryorder_nos($d);
    } ),			
	
	array( 'db' => 'sals.id' , 'field' => 'id' , 'dt' => 3,'formatter' => function( $d, $row ) {
            
			return SSP::find_deliveryorder_no($d);
    } ),			
		
	array( 'db' => 'sals.id' , 'field' => 'id' , 'dt' => 4,'formatter' => function( $d, $row ) {
            
			return SSP::find_deliveryorder_date($d);
    } ),			
		
	array( 'db' => 'sals.id' , 'field' => 'id' , 'dt' => 5,'formatter' => function( $d, $row ) {
            
			return SSP::find_invoice_no($d);
    } ),			
	
	array( 'db' => 'sals.id' , 'field' => 'id' , 'dt' => 6,'formatter' => function( $d, $row ) {
            
			return SSP::find_invoice_date($d);
    } ),			
			
		
    array( 'db' => 'sals.quotationno',  'dt' =>7, 'field' => 'quotationno' ),
	array( 'db' => 'sals.ref_no',   'dt' => 8, 'field' => 'ref_no' ),
    array( 'db' => 'sals.is_jobcompleted',     'dt' => 9 , 'field' => 'is_jobcompleted' , 'formatter' => function( $d, $row ) {
            return ($d == 1)?'Complete':'Incomplete';
        }),
		
	  array( 'db' => 'sals.id',     'dt' =>10 , 'field' => 'id' , 'formatter' => function( $d, $row ) {
            return '<input type="checkbox" name="data[TrackComplete]['.$d.']" value="'.$d.'" >';
        }),	
		
	array( 'db' => 'sals.remarks',  'dt' => 11, 'field' => 'remarks' ),	
	array( 'db' => 'sals.id',     'dt' => 12 , 'field' => 'id' , 'formatter' => function( $d, $row ) {
            return '-';
        }),	
		
 	array( 'db' => 'cus.customername',  'dt' => 13, 'field' => 'customername' ),		
	
	array( 'db' => 'sals.attn' , 'field' => 'attn' , 'dt' => 14,'formatter' => function( $d, $row ) {
            
			return SSP::salesperson($d);
    } ),		
		
	array( 'db' => 'sals.branch_id' , 'field' => 'branch_id' , 'dt' => 15,'formatter' => function( $d, $row ) {
            
			return SSP::get_branch_name($d);
    } ),			
		
);

echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns , $where1, $where2 ,$join)
);