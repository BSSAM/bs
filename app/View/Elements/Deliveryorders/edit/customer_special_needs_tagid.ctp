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
<table  class="table table-vcenter table-condensed table-bordered">
    <thead>
        <h4 class="sub-header text-left"><strong>Instrument List</strong></h4>
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
        //pr($deliveryorder['DelDescription']);exit;
            if(!empty($deliveryorder['DelDescription'])):
                foreach($deliveryorder['DelDescription'] as $device):
                ?>
                <tr class="sales_instrument_remove_<?PHP echo $device['id']; ?>">
                    <td class="text-center"><?PHP echo $device['id']; ?></td>
                    <td class="text-center"><?PHP echo $device['Instrument']['name']; ?></td>
                    <td class="text-center"><?PHP echo $device['Brand']['brandname']; ?></td>
                    <td class="text-center"><?PHP echo $device['delivery_calllocation']; ?></td>
                    <td class="text-center"><?PHP echo $device['delivery_calltype']; ?></td>
                    <td class="text-center"><?PHP echo $device['delivery_unitprice']; ?></td>
                    <td class="text-center"><?PHP echo $device['Department']['departmentname']; ?></td>
                    <td class="text-center"><?PHP echo $device['delivery_total']; ?></td>
                </tr>
        <?PHP      endforeach;
                   else:
                       echo "<tr><td class='text-center'>No Records Found</td></tr>";
                   endif;
        ?>
    </tbody>
</table>