                            <h1>
                                <i class="gi gi-user"></i>Quotations
                            </h1>
                        </div>
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                        <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
                        <li><?php echo $this->Html->link('Quotations',array('controller'=>'Quotations','action'=>'index')); ?></li>
                    </ul>
                    <!-- END Datatables Header -->
                    <?PHP echo $this->element('message'); ?>
                    <!-- Datatables Content -->
                    <div class="block full">
                        <div class="block-title">
                            <h2>List Of Quotations</h2>
                            <?php if($userrole_cus['add']==1){ ?>
                            <h2 style="float:right;"><?php echo $this->Html->link('Add Quotation',array('controller'=>'Quotations','action'=>'add'),array('class'=>'btn btn-xs btn-primary','data-toggle'=>'tooltip','tile'=>'Add Quotation')); ?></h2>
                            <?php } ?>
                        </div>
                        

                        <div class="table-responsive">
                            <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                <thead>
                                    <tr>
                                        <!--<th class="text-center"><i class="gi gi-user"></i></th>-->
                                        <th class="text-center">Quotation No</th>
                                        <th class="text-center">Reg Date</th>
                                        <th class="text-center">Branch</th>
                                        <th class="text-center">Customer</th>
                                        <th class="text-center">Phone</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Reference No</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?PHP if(!empty($quotation )):  ?>
                                     <?php foreach($quotation as $quotation_list): ?>
                                    <tr <?php if($quotation_list['Quotation']['is_approved'] == 1):?> class="success" <?php else:?> class="error" <?php endif; ?>>
                                        <td class="text-center"><?PHP echo $quotation_list['Quotation']['quotationno'] ?></td>
                                        <td class="text-center"><?PHP echo $quotation_list['Quotation']['reg_date'] ?></td>
                                        <td class="text-center"><?PHP echo $quotation_list['branch']['branchname'] ?></td>
                                        <td class="text-center"><?PHP echo $quotation_list['Quotation']['customername'] ?></td>
                                        <td class="text-center"><?PHP echo $quotation_list['Quotation']['phone'] ?></td>
                                        <td class="text-center"><?PHP echo $quotation_list['Quotation']['email'] ?></td>
                                        <td class="text-center">
                                            <?PHP if($quotation_list['Quotation']['po_generate_type']=='Auotmatic'){$class="danger";}elseif($quotation_list['Quotation']['po_generate_type']=='Manual'){$class="success";}else{ $class="warning";} ?>
                                            <span class="label label-<?PHP echo $class; ?>">
                                                <?PHP echo $quotation_list['Quotation']['ref_no'] ?>
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <?php if($userrole_cus['edit']==1){ ?>
                                                <?php echo $this->Html->link('<i class="fa fa-pencil"></i>',array('action'=>'edit',$quotation_list['Quotation']['id']),array('data-toggle'=>'tooltip','title'=>'Edit','class'=>'btn btn-xs btn-default','escape'=>false)); ?>
                                                <?php } ?>
                                                <?php if($userrole_cus['delete']==1){ ?>
                                                <?php echo $this->Form->postLink('<i class="fa fa-times"></i>',array('action'=>'delete',$quotation_list['Quotation']['id']),array('data-toggle'=>'tooltip','title'=>'Delete','class'=>'btn btn-xs btn-danger','escape'=>false,'confirm'=>'Are you Sure?')); ?>
                                                <?php } ?>
                                                 
                                            </div>
                                                <?PHP //echo $this->html->link('View', array('url'=>'http://www.google.com'), array('title' => 'View','data-target'=>'#myModal','class' => 'btn btn-alt btn-xs btn-primary', 'data-toggle' => 'modal'));  ?>
<!--                                            <a href="Customers" data-target="#myModal" role="button" class="btn btn-default" data-toggle="modal">Launch First</a>-->
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <?PHP endif; ?>
                                   
                                </tbody>
                            </table>
<!--                            <div class="modal hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    </div>
                                </div>
                            </div>-->

                    <?php echo $this->Html->script('pages/uiProgress'); ?>
                    <script>$(function(){ UiProgress.init(); });</script>
                    <?php if ($this->Session->flash() != '') { ?>
                        <script> var UiProgress = function() {
                            // Get random number function from a given range
                            var getRandomInt = function(min, max) {
                                return Math.floor(Math.random() * (max - min + 1)) + min;
                            };
                        }();
                        $('#modal').load('Customers').dialog('open');
                        </script> 
                    <?php } ?>
