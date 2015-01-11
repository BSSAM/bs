<script>
    var path_url='<?PHP echo Router::url('/',true); ?>';
    $(document).ready(function(){
        $("#instrument_result",window.parent.document).hide();
    
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
                    alert(html);
                    //$(".instrument_result").html(html).show();
                },
                complete: ni_end(),  
                });
            }
            $('.customer_instrument_show').fadeOut();
            return false;    
        });
        $(document).on('click','.customer_instrument_show',function(){
        
        var instrument_id   =   $(this).attr('id');
        $('#in_id').val(instrument_id);
        $(".instrument_result").fadeOut();
        var ins_text=$(this).text();
        $('#customer_instrument').val(ins_text);
        
        //alert(instrument_id);
//        alert(instrument_id);
        $.ajax({
		type: 'POST',
                data:"instrument_id="+instrument_id,
		url: path_url+'/Temperatures/get_range/',
                beforeSend: ni_start(),  
                success:function(data){
                    $('#range_array').empty().append('<option value="">Select Range</option>');
                    $('#range_array').append(data);
                },
                complete: ni_end(),
            });
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
            <?php echo $this->Form->create('template/addtemplate', array('class' => 'form-horizontal form-bordered', 'id' => 'temp-template-add', 'enctype' => 'multipart/form-data')); ?>
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


            <?php //echo $this->Form->create('Subcontractdo', array('class' => 'form-horizontal form-bordered', 'id' => 'subcontractdo-add', 'enctype' => 'multipart/form-data')); ?>
            <?PHP echo $this->Form->input('customer_id',array('type'=>'hidden')); ?>
            <?PHP echo $this->Form->input('salesorder_id',array('type'=>'hidden')); ?>
<!--            <div class="description_list">
                
            </div>-->
            <div class="form-group">
                <label class="col-md-2 control-label" for="val_tempinstrumentname">Instrument</label>
                <div class="col-md-4">
                    <?php echo $this->Form->input('instrumentname', array('id' => 'val_tempinstrumentname', 'class' => 'form-control', 'placeholder' => 'Enter the Instrument Name', 'label' => false,'autoComplete'=>'off')); ?>
                    <div class="instrument_result" style="display:none;"></div>
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
                </div>
            </div>

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
                    echo $this->Form->input('readingtype', array('id' => 'val_readingtype', 'class' => 'form-control',
                             'label' => false,'type' => 'select', 'options'=>array('1'=>'Temperature'),'readonly')); ?>
               
                </div>  
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="val_unit">Unit</label>
                <div class="col-md-4">
                <?php
                    echo $this->Form->input('unit', array('id' => 'val_unit', 'class' => 'form-control',
                             'label' => false,'type' => 'select', 'empty' => 'Select Unit','options'=>$unit_list)); ?>
               
                </div>  
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
                             'label' => false,'type' => 'text', 'placeholder' => 'Select Resolution')); ?>
               
                </div>  
                <label class="col-md-2 control-label" for="val_resolution">Accuracy</label>
                <div class="col-md-4">
                <?php
                    echo $this->Form->input('accuracy', array('id' => 'val_accuracy', 'class' => 'form-control',
                             'label' => false,'type' => 'text', 'placeholder' => 'Select Accuracy')); ?>
               
                </div>  
                
            </div>
            <div class="form-group">
                
                <label class="col-md-2 control-label" for="val_prefref">Pref Reference</label>
                <div class="col-md-8">
                    <?php echo $this->Form->input('prefref', array('id'=>'val_prefref','type'=>'select','class'=>'form-control select-chosen','label'=>false,'data-placeholder'=>'Enter the Pref Reference','multiple','options'=>$uncer_tag)); ?>
                </div>
                
            </div>
            
           
            <div class="col-lg-12">
                <h4 class="sub-header"><small><b>Datas </b</small></h4>
            </div>
            <div class="col-sm-3 col-lg-12 template_detail">
                <table  class="table table-vcenter table-condensed table-bordered">
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
            <div class="form-group form-actions">
                <div class="col-md-9 col-md-offset-10">
                    <?php echo $this->Form->button('<i class="fa fa-angle-right"></i> Submit', array('type' => 'submit', 'class' => 'btn btn-sm btn-primary', 'escape' => false)); ?> &nbsp;
                    <?php //echo $this->Form->button('<i class="fa fa-repeat"></i> Reset', array('type' => 'reset', 'class' => 'btn btn-sm btn-warning', 'escape' => false)); ?>
                </div>
            </div>


            <!-- panel -->
<?php echo $this->Form->end(); ?>
            <!-- END Basic Form Elements Content -->
        </div>
        <!-- END Basic Form Elements Block -->
    </div>
<?php echo $this->Html->script('pages/formsValidation'); ?>
    <script>$(function() { FormsValidation.init(); });</script>




