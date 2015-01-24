<script>
    var path_url='<?PHP echo Router::url('/',true); ?>';
    $(document).ready(function(e) {
        
//            var certificateno = $('#certificateno').val();
//            var readingtype = $('#readingtype_id').val();
//            var channel = $('#channel_id').val();
//            //alert(certificateno);
//            //alert(readingtype);
//           //alert(channel);
//            $.ajax({
//                type: 'POST',
//                data:"certificateno="+certificateno+"&readingtype="+readingtype+"&channel="+channel,
//                url: path_url+'/Certificates/calculation_form/',
//                beforeSend: ni_start(),  
//                success:function(data){
//                    
//                    $('.certificate_tab').html(data);
//                    $('.no_of_runs').trigger('change');
//                },
//                complete: ni_end(),
//            });
            
        $('#channel_submit').click(function(e) {
            var certificateno = $('#certificateno').val();
            var readingtype = $('#readingtype_id').val();
            var channel = $('#channel_id').val();
            $.ajax({
                type: 'POST',
                data:"certificateno="+certificateno+"&readingtype="+readingtype+"&channel="+channel,
                url: path_url+'/Certificates/calculation_form/',
                beforeSend: ni_start(),  
                success:function(data){
                    
                    $('.certificate_tab').html(data);
                    $('.no_of_runs').trigger('change');
                },
                complete: ni_end(),
            });
           
        });

        
        var run = $('.no_of_runs').val();
        $('input').prop("disabled",false);
        $('input').css("background-color", "none");
        //alert(run);

        var em1 = $('.after_adjustment').is(':checked');
        var i1,m1,i,m;
        if(em1)
        {
            for (i1 = 1; i1 <= 15; ++i1)
            {
                for(m1 = 15; m1 > 0; m1--)
                {
                    $('.a'+i+'_'+m1).attr("disabled", false);
                    $('.a'+i+'_'+m1).css("background-color", "#fff");
                }
            }
            for (i = 1; i <= 15; ++i)
            {
                for(m = 15; m > run; m--)
                {
                    //alert(i+'sad');
                    $('.m'+i+'_'+m).prop("disabled", true);
                    $('.m'+i+'_'+m).css("background-color", "#ccc");
                    $('.b'+i+'_'+m).prop("disabled", true);
                    $('.b'+i+'_'+m).css("background-color", "#ccc");
                    $('.a'+i+'_'+m).prop("disabled", true);
                    $('.a'+i+'_'+m).css("background-color", "#ccc");
                }
            }
        }
        else
        {
            for (i1 = 1; i1 <= 15; ++i1)
            {
                for(m1 = 15; m1 > 0; m1--)
                {
                    $('.a'+i1+'_'+m1).attr("disabled", true);
                    $('.a'+i1+'_'+m1).css("background-color", "#ccc");
                }
            }  
            for (i = 1; i <= 15; ++i)
            {
                for(m = 15; m > run; m--)
                {
                    //alert(i);
//                    if($('.step'+i).val()=='')
//                    {
                        $('.m'+i+'_'+m).prop("disabled", true);
                        $('.m'+i+'_'+m).css("background-color", "#ccc");
                        $('.b'+i+'_'+m).prop("disabled", true);
                        $('.b'+i+'_'+m).css("background-color", "#ccc");
                        $('.a'+i+'_'+m).prop("disabled", true);
                        $('.a'+i+'_'+m).css("background-color", "#ccc");
                    //}
                }
            }
        }
        
        /// For After Adjustment
        $('.after_adjustment').change(function(e) {
            //alert('sa');
            var run = $('.no_of_runs').val();
            $('input').prop("disabled",false);
            $('input').css("background-color", "none");
            //alert(run);

            var em1 = $('.after_adjustment').is(':checked');
            var i1,m1,i,m;
            if(em1)
            {
                for (i1 = 1; i1 <= 15; ++i1)
                {
                    for(m1 = 15; m1 > 0; m1--)
                    {
                        $('.a'+i+'_'+m1).attr("disabled", false);
                        $('.a'+i+'_'+m1).css("background-color", "#fff");
                    }
                }
                for (i = 1; i <= 15; ++i)
                {
                    //alert(i);
                    for(m = 15; m > run; m--)
                    {
//                        if($('.step'+i).val()=='')
//                        {
                        $('.m'+i+'_'+m).prop("disabled", true);
                        $('.m'+i+'_'+m).css("background-color", "#ccc");
                        $('.b'+i+'_'+m).prop("disabled", true);
                        $('.b'+i+'_'+m).css("background-color", "#ccc");
                        $('.a'+i+'_'+m).prop("disabled", true);
                        $('.a'+i+'_'+m).css("background-color", "#ccc");
//                        }
                    }
                }
            }
            else
            {
                for (i1 = 1; i1 <= 15; ++i1)
                {
                    for(m1 = 15; m1 > 0; m1--)
                    {
                        $('.a'+i1+'_'+m1).attr("disabled", true);
                        $('.a'+i1+'_'+m1).css("background-color", "#ccc");
                    }
                }  
                for (i = 1; i <= 15; ++i)
                {
                    for(m = 15; m > run; m--)
                    {
                        $('.m'+i+'_'+m).prop("disabled", true);
                        $('.m'+i+'_'+m).css("background-color", "#ccc");
                        $('.b'+i+'_'+m).prop("disabled", true);
                        $('.b'+i+'_'+m).css("background-color", "#ccc");
                        $('.a'+i+'_'+m).prop("disabled", true);
                        $('.a'+i+'_'+m).css("background-color", "#ccc");
                    }
                }
            }
        });
        
        /// For Number of Runs
        $('body').on('change', '.no_of_runs', function(e) {
            
            var run = $(this).val();
            $('input').prop("disabled",false);
            $('input').css("background-color", "none");
            //alert(run);

            var em1 = $('.after_adjustment').is(':checked');
            var i1,m1,i,m;
            if(em1)
            {
                for (i1 = 1; i1 <= 15; ++i1)
                {
                    for(m1 = 15; m1 > 0; m1--)
                    {
                        $('.a'+i+'_'+m1).attr("disabled", false);
                        $('.a'+i+'_'+m1).css("background-color", "#fff");
                    }
                }
                for (i = 1; i <= 15; ++i)
                {
                    for(m = 15; m > run; m--)
                    {
                        $('.m'+i+'_'+m).prop("disabled", true);
                        $('.m'+i+'_'+m).css("background-color", "#ccc");
                        $('.b'+i+'_'+m).prop("disabled", true);
                        $('.b'+i+'_'+m).css("background-color", "#ccc");
                        $('.a'+i+'_'+m).prop("disabled", true);
                        $('.a'+i+'_'+m).css("background-color", "#ccc");
                    }
                }
            }
            else
            {
                for (i1 = 1; i1 <= 15; ++i1)
                {
                    for(m1 = 15; m1 > 0; m1--)
                    {
                        $('.a'+i1+'_'+m1).attr("disabled", true);
                        $('.a'+i1+'_'+m1).css("background-color", "#ccc");
                    }
                }  
                for (i = 1; i <= 15; ++i)
                {
                    for(m = 15; m > run; m--)
                    {
                        $('.m'+i+'_'+m).prop("disabled", true);
                        $('.m'+i+'_'+m).css("background-color", "#ccc");
                        $('.b'+i+'_'+m).prop("disabled", true);
                        $('.b'+i+'_'+m).css("background-color", "#ccc");
                        $('.a'+i+'_'+m).prop("disabled", true);
                        $('.a'+i+'_'+m).css("background-color", "#ccc");
                    }
                }
            }
        });
        
        $('.certificatedataFormSubmit').click(function(e) {

            $('.ajaxform').submit(); 
			   
        });
		
        $('.ajaxform').ajaxForm({ 
            url: path_url+'Certificates/index/',
            type: 'post',
            beforeSend: ni_start(),  
            complete: ni_end(),
            success : function(recievedData)
            {
                alert('Updated');
                //$('.template_data_table').html(recievedData);
                //return false;
            }
        });
        
    });
    //after_adjustment
    </script>
                        </div>
                    </div>
             <style>.content-header{display:none;}</style>      
                    <ul class="breadcrumb breadcrumb-top">
                          <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
                        <li><?php echo $this->Html->link('Temperatures-Dashboard',array('controller'=>'Certificates','action'=>'temperature')); ?></li>
                        <li>Certificate</li>
                    </ul>
                    <!-- END Forms General Header -->
                
                <div class="row">
                    <?php echo $this->Form->create('certificate', array('class' => 'form-horizontal form-bordered certificateform ajaxform', 'id' => 'certificateform', 'enctype' => 'multipart/form-data')); ?>
                        <div class="col-md-12">
                            <!-- Basic Form Elements Block -->
                            <div class="block">
                                <!-- Basic Form Elements Title -->
                                <div class="block-title clearfix">
                                    <div class="form-group form-actions">
                                        <div class="col-md-9 col-md-offset-10">
                                            <a class="btn btn-sm btn-primary certificatedataFormSubmit"><i class="fa fa-angle-right"> </i> Add</a>
                                        </div>
                                    </div>
                                     <div class="pos_relative certificate_top_search">
                                      <table  class="table table-vcenter table-condensed table-bordered">
                                        <thead>
                                          <tr class="c_dark_bg">
                                            <th class="text-center">Certificate No </th>
                                            <th class="text-center">Type ( T and rh )</th>
                                            <th class="text-center">Channel</th>
                                          </tr>
                                        </thead>
                                        <tbody class="subcontract_instrument_info">
                                          <tr class="text-center">
                                              <td class="text-center">
                                                  <?php
                    echo $this->Form->input('step1.certificateno', array('id' => 'certificateno', 'class' => 'certificateno',
                             'label' => false,'type' => 'select', 'options'=>$get_cert_certno,'value'=>$get_cert_sales['Tempcertificate']['certificate_no'])); ?>
                                                  
