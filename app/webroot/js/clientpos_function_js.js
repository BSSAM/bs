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
\n\<input type="text" name="clientpos_no[]" id="val_ponumber_'+(count-1)+'" class="form-control"/>\n\
<span class="input-group-btn"><button class="btn btn-primary generate_po" id="val_ponumber_'+(count-1)+'" type="button">Generate Po</button></span>\n\
</div></div><div class="col-sm-3">\n\<input type="text" name="po_quantity[]" id="val_pocount'+(count-1)+'" class="form-control"/> </div>\n\
<div class="col-md-1"><div class="btn-group btn-group-sm form-control-static"><div class="btn btn-alt btn-info" id="delete_po" data-delete='+(count-1)+' ><i class="fa fa-minus"></i></div></div> </div></div></div>');
       }
    });
   $(document).on('click','#delete_po',function(){
     var data_length= $(this).attr('data-delete');
     $('.group_po_'+data_length).remove();
   });
   
   $(document).on('click','.generate_po',function()
   {
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
    $(document).on('change','#val_quotation_po',function(){
        var quotation_selected  =   $('#val_quotation_po option:selected').text();
        var quotation_val  =   $('#val_quotation_po option:selected').val();
       
       $('.po_based_clientpo').append('<div class="group_qo_'+(count++)+'"><div class="form-group"><div class="col-sm-11"><input type="hidden" name="quotation_id[]" value="'+quotation_val+'"/><input type="hidden" name="quotation_no[]" value="'+quotation_selected+'"/><div class="col-sm-6  form-control-static">'+quotation_selected+'</div>\n\
                                      <div class="col-sm-4"><input class="form-control" type="text" name="quo_quantity[]"/></div><div class="col-md-1"> <div class="btn-group btn-group-sm"> <div class="btn btn-alt btn-info qo_id_selected"   data-delete ="'+(count-1)+'"  > <i class="fa fa-minus"></i></div> </div> ');
       
       $('#val_quotation_po').prop("selectedIndex",-1);
    });
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
                var po_list  =   data_node.Clientpo;
                var po_list_length  =   data_node.Clientpo.length;
                $('#val_socount').val(description_length);
                var po_ct   =   0;
                if(po_list_length>0){
                    $('.sales_po_update').empty();
                $.each(po_list,function(k,v){
                    po_ct   =   po_ct+1;
                    if(po_ct==1){var symbol = 'fa-plus' ;var action="add_so_po"; }else{var symbol = 'fa-minus' ;var action="delete_po";}
                    $('.sales_po_update').append('<div class="group_po_'+v.id+'"><div class="form-group"><div class="col-sm-10"><div class="input-group">\n\
\n\<input type="text" name="clientpos_no[]" id="val_ponumber_'+v.id+'" class="form-control" value="'+v.clientpos_no+'"/>\n\
<span class="input-group-btn"><button class="btn btn-primary generate_po" id="val_ponumber_'+v.id+'" type="button">Generate Po</button></span>\n\
</div></div><div class="col-sm-3">\n\<input type="text" name="po_quantity[]" id="val_pocount'+v.id+'" class="form-control" value="'+v.po_quantity+'"/> </div>\n\
<div class="col-md-1"><div class="btn-group btn-group-sm form-control-static"><div class="btn btn-alt btn-info" id="'+action+'" data-delete='+v.id+' ><i class="fa '+symbol+'"></i></div></div> </div></div></div>');
                });
            }
               
                $('.so_based_quotation').html('<div class="group_qo_'+data_node.Quotation.id+'"><div class="form-group"><div class="col-sm-12"><input type="hidden" name="quotation_id[]" value="'+data_node.Quotation.id+'"/><input type="hidden" name="quotation_no[]" value="'+data_node.Quotation.quotationno+'"/><div class="col-sm-6  form-control-static">'+data_node.Quotation.quotationno+'</div>\n\
                                      <div class="col-sm-4"><input class="form-control" type="text" name="quo_quantity[]" value="'+description_length+'" readonly/></div><div class="col-md-1"> <div class="btn-group btn-group-sm"> <div class="btn btn-alt btn-info qo_id_selected"   data-delete ="'+data_node.Quotation.id+'"  > <i class="fa fa-minus"></i></div> </div> ');
               
            }
	});
    });
     var count=1;
    $(document).on('click','#add_so_po',function(){
         var so_inst_count  =$('#val_socount').val(); 
       if($('#val_pocount').val()!=so_inst_count)
       {
            $('.po_up').append('<div class="group_po_'+(count++)+'"><div class="form-group"><div class="col-sm-10"><div class="input-group">\n\
\n\<input type="text" name="clientpos_no[]" id="val_ponumber_'+(count-1)+'" class="form-control"/>\n\
<span class="input-group-btn"><button class="btn btn-primary generate_po" id="val_ponumber_'+(count-1)+'" type="button">Generate Po</button></span>\n\
</div></div><div class="col-sm-3">\n\<input type="text" name="po_quantity[]" id="val_pocount'+(count-1)+'" class="form-control"/> </div>\n\
<div class="col-md-1"><div class="btn-group btn-group-sm form-control-static"><div class="btn btn-alt btn-info" id="delete_po" data-delete='+(count-1)+' ><i class="fa fa-minus"></i></div></div> </div></div></div>');
       }
    });
    $('#sales_order').blur(function(){
        $(this).val('');
         $('#so_result').fadeOut();
    });
    /**********************So Search For Client Po Module End*****************************************************************************/
});
