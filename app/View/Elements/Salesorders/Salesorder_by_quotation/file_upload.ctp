<script>
    var upload_url    =   '<?PHP echo Router::url('/Salesorders/file_upload/'.$salesorderno,true); ?>';
    var delete_url  =  '<?PHP echo Router::url('/Salesorders/delete_document/'.$salesorderno,true); ?>';
</script>
<div class="block full">
    <!-- Dropzone Title -->
    <div class="block-title">
        <h2><strong>Upload your Files for <?PHP echo $salesorderno; ?></strong></h2>
    </div>
    <?php echo $this->Form->create('Document', array('url'=>'file_upload','class' => 'dropzone', 'id' => 'form-customer-add','enctype'=>'multipart/form-data')); ?>
    <?php echo $this->Form->input('salesorderno', array('type'=>'hidden','name'=>'salesorder_no','value'=>$salesorderno)); ?>
    <div class="fallback">
            <input name="file" type="file" multiple />
        </div>
    <?php echo $this->Form->end(); ?>
    </div>
    