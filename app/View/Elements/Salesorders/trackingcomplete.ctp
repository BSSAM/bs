<script>

/*$(function(){
    setTimeout(function(){
        $('.newscrol').after("<div class='new_scroll1'></div>");
        $('.newscrol').appendTo(".new_scroll1");
    },1000);
});*/

     $(function(){
           setTimeout(function(){
                   $('.dataTable2').after("<div class='new_scroll2'></div>");
                   $('.dataTable2').appendTo(".new_scroll2");
               },1000);
           });
</script>
<div class="block full">
<div class="table-responsive">

        <table id="scroll2-datatable" class="table table-vcenter newscrol dataTable2 table-condensed table-bordered">
            <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Salesorder No</th>
                    <th class="text-center">Due Date</th>
                    <th class="text-center">No of Delivery orders</th>
                    <th class="text-center">Deliveryorder No</th>
                    <th class="text-center">Deliveryorder Date</th>
                    <th class="text-center">Invoice No</th>
                    <th class="text-center">Invoice Date</th>
                    <th class="text-center">Quotation No</th>
                    <th class="text-center">Ref No</th>
                    <th class="text-center">Job Status</th>
                    <th class="text-center">Remarks</th>
                    <th class="text-center">Responsible Person</th>
                    <th class="text-center">Customer Name</th>
                    <th class="text-center">Salesperson Name</th>
                    <th class="text-center">Branch Name</th>
                </tr>
            </thead>
            <tbody>
                <?PHP 
                
                if(!empty($completed_list)): ?>
                <?PHP foreach($completed_list as $k=>$track): ?>
                <tr>
                    <td class="text-center"><?PHP echo $k+1; ?></td>
                    <td class="text-center"><?PHP echo $track['Salesorder']['id']; ?></td>
                    <td class="text-center"><?PHP echo $track['Salesorder']['due_date']; ?></td>
                    <td class="text-center"><?PHP echo $this->Salesorder->find_deliveryorder_nos($track['Salesorder']['id']); ?></td>
                    <td class="text-center"><?PHP echo $this->Salesorder->find_deliveryorder_no($track['Salesorder']['id']); ?></td>
                    <td class="text-center"><?PHP echo $this->Salesorder->find_deliveryorder_date($track['Salesorder']['id']); ?></td>
                    <td class="text-center"><?PHP echo $this->Salesorder->find_invoice_no($track['Salesorder']['id']); ?></td>
                    <td class="text-center"><?PHP echo $this->Salesorder->find_invoice_date($track['Salesorder']['id']); ?></td>
                    <td class="text-center"><?PHP echo $track['Salesorder']['quotationno']; ?></td>
                    <td class="text-center"><?PHP echo $track['Salesorder']['ref_no']; ?></td>
                    <td class="text-center"><?PHP if($track['Salesorder']['is_jobcompleted']==1){ echo "Complete"; }else{ echo "Incomplete"; }; ?></td>
                    <td class="text-center"><?PHP echo $track['Salesorder']['remarks']; ?></td>
                    <td class="text-center">-</td>
                    <td class="text-center"><?PHP echo $this->Salesorder->find_sales_order_customer($track['Salesorder']['id']); ?></td>
                    <td class="text-center"><?PHP echo $this->Salesorder->salesperson($track['Salesorder']['attn']); ?></td>
                    <td class="text-center"><?PHP echo $track['branch']['branchname']; ?></td>
                </tr>
                <?PHP 
                endforeach; ?>
                <?PHP else: ?>
                <?PHP echo "No Records Found"; ?>
                <?PHP endif; ?>
             
            </tbody>
        </table>

</div>
       
</div>        
        