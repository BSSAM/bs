
<h1>
                                <i class="gi gi-user"></i>Add Instrument validity(Temperature)
                            </h1>
                        </div>
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                          <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
                        <li><?php echo $this->Html->link('Instrument validity',array('controller'=>'Temperatures','action'=>'instrumentvalidity/addinstrumentvalidity')); ?></li>
                        <li>Add Instrument validity(Temperature)</li>
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
                                 <?php echo $this->Form->create('Tempinstrumentvalid',array('class'=>'form-horizontal form-bordered','id'=>'form-temp-instrumentvalidity-add')); ?>
                                
                                    <div class="form-group">
                                       
                                        <label class="col-md-2 control-label" for="val_instrumentvalidityname">Instrument</label>
                                        <div class="col-md-4">
                                            <?php echo $this->Form->input('temp_instruments_id', array('id'=>'val_instrumentvalidity','class'=>'form-control','label'=>false,'empty' => 'Select Instrument','options' => $instruments_list)); ?>
                                        </div>
                                        
                                       <label class="col-md-2 control-label" for="val_description">Duedate</label>
                                        <div class="col-md-4">
                                           <?php echo $this->Form->input('duedate', array('id'=>'val_duedate','class'=>'form-control','placeholder'=>'Enter the Due date','label'=>false)); ?>
                                        </div>
                                   
                                        
                                   
                                    </div>
                                    
                                    <div class="form-group">
                                       
                                        <label class="col-md-2 control-label" for="val_instrumentvalidityname">Valid days</label>
                                        <div class="col-md-4">
                                            <?php echo $this->Form->input('validdays', array('id'=>'val_validdays','class'=>'form-control','placeholder'=>'Enter the Valid days','label'=>false)); ?>
                                        </div>
                                   
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
                                
                                // Get random number function from a given instrumentvalidity
                                var getRandomInt = function(min, max) {
                                    return Math.floor(Math.random() * (max - min + 1)) + min;
                                };
                                
                                return {
                                    init: function() {
                                        
                                        
                                        
                                        $.bootstrapGrowl('Industry Already Exists!', {
                                            type: 'danger',
                                            allow_dismiss: true
                                        });
                                        
                                        $(this).prop('disabled', true);
                                        $('#val_industryname').focus();
                                    }
                                };
                            }();
                            
                            
                            </script> 
                            <?php } ?>
                        
                        