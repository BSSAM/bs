<script>
    var path_url='<?PHP echo Router::url('/',true); ?>';
    
</script>
<h1>
    <i class="gi gi-user"></i>Temperature
</h1>
</div>
</div>
<ul class="breadcrumb breadcrumb-top">
    <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
    <li><?php echo $this->Html->link('Temperature - Dashboard',array('controller'=>'Certificates','action'=>'temperature')); ?></li>
    
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
            <div class="panel panel-default">
                <div class="panel-body panel-body-nopadding">
                    
                    <!-- BASIC WIZARD -->
                    <div id="basicWizard" class="basic-wizard">
                        
                        <ul class="nav nav-pills nav-justified " data-toggle="tabs" id="tabs">
                            <li class="active"><a href="#tab1" data-toggle="tab"><span>Step 1:</span> Engineer</a></li>
                            <li class=""><a href="#tab2" data-toggle="tab"><span>Step 2:</span> Supervisor</a></li>
                            <li class=""><a href="#tab3" data-toggle="tab"><span>Step 3:</span> Manager</a></li>
                            <li class=""><a href="#tab4" data-toggle="tab"><span>Step 4:</span> Certification</a></li>
                       </ul>
                        <div class="nav-pills-border-color"></div>
                        <br><br>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab1">
                                <?PHP echo $this->element('Temperatures/eng'); ?>
                            </div>
                            <div class="tab-pane" id="tab2">
                                <?PHP echo $this->element('Temperatures/sup'); ?>
                            </div>
                            <div class="tab-pane" id="tab3">
                                <?PHP echo $this->element('Temperatures/man'); ?>
                            </div>
                            <div class="tab-pane" id="tab4">
                                <?PHP echo $this->element('Temperatures/cert'); ?>
                            </div>
                        </div><!-- panel-body -->
                    
                </div>
                <!-- panel -->
            </div>
            
            <!-- END Basic Form Elements Block -->
        </div>
    </div>
    <?php echo $this->Form->end(); ?>
    <!-- END Basic Form Elements Content -->
</div>
 
