<script>
    var path_url='<?PHP echo Router::url('/',true); ?>';
    
    $(document).ready(function(){
        
        $('#val_tempinstrumentname').val('');
        $('#val_model').val('').attr('readonly','readonly');
        $('#val_brand').val('').attr('readonly','readonly');
        $('#val_range').val('').attr('readonly','readonly');
        $('#val_customer').val('');
        $("#instrument_details").val('');
        $('#customer_id').val('');
        
        $("#search_instrument",window.parent.document).hide();
    
        $("#val_tempinstrumentname").keyup(function() 
        { 
            var instrument = $(this).val();
            var dataString = 'name='+ instrument;
            if(instrument!='')
            {

                $.ajax({
                type: "POST",
                url: path_url+"Temperatures/search_template_ins",
                data: dataString,
                cache: false,
                beforeSend: ni_start(),  
                success: function(html)
                {
                    //alert(html);
                    //console.log(html);
                    $("#search_instrument").html(html).show();
                },
                complete: ni_end(),  
                });
            }
            $('.instrument_show').fadeOut();
            return false;    
        });
		
		$('.templateFormSubmit').click(function(e) {  
			
			    $('#temp-template-add').submit();
            
        });
		
		$('.readingtype').change(function(e) {
            $('.readingtypename').val($('.readingtype option:selected').text());
        });
		
		$('.temp_unit_id').change(function(e) {
            $('.unitname').val($('.temp_unit_id option:selected').text());
        });
		
		$('.templatedataFormSubmit').click(function(e) {
			
               $('.ajaxform').submit(); 
			   
        });
		
        $('.ajaxform').ajaxForm({ 
            url: path_url+'Temperatures/addtemplatedata/',
                type: 'post',
                success : function(recievedData)
                {
					$('.template_data_table').html(recievedData);
					 return false;
				}
		});
		
        $(document).on('click','.instrument_show',function(){
        
            //alert($(this).attr('id'));
            var instrument_details   =   $(this).attr('id');
            //$('#in_id').val(instrument_id);
            $("#search_instrument").fadeOut();
            $("#instrument_details").val($(this).attr('id'));
            var ins_text=$(this).text();
           // $('#customer_instrument').val(ins_text);


            $.ajax({
                    type: 'POST',
                    data:"instrument_details="+instrument_details,
                    url: path_url+'/Temperatures/get_instrument_details/',
                    beforeSend: ni_start(),  
                    success:function(data){
                        parsedata = $.parseJSON(data);

                        $('#val_tempinstrumentname').val(parsedata.Instrument.name);
                        $('#val_model').val(parsedata.Description.model_no);
                        $('#val_brand').val(parsedata.Brand.brandname);
                        $('#val_range').val(parsedata.Range.range_name);

                    },
                    complete: ni_end(),
                });
        });
        
        $('.check_unit').on('click',function(){
            var val_u = $('#val_unit').val();
            if(val_u == '')
            {
                alert('Please Select Unit First');
                $('#val_prefref').val('');
                return false;
            }
        });
        
        
        $("#result").hide();
        $("#val_customer").keyup(function() 
        { 

            var customer = $(this).val();
            var dataString = 'name='+ customer;
            if(customer!='')
            {
                $.ajax({
                type: "POST",
                url: path_url+"/Temperatures/customer_search",
                data: dataString,
                cache: false,
                beforeSend: ni_start(),  
                complete: ni_end(),
                success: function(html)
                {
                    $("#result").html(html).show();
                }
                });
            }
        });
        $(document).on('click','.customer_show',function(){
            var customer_name=$(this).text();
            $('#result').fadeOut();
            var customer_id=$(this).attr('id');
            //alert(customer_name);
            //alert(customer_id);
            $('#val_customer').val(customer_name);
            $('#customer_id').val(customer_id);
        });
    });
</script>
<h1>
    <i class="gi gi-user"></i>Add Template
</h1>
</div>
</div>
<ul class="breadcrumb breadcrumb-top">
    <li><?php echo $this->Html->link('Home', array('controller' => 'Dashboards', 'action' => 'index')); ?></li>
    <li><?php echo $this->Html->link('Template',array('controller'=>'Temperatures','action'=>'template')); ?></li>
    <li>Add Template</li>
