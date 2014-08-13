                            <h1>
                                <i class="gi gi-user"></i>Industry
                            </h1>
                        </div>
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                        <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
                        <li><?php echo $this->Html->link('Industry',array('controller'=>'Industries','action'=>'index')); ?></li>
                    </ul>
                    <!-- END Datatables Header -->

                    <!-- Datatables Content -->
                    <div class="block full">
                        <div class="block-title">
                            <h2>List Of Industries</h2>
                            <?php if($userrole_cus['add']==1){ ?>
                            <h2 style="float:right;"><?php echo $this->Html->link('Add Industry',array('controller'=>'Industries','action'=>'add'),array('class'=>'btn btn-xs btn-primary','data-toggle'=>'tooltip','tile'=>'Add Industry')); ?></h2>
                            <?php } ?>
                        </div>
                        

                        <div class="table-responsive">
                            <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <!--<th class="text-center"><i class="gi gi-user"></i></th>-->
                                        <th class="text-center">Industry Name</th>
                                        <th class="text-center">Description</th>
                                        
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     <?php foreach($industry as $industry_list): ?>
                                    <tr <?php if($industry_list['Industry']['status'] == 1):?> class="success" <?php else:?> class="error" <?php endif; ?>>
                                        <td class="text-center"><?php echo $industry_list['Industry']['id']; ?></td>
                                        <!--<td class="text-center"><img src="img/placeholders/avatars/avatar4.gif" alt="avatar" class="img-circle"></td>-->
                                        <td class="text-center"><a href="javascript:void(0)"><?php echo $industry_list['Industry']['industryname']; ?></a></td>
                                        <td class="text-center"><?php echo $industry_list['Industry']['description']; ?></td>
                                     
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <?php if($userrole_cus['edit']==1){ ?>
                                                <?PHP echo $this->html->link('<i class="fa fa-pencil"></i>',array('controller'=>'Industries',
                                                    'action'=>'edit',$industry_list['Industry']['id']),array('title'=>'Edit',
                                                        'class'=>'btn btn-xs btn-default','data-toggle'=>'tooltip','escape'=>false)); ?>
                                                <?php } ?>
                                                <?php if($userrole_cus['delete']==1){ ?>
                                                <?PHP echo $this->Form->postlink('<i class="fa fa-times"></i>',array('controller'=>'Industries',
                                                    'action'=>'delete',$industry_list['Industry']['id']),array('title'=>'Delete',
                                                        'class'=>'btn btn-xs btn-danger','data-toggle'=>'tooltip','escape'=>false,'confirm'=>'Are you sure want to delete?')); ?>
                                                <?php } ?>
                                                
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
                                        
                                        $.bootstrapGrowl('Industry is Added Successfully!', {
                                            type: growlType,
                                            allow_dismiss: true
                                        });
                                        
                                        $(this).prop('disabled', true);
                                    }
                                };
                            }();
                            
                            
                            </script> 
                            <?php } ?>