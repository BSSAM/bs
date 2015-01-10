<script>
$(document).ready(function(e) {
                                
								$('.formSubmit').click(function(e) { 
                                    var from_unit = $('#val_fromunit').val();
									var to_unit = $('#val_tounit').val();
									
									if(from_unit == to_unit)
									{
										alert("The units are same.");
										e.preventDefault();
									}
									else
									{
										$('.addunitconvert').submit();
									}
                                });
                            });
</script>
<h1>
                                <i class="gi gi-user"></i>Add Unit Conversion(Temperature)
                            </h1>
                        </div>
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                          <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
                        <li><?php echo $this->Html->link('Unit Conversion',array('controller'=>'Temperatures','action'=>'unitconvert/addunitconvert')); ?></li>
                        <li>Add Unit Conversion(Temperature)</li>
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
                                 <?php echo $this->Form->create('Tempunitconvert',array('class'=>'form-horizontal form-bordered addunitconvert','id'=>'form-temp-unitconvert-add')); ?>
                                
                                    <div class="form-group">
                                       
                                        <label class="col-md-2 control-label" for="val_unitconvertname">From unit</label>
                                        <div class="col-md-4">
                                            <?php echo $this->Form->input('fromunit', array('id'=>'val_fromunit','class'=>'form-control','label'=>false,'options' => $tempunit_list,'empty' => 'Select Unit')); ?>
                                        </div>
                                        
                                        <label class="col-md-2 control-label" for="val_unitconvertname">To unit</label>
                                        <div class="col-md-4">
                                            <?php echo $this->Form->input('tounit', array('id'=>'val_tounit','class'=>'form-control','label'=>false,'options' => $tempunit_list,'empty' => 'Select Unit')); ?>
                                        </div>
                                        
                                     </div> 
                                     
                                      <div class="form-group">
                                       
                                        <label class="col-md-2 control-label" for="val_unitconvertname">Factor</label>
                                        <div class="col-md-4">
                                            <?php echo $this->Form->input('factor', array('id'=>'val_factor','class'=>'form-control','label'=>false,'placeholder'=>'Enter the Factor')); ?>
                                        </div>  
                                        
                                        <label class="col-md-2 control-label" for="val_description">Description</label>
                                        <div class="col-md-4">
                                           <?php echo $this->Form->input('description', array('id'=>'val_description','class'=>'form-control','placeholder'=>'Enter the Description','label'=>false)); ?>
                                        </div>
                                   
                                        
                                   
                                    </div>
                                   
                                     <div class="form-group form-actions">
                                        <div class="col-md-9 col-md-offset-3">
                                           <a class='btn btn-sm btn-primary formSubmit'> <i class="fa fa-angle-right"></i> Submit</a>
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
                        
                        