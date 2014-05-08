 <h1>
                                <i class="gi gi-user"></i>Edit Customer
                            </h1>
                        </div>
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                          <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
                        <li><?php echo $this->Html->link('Priority',array('controller'=>'Customers','action'=>'index')); ?></li>
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
                                                     
                                
                                    <div class="form-group">
                                       
                                        <label class="col-md-2 control-label" for="val_customername">Customer Name</label>
                                        <div class="col-md-4">
                                            <?php echo $this->Form->input('customername', array('id'=>'val_customername','class'=>'form-control','placeholder'=>'Enter the Customer Name','label'=>false,'name'=>'customername')); ?>
                                        </div>
                                        
                                        <label class="col-md-2 control-label" for="val_postalcode">Postal Code</label>
                                        <div class="col-md-4">
                                           <?php echo $this->Form->input('postalcode', array('id'=>'val_postalcode','class'=>'form-control','placeholder'=>'Enter the Postal Code','label'=>false,'name'=>'postalcode')); ?>
                                        </div>
                                        
                                    
                                    </div>
                                
                                <div class="form-group">
                                   
                                    
                                    <label class="col-md-2 control-label" for="val_salespeoples">Sales Persons</label>
                                        <div class="col-md-4">
                                            <?php echo $this->Form->input('salesperson_id', array('id'=>'val_salespeoples','class'=>'select-chosen required','options'=>$salesperson,'data-placeholder'=>'Enter the Sales Persons','label'=>false,'name'=>'salesperson_id','multiple'=>true,'style'=>'width: 250px; display: none;')); ?>
                                        </div>
                                    
                                     <label class="col-md-2 control-label" for="val_referredbies">Referred By(s)</label>
                                        <div class="col-md-4">
                                             <?php echo $this->Form->input('referedbies_id', array('id'=>'val_referredbies','class'=>'select-chosen','options'=>$referedby,'data-placeholder'=>'Enter the Referred By','label'=>false,'name'=>'referedbies_id','multiple'=>true,'style'=>'width: 250px; display: none;')); ?>
                                            
                                        </div>
                                    
                                </div>
                                
                                
                                    
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="val_regaddress">Registered Address</label>
                                        <div class="col-md-4">
                                            <?php echo $this->Form->input('regaddress', array('id'=>'val_regaddress','class'=>'form-control','placeholder'=>'Enter the Registered Address','label'=>false,'name'=>'regaddress')); ?>
                                        </div>
                                    
                                    <label class="col-md-2 control-label" for="val_billaddress">Billing Address</label>
                                        <div class="col-md-4">
                                            <?php echo $this->Form->input('billaddress', array('id'=>'val_billaddress','class'=>'form-control','placeholder'=>'Enter the Billing Address','label'=>false,'name'=>'billaddress')); ?>
                                        </div>
                                    
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="var_phone">Phone</label>
                                        <div class="col-md-4">
                                            <?php echo $this->Form->input('phone', array('id'=>'var_phone','class'=>'form-control','placeholder'=>'Enter the Phone No','label'=>false,'name'=>'phone')); ?>
                                        </div>
                                    
                                    <label class="col-md-2 control-label" for="val_fax">Fax</label>
                                        <div class="col-md-4">
                                            <?php echo $this->Form->input('fax', array('id'=>'val_fax','class'=>'form-control','placeholder'=>'Enter the Fax No','label'=>false,'name'=>'fax')); ?>
                                        </div>
                                    
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="val_industry">Customer Industry</label>
                                        <div class="col-md-4">
                                            <?php echo $this->Form->input('industry_id', array('id'=>'val_industry','class'=>'form-control','empty'=>'Enter the Industry','options'=>$industry,'label'=>false,'name'=>'industry_id')); ?>
                                        </div>
                                    
                                    <label class="col-md-2 control-label" for="val_location">Customer Location</label>
                                        <div class="col-md-4">
                                            <?php echo $this->Form->input('location_id', array('id'=>'val_location','class'=>'form-control','empty'=>'Enter the Location','options'=>$location,'label'=>false,'name'=>'location_id')); ?>
                                        </div>
                                    
                                </div>
                               
                                 <div class="form-group">
                                    <label class="col-md-2 control-label" for="var_type">Customer Type</label>
                                        <div class="col-md-4">
                                            <?php echo $this->Form->input('customertype', array('id'=>'var_type','class'=>'form-control','empty'=>'Enter the Customer Type','options'=>array('Customer'=>'Customer','Sub-Contractor'=>'Sub-Contractor','Supplier'=>'Supplier','Customer/Sub-Contractor'=>'Customer/Sub-Contractor'),'label'=>false,'name'=>'customertype')); ?>
                                        </div>
                                    
                                    <label class="col-md-2 control-label" for="var_deliveryaddress">Delivery Address </label>
                                        <div class="col-md-4">
                                            <?php echo $this->Form->input('deliveryaddress', array('id'=>'var_deliveryaddress','class'=>'form-control','placeholder'=>'Enter the Delivery Address','label'=>false,'name'=>'deliveryaddress')); ?>
                                        </div>
                                    
                                </div>
                                
                                 <div class="form-group">
                                    <label class="col-md-2 control-label" for="var_requirements">Requirements</label>
                                        <div class="col-md-4">
                                            <?php echo $this->Form->input('requirements', array('id'=>'var_requirements','class'=>'form-control','placeholder'=>'Enter the Requirement','label'=>false,'name'=>'requirements')); ?>
                                        </div>
                                    
                                    <label class="col-md-2 control-label" for="val_paymentterms">Payment Terms</label>
                                        <div class="col-md-4">
                                            <?php echo $this->Form->input('paymentterms_id', array('id'=>'val_paymentterms','class'=>'form-control','options'=>$paymentterm,'empty'=>'Enter the Payment Terms','label'=>false,'name'=>'paymentterms_id')); ?>
                                        </div>
                                    
                                </div>
                                 <div class="form-group">
                                    <label class="col-md-2 control-label" for="var_priorities">Priority</label>
                                        <div class="col-md-4">
                                            <?php echo $this->Form->input('priorities_id', array('id'=>'var_priorities','class'=>'form-control','options'=>$priority,'empty'=>'Enter the Priorities','label'=>false,'name'=>'priorities_id')); ?>
                                        </div>
                                    
                                    <label class="col-md-2 control-label" for="val_calibrationtype">Calibration Type</label>
                                        <div class="col-md-4">
                                            <?php echo $this->Form->input('calibrationtype', array('id'=>'val_calibrationtype','class'=>'form-control','options'=>array('Singlas'=>'Singlas','Non-Singlas'=>'Non-Singlas'),'empty'=>'Enter the Calibration Type','label'=>false,'name'=>'calibrationtype')); ?>
                                        </div>
                                    
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="val_invoicetype">Invoice Type</label>
                                        <div class="col-md-4">
                                            <?php echo $this->Form->input('invoicetype', array('id'=>'val_invoicetype','class'=>'form-control','options'=>array('Purchase order full invoice'=>'Purchase order full invoice','Sales order full invioce'=>'Sales order full invioce','Sales order partial invoice'=>'Sales order partial invoice'),'empty'=>'Enter the Invoice Type','label'=>false,'name'=>'invoicetype')); ?>
                                        </div>
                                    
                                    <label class="col-md-2 control-label" for="val_deliveryordertype">Delivery Order Type</label>
                                        <div class="col-md-4">
                                            <?php echo $this->Form->input('deliveryordertype', array('id'=>'val_deliveryordertype','class'=>'form-control','options'=>array('Full delivery order'=>'Full delivery order','Partial delivery order'=>'Partial delivery order'),'empty'=>'Enter the Delivery Order Type','label'=>false,'name'=>'deliveryordertype')); ?>
                                        </div>
                                    
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="val_tag">Tag</label>
                                        <div class="col-md-4">
                                            <?php echo $this->Form->input('tag', array('id'=>'val_tag','class'=>'form-control','placeholder'=>'Enter the Tag','label'=>false,'name'=>'tag')); ?>
                                        </div>
                                    
                                    <label class="col-md-2 control-label" for="val_poack">PO Acknowledgement</label>
                                        <div class="col-md-4">
                                            
                                            <?php echo $this->Form->checkbox('poack', array('id'=>'val_poack','class'=>'checkbox','label'=>false,'name'=>'val_poack')); ?>
                                        </div>
                                    
                                </div>
                                                </div>
                                                <div class="tab-pane" id="tab2">
                                                    
                                                        
                                                </div>
                                                <div class="tab-pane" id="tab3">
                                                   
                                                     
                                                            
                                                   
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
                        
                        