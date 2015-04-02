<script>var path_url='<?PHP echo Router::url('/',true); ?>';</script>
<script>
function editab() {
    
    $('.edit_title1').editable(path_url+'/Salesorders/update_title1', {
            id        : 'device_id',
            name      : 'title1',
            type      : 'text',
            cancel    : 'Cancel',
            submit    : 'Save',
            tooltip   : 'Click to edit'
       });
    $('.edit_title2').editable(path_url+'/Salesorders/update_title2', {
            id        : 'device_id',
            name      : 'title2',
            type      : 'text',
            cancel    : 'Cancel',
            submit    : 'Save',
            tooltip   : 'Click to edit'
       });
    $('.edit_title3').editable(path_url+'/Salesorders/update_title3', {
            id        : 'device_id',
            name      : 'title3',
            type      : 'text',
            cancel    : 'Cancel',
            submit    : 'Save',
            tooltip   : 'Click to edit'
       });
    $('.edit_title4').editable(path_url+'/Salesorders/update_title4', {
            id        : 'device_id',
            name      : 'title4',
            type      : 'text',
            cancel    : 'Cancel',
            submit    : 'Save',
            tooltip   : 'Click to edit'
       });
    $('.edit_title5').editable(path_url+'/Salesorders/update_title5', {
            id        : 'device_id',
            name      : 'title5',
            type      : 'text',
            cancel    : 'Cancel',
            submit    : 'Save',
            tooltip   : 'Click to edit'
       });
    $('.edit_title6').editable(path_url+'/Salesorders/update_title6', {
            id        : 'device_id',
            name      : 'title6',
            type      : 'text',
            cancel    : 'Cancel',
            submit    : 'Save',
            tooltip   : 'Click to edit'
       });
    $('.edit_title7').editable(path_url+'/Salesorders/update_title7', {
            id        : 'device_id',
            name      : 'title7',
            type      : 'text',
            cancel    : 'Cancel',
            submit    : 'Save',
            tooltip   : 'Click to edit'
       });
    $('.edit_title8').editable(path_url+'/Salesorders/update_title8', {
            id        : 'device_id',
            name      : 'title8',
            type      : 'text',
            cancel    : 'Cancel',
            submit    : 'Save',
            tooltip   : 'Click to edit'
       });
}
</script>

<script type="text/javascript">
    $(function(){
        $("#subcontract_list").hide();
        $("#subcontract_input_search").keyup(function() 
        { 
            $(this).css('border','none')
            var sales_id = $(this).val();
            var dataString = 'sale_id='+ sales_id;
            if(sales_id!='')
            {
                $.ajax({
                    type: "POST",
                    url: "<?PHP echo Router::url('/',true); ?>Subcontractdos/salesorder_id_search",
                    data: dataString,
                    cache: false,
                    success: function(html)
                    {
                        $("#subcontract_list").html(html).show();
                    }
                });
            }return false;    
        });
        
    });
</script>
 
<script type="text/javascript">