</ul>
<!-- END Forms General Header -->

<div class="row">
    <div class="col-md-12">
        <!-- Basic Form Elements Block -->
        <div class="block">
            <!-- Basic Form Elements Title -->
           
<!--            <div class="block-title">
                <h2>
                    <div class="form-group">
                    <div class="col-md-4 search_move">
                        <div class="input-group">
                            <div>
                                <input type="text" class="form-control" autoComplete='off' placeholder="Enter Sales Order No" id="subcontract_input_search" name="sub-sales-no"/>
                            </div>
                            <span class="input-group-btn">
                                <button class="btn btn-primary subcontract_search" type="button">Proceed</button>
                            </span>
                        </div>
                        <div id="subcontract_list" class="instrument_drop">
                        </div>
                    </div>
                    </div>
                </h2>
            </div>-->
            <!-- END Form Elements Title -->

            <!-- Basic Form Elements Content -->


            <?php echo $this->Form->create('template/addtemplate', array('class' => 'form-horizontal form-bordered', 'id' => 'temp-template-add', 'enctype' => 'multipart/form-data')); ?>
            <?PHP //echo $this->Form->input('customer_id',array('type'=>'hidden')); ?>
            <?PHP //echo $this->Form->input('salesorder_id',array('type'=>'hidden')); ?>
            <?PHP echo $this->Form->input('instrument_details',array('id'=>'instrument_details','type'=>'hidden')); ?>
            <?PHP echo $this->Form->input('customer_id',array('id'=>'customer_id','type'=>'hidden')); ?>
