<script>
    var path_url='<?PHP echo Router::url('/',true); ?>';
</script>
<script type="text/javascript">
    $(function(){
        $("#SalesorderQuotationId").keyup(function() 
        { 
            //alert();    
            var quotation_id = $(this).val();
            var dataString = 'id='+ quotation_id;
            if(quotation_id!='')
            {
                $.ajax({
                    type: "POST",
                    url: "<?PHP echo Router::url('/',true); ?>/Salesorders/quotation_search",
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
                                <i class="gi gi-user"></i>Sales Order
                            </h1>
                        </div>
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                        <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
                        <li><?php echo $this->Html->link('Salesorders',array('controller'=>'Salesorders','action'=>'index')); ?></li>
                    </ul>
                    <!-- END Datatables Header -->
                    <?PHP echo $this->element('message'); ?>
                    <!-- Datatables Content -->
                    <div class="block full">
                        <div class="block-title">
                            <h2>List Of Sales Order </h2> 
                                <?PHP echo $this->Form->create('Salesorder',array('action'=>'add','class'=>'form-horizontal form-bordered')); ?>
                                    
                                <div class="col-md-3 search_move">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <button class="btn btn-primary quotation_search" type="button">Proceed</button>
                                        </span>
                                        <?PHP echo $this->Form->input('quotation_id', array('placeholder' => 'Quotation Id', 'class' => 'form-control',
                                            'div' => false, 'label' => false, 'type' => 'text', 'autoComplete' => 'off'))
                                        ?>
                                        <?PHP echo $this->Form->input('salesorder_created',array('type'=>'hidden','value'=>1)); ?>
                                    </div>
                                    <div id="quoat_list">
                                    </div>
                                </div>
                                <h2>
                                    <?php echo $this->Html->link('Add Salesorders', array('controller' => 'Salesorders', 'action' => 'add'), array('class' => 'btn btn-xs btn-primary', 'data-toggle' => 'tooltip', 'tile' => 'Add Sales Order')); ?></h2>
                            <?PHP $this->Form->end(); ?>
                        </div>
                        <div class="table-responsive">
                            <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                <thead>
                                    <tr>
                                        <!--<th class="text-center"><i class="gi gi-user"></i></th>-->
                                        <th class="text-center">Sales Orders No</th>
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
                                    <?PHP if(!empty($salesorder )): ?>
                                     <?php foreach($salesorder as $salesorder_list): ?>
                                    <tr>
                                        <td class="text-center"><?PHP echo $salesorder_list['Salesorder']['salesorderno'] ?></td>
                                        <td class="text-center"><?PHP echo $salesorder_list['Salesorder']['reg_date'] ?></td>
                                        <td class="text-center"><?PHP echo $salesorder_list['Salesorder']['branchname'] ?></td>
                                        <td class="text-center"><?PHP echo $salesorder_list['Salesorder']['customername'] ?></td>
                                        <td class="text-center"><?PHP echo $salesorder_list['Salesorder']['phone'] ?></td>
                                         <td class="text-center"><?PHP echo $salesorder_list['Salesorder']['email'] ?></td>
                                        <td class="text-center"><?PHP echo $salesorder_list['Salesorder']['ref_no'] ?></td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <?php echo $this->Html->link('<i class="fa fa-pencil"></i>',array('action'=>'edit',$salesorder_list['Salesorder']['id']),array('data-toggle'=>'tooltip','title'=>'Edit','class'=>'btn btn-xs btn-default','escape'=>false)); ?>
                                                <?php echo $this->Form->postLink('<i class="fa fa-times"></i>',array('action'=>'delete',$salesorder_list['Salesorder']['id']),array('data-toggle'=>'tooltip','title'=>'Delete','class'=>'btn btn-xs btn-danger','escape'=>false,'confirm'=>'Are you Sure?')); ?>
                                                
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <?PHP endif; ?>
                                </tbody>
                            </table>
                            <?php echo $this->Html->script('pages/uiProgress'); ?>
                            <script>$(function(){ UiProgress.init(); });</script>
                            <?php if ($this->Session->flash() != '') { ?>
                                <script> var UiProgress = function() {
                                    // Get random number function from a given range
                                    var getRandomInt = function(min, max) {
                                        return Math.floor(Math.random() * (max - min + 1)) + min;
                                    };
                                }();
                                </script> 
                            <?php } ?>
