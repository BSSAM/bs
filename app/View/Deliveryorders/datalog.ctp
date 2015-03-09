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
$(function(){
            setTimeout(function(){
                    $('.dataTable').after("<div class='new_scroll'></div>");
                    $('.dataTable').appendTo(".new_scroll");
                },1000);
            });
</script> 
<h1>
                                <i class="gi gi-user"></i>Delivery Order Datalog
                            </h1>
                        </div>
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                        <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
                        <li><?php echo $this->Html->link('Delivery Orders - Datalog',array('controller'=>'Deliveryorders','action'=>'datalog')); ?></li>
                    </ul>
                    <!-- END Datatables Header -->
                    <?PHP echo  $this->element('message'); ?>
                    <!-- Datatables Content -->
                    <div class="block full">
                        <?PHP echo $this->Form->create('Deliveryorder', array('action' => 'datalog', 'class' => 'form-horizontal form-bordered')); ?>
                        
                        <div class="col-md-12">
                            <h2 class="pull-left">List Of Delivery Orders</h2> 
                            <div class="pull-right" style="margin-top: 30px;"><div class="pull-left" style="margin-right: 20px; line-height: 20px;"><?php echo $this->Form->input('Full List',array('type'=>'checkbox','id'=>'fulllist','name'=>'fulllist')) ?></div><?php echo $this->Html->link('Generate Report',array('controller' => 'Deliveryorders','action' => 'reportfinal','full_base' => true),array('class'=>'btn btn-xs btn-primary','data-toggle'=>'tooltip','title'=>'Generate Report')); ?></div>
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
                        
                        <div class="table-responsive">
                            <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                <thead>
                                    <tr>
                                        
                                        <!--<th class="text-center"><i class="gi gi-user"></i></th>-->
                                        <th class="text-center">Delivery Order No</th>
                                        <th class="text-center">Delivery Order Date</th>
                                        <th class="text-center">Sales order No</th>
                                        <th class="text-center">Customer Name</th>
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
                                    $excel[] = array('ID','DeliveryorderNo','DODate','Branch','CustomerAddress','ContactPersonName','Phone','Fax','Email','RefNo','Remarks','CustomerId','CustomerName','ServiceTypeId','IsApproved');   
                                    }
                                    else
                                    {
                                        //ID,CompanyId	CreatedDate	QuotationNo	QuotationDate	CustomerAddress	ContactPersonName	Phone	Fax	Email	YourRefNo	Discount	GST	Remarks	TotalPrice	GSTType	CurrencyConversionRate	SOItemsAppBy	GSTTypeId	CustomerId	CurrencyId	SalesPersonId	BranchId	InstrumentForId	PaymentTermsId	ServiceTypeId	ProjectName	TitleIdValue1	TitleIdValue2	TitleIdValue3	Title1	Title2	Title3	CompanyName	CustomerName	CurrencyCode	SalesPersonName	BranchName	InstrumentForName	PaymentTerms	ServiceTypeName	RangeName	InstrumentName	BrandName	SNo	Quantity	Validity	SerialNo	ModelNo	PartNo	UnitPrice	QD_Discount	QD_Remarks	QD_TotalPrice	QDSNO	TagNo	Location	ControlNo	TitleValue1	TitleValue2	TitleValue3	TitleValue4	TitleValue5	TitleValue6	TitleValue7	TitleValue8	TitleValue9	InstrumentId	LedgerAccountId	CalibrationLocationID	CalibrationTypeId	LedgerAccountName	DepartmentName	LocationName	QDTitle1	QDTitle2	QDTitle3	QDTitle4	QDTitle5	QDTitle6	QDTitle7	QDTitle8	QDTitle9	IsActive													

                                     $excel[] = array('ID','DeliveryorderNo','DODate','Branch','CustomerAddress','ContactPersonName','Phone','Fax','Email','RefNo','Remarks','CustomerId','CustomerName','ServiceTypeId','IsApproved','Instrumentname','Brand','Model No','Range','Call Location','Call Type','Title1','Title2','Title3','Title4','Title5');   
                                    }
                                    if(!empty($deliveryorders )): ?>
                                     <?php foreach($deliveryorders as $k=>$deliveryorder): ?>
                                    <tr <?php if($deliveryorder['Deliveryorder']['is_approved'] == 1):?> class="" <?php else:?> class="themed-color-fire" <?php endif; ?>>
                                        <td class="text-center"><?PHP echo $deliveryorder['Deliveryorder']['delivery_order_no'] ?></td>
                                        <td class="text-center"><?PHP echo $deliveryorder['Deliveryorder']['delivery_order_date'] ?></td>
                                        <td class="text-center"><?PHP echo $deliveryorder['Deliveryorder']['salesorder_id'] ?></td>
                                        <td class="text-center"><?PHP echo $this->Delivery->find_customer($deliveryorder['Deliveryorder']['customer_id']) ?></td>
                                        <td class="text-center"><?PHP echo $deliveryorder['Deliveryorder']['phone'] ?></td>
                                        <td class="text-center"><?PHP echo $deliveryorder['Deliveryorder']['email'] ?></td>
                                        <td class="text-center"><?PHP echo $deliveryorder['Deliveryorder']['our_reference_no'] ?></td>
                                       <?php 
                                        if($fulllist == 1)
                                        {
                                        ?>
                                        <td class="text-center"><?PHP echo $deliveryorder['Instrument']['name'] ?></td>
                                        <td class="text-center"><?PHP echo $deliveryorder['Brand']['brandname'] ?></td>
                                        <td class="text-center"><?PHP echo $deliveryorder['DelDescription']['model_no'] ?></td>
                                        <td class="text-center"><?PHP echo $deliveryorder['Range']['range_name'] ?></td>
                                        <td class="text-center"><?PHP echo $deliveryorder['DelDescription']['delivery_calllocation'] ?></td>
                                        <td class="text-center"><?PHP echo $deliveryorder['DelDescription']['delivery_calltype'] ?></td>
                                        
                                     <?php  $count1 = 0;
for($i=0;$i<=4;$i++):
    if(isset($titles[$i])): ?>
                                        <td class="text-center"><?php echo $deliveryorder['DelDescription']['title'.($i+1).'_val'] ?></td>
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
                                    $excel[] = array(($k+1),$deliveryorder['Deliveryorder']['delivery_order_no'],$deliveryorder['Deliveryorder']['delivery_order_date'],$deliveryorder['Deliveryorder']['branch_id'],$deliveryorder['Deliveryorder']['customer_address'],
                    $this->Salesorder->salesperson($deliveryorder['Deliveryorder']['attn']),$deliveryorder['Deliveryorder']['phone'],$deliveryorder['Deliveryorder']['fax'],$deliveryorder['Deliveryorder']['email'],
                    $deliveryorder['Deliveryorder']['ref_no'],$deliveryorder['Deliveryorder']['remarks'],$deliveryorder['Deliveryorder']['customer_id'],$this->Delivery->find_customer($deliveryorder['Deliveryorder']['customer_id']),
                    $this->Salesorder->getservicetype($deliveryorder['Deliveryorder']['service_id']),$deliveryorder['Deliveryorder']['is_approved']);
                                    }
                                    else
                                    {
                                     $excel[] = array(($k+1),$deliveryorder['Deliveryorder']['delivery_order_no'],$deliveryorder['Deliveryorder']['delivery_order_date'],$deliveryorder['Deliveryorder']['branch_id'],$deliveryorder['Deliveryorder']['customer_address'],
                    $this->Salesorder->salesperson($deliveryorder['Deliveryorder']['attn']),$deliveryorder['Deliveryorder']['phone'],$deliveryorder['Deliveryorder']['fax'],$deliveryorder['Deliveryorder']['email'],
                    $deliveryorder['Deliveryorder']['ref_no'],$deliveryorder['Deliveryorder']['remarks'],$deliveryorder['Deliveryorder']['customer_id'],$this->Delivery->find_customer($deliveryorder['Deliveryorder']['customer_id']),
                    $this->Salesorder->getservicetype($deliveryorder['Deliveryorder']['service_id']),$deliveryorder['Deliveryorder']['is_approved'],$deliveryorder['Instrument']['name'],$deliveryorder['Brand']['brandname'],$deliveryorder['DelDescription']['model_no'],
                    $deliveryorder['Range']['range_name'],$deliveryorder['DelDescription']['delivery_calllocation'],$deliveryorder['DelDescription']['delivery_calltype'],$deliveryorder['DelDescription']['title1_val'],$deliveryorder['DelDescription']['title2_val'],$deliveryorder['DelDescription']['title3_val'],$deliveryorder['DelDescription']['title4_val'],$deliveryorder['DelDescription']['title5_val']);
                                    }
                                    endforeach; ?>
                                    <?PHP endif; ?>
                                   <?php 
                $foldername = APP."webroot/excel";
                $file = fopen($foldername.'/deliveryorderdatas.csv', 'w');
                foreach($excel as $row) {
                fputcsv($file, $row);
                } 
                ?>
                            </tbody>    
                            </table>
                            
                         <?php echo $this->Html->script('pages/uiProgress'); ?>
                            <script>$(function(){ UiProgress.init(); });</script>
                                
                                <?php if($this->Session->flash()!='') { ?>
                            <script> var UiProgress = function() {
                                
                                // Get random number function from a given range
                                var getRandomInt = function(min, max) {
                                    return Math.floor(Math.random() * (max - min + 1)) + min;
                                };
                            }();
                            </script> 
                            <?php } ?>
