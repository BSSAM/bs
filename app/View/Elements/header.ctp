<!-- Page Container -->
        <!-- In the PHP version you can set the following options from inc/config.html file -->
        <!--
            Available #page-container classes:

            '' (None)                                       for a full main and alternative sidebar hidden by default (> 991px)

            'sidebar-visible-lg'                            for a full main sidebar visible by default (> 991px)
            'sidebar-partial'                               for a partial main sidebar which opens on mouse hover, hidden by default (> 991px)
            'sidebar-partial sidebar-visible-lg'            for a partial main sidebar which opens on mouse hover, visible by default (> 991px)

            'sidebar-alt-visible-lg'                        for a full alternative sidebar visible by default (> 991px)
            'sidebar-alt-partial'                           for a partial alternative sidebar which opens on mouse hover, hidden by default (> 991px)
            'sidebar-alt-partial sidebar-alt-visible-lg'    for a partial alternative sidebar which opens on mouse hover, visible by default (> 991px)

            'sidebar-partial sidebar-alt-partial'           for both sidebars partial which open on mouse hover, hidden by default (> 991px)

            'sidebar-no-animations'                         add this as extra for disabling sidebar animations on large screens (> 991px) - Better performance with heavy pages!

            'style-alt'                                     for an alternative main style (without it: the default style)
            'footer-fixed'                                  for a fixed footer (without it: a static footer)

            'header-fixed-top'                              has to be added only if the class 'navbar-fixed-top' was added on header.navbar
            'header-fixed-bottom'                           has to be added only if the class 'navbar-fixed-bottom' was added on header.navbar
        -->
        <div id="page-container" class="sidebar-partial sidebar-visible-lg sidebar-no-animations">
            

            <!-- Main Sidebar -->
            <div id="sidebar">
                <!-- Wrapper for scrolling functionality -->
                <div class="sidebar-scroll">
                    <!-- Sidebar Content -->
                    <div class="sidebar-content">
                        <!-- Brand -->
                        
                        
                        <!-- END Brand -->

                        <!-- User Info -->
                        <div class="sidebar-section sidebar-user clearfix">
                            <div class="sidebar-user-avatar">
                                <a href="#">
                                    <?php echo $this->Html->image('placeholders/avatars/admin.jpg', array('alt' => 'avatar','class'=>'')); ?>
                                </a>
                            </div>
                            <div class="sidebar-user-name"><?php echo $username; ?></div>
                            <div class="sidebar-user-links">
                                <a href="" data-toggle="tooltip" data-placement="bottom" title="Profile"><i class="gi gi-user"></i></a>
                                <a href="" data-toggle="tooltip" data-placement="bottom" title="Messages"><i class="gi gi-envelope"></i></a>
                                <!-- Opens the user settings modal that can be found at the bottom of each page (page_footer.html in PHP version) -->
                                <a href="#modal-user-settings" data-toggle="modal" class="enable-tooltip" data-placement="bottom" title="Settings"><i class="gi gi-cogwheel"></i></a>
                               
                            <?php echo $this->Html->link('<i class="gi gi-exit"></i>',array('controller'=>'Logins','action'=>'logout',),array( 'escape'=>false,'data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Logout'));?>
                            </div>
                        </div>
                        <!-- END User Info -->

                        <!-- Theme Colors -->
                        <!-- Change Color Theme functionality can be found in js/app.js - templateOptions() -->
                        
                        <!-- END Theme Colors -->

                        <!-- Sidebar Navigation -->
                        <ul class="sidebar-nav">
                            <!--<li>
                                <a href="../Dashboards"><i class="gi gi-stopwatch sidebar-nav-icon"></i>Dashboard</a>
                            </li>-->
                            <li>
                                <a href="" class="sidebar-nav-menu <?php echo $a=($control == 'Users'||$control == 'Userroles'||$control == 'Countries'||$control == 'Departments'||$control == 'Assigns'||$control == 'Services'||$control == 'Additionalcharges'||$control == 'Tallyledgers'||$control == 'Currencies'||$control == 'Branches')?'open':''; ?>"><i class="fa fa-angle-left sidebar-nav-indicator"></i><i class="gi gi-user sidebar-nav-icon"></i>Users</a>
                                 <ul <?php echo $a=($control == 'Users'||$control == 'Userroles'||$control == 'Countries'||$control == 'Departments'||$control == 'Assigns'||$control == 'Services'||$control == 'Additionalcharges'||$control == 'Tallyledgers'||$control == 'Currencies'||$control == 'Branches')?'style=display:block':''; ?>>
                                    <?php if($user_role['other_user']['view'] == 1){ ?>
                                     <li>
                                         <?php $a=($control == 'Users')?'active':''; ?>
                                         <?php echo $this->Html->link('Users',array('controller'=>'Users','action'=>'index'),array('class'=>$a,'escape'=>false)); ?>
                                    </li><?php } ?>
                                    <?php if($user_role['other_role']['view'] == 1){ ?>
                                    <li>
                                        <?php $a=($control == 'Userroles')?'active':''; ?>
                                         <?php echo $this->Html->link('User Roles',array('controller'=>'Userroles','action'=>'index'),array('class'=>$a,'escape'=>false)); ?>
                                    </li><?php } ?>
                                    <?php if($user_role['other_branch']['view'] == 1){ ?>
                                    <li>
                                        <?php  $a=($control == 'Branches')?'active':''; ?>
                                        <?php echo $this->Html->link('Branch',array('controller'=>'Branches','action'=>'index'),array('class'=>$a,'escape'=>false)); ?>
                                    </li><?php } ?>
                                    <?php if($user_role['other_department']['view'] == 1){ ?>
                                    <li>
                                        <?php $a=($control == 'Departments')?'active':''; ?>
                                        <?php echo $this->Html->link('Department',array('controller'=>'Departments','action'=>'index'),array('class'=>$a,'escape'=>false)); ?>
                                    </li><?php } ?>
                                    <?php if($user_role['other_country']['view'] == 1){ ?>
                                    <li >
                                        <?php $a=($control == 'Countries')?'active':''; ?>
                                        <?php echo $this->Html->link('Country',array('controller'=>'Countries','action'=>'index'),array('class'=>$a,'escape'=>false)); ?>
                                    </li><?php } ?>
                                     <?php if($user_role['other_currency']['view'] == 1){ ?>
                                    <li>
                                        <?php  $a=($control == 'Currencies')?'active':''; ?>
                                        <?php echo $this->Html->link('Currency',array('controller'=>'Currencies','action'=>'index'),array('class'=>$a,'escape'=>false)); ?>
                                    </li><?php } ?>
                                    <?php if($user_role['other_assignedto']['view'] == 1){ ?>
                                    <li>
                                        <?php  $a=($control == 'Assigns')?'active':''; ?>
                                        <?php echo $this->Html->link('Assigned To',array('controller'=>'Assigns','action'=>'index'),array('class'=>$a,'escape'=>false)); ?>
                                    </li><?php } ?>
                                    <?php if($user_role['other_servicetype']['view'] == 1){ ?>
                                    <li>
                                        <?php $a=($control == 'Services')?'active':''; ?>
                                        <?php echo $this->Html->link('Service Type',array('controller'=>'Services','action'=>'index'),array('class'=>$a,'escape'=>false)); ?>
                                    </li><?php } ?>
                                    <?php if($user_role['other_additional']['view'] == 1){ ?>
                                    <li>
                                        <?php  $a=($control == 'Additionalcharges')?'active':''; ?>
                                        <?php echo $this->Html->link('Additional Charges',array('controller'=>'Additionalcharges','action'=>'index'),array('class'=>$a,'escape'=>false)); ?>
                                    </li><?php } ?>
                                    <?php if($user_role['other_tallyledger']['view'] == 1){ ?>
                                    <li>
                                        <?php $a=($control == 'Tallyledgers')?'active':''; ?>
                                        <?php echo $this->Html->link('Tally Ledger Account',array('controller'=>'Tallyledgers','action'=>'index'),array('class'=>$a,'escape'=>false)); ?>
                                    </li><?php } ?>
                                </ul>
                            </li>
                            <li>
                                <a href="" class="sidebar-nav-menu <?php echo $a=($control == 'Industries'||$control == 'Locations'||$control == 'Paymentterms'||$control == 'Priorities'|| $control == 'Customers'||$control == 'Referedbys'||$control == 'Salespersons')?'open':''; ?>"><i class="fa fa-angle-left sidebar-nav-indicator"></i><i class="gi gi-group sidebar-nav-icon"></i>Customers</a>
                                 <ul <?php echo $a=($control == 'Industries'||$control == 'Locations'||$control == 'Paymentterms'||$control == 'Priorities'|| $control == 'Customers'||$control == 'Referedbys'||$control == 'Salespersons')?'style=display:block':'';?>>
                                    <?php if($user_role['cus_customer']['view'] == 1){ ?>
                                    <li>
                                        <?php  $a=($control == 'Customers')?'active':''; ?>
                                        <?php echo $this->Html->link('Customers',array('controller'=>'Customers','action'=>'index'),array('class'=>$a,'escape'=>false)); ?>
                                    </li><?php } ?>
                                    <?php if($user_role['cus_industry']['view'] == 1){ ?>
                                    <li>
                                        <?php  $a=($control == 'Industries')?'active':''; ?>
                                         <?php echo $this->Html->link('Industry',array('controller'=>'Industries','action'=>'index'),array('class'=>$a,'escape'=>false)); ?>
                                    </li><?php } ?>
                                    <?php if($user_role['cus_location']['view'] == 1){ ?>
                                    <li>
                                         <?php  $a=($control == 'Locations')?'active':''; ?>
                                        <?php echo $this->Html->link('Location',array('controller'=>'Locations','action'=>'index'),array('class'=>$a,'escape'=>false)); ?>
                                    </li><?php } ?>
                                    <?php if($user_role['cus_paymentterms']['view'] == 1){ ?>
                                    <li>
                                        <?php  $a=($control == 'Paymentterms')?'active':''; ?>
                                        <?php echo $this->Html->link('Payment Terms',array('controller'=>'Paymentterms','action'=>'index'),array('class'=>$a,'escape'=>false)); ?>
                                    </li><?php } ?>
                                    <?php if($user_role['cus_priority']['view'] == 1){ ?>
                                    <li>
                                        <?php  $a=($control == 'Priorities')?'active':''; ?>
                                        <?php echo $this->Html->link('Priority',array('controller'=>'Priorities','action'=>'index'),array('class'=>$a,'escape'=>false)); ?>
                                    </li><?php } ?>
                                    <?php if($user_role['cus_referredby']['view'] == 1){ ?>
                                    <li>
                                        <?php  $a=($control == 'Referedbys')?'active':''; ?>
                                        <?php echo $this->Html->link('Referred By',array('controller'=>'Referedbys','action'=>'index'),array('class'=>$a,'escape'=>false)); ?>
                                    </li><?php } ?>
                                    <?php if($user_role['cus_salesperson']['view'] == 1){ ?>
                                    <li>
                                        <?php  $a=($control == 'Salespersons')?'active':''; ?>
                                        <?php echo $this->Html->link('Sales Person',array('controller'=>'Salespersons','action'=>'index'),array('class'=>$a,'escape'=>false)); ?>
                                    </li><?php } ?>
                                    <?php if($user_role['cus_title']['view'] == 1){ ?>
                                    <li>
                                        <?php echo $a=($control == 'title')?'active':''; ?>
                                        <a href="#"><?php echo 'Title'; ?></a>
                                    </li><?php } ?>
                                   
                                </ul>
                            </li>
                            <li>
                                <a href="" class="sidebar-nav-menu <?php echo $a=($control == 'Instruments'||$control == 'procedures'||$control == 'Brands'||$control == 'Ranges'||$control=='Units'||$control=='procedures')?'open':''; ?>"><i class="fa fa-angle-left sidebar-nav-indicator"></i><i class="gi gi-ruller sidebar-nav-icon"></i>Instruments</a>
                                 <ul <?php echo $a=($control == 'Instruments'||$control == 'procedures'||$control == 'Brands'||$control == 'Ranges'|| $control == 'Units'||$control=='procedures')?'style=display:block':'';?> >
                                    <?php if($user_role['ins_instrument']['view'] == 1){ ?>
                                    <li>
                                        <?php  $a=($control == 'Instruments')?'active':''; ?>
                                        <?PHP echo $this->Html->link('Instrument',array('controller'=>'Instruments','action'=>'index'),array('class'=>$a,'escape'=>false)); ?>
                                    </li><?php } ?>
                                    <?php if($user_role['ins_procedureno']['view'] == 1){ ?>
                                    <li>
                                        <?php  $a=($control == 'procedures')?'active':''; ?>
                                        <?PHP echo $this->Html->link('Procedure No',array('controller'=>'procedures','action'=>'index'),array('class'=>$a,'escape'=>false)); ?>
                                    </li><?php } ?>
                                    <?php if($user_role['ins_brand']['view'] == 1){ ?>
                                    <li>
                                        <?php  $a=($control == 'Brands')?'active':''; ?>
                                        <?PHP echo $this->Html->link('Brand',array('controller'=>'Brands','action'=>'index'),array('class'=>$a,'escape'=>false)); ?>
                                    </li><?php } ?>
