<script>var path='<?PHP echo Router::url('/',true); ?>';</script>
<div class="form-group">
    <label class="col-md-2 control-label" for="val_salesperson">Sales person</label>
    <div class="col-md-4">
        <?php
        echo $this->Form->input('ReqCustomerSpecialNeed.salesperson', array('id' => 'val_salesperson', 'class' => 'form-control',
            'placeholder' => 'Sales Person Name', 'label' => false,'readonly'));
        ?>
    </div>
    <label class="col-md-2 control-label" for="val_projectname">Project name</label>
    <div class="col-md-4">
        <?php
        echo $this->Form->input('ReqCustomerSpecialNeed.projectname', array('id' => 'val_projectname', 'class' => 'form-control',
            'placeholder' => 'Enter the Project Name', 'label' => false));
        ?>
    </div>
</div>
<div class="form-group">
    <label class="col-md-2 control-label" for="val_gsttype">GST type</label>
    <div class="col-md-4">
        <?php
        echo $this->Form->input('ReqCustomerSpecialNeed.gsttype', array('id' => 'val_gsttype', 'class' => 'form-control gsttype select-chosen', 'type' => 'select',
            'label' => false, 'options' => array('Standard' => 'Standard Rated', 'Zero' => 'Zero Rated'),'empty'=>'Select GST Type'));
        ?>
        
    </div>
    <label class="col-md-2 control-label" for="val_gst">GST</label>
    <div class="col-md-4">
<?php
echo $this->Form->input('ReqCustomerSpecialNeed.gst', array('id' => 'val_gst', 'class' => 'form-control',
    'placeholder' => 'GST Values', 'label' => false,'readonly'));
?>    
    </div>
</div>
<div class="form-group">
    <label class="col-md-2 control-label" for="val_currency">Currency</label>
    <div class="col-md-4">
<?php
echo $this->Form->input('ReqCustomerSpecialNeed.currency_id', array('id' => 'val_currency', 'class' => 'form-control country_value select-chosen', 'type' => 'select',
    'label' => false ,'empty'=>'Select Currency Type'));
?>
        
    </div>
    <label class="col-md-2 control-label" for="val_currency_value">Currency Value</label>
    <div class="col-md-4">
<?php
echo $this->Form->input('ReqCustomerSpecialNeed.currency_value', array('id' => 'val_currency_value', 'class' => 'form-control',
    'placeholder' => 'Currency Values', 'label' => false,'type'=>'text','readonly'));
?>    
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label" for="val_additional_service_charge">Additional Service Charge</label>
    <div class="col-md-4">
<?php
echo $this->Form->input('ReqCustomerSpecialNeed.additionalcharge_id', array('id' => 'val_additional_service_charge', 'class' => 'form-control select-chosen', 'type' => 'select',
    'label' => false,'empty'=>'Select Service Charge'));
?>
        
    </div>
    <label class="col-md-2 control-label" for="val_service_charge">Service Charge</label>
    <div class="col-md-4">
<?php
echo $this->Form->input('ReqCustomerSpecialNeed.additional_service_value', array('id' => 'val_service_charge', 'class' => 'form-control',
    'placeholder' => 'Enter Additional Service Charge Values', 'label' => false,'type'=>'text'));
?>    
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label" for="val_remarks">Remarks</label>
    <div class="col-md-4">
        <?php
        echo $this->Form->input('ReqCustomerSpecialNeed.remarks', array('id' => 'val_remarks', 'class' => 'form-control',
            'placeholder' => 'Enter Remarks', 'label' => false,'type'=>'textarea'));
        ?>    
    </div>
    <label class="col-md-2 control-label" for="val_service_id">Service Type</label>
    <div class="col-md-4">
    <?php
    echo $this->Form->input('ReqCustomerSpecialNeed.service_id', array('id' => 'val_service_id', 'class' => 'form-control select-chosen', 'type' => 'select',
        'label' => false, 'options' =>$service,'empty'=>'Select Service Type'));
    ?>
    </div>  
</div>