<!--<div class="col-sm-3 col-lg-12 subcontract_linear certificate_table certificate_tab"> -->
  <!-- table1-->
  <div class="form-group c_top_search">
    <label for="val_customername" class=" control-label">No.of Runs</label>
   <?php  $numbers = array('1' => 1,'2' => 2,'3' => 3,'4' => 4,'5' => 5,'6' => 6,'7' => 7,'8' => 8,'9' => 9,'10' => 10,'11' => 11, '12' => 12); ?> 
   <?php echo $this->Form->input('step1.no_runs', array('id' => 'val_no_runs', 'class' => 'form-control no_of_runs', 'label' => false, 'type' => 'select', 'empty' => 'Please select the Run','options' => $numbers,'value'=>$cert['Tempcertificatedata']['no_runs'])); ?>
  </div>
  <div class="pos_relative">
    <table  class="table table-vcenter table-condensed table-bordered">
      <thead>
        <tr class="c_dark_bg">
          <th class="text-center">RUN </th>
          <th class="text-center">1</th>
          <th class="text-center">2</th>
          <th class="text-center">3</th>
          <th class="text-center">4</th>
          <th class="text-center">5</th>
          <th class="text-center">6</th>
          <th class="text-center">7</th>
          <th class="text-center">8</th>
          <th class="text-center">9</th>
          <th class="text-center">10</th>
          <th class="text-center">MEAN </th>
          <th class="text-center">STDDEV OF MEAN </th>
        </tr>
      </thead>
      <tbody class="set1_info">
        <tr class="text-center c_light_bg">
          <td class="text-center">1</td>
          <td class="text-center">Set Temperature</td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['temp1']; ?>" name="step1[temp1]" class="temp1"></td>
          <td class="text-center">Unit </td>
          <td class="text-center">
<!--            <select name="unit1]" class="unit1">
              <option value="">-- Select Unit --</option>
              <option value="1" selected="selected" >°C</option>
              <option value="2">°F</option>
              <option value="3">°C</option>
              <option value="4">°F</option>
              <option value="5">Ω</option>
              <option value="6">mV</option>
              <option value="7">% rh</option>
            </select>-->
          <?php  echo $this->Form->input('step1.unit1', array('id' => 'unit1', 'class' => 'unit1','label' => false,'type' => 'select', 'options'=>$unit_list,'value'=>$cert['Tempcertificatedata']['unit1'])); ?>
          </td>
          <td class="text-center">Resolution </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['res1']; ?>" name="step1[res1]" class="res1"></td>
          <td class="text-center">Accuracy </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['acc1']; ?>" name="step1[acc1]" class="acc1"></td>
          <td class="text-center">Count </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['count1']; ?>" name="step1[count1]" class="count1"></td>
          <td class="text-center">Uncertainty </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['uncert1']; ?>" name="step1[uncert1]" class="uncert1"></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> Master </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m1_1']; ?>" name="step1[m1_1]" class="m1_1" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m1_2']; ?>" name="step1[m1_2]" class="m1_2" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m1_3']; ?>" name="step1[m1_3]" class="m1_3" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m1_4']; ?>" name="step1[m1_4]" class="m1_4" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m1_5']; ?>" name="step1[m1_5]" class="m1_5" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m1_6']; ?>" name="step1[m1_6]" class="m1_6" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m1_7']; ?>" name="step1[m1_7]" class="m1_7" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m1_8']; ?>" name="step1[m1_8]" class="m1_8" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m1_9']; ?>" name="step1[m1_9]" class="m1_9" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m1_10']; ?>" name="step1[m1_10]" class="m1_10" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m1_11']; ?>" name="step1[m1_11]" class="m1_11" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m1_12']; ?>" name="step1[m1_12]" class="m1_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> B.Set </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b1_1']; ?>" name="step1[b1_1]" class="b1_1" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b1_2']; ?>" name="step1[b1_2]" class="b1_2" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b1_3']; ?>" name="step1[b1_3]" class="b1_3" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b1_4']; ?>" name="step1[b1_4]" class="b1_4" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b1_5']; ?>" name="step1[b1_5]" class="b1_5" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b1_6']; ?>" name="step1[b1_6]" class="b1_6" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b1_7']; ?>" name="step1[b1_7]" class="b1_7" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b1_8']; ?>" name="step1[b1_8]" class="b1_8" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b1_9']; ?>" name="step1[b1_9]" class="b1_9" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b1_10']; ?>" name="step1[b1_10]" class="b1_10" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b1_11']; ?>" name="step1[b1_11]" class="b1_11" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b1_12']; ?>" name="step1[b1_12]" class="b1_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> A.Set </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a1_1']; ?>" name="step1[a1_1]" class="a1_1" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a1_2']; ?>" name="step1[a1_2]" class="a1_2" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a1_3']; ?>" name="step1[a1_3]" class="a1_3" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a1_4']; ?>" name="step1[a1_4]" class="a1_4" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a1_5']; ?>" name="step1[a1_5]" class="a1_5" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a1_6']; ?>" name="step1[a1_6]" class="a1_6" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a1_7']; ?>" name="step1[a1_7]" class="a1_7" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a1_8']; ?>" name="step1[a1_8]" class="a1_8" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a1_9']; ?>" name="step1[a1_9]" class="a1_9" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a1_10']; ?>" name="step1[a1_10]" class="a1_10" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a1_11']; ?>" name="step1[a1_11]" class="a1_11" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a1_12']; ?>" name="step1[a1_12]" class="a1_12" ></td>
        </tr>
      </tbody>
    </table>
    <div class="c_refress_blog">
      <div class="pref_ref">Pref Reference </div>
      <div class="c_overflow">
        <div class="c_ref_btn">
          <button class="btn btn-sm btn-success" type="reset"><i class="fa fa-repeat"></i>Refresh</button>
        </div>
        
        <?php foreach($uncertainty as $uncertainty_data){ ?>
        <div class="c_refress_blog_input">
            <input type="checkbox" id="<?php echo $uncertainty_data['Tempuncertainty']['id'] ;?>" name="step1[uncertainty1_val]" class="uncertainty1_val" value="<?php echo $uncertainty_data['Tempuncertainty']['id'] ;?>">
          <label><?php echo $uncertainty_data['Tempuncertainty']['tagno']; ?></label>
        </div>
          <?php } ?>
      </div>
    </div>
  </div>
  <!-- table2-->
  <div class="pos_relative">
    <table  class="table table-vcenter table-condensed table-bordered">
      <tbody class="set2_info">
        <tr class="text-center c_light_bg">
          <td class="text-center">2</td>
          <td class="text-center">Set Temperature</td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['temp2']; ?>" name="step1[temp2]" class="temp2"></td>
          <td class="text-center">Unit </td>
          <td class="text-center">
