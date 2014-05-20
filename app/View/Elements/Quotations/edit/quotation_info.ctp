<div class="form-group">
    
    <label class="col-md-2 control-label" for="val_quotationno">Quotation No</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('Quotation.quotationno', array('id'=>'val_quotationno','class'=>'form-control','disabled'=>'disabled','label'=>false,'value'=> $this->request->data['Quotation']['quotationno'])); ?>
    </div>
    <label class="col-md-2 control-label" for="val_priority">Priority</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('priority', array('id'=>'val_priority','class'=>'form-control',
            'label'=>false,'options'=>$priority)); ?>
    </div>
    
</div>
    
<div class="form-group">
    
    <label class="col-md-2 control-label" for="val_customer">Customer Name</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('customername', 
                array('id'=>'val_customer','class'=>'form-control','placeholder'=>'Enter the Customer Name','label'=>false,
                    'autoComplete'=>'off','type'=>'text')); ?>
        <?PHP //echo $this->Form->input('customer_id',array('type'=>'hidden','id'=>'customer_id')); ?>
        <div id="result">
        </div>
    </div>
    <label class="col-md-2 control-label" for="val_address">Customer Address</label>
    <div class="col-md-4">
        <?php echo $this->Form->textarea('address', array('id'=>'val_address','class'=>'form-control',
                                               'placeholder'=>'Enter the Customer Address','label'=>false,'rows'=>6,'cols'=>30)); ?>
    </div>
        
</div>
<div class="form-group">
    
    <label class="col-md-2 control-label" for="val_dueamount">Due Amount</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('due_amount', array('id'=>'val_dueamount','class'=>'form-control',
                                                'placeholder'=>'Enter the Due Amount','label'=>false,'autoComplete'=>'off')); ?>
      
    </div>
    <label class="col-md-2 control-label" for="val_attn">ATTN</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('attn', array('id'=>'val_attn','class'=>'form-control','label'=>false,'type'=>'select')); ?>
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
    
    <label class="col-md-2 control-label" for="val_email">Email</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('email', array('id'=>'val_email','class'=>'form-control',
                                                'placeholder'=>'Enter the Email Id','label'=>false,'autoComplete'=>'off')); ?>
       
    </div>
    <label class="col-md-2 control-label" for="val_payment_term">Payment Terms</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('payment_term', array('id'=>'val_payment_term','class'=>'form-control','label'=>false,
           'placeholder'=>'Enter the Payment Terms','disabled'=>'disabled','type'=>'text')); ?>
    </div>
</div>

<div class="form-group">
    
    <label class="col-md-2 control-label" for="val_reg_date">Reg Date</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('reg_date', array('id'=>'val_reg_date','class'=>'form-control input-datepicker-close','data-date-format'=>'mm/dd/yy',
                                                'placeholder'=>'Enter the Registration date Name','label'=>false)); ?>
       
    </div>
    <label class="col-md-2 control-label" for="val_ref_no">Your Reference No</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('ref_no', array('id'=>'val_ref_no','class'=>'form-control','label'=>false,'placeholder'=>'Enter the Reference Number',)); ?>
    </div>
</div>
<div class="form-group">
    
    <label class="col-md-2 control-label" for="val_discount">Discount</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('discount', array('id'=>'val_discount','class'=>'form-control',
                                                'placeholder'=>'Enter the Discount value','label'=>false,'type'=>'text')); ?>
       
    </div>
    <label class="col-md-2 control-label" for="val_customer">Select Instrument For</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('instrument_type', array('id'=>'val_customer','class'=>'form-control','type'=>'select',
                                                'label'=>false,'empty'=>'-- Select instrument For --','options'=>array('1'=>'We are pleased to quote the item(s) below for calibration service with certificate(s) :'))); ?>
       
    </div>
</div>
