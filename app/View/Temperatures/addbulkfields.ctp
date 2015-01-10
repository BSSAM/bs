<?php ?>
<table  class="table table-vcenter table-condensed table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">S.No</th>
                            <th class="text-center">Range</th>
                            <th class="text-center">Uref1</th>
                            <th class="text-center">Uref2</th>
                            <th class="text-center">Uref3</th>
                            <th class="text-center">Uacc1</th>
                            <th class="text-center">Uacc2</th>
                            <th class="text-center">Uacc3</th>
                            <th class="text-center">Urefdivisor</th>
                            <th class="text-center">Uresdivisoranalog</th>
                            <th class="text-center">Uresdivisordigital</th>
                            <th class="text-center">Urepdivisor</th>
                            <th class="text-center">Divisor</th>
                            <th class="text-center">Uicestability</th>
                            <th class="text-center">Ustability</th>
                            <th class="text-center">Uuniformity</th>
                            <th class="text-center">Udrift</th>
                            <th class="text-center">Uimm</th>
                            <th class="text-center">Uheateffect</th>
                            <th class="text-center">Ugravity</th>
                            <th class="text-center">Uother1</th>
                            <th class="text-center">Uother2</th>
                            <th class="text-center">Uother3</th>
                            <th class="text-center">Uother4</th>
                            <th class="text-center">Uother5</th>
                            <th class="text-center">Uother6</th>
                            <th class="text-center">Uother7</th>
                            <th class="text-center">Uother8</th>
                            <th class="text-center">Uother9</th>
                            <th class="text-center">Uother10</th>
                            <th class="text-center">Uother11</th>
                            <th class="text-center">Uother12</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="subcontract_instrument_info"> 
                     
                     <?php foreach($tempuncertaintydata_list as $k=>$v)
					       {   ?>
                        <tr class="text-center">    
                            <td class="text-center"><?php echo $k+1;?></td>
                            <td class="text-center">-75.00 ~ -30.0001/°C</td>
                            <td class="text-center"><?php if($v['Tempuncertaintydata']['uref1_data3'] != " ") { echo $v['Tempuncertaintydata']['uref1_data3']; } else { echo $v['Tempuncertaintydata']['uref1_data1']; }?></td>
                            <td class="text-center"><?php if($v['Tempuncertaintydata']['uref2_data3'] != " ") { echo $v['Tempuncertaintydata']['uref2_data3']; } else { echo $v['Tempuncertaintydata']['uref2_data1']; }?></td>
                            <td class="text-center"><?php if($v['Tempuncertaintydata']['uref3_data3'] != " ") { echo $v['Tempuncertaintydata']['uref3_data3']; } else { echo $v['Tempuncertaintydata']['uref3_data1']; }?></td>
                            <td class="text-center"><?php if($v['Tempuncertaintydata']['uacc1_data3'] != " ") { echo $v['Tempuncertaintydata']['uacc1_data3']; } else { echo $v['Tempuncertaintydata']['uacc1_data1']; }?></td>
                            <td class="text-center"><?php if($v['Tempuncertaintydata']['uacc2_data3'] != " ") { echo $v['Tempuncertaintydata']['uacc2_data3']; } else { echo $v['Tempuncertaintydata']['uacc1_data1']; }?></td>
                            <td class="text-center"><?php if($v['Tempuncertaintydata']['uacc3_data3'] != " ") { echo $v['Tempuncertaintydata']['uacc3_data3']; } else { echo $v['Tempuncertaintydata']['uacc1_data1']; }?></td>
                            <td class="text-center"><?php  echo $v['Tempuncertaintydata']['urefdivisor']; ?></td>
                            <td class="text-center"><?php  echo $v['Tempuncertaintydata']['uresdivisoranalog']; ?></td>
                            <td class="text-center"><?php  echo $v['Tempuncertaintydata']['uresdivisordigital']; ?></td>
                            <td class="text-center"><?php  echo $v['Tempuncertaintydata']['urepdivisor']; ?></td>
                            <td class="text-center"><?php  echo $v['Tempuncertaintydata']['divisor']; ?></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center">0.027</td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
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
                            <div class="btn-group action_un_btn"><a class="btn btn-xs btn-default" title="" data-toggle="tooltip" href="#" data-original-title="Edit">
                            <i class="fa fa-pencil"></i></a>
                            <a class="btn btn-xs btn-danger" title="" data-toggle="tooltip" href="#" data-original-title="Delete"><i class="fa fa-times"></i></a></div>
                            </td>
                        </tr>
                    <?php  }  ?>    
                    </tbody>
                </table>
