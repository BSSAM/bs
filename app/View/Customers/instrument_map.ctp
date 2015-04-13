<script>
    var path_url = '<?PHP echo Router::url('/', true); ?>';
    $(document).ready(function(){
        
        $('#range_array').val('');
        $('#in_id').val('');
        $('#customer_instrument').val('');
        $('#model_no').val('');
        $('#unit_price').val('0');
        $('#total_price').val('0');
        $('#contract_disc').val('0');
        
        var edit_device_id=$(this).attr('data-edit');
        <?php if($id1){ ?>
                
            $(".cus_instrument_edit[data-edit='"+<?php echo $id1; ?>+"']").trigger("click");
        
        <?php }?>
        $(document).on('click','.customerinstrument_approve',function(){
            var cost=$('#unit_price').val();
            var device_id=$(this).attr('id');
            var customer_id =   $('#CustomerInstrumentCustomerId').val();
            if(($('#unit_price').val()=='')||($('#unit_price').val()=='0'))
            {
                alert("Cost Should not be Null While Approve");
                return false;
            }
            else
            {
                if(window.confirm("Are you sure you want to Approve?"))
                {
                    
                    
                    $.ajax({
                        type: 'POST',
                        data:"device_id="+ device_id,
                        url: path_url+'/Customers/approve_ins_cus/',
                        success:function(data){
                            alert("Customer Instrument Approval Successful");
                            window.location= path_url+ 'Customers/instrument_map/'+customer_id;
                        }
                    });
                }
            }
        });
        $(".error-custom").change(function(){
            $(".error-custom").each(function(){
                    if(($(this).val()).trim())
                    {
                        $(this).parents(".col-md-4").find('.name_error').removeClass('animation-slideDown');
                        $(this).parents(".col-md-4").find('.name_error').css('color','red');
                        $(this).parents(".col-md-4").find('.name_error').hide();
                    }
                    else
                    {
                        $(this).parents(".col-md-4").find('.name_error').addClass('animation-slideDown');
                        $(this).parents(".col-md-4").find('.name_error').css('color','red');
                        $(this).parents(".col-md-4").find('.name_error').show();
                    }
            });
        });
    });
    
        
    
</script>
<h1><i class="gi gi-user"></i>Instrument Pricing</h1>
</div>
</div>
<ul class="breadcrumb breadcrumb-top">
    <li><?php echo $this->Html->link('Home', array('controller' => 'Dashboards', 'action' => 'index')); ?></li>
    <li><?php echo $this->Html->link('Customers', array('controller' => 'Customers', 'action' => 'index')); ?></li>
    <li>Instrument Pricing</li>
