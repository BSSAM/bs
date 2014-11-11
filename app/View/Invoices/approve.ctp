<script>$(function(){
    $('#inv_date').datepicker("setDate", new Date());
});</script>

<!--
-------------------------- Sales Order Full Invoice -------------------------------
-->

<?php if($type == 'sales'){ ?>
<script>
    var path_url='<?PHP echo Router::url('/',true); ?>';
</script>
<style>
    .show
	{
		padding:10px; 
		border-bottom:1px #999 dashed;
		font-size:15px; 
		height:50px;
                float: top;
	}
	.show:hover
	{
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
                        <li>Edit Invoice</li>
                    </ul>
                    <!-- END Forms General Header -->
<div class="row">
                        <div class="col-md-12">
                            <!-- Basic Form Elements Block -->
                            <div class="block">
                                <!-- Basic Form Elements Title -->
                                <div class="block-title clearfix">
                                    
                                    <h2 class="pull-right ">
                                       Track Id : <?PHP echo $invoices['Salesorder']['track_id']; ?>
                                    </h2>
                                </div>
                                <!-- END Form Elements Title -->

                                <!-- Basic Form Elements Content -->
                                 
                                <div class="panel panel-default">
                                    <?php echo $this->Form->create('Invoice',array('class'=>'form-horizontal form-bordered','id'=>'form-invoice-add')); ?>
                                    <?php //echo $this->Form->input('Deliveryorder.customer_id', array('type'=>'hidden','value'=>$deliveryorder['Deliveryorder']['customer_id'])); ?>
                                    <?php //echo $this->Form->input('Deliveryorder.salesorder_id', array('type'=>'hidden','value'=>$deliveryorder['Deliveryorder']['salesorder_id'])); ?>
                                    <div class="panel-body panel-body-nopadding">
                                        
                                        <!-- BASIC WIZARD -->
                                       <div class="form-group">
    <label class="col-md-2 control-label" for="inv_customer">Customer Name</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('customer_name', array('id'=>'inv_customer','class'=>'form-control','readonly'=>'readonly','label'=>false,'name'=>'inv_customer_name','value'=>$invoices['Customer']['customername'])); ?>
    </div>
    <label class="col-md-2 control-label" for="inv_dueamount">Due Amount</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('due_amount', 
                array('id'=>'inv_dueamount','class'=>'form-control','label'=>false,'type'=>'text','readonly'=>'readonly','value'=>$invoices['Salesorder']['due_amount'])); ?>
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
                                               'placeholder'=>'Enter the Delivery Address','label'=>false,'rows'=>4,'cols'=>30,'readonly'=>'readonly','value'=>$invoices['Salesorder']['address'])); ?>
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
        <?php echo $this->Form->input('fax', array('id'=>'inv_fax','class'=>'form-control','label'=>false,'readonly'=>'readonly','value'=>$invoices['Salesorder']['fax'])); ?>
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
        <?php echo $this->Form->input('po_reference_no', array('id'=>'inv_ref_no','class'=>'form-control','label'=>false,'readonly'=>'readonly','value'=>$invoices['Salesorder']['ref_no'])); ?>
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
                                               'label'=>false,'rows'=>6,'cols'=>30,'value'=>$invoices['Salesorder']['remarks'],'readonly'=>'readonly')); ?>
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
                                                'label'=>false,'value'=>$invoices['Quotation']['InstrumentType']['invoice'],'readonly'=>'readonly')); ?>
    </div>