<!--            <select name="unit2" class="unit2">
              <option value="">-- Select Unit --</option>
              <option value="1" selected="selected" >°C</option>
              <option value="2">°F</option>
              <option value="3">°C</option>
              <option value="4">°F</option>
              <option value="5">Ω</option>
              <option value="6">mV</option>
              <option value="7">% rh</option>
            </select>-->
              <?php  echo $this->Form->input('step1.unit2', array('id' => 'unit2', 'class' => 'unit2','label' => false,'type' => 'select', 'options'=>$unit_list, 'value'=>$cert['Tempcertificatedata']['unit2'])); ?>
          </td>
          <td class="text-center">Resolution </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['res2']; ?>" name="step1[res2]" class="res2"></td>
          <td class="text-center">Accuracy </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['acc2']; ?>" name="step1[acc2]" class="acc2"></td>
          <td class="text-center">Count </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['count2']; ?>" name="step1[count2]" class="count2"></td>
          <td class="text-center">Uncertainty </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['uncert2']; ?>" name="step1[uncert2]" class="uncert2"></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> Master </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m2_1']; ?>" name="step1[m2_1]" class="m2_1" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m2_2']; ?>" name="step1[m2_2]" class="m2_2" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m2_3']; ?>" name="step1[m2_3]" class="m2_3" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m2_4']; ?>" name="step1[m2_4]" class="m2_4" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m2_5']; ?>" name="step1[m2_5]" class="m2_5" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m2_6']; ?>" name="step1[m2_6]" class="m2_6" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m2_7']; ?>" name="step1[m2_7]" class="m2_7" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m2_8']; ?>" name="step1[m2_8]" class="m2_8" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m2_9']; ?>" name="step1[m2_9]" class="m2_9" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m2_10']; ?>" name="step1[m2_10]" class="m2_10" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m2_11']; ?>" name="step1[m2_11]" class="m2_11" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m2_12']; ?>" name="step1[m2_12]" class="m2_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> B.Set </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b2_1']; ?>" name="step1[b2_1]" class="b2_1" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b2_2']; ?>" name="step1[b2_2]" class="b2_2" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b2_3']; ?>" name="step1[b2_3]" class="b2_3" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b2_4']; ?>" name="step1[b2_4]" class="b2_4" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b2_5']; ?>" name="step1[b2_5]" class="b2_5" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b2_6']; ?>" name="step1[b2_6]" class="b2_6" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b2_7']; ?>" name="step1[b2_7]" class="b2_7" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b2_8']; ?>" name="step1[b2_8]" class="b2_8" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b2_9']; ?>" name="step1[b2_9]" class="b2_9" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b2_10']; ?>" name="step1[b2_10]" class="b2_10" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b2_11']; ?>" name="step1[b2_11]" class="b2_11" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b2_12']; ?>" name="step1[b2_12]" class="b2_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> A.Set </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a2_1']; ?>" name="step1[a2_1]" class="a2_1" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a2_2']; ?>" name="step1[a2_2]" class="a2_2" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a2_3']; ?>" name="step1[a2_3]" class="a2_3" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a2_4']; ?>" name="step1[a2_4]" class="a2_4" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a2_5']; ?>" name="step1[a2_5]" class="a2_5" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a2_6']; ?>" name="step1[a2_6]" class="a2_6" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a2_7']; ?>" name="step1[a2_7]" class="a2_7" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a2_8']; ?>" name="step1[a2_8]" class="a2_8" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a2_9']; ?>" name="step1[a2_9]" class="a2_9" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a2_10']; ?>" name="step1[a2_10]" class="a2_10" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a2_11']; ?>" name="step1[a2_11]" class="a2_11" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a2_12']; ?>" name="step1[a2_12]" class="a2_12" ></td>
        </tr>
      </tbody>
    </table>
    <div class="c_refress_blog">
      <div class="c_overflow">
        <div class="c_ref_btn">
          <button class="btn btn-sm btn-success" type="reset"><i class="fa fa-repeat"></i>Refresh</button>
        </div>
        <?php foreach($uncertainty as $uncertainty_data){ ?>
        <div class="c_refress_blog_input">
          <input type="checkbox" id="<?php echo $uncertainty_data['Tempuncertainty']['id'] ;?>" name="step1[uncertainty2_val]" class="uncertainty2_val" value="<?php echo $uncertainty_data['Tempuncertainty']['id'] ;?>">
          <label><?php echo $uncertainty_data['Tempuncertainty']['tagno']; ?></label>
        </div>
          <?php } ?>
      </div>
    </div>
  </div>
  <!-- table3-->
  <div class="pos_relative">
    <table  class="table table-vcenter table-condensed table-bordered">
      <tbody class="set3_info">
        <tr class="text-center c_light_bg">
          <td class="text-center">3</td>
          <td class="text-center">Set Temperature</td>
          <td class="text-center"><input type="text" value="0" name="step1[temp3]" class="temp3"></td>
          <td class="text-center">Unit </td>
          <td class="text-center">
<!--              <select name="unit3]" class="unit3">
              <option value="">-- Select Unit --</option>
              <option value="1" selected="selected" >°C</option>
              <option value="2">°F</option>
              <option value="3">°C</option>
              <option value="4">°F</option>
              <option value="5">Ω</option>
              <option value="6">mV</option>
              <option value="7">% rh</option>
            </select>-->
              <?php  echo $this->Form->input('step1.unit3', array('id' => 'unit3', 'class' => 'unit3','label' => false,'type' => 'select', 'options'=>$unit_list)); ?>
          </td>
          <td class="text-center">Resolution </td>
          <td class="text-center"><input type="text" value="0" name="step1[res3]" class="res3"></td>
          <td class="text-center">Accuracy </td>
          <td class="text-center"><input type="text" value="0" name="step1[acc3]" class="acc3"></td>
          <td class="text-center">Count </td>
          <td class="text-center"><input type="text" value="0" name="step1[count3]" class="count3"></td>
          <td class="text-center">Uncertainty </td>
          <td class="text-center"><input type="text" value="0" name="step1[uncert3]" class="uncert3"></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> Master </td>
          <td class="text-center"><input type="text" value="0" name="step1[m3_1]" class="m3_1" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m3_2]" class="m3_2" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m3_3]" class="m3_3" > </td>
          <td class="text-center"><input type="text" value="0" name="step1[m3_4]" class="m3_4" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m3_5]" class="m3_5" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m3_6]" class="m3_6" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m3_7]" class="m3_7" > </td>
          <td class="text-center"><input type="text" value="0" name="step1[m3_8]" class="m3_8" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m3_9]" class="m3_9" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m3_10]" class="m3_10" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m3_11]" class="m3_11" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m3_12]" class="m3_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> B.Set </td>
          <td class="text-center"><input type="text" value="0" name="step1[b3_1]" class="b3_1" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b3_2]" class="b3_2" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b3_3]" class="b3_3" > </td>
          <td class="text-center"><input type="text" value="0" name="step1[b3_4]" class="b3_4" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b3_5]" class="b3_5" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b3_6]" class="b3_6" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b3_7]" class="b3_7" > </td>
          <td class="text-center"><input type="text" value="0" name="step1[b3_8]" class="b3_8" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b3_9]" class="b3_9" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b3_10]" class="b3_10" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b3_11]" class="b3_11" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b3_12]" class="b3_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> A.Set </td>
          <td class="text-center"><input type="text" value="0" name="step1[a3_1]" class="a3_1" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a3_2]" class="a3_2" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a3_3]" class="a3_3" > </td>
          <td class="text-center"><input type="text" value="0" name="step1[a3_4]" class="a3_4" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a3_5]" class="a3_5" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a3_6]" class="a3_6" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a3_7]" class="a3_7" > </td>
          <td class="text-center"><input type="text" value="0" name="step1[a3_8]" class="a3_8" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a3_9]" class="a3_9" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a3_10]" class="a3_10" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a3_11]" class="a3_11" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a3_12]" class="a3_12" ></td
        </tr>
      </tbody>
    </table>
    <div class="c_refress_blog">
      <div class="c_overflow">
        <div class="c_ref_btn">
          <button class="btn btn-sm btn-success" type="reset"><i class="fa fa-repeat"></i>Refresh</button>
        </div>
        <?php foreach($uncertainty as $uncertainty_data){ ?>
        <div class="c_refress_blog_input">
          <input type="checkbox" id="<?php echo $uncertainty_data['Tempuncertainty']['id'] ;?>" name="step1[uncertainty3_val]" class="uncertainty3_val" value="<?php echo $uncertainty_data['Tempuncertainty']['id'] ;?>">
          <label><?php echo $uncertainty_data['Tempuncertainty']['tagno']; ?></label>
        </div>
          <?php } ?>
      </div>
    </div>
  </div>
  
  <!-- table4-->
  <div class="pos_relative">
    <table  class="table table-vcenter table-condensed table-bordered">
      <tbody class="set4_info">
        <tr class="text-center c_light_bg">
          <td class="text-center">4</td>
          <td class="text-center">Set Temperature</td>
          <td class="text-center"><input type="text" value="0" name="step1[temp4]" class="temp4"></td>
          <td class="text-center">Unit </td>
          <td class="text-center">
