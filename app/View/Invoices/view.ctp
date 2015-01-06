<script>
    var path_url='<?PHP echo Router::url('/',true); ?>';
    $(function(){
    $('#inv_date').datepicker("setDate", new Date());
});
$(document).ready(function() {
    $('.approve_invoice').click(function() {
        window.location.href = path_url+"Invoices/";
        
    });
});

$(function() {
    $('.edit_sales_unit').editable(path_url+'/Salesorders/price_change', {
         id        : 'device_id',
         name      : 'sales_unitprice',
         type      : 'text',
         cancel    : 'Cancel',
         submit    : 'Save',
         tooltip   : 'Click to edit the price'
    });
     $('.edit_sales_unit_dis').editable(path_url+'/Salesorders/price_change_discount', {
         id        : 'device_id',
         name      : 'sales_discount',
         type      : 'text',
         cancel    : 'Cancel',
         submit    : 'Save',
         tooltip   : 'Click to edit the price'
    });
    
    
    $('.edit_po_unit').editable(path_url+'/Quotations/price_change', {
         id        : 'device_id',
         name      : 'unit_price',
         type      : 'text',
         cancel    : 'Cancel',
         submit    : 'Save',
         tooltip   : 'Click to edit the price'
    });
     $('.edit_po_unit_dis').editable(path_url+'/Quotations/price_change_discount', {
         id        : 'device_id',
         name      : 'discount',
         type      : 'text',
         cancel    : 'Cancel',
         submit    : 'Save',
         tooltip   : 'Click to edit the price'
    });
    });
</script>


<?PHP if(!empty($salesorder_list)):?>
<script>
$(function() {
    $('.edit_title1').editable(path_url+'/Salesorders/inv_title1', {
            id        : 'device_id',
            name      : 'title1',
            type      : 'text',
            cancel    : 'Cancel',
            submit    : 'Save',
            tooltip   : 'Click to edit'
       });
    $('.edit_title2').editable(path_url+'/Salesorders/inv_title2', {
            id        : 'device_id',
            name      : 'title2',
            type      : 'text',
            cancel    : 'Cancel',
            submit    : 'Save',
            tooltip   : 'Click to edit'
       });
    $('.edit_title3').editable(path_url+'/Salesorders/inv_title3', {
            id        : 'device_id',
            name      : 'title3',
            type      : 'text',
            cancel    : 'Cancel',
            submit    : 'Save',
            tooltip   : 'Click to edit'
       });
    $('.edit_title4').editable(path_url+'/Salesorders/inv_title4', {
            id        : 'device_id',
            name      : 'title4',
            type      : 'text',
            cancel    : 'Cancel',
            submit    : 'Save',
            tooltip   : 'Click to edit'
       });
    $('.edit_title5').editable(path_url+'/Salesorders/inv_title5', {
            id        : 'device_id',
            name      : 'title5',
            type      : 'text',
            cancel    : 'Cancel',
            submit    : 'Save',
            tooltip   : 'Click to edit'
       });
    $('.edit_title6').editable(path_url+'/Salesorders/inv_title6', {
            id        : 'device_id',
            name      : 'title6',
            type      : 'text',
            cancel    : 'Cancel',
            submit    : 'Save',
            tooltip   : 'Click to edit'
       });
    $('.edit_title7').editable(path_url+'/Salesorders/inv_title7', {
            id        : 'device_id',
            name      : 'title7',
            type      : 'text',
            cancel    : 'Cancel',
            submit    : 'Save',
            tooltip   : 'Click to edit'
       });
    $('.edit_title8').editable(path_url+'/Salesorders/inv_title8', {
            id        : 'device_id',
            name      : 'title8',
            type      : 'text',
            cancel    : 'Cancel',
            submit    : 'Save',
            tooltip   : 'Click to edit'
       });
});
</script>
<style>
    .show{
        padding:10px; 
        border-bottom:1px #999 dashed;
        font-size:15px; 
        height:50px;
        float: top;
    }
    .show:hover{
        background:#4c66a4;
        color:#FFF;
        cursor:pointer;
    }
    #result{
        position: absolute;
        z-index: 999;
    }
 </style>

    <h1>
        <i class="gi gi-user"></i>View Invoice
    </h1>
    </div>
</div>
    <ul class="breadcrumb breadcrumb-top">
        <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
        <li><?php echo $this->Html->link('Invoice',array('controller'=>'Invoices','action'=>'index')); ?></li>
        <li>View Invoice</li>
    </ul>
                    
