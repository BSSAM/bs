<?php 
        // Dimentional 
        
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
        
        // Pressure
        
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
    ?>
<script>
     $('#solistvariation-datatable').dataTable({
             // "aoColumnDefs": [ { "bSortable": false, "aTargets": [ 1, 5 ] } ],
                "iDisplayLength": 5,
                "aLengthMenu": [[5,10, 20, 30, -1], [5,10, 20, 30, "All"]]
            });
    </script>
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
                                            Pressure
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
                                        <td><?php //echo $count; ?></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th><code>pending</code></th>
                                        <td><?php echo $count_pend_1; ?></td>
                                        <td></td>
                                        <td><?php echo $count_pend_2;?></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th><code>processing</code></th>
                                        <td><?php echo $count_proc_1; ?></td>
                                        <td></td>
                                        <td><?php echo $count_proc_2;?></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th><code>checking</code></th>
                                        <td></td>
                                        <td></td>
                                        <td><?php echo $count_check_2; ?></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                                
                            </table>
                        </div></div>
        
    
    <div class="table-responsive">
<table id="solistvariation-datatable" class="table table-vcenter table-condensed table-bordered">
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
                <?PHP //pr($labprocess);exit; ?>
                <?PHP if (!empty($labprocess)): ?>
                <?php foreach ($labprocess as $labprocess_list): ?>
                <?PHP if(!empty($labprocess_list['Description'])): ?>
                <tr>
                    
                    <td class="text-center"><?PHP echo $labprocess_list['Salesorder']['salesorderno'] ?></td>
                    <td class="text-center"><?PHP echo $labprocess_list['branch']['branchname'] ?></td>
                    <td class="text-center"><?PHP echo $labprocess_list['Customer']['Customertagname'] ?></td>
                    <td class="text-center"><?PHP echo $this->Labprocess->find_priority_type($labprocess_list['Customer']['priority_id']) ?></td>

                    <td class="text-center"><?PHP echo $this->Salesorder->call_query_total($labprocess_list['Salesorder']['salesorderno'],$call_location) ?></td>
                    <td class="text-center"><?PHP echo $this->Salesorder->call_query_pending($labprocess_list['Salesorder']['salesorderno'],$call_location) ?></td>
                    <td class="text-center"><?PHP echo $this->Salesorder->call_query_processing($labprocess_list['Salesorder']['salesorderno'],$call_location) ?></td>
                    <td class="text-center"><?PHP echo $this->Salesorder->call_query_checking($labprocess_list['Salesorder']['salesorderno'],$call_location) ?></td>
<!--                    <td class="text-center"><?PHP //echo count($labprocess_list['Description']); ?></td>
                    <td class="text-center"><?PHP //echo count($labprocess_list['Description']);?></td>
                    <td class="text-center"><?PHP //echo count($labprocess_list['Description']); ?></td>-->

<!--                    <td class="text-center"><?PHP //echo $this->Salesorder->query_total($labprocess_list['Salesorder']['salesorderno']) ?></td>-->
<!--                    <td class="text-center"><?PHP //echo $this->Salesorder->query_pending($labprocess_list['Salesorder']['salesorderno'],$call_location) ?></td>
                    <td class="text-center"><?PHP //echo $this->Salesorder->query_processing($labprocess_list['Salesorder']['salesorderno'],$call_location) ?></td>
                    <td class="text-center"><?PHP //echo $this->Salesorder->query_checking($labprocess_list['Salesorder']['salesorderno'],$call_location) ?></td>-->
<!--                    <td class="text-center"><?PHP //echo count($labprocess_list['Description']); ?></td>-->
<!--                    <td class="text-center"><?PHP //echo $this->Salesorder->query_processing($labprocess_list['Salesorder']['salesorderno'])//count($labprocess_list['Description']);?></td>-->
<!--                    <td class="text-center"><?PHP //echo $this->Salesorder->query_checking($labprocess_list['Salesorder']['salesorderno']); ?></td>-->

                   
                    <td class="text-center">
                        <div class="btn-group">
                            <?php echo $this->Html->link('<i class="fa fa-pencil"></i>', array('action' => 'labs',$solist,$call_location, $labprocess_list['Salesorder']['salesorderno']), array('data-toggle' => 'tooltip', 'title' => 'Edit', 'class' => 'btn btn-xs btn-default', 'escape' => false)); ?>
                        </div>
                    </td>
                </tr>
                <?php endif; ?>
                <?php endforeach; ?>
                <?PHP  endif; ?>
            </tbody>
        </table>
         </div>
        </div>