<div class="form-group">
    <label class="col-md-2 control-label" for="val_remarks">Remarks</label>
    <div class="col-md-4">
        <?php echo $this->Form->textarea('Salesorder.Remarks', array('id'=>'val_remarks','class'=>'form-control',
                                               'label'=>false,'rows'=>6,'cols'=>30)); ?>
    </div>
    <label class="col-md-2 control-label" for="val_service_type">Service Type</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('Salesorder.service_type', array('id'=>'val_service_type','class'=>'form-control','type'=>'select','options'=>$service,'label'=>false)); ?>
        <div id="result">
        </div>
    </div>
</div>