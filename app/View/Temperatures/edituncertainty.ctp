<script>
    var path_url='<?PHP echo Router::url('/',true); ?>';
</script>
        
<h1>
    <i class="gi gi-user"></i>Edit Uncertainty Data
</h1>
</div>
</div>
<ul class="breadcrumb breadcrumb-top">
    <li><?php echo $this->Html->link('Home', array('controller' => 'Dashboards', 'action' => 'index')); ?></li>
    <li><?php echo $this->Html->link('Uncertainty Data', array('controller' => 'Uncertainty', 'action' => 'index')); ?></li>
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


            <?php echo $this->Form->create('Uncertainty', array('class' => 'form-horizontal form-bordered', 'id' => 'fileupload', 'enctype' => 'multipart/form-data')); ?>
            
            <div class="description_list">
                
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="val_instrument">Instrument</label>
                <div class="col-md-2">
                    <?php echo $this->Form->input('instrumentname', array('id' => 'val_instrument', 'class' => 'form-control', 'label' => false, 'type' => 'select', 'empty' => '-- Select Instrument --')); ?>
                </div>
              <label class="col-md-2 control-label" for="val_duedate">Due Date </label>
                <div class="col-md-2">
                    <?php echo $this->Form->input('duedate', array('id' => 'val_duedate', 'class' => 'form-control input-datepicker-close', 'data-date-format' => 'dd-MM-yy',
                        'placeholder' => 'Enter the Due Date', 'label' => false));
                    ?>
                </div>
                <label class="col-md-2 control-label" for="val_tagno">Tag No</label>
                 <div class="col-md-2">
                    <?php echo $this->Form->input('tagno', array('id' => 'val_tagno', 'class' => 'form-control', 'placeholder' => 'Enter the TAG No', 'label' => false,'autoComplete'=>'off')); ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="val_procno">Procedure No</label>
                <div class="col-md-2">
                    <?php echo $this->Form->input('procno', array('id' => 'val_procno', 'class' => 'form-control', 'placeholder' => 'Enter the Procedure No', 'label' => false,'autoComplete'=>'off')); ?>
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
                echo $this->Form->input('subcontract_remarks', array('id' => 'val_remarks', 'class' => 'form-control',
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
            <div class="col-lg-12">
                <h4 class="sub-header"><small>Uncertainty</small></h4>
            </div>
            <div class="col-lg-12">
               <div class="col-lg-6 row">
                      <div class="col-md-12">
                      <div class="form-group pull-right col-md-12">
                        <label class="col-md-5 control-label row" for="val_range">Range </label>
                        <div class="col-md-7">
                            <?php echo $this->Form->input('range', array('id' => 'val_range', 'class' => 'form-control', 'placeholder' => 'Enter the Range', 'label' => false,'autoComplete'=>'off')); ?>
                        </div>
                       </div>
                    </div>
                    <div class="form-group col-md-12">
                      <div class="col-md-12">
                        <label class="col-md-1 control-label" for="val_uref1">Uref1 </label>
                        <div class="col-md-4">
                            <?php echo $this->Form->input('subcontract_name', array('id' => 'val_uref1', 'class' => 'form-control', 'placeholder' => 'Enter the Uref1', 'label' => false,'autoComplete'=>'off')); ?>
                        </div>
                        <div class="col-md-4">
                           <?php echo $this->Form->input('subcontract_attn', array('id' => 'val_attn', 'class' => 'form-control', 'label' => false, 'type' => 'select', 'empty' => 'Value')); ?>
                        </div>
                        <div class="col-md-3">
                            <?php echo $this->Form->input('subcontract_ref_no', array('id' => 'val_ref_no', 'class' => 'form-control', 'label' => false, 'placeholder' => '','readonly'=>true)); ?>
                        </div>             
                   </div>
                </div>
                <div class="form-group col-md-12">
                      <div class="col-md-12">
                        <label class="col-md-1 control-label" for="val_duedate">Uref1 </label>
                        <div class="col-md-4">
                            <?php echo $this->Form->input('subcontract_name', array('id' => 'val_customername', 'class' => 'form-control', 'placeholder' => '', 'label' => false,'autoComplete'=>'off')); ?>
                        
                        </div>
                        <div class="col-md-4">
                           <?php echo $this->Form->input('subcontract_attn', array('id' => 'val_attn', 'class' => 'form-control', 'label' => false, 'type' => 'select', 'empty' => 'Value')); ?>
                        
                        </div>
                        <div class="col-md-3">
                            <?php echo $this->Form->input('subcontract_ref_no', array('id' => 'val_ref_no', 'class' => 'form-control', 'label' => false, 'placeholder' => '','readonly'=>true)); ?>
                        </div>             
                   </div>
                </div>
                <div class="form-group col-md-12">
                      <div class="col-md-12">
                        <label class="col-md-1 control-label" for="val_duedate">Uref1 </label>
                        <div class="col-md-4">
                            <?php echo $this->Form->input('subcontract_name', array('id' => 'val_customername', 'class' => 'form-control', 'placeholder' => '', 'label' => false,'autoComplete'=>'off')); ?>
                        
                        </div>
                        <div class="col-md-4">
                           <?php echo $this->Form->input('subcontract_attn', array('id' => 'val_attn', 'class' => 'form-control', 'label' => false, 'type' => 'select', 'empty' => 'Value')); ?>
                        
                        </div>
                        <div class="col-md-3">
                            <?php echo $this->Form->input('subcontract_ref_no', array('id' => 'val_ref_no', 'class' => 'form-control', 'label' => false, 'placeholder' => '','readonly'=>true)); ?>
                        </div>             
                   </div>
                </div>
                <div class="form-group col-md-12">
                      <div class="col-md-12">
                        <label class="col-md-1 control-label" for="val_duedate">Uref1 </label>
                        <div class="col-md-4">
                            <?php echo $this->Form->input('subcontract_name', array('id' => 'val_customername', 'class' => 'form-control', 'placeholder' => '', 'label' => false,'autoComplete'=>'off')); ?>
                        
                        </div>
                        <div class="col-md-4">
                           <?php echo $this->Form->input('subcontract_attn', array('id' => 'val_attn', 'class' => 'form-control', 'label' => false, 'type' => 'select', 'empty' => 'Value')); ?>
                        
                        </div>
                        <div class="col-md-3">
                            <?php echo $this->Form->input('subcontract_ref_no', array('id' => 'val_ref_no', 'class' => 'form-control', 'label' => false, 'placeholder' => '','readonly'=>true)); ?>
                        </div>             
                   </div>
                </div>
                <div class="form-group col-md-12">
                      <div class="col-md-12">
                        <label class="col-md-1 control-label" for="val_duedate">Uref1 </label>
                        <div class="col-md-4">
                            <?php echo $this->Form->input('subcontract_name', array('id' => 'val_customername', 'class' => 'form-control', 'placeholder' => '', 'label' => false,'autoComplete'=>'off')); ?>
                        
                        </div>
                        <div class="col-md-4">
                           <?php echo $this->Form->input('subcontract_attn', array('id' => 'val_attn', 'class' => 'form-control', 'label' => false, 'type' => 'select', 'empty' => 'Value')); ?>
                        
                        </div>
                        <div class="col-md-3">
                            <?php echo $this->Form->input('subcontract_ref_no', array('id' => 'val_ref_no', 'class' => 'form-control', 'label' => false, 'placeholder' => '','readonly'=>true)); ?>
                        </div>             
                   </div>
                </div>
                <div class="form-group col-md-12">
                      <div class="col-md-12">
                        <label class="col-md-1 control-label" for="val_duedate">Uref1 </label>
                        <div class="col-md-4">
                            <?php echo $this->Form->input('subcontract_name', array('id' => 'val_customername', 'class' => 'form-control', 'placeholder' => '', 'label' => false,'autoComplete'=>'off')); ?>
                        
                        </div>
                        <div class="col-md-4">
                           <?php echo $this->Form->input('subcontract_attn', array('id' => 'val_attn', 'class' => 'form-control', 'label' => false, 'type' => 'select', 'empty' => 'Value')); ?>
                        
                        </div>
                        <div class="col-md-3">
                            <?php echo $this->Form->input('subcontract_ref_no', array('id' => 'val_ref_no', 'class' => 'form-control', 'label' => false, 'placeholder' => '','readonly'=>true)); ?>
                        </div>             
                   </div>
                </div>
                <div class="form-group pull-right col-md-12">
                        <label class="col-md-5 control-label row" for="val_duedate">Urefdivisor </label>
                        <div class="col-md-7">
                            <?php echo $this->Form->input('subcontract_name', array('id' => 'val_customername', 'class' => 'form-control', 'placeholder' => '', 'label' => false,'autoComplete'=>'off','value'=>'0')); ?>
                        </div>
                       </div>
                       <div class="form-group pull-right col-md-12">
                        <label class="col-md-5 control-label row" for="val_duedate">Uresdivisoranalog </label>
                        <div class="col-md-7">
                            <?php echo $this->Form->input('subcontract_name', array('id' => 'val_customername', 'class' => 'form-control', 'placeholder' => '', 'label' => false,'autoComplete'=>'off','value'=>'0')); ?>
                        </div>
                       </div>
                       <div class="form-group pull-right col-md-12">
                        <label class="col-md-5 control-label row" for="val_duedate">Uresdivisordigital </label>
                        <div class="col-md-7">
                            <?php echo $this->Form->input('subcontract_name', array('id' => 'val_customername', 'class' => 'form-control', 'placeholder' => '', 'label' => false,'autoComplete'=>'off','value'=>'0')); ?>
                        </div>
                       </div>
                       <div class="form-group pull-right col-md-12">
                        <label class="col-md-5 control-label row" for="val_duedate">Urepdivisor </label>
                        <div class="col-md-7">
                            <?php echo $this->Form->input('subcontract_name', array('id' => 'val_customername', 'class' => 'form-control', 'placeholder' => '', 'label' => false,'autoComplete'=>'off','value'=>'0')); ?>
                        </div>
                       </div>
                       <div class="form-group pull-right col-md-12">
                        <label class="col-md-5 control-label row" for="val_duedate">Divisor </label>
                        <div class="col-md-7">
                            <?php echo $this->Form->input('subcontract_name', array('id' => 'val_customername', 'class' => 'form-control', 'placeholder' => '', 'label' => false,'autoComplete'=>'off','value'=>'0')); ?>
                        </div>
                       </div>
                        <div class="form-group col-md-12">
                            <div class="col-md-12">
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('uncertaintyid1', array('id' => 'val_uncertaintyid1', 'class' => 'form-control', 'label' => false, 'type' => 'select', 'empty' => '-- Select Uncertainty --','options' => array('1' => 'uicestability','2' => 'ustability','3' => 'uuniformity','4' => 'udrift',
                                           '5' => 'uimm','6' => 'uheateffect','7' => 'ugravity','8' => 'uother1','9' => 'uother2','10' => 'uother3','11' => 'uother4','12' => 'uother5','13' => 'uother6','14' => 'uother7','15' => 'uother8','16' => 'uother9','17' => 'uother10','18' => 'uother11','19' => 'uother12',
                                           '20' => 'uother13',), )); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('uncertaintydata1', array('id' => 'val_uncertaintydata1', 'class' => 'form-control', 'placeholder' => '', 'label' => false,'autoComplete'=>'off')); ?>
                                
                                </div>
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('uncertaintyid1percenttype', array('id' => 'val_uncertaintyid1percenttype', 'class' => 'form-control', 'label' => false, 'type' => 'select','options'=>array('1'=>'Value','2'=>'% on Reading','3'=>'% on Fullscale'))); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('uncertaintyid1percent', array('id' => 'val_uncertaintyid1percent', 'class' => 'form-control', 'label' => false, 'placeholder' => '','readonly'=>true)); ?>
                                </div>             
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="col-md-12">
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('uncertaintyid2', array('id' => 'val_uncertaintyid2', 'class' => 'form-control', 'label' => false, 'type' => 'select', 'empty' => '-- Select Uncertainty --','options' => array('1' => 'uicestability','2' => 'ustability','3' => 'uuniformity','4' => 'udrift',
                                           '5' => 'uimm','6' => 'uheateffect','7' => 'ugravity','8' => 'uother1','9' => 'uother2','10' => 'uother3','11' => 'uother4','12' => 'uother5','13' => 'uother6','14' => 'uother7','15' => 'uother8','16' => 'uother9','17' => 'uother10','18' => 'uother11','19' => 'uother12',
                                           '20' => 'uother13',), )); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('uncertaintydata2', array('id' => 'val_uncertaintydata2', 'class' => 'form-control', 'placeholder' => '', 'label' => false,'autoComplete'=>'off')); ?>
                                
                                </div>
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('uncertaintyid2percenttype', array('id' => 'val_uncertaintyid2percenttype', 'class' => 'form-control', 'label' => false, 'type' => 'select','options'=>array('1'=>'Value','2'=>'% on Reading','3'=>'% on Fullscale'))); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('uncertaintyid2percent', array('id' => 'val_uncertaintyid2percent', 'class' => 'form-control', 'label' => false, 'placeholder' => '','readonly'=>true)); ?>
                                </div>             
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="col-md-12">
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('uncertaintyid3', array('id' => 'val_uncertaintyid3', 'class' => 'form-control', 'label' => false, 'type' => 'select', 'empty' => '-- Select Uncertainty --','options' => array('1' => 'uicestability','2' => 'ustability','3' => 'uuniformity','4' => 'udrift',
                                           '5' => 'uimm','6' => 'uheateffect','7' => 'ugravity','8' => 'uother1','9' => 'uother2','10' => 'uother3','11' => 'uother4','12' => 'uother5','13' => 'uother6','14' => 'uother7','15' => 'uother8','16' => 'uother9','17' => 'uother10','18' => 'uother11','19' => 'uother12',
                                           '20' => 'uother13',), )); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('uncertaintydata3', array('id' => 'val_uncertaintydata3', 'class' => 'form-control', 'placeholder' => '', 'label' => false,'autoComplete'=>'off')); ?>
                                
                                </div>
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('uncertaintyid3percenttype', array('id' => 'val_uncertaintyid3percenttype', 'class' => 'form-control', 'label' => false, 'type' => 'select','options'=>array('1'=>'Value','2'=>'% on Reading','3'=>'% on Fullscale'))); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('uncertaintyid3percent', array('id' => 'val_uncertaintyid3percent', 'class' => 'form-control', 'label' => false, 'placeholder' => '','readonly'=>true)); ?>
                                </div>             
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="col-md-12">
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('uncertaintyid4', array('id' => 'val_uncertaintyid4', 'class' => 'form-control', 'label' => false, 'type' => 'select', 'empty' => '-- Select Uncertainty --','options' => array('1' => 'uicestability','2' => 'ustability','3' => 'uuniformity','4' => 'udrift',
                                           '5' => 'uimm','6' => 'uheateffect','7' => 'ugravity','8' => 'uother1','9' => 'uother2','10' => 'uother3','11' => 'uother4','12' => 'uother5','13' => 'uother6','14' => 'uother7','15' => 'uother8','16' => 'uother9','17' => 'uother10','18' => 'uother11','19' => 'uother12',
                                           '20' => 'uother13',), )); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('uncertaintydata4', array('id' => 'val_uncertaintydata4', 'class' => 'form-control', 'placeholder' => '', 'label' => false,'autoComplete'=>'off')); ?>
                                
                                </div>
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('uncertaintyid4percenttype', array('id' => 'val_uncertaintyid4percenttype', 'class' => 'form-control', 'label' => false, 'type' => 'select','options'=>array('1'=>'Value','2'=>'% on Reading','3'=>'% on Fullscale'))); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('uncertaintyid4percent', array('id' => 'val_uncertaintyid4percent', 'class' => 'form-control', 'label' => false, 'placeholder' => '','readonly'=>true)); ?>
                                </div>             
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="col-md-12">
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('uncertaintyid5', array('id' => 'val_uncertaintyid5', 'class' => 'form-control', 'label' => false, 'type' => 'select', 'empty' => '-- Select Uncertainty --','options' => array('1' => 'uicestability','2' => 'ustability','3' => 'uuniformity','4' => 'udrift',
                                           '5' => 'uimm','6' => 'uheateffect','7' => 'ugravity','8' => 'uother1','9' => 'uother2','10' => 'uother3','11' => 'uother4','12' => 'uother5','13' => 'uother6','14' => 'uother7','15' => 'uother8','16' => 'uother9','17' => 'uother10','18' => 'uother11','19' => 'uother12',
                                           '20' => 'uother13',), )); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('uncertaintydata5', array('id' => 'val_uncertaintydata5', 'class' => 'form-control', 'placeholder' => '', 'label' => false,'autoComplete'=>'off')); ?>
                                
                                </div>
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('uncertaintyid5percenttype', array('id' => 'val_uncertaintyid5percenttype', 'class' => 'form-control', 'label' => false, 'type' => 'select','options'=>array('1'=>'Value','2'=>'% on Reading','3'=>'% on Fullscale'))); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('uncertaintyid5percent', array('id' => 'val_uncertaintyid5percent', 'class' => 'form-control', 'label' => false, 'placeholder' => '','readonly'=>true)); ?>
                                </div>             
                            </div>
                        </div>
               </div>
                    <div class="col-lg-6 row">
                      <div class="form-group col-md-12">
                            <div class="col-md-12">
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('uncertaintyid6', array('id' => 'val_uncertaintyid6', 'class' => 'form-control', 'label' => false, 'type' => 'select', 'empty' => '-- Select Uncertainty --','options' => array('1' => 'uicestability','2' => 'ustability','3' => 'uuniformity','4' => 'udrift',
                                           '5' => 'uimm','6' => 'uheateffect','7' => 'ugravity','8' => 'uother1','9' => 'uother2','10' => 'uother3','11' => 'uother4','12' => 'uother5','13' => 'uother6','14' => 'uother7','15' => 'uother8','16' => 'uother9','17' => 'uother10','18' => 'uother11','19' => 'uother12',
                                           '20' => 'uother13',), )); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('uncertaintydata6', array('id' => 'val_uncertaintydata6', 'class' => 'form-control', 'placeholder' => '', 'label' => false,'autoComplete'=>'off')); ?>
                                
                                </div>
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('uncertaintyid6percenttype', array('id' => 'val_uncertaintyid6percenttype', 'class' => 'form-control', 'label' => false, 'type' => 'select','options'=>array('1'=>'Value','2'=>'% on Reading','3'=>'% on Fullscale'))); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('uncertaintyid6percent', array('id' => 'val_uncertaintyid6percent', 'class' => 'form-control', 'label' => false, 'placeholder' => '','readonly'=>true)); ?>
                                </div>             
                            </div>
                        </div>
                      <div class="form-group col-md-12">
                            <div class="col-md-12">
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('uncertaintyid7', array('id' => 'val_uncertaintyid7', 'class' => 'form-control', 'label' => false, 'type' => 'select', 'empty' => '-- Select Uncertainty --','options' => array('1' => 'uicestability','2' => 'ustability','3' => 'uuniformity','4' => 'udrift',
                                           '5' => 'uimm','6' => 'uheateffect','7' => 'ugravity','8' => 'uother1','9' => 'uother2','10' => 'uother3','11' => 'uother4','12' => 'uother5','13' => 'uother6','14' => 'uother7','15' => 'uother8','16' => 'uother9','17' => 'uother10','18' => 'uother11','19' => 'uother12',
                                           '20' => 'uother13',), )); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('uncertaintydata7', array('id' => 'val_uncertaintydata7', 'class' => 'form-control', 'placeholder' => '', 'label' => false,'autoComplete'=>'off')); ?>
                                
                                </div>
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('uncertaintyid7percenttype', array('id' => 'val_uncertaintyid7percenttype', 'class' => 'form-control', 'label' => false, 'type' => 'select','options'=>array('1'=>'Value','2'=>'% on Reading','3'=>'% on Fullscale'))); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('uncertaintyid7percent', array('id' => 'val_uncertaintyid7percent', 'class' => 'form-control', 'label' => false, 'placeholder' => '','readonly'=>true)); ?>
                                </div>             
                            </div>
                        </div>
                      <div class="form-group col-md-12">
                            <div class="col-md-12">
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('uncertaintyid8', array('id' => 'val_uncertaintyid8', 'class' => 'form-control', 'label' => false, 'type' => 'select', 'empty' => '-- Select Uncertainty --','options' => array('1' => 'uicestability','2' => 'ustability','3' => 'uuniformity','4' => 'udrift',
                                           '5' => 'uimm','6' => 'uheateffect','7' => 'ugravity','8' => 'uother1','9' => 'uother2','10' => 'uother3','11' => 'uother4','12' => 'uother5','13' => 'uother6','14' => 'uother7','15' => 'uother8','16' => 'uother9','17' => 'uother10','18' => 'uother11','19' => 'uother12',
                                           '20' => 'uother13',), )); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('uncertaintydata8', array('id' => 'val_uncertaintydata8', 'class' => 'form-control', 'placeholder' => '', 'label' => false,'autoComplete'=>'off')); ?>
                                
                                </div>
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('uncertaintyid8percenttype', array('id' => 'val_uncertaintyid8percenttype', 'class' => 'form-control', 'label' => false, 'type' => 'select','options'=>array('1'=>'Value','2'=>'% on Reading','3'=>'% on Fullscale'))); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('uncertaintyid8percent', array('id' => 'val_uncertaintyid8percent', 'class' => 'form-control', 'label' => false, 'placeholder' => '','readonly'=>true)); ?>
                                </div>             
                            </div>
                        </div>
                      <div class="form-group col-md-12">
                            <div class="col-md-12">
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('uncertaintyid9', array('id' => 'val_uncertaintyid9', 'class' => 'form-control', 'label' => false, 'type' => 'select', 'empty' => '-- Select Uncertainty --','options' => array('1' => 'uicestability','2' => 'ustability','3' => 'uuniformity','4' => 'udrift',
                                           '5' => 'uimm','6' => 'uheateffect','7' => 'ugravity','8' => 'uother1','9' => 'uother2','10' => 'uother3','11' => 'uother4','12' => 'uother5','13' => 'uother6','14' => 'uother7','15' => 'uother8','16' => 'uother9','17' => 'uother10','18' => 'uother11','19' => 'uother12',
                                           '20' => 'uother13',), )); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('uncertaintydata9', array('id' => 'val_uncertaintydata9', 'class' => 'form-control', 'placeholder' => '', 'label' => false,'autoComplete'=>'off')); ?>
                                
                                </div>
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('uncertaintyid9percenttype', array('id' => 'val_uncertaintyid9percenttype', 'class' => 'form-control', 'label' => false, 'type' => 'select','options'=>array('1'=>'Value','2'=>'% on Reading','3'=>'% on Fullscale'))); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('uncertaintyid9percent', array('id' => 'val_uncertaintyid9percent', 'class' => 'form-control', 'label' => false, 'placeholder' => '','readonly'=>true)); ?>
                                </div>             
                            </div>
                        </div>
                      <div class="form-group col-md-12">
                            <div class="col-md-12">
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('uncertaintyid10', array('id' => 'val_uncertaintyid10', 'class' => 'form-control', 'label' => false, 'type' => 'select', 'empty' => '-- Select Uncertainty --','options' => array('1' => 'uicestability','2' => 'ustability','3' => 'uuniformity','4' => 'udrift',
                                           '5' => 'uimm','6' => 'uheateffect','7' => 'ugravity','8' => 'uother1','9' => 'uother2','10' => 'uother3','11' => 'uother4','12' => 'uother5','13' => 'uother6','14' => 'uother7','15' => 'uother8','16' => 'uother9','17' => 'uother10','18' => 'uother11','19' => 'uother12',
                                           '20' => 'uother13',), )); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('uncertaintydata10', array('id' => 'val_uncertaintydata10', 'class' => 'form-control', 'placeholder' => '', 'label' => false,'autoComplete'=>'off')); ?>
                                
                                </div>
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('uncertaintyid10percenttype', array('id' => 'val_uncertaintyid10percenttype', 'class' => 'form-control', 'label' => false, 'type' => 'select','options'=>array('1'=>'Value','2'=>'% on Reading','3'=>'% on Fullscale'))); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('uncertaintyid10percent', array('id' => 'val_uncertaintyid10percent', 'class' => 'form-control', 'label' => false, 'placeholder' => '','readonly'=>true)); ?>
                                </div>             
                            </div>
                        </div>
                      <div class="form-group col-md-12">
                            <div class="col-md-12">
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('uncertaintyid11', array('id' => 'val_uncertaintyid11', 'class' => 'form-control', 'label' => false, 'type' => 'select', 'empty' => '-- Select Uncertainty --','options' => array('1' => 'uicestability','2' => 'ustability','3' => 'uuniformity','4' => 'udrift',
                                           '5' => 'uimm','6' => 'uheateffect','7' => 'ugravity','8' => 'uother1','9' => 'uother2','10' => 'uother3','11' => 'uother4','12' => 'uother5','13' => 'uother6','14' => 'uother7','15' => 'uother8','16' => 'uother9','17' => 'uother10','18' => 'uother11','19' => 'uother12',
                                           '20' => 'uother13',), )); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('uncertaintydata11', array('id' => 'val_uncertaintydata11', 'class' => 'form-control', 'placeholder' => '', 'label' => false,'autoComplete'=>'off')); ?>
                                
                                </div>
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('uncertaintyid11percenttype', array('id' => 'val_uncertaintyid11percenttype', 'class' => 'form-control', 'label' => false, 'type' => 'select','options'=>array('1'=>'Value','2'=>'% on Reading','3'=>'% on Fullscale'))); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('uncertaintyid11percent', array('id' => 'val_uncertaintyid11percent', 'class' => 'form-control', 'label' => false, 'placeholder' => '','readonly'=>true)); ?>
                                </div>             
                            </div>
                        </div>
                      <div class="form-group col-md-12">
                            <div class="col-md-12">
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('uncertaintyid12', array('id' => 'val_uncertaintyid12', 'class' => 'form-control', 'label' => false, 'type' => 'select', 'empty' => '-- Select Uncertainty --','options' => array('1' => 'uicestability','2' => 'ustability','3' => 'uuniformity','4' => 'udrift',
                                           '5' => 'uimm','6' => 'uheateffect','7' => 'ugravity','8' => 'uother1','9' => 'uother2','10' => 'uother3','11' => 'uother4','12' => 'uother5','13' => 'uother6','14' => 'uother7','15' => 'uother8','16' => 'uother9','17' => 'uother10','18' => 'uother11','19' => 'uother12',
                                           '20' => 'uother13',), )); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('uncertaintydata12', array('id' => 'val_uncertaintydata12', 'class' => 'form-control', 'placeholder' => '', 'label' => false,'autoComplete'=>'off')); ?>
                                
                                </div>
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('uncertaintyid12percenttype', array('id' => 'val_uncertaintyid12percenttype', 'class' => 'form-control', 'label' => false, 'type' => 'select','options'=>array('1'=>'Value','2'=>'% on Reading','3'=>'% on Fullscale'))); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('uncertaintyid12percent', array('id' => 'val_uncertaintyid12percent', 'class' => 'form-control', 'label' => false, 'placeholder' => '','readonly'=>true)); ?>
                                </div>             
                            </div>
                        </div>
                      <div class="form-group col-md-12">
                            <div class="col-md-12">
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('uncertaintyid13', array('id' => 'val_uncertaintyid13', 'class' => 'form-control', 'label' => false, 'type' => 'select', 'empty' => '-- Select Uncertainty --','options' => array('1' => 'uicestability','2' => 'ustability','3' => 'uuniformity','4' => 'udrift',
                                           '5' => 'uimm','6' => 'uheateffect','7' => 'ugravity','8' => 'uother1','9' => 'uother2','10' => 'uother3','11' => 'uother4','12' => 'uother5','13' => 'uother6','14' => 'uother7','15' => 'uother8','16' => 'uother9','17' => 'uother10','18' => 'uother11','19' => 'uother12',
                                           '20' => 'uother13',), )); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('uncertaintydata13', array('id' => 'val_uncertaintydata13', 'class' => 'form-control', 'placeholder' => '', 'label' => false,'autoComplete'=>'off')); ?>
                                
                                </div>
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('uncertaintyid13percenttype', array('id' => 'val_uncertaintyid13percenttype', 'class' => 'form-control', 'label' => false, 'type' => 'select','options'=>array('1'=>'Value','2'=>'% on Reading','3'=>'% on Fullscale'))); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('uncertaintyid13percent', array('id' => 'val_uncertaintyid13percent', 'class' => 'form-control', 'label' => false, 'placeholder' => '','readonly'=>true)); ?>
                                </div>             
                            </div>
                        </div>
                      <div class="form-group col-md-12">
                            <div class="col-md-12">
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('uncertaintyid14', array('id' => 'val_uncertaintyid14', 'class' => 'form-control', 'label' => false, 'type' => 'select', 'empty' => '-- Select Uncertainty --','options' => array('1' => 'uicestability','2' => 'ustability','3' => 'uuniformity','4' => 'udrift',
                                           '5' => 'uimm','6' => 'uheateffect','7' => 'ugravity','8' => 'uother1','9' => 'uother2','10' => 'uother3','11' => 'uother4','12' => 'uother5','13' => 'uother6','14' => 'uother7','15' => 'uother8','16' => 'uother9','17' => 'uother10','18' => 'uother11','19' => 'uother12',
                                           '20' => 'uother13',), )); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('uncertaintydata14', array('id' => 'val_uncertaintydata14', 'class' => 'form-control', 'placeholder' => '', 'label' => false,'autoComplete'=>'off')); ?>
                                
                                </div>
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('uncertaintyid14percenttype', array('id' => 'val_uncertaintyid14percenttype', 'class' => 'form-control', 'label' => false, 'type' => 'select','options'=>array('1'=>'Value','2'=>'% on Reading','3'=>'% on Fullscale'))); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('uncertaintyid14percent', array('id' => 'val_uncertaintyid14percent', 'class' => 'form-control', 'label' => false, 'placeholder' => '','readonly'=>true)); ?>
                                </div>             
                            </div>
                        </div>
                      <div class="form-group col-md-12">
                            <div class="col-md-12">
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('uncertaintyid15', array('id' => 'val_uncertaintyid15', 'class' => 'form-control', 'label' => false, 'type' => 'select', 'empty' => '-- Select Uncertainty --','options' => array('1' => 'uicestability','2' => 'ustability','3' => 'uuniformity','4' => 'udrift',
                                           '5' => 'uimm','6' => 'uheateffect','7' => 'ugravity','8' => 'uother1','9' => 'uother2','10' => 'uother3','11' => 'uother4','12' => 'uother5','13' => 'uother6','14' => 'uother7','15' => 'uother8','16' => 'uother9','17' => 'uother10','18' => 'uother11','19' => 'uother12',
                                           '20' => 'uother13',), )); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('uncertaintydata15', array('id' => 'val_uncertaintydata15', 'class' => 'form-control', 'placeholder' => '', 'label' => false,'autoComplete'=>'off')); ?>
                                
                                </div>
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('uncertaintyid15percenttype', array('id' => 'val_uncertaintyid15percenttype', 'class' => 'form-control', 'label' => false, 'type' => 'select','options'=>array('1'=>'Value','2'=>'% on Reading','3'=>'% on Fullscale'))); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('uncertaintyid15percent', array('id' => 'val_uncertaintyid15percent', 'class' => 'form-control', 'label' => false, 'placeholder' => '','readonly'=>true)); ?>
                                </div>             
                            </div>
                        </div>
                      <div class="form-group col-md-12">
                            <div class="col-md-12">
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('uncertaintyid16', array('id' => 'val_uncertaintyid16', 'class' => 'form-control', 'label' => false, 'type' => 'select', 'empty' => '-- Select Uncertainty --','options' => array('1' => 'uicestability','2' => 'ustability','3' => 'uuniformity','4' => 'udrift',
                                           '5' => 'uimm','6' => 'uheateffect','7' => 'ugravity','8' => 'uother1','9' => 'uother2','10' => 'uother3','11' => 'uother4','12' => 'uother5','13' => 'uother6','14' => 'uother7','15' => 'uother8','16' => 'uother9','17' => 'uother10','18' => 'uother11','19' => 'uother12',
                                           '20' => 'uother13',), )); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('uncertaintydata16', array('id' => 'val_uncertaintydata16', 'class' => 'form-control', 'placeholder' => '', 'label' => false,'autoComplete'=>'off')); ?>
                                
                                </div>
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('uncertaintyid16percenttype', array('id' => 'val_uncertaintyid16percenttype', 'class' => 'form-control', 'label' => false, 'type' => 'select','options'=>array('1'=>'Value','2'=>'% on Reading','3'=>'% on Fullscale'))); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('uncertaintyid16percent', array('id' => 'val_uncertaintyid16percent', 'class' => 'form-control', 'label' => false, 'placeholder' => '','readonly'=>true)); ?>
                                </div>             
                            </div>
                        </div>
                      <div class="form-group col-md-12">
                            <div class="col-md-12">
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('uncertaintyid17', array('id' => 'val_uncertaintyid17', 'class' => 'form-control', 'label' => false, 'type' => 'select', 'empty' => '-- Select Uncertainty --','options' => array('1' => 'uicestability','2' => 'ustability','3' => 'uuniformity','4' => 'udrift',
                                           '5' => 'uimm','6' => 'uheateffect','7' => 'ugravity','8' => 'uother1','9' => 'uother2','10' => 'uother3','11' => 'uother4','12' => 'uother5','13' => 'uother6','14' => 'uother7','15' => 'uother8','16' => 'uother9','17' => 'uother10','18' => 'uother11','19' => 'uother12',
                                           '20' => 'uother13',), )); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('uncertaintydata17', array('id' => 'val_uncertaintydata17', 'class' => 'form-control', 'placeholder' => '', 'label' => false,'autoComplete'=>'off')); ?>
                                
                                </div>
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('uncertaintyid17percenttype', array('id' => 'val_uncertaintyid17percenttype', 'class' => 'form-control', 'label' => false, 'type' => 'select','options'=>array('1'=>'Value','2'=>'% on Reading','3'=>'% on Fullscale'))); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('uncertaintyid17percent', array('id' => 'val_uncertaintyid17percent', 'class' => 'form-control', 'label' => false, 'placeholder' => '','readonly'=>true)); ?>
                                </div>             
                            </div>
                        </div>
                      <div class="form-group col-md-12">
                            <div class="col-md-12">
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('uncertaintyid18', array('id' => 'val_uncertaintyid18', 'class' => 'form-control', 'label' => false, 'type' => 'select', 'empty' => '-- Select Uncertainty --','options' => array('1' => 'uicestability','2' => 'ustability','3' => 'uuniformity','4' => 'udrift',
                                           '5' => 'uimm','6' => 'uheateffect','7' => 'ugravity','8' => 'uother1','9' => 'uother2','10' => 'uother3','11' => 'uother4','12' => 'uother5','13' => 'uother6','14' => 'uother7','15' => 'uother8','16' => 'uother9','17' => 'uother10','18' => 'uother11','19' => 'uother12',
                                           '20' => 'uother13',), )); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('uncertaintydata18', array('id' => 'val_uncertaintydata18', 'class' => 'form-control', 'placeholder' => '', 'label' => false,'autoComplete'=>'off')); ?>
                                
                                </div>
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('uncertaintyid18percenttype', array('id' => 'val_uncertaintyid18percenttype', 'class' => 'form-control', 'label' => false, 'type' => 'select','options'=>array('1'=>'Value','2'=>'% on Reading','3'=>'% on Fullscale'))); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('uncertaintyid18percent', array('id' => 'val_uncertaintyid18percent', 'class' => 'form-control', 'label' => false, 'placeholder' => '','readonly'=>true)); ?>
                                </div>             
                            </div>
                        </div>
                      <div class="form-group col-md-12">
                            <div class="col-md-12">
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('uncertaintyid19', array('id' => 'val_uncertaintyid19', 'class' => 'form-control', 'label' => false, 'type' => 'select', 'empty' => '-- Select Uncertainty --','options' => array('1' => 'uicestability','2' => 'ustability','3' => 'uuniformity','4' => 'udrift',
                                           '5' => 'uimm','6' => 'uheateffect','7' => 'ugravity','8' => 'uother1','9' => 'uother2','10' => 'uother3','11' => 'uother4','12' => 'uother5','13' => 'uother6','14' => 'uother7','15' => 'uother8','16' => 'uother9','17' => 'uother10','18' => 'uother11','19' => 'uother12',
                                           '20' => 'uother13',), )); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('uncertaintydata19', array('id' => 'val_uncertaintydata19', 'class' => 'form-control', 'placeholder' => '', 'label' => false,'autoComplete'=>'off')); ?>
                                
                                </div>
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('uncertaintyid19percenttype', array('id' => 'val_uncertaintyid19percenttype', 'class' => 'form-control', 'label' => false, 'type' => 'select','options'=>array('1'=>'Value','2'=>'% on Reading','3'=>'% on Fullscale'))); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('uncertaintyid19percent', array('id' => 'val_uncertaintyid19percent', 'class' => 'form-control', 'label' => false, 'placeholder' => '','readonly'=>true)); ?>
                                </div>             
                            </div>
                        </div>
                      <div class="form-group col-md-12">
                            <div class="col-md-12">
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('uncertaintyid20', array('id' => 'val_uncertaintyid20', 'class' => 'form-control', 'label' => false, 'type' => 'select', 'empty' => '-- Select Uncertainty --','options' => array('1' => 'uicestability','2' => 'ustability','3' => 'uuniformity','4' => 'udrift',
                                           '5' => 'uimm','6' => 'uheateffect','7' => 'ugravity','8' => 'uother1','9' => 'uother2','10' => 'uother3','11' => 'uother4','12' => 'uother5','13' => 'uother6','14' => 'uother7','15' => 'uother8','16' => 'uother9','17' => 'uother10','18' => 'uother11','19' => 'uother12',
                                           '20' => 'uother13',), )); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('uncertaintydata20', array('id' => 'val_uncertaintydata20', 'class' => 'form-control', 'placeholder' => '', 'label' => false,'autoComplete'=>'off')); ?>
                                
                                </div>
                                <div class="col-md-3">
                                   <?php echo $this->Form->input('uncertaintyid20percenttype', array('id' => 'val_uncertaintyid20percenttype', 'class' => 'form-control', 'label' => false, 'type' => 'select','options'=>array('1'=>'Value','2'=>'% on Reading','3'=>'% on Fullscale'))); ?>
                                
                                </div>
                                <div class="col-md-3">
                                    <?php echo $this->Form->input('uncertaintyid20percent', array('id' => 'val_uncertaintyid20percent', 'class' => 'form-control', 'label' => false, 'placeholder' => '','readonly'=>true)); ?>
                                </div>             
                            </div>
                        </div>
                     </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group form-actions">
                <div class="col-md-2 pull-right row">
                    <?php echo $this->Form->button('<i class="fa fa-plus"></i> Add', array('type' => 'submit', 'class' => 'btn btn-sm btn-primary', 'escape' => false)); ?> &nbsp;
                    <?php echo $this->Form->button('<i class="fa fa-times-circle"></i> Cancel', array('type' => 'reset', 'class' => 'btn btn-sm btn-warning', 'escape' => false)); ?>
                </div>
            </div>
            </div>
            <div class="col-sm-3 col-lg-12 subcontract_linear uncertainly_table">
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
        <!-- END Basic Form Elements Block -->
    </div>
<?php echo $this->Html->script('pages/formsValidation'); ?>
    <script>$(function() { FormsValidation.init(); });</script>




