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

</script>

<h1>
                                <i class="gi gi-user"></i>Quotations Datalog
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
                        <div class="block-title">
                            <h2>List Of Quotations Datalog</h2>
                            
                        </div>
                        <?PHP echo $this->Form->create('Quotation', array('action' => 'datalog', 'class' => 'form-horizontal form-bordered')); ?>
                        <?php echo $this->Form->input('gate', array('id'=>'gate','label'=>false,'name'=>'gate','type'=>'select','options'=>array('1'=>'AND','2'=>'OR'))); ?>
                        <?php echo $this->Form->input('query_input', array('id'=>'query_input','label'=>false,'name'=>'query_input','type'=>'select','options'=>array('quotationno'=>'Quotation no','reg_date'=>'Date','branch_id'=>'Branch','customername'=>'Customer name','address'=>'Customer address','attn'=>'ATTN','phone'=>'Phone','email'=>'Email','salesperson_id'=>'Sales person','refno'=>'Your ref no','is_approved'=>'Approval','fax'=>'Fax','paymentterm_id'=>'Payment terms','instrumentname'=>'InstrumentForName'))); ?>
<!--                        <select name="query_input"><option selected="selected" value="quotationno">Quotation no</option><option value="QuotationDate">Date</option><option value="BranchName">Branch</option><option value="CustomerName">Customer name</option><option value="CustomerAddress">Customer address</option><option value="ContactPersonName">ATTN</option><option value="Phone">Phone</option><option value="Email">Email</option><option value="SalesPersonName">Sales person</option><option value="YourRefNo">Your ref no</option><option value="IsApproved">Approval</option><option value="Fax">Fax</option><option value="PaymentTerms">Payment terms</option><option value="InstrumentForName">InstrumentForName</option><option value="ProjectName">Project name</option><option value="GST">GST</option><option value="GSTType">GST type</option><option value="TitleIdValue1">Title value1</option><option value="TitleIdValue2">Title value2</option><option value="TitleIdValue3">Title value3</option><option value="Remarks">Remarks</option><option value="ServiceTypeName">ServiceTypeName</option><option value="IsActive">Active</option><option value="InstrumentName">Description</option><option value="ModelNo">Model no</option><option value="BrandName">Brand</option><option value="RangeName">Range</option><option value="LocationName">Cal location</option><option value="CalibrationTypeName">Cal type</option><option value="Validity">Validity</option><option value="UnitPrice">Unit price</option><option value="Discount">Disc.</option><option value="DepartmentName">Department</option><option value="LedgerAccountName">Account service</option><option value="SerialNo">Serial no</option><option value="TagNo">Tag no</option><option value="PartNo">Part no</option><option value="ControlNo">Control no</option><option value="Location">Location</option><option value="Remarks1">Remarks</option><option value="TitleValue1">Title Value1</option><option value="TitleValue2">Title Value2</option><option value="TitleValue3">Title Value3</option><option value="TitleValue4">Title Value4</option><option value="TitleValue5">Title Value5</option><option value="TitleValue6">Title Value6</option><option value="TitleValue7">Title Value7</option><option value="TitleValue8">Title Value8</option><option value="TitleValue9">Title Value9</option></select>-->
                        <select name="equal_input" class="selectopts"><option selected="selected" value="eq">equal</option><option value="ne">not equal</option><option value="bw">begins with</option><option value="ew">ends with</option><option value="cn">contains</option></select>
                        <?php echo $this->Form->input('val', array('id'=>'val','label'=>false,'name'=>'val','type'=>'text')); ?>
                        <button class="btn btn-primary" type="submit">Proceed</button>
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
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?PHP if(!empty($quotation )):  ?>
                                     <?php foreach($quotation as $quotation_list): ?>
                                    <tr <?php if($quotation_list['Quotation']['is_approved'] == 1):?> class="" <?php else:?> class="themed-color-fire" <?php endif; ?>>
                                        <td class="text-center"><?PHP echo $quotation_list['Quotation']['quotationno'] ?></td>
                                        <td class="text-center"><?PHP echo $quotation_list['Quotation']['reg_date'] ?></td>
                                        <td class="text-center"><?PHP echo $quotation_list['branch']['branchname'] ?></td>
                                        <td class="text-center"><?PHP echo $quotation_list['Quotation']['customername'] ?></td>
                                        <td class="text-center"><?PHP echo $quotation_list['Quotation']['phone'] ?></td>
                                        <td class="text-center"><?PHP echo $quotation_list['Quotation']['email'] ?></td>
                                        <td class="text-center">
                                            <?PHP if($quotation_list['Quotation']['po_generate_type']=='Automatic'){$class="danger";}elseif($quotation_list['Quotation']['po_generate_type']=='Manual'){$class="success";}else{ $class="warning";} ?>
                                            
                                                <?PHP echo $quotation_list['Quotation']['ref_no'] ?>
                                                                                   </td>
                                        
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
