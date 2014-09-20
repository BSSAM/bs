<script>
    var path_url='<?PHP echo Router::url('/',true); ?>';
</script>
               
<h1>
                                <i class="gi gi-user"></i>Proforma Invoice
                            </h1>
                        </div>
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                        <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
                        <li><?php echo $this->Html->link('Proforma Invoice',array('controller'=>'Proformas','action'=>'index')); ?></li>
                    </ul>
                    <!-- END Datatables Header -->
                    <?PHP echo $this->element('message'); ?>
                    <!-- Datatables Content -->
                    <div class="block full">
                        <div class="block-title">
                            <h2>List Of Proforma Invoice </h2> 
                            <h2 style="float:right;">
                            <?php echo $this->Html->link('Add Proforma Invoice', array('controller' => 'Proformas', 'action' => 'add'), array('class' => 'btn btn-xs btn-primary', 'data-toggle' => 'tooltip', 'tile' => 'Add Proforma Invoice')); ?></h2>
                        </div>
                        <div class="table-responsive">
                            <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                <thead>
                                    <tr>
                                        <!--<th class="text-center"><i class="gi gi-user"></i></th>-->
                                        
                                        <th class="text-center">ID</th>
                                        <th class="text-center">Sales Orders No</th>
                                        <th class="text-center">Reg Date</th>
                                        <th class="text-center">Branch</th>
                                        <th class="text-center">Customer</th>
                                        <th class="text-center">Phone</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Reference No</th>
                                        <th class="text-center">Download</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?PHP if(!empty($proforma )): ?>
                                     <?php foreach($proforma as $salesorder_list): ?>
                                    <tr>
                                        <td class="text-center"><?PHP echo $salesorder_list['Proforma']['id'] ?></td>
                                        <td class="text-center"><?PHP echo $salesorder_list['Proforma']['salesorderno'] ?></td>
                                        <td class="text-center"><?PHP echo $salesorder_list['Proforma']['reg_date'] ?></td>
                                        <td class="text-center"><?PHP echo $salesorder_list['Proforma']['branchname'] ?></td>
                                        <td class="text-center"><?PHP echo $salesorder_list['Proforma']['customername'] ?></td>
                                        <td class="text-center"><?PHP echo $salesorder_list['Proforma']['phone'] ?></td>
                                         <td class="text-center"><?PHP echo $salesorder_list['Proforma']['email'] ?></td>
                                        <td class="text-center"><?PHP echo $salesorder_list['Proforma']['ref_no'] ?></td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <?php //echo $this->Html->link('<i class="fa fa-pencil"></i>',array('action'=>'edit',$salesorder_list['Proforma']['id']),array('data-toggle'=>'tooltip','title'=>'Edit','class'=>'btn btn-xs btn-default','escape'=>false)); ?>
                                                
                                                
                                            </div>
                                            <?php echo $this->Form->postLink('PDF',array('action'=>'pdf',$salesorder_list['Proforma']['id']),array('data-toggle'=>'tooltip','title'=>'Download','class'=>'btn btn-xs btn-danger label','escape'=>false)); ?>
                                            <?php //echo $this->Form->postLink('XLS',array('action'=>'xls',$salesorder_list['Proforma']['id']),array('data-toggle'=>'tooltip','title'=>'Download','class'=>'btn btn-xs btn-danger label','escape'=>false)); ?>
                                            <?php //echo $this->Form->postLink('WORD',array('action'=>'word',$salesorder_list['Proforma']['id']),array('data-toggle'=>'tooltip','title'=>'Download','class'=>'btn btn-xs btn-danger label','escape'=>false)); ?>
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
