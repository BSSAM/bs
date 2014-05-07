 <h1>
                                <i class="gi gi-notes_2"></i>Add User Role
                            </h1>
                        </div>
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                          <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
                        <li><?php echo $this->Html->link('Userrole',array('controller'=>'Userroles','action'=>'index')); ?></li>
                        <li>Add Userroles</li>
                    </ul>
                    <!-- END Forms General Header -->

<div class="row">
                        <div class="col-md-12">
                            <!-- Basic Form Elements Block -->
                            <div class="block">
                                <!-- Basic Form Elements Title -->
                                <div class="block-title">
                                   
                                    <h2><strong>Basic Form</strong> Elements</h2>
                                </div>
                                <!-- END Form Elements Title -->
<?php
//echo $this->Form->create('Product'); 
//echo $this->Form->input('name');
//echo $this->Form->input('description', array('rows'=>'3'));
//echo $this->Form->input('price');
//echo $this->Form->input('id',array('options' => $category,'empty' => '(choose one)'));
//echo $this->Form->input('status', array('options' => array(1=>'yes', 2=>'No'),'empty' => '(choose one)')); 
//echo $this->Form->input('id',array('type'=>'hidden'));
//echo $this->Form->end('Save Product'); 
?>
                                <!-- Basic Form Elements Content -->
                                <?php echo $this->Form->create('Userrole',array('class'=>'form-horizontal form-bordered')); ?>
                               <!-- <form action="" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered" onsubmit="return false;">-->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="example-text-input">Id</label>
                                        <div class="col-md-4">
                                           <?php echo $this->Form->input('Userrole.user_role_id',array('disabled'=>'disabled','type'=>'text','class'=>'form-control','label'=>false)); ?>
                                        </div>
                                   
                                        <label class="col-md-2 control-label" for="example-email-input">User Role</label>
                                        <div class="col-md-4">
                                            <!-- <select id="user_role" name="user_role" class="select-chosen" data-placeholder="Choose a User Role.." style="width: 250px; display: none;">
                                                   
                                            </select>-->
                                            <?php //echo $this->Form->input('Userrole.user_role', array('options' => $userrole,'empty' => '(choose one)'));
                                            //echo $userrole[1];
                                            //echo $userrole[2];
                                            //echo $role['Userrole']['user_role_id'];exit;
                                            if($role['Userrole']['user_role_id']==1||$role['Userrole']['user_role_id']==2)
                                            {
                                                echo $this->Form->input('Userrole.user_role_id',array('disabled'=>'disabled','options' => $userrole,'data-placeholder' => '(Choose a User Role..)',
                                                'class'=>'select-chosen','label'=>false,'style'=>'width: 250px; display: none;'));
                                            }
                                            else{
                                                echo $this->Form->input('Userrole.user_role_id',array('options' => $userrole,'data-placeholder' => '(Choose a User Role..)',
                                                'class'=>'select-chosen','label'=>false,'style'=>'width: 250px; display: none;'));
                                            }
                                            ?>
                                        </div>
                                    </div>
                                   
                                    
                                     <div class="form-group form-actions">
                                        <div class="col-md-9 col-md-offset-3">
                                            <?php echo $this->Form->input('user_role_id',array('type'=>'hidden')); ?>
                                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Submit</button>
                                            <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Reset</button>
                                        </div>
                                    </div>
                                <?php echo $this->Form->end(); ?>
                                <!-- END Basic Form Elements Content -->
                            </div>
                            <!-- END Basic Form Elements Block -->
                        </div>
                        