</div>
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
            <th class="text-center">Validity</th>
            <th class="text-center">Unit Price</th>
            <th class="text-center">Department</th>
            <th class="text-center">Total</th>
           
        </tr>
    </thead>
    <tbody class="sales_Instrument_info"> 
    <?PHP 
        //pr($deliveryorder['DelDescription']);exit;
            if(!empty($desc)):
                foreach($desc as $device):
                //pr($device);exit;
                ?>
                <tr class="sales_instrument_remove_<?PHP echo $device['id']; ?>">
                    <td class="text-center"><?PHP echo $device['id']; ?></td>
                    <td class="text-center"><?PHP echo $device['Instrument']['name']; ?></td>
                    <td class="text-center"><?PHP echo $device['Brand']['brandname']; ?></td>
                    <td class="text-center"><?PHP echo $device['model_no']; ?></td>
                    <td class="text-center"><?PHP echo $device['Range']['range_name']; ?></td>
                    <td class="text-center"><?PHP echo $device['sales_calllocation']; ?></td>
                    <td class="text-center"><?PHP echo $device['sales_calltype']; ?></td>
                    <td class="text-center"><?PHP echo $device['sales_unitprice']; ?></td>
                    <td class="text-center"><?PHP echo $device['Department']['departmentname']; ?></td>
                    <td class="text-center"><?PHP echo $device['sales_total']; ?></td>
                </tr>
        <?PHP      endforeach;
                   else:
                       echo "<tr><td class='text-center'>No Records Found</td></tr>";
                   endif;
        ?>
    </tbody>
</table>
</div>
</div>
    
    <div class="form-group form-actions">
        <div class="col-md-9 col-md-offset-10">
        <?php //if($invoices['Salesorder']['is_approved']==1 && $invoices['Salesorder']['is_poapproved']==1 ): ?>
        <?php  echo $this->Form->button('<i class="fa fa-angle-right"></i> Approve',array('type'=>'button','class'=>'btn btn-sm btn-primary approve_invoice','escape' => false)); ?>
            <?php //endif; ?>
       
        </div>
    </div>

<!-- panel -->
<?php echo $this->Form->end(); ?>
     </div>
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
<?php } ?>                            
                                
<!--
-------------------------------- Purchase Order Full Invoice ----------------------------------
-->

<?php if($type == 'po'){ ?>
<script>
    var path_url='<?PHP echo Router::url('/',true); ?>';
</script>
<style>
    .show
	{
		padding:10px; 
		border-bottom:1px #999 dashed;
		font-size:15px; 
		height:50px;
                float: top;
	}
	.show:hover
	{
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
                        <li>Edit Invoice</li>
                    </ul>
                    <!-- END Forms General Header -->
<div class="row">
                        <div class="col-md-12">
                            <!-- Basic Form Elements Block -->
                            <div class="block">
                                <!-- Basic Form Elements Title -->
                                <div class="block-title clearfix">
                                    
                                    <h2 class="pull-right ">
                                       Track Id : <?PHP echo $invoices['Salesorder']['track_id']; ?>
                                    </h2>
                                </div>
                                <!-- END Form Elements Title -->

                                <!-- Basic Form Elements Content -->
                                 
                                <div class="panel panel-default">
                                    <?php echo $this->Form->create('Invoice',array('class'=>'form-horizontal form-bordered','id'=>'form-invoice-add')); ?>
                                    <?php //echo $this->Form->input('Deliveryorder.customer_id', array('type'=>'hidden','value'=>$deliveryorder['Deliveryorder']['customer_id'])); ?>
                                    <?php //echo $this->Form->input('Deliveryorder.salesorder_id', array('type'=>'hidden','value'=>$deliveryorder['Deliveryorder']['salesorder_id'])); ?>
                                    <div class="panel-body panel-body-nopadding">
                                        
                                        <!-- BASIC WIZARD -->
                                       <div class="form-group">
    <label class="col-md-2 control-label" for="inv_customer">Customer Name</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('customer_name', array('id'=>'inv_customer','class'=>'form-control','readonly'=>'readonly','label'=>false,'name'=>'inv_customer_name','value'=>$invoices['Customer']['customername'])); ?>
    </div>
    <label class="col-md-2 control-label" for="inv_dueamount">Due Amount</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('due_amount', 
                array('id'=>'inv_dueamount','class'=>'form-control','label'=>false,'type'=>'text','readonly'=>'readonly','value'=>$invoices['Salesorder']['due_amount'])); ?>
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
                                               'placeholder'=>'Enter the Delivery Address','label'=>false,'rows'=>4,'cols'=>30,'readonly'=>'readonly','value'=>$invoices['Salesorder']['address'])); ?>
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
        <?php echo $this->Form->input('fax', array('id'=>'inv_fax','class'=>'form-control','label'=>false,'readonly'=>'readonly','value'=>$invoices['Salesorder']['fax'])); ?>
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
        <?php echo $this->Form->input('po_reference_no', array('id'=>'inv_ref_no','class'=>'form-control','label'=>false,'readonly'=>'readonly','value'=>$invoices['Salesorder']['ref_no'])); ?>
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
                                               'label'=>false,'rows'=>6,'cols'=>30,'value'=>$invoices['Salesorder']['remarks'],'readonly'=>'readonly')); ?>
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
                                                'label'=>false,'value'=>$invoices['Quotation']['InstrumentType']['invoice'],'readonly'=>'readonly')); ?>
    </div>
