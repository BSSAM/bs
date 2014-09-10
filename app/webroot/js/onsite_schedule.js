/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
    $(document).on('click','.onsite_qo_single',function(){
        var qo_id=$(this).text();
        $('#onsite_input_search').val(qo_id);
        $('#onsite_list').fadeOut();
    });
    $('#onsite_input_search').blur(function(){
         $('#onsite_list').fadeOut();
    })
    $(document).on('click','.onsite_search',function()
    {
        var qo_id=$('#onsite_input_search').val();
        if(qo_id=='')
        {
            $('#onsite_input_search').css('border','1px solid red');
            return false;
        }
        $.ajax({
            type: "POST",
            url: path_url+"/Onsites/get_qo_details",
            data: 'qo_id='+qo_id,
            cache: false,
            success: function(data)
            {
                if(data!='failure')
                {
                    var onsite_node = $.parseJSON(data);
                    var customer_address_node   =   onsite_node.Customer.Address;
                    var contact_person_node   =   onsite_node.Customer.Contactpersoninfo;
                    $('#quotation_id').val(onsite_node.Quotation.id);
                    $('#quotationno').val(onsite_node.Quotation.quotationno);
                    $('#customer_id').val(onsite_node.Customer.id);
                    $('#val_customer').val(onsite_node.Customer.customername);
                    $.each(customer_address_node,function(k,v){
                        if(v.type=='registered'){
                             $('#val_address').val(v.address);
                        }
                    });
                    $.each(contact_person_node,function(k,v){
                         $('#val_attn').append('<option value="'+v.id+'">'+v.name+'</option>');
                    });
                   $('#val_customer').val(onsite_node.Customer.customername);
                    $('#val_fax').val(onsite_node.Customer.fax);
                  
                    $('#val_phone').val(onsite_node.Quotation.phone);                
                  
                       $.each(onsite_node.OnsiteInstrument,function(key,value){  
                        if(onsite_node.OnsiteInstrument.length===0)
                        {
                            $('.delivery_instrument_node').html('No Records Found');
                        }
                        else
                        {
                            $('.onsite_instrument_node .dataTables_empty').hide();
                            $('.onsite_instrument_node').append('\n\
                                    <tr class="tr_color sales_instrument_remove_'+value.id+'">\n\\n\
                                    <td class="text-center">'+value.OnsiteInstrument.id+'</td>\n\
                                    <td class="text-center">'+value.Instrument.name+'</td>\n\\n\\n\
                                    <td class="text-center">'+value.OnsiteInstrument.model_no+'</td>\n\
                                    <td class="text-center">'+value.OnsiteInstrument.onsite_calllocation+'</td>\n\\n\
                                    <td class="text-center">'+value.OnsiteInstrument.onsite_calltype+'</td>\n\
                                     <td class="text-center">'+value.OnsiteInstrument.onsite_validity+'</td>\n\
                                    <td class="text-center">'+value.OnsiteInstrument.onsite_unitprice+'</td>\n\\n\
                                    <td class="text-center">'+value.Department.departmentname+'</td>\n\\n\
                                    <td class="text-center">'+value.OnsiteInstrument.onsite_total+'</td>\n\
                                    </tr>');
                        }
                        
                    });
                   
                }
                if(data=='failure')
                {
                    alert('Sorry ! The Requested Id could not be process');
                    return false;
                }
            },
            error: function () 
            {
                alert('Sorry ! Network Connection Failure');
                return false;
            }
	});
    });
    
     
    
  
   /************************For Onsite Engineer add*********************************/
     $(document).on('change','#val_engineer',function(){
       var engineer_email =$(this).val();
       var engineer_name =$('#val_engineer option:selected').text();
       var onsiteschedule_no    =   $('#onsiteschedule_no').val();
      
       if(engineer_email!=''&&engineer_name!='')
       {
           $.ajax({
            type: "POST",
            url: path_url+"/Onsites/add_engineers",
            data: 'engineer_name='+engineer_name+'&engineer_email='+engineer_email+'&onsiteschedule_no='+onsiteschedule_no,
            cache: false,
            success: function(data)
            {
                if(data!=''){
                      $('.engineer_info').append('\n\
                                    <tr class="tr_color engineer_remove_'+data+' '+engineer_email+'">\n\\n\
                                    <td class="text-center">'+engineer_name+'</td>\n\
                                    <td class="text-center">'+engineer_email+'</td>\n\\n\\n\
                                    <td class="text-center"><div class="btn-group">\n\
                                    <a data-delete="'+data+'" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger engineer_delete">\n\
                                    <i class="fa fa-times"></i></a>\n\
                                    </tr>');
                }
               
            
            }
	});
       }
       else
       {
           
           $('#DeliveryorderCustomerAddress').val('');
       }
    });
     /***************************Engineer Delete Script**************************/
    $(document).on('click','.engineer_delete',function(){
      var eng_id=$(this).attr('data-delete');
      var result    =   confirm('Are you sure want to delete?');
      if(result==true){
       $.ajax({
            type: 'POST',
            data:"engineer_id="+ eng_id,
            url: path_url+'/Onsites/delete_engineer/',
            success:function(data){
                if(data==1){
                $('.engineer_remove_'+eng_id).fadeOut();
                
                }
            }
        });
    }
   });
    
})
