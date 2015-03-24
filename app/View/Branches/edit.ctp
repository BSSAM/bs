 <h1>
                                <i class="gi gi-user"></i>Edit Branch
                            </h1>
                        </div>
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                          <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
                        <li><?php echo $this->Html->link('Branches',array('controller'=>'Branches','action'=>'index')); ?></li>
                        <li>Edit Branch</li>
                    </ul>
                    <!-- END Forms General Header -->

<div class="row">
                        <div class="col-md-12">
                            <!-- Basic Form Elements Block -->
                            <div class="block">
                                <!-- Basic Form Elements Title -->
                                <div class="block-title">
                                    
                                      <h2></h2>
                                </div>
                                <!-- END Form Elements Title -->

                                <!-- Basic Form Elements Content -->
                                 <?php echo $this->Form->create('branch',array('class'=>'form-horizontal form-bordered','id'=>'form-branch-add')); ?>
                                
                                    <div class="form-group">
                                       
                                        <label class="col-md-2 control-label" for="val_branchname">Branch Name <span class="text-danger">*</span></label>
                                        <div class="col-md-4">
                                            <?php echo $this->Form->input('branchname', array('id'=>'val_branchname','class'=>'form-control','placeholder'=>'Enter the Branch Name','label'=>false,'name'=>'branchname')); ?>
                                        </div>
                                   
                                        <label class="col-md-2 control-label" for="val_address">Address <span class="text-danger">*</span></label>
                                        <div class="col-md-4">
                                           <?php echo $this->Form->input('address', array('id'=>'val_address','class'=>'form-control','placeholder'=>'Enter the Address','label'=>false,'name'=>'address')); ?>
                                        </div>
                                   
                                    </div>
                                     <div class="form-group">
                                       
                                        <label class="col-md-2 control-label" for="val_phone">Phone No <span class="text-danger">*</span></label>
                                        <div class="col-md-4">
                                            <?php echo $this->Form->input('phone', array('id'=>'val_phone','class'=>'form-control','placeholder'=>'Enter the Phone No','label'=>false,'name'=>'phone')); ?>
                                        </div>
                                   
                                        <label class="col-md-2 control-label" for="val_fax">Fax</label>
                                        <div class="col-md-4">
                                           <?php echo $this->Form->input('fax', array('id'=>'val_fax','class'=>'form-control','placeholder'=>'Enter the Fax No','label'=>false,'name'=>'fax')); ?>
                                        </div>
                                   
                                    </div>
                                    <div class="form-group">
                                       
                                        <label class="col-md-2 control-label" for="val_website">Website</label>
                                        <div class="col-md-4">
                                            <?php echo $this->Form->input('website', array('id'=>'val_website','class'=>'form-control','placeholder'=>'Enter the Web Site','label'=>false,'name'=>'website')); ?>
                                        </div>
                                   
                                        <label class="col-md-2 control-label" for="val_companyregno">Company Reg No <span class="text-danger">*</span></label>
                                        <div class="col-md-4">
                                           <?php echo $this->Form->input('companyregno', array('id'=>'val_companyregno','class'=>'form-control','placeholder'=>'Enter the Company Reg No','label'=>false,'name'=>'companyregno')); ?>
                                        </div>
                                   
                                    </div>
                                    <div class="form-group">
                                       
                                        <label class="col-md-2 control-label" for="val_gstregno">GST Reg No <span class="text-danger">*</span></label>
                                        <div class="col-md-4">
                                            <?php echo $this->Form->input('gstregno', array('id'=>'val_gstregno','class'=>'form-control','placeholder'=>'Enter the GST Reg No','label'=>false,'name'=>'gstregno')); ?>
                                        </div>
                                   
                                        <label class="col-md-2 control-label" for="val_defaultbranch">Default Branch <span class="text-danger">*</span></label>
                                        <div class="col-md-4">
                                           <?php echo $this->Form->checkbox('defaultbranch', array('id'=>'val_defaultbranch','class'=>'checkbox','label'=>false,'name'=>'defaultbranch')); ?>
                                        </div>
                                   
                                    </div>
                                    <div class="form-group">
                                       
                                        <label class="col-md-2 control-label" for="val_currency_id">Currency <span class="text-danger">*</span></label>
                                        <div class="col-md-4">
                                            <?php echo $this->Form->input('currency_id', array('id'=>'val_currency_id','options' => $currency,'class'=>'select-chosen form-control','empty'=>'Enter the Currency','label'=>false,'name'=>'currency_id')); ?>
                                        </div>
                                   
                                        <label class="col-md-2 control-label" for="val_gst">GST <span class="text-danger">*</span></label>
                                        <div class="col-md-4">
                                           <?php echo $this->Form->input('gst', array('id'=>'val_gst','class'=>'form-control','placeholder'=>'Enter the GST','label'=>false,'name'=>'gst')); ?>
                                        </div>
                                   
                                    </div>
                                    
                                   
                                    
                                     <div class="form-group form-actions">
                                        <div class="col-md-9 col-md-offset-3">
                                            <?php  echo $this->Form->button('<i class="fa fa-angle-right"></i> Submit',array('type'=>'submit','class'=>'btn btn-sm btn-primary','escape' => false)); ?>
                                            <?php echo $this->Form->button('<i class="fa fa-repeat"></i> Reset', array('type'=>'reset','class'=>'btn btn-sm btn-warning','escape' => false)); ?>
<!--                                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Submit</button>
                                            <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Reset</button>-->
                                        </div>
                                    </div>
                                <?php echo $this->Form->end(); ?>
                                <!-- END Basic Form Elements Content -->
                            </div>
                            <!-- END Basic Form Elements Block -->
                        </div>
    <?php echo $this->Html->script('pages/formsValidation'); ?>
        <script>$(function(){ FormsValidation.init(); });</script>
         
                                
                                
                        
                        