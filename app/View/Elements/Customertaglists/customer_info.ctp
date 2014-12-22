<div class="form-group">
    <label class="col-md-2 control-label" for="val_customername">Customer Name</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('customername', array('id' => 'val_customername', 'class' => 'form-control', 'placeholder' => 'Enter the Customer Name', 'label' => false, 'name' => 'customername','readonly'=>'readonly','value'=>$tag_customer_details['Customer']['customername'])); ?>
    </div>
     <label class="col-md-2 control-label" for="val_tag">Tag</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('tag_name', array('id' => 'val_tag', 'class' => 'form-control', 'placeholder' => 'Enter the Tag', 'label' => false, 'name' => 'tag_name')); ?>
    </div>

    
</div>
<div class="form-group">
    <label class="col-md-2 control-label" for="val_salespeoples">Sales Persons</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('salesperson_id', array('id' => 'val_salespeoples', 'class' => 'select-chosen required', 'options' => $salesperson, 'data-placeholder' => 'Enter the Sales Persons', 'label' => false, 'name' => 'salesperson_id', 'multiple' => true, 'style' => 'width: 250px; display: none;')); ?>
    </div>

    <label class="col-md-2 control-label" for="val_referredbies">Referred By(s)</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('referedbies_id', array('id' => 'val_referredbies', 'class' => 'select-chosen', 'options' => $referedby, 'data-placeholder' => 'Enter the Referred By', 'label' => false, 'name' => 'referedbies_id', 'multiple' => true, 'style' => 'width: 250px; display: none;')); ?>

    </div>
</div>
<div class="form-group">
    <label class="col-md-2 control-label" for="val_regaddress">Registered Address</label>
    <div class="col-md-10">
        <!-- Block Tabs -->
        <div class="block full">
            <!-- Block Tabs Title -->
            <div class="block-title">
                <div class="block-options pull-right">
                    <div class="btn-group">
                        <a href="#modal-registered" data-toggle="modal" id="" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add</a>
                        
                    </div>
                </div>
                <ul class="nav nav-tabs" data-toggle="tabs" id="tabs_reg">
                    <?php for($i=0;$i<$data10_count;$i++){ ?>
                    
                        <li id="<?php echo $data10[$i]['Address']['address_id']; ?>" <?php if($i==0){?> class="active"<?php } ?>><a href="#example-tabs2-Address<?php echo $i; ?>"><button class="close" type="button" id="<?php echo $data10[$i]['Address']['address_id']; ?>" >×</button>Address<?php echo $i+1; ?></a></li>
                    
                    <?php } ?>
                </ul>
            </div>
            <!-- END Block Tabs Title -->

            <!-- Tabs Content -->
            <div class="tab-content" id="tab-content">
                 <?php for($i=0;$i<$data10_count;$i++){ ?>
                <div class="tab-pane <?php if($i==0){?> active<?php } ?>" id="example-tabs2-Address<?php echo $i; ?>" ><?php echo $data10[$i]['Address']['address']; ?></div>
                
                <?php } ?>
            </div>
            <!-- END Tabs Content -->
        </div>
        <!-- END Block Tabs -->
    </div>
    


   <label class="col-md-2 control-label" for="val_billaddress">Billing Address</label>
    <div class="col-md-10">
        <!-- Block Tabs -->
        <div class="block full">
            <!-- Block Tabs Title -->
            <div class="block-title">
                <div class="block-options pull-right">
                    <div class="btn-group">
                        <a href="#modal-billing" data-toggle="modal" id="" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add</a>
                    </div>
                </div>
                <ul class="nav nav-tabs" data-toggle="tabs" id="tabs_bill">
                    <?php for($i=0;$i<$data11_count;$i++){ ?>
                    
                        <li id="<?php echo $data11[$i]['Address']['address_id']; ?>" <?php if($i==0){?> class="active"<?php } ?>><a href="#example-tabs2-billing<?php echo $i; ?>"><button class="close close_bill" type="button" id="<?php echo $data11[$i]['Address']['address_id']; ?>" >×</button>Address<?php echo $i+1; ?></a></li>
                    
                    <?php } ?>
                </ul>
            </div>
            <!-- END Block Tabs Title -->

            <!-- Tabs Content -->
            <div class="tab-content_bill" id="tab-content_bill">
                 <?php for($i=0;$i<$data11_count;$i++){ ?>
                <div class="tab-pane <?php if($i==0){?> active<?php } ?>" id="example-tabs2-billing<?php echo $i; ?>" ><?php echo $data11[$i]['Address']['address']; ?></div>
                
                <?php } ?>
            </div>
            <!-- END Tabs Content -->
        </div>
        <!-- END Block Tabs -->
    </div>



<label class="col-md-2 control-label" for="val_deliveryaddress">Delivery Address</label>
    <div class="col-md-10">
        <!-- Block Tabs -->
        <div class="block full">
            <!-- Block Tabs Title -->
            <div class="block-title">
                <div class="block-options pull-right">
                    <div class="btn-group">
                        <a href="#modal-delivery" data-toggle="modal" id="" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add</a>
                        
                    </div>
                </div>
                <ul class="nav nav-tabs" data-toggle="tabs" id="tabs_delivery">
                    <?php for($i=0;$i<$data12_count;$i++){ ?>
                    
                        <li id="<?php echo $data12[$i]['Address']['address_id']; ?>" <?php if($i==0){?> class="active"<?php } ?>><a href="#example-tabs2-delivery<?php echo $i; ?>"><button class="close close_delivery" type="button" id="<?php echo $data12[$i]['Address']['address_id']; ?>" >×</button>Address<?php echo $i+1; ?></a></li>
                    
                    <?php } ?>
                </ul>
            </div>
            <!-- END Block Tabs Title -->

            <!-- Tabs Content -->
            <div class="tab-content_delivery" id="tab-content_delivery">
                 <?php for($i=0;$i<$data12_count;$i++){ ?>
                <div class="tab-pane <?php if($i==0){?> active<?php } ?>" id="example-tabs2-delivery<?php echo $i; ?>" ><?php echo $data12[$i]['Address']['address']; ?></div>
                
                <?php }?>
            </div>
            <!-- END Tabs Content -->
        </div>
        <!-- END Block Tabs -->
    </div>

