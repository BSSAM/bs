<script>
var _ROOT ='<?PHP echo Router::url('/',true); ?>';
$(function() {
$('#status_call').change(function() {   // replace the ID_OF_YOUR_SELECT_BOX with the id to your select box given by Cake
       var val = $(this).val();  // val is the drug id
       window.location = _ROOT + 'Referedbys/index/' + val;
    });    
});
</script>
<h1>
                                <i class="gi gi-user"></i>Referred By
                            </h1>
                        </div>
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                        <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
                        <li><?php echo $this->Html->link('Referred By',array('controller'=>'Referedbys','action'=>'index')); ?></li>
                    </ul>
                    <!-- END Datatables Header -->
                     <?php echo $this->element('message');?>
                    <!-- Datatables Content -->
                    <div class="block full">
                        <div class="block-title">
                            <h2>List Of Referred By <?php if($deleted_val == '0'): echo "- Active"; elseif($deleted_val == '1'): echo "- InActive"; endif;?></h2>
                            <?php if($userrole_cus['add']==1){ ?>
                            <h2 style="float:right;"><?php echo $this->Html->link('Add Referred By',array('controller'=>'Referedbys','action'=>'add'),array('class'=>'btn btn-xs btn-primary','data-toggle'=>'tooltip','tile'=>'Add Referred By')); ?></h2>
                            <?php } ?>
                        </div>
                        

                        <div class="table-responsive">
                            <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <!--<th class="text-center"><i class="gi gi-user"></i></th>-->
                                        <th class="text-center">Referred By</th>
                                        <th class="text-center">Description</th>
                                        
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     <?php foreach($referedby as $referedby_list): ?>
                                    <tr <?php if($referedby_list['Referedby']['is_deleted'] == 0):?> class="success" <?php else:?> class="error" <?php endif; ?>>
                                        <td class="text-center"><?php echo $referedby_list['Referedby']['id']; ?></td>
                                        <!--<td class="text-center"><img src="img/placeholders/avatars/avatar4.gif" alt="avatar" class="img-circle"></td>-->
                                        <td class="text-center"><a href="javascript:void(0)"><?php echo $referedby_list['Referedby']['referedby']; ?></a></td>
                                        <td class="text-center"><?php echo $referedby_list['Referedby']['description']; ?></td>
                                      <?php if($deleted_val != 1): ?>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <?php if($userrole_cus['edit']==1){ ?>
                                                <?PHP echo $this->html->link('<i class="fa fa-pencil"></i>',array('controller'=>'Referedbys',
                                                    'action'=>'edit',$referedby_list['Referedby']['id']),array('title'=>'Edit',
                                                        'class'=>'btn btn-xs btn-default','data-toggle'=>'tooltip','escape'=>false)); ?>
                                                <?php } ?>
                                                <?php if($userrole_cus['delete']==1){ ?>
                                                <?PHP echo $this->Form->postlink('<i class="fa fa-times"></i>',array('controller'=>'Referedbys',
                                                    'action'=>'delete',$referedby_list['Referedby']['id']),array('title'=>'Delete',
                                                        'class'=>'btn btn-xs btn-danger','data-toggle'=>'tooltip','escape'=>false,'confirm'=>'Are you sure want to delete?')); ?>
                                                <?php } ?>
                                               </div>
                                        </td>
                                        <?php endif; ?>
                                    <?php if($deleted_val == 1): ?>
                                         <td class="text-center" style="width: 250px;">
                                            <div class="btn-group ">
                                                
                                                <?PHP echo $this->Form->postlink('<i class="fa fa-undo"></i>',array('controller'=>'Referedbys',
                                                    'action'=>'retrieve',$referedby_list['Referedby']['id']),array('title'=>'Retrieve',
                                                        'class'=>'btn btn-xs btn-warning','data-toggle'=>'tooltip','escape'=>false,'confirm'=>'Are you sure want to Retrieve?')); ?>
                                            </div>
                                        </td>
                                    <?php endif; ?>
                                    </tr>
                                    <?php endforeach; ?>
                                    
                                   
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="6">
                                            <div class="btn-group btn-group-md pull-right">
                                                <?php echo $this->Form->input('status', array('id'=>'status_call','class'=>'form-control','label'=>false,'name'=>'status_call','type'=>'select','options'=>array('0'=>'Active','1'=>'InActive'),'empty'=>'Select Status')); ?>
                                            </div>
                                        </td>
                                    </tr>
                                </tfoot>
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
                                        
                                        $.bootstrapGrowl('Refered By is Added Successfully!', {
                                            type: growlType,
                                            allow_dismiss: true
                                        });
                                        
                                        $(this).prop('disabled', true);
                                    }
                                };
                            }();
                            
                            
                            </script> 
                            <?php } ?>