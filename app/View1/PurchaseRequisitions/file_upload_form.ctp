<script> var path_url    =   '<?PHP echo Router::url('/fileuploads/file_upload',true); ?>';
   
</script>
 
<div class="block full">
    <!-- Dropzone Title -->
    <div class="block-title">
        <h2><strong>Drag Files and Upload</strong></h2>
    </div>
    <?php echo $this->Form->create('Document', array('url'=>'file_upload','class' => 'dropzone', 'id' => 'form-customer-add','enctype'=>'multipart/form-data')); ?>
        <div class="fallback">
            <input name="file" type="file" multiple />
        </div>
    <?php echo $this->Form->end(); ?>
    </div>
    