<!--                                                  <select id="certificateno" name="step1[certificateno]" class="certificateno" value="<?php //echo $get_cert_sales ?>">
                                                <option value="1">TS 0001-13</option>
                                                <option value="2">TS 0002-13</option>
                                                <option value="3">TS 0003-13</option>
                                                <option value="4" selected="selected">TS 0004-13</option>
                                                <option value="5">TS 0005-13</option>
                                                <option value="6">TS 0006-13</option>
                                                <option value="7">TS 0001-14</option>
                                                <option value="8">TS 0002-14</option>
                                                <option value="9">TS 0003-14</option>
                                                <option value="10">TS 0001-15</option>
                                              </select>-->
                                              </td>
                                            <td>
                                                <?php
                    echo $this->Form->input('step1.readingtype_id', array('id' => 'readingtype_id', 'class' => 'form-control readingtype_id',
                             'label' => false,'type' => 'select', 'options'=>$readingtype_data,'value'=>$get_cert_sales['Tempcertificate']['certificate_no'])); ?>
                                                
<!--                                                <select id="readingtype_id" name="readingtype_id" class="readingtype_id">
                                               
                                                <option value="" selected="selected">Select</option>
                                                <?php //foreach($readingtype_data as $k=>$v)
												     // {   ?> 
                                                			<option value="<?php //echo $k;?>"><?php //echo $v;?></option>
                                                <?php //}   ?>            
                                              </select></td>-->
                                            <td>
                                                <?php
                    echo $this->Form->input('step1.channel_id', array('id' => 'channel_id', 'class' => 'form-control channel_id',
                             'label' => false,'type' => 'select', 'options'=>$channel_data)); ?>
