                            <div class="row">
                                <!-- Main Title (hidden on small devices for the statistics to fit) -->
                                <div class="col-md-4 col-lg-6 hidden-xs hidden-sm">
                                    <h1>Welcome <strong><?php echo $username; ?></strong></h1>
                                </div>
                                <!-- END Main Title -->

                                <!-- Top Stats -->
                              
                                <!-- END Top Stats -->
                            </div>
                        </div>
                        <!-- For best results use an image with a resolution of 2560x248 pixels (You can also use a blurred image with ratio 10:1 - eg: 1000x100 pixels - it will adjust and look great!) -->
                        <img src="img/placeholders/headers/dashboard_header.jpg" alt="header image" class="animation-pulseSlow">
                    </div>
                    <div class="block">
                        <!-- Forum Tabs Title -->
                        <div class="block-title">
                            <ul class="nav nav-tabs" data-toggle="tabs">
                                <li class="active"><a href="#job_approval">Job Approval <span class="badge animation-floating"><?php //echo $log_activity_job_count; ?></span></a></li>
                                <li><a href="#ins_approval">Instrument Approval <span class="badge animation-floating"><?php //echo $log_activity_instrument_count; ?></span></a></li>
                                <li><a href="#messages">Messages <span class="badge animation-floating"><?php //echo $log_activity_message_count; ?></span></a></li>
                            </ul>
                        </div>
                        <!-- END Forum Tabs -->

                        <!-- Tab Content -->
                        <div class="tab-content">
                            <!-- Forum -->
                            <div class="tab-pane" id="messages">
                                <div class="table-responsive">
                                <!-- Intro Category -->
                                <table id="dashboard_message_all" class="table table-borderless table-striped table-vcenter">
                                    <tbody>
                                        <?PHP if (!empty($log_activity_message)): ?>
                                        <?php foreach ($log_activity_message as $log_activity_message_list) :?>
                                        <tr>
                                            <td class="text-center" style="width: 100px;">
                                                <?php //if($log_activity_message_list['Datalog']['logname'] == 'Salesorder'){ ?>
                                                 <?php echo $this->Html->image('letters/letters-ms.jpg', array('alt' => 'Message','class'=>'')); ?>
                                                <?php //} ?>
                                            </td>
                                            <td>
                                                <h4>
                                                    <a href="javascript:void(0)"><strong><?PHP echo $log_activity_message_list['Datalog']['logname']; ?></strong></a><br>
                                                    <small><?php echo $log_activity_message_list['Datalog']['logid']; ?></small>
                                                </h4>
                                            </td>
<!--                                            <td class="text-center hidden-xs hidden-sm"><a href="javascript:void(0)">205</a></td>-->
                                            <td class="text-center hidden-xs hidden-sm"><?PHP echo $log_activity_message_list['Datalog']['logactivity']; ?></td>
                                            <td class="hidden-xs hidden-sm">by <?PHP echo $log_activity_message_list['User']['username'] ?><br><small><?PHP echo $log_activity_message_list['Datalog']['modified'] ?></small></td>
                                        </tr>
                                        <?php endforeach; ?>
                                        <?php else: ?>
                                        <tr>
                                            <td class="text-center">
                                                <i class="gi gi-circle_info"></i> Oops... No Messages Available
                                            </td>
                                        </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
