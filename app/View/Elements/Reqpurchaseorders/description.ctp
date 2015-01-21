<div class="col-sm-3 col-lg-12">
<div class="table-responsive">
<table id="beforedo-datatable"  class="table table-vcenter table-condensed table-bordered">
    <thead>
        <tr>
            <th class="text-center">S.No</th>
            <th class="text-center">Instrument</th>
            <th class="text-center">Model No</th>
            <th class="text-center">Brand</th>
            <th class="text-center">Range</th>
            <th class="text-center">Validity</th>
            <th class="text-center">Account Service</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody class="Instrument_info"> 
        <?PHP 
            if(!empty($requistion_details['ReqDevice'])):
                foreach($requistion_details['ReqDevice'] as $k=>$device):
                if($device['is_deleted']!=1)
                {
                ?>
                
                <tr class="prpur_instrument_remove_<?PHP echo $device['id']; ?>">
                    <td class="text-center"><?PHP echo $k+1; ?></td>
                    <td class="text-center"><?PHP echo $device['instrument_name']; ?></td>
                    <td class="text-center"><?PHP echo $device['model_no']; ?></td>
                    <td class="text-center"><?PHP echo $device['brand_name']; ?></td>
                    <td class="text-center"><?PHP echo $device['range']; ?></td>
                    <td class="text-center"><?PHP echo $device['validity']; ?></td>
                    <td class="text-center"><?PHP echo $device['account_service']; ?></td>
                    <td class="text-center">
                        <div class="btn-group">
                            <a data-delete="<?PHP echo $device['id']; ?>" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger prpur_instrument_delete">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                <?PHP   } endforeach;  endif;  ?>
    </tbody>
</table>
</div>
</div>