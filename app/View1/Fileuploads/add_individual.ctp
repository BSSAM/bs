
<h1>
    <i class="gi gi-user"></i><?PHP //echo $customer_quotation['Quotation']['customername']; ?>
</h1>
</div>
</div>

<!-- END Forms General Header -->
<div class="row">
    <div class="col-md-12">
        <!-- Basic Form Elements Block -->
        <div class="block">
            <!-- Basic Form Elements Title -->
            <div class="block-title">
                <h2>Upload your files for <?PHP echo $this->request['pass'][0]; ?></h2>
            </div>
            <!-- END Form Elements Title -->
            <!-- Basic Form Elements Content -->
            <div class="panel panel-default">
                <div class="panel-body panel-body-nopadding">
                    <!-- BASIC WIZARD -->
                    <div id="basicWizard" class="basic-wizard">
                        <ul class="nav nav-pills nav-justified " data-toggle="tabs" id="tabs">
                            <li class="active"><a href="#tab1" data-toggle="tab"> Individual File Upload</a></li>
                       </ul>
                        <div class="nav-pills-border-color"></div>
                        <br><br>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab1">
                               <script>
                                    var path_url    =   '<?PHP echo Router::url('/Fileuploads/upload_individual/'.$this->request['pass'][0],true); ?>';
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
                                    <?php echo $this->Form->create('Document', array('url'=>'upload_individual','class' => 'dropzone', 'id' => 'form-customer-add','enctype'=>'multipart/form-data')); ?>
                                    <?php echo $this->Form->input('quotationno', array('type'=>'hidden','name'=>'quotation_no','value'=>$this->request['pass'][0])); ?>
                                        <div class="fallback">
                                            <input name="file" type="file" multiple />
                                        </div>
                                    <?php echo $this->Form->end(); ?>
                                </div>
                            </div>
                    </div><!-- panel-body -->
                   
                </div>
                <!-- panel -->
            </div>
            
            <!-- END Basic Form Elements Block -->
        </div>
    </div>
   
    <!-- END Basic Form Elements Content -->
</div>

  


    <?php echo $this->Html->script('pages/formsValidation'); ?>
    <script>$(function(){ FormsValidation.init(); });</script>
    <?php echo $this->Html->script('pages/uiProgress'); ?>
    <script>$(function(){ UiProgress.init(); });</script>
    <?php if ($this->Session->flash() != '') { ?>
        <script> var UiProgress = function() {
            // Get random number function from a given range
            var getRandomInt = function(min, max) {
                return Math.floor(Math.random() * (max - min + 1)) + min;
            };
        }();
        </script> 
    <?php } ?>

