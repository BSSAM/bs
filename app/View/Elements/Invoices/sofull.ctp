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

$(document).on('click','.sofull-prepare',function(){
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
                    <table id="engineer-datatable"  class="table table-vcenter table-condensed table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">Salesorder No</th>
                            <th class="text-center">Salesorder Date</th>
                            <th class="text-center">Due Date</th>
                            <th class="text-center">Our Ref No</th>
                            <th class="text-center">Ref No</th>
                            <th class="text-center">Customer Name</th>
                            <th class="text-center">Customer Address</th>
                            <th class="text-center">Delivery Order No</th>
                            <th class="text-center">Approve</th>
                        </tr>
                    </thead>
                    <tbody class="Instrument_info"> 
                        <?PHP //pr($unapproved_order_list);exit; ?>
                        <?PHP if(!empty($salesorder_list)):?>
                        <?PHP foreach($salesorder_list as $list): ?>
                        <?php if($list['Customer']['invoice_type_id']==3): ?>
                        <tr >
                            <td class="text-center"><?PHP echo $list['Salesorder']['id']; ?></td>
                            <td class="text-center"><?PHP echo $list['Salesorder']['in_date']; ?></td>
                            <td class="text-center"><?PHP echo $list['Salesorder']['due_date']; ?></td>
                            <td class="text-center"><?PHP echo $list['Customer']['quotationno']; ?></td>
                            <td class="text-center"><?PHP echo $list['Salesorder']['ref_no']; ?></td>
                            <td class="text-center"><?PHP echo $this->Delivery->find_customer($list['Customer']['id']); ?></td>
                            <td class="text-center"><?PHP echo $list['Salesorder']['address']; ?></td>
                            <td class="text-center"><?php foreach($list['Deliveryorder'] as $list1): $list_del_no[] = $list1['delivery_order_no']; endforeach; echo implode(", ", $list_del_no);  $list_del_no ='';?></td>
                            <td class="text-center"><a href="javascript:void(0);" class="sofull-prepare btn btn-alt btn-xs btn-success" id="<?PHP echo $list['Salesorder']['id']; ?>"><?PHP echo  'Approve'; ?></a></td>
<!--                            <td class="text-center"> <a href="#modal-regular<?PHP //echo $list['Deliveryorder']['id'] ?>" class="btn btn-primary" data-toggle="modal">View</a></td>-->
                            
                        </tr>
                        <?php endif; ?>

                        <?PHP endforeach; ?>
                        <?PHP endif; ?>
                    </tbody>
                </table>
            </div>
</div>