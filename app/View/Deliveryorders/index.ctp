<script>
    var path_url='<?PHP echo Router::url('/',true); ?>';
</script>
<h1>
                                <i class="gi gi-user"></i>Delivery Order
                            </h1>
                        </div>
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                        <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
                        <li><?php echo $this->Html->link('Delivery Orders',array('controller'=>'Deliveryorders','action'=>'index')); ?></li>
                    </ul>
                    <!-- END Datatables Header -->
                    <?PHP echo  $this->element('message'); ?>
                    <!-- Datatables Content -->
                    <div class="block full">
                        <div class="block-title">
                            <h2>List Of Delivery Orders </h2>
                            <h2>
                                <?php echo $this->Html->link('Add Delivery Order',array('controller'=>'Deliveryorders','action'=>'add'),array('class'=>'btn btn-xs btn-primary','data-toggle'=>'tooltip','tile'=>'Add Delivery Order')); ?>
                            </h2>
                        </div>
                        <div class="table-responsive">
                            <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                <thead>
                                    <tr>
                                        
                                        <!--<th class="text-center"><i class="gi gi-user"></i></th>-->
                                        <th class="text-center">Delivery Order No</th>
                                        <th class="text-center">Delivery Order Date</th>
                                        <th class="text-center">Sales order No</th>
                                        <th class="text-center">Customer Name</th>
                                         <th class="text-center">Phone</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Reference No</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?PHP if(!empty($deliveryorders )): ?>
                                     <?php foreach($deliveryorders as $deliveryorder): ?>
                                    <tr <?php if($deliveryorder['Deliveryorder']['is_approved'] == 1):?> class="success" <?php else:?> class="error" <?php endif; ?>>
                                        <td class="text-center"><?PHP echo $deliveryorder['Deliveryorder']['delivery_order_no'] ?></td>
                                        <td class="text-center"><?PHP echo $deliveryorder['Deliveryorder']['delivery_order_date'] ?></td>
                                        <td class="text-center"><?PHP echo $deliveryorder['Deliveryorder']['salesorder_id'] ?></td>
                                        <td class="text-center"><?PHP echo $deliveryorder['Customer']['Customertagname'] ?></td>
                                        <td class="text-center"><?PHP echo $deliveryorder['Deliveryorder']['phone'] ?></td>
                                        <td class="text-center"><?PHP echo $deliveryorder['Deliveryorder']['email'] ?></td>
                                        <td class="text-center"><?PHP echo $deliveryorder['Deliveryorder']['our_reference_no'] ?></td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <?php echo $this->Html->link('<i class="fa fa-pencil"></i>',array('action'=>'edit',$deliveryorder['Deliveryorder']['id']),array('data-toggle'=>'tooltip','title'=>'Edit','class'=>'btn btn-xs btn-default','escape'=>false)); ?>
                                                <?php echo $this->Form->postLink('<i class="fa fa-times"></i>',array('action'=>'delete',$deliveryorder['Deliveryorder']['id']),array('data-toggle'=>'tooltip','title'=>'Delete','class'=>'btn btn-xs btn-danger','escape'=>false,'confirm'=>'Are you Sure want to delete order  '.$deliveryorder['Deliveryorder']['delivery_order_no'].'?')); ?>
                                                
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
