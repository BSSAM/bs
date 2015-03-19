<script type="text/javascript">
    var path_url='<?PHP echo Router::url('/',true); ?>';
    $(function() {
    $('.cust_purchase_order_no').editable(path_url+'/Invoices/update_puchaseid', {
         id        : 'data[Invoice][id]',
         name      : 'data[Invoice][purchaseorder_id]',
         type      : 'text',
         cancel    : 'Cancel',
         submit    : 'Save',
         tooltip   : 'Click to edit the title'
    });
});

$(document).on('click','.pofull-prepare',function(){
       var val_quotationid = $(this).attr('id');
       window.location.href = path_url+'Invoices/approve/'+val_quotationid;
//       if(window.confirm("Are you sure?")){
//           
//       $.ajax({
//            type: 'POST',
//            data:"id="+val_quotationid,
//            url: path_url+'Invoices/approve/',
////            success: function(data)
////            {
////                 window.location.reload();
//////                if(data=='success')
//////                    {
//////                        alert('Client PO is Approved');
//////                        window.location.reload();
//////                    }
//////                    else
//////                        {
//////                             alert('Client PO is Approval Failed due to unknown Cause');
//////                             window.location.reload();
//////                        }
////                
////            }
////            
//        });
//    }
//    else
//    {
//        return false;
//    }
       
   });
  $(function(){
            setTimeout(function(){
                    $('.dataTable1').after("<div class='new_scroll'></div>");
                    $('.dataTable1').appendTo(".new_scroll");
                },1000);
            });
</script>     
<div class="block full">
<div class="table-responsive invoice_tab">

                    <table id="scroll3-datatable"  class="table table-vcenter table-condensed table-bordered dataTable1">
                    <thead>
                        <tr>
                            <th class="text-center">Customer ID</th>
                            <th class="text-center">Customer Name</th>
                            <th class="text-center">Customer Address</th>
                            <th class="text-center">Purchase Order No</th>
                            <th class="text-center">Quotation No</th>
                            <th class="text-center">Salesorder No</th>
                            <th class="text-center">Delivery Order No</th>
                            <th class="text-center">Track ID</th>
                            <th class="text-center">Approve</th>
<!--                            <th class="text-center">View</th>-->

                        </tr>
                    </thead>
                    <tbody class="Instrument_info"> 
                        <?PHP //pr($unapproved_order_list);exit; ?>
                        <?PHP if(!empty($po_lists)):?>
                        <?PHP foreach($po_lists as $list): ?>
                        
                        <?php //pr($list);exit; ?>
                        <?php //if($list['Customer']['invoice_type_id']==1): ?>
                        <tr>
                            <td class="text-center"><?PHP echo $list['Customer']['id']; ?></td>
                            <td class="text-center"><?PHP echo $list['Customer']['customername']; ?></td>
                            <td class="text-center"><?PHP echo $list['Quotation']['address']; ?></td>
                            <td class="text-center"><?PHP echo $list['Quotation']['ref_no']; ?></td>
                            <td class="text-center"><?PHP echo $this->Delivery->find_quotation($list['Quotation']['ref_no']); ?></td>
                            <td class="text-center"><?PHP echo $this->Delivery->find_salesorder($list['Quotation']['ref_no']);?></td>
                            <td class="text-center"><?PHP echo $this->Delivery->find_deliveryorder($list['Quotation']['ref_no']);?></td>
                            <td class="text-center"><?PHP echo $list['Quotation']['track_id']; ?><?PHP //echo $list['Invoice']['purchaseorder_id'] ;?></td>
                            <td class="text-center"><a href="javascript:void(0);" class="pofull-prepare btn btn-alt btn-xs btn-success" id="<?PHP echo $list['Quotation']['ref_no']; ?>"><?PHP echo  'Approve'; ?></a></td>
                        </tr>
                        <?php //endif; ?>
                        <?PHP endforeach; ?>
                       
                        <?PHP endif; ?>
                    </tbody>
                </table>
           
</div></div>