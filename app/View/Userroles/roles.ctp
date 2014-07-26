<script>
        $(document).ready(function(){
            $("input:checkbox").attr('checked','checked');
        });
</script>
<?php //pr($this->request->data);exit;?>
<h1>
    <i class="gi gi-notes_2"></i>User Role Permissions
</h1>
</div>
</div>
<ul class="breadcrumb breadcrumb-top">
    <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
    <li><?php echo $this->Html->link('User Role',array('controller'=>'Userroles','action'=>'index')); ?></li>
    <li><?php echo $user_name; ?></li>
</ul>
<!-- END Forms General Header -->

<div class="row">
    <div class="col-md-12">
        <!-- Basic Form Elements Block -->
        <div class="block block-extend">
            <!-- Basic Form Elements Title -->
            <div class="block-title">
                
                <h2></h2>
            </div>
                
            
                <div class="row row_extend">
                       
                    <?php echo $this->Form->create('Userrole',array('class'=>'','id'=>'form-userrole-roles')); ?>
                <div class="col-md-6">
                    <div class="panel panel-danger"> 
                        <div class="panel-heading bg-purple">
                            <h3 class="panel-title  text-white"><b>Users</b>
                                <span class="pull-right">
                                    <a href="#" class="panel-minimize"><i class="fa fa-chevron-down text-white"></i></a>
                                </span>
                            </h3>
                        </div>
                        <div class="panel-body panel-over" style="display: none;">
                            <div class="table-responsive">
                                <table class="table">
                                    
                                    <tbody>
                                        <tr>
                                            <td class="text-center" style="width: 150px;"><h5>Branch</h5></td>
                                            <?php $a = ($this->request->data['other_branch']['edit']==1)?'checked ="checked"':''; ?>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('other_branch.add',array('id'=>'add','checked'=>'unchecked')); ?><label for="add">Add</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('other_branch.edit',array('id'=>'edit','type'=>'checkbox','label'=>false,'checked'=>'unchecked'));?><label for="edit">Edit</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('other_branch.view',array('id'=>'view')); ?><label for="view">View</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('other_branch.delete',array('id'=>'delete')); ?><label for="delete">Delete</label> </div></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center" style="width: 150px;"><h5>Department</h5></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('other_department.add',array('id'=>'add')); ?><label for="remember">Add</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('other_department.edit',array('id'=>'edit')); ?><label for="remember">Edit</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('other_department.view',array('id'=>'view')); ?><label for="remember">View</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('other_department.delete',array('id'=>'delete')); ?><label for="remember">Delete</label> </div></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center" style="width: 150px;"><h5>Role</h5></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('other_role.add',array('id'=>'add')); ?><label for="remember">Add</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('other_role.edit',array('id'=>'edit')); ?><label for="remember">Edit</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('other_role.view',array('id'=>'view')); ?><label for="remember">View</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('other_role.delete',array('id'=>'delete')); ?><label for="remember">Delete</label> </div></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center" style="width: 150px;"><h5>User</h5></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('other_user.add',array('id'=>'add')); ?><label for="remember">Add</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('other_user.edit',array('id'=>'edit')); ?><label for="remember">Edit</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('other_user.view',array('id'=>'view')); ?><label for="remember">View</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('other_user.delete',array('id'=>'delete')); ?><label for="remember">Delete</label> </div></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center" style="width: 150px;"><h5>Currency</h5></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('other_currency.add',array('id'=>'add')); ?><label for="remember">Add</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('other_currency.edit',array('id'=>'edit')); ?><label for="remember">Edit</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('other_currency.view',array('id'=>'view')); ?><label for="remember">View</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('other_currency.delete',array('id'=>'delete')); ?><label for="remember">Delete</label> </div></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center" style="width: 150px;"><h5>Assigned To</h5></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('other_assignedto.add',array('id'=>'add')); ?><label for="remember">Add</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('other_assignedto.edit',array('id'=>'edit')); ?><label for="remember">Edit</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('other_assignedto.view',array('id'=>'view')); ?><label for="remember">View</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('other_assignedto.delete',array('id'=>'delete')); ?><label for="remember">Delete</label> </div></td>
                                                        
                                        </tr>
                                        <tr>
                                            <td class="text-center" style="width: 150px;"><h5>Service Type</h5></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('other_servicetype.add',array('id'=>'add')); ?><label for="remember">Add</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('other_servicetype.edit',array('id'=>'edit')); ?><label for="remember">Edit</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('other_servicetype.view',array('id'=>'view')); ?><label for="remember">View</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('other_servicetype.delete',array('id'=>'delete')); ?><label for="remember">Delete</label> </div></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center" style="width: 150px;"><h5>Additional Charges</h5></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('other_additional.add',array('id'=>'add')); ?><label for="remember">Add</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('other_additional.edit',array('id'=>'edit')); ?><label for="remember">Edit</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('other_additional.view',array('id'=>'view')); ?><label for="remember">View</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('other_additional.delete',array('id'=>'delete')); ?><label for="remember">Delete</label> </div></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center" style="width: 150px;"><h5>Tally Ledger Account</h5></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('other_tallyledger.add',array('id'=>'add')); ?><label for="remember">Add</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('other_tallyledger.edit',array('id'=>'edit')); ?><label for="remember">Edit</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('other_tallyledger.view',array('id'=>'view')); ?><label for="remember">View</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('other_tallyledger.delete',array('id'=>'delete')); ?><label for="remember">Delete</label> </div></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center" style="width: 150px;"><h5>Country</h5></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('other_country.add',array('id'=>'add')); ?><label for="remember">Add</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('other_country.edit',array('id'=>'edit')); ?><label for="remember">Edit</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('other_country.view',array('id'=>'view')); ?><label for="remember">View</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('other_country.delete',array('id'=>'delete')); ?><label for="remember">Delete</label> </div></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> <!-- / purple Panel -->
                    <div class="panel panel-danger"> 
                        <div class="panel-heading">
                            <h3 class="panel-title  text-white"><b>Customers</b>
                                <span class="pull-right">
                                    <a href="#" class="panel-minimize"><i class="fa fa-chevron-down text-white"></i></a>
                                </span>
                            </h3>
                        </div>
                        <div class="panel-body panel-over" style="display: none;">
                            <div class="table-responsive">
                                <table class="table">
                                    
                                    <tbody>
                                        <tr>
                                            <td class="text-center" style="width: 150px;"><h5 class="">Industry</h5></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('cus_industry.add',array('id'=>'add')); ?><label for="remember">Add</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('cus_industry.edit',array('id'=>'edit')); ?><label for="remember">Edit</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('cus_industry.view',array('id'=>'view')); ?><label for="remember">View</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('cus_industry.delete',array('id'=>'delete')); ?><label for="remember">Delete</label> </div></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center" style="width: 150px;"><h5>Location</h5></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('cus_location.add',array('id'=>'add')); ?><label for="remember">Add</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('cus_location.edit',array('id'=>'edit')); ?><label for="remember">Edit</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('cus_location.view',array('id'=>'view')); ?><label for="remember">View</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('cus_location.delete',array('id'=>'delete')); ?><label for="remember">Delete</label> </div></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center" style="width: 150px;"><h5>Customer</h5></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('cus_customer.add',array('id'=>'add')); ?><label for="remember">Add</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('cus_customer.edit',array('id'=>'edit')); ?><label for="remember">Edit</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('cus_customer.view',array('id'=>'view')); ?><label for="remember">View</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('cus_customer.delete',array('id'=>'delete')); ?><label for="remember">Delete</label> </div></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center" style="width: 150px;"><h5>Payment Terms</h5></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('cus_paymentterms.add',array('id'=>'add')); ?><label for="remember">Add</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('cus_paymentterms.edit',array('id'=>'edit')); ?><label for="remember">Edit</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('cus_paymentterms.view',array('id'=>'view')); ?><label for="remember">View</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('cus_paymentterms.delete',array('id'=>'delete')); ?><label for="remember">Delete</label> </div></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center" style="width: 150px;"><h5>Priority</h5></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('cus_priority.add',array('id'=>'add')); ?><label for="remember">Add</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('cus_priority.edit',array('id'=>'edit')); ?><label for="remember">Edit</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('cus_priority.view',array('id'=>'view')); ?><label for="remember">View</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('cus_priority.delete',array('id'=>'delete')); ?><label for="remember">Delete</label> </div></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center" style="width: 150px;"><h5>Referred By</h5></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('cus_referredby.add',array('id'=>'add')); ?><label for="remember">Add</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('cus_referredby.edit',array('id'=>'edit')); ?><label for="remember">Edit</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('cus_referredby.view',array('id'=>'view')); ?><label for="remember">View</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('cus_referredby.delete',array('id'=>'delete')); ?><label for="remember">Delete</label> </div></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center" style="width: 150px;"><h5>Sales Person</h5></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('cus_salesperson.add',array('id'=>'add')); ?><label for="remember">Add</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('cus_salesperson.edit',array('id'=>'edit')); ?><label for="remember">Edit</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('cus_salesperson.view',array('id'=>'view')); ?><label for="remember">View</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('cus_salesperson.delete',array('id'=>'delete')); ?><label for="remember">Delete</label> </div></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center" style="width: 150px;"><h5>Title</h5></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('cus_title.add',array('id'=>'add')); ?><label for="remember">Add</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('cus_title.edit',array('id'=>'edit')); ?><label for="remember">Edit</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('cus_title.view',array('id'=>'view')); ?><label for="remember">View</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('cus_title.delete',array('id'=>'delete')); ?><label for="remember">Delete</label> </div></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> <!-- / warning Panel -->
                </div> <!-- / col-md-6 -->
                
                <div class="col-md-6">
                    <div class="panel panel-danger"> 
                        <div class="panel-heading">
                            <h3 class="panel-title  text-white"><b>Instruments</b>
                                <span class="pull-right">
                                    <a href="#" class="panel-minimize"><i class="fa fa-chevron-down text-white"></i></a>
                                </span>
                            </h3>
                        </div>
                        <div class="panel-body panel-over" style="display: none;">
                            <div class="table-responsive">
                                <table class="table">
                                    
                                    <tbody>
                                        <tr>
                                            <td class="text-center" style="width: 150px;"><h5 class="">Procedure No</h5></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('ins_procedureno.add',array('id'=>'add')); ?><label for="remember">Add</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('ins_procedureno.edit',array('id'=>'edit')); ?><label for="remember">Edit</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('ins_procedureno.view',array('id'=>'view')); ?><label for="remember">View</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('ins_procedureno.delete',array('id'=>'delete')); ?><label for="remember">Delete</label> </div></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center" style="width: 150px;"><h5>Brand</h5></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('ins_brand.add',array('id'=>'add')); ?><label for="remember">Add</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('ins_brand.edit',array('id'=>'edit')); ?><label for="remember">Edit</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('ins_brand.view',array('id'=>'view')); ?><label for="remember">View</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('ins_brand.delete',array('id'=>'delete')); ?><label for="remember">Delete</label> </div></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center" style="width: 150px;"><h5>Instrument</h5></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('ins_instrument.add',array('id'=>'add')); ?><label for="remember">Add</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('ins_instrument.edit',array('id'=>'edit')); ?><label for="remember">Edit</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('ins_instrument.view',array('id'=>'view')); ?><label for="remember">View</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('ins_instrument.delete',array('id'=>'delete')); ?><label for="remember">Delete</label> </div></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center" style="width: 150px;"><h5>Instrument for Group</h5></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('ins_instrumentforgroup.add',array('id'=>'add')); ?><label for="remember">Add</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('ins_instrumentforgroup.edit',array('id'=>'edit')); ?><label for="remember">Edit</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('ins_instrumentforgroup.view',array('id'=>'view')); ?><label for="remember">View</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('ins_instrumentforgroup.delete',array('id'=>'delete')); ?><label for="remember">Delete</label> </div></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center" style="width: 150px;"><h5>Range</h5></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('ins_range.add',array('id'=>'add')); ?><label for="remember">Add</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('ins_range.edit',array('id'=>'edit')); ?><label for="remember">Edit</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('ins_range.view',array('id'=>'view')); ?><label for="remember">View</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('ins_range.delete',array('id'=>'delete')); ?><label for="remember">Delete</label> </div></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center" style="width: 150px;"><h5>Title</h5></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('ins_title.add',array('id'=>'add')); ?><label for="remember">Add</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('ins_title.edit',array('id'=>'edit')); ?><label for="remember">Edit</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('ins_title.view',array('id'=>'view')); ?><label for="remember">View</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('ins_title.delete',array('id'=>'delete')); ?><label for="remember">Delete</label> </div></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center" style="width: 150px;"><h5>Unit</h5></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('ins_unit.add',array('id'=>'add')); ?><label for="remember">Add</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('ins_unit.edit',array('id'=>'edit')); ?><label for="remember">Edit</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('ins_unit.view',array('id'=>'view')); ?><label for="remember">View</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('ins_unit.delete',array('id'=>'delete')); ?><label for="remember">Delete</label> </div></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> <!-- / Info Panel -->
                    <!--                            <div class="panel panel-danger"> 
                                                    <div class="panel-heading bg-pink">
                                                        <h3 class="panel-title  text-white"><b>Settings</b>
                                                            <span class="pull-right">
                                                                <a href="#" class="panel-minimize"><i class="fa fa-chevron-down text-white"></i></a>
                                                            </span>
                                                        </h3>
                                                    </div>
                                                    <div class="panel-body panel-over" style="display: none;">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="text-center" style="width: 150px;"><h5 class="">C and D Settings</h5></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center" style="width: 150px;"><h5>Onsite Email Setting</h5></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center" style="width: 150px;"><h5>Recall Service Setting</h5></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                                                    </tr>
                                                    
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>  / pink Panel -->
                </div> <!-- / col-md-6 -->
                
                <!-- /row -->
                
                        
                <div class="col-md-6">
                    <!--                            <div class="panel panel-danger"> 
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title  text-white"><b>Dimensional</b>
                                                            <span class="pull-right">
                                                                <a href="#" class="panel-minimize"><i class="fa fa-chevron-down text-white"></i></a>
                                                            </span>
                                                        </h3>
                                                    </div>
                                                    <div class="panel-body panel-over" style="display: none;">
                                                         <div class="table-responsive">
                                                            <table class="table">
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="text-center" style="width: 150px;"><h5 class="">Instrument</h5></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>  / Primary Panel -->
                    <!--                            <div class="panel panel-danger"> 
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title  text-white"><b>Temperature</b>
                                                            <span class="pull-right">
                                                                <a href="#" class="panel-minimize"><i class="fa fa-chevron-down text-white"></i></a>
                                                            </span>
                                                        </h3>
                                                    </div>
                                                    <div class="panel-body panel-over" style="display: none;">
                                                         <div class="table-responsive">
                                                            <table class="table">
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="text-center" style="width: 150px;"><h5 class="">Instrument</h5></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center" style="width: 150px;"><h5 class="">Ambient Temperature</h5></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center" style="width: 150px;"><h5 class="">Other</h5></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center" style="width: 150px;"><h5 class="">Range</h5></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center" style="width: 150px;"><h5 class="">Relative Humidity</h5></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center" style="width: 150px;"><h5 class="">Uncertainity Data</h5></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center" style="width: 150px;"><h5 class="">Reading Type</h5></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center" style="width: 150px;"><h5 class="">Channel</h5></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center" style="width: 150px;"><h5 class="">Form Datas</h5></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center" style="width: 150px;"><h5 class="">Template</h5></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center" style="width: 150px;"><h5 class="">Instrument Validity</h5></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center" style="width: 150px;"><h5 class="">Unit Conversion Factor</h5></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center" style="width: 150px;"><h5 class="">Unit</h5></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>  / Danger Panel -->
                </div> <!-- / col-md-6 -->
                
                <div class="col-md-6">
                    <!--                            <div class="panel panel-danger"> 
                                                    <div class="panel-heading text-white">
                                                        <h3 class="panel-title  text-white"><b>Pressure</b>
                                                            <span class="pull-right">
                                                                <a href="#" class="panel-minimize"><i class="fa fa-chevron-down text-white"></i></a>
                                                            </span>
                                                        </h3>
                                                    </div>
                                                    <div class="panel-body panel-over" style="display: none;">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="text-center" style="width: 150px;"><h5 class="">Instrument</h5></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center" style="width: 150px;"><h5 class="">Ambient Temperature</h5></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center" style="width: 150px;"><h5 class="">Other</h5></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center" style="width: 150px;"><h5 class="">Range</h5></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center" style="width: 150px;"><h5 class="">Relative Humidity</h5></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center" style="width: 150px;"><h5 class="">Statement Name</h5></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center" style="width: 150px;"><h5 class="">Statement 1</h5></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center" style="width: 150px;"><h5 class="">Statement 2</h5></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center" style="width: 150px;"><h5 class="">Vaccum Sensor</h5></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center" style="width: 150px;"><h5 class="">Uncertainity Data</h5></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center" style="width: 150px;"><h5 class="">Form Datas</h5></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>  / success Panel -->
                                
                    <!--                            <div class="panel panel-danger"> 
                                                    <div class="panel-heading text-white">
                                                        <h3 class="panel-title  text-white"><b>Electrical</b>
                                                            <span class="pull-right">
                                                                <a href="#" class="panel-minimize"><i class="fa fa-chevron-down text-white"></i></a>
                                                            </span>
                                                        </h3>
                                                    </div>
                                                    <div class="panel-body panel-over" style="display: none;">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="text-center" style="width: 150px;"><h5 class="">Instrument</h5></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center" style="width: 150px;"><h5 class="">Ambient Temperature</h5></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center" style="width: 150px;"><h5 class="">Location</h5></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center" style="width: 150px;"><h5 class="">Other</h5></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center" style="width: 150px;"><h5 class="">Range</h5></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center" style="width: 150px;"><h5 class="">Relative Humidity</h5></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center" style="width: 150px;"><h5 class="">Signal</h5></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center" style="width: 150px;"><h5 class="">Unit</h5></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center" style="width: 150px;"><h5 class="">Reference</h5></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center" style="width: 150px;"><h5 class="">DC Voltage</h5></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center" style="width: 150px;"><h5 class="">AC Current BS1308</h5></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center" style="width: 150px;"><h5 class="">AC Voltage BS1308</h5></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center" style="width: 150px;"><h5 class="">Capacitance</h5></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center" style="width: 150px;"><h5 class="">DC Current BS1308</h5></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center" style="width: 150px;"><h5 class="">Frequency BS2041</h5></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center" style="width: 150px;"><h5 class="">Inductance</h5></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center" style="width: 150px;"><h5 class="">Resistance BS1304</h5></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center" style="width: 150px;"><h5 class="">Resistance BS2041</h5></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center" style="width: 150px;"><h5 class="">Form Datas</h5></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div> -->
                </div>
                <div class="col-md-6">
                    <div class="panel panel-danger"> 
                        <div class="panel-heading bg-seagreen">
                            <h3 class="panel-title  text-white"><b>Job</b>
                                <span class="pull-right">
                                    <a href="#" class="panel-minimize"><i class="fa fa-chevron-down text-white"></i></a>
                                </span>
                            </h3>
                        </div>
                        <div class="panel-body panel-over" style="display: none;">
                            <div class="table-responsive">
                                    <table class="table">
                                        
                                    <tbody>
                                        <tr>
                                            <td class="text-center" style="width: 150px;"><h5 class="">Quotation</h5></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('job_quotation.add',array('id'=>'add')); ?><label for="remember">Add</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('job_quotation.edit',array('id'=>'edit')); ?><label for="remember">Edit</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('job_quotation.view',array('id'=>'view')); ?><label for="remember">View</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('job_quotation.delete',array('id'=>'delete')); ?><label for="remember">Delete</label> </div></td>
                                        </tr>
                                             
                                        <tr>
                                            <td class="text-center" style="width: 150px;"><h5 class="">Sales Order</h5></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('job_salesorder.add',array('id'=>'add')); ?><label for="remember">Add</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('job_salesorder.edit',array('id'=>'edit')); ?><label for="remember">Edit</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('job_salesorder.view',array('id'=>'view')); ?><label for="remember">View</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('job_salesorder.delete',array('id'=>'delete')); ?><label for="remember">Delete</label> </div></td>
                                        </tr>
                                        <tr>
                                            
                                            <td class="text-center" style="width: 150px;"><h5 class="">Delivery Order</h5></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('job_deliveryorder.add',array('id'=>'add')); ?><label for="remember">Add</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('job_deliveryorder.edit',array('id'=>'edit')); ?><label for="remember">Edit</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('job_deliveryorder.view',array('id'=>'view')); ?><label for="remember">View</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('job_deliveryorder.delete',array('id'=>'delete')); ?><label for="remember">Delete</label> </div></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center" style="width: 150px;"><h5 class="">Job Transaction</h5></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('job_transaction.add',array('id'=>'add')); ?><label for="remember">Add</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('job_transaction.edit',array('id'=>'edit')); ?><label for="remember">Edit</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('job_transaction.view',array('id'=>'view')); ?><label for="remember">View</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('job_transaction.delete',array('id'=>'delete')); ?><label for="remember">Delete</label> </div></td>
                                                
                                        </tr>
                                        <tr>
                                            <td class="text-center" style="width: 150px;"><h5 class="">Lab Process</h5></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('job_labprocess.add',array('id'=>'add')); ?><label for="remember">Add</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('job_labprocess.edit',array('id'=>'edit')); ?><label for="remember">Edit</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('job_labprocess.view',array('id'=>'view')); ?><label for="remember">View</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('job_labprocess.delete',array('id'=>'delete')); ?><label for="remember">Delete</label> </div></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center" style="width: 150px;"><h5 class="">Purchase Order</h5></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('job_purchaseorder.add',array('id'=>'add')); ?><label for="remember">Add</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('job_purchaseorder.edit',array('id'=>'edit')); ?><label for="remember">Edit</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('job_purchaseorder.view',array('id'=>'view')); ?><label for="remember">View</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('job_purchaseorder.delete',array('id'=>'delete')); ?><label for="remember">Delete</label> </div></td>
                                        </tr>
                                            <tr>
                                        
                                            <td class="text-center" style="width: 150px;"><h5 class="">Proforma Invoice</h5></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('job_proforma.add',array('id'=>'add')); ?><label for="remember">Add</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('job_proforma.edit',array('id'=>'edit')); ?><label for="remember">Edit</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('job_proforma.view',array('id'=>'view')); ?><label for="remember">View</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('job_proforma.delete',array('id'=>'delete')); ?><label for="remember">Delete</label> </div></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center" style="width: 150px;"><h5 class="">Sub Contract DO</h5></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('job_subcontract.add',array('id'=>'add')); ?><label for="remember">Add</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('job_subcontract.edit',array('id'=>'edit')); ?><label for="remember">Edit</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('job_subcontract.view',array('id'=>'view')); ?><label for="remember">View</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('job_subcontract.delete',array('id'=>'delete')); ?><label for="remember">Delete</label> </div></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center" style="width: 150px;"><h5 class="">C and D info</h5></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('job_candd.add',array('id'=>'add')); ?><label for="remember">Add</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('job_candd.edit',array('id'=>'edit')); ?><label for="remember">Edit</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('job_candd.view',array('id'=>'view')); ?><label for="remember">View</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('job_candd.delete',array('id'=>'delete')); ?><label for="remember">Delete</label> </div></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center" style="width: 150px;"><h5 class="">Invoice</h5></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('job_invoice.add',array('id'=>'add')); ?><label for="remember">Add</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('job_invoice.edit',array('id'=>'edit')); ?><label for="remember">Edit</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('job_invoice.view',array('id'=>'view')); ?><label for="remember">View</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('job_invoice.delete',array('id'=>'delete')); ?><label for="remember">Delete</label> </div></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center" style="width: 150px;"><h5 class="">Tracking System</h5></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('job_tracking.add',array('id'=>'add')); ?><label for="remember">Add</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('job_tracking.edit',array('id'=>'edit')); ?><label for="remember">Edit</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('job_tracking.view',array('id'=>'view')); ?><label for="remember">View</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('job_tracking.delete',array('id'=>'delete')); ?><label for="remember">Delete</label> </div></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center" style="width: 150px;"><h5 class="">Debt Chase</h5></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('job_debt.add',array('id'=>'add')); ?><label for="remember">Add</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('job_debt.edit',array('id'=>'edit')); ?><label for="remember">Edit</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('job_debt.view',array('id'=>'view')); ?><label for="remember">View</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('job_debt.delete',array('id'=>'delete')); ?><label for="remember">Delete</label> </div></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center" style="width: 150px;"><h5 class="">Onsite Schedule</h5></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('job_onsite.add',array('id'=>'add')); ?><label for="remember">Add</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('job_onsite.edit',array('id'=>'edit')); ?><label for="remember">Edit</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('job_onsite.view',array('id'=>'view')); ?><label for="remember">View</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('job_onsite.delete',array('id'=>'delete')); ?><label for="remember">Delete</label> </div></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center" style="width: 150px;"><h5 class="">Recall Service</h5></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('job_recall.add',array('id'=>'add')); ?><label for="remember">Add</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('job_recall.edit',array('id'=>'edit')); ?><label for="remember">Edit</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('job_recall.view',array('id'=>'view')); ?><label for="remember">View</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('job_recall.delete',array('id'=>'delete')); ?><label for="remember">Delete</label> </div></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center" style="width: 150px;"><h5 class="">Job Monitoring</h5></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('job_jobmonitor.add',array('id'=>'add')); ?><label for="remember">Add</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('job_jobmonitor.edit',array('id'=>'edit')); ?><label for="remember">Edit</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('job_jobmonitor.view',array('id'=>'view')); ?><label for="remember">View</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('job_jobmonitor.delete',array('id'=>'delete')); ?><label for="remember">Delete</label> </div></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center" style="width: 150px;"><h5 class="">Purchase Requisition</h5></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('job_purchasereq.add',array('id'=>'add')); ?><label for="remember">Add</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('job_purchasereq.edit',array('id'=>'edit')); ?><label for="remember">Edit</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('job_purchasereq.view',array('id'=>'view')); ?><label for="remember">View</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('job_purchasereq.delete',array('id'=>'delete')); ?><label for="remember">Delete</label> </div></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center" style="width: 150px;"><h5 class="">PR_Purchase Order</h5></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('job_prpurchaseorder.add',array('id'=>'add')); ?><label for="remember">Add</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('job_prpurchaseorder.edit',array('id'=>'edit')); ?><label for="remember">Edit</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('job_prpurchaseorder.view',array('id'=>'view')); ?><label for="remember">View</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('job_prpurchaseorder.delete',array('id'=>'delete')); ?><label for="remember">Delete</label> </div></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center" style="width: 150px;"><h5 class="">Resistance BS2041</h5></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('job_resis.add',array('id'=>'add')); ?><label for="remember">Add</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('job_resis.edit',array('id'=>'edit')); ?><label for="remember">Edit</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('job_resis.view',array('id'=>'view')); ?><label for="remember">View</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('job_resis.delete',array('id'=>'delete')); ?><label for="remember">Delete</label> </div></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center" style="width: 150px;"><h5 class="">Form Datas</h5></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('job_formdatas.add',array('id'=>'add')); ?><label for="remember">Add</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('job_formdatas.edit',array('id'=>'edit')); ?><label for="remember">Edit</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('job_formdatas.view',array('id'=>'view')); ?><label for="remember">View</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('job_formdatas.delete',array('id'=>'delete')); ?><label for="remember">Delete</label> </div></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> <!-- / default Panel -->
                                
                                
                    <!--                            <div class="panel panel-danger"> 
                                                    <div class="panel-heading bg-seagreen">
                                                        <h3 class="panel-title  text-white"><b>Temperature</b>
                                                            <span class="pull-right">
                                                                <a href="#" class="panel-minimize"><i class="fa fa-chevron-down text-white"></i></a>
                                                            </span>
                                                        </h3>
                                                    </div>
                                                    <div class="panel-body panel-over" style="display: none;">
                                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                                                    </div>
                                                </div>-->
                                
                </div>
                    <div class="col-md-6">
                                
                                
                                
                    <!--                            <div class="panel panel-danger"> 
                                                    <div class="panel-heading bg-seagreen">
                                                        <h3 class="panel-title  text-white"><b>Reports</b>
                                                            <span class="pull-right">
                                                                <a href="#" class="panel-minimize"><i class="fa fa-chevron-down text-white"></i></a>
                                                            </span>
                                                        </h3>
                                                    </div>
                                                    <div class="panel-body panel-over" style="display: none;">
                                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                                                    </div>
                                                </div>-->
                    <!--                            <div class="panel panel-danger"> 
                                                    <div class="panel-heading bg-seagreen">
                                                        <h3 class="panel-title  text-white"><b>Data Logs</b>
                                                            <span class="pull-right">
                                                                <a href="#" class="panel-minimize"><i class="fa fa-chevron-down text-white"></i></a>
                                                            </span>
                                                        </h3>
                                                    </div>
                                                    <div class="panel-body panel-over" style="display: none;">
                                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                                                    </div>
                                                </div>-->
                </div>
                <div class="col-md-6">
                    <!--                            <div class="panel panel-danger"> 
                                                    <div class="panel-heading bg-seagreen">
                                                        <h3 class="panel-title  text-white"><b>Miscellaneous</b>
                                                            <span class="pull-right">
                                                                <a href="#" class="panel-minimize"><i class="fa fa-chevron-down text-white"></i></a>
                                                            </span>
                                                        </h3>
                                                    </div>
                                                    <div class="panel-body panel-over" style="display: none;">
                                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                                                    </div>
                                                </div>-->
                                
                    <!--                            <div class="panel panel-danger"> 
                                                    <div class="panel-heading bg-seagreen">
                                                        <h3 class="panel-title  text-white"><b>Temperature Dashboards</b>
                                                            <span class="pull-right">
                                                                <a href="#" class="panel-minimize"><i class="fa fa-chevron-down text-white"></i></a>
                                                            </span>
                                                        </h3>
                                                    </div>
                                                    <div class="panel-body panel-over" style="display: none;">
                                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                                                    </div>
                                    
                                    
                                            </div>-->
                </div>
                <div class="col-md-6">
                    <div class="panel panel-danger"> 
                        <div class="panel-heading bg-seagreen">
                            <h3 class="panel-title  text-white"><b>Dashboards</b>
                                <span class="pull-right">
                                    <a href="#" class="panel-minimize"><i class="fa fa-chevron-down text-white"></i></a>
                                </span>
                            </h3>
                        </div>
                        <div class="panel-body panel-over" style="display: none;">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                        </div>
                    </div>
                    <div class="panel panel-danger"> 
                        <div class="panel-heading bg-seagreen">
                            <h3 class="panel-title  text-white"><b>Approval Dashboards</b>
                                <span class="pull-right">
                                    <a href="#" class="panel-minimize"><i class="fa fa-chevron-down text-white"></i></a>
                                </span>
                            </h3>
                        </div>
                        <div class="panel-body panel-over" style="display: none;">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td class="text-center" style="width: 150px;"><h5 class="">Customer</h5></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('app_customer.add',array('id'=>'add')); ?><label for="remember">Add</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('app_customer.edit',array('id'=>'edit')); ?><label for="remember">Edit</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('app_customer.view',array('id'=>'view')); ?><label for="remember">View</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('app_customer.delete',array('id'=>'delete')); ?><label for="remember">Delete</label> </div></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center" style="width: 150px;"><h5 class="">Quotation</h5></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('app_quotation.add',array('id'=>'add')); ?><label for="remember">Add</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('app_quotation.edit',array('id'=>'edit')); ?><label for="remember">Edit</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('app_quotation.view',array('id'=>'view')); ?><label for="remember">View</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('app_quotation.delete',array('id'=>'delete')); ?><label for="remember">Delete</label> </div></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center" style="width: 150px;"><h5 class="">Sales Order</h5></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('app_salesorder.add',array('id'=>'add')); ?><label for="remember">Add</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('app_salesorder.edit',array('id'=>'edit')); ?><label for="remember">Edit</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('app_salesorder.view',array('id'=>'view')); ?><label for="remember">View</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('app_salesorder.delete',array('id'=>'delete')); ?><label for="remember">Delete</label> </div></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center" style="width: 150px;"><h5 class="">Delivery Order</h5></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('app_deliveryorder1.add',array('id'=>'add')); ?><label for="remember">Add</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('app_deliveryorder1.edit',array('id'=>'edit')); ?><label for="remember">Edit</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('app_deliveryorder1.view',array('id'=>'view')); ?><label for="remember">View</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('app_deliveryorder1.delete',array('id'=>'delete')); ?><label for="remember">Delete</label> </div></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center" style="width: 150px;"><h5 class="">Invoice</h5></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('app_invoice.add',array('id'=>'add')); ?><label for="remember">Add</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('app_invoice.edit',array('id'=>'edit')); ?><label for="remember">Edit</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('app_invoice.view',array('id'=>'view')); ?><label for="remember">View</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('app_invoice.delete',array('id'=>'delete')); ?><label for="remember">Delete</label> </div></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center" style="width: 150px;"><h5 class="">Procedure No</h5></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('app_procedureno.add',array('id'=>'add')); ?><label for="remember">Add</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('app_procedureno.edit',array('id'=>'edit')); ?><label for="remember">Edit</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('app_procedureno.view',array('id'=>'view')); ?><label for="remember">View</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('app_procedureno.delete',array('id'=>'delete')); ?><label for="remember">Delete</label> </div></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center" style="width: 150px;"><h5 class="">Brand</h5></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('app_brand.add',array('id'=>'add')); ?><label for="remember">Add</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('app_brand.edit',array('id'=>'edit')); ?><label for="remember">Edit</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('app_brand.view',array('id'=>'view')); ?><label for="remember">View</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('app_brand.delete',array('id'=>'delete')); ?><label for="remember">Delete</label> </div></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center" style="width: 150px;"><h5 class="">Instrument</h5></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('app_instrument.add',array('id'=>'add')); ?><label for="remember">Add</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('app_instrument.edit',array('id'=>'edit')); ?><label for="remember">Edit</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('app_instrument.view',array('id'=>'view')); ?><label for="remember">View</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('app_instrument.delete',array('id'=>'delete')); ?><label for="remember">Delete</label> </div></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center" style="width: 150px;"><h5 class="">Instrument for Group</h5></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('app_instrumentgroup.add',array('id'=>'add')); ?><label for="remember">Add</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('app_instrumentgroup.edit',array('id'=>'edit')); ?><label for="remember">Edit</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('app_instrumentgroup.view',array('id'=>'view')); ?><label for="remember">View</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('app_instrumentgroup.delete',array('id'=>'delete')); ?><label for="remember">Delete</label> </div></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center" style="width: 150px;"><h5 class="">Range</h5></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('app_range.add',array('id'=>'add')); ?><label for="remember">Add</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('app_range.edit',array('id'=>'edit')); ?><label for="remember">Edit</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('app_range.view',array('id'=>'view')); ?><label for="remember">View</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('app_range.delete',array('id'=>'delete')); ?><label for="remember">Delete</label> </div></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center" style="width: 150px;"><h5 class="">Unit</h5></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('app_unit.add',array('id'=>'add')); ?><label for="remember">Add</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('app_unit.edit',array('id'=>'edit')); ?><label for="remember">Edit</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('app_unit.view',array('id'=>'view')); ?><label for="remember">View</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('app_unit.delete',array('id'=>'delete')); ?><label for="remember">Delete</label> </div></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center" style="width: 150px;"><h5 class="">Ready to Prepare Invoice</h5></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('app_ready.add',array('id'=>'add')); ?><label for="remember">Add</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('app_ready.edit',array('id'=>'edit')); ?><label for="remember">Edit</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('app_ready.view',array('id'=>'view')); ?><label for="remember">View</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('app_ready.delete',array('id'=>'delete')); ?><label for="remember">Delete</label> </div></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center" style="width: 150px;"><h5 class="">PR_Supervisor Dashboard</h5></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('app_prsupervisor.add',array('id'=>'add')); ?><label for="remember">Add</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('app_prsupervisor.edit',array('id'=>'edit')); ?><label for="remember">Edit</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('app_prsupervisor.view',array('id'=>'view')); ?><label for="remember">View</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('app_prsupervisor.delete',array('id'=>'delete')); ?><label for="remember">Delete</label> </div></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center" style="width: 150px;"><h5 class="">PR_Manager</h5></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('app_prmanager.add',array('id'=>'add')); ?><label for="remember">Add</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('app_prmanager.edit',array('id'=>'edit')); ?><label for="remember">Edit</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('app_prmanager.view',array('id'=>'view')); ?><label for="remember">View</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('app_prmanager.delete',array('id'=>'delete')); ?><label for="remember">Delete</label> </div></td>
                                        </tr>
