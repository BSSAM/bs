<input type="hidden" name="device_length" value=<?PHP echo count($quotation_details['Device']); ?> id="device_length">
<?PHP $symbol = 0;
if (!empty($quotation_details['Clientpo'])): ?>
    <?PHP foreach ($quotation_details['Clientpo'] as $po): ?>
        <?PHP
        $symbol = $symbol + 1;
        if ($symbol == 1) {
            $id = 'add_po';
            $get_state = 'fa-plus';
        } else {
            $id = 'delete_po';
            $get_state = 'fa-minus';
        }
        ?>
        <div class="group_po_<?PHP echo $po['id'] ?>">
            <div class="form-group">
                <div class="col-sm-10">
                    <div class="input-group">
                        <?php echo $this->Form->input('clientpos_no[]', array('id' => 'val_ponumber_'.$po['id'], 'class' => 'form-control', 'label' => false, 'name' => 'clientpos_no[]', 'type' => 'text', 'value' => $po['clientpos_no'])); ?>
                        <span class="input-group-btn">
                            <button class="btn btn-primary generate_po" id="val_ponumber_<?PHP echo $po['id'] ?>" type="button">Generate Po</button>
                        </span>
                    </div>
                </div>
                <div class="col-sm-3">
                        <?php echo $this->Form->input('po_quantity', array('id' => 'val_pocount', 'class' => 'form-control', 'label' => false, 'name' => 'po_quantity[]', 'value' => $po['po_quantity'])); ?>
                </div>
                
                </div>
                <div class="col-md-1">
                    <div class="btn-group btn-group-sm">
                        <div class="btn btn-alt btn-info" id='<?PHP echo $id; ?>'  data-delete ="<?PHP echo $po['id'] ?>"  >
                            <i class="fa <?PHP echo $get_state; ?>"></i>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    <?PHP endforeach; ?>
<?PHP else: ?>
    <div class="group_po_">
        <div class="form-group">
            <div class="col-md-10">
                <div class="input-group">
    <?php echo $this->Form->input('clientpos_no[]', array('id' => 'manual_po', 'class' => 'form-control', 'label' => false, 'name' => 'clientpos_no[]', 'type' => 'text')); ?>
                    <span class="input-group-btn">
                        <button class="btn btn-primary generate_po" id="manual_po" type="button">Generate Po</button>
                    </span>
                </div>
            </div>
            <div class="col-sm-3">
            <?php echo $this->Form->input('po_quantity', array('id' => 'val_pocount', 'class' => 'form-control', 'label' => false, 'name' => 'po_quantity[]')); ?>
            </div>
            <div class="col-md-1">
                <div class="btn-group btn-group-sm">
                    <div class="btn btn-alt btn-info" id='add_po'>
                        <i class="fa fa-plus"></i>
                    </div>
                </div> 
            </div>
        </div>
    </div>
<?PHP endif; ?>
<div class="po_up"></div>