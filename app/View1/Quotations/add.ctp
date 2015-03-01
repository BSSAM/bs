<script>var path_url='<?PHP echo Router::url('/',true); ?>';</script>
<script type="text/javascript">
     $(document).on('click','.append_file_upload',function(){
         $.ajax({
            type: 'POST',
            url: path_url+'Quotations/file_upload_form/',
            success: function(data)
            {
                $('.file_upload_form').append(data);
            }
            
        });
        });
    
 $(function(){
    $("#val_reg_date").datepicker("setDate", new Date());
    });
</script>
<h1>
                                <i class="gi gi-user"></i>Add Quotation
                            </h1>
                        </div>
                    </div>
                   
                    <ul class="breadcrumb breadcrumb-top">
                          <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
                        <li><?php echo $this->Html->link('Quotation',array('controller'=>'Quotations','action'=>'index')); ?></li>
                        <li>Add Quotation</li>
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
                                    <?php echo $this->Form->create('Quotation',array('class'=>'form-horizontal form-bordered','enctype'=>'multipart/form-data','id'=>'form-quotation-add')); ?>
                                    <?php echo $this->Form->input('Quotation.customer_id', array('type'=>'hidden','value'=>'')); ?>
                                    <?php echo $this->Form->input('Quotation.track_id', array('type'=>'hidden','value'=>$our_ref_no)); ?>
                                    <?php echo $this->Form->input('Quotation.quotation_id', array('type'=>'hidden','value'=>$quotationno)); ?>
                                    <?php echo $this->Form->input('Quotation.quo_device_count', array('type'=>'hidden','id'=>'quotation_device_count')); ?>
                                    <?php echo $this->Form->input('invoice_type', array('type'=>'hidden','id'=>'invoice_type_id','name'=>'invoice_type_id','value'=>'')); ?>
                                    <div class="panel-body panel-body-nopadding">
                                        <!-- BASIC WIZARD -->
                                        <div id="basicWizard" class="basic-wizard">
                                            <ul class="nav nav-pills nav-justified " data-toggle="tabs" id="tabs">
                                                <li class="active"><a href="#tab1" data-toggle="tab"><span>Step 1:</span> Quotation Info</a></li>
                                                <li class=""><a href="#tab2" data-toggle="tab"><span>Step 2:</span> Customer Special Needs</a></li>
                                                <li class=""><a href="#tab3" data-toggle="tab"><span>Step 3:</span> Description </a></li>
                                                <li class=""><a href="#tab4" data-toggle="tab"><span>Step 4:</span> File Upload</a></li>
                                            </ul>
                                            <div class="nav-pills-border-color"></div>
                                            <br><br>
                                            
                                            <div class="tab-content" >
                                                <div class="tab-pane active" id="tab1">
                                                    <?PHP echo $this->element('Quotations/quotation_info'); ?>
                                                </div>
                                                <div class="tab-pane" id="tab2">
                                                    <?PHP echo $this->element('Quotations/customer_special_needs'); ?>
                                                </div>
                                                <div class="tab-pane" id="tab3" ng-app ng-controller="Quotationcontroller">
                                                    <?PHP echo $this->element('Quotations/description'); ?>
                                                    <div class="form-group form-actions">
                                                        <div class="col-md-9 col-md-offset-10">
                                                            <?php echo $this->Form->button('<i class="fa fa-angle-right"></i> Submit', array('type' => 'submit', 'class' => 'btn btn-sm btn-primary', 'escape' => false)); ?>
                                                            <?php echo $this->Form->button('<i class="fa fa-repeat"></i> Reset', array('type' => 'reset', 'class' => 'btn btn-sm btn-warning', 'escape' => false)); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                               
                                                 <?php echo $this->Form->end(); ?>
                                                <div class="tab-pane" id="tab4">
                                                    <?PHP echo $this->element('Quotations/file_upload'); ?>
                                                </div>
                                                
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
        <script>
            $(function(){ 
                FormsValidation.init();
            });
            $( "#form-quotation-add" ).submit(function() {
                //alert('check');
                var a  = $('#Quo-ins > tbody > tr').length;
                if(a==1)
                {
                    alert('atleast one instrument is needed');
                    return false;
                }
                else{
                  return true;  
                }
                
//                if ($("#customer-contact-add").dataTable().fnSettings().aoData.length == 0)
//                {
//                    alert("Atleast One Contact Person is needed");
//                    $('#contact_name').focus();
//                    $('.name_error').addClass('animation-slideDown');
//                    $('.name_error').css('color','red');
//                    $('.name_error').show();
//                    return false;
//                }
//                else
//                {
//                     return true;
//                }
            });   
        </script>
         
                        
