<!--<div class="col-sm-3 col-lg-12">
<div class="table-responsive">
    <table  class="table table-vcenter table-condensed table-bordered" id="customer-contact-add">
    <thead>
        <tr>
            <th class="text-center">S.No</th>
            <th class="text-center">Customer Name</th>
            <th class="text-center">Customer Address</th>
            <th class="text-center">ATTN</th>
            <th class="text-center">Phone</th>
            <th class="text-center">Salesorder No</th>
            <th class="text-center">Delivery order No</th>
            <th class="text-center">Assign To</th>
            <th class="text-center">Branch</th>
            <th class="text-center">Remarks</th>
            
        </tr>
    </thead>
    <tbody class="deliveries_info"> 
         <?PHP //if(!empty($collection_delivery_data['ReadytodeliverItem'])): ?>
        <?PHP //foreach($collection_delivery_data['ReadytodeliverItem'] as $d): ?>
        <tr>
            <td class="text-center"><?PHP //echo $d['id']; ?></td>
            <td class="text-center"><?PHP //echo $d['Customer']['Customertagname']; ?></td>
            <td class="text-center"><?PHP //echo $d['Deliveryorder']['delivery_address']; ?></td>
            <td class="text-center"><?PHP //echo $d['Customer']['id']; ?></td>
            <td class="text-center"><?PHP //echo $d['Customer']['phone']; ?></td>
            <td class="text-center"><?PHP //echo $d['Salesorder']['salesorderno']; ?></td>
            <td class="text-center"><?PHP //echo $d['Deliveryorder']['delivery_order_no']; ?></td>
            <td class="text-center"><?PHP //echo $d['assign_to']; ?></td>
            <td class="text-center"><?PHP //echo $d['branch']['branchname']; ?></td>
            <td class="text-center"><?PHP //echo $d['Deliveryorder']['remarks']; ?></td>
        </tr> 
        <?PHP //endforeach; ?>
        <?PHP //endif; ?>
    </tbody>
</table>
</div>
</div>-->
<div class="col-sm-3 col-lg-12">
<div class="table-responsive">
<table id="customer-contact-add" class="table table-vcenter table-condensed table-bordered">
    <thead>
        <tr>
            <th class="text-center">S.No</th>
            <th class="text-center">Customer Name</th>
            <th class="text-center">Customer Address</th>
            <th class="text-center">ATTN</th>
            <th class="text-center">Phone</th>
             <th class="text-center">Salesorder No</th>
            <th class="text-center">Delivery order No</th>
            <th class="text-center">Assign To</th>
            <th class="text-center">Branch</th>
            <th class="text-center">Remarks</th>
             <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody class="deliveries_info"> 
        
    </tbody>
</table>
</div>
</div>