</div>
<div class="col-sm-3 col-lg-12">
<div class="table-responsive">
<table id="beforedo-datatable" class="table table-vcenter table-condensed table-bordered">
    <thead>
       
        <tr>
            <th class="text-center">S.No</th>
            <th class="text-center">Instrument</th>
            <th class="text-center">Brand</th>
            <th class="text-center">Call Location</th>
            <th class="text-center">Validity</th>
            <th class="text-center">Unit Price</th>
            <th class="text-center">Department</th>
            <th class="text-center">Total</th>
           
        </tr>
    </thead>
    <tbody class="sales_Instrument_info"> 
    <?PHP 
        //pr($deliveryorder['DelDescription']);exit;
            if(!empty($desc)):
                foreach($desc as $device):
                ?>
                <tr class="sales_instrument_remove_<?PHP echo $device['id']; ?>">
                    <td class="text-center"><?PHP echo $device['id']; ?></td>
                    <td class="text-center"><?PHP echo $device['Instrument']['name']; ?></td>
                    <td class="text-center"><?PHP echo $device['Brand']['brandname']; ?></td>
                    <td class="text-center"><?PHP echo $device['sales_calllocation']; ?></td>
                    <td class="text-center"><?PHP echo $device['sales_calltype']; ?></td>
                    <td class="text-center"><?PHP echo $device['sales_unitprice']; ?></td>
                    <td class="text-center"><?PHP echo $device['Department']['departmentname']; ?></td>
                    <td class="text-center"><?PHP echo $device['sales_total']; ?></td>
                </tr>
        <?PHP      endforeach;
                   else:
                       echo "<tr><td class='text-center'>No Records Found</td></tr>";
                   endif;
        ?>
    </tbody>
</table>
</div>
</div>
    
    <div class="form-group form-actions">
        <div class="col-md-9 col-md-offset-10">
         <?php //if($invoices['Salesorder']['is_approved']==1 && $invoices['Salesorder']['is_poapproved']==1 ): ?>
        <?php  echo $this->Form->button('<i class="fa fa-angle-right"></i> Approve',array('type'=>'button','class'=>'btn btn-sm btn-primary approve_invoice','escape' => false)); ?>
            <?php //endif; ?>
        </div>
    </div>

<!-- panel -->
<?php echo $this->Form->end(); ?>
     </div>
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
<?php } ?>   

                            
<!--
-------------------------------- Quotation Full Invoice ----------------------------------
-->                            
                        

