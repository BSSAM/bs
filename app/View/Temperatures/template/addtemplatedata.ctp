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
                                </td>  
                                    <td class="" >
                                     <?php echo $v['Temptemplatedata']['setpoint'];?>
                                    </td>
                                    <td class="" >
                                     <?php echo $v['Temptemplatedata']['readingtypename'];?>
                                    </td>
                                    <td class="" >
                                     <?php echo $v['Temptemplatedata']['unitname'];?>
                                    </td><td class="" >
                                     <?php echo $v['Temptemplatedata']['count'];?>
                                    </td>
                                    <td class="" >
                                     <?php echo $v['Temptemplatedata']['resolution'];?>
                                    </td>
                                    <td class="" >
                                     <?php echo $v['Temptemplatedata']['accuracy'];?>
                                    </td>
                                    <td class="" >
                                     <?php echo $v['Temptemplatedata']['temp_uncertainty_id'];?>
                                    </td>
                                    <td class="" >
                                  
                                    </td>
                               
                                </tr>
                       <?php }    ?>         
                    </tbody>
                </table>