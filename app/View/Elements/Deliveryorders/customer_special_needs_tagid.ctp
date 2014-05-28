<div class="form-group">
    <label class="col-md-2 control-label" for="del_remarks">Remarks</label>
    <div class="col-md-4">
        <?php echo $this->Form->textarea('Deliveryorder.remarks', array('id'=>'del_remarks','class'=>'form-control',
                                               'label'=>false,'rows'=>6,'cols'=>30)); ?>
    </div>
    <label class="col-md-2 control-label" for="del_service_type">Service Type</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('Deliveryorder.service_id', array('id'=>'del_service_type','class'=>'form-control','type'=>'select','options'=>$service,'label'=>false)); ?>
        <div id="result">
        </div>
    </div>
</div>