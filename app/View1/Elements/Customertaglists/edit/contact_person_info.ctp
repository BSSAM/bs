<div class="form-group">
    <label class="col-md-2 control-label" for="val_salespeoples">Name</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('name', array('id'=>'contact_name','class'=>'form-control','placeholder'=>'Enter the contact Person name','label'=>false)); ?>
        <span class="help-block_login name_error">Enter the Contact Person name</span>

    </div>
    <label class="col-md-2 control-label" for="val_postalcode">Email</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('email', array('id'=>'contact_email','class'=>'form-control','placeholder'=>'Enter the Email Id','label'=>false)); ?>
        <span class="help-block_login email_error">Enter the Mail id</span>
    </div>
</div>
<div class="form-group">
    <label class="col-md-2 control-label" for="val_referredbies">Department</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('department', array('id'=>'contact_department','class'=>'form-control','placeholder'=>'Enter the Department name','label'=>false)); ?>
    </div>
    <label class="col-md-2 control-label" for="val_billaddress">Position</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('position', array('id'=>'contact_position','class'=>'form-control','placeholder'=>'Enter the Position','label'=>false)); ?>
    </div>
    
</div>
<div class="form-group">
    <label class="col-md-2 control-label" for="contact_phone">Phone</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('phoneno', array('id'=>'contact_phone','class'=>'form-control','placeholder'=>'Enter the Phone Number','label'=>false)); ?>
    </div>
    <label class="col-md-2 control-label" for="var_phone">Mobile</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('mobile', array('id'=>'contact_mobile','class'=>'form-control','placeholder'=>'Enter the Phone No','label'=>false)); ?>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label" for="val_fax">Purpose</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('purpose', array('id'=>'contact_purpose','class'=>'form-control','placeholder'=>'Enter the Purpose','label'=>false)); ?>
    </div>
    <label class="col-md-2 control-label" for="val_billaddress">Remark</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('remark', array('id'=>'contact_remark','class'=>'form-control','placeholder'=>'Enter Remark','label'=>false,'type'=>'textarea')); ?>
    </div>
</div>
<div class="form-group form-actions">
    <div class="col-md-9 col-md-offset-10 update_button_for_contactperson"><div id="check"></div>
        <?php //echo $this->Form->input('',array('id'=>'id')); ?>
        <?php  echo $this->Form->button('<i class="fa fa-plus fa-fw"></i> add',array('type'=>'button','class'=>'btn btn-sm btn-primary tag_contactperson_submit','escape' => false)); ?>
    </div>
</div>
    
<table id="beforedo-datatable" class="table table-vcenter table-condensed table-bordered">
    <thead>
        <tr>
            <th class="text-center">Customer ID</th>
            <th class="text-center">Name</th>
            <th class="text-center">Email</th>
            <th class="text-center">Department</th>
            <th class="text-center">Position</th>
            <th class="text-center">Phone</th>
            <th class="text-center">Mobile</th>
            <th class="text-center">Purpose</th>
            <th class="text-center">Remarks</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody class="tag_contact_info_row">
        <?PHP if(!empty($contactpersoninfo )): ?>
        <?php foreach($contactpersoninfo as $contactpersoninfo_list): ?>
        <tr id="<?php echo $contactpersoninfo_list['Contactpersoninfo']['id']; ?>" class="tag_contact_remove_<?php echo $contactpersoninfo_list['Contactpersoninfo']['id']; ?>" >
                                        <td class="text-center"><?php echo $contactpersoninfo_list['Contactpersoninfo']['customer_id']; ?></td>
                                        <td class="text-center"><?php echo $contactpersoninfo_list['Contactpersoninfo']['name']; ?></td>
                                        <td class="text-center"><?php echo $contactpersoninfo_list['Contactpersoninfo']['email']; ?></td>
                                        <td class="text-center"><?php echo $contactpersoninfo_list['Contactpersoninfo']['department']; ?></td>
                                        <td class="text-center"><?php echo $contactpersoninfo_list['Contactpersoninfo']['position']; ?></td>
                                        <td class="text-center"><?php echo $contactpersoninfo_list['Contactpersoninfo']['phone']; ?></td>
                                        <td class="text-center"><?php echo $contactpersoninfo_list['Contactpersoninfo']['mobile']; ?></td>
                                        <td class="text-center"><?php echo $contactpersoninfo_list['Contactpersoninfo']['purpose']; ?></td>
                                        <td class="text-center"><?php echo $contactpersoninfo_list['Contactpersoninfo']['remarks']; ?></td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a data-edit='<?PHP echo $contactpersoninfo_list['Contactpersoninfo']['id']; ?>' data-toggle="tooltip" title="Edit" class="btn btn-xs btn-default tag_contactperson_edit">
                                                <i class="fa fa-pencil"></i></a>
                                                <a data-delete='<?PHP echo $contactpersoninfo_list['Contactpersoninfo']['id']; ?>' data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger tag_contact_delete">
                                                <i class="fa fa-times"></i></a></div>
                                            </div>
                                        </td>
                                    </tr>
        <?PHP endforeach; ?>
       <?PHP endif; ?>
    </tbody>
</table>

<div class="form-group form-actions">
    <div class="col-md-9 col-md-offset-10">
        <?php if ($user_role['cus_customer']['add'] == 1 && $customer_dat['Customer']['is_approved'] == 0): ?>
            <?php echo $this->Form->button('<i class="fa fa-angle-right"></i> <b>Approve</b>', array('type' => 'button', 'class' => 'btn btn-sm btn-danger approve_customertag', 'escape' => false)); ?>
        <?php else : ?>
            <?php echo $this->Form->button('<i class="fa fa-angle-right"></i> Update', array('type' => 'submit', 'class' => 'btn btn-sm btn-primary', 'escape' => false)); ?>
            <?php echo $this->HTMl->link('<i class="fa fa-angle-right"></i> Cancel', array('controller' => 'Customertaglists', 'action' => 'index'), array('type' => 'reset', 'class' => 'btn btn-sm btn-warning', 'escape' => false)); ?>
        <?php endif; ?>

    </div>
</div>