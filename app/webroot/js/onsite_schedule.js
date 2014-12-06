/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){
    
    /**********************Customer Search For Quotation Module*****************************************************************************/
    $("#result").hide();
    $("#val_customer").keyup(function() 
    { 
        var customer = $(this).val();
        var dataString = 'name='+ customer;
        if(customer!='')
        {
            $.ajax({
            type: "POST",
            url: path_url+"/Onsites/search",
            data: dataString,
            cache: false,
            success: function(html)
            {
                $("#result").html(html).show();
            }
            });
        }
    });
    
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
            beforeSend: ni_start(),  
            complete: ni_end(),
            cache: false,
            success: function(data)
            {
                if(data!='failure')
                {
                    try {
                        var onsite_node = $.parseJSON(data);
                    } 
                    catch (e) {
                    // error
                    return;
                    }
                    
                    var customer_address_node   =   onsite_node.Customer.Address;
                    var contact_person_node   =   onsite_node.Contactpersoninfo;
                    $('#quotation_id').val(onsite_node.Quotation.id);
                    $('#quotationno').val(onsite_node.Quotation.quotationno);
                    $('#customer_id').val(onsite_node.Customer.id);
                    $('#onsite_customer').val(onsite_node.Customer.customername);
                    $.each(customer_address_node,function(k,v){
                        if(v.type=='registered'){
                             $('#val_address').val(v.address);
                        }
                    });
                    $('#val_attn').val(contact_person_node.name);
                    $('#val_email').val(contact_person_node.email);
                    
                    $('#onsite_customer').val(onsite_node.Customer.customername);
                    $('#val_fax').val(onsite_node.Customer.fax);
                  
                    $('#val_phone').val(onsite_node.Quotation.phone);                
                    $('.onsite_instrument_node').empty();
                       $.each(onsite_node.OnsiteInstrument,function(key,value){  
                        if(onsite_node.OnsiteInstrument.length===0)
                        {
                            $('.onsite_instrument_node .dataTables_empty').hide();
                            $('.onsite_instrument_node').html('No Records Found');
                        }
                        else
                        {
                            $('.onsite_instrument_node .dataTables_empty').hide();
                            $('.onsite_instrument_node').append('\n\
                                    <tr class="tr_color onsite_instrument_remove_'+value.OnsiteInstrument.id+'">\n\\n\
                                    <td class="text-center">'+value.OnsiteInstrument.id+'</td>\n\
                                    <td class="text-center">'+value.Instrument.name+'</td>\n\\n\\n\
                                    <td class="text-center">'+value.OnsiteInstrument.model_no+'</td>\n\
                                    <td class="text-center">'+value.OnsiteInstrument.onsite_calllocation+'</td>\n\\n\
                                    <td class="text-center">'+value.OnsiteInstrument.onsite_calltype+'</td>\n\
                                    <td class="text-center">'+value.OnsiteInstrument.onsite_validity+'</td>\n\
                                    <td class="text-center">'+value.OnsiteInstrument.onsite_unitprice+'</td>\n\\n\
                                    <td class="text-center">'+value.OnsiteInstrument.department+'</td>\n\\n\
                                    <td class="text-center">'+value.OnsiteInstrument.onsite_total+'</td>\n\
                                    <td class="text-center"><div class="btn-group">\n\
                                    <a data-edit="'+value.OnsiteInstrument.id+'"class="btn btn-xs btn-default onsite_instrument_edit" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>\n\
                                    <a data-delete="'+value.OnsiteInstrument.id+'" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger onsite_instrument_delete">\n\
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
                alert('Sorry ! Unable to fetch details');
                return false;
            }
	});
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
            beforeSend: ni_start(),  
            complete: ni_end(),
            data: 'engineer_name='+engineer_name+'&engineer_email='+engineer_email+'&onsiteschedule_no='+onsiteschedule_no,
            cache: false,
            success: function(data)
            {
                if(data!=''){
                     $('.engineer_info .dataTables_empty').hide();
                      $('.engineer_info').append('\n\
                                    <tr class="tr_color engineer_remove_'+data+' '+engineer_email+'">\n\\n\
                                    <td class="text-center">'+data+'</td>\n\
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
            beforeSend: ni_start(),  
            complete: ni_end(),
            success:function(data){
                if(data==1){
                $('.engineer_remove_'+eng_id).fadeOut();
                
                }
            }
        });
    }
   });
   /*******************************Quotation Instrument Details Add Script*******************************************/
    $(document).on('click','.onsite_description_add',function(){
       
        if($('#onsite_customer').val()!='')
        {
            if($('#onsite_description').val()=='')
            {
                $('.ins_error').addClass('animation-slideDown');
                $('.ins_error').css('color','red');
                $('.ins_error').show();
                return false;
            }
            else if($('#onsite_quantity').val()=='')
            {
                $('.insqn_error').addClass('animation-slideDown');
                $('.insqn_error').css('color','red');
                $('.insqn_error').show();
                return false;
            }
            else if($('#onsite_model_no').val()=='')
            {
                $('.insmo_error').addClass('animation-slideDown');
                $('.insmo_error').css('color','red');
                $('.insmo_error').show();
                return false;
            }
            else if($('#onsite_brand').val()=='')
            {
                $('.insbr_error').addClass('animation-slideDown');
                $('.insbr_error').css('color','red');
                $('.insbr_error').show();
                return false;
            }
            else if($('#onsite_range').val()=='')
            {
                $('.insra_error').addClass('animation-slideDown');
                $('.insra_error').css('color','red');
                $('.insra_error').show();
                return false;
            }
            else if($('#onsite_call_location').val()=='')
            {
                $('.inscal_error').addClass('animation-slideDown');
                $('.inscal_error').css('color','red');
                $('.inscal_error').show();
                return false;
            }
            else if($('#onsite_account_service').val()=='')
            {
                $('.insser_error').addClass('animation-slideDown');
                $('.insser_error').css('color','red');
                $('.insser_error').show();
                return false;
            }
            else
            {
                $('.ins_error').empty();
                $('.insqn_error').empty();
                $('.insmo_error').empty();

            }
        }
        else
        {
            $('.inscus_error').addClass('animation-slideDown');
            $('.inscus_error').css('color','red');
            $('.inscus_error').show();
            return false;
        }
        var customer_id =   $('#customer_id').val();
        var quotation_id =   $('#quotation_id').val();
        var quotation_no =   $('#quotationno').val();
        var instrument_id   =   $('#OnsiteInstrumentId').val();
        var instrument_quantity =   $('#onsite_quantity').val();
        var instrument_name=$('#onsite_description').val();
        var instrument_modelno=$('#onsite_model_no').val();
        var instrument_brand=$('#onsite_brand').val();
        var instrument_range=$('#onsite_range').val();
        var instrument_calllocation=$('#onsite_call_location').val();
        var instrument_calltype=$('#onsite_call_type').val();
        var instrument_validity=$('#onsite_validity').val();
        var instrument_unitprice=$('#onsite_unit_price').val();
        var instrument_discount=$('#onsite_discount').val();
        var instrument_cal=instrument_unitprice*instrument_discount/100;
        var instrument_total= instrument_unitprice - instrument_cal;
        
        var instrument_department=$('#onsite_department').val();
        var instrument_account=$('#onsite_account_service').val();
        var instrument_title=$('#onsite_title').val();
        
        for ( var i = 1; i <= instrument_quantity; i++ ){
        $.ajax({
            type: 'POST',
            data:"instrument_validity="+instrument_validity+"&customer_id="+customer_id+"&instrument_id="+instrument_id+"&instrument_quantity="+instrument_quantity+"&instrument_brand="+instrument_brand+"&instrument_modelno="+instrument_modelno+"&instrument_range="+instrument_range+"&instrument_calllocation="+instrument_calllocation+"&instrument_calltype="+instrument_calltype+"&instrument_unitprice="+instrument_unitprice+"&instrument_discount="+instrument_discount+"&instrument_department="+instrument_department+"&instrument_account="+instrument_account+"&instrument_title="+instrument_title+"&instrument_total="+instrument_total+"&quotationid="+quotation_id+"&quotationno="+quotation_no,
            url: path+'Onsites/add_instrument/',
            beforeSend: ni_start(),  
            complete: ni_end(),
            success: function(data)
            {
               $('.onsite_instrument_node').append('<tr class="onsite_instrument_remove_'+data+'">\n\\n\
                                    <td class="text-center">'+data+'</td>\n\
                                    <td class="text-center">'+instrument_name+'</td>\n\\n\
                                    <td class="text-center">'+instrument_modelno+'</td>\n\
                                    <td class="text-center">'+instrument_calllocation+'</td>\n\
                                    <td class="text-center">'+instrument_calltype+'</td>\n\
                                    <td class="text-center">'+instrument_validity+'</td>\n\
                                    <td class="text-center">'+instrument_unitprice+'</td>\n\\n\
                                    <td class="text-center">'+instrument_department+'</td>\n\
                                    <td class="text-center">'+instrument_total+'</td>\n\\n\
                                    <td class="text-center"><div class="btn-group">\n\
                                    <a data-edit="'+data+'"class="btn btn-xs btn-default onsite_instrument_edit" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>\n\
                                    <a data-delete="'+data+'" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger onsite_instrument_delete">\n\
                                    <i class="fa fa-times"></i></a></div></td></tr>');
                $(".dataTables_empty").hide();
                
                
                $('#onsite_quantity').val(null);
                $('#onsite_description').val(null);
                $('#onsite_model_no').val(null);
                $('#onsite_brand').empty().append('<option value="">Select Brand</option>');
                $('#onsite_range').empty().append('<option value="">Select Range</option>');
                $('#onsite_unit_price').val(null);
                $('#onsite_discount').val(null);
                $('#onsite_description').val(null);
                }
        });
    }
   });
     /********************************************Onsite Instrument search Id Select Script************************************************/
    $(document).on('click','.onsite_instrument_id',function(){
        var instrument_id=$(this).attr('id');
        var customer_id =   $('#customer_id').val();
        var ins_text=$(this).text();
        $('#val_description').val(ins_text);
        $('.ins_error').hide();
        $('#search_instrument').fadeOut();
        $.ajax({
            type: "POST",
            url: path_url+"Onsites/get_brand_value",
            data: 'instrument_id='+instrument_id+'&customer_id='+customer_id,
            beforeSend: ni_start(),  
            complete: ni_end(),
            cache: false,
            
            success: function(data)
            {
                try {
                    parsedata = $.parseJSON(data);
                } catch (e) {
                // error
                    return;
                }
                var dept    =   parsedata.Instrument;
                $('#val_brand').empty().append('<option value="">Select Brand Name</option>');
//                $('#val_range').empty().append('<option value="">Select Range</option>');
                $.each(parsedata.Instrument.InstrumentBrand, function(k, v)
                {
                     $('#val_brand').append('<option value='+v.Brand.id+'>'+v.Brand.brandname+'</option>');
                });
                
//                $.each(parsedata.Instrument.InstrumentRange, function(k, v)
//                {
//                     $('#val_range').append('<option value='+v.Range.id+'>'+v.Range.range_name+'</option>');
//                });
                    
                $('#val_department').val(dept.Department.departmentname);
                
                $('#val_department_id').val(dept.Department.id);
                //$('#val_model_no').val(parsedata.CustomerInstrument.model_no);
                $('#OnsiteInstrumentId').val(instrument_id);
//                var dept    =   parsedata.Instrument;
//                $('#onsite_brand').empty().append('<option value="">Select Brand Name</option>');
//                $('#onsite_range').empty().append('<option value="">Select Range</option>');
//                $.each(parsedata.Instrument.InstrumentBrand, function(k, v)
//                {
//                     $('#onsite_brand').append('<option value='+v.Brand.id+'>'+v.Brand.brandname+'</option>');
//                });
//                $.each(parsedata.Instrument.InstrumentRange, function(k, v)
//                {
//                     $('#onsite_range').append('<option value='+v.Range.id+'>'+v.Range.range_name+'</option>');
//                });
//                    
//                $('#onsite_department').val(dept.Department.departmentname);
//                $('#onsite_department_id').val(dept.Department.id);
//                $('#onsite_model_no').val(parsedata.CustomerInstrument.model_no);
//                $('#OnsiteInstrumentId').val(instrument_id);
//                $('#onsite_unit_price').val(parsedata.CustomerInstrument.unit_price);
            }
        });
    });
    ////////////// Model No Quick Search(Auto Complete)//////////////////// 
    $(document).on('click','.customerins1_id',function(){
        var instrument_id=$(this).attr('id');
        var customer_id =   $('#customer_id').val();
        var model_no=$(this).text();
        $('#val_model_no').val(model_no);
        $('.ins_error').hide();
        $('#search_cusinstrument').fadeOut();
        $.ajax({
            type: "POST",
            url: path_url+"Onsites/get_range_value",
            data: 'instrument_id='+instrument_id+'&customer_id='+customer_id,
            cache: false,
            
            success: function(data)
            {
		try {
                    parsedata = $.parseJSON(data);
                }   
                catch (e) {
                    // error
                     return;
                }
                 //alert(parsedata.range_name);
                //console.log(parsedata);
                //return false;
                //var dept    =   parsedata.CustomerInstrument;
                
                $('#val_range').empty().append('<option value="">Select Range</option>');
                                
                $.each(parsedata, function(k, v)
                {
                     $('#val_range').append('<option value='+v.Range.id+'>'+v.Range.range_name+'</option>');
                     $('#val_unit_price').val(v.CustomerInstrument.unit_price);
                });
                 
            }
    });
    });
    /*******************Onsite Instrument edit************************/
     $(document).on('click','.onsite_instrument_edit',function(){
      var edit_device_id=$(this).attr('data-edit');
      $('.onsite_update_device').html('<button class="btn btn-sm btn-primary onsite_device_update" type="button"><i class="fa fa-plus fa-fw"></i> Update</button>');
       $.ajax({
            type: 'POST',
            data:"edit_device_id="+ edit_device_id,
            beforeSend: ni_start(),  
            complete: ni_end(),
            url: path_url+'/Onsites/edit_instrument/',
            
            success:function(data){
				try {
edit_node=$.parseJSON(data);
  } catch (e) {
    // error
    return;
  }
               
                $('#onsite_description').attr('readonly','readonly');
                $('#onsite_quantity').attr('readonly','readonly');
                $('#device_id').val(edit_node.OnsiteInstrument.id);
                $('#onsite_quantity').val(edit_node.OnsiteInstrument.onsite_quantity);
                $('#onsite_description').val(edit_node.Instrument.name);
                $('#OnsiteInstrumentId').val(edit_node.Instrument.id);
                $('#customer_id').val(edit_node.OnsiteInstrument.customer_id);
                $('#onsite_model_no').val(edit_node.OnsiteInstrument.model_no);
                $('#onsite_brand').empty().append('<option value="">Select Brand</option><option selected="selected" value="'+edit_node.Brand.id+'">'+edit_node.Brand.brandname+'</option>');
                $('#onsite_range').empty().append('<option value="">Select Range</option><option selected="selected" value="'+edit_node.Range.id+'">'+edit_node.Range.range_name+'</option>');
                               
                $('#onsite_call_location').val(edit_node.OnsiteInstrument.onsite_calllocation);
                //alert(edit_node.Device.call_type);
                $('#onsite_call_type').val(edit_node.OnsiteInstrument.onsite_calltype);
                //$('#val_call_type').empty().append('<option value="">Select Call Type</option><option selected="selected" value="'+edit_node.Device.call_type+'">'+edit_node.Device.call_type+'</option>');
                //alert($('#val_call_type').val);
                $('#onsite_validity').val(edit_node.OnsiteInstrument.onsite_validity);
                
                $('#onsite_unit_price').val(edit_node.OnsiteInstrument.onsite_unitprice);
                $('#onsite_discount').val(edit_node.OnsiteInstrument.onsite_discount);
                $('#onsite_department').val(edit_node.OnsiteInstrument.department);
                
                $('#onsite_account_service').val(edit_node.OnsiteInstrument.onsite_accountservice);
                $('#onsite_title').val(edit_node.OnsiteInstrument.onsite_titles);
              
            }
        });
        
   });
   /***********************************Instrument Device Update Script***********************************************/
    $(document).on('click','.onsite_device_update',function(){
       
      if($('#onsite_description').val()=='')
        {
            $('.ins_error').addClass('animation-slideDown');
            $('.ins_error').css('color','red');
            $('.ins_error').show();
            return false;
        }
        $('#onsite_description').removeAttr('readonly');
        $('#onsite_quantity').removeAttr('readonly');
        $('.onsite_update_device').html('<button class="btn btn-sm btn-primary onsite_description_add" type="button"><i class="fa fa-plus fa-fw"></i> add</button>');
        var customer_id =   $('#customer_id').val();
        var quotation_id =   $('#quotation_id').val();
        var quotation_no =   $('#quotationno').val();
        var instrument_id   =   $('#OnsiteInstrumentId').val();
        var instrument_quantity =   $('#onsite_quantity').val();
        var instrument_name=$('#onsite_description').val();
        var instrument_modelno=$('#onsite_model_no').val();
        var instrument_brand=$('#onsite_brand').val();
        var instrument_range=$('#onsite_range').val();
        var instrument_calllocation=$('#onsite_call_location').val();
        var instrument_calltype=$('#onsite_call_type').val();
        var instrument_validity=$('#onsite_validity').val();
        var instrument_unitprice=$('#onsite_unit_price').val();
        var instrument_discount=$('#onsite_discount').val();
       
        var instrument_cal=instrument_unitprice*instrument_discount/100;
       
        var instrument_total= instrument_unitprice - instrument_cal ;
        var instrument_department=$('#onsite_department').val();
        var instrument_account=$('#onsite_account_service').val();
        var instrument_title=$('#onsite_title').val();
        $.ajax({
            type: 'POST',
            data:"instrument_validity="+instrument_validity+"&customer_id="+customer_id+"&instrument_id="+instrument_id+"&instrument_quantity="+instrument_quantity+"&instrument_brand="+instrument_brand+"&instrument_modelno="+instrument_modelno+"&instrument_range="+instrument_range+"&instrument_calllocation="+instrument_calllocation+"&instrument_calltype="+instrument_calltype+"&instrument_unitprice="+instrument_unitprice+"&instrument_discount="+instrument_discount+"&instrument_department="+instrument_department+"&instrument_account="+instrument_account+"&instrument_title="+instrument_title+"&instrument_total="+instrument_total+"&quotationid="+quotation_id+"&quotationno="+quotation_no,
            beforeSend: ni_start(),  
            complete: ni_end(),
            url: path+'Onsites/update_instrument/',
            success: function(data)
            {
               $('.onsite_instrument_remove_'+instrument_id).remove();
               $('.onsite_instrument_node').append('<tr class="onsite_instrument_remove_'+instrument_id+'">\n\\n\
                                    <td class="text-center">'+instrument_id+'</td>\n\
                                    <td class="text-center">'+instrument_name+'</td>\n\\n\
                                    <td class="text-center">'+instrument_modelno+'</td>\n\
                                    <td class="text-center">'+instrument_calllocation+'</td>\n\
                                    <td class="text-center">'+instrument_calltype+'</td>\n\
                                    <td class="text-center">'+instrument_validity+'</td>\n\
                                    <td class="text-center">'+instrument_unitprice+'</td>\n\\n\
                                    <td class="text-center">'+instrument_department+'</td>\n\\n\
                                    <td class="text-center">'+instrument_total+'</td>\n\\n\
                                    <td class="text-center"><div class="btn-group">\n\
                                    <a data-edit="'+instrument_id+'"class="btn btn-xs btn-default onsite_instrument_edit" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>\n\
                                    <a data-delete="'+instrument_id+'" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger onsite_instrument_delete">\n\
                                    <i class="fa fa-times"></i></a></div></td></tr>');
                $(".dataTables_empty").hide();
                $('#onsite_quantity').val(null);
                $('#onsite_description').val(null);
                $('#onsite_model_no').val(null);
                $('#onsite_department').val(null);
                $('#onsite_brand').empty().append('<option value="">Select Brand</option>');
                $('#onsite_range').empty().append('<option value="">Select Range</option>');;
                $('#onsite_unit_price').val(null);
                $('#onsite_discount').val('');
                $('#onsite_description').val(null);
                }
        });
        
   });
   /*******************************Edit Devices for Quotation Devices Script******************************************/
    $(document).on('click','.onsite_instrument_delete',function(){
      var device_id=$(this).attr('data-delete');
      var result    =   confirm('Are you sure want to delete?');
      if(result==true){
       $.ajax({
            type: 'POST',
            data:"device_id="+ device_id,
            url: path+'/Onsites/delete_instrument/',
            beforeSend: ni_start(),  
            complete: ni_end(),
            success:function(data){
                $('.onsite_instrument_remove_'+device_id).fadeOut();
            }
        });
    }
   });
   
});
