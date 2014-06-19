    /* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
    $(document).on('click','.subcontract_show',function(){
        var sales_id=$(this).text();
        $('#subcontract_input_search').val(sales_id);
        $('#subcontract_list').fadeOut();
    });
    
    $('#subcontract_input_search').blur(function(){
         $('#subcontract_list').fadeOut();
    });
    $('#val_customername').blur(function(){
         $('#subcontract_result').fadeOut();
    })
    $(document).on('click','.subcontract_search',function()
    {
        var sales_id=$('#subcontract_input_search').val();
        if(sales_id=='')
        {
            $('#subcontract_input_search').css('border','1px solid red');
            return false;
        }
        $.ajax({
            type: "POST",
            url: path_url+"/Subcontractdos/get_sales_details",
            data: 'sales_id='+sales_id,
            cache: false,
            success: function(data)
            {
                if(data!='failure')
                {
                    sales_node = $.parseJSON(data);
                    
                    $.each(sales_node,function(key,value){  
                        if(sales_node.length===0)
                        {
                            $('.subcontract_instrument_info').html('No Records Found');
                        }
                        else
                        {
                            $('#SubcontractdoSalesorderId').val(sales_id);
                            $('.description_list').append('<input type="hidden" value="'+value.Description.id+'" name="description_list[]"/>');
                            $('.subcontract_instrument_info').append('\n\
                                    <tr class="tr_color sales_instrument_remove_'+value.Description.id+'">\n\\n\
                                    <td class="text-center">'+value.Description.id+'</td>\n\
                                    <td class="text-center">'+value.Instrument.name+'</td>\n\\n\\n\
                                    <td class="text-center">'+value.Description.model_no+'</td>\n\\n\\n\
                                    <td class="text-center">'+value.Brand.brandname+'</td>\n\\n\\n\
                                    <td class="text-center">'+value.Range.range_name+'</td>\n\\n\
                                    <td class="text-center">'+value.Description.sales_calllocation+'</td>\n\\n\
                                    <td class="text-center">'+value.Description.sales_calltype+'</td>\n\
                                    <td class="text-center">'+value.Description.sales_validity+'</td>\n\
                                    <td class="text-center">'+value.Department.departmentname+'</td>\n\\n\\n\
                                    <td class="text-center"><div class="btn-group">\n\
                                    <a data-delete="'+value.Description.id+'" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger subcontract_instrument_delete">\n\
                                    <i class="fa fa-times"></i></a></div></td></tr>');
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
    $(document).on('click','.subcontract_instrument_delete',function(){
      var device_id=$(this).attr('data-delete');
       
        $.ajax({
            type: 'POST',
            data:"device_id="+ device_id,
            url: path_url+'/Subcontractdos/delete_instrument/',
            success:function(data){
                $('.sales_instrument_remove_'+device_id).fadeOut();
            }
        });
   }); 
  
   $(document).on('click','.subcontract_customer_show',function(){
        var customer_name=$(this).text();
        $('#val_customername').val(customer_name);
        $('#subcontract_result').fadeOut();
        var customer_id=$(this).attr('id');
        $.ajax({
            type: "POST",
            url: path_url+"/Subcontractdos/get_customer_value",
            data: 'cust_id='+customer_id,
            cache: false,
            success: function(data)
            {
                data1 = $.parseJSON(data);
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
                $('#SubcontractdoCustomerId').val(data1.Customer.id);
                $('#val_fax').val(data1.Customer.fax);
                $('#val_phone').val(data1.Customer.phone); 
                $('#val_email').val(data1.Contactpersoninfo.email);
                $('#SalesorderCustomerId').val(data1.Customer.id);
                $('#val_payment_term').val(data1.Paymentterm.paymentterm+' '+ data1.Paymentterm.paymenttype);
                $('#pay_id').val(data1.Paymentterm.id);
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