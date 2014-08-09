<script>var path_url = '<?PHP echo Router::url('/', true); ?>';</script>
<h1>
    <i class="gi gi-user"></i>
    Purchase Order Form  -  Purchase Order  Full Invoice
</h1>
                        </div>
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                        <li><?php echo $this->Html->link('Home', array('controller' => 'Dashboards', 'action' => 'index')); ?></li>
                        <li><?php echo $this->Html->link('Client Po List', array('controller' => 'Clientpos', 'action' => 'index')); ?></li>
                        <li>Purchase Order Full Invoice</li>
                    </ul>
                    <!-- END Forms General Header -->
                <div class="row">
                        <div class="col-md-12">
                            <!-- Basic Form Elements Block -->
                            <div class="block">
                                <!-- Basic Form Elements Title -->
                                <div class="block-title clearfix">
                                    <h2 class="pull-right">Track Id : <?PHP //echo $po_first['Clientpo']['track_id']; ?> </h2>
                                    <h2 class="pull-left"><?PHP echo $this->ClientPO->get_customer_name($this->request->pass[0]); ?></h2>
                                </div>
                                <!-- END Form Elements Title -->
                                <!-- Basic Form Elements Content -->
                                 <?php echo $this->Form->create('Clientpo',array('class'=>'form-horizontal form-bordered','id'=>'form-clientpo-add')); ?>
                                 <?PHP echo $this->Form->input('quotation_id', array('type' => 'hidden', 'id' => 'customer_quotation_no','name'=>'quotation_no')); ?>
                                 <?PHP echo $this->Form->input('track_id', array('type' => 'hidden', 'id' => 'track_id','name'=>'track_id')); ?>
                                 <?PHP echo $this->Form->input('customer_for_quotation_id', array('type' => 'hidden', 'id' => 'customer_for_quotation_id','name'=>'customer_for_quotation_id','value'=>$customer_id)); ?>
                            <!-- END Basic Form Elements Block -->
                            <div class="">
                                
                        <div class="col-md-6 fc-header-title float_none">
                            <!-- Block with Options -->
                            <div class="block col-md-12">
                                <!-- Block with Options Title -->
                                <div class="block-title">
                                    <h2><strong>Purchase order Details	</strong></h2>
                                </div>
                                <!-- END Block with Options Title -->
                                <!-- Block with Options Content -->
                                <div class="form-group col-md-8">
                                    <?php echo $this->Form->input('clientpo_no', array('id' => 'purchase_order', 'class' => 'form-control', 'placeholder' => 'Purchase Order No', 'label' => false, 'name' => 'clientpo_no', 'autoComplete' => 'off')); ?>
                                    <div id="po_result"></div>
                                </div>
                                 <div class="form-group col-md-3 row">
                                    <?php echo $this->Form->input('po_quantity', array('id' => 'val_pocount', 'class' => 'form-control', 'placeholder' => 'Count', 'label' => false, 'name' => 'po_quantity')); ?>
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
                                    <h2 class="pull-left"><strong>Quotation Details</strong></h2>
                                </div>
                                <!-- END Block with Options Left Title -->
                                <!-- Block with Options Left Content -->
                                <?PHP if (!empty($customer_quotation_list)): ?>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <?php echo $this->Form->input('quotation_id[]', array('id' => 'val_quotation_po', 'class' => 'select-chosen required', 'empty' => 'Please select the Quotation No', 'options' => $quotation_array_id,
                                                'label' => false, 'name' => 'quot_id[]', 'style' => 'width: 250px; display: none;'));
                                            ?>
                                        </div>
                                    </div>
                                <?PHP else: ?>
                                    <?PHP echo "No more quotations to select"; ?>
                                <?PHP endif; ?>
                                <div class="po_based_clientpo">
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
                                    <h2><strong>Sales order Details</strong> </h2>
                                </div>
                                <!-- END Block with Options Title -->
                                <!-- Block with Options Content -->
                                <div class="salesorder_by_quotation">
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
                                    <h2 class="pull-left"><strong>Delivery order Details	</strong> </h2>
                                </div>
                                <div class="deliveryorder_by_quotation">
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
                                        <div class="invoice_by_quotation">
                                             <p>Select Quotation to get Invoice Details </p>
                                        </div>
                                        <!-- END Block with Options Content -->
                                    </div>
                                    <!-- END Block with Options -->
                                </div>
                                <div class="form-group form-actions">
                                    <div class="col-md-9 col-md-offset-3">
                                        <?php echo $this->Form->button('<i class="fa fa-angle-right"></i> Update', array('type' => 'submit', 'class' => 'btn btn-sm btn-primary pofull_invoice_submit', 'escape' => false)); ?>
                                        <?php echo $this->Html->link('<i class="fa fa-angle-left"></i> Cancel', array('controller' => 'Clientpos', 'action' => 'index'), array('type' => 'reset', 'class' => 'btn btn-sm btn-warning', 'escape' => false)); ?>
                                    </div>
                                </div>
                                 <?php echo $this->Form->end(); ?>
                    </div>
                        </div>
                            <?php echo $this->Html->script('pages/formsValidation'); ?>
                            <script>$(function(){ FormsValidation.init(); });</script>
                            