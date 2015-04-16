                            <h1>
                                <i class="fa fa-table"></i>Titles
                            </h1>
                        </div>
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                        <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
                        <li><?php echo $this->Html->link('Titles',array('controller'=>'Titles','action'=>'index')); ?></li>
                    </ul>
                    <!-- END Datatables Header -->
                    <?php echo $this->element('message');?>
                    <!-- Datatables Content -->
                    <div class="block full">
                        <div class="block-title">
                            <h2>List Of Titles</h2>
                            <?php if($userrole_cus['add']==1){ ?>
                            <h2 style="float:right;"><?php echo $this->Html->link('Add Title',array('controller'=>'Titles','action'=>'add'),array('class'=>'btn btn-xs btn-primary','data-toggle'=>'tooltip','tile'=>'Add Title')); ?></h2>
                            <?php } ?>
                        </div>
                        <div class="table-responsive">
                            <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">Created On</th>
                                        <th class="text-center">Title Name</th>
                                        <th class="text-center">Title Description</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?PHP if(!empty($titles)): ?>
                                    <?php foreach($titles as $title): ?>
                                    <tr>
                                        <td class="text-center"><?php echo $title['Title']['id'];?></td>
                                        <td class="text-center"><?php echo $this->Time->format('F jS, Y h:i A',$title['Title']['created']);?></td>
                                        <td class="text-center"><?php echo $title['Title']['title_name'];?></td>
                                        <td class="text-center"><?php echo $title['Title']['title_description'];?></td>
                                        <?php $status   =   ($title['Title']['status']==1)?'<span class="label label-success">Active</span>':'<span class="label label-danger">In Active</span>';?>
                                        <td class="text-center"><?PHP echo $status; ?></td>
                                        
                                        <td class="text-center">
                                            <?php if(($title['Title']['title_name'] != 'SERIAL NO')&& ($title['Title']['title_name'] != 'REMARKS')) { ?>
                                            <div class="btn-group">
                                                <?php if($userrole_cus['edit']==1){ ?>
                                                <?php echo $this->Html->link('<i class="fa fa-pencil"></i>',array('action'=>'edit',$title['Title']['id']),array('data-toggle'=>'tooltip','title'=>'Edit','class'=>'btn btn-xs btn-default','escape'=>false)); ?>
                                                <?php } ?>
                                                <?php if($userrole_cus['delete']==1){ ?>
                                                <?php echo $this->Form->postLink('<i class="fa fa-times"></i>',array('action'=>'delete',$title['Title']['id']),array('data-toggle'=>'tooltip','title'=>'Delete','class'=>'btn btn-xs btn-danger','escape'=>false,'confirm'=>'Are you Sure?')); ?>
                                                <?php } ?>
                                            </div>
                                            <?php } ?>
                                        </td>
                                        
                                    </tr>
                                    
                                    <?php endforeach; ?>
                                    <?PHP endif; ?>
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