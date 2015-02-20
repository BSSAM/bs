<h1>
    <i class="gi gi-user"></i>Tracking System
</h1>
</div>
</div>
<ul class="breadcrumb breadcrumb-top">
    <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
    <li><?php echo $this->Html->link('Tracking System',array('controller'=>'Tracks','action'=>'index')); ?></li>
</ul>
<!-- END Datatables Header -->
            <?PHP echo $this->element('message');?>            
<!-- Datatables Content -->
<div class="block full">
    <div class="block-title">
        <h2>List Of Tracking System</h2>
        <h2 style="float:right;"><?php echo $this->Html->link('Add Tracking System',array('controller'=>'Tracks','action'=>'add'),array('class'=>'btn btn-xs btn-primary','data-toggle'=>'tooltip','tile'=>'Add Tracking System')); ?></h2>
    </div>
                            
                     
    <div class="table-responsive">
        <table id="sofull-datatable" class="table table-vcenter table-condensed table-bordered">
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
                    <th class="text-center">Completed</th>
                    <th class="text-center">Responsible Person</th>
                    <th class="text-center">Customer Name</th>
                    <th class="text-center">Salesperson Name</th>
                    <th class="text-center">Branch Name</th>
                </tr>
            </thead>
            <tbody>
                <?PHP if(!empty($track_list)): ?>
                <?PHP foreach($track_list as $k->$track): ?>
                <tr>
                    <td class="text-center"><?PHP echo $k+1; ?></td>
                    <td class="text-center"><?PHP echo $track['Salesorder']['id']; ?></td>
                    <td class="text-center"><?PHP echo $track['Salesorder']['due_date']; ?></td>
                    <td class="text-center"><?PHP echo $this->Salesorder->find_deliveryorder_nos($track['Salesorder']['id']); ?></td>
                    <td class="text-center"><?PHP echo $track['Salesorder']['subcontract_name']; ?></td>
                    <td class="text-center"><?PHP echo $track['Salesorder']['subcontract_phone']; ?></td>
                    <td class="text-center"><?PHP echo $track['Salesorder']['subcontract_email']; ?></td>
                    <td class="text-center"><?PHP echo $track['Salesorder']['salesorder_id']; ?></td>
                    <td class="text-center"><?PHP echo $track['Salesorder']['subcontract_ref_no']; ?></td>
                    <td class="text-center"><?PHP echo $track['Salesorder']['subcontract_dono']; ?></td>
                    <td class="text-center"><?PHP echo $track['Salesorder']['subcontract_date']; ?></td>
                    <td class="text-center"><?PHP echo $track['Salesorder']['subcontract_duedate']; ?></td>
                    <td class="text-center"><?PHP echo $this->Salesorder->find_sales_order_customer($track['Salesorder']['salesorder_id']); ?></td>
                    <td class="text-center"><?PHP echo $track['Salesorder']['subcontract_name']; ?></td>
                    <td class="text-center"><?PHP echo $track['Salesorder']['subcontract_phone']; ?></td>
                    <td class="text-center"><?PHP echo $track['Salesorder']['subcontract_email']; ?></td>
                    <td class="text-center"><?PHP echo $track['Salesorder']['salesorder_id']; ?></td>
                </tr>
                <?PHP endforeach; ?>
                <?PHP else: ?>
                <?PHP echo "No Records Found"; ?>
                <?PHP endif; ?>
            </tbody>
        </table>
    </div></div>
       
        
        