<!--              <select name="unit4]" class="unit4">
              <option value="">-- Select Unit --</option>
              <option value="1" selected="selected" >°C</option>
              <option value="2">°F</option>
              <option value="3">°C</option>
              <option value="4">°F</option>
              <option value="5">Ω</option>
              <option value="6">mV</option>
              <option value="7">% rh</option>
            </select>-->
              <?php  echo $this->Form->input('step1.unit4', array('id' => 'unit4', 'class' => 'unit4','label' => false,'type' => 'select', 'options'=>$unit_list)); ?>
          </td>
          <td class="text-center">Resolution </td>
          <td class="text-center"><input type="text" value="0" name="step1[res4]" class="res4"></td>
          <td class="text-center">Accuracy </td>
          <td class="text-center"><input type="text" value="0" name="step1[acc4]" class="acc4"></td>
          <td class="text-center">Count </td>
          <td class="text-center"><input type="text" value="0" name="step1[count4]" class="count4"></td>
          <td class="text-center">Uncertainty </td>
          <td class="text-center"><input type="text" value="0" name="step1[uncert4]" class="uncert4"></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> Master </td>
          <td class="text-center"><input type="text" value="0" name="step1[m4_1]" class="m4_1" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m4_2]" class="m4_2" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m4_3]" class="m4_3" > </td>
          <td class="text-center"><input type="text" value="0" name="step1[m4_4]" class="m4_4" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m4_5]" class="m4_5" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m4_6]" class="m4_6" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m4_7]" class="m4_7" > </td>
          <td class="text-center"><input type="text" value="0" name="step1[m4_8]" class="m4_8" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m4_9]" class="m4_9" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m4_10]" class="m4_10" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m4_11]" class="m4_11" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m4_12]" class="m4_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> B.Set </td>
         <td class="text-center"><input type="text" value="0" name="step1[b4_1]" class="b4_1" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b4_2]" class="b4_2" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b4_3]" class="b4_3" > </td>
          <td class="text-center"><input type="text" value="0" name="step1[b4_4]" class="b4_4" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b4_5]" class="b4_5" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b4_6]" class="b4_6" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b4_7]" class="b4_7" > </td>
          <td class="text-center"><input type="text" value="0" name="step1[b4_8]" class="b4_8" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b4_9]" class="b4_9" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b4_10]" class="b4_10" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b4_11]" class="b4_11" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b4_12]" class="b4_12" ></t
        </tr>
        <tr class="text-center">
          <td class="text-center"> A.Set </td>
          <td class="text-center"><input type="text" value="0" name="step1[a4_1]" class="a4_1" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a4_2]" class="a4_2" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a4_3]" class="a4_3" > </td>
          <td class="text-center"><input type="text" value="0" name="step1[a4_4]" class="a4_4" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a4_5]" class="a4_5" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a4_6]" class="a4_6" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a4_7]" class="a4_7" > </td>
          <td class="text-center"><input type="text" value="0" name="step1[a4_8]" class="a4_8" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a4_9]" class="a4_9" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a4_10]" class="a4_10" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a4_11]" class="a4_11" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a4_12]" class="a4_12" ></td>
        </tr>
      </tbody>
    </table>
    <div class="c_refress_blog">
      <div class="c_overflow">
        <div class="c_ref_btn">
          <button class="btn btn-sm btn-success" type="reset"><i class="fa fa-repeat"></i>Refresh</button>
        </div>
        <?php foreach($uncertainty as $uncertainty_data){ ?>
        <div class="c_refress_blog_input">
          <input type="checkbox" id="<?php echo $uncertainty_data['Tempuncertainty']['id'] ;?>" name="step1[uncertainty4_val]" class="uncertainty4_val" value="<?php echo $uncertainty_data['Tempuncertainty']['id'] ;?>">
          <label><?php echo $uncertainty_data['Tempuncertainty']['tagno']; ?></label>
        </div>
          <?php } ?>
      </div>
    </div>
  </div>
  
  <!-- table5-->
  <div class="pos_relative">
    <table  class="table table-vcenter table-condensed table-bordered">
      <tbody class="set5_info">
        <tr class="text-center c_light_bg">
          <td class="text-center">5</td>
          <td class="text-center">Set Temperature</td>
          <td class="text-center"><input type="text" value="0" name="step1[temp5]" class="temp5"></td>
          <td class="text-center">Unit </td>
          <td class="text-center">
<!--              <select name="unit5]" class="unit5">
              <option value="">-- Select Unit --</option>
              <option value="1" selected="selected" >°C</option>
              <option value="2">°F</option>
              <option value="3">°C</option>
              <option value="4">°F</option>
              <option value="5">Ω</option>
              <option value="6">mV</option>
              <option value="7">% rh</option>
            </select>-->
              <?php  echo $this->Form->input('step1.unit5', array('id' => 'unit5', 'class' => 'unit5','label' => false,'type' => 'select', 'options'=>$unit_list)); ?>
          </td>
          <td class="text-center">Resolution </td>
          <td class="text-center"><input type="text" value="0" name="step1[res5]" class="res5"></td>
          <td class="text-center">Accuracy </td>
          <td class="text-center"><input type="text" value="0" name="step1[acc5]" class="acc5"></td>
          <td class="text-center">Count </td>
          <td class="text-center"><input type="text" value="0" name="step1[count5]" class="count5"></td>
          <td class="text-center">Uncertainty </td>
          <td class="text-center"><input type="text" value="0" name="step1[uncert5]" class="uncert5"></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> Master </td>
         <td class="text-center"><input type="text" value="0" name="step1[m5_1]" class="m5_1" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m5_2]" class="m5_2" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m5_3]" class="m5_3" > </td>
          <td class="text-center"><input type="text" value="0" name="step1[m5_4]" class="m5_4" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m5_5]" class="m5_5" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m5_6]" class="m5_6" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m5_7]" class="m5_7" > </td>
          <td class="text-center"><input type="text" value="0" name="step1[m5_8]" class="m5_8" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m5_9]" class="m5_9" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m5_10]" class="m5_10" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m5_11]" class="m5_11" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m5_12]" class="m5_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> B.Set </td>
          <td class="text-center"><input type="text" value="0" name="step1[b5_1]" class="b5_1" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b5_2]" class="b5_2" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b5_3]" class="b5_3" > </td>
          <td class="text-center"><input type="text" value="0" name="step1[b5_4]" class="b5_4" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b5_5]" class="b5_5" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b5_6]" class="b5_6" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b5_7]" class="b5_7" > </td>
          <td class="text-center"><input type="text" value="0" name="step1[b5_8]" class="b5_8" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b5_9]" class="b5_9" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b5_10]" class="b5_10" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b5_11]" class="b5_11" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b5_12]" class="b5_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> A.Set </td>
          <td class="text-center"><input type="text" value="0" name="step1[a5_1]" class="a5_1" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a5_2]" class="a5_2" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a5_3]" class="a5_3" > </td>
          <td class="text-center"><input type="text" value="0" name="step1[a5_4]" class="a5_4" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a5_5]" class="a5_5" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a5_6]" class="a5_6" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a5_7]" class="a5_7" > </td>
          <td class="text-center"><input type="text" value="0" name="step1[a5_8]" class="a5_8" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a5_9]" class="a5_9" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a5_10]" class="a5_10" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a5_11]" class="a5_11" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a5_12]" class="a5_12" ></td>
        </tr>
      </tbody>
    </table>
    <div class="c_refress_blog">
      <div class="c_overflow">
        <div class="c_ref_btn">
          <button class="btn btn-sm btn-success" type="reset"><i class="fa fa-repeat"></i>Refresh</button>
        </div>
        <?php foreach($uncertainty as $uncertainty_data){ ?>
        <div class="c_refress_blog_input">
          <input type="checkbox" id="<?php echo $uncertainty_data['Tempuncertainty']['id'] ;?>" name="step1[uncertainty5_val]" class="uncertainty5_val" value="<?php echo $uncertainty_data['Tempuncertainty']['id'] ;?>">
          <label><?php echo $uncertainty_data['Tempuncertainty']['tagno']; ?></label>
        </div>
          <?php } ?>
      </div>
    </div>
  </div>
  
  <!-- table6-->
  <div class="pos_relative">
    <table  class="table table-vcenter table-condensed table-bordered">
      <tbody class="set6_info">
        <tr class="text-center c_light_bg">
          <td class="text-center">6</td>
          <td class="text-center">Set Temperature</td>
          <td class="text-center"><input type="text" value="0" name="step1[temp6]" class="temp6"></td>
          <td class="text-center">Unit </td>
          <td class="text-center">
