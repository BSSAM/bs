                            <h1>
                                <i class="fa fa-table"></i>Channel(Temperature)
                            </h1>
                        </div>
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                        <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
                        <li><?php echo $this->Html->link('Channel',array('controller'=>'Temperatures','action'=>'channel')); ?></li>
                    </ul>
                    <!-- END Datatables Header -->
                     <?php echo $this->element('message');?>
                    <!-- Datatables Content -->
                    <div class="block full">
                        <div class="block-title">
                            <h2>List Of Channels(Temperature)</h2>
                            <?php //if($userrole['add']==1){ ?>
                            <h2 style="float:right;"><?php echo $this->Html->link('Add channel',array('controller'=>'Temperatures','action'=>'channel/addchannel'),array('class'=>'btn btn-xs btn-primary','data-toggle'=>'tooltip','tile'=>'Add Relative humidity')); ?></h2>
                            <?php //} ?>
                        </div>
                        

                        <div class="table-responsive">
                            <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <!--<th class="text-center"><i class="gi gi-user"></i></th>-->
                                        <th class="text-center">Channel</th>
                                        <th class="text-center">Description</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($channel as $channel_list): ?>
                                       
                                    <tr <?php if($channel_list['Tempchannel']['status'] == 1):?> class="success" <?php else:?> class="error" <?php endif; ?>>
                                        <td class="text-center"><?php echo $channel_list['Tempchannel']['id'];?></td>
                                        <!--<td class="text-center"><img src="img/placeholders/avatars/avatar4.gif" alt="avatar" class="img-circle"></td>-->
                                        <td class="text-center"><?php echo $channel_list['Tempchannel']['channelname'];?></td>
                                        <td class="text-center"><?php echo $channel_list['Tempchannel']['description'];?></td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <?php //if($userrole['edit']==1){ ?>
                                                <?php echo $this->Html->link('<i class="fa fa-pencil"></i>',array('action'=>'channel/editchannel',$channel_list['Tempchannel']['id']),array('data-toggle'=>'tooltip','title'=>'Edit','class'=>'btn btn-xs btn-default','escape'=>false)); ?>
                                                <?php //} ?>
                                                <?php //if($userrole['delete']==1){ ?>
                                                <?php echo $this->Form->postLink('<i class="fa fa-times"></i>',array('action'=>'channel/deletechannel',$channel_list['Tempchannel']['id']),array('data-toggle'=>'tooltip','title'=>'Delete','class'=>'btn btn-xs btn-danger','escape'=>false,'confirm'=>'Are you Sure?')); ?>
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
                                
                                // Get random number function from a given channel
                                var getRandomInt = function(min, max) {
                                    return Math.floor(Math.random() * (max - min + 1)) + min;
                                };
                                
                                return {
                                    init: function() {
                                        
                                        var growlType = $(this).data('growl');
                                        
                                        $.bootstrapGrowl('channel is Added Successfully!', {
                                            type: growlType,
                                            allow_dismiss: true
                                        });
                                        
                                        $(this).prop('disabled', true);
                                    }
                                };
                            }();
                            
                            
                            </script> 
                            <?php } ?>