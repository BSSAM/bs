<script>
    var path_url='<?PHP echo Router::url('/',true); ?>';
</script>
<script type="text/javascript">
    $(function() {
    $('.edit_delay').editable(path_url+'/Labprocesses/update_delay', {
         id        : 'data[Description][id]',
         name      : 'data[Description][delay]',
         type      : 'text',
         cancel    : 'Cancel',
         submit    : 'Save',
         tooltip   : 'Click to edit the title'
    });
});
</script>                
<h1>
    <i class="gi gi-user"></i>Job Monitoring of <?php echo $job_sales_no; ?>
</h1>
</div>
</div>
<ul class="breadcrumb breadcrumb-top">
    <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
    <li><?php echo $this->Html->link('Job Monitoring',array('controller'=>'Jobmonitorings','action'=>'index')); ?></li>
    <li><?php echo $job_sales_no; ?></li>
</ul>
<!-- END Datatables Header -->

<!-- Datatables Content -->
<div class="block full">
    <div class="block-title">
        <h2>List Of Instruments</h2>
    </div>
    <?php echo $this->Form->create('Description',array('class'=>'form-horizontal form-bordered','id'=>'form-labs-add')); ?>
    <div class="table-responsive" ng-controller="Controller">
        <table  class="table table-vcenter table-condensed table-bordered">
            <thead>
                <tr>
                    <th class="text-center">S.No</th>
                    <th class="text-center">Description</th>
                    <th class="text-center" style="width: 70px;">P</th>
                    <th class="text-center" style="width: 70px;">C</th>
                    <th class="text-center" style="width: 70px;">Doc</th>
                    <th class="text-center" style="width: 70px;">R</th>
                     <th class="text-center" style="width: 70px;">S</th>
                    <th class="text-center" style="width: 70px;">D</th>
                    <th class="text-center" style="width: 70px;">Department</th>
                    <th class="text-center">Reason of Delay(if applicable)</th>
                </tr>
            </thead>
            <tbody>
                
                <?php foreach ($descriptions as $description): ?> 
                <?PHP  
                    $processing=  ($description['Description']['processing']==1)?'checked="checked"':'' ;
                    $checking=   ($description['Description']['checking']==1)?'checked="checked"':'' ;
                    $shipping=   ($description['Description']['shipping']==1)?'checked="checked"':'' ;
                    
                    if ($deliver_order != NULL):
                    if($description['Description']['ready_deliver']==1){
                        
                        $check_ready    =   'checked="checked"';
                        $dis_ready='disabled="disabled"';
                        
                    }else{
                        
                        $check_ready    = '';$dis_ready='';
                        
                    }
                    else:
                        $check_ready    =   'disabled="disabled"';
                        $dis_ready='disabled="disabled"';
                    endif;
               ?>
                <tr>
                    <td class="text-center"><?PHP echo $description['Description']['id']; ?></td>
                    <td class="text-center"><?PHP echo $description['Instrument']['name']; ?></td>
                    <td class="text-center">
                            <?PHP echo $this->Form->input('Description.processing', array('label' => false, 'id' => 'checking', 'type' => 'checkbox', 'class' => $description['Description']['salesorder_id'],'disabled'=>'disabled','value'=>$description['Description']['processing'],$processing )); ?></td>
                    <td class="text-center">
                            <?PHP echo $this->Form->input('Description.checking', array('label' => false, 'id' => 'checking', 'type' => 'checkbox', 'class' => $description['Description']['salesorder_id'],'disabled'=>'disabled','value'=>$description['Description']['checking'],$checking)); ?></td>
                    <td class="text-center">
                        <?php 
                        //pr($deliver_order);exit;
                            if ($deliver_order != NULL):
                                foreach ($deliver_order as $deliver_list):
                                    if ($deliver_list['Deliveryorder']['is_approved'] == 1):
                                        $delivery_delivery = true;
                                        $dis = 'enabled';
                                    elseif ($deliver_list['Deliveryorder']['is_approved'] != '' && $deliver_list['Deliveryorder']['is_approved'] != 1):
                                        //echo $deliver_list['Deliveryorder']['is_approved'];
                                        $delivery_delivery = false;
                                        $dis = 'readonly';
                                    endif;

                                endforeach;
                            else:
                                $delivery_delivery = false;
                                $dis = 'readonly';
                            endif;
                            ?>
                            <?PHP echo $this->Form->input('document', array('name'=>'document','label' => false, 'id' => 'document', 'type' => 'checkbox', 'class' => $description['Description']['salesorder_id'],'disabled'=>'disabled', 'checked'=> $delivery_delivery)); ?></td>
                       
                    <td class="text-center">
                            <?PHP echo $this->Form->input('Description.ready_deliver[]', array('label' => false, 'id' => 'ready', 'type' => 'checkbox','value'=>$description['Description']['id'], 'class' => $description['Description']['salesorder_id'],$dis_ready,'name'=>'data[Description][ready_deliver][]',$check_ready)); ?></td>
                        <td class="text-center">
                            <?PHP echo $this->Form->input('Description.shipping', array('label' => false, 'id' => 'shipping', 'type' => 'checkbox', 'class' => $description['Description']['salesorder_id'],'disabled'=>'disabled','value'=>$description['Description']['shipping'],$shipping)); ?></td>
                   
                    <td class="text-center">
                         <?php 
//                            if ($deliver_order != NULL):
//                                foreach ($deliver_order as $deliver_list):
//                                    if ($deliver_list['Deliveryorder']['job_finished'] == 1):
//                                        $job_finished = true;
//                                    elseif ($deliver_list['Deliveryorder']['job_finished'] != '' && $deliver_list['Deliveryorder']['job_finished'] != 1):
//                                        $job_finished = false;
//                                    endif;
//
//                                endforeach;
//                            else:
//                                $job_finished = false;
//                            endif;
                         //$description['Description']['shipping']
                                  if ($description['Description']['shipping'] == 1):
//                                foreach ($deliver_order as $deliver_list):
//                                    if ($deliver_list['Deliveryorder']['job_finished'] == 1):
                                        $job_finished = true;
//                                    elseif ($deliver_list['Deliveryorder']['job_finished'] != '' && $deliver_list['Deliveryorder']['job_finished'] != 1):
//                                        $job_finished = false;
//                                    endif;

                               // endforeach;
                            else:
                                $job_finished = false;
                            endif;
                            ?>
                            <?PHP echo $this->Form->input('Description.delivered', array('label' => false, 'id' => 'checking', 'type' => 'checkbox', 'class' => $description['Description']['salesorder_id'],'disabled'=>'disabled','checked'=>$job_finished)); ?></td>
                    <td class="text-center"><?PHP echo $description['Department']['departmentname']; ?></td>
                    <td class="text-center edit_delay" id="<?PHP echo $description['Description']['id']; ?>"><?PHP echo $description['Description']['delay']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table> 
    </div>
    <div class="form-group form-actions">
        <div class="pull-left"><code>Note:</code> P - Processing , C - Checking ,Doc - Delivery Approved ,R - Ready to Deliver ,S - In Transit , D - Job Done </div>
        <div class="col-md-9 col-md-offset-10">
            <?php echo $this->Form->button('<i class="fa fa-angle-right"></i> Submit', array('type' => 'submit', 'class' => 'btn btn-sm btn-primary sales_submit', 'escape' => false)); ?>
        </div>
    </div>
    <?php echo $this->Form->end(); ?>
</div>
<!-- panel -->
<?php echo $this->Form->end(); ?>
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
