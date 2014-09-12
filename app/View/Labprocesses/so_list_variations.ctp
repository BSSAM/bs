<script>
     $('#solistvariation-datatable').dataTable({
             // "aoColumnDefs": [ { "bSortable": false, "aTargets": [ 1, 5 ] } ],
                "iDisplayLength": 5,
                "aLengthMenu": [[5,10, 20, 30, -1], [5,10, 20, 30, "All"]]
            });
    </script>
<table id="solistvariation-datatable" class="table table-vcenter table-condensed table-bordered">
            <thead>
                <tr>
                    <!--<th class="text-center"><i class="gi gi-user"></i></th>-->
                    <th class="text-center">Sales Orders No</th>
                    <th class="text-center">Branch Name</th>
                    <th class="text-center">Customer Name</th>
                    <th class="text-center">Priority</th>
                    <th class="text-center">Total Qty</th>
                    <th class="text-center">Pending Qty</th>
                    <th class="text-center">Processing Qty</th>
                    <th class="text-center">Checking Qty</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?PHP //pr($labprocess);exit; ?>
                <?PHP if (!empty($labprocess)): ?>
                <?php foreach ($labprocess as $labprocess_list): ?>
                <?PHP if(!empty($labprocess_list['Description'])): ?>
                <tr>
                    
                    <td class="text-center"><?PHP echo $labprocess_list['Salesorder']['salesorderno'] ?></td>
                    <td class="text-center"><?PHP echo $labprocess_list['branch']['branchname'] ?></td>
                    <td class="text-center"><?PHP echo $labprocess_list['Customer']['Customertagname'] ?></td>
                    <td class="text-center"><?PHP echo $this->Labprocess->find_priority_type($labprocess_list['Customer']['priority_id']) ?></td>

                    <td class="text-center"><?PHP echo $this->Salesorder->call_query_total($labprocess_list['Salesorder']['salesorderno'],$call_location) ?></td>
                    <td class="text-center"><?PHP echo $this->Salesorder->call_query_pending($labprocess_list['Salesorder']['salesorderno'],$call_location) ?></td>
                    <td class="text-center"><?PHP echo $this->Salesorder->call_query_processing($labprocess_list['Salesorder']['salesorderno'],$call_location) ?></td>
                    <td class="text-center"><?PHP echo $this->Salesorder->call_query_checking($labprocess_list['Salesorder']['salesorderno'],$call_location) ?></td>
<!--                    <td class="text-center"><?PHP //echo count($labprocess_list['Description']); ?></td>
                    <td class="text-center"><?PHP //echo count($labprocess_list['Description']);?></td>
                    <td class="text-center"><?PHP //echo count($labprocess_list['Description']); ?></td>-->

<!--                    <td class="text-center"><?PHP //echo $this->Salesorder->query_total($labprocess_list['Salesorder']['salesorderno']) ?></td>-->
<!--                    <td class="text-center"><?PHP //echo $this->Salesorder->query_pending($labprocess_list['Salesorder']['salesorderno'],$call_location) ?></td>
                    <td class="text-center"><?PHP //echo $this->Salesorder->query_processing($labprocess_list['Salesorder']['salesorderno'],$call_location) ?></td>
                    <td class="text-center"><?PHP //echo $this->Salesorder->query_checking($labprocess_list['Salesorder']['salesorderno'],$call_location) ?></td>-->
<!--                    <td class="text-center"><?PHP //echo count($labprocess_list['Description']); ?></td>-->
<!--                    <td class="text-center"><?PHP //echo $this->Salesorder->query_processing($labprocess_list['Salesorder']['salesorderno'])//count($labprocess_list['Description']);?></td>-->
<!--                    <td class="text-center"><?PHP //echo $this->Salesorder->query_checking($labprocess_list['Salesorder']['salesorderno']); ?></td>-->

                   
                    <td class="text-center">
                        <div class="btn-group">
                            <?php echo $this->Html->link('<i class="fa fa-pencil"></i>', array('action' => 'labs',$solist,$call_location, $labprocess_list['Salesorder']['salesorderno']), array('data-toggle' => 'tooltip', 'title' => 'Edit', 'class' => 'btn btn-xs btn-default', 'escape' => false)); ?>
                        </div>
                    </td>
                </tr>
                <?php endif; ?>
                <?php endforeach; ?>
                <?PHP  endif; ?>
            </tbody>
        </table>