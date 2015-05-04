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
           // alert(myarr); 
            $('#sno').val(myarr[0]);
            $('#contact_email').val(myarr[3]);
            $('#contact_name').val(myarr[5]);
            $('#contact_department').val(myarr[6]);
            $('#contact_phone').val(myarr[7]);
            $('#contact_position').val(myarr[8]);
            $('#contact_mobile').val(myarr[9]);
            $('#contact_purpose').val(myarr[10]);
            $('#contact_remark').val(myarr[4]);
            $(".contactperson_editsubmit").html('Update');
            $(".contactperson_editsubmit").attr('class', 'btn btn-sm btn-primary contactperson_updatesubmit');
            $(".contactperson_updatesubmit").attr('id',myarr[0]);
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
    
    
    
    $(document).on('click','.contactperson_updatesubmit',function()
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
            
             $(".contactperson_updatesubmit").attr('class', 'btn btn-sm btn-primary contactperson_editsubmit');
           $(".contactperson_editsubmit").html('<i class="fa fa-plus fa-fw"></i> add');
           
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
    $(document).on('click','.customer_show',function(){
        var customer_name=$(this).text();
        $('#preq_customer').val(customer_name);
        $('#val_customer').val(customer_name);
        //for Quotation_invoice
        $('#val_ref_no').removeAttr('readonly');
        $('#purchase_order').addClass('quo_generate_po');
        $('#result').fadeOut();
        var customer_id=$(this).attr('id');
        $.ajax({
            type: "POST",
            url: path_url+"/Quotations/get_customer_value",
            data: 'cust_id='+customer_id,
            cache: false,
            success: function(data)
            {
                //console.log(data); return false;
				try {
 data1 = $.parseJSON(data);
  } catch (e) {
    // error
    return;
  }
                
                address_node    =   data1.Address;
                contact_person_info =   data1.Contactpersoninfo;
                salesperson_node =   data1.CusSalesperson;
                // Calibration type based on customer for instrument
                calibrationtype = data1.Customer.calibrationtype;
                $('#val_call_type').find("option").filter(function(){
      return ( ($(this).val() == calibrationtype) || ($(this).text() == calibrationtype) )
    }).prop('selected', true);
               $('#sales_calltype').find("option").filter(function(){
      return ( ($(this).val() == calibrationtype) || ($(this).text() == calibrationtype) )
    }).prop('selected', true);
                $.each(address_node,function(k,v){
                    if(v.type=='registered'){
                    $('#val_address').val(v.address);}
                });
                $('#val_attn').empty().append('<option value="">Select Contact person Name</option>');
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
                $('#invoice_type_id').val(data1.Customer.invoice_type_id);
                $('#PurchaseRequisitionCustomerId').val(data1.Customer.id);
                $('#SalesorderCustomerId').val(data1.Customer.id);
                $('#val_payment_term').val(data1.Paymentterm.paymentterm+' '+ data1.Paymentterm.paymenttype);
                $('#pay_id').val(data1.Paymentterm.id);
            }
	});
    });
    $('.project_name_error').hide();

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

      setTimeout(function(){
          $('.alert_box').slideUp('slow');
      },5000);
  
    
     $('#val_customer').blur(function(){
         $(this).val('');
         $('#result').fadeOut();
    });
    
    // Proforma Invoice
    
    $('.salesorder_search').click(function(){
        var salesorder_single_id =   $('#ProformaSalesorderId').val();
       $.ajax({
          type:'POST',
          url:path_url+'Proformas/check_salesorder_count',
          data:'single_salesorder_id='+salesorder_single_id,
          success:function(data){
              if(data=='success')
              {
                $('#ProformaAddForm').submit();
              }
              if(data=='failure')
              {
                   $('#ProformaSalesorderId').css('border','1px solid red');
                   return false;
              }
          }
       });
       
    });
    
    $('#ProformaSalesorderId').blur(function(){
         $('#sales_list').fadeOut();
    });
	
	 $(document).on('click','.salesorder_single',function(){
        var salesorder_id=$(this).text();
        $('#ProformaSalesorderId').val(salesorder_id);
        $('#salesorder_single').fadeOut();
    });
    
    // Instrument Approval
    $(document).on('click','.approve_instrument',function(){
       var val_instrumentid = $('#instru_id').val();
       if(window.confirm("Are you sure?")){
       $.ajax({
            type: 'POST',
            data:"id="+val_instrumentid,
            url: path+'Instruments/approve/',
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
   
    // Procedure Approval
    $(document).on('click','.approve_procedure',function(){
       var val_procedureid = $('#pro_id').val();
       if(window.confirm("Are you sure?")){
       $.ajax({
            type: 'POST',
            data:"id="+val_procedureid,
            url: path+'Procedures/approve/',
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
   
    // Unit Approval
    $(document).on('click','.approve_unit',function(){
       var val_unitid = $('#unit_id').val();
       if(window.confirm("Are you sure?")){
       $.ajax({
            type: 'POST',
            data:"id="+val_unitid,
            url: path+'Units/approve/',
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
   // Brand Approval
   $(document).on('click','.approve_brand',function(){
       var val_brandid = $('#brand_id').val();
       if(window.confirm("Are you sure?")){
       $.ajax({
            type: 'POST',
            data:"id="+val_brandid,
            url: path+'Brands/approve/',
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
   
   // Range Approval
    $(document).on('click','.approve_range',function(){
       var val_rangeid = $('#range_id').val();
       if(window.confirm("Are you sure?")){
       $.ajax({
            type: 'POST',
            data:"id="+val_rangeid,
            url: path+'Ranges/approve/',
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
    // Instrument Group Approval
    $(document).on('click','.approve_group',function(){
       var group_id = $('#group_id').val();
       if(window.confirm("Are you sure?")){
       $.ajax({
            type: 'POST',
            data:"id="+group_id,
            url: path+'Instrumentforgroups/approve/',
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
//   $(document).ready(function () {
//    $(document).beforeSend(function () {
//         NProgress.start();
//    }).ajaxStop(function () {
//          NProgress.done();
//    });
//}); 
