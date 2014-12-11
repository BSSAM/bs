<script>
    var path_url    =   '<?PHP echo Router::url('/',true); ?>';
    $('#sofull-datatable').dataTable({
             // "aoColumnDefs": [ { "bSortable": false, "aTargets": [ 1, 5 ] } ],
                "iDisplayLength": 5,
                "aLengthMenu": [[5,10, 20, 30, -1], [5,10, 20, 30, "All"]]
            });
</script>

<div class="table-responsive">
    <table id="solistvariation-datatable" class="table table-vcenter table-condensed table-bordered">
        <thead>
            <tr>
                <!--<th class="text-center"><i class="gi gi-user"></i></th>-->
<!--                <th class="text-center">Quotation No</th>-->
                <th class="text-center">Salesorder No</th>
                <th class="text-center">Reg Date</th>
                <th class="text-center">Branch</th>
                <th class="text-center">Customer</th>
                <th class="text-center">Phone</th>
                <th class="text-center">Email</th>
                <th class="text-center">Reference No</th>
                <th class="text-center">Action</th>
                <th class="text-center">Note</th>
            </tr>
        </thead>
        <tbody>
            
            
            <!----  Sales Order Full Invoice   -->
            
            
            <?PHP if(!empty($salesorder_lists_bybeforeinvoice)):  ?>
            <?php foreach($salesorder_lists_bybeforeinvoice as $salesorder_list): ?>
            <?PHP if($salesorder_list['Salesorder']['po_generate_type']=='Automatic'){$class="error";}elseif($salesorder_list['Salesorder']['po_generate_type']=='Manual'){$class="success";}else{ $class="warning";} ?>
            <tr class=<?PHP echo $class; ?>>
<!--                <td class="text-center"><?PHP //echo $salesorder_list['Salesorder']['quotationno'] ?></td>-->
                <td class="text-center"><?PHP echo $salesorder_list['Salesorder']['id'] ?></td>
                <td class="text-center"><?PHP echo $salesorder_list['Salesorder']['reg_date'] ?></td>
                <td class="text-center"><?PHP echo $salesorder_list['branch']['branchname'] ?></td>
                <td class="text-center"><?PHP echo $salesorder_list['Customer']['customername'] ?></td>
                <td class="text-center"><?PHP echo $salesorder_list['Salesorder']['phone'] ?></td>
                <td class="text-center"><?PHP echo $salesorder_list['Salesorder']['email'] ?></td>
                <td class="text-center word_break">
                    <?PHP if($salesorder_list['Salesorder']['po_generate_type']=='Automatic'){$class="danger";}elseif($salesorder_list['Salesorder']['po_generate_type']=='Manual'){$class="success";}else{ $class="warning";} ?>
                    <?PHP $po_array =  explode(',',$salesorder_list['Salesorder']['ref_no']);  ?>
                    <?PHP foreach($po_array as $po_key=>$po_value): ?>
                    <span class="label label-<?PHP echo $class; ?>">
                        <?PHP echo $po_value; ?>
                    </span>&nbsp;&nbsp;
                    <?PHP endforeach; ?>
                </td>
                <td class="text-center">
                    <?php //&&$salesorder_list['Salesorder']['is_poapproved']==0 ?>
                    <?PHP if(($salesorder_list['Salesorder']['po_generate_type']=='Automatic'||$salesorder_list['Salesorder']['po_generate_type']=='Manual')){?>
                    <div class="btn-group">
                       <?php //echo $salesorder_list['Salesorder']['po_generate_type']; ?>
                                <?PHP $invoice_type = $this->ClientPO->getinvoice_type($salesorder_list['Customer']['id']); ?>
                                <a href="#modal-user-settings-in-sales" data-toggle="modal" class="btn btn-alt btn-xs btn-success client_po_quotation_update_in_sales" data-placement="bottom" title="Update" data-id="<?PHP echo $salesorder_list['Salesorder']['id'].'/'.$salesorder_list['Customer']['invoice_type_id'] ?>">Update</a>

                    <?PHP }
                    //else if($salesorder_list['Salesorder']['po_generate_type']=='Manual'&&$salesorder_list['Salesorder']['is_jobcompleted']==1){ ?>

                                 <?php //echo $this->Form->button('Finished', array('type'=>'button','data-toggle' => 'tooltip', 'class' => 'btn btn-alt btn-xs btn-success', 'escape' => false,)); ?>

                        <?PHP //}?>
                    </div>
                    <?PHP if(($salesorder_list['Salesorder']['po_generate_type']=='Automatic'||$salesorder_list['Salesorder']['po_generate_type']=='Manual')){?>
                    <div class="btn-group">
                       <?php //echo $salesorder_list['Salesorder']['po_generate_type']; ?>
                                <?PHP $invoice_type = $this->ClientPO->getinvoice_type($salesorder_list['Customer']['id']); ?>
                                <a href="#modal-user-settings-in-sales" data-toggle="modal" class="btn btn-alt btn-xs btn-success client_po_quotation_update_in_sales" data-placement="bottom" title="Approve" data-id="<?PHP echo $salesorder_list['Salesorder']['id'].'/'.$salesorder_list['Customer']['invoice_type_id'] ?>">Approve</a>

                    <?PHP }
                    //else if($salesorder_list['Salesorder']['po_generate_type']=='Manual'&&$salesorder_list['Salesorder']['is_jobcompleted']==1){ ?>

                                 <?php //echo $this->Form->button('Finished', array('type'=>'button','data-toggle' => 'tooltip', 'class' => 'btn btn-alt btn-xs btn-success', 'escape' => false,)); ?>

                        <?PHP // }?>
                    </div>
                    <?php if($salesorder_list['Salesorder']['po_generate_type']=='Manual'&&$salesorder_list['Salesorder']['is_poapproved']==1){ ?>
                    <br><br>
                    <span class="label label-info">
                        <?PHP echo "Approved"; ?>
                    </span>
                    <span class="label label-info"></span>
                    <?PHP }?>
                    
                 </td>
                <td>
                    <?php if($salesorder_list['Salesorder']['po_generate_type']=='Manual'): ?><span class="label label-five">Ma</span> <?php endif; ?>
                    <?php if($salesorder_list['Salesorder']['po_generate_type']!='Manual'): ?><span class="label label-six">Au</span> <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; ?>
            <?PHP endif; ?>
        </tbody>
    </table>
</div>
<br>
<span class="label label-six">Au</span> - Automatic PO Generation
<span class="label label-five">Ma</span> - Manual PO Updated
                    
     <div id="modal-user-settings-in-sales" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="block sales_in_fullview">
                    <!-- Grids Content Content -->
                    


                    <!-- END Grids Content Content -->
                </div>  
            </div>
        </div>
    </div>