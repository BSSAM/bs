/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
    
    // Candd Edit function
    
    
   
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
        var deliveryorder_id  =  $('#deliveryorder_id').val();
        var remark  =  $('#val_remarks').val();
        var cd_date =   $('.cd_date').val();
        if(!deliveryorder_id)
        {
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
                                        <td class="text-center"><div class="btn-group"><a id="'+candd_data_node.Candd.id+'" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-default ready_to_edit"><i class="fa fa-pencil"></i></a><a id="'+candd_data_node.Candd.id+'" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger ready_to_delete"><i class="fa fa-times"></i></a></div></td></tr>');

                }
                else if(candd_data_node.Candd.purpose=='Delivery')
                {
                    $('.deliveries_info').append('<tr class="instrument_remove_'+candd_data_node.Candd.id+'">\n\\n\
                                        <td class="text-center">'+candd_data_node.Candd.id+'</td>\n\\n\
                                        <td class="text-center">'+candd_data_node.Candd.customername+'</td>\n\\n\
                                        <td class="text-center">'+candd_data_node.Candd.customer_address+'</td>\n\\n\
                                        <td class="text-center">'+candd_data_node.Contactpersoninfo.name+'</td>\n\\n\
                                        <td class="text-center">'+candd_data_node.Candd.phone+'</td>\n\\n\
                                        <td class="text-center">-</td>\n\\n\
                                        <td class="text-center">-</td>\n\\n\
                                        <td class="text-center">'+candd_data_node.assign.assignedto+'</td>\n\\n\
                                         <td class="text-center">'+candd_data_node.branch.branchname+'</td>\n\\n\
                                        <td class="text-center">'+candd_data_node.Candd.remarks+'</td>\n\\n\
                                        <td class="text-center"><div class="btn-group"><a id="'+candd_data_node.Candd.id+'" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-default ready_to_edit"><i class="fa fa-pencil"></i></a><a id="'+candd_data_node.Candd.id+'" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger ready_to_delete"><i class="fa fa-times"></i></a></div></td></tr>');
                }
                var customer_name = $("#val_customer_candd").val('');
                var customer_id =$('#candd_customer_id').val('');
                var customer_address   =   $('#val_address').val('');
                var phone   =   $('#val_phone').val('');
                var assigned  =  $('#val_assigned option:selected').val();
                var remark  =  $('#val_remarks').val('');
                }
            });
        }
        else 
        {
            $.ajax({
                type: 'POST',
                data:"customer_name="+customer_name+"&customer_id="+customer_id+"&purpose="+purpose+"&address_id="+address_id+"&customer_address="+customer_address+"&attn_id="+attn_id+"&phone="+phone+"&assigned="+assigned+"&remark="+remark+"&cd_date="+cd_date+"&del_id="+deliveryorder_id,
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
                                        <td class="text-center"><div class="btn-group"><a id="'+candd_data_node.Candd.id+'" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-default ready_to_edit"><i class="fa fa-pencil"></i></a><a id="'+candd_data_node.Candd.id+'" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger ready_to_delete"><i class="fa fa-times"></i></a></div></td></tr>');

                }
                else if(candd_data_node.Candd.purpose=='Delivery')
                {
                    $('.deliveries_info').append('<tr class="instrument_remove_'+candd_data_node.Candd.id+'">\n\\n\
                                        <td class="text-center">'+candd_data_node.Candd.id+'</td>\n\\n\
                                        <td class="text-center">'+candd_data_node.Candd.customername+'</td>\n\\n\
                                        <td class="text-center">'+candd_data_node.Candd.customer_address+'</td>\n\\n\
                                        <td class="text-center">'+candd_data_node.Contactpersoninfo.name+'</td>\n\\n\
                                        <td class="text-center">'+candd_data_node.Candd.phone+'</td>\n\\n\
                                        <td class="text-center">-</td>\n\\n\
                                        <td class="text-center">-</td>\n\\n\
                                        <td class="text-center">'+candd_data_node.assign.assignedto+'</td>\n\\n\
                                        <td class="text-center">'+candd_data_node.branch.branchname+'</td>\n\\n\
                                        <td class="text-center">'+candd_data_node.Candd.remarks+'</td>\n\\n\
                                        <td class="text-center"><div class="btn-group"><a id="'+candd_data_node.Candd.id+'" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-default ready_to_edit"><i class="fa fa-pencil"></i></a><a id="'+candd_data_node.Candd.id+'" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger ready_to_delete"><i class="fa fa-times"></i></a></div></td></tr>');
                }
                var customer_name = $("#val_customer_candd").val('');
                var customer_id =$('#candd_customer_id').val('');
                var customer_address   =   $('#val_address').val('');
                var phone   =   $('#val_phone').val('');
                var assigned  =  $('#val_assigned option:selected').val();
                var remark  =  $('#val_remarks').val('');
                }
            });
            
        }
        
        
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
				 try {
    data1 = $.parseJSON(data);
  } catch (e) {
    // error
    return;
  }
                
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
       //$('#col_an_del_date').val($('.cd_date').val());
       var shipped_checked = [];
        
        $('.shipping_check:checked').each(function(i){
          shipped_checked[i] = $(this).val();
        });
        var cd_date = $('.cd_date').val();
        if(shipped_checked!=''){
            var conformation  =   window.confirm('Confirm to mark shipped '+shipped_checked+' delivery order');  
            if(conformation==true){
                $.ajax({
                    type: "POST",
                    url: path_url+"/Candds/shipped_check",
                    data:'shipped_check='+shipped_checked+"&cd_date="+cd_date,
                    cache: false,
                    success: function(data)
                    {
                        alert("Shipment(s) Marked Successful");
                        window.location.reload();
                        //console.log(data); //return false;
//                        var checked_node =   $.parseJSON(data);
//                        $.each(checked_node,function(k,v){
//                            $('.move_'+v).fadeOut('slow',function(){
//                            $(this).remove();
//                            }); 
//                        });
                    }
                });
            }
        }
        else{
            alert('Please Select Assign To Person');
            return false;
        }
    });
    /*****************************C and D collection record delete script**************/
    $(document).on('click','#candd_edit',function(){
        //alert('sdf');
    });
    $(document).on('click','#candd_delete',function(){
        //alert('sdf');
    });
    /*****************************************************************************/
    
    
    ///////////////////////// Ajax
    
    
    $(document).on('click','.candd_delivery_add',function(){
        var cd_date =   $('.cd_date').val();
        console.log(cd_date);
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth()+1; //January is 0!
        var yyyy = today.getFullYear();
        yyyy = yyyy.toString().substr(2,2);
        if(dd<10) {
            dd='0'+dd
        } 
        switch(mm)
        {
            case 1:
            mm = 'January';
            break;
            case 2:
            mm = 'February';
            break;
            case 3:
            mm = 'March';
            break;
            case 4:
            mm = 'April';
            break;
            case 5:
            mm = 'May';
            break;
            case 6:
            mm = 'June';
            break;
            case 7:
            mm = 'July';
            break;
            case 8:
            mm = 'August';
            break;
            case 9:
            mm = 'September';
            break;
            case 10:
            mm = 'October';
            break;
            case 11:
            mm = 'November';
            break;
            case 12:
            mm = 'December';
            break;

        }
        today = dd+'-'+mm+'-'+yyyy;
        console.log(today);
        
        $.ajax({
            type: "POST",
            data:"cd_date="+cd_date,
            url: path_url+"/Candds/get_delivery_tab_info",
            cache: false,
            success: function(data)
            {
                //alert(data);
                if(data)
                {
                var sal_no = '-';
                var del_no = '-';
		var deliver_data_node = $.parseJSON(data);
                //console.log(deliver_data_node);
                var contact_person      =  deliver_data_node.Customer;
                $('.deliveries_info').empty();
                $.each(deliver_data_node,function(k,v){
                    if(v.ReadytodeliverItem.salesorderno == null)
                    {
                        var sal_no = '-';
                    }
                    else{
                        var sal_no = v.ReadytodeliverItem.salesorderno;
                    }
                    if(v.ReadytodeliverItem.deliveryorderno == null)
                    {
                        var del_no = '-';
                    }
                    else{
                        var del_no = v.ReadytodeliverItem.deliveryorderno;
                    }
                    if(today == cd_date)
                    {
                        var disabled_ship = ' disabled=disabled';
                        
                    }
                    else
                    {
                        var disabled_ship = '';
                        
                    }
                    //var disabled_deliver = '';
                    if(v.ReadytodeliverItem.is_shipped == 0)
                    {
                        var checked = '';
                        //var disabled_deliver = ' disabled=disabled';
                        var type_deliver = 'hidden';
                    }
                    if(v.ReadytodeliverItem.is_shipped == 1)
                    {
                        var checked = ' checked=checked';
                        //var disabled_deliver = '';
                        if(today == cd_date+1)
                        {
                            
                            var type_deliver = 'checkbox';
                        }
                        else
                        {
                            console.log('not equal');
                            var type_deliver = 'hidden';
                        }
                    }
                    
                    if(v.ReadytodeliverItem.is_delivered == 0)
                    {
                        var checked_del = '';
                    }
                    if(v.ReadytodeliverItem.is_delivered == 1)
                    {
                        if(type_deliver != 'hidden')
                        {
                            var checked_del = ' checked=checked';
                        }
                    }
                    //alert(v.ReadytodeliverItem.is_shipped);
                    
                    $('.deliveries_info').append('<tr class="colletion_'+v.Candd.id+'">\n\\n\
                                    <td class="text-center">'+v.Candd.id+'</td>\n\\n\
                                    <td class="text-center">'+v.Customer.customername+'</td>\n\\n\
                                    <td class="text-center">'+v.Candd.customer_address+'</td>\n\\n\
                                    <td class="text-center">'+v.Contactpersoninfo.name+'</td>\n\\n\
                                    <td class="text-center">'+v.Contactpersoninfo.phone+'</td>\n\\n\\n\
                                    <td class="text-center">'+sal_no+'</td>\n\\n\
                                    <td class="text-center">'+del_no+'</td>\n\\n\
                                    <td class="text-center">'+v.assign.assignedto+'</td>\n\\n\
                                    <td class="text-center">'+v.branch.branchname+'</td>\n\\n\
                                    <td class="text-center">'+v.Candd.remarks+'</td>\n\\n\\n\
                                    <td class="text-center"> Shipped : <input type="checkbox" value="'+v.ReadytodeliverItem.id+'" class ="shipping_check" name="shipping"'+checked+''+disabled_ship+'/> Delivered : <input type="'+type_deliver+'" value="'+v.ReadytodeliverItem.id+'" class ="delivered_check" name="delivered"'+checked_del+'/></td>\n\\n\
                                    <td class="text-center"><div class="btn-group"><a id="'+v.Candd.id+'" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-default ready_to_edit"><i class="fa fa-pencil"></i></a><a id="'+v.ReadytodeliverItem.id+'" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger ready_to_delete_del"><i class="fa fa-times"></i></a></div></td></tr>');
                });
            }}
            
	});
        
//        $("#pofull-datatable").on("change", function () {
//        oTable.fnReloadAjax(); // In your case this would be 'tblOrders.fnReloadAjax();'
//        });
        //var g = $('#pofull-datatable').DataTable();
               // g.reload();
    });
    
    /**************************** Candd Collection Tab *********************************/
    /////////////////////////////////////////////////////////////////////////////////////
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
                if(data)
                {
                //alert(data);
		var deliver_data_node = $.parseJSON(data);
                var contact_person      =  deliver_data_node.Customer;
                //console.log(deliver_data_node);
               // alert(contact_person);
                //console.log(data);
                $('.collections_info').empty();
                $.each(deliver_data_node,function(k,v){
                    //alert(v);
                    
                    $('.collections_info').append('<tr class="colletion_'+v.Candd.id+'">\n\\n\
                                    <td class="text-center">'+v.Candd.id+'</td>\n\\n\
                                    <td class="text-center">'+v.Candd.customername+'</td>\n\\n\
                                    <td class="text-center">'+v.Candd.customer_address+'</td>\n\\n\
                                    <td class="text-center">'+v.Contactpersoninfo.name+'</td>\n\\n\
                                    <td class="text-center">'+v.Contactpersoninfo.phone+'</td>\n\\n\\n\
                                    <td class="text-center">'+v.assign.assignedto+'</td>\n\\n\
                                    <td class="text-center">'+v.branch.branchname+'</td>\n\\n\
                                    <td class="text-center">'+v.Candd.remarks+'</td>\n\\n\
                                    <td class="text-center"><div class="btn-group"><a id="'+v.Candd.id+'" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-default ready_to_edit"><i class="fa fa-pencil"></i></a><a id="'+v.Candd.id+'" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger ready_to_delete"><i class="fa fa-times"></i></a></div></td></tr>');
                });
            }
            }
	});}else
    {
        alert("Please select the date");
    }