<div class="row">
    <div class="col-md-12">
        <div class="block">
            <div class="block-title clearfix">
                <h2 class="pull-right ">
                   Track Id : <?PHP echo $salesorder_list['Salesorder']['track_id']; ?>
                </h2>
            </div>
            <div class="panel panel-default">
                <?php echo $this->Form->create('Invoice',array('class'=>'form-horizontal form-bordered','id'=>'form-invoice-approve')); ?>
                <?php echo $this->Form->input('Invoice.salesorder_id', array('type'=>'hidden','value'=>$salesorder_list['Salesorder']['id'])); ?>
                <?php echo $this->Form->input('Invoice.full_type', array('type'=>'hidden','value'=>$salesorder_list['Customer']['invoice_type_id'])); ?>
                <?php echo $this->Form->input('Invoice.track_id', array('type'=>'hidden','value'=>$salesorder_list['Salesorder']['track_id'])); ?>
                <?php //echo $this->Form->input('Salesorder.salesorder_id', array('type'=>'hidden','value'=>$salesorderno)); ?>
                
                <div class="panel-body panel-body-nopadding">
                    <div class="form-group"> 
                    <label class="col-md-2 control-label" for="invoiceno">Invoice No</label>
                        <div class="col-md-4">
                            <?php echo $this->Form->input('invoiceno', array('id'=>'invoiceno','class'=>'form-control','readonly'=>'readonly','label'=>false,'name'=>'invoiceno','value'=>$invoice_no)); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="inv_customer">Customer Name</label>
                        <div class="col-md-4">
                            <?php echo $this->Form->input('customer_name', array('id'=>'inv_customer','class'=>'form-control','readonly'=>'readonly','label'=>false,'name'=>'inv_customer_name','value'=>$salesorder_list['Customer']['customername'])); ?>
                        </div>
                        <label class="col-md-2 control-label" for="inv_dueamount">Due Amount</label>
                        <div class="col-md-4">
                            <?php echo $this->Form->input('due_amount', 
                                    array('id'=>'inv_dueamount','class'=>'form-control','label'=>false,'type'=>'text','readonly'=>'readonly','value'=>$salesorder_list['Salesorder']['due_amount'])); ?>
                        </div>
                    </div>
                    <div class="form-group">
                    <!--      <label class="col-md-2 control-label" for="del_address_id">Delivery Addresses List</label>
                        <div class="col-md-4">
                            <?php //echo $this->Form->input('Deliveryorder.delivery_address', array('id'=>'del_address_id','class'=>'form-control',
                                //'label'=>false,'type'=>'select','options'=>array($deliveryorder['Deliveryorder']['delivery_address']=>$deliveryorder['Deliveryorder']['delivery_address']),'selected'=>'selected')); ?>
                        </div>

                        <label class="col-md-2 control-label" for="del_customer_address">Customer Address</label>
                        <div class="col-md-4">
                            <?php //echo $this->Form->textarea('Deliveryorder.customer_address', array('id'=>'del_customer_address','class'=>'form-control',
                                                                   //'label'=>false,'rows'=>6,'cols'=>30)); ?>
                        </div>-->
                    <!--    <label class="col-md-2 control-label" for="val_addr">Select Address</label>
                        <div class="col-md-4">
                            <?php //echo $this->Form->input('delivery_address', array('id'=>'val_addr','class'=>'form-control select-chosen','label'=>false,'name'=>'addr','type'=>'select','options'=>array('billing'=>'Billing'),'readonly'=>'readonly')); ?>
                        </div>-->
                        <label class="col-md-2 control-label" for="val_address">Billing Address</label>
                        <div class="col-md-4">
                            <?php echo $this->Form->textarea('regaddress', array('class'=>'form-control',
                                                                   'placeholder'=>'Enter the Delivery Address','label'=>false,'rows'=>4,'cols'=>30,'readonly'=>'readonly','value'=>$salesorder_list['Salesorder']['address'])); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="inv_contactpersonname">ATTN</label>
                        <div class="col-md-4">
                            <?php echo $this->Form->input('contactpersonname', array('id'=>'inv_contactpersonname',
                                'class'=>'form-control','label'=>false,'readonly'=>'readonly','value'=>$contactperson['name'])); ?>
                        </div>
                        <label class="col-md-2 control-label" for="inv_email">Email</label>
                        <div class="col-md-4">
                            <?php echo $this->Form->input('email', array('id'=>'inv_email','class'=>'form-control',
                                                                    'label'=>false,'readonly'=>'readonly','value'=>$contactperson['email'])); ?>
                        </div>

                    </div>
                    <div class="form-group">

                        <label class="col-md-2 control-label" for="inv_phone">Phone</label>
                        <div class="col-md-4">
                            <?php echo $this->Form->input('phone', array('id'=>'inv_phone','class'=>'form-control',
                                                                    'label'=>false,'readonly'=>'readonly','value'=>$contactperson['phone'])); ?>

                        </div>
                        <label class="col-md-2 control-label" for="inv_fax">Fax</label>
                        <div class="col-md-4">
                            <?php echo $this->Form->input('fax', array('id'=>'inv_fax','class'=>'form-control','label'=>false,'readonly'=>'readonly','value'=>$salesorder_list['Salesorder']['fax'])); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="inv_del_order_no">Delivery Order No</label>
                        <div class="col-md-4">
                            <?php echo $this->Form->input('delivery_order_no', array('id'=>'inv_del_order_no','class'=>'form-control','label'=>false,'value'=>$deliveryorderno,'readonly'=>'readonly')); ?>
                        </div>
                        <label class="col-md-2 control-label" for="inv_date">Invoice Date</label>
                        <div class="col-md-4">
                            <?php echo $this->Form->input('invoice_date', array('id'=>'inv_date','Type'=>'text','class'=>'form-control input-datepicker-close','data-date-format'=>'dd-MM-yy','label'=>false)); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="inv_ref_no">PO Reference No</label>
                        <div class="col-md-4">
                            <?php echo $this->Form->input('po_reference_no', array('id'=>'inv_ref_no','class'=>'form-control','label'=>false,'readonly'=>'readonly','value'=>$salesorder_list['Salesorder']['ref_no'])); ?>
                        </div>
                        <label class="col-md-2 control-label" for="total">Total</label>
                        <div class="col-md-4">
                            <?php echo $this->Form->input('total', array('id'=>'total','class'=>'form-control','label'=>false,'readonly'=>'readonly','value'=>$total)); ?>
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="inv_remarks">Remarks</label>
                        <div class="col-md-4">
                            <?php echo $this->Form->textarea('remarks', array('id'=>'inv_remarks','class'=>'form-control',
                                                                   'label'=>false,'rows'=>6,'cols'=>30,'value'=>$salesorder_list['Salesorder']['remarks'],'readonly'=>'readonly')); ?>
                        </div>
                        <label class="col-md-2 control-label" for="inv_service_type">Service Type</label>
                        <div class="col-md-4">
                            <?php echo $this->Form->input('service_type', array('id'=>'inv_service_type','class'=>'form-control','value'=>$servicetype,'label'=>false,'readonly'=>'readonly')); ?>
                            <div id="result">
                            </div>
                        </div>
                    </div>  
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="val_instrument_type">Select Instrument For</label>
                        <div class="col-md-12">
                            <?php echo $this->Form->input('val_instrument_type', array('class'=>'form-control','type'=>'text',
                                                                    'label'=>false,'value'=>$salesorder_list['Quotation']['InstrumentType']['invoice'],'readonly'=>'readonly')); ?>
                        </div>
                    </div>
                    <?PHP 
        //pr($deliveryorder['DelDescription']);exit;
        $device1 = 0;
        $device2 = 0;
        $device3 = 0;
        $device4 = 0;
        $device5 = 0;
        $device6 = 0;
        $device7 = 0;
        $device8 = 0;
            if(!empty($desc)):
                foreach($desc as $device):
                    if($device['title1_val']!=''): $device1 +=1; endif;
                    if($device['title2_val']!=''): $device2 +=1; endif;
                    if($device['title3_val']!=''): $device3 +=1; endif;
                    if($device['title4_val']!=''): $device4 +=1; endif;
                    if($device['title5_val']!=''): $device5 +=1; endif;
                    if($device['title6_val']!=''): $device6 +=1; endif;
                    if($device['title7_val']!=''): $device7 +=1; endif;
                    if($device['title8_val']!=''): $device8 +=1; endif;
                endforeach;
            endif;
        ?>
                    <div class="col-sm-3 col-lg-12">
                        <div class="table-responsive">
                            <table id="beforedo-datatable" class="table table-vcenter table-condensed table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">S.No</th>
                                        <th class="text-center">Instrument</th>
                                        <th class="text-center">Brand</th>
                                        <th class="text-center">Model No</th>
                                        <th class="text-center">Range</th>
                                        <th class="text-center">Call Location</th>
                                        <th class="text-center">Call Type</th>
                                        <th class="text-center">Unit Price</th>
                                        <th class="text-center">Department</th>
                                        <th class="text-center">Discount</th>
                                        <th class="text-center">Total</th>
                                        <?php if($device1 != 0): ?> 
            <th class="text-center edit_title1"><?php echo $titles[0]; ?></th>
            <?php endif; ?>
             <?php if($device2 != 0): ?> 
            <th class="text-center edit_title2"><?php echo $titles[1]; ?></th>
            <?php endif; ?>
             <?php if($device3 != 0): ?> 
            <th class="text-center edit_title3"><?php echo $titles[2]; ?></th>
            <?php endif; ?>
             <?php if($device4 != 0): ?> 
            <th class="text-center edit_title4"><?php echo $titles[3]; ?></th>
            <?php endif; ?>
             <?php if($device5 != 0): ?> 
            <th class="text-center edit_title5"><?php echo $titles[4]; ?></th>
            <?php endif; ?>
             <?php if($device6 != 0): ?> 
            <th class="text-center edit_title6"><?php echo $titles[5]; ?></th>
            <?php endif; ?>
             <?php if($device7 != 0): ?> 
            <th class="text-center edit_title7"><?php echo $titles[6]; ?></th>
            <?php endif; ?>
             <?php if($device8 != 0): ?> 
            <th class="text-center edit_title8"><?php echo $titles[7]; ?></th>
            <?php endif; ?>
                                    </tr>
                                </thead>
                                <tbody class="sales_Instrument_info"> 
                                    <?PHP 
                                    //pr($deliveryorder['DelDescription']);exit;
                                    if(!empty($desc)):
                                        $total_device = 0;
                                        
                                        foreach($desc as $device):
                                        //pr($device);exit;
                                            if($device['title1_val']!=''): $device1 +=1; endif;
                                            if($device['title2_val']!=''): $device2 +=1; endif;
                                            if($device['title3_val']!=''): $device3 +=1; endif;
                                            if($device['title4_val']!=''): $device4 +=1; endif;
                                            if($device['title5_val']!=''): $device5 +=1; endif;
                                            if($device['title6_val']!=''): $device6 +=1; endif;
                                            if($device['title7_val']!=''): $device7 +=1; endif;
                                            if($device['title8_val']!=''): $device8 +=1; endif;
                                        $total_device = $total_device + $device['sales_total'];
                                    ?>
                                        <tr class="sales_instrument_remove_<?PHP echo $device['id']; ?>">
                                            <td class="text-center"><?PHP echo $device['order_by']; ?></td>
                                            <td class="text-center"><?PHP echo $device['Instrument']['name']; ?></td>
                                            <td class="text-center"><?PHP echo $device['Brand']['brandname']; ?></td>
                                            <td class="text-center"><?PHP echo $device['model_no']; ?></td>
                                            <td class="text-center"><?PHP echo $device['Range']['range_name']; ?></td>
                                            <td class="text-center"><?PHP echo $device['sales_calllocation']; ?></td>
                                            <td class="text-center"><?PHP echo $device['sales_calltype']; ?></td>
                                            <td class="text-center edit_sales_unit" id="<?PHP echo $device['id']; ?>"><?PHP echo $device['sales_unitprice']; ?></td>
                                            <td class="text-center"><?PHP echo $device['Department']['departmentname']; ?></td>
                                            <td class="text-center edit_sales_unit_dis" id="<?PHP echo $device['id']; ?>"><?PHP echo $device['sales_discount']; ?></td>
                                            <td class="text-center"><?PHP echo $device['sales_total']; ?></td>
                                            <?php if($device1 != 0): ?> 
                                            <td class="text-center edit_title1" id="<?PHP echo $device['id']; ?>"><?PHP echo $device['title1_val']; ?></td>
                                            <?php endif; ?>
                                            <?php if($device2 != 0): ?> 
                                            <td class="text-center edit_title2" id="<?PHP echo $device['id']; ?>"><?PHP echo $device['title2_val']; ?></td>
                                            <?php endif; ?>
                                            <?php if($device3 != 0): ?> 
                                            <td class="text-center edit_title3" id="<?PHP echo $device['id']; ?>"><?PHP echo $device['title3_val']; ?></td>
                                            <?php endif; ?>
                                            <?php if($device4 != 0): ?> 
                                            <td class="text-center edit_title4" id="<?PHP echo $device['id']; ?>"><?PHP echo $device['title4_val']; ?></td>
                                            <?php endif; ?>
                                            <?php if($device5 != 0): ?> 
                                            <td class="text-center edit_title5" id="<?PHP echo $device['id']; ?>"><?PHP echo $device['title5_val']; ?></td>
                                            <?php endif; ?>
                                            <?php if($device6 != 0): ?> 
                                            <td class="text-center edit_title6" id="<?PHP echo $device['id']; ?>"><?PHP echo $device['title6_val']; ?></td>
                                            <?php endif; ?>
                                            <?php if($device7 != 0): ?> 
                                            <td class="text-center edit_title7" id="<?PHP echo $device['id']; ?>"><?PHP echo $device['title7_val']; ?></td>
                                            <?php endif; ?>
                                            <?php if($device8 != 0): ?> 
                                            <td class="text-center edit_title8" id="<?PHP echo $device['id']; ?>"><?PHP echo $device['title8_val']; ?></td>
                                            <?php endif; ?>
                                        </tr>
                                    <?PHP 
                                        endforeach; 
                                    ?>
                                    <?php 
                                    else:
                                        echo "<tr><td class='text-center'>No Records Found</td></tr>";
                                    endif;
                                    $gst_total = ($total_device * $gst)/100;
                                    ?>
                                        <tr>
               <td colspan="10" style="border-top:1px solid #000;padding:3px 10px;font-size:11px !important;">SUB TOTAL $(SGD)</td>
               <td style="border-top:1px solid #000;padding:3px 10px;font-size:11px !important;"><?php echo $total_device; ?></td>
          </tr>
         <tr>
               <td colspan="10" style="border-top:1px solid #000;padding:3px 10px;font-size:11px !important;">GST ( <?php echo $gst; ?>%  )</td>
               <td style="border-top:1px solid #000;padding:3px 10px;font-size:11px !important;"><?php echo $gst_total; ?></td>
          </tr>
          <tr>
               <td colspan="10" style="border-bottom:1px solid #000;padding:3px 10px;font-size:11px !important;color: #000 !important;">Additional Charges</td>
               <td style="border-bottom:1px solid #000;padding:3px 10px;font-size:11px !important;color: #000 !important;"><?php echo $v = $additional_charge; if($v == ''){echo '0.0';} ?></td>
          </tr>
		   <tr>
               <td colspan="10" style="padding:3px 10px;font-size:11px !important;color: #000 !important;">GRAND TOTAL $(SGD)</td>
               <td style="padding:3px 10px;font-size:11px !important;color: #000 !important;"><?php echo $total_device + $gst_total +$v; ?></td>
          </tr>
          
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <div class="form-group form-actions">
                        <div class="col-md-9 col-md-offset-10">
                        <?php //if($invoices['Salesorder']['is_approved']==1 && $invoices['Salesorder']['is_poapproved']==1 ): ?>
                        <?php  echo $this->Form->button('<i class="fa fa-angle-right"></i> Save',array('type'=>'button','class'=>'btn btn-sm btn-primary approve_invoice','escape' => false)); ?>
                            <?php //endif; ?>

                        </div>
                    </div>

