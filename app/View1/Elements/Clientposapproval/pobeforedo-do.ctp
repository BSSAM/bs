<script>
    var path_url    =   '<?PHP echo Router::url('/',true); ?>';
    $('#dofull-datatable').dataTable({
             // "aoColumnDefs": [ { "bSortable": false, "aTargets": [ 1, 5 ] } ],
                "iDisplayLength": 5,
                "aLengthMenu": [[5,10, 20, 30, -1], [5,10, 20, 30, "All"]]
            });
</script>

<div class="table-responsive">
    <table id="dofull-datatable" class="table table-vcenter table-condensed table-bordered">
        <thead>
            <tr>
                <!--<th class="text-center"><i class="gi gi-user"></i></th>-->
                <th class="text-center">DO No</th>
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
            <?PHP if(!empty($do_list_bybeforedo)):  ?>
            <?php foreach($do_list_bybeforedo as $do_list): ?>
            <?PHP if($do_list['Deliveryorder']['po_generate_type']=='Automatic'){$class="error";}elseif($do_list['Deliveryorder']['po_generate_type']=='Manual'){$class="success";}else{ $class="warning";} ?>
            <tr class=<?PHP echo $class; ?>>
                <td class="text-center"><?PHP echo $do_list['Deliveryorder']['id'] ?></td>
                <td class="text-center"><?PHP echo $this->find_sales_order($do_list['Deliveryorder']['quotationno']); ?></td>
                <td class="text-center"><?PHP echo $do_list['Deliveryorder']['reg_date'] ?></td>
                <td class="text-center"><?PHP echo $do_list['branch']['branchname'] ?></td>
                <td class="text-center"><?PHP echo $do_list['Deliveryorder']['customername'] ?></td>
                <td class="text-center"><?PHP echo $do_list['Deliveryorder']['phone'] ?></td>
                <td class="text-center"><?PHP echo $do_list['Deliveryorder']['email'] ?></td>
                <td class="text-center word_break">
                    <?PHP if($do_list['Deliveryorder']['po_generate_type']=='Automatic'){$class="danger";}elseif($do_list['Deliveryorder']['po_generate_type']=='Manual'){$class="success";}else{ $class="warning";} ?>
                    <?PHP $po_array =  explode(',',$do_list['Deliveryorder']['ref_no']);  ?>
                    <?PHP foreach($po_array as $po_key=>$po_value): ?>
                    <span class="label label-<?PHP echo $class; ?>">
                        <?PHP echo $po_value; ?>
                    </span>&nbsp;&nbsp;
                    <?PHP endforeach; ?>
                </td>
                <td class="text-center">
                    <?php if($userrole_clientpo['view']==1){ ?>
                    <?PHP if(($do_list['Deliveryorder']['po_generate_type']=='Automatic'||$do_list['Deliveryorder']['po_generate_type']=='Manual')){?>
                    <div class="btn-group">
                       <?php //echo $do_list['Deliveryorder']['po_generate_type']; ?>
                                <?PHP $invoice_type = $this->ClientPO->getinvoice_type($do_list['Customer']['id']); ?>
                                <a href="#modal-user-settings-do" data-toggle="modal" class="btn btn-alt btn-xs btn-success client_po_quotation_update_do" data-placement="bottom" title="Update" data-id="<?PHP echo $do_list['Deliveryorder']['id'] ?>">Update</a>

                    <?PHP }
                    //else if($do_list['Deliveryorder']['po_generate_type']=='Manual'&&$do_list['Deliveryorder']['is_jobcompleted']==1){ ?>

                                 <?php //echo $this->Form->button('Finished', array('type'=>'button','data-toggle' => 'tooltip', 'class' => 'btn btn-alt btn-xs btn-success', 'escape' => false,)); ?>

                        
                    </div>
                    <?PHP }?>
                    <?php if($userrole_clientpo['approve']==1){ ?>
                    <?PHP if(($do_list['Deliveryorder']['po_generate_type']=='Automatic'||$do_list['Deliveryorder']['po_generate_type']=='Manual')){?>
                    <div class="btn-group">
                       <?php //echo $do_list['Deliveryorder']['po_generate_type']; ?>
                                <?PHP $invoice_type = $this->ClientPO->getinvoice_type($do_list['Customer']['id']); ?>
                                <a href="#modal-user-settings-do" data-toggle="modal" class="btn btn-alt btn-xs btn-success client_po_quotation_update_do" data-placement="bottom" title="Approve" data-id="<?PHP echo $do_list['Deliveryorder']['id'] ?>">Approve</a>

                    <?PHP }
                    //else if($do_list['Deliveryorder']['po_generate_type']=='Manual'&&$do_list['Deliveryorder']['is_jobcompleted']==1){ ?>

                                 <?php //echo $this->Form->button('Finished', array('type'=>'button','data-toggle' => 'tooltip', 'class' => 'btn btn-alt btn-xs btn-success', 'escape' => false,)); ?>

                        <?PHP // }?>
                    </div>
                    <?PHP }?>
                    <?php if($do_list['Deliveryorder']['po_generate_type']=='Manual'&&$do_list['Deliveryorder']['is_poapproved']==1){ ?>
                    <br><br>
                    <span class="label label-info">
                        <?PHP echo "Approved"; ?>
                    </span>
                    <span class="label label-info"></span>
                    <?PHP }?>
                    
                 </td>
                <td>
                    <?php if($do_list['Deliveryorder']['po_generate_type']=='Manual'): ?><span class="label label-five">Ma</span> <?php endif; ?>
                    <?php if($do_list['Deliveryorder']['po_generate_type']!='Manual'): ?><span class="label label-six">Au</span> <?php endif; ?>
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
                    
      <div id="modal-user-settings-do" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="block quotation_fullview">
                    <!-- Grids Content Content -->
                    


                    <!-- END Grids Content Content -->
                </div>  
            </div>
        </div>
    </div>