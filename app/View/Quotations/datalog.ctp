<script>
var _ROOT ='<?PHP echo Router::url('/',true); ?>';
//$(function() {
//$('#status_call').change(function() {   // replace the ID_OF_YOUR_SELECT_BOX with the id to your select box given by Cake
//       var val = $(this).val();  // val is the drug id
//       window.location = _ROOT + 'Quotations/datalog/' + val;
//    });    
//});
//$(document).ready(function() {
//$('#example-datatable tfoot th').each( function () {
//        var title = $('#example-datatable thead th').eq( $(this).index() ).text();
//        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
//    } );
// 
//    // DataTable
//    var table = $('#example-datatable').DataTable();
// 
//    // Apply the search
//    table.columns().eq( 0 ).each( function ( colIdx ) {
//        $( 'input', table.column( colIdx ).footer() ).on( 'keyup change', function () {
//            table
//                .column( colIdx )
//                .search( this.value )
//                .draw();
//        });
//    });
//    });
$(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="col-md-12 list_quotation"><select name="query_input[]" class="form-control"><option value="Quotation.quotationno">Quotation No</option><option value="Quotation.reg_date">Quotation Date</option><option value="Customer.customername">Customer Name</option><option value="Device.model_no">Model No</option><option value="Device.quantity">Quantity</option></select><select name="equal_input[]" class="form-control"><option value="=">Equal</option><option value="!=">Not Equal</option><option value="<=">Start With</option><option value=">=">End With</option><option value="LIKE">Contains</option></select><input type="text" name="val[]" class="form-control"/><button class="remove_field">-</button></div>'); 
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
</script>

<h1>
                                <i class="gi gi-user "></i>Quotations Datalog
                            </h1>
                        </div>
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                        <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
                        <li><?php echo $this->Html->link('Quotations - Datalog',array('controller'=>'Quotations','action'=>'datalog')); ?></li>
                    </ul>
                    <!-- END Datatables Header -->
                    <?PHP echo $this->element('message'); ?>
                    <!-- Datatables Content -->
                    
                    <div class="block full">
                        <?PHP echo $this->Form->create('Quotation', array('action' => 'datalog', 'class' => 'form-horizontal form-bordered')); ?>
                        <div class="block-title">
                            <h2>List Of Quotations Datalog</h2>
                            <h2 style="float:right;"><div class="col-md-4"><?php echo $this->Form->input('Full List',array('type'=>'checkbox','id'=>'fulllist','name'=>'fulllist')) ?></div><?php echo $this->Html->link('Generate Report',array('controller' => 'Quotations','action' => 'reportfinal','full_base' => true),array('class'=>'btn btn-xs btn-primary','data-toggle'=>'tooltip','title'=>'Generate Report')); ?></h2>
                            <br>
                        </div>    
<!--                        <div class="input submit col-md-10">
                            <div class="submit pull-right">
                                
                                <?php //echo $this->Form->input('Full List', array('id'=>'fulllist','class'=>'','label'=>false,'name'=>'fulllist','type'=>'checkbox')); ?>
                            </div>
                        </div>
                        <div class="input submit col-md-2">
                            <div class="submit pull-right">
                                <?php //echo $this->Form->input('Generate Report', array('id'=>'reportfinal','class'=>'btn btn-primary','label'=>false,'name'=>'reportfinal','type'=>'button')); ?>
                            </div>
                        </div>-->
                        
                        
                        <div class="col-md-12 custom_calculate">
                        <?php echo $this->Form->input('gate', array('id'=>'gate','class'=>'form-control','label'=>false,'name'=>'gate','type'=>'select','options'=>array('AND'=>'AND','OR'=>'OR'))); ?>
                        <?php //echo $this->Form->input('plus', array('id'=>'submit','class'=>'btn btn-primary','label'=>false,'name'=>'submit','type'=>'submit')); ?>
                        <?php //echo $this->Form->input('query_input', array('id'=>'query_input','label'=>false,'name'=>'query_input','type'=>'select','options'=>array('quotationno'=>'Quotation no','reg_date'=>'Date','branch'=>'Branch','customername'=>'Customer name','address'=>'Customer address','attn'=>'ATTN','phone'=>'Phone','email'=>'Email','salesperson'=>'Sales person','refno'=>'Your ref no','is_approved'=>'Approval','fax'=>'Fax','paymentterm'=>'Payment terms','instrumentname'=>'Instrument Name','projectname'=>'Project Name',
                            //'gst'=>'GST','gsttype'=>'GST Type','brand'=>'Brand','modelno'=>'Model No','range'=>'Range','unitprice'=>'Price','calibration'=>'Calibration Type','department'=>'Department Name'))); ?>
                        <button class="add_field_button pull-right">+</button></div>
                        <div class="input_fields_wrap">
                            
<!--                            <div><input type="text" name="mytext[]"></div>-->
                        </div>
                        <?php //echo $this->Form->input('equal_input', array('id'=>'equal_input','label'=>false,'name'=>'equal_input','type'=>'select','options'=>array('eq'=>'equal','ne'=>'not equal','bw'=>'begins with','ew'=>'ends with','cn'=>'contains'))); ?>
                        <?php //echo $this->Form->input('val', array('id'=>'val','label'=>false,'name'=>'val','type'=>'text')); ?>
                        <div class="input submit col-md-12 ">
                            <div class="submit pull-right">
                                <?php echo $this->Form->input('Proceed', array('id'=>'submit','class'=>'btn btn-primary','label'=>false,'name'=>'submit','type'=>'submit')); ?>
                            </div>
                        </div>
                        <?PHP $this->Form->end(); ?>
                       
                        <div class="table-responsive">
                            <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                <thead>
                                    <tr>
                                        <!--<th class="text-center"><i class="gi gi-user"></i></th>-->
                                        <th class="text-center">Quotation No</th>
                                        <th class="text-center">Reg Date</th>
                                        <th class="text-center">Branch</th>
                                        <th class="text-center">Customer</th>
                                        <th class="text-center">Phone</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Reference No</th>
                                        <th class="text-center">Device Name</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?PHP if(!empty($quotation )):  ?>
                                     <?php foreach($quotation as $quotation_list): ?>
                                    <tr <?php if($quotation_list['Quotation']['is_approved'] == 1):?> class="" <?php else:?> class="themed-color-fire" <?php endif; ?>>
                                        <td class="text-center"><?PHP echo $quotation_list['Quotation']['quotationno'] ?></td>
                                        <td class="text-center"><?PHP echo $quotation_list['Quotation']['reg_date'] ?></td>
                                        <td class="text-center"><?PHP echo $quotation_list['Quotation']['branch_id'] ?></td>
                                        <td class="text-center"><?PHP echo $quotation_list['Quotation']['customername'] ?></td>
                                        <td class="text-center"><?PHP echo $quotation_list['Quotation']['phone'] ?></td>
                                        <td class="text-center"><?PHP echo $quotation_list['Quotation']['email'] ?></td>
                                        <td class="text-center">
                                            <?PHP if($quotation_list['Quotation']['po_generate_type']=='Automatic'){$class="danger";}elseif($quotation_list['Quotation']['po_generate_type']=='Manual'){$class="success";}else{ $class="warning";} ?>
                                            
                                                <?PHP echo $quotation_list['Quotation']['ref_no'] ?>
                                                                                   </td>
                                        <td class="text-center"><?PHP echo $quotation_list['Instrument']['name'] ?></td>
                                        
                                    </tr>
                                    <?php endforeach; ?>
                                    <?PHP endif; ?>
                                   
                                </tbody>
                            </table>
<!--                            <div class="modal hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    </div>
                                </div>
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
                        $('#modal').load('Customers').dialog('open');
                        </script> 
                    <?php } ?>
