<script>var path_url='<?PHP echo Router::url('/',true); ?>';</script>
<script>
$(function() {
    $('.edit_title1').editable(path_url+'/Deliveryorders/update_title1', {
            id        : 'device_id',
            name      : 'title1',
            type      : 'text',
            cancel    : 'Cancel',
            submit    : 'Save',
            tooltip   : 'Click to edit'
       });
    $('.edit_title2').editable(path_url+'/Deliveryorders/update_title2', {
            id        : 'device_id',
            name      : 'title2',
            type      : 'text',
            cancel    : 'Cancel',
            submit    : 'Save',
            tooltip   : 'Click to edit'
       });
    $('.edit_title3').editable(path_url+'/Deliveryorders/update_title3', {
            id        : 'device_id',
            name      : 'title3',
            type      : 'text',
            cancel    : 'Cancel',
            submit    : 'Save',
            tooltip   : 'Click to edit'
       });
    $('.edit_title4').editable(path_url+'/Deliveryorders/update_title4', {
            id        : 'device_id',
            name      : 'title4',
            type      : 'text',
            cancel    : 'Cancel',
            submit    : 'Save',
            tooltip   : 'Click to edit'
       });
    $('.edit_title5').editable(path_url+'/Deliveryorders/update_title5', {
            id        : 'device_id',
            name      : 'title5',
            type      : 'text',
            cancel    : 'Cancel',
            submit    : 'Save',
            tooltip   : 'Click to edit'
       });
    $('.edit_title6').editable(path_url+'/Deliveryorders/update_title6', {
            id        : 'device_id',
            name      : 'title6',
            type      : 'text',
            cancel    : 'Cancel',
            submit    : 'Save',
            tooltip   : 'Click to edit'
       });
    $('.edit_title7').editable(path_url+'/Deliveryorders/update_title7', {
            id        : 'device_id',
            name      : 'title7',
            type      : 'text',
            cancel    : 'Cancel',
            submit    : 'Save',
            tooltip   : 'Click to edit'
       });
    $('.edit_title8').editable(path_url+'/Deliveryorders/update_title8', {
            id        : 'device_id',
            name      : 'title8',
            type      : 'text',
            cancel    : 'Cancel',
            submit    : 'Save',
            tooltip   : 'Click to edit'
       });
});
</script>
<div class="form-group">
    <label class="col-md-2 control-label" for="del_remarks">Remarks</label>
    <div class="col-md-4">
        <?php echo $this->Form->textarea('Deliveryorder.remarks', array('id'=>'del_remarks','class'=>'form-control',
                                               'label'=>false,'rows'=>6,'cols'=>30)); ?>
    </div>
    <label class="col-md-2 control-label" for="del_service_type">Service Type <span class="text-danger">*</span></label>
    <div class="col-md-4">
        <?php echo $this->Form->input('Deliveryorder.service_id', array('id'=>'del_service_type','class'=>'form-control','type'=>'select','options'=>$service,'label'=>false,'empty'=>'Select Service Type')); ?>
        <div id="result">
        </div>
    </div>
