<script>
    var path_url='<?PHP echo Router::url('/',true); ?>'
    </script>
<h1>
    <i class="gi gi-user"></i>
    Client Purchase Order Form
</h1>
                        </div>
                    </div>
                    
                    <ul class="breadcrumb breadcrumb-top">
                          <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
                        <li><?php echo $this->Html->link('Client Purchase Order Form',array('controller'=>'Clientpos','action'=>'index')); ?></li>
                    </ul>
                    <!-- END Forms General Header -->
            <div class="row">
                        <div class="col-md-12">
                            <!-- Basic Form Elements Block -->
                            <div class="block">
                                <!-- Basic Form Elements Title -->
                                <div class="block-title clearfix">
                                    <h2 class="pull-right">Track Id : <?PHP //echo $po_first['Clientpo']['track_id']; ?> </h2>
                                </div>
                                <!-- END Form Elements Title -->

                                <!-- Basic Form Elements Content -->
                                 <?php echo $this->Form->create('Clientpo',array('class'=>'form-horizontal form-bordered','id'=>'form-clientpo-add')); ?>
                                 <?PHP echo $this->Form->input('quotation_id', array('type' => 'hidden', 'id' => 'customer_quotation_no','name'=>'quotation_no')); ?>
                                 <?PHP echo $this->Form->input('track_id', array('type' => 'hidden', 'id' => 'track_id','name'=>'track_id')); ?>
                                     
                                <div class="form-group">
                                    <div class="col-md-4">
                                            <?php //echo $this->Form->input('track_id', array('id'=>'val_track','class'=>'form-control','label'=>false,'name'=>'track_id','readonly'=>'readonly','type'=>'hidden','value'=>$po_first['Clientpo']['track_id'])); ?>
                                            <?php //echo $this->Form->input('customer_id', array('id'=>'val_track','class'=>'form-control','label'=>false,'name'=>'customer_id','readonly'=>'readonly','type'=>'hidden','value'=>$po_first['Clientpo']['customer_id'])); ?>
                                        <?php //echo $this->Form->input('quotation_id', array('id'=>'val_track','class'=>'form-control','label'=>false,'name'=>'quotation_id','readonly'=>'readonly','type'=>'hidden','value'=>$po_first['Clientpo']['quotation_id'])); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="val_quotation">Quotation No</label>
                                    <div class="col-sm-3">
                                        <?php echo $this->Form->input('quotation_id', array('id' => 'val_quotation', 'class' => 'select-chosen required','empty'=>'Please select the Quotation No', 'options' => $customer_quotation_list, 'data-placeholder' => 'Enter the Quotation No', 'label' => false, 'name' => 'quotation_id', 'style' => 'width: 250px; display: none;')); ?>
                                            
                                    </div>
                                    <label class="col-md-2 control-label" for="val_quotationcount">Quotation Count</label>
                                    <div class="col-sm-1">
                                           <?php echo $this->Form->input('quo_quantity', array('id'=>'val_quotationcount','class'=>'form-control','label'=>false,'name'=>'quo_quantity','readonly'=>'readonly','value'=>'')); ?>
                                    </div>
                                </div>
                                <?PHP $symbol   = 0   ?>
                                <?PHP if(!empty($po_list)): ?>
                               <?PHP foreach($po_list as $po): ?>
                               <?PHP $symbol=  $symbol+1; 
                                        if($symbol==1){$id = 'add_po' ; $get_state ='fa-plus';}else{$id = 'delete_po' ; $get_state ='fa-minus';}
                                 ?>
                                <div class="group_po_<?PHP echo $po['Clientpo']['id'] ?>">
                                    <div class="form-group">
                                       
                                            <label class="col-md-2 control-label" for="val_ponumber">Purchase Order No</label>
                                                <div class="col-sm-3">
                                                    <div class="input-group">
                                                        <?php echo $this->Form->input('clientpos_no[]', array('id' => 'val_ponumber_'.$po['Clientpo']['id'], 'class' => 'form-control',  'label' => false, 'name' => 'clientpos_no[]', 'type' => 'text','value'=>$po['Clientpo']['clientpos_no'])); ?>
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-primary generate_po" id="val_ponumber_<?PHP echo $po['Clientpo']['id'] ?>" type="button">Generate Po</button>
                                                        </span>
                                                    </div>
                                                </div>
                                            
                                            <label class="col-md-2 control-label" for="val_pocount">PO Instrument Count</label>
                                            <div class="col-sm-1">
                                                <?php echo $this->Form->input('po_quantity', array('id' => 'val_pocount', 'class' => 'form-control',  'label' => false, 'name' => 'po_quantity[]','value'=>$po['Clientpo']['po_quantity'])); ?>
                                            </div>
                                            <div class="col-md-1"><div class="btn-group btn-group-sm"><div class="btn btn-alt btn-info" id='<?PHP echo $id; ?>'  data-delete = "<?PHP echo $po['Clientpo']['id'] ?>"  ><i class="fa <?PHP echo  $get_state; ?>"></i></div></div> </div>
                                    </div>
                                </div>
                                <?PHP endforeach; ?>
                                <?PHP else: ?>
                                <div class="group_po_">
                                    <div class="form-group">
                                       
                                            <label class="col-md-2 control-label" for="val_ponumber">Purchase Order No</label>
                                                <div class="col-sm-3">
                                                    <div class="input-group">
                                                        <?php echo $this->Form->input('clientpos_no[]', array('id' => '', 'class' => 'form-control',  'label' => false, 'name' => 'clientpos_no[]', 'type' => 'text')); ?>
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-primary generate_po" id="" type="button">Generate Po</button>
                                                        </span>
                                                    </div>
                                                </div>
                                            
                                            <label class="col-md-2 control-label" for="val_pocount">PO Instrument Count</label>
                                            <div class="col-sm-1">
                                                <?php echo $this->Form->input('po_quantity', array('id' => 'val_pocount', 'class' => 'form-control',  'label' => false, 'name' => 'po_quantity[]')); ?>
                                            </div>
                                            <div class="col-md-1"><div class="btn-group btn-group-sm"><div class="btn btn-alt btn-info" id='add_po'><i class="fa fa-plus"></i></div></div> </div>
                                    </div>
                                </div>
                                <?PHP endif; ?>
                                    <div class="po_up">
                                    </div>
                                
                                    
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="val_salesorderno">SalesOrder No</label>
                                    <div class="col-sm-3">
                                            <?php echo $this->Form->input('salesorder_id', array('id'=>'val_salesorderno','class'=>'form-control','placeholder'=>'Enter the Sales Order No','label'=>false,'name'=>'salesorder_id','readonly'=>'readonly','type'=>'text','value'=>'')); ?>
                                    </div>
                                    <label class="col-md-2 control-label" for="val_salesordercount">SalesOrder Count</label>
                                    <div class="col-sm-1">
                                           <?php echo $this->Form->input('sales_quantity', array('id'=>'val_salesordercount','class'=>'form-control','label'=>false,'name'=>'sales_quantity','readonly'=>'readonly','value'=>'')); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="val_deliveryorderno">Delivery Order No</label>
                                    <div class="col-sm-3">
                                        <?php echo $this->Form->input('deliveryorder_id', array('id'=>'val_deliveryorderno','class'=>'form-control','placeholder'=>'Enter the Delivery Order No','label'=>false,'name'=>'deliveryorder_id','readonly'=>'readonly','type'=>'text','value'=>'')); ?>
                                    </div>
                                    <label class="col-md-2 control-label" for="val_deliveryordercount">Delivery Order Count</label>
                                    <div class="col-sm-1">
                                        <?php echo $this->Form->input('deliver_quantity', array('id'=>'val_deliveryordercount','class'=>'form-control','label'=>false,'name'=>'deliver_quantity','readonly'=>'readonly','value'=>'')); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="val_invoiceno">Invoice No</label>
                                    <div class="col-sm-3">
                                            <?php echo $this->Form->input('invoiceno', array('id'=>'val_invoiceno','class'=>'form-control','placeholder'=>'Enter the Invoice No','label'=>false,'name'=>'invoiceno','readonly'=>'readonly','value'=>'')); ?>
                                    </div>
                                </div>
                                <div class="form-group form-actions">
                                    <div class="col-md-9 col-md-offset-3">
                                            <?php  echo $this->Form->button('<i class="fa fa-angle-right"></i> Update',array('type'=>'submit','class'=>'btn btn-sm btn-primary','escape' => false)); ?>
                                            <?php echo $this->Html->link('<i class="fa fa-angle-left"></i> Cancel',array('controller'=>'Clientpos','action'=>'index'), array('type'=>'reset','class'=>'btn btn-sm btn-warning','escape' => false)); ?>
<!--                                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Submit</button>
                                        <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Reset</button>-->
                                    </div>
                                </div>
                                <?php echo $this->Form->end(); ?>
                                
                                <!-- END Basic Form Elements Content -->
                            </div>
                            <!-- END Basic Form Elements Block -->
                        </div>
    
    <?php echo $this->Html->script('pages/formsValidation'); ?>
        <script>$(function(){ FormsValidation.init(); });</script>
         <?php echo $this->Html->script('pages/uiProgress'); ?>
                            <script>$(function(){ UiProgress.init(); });</script>
                                
                                <?php if($this->Session->flash()!='') { ?>
                            <script> var UiProgress = function() {
                                
                                // Get random number function from a given range
                                var getRandomInt = function(min, max) {
                                    return Math.floor(Math.random() * (max - min + 1)) + min;
                                };
                                
                                return {
                                    init: function() {
                                        
                                        
                                        
                                        $.bootstrapGrowl('User Name Already Exists!', {
                                            type: 'danger',
                                            allow_dismiss: true
                                        });
                                        
                                        $(this).prop('disabled', true);
                                        $('#val_username').focus();
                                    }
                                };
                            }();
                            
                            
                            </script> 
                            <?php } ?>
                        
                        