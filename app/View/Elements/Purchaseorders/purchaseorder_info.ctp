<script>
    var path_url='<?PHP echo Router::url('/',true); ?>';
</script>
    <style>
    .customer_show
    {
        padding:10px; 
        border-bottom:1px #999 dashed;
        font-size:15px; 
        height:50px;
        float: top;
    }
    .no_show
    {
        padding:10px; 
        border-bottom:1px #999 dashed;
        font-size:15px; 
        height:50px;
        float: top;
    }
    .no_show:hover
    {
        background:#4c66a4;
        color:#FFF;
        cursor:pointer;
    }
    .customer_show:hover
    {
        background:#4c66a4;
        color:#FFF;
        cursor:pointer;
    }
    #result{
        position: absolute;

        background: none repeat scroll 0 0 #F4F4F4;
        width: 268px;
        margin-left: 191px;
        margin-top: 37px;

        width: 326px;
        z-index: 999;
    }
</style>

<script type="text/javascript">
$(function(){
$("#pur_customer").keyup(function() 
{ 
//alert();    
var customer = $(this).val();
var dataString = 'name='+ customer;
if(customer!='')
{
        $.ajax({
        type: "POST",
        url: "<?PHP echo Router::url('/', true); ?>/Purchaseorders/customer_search",
        data: dataString,
        cache: false,
        success: function(html)
        {
            
            $("#result").html(html).show();
        }
        });
}return false;    
});
$("#val_reg_date").datepicker("setDate", new Date());
});


</script>
<div class="form-group">
    <label class="col-md-2 control-label" for="pur_customer">Customer Name</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('customer_name', array('id'=>'pur_customer','class'=>'form-control','label'=>false,'name'=>'customer_name','autoComplete'=>'off')); ?>
    </div>
    <div id="result"></div>
        <label class="col-md-2 control-label" for="pur_customer_address">Customer Address</label>
    <div class="col-md-4">
        <?php echo $this->Form->textarea('Purchaseorder.customer_address', array('id'=>'pur_customer_address','class'=>'form-control',
                                               'label'=>false,'rows'=>6,'cols'=>30)); ?>
    </div>
</div>
<div class="form-group">
    <label class="col-md-2 control-label" for="pur_attn">ATTN</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('Purchaseorder.attn', array('id'=>'pur_attn','class'=>'form-control select-chosen','label'=>false,'type'=>'select')); ?>
    </div>
    <label class="col-md-2 control-label" for="pur_phone">Phone</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('Purchaseorder.phone', array('id'=>'pur_phone','class'=>'form-control',
                                                'label'=>false)); ?>
    </div>
</div>
<div class="form-group">
    <label class="col-md-2 control-label" for="pur_fax">Fax</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('Purchaseorder.fax', array('id'=>'pur_fax','class'=>'form-control','label'=>false)); ?>
    </div>
    <label class="col-md-2 control-label" for="pur_email">Email</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('Purchaseorder.email', array('id'=>'pur_email','class'=>'form-control',
                                                'label'=>false)); ?>
    </div>
   
</div>
<div class="form-group">
     <label class="col-md-2 control-label" for="pur_payment">Payment Terms</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('Purchaseorder.payment_terms', 
                array('id'=>'pur_payment','class'=>'form-control','label'=>false,'type'=>'text')); ?>
    </div>
    
    
    
</div>
<div class="form-group">
    <label class="col-md-2 control-label" for="pur_order_no">Purchase Order No</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('Purchaseorder.purchaseorder_no', array('id'=>'pur_order_no','class'=>'form-control','label'=>false,'readonly'=>'readonly','value'=>$purchaseorderno)); ?>
    </div>
    <label class="col-md-2 control-label" for="pur_order_date">Purchase Order Date</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('Purchaseorder.purchase_order_date', array('id'=>'pur_order_date','class'=>'form-control input-datepicker-close','data-date-format'=>'yyyy-mm-dd','label'=>false,'value'=>date('d-M-y'))); ?>
    </div>
</div>
<div class="form-group">
    <label class="col-md-2 control-label" for="val_ref_no">Your Reference No</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('Purchaseorder.your_ref_no', array('id'=>'val_ref_no','class'=>'form-control','label'=>false)); ?>
    </div>
    <label class="col-md-2 control-label" for="val_our_ref_no">Our Reference Number</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('Purchaseorder.our_ref_no', array('id'=>'val_our_ref_no','class'=>'form-control','label'=>false)); ?>
    </div>
    
</div>


