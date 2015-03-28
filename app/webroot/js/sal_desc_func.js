 /* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
    $('#sales_quantity').keypress(function(){
        $('#sales_quantity').css('border','1px solid #DBE1E8');
    });
    $(document).on('click','.sales_instrument_id',function(){
        var instrument_id=$(this).attr('id');
        var customer_id =   $('#SalesorderCustomerId').val();
        var ins_text=$(this).text();
        $('#val_instrument').val(ins_text);
        $('.ins_error').hide();
        $('#search_instrument').fadeOut();
        $.ajax({
            type: "POST",
            url: path+"salesorders/get_brand_value",
            data: 'instrument_id='+instrument_id+'&customer_id='+customer_id,
            cache: false,
            success: function(data)
            {
                try {
                    parsedata = $.parseJSON(data);
                } catch (e) {
                // error
                return;
                }

                //console.log(parsedata);
                var dept    =   parsedata.Instrument;
                $('#val_brand').empty().append('<option value="">Select Brand Name</option>');
    //                $('#sales_range').empty().append('<option value="">Select Range</option>');
                $.each(parsedata.Instrument.InstrumentBrand, function(k, v)
                {
                     $('#val_brand').append('<option value='+v.Brand.id+'>'+v.Brand.brandname+'</option>');
                });

    //                $.each(parsedata.Instrument.InstrumentRange, function(k, v)
    //                {
    //                     $('#sales_range').append('<option value='+v.Range.id+'>'+v.Range.range_name+'</option>');
    //                });
                $('#sales_department_id').val(dept.Department.id);
                $('#val_department').val(dept.Department.departmentname);
    //                $('#val_model_no').val(parsedata.CustomerInstrument.model_no);
                $('#SalesorderInstrumentId').val(instrument_id);
                $('#sales_unitprice').val(parsedata.CustomerInstrument.unit_price);
                $('#val_brand').trigger('chosen:updated');
            }
        });
    });
    $(document).on('click','.customerins_id',function(){
        var instrument_id=$(this).attr('id');
        var customer_id =   $('#SalesorderCustomerId').val();
        var model_no=$(this).text();
        $('#val_model_no').val(model_no);
        $('.ins_error').hide();
        $('#search_cusinstrument').fadeOut();
        $.ajax({
            type: "POST",
            url: path+"Salesorders/get_range_value",
            data: 'instrument_id='+instrument_id+'&customer_id='+customer_id,
            cache: false,
            
            success: function(data)
            {
                try {
parsedata = $.parseJSON(data);
  } catch (e) {
    // error
    return;
  }
                
                //alert(parsedata.range_name);
                //console.log(parsedata);
                //return false;
                //var dept    =   parsedata.CustomerInstrument;
                
                $('#sales_range').empty().append('<option value="">Select Range</option>');
                                
                $.each(parsedata, function(k, v)
                {
                     $('#sales_range').append('<option value='+v.Range.id+'>'+v.Range.range_name+'</option>');
                     $('#sales_unitprice').val(v.CustomerInstrument.unit_price);
                });
                $('#sales_range').trigger('chosen:updated');
                 
            }
    });
    });
     /**************************For Sales order Brand Change*************************************/
    $('.brand_error').hide();
    $('#val_brand').change(function(){
       if($(this).val()=='0')
       {
            $('.brand_error').addClass('animation-slideDown');
            $('.brand_error').css('color','red');
            $('.brand_error').show();
            return false;
       }
       else
       {
            $('.brand_error').hide();
       }
    });
    
    /**************************For Sales order Description add*************************************/
    
