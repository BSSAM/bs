<script>
    var path_url='<?PHP echo Router::url('/',true); ?>';
    var temp_id = '<?PHP echo $temp_ins_id; ?>';
    
	$(document).ready(function(e) {
            $.ajax({
            type: "POST",
            url: path_url+'Temperatures/viewbulkfields/',
            data: "id="+temp_id,
            cache: false,
            beforeSend: ni_start(),  
            complete: ni_end(),
            success : function(recievedData)
            {
                //console.log(recievedData);
                    //alert('ll');
                    //alert(recievedData);
                    $('.uncertainty_results').html(recievedData);
                    return false;
                   // $(this).closest('form').find("input[type=text], input[type=select]").val("");
            },
            });
            
            
            //Trigger
        
              
            
            
            //$("#val_duedate").datepicker("setDate", new Date());
            //$("#val_caldate").datepicker("setDate", new Date());
            //$("#val_instrument").val('');
            //$("#val_visible").prop('checked',true);
            //$("#val_active").prop('checked',true);
            $("#search_instrument").hide();
            // Instrument Value From Instrument Entered
            $('.instrumentid').change(function()
            {
                var instrumentid = $(this).val(); 
                $('.instrumentname').val($('.instrumentid option:selected').text()); 

                $.ajax({ 
                    url: path_url+'Temperatures/getinstrumentinfo/',
                    type:'POST',
                    beforeSend: ni_start(),  
                    complete: ni_end(),
                    data:
                    {
                        instrumentid:instrumentid,
                    },
                    success: function(msg)
                    {	
                       $('.tagno').val(msg);								
                    }               
                });
            });
            
            

            $('.submitUncertaintyForm').click(function(e) {
                $('.UncertaintyForm').submit();

            });
            $('.add_all_fields').click(function(e) { 
               //alert("before");
               $('.ajaxform').submit(); //alert("after");

            });
            $('.ajaxform').ajaxForm({ 
                url: path_url+'Temperatures/addbulkfields/',
                    type: 'post',
                    success : function(recievedData)
                    {
                        //console.log(recievedData);
                            //alert('ll');
                            //alert(recievedData);
                            $('.uncertainty_results').html(recievedData);
							
							/***Make fields Empty ***/
							 $('#val_range').val(' ');
                        $('#val_range_hid').val(' ');
                        $('#val_uref1_data1').val(' ');
                        // Uref
                        $('#val_uref1_data2 :selected').val(' ');
                        $('#val_uref1_data3').val(' ');
                        $('#val_uref2_data1').val(' ');
                        $('#val_uref2_data2 :selected').val(' ');
                        $('#val_uref2_data3').val(' ');
                        $('#val_uref3_data1').val(' ');
                        $('#val_uref3_data2 :selected').val(' ');
                        $('#val_uref3_data3').val(' ');
                        // Uacc
                        $('#val_uacc1_data1').val(' ');
                        $('#val_uacc1_data2 :selected').val(' ');
                        $('#val_uacc1_data3').val(' ');
                        $('#val_uacc2_data1').val(' ');
                        $('#val_uacc2_data2 :selected').val(' ');
                        $('#val_uacc2_data3').val(' ');
                        $('#val_uacc3_data1').val(' ');
                        $('#val_uacc3_data2 :selected').val(' ');
                        $('#val_uacc3_data3').val(' ');
                        // Others
                        $('#val_urefdivisor').val(' ');
                        $('#val_urepdivisor').val(' ');
                        $('#val_uresdivisoranalog').val(' ');
                        $('#val_uresdivisordigital').val(' ');
                        $('#val_divisor').val(' ');
						// Select
                        $('#val_u1_data1').val(' ');
                        $('#val_u1_data2').val(' ');
                        $('#val_u1_data3').val(' ');
						$('#val_u2_data1').val(' ');
                        $('#val_u2_data2').val(' ');
                        $('#val_u2_data3').val(' ');
						$('#val_u3_data1').val(' ');
                        $('#val_u3_data2').val(' ');
                        $('#val_u3_data3').val(' ');
						$('#val_u4_data1').val(' ');
                        $('#val_u4_data2').val(' ');
                        $('#val_u4_data3').val(' ');
						$('#val_u5_data1').val(' ');
                        $('#val_u5_data2').val(' ');
                        $('#val_u5_data3').val(' ');
						$('#val_u6_data1').val(' ');
                        $('#val_u6_data2').val(' ');
                        $('#val_u6_data3').val(' ');
						$('#val_u7_data1').val(' ');
                        $('#val_u7_data2').val(' ');
                        $('#val_u7_data3').val(' ');
						$('#val_u8_data1').val(' ');
                        $('#val_u8_data2').val(' ');
                        $('#val_u8_data3').val(' ');
						$('#val_u9_data1').val(' ');
                        $('#val_u9_data2').val(' ');
                        $('#val_u9_data3').val(' ');
						$('#val_u10_data1').val(' ');
                        $('#val_u10_data2').val(' ');
                        $('#val_u10_data3').val(' ');
						$('#val_u11_data1').val(' ');
                        $('#val_u11_data2').val(' ');
                        $('#val_u11_data3').val(' ');
						$('#val_u12_data1').val(' ');
                        $('#val_u12_data2').val(' ');
                        $('#val_u12_data3').val(' ');
						$('#val_u13_data1').val(' ');
                        $('#val_u13_data2').val(' ');
                        $('#val_u13_data3').val(' ');
						$('#val_u14_data1').val(' ');
                        $('#val_u14_data2').val(' ');
                        $('#val_u14_data3').val(' ');
						$('#val_u15_data1').val(' ');
                        $('#val_u15_data2').val(' ');
                        $('#val_u15_data3').val(' ');
						$('#val_u16_data1').val(' ');
                        $('#val_u16_data2').val(' ');
                        $('#val_u16_data3').val(' ');
						$('#val_u17_data1').val(' ');
                        $('#val_u17_data2').val(' ');
                        $('#val_u17_data3').val(' ');
						$('#val_u18_data1').val(' ');
                        $('#val_u18_data2').val(' ');
                        $('#val_u18_data3').val(' ');
						$('#val_u19_data1').val(' ');
                        $('#val_u19_data2').val(' ');
                        $('#val_u19_data3').val(' ');
						$('#val_u20_data1').val(' ');
                        $('#val_u20_data2').val(' ');
                        $('#val_u20_data3').val(' ');


                        $('.add_all_fields').text('Add');
						$('.edit_uncertainty_bulk_id').val('');
						
                            return false;
                           // $(this).closest('form').find("input[type=text], input[type=select]").val("");
                    },
            });

            $("#val_range").keyup(function() 
            { 
                var val_range = $(this).val();
                var dataString = 'range='+ val_range;
                if(val_range!='')
                {
                    $.ajax({
                    type: "POST",
                    url: path_url+"/Temperatures/search_range",
                    data: dataString,
                    cache: false,
                    beforeSend: ni_start(),  
                    complete: ni_end(),
                    success: function(html)
                    {
                        $("#search_instrument").html(html).show();
                    }
                    });
                }
            });
            $(document).on('click','.instrument_show',function(){
                var range_name=$(this).text();
                var range_id=$(this).attr('id');
                //alert(range_id);
                $('#val_range').val(range_name);
                $('#val_range_hid').val(range_id);
                $('#search_instrument').fadeOut();
            });
           /************************For Sales order Approval End*********************************/

            $('#val_range').blur(function(){
                $(this).val('');
                $('#search_instrument').fadeOut();
            });


            $(document).on('click','.edit_datauncertain',function(){
                var data_id = $(this).attr('id');

                $.ajax({
                    type: "POST",
                    url: path_url+"Temperatures/edit_datauncertain",
                    data: "data_id="+ data_id,
                    cache: false,
                    beforeSend: ni_start(),  
                    complete: ni_end(),
                    success: function(data1)
                    {
                        edit_node=$.parseJSON(data1);
                        $('#val_range').val(edit_node.Tempuncertaintydata.rangename);
                        $('#val_range_hid').val(edit_node.Tempuncertaintydata.range_id);
                        $('#val_uref1_data1').val(edit_node.Tempuncertaintydata.uref1_data1);
                        // Uref
                        $('#val_uref1_data2 :selected').val(edit_node.Tempuncertaintydata.uref1_data2);
                        $('#val_uref1_data3').val(edit_node.Tempuncertaintydata.uref1_data3);
                        $('#val_uref2_data1').val(edit_node.Tempuncertaintydata.uref2_data1);
                        $('#val_uref2_data2 :selected').val(edit_node.Tempuncertaintydata.uref2_data2);
                        $('#val_uref2_data3').val(edit_node.Tempuncertaintydata.uref2_data3);
                        $('#val_uref3_data1').val(edit_node.Tempuncertaintydata.uref3_data1);
                        $('#val_uref3_data2 :selected').val(edit_node.Tempuncertaintydata.uref3_data2);
                        $('#val_uref3_data3').val(edit_node.Tempuncertaintydata.uref3_data3);
                        // Uacc
                        $('#val_uacc1_data1').val(edit_node.Tempuncertaintydata.uacc1_data1);
                        $('#val_uacc1_data2 :selected').val(edit_node.Tempuncertaintydata.uacc1_data2);
                        $('#val_uacc1_data3').val(edit_node.Tempuncertaintydata.uacc1_data3);
                        $('#val_uacc2_data1').val(edit_node.Tempuncertaintydata.uacc2_data1);
                        $('#val_uacc2_data2 :selected').val(edit_node.Tempuncertaintydata.uacc2_data2);
                        $('#val_uacc2_data3').val(edit_node.Tempuncertaintydata.uacc2_data3);
                        $('#val_uacc3_data1').val(edit_node.Tempuncertaintydata.uacc3_data1);
                        $('#val_uacc3_data2 :selected').val(edit_node.Tempuncertaintydata.uacc3_data2);
                        $('#val_uacc3_data3').val(edit_node.Tempuncertaintydata.uacc3_data3);
                        // Others
                        $('#val_urefdivisor').val(edit_node.Tempuncertaintydata.urefdivisor);
                        $('#val_urepdivisor').val(edit_node.Tempuncertaintydata.urepdivisor);
                        $('#val_uresdivisoranalog').val(edit_node.Tempuncertaintydata.uresdivisoranalog);
                        $('#val_uresdivisordigital').val(edit_node.Tempuncertaintydata.uresdivisordigital);
                        $('#val_divisor').val(edit_node.Tempuncertaintydata.divisor);
						// Select
                        $('#val_u1_data1').val(edit_node.Tempuncertaintydata.u1_data1);
                        $('#val_u1_data2').val(edit_node.Tempuncertaintydata.u1_data2);
                        $('#val_u1_data3').val(edit_node.Tempuncertaintydata.u1_data3);
						$('#val_u2_data1').val(edit_node.Tempuncertaintydata.u2_data1);
                        $('#val_u2_data2').val(edit_node.Tempuncertaintydata.u2_data2);
                        $('#val_u2_data3').val(edit_node.Tempuncertaintydata.u2_data3);
						$('#val_u3_data1').val(edit_node.Tempuncertaintydata.u3_data1);
                        $('#val_u3_data2').val(edit_node.Tempuncertaintydata.u3_data2);
                        $('#val_u3_data3').val(edit_node.Tempuncertaintydata.u3_data3);
						$('#val_u4_data1').val(edit_node.Tempuncertaintydata.u4_data1);
                        $('#val_u4_data2').val(edit_node.Tempuncertaintydata.u4_data2);
                        $('#val_u4_data3').val(edit_node.Tempuncertaintydata.u4_data3);
						$('#val_u5_data1').val(edit_node.Tempuncertaintydata.u5_data1);
                        $('#val_u5_data2').val(edit_node.Tempuncertaintydata.u5_data2);
                        $('#val_u5_data3').val(edit_node.Tempuncertaintydata.u5_data3);
						$('#val_u6_data1').val(edit_node.Tempuncertaintydata.u6_data1);
                        $('#val_u6_data2').val(edit_node.Tempuncertaintydata.u6_data2);
                        $('#val_u6_data3').val(edit_node.Tempuncertaintydata.u6_data3);
						$('#val_u7_data1').val(edit_node.Tempuncertaintydata.u7_data1);
                        $('#val_u7_data2').val(edit_node.Tempuncertaintydata.u7_data2);
                        $('#val_u7_data3').val(edit_node.Tempuncertaintydata.u7_data3);
						$('#val_u8_data1').val(edit_node.Tempuncertaintydata.u8_data1);
                        $('#val_u8_data2').val(edit_node.Tempuncertaintydata.u8_data2);
                        $('#val_u8_data3').val(edit_node.Tempuncertaintydata.u8_data3);
						$('#val_u9_data1').val(edit_node.Tempuncertaintydata.u9_data1);
                        $('#val_u9_data2').val(edit_node.Tempuncertaintydata.u9_data2);
                        $('#val_u9_data3').val(edit_node.Tempuncertaintydata.u9_data3);
						$('#val_u10_data1').val(edit_node.Tempuncertaintydata.u10_data1);
                        $('#val_u10_data2').val(edit_node.Tempuncertaintydata.u10_data2);
                        $('#val_u10_data3').val(edit_node.Tempuncertaintydata.u10_data3);
						$('#val_u11_data1').val(edit_node.Tempuncertaintydata.u11_data1);
                        $('#val_u11_data2').val(edit_node.Tempuncertaintydata.u11_data2);
                        $('#val_u11_data3').val(edit_node.Tempuncertaintydata.u11_data3);
						$('#val_u12_data1').val(edit_node.Tempuncertaintydata.u12_data1);
                        $('#val_u12_data2').val(edit_node.Tempuncertaintydata.u12_data2);
                        $('#val_u12_data3').val(edit_node.Tempuncertaintydata.u12_data3);
						$('#val_u13_data1').val(edit_node.Tempuncertaintydata.u13_data1);
                        $('#val_u13_data2').val(edit_node.Tempuncertaintydata.u13_data2);
                        $('#val_u13_data3').val(edit_node.Tempuncertaintydata.u13_data3);
						$('#val_u14_data1').val(edit_node.Tempuncertaintydata.u14_data1);
                        $('#val_u14_data2').val(edit_node.Tempuncertaintydata.u14_data2);
                        $('#val_u14_data3').val(edit_node.Tempuncertaintydata.u14_data3);
						$('#val_u15_data1').val(edit_node.Tempuncertaintydata.u15_data1);
                        $('#val_u15_data2').val(edit_node.Tempuncertaintydata.u15_data2);
                        $('#val_u15_data3').val(edit_node.Tempuncertaintydata.u15_data3);
						$('#val_u16_data1').val(edit_node.Tempuncertaintydata.u16_data1);
                        $('#val_u16_data2').val(edit_node.Tempuncertaintydata.u16_data2);
                        $('#val_u16_data3').val(edit_node.Tempuncertaintydata.u16_data3);
						$('#val_u17_data1').val(edit_node.Tempuncertaintydata.u17_data1);
                        $('#val_u17_data2').val(edit_node.Tempuncertaintydata.u17_data2);
                        $('#val_u17_data3').val(edit_node.Tempuncertaintydata.u17_data3);
						$('#val_u18_data1').val(edit_node.Tempuncertaintydata.u18_data1);
                        $('#val_u18_data2').val(edit_node.Tempuncertaintydata.u18_data2);
                        $('#val_u18_data3').val(edit_node.Tempuncertaintydata.u18_data3);
						$('#val_u19_data1').val(edit_node.Tempuncertaintydata.u19_data1);
                        $('#val_u19_data2').val(edit_node.Tempuncertaintydata.u19_data2);
                        $('#val_u19_data3').val(edit_node.Tempuncertaintydata.u19_data3);
						$('#val_u20_data1').val(edit_node.Tempuncertaintydata.u20_data1);
                        $('#val_u20_data2').val(edit_node.Tempuncertaintydata.u20_data2);
                        $('#val_u20_data3').val(edit_node.Tempuncertaintydata.u20_data3);


                        $('.add_all_fields').text('Edit');
                        $('.add_all_fields').attr('id',edit_node.Tempuncertaintydata.id);
						$('.edit_uncertainty_bulk_id').val(edit_node.Tempuncertaintydata.id);
                        //console.log(edit_node);
                    }
                });
            });
            $('body').on('click', '.delete_datauncertain', function(e) {
               // var a = $(this);
            //$('.delete_datauncertain').click(function(e) {
                var datauncertain = $(this).attr('id'); 
//                $('.instrumentname').val($('.instrumentid option:selected').text()); 

                $.ajax({ 
                    url: path_url+'Temperatures/deleteuncertain/'+datauncertain,
                    type:'POST',
                    beforeSend: ni_start(),  
                    complete: ni_end(),
                    data:
                    {
                        id:datauncertain,
                    },
                    success: function(msg)
                    {	
                       $('.delete_datauncertain_tr_'+datauncertain).fadeOut('slow');								
                    }               
                });
            });
			
    });