<!--            <div class="description_list">
                
            </div>-->
            <div class="form-group">
                <label class="col-md-2 control-label" for="val_tempinstrumentname">Instrument</label>
                <div class="col-md-4">
                    <?php echo $this->Form->input('instrumentname', array('id' => 'val_tempinstrumentname', 'class' => 'form-control', 'placeholder' => 'Enter the Instrument Name', 'label' => false,'autoComplete'=>'off')); ?>
                    <div class="instrument_drop" id="search_instrument"></div>
                </div>
                <label class="col-md-2 control-label" for="val_model">Model</label>
                <div class="col-md-4">
                    <?php echo $this->Form->input('model', array('id' => 'val_model', 'class' => 'form-control', 'placeholder' => 'Enter Model', 'label' => false)); ?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label" for="val_brand">Brand</label>
                <div class="col-md-4">
                    <?php echo $this->Form->input('brand', array('id' => 'val_brand', 'class' => 'form-control', 'placeholder' => 'Enter Brand', 'label' => false)); ?>
                </div>
                <label class="col-md-2 control-label" for="val_range">Range</label>
                <div class="col-md-4">
                    <?php echo $this->Form->input('range', array('id' => 'val_range', 'class' => 'form-control', 'placeholder' => 'Enter Range', 'label' => false)); ?>
                </div>
                
            </div>
            

            <div class="form-group">
                <label class="col-md-2 control-label" for="val_customer">Customer</label>
                <div class="col-md-4">
                    <?php echo $this->Form->input('customer', array('id'=>'val_customer','type'=>'text','class'=>'form-control','label'=>false,'placeholder'=>'Enter the Customer')); ?>
                    <div id="result" class="instrument_drop"></div>
                </div>
            </div>
             <?php 	echo $this->Form->end(); ?>
            <?php echo $this->Form->create('Temptemplatedata', array('class' => 'form-horizontal form-bordered templatedataForm ajaxform', 'id' => 'fileupload', 'enctype' => 'multipart/form-data')); ?>

            <div class="col-lg-12">
                <h4 class="sub-header"><small>Template Detail</small></h4>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label" for="val_setpoint">Set Point</label>
                <div class="col-md-4">
                    <?php echo $this->Form->input('setpoint', array('id'=>'val_setpoint','type'=>'text','class'=>'form-control','label'=>false,'placeholder'=>'Enter the Set Point')); ?>
                </div>
                <label class="col-md-2 control-label" for="val_readingtype">Reading Type</label>
                <div class="col-md-4">
                <?php
                    echo $this->Form->input('temp_readingtype_id', array('id' => 'val_readingtype', 'class' => 'form-control readingtype',
                             'label' => false,'type' => 'select', 'options'=>array('1'=>'Temperature'),'readonly')); ?>
               
                </div>  
                <input type="hidden" name="data[Temptemplatedata][readingtypename]" class="readingtypename" />
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="val_unit">Unit</label>
                <div class="col-md-4">
                <?php
                    echo $this->Form->input('temp_unit_id', array('id' => 'val_unit', 'class' => 'form-control temp_unit_id',
                             'label' => false,'type' => 'select', 'empty' => 'Select Unit','options'=>$unit_list)); ?>
               
                </div>
                 <input type="hidden" name="data[Temptemplatedata][unitname]" class="unitname" />  
                <label class="col-md-2 control-label" for="val_count">Count</label>
                <div class="col-md-4">
                    <?php echo $this->Form->input('count', array('id'=>'val_count','type'=>'text','class'=>'form-control','label'=>false,'placeholder'=>'Enter the Count')); ?>
                </div>
                
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="val_resolution">Resolution</label>
                <div class="col-md-4">
                <?php
                    echo $this->Form->input('resolution', array('id' => 'val_resolution', 'class' => 'form-control',
                             'label' => false,'type' => 'text', 'placeholder' => 'Enter Resolution','value'=>'0.00')); ?>
               
                </div>  
                <label class="col-md-2 control-label" for="val_resolution">Accuracy</label>
                <div class="col-md-4">
                <?php
                    echo $this->Form->input('accuracy', array('id' => 'val_accuracy', 'class' => 'form-control',
                             'label' => false,'type' => 'text', 'placeholder' => 'Select Accuracy','value'=>'0')); ?>
               
                </div>  
                
            </div>
            <div class="form-group check_unit">
                
                <label class="col-md-2 control-label" for="val_prefref">Pref Reference</label>
                <div class="col-md-8">
                    <?php echo $this->Form->input('temp_uncertainty_id', array('id'=>'val_prefref','type'=>'select','class'=>'form-control select-chosen','label'=>false,'data-placeholder'=>'Enter the Pref Reference','multiple','options'=>$uncer_tag)); ?>
                </div>
                
            </div>
            
             <div class="form-group form-actions">
                <div class="col-md-9 col-md-offset-10">
                <a class="btn btn-sm btn-primary templatedataFormSubmit"><i class="fa fa-angle-right"> </i> Add</a>
                </div>
            </div>
                
            
           
            <div class="col-lg-12">
                <h4 class="sub-header"><small><b>Datas </b</small></h4>
            </div>
            <div class="col-sm-3 col-lg-12 template_detail">
                <table  class="table table-vcenter table-condensed table-bordered template_data_table">
                    <thead>
                        <tr>
                            <th class="text-center">S.No</th>
                            <th class="text-center">Set Point</th>
                            <th class="text-center">Unit</th>
                            <th class="text-center">Reading Type</th>
                            <th class="text-center">Resolution</th>
                            <th class="text-center">Accuracy</th>
                            <th class="text-center">Count</th>
                            <th class="text-center">Pref Reference(Master Instrument-Tagno-Range)</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="template_detail_info"> 
                        <tr class="text-center">    
                            <td class="" colspan="9">
                        No Records Found</td>
                       
                        </tr>
                    </tbody>
                </table>
            </div>
            <?php echo $this->Form->end(); ?>
            <div class="form-group form-actions">
                <div class="col-md-9 col-md-offset-10">
                <a class="btn btn-sm btn-primary templateFormSubmit"><i class="fa fa-angle-right"> </i> Submit</a>
                    <?php //echo $this->Form->button('<i class="fa fa-angle-right"></i> Submit', array('type' => 'submit', 'class' => 'btn btn-sm btn-primary', 'escape' => false)); ?> &nbsp;
                    <?php //echo $this->Form->button('<i class="fa fa-repeat"></i> Reset', array('type' => 'reset', 'class' => 'btn btn-sm btn-warning', 'escape' => false)); ?>
                </div>
            </div>


            <!-- panel -->

            <!-- END Basic Form Elements Content -->
        </div>
        <!-- END Basic Form Elements Block -->
    </div>
<?php echo $this->Html->script('pages/formsValidation'); ?>
    <script>$(function() { FormsValidation.init(); });</script>




