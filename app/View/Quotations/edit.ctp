<script>
    var path_url='<?PHP echo Router::url('/',true); ?>';
</script>
<script type="text/javascript">
    $(function(){
        $("#val_customer").keyup(function() 
        { 
            var customer = $(this).val();
            var dataString = 'name='+ customer;
            if(customer!='')
            {
                $.ajax({
                type: "POST",
                url: "<?PHP echo Router::url('/',true); ?>/Quotations/search",
                data: dataString,
                cache: false,
                success: function(html)
                {
                    $("#result").html(html).show();
                }
                });
            }
            //return false;    
        });
    });
    function sync()
    {
      var n1 = document.getElementById('val_discount');
      var n2 = document.getElementById('val_discount1');
      n2.value = n1.value;
    }
    $(function(){
    $('#val_discount').change(function() {
        //alert('contract_disc');
        var disc   =   $(this).val();
        //var total   =   $('#unit_price').val();
        if(disc > <?php echo $ins_cost_user ?>)
        {
            $(this).parents(".col-md-4").find('.name_error_dis1').addClass('animation-slideDown');
            $(this).parents(".col-md-4").find('.name_error_dis1').css('color','red');
            $(this).parents(".col-md-4").find('.name_error_dis1').show();
            $(this).val('');
            return false;
        }
        else
        {
            $(this).parents(".col-md-4").find('.name_error_dis1').hide();
        }
    });
    });
</script>
<h1>
    <i class="gi gi-user"></i>Edit Quotation
</h1>
                        </div>
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                          <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
                        <li><?php echo $this->Html->link('Quotation',array('controller'=>'Quotations','action'=>'index')); ?></li>
                        <li>Edit Quotation</li>
                    </ul>
                    <!-- END Forms General Header -->

<div class="row">
                        <div class="col-md-12">
                            <?PHP echo $this->element('message'); ?>
                            <!-- Basic Form Elements Block -->
                            <div class="block">
                                <!-- Basic Form Elements Title -->
                                <div class="block-title clearfix">
                                    <h2 class="pull-right">Track Id:  <?PHP echo $our_ref_no; ?></h2>
                                </div>
                                <!-- END Form Elements Title -->
                                <!-- Basic Form Elements Content -->
                                <div class="panel panel-default">
                                    <?php echo $this->Form->create('Quotation',array('class'=>'form-horizontal form-bordered','id'=>'form-quotation-edit','enctype'=>'multipart/form-data')); ?>
                                    <?php echo $this->Form->input('Quotation.customer_id', array('type'=>'hidden','value'=>$quotations_list['Quotation']['customer_id'])); ?>
                                    <div class="panel-body panel-body-nopadding">
                                        
                                        <!-- BASIC WIZARD -->
                                        <div id="basicWizard" class="basic-wizard">
                                            <ul class="nav nav-pills nav-justified " data-toggle="tabs" id="tabs">
                                                <li class="active"><a href="#tab1" data-toggle="tab"><span>Step 1:</span> Quotation Info</a></li>
                                                <li class=""><a href="#tab2" data-toggle="tab"><span>Step 2:</span> Customer Special Needs</a></li>
                                                <li class=""><a href="#tab3" data-toggle="tab"><span>Step 3:</span>Description</a></li>
                                                 <li class=""><a href="#tab4" data-toggle="tab"><span>Step 4:</span>Uploaded Files</a></li>
                                            </ul>
                                            <div class="nav-pills-border-color"></div>
                                            <br><br>
                                            
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="tab1">
                                                    <?PHP echo $this->element('Quotations/edit/quotation_info'); ?>
                                                </div>
                                                <div class="tab-pane" id="tab2">
                                                    <?PHP echo $this->element('Quotations/edit/customer_special_needs'); ?>
                                                </div>
                                                <div class="tab-pane" id="tab3" ng-app ng-controller="Quotationcontroller">
                                                    <?PHP echo $this->element('Quotations/edit/description'); ?>
                                                    <div class="form-group form-actions">
                                                        <?php if($user_role['app_quotation']['view'] == 1 && $quotations_list['Quotation']['is_approved']==0): ?>
                                                        <div class="col-md-9 col-md-offset-9">
                                                            
                                                            <?php  echo $this->Form->button('<i class="fa fa-angle-right"></i> Approve',array('type'=>'button','class'=>'btn btn-sm btn-danger approve_quotation','escape' => false)); ?>
                                                            <?php  echo $this->Form->button('<i class="fa fa-angle-right"></i> Update',array('type'=>'submit','class'=>'btn btn-sm btn-primary','escape' => false)); ?>
                                                            <?php echo $this->Html->link('<i class="fa fa-angle-left"></i> Cancel',array('controller'=>'Quotations','action'=>'index'), array('class'=>'btn btn-sm btn-warning','escape' => false)); ?>
                                                            <?php else : ?>
                                                            <div class="col-md-9 col-md-offset-10">
                                                            <?php  echo $this->Form->button('<i class="fa fa-angle-right"></i> Update',array('type'=>'submit','class'=>'btn btn-sm btn-primary','escape' => false)); ?>
                                                            <?php echo $this->Html->link('<i class="fa fa-angle-left"></i> Cancel',array('controller'=>'Quotations','action'=>'index'), array('class'=>'btn btn-sm btn-warning','escape' => false)); ?>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="tab4">
                                                     <?PHP echo $this->element('Quotations/edit/file_upload'); ?>
                                                </div>
                                            </div><!-- tab-content -->
                                            <!-- #basicWizard -->
                                        </div><!-- panel-body -->
                                        
                                        
                                    </div>
                                    <!-- panel -->
                                    <?php echo $this->Form->end(); ?>
                                </div>
                                    
                                <!-- END Basic Form Elements Content -->
                            </div>
                            <!-- END Basic Form Elements Block -->
                        </div>
    <?php echo $this->Html->script('pages/formsValidation'); ?>
        <script>$(function(){ FormsValidation.init(); });</script>
         <?php echo $this->Html->script('pages/uiProgress'); ?>
                            <script>$(function(){ UiProgress.init(); });</script>
                                
                               
                        
                        
