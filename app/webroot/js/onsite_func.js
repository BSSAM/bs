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
            url: path_url+"/Onsites/search",
            data: dataString,
            cache: false,
            success: function(html)
            {
                $("#result").html(html).show();
            }
            });
        }
    });
    });