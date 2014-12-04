 <h1><script>
    var path='<?PHP echo Router::url('/',true); ?>';
</script> <i class="gi gi-user"></i>Random No</h1>
</div>
</div>
<ul class="breadcrumb breadcrumb-top">
    <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
    <li><?php echo $this->Html->link('Random No',array('controller'=>'Autos','action'=>'index')); ?></li>
</ul>
<!-- END Datatables Header -->
    <?php echo $this->element('message');?>
<!-- Datatables Content -->
<div class="block full">
    <div class="block-title">
<!--        <h2>Random</h2>-->
    </div>
    <?php echo $this->Form->create('Random',array('class'=>'form-horizontal form-bordered','id'=>'form-random-index')); ?>
        <div class="block ">
        <div class="form-group">
            <label class="col-md-2 control-label" for="customer">Customer</label>
            <div class="col-md-4">
                <?php echo $this->Form->input('customer', array('id'=>'customer','class'=>'form-control','label'=>false,)); ?>
            </div>
            <label class="col-md-2 control-label" for="tag">Tag</label>
            <div class="col-md-4">
                <?php echo $this->Form->input('tag', array('id'=>'tag','class'=>'form-control','label'=>false)); ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label" for="group">Group</label>
            <div class="col-md-4">
                <?php echo $this->Form->input('group', array('id'=>'group','class'=>'form-control','label'=>false,)); ?>
            </div>
            <label class="col-md-2 control-label" for="instrument">Instrument</label>
            <div class="col-md-4">
                <?php echo $this->Form->input('instrument', array('id'=>'instrument','class'=>'form-control','label'=>false)); ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label" for="quotation">Quotation</label>
            <div class="col-md-4">
                <?php echo $this->Form->input('quotation', array('id'=>'quotation','class'=>'form-control','label'=>false,)); ?>
            </div>
            <label class="col-md-2 control-label" for="salesorder">Salesorder</label>
            <div class="col-md-4">
                <?php echo $this->Form->input('salesorder', array('id'=>'salesorder','class'=>'form-control','label'=>false)); ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label" for="deliveryorder">Deliveryorder</label>
            <div class="col-md-4">
                <?php echo $this->Form->input('deliveryorder', array('id'=>'deliveryorder','class'=>'form-control','label'=>false,)); ?>
            </div>
            <label class="col-md-2 control-label" for="invoice">Invoice</label>
            <div class="col-md-4">
                <?php echo $this->Form->input('invoice', array('id'=>'invoice','class'=>'form-control','label'=>false)); ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label" for="clientpo">ClientPO</label>
            <div class="col-md-4">
                <?php echo $this->Form->input('clientpo', array('id'=>'clientpo','class'=>'form-control','label'=>false,)); ?>
            </div>
            <label class="col-md-2 control-label" for="proforma">Proforma</label>
            <div class="col-md-4">
                <?php echo $this->Form->input('proforma', array('id'=>'proforma','class'=>'form-control','label'=>false)); ?>
            </div>
        </div>
             <div class="form-group">
            <label class="col-md-2 control-label" for="track">Track</label>
            <div class="col-md-4">
                <?php echo $this->Form->input('track', array('id'=>'track','class'=>'form-control','label'=>false,)); ?>
            </div>
            <label class="col-md-2 control-label" for="PurchasRequisition">Purchase Requisition</label>
            <div class="col-md-4">
                <?php echo $this->Form->input('PurchasRequisition', array('id'=>'PurchasRequisition','class'=>'form-control','label'=>false)); ?>
            </div>
        </div>
             <div class="form-group">
            <label class="col-md-2 control-label" for="pr_purchaseorder">PR Purchase Order</label>
            <div class="col-md-4">
                <?php echo $this->Form->input('pr_purchaseorder', array('id'=>'pr_purchaseorder','class'=>'form-control','label'=>false,)); ?>
            </div>
            <label class="col-md-2 control-label" for="onsites">Onsite</label>
            <div class="col-md-4">
                <?php echo $this->Form->input('onsites', array('id'=>'onsites','class'=>'form-control','label'=>false)); ?>
            </div>
        </div>
        </div>
    
    <div class="form-group form-actions">
        <div class="col-md-9 col-md-offset-10">
            <?php //echo $this->Form->button('<i class="fa fa-angle-right"></i> Submit', array('type' => 'submit', 'class' => 'btn btn-sm btn-primary sales_submit', 'escape' => false)); ?>
        
        <?php //echo $this->Form->input('Random.id', array('name'=>'random_id','id'=>'random_id','type'=>'hidden','value'=>$ins_dat['Random']['id'])); ?>
       
       
        <?php  echo $this->Form->button('<i class="fa fa-angle-right"></i> Submit',array('type'=>'submit','class'=>'btn btn-sm btn-primary sales_submit','escape' => false)); ?>
        
       
           </div>                                     
    </div>
    <?php echo $this->Form->end(); ?>
</div>
                   
<!-- panel -->
<?php echo $this->Form->end(); ?>
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