//    $(document).on('click','.sales_description_add',function(){
//        if($('#val_instrument').val()=='0')
//        {
//            $('.ins_error').addClass('animation-slideDown');
//            $('.ins_error').css('color','red');
//            $('.ins_error').show();
//            return false;
//        }
//        if($('#val_brand').val()=='')
//        {
//            $('.brand_error').addClass('animation-slideDown');
//            $('.brand_error').css('color','red');
//            $('.brand_error').show();
//            return false;
//        }
//        if($('#sales_quantity').val()=='')
//        {
//            $('#sales_quantity').css('border','1px solid red');
//            return false;
//        }
//        var salesorder_no   =   $('#val_salesorderno').val();
//        var instrument_quantity =  $('#sales_quantity').val();
//        var customer_id         =   $('#SalesorderCustomerId').val();
//        var instrument_id       =   $('#SalesorderInstrumentId').val();
//       
//        var instrument_name=$('#val_instrument').val();
//        var instrument_modelno=$('#val_model_no').val();
//        var instrument_brand=$('#val_brand').val();
//        var instrument_range=$('#sales_range').val();
//        var instrument_calllocation=$('#sales_calllocation').val();
//        var instrument_calltype=$('#sales_calltype').val();
//        var instrument_validity=$('#sales_validity').val();
//        var instrument_unitprice=$('#sales_unitprice').val();
//        var instrument_discount=$('#sales_discount').val();
//        var instrument_department=$('#sales_department_id').val();
//        var instrument_account=$('#sales_accountservice').val();
//        var instrument_title=$('#sales_titles').val();
//        var instrument_cal=instrument_unitprice*instrument_discount/100;
//        var instrument_total=instrument_unitprice - instrument_cal ;
//        
//        for ( var i = 1; i <= instrument_quantity; i++ ){
//        $.ajax({
//            type: 'POST',
//            data:"instrument_validity="+instrument_validity+"&customer_id="+customer_id+"&instrument_id="+instrument_id+"&instrument_quantity="+instrument_quantity+"&instrument_brand="+instrument_brand+"&instrument_modelno="+instrument_modelno+"&instrument_range="+instrument_range+"&instrument_calllocation="+instrument_calllocation+"&instrument_calltype="+instrument_calltype+"&instrument_unitprice="+instrument_unitprice+"&instrument_discount="+instrument_discount+"&instrument_department="+instrument_department+"&instrument_account="+instrument_account+"&instrument_title="+instrument_title+"&instrument_total="+instrument_total+"&salesorder_id="+salesorder_no,
//            url: path+'Salesorders/sales_add_instrument/',
//            success: function(data)
//            {
//				 try {
//data_edit_node  =   $.parseJSON(data);
//  } catch (e) {
//    // error
//    return;
//  }
//                
//                
//               $('.sales_Instrument_info').append('<tr class="tr_color sales_instrument_remove_'+data_edit_node.Description.id+'">\n\\n\
//                                    <td class="text-center">'+data_edit_node.Description.id+'</td>\n\
//                                    <td class="text-center">'+data_edit_node.Instrument.name+'</td>\n\\n\
//                                    <td class="text-center">'+data_edit_node.Brand.brandname+'</td>\n\\n\
//                                    <td class="text-center">'+data_edit_node.Description.sales_calllocation+'</td>\n\
//                                     <td class="text-center">'+data_edit_node.Description.sales_validity+'</td>\n\
//                                    <td class="text-center">'+data_edit_node.Description.sales_unitprice+'</td>\n\\n\
//                                    <td class="text-center">'+data_edit_node.Department.departmentname+'</td>\n\\n\
//                                    <td class="text-center">'+data_edit_node.Description.sales_total+'</td>\n\
//                                    <td class="text-center"><div class="btn-group">\n\
//                                    <a data-edit="'+data_edit_node.Description.id+'"class="btn btn-xs btn-default sales_instrument_edit" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>\n\
//                                    <a data-delete="'+data_edit_node.Description.id+'" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger sales_instrument_delete">\n\
//                                    <i class="fa fa-times"></i></a></div></td></tr>');
//                
//                $('#sales_quantity').val(null);
//                $('#val_instrument').val(null);
//                $('#val_model_no').val(null);
//                $('#val_brand').empty().append('<option value="">Select Brand</option>');
//                $('#sales_range').val(null);
//                $('#sales_unitprice').val(null);
//                $('#sales_discount').val(null);
//                $('#val_description').val(null);
//                }
//        });
//    }
//   });
   
   
   /***************************For Instrument Delete script on Salesorder***********************/
   $(document).on('click','.sales_instrument_delete',function(){
      var device_id=$(this).attr('data-delete');
      var confirm   =   window.confirm('Do you want to delete?');
      if(confirm==true){
       $.ajax({
            type: 'POST',
            data:"device_id="+ device_id,
            url: path_url+'/Salesorders/delete_instrument/',
            success:function(data){
                $('.sales_instrument_remove_'+device_id).fadeOut();
            }
        });
    }
   });
   /*****************************Salesorder by Quotation Edit******************************/
    $(document).on('click','.sales_instrument_edit',function(){
      var edit_device_id=$(this).attr('data-edit');
      $('.tr_color').css('background-color','none');
      $(this).parent().parent().parent().css('background-color','#EAEDF1');
//      $('.sales_instrument_remove_'+edit_device_id).css('background-color','#EAEDF1');
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
                $('#SalesorderInstrumentId').val(edit_node.Instrument.id);
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
                $('#sales_range').trigger('chosen:updated');
                $('#val_brand').trigger('chosen:updated');
              
            }
        });
        
   });
   
   /*************** Sales Order By Quotation **************************/
   
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
        var instrument_cal=instrument_unitprice*instrument_discount/100;
        var instrument_total=instrument_unitprice - instrument_cal ;
        $.ajax({
            type: 'POST',
            data:"device_id="+device_id+"&instrument_validity="+instrument_validity+"&customer_id="+customer_id+"&instrument_id="+instrument_id+"&instrument_quantity="+instrument_quantity+"&instrument_brand="+instrument_brand+"&instrument_modelno="+instrument_modelno+"&instrument_range="+instrument_range+"&instrument_calllocation="+instrument_calllocation+"&instrument_calltype="+instrument_calltype+"&instrument_unitprice="+instrument_unitprice+"&instrument_discount="+instrument_discount+"&instrument_department="+instrument_department+"&instrument_account="+instrument_account+"&instrument_title="+instrument_title+"&instrument_total="+instrument_total,
            url: path+'Salesorders/update_instrument/',
            success: function(data)
            {
                data_edit_node  =   $.parseJSON(data);
               $('.sales_instrument_remove_'+device_id).remove();
               $('.sales_Instrument_info').append('<tr class="sales_instrument_remove_'+device_id+'">\n\\n\
                                    <td class="text-center">'+device_id+'</td>\n\
                                    <td class="text-center">'+data_edit_node.Instrument.name+'</td>\n\\n\
                                    <td class="text-center">'+data_edit_node.Brand.brandname+'</td>\n\\n\
                                    <td class="text-center">'+data_edit_node.Description.sales_calllocation+'</td>\n\
                                     <td class="text-center">'+data_edit_node.Description.sales_validity+'</td>\n\
                                    <td class="text-center">'+data_edit_node.Description.sales_unitprice+'</td>\n\\n\
                                    <td class="text-center">'+data_edit_node.Department.departmentname+'</td>\n\\n\
                                    <td class="text-center">'+data_edit_node.Description.sales_total+'</td>\n\
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
                $('#device_id').val();
                }
        });
   });
   
   
   /************************For Sales order Approval Script*********************************/
   $(document).on('click','.approve_salesorder',function(){
       var val_salesorderno=$('#val_salesorderno').val();
       if(window.confirm("Are you sure?")){
       $.ajax({
            type: 'POST',
            data:"id="+val_salesorderno,
            url: path+'Salesorders/approve/',
            success: function(data)
            {
                if(data == "failure")
                {
                    alert("Quotation Approval Needed for Salesorder Approval");
                }
                else
                {
                    alert("Salesorder Approval Successful");
                    window.location.reload();
                }
            }
            
        });
    }
    else
    {
        return false;
    }
       
   });
    /************************quotation id paste on input box*********************************/
   $(document).on('click','.quotation_single',function(){
        var quote_id=$(this).text();
        $('#SalesorderQuotationId').val(quote_id);
        $('#ReqpurchaseorderPrequistionId').val(quote_id);
        $('#quoat_list').fadeOut();
    });
   /************************For Sales order Approval End*********************************/
    
    $('#SalesorderQuotationId').blur(function(){
        $(this).val('');
         $('#quoat_list').fadeOut();
    });
    /****************Salesorder index page Quotation count Search*********************/
     $('.quotation_search').click(function(){
        var quotation_single_id =   $('#SalesorderQuotationId').val();
        
       $.ajax({
          type:'POST',
          url:path_url+'Salesorders/check_quotation_count',
          data:'single_quote_id='+quotation_single_id,
          success:function(data){
              if(data=='success')
              {
                $('#SalesorderSalesorderByQuotationForm').submit();
              }
              if(data=='failure')
              {
                   $('#SalesorderQuotationId').css('border','1px solid red');
                   return false;
              }
          }
       });
       
    });
    /********************************Salesorder uploaded documents delete from edit file*******************************/
    $(document).on('click','.sales_document_delete',function(){
       var salesorder_id   =   $(this).attr('data-salesorder_id');
       var document_id     =   $(this).attr('data-id');
       var doc_name   =   $(this).attr('data-name');
       var doc_org_name   =   $(this).attr('data-org_name');
       var con  =   window.confirm('Do you want to delete '+doc_name+ '?');
       if(con==true)
       {
            $.ajax({
              type:'POST',
              url:path_url+'Salesorders/remove_salesdocument',
              data:'doc_id='+document_id+'&salesorder_id='+salesorder_id+'&doc_org_name='+doc_org_name,
              success:function(data){
                if(data=='Success')
                {
                    $('.document_'+document_id).fadeOut();
                }
              }
            });
       }
       
    });
    
    
    
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /*****************************Salesorder by Quotation Edit******************************/
    $(document).on('click','.sales_instrument_by_quotation_edit',function(){
     
      var pending=$('#pending').val();
    
if(pending == 1)
    {
        var edit_device_id=$(this).attr('data-edit');
      $('.tr_color').css('background-color','none');
      $(this).parent().parent().parent().css('background-color','#EAEDF1');
//      $('.sales_instrument_remove_'+edit_device_id).css('background-color','#EAEDF1');
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
                $('#SalesorderInstrumentId').val(edit_node.Instrument.id);
                $('#val_model_no').val(edit_node.Description.model_no);
                $('#val_brand').empty().append('<option value="">Select Brand</option><option selected="selected" value="'+edit_node.Brand.id+'">'+edit_node.Brand.brandname+'</option>');
                $('#sales_range').empty().append('<option value="">Select Range</option><option selected="selected" value="'+edit_node.Range.id+'">'+edit_node.Range.range_name+'</option>');
                //$('#sales_range').val(edit_node.Description.sales_range);
                $('#sales_range').trigger('chosen:updated');
                        $('#val_brand').trigger('chosen:updated');
                $('#sales_calllocation').val(edit_node.Description.sales_calllocation);
                $('#sales_calltype').empty().append('<option value="">Select Call Type</option><option selected="selected" value="'+edit_node.Description.sales_calltype+'">'+edit_node.Description.sales_calltype+'</option>');
                //$('#sales_calltype').val(edit_node.Description.sales_calltype);
                $('#sales_validity').val(edit_node.Description.sales_validity);
                
                $('#sales_unitprice').val(edit_node.Description.sales_unitprice);
                $('#sales_discount').val(edit_node.Description.sales_discount);
                $('#val_department').val(edit_node.Department.departmentname);
                $('#sales_department_id').val(edit_node.Department.id);
                 
                $('#sales_accountservice').val(edit_node.Description.sales_accountservice);
                $('#sales_titles').val(edit_node.Description.sales_titles);
              
            }
        });
    }
    
    else
        {
               var edit_device_id=$(this).attr('data-edit');
      $('.tr_color').css('background-color','none');
      $(this).parent().parent().parent().css('background-color','#EAEDF1');
//      $('.sales_instrument_remove_'+edit_device_id).css('background-color','#EAEDF1');
      $('.sales_update_device').html('<button class="btn btn-sm btn-primary sales_by_quotation_device_update" type="button"><i class="fa fa-plus fa-fw"></i> Update</button>');
       $.ajax({
            type: 'POST',
            data:"edit_device_id="+ edit_device_id,
            url: path_url+'/Salesorders/sales_by_quotation_edit_instrument/',
            success:function(data){
               edit_node=$.parseJSON(data);
              console.log(edit_node);
               $('#device_id').val(edit_node.Device.id);
               $('#sales_quantity').val(edit_node.Device.quantity);
                $('#val_instrument').val(edit_node.Instrument.name);
                $('#SalesorderCustomerId').val(edit_node.Device.customer_id);
                $('#SalesorderInstrumentId').val(edit_node.Instrument.id);
                $('#val_model_no').val(edit_node.Device.model_no);
                $('#val_brand').empty().append('<option value="">Select Brand</option><option selected="selected" value="'+edit_node.Brand.id+'">'+edit_node.Brand.brandname+'</option>');
                $('#sales_range').empty().append('<option value="">Select Range</option><option selected="selected" value="'+edit_node.Range.id+'">'+edit_node.Range.range_name+'</option>');
                //$('#sales_range').val(edit_node.Device.range);
                $('#sales_range').trigger('chosen:updated');
                        $('#val_brand').trigger('chosen:updated');
                $('#sales_calllocation').val(edit_node.Device.call_location);
                $('#sales_calltype').empty().append('<option value="">Select Call Type</option><option selected="selected" value="'+edit_node.Device.call_type+'">'+edit_node.Device.call_type+'</option>');
                $('#sales_validity').val(edit_node.Device.validity);
                
                $('#sales_unitprice').val(edit_node.Device.unit_price);
                $('#sales_discount').val(edit_node.Device.discount);
                $('#val_department').val(edit_node.Department.departmentname);
                $('#sales_department_id').val(edit_node.Department.id);
                 
                $('#sales_accountservice').val(edit_node.Device.account_service);
                $('#sales_titles').val(edit_node.Device.titles);
              
            }
        });
        }
   });
   
   /*************** Sales Order By Quotation **************************/
   
   $(document).on('click','.sales_by_quotation_device_update',function(){
       
//      if($('#val_instrument').val()=='')
//        {
//            $('.ins_error').addClass('animation-slideDown');
//            $('.ins_error').css('color','red');
//            $('.ins_error').show();
//            return false;
//        }
        $('.sales_update_device').html('<button class="btn btn-sm btn-primary sales_by_quotation_description_add" type="button"><i class="fa fa-plus fa-fw"></i> add</button>');
//        var device_id =   $('#device_id').val();
//        var customer_id =   $('#SalesorderCustomerId').val();
//        var instrument_id   =   $('#SalesorderInstrumentId').val();
//        var instrument_quantity =   $('#sales_quantity').val();
//        var instrument_name = $('#val_instrument').val();
//        var instrument_modelno=$('#val_model_no').val();
//        var instrument_brand=$('#val_brand').val();
//        var instrument_range=$('#sales_range').val();
//        var instrument_calllocation=$('#sales_calllocation').val();
//        var instrument_calltype=$('#sales_calltype').val();
//        var instrument_validity=$('#sales_validity').val();
//        var instrument_unitprice=$('#sales_unitprice').val();
//        var instrument_discount=$('#sales_discount').val();
//        var instrument_department=$('#sales_department_id').val();
//        var instrument_account=$('#sales_accountservice').val();
//        var instrument_title=$('#sales_titles').val();
//        var instrument_cal=instrument_unitprice*instrument_discount/100;
//        var instrument_total=instrument_unitprice - instrument_cal ;
//        $.ajax({
//            type: 'POST',
//            data:"device_id="+device_id+"&instrument_validity="+instrument_validity+"&customer_id="+customer_id+"&instrument_id="+instrument_id+"&instrument_quantity="+instrument_quantity+"&instrument_brand="+instrument_brand+"&instrument_modelno="+instrument_modelno+"&instrument_range="+instrument_range+"&instrument_calllocation="+instrument_calllocation+"&instrument_calltype="+instrument_calltype+"&instrument_unitprice="+instrument_unitprice+"&instrument_discount="+instrument_discount+"&instrument_department="+instrument_department+"&instrument_account="+instrument_account+"&instrument_title="+instrument_title+"&instrument_total="+instrument_total,
//            url: path+'Salesorders/update_instrument/',
//            success: function(data)
//            {
//                data_edit_node  =   $.parseJSON(data);
//               $('.sales_instrument_remove_'+device_id).remove();
//               $('.sales_Instrument_info').append('<tr class="sales_instrument_remove_'+device_id+'">\n\\n\
//                                    <td class="text-center">'+device_id+'</td>\n\
//                                    <td class="text-center">'+data_edit_node.Instrument.name+'</td>\n\\n\
//                                    <td class="text-center">'+data_edit_node.Brand.brandname+'</td>\n\\n\
//                                    <td class="text-center">'+data_edit_node.Description.sales_calllocation+'</td>\n\
//                                     <td class="text-center">'+data_edit_node.Description.sales_validity+'</td>\n\
//                                    <td class="text-center">'+data_edit_node.Description.sales_unitprice+'</td>\n\\n\
//                                    <td class="text-center">'+data_edit_node.Department.departmentname+'</td>\n\\n\
//                                    <td class="text-center">'+data_edit_node.Description.sales_total+'</td>\n\
//                                    <td class="text-center"><div class="btn-group">\n\
//                                    <a data-edit="'+device_id+'"class="btn btn-xs btn-default sales_instrument_by_quotation_edit" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>\n\
//                                    <a data-delete="'+device_id+'" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger sales_instrument_delete">\n\
//                                    <i class="fa fa-times"></i></a></div></td></tr>');
//                
//                $('#sales_quantity').val(null);
//                $('#val_instrument').val(null);
//                $('#val_model_no').val(null);
//                $('#val_brand').empty().append('<option value="">Select Brand</option>');
//                $('#sales_range').val(null);
//                $('#sales_unitprice').val(null);
//                $('#sales_discount').val(null);
//                $('#val_description').val(null);
//                $('#device_id').val();
//                }
//        });
   });
   /**************************For Sales order Description add*************************************/
    
    $(document).on('click','.sales_by_quotation_description_add',function(){
        if($('#val_instrument').val()=='0')
        {
            $('.ins_error').addClass('animation-slideDown');
            $('.ins_error').css('color','red');
            $('.ins_error').show();
            return false;
        }
        if($('#val_brand').val()=='')
        {
            $('.brand_error').addClass('animation-slideDown');
            $('.brand_error').css('color','red');
            $('.brand_error').show();
            return false;
        }
        if($('#sales_quantity').val()=='')
        {
            $('#sales_quantity').css('border','1px solid red');
            return false;
        }
        var salesorder_no   =   $('#val_salesorderno').val();
        var instrument_quantity =  $('#sales_quantity').val();
        var customer_id         =   $('#SalesorderCustomerId').val();
        var instrument_id       =   $('#SalesorderInstrumentId').val();
       
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
        var instrument_cal=instrument_unitprice*instrument_discount/100;
        var instrument_total=instrument_unitprice - instrument_cal ;
        
        for ( var i = 1; i <= instrument_quantity; i++ ){
        $.ajax({
            type: 'POST',
            data:"instrument_validity="+instrument_validity+"&customer_id="+customer_id+"&instrument_id="+instrument_id+"&instrument_quantity="+instrument_quantity+"&instrument_brand="+instrument_brand+"&instrument_modelno="+instrument_modelno+"&instrument_range="+instrument_range+"&instrument_calllocation="+instrument_calllocation+"&instrument_calltype="+instrument_calltype+"&instrument_unitprice="+instrument_unitprice+"&instrument_discount="+instrument_discount+"&instrument_department="+instrument_department+"&instrument_account="+instrument_account+"&instrument_title="+instrument_title+"&instrument_total="+instrument_total+"&salesorder_id="+salesorder_no,
            url: path+'Salesorders/sales_add_instrument/',
            success: function(data)
            {
                data_edit_node  =   $.parseJSON(data);
                
               $('.sales_Instrument_info').append('<tr class="tr_color sales_instrument_remove_'+data_edit_node.Description.id+'">\n\\n\
                                    <td class="text-center">'+data_edit_node.Description.id+'</td>\n\
                                    <td class="text-center">'+data_edit_node.Instrument.name+'</td>\n\\n\
                                    <td class="text-center">'+data_edit_node.Brand.brandname+'</td>\n\\n\
                                    <td class="text-center">'+data_edit_node.Description.sales_calllocation+'</td>\n\
                                     <td class="text-center">'+data_edit_node.Description.sales_validity+'</td>\n\
                                    <td class="text-center">'+data_edit_node.Description.sales_unitprice+'</td>\n\\n\
                                    <td class="text-center">'+data_edit_node.Department.departmentname+'</td>\n\\n\
                                    <td class="text-center">'+data_edit_node.Description.sales_total+'</td>\n\
                                    <td class="text-center"><div class="btn-group">\n\
                                    <a data-edit="'+data_edit_node.Description.id+'"class="btn btn-xs btn-default sales_instrument_by_quotation_edit" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>\n\
                                    <a data-delete="'+data_edit_node.Description.id+'" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger sales_instrument_delete">\n\
                                    <i class="fa fa-times"></i></a></div></td></tr>');
                
                $('#sales_quantity').val(null);
                $('#val_instrument').val(null);
                $('#val_model_no').val(null);
                $('#val_brand').empty().append('<option value="">Select Brand</option>');
                $('#sales_range').val(null);
                $('#sales_range').trigger('chosen:updated');
                $('#val_brand').trigger('chosen:updated');
                $('#sales_unitprice').val(null);
                $('#sales_discount').val(null);
                $('#val_description').val(null);
                }
        });
    }
   });
     /**********************************************Generate Po for Salesorder*****************************/
   $(document).on('click','.sal_generate_po',function()
   {
       var val_ref = $('#val_ref_no').val();
       if(val_ref===''){
       var po_id    =   $(this).attr('id');
       var confirm   =window.confirm('I dont have Po number.Need to generate temporary po');  
       if(confirm==true)
       {
            $.ajax({
            type:'POST',
            url:path_url+'/Clientpos/get_random_ponumber/',
            success:function(data){
                  $('#val_ref_no').val(data);
                  $('#val_ref_no').attr('readonly','readonly');
                  $('#po_gen_type').val('Automatic');
                    
                }
            });
        }
        }
        else{
            return false;
        }
   });
   
   $("#result").hide();
    $("#val_customer_sales").keyup(function() 
    { 
        
        var customer = $(this).val();
        var dataString = 'name='+ customer;
        if(customer!='')
        {
            $.ajax({
            type: "POST",
            url: path_url+"/Salesorders/search_sales_customer_no",
            data: dataString,
            cache: false,
            success: function(html)
            {
                $("#result").html(html).show();
            }
            });
        }
    });
    $(document).on('click','.customer_show_sales',function(){
        var customer_name=$(this).text();
        $('#result').fadeOut();
        var customer_id=$(this).attr('id');
        //alert(customer_name);
        //alert(customer_id);
        $('#val_customer_sales').val(customer_name);
        $('#customer_id').val(customer_id);
    });
    
});
