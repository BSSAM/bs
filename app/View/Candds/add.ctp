<script>
    var path_url='<?PHP echo Router::url('/',true); ?>';
</script>
<script type="text/javascript">

$(function(){
    
  $("#result").hide();
    $("#val_customer").keyup(function() 
    { 
        var customer = $(this).val();
        //alert();  
        if(customer!='')
        {
            var dataString = 'name='+ customer;
            if(customer!='')
            {
                $.ajax({
                    type: "POST",
                    url: "<?PHP echo Router::url('/',true); ?>/Candds/search",
                    data: dataString,
                    cache: false,
                    success: function(html)
                    {
                        
                        $("#result").html(html).show();
                        
                    }
                });
            }
        }
        else
        {
            $("#result").hide();
        }
        
    });
    $('#val_customer').blur(function(){
        $('#result').fadeOut();
        $(this).val('');
    });
    
    $("#val_reg_date").datepicker("setDate", new Date());
});


</script>

<h1>
                                <i class="gi gi-user"></i>Add C & D Info
                            </h1>
                        </div>
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                          <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
                        <li><?php echo $this->Html->link('C & D Info',array('controller'=>'Candds','action'=>'index')); ?></li>
                        <li>Add C & D Info </li>
                    </ul>
                    <!-- END Forms General Header -->
<div class="row">
     <div class="col-md-12">
<div class="block full">
   <?php echo $this->Form->create('',array('class'=>'form-horizontal form-bordered','id'=>'')); ?>
                                
                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="val_customer">Customer Name</label>
                                         <div class="col-md-4">
                                            <?php echo $this->Form->input('customername', 
                array('id'=>'val_customer','class'=>'form-control','placeholder'=>'Enter the Customer Name','label'=>false,
                    'autoComplete'=>'off','type'=>'text','name'=>'customername')); ?>
                                         <div id="result">
                                         </div>
                                        </div>
                                        <label class="col-md-2 control-label" for="val_purpose">Purpose To</label>
                                        <div class="col-md-4">
                                            <?php echo $this->Form->input('purpose', array('id'=>'val_purpose','class'=>'form-control','label'=>false,'name'=>'purpose','type'=>'select','options'=>array('C','D'))); ?>
                                        </div>
                                         
                                    </div>
                                <div class="form-group">
                                    
                                    <label class="col-md-2 control-label" for="val_address">Customer Address</label>
                                    <div class="col-md-4">
                                    <?php echo $this->Form->input('addr', array('id'=>'val_addr','class'=>'form-control','label'=>false,'name'=>'addr','type'=>'select','options'=>array('None'))); ?>
                                    
                                        <?php echo $this->Form->textarea('address', array('id'=>'val_address','class'=>'form-control',
                                               'placeholder'=>'Enter the Customer Address','label'=>false,'rows'=>4,'cols'=>30,'disabled'=>'disabled')); ?>
                                    </div>
        
                                    <label class="col-md-2 control-label" for="val_assigned">Assigned To</label>
                                    <div class="col-md-4">
                                        <?php echo $this->Form->input('assigned', array('id'=>'val_assigned','class'=>'form-control','label'=>false,'type'=>'select','options'=>'','data-placeholder'=>'Select Assigned To','disabled'=>'disabled')); ?>
                                        
                                    </div>
                                     
                                    
                                   
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="val_phone">Phone</label>
                                    <div class="col-md-4">
                                        <?php echo $this->Form->input('phone', array('id'=>'val_phone','class'=>'form-control',
                                                'placeholder'=>'Enter the Phone Number','label'=>false,'autoComplete'=>'off')); ?>
                                                    
                                    </div>
                                    <label class="col-md-2 control-label" for="val_attn">ATTN</label>
                                    <div class="col-md-4">
                                        <?php echo $this->Form->input('attn', array('id'=>'val_attn','class'=>'form-control','label'=>false,'type'=>'select','empty'=>'Select Contact person Name')); ?>
                                    </div>
                                   
                                   
                                </div>
                                 <div class="form-group">
                                    
                                   <label class="col-md-2 control-label" for="val_remarks">Remarks</label>
                                   <div class="col-md-4">
                                         <?php echo $this->Form->textarea('Remarks', array('id'=>'val_remarks','class'=>'form-control',
                                               'label'=>false,'rows'=>4,'cols'=>30)); ?>
                                   </div>
                                </div>
                                     <div class="form-group form-actions">
                                        <div class="col-md-9 col-md-offset-11">
                                            <?php  echo $this->Form->button('<i class="fa fa-angle-right"></i> Add',array('class'=>'btn btn-sm btn-primary candds_add','escape' => false)); ?>
                                            <div class="hid_address"></div>
<!--                                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Submit</button>
                                            <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Reset</button>-->
                                        </div>
                                    </div>
                                <?php echo $this->Form->end(); ?>

                                <div class="panel panel-default">
                                    
                                    <div class="panel-body panel-body-nopadding">
                                        <!-- BASIC WIZARD -->
                                        <div id="basicWizard" class="basic-wizard">
                                            <ul class="nav nav-pills nav-justified " data-toggle="tabs" id="tabs">
                                                <li class="active"><a href="#tab1" data-toggle="tab"><span>Step 1:</span> Ready To Delivery Items</a></li>
                                                <li class=""><a href="#tab2" data-toggle="tab"><span>Step 2:</span> Collections Info</a></li>
                                                <li class=""><a href="#tab3" data-toggle="tab"><span>Step 3:</span> Deliveries Info</a></li>
                                            </ul>
                                            <div class="nav-pills-border-color"></div>
                                            <br><br>
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="tab1">
                                                    <?PHP echo $this->element('Candds/readytodeliver'); ?>
                                                </div>
                                                <div class="tab-pane" id="tab2">
                                                    <?PHP echo $this->element('Candds/collections'); ?>
                                                </div>
                                                <div class="tab-pane" id="tab3">
                                                    <?PHP echo $this->element('Candds/deliveries'); ?>
                                                </div>
                                            </div><!-- tab-content -->
                                            <!-- #basicWizard -->
                                        </div><!-- panel-body -->
                                        
                                    </div>
                                    <!-- panel -->
                             
                                </div>
