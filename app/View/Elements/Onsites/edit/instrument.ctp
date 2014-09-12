<script>var path='<?PHP echo Router::url('/',true); ?>';</script>
<script type="text/javascript">
    $(function() {
        $("#search_instrument").hide();
        $("#onsite_description").keyup(function()
        {
            var instrument = $(this).val();
            //alert(instrument);
            var customer_id = $('#customer_id').val();
            //alert(customer_id);
            var dataString = 'customer_id=' + customer_id + '&instrument=' + instrument;
            if (customer_id != '')
            {
                $.ajax({
                    type: "POST",
                    url: path_url + "Onsites/instrument_search",
                    data: dataString,
                    cache: false,
                    success: function(html)
                    {
                        //alert(html);
                        $("#search_instrument").html(html).show();
                    }
                });
            }
            return false;
        });
    });


</script>
<div class="form-group">
    <label class="col-md-2 control-label" for="val_description">Instrument</label>
    <div class="col-md-4">
        <?php
        echo $this->Form->input('description', array('id' => 'onsite_description', 'class' => 'form-control', 'placeholder' => 'Enter the Description', 'label' => false,
            'name' => 'description', 'autoComplete' => 'off'));
        ?>
        <?PHP echo $this->Form->input('instrument_id', array('type' => 'hidden')); ?>
        <span class="help-block_login ins_error">Enter the Instrument Name</span>
        <span class="help-block_login inscus_error">Instrument Needs Customer Details</span>
        <div id="search_instrument"></div>
    </div>
    <label class="col-md-2 control-label" for="onsite_quantity">Quantity</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('onsite_quantity', array('id' => 'onsite_quantity', 'class' => 'form-control', 'label' => false, 'name' => 'onsite_quantity')); ?>
     <span class="help-block_login insqn_error">Enter the Instrument Quantity</span>
    </div>
   

</div>

<div class="form-group">
    
    <label class="col-md-2 control-label" for="val_address">Model No</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('model_no', array('id' => 'onsite_model_no', 'class' => 'form-control',
            'placeholder' => 'Enter the Model Number', 'label' => false, 'name' => 'model_no'));
        ?>
         <span class="help-block_login insmo_error">Enter the Instrument Model No</span>
    </div>
   
    <label class="col-md-2 control-label" for="val_validity">Validity (in months) </label>
    <div class="col-md-4">
        <?php echo $this->Form->input('validity', array('id' => 'onsite_validity', 'class' => 'form-control',
            'label' => false, 'name' => 'validity', 'disabled' => 'disabled', 'value' => '12'));
        ?>
    </div>
</div>
<div class="form-group">
    <label class="col-md-2 control-label" for="val_brand">Brand</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('brand', array('id' => 'onsite_brand', 'class' => 'form-control','label' => false, 'name' => 'brand', 'type' => 'select', 'empty' => 'Select Brand'));?>
     <span class="help-block_login insbr_error">Enter the Instrument Brand</span>
    </div>
   
    <label class="col-md-2 control-label" for="val_range">Range</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('range', array('id' => 'onsite_range', 'class' => 'form-control',
            'label' => false, 'name' => 'range', 'type' => 'select', 'empty' => 'Select Range'));
        ?>
        <span class="help-block_login insra_error">Enter the Instrument Range</span>
    </div>
</div>
<div class="form-group">
    <label class="col-md-2 control-label" for="val_call_location">Call Location</label>
    <div class="col-md-4">
        <?php
        echo $this->Form->input('call_location', array('id' => 'onsite_call_location', 'class' => 'form-control',
            'label' => false, 'name' => 'call_location', 'value'=>'Onsite','readonly'=>'readonly'));
        ?>
         <span class="help-block_login inscal_error">Enter the Call Location</span>
    </div>
    <label class="col-md-2 control-label" for="val_call_type">Call Type</label>
    <div class="col-md-4">
        <?php
        echo $this->Form->input('call_type', array('id' => 'onsite_call_type', 'class' => 'form-control', 'label' => false, 'name' => 'call_type',
            'type' => 'select', 'options' => array('singlas' => 'Singlas',
                'no-singlas' => 'Non-Singlas'), 'empty' => 'Select Call Type'));
        ?>
    </div>