<?php if($type == 'quo'){ ?>
<script>
    var path_url='<?PHP echo Router::url('/',true); ?>';
</script>
<style>
    .show
	{
		padding:10px; 
		border-bottom:1px #999 dashed;
		font-size:15px; 
		height:50px;
                float: top;
	}
	.show:hover
	{
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
                        <li>Edit Invoice</li>
                    </ul>
                    <!-- END Forms General Header -->
<div class="row">
                        <div class="col-md-12">
                            <!-- Basic Form Elements Block -->
                            <div class="block">
                                <!-- Basic Form Elements Title -->
                                <div class="block-title clearfix">
                                    
                                    <h2 class="pull-right ">
                                       Track Id : <?PHP echo $invoices['Quotation']['track_id']; ?>
                                    </h2>
                                </div>
                                <!-- END Form Elements Title -->

                                <!-- Basic Form Elements Content -->
                                 
                                <div class="panel panel-default">
                                    <?php echo $this->Form->create('Invoice',array('class'=>'form-horizontal form-bordered','id'=>'form-invoice-add')); ?>
                                    <?php //echo $this->Form->input('Deliveryorder.customer_id', array('type'=>'hidden','value'=>$deliveryorder['Deliveryorder']['customer_id'])); ?>
                                    <?php //echo $this->Form->input('Deliveryorder.salesorder_id', array('type'=>'hidden','value'=>$deliveryorder['Deliveryorder']['salesorder_id'])); ?>
                                    <div class="panel-body panel-body-nopadding">
                                        
                                        <!-- BASIC WIZARD -->
                                       <div class="form-group">
    <label class="col-md-2 control-label" for="inv_customer">Customer Name</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('customer_name', array('id'=>'inv_customer','class'=>'form-control','readonly'=>'readonly','label'=>false,'name'=>'inv_customer_name','value'=>$invoices['Customer']['customername'])); ?>
    </div>
    <label class="col-md-2 control-label" for="inv_dueamount">Due Amount</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('due_amount', 
                array('id'=>'inv_dueamount','class'=>'form-control','label'=>false,'type'=>'text','readonly'=>'readonly','value'=>$invoices['Quotation']['due_amount'])); ?>
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
                                               'placeholder'=>'Enter the Delivery Address','label'=>false,'rows'=>4,'cols'=>30,'readonly'=>'readonly','value'=>$invoices['Quotation']['address'])); ?>
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
        <?php echo $this->Form->input('fax', array('id'=>'inv_fax','class'=>'form-control','label'=>false,'readonly'=>'readonly','value'=>$invoices['Quotation']['fax'])); ?>
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
        <?php echo $this->Form->input('po_reference_no', array('id'=>'inv_ref_no','class'=>'form-control','label'=>false,'readonly'=>'readonly','value'=>$invoices['Quotation']['ref_no'])); ?>
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
                                               'label'=>false,'rows'=>6,'cols'=>30,'value'=>$invoices['Quotation']['remarks'],'readonly'=>'readonly')); ?>
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
                                                'label'=>false,'value'=>$invoices['Quotation']['InstrumentType']['invoice'],'readonly'=>'readonly')); ?>
    </div>
</div>
<div class="col-sm-3 col-lg-12">
<div class="table-responsive">
<table id="beforedo-datatable" class="table table-vcenter table-condensed table-bordered">
    <thead>
       
        <tr>
            <th class="text-center">S.No</th>
            <th class="text-center">Instrument</th>
            <th class="text-center">Brand</th>
            <th class="text-center">Call Location</th>
            <th class="text-center">Validity</th>
            <th class="text-center">Unit Price</th>
            <th class="text-center">Department</th>
            <th class="text-center">Total</th>
           
        </tr>
    </thead>
    <tbody class="sales_Instrument_info"> 
    <?PHP 
        //pr($deliveryorder['DelDescription']);exit;
            if(!empty($desc)):
                foreach($desc as $device):
                ?>
                <tr class="sales_instrument_remove_<?PHP echo $device['id']; ?>">
                    <td class="text-center"><?PHP echo $device['id']; ?></td>
                    <td class="text-center"><?PHP echo $device['Instrument']['name']; ?></td>
                    <td class="text-center"><?PHP echo $device['Brand']['brandname']; ?></td>
                    <td class="text-center"><?PHP echo $device['sales_calllocation']; ?></td>
                    <td class="text-center"><?PHP echo $device['sales_calltype']; ?></td>
                    <td class="text-center"><?PHP echo $device['sales_unitprice']; ?></td>
                    <td class="text-center"><?PHP echo $device['Department']['departmentname']; ?></td>
                    <td class="text-center"><?PHP echo $device['sales_total']; ?></td>
                </tr>
        <?PHP      endforeach;
                   else:
                       echo "<tr><td class='text-center'>No Records Found</td></tr>";
                   endif;
        ?>
    </tbody>
