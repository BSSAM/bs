<h1>
    <i class="fa fa-table"></i>Userroles
</h1>
</div>
</div>
<ul class="breadcrumb breadcrumb-top">
    <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
    <li><?php echo $this->Html->link('Userroles',array('controller'=>'Userroles','action'=>'index')); ?></li>
</ul>
<!-- END Datatables Header -->
                        
<!-- Datatables Content -->
<div class="block full">
    <div class="block-title">
        <h2>List Of Userroles</h2>
        <h2 style="float:right;"><?php echo $this->Html->link('Add Userroles',array('controller'=>'Userroles','action'=>'add'),array('class'=>'btn btn-xs btn-primary','data-toggle'=>'tooltip','tile'=>'Add Userroles')); ?></h2>
    </div>
                            
                            
    <div class="table-responsive">
        <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
            <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <!--<th class="text-center"><i class="gi gi-user"></i></th>-->
                    <th class="text-center">Role</th>
                    <th class="text-center">Description</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                                    <?php foreach($userrole as $userrole_list): ?>
                                        
                <tr>
                    <td class="text-center"><?php echo $userrole_list['Userrole']['id'];?></td>
                    <!--<td class="text-center"><img src="img/placeholders/avatars/avatar4.gif" alt="avatar" class="img-circle"></td>-->
                    <td class="text-center"><a href="javascript:void(0)"><?php echo $userrole_list['Userrole']['user_role'];?></a></td>
                    <td class="text-center"><?php echo $userrole_list['Userrole']['description'];?></td>
                    <td class="text-center">
                        <div class="">
                                                <?php echo $this->Html->link('<i class="fa fa-pencil"></i>',array('action'=>'edit',$userrole_list['Userrole']['id']),array('data-toggle'=>'tooltip','title'=>'Edit','class'=>'btn btn-xs btn-default','escape'=>false)); ?>
                                                <?php echo $this->Form->postLink('<i class="fa fa-times"></i>',array('action'=>'delete',$userrole_list['Userrole']['id']),array('data-toggle'=>'tooltip','title'=>'Delete','class'=>'btn btn-xs btn-danger','escape'=>false,'confirm'=>'Are you Sure?')); ?>
                                                <?php echo $this->Html->link('Role',array('action'=>'roles',$userrole_list['Userrole']['user_role_id']),array('data-toggle'=>'tooltip','title'=>'Roles','class'=>'btn btn-alt btn-xs btn-primary','escape'=>false)); ?>
                        </div>
                    </td>
                </tr>
                                        
                                    <?php endforeach; ?>
                                        
                                        
                                        
            </tbody>
        </table>
                            <?php echo $this->Html->script('pages/uiProgress'); ?>
        <script>$(function(){ UiProgress.init(); });</script>
        
                                <?php if($this->Session->flash()!='') { ?>
        <script>
                                
            var UiProgress = function() {
                                    
                // Get random number function from a given range
                var getRandomInt = function(min, max) {
                    return Math.floor(Math.random() * (max - min + 1)) + min;
                };
                                    
                return {
                    init: function() {
                                            
                        var growlType = $(this).data('growl');
                                            
                        $.bootstrapGrowl('User Role Added Successfully', {
                            type: growlType,
                            allow_dismiss: true
                        });
                                            
                        $(this).prop('disabled', true);
                    }
                };
            }();
                                
                                
        </script> 
                            <?php } ?>