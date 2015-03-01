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
    $(document).on('change','#val_priority',function(){
//        $(this).addClass('instrument_select');
//        var instrument_id =   $('ul.chosen-results').find('.instrument_select').attr('data-option-array-index');
//        var instrument_name=   $('ul.chosen-results').find('.instrument_select').text();
//        $('#ins_id').val(instrument_id);
//        $('#ins_name').val(instrument_name);
        var priority_id   =   $(this).val();
        
        $.ajax({
		type: 'POST',
                data:"priority_id="+priority_id,
		url: path_url+'Salesorders/dates_sales/',
                success:function(data){
                    var data = parseInt(data);
                    //console.log(data);
                    // $("#val_reg_date").datepicker("setDate", new Date());
                    //$('#val_in_date').datepicker("setDate", new Date());
                    var dateMin = $('#val_in_date').datepicker('getDate');   
                   // alert(dateMin.getDate());//return false;
                    
                    var addDays = new Date();
                    addDays.setDate(dateMin.getDate() + data);
                    $("#val_out_date").datepicker("setDate",addDays);
                    //$('#range_array').empty().append(data);
                }
            });
    });
    });
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
});});
</script>
<h1>
                                <i class="gi gi-user"></i>Edit Sales Order
                            </h1>
                        </div>
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                          <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
                        <li><?php echo $this->Html->link('Salesorders',array('controller'=>'Salesorders','action'=>'index')); ?></li>
                        <li>Edit Sales Order</li>
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
                                    <?php echo $this->Form->create('Salesorder',array('class'=>'form-horizontal form-bordered','id'=>'form-salesorder-add')); ?>
                                    <?php echo $this->Form->input('Salesorder.customer_id', array('type'=>'hidden','value'=>$salesorder['Salesorder']['customer_id'])); ?>
                                    <div class="panel-body panel-body-nopadding">
                                        
                                        <!-- BASIC WIZARD -->
                                        <div id="basicWizard" class="basic-wizard">
                                            <ul class="nav nav-pills nav-justified " data-toggle="tabs" id="tabs">
                                                <li class="active"><a href="#tab1" data-toggle="tab"><span>Step 1:</span> Sales Order Info</a></li>
                                                <li class=""><a href="#tab2" data-toggle="tab"><span>Step 2:</span> Customer Special Needs</a></li>
                                                <li class=""><a href="#tab3" data-toggle="tab"><span>Step 3:</span> Instrument </a></li>
                                                <li class=""><a href="#tab4" data-toggle="tab"><span>Step 4:</span> Uploaded Files </a></li>
                                            </ul>
                                            <div class="nav-pills-border-color"></div>
                                            <br><br>
                                            
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="tab1">
                                                    <?PHP echo $this->element('Salesorders/edit/salesorder_info'); ?>
                                                </div>
                                                 <div class="tab-pane" id="tab2">
                                                    <?PHP echo $this->element('Salesorders/edit/customer_special_needs'); ?>
                                                </div>
                                                <div class="tab-pane" id="tab3" ng-app ng-controller="Salesordercontroller">
                                                    <?PHP echo $this->element('Salesorders/edit/description'); ?>
                                                    <div class="form-group form-actions">
                                                        <div class="col-md-9 col-md-offset-9">
                                                            <?php if ($user_role['app_salesorder']['add'] == 1 && $salesorder['Salesorder']['is_approved'] == 0): ?>
                                                                <?php echo $this->Form->button('<i class="fa fa-angle-right"></i> Approve', array('type' => 'button', 'class' => 'btn btn-sm btn-danger approve_salesorder', 'escape' => false)); ?>
                                                                <?php echo $this->Form->button('<i class="fa fa-angle-right"></i> Update', array('type' => 'submit', 'class' => 'btn btn-sm btn-primary', 'escape' => false)); ?>
                                                                <?php echo $this->Html->link('<i class="fa fa-repeat"></i> Cancel', array('controller' => 'Salesorders', 'action' => 'index'), array('class' => 'btn btn-sm btn-warning', 'escape' => false)); ?>
                                                            <?php else : ?>
                                                                <?php echo $this->Form->button('<i class="fa fa-angle-right"></i> Update', array('type' => 'submit', 'class' => 'btn btn-sm btn-primary', 'escape' => false)); ?>
                                                                <?php echo $this->Html->link('<i class="fa fa-repeat"></i> Cancel', array('controller' => 'Salesorders', 'action' => 'index'), array('class' => 'btn btn-sm btn-warning', 'escape' => false)); ?>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php echo $this->Form->end(); ?>
                                                <div class="tab-pane" id="tab4">
                                                    <?PHP echo $this->element('Salesorders/edit/file_upload'); ?>
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
    <script>$(function(){ FormsValidation.init(); });</script>
    <?php echo $this->Html->script('pages/uiProgress'); ?>
    <script>$(function(){ UiProgress.init(); });</script>
                                
                               
                        
                        
