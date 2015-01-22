<div class="block full">
    <div class="table-responsive">
        <table id="pofull-datatable" class="table table-vcenter table-condensed table-bordered">
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
                  <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($description_sup as $description_list): ?>
                <tr >
                  <td class="text-center"><?php echo $description_list['Description']['salesorder_id'].'-'.$description_list['Description']['id'] ?></td>
                  <td class="text-center"><?php echo $description_list['Instrument']['name']; ?></td>
                  <td class="text-center"><?php echo $description_list['Brand']['brandname']; ?></td>
                  <td class="text-center"><?php echo $description_list['Description']['model_no']; ?></td>
                  <td class="text-center"><?php echo $description_list['Range']['range_name']; ?></td>
                  <td class="text-center"><?php echo $description_list['Salesorder']['in_date']; ?></td>
                  <td class="text-center"><?php echo $description_list['Salesorder']['due_date']; ?></td>
                  <td class="text-center">
                        <div class="btn-group">
                            <?php // echo $this->Html->link('<i class="fa fa-pencil"></i>',array('action'=>'edit',$description_list['Description']['salesorder_id']),array('data-toggle'=>'tooltip','title'=>'Edit','class'=>'btn btn-xs btn-default','escape'=>false)); ?>
                            <?php // echo $this->Form->postLink('<i class="fa fa-times"></i>',array('action'=>'delete',$description_list['Description']['salesorder_id']),array('data-toggle'=>'tooltip','title'=>'Delete','class'=>'btn btn-xs btn-danger','escape'=>false,'confirm'=>'Are you Sure?')); ?>
                            <?php echo $this->Html->link('<i class="fa fa-pencil"></i>',array('controller'=>'Temperatures','action'=>'template/edittemplate',$description_list['Instrument']['id'].'$'.$description_list['Range']['id'].'$'.$description_list['Description']['model_no'].'$'.$description_list['Brand']['id'].'$'.$description_list['Description']['salesorder_id'].'$'.$description_list['Description']['id']),array('data-toggle'=>'tooltip','title'=>'Edit','class'=>'btn btn-xs btn-default','escape'=>false)); ?>
                            <?php echo $this->Form->postLink('<i class="fa fa-times"></i>',array('action'=>'delete',$description_list['Instrument']['id'].'$'.$description_list['Range']['id'].'$'.$description_list['Description']['model_no'].'$'.$description_list['Brand']['id'].'$'.$description_list['Description']['salesorder_id'].'$'.$description_list['Description']['id']),array('data-toggle'=>'tooltip','title'=>'Delete','class'=>'btn btn-xs btn-danger','escape'=>false,'confirm'=>'Are you Sure?')); ?>
                        
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="block full">
    <div class="table-responsive">
        <table id="qofull-datatable" class="table table-vcenter table-condensed table-bordered">
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
              <tr >
                  <td class="text-center"></td>
                  <td class="text-center"></td>
                  <td class="text-center"></td>
                  <td class="text-center"></td>
                  <td class="text-center"></td>
                  <td class="text-center"></td>
                  <td class="text-center"></td>
                  <td class="text-center"></td>
                  <td class="text-center"></td>
                  <td class="text-center">
                        <div class="btn-group">
                            <?php //echo $this->Html->link('<i class="fa fa-pencil"></i>',array('action'=>'edit',$department_list['Department']['id']),array('data-toggle'=>'tooltip','title'=>'Edit','class'=>'btn btn-xs btn-default','escape'=>false)); ?>
                            <?php //echo $this->Form->postLink('<i class="fa fa-times"></i>',array('action'=>'delete',$department_list['Department']['id']),array('data-toggle'=>'tooltip','title'=>'Delete','class'=>'btn btn-xs btn-danger','escape'=>false,'confirm'=>'Are you Sure?')); ?>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>