</table>
</div>
</div>
    
    <div class="form-group form-actions">
        <div class="col-md-9 col-md-offset-10">
        <?php if($user_role['app_invoice']['view'] == 1 && $invoices['Salesorder']['is_approved']==0 && $invoices['Salesorder']['is_poapproved']!=1 && $invoices['Salesorder']['acknowledgement_type_id']==2): ?>
        <?php  echo $this->Form->button('<i class="fa fa-angle-right"></i> Approve',array('type'=>'button','class'=>'btn btn-sm btn-primary approve_invoice','escape' => false)); ?>
            <?php endif; ?>
        <?php if($user_role['app_invoice']['view'] == 1 && $invoices['Salesorder']['is_approved']==0 && $invoices['Salesorder']['is_poapproved']==0 && $invoices['Salesorder']['acknowledgement_type_id']==2): ?>
        <?php  echo "PO Approval Needed"; ?>
        <?php //echo $this->Html->link('<i class="fa fa-angle-left"></i> Cancel',array('controller'=>'Deliveryorders','action'=>'index'), array('class'=>'btn btn-sm btn-warning','escape' => false)); ?>
        <?php endif; ?>
        </div>
    </div>

<!-- panel -->
<?php echo $this->Form->end(); ?>
     </div>
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
<?php } ?>   
                            
                            
<!--
-------------------------------- Delivery Order Full Invoice ----------------------------------
-->                            

                      

<?php if($type == 'do'){ ?>
<script>
    var path_url='<?PHP echo Router::url('/',true); ?>';
</script>
<style>
    .show
	{
		padding:10px; 
		border-bottom:1px #999 dashed;
		font-size:15px; 
		height:50px;
                float: top;
	}
	.show:hover
	{
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
                        <li>Edit Invoice</li>
                    </ul>
                    <!-- END Forms General Header -->
<div class="row">
                        <div class="col-md-12">
                            <!-- Basic Form Elements Block -->
                            <div class="block">
                                <!-- Basic Form Elements Title -->
                                <div class="block-title clearfix">
                                    
                                    <h2 class="pull-right ">
                                       Track Id : <?PHP echo $invoices['Salesorder']['track_id']; ?>
                                    </h2>
                                </div>
                                <!-- END Form Elements Title -->

                                <!-- Basic Form Elements Content -->
                                 
                                <div class="panel panel-default">
                                    <?php echo $this->Form->create('Invoice',array('class'=>'form-horizontal form-bordered','id'=>'form-invoice-add')); ?>
                                    <?php //echo $this->Form->input('Deliveryorder.customer_id', array('type'=>'hidden','value'=>$deliveryorder['Deliveryorder']['customer_id'])); ?>
                                    <?php //echo $this->Form->input('Deliveryorder.salesorder_id', array('type'=>'hidden','value'=>$deliveryorder['Deliveryorder']['salesorder_id'])); ?>
                                    <div class="panel-body panel-body-nopadding">
                                        
                                        <!-- BASIC WIZARD -->
                                       <div class="form-group">
    <label class="col-md-2 control-label" for="inv_customer">Customer Name</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('customer_name', array('id'=>'inv_customer','class'=>'form-control','readonly'=>'readonly','label'=>false,'name'=>'inv_customer_name','value'=>$invoices['Customer']['customername'])); ?>
    </div>
    <label class="col-md-2 control-label" for="inv_dueamount">Due Amount</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('due_amount', 
                array('id'=>'inv_dueamount','class'=>'form-control','label'=>false,'type'=>'text','readonly'=>'readonly','value'=>$invoices['Salesorder']['due_amount'])); ?>
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
                                               'placeholder'=>'Enter the Delivery Address','label'=>false,'rows'=>4,'cols'=>30,'readonly'=>'readonly','value'=>$invoices['Salesorder']['address'])); ?>
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
        <?php echo $this->Form->input('fax', array('id'=>'inv_fax','class'=>'form-control','label'=>false,'readonly'=>'readonly','value'=>$invoices['Salesorder']['fax'])); ?>
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
        <?php echo $this->Form->input('po_reference_no', array('id'=>'inv_ref_no','class'=>'form-control','label'=>false,'readonly'=>'readonly','value'=>$invoices['Salesorder']['ref_no'])); ?>
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
                                               'label'=>false,'rows'=>6,'cols'=>30,'value'=>$invoices['Salesorder']['remarks'],'readonly'=>'readonly')); ?>
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
                                                'label'=>false,'value'=>$invoices['Quotation']['InstrumentType']['invoice'],'readonly'=>'readonly')); ?>
    </div>
