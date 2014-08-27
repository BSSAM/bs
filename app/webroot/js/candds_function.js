/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
   
    /*************************For Cand D Customer Details Add**********************************/
    $(document).on('click','.candds_add',function(){
    
        var customer_name = $("#val_customer_candd").val();
        var customer_id =$('#candd_customer_id').val();
        var purpose =   $('#val_purpose option:selected').val();
        var address_id   =   $('#val_addr option:selected').val();
        var customer_address   =   $('#val_address').val();
        var attn_id   =   $('#val_attn_candd option:selected').val();
        var phone   =   $('#val_phone').val();
        var assigned  =  $('#val_assigned option:selected').val();
        var remark  =  $('#val_remarks').val();
        var cd_date =   $('.cd_date').val();
        $.ajax({
            type: 'POST',
            data:"customer_name="+customer_name+"&customer_id="+customer_id+"&purpose="+purpose+"&address_id="+address_id+"&customer_address="+customer_address+"&attn_id="+attn_id+"&phone="+phone+"&assigned="+assigned+"&remark="+remark+"&cd_date="+cd_date,
            url: path_url+'Candds/add_candds/',
            success: function(data)
            {
               var candd_data_node    =   $.parseJSON(data);
               var contact_person   =   candd_data_node.Contactpersoninfo;
               if(candd_data_node.Candd.purpose=='Collection')
               {
                 
                $('.collections_info').append('<tr class="colletion_'+candd_data_node.Candd.id+'">\n\\n\
                                    <td class="text-center">'+candd_data_node.Candd.id+'</td>\n\\n\
                                    <td class="text-center">'+candd_data_node.Candd.customername+'</td>\n\\n\
                                    <td class="text-center">'+candd_data_node.Candd.customer_address+'</td>\n\\n\
                                    <td class="text-center">'+candd_data_node.Contactpersoninfo.name+'</td>\n\\n\
                                    <td class="text-center">'+candd_data_node.Candd.phone+'</td>\n\\n\
                                    <td class="text-center">'+candd_data_node.assign.assignedto+'</td>\n\\n\
                                    <td class="text-center">'+candd_data_node.branch.branchname+'</td>\n\\n\
                                    <td class="text-center">'+candd_data_node.Candd.remarks+'</td>\n\\n\
                                    <td class="text-center"><div class="btn-group">\n\
                                    <a data-delete="'+candd_data_node.Candd.id+'" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger candd_delete">\n\
                                    <i class="fa fa-times"></i></a></div></td></tr>');
                
            }
            else if(candd.Candd.purpose=='Delivery')
            {
                $('.deliveries_info').append('<tr class="instrument_remove_'+data+'">\n\\n\
                                    <td class="text-center">'+data+'</td>\n\\n\
                                    <td class="text-center">Customer Name</td>\n\\n\
                                    <td class="text-center">Customer Address</td>\n\\n\
                                    <td class="text-center">ATTN</td>\n\\n\
                                    <td class="text-center">Phone</td>\n\\n\
                                    <td class="text-center">Sales Order Nos</td>\n\\n\
                                    <td class="text-center">Delivery Order Nos</td>\n\\n\
                                    <td class="text-center">Assigned To</td>\n\\n\
                                    <td class="text-center">Remarks</td>\n\\n\\n\
                                    <td class="text-center">Request By</td>\n\\n\
                                    <td class="text-center">Action</td>\n\\n\
                                    <td class="text-center"><div class="btn-group">\n\
                                    <a data-edit="'+data+'"class="btn btn-xs btn-default instrument_edit" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>\n\
                                    <a data-delete="'+data+'" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger instrument_delete">\n\
                                    <i class="fa fa-times"></i></a></div></td></tr>');
            }
            var customer_name = $("#val_customer_candd").val('');
            var customer_id =$('#candd_customer_id').val('');
            var customer_address   =   $('#val_address').val('');
            var phone   =   $('#val_phone').val('');
            var assigned  =  $('#val_assigned option:selected').val();
            var remark  =  $('#val_remarks').val('');
            }
        });
        
   });
   /**********************For Autocomplete Customer  Name search in  Candd Module****************************/
   $("#candd_result").hide();
    $("#val_customer_candd").keyup(function() 
    { 
        var customer = $(this).val();
        if(customer!='')
        {
            var dataString = 'name='+ customer;
            if(customer!='')
            {
                $.ajax({
                    type: "POST",
                    url: path_url+"/Candds/search",
                    data: dataString,
                    cache: false,
                    success: function(html)
                    {
                        $("#candd_result").html(html).show();
                    }
                });
            }
        }
        else
        {
            $("#candd_result").hide();
        }
    });
    $('#val_customer_candd').blur(function(){
        $('#candd_result').fadeOut();
        $(this).val('');
    });
    /*********************for Candd Customer name Search**********************************/
    $(document).on('click','.candd_single',function(){
        var customer_name=$(this).text();
        $('#val_customer_candd').val(customer_name);
        $('#result').fadeOut();
        var customer_id=$(this).attr('id');
        $.ajax({
            type: "POST",
            url: path_url+"/Candds/get_customer_value",
            data: 'cust_id='+customer_id,
            cache: false,
            success: function(data)
            {
                data1 = $.parseJSON(data);
                address_node = data1.Address;
                //alert(data);
                //alert(address_node.);
                contact_person_info =   data1.Contactpersoninfo;
                salesperson_node =   data1.CusSalesperson;
                $('#candd_customer_id').val(data1.Customer.id);
                
                $.each(contact_person_info,function(k,v){
                    $('#val_attn_candd').append('<option value="'+v.id+'">'+v.name+'</option>');
                });
            }
	});
    });
    /*****************************For Cand D Contact person info*****************************/
    $(document).on('change','#val_attn_candd',function(){
       var contact_person_value =$(this).val();
       var customer_id =$('#candd_customer_id').val();
       if(contact_person_value!='')
       {
           $.ajax({
            type: "POST",
            url: path_url+"/Candds/get_contact_person_value",
            data: 'cust_id='+customer_id+'&contact_person_value='+contact_person_value,
            cache: false,
            success: function(data)
            {
              $('#val_phone').val(data);
                
            }
	});
       }
       else
       {
           $('#val_phone').val('');
       }
    });
    /*******************************For Customer Address*******************************************/
    $(document).on('change','#val_addr',function(){
       var address =$(this).val();
       var customer_id =$('#candd_customer_id').val();
       if(address!=''&&customer_id!='')
       {
           $.ajax({
            type: "POST",
            url: path_url+"/Candds/get_candd_customer_address",
            data: 'address='+address+'&customer_id='+customer_id,
            cache: false,
            success: function(data)
            {
             $('#val_address').val(data);
            }
	});
       }
       else
       {
           $('#val_address').val('');
       }
    });
    /******************************Cd save script**************/
    $('.cd_save').click(function(){
       $('#col_an_del_date').val($('.cd_date').val());
    });
    /*****************************C and D collection record delete script**************/
    $(document).on('click','#candd_delete',function(){
        alert('sdf');
    });
    /*****************************************************************************/
    $(document).on('click','.candd_delivery_add',function(){
        var cd_date =   $('.cd_date').val();
        $.ajax({
            type: "POST",
            data:"cd_date="+cd_date,
            url: path_url+"/Candds/get_delivery_info",
            cache: false,
            success: function(data)
            {
                var deliver_data_node = $.parseJSON(data);
                var contact_person      =  deliver_data_node.Customer;
                $('.deliveries_info').empty();
                $.each(deliver_data_node,function(k,v){
                    $('.deliveries_info').append('<tr class="colletion_'+v.ReadytodeliverItem.id+'">\n\\n\
                                    <td class="text-center">'+v.ReadytodeliverItem.id+'</td>\n\\n\
                                    <td class="text-center">'+v.Customer.customername+'</td>\n\\n\
                                    <td class="text-center">'+v.Deliveryorder.customer_address+'</td>\n\\n\
                                    <td class="text-center">attn</td>\n\\n\
                                    <td class="text-center">phone</td>\n\\n\\n\
                                    <td class="text-center">'+v.ReadytodeliverItem.salesorderno+'</td>\n\\n\
                                    <td class="text-center">'+v.ReadytodeliverItem.deliveryorderno+'</td>\n\\n\
                                    <td class="text-center">'+v.ReadytodeliverItem.assign_to+'</td>\n\\n\
                                    <td class="text-center">'+v.branch.branchname+'</td>\n\\n\
                                    <td class="text-center">'+v.Deliveryorder.remarks+'</td>\n\\n\
                                    <td class="text-center"><div class="btn-group">\n\
                                    <a data-delete="'+v.ReadytodeliverItem.id+'" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger ready_to_deliver_delete">\n\
                                    <i class="fa fa-times"></i></a></div></td></tr>');
                });
            }
	});
    });
    
    /*****************************************************************************/
    $(document).on('click','.candd_collection_add',function(){
        var cd_date1 =   $('.cd_date').val();
        if($('.cd_date').val()!==''){
            $('.collections_info').empty();
        $.ajax({
            type: "POST",
            data:"cd_date="+cd_date1,
            url: path_url+"/Candds/get_collection_info",
            cache: false,
            success: function(data)
            {
                var deliver_data_node = $.parseJSON(data);
                var contact_person      =  deliver_data_node.Customer;
               // alert(contact_person);
                //console.log(data);
                $.each(deliver_data_node,function(k,v){
                    //alert(v);
                    $('.collections_info').append('<tr class="colletion_'+v.Candd.id+'">\n\\n\
                                    <td class="text-center">'+v.Candd.id+'</td>\n\\n\
                                    <td class="text-center">'+v.Candd.customername+'</td>\n\\n\
                                    <td class="text-center">'+v.Candd.customer_address+'</td>\n\\n\
                                    <td class="text-center">'+v.Contactpersoninfo.name+'</td>\n\\n\
                                    <td class="text-center">'+v.Contactpersoninfo.phone+'</td>\n\\n\\n\
                                    <td class="text-center">'+v.assign.assignedto+'</td>\n\\n\
                                    <td class="text-center">'+v.Candd.deliveryorderno+'</td>\n\\n\
                                    <td class="text-center">'+v.Candd.remarks+'</td>\n\\n\
                                    <td class="text-center">'+v.Candd.remarks+'</td><td class="text-center"><div class="btn-group">\n\
                                    <a data-delete="'+v.Candd.id+'" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger ready_to_collection_delete">\n\
                                    <i class="fa fa-times"></i></a></div></td></tr>');
                });
            }
	});}else
    {
        alert("Please select the date");
    }
    });
   /********************For Description Move to deliver Script********************+v.branch.branchname+*/
   $('.move_to_deliver').click(function(){
      var assign_text  =   $('#val_assigned_move option:selected').text();
      var assign_value  =   $('#val_assigned_move option:selected').val();
      var cd_date  =   $('.cd_date').val();
      var checked   =$('.description_move_delivery_check:checked').length;
      var description_move_checked = [];
        $('.description_move_delivery_check:checked').each(function(i){
          description_move_checked[i] = $(this).val();
        });
        var conformation  =   window.confirm('Confirm to move '+checked+' delivery order');  
        if(conformation==true&& assign_value!=''){
        $.ajax({
            type: "POST",
            url: path_url+"/Candds/move_deliveryorder",
            data:'assign_to='+assign_text+'&description_move='+description_move_checked+"&cd_date="+cd_date,
            cache: false,
            success: function(data)
            {
               var checked_node =   $.parseJSON(data);
               $.each(checked_node,function(k,v){
                  $('.move_'+v).fadeOut('slow',function(){
                      $(this).remove();
                  }) 
               });
             
                
            }
	});
        }
   });
   
});