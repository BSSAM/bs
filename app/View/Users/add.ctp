<h1>
    <i class="gi gi-user"></i>Add Users
</h1>
                        </div>
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                          <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
                        <li><?php echo $this->Html->link('Users',array('controller'=>'Users','action'=>'index')); ?></li>
                        <li>Add Users</li>
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
                                 <?php echo $this->Form->create('User',array('class'=>'form-horizontal form-bordered','id'=>'form-user-add')); ?>
                                
                                    <div class="form-group">
                                       
                                        <label class="col-md-2 control-label" for="val_username">UserName</label>
                                        <div class="col-md-4">
                                            <?php echo $this->Form->input('username', array('id'=>'val_username','class'=>'form-control','placeholder'=>'Enter the User Name','label'=>false,'name'=>'username')); ?>
                                        </div>
                                   
                                        <label class="col-md-2 control-label" for="val_password">Password</label>
                                        <div class="col-md-4">
                                           <?php echo $this->Form->password('password', array('id'=>'val_password','class'=>'form-control','placeholder'=>'Enter the Password','label'=>false,'name'=>'password')); ?>
                                        </div>
                                   
                                    </div>
                                
                                <div class="form-group">
                                       
                                        <label class="col-md-2 control-label" for="val_firstname">First Name</label>
                                        <div class="col-md-4">
                                            <?php echo $this->Form->input('firstname', array('id'=>'val_firstname','class'=>'form-control','placeholder'=>'Enter the First Name','label'=>false,'name'=>'firstname')); ?>
                                        </div>
                                   
                                        <label class="col-md-2 control-label" for="val_lastname">Last Name</label>
                                        <div class="col-md-4">
                                           <?php echo $this->Form->input('lastname', array('id'=>'val_lastname','class'=>'form-control','placeholder'=>'Enter the Last Name','label'=>false,'name'=>'lastname')); ?>
                                        </div>
                                   
                                    </div>
                                
                                <div class="form-group">
                                       
                                        <label class="col-md-2 control-label" for="val_emailid">Email Id</label>
                                        <div class="col-md-4">
                                            <?php echo $this->Form->input('emailid', array('id'=>'val_emailid','class'=>'form-control','placeholder'=>'Enter the E-Mail Id','label'=>false,'name'=>'emailid')); ?>
                                        </div>
                                   
                                        <label class="col-md-2 control-label" for="val_userrole">User Role</label>
                                        <div class="col-md-4">
                                           <?php echo $this->Form->input('userrole_id', array('id'=>'val_userrole','class'=>'form-control','options' => $userrole,'data-placeholder'=>'Enter the User Role','empty'=>'Select the User Role','label'=>false,'name'=>'userrole_id')); ?>
                                        </div>
                                   
                                    </div>
                                
                                
                                <div class="form-group">
                                       
                                        <label class="col-md-2 control-label" for="val_department">Department</label>
                                        <div class="col-md-4">
                                            <?php echo $this->Form->input('department_id', array('id'=>'val_department','class'=>'form-control','options' => $department,'data-placeholder'=>'Enter the Department','label'=>false,'name'=>'department_id','multiple'=>'multiple')); ?>
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
                                
                                <?php if($this->Session->flash()!='') { ?>
                            <script> var UiProgress = function() {
                                
                                // Get random number function from a given range
                                var getRandomInt = function(min, max) {
                                    return Math.floor(Math.random() * (max - min + 1)) + min;
                                };
                                
                                return {
                                    init: function() {
                                        
                                        
                                        
                                        $.bootstrapGrowl('User Name Already Exists!', {
                                            type: 'danger',
                                            allow_dismiss: true
                                        });
                                        
                                        $(this).prop('disabled', true);
                                        $('#val_username').focus();
                                    }
                                };
                            }();
                            
                            
                            </script> 
                            <?php } ?>
                        
                        