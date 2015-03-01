<style>
    #result{
        margin-top: 35px;
    }
</style>
<script>
    var path_url='<?PHP echo Router::url('/',true); ?>';
</script>
<script>
var _ROOT ='<?PHP echo Router::url('/',true); ?>';
$(function() {
$('#status_call').change(function() {   // replace the ID_OF_YOUR_SELECT_BOX with the id to your select box given by Cake
       var val = $(this).val();  // val is the id
       window.location = _ROOT + 'Salesorders/index/' + val;
    });    
});
</script>
<script type="text/javascript">
    $(function(){
        $("#quoat_list").hide();
        $("#SalesorderQuotationId").keyup(function() 
        { 
            var device_status   =    $('input:radio[name=quotation_device_status]:checked').val();
            var quotation_id = $(this).val();
            var customer_id = $('#val_customer').val();
            var customer_single_id =   $('#customer_id').val();
            var dataString = 'id='+ quotation_id+'&device_status='+device_status+'&single_cus_id='+customer_single_id;
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
                            <h2>List Of Sales Order <?php if($deleted_val == '2'): echo "- Pending Approval"; elseif($deleted_val == '3'): echo "- InActive"; elseif($deleted_val == '1'): echo "- Active"; endif;?></h2> 
                            <?php if($userrole_cus['add']==1){ ?>                            
                            <div style="float:right;">
                                <h2><?php echo $this->Html->link('Add Salesorders', array('controller' => 'Salesorders', 'action' => 'add'), array('class' => 'btn btn-xs btn-primary', 'data-toggle' => 'tooltip', 'tile' => 'Add Sales Order')); ?></h2>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="block full row col-sm-12 padding_t_b10">
<!--                             <label class="col-md-2 control-label">Existing Quotation</label>-->
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
                           <?php echo $this->Form->input('customername', 
                            array('id'=>'val_customer_sales','class'=>'form-control','placeholder'=>'Enter the Customer Name','label'=>false,
                            'autoComplete'=>'off','type'=>'text','name'=>'customername')); ?>
                            <?PHP echo $this->Form->input('customer_id',array('type'=>'hidden','id'=>'customer_id')); ?>
                            <div id="result" class="instrument_drop" style="width:100%;"></div>
                                 </div>
                            <div class="input-group col-md-8 pull-right quot_display">
                           
                                
                                <?PHP echo $this->Form->input('quotation_id', array('placeholder' => 'Existing Quotation No to be entered here', 'class' => 'form-control',
                                    'div' => false, 'label' => false, 'type' => 'text', 'autoComplete' => 'off'))
                                ?>
                                <?PHP echo $this->Form->input('salesorder_created', array('type' => 'hidden', 'value' => 1)); ?>
                                <span class="input-group-btn">
                                    <button class="btn btn-primary quotation_search" type="button">Proceed</button>
                                </span> 
                                <div id="quoat_list" class="instrument_drop">
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
                                        <th class="text-center">In Date</th>
                                        <th class="text-center">Due Date</th>
                                        <th class="text-center">Branch</th>
                                        <th class="text-center">Customer</th>
                                        <th class="text-center">ATTN</th>
                                        <th class="text-center">Phone</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Our Ref No</th>
                                        <th class="text-center">Reference No</th>
                                        <th class="text-center">Salesperson</th>
                                        <?php if($deleted_val != 3): ?><th class="text-center">Action</th><?php endif; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?PHP if(!empty($salesorder )): ?>
                                     <?php foreach($salesorder as $salesorder_list): ?>
                                    <tr <?php if($salesorder_list['Salesorder']['is_approved'] == 1):?> class="" <?php else:?> class="themed-color-fire" <?php endif; ?>>
                                        <td class="text-center"><?PHP echo $salesorder_list['Salesorder']['salesorderno'] ?></td>
                                        <td class="text-center"><?PHP echo $salesorder_list['Salesorder']['in_date'] ?></td>
                                        <td class="text-center"><?PHP echo $salesorder_list['Salesorder']['due_date'] ?></td>
                                        <td class="text-center"><?PHP echo $this->Quotation->branchname($salesorder_list['Salesorder']['branch_id']); ?></td>
                                        <td class="text-center"><?PHP echo $salesorder_list['Customer']['Customertagname'] ?></td>
                                        <td class="text-center"><?PHP echo $this->Quotation->contactname($salesorder_list['Salesorder']['attn']); ?></td>
                                        <td class="text-center"><?PHP echo $salesorder_list['Salesorder']['phone'] ?></td>
                                         <td class="text-center"><?PHP echo $salesorder_list['Salesorder']['email'] ?></td>
                                         <td class="text-center"><?PHP echo $salesorder_list['Salesorder']['quotationno'] ?></td>
                                        <td class="text-center"><?PHP echo $salesorder_list['Salesorder']['ref_no'] ?></td>
                                        <td class="text-center"><?PHP echo $this->Quotation->salespersonname($salesorder_list['Salesorder']['quotation_id']); ?></td>
                                        <?php if($deleted_val != 3): ?>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <?php if($userrole_cus['edit']==1){ ?>
                                                <?php echo $this->Html->link('<i class="fa fa-pencil"></i>',array('action'=>'edit',$salesorder_list['Salesorder']['id']),array('data-toggle'=>'tooltip','title'=>'Edit','class'=>'btn btn-xs btn-default','escape'=>false)); ?>
                                                <?php } ?>
                                            </div>
                                            <?php if($userrole_cus['delete']==1){ ?>
                                            <?php echo $this->Html->link('<i class="fa fa-times"></i>',array('controller'=>'Salesorders','action'=>'delete',$salesorder_list['Salesorder']['id']),array('data-toggle'=>'tooltip','title'=>'Delete','class'=>'btn btn-xs btn-danger','escape'=>false,'confirm'=>'Are you Sure?')); ?>
                                            <?php } ?>
                                            <?php if($userrole_cus['view']==1 && $salesorder_list['Salesorder']['is_approved'] == 1){ ?>
                                            <?php echo $this->Html->link('<i class="gi gi-print"></i>',array('action'=>'pdf',$salesorder_list['Salesorder']['id']),array('data-toggle'=>'tooltip','title'=>'Report','class'=>'btn btn-xs btn-default','escape'=>false)); ?>
                                            <?php } ?>
                                            <?php if($userrole_cus['view']==1 && $salesorder_list['Salesorder']['is_approved'] == 1){ ?>
                                            <?php echo $this->Html->link('<i class="fa fa-tags"></i>',array('action'=>'pdf_tag',$salesorder_list['Salesorder']['id']),array('data-toggle'=>'tooltip','title'=>'Tags','class'=>'btn btn-xs btn-default','escape'=>false)); ?>
                                            <?php } ?>
                                        </td>
                                        <?php endif; ?>
                                    </tr>
                                    <?php endforeach; ?>
                                    <?PHP endif; ?>
                                </tbody>
                                
                            </table>
                            <div class="btn-group btn-group-md">
                                                <?php echo $this->Form->input('status', array('id'=>'status_call','class'=>'form-control','label'=>false,'name'=>'status_call','type'=>'select','options'=>array('1'=>'Active','2'=>'Pending Approval','3'=>'InActive'),'empty'=>'Select Status')); ?>
                                            </div>
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