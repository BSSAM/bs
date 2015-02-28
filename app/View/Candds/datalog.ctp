
<h1>
                                <i class="gi gi-user"></i>Candds Datalog
                            </h1>
                        </div>
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                        <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
                        <li><?php echo $this->Html->link('Candds - Datalog',array('controller'=>'Candds','action'=>'datalog')); ?></li>
                    </ul>
                    <!-- END Datatables Header -->
                    <?PHP echo  $this->element('message'); ?>
                    <!-- Datatables Content -->
                    <div class="block full">
                        <div class="block-title">
                            <h2>List Of Collection and Delivery </h2> 
                            
                        </div>
                        <div class="table-responsive">
                            <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                <thead>
                                    <tr>
                                        
                                        <!--<th class="text-center"><i class="gi gi-user"></i></th>-->
                                        <th class="text-center">Delivery Order No</th>
                                        <th class="text-center">Delivery Order Date</th>
                                        <th class="text-center">Sales order No</th>
                                        <th class="text-center">Customer Name</th>
                                         <th class="text-center">Phone</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Reference No</th>
                                        <th class="text-center">Note</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?PHP if(!empty($deliveryorders )): ?>
                                     <?php foreach($deliveryorders as $deliveryorder): ?>
                                    <tr <?php if($deliveryorder['Deliveryorder']['is_approved'] == 1):?> class="" <?php else:?> class="themed-color-fire" <?php endif; ?>>
                                        <td class="text-center"><?PHP echo $deliveryorder['Deliveryorder']['delivery_order_no'] ?></td>
                                        <td class="text-center"><?PHP echo $deliveryorder['Deliveryorder']['delivery_order_date'] ?></td>
                                        <td class="text-center"><?PHP echo $deliveryorder['Deliveryorder']['salesorder_id'] ?></td>
                                        <td class="text-center"><?PHP echo $deliveryorder['Customer']['Customertagname'] ?></td>
                                        <td class="text-center"><?PHP echo $deliveryorder['Deliveryorder']['phone'] ?></td>
                                        <td class="text-center"><?PHP echo $deliveryorder['Deliveryorder']['email'] ?></td>
                                        <td class="text-center"><?PHP echo $deliveryorder['Deliveryorder']['our_reference_no'] ?></td>
                                        
                                        <td>
                                            <?php if($deliveryorder['Deliveryorder']['is_poapproved']==1): ?><span class="label label-five">PO#App</span> <?php endif; ?>
                                            <?php if($deliveryorder['Deliveryorder']['is_poapproved']!=1): ?><span class="label label-six">PO#Not</span> <?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <?PHP endif; ?>
                                </tbody>
                                
                            </table>
                            <br>
                            <span class="label label-five">PO#App</span> - PO Approved
                            <span class="label label-six">PO#Not</span> - PO Not Approved
                         <?php echo $this->Html->script('pages/uiProgress'); ?>
                            <script>$(function(){ UiProgress.init(); });</script>
                                
                                <?php if($this->Session->flash()!='') { ?>
                            <script> var UiProgress = function() {
                                
                                // Get random number function from a given range
                                var getRandomInt = function(min, max) {
                                    return Math.floor(Math.random() * (max - min + 1)) + min;
                                };
                            }();
                            </script> 
                            <?php } ?>
