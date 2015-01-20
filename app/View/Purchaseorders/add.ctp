<script>
    var path_url='<?PHP echo Router::url('/',true); ?>';
</script>

<script type="text/javascript">
    $(function(){
        $("#subcontract_list").hide();
        $("#subcontract_input_search").keyup(function() 
        { 
            $(this).css('border','none')
            var sales_id = $(this).val();
            var dataString = 'sale_id='+ sales_id;
            if(sales_id!='')
            {
                $.ajax({
                    type: "POST",
                    url: "<?PHP echo Router::url('/',true); ?>Purchaseorders/salesorder_id_search",
                    data: dataString,
                    cache: false,
                    success: function(html)
                    {
                        $("#subcontract_list").html(html).show();
                    }
                });
            }return false;    
        });
        
    });
</script>
 
<script type="text/javascript">

$(function(){
    $("#subcontract_result").hide();
    $("#val_customername").keyup(function() 
    { 
    //alert();    
    var customer = $(this).val();
    var dataString = 'name='+ customer;
    if(customer!='')
    {
            $.ajax({
            type: "POST",
            url: "<?PHP echo Router::url('/',true); ?>/Purchaseorders/search",
            data: dataString,
            cache: false,
            success: function(html)
            {
                $("#subcontract_result").html(html).show();

            }
            });
    }
    });
    
    $(document).on('click','.purchaseorder_search',function()
    {
        var sales_id=$('#subcontract_input_search').val();
        if(sales_id=='')
        {
            $('#subcontract_input_search').css('border','1px solid red');
            return false;
        }
        $.ajax({
            type: "POST",
            url: path_url+"/Purchaseorders/get_sales_details",
            data: 'sales_id='+sales_id,
            cache: false,
            beforeSend: ni_start(),  
            complete: ni_end(),
            success: function(data)
            {
                if(data!='failure')
                {
                    
                    sales_node = $.parseJSON(data);
                    console.log(sales_node);
                    $('#salesorder_id').val(sales_node.Salesorder.id);
                    $('#val_date').val(sales_node.Salesorder.in_date);
                    $('#val_duedate').val(sales_node.Salesorder.due_date);
                    $('#val_duedate').val(sales_node.Salesorder.due_date);
                    $('#val_ref_no').val(sales_node.Salesorder.quotationno);
                    $('#val_trackid').val(sales_node.Salesorder.track_id);
                    $('#val_salesperson').val(sales_node.Customerspecialneed.salesperson_name);
                    
                    $.each(sales_node,function(key,value){ 
                        if(key==0){
                            $('.po_instrument_info').empty();
                        }
                        console.log(value);
                        if(sales_node.length===0)
                        {
                            $('.po_instrument_info').html(' <tr class="text-center">No Records Found</tr>');
                        }
                        else
                        {
                            //alert(value.Range.range_name);
                            $('#salesorder_id').val(sales_id);
                            //$('#SubcontractdoSalesorderId').val(sales_id);
                            //$('.description_list').append('<input type="hidden" value="'+value.Description.id+'" name="description_list[]"/>');
                            $('.po_instrument_info').append('\n\
                                    <tr class="tr_color sales_instrument_remove_'+value.Description.id+'">\n\\n\
                                    <td class="text-center">'+value.Description.order_by+'</td>\n\
                                    <td class="text-center">'+value.Instrument.name+'</td>\n\\n\\n\
                                    <td class="text-center">'+value.Description.model_no+'</td>\n\\n\\n\
                                    <td class="text-center">'+value.Brand.brandname+'</td>\n\\n\\n\
                                    <td class="text-center">'+value.Range.range_name+'</td>\n\\n\
                                    <td class="text-center">'+value.Description.sales_calllocation+'</td>\n\\n\
                                    <td class="text-center">'+value.Description.sales_calltype+'</td>\n\
                                    <td class="text-center">'+value.Description.sales_validity+'</td>\n\
                                    <td class="text-center">'+value.Department.departmentname+'</td>\n\\n\\n\\n\
                                    <td class="text-center"><div class="btn-group"><a data-delete="'+value.Description.id+'" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger purchase_instrument_delete"><i class="fa fa-times"></i></a></div></td>\n\\n\\n\\n\
                                    </tr>');
                            
                            //<td class="text-center"><div class="btn-group">\n\
                                 //   <a data-delete="'+value.Description.id+'" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger subcontract_instrument_delete">\n\
                                 //   <i class="fa fa-times"></i></a></div></td>
                            
                            
                        }
                        $('body, html').animate({scrollTop : ($('.subcontract_linear').offset().top)-500}, 'slow', 'linear');
                    });
                   
                }
                if(data=='failure')
                {
                    alert('Sorry ! The Requested Id could not be process');
                    return false;
                }
            },
            error: function () 
            {
                alert('Sorry ! Network Connection Failure');
                return false;
            }
	});
    });
    
    $(document).on('click','.po_customer_show',function(){
        var customer_name=$(this).text();
        $('#val_customername').val(customer_name);
        $('#subcontract_result').fadeOut();
        var customer_id=$(this).attr('id');
        $.ajax({
            type: "POST",
            url: path_url+"/Purchaseorders/get_customer_value",
            data: 'cust_id='+customer_id,
            cache: false,
            beforeSend: ni_start(),  
            complete: ni_end(),
            success: function(data)
            {
				 try {
    data1 = $.parseJSON(data);
  } catch (e) {
    // error
    return;
  }
                
                address_node    =   data1.Address;
                contact_person_info =   data1.Contactpersoninfo;
                salesperson_node =   data1.CusSalesperson;
                $.each(address_node,function(k,v){
                    if(v.type=='registered'){
                    $('#val_regaddress').val(v.address);}
                });
                $.each(contact_person_info,function(k,v){
                    $('#val_attn').append('<option value="'+v.id+'">'+v.name+'</option>');
                });
                  var sal_name    =  [];
                  $.each(salesperson_node,function(k,v){
                      sal_name.push(v.Salesperson.salesperson);   
                });
                $('#val_salesperson').val(sal_name.join(' , '));
                $('#customer_id').val(data1.Customer.id);
                $('#val_fax').val(data1.Customer.fax);
                $('#val_phone').val(data1.Customer.phone); 
                $('#val_email').val(data1.Contactpersoninfo.email);
                //$('#customer_id').val(data1.Customer.id);
                $('#val_payment_term').val(data1.Paymentterm.paymentterm+' '+ data1.Paymentterm.paymenttype);
                $('#pay_id').val(data1.Paymentterm.id);
            }
	});
    });
    
    $(document).on('click','.purchase_instrument_delete',function(){
      var device_id=$(this).attr('data-delete');
      var result    =   confirm('Are you sure want to delete?');
      if(result==true){
       $.ajax({
            type: 'POST',
            data:"device_id="+ device_id,
            beforeSend: ni_start(),  
            complete: ni_end(),
            url: path_url+'/Purchaseorders/delete_instrument/',
            success:function(data){
                $('.sales_instrument_remove_'+device_id).fadeOut();
            }
        });
        
        $('.sales_instrument_remove_'+device_id).fadeOut();
      } 
   }); 
    
    });