</div>
<div class="form-group">
    <label class="col-md-2 control-label" for="var_phone">Phone</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('phone', array('id' => 'var_phone', 'class' => 'form-control', 'placeholder' => 'Enter the Phone No', 'label' => false, 'name' => 'phone')); ?>
    </div>

    <label class="col-md-2 control-label" for="val_fax">Fax</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('fax', array('id' => 'val_fax', 'class' => 'form-control', 'placeholder' => 'Enter the Fax No', 'label' => false, 'name' => 'fax')); ?>
    </div>

</div>

<div class="form-group">
    <label class="col-md-2 control-label" for="val_postalcode">Postal Code</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('postalcode', array('id' => 'val_postalcode', 'class' => 'form-control', 'placeholder' => 'Enter the Postal Code', 'label' => false, 'name' => 'postalcode')); ?>
    </div>
    <label class="col-md-2 control-label" for="val_industry">Customer Industry</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('industry_id', array('id' => 'val_industry', 'class' => 'form-control select-chosen', 'empty' => 'Enter the Industry', 'options' => $industry, 'label' => false, 'name' => 'industry_id')); ?>
    </div>

    

</div>

<div class="form-group">
    <label class="col-md-2 control-label" for="var_type">Customer Type</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('customertype', array('id' => 'var_type', 'class' => 'form-control select-chosen', 'empty' => 'Enter the Customer Type', 'options' => array('Customer' => 'Customer', 'Sub-Contractor' => 'Sub-Contractor', 'Supplier' => 'Supplier', 'Customer/Sub-Contractor' => 'Customer/Sub-Contractor'), 'label' => false, 'name' => 'customertype')); ?>
    </div>
<label class="col-md-2 control-label" for="val_location">Customer Location</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('location_id', array('id' => 'val_location', 'class' => 'form-control select-chosen', 'empty' => 'Enter the Location', 'options' => $location, 'label' => false, 'name' => 'location_id')); ?>
    </div>
   

</div>

<div class="form-group">
  
    <label class="col-md-2 control-label" for="var_priorities">Priority</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('priority_id', array('id' => 'var_priorities', 'class' => 'form-control select-chosen', 'options' => $priority, 'empty' => 'Enter the Priorities', 'label' => false, 'name' => 'priority_id')); ?>
    </div>

    <label class="col-md-2 control-label" for="val_paymentterms">Payment Terms</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('paymentterm_id', array('id' => 'val_paymentterms', 'class' => 'form-control select-chosen', 'options' => $paymentterm, 'empty' => 'Enter the Payment Terms', 'label' => false, 'name' => 'paymentterm_id')); ?>
    </div>

</div>
<div class="form-group">
    <label class="col-md-2 control-label" for="val_calibrationtype">Calibration Type</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('calibrationtype', array('id' => 'val_calibrationtype', 'class' => 'form-control select-chosen', 'options' => array('Singlas' => 'Singlas', 'Non-Singlas' => 'Non-Singlas'), 'empty' => 'Enter the Calibration Type', 'label' => false, 'name' => 'calibrationtype')); ?>
    </div>
   <label class="col-md-2 control-label" for="val_invoicetype">Invoice Type</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('invoice_type_id', array('id' => 'val_invoicetype', 'class' => 'form-control select-chosen', 'options' =>$invoice_types, 'empty' => 'Enter the Invoice Type', 'label' => false, 'name' => 'invoice_type_id')); ?>
    </div>
</div>
<div class="form-group">
    
    <label class="col-md-2 control-label" for="val_deliveryordertype">Delivery Order Type</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('deliveryordertype', array('id' => 'val_deliveryordertype', 'class' => 'form-control select-chosen', 'options' => $deliverorder_type, 'empty' => 'Enter the Delivery Order Type', 'label' => false, 'name' => 'deliveryordertype')); ?>
    </div>
     <label class="col-md-2 control-label" for="val_poack">Acknowledgement Type</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('acknowledgement_type_id', array('id' => 'val_poack', 'class' => 'form-control select-chosen checkbox', 'label' => false, 'name' => 'acknowledgement_type_id','type'=>'select','options'=>$acknowledgement_type,'empty'=>'Select the Acknowledgement Type')); ?>
    </div>


</div>
<div class="form-group">
     <label class="col-md-2 control-label" for="var_requirements">Requirements</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('requirements', array('id' => 'var_requirements', 'class' => 'form-control', 'placeholder' => 'Enter the Requirement', 'label' => false, 'name' => 'requirements')); ?>
    </div>
    <label class="col-md-2 control-label" for="var_techrequirements">Technical Requirements</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('techrequirements', array('id' => 'var_techrequirements', 'class' => 'form-control', 'placeholder' => 'Enter the Technical Requirement', 'label' => false, 'name' => 'techrequirements')); ?>
    </div>

</div>