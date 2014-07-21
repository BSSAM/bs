<h1 class="text-center">
    <i class="gi gi-user"></i><div class="label label-six text-center" style="line-height: 61px;"><?php echo $cust; ?></div>
</h1>
</div>
</div>
<ul class="breadcrumb breadcrumb-top">
    <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
    <li><?php echo $this->Html->link('Customers',array('controller'=>'Customers','action'=>'index')); ?></li>
    <li><?php echo $this->Html->link('Customers Tag list',array('controller'=>'Customerstaglists','action'=>'index')); ?></li>
</ul>
<!-- END Datatables Header -->
            <?PHP echo $this->element('message');?>            
<!-- Datatables Content -->
<div class="block full">
    <div class="block-title">
        <h2>List Of Customers Tags</h2>
        <h2 style="float:right;"><?php echo $this->Html->link('Add Customer Tag',array('controller'=>'Customertaglists','action'=>'add',$customer_id),array('class'=>'btn btn-xs btn-primary','data-toggle'=>'tooltip','title'=>'Add Customer tag')); ?></h2>
    </div>
                
    <div class="table-responsive">
        <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
            <thead>
                <tr>
                    <th class="text-center">Customer ID</th>
                    <th class="text-center">Customer Name</th>
                    <th class="text-center">Customer Type</th>
                    <th class="text-center">Industry</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?PHP if(!empty($taglists)): ?>
                <?php foreach ($taglists as $taglist): ?>
                    <tr>
                        <td class="text-center"><?php echo $taglist['Customer']['id']; ?></td>
                        <td class="text-center">
                            <a href="javascript:void(0)">
                                <?php echo $taglist['Customer']['Customertagname']; ?>
                                <?PHP $default =    ($taglist['Customer']['is_default']==1)?'<span class="label label-success">Default<span>':''; ?>
                               <?PHP  echo $default; ?>
                            </a></td>
                        <td class="text-center"><?php echo $taglist['Customer']['customertype']; ?></td>
                        <td class="text-center"><?php echo $taglist['Industry']['industryname']; ?></td>
                        <td class="text-center">
                            <?PHP
                                echo $this->html->link('Instrument', array('controller' => 'Customers',
                                    'action' => 'instrument_map', $taglist['Customer']['id']), array('title' => 'Map Instrument',
                                    'class' => 'btn  btn-xs btn-primary', 'data-toggle' => 'tooltip', 'escape' => false));
                                ?>
                            <div class="btn-group">
                                 
                                <?PHP
                                echo $this->html->link('<i class="fa fa-pencil"></i>', array('controller' => 'Customertaglists',
                                    'action' => 'edit', $taglist['Customer']['id']), array('title' => 'Edit Tag',
                                    'class' => 'btn btn-xs btn-default', 'data-toggle' => 'tooltip', 'escape' => false));
                                ?>
                                <?PHP if($taglist['Customer']['is_default']==0): ?>
                                <?PHP
                                echo $this->Form->postlink('<i class="fa fa-times"></i>', array('controller' => 'Customertaglists',
                                    'action' => 'delete', $taglist['Customer']['id']), array('title' => 'Delete Tag',
                                    'class' => 'btn btn-xs btn-danger', 'data-toggle' => 'tooltip', 'escape' => false, 'confirm' => 'Are you sure want to delete?'));
                                ?>
                                <?PHP endif; ?>
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