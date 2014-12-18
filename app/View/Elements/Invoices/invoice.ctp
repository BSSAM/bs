<div class="block full">
    <div class="table-responsive invoice_info">
        <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">Invoice no</th>
<!--                            <th class="text-center">Date</th>-->
<!--                            <th class="text-center">Branch</th>-->
                            <th class="text-center">Customer Name</th>
<!--                            <th class="text-center">Customer Address</th>-->
                            <th class="text-center">Phone</th>
                          <!--  <th class="text-center">Email</th>-->
                            <th class="text-center">Quotation No</th>
                            <th class="text-center">Sales order No</th>
                            <th class="text-center">Delivery order No</th>
                            <th class="text-center">Track ID</th>
                            <th class="text-center">PO Number</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody> 
                        <?PHP if(!empty($invoice_list)): ?>
                        <?PHP foreach($invoice_list as $invoice): ?>
                        <tr <?php if($invoice['Invoice']['is_approved'] == 1):?> class="success" <?php else:?> class="error" <?php endif; ?>>
                            <td class="text-center"><?PHP echo $invoice['Invoice']['invoiceno'] ?></td>
<!--                            <td class="text-center"><?PHP //echo $invoice['Invoice']['approved_date'] ?></td>-->
<!--                            <td class="text-center"><?PHP //echo $invoice['branch']['branchname'] ?></td>-->
                            <td class="text-center"><?PHP echo $invoice['Invoice']['customername'] ?></td>
<!--                            <td class="text-center"><?PHP //echo $invoice['Invoice']['regaddress']  ?></td>-->
                            <td class="text-center"><?PHP echo $invoice['Invoice']['phone'] ?></td>
                           <!-- <td class="text-center"><?PHP //echo $invoice['Invoice']['email'] ?></td>-->
                            <td class="text-center"><?PHP echo $invoice['Invoice']['quotation_id'] ?></td>
                            <td class="text-center"><?PHP echo $invoice['Invoice']['salesorder_id'] ?></td>
                            <td class="text-center"><?PHP echo $invoice['Invoice']['deliveryorder_id'] ?></td>
                            <td class="text-center"><?PHP echo $invoice['Invoice']['track_id'] ?></td>
                            <td class="text-center"><?PHP echo $invoice['Invoice']['ref_no'] ?></td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <?php echo $this->Html->link('<i class="fa fa-pencil"></i>',array('action'=>'view',$invoice['Invoice']['invoiceno']),array('data-toggle'=>'tooltip','title'=>'View','class'=>'btn btn-xs btn-default','escape'=>false)); ?>
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