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
});});
</script>
<h1>
                                <i class="gi gi-user"></i>Edit Delivery Order
                            </h1>
                        </div>
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                          <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
                        <li><?php echo $this->Html->link('Delivery orders',array('controller'=>'deliveryorders','action'=>'index')); ?></li>
                        <li>Edit Delivery Order</li>
                    </ul>
                    <!-- END Forms General Header -->
<div class="row">
                        <div class="col-md-12">
                            <!-- Basic Form Elements Block -->
                            <div class="block">
                                <!-- Basic Form Elements Title -->
                                <div class="block-title clearfix">
                                    
                                    <h2 class="pull-right ">
                                       Track Id : <?PHP echo $this->request->data['Deliveryorder']['our_reference_no']; ?>
                                    </h2>
                                </div>
                                <!-- END Form Elements Title -->

                                <!-- Basic Form Elements Content -->
                                 
                                <div class="panel panel-default">
                                    <?php echo $this->Form->create('Deliveryorder',array('class'=>'form-horizontal form-bordered','id'=>'form-salesorder-add')); ?>
                                    <?php echo $this->Form->input('Deliveryorder.customer_id', array('type'=>'hidden','value'=>$deliveryorder['Deliveryorder']['customer_id'])); ?>
                                    <?php echo $this->Form->input('Deliveryorder.salesorder_id', array('type'=>'hidden','value'=>$deliveryorder['Deliveryorder']['salesorder_id'])); ?>
                                    <div class="panel-body panel-body-nopadding">
                                        
                                        <!-- BASIC WIZARD -->
                                        <div id="basicWizard" class="basic-wizard">
                                            <ul class="nav nav-pills nav-justified " data-toggle="tabs" id="tabs">
                                               <li class="active"><a href="#tab1" data-toggle="tab"><span>Step 1:</span> Delivery Order Info</a></li>
                                                <li class=""><a href="#tab2" data-toggle="tab"><span>Step 2:</span> Customer Special Needs and Tag ID</a></li>
                                            </ul>
                                            <div class="nav-pills-border-color"></div>
                                            <br><br>
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="tab1">
                                                    <?PHP echo $this->element('Deliveryorders/edit/deliveryorder_info'); ?>
                                                </div>
                                                <div class="tab-pane" id="tab2">
                                                    <?PHP echo $this->element('Deliveryorders/edit/customer_special_needs_tagid'); ?>
                                                </div>
                                                <a href="../Elements/Deliveryorders/edit/deliveryorder_info.ctp"></a>
                                            </div><!-- tab-content -->
                                            <!-- #basicWizard -->
                                        </div><!-- panel-body -->
                                        <div class="form-group form-actions">
                                            <div class="col-md-9 col-md-offset-10">
                                                
                                            <?php  echo $this->Form->button('<i class="fa fa-angle-right"></i> Submit',array('type'=>'submit','class'=>'btn btn-sm btn-primary','escape' => false)); ?>
                                            <?php echo $this->Form->button('<i class="fa fa-repeat"></i> Reset', array('type'=>'reset','class'=>'btn btn-sm btn-warning','escape' => false)); ?>
                                            <?php if($user_role['app_deliveryorder']['add'] == 1 && $deliveryorder['Deliveryorder']['is_approved']==0): ?>
                                            <?php  echo $this->Form->button('<i class="fa fa-angle-right"></i> Approve',array('type'=>'button','class'=>'btn btn-sm btn-primary approve_deliveryorder','escape' => false)); ?>
                                            <?php else : ?>
                                            <?php  echo $this->Form->button('<i class="fa fa-angle-right"></i> Submit',array('type'=>'submit','class'=>'btn btn-sm btn-primary','escape' => false)); ?>
                                            <?php echo $this->Form->button('<i class="fa fa-repeat"></i> Reset', array('type'=>'reset','class'=>'btn btn-sm btn-warning','escape' => false)); ?>
                                            <?php endif; ?>
                                                     
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
                                
                               
                        
                        
