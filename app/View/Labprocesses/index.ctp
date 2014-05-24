<script>
    var path_url='<?PHP echo Router::url('/',true); ?>';
</script>

<script type="text/javascript">
   
    
</script>                

<h1>
    <i class="gi gi-user"></i>Lab Process
</h1>
</div>
</div>
<ul class="breadcrumb breadcrumb-top">
    <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
    <li><?php echo $this->Html->link('Labprocess',array('controller'=>'Labprocesses','action'=>'index')); ?></li>
</ul>
<!-- END Datatables Header -->

<!-- Datatables Content -->
<div class="block full">
    <div class="block-title">
        <h2>List Of Lab Processes</h2>
    </div>
    <div class="row">
        <div class="col-sm-2">
            <div class="block text-center"><h4>SO Count</h4><p><code><?php echo $salesordercount; ?></code></p></div>
        </div>
        <div class="col-sm-2">
            <div class="block text-center"><h4>Total Qty</h4><p><code><?php echo $count_data; ?></code></p></div>
        </div>
        <div class="col-sm-2">
            <div class="block text-center"><h4>Pending Qty</h4><p><code><?php echo $count_data; ?></code></p></div>
        </div>
        <div class="col-sm-2">
            <div class="block text-center"><h4>Pending Qty</h4><p><code>0</code></p></div>
        </div>
        <div class="col-sm-2">
            <div class="block text-center"><h4>Pending Qty</h4><p><code>0</code></p></div>
        </div>
        
        
        <div class="">
            <div class="col-sm-5">
                
                <div class="block">
                    <div class="block-title">
                        <h2><strong>SO</strong> List Status</h2>
                    </div>
                   
                                   <div class="radio">
                                                <label class="radio-inline" for="example-radio1">
                                                    <?php echo $this->Form->radio('solist',array('label'=>false)); ?>Outstanding SO List
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label class="radio-inline" for="example-radio2">
                                                    <?php echo $this->Form->radio('solist',array('label'=>false)); ?>Running SO List
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label class="radio-inline" for="example-radio3">
                                                     <?php echo $this->Form->radio('solist',array('label'=>false)); ?>Overdue SO List
                                                </label>
                                            </div>             
<!--                                                   <?php //echo $this->Form->radio('solist',array('label'=>false)); ?>Outstanding SO List-->
                                           
                                               
<!--                                                   <?php //echo $this->Form->radio('solist',array('label'=>false)); ?>Running SO List-->
                                          
<!--                                                   <?php //echo $this->Form->radio('solist',array('label'=>false)); ?>Overdue SO List-->
                                           
                                        
                                           
                                                
                                           
                                            
                                                
                                           
                                                
                                           
                </div>
<!--                    Outstanding SO List<?php //echo $this->Form->radio('solist',array('Label'=>false)); ?>  Running SO List<?php //echo $this->Form->radio('solist',array('Label'=>false)); ?>  Overdue SO List<?php //echo $this->Form->radio('solist',array('Label'=>false)); ?></div>-->
                <div class="block">
                    
                    <div class="block-title">
                        <h2><strong>Call</strong> Location</h2>
                    </div>
                    All <?php echo $this->Form->radio('calllocation',array('Label'=>false)); ?>  In-Lab<?php echo $this->Form->radio('calllocation',array('Label'=>false)); ?> Sub-Contract<?php echo $this->Form->radio('calllocation',array('Label'=>false)); ?>On Site<?php echo $this->Form->radio('calllocation',array('Label'=>false)); ?></div>
            </div>
            <!--                            <div class="col-sm-5">
                                            <div class="block"><p><code>.col-sm-2</code></p></div>
                                        </div>-->
            
        </div></div>
    
    <div class="table-responsive">
        <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
            <thead>
                <tr>
                    
                    <!--<th class="text-center"><i class="gi gi-user"></i></th>-->
                    <th class="text-center">Sales Orders No</th>
                    <th class="text-center">Branch Name</th>
                    <th class="text-center">Customer Name</th>
                    <th class="text-center">Priority</th>
                    <th class="text-center">Total Qty</th>
                    <th class="text-center">Pending Qty</th>
                    <th class="text-center">Processing Qty</th>
                    <th class="text-center">Checking Qty</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                                    <?PHP if(!empty($labprocess )): ?>
                                    <?php for($i=0;$i<$count_data;$i++) 
                                    {?>
                                     <?php foreach($labprocess as $labprocess_list): ?>
                
                <tr>
                    <td class="text-center"><?PHP echo $labprocess_list['Salesorder']['salesorderno'] ?></td>
                    <td class="text-center"><?PHP echo $labprocess_list['Salesorder']['branchname'] ?></td>
                    <td class="text-center"><?PHP echo $labprocess_list['Salesorder']['customername'] ?></td>
                    <td class="text-center"><?PHP echo $labprocess_list['Salesorder']['priority'] ?></td>
                    <td class="text-center"><?PHP echo $labprocess_list['Description'][$i]['sales_quantity'] ?></td>
                    <td class="text-center"><?PHP echo $labprocess_list['Description'][$i]['sales_quantity'] ?></td>
                    <td class="text-center"><?PHP echo $labprocess_list['Description'][$i]['processing'] ?></td>
                    <td class="text-center"><?PHP echo $labprocess_list['Description'][$i]['checking'] ?></td>
                    
                    <td class="text-center">
                        <div class="btn-group">
                                                <?php echo $this->Html->link('<i class="fa fa-pencil"></i>',array('action'=>'labs',$labprocess_list['Salesorder']['salesorderno']),array('data-toggle'=>'tooltip','title'=>'Edit','class'=>'btn btn-xs btn-default','escape'=>false)); ?>
                            
                            
                        </div>
                    </td>
                </tr>
                                    <?php endforeach;} ?>
                
                                    <?PHP endif; ?>
                
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
                                        
                                        
                                        
                    $.bootstrapGrowl('Sales Order Updated Successfully!', {
                        type: 'danger',
                        allow_dismiss: true
                    });
                                        
                    $(this).prop('disabled', true);
                                       
                }
            };
        }();
                            
                            
        </script> 
                            <?php } ?>
