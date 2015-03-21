<?php
include 'config.php';

	// DB table to use
	$table = 'salesorders as sals';
	$join = " LEFT JOIN customers as cus ON (sals.customer_id = cus.id)"; 
	$join .= " LEFT JOIN deliveryorders as delv ON (sals.id = delv.salesorder_id)"; 
	$join .= " LEFT JOIN invoices as ins ON (sals.id = ins.salesorder_id)"; 
	$join .= " LEFT JOIN cus_contactpersoninfos as ccpi ON (sals.attn = ccpi.id)"; 
	$join .= " LEFT JOIN branches as brnch ON (sals.branch_id = brnch.id)"; 
	
	// Table's primary key  
	$primaryKey = 'id';
	$res = $_GET['slsid'];
	if(!empty($res) && $res != 1 )
	{
		$sss = implode('","',explode(',',$res));
		$where1 = ' AND sals.is_deleted = 0 AND sals.is_trackcompleted = 0 AND sals.id IN("'.$sss.'")';
		$where2 = ' where sals.is_deleted = 0 AND sals.is_trackcompleted = 0 AND sals.id IN("'.$sss.'")';
	}
	else
	{
		$where1 = ' AND sals.is_deleted = 0 AND sals.is_trackcompleted = 0 ';
	
		$where2 = ' where sals.is_deleted = 0 AND sals.is_trackcompleted = 0';
	}
	
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
		
	array( 'db' => 'delv.delivery_order_date' , 'field' => 'delivery_order_date' , 'dt' => 4),			
		
	array( 'db' => 'ins.invoiceno' , 'field' => 'invoiceno' , 'dt' => 5 ),			
	
	array( 'db' => 'ins.invoice_date' , 'field' => 'invoice_date' , 'dt' => 6),			
			
		
    array( 'db' => 'sals.quotationno',  'dt' =>7, 'field' => 'quotationno' ),
	array( 'db' => 'sals.ref_no',   'dt' => 8, 'field' => 'ref_no' ),
    array( 'db' => 'sals.is_jobcompleted',     'dt' => 9 , 'field' => 'is_jobcompleted' , 'formatter' => function( $d, $row ) {
            return ($d == 1)?'Complete':'Incomplete';
        }),
		
	  array( 'db' => 'sals.id',     'dt' =>10 , 'field' => 'id' , 'formatter' => function( $d, $row ) {
            return '<input type="checkbox" name="data[TrackComplete]['.$d.']" value="'.$d.'" >';
        }),	
		
	array( 'db' => 'sals.remarks',  'dt' => 11, 'field' => 'remarks', 'formatter' => function( $d, $row ) {
            return '-';
        }),	
	array( 'db' => 'sals.id',     'dt' => 12 , 'field' => 'id' , 'formatter' => function( $d, $row ) {
            return '-';
        }),	
		
 	array( 'db' => 'cus.customername',  'dt' => 13, 'field' => 'customername' ),		
	
	array( 'db' => 'ccpi.name' , 'field' => 'name' , 'dt' => 14 ),		
		
	array( 'db' => 'brnch.branchname' , 'field' => 'branchname' , 'dt' => 15),			
		
);

echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns , $where1, $where2 ,$join)
);