</div>

<div class="form-group">

    <label class="col-md-2 control-label" for="val_discount">Discount </label>
    <div class="col-md-4">
    <?php echo $this->Form->input('discount', array('id' => 'onsite_discount', 'class' => 'form-control',
        'placeholder' => 'Enter the discount', 'label' => false, 'name' => 'discount', 'type' => 'text'));
    ?>
    </div>
    <label class="col-md-2 control-label" for="val_unit_price">Unit Price</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('unit_price', array('id' => 'onsite_unit_price', 'class' => 'form-control', 'label' => false,
            'name' => 'unit_price', 'placeholder' => 'Enter the Unit Price'));
        ?>
    </div>
</div>

<div class="form-group">

  
    <label class="col-md-2 control-label" for="val_department">Department</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('department', array('id' => 'onsite_department', 'class' => 'form-control', 'label' => false,
            'name' => 'department', 'placeholder' => 'Enter the Departmnent Name', 'readonly'));
        ?>
<?PHP echo $this->Form->input('dept_id', array('id' => 'val_department_id', 'type' => 'hidden')) ?>
    </div>
     <label class="col-md-2 control-label" for="val_account_service">Account Service</label>
    <div class="col-md-4">
        <?php
        echo $this->Form->input('account_service', array('id' => 'onsite_account_service', 'class' => 'form-control',
            'label' => false, 'name' => 'account_service','value'=>'Calibration Service','readonly'=>'readonly'));
        ?>

    </div>
</div>
<div class="form-group">
    <label class="col-md-2 control-label" for="val_title">Titles</label>
    <div class="col-md-4">
<?php echo $this->Form->input('title', array('id' => 'onsite_title', 'class' => 'form-control', 'label' => false, 'name' => 'title', 'type' => 'select',
    'options' => array('1' => 'title')));
?>
    </div>
</div>
<div class="form-group form-actions">
    <div class="col-md-9 col-md-offset-10 onsite_update_device">
<?php echo $this->Form->button('<i class="fa fa-plus fa-fw"></i> add', array('type' => 'button', 'class' => 'btn btn-sm btn-primary onsite_description_add', 'escape' => false)); ?>
    </div>
</div>
<div class="col-sm-3 col-lg-12">
    <table id="beforedo-datatable_test" class="table table-vcenter table-condensed table-bordered">
        <thead>
            <tr>
                <th class="text-center">S.No</th>
                <th class="text-center">Instrument</th>
                <th class="text-center">Model No</th>
                <th class="text-center">Call Location</th>
                <th class="text-center">Call Type</th>
                <th class="text-center">Validity</th>
                <th class="text-center">Unit Price</th>
                <th class="text-center">Department</th>
                <th class="text-center">Total</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody class="onsite_instrument_node"> 
            <?PHP
            if (!empty($onsite_list['OnsiteInstrument'])):
                foreach ($onsite_list['OnsiteInstrument'] as $device):
                    ?>
                    <tr class="onsite_instrument_remove_<?PHP echo $device['id']; ?>">
                        <td class="text-center"><?PHP echo $device['id']; ?></td>
                        <td class="text-center"><?PHP echo $device['Instrument']['name']; ?></td>
                        <td class="text-center"><?PHP echo $device['model_no']; ?></td>
                        <td class="text-center"><?PHP echo $device['onsite_calllocation']; ?></td>
                        <td class="text-center"><?PHP echo $device['onsite_calltype']; ?></td>
                        <td class="text-center"><?PHP echo $device['onsite_validity']; ?></td>
                        <td class="text-center"><?PHP echo $device['onsite_unitprice']; ?></td>
                        <td class="text-center"><?PHP echo $device['department']; ?></td>
                        <td class="text-center"><?PHP echo $device['onsite_total']; ?></td>

                        <td class="text-center">
                            <div class="btn-group">
                                <a data-edit="<?PHP echo $device['id']; ?>" class="btn btn-xs btn-default onsite_instrument_edit" data-toggle="tooltip" title="Edit">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a data-delete="<?PHP echo $device['id']; ?>" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger onsite_instrument_delete">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
            <?PHP endforeach;
        endif; ?>
        </tbody>
    </table>
</div>