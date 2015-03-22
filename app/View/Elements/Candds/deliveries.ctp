<script>
     $(function(){
            setTimeout(function(){
                    $('.dataTable6').after("<div class='new_scroll6'></div>");
                    $('.dataTable6').appendTo(".new_scroll6");
                },1000);
            });
    </script>

<div class="col-sm-3 col-lg-12">
<div class="table-responsive">
<table id="second-datatable" class="table table-vcenter table-condensed table-bordered dataTable6">
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
            <th class="text-center">Shipped/Delivered</th>
             <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody class="deliveries_info"> 
        
    </tbody>
</table>
</div>
</div>