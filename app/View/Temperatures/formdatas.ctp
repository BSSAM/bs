<?php ?><h1>
                                <i class="gi gi-user"></i>Form datas(Temperature)
                            </h1>
                        </div>
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                          <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
                        <li><?php echo $this->Html->link('Form datas',array('controller'=>'Temperatures','action'=>'unitconvert')); ?></li>
                        <li>Form datas(Temperature)</li>
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
                                <?php echo $this->Form->create('Formdata',array('class'=>'form-horizontal form-bordered','id'=>'form-temp-unitconvert-add')); ?>
                                
                                    <div class="form-group">
                                       
                                        <label class="col-md-2 control-label" for="val_unitconvertname">Form1 data</label>
                                        <div class="col-md-8">
                                            <div class="input textarea">
                                                <textarea id="val_description" class="form-control" rows="3" cols="30" placeholder="Enter the Description" name="formdata1"><?php echo $formdata['Tempformdata']['formdata1'];?></textarea>
                                            </div>
                                        </div>
                                       
                                        
                                                                                
                                     </div> 
                                     <div class="form-group">
                                       
                                        <label class="col-md-2 control-label" for="val_unitconvertname"></label>
                                        <div class="col-md-8">
                                            <div class="input textarea">
                                                <textarea id="val_description" class="form-control" rows="3" cols="30" placeholder="Enter the Description" name="formdata2"><?php echo $formdata['Tempformdata']['formdata2'];?></textarea>
                                            </div>
                                        </div>
                                                                                
                                     </div> 
                                     
                                      <div class="form-group">
                                       
                                        <label class="col-md-2 control-label" for="val_unitconvertname">Method of Calibration</label>
                                        <div class="col-md-8">
                                            <div class="input textarea">
                                                <textarea id="val_description" class="form-control" rows="3" cols="30" placeholder="Enter the Description" name="methodofcal1"><?php echo $formdata['Tempformdata']['methodofcal1'];?></textarea>
                                            </div>
                                        </div>
                                                                                
                                     </div>
                                     
                                      <div class="form-group">
                                       
                                        <label class="col-md-2 control-label" for="val_unitconvertname"></label>
                                        <div class="col-md-8">
                                            <div class="input textarea">
                                                <textarea id="val_description" class="form-control" rows="3" cols="30" placeholder="Enter the Description" name="methodofcal2"><?php echo $formdata['Tempformdata']['methodofcal2'];?></textarea>
                                            </div>
                                        </div>
                                                                                
                                     </div>
                                     
                                      <div class="form-group">
                                       
                                        <label class="col-md-2 control-label" for="val_unitconvertname">Results of Calibration </label>
                                        <div class="col-md-8">
                                            <div class="input textarea">
                                                <textarea id="val_description" class="form-control" rows="3" cols="30" placeholder="Enter the Description" name="resultofcal1"><?php echo $formdata['Tempformdata']['resultofcal1'];?></textarea>
                                            </div>
                                        </div>
                                                                                
                                     </div>
                                     
                                      <div class="form-group">
                                       
                                        <label class="col-md-2 control-label" for="val_unitconvertname"></label>
                                        <div class="col-md-8">
                                            <div class="input textarea">
                                                <textarea id="val_description" class="form-control" rows="3" cols="30" placeholder="Enter the Description" name="resultofcal2"><?php echo $formdata['Tempformdata']['resultofcal2'];?></textarea>
                                            </div>
                                        </div>
                                                                                
                                     </div>
                                     
                                      <div class="form-group">
                                       
                                        <label class="col-md-2 control-label" for="val_unitconvertname">Remark</label>
                                        <div class="col-md-8">
                                            <div class="input textarea">
                                                <textarea id="val_description" class="form-control" rows="3" cols="30" placeholder="Enter the Description" name="remark1"><?php echo $formdata['Tempformdata']['remark1'];?></textarea>
                                            </div>
                                        </div>
                                                                                
                                     </div>
                                       <div class="form-group">
                                       
                                        <label class="col-md-2 control-label" for="val_unitconvertname"></label>
                                        <div class="col-md-8">
                                            <div class="input textarea">
                                                <textarea id="val_description" class="form-control" rows="3" cols="30" placeholder="Enter the Description" name="remark2"><?php echo $formdata['Tempformdata']['remark2'];?></textarea>
                                            </div>
                                        </div>
                                                                                
                                     </div>
                                       <div class="form-group">
                                       
                                        <label class="col-md-2 control-label" for="val_unitconvertname"></label>
                                        <div class="col-md-8">
                                            <div class="input textarea">
                                                <textarea id="val_description" class="form-control" rows="3" cols="30" placeholder="Enter the Description" name="remark3"><?php echo $formdata['Tempformdata']['remark3'];?></textarea>
                                            </div>
                                        </div>
                                                                                
                                     </div>
                                       <div class="form-group">
                                       
                                        <label class="col-md-2 control-label" for="val_unitconvertname"></label>
                                        <div class="col-md-8">
                                            <div class="input textarea">
                                                <textarea id="val_description" class="form-control" rows="3" cols="30" placeholder="Enter the Description" name="remark4"><?php echo $formdata['Tempformdata']['remark4'];?></textarea>
                                            </div>
                                        </div>
                                                                                
                                     </div>
                                       <div class="form-group">
                                       
                                        <label class="col-md-2 control-label" for="val_unitconvertname"></label>
                                        <div class="col-md-8">
                                            <div class="input textarea">
                                                <textarea id="val_description" class="form-control" rows="3" cols="30" placeholder="Enter the Description" name="remark5"><?php echo $formdata['Tempformdata']['remark5'];?></textarea>
                                            </div>
                                        </div>
                                                                                
                                     </div>
                                       <div class="form-group">
                                       
                                        <label class="col-md-2 control-label" for="val_unitconvertname"></label>
                                        <div class="col-md-8">
                                            <div class="input textarea">
                                                <textarea id="val_description" class="form-control" rows="3" cols="30" placeholder="Enter the Description" name="remark6"><?php echo $formdata['Tempformdata']['remark6'];?></textarea>
                                            </div>
                                        </div>
                                                                                
                                     </div>
                                       <div class="form-group">
                                       
                                        <label class="col-md-2 control-label" for="val_unitconvertname"></label>
                                        <div class="col-md-8">
                                            <div class="input textarea">
                                                <textarea id="val_description" class="form-control" rows="3" cols="30" placeholder="Enter the Description" name="remark7"><?php echo $formdata['Tempformdata']['remark7'];?></textarea>
                                            </div>
                                        </div>
                                                                                
                                     </div>
                                       <div class="form-group">
                                       
                                        <label class="col-md-2 control-label" for="val_unitconvertname"></label>
                                        <div class="col-md-8">
                                            <div class="input textarea">
                                                <textarea id="val_description" class="form-control" rows="3" cols="30" placeholder="Enter the Description" name="remark8"><?php echo $formdata['Tempformdata']['remark8'];?></textarea>
                                            </div>
                                        </div>
                                                                                
                                     </div>
                                     
                                                                         
                                     <div class="form-group form-actions">
                                        <div class="col-md-9 col-md-offset-3">
                                            <?php  echo $this->Form->button('<i class="fa fa-angle-right"></i> Submit',array('type'=>'submit','class'=>'btn btn-sm btn-primary','escape' => false)); ?>
                                            <?php echo $this->Form->button('<i class="fa fa-repeat"></i> Reset', array('type'=>'reset','class'=>'btn btn-sm btn-warning','escape' => false)); ?>
<!--                                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Submit</button>
                                            <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Reset</button>-->
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
                             
                        
                        