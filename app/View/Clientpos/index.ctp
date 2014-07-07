                            <h1>
                                <i class="fa fa-table"></i>Client Purchase Order
                            </h1>
                        </div>
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                        <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
                        <li><?php echo $this->Html->link('Client Purchase Order',array('controller'=>'Clientpos','action'=>'index')); ?></li>
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
                                        <th class="text-center">ID</th>
                                        <th class="text-center">Quotation No</th>
                                        <th class="text-center">Instrument(Qty)</th>
                                        <th class="text-center">Client Purchase order No</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($clientpo as $clientpo_list): ?>
                                    <tr>
                                        <td class="text-center"><?php echo $clientpo_list['Clientpo']['id'];?></td>
                                        <td class="text-center"><?php echo $clientpo_list['Clientpo']['quotations_id'];?></td>
                                        <td class="text-center"><span class="label label-success"><?php echo $clientpo_list['Clientpo']['quo_quantity'];?></span></td>
                                        <td class="text-center"><?php echo $clientpo_list['Clientpo']['clientpos_id'];?></td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <?php echo $this->Html->link('<i class="fa fa-pencil"></i>',array('action'=>'Clientpo',$clientpo_list['Clientpo']['id']),array('data-toggle'=>'tooltip','title'=>'Edit','class'=>'btn btn-xs btn-default','escape'=>false)); ?>
                                                <?php echo $this->Form->postLink('<i class="fa fa-times"></i>',array('action'=>'delete',$clientpo_list['Clientpo']['id']),array('data-toggle'=>'tooltip','title'=>'Delete','class'=>'btn btn-xs btn-danger','escape'=>false,'confirm'=>'Are you Sure?')); ?>
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
                                
                                return {
                                    init: function() {
                                        
                                        var growlType = $(this).data('growl');
                                        
                                        $.bootstrapGrowl('Client PO is Added Successfully!', {
                                            type: growlType,
                                            allow_dismiss: true
                                        });
                                        
                                        $(this).prop('disabled', true);
                                    }
                                };
                            }();
                            
                            
                            </script> 
                            <?php } ?>