<!-- panel -->
                    
                </div>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
                    <!-- END Basic Form Elements Content -->
    </div>
                    <!-- END Basic Form Elements Block -->
</div>
    <?php echo $this->Html->script('pages/formsValidation'); ?>
    <script>$(function(){ FormsValidation.init(); });</script>
    <?php echo $this->Html->script('pages/uiProgress'); ?>
    <script>$(function(){ UiProgress.init(); });</script>
 <?php endif; ?>
    
    
    
<!---------------------------------------------------------------------------------------------------------------------------------------->
<!---------------------------------------------------------------------------------------------------------------------------------------->
<!---------------------------------------------------------------------------------------------------------------------------------------->
<!---------------------------------------------------------------------------------------------------------------------------------------->



<?PHP if(!empty($po_list_first)):?>

<script>
$(function() {
    $('.edit_title1').editable(path_url+'/Quotations/inv_title1', {
            id        : 'device_id',
            name      : 'title1',
            type      : 'text',
            cancel    : 'Cancel',
            submit    : 'Save',
            tooltip   : 'Click to edit'
       });
    $('.edit_title2').editable(path_url+'/Quotations/inv_title2', {
            id        : 'device_id',
            name      : 'title2',
            type      : 'text',
            cancel    : 'Cancel',
            submit    : 'Save',
            tooltip   : 'Click to edit'
       });
    $('.edit_title3').editable(path_url+'/Quotations/inv_title3', {
            id        : 'device_id',
            name      : 'title3',
            type      : 'text',
            cancel    : 'Cancel',
            submit    : 'Save',
            tooltip   : 'Click to edit'
       });
    $('.edit_title4').editable(path_url+'/Quotations/inv_title4', {
            id        : 'device_id',
            name      : 'title4',
            type      : 'text',
            cancel    : 'Cancel',
            submit    : 'Save',
            tooltip   : 'Click to edit'
       });
    $('.edit_title5').editable(path_url+'/Quotations/inv_title5', {
            id        : 'device_id',
            name      : 'title5',
            type      : 'text',
            cancel    : 'Cancel',
            submit    : 'Save',
            tooltip   : 'Click to edit'
       });
    $('.edit_title6').editable(path_url+'/Quotations/inv_title6', {
            id        : 'device_id',
            name      : 'title6',
            type      : 'text',
            cancel    : 'Cancel',
            submit    : 'Save',
            tooltip   : 'Click to edit'
       });
    $('.edit_title7').editable(path_url+'/Quotations/inv_title7', {
            id        : 'device_id',
            name      : 'title7',
            type      : 'text',
            cancel    : 'Cancel',
            submit    : 'Save',
            tooltip   : 'Click to edit'
       });
    $('.edit_title8').editable(path_url+'/Quotations/inv_title8', {
            id        : 'device_id',
            name      : 'title8',
            type      : 'text',
            cancel    : 'Cancel',
            submit    : 'Save',
            tooltip   : 'Click to edit'
       });
});
</script>
<style>
    .show{
        padding:10px; 
        border-bottom:1px #999 dashed;
        font-size:15px; 
        height:50px;
        float: top;
    }
    .show:hover{
        background:#4c66a4;
        color:#FFF;
        cursor:pointer;
    }
    #result{
        position: absolute;
        z-index: 999;
    }
 </style>

    <h1>
        <i class="gi gi-user"></i>Edit Invoice
    </h1>
    </div>
