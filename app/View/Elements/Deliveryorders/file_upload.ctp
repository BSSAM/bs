<script>
    var upload_url    =   '<?PHP echo Router::url('/Deliveryorders/file_upload/'.$deliveryorderno,true); ?>';
    var delete_url  =  '<?PHP echo Router::url('/Deliveryorders/delete_document/'.$deliveryorderno,true); ?>';
</script>
<div class="block full upload_file_section">
    <!-- Dropzone Title -->
    <div class="block-title">
        <h2><strong>Upload your Files for <?PHP echo $deliveryorderno; ?></strong></h2>
    </div>
    <?php echo $this->Form->create('Document', array('url'=>'file_upload','class' => 'dropzone', 'id' => 'form-customer-add','enctype'=>'multipart/form-data')); ?>
    <?php echo $this->Form->input('salesorderno', array('type'=>'hidden','name'=>'deliveryorder_no','value'=>$deliveryorderno)); ?>
    <div class="fallback">
            <input name="file" type="file" multiple />
        </div>
    <?php echo $this->Form->end(); ?>
    </div>
    