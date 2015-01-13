                            <h1>
                                <i class="fa fa-table"></i>Template
                            </h1>
                        </div>
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                        <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
                        <li><?php echo $this->Html->link('Template',array('controller'=>'Temperatures','action'=>'template')); ?></li>
                    </ul>
                    <!-- END Datatables Header -->
                     <?php echo $this->element('message');?>
                    <!-- Datatables Content -->
                    <div class="block full">
                        <div class="block-title">
                            <h2>List Of Template</h2>
                            <?php //if($userrole['add']==1){ ?>
                            <h2 style="float:right;"><?php echo $this->Html->link('Add Template',array('controller'=>'Temperatures','action'=>'template/addtemplate'),array('class'=>'btn btn-xs btn-primary','data-toggle'=>'tooltip','tile'=>'Add Template')); ?></h2>
                            <?php //} ?>
                        </div>
                        

                        <div class="table-responsive">
                            <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <!--<th class="text-center"><i class="gi gi-user"></i></th>-->
                                        <th class="text-center">Instrument</th>
                                        <th class="text-center">Brand</th>
                                        <th class="text-center">Model</th>
                                        <th class="text-center">Range</th>
                                        <th class="text-center">Customer</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($template as $k=>$template_list): ?>
                                       
                                    <tr <?php if($template_list['Temptemplate']['status'] == 1):?> class="success" <?php else:?> class="error" <?php endif; ?>>
                                        <td class="text-center"><?php echo $k+1;?></td>
                                        <!--<td class="text-center"><img src="img/placeholders/avatars/avatar4.gif" alt="avatar" class="img-circle"></td>-->
                                        <td class="text-center"><?php echo $this->Temp->get_instrument_name($template_list['Temptemplate']['temp_instruments_id']);?></td>
                                        <td class="text-center"><?php echo $this->Temp->get_brand_name($template_list['Temptemplate']['brand_id']);?></td>
                                        <td class="text-center"><?php echo $template_list['Temptemplate']['model'];?></td>
                                        <td class="text-center"><?php echo $this->Temp->get_range_name($template_list['Temptemplate']['range_id']);?></td>
                                        <td class="text-center"><?php if($template_list['Temptemplate']['customer_id']!='') { echo $this->Temp->get_customer_name($template_list['Temptemplate']['customer_id']); } ?></td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <?php //if($userrole['edit']==1){ ?>
                                                <?php echo $this->Html->link('<i class="fa fa-pencil"></i>',array('action'=>'template/edittemplate',$template_list['Temptemplate']['temp_instruments_id'].'$'.$template_list['Temptemplate']['range_id'].'$'.$template_list['Temptemplate']['model'].'$'.$template_list['Temptemplate']['brand_id']),array('data-toggle'=>'tooltip','title'=>'Edit','class'=>'btn btn-xs btn-default','escape'=>false)); ?>
                                                <?php //} ?>
                                                <?php //if($userrole['delete']==1){ ?>
                                                <?php echo $this->Form->postLink('<i class="fa fa-times"></i>',array('action'=>'template/deletetemplate',$template_list['Temptemplate']['temp_instruments_id'].'$'.$template_list['Temptemplate']['range_id'].'$'.$template_list['Temptemplate']['model'].'$'.$template_list['Temptemplate']['brand_id']),array('data-toggle'=>'tooltip','title'=>'Delete','class'=>'btn btn-xs btn-danger','escape'=>false,'confirm'=>'Are you Sure?')); ?>
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