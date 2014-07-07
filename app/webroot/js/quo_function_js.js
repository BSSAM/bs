$(document).ready(function(){
    
   /**********************Customer Search For Quotation Module*****************************************************************************/
    $("#result").hide();
    $("#val_customer").keyup(function() 
    { 
        var customer = $(this).val();
        var dataString = 'name='+ customer;
        if(customer!='')
        {
            $.ajax({
            type: "POST",
            url: path_url+"/Quotations/search",
            data: dataString,
            cache: false,
            success: function(html)
            {
                $("#result").html(html).show();
            }
            });
        }
    });
 /****************************Email Id Change Based on Contact Person Value Changes in Quotation Module ***********************************/
   $(document).on('change','#val_attn',function(){
      var con_person =   $(this).val();
        $.ajax({
            type: 'POST',
            data:"cid="+con_person,
            url: path_url+'/Quotations/get_contact_email/',
            success:function(data){
                $('#val_email').val(data);
            }
        });
   }); 
   /*********************************************************************************************************************************************************************************/
   $('#val_description').blur(function(){
         $('#search_instrument').fadeOut();
    })
    /**************************Quotation Approval in Quotation Module*************************************/
    $(document).on('click','.approve_quotation',function(){
       var val_quotationno=$('#val_quotationno').val();
       
       if(window.confirm("Are you sure?")){
       $.ajax({
            type: 'POST',
            data:"id="+val_quotationno,
            url: path+'Quotations/approve/',
            success: function(data)
            {
                //return false;
               window.location.reload();
            }
            
        });
    }
    else
    {
        return false;
    }
       
   });
   /***************************************************************************************************/
});