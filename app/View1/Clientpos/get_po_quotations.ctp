<?PHP if(!empty($quotations)): ?>
<?PHP echo $this->Form->input('pocount',array('type'=>'hidden','class'=>'pocount','value'=>$quotations[0]['Clientpo']['po_quantity'])); ?>
<?PHP foreach($quotations as $quotation): ?>
<div class="group_qo_<?PHP echo $quotation['Clientpo']['quotation_no']; ?>">
    <div class="form-group">
        <div class="col-sm-11">
            <input type="hidden" value="<?PHP echo $quotation['Clientpo']['quotation_id']; ?>" name="quotation_id[]">
            <input type="hidden" value="<?PHP echo $quotation['Clientpo']['quotation_no']; ?>" name="quotation_no[]">
           
           
            <div class="col-sm-6  form-control-static">
                <?PHP echo $quotation['Clientpo']['quotation_no']; ?>
               </div>
            <div class="col-sm-4">
                <input type="text" name="quo_quantity[]" class="form-control" value="<?PHP echo $quotation['Clientpo']['quo_quantity']; ?>">
            </div>
            <div class="col-md-1"> 
                <div class="btn-group btn-group-sm"> 
                    <div data-delete="<?PHP echo $quotation['Clientpo']['quotation_no']; ?>" class="btn btn-alt btn-info qo_id_selected">
                        <i class="fa fa-minus"></i>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>
<?PHP endforeach; ?>
<?PHP endif; ?>