                            <h1>
                                <i class="gi gi-user"></i>Sales Persons
                            </h1>
                        </div>
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                        <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
                        <li><?php echo $this->Html->link('Sales Persons',array('controller'=>'Salespersons','action'=>'index')); ?></li>
                    </ul>
                    <!-- END Datatables Header -->

                    <!-- Datatables Content -->
                    <div class="block full">
                        <div class="block-title">
                            <h2>List Of Sales Persons</h2>
                            <?php if($userrole_cus['add']==1){ ?>
                            <h2 style="float:right;"><?php echo $this->Html->link('Add Sales Person',array('controller'=>'Salespersons','action'=>'add'),array('class'=>'btn btn-xs btn-primary','data-toggle'=>'tooltip','tile'=>'Add Sales Person')); ?></h2>
                            <?php } ?>
                        </div>
                        

                        <div class="table-responsive">
                            <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        
                                        <th class="text-center">Sales Person</th>
                                        <th class="text-center">Sales Person Code</th>
                                        <th class="text-center">Description</th>
                                        
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?PHP if (!empty($salesperson)): ?>
                                     <?php foreach($salesperson as $salesperson_list): ?>
                                    <tr>
                                        <td class="text-center"><?php echo $salesperson_list['Salesperson']['id']; ?></td>
                                        <td class="text-center"><?php echo $salesperson_list['Salesperson']['salesperson']; ?></td>
                                        <td class="text-center"><?php echo $salesperson_list['Salesperson']['salespersoncode']; ?></td>
                                        <td class="text-center" ><?php echo $salesperson_list['Salesperson']['description']; ?></td>
                                     
                                        <td class="text-center" style="width: 250px;">
                                            <div class="btn-group">
                                                <?php if($userrole_cus['edit']==1){ ?>
                                                 <?PHP echo $this->html->link('<i class="fa fa-pencil"></i>',array('controller'=>'Salespersons',
                                                    'action'=>'edit',$salesperson_list['Salesperson']['id']),array('title'=>'Edit',
                                                        'class'=>'btn btn-xs btn-default','data-toggle'=>'tooltip','escape'=>false)); ?>
                                                <?php } ?>
                                                <?php if($userrole_cus['delete']==1){ ?>
                                                <?PHP echo $this->Form->postlink('<i class="fa fa-times"></i>',array('controller'=>'Salespersons',
                                                    'action'=>'delete',$salesperson_list['Salesperson']['id']),array('title'=>'Delete',
                                                        'class'=>'btn btn-xs btn-danger','data-toggle'=>'tooltip','escape'=>false,'confirm'=>'Are you sure want to delete?')); ?>
                                                <?php } ?>
                                               </div>
                                        </td>
                                       
                                    </tr>
                                    <?php endforeach; ?>
                                     <?php else: ?>
                                        <tr>
                                            <td class="text-center">
                                                <i class="gi gi-keys"></i> Oops... No Salesperson Available
                                            </td>
                                        </tr>
                                        <?php endif; ?>
                                    
                                   
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
                                        
                                        $.bootstrapGrowl('Sales Person Added Successfully!', {
                                            type: growlType,
                                            allow_dismiss: true
                                        });
                                        
                                        $(this).prop('disabled', true);
                                    }
                                };
                            }();
                            
                            
                            </script> 
                            <?php } ?>