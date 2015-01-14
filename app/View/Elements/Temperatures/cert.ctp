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