<!--              <select name="unit6]" class="unit6">
              <option value="">-- Select Unit --</option>
              <option value="1" selected="selected" >°C</option>
              <option value="2">°F</option>
              <option value="3">°C</option>
              <option value="4">°F</option>
              <option value="5">Ω</option>
              <option value="6">mV</option>
              <option value="7">% rh</option>
            </select>-->
              <?php  echo $this->Form->input('step1.unit6', array('id' => 'unit6', 'class' => 'unit6','label' => false,'type' => 'select', 'options'=>$unit_list)); ?>
          </td>
          <td class="text-center">Resolution </td>
          <td class="text-center"><input type="text" value="0" name="step1[res6]" class="res6"></td>
          <td class="text-center">Accuracy </td>
          <td class="text-center"><input type="text" value="0" name="step1[acc6]" class="acc6"></td>
          <td class="text-center">Count </td>
          <td class="text-center"><input type="text" value="0" name="step1[count6]" class="count6"></td>
          <td class="text-center">Uncertainty </td>
          <td class="text-center"><input type="text" value="0" name="step1[uncert6]" class="uncert6"></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> Master </td>
          <td class="text-center"><input type="text" value="0" name="step1[m6_1]" class="m6_1" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m6_2]" class="m6_2" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m6_3]" class="m6_3" > </td>
          <td class="text-center"><input type="text" value="0" name="step1[m6_4]" class="m6_4" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m6_5]" class="m6_5" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m6_6]" class="m6_6" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m6_7]" class="m6_7" > </td>
          <td class="text-center"><input type="text" value="0" name="step1[m6_8]" class="m6_8" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m6_9]" class="m6_9" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m6_10]" class="m6_10" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m6_11]" class="m6_11" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m6_12]" class="m6_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> B.Set </td>
         <td class="text-center"><input type="text" value="0" name="step1[m6_1]" class="m6_1" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m6_2]" class="m6_2" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m6_3]" class="m6_3" > </td>
          <td class="text-center"><input type="text" value="0" name="step1[m6_4]" class="m6_4" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m6_5]" class="m6_5" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m6_6]" class="m6_6" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m6_7]" class="m6_7" > </td>
          <td class="text-center"><input type="text" value="0" name="step1[m6_8]" class="m6_8" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m6_9]" class="m6_9" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m6_10]" class="m6_10" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m6_11]" class="m6_11" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m6_12]" class="m6_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> A.Set </td>
          <td class="text-center"><input type="text" value="0" name="step1[a6_1]" class="a6_1" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a6_2]" class="a6_2" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a6_3]" class="a6_3" > </td>
          <td class="text-center"><input type="text" value="0" name="step1[a6_4]" class="a6_4" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a6_5]" class="a6_5" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a6_6]" class="a6_6" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a6_7]" class="a6_7" > </td>
          <td class="text-center"><input type="text" value="0" name="step1[a6_8]" class="a6_8" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a6_9]" class="a6_9" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a6_10]" class="a6_10" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a6_11]" class="a6_11" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a6_12]" class="a6_12" ></td>
        </tr>
      </tbody>
    </table>
    <div class="c_refress_blog">
      <div class="c_overflow">
        <div class="c_ref_btn">
          <button class="btn btn-sm btn-success" type="reset"><i class="fa fa-repeat"></i>Refresh</button>
        </div>
        <?php foreach($uncertainty as $uncertainty_data){ ?>
        <div class="c_refress_blog_input">
          <input type="checkbox" id="<?php echo $uncertainty_data['Tempuncertainty']['id'] ;?>" name="step1[uncertainty6_val]" class="uncertainty6_val" value="<?php echo $uncertainty_data['Tempuncertainty']['id'] ;?>">
          <label><?php echo $uncertainty_data['Tempuncertainty']['tagno']; ?></label>
        </div>
          <?php } ?>
      </div>
    </div>
  </div>
  
  <!-- table7-->
  <div class="pos_relative">
    <table  class="table table-vcenter table-condensed table-bordered">
      <tbody class="set7_info">
        <tr class="text-center c_light_bg">
          <td class="text-center">7</td>
          <td class="text-center">Set Temperature</td>
          <td class="text-center"><input type="text" value="0" name="step1[temp7]" class="temp7"></td>
          <td class="text-center">Unit </td>
          <td class="text-center">
<!--              <select name="unit7]" class="unit7">
              <option value="">-- Select Unit --</option>
              <option value="1" selected="selected" >°C</option>
              <option value="2">°F</option>
              <option value="3">°C</option>
              <option value="4">°F</option>
              <option value="5">Ω</option>
              <option value="6">mV</option>
              <option value="7">% rh</option>
            </select>-->
              <?php  echo $this->Form->input('step1.unit7', array('id' => 'unit7', 'class' => 'unit7','label' => false,'type' => 'select', 'options'=>$unit_list)); ?>
          </td>
          <td class="text-center">Resolution </td>
          <td class="text-center"><input type="text" value="0" name="step1[res7]" class="res7"></td>
          <td class="text-center">Accuracy </td>
          <td class="text-center"><input type="text" value="0" name="step1[acc7]" class="acc7"></td>
          <td class="text-center">Count </td>
          <td class="text-center"><input type="text" value="0" name="step1[count7]" class="count7"></td>
          <td class="text-center">Uncertainty </td>
          <td class="text-center"><input type="text" value="0" name="step1[uncert7]" class="uncert7"></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> Master </td>
          <td class="text-center"><input type="text" value="0" name="step1[m7_1]" class="m7_1" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m7_2]" class="m7_2" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m7_3]" class="m7_3" > </td>
          <td class="text-center"><input type="text" value="0" name="step1[m7_4]" class="m7_4" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m7_5]" class="m7_5" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m7_6]" class="m7_6" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m7_7]" class="m7_7" > </td>
          <td class="text-center"><input type="text" value="0" name="step1[m7_8]" class="m7_8" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m7_9]" class="m7_9" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m7_10]" class="m7_10" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m7_11]" class="m7_11" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m7_12]" class="m7_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> B.Set </td>
          <td class="text-center"><input type="text" value="0" name="step1[b7_1]" class="b7_1" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b7_2]" class="b7_2" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b7_3]" class="b7_3" > </td>
          <td class="text-center"><input type="text" value="0" name="step1[b7_4]" class="b7_4" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b7_5]" class="b7_5" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b7_6]" class="b7_6" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b7_7]" class="b7_7" > </td>
          <td class="text-center"><input type="text" value="0" name="step1[b7_8]" class="b7_8" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b7_9]" class="b7_9" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b7_10]" class="b7_10" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b7_11]" class="b7_11" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b7_12]" class="b7_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> A.Set </td>
         <td class="text-center"><input type="text" value="0" name="step1[a7_1]" class="a7_1" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a7_2]" class="a7_2" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a7_3]" class="a7_3" > </td>
          <td class="text-center"><input type="text" value="0" name="step1[a7_4]" class="a7_4" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a7_5]" class="a7_5" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a7_6]" class="a7_6" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a7_7]" class="a7_7" > </td>
          <td class="text-center"><input type="text" value="0" name="step1[a7_8]" class="a7_8" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a7_9]" class="a7_9" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a7_10]" class="a7_10" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a7_11]" class="a7_11" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a7_12]" class="a7_12" ></td
        </tr>
      </tbody>
    </table>
    <div class="c_refress_blog">
      <div class="c_overflow">
        <div class="c_ref_btn">
          <button class="btn btn-sm btn-success" type="reset"><i class="fa fa-repeat"></i>Refresh</button>
        </div>
        <?php foreach($uncertainty as $uncertainty_data){ ?>
        <div class="c_refress_blog_input">
          <input type="checkbox" id="<?php echo $uncertainty_data['Tempuncertainty']['id'] ;?>" name="step1[uncertainty7_val]" class="uncertainty7_val" value="<?php echo $uncertainty_data['Tempuncertainty']['id'] ;?>">
          <label><?php echo $uncertainty_data['Tempuncertainty']['tagno']; ?></label>
        </div>
          <?php } ?>
      </div>
    </div>
  </div>
  
  <!-- table8-->
  <div class="pos_relative">
    <table  class="table table-vcenter table-condensed table-bordered">
      <tbody class="set8_info">
        <tr class="text-center c_light_bg">
          <td class="text-center">8</td>
          <td class="text-center">Set Temperature</td>
          <td class="text-center"><input type="text" value="0" name="step1[temp8]" class="temp8"></td>
          <td class="text-center">Unit </td>
          <td class="text-center">
