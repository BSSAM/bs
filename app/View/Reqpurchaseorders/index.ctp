<script>var path_url='<?PHP echo Router::url('/',true); ?>';</script>
<script type="text/javascript">
    $(function(){
        $("#quoat_list").hide();
        $("#ReqpurchaseorderPrequistionId").keyup(function() 
        { 
            var preq_id = $(this).val();
            var dataString = 'id='+ preq_id;
            if(preq_id!='')
            {
                $.ajax({
                    type: "POST",
                    url: "<?PHP echo Router::url('/',true); ?>/Reqpurchaseorders/preq_search",
                    data: dataString,
                    cache: false,
                    success: function(html)
                    {
                        $("#quoat_list").html(html).show();
                    }
                });
            }return false;    
        });});
</script>                
<h1>
    <i class="gi gi-user"></i>PR_Purchase order
</h1>
                    </div>
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                        <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
                        <li><?php echo $this->Html->link('PR_Purchase order',array('controller'=>'Reqpurchaseorders','action'=>'index')); ?></li>
                    </ul>
                    <!-- END Datatables Header -->
                    <?PHP echo $this->element('message'); ?>
                    <!-- Datatables Content -->
                    <div class="block full">
                        <div class="block-title">
                            <h2>List Of PR_Purchase order </h2> 
                        </div>
                        <div class="block full row col-sm-12 padding_t_b10">
                        <div class="form-actions  col-sm-7 pull-right">
                            <div class="col-md-4 pull-left">
                                <?PHP echo $this->Form->create('Reqpurchaseorder', array('controller'=>'Reqpurchaseorders','action' => 'pr_purchaseorder', 'class' => 'form-horizontal form-bordered')); ?>
                            </div>
                            <div class="input-group col-md-8 pull-right quot_display">
                                <?PHP echo $this->Form->input('prequistion_id', array('placeholder' => 'Purchase Requistion No', 'class' => 'form-control',
                                    'div' => false, 'label' => false, 'type' => 'text', 'autoComplete' => 'off'))
                                ?>
                                <span class="input-group-btn">
                                    <button class="btn btn-primary quotation_search" type="submit">Proceed</button>
                                </span> 
                                <div id="quoat_list"> </div>
                            </div>
                      </div>
                            
		<?PHP $this->Form->end(); ?>
                            
                       </div>
                        <div class="table-responsive">
                            <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                <thead>
                                    <tr>
                                        <!--<th class="text-center"><i class="gi gi-user"></i></th>-->
                                        <th class="text-center">Purchase Requistion</th>
                                        <th class="text-center">Date</th>
                                        <th class="text-center">Branch</th>
                                        <th class="text-center">Customer</th>
                                        <th class="text-center">Phone</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Reference No</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?PHP if(!empty($req_purchase)): ?>
                                     <?php foreach($req_purchase as $req_purchaseorder): ?>
                                    <tr <?php if($req_purchaseorder['Reqpurchaseorder']['is_approved'] == 1):?> class="success" <?php else:?> class="error" <?php endif; ?>>
                                        <td class="text-center"><?PHP echo $req_purchaseorder['Reqpurchaseorder']['reqpurchaseno'] ?></td>
                                        <td class="text-center"><?PHP echo $req_purchaseorder['Reqpurchaseorder']['reg_date'] ?></td>
                                        <td class="text-center"><?PHP echo $req_purchaseorder['branch']['branchname'] ?></td>
                                        <td class="text-center"><?PHP echo $req_purchaseorder['Customer']['Customertagname'] ?></td>
                                        <td class="text-center"><?PHP echo $req_purchaseorder['Reqpurchaseorder']['phone'] ?></td>
                                        <td class="text-center"><?PHP echo $req_purchaseorder['Reqpurchaseorder']['email'] ?></td>
                                        <td class="text-center"><?PHP echo $req_purchaseorder['Reqpurchaseorder']['ref_no'] ?></td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <?php echo $this->Html->link('<i class="fa fa-pencil"></i>',array('action'=>'edit',$req_purchaseorder['Reqpurchaseorder']['id']),array('data-toggle'=>'tooltip','title'=>'Edit','class'=>'btn btn-xs btn-default','escape'=>false)); ?>
                                                <?php echo $this->Html->link('<i class="fa fa-times"></i>',array('controller'=>'Salesorders','action'=>'delete',$req_purchaseorder['Reqpurchaseorder']['id']),array('data-toggle'=>'tooltip','title'=>'Delete','class'=>'btn btn-xs btn-danger','escape'=>false,'confirm'=>'Are you Sure?')); ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <?PHP endif; ?>
                                </tbody>
                            </table>
                            <?php echo $this->Html->script('pages/uiProgress'); ?>
                            <script>$(function(){ UiProgress.init(); });</script>
                            