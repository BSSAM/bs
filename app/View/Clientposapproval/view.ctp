<script>
    var path_url = '<?PHP echo Router::url('/', true); ?>';
    $('has-error1').attr("style", "display:none");
    $('input.example').on('change', function() {
        $('input.example').not(this).prop('checked', false);
    });
    $(".form-horizontal").submit(function(e) {
//    alert('asd');
//    if($('#ponumber[]').val=''){
//        alert('wrong');
//    }
        /* Stop form from submitting normally */
        e.preventDefault();

        /* Clear result div*/
        // $("#result").html('');

        /* Get some values from elements on the page: */
        var values = $(this).serialize();
        alert(values);
        return false;

        /* Send the data using post and put the results in a div */
        $.ajax({
            url: "<?PHP echo Router::url('/', true); ?>Clientposapproval/quotation_po_update",
            type: "post",
            data: values,
            success: function(data) {
                console.log(data);
                //window.location.reload();
            }
        });
//    var isFormValid = true;
//    $(".form-horizontal input:text").{
//            
//            isFormValid = false;
//                alert("fail");  
//           $(this).addClass("error_show");     
//        } else {
//            alert("success");
//            isFormValid = true;
//            $(this).removeClass("error_show");   
//        }
//    });
//    if (!isFormValid) {
//          
//        //$('has-error').addClass('help-block_login animation-slideDown');
//    }
//    return isFormValid;
    });
</script>
<?PHP echo $this->Form->create('Clientposapproval', array('url' => 'quotation_po_update', 'class' => 'form-horizontal')); ?>
<?PHP echo $this->Form->input('quotationno', array('type' => 'hidden', 'name' => 'quotationno', 'value' => $data['Quotation']['quotationno'])); ?>
<?PHP echo $this->Form->input('salesorderid', array('type' => 'hidden', 'name' => 'salesorderid', 'value' => $data_sal['Salesorder']['id'])); ?>
<?PHP echo $this->Form->input('title_name', array('type' => 'hidden', 'name' => 'title_name', 'value' => $title_name)); ?>

<h4 class="sub-header text-center">Customer Details - <strong><?PHP echo $data['Customer']['Customertagname'] . "(" . $data['Customer']['id'] . ")"; ?> </strong></h4>

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
                <?PHP if (!empty($data['Customer']['Contactpersoninfo'])): ?>
    <?PHP foreach ($data['Customer']['Contactpersoninfo'] as $cperson): ?>
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

<h4 class="sub-header text-center">Job Details - <strong>( <?PHP echo $data['Quotation']['track_id']; ?> )</strong></h4>
<div class="row">
    <div class="col-sm-3">
        <div class="block">
            <dl>
                <dt>Quotation Order</dt>
                <dd class="word_break">
<?PHP echo $data['Quotation']['quotationno']; ?>
                    <br><span class="label label-info">Quantity : <?PHP echo count($data['Device']); ?></span>
                </dd>
            </dl>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="block">
            <dl>
                <dt>Sales Order</dt>

                <?PHP if ($salesorderfullinvoice == 1) {
                    ?>
                        <?PHP ?>
                    <dd class="word_break">
                        <?PHP
                        //if($salesorderfullinvoice==1):
                        echo $quotation_data['Salesorder'][0]; //echo "&nbsp";
                        //echo $this->Form->checkbox('sales_check',array('hiddenField' => false,'value'=>$v,'label'=>false,'class'=>'example')); 
                        //endif;
                        ?>
                    </dd>

    <?PHP //endforeach;  ?>
                    <dd class="word_break"><span class="label label-info">Quantity : <?PHP echo $count_sales_desc; ?></span> </dd>

                    <?PHP
                } else {
                    if (!empty($quotation_data['Salesorder'])):
                        foreach ($quotation_data['Salesorder'] as $k => $v):
                            ?>
                            <dd class="word_break">
                                <?PHP
                                //if($salesorderfullinvoice==1):
                                //echo  $v; echo "&nbsp";
                                //echo $this->Form->checkbox('sales_check',array('hiddenField' => false,'value'=>$v,'label'=>false,'class'=>'example')); 
                                //endif;
                                ?>
                            </dd>

                        <?PHP endforeach; ?>
                        <dd class="word_break"><span class="label label-info">Quantity : <?PHP echo $count_sales_desc; ?></span> </dd>
                    <?PHP else: ?>
                        <dd class="word_break"><?PHP echo 'Sales Orders not Found'; ?></dd>
                    <?PHP
                    endif;
                }
                ?>
            </dl>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="block">
            <dl>
                <dt>Delivery Order</dt>
<?PHP if (!empty($quotation_data['Deliveryorder'])): ?>
                    <?PHP foreach ($quotation_data['Deliveryorder'] as $k => $v): ?>
                        <dd class="word_break"><?PHP echo $v; ?></dd>
                        <dd class="word_break"><span class="label label-info">Quantity : <?PHP echo $count_del_desc; ?></span></dd>
                    <?PHP endforeach; ?>
                <?PHP else: ?>
                    <dd class="word_break"><?PHP echo 'Delivery Orders not Found'; ?></dd>
