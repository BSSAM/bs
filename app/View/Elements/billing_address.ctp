<div class="form-group">
    <label class="col-md-2 control-label" for="val_customername">S.No</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('billing_id', array('id'=>'billing_id','class'=>'form-control ','label'=>false,'readonly'=>true,'type'=>'text')); ?>
    </div>
    <label class="col-md-2 control-label" for="val_postalcode">Billing Address *</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('billing_address', array('id'=>'billing_address','class'=>'form-control','placeholder'=>'Enter Billing Address','label'=>false)); ?>
        <span class="help-block_login billing_address_error">Enter the Billing Address </span>
    </div>
</div>
<div class="form-group form-actions">
    <div class="col-md-9 col-md-offset-10">
        <?php  echo $this->Form->button('<i class="fa fa-plus fa-fw"></i> add',array('type'=>'button','class'=>'btn btn-sm btn-primary billing_submit','escape' => false)); ?>
    </div>
</div>
    
<table  class="table table-vcenter table-condensed table-bordered">
    <thead>
        <tr>
            <th class="text-center">S.No</th>
            <th class="text-center">Billing Address</th>
            <th class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody class="billing_info_row">
    </tbody>
</table>