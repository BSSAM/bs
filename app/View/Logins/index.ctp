   <!-- Login Background -->
  
   <div id="login-background">
          <!--   For best results use an image with a resolution of 2560x400 pixels (prefer a blurred image for smaller file size) -->
            <?php //echo $this->Html->image('placeholders/headers/login_header.jpg', array('alt' => 'Login Background','class'=>'')); ?>
        </div>
        <!-- END Login Background -->

        <!-- Login Container -->
        <div id="login-container">
            <!-- Login Title -->
            <div class="login-title text-center">
                <h1> <span style="color: #000000;"> <strong>Best Standard Enterprise</strong></span><?php //echo $this->Html->image('logoBs.png', array('alt' => 'Login Background','class'=>'animation-pulseSlow')); ?><br><h5 class="custom_header">Your Global Alliance</h5></h1>
            </div>
            <!-- END Login Title -->

            <!-- Login Block -->
            <div class="block remove-margin">
                <!-- Login Form -->
                <?php echo $this->Form->create('Logins',array('id'=> 'form-login', 'class'=> 'form-horizontal form-bordered')); ?>
                <!-- <form action="dashboards" method="post" id="form-login" class="form-horizontal form-bordered form-control-borderless"> -->
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="gi gi-user"></i></span>
                                <?php echo $this->Form->input('username', array('id'=>'val_username','class'=>'form-control input-lg','placeholder'=>'Username','label'=>'','name'=>'val_username')); ?>
                                <!--<input type="text" id="login-user" name="login-user" class="form-control input-lg" placeholder="Username">-->
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                                <?php echo $this->Form->input('password', array('type'=>'password','id'=>'val_password','class'=>'form-control input-lg','placeholder'=>'Password','label'=>'','name'=>'val_password')); ?>
                                <!--<input type="password" id="login-password" name="login-password" class="form-control input-lg" placeholder="Password">-->
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-actions">
                        <div id ="custom_error" class="help-block_login"></div>
                        <!--<div class="col-xs-4">
                            <label class="switch switch-primary" data-toggle="tooltip" title="Remember Me?">
                                <input type="checkbox" id="login-remember-me" name="login-remember-me" checked>
                                <span></span>
                            </label>
                        </div>-->
                        <div class="col-xs-13 text-right">
                            <?php echo $this->Form->submit('Login',array('class' => 'btn btn-sm btn-warning', 'title' => 'Login to Dashboard')); ?>
                            <?php echo $this->Form->end(); ?>
                            <!--<button type="submit" class="btn btn-sm btn-default"><i class="fa fa-angle-right"></i> Login to Dashboard</button>-->
                        </div>
                    </div>
                    <!--<div class="form-group">
                        <div class="col-xs-12">
                            <p class="text-center remove-margin"><small>Don't have an account?</small> <a href="javascript:void(0)" id="link-login"><small>Create one for free!</small></a></p>
                        </div>
                    </div>-->
                </form>
                <!-- END Login Form -->

        <!-- END Modal Terms -->
        <?php echo $this->Html->script('pages/formsValidation'); ?>
        <script>$(function(){ FormsValidation.init(); });</script>
         <?php 
   if(isset($sess_login_failure))
   {
   ?>
   <script>
    $(function(){ 
        $('.form-group').addClass("has-error");
        $('.help-block_login').addClass("custom_error_cl");
        $('#custom_error').addClass("animation-slideDown");
        $('#custom_error').append( "<?php echo $sess_login_failure; ?>" );
    });
   </script>
   <?php
   }
   else
   {
   ?>
   <script>
    $(function(){ 
        $('#custom_error').val('');
        $('.form-group').removeClass("has-error");
        $('.help-block_login').removeClass("custom_error_cl");
    });
   </script>
   <?php 
   }
   