</div> 
<?PHP 
        //pr($deliveryorder['DelDescription']);exit;
        $device1 = 0;
        $device2 = 0;
        $device3 = 0;
        $device4 = 0;
        $device5 = 0;
        $device6 = 0;
        $device7 = 0;
        $device8 = 0;
            if(!empty($deliveryorder['DelDescription'])):
                foreach($deliveryorder['DelDescription'] as $device):
                    if($device['title1_val']!=''): $device1 +=1; endif;
                    if($device['title2_val']!=''): $device2 +=1; endif;
                    if($device['title3_val']!=''): $device3 +=1; endif;
                    if($device['title4_val']!=''): $device4 +=1; endif;
                    if($device['title5_val']!=''): $device5 +=1; endif;
                    if($device['title6_val']!=''): $device6 +=1; endif;
                    if($device['title7_val']!=''): $device7 +=1; endif;
                    if($device['title8_val']!=''): $device8 +=1; endif;
                endforeach;
            endif;
        ?>
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
            <?php if($device1 != 0): ?> 
            <th class="text-center edit_title1"><?php echo $titles[0]; ?></th>
            <?php endif; ?>
             <?php if($device2 != 0): ?> 
            <th class="text-center edit_title2"><?php echo $titles[1]; ?></th>
            <?php endif; ?>
             <?php if($device3 != 0): ?> 
            <th class="text-center edit_title3"><?php echo $titles[2]; ?></th>
            <?php endif; ?>
             <?php if($device4 != 0): ?> 
            <th class="text-center edit_title4"><?php echo $titles[3]; ?></th>
            <?php endif; ?>
             <?php if($device5 != 0): ?> 
            <th class="text-center edit_title5"><?php echo $titles[4]; ?></th>
            <?php endif; ?>
             <?php if($device6 != 0): ?> 
            <th class="text-center edit_title6"><?php echo $titles[5]; ?></th>
            <?php endif; ?>
             <?php if($device7 != 0): ?> 
            <th class="text-center edit_title7"><?php echo $titles[6]; ?></th>
            <?php endif; ?>
             <?php if($device8 != 0): ?> 
            <th class="text-center edit_title8"><?php echo $titles[7]; ?></th>
            <?php endif; ?>
             
        </tr>
    </thead>
    <tbody class="sales_Instrument_info"> 
    <?PHP 
        //pr($deliveryorder['DelDescription']);exit;
            if(!empty($deliveryorder['DelDescription'])):
                foreach($deliveryorder['DelDescription'] as $device):
                    if($device['title1_val']!=''): $device1 +=1; endif;
                    if($device['title2_val']!=''): $device2 +=1; endif;
                    if($device['title3_val']!=''): $device3 +=1; endif;
                    if($device['title4_val']!=''): $device4 +=1; endif;
                    if($device['title5_val']!=''): $device5 +=1; endif;
                    if($device['title6_val']!=''): $device6 +=1; endif;
                    if($device['title7_val']!=''): $device7 +=1; endif;
                    if($device['title8_val']!=''): $device8 +=1; endif;
                ?>
                <tr class="sales_instrument_remove_<?PHP echo $device['id']; ?>">
                    <td class="text-center"><?PHP echo $device['order_by']; ?></td>
                    <td class="text-center"><?PHP echo $device['Instrument']['name']; ?></td>
                    <td class="text-center"><?PHP echo $device['Brand']['brandname']; ?></td>
                    <td class="text-center"><?PHP echo $device['model_no']; ?></td>
                    <td class="text-center"><?PHP echo $device['Range']['range_name']; ?></td>
                    <td class="text-center"><?PHP echo $device['delivery_calllocation']; ?></td>
                    <td class="text-center"><?PHP echo $device['delivery_calltype']; ?></td>
<!--                    <td class="text-center"><?PHP //echo $device['delivery_unitprice']; ?></td>-->
                    <td class="text-center"><?PHP echo $device['Department']['departmentname']; ?></td>
<!--                    <td class="text-center"><?PHP //echo $device['delivery_total']; ?></td>-->
                    <?php if($device1 != 0): ?> 
                    <td class="text-center edit_title1" id="<?PHP echo $device['id']; ?>"><?PHP echo $device['title1_val']; ?></td>
                    <?php endif; ?>
                    <?php if($device2 != 0): ?> 
                    <td class="text-center edit_title2" id="<?PHP echo $device['id']; ?>"><?PHP echo $device['title2_val']; ?></td>
                    <?php endif; ?>
                    <?php if($device3 != 0): ?> 
                    <td class="text-center edit_title3" id="<?PHP echo $device['id']; ?>"><?PHP echo $device['title3_val']; ?></td>
                    <?php endif; ?>
                    <?php if($device4 != 0): ?> 
                    <td class="text-center edit_title4" id="<?PHP echo $device['id']; ?>"><?PHP echo $device['title4_val']; ?></td>
                    <?php endif; ?>
                    <?php if($device5 != 0): ?> 
                    <td class="text-center edit_title5" id="<?PHP echo $device['id']; ?>"><?PHP echo $device['title5_val']; ?></td>
                    <?php endif; ?>
                    <?php if($device6 != 0): ?> 
                    <td class="text-center edit_title6" id="<?PHP echo $device['id']; ?>"><?PHP echo $device['title6_val']; ?></td>
                    <?php endif; ?>
                    <?php if($device7 != 0): ?> 
                    <td class="text-center edit_title7" id="<?PHP echo $device['id']; ?>"><?PHP echo $device['title7_val']; ?></td>
                    <?php endif; ?>
                    <?php if($device8 != 0): ?> 
                    <td class="text-center edit_title8" id="<?PHP echo $device['id']; ?>"><?PHP echo $device['title8_val']; ?></td>
                    <?php endif; ?>
                </tr>
        <?PHP      endforeach;
                   else:
                       echo "<tr><td class='text-center'>No Records Found</td></tr>";
                   endif;
        ?>
    </tbody>
</table>
</div>
</div>