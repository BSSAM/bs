<script>
    var upload_url    =   '<?PHP echo Router::url('/Quotations/file_upload/'.$quotationno,true); ?>';
    var delete_url  =  '<?PHP echo Router::url('/Quotations/delete_document/'.$quotationno,true); ?>';
</script>
<div class="block full upload_file_section">
    <!-- Dropzone Title -->
    <div class="block-title">
        <h2><strong>Drag Files and Upload</strong></h2>
    </div>
    <?php echo $this->Form->create('Document', array('url'=>'file_upload','class' => 'dropzone', 'id' => 'form-customer-add','enctype'=>'multipart/form-data')); ?>
    <?php echo $this->Form->input('quotationno', array('type'=>'hidden','name'=>'quotation_no','value'=>$quotationno)); ?>
    <div class="fallback">
            <input name="file" type="file" multiple />
        </div>
    <?php echo $this->Form->end(); ?>
    </div>
    