<div class="form-group">
    <label class="col-md-2 control-label" for="val_salesperson">Sales person</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('salesperson', array('id' => 'val_salesperson', 'class' => 'form-control',
            'placeholder' => 'Sales Person Name', 'label' => false, 'name' => 'salesperson'));
        ?>
    </div>
    <label class="col-md-2 control-label" for="val_projectname">Project name</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('projectname', array('id' => 'val_projectname', 'class' => 'form-control',
            'placeholder' => 'Enter the Project Name', 'label' => false, 'name' => 'projectname'));
        ?>
    </div>
</div>
<div class="form-group">
    <label class="col-md-2 control-label" for="val_gsttype">GST type</label>
    <div class="col-md-4">
<?php echo $this->Form->input('gsttype', array('id' => 'val_gsttype', 'class' => 'form-control', 'type' => 'select',
    'label' => false, 'name' => 'gsttype', 'options' => array('Standard' => 'Standard Rated', 'Zero' => 'Zero Rated')));
?>
        <div id="result">
        </div>
    </div>
    <label class="col-md-2 control-label" for="val_gst">GST</label>
    <div class="col-md-4">
<?php echo $this->Form->input('gst', array('id' => 'val_gst', 'class' => 'form-control',
    'placeholder' => 'GST Values', 'label' => false, 'name' => 'gst'));
?>    
    </div>
</div>
<div class="form-group">
    <label class="col-md-2 control-label" for="val_currency">Currency</label>
    <div class="col-md-4">
<?php echo $this->Form->input('currency', array('id' => 'val_currency', 'class' => 'form-control', 'type' => 'select',
    'label' => false, 'name' => 'currency', 'options' => array('Standard' => 'Standard Rated', 'Zero' => 'Zero Rated')));
?>
        <div id="result">
        </div>
    </div>
    <label class="col-md-2 control-label" for="val_currency_value">Currency Value</label>
    <div class="col-md-4">
<?php echo $this->Form->input('currency_value', array('id' => 'val_currency_value', 'class' => 'form-control',
    'placeholder' => 'Currency Values', 'label' => false, 'name' => 'currency_value'));
?>    
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label" for="val_additional_service_charge">Additional Service Charge</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('additionalcharge_id', array('id' => 'val_additional_service_charge', 'class' => 'form-control', 'type' => 'select',
            'label' => false, 'name' => 'additional_service_charge', 'options' => array('Standard' => 'Standard Rated', 'Zero' => 'Zero Rated')));
        ?>
        <div id="result">
        </div>
    </div>
        <label class="col-md-2 control-label" for="val_service_charge">Service Charge</label>
    <div class="col-md-4">
<?php echo $this->Form->input('service_charge', array('id' => 'val_service_charge', 'class' => 'form-control',
    'placeholder' => 'Enter Additional Service Charge Values', 'label' => false, 'name' => 'service_charge'));
?>    
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label" for="val_additional_service_charge">Additional Service Charge</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('additionalcharge_id', array('id' => 'val_additional_service_charge', 'class' => 'form-control', 'type' => 'select',
            'label' => false, 'name' => 'additional_service_charge', 'options' => array('Standard' => 'Standard Rated', 'Zero' => 'Zero Rated')));
        ?>
        <div id="result">
        </div>
    </div>
        <label class="col-md-2 control-label" for="val_service_charge">Service Charge</label>
    <div class="col-md-4">
<?php echo $this->Form->input('service_charge', array('id' => 'val_service_charge', 'class' => 'form-control',
    'placeholder' => 'Enter Additional Service Charge Values', 'label' => false, 'name' => 'service_charge'));
?>    
    </div>
</div>