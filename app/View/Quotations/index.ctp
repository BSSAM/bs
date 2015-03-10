<?php echo $this->Html->script(array('datatable/jquery-1.11.1.min','datatable/jquery.dataTables.min'));  ?>
<script>
    
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
        window.location = _ROOT + 'Quotations/index/?val=' + val;

        });
        
        //// Search Input Element Add
    
        html = '<tr>';
        $('#quotation-table-1 thead th').each(function(){
        html += '<th><input type="text" placeholder="Search '+$(this).text()+'" /></th>';
        });
        html += '</tr>';

        //console.log(html);

        $('#quotation-table-1 thead').prepend(html);

        table = $('#quotation-table-1').DataTable( {
        //"bFilter" : false,
        "processing": true,
        "serverSide": true,
        //"scrollX": 1200,
        
	//"sScrollX": "100%",
        //"bScrollCollapse": true,
        "ajax": _ROOT+"datatable/job/quotation-table-1.php?edit=<?php echo $userrole_cus['edit'];?>&delete=<?php echo $userrole_cus['delete'];?>&val="+valu
        });
        
        
        
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
                $('#quotation-table-1 thead tr:first select').on( 'change', function () {
                    table.column( colIdx ).search( $(this).val() ).draw();
                });    
            
            }
            else
            {
                $('#quotation-table-1 thead tr:first input:eq('+colIdx+')').on( 'keyup change', function () {
                    table.column( colIdx ).search($(this).val()).draw();
                });
            }
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
<h1>
                                <i class="fa fa-table"></i>Quotations
                            </h1>
                        </div>
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                        <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
                        <li><?php echo $this->Html->link('Quotations',array('controller'=>'Quotations','action'=>'index')); ?></li>
                    </ul>
                    <!-- END Datatables Header -->
                    <?php echo $this->element('message');?>
                    <!-- Datatables Content -->
                    <div class="block full">
                        <div class="block-title">
                            <h2>List Of Quotations <?php if(isset($_GET['val'])) { if($_GET['val'] == 2) {  echo "- Pending Approval"; }if($_GET['val'] == 3) { echo "- InActive"; } }?></h2>
                            <?php if($userrole_cus['add']==1){ ?>
                            <h2 style="float:right;"><?php echo $this->Html->link('Add Quotation',array('controller'=>'Quotations','action'=>'add'),array('class'=>'btn btn-xs btn-primary','data-toggle'=>'tooltip','tile'=>'Add Quotation')); ?></h2>
                            <?php } ?>
                        </div>
                        <div class="table-responsive">
                            <table id="quotation-table-1" class="table table-vcenter table-condensed table-bordered">
                                <thead>
<!--                                    <tr> 
                                        <th class="text-center"><input type="text"></th>
                                        <th class="text-center"><input type="text"></th>
                                        <th class="text-center"><input type="text"></th>
                                        <th class="text-center"><input type="text"></th>
                                        <th class="text-center"><input type="text"></th>
                                        <th> <?php //echo $this->Form->input('status', array('id'=>'status_call','class'=>'form-control','label'=>false,'name'=>'status_call','type'=>'select','options'=>array('1'=>'Active','2'=>'Pending Approval','3'=>'InActive'),'empty'=>'Select Status')); ?></th>
                                    </tr>-->
                                    <th class="text-center">Quotation No</th>
                                        <th class="text-center">Reg Date</th>
                                        <th class="text-center">Branch</th>
                                        <th class="text-center">Customer</th>
                                        <th class="text-center">Customer Address</th>
                                        <th class="text-center">Attn</th>
                                        <th class="text-center">Phone</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Salesperson</th>
                                        <th class="text-center">Reference No</th>
                                        <th class="text-center">Total Price</th>
                                        <th class="text-center">Action</th>
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

