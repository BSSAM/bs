<script> var upload_url    =   '<?PHP echo Router::url('/Onsites/file_upload/'.$onsite_no,true); ?>';var delete_url  =  '<?PHP echo Router::url('/Onsites/delete_document/'.$onsite_no,true); ?>';</script>
<div class="block full upload_file_section">
    <!-- Dropzone Title -->
    <div class="block-title">
        <h2><strong>Drag Files and Upload</strong></h2>
    </div>
    <?php echo $this->Form->create('Document', array('url' => 'file_upload', 'class' => 'dropzone', 'id' => 'form-customer-add', 'enctype' => 'multipart/form-data')); ?>
    <?php echo $this->Form->input('onsiteschedule_no', array('type' => 'hidden', 'name' => 'onsiteschedule_no', 'value' => $onsite_no)); ?>
    <div class="fallback">
        <input name="file" type="file" multiple />
    </div>
    <?php echo $this->Form->end(); ?>
</div>
    