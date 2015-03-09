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
<div class="col-sm-3 col-lg-12">
<div class="table-responsive">
    <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
    <thead>
        <tr>
            <th class="text-center">S.No</th>
            <th class="text-center">Instrument</th>
            <th class="text-center">Brand</th>
            <th class="text-center">Call Location</th>
            <th class="text-center">Validity</th>
            <th class="text-center">Unit Price</th>
            <th class="text-center">Department</th>
            <th class="text-center">Total</th>
           
        </tr>
    </thead>
    <tbody class="sales_Instrument_info"> 
    <?PHP 
       
            if(!empty($deliveryorder['DelDescription'])):
               $i=0;
                foreach($deliveryorder['DelDescription'] as $device):
                ?>
                <tr class="sales_instrument_remove_<?PHP echo $device['Description']['id']; ?>">
                    <td class="text-center"><?PHP echo $i=$i+1; ?></td>
                    <td class="text-center"><?PHP echo $device['Description']['Instrument']['name']; ?></td>
                    <td class="text-center"><?PHP echo $device['Description']['Brand']['brandname']; ?></td>
                    <td class="text-center"><?PHP echo $device['Description']['sales_calllocation']; ?></td>
                    <td class="text-center"><?PHP echo $device['Description']['sales_validity']; ?></td>
                    <td class="text-center"><?PHP echo $device['Description']['sales_unitprice']; ?></td>
                    <td class="text-center"><?PHP echo $device['Description']['Department']['departmentname']; ?></td>
                    <td class="text-center"><?PHP echo $device['Description']['sales_total']; ?></td>
                </tr>
        <?PHP   
            endforeach;
                   
                   else:
                       echo "<tr><td class='text-center'>No Records Found</td></tr>";
                   endif;
        ?>
    </tbody>
</table>
</div></div>