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
                                    <li <?php echo $a=($control == 'Users')?'class=active':''; ?>>
                                         <?php echo $this->Html->link('Users',array('controller'=>'Users','action'=>'index')); ?>
                                    </li>
                                    <li <?php echo $a=($control == 'Userroles')?'class=active':''; ?>>
                                         <?php echo $this->Html->link('User Roles',array('controller'=>'Userroles','action'=>'index')); ?>
                                    </li>
                                    <?php if($user_role['other_branch']['view'] == 1){ ?>
                                    <li <?php echo $a=($control == 'Branches')?'class=active':''; ?>>
                                        <?php echo $this->Html->link('Branch',array('controller'=>'Branches','action'=>'index')); ?>
                                    </li><?php } ?>
                                    <li <?php echo $a=($control == 'Departments')?'class=active':''; ?>>
                                        <?php echo $this->Html->link('Department',array('controller'=>'Departments','action'=>'index')); ?>
                                    </li>
                                    <li <?php echo $a=($control == 'Countries')?'class=active':''; ?>>
                                        <?php echo $this->Html->link('Country',array('controller'=>'Countries','action'=>'index')); ?>
                                    </li>
                                    <li <?php echo $a=($control == 'Currencies')?'class=active':''; ?>>
                                        <?php echo $this->Html->link('Currency',array('controller'=>'Currencies','action'=>'index')); ?>
                                    </li>
                                    <li <?php echo $a=($control == 'Assigns')?'class=active':''; ?>>
                                        <?php echo $this->Html->link('Assigned To',array('controller'=>'Assigns','action'=>'index')); ?>
                                    </li>
                                    <li <?php echo $a=($control == 'Services')?'class=active':''; ?>>
                                        <?php echo $this->Html->link('Service Type',array('controller'=>'Services','action'=>'index')); ?>
                                    </li>
                                    <li <?php echo $a=($control == 'Additionalcharges')?'class=active':''; ?>>
                                        <?php echo $this->Html->link('Additional Charges',array('controller'=>'Additionalcharges','action'=>'index')); ?>
                                    </li>
                                    <li <?php echo $a=($control == 'Tallyledgers')?'class=active':''; ?>>
                                        <?php echo $this->Html->link('Tally Ledger Account',array('controller'=>'Tallyledgers','action'=>'index')); ?>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="" class="sidebar-nav-menu <?php echo $a=($control == 'Industries'||$control == 'Locations'||$control == 'Paymentterms'||$control == 'Priorities'|| $control == 'Customers'||$control == 'Referedbys'||$control == 'Salespersons')?'open':''; ?>"><i class="fa fa-angle-left sidebar-nav-indicator"></i><i class="gi gi-group sidebar-nav-icon"></i>Customers</a>
                                 <ul <?php echo $a=($control == 'Industries'||$control == 'Locations'||$control == 'Paymentterms'||$control == 'Priorities'|| $control == 'Customers'||$control == 'Referedbys'||$control == 'Salespersons')?'style=display:block':'';?>>
                                    <li <?php echo $a=($control == 'Customers')?'class=active':''; ?>>
                                        <?php echo $this->Html->link('Customers',array('controller'=>'Customers','action'=>'index')); ?>
                                    </li>
                                    <li <?php echo $a=($control == 'Industries')?'class=active':''; ?>>
                                         <?php echo $this->Html->link('Industry',array('controller'=>'Industries','action'=>'index')); ?>
                                    </li>
                                    <li <?php echo $a=($control == 'Locations')?'class=active':''; ?>>
                                        <?php echo $this->Html->link('Location',array('controller'=>'Locations','action'=>'index')); ?>
                                    </li>
                                    <li <?php echo $a=($control == 'Paymentterms')?'class=active':''; ?>>
                                        <?php echo $this->Html->link('Payment Terms',array('controller'=>'Paymentterms','action'=>'index')); ?>
                                    </li>
                                    <li <?php echo $a=($control == 'Priorities')?'class=active':''; ?>>
                                        <?php echo $this->Html->link('Priority',array('controller'=>'Priorities','action'=>'index')); ?>
                                    </li>
                                    <li <?php echo $a=($control == 'Referedbys')?'class=active':''; ?>>
                                        <?php echo $this->Html->link('Referred By',array('controller'=>'Referedbys','action'=>'index')); ?>
                                    </li>
                                    <li <?php echo $a=($control == 'Salespersons')?'class=active':''; ?>>
                                        <?php echo $this->Html->link('Sales Person',array('controller'=>'Salespersons','action'=>'index')); ?>
                                    </li>
                                    <li <?php echo $a=($control == 'Users')?'class=active':''; ?>>
                                        <a href="#"><?php echo 'Title'; ?></a>
                                    </li>
                                   
                                </ul>
                            </li>
                            <li>
                                <a href="" class="sidebar-nav-menu <?php echo $a=($control == 'Instruments'||$control == 'procedures'||$control == 'Brands'||$control == 'Ranges'||$control=='Units')?'open':''; ?>"><i class="fa fa-angle-left sidebar-nav-indicator"></i><i class="gi gi-ruller sidebar-nav-icon"></i>Instruments</a>
                                 <ul <?php echo $a=($control == 'Instruments'||$control == 'procedures'||$control == 'Brands'||$control == 'Ranges'|| $control == 'Units')?'style=display:block':'';?> >
                                    <li <?php echo $a=($control == 'Instruments')?'class=active':''; ?>>
                                        <?PHP echo $this->Html->link('Instrument',array('controller'=>'Instruments','action'=>'index')); ?>
                                          
                                    </li>
                                    <li <?php echo $a=($control == 'procedures')?'class=active':''; ?>>
                                        <?PHP echo $this->Html->link('Procedure No',array('controller'=>'procedures','action'=>'index')); ?>
                                    </li>
                                    <li <?php echo $a=($control == 'Brands')?'class=active':''; ?>>
                                        <?PHP echo $this->Html->link('Brand',array('controller'=>'Brands','action'=>'index')); ?>
                                    </li>
                                    <li>
                                         <a href="#"><?php echo 'Instrument'; ?></a>
                                    </li>
                                    <li>
                                         <a href="#"><?php echo 'Instrument for Group'; ?></a>
                                    </li>
                                    <li <?php echo $a=($control == 'Ranges')?'class=active':''; ?>>
                                        <?PHP echo $this->Html->link('Range',array('controller'=>'Ranges','action'=>'index')); ?>
                                          
                                    </li>
                                    <li>
                                         <a href="#"><?php echo 'Title'; ?></a>
                                    </li>
                                    <li <?php echo $a=($control == 'Units')?'class=active':''; ?>>
                                        <?PHP echo $this->Html->link('Unit',array('controller'=>'Units','action'=>'index')); ?>
                                          
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator"></i><i class="gi gi-settings sidebar-nav-icon"></i>Settings</a>
                                 <ul>
                                    <li>
                                          <a href="#"><?php echo 'C & D Settings'; ?></a>
                                    </li>
                                    <li>
                                          <a href="#"><?php echo 'Onsite Email Settings'; ?></a>
                                    </li>
                                    <li>
                                         <a href="#"><?php echo 'Recall Service Settings'; ?></a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator"></i><i class="gi gi-vector_path_line sidebar-nav-icon"></i>Dimentional</a>
                                 <ul>
                                   
                                </ul>
                            </li>
                             <li>
                                <a href="" class="sidebar-nav-menu <?php echo $a=($control == 'Quotations'||$control == 'Salesorders'||$control == 'Deliveryorders')?'open':''; ?>"><i class="fa fa-angle-left sidebar-nav-indicator"></i><i class="gi gi-server sidebar-nav-icon"></i>Jobs</a>
                                 <ul <?php echo $a=($control == 'Quotations'||$control == 'Salesorders'||$control == 'Deliveryorders')?'style=display:block':'';?>>
                                    <li <?php echo $a=($control == 'Quotations')?'class=active':''; ?>>
                                         <?php echo $this->Html->link('Quotation',array('controller'=>'Quotations','action'=>'index')); ?>
                                    </li>  
                                    <li>
                                          <a href="#"><?php echo 'Purchase Order'; ?></a>
                                    </li>
                                    <li <?php echo $a=($control == 'Salesorders')?'class=active':''; ?>>
                                         <?php echo $this->Html->link('Sales Order',array('controller'=>'Salesorders','action'=>'index')); ?>
                                    </li>  
                                    <li>
                                          <a href="#"><?php echo 'Lab Process'; ?></a>
                                    </li>
                                    <li>
                                          <a href="#"><?php echo 'Sub Contract DO'; ?></a>
                                    </li>
                                    <li>
                                          <a href="#"><?php echo 'Job Monitoring'; ?></a>
                                    </li>
                                    <li>
                                          <a href="#"><?php echo 'Proforma Invoice'; ?></a>
                                    </li>
                                    <li>
                                          <a href="#"><?php echo 'Invoice'; ?></a>
                                    </li>
                                     <li>
                                          <a href="#"><?php echo 'C and D Info'; ?></a>
                                    </li>
                                    <li <?php echo $a=($control == 'Deliveryorders')?'class=active':''; ?>>
                                         <?php echo $this->Html->link('Delivery Order',array('controller'=>'Deliveryorders','action'=>'index')); ?>
                                    </li>  
                                    
                                     <li>
                                          <a href="#"><?php echo 'Tracking System'; ?></a>
                                    </li>
                                     <li>
                                          <a href="#"><?php echo 'Job Transaction'; ?></a>
                                    </li>
                                    <li>
                                          <a href="#"><?php echo 'Purchase Requisition'; ?></a>
                                    </li>
                                    <li>
                                          <a href="#"><?php echo 'PR_Purchase Order'; ?></a>
                                    </li>
                                    <li>
                                          <a href="#"><?php echo 'Debt Chase'; ?></a>
                                    </li>
                                    <li>
                                          <a href="#"><?php echo 'OnSite Schedule'; ?></a>
                                    </li>
                                    <li>
                                          <a href="#"><?php echo 'Recall Service'; ?></a>
                                    </li>
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
                    
                    <?php echo $this->Form->create('Invents',array('action'=>'index','class'=>'navbar-form-custom','role'=>'search')); ?>
                    <div class="form-group">
                    <?php echo $this->Form->input('',array('type'=>'text','label'=>false,'id'=>'top-search','name'=>'top-search','class'=>'form-control','placeholder'=>'Search..')); ?>
                    </div>
                    <?php echo $this->Form->end(); ?>
                    <!-- END Left Header Navigation -->
<?php echo $this->Html->link('<strong>Best</strong> Standards',array('controller'=>'Dashboards','action'=>'index',),array( 'escape'=>false,'class'=>'sidebar-brand'));?>
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