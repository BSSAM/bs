/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
    $(document).on('change','#instrument_name',function(){
//        $(this).addClass('instrument_select');
//        var instrument_id =   $('ul.chosen-results').find('.instrument_select').attr('data-option-array-index');
//        var instrument_name=   $('ul.chosen-results').find('.instrument_select').text();
//        $('#ins_id').val(instrument_id);
//        $('#ins_name').val(instrument_name);
        var instrument_id   =   $(this).val();
        $.ajax({
		type: 'POST',
                data:"instrument_id="+instrument_id,
		url: path_url+'/customers/get_range/',
                success:function(data){
                    $('#range_array').empty().append(data);
                }
            });
    });
    $(document).on('click','.customerinstrument_add',function(){
       
//        if($('#instrument_name').val()=='')
//        {
//            $('.instrument_name').addClass('animation-slideDown');
//            $('.instrument_name').css('color','red');
//            $('.instrument_name').show();
//            return false;
//        }
        var range   =   $('#range_array').val();
        var customer_id =   $('#CustomerInstrumentCustomerId').val();
        var instrument_id   =   $('#instrument_name option:selected').val();
        var instrument_name =    $('#instrument_name option:selected').text();
        var model_no =   $('#model_no').val();
        var unit_price=$('#unit_price').val();
        //var status  =   $('#status').val();
        if ($('#status').is(":checked"))
        {
            var status = 1;
        }
        else
        {
            var status = 0;
        }
      // return false;
        
        $.ajax({
            type: 'POST',
            data:"customer_id="+customer_id+"&instrument_id="+instrument_id+"&instrument_name="+instrument_name+"&model_no="+model_no+"&unit_price="+unit_price+"&status="+status+"&range_id="+range,
            url: path_url+'Customers/add_customer_instrument/',
            success: function(data)
            {
                var node_data   =   $.parseJSON(data);
                if (node_data.CustomerInstrument.status == "1"){  var status    =   "Active";                 
                }else{    var status    =   "Inactive";               
                }
               $('.customer_instrument_info').empty().append('<tr class="cus_instrument_remove_'+node_data.CustomerInstrument.id+'">\n\\n\
                                    <td class="text-center">'+node_data.Instrument.id+'</td>\n\
                                    <td class="text-center">'+instrument_name+'</td>\n\\n\
                                    <td class="text-center">'+node_data.CustomerInstrument.model_no+'</td>\n\
                                    <td class="text-center">'+node_data.Range.range_name+'</td>\n\\n\
                                    <td class="text-center">'+node_data.CustomerInstrument.unit_price+'</td>\n\\n\\n\\n\
                                    <td class="text-center">'+status+'</td>\n\\n\\n\
                                    <td class="text-center"><div class="btn-group">\n\
                                    <a data-edit="'+node_data.CustomerInstrument.id+'"class="btn btn-xs btn-default cus_instrument_edit" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>\n\
                                    <a data-delete="'+node_data.CustomerInstrument.id+'" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger cus_instrument_delete">\n\
                                    <i class="fa fa-times"></i></a></div></td></tr>');
                $('#instrument_name').prop('selectedIndex', -1);
                $('#model_no').val(null);
                $('#unit_price').val(null);
                $('#range_array').empty().append('<option value="">Select Range</option>');
                $('#status').val(null);
                }
        });
    });
    $(document).on('click','.cus_instrument_delete',function(){
        var result = confirm("Are your sure want to delete?");
        if (result==true) {
        var device_id=$(this).attr('data-delete');
        $.ajax({
            type: 'POST',
            data:"device_id="+ device_id,
            url: path_url+'/Customers/delete_cusinstrument/',
            success:function(data){
                $('.cus_instrument_remove_'+device_id).fadeOut();
            }
        });
        
            $('#range_array').empty().append('<option value="" selected="selected">Select Brand</option>');
            $('#model_no').val(null);
            $('#unit_price').val(null);
            $('#status').prop('checked',false);
            $('#instrument_name_chosen span').text('Select Instrument Name');
            $('.customer_instrument_info').append('<tbody><tr><td class="text-center">No data available in table</td></tr></tbody>');
    }
   });
  //for customer Instrument Edit process
    $(document).on('click','.cus_instrument_edit',function(){
       // alert($('#status').val());
      var edit_device_id=$(this).attr('data-edit');
      $('#device_id').val(edit_device_id);
      $('.update_device').html('<button class="btn btn-sm btn-primary cus_ins_update" type="button"><i class="fa fa-plus fa-fw"></i> Update</button>');
       $.ajax({
            type: 'POST',
            data:"edit_device_id="+ edit_device_id,
            url: path_url+'/Customers/edit_instrument/',
            success:function(data){
                console.log(data);
                edit_node=$.parseJSON(data);
                $('#ins_id').val(edit_node.Instrument.id);
                $('#ins_name').val(edit_node.Instrument.name);
                $('#instrument_id').val(edit_node.Instrument.id);
                $('#instrument_name').text(edit_node.Instrument.name);
                $('#instrument_name').prop('disabled', 'disabled');
                $('#model_no').val(edit_node.CustomerInstrument.model_no);
                $('#unit_price').val(edit_node.CustomerInstrument.unit_price);
                //$('#status').val(edit_node.CustomerInstrument.status);
                $('#range_array').empty().append('<option value="">Select Brand</option><option selected="selected" value="'+edit_node.Range.id+'">'+edit_node.Range.range_name+'</option>');
                $('#instrument_name_chosen span').text(edit_node.Instrument.name);
                var check=(edit_node.CustomerInstrument.status==1)?true:false;
                //alert(check);
               // alert($('#status').val());
                $('#status').prop('checked',check);
            }
        });
   });
   //for Instrument Update Process
    $(document).on('click','.cus_ins_update',function(){
    
//        if($('#instrument_name').val()=='')
//        {
//            $('.ins_error').addClass('animation-slideDown');
//            $('.ins_error').css('color','red');
//            $('.ins_error').show();
//            return false;
//        }
        $('.update_device').html('<button class="btn btn-sm btn-primary customerinstrument_add" type="button"><i class="fa fa-plus fa-fw"></i> add</button>');
        var range   =   $('#range_array').val();
        var customer_id =   $('#CustomerInstrumentCustomerId').val();
        var instrument_id   =   $('#ins_id').val();
        var instrument_name =    $('#ins_name').val();
        
        var model_no =   $('#model_no').val();
        var device_id   =   $('#device_id').val();
        var unit_price=$('#unit_price').val();
        if ($('#status').is(":checked"))
        {
            var status = 1;
        }
        else
        {
            var status = 0;
        }
        var check=(status==1)?'Active':'In Active';
        $.ajax({
            type: 'POST',
            data:"instrument_id="+instrument_id+"&instrument_name="+instrument_name+"&model_no="+model_no+"&unit_price="+unit_price+"&status="+status+"&range_id="+range+"&device_id="+device_id,
            url: path_url+'Customers/update_instrument/',
            success: function(data)
            {
               node_data=$.parseJSON(data);
               $('.cus_instrument_remove_'+device_id).remove();
               $('.customer_instrument_info').append('<tr class="cus_instrument_remove_'+node_data.CustomerInstrument.id+'">\n\\n\
                                    <td class="text-center">'+node_data.CustomerInstrument.id+'</td>\n\
                                    <td class="text-center">'+instrument_name+'</td>\n\\n\
                                    <td class="text-center">'+node_data.CustomerInstrument.model_no+'</td>\n\
                                    <td class="text-center">'+node_data.Range.range_name+'</td>\n\\n\
                                    <td class="text-center">'+node_data.CustomerInstrument.unit_price+'</td>\n\\n\\n\\n\
                                    <td class="text-center">'+check+'</td>\n\\n\\n\
                                    <td class="text-center"><div class="btn-group">\n\
                                    <a data-edit="'+node_data.CustomerInstrument.id+'"class="btn btn-xs btn-default cus_instrument_edit" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>\n\
                                    <a data-delete="'+node_data.CustomerInstrument.id+'" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger cus_instrument_delete">\n\
                                    <i class="fa fa-times"></i></a></div></td></tr>');
                
                $('#range_array').append('<option value="" selected="selected">Select Brand</option>');
                $('#model_no').val(null);
                $('#unit_price').val(null);
                $('#status').prop('checked',false);
                $('#instrument_name_chosen span').text('Select Instrument Name');
                }
        });
        
   });
    $('#save_regadd').click(function()
    {
        if($('#val_regaddress').val()=='')
        {
            $('.project_name_error').addClass('animation-slideDown');
            $('.project_name_error').css('color','red');
            $('.project_name_error').show();
            return false;
        }
        //var serial=(Math.random()+' ').substring(2,6)+(Math.random()+' ').substring(2,6);
        var regaddress=$('#val_regaddress').val();
        var n = $("ul#tabs_reg li").size()+1;
          $('#tab-content').append('<div class="tab-pane" id="example-tabs2-Address'+n+'">'+regaddress+'</div>');
          $('#val_regaddress').val(null);
        var customer_id    =   $('#customer_id').val();
        var tag_id    =   $('#CustomerTagId').val();
        var group_id    =   $('#CustomerGroupId').val();
          $.ajax({
            type: 'POST',
            data:"regaddress="+regaddress+"&customer_id="+customer_id+"&tag_id="+tag_id+"&group_id="+group_id,
            url: path_url+'/customers/addregaddress/',
            success:function(data){
                $('#tabs_reg').append('<li id="'+data+'"><a href="#example-tabs2-Address'+n+'"><button class="close" type="button" id="'+data+'" >×</button>Address'+n+'</a></li>');
            }
        });
        $('#modal-registered').modal('hide');
    
    });
    
    $('#save_billadd').click(function()
    {
        if($('#val_billaddress').val()=='')
        {
            $('.project_name_error').addClass('animation-slideDown');
            $('.project_name_error').css('color','red');
            $('.project_name_error').show();
            return false;
        }
        //var serial=(Math.random()+' ').substring(2,6)+(Math.random()+' ').substring(2,6);
        var billaddress=$('#val_billaddress').val();
        var customer_id    =   $('#customer_id').val();
        var tag_id    =   $('#CustomerTagId').val();
        var group_id    =   $('#CustomerGroupId').val();
         var n = $("ul#tabs_bill li").size()+1;
          $('#tab-content_bill').append('<div class="tab-pane" id="example-tabs2-billing'+n+'">'+billaddress+'</div>');
          $('#val_billaddress').val(null);
         
          $.ajax({
            type: 'POST',
            data:"billaddress="+billaddress+"&customer_id="+customer_id+"&tag_id="+tag_id+"&group_id="+group_id,
            url: path_url+'/customers/addbilladdress/',
            success:function(data){
                $('#tabs_bill').append('<li id="'+data+'"><a href="#example-tabs2-billing'+n+'"><button class="close" type="button" id="'+data+'">×</button>Address'+n+'</a></li>');
                
            }
                    
        });
        $('#modal-billing').modal('hide');
    
    });
    
    $('#save_deliveryadd').click(function()
    {
        if($('#val_deliveryaddress').val()=='')
        {
            $('.project_name_error').addClass('animation-slideDown');
            $('.project_name_error').css('color','red');
            $('.project_name_error').show();
            return false;
        }
        //var serial=(Math.random()+' ').substring(2,6)+(Math.random()+' ').substring(2,6);
        var deliveryaddress=$('#val_deliveryaddress').val();
        var customer_id    =   $('#customer_id').val();
        var tag_id    =   $('#CustomerTagId').val();
        var group_id    =   $('#CustomerGroupId').val();
         var n = $("ul#tabs_delivery li").size()+1;
          $('#tab-content_delivery').append('<div class="tab-pane" id="example-tabs2-delivery'+n+'">'+deliveryaddress+'</div>');
          $('#val_deliveryaddress').val(null);
         
          $.ajax({
            type: 'POST',
            data:"deliveryaddress="+deliveryaddress+"&customer_id="+customer_id+"&tag_id="+tag_id+"&group_id="+group_id,
            url: path_url+'/customers/adddeliveryaddress/',
            success:function(data){
                $('#tabs_delivery').append('<li id="'+data+'"><a href="#example-tabs2-delivery'+n+'"><button class="close" type="button" id="'+data+'">×</button>Address'+n+'</a></li>');
                
            }
                    
        });
        $('#modal-delivery').modal('hide');
    
    });
    
     $('#save_projectadd').click(function()
    {
        if($('#val_projectname').val()=='')
        {
            $('.project_name_error').addClass('animation-slideDown');
            $('.project_name_error').css('color','red');
            $('.project_name_error').show();
            return false;
        }
        //var serial=(Math.random()+' ').substring(2,6)+(Math.random()+' ').substring(2,6);
        var projectname = $('#val_projectname').val();
        
        var n = $("ul#tabs_project li").size()+1;
          $('#tab-content_project').append('<div class="tab-pane " id="example-tabs2-project'+n+'">'+projectname+'</div>');
          $('#val_projectname').val(null);
        var customer_id    =   $('#customer_id').val();
        var tag_id    =   $('#CustomerTagId').val();
          $.ajax({
            type: 'POST',
            data:"projectname="+projectname+"&customer_id="+customer_id+"&tag_id="+tag_id,
            url: path_url+'/customers/addprojectinfo/',
            success:function(data){
                $('#tabs_project').append('<li id="'+data+'"><a href="#example-tabs2-project'+n+'"><button class="close" type="button" id="'+data+'">×</button>Project'+n+'</a></li>');
                
            }
                    
        });
        $('#modal-project').modal('hide');
    
    });
    
    $('#save_regedit').click(function()
    {
        if($('#val_regaddress').val()=='')
        {
            $('.project_name_error').addClass('animation-slideDown');
            $('.project_name_error').css('color','red');
            $('.project_name_error').show();
            return false;
        }
        //var serial=(Math.random()+' ').substring(2,6)+(Math.random()+' ').substring(2,6);
        var regaddress=$('#val_regaddress').val();
        var customer_id    =   $('#customer_id').val();
        var tag_id    =   $('#CustomerTagId').val();
         var n = $("ul#tabs_reg li").size()+1;
          $('#tab-content').append('<div class="tab-pane " id="example-tabs2-Address'+n+'">'+regaddress+'</div>');
          $('#val_regaddress').val(null);
         
          $.ajax({
            type: 'POST',
            data:"regaddress="+regaddress+"&customer_id="+customer_id+"&tag_id="+tag_id,
            url: path_url+'/customers/editregaddress/',
            success:function(data){
                $('#tabs_reg').append('<li id="'+data+'" ><a href="#example-tabs2-Address'+n+'"><button class="close" type="button" id="'+data+'" >×</button>Address'+n+'</a></li>');
            }
                    
        });
        $('#modal-registered').modal('hide');
    
    });
    
    $('#save_billedit').click(function()
    {
        if($('#val_billaddress').val()=='')
        {
            $('.project_name_error').addClass('animation-slideDown');
            $('.project_name_error').css('color','red');
            $('.project_name_error').show();
            return false;
        }
        //var serial=(Math.random()+' ').substring(2,6)+(Math.random()+' ').substring(2,6);
        var billaddress=$('#val_billaddress').val();
        var customer_id    =   $('#customer_id').val();
        var tag_id    =   $('#CustomerTagId').val();
        var n = $("ul#tabs_bill li").size()+1;
          $('#tab-content_bill').append('<div class="tab-pane " id="example-tabs2-billing'+n+'">'+billaddress+'</div>');
          $('#val_billaddress').val(null);
         
          $.ajax({
            type: 'POST',
            data:"billaddress="+billaddress+"&customer_id="+customer_id+"&tag_id="+tag_id,
            url: path_url+'/customers/editbilladdress/',
            success:function(data){
                $('#tabs_bill').append('<li id="'+data+'" ><a href="#example-tabs2-billing'+n+'"><button class="close" type="button" id="'+data+'">×</button>Address'+n+'</a></li>');
                
            }
                    
        });
        $('#modal-billing').modal('hide');
    
    });
    
    $('#save_deliveryedit').click(function()
    {
        if($('#val_deliveryaddress').val()=='')
        {
            $('.project_name_error').addClass('animation-slideDown');
            $('.project_name_error').css('color','red');
            $('.project_name_error').show();
            return false;
        }
        //var serial=(Math.random()+' ').substring(2,6)+(Math.random()+' ').substring(2,6);
        var deliveryaddress=$('#val_deliveryaddress').val();
        var customer_id    =   $('#customer_id').val();
        var tag_id    =   $('#CustomerTagId').val();
        
        var n = $("ul#tabs_delivery li").size()+1;
          $('#tab-content_delivery').append('<div class="tab-pane " id="example-tabs2-delivery'+n+'">'+deliveryaddress+'</div>');
          $('#val_deliveryaddress').val(null);
         
          $.ajax({
            type: 'POST',
            data:"deliveryaddress="+deliveryaddress+"&customer_id="+customer_id+"&tag_id="+tag_id,
            url: path_url+'/customers/editdeliveryaddress/',
            success:function(data){
                $('#tabs_delivery').append('<li id="'+data+'"><a href="#example-tabs2-delivery'+n+'"><button class="close" type="button" id="'+data+'">×</button>Address'+n+'</a></li>');
                
            }
                    
        });
        $('#modal-delivery').modal('hide');
    
    });
    
     $('#save_projectedit').click(function()
    {
        if($('#val_projectname').val()=='')
        {
            $('.project_name_error').addClass('animation-slideDown');
            $('.project_name_error').css('color','red');
            $('.project_name_error').show();
            return false;
        }
        //var serial=(Math.random()+' ').substring(2,6)+(Math.random()+' ').substring(2,6);
        var projectname = $('#val_projectname').val();
        var customer_id    =   $('#customer_id').val();
        var tag_id    =   $('#CustomerTagId').val();
         var n = $("ul#tabs_project li").size()+1;
          $('#tab-content_project').append('<div class="tab-pane active" id="example-tabs2-project'+n+'">'+projectname+'</div>');
          $('#val_projectname').val(null);
         
          $.ajax({
            type: 'POST',
            data:"projectname="+projectname+"&customer_id="+customer_id+"&tag_id="+tag_id,
            url: path_url+'/customers/editprojectinfo/',
            success:function(data){
                $('#tabs_project').append('<li id="'+data+'" class="active"><a href="#example-tabs2-project'+n+'"><button class="close" type="button" id="'+data+'">×</button>Project'+n+'</a></li>');
                
            }
                    
        });
        $('#modal-project').modal('hide');
    
    });
   
    $(document).on('click','.approve_customer',function(){
       var val_customerid = customer_id;
       if(window.confirm("Are you sure?")){
       $.ajax({
            type: 'POST',
            data:"id="+val_customerid,
            url: path_url+'Customers/approve/',
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
   
   $(document).on('click','.approve_customertag',function(){
       var val_customerid = customer_id;
       if(window.confirm("Are you sure?")){
       $.ajax({
            type: 'POST',
            data:"id="+val_customerid,
            url: path_url+'Customertaglists/approve/',
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
   
});


