<h1>
                                <i class="gi gi-user"></i>Edit Ambient Temperature
                            </h1>
                        </div>
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                          <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
                        <li><?php echo $this->Html->link('Ambient Temperature',array('controller'=>'Temperatures','action'=>'ambient')); ?></li>
                        <li>Edit Ambient Temperature</li>
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
                                 <?php echo $this->Form->create('ambient/editambient',array('class'=>'form-horizontal form-bordered','id'=>'form-temp-ambient-edit')); ?>
                                
                                    <div class="form-group">
                                       
                                        <label class="col-md-2 control-label" for="val_ambientname">Ambient Name</label>
                                        <div class="col-md-4">
                                            <?php echo $this->Form->input('Tempambient.ambientname', array('id'=>'val_ambientname','class'=>'form-control','placeholder'=>'Enter the Ambient Name','label'=>false,'name'=>'ambientname','readonly'=>'readonly')); ?>
                                        </div>
                                        
                                        <label class="col-md-2 control-label" for="val_default">Default</label>
                                        <div class="col-md-4">
                                           <?php echo $this->Form->checkbox('Tempambient.default', array('id'=>'val_default','class'=>'checkbox','label'=>false,'name'=>'default')); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    <label class="col-md-2 control-label" for="val_description">Description</label>
                                        <div class="col-md-4">
                                           <?php echo $this->Form->input('Tempambient.description', array('id'=>'val_description','class'=>'form-control','placeholder'=>'Enter the Description','label'=>false,'name'=>'description')); ?>
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
                             
                        
                        