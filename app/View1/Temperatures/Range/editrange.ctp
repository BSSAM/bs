<h1>
                                <i class="gi gi-user"></i>Edit Range(Temperature)
                            </h1>
                        </div>
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                          <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
                        <li><?php echo $this->Html->link('Range',array('controller'=>'Temperatures','action'=>'range')); ?></li>
                        <li>Edit Range(Temperature)</li>
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
                                 <?php echo $this->Form->create('Range/editrange',array('class'=>'form-horizontal form-bordered','id'=>'form-temp-other-edit')); ?>
                                
                                   <div class="form-group">
                                       
                                        <label class="col-md-2 control-label" for="val_rangename">From Range</label>
                                        <div class="col-md-4">
                                            <?php echo $this->Form->input('fromrange', array('id'=>'val_fromrange','class'=>'form-control','placeholder'=>'Enter the From range','label'=>false,'name'=>'fromrange','value' => $range_data['Temprange']['fromrange'])); ?>
                                        </div>
                                        
                                        <label class="col-md-2 control-label" for="val_rangename">To Range</label>
                                        <div class="col-md-4">
                                            <?php echo $this->Form->input('torange', array('id'=>'val_torange','class'=>'form-control','placeholder'=>'Enter the To range','label'=>false,'name'=>'torange','value' => $range_data['Temprange']['torange'])); ?>
                                        </div>
                                   
                                        
                                   
                                    </div>
                                    
                                     <div class="form-group">
                                       
                                        <label class="col-md-2 control-label" for="val_rangename">Unit</label>
                                        <div class="col-md-4">
                                            <?php echo $this->Form->input('temp_unit_id', array('id'=>'val_temp_unit_id','class'=>'form-control','options' => $unit_list,'empty' => 'Select unit','placeholder'=>'Enter the range Name','label'=>false,'name'=>'temp_unit_id','default' => $range_data['Temprange']['temp_unit_id'])); ?>
                                        </div>
                                        
                                        <label class="col-md-2 control-label" for="val_description">Description</label>
                                        <div class="col-md-4">
                                           <?php echo $this->Form->input('description', array('id'=>'val_description','class'=>'form-control','placeholder'=>'Enter the Description','label'=>false,'name'=>'description','value' => $range_data['Temprange']['description'])); ?>
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
                             
                        
                        