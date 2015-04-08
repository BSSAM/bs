<script>
    var path='<?PHP echo Router::url('/',true); ?>';
</script>
<script>
    $(document).on('change','#department_id',function(){
      var depart =   $(this).val();
        $.ajax({
            type: 'POST',
            data:"depart="+depart,
            url: path+'Instruments/get_depart/',
            success:function(data){
                if(data == 'No Procedure Available')
                {
                    $('#procedure').empty().append('<option value="">No Procedure Available</option>');
                }
                else
                {
                edit_node=$.parseJSON(data);
                $('#procedure').empty();
                $.each(edit_node,function(k,v){
                    $('#procedure').append('<option value="'+k+'">'+v+'</option>');
                });
                }
                 //$('#val_brand').empty().append('<option value="">Select Procedure</option><option value="'+edit_node.id+'">'+edit_node.+'</option>');
               // $('#procedure').val(data);
            }
        });
   }); 
</script>
  <h1>                               <i class="gi gi-user"></i>Edit Instrument
                            </h1>
                        </div>
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                          <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
                        <li><?php echo $this->Html->link('Instruments',array('controller'=>'Instruments','action'=>'index')); ?></li>
                        <li>Edit Instrument</li>
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
                                <?php echo $this->Form->create('Instrument',array('class'=>'form-horizontal form-bordered','id'=>'form-machine-edit')); ?>
                                
                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="machine_name">Name <span class="text-danger">*</span></label>
                                        <div class="col-md-4">
                                            <?php echo $this->Form->input('name', array('id'=>'machine_name','class'=>'form-control','placeholder'=>'Enter the Instrument Name','label'=>false,'name'=>'name')); ?>
                                        </div>
                                        <label class="col-md-2 control-label" for="machine_description">Description</label>
                                        <div class="col-md-4">
                                           <?php echo $this->Form->input('description', array('id'=>'machine_description','class'=>'form-control','label'=>false,'name'=>'description','type'=>'textarea')); ?>
                                        </div>
                                    </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="example-chosen-multiple">Department <span class="text-danger">*</span></label>
                                    <div class="col-md-4">
                                        <?php echo $this->Form->input('department_id', array('id'=>'department_id','class'=>'form-control select-chosen','label'=>false,'type'=>'select','options'=>$department_array,'data-placeholder'=>'Select Department Name','style'=>'width: 250px;','name'=>'department_id')); ?>
                                        
                                    </div>
                                    <?PHP
                                        $instrum_id = $this->request->data['Instrument']['id'];
                                    ?>
                                    <label class="col-md-2 control-label" for="example-chosen-multiple">Procedure <span class="text-danger">*</span></label>
                                    <div class="col-md-4">
                                        <?php //echo $this->Form->input('InstrumentProcedure.procedure_id', array('id'=>'example-chosen-multiple','class'=>'form-control select-chosen','label'=>false,'type'=>'select','options'=>$procedure_array,'data-placeholder'=>'Select Procedure Name','style'=>'width: 250px;','multiple'=>'multiple')); ?>
                                         <select id="procedure" name="data[InstrumentProcedure][procedure_id][]" class="" data-placeholder="Choose a Procedure.." style="width: 250px;" multiple >
                                                    <?PHP 
                                                    
                                                    $get_procedure = $this->Instrument->getprocedure_value($instrum_id);
                                                    
                                                    foreach ($procedure_array as $k => $v): ?>
                                                    <?php 
                                                         //$get_procedure = $this->Instrument->checkprocedure_value($instrum_id, $k);
                                                           $selected_procedure = (in_array($k, $get_procedure)) ? 'selected="selected"' : ''; ?>
                                                        <option <?PHP echo $selected_procedure; ?> value=<?PHP echo $k ?>><?PHP echo $v; ?></option>
                                                    <?PHP endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <?PHP
                                $instrum_id = $this->request->data['Instrument']['id'];
                                ?>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="example-chosen-multiple">Brand <span class="text-danger">*</span></label>
                                    <div class="col-md-4">
                                        <?php //echo $this->Form->input('InstrumentBrand.brand_id', array('id'=>'example-chosen-multiple','class'=>'form-control select-chosen','label'=>false,'type'=>'select','options'=>$brand_array,'data-placeholder'=>'Select Department Name','style'=>'width: 250px;','multiple'=>'multiple')); ?>
                                        <select id="example-chosen-multiple" name="data[InstrumentBrand][brand_id][]" class="select-chosen" data-placeholder="Choose a Brand.." style="width: 250px;" multiple >
                                                    <?PHP 
                                                    
                                                    $get_brand = $this->Instrument->getbrand_value($instrum_id);
                                                    
                                                    foreach ($brand_array as $k => $v): ?>
                                                    <?PHP  
                                                        
                                                        $selected = (in_array($k, $get_brand)) ? 'selected="selected"' : ''; ?>
                                                        <option <?PHP echo $selected; ?> value=<?PHP echo $k ?>><?PHP echo $v; ?></option>
                                                    <?PHP endforeach; ?>
                                        </select>
                                    </div>
                                    <?PHP
                                    $instrum_id = $this->request->data['Instrument']['id'];
                                    ?>
                                    <label class="col-md-2 control-label" for="example-chosen-multiple">Range <span class="text-danger">*</span></label>
                                    <div class="col-md-4">
                                        <?php //echo $this->Form->input('InstrumentRange.range_id', array('id'=>'example-chosen-multiple','class'=>'form-control select-chosen','label'=>false,'type'=>'select','options'=>$range_array,'data-placeholder'=>'Select Range Name','style'=>'width: 250px;','multiple'=>'multiple')); ?>
                                        <select id="example-chosen-multiple" name="data[InstrumentRange][range_id][]" class="select-chosen" data-placeholder="Choose a Range.." style="width: 250px;" multiple >
                                                    <?PHP 
                                                    
                                                    $get_range = $this->Instrument->getrange_value($instrum_id);
                                                    
                                                    foreach ($range_array as $k => $v): ?>
                                                        <?PHP 
                                                            
                                                            $selected_range = (in_array($k, $get_range)) ? 'selected="selected"' : '';
                                                        ?>
                                                        <option <?PHP echo $selected_range; ?> value=<?PHP echo $k ?>><?PHP echo $v; ?></option>
                                                    <?PHP endforeach; ?>
                                        </select>
                                    </div>
                                   
                                </div>
                                
                                 <div class="form-group">
                                    <label class="col-md-2 control-label" for="status">Active</label>
                                    <div class="col-md-4 form-control-static">
                                            <?php echo $this->Form->checkbox('status', array('id'=>'status','class'=>'','label'=>false,'name'=>'status')); ?>
                                    </div>
                                </div>
                                     <div class="form-group form-actions">
                                        <div class="col-md-9 col-md-offset-3">
                                            <div class="pull-right">
                                            <?php echo $this->Form->input('Instrument.id', array('name'=>'instru_id','id'=>'instru_id','type'=>'hidden','value'=>$instrument_dat['Instrument']['id'])); ?>
                                            <?php // echo $this->Form->button('<i class="fa fa-angle-right"></i> Update',array('type'=>'submit','class'=>'btn btn-sm btn-primary','escape' => false)); ?>
                                            <?php //echo $this->Html->link('<i class="fa fa-angle-left"></i> Cancel',array('controller'=>'Instruments','action'=>'index'), array('class'=>'btn btn-sm btn-danger','escape' => false)); ?>
                                                 <?php if($user_role['ins_instrument']['edit'] == 1 && $instrument_dat['Instrument']['is_approved']==0): ?>
                                                <?php if($user_role['app_instrument']['view'] == 1){ ?>
                                                <?php  echo $this->Form->button('<i class="fa fa-angle-right"></i> <b>Approve</b>',array('type'=>'button','class'=>'btn btn-sm btn-danger approve_instrument','escape' => false)); ?>
                                                <?php  echo $this->Form->button('<i class="fa fa-angle-right"></i> Update',array('type'=>'submit','class'=>'btn btn-sm btn-primary','escape' => false)); ?>
                                                <?php } else {?>
                                                <?php  echo $this->Form->button('<i class="fa fa-angle-right"></i> Update',array('type'=>'submit','class'=>'btn btn-sm btn-primary','escape' => false)); ?>
                                                <?php } ?>
                                                     
                                                <?php else : ?>
                                                <?php  echo $this->Form->button('<i class="fa fa-angle-right"></i> Update',array('type'=>'submit','class'=>'btn btn-sm btn-primary','escape' => false)); ?>
                                                <?php echo $this->Html->link('<i class="fa fa-angle-left"></i> Cancel',array('controller'=>'Instruments','action'=>'index'), array('class'=>'btn btn-sm btn-warning','escape' => false)); ?>
                                                <?php endif; ?>
                                                <!--                                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Submit</button>
                                            <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Reset</button>-->
                                            </div>
                                        </div>
                                    </div>
                                <?php echo $this->Form->end(); ?>
                                <!-- END Basic Form Elements Content -->
                            </div>
                            <!-- END Basic Form Elements Block -->
                        </div>
   <?php //echo $this->Html->script('pages/instrumentsvalidation'); ?>
<!--        <script>$(function(){ FormsValidation.init(); });</script>-->
                        