<div class="block full">
    <div class="table-responsive invoice_info">
        <table id="example-datatable"  class="table table-vcenter table-condensed table-bordered native">
                    <thead>
                        <tr>
                            <th class="text-center">Invoice no</th>
<!--                            <th class="text-center">Date</th>-->
                            <th class="text-center">Branch</th>
                            <th class="text-center">Customer Name</th>
                            <th class="text-center">Customer Address</th>
                            <th class="text-center">Phone</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Sales order No</th>
                            <th class="text-center">Delivery order No</th>
                            <th class="text-center">Track ID</th>
                            <th class="text-center">PO Number</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody> 
                        <?PHP if(!empty($unapproved_order_list)): ?>
                        <?PHP foreach($unapproved_order_list as $invoice): ?>
                        <tr <?php if($invoice['Invoice']['is_approved'] == 1):?> class="success" <?php else:?> class="error" <?php endif; ?>>
                            <td class="text-center"><?PHP echo $invoice['Invoice']['invoiceno'] ?></td>
<!--                            <td class="text-center"><?PHP //echo $invoice['Invoice']['approved_date'] ?></td>-->
                            <td class="text-center"><?PHP echo $invoice['branch']['branchname'] ?></td>
                            <td class="text-center"><?PHP echo $invoice['Invoice']['customername'] ?></td>
                            <td class="text-center"><?PHP echo $invoice['Invoice']['regaddress']  ?></td>
                            <td class="text-center"><?PHP echo $invoice['Invoice']['phone'] ?></td>
                            <td class="text-center"><?PHP echo $invoice['Invoice']['email'] ?></td>
                            <td class="text-center"><?PHP echo $invoice['Invoice']['salesorder_id'] ?></td>
                            <td class="text-center"><?PHP echo $invoice['Invoice']['deliveryorder_id'] ?></td>
                            <td class="text-center"><?PHP echo $invoice['Invoice']['track_id'] ?></td>
                            <td class="text-center"><?PHP echo $invoice['Invoice']['ref_no'] ?></td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <?php //if($userrole_cus['edit']==1){ ?>
                                    <?php echo $this->Html->link('<i class="fa fa-pencil"></i>',array('action'=>'edit',$invoice['Invoice']['id']),array('data-toggle'=>'tooltip','title'=>'Edit','class'=>'btn btn-xs btn-default','escape'=>false)); ?>
                                    <?php //} ?>
                                </div>
                            </td>
                        </tr>
                        <?PHP endforeach; ?>
                        <?PHP endif; ?>
                    </tbody>
                </table>
            </div>
</div>