<script>
    var path_url='<?PHP echo Router::url('/',true); ?>';
    var path='<?PHP echo Router::url('/',true); ?>';
    
   //$(document).on('click','.approve_clientpo',function(){
      // alert('sdf');
//       console.log('Clientposapproval');
        //window.reload(path+'Clientposapproval');
//        var val_quotationid = $(this).attr('id');
//        if(window.confirm("Are you sure?")){
//        $.ajax({
//            type: 'POST',
//            data:"id="+val_quotationid,
//            url: path_url+'Clientpos/approve/',
//            success: function(data)
//            {
//                console.log(data);
//                if(data=='success')
//                    {
//                        alert('Client PO is Approved');
//                        window.location.reload();
//                    }
//                    else
//                        {
//                             alert('Client PO Approval Failed due to unknown Cause');
//                             window.location.reload();
//                        }
//                
//            }
//            
//        });
//    }
//    else
//    {
//        return false;
//    }
//       
//   });
$(document).on('click','.approve_invoice',function(){
       
        var val_quotationid = $(this).attr('id');
        if(window.confirm("Are you sure?")){
        $.ajax({
            type: 'POST',
            data:"id="+val_quotationid,
            url: path_url+'Clientpos/approve/',
            success: function(data)
            {
                console.log(data);
                if(data=='success')
                    {
                        alert('Client PO is Approved');
                        window.location.reload();
                    }
                    else
                        {
                             alert('Client PO Approval Failed due to unknown Cause');
                             window.location.reload();
                        }
                
            }
            
        });
    }
    else
    {
        return false;
    }
       
   });
   $(document).on('click','.approve_prsuper',function(){
       var val_prsuper = $(this).attr('id');
       if(window.confirm("Are you sure?")){
       $.ajax({
            type: 'POST',
            data:"id="+val_prsuper,
            url: path_url+'PurchaseRequisitions/approve_superviser/',
            success: function(data)
            {
                console.log(data);
                if(data=='success')
                {
                    alert('Purchase Requisition is Approved & Forwarded to Manager');
                    window.location.reload();
                }
                else
                {
                    alert('Purchase Requisition is Approval Failed due to unknown Cause');
                    window.location.reload();
                }
            }
            
        });
    }
    else
    {
        return false;
    }
       
   });
   
   
    </script>
