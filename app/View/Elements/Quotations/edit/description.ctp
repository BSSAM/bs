<style>
    .instrument_id
	{
		padding:10px; 
		border-bottom:1px #999 dashed;
		font-size:15px; 
		height:50px;
                float: top;
	}
	.instrument_id:hover
	{
		background:#4c66a4;
		color:#FFF;
		cursor:pointer;
	}
        #search_instrument{
            position: absolute;
            z-index: 999;
        }
    </style>
<script type="text/javascript">
    $(function(){
    $("#val_description").keyup(function() 
    { 
        var instrument = $(this).val();
        var customer_id = $('#QuotationCustomerId').val();
        var dataString = 'customer_id='+ customer_id+'&instrument='+instrument;
        if(customer_id!='')
        {
            $.ajax({
            type: "POST",
            url: path_url+"Quotations/instrument_search",
            data: dataString,
            cache: false,
            success: function(html)
            {
                
                $("#search_instrument").html(html).show();
            }
            });
        }return false;    
    });});


</script>
<div class="form-group">
    
    <label class="col-md-2 control-label" for="val_customer">Instrument</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('description', 
                array('id'=>'val_description','class'=>'form-control','placeholder'=>'Enter the Description','label'=>false,
                    'name'=>'description','autoComplete'=>'off','readonly'=>'readonly')); ?>
        <?PHP echo $this->Form->input('instrument_id',array('type'=>'hidden')); ?>
        <?PHP echo $this->Form->input('device_id',array('type'=>'hidden','id'=>'device_id')); ?>
         <span class="help-block_login ins_error">Enter the Instrument Name</span>
<!--        <div id="search_instrument"></div>-->
    </div>
        
    <label class="col-md-2 control-label" for="val_quantity">Quantity</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('quantity', array('id'=>'val_quantity','class'=>'form-control','label'=>false,'name'=>'quantity','readonly'=>'readonly')); ?>
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
                                                'label'=>false,'name'=>'brand','type'=>'select','empty'=>'Select Brand')); ?>
       
    </div>
    <label class="col-md-2 control-label" for="val_range">Range</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('range', array('id'=>'val_range','class'=>'form-control','label'=>false,'name'=>'range','type'=>'select','empty'=>'Select Range')); ?>
    </div>
</div>
<div class="form-group">
    
    <label class="col-md-2 control-label" for="val_call_location">Call Location</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('call_location', array('id'=>'val_call_location','class'=>'form-control',
                                                'label'=>false,'name'=>'call_location','type'=>'select','options'=>array('Inlab'=>'In-Lab',
                                                    'subcontract'=>'Sub-Contract','onsite'=>'On Site'),'disabled'=>'disabled')); ?>
        
    </div>
    <label class="col-md-2 control-label" for="val_call_type">Call Type</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('call_type', array('id'=>'val_call_type','class'=>'form-control','label'=>false,'name'=>'call_type',
                                      'placeholder'=>'Enter the Fax Number','type'=>'select','options'=>array('singlas'=>'Singlas',
                                          'no-singlas'=>'Non-Singlas'),'disabled'=>'disabled')); ?>
    </div>
</div>

<div class="form-group">
    
    <label class="col-md-2 control-label" for="val_discount">Discount</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('discount', array('id'=>'val_discount','class'=>'form-control',
                                                'placeholder'=>'Enter the discount','label'=>false,'name'=>'discount','type'=>'text')); ?>
        
    </div>
    <label class="col-md-2 control-label" for="val_unit_price">Unit Price</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('unit_price', array('id'=>'val_unit_price','class'=>'form-control','label'=>false,
            'name'=>'unit_price','placeholder'=>'Enter the Unit Price','disabled'=>'disabled')); ?>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label" for="val_department">Department</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('department', array('id'=>'val_department','class'=>'form-control','label'=>false,
                                      'name'=>'department','placeholder'=>'Enter the Departmnent Name','readonly')); ?>
        <?PHP echo $this->Form->input('dept_id',array('id'=>'val_department_id','type'=>'hidden')) ?>
    </div>
    <label class="col-md-2 control-label" for="val_account_service">Account Service</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('account_service', array('id'=>'val_account_service','class'=>'form-control',
                                      'label'=>false,'name'=>'account_service','value'=>'Calibration Service','readonly'=>'readonly')); ?>
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
        <?php  echo $this->Form->button('<i class="fa fa-plus fa-fw"></i> add',array('type'=>'button','class'=>'btn btn-sm btn-primary description_add','escape' => false)); ?>
    </div>
</div>
<!--<div class="form-group">
    <label class="col-md-2 control-label" for="val_unit_price">Unit Price</label>
    <div class="col-md-4">
        <?php //echo $this->Form->input('unit_price', array('id'=>'val_unit_price','class'=>'form-control','label'=>false,
            //'name'=>'unit_price','placeholder'=>'Enter the Unit Price')); ?>
    </div>
    <label class="col-md-2 control-label" for="val_discount">Discount</label>
    <div class="col-md-4">
        <?php //echo $this->Form->input('discount', array('id'=>'val_discount','class'=>'form-control',
                                                //'placeholder'=>'Enter the discount','label'=>false,'name'=>'discount','type'=>'text')); ?>
    </div>
</div>-->
<div class="col-sm-3 col-lg-12">
<div class="table-responsive">
<table  class="table table-vcenter table-condensed table-bordered">
    <thead>
        <tr>
            <th class="text-center">S.No</th>
            <th class="text-center">Instrument</th>
            <th class="text-center">Model No</th>
            <th class="text-center">Call Location</th>
            <th class="text-center">Call Type</th>
            <th class="text-center">Validity</th>
            <th class="text-center">Unit Price</th>
            <th class="text-center">Account Service</th>
            <th class="text-center">Total</th>
            <th class="text-center">Action</th>
           
        </tr>
    </thead>
    <tbody class="Instrument_info"> 
        <?PHP 
            if(!empty($quotations_list['Device'])):
                foreach($quotations_list['Device'] as $device):?>
        <tr class="instrument_remove_<?PHP echo $device['id']; ?>">
                    <td class="text-center"><?PHP echo $device['id']; ?></td>
                    <td class="text-center"><?PHP echo $device['Instrument']['name']; ?></td>
                    <td class="text-center"><?PHP echo $device['model_no']; ?></td>
                    <td class="text-center"><?PHP echo $device['call_location']; ?></td>
                    <td class="text-center"><?PHP echo $device['call_type']; ?></td>
                    <td class="text-center"><?PHP echo $device['validity']; ?></td>
                    <td class="text-center"><?PHP echo $device['unit_price']; ?></td>
                    
                    <td class="text-center"><?PHP echo $device['account_service']; ?></td>
                    <td class="text-center"><?PHP echo $device['total']; ?></td>
                   
                    <td class="text-center">
                        <div class="btn-group">
                            <a data-edit="<?PHP echo $device['id']; ?>" class="btn btn-xs btn-default instrument_edit" data-toggle="tooltip" title="Edit">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <a data-delete="<?PHP echo $device['id']; ?>" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger instrument_delete">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </td>
                </tr>
        <?PHP   endforeach;  endif;  ?>
    </tbody>
</table>
</div>
</div>