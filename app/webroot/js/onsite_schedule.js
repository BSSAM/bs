/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
    $(document).on('click','.onsite_qo_single',function(){
        var qo_id=$(this).text();
        $('#onsite_input_search').val(qo_id);
        $('#onsite_list').fadeOut();
    });
    $('#onsite_input_search').blur(function(){
         $('#onsite_list').fadeOut();
    })
    $(document).on('click','.onsite_search',function()
    {
        var qo_id=$('#onsite_input_search').val();
        if(qo_id=='')
        {
            $('#onsite_input_search').css('border','1px solid red');
            return false;
        }
        $.ajax({
            type: "POST",
            url: path_url+"/Onsites/get_qo_details",
            data: 'qo_id='+qo_id,
            cache: false,
            success: function(data)
            {
                if(data!='failure')
                {
                    var onsite_node = $.parseJSON(data);
                    var customer_address_node   =   onsite_node.Customer.Address;
                    var contact_person_node   =   onsite_node.Customer.Contactpersoninfo;
                    $('#quotation_id').val(onsite_node.Quotation.id);
                    $('#quotationno').val(onsite_node.Quotation.quotationno);
                    $('#customer_id').val(onsite_node.Customer.id);
                    $('#val_customer').val(onsite_node.Customer.customername);
                    $.each(customer_address_node,function(k,v){
                        if(v.type=='registered'){
                             $('#val_address').val(v.address);
                        }
                    });
                    $.each(contact_person_node,function(k,v){
                         $('#val_attn').append('<option value="'+v.id+'">'+v.name+'</option>');
                    });
                   $('#val_customer').val(onsite_node.Customer.customername);
                    $('#val_fax').val(onsite_node.Customer.fax);
                  
                    $('#val_phone').val(onsite_node.Quotation.phone);                
                  
                       $.each(onsite_node.OnsiteInstrument,function(key,value){  
                        if(onsite_node.OnsiteInstrument.length===0)
                        {
                            $('.delivery_instrument_node').html('No Records Found');
                        }
                        else
                        {
                            $('.onsite_instrument_node .dataTables_empty').hide();
                            $('.onsite_instrument_node').append('\n\
                                    <tr class="tr_color sales_instrument_remove_'+value.id+'">\n\\n\
                                    <td class="text-center">'+value.OnsiteInstrument.id+'</td>\n\
                                    <td class="text-center">'+value.Instrument.name+'</td>\n\\n\\n\
                                    <td class="text-center">'+value.OnsiteInstrument.model_no+'</td>\n\
                                    <td class="text-center">'+value.OnsiteInstrument.onsite_calllocation+'</td>\n\\n\
                                    <td class="text-center">'+value.OnsiteInstrument.onsite_calltype+'</td>\n\
                                     <td class="text-center">'+value.OnsiteInstrument.onsite_validity+'</td>\n\
                                    <td class="text-center">'+value.OnsiteInstrument.onsite_unitprice+'</td>\n\\n\
                                    <td class="text-center">'+value.Department.departmentname+'</td>\n\\n\
                                    <td class="text-center">'+value.OnsiteInstrument.onsite_total+'</td>\n\
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
                    $('#val_attn').append('<option value="'+sales_node.Salesorder.attn+'">'+sales_node.Salesorder.attn+'</option>');
                    $('#val_phone').val(sales_node.Salesorder.phone);
                    $('#val_fax').val(sales_node.Salesorder.fax);
                    $('#val_email').val(sales_node.Salesorder.email);
                    $('#val_reg_date').val(sales_node.Salesorder.reg_date);
                    $('#val_ref_no').val(sales_node.Salesorder.ref_no);
                    $('#val_our_ref_no').val(sales_node.Salesorder.our_ref_no);
                    $('#val_in_date').val(sales_node.Salesorder.in_date);
                    $('#val_out_date').val(sales_node.Salesorder.out_date);
                    $('#val_instrument_type').append('<option value="'+sales_node.Salesorder.instrument_type+'">'+sales_node.Salesorder.instrument_type+'</option>');
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
                //window.location.reload();
                 console.log(data);
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
   /************************For Onsite Engineer add*********************************/
     $(document).on('change','#val_engineer',function(){
       var engineer_email =$(this).val();
       var engineer_name =$('#val_engineer option:selected').text();
       var onsiteschedule_no    =   $('#onsiteschedule_no').val();
      
       if(engineer_email!=''&&engineer_name!='')
       {
           $.ajax({
            type: "POST",
            url: path_url+"/Onsites/add_engineers",
            data: 'engineer_name='+engineer_name+'&engineer_email='+engineer_email+'&onsiteschedule_no='+onsiteschedule_no,
            cache: false,
            success: function(data)
            {
                if(data!=''){
                      $('.engineer_info').append('\n\
                                    <tr class="tr_color engineer_remove_'+data+' '+engineer_email+'">\n\\n\
                                    <td class="text-center">'+engineer_name+'</td>\n\
                                    <td class="text-center">'+engineer_email+'</td>\n\\n\\n\
                                    <td class="text-center"><div class="btn-group">\n\
                                    <a data-delete="'+data+'" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger engineer_delete">\n\
                                    <i class="fa fa-times"></i></a>\n\
                                    </tr>');
                }
               
            
            }
	});
       }
       else
       {
           
           $('#DeliveryorderCustomerAddress').val('');
       }
    });
     /***************************Engineer Delete Script**************************/
    $(document).on('click','.engineer_delete',function(){
      var eng_id=$(this).attr('data-delete');
      var result    =   confirm('Are you sure want to delete?');
      if(result==true){
       $.ajax({
            type: 'POST',
            data:"engineer_id="+ eng_id,
            url: path_url+'/Onsites/delete_engineer/',
            success:function(data){
                if(data==1){
                $('.engineer_remove_'+eng_id).fadeOut();
                
                }
            }
        });
    }
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

