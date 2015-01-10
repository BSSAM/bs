                            <h1>
                                <i class="fa fa-table"></i>Uncertainty Data
                            </h1>
                        </div>
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                        <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
                        <li><?php echo $this->Html->link('Uncertainty Data',array('controller'=>'Temperatures','action'=>'uncertainty')); ?></li>
                    </ul>
                    <!-- END Datatables Header -->
                     <?php echo $this->element('message');?>
                    <!-- Datatables Content -->
                    <div class="block full">
                        <div class="block-title">
                            <h2>List Of Uncertainty Data</h2>
                            <?php //if($userrole['add']==1){ ?>
                            <h2 style="float:right;"><?php echo $this->Html->link('Add Uncertainty Data',array('controller'=>'Temperatures','action'=>'adduncertainty'),array('class'=>'btn btn-xs btn-primary','data-toggle'=>'tooltip','tile'=>'Add Uncertainty Data')); ?></h2>
                            <?php //} ?>
                        </div>
                        

                        <div class="table-responsive">
                            <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <!--<th class="text-center"><i class="gi gi-user"></i></th>-->
                                        <th class="text-center">Tag No</th>
                                        <th class="text-center">Serial No</th>
                                        <th class="text-center">Cal Date</th>
                                        <th class="text-center">Due Date</th>
                                        <th class="text-center">Procedure No</th>
                                        <th class="text-center">Instrument</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($uncertainty as $uncertainty_list): ?>
                                       
                                    <tr <?php if($uncertainty_list['Tempuncertainty']['status'] == 1):?> class="success" <?php else:?> class="error" <?php endif; ?>>
                                        <td class="text-center"><?php echo $uncertainty_list['Tempuncertainty']['id'];?></td>
                                        <!--<td class="text-center"><img src="img/placeholders/avatars/avatar4.gif" alt="avatar" class="img-circle"></td>-->
                                        <td class="text-center"><?php echo $uncertainty_list['Tempuncertainty']['tagno'];?></td>
                                        <td class="text-center"><?php echo $uncertainty_list['Tempuncertainty']['serialno'];?></td>
                                        <td class="text-center"><?php echo $uncertainty_list['Tempuncertainty']['caldate'];?></td>
                                        <td class="text-center"><?php echo $uncertainty_list['Tempuncertainty']['duedate'];?></td>
                                        <td class="text-center"><?php echo $uncertainty_list['Tempuncertainty']['procedureno'];?></td>
                                        <td class="text-center"><?php echo $uncertainty_list['Tempuncertainty']['instrumentname'];?></td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <?php //if($userrole['edit']==1){ ?>
                                                <?php echo $this->Html->link('<i class="fa fa-pencil"></i>',array('action'=>'edituncertainty',$uncertainty_list['Tempuncertainty']['id']),array('data-toggle'=>'tooltip','title'=>'Edit','class'=>'btn btn-xs btn-default','escape'=>false)); ?>
                                                <?php //} ?>
                                                <?php //if($userrole['delete']==1){ ?>
                                                <?php echo $this->Form->postLink('<i class="fa fa-times"></i>',array('action'=>'deleteuncertainty',$uncertainty_list['Tempuncertainty']['id']),array('data-toggle'=>'tooltip','title'=>'Delete','class'=>'btn btn-xs btn-danger','escape'=>false,'confirm'=>'Are you Sure?')); ?>
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
                                        
                                        $.bootstrapGrowl('Uncertainty Data is Added Successfully!', {
                                            type: growlType,
                                            allow_dismiss: true
                                        });
                                        
                                        $(this).prop('disabled', true);
                                    }
                                };
                            }();
                            
                            
                            </script> 
                            <?php } ?>