<div class="form-group">
    <label class="col-md-2 control-label" for="val_quotationno">Quotation No</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('Quotation.quotationno', array('id'=>'val_quotationno','class'=>'form-control','readonly'=>'readonly','label'=>false,'value'=> $quotationno)); ?>
    </div>
    <label class="col-md-2 control-label" for="val_dueamount">Due Amount</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('due_amount', array('id'=>'val_dueamount','class'=>'form-control',
                                                'placeholder'=>'Due Amount','label'=>false,'autoComplete'=>'off','disabled'=>'disabled')); ?>
    </div>
</div>

<div class="form-group">
    <div class="form-group_val">
    <label class="col-md-2 control-label" for="val_customer">Customer Name</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('customername', 
                array('id'=>'val_customer','class'=>'form-control','placeholder'=>'Enter the Customer Name','label'=>false,
                    'autoComplete'=>'off','type'=>'text','name'=>'customername')); ?>
        <?PHP //echo $this->Form->input('customer_id',array('type'=>'hidden','id'=>'customer_id')); ?>
        <div id="result" class="instrument_drop"></div>
    </div>
    </div>
    <label class="col-md-2 control-label" for="val_address">Customer Address</label>
    <div class="col-md-4">
        <?php echo $this->Form->textarea('address', array('id'=>'val_address','class'=>'form-control',
                                               'placeholder'=>'Enter the Customer Address','label'=>false,'rows'=>6,'cols'=>30)); ?>
    </div>
    
    
</div>

<div class="form-group">
    <label class="col-md-2 control-label" for="val_attn">ATTN</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('attn', array('id'=>'val_attn','class'=>'form-control','label'=>false,'type'=>'select','empty'=>'Select Contact person Name')); ?>
    </div>
     <label class="col-md-2 control-label" for="val_email">Email</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('email', array('id'=>'val_email','class'=>'form-control',
                                                'placeholder'=>'Enter the Email Id','label'=>false,'autoComplete'=>'off','readonly'=>'readonly')); ?>
    </div>
</div>
<div class="form-group">
    <label class="col-md-2 control-label" for="val_phone">Phone</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('phone', array('id'=>'val_phone','class'=>'form-control',
                                                'placeholder'=>'Enter the Phone Number','label'=>false,'autoComplete'=>'off')); ?>
    </div>
    <label class="col-md-2 control-label" for="val_fax">Fax</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('fax', array('id'=>'val_fax','class'=>'form-control','label'=>false,'placeholder'=>'Enter the Fax Number')); ?>
    </div>
</div>
<div class="form-group">
     <label class="col-md-2 control-label" for="val_payment_term">Payment Terms</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('payment_term', array('id'=>'val_payment_term','class'=>'form-control','label'=>false,
           'placeholder'=>'Enter the Payment Terms','disabled'=>'disabled','type'=>'text')); ?>
         <?PHP echo $this->Form->input('paymentterm_id',array('type'=>'hidden','id'=>'pay_id')); ?>
    </div>
    <label class="col-md-2 control-label" for="val_reg_date">Reg Date</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('reg_date', array('id'=>'val_reg_date','class'=>'form-control input-datepicker-close','data-date-format'=>'yyyy-mm-dd',
                                                'placeholder'=>'Enter the Registration date','label'=>false)); ?>
    </div>
</div>
<div class="form-group">
    <label class="col-md-2 control-label" for="val_ref_no">PO Reference No</label>
    <div class="col-md-4">
        <div class="row col-md-9">
            <?php echo $this->Form->input('ref_no', array('type'=>'text','id'=>'val_ref_no','placeholder'=>'Enter the Purchase Order Number','class'=>'form-control','label'=>false)); ?>
            <?php echo $this->Form->input('Quotation.po_generate_type', array('type'=>'hidden','id'=>'po_gen_type','class'=>'form-control','label'=>false)); ?>
        </div>
        <div class="col-md-4">
            <button class="btn btn-sm btn-primary quo_generate_po" id="purchase_order" type="button">Generate Po</button>
        </div> 
        <span class="help-block_login po_name_error">Purchase order Full Invoice needs Single PO</span>
    </div>
    <label class="col-md-2 control-label" for="val_discount">Discount</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('discount', array('id'=>'val_discount','class'=>'form-control',
                                                'placeholder'=>'Enter the Discount value','label'=>false,'type'=>'text')); ?>
    </div>
</div>
<div class="form-group">
    <label class="col-md-2 control-label" for="val_priority">Priority</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('priority', array('id'=>'val_priority','class'=>'form-control select-chosen',
            'label'=>false,'options'=>$priority)); ?>
    </div>
</div>
<div class="form-group">
 <label class="col-md-2 control-label" for="val_instrument_type_id">Select Instrument For</label>
 <div class="instrument_details">
    <div class="col-md-12">
        <?php echo $this->Form->input('instrument_type_id', array('id'=>'val_instrument_type_id','class'=>'form-control select-chosen','type'=>'select',
                                                'label'=>false,'empty'=>'-- Select instrument For --','options'=>$instrument_types)); ?>
    </div>
 </div>
</div>
