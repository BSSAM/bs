<!--<div class="col-sm-3 col-lg-12">
    <label class="col-md-2 control-label" for="val_assigned">Assigned To</label>
        <div class="col-md-4">
            <?php //echo $this->Form->input('assigned', array('id'=>'val_assigned_move','class'=>'select-chosen form-control','label'=>false,'type'=>'select','options'=>$assignto,'empty'=>'Please select the person to carry','data-placeholder'=>'Select Assigned To')); ?>
        </div>
</div>
<div class="row">
    <div class="block full" style="border: none;"> </div>
</div>
<div class="col-sm-3 col-lg-12">
<div class="table-responsive">
    <table  class="table table-vcenter table-condensed table-bordered" id="readyto_deliver_candd">
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
            <th class="text-center">Move To Delivery</th>
        </tr>
    </thead>
    <tbody class="readytodeliver_info"> 
        <?PHP //if(!empty($ready_to_deliver_items)): ?>
        <?PHP //foreach($ready_to_deliver_items as $ready_to_deliver): ?>
         <tr class="move_<?PHP //echo $ready_to_deliver['Deliveryorder']['id']; ?>">
            <td class="text-center"><?PHP //echo $ready_to_deliver['Customer']['Customertagname'] ?></td>
            <td class="text-center"><?PHP //echo $ready_to_deliver['Deliveryorder']['delivery_address'] ?></td>
            <td class="text-center"><?PHP //echo $ready_to_deliver['Deliveryorder']['phone'] ?></td>
            <td class="text-center"><?PHP //echo $ready_to_deliver['Salesorder']['salesorderno'] ?></td>
            <td class="text-center"><?PHP //echo $ready_to_deliver['Salesorder']['due_date'] ?></td>
            <td class="text-center"><?PHP //echo $ready_to_deliver['Deliveryorder']['delivery_order_no'] ?></td>
            <td class="text-center"><?PHP //echo $ready_to_deliver['Deliveryorder']['delivery_order_date'] ?></td>
            <td class="text-center">Assign</td>
            <td class="text-center"><input type="checkbox" value="<?PHP //echo $ready_to_deliver['Deliveryorder']['id'] ?>" class="description_move_delivery_check" multiple="multiple"/></td>
        </tr>
        <?PHP //endforeach; ?>
        <?PHP //endif; ?>
    </tbody>
</table>
    <div class="pull-right">
    <?php  //echo $this->Form->button('<i class="gi gi-bus"></i> Move to Deliver',array('type'=>'button','class'=>'btn btn-sm btn-primary move_to_deliver','escape' => false)); ?>
    </div>                                       
</div>
</div>-->
<div class="col-sm-3 col-lg-12">
    <label class="col-md-2 control-label" for="val_assigned">Assigned To</label>
        <div class="col-md-4">
            <?php echo $this->Form->input('assigned', array('id'=>'val_assigned_move','class'=>'select-chosen form-control','label'=>false,'type'=>'select','options'=>$assignto,'empty'=>'Please select the person to carry','data-placeholder'=>'Select Assigned To')); ?>
        </div>
</div>
<div class="row">
    <div class="block full" style="border: none;"> </div>
</div>
<div class="col-sm-3 col-lg-12">
<div class="table-responsive">
    <table  class="table table-vcenter table-condensed table-bordered" id="ready_add_candd">
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
            <th class="text-center">Move To Delivery</th>
        </tr>
    </thead>
    <tbody class="readytodeliver_info"> 
        <?PHP if(!empty($ready_to_deliver_items)): ?>
        <?PHP foreach($ready_to_deliver_items as $ready_to_deliver): ?>
         <tr class="move_<?PHP echo $ready_to_deliver['Deliveryorder']['id']; ?>">
            <td class="text-center"><?PHP echo $ready_to_deliver['Customer']['Customertagname'] ?></td>
            <td class="text-center"><?PHP echo $ready_to_deliver['Deliveryorder']['delivery_address'] ?></td>
            <td class="text-center"><?PHP echo $ready_to_deliver['Deliveryorder']['phone'] ?></td>
            <td class="text-center"><?PHP echo $ready_to_deliver['Salesorder']['salesorderno'] ?></td>
            <td class="text-center"><?PHP echo $ready_to_deliver['Salesorder']['due_date'] ?></td>
            <td class="text-center"><?PHP echo $ready_to_deliver['Deliveryorder']['delivery_order_no'] ?></td>
            <td class="text-center"><?PHP echo $ready_to_deliver['Deliveryorder']['delivery_order_date'] ?></td>
            <td class="text-center"></td>
            <td class="text-center">
            <div class="btn-group">
                <input type="checkbox" value="<?PHP echo $ready_to_deliver['Deliveryorder']['id'] ?>" class="description_move_delivery_check" multiple="multiple"/>
            </div>
            <div class="btn-group">
<!--                <button id="<?php //echo $ready_to_deliver['Deliveryorder']['id'] ?>" onClick="return reply_click_ready_edit(this.id)" class="btn btn-xs btn-default" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></button>-->
                <?php //echo $this->Form->button('<i class="fa fa-pencil"></i>',array('data-toggle'=>'tooltip','title'=>'Edit','class'=>'btn btn-xs btn-default','escape'=>false,'data-id'=>$ready_to_deliver['Deliveryorder']['id'])); ?>
            </div>
            </td>
        </tr>
        <?PHP endforeach; ?>
        <?PHP endif; ?>
    </tbody>
</table>
    <div class="pull-right">
    <?php  echo $this->Form->button('<i class="gi gi-bus"></i> Move to Deliver',array('type'=>'button','class'=>'btn btn-sm btn-primary move_to_deliver','escape' => false)); ?>
    </div>                                       
</div>
</div>
<script type="text/javascript">
function reply_click_ready_edit(clicked_id)
{
    alert(clicked_id);
    $.ajax({
        
        type: 'POST',
        data:"del_id="+clicked_id,
        url: path_url+'Candds/edit_candds/',
        success: function(data)
        {
            var candd_edit_j    =   $.parseJSON(data);
            var deliveryorder = candd_edit_j.Deliveryorder;
            
            var customer = candd_edit_j.Customer;
            console.log(customer);
            console.log(deliveryorder);
            console.log(candd_edit_j);
            
            $('#val_customer_candd').val(customer.Customertagname);
            $('#val_customer_candd').prop('disabled', true);
            $('#candd_customer_id').val(customer.id);
            $('#deliveryorder_id').val(deliveryorder.id);
            $('#col_an_del_date').val(deliveryorder.delivery_order_date);
            $('#branch_id').val(deliveryorder.branch_id);
            $('#val_attn_candd').empty().append('<option value="">Select Contact Person</option>');
            $.each(customer.Contactpersoninfo,function(k,v){
                $('#val_attn_candd').append('<option value="'+v.id+'">'+v.name+'</option>');
            });
        }
        
    });
    return false;
}
</script>