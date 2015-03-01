<h1>
    <i class="gi gi-user"></i>Sub Contract Delivery Order
</h1>
</div>
</div>
<ul class="breadcrumb breadcrumb-top">
    <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
    <li><?php echo $this->Html->link('Sub Contract Do',array('controller'=>'Subcontractdos','action'=>'index')); ?></li>
</ul>
<!-- END Datatables Header -->
            <?PHP echo $this->element('message');?>            
<!-- Datatables Content -->
<div class="block full">
    <div class="block-title">
        <h2>List Of Sub Contract Delivery Order</h2>
        <h2 style="float:right;"><?php echo $this->Html->link('Add Sub-Contract DO',array('controller'=>'Subcontractdos','action'=>'add'),array('class'=>'btn btn-xs btn-primary','data-toggle'=>'tooltip','tile'=>'Add Sub-Contract DO')); ?></h2>
    </div>
                            
                     
    <div class="table-responsive">
        <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
            <thead>
                <tr>
                    <th class="text-center">Sub-Contract DO No</th>
                    <th class="text-center">Date</th>
                    <th class="text-center">Due Date</th>
                    <th class="text-center">Customer Name</th>
                    <th class="text-center">Sub Contract Name</th>
<!--                    <th class="text-center">Sub Contract Address</th>-->
                   
                    <th class="text-center">Phone</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Sales Order No</th>
                    <th class="text-center">Your Ref No</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?PHP if(!empty($subcontract_list)): ?>
                <?PHP foreach($subcontract_list as $subcontract): ?>
                <tr>
                    <td class="text-center"><?PHP echo $subcontract['Subcontractdo']['subcontract_dono']; ?></td>
                    <td class="text-center"><?PHP echo $subcontract['Subcontractdo']['subcontract_date']; ?></td>
                    <td class="text-center"><?PHP echo $subcontract['Subcontractdo']['subcontract_duedate']; ?></td>
                    <td class="text-center"><?PHP echo $this->Salesorder->find_sales_order_customer($subcontract['Subcontractdo']['salesorder_id']); ?></td>
                    <td class="text-center"><?PHP echo $subcontract['Subcontractdo']['subcontract_name']; ?></td>
<!--                    <td class="text-center"><?PHP //echo $subcontract['Subcontractdo']['subcontract_address']; ?></td>-->
                    
                    <td class="text-center"><?PHP echo $subcontract['Subcontractdo']['subcontract_phone']; ?></td>
                    <td class="text-center"><?PHP echo $subcontract['Subcontractdo']['subcontract_email']; ?></td>
                    <td class="text-center"><?PHP echo $subcontract['Subcontractdo']['salesorder_id']; ?></td>
                    <td class="text-center"><?PHP echo $subcontract['Subcontractdo']['subcontract_ref_no']; ?></td>
                    <td class="text-center">
                        <div class="btn-group">
                            <?php echo $this->Html->link('<i class="fa fa-pencil"></i>', array('action' => 'edit', $subcontract['Subcontractdo']['id']), array('data-toggle' => 'tooltip', 'title' => 'Edit', 'class' => 'btn btn-xs btn-default', 'escape' => false)); ?>
                            <?php echo $this->Form->postLink('<i class="fa fa-times"></i>', array('action' => 'delete', $subcontract['Subcontractdo']['id']), array('data-toggle' => 'tooltip', 'title' => 'Delete', 'class' => 'btn btn-xs btn-danger', 'escape' => false, 'confirm' => 'Are you Sure?')); ?>
                            <?php 
                            if($subcontract['Subcontractdo']['is_approved'] == 1){
                            echo $this->Form->postLink('<i class="gi gi-print"></i>',array('action'=>'pdf',$subcontract['Subcontractdo']['id']),array('data-toggle'=>'tooltip','title'=>'Report','class'=>'btn btn-xs btn-default','escape'=>false)); ?>
                            <?php } ?>
                                        
                        </div>
                    </td>
                </tr>
                <?PHP endforeach; ?>
                <?PHP else: ?>
                <?PHP echo "No Records Found"; ?>
                <?PHP endif; ?>
            </tbody>
        </table>
    </div></div>
       
        
        