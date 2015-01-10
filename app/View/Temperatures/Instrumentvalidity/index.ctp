                            <h1>
                                <i class="fa fa-table"></i>Relative humidity(Temperature)
                            </h1>
                        </div>
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                        <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
                        <li><?php echo $this->Html->link('Instrument validity',array('controller'=>'Temperatures','action'=>'instrumentvalidity')); ?></li>
                    </ul>
                    <!-- END Datatables Header -->
                     <?php echo $this->element('message');?>
                    <!-- Datatables Content -->
                    <div class="block full">
                        <div class="block-title">
                            <h2>List Of Instrument validity(Temperature)</h2>
                            <?php //if($userrole['add']==1){ ?>
                            <h2 style="float:right;"><?php echo $this->Html->link('Add instrumentvalidity',array('controller'=>'Temperatures','action'=>'instrumentvalidity/addinstrumentvalidity'),array('class'=>'btn btn-xs btn-primary','data-toggle'=>'tooltip','tile'=>'Add Relative humidity')); ?></h2>
                            <?php //} ?>
                        </div>
                        

                        <div class="table-responsive">
                            <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <!--<th class="text-center"><i class="gi gi-user"></i></th>-->
                                        <th class="text-center">Instrument</th>
                                        <th class="text-center">Duedate</th>
                                        <th class="text-center">validdays</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($instrumentvalidity as $instrumentvalidity_list): ?>
                                       
                                    <tr <?php if($instrumentvalidity_list['Tempinstrumentvalid']['status'] == 1):?> class="success" <?php else:?> class="error" <?php endif; ?>>
                                        <td class="text-center"><?php echo $instrumentvalidity_list['Tempinstrumentvalid']['id'];?></td>
                                        <!--<td class="text-center"><img src="img/placeholders/avatars/avatar4.gif" alt="avatar" class="img-circle"></td>-->
                                        <td class="text-center"><?php echo $instrumentvalidity_list['Tempinstrument']['instrumentname'];?></td>
                                        <td class="text-center"><?php echo $instrumentvalidity_list['Tempinstrumentvalid']['duedate'];?></td>
                                        <td class="text-center"><?php echo $instrumentvalidity_list['Tempinstrumentvalid']['validdays'];?></td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <?php //if($userrole['edit']==1){ ?>
                                                <?php echo $this->Html->link('<i class="fa fa-pencil"></i>',array('action'=>'instrumentvalidity/editinstrumentvalidity',$instrumentvalidity_list['Tempinstrumentvalid']['id']),array('data-toggle'=>'tooltip','title'=>'Edit','class'=>'btn btn-xs btn-default','escape'=>false)); ?>
                                                <?php //} ?>
                                                <?php //if($userrole['delete']==1){ ?>
                                                <?php echo $this->Form->postLink('<i class="fa fa-times"></i>',array('action'=>'instrumentvalidity/deleteinstrumentvalidity',$instrumentvalidity_list['Tempinstrumentvalid']['id']),array('data-toggle'=>'tooltip','title'=>'Delete','class'=>'btn btn-xs btn-danger','escape'=>false,'confirm'=>'Are you Sure?')); ?>
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
                                
                                // Get random number function from a given instrumentvalidity
                                var getRandomInt = function(min, max) {
                                    return Math.floor(Math.random() * (max - min + 1)) + min;
                                };
                                
                                return {
                                    init: function() {
                                        
                                        var growlType = $(this).data('growl');
                                        
                                        $.bootstrapGrowl('instrumentvalidity is Added Successfully!', {
                                            type: growlType,
                                            allow_dismiss: true
                                        });
                                        
                                        $(this).prop('disabled', true);
                                    }
                                };
                            }();
                            
                            
                            </script> 
                            <?php } ?>