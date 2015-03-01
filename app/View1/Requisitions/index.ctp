<script>
    var path_url='<?PHP echo Router::url('/',true); ?>';
</script>
<h1>
                                <i class="gi gi-user"></i>Purchase Order Requisition(Internal)
                            </h1>
                        </div>
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                        <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
                        <li><?php echo $this->Html->link('PO Requisition',array('controller'=>'Prequisitions','action'=>'index')); ?></li>
                    </ul>
                    <!-- END Datatables Header -->
                    <?PHP echo  $this->element('message'); ?>
                    <!-- Datatables Content -->
                    <div class="block full">
                        <div class="block-title">
                            <h2>List Of Purchase Order Requisition(Internal) </h2>
                            <h2>
                                <?php echo $this->Html->link('Add Purchase Order Requisition',array('controller'=>'Prequisitions','action'=>'add'),array('class'=>'btn btn-xs btn-primary','data-toggle'=>'tooltip','tile'=>'Add Purchase Order Requisition')); ?>
                            </h2>
                        </div>
                        <div class="table-responsive">
                            <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                <thead>
                                    <tr>
                                        
                                        <!--<th class="text-center"><i class="gi gi-user"></i></th>-->
                                        <th class="text-center">PO Requisition No</th>
                                        <th class="text-center">Date</th>
                                        <th class="text-center">Customer Name</th>
                                        <th class="text-center">Customer Address</th>
                                        <th class="text-center">Phone</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Reference No</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?PHP if(!empty($prequisition )): ?>
                                     <?php foreach($prequisition as $prequisitions): ?>
                                    <tr <?php if($prequisitions['Deliveryorder']['is_approved'] == 1):?> class="success" <?php else:?> class="error" <?php endif; ?>>
                                        <td class="text-center"><?PHP echo $prequisitions['Prequisition']['po_requisition_no'] ?></td>
                                        <td class="text-center"><?PHP echo $prequisitions['Prequisition']['po_requisition_date'] ?></td>
                                        <td class="text-center"><?PHP echo $prequisitions['Prequisition']['name'] ?></td>
                                        <td class="text-center"><?PHP echo $prequisitions['Prequisition']['address'] ?></td>
                                        <td class="text-center"><?PHP echo $prequisitions['Prequisition']['phone'] ?></td>
                                        <td class="text-center"><?PHP echo $prequisitions['Prequisition']['email'] ?></td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <?php echo $this->Html->link('<i class="fa fa-pencil"></i>',array('action'=>'edit',$deliveryorder['Prequisition']['id']),array('data-toggle'=>'tooltip','title'=>'Edit','class'=>'btn btn-xs btn-default','escape'=>false)); ?>
                                                <?php echo $this->Form->postLink('<i class="fa fa-times"></i>',array('action'=>'delete',$deliveryorder['Prequisition']['id']),array('data-toggle'=>'tooltip','title'=>'Delete','class'=>'btn btn-xs btn-danger','escape'=>false,'confirm'=>'Are you Sure want to delete order  '.$deliveryorder['Prequisition']['po_requisition_no'].'?')); ?>
                                                
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
