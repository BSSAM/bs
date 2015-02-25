<div class="form-group">
    <label class="col-md-2 control-label" for="val_quotationno">Sales Order No</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('Salesorder.salesorderno', array('id'=>'val_salesorderno','class'=>'form-control','readonly'=>'readonly','label'=>false,'value'=> $salesorderno)); ?>
    </div>
    <label class="col-md-2 control-label" for="val_dueamount">Due Amount</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('Salesorder.due_amount', array('id' => 'val_dueamount', 'class' => 'form-control',
            'placeholder' => 'Due Amount', 'label' => false, 'disabled' => 'disabled'));
        ?>
    </div>
</div>
    
<div class="form-group">
    <label class="col-md-2 control-label" for="val_customer">Customer Name</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('Salesorder.customername', array('id'=>'val_customer','class'=>'form-control','placeholder'=>'Enter the Customer Name','label'=>false,
                    'autoComplete'=>'off','type'=>'text','name'=>'sales_customername')); ?>
        <div id="result"></div>
    </div>
    <label class="col-md-2 control-label" for="val_address">Customer Address</label>
    <div class="col-md-4">
        <?php echo $this->Form->textarea('Salesorder.address', array('id'=>'val_address','class'=>'form-control',
                                               'placeholder'=>'Enter the Customer Address','label'=>false,'rows'=>6,'cols'=>30)); ?>
    </div>
</div>
<div class="form-group">
    <label class="col-md-2 control-label" for="val_attn">ATTN</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('Salesorder.attn', array('id'=>'val_attn','class'=>'form-control','label'=>false,'type'=>'select')); ?>
    </div>
     <label class="col-md-2 control-label" for="val_phone">Phone</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('Salesorder.phone', array('id'=>'val_phone','class'=>'form-control',
                                                'placeholder'=>'Enter the Phone Number','label'=>false)); ?>
    </div>
</div>
<div class="form-group">
    <label class="col-md-2 control-label" for="val_fax">Fax</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('Salesorder.fax', array('id'=>'val_fax','class'=>'form-control','label'=>false,'placeholder'=>'Enter the Fax Number')); ?>
    </div>
    <label class="col-md-2 control-label" for="val_email">Email</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('Salesorder.email', array('id'=>'val_email','class'=>'form-control',
                                                'placeholder'=>'Enter the Email Id','label'=>false)); ?>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label" for="val_reg_date">Reg Date</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('Salesorder.reg_date', array('id'=>'val_reg_date','class'=>'form-control input-datepicker-close','data-date-format'=>'yyyy-mm-dd',
                                                'placeholder'=>'Enter the Registration date Name','label'=>false)); ?>
    </div>
     <label class="col-md-2 control-label" for="val_ref_no">Po Reference No</label>
    <div class="col-md-4">
        <div class="row col-md-9">
            <?php echo $this->Form->input('ref_no', array('type'=>'text','id'=>'val_ref_no','placeholder'=>'Enter the Purchase Order Number','class'=>'form-control','label'=>false)); ?>
            <?php echo $this->Form->input('Salesorder.po_generate_type', array('type'=>'hidden','id'=>'po_gen_type','class'=>'form-control','label'=>false)); ?>
        </div>
        <div class="col-md-4">
            <button class="btn btn-sm btn-primary sal_generate_po" id="purchase_order" type="button">Generate Po</button>
        </div> 
        <span class="help-block_login po_name_error">Purchase order Full Invoice needs Single PO</span>
        <?php //echo $this->Form->input('Salesorder.ref_no', array('id'=>'val_ref_no','class'=>'form-control','label'=>false,'placeholder'=>'Enter the Reference Number',)); ?>
    </div>
</div>
<div class="form-group">
    <label class="col-md-2 control-label" for="val_in_date">In Date</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('Salesorder.in_date', array('id'=>'val_in_date','class'=>'form-control input-datepicker-close','data-date-format'=>'yyyy-mm-dd',
                                                'placeholder'=>'Enter the Registration date Name','label'=>false)); ?>
    </div>
    <label class="col-md-2 control-label" for="val_out_date">Out Date</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('Salesorder.due_date', array('id'=>'val_out_date','class'=>'form-control input-datepicker-close','data-date-format'=>'yyyy-mm-dd',
                                                'placeholder'=>'Enter the Registration date Name','label'=>false)); ?>
    </div>
</div>
<div class="form-group">
    <label class="col-md-2 control-label" for="val_priority">Priority</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('Salesorder.priority', array('id' => 'val_priority', 'class' => 'select-chosen form-control', 'label' => false, 'options' => $priority)); ?>
    </div>
    <?php echo $this->Form->input('Salesorder.track_id', array('type'=>'hidden','id'=>'val_our_ref_no','class'=>'form-control','label'=>false,'value'=>$our_ref_no)); ?>
</div>
<div class="form-group">
    <label class="col-md-2 control-label" for="val_instrument_type_id">Select Instrument For</label>
    <div class="col-md-12">
        <?php echo $this->Form->input('instrument_type_id', array('id'=>'val_instrument_type_id','class'=>'form-control select-chosen','type'=>'select',
                                                'label'=>false,'options'=>$instrument_types,'empty'=>'-- Select instrument For --')); ?>
    </div>
</div>