<!--              <select name="unit8]" class="unit8">
              <option value="">-- Select Unit --</option>
              <option value="1" selected="selected" >°C</option>
              <option value="2">°F</option>
              <option value="3">°C</option>
              <option value="4">°F</option>
              <option value="5">Ω</option>
              <option value="6">mV</option>
              <option value="7">% rh</option>
            </select>-->
              <?php  echo $this->Form->input('step1.unit8', array('id' => 'unit8', 'class' => 'unit8','label' => false,'type' => 'select', 'options'=>$unit_list)); ?>
          </td>
          <td class="text-center">Resolution </td>
          <td class="text-center"><input type="text" value="0" name="step1[res8]" class="res8"></td>
          <td class="text-center">Accuracy </td>
          <td class="text-center"><input type="text" value="0" name="step1[acc8]" class="acc8"></td>
          <td class="text-center">Count </td>
          <td class="text-center"><input type="text" value="0" name="step1[count8]" class="count8"></td>
          <td class="text-center">Uncertainty </td>
          <td class="text-center"><input type="text" value="0" name="step1[uncert8]" class="uncert8"></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> Master </td>
          <td class="text-center"><input type="text" value="0" name="step1[m8_1]" class="m8_1" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m8_2]" class="m8_2" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m8_3]" class="m8_3" > </td>
          <td class="text-center"><input type="text" value="0" name="step1[m8_4]" class="m8_4" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m8_5]" class="m8_5" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m8_6]" class="m8_6" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m8_7]" class="m8_7" > </td>
          <td class="text-center"><input type="text" value="0" name="step1[m8_8]" class="m8_8" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m8_9]" class="m8_9" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m8_10]" class="m8_10" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m8_11]" class="m8_11" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m8_12]" class="m8_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> B.Set </td>
          <td class="text-center"><input type="text" value="0" name="step1[b8_1]" class="b8_1" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b8_2]" class="b8_2" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b8_3]" class="b8_3" > </td>
          <td class="text-center"><input type="text" value="0" name="step1[b8_4]" class="b8_4" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b8_5]" class="b8_5" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b8_6]" class="b8_6" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b8_7]" class="b8_7" > </td>
          <td class="text-center"><input type="text" value="0" name="step1[b8_8]" class="b8_8" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b8_9]" class="b8_9" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b8_10]" class="b8_10" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b8_11]" class="b8_11" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b8_12]" class="b8_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> A.Set </td>
          <td class="text-center"><input type="text" value="0" name="step1[a8_1]" class="a8_1" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a8_2]" class="a8_2" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a8_3]" class="a8_3" > </td>
          <td class="text-center"><input type="text" value="0" name="step1[a8_4]" class="a8_4" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a8_5]" class="a8_5" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a8_6]" class="a8_6" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a8_7]" class="a8_7" > </td>
          <td class="text-center"><input type="text" value="0" name="step1[a8_8]" class="a8_8" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a8_9]" class="a8_9" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a8_10]" class="a8_10" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a8_11]" class="a8_11" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a8_12]" class="a8_12" ></td>
        </tr>
      </tbody>
    </table>
    <div class="c_refress_blog">
      <div class="c_overflow">
        <div class="c_ref_btn">
          <button class="btn btn-sm btn-success" type="reset"><i class="fa fa-repeat"></i>Refresh</button>
        </div>
        <?php foreach($uncertainty as $uncertainty_data){ ?>
        <div class="c_refress_blog_input">
          <input type="checkbox" id="<?php echo $uncertainty_data['Tempuncertainty']['id'] ;?>" name="step1[uncertainty8_val]" class="uncertainty8_val" value="<?php echo $uncertainty_data['Tempuncertainty']['id'] ;?>">
          <label><?php echo $uncertainty_data['Tempuncertainty']['tagno']; ?></label>
        </div>
          <?php } ?>
      </div>
    </div>
  </div>
  
  <!-- table9-->
  <div class="pos_relative">
    <table  class="table table-vcenter table-condensed table-bordered">
      <tbody class="set9_info">
        <tr class="text-center c_light_bg">
          <td class="text-center">9</td>
          <td class="text-center">Set Temperature</td>
          <td class="text-center"><input type="text" value="0" name="step1[temp9]" class="temp9"></td>
          <td class="text-center">Unit </td>
          <td class="text-center">
<!--              <select name="unit9]" class="unit9">
              <option value="">-- Select Unit --</option>
              <option value="1" selected="selected" >°C</option>
              <option value="2">°F</option>
              <option value="3">°C</option>
              <option value="4">°F</option>
              <option value="5">Ω</option>
              <option value="6">mV</option>
              <option value="7">% rh</option>
            </select>-->
              <?php  echo $this->Form->input('step1.unit9', array('id' => 'unit9', 'class' => 'unit9','label' => false,'type' => 'select', 'options'=>$unit_list)); ?>
          </td>
          <td class="text-center">Resolution </td>
          <td class="text-center"><input type="text" value="0" name="step1[res9]" class="res9"></td>
          <td class="text-center">Accuracy </td>
          <td class="text-center"><input type="text" value="0" name="step1[acc9]" class="acc9"></td>
          <td class="text-center">Count </td>
          <td class="text-center"><input type="text" value="0" name="step1[count9]" class="count9"></td>
          <td class="text-center">Uncertainty </td>
          <td class="text-center"><input type="text" value="0" name="step1[uncert9]" class="uncert9"></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> Master </td>
          <td class="text-center"><input type="text" value="0" name="step1[m9_1]" class="m9_1" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m9_2]" class="m9_2" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m9_3]" class="m9_3" > </td>
          <td class="text-center"><input type="text" value="0" name="step1[m9_4]" class="m9_4" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m9_5]" class="m9_5" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m9_6]" class="m9_6" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m9_7]" class="m9_7" > </td>
          <td class="text-center"><input type="text" value="0" name="step1[m9_8]" class="m9_8" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m9_9]" class="m9_9" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m9_10]" class="m9_10" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m9_11]" class="m9_11" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m9_12]" class="m9_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> B.Set </td>
          <td class="text-center"><input type="text" value="0" name="step1[b9_1]" class="b9_1" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b9_2]" class="b9_2" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b9_3]" class="b9_3" > </td>
          <td class="text-center"><input type="text" value="0" name="step1[b9_4]" class="b9_4" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b9_5]" class="b9_5" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b9_6]" class="b9_6" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b9_7]" class="b9_7" > </td>
          <td class="text-center"><input type="text" value="0" name="step1[b9_8]" class="b9_8" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b9_9]" class="b9_9" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b9_10]" class="b9_10" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b9_11]" class="b9_11" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b9_12]" class="b9_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> A.Set </td>
          <td class="text-center"><input type="text" value="0" name="step1[a9_1]" class="a9_1" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a9_2]" class="a9_2" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a9_3]" class="a9_3" > </td>
          <td class="text-center"><input type="text" value="0" name="step1[a9_4]" class="a9_4" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a9_5]" class="a9_5" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a9_6]" class="a9_6" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a9_7]" class="a9_7" > </td>
          <td class="text-center"><input type="text" value="0" name="step1[a9_8]" class="a9_8" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a9_9]" class="a9_9" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a9_10]" class="a9_10" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a9_11]" class="a9_11" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a9_12]" class="a9_12" ></td>
        </tr>
      </tbody>
    </table>
    <div class="c_refress_blog">
      <div class="c_overflow">
        <div class="c_ref_btn">
          <button class="btn btn-sm btn-success" type="reset"><i class="fa fa-repeat"></i>Refresh</button>
        </div>
        <?php foreach($uncertainty as $uncertainty_data){ ?>
        <div class="c_refress_blog_input">
          <input type="checkbox" id="<?php echo $uncertainty_data['Tempuncertainty']['id'] ;?>" name="step1[uncertainty9_val]" class="uncertainty9_val" value="<?php echo $uncertainty_data['Tempuncertainty']['id'] ;?>">
          <label><?php echo $uncertainty_data['Tempuncertainty']['tagno']; ?></label>
        </div>
          <?php } ?>
      </div>
    </div>
  </div>
  
  <!-- table10-->
  <div class="pos_relative">
    <table  class="table table-vcenter table-condensed table-bordered">
      <tbody class="set10_info">
        <tr class="text-center c_light_bg">
          <td class="text-center">10</td>
          <td class="text-center">Set Temperature</td>
          <td class="text-center"><input type="text" value="0" name="step1[temp10]" class="temp10"></td>
          <td class="text-center">Unit </td>
          <td class="text-center">
