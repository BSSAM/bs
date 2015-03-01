                            <h1>
                                <i class="fa fa-table"></i>Instruments For Group
                            </h1>
                        </div>
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                        <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
                        <li><?php echo $this->Html->link('Instrument For Group',array('controller'=>'Instrumentforgroups','action'=>'index')); ?></li>
                    </ul>
                    <!-- END Datatables Header -->
                    <?php echo $this->element('message');?>
                    <!-- Datatables Content -->
                    <div class="block full">
                        <div class="block-title">
                            <h2>List Of Instrument For Group</h2>
                            <?php if($userrole_cus['add']==1){ ?>
                            <h2 style="float:right;"><?php echo $this->Html->link('Add Instrument For Group',array('controller'=>'Instrumentforgroups','action'=>'add'),array('class'=>'btn btn-xs btn-primary','data-toggle'=>'tooltip','tile'=>'Add Instrument For Group')); ?></h2>
                            <?php } ?>
                        </div>
                        <div class="table-responsive">
                            <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">Instrument Group Name</th>
                                        <th class="text-center">Description</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php foreach($instrumentforgroups as $instrument): ?>
                                       
                                    <tr <?php if($instrument['InstrumentType']['is_approved'] == 1):?> class="success" <?php else:?> class="error" <?php endif; ?>>
                                    <td class="text-center"><?php echo $instrument['InstrumentType']['id'];?></td>
                                        <td class="text-center"><?php echo $instrument['InstrumentType']['group_name'];?></td>
                                        <td class="text-center"><?php echo $instrument['InstrumentType']['group_description'];?></td>
                                        <?php $status   =   ($instrument['InstrumentType']['status']==1)?'<span class="label label-success">Active</span>':'<span class="label label-danger">In Active</span>';?>
                                        <td class="text-center"><?PHP echo $status; ?></td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <?php if($userrole_cus['edit']==1){ ?>
                                                <?php echo $this->Html->link('<i class="fa fa-pencil"></i>',array('action'=>'edit',$instrument['InstrumentType']['id']),array('data-toggle'=>'tooltip','title'=>'Edit','class'=>'btn btn-xs btn-default','escape'=>false)); ?>
                                                <?php } ?>
                                                <?php if($userrole_cus['delete']==1){ ?>
                                                <?php echo $this->Form->postLink('<i class="fa fa-times"></i>',array('action'=>'delete',$instrument['InstrumentType']['id']),array('data-toggle'=>'tooltip','title'=>'Delete','class'=>'btn btn-xs btn-danger','escape'=>false,'confirm'=>'Are you Sure?')); ?>
                                                <?php } ?>
                                            </div>
                                        </td>
                                    </tr>
                                    
                                    <?php endforeach; ?>
                                    
                                </tbody>
                            </table>
                            <?php echo $this->Html->script('pages/uiProgress'); ?>
                            <script>$(function(){ UiProgress.init(); });</script>
                            