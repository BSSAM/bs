<script>
var _ROOT ='<?PHP echo Router::url('/',true); ?>';
$(function() {
$('#status_call').change(function() {   // replace the ID_OF_YOUR_SELECT_BOX with the id to your select box given by Cake
       var val = $(this).val();  // val is the drug id
       window.location = _ROOT + 'Quotations/index/' + val;
    });    
});
</script>
<h1>
                                <i class="gi gi-user"></i>Quotations
                            </h1>
                        </div>
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                        <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
                        <li><?php echo $this->Html->link('Quotations',array('controller'=>'Quotations','action'=>'index')); ?></li>
                    </ul>
                    <!-- END Datatables Header -->
                    <?PHP echo $this->element('message'); ?>
                    <!-- Datatables Content -->
                    
                    <div class="block full">
                        <div class="block-title">
                            <h2>List Of Quotations <?php if($deleted_val == '2'): echo "- Pending Approval"; elseif($deleted_val == '3'): echo "- InActive"; elseif($deleted_val == '1'): echo "- Active"; endif;?></h2>
                            <?php if($userrole_cus['add']==1){ ?>
                            <h2 style="float:right;"><?php echo $this->Html->link('Add Quotation',array('controller'=>'Quotations','action'=>'add'),array('class'=>'btn btn-xs btn-primary','data-toggle'=>'tooltip','tile'=>'Add Quotation')); ?></h2>
                            <?php } ?>
                        </div>
                       
                        <div class="table-responsive">
                            <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                <thead>
                                    <tr>
                                        <!--<th class="text-center"><i class="gi gi-user"></i></th>-->
                                        <th class="text-center">Quotation No</th>
                                        <th class="text-center">Reg Date</th>
                                        <th class="text-center">Branch</th>
                                        <th class="text-center">Customer</th>
                                        <th class="text-center">Phone</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Reference No</th>
                                        <?php if($deleted_val != 3): ?><th class="text-center">Action</th><?php endif; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?PHP if(!empty($quotation )):  ?>
                                     <?php foreach($quotation as $quotation_list): ?>
                                    <tr <?php if($quotation_list['Quotation']['is_approved'] == 1):?> class="" <?php else:?> class="themed-color-fire" <?php endif; ?>>
                                        <td class="text-center"><?PHP echo $quotation_list['Quotation']['quotationno'] ?></td>
                                        <td class="text-center"><?PHP echo $quotation_list['Quotation']['reg_date'] ?></td>
                                        <td class="text-center"><?PHP echo $quotation_list['branch']['branchname'] ?></td>
                                        <td class="text-center"><?PHP echo $quotation_list['Quotation']['customername'] ?></td>
                                        <td class="text-center"><?PHP echo $quotation_list['Quotation']['phone'] ?></td>
                                        <td class="text-center"><?PHP echo $quotation_list['Quotation']['email'] ?></td>
                                        <td class="text-center">
                                            <?PHP if($quotation_list['Quotation']['po_generate_type']=='Automatic'){$class="danger";}elseif($quotation_list['Quotation']['po_generate_type']=='Manual'){$class="success";}else{ $class="warning";} ?>
                                            
                                                <?PHP echo $quotation_list['Quotation']['ref_no'] ?>
                                                                                   </td>
                                        <?php if($deleted_val != 3): ?>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <?php if($userrole_cus['edit']==1){ ?>
                                                <?php echo $this->Html->link('<i class="fa fa-pencil"></i>',array('action'=>'edit',$quotation_list['Quotation']['id']),array('data-toggle'=>'tooltip','title'=>'Edit','class'=>'btn btn-xs btn-default','escape'=>false)); ?>
                                                <?php } ?>
                                               
                                            </div>
                                                <?php if($userrole_cus['delete']==1){ ?>
                                                <?php echo $this->Form->postLink('<i class="fa fa-times"></i>',array('action'=>'delete',$quotation_list['Quotation']['id']),array('data-toggle'=>'tooltip','title'=>'Delete','class'=>'btn btn-xs btn-danger','escape'=>false,'confirm'=>'Are you Sure?')); ?>
                                                <?php } ?>
                                                <?php // if($userrole_cus['view']==1){ ?>
                                                <?php //echo $this->Form->postLink('PDF',array('action'=>'pdf',$quotation_list['Quotation']['id']),array('data-toggle'=>'tooltip','title'=>'Download','class'=>'btn btn-xs btn-danger label','escape'=>false)); ?>
                                                <?php //} ?>
                                                <?php if($userrole_cus['view']==1 && $quotation_list['Quotation']['is_approved'] == 1){ ?>
                                                <?php echo $this->Form->postLink('<i class="gi gi-print"></i>',array('action'=>'pdf',$quotation_list['Quotation']['id']),array('data-toggle'=>'tooltip','title'=>'Report','class'=>'btn btn-xs btn-default','escape'=>false)); ?>
                                                <?php } ?>
                                                <?PHP //echo $this->html->link('View', array('url'=>'http://www.google.com'), array('title' => 'View','data-target'=>'#myModal','class' => 'btn btn-alt btn-xs btn-primary', 'data-toggle' => 'modal'));  ?>
<!--                                            <a href="Customers" data-target="#myModal" role="button" class="btn btn-default" data-toggle="modal">Launch First</a>-->
                                        </td>
                                        <?php endif; ?>
                                    </tr>
                                    <?php endforeach; ?>
                                    <?PHP endif; ?>
                                   
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
<!--                            <div class="modal hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    </div>
                                </div>
                            </div>-->
                        </div>
                    <?php echo $this->Html->script('pages/uiProgress'); ?>
                    <script>$(function(){ UiProgress.init(); });</script>
                    <?php if ($this->Session->flash() != '') { ?>
                        <script> var UiProgress = function() {
                            // Get random number function from a given range
                            var getRandomInt = function(min, max) {
                                return Math.floor(Math.random() * (max - min + 1)) + min;
                            };
                        }();
                        $('#modal').load('Customers').dialog('open');
                        </script> 
                    <?php } ?>
