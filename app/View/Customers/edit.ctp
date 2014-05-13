<script>
    var path_url='<?PHP echo Router::url('/',true); ?>';
    var customer_id = '<?php echo $customer_id;?>';
    //alert(customer_id);
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

<div class="row"><?php echo $this->Form->create('Customer',array('class'=>'form-horizontal form-bordered','id'=>'form-customer-add')); ?>
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
                                            
                                            <ul class="nav nav-pills nav-justified " data-toggle="tabs">
                                                <li class="active"><a href="#tab1" data-toggle="tab"><span>Step 1:</span> Customer Info</a></li>
                                                <li class=""><a href="#tab2" data-toggle="tab"><span>Step 2:</span> Contact Person Info</a></li>
                                                <li class=""><a href="#tab3" data-toggle="tab"><span>Step 3:</span> Project Info</a></li>
                                                 <li class=""><a href="#tab4" data-toggle="tab"><span>Step 4:</span> Delivery Addresses</a></li>
                                                  <li class=""><a href="#tab5" data-toggle="tab"><span>Step 5:</span> Billing Addresses</a></li>
                                            </ul>
                                            <div class="nav-pills-border-color"></div>
                                            <br><br>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab1">
                                <?PHP echo $this->element('Customers/edit/customer_info'); ?>
                            </div>
                            <div class="tab-pane" id="tab2">
                                <?PHP echo $this->element('Customers/edit/contact_person_info'); ?>
                            </div>
                            <div class="tab-pane" id="tab3">
                                <?PHP echo $this->element('Customers/edit/project_info'); ?>
                            </div>
                            <div class="tab-pane" id="tab4">
                                <?PHP echo $this->element('Customers/edit/delivery_address'); ?>
                            </div>
                            <div class="tab-pane" id="tab5">
                                <?PHP echo $this->element('Customers/edit/billing_address'); ?>
                            </div>
                        </div><!-- tab-content -->
                                                
                                        <!-- #basicWizard -->
                                            
                                    </div><!-- panel-body -->
                                    <div class="form-group form-actions">
                                        <div class="col-md-9 col-md-offset-10">
                                            <?php  echo $this->Form->button('<i class="fa fa-angle-right"></i> Submit',array('type'=>'submit','class'=>'btn btn-sm btn-primary','escape' => false)); ?>
                                            <?php echo $this->Form->button('<i class="fa fa-repeat"></i> Reset', array('type'=>'reset','class'=>'btn btn-sm btn-warning','escape' => false)); ?>
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
    
  
    <?php echo $this->Html->script('pages/formsValidation'); ?>
        <script>$(function(){ FormsValidation.init(); });</script>
         <?php echo $this->Html->script('pages/uiProgress'); ?>
                            <script>$(function(){ UiProgress.init(); });</script>
                                
                                <?php if($this->Session->flash()!='') { ?>
                            <script> var UiProgress = function() {
                                
                                // Get random number function from a given range
                                var getRandomInt = function(min, max) {
                                    return Math.floor(Math.random() * (max - min + 1)) + min;
                                };
                                
                                return {
                                    init: function() {
                                        
                                        
                                        
                                        $.bootstrapGrowl('Customer Already Exists!', {
                                            type: 'danger',
                                            allow_dismiss: true
                                        });
                                        
                                        $(this).prop('disabled', true);
                                        $('#val_customername').focus();
                                    }
                                };
                            }();
                            
                           

                            </script> 
                            <?php } ?>
                        
                        