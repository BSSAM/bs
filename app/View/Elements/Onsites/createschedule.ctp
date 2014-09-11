<div class="form-group">
    <label class="col-md-2 control-label" for="val_customer">Customer Name</label>
    <div class="col-md-4">
        <?php
        echo $this->Form->input('Onsite.customer_name', array('id' => 'val_customer', 'class' => 'form-control', 'placeholder' => 'Enter the Customer Name', 'label' => false,
            'autoComplete' => 'off', 'type' => 'text', 'name' => 'data[Onsite][customer_name]', 'readonly' => 'readonly'));
        ?>
        <?PHP //echo $this->Form->input('customer_id',array('type'=>'hidden','id'=>'customer_id'));  ?>
    </div>
    <label class="col-md-2 control-label" for="val_address">Customer Address</label>
    <div class="col-md-4">
        <?php echo $this->Form->textarea('address', array('id' => 'val_address', 'class' => 'form-control',
            'placeholder' => 'Enter the Customer Address', 'label' => false, 'rows' => 6, 'cols' => 30, 'readonly' => 'readonly'));
        ?>
    </div>
</div>
<div class="form-group">
    <label class="col-md-2 control-label" for="val_fax">Fax</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('fax', array('id'=>'val_fax','class'=>'form-control','label'=>false,'placeholder'=>'Enter the Fax Number','readonly'=>'readonly')); ?>
    </div>
    <label class="col-md-2 control-label" for="val_schedule_status">Onsite Schedule Status</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('schedule_status', array('id'=>'val_schedule_status','class'=>'form-control select-chosen','type'=>'select','value'=>'Pending','readonly'=>'readonly',
                                                'label'=>false,'empty'=>'-- Select Onsite Schedule Status --','options'=>array('Pending'=>'Pending','Processing'=>'Processing','Confirm'=>'Confirm','Completed'=>'Completed'))); ?>
    </div>
</div>

 
<div class="form-group">
    <label class="col-md-2 control-label" for="val_attn">ATTN</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('attn', array('id' => 'val_attn', 'class' => 'form-control', 'label' => false, 'readonly' => 'readonly', 'placeholder' => 'Enter Contact Person Name')); ?>
    </div>
    <label class="col-md-2 control-label" for="val_phone">Phone</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('phone', array('id' => 'val_phone', 'class' => 'form-control',
            'placeholder' => 'Enter the Phone Number', 'label' => false, 'autoComplete' => 'off', 'readonly' => 'readonly'));
        ?>
    </div>
</div>
    

<div class="form-group">
    <label class="col-md-2 control-label" for="val_email">Email</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('email', array('id'=>'val_email','class'=>'form-control',
                                                'placeholder'=>'Enter the Email Id','label'=>false,'autoComplete'=>'off','readonly'=>'readonly')); ?>
        
    </div>
   <label class="col-md-2 control-label" for="val_details">Details</label>
    <div class="col-md-4">
        <?php echo $this->Form->textarea('details', array('id'=>'val_details','class'=>'form-control','label'=>false,
           'placeholder'=>'Enter the Details')); ?>
    </div>
   
</div>

<div class="form-group">
    
     <label class="col-md-2 control-label" for="val_schedule_no">Onsite Schedule No</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('scheduleno', array('id'=>'val_schedule_no','class'=>'form-control','label'=>false,'placeholder'=>'Onsite Schedule No','value'=>$onsite_no)); ?>
    </div>
     <label class="col-md-2 control-label" for="val_date">Date</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('schedule_date', array('id'=>'val_date','class'=>'form-control input-datepicker-close','data-date-format'=>'dd-MM-yy',
                                                'placeholder'=>'Enter the Date','label'=>false)); ?>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label" for="val_time">Onsite Schedule Time</label>
    <div class="col-md-4">
        <div class="input-group bootstrap-timepicker">
            <input type="text" id="example-timepicker24" name="schedule_time" class="form-control input-timepicker24">
            <span class="input-group-btn">
                <a href="javascript:void(0)" class="btn btn-primary"><i class="fa fa-clock-o"></i></a>
            </span>
        </div>
    </div>
    <label class="col-md-2 control-label" for="val_duration">Duration</label>
    <div class="col-md-4">
        <div class="row col-md-4">
            <?php echo $this->Form->input('duration1', array('id' => 'val_duration', 'class' => 'form-control', 'label' => false)); ?>
        </div>
        <div class="col-md-9">
            <?php echo $this->Form->input('duration2', array('id' => 'val_duration', 'class' => 'form-control select-chosen', 'type' => 'select',
                'label' => false, 'options' => array('Minutes' => 'Minutes', 'Hours' => 'Hours', 'Days' => 'Days')));
            ?>
        </div>
    </div>
</div>
<div class="form-group">
    <label class="col-md-2 control-label" for="val_remarks">Remarks</label>
    <div class="col-md-4">
        <?php
        echo $this->Form->input('Onsite.remarks', array('id' => 'val_remarks', 'class' => 'form-control',
            'placeholder' => 'Enter Remarks', 'label' => false, 'type' => 'textarea'));
        ?>    
    </div>
</div>