</div>
    <ul class="breadcrumb breadcrumb-top">
        <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
        <li><?php echo $this->Html->link('Invoice',array('controller'=>'Invoices','action'=>'index')); ?></li>
        <li>Approve Invoice</li>
    </ul>
                    
<div class="row">
    <div class="col-md-12">
        <div class="block">
            <div class="block-title clearfix">
                <h2 class="pull-right ">
                   Track Id : <?PHP echo $po_list_first['Quotation']['track_id']; ?>
                </h2>
            </div>
            <div class="panel panel-default">
                <?php echo $this->Form->create('Invoice',array('class'=>'form-horizontal form-bordered','id'=>'form-invoice-approve')); ?>
                <?php echo $this->Form->input('Invoice.quotationno', array('type'=>'hidden','value'=>$po_list_first['Quotation']['quotationno'])); ?>
                <?php echo $this->Form->input('Invoice.full_type', array('type'=>'hidden','value'=>$po_list_first['Customer']['invoice_type_id'])); ?>
                <?php echo $this->Form->input('Invoice.track_id', array('type'=>'hidden','value'=>$po_list_first['Quotation']['track_id'])); ?>
                
                <div class="panel-body panel-body-nopadding">
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="inv_customer">Customer Name</label>
                        <div class="col-md-4">
                            <?php echo $this->Form->input('customer_name', array('id'=>'inv_customer','class'=>'form-control','readonly'=>'readonly','label'=>false,'name'=>'inv_customer_name','value'=>$po_list_first['Customer']['customername'])); ?>
                        </div>
                        <label class="col-md-2 control-label" for="inv_dueamount">Due Amount</label>
                        <div class="col-md-4">
                            <?php echo $this->Form->input('due_amount', 
                                    array('id'=>'inv_dueamount','class'=>'form-control','label'=>false,'type'=>'text','readonly'=>'readonly','value'=>$po_list_first['Quotation']['due_amount'])); ?>
                        </div>
                    </div>
                    <div class="form-group">
                    <!--      <label class="col-md-2 control-label" for="del_address_id">Delivery Addresses List</label>
                        <div class="col-md-4">
                            <?php //echo $this->Form->input('Deliveryorder.delivery_address', array('id'=>'del_address_id','class'=>'form-control',
                                //'label'=>false,'type'=>'select','options'=>array($deliveryorder['Deliveryorder']['delivery_address']=>$deliveryorder['Deliveryorder']['delivery_address']),'selected'=>'selected')); ?>
                        </div>

                        <label class="col-md-2 control-label" for="del_customer_address">Customer Address</label>
                        <div class="col-md-4">
                            <?php //echo $this->Form->textarea('Deliveryorder.customer_address', array('id'=>'del_customer_address','class'=>'form-control',
                                                                   //'label'=>false,'rows'=>6,'cols'=>30)); ?>
                        </div>-->
                    <!--    <label class="col-md-2 control-label" for="val_addr">Select Address</label>
                        <div class="col-md-4">
                            <?php //echo $this->Form->input('delivery_address', array('id'=>'val_addr','class'=>'form-control select-chosen','label'=>false,'name'=>'addr','type'=>'select','options'=>array('billing'=>'Billing'),'readonly'=>'readonly')); ?>
                        </div>-->
                        <label class="col-md-2 control-label" for="val_address">Billing Address</label>
                        <div class="col-md-4">
                            <?php echo $this->Form->textarea('regaddress', array('class'=>'form-control',
                                                                   'placeholder'=>'Enter the Delivery Address','label'=>false,'rows'=>4,'cols'=>30,'readonly'=>'readonly','value'=>$po_list_first['Quotation']['address'])); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="inv_contactpersonname">ATTN</label>
                        <div class="col-md-4">
                            <?php echo $this->Form->input('contactpersonname', array('id'=>'inv_contactpersonname',
                                'class'=>'form-control','label'=>false,'readonly'=>'readonly','value'=>$contactperson['name'])); ?>
                        </div>
                        <label class="col-md-2 control-label" for="inv_email">Email</label>
                        <div class="col-md-4">
                            <?php echo $this->Form->input('email', array('id'=>'inv_email','class'=>'form-control',
                                                                    'label'=>false,'readonly'=>'readonly','value'=>$po_list_first['Quotation']['email'])); ?>
                        </div>

                    </div>
                    <div class="form-group">

                        <label class="col-md-2 control-label" for="inv_phone">Phone</label>
                        <div class="col-md-4">
                            <?php echo $this->Form->input('phone', array('id'=>'inv_phone','class'=>'form-control',
                                                                    'label'=>false,'readonly'=>'readonly','value'=>$po_list_first['Quotation']['phone'])); ?>

                        </div>
                        <label class="col-md-2 control-label" for="inv_fax">Fax</label>
                        <div class="col-md-4">
                            <?php echo $this->Form->input('fax', array('id'=>'inv_fax','class'=>'form-control','label'=>false,'readonly'=>'readonly','value'=>$po_list_first['Quotation']['fax'])); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="inv_del_order_no">Delivery Order No</label>
                        <div class="col-md-4">
                            <?php echo $this->Form->input('delivery_order_no', array('id'=>'inv_del_order_no','class'=>'form-control','label'=>false,'value'=>$deliveryorderno,'readonly'=>'readonly')); ?>
                        </div>
                        <label class="col-md-2 control-label" for="inv_date">Invoice Date</label>
                        <div class="col-md-4">
                            <?php echo $this->Form->input('invoice_date', array('id'=>'inv_date','Type'=>'text','class'=>'form-control input-datepicker-close','data-date-format'=>'dd-MM-yy','label'=>false)); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="inv_ref_no">PO Reference No</label>
                        <div class="col-md-4">
                            <?php echo $this->Form->input('po_reference_no', array('id'=>'inv_ref_no','class'=>'form-control','label'=>false,'readonly'=>'readonly','value'=>$po_list_first['Quotation']['ref_no'])); ?>
                        </div>
                        <label class="col-md-2 control-label" for="total">Total</label>
                        <div class="col-md-4">
                            <?php echo $this->Form->input('total', array('id'=>'total','class'=>'form-control','label'=>false,'readonly'=>'readonly','value'=>$total)); ?>
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="inv_remarks">Remarks</label>
                        <div class="col-md-4">
                            <?php echo $this->Form->textarea('remarks', array('id'=>'inv_remarks','class'=>'form-control',
                                                                   'label'=>false,'rows'=>6,'cols'=>30,'value'=>$po_list_first['Customerspecialneed']['remarks'],'readonly'=>'readonly')); ?>
                        </div>
                        <label class="col-md-2 control-label" for="inv_service_type">Service Type</label>
                        <div class="col-md-4">
                            <?php echo $this->Form->input('service_type', array('id'=>'inv_service_type','class'=>'form-control','value'=>$servicetype,'label'=>false,'readonly'=>'readonly')); ?>
                            <div id="result">
                            </div>
                        </div>
                    </div>  
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="val_instrument_type">Select Instrument For</label>
                        <div class="col-md-12">
                            <?php echo $this->Form->input('val_instrument_type', array('class'=>'form-control','type'=>'text',
                                                                    'label'=>false,'value'=>$po_list_first['InstrumentType']['invoice'],'readonly'=>'readonly')); ?>
                        </div>
                    </div>
                     <?PHP 
        //pr($deliveryorder['DelDescription']);exit;
        $device1 = 0;
        $device2 = 0;
        $device3 = 0;
        $device4 = 0;
        $device5 = 0;
        $device6 = 0;
        $device7 = 0;
        $device8 = 0;
            if(!empty($desc)):
                 foreach($desc as $devic):
                foreach($devic as $device):
                    if($device['title1_val']!=''): $device1 +=1; endif;
                    if($device['title2_val']!=''): $device2 +=1; endif;
                    if($device['title3_val']!=''): $device3 +=1; endif;
                    if($device['title4_val']!=''): $device4 +=1; endif;
                    if($device['title5_val']!=''): $device5 +=1; endif;
                    if($device['title6_val']!=''): $device6 +=1; endif;
                    if($device['title7_val']!=''): $device7 +=1; endif;
                    if($device['title8_val']!=''): $device8 +=1; endif;
                endforeach;
                endforeach;
            endif;
        ?>
                    <div class="col-sm-3 col-lg-12">
                        <div class="table-responsive">
                            <table id="beforedo-datatable" class="table table-vcenter table-condensed table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">S.No</th>
                                        <th class="text-center">Instrument</th>
                                        <th class="text-center">Brand</th>
                                        <th class="text-center">Model No</th>
                                        <th class="text-center">Range</th>
                                        <th class="text-center">Call Location</th>
                                        <th class="text-center">Call Type</th>
                                        <th class="text-center">Department</th>
                                        <th class="text-center">Unit Price</th>
                                        <th class="text-center">Discount</th>
                                        <th class="text-center">Total</th>
                                        <?php if($device1 != 0): ?> 
            <th class="text-center edit_title1"><?php echo $titles[0]; ?></th>
            <?php endif; ?>
             <?php if($device2 != 0): ?> 
            <th class="text-center edit_title2"><?php echo $titles[1]; ?></th>
            <?php endif; ?>
             <?php if($device3 != 0): ?> 
            <th class="text-center edit_title3"><?php echo $titles[2]; ?></th>
            <?php endif; ?>
             <?php if($device4 != 0): ?> 
            <th class="text-center edit_title4"><?php echo $titles[3]; ?></th>
            <?php endif; ?>
             <?php if($device5 != 0): ?> 
            <th class="text-center edit_title5"><?php echo $titles[4]; ?></th>
            <?php endif; ?>
             <?php if($device6 != 0): ?> 
            <th class="text-center edit_title6"><?php echo $titles[5]; ?></th>
            <?php endif; ?>
             <?php if($device7 != 0): ?> 
            <th class="text-center edit_title7"><?php echo $titles[6]; ?></th>
            <?php endif; ?>
             <?php if($device8 != 0): ?> 
            <th class="text-center edit_title8"><?php echo $titles[7]; ?></th>
            <?php endif; ?>
                                    </tr>
                                </thead>
                                <tbody class="sales_Instrument_info"> 
                                   
                                    <?PHP 
                                    //pr($deliveryorder['DelDescription']);exit;
                                    if(!empty($desc)):
                                        $total_device = 0;
                                        foreach($desc as $devic):
                                        foreach($devic as $device):
                                            if($device['title1_val']!=''): $device1 +=1; endif;
                                            if($device['title2_val']!=''): $device2 +=1; endif;
                                            if($device['title3_val']!=''): $device3 +=1; endif;
                                            if($device['title4_val']!=''): $device4 +=1; endif;
                                            if($device['title5_val']!=''): $device5 +=1; endif;
                                            if($device['title6_val']!=''): $device6 +=1; endif;
                                            if($device['title7_val']!=''): $device7 +=1; endif;
                                            if($device['title8_val']!=''): $device8 +=1; endif;
                                        //pr($device);exit;
                                        $total_device = $total_device + $device['total'];
                                    ?>
                                        <tr class="sales_instrument_remove_<?PHP echo $device['id']; ?>">
                                            <td class="text-center"><?PHP echo $device['order_by']; ?></td>
                                            <td class="text-center"><?PHP echo $device['Instrument']['name']; ?></td>
                                            <td class="text-center"><?PHP echo $device['Brand']['brandname']; ?></td>
                                            <td class="text-center"><?PHP echo $device['model_no']; ?></td>
                                            <td class="text-center"><?PHP echo $device['Range']['range_name']; ?></td>
                                            <td class="text-center"><?PHP echo $device['call_location']; ?></td>
                                            <td class="text-center"><?PHP echo $device['call_type']; ?></td>
                                            <td class="text-center"><?PHP echo $device['Department']['departmentname']; ?></td>
                                            <td class="text-center edit_po_unit" id="<?PHP echo $device['id']; ?>"><?PHP echo $device['unit_price']; ?></td>
                                            <td class="text-center edit_po_unit_dis" id="<?PHP echo $device['id']; ?>"><?PHP echo $device['discount']; ?></td>
                                            
                                            <td class="text-center edit_po_unit" id="<?PHP echo $device['id']; ?>"><?PHP echo $device['total']; ?></td>
                                            <?php if($device1 != 0): ?> 
                                            <td class="text-center edit_title1" id="<?PHP echo $device['id']; ?>"><?PHP echo $device['title1_val']; ?></td>
                                            <?php endif; ?>
                                            <?php if($device2 != 0): ?> 
                                            <td class="text-center edit_title2" id="<?PHP echo $device['id']; ?>"><?PHP echo $device['title2_val']; ?></td>
                                            <?php endif; ?>
                                            <?php if($device3 != 0): ?> 
                                            <td class="text-center edit_title3" id="<?PHP echo $device['id']; ?>"><?PHP echo $device['title3_val']; ?></td>
                                            <?php endif; ?>
                                            <?php if($device4 != 0): ?> 
                                            <td class="text-center edit_title4" id="<?PHP echo $device['id']; ?>"><?PHP echo $device['title4_val']; ?></td>
                                            <?php endif; ?>
                                            <?php if($device5 != 0): ?> 
                                            <td class="text-center edit_title5" id="<?PHP echo $device['id']; ?>"><?PHP echo $device['title5_val']; ?></td>
                                            <?php endif; ?>
                                            <?php if($device6 != 0): ?> 
                                            <td class="text-center edit_title6" id="<?PHP echo $device['id']; ?>"><?PHP echo $device['title6_val']; ?></td>
                                            <?php endif; ?>
                                            <?php if($device7 != 0): ?> 
                                            <td class="text-center edit_title7" id="<?PHP echo $device['id']; ?>"><?PHP echo $device['title7_val']; ?></td>
                                            <?php endif; ?>
                                            <?php if($device8 != 0): ?> 
                                            <td class="text-center edit_title8" id="<?PHP echo $device['id']; ?>"><?PHP echo $device['title8_val']; ?></td>
                                            <?php endif; ?>
                                        </tr>
                                    <?PHP 
                                        endforeach; 
                                        endforeach; 
                                    ?>
                                    <?php 
                                    else:
                                        echo "<tr><td class='text-center'>No Records Found</td></tr>";
                                    endif;
                                    $gst_total = ($total_device * $gst)/100;
                                    ?>
                                        <tr>
               <td colspan="10" style="border-top:1px solid #000;padding:3px 10px;font-size:11px !important;">SUB TOTAL $(SGD)</td>
               <td style="border-top:1px solid #000;padding:3px 10px;font-size:11px !important;"><?php echo $total_device; ?></td>
          </tr>
          <tr>
               <td colspan="10" style="border-top:1px solid #000;padding:3px 10px;font-size:11px !important;">GST ( <?php echo $gst; ?>%  )</td>
               <td style="border-top:1px solid #000;padding:3px 10px;font-size:11px !important;"><?php echo $gst_total; ?></td>
          </tr>
         <tr>
               <td colspan="10" style="border-bottom:1px solid #000;padding:3px 10px;font-size:11px !important;color: #000 !important;">Additional Charges</td>
               <td style="border-bottom:1px solid #000;padding:3px 10px;font-size:11px !important;color: #000 !important;"><?php echo $v = $additional_charge; if($v == ''){echo '0.0';} ?></td>
          </tr>
		   <tr>
               <td colspan="10" style="padding:3px 10px;font-size:11px !important;color: #000 !important;">GRAND TOTAL $(SGD)</td>
               <td style="padding:3px 10px;font-size:11px !important;color: #000 !important;"><?php echo $total_device + $gst_total + $v; ?></td>
          </tr>
          
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <div class="form-group form-actions">
                        <div class="col-md-9 col-md-offset-10">
                        <?php //if($invoices['Salesorder']['is_approved']==1 && $invoices['Salesorder']['is_poapproved']==1 ): ?>
                        <?php  echo $this->Form->button('<i class="fa fa-angle-right"></i> Save',array('type'=>'button','class'=>'btn btn-sm btn-primary approve_invoice','escape' => false)); ?>
                            <?php //endif; ?>

                        </div>
                    </div>

