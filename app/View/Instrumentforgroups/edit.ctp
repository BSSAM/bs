 <h1><script>
    var path='<?PHP echo Router::url('/',true); ?>';
</script> <i class="gi gi-user"></i>Edit Instrument for Group </h1>
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
        <h2>Edit  <strong><?PHP echo $this->request->data['InstrumentType']['group_name']; ?></strong></h2>
    </div>
    <?php echo $this->Form->create('InstrumentType',array('class'=>'form-horizontal form-bordered','id'=>'form-group-add')); ?>
        <div class="block ">
    <div class="form-group">
            <label class="col-md-2 control-label" for="group_name">Group Name <span class="text-danger">*</span></label>
            <div class="col-md-4">
                <?php echo $this->Form->input('group_name', array('id'=>'group_name','class'=>'form-control','placeholder'=>'Enter the Group Name','label'=>false,)); ?>
            </div>
            <label class="col-md-2 control-label" for="group_description">Group Description</label>
            <div class="col-md-4">
                <?php echo $this->Form->textarea('group_description', array('id'=>'group_description','class'=>'form-control','placeholder'=>'Enter the Group Description','label'=>false)); ?>
            </div>
        </div>
        </div>
    <div class="block ">
    <div class="table-responsive" ng-controller="Controller">
        
            <div class="form-group">
                <label class="col-md-2 control-label" for="quotation">Quotation <span class="text-danger">*</span></label>
                <div class="col-md-4">
                    <?php echo $this->Form->textarea('quotation', array('id' => 'quotation', 'class' => 'form-control', 'placeholder' => 'Instrument Name for Quotation', 'label' => false)); ?>
                </div>
                <label class="col-md-2 control-label" for="branddescription">Salesorder <span class="text-danger">*</span></label>
                <div class="col-md-4">
                    <?php echo $this->Form->textarea('salesorder', array('id' => 'salesorder', 'class' => 'form-control', 'placeholder' => 'Instrument Name for Sales order', 'label' => false)); ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="deliveryorder">Delivery order <span class="text-danger">*</span></label>
                <div class="col-md-4">
                    <?php echo $this->Form->textarea('deliveryorder', array('id' => 'deliveryorder', 'class' => 'form-control', 'placeholder' => 'Instrument Name for Delivery order', 'label' => false)); ?>
                </div>
                <label class="col-md-2 control-label" for="invoice">Invoice <span class="text-danger">*</span></label>
                <div class="col-md-4">
                    <?php echo $this->Form->textarea('invoice', array('id' => 'invoice', 'class' => 'form-control', 'placeholder' => 'Instrument Name for Invoice', 'label' => false)); ?>
                </div>
            </div>
            
            
             <div class="form-group">
                <label class="col-md-2 control-label" for="purchaseorder">Purchase order <span class="text-danger">*</span></label>
                <div class="col-md-4">
                    <?php echo $this->Form->textarea('purchaseorder', array('id' => 'purchaseorder', 'class' => 'form-control', 'placeholder' => 'Instrument Name for Purchase order', 'label' => false)); ?>
                </div>
                <label class="col-md-2 control-label" for="performainvoice">Performa Invoice <span class="text-danger">*</span></label>
                <div class="col-md-4">
                    <?php echo $this->Form->textarea('performainvoice', array('id' => 'performainvoice', 'class' => 'form-control', 'placeholder' => 'Instrument Name for Performa Invoice', 'label' => false)); ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="subcontract_deliveryorder">Subcontract Delivery order <span class="text-danger">*</span></label>
                <div class="col-md-4">
                    <?php echo $this->Form->textarea('subcontract_deliveryorder', array('id' => 'subcontract_deliveryorder', 'class' => 'form-control', 'placeholder' => 'Instrument Name for Subcontract Delivery order', 'label' => false)); ?>
                </div>
                <label class="col-md-2 control-label" for="purchase_requisition">Purchase Requisition <span class="text-danger">*</span></label>
                <div class="col-md-4">
                    <?php echo $this->Form->textarea('purchase_requisition', array('id' => 'purchase_requisition', 'class' => 'form-control', 'placeholder' => 'Instrument Name for Purchase Requisition', 'label' => false)); ?>
                </div>
            </div>
             <div class="form-group">
                <label class="col-md-2 control-label" for="recall_service">Recall Service <span class="text-danger">*</span></label>
                <div class="col-md-4">
                    <?php echo $this->Form->textarea('recall_service', array('id' => 'recall_service', 'class' => 'form-control', 'placeholder' => 'Instrument Name for Recall Service', 'label' => false)); ?>
                </div>
                <label class="col-md-2 control-label" for="onsite_schedule">Onsite Schedule <span class="text-danger">*</span></label>
                <div class="col-md-4">
                    <?php echo $this->Form->textarea('onsite_schedule', array('id' => 'onsite_schedule', 'class' => 'form-control', 'placeholder' => 'Instrument Name for Onsite Schedule', 'label' => false)); ?>
                </div>
            </div>
        <div class="form-group">
            <label class="col-md-2 control-label" for="status">Status</label>
            <div class="col-md-4">
                <?php echo $this->Form->checkbox('status', array('id' => 'status', 'label' => false)); ?>
            </div>
        </div>

    </div>
        </div>
    <div class="form-group form-actions">
        <div class="col-md-9 col-md-offset-10">
            <?php //echo $this->Form->button('<i class="fa fa-angle-right"></i> Submit', array('type' => 'submit', 'class' => 'btn btn-sm btn-primary sales_submit', 'escape' => false)); ?>
        
        <?php echo $this->Form->input('InstrumentType.id', array('name'=>'group_id','id'=>'group_id','type'=>'hidden','value'=>$ins_dat['InstrumentType']['id'])); ?>
        <?php if($user_role['ins_instrumentforgroup']['edit'] == 1 && $ins_dat['InstrumentType']['is_approved']==0): ?>
        <?php if($user_role['app_instrumentgroup']['view'] == 1){ ?>
        <?php  echo $this->Form->button('<i class="fa fa-angle-right"></i> <b>Approve</b>',array('type'=>'button','class'=>'btn btn-sm btn-danger approve_group','escape' => false)); ?>
        <?php } else {?>
        <?php  echo $this->Form->button('<i class="fa fa-angle-right"></i> Submit',array('type'=>'submit','class'=>'btn btn-sm btn-primary sales_submit','escape' => false)); ?>
        <?php } ?>
        <?php else : ?>
        <?php  echo $this->Form->button('<i class="fa fa-angle-right"></i> Submit',array('type'=>'submit','class'=>'btn btn-sm btn-primary sales_submit','escape' => false)); ?>
        
        <?php endif; ?>
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
