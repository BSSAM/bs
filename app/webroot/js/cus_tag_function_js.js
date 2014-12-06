/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
    /******************************Customertag Contact person add*************************************/ 
    $('.tag_contactperson_submit').click(function()
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
            data:"contact_name="+ contact_name+"&contact_email="+contact_email+"&contact_department="+contact_department+"&contact_phone="+contact_phone+"&contact_position="+contact_position+"&contact_remark="+contact_remark+"&contact_purpose="+contact_purpose+"&contact_mobile="+contact_mobile+"&tag_id="+tag_id+"&customer_id="+customer_id+"&group_id="+group_id,
            url: path_url+'/Customertaglists/tag_contact_person_add/',
            success:function(data){
                $('.odd').empty();
                $('.tag_contact_info_row').append('<tr class="tag_contact_remove_'+data+'">\n\\n\
                                    <td class="text-center">'+customer_id+'</td>\n\
                                    <td class="text-center">'+contact_name+'</td>\n\\n\
                                    <td class="text-center">'+contact_email+'</td>\n\
                                    <td class="text-center">'+contact_department+'</td>\n\\n\
                                    <td class="text-center">'+contact_phone+'</td>\n\\n\\n\
                                    <td class="text-center">'+contact_position+'</td>\n\
                                    <td class="text-center">'+contact_mobile+'</td>\n\
                                    <td class="text-center">'+contact_purpose+'</td>\n\
                                    <td class="text-center">'+contact_remark+'</td>\n\
                                    <td class="text-center"><div class="btn-group">\n\
                                     <a data-edit="'+data+'" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-default tag_contactperson_edit">\n\
                                    <i class="fa fa-pencil"></i></a>\n\
                                    <a data-delete="'+data+'" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger tag_contact_delete">\n\
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
    /******************************* Customer Contact person  Edit  *************************/
     $(document).on('click','.tag_contactperson_edit',function(){
      var edit_con_id=$(this).attr('data-edit');
      $('.update_button_for_contactperson').html('<button id="'+edit_con_id+'" class="btn btn-sm btn-primary tag_contactperson_editsubmit" type="button"><i class="fa fa-plus fa-fw"></i> Update</button>');
       $.ajax({
            type: 'POST',
            data:"edit_con_id="+ edit_con_id,
            url: path_url+'/customers/contact_person_edit/',
            success:function(data){
				try {
  edit_node=$.parseJSON(data);
  } catch (e) {
    // error
    return;
  }
               
               //console.log(edit_node);
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

              
            }
        });
        
   });
   /*****************************Customer Contact person Edit submit*********************************/
   
   $(document).on('click','.tag_contactperson_editsubmit',function()
    {
        var customer_id =$('#customer_id').val();
        var id= $(this).attr('id');
        if($('#contact_name').val()=='')
        {
            $('.name_error').addClass('animation-slideDown');
            $('.name_error').css('color','red');
            $('.name_error').show();
            return false;
        }
       $('.update_button_for_contactperson').html('<button class="btn btn-sm btn-primary tag_contactperson_editsubmit" type="button"><i class="fa fa-plus fa-fw"></i> add</button>');
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
            data:"contact_name="+ contact_name+"&contact_email="+contact_email+"&contact_department="+contact_department+"&contact_phone="+contact_phone+"&contact_position="+contact_position+"&contact_remark="+contact_remark+"&contact_purpose="+contact_purpose+"&contact_mobile="+contact_mobile+"&tag_id="+tag_id+"&customer_id="+customer_id+"&group_id="+group_id+"&id="+id,
            url: path_url+'/customers/contact_edit_update/',
            success:function(data){
               
               $('.tag_contact_remove_'+id).remove();
                $('.tag_contact_info_row').append('<tr class="contact_remove_'+id+'">\n\\n\
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
                                     <a data-edit="'+id+'" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-default tag_contactperson_edit">\n\
                                    <i class="fa fa-pencil"></i></a>\n\
                                    <a data-delete="'+id+'" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger tag_contact_delete">\n\
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
    /***************************Customer Contact person Delete*************************/
     $(document).on('click','.tag_contact_delete',function()
    {
        var delete_id = $(this).attr('data-delete');
        var confirm =   window.confirm('Are you Sure want to Delete?');
        if(confirm==true)
        {
            $.ajax({
                type: 'POST',
                data:"delete_id="+ delete_id,
                url: path_url+'/Customertaglists/contact_delete/'
            });
            $('.tag_contact_remove_'+delete_id).fadeOut();
        }
    });
});


