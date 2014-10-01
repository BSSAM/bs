/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
    $(document).on('click','.delivery_show',function(){
        var sales_id=$(this).text();
        $('#delivery_input_search').val(sales_id);
        $('#sales_list').fadeOut();
    });
    $('#delivery_input_search').blur(function(){
         $('#sales_list').fadeOut();
    })
    $(document).on('click','.delivery_search',function()
    {
        var sales_id=$('#delivery_input_search').val();
        if(sales_id=='')
        {
            $('#delivery_input_search').css('border','1px solid red');
            return false;
        }
        $.ajax({
            type: "POST",
            url: path_url+"/Deliveryorders/get_sales_details",
            data: 'sales_id='+sales_id,
            cache: false,
            success: function(data)
            {
                if(data!='failure')
                {
                    sales_node = $.parseJSON(data);
                    $('#DeliveryorderSalesorderId').val(sales_node.Salesorder.id);
                    $('#DeliveryorderCustomerId').val(sales_node.Customer.id);
                    $('#deli_customer').val(sales_node.Customer.customername);
                    $('#del_address_id').append('<option value="'+sales_node.Customer.deliveryaddress+'">'+sales_node.Customer.deliveryaddress+'</option>');
                    $('#del_dueamount').val(sales_node.Salesorder.due_amount);                
                    $('#del_customer_address').val(sales_node.Customer.regaddress);
                    $('#del_email').val(sales_node.Salesorder.email);
                    $('#del_phone').val(sales_node.Customer.phone);
                    $('#del_fax').val(sales_node.Customer.fax);
                    $('#val_ref_no').val(sales_node.Salesorder.ref_no);
                    $('#val_our_ref_no').val(sales_node.Salesorder.our_ref_no);
                    $('#del_attn').append('<option value="'+sales_node.Contactpersoninfo.id+'">'+sales_node.Contactpersoninfo.name+'</option>');
                    $.each(sales_node.Description,function(key,value){  
                        if(sales_node.Description.length===0)
                        {
                            $('.delivery_instrument_node').html('No Records Found');
                        }
                        else
                        {
                            $('.delivery_instrument_node .dataTables_empty').hide();
                            $('.delivery_instrument_node').append('\n\
                                    <tr class="tr_color sales_instrument_remove_'+value.id+'">\n\\n\
                                    <td class="text-center">'+value.id+'</td>\n\
                                    <td class="text-center">'+value.Instrument.name+'</td>\n\\n\
                                    <td class="text-center">'+value.Brand.brandname+'</td>\n\\n\
                                    <td class="text-center">'+value.sales_calllocation+'</td>\n\
                                     <td class="text-center">'+value.sales_validity+'</td>\n\
                                    <td class="text-center">'+value.sales_unitprice+'</td>\n\\n\
                                    <td class="text-center">'+value.Department.departmentname+'</td>\n\\n\
                                    <td class="text-center">'+value.sales_total+'</td>\n\
                                    </tr>');
                        }
                        
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
    
     $(document).on('click','.proforma_show',function(){
        var sales_id=$(this).text();
        $('#proforma_input_search').val(sales_id);
        $('#sales_list').fadeOut();
    });
    
    $('#proforma_input_search').blur(function(){
         $('#sales_list').fadeOut();
    })
    
    
    $(document).on('click','.proforma_search',function()
    {
        var sales_id=$('#proforma_input_search').val();
        if(sales_id=='')
        {
            $('#proforma_input_search').css('border','1px solid red');
            return false;
        }
        $.ajax({
            type: "POST",
            url: path_url+"/proformas/get_sales_details",
            data: 'sales_id='+sales_id,
            cache: false,
            success: function(data)
            {
                $('#tab-content').append(data);
                if(data!='failure')
                {
                    sales_node = $.parseJSON(data);
                    
                    $('#val_id').val(sales_node.BPI.id);
                    $('#val_salesorderno').val(sales_node.Salesorder.salesorderno);
                    $('#val_priority').val(sales_node.Salesorder.priority);
                    $('#val_customer_id').val(sales_node.Salesorder.customer_id);
                    $('#val_customer').val(sales_node.Customer.customername);
                    $('#val_address').val(sales_node.Salesorder.address);
                    $('#val_dueamount').val(sales_node.Salesorder.due_amount);
                    $.each(sales_node.Quotation.Customer.Contactpersoninfo,function(key,value){  
                    $('#val_attn').append('<option value="'+value.id+'">'+value.name+'</option>');
                    });
                    $('#val_phone').val(sales_node.Salesorder.phone);
                    $('#val_fax').val(sales_node.Salesorder.fax);
                    $('#val_email').val(sales_node.Salesorder.email);
                    $('#val_reg_date').val(sales_node.Salesorder.reg_date);
                    $('#val_ref_no').val(sales_node.Salesorder.ref_no);
                    $('#val_our_ref_no').val(sales_node.Salesorder.quotationno);
                    $('#val_in_date').val(sales_node.Salesorder.in_date);
                    $('#val_out_date').val(sales_node.Salesorder.out_date);
                    $('#val_instrument_type').empty().append('<option value="'+sales_node.Quotation.InstrumentType.id+'">'+sales_node.Quotation.InstrumentType.performainvoice+'</option>');
                    $('#val_remarks').val(sales_node.Salesorder.remarks);
                    $('#val_service_type').val(sales_node.Salesorder.service_id);
                    $.each(sales_node.Description,function(key,value){  
                        if(sales_node.Description.length===0)
                        {
                            $('.proforma_instrument_node').html('No Records Found');
                        }
                        else
                        {
                            $('.proforma_instrument_node').append('\n\
                                    <tr class="tr_color sales_instrument_remove_'+value.id+'">\n\\n\
                                    <td class="text-center">'+value.id+'</td>\n\
                                    <td class="text-center">'+value.Instrument.name+'</td>\n\\n\
                                    <td class="text-center">'+value.Brand.brandname+'</td>\n\\n\
                                    <td class="text-center">'+value.sales_calllocation+'</td>\n\
                                     <td class="text-center">'+value.sales_validity+'</td>\n\
                                    <td class="text-center">'+value.sales_unitprice+'</td>\n\\n\
                                    <td class="text-center">'+value.Department.departmentname+'</td>\n\\n\
                                    <td class="text-center">'+value.sales_total+'</td>\n\
                                    </tr>');
                        }
                        
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
    
    /************************For Delivery order Approval Script*********************************/
   $(document).on('click','.approve_deliveryorder',function(){
       var val_salesorderno=$('#del_order_no').val();
       if(window.confirm("Are you sure?")){
       $.ajax({
            type: 'POST',
            data:"id="+val_salesorderno,
            url: path_url+'Deliveryorders/approve/',
            success: function js(data)
            {
                //var url = path_url+"Deliveryorders/";    
               // $(location).attr('href',url);
                //window.location.reload();
                 console.log(data);
                 return false;
            }
        });
        
    }
    else
    {
        return false;
    }
       
   });
   
   $(document).on('change','#val_addr',function(){
       var address =$(this).val();
       var customer_id =$('#DeliveryorderCustomerId').val();
       if(address!=''&&customer_id!='')
       {
           $.ajax({
            type: "POST",
            url: path_url+"/Deliveryorders/get_delivery_address",
            data: 'address='+address+'&customer_id='+customer_id,
            cache: false,
            success: function(data)
            {
                
             $('#DeliveryorderCustomerAddress').val(data);
            }
	});
       }
       else
       {
           
           $('#DeliveryorderCustomerAddress').val('');
       }
    });
   /************************For Delivery order Approval End*********************************/
    
    
})

//$(document).ready(function() {
//	//catch the right-click context menu
//	$(document).bind("contextmenu",function(e) {				 
//		//warning prompt - optional
//		alert("No right-clicking!");
//
//		//delete the default context menu
//		return false;
//	});
//});