//    $("#beforedo-datatable").on("change", function () {
//        oTable.fnReloadAjax(); // In your case this would be 'tblOrders.fnReloadAjax();'
//        });
    
    });
    
    
    
    $(document).on('click','.ready_to_edit',function(){
        var ready_to_edit = $(this).attr('id');
       // alert(ready_to_edit);
         $.ajax({
            type: "POST",
            data:"ready_to_edit="+ready_to_edit,
            url: path_url+"/Candds/edit_candds",
            cache: false,
            success: function(data)
            {
                var edit_data_node = $.parseJSON(data);
                
//                console.log(edit_data_node);
//                $('.candds_add').text('<i class="fa fa-plus fa-fw"></i>add');
////                $('#val_range').empty().append('<option value="">Select Range</option>');
//                $.each(parsedata.Instrument.InstrumentBrand, function(k, v)
//                {
//                     $('#val_brand').append('<option value='+v.Brand.id+'>'+v.Brand.brandname+'</option>');
//                });
//                
////                $.each(parsedata.Instrument.InstrumentRange, function(k, v)
////                {
////                     $('#val_range').append('<option value='+v.Range.id+'>'+v.Range.range_name+'</option>');
////                });
//                    
//                $('#val_department').val(dept.Department.departmentname);
//                
//                $('#val_department_id').val(dept.Department.id);
//                //$('#val_model_no').val(parsedata.CustomerInstrument.model_no);
//                $('#QuotationInstrumentId').val(instrument_id);
            }
         });
    });
    
    $(document).on('click','.ready_to_delete_del',function(){
        var ready_to_edit = $(this).attr('id');
       // alert(ready_to_edit);
       var conformation  =   window.confirm('Confirm to delete '+ready_to_edit+' delivery order');  
       if(conformation == true)
           {
               //alert('ds');
         $.ajax({
            type: "POST",
            data:"ready_to_edit="+ready_to_edit,
            url: path_url+"/Candds/ready_to_delete",
            cache: false,
            success: function(data)
            {
                if(data == 'success')
                    {
                        alert('Delivery info is Updated to Ready to Delivery');
                        window.location.reload();
                        
                    }
                if(data == 'failure')
                    {
                        alert('Delivery info Cant be deleted since it is already shipped');
                        window.location.reload();
                        
                    }
//                console.log(edit_data_node);
//                $('.candds_add').text('<i class="fa fa-plus fa-fw"></i>add');
////                $('#val_range').empty().append('<option value="">Select Range</option>');
//                $.each(parsedata.Instrument.InstrumentBrand, function(k, v)
//                {
//                     $('#val_brand').append('<option value='+v.Brand.id+'>'+v.Brand.brandname+'</option>');
//                });
//                
////                $.each(parsedata.Instrument.InstrumentRange, function(k, v)
////                {
////                     $('#val_range').append('<option value='+v.Range.id+'>'+v.Range.range_name+'</option>');
////                });
//                    
//                $('#val_department').val(dept.Department.departmentname);
//                
//                $('#val_department_id').val(dept.Department.id);
//                //$('#val_model_no').val(parsedata.CustomerInstrument.model_no);
//                $('#QuotationInstrumentId').val(instrument_id);
            }
         });
           }
    });
    
    
    
     /**************************** Candd Delivery Tab *********************************/
