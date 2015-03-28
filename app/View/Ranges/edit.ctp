 <h1><script>
    var path='<?PHP echo Router::url('/',true); ?>';
    $('#unit_id').trigger('chosen:updated');
</script>
                                <i class="gi gi-user"></i>Edit Range
                            </h1>
                        </div>
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                          <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
                        <li><?php echo $this->Html->link('Range',array('controller'=>'Ranges','action'=>'index')); ?></li>
                        <li>Edit Range</li>
                    </ul>
                    <!-- END Forms General Header -->
<?php echo $this->element('message');?>
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
                                <?php echo $this->Form->create('Range',array('class'=>'form-horizontal form-bordered','id'=>'form-range-add')); ?>
                                
                                    <div class="form-group">
                                       
                                        <label class="col-md-2 control-label" for="from_range">From Range <span class="text-danger">*</span></label>
                                        <div class="col-md-4">
                                            <?php echo $this->Form->input('from_range', array('id'=>'from_range','class'=>'form-control','placeholder'=>'Enter the Starting Range','label'=>false,'name'=>'from_range')); ?>
                                        </div>
                                   
                                        <label class="col-md-2 control-label" for="to_range">To Range</label>
                                        <div class="col-md-4">
                                           <?php echo $this->Form->input('to_range', array('id'=>'to_range','class'=>'form-control','placeholder'=>'Enter the End Range','label'=>false,'name'=>'to_range')); ?>
                                        </div>
                                   
                                    </div>
                                <div class="form-group">
                                       
                                        <label class="col-md-2 control-label" for="unit_id">Unit <span class="text-danger">*</span></label>
                                        <div class="col-md-4">
                                            <?php echo $this->Form->input('unit_id', array('id'=>'unit_id','class'=>'form-control select-chosen','label'=>false,
                                                'name'=>'unit_id','type'=>'select','options'=>$units,'empty'=>'Select the Unit')); ?>
                                        </div>
                                   
                                        <label class="col-md-2 control-label" for="range_description">Range Description</label>
                                        <div class="col-md-4">
                                           <?php echo $this->Form->input('range_description', array('id'=>'range_description','class'=>'form-control','placeholder'=>'Enter the Description','label'=>false,'name'=>'range_description')); ?>
                                        </div>
                                   
                                    </div>
                                 <div class="form-group">
                                        <label class="col-md-2 control-label" for="status">Active</label>
                                        <div class="col-md-4 form-control-static">
                                            <?php echo $this->Form->checkbox('status', array('id'=>'status','class'=>'','label'=>false,'name'=>'status')); ?>
                                        </div>
                                    </div>
                                    <div class="form-group form-actions">
                                   <div class="col-md-9 col-md-offset-3">
                                            <div class="pull-right">
                                                <?php echo $this->Form->input('Range.id', array('name'=>'range_id','id'=>'range_id','type'=>'hidden','value'=>$range_dat['Range']['id'])); ?>
                                                <?php if($user_role['ins_range']['edit'] == 1 && $range_dat['Range']['is_approved']==0): ?>
                                                <?php if($user_role['app_range']['view'] == 1){ ?>
                                                <?php  echo $this->Form->button('<i class="fa fa-angle-right"></i> <b>Approve</b>',array('type'=>'button','class'=>'btn btn-sm btn-danger approve_range','escape' => false)); ?>
                                                <?php } else {?>
                                                <?php  echo $this->Form->button('<i class="fa fa-angle-right"></i> Update',array('type'=>'submit','class'=>'btn btn-sm btn-primary','escape' => false)); ?>
                                                <?php } ?>
                                                
                                                <?php else : ?>
                                                <?php  echo $this->Form->button('<i class="fa fa-angle-right"></i> Update',array('type'=>'submit','class'=>'btn btn-sm btn-primary','escape' => false)); ?>
                                                <?php echo $this->Html->link('<i class="fa fa-angle-left"></i> Cancel',array('controller'=>'Units','action'=>'index'), array('class'=>'btn btn-sm btn-warning','escape' => false)); ?>
                                                <?php endif; ?>
                                                
                                            </div>
                                        </div>
                                    
                                     </div>
                                <?php echo $this->Form->end(); ?>
                                <!-- END Basic Form Elements Content -->
                            
                            </div>
                            <!-- END Basic Form Elements Block -->
                        </div>
    <?php echo $this->Html->script('pages/instrumentsvalidation'); ?>
        <script>$(function(){ FormsValidation.init(); });</script>
                        