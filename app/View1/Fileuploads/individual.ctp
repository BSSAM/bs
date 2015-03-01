
<h1>
    <i class="gi gi-user"></i><?PHP echo $customer_quotation['Quotation']['customername']; ?>
</h1>
</div>
</div>
<ul class="breadcrumb breadcrumb-top">
    <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
    <li><?php echo $this->Html->link('Customers',array('controller'=>'Fileuploads','action'=>'index')); ?></li>
    <li><?php echo $this->Html->link('Quotation List',array('controller'=>'Fileuploads','action'=>'Customer_quotation_list',$customer_quotation['Quotation']['customer_id'])); ?></li>
    <li>Upload your files</li>
</ul>
<!-- END Forms General Header -->
<div class="row">
    <div class="col-md-12">
        <!-- Basic Form Elements Block -->
        <div class="block">
            <!-- Basic Form Elements Title -->
            <div class="block-title">
                <h2>Upload your files for <?PHP echo $customer_quotation['Quotation']['quotationno']; ?></h2>
            </div>
            <!-- END Form Elements Title -->
            <!-- Basic Form Elements Content -->
            <div class="panel panel-default">
                <div class="panel-body panel-body-nopadding">
                    <!-- BASIC WIZARD -->
                    <div id="basicWizard" class="basic-wizard">
                        <ul class="nav nav-pills nav-justified " data-toggle="tabs" id="tabs">
                            <li class="active"><a href="#tab1" data-toggle="tab"> Individual File Upload</a></li>
                       </ul>
                        <div class="nav-pills-border-color"></div>
                        <br><br>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="val_job_type">Select Job Type</label>
                            <div class="col-md-4">
                                <?php echo $this->Form->input('jobtype', array('id' => 'val_job_type', 'class' => 'select-chosen required', 'options' =>array('Quotation'=>'Quotation ','Purchase order'=>'Purchase order ','Salesorder'=>'Sales Order','Delivery order'=>'Delivery Order','Invoice'=>'Invoice'), 'label' => false,'empty'=>'Please Select the Job Type', 'name' => 'jobtype_id', 'style' => 'width: 250px; display: none;')); ?>
                            </div>
                        </div>
                        <br><br>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab1">
                                <?PHP echo $this->element('Fileuploads/individual'); ?>
                    </div><!-- panel-body -->
                   
                </div>
                <!-- panel -->
            </div>
            
            <!-- END Basic Form Elements Block -->
        </div>
    </div>
   
    <!-- END Basic Form Elements Content -->
</div>
 <?php echo $this->Form->create('Customer',array('class'=>'form-horizontal form-bordered','id'=>'form-customer-address-add')); ?>
  <div id="modal-registered" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="modal-title">Registered Address</h3>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <?php echo $this->Form->input('regaddress', array('id'=>'val_regaddress','class'=>'form-control','placeholder'=>'Enter the Registered Address','label'=>false,'name'=>'regaddress')); ?>
                    <span class="help-block_login project_name_error">Enter the Registered Address</span>
                    </div>
                </div>
                <div class="modal-footer">
<!--                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>-->
                    <?php  echo $this->Form->button('<i class="fa fa-angle-right"></i> Save changes',array('type'=>'button','class'=>'btn btn-sm btn-primary','id'=>'save_regadd','escape' => false)); ?>
                    
                </div>
            </div>
        </div>
    </div>
  <?php echo $this->Form->end(); ?>
<?php echo $this->Form->create('Customer',array('class'=>'form-horizontal form-bordered','id'=>'form-customer-billing-add')); ?>
  <div id="modal-billing" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="modal-title">Billing Address</h3>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <?php echo $this->Form->input('billaddress', array('id'=>'val_billaddress','class'=>'form-control','placeholder'=>'Enter the Billing Address','label'=>false,'name'=>'billaddress')); ?>
                    <span class="help-block_login project_name_error">Enter the Billing Address</span>
                    </div>
                </div>
                <div class="modal-footer">
<!--                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>-->
                    <?php  echo $this->Form->button('<i class="fa fa-angle-right"></i> Save changes',array('type'=>'button','class'=>'btn btn-sm btn-primary','id'=>'save_billadd','escape' => false)); ?>
                    
                </div>
            </div>
        </div>
    </div>
  <?php echo $this->Form->end(); ?>

<?php echo $this->Form->create('Customer',array('class'=>'form-horizontal form-bordered','id'=>'form-customer-delivery-add')); ?>
  <div id="modal-delivery" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="modal-title">Delivery Address</h3>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <?php echo $this->Form->input('deliveryaddress', array('id'=>'val_deliveryaddress','class'=>'form-control','placeholder'=>'Enter the Delivery Address','label'=>false,'name'=>'deliveryaddress')); ?>
                    <span class="help-block_login project_name_error">Enter the Delivery Address</span>
                    </div>
                </div>
                <div class="modal-footer">
<!--                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>-->
                    <?php  echo $this->Form->button('<i class="fa fa-angle-right"></i> Save changes',array('type'=>'button','class'=>'btn btn-sm btn-primary','id'=>'save_deliveryadd','escape' => false)); ?>
                    
                </div>
            </div>
        </div>
    </div>
  <?php echo $this->Form->end(); ?>

<?php echo $this->Form->create('Customer',array('class'=>'form-horizontal form-bordered','id'=>'form-customer-project-add')); ?>
  <div id="modal-project" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="modal-title">Project Name</h3>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <?php echo $this->Form->input('projectname', array('id'=>'val_projectname','class'=>'form-control','placeholder'=>'Enter the Project Name','label'=>false,'name'=>'projectname')); ?>
                    <span class="help-block_login project_name_error">Enter the Project Name</span>
                    </div>
                </div>
                <div class="modal-footer">
<!--                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>-->
                    <?php  echo $this->Form->button('<i class="fa fa-angle-right"></i> Save changes',array('type'=>'button','class'=>'btn btn-sm btn-primary','id'=>'save_projectadd','escape' => false)); ?>
                    
                </div>
            </div>
        </div>
    </div>
  <?php echo $this->Form->end(); ?>


    <?php echo $this->Html->script('pages/formsValidation'); ?>
    <script>$(function(){ FormsValidation.init(); });</script>
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

