<script>
    var path_url='<?PHP echo Router::url('/',true); ?>';
    
    $(document).on('click','.approve_purchaseorder',function(){
       var approve_subcon=$(this).attr('id');
       //alert(val_quotationno);
       
       if(window.confirm("Are you sure?")){
       $.ajax({
            type: 'POST',
            data:"id="+approve_subcon,
            beforeSend: ni_start(),  
            complete: ni_end(),
            url: path_url+'Purchaseorders/approve/',
            success: function(data)
            {
                //return false;
                alert("Purchase Order Approval Successful");
               window.location.reload();
            }
            
        });
    }
    else
    {
        return false;
    }
       
   });
</script>
<h1>
    <i class="gi gi-user"></i>Edit Purchase Orders
</h1>
</div>
</div>
<ul class="breadcrumb breadcrumb-top">
    <li><?php echo $this->Html->link('Home', array('controller' => 'Dashboards', 'action' => 'index')); ?></li>
    <li><?php echo $this->Html->link('Purchase Orders', array('controller' => 'Purchaseorders', 'action' => 'index')); ?></li>
    <li>Edit Purchase Orders</li>
</ul>
<!-- END Forms General Header -->

<div class="row">
    <div class="col-md-12">
        <!-- Basic Form Elements Block -->
        <div class="block">
            <!-- Basic Form Elements Title -->
            <?php echo $this->Form->create('Purchaseorders', array('class' => 'form-horizontal form-bordered', 'id' => 'purchase-edit', 'enctype' => 'multipart/form-data')); ?>
            <div class="block-title">
                <h2>
                    <div class="form-group">
                    <div class="col-md-4 search_move">
                        <div class="input-group">
                            <div>
                                <input type="text" class="form-control" autoComplete='off' placeholder="Enter Sales Order No" id="subcontract_input_search" name="sub-sales-no" value ="<?php echo $purchase['Purchaseorder']['salesorder_id']; ?>" readonly="readonly"/>
                            </div>
<!--                            <span class="input-group-btn">
                                <button class="btn btn-primary subcontract_search" type="button">Proceed</button>
                            </span>-->
                        </div>
<!--                        <div id="subcontract_list" class="instrument_drop">
                        </div>-->
                    </div>
                    </div>
                </h2>
            </div>
            <!-- END Form Elements Title -->

            <!-- Basic Form Elements Content -->


            <?php //echo $this->Form->create('Subcontractdo', array('class' => 'form-horizontal form-bordered', 'id' => 'subcontractdo-add', 'enctype' => 'multipart/form-data')); ?>
            <?PHP echo $this->Form->input('customer_id',array('type'=>'hidden')); ?>
            <?PHP echo $this->Form->input('salesorder_id',array('type'=>'hidden')); ?>
            <div class="form-group">
                <label class="col-md-2 control-label" for="val_customername">Customer Name</label>
                <div class="col-md-4">
                    <?php echo $this->Form->input('name', array('id' => 'val_customername', 'class' => 'form-control', 'placeholder' => 'Enter the Sub Contract Name', 'label' => false,'autoComplete'=>'off','value'=>$purchase['Purchaseorder']['name'],'readonly' => true)); ?>
                <div id="subcontract_result">
                </div>
                </div>
                <label class="col-md-2 control-label" for="val_regaddress">Customer Address</label>
                <div class="col-md-4">
                    <?php echo $this->Form->input('customer_address', array('id' => 'val_regaddress', 'class' => 'form-control', 'placeholder' => 'Enter Sub Contract Address', 'label' => false,'readonly' => true,'value'=>$purchase['Purchaseorder']['customer_address'])); ?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label" for="val_attn">ATTN</label>
                <div class="col-md-4">
                    <?php echo $this->Form->input('attn', array('id' => 'val_attn', 'class' => 'form-control', 'label' => false, 'type' => 'select', 'empty' => 'Select Contact person Name','value'=>$contact_list['Contactpersoninfo']['name'], 'readonly' => true)); ?>
                </div>
                <label class="col-md-2 control-label" for="val_phone">Phone</label>
                <div class="col-md-4">
                    <?php echo $this->Form->input('phone', array('id' => 'val_phone', 'class' => 'form-control',
                        'placeholder' => 'Enter the Phone Number', 'label' => false, 'autoComplete' => 'off', 'readonly' => true,'value'=>$contact_list['Contactpersoninfo']['phone']));
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="val_fax">Fax</label>
                <div class="col-md-4">
                    <?php echo $this->Form->input('fax', array('id' => 'val_fax', 'class' => 'form-control', 'label' => false, 'placeholder' => 'Enter the Fax Number', 'readonly' => true,'value'=>$purchase['Purchaseorder']['fax'])); ?>
                </div>
                <label class="col-md-2 control-label" for="val_email">Email</label>
                <div class="col-md-4">
                    <?php echo $this->Form->input('email', array('id' => 'val_email', 'class' => 'form-control',
                        'placeholder' => 'Enter the Email Id', 'label' => false, 'autoComplete' => 'off', 'readonly' => true,'value'=>$contact_list['Contactpersoninfo']['email']));
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="pur_order_no">Purchase Order No</label>
                <div class="col-md-4">
                    <?php echo $this->Form->input('Purchaseorder.purchaseorder_no', array('id'=>'pur_order_no','class'=>'form-control','label'=>false,'value'=>$purchase['Purchaseorder']['purchaseorder_no'],'readonly'=>true)); ?>
                </div>
                <label class="col-md-2 control-label" for="pur_order_date">Purchase Order Date</label>
                <div class="col-md-4">
                    <?php echo $this->Form->input('Purchaseorder.purchaseorder_date', array('id'=>'pur_order_date','class'=>'form-control input-datepicker-close','data-date-format'=>'dd-MM-yy','label'=>false,'value'=>$purchase['Purchaseorder']['purchaseorder_date'],'readonly'=>true)); ?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label" for="val_trackid">Track ID</label>
                <div class="col-md-4">
                    <?php echo $this->Form->input('track_id', array('id'=>'val_trackid','type'=>'text','class'=>'form-control','label'=>false,'placeholder'=>'Enter the Track Id','readonly'=>true,'value'=>$purchase['Purchaseorder']['track_id'])); ?>
                </div>
                <label class="col-md-2 control-label" for="val_ref_no">Your Ref No</label>
                <div class="col-md-4">
                    <?php echo $this->Form->input('ref_no', array('id' => 'val_ref_no', 'class' => 'form-control', 'label' => false, 'placeholder' => 'Enter the Reference Number','readonly'=>true,'value'=>$purchase['Purchaseorder']['ref_no'])); ?>
                </div>
            </div>


            <div class="col-lg-12">
                <h4 class="sub-header"><small>Customer Special Needs</small></h4>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label" for="val_salesperson">Sales person</label>
                <div class="col-md-4">
                <?php
                    echo $this->Form->input('salesperson', array('id' => 'val_salesperson', 'class' => 'form-control',
                            'placeholder' => 'Sales Person Name', 'label' => false,'readonly','value'=>$purchase['Purchaseorder']['salesperson']));
                ?>
                </div>  
                
                <label class="col-md-2 control-label" for="val_service_id">Service Type</label>
                <div class="col-md-4">
                <?php
                    echo $this->Form->input('service_id', array('id' => 'val_service_id', 'class' => 'form-control select-chosen', 'type' => 'select',
                     'label' => false, 'options' =>$services,'empty'=>'Select Service Type','value'=>$service['Service']['servicetype']));
                ?>
                </div> 
            </div>
            <div class="form-group">
            <label class="col-md-2 control-label" for="val_remarks">Remarks</label>
            <div class="col-md-4">
            <?php
                echo $this->Form->input('remarks', array('id' => 'val_remarks', 'class' => 'form-control',
            'placeholder' => 'Enter Remarks', 'label' => false,'type'=>'textarea','value'=>$purchase['Purchaseorder']['remarks']));
            ?>    
            </div>
            </div>
           
            <div class="col-lg-12">
                <h4 class="sub-header"><small><b>Instruments List </b</small></h4>
            </div>
            <div class="col-sm-3 col-lg-12">
    <div class="table-responsive">
