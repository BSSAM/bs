<script>
    var path_url='<?PHP echo Router::url('/',true); ?>';
</script>
<style>
    .show
	{
		padding:10px; 
		border-bottom:1px #999 dashed;
		font-size:15px; 
		height:50px;
                float: top;
	}
	.show:hover
	{
		background:#4c66a4;
		color:#FFF;
		cursor:pointer;
	}
        #result{
            position: absolute;
            z-index: 999;
        }
    </style>
<script type="text/javascript">
    
$(function(){
$("#val_customer").keyup(function() 
{ 
//alert();    
var customer = $(this).val();
var dataString = 'name='+ customer;
if(customer!='')
{
	$.ajax({
	type: "POST",
	url: "<?PHP echo Router::url('/',true); ?>Salesorders/search",
	data: dataString,
	cache: false,
	success: function(html)
	{
            $("#result").html(html).show();
	}
	});
        }return false;    
        });
        $("#val_reg_date").datepicker("setDate", new Date());
        $("#val_in_date").datepicker("setDate", new Date());
        var dateMin = $('#val_in_date').datepicker('getDate');   
        var addDays = new Date();
        addDays.setDate(addDays.getDate() + 4);
        $("#val_out_date").datepicker("setDate",addDays);

        });


</script>
<h1>
                           
                                <i class="gi gi-user"></i>Add Sales Order
                            </h1>
                        </div>
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                        <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
                        <li><?php echo $this->Html->link('Salesorders',array('controller'=>'Salesorders','action'=>'index')); ?></li>
                        <li>Add Sales Orders</li>
                    </ul>
                    <!-- END Forms General Header -->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Basic Form Elements Block -->
                            <div class="block">
                                <!-- Basic Form Elements Title -->
                                <div class="block-title clearfix">
                                    <h2 class="pull-right">
                                        Track Id    : <?PHP echo $this->request->data['Salesorder']['track_id']; ?>
                                    </h2>
                                </div>
                                <!-- END Form Elements Title -->
                                <!-- Basic Form Elements Content -->
                                <div class="panel panel-default">
                                   
                                    <?php echo $this->Form->create('Salesorder',array('class'=>'form-horizontal form-bordered','id'=>'form-salesorder-add','controller'=>'Salesorder','action'=>'add')); ?>
                                    <?php echo $this->Form->input('Salesorder.customer_id', array('type'=>'hidden')); ?>
                                    <?PHP if(!empty($sale['Salesorder']['track_id'])): ?>
                                    <?php echo $this->Form->input('Salesorder.track_id', array('type'=>'hidden')); ?>
                                    <?php echo $this->Form->input('Salesorder.quotationno', array('type'=>'hidden')); ?>
                                    <?php echo $this->Form->input('Salesorder.quotation_id', array('type'=>'hidden')); ?>
                                    <?php echo $this->Form->input('device_status', array('type'=>'hidden','value'=>$status_id)); ?>
                                    <?PHP endif; ?>
                                    <div class="panel-body panel-body-nopadding">
                                        <!-- BASIC WIZARD -->
                                        <div id="basicWizard" class="basic-wizard">
                                            <ul class="nav nav-pills nav-justified " data-toggle="tabs" id="tabs">
                                                <li class="active"><a href="#tab1" data-toggle="tab"><span>Step 1:</span> Sales Order Info</a></li>
                                                <li class=""><a href="#tab2" data-toggle="tab"><span>Step 2:</span> Customer Special Needs</a></li>
                                                <li class=""><a href="#tab4" data-toggle="tab"><span>Step 3:</span> Description </a></li>
                                            </ul>
                                            <div class="nav-pills-border-color"></div>
                                            <br><br>
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="tab1">
                                                    <?PHP echo $this->element('Salesorders/salesorder_info'); ?>
                                                </div>
                                                 <div class="tab-pane" id="tab2">
                                                    <?PHP echo $this->element('Salesorders/customer_special_needs'); ?>
                                                </div>
                                                <div class="tab-pane" id="tab4">
                                                    <?PHP echo $this->element('Salesorders/description'); ?>
                                                </div>
                                            </div><!-- tab-content -->
                                            <!-- #basicWizard -->
                                        </div><!-- panel-body -->
                                        <div class="form-group form-actions">
                                            <div class="col-md-9 col-md-offset-10">
                                            <?php  echo $this->Form->button('<i class="fa fa-angle-right"></i> Submit',array('type'=>'submit','class'=>'btn btn-sm btn-primary sales_submit')); ?>
                                            <?php echo $this->Form->button('<i class="fa fa-repeat"></i> Reset', array('type'=>'reset','class'=>'btn btn-sm btn-warning','escape' => false)); ?>
                                            </div>
                                        </div>
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
                                
                               
                        
                        
