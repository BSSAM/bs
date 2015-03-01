<h1>
                                <i class="gi gi-user"></i>Edit Unit Conversion(Temperature)
                            </h1>
                        </div>
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                          <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
                        <li><?php echo $this->Html->link('Unit Conversion',array('controller'=>'Temperatures','action'=>'unitconvert')); ?></li>
                        <li>Edit Unit Conversion(Temperature)</li>
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
                                <?php echo $this->Form->create('unitconvert/addunitconvert',array('class'=>'form-horizontal form-bordered','id'=>'form-temp-unitconvert-add')); ?>
                                
                                    <div class="form-group">
                                       
                                        <label class="col-md-2 control-label" for="val_unitconvertname">From unit</label>
                                        <div class="col-md-4">
                                            <?php echo $this->Form->input('fromunit', array('id'=>'val_fromunit','class'=>'form-control','label'=>false,'options' => $tempunit_list,'empty' => 'Select Unit','default' => $unitconvert_data['Tempunitconvert']['fromunit'])); ?>
                                        </div>
                                        
                                        <label class="col-md-2 control-label" for="val_unitconvertname">To unit</label>
                                        <div class="col-md-4">
                                            <?php echo $this->Form->input('tounit', array('id'=>'val_tounit','class'=>'form-control','label'=>false,'options' => $tempunit_list,'empty' => 'Select Unit','default' => $unitconvert_data['Tempunitconvert']['tounit'])); ?>
                                        </div>
                                        
                                     </div> 
                                     
                                      <div class="form-group">
                                       
                                        <label class="col-md-2 control-label" for="val_unitconvertname">Factor</label>
                                        <div class="col-md-4">
                                            <?php echo $this->Form->input('factor', array('id'=>'val_factor','class'=>'form-control','label'=>false,'placeholder'=>'Enter the Factor','value' => $unitconvert_data['Tempunitconvert']['factor'])); ?>
                                        </div>  
                                        
                                        <label class="col-md-2 control-label" for="val_description">Description</label>
                                        <div class="col-md-4">
                                           <?php echo $this->Form->input('description', array('id'=>'val_description','class'=>'form-control','placeholder'=>'Enter the Description','label'=>false,'default' => $unitconvert_data['Tempunitconvert']['description'])); ?>
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
                             
                        
                        