<script>
    var path_url='<?PHP echo Router::url('/',true); ?>';
    var customer_id = '<?php echo $customer_id;?>';
    //$('#tabs_reg li:nth-child(1)').attr('class','active');
    
    $(document).on('click','.close',function(){
        var id=$(this).attr('id');
        var hre = $(this).parent('a').attr('href');
        $.ajax({
            type: 'POST',
            data:"delete_id="+id,
            url: path_url+'/customers/deleteregaddress/',
            success:function(data){
                if(data == 'deleted'){
                    $('#'+id).remove();
                    $(hre).remove();
                }
            }
        });
        
    });
     $(document).on('click','.close_bill',function(){
        var id=$(this).attr('id');
        var hre = $(this).parent('a').attr('href');
        $.ajax({
            type: 'POST',
            data:"delete_id="+id,
            url: path_url+'/customers/deletebilladdress/',
            success:function(data){
                if(data == 'deleted'){
                    $('#'+id).remove();
                    $(hre).remove();
                }
            }
        });
        
    });
    
    $(document).on('click','.close_delivery',function(){
        var id=$(this).attr('id');
        var hre = $(this).parent('a').attr('href');
        $.ajax({
            type: 'POST',
            data:"delete_id="+id,
            url: path_url+'/customers/deletedeliveryaddress/',
            success:function(data){
                if(data == 'deleted'){
                    $('#'+id).remove();
                    $(hre).remove();
                }
            }
        });
        
    });
    
     $(document).on('click','.close_project',function(){
        var id=$(this).attr('id');
        var hre = $(this).parent('a').attr('href');
        $.ajax({
            type: 'POST',
            data:"delete_id="+id,
            url: path_url+'/customers/deleteprojectinfo/',
            success:function(data){
                if(data == 'deleted'){
                    $('#'+id).remove();
                    $(hre).remove();
                }
            }
        });
        
    });
</script>
<h1>
                                <i class="gi gi-user"></i>Edit Customer
                            </h1>
                        </div>
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                          <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
                        <li><?php echo $this->Html->link('Customers',array('controller'=>'Customers','action'=>'index')); ?></li>
                        <li>Edit Customer</li>
                    </ul>
                    <!-- END Forms General Header -->
<div class="row"><?php echo $this->Form->create('Customer',array('class'=>'form-horizontal form-bordered','id'=>'form-customer-edit')); ?>
                        <div class="col-md-12">
                            <!-- Basic Form Elements Block -->
                            <div class="block">
                                <!-- Basic Form Elements Title -->
                                <div class="block-title">
                                      <h2></h2>
                                </div>
                                <!-- END Form Elements Title -->

                                <!-- Basic Form Elements Content -->
                                <div class="panel panel-default">
                                    <div class="panel-body panel-body-nopadding">
                                        <!-- BASIC WIZARD -->
                                        <div id="basicWizard" class="basic-wizard">
                                            <ul class="nav nav-pills nav-justified " data-toggle="tabs" id="tabs">
                                                <li class="active"><a href="#tab1" data-toggle="tab"><span>Step 1:</span> Customer Info</a></li>
                                                <li class=""><a href="#tab2" data-toggle="tab"><span>Step 2:</span> Contact Person Info</a></li>
                                            </ul>
                                            <div class="nav-pills-border-color"></div>
                                            <br><br>
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="tab1">
                                                    <?PHP echo $this->element('Customers/edit/customer_info'); ?>
                                                </div>
                                             </div>
                                                <div class="tab-pane" id="tab2">
                                                    <?PHP echo $this->element('Customers/edit/contact_person_info'); ?>
                                                </div>
                                            
                                          <!-- tab-content -->
                                            <!-- #basicWizard -->
                                        </div><!-- panel-body -->
                                        <div class="form-group form-actions">
                                            <div class="col-md-9 col-md-offset-10">
                                                <?php echo $this->Form->button('<i class="fa fa-angle-right"></i> Update', array('type' => 'submit', 'class' => 'btn btn-sm btn-primary', 'escape' => false)); ?>
                                                <?php echo $this->Form->button('<i class="fa fa-angle-left"></i> Cancel',array('controller'=>'Customers','action'=>'index'), array('type' => 'reset', 'class' => 'btn btn-sm btn-warning', 'escape' => false)); ?>
    <!--                                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Submit</button>
                                                <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Reset</button>-->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- panel -->
                            </div>
                            <!-- END Basic Form Elements Block -->
                        </div>
                            </div>
                             
                                <?php echo $this->Form->end(); ?>
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
                    <?php  echo $this->Form->button('<i class="fa fa-angle-right"></i> Save changes',array('type'=>'button','class'=>'btn btn-sm btn-primary','id'=>'save_regedit','escape' => false)); ?>
                    
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
                    <?php  echo $this->Form->button('<i class="fa fa-angle-right"></i> Save changes',array('type'=>'button','class'=>'btn btn-sm btn-primary','id'=>'save_billedit','escape' => false)); ?>
                    
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
                    <?php  echo $this->Form->button('<i class="fa fa-angle-right"></i> Save changes',array('type'=>'button','class'=>'btn btn-sm btn-primary','id'=>'save_deliveryedit','escape' => false)); ?>
                    
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
                    <?php  echo $this->Form->button('<i class="fa fa-angle-right"></i> Save changes',array('type'=>'button','class'=>'btn btn-sm btn-primary','id'=>'save_projectedit','escape' => false)); ?>
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
                        
                        