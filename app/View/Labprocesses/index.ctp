<?php 
        /////////////////
        // Dimentional 
        /////////////////
        $count_proc_1 = 0;
        if($dimensional_proc):
        foreach ($dimensional_proc as $dimensional_list):
            foreach ($dimensional_list['Description'] as $dimensional_list_val):
                if($dimensional_list_val):
                    //$dimensional_val = $dimensional_list_val;
                    $count_proc_1 = $count_proc_1+1; 
                else: 
                    $count_proc_1 =0; 
                endif;
            endforeach;
        endforeach;
        endif;
        $count_pend_1 = 0;
        if($dimensional_pend):
        foreach ($dimensional_pend as $dimensional_list):
            foreach ($dimensional_list['Description'] as $dimensional_list_val):
                if($dimensional_list_val):
                    //$dimensional_val = $dimensional_list_val;
                    $count_pend_1 = $count_pend_1+1; 
                else: 
                    $count_pend_1 =0; 
                endif;
            endforeach;
        endforeach;
        endif;
        $count_check_1 = 0;
        //pr($pressure_check);exit;
        if($dimensional_check):
        foreach ($dimensional_check as $dimensional_list):
            //pr($pressure_list['Description']);
            foreach ($dimensional_list['Description'] as $dimensional_list_val):
            //echo "old";
                if($dimensional_list_val):
                    //$dimensional_val = $dimensional_list_val;
                    $count_check_1 = $count_check_1+1; 
                else: 
                    $count_check_1 =0; 
                endif;
            endforeach;
        endforeach;
        endif;
        
        ////////////////////
        // Electrical
        ///////////////////
        
        $count_proc_3 = 0;
        
        if($electrical_proc):
        foreach ($electrical_proc as $electrical_list):
            foreach ($electrical_list['Description'] as $electrical_list_val):
                if($electrical_list_val):
                    $count_proc_3 = $count_proc_3+1; 
                else: 
                    $count_proc_3 =0; 
                endif;
            endforeach;
        endforeach;
        endif;
        $count_pend_3 = 0;
        if($electrical_pend):
        foreach ($electrical_pend as $electrical_list):
            foreach ($electrical_list['Description'] as $electrical_list_val):
                if($electrical_list_val):
                    $count_pend_3 = $count_pend_3+1; 
                else: 
                    $count_pend_3 =0; 
                endif;
            endforeach;
        endforeach;
        endif;
        $count_check_3 = 0;
        if($electrical_check):
        foreach ($electrical_check as $electrical_list):
            foreach ($electrical_list['Description'] as $electrical_list_val):
                if($electrical_list_val):
                    $count_check_3 = $count_check_3+1; 
                else: 
                    $count_check_3 =0; 
                endif;
            endforeach;
        endforeach;
        endif;
        
        ////////////////////
        // Pressure
        ///////////////////
        
        $count_proc_2 = 0;
        
        if($pressure_proc):
        foreach ($pressure_proc as $pressure_list):
            
            //pr($pressure_list);exit;
            foreach ($pressure_list['Description'] as $pressure_list_val):
            //pr($pressure_list_val);
                if($pressure_list_val):
                    //$dimensional_val = $dimensional_list_val;
                    $count_proc_2 = $count_proc_2+1; 
                else: 
                    $count_proc_2 =0; 
                endif;
            endforeach;
            //exit;//echo $count_proc_2;
        endforeach;
        endif;
        $count_pend_2 = 0;
        if($pressure_pend):
        foreach ($pressure_pend as $pressure_list):
            //pr($pressure_list['Description']);
            foreach ($pressure_list['Description'] as $pressure_list_val):
            //echo "old";
                if($pressure_list_val):
                    //$dimensional_val = $dimensional_list_val;
                    $count_pend_2 = $count_pend_2+1; 
                else: 
                    $count_pend_2 =0; 
                endif;
            endforeach;
        endforeach;
        endif;
        $count_check_2 = 0;
        //pr($pressure_check);exit;
        if($pressure_check):
        foreach ($pressure_check as $pressure_list):
            //pr($pressure_list['Description']);
            foreach ($pressure_list['Description'] as $pressure_list_val):
            //echo "old";
                if($pressure_list_val):
                    //$dimensional_val = $dimensional_list_val;
                    $count_check_2 = $count_check_2+1; 
                else: 
                    $count_check_2 =0; 
                endif;
            endforeach;
        endforeach;
        endif;
        ////////////////////
        // Temperature
        ///////////////////
        
        $count_proc_4 = 0;
        
        if($temperature_proc):
        foreach ($temperature_proc as $temperature_list):
            foreach ($temperature_list['Description'] as $temperature_list_val):
                if($temperature_list_val):
                    $count_proc_4 = $count_proc_4+1; 
                else: 
                    $count_proc_4 =0; 
                endif;
            endforeach;
        endforeach;
        endif;
        $count_pend_4 = 0;
        if($temperature_pend):
        foreach ($temperature_pend as $temperature_list):
            foreach ($temperature_list['Description'] as $temperature_list_val):
                if($temperature_list_val):
                    $count_pend_4 = $count_pend_4+1; 
                else: 
                    $count_pend_4 =0; 
                endif;
            endforeach;
        endforeach;
        endif;
        $count_check_4 = 0;
        if($temperature_check):
        foreach ($temperature_check as $temperature_list):
            foreach ($temperature_list['Description'] as $temperature_list_val):
                if($temperature_list_val):
                    $count_check_4 = $count_check_4+1; 
                else: 
                    $count_check_4 =0; 
                endif;
            endforeach;
        endforeach;
        endif;
        
        ////////////////////
        // Miscellaneous
        ///////////////////
        
        $count_proc_5 = 0;
        
        if($miscel_proc):
        foreach ($miscel_proc as $miscel_list):
            foreach ($miscel_list['Description'] as $miscel_list_val):
                if($miscel_list_val):
                    $count_proc_5 = $count_proc_5+1; 
                else: 
                    $count_proc_5 =0; 
                endif;
            endforeach;
        endforeach;
        endif;
        $count_pend_5 = 0;
        if($miscel_pend):
        foreach ($miscel_pend as $miscel_list):
            foreach ($miscel_list['Description'] as $miscel_list_val):
                if($miscel_list_val):
                    $count_pend_5 = $count_pend_5+1; 
                else: 
                    $count_pend_5 =0; 
                endif;
            endforeach;
        endforeach;
        endif;
        $count_check_5 = 0;
        if($miscel_check):
        foreach ($miscel_check as $miscel_list):
            foreach ($miscel_list['Description'] as $miscel_list_val):
                if($miscel_list_val):
                    $count_check_5 = $count_check_5+1; 
                else: 
                    $count_check_5 =0; 
                endif;
            endforeach;
        endforeach;
        endif;
        //Total
        ////////////////////
        // Dimentional
        ///////////////////
        
        $count_dimensional = 0;
        
        if($dimentional):
        foreach ($dimentional as $dimentional_list):
            foreach ($dimentional_list['Description'] as $dimentional_list_val):
                if($dimentional_list_val):
                    $count_dimensional = $count_dimensional+1; 
                else: 
                    $count_dimensional =0; 
                endif;
            endforeach;
        endforeach;
        endif;
        ////////////////////
        // Electrical
        ///////////////////
        $count_electrical = 0;
        if($electrical):
        foreach ($electrical as $electrical_list):
            foreach ($electrical_list['Description'] as $electrical_list_val):
                if($electrical_list_val):
                    $count_electrical = $count_electrical+1; 
                else: 
                    $count_electrical =0; 
                endif;
            endforeach;
        endforeach;
        endif;
        ////////////////////
        // Pressure
        ///////////////////        
        $count_pressure = 0;
        if($pressure):
        foreach ($pressure as $pressure_list):
            foreach ($pressure_list['Description'] as $pressure_list_val):
                if($pressure_list_val):
                    $count_pressure = $count_pressure+1; 
                else: 
                    $count_pressure =0; 
                endif;
            endforeach;
        endforeach;
        endif;
        ////////////////////
        // Temperature
        ///////////////////        
        $count_temperature = 0;
        if($temperature):
        foreach ($temperature as $temperature_list):
            foreach ($temperature_list['Description'] as $temperature_list_val):
                if($temperature_list_val):
                    $count_temperature = $count_temperature+1; 
                else: 
                    $count_temperature =0; 
                endif;
            endforeach;
        endforeach;
        endif;
        ////////////////////
        // Miscellaneous
        ///////////////////        
        $count_miscel = 0;
        if($miscellaneous):
        foreach ($miscellaneous as $miscellaneous_list):
            foreach ($miscellaneous_list['Description'] as $miscellaneous_list_val):
                if($miscellaneous_list_val):
                    $count_miscel = $count_miscel+1; 
                else: 
                    $count_miscel =0; 
                endif;
            endforeach;
        endforeach;
        endif;
    ?>
