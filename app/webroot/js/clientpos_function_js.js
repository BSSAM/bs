/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
                                

$(document).ready(function(){
    var count=1;
    $(document).on('click','#add_po',function(){
        
         var quo_inst_count  =$('#val_quotationcount').val(); 
      
       if($('#val_pocount').val()!=quo_inst_count)
       {
            $('.po_up').append('<div class="group_po_'+(count++)+'"><div class="form-group"><label class="col-md-2 control-label" for="val_ponumber">Purchase Order No</label><div class="col-sm-3"><div class="input-group">\n\
\n\<input type="text" name="clientpos_no[]" id="val_ponumber_'+(count-1)+'" class="form-control"/>\n\
<span class="input-group-btn"><button class="btn btn-primary generate_po" id="val_ponumber_'+(count-1)+'" type="button">Generate Po</button></span>\n\
</div></div><label class="col-md-2 control-label" for="val_pocount'+(count-1)+'">PO Instrument Count</label><div class="col-sm-1">\n\
<input type="text" name="po_quantity[]" id="val_pocount'+(count-1)+'" class="form-control"/> </div>\n\
<div class="col-md-1"><div class="btn-group btn-group-sm form-control-static"><div class="btn btn-alt btn-info" id="delete_po" data-delete='+(count-1)+' ><i class="fa fa-minus"></i></div></div> </div></div></div>');
       }
    });
   $(document).on('click','#delete_po',function(){
     var data_length= $(this).attr('data-delete');
     $('.group_po_'+data_length).remove();
   });
   
   $(document).on('click','.generate_po',function()
   {
       var po_id    =   $(this).attr('id');
       $('#'+po_id).val('CPO'+Math.floor(Math.random() * (1000 -100000 + 1)) + 1000);
   });
   $(document).on('change','#val_quotation',function(){
       $('#customer_quotation_no').val($('#val_quotation option:selected').text());
       var  quotation_id =$(this).val();
       if(quotation_id!=''){
        $.ajax({
		type: 'POST',
                data:"quotation_id="+quotation_id,
		url: path_url+'/Clientpos/get_quotation_values/',
                success:function(data){
                    var data_node   =   $.parseJSON(data);
                    $('#val_quotationcount').val(data_node.Device.length);
                    $('#track_id').val(data_node.Quotation.track_id);
                  
                }
            });
        }
        else
        {
            $('#val_quotationcount').val('');
        }
    });
    
});
