<script>
var _ROOT ='<?PHP echo Router::url('/',true); ?>';
$(function() {
$('#status_call').change(function() {   // replace the ID_OF_YOUR_SELECT_BOX with the id to your select box given by Cake
       var val = $(this).val();  // val is the drug id
       window.location = _ROOT + 'Countries/index/' + val;
    });    
});
</script>                  
<h1>
                                <i class="fa fa-table"></i>Countries
                            </h1>
                        </div>
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                        <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
                        <li><?php echo $this->Html->link('Countries',array('controller'=>'Countries','action'=>'index')); ?></li>
                    </ul>
                    <!-- END Datatables Header -->
                     <?php echo $this->element('message');?>
                    <!-- Datatables Content -->
                    <div class="block full">
                        <div class="block-title">
                            <h2>List Of Country <?php if($deleted_val == '0'): echo "- Active"; elseif($deleted_val == '1'): echo "- InActive"; endif;?></h2>
                            <?php if($userrole['add']==1){ ?>
                            <h2 style="float:right;"><?php echo $this->Html->link('Add Country',array('controller'=>'Countries','action'=>'add'),array('class'=>'btn btn-xs btn-primary','data-toggle'=>'tooltip','tile'=>'Add Country')); ?></h2>
                            <?php } ?>
                        </div>
                        

                        <div class="table-responsive">
                            <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <!--<th class="text-center"><i class="gi gi-user"></i></th>-->
                                        <th class="text-center">Country Name</th>
                                        <th class="text-center">Country Code</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($country as $country_list): ?>
                                       
                                    <tr <?php if($country_list['Country']['is_deleted'] == 0):?> class="success" <?php else:?> class="error" <?php endif; ?>>
                                        <td class="text-center"><?php echo $country_list['Country']['id'];?></td>
                                        <!--<td class="text-center"><img src="img/placeholders/avatars/avatar4.gif" alt="avatar" class="img-circle"></td>-->
                                        <td class="text-center"><a href="javascript:void(0)"><?php echo $country_list['Country']['country'];?></a></td>
                                        <td class="text-center"><?php echo $country_list['Country']['countrycode'];?></td>
                                        <?php if($deleted_val != 1): ?>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <?php if($userrole['edit']==1){ ?>
                                                <?php echo $this->Html->link('<i class="fa fa-pencil"></i>',array('action'=>'edit',$country_list['Country']['id']),array('data-toggle'=>'tooltip','title'=>'Edit','class'=>'btn btn-xs btn-default','escape'=>false)); ?>
                                                <?php } ?>
                                                <?php if($userrole['delete']==1){ ?>
                                                <?php echo $this->Form->postLink('<i class="fa fa-times"></i>',array('action'=>'delete',$country_list['Country']['id']),array('data-toggle'=>'tooltip','title'=>'Delete','class'=>'btn btn-xs btn-danger','escape'=>false,'confirm'=>'Are you Sure?')); ?>
                                                <?php } ?>
                                            </div>
                                        </td>
                                        <?php endif; ?>
                                        <?php if($deleted_val == 1): ?>
                                             <td class="text-center" style="width: 250px;">
                                                <div class="btn-group ">

                                                    <?PHP echo $this->Form->postlink('<i class="fa fa-undo"></i>',array('action'=>'retrieve',$country_list['Country']['id']),array('title'=>'Retrieve',
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
                                        
                                        $.bootstrapGrowl('Country is Added Successfully!', {
                                            type: growlType,
                                            allow_dismiss: true
                                        });
                                        
                                        $(this).prop('disabled', true);
                                    }
                                };
                            }();
                            
                            
                            </script> 
                            <?php } ?>