<!-- panel -->
                    
                </div>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
                    <!-- END Basic Form Elements Content -->
    </div>
                    <!-- END Basic Form Elements Block -->
</div>
    <?php echo $this->Html->script('pages/formsValidation'); ?>
    <script>$(function(){ FormsValidation.init(); });</script>
    <?php echo $this->Html->script('pages/uiProgress'); ?>
    <script>$(function(){ UiProgress.init(); });</script>
 <?php endif; ?>
<!---------------------------------------------------------------------------------------------------------------------------------------->


<!---------------------------------------------------------------------------------------------------------------------------------------->
<!---------------------------------------------------------------------------------------------------------------------------------------->
<!---------------------------------------------------------------------------------------------------------------------------------------->
<!---------------------------------------------------------------------------------------------------------------------------------------->



<?PHP if(!empty($quotation_lists)):?>

<script>
$(function() {
    $('.edit_title1').editable(path_url+'/Quotations/inv_title1', {
            id        : 'device_id',
            name      : 'title1',
            type      : 'text',
            cancel    : 'Cancel',
            submit    : 'Save',
            tooltip   : 'Click to edit'
       });
    $('.edit_title2').editable(path_url+'/Quotations/inv_title2', {
            id        : 'device_id',
            name      : 'title2',
            type      : 'text',
            cancel    : 'Cancel',
            submit    : 'Save',
            tooltip   : 'Click to edit'
       });
    $('.edit_title3').editable(path_url+'/Quotations/inv_title3', {
            id        : 'device_id',
            name      : 'title3',
            type      : 'text',
            cancel    : 'Cancel',
            submit    : 'Save',
            tooltip   : 'Click to edit'
       });
    $('.edit_title4').editable(path_url+'/Quotations/inv_title4', {
            id        : 'device_id',
            name      : 'title4',
            type      : 'text',
            cancel    : 'Cancel',
            submit    : 'Save',
            tooltip   : 'Click to edit'
       });
    $('.edit_title5').editable(path_url+'/Quotations/inv_title5', {
            id        : 'device_id',
            name      : 'title5',
            type      : 'text',
            cancel    : 'Cancel',
            submit    : 'Save',
            tooltip   : 'Click to edit'
       });
    $('.edit_title6').editable(path_url+'/Quotations/inv_title6', {
            id        : 'device_id',
            name      : 'title6',
            type      : 'text',
            cancel    : 'Cancel',
            submit    : 'Save',
            tooltip   : 'Click to edit'
       });
    $('.edit_title7').editable(path_url+'/Quotations/inv_title7', {
            id        : 'device_id',
            name      : 'title7',
            type      : 'text',
            cancel    : 'Cancel',
            submit    : 'Save',
            tooltip   : 'Click to edit'
       });
    $('.edit_title8').editable(path_url+'/Quotations/inv_title8', {
            id        : 'device_id',
            name      : 'title8',
            type      : 'text',
            cancel    : 'Cancel',
            submit    : 'Save',
            tooltip   : 'Click to edit'
       });
});
</script>
<style>
    .show{
        padding:10px; 
        border-bottom:1px #999 dashed;
        font-size:15px; 
        height:50px;
        float: top;
    }
    .show:hover{
        background:#4c66a4;
        color:#FFF;
        cursor:pointer;
    }
    #result{
        position: absolute;
        z-index: 999;
    }
 </style>

    <h1>
        <i class="gi gi-user"></i>Edit Invoice
    </h1>
    </div>
