
<h1>
    <i class="gi gi-user"></i>Customers
</h1>
</div>
</div>
<ul class="breadcrumb breadcrumb-top">
    <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
    <li><?php echo $this->Html->link('Customers',array('controller'=>'Customers','action'=>'index')); ?></li>
</ul>
<!-- END Datatables Header -->
            <?PHP echo $this->element('message');?>            
<!-- Datatables Content -->
<div class="block full">
    <div class="block-title">
        <h2>List Of Customers</h2>
        <h2 style="float:right;"><?php echo $this->Html->link('Add Customer',array('controller'=>'Customers','action'=>'add'),array('class'=>'btn btn-xs btn-primary','data-toggle'=>'tooltip','tile'=>'Add Customer')); ?></h2>
    </div>
                            
                            
    <div class="table-responsive">
        <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
            <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Customer Name</th>
                    <th class="text-center">Phone</th>
                    <th class="text-center">Customer Type</th>
                    <th class="text-center">Industry</th>
                    <th class="text-center">Location</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($customer as $customer_list): ?>
                    <tr>
                        <td class="text-center"><?php echo $customer_list['Customer']['id']; ?></td>
                        <td class="text-center"><a href="javascript:void(0)"><?php echo $customer_list['Customer']['customername']; ?></a></td>
                        <td class="text-center"><?php echo $customer_list['Customer']['phone']; ?></td>
                        <td class="text-center"><?php echo $customer_list['Customer']['customertype']; ?></td>
                        <td class="text-center"><?php echo $customer_list['Industry']['industryname']; ?></td>
                        <td class="text-center"><?php echo $customer_list['Location']['locationname']; ?></td>
                        <td class="text-center">
                            <div class="btn-group">
                                <?PHP
                                echo $this->html->link('<i class="fa fa-pencil"></i>', array('controller' => 'Customers',
                                    'action' => 'edit', $customer_list['Customer']['id']), array('title' => 'Edit',
                                    'class' => 'btn btn-xs btn-default', 'data-toggle' => 'tooltip', 'escape' => false));
                                ?>
                                <?PHP
                                echo $this->Form->postlink('<i class="fa fa-times"></i>', array('controller' => 'Customers',
                                    'action' => 'delete', $customer_list['Customer']['id']), array('title' => 'Delete',
                                    'class' => 'btn btn-xs btn-danger', 'data-toggle' => 'tooltip', 'escape' => false, 'confirm' => 'Are you sure want to delete?'));
                                ?>

                             </div>
                    </td>
                </tr>
                                    <?php endforeach; ?>
                                        
                                        
            </tbody>
        </table>
        
        
        <?php echo $this->Html->script('pages/uiProgress'); ?>
        <script>$(function(){ UiProgress.init(); });</script>
        <?php if ($this->Session->flash() != '') { ?>
            <script> var UiProgress = function() {
                // Get random number function from a given range
                var getRandomInt = function(min, max) {
                    return Math.floor(Math.random() * (max - min + 1)) + min;
                };
            }();
            </script> 
        <?php } ?>