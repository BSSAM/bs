<script>
var _ROOT ='<?PHP echo Router::url('/',true); ?>';
$(function() {
$('#status_call').change(function() {   // replace the ID_OF_YOUR_SELECT_BOX with the id to your select box given by Cake
       var val = $(this).val();  // val is the drug id
       window.location = _ROOT + 'Instruments/index/' + val;
    });    
});
</script>
<h1>
                                <i class="fa fa-table"></i>Instruments
                            </h1>
                        </div>
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                        <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
                        <li><?php echo $this->Html->link('Instruments',array('controller'=>'Instruments','action'=>'index')); ?></li>
                    </ul>
                    <!-- END Datatables Header -->
                    <?php echo $this->element('message');?>
                    <!-- Datatables Content -->
                    <div class="block full">
                        <div class="block-title">
                            <h2>List Of Instruments <?php if($deleted_val == '2'): echo "- Pending Approval"; elseif($deleted_val == '3'): echo "- InActive"; elseif($deleted_val == '1'): echo "- Active"; endif;?></h2>
                            <?php if($userrole_cus['add']==1){ ?>
                            <h2 style="float:right;"><?php echo $this->Html->link('Add Instrument',array('controller'=>'Instruments','action'=>'add'),array('class'=>'btn btn-xs btn-primary','data-toggle'=>'tooltip','tile'=>'Add Instrument')); ?></h2>
                            <?php } ?>
                        </div>
                        <div class="table-responsive">
                            <table id="dofull-datatable" class="table table-vcenter table-condensed table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">Created On</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Description</th>
                                        <th class="text-center">Department</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($instruments as $instrument): ?>
                                       
                                    <tr <?php if($instrument['Instrument']['is_approved'] == 1):?> class="" <?php else:?> class="themed-color-fire" <?php endif; ?>>
                                        <td class="text-center"><?php echo $instrument['Instrument']['id'];?></td>
                                        
                                        <td class="text-center"><?php echo $this->Time->format('F jS, Y h:i A',$instrument['Instrument']['created']);?></td>
                                        <td class="text-center"><?php echo $instrument['Instrument']['name'];?></td>
                                        <td class="text-center"><?php echo $instrument['Instrument']['description'];?></td>
                                        <td class="text-center"><?php echo $instrument['Department']['departmentname'];?></td>
                                        <?php $status   =   ($instrument['Instrument']['status']==1)?'<span class="label label-success">Active</span>':'<span class="label label-danger">In Active</span>';?>
                                        <td class="text-center"><?PHP echo $status; ?></td>
                                        <?php if($deleted_val != 3): ?>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <?php if($userrole_cus['edit']==1){ ?>
                                                <?php echo $this->Html->link('<i class="fa fa-pencil"></i>',array('action'=>'edit',$instrument['Instrument']['id']),array('data-toggle'=>'tooltip','title'=>'Edit','class'=>'btn btn-xs btn-default','escape'=>false)); ?>
                                                <?php } ?>
                                                <?php if($userrole_cus['delete']==1){ ?>
                                                <?php echo $this->Form->postLink('<i class="fa fa-times"></i>',array('action'=>'delete',$instrument['Instrument']['id']),array('data-toggle'=>'tooltip','title'=>'Delete','class'=>'btn btn-xs btn-danger','escape'=>false,'confirm'=>'Are you Sure?')); ?>
                                                <?php } ?>
                                            </div>
                                        </td>
                                        <?php endif; ?>
                                        <?php if($deleted_val == 3): ?>
                                             <td class="text-center">
                                                <div class="btn-group ">

                                                    <?PHP echo $this->Form->postlink('<i class="fa fa-undo"></i>',array('action'=>'retrieve',$instrument['Instrument']['id']),array('title'=>'Retrieve',
                                                            'class'=>'btn btn-xs btn-warning','data-toggle'=>'tooltip','escape'=>false,'confirm'=>'Are you sure want to Retrieve?')); ?>
                                                </div>
                                            </td>
                                        <?php endif; ?>
                                    </tr>
                                    
                                    <?php endforeach; ?>
                                    
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="8">
                                            <div class="btn-group btn-group-md pull-right">
                                                <?php echo $this->Form->input('status', array('id'=>'status_call','class'=>'form-control','label'=>false,'name'=>'status_call','type'=>'select','options'=>array('1'=>'Active','2'=>'Pending Approval','3'=>'InActive'),'empty'=>'Select Status')); ?>
                                            </div>
                                        </td>
                                    </tr>
                                </tfoot>
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