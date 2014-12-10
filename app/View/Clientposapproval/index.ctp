
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
                                <?PHP //echo $this->element('Clientposapproval/pobeforedo'); ?>
                            
                            <div class="tabbable tabs-left">
                                <ul class="nav nav-tabs nav-pills-border-color nav-justified">
                                    <li class="active"><a href="#tab3" data-toggle="tab">Salesorder Full Invoice</a></li>
                                    <li><a href="#tab4" data-toggle="tab">PO Full Invoice</a></li>
                                    <li><a href="#tab5" data-toggle="tab">Quotation Full Invoice</a></li>
                                    <li><a href="#tab6" data-toggle="tab">DO Full Invoice</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab3"><br><br>
                                       <?PHP echo $this->element('Clientposapproval/pobeforedo-sales'); ?>
                                    </div>
                                    <div class="tab-pane" id="tab4"><br><br>
                                      <?PHP echo $this->element('Clientposapproval/pobeforedo-po'); ?>
                                    </div>
                                     <div class="tab-pane" id="tab5"><br><br>
                                      <?PHP echo $this->element('Clientposapproval/pobeforedo-quo'); ?>
                                    </div>
                                     <div class="tab-pane" id="tab6"><br><br>
                                      <?PHP echo $this->element('Clientposapproval/pobeforedo-do'); ?>
                                    </div>
                                </div>
                            </div>
                                  
                                
                            </div>
                            
                            <div class="tab-pane" id="tab2">
                            
                            <div class="tabbable tabs-left">
                                <ul class="nav nav-tabs nav-pills-border-color nav-justified">
                                    <li class="active"><a href="#tab7" data-toggle="tab">Salesorder Full Invoice</a></li>
                                    <li><a href="#tab8" data-toggle="tab">PO Full Invoice</a></li>
                                    <li><a href="#tab9" data-toggle="tab">Quotation Full Invoice</a></li>
                                    <li><a href="#tab10" data-toggle="tab">DO Full Invoice</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab7"><br><br>
                                       <?PHP echo $this->element('Clientposapproval/pobeforein-sales'); ?>
                                    </div>
                                    <div class="tab-pane" id="tab8"><br><br>
                                      <?PHP echo $this->element('Clientposapproval/pobeforein-po'); ?>
                                    </div>
                                     <div class="tab-pane" id="tab9"><br><br>
                                      <?PHP echo $this->element('Clientposapproval/pobeforein-quo'); ?>
                                    </div>
                                     <div class="tab-pane" id="tab10"><br><br>
                                      <?PHP echo $this->element('Clientposapproval/pobeforein-do'); ?>
                                    </div>
                                </div>
                            </div>
                                
                                
                                <?PHP //echo $this->element('Clientposapproval/pobeforeinvoice'); ?>
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
 

