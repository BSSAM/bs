<div class="col-sm-3 col-lg-12">
    <label class="col-md-2 control-label" for="val_assigned">Assigned To</label>
        <div class="col-md-4">
            <?php echo $this->Form->input('assigned', array('id'=>'val_assigned','class'=>'form-control','label'=>false,'type'=>'select','options'=>'','data-placeholder'=>'Select Assigned To')); ?>
        </div>
</div>
<div class="row">
    <div class="block full" style="border: none;">
        
    </div>
</div>


<div class="col-sm-3 col-lg-12">
<div class="table-responsive">
<table  class="table table-vcenter table-condensed table-bordered">
    <thead>
        <tr>
            <th class="text-center">Customer Name</th>
            <th class="text-center">Address of Location</th>
            <th class="text-center">Phone</th>
            <th class="text-center">Sales Order No</th>
            <th class="text-center">Due Date</th>
            <th class="text-center">Delivery Order No</th>
            <th class="text-center">Delivery Order Date</th>
            <th class="text-center">Assigned To</th>
            <th class="text-center">Action</th>
            <th class="text-center">Move To Delivery</th>
        </tr>
    </thead>
    <tbody class="readytodeliver_info"> 
        <tr>
            <td class="text-center"></td>
            <td class="text-center"></td>
            <td class="text-center"></td>
            <td class="text-center"></td>
            <td class="text-center"></td>
            <td class="text-center"></td>
            <td class="text-center"></td>
            <td class="text-center"></td>
            <td class="text-center"></td>
            <td class="text-center"></td>
        </tr>
    </tbody>
</table>
</div>
</div>