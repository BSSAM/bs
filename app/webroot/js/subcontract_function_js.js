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
            beforeSend: ni_start(),  
            complete: ni_end(),
            success: function(data)
            {
                if(data!='failure')
                {
                    
                    sales_node = $.parseJSON(data);
                    //console.log(sales_node);
                    //console.log(sales_node.InstrumentType.subcontract_deliveryorder);
                    $('#SubcontractdoSalesorderId').val(sales_node.Salesorder.id);
                    $('#val_date').val(sales_node.Salesorder.in_date);
                    $('#val_duedate').val(sales_node.Salesorder.due_date);
                    $('#val_duedate').val(sales_node.Salesorder.due_date);
                    $('#val_ref_no').val(sales_node.Salesorder.quotationno);
                    $('#val_trackid').val(sales_node.Salesorder.track_id);
                    $('#val_salesperson').val(sales_node.Customerspecialneed.salesperson_name);
                    $('#val_instrument_type_id').empty().append('<option value="'+sales_node.InstrumentType.id+'">'+sales_node.InstrumentType.subcontract_deliveryorder+'</option>');
                    
                    var html = '';
                    var arr = [];
                    arr[1] = arr[2] = arr[3] = arr[4] = arr[5] = arr[6] = arr[7] = arr[8] = 0;
                    $.each(sales_node,function(key,value){
                        if($.isNumeric(key))
                        {
                        if(key==0){
                            $('.subcontract_instrument_info').empty();
                        }
                        //console.log(value);
                        if(sales_node.length===0)
                        {
                            $('.subcontract_instrument_info').html(' <tr class="text-center">No Records Found</tr>');
                        }
                        else
                        {
                            //alert(value.Range.range_name);
                            $('#SubcontractdoSalesorderId').val(sales_id);
                            tt1 = (value.Description.title1_val) ? value.Description.title1_val : '';
                            tt2 = (value.Description.title2_val) ? value.Description.title2_val : '';
                            tt3 = (value.Description.title3_val) ? value.Description.title3_val : '';
                            tt4 = (value.Description.title4_val) ? value.Description.title4_val : '';
                            tt5 = (value.Description.title5_val) ? value.Description.title5_val : '';
                            tt6 = (value.Description.title6_val) ? value.Description.title6_val : '';
                            tt7 = (value.Description.title7_val) ? value.Description.title7_val : '';
                            tt8 = (value.Description.title8_val) ? value.Description.title8_val : '';
                            //$('#SubcontractdoSalesorderId').val(sales_id);
                            //$('.description_list').append('<input type="hidden" value="'+value.Description.id+'" name="description_list[]"/>');
                            html += '<tr class="tr_color sales_instrument_remove_'+value.Description.id+'">\n\\n\
                                    <td class="text-center">'+value.Description.order_by+'</td>\n\
                                    <td class="text-center">'+value.Instrument.name+'</td>\n\\n\\n\
                                    <td class="text-center">'+value.Description.model_no+'</td>\n\\n\\n\
                                    <td class="text-center">'+value.Brand.brandname+'</td>\n\\n\\n\
                                    <td class="text-center">'+value.Range.range_name+'</td>\n\\n\
                                    <td class="text-center">'+value.Description.sales_calllocation+'</td>\n\\n\
                                    <td class="text-center">'+value.Description.sales_calltype+'</td>\n\
                                    <td class="text-center">'+value.Description.sales_validity+'</td>\n\
                                    <td class="text-center">'+value.Department.departmentname+'</td>\n\\n\\n\\n\
                                    <td class="text-center title_val title_val1 edit_title1" id = "'+value.Description.id+'">'+tt1+'</td>\n\\n\\n\\n\\n\
                                    <td class="text-center title_val title_val2 edit_title2" id = "'+value.Description.id+'">'+tt2+'</td>\n\\n\\n\\n\\n\
                                    <td class="text-center title_val title_val3 edit_title3" id = "'+value.Description.id+'">'+tt3+'</td>\n\\n\\n\\n\\n\
                                    <td class="text-center title_val title_val4 edit_title4" id = "'+value.Description.id+'">'+tt4+'</td>\n\\n\\n\\n\\n\
                                    <td class="text-center title_val title_val5 edit_title5" id = "'+value.Description.id+'">'+tt5+'</td>\n\\n\\n\\n\\n\
                                    <td class="text-center title_val title_val6 edit_title6" id = "'+value.Description.id+'">'+tt6+'</td>\n\\n\\n\\n\\n\
                                    <td class="text-center title_val title_val7 edit_title7" id = "'+value.Description.id+'">'+tt7+'</td>\n\\n\\n\\n\\n\
                                    <td class="text-center title_val title_val8 edit_title8" id = "'+value.Description.id+'">'+tt8+'</td>\n\\n\\n\\n\
                                    <td class="text-center"><div class="btn-group"><a data-delete="'+value.Description.id+'" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger subcontract_instrument_delete"><i class="fa fa-times"></i></a></div></td>\n\\n\\n\\n\
                                    </tr>';
                                
                                
                                arr[1] = (value.Description.title1_val || arr[1]) ? 1 : 0;
                                arr[2] = (value.Description.title2_val || arr[2]) ? 1 : 0;
                                arr[3] = (value.Description.title3_val || arr[3]) ? 1 : 0;
                                arr[4] = (value.Description.title4_val || arr[4]) ? 1 : 0;
                                arr[5] = (value.Description.title5_val || arr[5]) ? 1 : 0;
                                arr[6] = (value.Description.title6_val || arr[6]) ? 1 : 0;
                                arr[7] = (value.Description.title7_val || arr[7]) ? 1 : 0;
                                arr[8] = (value.Description.title8_val || arr[8]) ? 1 : 0;
                           
                            
                            //<td class="text-center"><div class="btn-group">\n\
                                 //   <a data-delete="'+value.Description.id+'" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger subcontract_instrument_delete">\n\
                                 //   <i class="fa fa-times"></i></a></div></td>
                            
                            
                        }
                        $('body, html').animate({scrollTop : ($('.subcontract_linear').offset().top)-500}, 'slow', 'linear');
                    }
                    });
                   $('.subcontract_instrument_info').append(html);
                    editab();
                    $.each(arr, function(k,v){
                        if(k!=0){
                            if(v)
                                $(".title_val"+k).show();
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
      var result    =   confirm('Are you sure want to delete?');
      if(result==true){
       $.ajax({
            type: 'POST',
            data:"device_id="+ device_id,
            beforeSend: ni_start(),  
            complete: ni_end(),
            url: path_url+'/Subcontractdos/delete_instrument/',
            success:function(data){
                $('.sales_instrument_remove_'+device_id).fadeOut();
            }
        });
        
        $('.sales_instrument_remove_'+device_id).fadeOut();
      } 
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
                $('#SubcontractdoCustomerId').val(data1.Customer.id);
                $('#val_fax').val(data1.Customer.fax);
                $('#val_phone').val(data1.Customer.phone); 
                $('#val_email').val(data1.Contactpersoninfo.email);
                $('#SalesorderCustomerId').val(data1.Customer.id);
                $('#val_payment_term').val(data1.Paymentterm.paymentterm+' '+ data1.Paymentterm.paymenttype);
                $('#pay_id').val(data1.Paymentterm.id);
                $('#val_instrument_type_id').val(data1.Paymentterm.id);
            }
	});
    });
    $(document).on('click','.approve_subcon',function(){
       var approve_subcon=$(this).attr('id');
       //alert(val_quotationno);
       
       if(window.confirm("Are you sure?")){
       $.ajax({
            type: 'POST',
            data:"id="+approve_subcon,
            beforeSend: ni_start(),  
            complete: ni_end(),
            url: path_url+'Subcontractdos/approve/',
            success: function(data)
            {
                //return false;
                alert("Sub Contract Approval Successful");
               window.location.reload();
            }
            
        });
    }
    else
    {
        return false;
    }
       
   });


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



    });