<?PHP endif; ?>
            </dl>
        </div>
    </div>

    <div class="col-sm-2">
        <div class="block">
            <dl>
                <dt>Total No. Instruments</dt>
                <dd>
<?PHP echo $this->Form->input('total_inst', array('type' => 'text', 'class' => 'form-control', 'label' => false, 'placeholder' => 'No Of Instrument', 'name' => 'total_inst', 'id' => 'total_inst', 'value' => $total_inst)) ?></dd>
            </dl>
        </div>
    </div>

    <div class="col-sm-12">
        <h4 class="sub-header text-center">Purchase Order Details</h4>
        <div class="block col-sm-12">

            <dl>
                <!--                                    <dt>Po Number</dt>-->
                <?PHP
                //$quo_po     =   $data['Quotation']['ref_no'];//pr($quo_po);exit;
//                                    if($type_id ==1):
//                                        $arra_po    =   $pos;
//                                        $arra_count    =   $pos_count;
//                                    else:
                $arra_po = explode(',', $pos);
                //pr($arra_po);
                $arra_count = explode(',', $pos_count);
                //pr($arra_count);
//                                    endif;
                ?>
                <?PHP $count = 50; ?>
                <?PHP $count1 = 0; ?>
                <?php $mer = array_combine($arra_po, $arra_count); ?>
                <?PHP foreach ($mer as $pokey => $po): ?>
                    <?PHP $count = $count + 1; ?>
    <?PHP $count1 = $count1 + 1; ?>
                    <div class="group_po_<?php echo $count; ?>">
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="ponumber[]">Purchase Order <?php echo $count1; ?></label>
                            <div class="col-md-4 row">
                            <?PHP echo $this->Form->input('ponumber', array('type' => 'text', 'class' => 'form-control', 'value' => $pokey, 'label' => false, 'placeholder' => 'PO Number', 'name' => 'ponumber[]', 'id' => 'ponumber[]')) ?></dd>
                            </div>
                            <?PHP //endforeach; ?>
                            <?PHP //foreach ($arra_count as $pokey_count=>$po_count): ?>
    <?PHP //$count1    =   $count1+1;  ?>

                            <div class="col-md-2">
                            <?PHP echo $this->Form->input('pocount', array('type' => 'text', 'class' => 'form-control', 'value' => $po, 'label' => false, 'placeholder' => 'PO Count', 'name' => 'pocount[]', 'id' => 'pocount[]')) ?></dd>
                            </div>
                            <?php if ($count != 51): ?>
                                <div class="col-md-1 row"><div class="btn-group btn-group-sm form-control-static"><div class="btn btn-alt btn-info" id="delete_po" data-delete=<?php echo $count; ?>><i class="fa fa-minus"></i></div></div></div>
    <?php endif; ?>
                        </div>
                    </div>
<?PHP endforeach; ?>
                <!--                                    <div class="has-error1">There should be no Empty Purchase Orders</div>-->


                <?PHP //foreach ($arra_count as $pokey_count=>$po_count): ?>
                <?PHP //$count1    =   $count1+1;  ?>
                <!--                                    <div class="col-md-12 row">
<?PHP //echo $this->Form->input('ponumber_count',array('type'=>'text','class'=>'form-control','value'=>$pokey_count,'label'=>false,'placeholder'=>'PO Number','name'=>'ponumber[]'))  ?></dd>
                                                    </div>
                                                    
<?PHP //if($count1==1&& $type_id!=1):  ?>
                                                    <div class="btn btn-alt btn-info pull-right" id="po_plus">
                                                    <i class="fa fa-plus"></i></div>
                <?PHP //endif; ?>
                <?PHP //endforeach; ?>
<?PHP //}  ?>
                -->

            </dl>
<?PHP if ($count > 1 && $type_id != 1): ?>
                <div class="form-group">
                    <div class="btn btn-alt btn-info pull-right" id="po_plus">
                        <i class="fa fa-plus"></i></div>
                </div>
<?PHP endif; ?>
            <div class="po_up"></div>
        </div>
    </div>  
    <!-- END Grids Content Content -->
</div>
<?php echo $this->element('message'); ?>
<?php //pr($data['Quotation']['is_assign_po']);exit; ?>
<?php
//if($data['Quotation']['is_assign_po']!=1 && $data['Quotation']['po_generate_type']!="Manual"): 
if ($data['Quotation']['is_poapproved'] != 1):
    ?>
    <div class="form-group form-actions">
        <div class="col-xs-12 text-right">
            <?php if ($title_name == 'Approve'): ?>
                <button type="submit" class="btn btn-sm btn-primary">Approve</button>
            <?php else: ?>
                <button type="submit" class="btn btn-sm btn-primary">Save Changes</button>
    <?php endif; ?> 
            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
        </div>
    </div>
<?php endif; ?>
<?PHP echo $this->Form->end(); ?>
<?php echo $this->Html->script('pages/formsValidation'); ?>
<script>$(function() {
        FormsValidation.init();
    });</script>