</script>           
<h1>
    <i class="gi gi-user"></i>Add Purchase Order
</h1>
</div>
</div>
<ul class="breadcrumb breadcrumb-top">
    <li><?php echo $this->Html->link('Home', array('controller' => 'Dashboards', 'action' => 'index')); ?></li>
    <li><?php echo $this->Html->link('Purchase Order', array('controller' => 'Purchaseorders', 'action' => 'index')); ?></li>
    <li>Add Purchase Orders</li>
</ul>
<!-- END Forms General Header -->

<div class="row">
    <div class="col-md-12">
        <!-- Basic Form Elements Block -->
        <div class="block">
            <!-- Basic Form Elements Title -->
            <?php echo $this->Form->create('Purchaseorder', array('class' => 'form-horizontal form-bordered', 'id' => 'purchase-add', 'enctype' => 'multipart/form-data')); ?>
            <div class="block-title">
                <h2>
                    <div class="form-group">
                    <div class="col-md-4 search_move">
                        <div class="input-group">
                            <div>
                                <input type="text" class="form-control" autoComplete='off' placeholder="Enter Sales Order No" id="subcontract_input_search" name="sub-sales-no"/>
                            </div>
                            <span class="input-group-btn">
                                <button class="btn btn-primary purchaseorder_search" type="button">Proceed</button>
                            </span>
                        </div>
                        <div id="subcontract_list" class="instrument_drop">
                        </div>
                    </div>
                    </div>
                </h2>
            </div>
            <!-- END Form Elements Title -->

            <!-- Basic Form Elements Content -->


            <?php //echo $this->Form->create('Subcontractdo', array('class' => 'form-horizontal form-bordered', 'id' => 'subcontractdo-add', 'enctype' => 'multipart/form-data')); ?>
            <?PHP echo $this->Form->input('customer_id',array('type'=>'hidden','id'=>'customer_id')); ?>
            <?PHP echo $this->Form->input('salesorder_id',array('type'=>'hidden','id'=>'salesorder_id')); ?>
