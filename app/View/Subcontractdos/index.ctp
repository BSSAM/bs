
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
                    <th class="text-center">Branch</th>
                    <th class="text-center">Customer Name</th>
                    <th class="text-center">Sub Contract Name</th>
                    <th class="text-center">Sub Contract Address</th>
                    <th class="text-center">ATTN</th>
                    <th class="text-center">Phone</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Sales Order No</th>
                    <th class="text-center">Your Ref No</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-center"></td>
                    <td class="text-center"></td>
                    <td class="text-center"></td>
                    <td class="text-center"></td>
                    <td class="text-center"></td>
                    <td class="text-center"></td>
                    <td class="text-center"></td>
                    <td class="text-center"></td>
                    <td class="text-center"></td>
                    <td class="text-center"></td>
                    <td class="text-center"></td>
                    <td class="text-center"></td>
                </tr>
            </tbody>
        </table>
    </div>
        
        
        