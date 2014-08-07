<h1>
                                <i class="gi gi-brush"></i>Tracking
                            </h1>
                        </div>
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                        <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
                        <li><?php echo $this->Html->link('Track',array('controller'=>'Tracks','action'=>'index')); ?></li>
                        <li><?php echo $this->Html->link($track,array('controller'=>'Tracks','action'=>'index?track_id='.$track)); ?></a></li>
                    </ul>
                    <!-- END Blank Alternative Header -->

                    <!-- Blank Alternative Content -->
                    <article>
                                    <h3 class="sub-header text-center"><strong><?php echo $track; ?></strong></h3>
                                    
                    </article>
                    <div class="block block-alt-noborder">
                    <div class="row">
                            <div class="col-md-12">
                            <div class="progress progress-striped">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">Is in Salesorder Approval (40%)</div>
                                </div>
                            </div>
                    </div>
                    </div>
                    <div class="block block-alt-noborder">
                        <div class="row">
<!--                            <div class="col-md-12">
                            <div class="progress progress-striped">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">80%</div>
                                </div>
                            </div>-->
<!--                            <div class="col-sm-4 col-sm-offset-1">
                                <div class="block-section">
                                    <h3 class="sub-header text-center"><strong>Sign Up with 3 easy steps!</strong></h3>
                                    <p class="clearfix"><i class="fa fa-plus fa-5x text-primary pull-left"></i>Sign up today and receive <span class="text-success"><strong>30% discount</strong></span> on all plans! Our web application will save you time and enable you to work faster and more efficiently.</p>
                                    <p>
                                        <a href="javascript:void(0)" class="btn btn-lg btn-primary btn-block">Learn More.. <i class="fa fa-arrow-right"></i></a>
                                    </p>
                                </div>
                            </div>-->
                            

                            <div class="col-md-12">
                            <!-- Course Widget -->
                            <div class="widget">
<!--                                <div class="widget-advanced">-->
                                    <!-- Widget Header -->
<!--                                    <div class="widget-header text-center themed-background-dark">
                                        <div class="widget-options">
                                            
                                        </div>
                                        <h3 class="widget-content-light">
                                            <a href="page_ready_elearning_course_lessons.html"><small>JOB</small> COM1234567890<small> is Not Completed Yet !!</small></a><br>
                                            
                                        </h3>
                                    </div>-->
                                    <!-- END Widget Header -->

                                    <!-- Widget Main -->
                                    <div class="widget-main">
<!--                                        <a href="javascript:void(0)" class="widget-image-container animation-fadeIn">
                                            <span class="widget-icon themed-background"><i class="fa fa-globe"></i></span>
                                        </a>-->
<!--                                        <a href="javascript:void(0)" class="btn btn-sm btn-default pull-right">
                                            15 lessons,
                                            <i class="fa fa-clock-o"></i> 8 hours
                                        </a>
                                        <a href="javascript:void(0)" class="btn btn-sm btn-success">Free with Subscription</a>-->
                                        <hr>
                                        <!-- Lessons -->
