<?php echo $this->Html->script(array('datatable/jquery-1.11.1.min','datatable/jquery.dataTables.min'));  ?>
<script>
     var path_url = '<?PHP echo Router::url('/',true); ?>';
        var _ROOT ='<?PHP echo Router::url('/',true); ?>';
        $(function() {
       
        ///  Status  Cond
        
        <?PHP if(isset($_GET['val'])){ ?>
        var valu  ='<?PHP echo $_GET['val']; ?>';
        <?php } else { ?>
        var valu ='<?php echo '1'; ?>';
        <?php } ?>


        $('#status_call').change(function() {   // replace the ID_OF_YOUR_SELECT_BOX with the id to your select box given by Cake
        var val = $(this).val(); 
        window.location = _ROOT + 'Salesorders/index/?val=' + val;

        });
        
        //// Search Input Element Add
    
        html = '<tr>';
        $('#salesorder-table-1 thead th').each(function(){
        html += '<th class ="color-change"><input type="text" placeholder="Search '+$(this).text()+'" /></th>';
        });
        html += '</tr>';

        //console.log(html);

        $('#salesorder-table-1 thead').prepend(html);

        table = $('#salesorder-table-1').DataTable( {
        //"bFilter" : false,
        "processing": true,
        "serverSide": true,
        //"scrollX": 1200,
        
	//"sScrollX": "100%",
        //"bScrollCollapse": true,
        "ajax": _ROOT+"datatable/job/salesorder-table-1.php?edit=<?php echo $userrole_cus['edit'];?>&delete=<?php echo $userrole_cus['delete'];?>&val="+valu
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
        
        
        //// Search Pages
        $("#jump").on( 'keyup change', function () {

        var info = table.page.info();

        page = (parseInt($(this).val()) - 1);

        if($.isNumeric(page) && info.pages >= page)
        table.page(page).draw( false );
        else
        table.page(0).draw( false );

        });

        //// Search Result

        table.columns().eq( 0 ).each( function ( colIdx ) {
           if(colIdx == 5)
           {
                $('#salesorder-table-1 thead tr:first select').on( 'change', function () {
                    table.column( colIdx ).search( $(this).val() ).draw();
                });    
            
            }
            else
            {
                $('#salesorder-table-1 thead tr:first input:eq('+colIdx+')').on( 'keyup change', function () {
                    table.column( colIdx ).search($(this).val()).draw();
                });
            }
        });
       
});
</script>
<script type="text/javascript">
    $(function(){
        $("#quoat_list").hide();
        $("#SalesorderQuotationId").keyup(function() 
        { 
            var device_status   =    $('input:radio[name=quotation_device_status]:checked').val();
            var quotation_id = $(this).val();
            var customer_id = $('#val_customer').val();
            var customer_single_id =   $('#customer_id').val();
            var dataString = 'id='+ quotation_id+'&device_status='+device_status+'&single_cus_id='+customer_single_id;
            if(quotation_id!='')
            {
                $.ajax({
                    type: "POST",
                    url: "<?PHP echo Router::url('/',true); ?>/Salesorders/quotation_search",
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
</script>

<?php if(isset($_GET['val'])) { 
    if($_GET['val'] == 3) { ?>
<style>
    table.dataTable td{ color: red;  border:1px lightgrey;}
</style>
<?php } if($_GET['val'] == 2) { ?>
<style>
    table.dataTable td{ color: #860000;}
</style>
<?php }} ?>
<style>
    #result{
        margin-top: 35px;
    }
</style>
<h1>
                                <i class="fa fa-table"></i>Salesorder
                            </h1>
                        </div>
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                        <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
                        <li><?php echo $this->Html->link('Salesorder',array('controller'=>'Salesorders','action'=>'index')); ?></li>
                    </ul>
                    <!-- END Datatables Header -->
                    <?php echo $this->element('message');?>
                    <!-- Datatables Content -->
                    <div class="block full">
                        <div class="block-title">
                            <h2>List Of Salesorders <?php if(isset($_GET['val'])) { if($_GET['val'] == 2) {  echo "- Pending Approval"; }if($_GET['val'] == 3) { echo "- InActive"; } }?></h2>
                            <?php if($userrole_cus['add']==1){ ?>
                            <h2 style="float:right;"><?php echo $this->Html->link('Add Salesorder',array('controller'=>'Salesorders','action'=>'add'),array('class'=>'btn btn-xs btn-primary','data-toggle'=>'tooltip','tile'=>'Add Salesorder')); ?></h2>
                            <?php } ?>
                        </div>
                    
                        <div class="block full row col-sm-12 padding_t_b10">
<!--                             <label class="col-md-2 control-label">Existing Quotation</label>-->
                        <div class="form-actions  col-sm-7 pull-right">
                            <div class="col-md-4 pull-left">
                               
                            <?PHP echo $this->Form->create('Salesorder', array('action' => 'Salesorder_by_quotation', 'class' => 'form-horizontal form-bordered list_of_sales_o_form')); ?>
                            <?PHP   
                                $options = array('processing' => 'Processing', 'pending' => 'Pending');
                                $attributes = array('legend' => false, 'class' => 'device_status', 'value' => 'processing', 'name' => 'quotation_device_status');
                                echo $this->Form->radio('quotation_device_status', $options, $attributes);
                            ?>
                            </div>
                            <div class="input-group col-md-8 pull-right quot_display">
                           <?php echo $this->Form->input('customername', 
                            array('id'=>'val_customer_sales','class'=>'form-control','placeholder'=>'Enter the Customer Name','label'=>false,
                            'autoComplete'=>'off','type'=>'text','name'=>'customername')); ?>
                            <?PHP echo $this->Form->input('customer_id',array('type'=>'hidden','id'=>'customer_id')); ?>
                            <div id="result" class="instrument_drop" style="width:100%;"></div>
                                 </div>
                            <div class="input-group col-md-8 pull-right quot_display">
                           
                                
                                <?PHP echo $this->Form->input('quotation_id', array('placeholder' => 'Existing Quotation No to be entered here', 'class' => 'form-control',
                                    'div' => false, 'label' => false, 'type' => 'text', 'autoComplete' => 'off'))
                                ?>
                                <?PHP echo $this->Form->input('salesorder_created', array('type' => 'hidden', 'value' => 1)); ?>
                                <span class="input-group-btn">
                                    <button class="btn btn-primary quotation_search" type="button">Proceed</button>
                                </span> 
                                <div id="quoat_list" class="instrument_drop">
                            </div>
                            </div>
                        </div>
                            
			<?PHP $this->Form->end(); ?>
                            
                        </div>
                        <div class="table-responsive">
                            <table id="salesorder-table-1" class="table table-vcenter table-condensed table-bordered">
                                <thead>

                                    <tr>
                                        <!--<th class="text-center"><i class="gi gi-user"></i></th>-->
                                        <th class="text-center">Sales Orders No</th>
                                        <th class="text-center">In Date</th>
                                        <th class="text-center">Due Date</th>
                                        <th class="text-center">Branch</th>
                                        <th class="text-center">Customer</th>
                                        <th class="text-center">ATTN</th>
                                        <th class="text-center">Phone</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Our Ref No</th>
                                        <th class="text-center">Reference No</th>
                                        <th class="text-center">Salesperson</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                
                                
                            </table>
                            <input type="text" id="jump" class="pagination_search_input" placeholder="Page No">
                        </div>
                        <div class="btn-group btn-group-md">
                            <?php echo $this->Form->input('status', array('id'=>'status_call','class'=>'form-control','label'=>false,'name'=>'status_call','type'=>'select','options'=>array('1'=>'Active','2'=>'Pending Approval','3'=>'InActive'),'empty'=>'Select Status')); ?>
                        </div>
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

