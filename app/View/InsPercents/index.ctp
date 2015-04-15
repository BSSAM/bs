                            <h1>
                                <i class="fa fa-table"></i>Mark Up
                            </h1>
                        </div>
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                        <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
                        <li><?php echo $this->Html->link('Mark Up',array('controller'=>'InsPercents','action'=>'index')); ?></li>
                    </ul>
                    <!-- END Datatables Header -->
                     <?php echo $this->element('message');?>
                    <!-- Datatables Content -->
                    <div class="block full">
                        <div class="block-title">
                            <h2>List Of Mark Up</h2>
                            <?php //if($userrole_cus['add']==1){ ?>
                            <h2 style="float:right;"><?php //echo $this->Html->link('Add Percentage',array('controller'=>'InsPercents','action'=>'add'),array('class'=>'btn btn-xs btn-primary','data-toggle'=>'tooltip','tile'=>'Add Discount %')); ?></h2>
                            <?php //} ?>
                        </div>
                        

                        <div class="table-responsive">
                            <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">Created</th>
                                        <th class="text-center">Mark Up</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($percent as $percents): ?>
                                       
                                    <tr <?php //if($percents['InsPercent']['is_approved'] == 1):?> class="success" <?php //else:?> <?php //endif; ?>>
                                        <td class="text-center"><?php echo $percents['InsPercent']['id'];?></td>
                                        
                                        <td class="text-center"><?php echo $this->Time->format('F jS, Y h:i A',$percents['InsPercent']['created']);?></td>
                                        <td class="text-center"><?php echo $percents['InsPercent']['percent'];?></td>
                                        <?php $status   =   ($percents['InsPercent']['status']==1)?'<span class="label label-success">Active</span>':'<span class="label label-danger">In Active</span>';?>
                                        <td class="text-center"><?PHP echo $status; ?></td>
                                        
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <?php if($userrole_cus['edit']==1){ ?>
                                                <?php echo $this->Html->link('<i class="fa fa-pencil"></i>',array('action'=>'edit',$percents['InsPercent']['id']),array('data-toggle'=>'tooltip','title'=>'Edit','class'=>'btn btn-xs btn-default','escape'=>false)); ?>
                                                <?php } ?>
                                                <?php //if($userrole_cus['delete']==1){ ?>
                                                <?php //echo $this->Form->postLink('<i class="fa fa-times"></i>',array('action'=>'delete',$percents['InsPercent']['id']),array('data-toggle'=>'tooltip','title'=>'Delete','class'=>'btn btn-xs btn-danger','escape'=>false,'confirm'=>'Are you Sure?')); ?>
                                                <?php //} ?>
                                            </div>
                                        </td>
                                    </tr>
                                    
                                    <?php endforeach; ?>
                                    
                                  
                                   
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
                                
                                return {
                                    init: function() {
                                        
                                        var growlType = $(this).data('growl');
                                        
                                        $.bootstrapGrowl('Mark Up is Added Successfully!', {
                                            type: growlType,
                                            allow_dismiss: true
                                        });
                                        
                                        $(this).prop('disabled', true);
                                    }
                                };
                            }();
                            
                            
                            </script> 
                            <?php } ?>