//    $(document).on('click','.candd_delivery_add',function(){
//        var cd_date1 =   $('.cd_date').val();
//        if($('.cd_date').val()!==''){
//            $('.deliveries_info').empty();
//        $.ajax({
//            type: "POST",
//            data:"cd_date="+cd_date1,
//            url: path_url+"/Candds/get_delivery_tab_info",
//            cache: false,
//            success: function(data_delivery)
//            {
//                if(!data_delivery)
//                {
//                    var deliver_data_node_delivery = $.parseJSON(data_delivery);
//                    var contact_person      =  deliver_data_node_delivery.Customer;
//                   // alert(contact_person);
//                    //console.log(data);
//                    $.each(deliver_data_node_delivery,function(k,v){
//                        //alert(v);
//                        //$('#pofull-datatable').dataTable();
//                        $('.deliveries_info').append('<tr class="delivery_'+v.Candd.id+'">\n\\n\
//                                        <td class="text-center">'+v.Candd.id+'</td>\n\\n\
//                                        <td class="text-center">'+v.Candd.customername+'</td>\n\\n\
//                                        <td class="text-center">'+v.Candd.customer_address+'</td>\n\\n\
//                                        <td class="text-center">'+v.Contactpersoninfo.name+'</td>\n\\n\
//                                        <td class="text-center">'+v.Contactpersoninfo.phone+'</td>\n\\n\\n\
//                                        <td class="text-center">-</td>\n\\n\\n\
//                                        <td class="text-center">-</td>\n\\n\\n\
//                                        <td class="text-center">'+v.branch.branchname+'</td>\n\\n\
//                                        <td class="text-center">'+v.Candd.deliveryorderno+'</td>\n\\n\
//                                        <td class="text-center">'+v.Candd.remarks+'</td>\n\\n\
//                                        <td class="text-center"><div class="btn-group">\n\
//                                        <a data-delete="'+v.Candd.id+'" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger ready_to_delivery_delete">\n\
//                                        <i class="fa fa-times"></i></a></div></td></tr>');
//
//                    });
//                }
//            }
//	});}else
//    {
//        alert("Please select the date");
//    }
//    });
    
    
    
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
        
        if(assign_value!=''){
            var conformation  =   window.confirm('Confirm to move '+checked+' delivery order');  
            if(conformation==true){
                $.ajax({
                    type: "POST",
                    url: path_url+"/Candds/move_deliveryorder",
                    data:'assign_to='+assign_text+'&description_move='+description_move_checked+"&cd_date="+cd_date+"&assign_value="+assign_value,
                    cache: false,
                    success: function(data)
                    {
                        console.log(data); //return false;
                        var checked_node =   $.parseJSON(data);
                        $.each(checked_node,function(k,v){
                            $('.move_'+v).fadeOut('slow',function(){
                            $(this).remove();
                            }); 
                        });
                    }
                });
            }
        }
        else{
            alert('Please Select Assign To Person');
            return false;
        }
   });
   
});