<div class="col-sm-3 col-lg-12">
<div class="table-responsive">
<table id="beforedo-datatable"  class="table table-vcenter table-condensed table-bordered">
    <thead>
        <tr>
            <th class="text-center">S.No</th>
            <th class="text-center">Instrument</th>
            <th class="text-center">Model No</th>
            <th class="text-center">Validity</th>
            <th class="text-center">Unit Price</th>
            <th class="text-center">Account Service</th>
            <th class="text-center">Total</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody class="Instrument_info"> 
        <?PHP 
            if(!empty($this->request->data['ReqDevice'])):
                foreach($this->request->data['ReqDevice'] as $device):?>
                <tr class="prpur_instrument_remove_<?PHP echo $device['id']; ?>">
                    <td class="text-center"><?PHP echo $device['id']; ?></td>
                    <td class="text-center"><?PHP echo $device['instrument_name']; ?></td>
                    <td class="text-center"><?PHP echo $device['model_no']; ?></td>
                    <td class="text-center"><?PHP echo $device['validity']; ?></td>
                    <td class="text-center"><?PHP echo $device['unit_price']; ?></td>
                    <td class="text-center"><?PHP echo $device['account_service']; ?></td>
                    <td class="text-center"><?PHP echo $device['total']; ?></td>
                   <td class="text-center">
                        <div class="btn-group">
                            <a data-delete="<?PHP echo $device['id']; ?>" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger prpur_instrument_delete">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </td>
                </tr>
        <?PHP   endforeach;  endif;  ?>
    </tbody>
</table>
</div>
</div>