<!--                            <div class="text-center">
                                    <ul class="pagination pagination-sm">
                                        <li class="disabled"><a href="javascript:void(0)">Prev</a></li>
                                        <li class="active"><a href="javascript:void(0)">1</a></li>
                                        <li><a href="javascript:void(0)">2</a></li>
                                        <li><a href="javascript:void(0)">3</a></li>
                                        <li><a href="javascript:void(0)">...</a></li>
                                        <li><a href="javascript:void(0)">999</a></li>
                                        <li><a href="javascript:void(0)">Next</a></li>
                                    </ul>
                                </div>-->
                                </div>
                            </div>
                            <!-- END Forum -->

                            <!-- Topics -->
                            <div class="tab-pane active" id="job_approval">
                                <ul class="nav nav-tabs" data-toggle="tabs">
                                    <li><a href="#quotation">Quotation <span class="badge animation-floating"><?php echo $log_activity_count; ?></span></a></li>
                                    <li><a href="#sales">Sales Order <span class="badge animation-floating"><?php echo $log_activity_count; ?></span></a></li>
                                    <li><a href="#candd">C & D <span class="badge animation-floating"><?php echo $log_activity_count; ?></span></a></li>
                                    <li><a href="#delivery">Delivery Order <span class="badge animation-floating"><?php echo $log_activity_count; ?></span></a></li>
                                    <li><a href="#invoice">Invoice <span class="badge animation-floating"><?php echo $log_activity_count; ?></span></a></li>
                                </ul>
                            <div class="tab-content">
                                <p></p>
                            
                            <!---------------------------------------------------------------------------------------->
                            <!-------------------------------QUOTATION----------------------------------------------->
                            <!---------------------------------------------------------------------------------------->
                            <div class="tab-pane" id="quotation">
                                <div class="table-responsive">
                                <table id="qofull-datatable1"  class="table table-borderless table-striped table-vcenter">
                                     <thead>
                                        <tr>
                                            <th>Flag</th>
                                            <th>Name(Details)</th>
                                            <th>Approval</th>
                                            <th>Created</th>
                                        </tr>
                                     </thead>
                                     <tbody>
                                         <?PHP if (!empty($log_activity_quotation)): ?>
                                        <?php foreach ($log_activity_quotation as $log_activity_quotation_list) :?>
                                        
                                        <tr>
                                            <td class="text-center" style="width: 80px;"><?php echo $this->Html->image('letters/letters-qn.jpg', array('alt' => 'Quotation','class'=>'')); ?></td>
                                            <td>
                                                <h4><a href="javascript:void(0)"><strong><?PHP echo $log_activity_quotation_list['Logactivity']['logname'] ?></strong></a> <br><small><?PHP echo $log_activity_quotation_list['Logactivity']['logactivity'] ?>   -  <em><?PHP echo $log_activity_quotation_list['Logactivity']['logid'] ?></em></small></h4>
                                            </td>
                                            <td class="text-center hidden-xs hidden-sm">
                                           
                                           <?PHP if($log_activity_quotation_list['Logactivity']['logname'] == 'Quotation'){ ?>
                                            <?PHP echo $this->html->link('Approve',array('controller'=>'Quotations','action'=>'edit',$log_activity_quotation_list['Logactivity']['logid']),array('class'=>'btn btn-xs btn-primary')) ?>
                                           <?php }?>
                                            
                                            </td>
                                            <td class="hidden-xs hidden-sm">by <?PHP echo $log_activity_quotation_list['User']['username'] ?><br><small><?PHP echo $log_activity_quotation_list['Logactivity']['logtime'] ?></small></td>
                                        </tr>
                                       <?php endforeach; ?>
                                        <?php else: ?>
                                        <tr>
                                            <td class="text-center">
                                                <i class="gi gi-keys"></i> Oops... No Quotation Approval Available
                                            </td>
                                        </tr>
                                        <?php endif; ?>
                                        

                                    </tbody>
                                </table>
                                </div>
                            </div>
                             <!---------------------------------------------------------------------------------------->
                            <!-------------------------------SALES ORDER----------------------------------------------->
                            <!---------------------------------------------------------------------------------------->
                            <div class="tab-pane" id="sales">
                                <div class="table-responsive">
                                <table id="example-datatable" class="table table-borderless table-striped table-vcenter">
                                     <tbody>
                                        <tr>
                                            <th>Flag</th>
                                            <th>Name(Details)</th>
                                            <th>Approval</th>
                                            <th>Created</th>
                                        </tr>
                                         <?PHP if (!empty($log_activity_salesorder)): ?>
                                        <?php foreach ($log_activity_salesorder as $log_activity_salesorder_list) :?>
                                         <?PHP if($log_activity_salesorder_list['Logactivity']['logname'] == 'Salesorder'): ?>
                                        
                                        <tr>
                                            <td class="text-center" style="width: 80px;"><?php echo $this->Html->image('letters/letters-so.jpg', array('alt' => 'Sales Order','class'=>'')); ?></td>
                                            <td>
                                                <h4><a href="javascript:void(0)"><strong><?PHP echo $log_activity_salesorder_list['Logactivity']['logname'] ?></strong></a> <br><small><?PHP echo $log_activity_salesorder_list['Logactivity']['logactivity'] ?>   -  <em><?PHP echo $log_activity_salesorder_list['Logactivity']['logid'] ?></em></small></h4>
                                            </td>
                                            <td class="text-center hidden-xs hidden-sm">
                                           <?PHP if($log_activity_salesorder_list['Logactivity']['logname'] == 'Salesorder'){ ?>
                                            <?PHP echo $this->html->link('Approve',array('controller'=>'Salesorders','action'=>'edit',$log_activity_salesorder_list['Logactivity']['logid']),array('class'=>'btn btn-xs btn-primary')) ?>
                                           <?php }?>
                                           
                                            
                                            </td>
                                            <td class="hidden-xs hidden-sm">by <?PHP echo $log_activity_salesorder_list['User']['username'] ?><br><small><?PHP echo $log_activity_salesorder_list['Logactivity']['logtime'] ?></small></td>
                                        </tr>
                                        <?php endif; ?>
                                       <?php endforeach; ?>
                                        <?php else: ?>
                                        <tr>
                                            <td class="text-center">
                                                <i class="gi gi-keys"></i> Oops... No Sales Order Approval Available
                                            </td>
                                        </tr>
                                        <?php endif; ?>
                                        

                                    </tbody>
                                </table>
                                </div>
                            </div>
                          
                            <!---------------------------------------------------------------------------------------->
                            <!-------------------------------DELIVERY ORDER----------------------------------------------->
                            <!---------------------------------------------------------------------------------------->
                            <div class="tab-pane" id="delivery">
                                <div class="table-responsive">
                                <table id="example-datatable" class="table table-borderless table-striped table-vcenter">
                                     <tbody>
                                        <tr>
                                            <th>Flag</th>
                                            <th>Name(Details)</th>
                                            <th>Approval</th>
                                            <th>Created</th>
                                        </tr>
                                         <?PHP if (!empty($log_activity_salesorder)): ?>
                                        <?php foreach ($log_activity_salesorder as $log_activity_salesorder_list) :?>
                                         <?PHP if($log_activity_salesorder_list['Logactivity']['logname'] == 'Salesorder'): ?>
                                        
                                        <tr>
                                            <td class="text-center" style="width: 80px;"><?php echo $this->Html->image('letters/letters-do.jpg', array('alt' => 'Delivery Order','class'=>'')); ?></td>
                                            <td>
                                                <h4><a href="javascript:void(0)"><strong><?PHP echo $log_activity_salesorder_list['Logactivity']['logname'] ?></strong></a> <br><small><?PHP echo $log_activity_salesorder_list['Logactivity']['logactivity'] ?>   -  <em><?PHP echo $log_activity_salesorder_list['Logactivity']['logid'] ?></em></small></h4>
                                            </td>
                                            <td class="text-center hidden-xs hidden-sm">
                                           <?PHP if($log_activity_salesorder_list['Logactivity']['logname'] == 'Salesorder'){ ?>
                                            <?PHP echo $this->html->link('Approve',array('controller'=>'Salesorders','action'=>'edit',$log_activity_salesorder_list['Logactivity']['logid']),array('class'=>'btn btn-xs btn-primary')) ?>
                                           <?php }?>
                                           
                                            
                                            </td>
                                            <td class="hidden-xs hidden-sm">by <?PHP echo $log_activity_salesorder_list['User']['username'] ?><br><small><?PHP echo $log_activity_salesorder_list['Logactivity']['logtime'] ?></small></td>
                                        </tr>
                                        <?php endif; ?>
                                       <?php endforeach; ?>
                                        <?php else: ?>
                                        <tr>
                                            <td class="text-center">
                                                <i class="gi gi-keys"></i> Oops... No Delivery Order Approval Available
                                            </td>
                                        </tr>
                                        <?php endif; ?>
                                        

                                    </tbody>
                                </table>
                                </div>
                            </div>
                            
                            <!---------------------------------------------------------------------------------------->
                            <!-------------------------------C & D Info----------------------------------------------->
                            <!---------------------------------------------------------------------------------------->
                            <div class="tab-pane" id="candd">
                                <div class="table-responsive">
                                <table id="example-datatable" class="table table-borderless table-striped table-vcenter">
                                     <tbody>
                                        <tr>
                                            <th>Flag</th>
                                            <th>Name(Details)</th>
                                            <th>Approval</th>
                                            <th>Created</th>
                                        </tr>
                                         <?PHP if (!empty($log_activity_salesorder)): ?>
                                        <?php foreach ($log_activity_salesorder as $log_activity_salesorder_list) :?>
                                         <?PHP if($log_activity_salesorder_list['Logactivity']['logname'] == 'Salesorder'): ?>
                                        
                                        <tr>
                                            <td class="text-center" style="width: 80px;"><?php echo $this->Html->image('letters/letters-c&d.jpg', array('alt' => 'C & D Info','class'=>'')); ?></td>
                                            <td>
                                                <h4><a href="javascript:void(0)"><strong><?PHP echo $log_activity_salesorder_list['Logactivity']['logname'] ?></strong></a> <br><small><?PHP echo $log_activity_salesorder_list['Logactivity']['logactivity'] ?>   -  <em><?PHP echo $log_activity_salesorder_list['Logactivity']['logid'] ?></em></small></h4>
                                            </td>
                                            <td class="text-center hidden-xs hidden-sm">
                                           <?PHP if($log_activity_salesorder_list['Logactivity']['logname'] == 'Salesorder'){ ?>
                                            <?PHP echo $this->html->link('Approve',array('controller'=>'Salesorders','action'=>'edit',$log_activity_salesorder_list['Logactivity']['logid']),array('class'=>'btn btn-xs btn-primary')) ?>
                                           <?php }?>
                                           
                                            
                                            </td>
                                            <td class="hidden-xs hidden-sm">by <?PHP echo $log_activity_salesorder_list['User']['username'] ?><br><small><?PHP echo $log_activity_salesorder_list['Logactivity']['logtime'] ?></small></td>
                                        </tr>
                                        <?php endif; ?>
                                       <?php endforeach; ?>
                                        <?php else: ?>
                                        <tr>
                                            <td class="text-center">
                                                <i class="gi gi-keys"></i> Oops... No C & D Info Approval Available
                                            </td>
                                        </tr>
                                        <?php endif; ?>
                                        

                                    </tbody>
                                </table>
                                </div>
                            </div>
                            
                            
                            <!---------------------------------------------------------------------------------------->
                            <!-------------------------------INVOICE----------------------------------------------->
                            <!---------------------------------------------------------------------------------------->
                            <div class="tab-pane" id="invoice">
                                <div class="table-responsive">
                                <table id="example-datatable" class="table table-borderless table-striped table-vcenter">
                                     <tbody>
                                        <tr>
                                            <th>Flag</th>
                                            <th>Name(Details)</th>
                                            <th>Approval</th>
                                            <th>Created</th>
                                        </tr>
                                         <?PHP if (!empty($log_activity_salesorder)): ?>
                                        <?php foreach ($log_activity_salesorder as $log_activity_salesorder_list) :?>
                                         <?PHP if($log_activity_salesorder_list['Logactivity']['logname'] == 'Salesorder'): ?>
                                        
                                        <tr>
                                            <td class="text-center" style="width: 80px;"><?php echo $this->Html->image('letters/letters-iv.jpg', array('alt' => 'Invoice','class'=>'')); ?></td>
                                            <td>
                                                <h4><a href="javascript:void(0)"><strong><?PHP echo $log_activity_salesorder_list['Logactivity']['logname'] ?></strong></a> <br><small><?PHP echo $log_activity_salesorder_list['Logactivity']['logactivity'] ?>   -  <em><?PHP echo $log_activity_salesorder_list['Logactivity']['logid'] ?></em></small></h4>
                                            </td>
                                            <td class="text-center hidden-xs hidden-sm">
                                           <?PHP if($log_activity_salesorder_list['Logactivity']['logname'] == 'Salesorder'){ ?>
                                            <?PHP echo $this->html->link('Approve',array('controller'=>'Salesorders','action'=>'edit',$log_activity_salesorder_list['Logactivity']['logid']),array('class'=>'btn btn-xs btn-primary')) ?>
                                           <?php }?>
                                           
                                            
                                            </td>
                                            <td class="hidden-xs hidden-sm">by <?PHP echo $log_activity_salesorder_list['User']['username'] ?><br><small><?PHP echo $log_activity_salesorder_list['Logactivity']['logtime'] ?></small></td>
                                        </tr>
                                        <?php endif; ?>
                                       <?php endforeach; ?>
                                        <?php else: ?>
                                        <tr>
                                            <td class="text-center">
                                                <i class="gi gi-keys"></i> Oops... No Invoice Approval Available
                                            </td>
                                        </tr>
                                        <?php endif; ?>
                                        

                                    </tbody>
                                </table>
                                </div>
                            </div>
                            </div>
                           
                            </div>
                            
                            <div class="tab-pane" id="ins_approval">
                                <ul class="nav nav-tabs" data-toggle="tabs">
                                    <li><a href="#instrument">Instrument <span class="badge animation-floating"><?php echo $log_activity_instrument_count; ?></span></a></li>
                                    <li><a href="#procedureno">Proc.No <span class="badge animation-floating"><?php echo $log_activity_procedure_count; ?></span></a></li>
                                    <li><a href="#unit">Unit <span class="badge animation-floating"><?php echo $log_activity_unit_count; ?></span></a></li>
                                    <li><a href="#range">Range <span class="badge animation-floating"><?php echo $log_activity_range_count; ?></span></a></li>
                                   
                                </ul>
                            <div class="tab-content">
                                <p></p>
                            
                            <!---------------------------------------------------------------------------------------->
                            <!-------------------------------INSTRUMENT----------------------------------------------->
                            <!---------------------------------------------------------------------------------------->
                            
                            <div class="tab-pane" id="instrument">
                                <div class="table-responsive">
                                    <table id="example-datatable"  class="table table-borderless table-striped table-vcenter">
                                        <tbody>
                                            <?PHP if (!empty($log_activity_instrument)): ?>
                                            <?php foreach ($log_activity_instrument as $log_activity_instrument_list) :?>
                                            <tr>
                                                <td class="text-center" style="width: 80px;"> <?php echo $this->Html->image('letters/letters-in.jpg', array('alt' => 'Instrument','class'=>'')); ?></td>
                                                <td>
                                                    <h4><a href="javascript:void(0)"><strong><?PHP echo $log_activity_instrument_list['Logactivity']['logname'] ?></strong></a> <br><small><?PHP echo $log_activity_instrument_list['Logactivity']['logactivity'] ?>   -  <em><?PHP echo $log_activity_instrument_list['Logactivity']['logid'] ?></em></small></h4>
                                                </td>
                                                <td class="text-center hidden-xs hidden-sm">
                                                    <?PHP if($log_activity_instrument_list['Logactivity']['logname'] == 'Instrument'){ ?>
                                                    <?PHP echo $this->html->link('Approve',array('controller'=>'Instruments','action'=>'edit',$log_activity_instrument_list['Logactivity']['logid']),array('class'=>'btn btn-alt btn-xs btn-primary')) ?>
                                                    <?php }?>
                                                </td>
                                                <td class="hidden-xs hidden-sm">by <?PHP echo $log_activity_instrument_list['User']['username'] ?><br><small><?PHP echo $log_activity_instrument_list['Logactivity']['modified'] ?></small></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                        <tr>
                                            <td class="text-center">
                                                <i class="gi gi-keys"></i> Oops... No Instrument Approval Available
                                            </td>
                                        </tr>
                                        <?php endif; ?>
                                        <tr><td><br></td></tr>
                                        </tbody>
                                </table>
                                </div>
                            </div>
                            
                             <!---------------------------------------------------------------------------------------->
                            <!-------------------------------Procedure No----------------------------------------------->
                            <!---------------------------------------------------------------------------------------->
                            
                            <div class="tab-pane" id="procedureno">
                                <div class="table-responsive">
                                    <table id="example-datatable"  class="table table-borderless table-striped table-vcenter">
                                        <tbody>
                                            <?PHP if (!empty($log_activity_procedure)): ?>
                                            <?php foreach ($log_activity_procedure as $log_activity_procedure_list) :?>
                                            <tr>
                                                <td class="text-center" style="width: 80px;"><?php echo $this->Html->image('letters/letters-pr.jpg', array('alt' => 'Procedure No','class'=>'')); ?></td>
                                                <td>
                                                    <h4><a href="javascript:void(0)"><strong><?PHP echo $log_activity_procedure_list['Logactivity']['logname'] ?></strong></a> <br><small><?PHP echo $log_activity_procedure_list['Logactivity']['logactivity'] ?>   -  <em><?PHP echo $log_activity_procedure_list['Logactivity']['logid'] ?></em></small></h4>
                                                </td>
                                                <td class="text-center hidden-xs hidden-sm">
                                                    <?PHP if($log_activity_procedure_list['Logactivity']['logname'] == 'Procedure No'){ ?>
                                                    <?PHP echo $this->html->link('Approve',array('controller'=>'Procedures','action'=>'edit',$log_activity_procedure_list['Logactivity']['logid']),array('class'=>'btn btn-alt btn-xs btn-primary')) ?>
                                                    <?php }?>
                                                </td>
                                                <td class="hidden-xs hidden-sm">by <?PHP echo $log_activity_procedure_list['User']['username'] ?><br><small><?PHP echo $log_activity_procedure_list['Logactivity']['modified'] ?></small></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                        <tr>
                                            <td class="text-center">
                                                <i class="gi gi-keys"></i> Oops... No Procedure Number Approval Available
                                            </td>
                                        </tr>
                                        <?php endif; ?>
                                        <tr><td><br></td></tr>
                                        </tbody>
                                </table>
                                </div>
                            </div>
                            
                             <!---------------------------------------------------------------------------------------->
                            <!-------------------------------UNIT----------------------------------------------->
                            <!---------------------------------------------------------------------------------------->
                            <div class="tab-pane" id="unit">
                                <div class="table-responsive">
                                <table id="example-datatable"  class="table table-borderless table-striped table-vcenter">
                                     <tbody>
                                         <tr>
                                            <th>Flag</th>
                                            <th>Name(Details)</th>
                                            <th>Approval</th>
                                            <th>Created</th>
                                            
                                        </tr>
                                         <?PHP if (!empty($log_activity_unit)): ?>
                                        <?php foreach ($log_activity_unit as $log_activity_unit_list) :?>
                                        
                                        <tr>
                                            <td class="text-center" style="width: 80px;"><?php echo $this->Html->image('letters/letters-un.jpg', array('alt' => 'Unit','class'=>'')); ?></td>
                                            <td>
                                                <h4><a href="javascript:void(0)"><strong><?PHP echo $log_activity_unit_list['Logactivity']['logname'] ?></strong></a> <br><small><?PHP echo $log_activity_unit_list['Logactivity']['logactivity'] ?>   -  <em><?PHP echo $log_activity_unit_list['Logactivity']['logid'] ?></em></small></h4>
                                            </td>
                                            <td class="text-center hidden-xs hidden-sm">
                                           <?PHP if($log_activity_unit_list['Logactivity']['logname'] == 'Unit'){ ?>
                                            <?PHP echo $this->html->link('Approve',array('controller'=>'Units','action'=>'edit',$log_activity_unit_list['Logactivity']['logid']),array('class'=>'btn btn-xs btn-primary')) ?>
                                           <?php }?>
                                           
                                            </td>
                                            <td class="hidden-xs hidden-sm">by <?PHP echo $log_activity_unit_list['User']['username'] ?><br><small><?PHP echo $log_activity_unit_list['Logactivity']['logtime'] ?></small></td>
                                        </tr>
                                       <?php endforeach; ?>
                                        <?php else: ?>
                                        <tr>
                                            <td class="text-center">
                                                <i class="gi gi-keys"></i> Oops... No Unit Approval Available
                                            </td>
                                        </tr>
                                        <?php endif; ?>
                                        

                                    </tbody>
                                </table>
                                </div>
                            </div>
                            
                             <!---------------------------------------------------------------------------------------->
                            <!-------------------------------RANGE----------------------------------------------->
                            <!---------------------------------------------------------------------------------------->
                            <div class="tab-pane" id="range">
                                <div class="table-responsive">
                                <table id="example-datatable"  class="table table-borderless table-striped table-vcenter">
                                     <tbody>
                                         <tr>
                                            <th>Flag</th>
                                            <th>Name(Details)</th>
                                            <th>Approval</th>
                                            <th>Created</th>
                                            
                                        </tr>
                                         <?PHP if (!empty($log_activity_range)): ?>
                                        <?php foreach ($log_activity_range as $log_activity_range_list) :?>
                                        
                                        <tr>
                                            <td class="text-center" style="width: 80px;"><?php echo $this->Html->image('letters/letters-ra.jpg', array('alt' => 'Instrument','class'=>'')); ?></td>
                                            <td>
                                                <h4><a href="javascript:void(0)"><strong><?PHP echo $log_activity_range_list['Logactivity']['logname'] ?></strong></a> <br><small><?PHP echo $log_activity_range_list['Logactivity']['logactivity'] ?>   -  <em><?PHP echo $log_activity_range_list['Logactivity']['logid'] ?></em></small></h4>
                                            </td>
                                            <td class="text-center hidden-xs hidden-sm">
                                           <?PHP if($log_activity_range_list['Logactivity']['logname'] == 'Unit'){ ?>
                                            <?PHP echo $this->html->link('Approve',array('controller'=>'Units','action'=>'edit',$log_activity_range_list['Logactivity']['logid']),array('class'=>'btn btn-xs btn-primary')) ?>
                                           <?php }?>
                                           
                                            </td>
                                            <td class="hidden-xs hidden-sm">by <?PHP echo $log_activity_range_list['User']['username'] ?><br><small><?PHP echo $log_activity_range_list['Logactivity']['logtime'] ?></small></td>
                                        </tr>
                                       <?php endforeach; ?>
                                        <?php else: ?>
                                        <tr>
                                            <td class="text-center">
                                                <i class="gi gi-keys"></i> Oops... No Range Approval Available
                                            </td>
                                        </tr>
                                        <?php endif; ?>
                                        

                                    </tbody>
                                </table>
                                </div>
                            </div>
                            
                            
                            
                         
                            
                            </div>
                            
                            </div>
                            <!-- END Topics -->

                            <!-- Discussion -->
                            
                            <!-- END Discussion -->
                        </div>
                        <!-- END Tab Content -->
                    </div>
                    <!-- END Dashboard Header -->

                    <!-- Mini Top Stats Row -->
                    
                    <!-- END Mini Top Stats Row -->

                    <!-- Widgets Row -->
                    <?php if($user_me == 1 || $user_me ==2){ ?>
                    <div class="row">
                        <div class="col-sm-2 col-lg-2">
                            <!-- Widget -->
                            <div class="widget">
                                <div class="widget-simple">
                                    <a> <span class="label label-primary custom_float_top animation-floating"><?php echo $total_quotation_view; ?> New</span><h3 class="text-center animation-stretchRight">In Quotation</h3> </a>
                                        <h3 class="text-center themed-color-night animation-stretchRight"><strong><?php echo $total_quotation_count; ?></strong></h3>
                                </div>
                            </div>
                            <!-- END Widget -->
                        </div>
                        
                        <div class="col-sm-2 col-lg-2">
                            <!-- Widget -->
                            <div class="widget">
                                <div class="widget-simple">
                                    <a> <span class="label label-second custom_float_top animation-floating">0 New</span><h3 class="text-center themed-color-amethyst animation-stretchRight">Purchase Order</h3> </a>
                                        <h3 class="text-center themed-color-night animation-stretchRight"><strong>0</strong></h3>
                                </div>
                            </div>
                            <!-- END Widget -->
                        </div>
                        <div class="col-sm-2 col-lg-2">
                            <!-- Widget -->
                            <div class="widget">
                                <div class="widget-simple">
                                    <a> <span class="label label-third custom_float_top animation-floating"><?php echo $total_salesorder_view; ?> New</span><h3 class="text-center themed-color-autumn animation-stretchRight">Sales Order</h3> </a>
                                        <h3 class="text-center themed-color-night animation-stretchRight"><strong><?php echo $total_salesorder_count; ?></strong></h3>
                                </div>
                            </div>
                            <!-- END Widget -->
                        </div>
                       <div class="col-sm-2 col-lg-2">
                            <!-- Widget -->
                            <div class="widget">
                                <div class="widget-simple">
                                    <a> <span class="label label-four custom_float_top animation-floating"><?php echo $total_labprocess_count; ?> New</span><h3 class="text-center themed-color-fancy animation-stretchRight">Lab Process</h3> </a>
                                        <h3 class="text-center themed-color-night animation-stretchRight"><strong><?php echo $total_labprocess_view; ?></strong></h3>
                                </div>
                            </div>
                            <!-- END Widget -->
                        </div>
                         <div class="col-sm-2 col-lg-2">
                            <!-- Widget -->
                            <div class="widget">
                                <div class="widget-simple">
                                    <a> <span class="label label-five custom_float_top animation-floating">0 New</span><h3 class="text-center themed-color-spring animation-stretchRight">In Invoice </h3> </a>
                                        <h3 class="text-center themed-color-night animation-stretchRight"><strong>0</strong></h3>
                                </div>
                            </div>
                            <!-- END Widget -->
                        </div>
                         <div class="col-sm-2 col-lg-2">
                            <!-- Widget -->
                            <div class="widget">
                                <div class="widget-simple">
                                    <a> <span class="label label-six custom_float_top animation-floating"><?php echo $total_delivery_view; ?> New</span><h3 class="text-center themed-color-dark-night animation-stretchRight">Total Delivery</h3> </a>
                                        <h3 class="text-center themed-color-night animation-stretchRight"><strong><?php echo $total_delivery_count; ?></strong></h3>
                                </div>
                            </div>
                            <!-- END Widget -->
                            
                            
                        </div>
                    </div>
                    <?php } ?>
                    <?php if($user_me == 1 || $user_me ==2){ ?>
                    <div class="row">
                        
                        <div class="col-sm-6 col-lg-3">
                            <!-- Widget -->
                            <div class="widget">
                                <div class="widget-extra themed-background-dark-default text-center">
                                    <h3 class="widget-content-light">Weekly <strong>Quote</strong></h3>
                                </div>
                                <div class="widget-extra-full text-center">
                                    <!-- Jquery Sparkline (initialized in js/pages/widgetsStats.js), for more examples you can check out http://omnipotent.net/jquery.sparkline/#s-about -->
                                    <span id="mini-chart-bar3">9,24,5,4,7,15,7</span>
                                </div>
                            </div>
                            <!-- END Widget -->
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <!-- Widget -->
                            <div class="widget">
                                <div class="widget-extra themed-background-dark-default text-center">
                                    <h3 class="widget-content-light">Weekly <strong>Confirm Job</strong></h3>
                                </div>
                                <div class="widget-extra-full text-center">
                                    <!-- Jquery Sparkline (initialized in js/pages/widgetsStats.js), for more examples you can check out http://omnipotent.net/jquery.sparkline/#s-about -->
                                    <span id="mini-chart-bar4">9,24,5,4,7,15,7</span>
                                    
                                </div>
                            </div>
                            <!-- END Widget -->
                        </div>
                         <div class="col-sm-6 col-lg-3">
                            <!-- Widget -->
                            <div class="widget">
                                <div class="widget-extra themed-background-dark-default text-center">
                                    <h3 class="widget-content-light">Weekly <strong>Delivery</strong></h3>
                                </div>
                                <div class="widget-extra-full text-center">
                                    <!-- Jquery Sparkline (initialized in js/pages/widgetsStats.js), for more examples you can check out http://omnipotent.net/jquery.sparkline/#s-about -->
                                    <span id="mini-chart-bar2">9,24,5,4,7,15,7</span>
                                </div>
                            </div>
                            <!-- END Widget -->
                        </div>
                         <div class="col-sm-6 col-lg-3">
                            <!-- Widget -->
                            <div class="widget">
                                <div class="widget-extra themed-background-dark-night text-center">
                                    <h3 class="widget-content-light">Weekly <strong>Sales</strong></h3>
                                </div>
                                <div class="widget-extra-full text-center">
                                    
                                    <!-- Jquery Sparkline (initialized in js/pages/widgetsStats.js), for more examples you can check out http://omnipotent.net/jquery.sparkline/#s-about -->
                                    <span id="mini-chart-bar1">2,3,4,5,6</span>
                                </div>
                            </div>
                            <!-- END Widget -->
                        </div>
                       
                       
                    </div>
                    <?php } ?>
                    <!-- END Widgets Row -->
                    <!--<div class="block block-alt-noborder full">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="block-section">
                                    <!-- Add event functionality (initialized in js/pages/compCalendar.js) -->
                                 <!--   <form>
                                        <div class="input-group">
                                            <input type="text" id="add-event" name="add-event" class="form-control" placeholder="Add Event">
                                            <div class="input-group-btn">
                                                <button type="submit" id="add-event-btn" class="btn btn-primary"><i class="gi gi-plus"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="block-section">
                                    <div class="block-section text-center text-muted">
                                        <small><em><i class="fa fa-arrows"></i> Drag and Drop Events on the Calendar</em></small>
                                    </div>
                                    <ul class="calendar-events">
                                        <li style="background-color: #1abc9c">Delivery of Invoice IS234545</li>
                                        <li style="background-color: #9b59b6">Sales order Report Generation</li>
                                        <li style="background-color: #3498db">Deal with Packers</li>
                                        <li style="background-color: #e74c3c">Meeting with Rolls Royce</li>
                                        <li style="background-color: #f39c12">Inauguration of New Lab</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-10">-->
                                <!-- FullCalendar (initialized in js/pages/compCalendar.js), for more info and examples you can check out http://arshaw.com/fullcalendar/ -->
                            <!--    <div id="calendar"></div>
                            </div>
                        </div>
                    </div>-->
                             <!-- END Page Content -->
