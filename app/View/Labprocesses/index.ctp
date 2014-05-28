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
            <div class="block text-center"><h4>Total Qty</h4><p><code><?php echo $data_description_count; ?></code></p></div>
        </div>
        <div class="col-sm-2">
            <div class="block text-center"><h4>Pending Qty</h4><p><code><?php echo $data_pending_count; ?></code></p></div>
        </div>
        <div class="col-sm-2">
            <div class="block text-center"><h4>Processing Qty</h4><p><code><?php echo $data_processing_count; ?></code></p></div>
        </div>
        <div class="col-sm-2">
            <div class="block text-center"><h4>Checking Qty</h4><p><code><?php echo $data_checking_count; ?></code></p></div>
        </div>
        <div class="">
            <div class="col-sm-5">
                
                <div class="block">
                    <div class="block-title">
                        <h2><strong>SO</strong> List Status</h2>
                    </div>
                   <?PHP 
                   $options = array('out' => 'Outstanding SO List', 'run' => 'Running SO List','overdue'=>'Overdue SO List');
                   $attributes = array('legend' => false,'value'=>'out','class'=>'so_list_button','name'=>'solist');
                   echo $this->Form->radio('solist', $options, $attributes);
                   ?>
                </div>
                <div class="block">
                    <div class="block-title">
                        <h2><strong>Call</strong> Location</h2>
                    </div>
                    <?PHP 
                   $options = array('all' => 'All', 'inlab' => 'In Lab','subcontract'=>'Sub Contract','onsite'=>'On Site');
                   $attributes = array('legend' => false,'value'=>'all','class'=>'call_list_button','name'=>'calllocation');
                   echo $this->Form->radio('calllocation', $options, $attributes);
                   ?>
                    </div>
            </div>
        </div></div>
    <div class="table-responsive">
        <div class="so_paste">
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
                <?PHP if (!empty($labprocess)): ?>
                <?php foreach ($labprocess as $labprocess_list): ?>
                <tr>
                    <td class="text-center"><?PHP echo $labprocess_list['Salesorder']['salesorderno'] ?></td>
                    <td class="text-center"><?PHP echo $labprocess_list['Salesorder']['branchname'] ?></td>
                    <td class="text-center"><?PHP echo $labprocess_list['Salesorder']['customername'] ?></td>
                    <td class="text-center"><?PHP echo $labprocess_list['Salesorder']['priority'] ?></td>
                    <td class="text-center"><?PHP echo $this->Salesorder->query_total($labprocess_list['Salesorder']['salesorderno']) ?></td>
                    <td class="text-center"><?PHP echo $this->Salesorder->query_pending($labprocess_list['Salesorder']['salesorderno']) ?></td>
                    <td class="text-center"><?PHP echo $this->Salesorder->query_processing($labprocess_list['Salesorder']['salesorderno']) ?></td>
                    <td class="text-center"><?PHP echo $this->Salesorder->query_checking($labprocess_list['Salesorder']['salesorderno']) ?></td>
                    <td class="text-center">
                        <div class="btn-group">
                            <?php echo $this->Html->link('<i class="fa fa-pencil"></i>', array('action' => 'labs', $labprocess_list['Salesorder']['salesorderno']), array('data-toggle' => 'tooltip', 'title' => 'Edit', 'class' => 'btn btn-xs btn-default', 'escape' => false)); ?>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?PHP endif; ?>
            </tbody>
        </table>
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
