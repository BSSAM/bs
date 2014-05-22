/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
    
    $(document).on('click','.sales_instrument_id',function(){
        var instrument_id=$(this).attr('id');
        var ins_text=$(this).text();
        $('#val_instrument').val(ins_text);
        $('.ins_error').hide();
        $('#search_instrument').fadeOut();
        $.ajax({
            type: "POST",
            url: path+"salesorders/get_brand_value",
            data: 'instrument_id='+instrument_id,
            cache: false,
            success: function(data)
            {
                parsedata = $.parseJSON(data);
                $.each(parsedata, function(k, v)
                {
                    if('Brand' in v)
                    {
                     $('#val_brand').empty().append('<option value=0>Select Brand</option><option value='+v.Brand.id+'>'+v.Brand.brandname+'</option>');
                    }
                    if('Department' in v)
                    {
                        $('#val_department').val(v.Department.departmentname);
                        $('#sales_department_id').val(v.Department.id);
                    }
                    if('Range' in v)
                    {
                        $('#sales_range').val(v.Range.from_range+'~'+v.Range.to_range+'/unit');
                    }
                });
                
                $('#val_model_no').val(parsedata.CustomerInstrument.model_no);
                $('#SalesorderInstrumentId').val(instrument_id);
                $('#sales_unitprice').val(parsedata.CustomerInstrument.unit_price);
                        
            }
    });
    });
    $(document).on('click','.sales_description_add',function(){
        if($('#val_instrument').val()=='')
        {
            $('.ins_error').addClass('animation-slideDown');
            $('.ins_error').css('color','red');
            $('.ins_error').show();
            return false;
        }
        var customer_id         =   $('#SalesorderCustomerId').val();
        var instrument_id       =   $('#SalesorderInstrumentId').val();
        var instrument_quantity =  $('#sales_quantity').val();
        var instrument_name=$('#val_instrument').val();
        var instrument_modelno=$('#val_model_no').val();
        var instrument_brand=$('#val_brand').val();
        var instrument_range=$('#sales_range').val();
        var instrument_calllocation=$('#sales_calllocation').val();
        var instrument_calltype=$('#sales_calltype').val();
        var instrument_validity=$('#sales_validity').val();
        var instrument_unitprice=$('#sales_unitprice').val();
        var instrument_discount=$('#sales_discount').val();
        var instrument_department=$('#sales_department_id').val();
        var instrument_account=$('#sales_accountservice').val();
        var instrument_title=$('#sales_titles').val();
        $.ajax({
            type: 'POST',
            data:"instrument_validity="+instrument_validity+"&customer_id="+customer_id+"&instrument_id="+instrument_id+"&instrument_quantity="+instrument_quantity+"&instrument_brand="+instrument_brand+"&instrument_modelno="+instrument_modelno+"&instrument_range="+instrument_range+"&instrument_calllocation="+instrument_calllocation+"&instrument_calltype="+instrument_calltype+"&instrument_unitprice="+instrument_unitprice+"&instrument_discount="+instrument_discount+"&instrument_department="+instrument_department+"&instrument_account="+instrument_account+"&instrument_title="+instrument_title,
            url: path+'Salesorders/sales_add_instrument/',
            success: function(data)
            {
               $('.sales_Instrument_info').append('<tr class="sales_instrument_remove_'+data+'">\n\\n\
                                    <td class="text-center">'+data+'</td>\n\
                                    <td class="text-center">'+instrument_name+'</td>\n\\n\
                                    <td class="text-center">'+instrument_modelno+'</td>\n\
                                    <td class="text-center">'+instrument_brand+'</td>\n\\n\
                                    <td class="text-center">'+instrument_range+'</td>\n\\n\\n\
                                    <td class="text-center">'+instrument_calllocation+'</td>\n\
                                    <td class="text-center">'+instrument_calltype+'</td>\n\
                                    <td class="text-center">'+instrument_validity+'</td>\n\
                                    <td class="text-center">'+instrument_unitprice+'</td>\n\\n\
                                    <td class="text-center">'+instrument_account+'</td>\n\
                                    <td class="text-center"><div class="btn-group">\n\
                                    <a data-edit="'+data+'"class="btn btn-xs btn-default sales_instrument_edit" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>\n\
                                    <a data-delete="'+data+'" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger sales_instrument_delete">\n\
                                    <i class="fa fa-times"></i></a></div></td></tr>');
                
                $('#sales_quantity').val(null);
                $('#val_instrument').val(null);
                $('#val_model_no').val(null);
                $('#val_brand').empty().append('<option value="">Select Brand</option>');
                $('#sales_range').val(null);
                $('#sales_unitprice').val(null);
                $('#sales_discount').val(null);
                $('#val_description').val(null);
                $('#sales_validity').val(null);
                 
                
                }
        });
        
   });
   $(document).on('click','.sales_instrument_delete',function(){
      var device_id=$(this).attr('data-delete');
       $.ajax({
            type: 'POST',
            data:"device_id="+ device_id,
            url: path_url+'/Salesorders/delete_instrument/',
            success:function(data){
                $('.sales_instrument_remove_'+device_id).fadeOut();
            }
        });
        
   });
    $(document).on('click','.sales_instrument_edit',function(){
      var edit_device_id=$(this).attr('data-edit');
      $('.sales_update_device').html('<button class="btn btn-sm btn-primary sales_device_update" type="button"><i class="fa fa-plus fa-fw"></i> Update</button>');
       $.ajax({
            type: 'POST',
            data:"edit_device_id="+ edit_device_id,
            url: path_url+'/Salesorders/sales_edit_instrument/',
            success:function(data){
               edit_node=$.parseJSON(data);
               $('#device_id').val(edit_node.Description.id);
               $('#sales_quantity').val(edit_node.Description.sales_quantity);
                $('#val_instrument').val(edit_node.Instrument.name);
                $('#SalesorderCustomerId').val(edit_node.Description.customer_id);
                $('#SalesorderInstrumentId').val(edit_node.Description.id);
                $('#val_model_no').val(edit_node.Description.model_no);
                $('#val_brand').empty().append('<option value="">Select Brand</option><option selected="selected" value="'+edit_node.Brand.id+'">'+edit_node.Brand.brandname+'</option>');
                $('#sales_range').val(edit_node.Description.sales_range);
                
                $('#sales_calllocation').val(edit_node.Description.sales_calllocation);
                $('#sales_calltype').val(edit_node.Description.sales_calltype);
                $('#sales_validity').val(edit_node.Description.sales_validity);
                
                $('#sales_unitprice').val(edit_node.Description.sales_unitprice);
                $('#sales_discount').val(edit_node.Description.sales_discount);
                $('#val_department').val(edit_node.Department.departmentname);
                $('#sales_department_id').val(edit_node.Department.id);
                 
                $('#sales_accountservice').val(edit_node.Description.sales_accountservice);
                $('#sales_titles').val(edit_node.Description.sales_titles);
              
            }
        });
        
   });
   $(document).on('click','.sales_device_update',function(){
       
      if($('#val_instrument').val()=='')
        {
            $('.ins_error').addClass('animation-slideDown');
            $('.ins_error').css('color','red');
            $('.ins_error').show();
            return false;
        }
        $('.sales_update_device').html('<button class="btn btn-sm btn-primary sales_description_add" type="button"><i class="fa fa-plus fa-fw"></i> add</button>');
        var device_id =   $('#device_id').val();
        var customer_id =   $('#SalesorderCustomerId').val();
        var instrument_id   =   $('#SalesorderInstrumentId').val();
        var instrument_quantity =   $('#sales_quantity').val();
        var instrument_name=$('#val_instrument').val();
        var instrument_modelno=$('#val_model_no').val();
        var instrument_brand=$('#val_brand').val();
        var instrument_range=$('#sales_range').val();
        var instrument_calllocation=$('#sales_calllocation').val();
        var instrument_calltype=$('#sales_calltype').val();
        var instrument_validity=$('#sales_validity').val();
        var instrument_unitprice=$('#sales_unitprice').val();
        var instrument_discount=$('#sales_discount').val();
        var instrument_department=$('#sales_department_id').val();
        var instrument_account=$('#sales_accountservice').val();
        var instrument_title=$('#sales_titles').val();
        $.ajax({
            type: 'POST',
            data:"device_id="+device_id+"&instrument_validity="+instrument_validity+"&customer_id="+customer_id+"&instrument_id="+instrument_id+"&instrument_quantity="+instrument_quantity+"&instrument_brand="+instrument_brand+"&instrument_modelno="+instrument_modelno+"&instrument_range="+instrument_range+"&instrument_calllocation="+instrument_calllocation+"&instrument_calltype="+instrument_calltype+"&instrument_unitprice="+instrument_unitprice+"&instrument_discount="+instrument_discount+"&instrument_department="+instrument_department+"&instrument_account="+instrument_account+"&instrument_title="+instrument_title,
            url: path+'Salesorders/update_instrument/',
            success: function(data)
            {
               $('.sales_instrument_remove_'+device_id).remove();
               $('.sales_Instrument_info').append('<tr class="sales_instrument_remove_'+device_id+'">\n\\n\
                                    <td class="text-center">'+device_id+'</td>\n\
                                    <td class="text-center">'+instrument_name+'</td>\n\\n\
                                    <td class="text-center">'+instrument_modelno+'</td>\n\
                                    <td class="text-center">'+instrument_brand+'</td>\n\\n\
                                    <td class="text-center">'+instrument_range+'</td>\n\\n\\n\
                                    <td class="text-center">'+instrument_calllocation+'</td>\n\
                                    <td class="text-center">'+instrument_calltype+'</td>\n\
                                    <td class="text-center">'+instrument_validity+'</td>\n\
                                    <td class="text-center">'+instrument_unitprice+'</td>\n\\n\
                                    <td class="text-center">'+instrument_account+'</td>\n\
                                    <td class="text-center"><div class="btn-group">\n\
                                    <a data-edit="'+device_id+'"class="btn btn-xs btn-default sales_instrument_edit" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>\n\
                                    <a data-delete="'+device_id+'" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger sales_instrument_delete">\n\
                                    <i class="fa fa-times"></i></a></div></td></tr>');
                
                $('#sales_quantity').val(null);
                $('#val_instrument').val(null);
                $('#val_model_no').val(null);
                $('#val_brand').empty().append('<option value="">Select Brand</option>');
                $('#sales_range').val(null);
                $('#sales_unitprice').val(null);
                $('#sales_discount').val(null);
                $('#val_description').val(null);
                 $('#sales_validity').val(null);
                 $('#device_id').val();
                 
                }
        });
        
   });
  

})