<script> var path_url='<?PHP echo Router::url('/',true); ?>';</script>
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
        <div class="col-sm-3 col-lg-13">
            <div class="block text-center"><h4>SO Count</h4><p><code><?php echo $salesordercount; ?></code></p></div>
        </div>
        <div class="col-sm-3 col-lg-13">
            <div class="block text-center"><h4>Total Qty</h4><p><code><?php echo  $count_dimensional+$count_electrical+$count_pressure+$count_temperature+$count_miscel; ?></code></p></div>
        </div>
        <div class="col-sm-3 col-lg-13">
            <div class="block text-center"><h4>Pending Qty</h4><p><code><?php echo $data_pending_count; ?></code></p></div>
        </div>
        <div class="col-sm-3 col-lg-13">
            <div class="block text-center"><h4>Processing Qty</h4><p><code><?php echo $data_processing_count; ?></code></p></div>
        </div>
        <div class="col-sm-3 col-lg-13">
            <div class="block text-center"><h4>Checking Qty</h4><p><code><?php echo $count_check_1+$count_check_2+$count_check_3+$count_check_4+$count_check_5; ?></code></p></div>
        </div>
        
        <div class="">
            <div class="col-sm-6">
                <div class="block">
                    <div class="block-title">
                        <h2><strong>SO</strong> List Status</h2>
                    </div>
                   <?PHP 
                   $options = array('out' => 'Outstanding SO List', 'run' => 'Running SO List','overdue'=>'Overdue SO List');?>
                   <?php      
                   $attributes = array('legend' => false,'value'=>'out','class'=>'so_list_button radio-align','name'=>'solist','id'=>'solist'); ?>
                   <?php      
                   echo $this->Form->radio('solist', $options, $attributes);
                   ?>

                </div>
            </div>
             <div class="col-sm-6">
                <div class="block">
                    <div class="block-title">
                        <h2><strong>Call</strong> Location</h2>
                    </div>
                    <?PHP 
                        $options = array('all' => 'All', 'Inlab' => 'In Lab','subcontract'=>'Sub Contract','onsite'=>'On Site');
                        $attributes = array('legend' => false,'value'=>'all','class'=>'call_list_button radio-align-call','name'=>'calllocation','id'=>'calllocation');
                        echo $this->Form->radio('calllocation', $options, $attributes);
                    ?>
                    </div>
            </div>
        </div>
        <div class="so_paste">
    <div class="col-sm-6 col-lg-12">
            
            <div class="block text-center"><div class="block-title" style="margin-bottom: 0px"><h4>Department</h4></div><div class="table-responsive">
                            <table class="table table-borderless table-condensed text-center">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th class="text-center">
                                           Dimensional
                                        </th>
                                        <th class="text-center">
                                            Electrical
                                        </th>
                                        <th class="text-center">
                                            Mechanical
                                        </th>
                                        <th class="text-center">
                                            Temperature
                                        </th>
                                        <th class="text-center">
                                            Miscellaneous
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th><code>Total</code></th>
                                        <?php 
