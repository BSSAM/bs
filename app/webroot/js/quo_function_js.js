$(document).ready(function(){
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
   $('#val_description').blur(function(){
         $('#search_instrument').fadeOut();
    })
});