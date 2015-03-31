<script>var path_url='<?PHP echo Router::url('/',true); ?>';</script>
<script>
$(function() {
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
});
</script>
<h1>
    <i class="gi gi-user"></i>Edit Sub Contract Delivery Order
</h1>
</div>
</div>
<ul class="breadcrumb breadcrumb-top">
    <li><?php echo $this->Html->link('Home', array('controller' => 'Dashboards', 'action' => 'index')); ?></li>
    <li><?php echo $this->Html->link('Sub Contract DO', array('controller' => 'Subcontractdos', 'action' => 'index')); ?></li>
    <li>Edit Sub Contract DO</li>
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
                                <input type="text" class="form-control" autoComplete='off' placeholder="Enter Sales Order No" id="subcontract_input_search" name="sub-sales-no" value ="<?php echo $subcondo['Subcontractdo']['salesorder_id']; ?>" readonly="readonly"/>
                            </div>
<!--                            <span class="input-group-btn">
                                <button class="btn btn-primary subcontract_search" type="button">Proceed</button>
                            </span>-->
                        </div>
<!--                        <div id="subcontract_list" class="instrument_drop">
                        </div>-->
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
                    <?php echo $this->Form->input('subcontract_name', array('id' => 'val_customername', 'class' => 'form-control', 'placeholder' => 'Enter the Sub Contract Name', 'label' => false,'autoComplete'=>'off','value'=>$subcondo['Subcontractdo']['subcontract_name'], 'readonly' => true)); ?>
