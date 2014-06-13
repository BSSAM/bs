/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
   $('.prepare').click(function(){
      var id    =   $(this).attr('id');
      var results   =   confirm('Are you Sure want to Approve ?');
      if(results==true)
      {
           $.ajax({
            type: 'POST',
            data:"invoice_id="+id,
            url: path_url+'/Invoices/invoice_approved/',
            success:function(data){
               
                $('.invoice_'+id).fadeOut();
                $('.odd').remove();
            }
                    
        });
      }
   });
   $('.invoice_active').click(function(){
   $('.invoice_info').load(path_url+'/Invoices/invoice_approved_list/');
   setTimeout( function() {
              $('.invoice_info').load(path_url+'/Invoices/invoice_approved_list/');
              refresh();
            }, 1000);
   });
    
})

