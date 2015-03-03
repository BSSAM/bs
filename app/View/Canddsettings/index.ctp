     <script>
var _ROOT ='<?PHP echo Router::url('/',true); ?>';
$(function() {
$('#status_call').change(function() {   // replace the ID_OF_YOUR_SELECT_BOX with the id to your select box given by Cake
       var val = $(this).val();  // val is the drug id
       window.location = _ROOT + 'Canddsettings/index/' + val;
    });    
});
</script>
<h1>
                                <i class="fa fa-table"></i>CandD Setting 
                            </h1>
                        </div>
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                        <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
                        <li><?php echo $this->Html->link('C & D',array('controller'=>'Canddsettings','action'=>'index')); ?></li>
                    </ul>
                    <!-- END Datatables Header -->
                    <?php echo $this->element('message');?>
                    <!-- Datatables Content -->
                    <div class="block full">
                        <div class="block-title">
                            <h2>List Of Collection & Delivery Settings</h2>
                            <h2 style="float:right;"><?php echo $this->Html->link('Add C & D Settings',array('controller'=>'Canddsettings','action'=>'add'),array('class'=>'btn btn-xs btn-primary','data-toggle'=>'tooltip','tile'=>'Add C & D Settings')); ?></h2>
                        </div>
                        <div class="table-responsive">
                            <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">BRANCH</th>
                                        <th class="text-center">Max Task</th>
                                        <th class="text-center">Max Time</th>
                                        <th class="text-center">Purpose</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($canddsetting as $candd_list): ?>
                                    <tr <?php if($candd_list['Canddsetting']['status'] == 1):?> class="success" <?php else:?> class="error" <?php endif; ?>>
                                        <td class="text-center"><?php echo $this->Quotation->branchname($candd_list['Canddsetting']['branch_id']);?></td>
                                        <td class="text-center"><?php echo $candd_list['Canddsetting']['maxtask'];?></td>
                                        <td class="text-center"><?php echo $candd_list['Canddsetting']['maxtime'];?></td>
                                        <td class="text-center"><?php echo $candd_list['Canddsetting']['purpose'];?></td>
                                        
                                        <?php if($deleted_val != 1): ?>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <?php echo $this->Html->link('<i class="fa fa-pencil"></i>',array('action'=>'edit',$candd_list['Canddsetting']['id']),array('data-toggle'=>'tooltip','title'=>'Edit','class'=>'btn btn-xs btn-default','escape'=>false)); ?>
                                                <?php echo $this->Form->postLink('<i class="fa fa-times"></i>',array('action'=>'delete',$candd_list['Canddsetting']['id']),array('data-toggle'=>'tooltip','title'=>'Delete','class'=>'btn btn-xs btn-danger','escape'=>false,'confirm'=>'Are you Sure?')); ?>
                                            </div>
                                        </td>
                                        <?php endif; ?>
                                        <?php if($deleted_val == 1): ?>
                                             <td class="text-center" style="width: 250px;">
                                                <div class="btn-group ">

                                                    <?PHP echo $this->Form->postlink('<i class="fa fa-undo"></i>',array('action'=>'retrieve',$candd_list['Canddsetting']['id']),array('title'=>'Retrieve',
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
                                                <?php echo $this->Form->input('status', array('id'=>'status_call','class'=>'form-control','label'=>false,'name'=>'status_call','type'=>'select','options'=>array('0'=>'Active','1'=>'InActive'),'empty'=>'Select Status')); ?>
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