<!--                                    <li>
                                         <a href="#"><?php //echo 'Instrument'; ?></a>
                                    </li>-->
                                    <?php if($user_role['ins_instrumentforgroup']['view'] == 1){ ?>
                                    <li>
                                         <a href="#"><?php echo 'Instrument for Group'; ?></a>
                                    </li><?php } ?>
                                    <?php if($user_role['ins_range']['view'] == 1){ ?>
                                    <li>
                                        <?php  $a=($control == 'Ranges')?'active':''; ?>
                                        <?PHP echo $this->Html->link('Range',array('controller'=>'Ranges','action'=>'index'),array('class'=>$a,'escape'=>false)); ?>
                                    </li><?php } ?>
                                    <?php if($user_role['ins_title']['view'] == 1){ ?>
                                    <li>
                                         <a href="#"><?php echo 'Title'; ?></a>
                                    </li>
                                    <?php } ?>
                                    <?php if($user_role['ins_unit']['view'] == 1){ ?>
                                    <li>
                                        <?php  $a=($control == 'Units')?'active':''; ?>
                                        <?PHP echo $this->Html->link('Unit',array('controller'=>'Units','action'=>'index'),array('class'=>$a,'escape'=>false)); ?>
                                          
                                    </li><?php } ?>
                                </ul>
                            </li>
