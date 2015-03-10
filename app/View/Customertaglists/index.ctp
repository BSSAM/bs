<script type="text/javascript" src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.5/js/jquery.dataTables.min.js"></script>
                
<script>
    
var _ROOT ='<?PHP echo Router::url('/',true); ?>';

$(function() {
//$('#status_call').change(function() {   // replace the ID_OF_YOUR_SELECT_BOX with the id to your select box given by Cake
//       var val = $(this).val();  // val is the drug id
//       window.location = _ROOT + 'Procedures/index/' + val;
//    }); 
   
        html = '<tr>';
        $('#CustomerTag-table-1 thead th').each(function(){
        html += '<th><input type="text" placeholder="Search '+$(this).text()+'" /></th>';
        });
        html += '</tr>';

        //console.log(html);

        $('#CustomerTag-table-1 thead').prepend(html);

        
        table = $('#CustomerTag-table-1').DataTable( {
        //"bFilter" : false,
        "processing": true,
        "serverSide": true,
        //"scrollX": 1200,
		//"sScrollX": "100%",
        //"bScrollCollapse": true,
        "ajax": _ROOT+"datatable/customer/customertag-table-1.php?edit=<?php echo $userrole_cus['edit'];?>&delete=<?php echo $userrole_cus['delete'];?>&group_id=<? echo $group_id; ?>"
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
                $('#CustomerTag-table-1 thead tr:first select').on( 'change', function () {
                    table.column( colIdx ).search( $(this).val() ).draw();
                });    
            
            }
            else
            {
                $('#CustomerTag-table-1 thead tr:first input:eq('+colIdx+')').on( 'keyup change', function () {
                    
                    console.log($(this).val());
                    table.column( colIdx ).search($(this).val()).draw();
                });
            }
        });

});
</script>
<h1 class="text-center">
    <i class="gi gi-user"></i><div class="label label-six text-center" style="line-height: 61px;"><?php echo $cust; ?></div>
</h1>
</div>
</div>
<ul class="breadcrumb breadcrumb-top">
    <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
    <li><?php echo $this->Html->link('Customers',array('controller'=>'Customers','action'=>'index')); ?></li>
    <li><?php echo $this->Html->link('Customers Tag list',array('controller'=>'Customertaglists','action'=>'index',$customer_id)); ?></li>
</ul>
<!-- END Datatables Header -->
            <?PHP echo $this->element('message');?>            
<!-- Datatables Content -->
<div class="block full">
    <div class="block-title">
        <h2>List Of Customers Tags</h2>
        <?php if($userrole_cus['add']==1){ ?>
        <h2 style="float:right;"><?php echo $this->Html->link('Add Customer Tag',array('controller'=>'Customertaglists','action'=>'add',$customer_id),array('class'=>'btn btn-xs btn-primary','data-toggle'=>'tooltip','title'=>'Add Customer tag')); ?></h2>
        <?php } ?>
    </div>
                
    <div class="table-responsive">
        <table id="CustomerTag-table-1" class="table table-vcenter table-condensed table-bordered">
            <thead>
                <tr>
                    <th class="text-center">Customer ID</th>
                    <th class="text-center">Customer Name</th>
                    <th class="text-center">Customer Type</th>
                    <th class="text-center">Industry</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            </table>
         <input type="text" id="jump" class="pagination_search_input" placeholder="Page No">
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