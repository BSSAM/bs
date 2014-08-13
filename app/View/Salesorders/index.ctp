<script>
    var path_url='<?PHP echo Router::url('/',true); ?>';
</script>
<script type="text/javascript">
    $(function(){
        $("#quoat_list").hide();
        $("#SalesorderQuotationId").keyup(function() 
        { 
            var device_status   =    $('input:radio[name=quotation_device_status]:checked').val();
            var quotation_id = $(this).val();
            var dataString = 'id='+ quotation_id+'&device_status='+device_status;
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
                            
                            
                            <div style="float:right;">
                                    <h2><?php echo $this->Html->link('Add Salesorders', array('controller' => 'Salesorders', 'action' => 'add'), array('class' => 'btn btn-xs btn-primary', 'data-toggle' => 'tooltip', 'tile' => 'Add Sales Order')); ?></h2>
                            </div>
                        </div>
                        <div class="block full row col-sm-12 padding_t_b10">
                        <div class="form-actions  col-sm-7 pull-right">
                            <div class="col-md-4 pull-left">
                            <?PHP echo $this->Form->create('Salesorder', array('action' => 'Salesorder_by_quotation', 'class' => 'form-horizontal form-bordered list_of_sales_o_form')); ?>
                            <?PHP   
                                $options = array('processing' => 'Processing', 'pending' => 'Pending');
                                $attributes = array('legend' => false, 'class' => 'device_status', 'value' => 'processing', 'name' => 'quotation_device_status');
                                echo $this->Form->radio('quotation_device_status', $options, $attributes);
                            ?>
                            </div>
                            <div class="input-group col-md-8 pull-right quot_display">
                                <?PHP echo $this->Form->input('quotation_id', array('placeholder' => 'Quotation Id', 'class' => 'form-control',
                                    'div' => false, 'label' => false, 'type' => 'text', 'autoComplete' => 'off'))
                                ?>
                                <?PHP echo $this->Form->input('salesorder_created', array('type' => 'hidden', 'value' => 1)); ?>
                                <span class="input-group-btn">
                                    <button class="btn btn-primary quotation_search" type="button">Proceed</button>
                                </span> 
                                <div id="quoat_list">
                            </div>
                            </div>
                      </div>
                            
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
                                        <td class="text-center"><?PHP echo $salesorder_list['branch']['branchname'] ?></td>
                                        <td class="text-center"><?PHP echo $salesorder_list['Customer']['Customertagname'] ?></td>
                                        <td class="text-center"><?PHP echo $salesorder_list['Salesorder']['phone'] ?></td>
                                         <td class="text-center"><?PHP echo $salesorder_list['Salesorder']['email'] ?></td>
                                        <td class="text-center"><?PHP echo $salesorder_list['Salesorder']['ref_no'] ?></td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <?php echo $this->Html->link('<i class="fa fa-pencil"></i>',array('action'=>'edit',$salesorder_list['Salesorder']['id']),array('data-toggle'=>'tooltip','title'=>'Edit','class'=>'btn btn-xs btn-default','escape'=>false)); ?>
                                                <?php echo $this->Html->link('<i class="fa fa-times"></i>',array('controller'=>'Salesorders','action'=>'delete',$salesorder_list['Salesorder']['id']),array('data-toggle'=>'tooltip','title'=>'Delete','class'=>'btn btn-xs btn-danger','escape'=>false,'confirm'=>'Are you Sure?')); ?>
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