</div>
<div class="col-sm-3 col-lg-12">
<div class="table-responsive">
<table id="beforedo-datatable" class="table table-vcenter table-condensed table-bordered">
    <thead>
       
        <tr>
            <th class="text-center">S.No</th>
            <th class="text-center">Instrument</th>
            <th class="text-center">Brand</th>
            <th class="text-center">Call Location</th>
            <th class="text-center">Validity</th>
            <th class="text-center">Unit Price</th>
            <th class="text-center">Department</th>
            <th class="text-center">Total</th>
           
        </tr>
    </thead>
    <tbody class="sales_Instrument_info"> 
    <?PHP 
        //pr($deliveryorder['DelDescription']);exit;
            if(!empty($desc)):
                foreach($desc as $device):
                ?>
                <tr class="sales_instrument_remove_<?PHP echo $device['id']; ?>">
                    <td class="text-center"><?PHP echo $device['id']; ?></td>
                    <td class="text-center"><?PHP echo $device['Instrument']['name']; ?></td>
                    <td class="text-center"><?PHP echo $device['Brand']['brandname']; ?></td>
                    <td class="text-center"><?PHP echo $device['sales_calllocation']; ?></td>
                    <td class="text-center"><?PHP echo $device['sales_calltype']; ?></td>
                    <td class="text-center"><?PHP echo $device['sales_unitprice']; ?></td>
                    <td class="text-center"><?PHP echo $device['Department']['departmentname']; ?></td>
                    <td class="text-center"><?PHP echo $device['sales_total']; ?></td>
                </tr>
        <?PHP      endforeach;
                   else:
                       echo "<tr><td class='text-center'>No Records Found</td></tr>";
                   endif;
        ?>
    </tbody>
</table>
</div>
</div>
    
    <div class="form-group form-actions">
        <div class="col-md-9 col-md-offset-10">
        <?php if($user_role['app_invoice']['view'] == 1 && $invoices['Salesorder']['is_approved']==0 && $invoices['Salesorder']['is_poapproved']!=1 && $invoices['Salesorder']['acknowledgement_type_id']==2): ?>
        <?php  echo $this->Form->button('<i class="fa fa-angle-right"></i> Approve',array('type'=>'button','class'=>'btn btn-sm btn-primary approve_invoice','escape' => false)); ?>
            <?php endif; ?>
        <?php if($user_role['app_invoice']['view'] == 1 && $invoices['Salesorder']['is_approved']==0 && $invoices['Salesorder']['is_poapproved']==0 && $invoices['Salesorder']['acknowledgement_type_id']==2): ?>
        <?php  echo "PO Approval Needed"; ?>
        <?php //echo $this->Html->link('<i class="fa fa-angle-left"></i> Cancel',array('controller'=>'Deliveryorders','action'=>'index'), array('class'=>'btn btn-sm btn-warning','escape' => false)); ?>
        <?php endif; ?>
        </div>
    </div>

<!-- panel -->
<?php echo $this->Form->end(); ?>
     </div>
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
<?php } ?>   
                      