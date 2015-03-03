 <h1>
                                <i class="gi gi-user"></i>Edit Canddsetting
                            </h1>
                        </div>
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                          <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
                        <li><?php echo $this->Html->link('Canddsettings',array('controller'=>'Canddsettings','action'=>'index')); ?></li>
                        <li>Edit Canddsetting</li>
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
                                 <?php echo $this->Form->create('Canddsetting',array('class'=>'form-horizontal form-bordered','id'=>'form-canddsetting-add')); ?>
                                
                                    <div class="form-group">
                                       
                                        <label class="col-md-2 control-label" for="val_branch_id">Branch Name</label>
                                        <div class="col-md-4">
                                            <?php echo $this->Form->input('branch_id', array('id'=>'val_branch_id','options' => $branch,'class'=>'select-chosen form-control','empty'=>'Enter the branch','label'=>false,'name'=>'branch_id')); ?>
                                        </div>
                                   
                                        <label class="col-md-2 control-label" for="val_maxtask">Max Task</label>
                                        <div class="col-md-4">
                                            <?php echo $this->Form->input('maxtask', array('id'=>'val_maxtask','class'=>'form-control','placeholder'=>'Enter the Max Task','label'=>false,'name'=>'maxtask')); ?>
                                        </div>
                                   
                                    </div>
                                     <div class="form-group">
                                       
                                        <label class="col-md-2 control-label" for="val_maxtime">Max Time</label>
                                        <div class="col-md-4">
                                            <?php echo $this->Form->input('maxtime', array('id'=>'val_maxtime','class'=>'form-control','placeholder'=>'Enter the Max Time','label'=>false,'name'=>'maxtime')); ?>
                                        </div>
                                   
                                        <label class="col-md-2 control-label" for="val_purpose">Purpose</label>
                                        <div class="col-md-4">
                                           <?php echo $this->Form->input('purpose', array('id'=>'val_purpose','options' => array('C'=>'Collection','D'=>'Delivery'),'class'=>'select-chosen form-control','empty'=>'Enter the Purpose','label'=>false,'name'=>'purpose')); ?>
                                        </div>
                                   
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="status">Active</label>
                                        <div class="col-md-4 form-control-static">
                                            <?php echo $this->Form->checkbox('status', array('id'=>'status','class'=>'','label'=>false,'name'=>'status','checked')); ?>
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
                                        
                                        
                                        
                                        $.bootstrapGrowl('purpose Already Exists!', {
                                            type: 'danger',
                                            allow_dismiss: true
                                        });
                                        
                                        $(this).prop('disabled', true);
                                        $('#val_purpose').focus();
                                    }
                                };
                            }();
                            
                            
                            </script> 
                            <?php } ?>
                        
                        