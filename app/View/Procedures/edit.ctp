 <h1><script>
    var path='<?PHP echo Router::url('/',true); ?>';
    $('#department_id').trigger('chosen:updated');
</script>
                                <i class="gi gi-user"></i>Edit Procedures
                            </h1>
                        </div>
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                          <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
                        <li><?php echo $this->Html->link('Procedures',array('controller'=>'Procedures','action'=>'index')); ?></li>
                        <li>Edit Procedure</li>
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
                                <?php echo $this->Form->create('Procedure',array('class'=>'form-horizontal form-bordered','id'=>'form-procedure-edit')); ?>
                                
                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="procedure_no">Procedure No <span class="text-danger">*</span></label>
                                        <div class="col-md-4">
                                            <?php echo $this->Form->input('procedure_no', array('id'=>'procedure_no','class'=>'form-control','placeholder'=>'Enter the Procedure No','label'=>false,'name'=>'procedure_no')); ?>
                                        </div>
                                        <label class="col-md-2 control-label" for="department_id">Department <span class="text-danger">*</span></label>
                                        <div class="col-md-4">
                                           <?php echo $this->Form->input('department_id', array('id'=>'department_id','class'=>'form-control select-chosen','label'=>false,'name'=>'department_id','type'=>'select','options'=>$departments,'empty'=>'Select Department Name')); ?>
                                        </div>
                                    </div>
                                <div class="form-group">
                                        <label class="col-md-2 control-label" for="range_description">Description</label>
                                        <div class="col-md-4">
                                           <?php echo $this->Form->input('description', array('id'=>'description','class'=>'form-control','placeholder'=>'Enter the Description','label'=>false,'name'=>'description')); ?>
                                        </div>
                                        
                                        <label class="col-md-2 control-label" for="status">Active</label>
                                        <div class="col-md-4 form-control-static">
                                            <?php echo $this->Form->checkbox('status', array('id'=>'status','class'=>'','label'=>false,'name'=>'status')); ?>
                                        </div>
                                    </div>
                                    <div class="form-group form-actions">
                                        <div class="col-md-9 col-md-offset-3">
                                            <div class="pull-right">
                                            <?php echo $this->Form->input('Procedure.id', array('name'=>'pro_id','id'=>'pro_id','type'=>'hidden','value'=>$procedure_dat['Procedure']['id'])); ?>
                                            <?php // echo $this->Form->button('<i class="fa fa-angle-right"></i> Update',array('type'=>'submit','class'=>'btn btn-sm btn-primary','escape' => false)); ?>
                                            <?php //echo $this->Html->link('<i class="fa fa-angle-left"></i> Cancel',array('controller'=>'Instruments','action'=>'index'), array('class'=>'btn btn-sm btn-danger','escape' => false)); ?>
                                                 <?php if($user_role['ins_procedureno']['edit'] == 1 && $procedure_dat['Procedure']['is_approved']==0): ?>
                                                <?php if($user_role['app_procedureno']['view'] == 1){ ?>
                                                <?php  echo $this->Form->button('<i class="fa fa-angle-right"></i> <b>Approve</b>',array('type'=>'button','class'=>'btn btn-sm btn-danger approve_procedure','escape' => false)); ?>
                                                <?php  echo $this->Form->button('<i class="fa fa-angle-right"></i> Update',array('type'=>'submit','class'=>'btn btn-sm btn-primary','escape' => false)); ?>
                                                <?php } else {?>
                                                <?php  echo $this->Form->button('<i class="fa fa-angle-right"></i> Update',array('type'=>'submit','class'=>'btn btn-sm btn-primary','escape' => false)); ?>
                                                <?php } ?>
                                                     
                                                <?php else : ?>
                                                <?php  echo $this->Form->button('<i class="fa fa-angle-right"></i> Update',array('type'=>'submit','class'=>'btn btn-sm btn-primary','escape' => false)); ?>
                                                <?php echo $this->Html->link('<i class="fa fa-angle-left"></i> Cancel',array('controller'=>'Procedures','action'=>'index'), array('class'=>'btn btn-sm btn-warning','escape' => false)); ?>
                                                <?php endif; ?>
                                                <!--                                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Submit</button>
                                            <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Reset</button>-->
                                            </div>
                                        </div>
                                    </div>
<!--                                     <div class="form-group form-actions">
                                        <div class="col-md-9 col-md-offset-3">
                                            <?php  //echo $this->Form->button('<i class="fa fa-angle-right"></i> Update',array('type'=>'submit','class'=>'btn btn-sm btn-primary','escape' => false)); ?>
                                            <?php //echo $this->Html->link('<i class="fa fa-angle-left"></i> Cancel',array('controller'=>'Procedures','action'=>'index'), array('class'=>'btn btn-sm btn-danger','escape' => false)); ?>
                                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Submit</button>
                                            <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Reset</button>
                                        </div>
                                    </div>-->
                                <?php echo $this->Form->end(); ?>
                                <!-- END Basic Form Elements Content -->
                            </div>
                            <!-- END Basic Form Elements Block -->
                        </div>

                        