<!--                            <li>
                                <a href="" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator"></i><i class="gi gi-settings sidebar-nav-icon"></i>Settings</a>
                                 <ul>
                                    <?php //if($user_role['set_candd']['view'] == 1){ ?>
                                    <li>
                                          <a href="#"><?php //echo 'C & D Settings'; ?></a>
                                    </li><?php //} ?>
                                    <?php //if($user_role['set_onsiteemail']['view'] == 1){ ?>
                                    <li>
                                          <a href="#"><?php// echo 'Onsite Email Settings'; ?></a>
                                    </li><?php// } ?>
                                    <?php //if($user_role['set_recallservice']['view'] == 1){ ?>
                                    <li>
                                         <a href="#"><?php //echo 'Recall Service Settings'; ?></a>
                                    </li><?php// } ?>
                                </ul>
                            </li>-->
                            
                             <li>
                                <a href="" class="sidebar-nav-menu <?php echo $a=($control == 'Quotations'||$control == 'Salesorders'||$control == 'Deliveryorders'||$control =='Labprocesses'||$control =='Purchaseorders'||$control =='Onsites'||$control =='Debtchases'||$control =='Recallservices'||$control =='Subcontractdos'||$control =='Jobmonitorings')?'open':''; ?>"><i class="fa fa-angle-left sidebar-nav-indicator"></i><i class="gi gi-server sidebar-nav-icon"></i>Jobs</a>
                                 <ul <?php echo $a=($control == 'Quotations'||$control == 'Salesorders'||$control == 'Deliveryorders'||$control =='Labprocesses'||$control =='Purchaseorders'||$control =='Onsites'||$control =='Debtchases'||$control =='Recallservices'||$control =='Subcontractdos'||$control =='Jobmonitorings')?'style=display:block':'';?>>
                                    <?php if($user_role['job_quotation']['view'] == 1){ ?>
                                    <li>
                                        <?php  $a=($control == 'Quotations')?'active':''; ?>
                                         <?php echo $this->Html->link('Quotation',array('controller'=>'Quotations','action'=>'index'),array('class'=>$a,'escape'=>false)); ?>
                                    </li><?php } ?>
                                    
                                    <?php if($user_role['job_salesorder']['view'] == 1){ ?>
                                    <li>
                                        <?php  $a=($control == 'Salesorders')?'active':''; ?>
                                         <?php echo $this->Html->link('Sales Order',array('controller'=>'Salesorders','action'=>'index'),array('class'=>$a,'escape'=>false)); ?>
                                    </li><?php } ?> 
                                    
                                     <?php if($user_role['job_labprocess']['view'] == 1){ ?>
                                    <li>
                                        <?php  $a=($control == 'Labprocesses')?'active':''; ?>
                                         <?php echo $this->Html->link('Lab Process',array('controller'=>'Labprocesses','action'=>'index'),array('class'=>$a,'escape'=>false)); ?>
                                    </li> <?php } ?>
                                    
                                     <?php if($user_role['job_salesorder']['view'] == 1){ ?>
                                    <li>
                                        <?php  $a=($control == 'Deliveryorders')?'active':''; ?>
                                         <?php echo $this->Html->link('Delivery Order',array('controller'=>'Deliveryorders','action'=>'index'),array('class'=>$a,'escape'=>false)); ?>
                                    </li>  <?php } ?>
                                    
                                    <?php if($user_role['job_purchaseorder']['view'] == 1){ ?>
                                    <li>
                                        <?php  $a=($control == 'Purchaseorders')?'active':''; ?>
                                         <?php echo $this->Html->link('Purchase Order',array('controller'=>'Purchaseorders','action'=>'index'),array('class'=>$a,'escape'=>false)); ?>
                                    </li><?php } ?>
                                    
                                    
                                    <?php if($user_role['job_salesorder']['view'] == 1){ ?>
                                    <li>
                                        <?php  $a=($control == 'Subcontractdos')?'active':''; ?>
                                         <?php echo $this->Html->link('Sub Contract DO',array('controller'=>'Subcontractdos','action'=>'index'),array('class'=>$a,'escape'=>false)); ?>
                                    </li><?php } ?>
                                    
                                    <?php if($user_role['job_salesorder']['view'] == 1){ ?>
                                    <li>
                                        <?php  $a=($control == 'Jobmonitorings')?'active':''; ?>
                                         <?php echo $this->Html->link('Job Monitoring',array('controller'=>'Jobmonitorings','action'=>'index'),array('class'=>$a,'escape'=>false)); ?>
                                    </li><?php } ?>
                                    
                                    <?php if($user_role['job_salesorder']['view'] == 1){ ?>
                                    <li>
                                          <a href="#"><?php echo 'Proforma Invoice'; ?></a>
                                    </li><?php } ?>
                                    <?php if($user_role['job_salesorder']['view'] == 1){ ?>
                                    <li>
                                        <?php  $a=($control == 'Invoices')?'active':''; ?>
                                          <?php echo $this->Html->link('Invoice',array('controller'=>'Invoices','action'=>'index'),array('class'=>$a,'escape'=>false)); ?>
                                    </li><?php } ?>
                                    <?php if($user_role['job_salesorder']['view'] == 1){ ?>
                                     <li>
                                          <a href="#"><?php echo 'C and D Info'; ?></a>
                                    </li><?php } ?>
                                   
                                    <?php //if($user_role['job_salesorder']['view'] == 1){ ?>
                                   <!-- <li>
                                        <a href="#"><?php //echo 'Tracking System'; ?></a>
                                    </li><?php// } ?>-->
                                    <?php // if($user_role['job_salesorder']['view'] == 1){ ?>
                                     <!--<li>
                                          <a href="#"><?php //echo 'Job Transaction'; ?></a>
                                    </li><?php //} ?>-->
                                    <?php if($user_role['job_salesorder']['view'] == 1){ ?>
                                    <li>
                                          <a href="#"><?php echo 'Purchase Requisition'; ?></a>
                                    </li><?php } ?>
                                    <?php if($user_role['job_salesorder']['view'] == 1){ ?>
                                    <li>
                                          <a href="#"><?php echo 'PR_Purchase Order'; ?></a>
                                    </li><?php } ?>
                                    <?php if($user_role['job_salesorder']['view'] == 1){ ?>
                                    
                                    <li>
                                        <?php  $a=($control == 'Debtchases')?'active':''; ?>
                                        <?php echo $this->Html->link('Debt Chase',array('controller'=>'Debtchases','action'=>'index'),array('class'=>$a,'escape'=>false)); ?>
                                    </li><?php } ?>
                                    <?php if($user_role['job_salesorder']['view'] == 1){ ?>
                                    <li>
                                        <?php  $a=($control == 'Onsites')?'active':''; ?>
                                        <?php echo $this->Html->link('OnSite Schedule',array('controller'=>'Onsites','action'=>'index'),array('class'=>$a,'escape'=>false)); ?>
                                    </li><?php } ?>
                                    <?php if($user_role['job_salesorder']['view'] == 1){ ?>
                                    <li>
                                        <?php  $a=($control == 'Recallservices')?'active':''; ?>
                                        <?php echo $this->Html->link('Recall Service',array('controller'=>'Recallservices','action'=>'index'),array('class'=>$a,'escape'=>false)); ?>
                                    </li><?php } ?>
                                </ul>
                            </li>
                            <li>
                                <a href="" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator"></i><i class="gi gi-vcard sidebar-nav-icon"></i>Sales</a>
                                 <ul>
                                    <li>
                                          <a href="#"><?php echo 'Contacts'; ?></a>
                                    </li>
                                    <li>
                                          <a href="#"><?php echo 'Leads'; ?></a>
                                    </li>
                                    <li>
                                         <a href="#"><?php echo 'Tasks'; ?></a>
                                    </li>
                                    <li>
                                         <a href="#"><?php echo 'Campaigns'; ?></a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator"></i><i class="gi gi-vector_path_line sidebar-nav-icon"></i>Dimentional</a>
                                 <ul>
                                   
                                </ul>
                            </li>
                        </ul>
                        
                        <!-- END Sidebar Navigation -->

                        <!-- Sidebar Notifications -->
                        <div class="sidebar-header">
                            <span class="sidebar-header-options clearfix">
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Refresh"><i class="gi gi-refresh"></i></a>
                            </span>
                            <span class="sidebar-header-title">Activity</span>
                        </div>
                        <div class="sidebar-section">
                            <div class="alert alert-success alert-alt">
                                <small>5 min ago</small><br>
                                <i class="fa fa-thumbs-up fa-fw"></i> You had a new sale ($10)
                            </div>
                            <!--<div class="alert alert-info alert-alt">
                                <small>10 min ago</small><br>
                                <i class="fa fa-arrow-up fa-fw"></i> Upgraded to Pro plan
                            </div>
                            <div class="alert alert-warning alert-alt">
                                <small>3 hours ago</small><br>
                                <i class="fa fa-exclamation fa-fw"></i> Running low on space<br><strong>18GB in use</strong> 2GB left
                            </div>
                            <div class="alert alert-danger alert-alt">
                                <small>Yesterday</small><br>
                                <i class="fa fa-bug fa-fw"></i> <a href="javascript:void(0)"><strong>New bug submitted</strong></a>
                            </div>-->
                        </div>
                        <!-- END Sidebar Notifications -->
                    </div>
                    <!-- END Sidebar Content -->
                </div>
                <!-- END Wrapper for scrolling functionality -->
            </div>
            <!-- END Main Sidebar -->

            <!-- Main Container -->
            <div id="main-container">
                <!-- Header -->
                <!-- In the PHP version you can set the following options from inc/config.html file -->
                <!--
                    Available header.navbar classes:

                    'navbar-default'            for the default light header
                    'navbar-inverse'            for an alternative dark header

                    'navbar-fixed-top'          for a top fixed header (fixed sidebars with scroll will be auto initialized, functionality can be found in js/app.js - handleSidebar())
                        'header-fixed-top'      has to be added on #page-container only if the class 'navbar-fixed-top' was added

                    'navbar-fixed-bottom'       for a bottom fixed header (fixed sidebars with scroll will be auto initialized, functionality can be found in js/app.js - handleSidebar()))
                        'header-fixed-bottom'   has to be added on #page-container only if the class 'navbar-fixed-bottom' was added
                -->
                <header class="navbar navbar-default">
                    <!-- Left Header Navigation -->
                    <ul class="nav navbar-nav-custom">
                        <!-- Main Sidebar Toggle Button -->
                        <li>
                            <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar');">
                                <i class="fa fa-bars fa-fw"></i>
                            </a>
                        </li>
                      
                    </ul>
                    <ul class="nav navbar-nav-custom pull-right">
                        <!-- Alternative Sidebar Toggle Button -->
                        <!--<li>
                            <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar-alt', 'toggle-other');">
                                <i class="gi gi-share_alt"></i>
                                <span class="label label-primary label-indicator animation-floating">4</span>
                            </a>
                        </li>-->
                        <!-- END Alternative Sidebar Toggle Button -->

                        <!-- User Dropdown -->
                        <li class="dropdown">
                            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                                <?php echo $this->Html->image('placeholders/avatars/admin.jpg', array('alt' => 'avatar','class'=>'')); ?>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                                <li class="dropdown-header text-center">Account</li>
                                <li>
                                    <!--<a href="">
                                        <i class="fa fa-clock-o fa-fw pull-right"></i>
                                        <span class="badge pull-right">10</span>
                                        Updates
                                    </a>-->
                                    <a href="">
                                        <i class="fa fa-envelope-o fa-fw pull-right"></i>
                                        <span class="badge pull-right">5</span>
                                        Messages
                                    </a>
                                    <!--<a href=""><i class="fa fa-magnet fa-fw pull-right"></i>
                                        <span class="badge pull-right">3</span>
                                        Subscriptions
                                    </a>
                                    <a href=""><i class="fa fa-question fa-fw pull-right"></i>
                                        <span class="badge pull-right">11</span>
                                        FAQ
                                    </a>-->
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="">
                                        <i class="fa fa-user fa-fw pull-right"></i>
                                        Profile
                                    </a>
                                    <!-- Opens the user settings modal that can be found at the bottom of each page (page_footer.html in PHP version) -->
                                    <a href="#modal-user-settings" data-toggle="modal">
                                        <i class="fa fa-cog fa-fw pull-right"></i>
                                        Settings
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href=""><i class="fa fa-lock fa-fw pull-right"></i> Lock Account</a>
                                    <?php echo $this->Html->link('<i class="fa fa-ban fa-fw pull-right"></i>logout',array('controller'=>'Logins','action'=>'logout',),array( 'escape'=>false));?>
                                </li>
                               
                            </ul>
                        </li>
                        <!-- END User Dropdown -->
                    </ul>
                    
                    <?php echo $this->Form->create('Track',array('action'=>'index','type'=>'get','class'=>'navbar-form-custom','role'=>'search')); ?>
                    <div class="form-group">
                    <?php echo $this->Form->input('track_id',array('type'=>'text','label'=>false,'id'=>'top-search','class'=>'form-control','placeholder'=>'Search..')); ?>
                    </div>
                    <?php echo $this->Form->end(); ?>
                    <!-- END Left Header Navigation -->
<?php echo $this->Html->link('<strong>Best Standard Enterprise</strong>',array('controller'=>'Dashboards','action'=>'index',),array( 'escape'=>false,'class'=>'sidebar-brand'));?>
                    <!-- Search Form -->
              
                    <!--<form action="Invents" method="post" class="navbar-form-custom" role="search">
                        <div class="form-group">
                            <input type="text" id="top-search" name="top-search" class="form-control" placeholder="Search..">
                        </div>
                    </form>-->
                    <!-- END Search Form -->

                    <!-- Right Header Navigation -->
                    
                    <!-- END Right Header Navigation -->
                </header>
                <!-- END Header -->

                <!-- Page content -->
                <div id="page-content">
                    <!-- Dashboard Header -->
                    <!-- For an image header add the class 'content-header-media' and an image as in the following example -->
                    <div class="content-header content-header-media">
                        <div class="header-section">