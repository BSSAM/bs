<script>
    var path_url = '<?PHP echo Router::url('/', true); ?>'
</script>
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
                                    <h2 class="pull-left"><small><code>Note</code> Type manually for Purchase order edit For Example :CPO123</small>  </h2>
                                    <h2 class="pull-right">Track Id : <?PHP //echo $po_first['Clientpo']['track_id']; ?> </h2>
                                </div>
                                <!-- END Form Elements Title -->
                                <!-- Basic Form Elements Content -->
                                 <?php echo $this->Form->create('Clientpo',array('class'=>'form-horizontal form-bordered','id'=>'form-clientpo-add')); ?>
                                 <?PHP echo $this->Form->input('quotation_id', array('type' => 'hidden', 'id' => 'customer_quotation_no','name'=>'quotation_no')); ?>
                                 <?PHP echo $this->Form->input('track_id', array('type' => 'hidden', 'id' => 'track_id','name'=>'track_id')); ?>
                                  <?PHP echo $this->Form->input('customer_for_quotation_id', array('type' => 'hidden', 'id' => 'customer_for_quotation_id','name'=>'customer_for_quotation_id','value'=>$customer_id)); ?>
                                 
                                <div class="table-responsive">
                                <table class="table table-vcenter table-condensed table-bordered">
                                    <thead>
                                        <tr>
                                            <!--<th class="text-center"><i class="gi gi-user"></i></th>-->
                                            <th class="text-center col-md-3">Purchase order Details</th>
                                            <th class="text-center col-md-3">Quotation Details</th>
                                            <th class="text-center col-md-3">Sales order Details</th>
                                            <th class="text-center col-md-3">Delivery order Details</th>
                                            <th class="text-center col-md-3">Invoice Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="text-center">
                                            <div class="form-group col-md-7">
                                                    <?php echo $this->Form->input('clientpo_no', array('id' => 'purchase_order', 'class' => 'form-control', 'placeholder' => 'Purchase Order No', 'label' => false, 'name' => 'clientpo_no', 'autoComplete' => 'off')); ?>
                                                    <div id="po_result"></div>
                                            </div>
                                            <div class="form-group col-md-5">
                                                <?php echo $this->Form->input('po_quantity', array('id' => 'val_pocount', 'class' => 'form-control', 'placeholder' => 'Count', 'label' => false, 'name' => 'po_quantity')); ?>
                                                <span class="input-group-btn">
                                                    <button class="btn btn-primary generate_po" id="purchase_order" type="button">Generate Po</button>
                                                </span>
                                            </div>
                                        </td>
                                        
                                        <td class="text-center">
                                            <?PHP if(!empty($customer_quotation_list)): ?>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                     <?php echo $this->Form->input('quotation_id[]', array('id' => 'val_quotation_po', 'class' => 'select-chosen required','empty'=>'Please select the Quotation No', 'options' => $customer_quotation_list, 
                                                         'label' => false, 'name' => 'quot_id[]', 'style' => 'width: 250px; display: none;')); ?>
                                                </div>
                                            </div>
                                            <?PHP else: ?>
                                            <?PHP echo "No more quotations to select"; ?>
                                            <?PHP endif; ?>
                                            <div class="po_based_clientpo">
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group">
                                                <div class="col-sm-11">
                                                        <?php echo $this->Form->input('salesorder_id', array('id'=>'val_salesorderno','class'=>'form-control','placeholder'=>'Sales Order No','label'=>false,'name'=>'salesorder_id','readonly'=>'readonly','type'=>'text','value'=>'')); ?>
                                                </div>
                                                <div class="col-sm-6">
                                                       <?php echo $this->Form->input('sales_quantity', array('id'=>'val_salesordercount','class'=>'form-control','label'=>false,'name'=>'sales_quantity','readonly'=>'readonly','value'=>'','placeholder'=>'So Count')); ?>
                                                </div>
                                            </div>
                                        </td>
                                        
                                        <td class="text-center">
                                            <div class="form-group">
                                                    <div class="col-sm-11">
                                                        <?php echo $this->Form->input('deliveryorder_id', array('id' => 'val_deliveryorderno', 'class' => 'form-control', 'placeholder' => 'Delivery Order No', 'label' => false, 'name' => 'deliveryorder_id', 'readonly' => 'readonly', 'type' => 'text', 'value' => '')); ?>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <?php echo $this->Form->input('deliver_quantity', array('id' => 'val_deliveryordercount', 'class' => 'form-control', 'label' => false, 'name' => 'deliver_quantity', 'readonly' => 'readonly', 'value' => '','placeholder' => 'DO Count')); ?>
                                                    </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <?php echo $this->Form->input('invoiceno', array('id' => 'val_invoiceno', 'class' => 'form-control', 'placeholder' => 'Invoice No', 'label' => false, 'name' => 'invoiceno', 'readonly' => 'readonly', 'value' => '')); ?>
                                                    </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                                    <div class="form-group form-actions">
                                        <div class="col-md-9 col-md-offset-3">
                                                <?php  echo $this->Form->button('<i class="fa fa-angle-right"></i> Update',array('type'=>'submit','class'=>'btn btn-sm btn-primary','escape' => false)); ?>
                                                <?php echo $this->Html->link('<i class="fa fa-angle-left"></i> Cancel',array('controller'=>'Clientpos','action'=>'index'), array('type'=>'reset','class'=>'btn btn-sm btn-warning','escape' => false)); ?>
                                        </div>
                                    </div>
                                <?php echo $this->Form->end(); ?>
                                <!-- END Basic Form Elements Content -->
                            </div>
                            <!-- END Basic Form Elements Block -->
                            <div class="row">
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
                                  <div class="form-group col-md-8">
                                                    <?php echo $this->Form->input('clientpo_no', array('id' => 'purchase_order', 'class' => 'form-control', 'placeholder' => 'Purchase Order No', 'label' => false, 'name' => 'clientpo_no', 'autoComplete' => 'off')); ?>
                                                    <div id="po_result"></div>
                                            </div>
                                            <div class="form-group col-md-3 row">
                                                <?php echo $this->Form->input('po_quantity', array('id' => 'val_pocount', 'class' => 'form-control', 'placeholder' => 'Count', 'label' => false, 'name' => 'po_quantity')); ?>
                                                
                                            </div>
                                
                                  <div class="form-group col-md-8">
                                                    <?php echo $this->Form->input('clientpo_no', array('id' => 'purchase_order', 'class' => 'form-control', 'placeholder' => 'Purchase Order No', 'label' => false, 'name' => 'clientpo_no', 'autoComplete' => 'off')); ?>
                                                    <div id="po_result"></div>
                                            </div>
                                            <div class="form-group col-md-3 row">
                                                <?php echo $this->Form->input('po_quantity', array('id' => 'val_pocount', 'class' => 'form-control', 'placeholder' => 'Count', 'label' => false, 'name' => 'po_quantity')); ?>
                                                
                                            </div>
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
                                    
                                    <h2 class="pull-left"><strong>Quotation Details</strong>	</h2>
                                </div>
                                <!-- END Block with Options Left Title -->

                                <!-- Block with Options Left Content -->
                                  <?PHP if(!empty($customer_quotation_list)): ?>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                     <?php echo $this->Form->input('quotation_id[]', array('id' => 'val_quotation_po', 'class' => 'select-chosen required','empty'=>'Please select the Quotation No', 'options' => $customer_quotation_list, 
                                                         'label' => false, 'name' => 'quot_id[]', 'style' => 'width: 250px; display: none;')); ?>
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
                                    
                                    <h2><strong>Sales order Details	</strong> </h2>
                                </div>
                                <!-- END Block with Options Title -->

                                <!-- Block with Options Content -->
                              <div class="form-group col-md-8">
                                                
                                                        <?php echo $this->Form->input('salesorder_id', array('id'=>'val_salesorderno','class'=>'form-control','placeholder'=>'Sales Order No','label'=>false,'name'=>'salesorder_id','readonly'=>'readonly','type'=>'text','value'=>'')); ?>
                                                </div>
                                                <div class="form-group col-md-3 row">
                                                       <?php echo $this->Form->input('sales_quantity', array('id'=>'val_salesordercount','class'=>'form-control','label'=>false,'name'=>'sales_quantity','readonly'=>'readonly','value'=>'','placeholder'=>'So Count')); ?>
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
                                <!-- END Block with Options Left Title -->

                                <!-- Block with Options Left Content -->
                               
                                                    <div class="form-group col-md-8">
                                                        <?php echo $this->Form->input('deliveryorder_id', array('id' => 'val_deliveryorderno', 'class' => 'form-control', 'placeholder' => 'Delivery Order No', 'label' => false, 'name' => 'deliveryorder_id', 'readonly' => 'readonly', 'type' => 'text', 'value' => '')); ?>
                                                    </div>
                                                   <div class="form-group col-md-4 row">
                                                        <?php echo $this->Form->input('deliver_quantity', array('id' => 'val_deliveryordercount', 'class' => 'form-control', 'label' => false, 'name' => 'deliver_quantity', 'readonly' => 'readonly', 'value' => '','placeholder' => 'DO Count')); ?>
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
                             
                                <!-- END Block with Options Content -->
                            </div>
                            <!-- END Block with Options -->
                        </div>
                    </div>
                            
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
                                    };  }();
                                </script> 
                            <?php } ?>