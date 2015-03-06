<script> 
$(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="col-md-12 list_quotation"><select name="query_input[]" class="form-control"><option value="Saleorder.id">Saleorder No</option><option value="Customer.customername">Customer Name</option></select><select name="equal_input[]" class="form-control"><option value="=">Equal</option><option value="!=">Not Equal</option><option value="<=">Start With</option><option value=">=">End With</option><option value="LIKE">Contains</option></select><input type="text" name="val[]" class="form-control"/><button class="remove_field">-</button></div>'); 
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
</script>       
<h1>
    <i class="gi gi-user"></i>Invoices Datalog
</h1>
                    </div>
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                        <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
                        <li><?php echo $this->Html->link('Invoices - Datalog',array('controller'=>'Invoices','action'=>'datalog')); ?></li>
                    </ul>
                    <!-- END Datatables Header -->
                    <?PHP echo $this->element('message'); ?>
                    <!-- Datatables Content -->
                    <div class="block full">
                        <?PHP echo $this->Form->create('Invoice', array('action' => 'datalog', 'class' => 'form-horizontal form-bordered')); ?>
                        
                        <div class="col-md-12">
                            <h2 class="pull-left">List Of Invoices</h2> 
                            <div class="pull-right" style="margin-top: 30px;"><div class="pull-left" style="margin-right: 20px; line-height: 20px;"><?php echo $this->Form->input('Full List',array('type'=>'checkbox','id'=>'fulllist','name'=>'fulllist')) ?></div><?php echo $this->Html->link('Generate Report',array('controller' => 'Invoices','action' => 'reportfinal','full_base' => true),array('class'=>'btn btn-xs btn-primary','data-toggle'=>'tooltip','title'=>'Generate Report')); ?></div>
                        </div>
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
                        
                        </div>
                       <?PHP $this->Form->end(); ?>
                        <div class="table-responsive table-responsive-scroll">
                            <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                <thead>
                                    <tr>
                                        <!--<th class="text-center"><i class="gi gi-user"></i></th>-->
                                        <th class="text-center">Invoices No</th>
                                        <th class="text-center">Invoice Date</th>
                                        <th class="text-center">Branch</th>
                                        <th class="text-center">Customer</th>
                                        <th class="text-center">Phone</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Reference No</th>
                                        <th class="text-center">Quotation No</th>
                                        <th class="text-center">Salesorder No</th>
                                        <th class="text-center">Deliveryorder No</th>
                                        <th class="text-center">Total Price</th>
                                        
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
                                        
                                        <?php $count1 = 0; for($i=0;$i<=4;$i++):
    if(isset($titles[$i])):
        ?><th class="text-center"><?php 
        
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
                                    $excel[] = array('ID','Invoice No','InvoiceDate','Due Date','CustomerAddress','ContactPersonName','Phone','Fax','Email','RefNo','Remarks','CustomerId','CustomerName','ServiceTypeId','IsApproved','Total Price');   
                                    }
                                    else
                                    {
                                        //ID,CompanyId	CreatedDate	QuotationNo	QuotationDate	CustomerAddress	ContactPersonName	Phone	Fax	Email	YourRefNo	Discount	GST	Remarks	TotalPrice	GSTType	CurrencyConversionRate	SOItemsAppBy	GSTTypeId	CustomerId	CurrencyId	SalesPersonId	BranchId	InstrumentForId	PaymentTermsId	ServiceTypeId	ProjectName	TitleIdValue1	TitleIdValue2	TitleIdValue3	Title1	Title2	Title3	CompanyName	CustomerName	CurrencyCode	SalesPersonName	BranchName	InstrumentForName	PaymentTerms	ServiceTypeName	RangeName	InstrumentName	BrandName	SNo	Quantity	Validity	SerialNo	ModelNo	PartNo	UnitPrice	QD_Discount	QD_Remarks	QD_TotalPrice	QDSNO	TagNo	Location	ControlNo	TitleValue1	TitleValue2	TitleValue3	TitleValue4	TitleValue5	TitleValue6	TitleValue7	TitleValue8	TitleValue9	InstrumentId	LedgerAccountId	CalibrationLocationID	CalibrationTypeId	LedgerAccountName	DepartmentName	LocationName	QDTitle1	QDTitle2	QDTitle3	QDTitle4	QDTitle5	QDTitle6	QDTitle7	QDTitle8	QDTitle9	IsActive													

                                     $excel[] = array('ID','Invoice No','InvoiceDate','Due Date','CustomerAddress','ContactPersonName','Phone','Fax','Email','RefNo','Remarks','CustomerId','CustomerName','ServiceTypeId','IsApproved','Total Price','Instrumentname','Brand','Model No','Range','Call Location','Call Type','Title1','Title2','Title3','Title4','Title5');   
                                    }
                                    
                                    
                                    
                                    if(!empty($salesorder )): ?>
                                     <?php foreach($salesorder as $k=>$salesorder_list): ?>
                                    <tr <?php if($salesorder_list['Salesorder']['is_approved'] == 1):?> class="" <?php else:?> class="themed-color-fire" <?php endif; ?>>
                                        <td class="text-center"><?PHP echo $this->Salesorder->getinvoiceno($salesorder_list['Salesorder']['salesorderno']) ?></td>
                                        <td class="text-center"><?PHP echo $this->Salesorder->getinvoicedate($salesorder_list['Salesorder']['salesorderno']) ?></td>
                                        <td class="text-center"><?PHP echo $this->Salesorder->getinvoicebranch($salesorder_list['Salesorder']['branch_id']) ?></td>
                                        <td class="text-center"><?PHP echo $salesorder_list['Salesorder']['customername'] ?></td>
                                        <td class="text-center"><?PHP echo $salesorder_list['Salesorder']['phone'] ?></td>
                                        <td class="text-center"><?PHP echo $salesorder_list['Salesorder']['email'] ?></td>
                                        <td class="text-center"><?PHP echo $salesorder_list['Salesorder']['ref_no'] ?></td>
                                        <td class="text-center"><?PHP echo $salesorder_list['Salesorder']['quotationno'] ?></td>
                                        <td class="text-center"><?PHP echo $salesorder_list['Salesorder']['salesorderno'] ?></td>
                                        <td class="text-center"><?PHP echo $this->Salesorder->getinvoicedelno($salesorder_list['Salesorder']['salesorderno']) ?></td>
                                        <td class="text-center"><?PHP echo $this->Quotation->quotationtotal_all($salesorder_list['Salesorder']['quotationno']) ?></td>
                                         <?php 
                                        if($fulllist == 1)
                                        {
                                        ?>
                                        <td class="text-center"><?PHP echo $salesorder_list['Instrument']['name'] ?></td>
                                        <td class="text-center"><?PHP echo $salesorder_list['Brand']['brandname'] ?></td>
                                        <td class="text-center"><?PHP echo $salesorder_list['Description']['model_no'] ?></td>
                                        <td class="text-center"><?PHP echo $salesorder_list['Range']['range_name'] ?></td>
                                        <td class="text-center"><?PHP echo $salesorder_list['Description']['sales_calllocation'] ?></td>
                                        <td class="text-center"><?PHP echo $salesorder_list['Description']['sales_calltype'] ?></td>
                                        
                                     <?php  $count1 = 0;
for($i=0;$i<=4;$i++):
    if(isset($titles[$i])): ?>
                                        <td class="text-center"><?php echo $salesorder_list['Description']['title'.($i+1).'_val'] ?></td>
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
                                    $excel[] = array(($k+1),$this->Salesorder->getinvoiceno($salesorder_list['Salesorder']['salesorderno']),$this->Salesorder->getinvoicedate($salesorder_list['Salesorder']['salesorderno']),$salesorder_list['Salesorder']['due_date'],$salesorder_list['Salesorder']['address'],
                    $this->Salesorder->salesperson($salesorder_list['Salesorder']['attn']),$salesorder_list['Salesorder']['phone'],$salesorder_list['Salesorder']['fax'],$salesorder_list['Salesorder']['email'],
                    $salesorder_list['Salesorder']['ref_no'],$salesorder_list['Salesorder']['remarks'],$salesorder_list['Salesorder']['customer_id'],$salesorder_list['Salesorder']['customername'],
                    $this->Salesorder->getservicetype($salesorder_list['Salesorder']['service_id']),$this->Salesorder->getinvoicedelapprove($salesorder_list['Salesorder']['salesorderno']),$this->Quotation->quotationtotal_all($salesorder_list['Salesorder']['quotationno']));
                                    }
                                    else
                                    {
                                     $excel[] = array(($k+1),$this->Salesorder->getinvoiceno($salesorder_list['Salesorder']['salesorderno']),$this->Salesorder->getinvoicedate($salesorder_list['Salesorder']['salesorderno']),$salesorder_list['Salesorder']['due_date'],$salesorder_list['Salesorder']['address'],
                    $this->Salesorder->salesperson($salesorder_list['Salesorder']['attn']),$salesorder_list['Salesorder']['phone'],$salesorder_list['Salesorder']['fax'],$salesorder_list['Salesorder']['email'],
                    $salesorder_list['Salesorder']['ref_no'],$salesorder_list['Salesorder']['remarks'],$salesorder_list['Salesorder']['customer_id'],$salesorder_list['Salesorder']['customername'],
                    $this->Salesorder->getservicetype($salesorder_list['Salesorder']['service_id']),$this->Salesorder->getinvoicedelapprove($salesorder_list['Salesorder']['salesorderno']),$this->Quotation->quotationtotal_all($salesorder_list['Salesorder']['quotationno']),$salesorder_list['Instrument']['name'],$salesorder_list['Brand']['brandname'],$salesorder_list['Description']['model_no'],
                    $salesorder_list['Range']['range_name'],$salesorder_list['Description']['sales_calllocation'],$salesorder_list['Description']['sales_calltype'],$salesorder_list['Description']['title1_val'],$salesorder_list['Description']['title2_val'],$salesorder_list['Description']['title3_val'],$salesorder_list['Description']['title4_val'],$salesorder_list['Description']['title5_val']);
                                    }
                                    endforeach; ?>
                                    <?PHP endif; ?>
                                   <?php 
                $foldername = APP."webroot/excel";
                $file = fopen($foldername.'/invoicedatas.csv', 'w');
                foreach($excel as $row) {
                fputcsv($file, $row);
                } 
                ?>
                                </tbody>
                            </table>
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