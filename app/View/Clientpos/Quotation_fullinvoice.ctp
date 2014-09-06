<script> var path_url='<?PHP echo Router::url('/',true); ?>';</script>
<h1> <i class="gi gi-user"></i><?PHP echo $this->ClientPO->get_customer_name($this->request->pass[0]); ?> </h1>
                        </div>
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                        <li><?php echo $this->Html->link('Home', array('controller' => 'Dashboards', 'action' => 'index')); ?></li>
                        <li><?php echo $this->Html->link('Client Po List', array('controller' => 'Clientpos', 'action' => 'index')); ?></li>
                        <li>Quotation Full Invoice</li>
                    </ul>
                    <!-- END Forms General Header -->
            <div class="row">
                        <div class="col-md-12">
                            <!-- Basic Form Elements Block -->
                            <div class="block">
                                <!-- Basic Form Elements Title -->
                                <div class="block-title clearfix">
                                    <h2 class="pull-right">Track Id : <?PHP echo $track_id; ?> </h2>
                                    <h2 class="pull-left"></h2>
                                </div>
                                <!-- END Form Elements Title -->
                                <!-- Basic Form Elements Content -->
                                 <?php echo $this->Form->create('Clientpo',array('class'=>'form-horizontal form-bordered','id'=>'form-clientpo-add')); ?>
                                 <?PHP echo $this->Form->input('quotation_id', array('type' => 'hidden', 'id' => 'customer_quotation_no','name'=>'quotation_no')); ?>
                                 <?PHP echo $this->Form->input('track_id', array('type' => 'hidden', 'id' => 'track_id','name'=>'track_id','value'=>$track_id)); ?>
                            <!-- END Basic Form Elements Block -->
                            <div class="">
                                <div class="col-md-6 fc-header-title float_none">
                                    <!-- Block with Options -->
                                    <div class="block col-md-12">
                                        <!-- Block with Options Title -->
                                        <div class="block-title">
                                            <h2><strong>Quotation order Details	</strong></h2>
                                        </div>
                                        <!-- END Block with Options Title -->
                                        <!-- Block with Options Content -->
                                        <div class="form-group col-md-8">
                                            <?php echo $this->Form->input('quotation_id', array('id' => 'val_quotation', 'class' => 'select-chosen required', 'empty' => 'Please select the Quotation No', 'options' => $customer_quotation_list,
                                                'data-placeholder' => 'Enter the Quotation No', 'label' => false, 'name' => 'quotation_id', 'style' => 'width: 250px; display: none;'));
                                            ?>
                                            <div id="po_result"></div>
                                        </div>
                                        <div class="form-group col-md-3 row">
                                                <?php echo $this->Form->input('quo_quantity', array('id' => 'val_quotationcount', 'class' => 'form-control', 'label' => false, 'name' => 'quo_quantity', 'readonly' => 'readonly', 'placeholder' => 'QO Count')); ?>
                                        </div>

                                        <!-- END Block with Options Content -->
                                    </div>
                                    <!-- END Block with Options -->
                                </div>
                                <div class="col-md-5 fc-header-title float_none">
                                    <!-- Block with Options Left -->
                                    <div class="block col-md-12">
                                        <!-- Block with Options Left Title -->
                                        <div class="block-title clearfix">
                                            <h2 class="pull-left"><strong>Purchase order  Details</strong></h2>
                                        </div>
                                        <!-- END Block with Options Left Title -->
                                        <!-- Block with Options Left Content -->
                                        <div class="qo_based_purchaseorder"><p>Select Quotations to get purchase order details.</p></div><div class="po_add_qopo"></div>
                                        <div class="po_up"></div>
                                        <!-- END Block with Options Left Content -->
                                    </div>
                                    <!-- END Block with Options Left -->
                                </div>
                                <div class="col-md-6 fc-header-title float_none">
                                    <!-- Block with Options -->
                                    <div class="block col-md-12">
                                        <!-- Block with Options Title -->
                                        <div class="block-title">
                                            <h2><strong>Sales order Details</strong> </h2>
                                        </div>
                                        <!-- END Block with Options Title -->
                                        <!-- Block with Options Content -->
                                        <div class="qo_based_salesorder">
                                            <p>Select Quotation to get Salesorder Details.. </p>
                                        </div>
                                        <!-- END Block with Options Content -->
                                    </div>
                                    <!-- END Block with Options -->
                                </div>
                                <div class="col-md-5 fc-header-title float_none">
                                    <!-- Block with Options Left -->
                                    <div class="block col-md-12">
                                        <!-- Block with Options Left Title -->
                                        <div class="block-title clearfix">
                                            <h2 class="pull-left"><strong>Delivery order Details</strong> </h2>
                                        </div>
                                        <div class="qo_based_deliveryorder">
                                            <p>Select Quotation to get Delivery order Details.</p>
                                        </div>
                                        <!-- END Block with Options Left Content -->
                                    </div>
                                    <!-- END Block with Options Left -->
                                </div>
                                <div class="col-md-6 fc-header-title float_none">
                                    <!-- Block with Options -->
                                    <div class="block col-md-12">
                                        <!-- Block with Options Title -->
                                        <div class="block-title">
                                            <h2><strong>Invoice	</strong> </h2>
                                        </div>
                                        <!-- END Block with Options Title -->
                                        <!-- Block with Options Content -->
                                        <div class="qo_based_invoice">
                                            <p>Select Quotation to get Invoice Details </p>
                                        </div>
                                        <!-- END Block with Options Content -->
                                    </div>
                                    <!-- END Block with Options -->
                                </div>
                                <div class="form-group form-actions">
                                    <div class="col-md-9 col-md-offset-3">
                                        <?php echo $this->Form->button('<i class="fa fa-angle-right"></i> Update', array('type' => 'submit', 'class' => 'btn btn-sm btn-primary', 'escape' => false)); ?>
                                        <?php echo $this->Html->link('<i class="fa fa-angle-left"></i> Cancel', array('controller' => 'Clientpos', 'action' => 'index'), array('type' => 'reset', 'class' => 'btn btn-sm btn-warning', 'escape' => false)); ?>
                                    </div>
                                </div>
                                 <?php echo $this->Form->end(); ?>
                                </div>
                            </div>
    
    <?php echo $this->Html->script('pages/formsValidation'); ?>
        <script>$(function(){ FormsValidation.init(); });</script>
               