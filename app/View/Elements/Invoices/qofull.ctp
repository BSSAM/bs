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

$(document).on('click','.qofull-prepare',function(){
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

</script>      
<div class="table-responsive">
<div class="col-sm-3 col-lg-12">
                    <table id="scroll5-datatable"  class="table table-vcenter table-condensed table-bordered">
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
                        <?PHP if(!empty($quotation_lists)):?>
                        <?PHP foreach($quotation_lists as $list): ?>
                        <?php if($list['Customer']['invoice_type_id']==2): ?>
                        <tr class="invoice_<?PHP echo $list['Invoice']['id']; ?>">
                            <td class="text-center"><?PHP echo $list['Customer']['id']; ?></td>
                            <td class="text-center"><?PHP echo $list['Customer']['customername']; ?></td>
                            <td class="text-center"><?PHP echo $list['Quotation']['address']; ?></td>
                            <td class="text-center"><?PHP echo $list['Quotation']['ref_no']; ?></td>
                            <td class="text-center"><?PHP echo $list['Quotation']['quotationno']; ?><?PHP //echo $list['Invoice']['purchaseorder_id'] ;?></td>
                            <td class="text-center"><?PHP echo $list['Quotation']['salesorder_id']; ?><?PHP //echo $list['Invoice']['purchaseorder_id'] ;?></td>
                            <td class="text-center"><?PHP echo $list['Quotation']['delivery_order_no']; ?><?PHP //echo $list['Invoice']['purchaseorder_id'] ;?></td>
                            <td class="text-center"><?PHP echo $list['Quotation']['track_id']; ?><?PHP //echo $list['Invoice']['purchaseorder_id'] ;?></td>
                            <td class="text-center"><a href="javascript:void(0);" class="qofull-prepare btn btn-alt btn-xs btn-success" id="<?PHP echo $list['Quotation']['quotationno']; ?>"><?PHP echo  'Approve'; ?></a></td>
<!--                            <td class="text-center"> <a href="#modal-regular<?PHP //echo $list['Deliveryorder']['id'] ?>" class="btn btn-primary" data-toggle="modal">View</a></td>-->
                            
                        </tr>
                        <?php endif; ?>

                        <?PHP endforeach; ?>
                        <?PHP endif; ?>
                    </tbody>
                </table>
            </div>
</div>