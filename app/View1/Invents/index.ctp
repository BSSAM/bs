<h1>
                                <i class="fa fa-magic"></i>Searching - '<?php echo $search; ?>'
                            </h1>
                        </div>
                    </div>
                  
                    <!-- END Wizard Header -->

                    <!-- Progress Bar Wizard Block -->
                   
                        <!-- END Progress Bar Wizard Title -->

                        <!-- Progress Bar Wizard Content -->
                        <div class="row">
<?php if($search == 'SBS111111'){ ?>

<div class="col-sm-6 col-sm-offset-1">
                                <!-- Wizard Progress Bar, functionality initialized in js/pages/formsWizard.js -->
                                <div class="progress progress-striped active">
                                    <div id="progress-bar-wizard" class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0"></div>
                                </div>
                                <!-- END Wizard Progress Bar -->

                                <!-- Progress Wizard Content -->
                                <form id="progress-wizard" action="page_forms_wizard.html" method="post" class="form-horizontal">
                                    <!-- First Step -->
                                    <div id="progress-first" class="step">
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="example-username">Username</label>
                                            <div class="col-md-8">
                                                <input type="text" id="example-progress-username" name="example-progress-username" class="form-control" placeholder="Your username..">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="example-email">Email</label>
                                            <div class="col-md-8">
                                                <input type="text" id="example-progress-email" name="example-progress-email" class="form-control" placeholder="test@example.com">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="example-password">Password</label>
                                            <div class="col-md-8">
                                                <input type="password" id="example-progress-password" name="example-progress-password" class="form-control" placeholder="Choose a crazy one..">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="example-password2">Retype Password</label>
                                            <div class="col-md-8">
                                                <input type="password" id="example-progress-password2" name="example-progress-password2" class="form-control" placeholder="..and confirm it!">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END First Step -->

                                    <!-- Second Step -->
                                    <div id="progress-second" class="step">
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="example-firstname">Firstname</label>
                                            <div class="col-md-8">
                                                <input type="text" id="example-progress-firstname" name="example-progress-firstname" class="form-control" placeholder="John..">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="example-lastname">Lastname</label>
                                            <div class="col-md-8">
                                                <input type="text" id="example-progress-lastname" name="example-progress-lastname" class="form-control" placeholder="Doe..">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="example-address">Address</label>
                                            <div class="col-md-8">
                                                <input type="text" id="example-progress-address" name="example-progress-address" class="form-control" placeholder="Where do you live?">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="example-city">City</label>
                                            <div class="col-md-8">
                                                <input type="text" id="example-progress-city" name="example-progress-city" class="form-control" placeholder="Which one?">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END Second Step -->

                                    <!-- Third Step -->
                                    <div id="progress-third" class="step">
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="example-bio">Bio</label>
                                            <div class="col-md-8">
                                                <textarea id="example-progress-bio" name="example-progress-bio" rows="5" class="form-control" placeholder="Tell us your story.."></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="example-newsletter">Newsletter</label>
                                            <div class="col-md-8">
                                                <div class="checkbox">
                                                    <label for="example-progress-newsletter">
                                                        <input type="checkbox" id="example-progress-newsletter" name="example-progress-newsletter"> Sign up
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label"><a href="#modal-terms" data-toggle="modal">Terms</a></label>
                                            <div class="col-md-8">
                                                <label class="switch switch-primary" for="example-progress-terms">
                                                    <input type="checkbox" id="example-progress-terms" name="example-progress-terms" value="1">
                                                    <span data-toggle="tooltip" title="I agree to the terms!"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END Third Step -->

                                    <!-- Form Buttons -->
                                    <div class="form-group form-actions">
                                        <div class="col-md-8 col-md-offset-4">
                                            <input type="reset" class="btn btn-sm btn-warning" id="back3" value="Back">
                                            <input type="submit" class="btn btn-sm btn-primary" id="next3" value="Next">
                                        </div>
                                    </div>
                                    <!-- END Form Buttons -->
                                </form>
                                <!-- END Progress Wizard Content -->
                            </div>


                    <?php }else{ ?>
                            <div class="col-sm-8 col-sm-offset-2 text-center">
                    <h1><i class="fa fa-exclamation-triangle text-info animation-pulse"></i></h1>
                    <h2 class="h3">Oops, we are sorry but Your Search is not matching any records we have..</h2>
                </div>
                        
                           <?php } ?>
                        </div>
        <?php echo $this->Html->script('pages/formsWizard'); ?>
        <script>$(function(){ FormsWizard.init(); });</script>