</ul>
<!-- END Forms General Header -->
            <div class="row">
                        <div class="col-md-12">
                            <!-- Basic Form Elements Block -->
                            <div class="Customer_instrumentmessage"></div>
                            <div class="block">
                                <!-- Basic Form Elements Title -->
                                
                                <div class="block-title">
                                    <h2></h2>
                                </div>
                                <!-- END Form Elements Title -->
                                
                                <!-- Basic Form Elements Content -->
                                <?PHP echo $this->Form->create('CustomerInstrument', array('class' => 'form-horizontal form-bordered', 'id' => 'form-customerinstrument-add')); ?>
                                <?PHP echo $this->Form->input('customer_id', array('type' => 'hidden', 'value' => $customer_entry['Customer']['id'])); ?>
                                <?PHP echo $this->Form->input('instrument_id', array('type' => 'hidden', 'id' => 'ins_id')); ?>
                                <?PHP echo $this->Form->input('instrument_name', array('type' => 'hidden', 'id' => 'ins_name')); ?>
                                <?PHP echo $this->Form->input('device_id', array('type' => 'hidden', 'id' => 'device_id')); ?>        
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="customer_name">Customer Name</label>
                                    <div class="col-md-4">
                                        <?php echo $this->Form->input('Customer.customername', array('id' => 'customer_name', 'class' => 'form-control', 'placeholder' => 'Customer Name', 'label' => false, 'disabled' => 'disabled', 'value' => $customer_entry['Customer']['Customertagname'])); ?>
                                    </div>
                                    <label class="col-md-2 control-label" for="customer_instrument">Instrument Name <span class="text-danger">*</span></label>
                                    <div class="col-md-4">
                                        <?php echo $this->Form->input('instrument_name', array('id' => 'customer_instrument', 'class' => 'form-control error-custom', 'label' => false, 'name' => 'instrument_name','placeholder'=>'Select Instrument Name')); ?>
                                        <?PHP echo $this->Form->input('in_id', array('type' => 'hidden', 'id' => 'in_id')); ?>
                                        <div class="instrument_result" style="display:none;"></div>
                                        <span class="name_error">Instrument is Required</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="model_no">Model No <span class="text-danger">*</span></label>
                                    <div class="col-md-4">
                                        <?php echo $this->Form->input('model_no', array('id' => 'model_no', 'class' => 'form-control error-custom', 'label' => false, 'placeholder' => 'Enter Model No', 'name' => 'model_no')); ?>
                                        <span class="name_error">Model No is Required</span>    
                                    </div>
                                    <label class="col-md-2 control-label" for="range">Range <span class="text-danger">*</span></label>
                                    <div class="col-md-4">
                                        <select id="range_array" name="range" class="form-control select-chosen error-custom" data-placeholder="Select Range" style="width: 250px;">