<!--                                                <select id="channel_id" name="channel_id" class="channel_id">
                                                <option value="" selected="selected">Select</option>
                                                <?php //foreach($channel_data as $k=>$v)
												      //{   ?> 
                                                			<option value="<?php //echo $k;?>"><?php //echo $v;?></option>
                                                <?php //}   ?> 
                                              </select>-->
                                            </td>
                                          </tr>
                                        </tbody>
                                      </table>
                                      <div class="pull-left">
                                          <button type="submit" class="btn btn-sm btn-primary" id="channel_submit"><i class="fa fa-search"></i> Search</button>
<button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-repeat"></i> Reset</button>
                                      </div>
                                      
                                      <table  class="table table-vcenter table-condensed table-bordered certificate_top_search1">
                                      
                                        <tbody class="subcontract_instrument_info">
                                          <tr>
                                            
                                            <td><input type="checkbox" /></td>
                                            <td>If Analog(Default:Digital)</td>
                                          </tr>
                                          <tr>
                                            
                                              <td><input type="checkbox" class="after_adjustment" /></td>
                                            <td>If After Adjustment</td>
                                          </tr>
                                        </tbody>
                                      </table>
                                    </div>

                                </div>
                                <!-- END Form Elements Title -->
                                <!-- Basic Form Elements Content -->
                                <div class="certificate_tab">
