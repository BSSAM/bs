<script>
    var path='<?PHP echo Router::url('/',true); ?>';
</script>
<script language=Javascript>
      function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
   </script>
<style>
    .sales_instrument_id
	{
		padding:10px; 
		border-bottom:1px #999 dashed;
		font-size:15px; 
		height:50px;
                float: top;
	}
	.sales_instrument_id:hover
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
    $("#val_instrument").keyup(function() 
    { 
        var instrument = $(this).val();
        var customer_id = $('#SalesorderCustomerId').val();
        var dataString = 'customer_id='+ customer_id+'&instrument='+instrument;
        if(customer_id!='')
        {
            $.ajax({
            type: "POST",
            url: path_url+"salesorders/instrument_search",
            data: dataString,
            cache: false,
            success: function(html)
            {
                $("#search_instrument").html(html).show();
            }
            });
        }return false;    
    });
    });


</script>
<div class="form-group">
    <label class="col-md-2 control-label" for="sales_sno">S.No</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('sno', array('id'=>'sales_sno','class'=>'form-control','disabled'=>'disabled','label'=>false,'name'=>'sales_sno')); ?>
    </div>
        
    <label class="col-md-2 control-label" for="sales_quantity">Quantity</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('quantity', array('id'=>'sales_quantity','class'=>'form-control','label'=>false,'name'=>'sales_quantity','onkeypress'=>'return isNumberKey(event)','placeholder'=>'Enter the Quantity ( only Numbers )')); ?>
    </div>
        
</div>
<div class="form-group">
    
    <label class="col-md-2 control-label" for="val_description">Instrument</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('description', 
                array('id'=>'val_instrument','class'=>'form-control','placeholder'=>'Enter the Description','label'=>false,
                    'name'=>'instrument','autoComplete'=>'off')); ?>
        <?PHP echo $this->Form->input('instrument_id',array('type'=>'hidden')); ?>
        <?PHP echo $this->Form->input('device_id',array('type'=>'hidden','id'=>'device_id')); ?>
         <span class="help-block_login ins_error">Enter the Instrument Name</span>
        <div id="search_instrument">
        </div>
    </div>
    <label class="col-md-2 control-label" for="val_model_no">Model No</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('model_no', array('id'=>'val_model_no','class'=>'form-control',
                                               'placeholder'=>'Enter the Model Number','label'=>false,'name'=>'model_no')); ?>
    </div>
        
</div>
<div class="form-group">
    
    <label class="col-md-2 control-label" for="val_brand">Brand</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('brand', array('id'=>'val_brand','class'=>'form-control',
                                                'label'=>false,'name'=>'brand_id','type'=>'select','empty'=>'Select Brand')); ?>
        <span class="help-block_login brand_error">Select the Brand Name</span>
    </div>
    <label class="col-md-2 control-label" for="sales_range">Range</label>
    <div class="col-md-4">
         <?php echo $this->Form->input('range', array('id'=>'sales_range','class'=>'form-control',
                                                'label'=>false,'name'=>'range_id','type'=>'select','empty'=>'Select Range')); ?>
        
    </div>
</div>
<div class="form-group">
    <label class="col-md-2 control-label" for="sales_calllocation">Call Location</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('call_location', array('id'=>'sales_calllocation','class'=>'form-control',
                                                'label'=>false,'name'=>'sales_calllocation','type'=>'select','options'=>array('Inlab'=>'In-Lab',
                                                    'subcontract'=>'Sub-Contract','onsite'=>'On Site'))); ?>
     
    </div>
    <label class="col-md-2 control-label" for="sales_calltype">Call Type</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('call_type', array('id'=>'sales_calltype','class'=>'form-control','label'=>false,'name'=>'sales_calltype',
                                      'placeholder'=>'Enter the Fax Number','type'=>'select','options'=>array('singlas'=>'Singlas',
                                          'no-singlas'=>'Non-Singlas'))); ?>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label" for="sales_validity">Validity (in months) </label>
    <div class="col-md-4">
        <?php echo $this->Form->input('validity', array('id'=>'sales_validity','class'=>'form-control',
                                                'label'=>false,'name'=>'sales_validity','disabled'=>'disabled','value'=>'12')); ?>
      
    </div>
    <label class="col-md-2 control-label" for="sales_unitprice">Unit Price</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('sales_unitprice', array('id'=>'sales_unitprice','class'=>'form-control','label'=>false,
            'name'=>'sales_unitprice','placeholder'=>'Enter the Unit Price','disabled'=>'disabled')); ?>
    </div>
