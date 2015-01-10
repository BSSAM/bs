<script>
    var path_url='<?PHP echo Router::url('/',true); ?>';
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
                <div id="instrument_result">
                </div>
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
                <label class="col-md-2 control-label" for="val_attn">ATTN</label>
                <div class="col-md-4">
                    <?php echo $this->Form->input('subcontract_attn', array('id' => 'val_attn', 'class' => 'form-control', 'label' => false, 'type' => 'select', 'empty' => 'Select Contact person Name')); ?>
                </div>
                <label class="col-md-2 control-label" for="val_phone">Phone</label>
                <div class="col-md-4">
                    <?php echo $this->Form->input('subcontract_phone', array('id' => 'val_phone', 'class' => 'form-control',
                        'placeholder' => 'Enter the Phone Number', 'label' => false, 'autoComplete' => 'off', 'readonly' => true));
                    ?>
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
                             'label' => false,'type' => 'select', 'empty' => 'Select Reading Type')); ?>
               
                </div>  
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="val_unit">Unit</label>
                <div class="col-md-4">
                <?php
                    echo $this->Form->input('unit', array('id' => 'val_unit', 'class' => 'form-control',
                             'label' => false,'type' => 'select', 'empty' => 'Select Unit')); ?>
               
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
                <label class="col-md-2 control-label" for="val_prefref">Pref Reference</label>
                <div class="col-md-4">
                    <?php echo $this->Form->input('prefref', array('id'=>'val_prefref','type'=>'text','class'=>'form-control','label'=>false,'placeholder'=>'Enter the Pref Reference')); ?>
                </div>
                
            </div>
            <div class="form-group">
            <label class="col-md-2 control-label" for="val_remarks">Remarks</label>
            <div class="col-md-4">
            <?php
                echo $this->Form->input('subcontract_remarks', array('id' => 'val_remarks', 'class' => 'form-control',
            'placeholder' => 'Enter Remarks', 'label' => false,'type'=>'textarea'));
            ?>    
            </div>
            </div>
           
            <div class="col-lg-12">
                <h4 class="sub-header"><small><b>Instruments List </b</small></h4>
            </div>
            <div class="col-sm-3 col-lg-12 subcontract_linear">
                <table  class="table table-vcenter table-condensed table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">S.No</th>
                            <th class="text-center">Instrument</th>
                            <th class="text-center">Model No</th>
                            <th class="text-center">Brand</th>
                            <th class="text-center">Range</th>
                            <th class="text-center">Call Location</th>
                            <th class="text-center">Call Type</th>
                            <th class="text-center">Validity</th>
                            <th class="text-center">Department</th>
<!--                            <th class="text-center">Action</th>-->

                        </tr>
                    </thead>
                    <tbody class="subcontract_instrument_info"> 
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




