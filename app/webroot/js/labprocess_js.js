/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
   $('input[name="solist"]').click(function(){
       var so_list   =   $(this).attr('value');
       var call_location    =   $("input:radio[name='calllocation']:checked").val();
       $.ajax({
            type: 'POST',
            data:"solist="+ so_list+"&calllocation="+call_location,
            url: path_url+'/Labprocesses/so_list_variations/',
            success:function(data){
                $('.so_paste').html(data);
            }
        });
   })
   $('input[name="calllocation"]').click(function(){
       var call_id=  $(this).attr('value');
       var so_node    =  $("input:radio[name='solist']:checked").val();
      $.ajax({
            type: 'POST',
            data:"solist="+ so_node+"&calllocation="+call_id,
            url: path_url+'/Labprocesses/so_list_variations/',
            success:function(data){
                $('.so_paste').html(data);
            }
        });
   })
   
});