<!--              <select name="unit10]" class="unit10">
              <option value="">-- Select Unit --</option>
              <option value="1" selected="selected" >°C</option>
              <option value="2">°F</option>
              <option value="3">°C</option>
              <option value="4">°F</option>
              <option value="5">Ω</option>
              <option value="6">mV</option>
              <option value="7">% rh</option>
            </select>-->
              <?php  echo $this->Form->input('step1.unit10', array('id' => 'unit10', 'class' => 'unit10','label' => false,'type' => 'select', 'options'=>$unit_list)); ?>
          </td>
          <td class="text-center">Resolution </td>
          <td class="text-center"><input type="text" value="0" name="step1[res10]" class="res10"></td>
          <td class="text-center">Accuracy </td>
          <td class="text-center"><input type="text" value="0" name="step1[acc10]" class="acc10"></td>
          <td class="text-center">Count </td>
          <td class="text-center"><input type="text" value="0" name="step1[count10]" class="count10"></td>
          <td class="text-center">Uncertainty </td>
          <td class="text-center"><input type="text" value="0" name="step1[uncert10]" class="uncert10"></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> Master </td>
          <td class="text-center"><input type="text" value="0" name="step1[m10_1]" class="m10_1" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m10_2]" class="m10_2" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m10_3]" class="m10_3" > </td>
          <td class="text-center"><input type="text" value="0" name="step1[m10_4]" class="m10_4" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m10_5]" class="m10_5" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m10_6]" class="m10_6" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m10_7]" class="m10_7" > </td>
          <td class="text-center"><input type="text" value="0" name="step1[m10_8]" class="m10_8" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m10_9]" class="m10_9" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m10_10]" class="m10_10" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m10_11]" class="m10_11" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m10_12]" class="m10_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> B.Set </td>
          <td class="text-center"><input type="text" value="0" name="step1[b10_1]" class="b10_1" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b10_2]" class="b10_2" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b10_3]" class="b10_3" > </td>
          <td class="text-center"><input type="text" value="0" name="step1[b10_4]" class="b10_4" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b10_5]" class="b10_5" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b10_6]" class="b10_6" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b10_7]" class="b10_7" > </td>
          <td class="text-center"><input type="text" value="0" name="step1[b10_8]" class="b10_8" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b10_9]" class="b10_9" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b10_10]" class="b10_10" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b10_11]" class="b10_11" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b10_12]" class="b10_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> A.Set </td>
          <td class="text-center"><input type="text" value="0" name="step1[a10_1]" class="a10_1" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a10_2]" class="a10_2" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a10_3]" class="a10_3" > </td>
          <td class="text-center"><input type="text" value="0" name="step1[a10_4]" class="a10_4" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a10_5]" class="a10_5" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a10_6]" class="a10_6" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a10_7]" class="a10_7" > </td>
          <td class="text-center"><input type="text" value="0" name="step1[a10_8]" class="a10_8" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a10_9]" class="a10_9" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a10_10]" class="a10_10" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a10_11]" class="a10_11" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a10_12]" class="a10_12" ></td>
        </tr>
      </tbody>
    </table>
    <div class="c_refress_blog">
      <div class="c_overflow">
        <div class="c_ref_btn">
          <button class="btn btn-sm btn-success" type="reset"><i class="fa fa-repeat"></i>Refresh</button>
        </div>
        <?php foreach($uncertainty as $uncertainty_data){ ?>
        <div class="c_refress_blog_input">
          <input type="checkbox" id="<?php echo $uncertainty_data['Tempuncertainty']['id'] ;?>" name="step1[uncertainty10_val]" class="uncertainty10_val" value="<?php echo $uncertainty_data['Tempuncertainty']['id'] ;?>">
          <label><?php echo $uncertainty_data['Tempuncertainty']['tagno']; ?></label>
        </div>
          <?php } ?>
      </div>
    </div>
  </div>
  
  <!-- table11-->
  <div class="pos_relative">
    <table  class="table table-vcenter table-condensed table-bordered">
      <tbody class="set11_info">
        <tr class="text-center c_light_bg">
          <td class="text-center">11</td>
          <td class="text-center">Set Temperature</td>
          <td class="text-center"><input type="text" value="0" name="step1[temp11]" class="temp11"></td>
          <td class="text-center">Unit </td>
          <td class="text-center">
<!--              <select name="unit11]" class="unit11">
              <option value="">-- Select Unit --</option>
              <option value="1" selected="selected" >°C</option>
              <option value="2">°F</option>
              <option value="3">°C</option>
              <option value="4">°F</option>
              <option value="5">Ω</option>
              <option value="6">mV</option>
              <option value="7">% rh</option>
            </select>-->
              <?php  echo $this->Form->input('step1.unit11', array('id' => 'unit11', 'class' => 'unit11','label' => false,'type' => 'select', 'options'=>$unit_list)); ?>
          </td>
          <td class="text-center">Resolution </td>
          <td class="text-center"><input type="text" value="0" name="step1[res11]" class="res11"></td>
          <td class="text-center">Accuracy </td>
          <td class="text-center"><input type="text" value="0" name="step1[acc11]" class="acc11"></td>
          <td class="text-center">Count </td>
          <td class="text-center"><input type="text" value="0" name="step1[count11]" class="count11"></td>
          <td class="text-center">Uncertainty </td>
          <td class="text-center"><input type="text" value="0" name="step1[uncert11]" class="uncert11"></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> Master </td>
          <td class="text-center"><input type="text" value="0" name="step1[m11_1]" class="m11_1" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m11_2]" class="m11_2" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m11_3]" class="m11_3" > </td>
          <td class="text-center"><input type="text" value="0" name="step1[m11_4]" class="m11_4" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m11_5]" class="m11_5" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m11_6]" class="m11_6" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m11_7]" class="m11_7" > </td>
          <td class="text-center"><input type="text" value="0" name="step1[m11_8]" class="m11_8" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m11_9]" class="m11_9" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m11_10]" class="m11_10" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m11_11]" class="m11_11" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m11_12]" class="m11_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> B.Set </td>
          <td class="text-center"><input type="text" value="0" name="step1[b11_1]" class="b11_1" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b11_2]" class="b11_2" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b11_3]" class="b11_3" > </td>
          <td class="text-center"><input type="text" value="0" name="step1[b11_4]" class="b11_4" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b11_5]" class="b11_5" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b11_6]" class="b11_6" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b11_7]" class="b11_7" > </td>
          <td class="text-center"><input type="text" value="0" name="step1[b11_8]" class="b11_8" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b11_9]" class="b11_9" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b11_10]" class="b11_10" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b11_11]" class="b11_11" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b11_12]" class="b11_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> A.Set </td>
          <td class="text-center"><input type="text" value="0" name="step1[a11_1]" class="a11_1" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a11_2]" class="a11_2" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a11_3]" class="a11_3" > </td>
          <td class="text-center"><input type="text" value="0" name="step1[a11_4]" class="a11_4" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a11_5]" class="a11_5" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a11_6]" class="a11_6" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a11_7]" class="a11_7" > </td>
          <td class="text-center"><input type="text" value="0" name="step1[a11_8]" class="a11_8" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a11_9]" class="a11_9" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a11_10]" class="a11_10" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a11_11]" class="a11_11" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a11_12]" class="a11_12" ></td>
        </tr>
      </tbody>
    </table>
    <div class="c_refress_blog">
      <div class="c_overflow">
        <div class="c_ref_btn">
          <button class="btn btn-sm btn-success" type="reset"><i class="fa fa-repeat"></i>Refresh</button>
        </div>
        <?php foreach($uncertainty as $uncertainty_data){ ?>
        <div class="c_refress_blog_input">
          <input type="checkbox" id="<?php echo $uncertainty_data['Tempuncertainty']['id'] ;?>" name="step1[uncertainty11_val]" class="uncertainty11_val" value="<?php echo $uncertainty_data['Tempuncertainty']['id'] ;?>">
          <label><?php echo $uncertainty_data['Tempuncertainty']['tagno']; ?></label>
        </div>
          <?php } ?>
      </div>
    </div>
  </div>
  
  <!-- table12-->
  <div class="pos_relative">
    <table  class="table table-vcenter table-condensed table-bordered">
      <tbody class="set12_info">
        <tr class="text-center c_light_bg">
          <td class="text-center">12</td>
          <td class="text-center">Set Temperature</td>
          <td class="text-center"><input type="text" value="0" name="step1[temp12]" class="temp12"></td>
          <td class="text-center">Unit </td>
          <td class="text-center">
