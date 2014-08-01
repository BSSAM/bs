<script>
    var path_url    =   '<?PHP echo Router::url('/fileuploads/file_upload',true); ?>';
    $(document).ready(function(){
       $('#file_upload_quotation_id').change(function(){
           $('#file_upload_quotation_no').val($('#file_upload_quotation_id option:selected').text());
       }); 
    });
</script>
<div class="block full">
    <!-- Dropzone Title -->
    <div class="block-title">
        <h2><strong>Drag Files and Upload</strong></h2>
    </div>
    <?php echo $this->Form->create('Document', array('url'=>'file_upload','class' => 'dropzone', 'id' => 'form-customer-add','enctype'=>'multipart/form-data')); ?>
    <?php echo $this->Form->input('quotationno', array('type'=>'hidden','name'=>'quotation_no','value'=>$customer_quotation['Quotation']['quotationno'])); ?>
    <?php echo $this->Form->input('quotation_id', array('type'=>'hidden','name'=>'quotation_id','value'=>$customer_quotation['Quotation']['id'])); ?>
    <?php echo $this->Form->input('customer_id', array('type'=>'hidden','name'=>'customer_id','value'=>$customer_quotation['Quotation']['customer_id'])); ?>
    
        <div class="fallback">
            <input name="file" type="file" multiple />
        </div>
    <?php echo $this->Form->end(); ?>
    </div>
    
    