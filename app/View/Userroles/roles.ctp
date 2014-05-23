<h1>
    <i class="gi gi-notes_2"></i>Add User Role
</h1>
</div>
</div>
<ul class="breadcrumb breadcrumb-top">
    <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
    <li><?php echo $this->Html->link('User Role',array('controller'=>'Userroles','action'=>'index')); ?></li>
    <li>Add Userroles</li>
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
                                    <h3 class="panel-title  text-white"><b>Others</b>
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
                                                    <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('other_branch.add',array('id'=>'add')); ?><label for="remember">Add</label> </div></td>
                                                    <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('other_branch.edit',array('id'=>'edit')); ?><label for="remember">Edit</label> </div></td>
                                                    <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('other_branch.view',array('id'=>'view')); ?><label for="remember">View</label> </div></td>
                                                    <td class="text-center"><div class="checkbox pull-right"> <?php echo $this->Form->checkbox('other_branch.delete',array('id'=>'delete')); ?><label for="remember">Delete</label> </div></td>
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
                                                    <td class="text-center"><div class="checkbox pull-right"> <input name="data[cus_industry][add]" type="hidden" id="add" value="0"><input name="data[cus_industry][add]" type="checkbox" id="add" value="1"><label for="remember">Add</label> </div></td>
                                                    <td class="text-center"><div class="checkbox pull-right"> <input name="data[cus_industry][edit]" type="hidden" id="edit" value="0"><input name="data[cus_industry][edit]" type="checkbox" id="edit" value="1"><label for="remember">Edit</label> </div></td>
                                                    <td class="text-center"><div class="checkbox pull-right"> <input name="data[cus_industry][view]" type="hidden" id="view" value="0"><input name="data[cus_industry][view]" type="checkbox" id="view" value="1"><label for="remember">View</label> </div></td>
                                                    <td class="text-center"><div class="checkbox pull-right"> <input name="data[cus_industry][delete]" type="hidden" id="delete" value="0"><input name="data[cus_industry][delete]" type="checkbox" id="delete" value="1"><label for="remember">Delete</label> </div></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center" style="width: 150px;"><h5>Location</h5></td>
                                                    <td class="text-center"><div class="checkbox pull-right"> <input name="data[cus_location][add]" type="hidden" id="add" value="0"><input name="data[cus_location][add]" type="checkbox" id="add" value="1"><label for="remember">Add</label> </div></td>
                                                    <td class="text-center"><div class="checkbox pull-right"> <input name="data[cus_location][edit]" type="hidden" id="edit" value="0"><input name="data[cus_location][edit]" type="checkbox" id="edit" value="1"><label for="remember">Edit</label> </div></td>
                                                    <td class="text-center"><div class="checkbox pull-right"> <input name="data[cus_location][view]" type="hidden" id="view" value="0"><input name="data[cus_location][view]" type="checkbox" id="view" value="1"><label for="remember">View</label> </div></td>
                                                    <td class="text-center"><div class="checkbox pull-right"> <input name="data[cus_location][delete]" type="hidden" id="delete" value="0"><input name="data[cus_location][delete]" type="checkbox" id="delete" value="1"><label for="remember">Delete</label> </div></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center" style="width: 150px;"><h5>Customer</h5></td>
                                                    <td class="text-center"><div class="checkbox pull-right"> <input name="data[cus_customer][add]" type="hidden" id="add" value="0"><input name="data[cus_customer][add]" type="checkbox" id="add" value="1"><label for="remember">Add</label> </div></td>
                                                    <td class="text-center"><div class="checkbox pull-right"> <input name="data[cus_customer][edit]" type="hidden" id="edit" value="0"><input name="data[cus_customer][edit]" type="checkbox" id="edit" value="1"><label for="remember">Edit</label> </div></td>
                                                    <td class="text-center"><div class="checkbox pull-right"> <input name="data[cus_customer][view]" type="hidden" id="view" value="0"><input name="data[cus_customer][view]" type="checkbox" id="view" value="1"><label for="remember">View</label> </div></td>
                                                    <td class="text-center"><div class="checkbox pull-right"> <input name="data[cus_customer][delete]" type="hidden" id="delete" value="0"><input name="data[cus_customer][delete]" type="checkbox" id="delete" value="1"><label for="remember">Delete</label> </div></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center" style="width: 150px;"><h5>Payment Terms</h5></td>
                                                    <td class="text-center"><div class="checkbox pull-right"> <input name="data[cus_paymentterms][add]" type="hidden" id="add" value="0"><input name="data[cus_paymentterms][add]" type="checkbox" id="add" value="1"><label for="remember">Add</label> </div></td>
                                                    <td class="text-center"><div class="checkbox pull-right"> <input name="data[cus_paymentterms][edit]" type="hidden" id="edit" value="0"><input name="data[cus_paymentterms][edit]" type="checkbox" id="edit" value="1"><label for="remember">Edit</label> </div></td>
                                                    <td class="text-center"><div class="checkbox pull-right"> <input name="data[cus_paymentterms][view]" type="hidden" id="view" value="0"><input name="data[cus_paymentterms][view]" type="checkbox" id="view" value="1"><label for="remember">View</label> </div></td>
                                                    <td class="text-center"><div class="checkbox pull-right"> <input name="data[cus_paymentterms][delete]" type="hidden" id="delete" value="0"><input name="data[cus_paymentterms][delete]" type="checkbox" id="delete" value="1"><label for="remember">Delete</label> </div></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center" style="width: 150px;"><h5>Priority</h5></td>
                                                    <td class="text-center"><div class="checkbox pull-right"> <input name="data[cus_priority][add]" type="hidden" id="add" value="0"><input name="data[cus_priority][add]" type="checkbox" id="add" value="1"><label for="remember">Add</label> </div></td>
                                                    <td class="text-center"><div class="checkbox pull-right"> <input name="data[cus_priority][edit]" type="hidden" id="edit" value="0"><input name="data[cus_priority][edit]" type="checkbox" id="edit" value="1"><label for="remember">Edit</label> </div></td>
                                                    <td class="text-center"><div class="checkbox pull-right"> <input name="data[cus_priority][view]" type="hidden" id="view" value="0"><input name="data[cus_priority][view]" type="checkbox" id="view" value="1"><label for="remember">View</label> </div></td>
                                                    <td class="text-center"><div class="checkbox pull-right"> <input name="data[cus_priority][delete]" type="hidden" id="delete" value="0"><input name="data[cus_priority][delete]" type="checkbox" id="delete" value="1"><label for="remember">Delete</label> </div></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center" style="width: 150px;"><h5>Referred By</h5></td>
                                                    <td class="text-center"><div class="checkbox pull-right"> <input name="data[cus_referredby][add]" type="hidden" id="add" value="0"><input name="data[cus_referredby][add]" type="checkbox" id="add" value="1"><label for="remember">Add</label> </div></td>
                                                    <td class="text-center"><div class="checkbox pull-right"> <input name="data[cus_referredby][edit]" type="hidden" id="edit" value="0"><input name="data[cus_referredby][edit]" type="checkbox" id="edit" value="1"><label for="remember">Edit</label> </div></td>
                                                    <td class="text-center"><div class="checkbox pull-right"> <input name="data[cus_referredby][view]" type="hidden" id="view" value="0"><input name="data[cus_referredby][view]" type="checkbox" id="view" value="1"><label for="remember">View</label> </div></td>
                                                    <td class="text-center"><div class="checkbox pull-right"> <input name="data[cus_referredby][delete]" type="hidden" id="delete" value="0"><input name="data[cus_referredby][delete]" type="checkbox" id="delete" value="1"><label for="remember">Delete</label> </div></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center" style="width: 150px;"><h5>Sales Person</h5></td>
                                                    <td class="text-center"><div class="checkbox pull-right"> <input name="data[cus_salesperson][add]" type="hidden" id="add" value="0"><input name="data[cus_salesperson][add]" type="checkbox" id="add" value="1"><label for="remember">Add</label> </div></td>
                                                    <td class="text-center"><div class="checkbox pull-right"> <input name="data[cus_salesperson][edit]" type="hidden" id="edit" value="0"><input name="data[cus_salesperson][edit]" type="checkbox" id="edit" value="1"><label for="remember">Edit</label> </div></td>
                                                    <td class="text-center"><div class="checkbox pull-right"> <input name="data[cus_salesperson][view]" type="hidden" id="view" value="0"><input name="data[cus_salesperson][view]" type="checkbox" id="view" value="1"><label for="remember">View</label> </div></td>
                                                    <td class="text-center"><div class="checkbox pull-right"> <input name="data[cus_salesperson][delete]" type="hidden" id="delete" value="0"><input name="data[cus_salesperson][delete]" type="checkbox" id="delete" value="1"><label for="remember">Delete</label> </div></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center" style="width: 150px;"><h5>Title</h5></td>
                                                    <td class="text-center"><div class="checkbox pull-right"> <input name="data[cus_title][add]" type="hidden" id="add" value="0"><input name="data[cus_title][add]" type="checkbox" id="add" value="1"><label for="remember">Add</label> </div></td>
                                                    <td class="text-center"><div class="checkbox pull-right"> <input name="data[cus_title][edit]" type="hidden" id="edit" value="0"><input name="data[cus_title][edit]" type="checkbox" id="edit" value="1"><label for="remember">Edit</label> </div></td>
                                                    <td class="text-center"><div class="checkbox pull-right"> <input name="data[cus_title][view]" type="hidden" id="view" value="0"><input name="data[cus_title][view]" type="checkbox" id="view" value="1"><label for="remember">View</label> </div></td>
                                                    <td class="text-center"><div class="checkbox pull-right"> <input name="data[cus_title][delete]" type="hidden" id="delete" value="0"><input name="data[cus_title][delete]" type="checkbox" id="delete" value="1"><label for="remember">Delete</label> </div></td>
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
                                                    <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                                    <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                                    <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                                    <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center" style="width: 150px;"><h5>Brand</h5></td>
                                                    <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                                    <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                                    <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                                    <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center" style="width: 150px;"><h5>Instrument</h5></td>
                                                    <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                                    <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                                    <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                                    <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center" style="width: 150px;"><h5>Instrument for Group</h5></td>
                                                    <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                                    <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                                    <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                                    <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center" style="width: 150px;"><h5>Range</h5></td>
                                                    <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                                    <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                                    <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                                    <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center" style="width: 150px;"><h5>Title</h5></td>
                                                    <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                                    <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                                    <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                                    <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center" style="width: 150px;"><h5>Unit</h5></td>
                                                    <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                                    <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                                    <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                                    <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> <!-- / Info Panel -->
                            <div class="panel panel-danger"> 
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
                            </div> <!-- / pink Panel -->
                        </div> <!-- / col-md-6 -->
                            
                    <!-- /row -->
                        
                    
                        <div class="col-md-6">
                            <div class="panel panel-danger"> 
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
                            </div> <!-- / Primary Panel -->
                            <div class="panel panel-danger"> 
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
                            </div> <!-- / Danger Panel -->
                        </div> <!-- / col-md-6 -->
                            
                        <div class="col-md-6">
                            <div class="panel panel-danger"> 
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
                            </div> <!-- / success Panel -->
                            
                            <div class="panel panel-danger"> 
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
                            </div> 
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
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                         </tr>
                                    
                                         <tr>
                                             <td class="text-center" style="width: 150px;"><h5 class="">Sales Order</h5></td>
                                             <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                             <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                             <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                             <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                         </tr>
                                         <tr>
                                             
                                             <td class="text-center" style="width: 150px;"><h5 class="">Delivery Order</h5></td>
                                             <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                             <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                         </tr>
                                    <tr>
                                            <td class="text-center" style="width: 150px;"><h5 class="">Job Transaction</h5></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                    
                                    </tr>
                                    <tr>
                                        <td class="text-center" style="width: 150px;"><h5 class="">Lab Process</h5></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center" style="width: 150px;"><h5 class="">Purchase Order</h5></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                    </tr>
                                    <tr>
                                    
                                        <td class="text-center" style="width: 150px;"><h5 class="">Proforma Invoice</h5></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center" style="width: 150px;"><h5 class="">Sub Contract DO</h5></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center" style="width: 150px;"><h5 class="">C and D info</h5></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center" style="width: 150px;"><h5 class="">Invoice</h5></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center" style="width: 150px;"><h5 class="">Tracking System</h5></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center" style="width: 150px;"><h5 class="">Debt Chase</h5></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center" style="width: 150px;"><h5 class="">Onsite Schedule</h5></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center" style="width: 150px;"><h5 class="">Recall Service</h5></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center" style="width: 150px;"><h5 class="">Job Monitoring</h5></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center" style="width: 150px;"><h5 class="">Purchase Requisition</h5></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center" style="width: 150px;"><h5 class="">PR_Purchase Order</h5></td>
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
                            </div> <!-- / default Panel -->
                        
                       
                            <div class="panel panel-danger"> 
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
                            </div>
                           
                            </div>
                            <div class="col-md-6">
                        
                        
                        
                            <div class="panel panel-danger"> 
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
                            </div>
                            <div class="panel panel-danger"> 
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
                            </div>
                            </div>
                            <div class="col-md-6">
  <div class="panel panel-danger"> 
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
                            </div>
                        
                            <div class="panel panel-danger"> 
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
                            
                          
                        </div>
                    </div>
                            <div class="col-md-6"><div class="panel panel-danger"> 
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
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center" style="width: 150px;"><h5 class="">Quotation</h5></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center" style="width: 150px;"><h5 class="">Sales Order</h5></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center" style="width: 150px;"><h5 class="">Delivery Order</h5></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center" style="width: 150px;"><h5 class="">Invoice</h5></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center" style="width: 150px;"><h5 class="">Procedure No</h5></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center" style="width: 150px;"><h5 class="">Brand</h5></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center" style="width: 150px;"><h5 class="">Instrument</h5></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center" style="width: 150px;"><h5 class="">Instrument for Group</h5></td>
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
                                        <td class="text-center" style="width: 150px;"><h5 class="">Unit</h5></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center" style="width: 150px;"><h5 class="">Ready to Prepare Invoice</h5></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center" style="width: 150px;"><h5 class="">PR_Supervisor Dashboard</h5></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="add"><label for="remember">Add</label> </div></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="edit"><label for="remember">Edit</label> </div></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="view"><label for="remember">View</label> </div></td>
                                        <td class="text-center"><div class="checkbox pull-right"> <input type="checkbox" id="delete"><label for="remember">Delete</label> </div></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center" style="width: 150px;"><h5 class="">PR_Manager</h5></td>
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
        
   