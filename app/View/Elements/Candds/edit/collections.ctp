<!--<div class="col-sm-3 col-lg-12">
<div class="table-responsive">
    <table  class="table table-vcenter table-condensed table-bordered" id="engineer-datatable">
    <thead>
        <tr>
            <th class="text-center">S.No</th>
            <th class="text-center">Customer Name</th>
            <th class="text-center">Customer Address</th>
            <th class="text-center">ATTN</th>
            <th class="text-center">Phone</th>
             <th class="text-center">Assigned To</th>
            <th class="text-center">Branch</th>
            <th class="text-center">Remarks</th>
            <th class="text-center">Request By</th>
        </tr>
    </thead>
    <tbody class="collections_info">
        <?PHP //if(!empty($collection_delivery_data['Candd'])): ?>
        <?PHP //foreach($collection_delivery_data['Candd'] as $cd): ?>
        <tr>
            <td class="text-center"><?PHP //echo $cd['id']; ?></td>
            <td class="text-center"><?PHP //echo $cd['customername']; ?></td>
            <td class="text-center"><?PHP //echo $cd['customer_address']; ?></td>
            <td class="text-center"><?PHP //echo $cd['Contactpersoninfo']['name']; ?></td>
            <td class="text-center"><?PHP //echo $cd['Contactpersoninfo']['phone']; ?></td>
            <td class="text-center"><?PHP //echo $cd['assign']['assignedto']; ?></td>
            <td class="text-center"><?PHP //echo $collection_delivery_data['branch']['branchname']; ?></td>
            <td class="text-center"><?PHP //echo $cd['remarks']; ?></td>
            <td class="text-center">Request By</td>
        </tr>
        <?PHP //endforeach; ?>
        <?PHP //endif; ?>
    </tbody>
</table>
</div>
</div>-->
<script>
     $(function(){
            setTimeout(function(){
                    $('.dataTable2').after("<div class='new_scroll2'></div>");
                    $('.dataTable2').appendTo(".new_scroll2");
                },1000);
            });
    </script>
<div class="col-sm-3 col-lg-12">
<div class="table-responsive">
    <table id="one-datatable" class="table table-vcenter table-condensed table-bordered dataTable2" >
    <thead>
        <tr>
            <th class="text-center">S.No</th>
            <th class="text-center">Customer Name</th>
            <th class="text-center">Customer Address</th>
            <th class="text-center">ATTN</th>
            <th class="text-center">Phone</th>
             <th class="text-center">Assigned To</th>
            <th class="text-center">Branch</th>
            <th class="text-center">Remarks</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody class="collections_info"> 
    </tbody>
</table>
</div>
</div>