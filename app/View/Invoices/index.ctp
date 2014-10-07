<script>
    var path_url='<?PHP echo Router::url('/',true); ?>';
</script>
                    <h1>
                        <i class="gi gi-user"></i>Invoice
                    </h1>
                    </div>
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                          <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
                        <li><?php echo $this->Html->link('Invoice',array('controller'=>'Invoices','action'=>'index')); ?></li>
                        
                    </ul>
                    <!-- END Forms General Header -->
            <div class="row">
                        <div class="col-md-12">
                            <!-- Basic Form Elements Block -->
                            <?php echo $this->element('message');?>
                            <div class="block">
                                <!-- Basic Form Elements Title -->
                                <!-- END Form Elements Title -->
                                <!-- Basic Form Elements Content -->
                                <div class="panel panel-default">
                                    <?php // echo $this->Form->create('Invoice',array('class'=>'form-horizontal form-bordered','id'=>'form-invoice-add')); ?>
                                    <?php //echo $this->Form->input('Deliveryorder.customer_id', array('type'=>'hidden','value'=>'')); ?>
                                    <?php // echo $this->Form->input('Deliveryorder.salesorder_id', array('type'=>'hidden','value'=>'')); ?>
                                    <div class="panel-body panel-body-nopadding">
                                        <!-- BASIC WIZARD -->
                                        <div id="basicWizard" class="basic-wizard">
                                            <ul class="nav nav-pills nav-justified " data-toggle="tabs" id="tabs">
                                                <li class="active invoice_active"><a href="#tab1" data-toggle="tab">Invoice</a></li>
                                                <li class=""><a href="#tab2" data-toggle="tab"> Prepare PO Full Invoice</a></li>
                                                <li class=""><a href="#tab3" data-toggle="tab"> Prepare QO Full Invoice</a></li>
                                                <li class=""><a href="#tab4" data-toggle="tab"> Prepare SO Full Invoice</a></li>
                                                <li class=""><a href="#tab5" data-toggle="tab"> Prepare DO Full Invoice</a></li>
                                            </ul>
                                            <div class="nav-pills-border-color"></div>
                                            <br><br>
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="tab1">
                                                    <?PHP echo $this->element('Invoices/invoice'); ?>
                                                </div>
                                                <div class="tab-pane" id="tab2">
                                                    <?PHP echo $this->element('Invoices/pofull'); ?>
                                                </div>
                                                 <div class="tab-pane" id="tab3">
                                                    <?PHP echo $this->element('Invoices/qofull'); ?>
                                                </div>
                                                <div class="tab-pane" id="tab4">
                                                    <?PHP echo $this->element('Invoices/sofull'); ?>
                                                </div>
                                                <div class="tab-pane" id="tab5">
                                                    <?PHP echo $this->element('Invoices/dofull'); ?>
                                                </div>
                                            </div><!-- tab-content -->
                                            <!-- #basicWizard -->
                                        </div><!-- panel-body -->
                                        <?PHP //echo $this->Html->link(__('PDF'), array('action' => 'invoice', 'ext' => 'pdf')); ?>
                                    </div>
                                    <!-- panel -->
                                    <?php echo $this->Form->end(); ?>
                                </div>
                                <!-- END Basic Form Elements Content -->
                            </div>
                            <!-- END Basic Form Elements Block -->
                        </div>
           
              
                        
                        
