/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
   /******************************Contact Person Submit*************************************/
    $('.name_error').hide();
    $('.email_error').hide();
    $('.contactperson_submit').click(function()
    {
        if($('#contact_name').val()=='')
        {
            $('.name_error').addClass('animation-slideDown');
            $('.name_error').css('color','red');
            $('.name_error').show();
            return false;
        }
        var serial=(Math.random()+' ').substring(2,6)+(Math.random()+' ').substring(2,6);
        var contact_name=$('#contact_name').val();
        var contact_email=$('#contact_email').val();
        var contact_department=$('#contact_department').val();
        var contact_phone=$('#contact_phone').val();
        var contact_position=$('#contact_position').val();
        var contact_mobile=$('#contact_mobile').val();
        var contact_purpose=$('#contact_purpose').val();
        var contact_remark=$('#contact_remark').val();
        var customer_id=$('#customer_id').val();
        var tag_id=$('#CustomerTagId').val();
        var group_id=$('#CustomerGroupId').val();
        
       
        $.ajax({
            type: 'POST',
            data:"contact_name="+ contact_name+"&contact_email="+contact_email+"&contact_department="+contact_department+"&contact_phone="+contact_phone+"&contact_position="+contact_position+"&contact_remark="+contact_remark+"&contact_purpose="+contact_purpose+"&contact_mobile="+contact_mobile+"&customer_id="+customer_id+"&tag_id="+tag_id+"&serial_id="+serial+"&group_id="+group_id,
            url: path_url+'/customers/contact_person_add/',
            success:function(data){
              
                 $('.contact_info_row').append('<tr class="contact_remove_'+serial+'">\n\\n\
                                    <td class="text-center">'+customer_id+'</td>\n\
                                    <td class="text-center">'+contact_name+'</td>\n\\n\
                                    <td class="text-center">'+contact_email+'</td>\n\
                                    <td class="text-center">'+contact_department+'</td>\n\\n\
                                    <td class="text-center">'+contact_position+'</td>\n\
                                    <td class="text-center">'+contact_phone+'</td>\n\\n\\n\
                                    <td class="text-center">'+contact_mobile+'</td>\n\
                                    <td class="text-center">'+contact_purpose+'</td>\n\
                                    <td class="text-center">'+contact_remark+'</td>\n\
                                    <td class="text-center"><div class="btn-group">\n\\n\
                                    <a data-edit="'+serial+'" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-default contactperson_edit">\n\
                                    <i class="fa fa-pencil"></i></a>\n\
                                    <a data-delete="'+serial+'" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger contact_delete">\n\
                                    <i class="fa fa-times"></i></a></div></td></tr>');
            }
        });
        $('#contact_email').val(null);
        $('#contact_department').val(null);
        $('#contact_phone').val(null);
        $('#contact_position').val(null);
        $('#contact_mobile').val(null);
        $('#contact_purpose').val(null);
        $('#contact_remark').val(null);
        $('.name_error').hide();
    });
    /******************************* Customer Contact person  Edit  *************************/
     $(document).on('click','.contactperson_edit',function(){
      var edit_con_id=$(this).attr('data-edit');
      $('.contactperson_submit').html('<button class="btn btn-sm btn-primary contactperson_editsubmit" type="button"><i class="fa fa-plus fa-fw"></i> Update</button>');
       $.ajax({
            type: 'POST',
            data:"edit_con_id="+ edit_con_id,
            url: path_url+'/customers/contact_person_edit/',
            success:function(data){
               edit_node=$.parseJSON(data);
               console.log(edit_node);
              $('#contact_name').val(edit_node.Contactpersoninfo.name);
        $('#contact_email').val(edit_node.Contactpersoninfo.email);
        $('#contact_department').val(edit_node.Contactpersoninfo.department);
        $('#contact_phone').val(edit_node.Contactpersoninfo.phone);
       $('#contact_position').val(edit_node.Contactpersoninfo.position);
        $('#contact_mobile').val(edit_node.Contactpersoninfo.mobile);
       $('#contact_purpose').val(edit_node.Contactpersoninfo.purpose);
        $('#contact_remark').val(edit_node.Contactpersoninfo.remarks);
       $('#CustomerTagId').val(edit_node.Contactpersoninfo.tag_id);
        $('#CustomerGroupId').val(edit_node.Contactpersoninfo.customergroup_id);
//               $('#device_id').val(edit_node.Device.id);
//               $('#val_quantity').val(edit_node.Device.quantity);
//                $('#val_description').val(edit_node.Instrument.name);
//                $('#QuotationInstrumentId').val(edit_node.Instrument.id);
//                $('#QuotationCustomerId').val(edit_node.Device.customer_id);
//                $('#val_model_no').val(edit_node.Device.model_no);
//                $('#val_brand').empty().append('<option value="">Select Brand</option><option selected="selected" value="'+edit_node.Brand.id+'">'+edit_node.Brand.brandname+'</option>');
//                $('#val_range').empty().append('<option value="">Select Range</option><option selected="selected" value="'+edit_node.Range.id+'">'+edit_node.Range.range_name+'</option>');
//                               
//                $('#val_call_location').val(edit_node.Device.call_location);
//                //alert(edit_node.Device.call_type);
//                $('#val_call_type').val(edit_node.Device.call_type);
//                //$('#val_call_type').empty().append('<option value="">Select Call Type</option><option selected="selected" value="'+edit_node.Device.call_type+'">'+edit_node.Device.call_type+'</option>');
//                //alert($('#val_call_type').val);
//                $('#val_validity').val(edit_node.Device.validity);
//                
//                $('#val_unit_price').val(edit_node.Device.unit_price);
//                $('#val_discount1').val(edit_node.Device.discount);
//                $('#val_department').val(edit_node.Department.departmentname);
//                
//                $('#val_account_service').val(edit_node.Device.account_service);
//                $('#val_title').val(edit_node.Device.title);
              
            }
        });
        
   });
   /*****************************Customer Contact person Edit submit*********************************/
   
   $(document).on('click','.contactperson_editsubmit',function()
    {
        if($('#contact_name').val()=='')
        {
            $('.name_error').addClass('animation-slideDown');
            $('.name_error').css('color','red');
            $('.name_error').show();
            return false;
        }
       $('.contactperson_editsubmit').html('<button class="btn btn-sm btn-primary contactperson_submit" type="button"><i class="fa fa-plus fa-fw"></i> add</button>');
        var contact_name=$('#contact_name').val();
        var contact_email=$('#contact_email').val();
        var contact_department=$('#contact_department').val();
        var contact_phone=$('#contact_phone').val();
        var contact_position=$('#contact_position').val();
        var contact_mobile=$('#contact_mobile').val();
        var contact_purpose=$('#contact_purpose').val();
        var contact_remark=$('#contact_remark').val();
        var tag_id=$('#CustomerTagId').val();
        var group_id=$('#CustomerGroupId').val();
//       alert("contact_name = "+ contact_name+" & contact_email = "+contact_email+" & contact_department = "+contact_department+" & contact_phone = "+contact_phone+" & contact_position = "+contact_position+" & contact_remark = "+contact_remark+" & contact_purpose = "+contact_purpose+" & contact_mobile = "+contact_mobile);
        $.ajax({
            type: 'POST',
            data:"contact_name="+ contact_name+"&contact_email="+contact_email+"&contact_department="+contact_department+"&contact_phone="+contact_phone+"&contact_position="+contact_position+"&contact_remark="+contact_remark+"&contact_purpose="+contact_purpose+"&contact_mobile="+contact_mobile+"&tag_id="+tag_id+"&customer_id="+customer_id+"&group_id="+group_id,
            url: path_url+'/customers/contact_person_edit/',
            success:function(data){
                $('.instrument_remove_'+device_id).remove();
                $('.contact_info_row').append('<tr id = "'+data+'">\n\\n\
                                    <td class="text-center">'+customer_id+'</td>\n\
                                    <td class="text-center">'+contact_name+'</td>\n\\n\
                                    <td class="text-center">'+contact_email+'</td>\n\
                                    <td class="text-center">'+contact_department+'</td>\n\\n\\n\
                                    <td class="text-center">'+contact_position+'</td>\n\
                                    <td class="text-center">'+contact_phone+'</td>\n\\n\\n\
                                    <td class="text-center">'+contact_mobile+'</td>\n\
                                    <td class="text-center">'+contact_purpose+'</td>\n\
                                    <td class="text-center">'+contact_remark+'</td>\n\
                                    <td class="text-center"><div class="btn-group">\n\
                                    <a data-delete="'+data+'" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger contact_delete">\n\
                                    <i class="fa fa-times"></i></a></div></td></tr>');
            }
        });
        $('#contact_name').val(null);
        $('#contact_email').val(null);
        $('#contact_department').val(null);
        $('#contact_phone').val(null);
        $('#contact_position').val(null);
        $('#contact_mobile').val(null);
        $('#contact_purpose').val(null);
        $('#contact_remark').val(null);
        $('.name_error').hide();
    });
    /**********************Contact person Delete (Customer Module)*************************/
    $(document).on('click','.contact_delete',function()
    {
        var delete_id = $(this).attr('data-delete');
        var confirm =   window.confirm('Are you Sure want to Delete?');
        if(confirm==true)
        {
            $.ajax({
                type: 'POST',
                data:"delete_id="+ delete_id,
                url: path_url+'/customers/contact_delete/'
            });
            $('#'+delete_id).fadeOut();
        }
    });
    /*****************************Contact person Update Submit***************************/
    
    
    /*****************************************************************************/
    
    
});

