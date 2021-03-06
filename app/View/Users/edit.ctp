 <h1>
                                <i class="gi gi-user"></i>Edit Users
                            </h1>
                        </div>
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                          <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
                        <li><?php echo $this->Html->link('Users',array('controller'=>'Users','action'=>'index')); ?></li>
                        <li>Edit Users</li>
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
                                       
                                        <label class="col-md-2 control-label" for="val_username">UserName <span class="text-danger">*</span></label>
                                        <div class="col-md-4">
                                            <?php echo $this->Form->input('username', array('id'=>'val_username','class'=>'form-control','placeholder'=>'Enter the User Name','label'=>false,'name'=>'username')); ?>
                                        </div>
                                   
                                        <label class="col-md-2 control-label" for="val_password">Password <span class="text-danger">*</span></label>
                                        <div class="col-md-4">
                                           <?php echo $this->Form->password('password', array('id'=>'val_password','class'=>'form-control','placeholder'=>'Enter the Password','label'=>false,'name'=>'password')); ?>
                                        </div>
                                   
                                    </div>
                                
                                <div class="form-group">
                                       
                                        <label class="col-md-2 control-label" for="val_firstname">First Name <span class="text-danger">*</span></label>
                                        <div class="col-md-4">
                                            <?php echo $this->Form->input('firstname', array('id'=>'val_firstname','class'=>'form-control','placeholder'=>'Enter the First Name','label'=>false,'name'=>'firstname')); ?>
                                        </div>
                                   
                                        <label class="col-md-2 control-label" for="val_password">Last Name</label>
                                        <div class="col-md-4">
                                           <?php echo $this->Form->input('lastname', array('id'=>'val_lastname','class'=>'form-control','placeholder'=>'Enter the Last Name','label'=>false,'name'=>'lastname')); ?>
                                        </div>
                                   
                                    </div>
                                
                                <div class="form-group">
                                       
                                        <label class="col-md-2 control-label" for="val_emailid">Email Id <span class="text-danger">*</span></label>
                                        <div class="col-md-4">
                                            <?php echo $this->Form->input('emailid', array('id'=>'val_emailid','class'=>'form-control','placeholder'=>'Enter the E-Mail Id','label'=>false,'name'=>'emailid')); ?>
                                        </div>
                                   
                                        <label class="col-md-2 control-label" for="val_userrole">User Role <span class="text-danger">*</span></label>
                                        <div class="col-md-4">
                                           <?php echo $this->Form->input('userrole_id', array('id'=>'val_userrole','class'=>'select-chosen form-control','options' => $userrole,'empty'=>'Enter the User Role','label'=>false,'name'=>'userrole_id')); ?>
                                        </div>
                                   
                                    </div>
                                
                                
                                <div class="form-group">
                                       
                                        <label class="col-md-2 control-label" for="val_department">Department <span class="text-danger">*</span></label>
                                        <div class="col-md-4">
                                         <select  name="data[department_id][]" class="select-chosen required" data-placeholder="Select the Department name" style="width: 250px;" multiple >
                                                    <?PHP foreach ($department as $k => $v): ?>
                                                    <?php 
                                                         $get_sales = $this->User->checkdepartment_value($this->request->data['User']['id'], $k);
                                                         $selected_procedure = ($get_sales == 1) ? 'selected="selected"' : ''; ?>
                                                        <option <?PHP echo $selected_procedure; ?> value=<?PHP echo $k ?>><?PHP echo $v; ?></option>
                                                    <?PHP endforeach; ?>
                                        </select>
                                        </div>
<!--                                        <div class="col-md-4">
                                            <?php //echo $this->Form->input('department_id', array('id'=>'val_department','class'=>'select-chosen','options' => $department,'data-placeholder'=>'Enter the Department','label'=>false,'name'=>'department_id','multiple'=>true,'style'=>'width: 250px; display: none;')); ?>
                                        </div>-->
                                   
                                    </div>
                                
                                <div class="form-group form-actions">
                                        <div class="col-md-9 col-md-offset-3">
                                            
                                            <?php  echo $this->Form->button('<i class="fa fa-angle-right"></i> Update',array('type'=>'submit','class'=>'btn btn-sm btn-primary','escape' => false)); ?>
                                            <?php echo $this->Html->link('<i class="fa fa-angle-left"></i> Cancel',array('controller'=>'Users','action'=>'index'), array('type'=>'reset','class'=>'btn btn-sm btn-warning','escape' => false)); ?>
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
                                
                               
                        
                        