<!--                <div id="subcontract_result">
                </div>-->
                </div>
                <label class="col-md-2 control-label" for="val_regaddress">Address</label>
                <div class="col-md-4">
                    <?php echo $this->Form->input('subcontract_address', array('id' => 'val_regaddress', 'class' => 'form-control', 'placeholder' => 'Enter Sub Contract Address', 'label' => false,'readonly' => true,'value'=>$subcondo['Subcontractdo']['subcontract_address'])); ?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label" for="val_attn">ATTN <span class="text-danger">*</span></label>
                <div class="col-md-4">
                    <?php echo $this->Form->input('subcontract_attn', array('id' => 'val_attn', 'class' => 'form-control', 'label' => false, 'type' => 'text', 'empty' => 'Select Contact person Name','value'=>$contact_list['Contactpersoninfo']['name'], 'readonly' => true)); ?>
                </div>
                <label class="col-md-2 control-label" for="val_phone">Phone <span class="text-danger">*</span></label>
                <div class="col-md-4">
                    <?php echo $this->Form->input('subcontract_phone', array('id' => 'val_phone', 'class' => 'form-control',
                        'placeholder' => 'Enter the Phone Number', 'label' => false, 'autoComplete' => 'off', 'readonly' => true,'value'=>$contact_list['Contactpersoninfo']['phone']));
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="val_fax">Fax</label>
                <div class="col-md-4">
                    <?php echo $this->Form->input('subcontract_fax', array('id' => 'val_fax', 'class' => 'form-control', 'label' => false, 'placeholder' => 'Enter the Fax Number', 'readonly' => true,'value'=>$subcondo['Subcontractdo']['subcontract_fax'])); ?>
                </div>
                <label class="col-md-2 control-label" for="val_email">Email</label>
                <div class="col-md-4">
                    <?php echo $this->Form->input('subcontract_email', array('id' => 'val_email', 'class' => 'form-control',
                        'placeholder' => 'Enter the Email Id', 'label' => false, 'autoComplete' => 'off', 'readonly' => true,'value'=>$contact_list['Contactpersoninfo']['email']));
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="val_subcontractdono">Sub Contract DO No </label>
                <div class="col-md-4">
                    <?php echo $this->Form->input('subcontract_dono', array('id'=>'val_subcontractdono','class'=>'form-control','label'=>false,'placeholder'=>'Enter the Sub Contract DO No','value'=>$subcondo['Subcontractdo']['subcontract_dono'],'readonly'=>true)); ?>
                </div>
                <label class="col-md-2 control-label" for="val_date">Date</label>
                <div class="col-md-4">
                    <?php echo $this->Form->input('subcontract_date', array('id'=>'val_date','class'=>'form-control input-datepicker-close','data-date-format'=>'dd-MM-yy',
                                                'placeholder'=>'Enter the Registration Date','label'=>false,'value'=>$subcondo['Subcontractdo']['subcontract_date'],'readonly'=>true)); ?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label" for="val_duedate">Due Date </label>
                <div class="col-md-4">
                    <?php echo $this->Form->input('subcontract_duedate', array('id' => 'val_duedate', 'class' => 'form-control input-datepicker-close', 'data-date-format' => 'yyyy-mm-dd',
                        'placeholder' => 'Enter the Due Date', 'label' => false,'value'=>$subcondo['Subcontractdo']['subcontract_duedate'],'readonly'=>true));
                    ?>
                </div>
                <label class="col-md-2 control-label" for="val_ref_no">Your Ref No</label>
                <div class="col-md-4">
                    <?php echo $this->Form->input('subcontract_ref_no', array('id' => 'val_ref_no', 'class' => 'form-control', 'label' => false, 'placeholder' => 'Enter the Reference Number','readonly'=>true,'value'=>$subcondo['Subcontractdo']['subcontract_ref_no'])); ?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label" for="val_trackid">Track ID</label>
                <div class="col-md-4">
                    <?php echo $this->Form->input('subcontract_track_id', array('id'=>'val_trackid','type'=>'text','class'=>'form-control','label'=>false,'placeholder'=>'Enter the Track Id','readonly'=>true,'value'=>$subcondo['Subcontractdo']['subcontract_track_id'])); ?>
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
                            'placeholder' => 'Sales Person Name', 'label' => false,'readonly','value'=>$subcondo['Subcontractdo']['subcontract_salesperson']));
                ?>
                </div>  
                
                <label class="col-md-2 control-label" for="val_service_id">Service Type <span class="text-danger">*</span></label>
                <div class="col-md-4">
                <?php
                    echo $this->Form->input('service_id', array('id' => 'val_service_id', 'class' => 'form-control', 'type' => 'text',
                     'label' => false, 'empty'=>'Select Service Type','value'=>$service['Service']['servicetype']));
                ?>
                </div> 
            </div>
            <div class="form-group">
            <label class="col-md-2 control-label" for="val_remarks">Remarks</label>
            <div class="col-md-4">
            <?php
                echo $this->Form->input('subcontract_remarks', array('id' => 'val_remarks', 'class' => 'form-control',
            'placeholder' => 'Enter Remarks', 'label' => false,'type'=>'textarea','value'=>$subcondo['Subcontractdo']['subcontract_remarks']));
            ?>    
            </div>
            <label class="col-md-2 control-label" for="val_instrument_type_id">Select Instrument For <span class="text-danger">*</span></label>
            <div class="col-md-4">
            <?php
                echo $this->Form->input('instrument_type_id', array('id' => 'val_instrument_type_id','class'=>'form-control','type'=>'select',
                                                'label'=>false,'empty'=>'-- Select instrument For --','readonly'=>'readonly','value'=>$subcondo['Subcontractdo']['instrument_type_id']));
            ?> 
            </div>
           
            <div class="col-lg-12">
                <h4 class="sub-header"><small><b>Instruments List </b</small></h4>
            </div>
             <?PHP 
        //pr($deliveryorder['DelDescription']);exit;
        $device1 = 0;
        $device2 = 0;
        $device3 = 0;
        $device4 = 0;
        $device5 = 0;
        $device6 = 0;
        $device7 = 0;
        $device8 = 0;
            if(!empty($salesorder['Description'])):
                foreach($salesorder['Description'] as $device):
                    if($device['title1_val']!=''): $device1 +=1; endif;
                    if($device['title2_val']!=''): $device2 +=1; endif;
                    if($device['title3_val']!=''): $device3 +=1; endif;
                    if($device['title4_val']!=''): $device4 +=1; endif;
                    if($device['title5_val']!=''): $device5 +=1; endif;
                    if($device['title6_val']!=''): $device6 +=1; endif;
                    if($device['title7_val']!=''): $device7 +=1; endif;
                    if($device['title8_val']!=''): $device8 +=1; endif;
                endforeach;
            endif;
        ?>
            <div class="col-sm-3 col-lg-12">
    <div class="table-responsive">
