<script>
    var path_url='<?PHP echo Router::url('/',true); ?>';
</script>
<style>
    .delivery_show
    {
        padding:10px; 
        border-bottom:1px #999 dashed;
        font-size:15px; 
        height:50px;
        float: top;
    }
    .delivery_no_result
    {
        padding:10px; 
        border-bottom:1px #999 dashed;
        font-size:15px; 
        height:50px;
        float: top;
    }
    .delivery_no_result:hover
    {
        background:#4c66a4;
        color:#FFF;
        cursor:pointer;
    }
    .delivery_show:hover
    {
        background:#4c66a4;
        color:#FFF;
        cursor:pointer;
    }
    #sales_list{
        position: absolute;
        z-index: 999;
        background: none repeat scroll 0 0 #F4F4F4;
        width: 268px;
    }
</style>
 
<script type="text/javascript">
$(function(){
$("#delivery_input_search").keyup(function() 
{ 
    $(this).css('border','1px solid green')
    var sales_id = $(this).val();
    var dataString = 'sale_id='+ sales_id;
    if(sales_id!='')
    {
	$.ajax({
	type: "POST",
	url: "<?PHP echo Router::url('/',true); ?>Deliveryorders/salesorder_id_search",
	data: dataString,
	cache: false,
	success: function(html)
	{
            $("#sales_list").html(html).show();
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
                        <i class="gi gi-user"></i>Add Purchase Order
                    </h1>
                    </div>
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                          <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
                        <li><?php echo $this->Html->link('Purchase Orders',array('controller'=>'Purchaseorders','action'=>'index')); ?></li>
                        <li>Add Purchase Order</li>
                    </ul>
                    <!-- END Forms General Header -->

            <div class="row">
                        <div class="col-md-12">
                            <!-- Basic Form Elements Block -->
                            <div class="block">
                                <!-- Basic Form Elements Title -->
                                <div class="block-title">
                                    <h2>
                                        <div class="col-md-4 search_move">
                                            <div class="input-group">
                                                <div>
                                                    <input type="text" class="form-control" autoComplete='off' placeholder="Enter Sales Order No" id="delivery_input_search"/>
                                                </div>
                                                 <span class="input-group-btn">
                                                    <button class="btn btn-primary delivery_search" type="button">Proceed</button>
                                                </span>
                                            </div>
                                             <div id="sales_list">
                                                </div>
                                        </div>
                                    </h2>
                                </div>
                                <!-- END Form Elements Title -->
                                <!-- Basic Form Elements Content -->
                                <div class="panel panel-default">
                                    <?php echo $this->Form->create('Purchaseorder',array('class'=>'form-horizontal form-bordered','id'=>'form-salesorder-add')); ?>
                                    <?php echo $this->Form->input('Purchaseorder.customer_id', array('type'=>'hidden','value'=>'')); ?>
                                    <?php echo $this->Form->input('Purchaseorder.salesorder_id', array('type'=>'hidden','value'=>'')); ?>
                                    <div class="panel-body panel-body-nopadding">
                                        <!-- BASIC WIZARD -->
                                        <div id="basicWizard" class="basic-wizard">
                                            <ul class="nav nav-pills nav-justified " data-toggle="tabs" id="tabs">
                                                <li class="active"><a href="#tab1" data-toggle="tab"><span>Step 1:</span> Purchase Order Info</a></li>
                                                <li class=""><a href="#tab2" data-toggle="tab"><span>Step 2:</span> Customer Special Needs</a></li>
                                                <li class=""><a href="#tab3" data-toggle="tab"><span>Step 3:</span> Instrument</a></li>
                                            </ul>
                                            <div class="nav-pills-border-color"></div>
                                            <br><br>
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="tab1">
                                                    <?PHP echo $this->element('Purchaseorders/purchaseorder_info'); ?>
                                                </div>
                                                <div class="tab-pane" id="tab2">
                                                    <?PHP echo $this->element('Purchaseorders/customer_special_needs'); ?>
                                                </div>
                                                <div class="tab-pane" id="tab3">
                                                    <?PHP echo $this->element('Purchaseorders/instrument'); ?>
                                                </div>
                                            </div><!-- tab-content -->
                                            <!-- #basicWizard -->
                                        </div><!-- panel-body -->
                                        <div class="form-group form-actions">
                                            <div class="col-md-9 col-md-offset-10">
                                            <?php  echo $this->Form->button('<i class="fa fa-angle-right"></i> Submit',array('type'=>'submit','class'=>'btn btn-sm btn-primary sales_submit','escape' => false)); ?>
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