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
                                    <tr>
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
                                                <?php echo $this->Html->link('<i class="fa fa-pencil"></i>',array('action'=>'edit',$quotation_list['Quotation']['id']),array('data-toggle'=>'tooltip','title'=>'Edit','class'=>'btn btn-xs btn-default','escape'=>false)); ?>
                                                <?php echo $this->Form->postLink('<i class="fa fa-times"></i>',array('action'=>'delete',$quotation_list['Quotation']['id']),array('data-toggle'=>'tooltip','title'=>'Delete','class'=>'btn btn-xs btn-danger','escape'=>false,'confirm'=>'Are you Sure?')); ?>
                                                 
                                            </div>
                                                <?PHP //echo $this->html->link('View', array('url'=>'http://www.google.com'), array('title' => 'View','data-target'=>'#myModal','class' => 'btn btn-alt btn-xs btn-primary', 'data-toggle' => 'modal'));  ?>
<!--                                            <a href="Customers" data-target="#myModal" role="button" class="btn btn-default" data-toggle="modal">Launch First</a>-->
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <?PHP endif; ?>
                                   
                                </tbody>
                            </table>
