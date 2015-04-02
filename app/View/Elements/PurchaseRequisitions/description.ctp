<script type="text/javascript">
    function setMaximumSelected(amount,element) {
        var itemsSelected = [];
        for (var i=0;i<element.options.length;i++) {
                if (element.options[i].selected) itemsSelected[itemsSelected.length]=i;
        }
        if (itemsSelected.length>5) {
                itemsSelected = element.getAttribute("itemsSelected").split(",");
                for (i=0;i<element.options.length;i++) {
                        element.options[i].selected = false;
                }
                for (i=0;i<itemsSelected.length;i++) {
                        element.options[itemsSelected[i]].selected = true;
                }			
        } else {
                element.setAttribute("itemsSelected",itemsSelected.toString());	
        }
    }
</script>
<div class="form-group">
     <label class="col-md-2 control-label" for="val_description">Instrument <span class="text-danger">*</span></label>
    <div class="col-md-4">
        <?php echo $this->Form->input('description', 
                array('id'=>'val_description','class'=>'form-control error-custom','placeholder'=>'Enter the Description','label'=>false,
                    'name'=>'description','autoComplete'=>'off')); ?>
<!--         <span class="help-block_login ins_error">Enter the Instrument Name</span>-->
         <span class="name_error">Instrument Name is Required</span>
    </div>
    <label class="col-md-2 control-label" for="val_quantity">Quantity <span class="text-danger">*</span></label>
    <div class="col-md-4">
        <?php echo $this->Form->input('quantity', array('id'=>'val_quantity','class'=>'form-control error-custom','label'=>false,'name'=>'quantity')); ?>
        <span class="name_error">Instrument Quantity is Required</span>
    </div>
</div>
    
<div class="form-group">
    <label class="col-md-2 control-label" for="val_address">Model No <span class="text-danger">*</span></label>
    <div class="col-md-4">
        <?php echo $this->Form->input('model_no', array('id'=>'val_model_no','class'=>'form-control error-custom',
                                               'placeholder'=>'Enter the Model Number','label'=>false,'name'=>'model_no')); ?>
        <span class="name_error">Instrument Model No is Required</span>
    </div>
    <label class="col-md-2 control-label" for="val_validity">Validity (in months) </label>
    <div class="col-md-4">
        <?php echo $this->Form->input('validity', array('id'=>'val_validity','class'=>'form-control',
                                                'label'=>false,'name'=>'validity','disabled'=>'disabled','value'=>'12')); ?>
    </div>
</div>
<div class="form-group">
    
    <label class="col-md-2 control-label" for="val_brand">Brand <span class="text-danger">*</span></label>
    <div class="col-md-4">
        <?php echo $this->Form->input('brand', array('id'=>'val_brand','class'=>'form-control error-custom',
                                                'label'=>false,'name'=>'brand','type'=>'text','placeholder'=>'Enter the Brand Name')); ?>
        <span class="name_error">Instrument Brand is Required</span>
        
    </div>
    <label class="col-md-2 control-label" for="val_range">Range <span class="text-danger">*</span></label>
    <div class="col-md-4">
        <?php echo $this->Form->input('range', array('id'=>'val_range','class'=>'form-control error-custom','placeholder'=>'Enter the Instrument Range',
                                                'label'=>false,'name'=>'range','type'=>'text')); ?>
        <span class="name_error">Instrument Range is Required</span>
       
    </div>
</div>


<div class="form-group">
    
    <label class="col-md-2 control-label" for="val_discount1">Discount </label>
    <div class="col-md-4">
        <?php echo $this->Form->input('device_discount', array('id'=>'val_discount1','class'=>'form-control',
                                                'placeholder'=>'Enter the discount','label'=>false,'name'=>'device_discount','type'=>'text')); ?>
    </div>
    <label class="col-md-2 control-label" for="val_unit_price">Unit Price <span class="text-danger">*</span></label>
    <div class="col-md-4">
        <?php echo $this->Form->input('unit_price', array('id'=>'val_unit_price','class'=>'form-control error-custom','label'=>false,
            'name'=>'unit_price','placeholder'=>'Enter the Unit Price')); ?>
        <span class="name_error">Instrument Unit Price is Required</span>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label" for="val_department">Department <span class="text-danger">*</span></label>
    <div class="col-md-4">
        <?php echo $this->Form->input('department', array('id'=>'val_department','class'=>'form-control error-custom','label'=>false,
                                      'name'=>'department','placeholder'=>'Enter the Departmnent Name')); ?>
        <?PHP echo $this->Form->input('dept_id',array('id'=>'val_department_id','type'=>'hidden')) ?>
         <span class="name_error">Instrument Department is Required</span>
    </div>
     <label class="col-md-2 control-label" for="val_account_service">Account Service <span class="text-danger">*</span></label>
    <div class="col-md-4">
        <?php echo $this->Form->input('account_service', array('id'=>'val_account_service','class'=>'form-control error-custom',
                                      'label'=>false,'name'=>'account_service','value'=>'Calibration Service','type'=>'select','options'=>$service)); ?>
        <span class="name_error">Instrument Account Service is Required</span>
    </div>
    
</div>
<div class="form-group">
    <label class="col-md-2 control-label" for="val_title">Titles</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('title', array('id'=>'val_title','class'=>'form-control','label'=>false,'name'=>'title','type'=>'select',
            'options'=>$titles,'multiple','onclick'=>'setMaximumSelected(5,this)')); ?>
    </div>
</div>
<div class="form-group form-actions">
    <div class="col-md-9 col-md-offset-10 pre_update_device">
        <?php  echo $this->Form->button('<i class="fa fa-plus fa-fw"></i> add',array('type'=>'button','class'=>'btn btn-sm btn-primary preqdescription_add','escape' => false)); ?>
    </div>
</div>
<div class="col-sm-3 col-lg-12">
<div class="table-responsive">
<table id="qofull-datatable" class="table table-vcenter table-condensed table-bordered">
    <thead>
        <tr>
            <th class="text-center">S.No</th>
            <th class="text-center">Instrument</th>
            <th class="text-center">Model No</th>
            <th class="text-center">Brand</th>
            <th class="text-center">Range</th>
            <th class="text-center">Validity</th>
            <th class="text-center">Account Service</th>
            <th class="text-center">Total</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody class="Instrument_info"> 
        
    </tbody>
</table>
</div>
</div>