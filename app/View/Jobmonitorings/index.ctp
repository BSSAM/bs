<script>
    var path_url='<?PHP echo Router::url('/',true); ?>';
</script>
<script type="text/javascript">
</script>                
<h1><i class="gi gi-user"></i>Job Monitoring</h1>
</div>
</div>
<ul class="breadcrumb breadcrumb-top">
    <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
    <li><?php echo $this->Html->link('Job Monitoring',array('controller'=>'Jobmonitorings','action'=>'index')); ?></li>
</ul>
<!-- END Datatables Header -->
    <?php echo $this->element('message');?>
<!-- Datatables Content -->
<div class="block full">
    <div class="table-responsive">
        <div class="so_paste">
        <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
            <thead>
                <tr>
                    <!--<th class="text-center"><i class="gi gi-user"></i></th>-->
                    <th class="text-center">Sales Orders No</th>
                    <th class="text-center">Due Date</th>
                    <th class="text-center">Reg.Date</th>
                    <th class="text-center">Branch Name</th>
                    <th class="text-center">Customer Name</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Total Qty</th>
                    <th class="text-center">P</th>
                    <th class="text-center">C</th>
                    <th class="text-center">R</th>
                    <th class="text-center">D</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?PHP if (!empty($salesorder_approved_list)): ?>
                <?php foreach ($salesorder_approved_list as $salesorder): ?>
                <tr>
                    <td class="text-center"><?PHP echo $salesorder['Salesorder']['salesorderno'] ?></td>
                    <td class="text-center"><?PHP echo $salesorder['Salesorder']['due_date'] ?></td>
                    <td class="text-center"><?PHP echo $salesorder['Salesorder']['reg_date'] ?></td>
                    <td class="text-center"><?PHP echo $salesorder['Salesorder']['branchname'] ?></td>
                    <td class="text-center"><?PHP echo $salesorder['Customer']['Customertagname']; ?></td>
                    <td class="text-center">
                    <?PHP 
                    $count_desc =  count($salesorder['Description']); 
                    $count_p = '' ; 
                    foreach ($salesorder['Description'] as $desc):  
                        if($desc['processing'] == '1'): 
                            $count_p++; 
                        endif; 
                    endforeach;
                    $count_c = '' ; 
                    foreach ($salesorder['Description'] as $desc):  
                        if($desc['checking'] == '1'): 
                            $count_c++; 
                        endif; 
                    endforeach;
                    $count_r = '' ; 
                    foreach ($salesorder['Description'] as $desc):  
                        if($desc['ready_deliver'] == '1'): 
                            $count_r++; 
                        endif; 
                    endforeach;
                    if($count_p ==  $count_desc):
                        $status = " Processing ";
                    endif;
                    if($count_c ==  $count_desc):
                        //echo "Ch";
                        $status = " Checking ";
                    endif;
                    if($count_r ==  $count_desc):
                        $status = " Ready To Deliver ";
                    endif;
                    
                    echo $status;
                    ?>
                    </td>
                    <td class="text-center"><?php $count_desc =  count($salesorder['Description']);  echo $count_desc;?></td>
                    <td class="text-center"><?PHP $count_p = '' ; foreach ($salesorder['Description'] as $desc):  if($desc['processing'] == '1'): $count_p++; endif; endforeach; if($count_p == ''): echo '0'; else: echo $count_p; endif;?></td>
                    <td class="text-center"><?PHP $count_c = '' ; foreach ($salesorder['Description'] as $desc):  if($desc['checking'] == '1'): $count_c++; endif; endforeach; if($count_c == ''): echo '0'; else: echo $count_c; endif;?></td>
                    <td class="text-center"><?PHP $count_r = '' ; foreach ($salesorder['Description'] as $desc):  if($desc['ready_deliver'] == '1'): $count_r++; endif; endforeach; if($count_r == ''): echo '0'; else: echo $count_r; endif;?></td>
                    <td class="text-center"><?PHP echo $salesorder['Salesorder']['branchname']; ?></td>
                    <td class="text-center">
                        <div class="btn-group">
                            <?php echo $this->Html->link('<i class="fa fa-pencil"></i>', array('action' => 'edit',$salesorder['Salesorder']['id']), array('data-toggle' => 'tooltip', 'title' => 'Edit', 'class' => 'btn btn-xs btn-default', 'escape' => false)); ?>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?PHP endif; ?>
            </tbody>
        </table>
        </div>
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