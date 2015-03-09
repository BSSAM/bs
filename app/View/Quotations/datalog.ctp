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
$(function(){
            setTimeout(function(){
                    $('.dataTable').after("<div class='new_scroll'></div>");
                    $('.dataTable').appendTo(".new_scroll");
                },1000);
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
                        <div class="col-md-12">
                            <h2  class="pull-left">List Of Quotations Datalog</h2>
                            <div class="pull-right" style="margin-top: 30px;"><div class="pull-left" style="margin-right: 20px; line-height: 20px;"><?php echo $this->Form->input('Full List',array('type'=>'checkbox','id'=>'fulllist','name'=>'fulllist')) ?></div><?php echo $this->Html->link('Generate Report',array('controller' => 'Quotations','action' => 'reportfinal','full_base' => true),array('class'=>'btn btn-xs btn-primary','data-toggle'=>'tooltip','title'=>'Generate Report')); ?></div>
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
                        
<div class="datalog">
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
</div>
                        <div class="table-responsive table-responsive-scroll">

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
                                        <?php 
                                        if($fulllist == 1)
                                        {
                                        ?>
                                        <th class="text-center">Device Name</th>
                                        <th class="text-center">Brand Name</th>
                                        <th class="text-center">Model No</th>
                                        <th class="text-center">Range</th>
                                        <th class="text-center">Call Location</th>
                                        <th class="text-center">Call Type</th>
                                        <th class="text-center">Unit Price</th>
                                        <?php $count1 = 0; for($i=0;$i<=4;$i++):
    if(isset($titles[$i])):
        ?>
        <th class="text-center"><?php 
        
        echo $titles[$i]; ?></th>
        <?php
    endif;
    $count1 = $count1+1;
endfor; ?>
                                        <?php 
                                        }
                                        ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?PHP 
                                    
                                    $excel = array();
                                    $excel[] = array();
                                    if($fulllist == 0)
                                    {
                                    $excel[] = array('ID','QuotationNo','QuotationDate','CustomerAddress','ContactPersonName','Phone','Fax','Email','RefNo','Discount','GST','Remarks','TotalPrice','GSTType','CustomerId','CustomerName','PaymentTermsId','ServiceTypeId','IsApproved');   
                                    }
                                    else
                                    {
                                        //ID,CompanyId	CreatedDate	QuotationNo	QuotationDate	CustomerAddress	ContactPersonName	Phone	Fax	Email	YourRefNo	Discount	GST	Remarks	TotalPrice	GSTType	CurrencyConversionRate	SOItemsAppBy	GSTTypeId	CustomerId	CurrencyId	SalesPersonId	BranchId	InstrumentForId	PaymentTermsId	ServiceTypeId	ProjectName	TitleIdValue1	TitleIdValue2	TitleIdValue3	Title1	Title2	Title3	CompanyName	CustomerName	CurrencyCode	SalesPersonName	BranchName	InstrumentForName	PaymentTerms	ServiceTypeName	RangeName	InstrumentName	BrandName	SNo	Quantity	Validity	SerialNo	ModelNo	PartNo	UnitPrice	QD_Discount	QD_Remarks	QD_TotalPrice	QDSNO	TagNo	Location	ControlNo	TitleValue1	TitleValue2	TitleValue3	TitleValue4	TitleValue5	TitleValue6	TitleValue7	TitleValue8	TitleValue9	InstrumentId	LedgerAccountId	CalibrationLocationID	CalibrationTypeId	LedgerAccountName	DepartmentName	LocationName	QDTitle1	QDTitle2	QDTitle3	QDTitle4	QDTitle5	QDTitle6	QDTitle7	QDTitle8	QDTitle9	IsActive													

                                     $excel[] = array('ID','QuotationNo','QuotationDate','CustomerAddress','ContactPersonName','Phone','Fax','Email','RefNo','Discount','GST','Remarks','TotalPrice','GSTType','CustomerId','CustomerName','PaymentTermsId','ServiceTypeId','DepartmentName','IsApproved','Instrumentname','Brand','Model No','Range','Call Location','Call Type','Unit Price','Title1','Title2','Title3','Title4','Title5');   
                                    }
                                    
                                    if(!empty($quotation )):  ?>
                                     <?php foreach($quotation as $k=>$quotation_list): ?>
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
                                        <?php 
                                        if($fulllist == 1)
                                        {
                                        ?>
                                        <td class="text-center"><?PHP echo $quotation_list['Instrument']['name'] ?></td>
                                        <td class="text-center"><?PHP echo $quotation_list['Brand']['brandname'] ?></td>
                                        <td class="text-center"><?PHP echo $quotation_list['Device']['model_no'] ?></td>
                                        <td class="text-center"><?PHP echo $quotation_list['Range']['range_name'] ?></td>
                                        <td class="text-center"><?PHP echo $quotation_list['Device']['call_location'] ?></td>
                                        <td class="text-center"><?PHP echo $quotation_list['Device']['call_type'] ?></td>
                                        <td class="text-center"><?PHP echo $quotation_list['Device']['unit_price'] ?></td>
                                     <?php  $count1 = 0;
for($i=0;$i<=4;$i++):
    if(isset($titles[$i])): ?>
                                        <td class="text-center"><?php echo $quotation_list['Device']['title'.($i+1).'_val'] ?></td>
       <?php 
       
    endif;
    $count1 = $count1+1;
endfor;
?>
                                        <?php 
                                        }
                                        ?>
                                        
                                    </tr>
                                    <?php 
                                    if($fulllist == 0)
                                    {
                                        //$excel[] = '';
                                    $excel[] = array(($k+1),$quotation_list['Quotation']['quotationno'],$quotation_list['Quotation']['reg_date'],$quotation_list['Quotation']['address'],$this->Salesorder->salesperson($quotation_list['Quotation']['attn']),
                    $quotation_list['Quotation']['phone'],$quotation_list['Quotation']['fax'],$quotation_list['Quotation']['email'],$quotation_list['Quotation']['ref_no'],$quotation_list['Quotation']['discount'],$this->Quotation->getgst($quotation_list['Quotation']['id']),
                    $this->Quotation->getremark($quotation_list['Quotation']['id']),$this->Quotation->quotationtotal_all($quotation_list['Quotation']['quotationno']),$this->Quotation->getgsttype($quotation_list['Quotation']['id']),$quotation_list['Quotation']['customer_id'],
                    $quotation_list['Quotation']['customername'],$this->Quotation->paymentterm_quotation($quotation_list['Quotation']['quotationno']),$this->Quotation->getservicetype($quotation_list['Quotation']['id']),$quotation_list['Quotation']['is_approved']);
                                    }
                                    else
                                    {
                                     $excel[] = array(($k+1),$quotation_list['Quotation']['quotationno'],$quotation_list['Quotation']['reg_date'],$quotation_list['Quotation']['address'],$this->Salesorder->salesperson($quotation_list['Quotation']['attn']),
                    $quotation_list['Quotation']['phone'],$quotation_list['Quotation']['fax'],$quotation_list['Quotation']['email'],$quotation_list['Quotation']['ref_no'],$quotation_list['Quotation']['discount'],$this->Quotation->getgst($quotation_list['Quotation']['id']),
                    $this->Quotation->getremark($quotation_list['Quotation']['id']),$this->Quotation->quotationtotal_all($quotation_list['Quotation']['quotationno']),$this->Quotation->getgsttype($quotation_list['Quotation']['id']),$quotation_list['Quotation']['customer_id'],
                    $quotation_list['Quotation']['customername'],$this->Quotation->paymentterm_quotation($quotation_list['Quotation']['quotationno']),$this->Quotation->getservicetype($quotation_list['Quotation']['id']),$this->Quotation->getdepartmentname($quotation_list['Quotation']['id']),$quotation_list['Quotation']['is_approved'],
                    $quotation_list['Instrument']['name'],$quotation_list['Brand']['brandname'],$quotation_list['Device']['model_no'],$quotation_list['Range']['range_name'],$quotation_list['Device']['call_location'],$quotation_list['Device']['call_type'],
                    $quotation_list['Device']['unit_price'],$quotation_list['Device']['title1_val'],$quotation_list['Device']['title2_val'],$quotation_list['Device']['title3_val'],$quotation_list['Device']['title4_val'],$quotation_list['Device']['title5_val']);
                                    }
                                    endforeach; ?>
                                    <?PHP endif; ?>
                                   <?php 
                $foldername = APP."webroot/excel";
                $file = fopen($foldername.'/quotationdatas.csv', 'w');
                foreach($excel as $row) {
                fputcsv($file, $row);
                } 
                ?>
                                </tbody>
                            </table>
                            </div>
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
