<?php 
//pr($this->Session->read('Config.time'));exit;
?>

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
    $('.add_quotation').editable(path_url+'/Instrumentforgroups/add_group_quotation', {
         id        : 'data[Instrumentforgroup][id]',
         name      : 'data[Instrumentforgroup][delay]',
         group     : 'quotation',
         type      : 'text',
         tooltip   : 'Click to edit the title'
    });
    $('.add_salesorder').editable(path_url+'/Instrumentforgroups/add_group_salesorder', {
         id        : 'data[Instrumentforgroup][id]',
         name      : 'data[Instrumentforgroup][delay]',
         type      : 'text',
         tooltip   : 'Click to edit the title'
    });
    $('.add_deliveryorder').editable(path_url+'/Instrumentforgroups/add_group_deliveryorder', {
         id        : 'data[Instrumentforgroup][id]',
         name      : 'data[Instrumentforgroup][delay]',
         type      : 'text',
         tooltip   : 'Click to edit the title'
    });
    $('.add_invoice').editable(path_url+'/Instrumentforgroups/add_group_invoice', {
         id        : 'data[Instrumentforgroup][id]',
         name      : 'data[Instrumentforgroup][delay]',
         type      : 'text',
         tooltip   : 'Click to edit the title'
    });
    $('.add_purchaseorder').editable(path_url+'/Instrumentforgroups/add_group_purchaseorder', {
         id        : 'data[Instrumentforgroup][id]',
         name      : 'data[Instrumentforgroup][delay]',
         type      : 'text',
         tooltip   : 'Click to edit the title'
    });
    $('.add_subcontract').editable(path_url+'/Instrumentforgroups/add_group_subcontract', {
         id        : 'data[Instrumentforgroup][id]',
         name      : 'data[Instrumentforgroup][delay]',
         type      : 'text',
         tooltip   : 'Click to edit the title'
    });
    $('.add_proforma').editable(path_url+'/Instrumentforgroups/add_group_proforma', {
         id        : 'data[Instrumentforgroup][id]',
         name      : 'data[Instrumentforgroup][delay]',
         type      : 'text',
         tooltip   : 'Click to edit the title'
    });
    $('.add_porequisition').editable(path_url+'/Instrumentforgroups/add_group_porequisition', {
         id        : 'data[Instrumentforgroup][id]',
         name      : 'data[Instrumentforgroup][delay]',
         type      : 'text',
         tooltip   : 'Click to edit the title'
    });
    $('.add_recall').editable(path_url+'/Instrumentforgroups/add_group_recall', {
         id        : 'data[Instrumentforgroup][id]',
         name      : 'data[Instrumentforgroup][delay]',
         type      : 'text',
         tooltip   : 'Click to edit the title'
    });
    $('.add_onsite').editable(path_url+'/Instrumentforgroups/add_group_onsite', {
         id        : 'data[Instrumentforgroup][id]',
         name      : 'data[Instrumentforgroup][delay]',
         type      : 'text',
         tooltip   : 'Click to edit the title'
    });
});
</script>                
<h1>
    <i class="gi gi-user"></i>Add Instrument for Group
</h1>
</div>
</div>
<ul class="breadcrumb breadcrumb-top">
    <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
    <li><?php echo $this->Html->link('Instrument for Group',array('controller'=>'Instrumentforgroups','action'=>'index')); ?></li>
    <li><?php echo $this->Html->link('Add',array('controller'=>'Instrumentforgroups','action'=>'add')); ?></li>
</ul>
<!-- END Datatables Header -->

<!-- Datatables Content -->
<div class="block full">
    <div class="block-title">
        <h2>List Of Instrument for Group</h2>
    </div>
    <?php echo $this->Form->create('Description',array('class'=>'form-horizontal form-bordered','id'=>'form-group-add')); ?>
    <div class="table-responsive" ng-controller="Controller">
        <table class="table table-vcenter table-condensed table-bordered">
            <thead>
                <tr>
                    <th class="text-center">Instrument for Type</th>
                    <th class="text-center">Instrument for Name</th>
                </tr>
            </thead>
            <tbody>
                
                <?php  // foreach ($labs as $labs_list): 
                       // $description_id   =   $labs_list['Description']['id']; 
                       // $processing=   'data[Description][processing]['.$description_id.']';
                       // $checking=   'data[Description][checking]['.$description_id.']';
                       // $checked  =   $this->Labprocess->labperocess_checking($labs_list['Description']['id']);
                       // $processed =   $this->Labprocess->labperocess_processing($labs_list['Description']['id']);
                ?>
                    <?php // pr($labs_list); exit;?>

                <tr>
                    <td class="text-center">Quotation</td>
                    <td class="text-center add_quotation" id=""></td>
                </tr>
                <tr>
                    <td class="text-center">Sales Order</td>
                    <td class="text-center add_salesorder" id=""></td>
                </tr>
                <tr>
                    <td class="text-center">Delivery Order</td>
                    <td class="text-center add_deliveryorder" id=""></td>
                </tr>
                <tr>
                    <td class="text-center">Invoice</td>
                    <td class="text-center add_invoice" id=""></td>
                </tr>
                <tr>
                    <td class="text-center">Purchase Order</td>
                    <td class="text-center add_purchaseorder" id=""></td>
                </tr>
                <tr>
                    <td class="text-center">Sub-Contract Delivery Order</td>
                    <td class="text-center add_subcontract" id=""></td>
                </tr>
                <tr>
                    <td class="text-center">Proforma Invoice</td>
                    <td class="text-center add_proforma" id=""></td>
                </tr>
                <tr>
                    <td class="text-center">Purchase Requisition</td>
                    <td class="text-center add_porequisition" id=""></td>
                </tr>
                <tr>
                    <td class="text-center">Recall Service</td>
                    <td class="text-center add_recall" id=""></td>
                </tr>
                <tr>
                    <td class="text-center">On-Site Schedule</td>
                    <td class="text-center add_onsite" id=""></td>
                </tr>
                <?php //endforeach; ?>
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
