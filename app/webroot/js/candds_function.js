/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
   
     
    
    $(document).on('click','.candds_add',function(){
      // alert('candds_add');
       return false;
        if($('#val_customer').val()=='')
        {
            $('.ins_error').addClass('animation-slideDown');
            $('.ins_error').css('color','red');
            $('.ins_error').show();
            return false;
        }
        var customer_id =   $('#QuotationCustomerId').val();
        var instrument_id   =   $('#QuotationInstrumentId').val();
        var instrument_quantity =   $('#val_quantity').val();
        var instrument_name=$('#val_description').val();
        var instrument_modelno=$('#val_model_no').val();
        var instrument_brand=$('#val_brand').val();
        var instrument_range=$('#val_range').val();
        var instrument_calllocation=$('#val_call_location').val();
        var instrument_calltype=$('#val_call_type').val();
        var instrument_validity=$('#val_validity').val();
        var instrument_unitprice=$('#val_unit_price').val();
        var instrument_discount=$('#val_discount1').val();
       
        var instrument_cal=instrument_unitprice*instrument_discount/100;
       
        var instrument_total= instrument_unitprice - instrument_cal ;
        var instrument_department=$('#val_department_id').val();
        var instrument_account=$('#val_account_service').val();
        var instrument_title=$('#val_title').val();
        
        for ( var i = 1; i <= instrument_quantity; i++ ){
        $.ajax({
            type: 'POST',
            data:"instrument_validity="+instrument_validity+"&customer_id="+customer_id+"&instrument_id="+instrument_id+"&instrument_quantity="+instrument_quantity+"&instrument_brand="+instrument_brand+"&instrument_modelno="+instrument_modelno+"&instrument_range="+instrument_range+"&instrument_calllocation="+instrument_calllocation+"&instrument_calltype="+instrument_calltype+"&instrument_unitprice="+instrument_unitprice+"&instrument_discount="+instrument_discount+"&instrument_department="+instrument_department+"&instrument_account="+instrument_account+"&instrument_title="+instrument_title,
            url: path+'Quotations/add_instrument/',
            success: function(data)
            {
               $('.Instrument_info').append('<tr class="instrument_remove_'+data+'">\n\\n\
                                    <td class="text-center">'+data+'</td>\n\
                                    <td class="text-center">'+instrument_name+'</td>\n\\n\
                                    <td class="text-center">'+instrument_modelno+'</td>\n\
                                    <td class="text-center">'+instrument_calllocation+'</td>\n\
                                    <td class="text-center">'+instrument_calltype+'</td>\n\
                                    <td class="text-center">'+instrument_validity+'</td>\n\
                                    <td class="text-center">'+instrument_unitprice+'</td>\n\\n\
                                    <td class="text-center">'+instrument_account+'</td>\n\
                                    <td class="text-center">'+instrument_total+'</td>\n\\n\
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
    }
   });
   
   //////////////////////////////////////////////////////////////////
   
    
    
    
    //////////////////////////////////////////////////////////////
    
    
    $(document).on('click','.show',function(){
        var customer_name=$(this).text();
        $('#val_customer').val(customer_name);
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
                address_node    =   data1.Address;
                //alert(data);
                //alert(address_node.);
                contact_person_info =   data1.Contactpersoninfo;
                salesperson_node =   data1.CusSalesperson;
                $.each(address_node,function(k,v){
                    //alert(v.type);
                    $('#val_addr').append('<option value="'+v.type+'">'+v.type+'</option>');
                    var count = 0;
                    if(v.type=='registered'){
//                        ++count;
//                        alert(v.address);
//                        var add = v.address;
   
                    $('#hid_address').append('<input type="text" name="registered" value="'+v.address+'"/>');
                    }
                   // alert(count);
                });
                $.each(contact_person_info,function(k,v){
                    $('#val_attn').append('<option value="'+v.id+'">'+v.name+'</option>');
                });
                  var sal_name    =  [];
                  $.each(salesperson_node,function(k,v){
                      sal_name.push(v.Salesperson.salesperson);   
                });
               // alert(sal_name.join(' , '));
                $('#val_assigned').append('<option value="'+sal_name.join(' , ')+'">'+sal_name.join(' , ')+'</option>');
                $('#QuotationCustomerId').val(data1.Customer.id);
                $('#val_fax').val(data1.Customer.fax);
                $('#val_phone').val(data1.Customer.phone); 
                $('#val_email').val(data1.Contactpersoninfo.email);
                $('#SalesorderCustomerId').val(data1.Customer.id);
                $('#val_payment_term').val(data1.Paymentterm.paymentterm+' '+ data1.Paymentterm.paymenttype);
                $('#pay_id').val(data1.Paymentterm.id);
            }
	});
    });
    
});