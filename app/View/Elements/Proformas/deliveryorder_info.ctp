<div class="form-group">
    
    <label class="col-md-2 control-label" for="val_id">ID</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('Proforma.id', array('id'=>'val_id','class'=>'form-control','readonly'=>'readonly','label'=>false,'type'=>'text')); ?>
    </div>
        
<!--    <label class="col-md-2 control-label" for="val_branchname">Branch</label>
    <div class="col-md-4">
        <?php //echo $this->Form->input('branchname', array('id'=>'val_branchname','class'=>'form-control','disabled'=>'disabled',
            //'label'=>false,'type'=>'text')); ?>
    </div>-->
        <label class="col-md-2 control-label" for="val_priority">Priority</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('Proforma.priority', array('id'=>'val_priority','class'=>'form-control',
            'label'=>false,'readonly'=>'readonly','type'=>'text')); ?>
    </div>
</div>
    
<div class="form-group">
    <label class="col-md-2 control-label" for="val_customer">Customer Name</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('Proforma.customername', 
                array('id'=>'val_customer','class'=>'form-control','placeholder'=>'Enter the Customer Name','label'=>false,
                    'autoComplete'=>'off','type'=>'text','name'=>'sales_customername','readonly'=>'readonly')); ?>
         <?php echo $this->Form->input('Proforma.customer_id', 
                array('id'=>'val_customer_id','class'=>'form-control','label'=>false,
                    'autoComplete'=>'off','type'=>'hidden')); ?>
        <div id="result">
        </div>
    </div>
    <label class="col-md-2 control-label" for="val_address">Customer Address</label>
    <div class="col-md-4">
        <?php echo $this->Form->textarea('Proforma.address', array('id'=>'val_address','class'=>'form-control',
                                               'placeholder'=>'Enter the Customer Address','label'=>false,'rows'=>6,'cols'=>30,'readonly'=>'readonly')); ?>
    </div>
</div>
<div class="form-group">
    
    <label class="col-md-2 control-label" for="val_dueamount">Due Amount</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('Proforma.due_amount', array('id'=>'val_dueamount','class'=>'form-control',
                                                'placeholder'=>'Enter the Due Amount','label'=>false,'readonly'=>'readonly')); ?>
       
    </div>
    <label class="col-md-2 control-label" for="val_attn">ATTN</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('Proforma.attn', array('id'=>'val_attn','class'=>'form-control','label'=>false,'type'=>'select','readonly'=>'readonly')); ?>
    </div>
</div>
<div class="form-group">
    
    <label class="col-md-2 control-label" for="val_phone">Phone</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('Proforma.phone', array('id'=>'val_phone','class'=>'form-control',
                                                'placeholder'=>'Enter the Phone Number','label'=>false,'readonly'=>'readonly')); ?>
       
    </div>
    <label class="col-md-2 control-label" for="val_fax">Fax</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('Proforma.fax', array('id'=>'val_fax','class'=>'form-control','label'=>false,'placeholder'=>'Enter the Fax Number','readonly'=>'readonly')); ?>
    </div>
</div>

<div class="form-group">
    
    <label class="col-md-2 control-label" for="val_email">Email</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('Proforma.email', array('id'=>'val_email','class'=>'form-control',
                                                'placeholder'=>'Enter the Email Id','label'=>false,'readonly'=>'readonly')); ?>
       
    </div>
    <label class="col-md-2 control-label" for="val_reg_date">Date</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('Proforma.reg_date', array('id'=>'val_reg_date','class'=>'form-control input-datepicker-close','data-date-format'=>'mm/dd/yy',
                                                'placeholder'=>'Enter the Registration date Name','label'=>false)); ?>
       
    </div>
    
</div>

<div class="form-group">
    <label class="col-md-2 control-label" for="val_ref_no">Reference No</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('Proforma.ref_no', array('id'=>'val_ref_no','class'=>'form-control','label'=>false,'placeholder'=>'Enter the Reference Number','readonly'=>'readonly')); ?>
    </div>
    <label class="col-md-2 control-label" for="val_our_ref_no">Our Reference Number</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('Proforma.our_ref_no', array('id'=>'val_our_ref_no','class'=>'form-control','label'=>false,'placeholder'=>'Enter the Reference Number','readonly'=>'readonly')); ?>
    </div>
    
</div>
<!--<div class="form-group">
    
     <label class="col-md-2 control-label" for="val_in_date">In Date</label>
    <div class="col-md-4">
        <?php // echo $this->Form->input('Proforma.in_date', array('id'=>'val_in_date','class'=>'form-control input-datepicker-close','data-date-format'=>'dd-MM-yy',
                                                //'placeholder'=>'Enter the Registration date Name','label'=>false,'readonly'=>'readonly')); ?>
       
    </div>
    <label class="col-md-2 control-label" for="val_out_date">Out Date</label>
    <div class="col-md-4">
        <?php //echo $this->Form->input('Proforma.out_date', array('id'=>'val_out_date','class'=>'form-control input-datepicker-close','data-date-format'=>'dd-MM-yy',
                                               // 'placeholder'=>'Enter the Registration date Name','label'=>false,'readonly'=>'readonly')); ?>
       
    </div>
    
</div>-->
<div class="form-group">
    <label class="col-md-2 control-label" for="val_instrument_type">Select Instrument For</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('Proforma.instrument_type', array('id'=>'val_instrument_type','class'=>'form-control','type'=>'select',
                                                'label'=>false,'empty'=>'-- Select instrument For --','readonly'=>'readonly')); ?>
    </div>
    
    <label class="col-md-2 control-label" for="val_salesorderno">Sales Order No</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('Proforma.salesorderno', array('id'=>'val_salesorderno','class'=>'form-control','readonly'=>'readonly','label'=>false)); ?>
    </div>
</div>

