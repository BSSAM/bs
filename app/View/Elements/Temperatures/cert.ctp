<div class="block full">
    <div class="table-responsive">
        <table id="dofull-datatable" class="table table-vcenter table-condensed table-bordered">
            <thead>
                <tr>
                  <th class="text-center">Salesorder No</th>
                  <!--<th class="text-center"><i class="gi gi-user"></i></th>-->
                  <th class="text-center">Instrument</th>
                  <th class="text-center">Brand</th>
                  <th class="text-center">Model</th>
                  <th class="text-center">Range</th>
                  <th class="text-center">Salesorder Date</th>
                  <th class="text-center">Due Date</th>
                  <th class="text-center">Customer Name</th>
                  <th class="text-center">Certificate No</th>
                  <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
              
                  <?php foreach($cer_total_data as $description_list): ?>
                <tr >
                   <td class="text-center"><?php echo $description_list['Description']['salesorder_id'].'-'.$description_list['Description']['id'] ?></td>
                  <td class="text-center"><?php echo $this->Temp->get_instrument_name($description_list['Description']['instrument_id']); ?></td>
                  <td class="text-center"><?php echo $this->Temp->get_brand_name($description_list['Description']['brand_id']); ?></td>
                  <td class="text-center"><?php echo $description_list['Description']['model_no']; ?></td>
                  <td class="text-center"><?php echo $this->Temp->get_range_name($description_list['Description']['sales_range']); ?></td>
                  <td class="text-center"><?php echo $this->Temp->get_calibrated_date($description_list['Description']['id']); ?></td>
                  <td class="text-center"><?php echo $this->Temp->get_due_date($description_list['Description']['id']); ?></td>
                  <td class="text-center"><?php echo $this->Temp->get_customer_name($description_list['Description']['customer_id']); ?></td>
                  <td class="text-center"><?php echo $this->Temp->get_certificate_no($description_list['Description']['id']); ?></td>
                  <td class="text-center">
                        <div class="btn-group">
                            <?php echo $this->Html->link('<i class="fa fa-pencil"></i>',array('action'=>'index',$description_list['Description']['instrument_id'].'$'.$description_list['Description']['brand_id'].'$'.$description_list['Description']['model_no'].'$'.$description_list['Description']['sales_range'].'$'.$description_list['Description']['salesorder_id'].'$'.$description_list['Description']['id']),array('data-toggle'=>'tooltip','title'=>'Edit','class'=>'btn btn-xs btn-default','escape'=>false)); ?>
                        </div>
                        <div class="btn-group">
                            <?php echo $this->Form->postLink('<i class="fa fa-times"></i>',array('action'=>'delete',$description_list['Description']['instrument_id'].'$'.$description_list['Description']['brand_id'].'$'.$description_list['Description']['model_no'].'$'.$description_list['Description']['sales_range'].'$'.$description_list['Description']['salesorder_id'].'$'.$description_list['Description']['id']),array('data-toggle'=>'tooltip','title'=>'Delete','class'=>'btn btn-xs btn-danger','escape'=>false,'confirm'=>'Are you Sure?')); ?>
                        </div>
                        <div class="btn-group">
                            <?php if(($description_list['Description']['manager'] && $description_list['Description']['engineer'] && $description_list['Description']['supervisor']) == 1) { ?>
                            <?php $cert = $this->Temp->get_certificate_no($description_list['Description']['id']); echo $this->Form->postLink('<i class="gi gi-print"></i>',array('action'=>'pdf',$cert),array('data-toggle'=>'tooltip','title'=>'Report','class'=>'btn btn-xs btn-default','escape'=>false)); ?>
                            <?php } ?>
                        </div>
                    </td>
                </tr>
              <?php endforeach; ?>
                  
            </tbody>
        </table>
    </div>
</div>