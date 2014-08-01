                 <h1><script>
    var path='<?PHP echo Router::url('/',true); ?>';
</script>
                                <i class="fa fa-table"></i>Procedures
                            </h1>
                        </div>
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                        <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
                        <li><?php echo $this->Html->link('Procedures',array('controller'=>'Procedures','action'=>'index')); ?></li>
                    </ul>
                    <!-- END Datatables Header -->
                    <?php echo $this->element('message');?>
                    <!-- Datatables Content -->
                    <div class="block full">
                        <div class="block-title">
                            <h2>List Of Procedures</h2>
                            <h2 style="float:right;"><?php echo $this->Html->link('Add Procedures',array('controller'=>'Procedures','action'=>'add'),array('class'=>'btn btn-xs btn-primary','data-toggle'=>'tooltip','tile'=>'Add Procedures')); ?></h2>
                        </div>
                        <div class="table-responsive">
                            <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <!--<th class="text-center"><i class="gi gi-user"></i></th>-->
                                        <th class="text-center">Created On</th>
                                        <th class="text-center">Procedures No</th>
                                        <th class="text-center">Department</th>
                                        <th class="text-center">Description</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($procedures as $procedure): ?>
                                       
                                    <tr <?php if($procedure['Procedure']['is_approved'] == 1):?> class="success" <?php else:?> class="error" <?php endif; ?>>
                                        <td class="text-center"><?php echo $procedure['Procedure']['id'];?></td>
                                        
                                        <td class="text-center"><?php echo $this->Time->format('F jS, Y h:i A',$procedure['Procedure']['created']);?></td>
                                        <td class="text-center"><?php echo $procedure['Procedure']['procedure_no'];?></td>
                                        <td class="text-center"><?php echo $procedure['Department']['departmentname'];?></td>
                                        <td class="text-center"><?php echo $procedure['Procedure']['description'];?></td>
                                        <?php $status   =   ($procedure['Procedure']['status']==1)?'<span class="label label-success">Active</span>':'<span class="label label-danger">In Active</span>';?>
                                        <td class="text-center"><?PHP echo $status; ?></td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <?php echo $this->Html->link('<i class="fa fa-pencil"></i>',array('action'=>'edit',$procedure['Procedure']['id']),array('data-toggle'=>'tooltip','title'=>'Edit','class'=>'btn btn-xs btn-default','escape'=>false)); ?>
                                                <?php echo $this->Form->postLink('<i class="fa fa-times"></i>',array('action'=>'delete',$procedure['Procedure']['id']),array('data-toggle'=>'tooltip','title'=>'Delete','class'=>'btn btn-xs btn-danger','escape'=>false,'confirm'=>'Are you Sure?')); ?>
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