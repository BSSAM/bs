 <h1>
                                <i class="gi gi-notes_2"></i>Add User Role
                            </h1>
                        </div>
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                          <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
                        <li><?php echo $this->Html->link('User Role',array('controller'=>'Userroles','action'=>'index')); ?></li>
                        <li>Add Userroles</li>
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
                                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered" onsubmit="return false;">
                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="example-text-input">User Role</label>
                                        <div class="col-md-4">
                                            <input type="text" id="example-text-input" name="example-text-input" class="form-control" placeholder="Text">
                                            <span class="help-block">This is a help text</span>
                                        </div>
                                   
                                        <label class="col-md-2 control-label" for="example-email-input">Description</label>
                                        <div class="col-md-4">
                                            <input type="email" id="example-email-input" name="example-email-input" class="form-control" placeholder="Enter Email">
                                            <span class="help-block">Please enter your email</span>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                    <div class="col-md-6">
                                    <div class="block">
                                        <!-- Interactive Title -->
                                        <div class="block-title1">
                                            <!-- Interactive block controls (initialized in js/app.js -> interactiveBlocks()) -->
                                            <div class="block-options pull-right">
                                                <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary active" data-toggle="block-toggle-content"><i class="fa fa-arrows-v"></i></a>
                                            </div>
                                            <h2><strong>Users</strong></h2>
                                        </div>
                                        <!-- END Interactive Title -->
                            
                                        <!-- Interactive Content -->
                                        <!-- The content you will put inside div.block-content, will be toggled -->
                                        <div class="block-content" style="display: none;">
                                            <a href="#modal-regular" class="btn btn-primary" data-toggle="modal">Modal</a><br>
                                            <div id="modal-regular" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                            <h3 class="modal-title">Modal Title</h3>
                                                        </div>
                                                        <div class="modal-body">
                                                            Modal Content..
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-sm btn-primary">Save changes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul class="fa-ul list-li-push">
                                                <li><i class="fa fa-li fa-check text-success"></i> Toggle block's content</li>
                                                <li><i class="fa fa-li fa-check text-success"></i> Toggle it fullscreen</li>
                                                <li><i class="fa fa-li fa-check text-success"></i> or Hide it!</li>
                                            </ul>
                                        </div>
                                       
                                        <!-- END Interactive Content -->
                                    </div>
                                    </div>
                                   
                                    <div class="col-md-6">
                                    <div class="block">
                                        <!-- Interactive Title -->
                                        <div class="block-title1">
                                            <!-- Interactive block controls (initialized in js/app.js -> interactiveBlocks()) -->
                                            <div class="block-options pull-right">
                                                <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary active" data-toggle="block-toggle-content"><i class="fa fa-arrows-v"></i></a>
                                            </div>
                                            <h2><strong>Customers</strong></h2>
                                        </div>
                                        <!-- END Interactive Title -->
                            
                                        <!-- Interactive Content -->
                                        <!-- The content you will put inside div.block-content, will be toggled -->
                                        <div class="block-content" style="display: none;">
                                            <a href="#modal-regular" class="btn btn-primary" data-toggle="modal">Modal</a><br>
                                            <div id="modal-regular" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                            <h3 class="modal-title">Modal Title</h3>
                                                        </div>
                                                        <div class="modal-body">
                                                            Modal Content..
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-sm btn-primary">Save changes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul class="fa-ul list-li-push">
                                                <li><i class="fa fa-li fa-check text-success"></i> Toggle block's content</li>
                                                <li><i class="fa fa-li fa-check text-success"></i> Toggle it fullscreen</li>
                                                <li><i class="fa fa-li fa-check text-success"></i> or Hide it!</li>
                                            </ul>
                                        </div>
                                       
                                        <!-- END Interactive Content -->
                                    </div>
                                    </div>
                                    </div>
                                    
                                    <div class="form-group">
                                    <div class="col-md-6">
                                    <div class="block">
                                        <!-- Interactive Title -->
                                        <div class="block-title1">
                                            <!-- Interactive block controls (initialized in js/app.js -> interactiveBlocks()) -->
                                            <div class="block-options pull-right">
                                                <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary active" data-toggle="block-toggle-content"><i class="fa fa-arrows-v"></i></a>
                                            </div>
                                            <h2><strong>Instruments</strong></h2>
                                        </div>
                                        <!-- END Interactive Title -->
                            
                                        <!-- Interactive Content -->
                                        <!-- The content you will put inside div.block-content, will be toggled -->
                                        <div class="block-content" style="display: none;">
                                            <a href="#modal-regular" class="btn btn-primary" data-toggle="modal">Modal</a><br>
                                            <div id="modal-regular" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                            <h3 class="modal-title">Modal Title</h3>
                                                        </div>
                                                        <div class="modal-body">
                                                            Modal Content..
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-sm btn-primary">Save changes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul class="fa-ul list-li-push">
                                                <li><i class="fa fa-li fa-check text-success"></i> Toggle block's content</li>
                                                <li><i class="fa fa-li fa-check text-success"></i> Toggle it fullscreen</li>
                                                <li><i class="fa fa-li fa-check text-success"></i> or Hide it!</li>
                                            </ul>
                                        </div>
                                       
                                        <!-- END Interactive Content -->
                                    </div>
                                    </div>
                                   
                                    <div class="col-md-6">
                                    <div class="block">
                                        <!-- Interactive Title -->
                                        <div class="block-title1">
                                            <!-- Interactive block controls (initialized in js/app.js -> interactiveBlocks()) -->
                                            <div class="block-options pull-right">
                                                <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary active" data-toggle="block-toggle-content"><i class="fa fa-arrows-v"></i></a>
                                            </div>
                                            <h2><strong>Settings</strong></h2>
                                        </div>
                                        <!-- END Interactive Title -->
                            
                                        <!-- Interactive Content -->
                                        <!-- The content you will put inside div.block-content, will be toggled -->
                                        <div class="block-content" style="display: none;">
                                            <a href="#modal-regular" class="btn btn-primary" data-toggle="modal">Modal</a><br>
                                            <div id="modal-regular" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                            <h3 class="modal-title">Modal Title</h3>
                                                        </div>
                                                        <div class="modal-body">
                                                            Modal Content..
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-sm btn-primary">Save changes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul class="fa-ul list-li-push">
                                                <li><i class="fa fa-li fa-check text-success"></i> Toggle block's content</li>
                                                <li><i class="fa fa-li fa-check text-success"></i> Toggle it fullscreen</li>
                                                <li><i class="fa fa-li fa-check text-success"></i> or Hide it!</li>
                                            </ul>
                                        </div>
                                       
                                        <!-- END Interactive Content -->
                                    </div>
                                    </div>
                                    </div>
                                    
                                    
                                     <div class="form-group form-actions">
                                        <div class="col-md-9 col-md-offset-3">
                                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Submit</button>
                                            <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Reset</button>
                                        </div>
                                    </div>
                                </form>
                                <!-- END Basic Form Elements Content -->
                            </div>
                            <!-- END Basic Form Elements Block -->
                        </div>
                        