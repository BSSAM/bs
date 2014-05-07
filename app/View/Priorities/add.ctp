 <h1>
                                <i class="gi gi-user"></i>Add Priority
                            </h1>
                        </div>
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                          <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
                        <li><?php echo $this->Html->link('Priority',array('controller'=>'Priorities','action'=>'index')); ?></li>
                        <li>Add Priority</li>
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
                                 <?php echo $this->Form->create('Priority',array('class'=>'form-horizontal form-bordered','id'=>'form-priority-add')); ?>
                                
                                    <div class="form-group">
                                       
                                        <label class="col-md-2 control-label" for="val_priority">Priority</label>
                                        <div class="col-md-4">
                                            <?php echo $this->Form->input('priority', array('id'=>'val_priority','class'=>'form-control','placeholder'=>'Enter the Priority','label'=>false,'name'=>'priority')); ?>
                                        </div>
                                        
                                        <label class="col-md-2 control-label" for="val_description">Description</label>
                                        <div class="col-md-4">
                                           <?php echo $this->Form->input('description', array('id'=>'val_description','class'=>'form-control','placeholder'=>'Enter the Description','label'=>false,'name'=>'description')); ?>
                                        </div>
                                        
                                    
                                    </div>
                                
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="val_noofdays">No of Days</label>
                                        <div class="col-md-4">
                                            <?php echo $this->Form->input('noofdays', array('id'=>'val_noofdays','class'=>'form-control','empty'=>'Enter the Days','label'=>false,'name'=>'noofdays')); ?>
                                        </div>
                                    
                                    <label class="col-md-2 control-label" for="val_multipleof">Multiples Of</label>
                                        <div class="col-md-4">
                                            <?php echo $this->Form->input('multipleof', array('id'=>'val_multipleof','class'=>'form-control','empty'=>'Enter the Multiples','label'=>false,'name'=>'multipleof')); ?>
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
                                        
                                        
                                        
                                        $.bootstrapGrowl('Priority Already Exists!', {
                                            type: 'danger',
                                            allow_dismiss: true
                                        });
                                        
                                        $(this).prop('disabled', true);
                                        $('#val_priority').focus();
                                    }
                                };
                            }();
                            
                            
                            </script> 
                            <?php } ?>
                        
                        