<div class="form-group">
    <label class="col-md-2 control-label" for="val_prequistionno">Purchase requisition No</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('Reqpurchaseorder.reqpurchaseno', array('id'=>'val_quotationno','class'=>'form-control','readonly'=>'readonly','label'=>false,'value'=> $prequistionno)); ?>
    </div>
    <label class="col-md-2 control-label" for="val_dueamount">Due Amount</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('Reqpurchaseorder.due_amount', array('id'=>'val_dueamount','class'=>'form-control',
                                                'placeholder'=>'Due Amount','label'=>false,'autoComplete'=>'off','readonly'=>'readonly')); ?>
    </div>
</div>
<div class="form-group">
    <div class="form-group_val">
    <label class="col-md-2 control-label" for="val_customer">Customer Name <span class="text-danger">*</span></label>
    <div class="col-md-4">
        <?php echo $this->Form->input('Reqpurchaseorder.customername', 
                array('id'=>'preq_customer','class'=>'form-control','placeholder'=>'Enter the Customer Name','label'=>false,
                    'autoComplete'=>'off','type'=>'text')); ?>
        <div id="result"></div>
    </div>
    </div>
    <label class="col-md-2 control-label" for="val_address">Customer Address</label>
    <div class="col-md-4">
        <?php echo $this->Form->textarea('Reqpurchaseorder.address', array('id'=>'val_address','class'=>'form-control',
                                               'placeholder'=>'Enter the Customer Address','label'=>false,'rows'=>6,'cols'=>30)); ?>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label" for="val_attn">ATTN <span class="text-danger">*</span></label>
    <div class="col-md-4">
        <?php echo $this->Form->input('Reqpurchaseorder.attn', array('id'=>'val_attn','class'=>'form-control','label'=>false,'type'=>'select','empty'=>'Select Contact person Name')); ?>
    </div>
     <label class="col-md-2 control-label" for="val_email">Email</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('Reqpurchaseorder.email', array('id'=>'val_email','class'=>'form-control',
                                                'placeholder'=>'Enter the Email Id','label'=>false,'autoComplete'=>'off','readonly'=>'readonly')); ?>
    </div>
</div>
<div class="form-group">
    <label class="col-md-2 control-label" for="val_phone">Phone <span class="text-danger">*</span></label>
    <div class="col-md-4">
        <?php echo $this->Form->input('Reqpurchaseorder.phone', array('id'=>'val_phone','class'=>'form-control',
                                                'placeholder'=>'Enter the Phone Number','label'=>false,'autoComplete'=>'off')); ?>
    </div>
    <label class="col-md-2 control-label" for="val_fax">Fax</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('Reqpurchaseorder.fax', array('id'=>'val_fax','class'=>'form-control','label'=>false,'placeholder'=>'Enter the Fax Number')); ?>
    </div>
</div>
<div class="form-group">
     <label class="col-md-2 control-label" for="val_payment_term">Payment Terms</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('Reqpurchaseorder.paymentterm_name', array('id'=>'val_payment_term','class'=>'form-control','label'=>false,
           'placeholder'=>'Enter the Payment Terms','readonly'=>'readonly','type'=>'text')); ?>
         
    </div>
    <label class="col-md-2 control-label" for="val_reg_date">Reg Date</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('Reqpurchaseorder.reg_date', array('id'=>'val_reg_date','class'=>'form-control input-datepicker-close','data-date-format'=>'dd-MM-yy',
                                                'placeholder'=>'Enter the Registration date','label'=>false)); ?>
    </div>
</div>
<div class="form-group">
    <label class="col-md-2 control-label" for="val_ref_no">PO Reference No <span class="text-danger">*</span></label>
    <div class="col-md-4">
            <?php echo $this->Form->input('Reqpurchaseorder.ref_no', array('type'=>'text','id'=>'val_ref_no','class'=>'form-control','label'=>false,'placeholder'=>'Enter the Reference Number',)); ?>
    </div>
    <label class="col-md-2 control-label" for="val_discount">Discount</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('Reqpurchaseorder.discount', array('id'=>'val_discount','class'=>'form-control',
                                                'placeholder'=>'Enter the Discount value','label'=>false,'type'=>'text')); ?>
    </div>
</div>
<div class="form-group">
 <label class="col-md-2 control-label" for="val_customer">Select Instrument For <span class="text-danger">*</span></label>
    <div class="col-md-12">
        <?php echo $this->Form->input('Reqpurchaseorder.instrument_type_name', array('class'=>'form-control', 'label'=>false,'value'=>$this->request->data['InstrumentType']['purchase_requisition'],'readonly'=>'readonly')); ?>
    </div>
</div>
