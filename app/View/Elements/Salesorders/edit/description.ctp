<div class="form-group">
    
    <label class="col-md-2 control-label" for="val_sno">S.No</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('sno', array('id'=>'val_sno','class'=>'form-control','disabled'=>'disabled','label'=>false,'name'=>'sno')); ?>
    </div>
        
    <label class="col-md-2 control-label" for="val_quantity">Quantity</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('quantity', array('id'=>'val_quantity','class'=>'form-control','disabled'=>'disabled','label'=>false,'name'=>'quantity')); ?>
    </div>
        
</div>
    
<div class="form-group">
    
    <label class="col-md-2 control-label" for="val_customer">Description</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('description', 
                array('id'=>'val_description','class'=>'form-control','placeholder'=>'Enter the Description','label'=>false,
                    'name'=>'description','autoComplete'=>'off')); ?>
        <div id="result">
        </div>
    </div>
    <label class="col-md-2 control-label" for="val_address">Model No</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('model_no', array('id'=>'val_model_no','class'=>'form-control',
                                               'placeholder'=>'Enter the Model Number','label'=>false,'name'=>'model_no')); ?>
    </div>
        
</div>
<div class="form-group">
    
    <label class="col-md-2 control-label" for="val_brand">Brand</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('brand', array('id'=>'val_brand','class'=>'form-control',
                                                'label'=>false,'name'=>'brand','rows'=>6,'cols'=>'')); ?>
        <div id="result">
        </div>
    </div>
    <label class="col-md-2 control-label" for="val_range">Range</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('range', array('id'=>'val_range','class'=>'form-control','label'=>false,'name'=>'range')); ?>
    </div>
</div>
<div class="form-group">
    
    <label class="col-md-2 control-label" for="val_call_location">Call Location</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('call_location', array('id'=>'val_call_location','class'=>'form-control',
                                                'label'=>false,'name'=>'call_location','type'=>'select')); ?>
        <div id="result">
        </div>
    </div>
    <label class="col-md-2 control-label" for="val_call_type">Call Type</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('call_type', array('id'=>'val_call_type','class'=>'form-control','label'=>false,'name'=>'call_type','placeholder'=>'Enter the Fax Number')); ?>
    </div>
</div>

<div class="form-group">
    
    <label class="col-md-2 control-label" for="val_validity">Validity (in months) </label>
    <div class="col-md-4">
        <?php echo $this->Form->input('validity', array('id'=>'val_validity','class'=>'form-control',
                                                'label'=>false,'name'=>'validity','disabled'=>'disabled')); ?>
        <div id="result">
        </div>
    </div>
    <label class="col-md-2 control-label" for="val_unit_price">Unit Price</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('unit_price', array('id'=>'val_unit_price','class'=>'form-control','label'=>false,
            'name'=>'unit_price','placeholder'=>'Enter the Unit Price',)); ?>
    </div>
</div>

<div class="form-group">
    
    <label class="col-md-2 control-label" for="val_discount">Discount</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('discount', array('id'=>'val_discount','class'=>'form-control',
                                                'placeholder'=>'Enter the discount','label'=>false,'name'=>'discount')); ?>
        <div id="result">
        </div>
    </div>
    <label class="col-md-2 control-label" for="val_department">Department</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('department', array('id'=>'val_department','class'=>'form-control','label'=>false,'name'=>'department','placeholder'=>'Enter the Departmnent Name',)); ?>
    </div>
</div>
<div class="form-group">
    
    <label class="col-md-2 control-label" for="val_account_service">Account Service</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('account_service', array('id'=>'val_account_service','class'=>'form-control',
                                                'label'=>false,'name'=>'account_service','options'=>array('1'=>'yes'))); ?>
        <div id="result">
        </div>
    </div>
    <label class="col-md-2 control-label" for="val_title">Titles</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('title', array('id'=>'val_title','class'=>'form-control','label'=>false,'name'=>'title','type'=>'select')); ?>
    </div>
</div>
