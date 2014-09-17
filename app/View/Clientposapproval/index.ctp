
<h1>
    <i class="gi gi-user"></i>Client PO Approval Dashboard
</h1>
</div>
</div>
<ul class="breadcrumb breadcrumb-top">
    <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
    <li>Client PO Approval Dashboard</li>
</ul>
<!-- END Forms General Header -->
<?php echo $this->element('message');?>                        
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
            <div class="panel panel-default">
                <div class="panel-body panel-body-nopadding">
                    
                    <!-- BASIC WIZARD -->
                    <div id="basicWizard" class="basic-wizard">
                        
                        <ul class="nav nav-pills nav-justified " data-toggle="tabs" id="tabs">
                            <li class="active"><a href="#tab1" data-toggle="tab"><span></span> PO Ack Before DO</a></li>
                            <li class=""><a href="#tab2" data-toggle="tab"><span></span> PO Ack Before Invoice</a></li>
                       </ul>
                        <div class="nav-pills-border-color"></div>
                        <br><br>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab1">
                                <?PHP echo $this->element('Clientposapproval/pobeforedo'); ?>
                            </div>
                            
                            <div class="tab-pane" id="tab2">
                                <?PHP echo $this->element('Clientposapproval/pobeforeinvoice'); ?>
                                </div>
                            
                        </div><!-- panel-body -->
                </div>
                <!-- panel -->
            </div>
            
            <!-- END Basic Form Elements Block -->
        </div>
    </div>
    <!-- END Basic Form Elements Content -->
</div>
 

