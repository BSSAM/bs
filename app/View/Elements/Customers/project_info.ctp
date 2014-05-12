<div class="form-group">
    <label class="col-md-2 control-label" for="val_customername">S.No</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('serial_no', array('id'=>'serial','class'=>'form-control ','label'=>false,'readonly'=>true)); ?>
    </div>
    <label class="col-md-2 control-label" for="val_postalcode">Project Name *</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('project_name', array('id'=>'project_name','class'=>'form-control','placeholder'=>'Enter Project name','label'=>false)); ?>
        <span class="help-block_login project_name_error">Enter the Project Name</span>
    </div>
</div>
<div class="form-group form-actions">
    <div class="col-md-9 col-md-offset-10">
        <?php  echo $this->Form->button('<i class="fa fa-plus fa-fw"></i> add',array('type'=>'button','class'=>'btn btn-sm btn-primary project_submit','escape' => false)); ?>
    </div>
</div>
    
<table  class="table table-vcenter table-condensed table-bordered">
    <thead>
        <tr>
            <th class="text-center">S.No</th>
            <th class="text-center">Project Name</th>
            <th class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody class="project_info_row">
    </tbody>
</table>