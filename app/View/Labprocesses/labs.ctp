<script>
    var path_url='<?PHP echo Router::url('/',true); ?>';
//    
//    function Controller($scope, $http)
//    {
//        $scope.show_delay = true;
//        $scope.delay = "None";
//    }
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
    <i class="gi gi-user"></i>Lab Process of 
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
        <h2>List Of Instruments</h2>
    </div>
    <?php echo $this->Form->create('Description',array('class'=>'form-horizontal form-bordered','id'=>'form-labs-add')); ?>
    <div class="table-responsive" ng-controller="Controller">
        <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
            <thead>
                <tr>
                    <th class="text-center">Instrument</th>
                    <th class="text-center">Department</th>
                    <th class="text-center" style="width: 70px;">P</th>
                    <th class="text-center" style="width: 70px;">C</th>
                    <th class="text-center">Reason of Delay(if applicable)</th>
                </tr>
            </thead>
            <tbody>
                
                <?php foreach ($labs as $labs_list): ?> 
                <?PHP $description_id   =   $labs_list['Description']['id']; 
                       $processing=   'data[Description][processing]['.$description_id.']';
                       $checking=   'data[Description][checking]['.$description_id.']';
                      $checked  =   $this->Labprocess->labperocess_checking($labs_list['Description']['id']);
                      $processed =   $this->Labprocess->labperocess_processing($labs_list['Description']['id']);
                ?>
                    <?php // pr($labs_list); exit;?>
                <tr>
                    <td class="text-center"><?PHP echo $labs_list['Instrument']['name']; ?></td>
                    <td class="text-center"><?PHP echo $labs_list['Department']['departmentname']; ?></td>
                    <td class="text-center">
                            <?PHP echo $this->Form->input('Description.processing', array('label' => false, 'id' => 'checking', 'type' => 'checkbox', 'class' => $labs_list['Description']['salesorder_id'], 'name' => $processing,$processed)); ?></td>
                    <td class="text-center">
                            <?PHP echo $this->Form->input('Description.checking', array('label' => false, 'id' => 'checking', 'type' => 'checkbox', 'class' => $labs_list['Description']['salesorder_id'], 'name' => $checking,$checked)); ?></td>
                <!--<td class="text-center"><?PHP //echo $this->Form->input('Description.checking',array('label'=>false,'id'=>'checking','type'=>'checkbox','class'=>$labs_list['Description']['salesorder_id']));   ?></td>-->
                <td class="text-center edit_delay" id="<?PHP echo $labs_list['Description']['id']; ?>"><?PHP echo $labs_list['Description']['delay']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table> 
    </div>
    <div class="form-group form-actions">
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
