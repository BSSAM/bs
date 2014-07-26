<div class="col-sm-3 col-lg-12">
    <label class="col-md-2 control-label" for="val_assigned">Assigned To</label>
        <div class="col-md-4">
            <?php echo $this->Form->input('assigned', array('id'=>'val_assigned_move','class'=>'select-chosen form-control','label'=>false,'type'=>'select','options'=>$assignto,'data-placeholder'=>'Select Assigned To')); ?>
        </div>
</div>
<div class="row">
    <div class="block full" style="border: none;"> </div>
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
            <th class="text-center">Move To Delivery</th>
        </tr>
    </thead>
    <tbody class="readytodeliver_info"> 
        <?PHP if(!empty($ready_to_deliver_items)): ?>
        <?PHP foreach($ready_to_deliver_items as $ready_to_deliver): ?>
         <tr class="move_<?PHP echo $ready_to_deliver['Description']['id']; ?>">
            <td class="text-center"><?PHP echo $ready_to_deliver['Customer']['Customertagname'] ?></td>
            <td class="text-center"><?PHP echo $this->Candd->get_customer_deliver_address($ready_to_deliver['Customer']['id']);?></td>
            <td class="text-center"><?PHP echo $ready_to_deliver['Customer']['phone'] ?></td>
            <td class="text-center"><?PHP echo $ready_to_deliver['Salesorder']['salesorderno'] ?></td>
            <td class="text-center"><?PHP echo $ready_to_deliver['Salesorder']['due_date'] ?></td>
            <td class="text-center"><?PHP echo $this->Candd->get_delivery_order_no($ready_to_deliver['Salesorder']['salesorderno']);?></td>
            <td class="text-center"><?PHP echo $this->Candd->get_delivery_order_date($ready_to_deliver['Salesorder']['salesorderno']);?></td>
            <td class="text-center">Assign</td>
            <td class="text-center"><input type="checkbox" value="<?PHP echo $ready_to_deliver['Description']['id'] ?>" class="description_move_delivery_check" multiple="multiple"/></td>
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