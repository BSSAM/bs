/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
    var count=1;
    $(document).on('click','#add_po',function(){
       var quo_inst_count  =$('#val_quotationcount').val(); 
       if($('#val_pocount').val()!=quo_inst_count)
       {
            $('.po_up').append('<div class="group_po_'+(count++)+'"><div class="form-group"><div class="col-sm-10"><div class="input-group">\n\
\n\<input type="text" name="clientpos_no[]" id="val_ponumber_'+(count-1)+'" class="form-control "/>\n\
<span class="input-group-btn"><button class="btn btn-primary generate_po" id="val_ponumber_'+(count-1)+'" type="button">Generate Po</button></span>\n\
</div></div><div class="col-sm-3">\n\<input type="text" name="po_quantity[]" id="val_pocount'+(count-1)+'" class="form-control"/> </div>\n\
<div class="col-md-1"><div class="btn-group btn-group-sm form-control-static"><div class="btn btn-alt btn-info" id="delete_po" data-delete='+(count-1)+' ><i class="fa fa-minus"></i></div></div> </div></div></div>');
       }
    });
   $(document).on('click','#delete_po',function(){
     var data_length= $(this).attr('data-delete');
     $('.group_po_'+data_length).remove();
   });
   
   $(document).on('click','.generate_po',function() {
       var po_id    =   $(this).attr('id');
       $.ajax({
           type:'POST',
           url:path_url+'/Clientpos/get_random_ponumber/',
           success:function(data){
                  $('#'+po_id).val(data);
                }
       });
   });
   $(document).on('change','#val_quotation',function(){
       $('#customer_quotation_no').val($('#val_quotation option:selected').text());
       var  quotation_id =$(this).val();
       if(quotation_id!=''){
        $.ajax({
		type: 'POST',
                data:"quotation_id="+quotation_id,
		url: path_url+'/Clientpos/get_quotation_values/',
                success:function(data){
                   // var data_node   =   $.parseJSON(data);
                    var $response    =   $(data);
                    $('.quo_based_clientpo').html(data);
                    //$('#val_quotationcount').val(data_node.Device.length);
                    $('#val_quotationcount').val($response.filter('#device_length').val());
                    //$('#track_id').val(data_node.Quotation.track_id);
                  
                }
            });
        }
        else
        {
            $('#val_quotationcount').val('');
        }
    });
    /******************************Quotation append with the Quantity in purchase order full invoice***********************************/
    $(document).on('change','#val_quotation_po',function(){
        var quotation_selected  =   $('#val_quotation_po option:selected').text();
        var quotation_val  =   $('#val_quotation_po option:selected').val();
        var qlength =   $('.'+quotation_selected).length;
        if(quotation_val!='' && qlength==0){
        $('.po_based_clientpo').append('<div class="group_qo_'+(count++)+' '+quotation_selected+'"><div class="form-group"><div class="col-sm-11"><input type="hidden" name="quotation_id[]" value="'+quotation_val+'"/><input type="hidden" name="quotation_no[]" value="'+quotation_selected+'"/><div class="col-sm-6  form-control-static">'+quotation_selected+'</div>\n\
                                      <div class="col-sm-4"><input class="form-control clentpo_qo_count" readonly="readonly" value="'+quotation_val+'" type="text" name="quo_quantity[]"/></div><div class="col-md-1"> <div class="btn-group btn-group-sm"> <div class="btn btn-alt btn-info qo_id_selected"   data-delete ="'+(count-1)+'"  > <i class="fa fa-minus"></i></div> </div> ');
        }
        if(qlength==0){
        $.ajax({
            type: "POST",
            url: path_url+"/Clientpos/get_quotation_relateddetails",
            data: 'qo_id='+quotation_selected,
            cache: false,
            success: function(data)
            {
                var parse_node  =   $.parseJSON(data);
                if($.isEmptyObject(parse_node.Salesorder)){
                    $('.salesorder_by_quotation').append('<p class="themed-color-fire  pull-left">Sales order not yet created for '+quotation_selected+'</p>'); }
                else{$('.salesorder_by_quotation').empty();
                     $('.salesorder_by_quotation').html('<p class="themed-color-spring">Salesorders for '+quotation_selected+'</p>');
                $.each(parse_node.Salesorder,function(k,v){
                  $('.salesorder_by_quotation').append('<div class="form-group col-md-8"><div class="input text"><input type="text" value="'+k+'" readonly="readonly" placeholder="Sales Order No" class="form-control" id="val_salesorderno" name="salesorder_id[]"></div></div><div class="form-group col-md-3 row"><div class="input text"><input type="text" maxlength="20" placeholder="So Count" value="'+v+'" readonly="readonly" class="form-control" id="val_salesordercount" name="sales_quantity[]"></div></div>');
                });}
            
             if($.isEmptyObject(parse_node.Deliveryorder)){
                    $('.deliveryorder_by_quotation').append('<p class="themed-color-fire">Delivery order not yet created for '+quotation_selected+'</p>'); }
                else{$('.deliveryorder_by_quotation').empty();  $('.deliveryorder_by_quotation').html('<p class="themed-color-spring">Delivery orders for '+quotation_selected+'</p>');
              $.each(parse_node.Deliveryorder,function(k,v){
                  $('.deliveryorder_by_quotation').append('<div class="form-group col-md-8"><div class="input text"><input type="text" value="'+k+'" readonly="readonly" placeholder="Delivery Order No" class="form-control" id="val_deliveryorderno" name="deliveryorder_id[]"></div></div><div class="form-group col-md-3 row"><div class="input text"><input type="text" maxlength="20" placeholder="Do Count" value="'+v+'" readonly="readonly" class="form-control" id="val_deliveryordercount" name="delivery_quantity[]"></div></div>');
                  
                });}
                
                
              
            }
            });
        }
        $('#val_quotation_po').prop("selectedIndex",-1);
    });
    /****************************Delete quotation in purchase order and others*****************************/
     $(document).on('click','.qo_id_selected',function(){
     var data_length= $(this).attr('data-delete');
     $('.group_qo_'+data_length).remove();
    });
   /**********************Po Search For Client Po Module*****************************************************************************/
    $("#po_result").hide();
    $("#purchase_order").keyup(function() 
    { 
        var po_id = $(this).val();
        var customer_id =   $('#customer_for_quotation_id').val();
        var dataString = 'po_id='+ po_id+'&customer_id='+customer_id;
        if(po_id!='')
        {
            $.ajax({
            type: "POST",
            url: path_url+"/Clientpos/po_search",
            data: dataString,
            cache: false,
            success: function(html)
            {
                $("#po_result").html(html).show();
            }
            });
        }
    });
    /**********************Po Search For Client Po Module End*****************************************************************************/
    $(document).on('click','.po_single_show',function(){
        var po_id_name=$(this).text();
        $('#purchase_order').val(po_id_name);
        $('#po_result').fadeOut('slow');
        var po_id=$(this).attr('id');
        var customer_id =   $('#customer_for_quotation_id').val();
        $.ajax({
            type: "POST",
            url: path_url+"/Clientpos/get_po_quotations",
            data: 'customer_id='+customer_id+'&po_id='+po_id,
            cache: false,
            success: function(data)
            {
                // var data_node   =   $.parseJSON(data);
                var $response    =   $(data);
                
                $('.po_based_clientpo').html(data);
                //$('#val_quotationcount').val(data_node.Device.length);
                $('#val_pocount').val($response.filter('.pocount').val());
                //$('#track_id').val(data_node.Quotation.track_id);
            }
	});
    });
    $('#purchase_order').blur(function(){
         $('#po_result').fadeOut();
    });
    /**********************SO Search For Client Po Module*****************************************************************************/
    $("#so_result").hide();
    $("#sales_order").keyup(function() 
    { 
        var so_id = $(this).val();
        var customer_id =   $('#customer_for_quotation_id').val();
        var dataString = 'so_id='+ so_id+'&customer_id='+customer_id;
        if(so_id!='')
        {
            $.ajax({
            type: "POST",
            url: path_url+"/Clientpos/so_search",
            data: dataString,
            cache: false,
            success: function(html)
            {
                $("#so_result").html(html).show();
            }
            });
        }
    });
    /******************************************************************************************************************/
    $(document).on('click','.so_single_show',function(){
       
        var po_id_name=$(this).text();
        $('#sales_order').val(po_id_name);
        $('#so_result').fadeOut('slow');
        var so_id=$(this).attr('id');
        var customer_id =   $('#customer_for_quotation_id').val();
        $.ajax({
            type: "POST",
            url: path_url+"/Clientpos/get_so_quotations",
            data: 'customer_id='+customer_id+'&so_id='+so_id,
            cache: false,
            success: function(data)
            {
                var data_node   =$.parseJSON(data);
                var description_length  =   data_node.Description.length;
                $('#val_socount').val(description_length);
                $('.sales_po_update').empty();
                $('.sales_po_update').append('<div class="group_po_'+(count++)+'"><div class="form-group col-md-8"><input placeholder="Enter Additional PO Number" type="text" name="clientpos_no[]" value="'+data_node.Salesorder.ref_no+'" id="val_ponumber_'+(count-1)+'" class="form-control get_ponumber_collection"/></div><div class="form-group col-sm-3">\n\<input type="text" placeholder="PO Count" name="po_quantity[]" id="val_pocount'+(count-1)+'" class="form-control po_count_each"/> </div>\n\
<div class="col-md-1 row"><div class="btn-group btn-group-sm form-control-static"><div class="btn btn-alt btn-info" id="add_so_po" data-delete='+(count-1)+' ><i class="fa fa-plus"></i></div></div></div></div>');
                $('.so_based_quotation').html('<div class="group_qo_'+data_node.Quotation.id+'"><div class="form-group"><div class="col-sm-12"><input type="hidden" name="quotation_id[]" value="'+data_node.Quotation.id+'"/><input type="hidden" name="quotation_no[]" value="'+data_node.Quotation.quotationno+'"/><div class="col-sm-6  form-control-static">'+data_node.Quotation.quotationno+'</div>\n\
                                      <div class="col-sm-4"><input class="form-control" type="text" name="quo_quantity[]" value="'+description_length+'" readonly/></div><div class="col-md-1"> <div class="btn-group btn-group-sm"></div> ');
            }
	});
    });
     var count=1;
    $(document).on('click','#add_so_po',function(){
       var so_inst_count  =$('#val_socount').val(); 
       if($('#val_pocount').val()!=so_inst_count)
       {
            $('.po_up').append('<div class="group_po_'+(count++)+'"><div class="form-group col-md-8"><input placeholder="Enter Additional PO Number" type="text" name="clientpos_no[]" id="val_ponumber_'+(count-1)+'" class="form-control get_ponumber_collection"/></div><div class="form-group col-sm-3">\n\<input type="text" placeholder="PO Count" name="po_quantity[]" id="val_pocount'+(count-1)+'" class="form-control po_count_each"/> </div>\n\
<div class="col-md-1 row"><div class="btn-group btn-group-sm form-control-static"><div class="btn btn-alt btn-info" id="delete_po" data-delete='+(count-1)+' ><i class="fa fa-minus"></i></div></div></div></div>');
       }
    });
     $(document).on('click','#add_so_po',function(){
       var so_inst_count  =$('#val_socount').val(); 
       if($('#val_pocount').val()!=so_inst_count)
       {
            $('.po_up').append('<div class="group_po_'+(count++)+'"><div class="form-group col-md-8"><input placeholder="Enter Additional PO Number" type="text" name="clientpos_no[]" id="val_ponumber_'+(count-1)+'" class="form-control get_ponumber_collection"/></div><div class="form-group col-sm-3">\n\<input type="text" placeholder="PO Count" name="po_quantity[]" id="val_pocount'+(count-1)+'" class="form-control po_count_each"/> </div>\n\
<div class="col-md-1 row"><div class="btn-group btn-group-sm form-control-static"><div class="btn btn-alt btn-info" id="delete_po" data-delete='+(count-1)+' ><i class="fa fa-minus"></i></div></div></div></div>');
       }
    });
    /*************************************For Po Update in POP up on ClientPoApproval*************************************************/
    $(document).on('click','#po_plus',function(){
            $('.po_up').append('<div class="group_po_'+(count++)+'"><div class="form-group"><label class="col-md-2 control-label" for="ponumber[]">Additional PO Number</label>	<div class="col-md-4 row"><input placeholder="Enter PO Number" type="text" name="ponumber[]" id="val_ponumber_'+(count-1)+'" class="form-control get_ponumber_collection"/></div><div class="col-md-2">\n\<input type="text" placeholder="PO Count" name="pocount[]" id="val_pocount'+(count-1)+'" class="form-control po_count_each"/></div>\n\<div class="col-md-1 row"><div class="btn-group btn-group-sm form-control-static"><div class="btn btn-alt btn-info" id="delete_po" data-delete='+(count-1)+'><i class="fa fa-minus"></i></div></div></div></div></div>');
    });
    /**************************************************************************************/
    $('#sales_order').blur(function(){
        $(this).val('');
         $('#so_result').fadeOut();
    });
    /**********************Delivery order full invoice order no Search*****************************************************************************/
    $(".do_result").hide();
    $("#val_deliveryorderno_fullinvoice").keyup(function() 
    { 
        var do_id = $(this).val();
        var customer_id =   $('#customer_for_quotation_id').val();
        var dataString = 'do_id='+ do_id+'&customer_id='+customer_id;
        if(do_id!='')
        {
            $.ajax({
            type: "POST",
            url: path_url+"/Clientpos/do_search",
            data: dataString,
            cache: false,
            success: function(html)
            {
                $(".do_result").html(html).show();
            }
            });
        }
    });
 /**********************Do Search For Client Po  Module *****************************************************************************/
    var count=1;
    $(document).on('click','.do_single_show',function(){
        var do_id_name=$(this).text();
        var data_count=$(this).attr('data-count');
        $('#val_socount').val(data_count);
        $('#val_deliveryorderno_fullinvoice').val(do_id_name);
        $('.do_result').hide('slow');
        var do_id=$(this).attr('id');
        var customer_id =   $('#customer_for_quotation_id').val();
        $.ajax({
            type: "POST",
            url: path_url+"/Clientpos/get_delivery_id_details",
            data: 'del_id='+do_id+'&customer_id='+customer_id,
            cache: false,
            success: function(data)
            {
                var delivery_data_node  =   $.parseJSON(data);
                
                /*******for Salesorder count*********/
                $('.do_based_salesorder').html(' <div class="form-group col-md-8"><div class="input text"><input type="text" placeholder="Salesorder No" readonly="readonly" value="'+delivery_data_node.Salesorder.salesorderno+'" class="form-control"  name="salesorder_id"></div></div><div class="form-group col-md-3 row"><div class="input text"><input type="text" maxlength="20" placeholder="So Count" value="'+delivery_data_node.Salesorder.Description_count+'" readonly="readonly" class="form-control" name="salesorder_quantity"></div> </div>');
                /*******for Quotation count*********/
                $('.do_based_quotation').html(' <div class="form-group col-md-8"><div class="input text"><input type="text" placeholder="Quotation No" readonly="readonly" value="'+delivery_data_node.Quotation.quotationno+'" class="form-control"  name="quotation_id"></div></div><div class="form-group col-md-3 row"><div class="input text"><input type="text" maxlength="20" placeholder="Qo Count" value="'+delivery_data_node.Quotation.device_count+'" readonly="readonly" class="form-control" name="quotation_quantity"></div> </div>');
                /*******for Purchaseorder count*********/
                $('.do_based_po').html('<div class="group_po_'+(count++)+'"><div class="form-group col-md-8"><input placeholder="Enter Additional PO Number" type="text" name="clientpos_no[]" value="'+delivery_data_node.Purchaseorder.po_reference_no+'" id="val_ponumber_'+(count-1)+'" class="form-control get_ponumber_collection"/></div><div class="form-group col-sm-3">\n\<input type="text" placeholder="PO Count" name="po_quantity[]" id="val_pocount'+(count-1)+'" class="form-control po_count_each"/> </div>\n\
<div class="col-md-1 row"><div class="btn-group btn-group-sm form-control-static"><div class="btn btn-alt btn-info" id="add_so_po" data-delete='+(count-1)+' ><i class="fa fa-plus"></i></div></div></div></div>');
            }
            });
    });
    $('#purchase_order').blur(function(){
         $('#po_result').fadeOut();
    });
    /*****************************For Do Full Invoice So id Change******************************************/
    var count=1;
    $(document).on('change','#val_salesorder',function(){
        var salesorder_selected  =   $('#val_salesorder option:selected').text();
        var salesorder_val  =   $('#val_salesorder option:selected').val();
       
       $('.sales_list_id').append('<div class="group_do_'+(count++)+'"><div class="form-group"><div class="col-sm-11"><input type="hidden" name="salesorder_id[]" value="'+salesorder_val+'"/><input type="hidden" name="salesorder_no[]" value="'+salesorder_selected+'"/><div class="col-sm-6  form-control-static">'+salesorder_selected+'</div>\n\
                                      <div class="col-sm-4"><input readonly="readonly" class="form-control" type="text" name="so_quantity[]"/></div><div class="col-md-1"> <div class="btn-group btn-group-sm"> <div class="btn btn-alt btn-info do_id_selected"   data-delete ="'+(count-1)+'"  > <i class="fa fa-minus"></i></div> </div> ');
       $('#val_salesorder').prop("selectedIndex",-1);
    });
    $(document).on('click','.do_id_selected',function(){
     var data_length= $(this).attr('data-delete');
     $('.group_do_'+data_length).remove();
   });
   /***********************************Purchase order full invoice form submit validation******************************/
   $(document).on('click','.pofull_invoice_submit',function(){
       var qo_total_count = getValues('.clentpo_qo_count');
       var po_count =   $('#val_pocount').val();
       if(po_count!=qo_total_count)
       {
           alert('PO Count Not matched with Quotations Count');
           return false;
       } 
   });
  
   function getValues(selector)
   {
       var tempValues=0;
        $(selector).each(function(){
           var th= $(this);
           tempValues += Number(th.val());
         });
        return tempValues;
    }
  /**************************************Sales order full invoice form submit validation*********************************/
   $(document).on('click','.salesorder_fullinvoice_update',function(){
        var total_reply=0;var check_count=0;
        var po_total_count = getValues('.po_count_each');
        var so_count    =$('#val_socount').val();
        if(po_total_count!=so_count){ alert('PO Count not matched with Salesorder Count');  return false;     }
        $('.get_ponumber_collection').each(function(){
           check_count  =   check_count+1;
           var  inputString = $(this).val();
           var findme       =  'CPO';
           var reply_check  =   inputString.indexOf(findme);
           if(reply_check==0){ alert('Provide original PO Number for '+check_count);  return false;}   
         });
   });
   /**************************************Client po Quotation update*********************************/
   
   $(document).on('click','.client_po_quotation_update',function(){
      
        var q_id=$(this).attr('data-id');
        $.ajax({
            type: "POST",
            url: path_url+"/Clientposapproval/view",
            data: 'q_id='+q_id,
            cache: false,
            success: function(data)
            {
                $('.quotation_fullview').html(data);
            }
            });
    });
});
