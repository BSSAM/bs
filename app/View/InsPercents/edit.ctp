        <script> var path='<?PHP echo Router::url('/',true); ?>'; </script> 
        <h1>
                <i class="gi gi-user"></i>Edit Mark Up
        </h1>
    </div>
</div>
<ul class="breadcrumb breadcrumb-top">
      <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
    <li><?php echo $this->Html->link('Mark Up',array('controller'=>'InsPercents','action'=>'index')); ?></li>
    <li>Edit Mark Up</li>
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
                                <?php echo $this->Form->create('InsPercent',array('class'=>'form-horizontal form-bordered','id'=>'form-percent-add')); ?>
                                
                                    <div class="form-group">
                                       
                                        <label class="col-md-2 control-label" for="percent">Mark Up (in %)</label>
                                        <div class="col-md-4">
                                            <?php echo $this->Form->input('InsPercent.percent', array('id'=>'percent','class'=>'form-control','placeholder'=>'Enter the Mark Up Percent','label'=>false,'name'=>'percent')); ?>
                                        </div>
                                        <label class="col-md-2 control-label" for="status">Active</label>
                                        <div class="col-md-4 form-control-static">
                                            <?php echo $this->Form->checkbox('InsPercent.status', array('id'=>'status','label'=>false,'name'=>'status')); ?>
                                        </div>
                                   
                                    </div>
                                    <div class="form-group">
                                       
                                        <label class="col-md-2 control-label">Discount Limit (in %)</label>
                                        
                                    </div>
                                    <div class="form-group">
                                       
                                        <label class="col-md-2 control-label" for="user">User</label>
                                        <div class="col-md-4">
                                            <?php echo $this->Form->input('InsPercent.user', array('id'=>'user','class'=>'form-control','placeholder'=>'Enter the User Percent','label'=>false,'name'=>'user')); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                       
                                        <label class="col-md-2 control-label" for="supervisor">Supervisor</label>
                                        <div class="col-md-4">
                                            <?php echo $this->Form->input('InsPercent.supervisor', array('id'=>'supervisor','class'=>'form-control','placeholder'=>'Enter the Supervisor Percent','label'=>false,'name'=>'supervisor')); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                       
                                        <label class="col-md-2 control-label" for="manager">Manager</label>
                                        <div class="col-md-4">
                                            <?php echo $this->Form->input('InsPercent.manager', array('id'=>'manager','class'=>'form-control','placeholder'=>'Enter the Manager Percent','label'=>false,'name'=>'manager')); ?>
                                        </div>
                                    </div>
                                     <div class="form-group form-actions">
                                        <div class="col-md-9 col-md-offset-3">
                                            
                                            <div class="pull-right">
                                                <?php echo $this->Form->input('InsPercent.id', array('name'=>'percent_id','id'=>'percent_id','type'=>'hidden','value'=>$percent_dat['InsPercent']['id'])); ?>
                                                <?php  echo $this->Form->button('<i class="fa fa-angle-right"></i> Update',array('type'=>'submit','class'=>'btn btn-sm btn-primary','escape' => false)); ?>
                                            </div>
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
                        