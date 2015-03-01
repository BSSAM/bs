<div class="form-group">
    <label class="col-md-2 control-label" for="del_remarks">Remarks</label>
    <div class="col-md-4">
        <?php echo $this->Form->textarea('Deliveryorder.remarks', array('id'=>'del_remarks','class'=>'form-control',
                                               'label'=>false,'rows'=>6,'cols'=>30)); ?>
    </div>
    <label class="col-md-2 control-label" for="del_service_type">Service Type</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('Deliveryorder.service_id', array('id'=>'del_service_type','class'=>'form-control','type'=>'select','options'=>$service,'label'=>false,'empty'=>'Select Service Type')); ?>
        <div id="result">
        </div>
    </div>
</div>
<div class="col-sm-3 col-lg-12">
    <div class="table-responsive">
<table id="beforedo-datatable" class="table table-vcenter table-condensed table-bordered">
    <thead>
        <tr>
            <th class="text-center">S.No</th>
            <th class="text-center">Instrument</th>
            <th class="text-center">Brand</th>
            <th class="text-center">Model No</th>
            <th class="text-center">Range</th>
            <th class="text-center">Call Location</th>
            <th class="text-center">Validity</th>
<!--            <th class="text-center">Unit Price</th>-->
            <th class="text-center">Department</th>
<!--            <th class="text-center">Total</th>-->
           
        </tr>
    </thead>
    <tbody class="delivery_instrument_node"> 
        
    </tbody>
</table>
    </div>
</div>
