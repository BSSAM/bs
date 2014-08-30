<div class="form-group">
     <label class="col-md-2 control-label" for="val_description">Instrument</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('description', 
                array('id'=>'val_description','class'=>'form-control','placeholder'=>'Enter the Description','label'=>false,
                    'name'=>'description','autoComplete'=>'off')); ?>
         <span class="help-block_login ins_error">Enter the Instrument Name</span>
    </div>
    <label class="col-md-2 control-label" for="val_quantity">Quantity</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('quantity', array('id'=>'val_quantity','class'=>'form-control','label'=>false,'name'=>'quantity')); ?>
    </div>
</div>
    
<div class="form-group">
    <label class="col-md-2 control-label" for="val_address">Model No</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('model_no', array('id'=>'val_model_no','class'=>'form-control',
                                               'placeholder'=>'Enter the Model Number','label'=>false,'name'=>'model_no')); ?>
    </div>
    <label class="col-md-2 control-label" for="val_validity">Validity (in months) </label>
    <div class="col-md-4">
        <?php echo $this->Form->input('validity', array('id'=>'val_validity','class'=>'form-control',
                                                'label'=>false,'name'=>'validity','disabled'=>'disabled','value'=>'12')); ?>
    </div>
</div>
<div class="form-group">
    
    <label class="col-md-2 control-label" for="val_brand">Brand</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('brand', array('id'=>'val_brand','class'=>'form-control',
                                                'label'=>false,'name'=>'brand','type'=>'text','placeholder'=>'Enter the Brand Name')); ?>
        
    </div>
    <label class="col-md-2 control-label" for="val_range">Range</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('range', array('id'=>'val_range','class'=>'form-control',
                                                'label'=>false,'name'=>'range','type'=>'text')); ?>
       
    </div>
</div>


<div class="form-group">
    
    <label class="col-md-2 control-label" for="val_discount1">Discount </label>
    <div class="col-md-4">
        <?php echo $this->Form->input('discount', array('id'=>'val_discount1','class'=>'form-control',
                                                'placeholder'=>'Enter the discount','label'=>false,'name'=>'discount','type'=>'text')); ?>
    </div>
    <label class="col-md-2 control-label" for="val_unit_price">Unit Price</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('unit_price', array('id'=>'val_unit_price','class'=>'form-control','label'=>false,
            'name'=>'unit_price','placeholder'=>'Enter the Unit Price')); ?>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label" for="val_department">Department</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('department', array('id'=>'val_department','class'=>'form-control','label'=>false,
                                      'name'=>'department','placeholder'=>'Enter the Departmnent Name')); ?>
        <?PHP echo $this->Form->input('dept_id',array('id'=>'val_department_id','type'=>'hidden')) ?>
    </div>
     <label class="col-md-2 control-label" for="val_account_service">Account Service</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('account_service', array('id'=>'val_account_service','class'=>'form-control',
                                      'label'=>false,'name'=>'account_service','value'=>'Calibration Service','readonly')); ?>
    </div>
    
</div>
<div class="form-group">
    <label class="col-md-2 control-label" for="val_title">Titles</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('title', array('id'=>'val_title','class'=>'form-control','label'=>false,'name'=>'title','type'=>'select',
            'options'=>array('1'=>'title'))); ?>
    </div>
</div>
<div class="form-group form-actions">
    <div class="col-md-9 col-md-offset-10 update_device">
        <?php  echo $this->Form->button('<i class="fa fa-plus fa-fw"></i> add',array('type'=>'button','class'=>'btn btn-sm btn-primary preqdescription_add','escape' => false)); ?>
    </div>
</div>
<div class="col-sm-3 col-lg-12">
<div class="table-responsive">
<table  class="table table-vcenter table-condensed table-bordered">
    <thead>
        <tr>
            <th class="text-center">S.No</th>
            <th class="text-center">Instrument</th>
            <th class="text-center">Model No</th>
            <th class="text-center">Validity</th>
            <th class="text-center">Unit Price</th>
            <th class="text-center">Account Service</th>
            <th class="text-center">Total</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody class="Instrument_info"> </tbody>
</table>
</div>
</div>