</div>
    <ul class="breadcrumb breadcrumb-top">
        <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
        <li><?php echo $this->Html->link('Invoice',array('controller'=>'Invoices','action'=>'index')); ?></li>
        <li>Approve Invoice</li>
    </ul>
                    
<div class="row">
    <div class="col-md-12">
        <div class="block">
            <div class="block-title clearfix">
                <h2 class="pull-right ">
                   Track Id : <?PHP echo $quotation_lists['Quotation']['track_id']; ?>
                </h2>
            </div>
            <div class="panel panel-default">
                <?php echo $this->Form->create('Invoice',array('class'=>'form-horizontal form-bordered','id'=>'form-invoice-approve')); ?>
                <?php echo $this->Form->input('Invoice.quotationno', array('type'=>'hidden','value'=>$quotation_lists['Quotation']['quotationno'])); ?>
                <?php echo $this->Form->input('Invoice.full_type', array('type'=>'hidden','value'=>$quotation_lists['Customer']['invoice_type_id'])); ?>
                <?php echo $this->Form->input('Invoice.track_id', array('type'=>'hidden','value'=>$quotation_lists['Quotation']['track_id'])); ?>
                
                <div class="panel-body panel-body-nopadding">
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="inv_customer">Customer Name</label>
                        <div class="col-md-4">
                            <?php echo $this->Form->input('customer_name', array('id'=>'inv_customer','class'=>'form-control','readonly'=>'readonly','label'=>false,'name'=>'inv_customer_name','value'=>$quotation_lists['Customer']['customername'])); ?>
                        </div>
                        <label class="col-md-2 control-label" for="inv_dueamount">Due Amount</label>
                        <div class="col-md-4">
                            <?php echo $this->Form->input('due_amount', 
                                    array('id'=>'inv_dueamount','class'=>'form-control','label'=>false,'type'=>'text','readonly'=>'readonly','value'=>$quotation_lists['Quotation']['due_amount'])); ?>
                        </div>
                    </div>
                    <div class="form-group">
                    <!--      <label class="col-md-2 control-label" for="del_address_id">Delivery Addresses List</label>
                        <div class="col-md-4">
                            <?php //echo $this->Form->input('Deliveryorder.delivery_address', array('id'=>'del_address_id','class'=>'form-control',
                                //'label'=>false,'type'=>'select','options'=>array($deliveryorder['Deliveryorder']['delivery_address']=>$deliveryorder['Deliveryorder']['delivery_address']),'selected'=>'selected')); ?>
                        </div>

                        <label class="col-md-2 control-label" for="del_customer_address">Customer Address</label>
                        <div class="col-md-4">
                            <?php //echo $this->Form->textarea('Deliveryorder.customer_address', array('id'=>'del_customer_address','class'=>'form-control',
                                                                   //'label'=>false,'rows'=>6,'cols'=>30)); ?>
                        </div>-->
                    <!--    <label class="col-md-2 control-label" for="val_addr">Select Address</label>
                        <div class="col-md-4">
                            <?php //echo $this->Form->input('delivery_address', array('id'=>'val_addr','class'=>'form-control select-chosen','label'=>false,'name'=>'addr','type'=>'select','options'=>array('billing'=>'Billing'),'readonly'=>'readonly')); ?>
                        </div>-->
                        <label class="col-md-2 control-label" for="val_address">Billing Address</label>
                        <div class="col-md-4">
                            <?php echo $this->Form->textarea('regaddress', array('class'=>'form-control',
                                                                   'placeholder'=>'Enter the Delivery Address','label'=>false,'rows'=>4,'cols'=>30,'readonly'=>'readonly','value'=>$quotation_lists['Quotation']['address'])); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="inv_contactpersonname">ATTN</label>
                        <div class="col-md-4">
                            <?php echo $this->Form->input('contactpersonname', array('id'=>'inv_contactpersonname',
                                'class'=>'form-control','label'=>false,'readonly'=>'readonly','value'=>$contactperson['name'])); ?>
                        </div>
                        <label class="col-md-2 control-label" for="inv_email">Email</label>
                        <div class="col-md-4">
                            <?php echo $this->Form->input('email', array('id'=>'inv_email','class'=>'form-control',
                                                                    'label'=>false,'readonly'=>'readonly','value'=>$quotation_lists['Quotation']['email'])); ?>
                        </div>

                    </div>
                    <div class="form-group">

                        <label class="col-md-2 control-label" for="inv_phone">Phone</label>
                        <div class="col-md-4">
                            <?php echo $this->Form->input('phone', array('id'=>'inv_phone','class'=>'form-control',
                                                                    'label'=>false,'readonly'=>'readonly','value'=>$quotation_lists['Quotation']['phone'])); ?>

                        </div>
                        <label class="col-md-2 control-label" for="inv_fax">Fax</label>
                        <div class="col-md-4">
                            <?php echo $this->Form->input('fax', array('id'=>'inv_fax','class'=>'form-control','label'=>false,'readonly'=>'readonly','value'=>$quotation_lists['Quotation']['fax'])); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="inv_del_order_no">Delivery Order No</label>
                        <div class="col-md-4">
                            <?php echo $this->Form->input('delivery_order_no', array('id'=>'inv_del_order_no','class'=>'form-control','label'=>false,'value'=>$deliveryorderno,'readonly'=>'readonly')); ?>
                        </div>
                        <label class="col-md-2 control-label" for="inv_date">Invoice Date</label>
                        <div class="col-md-4">
                            <?php echo $this->Form->input('invoice_date', array('id'=>'inv_date','Type'=>'text','class'=>'form-control input-datepicker-close','data-date-format'=>'dd-MM-yy','label'=>false)); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="inv_ref_no">PO Reference No</label>
                        <div class="col-md-4">
                            <?php echo $this->Form->input('po_reference_no', array('id'=>'inv_ref_no','class'=>'form-control','label'=>false,'readonly'=>'readonly','value'=>$quotation_lists['Quotation']['ref_no'])); ?>
                        </div>
                        <label class="col-md-2 control-label" for="total">Total</label>
                        <div class="col-md-4">
                            <?php echo $this->Form->input('total', array('id'=>'total','class'=>'form-control','label'=>false,'readonly'=>'readonly','value'=>$total)); ?>
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="inv_remarks">Remarks</label>
                        <div class="col-md-4">
                            <?php echo $this->Form->textarea('remarks', array('id'=>'inv_remarks','class'=>'form-control',
                                                                   'label'=>false,'rows'=>6,'cols'=>30,'value'=>$quotation_lists['Customerspecialneed']['remarks'],'readonly'=>'readonly')); ?>
                        </div>
                        <label class="col-md-2 control-label" for="inv_service_type">Service Type</label>
                        <div class="col-md-4">
                            <?php echo $this->Form->input('service_type', array('id'=>'inv_service_type','class'=>'form-control','value'=>$servicetype,'label'=>false,'readonly'=>'readonly')); ?>
                            <div id="result">
                            </div>
                        </div>
                    </div>  
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="val_instrument_type">Select Instrument For</label>
                        <div class="col-md-12">
                            <?php echo $this->Form->input('val_instrument_type', array('class'=>'form-control','type'=>'text',
                                                                    'label'=>false,'value'=>$quotation_lists['InstrumentType']['invoice'],'readonly'=>'readonly')); ?>
                        </div>
                    </div>
                     <?PHP 
        //pr($deliveryorder['DelDescription']);exit;
        $device1 = 0;
        $device2 = 0;
        $device3 = 0;
        $device4 = 0;
        $device5 = 0;
        $device6 = 0;
        $device7 = 0;
        $device8 = 0;
            if(!empty($desc)):
                 foreach($desc as $devic):
                foreach($devic as $device):
                    if($device['title1_val']!=''): $device1 +=1; endif;
                    if($device['title2_val']!=''): $device2 +=1; endif;
                    if($device['title3_val']!=''): $device3 +=1; endif;
                    if($device['title4_val']!=''): $device4 +=1; endif;
                    if($device['title5_val']!=''): $device5 +=1; endif;
                    if($device['title6_val']!=''): $device6 +=1; endif;
                    if($device['title7_val']!=''): $device7 +=1; endif;
                    if($device['title8_val']!=''): $device8 +=1; endif;
                endforeach;
                endforeach;
            endif;
        ?>
                    <div class="col-sm-3 col-lg-12">
                        <div class="table-responsive">
                            <table id="beforedo-datatable" class="table table-vcenter table-condensed table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">S.No</th>
                                        <th class="text-center">Instrument</th>
                                        <th class="text-center">Brand</th>
                                        <th class="text-center">Model No</th>
                                        <th class="text-center">Range</th>
                                        <th class="text-center">Call Location</th>
                                        <th class="text-center">Call Type</th>
                                        <th class="text-center">Unit Price</th>
                                        <th class="text-center">Department</th>
                                        <th class="text-center">Total</th>
                                        <?php if($device1 != 0): ?> 
            <th class="text-center edit_title1"><?php echo $titles[0]; ?></th>
            <?php endif; ?>
             <?php if($device2 != 0): ?> 
            <th class="text-center edit_title2"><?php echo $titles[1]; ?></th>
            <?php endif; ?>
             <?php if($device3 != 0): ?> 
            <th class="text-center edit_title3"><?php echo $titles[2]; ?></th>
            <?php endif; ?>
             <?php if($device4 != 0): ?> 
            <th class="text-center edit_title4"><?php echo $titles[3]; ?></th>
            <?php endif; ?>
             <?php if($device5 != 0): ?> 
            <th class="text-center edit_title5"><?php echo $titles[4]; ?></th>
            <?php endif; ?>
             <?php if($device6 != 0): ?> 
            <th class="text-center edit_title6"><?php echo $titles[5]; ?></th>
            <?php endif; ?>
             <?php if($device7 != 0): ?> 
            <th class="text-center edit_title7"><?php echo $titles[6]; ?></th>
            <?php endif; ?>
             <?php if($device8 != 0): ?> 
            <th class="text-center edit_title8"><?php echo $titles[7]; ?></th>
            <?php endif; ?>
                                    </tr>
                                </thead>
                                <tbody class="sales_Instrument_info"> 
                                   
                                    <?PHP 
                                    //pr($deliveryorder['DelDescription']);exit;
                                    if(!empty($desc)):
                                        $total_device = 0;
                                        foreach($desc as $devic):
                                        foreach($devic as $device):
                                            if($device['title1_val']!=''): $device1 +=1; endif;
                                            if($device['title2_val']!=''): $device2 +=1; endif;
                                            if($device['title3_val']!=''): $device3 +=1; endif;
                                            if($device['title4_val']!=''): $device4 +=1; endif;
                                            if($device['title5_val']!=''): $device5 +=1; endif;
                                            if($device['title6_val']!=''): $device6 +=1; endif;
                                            if($device['title7_val']!=''): $device7 +=1; endif;
                                            if($device['title8_val']!=''): $device8 +=1; endif;
                                        //pr($device);exit;
                                        $total_device = $total_device + $device['total'];
                                    ?>
                                        <tr class="sales_instrument_remove_<?PHP echo $device['id']; ?>">
                                            <td class="text-center"><?PHP echo $device['order_by']; ?></td>
                                            <td class="text-center"><?PHP echo $device['Instrument']['name']; ?></td>
                                            <td class="text-center"><?PHP echo $device['Brand']['brandname']; ?></td>
                                            <td class="text-center"><?PHP echo $device['model_no']; ?></td>
                                            <td class="text-center"><?PHP echo $device['Range']['range_name']; ?></td>
                                            <td class="text-center"><?PHP echo $device['call_location']; ?></td>
                                            <td class="text-center"><?PHP echo $device['call_type']; ?></td>
                                            <td class="text-center"><?PHP echo $device['unit_price']; ?></td>
                                            <td class="text-center"><?PHP echo $device['Department']['departmentname']; ?></td>
                                            <td class="text-center"><?PHP echo $device['total']; ?></td>
                                            <?php if($device1 != 0): ?> 
                                            <td class="text-center edit_title1" id="<?PHP echo $device['id']; ?>"><?PHP echo $device['title1_val']; ?></td>
                                            <?php endif; ?>
                                            <?php if($device2 != 0): ?> 
                                            <td class="text-center edit_title2" id="<?PHP echo $device['id']; ?>"><?PHP echo $device['title2_val']; ?></td>
                                            <?php endif; ?>
                                            <?php if($device3 != 0): ?> 
                                            <td class="text-center edit_title3" id="<?PHP echo $device['id']; ?>"><?PHP echo $device['title3_val']; ?></td>
                                            <?php endif; ?>
                                            <?php if($device4 != 0): ?> 
                                            <td class="text-center edit_title4" id="<?PHP echo $device['id']; ?>"><?PHP echo $device['title4_val']; ?></td>
                                            <?php endif; ?>
                                            <?php if($device5 != 0): ?> 
                                            <td class="text-center edit_title5" id="<?PHP echo $device['id']; ?>"><?PHP echo $device['title5_val']; ?></td>
                                            <?php endif; ?>
                                            <?php if($device6 != 0): ?> 
                                            <td class="text-center edit_title6" id="<?PHP echo $device['id']; ?>"><?PHP echo $device['title6_val']; ?></td>
                                            <?php endif; ?>
                                            <?php if($device7 != 0): ?> 
                                            <td class="text-center edit_title7" id="<?PHP echo $device['id']; ?>"><?PHP echo $device['title7_val']; ?></td>
                                            <?php endif; ?>
                                            <?php if($device8 != 0): ?> 
                                            <td class="text-center edit_title8" id="<?PHP echo $device['id']; ?>"><?PHP echo $device['title8_val']; ?></td>
                                            <?php endif; ?>
                                        </tr>
                                    <?PHP 
                                        endforeach; 
                                        endforeach; 
                                    ?>
                                    <?php 
                                    else:
                                        echo "<tr><td class='text-center'>No Records Found</td></tr>";
                                    endif;
                                    $gst_total = ($total_device * $gst)/100;
                                    ?>
                                        <tr>
               <td colspan="9" style="border-top:1px solid #000;padding:3px 10px;font-size:11px !important;">SUB TOTAL $(SGD)</td>
               <td style="border-top:1px solid #000;padding:3px 10px;font-size:11px !important;"><?php echo $total_device; ?></td>
          </tr>
          <tr>
               <td colspan="9" style="border-bottom:1px solid #000;padding:3px 10px;font-size:11px !important;color: #000 !important;">GST ( <?php echo $gst; ?>%  )</td>
               <td style="border-bottom:1px solid #000;padding:3px 10px;font-size:11px !important;color: #000 !important;"><?php echo $gst_total; ?></td>
          </tr>
		   <tr>
               <td colspan="9" style="padding:3px 10px;font-size:11px !important;color: #000 !important;">GRAND TOTAL $(SGD)</td>
               <td style="padding:3px 10px;font-size:11px !important;color: #000 !important;"><?php echo $total_device + $gst_total; ?></td>
          </tr>
          
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <div class="form-group form-actions">
                        <div class="col-md-9 col-md-offset-10">
                        <?php //if($invoices['Salesorder']['is_approved']==1 && $invoices['Salesorder']['is_poapproved']==1 ): ?>
                        <?php  echo $this->Form->button('<i class="fa fa-angle-right"></i> Save',array('type'=>'button','class'=>'btn btn-sm btn-primary approve_invoice','escape' => false)); ?>
                            <?php //endif; ?>

                        </div>
                    </div>

<!-- panel -->
                    
                </div>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
                    <!-- END Basic Form Elements Content -->
    </div>
                    <!-- END Basic Form Elements Block -->
</div>
    <?php echo $this->Html->script('pages/formsValidation'); ?>
    <script>$(function(){ FormsValidation.init(); });</script>
    <?php echo $this->Html->script('pages/uiProgress'); ?>
    <script>$(function(){ UiProgress.init(); });</script>
 <?php endif; ?>
<!---------------------------------------------------------------------------------------------------------------------------------------->
