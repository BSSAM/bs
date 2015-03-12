<?php echo $this->Html->script(array('datatable/jquery-1.11.1.min','datatable/jquery.dataTables.min'));  ?>
<script>
 var _ROOT ='<?PHP echo Router::url('/',true); ?>';

$(function() {
 		
		
		 //// Search Input Element Add
		 
        html = '<tr>';
        $('#purchaserequisitions-table-1 thead th').each(function(){
        html += '<th><input type="text" placeholder="Search '+$(this).text()+'" /></th>';
        });
        html += '</tr>';

        //console.log(html);

        $('#purchaserequisitions-table-1 thead').prepend(html);

        
        table = $('#purchaserequisitions-table-1').DataTable( {
        //"bFilter" : false,
        "processing": true,
        "serverSide": true,
        //"scrollX": 1200,
		//"sScrollX": "100%",
        //"bScrollCollapse": true,
        "ajax": _ROOT+"datatable/job/purchaserequisitions-table-1.php?edit=<?php echo $userrole_cus['edit'];?>&delete=<?php echo $userrole_cus['delete'];?>"
        });
       
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
                $('#purchaserequisitions-table-1 thead tr:first select').on( 'change', function () {
                    table.column( colIdx ).search( $(this).val() ).draw();
                });    
            
            }
            else
            {
                $('#purchaserequisitions-table-1 thead tr:first input:eq('+colIdx+')').on( 'keyup change', function () {
                    
                    console.log($(this).val());
                    table.column( colIdx ).search($(this).val()).draw();
                });
            }
        });

});
</script>
                            <h1>
                                <i class="gi gi-user"></i>Purchase Requisition
                            </h1>
                        </div>
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                        <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
                        <li><?php echo $this->Html->link('Purchase Requisitions',array('controller'=>'PurchaseRequisitions','action'=>'index')); ?></li>
                    </ul>
                    <!-- END Datatables Header -->
                    <?PHP echo $this->element('message'); ?>
                    <!-- Datatables Content -->
                    <div class="block full">
                        <div class="block-title">
                            <h2>List Of Purchase Requistions</h2>
                            <?php if($userrole_cus['add']==1){ ?>
                            <h2 style="float:right;">
							<?php echo $this->Html->link('Add Purchase Requisition',array('controller'=>'PurchaseRequisitions','action'=>'add'),array('class'=>'btn btn-xs btn-primary','data-toggle'=>'tooltip','tile'=>'Add Purchase Requisition')); ?></h2>
                            <?php } ?>
                        </div>
                        
                        <div class="table-responsive">
                            <table id="purchaserequisitions-table-1" class="table table-vcenter table-condensed table-bordered">
                                <thead>
                                    <tr>
                                        <!--<th class="text-center"><i class="gi gi-user"></i></th>-->
                                        <th class="text-center">Purchase Requistion No</th>
                                        <th class="text-center">Reg Date</th>
                                        <th class="text-center">Branch</th>
                                        <th class="text-center">Customer</th>
                                        <th class="text-center">Phone</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Reference No</th>
                                        <th class="text-center">Action</th>
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