<!--              <select name="unit12]" class="unit12">
              <option value="">-- Select Unit --</option>
              <option value="1" selected="selected" >°C</option>
              <option value="2">°F</option>
              <option value="3">°C</option>
              <option value="4">°F</option>
              <option value="5">Ω</option>
              <option value="6">mV</option>
              <option value="7">% rh</option>
            </select>-->
              <?php  echo $this->Form->input('step1.unit12', array('id' => 'unit12', 'class' => 'unit12','label' => false,'type' => 'select', 'options'=>$unit_list)); ?>
          </td>
          <td class="text-center">Resolution </td>
          <td class="text-center"><input type="text" value="0" name="step1[res12]" class="res12"></td>
          <td class="text-center">Accuracy </td>
          <td class="text-center"><input type="text" value="0" name="step1[acc12]" class="acc12"></td>
          <td class="text-center">Count </td>
          <td class="text-center"><input type="text" value="0" name="step1[count12]" class="count12"></td>
          <td class="text-center">Uncertainty </td>
          <td class="text-center"><input type="text" value="0" name="step1[uncert12]" class="uncert12"></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> Master </td>
          <td class="text-center"><input type="text" value="0" name="step1[m12_1]" class="m12_1" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m12_2]" class="m12_2" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m12_3]" class="m12_3" > </td>
          <td class="text-center"><input type="text" value="0" name="step1[m12_4]" class="m12_4" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m12_5]" class="m12_5" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m12_6]" class="m12_6" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m12_7]" class="m12_7" > </td>
          <td class="text-center"><input type="text" value="0" name="step1[m12_8]" class="m12_8" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m12_9]" class="m12_9" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m12_10]" class="m12_10" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m12_11]" class="m12_11" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m12_12]" class="m12_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> B.Set </td>
          <td class="text-center"><input type="text" value="0" name="step1[b12_1]" class="b12_1" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b12_2]" class="b12_2" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b12_3]" class="b12_3" > </td>
          <td class="text-center"><input type="text" value="0" name="step1[b12_4]" class="b12_4" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b12_5]" class="b12_5" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b12_6]" class="b12_6" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b12_7]" class="b12_7" > </td>
          <td class="text-center"><input type="text" value="0" name="step1[b12_8]" class="b12_8" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b12_9]" class="b12_9" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b12_10]" class="b12_10" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b12_11]" class="b12_11" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b12_12]" class="b12_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> A.Set </td>
          <td class="text-center"><input type="text" value="0" name="step1[a12_1]" class="a12_1" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a12_2]" class="a12_2" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a12_3]" class="a12_3" > </td>
          <td class="text-center"><input type="text" value="0" name="step1[a12_4]" class="a12_4" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a12_5]" class="a12_5" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a12_6]" class="a12_6" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a12_7]" class="a12_7" > </td>
          <td class="text-center"><input type="text" value="0" name="step1[a12_8]" class="a12_8" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a12_9]" class="a12_9" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a12_10]" class="a12_10" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a12_11]" class="a12_11" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a12_12]" class="a12_12" ></td>
        </tr>
      </tbody>
    </table>
    <div class="c_refress_blog">
      <div class="c_overflow">
        <div class="c_ref_btn">
          <button class="btn btn-sm btn-success" type="reset"><i class="fa fa-repeat"></i>Refresh</button>
        </div>
        <?php foreach($uncertainty as $uncertainty_data){ ?>
        <div class="c_refress_blog_input">
          <input type="checkbox" id="<?php echo $uncertainty_data['Tempuncertainty']['id'] ;?>" name="step1[uncertainty12_val]" class="uncertainty12_val" value="<?php echo $uncertainty_data['Tempuncertainty']['id'] ;?>">
          <label><?php echo $uncertainty_data['Tempuncertainty']['tagno']; ?></label>
        </div>
          <?php } ?>
      </div>
    </div>
  </div>
  
  <!-- table13-->
  <div class="pos_relative">
    <table  class="table table-vcenter table-condensed table-bordered">
      <tbody class="set13_info">
        <tr class="text-center c_light_bg">
          <td class="text-center">13</td>
          <td class="text-center">Set Temperature</td>
          <td class="text-center"><input type="text" value="0" name="step1[temp13]" class="temp13"></td>
          <td class="text-center">Unit </td>
          <td class="text-center">
<!--              <select name="unit13]" class="unit13">
              <option value="">-- Select Unit --</option>
              <option value="1" selected="selected" >°C</option>
              <option value="2">°F</option>
              <option value="3">°C</option>
              <option value="4">°F</option>
              <option value="5">Ω</option>
              <option value="6">mV</option>
              <option value="7">% rh</option>
            </select>-->
              <?php  echo $this->Form->input('step1.unit13', array('id' => 'unit13', 'class' => 'unit13','label' => false,'type' => 'select', 'options'=>$unit_list)); ?>
          </td>
          <td class="text-center">Resolution </td>
          <td class="text-center"><input type="text" value="0" name="step1[res13]" class="res13"></td>
          <td class="text-center">Accuracy </td>
          <td class="text-center"><input type="text" value="0" name="step1[acc13]" class="acc13"></td>
          <td class="text-center">Count </td>
          <td class="text-center"><input type="text" value="0" name="step1[count13]" class="count13"></td>
          <td class="text-center">Uncertainty </td>
          <td class="text-center"><input type="text" value="0" name="step1[uncert13]" class="uncert13"></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> Master </td>
          <td class="text-center"><input type="text" value="0" name="step1[m13_1]" class="m13_1" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m13_2]" class="m13_2" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m13_3]" class="m13_3" > </td>
          <td class="text-center"><input type="text" value="0" name="step1[m13_4]" class="m13_4" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m13_5]" class="m13_5" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m13_6]" class="m13_6" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m13_7]" class="m13_7" > </td>
          <td class="text-center"><input type="text" value="0" name="step1[m13_8]" class="m13_8" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m13_9]" class="m13_9" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m13_10]" class="m13_10" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m13_11]" class="m13_11" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m13_12]" class="m13_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> B.Set </td>
          <td class="text-center"><input type="text" value="0" name="step1[b13_1]" class="b13_1" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b13_2]" class="b13_2" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b13_3]" class="b13_3" > </td>
          <td class="text-center"><input type="text" value="0" name="step1[b13_4]" class="b13_4" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b13_5]" class="b13_5" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b13_6]" class="b13_6" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b13_7]" class="b13_7" > </td>
          <td class="text-center"><input type="text" value="0" name="step1[b13_8]" class="b13_8" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b13_9]" class="b13_9" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b13_10]" class="b13_10" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b13_11]" class="b13_11" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b13_12]" class="b13_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> A.Set </td>
         <td class="text-center"><input type="text" value="0" name="step1[a13_1]" class="a13_1" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a13_2]" class="a13_2" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a13_3]" class="a13_3" > </td>
          <td class="text-center"><input type="text" value="0" name="step1[a13_4]" class="a13_4" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a13_5]" class="a13_5" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a13_6]" class="a13_6" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a13_7]" class="a13_7" > </td>
          <td class="text-center"><input type="text" value="0" name="step1[a13_8]" class="a13_8" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a13_9]" class="a13_9" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a13_10]" class="a13_10" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a13_11]" class="a13_11" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a13_12]" class="a13_12" ></td>
        </tr>
      </tbody>
    </table>
    <div class="c_refress_blog">
      <div class="c_overflow">
        <div class="c_ref_btn">
          <button class="btn btn-sm btn-success" type="reset"><i class="fa fa-repeat"></i>Refresh</button>
        </div>
        <?php foreach($uncertainty as $uncertainty_data){ ?>
        <div class="c_refress_blog_input">
          <input type="checkbox" id="<?php echo $uncertainty_data['Tempuncertainty']['id'] ;?>" name="step1[uncertainty13_val]" class="uncertainty13_val" value="<?php echo $uncertainty_data['Tempuncertainty']['id'] ;?>">
          <label><?php echo $uncertainty_data['Tempuncertainty']['tagno']; ?></label>
        </div>
          <?php } ?>
      </div>
    </div>
  </div>
  
  <!-- table14-->
  <div class="pos_relative">
    <table  class="table table-vcenter table-condensed table-bordered">
      <tbody class="set14_info">
        <tr class="text-center c_light_bg">
          <td class="text-center">14</td>
          <td class="text-center">Set Temperature</td>
          <td class="text-center"><input type="text" value="0" name="step1[temp14]" class="temp14"></td>
          <td class="text-center">Unit </td>
          <td class="text-center">
