<table  class="table table-vcenter table-condensed table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">S.No</th>
                            <th class="text-center">Set Point</th>
                            <th class="text-center">Unit</th>
                            <th class="text-center">Reading Type</th>
                            <th class="text-center">Resolution</th>
                            <th class="text-center">Accuracy</th>
                            <th class="text-center">Count</th>
                            <th class="text-center">Pref Reference(Master Instrument-Tagno-Range)</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="template_detail_info"> 
                       <?php foreach($temptemplatedata as $k=>$v)
					         {   ?>
                                <tr class="text-center">  
                                <td>
                                    <?php echo $k+1; ?>
                                </td>  
                                    <td class="" >
                                        <?php echo $v['Temptemplatedata']['setpoint'];?>
                                    </td>
                                    <td class="" >
                                        <?php echo $v['Temptemplatedata']['unitname'];?>
                                    </td>
                                    <td class="" >
                                        <?php echo 'Temperature';?>
                                    </td>
                                    <td class="" >
                                        <?php echo $v['Temptemplatedata']['resolution'];?>
                                    </td>
                                    <td class="" >
                                        <?php echo $v['Temptemplatedata']['accuracy'];?>
                                    </td>
                                    <td class="" >
                                        <?php echo $v['Temptemplatedata']['count'];?>
                                    </td>
                                    <td class="" >
                                        <?php echo $this->Temp->uncertainity_name($v['Temptemplatedata']['temp_uncertainty_id']); ?>
                                        <?php //echo $v['Temptemplatedata']['temp_uncertainty_id'];?>
                                    </td>
                                    <td class="text-center">
                                    <div class="btn-group action_un_btn"><a class="btn btn-xs btn-default edit_datatemplate" title="" data-toggle="tooltip" href="#" data-original-title="Edit" id ="<?php echo $v['Temptemplatedata']['id']; ?>">
                                    <i class="fa fa-pencil"></i></a>
                                    <?php echo $this->Form->postLink('<i class="fa fa-times"></i>',array('action'=>'deletetemplatedata',$v['Temptemplatedata']['id']),array('data-toggle'=>'tooltip','title'=>'Delete','class'=>'btn btn-xs btn-danger','escape'=>false,'confirm'=>'Are you Sure?')); ?></div>
                                    </td>
                               
                                </tr>
                       <?php }    ?>         
                    </tbody>
                </table>