$(function(){
    $("#subcontract_result").hide();
    $("#val_customername").keyup(function() 
    { 
    //alert();    
    var customer = $(this).val();
    var dataString = 'name='+ customer;
    if(customer!='')
    {
            $.ajax({
            type: "POST",
            url: "<?PHP echo Router::url('/',true); ?>/Subcontractdos/search",
            data: dataString,
            cache: false,
            success: function(html)
            {
                $("#subcontract_result").html(html).show();

            }
            });
    }
    });
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
            <?php echo $this->Form->create('Subcontractdo', array('class' => 'form-horizontal form-bordered', 'id' => 'subcontractdo-add', 'enctype' => 'multipart/form-data')); ?>
            <div class="block-title">
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
            </div>
            <!-- END Form Elements Title -->

            <!-- Basic Form Elements Content -->


            <?php //echo $this->Form->create('Subcontractdo', array('class' => 'form-horizontal form-bordered', 'id' => 'subcontractdo-add', 'enctype' => 'multipart/form-data')); ?>
            <?PHP echo $this->Form->input('customer_id',array('type'=>'hidden')); ?>
            <?PHP echo $this->Form->input('salesorder_id',array('type'=>'hidden')); ?>
            <div class="description_list">
                
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="val_customername">Subcontractor <span class="text-danger">*</span></label>
                <div class="col-md-4">
                    <?php echo $this->Form->input('subcontract_name', array('id' => 'val_customername', 'class' => 'form-control', 'placeholder' => 'Enter the Sub Contract Name', 'label' => false,'autoComplete'=>'off')); ?>
                <div id="subcontract_result">
                </div>
                </div>
                <label class="col-md-2 control-label" for="val_regaddress">Address</label>
                <div class="col-md-4">
                    <?php echo $this->Form->input('subcontract_address', array('id' => 'val_regaddress', 'class' => 'form-control', 'placeholder' => 'Enter Sub Contract Address', 'label' => false,'readonly' => true)); ?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label" for="val_attn">ATTN <span class="text-danger">*</span></label>
                <div class="col-md-4">
                    <?php echo $this->Form->input('subcontract_attn', array('id' => 'val_attn', 'class' => 'form-control', 'label' => false, 'type' => 'select', 'empty' => 'Select Contact person Name')); ?>
                </div>
                <label class="col-md-2 control-label" for="val_phone">Phone <span class="text-danger">*</span></label>
                <div class="col-md-4">
                    <?php echo $this->Form->input('subcontract_phone', array('id' => 'val_phone', 'class' => 'form-control',
                        'placeholder' => 'Enter the Phone Number', 'label' => false, 'autoComplete' => 'off', 'readonly' => true));
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="val_fax">Fax</label>
                <div class="col-md-4">
                    <?php echo $this->Form->input('subcontract_fax', array('id' => 'val_fax', 'class' => 'form-control', 'label' => false, 'placeholder' => 'Enter the Fax Number', 'readonly' => true)); ?>
                </div>
                <label class="col-md-2 control-label" for="val_email">Email</label>
                <div class="col-md-4">
                    <?php echo $this->Form->input('subcontract_email', array('id' => 'val_email', 'class' => 'form-control',
                        'placeholder' => 'Enter the Email Id', 'label' => false, 'autoComplete' => 'off', 'readonly' => true));
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="val_subcontractdono">Sub Contract DO No </label>
                <div class="col-md-4">
                    <?php echo $this->Form->input('subcontract_dono', array('id'=>'val_subcontractdono','class'=>'form-control','label'=>false,'placeholder'=>'Enter the Sub Contract DO No','value'=>$subcontract_do_id,'readonly'=>true)); ?>
                </div>
                <label class="col-md-2 control-label" for="val_date">Date</label>
                <div class="col-md-4">
                    <?php echo $this->Form->input('subcontract_date', array('id'=>'val_date','class'=>'form-control input-datepicker-close','data-date-format'=>'dd-M-yyyy',
                                                'placeholder'=>'Enter the Registration Date','label'=>false)); ?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label" for="val_duedate">Due Date </label>
                <div class="col-md-4">
                    <?php echo $this->Form->input('subcontract_duedate', array('id' => 'val_duedate', 'class' => 'form-control input-datepicker-close', 'data-date-format' => 'yyyy-mm-dd',
                        'placeholder' => 'Enter the Due Date', 'label' => false));
                    ?>
                </div>
                <label class="col-md-2 control-label" for="val_ref_no">Your Ref No</label>
                <div class="col-md-4">
                    <?php echo $this->Form->input('subcontract_ref_no', array('id' => 'val_ref_no', 'class' => 'form-control', 'label' => false, 'placeholder' => 'Enter the Reference Number','readonly'=>true)); ?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label" for="val_trackid">Track ID</label>
                <div class="col-md-4">
                    <?php echo $this->Form->input('subcontract_track_id', array('id'=>'val_trackid','type'=>'text','class'=>'form-control','label'=>false,'placeholder'=>'Enter the Track Id','readonly'=>true)); ?>
                </div>
            </div>

            <div class="col-lg-12">
                <h4 class="sub-header"><small>Customer Special Needs</small></h4>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label" for="val_salesperson">Sales person</label>
                <div class="col-md-4">
                <?php
                    echo $this->Form->input('subcontract_salesperson', array('id' => 'val_salesperson', 'class' => 'form-control',
                            'placeholder' => 'Sales Person Name', 'label' => false,'readonly'));
                ?>
                </div>  
                
                <label class="col-md-2 control-label" for="val_service_id">Service Type <span class="text-danger">*</span></label>
                <div class="col-md-4">
                <?php
                    echo $this->Form->input('service_id', array('id' => 'val_service_id', 'class' => 'form-control select-chosen', 'type' => 'select',
                     'label' => false, 'options' =>$services,'empty'=>'Select Service Type'));
                ?>
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
            <label class="col-md-2 control-label" for="val_instrument_type_id">Select Instrument For <span class="text-danger">*</span></label>
            <div class="col-md-4">
            <?php
                echo $this->Form->input('instrument_type_id', array('id' => 'val_instrument_type_id','class'=>'form-control','type'=>'select',
                                                'label'=>false,'empty'=>'-- Select instrument For --','readonly'=>'readonly'));
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
                            <?php foreach($titles as $k=>$title): ?>
                            <th class="text-center title_val title_val<?php echo $k+1; ?> "><?php echo $title; ?></th>
                            
                            <?php endforeach; ?>
                            <th class="text-center">Action</th>

                        </tr>
                    </thead>
                    <tbody class="subcontract_instrument_info"> 
                        <tr class="text-center">    
                            <td class="" colspan="<?php echo 10+($k+1); ?>">
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




