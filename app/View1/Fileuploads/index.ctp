<h1>
    <i class="gi gi-user"></i>Customers  List
</h1>
</div>
</div>
<ul class="breadcrumb breadcrumb-top">
    <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
    <li><?php echo $this->Html->link('Customers',array('controller'=>'Fileuploads','action'=>'index')); ?></li>
</ul>
<!-- END Datatables Header -->
            <?PHP echo $this->element('message');?>            
<!-- Datatables Content -->
<div class="block full">
    <div class="block-title">
        <h2>Customers List</h2>
    </div>
    <div class="table-responsive">
        <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
            <thead>
                <tr>
                    <th class="text-center">Customer ID</th>
                    <th class="text-center">Customer Name</th>
                    <th class="text-center">Customer Type</th>
                    <th class="text-center">Delivery order type</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?PHP if(!empty($file_upload_customerlist)): ?>
                    <?php foreach($file_upload_customerlist as $customer): ?>
                                    <tr>
                                        <td class="text-center"><?php echo $customer['Customer']['id'];?></td>
                                        <td class="text-center"><?php echo $customer['Customer']['Customertagname'];?></td>
                                        <td class="text-center">
                                            <span class="label label-success">
                                                <?php echo $customer['InvoiceType']['type_invoice'];?>
                                            </span>
                                        </td>
                                           <td class="text-center">
                                               
                                                    <?php echo $customer['Deliveryordertype']['delivery_order_type'];?>
                                               
                                           </td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <?php echo $this->Html->link('Quotation List',array('action'=>'Customer_quotation_list',$customer['Customer']['id']),array('data-toggle'=>'tooltip','title'=>'Upload files to '.$customer['Customer']['Customertagname'],'class' => 'btn  btn-xs btn-success','escape'=>false)); ?>
                                                <?php //echo $this->Form->postLink('<i class="fa fa-times"></i>',array('action'=>'delete',$clientpo_list['Clientpo']['quotation_id']),array('data-toggle'=>'tooltip','title'=>'Delete','class'=>'btn btn-xs btn-danger','escape'=>false,'confirm'=>'Are you Sure?')); ?>
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