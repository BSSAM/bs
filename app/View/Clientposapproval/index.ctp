
<h1>
    <i class="gi gi-user"></i>Clent Po Approval Dashboard
</h1>
</div>
</div>
<ul class="breadcrumb breadcrumb-top">
    <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
    <li>Clent Po Approval Dashboard</li>
</ul>
<!-- END Forms General Header -->
                        
<div class="row">
    <?php echo $this->Form->create('Customer',array('class'=>'form-horizontal form-bordered','id'=>'form-customer-add')); ?>
  
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
                                <?PHP //echo $this->element('Clientposapproval/pobeforeinvoice'); ?>
                            </div>
                        </div><!-- panel-body -->
                    <div class="form-group form-actions">
                        <div class="col-md-9 col-md-offset-10">
                                <?php  echo $this->Form->button('<i class="fa fa-angle-right"></i> Submit',array('type'=>'submit','class'=>'btn btn-sm btn-primary','escape' => false)); ?>
                                <?php echo $this->Form->button('<i class="fa fa-repeat"></i> Reset', array('type'=>'reset','class'=>'btn btn-sm btn-warning','escape' => false)); ?>
                                <!-- <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Submit</button>
                                <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Reset</button>-->
                        </div>
                    </div>
                </div>
                <!-- panel -->
            </div>
            
            <!-- END Basic Form Elements Block -->
        </div>
    </div>
    <?php echo $this->Form->end(); ?>
    <!-- END Basic Form Elements Content -->
</div>
 

