
<h1>
    <i class="gi gi-user"></i>Debt Chase
</h1>
</div>
</div>
<ul class="breadcrumb breadcrumb-top">
    <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
    <li><?php echo $this->Html->link('Debt Chase',array('controller'=>'Debtchases','action'=>'index')); ?></li>
</ul>
<!-- END Datatables Header -->
            <?PHP echo $this->element('message');?>            
<!-- Datatables Content -->
<div class="block full">
    <div class="block-title">
        <h2>List Of Debt Chase</h2>
        
    </div>
                            
                            
    <div class="table-responsive">
        <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
            <thead>
                <tr>
                    <th class="text-center">Invoice No </th>
                    <th class="text-center">Invoice Date</th>
                    <th class="text-center">Due Amount(SGD)</th>
                    <th class="text-center">Due Date</th>
                    <th class="text-center">Over Due Days</th>
                    <th class="text-center">Customer Name</th>
                    <th class="text-center">Phone</th>
                    <th class="text-center">Billing Address</th>
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
                </tr>
            </tbody>
        </table>
    </div>
        
        
        