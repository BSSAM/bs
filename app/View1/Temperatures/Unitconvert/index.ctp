                            <h1>
                                <i class="fa fa-table"></i>Unit Conversion(Temperature)
                            </h1>
                        </div>
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                        <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
                        <li><?php echo $this->Html->link('Unit Conversion',array('controller'=>'Temperatures','action'=>'unitconvert')); ?></li>
                    </ul>
                    <!-- END Datatables Header -->
                     <?php echo $this->element('message');?>
                    <!-- Datatables Content -->
                    <div class="block full">
                        <div class="block-title">
                            <h2>List Of Unit Conversion(Temperature)</h2>
                            <?php //if($userrole['add']==1){ ?>
                            <h2 style="float:right;"><?php echo $this->Html->link('Add unitconvert',array('controller'=>'Temperatures','action'=>'unitconvert/addunitconvert'),array('class'=>'btn btn-xs btn-primary','data-toggle'=>'tooltip','tile'=>'Add unitconvert')); ?></h2>
                            <?php //} ?>
                        </div>
                        

                        <div class="table-responsive">
                            <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <!--<th class="text-center"><i class="gi gi-user"></i></th>-->
                                        <th class="text-center">From unit</th>
                                        <th class="text-center">To unit</th>
                                        <th class="text-center">Factor</th>
                                        <th class="text-center">Description</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($unitconvert as $unitconvert_list): ?>
                                       
                                    <tr <?php if($unitconvert_list['Tempunitconvert']['status'] == 1):?> class="success" <?php else:?> class="error" <?php endif; ?>>
                                        <td class="text-center"><?php echo $unitconvert_list['Tempunitconvert']['id'];?></td>
                                        <td class="text-center"><?php echo $this->APP->unit_name($unitconvert_list['Tempunitconvert']['fromunit']);?></td>
   										<td class="text-center"><?php echo $this->APP->unit_name($unitconvert_list['Tempunitconvert']['tounit']);?></td>
  										<td class="text-center"><?php echo $unitconvert_list['Tempunitconvert']['factor'];?></td>
                                        <td class="text-center"><?php echo $unitconvert_list['Tempunitconvert']['description'];?></td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <?php //if($userrole['edit']==1){ ?>
                                                <?php echo $this->Html->link('<i class="fa fa-pencil"></i>',array('action'=>'unitconvert/editunitconvert',$unitconvert_list['Tempunitconvert']['id']),array('data-toggle'=>'tooltip','title'=>'Edit','class'=>'btn btn-xs btn-default','escape'=>false)); ?>
                                                <?php //} ?>
                                                <?php //if($userrole['delete']==1){ ?>
                                                <?php echo $this->Form->postLink('<i class="fa fa-times"></i>',array('action'=>'unitconvert/deleteunitconvert',$unitconvert_list['Tempunitconvert']['id']),array('data-toggle'=>'tooltip','title'=>'Delete','class'=>'btn btn-xs btn-danger','escape'=>false,'confirm'=>'Are you Sure?')); ?>
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
                                        
                                        $.bootstrapGrowl('unitconvert is Added Successfully!', {
                                            type: growlType,
                                            allow_dismiss: true
                                        });
                                        
                                        $(this).prop('disabled', true);
                                    }
                                };
                            }();
                            
                            
                            </script> 
                            <?php } ?>