<!--                                        <tr>
                                            <td class="text-center" style="width: 150px;"><h5 class="">Unit</h5></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php// echo $this->Form->checkbox('job_formdatas.add',array('id'=>'add')); ?><label for="remember">Add</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php //echo $this->Form->checkbox('job_formdatas.edit',array('id'=>'edit')); ?><label for="remember">Edit</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php //echo $this->Form->checkbox('job_formdatas.view',array('id'=>'view')); ?><label for="remember">View</label> </div></td>
                                            <td class="text-center"><div class="checkbox pull-right"> <?php //echo $this->Form->checkbox('job_formdatas.delete',array('id'=>'delete')); ?><label for="remember">Delete</label> </div></td>
                                        </tr>-->
                                        
                                    </tbody>
                                </table> </div>
                        </div></div>
                </div>
      
                <div class="form-group form-actions">
                    <div class="col-md-2 col-md-offset-10">
                                            <?php  echo $this->Form->button('<i class="fa fa-angle-right"></i> Submit',array('type'=>'submit','class'=>'btn btn-sm btn-primary','escape' => false)); ?>
                                            <?php echo $this->Form->button('<i class="fa fa-repeat"></i> Reset', array('type'=>'reset','class'=>'btn btn-sm btn-warning','escape' => false)); ?>
<!--                                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Submit</button>
                        <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Reset</button>-->
                    </div>
                </div>
                <!-- / col-md-6 --><?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div> 
</div> <!-- /row -->
                
                