<!--                                        <table class="table table-vcenter">
                                            <thead>
                                                <tr class="active">
                                                    <th>Quotation</th>
                                                    <th class="text-right"><small><em>3 hour</em></small></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><del>BSQ1234567890</del></td>
                                                    <td class="text-right"><a href="page_ready_elearning_course_lesson.html" class="btn btn-xs btn-success" data-toggle="tooltip" title="Done!"><i class="fa fa-check"></i></a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                         <table class="table table-vcenter">
                                            <thead>
                                                <tr class="active">
                                                    <th>Sales Order</th>
                                                    <th class="text-right"><small><em>5 hour</em></small></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><del>BSO1234567890</del></td>
                                                    <td class="text-right"><a href="page_ready_elearning_course_lesson.html" class="btn btn-xs btn-success" data-toggle="tooltip" title="Done!"><i class="fa fa-check"></i></a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                         <table class="table table-vcenter">
                                            <thead>
                                                <tr class="active">
                                                    <th>Lab Process</th>
                                                    <th class="text-right"><small><em> 0 hour</em></small></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><del> None </del></td>
                                                    <td class="text-right"><a href="page_ready_elearning_course_lesson.html" class="btn btn-xs btn-danger" data-toggle="tooltip" title="Done!"><i class="fa fa-exclamation"></i></a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                         <table class="table table-vcenter">
                                            <thead>
                                                <tr class="active">
                                                    <th>Delivery Order</th>
                                                    <th class="text-right"><small><em>0 hour</em></small></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><del>None</del></td>
                                                    <td class="text-right"><a href="page_ready_elearning_course_lesson.html" class="btn btn-xs btn-danger" data-toggle="tooltip" title="Done!"><i class="fa fa-exclamation"></i></a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                         <table class="table table-vcenter">
                                            <thead>
                                                <tr class="active">
                                                    <th>Invoice</th>
                                                    <th class="text-right"><small><em>0 hour</em></small></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><del>None</del></td>
                                                    <td class="text-right"><a href="page_ready_elearning_course_lesson.html" class="btn btn-xs btn-danger" data-toggle="tooltip" title="Done!"><i class="fa fa-exclamation"></i></a></td>
                                                </tr>
                                            </tbody>
                                        </table>-->
                                          
                                        <div class="timeline block-content-full">
                                    <h3 class="timeline-header">Job Track <small><strong>Reg Date : <?php foreach($Quo_det as $Quo_details): ?><?php echo $Quo_details['Quotation']['reg_date']; ?><?php endforeach;?></strong></small></h3>
                                    <!-- You can remove the class .timeline-hover if you don't want each event to be highlighted on mouse hover -->
                                    <ul class="timeline-list timeline-hover">
                                      <?php foreach($Quo_det as $Quo_details): ?>
                                        <li class="alert alert-success">
                                            <div class="timeline-icon"></div>
                                            <div class="timeline-time"><strong><?php echo $Quo_details['Quotation']['created']; ?></strong></div>
                                            <div class="timeline-content">
                                                <p class="push-bit"><strong>Quotation</strong></p>
                                                <p class="push-bit"><a href="#"><?php echo $Quo_details['Quotation']['quotationno']; ?></a></p>
                                                <p class="push-bit">Created By : <code class="label label-default"><?php $Quo_details['Quotation']['created_by'];?></code> </p>
                                                <?php if($Quo_details['Quotation']['is_approved']==2):?>
                                                <p class="push-bit">Approved By : <code class="label label-success"><?php echo $this->Log->getlog_approve($Quo_details['Quotation']['quotationno']); ?></code> </p>
                                                <?php endif; ?>
<!--                                                <div class="row push">
                                                    <div class="col-sm-6 col-md-4">
                                                        <a href="img/placeholders/photos/photo6.jpg" data-toggle="lightbox-image">
                                                            <img src="img/placeholders/photos/photo6.jpg" alt="image">
                                                        </a>
                                                    </div>
                                                    <div class="col-sm-6 col-md-4">
                                                        <a href="img/placeholders/photos/photo7.jpg" data-toggle="lightbox-image">
                                                            <img src="img/placeholders/photos/photo7.jpg" alt="image">
                                                        </a>
                                                    </div>
                                                </div>-->
                                            </div>
                                        </li><br>
                                        <?php endforeach;?>
                                         <?php foreach($Sal_det as $Sal_details): ?>
                                        <li class="alert alert-success">
                                            <div class="timeline-icon"></div>
                                            <div class="timeline-time"><strong><?php echo $Sal_details['Salesorder']['created']; ?></strong></div>
                                            <div class="timeline-content">
                                                <p class="push-bit"><strong>Sales Order</strong></p>
                                                <p class="push-bit"><a href="#"><?php echo $Sal_details['Salesorder']['salesorderno']; ?></a></p>
                                                <p class="push-bit">Created By : <code class="label label-default"><?php echo $Sal_details['Salesorder']['created_by']; ?></code> </p>
                                                <?php if($Sal_details['Salesorder']['is_approved']==2):?>
                                                <p class="push-bit">Approved By : <code class="label label-success"><?php echo $this->Log->getlog_approve_sales($Sal_details['Salesorder']['salesorderno']); ?></code> </p>
                                                <?php endif; ?>
<!--                                                <div class="row push">
                                                    <div class="col-sm-6 col-md-4">
                                                        <a href="img/placeholders/photos/photo6.jpg" data-toggle="lightbox-image">
                                                            <img src="img/placeholders/photos/photo6.jpg" alt="image">
                                                        </a>
                                                    </div>
                                                    <div class="col-sm-6 col-md-4">
                                                        <a href="img/placeholders/photos/photo7.jpg" data-toggle="lightbox-image">
                                                            <img src="img/placeholders/photos/photo7.jpg" alt="image">
                                                        </a>
                                                    </div>
                                                </div>-->
                                            </div>
                                        </li>
                                        <?php endforeach;?>
                                        <br>
                                        <?php foreach($Sal_det as $Sal_details): ?>
                                         <li class="">
                                            <div class="timeline-icon"></div>
                                            <div class="timeline-time"><strong>5-April-14</strong></div>
                                            <div class="timeline-content">
                                                <p class="push-bit"><strong>Lab Process</strong></p>
                                                <p class="push-bit">BSO1234567890</p>
                                                <p class="push-bit">Created By : <code class="label label-default">ADMIN</code> </p>
