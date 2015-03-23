<?php echo $this->Html->script(array('datatable/jquery-1.11.1.min','datatable/jquery.dataTables.min'));  ?>
<script>
 var _ROOT ='<?PHP echo Router::url('/',true); ?>';

$(function() {
 		
		
		 //// Search Input Element Add
		 
        html = '<tr>';
        $('#Reqpurchaseorders-table-1 thead th').each(function(){
        html += '<th class ="color-change"><input type="text" placeholder="Search '+$(this).text()+'" /></th>';
        });
        html += '</tr>';

        //console.log(html);

        $('#Reqpurchaseorders-table-1 thead').prepend(html);

        
        table = $('#Reqpurchaseorders-table-1').DataTable( {
        //"bFilter" : false,
        "processing": true,
        "serverSide": true,
        //"scrollX": 1200,
		//"sScrollX": "100%",
        //"bScrollCollapse": true,
        "ajax": _ROOT+"datatable/job/Reqpurchaseorders-table-1.php?edit=<?php echo $userrole_cus['edit'];?>&delete=<?php echo $userrole_cus['delete'];?>"
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
                $('#Reqpurchaseorders-table-1 thead tr:first select').on( 'change', function () {
                    table.column( colIdx ).search( $(this).val() ).draw();
                });    
            
            }
            else
            {
                $('#Reqpurchaseorders-table-1 thead tr:first input:eq('+colIdx+')').on( 'keyup change', function () {
                    
                    console.log($(this).val());
                    table.column( colIdx ).search($(this).val()).draw();
                });
            }
        });
		
		
        $("#quoat_list").hide();
        $("#ReqpurchaseorderPrequistionId").keyup(function() 
        { 
            var preq_id = $(this).val();
            var dataString = 'id='+ preq_id;
            if(preq_id!='')
            {
                $.ajax({
                    type: "POST",
                    url: "<?PHP echo Router::url('/',true); ?>/Reqpurchaseorders/preq_search",
                    data: dataString,
                    cache: false,
                    success: function(html)
                    {
                        $("#quoat_list").html(html).show();
                    }
                });
            }return false;    
        });
          });
        $(document).ready(function(){
        $('.pr_search').click(function(){
       
        var quotation_single_id =   $('#ReqpurchaseorderPrequistionId').val();
        // alert(quotation_single_id);
            $.ajax({
               type:'POST',
               url:"<?PHP echo Router::url('/',true); ?>/Reqpurchaseorders/check_pr_count",
               data:'single_quote_id='+quotation_single_id,
               success:function(data){
           //alert('sdf');
                   if(data=='success')
                   {
                       //alert('sdfsdf');
                     $('#ReqpurchaseorderPrPurchaseorderForm').submit();
                   }
                   if(data=='failure')
                   {
                        $('#ReqpurchaseorderPrequistionId').css('border','1px solid red');
                        return false;
                   }
               }
            });

         });
          });
      
</script>                
<h1>
    <i class="gi gi-user"></i>PR_Purchase order
</h1>
                    </div>
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                        <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
                        <li><?php echo $this->Html->link('PR_Purchase order',array('controller'=>'Reqpurchaseorders','action'=>'index')); ?></li>
                    </ul>
                    <!-- END Datatables Header -->
                    <?PHP echo $this->element('message'); ?>
                    <!-- Datatables Content -->
                    <div class="block full">
                        <div class="block-title">
                            <h2>List Of PR_Purchase order </h2> 
                        </div>
                        <div class="block full row col-sm-12 padding_t_b10">
                        <div class="form-actions  col-sm-7 pull-right">
                            <div class="col-md-4 pull-left">
                                <?PHP echo $this->Form->create('Reqpurchaseorder', array('controller'=>'Reqpurchaseorders','action' => 'pr_purchaseorder', 'class' => 'form-horizontal form-bordered')); ?>
                            </div>
                              <?php if($userrole_cus['add'] == 1) { ?>
                            <div class="input-group col-md-8 pull-right quot_display">
                                <?PHP echo $this->Form->input('prequistion_id', array('placeholder' => 'Purchase Requistion No', 'class' => 'form-control',
                                    'div' => false, 'label' => false, 'type' => 'text', 'autoComplete' => 'off'))
                                ?>
                                <span class="input-group-btn">
                                    <button class="btn btn-primary pr_search" type="submit">Proceed</button>
                                </span> 
                                <div id="quoat_list" class="instrument_drop"> </div>
                            </div>
                            <?php } ?>
                            
                      </div>
                            
		<?PHP $this->Form->end(); ?>
                            
                       </div>
                        <div class="table-responsive">
                            <table id="Reqpurchaseorders-table-1" class="table table-vcenter table-condensed table-bordered">
                                <thead>
                                    <tr>
                                        <!--<th class="text-center"><i class="gi gi-user"></i></th>-->
                                        <th class="text-center">Purchase Requistion</th>
                                        <th class="text-center">Date</th>
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