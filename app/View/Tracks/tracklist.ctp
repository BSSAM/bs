<script>
    var _ROOT ='<?PHP echo Router::url('/',true); ?>';
    $(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="col-md-12 list_quotation"><select name="query_input[]" class="form-control"><option value="Salesorder.id">Salesorder No</option><option value="Salesorder.due_date">Due Date</option><option value="Customer.customername">Customer Name</option><option value="Device.model_no">Model No</option><option value="Device.quantity">Quantity</option></select><select name="equal_input[]" class="form-control"><option value="=">Equal</option><option value="!=">Not Equal</option><option value="<=">Start With</option><option value=">=">End With</option><option value="LIKE">Contains</option></select><input type="text" name="val[]" class="form-control"/><button class="remove_field">-</button></div>'); 
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
</script>


<h1>
    <i class="gi gi-user"></i>Tracking System
</h1>
</div>
</div>
<ul class="breadcrumb breadcrumb-top">
    <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
    <li><?php echo $this->Html->link('Tracking System',array('controller'=>'Tracks','action'=>'index')); ?></li>
</ul>
<!-- END Datatables Header -->
            <?PHP echo $this->element('message');?>            
<!-- Datatables Content -->
<div class="block full">
    <div class="block-title">
        <h2>Tracking System</h2>
        <h2 style="float:right;"><?php echo $this->Html->link('Generate Report',array('controller' => 'Tracks','action' => 'reportfinal','full_base' => true),array('class'=>'btn btn-xs btn-primary','data-toggle'=>'tooltip','title'=>'Generate Report')); ?></h2>
    </div>
    
    <div class="input submit col-md-10">
        <div class="submit pull-right">
            <?php echo $this->Form->input('Full List', array('id'=>'fulllist','class'=>'','label'=>false,'name'=>'fulllist','type'=>'checkbox')); ?>
        </div>
    </div>
    <div class="input submit col-md-2">
        <div class="submit pull-right">
            
            <?php //echo $this->Form->input('Generate Report', array('id'=>'reportfinal','class'=>'btn btn-primary','label'=>false,'name'=>'reportfinal','type'=>'button')); ?>
        </div>
    </div>
    <?PHP echo $this->Form->create('Tracks', array('action' => 'tracklist', 'class' => 'form-horizontal form-bordered')); ?>

    <div class="col-md-12 custom_calculate">
    <?php echo $this->Form->input('gate', array('id'=>'gate','class'=>'form-control','label'=>false,'name'=>'gate','type'=>'select','options'=>array('AND'=>'AND','OR'=>'OR'))); ?>
   <button class="add_field_button pull-right">+</button></div>
    <div class="input_fields_wrap">

<!--                            <div><input type="text" name="mytext[]"></div>-->
    </div>
    <?php //echo $this->Form->input('equal_input', array('id'=>'equal_input','label'=>false,'name'=>'equal_input','type'=>'select','options'=>array('eq'=>'equal','ne'=>'not equal','bw'=>'begins with','ew'=>'ends with','cn'=>'contains'))); ?>
    <?php //echo $this->Form->input('val', array('id'=>'val','label'=>false,'name'=>'val','type'=>'text')); ?>
    <div class="input submit col-md-12 ">
        <div class="submit pull-right">
            <?php echo $this->Form->input('Proceed', array('id'=>'submit','class'=>'btn btn-primary','label'=>false,'name'=>'submit','type'=>'submit')); ?>
        </div>
    </div>
    <?PHP $this->Form->end(); ?>
                     
    <div class="table-responsive table-responsive-scroll">
        <table id="sofull-datatable" class="table table-vcenter table-condensed table-bordered">
            <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Salesorder No</th>
                    <th class="text-center">Due Date</th>
                    <th class="text-center">No of Delivery orders</th>
                    <th class="text-center">Deliveryorder No</th>
                    <th class="text-center">Deliveryorder Date</th>
                    <th class="text-center">Invoice No</th>
                    <th class="text-center">Invoice Date</th>
                    <th class="text-center">Quotation No</th>
                    <th class="text-center">Ref No</th>
                    <th class="text-center">Job Status</th>
                    <th class="text-center">Remarks</th>
                    <th class="text-center">Responsible Person</th>
                    <th class="text-center">Customer Name</th>
                    <th class="text-center">Salesperson Name</th>
                    <th class="text-center">Branch Name</th>
                </tr>
            </thead>
            <tbody>
                <?PHP 
                $excel = array();
                $excel[] = array();
                $excel[] = array('ID','Salesorder No','Due Date','No of Delivery orders','Deliveryorder No','Deliveryorder Date','Invoice No','Invoice Date','Quotation No','Ref No','Job Status','Remarks','Responsible Person','Customer Name','Salesperson Name','Branch Name');
                
                
                if(!empty($track_list)): ?>
                <?PHP foreach($track_list as $k=>$track): ?>
                <tr>
                    <td class="text-center"><?PHP echo $k+1; ?></td>
                    <td class="text-center"><?PHP echo $track['Salesorder']['id']; ?></td>
                    <td class="text-center"><?PHP echo $track['Salesorder']['due_date']; ?></td>
                    <td class="text-center"><?PHP echo $this->Salesorder->find_deliveryorder_nos($track['Salesorder']['id']); ?></td>
                    <td class="text-center"><?PHP echo $this->Salesorder->find_deliveryorder_no($track['Salesorder']['id']); ?></td>
                    <td class="text-center"><?PHP echo $this->Salesorder->find_deliveryorder_date($track['Salesorder']['id']); ?></td>
                    <td class="text-center"><?PHP echo $this->Salesorder->find_invoice_no($track['Salesorder']['id']); ?></td>
                    <td class="text-center"><?PHP echo $this->Salesorder->find_invoice_date($track['Salesorder']['id']); ?></td>
                    <td class="text-center"><?PHP echo $track['Salesorder']['quotationno']; ?></td>
                    <td class="text-center"><?PHP echo $track['Salesorder']['ref_no']; ?></td>
                    <td class="text-center"><?PHP if($track['Salesorder']['is_jobcompleted']==1){ echo "Complete"; }else{ echo "Incomplete"; }; ?></td>
                    <td class="text-center"><?PHP echo $track['Salesorder']['remarks']; ?></td>
                    <td class="text-center">-</td>
                    <td class="text-center"><?PHP echo $this->Salesorder->find_sales_order_customer($track['Salesorder']['id']); ?></td>
                    <td class="text-center"><?PHP echo $this->Salesorder->salesperson($track['Salesorder']['attn']); ?></td>
                    <td class="text-center"><?PHP echo $track['branch']['branchname']; ?></td>
                </tr>
                <?PHP 
                if($track['Salesorder']['is_jobcompleted']==1){ $a = "Complete"; }else{ $a = "Incomplete"; }
                $excel[] = array(($k+1),$track['Salesorder']['id'],$track['Salesorder']['due_date'],$this->Salesorder->find_deliveryorder_nos($track['Salesorder']['id']),
                    $this->Salesorder->find_deliveryorder_no($track['Salesorder']['id']),$this->Salesorder->find_deliveryorder_date($track['Salesorder']['id']),$this->Salesorder->find_invoice_no($track['Salesorder']['id']),
                    $this->Salesorder->find_invoice_date($track['Salesorder']['id']),$track['Salesorder']['quotationno'],$track['Salesorder']['ref_no'],$a,
                    $track['Salesorder']['remarks'],'-',$this->Salesorder->find_sales_order_customer($track['Salesorder']['id']),$this->Salesorder->salesperson($track['Salesorder']['attn']),$track['branch']['branchname']);
                

                endforeach; ?>
                <?PHP else: ?>
                <?PHP echo "No Records Found"; ?>
                <?PHP endif; ?>
                <?php 
                $foldername = APP."webroot/excel";
                $file = fopen($foldername.'/tracking.csv', 'w');
                foreach($excel as $row) {
                fputcsv($file, $row);
                } 
                ?>
            </tbody>
        </table>
    </div></div>
       
        
        