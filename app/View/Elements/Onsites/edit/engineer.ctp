<div class="form-group">
    <label class="col-md-2 control-label" for="val_engineer">Engineer</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('engineer', array('id'=>'val_engineer','class'=>'form-control select-chosen','label'=>false,'name'=>'engineer','empty'=>'Select Engineers','options'=>$user_list)); ?>
    </div>
</div>
<!--<div class="form-group form-actions">
    <div class="col-md-9 col-md-offset-10 update_device">
        <?php // echo $this->Form->button('<i class="fa fa-plus fa-fw"></i> add',array('type'=>'button','class'=>'btn btn-sm btn-primary engineer_add','escape' => false)); ?>
    </div>
</div>-->
<div class="col-sm-3 col-lg-12">
    <table id="engineer-datatable" class="table table-vcenter table-condensed table-bordered">
        <thead>
            <tr>
                <th class="text-center">Id</th>
                <th class="text-center">Engineer Name</th>
                <th class="text-center">Email Id</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody class="engineer_info">
            <?PHP
            if (!empty($onsite_list['OnsiteEngineer'])):
                foreach ($onsite_list['OnsiteEngineer'] as $engineer):
                    ?>
            <tr class="engineer_remove_<?PHP echo $engineer['id']; ?>">
                        <td class="text-center"><?PHP echo $engineer['id']; ?></td>
                        <td class="text-center"><?PHP echo $engineer['engineer_name']; ?></td>
                        <td class="text-center"><?PHP echo $engineer['engineer_email_id']; ?></td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a data-delete="<?PHP echo $engineer['id']; ?>" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger engineer_delete">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </td>
            </tr>
            <?PHP endforeach;endif; ?>
        </tbody>
    </table>
</div>