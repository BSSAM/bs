<script>var path_url='<?PHP echo Router::url('/',true); ?>';</script>
<script type="text/javascript">
$(function(){
        $("#val_reg_date").datepicker("setDate", new Date());
        $("#val_in_date").datepicker("setDate", new Date());
        var dateMin = $('#val_in_date').datepicker('getDate');   
        var addDays = new Date();
        addDays.setDate(addDays.getDate() + 4);
        $("#val_out_date").datepicker("setDate",addDays);
        });
</script>
<h1>
                           
                                <i class="gi gi-user"></i>Add PR_Purchase  Order
                            </h1>
                        </div>
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                        <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
                        <li><?php echo $this->Html->link('PR_Purchase orders',array('controller'=>'Reqpurchaseorders','action'=>'index')); ?></li>
                        <li>Add PR_Purchase  Order</li>
                    </ul>
                    <!-- END Forms General Header -->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Basic Form Elements Block -->
                            <div class="block">
                                <!-- Basic Form Elements Title -->
                                <div class="block-title clearfix">
                                    <h2 class="pull-right">
                                        Track Id    : <?PHP echo $this->request->data['Reqpurchaseorder']['track_id']; ?>
                                    </h2>
                                </div>
                                <!-- END Form Elements Title -->
                                <!-- Basic Form Elements Content -->
                                <div class="panel panel-default">
                                    <?php echo $this->Form->create('Reqpurchaseorder',array('class'=>'form-horizontal form-bordered','id'=>'form-salesorder-add','controller'=>'Reqpurchaseorders','action'=>'edit')); ?>
                                    <?php echo $this->Form->input('Reqpurchaseorder.customer_id', array('type'=>'hidden')); ?>
                                     
                                    <div class="panel-body panel-body-nopadding">
                                        <!-- BASIC WIZARD -->
                                        <div id="basicWizard" class="basic-wizard">
                                            <ul class="nav nav-pills nav-justified " data-toggle="tabs" id="tabs">
                                                <li class="active"><a href="#tab1" data-toggle="tab"><span>Step 1:</span>Purchase Requisition Info</a></li>
                                                <li class=""><a href="#tab2" data-toggle="tab"><span>Step 2:</span> Customer Special Needs and Tag ID</a></li>
                                                <li class=""><a href="#tab3" data-toggle="tab"><span>Step 3:</span> Description </a></li>
                                            </ul>
                                            <div class="nav-pills-border-color"></div>
                                            <br><br>
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="tab1">
                                                    <?PHP echo $this->element('Reqpurchaseorders/edit/purchase_requisition_info'); ?>
                                                </div>
                                                <div class="tab-pane" id="tab2">
                                                    <?PHP echo $this->element('Reqpurchaseorders/edit/customer_special_needs'); ?>
                                                </div>
                                                <div class="tab-pane" id="tab3">
                                                    <?PHP echo $this->element('Reqpurchaseorders/edit/description'); ?>
                                                    <div class="form-group form-actions">
                                                        <div class="col-md-9 col-md-offset-10">
                                                            <?php echo $this->Form->input('Reqpurchaseorder.id', array('name'=>'prpur_id','id'=>'prpur_id','type'=>'hidden','value'=>$requistion_details['Reqpurchaseorder']['id'])); ?>
                                                            <?php if($user_role['job_prpurchaseorder']['edit'] == 1 && $requistion_details['Reqpurchaseorder']['is_approved']==0): ?>
                                                            <?php // if($user_role['app_prpurchaseorder']['view'] == 1){ ?>
                                                            <?php  echo $this->Form->button('<i class="fa fa-angle-right"></i> <b>Approve</b>',array('type'=>'button','class'=>'btn btn-sm btn-danger approve_prpur','escape' => false)); ?>
                                                            <?php //} else {?>
                                                            <?php // echo $this->Form->button('<i class="fa fa-angle-right"></i> Update',array('type'=>'submit','class'=>'btn btn-sm btn-primary','escape' => false)); ?>
                                                            <?php //} ?>

                                                            <?php else : ?>
                                                            <?php  echo $this->Form->button('<i class="fa fa-angle-right"></i> Update',array('type'=>'submit','class'=>'btn btn-sm btn-primary','escape' => false)); ?>
                                                            <?php echo $this->Html->link('<i class="fa fa-angle-left"></i> Cancel',array('controller'=>'Reqpurchaseorders','action'=>'index'), array('class'=>'btn btn-sm btn-warning','escape' => false)); ?>
                                                            <?php endif; ?>
                                                            
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
         
                                
                               
                        
                        