<!--            <div class="description_list">
                
            </div>-->
            <div class="form-group">
                <label class="col-md-2 control-label" for="val_customername">Customer Name</label>
                <div class="col-md-4">
                    <?php echo $this->Form->input('name', array('id' => 'val_customername', 'class' => 'form-control', 'placeholder' => 'Enter the Sub Contract Name', 'label' => false,'autoComplete'=>'off')); ?>
                <div id="subcontract_result">
                </div>
                </div>
                <label class="col-md-2 control-label" for="val_regaddress">Customer Address</label>
                <div class="col-md-4">
                    <?php echo $this->Form->input('customer_address', array('id' => 'val_regaddress', 'class' => 'form-control', 'placeholder' => 'Enter Sub Contract Address', 'label' => false,'readonly' => true)); ?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label" for="val_attn">ATTN</label>
                <div class="col-md-4">
                    <?php echo $this->Form->input('attn', array('id' => 'val_attn', 'class' => 'form-control', 'label' => false, 'type' => 'select', 'empty' => 'Select Contact person Name')); ?>
                </div>
                <label class="col-md-2 control-label" for="val_phone">Phone</label>
                <div class="col-md-4">
                    <?php echo $this->Form->input('phone', array('id' => 'val_phone', 'class' => 'form-control',
                        'placeholder' => 'Enter the Phone Number', 'label' => false, 'autoComplete' => 'off', 'readonly' => true));
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="val_fax">Fax</label>
                <div class="col-md-4">
                    <?php echo $this->Form->input('fax', array('id' => 'val_fax', 'class' => 'form-control', 'label' => false, 'placeholder' => 'Enter the Fax Number', 'readonly' => true)); ?>
                </div>
                <label class="col-md-2 control-label" for="val_email">Email</label>
                <div class="col-md-4">
                    <?php echo $this->Form->input('email', array('id' => 'val_email', 'class' => 'form-control',
                        'placeholder' => 'Enter the Email Id', 'label' => false, 'autoComplete' => 'off', 'readonly' => true));
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="pur_order_no">Purchase Order No</label>
                <div class="col-md-4">
                    <?php echo $this->Form->input('Purchaseorder.purchaseorder_no', array('id'=>'pur_order_no','class'=>'form-control','label'=>false,'readonly'=>'readonly','value'=>$purchaseorderno)); ?>
                </div>
                <label class="col-md-2 control-label" for="pur_order_date">Purchase Order Date</label>
                <div class="col-md-4">
                    <?php echo $this->Form->input('Purchaseorder.purchaseorder_date', array('id'=>'pur_order_date','class'=>'form-control input-datepicker-close','data-date-format'=>'dd-MM-yy','label'=>false,'value'=>date('d-M-y'))); ?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label" for="val_trackid">Track ID</label>
                <div class="col-md-4">
                    <?php echo $this->Form->input('track_id', array('id'=>'val_trackid','type'=>'text','class'=>'form-control','label'=>false,'placeholder'=>'Enter the Track Id','readonly'=>true)); ?>
                </div>
                <label class="col-md-2 control-label" for="val_ref_no">Your Ref No</label>
                <div class="col-md-4">
                    <?php echo $this->Form->input('ref_no', array('id' => 'val_ref_no', 'class' => 'form-control', 'label' => false, 'placeholder' => 'Enter the Reference Number','readonly'=>true)); ?>
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
                            'placeholder' => 'Sales Person Name', 'label' => false,'readonly'));
                ?>
                </div>  
                
                <label class="col-md-2 control-label" for="val_service_id">Service Type</label>
                <div class="col-md-4">
                <?php
                    echo $this->Form->input('service_id', array('id' => 'val_service_id', 'class' => 'form-control select-chosen', 'type' => 'select',
                     'label' => false, 'options' =>$services,'empty'=>'Select Service Type'));
                ?>
                </div> 
            </div>
            <div class="form-group">
            <label class="col-md-2 control-label" for="val_remarks">Remarks</label>
            <div class="col-md-4">
            <?php
                echo $this->Form->input('remarks', array('id' => 'val_remarks', 'class' => 'form-control',
            'placeholder' => 'Enter Remarks', 'label' => false,'type'=>'textarea'));
            ?>    
            </div>
            </div>
           
            <div class="col-lg-12">
                <h4 class="sub-header"><small><b>Instruments List </b</small></h4>
            </div>
            <div class="col-sm-3 col-lg-12 subcontract_linear">
                <table  class="table table-vcenter table-condensed table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">S.No</th>
                            <th class="text-center">Instrument</th>
                            <th class="text-center">Model No</th>
                            <th class="text-center">Brand</th>
                            <th class="text-center">Range</th>
                            <th class="text-center">Call Location</th>
                            <th class="text-center">Call Type</th>
                            <th class="text-center">Validity</th>
                            <th class="text-center">Department</th>
<!--                            <th class="text-center">Action</th>-->

                        </tr>
                    </thead>
                    <tbody class="po_instrument_info"> 
                        <tr class="text-center">    
                            <td class="" colspan="9">
                        No Records Found</td>
                       
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group form-actions">
                <div class="col-md-9 col-md-offset-10">
                    <?php echo $this->Form->button('<i class="fa fa-angle-right"></i> Submit', array('type' => 'submit', 'class' => 'btn btn-sm btn-primary', 'escape' => false)); ?> &nbsp;
                    <?php //echo $this->Form->button('<i class="fa fa-repeat"></i> Reset', array('type' => 'reset', 'class' => 'btn btn-sm btn-warning', 'escape' => false)); ?>
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




