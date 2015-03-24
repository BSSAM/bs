 <h1>
                                <i class="gi gi-user"></i>Add Title
                            </h1>
                        </div>
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                          <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
                        <li><?php echo $this->Html->link('Titles',array('controller'=>'Titles','action'=>'index')); ?></li>
                        <li>Add Title</li>
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
                                <?php echo $this->Form->create('Title',array('class'=>'form-horizontal form-bordered','id'=>'form-title-add')); ?>
                                
                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="title_name">Title Name <span class="text-danger">*</span></label>
                                        <div class="col-md-4">
                                            <?php echo $this->Form->input('title_name', array('id'=>'title_name','class'=>'form-control','placeholder'=>'Enter the Title Name','label'=>false,'name'=>'title_name')); ?>
                                        </div>
                                        <label class="col-md-2 control-label" for="title_description">Title Description</label>
                                        <div class="col-md-4">
                                           <?php echo $this->Form->input('title_description', array('id'=>'title_description','class'=>'form-control','label'=>false,'name'=>'title_description','type'=>'textarea')); ?>
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
    <?php echo $this->Html->script('pages/instrumentsvalidation'); ?>
        <script>$(function(){ FormsValidation.init(); });</script>
                        