/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
    $(document).on('click','.chosen-results li',function(){
        $(this).addClass('instrument_select');
        var instrument_id =   $('ul.chosen-results').find('.instrument_select').attr('data-option-array-index');
        var instrument_name=   $('ul.chosen-results').find('.instrument_select').text();
        $('#ins_id').val(instrument_id);
        $('#ins_name').val(instrument_name);
        $.ajax({
		type: 'POST',
                data:"instrument_id="+instrument_id,
		url: path_url+'/customers/get_range/',
                success:function(data){
                    $('#range_array').empty().append(data);
                }
            });
    })
    $(document).on('click','.customerinstrument_add',function(){
       
        if($('#val_description').val()=='')
        {
            $('.ins_error').addClass('animation-slideDown');
            $('.ins_error').css('color','red');
            $('.ins_error').show();
            return false;
        }
        var range   =   $('#range_array').val();
        var customer_id =   $('#CustomerInstrumentCustomerId').val();
        var instrument_id   =   $('#ins_id').val();
        var instrument_name =    $('#ins_name').val();
        var model_no =   $('#model_no').val();
        var unit_price=$('#unit_price').val();
        var status  =   $('#status').val();
        
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
               $('.customer_instrument_info').append('<tr class="cus_instrument_remove_'+node_data.CustomerInstrument.id+'">\n\\n\
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
    }
   });
  //for customer Instrument Edit process
    $(document).on('click','.cus_instrument_edit',function(){
      var edit_device_id=$(this).attr('data-edit');
      $('#device_id').val(edit_device_id);
      $('.update_device').html('<button class="btn btn-sm btn-primary cus_ins_update" type="button"><i class="fa fa-plus fa-fw"></i> Update</button>');
       $.ajax({
            type: 'POST',
            data:"edit_device_id="+ edit_device_id,
            url: path_url+'/Customers/edit_instrument/',
            success:function(data){
                edit_node=$.parseJSON(data);
                $('#ins_id').val(edit_node.Instrument.id);
                $('#ins_name').val(edit_node.Instrument.name);
                $('#model_no').val(edit_node.CustomerInstrument.model_no);
                $('#unit_price').val(edit_node.CustomerInstrument.unit_price);
                $('#range_array').empty().append('<option value="">Select Brand</option><option selected="selected" value="'+edit_node.Range.id+'">'+edit_node.Range.range_name+'</option>');
                $('#instrument_name_chosen span').text(edit_node.Instrument.name);
                var check=(edit_node.CustomerInstrument.status==1)?true:false;
                $('#status').prop('checked',check);
            }
        });
   });
   //for Instrument Update Process
    $(document).on('click','.cus_ins_update',function(){
    
        if($('#val_description').val()=='')
        {
            $('.ins_error').addClass('animation-slideDown');
            $('.ins_error').css('color','red');
            $('.ins_error').show();
            return false;
        }
        $('.update_device').html('<button class="btn btn-sm btn-primary customerinstrument_add" type="button"><i class="fa fa-plus fa-fw"></i> add</button>');
        var range   =   $('#range_array').val();
        var customer_id =   $('#CustomerInstrumentCustomerId').val();
        var instrument_id   =   $('#ins_id').val();
        var instrument_name =    $('#ins_name').val();
        var model_no =   $('#model_no').val();
        var device_id   =   $('#device_id').val();
        var unit_price=$('#unit_price').val();
        var status  =   $('#status').val();
       
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
                                    <td class="text-center">'+node_data.Instrument.id+'</td>\n\
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
});

