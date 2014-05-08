                            <h1>
                                <i class="gi gi-user"></i>Payment Terms
                            </h1>
                        </div>
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                        <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
                        <li><?php echo $this->Html->link('Payment Terms',array('controller'=>'Paymentterms','action'=>'index')); ?></li>
                    </ul>
                    <!-- END Datatables Header -->

                    <!-- Datatables Content -->
                    <div class="block full">
                        <div class="block-title">
                            <h2>List Of Payment Terms</h2>
                            <h2 style="float:right;"><?php echo $this->Html->link('Add Payment Term',array('controller'=>'Paymentterms','action'=>'add'),array('class'=>'btn btn-xs btn-primary','data-toggle'=>'tooltip','tile'=>'Add Payment Term')); ?></h2>
                        </div>
                        

                        <div class="table-responsive">
                            <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <!--<th class="text-center"><i class="gi gi-user"></i></th>-->
                                        <th class="text-center">Payment Term</th>
                                        <th class="text-center">Payment Type</th>
                                        <th class="text-center">Description</th>
                                        
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     <?php foreach($paymentterm as $paymentterm_list): ?>
                                  
                                    <tr>
                                        <td class="text-center"><?php echo $paymentterm_list['Paymentterm']['id']; ?></td>
                                        <!--<td class="text-center"><img src="img/placeholders/avatars/avatar4.gif" alt="avatar" class="img-circle"></td>-->
                                        <td class="text-center"><a href="javascript:void(0)"><?php echo $paymentterm_list['Paymentterm']['paymentterm']; ?></a></td>
                                        <td class="text-center"><?php echo $paymentterm_list['Paymentterm']['paymenttype']; ?></td>
                                        <td class="text-center"><?php echo $paymentterm_list['Paymentterm']['description']; ?></td>
                                     
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <?PHP echo $this->html->link('<i class="fa fa-pencil"></i>',array('controller'=>'Paymentterms',
                                                    'action'=>'edit',$paymentterm_list['Paymentterm']['id']),array('title'=>'Edit',
                                                        'class'=>'btn btn-xs btn-default','data-toggle'=>'tooltip','escape'=>false)); ?>
                                                <?PHP echo $this->Form->postlink('<i class="fa fa-times"></i>',array('controller'=>'Paymentterms',
                                                    'action'=>'delete',$paymentterm_list['Paymentterm']['id']),array('title'=>'Delete',
                                                        'class'=>'btn btn-xs btn-danger','data-toggle'=>'tooltip','escape'=>false,'confirm'=>'Are you sure want to delete?')); ?>
                                                 </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    
                                   
                                </tbody>
                            </table>
                         <?php echo $this->Html->script('pages/uiProgress'); ?>
                            <script>$(function(){ UiProgress.init(); });</script>
                                
                                <?php if($this->Session->flash()!='') { ?>
                            <script> var UiProgress = function() {
                                
                                // Get random number function from a given range
                                var getRandomInt = function(min, max) {
                                    return Math.floor(Math.random() * (max - min + 1)) + min;
                                };
                                
                                return {
                                    init: function() {
                                        
                                        var growlType = $(this).data('growl');
                                        
                                        $.bootstrapGrowl('Payment Term Added Successfully!', {
                                            type: growlType,
                                            allow_dismiss: true
                                        });
                                        
                                        $(this).prop('disabled', true);
                                    }
                                };
                            }();
                            
                            
                            </script> 
                            <?php } ?>