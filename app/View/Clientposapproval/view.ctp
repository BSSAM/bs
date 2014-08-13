<?PHP echo $this->Form->create('Clientposapproval',array('url'=>'quotation_po_update','class'=>'form-horizontal')); ?>
<?PHP echo $this->Form->input('quotationno',array('type'=>'hidden','name'=>'quotationno','value'=>$data['Quotation']['quotationno'])); ?>                   
<h4 class="sub-header text-center"><strong><?PHP echo $data['Customer']['Customertagname']."(" .$data['Customer']['id'].")"; ?> )</strong></h4>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="block">
                                <dl>
                                    <dt>Registered Address</dt>
                                        <?PHP foreach ($data['Customer']['Address'] as $address): ?>
                                            <?PHP if ($address['type'] == 'registered'): ?>
                                            <dd class="word_break">
                                                <?PHP echo $address['address']; ?>
                                            </dd>
                                        <?PHP endif; ?>
                                    </dl>
                                <?PHP endforeach; ?>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="block">
                                <dl>
                                    <dt>Billing Address</dt>
                                     <?PHP foreach ($data['Customer']['Address'] as $address): ?>
                                            <?PHP if ($address['type'] == 'billing'): ?>
                                            <dd class="word_break">
                                                <?PHP echo $address['address']; ?>
                                            </dd>
                                        <?PHP endif; ?>
                                <?PHP endforeach; ?>
                                </dl>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="block">
                                <dl>
                                    <dt>Delivery Address</dt>
                                    <?PHP foreach ($data['Customer']['Address'] as $address): ?>
                                            <?PHP if ($address['type'] == 'delivery'): ?>
                                    <dd class="word_break">
                                                <?PHP echo $address['address']; ?>
                                        </dd>
                                        <?PHP endif; ?>
                                    <?PHP endforeach; ?>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-sm-3">
                            <div class="block">
                                <dl>
                                    <dt>Sales Persons</dt>
                                     <?PHP foreach ($data['Customer']['CusSalesperson'] as $salesperson): ?>
                                        <dd class="word_break">
                                            <?PHP echo $salesperson['Salesperson']['salesperson']; ?>
                                        </dd>
                                    <?PHP endforeach; ?>
                                </dl>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="block"> 
                                <dl>
                                    <dt>Phone</dt>
                                    <dd class="word_break"><?PHP echo $data['Customer']['phone']; ?></dd>                                                                  
                                </dl>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="block"> 
                                <dl>
                                    <dt>Fax</dt>
                                    <dd class="word_break"><?PHP echo $data['Customer']['fax']; ?></dd>                                                                  
                                </dl>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="block"> 
                                <dl>
                                    <dt>Customer Location</dt>
                                    <dd class="word_break"><?PHP echo $data['Customer']['Location']['locationname']; ?></dd>                                                                  
                                </dl>
                            </div>
                        </div>
                        <div class="table-responsive col-sm-12">
                            <h4 class="sub-header text-center">Contact Person Info </h4>
                            <table class="table table-vcenter table-striped">
                                <thead>
                                    <tr>

                                        <th class="text-center">Name</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Department</th>
                                        <th class="text-center">Position</th>
                                        <th class="text-center">Phone</th>
                                        <th class="text-center">Mobile</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?PHP if(!empty($data['Customer']['Contactpersoninfo'])): ?>
                                    <?PHP foreach($data['Customer']['Contactpersoninfo'] as $cperson): ?>
                                    <tr>
                                        <td><?PHP echo $cperson['name']; ?></td>
                                        <td><?PHP echo $cperson['email']; ?></td>
                                        <td><?PHP echo $cperson['department']; ?></td>
                                        <td><?PHP echo $cperson['position']; ?></td>
                                        <td><?PHP echo $cperson['phone']; ?></td>
                                        <td><?PHP echo $cperson['mobile']; ?></td>
                                    </tr>
                                    <?PHP endforeach; ?>
                                    <?PHP endif; ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    

                    <h4 class="sub-header text-center">Job Details <strong>( <?PHP echo  $data['Quotation']['track_id']; ?> )</strong></h4>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="block">
                                <dl>
                                   <dt>Quotation Order</dt>
                                    <dd class="word_break">
                                        <?PHP echo  $data['Quotation']['quotationno']; ?>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="block">
                                <dl>
                                    <dt>Sales Order</dt>
                                    <?PHP foreach($quotation_data['Salesorder'] as $k=>$v): ?>
                                    <dd class="word_break"><?PHP echo  $v; ?></dd>
                                    <?PHP endforeach; ?>
                                </dl>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="block">
                                <dl>
                                    <dt>Delivery Order</dt>
                                    <?PHP foreach($quotation_data['Deliveryorder'] as $k=>$v): ?>
                                    <dd class="word_break"><?PHP echo  $v; ?></dd>
                                    <?PHP endforeach; ?>
                                </dl>
                            </div>
                        </div>
                        
                        <div class="col-sm-3">
                            <div class="block">
                                <dl>
                                    <dt>Invoice Number</dt>
                                    <dd class="word_break">
                                        <?PHP echo  $data['Quotation']['quotationno']; ?>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                        
                        <div class="col-sm-12">
                            <div class="block col-sm-12">
                                <dl>
                                    <dt>Po Number</dt>
                                    <?PHP  
                                        $quo_po     =   $data['Quotation']['ref_no'];
                                        $arra_po    =   explode(',', $quo_po);
                                    ?>
                                    <?PHP $count    =   0; ?>
                                     <?PHP foreach ($pos as $pokey=>$pov): ?>
                                    <?PHP $count    =   $count+1; ?>
                                    <div class="col-md-6 row">
                                        <?PHP echo $this->Form->input('ponumber',array('type'=>'text','class'=>'form-control','value'=>$pokey,'label'=>false,'placeholder'=>'PO Number','name'=>'ponumber[]')) ?></dd>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control pull-left" placeholder="PO Count" name="pocount[]" value=<?PHP echo $pov; ?> >
                                    </div>
                                    <?PHP if($count==1&& $type_id!=1): ?>
                                    <div class="btn btn-alt btn-info pull-right" id="po_plus">
                                    <i class="fa fa-plus"></i></div>
                                    <?PHP endif; ?>
                                    <?PHP endforeach; ?>
                                    <div class="po_up"></div>
                                   
                                </dl>
                            </div>
                        </div>  

                        <!-- END Grids Content Content -->
                    </div>
                     <div class="form-group form-actions">
                                <div class="col-xs-12 text-right">
                                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-sm btn-primary">Save Changes</button>
                                </div>
                            </div>
                      <?PHP echo $this->Form->end(); ?>