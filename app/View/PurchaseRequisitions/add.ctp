<script>var path_url='<?PHP echo Router::url('/',true); ?>';</script>
<script type="text/javascript">
 $(function(){
$("#val_reg_date").datepicker("setDate", new Date());
});
</script>
<h1>
                                <i class="gi gi-user"></i>Add Purchase Requistion
                            </h1>
                        </div>
                    </div>
                   
                    <ul class="breadcrumb breadcrumb-top">
                          <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
                        <li><?php echo $this->Html->link('Purchase Requistion',array('controller'=>'PurchaseRequisitions','action'=>'index','id'=>'form-puchasereq-add')); ?></li>
                        <li>Add Purchase Requistion</li>
                    </ul>
                    <!-- END Forms General Header -->

                <div class="row">
                        <div class="col-md-12">
                            <!-- Basic Form Elements Block -->
                            <div class="block">
                                <!-- Basic Form Elements Title -->
                                <div class="block-title clearfix">
                                    <h2 class="pull-right">Track Id:  <?PHP echo $our_ref_no; ?></h2>
                                </div>
                                <!-- END Form Elements Title -->
                                <!-- Basic Form Elements Content -->
                                 <div class="panel panel-default">
                                    <?php echo $this->Form->create('PurchaseRequisition',array('class'=>'form-horizontal form-bordered','enctype'=>'multipart/form-data','id'=>'form-quotation-add')); ?>
                                    <?php echo $this->Form->input('PurchaseRequisition.customer_id', array('type'=>'hidden','value'=>'')); ?>
                                    <?php echo $this->Form->input('PurchaseRequisition.track_id', array('type'=>'hidden','value'=>$our_ref_no)); ?>
                                    <?php echo $this->Form->input('PurchaseRequisition.prequistionno_id', array('type'=>'hidden','value'=>$prequistionno)); ?>
                                    <?php echo $this->Form->input('PurchaseRequisition.quo_device_count', array('type'=>'hidden','id'=>'quotation_device_count')); ?>
                                    <div class="panel-body panel-body-nopadding">

                                          <!-- BASIC WIZARD -->
                                        <div id="basicWizard" class="basic-wizard">
                                            <ul class="nav nav-pills nav-justified " data-toggle="tabs" id="tabs">
                                                <li class="active"><a href="#tab1" data-toggle="tab"><span>Step 1:</span> Purchase Requistion Info</a></li>
                                                <li class=""><a href="#tab2" data-toggle="tab"><span>Step 2:</span> Customer Special Needs</a></li>
                                                <li class=""><a href="#tab3" data-toggle="tab"><span>Step 3:</span> Description </a></li>
                                            </ul>
                                            <div class="nav-pills-border-color"></div>
                                            <br><br>
                                            
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="tab1">
                                                    <?PHP echo $this->element('PurchaseRequisitions/purchase_requisition_info'); ?>
                                                </div>
                                                <div class="tab-pane" id="tab2">
                                                    <?PHP echo $this->element('PurchaseRequisitions/customer_special_needs'); ?>
                                                </div>
                                                <div class="tab-pane" id="tab3">
                                                    <?PHP echo $this->element('PurchaseRequisitions/description'); ?>
                                                    <div class="form-group form-actions">
                                                        <div class="col-md-9 col-md-offset-10">
                                                            <?php echo $this->Form->button('<i class="fa fa-angle-right"></i> Submit', array('type' => 'submit', 'class' => 'btn btn-sm btn-primary', 'escape' => false)); ?>
                                                            <?php echo $this->Form->button('<i class="fa fa-repeat"></i> Reset', array('type' => 'reset', 'class' => 'btn btn-sm btn-warning', 'escape' => false)); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                 <?php echo $this->Form->end(); ?>
                                            </div><!-- tab-content -->
                                            <!-- #basicWizard -->
                                        </div><!-- panel-body -->
                                    </div>
                                    <!-- panel -->
                                </div>
                                <!-- END Basic Form Elements Content -->
                            </div>
                            <!-- END Basic Form Elements Block -->
                        </div>
    <?php echo $this->Html->script('pages/formsValidation'); ?>
        <script>$(function(){ FormsValidation.init(); });</script>
         <?php echo $this->Html->script('pages/uiProgress'); ?>
                            <script>$(function(){ UiProgress.init(); });</script>
                                
                               
                        
                        
