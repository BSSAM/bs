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

$(document).on('click','.dofull-prepare',function(){
       var val_quotationid = $(this).attr('id');
       if(window.confirm("Are you sure?")){
       $.ajax({
            type: 'POST',
            data:"id="+val_quotationid,
            url: path_url+'Invoices/approve/',
            success: function(data)
            {
                 window.location.reload();
//                if(data=='success')
//                    {
//                        alert('Client PO is Approved');
//                        window.location.reload();
//                    }
//                    else
//                        {
//                             alert('Client PO is Approval Failed due to unknown Cause');
//                             window.location.reload();
//                        }
                
            }
            
        });
    }
    else
    {
        return false;
    }
       
   });

</script>     
<div class="table-responsive">
<div class="col-sm-3 col-lg-12">
                    <table id="fourth-datatable"  class="table table-vcenter table-condensed table-bordered">
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
                        <?PHP if(!empty($prepareinvoice_approved_list)):?>
                        <?PHP foreach($prepareinvoice_approved_list as $list): ?>
                        <?php if($list['Customer']['invoice_type_id']==4): ?>
                        <tr class="invoice_<?PHP echo $list['Invoice']['id']; ?>">
                            <td class="text-center"><?PHP echo $list['Customer']['id']; ?></td>
                            <td class="text-center"><?PHP echo $list['Customer']['customername']; ?></td>
                            <td class="text-center"><?PHP echo $list['Deliveryorder']['customer_address']; ?></td>
                            <td class="text-center"><?PHP echo $list['Deliveryorder']['ref_no']; ?></td>
                            <!-- cust_purchase_order_no --><td class="text-center" id="<?PHP echo $list['Deliveryorder']['quotationno']; ?>"><?PHP echo $list['Deliveryorder']['quotationno']; ?><?PHP //echo $list['Invoice']['purchaseorder_id'] ;?></td>
                            <td class="text-center" id="<?PHP echo $list['Deliveryorder']['salesorder_id']; ?>"><?PHP echo $list['Deliveryorder']['salesorder_id']; ?><?PHP //echo $list['Invoice']['purchaseorder_id'] ;?></td>
                            <td class="text-center" id="<?PHP echo $list['Deliveryorder']['delivery_order_no']; ?>"><?PHP echo $list['Deliveryorder']['delivery_order_no']; ?><?PHP //echo $list['Invoice']['purchaseorder_id'] ;?></td>
                            <td class="text-center" id="<?PHP echo $list['Deliveryorder']['track_id']; ?>"><?PHP echo $list['Deliveryorder']['track_id']; ?><?PHP //echo $list['Invoice']['purchaseorder_id'] ;?></td>
                            <td class="text-center"><a href="javascript:void(0);" class="dofull-prepare btn btn-alt btn-xs btn-success" id="<?PHP echo $list['Deliveryorder']['quotationno']; ?>"><?PHP echo  'Approve'; ?></a></td>
<!--                            <td class="text-center"> <a href="#modal-regular<?PHP //echo $list['Deliveryorder']['id'] ?>" class="btn btn-primary" data-toggle="modal">View</a></td>-->
                            
                        </tr>
                        <?php endif; ?>
                    <div id="modal-regular<?PHP echo $list['Deliveryorder']['id'] ?>" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog pop_up_instrument">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h3 class="modal-title">Instrument for Reference Number  </h3>
                                </div>
                                <div class="modal-body">
                                   <?PHP if(!empty($list['Deliveryorder']['DelDescription'])):?>
                                <?PHP foreach($list['Deliveryorder']['DelDescription'] as $instument):?>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="block">
                                                <div class="block-title">
                                                    <div class="text-center"> 
                                                         <h4><?PHP echo $instument['Description']['Instrument']['name']; ?></h4>
<!--                                                         <div class="text-right"> 
                                                         <h4><?PHP //echo $instument['Description']['Instrument']['id']; ?></h4>
                                                    </div>-->
                                                    </div>
                                                    
                                                    </div>
                                              
                                                   <div class="btn btn-alt btn-sm btn-default">
                                                        <p>
                                                            Quotation Order Number<code><?PHP echo $instument['Salesorder']['salesorderno']; ?></code>
                                                        </p>
                                                        <p>
                                                            Quotation Order Date<code><?PHP echo $instument['Salesorder']['salesorderno']; ?></code>
                                                        </p>
                                                   </div>
                                                <div class="btn btn-alt btn-sm btn-default">
                                                    <p>
                                                        Sales order Number<code><?PHP echo $instument['Salesorder']['salesorderno']; ?></code>
                                                    </p>
                                                     <p>
                                                        Sales order Date<code><?PHP echo $instument['Salesorder']['salesorderno']; ?></code>
                                                    </p>
                                                </div>
                                                <div class="btn btn-alt btn-sm btn-default">
                                                    <p>
                                                        Delivery order Number<code><?PHP echo $instument['Salesorder']['salesorderno']; ?></code>
                                                    </p>
                                                    <p>
                                                        Delivery order Date<code><?PHP echo $instument['Salesorder']['salesorderno']; ?></code>
                                                    </p>
                                                </div>
                                               
                                                
                                            </div>
                                        </div>
                                    </div>
                                <?PHP endforeach; ?>
                                <?PHP endif; ?>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                        <?PHP endforeach; ?>
                        <?PHP endif; ?>
                    </tbody>
                </table>
            </div>
</div>