<div class="block block-alt-noborder full">
                        <div class="block-title">
                            
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <!--<div class="block-section">
                                     Add event functionality (initialized in js/pages/compCalendar.js) 
                                    <form>
                                        <div class="input-group">
                                            <input type="text" id="add-event" name="add-event" class="form-control" placeholder="Add Event">
                                            <div class="input-group-btn">
                                                <button type="submit" id="add-event-btn" class="btn btn-primary"><i class="gi gi-plus"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>-->
                                <div class="block-section">
                                    <div class="block-section text-center text-muted">
                                        <small><em><i class="fa fa-arrows"></i> Jobs Statistics</em></small>
                                    </div>
                                    <ul class="calendar-events">
                                        <li style="background-color: #1abc9c">Work</li>
                                        <li style="background-color: #9b59b6">Vacation</li>
                                        <li style="background-color: #3498db">Cinema</li>
                                        <li style="background-color: #e74c3c">Gym</li>
                                        <li style="background-color: #f39c12">Shopping</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <!-- FullCalendar (initialized in js/pages/compCalendar.js), for more info and examples you can check out http://arshaw.com/fullcalendar/ -->
                                <div id="calendar"></div>
                            </div>
                        </div>
                    </div>
                <!-- Footer -->
                <footer class="clearfix">
                    <div class="pull-right">
                        Crafted with <i class="fa fa-heart text-danger"></i> by <a>Samsys</a>
                    </div>
                    <div class="pull-left">
                        <span id="year-copy"></span> &copy; <a >BS V1.0</a>
                    </div>
                </footer>
                <!-- END Footer -->
            </div>
            <!-- END Main Container -->
        </div>
        <!-- END Page Container -->

        <!-- Scroll to top link, initialized in js/app.js - scrollToTop() -->
        <a href="#" id="to-top"><i class="fa fa-angle-double-up"></i></a>

        <!-- User Settings, modal which opens from Settings link (found in top right user menu) and the Cog link (found in sidebar user info) -->
        <div id="modal-user-settings" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header text-center">
                        <h2 class="modal-title"><i class="fa fa-pencil"></i> Settings</h2>
                    </div>
                    <!-- END Modal Header -->

                    <!-- Modal Body -->
                    <div class="modal-body">
                        <form action="index.html" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered" onsubmit="return false;">
                            <fieldset>
                                <legend>Vital Info</legend>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Username</label>
                                    <div class="col-md-8">
                                        <p class="form-control-static">Admin</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="user-settings-email">Email</label>
                                    <div class="col-md-8">
                                        <input type="email" id="user-settings-email" name="user-settings-email" class="form-control" value="admin@example.com">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="user-settings-notifications">Email Notifications</label>
                                    <div class="col-md-8">
                                        <label class="switch switch-primary">
                                            <input type="checkbox" id="user-settings-notifications" name="user-settings-notifications" value="1" checked>
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <legend>Password Update</legend>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="user-settings-password">New Password</label>
                                    <div class="col-md-8">
                                        <input type="password" id="user-settings-password" name="user-settings-password" class="form-control" placeholder="Please choose a complex one..">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="user-settings-repassword">Confirm New Password</label>
                                    <div class="col-md-8">
                                        <input type="password" id="user-settings-repassword" name="user-settings-repassword" class="form-control" placeholder="..and confirm it!">
                                    </div>
                                </div>
                            </fieldset>
                            <div class="form-group form-actions">
                                <div class="col-xs-12 text-right">
                                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-sm btn-primary">Save Changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- END Modal Body -->
                </div>
            </div>
        </div>
        
          <script>
             
    $(function(){ 
        CompCalendar.init();  });
                
    var CompCalendar = function() {
    var calendarEvents  = $('.calendar-events');

    /* Function for initializing drag and drop event functionality */
    var initEvents = function() {
        calendarEvents.find('li').each(function() {
            // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
            var eventObject = { title: $.trim($(this).text()), color: $(this).css('background-color') };

            // store the Event Object in the DOM element so we can get to it later
            $(this).data('eventObject', eventObject);

            // make the event draggable using jQuery UI
            $(this).draggable({ zIndex: 999, revert: true, revertDuration: 0 });
        });
    };

    return {
        init: function() {
            /* Initialize drag and drop event functionality */
            initEvents();

            /* Add new event in the events list */
            var eventInput      = $('#add-event');
            var eventInputVal   = '';

            // When the add button is clicked
//            $('#add-event-btn').on('click', function(){
//                // Get input value
//                eventInputVal = eventInput.prop('value');
//
//                // Check if the user entered something
//                if ( eventInputVal ) {
//                    // Add it to the events list
//                    calendarEvents.append('<li class="animation-slideDown">' + $('<div />').text(eventInputVal).html() + '</li>');
//
//                    // Clear input field
//                    eventInput.prop('value', '');
//
//                    // Init Events
//                    initEvents();
//                }
//
//                // Don't let the form submit
//                return false;
//            });

            /* Initialize FullCalendar */
            var date = new Date();
            var d = date.getDate();
            var m = date.getMonth();
            var y = date.getFullYear();

            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                firstDay: 1,
                editable: false,
                droppable: false,
                drop: function(date, allDay) { // this function is called when something is dropped

                    // retrieve the dropped element's stored Event Object
                    var originalEventObject = $(this).data('eventObject');

                    // we need to copy it, so that multiple events don't have a reference to the same object
                    var copiedEventObject = $.extend({}, originalEventObject);

                    // assign it the date that was reported
                    copiedEventObject.start = date;
                    copiedEventObject.allDay = allDay;

                    // render the event on the calendar
                    // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
                    $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

                    // remove the element from the "Draggable Events" list
                    $(this).remove();
                },
                events: [
                   
//                    {
//                        title: 'Live Conference',
//                        start: new Date(y, m, 3)
//                    },
//                    {
//                        title: 'Top Secret Project',
//                        start: new Date(y, m, 4),
//                        end: new Date(y, m, 8),
//                        color: '#1abc9c'
//                    },
//                    {
//                        title: 'Job Meeting',
//                        start: new Date(y, m, d, 16, 00),
//                        allDay: false,
//                        color: '#f39c12'
//                    },
//                    {
//                        title: 'Awesome Job',
//                        start: new Date(y, m, d, 9, 0),
//                        end: new Date(y, m, d, 12, 0),
//                        allDay: false,
//                        color: '#d35400'
//                    },
                    {
                        title: 'Invoice',
                        start: '2014-06-09T12:30:00',
                        end: '2014-06-10T12:30:00',
                        allDay: false
                    }
                ]
            });
        }
    };
}();
             
                
              </script>
        
        
        <!-- END User Settings -->
        
       <!--        <?php //echo $this->Html->script('pages/widgetsStats'); ?>
        <script>$(function(){ WidgetsStats.init(); });</script>
        -->
        <?php //echo $this->Html->script('pages/compCalendar'); ?>
<!--      <script>$(function(){ CompCalendar.init(); });</script>-->
      