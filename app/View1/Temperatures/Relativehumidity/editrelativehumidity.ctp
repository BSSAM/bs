<h1>
                                <i class="gi gi-user"></i>Edit Relative humidity(Temperature)
                            </h1>
                        </div>
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                          <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
                        <li><?php echo $this->Html->link('Relative humidity',array('controller'=>'Temperatures','action'=>'relativehumidity')); ?></li>
                        <li>Edit Relative humidity(Temperature)</li>
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
                                 <?php echo $this->Form->create('Relativehumidity/editrelativehumidity',array('class'=>'form-horizontal form-bordered','id'=>'form-temp-other-edit')); ?>
                                
                                     <div class="form-group">
                                       
                                        <label class="col-md-2 control-label" for="val_relativehumidityname">Relative humidity</label>
                                        <div class="col-md-4">
                                            <?php echo $this->Form->input('Temprelativehumidity.relativehumidity', array('id'=>'val_relativehumidity','class'=>'form-control','placeholder'=>'Enter the Relative humidity','label'=>false)); ?>
                                        </div>
                                        
                                       <label class="col-md-2 control-label" for="val_description">Description</label>
                                        <div class="col-md-4">
                                           <?php echo $this->Form->input('Temprelativehumidity.description', array('id'=>'val_description','class'=>'form-control','placeholder'=>'Enter the Description','label'=>false)); ?>
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
                             
                        
                        