</script>
        
<h1>
    <i class="gi gi-user"></i>Edit Uncertainty Data
</h1>
</div>
</div>
<ul class="breadcrumb breadcrumb-top">
    <li><?php echo $this->Html->link('Home', array('controller' => 'Dashboards', 'action' => 'index')); ?></li>
    <li><?php echo $this->Html->link('Uncertainty Data', array('controller' => 'Temperatures', 'action' => 'uncertainty')); ?></li>
    <li>Edit Uncertainty Data</li>
</ul>
<!-- END Forms General Header -->

<div class="row">
    <div class="col-md-12 uncertainty_view">
        <!-- Basic Form Elements Block -->
        <div class="block">
            <!-- Basic Form Elements Title -->
            <div class="block-title">
                <h2>
                  
                </h2>
            </div>
            <!-- END Form Elements Title -->

            <!-- Basic Form Elements Content -->


            <?php echo $this->Form->create('Uncertainty', array('class' => 'form-horizontal form-bordered UncertaintyForm', 'id' => 'fileupload', 'enctype' => 'multipart/form-data')); ?>
            
            <div class="description_list">
                
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="val_instrument">Instrument</label>
                <div class="col-md-2">
                    <?php echo $this->Form->input('temp_instruments_id', array('id' => 'val_instrument', 'class' => 'form-control instrumentid', 'label' => false, 'type' => 'select', 'empty' => '-- Select Instrument --','options' => $instruments_list,'default' => $uncertainty['Tempuncertainty']['temp_instruments_id'])); ?>
                    <input type="hidden" name="data[Uncertainty][instrumentname]" class="instrumentname" value="<?php echo $uncertainty['Tempuncertainty']['instrumentname'];?>" />
                </div>
              <label class="col-md-2 control-label" for="val_duedate">Due Date </label>
                <div class="col-md-2">
                    <?php echo $this->Form->input('duedate', array('id' => 'val_duedate', 'class' => 'form-control input-datepicker-close', 'data-date-format' => 'dd-MM-yy',
                        'placeholder' => 'Enter the Due Date', 'label' => false,'value'=> $uncertainty['Tempuncertainty']['duedate']));
                    ?>
                </div>
                <label class="col-md-2 control-label" for="val_tagno">Tag No</label>
                 <div class="col-md-2">
                    <?php echo $this->Form->input('tagno', array('id' => 'val_tagno', 'class' => 'form-control tagno', 'placeholder' => 'Enter the TAG No', 'label' => false,'autoComplete'=>'off','value'=> $uncertainty['Tempuncertainty']['tagno'])); ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="val_procno">Procedure No</label>
                <div class="col-md-2">
                    <?php echo $this->Form->input('procedureno', array('id' => 'val_procno', 'class' => 'form-control', 'placeholder' => 'Enter the Procedure No', 'label' => false,'autoComplete'=>'off','value'=> $uncertainty['Tempuncertainty']['procedureno'])); ?>
                </div>
                 
                <label class="col-md-2 control-label" for="val_caldate">Cal Date</label>
                <div class="col-md-2">
                    <?php echo $this->Form->input('caldate', array('id' => 'val_caldate', 'class' => 'form-control input-datepicker-close', 'data-date-format' => 'dd-MM-yy',
                        'placeholder' => 'Enter Calibration Date', 'label' => false,'value'=> $uncertainty['Tempuncertainty']['caldate']));
                    ?>
                </div>
                <label class="col-md-2 control-label" for="val_duedate">Remarks  </label>
                 <div class="col-md-2">
            <?php
                echo $this->Form->input('remarks', array('id' => 'val_remarks', 'class' => 'form-control',
            'placeholder' => 'Enter Remarks', 'label' => false,'type'=>'textarea', 'rows'=>'3','value'=> $uncertainty['Tempuncertainty']['remarks']));
            ?>    
            </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="val_serialno">Serial No </label>
                <div class="col-md-2">
                    <?php echo $this->Form->input('serialno', array('id' => 'val_serialno', 'class' => 'form-control', 'placeholder' => 'Enter the Serial No', 'label' => false,'autoComplete'=>'off','value'=> $uncertainty['Tempuncertainty']['serialno'])); ?>
                </div>
             <div class="col-md-4">
						<label class="col-md-6 control-label" for="val_ref_no">Active</label>
						<div class="col-md-2">
							<input  class="" type="checkbox" value="" name="" <?php if($uncertainty['Tempuncertainty']['status'] == 1) { echo 'checked="checked"'; }?> />
						</div>
					</div>
                    <div class="col-md-4">
						<label class="col-md-6 control-label" for="val_ref_no">Is Visible In Report</label>
						<div class="col-md-2 padding_l_7">
							<input  class="" type="checkbox" value="" name="" <?php if($uncertainty['Tempuncertainty']['is_visible'] == 1) { echo 'checked="checked"'; }?> />
						</div>
					</div>
            </div>
             <?php 	echo $this->Form->end(); ?>
            <?php echo $this->Form->create('Tempuncertaintydata', array('class' => 'form-horizontal form-bordered ajaxform', 'id' => 'fileupload', 'enctype' => 'multipart/form-data')); ?>
            <?php echo $this->Form->input('Tempuncertaintydata.temp_uncertainty_id', array('type'=>'hidden','value'=>$temp_ins_id)); ?>
            <?php echo $this->Form->input('Tempuncertaintydata.sendtype', array('type'=>'hidden','value'=>'edit')); ?>
            <?php //echo $this->Form->end(); ?>
            <div class="col-lg-12">
                <h4 class="sub-header"><small>Uncertainty</small></h4>
                <?php echo $this->Form->button('<i class="fa fa-plus"></i> Refresh data', array('type' => 'button', 'class' => 'btn btn-sm btn-primary add_new_bulk_data','id'=>'','escape' => false)); ?> &nbsp;
            </div>
            <div class="col-lg-12">
               <div class="col-lg-6 row">
                      <div class="col-md-12">
                      <div class="form-group pull-right col-md-12">
                        <label class="col-md-5 control-label row" for="val_range">Range </label>
                        <div class="col-md-7">
                            <?php echo $this->Form->input('range_id', array('id' => 'val_range', 'class' => 'form-control', 'placeholder' => 'Enter the Range', 'label' => false,'autoComplete'=>'off','type'=>'text')); ?>
                            <?php echo $this->Form->input('range_id_hid', array('id' => 'val_range_hid', 'class' => 'form-control', 'label' => false,'autoComplete'=>'off','type'=>'hidden')); ?>
                            <div id="search_instrument" class="instrument_drop">  </div>
                        </div>
                        
                       </div>
                    </div>
                    <div class="form-group col-md-12">
                      <div class="col-md-12">
                        <label class="col-md-1 control-label" for="val_uref1">Uref1 </label>
                        <div class="col-md-4">
                            <?php echo $this->Form->input('uref1_data1', array('id' => 'val_uref1_data1', 'class' => 'form-control', 'placeholder' => 'Enter the Uref1', 'label' => false,'autoComplete'=>'off')); ?>
                        </div>
                        <div class="col-md-4">
                           <?php echo $this->Form->input('uref1_data2', array('id' => 'val_uref1_data2', 'class' => 'form-control uref_drpdwn', 'label' => false, 'type' => 'select', 'options'=>array('1'=>'Value','2'=>'% on Reading','3'=>'% on Fullscale'))); ?>
                        </div>
                        <div class="col-md-3">
                            <?php echo $this->Form->input('uref1_data3', array('id' => 'val_uref1_data3', 'class' => 'form-control drpdwn_value', 'label' => false, 'placeholder' => '')); ?>
                        </div>             
                   </div>
                </div>
                <div class="form-group col-md-12">
                      <div class="col-md-12">
                        <label class="col-md-1 control-label" for="val_duedate">Uref2 </label>
                        <div class="col-md-4">
                            <?php echo $this->Form->input('uref2_data1', array('id' => 'val_uref2_data1', 'class' => 'form-control', 'placeholder' => '', 'label' => false,'autoComplete'=>'off')); ?>
                        
                        </div>
                        <div class="col-md-4">
                           <?php echo $this->Form->input('uref2_data2', array('id' => 'val_uref2_data2', 'class' => 'form-control uref_drpdwn', 'label' => false, 'type' => 'select', 'options'=>array('1'=>'Value','2'=>'% on Reading','3'=>'% on Fullscale'))); ?>
                        
                        </div>
                        <div class="col-md-3">
                            <?php echo $this->Form->input('uref2_data3', array('id' => 'val_uref2_data3', 'class' => 'form-control', 'label' => false, 'placeholder' => '')); ?>
                        </div>             
                   </div>
                </div>
                <div class="form-group col-md-12">
                      <div class="col-md-12">
                        <label class="col-md-1 control-label" for="val_duedate">Uref3 </label>
                        <div class="col-md-4">
                            <?php echo $this->Form->input('uref3_data1', array('id' => 'val_uref3_data1', 'class' => 'form-control', 'placeholder' => '', 'label' => false,'autoComplete'=>'off')); ?>
                        
                        </div>
                        <div class="col-md-4">
                           <?php echo $this->Form->input('uref3_data2', array('id' => 'val_uref3_data2', 'class' => 'form-control uref_drpdwn', 'label' => false, 'type' => 'select','options'=>array('1'=>'Value','2'=>'% on Reading','3'=>'% on Fullscale'))); ?>
                        
                        </div>
                        <div class="col-md-3">
                            <?php echo $this->Form->input('uref3_data3', array('id' => 'val_uref3_data3', 'class' => 'form-control', 'label' => false, 'placeholder' => '')); ?>
                        </div>             
                   </div>
                </div>
                <div class="form-group col-md-12">
                      <div class="col-md-12">
                        <label class="col-md-1 control-label" for="val_duedate">Uacc1 </label>
                        <div class="col-md-4">
                            <?php echo $this->Form->input('uacc1_data1', array('id' => 'val_uacc1_data1', 'class' => 'form-control', 'placeholder' => '', 'label' => false,'autoComplete'=>'off')); ?>
                        
                        </div>
                        <div class="col-md-4">
                           <?php echo $this->Form->input('uacc1_data2', array('id' => 'val_uacc1_data2', 'class' => 'form-control', 'label' => false, 'type' => 'select','options'=>array('1'=>'Value','2'=>'% on Reading','3'=>'% on Fullscale'))); ?>
                        
                        </div>
                        <div class="col-md-3">
                            <?php echo $this->Form->input('uacc1_data3', array('id' => 'val_uacc1_data3', 'class' => 'form-control', 'label' => false, 'placeholder' => '')); ?>
                        </div>             
                   </div>
                </div>
                <div class="form-group col-md-12">
                      <div class="col-md-12">
                        <label class="col-md-1 control-label" for="val_duedate">Uacc2 </label>
                        <div class="col-md-4">
                            <?php echo $this->Form->input('uacc2_data1', array('id' => 'val_uacc2_data1', 'class' => 'form-control', 'placeholder' => '', 'label' => false,'autoComplete'=>'off')); ?>
                        
                        </div>
                        <div class="col-md-4">
                           <?php echo $this->Form->input('uacc2_data2', array('id' => 'val_uacc2_data2', 'class' => 'form-control', 'label' => false, 'type' => 'select', 'options'=>array('1'=>'Value','2'=>'% on Reading','3'=>'% on Fullscale'))); ?>
                        
                        </div>
                        <div class="col-md-3">
                            <?php echo $this->Form->input('uacc2_data3', array('id' => 'val_uacc2_data3', 'class' => 'form-control', 'label' => false, 'placeholder' => '')); ?>
                        </div>             
                   </div>
                </div>
                <div class="form-group col-md-12">
                      <div class="col-md-12">
                        <label class="col-md-1 control-label" for="val_duedate">Uacc3 </label>
                        <div class="col-md-4">
                            <?php echo $this->Form->input('uacc3_data1', array('id' => 'val_uacc3_data1', 'class' => 'form-control', 'placeholder' => '', 'label' => false,'autoComplete'=>'off')); ?>
                        
                        </div>
                        <div class="col-md-4">
                           <?php echo $this->Form->input('uacc3_data2', array('id' => 'val_uacc3_data2', 'class' => 'form-control', 'label' => false, 'type' => 'select', 'options'=>array('1'=>'Value','2'=>'% on Reading','3'=>'% on Fullscale'))); ?>
                        
                        </div>
                        <div class="col-md-3">
                            <?php echo $this->Form->input('uacc3_data3', array('id' => 'val_uacc3_data3', 'class' => 'form-control', 'label' => false, 'placeholder' => '')); ?>
                        </div>             
                   </div>
                </div>
                <div class="form-group pull-right col-md-12">
                        <label class="col-md-5 control-label row" for="val_duedate">Urefdivisor </label>
                        <div class="col-md-7">
                            <?php echo $this->Form->input('urefdivisor', array('id' => 'val_urefdivisor', 'class' => 'form-control', 'placeholder' => '', 'label' => false,'autoComplete'=>'off','value'=>'0')); ?>
                        </div>
                       </div>
                       <div class="form-group pull-right col-md-12">
                        <label class="col-md-5 control-label row" for="val_duedate">Uresdivisoranalog </label>
                        <div class="col-md-7">
                            <?php echo $this->Form->input('uresdivisoranalog', array('id' => 'val_uresdivisoranalog', 'class' => 'form-control', 'placeholder' => '', 'label' => false,'autoComplete'=>'off','value'=>'0')); ?>
                        </div>
                       </div>
                       <div class="form-group pull-right col-md-12">
                        <label class="col-md-5 control-label row" for="val_duedate">Uresdivisordigital </label>
                        <div class="col-md-7">
                            <?php echo $this->Form->input('uresdivisordigital', array('id' => 'val_uresdivisordigital', 'class' => 'form-control', 'placeholder' => '', 'label' => false,'autoComplete'=>'off','value'=>'0')); ?>
                        </div>
                       </div>
                       <div class="form-group pull-right col-md-12">
                        <label class="col-md-5 control-label row" for="val_duedate">Urepdivisor </label>
                        <div class="col-md-7">
                            <?php echo $this->Form->input('urepdivisor', array('id' => 'val_urepdivisor', 'class' => 'form-control', 'placeholder' => '', 'label' => false,'autoComplete'=>'off','value'=>'0')); ?>
                        </div>
                       </div>
                       <div class="form-group pull-right col-md-12">
                        <label class="col-md-5 control-label row" for="val_duedate">Divisor </label>
                        <div class="col-md-7">
                            <?php echo $this->Form->input('divisor', array('id' => 'val_divisor', 'class' => 'form-control', 'placeholder' => '', 'label' => false,'autoComplete'=>'off','value'=>'0')); ?>
                        </div>
                       </div>
                        <div class="form-group col-md-12">
                            <div class="col-md-12">
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('u1_data1', array('id' => 'val_u1_data1', 'class' => 'form-control', 'label' => false, 'type' => 'select', 'empty' => '-- Select Uncertainty --','options' => array('1' => 'uicestability','2' => 'ustability','3' => 'uuniformity','4' => 'udrift',
                                           '5' => 'uimm','6' => 'uheateffect','7' => 'ugravity','8' => 'uother1','9' => 'uother2','10' => 'uother3','11' => 'uother4','12' => 'uother5','13' => 'uother6','14' => 'uother7','15' => 'uother8','16' => 'uother9','17' => 'uother10','18' => 'uother11','19' => 'uother12',
                                           '20' => 'uother13',), )); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('u1_data2', array('id' => 'val_u1_data2', 'class' => 'form-control', 'placeholder' => '', 'label' => false,'autoComplete'=>'off')); ?>
                                
                                </div>
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('u1_data3', array('id' => 'val_u1_data3', 'class' => 'form-control', 'label' => false, 'type' => 'select','options'=>array('1'=>'Value','2'=>'% on Reading','3'=>'% on Fullscale'))); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('u1_data4', array('id' => 'val_u1_data4', 'class' => 'form-control', 'label' => false, 'placeholder' => '')); ?>
                                </div>             
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="col-md-12">
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('u2_data1', array('id' => 'val_u2_data1', 'class' => 'form-control', 'label' => false, 'type' => 'select', 'empty' => '-- Select Uncertainty --','options' => array('1' => 'uicestability','2' => 'ustability','3' => 'uuniformity','4' => 'udrift',
                                           '5' => 'uimm','6' => 'uheateffect','7' => 'ugravity','8' => 'uother1','9' => 'uother2','10' => 'uother3','11' => 'uother4','12' => 'uother5','13' => 'uother6','14' => 'uother7','15' => 'uother8','16' => 'uother9','17' => 'uother10','18' => 'uother11','19' => 'uother12',
                                           '20' => 'uother13',), )); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('u2_data2', array('id' => 'val_u2_data2', 'class' => 'form-control', 'placeholder' => '', 'label' => false,'autoComplete'=>'off')); ?>
                                
                                </div>
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('u2_data3', array('id' => 'val_u2_data3', 'class' => 'form-control', 'label' => false, 'type' => 'select','options'=>array('1'=>'Value','2'=>'% on Reading','3'=>'% on Fullscale'))); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('u2_data4', array('id' => 'val_u2_data4', 'class' => 'form-control', 'label' => false, 'placeholder' => '')); ?>
                                </div>             
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="col-md-12">
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('u3_data1', array('id' => 'val_u3_data1', 'class' => 'form-control', 'label' => false, 'type' => 'select', 'empty' => '-- Select Uncertainty --','options' => array('1' => 'uicestability','2' => 'ustability','3' => 'uuniformity','4' => 'udrift',
                                           '5' => 'uimm','6' => 'uheateffect','7' => 'ugravity','8' => 'uother1','9' => 'uother2','10' => 'uother3','11' => 'uother4','12' => 'uother5','13' => 'uother6','14' => 'uother7','15' => 'uother8','16' => 'uother9','17' => 'uother10','18' => 'uother11','19' => 'uother12',
                                           '20' => 'uother13',), )); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('u3_data2', array('id' => 'val_u3_data2', 'class' => 'form-control', 'placeholder' => '', 'label' => false,'autoComplete'=>'off')); ?>
                                
                                </div>
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('u3_data3', array('id' => 'val_u3_data3', 'class' => 'form-control', 'label' => false, 'type' => 'select','options'=>array('1'=>'Value','2'=>'% on Reading','3'=>'% on Fullscale'))); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('u3_data4', array('id' => 'val_u3_data4', 'class' => 'form-control', 'label' => false, 'placeholder' => '')); ?>
                                </div>             
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="col-md-12">
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('u4_data1', array('id' => 'val_u4_data1', 'class' => 'form-control', 'label' => false, 'type' => 'select', 'empty' => '-- Select Uncertainty --','options' => array('1' => 'uicestability','2' => 'ustability','3' => 'uuniformity','4' => 'udrift',
                                           '5' => 'uimm','6' => 'uheateffect','7' => 'ugravity','8' => 'uother1','9' => 'uother2','10' => 'uother3','11' => 'uother4','12' => 'uother5','13' => 'uother6','14' => 'uother7','15' => 'uother8','16' => 'uother9','17' => 'uother10','18' => 'uother11','19' => 'uother12',
                                           '20' => 'uother13',), )); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('u4_data2', array('id' => 'val_u4_data2', 'class' => 'form-control', 'placeholder' => '', 'label' => false,'autoComplete'=>'off')); ?>
                                
                                </div>
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('u4_data3', array('id' => 'val_u4_data3', 'class' => 'form-control', 'label' => false, 'type' => 'select','options'=>array('1'=>'Value','2'=>'% on Reading','3'=>'% on Fullscale'))); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('u4_data4', array('id' => 'val_u4_data4', 'class' => 'form-control', 'label' => false, 'placeholder' => '')); ?>
                                </div>             
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="col-md-12">
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('u5_data1', array('id' => 'val_u5_data1', 'class' => 'form-control', 'label' => false, 'type' => 'select', 'empty' => '-- Select Uncertainty --','options' => array('1' => 'uicestability','2' => 'ustability','3' => 'uuniformity','4' => 'udrift',
                                           '5' => 'uimm','6' => 'uheateffect','7' => 'ugravity','8' => 'uother1','9' => 'uother2','10' => 'uother3','11' => 'uother4','12' => 'uother5','13' => 'uother6','14' => 'uother7','15' => 'uother8','16' => 'uother9','17' => 'uother10','18' => 'uother11','19' => 'uother12',
                                           '20' => 'uother13',), )); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('u5_data2', array('id' => 'val_u5_data2', 'class' => 'form-control', 'placeholder' => '', 'label' => false,'autoComplete'=>'off')); ?>
                                
                                </div>
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('u5_data3', array('id' => 'val_u5_data3', 'class' => 'form-control', 'label' => false, 'type' => 'select','options'=>array('1'=>'Value','2'=>'% on Reading','3'=>'% on Fullscale'))); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('u5_data4', array('id' => 'val_u5_data4', 'class' => 'form-control', 'label' => false, 'placeholder' => '')); ?>
                                </div>             
                            </div>
                        </div>
               </div>
                    <div class="col-lg-6 row">
                      <div class="form-group col-md-12">
                            <div class="col-md-12">
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('u6_data1', array('id' => 'val_u6_data1', 'class' => 'form-control', 'label' => false, 'type' => 'select', 'empty' => '-- Select Uncertainty --','options' => array('1' => 'uicestability','2' => 'ustability','3' => 'uuniformity','4' => 'udrift',
                                           '5' => 'uimm','6' => 'uheateffect','7' => 'ugravity','8' => 'uother1','9' => 'uother2','10' => 'uother3','11' => 'uother4','12' => 'uother5','13' => 'uother6','14' => 'uother7','15' => 'uother8','16' => 'uother9','17' => 'uother10','18' => 'uother11','19' => 'uother12',
                                           '20' => 'uother13',), )); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('u6_data2', array('id' => 'val_u6_data2', 'class' => 'form-control', 'placeholder' => '', 'label' => false,'autoComplete'=>'off')); ?>
                                
                                </div>
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('u6_data3', array('id' => 'val_u6_data3', 'class' => 'form-control', 'label' => false, 'type' => 'select','options'=>array('1'=>'Value','2'=>'% on Reading','3'=>'% on Fullscale'))); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('u6_data4', array('id' => 'val_u6_data4', 'class' => 'form-control', 'label' => false, 'placeholder' => '')); ?>
                                </div>             
                            </div>
                        </div>
                      <div class="form-group col-md-12">
                            <div class="col-md-12">
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('u7_data1', array('id' => 'val_u7_data1', 'class' => 'form-control', 'label' => false, 'type' => 'select', 'empty' => '-- Select Uncertainty --','options' => array('1' => 'uicestability','2' => 'ustability','3' => 'uuniformity','4' => 'udrift',
                                           '5' => 'uimm','6' => 'uheateffect','7' => 'ugravity','8' => 'uother1','9' => 'uother2','10' => 'uother3','11' => 'uother4','12' => 'uother5','13' => 'uother6','14' => 'uother7','15' => 'uother8','16' => 'uother9','17' => 'uother10','18' => 'uother11','19' => 'uother12',
                                           '20' => 'uother13',), )); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('u7_data2', array('id' => 'val_u7_data2', 'class' => 'form-control', 'placeholder' => '', 'label' => false,'autoComplete'=>'off')); ?>
                                
                                </div>
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('u7_data3', array('id' => 'val_u7_data3', 'class' => 'form-control', 'label' => false, 'type' => 'select','options'=>array('1'=>'Value','2'=>'% on Reading','3'=>'% on Fullscale'))); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('u7_data4', array('id' => 'val_u7_data4', 'class' => 'form-control', 'label' => false, 'placeholder' => '')); ?>
                                </div>             
                            </div>
                        </div>
                      <div class="form-group col-md-12">
                            <div class="col-md-12">
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('u8_data1', array('id' => 'val_u8_data1', 'class' => 'form-control', 'label' => false, 'type' => 'select', 'empty' => '-- Select Uncertainty --','options' => array('1' => 'uicestability','2' => 'ustability','3' => 'uuniformity','4' => 'udrift',
                                           '5' => 'uimm','6' => 'uheateffect','7' => 'ugravity','8' => 'uother1','9' => 'uother2','10' => 'uother3','11' => 'uother4','12' => 'uother5','13' => 'uother6','14' => 'uother7','15' => 'uother8','16' => 'uother9','17' => 'uother10','18' => 'uother11','19' => 'uother12',
                                           '20' => 'uother13',), )); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('u8_data2', array('id' => 'val_u8_data2', 'class' => 'form-control', 'placeholder' => '', 'label' => false,'autoComplete'=>'off')); ?>
                                
                                </div>
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('u8_data3', array('id' => 'val_u8_data3', 'class' => 'form-control', 'label' => false, 'type' => 'select','options'=>array('1'=>'Value','2'=>'% on Reading','3'=>'% on Fullscale'))); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('u8_data4', array('id' => 'val_u8_data4', 'class' => 'form-control', 'label' => false, 'placeholder' => '')); ?>
                                </div>             
                            </div>
                        </div>
                      <div class="form-group col-md-12">
                            <div class="col-md-12">
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('u9_data1', array('id' => 'val_u9_data1', 'class' => 'form-control', 'label' => false, 'type' => 'select', 'empty' => '-- Select Uncertainty --','options' => array('1' => 'uicestability','2' => 'ustability','3' => 'uuniformity','4' => 'udrift',
                                           '5' => 'uimm','6' => 'uheateffect','7' => 'ugravity','8' => 'uother1','9' => 'uother2','10' => 'uother3','11' => 'uother4','12' => 'uother5','13' => 'uother6','14' => 'uother7','15' => 'uother8','16' => 'uother9','17' => 'uother10','18' => 'uother11','19' => 'uother12',
                                           '20' => 'uother13',), )); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('u9_data2', array('id' => 'val_u9_data2', 'class' => 'form-control', 'placeholder' => '', 'label' => false,'autoComplete'=>'off')); ?>
                                
                                </div>
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('u9_data3', array('id' => 'val_u9_data3', 'class' => 'form-control', 'label' => false, 'type' => 'select','options'=>array('1'=>'Value','2'=>'% on Reading','3'=>'% on Fullscale'))); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('u9_data4', array('id' => 'val_u9_data4', 'class' => 'form-control', 'label' => false, 'placeholder' => '')); ?>
                                </div>             
                            </div>
                        </div>
                      <div class="form-group col-md-12">
                            <div class="col-md-12">
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('u10_data1', array('id' => 'val_u10_data1', 'class' => 'form-control', 'label' => false, 'type' => 'select', 'empty' => '-- Select Uncertainty --','options' => array('1' => 'uicestability','2' => 'ustability','3' => 'uuniformity','4' => 'udrift',
                                           '5' => 'uimm','6' => 'uheateffect','7' => 'ugravity','8' => 'uother1','9' => 'uother2','10' => 'uother3','11' => 'uother4','12' => 'uother5','13' => 'uother6','14' => 'uother7','15' => 'uother8','16' => 'uother9','17' => 'uother10','18' => 'uother11','19' => 'uother12',
                                           '20' => 'uother13',), )); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('u10_data2', array('id' => 'val_u10_data2', 'class' => 'form-control', 'placeholder' => '', 'label' => false,'autoComplete'=>'off')); ?>
                                
                                </div>
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('u10_data3', array('id' => 'val_u10_data3', 'class' => 'form-control', 'label' => false, 'type' => 'select','options'=>array('1'=>'Value','2'=>'% on Reading','3'=>'% on Fullscale'))); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('u10_data4', array('id' => 'val_u10_data4', 'class' => 'form-control', 'label' => false, 'placeholder' => '')); ?>
                                </div>             
                            </div>
                        </div>
                      <div class="form-group col-md-12">
                            <div class="col-md-12">
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('u11_data1', array('id' => 'val_u11_data1', 'class' => 'form-control', 'label' => false, 'type' => 'select', 'empty' => '-- Select Uncertainty --','options' => array('1' => 'uicestability','2' => 'ustability','3' => 'uuniformity','4' => 'udrift',
                                           '5' => 'uimm','6' => 'uheateffect','7' => 'ugravity','8' => 'uother1','9' => 'uother2','10' => 'uother3','11' => 'uother4','12' => 'uother5','13' => 'uother6','14' => 'uother7','15' => 'uother8','16' => 'uother9','17' => 'uother10','18' => 'uother11','19' => 'uother12',
                                           '20' => 'uother13',), )); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('u11_data2', array('id' => 'val_u11_data2', 'class' => 'form-control', 'placeholder' => '', 'label' => false,'autoComplete'=>'off')); ?>
                                
                                </div>
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('u11_data3', array('id' => 'val_u11_data3', 'class' => 'form-control', 'label' => false, 'type' => 'select','options'=>array('1'=>'Value','2'=>'% on Reading','3'=>'% on Fullscale'))); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('u11_data4', array('id' => 'val_u11_data4', 'class' => 'form-control', 'label' => false, 'placeholder' => '')); ?>
                                </div>             
                            </div>
                        </div>
                      <div class="form-group col-md-12">
                            <div class="col-md-12">
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('u12_data1', array('id' => 'val_u12_data1', 'class' => 'form-control', 'label' => false, 'type' => 'select', 'empty' => '-- Select Uncertainty --','options' => array('1' => 'uicestability','2' => 'ustability','3' => 'uuniformity','4' => 'udrift',
                                           '5' => 'uimm','6' => 'uheateffect','7' => 'ugravity','8' => 'uother1','9' => 'uother2','10' => 'uother3','11' => 'uother4','12' => 'uother5','13' => 'uother6','14' => 'uother7','15' => 'uother8','16' => 'uother9','17' => 'uother10','18' => 'uother11','19' => 'uother12',
                                           '20' => 'uother13',), )); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('u12_data2', array('id' => 'val_u12_data2', 'class' => 'form-control', 'placeholder' => '', 'label' => false,'autoComplete'=>'off')); ?>
                                
                                </div>
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('u12_data3', array('id' => 'val_u12_data3', 'class' => 'form-control', 'label' => false, 'type' => 'select','options'=>array('1'=>'Value','2'=>'% on Reading','3'=>'% on Fullscale'))); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('u12_data4', array('id' => 'val_u12_data4', 'class' => 'form-control', 'label' => false, 'placeholder' => '')); ?>
                                </div>             
                            </div>
                        </div>
                      <div class="form-group col-md-12">
                            <div class="col-md-12">
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('u13_data1', array('id' => 'val_u13_data1', 'class' => 'form-control', 'label' => false, 'type' => 'select', 'empty' => '-- Select Uncertainty --','options' => array('1' => 'uicestability','2' => 'ustability','3' => 'uuniformity','4' => 'udrift',
                                           '5' => 'uimm','6' => 'uheateffect','7' => 'ugravity','8' => 'uother1','9' => 'uother2','10' => 'uother3','11' => 'uother4','12' => 'uother5','13' => 'uother6','14' => 'uother7','15' => 'uother8','16' => 'uother9','17' => 'uother10','18' => 'uother11','19' => 'uother12',
                                           '20' => 'uother13',), )); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('u13_data2', array('id' => 'val_u13_data2', 'class' => 'form-control', 'placeholder' => '', 'label' => false,'autoComplete'=>'off')); ?>
                                
                                </div>
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('u13_data3', array('id' => 'val_u13_data3', 'class' => 'form-control', 'label' => false, 'type' => 'select','options'=>array('1'=>'Value','2'=>'% on Reading','3'=>'% on Fullscale'))); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('u13_data4', array('id' => 'val_u13_data4', 'class' => 'form-control', 'label' => false, 'placeholder' => '')); ?>
                                </div>             
                            </div>
                        </div>
                      <div class="form-group col-md-12">
                            <div class="col-md-12">
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('u14_data1', array('id' => 'val_u14_data1', 'class' => 'form-control', 'label' => false, 'type' => 'select', 'empty' => '-- Select Uncertainty --','options' => array('1' => 'uicestability','2' => 'ustability','3' => 'uuniformity','4' => 'udrift',
                                           '5' => 'uimm','6' => 'uheateffect','7' => 'ugravity','8' => 'uother1','9' => 'uother2','10' => 'uother3','11' => 'uother4','12' => 'uother5','13' => 'uother6','14' => 'uother7','15' => 'uother8','16' => 'uother9','17' => 'uother10','18' => 'uother11','19' => 'uother12',
                                           '20' => 'uother13',), )); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('u14_data2', array('id' => 'val_u14_data2', 'class' => 'form-control', 'placeholder' => '', 'label' => false,'autoComplete'=>'off')); ?>
                                
                                </div>
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('u14_data3', array('id' => 'val_u14_data3', 'class' => 'form-control', 'label' => false, 'type' => 'select','options'=>array('1'=>'Value','2'=>'% on Reading','3'=>'% on Fullscale'))); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('u14_data4', array('id' => 'val_u14_data4', 'class' => 'form-control', 'label' => false, 'placeholder' => '')); ?>
                                </div>             
                            </div>
                        </div>
                      <div class="form-group col-md-12">
                            <div class="col-md-12">
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('u15_data1', array('id' => 'val_u15_data1', 'class' => 'form-control', 'label' => false, 'type' => 'select', 'empty' => '-- Select Uncertainty --','options' => array('1' => 'uicestability','2' => 'ustability','3' => 'uuniformity','4' => 'udrift',
                                           '5' => 'uimm','6' => 'uheateffect','7' => 'ugravity','8' => 'uother1','9' => 'uother2','10' => 'uother3','11' => 'uother4','12' => 'uother5','13' => 'uother6','14' => 'uother7','15' => 'uother8','16' => 'uother9','17' => 'uother10','18' => 'uother11','19' => 'uother12',
                                           '20' => 'uother13',), )); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('u15_data2', array('id' => 'val_u15_data2', 'class' => 'form-control', 'placeholder' => '', 'label' => false,'autoComplete'=>'off')); ?>
                                
                                </div>
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('u15_data3', array('id' => 'val_u15_data3', 'class' => 'form-control', 'label' => false, 'type' => 'select','options'=>array('1'=>'Value','2'=>'% on Reading','3'=>'% on Fullscale'))); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('u15_data4', array('id' => 'val_u15_data4', 'class' => 'form-control', 'label' => false, 'placeholder' => '')); ?>
                                </div>             
                            </div>
                        </div>
                      <div class="form-group col-md-12">
                            <div class="col-md-12">
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('u16_data1', array('id' => 'val_u16_data1', 'class' => 'form-control', 'label' => false, 'type' => 'select', 'empty' => '-- Select Uncertainty --','options' => array('1' => 'uicestability','2' => 'ustability','3' => 'uuniformity','4' => 'udrift',
                                           '5' => 'uimm','6' => 'uheateffect','7' => 'ugravity','8' => 'uother1','9' => 'uother2','10' => 'uother3','11' => 'uother4','12' => 'uother5','13' => 'uother6','14' => 'uother7','15' => 'uother8','16' => 'uother9','17' => 'uother10','18' => 'uother11','19' => 'uother12',
                                           '20' => 'uother13',), )); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('u16_data2', array('id' => 'val_u16_data2', 'class' => 'form-control', 'placeholder' => '', 'label' => false,'autoComplete'=>'off')); ?>
                                
                                </div>
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('u16_data3', array('id' => 'val_u16_data3', 'class' => 'form-control', 'label' => false, 'type' => 'select','options'=>array('1'=>'Value','2'=>'% on Reading','3'=>'% on Fullscale'))); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('u16_data4', array('id' => 'val_u16_data4', 'class' => 'form-control', 'label' => false, 'placeholder' => '')); ?>
                                </div>             
                            </div>
                        </div>
                      <div class="form-group col-md-12">
                            <div class="col-md-12">
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('u17_data1', array('id' => 'val_u17_data1', 'class' => 'form-control', 'label' => false, 'type' => 'select', 'empty' => '-- Select Uncertainty --','options' => array('1' => 'uicestability','2' => 'ustability','3' => 'uuniformity','4' => 'udrift',
                                           '5' => 'uimm','6' => 'uheateffect','7' => 'ugravity','8' => 'uother1','9' => 'uother2','10' => 'uother3','11' => 'uother4','12' => 'uother5','13' => 'uother6','14' => 'uother7','15' => 'uother8','16' => 'uother9','17' => 'uother10','18' => 'uother11','19' => 'uother12',
                                           '20' => 'uother13',), )); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('u17_data2', array('id' => 'val_u17_data2', 'class' => 'form-control', 'placeholder' => '', 'label' => false,'autoComplete'=>'off')); ?>
                                
                                </div>
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('u17_data3', array('id' => 'val_u17_data3', 'class' => 'form-control', 'label' => false, 'type' => 'select','options'=>array('1'=>'Value','2'=>'% on Reading','3'=>'% on Fullscale'))); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('u17_data4', array('id' => 'val_u17_data4', 'class' => 'form-control', 'label' => false, 'placeholder' => '')); ?>
                                </div>             
                            </div>
                        </div>
                      <div class="form-group col-md-12">
                            <div class="col-md-12">
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('u18_data1', array('id' => 'val_u18_data1', 'class' => 'form-control', 'label' => false, 'type' => 'select', 'empty' => '-- Select Uncertainty --','options' => array('1' => 'uicestability','2' => 'ustability','3' => 'uuniformity','4' => 'udrift',
                                           '5' => 'uimm','6' => 'uheateffect','7' => 'ugravity','8' => 'uother1','9' => 'uother2','10' => 'uother3','11' => 'uother4','12' => 'uother5','13' => 'uother6','14' => 'uother7','15' => 'uother8','16' => 'uother9','17' => 'uother10','18' => 'uother11','19' => 'uother12',
                                           '20' => 'uother13',), )); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('u18_data2', array('id' => 'val_u18_data1', 'class' => 'form-control', 'placeholder' => '', 'label' => false,'autoComplete'=>'off')); ?>
                                
                                </div>
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('u18_data3', array('id' => 'val_u18_data1', 'class' => 'form-control', 'label' => false, 'type' => 'select','options'=>array('1'=>'Value','2'=>'% on Reading','3'=>'% on Fullscale'))); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('u18_data4', array('id' => 'val_u18_data1', 'class' => 'form-control', 'label' => false, 'placeholder' => '')); ?>
                                </div>             
                            </div>
                        </div>
                      <div class="form-group col-md-12">
                            <div class="col-md-12">
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('u19_data1', array('id' => 'val_u19_data1', 'class' => 'form-control', 'label' => false, 'type' => 'select', 'empty' => '-- Select Uncertainty --','options' => array('1' => 'uicestability','2' => 'ustability','3' => 'uuniformity','4' => 'udrift',
                                           '5' => 'uimm','6' => 'uheateffect','7' => 'ugravity','8' => 'uother1','9' => 'uother2','10' => 'uother3','11' => 'uother4','12' => 'uother5','13' => 'uother6','14' => 'uother7','15' => 'uother8','16' => 'uother9','17' => 'uother10','18' => 'uother11','19' => 'uother12',
                                           '20' => 'uother13',), )); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('u19_data2', array('id' => 'val_u19_data2', 'class' => 'form-control', 'placeholder' => '', 'label' => false,'autoComplete'=>'off')); ?>
                                
                                </div>
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('u19_data3', array('id' => 'val_u19_data3', 'class' => 'form-control', 'label' => false, 'type' => 'select','options'=>array('1'=>'Value','2'=>'% on Reading','3'=>'% on Fullscale'))); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('u19_data4', array('id' => 'val_u19_data4', 'class' => 'form-control', 'label' => false, 'placeholder' => '')); ?>
                                </div>             
                            </div>
                        </div>
                      <div class="form-group col-md-12">
                            <div class="col-md-12">
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('u20_data1', array('id' => 'val_u20_data1', 'class' => 'form-control', 'label' => false, 'type' => 'select', 'empty' => '-- Select Uncertainty --','options' => array('1' => 'uicestability','2' => 'ustability','3' => 'uuniformity','4' => 'udrift',
                                           '5' => 'uimm','6' => 'uheateffect','7' => 'ugravity','8' => 'uother1','9' => 'uother2','10' => 'uother3','11' => 'uother4','12' => 'uother5','13' => 'uother6','14' => 'uother7','15' => 'uother8','16' => 'uother9','17' => 'uother10','18' => 'uother11','19' => 'uother12',
                                           '20' => 'uother13',), )); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('u20_data2', array('id' => 'val_u20_data2', 'class' => 'form-control', 'placeholder' => '', 'label' => false,'autoComplete'=>'off')); ?>
                                
                                </div>
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('u20_data3', array('id' => 'val_u20_data3', 'class' => 'form-control', 'label' => false, 'type' => 'select','options'=>array('1'=>'Value','2'=>'% on Reading','3'=>'% on Fullscale'))); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('u20_data4', array('id' => 'val_u20_data4', 'class' => 'form-control', 'label' => false, 'placeholder' => '')); ?>
                                </div>             
                            </div>
                        </div>
                     </div>
                
                <input type="hidden" name="data[Tempuncertaintydata][edit_uncertainty_bulk_id]" class="edit_uncertainty_bulk_id" value="<?php //echo $temp_ins_id; ?>"/>
            </div>
            <div class="col-lg-12">
                <div class="form-group form-actions">
                <div class="col-md-2 pull-right row">
               
                    <?php echo $this->Form->button('<i class="fa fa-plus"></i> Add', array('type' => 'button', 'class' => 'btn btn-sm btn-primary add_all_fields','id'=>'','escape' => false)); ?> &nbsp;
                    
                </div>
            </div>
            </div>
            <div class="col-sm-3 col-lg-12 subcontract_linear uncertainly_table uncertainty_results">
                <table  class="table table-vcenter table-condensed table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">S.No</th>
                            <th class="text-center">Range</th>
                            <th class="text-center">Uref1</th>
                            <th class="text-center">Uref2</th>
                            <th class="text-center">Uref3</th>
                            <th class="text-center">Uacc1</th>
                            <th class="text-center">Uacc2</th>
                            <th class="text-center">Uacc3</th>
                            <th class="text-center">Urefdivisor</th>
                            <th class="text-center">Uresdivisoranalog</th>
                            <th class="text-center">Uresdivisordigital</th>
                            <th class="text-center">Urepdivisor</th>
                            <th class="text-center">Divisor</th>
                            <th class="text-center">Uicestability</th>
                            <th class="text-center">Ustability</th>
                            <th class="text-center">Uuniformity</th>
                            <th class="text-center">Udrift</th>
                            <th class="text-center">Uimm</th>
                            <th class="text-center">Uheateffect</th>
                            <th class="text-center">Ugravity</th>
                            <th class="text-center">Uother1</th>
                            <th class="text-center">Uother2</th>
                            <th class="text-center">Uother3</th>
                            <th class="text-center">Uother4</th>
                            <th class="text-center">Uother5</th>
                            <th class="text-center">Uother6</th>
                            <th class="text-center">Uother7</th>
                            <th class="text-center">Uother8</th>
                            <th class="text-center">Uother9</th>
                            <th class="text-center">Uother10</th>
                            <th class="text-center">Uother11</th>
                            <th class="text-center">Uother12</th>
                            <th class="text-center">Uother13</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="subcontract_instrument_info"> 
                        
                        
                        
                    </tbody>
                </table>
            </div>
            <div class="form-group form-actions">
              
            </div>
            <!-- panel -->
<?php echo $this->Form->end(); ?>
           
            <!-- END Basic Form Elements Content -->
        </div>
        <div class="col-lg-12">
          <div class="form-group form-actions">
                                        <div class="col-md-9 col-md-offset-3">
                                            <?php  echo $this->Form->button('<i class="fa fa-angle-right"></i> Submit',array('type'=>'submit','class'=>'btn btn-sm btn-primary submitUncertaintyForm','escape' => false)); ?>
                                            <?php echo $this->Form->button('<i class="fa fa-repeat"></i> Reset', array('type'=>'reset','class'=>'btn btn-sm btn-warning','escape' => false)); ?>
<!--                                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Submit</button>
                                            <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Reset</button>-->
                                      </div>
         </div>
       </div>  
        <!-- END Basic Form Elements Block -->
    </div>
<?php echo $this->Html->script('pages/formsValidation'); ?>
    <script>$(function() { FormsValidation.init(); });</script>