<table  class="table table-vcenter table-condensed table-bordered">
    <thead>
        <tr>
            <th class="text-center">S.No</th>
            <th class="text-center">Instrument</th>
            <th class="text-center">Brand</th>
            <th class="text-center">Range</th>
            <th class="text-center">Model No</th>
            <th class="text-center">Call Location</th>
            <th class="text-center">Validity</th>
            
            <th class="text-center">Department</th>
            
            
        </tr>
    </thead>
    <tbody class="sales_Instrument_info"> 
    <?PHP 
       
            if(!empty($salesorder['Description'])):
               
                foreach($salesorder['Description'] as $device):?>
              
                <tr class="sales_instrument_remove_<?PHP echo $device['id']; ?>">
                    <td class="text-center"><?PHP echo $device['order_by']; ?></td>
                    <td class="text-center"><?PHP echo $device['Instrument']['name']; ?></td>
                    <td class="text-center"><?PHP echo $device['Brand']['brandname']; ?></td>
                    <td class="text-center"><?PHP echo $device['Range']['range_name']; ?></td>
                    <td class="text-center"><?PHP echo $device['model_no']; ?></td>
                    <td class="text-center"><?PHP echo $device['sales_calllocation']; ?></td>
                    <td class="text-center"><?PHP echo $device['sales_validity']; ?></td>
                    
                    <td class="text-center"><?PHP echo $device['Department']['departmentname']; ?></td>
                    
                    
                </tr>
        <?PHP   endforeach;
                   endif; 
        ?>
    </tbody>
</table>
</div>
</div>
            <div class="form-group form-actions">
                <div class="col-md-9 col-md-offset-10">
                    <?php //echo $this->Form->button('<i class="fa fa-angle-right"></i> Submit', array('type' => 'submit', 'class' => 'btn btn-sm btn-primary', 'escape' => false)); ?> &nbsp;
                    <?php  if($purchase['Purchaseorder']['is_approved']==0): ?>
                    <?php  echo $this->Form->button('<i class="fa fa-angle-right"></i> Approve',array('type'=>'button','class'=>'btn btn-sm btn-danger approve_purchaseorder','escape' => false,'id'=>$purchase['Purchaseorder']['id'])); ?>
                    <?php  echo $this->Form->button('<i class="fa fa-angle-right"></i> Update',array('type'=>'submit','class'=>'btn btn-sm btn-primary','escape' => false)); ?>
                    <?php else : ?>
                    <?php  echo $this->Form->button('<i class="fa fa-angle-right"></i> Update',array('type'=>'submit','class'=>'btn btn-sm btn-primary','escape' => false)); ?>
                    <?php endif; ?>
                </div>
            </div>


            <!-- panel -->
<?php echo $this->Form->end(); ?>
            <!-- END Basic Form Elements Content -->
        </div>
        <!-- END Basic Form Elements Block -->
    </div>
<?php echo $this->Html->script('pages/formsValidation'); ?>
    <script>$(function() { FormsValidation.init(); });</script>




