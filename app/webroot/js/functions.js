/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

   
$(document).ready(function(){
    
    
    
    /* Contact Person Info .................................
    *......................................................................................................................
    *......................................................................................................................
    *.......................................................*/
    
    
    $('.project_name_error').hide();
    $('.project_submit').click(function()
    {
        if($('#project_name').val()=='')
        {
            $('.project_name_error').addClass('animation-slideDown');
            $('.project_name_error').css('color','red');
            $('.project_name_error').show();
            return false;
        }
        var serial=(Math.random()+' ').substring(2,6)+(Math.random()+' ').substring(2,6);
        var pro_name=$('#project_name').val();
        $('.project_info_row').append('<tr class="remove_'+serial+'"><td class="text-center">'+serial+'</td><td class="text-center">'+pro_name+'</td>\n\
        <td class="text-center"><div class="btn-group"><a data-delete="'+serial+'" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger but_delete">\n\
        <i class="fa fa-times"></i></a></div></td></tr>');
        $('#serial').val(null);
        $('#project_name').val(null);
        $('.project_name_error').hide();
        $.ajax({
            type: 'POST',
            data:"serial_id="+ serial+"&project_name="+pro_name,
            url: path_url+'/customers/project_add/'
        });
    });
    $(document).on('click','.but_delete',function()
    {
        var delete_id = $(this).attr('data-delete');
        $.ajax({
            type: 'POST',
            data:"delete_id="+ delete_id,
            url: path_url+'/customers/project_delete/'
        });
        $('.remove_'+delete_id).fadeOut();
    });
   
   
  
    $(document).on('click','.bt_pro_edit',function() {
        
        var pro_id = this.id;
        // alert(pro_id);
        param = 'id=' + pro_id;
        check_project(param).done(function(value) {
            //waits until ajax is completed
            var myarr = value.split(",");
            //alert(myarr[3]); 
            $('#serial').val(myarr[0]);
            $('#project_name').val(myarr[3]);
            $(".project_edit_submit").html('Update');
            $(".project_edit_submit").attr('id',myarr[0]);
        });
        //$('#project_name').val=myarr[3];
        return false;
    });
    
    $('.project_edit_submit').click(function()
    {
        if($('#project_name').val()=='')
        {
            $('.project_name_error').addClass('animation-slideDown');
            $('.project_name_error').css('color','red');
            $('.project_name_error').show();
            return false;
        }
    
        if(this.id=='')
        {
            var pro_name=$('#project_name').val();
            var serial=(Math.random()+' ').substring(2,6)+(Math.random()+' ').substring(2,6);
            
            $.ajax({
		type: 'POST',
                data:"project_name="+pro_name+"&serial_id="+serial,
		url: path_url+'/customers/project_edit_add/',
                success:function(value){
                    cookievalue= value + ";";
                    document.cookie="pro_id=" + cookievalue;
                }
            });
           
            
            function readCookie(name) {
                var nameEQ = name + "=";
                var ca = document.cookie.split(';');
                for(var i=0;i < ca.length;i++) {
                    var c = ca[i];
                    while (c.charAt(0)==' ') c = c.substring(1,c.length);
                    if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
                }
                return null;
            }
            
            function eraseCookie(name) {
                createCookie(name,"",-1);
            }
            var pro_id = readCookie('pro_id');
            $('#serial').val(null);
            $('#project_name').val(null);
            $('.project_name_error').hide();
            
           
            $('.tb_pro').each(function() {
                $(this).find("tr#"+pro_id+" td:nth-child(1)").html(pro_name);
            });
            // alert(pro_id+"sf");
            $('.project_info_row').append('<tr class="remove_'+serial+'" id="'+pro_id+'"><td class="text-center">'+pro_name+'</td><td class="text-center"><div class="btn-group"><button type="button" id="'+pro_id+'" title="Edit" class="btn btn-xs btn-default bt_pro_edit"><i class="fa fa-pencil"></i></button><a data-delete="'+serial+'" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger but_delete"><i class="fa fa-times"></i></a></div></td></tr>'); 
            eraseCookie('pro_id');
        }
        else
        {
            var pro_id = this.id;
            //alert(pro_id);
            var pro_name=$('#project_name').val();
            //alert(pro_name);
           
            param = 'id=' + pro_id +'&pro_name='+pro_name;
            update_project(param).done(function(value) {
              
            });
             
            $('tr#'+pro_id+' td:nth-child(1)').html(pro_name);
            $('#serial').val(null);
            $('#project_name').val(null);
            $('.project_name_error').hide();
            $('.project_edit_submit').html('<i class="fa fa-plus fa-fw"></i> add');
          
        }
        return false;
    });
     
    function update_add_project(param) {
        return $.ajax({
            type: 'POST',
            data: param,
            url: path_url + 'Customers/project_edit_add/'
        });
    }
    function update_project(param) {
        return $.ajax({
            type: 'POST',
            data: param,
            url: path_url + 'Customers/project_edit_rule/'
        });
    }
    function check_project(param) {
        return $.ajax({
            type: 'POST',
            data: param,
            url: path_url + '/Customers/project_edit_update/'
        });
    }
   
   
   
   
    /* Contact Person Info ...........................................
     * ..........................................................................................................................
     * ..........................................................................................................................
    *.................................................................*/
   
    
    
    $('.name_error').hide();
    $('.email_error').hide();
    
    $('.contactperson__submit').click(function()
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
        $('.contact_info_row').append('<tr class="contact_remove_'+contact_name+'">\n\\n\
                                    <td class="text-center">'+customer_id+'</td>\n\
                                    <td class="text-center">'+serial+'</td>\n\
                                    <td class="text-center">'+contact_name+'</td>\n\\n\
                                    <td class="text-center">'+contact_email+'</td>\n\
                                    <td class="text-center">'+contact_department+'</td>\n\\n\
                                    <td class="text-center">'+contact_phone+'</td>\n\\n\\n\
                                    <td class="text-center">'+contact_position+'</td>\n\
                                    <td class="text-center">'+contact_mobile+'</td>\n\
                                    <td class="text-center">'+contact_purpose+'</td>\n\
                                    <td class="text-center">'+contact_remark+'</td>\n\
                                    <td class="text-center"><div class="btn-group">\n\
                                    <a data-delete="'+serial+'" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger contact_delete">\n\
                                    <i class="fa fa-times"></i></a></div></td></tr>');
        $('#contact_name').val(null);
        $('#contact_email').val(null);
        $('#contact_department').val(null);
        $('#contact_phone').val(null);
        $('#contact_position').val(null);
        $('#contact_mobile').val(null);
        $('#contact_purpose').val(null);
        $('#contact_remark').val(null);
        $('.name_error').hide();
        $.ajax({
            type: 'POST',
            data:"contact_name="+ contact_name+"&contact_email="+contact_email+"&contact_department="+contact_department+"&contact_phone="+contact_phone+"&contact_position="+contact_position+"&contact_remark="+contact_remark+"&contact_purpose="+contact_purpose+"&contact_mobile="+contact_mobile,
            url: path_url+'/customers/contact_person_add/'
        });
    });
    $(document).on('click','.contact_delete',function()
    {
        var delete_id = $(this).attr('data-delete');
        $.ajax({
            type: 'POST',
            data:"delete_id="+ delete_id,
            url: path_url+'/customers/project_delete/'
        });
        $('.contact_remove_'+delete_id).fadeOut();
    });
    
    
     $('.contact_edit_submit').click(function()
    {
        if($('#contact_name').val()=='')
        {
            $('.name_error').addClass('animation-slideDown');
            $('.name_error').css('color','red');
            $('.name_error').show();
            return false;
        }
    
        if(this.id=='')
        {
            var pro_name=$('#project_name').val();
            var serial=(Math.random()+' ').substring(2,6)+(Math.random()+' ').substring(2,6);
            
            $.ajax({
		type: 'POST',
                data:"project_name="+pro_name+"&serial_id="+serial,
		url: path_url+'/customers/project_edit_add/',
                success:function(value){
                    cookievalue= value + ";";
                    document.cookie="pro_id=" + cookievalue;
                }
            });
           
            
            function readCookie(name) {
                var nameEQ = name + "=";
                var ca = document.cookie.split(';');
                for(var i=0;i < ca.length;i++) {
                    var c = ca[i];
                    while (c.charAt(0)==' ') c = c.substring(1,c.length);
                    if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
                }
                return null;
            }
            
            function eraseCookie(name) {
                createCookie(name,"",-1);
            }
            var pro_id = readCookie('pro_id');
            $('#serial').val(null);
            $('#project_name').val(null);
            $('.project_name_error').hide();
            
           
            $('.tb_pro').each(function() {
                $(this).find("tr#"+pro_id+" td:nth-child(1)").html(pro_name);
            });
            // alert(pro_id+"sf");
            $('.project_info_row').append('<tr class="remove_'+serial+'" id="'+pro_id+'"><td class="text-center">'+pro_name+'</td><td class="text-center"><div class="btn-group"><button type="button" id="'+pro_id+'" title="Edit" class="btn btn-xs btn-default bt_pro_edit"><i class="fa fa-pencil"></i></button><a data-delete="'+serial+'" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger but_delete"><i class="fa fa-times"></i></a></div></td></tr>'); 
            eraseCookie('pro_id');
        }
        else
        {
            var pro_id = this.id;
            //alert(pro_id);
            var pro_name=$('#project_name').val();
            //alert(pro_name);
           
            param = 'id=' + pro_id +'&pro_name='+pro_name;
            update_project(param).done(function(value) {
              
            });
             
            $('tr#'+pro_id+' td:nth-child(1)').html(pro_name);
            $('#serial').val(null);
            $('#project_name').val(null);
            $('.project_name_error').hide();
            $('.project_edit_submit').html('<i class="fa fa-plus fa-fw"></i> add');
          
        }
        return false;
    });
    
    
    
    /* Delivery Address Info ...........................................
     * ..........................................................................................................................
     * ..........................................................................................................................
     *..................................................................*/
    
    
    
    $('.delivery_address_error').hide();
    $('.delivery_submit').click(function()
    {
        if($('#delivery_address').val()=='')
        {
            $('.delivery_address_error').addClass('animation-slideDown');
            $('.delivery_address_error').css('color','red');
            $('.delivery_address_error').show();
            return false;
        }
        var delivery_id=(Math.random()+' ').substring(2,6)+(Math.random()+' ').substring(2,6);
        var delivery_address=$('#delivery_address').val();
        $('.delivery_info_row').append('<tr class="delivery_remove_'+delivery_id+'"><td class="text-center">'+delivery_id+'</td><td class="text-center">'+delivery_address+'</td>\n\
        <td class="text-center"><div class="btn-group"><a data-delete="'+delivery_id+'" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger delivery_delete">\n\
        <i class="fa fa-times"></i></a></div></td></tr>');
        $('#delivery_id').val(null);
        $('#delivery_address').val(null);
        $('.delivery_address_error').hide();
        $.ajax({
            type: 'POST',
            data:"delivery_id="+ delivery_id+"&delivery_address="+delivery_address,
            url: path_url+'/customers/delivery_add/'
        });
    });
    $(document).on('click','.delivery_delete',function()
    {
        var delete_id = $(this).attr('data-delete');
        $.ajax({
            type: 'POST',
            data:"delete_id="+ delete_id,
            url: path_url+'/customers/delivery_delete/'
        });
        $('.delivery_remove_'+delete_id).fadeOut();
    });
    $('.billing_address_error').hide(); 
    $('.billing_submit').click(function()
    {
        if($('#billing_address').val()=='')
        {
            $('.billing_address_error').addClass('animation-slideDown');
            $('.billing_address_error').css('color','red');
            $('.billing_address_error').show();
            return false;
        }
        var billing_id=(Math.random()+' ').substring(2,6)+(Math.random()+' ').substring(2,6);
        var billing_address=$('#billing_address').val();
        $('.billing_info_row').append('<tr class="billing_remove_'+billing_id+'"><td class="text-center">'+billing_id+'</td><td class="text-center">'+billing_address+'</td>\n\
        <td class="text-center"><div class="btn-group"><a data-delete="'+billing_id+'" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger billing_delete">\n\
        <i class="fa fa-times"></i></a></div></td></tr>');
        $('#billing_id').val(null);
        $('#billing_address').val(null);
        $('.billing_address_error').hide(); 
        $.ajax({
            type: 'POST',
            data:"billing_id="+ billing_id+"&billing_address="+billing_address,
            url: path_url+'/customers/billing_add/'
        });
    });
    $(document).on('click','.billing_delete',function()
    {
        var delete_id = $(this).attr('data-delete');
        $.ajax({
            type: 'POST',
            data:"delete_id="+ delete_id,
            url: path_url+'/customers/billing_delete/'
        });
        $('.billing_remove_'+delete_id).fadeOut();
    });
    $(document).on('click','.show',function(){
        var customer_name=$(this).text();
        $('#val_customer').val(customer_name);
        $('#result').fadeOut();
        var customer_id=$(this).attr('id');
        $.ajax({
            type: "POST",
            url: "../Quotations/get_customer_value",
            data: 'cust_id='+customer_id,
            cache: false,
            success: function(data)
            {
                data1 = $.parseJSON(data);
                $('#val_address').val(data1.Customer.regaddress);
                $('#QuotationCustomerId').val(data1.Customer.id);
                $('#val_phone').val(data1.Customer.phone);
                $('#val_fax').val(data1.Customer.fax);
                $('#val_attn').append('<option>'+data1.Contactpersoninfo.name+'</option>');
                $('#val_email').val(data1.Contactpersoninfo.email);
                $('#val_payment_term').val(data1.Paymentterm.paymentterm+' '+ data1.Paymentterm.paymenttype);
            }
	});
    });
    $('.project_name_error').hide();
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
          $('#tab-content').append('<div class="tab-pane active" id="example-tabs2-Address'+n+'">'+regaddress+'</div>');
          $('#val_regaddress').val(null);
         
          $.ajax({
            type: 'POST',
            data:"regaddress="+regaddress+"&customer_id="+customer_id,
            url: path_url+'/customers/addregaddress/',
            success:function(data){
                $('#tabs_reg').append('<li id="'+data+'" class="active"><a href="#example-tabs2-Address'+n+'"><button class="close" type="button" id="'+data+'" >×</button>Address'+n+'</a></li>');
                
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
        
         var n = $("ul#tabs_bill li").size()+1;
          $('#tab-content_bill').append('<div class="tab-pane active" id="example-tabs2-billing'+n+'">'+billaddress+'</div>');
          $('#val_billaddress').val(null);
         
          $.ajax({
            type: 'POST',
            data:"billaddress="+billaddress+"&customer_id="+customer_id,
            url: path_url+'/customers/addbilladdress/',
            success:function(data){
                $('#tabs_bill').append('<li id="'+data+'" class="active"><a href="#example-tabs2-billing'+n+'"><button class="close" type="button" id="'+data+'">×</button>Address'+n+'</a></li>');
                
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
        
         var n = $("ul#tabs_delivery li").size()+1;
          $('#tab-content_delivery').append('<div class="tab-pane active" id="example-tabs2-delivery'+n+'">'+deliveryaddress+'</div>');
          $('#val_deliveryaddress').val(null);
         
          $.ajax({
            type: 'POST',
            data:"deliveryaddress="+deliveryaddress+"&customer_id="+customer_id,
            url: path_url+'/customers/adddeliveryaddress/',
            success:function(data){
                $('#tabs_delivery').append('<li id="'+data+'" class="active"><a href="#example-tabs2-delivery'+n+'"><button class="close" type="button" id="'+data+'">×</button>Address'+n+'</a></li>');
                
            }
                    
        });
        $('#modal-delivery').modal('hide');
    
    });
   
    $('.country_value').change(function() {
        var country_id = $(this).val();
        $.ajax({
            type: "POST",
            url: path + "Quotations/get_country_value",
            data: 'country_id=' + country_id,
            cache: false,
            success: function(data)
            {

                $('#val_currency_value').val(data);
            }

        });
    });
    $('.gsttype').change(function() {
        var gst_id = $(this).val();
        $.ajax({
            type: "POST",
            url: path + "Quotations/get_gst_value",
            data: 'gst_id=' + gst_id,
            cache: false,
            success: function(data)
            {
                $('#val_gst').val(data);
            }

        });
    });

    
    
}); 
    
