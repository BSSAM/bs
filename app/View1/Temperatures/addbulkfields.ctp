<?php ?>
<?php if($trigger == 'rangein'){ ?><div >Range Already Exists</div> <?php } ?>
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
                            <th class="text-center">Uother13</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="subcontract_instrument_info"> 
                     
                    <?php   foreach($tempuncertaintydata_list as $k=>$v)
                            {   ?>
                        <tr class="text-center">    
                            <td class="text-center"><?php echo $k+1;?></td>
                            <td class="text-center"><?php echo $v['Tempuncertaintydata']['rangename']; ?></td>
                            <td class="text-center"><?php echo $v['Tempuncertaintydata']['uref1_data1']; ?></td>
                            <td class="text-center"><?php echo $v['Tempuncertaintydata']['uref2_data1']; ?></td>
                            <td class="text-center"><?php echo $v['Tempuncertaintydata']['uref3_data1']; ?></td>
                            <td class="text-center"><?php echo $v['Tempuncertaintydata']['uacc1_data1']; ?></td>
                            <td class="text-center"><?php echo $v['Tempuncertaintydata']['uacc2_data1']; ?></td>
                            <td class="text-center"><?php echo $v['Tempuncertaintydata']['uacc3_data1']; ?></td>
                            <td class="text-center"><?php echo $v['Tempuncertaintydata']['urefdivisor']; ?></td>
                            <td class="text-center"><?php echo $v['Tempuncertaintydata']['uresdivisoranalog']; ?></td>
                            <td class="text-center"><?php echo $v['Tempuncertaintydata']['uresdivisordigital']; ?></td>
                            <td class="text-center"><?php echo $v['Tempuncertaintydata']['urepdivisor']; ?></td>
                            <td class="text-center"><?php echo $v['Tempuncertaintydata']['divisor']; ?></td>
                            <td class="text-center"><?php echo $v['Tempuncertaintydata']['u1_data2']; ?></td>
                            <td class="text-center"><?php echo $v['Tempuncertaintydata']['u2_data2']; ?></td>
                            <td class="text-center"><?php echo $v['Tempuncertaintydata']['u3_data2']; ?></td>
                            <td class="text-center"><?php echo $v['Tempuncertaintydata']['u4_data2']; ?></td>
                            <td class="text-center"><?php echo $v['Tempuncertaintydata']['u5_data2']; ?></td>
                            <td class="text-center"><?php echo $v['Tempuncertaintydata']['u6_data2']; ?></td>
                            <td class="text-center"><?php echo $v['Tempuncertaintydata']['u7_data2']; ?></td>
                            <td class="text-center"><?php echo $v['Tempuncertaintydata']['u8_data2']; ?></td>
                            <td class="text-center"><?php echo $v['Tempuncertaintydata']['u9_data2']; ?></td>
                            <td class="text-center"><?php echo $v['Tempuncertaintydata']['u10_data2']; ?></td>
                            <td class="text-center"><?php echo $v['Tempuncertaintydata']['u11_data2']; ?></td>
                            <td class="text-center"><?php echo $v['Tempuncertaintydata']['u12_data2']; ?></td>
                            <td class="text-center"><?php echo $v['Tempuncertaintydata']['u13_data2']; ?></td>
                            <td class="text-center"><?php echo $v['Tempuncertaintydata']['u14_data2']; ?></td>
                            <td class="text-center"><?php echo $v['Tempuncertaintydata']['u15_data2']; ?></td>
                            <td class="text-center"><?php echo $v['Tempuncertaintydata']['u16_data2']; ?></td>
                            <td class="text-center"><?php echo $v['Tempuncertaintydata']['u17_data2']; ?></td>
                            <td class="text-center"><?php echo $v['Tempuncertaintydata']['u18_data2']; ?></td>
                            <td class="text-center"><?php echo $v['Tempuncertaintydata']['u19_data2']; ?></td>
                            <td class="text-center"><?php echo $v['Tempuncertaintydata']['u20_data2']; ?></td>
                            <td class="text-center">
                            <div class="btn-group action_un_btn"><a class="btn btn-xs btn-default edit_datauncertain" title="" data-toggle="tooltip" href="#" data-original-title="Edit" id ="<?php echo $v['Tempuncertaintydata']['id']; ?>">
                            <i class="fa fa-pencil"></i></a>
                            <a class="btn btn-xs btn-danger delete_datauncertain" title="" data-toggle="tooltip" href="#" data-original-title="Delete" id ="<?php echo $v['Tempuncertaintydata']['id']; ?>"><i class="fa fa-times"></i></a></div>
                            </td>
                        </tr>
                    <?php  }  ?>    
                    </tbody>
                </table>
