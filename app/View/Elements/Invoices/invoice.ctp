<!--<script>
    $.noConflict();
jQuery( document ).ready(function() {
         setTimeout(function(){
                    jQuery('.dataTable').after("<div class='new_scroll'></div>");
                    jQuery('.dataTable').appendTo(".new_scroll");
                },1000);
            });

</script>-->

<div class="block full">
    <div class="table-responsive invoice_info invoice_tab">
        <table id="scroll1-datatable" class="dataTable table table-vcenter table-condensed table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">Invoice no</th>
                            <th class="text-center">Date</th>
                            <th class="text-center">Branch</th>
                            <th class="text-center">Customer Name</th>
                            <th class="text-center">Customer Address</th>
                            <th class="text-center">Billing Address</th>
                            <th class="text-center">ATTN</th>
                            <th class="text-center">Phone</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Payment Terms</th>
                            <th class="text-center">Sales order No</th>
                            <th class="text-center">Delivery order No</th>
                            <th class="text-center">Our Ref No</th>
                            <th class="text-center">Ref No</th>
                            <th class="text-center">Total Price</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody> 
                        <?PHP if(!empty($invoice_list)): ?>
                        <?PHP foreach($invoice_list as $invoice): ?>
                        <tr <?php if($invoice['Invoice']['is_approved'] == 1):?> class="success" <?php else:?> class="error" <?php endif; ?>>
                            <td class="text-center"><?PHP echo $invoice['Invoice']['invoiceno']; ?></td>
                            <td class="text-center"><?PHP echo $invoice['Invoice']['approved_date'] ?></td>
                            <td class="text-center"><?PHP echo $this->Quotation->branchname_quotation($invoice['Invoice']['quotation_id']); ?></td>
                            <td class="text-center"><?PHP echo $invoice['Invoice']['customername'] ?></td>
                            <td class="text-center"><?PHP echo $this->Quotation->get_customer_reg_address($invoice['Invoice']['quotation_id']);  ?></td>
                            <td class="text-center"><?PHP echo $invoice['Invoice']['regaddress'] ?></td>
                            <td class="text-center"><?PHP echo $invoice['Invoice']['contactpersonname'] ?></td>
                            <td class="text-center"><?PHP echo $this->Quotation->getphone($invoice['Invoice']['quotation_id']); ?></td>
                            <td class="text-center"><?PHP echo $invoice['Invoice']['email'] ?></td>
                            <td class="text-center"><?PHP echo $this->Quotation->paymentterm_quotation($invoice['Invoice']['quotation_id']); ?></td>
                            <td class="text-center"><?PHP echo $invoice['Invoice']['salesorder_id'] ?></td>
                            <td class="text-center"><?PHP echo $invoice['Invoice']['deliveryorder_id'] ?></td>
                            <td class="text-center"><?PHP echo $invoice['Invoice']['quotation_id'] ?></td>
                            <td class="text-center"><?PHP echo $invoice['Invoice']['ref_no'] ?></td>
                            <td class="text-center"><?PHP echo $this->Quotation->quotationtotal_all($invoice['Invoice']['quotation_id']); ?></td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <?php echo $this->Html->link('<i class="fa fa-file-text"></i>',array('action'=>'view',$invoice['Invoice']['invoiceno']),array('data-toggle'=>'tooltip','title'=>'View','class'=>'btn btn-xs btn-default','escape'=>false)); ?>
                                </div>
                                <div class="btn-group">
                                    <?php echo $this->Form->postLink('<i class="gi gi-print"></i>',array('action'=>'pdf',$invoice['Invoice']['invoiceno']),array('data-toggle'=>'tooltip','title'=>'Report','class'=>'btn btn-xs btn-default','escape'=>false)); ?>
                                </div>
                            </td>
                        </tr>
                        <?PHP endforeach; ?>
                        <?PHP endif; ?>
                    </tbody>
                </table>
            </div>
</div>