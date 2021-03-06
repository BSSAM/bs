<h1><i class="gi gi-user"></i>Customers</h1>
</div>
</div>
<ul class="breadcrumb breadcrumb-top">
    <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
    <li><?php echo $this->Html->link('Customers',array('controller'=>'Customers','action'=>'index')); ?></li>
</ul>
<!-- END Datatables Header -->
            <?PHP echo $this->element('message');?>            
<!-- Datatables Content -->
<div class="block full">
    <div class="block-title">
        <h2>List Of Customers</h2>
        <?php if($userrole_cus['add']==1){ ?>
        <h2 style="float:right;"><?php echo $this->Html->link('Add Customer',array('controller'=>'Customers','action'=>'add'),array('class'=>'btn btn-xs btn-primary','data-toggle'=>'tooltip','tile'=>'Add Customer')); ?></h2>
        <?php } ?>
    </div>
                            
                            
    <div class="table-responsive">
        <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
            <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Customer Name</th>
                    <th class="text-center">Phone</th>
                    <th class="text-center">Customer Type</th>
                    <th class="text-center">Industry</th>
                    <th class="text-center">Location</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                
                <?php foreach ($customer as $customer_list): ?>
                    <tr <?php if($customer_list['Customer']['is_approved'] == 1):?> class="success" <?php else:?> class="error" <?php endif; ?>>
                        <td class="text-center"><?php echo $customer_list['Customer']['id']; ?></td>
                        <td class="text-center"><a href="javascript:void(0)"><?php echo $customer_list['Customer']['Customertagname']; ?></a></td>
                        <td class="text-center"><?php echo $customer_list['Customer']['phone']; ?></td>
                        <td class="text-center"><?php echo $customer_list['Customer']['customertype']; ?></td>
                        <td class="text-center"><?php echo $customer_list['Industry']['industryname']; ?></td>
                        <td class="text-center"><?php echo $customer_list['Location']['locationname']; ?></td>
                        <td class="text-center">
                            
                                <?PHP
                                
                                
                                if($customer_list['Customer']['is_approved'] == 1):
                                if($userrole_cus['instrument']==1){
                                
                                echo $this->html->link('Instrument', array('controller' => 'Customers',
                                    'action' => 'instrument_map', $customer_list['Customer']['id']), array('title' => 'Map Instrument',
                                    'class' => 'btn  btn-xs btn-primary', 'data-toggle' => 'tooltip', 'escape' => false));
                                }
                                ?>
                                <?PHP $tag_count    = $this->Customer->checktag_list($customer_list['Customer']['customergroup_id']); ?>
                                <?PHP if($tag_count==1):
                                        $tag_name   = 'Add Tag';
                                        $controller='Customertaglists';$action='add' ;
                                        else:
                                        $tag_name   = 'Tag list';$controller='Customertaglists';
                                        $action='index';
                                        endif;
                                      
                                ?>
                                <?PHP
                                if($userrole_cus['tag']==1){
                                echo $this->html->link($tag_name, array('controller' => $controller,
                                    'action' => $action, $customer_list['Customer']['id']), array('title' => 'Tags',
                                    'class' => 'btn  btn-xs btn-warning', 'data-toggle' => 'tooltip', 'escape' => false));
                                }
                                endif; 
                                ?>
                            <div class="btn-group">
                                <?php if($userrole_cus['edit']==1){ ?>
                                <?PHP
                                echo $this->html->link('<i class="fa fa-pencil"></i>', array('controller' => 'Customers',
                                    'action' => 'edit', $customer_list['Customer']['id']), array('title' => 'Edit',
                                    'class' => 'btn btn-xs btn-default', 'data-toggle' => 'tooltip', 'escape' => false));
                                ?>
                                <?php } ?>
                                <?php if($userrole_cus['delete']==1){ ?>
                                <?PHP
                                echo $this->Form->postlink('<i class="fa fa-times"></i>', array('controller' => 'Customers',
                                    'action' => 'delete', $customer_list['Customer']['id']), array('title' => 'Delete',
                                    'class' => 'btn btn-xs btn-danger', 'data-toggle' => 'tooltip', 'escape' => false, 'confirm' => 'Are you sure want to delete?'));
                                ?>
                                <?php } ?>
                             </div>
                    </td>
                </tr>
                                    <?php endforeach; ?>
                                        
            </tbody>
        </table>
        
        
      