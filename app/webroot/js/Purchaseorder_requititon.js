$(document).ready(function(){
    
   /**********************Customer Search For Quotation Module*****************************************************************************/
    $("#result").hide();
    $("#preq_customer").keyup(function() 
    { 
        
        var customer = $(this).val();
        var dataString = 'name='+ customer;
        if(customer!='')
        {
            $.ajax({
            type: "POST",
            url: path_url+"/PurchaseRequisitions/search",
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
    });
    $('#val_description').keyup(function(){
          $('.ins_error').hide();
    });
    
    /*******************************Quotation Instrument Details Add Script*******************************************/
    
    $(document).on('click','.preqdescription_add',function(){
      
        if($('#val_description').val()=='')
        {
            $('.ins_error').addClass('animation-slideDown');
            $('.ins_error').css('color','red');
            $('.ins_error').show();
            return false;
        }
        var prequistion_id =   $('#PurchaseRequisitionPrequistionnoId').val();
   
        var instrument_name=$('#val_description').val();
        var instrument_quantity =   $('#val_quantity').val();
       
        var instrument_modelno=$('#val_model_no').val();
        var instrument_brand=$('#val_brand').val();
        var instrument_range=$('#val_range').val();
     
        var instrument_validity=$('#val_validity').val();
        var instrument_unitprice=$('#val_unit_price').val();
        var instrument_discount=$('#val_discount1').val();
        var instrument_cal=instrument_unitprice*instrument_discount/100;
        var instrument_total= instrument_unitprice - instrument_cal;
        
        var instrument_department=$('#val_department').val();
        var instrument_account=$('#val_account_service').val();
        var instrument_title=$('#val_title').val();
        
        for ( var i = 1; i <= instrument_quantity; i++ ){
        $.ajax({
            type: 'POST',
            data:"instrument_name="+instrument_name+"&prequistion_id="+prequistion_id+"&instrument_validity="+instrument_validity+"&instrument_quantity="+instrument_quantity+"&instrument_brand="+instrument_brand+"&instrument_modelno="+instrument_modelno+"&instrument_range="+instrument_range+"&instrument_unitprice="+instrument_unitprice+"&instrument_discount="+instrument_discount+"&instrument_department="+instrument_department+"&instrument_account="+instrument_account+"&instrument_title="+instrument_title+"&instrument_total="+instrument_total,
            url: path+'PurchaseRequisitions/add_instrument/',
            success: function(data)
            {
                $('.odd').empty();
               $('.Instrument_info').append('<tr class="pre_instrument_remove_'+data+'">\n\\n\
                                    <td class="text-center">'+data+'</td>\n\
                                    <td class="text-center">'+instrument_name+'</td>\n\\n\
                                    <td class="text-center">'+instrument_modelno+'</td>\n\\n\
                                    <td class="text-center">'+instrument_brand+'</td>\n\\n\
                                    <td class="text-center">'+instrument_range+'</td>\n\
                                    <td class="text-center">'+instrument_validity+'</td>\n\
                                    <td class="text-center">'+instrument_account+'</td>\n\\n\
                                    <td class="text-center">'+instrument_total+'</td>\n\
                                    <td class="text-center"><div class="btn-group">\n\
                                    <a data-edit="'+data+'"class="btn btn-xs btn-default pre_instrument_edit" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>\n\
                                    <a data-delete="'+data+'" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger pre_instrument_delete">\n\
                                    <i class="fa fa-times"></i></a></div></td></tr>');
                $('#val_quantity').val(null);
                $('#val_department').val(null);
                $('#val_model_no').val(null);
                $('#val_brand').val(null);
                $('#val_range').val(null);
                $('#val_unit_price').val(null);
                $('#val_discount1').val(null);
                $('#val_description').val(null);
            }
        });
    }
   });
    /********************************************Quotation Instrument search Id Select Script************************************************/
   
    /***************************Instrument Delete Script**************************/
    $(document).on('click','.pre_instrument_delete',function(){
      var device_id=$(this).attr('data-delete');
      var result    =   confirm('Are you sure want to delete?');
      if(result==true){
       $.ajax({
            type: 'POST',
            data:"device_id="+ device_id,
            url: path_url+'/PurchaseRequisitions/delete_instrument/',
            success:function(data){
                $('.pre_instrument_remove_'+device_id).fadeOut();
            }
        });
    }
   });
   /***********************************Instrument Device Update Script***********************************************/
   
    $(document).on('click','.pre_device_update',function(){
       $('#val_quantity').removeAttr('readonly');
       var device_id    =   $(this).attr('id');
      if($('#val_description').val()=='')
        {
            $('.ins_error').addClass('animation-slideDown');
            $('.ins_error').css('color','red');
            $('.ins_error').show();
            return false;
        }
        $('.pre_update_device').html('<button class="btn btn-sm btn-primary preqdescription_add" type="button"><i class="fa fa-plus fa-fw"></i> add</button>');
        var instrument_name=$('#val_description').val();
        var instrument_quantity =   $('#val_quantity').val();
       
        var instrument_modelno=$('#val_model_no').val();
        var instrument_brand=$('#val_brand').val();
        var instrument_range=$('#val_range').val();
     
        var instrument_validity=$('#val_validity').val();
        var instrument_unitprice=$('#val_unit_price').val();
        var instrument_discount=$('#val_discount1').val();
        var instrument_cal=instrument_unitprice*instrument_discount/100;
        var instrument_total= instrument_unitprice - instrument_cal;
        
        var instrument_department=$('#val_department').val();
        var instrument_account=$('#val_account_service').val();
        var instrument_title=$('#val_title').val();
        $.ajax({
            type: 'POST',
            data:"device_id="+device_id+"&instrument_name="+instrument_name+"&instrument_validity="+instrument_validity+"&instrument_quantity="+instrument_quantity+"&instrument_brand="+instrument_brand+"&instrument_modelno="+instrument_modelno+"&instrument_range="+instrument_range+"&instrument_unitprice="+instrument_unitprice+"&instrument_discount="+instrument_discount+"&instrument_department="+instrument_department+"&instrument_account="+instrument_account+"&instrument_title="+instrument_title+"&instrument_total="+instrument_total,
           url: path+'PurchaseRequisitions/update_instrument/',
            success: function(data)
            {
               $('.pre_instrument_remove_'+device_id).remove();
               $('.Instrument_info').append('<tr class="pre_instrument_remove_'+device_id+'">\n\\n\
                                    <td class="text-center">'+device_id+'</td>\n\
                                    <td class="text-center">'+instrument_name+'</td>\n\\n\
                                    <td class="text-center">'+instrument_modelno+'</td>\n\\n\
                                    <td class="text-center">'+instrument_brand+'</td>\n\\n\
                                    <td class="text-center">'+instrument_range+'</td>\n\
                                    <td class="text-center">'+instrument_validity+'</td>\n\
                                    <td class="text-center">'+instrument_account+'</td>\n\\n\
                                    <td class="text-center"><div class="btn-group">\n\
                                    <a data-edit="'+device_id+'"class="btn btn-xs btn-default pre_instrument_edit" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>\n\
                                    <a data-delete="'+device_id+'" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger pre_instrument_delete">\n\
                                    <i class="fa fa-times"></i></a></div></td></tr>');
                
                $('#val_quantity').val(null);
                $('#val_model_no').val(null);
                $('#val_department').val(null);
                $('#val_brand').val(null);
                $('#val_range').val(null);
                $('#val_unit_price').val(null);
                $('#val_discount').val('');
                $('#val_description').val(null);
                }
        });
        
   });
   /*******************************Edit Devices for Quotation Devices Script******************************************/
    $(document).on('click','.pre_instrument_edit',function(){
      var edit_device_id=$(this).attr('data-edit');
      $('.pre_update_device').html('<button id ="'+edit_device_id+'" class="btn btn-sm btn-primary pre_device_update" type="button"><i class="fa fa-plus fa-fw"></i> Update</button>');
       $.ajax({
            type: 'POST',
            data:"edit_device_id="+ edit_device_id,
            url: path_url+'/PurchaseRequisitions/edit_instrument/',
            success:function(data){
				 try {
    edit_node=$.parseJSON(data);
  } catch (e) {
    // error
    return;
  }
               
               $('#val_quantity').attr('readonly','readonly');
               $('#val_quantity').val(edit_node.PreqDevice.quantity);
                $('#val_description').val(edit_node.PreqDevice.instrument_name);
               
                $('#val_model_no').val(edit_node.PreqDevice.model_no);
                $('#val_brand').val(edit_node.PreqDevice.brand_name);
                $('#val_range').val(edit_node.PreqDevice.range);
                               
                $('#val_unit_price').val(edit_node.PreqDevice.unit_price);
                $('#val_discount1').val(edit_node.PreqDevice.device_discount);
                $('#val_department').val(edit_node.PreqDevice.department_name);
                
                $('#val_account_service').val(edit_node.PreqDevice.account_service);
                $('#val_title').val(edit_node.PreqDevice.title);
              
            }
        });
        
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
					try {
var document_data_node   =   $.parseJSON(data);
  } catch (e) {
    // error
    return;
  }
               
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
   });
     /**********************************************Generate Po for Quotation*****************************/
  
    /***********************************************Calculate Device Count Rate Total******************************/
    $(document).on('keyup','#val_ref_no',function(){
      if($(this).val()=='-'){
         $('#po_gen_type').val('Normal');
      }
    });
});
/***************************Instrument Delete Script for PR_Purchase order**************************/
    $(document).on('click','.prpur_instrument_delete',function(){
      var device_id=$(this).attr('data-delete');
      var result    =   confirm('Are you sure want to delete?');
      if(result==true){
       $.ajax({
            type: 'POST',
            data:"device_id="+ device_id,
            url: path_url+'/Reqpurchaseorders/delete_instrument/',
            success:function(data){
                $('.prpur_instrument_remove_'+device_id).fadeOut();
            }
        });
    }
   });
   
   /**************************PR Approval *************************************/
    $(document).on('click','.approve_pr',function(){
       var val_pr_id=$('#pr_id').val();
       //alert(val_quotationno);
       
       if(window.confirm("Are you sure?")){
       $.ajax({
            type: 'POST',
            data:"id="+val_pr_id,
            url: path+'PurchaseRequisitions/approve_manager/',
            success: function(data)
            {
                window.location.reload(); 
            }
            
        });
    }
    else
    {
        return false;
    }
       
   });
   $(document).on('click','.approve_pr_sup',function(){
       var val_pr_id=$('#pr_id').val();
       //alert(val_quotationno);
       
       if(window.confirm("Are you sure?")){
       $.ajax({
            type: 'POST',
            data:"id="+val_pr_id,
            url: path+'PurchaseRequisitions/approve_superviser/',
            success: function(data)
            {
                window.location.reload(); 
            }
            
        });
    }
    else
    {
        return false;
    }
       
   });
   
   $(document).on('click','.approve_prpur',function(){
       var val_prpur_id=$('#prpur_id').val();
       //alert(val_quotationno);
       
       if(window.confirm("Are you sure?")){
       $.ajax({
            type: 'POST',
            data:"id="+val_prpur_id,
            url: path+'Reqpurchaseorders/approve/',
            success: function(data)
            {
                window.location.reload(); 
            }
            
        });
    }
    else
    {
        return false;
    }
       
   });