//                                        $count = 0; 
//                                        
//                                            foreach ($dimensional as $dimensional_list):
//                                                foreach ($dimensional_list['Description'] as $dimensional_list_val):
//                                                    if($dimensional_list_val!=''):
//                                                        //$dimensional_val = $dimensional_list_val;
//                                                        $count+1; 
//                                                    else: 
//                                                        $dimensional_val =0; 
//                                                    endif;
//                                                endforeach;
//                                            endforeach; 
                                        ?>
                                        <td><?php echo $count_dimensional; ?></td>
                                        <td><?php echo $count_electrical; ?></td>
                                        <td><?php echo $count_pressure; ?></td>
                                        <td><?php echo $count_temperature; ?></td>
                                        <td><?php echo $count_miscel; ?></td>
                                    </tr>
                                    <tr>
                                        <th><code>pending</code></th>
                                        <td><?php echo $count_pend_1; ?></td>
                                        <td><?php echo $count_pend_3;?></td>
                                        <td><?php echo $count_pend_2;?></td>
                                        <td><?php echo $count_pend_4;?></td>
                                        <td><?php echo $count_pend_5;?></td>
                                    </tr>
                                    <tr>
                                        <th><code>processing</code></th>
                                        <td><?php echo $count_proc_1; ?></td>
                                        <td><?php echo $count_proc_3;?></td>
                                        <td><?php echo $count_proc_2;?></td>
                                        <td><?php echo $count_proc_4;?></td>
                                        <td><?php echo $count_proc_5;?></td>
                                    </tr>
                                    <tr>
                                        <th><code>checking</code></th>
                                        <td><?php echo $count_check_1; ?></td>
                                        <td><?php echo $count_check_3; ?></td>
                                        <td><?php echo $count_check_2; ?></td>
                                        <td><?php echo $count_check_4;?></td>
                                        <td><?php echo $count_check_5;?></td>
                                    </tr>
                                </tbody>
                                
                            </table>
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
               
                <?PHP //if (!empty($labprocess['Description'])): ?>
                <?php foreach ($labprocess as $labprocess_list): ?>
                <?php if (!empty($labprocess_list['Description'])): ?>
                <tr>
                    <td class="text-center"><?PHP echo $labprocess_list['Salesorder']['salesorderno'] ?></td>
                    <td class="text-center"><?PHP echo $labprocess_list['branch']['branchname'] ?></td>
                    <td class="text-center"><?PHP echo $labprocess_list['Customer']['Customertagname'] ?></td>
                    <td class="text-center"><?PHP echo $this->Labprocess->find_priority_type($labprocess_list['Customer']['priority_id']);?> </td>
                    <td class="text-center"><?PHP echo $this->Salesorder->query_total($labprocess_list['Salesorder']['salesorderno']) ?></td>
                    <td class="text-center"><?PHP echo $this->Salesorder->query_pending($labprocess_list['Salesorder']['salesorderno']) ?></td>
                    <td class="text-center"><?PHP echo $this->Salesorder->query_processing($labprocess_list['Salesorder']['salesorderno']) ?></td>
                    <td class="text-center"><?PHP echo $this->Salesorder->query_checking($labprocess_list['Salesorder']['salesorderno']) ?></td>
                    <td class="text-center">
                        <div class="btn-group">
                            <?php echo $this->Html->link('<i class="fa fa-pencil"></i>', array('action' => 'labs','out','all', $labprocess_list['Salesorder']['salesorderno']), array('data-toggle' => 'tooltip', 'title' => 'Edit', 'class' => 'btn btn-xs btn-default', 'escape' => false)); ?>
                        </div>
                    </td>
                </tr>
                <?php endif; ?>
                <?php endforeach; ?>
                <?PHP //endif; ?>
            </tbody>
        </table>
           </div>
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
            </script> 
        <?php } ?>
