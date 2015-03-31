<div class="form-group">
    <label class="col-md-2 control-label" for="deli_customer">Customer Name <span class="text-danger">*</span></label>
    <div class="col-md-4">
        <?php echo $this->Form->input('customer_name', array('id'=>'deli_customer','class'=>'form-control','readonly'=>'readonly','label'=>false,'name'=>'deli_customer_name','value'=>$deliveryorder['Customer']['customername'])); ?>
    </div>
        <label class="col-md-2 control-label" for="del_address_id">Delivery Addresses List</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('Deliveryorder.delivery_address', array('id'=>'del_address_id','class'=>'form-control',
            'label'=>false,'type'=>'select','options'=>array($deliveryorder['Deliveryorder']['delivery_address']=>$deliveryorder['Deliveryorder']['delivery_address']),'selected'=>'selected')); ?>
    </div>
</div>
<div class="form-group">
    <label class="col-md-2 control-label" for="del_dueamount">Due Amount</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('Deliveryorder.due_amount', 
                array('id'=>'del_dueamount','class'=>'form-control','label'=>false,'type'=>'text','readonly'=>'readonly')); ?>
    </div>
    <label class="col-md-2 control-label" for="del_customer_address">Customer Address</label>
    <div class="col-md-4">
        <?php echo $this->Form->textarea('Deliveryorder.customer_address', array('id'=>'del_customer_address','class'=>'form-control',
                                               'label'=>false,'rows'=>6,'cols'=>30)); ?>
    </div>
</div>
<div class="form-group">
    <label class="col-md-2 control-label" for="del_email">Email</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('Deliveryorder.email', array('id'=>'del_email','class'=>'form-control',
                                                'label'=>false,'readonly'=>'readonly')); ?>
    </div>
    <label class="col-md-2 control-label" for="del_attn">ATTN <span class="text-danger">*</span></label>
    <div class="col-md-4">
        <?php echo $this->Form->input('Deliveryorder.attn', array('id'=>'del_attn',
            'class'=>'form-control','label'=>false,'type'=>'select','options'=>array($deliveryorder['Deliveryorder']['attn']=>$deliveryorder['Deliveryorder']['attn']),'selected'=>'selected')); ?>
    </div>
</div>
<div class="form-group">
    
    <label class="col-md-2 control-label" for="del_phone">Phone <span class="text-danger">*</span></label>
    <div class="col-md-4">
        <?php echo $this->Form->input('Deliveryorder.phone', array('id'=>'del_phone','class'=>'form-control',
                                                'label'=>false,'readonly'=>'readonly')); ?>
       
    </div>
    <label class="col-md-2 control-label" for="del_fax">Fax</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('Deliveryorder.fax', array('id'=>'del_fax','class'=>'form-control','label'=>false,'readonly'=>'readonly')); ?>
    </div>
</div>
<div class="form-group">
    <label class="col-md-2 control-label" for="del_order_no">Delivery Order No</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('Deliveryorder.delivery_order_no', array('id'=>'del_order_no','class'=>'form-control','label'=>false,'value'=> $deliveryorder['Deliveryorder']['delivery_order_no'],'readonly'=>'readonly')); ?>
    </div>
    <label class="col-md-2 control-label" for="del_order_date">Delivery Order Date</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('Deliveryorder.delivery_order_date', array('id'=>'del_order_date','class'=>'form-control input-datepicker-close','data-date-format'=>'yyyy-mm-dd','label'=>false)); ?>
    </div>
</div>
<div class="form-group">
    <label class="col-md-2 control-label" for="val_ref_no">Your Reference No <span class="text-danger">*</span></label>
    <div class="col-md-4">
        <?php echo $this->Form->input('Deliveryorder.your_reference_no', array('id'=>'val_ref_no','class'=>'form-control','label'=>false,'readonly'=>'readonly')); ?>
    </div>
    <label class="col-md-2 control-label" for="val_our_ref_no">Our Reference Number</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('Deliveryorder.our_reference_no', array('id'=>'val_our_ref_no','class'=>'form-control','label'=>false,'readonly'=>'readonly')); ?>
    </div>
    
</div>