<table  class="table table-vcenter table-condensed table-bordered">
    <thead>
        <tr>
            <th class="text-center">S.No</th>
            <th class="text-center">Instrument</th>
            <th class="text-center">Brand</th>
            <th class="text-center">Range</th>
            <th class="text-center">Model No</th>
            <th class="text-center">Call Location</th>
            <th class="text-center">Validity</th>
            
            <th class="text-center">Department</th>
            <?php if($device1 != 0): ?> 
            <th class="text-center edit_title1"><?php echo $titles[0]; ?></th>
            <?php endif; ?>
             <?php if($device2 != 0): ?> 
            <th class="text-center edit_title2"><?php echo $titles[1]; ?></th>
            <?php endif; ?>
             <?php if($device3 != 0): ?> 
            <th class="text-center edit_title3"><?php echo $titles[2]; ?></th>
            <?php endif; ?>
             <?php if($device4 != 0): ?> 
            <th class="text-center edit_title4"><?php echo $titles[3]; ?></th>
            <?php endif; ?>
             <?php if($device5 != 0): ?> 
            <th class="text-center edit_title5"><?php echo $titles[4]; ?></th>
            <?php endif; ?>
             <?php if($device6 != 0): ?> 
            <th class="text-center edit_title6"><?php echo $titles[5]; ?></th>
            <?php endif; ?>
             <?php if($device7 != 0): ?> 
            <th class="text-center edit_title7"><?php echo $titles[6]; ?></th>
            <?php endif; ?>
             <?php if($device8 != 0): ?> 
            <th class="text-center edit_title8"><?php echo $titles[7]; ?></th>
            <?php endif; ?>
            
        </tr>
    </thead>
    <tbody class="sales_Instrument_info"> 
    <?PHP 
       
            if(!empty($salesorder['Description'])):
               
                foreach($salesorder['Description'] as $device):
                    if($device['title1_val']!=''): $device1 +=1; endif;
                    if($device['title2_val']!=''): $device2 +=1; endif;
                    if($device['title3_val']!=''): $device3 +=1; endif;
                    if($device['title4_val']!=''): $device4 +=1; endif;
                    if($device['title5_val']!=''): $device5 +=1; endif;
                    if($device['title6_val']!=''): $device6 +=1; endif;
                    if($device['title7_val']!=''): $device7 +=1; endif;
                    if($device['title8_val']!=''): $device8 +=1; endif;
                    ?>
              
                <tr class="sales_instrument_remove_<?PHP echo $device['id']; ?>">
                    <td class="text-center"><?PHP echo $device['order_by']; ?></td>
                    <td class="text-center"><?PHP echo $device['Instrument']['name']; ?></td>
                    <td class="text-center"><?PHP echo $device['Brand']['brandname']; ?></td>
                    <td class="text-center"><?PHP echo $device['Range']['range_name']; ?></td>
                    <td class="text-center"><?PHP echo $device['model_no']; ?></td>
                    <td class="text-center"><?PHP echo $device['sales_calllocation']; ?></td>
                    <td class="text-center"><?PHP echo $device['sales_validity']; ?></td>
                    
                    <td class="text-center"><?PHP echo $device['Department']['departmentname']; ?></td>
                    <?php if($device1 != 0): ?> 
                    <td class="text-center edit_title1" id="<?PHP echo $device['id']; ?>"><?PHP echo $device['title1_val']; ?></td>
                    <?php endif; ?>
                    <?php if($device2 != 0): ?> 
                    <td class="text-center edit_title2" id="<?PHP echo $device['id']; ?>"><?PHP echo $device['title2_val']; ?></td>
                    <?php endif; ?>
                    <?php if($device3 != 0): ?> 
                    <td class="text-center edit_title3" id="<?PHP echo $device['id']; ?>"><?PHP echo $device['title3_val']; ?></td>
                    <?php endif; ?>
                    <?php if($device4 != 0): ?> 
                    <td class="text-center edit_title4" id="<?PHP echo $device['id']; ?>"><?PHP echo $device['title4_val']; ?></td>
                    <?php endif; ?>
                    <?php if($device5 != 0): ?> 
                    <td class="text-center edit_title5" id="<?PHP echo $device['id']; ?>"><?PHP echo $device['title5_val']; ?></td>
                    <?php endif; ?>
                    <?php if($device6 != 0): ?> 
                    <td class="text-center edit_title6" id="<?PHP echo $device['id']; ?>"><?PHP echo $device['title6_val']; ?></td>
                    <?php endif; ?>
                    <?php if($device7 != 0): ?> 
                    <td class="text-center edit_title7" id="<?PHP echo $device['id']; ?>"><?PHP echo $device['title7_val']; ?></td>
                    <?php endif; ?>
                    <?php if($device8 != 0): ?> 
                    <td class="text-center edit_title8" id="<?PHP echo $device['id']; ?>"><?PHP echo $device['title8_val']; ?></td>
                    <?php endif; ?>
                    
                </tr>
        <?PHP   endforeach;
                   endif; 
        ?>
    </tbody>
</table>
</div>
</div>
            <div class="form-group form-actions">
                <div class="col-md-9 col-md-offset-10">
                    <?php //echo $this->Form->button('<i class="fa fa-angle-right"></i> Submit', array('type' => 'submit', 'class' => 'btn btn-sm btn-primary', 'escape' => false)); ?> &nbsp;
                    <?php  if($subcondo['Subcontractdo']['is_approved']==0): ?>
                    <?php  echo $this->Form->button('<i class="fa fa-angle-right"></i> Approve',array('type'=>'button','class'=>'btn btn-sm btn-danger approve_subcon','escape' => false,'id'=>$subcondo['Subcontractdo']['id'])); ?>
                    <?php  echo $this->Form->button('<i class="fa fa-angle-right"></i> Update',array('type'=>'submit','class'=>'btn btn-sm btn-primary','escape' => false)); ?>
                    <?php else : ?>
                    <?php  echo $this->Form->button('<i class="fa fa-angle-right"></i> Update',array('type'=>'submit','class'=>'btn btn-sm btn-primary','escape' => false)); ?>
                    <?php endif; ?>
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




