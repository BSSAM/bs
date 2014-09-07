<script>
    var path_url='<?PHP echo Router::url('/',true); ?>';
</script>
<script type="text/javascript">
    $(function(){
        $("#onsite_list").hide();
        $("#onsite_input_search").keyup(function() 
        { 
            var quotation_id = $(this).val();
            var dataString = 'id='+ quotation_id;
            if(quotation_id!='')
            {
                $.ajax({
                    type: "POST",
                    url: "<?PHP echo Router::url('/',true); ?>/Onsites/quotation_search",
                    data: dataString,
                    cache: false,
                    success: function(html)
                    {
                        $("#onsite_list").html(html).show();
                    }
                });
            }return false;    
        });});
</script>     

                    <h1>
                        <i class="gi gi-user"></i>Add Onsite Schedule
                    </h1>
                    </div>
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                        <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
                        <li><?php echo $this->Html->link('Onsite Schedule',array('controller'=>'Onsites','action'=>'index')); ?></li>
                        <li>Add Onsite Schedule</li>
                    </ul>
                    <!-- END Forms General Header -->

            <div class="row">
                        <div class="col-md-12">
                            <!-- Basic Form Elements Block -->
                            <div class="block">
                                <!-- Basic Form Elements Title -->
                                <div class="block-title">
                                    <h2>
                                        <div class="col-md-4 search_move">
                                            <div class="input-group">
                                                <div>
                                                    <input type="text" class="form-control" autoComplete='off' placeholder="Enter Quotation No" id="onsite_input_search"/>
                                                </div>
                                                <span class="input-group-btn">
                                                    <button class="btn btn-primary onsite_search" type="button">Proceed</button>
                                                </span>
                                            </div>
                                            <div id="onsite_list">
                                            </div>
                                        </div>
                                    </h2>
                                </div>
                                <!-- END Form Elements Title -->
                                <!-- Basic Form Elements Content -->
                                <div class="panel panel-default">
                                    <?php echo $this->Form->create('Onsite',array('class'=>'form-horizontal form-bordered','id'=>'form-onsite-add')); ?>
                                    <?php echo $this->Form->input('Onsite.onsiteschedule_no', array('type'=>'hidden','value'=>$onsite_no,'id'=>'onsiteschedule_no')); ?>
                                    <?php echo $this->Form->input('Onsite.quotation_id', array('type'=>'hidden','id'=>'quotation_id')); ?>
                                    <?php echo $this->Form->input('Onsite.quotationno', array('type'=>'hidden','id'=>'quotationno')); ?>
                                    <?php echo $this->Form->input('Onsite.customer_id', array('type'=>'hidden','id'=>'customer_id')); ?>
                                   
                                    <div class="panel-body panel-body-nopadding">
                                        <!-- BASIC WIZARD -->
                                        <div id="basicWizard" class="basic-wizard">
                                            <ul class="nav nav-pills nav-justified " data-toggle="tabs" id="tabs">
                                                <li class="active"><a href="#tab1" data-toggle="tab"><span>Step 1:</span> Create Schedule</a></li>
                                                <li class=""><a href="#tab2" data-toggle="tab"><span>Step 2:</span> Instrument</a></li>
                                                <li class=""><a href="#tab3" data-toggle="tab"><span>Step 3:</span> Engineer</a></li>
                                                <li class=""><a href="#tab4" data-toggle="tab"><span>Step 4:</span> File Upload</a></li>
                                            </ul>
                                            <div class="nav-pills-border-color"></div>
                                            <br><br>
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="tab1">
                                                    <?PHP echo $this->element('Onsites/createschedule'); ?>
                                                </div>
                                                <div class="tab-pane" id="tab2">
                                                    <?PHP echo $this->element('Onsites/instrument'); ?>
                                                </div>
                                                 <div class="tab-pane" id="tab3">
                                                    <?PHP echo $this->element('Onsites/engineer'); ?>
                                                     <div class="form-group form-actions">
                                                         <div class="col-md-9 col-md-offset-10">
                                                             <?php echo $this->Form->button('<i class="fa fa-angle-right"></i> Submit', array('type' => 'submit', 'class' => 'btn btn-sm btn-primary onsite_submit', 'escape' => false)); ?>
                                                             <?php echo $this->Form->button('<i class="fa fa-repeat"></i> Reset', array('type' => 'reset', 'class' => 'btn btn-sm btn-warning', 'escape' => false)); ?>
                                                         </div>
                                                     </div>
                                                </div>
                                               <?php echo $this->Form->end(); ?>
                                                <div class="tab-pane" id="tab4">
                                                    <?PHP echo $this->element('Onsites/file_upload'); ?>
                                                </div>
                                            </div><!-- tab-content -->
                                            <!-- #basicWizard -->
                                        </div><!-- panel-body -->
                                        
                                    </div>
                                    <!-- panel -->
                                   
                                </div>
                                <!-- END Basic Form Elements Content -->
                            </div>
                            <!-- END Basic Form Elements Block -->
                        </div>
                <?php echo $this->Html->script('pages/formsValidation'); ?>
                <script>$(function(){ FormsValidation.init(); });</script>
                <?php echo $this->Html->script('pages/uiProgress'); ?>
                <script>$(function(){ UiProgress.init(); });</script>
                        
                        
