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
                    $('#del_attn').append('<option value="'+sales_node.Salesorder.attn+'">'+sales_node.Salesorder.attn+'</option>');
                    $('#del_phone').val(sales_node.Customer.phone);
                    $('#del_fax').val(sales_node.Customer.fax);
                    $('#val_ref_no').val(sales_node.Salesorder.ref_no);
                    $('#val_our_ref_no').val(sales_node.Salesorder.our_ref_no);
                    $.each(sales_node.Description,function(key,value){  
                        if(sales_node.Description.length===0)
                        {
                            $('.delivery_instrument_node').html('No Records Found');
                        }
                        else
                        {
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