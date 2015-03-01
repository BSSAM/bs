<h1>
    <i class="gi gi-user"></i><?PHP echo $customer_detatils['Customer']['Customertagname'] ?>
</h1>
</div>
</div>
<ul class="breadcrumb breadcrumb-top">
    <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
    <li><?php echo $this->Html->link('Customer',array('controller'=>'Fileuploads','action'=>'index')); ?></li>
    <li>Quotation Lists</li>
</ul>
<!-- END Datatables Header -->
            <?PHP echo $this->element('message');?>            
<!-- Datatables Content -->
<div class="block full">
    <div class="block-title">
        <h2>Quotation List</h2>
    </div>
    <div class="table-responsive">
        <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
            <thead>
                <tr>
                    <th class="text-center">Quotation No</th>
                    <th class="text-center">Track Id</th>
                    <th class="text-center">Registered Date</th>
                    <th class="text-center">Reference No</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?PHP if(!empty($customer_quotation_list)): ?>
                    <?php foreach($customer_quotation_list as $quotation): ?>
                                    <tr>
                                        <td class="text-center"><?php echo $quotation['Quotation']['quotationno'];?></td>
                                        <td class="text-center">
                                            <span class="label label-success">
                                              <?php echo $quotation['Quotation']['track_id'];?>
                                            </span>
                                        </td>
                                        <td class="text-center">
                                                <?php echo $quotation['Quotation']['reg_date'];?>
                                        </td>
                                           <td class="text-center">
                                               <span class="label label-warning">
                                                    <?php echo $quotation['Quotation']['ref_no'];?>
                                               </span>
                                           </td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <?php echo $this->Html->link('<i class="gi gi-sort"></i> Overall',array('action'=>'add',$quotation['Quotation']['quotationno']),array('data-toggle'=>'tooltip','title'=>'Upload files to '.$quotation['Quotation']['customername'],'class' => 'btn  btn-xs btn-primary','escape'=>false)); ?>
                                                <?php //echo $this->Form->postLink('<i class="fa fa-times"></i>',array('action'=>'delete',$clientpo_list['Clientpo']['quotation_id']),array('data-toggle'=>'tooltip','title'=>'Delete','class'=>'btn btn-xs btn-danger','escape'=>false,'confirm'=>'Are you Sure?')); ?>
                                            </div>
                                            <?php echo $this->Html->link('<i class="gi gi-file_import"></i> Individual',array('action'=>'individual',$quotation['Quotation']['quotationno']),array('data-toggle'=>'tooltip','title'=>'Upload files to '.$quotation['Quotation']['customername'],'class' => 'btn  btn-xs btn-primary','escape'=>false)); ?>
                                                
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                <?PHP endif; ?>
            </tbody>
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