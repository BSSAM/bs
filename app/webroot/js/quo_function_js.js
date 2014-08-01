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
            url: path_url+"/Quotations/search",
            data: dataString,
            cache: false,
            success: function(html)
            {
                $("#result").html(html).show();
            }
            });
        }
    });
 /****************************Email Id Change Based on Contact Person Value Changes in Quotation Module ***********************************/
   $(document).on('change','#val_attn',function(){
      var con_person =   $(this).val();
        $.ajax({
            type: 'POST',
            data:"cid="+con_person,
            url: path_url+'/Quotations/get_contact_email/',
            success:function(data){
                $('#val_email').val(data);
            }
        });
   }); 
   /**********************************************************************************************************************************/
   $('#val_description').blur(function(){
         $('#search_instrument').fadeOut();
    })
    
    /*******************************Quotation Instrument Details Add Script*******************************************/
    $(document).on('click','.description_add',function(){
       
        if($('#val_description').val()=='')
        {
            $('.ins_error').addClass('animation-slideDown');
            $('.ins_error').css('color','red');
            $('.ins_error').show();
            return false;
        }
        var customer_id =   $('#QuotationCustomerId').val();
        var instrument_id   =   $('#QuotationInstrumentId').val();
        var instrument_quantity =   $('#val_quantity').val();
        var instrument_name=$('#val_description').val();
        var instrument_modelno=$('#val_model_no').val();
        var instrument_brand=$('#val_brand').val();
        var instrument_range=$('#val_range').val();
        var instrument_calllocation=$('#val_call_location').val();
        var instrument_calltype=$('#val_call_type').val();
        var instrument_validity=$('#val_validity').val();
        var instrument_unitprice=$('#val_unit_price').val();
        var instrument_discount=$('#val_discount').val();
        var instrument_cal=instrument_unitprice*instrument_discount/100;
        var instrument_total= instrument_unitprice - instrument_cal;
        
        var instrument_department=$('#val_department_id').val();
        var instrument_account=$('#val_account_service').val();
        var instrument_title=$('#val_title').val();
        
        for ( var i = 1; i <= instrument_quantity; i++ ){
        $.ajax({
            type: 'POST',
            data:"instrument_validity="+instrument_validity+"&customer_id="+customer_id+"&instrument_id="+instrument_id+"&instrument_quantity="+instrument_quantity+"&instrument_brand="+instrument_brand+"&instrument_modelno="+instrument_modelno+"&instrument_range="+instrument_range+"&instrument_calllocation="+instrument_calllocation+"&instrument_calltype="+instrument_calltype+"&instrument_unitprice="+instrument_unitprice+"&instrument_discount="+instrument_discount+"&instrument_department="+instrument_department+"&instrument_account="+instrument_account+"&instrument_title="+instrument_title+"&instrument_total="+instrument_total,
            url: path+'Quotations/add_instrument/',
            success: function(data)
            {
               $('.Instrument_info').append('<tr class="instrument_remove_'+data+'">\n\\n\
                                    <td class="text-center">'+data+'</td>\n\
                                    <td class="text-center">'+instrument_name+'</td>\n\\n\
                                    <td class="text-center">'+instrument_modelno+'</td>\n\
                                    <td class="text-center">'+instrument_calllocation+'</td>\n\
                                    <td class="text-center">'+instrument_calltype+'</td>\n\
                                    <td class="text-center">'+instrument_validity+'</td>\n\
                                    <td class="text-center">'+instrument_unitprice+'</td>\n\\n\
                                    <td class="text-center">'+instrument_account+'</td>\n\
                                    <td class="text-center">'+instrument_total+'</td>\n\\n\
                                    <td class="text-center"><div class="btn-group">\n\
                                    <a data-edit="'+data+'"class="btn btn-xs btn-default instrument_edit" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>\n\
                                    <a data-delete="'+data+'" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger instrument_delete">\n\
                                    <i class="fa fa-times"></i></a></div></td></tr>');
                
                $('#val_quantity').val(null);
                $('#val_description').val(null);
                $('#val_model_no').val(null);
                $('#val_brand').empty().append('<option value="">Select Brand</option>');
                $('#val_range').val(null);
                $('#val_unit_price').val(null);
                $('#val_discount1').val(null);
                $('#val_description').val(null);
                }
        });
    }
   });
    /********************************************Quotation Instrument search Id Select Script************************************************/
    $(document).on('click','.instrument_id',function(){
        var instrument_id=$(this).attr('id');
        var customer_id =   $('#QuotationCustomerId').val();
        var ins_text=$(this).text();
        $('#val_description').val(ins_text);
        $('.ins_error').hide();
        $('#search_instrument').fadeOut();
        $.ajax({
            type: "POST",
            url: path+"Quotations/get_brand_value",
            data: 'instrument_id='+instrument_id+'&customer_id='+customer_id,
            cache: false,
            
            success: function(data)
            {
                
                parsedata = $.parseJSON(data);
                var dept    =   parsedata.Instrument;
                $.each(parsedata.Instrument.InstrumentBrand, function(k, v)
                {
                     $('#val_brand').append('<option value='+v.Brand.id+'>'+v.Brand.brandname+'</option>');
                  
                });
                
                $.each(parsedata.Instrument.InstrumentRange, function(k, v)
                {
                   
                     $('#val_range').append('<option value='+v.Range.id+'>'+v.Range.range_name+'</option>');
                  
                });
                    
                $('#val_department').val(dept.Department.departmentname);
                $('#val_department_id').val(dept.Department.id);
                $('#val_model_no').val(parsedata.CustomerInstrument.model_no);
                $('#QuotationInstrumentId').val(instrument_id);
                $('#val_unit_price').val(parsedata.CustomerInstrument.unit_price);
                        
            }
    });
    });
    $('.ins_error').hide();
    /***************************Instrument Delete Script**************************/
    $(document).on('click','.instrument_delete',function(){
      var device_id=$(this).attr('data-delete');
      var result    =   confirm('Are you sure want to delete?');
      if(result==true){
       $.ajax({
            type: 'POST',
            data:"device_id="+ device_id,
            url: path_url+'/Quotations/delete_instrument/',
            success:function(data){
                $('.instrument_remove_'+device_id).fadeOut();
            }
        });
    }
   });
   /***********************************Instrument Device Update Script***********************************************/
   
    $(document).on('click','.device_update',function(){
       
      if($('#val_description').val()=='')
        {
            $('.ins_error').addClass('animation-slideDown');
            $('.ins_error').css('color','red');
            $('.ins_error').show();
            return false;
        }
        $('.update_device').html('<button class="btn btn-sm btn-primary description_add" type="button"><i class="fa fa-plus fa-fw"></i> add</button>');
        var device_id =   $('#device_id').val();
        var customer_id =   $('#QuotationCustomerId').val();
        var instrument_id   =   $('#QuotationInstrumentId').val();
        var instrument_quantity =   $('#val_quantity').val();
        var instrument_name=$('#val_description').val();
        var instrument_modelno=$('#val_model_no').val();
        var instrument_brand=$('#val_brand').val();
        var instrument_range=$('#val_range').val();
        var instrument_calllocation=$('#val_call_location').val();
        var instrument_calltype=$('#val_call_type').val();
        var instrument_validity=$('#val_validity').val();
        var instrument_unitprice=$('#val_unit_price').val();
        var instrument_discount=$('#val_discount').val();
       
        var instrument_cal=instrument_unitprice*instrument_discount/100;
       
        var instrument_total= instrument_unitprice - instrument_cal ;
        var instrument_department=$('#val_department').val();
        var instrument_account=$('#val_account_service').val();
        var instrument_title=$('#val_title').val();
        $.ajax({
            type: 'POST',
            data:"device_id="+device_id+"&instrument_validity="+instrument_validity+"&customer_id="+customer_id+"&instrument_id="+instrument_id+"&instrument_quantity="+instrument_quantity+"&instrument_brand="+instrument_brand+"&instrument_modelno="+instrument_modelno+"&instrument_range="+instrument_range+"&instrument_calllocation="+instrument_calllocation+"&instrument_calltype="+instrument_calltype+"&instrument_unitprice="+instrument_unitprice+"&instrument_discount="+instrument_discount+"&instrument_department="+instrument_department+"&instrument_account="+instrument_account+"&instrument_title="+instrument_title+"&instrument_total="+instrument_total,
            url: path+'Quotations/update_instrument/',
            success: function(data)
            {
                
               $('.instrument_remove_'+device_id).remove();
               $('.Instrument_info').append('<tr class="instrument_remove_'+device_id+'">\n\\n\
                                    <td class="text-center">'+device_id+'</td>\n\
                                    <td class="text-center">'+instrument_name+'</td>\n\\n\
                                    <td class="text-center">'+instrument_modelno+'</td>\n\
                                    <td class="text-center">'+instrument_calllocation+'</td>\n\
                                    <td class="text-center">'+instrument_calltype+'</td>\n\
                                    <td class="text-center">'+instrument_validity+'</td>\n\
                                    <td class="text-center">'+instrument_unitprice+'</td>\n\\n\
                                    <td class="text-center">'+instrument_account+'</td>\n\\n\
                                    <td class="text-center">'+instrument_total+'</td>\n\\n\
                                    <td class="text-center"><div class="btn-group">\n\
                                    <a data-edit="'+device_id+'"class="btn btn-xs btn-default instrument_edit" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>\n\
                                    <a data-delete="'+device_id+'" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger instrument_delete">\n\
                                    <i class="fa fa-times"></i></a></div></td></tr>');
                
                $('#val_quantity').val(null);
                $('#val_description').val(null);
                $('#val_model_no').val(null);
                $('#val_department').val(null);
                $('#val_brand').empty().append('<option value="">Select Brand</option>');
                $('#val_range').val(null);
                $('#val_unit_price').val(null);
                $('#val_discount').val('');
                $('#val_description').val(null);
                }
        });
        
   });
   /*******************************Edit Devices for Quotation Devices Script******************************************/
    $(document).on('click','.instrument_edit',function(){
      var edit_device_id=$(this).attr('data-edit');
      $('.update_device').html('<button class="btn btn-sm btn-primary device_update" type="button"><i class="fa fa-plus fa-fw"></i> Update</button>');
       $.ajax({
            type: 'POST',
            data:"edit_device_id="+ edit_device_id,
            url: path_url+'/Quotations/edit_instrument/',
            success:function(data){
               edit_node=$.parseJSON(data);
              
               $('#device_id').val(edit_node.Device.id);
               $('#val_quantity').val(edit_node.Device.quantity);
                $('#val_description').val(edit_node.Instrument.name);
                $('#QuotationInstrumentId').val(edit_node.Instrument.id);
                $('#QuotationCustomerId').val(edit_node.Device.customer_id);
                $('#val_model_no').val(edit_node.Device.model_no);
                $('#val_brand').empty().append('<option value="">Select Brand</option><option selected="selected" value="'+edit_node.Brand.id+'">'+edit_node.Brand.brandname+'</option>');
                $('#val_range').empty().append('<option value="">Select Brand</option><option selected="selected" value="'+edit_node.Range.id+'">'+edit_node.Range.range_name+'</option>');
                               
                $('#val_call_location').val(edit_node.Device.call_location);
                $('#val_call_type').val(edit_node.Device.call_type);
                $('#val_validity').val(edit_node.Device.validity);
                
                $('#val_unit_price').val(edit_node.Device.unit_price);
                $('#val_discount1').val(edit_node.Device.discount);
                $('#val_department').val(edit_node.Department.departmentname);
                
                $('#val_account_service').val(edit_node.Device.account_service);
                $('#val_title').val(edit_node.Device.title);
              
            }
        });
        
   });
    /**************************Quotation Approval in Quotation Module*************************************/
    $(document).on('click','.approve_quotation',function(){
       var val_quotationno=$('#val_quotationno').val();
       
       if(window.confirm("Are you sure?")){
       $.ajax({
            type: 'POST',
            data:"id="+val_quotationno,
            url: path+'Quotations/approve/',
            success: function(data)
            {
                //return false;
               window.location.reload();
            }
            
        });
    }
    else
    {
        return false;
    }
       
   });
   /**********************************File Upload refresh**********************************************/
   $(document).on('click','.refresh_file_upload',function(){
      
       var qid=$(this).attr('data-qid');
       
       $.ajax({
            type: 'POST',
            data:"id="+qid,
            url: path+'Quotations/get_document_files/',
            success: function(data)
            {
               var document_data_node   =   $.parseJSON(data);
               $('.file_upload_created').empty();
               $.each(document_data_node,function(k,v){
                   alert(v.Document.document_name.split('_'));
                   $('.file_upload_created').append('<tr class="">\n\
                                                    <td class="text-center">'+v.Document.id+'</td>\n\
                                                    <td class="text-center">'+v.Document.id+'</td>\n\
                                                    <td class="text-center">'+v.Document.document_name+'</td>\n\
                                                    <td class="text-center">'+v.Document.document_size+'</td>\n\
                                                    <td class="text-center">Delete</td>\n\
                                                </tr>');
            
               });
              
                
            }
            
        });
        /**********************************************individual File upload*****************************/
       
   });
});