<div class="form-group">
    <label class="col-md-2 control-label" for="val_remarks">Remarks</label>
    <div class="col-md-4">
        <?php echo $this->Form->textarea('Proforma.remarks', array('id'=>'val_remarks','class'=>'form-control',
                                               'label'=>false,'rows'=>6,'cols'=>30,'readonly'=>'readonly')); ?>
    </div>
    <label class="col-md-2 control-label" for="val_service_type">Service Type <span class="text-danger">*</span></label>
    <div class="col-md-4">
        <?php echo $this->Form->input('Proforma.service_id', array('id'=>'val_service_type','class'=>'form-control','type'=>'select','label'=>false,'readonly'=>'readonly','options'=>$service)); ?>
       
    </div>
</div>
<div class="col-sm-3 col-lg-12">
<div class="table-responsive">
    <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
    <thead>
        <tr>
            <th class="text-center">S.No</th>
            <th class="text-center">Instrument</th>
            <th class="text-center">Brand</th>
            <th class="text-center">Model</th>
            <th class="text-center">Range</th>
            <th class="text-center">Call Location</th>
            <th class="text-center">Validity</th>
            <th class="text-center">Unit Price</th>
            <th class="text-center">Department</th>
            <th class="text-center">Total</th>
           
        </tr>
    </thead>
    <tbody class="proforma_instrument_node"> 
        
    </tbody>
</table>
</div></div>
    
    
