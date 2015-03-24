<script> var path_url='<?PHP echo Router::url('/',true); ?>';</script>
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
    <?php echo $this->Form->create('InstrumentType',array('class'=>'form-horizontal form-bordered','id'=>'form-group-add')); ?>
        <div class="block ">
    <div class="form-group">
            <label class="col-md-2 control-label" for="group_name">Group Name <span class="text-danger">*</span></label>
            <div class="col-md-4">
                <?php echo $this->Form->input('group_name', array('id'=>'group_name','class'=>'form-control','placeholder'=>'Enter the Group Name','label'=>false,'name'=>'group_name')); ?>
            </div>
            <label class="col-md-2 control-label" for="group_description">Group Description</label>
            <div class="col-md-4">
                <?php echo $this->Form->textarea('group_description', array('id'=>'group_description','class'=>'form-control','placeholder'=>'Enter the Group Description','label'=>false,'name'=>'group_description')); ?>
            </div>
        </div>
        </div>
    <div class="block ">
    <div class="table-responsive" ng-controller="Controller">
        
            <div class="form-group">
                <label class="col-md-2 control-label" for="quotation">Quotation <span class="text-danger">*</span></label>
                <div class="col-md-4">
                    <?php echo $this->Form->textarea('quotation', array('id' => 'quotation', 'class' => 'form-control', 'placeholder' => 'Instrument Name for Quotation', 'label' => false, 'name' => 'quotation')); ?>
                </div>
                <label class="col-md-2 control-label" for="salesorder">Salesorder <span class="text-danger">*</span></label>
                <div class="col-md-4">
                    <?php echo $this->Form->textarea('salesorder', array('id' => 'salesorder', 'class' => 'form-control', 'placeholder' => 'Instrument Name for Sales order', 'label' => false, 'name' => 'salesorder')); ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="deliveryorder">Delivery order <span class="text-danger">*</span></label>
                <div class="col-md-4">
                    <?php echo $this->Form->textarea('deliveryorder', array('id' => 'deliveryorder', 'class' => 'form-control', 'placeholder' => 'Instrument Name for Delivery order', 'label' => false, 'name' => 'deliveryorder')); ?>
                </div>
                <label class="col-md-2 control-label" for="invoice">Invoice <span class="text-danger">*</span></label>
                <div class="col-md-4">
                    <?php echo $this->Form->textarea('invoice', array('id' => 'invoice', 'class' => 'form-control', 'placeholder' => 'Instrument Name for Invoice', 'label' => false, 'name' => 'invoice')); ?>
                </div>
            </div>
            
            
             <div class="form-group">
                <label class="col-md-2 control-label" for="purchaseorder">Purchase order <span class="text-danger">*</span></label>
                <div class="col-md-4">
                    <?php echo $this->Form->textarea('purchaseorder', array('id' => 'purchaseorder', 'class' => 'form-control', 'placeholder' => 'Instrument Name for Purchase order', 'label' => false, 'name' => 'purchaseorder')); ?>
                </div>
                <label class="col-md-2 control-label" for="performainvoice">Performa Invoice <span class="text-danger">*</span></label>
                <div class="col-md-4">
                    <?php echo $this->Form->textarea('performainvoice', array('id' => 'performainvoice', 'class' => 'form-control', 'placeholder' => 'Instrument Name for Performa Invoice', 'label' => false, 'name' => 'performainvoice')); ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="subcontract_deliveryorder">Subcontract Delivery order <span class="text-danger">*</span></label>
                <div class="col-md-4">
                    <?php echo $this->Form->textarea('subcontract_deliveryorder', array('id' => 'subcontract_deliveryorder', 'class' => 'form-control', 'placeholder' => 'Instrument Name for Subcontract Delivery order', 'label' => false, 'name' => 'subcontract_deliveryorder')); ?>
                </div>
                <label class="col-md-2 control-label" for="purchase_requisition">Purchase Requisition <span class="text-danger">*</span></label>
                <div class="col-md-4">
                    <?php echo $this->Form->textarea('purchase_requisition', array('id' => 'purchase_requisition', 'class' => 'form-control', 'placeholder' => 'Instrument Name for Purchase Requisition', 'label' => false, 'name' => 'purchase_requisition')); ?>
                </div>
            </div>
             <div class="form-group">
                <label class="col-md-2 control-label" for="recall_service">Recall Service <span class="text-danger">*</span></label>
                <div class="col-md-4">
                    <?php echo $this->Form->textarea('recall_service', array('id' => 'recall_service', 'class' => 'form-control', 'placeholder' => 'Instrument Name for Recall Service', 'label' => false, 'name' => 'recall_service')); ?>
                </div>
                <label class="col-md-2 control-label" for="onsite_schedule">Onsite Schedule <span class="text-danger">*</span></label>
                <div class="col-md-4">
                    <?php echo $this->Form->textarea('onsite_schedule', array('id' => 'onsite_schedule', 'class' => 'form-control', 'placeholder' => 'Instrument Name for Onsite Schedule', 'label' => false, 'name' => 'onsite_schedule')); ?>
                </div>
            </div>
         <div class="form-group">
            <label class="col-md-2 control-label form-control-static" for="status">Status</label>
            <div class="col-md-4">
                <?php echo $this->Form->checkbox('status', array('id' => 'status', 'class' => 'form-control-static', 'label' => false, 'name' => 'status','checked')); ?>
            </div>
        </div>

            
    </div>
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
<?php echo $this->Html->script('pages/formsValidation'); ?>
<script>$(function(){ FormsValidation.init(); });</script>
