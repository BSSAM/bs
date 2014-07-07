/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
                                

$(document).ready(function(){
    var count=1;
    var quo_inst_count  =$('#val_quotationcount').val(); 
//     var po_count    =   $('.group_po_'+(count-1)+'#val_pocount'+(count-1)).val();
//   alert('.group_po_'+(count-1)+'#val_pocount'+(count-1));
//    alert(po_count);
    $(document).on('click','#add_po',function(){
       if($('#val_pocount').val()!=quo_inst_count)
       {
            $('.po_up').append('<div class="group_po_'+(count++)+'"><label class="col-md-2 control-label" for="val_ponumber">PO Number</label><div class="col-md-4">\n\
\n\<input type="text" name="clientpos_id" id="val_ponumber" class="form-control" placeholder="Enter the Purchase Order No"/>\n\
</div><label class="col-md-2 control-label" for="val_pocount'+(count-1)+'">PO Instrument Count</label><div class="col-md-3">\n\
<input type="text" name="po_quantity" id="val_pocount'+(count-1)+'" class="form-control" placeholder="Enter the Purchase Order Count"/> </div>\n\
<div class="col-md-1"><div class="btn-group btn-group-sm form-control-static"><div class="btn btn-alt btn-info" id="delete_po" data-delete='+(count-1)+' ><i class="fa fa-minus"></i></div></div> </div></div>');
        
       }
       
    });
   $(document).on('click','#delete_po',function(){
     var data_length= $(this).attr('data-delete');
     $('.group_po_'+data_length).remove();
   });
});
