<div class="block full">
    <div class="table-responsive invoice_info">
                <table id="example-datatable"  class="table table-vcenter table-condensed table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">Invoice no</th>
                            <th class="text-center">Date</th>
                            <th class="text-center">Branch</th>
                            <th class="text-center">Customer Name</th>
                            <th class="text-center">Customer Address</th>
<!--                            <th class="text-center"  style="width:60px;">Phone</th>
                            <th class="text-center"  style="width:60px;">Email</th>-->
                            <th class="text-center">Sales order No</th>
                            <th class="text-center">Delivery order No</th>
                            <th class="text-center">Track ID</th>
                            <th class="text-center">Your Reference No</th>
                            
                        </tr>
                    </thead>
                    <tbody> 
                        <?PHP if(!empty($unapproved_order_list)): ?>
                        <?PHP foreach($unapproved_order_list as $invoice): ?>
                        <tr>
                            <td class="text-center"><?PHP echo $invoice['Invoice']['id'] ?></td>
                            <td class="text-center"><?PHP echo $invoice['Invoice']['approved_date'] ?></td>
                            <td class="text-center"></td>
                            <td class="text-center"><?PHP //echo $invoice['Deliveryorder']['Customer']['customername'] ?></td>
                            <td class="text-center"><?PHP //echo $invoice['Deliveryorder']['customer_address']  ?></td>
<!--                        <td class="text-center"><?PHP //echo $invoice['Deliveryorder']['phone'] ?></td>
                            <td class="text-center"><?PHP //echo $invoice['Deliveryorder']['email'] ?></td>-->
                            <td class="text-center"><?PHP //echo $invoice['Deliveryorder']['Salesorder']['salesorderno'] ?></td>
                            <td class="text-center"><?PHP echo $invoice['Deliveryorder']['delivery_order_no'] ?></td>
                            <td class="text-center"><?PHP echo $invoice['Invoice']['track_id'] ?></td>
                            <td class="text-center"><?PHP echo $invoice['Deliveryorder']['po_reference_no'] ?></td>
                        </tr>
                        <?PHP endforeach; ?>
                        <?PHP endif; ?>
                    </tbody>
                </table>
            </div>
</div>