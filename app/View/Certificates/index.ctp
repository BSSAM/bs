
                        </div>
                    </div>
             <style>.content-header{display:none;}</style>      
                    <ul class="breadcrumb breadcrumb-top">
                          <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
                        <li><?php echo $this->Html->link('Certificates',array('controller'=>'Certificates','action'=>'index')); ?></li>
                        <li>Add Certificate</li>
                    </ul>
                    <!-- END Forms General Header -->

                <div class="row">
                        <div class="col-md-12">
                            <!-- Basic Form Elements Block -->
                            <div class="block">
                                <!-- Basic Form Elements Title -->
                                <div class="block-title clearfix">
                                    
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
                                            <td class="text-center"><select>
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
                                              </select></td>
                                            <td><select>
                                                <option value="1" selected="selected">TEMPERATURE</option>
                                                <option value="2">HUMIDITY</option>
                                              </select></td>
                                            <td><select>
                                                <option value="1" selected="selected">CHANNEL-1</option>
                                                <option value="2">CHANNEL-2</option>
                                                <option value="3">CHANNEL-3</option>
                                              </select></td>
                                          </tr>
                                        </tbody>
                                      </table>
                                      <div class="pull-left">
                                      <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-search"></i> Search</button>
<button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-repeat"></i> Reset</button>
                                      </div>
                                      
                                      <table  class="table table-vcenter table-condensed table-bordered certificate_top_search1">
                                      
                                        <tbody class="subcontract_instrument_info">
                                          <tr>
                                            
                                            <td><input type="checkbox" /></td>
                                            <td>If Analog(Default:Digital)</td>
                                          </tr>
                                          <tr>
                                            
                                            <td><input type="checkbox" /></td>
                                            <td>If After Adjustment</td>
                                          </tr>
                                        </tbody>
                                      </table>
                                    </div>

                                </div>
                                <!-- END Form Elements Title -->
                                <!-- Basic Form Elements Content -->
                                <div class="panel panel-default">
                                    
                                    <div class="panel-body panel-body-nopadding">
                                        <!-- BASIC WIZARD -->
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
                                                    <?PHP echo $this->element('Certificates/calculation_form'); ?>
                                                </div>
                                                <div class="tab-pane" id="tab2">
                                                    <?PHP echo $this->element('Certificates/form1'); ?>
                                                </div>
                                                <div class="tab-pane" id="tab3">
                                                    <?PHP echo $this->element('Certificates/form2'); ?>
<!--                                                    <div class="form-group form-actions">
                                                        <div class="col-md-9 col-md-offset-10">
                                                            <?php //echo $this->Form->button('<i class="fa fa-angle-right"></i> Submit', array('type' => 'submit', 'class' => 'btn btn-sm btn-primary', 'escape' => false)); ?>
                                                            <?php //echo $this->Form->button('<i class="fa fa-repeat"></i> Reset', array('type' => 'reset', 'class' => 'btn btn-sm btn-warning', 'escape' => false)); ?>
                                                        </div>
                                                    </div>-->
                                                </div>
                                               
                                                 <?php //echo $this->Form->end(); ?>
                                                <div class="tab-pane" id="tab4">
                                                    <?PHP echo $this->element('Certificates/uncertainty'); ?>
                                                </div>
                                                 <div class="tab-pane" id="tab5">
                                                    <?PHP echo $this->element('Certificates/specification'); ?>
                                                </div>
                                                
                                            </div><!-- tab-content -->
                                            <!-- #basicWizard -->
                                        </div><!-- panel-body -->
                                    </div>
                                    <!-- panel -->
                                </div>
                                <!-- END Basic Form Elements Content -->
                            </div>
                            <!-- END Basic Form Elements Block -->
                        </div>
    <?php echo $this->Html->script('pages/formsValidation'); ?>
        
         
                        
