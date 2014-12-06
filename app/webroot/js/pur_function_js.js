/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
    $(document).on('click','.customer_show',function(){
        var customer_name=$(this).text();
        $('#pur_customer').val(customer_name);
        $('#result').fadeOut();
        var customer_id=$(this).attr('id');
        $.ajax({
            type: "POST",
            url: path_url+"/Purchaseorders/get_customer_value",
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
                
                $('#pur_customer_address').val(data1.Customer.regaddress);
                $('#PurchaseorderCustomerId').val(data1.Customer.id);
                $('#pur_phone').val(data1.Customer.phone);                
                $('#pur_salesperson').val(data1.Salesperson.salesperson);
                $('#pur_payment').val(data1.Paymentterm.paymentterm+' '+ data1.Paymentterm.paymenttype);
                $('#pur_fax').val(data1.Customer.fax);
                $('#pur_attn').append('<option>'+data1.Contactpersoninfo.name+'</option>');
                $('#pur_email').val(data1.Contactpersoninfo.email);
            }
	});
    });
})