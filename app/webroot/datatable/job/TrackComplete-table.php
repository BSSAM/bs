<?php
include 'config.php';

	// DB table to use
	$table = 'sal_description as des';
	$join = " LEFT JOIN customers as cus ON (des.customer_id = cus.id)"; 
        $join .= " LEFT JOIN salesorders as sals ON (des.salesorder_id = sals.id)";
	$join .= " LEFT JOIN deliveryorders as delv ON (des.salesorder_id = delv.salesorder_id)"; 
	$join .= " LEFT JOIN invoices as ins ON (des.salesorder_id = ins.salesorder_id)"; 
	$join .= " LEFT JOIN cus_contactpersoninfos as ccpi ON (sals.attn = ccpi.id)"; 
	$join .= " LEFT JOIN branches as brnch ON (sals.branch_id = brnch.id)";
        $join .= " LEFT JOIN instruments as inst ON (des.instrument_id = inst.id)";
        $join .= " LEFT JOIN brands as bra ON (des.brand_id = bra.id)";
        $join .= " LEFT JOIN ranges as ran ON (des.sales_range = ran.id)";
        $join .= " LEFT JOIN departments as dept ON (des.department_id = dept.id)"; 
	
	// Table's primary key  
	$primaryKey = 'sals.id';
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
            return date( 'j-M-Y', strtotime($d));
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
            return '';
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
        array( 'db' => 'inst.name',  'dt' => 16, 'field' => 'name' ),	
        array( 'db' => 'bra.brandname',  'dt' => 17, 'field' => 'brandname' ),	
        array( 'db' => 'des.model_no',  'dt' => 18, 'field' => 'model_no' ),
        array( 'db' => 'ran.range_name',  'dt' => 19, 'field' => 'range_name' ),	
        array( 'db' => 'des.sales_calllocation',  'dt' => 20, 'field' => 'sales_calllocation' ),
        array( 'db' => 'des.sales_calltype',  'dt' => 21, 'field' => 'sales_calltype' ),
        array( 'db' => 'dept.departmentname',  'dt' => 22, 'field' => 'departmentname' ),
        array( 'db' => 'des.sales_unitprice',  'dt' => 23, 'field' => 'sales_unitprice' ),
        array( 'db' => 'des.title1_val',  'dt' => 24, 'field' => 'title1_val' ),
        array( 'db' => 'des.title2_val',  'dt' => 25, 'field' => 'title2_val' ),
        array( 'db' => 'des.title3_val',  'dt' => 26, 'field' => 'title3_val' ),
        array( 'db' => 'des.title4_val',  'dt' => 27, 'field' => 'title4_val' ),
        array( 'db' => 'des.title5_val',  'dt' => 28, 'field' => 'title5_val' ),
        
);

echo json_encode(
    SSP::simple1( $_GET, $sql_details, $table, $primaryKey, $columns , $where1, $where2 ,$join)
);