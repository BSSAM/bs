 <?php echo $this->Html->script(array('plugins'));  ?>
 <script>
    var _ROOT ='<?PHP echo Router::url('/',true); ?>';
	 var path_url='<?PHP echo Router::url('/',true); ?>';
    $(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="col-md-12 list_quotation"><select name="query_input[]" class="form-control"><option value="Salesorder.id">Salesorder No</option><option value="Salesorder.due_date">Due Date</option><option value="Salesorder.customername">Customer Name</option><option value="Device.model_no">Model No</option><option value="Device.quantity">Quantity</option></select><select name="equal_input[]" class="form-control"><option value="=">Equal</option><option value="!=">Not Equal</option><option value="<=">Start With</option><option value=">=">End With</option><option value="LIKE">Contains</option></select><input type="text" name="val[]" class="form-control"/><button class="remove_field">-</button></div>'); 
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});



</script>
<style>
.new_scroll2{width:100% !important; overflow: auto;}
#example-datatable_wrapper .col-xs-5{ width:30% !important;}
.submit2 { margin-right:10px;}
</style>
<h1>
    <i class="gi gi-user"></i>Tracking System
</h1>
</div>
</div>
<ul class="breadcrumb breadcrumb-top">
    <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
    <li><?php echo $this->Html->link('Tracking System',array('controller'=>'Tracks','action'=>'index')); ?></li>
</ul>
<!-- END Datatables Header -->
            <?PHP echo $this->element('message');?>            
