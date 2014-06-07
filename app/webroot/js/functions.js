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
   
     $(document).on('click','.bt_con_edit',function() {
        
        var con_id = this.id;
        // alert(pro_id);
        param = 'id=' + con_id;
        check_contact(param).done(function(value) {
            //waits until ajax is completed
            var myarr = value.split(",");
            alert(myarr); 
            $('#sno').val(myarr[0]);
            $('#contact_email').val(myarr[3]);
            $('#contact_name').val(myarr[5]);
            $('#contact_department').val(myarr[6]);
            $('#contact_phone').val(myarr[7]);
            $('#contact_position').val(myarr[8]);
            $('#contact_mobile').val(myarr[9]);
            $('#contact_purpose').val(myarr[10]);
            $('#contact_remark').val(myarr[4]);
            $(".contactperson__editsubmit").html('Update');
            $(".contactperson__editsubmit").attr('class', 'btn btn-sm btn-primary contactperson__updatesubmit');
            $(".contactperson__updatesubmit").attr('id',myarr[0]);
        });
        //$('#project_name').val=myarr[3];
        return false;
    });
    
     function check_contact(param) {
        return $.ajax({
            type: 'POST',
            data: param,
            url: path_url + '/Customers/contact_edit_update/'
        });
    }
    
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
    $('.name_error').hide();
    $('.email_error').hide();
    $(document).on('click','.contactperson__editsubmit',function()
    {
        if($('#contact_name').val()=='')
        {
            $('.name_error').addClass('animation-slideDown');
            $('.name_error').css('color','red');
            $('.name_error').show();
            return false;
        }
        
        
        var contact_name=$('#contact_name').val();
        var contact_email=$('#contact_email').val();
        var contact_department=$('#contact_department').val();
        var contact_phone=$('#contact_phone').val();
        var contact_position=$('#contact_position').val();
        var contact_mobile=$('#contact_mobile').val();
        var contact_purpose=$('#contact_purpose').val();
        var contact_remark=$('#contact_remark').val();
       
       
       alert("contact_name = "+ contact_name+" & contact_email = "+contact_email+" & contact_department = "+contact_department+" & contact_phone = "+contact_phone+" & contact_position = "+contact_position+" & contact_remark = "+contact_remark+" & contact_purpose = "+contact_purpose+" & contact_mobile = "+contact_mobile);
        $.ajax({
            type: 'POST',
            data:"contact_name="+ contact_name+"&contact_email="+contact_email+"&contact_department="+contact_department+"&contact_phone="+contact_phone+"&contact_position="+contact_position+"&contact_remark="+contact_remark+"&contact_purpose="+contact_purpose+"&contact_mobile="+contact_mobile,
            url: path_url+'/customers/contact_person_edit/',
            success:function(data){
              
                $('.contact_info_row').append('<tr id = "'+data+'">\n\\n\
                                    <td class="text-center">'+data+'</td>\n\
                                    <td class="text-center">'+customer_id+'</td>\n\
                                    <td class="text-center">'+contact_name+'</td>\n\\n\
                                    <td class="text-center">'+contact_email+'</td>\n\
                                    <td class="text-center">'+contact_department+'</td>\n\\n\
                                    <td class="text-center">'+contact_phone+'</td>\n\\n\\n\
                                    <td class="text-center">'+contact_position+'</td>\n\
                                    <td class="text-center">'+contact_mobile+'</td>\n\
                                    <td class="text-center">'+contact_purpose+'</td>\n\
                                    <td class="text-center">'+contact_remark+'</td>\n\
                                    <td class="text-center"><div class="btn-group"><button type="button" id="'+data+'" title="Edit" class="btn btn-xs btn-default bt_con_edit"><i class="fa fa-pencil"></i></button>\n\
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
    
    $(document).on('click','.contactperson__updatesubmit',function()
    {
        if($('#contact_name').val()=='')
        {
            $('.name_error').addClass('animation-slideDown');
            $('.name_error').css('color','red');
            $('.name_error').show();
            return false;
        }
   
//        if(this.id=='')
//        {
//            alert(this.id);
//            return false;
//            var contact_name=$('#contact_name').val();
//            var contact_name=$('#contact_name').val();
//        var contact_email=$('#contact_email').val();
//        var contact_department=$('#contact_department').val();
//        var contact_phone=$('#contact_phone').val();
//        var contact_position=$('#contact_position').val();
//        var contact_mobile=$('#contact_mobile').val();
//        var contact_purpose=$('#contact_purpose').val();
//        var contact_remark=$('#contact_remark').val();
//            //var serial=(Math.random()+' ').substring(2,6)+(Math.random()+' ').substring(2,6);
//            
//            $.ajax({
//		type: 'POST',
//                data:"contact_name="+contact_name,
//		url: path_url+'/customers/contact_edit_add/',
//                success:function(value){
//                    cookievalue= value + ";";
//                    document.cookie="pro_id=" + cookievalue;
//                }
//            });
//           
//            
//            function readCookie(name) {
//                var nameEQ = name + "=";
//                var ca = document.cookie.split(';');
//                for(var i=0;i < ca.length;i++) {
//                    var c = ca[i];
//                    while (c.charAt(0)==' ') c = c.substring(1,c.length);
//                    if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
//                }
//                return null;
//            }
//            
//            function eraseCookie(name) {
//                createCookie(name,"",-1);
//            }
//            var pro_id = readCookie('pro_id');
//            $('#serial').val(null);
//            $('#project_name').val(null);
//            $('.project_name_error').hide();
//            
//           
//            $('.tb_pro').each(function() {
//                $(this).find("tr#"+pro_id+" td:nth-child(1)").html(pro_name);
//            });
//            // alert(pro_id+"sf");
//            $('.project_info_row').append('<tr class="remove_'+serial+'" id="'+pro_id+'"><td class="text-center">'+pro_name+'</td><td class="text-center"><div class="btn-group"><button type="button" id="'+pro_id+'" title="Edit" class="btn btn-xs btn-default bt_pro_edit"><i class="fa fa-pencil"></i></button><a data-delete="'+serial+'" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger but_delete"><i class="fa fa-times"></i></a></div></td></tr>'); 
//            eraseCookie('pro_id');
//        }
        if(this.id!='')
        {
            
            var con_id = this.id;
            
              var contact_name=$('#contact_name').val();
        var contact_email=$('#contact_email').val();
        var contact_department=$('#contact_department').val();
        var contact_phone=$('#contact_phone').val();
        var contact_position=$('#contact_position').val();
        var contact_mobile=$('#contact_mobile').val();
        var contact_purpose=$('#contact_purpose').val();
        var contact_remark=$('#contact_remark').val();
            
            param = 'id=' + con_id +'&contact_name='+contact_name+'&contact_email='+contact_email+'&contact_department='+contact_department+'&contact_phone='+contact_phone+'&contact_position='+contact_position+'&contact_mobile='+contact_mobile+'&contact_purpose='+contact_purpose+'&contact_remark='+contact_remark;
            
            
            update_contact(param).done(function(value) {
           
            });
           
            $('tr#'+con_id+' td:nth-child(2)').html(customer_id);
            $('tr#'+con_id+' td:nth-child(3)').html(contact_name);
             $('tr#'+con_id+' td:nth-child(4)').html(contact_email);
              $('tr#'+con_id+' td:nth-child(5)').html(contact_department);
               $('tr#'+con_id+' td:nth-child(6)').html(contact_phone);
                $('tr#'+con_id+' td:nth-child(7)').html(contact_position);
                 $('tr#'+con_id+' td:nth-child(8)').html(contact_mobile);
                  $('tr#'+con_id+' td:nth-child(9)').html(contact_purpose);
                   $('tr#'+con_id+' td:nth-child(10)').html(contact_remark);
            $('#serial').val(null);
           $('#contact_name').val(null);
           $('#contact_email').val(null);
           $('#contact_department').val(null);
           $('#contact_phone').val(null);
           $('#contact_position').val(null);
           $('#contact_mobile').val(null);
           $('#contact_purpose').val(null);
           $('#contact_remark').val(null);
            $('.project_name_error').hide();
            
             $(".contactperson__updatesubmit").attr('class', 'btn btn-sm btn-primary contactperson__editsubmit');
           $(".contactperson__editsubmit").html('<i class="fa fa-plus fa-fw"></i> add');
           
        }
       
    });
    
     function update_contact(param) {
        return $.ajax({
            type: 'POST',
            data: param,
            url: path_url + 'Customers/contact_edit_rule/'
        });
    }
    
    
    
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
            url: path_url+"/Quotations/get_customer_value",
            data: 'cust_id='+customer_id,
            cache: false,
            success: function(data)
            {
                data1 = $.parseJSON(data);
                address_node    =   data1.Address;
                contact_person_info =   data1.Contactpersoninfo;
                salesperson_node =   data1.CusSalesperson;
                $.each(address_node,function(k,v){
                    if(v.type=='registered'){
                    $('#val_address').val(v.address);}
                });
                $.each(contact_person_info,function(k,v){
                    $('#val_attn').append('<option value="'+v.id+'">'+v.name+'</option>');
                });
                  var sal_name    =  [];
                  $.each(salesperson_node,function(k,v){
                      sal_name.push(v.Salesperson.salesperson);   
                });
                $('#val_salesperson').val(sal_name.join(' , '));
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
          $('#tab-content_project').append('<div class="tab-pane active" id="example-tabs2-project'+n+'">'+projectname+'</div>');
          $('#val_projectname').val(null);
         
          $.ajax({
            type: 'POST',
            data:"projectname="+projectname+"&customer_id="+customer_id,
            url: path_url+'/customers/addprojectinfo/',
            success:function(data){
                $('#tabs_project').append('<li id="'+data+'" class="active"><a href="#example-tabs2-project'+n+'"><button class="close" type="button" id="'+data+'">×</button>Project'+n+'</a></li>');
                
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
        
         var n = $("ul#tabs_reg li").size()+1;
          $('#tab-content').append('<div class="tab-pane active" id="example-tabs2-Address'+n+'">'+regaddress+'</div>');
          $('#val_regaddress').val(null);
         
          $.ajax({
            type: 'POST',
            data:"regaddress="+regaddress+"&customer_id="+customer_id,
            url: path_url+'/customers/editregaddress/',
            success:function(data){
                $('#tabs_reg').append('<li id="'+data+'" class="active"><a href="#example-tabs2-Address'+n+'"><button class="close" type="button" id="'+data+'" >×</button>Address'+n+'</a></li>');
                
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
        
         var n = $("ul#tabs_bill li").size()+1;
          $('#tab-content_bill').append('<div class="tab-pane active" id="example-tabs2-billing'+n+'">'+billaddress+'</div>');
          $('#val_billaddress').val(null);
         
          $.ajax({
            type: 'POST',
            data:"billaddress="+billaddress+"&customer_id="+customer_id,
            url: path_url+'/customers/editbilladdress/',
            success:function(data){
                $('#tabs_bill').append('<li id="'+data+'" class="active"><a href="#example-tabs2-billing'+n+'"><button class="close" type="button" id="'+data+'">×</button>Address'+n+'</a></li>');
                
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
        
         var n = $("ul#tabs_delivery li").size()+1;
          $('#tab-content_delivery').append('<div class="tab-pane active" id="example-tabs2-delivery'+n+'">'+deliveryaddress+'</div>');
          $('#val_deliveryaddress').val(null);
         
          $.ajax({
            type: 'POST',
            data:"deliveryaddress="+deliveryaddress+"&customer_id="+customer_id,
            url: path_url+'/customers/editdeliveryaddress/',
            success:function(data){
                $('#tabs_delivery').append('<li id="'+data+'" class="active"><a href="#example-tabs2-delivery'+n+'"><button class="close" type="button" id="'+data+'">×</button>Address'+n+'</a></li>');
                
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
        
         var n = $("ul#tabs_project li").size()+1;
          $('#tab-content_project').append('<div class="tab-pane active" id="example-tabs2-project'+n+'">'+projectname+'</div>');
          $('#val_projectname').val(null);
         
          $.ajax({
            type: 'POST',
            data:"projectname="+projectname+"&customer_id="+customer_id,
            url: path_url+'/customers/editprojectinfo/',
            success:function(data){
                $('#tabs_project').append('<li id="'+data+'" class="active"><a href="#example-tabs2-project'+n+'"><button class="close" type="button" id="'+data+'">×</button>Project'+n+'</a></li>');
                
            }
                    
        });
        $('#modal-project').modal('hide');
    
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

$(document).on('click','.instrument_id',function(){
        var instrument_id=$(this).attr('id');
        var ins_text=$(this).text();
        $('#val_description').val(ins_text);
        $('.ins_error').hide();
        $('#search_instrument').fadeOut();
        $.ajax({
            type: "POST",
            
            url: path+"Quotations/get_brand_value",
            data: 'instrument_id='+instrument_id,
            cache: false,
            
            success: function(data)
            {
                
                parsedata = $.parseJSON(data);
                var dept    =   parsedata.Instrument;
                $.each(parsedata.Instrument.InstrumentBrand, function(k, v)
                {
                     $('#val_brand').append('<option value='+v.Brand.id+'>'+v.Brand.brandname+'</option>');
                  
                });
                
                $.each(parsedata.Instrument.InstrumentRange, function(k, v)
                {
                   
                     $('#val_range').append('<option value='+v.Range.id+'>'+v.Range.range_name+'</option>');
                  
                });
                    
                $('#val_department').val(dept.Department.departmentname);
                $('#val_department_id').val(dept.Department.id);
                $('#val_model_no').val(parsedata.CustomerInstrument.model_no);
                $('#QuotationInstrumentId').val(instrument_id);
                $('#val_unit_price').val(parsedata.CustomerInstrument.unit_price);
                        
            }
    });
    });
    $('.ins_error').hide();
   $(document).on('click','.description_add',function(){
       
        if($('#val_description').val()=='')
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
   $(document).on('click','.instrument_delete',function(){
      var device_id=$(this).attr('data-delete');
      var result    =   confirm('Are you sure want to delete?');
      if(result==true){
       $.ajax({
            type: 'POST',
            data:"device_id="+ device_id,
            url: path_url+'/Quotations/delete_instrument/',
            success:function(data){
                $('.instrument_remove_'+device_id).fadeOut();
            }
        });
    }
   });
    $(document).on('click','.instrument_edit',function(){
      var edit_device_id=$(this).attr('data-edit');
      $('.update_device').html('<button class="btn btn-sm btn-primary device_update" type="button"><i class="fa fa-plus fa-fw"></i> Update</button>');
       $.ajax({
            type: 'POST',
            data:"edit_device_id="+ edit_device_id,
            url: path_url+'/Quotations/edit_instrument/',
            success:function(data){
               edit_node=$.parseJSON(data);
               $('#device_id').val(edit_node.Device.id);
               $('#val_quantity').val(edit_node.Device.quantity);
                $('#val_description').val(edit_node.Instrument.name);
                $('#QuotationCustomerId').val(edit_node.Device.customer_id);
                $('#val_model_no').val(edit_node.Device.model_no);
                $('#val_brand').empty().append('<option value="">Select Brand</option><option selected="selected" value="'+edit_node.Brand.id+'">'+edit_node.Brand.brandname+'</option>');
                $('#val_range').val(edit_node.Device.range);
                
                $('#val_call_location').val(edit_node.Device.call_location);
                $('#val_call_type').val(edit_node.Device.call_type);
                $('#val_validity').val(edit_node.Device.validity);
                
                $('#val_unit_price').val(edit_node.Device.unit_price);
                $('#val_discount1').val(edit_node.Device.discount);
                $('#val_department').val(edit_node.Department.departmentname);
                
                $('#val_account_service').val(edit_node.Device.account_service);
                $('#val_title').val(edit_node.Device.title);
              
            }
        });
        
   });
   $(document).on('click','.device_update',function(){
       
      if($('#val_description').val()=='')
        {
            $('.ins_error').addClass('animation-slideDown');
            $('.ins_error').css('color','red');
            $('.ins_error').show();
            return false;
        }
        $('.update_device').html('<button class="btn btn-sm btn-primary description_add" type="button"><i class="fa fa-plus fa-fw"></i> add</button>');
        var device_id =   $('#device_id').val();
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
        var instrument_department=$('#val_department').val();
        var instrument_account=$('#val_account_service').val();
        var instrument_title=$('#val_title').val();
        $.ajax({
            type: 'POST',
            data:"device_id="+device_id+"&instrument_validity="+instrument_validity+"&customer_id="+customer_id+"&instrument_id="+instrument_id+"&instrument_quantity="+instrument_quantity+"&instrument_brand="+instrument_brand+"&instrument_modelno="+instrument_modelno+"&instrument_range="+instrument_range+"&instrument_calllocation="+instrument_calllocation+"&instrument_calltype="+instrument_calltype+"&instrument_unitprice="+instrument_unitprice+"&instrument_discount="+instrument_discount+"&instrument_department="+instrument_department+"&instrument_account="+instrument_account+"&instrument_title="+instrument_title,
            url: path+'Quotations/update_instrument/',
            success: function(data)
            {
               $('.instrument_remove_'+device_id).remove();
               $('.Instrument_info').append('<tr class="instrument_remove_'+device_id+'">\n\\n\
                                    <td class="text-center">'+device_id+'</td>\n\
                                    <td class="text-center">'+instrument_name+'</td>\n\\n\
                                    <td class="text-center">'+instrument_modelno+'</td>\n\
                                    <td class="text-center">'+instrument_calllocation+'</td>\n\
                                    <td class="text-center">'+instrument_calltype+'</td>\n\
                                    <td class="text-center">'+instrument_validity+'</td>\n\
                                    <td class="text-center">'+instrument_unitprice+'</td>\n\\n\
                                    <td class="text-center">'+instrument_account+'</td>\n\\n\
                                    <td class="text-center">'+instrument_total+'</td>\n\\n\
                                    <td class="text-center"><div class="btn-group">\n\
                                    <a data-edit="'+device_id+'"class="btn btn-xs btn-default instrument_edit" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>\n\
                                    <a data-delete="'+device_id+'" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger instrument_delete">\n\
                                    <i class="fa fa-times"></i></a></div></td></tr>');
                
                $('#val_quantity').val(null);
                $('#val_description').val(null);
                $('#val_model_no').val(null);
                $('#val_brand').empty().append('<option value="">Select Brand</option>');
                $('#val_range').val(null);
                $('#val_unit_price').val(null);
                $('#val_discount').val('');
                $('#val_description').val(null);
                }
        });
        
   });
      setTimeout(function(){
          $('.alert_box').slideUp('slow');
      },5000);
  
    $('.quotation_search').click(function(){
        var quotation_single_id =   $('#SalesorderQuotationId').val();
       $.ajax({
          type:'POST',
          url:path_url+'Salesorders/check_quotation_count',
          data:'single_quote_id='+quotation_single_id,
          success:function(data){
              if(data=='success')
              {
                $('#SalesorderAddForm').submit();
              }
              if(data=='failure')
              {
                   $('#SalesorderQuotationId').css('border','1px solid red');
                   return false;
              }
          }
       });
       
    });
     $(document).on('click','.quotation_single',function(){
        var quote_id=$(this).text();
        $('#SalesorderQuotationId').val(quote_id);
        $('#quoat_list').fadeOut();
    });
    
    $('#SalesorderQuotationId').blur(function(){
         $('#quoat_list').fadeOut();
    })
}); 
    
