<script>var path='<?PHP echo Router::url('/',true); ?>';</script>
<div class="form-group">
    <label class="col-md-2 control-label" for="val_salesperson">Sales person <span class="text-danger">*</span></label>
    <div class="col-md-4">
        <?php
        echo $this->Form->input('Customerspecialneed.salesperson', array('id' => 'val_salesperson', 'class' => 'form-control',
            'placeholder' => 'Sales Person Name', 'label' => false,'readonly'));
        echo $this->Form->input('Customerspecialneed.salespeople_id',array('type'=>'hidden','id'=>'salespeople_id'));
       
        ?>
    </div>
    <label class="col-md-2 control-label" for="val_projectname">Project name</label>
    <div class="col-md-4">
        <?php
        echo $this->Form->input('Customerspecialneed.projectname', array('id' => 'val_projectname', 'class' => 'form-control',
            'placeholder' => 'Enter the Project Name', 'label' => false));
        ?>
    </div>
</div>
<div class="form-group">
    <label class="col-md-2 control-label" for="val_gsttype">GST type <span class="text-danger">*</span></label>
    <div class="col-md-4">
        <?php
        echo $this->Form->input('Customerspecialneed.gsttype', array('id' => 'val_gsttype', 'class' => 'form-control gsttype select-chosen', 'type' => 'select',
            'label' => false, 'options' => array('Standard' => 'Standard Rated', 'Zero' => 'Zero Rated'),'empty'=>'Select GST Type'));
        ?>
        
    </div>
    <label class="col-md-2 control-label" for="val_gst">GST</label>
    <div class="col-md-4">
<?php
echo $this->Form->input('Customerspecialneed.gst', array('id' => 'val_gst', 'class' => 'form-control',
    'placeholder' => 'GST Values', 'label' => false,'readonly'));
?>    
    </div>
</div>
<div class="form-group">
    <label class="col-md-2 control-label" for="val_currency">Currency <span class="text-danger">*</span></label>
    <div class="col-md-4">
<?php
echo $this->Form->input('Customerspecialneed.currency_id', array('id' => 'val_currency', 'class' => 'form-control country_value select-chosen', 'type' => 'select',
    'label' => false ,'options' => $country,'empty'=>'Select Currency Type'));
?>
        
    </div>
    <label class="col-md-2 control-label" for="val_currency_value">Currency Value</label>
    <div class="col-md-4">
<?php
echo $this->Form->input('Customerspecialneed.currency_value', array('id' => 'val_currency_value', 'class' => 'form-control',
    'placeholder' => 'Currency Values', 'label' => false,'type'=>'text','readonly'));
?>    
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label" for="val_additional_service_charge">Additional Service Charge</label>
    <div class="col-md-4">
<?php
echo $this->Form->input('Customerspecialneed.additionalcharge_id', array('id' => 'val_additional_service_charge', 'class' => 'form-control select-chosen', 'type' => 'select',
    'label' => false, 'options' => $additional,'empty'=>'Select Service Charge'));
?>
        
    </div>
    <label class="col-md-2 control-label" for="val_service_charge">Service Charge</label>
    <div class="col-md-4">
<?php
echo $this->Form->input('Customerspecialneed.additional_service_value', array('id' => 'val_service_charge', 'class' => 'form-control',
    'placeholder' => 'Enter Additional Service Charge Values', 'label' => false,'type'=>'text', 'onkeypress'=>'return isNumberKey(event)'));
?>    
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label" for="val_remarks">Remarks</label>
    <div class="col-md-4">
        <?php
        echo $this->Form->input('Customerspecialneed.remarks', array('id' => 'val_remarks', 'class' => 'form-control',
            'placeholder' => 'Enter Remarks', 'label' => false,'type'=>'textarea'));
        ?>    
    </div>
    <label class="col-md-2 control-label" for="val_service_id">Service Type <span class="text-danger">*</span></label>
    <div class="col-md-4">
    <?php
    echo $this->Form->input('Customerspecialneed.service_id', array('id' => 'val_service_id', 'class' => 'form-control select-chosen', 'type' => 'select',
        'label' => false, 'options' =>$service,'empty'=>'Select Service Type'));
    ?>
    </div>  
</div>