/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
   
     
    
    $(document).on('click','.candds_add',function(){
     //  alert('candds_add');
      
//        if($('#val_customer').val()=='')
//        {
//            $('.ins_error').addClass('animation-slideDown');
//            $('.ins_error').css('color','red');
//            $('.ins_error').show();
//            return false;
//        }
        
       // alert("a");var customer_id= $(".show").val();
       // alert(customer_id);
        var customer = $(".show").val();
        var purpose =   $('#val_purpose').val();
        var address   =   $('#val_address').val();
        var assigned  =  $('#val_assigned').val();
        var phone  =  $('#val_phone').val();
        var attn  =  $('#val_attn').val();
        var val_remarks = $('#val_remarks').val();
        
       
        $.ajax({
            type: 'POST',
            data:"purpose="+purpose+"&customeraddress="+address+"&assignedto="+assigned+"&phone="+phone+"&contactperson="+attn+"&remarks="+val_remarks,
            url: path+'Candds/add_candds/',
            success: function(data)
            {
               $('.collections_info').append('<tr class="instrument_remove_'+data+'">\n\\n\
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
 
   });
   
   //////////////////////////////////////////////////////////////////
   
    
    
    
    //////////////////////////////////////////////////////////////
    
//    
//    $(document).on('click','.show',function(){
//        var customer_name=$(this).text();
//        $('#val_customer').val(customer_name);
//        $('#result').fadeOut();
//        var customer_id=$(this).attr('id');
//        $.ajax({
//            type: "POST",
//            url: path_url+"/Candds/get_customer_value",
//            data: 'cust_id='+customer_id,
//            cache: false,
//            success: function(data)
//            {
//                data1 = $.parseJSON(data);
//                address_node = data1.Address;
//                //alert(data);
//                //alert(address_node.);
//                contact_person_info =   data1.Contactpersoninfo;
//                salesperson_node =   data1.CusSalesperson;
//                $.each(address_node,function(k,v){
//                    //alert(v.type);
//                    //$('#val_addr').html('');
//                    //$('#val_addr').find('option').remove();
//                    $('#val_addr').append('<option value="'+v.type+'">'+v.type+'</option>');
//                    var count = 0;
//                    if(v.type=='registered'){
//                        ++count;
//                        //alert(v.address);
//                        var add = v.address;
//   
//                    $('#hid_address').append('<input type="text" name="registered" value="'+v.address+'"/>');
//                    }
//                    //alert(count);
//                });
//             // var i=0;
//                $.each(contact_person_info,function(k,v){
//                  //  i++;
//                    $('#val_attn').find('option').remove();
//                    $('#val_attn').append('<option value="'+v.id+'">'+v.name+i+'</option>');
//                });
//                
//                  var sal_name    =  [];
//                  $.each(salesperson_node,function(k,v){
//                      sal_name.push(v.Salesperson.salesperson);   
//                });
//               // alert(sal_name.join(' , '));
////                $('#val_assigned').append('<option value="'+sal_name.join(' , ')+'">'+sal_name.join(' , ')+'</option>');
////                $('#QuotationCustomerId').val(data1.Customer.id);
////                $('#val_fax').val(data1.Customer.fax);
////                $('#val_phone').val(data1.Customer.phone); 
////                $('#val_email').val(data1.Contactpersoninfo.email);
////                $('#SalesorderCustomerId').val(data1.Customer.id);
////                $('#val_payment_term').val(data1.Paymentterm.paymentterm+' '+ data1.Paymentterm.paymenttype);
////                $('#pay_id').val(data1.Paymentterm.id);
//            }
//	});
//    });
    
});