<!--                                            <option value="">Select Range</option>-->
                                        </select>
                                        <span class="name_error">Range is Required</span>
                                        <?php //echo $this->Form->input('range', array('id'=>'range','class'=>'form-control select-chosen','label'=>false,'type'=>'select','options'=>$range_array,'data-placeholder'=>'Select Range Name','style'=>'width: 250px;','multiple'=>'multiple')); ?>
                                            
                                    </div>
                                   
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="unit_price">Cost</label>
                                    <div class="col-md-3">
                                        <?php //$disable_unit = "disabled = 'disabled'";
                                        $disable_unit = "";
                                        ?>
                                        <?php echo $this->Form->input('unit_price', array('id'=>'unit_price','class'=>'form-control','label'=>false,'type'=>'text','placeholder'=>'Enter Cost of the Instrument','name'=>'unit_price','value'=>0,$disable_unit, 'onkeypress'=>'return isNumberKey(event)')); ?>
                                    </div>
                                    <label class="col-md-1 control-label" for="contract_disc">Contract Disc</label>
                                    <div class="col-md-1">   
                                        <?php echo $this->Form->input('contract_disc', array('id'=>'contract_disc','class'=>'form-control','label'=>false,'type'=>'text','placeholder'=>'Enter the Contract Discount','name'=>'contract_disc','value'=>0, 'onkeypress'=>'return isNumberKey(event)')); ?>
                                        
                                    </div>
                                    <label class="col-md-1 control-label" for="total_price">Price</label>
                                    <div class="col-md-3">
                                        <?php $disable_total = "readonly = 'readonly'"; ?>
                                        <?php echo $this->Form->input('total_price', array('id'=>'total_price','class'=>'form-control','label'=>false,'type'=>'text','data-placeholder'=>'Select Total Price','name'=>'total_price',$disable_total)); ?>
                                        
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label"></label>
                                <label class="control-label help-block themed-color-autumn pull-left ">Press 'TAB' or 'Click' after entering the Cost or Contract Discount, To Get Price!!</label>
                                </div>
                                <div class="form-group">
                                    
                                    <label class="col-md-2 control-label" for="status">Active</label>
                                    <div class="col-md-4">
                                            <?php echo $this->Form->checkbox('status', array('id'=>'status','class'=>'','label'=>false,'name'=>'status','checked'=>true)); ?>
                                    </div>
                                </div>
                <div class="form-group form-actions">
                    <?php if($userrole_edit['view']==1){ ?>
                    <div class="col-md-9 col-md-offset-10 update_device">
                        <?php echo $this->Form->button('<i class="fa fa-plus fa-fw"></i> add', array('type' => 'button', 'class' => 'btn btn-sm btn-primary customerinstrument_add', 'escape' => false)); ?>
                    </div>
                    <?php } ?>
                    <?php if($userrole_cus['view']==1){ ?>
                    <div class="col-md-9 col-md-offset-10">
                        <?php if($approve!=1){echo $this->Form->button('<i class="fa fa-plus fa-fw"></i> Approve', array('type' => 'button','id'=>$id1, 'class' => 'btn btn-sm btn-warning customerinstrument_approve', 'escape' => false)); } ?>
                    </div>
                    <?php } ?>
                </div>
                    <?php if($userrole_edit['view']==1){ ?>            
                <div class="col-md-12">
                <div class="table-responsive">
                <table id="qofull-datatable" class="table table-vcenter table-condensed table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">S.No</th>
                            <th class="text-center">Instrument Name</th>
                            <th class="text-center">Model No</th>
                            <th class="text-center">Range</th>
                            <th class="text-center">Cost</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="customer_instrument_info"> 
                           <?PHP if(!empty($customer_instruments)):?> 
                             <?PHP foreach($customer_instruments as $k=>$cusins):?>  
                            <tr class="cus_instrument_remove_<?PHP echo $cusins['CustomerInstrument']['id']; ?>">
                            <td class="text-center"><?PHP echo $k+1; ?></td>
                            <td  class="text-center"><?PHP echo $cusins['Instrument']['name']; ?></td>
                            <td  class="text-center"><?PHP echo $cusins['CustomerInstrument']['model_no']; ?></td>
                            <td class="text-center"> <?PHP echo $cusins['Range']['range_name']; ?></td>
                            <td  class="text-center"><?PHP echo $cusins['CustomerInstrument']['cost']; ?></td>
                            <td  class="text-center"><?PHP echo $cusins['CustomerInstrument']['unit_price']; ?><?PHP //echo $status = ($cusins['CustomerInstrument']['status'] == 1) ? 'Active' : 'In active'; ?></td>
                            <td class="text-center">
                                
                                <div class="btn-group">
                                    <?php if($userrole_edit['edit']==1){ ?>
                                    <a data-edit="<?PHP echo $cusins['CustomerInstrument']['id']; ?>" class="btn btn-xs btn-default cus_instrument_edit" data-toggle="tooltip" title="Edit">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <?php } ?>
                                    <?PHP if($cusins['CustomerInstrument']['is_approved'] == 1): ?>
                                    <a data-delete="<?PHP echo $cusins['CustomerInstrument']['id']; ?>" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger cus_instrument_delete">
                                        <i class="fa fa-times"></i>
                                    </a>
                                    <?php endif; ?>
                                </div>
                                
                                <?PHP if($cusins['CustomerInstrument']['is_approved'] == 0): ?>
                                <div class="btn-group">
                                    <label class="label label-danger">Not Approved</label>
                                </div>
                                <?php endif; ?>
                            </td>
                        </tr>
                             <?PHP endforeach; ?>  
                           <?PHP endif; ?>     
                    </tbody>
                </table>
                </div>
                </div>
                                <?php } ?>
                                <div class="form-group form-actions">
                                    <div class="col-md-9 col-md-offset-10">
                                        <?php echo $this->Html->link('Submit', array('controller' => 'Customers', 'action' => 'index'), array('class' => 'btn btn-sm btn-primary', 'escape' => false)); ?>
                                    </div>
                                </div>
<!--    <?php //echo $this->Html->script('pages/instrumentsvalidation'); ?>
        <script>$(function(){ FormsValidation.init(); });</script>-->
                        