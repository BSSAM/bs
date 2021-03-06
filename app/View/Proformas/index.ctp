<?php echo $this->Html->script(array('datatable/jquery-1.11.1.min','datatable/jquery.dataTables.min'));  ?>
<script>
 var _ROOT ='<?PHP echo Router::url('/',true); ?>';

$(function() {
 		
		
		 //// Search Input Element Add
		 
        html = '<tr>';
        $('#proformas-table-1 thead th').each(function(){
        html += '<th class ="color-change"><input type="text" placeholder="Search '+$(this).text()+'" /></th>';
        });
        html += '</tr>';

        //console.log(html);

        $('#proformas-table-1 thead').prepend(html);

        
        table = $('#proformas-table-1').DataTable( {
        //"bFilter" : false,
        "processing": true,
        "serverSide": true,
        //"scrollX": 1200,
		//"sScrollX": "100%",
        //"bScrollCollapse": true,
        "ajax": _ROOT+"datatable/job/proformas-table-1.php?edit=<?php echo $userrole_cus['edit'];?>"
        });
       
//        var pressed = false;
//        var start = undefined;
//        var startX, startWidth;
//
//        $("table th").mousedown(function(e) {
//            start = $(this);
//            pressed = true;
//            startX = e.pageX;
//            startWidth = $(this).width();
//            $(start).addClass("resizing");
//        });
//
//        $(document).mousemove(function(e) {
//            if(pressed) {
//                $(start).width(startWidth+(e.pageX-startX));
//            }
//        });
//
//        $(document).mouseup(function() {
//            if(pressed) {
//                $(start).removeClass("resizing");
//                pressed = false;
//            }
//        });
        
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
           if(colIdx == 7)
           {
                $('#proformas-table-1 thead tr:first select').on( 'change', function () {
                    table.column( colIdx ).search( $(this).val() ).draw();
                });    
            
            }
            else
            {
                $('#proformas-table-1 thead tr:first input:eq('+colIdx+')').on( 'keyup change', function () {
                    
                    console.log($(this).val());
                    table.column( colIdx ).search($(this).val()).draw();
                });
            }
        });

});
</script>    
<h1>
                                <i class="gi gi-user"></i>Proforma Invoice
                            </h1>
                        </div>
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                        <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
                        <li><?php echo $this->Html->link('Proforma Invoice',array('controller'=>'Proformas','action'=>'index')); ?></li>
                    </ul>
                    <!-- END Datatables Header -->
                    <?PHP echo $this->element('message'); ?>
                    <!-- Datatables Content -->
                    <div class="block full">
                        <div class="block-title">
                            <h2>List Of Proforma Invoice </h2> 
                            <h2 style="float:right;">
                             <?php if($user_role['job_proforma']['add'] == 1){ 
							  echo $this->Html->link('Add Proforma Invoice', array('controller' => 'Proformas', 'action' => 'add'), array('class' => 'btn btn-xs btn-primary', 'data-toggle' => 'tooltip', 'tile' => 'Add Proforma Invoice')); } ?></h2>
                        </div>
                        <div class="table-responsive">
                            <table id="proformas-table-1" class="table table-vcenter table-condensed table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">Sales Orders No</th>
                                        <th class="text-center">Reg Date</th>
                                        <th class="text-center">Phone</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Reference No</th>
                                        <th class="text-center">Download</th>
                                    </tr>
                                </thead>
                                </table>
         <input type="text" id="jump" class="pagination_search_input" placeholder="Page No">
    </div>
     <!-- <div class="btn-group btn-group-md">
                            <?php //echo $this->Form->input('status', array('id'=>'status_call','class'=>'form-control','label'=>false,'name'=>'status_call','type'=>'select','options'=>array('1'=>'Active','2'=>'Pending Approval','3'=>'InActive'),'empty'=>'Select Status')); ?>
      </div>-->
</div>
                            
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