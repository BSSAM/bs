<script>
var path='<?PHP echo Router::url('/',true); ?>';
</script>
<div class="form-group">
    <label class="col-md-2 control-label" for="pur_salesperson">Sales person</label>
    <div class="col-md-4">
        <?php
        echo $this->Form->input('PurchaseCustomerspecialneed.salesperson', array('id' => 'pur_salesperson', 'class' => 'form-control',
            'placeholder' => 'Sales Person Name', 'label' => false));
        echo $this->Form->input('PurchaseCustomerspecialneed.salespeople_id',array('type'=>'hidden','id'=>'salespeople_id'));
       
        ?>
    </div>
    <label class="col-md-2 control-label" for="pur_currency">Currency</label>
    <div class="col-md-4">
        <?php
        echo $this->Form->input('PurchaseCustomerspecialneed.currency_id', array('id' => 'pur_currency', 'class' => 'form-control country_value select-chosen', 'type' => 'select',
            'label' => false, 'options' => $country));
        ?>
        <div id="result">
        </div>
    </div>
   
</div>
<div class="form-group">
    <label class="col-md-2 control-label" for="pur_additional_service_charge">Additional Service Charge</label>
    <div class="col-md-4">
        <?php
        echo $this->Form->input('PurchaseCustomerspecialneed.additionalcharge_id', array('id' => 'pur_additional_service_charge', 'class' => 'form-control select-chosen', 'type' => 'select',
            'label' => false, 'options' => $additional));
        ?>
        <div id="result">
        </div>
    </div>
    <label class="col-md-2 control-label" for="pur_service_charge">Service Charge</label>
    <div class="col-md-4">
        <?php
        echo $this->Form->input('PurchaseCustomerspecialneed.additional_service_value', array('id' => 'pur_service_charge', 'class' => 'form-control',
            'placeholder' => 'Enter Additional Service Charge Values', 'label' => false));
        ?>    
    </div>
</div>
<div class="form-group">
    <label class="col-md-2 control-label" for="pur_remarks">Remarks</label>
    <div class="col-md-4">
        <?php
        echo $this->Form->input('PurchaseCustomerspecialneed.remarks', array('id' => 'pur_remarks', 'class' => 'form-control',
            'placeholder' => 'Enter Remarks', 'label' => false,'type'=>'textarea'));
        ?>    
    </div>
    <label class="col-md-2 control-label" for="pur_service_id">Service Type</label>
    <div class="col-md-4">
<?php
echo $this->Form->input('PurchaseCustomerspecialneed.service_id', array('id' => 'pur_service_id', 'class' => 'form-control select-chosen', 'type' => 'select',
    'label' => false, 'options' =>$service));
?>
        <div id="result">
        </div>
    </div>  

</div>