<!--                                <div class="panel panel-default">
                                    
                                    <div class="panel-body panel-body-nopadding">
                                         BASIC WIZARD 
                                        <div id="basicWizard" class="basic-wizard">
                                            <ul class="nav nav-pills nav-justified " data-toggle="tabs" id="tabs">
                                                <li class="active"><a href="#tab1" data-toggle="tab"><span>Step 1:</span> Calculation Form</a></li>
                                                <li class=""><a href="#tab2" data-toggle="tab"><span>Step 2:</span> Form1</a></li>
                                                <li class=""><a href="#tab3" data-toggle="tab"><span>Step 3:</span> Form2 </a></li>
                                                <li class=""><a href="#tab4" data-toggle="tab"><span>Step 4:</span> Uncertainty</a></li>
                                                <li class=""><a href="#tab5" data-toggle="tab"><span>Step 5:</span> Specification of clients (For technical)</a></li>
                                            </ul>
                                           
                                            <br>
                                            
                                            <div class="tab-content" >
                                                <div class="tab-pane active" id="tab1">
                                                    <div class="col-sm-3 col-lg-12 subcontract_linear certificate_table certificate_tab"> 
                                                    </div>
                                                     
                                                    <?PHP //echo $this->element('Certificates/calculation_form'); ?>
                                                </div>
                                                <div class="tab-pane" id="tab2">
                                                    <?PHP //echo $this->element('Certificates/form1'); ?>
                                                </div>
                                                <div class="tab-pane" id="tab3">
                                                    <?PHP //echo $this->element('Certificates/form2'); ?>
                                                    <div class="form-group form-actions">
                                                        <div class="col-md-9 col-md-offset-10">
                                                            <?php //echo $this->Form->button('<i class="fa fa-angle-right"></i> Submit', array('type' => 'submit', 'class' => 'btn btn-sm btn-primary', 'escape' => false)); ?>
                                                            <?php //echo $this->Form->button('<i class="fa fa-repeat"></i> Reset', array('type' => 'reset', 'class' => 'btn btn-sm btn-warning', 'escape' => false)); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                               
                                                 <?php //echo $this->Form->end(); ?>
                                                <div class="tab-pane" id="tab4">
                                                    <?PHP //echo $this->element('Certificates/uncertainty'); ?>
                                                </div>
                                                 <div class="tab-pane" id="tab5">
                                                    <?PHP //echo $this->element('Certificates/specification'); ?>
                                                </div>
                                                
                                            </div> tab-content 
                                             #basicWizard 
                                        </div> panel-body 
                                    </div>
                                     panel 
                                </div>-->
                                </div>
                                <!-- END Basic Form Elements Content -->
                            </div>
                            <!-- END Basic Form Elements Block -->
                        </div>
                    <?php echo $this->Form->end(); ?>
    <?php echo $this->Html->script('pages/formsValidation'); ?>
        
         
                        
