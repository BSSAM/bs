<script>
    $('#beforedo-datatable').dataTable({
             // "aoColumnDefs": [ { "bSortable": false, "aTargets": [ 1, 5 ] } ],
                "iDisplayLength": 5,
                "aLengthMenu": [[5,10, 20, 30, -1], [5,10, 20, 30, "All"]]
            });
    </script>
                        <div class="table-responsive">
                            <table id="beforedo-datatable" class="table table-vcenter table-condensed table-bordered">
                                <thead>
                                    <tr>
                                        <!--<th class="text-center"><i class="gi gi-user"></i></th>-->
                                        <th class="text-center">Quotation No</th>
                                        <th class="text-center">Reg Date</th>
                                        <th class="text-center">Branch</th>
                                        <th class="text-center">Customer</th>
                                        <th class="text-center">Phone</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Reference No</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?PHP if(!empty($quotation_lists_bybeforeinvoice )):  ?>
                                     <?php foreach($quotation_lists_bybeforeinvoice as $quotation_list): ?>
                                    <?PHP if($quotation_list['Quotation']['po_generate_type']=='Auotmatic'){$class="error";}elseif($quotation_list['Quotation']['po_generate_type']=='Manual'){$class="success";}else{ $class="warning";} ?>
                                    <tr class=<?PHP echo $class; ?>>
                                        <td class="text-center"><?PHP echo $quotation_list['Quotation']['quotationno'] ?></td>
                                        <td class="text-center"><?PHP echo $quotation_list['Quotation']['reg_date'] ?></td>
                                        <td class="text-center"><?PHP echo $quotation_list['branch']['branchname'] ?></td>
                                        <td class="text-center"><?PHP echo $quotation_list['Quotation']['customername'] ?></td>
                                        <td class="text-center"><?PHP echo $quotation_list['Quotation']['phone'] ?></td>
                                        <td class="text-center"><?PHP echo $quotation_list['Quotation']['email'] ?></td>
                                        <td class="text-center">
                                            <?PHP if($quotation_list['Quotation']['po_generate_type']=='Auotmatic'){$class="danger";}elseif($quotation_list['Quotation']['po_generate_type']=='Manual'){$class="success";}else{ $class="warning";} ?>
                                            <?PHP $po_array =  explode(',',$quotation_list['Quotation']['ref_no']);  ?>
                                            <?PHP foreach($po_array as $po_key=>$po_value): ?>
                                            <br><br>
                                            <span class="label label-<?PHP echo $class; ?>">
                                                <?PHP echo $po_value; ?>
                                            </span></br></br>
                                            <?PHP endforeach; ?>
                                        </td>
                                        <td class="text-center">
                                            <?PHP if($quotation_list['Quotation']['po_generate_type']=='Auotomatic'){?>
                                                    <div class="btn-group">
                                                        <?PHP $invoice_type = $this->ClientPO->getinvoice_type($quotation_list['Customer']['id']); ?>
                                                        <?php echo $this->Html->link('Update', array('controller'=>'Clientpos','action' => $invoice_type, $quotation_list['Customer']['id']), array('data-toggle' => 'tooltip', 'title' => 'Update', 'class' => 'btn btn-alt btn-xs btn-danger', 'escape' => false)); ?>
                                                    </div>
                                                </td>
                                            <?PHP }elseif($quotation_list['Quotation']['po_generate_type']=='Manual'){ ?>
                                                    <div class="btn-group">
                                                         <?php echo $this->Form->button('Finished', array('type'=>'button','data-toggle' => 'tooltip', 'class' => 'btn btn-alt btn-xs btn-success', 'escape' => false,)); ?>
                                                    </div>
                                                <?PHP } ?>
                                    </tr>
                                    <?php endforeach; ?>
                                    <?PHP endif; ?>
                                </tbody>
                            </table>
</div>

                    