<div class="row">
                                <!-- Main Title (hidden on small devices for the statistics to fit) -->
                                <div class="col-md-4 col-lg-6 ">
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
                        <div class="block-title">
                            <ul class="nav nav-tabs" data-toggle="tabs">
                                <li class="active"><a href="#home">Home<span class="badge animation-floating"><?php //echo $log_activity_job_count; ?></span></a></li>
                                <?php
                                //echo $user_role['app_customer']['view'];
                                if($user_role['app_customer']['view'] == 0 && $user_role['app_quotation']['view'] == 0 && $user_role['app_salesorder']['view'] == 0 && $user_role['app_deliveryorder1']['view'] == 0 && $user_role['app_invoice']['view'] == 0 && $user_role['app_prsupervisor']['view'] == 0 && $user_role['app_prmanager']['view'] == 0 && $user_role['app_inship']['view'] == 0){ 
                                    //return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
                                }
                                else
                                {
                                ?>
                                <li><a href="#job_approval">Job Approval <span class="badge animation-floating"><?php echo ($log_activity_customer_count)+($log_activity_customertag_count)+($log_activity_salesorder_count)+($log_activity_cdinfo_count)+($log_activity_deliveryorder_count)+($log_activity_quotation_count)+($log_activity_client_count)+($log_activity_prpur_count)+($log_activity_prman_count)+($log_activity_prsuper_count); ?></span></a></li>
                                <?php } 
                                if($user_role['app_procedureno']['view'] == 0 && $user_role['app_brand']['view'] == 0 && $user_role['app_instrument']['view'] == 0 && $user_role['app_range']['view'] == 0 && $user_role['app_unit']['view'] == 0 ){ 
                                    //return $this->redirect(array('controller'=>'Dashboards','action'=>'index'));
                                }
                                else
                                {
                                ?>
                                <li><a href="#ins_approval">Instrument Approval <span class="badge animation-floating"><?php echo ($log_activity_instrument_count)+($log_activity_procedure_count)+($log_activity_unit_count)+($log_activity_range_count)+($log_activity_brand_count)+($log_activity_group_count); ?></span></a></li>
                                <?php 
                                }
                                ?>
                                <?php 
                                if($user_role['dash_messages']['view'] != 0){ ?>
                                <li><a href="#messages">Messages <span class="badge animation-floating"><?php //echo $log_activity_message_count; ?></span></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                        <!-- END Forum Tabs -->
                        <div class="tab-content">
                            <!-- Forum -->
                            <div class="tab-pane active" id="home">
                                <div class="block full" style=" border: 0px; margin-bottom: 0px;">
                                    <h1><div class="text-center">BS Enterprise</div></h1>
                                </div>
                            </div>
                        
                        
                        <!-- Tab Content -->
<!--                        <div class="tab-content">-->
                            <!-- Forum -->
                            <div class="tab-pane" id="messages">
                                <div class="block full">
                                <div class="table-responsive">
                                <!-- Intro Category -->
                                <table id="example-datatable" class="table table-vcenter table-condensed table-bordered dataTable">
                                    <?PHP if (!empty($log_activity_message)): ?>
                                    <thead>
                                        <th>Flag</th>
                                        <th>Name(Details)</th>
                                        <th>Process</th>
                                        <th>Created</th>
                                    </thead>
                                    <tbody>
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
<!--                                            <td class="text-center "><a href="javascript:void(0)">205</a></td>-->
                                            <td class="text-center"><?PHP echo $log_activity_message_list['Datalog']['logactivity']; ?></td>
                                            <td class="">by <?PHP echo $log_activity_message_list['User']['username'] ?><br><small><?PHP echo $log_activity_message_list['Datalog']['created'] ?></small></td>
                                        </tr>
                                        <?php endforeach; ?>
                                        
                                    </tbody>
                                        <?php else: ?>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">
                                                <i class="gi gi-circle_info"></i> Oops... No Messages Available
                                            </td>
                                        </tr>
                                    </tbody>
                                    <?php endif; ?>
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
                            </div>
                            <!-- END Forum -->

                            <!-- Topics -->
                            <div class="tab-pane" id="job_approval">
                                <ul class="nav nav-tabs" data-toggle="tabs">
                                    <?php if($user_role['app_customer']['view'] != 0){ ?>
                                    <li><a href="#customer">Customer <span class="badge animation-floating"><?php echo ($log_activity_customer_count)+($log_activity_customertag_count); ?></span></a></li>
                                    <?php } ?>
                                    <?php if($user_role['app_quotation']['view'] != 0){ ?>
                                    <li><a href="#quotation">Quotation <span class="badge animation-floating"><?php echo $log_activity_quotation_count; ?></span></a></li>
                                    <?php } ?>
                                    <?php if($user_role['app_salesorder']['view'] != 0){ ?>
                                    <li><a href="#sales">Sales Order <span class="badge animation-floating"><?php echo $log_activity_salesorder_count; ?></span></a></li>
                                    <?php } ?>
                                    <?php if($user_role['app_deliveryorder1']['view'] != 0){ ?>
                                    <li><a href="#delivery">Delivery Order <span class="badge animation-floating"><?php echo $log_activity_deliveryorder_count; ?></span></a></li>
                                    <?php } ?>
                                    <?php if($user_role['app_inship']['view'] != 0){ ?>
                                    <li><a href="#candd">C & D <span class="badge animation-floating"><?php echo $log_activity_cdinfo_count; ?></span></a></li>
                                    <?php } ?>
                                    <?php if($user_role['app_clientpo']['view'] != 0){ ?>
                                    <li><a href="#clientpo">Client PO <span class="badge animation-floating"><?php echo $log_activity_client_count; ?></span></a></li>
                                    <?php } ?>
                                    <?php if($user_role['app_prmanager']['view'] != 0){ ?>
                                    <li><a href="#prman">PR - Manager<span class="badge animation-floating"><?php echo $log_activity_prman_count; ?></span></a></li>
                                    <?php } ?>
                                    <?php if($user_role['app_prsupervisor']['view'] != 0){ ?>
                                    <li><a href="#prsuper">PR - Supervisor<span class="badge animation-floating"><?php echo $log_activity_prsuper_count; ?></span></a></li>
                                    <?php } ?>
                                    <?php //if($user_role['app_prsupervisor']['view'] != 0){ ?>
                                    <li><a href="#prpur">PR Purchase<span class="badge animation-floating"><?php echo $log_activity_prpur_count; ?></span></a></li>
                                    <?php //} ?>
                                    <li><a href="#invoice">Invoice <span class="badge animation-floating"><?php echo $log_activity_invoice_count; ?></span></a></li>
                                </ul>
                            <div class="tab-content">
                                <p></p>
                            <!---------------------------------------------------------------------------------------->
                            <!-------------------------------Customer----------------------------------------------->
                            <!---------------------------------------------------------------------------------------->
                            <div class="tab-pane" id="customer">
                                <div class="block full">
                                <div class="table-responsive">
                                <table id="cus-datatable1"  class="table table-vcenter table-condensed table-bordered dataTable">
                                    <?PHP if (!empty($log_activity_customer)||!empty($log_activity_customertag)): ?>
                                    <thead>
                                        <th>Flag</th>
                                        <th>Name(Details)</th>
                                        <th>Approval</th>
                                        <th>Created</th>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($log_activity_customer as $log_activity_customer_list) :?>
                                        <tr>
                                            <td class="text-center" style="width: 80px;"><?php echo $this->Html->image('letters/letters-cu.jpg', array('alt' => 'Customer','class'=>'')); ?></td>
                                            <td class="">
                                                <h4><a href="javascript:void(0)"><strong><?PHP echo $log_activity_customer_list['Logactivity']['logname'] ?></strong></a> <br><small><?PHP echo $log_activity_customer_list['Logactivity']['logactivity'] ?>   -  <em><?PHP echo $log_activity_customer_list['Logactivity']['logid'] ?></em></small></h4>
                                            </td>
                                            <td class="text-center">
                                            <?PHP if($log_activity_customer_list['Logactivity']['logname'] == 'Customer'){ ?>
                                            <?PHP echo $this->html->link('Approve',array('controller'=>'Customers','action'=>'edit',$log_activity_customer_list['Logactivity']['logid']),array('class'=>'btn btn-xs btn-primary')) ?>
                                            <?php }?>
                                            </td>
                                            <td class="text-center">by <?PHP echo $log_activity_customer_list['User']['username'] ?><br><small><?PHP echo $log_activity_customer_list['Logactivity']['created'] ?></small></td>
                                            </tr>
                                    <?php endforeach; ?>
                                    <?php foreach ($log_activity_customertag as $log_activity_customertag_list) :?>
                                        <tr>
                                            <td class="text-center" style="width: 80px;"><?php echo $this->Html->image('letters/letters-ct.jpg', array('alt' => 'Customer','class'=>'')); ?></td>
                                            <td class="">
                                                <h4><a href="javascript:void(0)"><strong><?PHP echo $log_activity_customertag_list['Logactivity']['logname'] ?></strong></a> <br><small><?PHP echo $log_activity_customertag_list['Logactivity']['logactivity'] ?>   -  <em><?PHP echo $log_activity_customertag_list['Logactivity']['logid'] ?></em></small></h4>
                                            </td>
                                            <td class="text-center">
                                            <?PHP if($log_activity_customertag_list['Logactivity']['logname'] == 'CustomerTagList'){ ?>
                                            <?PHP echo $this->html->link('Approve',array('controller'=>'Customertaglists','action'=>'edit',$log_activity_customertag_list['Logactivity']['logid']),array('class'=>'btn btn-xs btn-primary')) ?>
                                            <?php }?>
                                            </td>
                                            <td class="text-center">by <?PHP echo $log_activity_customertag_list['User']['username'] ?><br><small><?PHP echo $log_activity_customertag_list['Logactivity']['created'] ?></small></td>
                                            </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                        <?php else: ?>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">
                                                <i class="gi gi-keys"></i> Oops... No Customer Approval Available
                                            </td>
                                        </tr>
                                    </tbody>
                                    <?php endif; ?>
                                </table>
                                </div>
                                </div>
                            </div>
                            <!---------------------------------------------------------------------------------------->
                            <!-------------------------------QUOTATION----------------------------------------------->
                            <!---------------------------------------------------------------------------------------->
                            <div class="tab-pane" id="quotation">
                                <div class="block full">
                                <div class="table-responsive">
                                <table id="qofull-datatable1"  class="table table-vcenter table-condensed table-bordered dataTable">
                                    <?PHP if (!empty($log_activity_quotation)): ?>
                                    <thead>
                                        <th>Flag</th>
                                        <th>Name(Details)</th>
                                        <th>Approval</th>
                                        <th>Created</th>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($log_activity_quotation as $log_activity_quotation_list) :?>
                                        <tr>
                                            <td class="text-center" style="width: 80px;"><?php echo $this->Html->image('letters/letters-qn.jpg', array('alt' => 'Quotation','class'=>'')); ?></td>
                                            <td class="">
                                                <h4><a href="javascript:void(0)"><strong><?PHP echo $log_activity_quotation_list['Logactivity']['logname'] ?></strong></a> <br><small><?PHP echo $log_activity_quotation_list['Logactivity']['logactivity'] ?>   -  <em><?PHP echo $log_activity_quotation_list['Logactivity']['logno'] ?></em></small></h4>
                                            </td>
                                            <td class="text-center">
                                            <?PHP if($log_activity_quotation_list['Logactivity']['logname'] == 'Quotation'){ ?>
                                            <?PHP echo $this->html->link('Approve',array('controller'=>'Quotations','action'=>'edit',$log_activity_quotation_list['Logactivity']['logid']),array('class'=>'btn btn-xs btn-primary')) ?>
                                            <?php }?>
                                            </td>
                                            <td class="text-center">by <?PHP echo $log_activity_quotation_list['User']['username'] ?><br><small><?PHP echo $log_activity_quotation_list['Logactivity']['created'] ?></small></td>
                                            </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                        <?php else: ?>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">
                                                <i class="gi gi-keys"></i> Oops... No Quotation Approval Available
                                            </td>
                                        </tr>
                                    </tbody>
                                    <?php endif; ?>
                                </table>
                                </div>
                                </div>
                            </div>
                             <!---------------------------------------------------------------------------------------->
                            <!-------------------------------SALES ORDER----------------------------------------------->
                            <!---------------------------------------------------------------------------------------->
                            <div class="tab-pane" id="sales">
                                <div class="block full">
                                <div class="table-responsive">
                                <table id="deliver_cannd" class="table table-vcenter table-condensed table-bordered">
                                    <?PHP if (!empty($log_activity_salesorder)): ?>
                                    <thead>
                                        <th>Flag</th>
                                        <th>Name(Details)</th>
                                        <th>Approval</th>
                                        <th>Created</th>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($log_activity_salesorder as $log_activity_salesorder_list) :?> 
                                        <tr>
                                            <td class="text-center" style="width: 80px;"><?php echo $this->Html->image('letters/letters-so.jpg', array('alt' => 'Sales Order','class'=>'')); ?></td>
                                            <td>
                                                <h4><a href="javascript:void(0)"><strong><?PHP echo $log_activity_salesorder_list['Logactivity']['logname'] ?></strong></a> <br><small><?PHP echo $log_activity_salesorder_list['Logactivity']['logactivity'] ?>   -  <em><?PHP echo $log_activity_salesorder_list['Logactivity']['logid'] ?></em></small></h4>
                                            </td>
                                            <td class="text-center ">
                                           <?PHP if($log_activity_salesorder_list['Logactivity']['logname'] == 'Salesorder'){ ?>
                                            <?PHP echo $this->html->link('Approve',array('controller'=>'Salesorders','action'=>'edit',$log_activity_salesorder_list['Logactivity']['logid']),array('class'=>'btn btn-xs btn-primary')) ?>
                                           <?php }?>
                                           
                                            
                                            </td>
                                            <td class="">by <?PHP echo $log_activity_salesorder_list['User']['username'] ?><br><small><?PHP echo $log_activity_salesorder_list['Logactivity']['created'] ?></small></td>
                                        </tr>
                                   
                                       <?php endforeach; ?>
                                         </tbody>
                                        <?php else: ?>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">
                                                <i class="gi gi-keys"></i> Oops... No Sales Order Approval Available
                                            </td>
                                        </tr>
                                    </tbody>
                                    <?php endif; ?>
                                    
                                </table>
                                </div>
                                </div>
                            </div>
                          
                            <!---------------------------------------------------------------------------------------->
                            <!-------------------------------DELIVERY ORDER----------------------------------------------->
                            <!---------------------------------------------------------------------------------------->
                            <div class="tab-pane" id="delivery">
                                <div class="block full">
                                <div class="table-responsive">
                                <table id="qofull-datatable1" class="table table-vcenter table-condensed table-bordered">
                                    <?PHP if (!empty($log_activity_deliveryorder)): ?>
                                    <thead>
                                        <tr>
                                            <th>Flag</th>
                                            <th>Name(Details)</th>
                                            <th>Approval</th>
                                            <th>Created</th>
                                        </tr>
                                    </thead>
                                        
                                    <tbody> 
                                    <?php foreach ($log_activity_deliveryorder as $log_activity_deliveryorder_list) :?>
                                    <?PHP if($log_activity_deliveryorder_list['Logactivity']['logname'] == 'Deliveryorder'): ?>
                                        <tr>
                                            <td class="text-center" style="width: 80px;"><?php echo $this->Html->image('letters/letters-do.jpg', array('alt' => 'Delivery Order','class'=>'')); ?></td>
                                            <td>
                                                <h4><a href="javascript:void(0)"><strong><?PHP echo $log_activity_deliveryorder_list['Logactivity']['logname'] ?></strong></a> <br><small><?PHP echo $log_activity_deliveryorder_list['Logactivity']['logactivity'] ?>   -  <em><?PHP echo $log_activity_deliveryorder_list['Logactivity']['logno'] ?></em></small></h4>
                                            </td>
                                            <td class="text-center ">
                                           <?PHP if($log_activity_deliveryorder_list['Logactivity']['logname'] == 'Deliveryorder'){ ?>
                                            <?PHP echo $this->html->link('Approve',array('controller'=>'Deliveryorders','action'=>'edit',$log_activity_deliveryorder_list['Logactivity']['logid']),array('class'=>'btn btn-xs btn-primary')) ?>
                                           <?php }?>
                                            </td>
                                            <td class="">by <?PHP echo $log_activity_deliveryorder_list['User']['username'] ?><br><small><?PHP echo $log_activity_deliveryorder_list['Logactivity']['created'] ?></small></td>
                                        </tr>
                                    <?php endif; ?>
                                    </tbody>
                                    <?php endforeach; ?>
                                    <?php else: ?>
                                    <tbody> 
                                        <tr>
                                            <td class="text-center">
                                                <i class="gi gi-keys"></i> Oops... No Delivery Order Approval Available
                                            </td>
                                        </tr>
                                    
                                     </tbody>
                                    <?php endif; ?>
                                </table>
                                </div>
                                </div>
                            </div>
                            
                            <!---------------------------------------------------------------------------------------->
                            <!-------------------------------INVOICE----------------------------------------------->
                            <!---------------------------------------------------------------------------------------->
                            <div class="tab-pane" id="invoice">
                                <div class="block full">
                                <div class="table-responsive">
                                <table id="infull-datatable1" class="table table-vcenter table-condensed table-bordered">
                                    <?PHP if (!empty($log_activity_invoice)): ?>
                                    <thead>
                                        <tr>
                                            <th>Flag</th>
                                            <th>Name(Details)</th>
                                            <th>Approval</th>
                                            <th>Created</th>
                                        </tr>
                                    </thead>
                                        
                                    <tbody> 
                                    <?php foreach ($log_activity_invoice as $log_activity_invoice_list) :?>
                                    <?PHP if($log_activity_invoice_list['Logactivity']['logname'] == 'Invoice'): ?>
                                        <tr>
                                            <td class="text-center" style="width: 80px;"><?php echo $this->Html->image('letters/letters-in.jpg', array('alt' => 'Invoice','class'=>'')); ?></td>
                                            <td>
                                                <h4><a href="javascript:void(0)"><strong><?PHP echo $log_activity_invoice_list['Logactivity']['logname'] ?></strong></a> <br><small><?PHP echo $log_activity_invoice_list['Logactivity']['logactivity'] ?>   -  <em><?PHP echo $log_activity_invoice_list['Logactivity']['logno'] ?></em></small></h4>
                                            </td>
                                            <td class="text-center ">
                                           <?PHP if($log_activity_invoice_list['Logactivity']['logname'] == 'Invoice'){ ?>
                                            <?PHP echo $this->html->link('Approve',array('controller'=>'Invoices','action'=>'edit',$log_activity_invoice_list['Logactivity']['logid']),array('class'=>'btn btn-xs btn-primary')) ?>
                                           <?php }?>
                                            </td>
                                            <td class="">by <?PHP echo $log_activity_invoice_list['User']['username'] ?><br><small><?PHP echo $log_activity_invoice_list['Logactivity']['created'] ?></small></td>
                                        </tr>
                                    <?php endif; ?>
                                    </tbody>
                                    <?php endforeach; ?>
                                    <?php else: ?>
                                    <tbody> 
                                        <tr>
                                            <td class="text-center">
                                                <i class="gi gi-keys"></i> Oops... No Invoice Approval Available
                                            </td>
                                        </tr>
                                    
                                     </tbody>
                                    <?php endif; ?>
                                </table>
                                </div>
                                </div>
                            </div>
                            
                            <!---------------------------------------------------------------------------------------->
                            <!-------------------------------C & D Info----------------------------------------------->
                            <!---------------------------------------------------------------------------------------->
                            <div class="tab-pane" id="candd">
                                <div class="block full">
                                <div class="table-responsive">
                                <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                    <?PHP if (!empty($log_activity_cdinfo)): ?>
                                    <thead>
                                        <tr>
                                            <th>Flag</th>
                                            <th>Name(Details)</th>
                                            <th>Approval</th>
                                            <th>Created</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($log_activity_cdinfo as $log_activity_cdinfo_list) :?>
                                    <?PHP if($log_activity_cdinfo_list['Logactivity']['logname'] == 'C&Dinfo'): ?>
                                        <tr>
                                            <td class="text-center" style="width: 80px;"><?php echo $this->Html->image('letters/letters-c&d.jpg', array('alt' => 'C & D Info','class'=>'')); ?></td>
                                            <td>
                                                <h4><a href="javascript:void(0)"><strong><?PHP echo $log_activity_cdinfo_list['Logactivity']['logname'] ?></strong></a> <br><small><?PHP echo $log_activity_cdinfo_list['Logactivity']['logactivity'] ?>   -  <em><?PHP echo $log_activity_cdinfo_list['Logactivity']['logid'] ?></em></small></h4>
                                            </td>
                                            <td class="text-center ">
                                            <?PHP if($log_activity_cdinfo_list['Logactivity']['logname'] == 'C&Dinfo'){ ?>
                                            <?PHP echo $this->html->link('Approve',array('controller'=>'Salesorders','action'=>'edit',$log_activity_cdinfo_list['Logactivity']['logid']),array('class'=>'btn btn-xs btn-primary')) ?>
                                            <?php }?>
                                            </td>
                                            <td class="">by <?PHP echo $log_activity_cdinfo_list['User']['username'] ?><br><small><?PHP echo $log_activity_cdinfo_list['Logactivity']['created'] ?></small></td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php endforeach; ?>
                                    </tbody>
                                    <?php else: ?>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">
                                                <i class="gi gi-keys"></i> Oops... No C & D Info Approval Available
                                            </td>
                                        </tr>
                                    </tbody>
                                    <?php endif; ?>
                                    
                                </table>
                                </div>
                                </div>
                            </div>
                            
                            <!---------------------------------------------------------------------------------------->
                            <!-------------------------------Client PO----------------------------------------------->
                            <!---------------------------------------------------------------------------------------->
                            <div class="tab-pane" id="clientpo">
                                <div class="block full">
                                <div class="table-responsive">
                                <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                    <?PHP if (!empty($log_activity_client)): ?>
                                    <thead>
                                        <tr>
                                            <th>Flag</th>
                                            <th>Name(Details)</th>
                                            <th>Approval</th>
                                            <th>Created</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($log_activity_client as $log_activity_clientpo_list) :?>
                                    <?PHP if($log_activity_clientpo_list['Logactivity']['logname'] == 'ClientPO'): ?>
                                        <tr>
                                            <td class="text-center" style="width: 80px;"><?php echo $this->Html->image('letters/letters-po.jpg', array('alt' => 'C & D Info','class'=>'')); ?></td>
                                            <td>
                                                <h4><a href="javascript:void(0)"><strong><?PHP echo $log_activity_clientpo_list['Logactivity']['logname']; ?></strong></a> <br><small><?PHP echo $log_activity_clientpo_list['Logactivity']['logactivity']; ?>   -  <em><?PHP echo $log_activity_clientpo_list['Logactivity']['logid']; ?></em></small></h4>
                                            <input type="hidden" id="quo_po_app" value="<?PHP echo $log_activity_clientpo_list['Logactivity']['logid']; ?>">
                                            </td>
                                            <td class="text-center ">
                                            <?PHP if($log_activity_clientpo_list['Logactivity']['logname'] == 'ClientPO'){ ?>
                                                <?PHP echo $this->html->link('Approve',array('controller'=>'Clientposapproval','action'=>'index'),array('class'=>'btn btn-xs btn-primary')) ?>
                                            <?PHP //echo $this->form->button('Approve',array('class'=>'btn btn-xs btn-primary approve_clientpo','id'=>$log_activity_clientpo_list['Logactivity']['logid'])) ?>
                                            <?php }?>
                                            </td>
                                            <td class="">by <?PHP echo $log_activity_clientpo_list['User']['username']; ?><br><small><?PHP echo $log_activity_clientpo_list['Logactivity']['created']; ?></small></td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php endforeach; ?>
                                    </tbody>
                                    <?php else: ?>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">
                                                <i class="gi gi-keys"></i> Oops... No Client PO Approval Available
                                            </td>
                                        </tr>
                                    </tbody>
                                    <?php endif; ?>
                                    
                                </table>
                                </div>
                                </div>
                            </div>
                             <!---------------------------------------------------------------------------------------->
                            <!------------------------------- PR - Manager ----------------------------------------------->
                            <!---------------------------------------------------------------------------------------->
                            <div class="tab-pane" id="prman">
                                <div class="block full">
                                <div class="table-responsive">
                                <table id="deliver_cannd" class="table table-vcenter table-condensed table-bordered">
                                    <?PHP if (!empty($log_activity_prman)): ?>
                                    <thead>
                                        <th>Flag</th>
                                        <th>Name(Details)</th>
                                        <th>Approval</th>
                                        <th>Created</th>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($log_activity_prman as $log_activity_prman_list) :?> 
                                        <tr>
                                            <td class="text-center" style="width: 80px;"><?php echo $this->Html->image('letters/letters-pr.jpg', array('alt' => 'PR-Manager','class'=>'')); ?></td>
                                            <td>
                                                <h4><a href="javascript:void(0)"><strong><?PHP echo $log_activity_prman_list['Logactivity']['logname'] ?></strong></a> <br><small><?PHP echo $log_activity_prman_list['Logactivity']['logactivity'] ?>   -  <em><?PHP echo $log_activity_prman_list['Logactivity']['logid'] ?></em></small></h4>
                                            </td>
                                            <td class="text-center ">
                                           <?PHP if($log_activity_prman_list['Logactivity']['logactivity'] == 'Add Manager'){ ?>
                                            <?PHP echo $this->html->link('Approve',array('controller'=>'PurchaseRequisitions','action'=>'edit',$log_activity_prman_list['Logactivity']['logid']),array('class'=>'btn btn-xs btn-primary')) ?>
                                           <?php }?>
                                           
                                            
                                            </td>
                                            <td class="">by <?PHP echo $log_activity_prman_list['User']['username'] ?><br><small><?PHP echo $log_activity_prman_list['Logactivity']['created'] ?></small></td>
                                        </tr>
                                   
                                       <?php endforeach; ?>
                                         </tbody>
                                        <?php else: ?>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">
                                                <i class="gi gi-keys"></i> Oops... No PR - Manager Approval Available
                                            </td>
                                        </tr>
                                    </tbody>
                                    <?php endif; ?>
                                    
                                </table>
                                </div>
                                </div>
                            </div>
                            
                            <!---------------------------------------------------------------------------------------->
                            <!------------------------------- PR - Supervisor ----------------------------------------------->
                            <!---------------------------------------------------------------------------------------->
                            <div class="tab-pane" id="prsuper">
                                <div class="block full">
                                <div class="table-responsive">
                                <table id="deliver_cannd" class="table table-vcenter table-condensed table-bordered">
                                    <?PHP if (!empty($log_activity_prsuper)): ?>
                                    <thead>
                                        <th>Flag</th>
                                        <th>Name(Details)</th>
                                        <th>Approval</th>
                                        <th>Created</th>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($log_activity_prsuper as $log_activity_prsuper_list) :?> 
                                        <tr>
                                            <td class="text-center" style="width: 80px;"><?php echo $this->Html->image('letters/letters-pr.jpg', array('alt' => 'PR-Super','class'=>'')); ?></td>
                                            <td>
                                                <h4><a href="javascript:void(0)"><strong><?PHP echo $log_activity_prsuper_list['Logactivity']['logname'] ?></strong></a> <br><small><?PHP echo $log_activity_prsuper_list['Logactivity']['logactivity'] ?>   -  <em><?PHP echo $log_activity_prsuper_list['Logactivity']['logid'] ?></em></small></h4>
                                            </td>
                                            <td class="text-center ">
                                           <?PHP if($log_activity_prsuper_list['Logactivity']['logactivity'] == 'Add Supervisor'){ ?>
                                            <?PHP // echo $this->html->link('Approve',array('controller'=>'PurchaseRequisitions','action'=>'edit',$log_activity_prsuper_list['Logactivity']['logid']),array('class'=>'btn btn-xs btn-primary')) ?>
                                                <?PHP echo $this->form->button('Approve',array('class'=>'btn btn-xs btn-primary approve_prsuper','id'=>$log_activity_prsuper_list['Logactivity']['logid'])) ?>
                                           <?php }?>
                                           
                                            
                                            </td>
                                            <td class="">by <?PHP echo $log_activity_prsuper_list['User']['username'] ?><br><small><?PHP echo $log_activity_prsuper_list['Logactivity']['created'] ?></small></td>
                                        </tr>
                                   
                                       <?php endforeach; ?>
                                         </tbody>
                                        <?php else: ?>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">
                                                <i class="gi gi-keys"></i> Oops... No PR - Supervisor Approval Available
                                            </td>
                                        </tr>
                                    </tbody>
                                    <?php endif; ?>
                                    
                                </table>
                                </div>
                                </div>
                            </div>
                            <!---------------------------------------------------------------------------------------->
                            <!------------------------------- PR Purchase ----------------------------------------------->
                            <!---------------------------------------------------------------------------------------->
                            <div class="tab-pane" id="prpur">
                                <div class="block full">
                                <div class="table-responsive">
                                <table id="deliver_cannd" class="table table-vcenter table-condensed table-bordered">
                                    <?PHP if (!empty($log_activity_prpur)): ?>
                                    <thead>
                                        <th>Flag</th>
                                        <th>Name(Details)</th>
                                        <th>Approval</th>
                                        <th>Created</th>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($log_activity_prpur as $log_activity_prpur_list) :?> 
                                        <tr>
                                            <td class="text-center" style="width: 80px;"><?php echo $this->Html->image('letters/letters-pr.jpg', array('alt' => 'PR-Purchase','class'=>'')); ?></td>
                                            <td>
                                                <h4><a href="javascript:void(0)"><strong><?PHP echo $log_activity_prpur_list['Logactivity']['logname'] ?></strong></a> <br><small><?PHP echo $log_activity_prpur_list['Logactivity']['logactivity'] ?>   -  <em><?PHP echo $log_activity_prpur_list['Logactivity']['logid'] ?></em></small></h4>
                                            </td>
                                            <td class="text-center ">
                                           <?PHP if($log_activity_prpur_list['Logactivity']['logname'] == 'PRPurchase'){ ?>
                                            <?PHP  echo $this->html->link('Approve',array('controller'=>'Reqpurchaseorders','action'=>'edit',$log_activity_prpur_list['Logactivity']['logid']),array('class'=>'btn btn-xs btn-primary')) ?>
                                                
                                           <?php }?>
                                           
                                            
                                            </td>
                                            <td class="">by <?PHP echo $log_activity_prpur_list['User']['username'] ?><br><small><?PHP echo $log_activity_prpur_list['Logactivity']['created'] ?></small></td>
                                        </tr>
                                   
                                       <?php endforeach; ?>
                                         </tbody>
                                        <?php else: ?>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">
                                                <i class="gi gi-keys"></i> Oops... No PR - Purchase Order Approval Available
                                            </td>
                                        </tr>
                                    </tbody>
                                    <?php endif; ?>
                                    
                                </table>
                                </div>
                                </div>
                            </div>
                            
                            
                            </div>
                           
                            </div>
                            
                            <div class="tab-pane" id="ins_approval">
                                <ul class="nav nav-tabs" data-toggle="tabs">
                                    <?php if($user_role['app_instrument']['view'] != 0){ ?>
                                    <li><a href="#instrument">Instrument <span class="badge animation-floating"><?php echo $log_activity_instrument_count; ?></span></a></li>
                                    <?php } ?>
                                    <?php if($user_role['app_procedureno']['view'] != 0){ ?>
                                    <li><a href="#procedureno">Proc.No <span class="badge animation-floating"><?php echo $log_activity_procedure_count; ?></span></a></li>
                                    <?php } ?>
                                    <?php if($user_role['app_unit']['view'] != 0){ ?>
                                    <li><a href="#unit">Unit <span class="badge animation-floating"><?php echo $log_activity_unit_count; ?></span></a></li>
                                    <?php } ?>
                                    <?php if($user_role['app_range']['view'] != 0){ ?>
                                    <li><a href="#range">Range <span class="badge animation-floating"><?php echo $log_activity_range_count; ?></span></a></li>
                                    <?php } ?>
                                    <?php if($user_role['app_range']['view'] != 0){ ?>
                                    <li><a href="#brand">Brand <span class="badge animation-floating"><?php echo $log_activity_brand_count; ?></span></a></li>
                                    <?php } ?>
                                    <?php if($user_role['app_instrumentgroup']['view'] != 0){ ?>
                                    <li><a href="#group">Instruments for Group <span class="badge animation-floating"><?php echo $log_activity_group_count; ?></span></a></li>
                                    <?php } ?>
                                </ul>
                            <div class="tab-content">
                                <p></p>
                            
                            <!---------------------------------------------------------------------------------------->
                            <!-------------------------------INSTRUMENT----------------------------------------------->
                            <!---------------------------------------------------------------------------------------->
                            
                            <div class="tab-pane" id="instrument">
                                <div class="block full">
                                <div class="table-responsive">
                                    <table id="example-datatable"  class="table table-vcenter table-condensed table-bordered">
                                            <?PHP if (!empty($log_activity_instrument)): ?>
                                            <thead>
                                                <tr>
                                                <th>Flag</th>
                                                <th>Name(Details)</th>
                                                <th>Approval</th>
                                                <th>Created</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($log_activity_instrument as $log_activity_instrument_list) :?>
                                            <tr>
                                                <td class="text-center" style="width: 80px;"> <?php echo $this->Html->image('letters/letters-in.jpg', array('alt' => 'Instrument','class'=>'')); ?></td>
                                                <td>
                                                    <h4><a href="javascript:void(0)"><strong><?PHP echo $log_activity_instrument_list['Logactivity']['logname'] ?></strong></a> <br><small><?PHP echo $log_activity_instrument_list['Logactivity']['logactivity'] ?>   -  <em><?PHP echo $log_activity_instrument_list['Logactivity']['logid'] ?></em></small></h4>
                                                </td>
                                                <td class="text-center ">
                                                    <?PHP if($log_activity_instrument_list['Logactivity']['logname'] == 'Instrument'){ ?>
                                                    <?PHP echo $this->html->link('Approve',array('controller'=>'Instruments','action'=>'edit',$log_activity_instrument_list['Logactivity']['logid']),array('class'=>'btn btn-alt btn-xs btn-primary')) ?>
                                                    <?php }?>
                                                </td>
                                                <td class="">by <?PHP echo $log_activity_instrument_list['User']['username'] ?><br><small><?PHP echo $log_activity_instrument_list['Logactivity']['created'] ?></small></td>
                                            </tr>
                                            <?php endforeach; ?>
                                            </tbody>
                                        <?php else: ?>
                                        <tbody>
                                        <tr>
                                            <td class="text-center">
                                                <i class="gi gi-keys"></i> Oops... No Instrument Approval Available
                                            </td>
                                        </tr>
                                        </tbody>
                                        <?php endif; ?>
                                    </table>
                                </div>
                                </div>
                            </div>
                            
                             <!---------------------------------------------------------------------------------------->
                            <!-------------------------------Procedure No----------------------------------------------->
                            <!---------------------------------------------------------------------------------------->
                            
                            <div class="tab-pane" id="procedureno">
                                <div class="block full">
                                <div class="table-responsive">
                                    <table id="example-datatable"  class="table table-vcenter table-condensed table-bordered">
                                        <?PHP if (!empty($log_activity_procedure)): ?>
                                        <thead>
                                            <tr>
                                            <th>Flag</th>
                                            <th>Name(Details)</th>
                                            <th>Approval</th>
                                            <th>Created</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($log_activity_procedure as $log_activity_procedure_list) :?>
                                            <tr>
                                                <td class="text-center" style="width: 80px;"><?php echo $this->Html->image('letters/letters-pr.jpg', array('alt' => 'Procedure No','class'=>'')); ?></td>
                                                <td>
                                                    <h4><a href="javascript:void(0)"><strong><?PHP echo $log_activity_procedure_list['Logactivity']['logname'] ?></strong></a> <br><small><?PHP echo $log_activity_procedure_list['Logactivity']['logactivity'] ?>   -  <em><?PHP echo $log_activity_procedure_list['Logactivity']['logid'] ?></em></small></h4>
                                                </td>
                                                <td class="text-center ">
                                                    <?PHP if($log_activity_procedure_list['Logactivity']['logname'] == 'Procedure No'){ ?>
                                                    <?PHP echo $this->html->link('Approve',array('controller'=>'Procedures','action'=>'edit',$log_activity_procedure_list['Logactivity']['logid']),array('class'=>'btn btn-alt btn-xs btn-primary')) ?>
                                                    <?php }?>
                                                </td>
                                                <td class="">by <?PHP echo $log_activity_procedure_list['User']['username'] ?><br><small><?PHP echo $log_activity_procedure_list['Logactivity']['created'] ?></small></td>
                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                        <?php else: ?>
                                        <tbody>
                                        <tr>
                                            <td class="text-center">
                                                <i class="gi gi-keys"></i> Oops... No Procedure Number Approval Available
                                            </td>
                                        </tr>
                                        </tbody>
                                        <?php endif; ?>
                                        
                                </table>
                                </div>
                                </div>
                            </div>
                            
                             <!---------------------------------------------------------------------------------------->
                            <!-------------------------------UNIT----------------------------------------------->
                            <!---------------------------------------------------------------------------------------->
                            <div class="tab-pane" id="unit">
                                <div class="block full">
                                <div class="table-responsive">
                                <table id="example-datatable"  class="table table-vcenter table-condensed table-bordered">
                                     
                                    <?PHP if (!empty($log_activity_unit)): ?>
                                    <thead>
                                        <tr>
                                        <th>Flag</th>
                                        <th>Name(Details)</th>
                                        <th>Approval</th>
                                        <th>Created</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($log_activity_unit as $log_activity_unit_list) :?>
                                        <tr>
                                            <td class="text-center" style="width: 80px;"><?php echo $this->Html->image('letters/letters-un.jpg', array('alt' => 'Unit','class'=>'')); ?></td>
                                            <td>
                                                <h4><a href="javascript:void(0)"><strong><?PHP echo $log_activity_unit_list['Logactivity']['logname'] ?></strong></a> <br><small><?PHP echo $log_activity_unit_list['Logactivity']['logactivity'] ?>   -  <em><?PHP echo $log_activity_unit_list['Logactivity']['logid'] ?></em></small></h4>
                                            </td>
                                            <td class="text-center ">
                                            <?PHP if($log_activity_unit_list['Logactivity']['logname'] == 'Unit'){ ?>
                                            <?PHP echo $this->html->link('Approve',array('controller'=>'Units','action'=>'edit',$log_activity_unit_list['Logactivity']['logid']),array('class'=>'btn btn-xs btn-primary')) ?>
                                            <?php }?>
                                            </td>
                                            <td class="">by <?PHP echo $log_activity_unit_list['User']['username'] ?><br><small><?PHP echo $log_activity_unit_list['Logactivity']['created'] ?></small></td>
                                        </tr>
                                       <?php endforeach; ?>
                                    </tbody>
                                    <?php else: ?>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">
                                                <i class="gi gi-keys"></i> Oops... No Unit Approval Available
                                            </td>
                                        </tr>
                                    </tbody>
                                    <?php endif; ?>
                                </table>
                                </div>
                                </div>
                            </div>
                            
                             <!---------------------------------------------------------------------------------------->
                            <!-------------------------------RANGE----------------------------------------------->
                            <!---------------------------------------------------------------------------------------->
                            <div class="tab-pane" id="range">
                                <div class="block full">
                                <div class="table-responsive">
                                <table id="example-datatable"  class="table table-vcenter table-condensed table-bordered">
                                        <?PHP if (!empty($log_activity_range)): ?>
                                        <thead>
                                            <tr>
                                            <th>Flag</th>
                                            <th>Name(Details)</th>
                                            <th>Approval</th>
                                            <th>Created</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($log_activity_range as $log_activity_range_list) :?>
                                        <tr>
                                            <td class="text-center" style="width: 80px;"><?php echo $this->Html->image('letters/letters-ra.jpg', array('alt' => 'Instrument','class'=>'')); ?></td>
                                            <td>
                                                <h4><a href="javascript:void(0)"><strong><?PHP echo $log_activity_range_list['Logactivity']['logname'] ?></strong></a> <br><small><?PHP echo $log_activity_range_list['Logactivity']['logactivity'] ?>   -  <em><?PHP echo $log_activity_range_list['Logactivity']['logid'] ?></em></small></h4>
                                            </td>
                                            <td class="text-center ">
                                           <?PHP if($log_activity_range_list['Logactivity']['logname'] == 'Range'){ ?>
                                            <?PHP echo $this->html->link('Approve',array('controller'=>'Ranges','action'=>'edit',$log_activity_range_list['Logactivity']['logid']),array('class'=>'btn btn-xs btn-primary')) ?>
                                           <?php }?>
                                           
                                            </td>
                                            <td class="">by <?PHP echo $log_activity_range_list['User']['username'] ?><br><small><?PHP echo $log_activity_range_list['Logactivity']['created'] ?></small></td>
                                        </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                        <?php else: ?>
                                        <tbody>
                                        <tr>
                                            <td class="text-center">
                                                <i class="gi gi-keys"></i> Oops... No Range Approval Available
                                            </td>
                                        </tr>
                                        </tbody>
                                        <?php endif; ?>
                                </table>
                                </div>
                                </div>
                            </div>
                            
                             <!---------------------------------------------------------------------------------------->
                            <!-------------------------------Brand----------------------------------------------->
                            <!---------------------------------------------------------------------------------------->
                            <div class="tab-pane" id="brand">
                                <div class="block full">
                                <div class="table-responsive">
                                <table id="example-datatable"  class="table table-vcenter table-condensed table-bordered">
                                        <?PHP if (!empty($log_activity_brand)): ?>
                                        <thead>
                                            <tr>
                                            <th>Flag</th>
                                            <th>Name(Details)</th>
                                            <th>Approval</th>
                                            <th>Created</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($log_activity_brand as $log_activity_brand_list) :?>
                                        <tr>
                                            <td class="text-center" style="width: 80px;"><?php echo $this->Html->image('letters/letters-br.jpg', array('alt' => 'Instrument','class'=>'')); ?></td>
                                            <td>
                                                <h4><a href="javascript:void(0)"><strong><?PHP echo $log_activity_brand_list['Logactivity']['logname'] ?></strong></a> <br><small><?PHP echo $log_activity_brand_list['Logactivity']['logactivity'] ?>   -  <em><?PHP echo $log_activity_brand_list['Logactivity']['logid'] ?></em></small></h4>
                                            </td>
                                            <td class="text-center ">
                                           <?PHP if($log_activity_brand_list['Logactivity']['logname'] == 'Brand'){ ?>
                                            <?PHP echo $this->html->link('Approve',array('controller'=>'Brands','action'=>'edit',$log_activity_brand_list['Logactivity']['logid']),array('class'=>'btn btn-xs btn-primary')) ?>
                                           <?php }?>
                                           
                                            </td>
                                            <td class="">by <?PHP echo $log_activity_brand_list['User']['username'] ?><br><small><?PHP echo $log_activity_brand_list['Logactivity']['created'] ?></small></td>
                                        </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                        <?php else: ?>
                                        <tbody>
                                        <tr>
                                            <td class="text-center">
                                                <i class="gi gi-keys"></i> Oops... No Brand Approval Available
                                            </td>
                                        </tr>
                                        </tbody>
                                        <?php endif; ?>
                                </table>
                                </div>
                                </div>
                            </div>
                            <!---------------------------------------------------------------------------------------->
                            <!-------------------------------Instrument For Group----------------------------------------------->
                            <!---------------------------------------------------------------------------------------->
                            <div class="tab-pane" id="group">
                                <div class="block full">
                                <div class="table-responsive">
                                <table id="qofull-datatable1"  class="table table-vcenter table-condensed table-bordered">
                                        <?PHP if (!empty($log_activity_group)): ?>
                                        <thead>
                                            <tr>
                                            <th>Flag</th>
                                            <th>Name(Details)</th>
                                            <th>Approval</th>
                                            <th>Created</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($log_activity_group as $log_activity_group_list) :?>
                                        <tr>
                                            <td class="text-center" style="width: 80px;"><?php echo $this->Html->image('letters/letters-br.jpg', array('alt' => 'Instrument','class'=>'')); ?></td>
                                            <td>
                                                <h4><a href="javascript:void(0)"><strong><?PHP echo $log_activity_group_list['Logactivity']['logname'] ?></strong></a> <br><small><?PHP echo $log_activity_group_list['Logactivity']['logactivity'] ?>   -  <em><?PHP echo $log_activity_group_list['Logactivity']['logid'] ?></em></small></h4>
                                            </td>
                                            <td class="text-center ">
                                           <?PHP if($log_activity_group_list['Logactivity']['logname'] == 'Instrument For Group'){ ?>
                                            <?PHP echo $this->html->link('Approve',array('controller'=>'Instrumentforgroups','action'=>'edit',$log_activity_group_list['Logactivity']['logid']),array('class'=>'btn btn-xs btn-primary')) ?>
                                           <?php }?>
                                           
                                            </td>
                                            <td class="">by <?PHP echo $log_activity_group_list['User']['username'] ?><br><small><?PHP echo $log_activity_group_list['Logactivity']['created'] ?></small></td>
                                        </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                        <?php else: ?>
                                        <tbody>
                                        <tr>
                                            <td class="text-center">
                                                <i class="gi gi-keys"></i> Oops... No Instrument for Group Approval Available
                                            </td>
                                        </tr>
                                        </tbody>
                                        <?php endif; ?>
                                </table>
                                </div>
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
                    <?php if($user_role['dash_number']['view'] != 0){ ?>
                    <div class="row">
                        <div class="col-sm-2 col-lg-2">
                            <!-- Widget -->
                            <div class="widget">
                                <div class="widget-simple min-height165">
                                    <a> <span class="label label-primary custom_float_top animation-floating"><?php echo $total_quotation_view; ?> New</span><h3 class="text-center animation-stretchRight">In Quotation</h3> </a>
                                        <h3 class="text-center themed-color-night animation-stretchRight"><strong><?php echo $total_quotation_count; ?></strong></h3>
                                </div>
                            </div>
                            <!-- END Widget -->
                        </div>
                        
                        <div class="col-sm-2 col-lg-2">
                            <!-- Widget -->
                            <div class="widget">
                                <div class="widget-simple min-height165">
                                    <a> <span class="label label-second custom_float_top animation-floating"><?php echo $total_po_count; ?> New</span><h3 class="text-center themed-color-amethyst animation-stretchRight">Purchase Order</h3> </a>
                                        <h3 class="text-center themed-color-night animation-stretchRight"><strong><?php echo $total_po_count; ?></strong></h3>
                                </div>
                            </div>
                            <!-- END Widget -->
                        </div>
                        <div class="col-sm-2 col-lg-2">
                            <!-- Widget -->
                            <div class="widget">
                                <div class="widget-simple min-height165">
                                    <a> <span class="label label-third custom_float_top animation-floating"><?php echo $total_salesorder_view; ?> New</span><h3 class="text-center themed-color-autumn animation-stretchRight">Sales Order</h3> </a>
                                        <h3 class="text-center themed-color-night animation-stretchRight"><strong><?php echo $total_salesorder_count; ?></strong></h3>
                                </div>
                            </div>
                            <!-- END Widget -->
                        </div>
                       <div class="col-sm-2 col-lg-2">
                            <!-- Widget -->
                            <div class="widget">
                                <div class="widget-simple min-height165">
                                    <a> <span class="label label-four custom_float_top animation-floating"><?php echo $total_labprocess_count; ?> New</span><h3 class="text-center themed-color-fancy animation-stretchRight">Lab Process</h3> </a>
                                        <h3 class="text-center themed-color-night animation-stretchRight"><strong><?php echo $total_labprocess_view; ?></strong></h3>
                                </div>
                            </div>
                            <!-- END Widget -->
                        </div>
                         <div class="col-sm-2 col-lg-2">
                            <!-- Widget -->
                            <div class="widget">
                                <div class="widget-simple min-height165">
                                    <a> <span class="label label-five custom_float_top animation-floating"><?php echo $total_invoice_count; ?> New</span><h3 class="text-center themed-color-spring animation-stretchRight">In Invoice </h3> </a>
                                        <h3 class="text-center themed-color-night animation-stretchRight"><strong><?php echo $total_invoice_count; ?></strong></h3>
                                </div>
                            </div>
                            <!-- END Widget -->
                        </div>
                         <div class="col-sm-2 col-lg-2">
                            <!-- Widget -->
                            <div class="widget">
                                <div class="widget-simple min-height165">
                                    <a> <span class="label label-six custom_float_top animation-floating"><?php echo $total_delivery_view; ?> New</span><h3 class="text-center themed-color-dark-night animation-stretchRight">Total Delivery</h3> </a>
                                        <h3 class="text-center themed-color-night animation-stretchRight"><strong><?php echo $total_delivery_count; ?></strong></h3>
                                </div>
                            </div>
                            <!-- END Widget -->
                            
                            
                        </div>
                    </div>
                                <?php } ?>
                    <?php } ?>
                    <?php if($user_me == 1 || $user_me ==2){ ?>
                    <?php if($user_role['dash_graph']['view'] != 0){ ?>
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
                    <?php } ?>
                     <?php if($user_role['dash_calendar']['view'] != 0){ ?>
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
                                    <ul class="calendar-events calender_listing">
                                        <li class="quote_calendar" data-id="Quotations">Quotation</li><!--  style="background-color: #1abc9c"  -->
                                        <li class="quote_calendar" data-id="Salesorders">Sales Order</li><!--  style="background-color: #9b59b6"  -->
                                        <li class="quote_calendar" data-id="Quotations/calendar_clientpo">Client PO</li><!--   style="background-color: #f39c12"  -->
                                        <li class="quote_calendar" data-id="Deliveryorders">Delivery Order</li><!--   style="background-color: #3498db"  -->
                                        <li class="quote_calendar" data-id="Quotations">Sub-Contract DO</li><!--  style="background-color: #e74c3c"  -->
                                        <li class="quote_calendar" data-id="Onsites">Onsite</li><!--  style="background-color: #1abc9c"  -->
                                        <li class="quote_calendar" data-id="Reqpurchaseorders">PR</li><!--  style="background-color: #1abc9c"  -->
                                        <li class="quote_calendar" data-id="Quotations">PO</li><!--  style="background-color: #1abc9c"  -->
                                        <li class="quote_calendar" data-id="Instruments/tech">TECHNICAL</li><!--  style="background-color: #1abc9c"  -->
                                        <li class="quote_calendar" data-id="Instruments/dim">DIMENSIONAL</li><!--  style="background-color: #1abc9c"  -->
                                        <li class="quote_calendar" data-id="Instruments/ele">ELECTRICAL</li><!--  style="background-color: #1abc9c"  -->
                                        <li class="quote_calendar" data-id="Instruments/pre">PRESSURE</li><!--  style="background-color: #1abc9c"  -->
                                        <li class="quote_calendar" data-id="Instruments/temp">TEMPERATURE</li><!--  style="background-color: #1abc9c"  -->
                                        <li class="quote_calendar" data-id="Instruments/other">OTHERS</li>
                                        
                                   </ul>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <!-- FullCalendar (initialized in js/pages/compCalendar.js), for more info and examples you can check out http://arshaw.com/fullcalendar/ -->
                                <div id="calendar"></div>
                            </div>
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
        <div>
            
        </div>
        
          <script>
              
    $(function(){ 
        
      
        
        //$('.quote_calendar').function(){
        
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

          
            var date = new Date();
            var d = date.getDate();
            var m = date.getMonth();
            var y = date.getFullYear();
            
            $('#calendar').fullCalendar({
                
                header: {
                    left: 'prev,next',
                    center: 'title',
                    right: 'month'
                    //,agendaWeek,agendaDay
                },
                firstDay: 1,
                editable: false,
                droppable: false,
                drop: function(date, allDay) { // this function is called when something is dropped

                    // retrieve the dropped element's stored Event Object
                    var originalEventObject = $(this).data('eventObject');

                    // we need to copy it, so that multiple events don't have a reference to the same object
                    var copiedEventObject = $.extend({}, originalEventObject);

                    $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

                    // remove the element from the "Draggable Events" list
                    $(this).remove();
                },
                
                
            });
            
            //////// Calendar For Quotation ///////////////
            $(document).on('click','.quote_calendar',function(){
                
               
                var calen = $(this).attr('data-id');
               
               
            $('#calendar').empty().fullCalendar({
                
                header: {
                    left: 'prev,next',
                    center: 'title',
                    right: 'month'
                    //,agendaWeek,agendaDay
                },
                firstDay: 1,
                editable: false,
                droppable: false,
                drop: function(date, allDay) { // this function is called when something is dropped

                    // retrieve the dropped element's stored Event Object
                    var originalEventObject = $(this).data('eventObject');

                    // we need to copy it, so that multiple events don't have a reference to the same object
                    var copiedEventObject = $.extend({}, originalEventObject);

                    $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

                    // remove the element from the "Draggable Events" list
                    $(this).remove();
                },
                events: path+calen+'/calendar/'
                
            });
         
     });
        /////////////// Calendar for Quotation /////////////
        
//        //////// Calendar For Salesorder ///////////////
//            $(document).on('click','.sales_calendar',function(){
//                
//            $('#calendar').fullCalendar({
//                header: {
//                    left: 'prev,next',
//                    center: 'title',
//                    right: 'month'
//                    //,agendaWeek,agendaDay
//                },
//                firstDay: 1,
//                editable: false,
//                droppable: false,
//                drop: function(date, allDay) { // this function is called when something is dropped
//
//                    // retrieve the dropped element's stored Event Object
//                    var originalEventObject = $(this).data('eventObject');
//
//                    // we need to copy it, so that multiple events don't have a reference to the same object
//                    var copiedEventObject = $.extend({}, originalEventObject);
//
//                    $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
//
//                    // remove the element from the "Draggable Events" list
//                    $(this).remove();
//                },
//                events: path+'Salesorders/calendar/'
//                
//            });});
//        /////////////// Calendar for Salesorder /////////////
        
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
      