<script>
    var path_url='<?PHP echo Router::url('/',true); ?>';
</script>

<script type="text/javascript">

$(function(){
    $("#sales_list").hide();
});
</script>
<h1>
    <i class="gi gi-user"></i>Add Sub Contract Delivery Order
</h1>
</div>
</div>
<ul class="breadcrumb breadcrumb-top">
    <li><?php echo $this->Html->link('Home', array('controller' => 'Dashboards', 'action' => 'index')); ?></li>
    <li><?php echo $this->Html->link('Sub Contract DO', array('controller' => 'Subcontractdos', 'action' => 'index')); ?></li>
    <li>Add Sub Contract DO</li>
</ul>
<!-- END Forms General Header -->

<div class="row">
    <div class="col-md-12">
        <!-- Basic Form Elements Block -->
        <div class="block">
            <!-- Basic Form Elements Title -->
            <div class="block-title">

                <h2>
                                        <div class="col-md-4 search_move">
                                            <div class="input-group">
                                                <div>
                                                    <input type="text" class="form-control" autoComplete='off' placeholder="Enter Sales Order No" id="delivery_input_search"/>
                                                </div>
                                                 <span class="input-group-btn">
                                                    <button class="btn btn-primary delivery_search" type="button">Proceed</button>
                                                </span>
                                            </div>
                                             <div id="sales_list">
                                                </div>
                                        </div>
                                    </h2>
            </div>
            <!-- END Form Elements Title -->

            <!-- Basic Form Elements Content -->


            <?php echo $this->Form->create('Subcontractdo', array('class' => 'form-horizontal form-bordered', 'id' => 'fileupload', 'enctype' => 'multipart/form-data')); ?>

            <div class="form-group">

                <label class="col-md-2 control-label" for="val_customername">Sub Contract Name</label>
                <div class="col-md-4">
                    <?php echo $this->Form->input('customername', array('id' => 'val_customername', 'class' => 'form-control', 'placeholder' => 'Enter the Sub Contract Name', 'label' => false, 'name' => 'customername')); ?>
                </div>

                <label class="col-md-2 control-label" for="val_regaddress">Sub Contract Address</label>
                <div class="col-md-4">
                    <?php echo $this->Form->input('regaddress', array('id'=>'val_regaddress','class'=>'form-control','placeholder'=>'Enter Sub Contract Address','label'=>false)); ?>
                </div>

            </div>

            <div class="form-group">

                <label class="col-md-2 control-label" for="val_attn">ATTN</label>
                <div class="col-md-4">
                    <?php echo $this->Form->input('attn', array('id'=>'val_attn','class'=>'form-control','label'=>false,'type'=>'select','empty'=>'Select Contact person Name')); ?>
                </div>
                <label class="col-md-2 control-label" for="val_phone">Phone</label>
                <div class="col-md-4">
                    <?php echo $this->Form->input('phone', array('id'=>'val_phone','class'=>'form-control',
                                                'placeholder'=>'Enter the Phone Number','label'=>false,'autoComplete'=>'off')); ?>
                </div>

            </div>
            <div class="form-group">

                <label class="col-md-2 control-label" for="val_fax">Fax</label>
                <div class="col-md-4">
                    <?php echo $this->Form->input('fax', array('id'=>'val_fax','class'=>'form-control','label'=>false,'placeholder'=>'Enter the Fax Number')); ?>
                </div>
                <label class="col-md-2 control-label" for="val_email">Email</label>
                <div class="col-md-4">
                    <?php echo $this->Form->input('email', array('id'=>'val_email','class'=>'form-control',
                                                'placeholder'=>'Enter the Email Id','label'=>false,'autoComplete'=>'off','readonly'=>'readonly')); ?>
                </div>
            </div>
            <div class="form-group">

                <label class="col-md-2 control-label" for="val_subcontractdono">Sub Contract DO No </label>
                <div class="col-md-4">
                    <?php echo $this->Form->input('subcontractdono', array('id'=>'val_subcontractdono','class'=>'form-control','label'=>false,'placeholder'=>'Enter the Sub Contract DO No')); ?>

                </div>
                <label class="col-md-2 control-label" for="val_date">Date</label>
                <div class="col-md-4">
                    <?php echo $this->Form->input('date', array('id'=>'val_date','class'=>'form-control input-datepicker-close','data-date-format'=>'dd-MM-yy',
                                                'placeholder'=>'Enter the Registration Date','label'=>false)); ?>
                </div>
            </div>

            <div class="form-group">

                <label class="col-md-2 control-label" for="val_duedate">Due Date </label>
                <div class="col-md-4">
                    <?php echo $this->Form->input('duedate', array('id'=>'val_duedate','class'=>'form-control input-datepicker-close','data-date-format'=>'dd-MM-yy',
                                                'placeholder'=>'Enter the Due Date','label'=>false)); ?>
                </div>
                <label class="col-md-2 control-label" for="val_ref_no">Your Ref No</label>
                <div class="col-md-4">
                    <?php echo $this->Form->input('ref_no', array('id'=>'val_ref_no','class'=>'form-control','label'=>false,'placeholder'=>'Enter the Reference Number')); ?>
                </div>
            </div>

            <div class="form-group">

                <label class="col-md-2 control-label" for="val_trackid">Track ID</label>
                <div class="col-md-4">
                    <?php echo $this->Form->input('track_id', array('id'=>'val_trackid','class'=>'form-control','label'=>false,'placeholder'=>'Enter the Track Id')); ?>
                </div>

            </div>

            <div class="col-lg-12">
                <h4 class="sub-header"><small>Customer Special Needs</small></h4>
            </div>

            <div class="form-group">

                <label class="col-md-2 control-label" for="val_salesperson">Sales person</label>
                <div class="col-md-4">
                <?php
                    echo $this->Form->input('Customerspecialneed.salesperson', array('id' => 'val_salesperson', 'class' => 'form-control',
                            'placeholder' => 'Sales Person Name', 'label' => false,'readonly'));
                    echo $this->Form->input('Customerspecialneed.salespeople_id',array('type'=>'hidden','id'=>'salespeople_id'));
            
                ?>
                </div>  
                
                <label class="col-md-2 control-label" for="val_service_id">Service Type</label>
                <div class="col-md-4">
                <?php
                    echo $this->Form->input('Customerspecialneed.service_id', array('id' => 'val_service_id', 'class' => 'form-control select-chosen', 'type' => 'select',
                     'label' => false, 'options' =>'','empty'=>'Select Service Type'));
                ?>
        
                </div> 
            </div>
            <div class="form-group">
            <label class="col-md-2 control-label" for="val_remarks">Remarks</label>
            <div class="col-md-4">
            <?php
                echo $this->Form->input('Customerspecialneed.remarks', array('id' => 'val_remarks', 'class' => 'form-control',
            'placeholder' => 'Enter Remarks', 'label' => false,'type'=>'textarea'));
            ?>    
            </div>
            </div>
            
            <p>
            </p>

            <div class="col-sm-3 col-lg-12">
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
                            <th class="text-center">Unit Price</th>
                            <th class="text-center">Account Service</th>
                            <th class="text-center">Action</th>
                            <th class="text-center">Action</th>

                        </tr>
                    </thead>
                    <tbody class="Instrument_info"> 


                        <tr>
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
                        </tr>


                    </tbody>
                </table>
            </div>
            <div class="form-group form-actions">
                <div class="col-md-9 col-md-offset-10">

                    <?php echo $this->Form->button('<i class="fa fa-angle-right"></i> Submit', array('type' => 'submit', 'class' => 'btn btn-sm btn-primary', 'escape' => false)); ?> &nbsp;
<?php echo $this->Form->button('<i class="fa fa-repeat"></i> Reset', array('type' => 'reset', 'class' => 'btn btn-sm btn-warning', 'escape' => false)); ?>

                </div>
            </div>


            <!-- panel -->
<?php echo $this->Form->end(); ?>

            <!-- END Basic Form Elements Content -->
        </div>
        <!-- END Basic Form Elements Block -->
    </div>
<?php echo $this->Html->script('pages/formsValidation'); ?>
    <script>$(function() {
            FormsValidation.init();
        });</script>




