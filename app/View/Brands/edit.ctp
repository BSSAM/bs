 <h1>
                                <i class="gi gi-user"></i>Edit Brand
                            </h1>
                        </div>
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                          <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
                        <li><?php echo $this->Html->link('Brands',array('controller'=>'Brands','action'=>'index')); ?></li>
                        <li>Edit Brand</li>
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
                                <?php echo $this->Form->create('Brand',array('class'=>'form-horizontal form-bordered','id'=>'form-brand-add')); ?>
                                
                                    <div class="form-group">
                                       
                                        <label class="col-md-2 control-label" for="brandname">Brand Name</label>
                                        <div class="col-md-4">
                                            <?php echo $this->Form->input('brandname', array('id'=>'brandname','class'=>'form-control','placeholder'=>'Enter the Department Name','label'=>false,'name'=>'brandname')); ?>
                                        </div>
                                   
                                        <label class="col-md-2 control-label" for="branddescription">Brand Description</label>
                                        <div class="col-md-4">
                                           <?php echo $this->Form->input('branddescription', array('id'=>'branddescription','class'=>'form-control','placeholder'=>'Enter the Description','label'=>false,'name'=>'branddescription')); ?>
                                        </div>
                                   
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="status">Active</label>
                                        <div class="col-md-4 form-control-static">
                                            <?php echo $this->Form->checkbox('status', array('id'=>'status','label'=>false,'name'=>'status')); ?>
                                        </div>
                                    </div>
                                    
                                     <div class="form-group form-actions">
                                        <div class="col-md-9 col-md-offset-3">
                                            
                                            <div class="pull-right">
                                                <?php echo $this->Form->input('Brand.id', array('name'=>'brand_id','id'=>'brand_id','type'=>'hidden','value'=>$brand_dat['Brand']['id'])); ?>
                                               
                                                <?php if($user_role['ins_brand']['edit'] == 1 && $brand_dat['Brand']['is_approved']==0): ?>
                                                 <?php if($user_role['app_brand']['view'] == 1){ ?>
                                                <?php  echo $this->Form->button('<i class="fa fa-angle-right"></i> <b>Approve</b>',array('type'=>'button','class'=>'btn btn-sm btn-danger approve_brand','escape' => false)); ?>
                                                <?php } else {?>
                                                <?php  echo $this->Form->button('<i class="fa fa-angle-right"></i> Update',array('type'=>'submit','class'=>'btn btn-sm btn-primary','escape' => false)); ?>
                                                <?php } ?>
                                                <?php else : ?>
                                                <?php  echo $this->Form->button('<i class="fa fa-angle-right"></i> Update',array('type'=>'submit','class'=>'btn btn-sm btn-primary','escape' => false)); ?>
                                                <?php endif; ?>
                                                
                                               
                                                
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
                        