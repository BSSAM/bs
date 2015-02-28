                            <h1>
                                <i class="fa fa-table"></i>Collection & Delivery Information 
                            </h1>
                        </div>
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                        <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
                        <li><?php echo $this->Html->link('C & D',array('controller'=>'Candds','action'=>'index')); ?></li>
                    </ul>
                    <!-- END Datatables Header -->
                    <?php echo $this->element('message');?>
                    <!-- Datatables Content -->
                    <div class="block full">
                        <div class="block-title">
                            <h2>List Of Collection & Delivery Information</h2>
                            <h2 style="float:right;"><?php echo $this->Html->link('Add C & D Info',array('controller'=>'Candds','action'=>'add'),array('class'=>'btn btn-xs btn-primary','data-toggle'=>'tooltip','tile'=>'Add C & D Info')); ?></h2>
                        </div>
                        <div class="table-responsive">
                            <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">BRANCH</th>
                                        <th class="text-center">C & D Date</th>
                                        <th class="text-center">Tasks</th>
                                        <th class="text-center">Venues</th>
                                        <th class="text-center">Collections</th>
                                        <th class="text-center">Deliveries</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($cd_statistics as $candd_list): ?>
                                    <tr <?php if($candd_list['Candd']['is_approved'] == 1):?> class="success" <?php else:?> class="error" <?php endif; ?>>
                                        <td class="text-center"><?php echo $this->Quotation->branchname($candd_list['Candd']['branch_id']);?></td>
                                        <td class="text-center"><?php echo $candd_list['Candd']['cd_date'];?></td>
                                        <td class="text-center"><?php echo $this->Candd->get_task($candd_list['Candd']['cd_date']);?></td>
                                        <td class="text-center"><?php echo $this->Candd->get_venue($candd_list['Candd']['cd_date']);?></td>
                                        <td class="text-center"><?php echo $this->Candd->get_collection_count($candd_list['Candd']['cd_date']);?></td>
                                        <td class="text-center"><?php echo $this->Candd->get_delivery_count($candd_list['Candd']['cd_date']);?></td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <?php echo $this->Html->link('<i class="fa fa-pencil"></i>',array('action'=>'edit',$candd_list['Candd']['id']),array('data-toggle'=>'tooltip','title'=>'Edit','class'=>'btn btn-xs btn-default','escape'=>false)); ?>
                                                <?php echo $this->Form->postLink('<i class="fa fa-times"></i>',array('action'=>'delete',$candd_list['Candd']['id']),array('data-toggle'=>'tooltip','title'=>'Delete','class'=>'btn btn-xs btn-danger','escape'=>false,'confirm'=>'Are you Sure?')); ?>
                                                <?php echo $this->Form->postLink('<i class="gi gi-print"></i>',array('action'=>'pdf',$candd_list['Candd']['cd_date']),array('data-toggle'=>'tooltip','title'=>'Report','class'=>'btn btn-xs btn-default','escape'=>false)); ?>
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
