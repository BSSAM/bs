<div class="form-group">
    <label class="col-md-2 control-label" for="val_quotationno">Quotation No</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('Quotation.quotationno', array('id'=>'val_quotationno','class'=>'form-control','disabled'=>'disabled','label'=>false,'value'=> $this->request->data['Quotation']['quotationno'])); ?>
        <?php echo $this->Form->input('Quotation.id', array('id'=>'val_quotationid','class'=>'form-control','type'=>'hidden','label'=>false,'value'=> $this->request->data['Quotation']['id'])); ?>
    </div>
   <label class="col-md-2 control-label" for="val_dueamount">Due Amount</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('due_amount', array('id'=>'val_dueamount','class'=>'form-control',
                                                'placeholder'=>'Due Amount','label'=>false,'autoComplete'=>'off','disabled'=>'disabled','type'=>'text')); ?>
        
    </div>
</div>
    
<div class="form-group">
    <label class="col-md-2 control-label" for="val_customer">Customer Name <span class="text-danger">*</span></label>
    <div class="col-md-4">
        <?php echo $this->Form->input('customername', 
                array('id'=>'val_customer','class'=>'form-control','placeholder'=>'Enter the Customer Name','label'=>false,
                    'autoComplete'=>'off','type'=>'text','name'=>'customername','readonly'=>'readonly')); ?>
        <?PHP //echo $this->Form->input('customer_id',array('type'=>'hidden','id'=>'customer_id')); ?>
        <div id="result">
        </div>
    </div>
    <label class="col-md-2 control-label" for="val_address">Customer Address</label>
    <div class="col-md-4">
        <?php echo $this->Form->textarea('address', array('id'=>'val_address','class'=>'form-control',
                                               'placeholder'=>'Enter the Customer Address','label'=>false,'rows'=>6,'cols'=>30,'readonly'=>'readonly')); ?>
    </div>
        
</div>
<div class="form-group">
    <label class="col-md-2 control-label" for="val_attn">ATTN <span class="text-danger">*</span></label>
    <div class="col-md-4">
        <?php echo $this->Form->input('attn', array('id'=>'val_attn','class'=>'form-control','label'=>false,'type'=>'select','empty'=>'Select Contact person Name','options'=>$person_list,'readonly'=>'readonly')); ?>
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
                                                'placeholder'=>'Enter the Phone Number','label'=>false,'autoComplete'=>'off','readonly'=>'readonly', 'onkeypress'=>'return isNumberKey(event)')); ?>
       
    </div>
    <label class="col-md-2 control-label" for="val_fax">Fax</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('fax', array('id'=>'val_fax','class'=>'form-control','label'=>false,'placeholder'=>'Enter the Fax Number','readonly'=>'readonly', 'onkeypress'=>'return isNumberKey(event)')); ?>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label" for="val_payment_term">Payment Terms</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('payment_term', array('id'=>'val_payment_term','class'=>'form-control','label'=>false,
           'placeholder'=>'Enter the Payment Terms','disabled'=>'disabled','type'=>'text','value'=>$quotations_list['Customer']['Paymentterm']['pay'])); ?>
    </div>
     <label class="col-md-2 control-label" for="val_reg_date">Reg Date</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('reg_date', array('id'=>'val_reg_date','class'=>'form-control input-datepicker-close','data-date-format'=>'dd-M-yyyy',
                                                'placeholder'=>'Enter the Registration date Name','label'=>false,'readonly'=>'readonly')); ?>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label" for="val_ref_no">PO Reference No <span class="text-danger">*</span></label> 
     <div class="col-md-4">
            <?PHP //if(!empty($this->request->data['Clientpo'])){$pos =$po_list ;$readonly    ="readonly";}else{$pos =$this->request->data['Quotation']['ref_no'];$readonly    ="";}?>
            <?php echo $this->Form->input('ref_no', array('type'=>'text','id'=>'val_ref_no','class'=>'form-control','label'=>false,'placeholder'=>'Enter the Reference Number','readonly'=>'readonly')); ?>
     </div>
     <label class="col-md-2 control-label" for="val_discount">Discount</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('discount', array('id'=>'val_discount','class'=>'form-control',
                                                'placeholder'=>'Enter the Discount value','label'=>false,'type'=>'text', 'onkeypress'=>'return isNumberKey(event)','onkeyup'=>'sync();')); ?>
    </div>
</div>
<div class="form-group">
     <label class="col-md-2 control-label" for="val_priority">Priority</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('priority', array('id'=>'val_priority','class'=>'form-control select-chosen','label'=>false,'options'=>$priority)); ?>
    </div>
</div>
<div class="form-group">
    
 <label class="col-md-2 control-label" for="val_instrument_type_id">Select Instrument For <span class="text-danger">*</span></label>
 <div class="instrument_details">
    <div class="col-md-12">
        <?php echo $this->Form->input('instrument_type_id', array('id'=>'val_instrument_type_id','class'=>'form-control select-chosen instrument-type','type'=>'select',
                                                'label'=>false,'empty'=>'-- Select instrument For --','options'=>$instrument_types)); ?>
       
    </div>
     </div>
</div>