<!--              <select name="unit14]" class="unit14">
              <option value="">-- Select Unit --</option>
              <option value="1" selected="selected" >°C</option>
              <option value="2">°F</option>
              <option value="3">°C</option>
              <option value="4">°F</option>
              <option value="5">Ω</option>
              <option value="6">mV</option>
              <option value="7">% rh</option>
            </select>-->
              <?php  echo $this->Form->input('step1.unit14', array('id' => 'unit14', 'class' => 'unit14','label' => false,'type' => 'select', 'options'=>$unit_list)); ?>
          </td>
          <td class="text-center">Resolution </td>
          <td class="text-center"><input type="text" value="0" name="step1[res14]" class="res14"></td>
          <td class="text-center">Accuracy </td>
          <td class="text-center"><input type="text" value="0" name="step1[acc14]" class="acc14"></td>
          <td class="text-center">Count </td>
          <td class="text-center"><input type="text" value="0" name="step1[count14]" class="count14"></td>
          <td class="text-center">Uncertainty </td>
          <td class="text-center"><input type="text" value="0" name="step1[uncert14]" class="uncert14"></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> Master </td>
          <td class="text-center"><input type="text" value="0" name="step1[m14_1]" class="m14_1" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m14_2]" class="m14_2" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m14_3]" class="m14_3" > </td>
          <td class="text-center"><input type="text" value="0" name="step1[m14_4]" class="m14_4" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m14_5]" class="m14_5" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m14_6]" class="m14_6" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m14_7]" class="m14_7" > </td>
          <td class="text-center"><input type="text" value="0" name="step1[m14_8]" class="m14_8" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m14_9]" class="m14_9" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m14_10]" class="m14_10" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m14_11]" class="m14_11" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m14_12]" class="m14_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> B.Set </td>
          <td class="text-center"><input type="text" value="0" name="step1[b14_1]" class="b14_1" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b14_2]" class="b14_2" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b14_3]" class="b14_3" > </td>
          <td class="text-center"><input type="text" value="0" name="step1[b14_4]" class="b14_4" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b14_5]" class="b14_5" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b14_6]" class="b14_6" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b14_7]" class="b14_7" > </td>
          <td class="text-center"><input type="text" value="0" name="step1[b14_8]" class="b14_8" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b14_9]" class="b14_9" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b14_10]" class="b14_10" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b14_11]" class="b14_11" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b14_12]" class="b14_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> A.Set </td>
          <td class="text-center"><input type="text" value="0" name="step1[a14_1]" class="a14_1" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a14_2]" class="a14_2" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a14_3]" class="a14_3" > </td>
          <td class="text-center"><input type="text" value="0" name="step1[a14_4]" class="a14_4" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a14_5]" class="a14_5" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a14_6]" class="a14_6" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a14_7]" class="a14_7" > </td>
          <td class="text-center"><input type="text" value="0" name="step1[a14_8]" class="a14_8" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a14_9]" class="a14_9" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a14_10]" class="a14_10" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a14_11]" class="a14_11" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a14_12]" class="a14_12" ></td>
        </tr>
      </tbody>
    </table>
    <div class="c_refress_blog">
      <div class="c_overflow">
        <div class="c_ref_btn">
          <button class="btn btn-sm btn-success" type="reset"><i class="fa fa-repeat"></i>Refresh</button>
        </div>
        <?php foreach($uncertainty as $uncertainty_data){ ?>
        <div class="c_refress_blog_input">
          <input type="checkbox" id="<?php echo $uncertainty_data['Tempuncertainty']['id'] ;?>" name="step1[uncertainty14_val]" class="uncertainty14_val" value="<?php echo $uncertainty_data['Tempuncertainty']['id'] ;?>">
          <label><?php echo $uncertainty_data['Tempuncertainty']['tagno']; ?></label>
        </div>
          <?php } ?>
      </div>
    </div>
  </div>
  
  <!-- table15-->
  <div class="pos_relative">
    <table  class="table table-vcenter table-condensed table-bordered">
      <tbody class="set15_info">
        <tr class="text-center c_light_bg">
          <td class="text-center">15</td>
          <td class="text-center">Set Temperature</td>
          <td class="text-center"><input type="text" value="0" name="step1[temp15]" class="temp15"></td>
          <td class="text-center">Unit </td>
          <td class="text-center">
<!--              <select name="unit15]" class="unit15">
              <option value="">-- Select Unit --</option>
              <option value="1" selected="selected" >°C</option>
              <option value="2">°F</option>
              <option value="3">°C</option>
              <option value="4">°F</option>
              <option value="5">Ω</option>
              <option value="6">mV</option>
              <option value="7">% rh</option>
            </select>-->
              <?php  echo $this->Form->input('step1.unit15', array('id' => 'unit15', 'class' => 'unit15','label' => false,'type' => 'select', 'options'=>$unit_list)); ?>
          </td>
          <td class="text-center">Resolution </td>
          <td class="text-center"><input type="text" value="0" name="step1[res15]" class="res15"></td>
          <td class="text-center">Accuracy </td>
          <td class="text-center"><input type="text" value="0" name="step1[acc15]" class="acc15"></td>
          <td class="text-center">Count </td>
          <td class="text-center"><input type="text" value="0" name="step1[count15]" class="count15"></td>
          <td class="text-center">Uncertainty </td>
          <td class="text-center"><input type="text" value="0" name="step1[uncert15]" class="uncert15"></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> Master </td>
          <td class="text-center"><input type="text" value="0" name="step1[m15_1]" class="m15_1" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m15_2]" class="m15_2" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m15_3]" class="m15_3" > </td>
          <td class="text-center"><input type="text" value="0" name="step1[m15_4]" class="m15_4" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m15_5]" class="m15_5" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m15_6]" class="m15_6" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m15_7]" class="m15_7" > </td>
          <td class="text-center"><input type="text" value="0" name="step1[m15_8]" class="m15_8" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m15_9]" class="m15_9" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m15_10]" class="m15_10" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m15_11]" class="m15_11" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[m15_12]" class="m15_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> B.Set </td>
          <td class="text-center"><input type="text" value="0" name="step1[b15_1]" class="b15_1" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b15_2]" class="b15_2" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b15_3]" class="b15_3" > </td>
          <td class="text-center"><input type="text" value="0" name="step1[b15_4]" class="b15_4" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b15_5]" class="b15_5" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b15_6]" class="b15_6" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b15_7]" class="b15_7" > </td>
          <td class="text-center"><input type="text" value="0" name="step1[b15_8]" class="b15_8" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b15_9]" class="b15_9" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b15_10]" class="b15_10" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b15_11]" class="b15_11" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[b15_12]" class="b15_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> A.Set </td>
          <td class="text-center"><input type="text" value="0" name="step1[a15_1]" class="a15_1" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a15_2]" class="a15_2" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a15_3]" class="a15_3" > </td>
          <td class="text-center"><input type="text" value="0" name="step1[a15_4]" class="a15_4" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a15_5]" class="a15_5" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a15_6]" class="a15_6" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a15_7]" class="a15_7" > </td>
          <td class="text-center"><input type="text" value="0" name="step1[a15_8]" class="a15_8" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a15_9]" class="a15_9" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a15_10]" class="a15_10" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a15_11]" class="a15_11" ></td>
          <td class="text-center"><input type="text" value="0" name="step1[a15_12]" class="a15_12" ></td>
        </tr>
      </tbody>
    </table>
    <div class="c_refress_blog">
      <div class="c_overflow">
        <div class="c_ref_btn">
          <button class="btn btn-sm btn-success" type="reset"><i class="fa fa-repeat"></i>Refresh</button>
        </div>
        <?php foreach($uncertainty as $uncertainty_data){ ?>
        <div class="c_refress_blog_input">
          <input type="checkbox" id="<?php echo $uncertainty_data['Tempuncertainty']['id'] ;?>" name="step1[uncertainty15_val]" class="uncertainty15_val" value="<?php echo $uncertainty_data['Tempuncertainty']['id'] ;?>">
          <label><?php echo $uncertainty_data['Tempuncertainty']['tagno']; ?></label>
        </div>
          <?php } ?>
      </div>
    </div>
  </div>
  
<!--</div>-->