</div>

<div class="form-group">
    
    <label class="col-md-2 control-label" for="sales_discount">Discount </label>
    <div class="col-md-4">
        <?php echo $this->Form->input('sales_discount', array('id'=>'sales_discount','class'=>'form-control',
                                                'placeholder'=>'Enter the discount','label'=>false,'name'=>'sales_discount','type'=>'text')); ?>
        
    </div>
    <label class="col-md-2 control-label" for="val_department">Department</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('department', array('id'=>'val_department','class'=>'form-control','label'=>false,
                                      'name'=>'department','placeholder'=>'Enter the Departmnent Name',)); ?>
        <?PHP echo $this->Form->input('department_id',array('type'=>'hidden','id'=>'sales_department_id')); ?>
    </div>
</div>
<div class="form-group">
    
    <label class="col-md-2 control-label" for="sales_accountservice">Account Service</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('sales_accountservice', array('id'=>'sales_accountservice','class'=>'form-control',
                                      'label'=>false,'name'=>'sales_accountservice','options'=>array('calibration service'=>'Calibration Service'),
                                      'empty'=>'Select Account Service')); ?>
     
    </div>
    <label class="col-md-2 control-label" for="sales_titles">Titles</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('sales_titles', array('id'=>'sales_titles','class'=>'form-control','label'=>false,'name'=>'sales_titles','type'=>'select',
            'options'=>array('1'=>'title'))); ?>
    </div>
</div>
<div class="form-group form-actions">
    <div class="col-md-9 col-md-offset-10 sales_update_device">
        <?php  echo $this->Form->button('<i class="fa fa-plus fa-fw"></i> add',array('type'=>'button','class'=>'btn btn-sm btn-primary sales_description_add','escape' => false)); ?>
    </div>
</div>
<div class="col-sm-3 col-lg-12">
<table  class="table table-vcenter table-condensed table-bordered">
    <thead>
        <tr>
            <th class="text-center">S.No</th>
            <th class="text-center">Instrument</th>
            <th class="text-center">Brand</th>
            <th class="text-center">Call Location</th>
            <th class="text-center">Validity</th>
            <th class="text-center">Unit Price</th>
            <th class="text-center">Department</th>
            <th class="text-center">Total</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody class="sales_Instrument_info"> 
    <?PHP 
       
            if(!empty($sale['Description'])):
              $i = 0;
                foreach($sale['Description'] as $device):
               $i++;
                    //for($i=1;$i<=count($device['Instrument']);$i++):
                ?>
              
                <tr class="sales_instrument_remove_<?PHP echo $device['id']; ?>">
                    <td class="text-center"><?PHP // echo $i; ?></td>
                    <td class="text-center"><?PHP echo $device['Instrument']['name']; ?></td>
<!--                    <td class="text-center"><?PHP //echo $device['Instrument']['brand_id']; ?></td>-->
                    <td class="text-center"><?PHP echo $device['Brand']['brandname']; ?></td>
                    <td class="text-center"><?PHP echo $device['call_location']; ?></td>
                    <td class="text-center"><?PHP echo $device['validity']; ?></td>
                    <td class="text-center"><?PHP echo $device['unit_price']; ?></td>
                    <td class="text-center"><?PHP echo $device['Department']['departmentname']; ?></td>
                     <td class="text-center"><?PHP echo $device['unit_price']; ?></td>
                   
                    <td class="text-center">
                        <div class="btn-group">
                            <a data-edit="<?PHP echo $device['id']; ?>" class="btn btn-xs btn-default sales_instrument_edit" data-toggle="tooltip" title="Edit">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <a data-delete="<?PHP echo $device['id']; ?>" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger sales_instrument_delete">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </td>
                </tr>
        <?PHP   
           // endfor;
            endforeach;
                   endif; 
        ?>
    </tbody>
</table>
</div>