<!-- Datatables Content -->


   <div class="block">
                              
        <div class="panel panel-default">
              <div class="panel-body panel-body-nopadding">
              
              		<div class="col-md-12">
                        <h2 class="pull-left">Tracking System</h2>
                        
                            <div class="pull-right" style="margin-top: 30px;"><?php echo $this->Html->link('Generate Report',array('controller' => 'Tracks','action' => 'reportfinal','full_base' => true),array('class'=>'btn btn-xs btn-primary','data-toggle'=>'tooltip','title'=>'Generate Report')); ?></div>
                
                    </div> 
                    <div class="nav-pills-border-color"></div>
                   <br><br>  
                  <!-- BASIC WIZARD -->
                  <div id="basicWizard" class="basic-wizard">
                                        
                      <ul class="nav nav-pills nav-justified " data-toggle="tabs" id="tabs">
                           <li class="active"><a href="#tab1" data-toggle="tab">In Complete</a></li>
                           <li class=""><a href="#tab2" data-toggle="tab"> Completed </a></li>
                      </ul>
                                            
                   <div class="nav-pills-border-color"></div>
                   <br><br>
                   
                                            
    <div class="tab-content">
                                            
      <div class="tab-pane active" id="tab1">
       <?php echo $this->Html->script(array('datatable/jquery-1.11.1.min','datatable/jquery.dataTables.min')); 
	   
	   if($request_search != 1)  $res = implode(',',$request_search); else $res = 1; ?> 
       
       <script>
	  
	   $(function() {
 		
		 //// Search Input Element Add
		
        html = '<tr>';
        $('#TrackInComplete-table thead th').each(function(){
        html += '<th class ="color-change"><input type="text" placeholder="Search '+$(this).text()+'" /></th>';
        });
        html += '</tr>';

        //console.log(html);
		
        $('#TrackInComplete-table thead').prepend(html);

        table = $('#TrackInComplete-table').DataTable( {
        //"bFilter" : false,
        "processing": true,
        "serverSide": true,
        //"scrollX": 1200,
		//"sScrollX": "100%",
        //"bScrollCollapse": true,
		
		"ajax": _ROOT+"datatable/job/TrackInComplete-table.php?slsid=<?php echo $res; ?>"
        });
      /*  var pressed = false;
        var start = undefined;
        var startX, startWidth;

        $("table th").mousedown(function(e) {
            start = $(this);
            pressed = true;
            startX = e.pageX;
            startWidth = $(this).width();
            $(start).addClass("resizing");
        });

        $(document).mousemove(function(e) {
            if(pressed) {
                $(start).width(startWidth+(e.pageX-startX));
            }
        });

        $(document).mouseup(function() {
            if(pressed) {
                $(start).removeClass("resizing");
                pressed = false;
            }
        });*/
        
        setTimeout(function(){
            
            $('.dataTable ').after("<div class='new_scroll'></div>");
            $( '.dataTable' ).appendTo( ".new_scroll" );
            
        }, 1000);
        
        $("#jump").on( 'keyup change', function () {

        var info = table.page.info();

        page = (parseInt($(this).val()) - 1);

        if($.isNumeric(page) && info.pages >= page)
        table.page(page).draw( false );
        else
        table.page(0).draw( false );

        });




        table.columns().eq( 0 ).each( function ( colIdx ) {
           /*if(colIdx == 7)
           {
                $('#TrackInComplete-table thead tr:first select').on( 'change', function () {
                    table.column( colIdx ).search( $(this).val() ).draw();
                });    
            
            }
            else
            {*/
                $('#TrackInComplete-table thead tr:first input:eq('+colIdx+')').on( 'keyup change', function () {
                    
                    console.log($(this).val());
                    table.column( colIdx ).search($(this).val()).draw();
                });
           // }
        });
		
		

});
</script>
                	    <div class="datalog" > <?php //pr($request_search); ?>
                         <form method="post">
                 <?PHP  //echo $this->Form->create('Tracks', array('action' => 'tracklist', 'class' => 'form-horizontal form-bordered')); ?>
                    <div class="col-md-12 custom_calculate">
                    <?php echo $this->Form->input('gate', array('id'=>'gate','class'=>'form-control','label'=>false,'name'=>'gate','type'=>'select','options'=>array('AND'=>'AND','OR'=>'OR'))); ?>
                   <button class="add_field_button pull-right">+</button></div>
                    <div class="input_fields_wrap">
                
             
                    </div>
                    
                    <div class="input submit col-md-12 ">
                        <div class="submit pull-right">
                            <?php echo $this->Form->input('Proceed', array('id'=>'submit','class'=>'btn btn-primary','label'=>false,'name'=>'submit','type'=>'submit')); ?>
                        </div>
                    </div></form>
                     <?PHP //$this->Form->end(); ?>
                </div>
               
                       <form method="post">
                        <?PHP   //echo $this->Form->create('Tracks1', array('action' => 'tracklist')); ?>             
                        <div class="table-responsive">
                    	  
                             <div style=" margin-left: 50px;margin-right: 1px;" class="submit2 pull-right">
                            <?php echo $this->Form->input('Save', array('class'=>'btn btn-warning','label'=>false,'name'=>'salestrack','type'=>'submit')); ?>
                        	</div>
                            <table id="TrackInComplete-table" class="table table-vcenter table-condensed table-bordered">
                                <thead>
                                    <tr>
                                        <!--<th class="text-center">ID</th>-->
                                        <th class="text-center">Salesorder No</th>
                                        <th class="text-center">Due Date</th>
                                        <th class="text-center">No of Delivery orders</th>
                                        <th class="text-center">Deliveryorder No</th>
                                        <th class="text-center">Deliveryorder Date</th>
                                        <th class="text-center">Invoice No</th>
                                        <th class="text-center">Invoice Date</th>
                                        <th class="text-center">Quotation No</th>
                                        <th class="text-center">Ref No</th>
                                        <th class="text-center">Job Status</th>
                                        <th class="text-center">Completed</th>
                                        <th class="text-center">Remarks</th>
                                        <th class="text-center">Responsible Person</th>
                                        <th class="text-center">Customer Name</th>
                                        <th class="text-center">Salesperson Name</th>
                                        <th class="text-center">Branch Name</th>
                                    </tr>
                                </thead>
                               </table>
         						<input type="text" id="jump" class="pagination_search_input" placeholder="Page No">
   						
                            <?php echo $this->Html->script('pages/uiProgress'); ?>
                            <script>$(function(){ UiProgress.init(); });</script>
                            <?php if ($this->Session->flash() != '') { ?>
                                <script> var UiProgress = function() {
                                    // Get random number function from a given range
                                    var getRandomInt = function(min, max) {
                                        return Math.floor(Math.random() * (max - min + 1)) + min;
                                    };
                                }();
                                </script> 
                            <?php } ?>
                            
                                    <?PHP 
                                    $excel = array();
                                    $excel[] = array();
                                    $excel[] = array('ID','Salesorder No','Due Date','No of Delivery orders','Deliveryorder No','Deliveryorder Date','Invoice No','Invoice Date','Quotation No','Ref No','Job Status','Remarks','Responsible Person','Customer Name','Salesperson Name','Branch Name');
                                    
                                    
                                    if(!empty($track_list)): ?>
                                    <?PHP foreach($track_list as $k=>$track): ?>
                                    
                                    <?PHP 
                                    if($track['Salesorder']['is_jobcompleted']==1){ $a = "Complete"; }else{ $a = "Incomplete"; }
                                    $excel[] = array(($k+1),$track['Salesorder']['id'],$track['Salesorder']['due_date'],$this->Salesorder->find_deliveryorder_nos($track['Salesorder']['id']),
                                        $this->Salesorder->find_deliveryorder_no($track['Salesorder']['id']),$this->Salesorder->find_deliveryorder_date($track['Salesorder']['id']),$this->Salesorder->find_invoice_no($track['Salesorder']['id']),
                                        $this->Salesorder->find_invoice_date($track['Salesorder']['id']),$track['Salesorder']['quotationno'],$track['Salesorder']['ref_no'],$a,
                                        $track['Salesorder']['remarks'],'-',$this->Salesorder->find_sales_order_customer($track['Salesorder']['id']),$this->Salesorder->salesperson($track['Salesorder']['attn']),$track['branch']['branchname']);
                                    
                                    endforeach; ?>
                                    <?PHP endif; ?>
                                    <?php 
                                    $foldername = APP."webroot/excel";
                                    $file = fopen($foldername.'/tracking.csv', 'w');
                                    foreach($excel as $row) {
                                    fputcsv($file, $row);
                                    } 
                                    ?>
                             
                      		
                        </div> 
                        </form>
                        <?PHP //$this->Form->end(); ?>
                	</div>  <!--tab 1 end -->
                    
                    <div class="tab-pane" id="tab2">
                     	
                          <?PHP echo $this->element('Salesorders/trackingcomplete'); ?>
                  
                    
                    </div>  <!--tab 2 end --> 
                    
    			</div>  <!--tab end -->
    
    		</div>
           </div>
         </div>
   </div>
       
        
        