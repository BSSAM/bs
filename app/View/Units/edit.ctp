 <h1>
                                <i class="gi gi-user"></i>Edit Unit
                            </h1>
                        </div>
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                          <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
                        <li><?php echo $this->Html->link('Units',array('controller'=>'Units','action'=>'index')); ?></li>
                        <li>Edit Unit</li>
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
                                <?php echo $this->Form->create('Unit',array('class'=>'form-horizontal form-bordered','id'=>'form-unit-add')); ?>
                                
                                    <div class="form-group">
                                       
                                        <label class="col-md-2 control-label" for="unit_name">Unit Name</label>
                                        <div class="col-md-4">
                                            <?php echo $this->Form->input('unit_name', array('id'=>'unit_name','class'=>'form-control','placeholder'=>'Enter the Unit Name','label'=>false,'name'=>'unit_name')); ?>
                                        </div>
                                   
                                        <label class="col-md-2 control-label" for="unit_description">Unit Description</label>
                                        <div class="col-md-4">
                                           <?php echo $this->Form->input('unit_description', array('id'=>'unit_description','class'=>'form-control','placeholder'=>'Enter the Description','label'=>false,'name'=>'unit_description')); ?>
                                        </div>
                                   
                                    </div>
                                <div class="form-group">
                                        <label class="col-md-2 control-label" for="status">Active</label>
                                        <div class="col-md-4">
                                            <?php echo $this->Form->checkbox('status', array('id'=>'status','class'=>'form-control','label'=>false,'name'=>'status')); ?>
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
   <?php echo $this->Html->script('pages/instrumentsvalidation'); ?>
        <script>$(function(){ FormsValidation.init(); });</script>
                        