<!--                                                <div class="row push">
                                                    <div class="col-sm-6 col-md-4">
                                                        <a href="img/placeholders/photos/photo6.jpg" data-toggle="lightbox-image">
                                                            <img src="img/placeholders/photos/photo6.jpg" alt="image">
                                                        </a>
                                                    </div>
                                                    <div class="col-sm-6 col-md-4">
                                                        <a href="img/placeholders/photos/photo7.jpg" data-toggle="lightbox-image">
                                                            <img src="img/placeholders/photos/photo7.jpg" alt="image">
                                                        </a>
                                                    </div>
                                                </div>-->
                                            </div>
                                        </li>
                                         <?php endforeach;?>
                                        <br>
                                         <li class="">
                                            <div class="timeline-icon"></div>
                                            <div class="timeline-time"><strong>6-April-14</strong></div>
                                            <div class="timeline-content">
                                                <p class="push-bit"><strong>Delivery Order</strong></p>
                                                <p class="push-bit">BDO1234567890</p>
                                                <p class="push-bit">Delivered By : <code class="label label-default">PACKMAN</code> </p>
<!--                                                <div class="row push">
                                                    <div class="col-sm-6 col-md-4">
                                                        <a href="img/placeholders/photos/photo6.jpg" data-toggle="lightbox-image">
                                                            <img src="img/placeholders/photos/photo6.jpg" alt="image">
                                                        </a>
                                                    </div>
                                                    <div class="col-sm-6 col-md-4">
                                                        <a href="img/placeholders/photos/photo7.jpg" data-toggle="lightbox-image">
                                                            <img src="img/placeholders/photos/photo7.jpg" alt="image">
                                                        </a>
                                                    </div>
                                                </div>-->
                                            </div>
                                        </li>
                                        <br>
                                        <li class="">
                                            <div class="timeline-icon"></div>
                                            <div class="timeline-time"><strong>5-April-14</strong></div>
                                            <div class="timeline-content">
                                                <p class="push-bit"><strong>C & D Info</strong></p>
                                                <p class="push-bit">BDO1234567890</p>
                                                <p class="push-bit">Generated By : <code class="label label-default">Iyappan</code> </p>
<!--                                                <div class="row push">
                                                    <div class="col-sm-6 col-md-4">
                                                        <a href="img/placeholders/photos/photo6.jpg" data-toggle="lightbox-image">
                                                            <img src="img/placeholders/photos/photo6.jpg" alt="image">
                                                        </a>
                                                    </div>
                                                    <div class="col-sm-6 col-md-4">
                                                        <a href="img/placeholders/photos/photo7.jpg" data-toggle="lightbox-image">
                                                            <img src="img/placeholders/photos/photo7.jpg" alt="image">
                                                        </a>
                                                    </div>
                                                </div>-->
                                            </div>
                                        </li><br>
                                        <li class="">
                                            <div class="timeline-icon"></div>
                                            <div class="timeline-time"><strong>5-April-14</strong></div>
                                            <div class="timeline-content">
                                                <p class="push-bit"><strong>Invoice Generation</strong></p>
                                                <p class="push-bit">BSO1234567890</p>
                                                <p class="push-bit">Generated By : <code class="label label-default">Iyappan</code> </p>
<!--                                                <div class="row push">
                                                    <div class="col-sm-6 col-md-4">
                                                        <a href="img/placeholders/photos/photo6.jpg" data-toggle="lightbox-image">
                                                            <img src="img/placeholders/photos/photo6.jpg" alt="image">
                                                        </a>
                                                    </div>
                                                    <div class="col-sm-6 col-md-4">
                                                        <a href="img/placeholders/photos/photo7.jpg" data-toggle="lightbox-image">
                                                            <img src="img/placeholders/photos/photo7.jpg" alt="image">
                                                        </a>
                                                    </div>
                                                </div>-->
                                            </div>
                                        </li>
                                        <li class="">
                                            <div class="timeline-icon"></div>
                                            <div class="timeline-content">
                                                <p class="push-bit"><strong>Delivered</strong></p>
                                            </div>
                                        </li>
                                         
                                    </ul>
                                </div>
                                        
                                        <!-- END Lessons -->
                                    </div>
                                    <!-- END Widget Main -->
<!--                                </div>-->
                            </div>
                            <!-- END Course Widget -->
                        </div>
                        </div>
                    </div>
                    <!-- END Blank Alternative Content -->
                
                <!-- END Page Content -->

                <!-- Footer -->
               