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
	url: "../Quotations/search",
	data: dataString,
	cache: false,
	success: function(html)
	{
	$("#result").html(html).show();
	}
	});
}return false;    
});});

jQuery("#result").live("click",function(e){ 
    
	var $clicked = $(e.target);
	var $name = $clicked.find('.name').html();
	var decoded = $("<div/>").html($name).text();
	$('#val_customer').val(decoded);
});
$(document).live("click", function(e) { 
	var $clicked = $(e.target);
	if (! $clicked.hasClass("search")){
	jQuery("#result").fadeOut(); 
	}
});
$('#val_customer').click(function(){
	jQuery("#result").fadeIn();
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
                                <div class="block-title">
                                    
                                    <h2></h2>
                                </div>
                                <!-- END Form Elements Title -->

                                <!-- Basic Form Elements Content -->
                                 <?php echo $this->Form->create('Quotation',array('class'=>'form-horizontal form-bordered','id'=>'form-quotation-add')); ?>
                                
                                    <div class="form-group">
                                       
                                        <label class="col-md-2 control-label" for="val_quotationno">Quotation No</label>
                                        <div class="col-md-4">
                                            <?php echo $this->Form->input('quotationno', array('id'=>'val_quotationno','class'=>'form-control','disabled'=>'disabled','label'=>false,'name'=>'quotationno','value'=> $quotationno)); ?>
                                        </div>
                                   
                                        <label class="col-md-2 control-label" for="val_branchname">Branch</label>
                                        <div class="col-md-4">
                                           <?php echo $this->Form->input('branchname', array('id'=>'val_branchname','class'=>'form-control','disabled'=>'disabled','label'=>false,'name'=>'branchname')); ?>
                                        </div>
                                   
                                    </div>
                                
                                    <div class="form-group">
                                       
                                        <label class="col-md-2 control-label" for="val_customer">Customer Name</label>
                                        <div class="col-md-4">
                                            <?php echo $this->Form->input('customer', array('id'=>'val_customer','class'=>'form-control','placeholder'=>'Enter the Customer Name','label'=>false,'name'=>'customer')); ?>
                                        <div id="result">
</div>
                                        </div>
                                   
                                        <label class="col-md-2 control-label" for="val_address">Customer Address</label>
                                        <div class="col-md-4">
                                           <?php echo $this->Form->password('address', array('id'=>'val_address','class'=>'form-control','placeholder'=>'Enter the Customer Address','label'=>false,'name'=>'address')); ?>
                                        </div>
                                   
                                    </div>
                                    <div class="form-group form-actions">
                                        <div class="col-md-9 col-md-offset-3">
                                            
                                            <?php  echo $this->Form->button('<i class="fa fa-angle-right"></i> Submit',array('type'=>'submit','class'=>'btn btn-sm btn-primary','escape' => false)); ?>
                                            <?php echo $this->Form->button('<i class="fa fa-repeat"></i> Reset', array('type'=>'reset','class'=>'btn btn-sm btn-warning','escape' => false)); ?>

                                        </div>
                                    </div>
                                
                                <?php echo $this->Form->end(); ?>
                                <!-- END Basic Form Elements Content -->
                            </div>
                            <!-- END Basic Form Elements Block -->
                        </div>
    <?php echo $this->Html->script('pages/formsValidation'); ?>
        <script>$(function(){ FormsValidation.init(); });</script>
         <?php echo $this->Html->script('pages/uiProgress'); ?>
                            <script>$(function(){ UiProgress.init(); });</script>
                                
                               
                        
                        
