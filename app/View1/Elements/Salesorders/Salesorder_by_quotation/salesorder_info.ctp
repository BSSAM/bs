<div class="form-group">
    <label class="col-md-2 control-label" for="val_quotationno">Sales Order No</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('Salesorder.salesorderno', array('id'=>'val_salesorderno','class'=>'form-control','readonly'=>'readonly','label'=>false,'value'=> $salesorderno)); ?><!-- ,'ng-model'=>'salesorder_id','ng-init'=>'salesorder_id='."'$salesorderno'" -->
    </div>
    <label class="col-md-2 control-label" for="val_dueamount">Due Amount</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('Salesorder.due_amount', array('id' => 'val_dueamount', 'class' => 'form-control',
            'placeholder' => 'Due Amount', 'label' => false, 'readonly'=>'readonly'));
        ?>
    </div>
</div>
    
<div class="form-group">
    
    <label class="col-md-2 control-label" for="val_customer">Customer Name</label>
    <div class="col-md-4">
        <?PHP $customer_name    =   (!empty($sale['Customer']['Customertagname'])?$sale['Customer']['Customertagname']:$sale['Salesorder']['customername']); ?>
        <?php echo $this->Form->input('Salesorder.customername', array('id'=>'val_customer','class'=>'form-control','placeholder'=>'Enter the Customer Name','label'=>false,
                    'autoComplete'=>'off','type'=>'text','name'=>'sales_customername','value'=>$customer_name,'readonly'=>'readonly')); ?>
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
        <?php echo $this->Form->input('Salesorder.attn', array('id'=>'val_attn','class'=>'select-chosen form-control','label'=>false,'type'=>'select','data-placeholder'=>'Select the Contact person name','options'=>$contact_list,'readonly'=>'readonly')); ?>
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
                                                'placeholder'=>'Enter the Email Id','label'=>false,'readonly'=>'readonly')); ?>
    </div>
</div>

<div class="form-group">
   
    <label class="col-md-2 control-label" for="val_reg_date">Reg Date</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('Salesorder.reg_date', array('id'=>'val_reg_date','class'=>'form-control input-datepicker-close','data-date-format'=>'dd-MM-yy',
                                                'placeholder'=>'Enter the Registration date Name','label'=>false,'readonly'=>'readonly')); ?>
    </div>
    <label class="col-md-2 control-label" for="val_ref_no">Po Reference No</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('Salesorder.ref_no', array('id'=>'val_ref_no','class'=>'form-control','label'=>false,'placeholder'=>'Enter the Reference Number','readonly'=>'readonly')); ?>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label" for="val_in_date">In Date</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('Salesorder.in_date', array('id'=>'val_in_date','class'=>'form-control input-datepicker-close','data-date-format'=>'dd-MM-yy',
                                                'placeholder'=>'Enter the Registration date Name','label'=>false,'readonly'=>'readonly')); ?>
    </div>
    <label class="col-md-2 control-label" for="val_out_date">Out Date</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('Salesorder.due_date', array('id'=>'val_out_date','class'=>'form-control input-datepicker-close','data-date-format'=>'dd-MM-yy',
                                                'placeholder'=>'Enter the Registration date Name','label'=>false)); ?>
    </div>
</div>
<!--<div class="form-group">
    
    <label class="col-md-2 control-label" for="val_priority">Priority</label>
    <div class="col-md-4">
        <?php //echo $this->Form->input('Salesorder.priority', array('id' => 'val_priority', 'class' => 'select-chosen form-control', 'label' => false, 'options' => $priority)); ?>
    </div>
    <?php //echo $this->Form->input('Salesorder.track_id', array('type'=>'hidden','id'=>'val_our_ref_no','class'=>'form-control','label'=>false,)); ?>
</div>-->
<div class="form-group">
    <label class="col-md-2 control-label" for="val_instrument_type">Select Instrument For</label>
    <div class="col-md-12">
        <?php echo $this->Form->input('Salesorder.instrument_type_id', array('class'=>'form-control','type'=>'text',
                                                'label'=>false,'value'=>$instrument_type,'readonly'=>'readonly')); ?>
    </div>
</div>

