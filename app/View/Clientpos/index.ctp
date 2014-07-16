                            <h1>
                                <i class="fa fa-table"></i>Client Purchase Order
                            </h1>
                        </div>
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                        
                        <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
                        <li>Customers</li>
                    </ul>
                    <!-- END Datatables Header -->
                    <!-- Datatables Content -->
                    <div class="block full">
                        <div class="block-title">
                            <h2>List Of Client Purchase Order</h2>
<!--                            <h2 style="float:right;"><?php //echo $this->Html->link('Add Brands',array('controller'=>'Brands','action'=>'add'),array('class'=>'btn btn-xs btn-primary','data-toggle'=>'tooltip','tile'=>'Add Brand')); ?></h2>-->
                        </div>
                        
                       
                        <div class="table-responsive">
                            <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">Customer ID</th>
                                        <th class="text-center">Customer Name</th>
                                        <th class="text-center">Invoice Type</th>
                                        <th class="text-center">Delivery order Type</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($clientpo as $clientpo_list): ?>
                                    <tr>
                                        <td class="text-center"><?php echo $clientpo_list['Customer']['id'];?></td>
                                        <td class="text-center"><?php echo $clientpo_list['Customer']['Customertagname'];?></td>
                                        <td class="text-center"><span class="label label-success">
                                            <?php echo $clientpo_list['InvoiceType']['type_invoice'];?>
                                            </span></td>
<!--                                        <td class="text-center">
                                            <?PHP //$po_ids   =   $this->ClientPO->getpos($clientpo_list['Clientpo']['quotation_id']); ?>
                                            <?PHP //foreach($po_ids as $po_id=>$v): ?>
                                            <span class="label label-warning"><?PHP //echo  $v; ?></span>
                                            <?PHP //endforeach; ?>
                                           </td>-->
                                           <td class="text-center">
                                                    <?php echo $clientpo_list['Deliveryordertype']['delivery_order_type'];?>
                                           </td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <?PHP 
                                                   $invoice_type   =   $this->ClientPO->getinvoice_type($clientpo_list['Customer']['id']);
                                                ?>
                                                <?php echo $this->Html->link('<i class="fa fa-plus"></i>Add',array('action'=>$invoice_type,$clientpo_list['Customer']['id']),array('data-toggle'=>'tooltip','title'=>'Add','class'=>'btn btn-xs btn-default','escape'=>false)); ?>
                                                <?php //echo $this->Form->postLink('<i class="fa fa-times"></i>',array('action'=>'delete',$clientpo_list['Clientpo']['quotation_id']),array('data-toggle'=>'tooltip','title'=>'Delete','class'=>'btn btn-xs btn-danger','escape'=>false,'confirm'=>'Are you Sure?')); ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
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