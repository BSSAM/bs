<div class="form-group">
    
    <label class="col-md-2 control-label" for="val_quotationno">Quotation No</label>
    <div class="col-md-4">
                                            <?php echo $this->Form->input('quotationno', array('id'=>'val_quotationno','class'=>'form-control','disabled'=>'disabled','label'=>false,'name'=>'quotationno','value'=> $quotationno)); ?>
    </div>
        
    <label class="col-md-2 control-label" for="val_branchname">Branch</label>
    <div class="col-md-4">
                                           <?php echo $this->Form->input('branchname', array('id'=>'val_branchname','class'=>'form-control','disabled'=>'disabled','label'=>false,'name'=>'branchname')); ?>
    </div>
        
</div>
    
<div class="form-group">
    
    <label class="col-md-2 control-label" for="val_customer">Customer Name</label>
    <div class="col-md-4">
                                            <?php echo $this->Form->input('customer', array('id'=>'val_customer','class'=>'form-control',
                                                'placeholder'=>'Enter the Customer Name','label'=>false,'name'=>'customer','autoComplete'=>'off')); ?>
        <div id="result">
        </div>
    </div>
    <label class="col-md-2 control-label" for="val_address">Customer Address</label>
    <div class="col-md-4">
                                           <?php echo $this->Form->textarea('address', array('id'=>'val_address','class'=>'form-control',
                                               'placeholder'=>'Enter the Customer Address','label'=>false,'name'=>'address','rows'=>6,'cols'=>30)); ?>
    </div>
        
</div>