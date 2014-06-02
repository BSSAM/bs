<script>
    var path_url='<?PHP echo Router::url('/',true); ?>';
</script>
<h1>
                                <i class="gi gi-user"></i>Purchase Order
                            </h1>
                        </div>
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                        <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
                        <li><?php echo $this->Html->link('Purchase Orders',array('controller'=>'Deliveryorders','action'=>'index')); ?></li>
                    </ul>
                    <!-- END Datatables Header -->
                    <?PHP echo  $this->element('message'); ?>
                    <!-- Datatables Content -->
                    <div class="block full">
                        <div class="block-title">
                            <h2>List Of Purchase Orders </h2>
                            <h2>
                                <?php echo $this->Html->link('Add Purchase Order',array('controller'=>'Purchaseorders','action'=>'add'),array('class'=>'btn btn-xs btn-primary','data-toggle'=>'tooltip','tile'=>'Add Purchase Order')); ?>
                            </h2>
                        </div>
                        <div class="table-responsive">
                            <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                <thead>
                                    <tr>
                                        <!--<th class="text-center"><i class="gi gi-user"></i></th>-->
                                        <th class="text-center">Purchase Order No</th>
                                        <th class="text-center">Customer Id</th>
                                        <th class="text-center">Customer Name</th>
                                         <th class="text-center">Phone</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Reference No</th>
                                         <th class="text-center">Due Amount</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?PHP if(!empty($purchaseorders)): ?>
                                     <?php foreach($purchaseorders as $purchaseorder): ?>
                                    <tr>
                                        <td class="text-center"><?PHP echo $purchaseorder['Purchaseorder']['purchaseorder_no'] ?></td>
                                        <td class="text-center"><?PHP echo $purchaseorder['Purchaseorder']['customer_id'] ?></td>
                                        <td class="text-center"><?PHP echo $purchaseorder['Customer']['customername'] ?></td>
                                        <td class="text-center"><?PHP echo $purchaseorder['Purchaseorder']['phone'] ?></td>
                                        <td class="text-center"><?PHP echo $purchaseorder['Purchaseorder']['email'] ?></td>
                                        <td class="text-center"><?PHP echo $purchaseorder['Purchaseorder']['your_ref_no'] ?></td>
                                        <td class="text-center"><?PHP echo $purchaseorder['Purchaseorder']['due_amount'] ?></td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <?php echo $this->Html->link('<i class="fa fa-pencil"></i>',array('action'=>'edit',$purchaseorder['Purchaseorder']['id']),array('data-toggle'=>'tooltip','title'=>'Edit','class'=>'btn btn-xs btn-default','escape'=>false)); ?>
                                                <?php echo $this->Form->postLink('<i class="fa fa-times"></i>',array('action'=>'delete',$purchaseorder['Purchaseorder']['id']),array('data-toggle'=>'tooltip','title'=>'Delete','class'=>'btn btn-xs btn-danger','escape'=>false,'confirm'=>'Are you Sure want to delete order  '.$purchaseorder['Purchaseorder']['purchaseorder_no'].'?')); ?>
                                                
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <?PHP endif; ?>
                                </tbody>
                            </table>
                         <?php echo $this->Html->script('pages/uiProgress'); ?>
                            <script>$(function(){ UiProgress.init(); });</script>
                                
                                <?php if($this->Session->flash()!='') { ?>
                            <script> var UiProgress = function() {
                                
                                // Get random number function from a given range
                                var getRandomInt = function(min, max) {
                                    return Math.floor(Math.random() * (max - min + 1)) + min;
                                };
                            }();
                            </script> 
                            <?php } ?>
