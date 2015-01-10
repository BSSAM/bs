<script>
    var path_url='<?PHP echo Router::url('/',true); ?>';
	$(document).ready(function(e) {
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
		   alert("before");
		   $('.ajaxform').submit(); alert("after");
		   
		});
			 $('.ajaxform').ajaxForm({ 
			    url: path_url+'Temperatures/addbulkfields/',
				type: 'post',
				success : function(recievedData)
				{
					//alert('ll');
					//alert(recievedData);
					$('.uncertainty_results').html(recievedData);
					return false;
				},
			});
	
		
		$('.uref_drpdwn').change(function(e) {
            if($(this).val() > 1)
			{  
				$(this).parent().parent().next('div').find('.drpdwn_value').removeAttr('readonly');
			}
			else
			{
				$(this).parent().parent().next('div').find('.drpdwn_value').addAttr('readonly');
			}
        });
    });
</script>
        
<h1>
    <i class="gi gi-user"></i>Add Uncertainty Data
</h1>
</div>
</div>
<ul class="breadcrumb breadcrumb-top">
    <li><?php echo $this->Html->link('Home', array('controller' => 'Dashboards', 'action' => 'index')); ?></li>
    <li><?php echo $this->Html->link('Uncertainty Data', array('controller' => 'Temperatures', 'action' => 'index')); ?></li>
    <li>Add Uncertainty Data</li>
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
                    <?php echo $this->Form->input('temp_instruments_id', array('id' => 'val_instrument', 'class' => 'form-control instrumentid', 'label' => false, 'type' => 'select', 'empty' => '-- Select Instrument --','options' => $instruments_list)); ?>
                    <input type="hidden" name="data[Uncertainty][instrumentname]" class="instrumentname" />
                </div>
              <label class="col-md-2 control-label" for="val_duedate">Due Date </label>
                <div class="col-md-2">
                    <?php echo $this->Form->input('duedate', array('id' => 'val_duedate', 'class' => 'form-control input-datepicker-close', 'data-date-format' => 'dd-MM-yy',
                        'placeholder' => 'Enter the Due Date', 'label' => false));
                    ?>
                </div>
                <label class="col-md-2 control-label" for="val_tagno">Tag No</label>
                 <div class="col-md-2">
                    <?php echo $this->Form->input('tagno', array('id' => 'val_tagno', 'class' => 'form-control tagno', 'placeholder' => 'Enter the TAG No', 'label' => false,'autoComplete'=>'off')); ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="val_procno">Procedure No</label>
                <div class="col-md-2">
                    <?php echo $this->Form->input('procedureno', array('id' => 'val_procno', 'class' => 'form-control', 'placeholder' => 'Enter the Procedure No', 'label' => false,'autoComplete'=>'off')); ?>
                </div>
                 <label class="col-md-2 control-label" for="val_serialno">Serial No </label>
                <div class="col-md-2">
                    <?php echo $this->Form->input('serialno', array('id' => 'val_serialno', 'class' => 'form-control', 'placeholder' => 'Enter the Serial No', 'label' => false,'autoComplete'=>'off')); ?>
                </div>
                <label class="col-md-2 control-label" for="val_caldate">Cal Date</label>
                <div class="col-md-2">
                    <?php echo $this->Form->input('caldate', array('id' => 'val_caldate', 'class' => 'form-control input-datepicker-close', 'data-date-format' => 'dd-MM-yy',
                        'placeholder' => 'Enter Calibration Date', 'label' => false));
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="val_duedate">Remarks  </label>
                 <div class="col-md-2">
            <?php
                echo $this->Form->input('remarks', array('id' => 'val_remarks', 'class' => 'form-control',
            'placeholder' => 'Enter Remarks', 'label' => false,'type'=>'textarea', 'rows'=>'3'));
            ?>    
            </div>
             <div class="col-md-4">
						<label class="col-md-6 control-label" for="val_ref_no">Active</label>
						<div class="col-md-2">
							<input  class="" type="checkbox" value="" name="">
						</div>
					</div>
                    <div class="col-md-4">
						<label class="col-md-6 control-label" for="val_ref_no">Is Visible In Report</label>
						<div class="col-md-2 padding_l_7">
							<input  class="" type="checkbox" value="" name="">
						</div>
					</div>
            </div>
            
            <?php 	echo $this->Form->end(); ?>
            <?php echo $this->Form->create('Tempuncertaintydata', array('class' => 'form-horizontal form-bordered ajaxform', 'id' => 'fileupload', 'enctype' => 'multipart/form-data')); ?>

            <div class="col-lg-12">
                <h4 class="sub-header"><small>Uncertainty</small></h4>
            </div>
            <div class="col-lg-12">
               <div class="col-lg-6 row">
                      <div class="col-md-12">
                      <div class="form-group pull-right col-md-12">
                        <label class="col-md-5 control-label row" for="val_range">Range </label>
                        <div class="col-md-7">
                            <?php echo $this->Form->input('range_id', array('id' => 'val_range', 'class' => 'form-control', 'placeholder' => 'Enter the Range', 'label' => false,'autoComplete'=>'off')); ?>
                        </div>
                       </div>
                    </div>
                    <div class="form-group col-md-12">
                      <div class="col-md-12">
                        <label class="col-md-1 control-label" for="val_uref1">Uref1 </label>
                        <div class="col-md-4">
                            <?php echo $this->Form->input('uref1_data1', array('id' => 'val_uref1', 'class' => 'form-control', 'placeholder' => 'Enter the Uref1', 'label' => false,'autoComplete'=>'off')); ?>
                        </div>
                        <div class="col-md-4">
                           <?php echo $this->Form->input('uref1_data2', array('id' => 'val_attn', 'class' => 'form-control uref_drpdwn', 'label' => false, 'type' => 'select', 'options'=>array('1'=>'Value','2'=>'% on Reading','3'=>'% on Fullscale'))); ?>
                        </div>
                        <div class="col-md-3">
                            <?php echo $this->Form->input('uref1_data3', array('id' => 'val_ref_no', 'class' => 'form-control drpdwn_value', 'label' => false, 'placeholder' => '')); ?>
                        </div>             
                   </div>
                </div>
                <div class="form-group col-md-12">
                      <div class="col-md-12">
                        <label class="col-md-1 control-label" for="val_duedate">Uref2 </label>
                        <div class="col-md-4">
                            <?php echo $this->Form->input('uref2_data1', array('id' => 'val_customername', 'class' => 'form-control', 'placeholder' => '', 'label' => false,'autoComplete'=>'off')); ?>
                        
                        </div>
                        <div class="col-md-4">
                           <?php echo $this->Form->input('uref2_data2', array('id' => 'val_attn', 'class' => 'form-control uref_drpdwn', 'label' => false, 'type' => 'select', 'options'=>array('1'=>'Value','2'=>'% on Reading','3'=>'% on Fullscale'))); ?>
                        
                        </div>
                        <div class="col-md-3">
                            <?php echo $this->Form->input('uref2_data3', array('id' => 'val_ref_no', 'class' => 'form-control', 'label' => false, 'placeholder' => '')); ?>
                        </div>             
                   </div>
                </div>
                <div class="form-group col-md-12">
                      <div class="col-md-12">
                        <label class="col-md-1 control-label" for="val_duedate">Uref3 </label>
                        <div class="col-md-4">
                            <?php echo $this->Form->input('uref3_data1', array('id' => 'val_customername', 'class' => 'form-control', 'placeholder' => '', 'label' => false,'autoComplete'=>'off')); ?>
                        
                        </div>
                        <div class="col-md-4">
                           <?php echo $this->Form->input('uref3_data2', array('id' => 'val_attn', 'class' => 'form-control uref_drpdwn', 'label' => false, 'type' => 'select','options'=>array('1'=>'Value','2'=>'% on Reading','3'=>'% on Fullscale'))); ?>
                        
                        </div>
                        <div class="col-md-3">
                            <?php echo $this->Form->input('uref3_data3', array('id' => 'val_ref_no', 'class' => 'form-control', 'label' => false, 'placeholder' => '')); ?>
                        </div>             
                   </div>
                </div>
                <div class="form-group col-md-12">
                      <div class="col-md-12">
                        <label class="col-md-1 control-label" for="val_duedate">Uacc1 </label>
                        <div class="col-md-4">
                            <?php echo $this->Form->input('uacc1_data1', array('id' => 'val_customername', 'class' => 'form-control', 'placeholder' => '', 'label' => false,'autoComplete'=>'off')); ?>
                        
                        </div>
                        <div class="col-md-4">
                           <?php echo $this->Form->input('uacc1_data2', array('id' => 'val_attn', 'class' => 'form-control', 'label' => false, 'type' => 'select','options'=>array('1'=>'Value','2'=>'% on Reading','3'=>'% on Fullscale'))); ?>
                        
                        </div>
                        <div class="col-md-3">
                            <?php echo $this->Form->input('uacc1_data3', array('id' => 'val_ref_no', 'class' => 'form-control', 'label' => false, 'placeholder' => '')); ?>
                        </div>             
                   </div>
                </div>
                <div class="form-group col-md-12">
                      <div class="col-md-12">
                        <label class="col-md-1 control-label" for="val_duedate">Uacc2 </label>
                        <div class="col-md-4">
                            <?php echo $this->Form->input('uacc2_data1', array('id' => 'val_customername', 'class' => 'form-control', 'placeholder' => '', 'label' => false,'autoComplete'=>'off')); ?>
                        
                        </div>
                        <div class="col-md-4">
                           <?php echo $this->Form->input('uacc2_data2', array('id' => 'val_attn', 'class' => 'form-control', 'label' => false, 'type' => 'select', 'options'=>array('1'=>'Value','2'=>'% on Reading','3'=>'% on Fullscale'))); ?>
                        
                        </div>
                        <div class="col-md-3">
                            <?php echo $this->Form->input('uacc2_data3', array('id' => 'val_ref_no', 'class' => 'form-control', 'label' => false, 'placeholder' => '')); ?>
                        </div>             
                   </div>
                </div>
                <div class="form-group col-md-12">
                      <div class="col-md-12">
                        <label class="col-md-1 control-label" for="val_duedate">Uacc3 </label>
                        <div class="col-md-4">
                            <?php echo $this->Form->input('uacc3_data1', array('id' => 'val_customername', 'class' => 'form-control', 'placeholder' => '', 'label' => false,'autoComplete'=>'off')); ?>
                        
                        </div>
                        <div class="col-md-4">
                           <?php echo $this->Form->input('uacc3_data2', array('id' => 'val_attn', 'class' => 'form-control', 'label' => false, 'type' => 'select', 'options'=>array('1'=>'Value','2'=>'% on Reading','3'=>'% on Fullscale'))); ?>
                        
                        </div>
                        <div class="col-md-3">
                            <?php echo $this->Form->input('uacc3_data3', array('id' => 'val_ref_no', 'class' => 'form-control', 'label' => false, 'placeholder' => '')); ?>
                        </div>             
                   </div>
                </div>
                <div class="form-group pull-right col-md-12">
                        <label class="col-md-5 control-label row" for="val_duedate">Urefdivisor </label>
                        <div class="col-md-7">
                            <?php echo $this->Form->input('urefdivisor', array('id' => 'val_customername', 'class' => 'form-control', 'placeholder' => '', 'label' => false,'autoComplete'=>'off','value'=>'0')); ?>
                        </div>
                       </div>
                       <div class="form-group pull-right col-md-12">
                        <label class="col-md-5 control-label row" for="val_duedate">Uresdivisoranalog </label>
                        <div class="col-md-7">
                            <?php echo $this->Form->input('uresdivisoranalog', array('id' => 'val_customername', 'class' => 'form-control', 'placeholder' => '', 'label' => false,'autoComplete'=>'off','value'=>'0')); ?>
                        </div>
                       </div>
                       <div class="form-group pull-right col-md-12">
                        <label class="col-md-5 control-label row" for="val_duedate">Uresdivisordigital </label>
                        <div class="col-md-7">
                            <?php echo $this->Form->input('uresdivisordigital', array('id' => 'val_customername', 'class' => 'form-control', 'placeholder' => '', 'label' => false,'autoComplete'=>'off','value'=>'0')); ?>
                        </div>
                       </div>
                       <div class="form-group pull-right col-md-12">
                        <label class="col-md-5 control-label row" for="val_duedate">Urepdivisor </label>
                        <div class="col-md-7">
                            <?php echo $this->Form->input('urepdivisor', array('id' => 'val_customername', 'class' => 'form-control', 'placeholder' => '', 'label' => false,'autoComplete'=>'off','value'=>'0')); ?>
                        </div>
                       </div>
                       <div class="form-group pull-right col-md-12">
                        <label class="col-md-5 control-label row" for="val_duedate">Divisor </label>
                        <div class="col-md-7">
                            <?php echo $this->Form->input('divisor', array('id' => 'val_customername', 'class' => 'form-control', 'placeholder' => '', 'label' => false,'autoComplete'=>'off','value'=>'0')); ?>
                        </div>
                       </div>
                        <div class="form-group col-md-12">
                            <div class="col-md-12">
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('u1_data1', array('id' => 'val_uncertaintyid1', 'class' => 'form-control', 'label' => false, 'type' => 'select', 'empty' => '-- Select Uncertainty --','options' => array('1' => 'uicestability','2' => 'ustability','3' => 'uuniformity','4' => 'udrift',
                                           '5' => 'uimm','6' => 'uheateffect','7' => 'ugravity','8' => 'uother1','9' => 'uother2','10' => 'uother3','11' => 'uother4','12' => 'uother5','13' => 'uother6','14' => 'uother7','15' => 'uother8','16' => 'uother9','17' => 'uother10','18' => 'uother11','19' => 'uother12',
                                           '20' => 'uother13',), )); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('u1_data2', array('id' => 'val_uncertaintydata1', 'class' => 'form-control', 'placeholder' => '', 'label' => false,'autoComplete'=>'off')); ?>
                                
                                </div>
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('u1_data3', array('id' => 'val_uncertaintyid1percenttype', 'class' => 'form-control', 'label' => false, 'type' => 'select','options'=>array('1'=>'Value','2'=>'% on Reading','3'=>'% on Fullscale'))); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('u1_data4', array('id' => 'val_uncertaintyid1percent', 'class' => 'form-control', 'label' => false, 'placeholder' => '')); ?>
                                </div>             
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="col-md-12">
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('u2_data1', array('id' => 'val_uncertaintyid2', 'class' => 'form-control', 'label' => false, 'type' => 'select', 'empty' => '-- Select Uncertainty --','options' => array('1' => 'uicestability','2' => 'ustability','3' => 'uuniformity','4' => 'udrift',
                                           '5' => 'uimm','6' => 'uheateffect','7' => 'ugravity','8' => 'uother1','9' => 'uother2','10' => 'uother3','11' => 'uother4','12' => 'uother5','13' => 'uother6','14' => 'uother7','15' => 'uother8','16' => 'uother9','17' => 'uother10','18' => 'uother11','19' => 'uother12',
                                           '20' => 'uother13',), )); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('u2_data2', array('id' => 'val_uncertaintydata2', 'class' => 'form-control', 'placeholder' => '', 'label' => false,'autoComplete'=>'off')); ?>
                                
                                </div>
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('u2_data3', array('id' => 'val_uncertaintyid2percenttype', 'class' => 'form-control', 'label' => false, 'type' => 'select','options'=>array('1'=>'Value','2'=>'% on Reading','3'=>'% on Fullscale'))); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('u2_data4', array('id' => 'val_uncertaintyid2percent', 'class' => 'form-control', 'label' => false, 'placeholder' => '')); ?>
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
            </div>
            <div class="col-lg-12">
                <div class="form-group form-actions">
                <div class="col-md-2 pull-right row">
               
                    <?php echo $this->Form->button('<i class="fa fa-plus"></i> Add', array('type' => 'button', 'class' => 'btn btn-sm btn-primary add_all_fields', 'escape' => false)); ?> &nbsp;
                    <?php echo $this->Form->button('<i class="fa fa-times-circle"></i> Cancel', array('type' => 'reset', 'class' => 'btn btn-sm btn-warning', 'escape' => false)); ?>
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
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="subcontract_instrument_info"> 
                        <tr class="text-center">    
                            <td class="text-center">1</td>
                            <td class="text-center">-75.00 ~ -30.0001/°C</td>
                            <td class="text-center">0.04</td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center">0.01</td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center">2</td>
                            <td class="text-center">1.732</td>
                            <td class="text-center">3.464</td>
                            <td class="text-center">1</td>
                            <td class="text-center">1.732</td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center">0.027</td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center">
                            <div class="btn-group action_un_btn"><a class="btn btn-xs btn-default" title="" data-toggle="tooltip" href="#" data-original-title="Edit">
                            <i class="fa fa-pencil"></i></a>
                            <a class="btn btn-xs btn-danger" title="" data-toggle="tooltip" href="#" data-original-title="Delete"><i class="fa fa-times"></i></a></div>
                            </td>
                        </tr>
                        <tr class="text-center">    
                            <td class="text-center">2</td>
                            <td class="text-center">-75.00 ~ -30.0001/°C</td>
                            <td class="text-center">0.04</td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center">0.01</td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center">2</td>
                            <td class="text-center">1.732</td>
                            <td class="text-center">3.464</td>
                            <td class="text-center">1</td>
                            <td class="text-center">1.732</td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center">0.027</td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center">
                            <div class="btn-group action_un_btn"><a class="btn btn-xs btn-default" title="" data-toggle="tooltip" href="#" data-original-title="Edit">
                            <i class="fa fa-pencil"></i></a>
                            <a class="btn btn-xs btn-danger" title="" data-toggle="tooltip" href="#" data-original-title="Delete"><i class="fa fa-times"></i></a></div>
                            </td>
                        </tr>
                        <tr class="text-center">    
                            <td class="text-center">3</td>
                            <td class="text-center">-75.00 ~ -30.0001/°C</td>
                            <td class="text-center">0.04</td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center">0.01</td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center">2</td>
                            <td class="text-center">1.732</td>
                            <td class="text-center">3.464</td>
                            <td class="text-center">1</td>
                            <td class="text-center">1.732</td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center">0.027</td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center">
                            <div class="btn-group action_un_btn"><a class="btn btn-xs btn-default" title="" data-toggle="tooltip" href="#" data-original-title="Edit">
                            <i class="fa fa-pencil"></i></a>
                            <a class="btn btn-xs btn-danger" title="" data-toggle="tooltip" href="#" data-original-title="Delete"><i class="fa fa-times"></i></a></div>
                            </td>
                        </tr>
                        <tr class="text-center">    
                            <td class="text-center">4</td>
                            <td class="text-center">-75.00 ~ -30.0001/°C</td>
                            <td class="text-center">0.04</td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center">0.01</td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center">2</td>
                            <td class="text-center">1.732</td>
                            <td class="text-center">3.464</td>
                            <td class="text-center">1</td>
                            <td class="text-center">1.732</td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center">0.027</td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center">
                            <div class="btn-group action_un_btn"><a class="btn btn-xs btn-default" title="" data-toggle="tooltip" href="#" data-original-title="Edit">
                            <i class="fa fa-pencil"></i></a>
                            <a class="btn btn-xs btn-danger" title="" data-toggle="tooltip" href="#" data-original-title="Delete"><i class="fa fa-times"></i></a></div>
                            </td>
                        </tr>
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




