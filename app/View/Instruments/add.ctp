 <h1>
                                <i class="gi gi-user"></i>Add Instrument
                            </h1>
                        </div>
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                          <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
                        <li><?php echo $this->Html->link('Instruments',array('controller'=>'Instruments','action'=>'index')); ?></li>
                        <li>Add Instrument</li>
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
                                <?php echo $this->Form->create('Instrument',array('class'=>'form-horizontal form-bordered','id'=>'form-machine-add')); ?>
                                
                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="machine_name">Name</label>
                                        <div class="col-md-4">
                                            <?php echo $this->Form->input('name', array('id'=>'machine_name','class'=>'form-control','placeholder'=>'Enter the Instrument Name','label'=>false,'name'=>'name')); ?>
                                        </div>
                                        <label class="col-md-2 control-label" for="machine_description">Description</label>
                                        <div class="col-md-4">
                                           <?php echo $this->Form->input('description', array('id'=>'machine_description','class'=>'form-control','label'=>false,'name'=>'description','type'=>'textarea')); ?>
                                        </div>
                                    </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="example-chosen-multiple">Department</label>
                                    <div class="col-md-4">
                                        <?php echo $this->Form->input('department_id', array('id'=>'example-chosen-multiple','class'=>'form-control select-chosen','label'=>false,'type'=>'select','options'=>$department_array,'data-placeholder'=>'Select Department Name','style'=>'width: 250px;','name'=>'department_id')); ?>
                                        
                                    </div>
                                    <label class="col-md-2 control-label" for="example-chosen-multiple">Procedure</label>
                                    <div class="col-md-4">
                                        <?php echo $this->Form->input('InstrumentProcedure.procedure_id', array('id'=>'example-chosen-multiple','class'=>'form-control select-chosen','label'=>false,'type'=>'select','options'=>$procedure_array,'data-placeholder'=>'Select Procedure Name','style'=>'width: 250px;','multiple'=>'multiple')); ?>
                                        
                                    </div>
                                     
                                    
                                   
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="example-chosen-multiple">Brand</label>
                                    <div class="col-md-4">
                                        <?php echo $this->Form->input('InstrumentBrand.brand_id', array('id'=>'example-chosen-multiple','class'=>'form-control select-chosen','label'=>false,'type'=>'select','options'=>$brand_array,'data-placeholder'=>'Select Department Name','style'=>'width: 250px;','multiple'=>'multiple')); ?>
                                        
                                    </div>
                                    <label class="col-md-2 control-label" for="example-chosen-multiple">Range</label>
                                    <div class="col-md-4">
                                        <?php echo $this->Form->input('InstrumentRange.range_id', array('id'=>'example-chosen-multiple','class'=>'form-control select-chosen','label'=>false,'type'=>'select','options'=>$range_array,'data-placeholder'=>'Select Range Name','style'=>'width: 250px;','multiple'=>'multiple')); ?>
                                        
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
                        