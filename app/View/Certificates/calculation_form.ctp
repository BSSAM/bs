
 <div class="panel panel-default">
                                    
<div class="panel-body panel-body-nopadding">
    <!-- BASIC WIZARD -->
    <div id="basicWizard" class="basic-wizard">
        <ul class="nav nav-pills nav-justified " data-toggle="tabs" id="tabs">
            <li class="active"><a href="#tab1" data-toggle="tab"><span>Step 1:</span> Calculation Form</a></li>
            <li class=""><a href="#tab2" data-toggle="tab"><span>Step 2:</span> Form1</a></li>
            <li class=""><a href="#tab3" data-toggle="tab"><span>Step 3:</span> Form2 </a></li>
            <li class=""><a href="#tab4" data-toggle="tab"><span>Step 4:</span> Uncertainty</a></li>
            <li class=""><a href="#tab5" data-toggle="tab"><span>Step 5:</span> Specification of clients (For technical)</a></li>
        </ul>

        <br>

        <div class="tab-content" >
            <div class="tab-pane active" id="tab1">
                <div class="col-sm-3 col-lg-12 subcontract_linear certificate_table certificate_tab">
                    
                    
  <div class="form-group c_top_search">
    <label for="val_no_runs" class=" control-label">No.of Runs</label>
   <?php  $numbers = array('1' => 1,'2' => 2,'3' => 3,'4' => 4,'5' => 5,'6' => 6,'7' => 7,'8' => 8,'9' => 9,'10' => 10); ?> 
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
          <td class="text-center">Set Temperature </td>
          <td class="text-center"><input type="text" name="step1[temp1]" class="temp1" value="<?php if(isset($cert['Tempcertificatedata']['temp1'])){echo $cert['Tempcertificatedata']['temp1']; } else { if(isset($tempdata[0])){echo $tempdata[0]['setpoint'];}} ?>" ></td>
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
          <td class="text-center"><input type="text" name="step1[res1]" class="res1" value="<?php if(isset($cert['Tempcertificatedata']['res1'])){echo $cert['Tempcertificatedata']['res1']; } else { if(isset($tempdata[0])){ echo $tempdata[0]['resolution'];}} ?>"></td>
          <td class="text-center">Accuracy </td>
          <td class="text-center"><input type="text" name="step1[acc1]" class="acc1" value="<?php if(isset($cert['Tempcertificatedata']['acc1'])){echo $cert['Tempcertificatedata']['acc1']; } else { if(isset($tempdata[0])){ echo $tempdata[0]['accuracy'];}} ?>"></td>
          <td class="text-center">Count </td>
          <td class="text-center"><input type="text" name="step1[count1]" class="count1" value="<?php if(isset($cert['Tempcertificatedata']['count1'])){echo $cert['Tempcertificatedata']['count1']; } else { if(isset($tempdata[0])){ echo $tempdata[0]['count'];}} ?>"></td>
          <td class="text-center">Uncertainty </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['uncert1']; ?>" name="step1[uncert1]" class="uncert1" disabled="disabled" ></td>
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
<!--        <div class="c_ref_btn">
          <button class="btn btn-sm btn-success" type="reset"><i class="fa fa-repeat"></i>Refresh</button>
        </div>-->
        
        <?php foreach($uncertainty as $k=>$uncertainty_data){ ?>
        <div class="c_refress_blog_input">
            <?php 
                    if(isset($tempdata[0]))
                    {
                    $selected = isset($cert['Tempcertificatedata']['uncertainty1_val']) ? explode(',',$cert['Tempcertificatedata']['uncertainty1_val']) : explode(',',$tempdata[0]['temp_uncertainty_id']);
                    $sel = in_array($uncertainty_data['Tempuncertainty']['id'], $selected) ? 'checked' : '';
                    }
                    else
                    {
                    $selected = isset($cert['Tempcertificatedata']['uncertainty1_val']) ? explode(',',$cert['Tempcertificatedata']['uncertainty1_val']) : array();
                    $sel = in_array($uncertainty_data['Tempuncertainty']['id'], $selected) ? 'checked' : '';
                    }
            ?>
            
            <input <?php echo $sel; ?> type="checkbox" id="<?php echo $uncertainty_data['Tempuncertainty']['id'] ;?>" name="step1[uncertainty1_val][<?php echo $k;?>]" class="uncertainty1_val" value="<?php echo $uncertainty_data['Tempuncertainty']['id'];?>">
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
          <td class="text-center"><input type="text" name="step1[temp2]" class="temp2" value="<?php if(isset($cert['Tempcertificatedata']['temp2'])){echo $cert['Tempcertificatedata']['temp2']; } else { if(isset($tempdata[1])){ echo $tempdata[1]['setpoint'];}} ?>"></td>
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
          <td class="text-center"><input type="text" name="step1[res2]" class="res2" value="<?php if(isset($cert['Tempcertificatedata']['res2'])){echo $cert['Tempcertificatedata']['res2']; } else { if(isset($tempdata[1])){ echo $tempdata[1]['resolution'];}} ?>"></td>
          <td class="text-center">Accuracy </td>
          <td class="text-center"><input type="text" name="step1[acc2]" class="acc2" value="<?php if(isset($cert['Tempcertificatedata']['acc2'])){echo $cert['Tempcertificatedata']['acc2']; } else { if(isset($tempdata[1])){ echo $tempdata[1]['accuracy'];}} ?>"></td>
          <td class="text-center">Count </td>
          <td class="text-center"><input type="text" name="step1[count2]" class="count2" value="<?php if(isset($cert['Tempcertificatedata']['count2'])){echo $cert['Tempcertificatedata']['count2']; } else { if(isset($tempdata[1])){ echo $tempdata[1]['count'];}} ?>"></td>
          <td class="text-center">Uncertainty </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['uncert2']; ?>" name="step1[uncert2]" class="uncert2" disabled="disabled"></td>
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
<!--        <div class="c_ref_btn">
          <button class="btn btn-sm btn-success" type="reset"><i class="fa fa-repeat"></i>Refresh</button>
        </div>-->
        <?php foreach($uncertainty as $uncertainty_data){ ?>
<div class="c_refress_blog_input">
<?php 
//                if(isset($tempdata[0])) 
//                { 
//                    //echo "ads";
//                    $selected = isset($tempdata[0]['temp_uncertainty_id']) ? explode(',',$tempdata[0]['temp_uncertainty_id']) : array();
//                    $sel = in_array($tempdata[0]['temp_uncertainty_id'], $selected) ? 'checked' : '';
//                } 
//                else 
//                { 
                    //echo $tempdata[0]['temp_uncertainty_id'];
                    if(isset($tempdata[1]))
                    {
                    $selected = isset($cert['Tempcertificatedata']['uncertainty2_val']) ? explode(',',$cert['Tempcertificatedata']['uncertainty2_val']) : explode(',',$tempdata[1]['temp_uncertainty_id']);
                    $sel = in_array($uncertainty_data['Tempuncertainty']['id'], $selected) ? 'checked' : '';
                    }
                    else
                    {
                    $selected = isset($cert['Tempcertificatedata']['uncertainty2_val']) ? explode(',',$cert['Tempcertificatedata']['uncertainty2_val']) : array();
                    $sel = in_array($uncertainty_data['Tempuncertainty']['id'], $selected) ? 'checked' : '';
                    }
                //}
            ?>
            
            <input <?php echo $sel; ?> type="checkbox" id="<?php echo $uncertainty_data['Tempuncertainty']['id'] ;?>" name="step1[uncertainty2_val][]" class="uncertainty2_val" value="<?php echo $uncertainty_data['Tempuncertainty']['id'];?>">
          <label><?php echo $uncertainty_data['Tempuncertainty']['tagno']; ?></label>
<!--        <div class="c_refress_blog_input">
          <input type="checkbox" id="<?php //echo $uncertainty_data['Tempuncertainty']['id'] ;?>" name="step1[uncertainty2_val]" class="uncertainty2_val" value="<?php //echo $uncertainty_data['Tempuncertainty']['id'] ;?>">
          <label><?php //echo $uncertainty_data['Tempuncertainty']['tagno']; ?></label>-->
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
          <td class="text-center"><input type="text" name="step1[temp3]" class="temp3" value="<?php if(isset($cert['Tempcertificatedata']['temp3'])){echo $cert['Tempcertificatedata']['temp3']; } else { if(isset($tempdata[2])){ echo $tempdata[2]['setpoint'];}} ?>"></td>
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
          <td class="text-center"><input type="text" name="step1[res3]" class="res3"  value="<?php if(isset($cert['Tempcertificatedata']['res3'])){echo $cert['Tempcertificatedata']['res3']; } else { if(isset($tempdata[2])){ echo $tempdata[2]['resolution'];}} ?>"></td>
          <td class="text-center">Accuracy </td>
          <td class="text-center"><input type="text" name="step1[acc3]" class="acc3"  value="<?php if(isset($cert['Tempcertificatedata']['acc3'])){echo $cert['Tempcertificatedata']['acc3']; } else { if(isset($tempdata[2])){ echo $tempdata[2]['accuracy'];}} ?>"></td>
          <td class="text-center">Count </td>
          <td class="text-center"><input type="text" name="step1[count3]" class="count3" value="<?php if(isset($cert['Tempcertificatedata']['count3'])){echo $cert['Tempcertificatedata']['count3']; } else { if(isset($tempdata[2])){ $tempdata[2]['count'];}} ?>"></td>
          <td class="text-center">Uncertainty </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['uncert3']; ?>" name="step1[uncert3]" class="uncert3" disabled="disabled"></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> Master </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m3_1']; ?>" name="step1[m3_1]" class="m3_1" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m3_2']; ?>" name="step1[m3_2]" class="m3_2" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m3_3']; ?>" name="step1[m3_3]" class="m3_3" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m3_4']; ?>" name="step1[m3_4]" class="m3_4" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m3_5']; ?>" name="step1[m3_5]" class="m3_5" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m3_6']; ?>" name="step1[m3_6]" class="m3_6" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m3_7']; ?>" name="step1[m3_7]" class="m3_7" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m3_8']; ?>" name="step1[m3_8]" class="m3_8" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m3_9']; ?>" name="step1[m3_9]" class="m3_9" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m3_10']; ?>" name="step1[m3_10]" class="m3_10" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m3_11']; ?>" name="step1[m3_11]" class="m3_11" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m3_12']; ?>" name="step1[m3_12]" class="m3_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> B.Set </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b3_1']; ?>" name="step1[b3_1]" class="b3_1" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b3_2']; ?>" name="step1[b3_2]" class="b3_2" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b3_3']; ?>" name="step1[b3_3]" class="b3_3" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b3_4']; ?>" name="step1[b3_4]" class="b3_4" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b3_5']; ?>" name="step1[b3_5]" class="b3_5" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b3_6']; ?>" name="step1[b3_6]" class="b3_6" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b3_7']; ?>" name="step1[b3_7]" class="b3_7" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b3_8']; ?>" name="step1[b3_8]" class="b3_8" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b3_9']; ?>" name="step1[b3_9]" class="b3_9" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b3_10']; ?>" name="step1[b3_10]" class="b3_10" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b3_11']; ?>" name="step1[b3_11]" class="b3_11" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b3_12']; ?>" name="step1[b3_12]" class="b3_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> A.Set </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a3_1']; ?>" name="step1[a3_1]" class="a3_1" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a3_2']; ?>" name="step1[a3_2]" class="a3_2" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a3_3']; ?>" name="step1[a3_3]" class="a3_3" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a3_4']; ?>" name="step1[a3_4]" class="a3_4" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a3_5']; ?>" name="step1[a3_5]" class="a3_5" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a3_6']; ?>" name="step1[a3_6]" class="a3_6" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a3_7']; ?>" name="step1[a3_7]" class="a3_7" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a3_8']; ?>" name="step1[a3_8]" class="a3_8" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a3_9']; ?>" name="step1[a3_9]" class="a3_9" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a3_10']; ?>" name="step1[a3_10]" class="a3_10" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a3_11']; ?>" name="step1[a3_11]" class="a3_11" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a3_12']; ?>" name="step1[a3_12]" class="a3_12" ></td
        </tr>
      </tbody>
    </table>
    <div class="c_refress_blog">
      <div class="c_overflow">
<!--        <div class="c_ref_btn">
          <button class="btn btn-sm btn-success" type="reset"><i class="fa fa-repeat"></i>Refresh</button>
        </div>-->
        <?php foreach($uncertainty as $uncertainty_data){ ?>
        <div class="c_refress_blog_input">
            <?php
                    if(isset($tempdata[2]))
                    {
                        $selected = isset($cert['Tempcertificatedata']['uncertainty3_val']) ? explode(',',$cert['Tempcertificatedata']['uncertainty3_val']) : explode(',',$tempdata[2]['temp_uncertainty_id']);
                        $sel = in_array($uncertainty_data['Tempuncertainty']['id'], $selected) ? 'checked' : '';
                    }
                    else
                    {
                        $selected = isset($cert['Tempcertificatedata']['uncertainty3_val']) ? explode(',',$cert['Tempcertificatedata']['uncertainty3_val']) : array();
                        $sel = in_array($uncertainty_data['Tempuncertainty']['id'], $selected) ? 'checked' : '';
                    }
                //}
            ?>
            
            <input <?php echo $sel; ?> type="checkbox" id="<?php echo $uncertainty_data['Tempuncertainty']['id'] ;?>" name="step1[uncertainty3_val][]" class="uncertainty3_val" value="<?php echo $uncertainty_data['Tempuncertainty']['id'];?>">
          <label><?php echo $uncertainty_data['Tempuncertainty']['tagno']; ?></label>
<!--          <input type="checkbox" id="<?php //echo $uncertainty_data['Tempuncertainty']['id'] ;?>" name="step1[uncertainty3_val]" class="uncertainty3_val" value="<?php //echo $uncertainty_data['Tempuncertainty']['id'] ;?>">
          <label><?php //echo $uncertainty_data['Tempuncertainty']['tagno']; ?></label>-->
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
          <td class="text-center"><input type="text" name="step1[temp4]" class="temp4" value="<?php if(isset($cert['Tempcertificatedata']['temp4'])){echo $cert['Tempcertificatedata']['temp4']; } else { if(isset($tempdata[3])){ echo $tempdata[3]['setpoint'];}} ?>"></td>
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
          <td class="text-center"><input type="text" name="step1[res4]" class="res4" value="<?php if(isset($cert['Tempcertificatedata']['res4'])){echo $cert['Tempcertificatedata']['res4']; } else { if(isset($tempdata[3])){ echo $tempdata[3]['resolution'];}} ?>"></td>
          <td class="text-center">Accuracy </td>
          <td class="text-center"><input type="text" name="step1[acc4]" class="acc4" value="<?php if(isset($cert['Tempcertificatedata']['acc4'])){echo $cert['Tempcertificatedata']['acc4']; } else { if(isset($tempdata[3])){ echo $tempdata[3]['accuracy'];}} ?>"></td>
          <td class="text-center">Count </td>
          <td class="text-center"><input type="text" name="step1[count4]" class="count4" value="<?php if(isset($cert['Tempcertificatedata']['count4'])){echo $cert['Tempcertificatedata']['count4']; } else { if(isset($tempdata[3])){ echo $tempdata[3]['count'];}} ?>"></td>
          <td class="text-center">Uncertainty </td>
          <td class="text-center"><input type="text" name="step1[uncert4]" value="<?php echo $cert['Tempcertificatedata']['uncert4']; ?>" class="uncert4" disabled="disabled"></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> Master </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m4_1']; ?>" name="step1[m4_1]" class="m4_1" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m4_2']; ?>" name="step1[m4_2]" class="m4_2" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m4_3']; ?>" name="step1[m4_3]" class="m4_3" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m4_4']; ?>" name="step1[m4_4]" class="m4_4" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m4_5']; ?>" name="step1[m4_5]" class="m4_5" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m4_6']; ?>" name="step1[m4_6]" class="m4_6" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m4_7']; ?>" name="step1[m4_7]" class="m4_7" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m4_8']; ?>" name="step1[m4_8]" class="m4_8" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m4_9']; ?>" name="step1[m4_9]" class="m4_9" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m4_10']; ?>" name="step1[m4_10]" class="m4_10" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m4_11']; ?>" name="step1[m4_11]" class="m4_11" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m4_12']; ?>" name="step1[m4_12]" class="m4_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> B.Set </td>
         <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b4_1']; ?>" name="step1[b4_1]" class="b4_1" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b4_2']; ?>" name="step1[b4_2]" class="b4_2" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b4_3']; ?>" name="step1[b4_3]" class="b4_3" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b4_4']; ?>" name="step1[b4_4]" class="b4_4" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b4_5']; ?>" name="step1[b4_5]" class="b4_5" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b4_6']; ?>" name="step1[b4_6]" class="b4_6" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b4_7']; ?>" name="step1[b4_7]" class="b4_7" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b4_8']; ?>" name="step1[b4_8]" class="b4_8" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b4_9']; ?>" name="step1[b4_9]" class="b4_9" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b4_10']; ?>" name="step1[b4_10]" class="b4_10" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b4_11']; ?>" name="step1[b4_11]" class="b4_11" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b4_12']; ?>" name="step1[b4_12]" class="b4_12" ></t
        </tr>
        <tr class="text-center">
          <td class="text-center"> A.Set </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a4_1']; ?>" name="step1[a4_1]" class="a4_1" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a4_2']; ?>" name="step1[a4_2]" class="a4_2" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a4_3']; ?>" name="step1[a4_3]" class="a4_3" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a4_4']; ?>" name="step1[a4_4]" class="a4_4" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a4_5']; ?>" name="step1[a4_5]" class="a4_5" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a4_6']; ?>" name="step1[a4_6]" class="a4_6" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a4_7']; ?>" name="step1[a4_7]" class="a4_7" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a4_8']; ?>" name="step1[a4_8]" class="a4_8" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a4_9']; ?>" name="step1[a4_9]" class="a4_9" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a4_10']; ?>" name="step1[a4_10]" class="a4_10" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a4_11']; ?>" name="step1[a4_11]" class="a4_11" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a4_12']; ?>" name="step1[a4_12]" class="a4_12" ></td>
        </tr>
      </tbody>
    </table>
    <div class="c_refress_blog">
      <div class="c_overflow">
<!--        <div class="c_ref_btn">
          <button class="btn btn-sm btn-success" type="reset"><i class="fa fa-repeat"></i>Refresh</button>
        </div>-->
    <?php foreach($uncertainty as $uncertainty_data){ ?>
        <div class="c_refress_blog_input">
            <?php
                if(isset($tempdata[3]))
                {
                    $selected = isset($cert['Tempcertificatedata']['uncertainty4_val']) ? explode(',',$cert['Tempcertificatedata']['uncertainty4_val']) : explode(',',$tempdata[3]['temp_uncertainty_id']);
                    $sel = in_array($uncertainty_data['Tempuncertainty']['id'], $selected) ? 'checked' : '';
                }
                else
                {
                    $selected = isset($cert['Tempcertificatedata']['uncertainty4_val']) ? explode(',',$cert['Tempcertificatedata']['uncertainty4_val']) : array();
                    $sel = in_array($uncertainty_data['Tempuncertainty']['id'], $selected) ? 'checked' : '';
                }
                //}
            ?>
            
            <input <?php echo $sel; ?> type="checkbox" id="<?php echo $uncertainty_data['Tempuncertainty']['id'] ;?>" name="step1[uncertainty4_val][]" class="uncertainty4_val" value="<?php echo $uncertainty_data['Tempuncertainty']['id'];?>">
          <label><?php echo $uncertainty_data['Tempuncertainty']['tagno']; ?></label>
<!--          <input type="checkbox" id="<?php //echo $uncertainty_data['Tempuncertainty']['id'] ;?>" name="step1[uncertainty3_val]" class="uncertainty3_val" value="<?php //echo $uncertainty_data['Tempuncertainty']['id'] ;?>">
          <label><?php //echo $uncertainty_data['Tempuncertainty']['tagno']; ?></label>-->
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
          <td class="text-center"><input type="text" name="step1[temp5]" class="temp5" value="<?php if(isset($cert['Tempcertificatedata']['temp5'])){echo $cert['Tempcertificatedata']['temp5']; } else { if(isset($tempdata[4])){ echo $tempdata[4]['setpoint'];}} ?>"></td>
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
          <td class="text-center"><input type="text" name="step1[res5]" class="res5" value="<?php if(isset($cert['Tempcertificatedata']['res5'])){echo $cert['Tempcertificatedata']['res5']; } else { if(isset($tempdata[4])){ echo $tempdata[4]['resolution'];}} ?>"></td>
          <td class="text-center">Accuracy </td>
          <td class="text-center"><input type="text" name="step1[acc5]" class="acc5" value="<?php if(isset($cert['Tempcertificatedata']['acc5'])){echo $cert['Tempcertificatedata']['acc5']; } else { if(isset($tempdata[4])){ echo $tempdata[4]['accuracy'];}} ?>"></td>
          <td class="text-center">Count </td>
          <td class="text-center"><input type="text" name="step1[count5]" class="count5" value="<?php if(isset($cert['Tempcertificatedata']['count5'])){echo $cert['Tempcertificatedata']['count5']; } else { if(isset($tempdata[4])){ echo $tempdata[4]['count'];}} ?>"></td>
          <td class="text-center">Uncertainty </td>
          <td class="text-center"><input type="text" name="step1[uncert5]" value="<?php echo $cert['Tempcertificatedata']['uncert5']; ?>" class="uncert5" disabled="disabled"></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> Master </td>
         <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m5_1']; ?>" name="step1[m5_1]" class="m5_1" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m5_2']; ?>" name="step1[m5_2]" class="m5_2" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m5_3']; ?>" name="step1[m5_3]" class="m5_3" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m5_4']; ?>" name="step1[m5_4]" class="m5_4" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m5_5']; ?>" name="step1[m5_5]" class="m5_5" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m5_6']; ?>" name="step1[m5_6]" class="m5_6" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m5_7']; ?>" name="step1[m5_7]" class="m5_7" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m5_8']; ?>" name="step1[m5_8]" class="m5_8" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m5_9']; ?>" name="step1[m5_9]" class="m5_9" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m5_10']; ?>" name="step1[m5_10]" class="m5_10" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m5_11']; ?>" name="step1[m5_11]" class="m5_11" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m5_12']; ?>" name="step1[m5_12]" class="m5_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> B.Set </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b5_1']; ?>" name="step1[b5_1]" class="b5_1" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b5_2']; ?>" name="step1[b5_2]" class="b5_2" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b5_3']; ?>" name="step1[b5_3]" class="b5_3" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b5_4']; ?>" name="step1[b5_4]" class="b5_4" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b5_5']; ?>" name="step1[b5_5]" class="b5_5" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b5_6']; ?>" name="step1[b5_6]" class="b5_6" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b5_7']; ?>" name="step1[b5_7]" class="b5_7" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b5_8']; ?>" name="step1[b5_8]" class="b5_8" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b5_9']; ?>" name="step1[b5_9]" class="b5_9" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b5_10']; ?>" name="step1[b5_10]" class="b5_10" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b5_11']; ?>" name="step1[b5_11]" class="b5_11" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b5_12']; ?>" name="step1[b5_12]" class="b5_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> A.Set </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a5_1']; ?>" name="step1[a5_1]" class="a5_1" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a5_2']; ?>" name="step1[a5_2]" class="a5_2" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a5_3']; ?>" name="step1[a5_3]" class="a5_3" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a5_4']; ?>" name="step1[a5_4]" class="a5_4" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a5_5']; ?>" name="step1[a5_5]" class="a5_5" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a5_6']; ?>" name="step1[a5_6]" class="a5_6" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a5_7']; ?>" name="step1[a5_7]" class="a5_7" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a5_8']; ?>" name="step1[a5_8]" class="a5_8" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a5_9']; ?>" name="step1[a5_9]" class="a5_9" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a5_10']; ?>" name="step1[a5_10]" class="a5_10" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a5_11']; ?>" name="step1[a5_11]" class="a5_11" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a5_12']; ?>" name="step1[a5_12]" class="a5_12" ></td>
        </tr>
      </tbody>
    </table>
    <div class="c_refress_blog">
      <div class="c_overflow">
<!--        <div class="c_ref_btn">
          <button class="btn btn-sm btn-success" type="reset"><i class="fa fa-repeat"></i>Refresh</button>
        </div>-->
<?php foreach($uncertainty as $uncertainty_data){ ?>
        <div class="c_refress_blog_input">
            <?php
             if(isset($tempdata[4]))
                {
                    $selected = isset($cert['Tempcertificatedata']['uncertainty5_val']) ? explode(',',$cert['Tempcertificatedata']['uncertainty5_val']) : explode(',',$tempdata[4]['temp_uncertainty_id']);
                    $sel = in_array($uncertainty_data['Tempuncertainty']['id'], $selected) ? 'checked' : '';
                }
                else
                {
                    $selected = isset($cert['Tempcertificatedata']['uncertainty5_val']) ? explode(',',$cert['Tempcertificatedata']['uncertainty5_val']) : array();
                    $sel = in_array($uncertainty_data['Tempuncertainty']['id'], $selected) ? 'checked' : '';
                }
                //}
            ?>
            
            <input <?php echo $sel; ?> type="checkbox" id="<?php echo $uncertainty_data['Tempuncertainty']['id'] ;?>" name="step1[uncertainty5_val][]" class="uncertainty4_val" value="<?php echo $uncertainty_data['Tempuncertainty']['id'];?>">
          <label><?php echo $uncertainty_data['Tempuncertainty']['tagno']; ?></label>
<!--          <input type="checkbox" id="<?php //echo $uncertainty_data['Tempuncertainty']['id'] ;?>" name="step1[uncertainty3_val]" class="uncertainty3_val" value="<?php //echo $uncertainty_data['Tempuncertainty']['id'] ;?>">
          <label><?php //echo $uncertainty_data['Tempuncertainty']['tagno']; ?></label>-->
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
          <td class="text-center"><input type="text" name="step1[temp6]" class="temp6" value="<?php if(isset($cert['Tempcertificatedata']['temp6'])){echo $cert['Tempcertificatedata']['temp6']; } else { if(isset($tempdata[5])){ echo $tempdata[5]['setpoint'];}} ?>"></td>
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
          <td class="text-center"><input type="text" name="step1[res6]" class="res6" value="<?php if(isset($cert['Tempcertificatedata']['res6'])){echo $cert['Tempcertificatedata']['res6']; } else { if(isset($tempdata[5])){ echo $tempdata[5]['resolution'];}} ?>"></td>
          <td class="text-center">Accuracy </td>
          <td class="text-center"><input type="text" name="step1[acc6]" class="acc6" value="<?php if(isset($cert['Tempcertificatedata']['acc6'])){echo $cert['Tempcertificatedata']['acc6']; } else { if(isset($tempdata[5])){ echo $tempdata[5]['accuracy'];}} ?>"></td>
          <td class="text-center">Count </td>
          <td class="text-center"><input type="text" name="step1[count6]" class="count6" value="<?php if(isset($cert['Tempcertificatedata']['count6'])){echo $cert['Tempcertificatedata']['count6']; } else { if(isset($tempdata[5])){ echo $tempdata[5]['count'];}} ?>"></td>
          <td class="text-center">Uncertainty </td>
          <td class="text-center"><input type="text" name="step1[uncert6]" value="<?php echo $cert['Tempcertificatedata']['uncert6']; ?>" class="uncert6" disabled="disabled"></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> Master </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m6_1']; ?>" name="step1[m6_1]" class="m6_1" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m6_2']; ?>" name="step1[m6_2]" class="m6_2" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m6_3']; ?>" name="step1[m6_3]" class="m6_3" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m6_4']; ?>" name="step1[m6_4]" class="m6_4" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m6_5']; ?>" name="step1[m6_5]" class="m6_5" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m6_6']; ?>" name="step1[m6_6]" class="m6_6" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m6_7']; ?>" name="step1[m6_7]" class="m6_7" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m6_8']; ?>" name="step1[m6_8]" class="m6_8" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m6_9']; ?>" name="step1[m6_9]" class="m6_9" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m6_10']; ?>" name="step1[m6_10]" class="m6_10" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m6_11']; ?>" name="step1[m6_11]" class="m6_11" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m6_12']; ?>" name="step1[m6_12]" class="m6_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> B.Set </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b6_1']; ?>" name="step1[b6_1]" class="b6_1" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b6_2']; ?>" name="step1[b6_2]" class="b6_2" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b6_3']; ?>" name="step1[b6_3]" class="b6_3" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b6_4']; ?>" name="step1[b6_4]" class="b6_4" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b6_5']; ?>" name="step1[b6_5]" class="b6_5" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b6_6']; ?>" name="step1[b6_6]" class="b6_6" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b6_7']; ?>" name="step1[b6_7]" class="b6_7" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b6_8']; ?>" name="step1[b6_8]" class="b6_8" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b6_9']; ?>" name="step1[b6_9]" class="b6_9" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b6_10']; ?>" name="step1[b6_10]" class="b6_10" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b6_11']; ?>" name="step1[b6_11]" class="b6_11" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b6_12']; ?>" name="step1[b6_12]" class="b6_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> A.Set </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a6_1']; ?>" name="step1[a6_1]" class="a6_1" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a6_2']; ?>" name="step1[a6_2]" class="a6_2" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a6_3']; ?>" name="step1[a6_3]" class="a6_3" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a6_4']; ?>" name="step1[a6_4]" class="a6_4" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a6_5']; ?>" name="step1[a6_5]" class="a6_5" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a6_6']; ?>" name="step1[a6_6]" class="a6_6" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a6_7']; ?>" name="step1[a6_7]" class="a6_7" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a6_8']; ?>" name="step1[a6_8]" class="a6_8" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a6_9']; ?>" name="step1[a6_9]" class="a6_9" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a6_10']; ?>" name="step1[a6_10]" class="a6_10" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a6_11']; ?>" name="step1[a6_11]" class="a6_11" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a6_12']; ?>" name="step1[a6_12]" class="a6_12" ></td>
        </tr>
      </tbody>
    </table>
    <div class="c_refress_blog">
      <div class="c_overflow">
<!--        <div class="c_ref_btn">
          <button class="btn btn-sm btn-success" type="reset"><i class="fa fa-repeat"></i>Refresh</button>
        </div>-->
        <?php foreach($uncertainty as $uncertainty_data){ ?>
        <div class="c_refress_blog_input">
             <?php
             if(isset($tempdata[5]))
                {
                   $selected = isset($cert['Tempcertificatedata']['uncertainty6_val']) ? explode(',',$cert['Tempcertificatedata']['uncertainty6_val']) : explode(',',$tempdata[5]['temp_uncertainty_id']);
                    $sel = in_array($uncertainty_data['Tempuncertainty']['id'], $selected) ? 'checked' : '';
                }
                else
                {
                    $selected = isset($cert['Tempcertificatedata']['uncertainty6_val']) ? explode(',',$cert['Tempcertificatedata']['uncertainty6_val']) : array();
                    $sel = in_array($uncertainty_data['Tempuncertainty']['id'], $selected) ? 'checked' : '';
                }
                //}
            ?>
            
            <input <?php echo $sel; ?> type="checkbox" id="<?php echo $uncertainty_data['Tempuncertainty']['id'] ;?>" name="step1[uncertainty6_val][]" class="uncertainty6_val" value="<?php echo $uncertainty_data['Tempuncertainty']['id'];?>">
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
          <td class="text-center"><input type="text" name="step1[temp7]" class="temp7" value="<?php if(isset($cert['Tempcertificatedata']['temp7'])){echo $cert['Tempcertificatedata']['temp7']; } else { if(isset($tempdata[6])){ echo $tempdata[6]['setpoint'];}} ?>"></td>
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
          <td class="text-center"><input type="text" name="step1[res7]" class="res7" value="<?php if(isset($cert['Tempcertificatedata']['res7'])){echo $cert['Tempcertificatedata']['res7']; } else { if(isset($tempdata[6])){ echo $tempdata[6]['resolution'];}} ?>"></td>
          <td class="text-center">Accuracy </td>
          <td class="text-center"><input type="text" name="step1[acc7]" class="acc7" value="<?php if(isset($cert['Tempcertificatedata']['acc7'])){echo $cert['Tempcertificatedata']['acc7']; } else { if(isset($tempdata[6])){ echo $tempdata[6]['accuracy'];}} ?>"></td>
          <td class="text-center">Count </td>
          <td class="text-center"><input type="text" name="step1[count7]" class="count7" value="<?php if(isset($cert['Tempcertificatedata']['count7'])){echo $cert['Tempcertificatedata']['count7']; } else { if(isset($tempdata[6])){ echo $tempdata[6]['count'];}} ?>"></td>
          <td class="text-center">Uncertainty </td>
          <td class="text-center"><input type="text" name="step1[uncert7]" class="uncert7" value="<?php echo $cert['Tempcertificatedata']['uncert7']; ?>" disabled="disabled"></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> Master </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m7_1']; ?>" name="step1[m7_1]" class="m7_1" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m7_2']; ?>" name="step1[m7_2]" class="m7_2" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m7_3']; ?>" name="step1[m7_3]" class="m7_3" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m7_4']; ?>" name="step1[m7_4]" class="m7_4" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m7_5']; ?>" name="step1[m7_5]" class="m7_5" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m7_6']; ?>" name="step1[m7_6]" class="m7_6" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m7_7']; ?>" name="step1[m7_7]" class="m7_7" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m7_8']; ?>" name="step1[m7_8]" class="m7_8" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m7_9']; ?>" name="step1[m7_9]" class="m7_9" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m7_10']; ?>" name="step1[m7_10]" class="m7_10" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m7_11']; ?>" name="step1[m7_11]" class="m7_11" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m7_12']; ?>" name="step1[m7_12]" class="m7_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> B.Set </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b7_1']; ?>" name="step1[b7_1]" class="b7_1" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b7_2']; ?>" name="step1[b7_2]" class="b7_2" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b7_3']; ?>" name="step1[b7_3]" class="b7_3" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b7_4']; ?>" name="step1[b7_4]" class="b7_4" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b7_5']; ?>" name="step1[b7_5]" class="b7_5" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b7_6']; ?>" name="step1[b7_6]" class="b7_6" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b7_7']; ?>" name="step1[b7_7]" class="b7_7" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b7_8']; ?>" name="step1[b7_8]" class="b7_8" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b7_9']; ?>" name="step1[b7_9]" class="b7_9" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b7_10']; ?>" name="step1[b7_10]" class="b7_10" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b7_11']; ?>" name="step1[b7_11]" class="b7_11" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b7_12']; ?>" name="step1[b7_12]" class="b7_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> A.Set </td>
         <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a7_1']; ?>" name="step1[a7_1]" class="a7_1" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a7_2']; ?>" name="step1[a7_2]" class="a7_2" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a7_3']; ?>" name="step1[a7_3]" class="a7_3" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a7_4']; ?>" name="step1[a7_4]" class="a7_4" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a7_5']; ?>" name="step1[a7_5]" class="a7_5" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a7_6']; ?>" name="step1[a7_6]" class="a7_6" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a7_7']; ?>" name="step1[a7_7]" class="a7_7" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a7_8']; ?>" name="step1[a7_8]" class="a7_8" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a7_9']; ?>" name="step1[a7_9]" class="a7_9" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a7_10']; ?>" name="step1[a7_10]" class="a7_10" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a7_11']; ?>" name="step1[a7_11]" class="a7_11" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a7_12']; ?>" name="step1[a7_12]" class="a7_12" ></td
        </tr>
      </tbody>
    </table>
    <div class="c_refress_blog">
      <div class="c_overflow">
<!--        <div class="c_ref_btn">
          <button class="btn btn-sm btn-success" type="reset"><i class="fa fa-repeat"></i>Refresh</button>
        </div>-->
        <?php foreach($uncertainty as $uncertainty_data){ ?>
        <div class="c_refress_blog_input">
             <?php
             if(isset($tempdata[6]))
                {
                   $selected = isset($cert['Tempcertificatedata']['uncertainty7_val']) ? explode(',',$cert['Tempcertificatedata']['uncertainty7_val']) : explode(',',$tempdata[6]['temp_uncertainty_id']);
                    $sel = in_array($uncertainty_data['Tempuncertainty']['id'], $selected) ? 'checked' : '';
                }
                else
                {
                    $selected = isset($cert['Tempcertificatedata']['uncertainty7_val']) ? explode(',',$cert['Tempcertificatedata']['uncertainty7_val']) : array();
                    $sel = in_array($uncertainty_data['Tempuncertainty']['id'], $selected) ? 'checked' : '';
                }
                //}
            ?>
            
            <input <?php echo $sel; ?> type="checkbox" id="<?php echo $uncertainty_data['Tempuncertainty']['id'] ;?>" name="step1[uncertainty7_val][]" class="uncertainty7_val" value="<?php echo $uncertainty_data['Tempuncertainty']['id'];?>">
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
          <td class="text-center"><input type="text" name="step1[temp8]" class="temp8"  value="<?php if(isset($cert['Tempcertificatedata']['temp8'])){echo $cert['Tempcertificatedata']['temp8']; } else { if(isset($tempdata[7])){ echo $tempdata[7]['setpoint'];}} ?>"></td>
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
          <td class="text-center"><input type="text" name="step1[res8]" class="res8" value="<?php if(isset($cert['Tempcertificatedata']['res8'])){echo $cert['Tempcertificatedata']['res8']; } else { if(isset($tempdata[7])){ echo $tempdata[7]['resolution'];}} ?>"></td>
          <td class="text-center">Accuracy </td>
          <td class="text-center"><input type="text" name="step1[acc8]" class="acc8" value="<?php if(isset($cert['Tempcertificatedata']['acc8'])){echo $cert['Tempcertificatedata']['acc8']; } else { if(isset($tempdata[7])){ echo $tempdata[7]['accuracy'];}} ?>"></td>
          <td class="text-center">Count </td>
          <td class="text-center"><input type="text" name="step1[count8]" class="count8" value="<?php if(isset($cert['Tempcertificatedata']['count8'])){echo $cert['Tempcertificatedata']['count8']; } else { if(isset($tempdata[7])){ echo $tempdata[7]['count'];}} ?>"></td>
          <td class="text-center">Uncertainty </td>
          <td class="text-center"><input type="text" name="step1[uncert8]" class="uncert8" value="<?php echo $cert['Tempcertificatedata']['uncert8']; ?>" disabled="disabled"></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> Master </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m8_1']; ?>" name="step1[m8_1]" class="m8_1" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m8_2']; ?>" name="step1[m8_2]" class="m8_2" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m8_3']; ?>" name="step1[m8_3]" class="m8_3" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m8_4']; ?>" name="step1[m8_4]" class="m8_4" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m8_5']; ?>" name="step1[m8_5]" class="m8_5" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m8_6']; ?>" name="step1[m8_6]" class="m8_6" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m8_7']; ?>" name="step1[m8_7]" class="m8_7" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m8_8']; ?>" name="step1[m8_8]" class="m8_8" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m8_9']; ?>" name="step1[m8_9]" class="m8_9" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m8_10']; ?>" name="step1[m8_10]" class="m8_10" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m8_11']; ?>" name="step1[m8_11]" class="m8_11" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m8_12']; ?>" name="step1[m8_12]" class="m8_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> B.Set </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b8_1']; ?>" name="step1[b8_1]" class="b8_1" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b8_2']; ?>" name="step1[b8_2]" class="b8_2" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b8_3']; ?>" name="step1[b8_3]" class="b8_3" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b8_4']; ?>" name="step1[b8_4]" class="b8_4" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b8_5']; ?>" name="step1[b8_5]" class="b8_5" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b8_6']; ?>" name="step1[b8_6]" class="b8_6" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b8_7']; ?>" name="step1[b8_7]" class="b8_7" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b8_8']; ?>" name="step1[b8_8]" class="b8_8" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b8_9']; ?>" name="step1[b8_9]" class="b8_9" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b8_10']; ?>" name="step1[b8_10]" class="b8_10" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b8_11']; ?>" name="step1[b8_11]" class="b8_11" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b8_12']; ?>" name="step1[b8_12]" class="b8_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> A.Set </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a8_1']; ?>" name="step1[a8_1]" class="a8_1" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a8_2']; ?>" name="step1[a8_2]" class="a8_2" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a8_3']; ?>" name="step1[a8_3]" class="a8_3" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a8_4']; ?>" name="step1[a8_4]" class="a8_4" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a8_5']; ?>" name="step1[a8_5]" class="a8_5" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a8_6']; ?>" name="step1[a8_6]" class="a8_6" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a8_7']; ?>" name="step1[a8_7]" class="a8_7" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a8_8']; ?>" name="step1[a8_8]" class="a8_8" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a8_9']; ?>" name="step1[a8_9]" class="a8_9" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a8_10']; ?>" name="step1[a8_10]" class="a8_10" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a8_11']; ?>" name="step1[a8_11]" class="a8_11" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a8_12']; ?>" name="step1[a8_12]" class="a8_12" ></td>
        </tr>
      </tbody>
    </table>
    <div class="c_refress_blog">
      <div class="c_overflow">
<!--        <div class="c_ref_btn">
          <button class="btn btn-sm btn-success" type="reset"><i class="fa fa-repeat"></i>Refresh</button>
        </div>-->
        <?php foreach($uncertainty as $uncertainty_data){ ?>
        <div class="c_refress_blog_input">
          <?php
             if(isset($tempdata[7]))
                {
                   $selected = isset($cert['Tempcertificatedata']['uncertainty8_val']) ? explode(',',$cert['Tempcertificatedata']['uncertainty8_val']) : explode(',',$tempdata[7]['temp_uncertainty_id']);
                    $sel = in_array($uncertainty_data['Tempuncertainty']['id'], $selected) ? 'checked' : '';
                }
                else
                {
                    $selected = isset($cert['Tempcertificatedata']['uncertainty8_val']) ? explode(',',$cert['Tempcertificatedata']['uncertainty8_val']) : array();
                    $sel = in_array($uncertainty_data['Tempuncertainty']['id'], $selected) ? 'checked' : '';
                }
                //}
            ?>
            
            <input <?php echo $sel; ?> type="checkbox" id="<?php echo $uncertainty_data['Tempuncertainty']['id'] ;?>" name="step1[uncertainty8_val][]" class="uncertainty8_val" value="<?php echo $uncertainty_data['Tempuncertainty']['id'];?>">
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
          <td class="text-center"><input type="text" name="step1[temp9]" class="temp9" value="<?php if(isset($cert['Tempcertificatedata']['temp9'])){echo $cert['Tempcertificatedata']['temp9']; } else { if(isset($tempdata[8])){ echo $tempdata[8]['setpoint'];}} ?>"></td>
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
          <td class="text-center"><input type="text" name="step1[res9]" class="res9" value="<?php if(isset($cert['Tempcertificatedata']['res9'])){echo $cert['Tempcertificatedata']['res9']; } else { if(isset($tempdata[8])){ echo $tempdata[8]['resolution'];}} ?>"></td>
          <td class="text-center">Accuracy </td>
          <td class="text-center"><input type="text" name="step1[acc9]" class="acc9" value="<?php if(isset($cert['Tempcertificatedata']['acc9'])){echo $cert['Tempcertificatedata']['acc9']; } else { if(isset($tempdata[8])){ echo $tempdata[8]['accuracy'];}} ?>"></td>
          <td class="text-center">Count </td>
          <td class="text-center"><input type="text" name="step1[count9]" class="count9" value="<?php if(isset($cert['Tempcertificatedata']['count9'])){echo $cert['Tempcertificatedata']['count9']; } else { if(isset($tempdata[8])){ echo $tempdata[8]['count'];}} ?>"></td>
          <td class="text-center">Uncertainty </td>
          <td class="text-center"><input type="text" name="step1[uncert9]" class="uncert9" value="<?php echo $cert['Tempcertificatedata']['uncert9']; ?>" disabled="disabled"></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> Master </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m9_1']; ?>" name="step1[m9_1]" class="m9_1" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m9_2']; ?>" name="step1[m9_2]" class="m9_2" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m9_3']; ?>" name="step1[m9_3]" class="m9_3" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m9_4']; ?>" name="step1[m9_4]" class="m9_4" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m9_5']; ?>" name="step1[m9_5]" class="m9_5" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m9_6']; ?>" name="step1[m9_6]" class="m9_6" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m9_7']; ?>" name="step1[m9_7]" class="m9_7" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m9_8']; ?>" name="step1[m9_8]" class="m9_8" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m9_9']; ?>" name="step1[m9_9]" class="m9_9" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m9_10']; ?>" name="step1[m9_10]" class="m9_10" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m9_11']; ?>" name="step1[m9_11]" class="m9_11" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m9_12']; ?>" name="step1[m9_12]" class="m9_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> B.Set </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b9_1']; ?>" name="step1[b9_1]" class="b9_1" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b9_2']; ?>" name="step1[b9_2]" class="b9_2" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b9_3']; ?>" name="step1[b9_3]" class="b9_3" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b9_4']; ?>" name="step1[b9_4]" class="b9_4" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b9_5']; ?>" name="step1[b9_5]" class="b9_5" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b9_6']; ?>" name="step1[b9_6]" class="b9_6" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b9_7']; ?>" name="step1[b9_7]" class="b9_7" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b9_8']; ?>" name="step1[b9_8]" class="b9_8" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b9_9']; ?>" name="step1[b9_9]" class="b9_9" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b9_10']; ?>" name="step1[b9_10]" class="b9_10" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b9_11']; ?>" name="step1[b9_11]" class="b9_11" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b9_12']; ?>" name="step1[b9_12]" class="b9_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> A.Set </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a9_1']; ?>" name="step1[a9_1]" class="a9_1" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a9_2']; ?>" name="step1[a9_2]" class="a9_2" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a9_3']; ?>" name="step1[a9_3]" class="a9_3" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a9_4']; ?>" name="step1[a9_4]" class="a9_4" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a9_5']; ?>" name="step1[a9_5]" class="a9_5" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a9_6']; ?>" name="step1[a9_6]" class="a9_6" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a9_7']; ?>" name="step1[a9_7]" class="a9_7" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a9_8']; ?>" name="step1[a9_8]" class="a9_8" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a9_9']; ?>" name="step1[a9_9]" class="a9_9" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a9_10']; ?>" name="step1[a9_10]" class="a9_10" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a9_11']; ?>" name="step1[a9_11]" class="a9_11" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a9_12']; ?>" name="step1[a9_12]" class="a9_12" ></td>
        </tr>
      </tbody>
    </table>
    <div class="c_refress_blog">
      <div class="c_overflow">
<!--        <div class="c_ref_btn">
          <button class="btn btn-sm btn-success" type="reset"><i class="fa fa-repeat"></i>Refresh</button>
        </div>-->
        <?php foreach($uncertainty as $uncertainty_data){ ?>
        <div class="c_refress_blog_input">
            <?php
             if(isset($tempdata[8]))
                {
                    $selected = isset($cert['Tempcertificatedata']['uncertainty9_val']) ? explode(',',$cert['Tempcertificatedata']['uncertainty9_val']) : explode(',',$tempdata[8]['temp_uncertainty_id']);
                    $sel = in_array($uncertainty_data['Tempuncertainty']['id'], $selected) ? 'checked' : '';
                }
                else
                {
                   $selected = isset($cert['Tempcertificatedata']['uncertainty9_val']) ? explode(',',$cert['Tempcertificatedata']['uncertainty9_val']) : array();
                    $sel = in_array($uncertainty_data['Tempuncertainty']['id'], $selected) ? 'checked' : '';
                }
                //}
            ?>
            
            <input <?php echo $sel; ?> type="checkbox" id="<?php echo $uncertainty_data['Tempuncertainty']['id'] ;?>" name="step1[uncertainty9_val][]" class="uncertainty9_val" value="<?php echo $uncertainty_data['Tempuncertainty']['id'];?>">
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
          <td class="text-center"><input type="text" name="step1[temp10]" class="temp10" value="<?php if(isset($cert['Tempcertificatedata']['temp10'])){echo $cert['Tempcertificatedata']['temp10']; } else { if(isset($tempdata[9])){ echo $tempdata[9]['setpoint'];}} ?>"></td>
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
          <td class="text-center"><input type="text" name="step1[res10]" class="res10" value="<?php if(isset($cert['Tempcertificatedata']['res10'])){echo $cert['Tempcertificatedata']['res10']; } else { if(isset($tempdata[9])){ echo $tempdata[9]['resolution'];}} ?>"></td>
          <td class="text-center">Accuracy </td>
          <td class="text-center"><input type="text" name="step1[acc10]" class="acc10" value="<?php if(isset($cert['Tempcertificatedata']['acc10'])){echo $cert['Tempcertificatedata']['acc10']; } else { if(isset($tempdata[9])){ echo $tempdata[9]['accuracy'];}} ?>"></td>
          <td class="text-center">Count </td>
          <td class="text-center"><input type="text" name="step1[count10]" class="count10" value="<?php if(isset($cert['Tempcertificatedata']['count10'])){echo $cert['Tempcertificatedata']['count10']; } else { if(isset($tempdata[9])){ echo $tempdata[9]['count'];}} ?>"></td>
          <td class="text-center">Uncertainty </td>
          <td class="text-center"><input type="text" name="step1[uncert10]" class="uncert10" value="<?php echo $cert['Tempcertificatedata']['uncert10']; ?>" disabled="disabled"></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> Master </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m10_1']; ?>" name="step1[m10_1]" class="m10_1" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m10_2']; ?>" name="step1[m10_2]" class="m10_2" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m10_3']; ?>" name="step1[m10_3]" class="m10_3" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m10_4']; ?>" name="step1[m10_4]" class="m10_4" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m10_5']; ?>" name="step1[m10_5]" class="m10_5" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m10_6']; ?>" name="step1[m10_6]" class="m10_6" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m10_7']; ?>" name="step1[m10_7]" class="m10_7" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m10_8']; ?>" name="step1[m10_8]" class="m10_8" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m10_9']; ?>" name="step1[m10_9]" class="m10_9" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m10_10']; ?>" name="step1[m10_10]" class="m10_10" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m10_11']; ?>" name="step1[m10_11]" class="m10_11" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m10_12']; ?>" name="step1[m10_12]" class="m10_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> B.Set </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b10_1']; ?>" name="step1[b10_1]" class="b10_1" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b10_2']; ?>" name="step1[b10_2]" class="b10_2" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b10_3']; ?>" name="step1[b10_3]" class="b10_3" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b10_4']; ?>" name="step1[b10_4]" class="b10_4" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b10_5']; ?>" name="step1[b10_5]" class="b10_5" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b10_6']; ?>" name="step1[b10_6]" class="b10_6" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b10_7']; ?>" name="step1[b10_7]" class="b10_7" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b10_8']; ?>" name="step1[b10_8]" class="b10_8" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b10_9']; ?>" name="step1[b10_9]" class="b10_9" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b10_10']; ?>" name="step1[b10_10]" class="b10_10" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b10_11']; ?>" name="step1[b10_11]" class="b10_11" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b10_12']; ?>" name="step1[b10_12]" class="b10_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> A.Set </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a10_1']; ?>" name="step1[a10_1]" class="a10_1" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a10_2']; ?>" name="step1[a10_2]" class="a10_2" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a10_3']; ?>" name="step1[a10_3]" class="a10_3" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a10_4']; ?>" name="step1[a10_4]" class="a10_4" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a10_5']; ?>" name="step1[a10_5]" class="a10_5" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a10_6']; ?>" name="step1[a10_6]" class="a10_6" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a10_7']; ?>" name="step1[a10_7]" class="a10_7" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a10_8']; ?>" name="step1[a10_8]" class="a10_8" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a10_9']; ?>" name="step1[a10_9]" class="a10_9" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a10_10']; ?>" name="step1[a10_10]" class="a10_10" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a10_11']; ?>" name="step1[a10_11]" class="a10_11" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a10_12']; ?>" name="step1[a10_12]" class="a10_12" ></td>
        </tr>
      </tbody>
    </table>
    <div class="c_refress_blog">
      <div class="c_overflow">
<!--        <div class="c_ref_btn">
          <button class="btn btn-sm btn-success" type="reset"><i class="fa fa-repeat"></i>Refresh</button>
        </div>-->
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
          <td class="text-center"><input type="text" name="step1[temp11]" class="temp11" value="<?php if(isset($cert['Tempcertificatedata']['temp11'])){echo $cert['Tempcertificatedata']['temp11']; } else { if(isset($tempdata[10])){ echo $tempdata[10]['setpoint'];}} ?>"></td>
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
          <td class="text-center"><input type="text" name="step1[res11]" class="res11"></td>
          <td class="text-center">Accuracy </td>
          <td class="text-center"><input type="text" name="step1[acc11]" class="acc11"></td>
          <td class="text-center">Count </td>
          <td class="text-center"><input type="text" name="step1[count11]" class="count11"></td>
          <td class="text-center">Uncertainty </td>
          <td class="text-center"><input type="text" name="step1[uncert11]" class="uncert11" value="<?php echo $cert['Tempcertificatedata']['uncert11']; ?>"></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> Master </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m11_1']; ?>" name="step1[m11_1]" class="m11_1" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m11_2']; ?>" name="step1[m11_2]" class="m11_2" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m11_3']; ?>" name="step1[m11_3]" class="m11_3" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m11_4']; ?>" name="step1[m11_4]" class="m11_4" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m11_5']; ?>" name="step1[m11_5]" class="m11_5" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m11_6']; ?>" name="step1[m11_6]" class="m11_6" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m11_7']; ?>" name="step1[m11_7]" class="m11_7" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m11_8']; ?>" name="step1[m11_8]" class="m11_8" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m11_9']; ?>" name="step1[m11_9]" class="m11_9" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m11_10']; ?>" name="step1[m11_10]" class="m11_10" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m11_11']; ?>" name="step1[m11_11]" class="m11_11" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m11_12']; ?>" name="step1[m11_12]" class="m11_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> B.Set </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b11_1']; ?>" name="step1[b11_1]" class="b11_1" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b11_2']; ?>" name="step1[b11_2]" class="b11_2" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b11_3']; ?>" name="step1[b11_3]" class="b11_3" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b11_4']; ?>" name="step1[b11_4]" class="b11_4" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b11_5']; ?>" name="step1[b11_5]" class="b11_5" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b11_6']; ?>" name="step1[b11_6]" class="b11_6" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b11_7']; ?>" name="step1[b11_7]" class="b11_7" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b11_8']; ?>" name="step1[b11_8]" class="b11_8" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b11_9']; ?>" name="step1[b11_9]" class="b11_9" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b11_10']; ?>" name="step1[b11_10]" class="b11_10" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b11_11']; ?>" name="step1[b11_11]" class="b11_11" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b11_12']; ?>" name="step1[b11_12]" class="b11_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> A.Set </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a11_1']; ?>" name="step1[a11_1]" class="a11_1" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a11_2']; ?>" name="step1[a11_2]" class="a11_2" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a11_3']; ?>" name="step1[a11_3]" class="a11_3" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a11_4']; ?>" name="step1[a11_4]" class="a11_4" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a11_5']; ?>" name="step1[a11_5]" class="a11_5" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a11_6']; ?>" name="step1[a11_6]" class="a11_6" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a11_7']; ?>" name="step1[a11_7]" class="a11_7" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a11_8']; ?>" name="step1[a11_8]" class="a11_8" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a11_9']; ?>" name="step1[a11_9]" class="a11_9" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a11_10']; ?>" name="step1[a11_10]" class="a11_10" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a11_11']; ?>" name="step1[a11_11]" class="a11_11" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a11_12']; ?>" name="step1[a11_12]" class="a11_12" ></td>
        </tr>
      </tbody>
    </table>
    <div class="c_refress_blog">
      <div class="c_overflow">
<!--        <div class="c_ref_btn">
          <button class="btn btn-sm btn-success" type="reset"><i class="fa fa-repeat"></i>Refresh</button>
        </div>-->
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
          <td class="text-center"><input type="text" name="step1[temp12]" class="temp12" value="<?php if(isset($tempdata[11])){ echo $tempdata[11]['setpoint'];} ?>"></td>
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
          <td class="text-center"><input type="text" name="step1[res12]" class="res12"></td>
          <td class="text-center">Accuracy </td>
          <td class="text-center"><input type="text" name="step1[acc12]" class="acc12"></td>
          <td class="text-center">Count </td>
          <td class="text-center"><input type="text" name="step1[count12]" class="count12"></td>
          <td class="text-center">Uncertainty </td>
          <td class="text-center"><input type="text" name="step1[uncert12]" class="uncert12"></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> Master </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m12_1']; ?>" name="step1[m12_1]" class="m12_1" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m12_2']; ?>" name="step1[m12_2]" class="m12_2" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m12_3']; ?>" name="step1[m12_3]" class="m12_3" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m12_4']; ?>" name="step1[m12_4]" class="m12_4" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m12_5']; ?>" name="step1[m12_5]" class="m12_5" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m12_6']; ?>" name="step1[m12_6]" class="m12_6" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m12_7']; ?>" name="step1[m12_7]" class="m12_7" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m12_8']; ?>" name="step1[m12_8]" class="m12_8" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m12_9']; ?>" name="step1[m12_9]" class="m12_9" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m12_10']; ?>" name="step1[m12_10]" class="m12_10" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m12_11']; ?>" name="step1[m12_11]" class="m12_11" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m12_12']; ?>" name="step1[m12_12]" class="m12_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> B.Set </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b12_1']; ?>" name="step1[b12_1]" class="b12_1" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b12_2']; ?>" name="step1[b12_2]" class="b12_2" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b12_3']; ?>" name="step1[b12_3]" class="b12_3" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b12_4']; ?>" name="step1[b12_4]" class="b12_4" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b12_5']; ?>" name="step1[b12_5]" class="b12_5" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b12_6']; ?>" name="step1[b12_6]" class="b12_6" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b12_7']; ?>" name="step1[b12_7]" class="b12_7" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b12_8']; ?>" name="step1[b12_8]" class="b12_8" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b12_9']; ?>" name="step1[b12_9]" class="b12_9" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b12_10']; ?>" name="step1[b12_10]" class="b12_10" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b12_11']; ?>" name="step1[b12_11]" class="b12_11" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b12_12']; ?>" name="step1[b12_12]" class="b12_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> A.Set </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a12_1']; ?>" name="step1[a12_1]" class="a12_1" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a12_2']; ?>" name="step1[a12_2]" class="a12_2" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a12_3']; ?>" name="step1[a12_3]" class="a12_3" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a12_4']; ?>" name="step1[a12_4]" class="a12_4" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a12_5']; ?>" name="step1[a12_5]" class="a12_5" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a12_6']; ?>" name="step1[a12_6]" class="a12_6" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a12_7']; ?>" name="step1[a12_7]" class="a12_7" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a12_8']; ?>" name="step1[a12_8]" class="a12_8" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a12_9']; ?>" name="step1[a12_9]" class="a12_9" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a12_10']; ?>" name="step1[a12_10]" class="a12_10" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a12_11']; ?>" name="step1[a12_11]" class="a12_11" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a12_12']; ?>" name="step1[a12_12]" class="a12_12" ></td>
        </tr>
      </tbody>
    </table>
    <div class="c_refress_blog">
      <div class="c_overflow">
<!--        <div class="c_ref_btn">
          <button class="btn btn-sm btn-success" type="reset"><i class="fa fa-repeat"></i>Refresh</button>
        </div>-->
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
          <td class="text-center"><input type="text" name="step1[temp13]" class="temp13" value="<?php if(isset($tempdata[12])){ echo $tempdata[12]['setpoint'];} ?>"></td>
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
          <td class="text-center"><input type="text" name="step1[res13]" class="res13"></td>
          <td class="text-center">Accuracy </td>
          <td class="text-center"><input type="text" name="step1[acc13]" class="acc13"></td>
          <td class="text-center">Count </td>
          <td class="text-center"><input type="text" name="step1[count13]" class="count13"></td>
          <td class="text-center">Uncertainty </td>
          <td class="text-center"><input type="text" name="step1[uncert13]" class="uncert13"></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> Master </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m13_1']; ?>" name="step1[m13_1]" class="m13_1" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m13_2']; ?>" name="step1[m13_2]" class="m13_2" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m13_3']; ?>" name="step1[m13_3]" class="m13_3" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m13_4']; ?>" name="step1[m13_4]" class="m13_4" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m13_5']; ?>" name="step1[m13_5]" class="m13_5" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m13_6']; ?>" name="step1[m13_6]" class="m13_6" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m13_7']; ?>" name="step1[m13_7]" class="m13_7" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m13_8']; ?>" name="step1[m13_8]" class="m13_8" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m13_9']; ?>" name="step1[m13_9]" class="m13_9" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m13_10']; ?>" name="step1[m13_10]" class="m13_10" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m13_11']; ?>" name="step1[m13_11]" class="m13_11" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m13_12']; ?>" name="step1[m13_12]" class="m13_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> B.Set </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b13_1']; ?>" name="step1[b13_1]" class="b13_1" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b13_2']; ?>" name="step1[b13_2]" class="b13_2" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b13_3']; ?>" name="step1[b13_3]" class="b13_3" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b13_4']; ?>" name="step1[b13_4]" class="b13_4" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b13_5']; ?>" name="step1[b13_5]" class="b13_5" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b13_6']; ?>" name="step1[b13_6]" class="b13_6" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b13_7']; ?>" name="step1[b13_7]" class="b13_7" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b13_8']; ?>" name="step1[b13_8]" class="b13_8" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b13_9']; ?>" name="step1[b13_9]" class="b13_9" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b13_10']; ?>" name="step1[b13_10]" class="b13_10" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b13_11']; ?>" name="step1[b13_11]" class="b13_11" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b13_12']; ?>" name="step1[b13_12]" class="b13_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> A.Set </td>
         <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a13_1']; ?>" name="step1[a13_1]" class="a13_1" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a13_2']; ?>" name="step1[a13_2]" class="a13_2" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a13_3']; ?>" name="step1[a13_3]" class="a13_3" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a13_4']; ?>" name="step1[a13_4]" class="a13_4" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a13_5']; ?>" name="step1[a13_5]" class="a13_5" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a13_6']; ?>" name="step1[a13_6]" class="a13_6" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a13_7']; ?>" name="step1[a13_7]" class="a13_7" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a13_8']; ?>" name="step1[a13_8]" class="a13_8" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a13_9']; ?>" name="step1[a13_9]" class="a13_9" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a13_10']; ?>" name="step1[a13_10]" class="a13_10" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a13_11']; ?>" name="step1[a13_11]" class="a13_11" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a13_12']; ?>" name="step1[a13_12]" class="a13_12" ></td>
        </tr>
      </tbody>
    </table>
    <div class="c_refress_blog">
      <div class="c_overflow">
<!--        <div class="c_ref_btn">
          <button class="btn btn-sm btn-success" type="reset"><i class="fa fa-repeat"></i>Refresh</button>
        </div>-->
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
          <td class="text-center"><input type="text" name="step1[temp14]" class="temp14" value="<?php if(isset($tempdata[13])){ echo $tempdata[13]['setpoint'];} ?>"></td>
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
          <td class="text-center"><input type="text" name="step1[res14]" class="res14"></td>
          <td class="text-center">Accuracy </td>
          <td class="text-center"><input type="text" name="step1[acc14]" class="acc14"></td>
          <td class="text-center">Count </td>
          <td class="text-center"><input type="text" name="step1[count14]" class="count14"></td>
          <td class="text-center">Uncertainty </td>
          <td class="text-center"><input type="text" name="step1[uncert14]" class="uncert14"></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> Master </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m14_1']; ?>" name="step1[m14_1]" class="m14_1" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m14_2']; ?>" name="step1[m14_2]" class="m14_2" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m14_3']; ?>" name="step1[m14_3]" class="m14_3" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m14_4']; ?>" name="step1[m14_4]" class="m14_4" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m14_5']; ?>" name="step1[m14_5]" class="m14_5" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m14_6']; ?>" name="step1[m14_6]" class="m14_6" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m14_7']; ?>" name="step1[m14_7]" class="m14_7" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m14_8']; ?>" name="step1[m14_8]" class="m14_8" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m14_9']; ?>" name="step1[m14_9]" class="m14_9" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m14_10']; ?>" name="step1[m14_10]" class="m14_10" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m14_11']; ?>" name="step1[m14_11]" class="m14_11" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m14_12']; ?>" name="step1[m14_12]" class="m14_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> B.Set </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b14_1']; ?>" name="step1[b14_1]" class="b14_1" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b14_2']; ?>" name="step1[b14_2]" class="b14_2" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b14_3']; ?>" name="step1[b14_3]" class="b14_3" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b14_4']; ?>" name="step1[b14_4]" class="b14_4" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b14_5']; ?>" name="step1[b14_5]" class="b14_5" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b14_6']; ?>" name="step1[b14_6]" class="b14_6" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b14_7']; ?>" name="step1[b14_7]" class="b14_7" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b14_8']; ?>" name="step1[b14_8]" class="b14_8" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b14_9']; ?>" name="step1[b14_9]" class="b14_9" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b14_10']; ?>" name="step1[b14_10]" class="b14_10" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b14_11']; ?>" name="step1[b14_11]" class="b14_11" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b14_12']; ?>" name="step1[b14_12]" class="b14_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> A.Set </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a14_1']; ?>" name="step1[a14_1]" class="a14_1" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a14_2']; ?>" name="step1[a14_2]" class="a14_2" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a14_3']; ?>" name="step1[a14_3]" class="a14_3" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a14_4']; ?>" name="step1[a14_4]" class="a14_4" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a14_5']; ?>" name="step1[a14_5]" class="a14_5" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a14_6']; ?>" name="step1[a14_6]" class="a14_6" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a14_7']; ?>" name="step1[a14_7]" class="a14_7" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a14_8']; ?>" name="step1[a14_8]" class="a14_8" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a14_9']; ?>" name="step1[a14_9]" class="a14_9" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a14_10']; ?>" name="step1[a14_10]" class="a14_10" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a14_11']; ?>" name="step1[a14_11]" class="a14_11" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a14_12']; ?>" name="step1[a14_12]" class="a14_12" ></td>
        </tr>
      </tbody>
    </table>
    <div class="c_refress_blog">
      <div class="c_overflow">
<!--        <div class="c_ref_btn">
          <button class="btn btn-sm btn-success" type="reset"><i class="fa fa-repeat"></i>Refresh</button>
        </div>-->
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
          <td class="text-center"><input type="text" name="step1[temp15]" class="temp15"  value="<?php if(isset($tempdata[14])){ echo $tempdata[14]['setpoint'];} ?>"></td>
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
          <td class="text-center"><input type="text" name="step1[res15]" class="res15"></td>
          <td class="text-center">Accuracy </td>
          <td class="text-center"><input type="text" name="step1[acc15]" class="acc15"></td>
          <td class="text-center">Count </td>
          <td class="text-center"><input type="text" name="step1[count15]" class="count15"></td>
          <td class="text-center">Uncertainty </td>
          <td class="text-center"><input type="text" name="step1[uncert15]" class="uncert15"></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> Master </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m15_1']; ?>" name="step1[m15_1]" class="m15_1" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m15_2']; ?>" name="step1[m15_2]" class="m15_2" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m15_3']; ?>" name="step1[m15_3]" class="m15_3" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m15_4']; ?>" name="step1[m15_4]" class="m15_4" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m15_5']; ?>" name="step1[m15_5]" class="m15_5" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m15_6']; ?>" name="step1[m15_6]" class="m15_6" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m15_7']; ?>" name="step1[m15_7]" class="m15_7" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m15_8']; ?>" name="step1[m15_8]" class="m15_8" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m15_9']; ?>" name="step1[m15_9]" class="m15_9" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m15_10']; ?>" name="step1[m15_10]" class="m15_10" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m15_11']; ?>" name="step1[m15_11]" class="m15_11" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['m15_12']; ?>" name="step1[m15_12]" class="m15_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> B.Set </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b15_1']; ?>" name="step1[b15_1]" class="b15_1" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b15_2']; ?>" name="step1[b15_2]" class="b15_2" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b15_3']; ?>" name="step1[b15_3]" class="b15_3" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b15_4']; ?>" name="step1[b15_4]" class="b15_4" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b15_5']; ?>" name="step1[b15_5]" class="b15_5" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b15_6']; ?>" name="step1[b15_6]" class="b15_6" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b15_7']; ?>" name="step1[b15_7]" class="b15_7" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b15_8']; ?>" name="step1[b15_8]" class="b15_8" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b15_9']; ?>" name="step1[b15_9]" class="b15_9" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b15_10']; ?>" name="step1[b15_10]" class="b15_10" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b15_11']; ?>" name="step1[b15_11]" class="b15_11" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['b15_12']; ?>" name="step1[b15_12]" class="b15_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> A.Set </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a15_1']; ?>" name="step1[a15_1]" class="a15_1" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a15_2']; ?>" name="step1[a15_2]" class="a15_2" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a15_3']; ?>" name="step1[a15_3]" class="a15_3" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a15_4']; ?>" name="step1[a15_4]" class="a15_4" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a15_5']; ?>" name="step1[a15_5]" class="a15_5" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a15_6']; ?>" name="step1[a15_6]" class="a15_6" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a15_7']; ?>" name="step1[a15_7]" class="a15_7" > </td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a15_8']; ?>" name="step1[a15_8]" class="a15_8" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a15_9']; ?>" name="step1[a15_9]" class="a15_9" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a15_10']; ?>" name="step1[a15_10]" class="a15_10" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a15_11']; ?>" name="step1[a15_11]" class="a15_11" ></td>
          <td class="text-center"><input type="text" value="<?php echo $cert['Tempcertificatedata']['a15_12']; ?>" name="step1[a15_12]" class="a15_12" ></td>
        </tr>
      </tbody>
    </table>
    <div class="c_refress_blog">
      <div class="c_overflow">
<!--        <div class="c_ref_btn">
          <button class="btn btn-sm btn-success" type="reset"><i class="fa fa-repeat"></i>Refresh</button>
        </div>-->
        <?php foreach($uncertainty as $uncertainty_data){ ?>
        <div class="c_refress_blog_input">
          <input type="checkbox" id="<?php echo $uncertainty_data['Tempuncertainty']['id'] ;?>" name="step1[uncertainty15_val]" class="uncertainty15_val" value="<?php echo $uncertainty_data['Tempuncertainty']['id'] ;?>">
          <label><?php echo $uncertainty_data['Tempuncertainty']['tagno']; ?></label>
        </div>
          <?php } ?>
      </div>
    </div>
  </div>
  </div>
<!--</div>-->


























<!--------------------------------    Form 1     ------------------------------------->

</div>
<div class="tab-pane" id="tab2">
    <?php ?>

<div class="c_form1">
  <div class="form-group">
    <label for="val_customername" class="col-md-2 control-label">Certificate No</label>
    <div class="col-md-2"> <?php echo $this->Form->input('certificateno', array('id' => 'val_certificateno','class' => 'form-control', 'label' => false, 'placeholder' => '','readonly'=>true, 'value'=>$get_cert_sales['Tempcertificate']['certificate_no'])); ?> </div>
    <label for="val_duedate" class="col-md-2 control-label">Manufacturer </label>
    <div class="col-md-2">
      <?php 
                echo $this->Form->input('manufacturer', array('id' => 'val_manufacturer', 'class' => 'form-control',
            'placeholder' => 'Enter Remarks', 'label' => false,'type'=>'textarea', 'rows'=>'2','readonly'=>true, 'value'=>$cert1_main_data['Brand']['brandname']));
            ?>
    </div>
    <label for="val_attn" class="col-md-2 control-label">Date Calibrated</label>
    <?php if(isset($get_cert_sales['Tempcertificate']['date_calibrated'])) { ?>
    <div class="col-md-2"> <?php echo $this->Form->input('Tempformdata.date_calibrated', array('id' => 'val_date_calibrated', 'class' => 'form-control input-datepicker-close', 'data-date-format' => 'dd-MM-yy', 'label' => false,'value'=>$get_cert_sales['Tempcertificate']['date_calibrated']));?> </div>
    <?php } else { ?>
    <div class="col-md-2"> <?php echo $this->Form->input('Tempformdata.date_calibrated', array('id' => 'val_date_calibrated', 'class' => 'form-control input-datepicker-close', 'data-date-format' => 'dd-MM-yy', 'label' => false,'value'=>$cert1_main_data['Salesorder']['in_date']));?> </div>
    <?php } ?>
  </div>
  <div class="form-group">
    <label for="val_customername" class="col-md-2 control-label">SalesOrderID</label>
    <div class="col-md-2"> <?php echo $this->Form->input('salesorderid', array('id' => 'val_salesorderid','class' => 'form-control', 'label' => false, 'placeholder' => '','readonly'=>true, 'value'=>$cert1_main_data['Description']['salesorder_id'])); ?> </div>
    <label for="val_duedate" class="col-md-2 control-label">Model No </label>
    <div class="col-md-2"> <?php echo $this->Form->input('modelno ', array('id' => 'val_modelno','class' => 'form-control', 'label' => false, 'placeholder' => '','readonly'=>true, 'value'=>$cert1_main_data['Description']['model_no'])); ?> </div>
    <label for="val_attn" class="col-md-2 control-label">Due Date</label>
    <?php if(isset($get_cert_sales['Tempcertificate']['due_date'])) { ?>
    <div class="col-md-2"> <?php echo $this->Form->input('Tempformdata.due_date', array('id' => 'val_due_date', 'class' => 'form-control input-datepicker-close', 'data-date-format' => 'dd-MM-yy', 'label' => false,'value'=>$get_cert_sales['Tempcertificate']['due_date']));?> </div>
    <?php } else { ?>
    <div class="col-md-2"> <?php echo $this->Form->input('Tempformdata.due_date', array('id' => 'val_due_date', 'class' => 'form-control input-datepicker-close', 'data-date-format' => 'dd-MM-yy', 'label' => false,'value'=>$cert1_main_data['Salesorder']['due_date']));?> </div>
    <?php } ?>
  </div>
  <div class="form-group">
    <label for="val_customername" class="col-md-2 control-label">Customer</label>
    <div class="col-md-2">
      <?php
                echo $this->Form->input('customer', array('id' => 'val_customer', 'class' => 'form-control',
             'label' => false,'type'=>'textarea', 'rows'=>'2','readonly'=>true,'value'=>$cert1_main_data['Salesorder']['customername']));
            ?>
    </div>
    <label for="val_duedate" class="col-md-2 control-label">Serial No </label>
    <div class="col-md-2"> <?php echo $this->Form->input('serialno', array('id' => 'val_serialno','class' => 'form-control', 'label' => false, 'placeholder' => '','readonly'=>true, 'value'=>'TC-950')); ?> </div>
    <label for="val_attn" class="col-md-2 control-label">Range</label>
    <div class="col-md-2">
      <?php
                echo $this->Form->input('range', array('id' => 'val_range', 'class' => 'form-control',
            'placeholder' => 'Enter Remarks', 'label' => false,'type'=>'textarea', 'rows'=>'2','readonly'=>true, 'value'=>$cert1_main_data['Range']['range_name']));
            ?>
    </div>
  </div>
  <div class="form-group">
    <label for="val_customername" class="col-md-2 control-label">Instrument</label>
    <div class="col-md-2">
      <?php
                echo $this->Form->input('instrument', array('id' => 'val_instrument', 'class' => 'form-control',
             'label' => false,'type'=>'textarea', 'rows'=>'2','readonly'=>true,'value'=>$cert1_main_data['Instrument']['name']));
            ?>
    </div>
    
    <label for="val_duedate" class="col-md-2 control-label">Temperature </label>
    <div class="col-md-2"> <?php echo $this->Form->input('Tempformdata.temperature', array('id' => 'val_temperature', 'class' => 'form-control', 'label' => false, 'type' => 'select','empty'=>'Select Temperature', 'options' => $temp_temperature ,'value'=>$get_cert_sales['Tempcertificate']['temperature'])); ?> </div>
    <label for="val_attn" class="col-md-2 control-label">Humidity</label>
    <div class="col-md-2"> <?php echo $this->Form->input('Tempformdata.humidity', array('id' => 'val_humidity', 'class' => 'form-control', 'label' => false, 'type' => 'select','empty'=>'Select Humidity', 'options' => $rel_humidity,'value'=>$get_cert_sales['Tempcertificate']['humidity'])); ?> </div>
  </div>
  <div class="col-lg-12">
    <h4 class="sub-header"><small>The unit under test have been calibrated as per TECHNICAL PROCEDURE,</small></h4>
  </div>
  <div class="form-group">
    <div class="col-md-12">
        <?php if(isset($get_cert_sales['Tempcertificate']['formdata1'])) { 
    echo $this->Form->input('Tempformdata.formdata1', array('id' => 'val_formdata1', 'class' => 'form-control',
            'placeholder' => 'Enter Remarks', 'label' => false,'type'=>'textarea', 'rows'=>'2', 'value'=>$get_cert_sales['Tempcertificate']['formdata1']));
    } else { ?>
      <?php
      echo $this->Form->input('Tempformdata.formdata1', array('id' => 'val_formdata1', 'class' => 'form-control',
            'placeholder' => 'Enter Remarks', 'label' => false,'type'=>'textarea', 'rows'=>'2', 'value'=>$formdata['Tempformdata']['formdata1']));
    }?>
    </div>
  </div>
  <div class="form-group">
    <div class="col-md-12">
      <?php if(isset($get_cert_sales['Tempcertificate']['formdata2'])) { 
    echo $this->Form->input('Tempformdata.formdata2', array('id' => 'val_formdata2', 'class' => 'form-control',
            'placeholder' => 'Enter Remarks', 'label' => false,'type'=>'textarea', 'rows'=>'2', 'value'=>$get_cert_sales['Tempcertificate']['formdata2']));
    } else { ?>
      <?php
        echo $this->Form->input('Tempformdata.formdata2', array('id' => 'val_formdata2', 'class' => 'form-control',
            'placeholder' => 'Enter Remarks', 'label' => false,'type'=>'textarea', 'rows'=>'2', 'value'=>$formdata['Tempformdata']['formdata2']));
//                echo $this->Form->input('customer', array('id' => 'val_customer', 'class' => 'form-control',
//             'label' => false,'type'=>'textarea', 'rows'=>'2','value'=>'The reference measurement standards used are traceable to National Metrology Centre,(NMC,SINGAPORE)  and/or other National standards.'));
    }  ?>
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
    <div class="col-md-12">
      <label for="val_duedate" class="col-md-6 control-label">Instrument Cal Status </label>
      <div class="col-md-6"> <?php echo $this->Form->input('Tempformdata.instrument_cal_status', array('id' => 'val_instrument_cal_status', 'class' => 'form-control', 'label' => false, 'type' => 'select', 'empty' => '-- Select Instrument Cal Status --','options'=>$instrument_cal_status,'value'=>$get_cert_sales['Tempcertificate']['instrument_cal_status'])); ?> </div>
      </div>
      <div class="col-md-12">
        <label for="val_duedate" class="col-md-6 control-label">Instrument Cal Status Description </label>
        <div class="col-md-6">
          <?php
                echo $this->Form->input('Tempformdata.instrument_cal_description', array('id' => 'val_instrument_description', 'class' => 'form-control',
             'label' => false,'type'=>'textarea', 'rows'=>'2','value'=>$get_cert_sales['Tempcertificate']['instrument_cal_description']));
            ?>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6">
   <div class="form-group">
  <div class="col-md-12">
   
      <label for="val_duedate" class="col-md-6 control-label">Calibration Type</label>
      <div class="col-md-6"> <?php echo $this->Form->input('Tempformdata.calibrationtype', array('id' => 'val_calibrationtype','class' => 'form-control', 'label' => false, 'placeholder' => '','readonly'=>true, 'value'=>'Non-Singlas')); ?> </div>
      </div>
      <div class="col-md-12">
        <label for="val_duedate" class="col-md-6 control-label">Calibrated Status</label>
      <div class="col-md-6"> <?php echo $this->Form->input('Tempformdata.cal_status', array('id' => 'val_cal_status', 'class' => 'form-control', 'label' => false, 'type' => 'select', 'empty' => '-- Select Instrument Cal Status --','options'=>array('1'=>'Rejected','2'=>'Approved'),'value'=>$get_cert_sales['Tempcertificate']['cal_status'])); ?> </div>
      </div>
       <div class="col-md-12">
        <label for="val_duedate" class="col-md-6 control-label">Calibrated Status Description </label>
        <div class="col-md-6">
          <?php
                echo $this->Form->input('Tempformdata.cal_status_description', array('id' => 'val_cal_status_description', 'class' => 'form-control',
             'label' => false,'type'=>'textarea', 'rows'=>'2','value'=>$get_cert_sales['Tempcertificate']['cal_status_description']));
            ?>
        </div>
      </div>
      <div class="col-md-12">
        <label for="val_duedate" class="col-md-6 control-label">Approved Status</label>
      <div class="col-md-6"> <?php echo $this->Form->input('Tempformdata.approved_status', array('id' => 'val_approved_status', 'class' => 'form-control', 'label' => false, 'type' => 'select', 'empty' => '-- Select Approval Status --','options'=>array('1'=>'Rejected','2'=>'Approved'),'value'=>$get_cert_sales['Tempcertificate']['approved_status'])); ?> </div>
      </div>
    </div>
  </div>
</div>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
<!----------------------------------------------        Form2  --------------------------------->
</div>
                                                <div class="tab-pane" id="tab3">
                                                    <?php ?>

<div class="c_form1 c_form2">
  <div class="form-group">
    <label for="val_customername" class="col-md-2 control-label">Certificateno</label>
    <div class="col-md-10"> <?php echo $this->Form->input('certificateno', array('id' => 'val_certificateno','class' => 'form-control', 'label' => false, 'placeholder' => '','readonly'=>true, 'value'=>$get_cert_sales['Tempcertificate']['certificate_no'])); ?> </div>
  </div>
  <div class="form-group">
    <label for="val_customername" class="col-md-2 control-label">METHOD OF CALIBRATION</label>
    <div class="col-md-10">
       <?php if(isset($get_cert_sales['Tempcertificate']['methodofcal1'])) { 
    
                echo $this->Form->input('Tempformdata.methodofcal1', array('id' => 'val_method_calibration', 'class' => 'form-control',
            'placeholder' => 'Enter Remarks', 'label' => false,'type'=>'textarea', 'rows'=>'2', 'value'=>$get_cert_sales['Tempcertificate']['methodofcal1']));
    } else { ?>
      <?php
                echo $this->Form->input('Tempformdata.methodofcal1', array('id' => 'val_method_calibration', 'class' => 'form-control',
            'placeholder' => 'Enter Remarks', 'label' => false,'type'=>'textarea', 'rows'=>'2', 'value'=>$formdata['Tempformdata']['methodofcal1']));
    }  ?>
       <?php if(isset($get_cert_sales['Tempcertificate']['methodofcal2'])) { 
    
                 echo $this->Form->input('Tempformdata.methodofcal2', array('id' => 'val_method_calibration', 'class' => 'form-control',
            'placeholder' => 'Enter Remarks', 'label' => false,'type'=>'textarea', 'rows'=>'2', 'value'=>$get_cert_sales['Tempcertificate']['methodofcal2']));
    } else { ?>
      <?php
                echo $this->Form->input('Tempformdata.methodofcal2', array('id' => 'val_method_calibration', 'class' => 'form-control',
            'placeholder' => 'Enter Remarks', 'label' => false,'type'=>'textarea', 'rows'=>'2', 'value'=>$formdata['Tempformdata']['methodofcal2']));
            } ?>
    </div>
  </div>
  
  <div class="form-group">
    <label for="val_customername" class="col-md-2 control-label">RESULTS OF CALIBRATION</label>
    <div class="col-md-10">
      <?php if(isset($get_cert_sales['Tempcertificate']['resultofcal1'])) { 
    
                 echo $this->Form->input('Tempformdata.resultofcal1', array('id' => 'val_resultofcal1', 'class' => 'form-control',
            'placeholder' => 'Enter Remarks', 'label' => false,'type'=>'textarea', 'rows'=>'2', 'value'=>$get_cert_sales['Tempcertificate']['resultofcal1']));
    } else { ?>
      <?php
                echo $this->Form->input('Tempformdata.resultofcal1', array('id' => 'val_resultofcal1', 'class' => 'form-control',
            'placeholder' => 'Enter Remarks', 'label' => false,'type'=>'textarea', 'rows'=>'2', 'value'=>$formdata['Tempformdata']['resultofcal1']));
    }    ?>
      <?php if(isset($get_cert_sales['Tempcertificate']['resultofcal2'])) { 
    
                 echo $this->Form->input('Tempformdata.resultofcal2', array('id' => 'val_resultofcal2', 'class' => 'form-control',
            'placeholder' => 'Enter Remarks', 'label' => false,'type'=>'textarea', 'rows'=>'2', 'value'=>$get_cert_sales['Tempcertificate']['resultofcal2']));
    } else { ?>
      <?php
                echo $this->Form->input('Tempformdata.resultofcal2', array('id' => 'val_resultofcal2', 'class' => 'form-control',
            'placeholder' => 'Enter Remarks', 'label' => false,'type'=>'textarea', 'rows'=>'2', 'value'=>$formdata['Tempformdata']['resultofcal2']));
    } ?>
    </div>
  </div>
  
  <div class="form-group">
    <label for="val_customername" class="col-md-2 control-label">REMARKS</label>
    <div class="col-md-10">
       <?php if(isset($get_cert_sales['Tempcertificate']['remark1'])) { 
    
                 echo $this->Form->input('Tempformdata.remark1', array('id' => 'val_remark1', 'class' => 'form-control',
            'placeholder' => 'Enter Remarks', 'label' => false,'type'=>'textarea', 'rows'=>'2', 'value'=>$get_cert_sales['Tempcertificate']['remark1']));
    } else { ?>
      <?php
                echo $this->Form->input('Tempformdata.remark1', array('id' => 'val_remark1', 'class' => 'form-control',
            'placeholder' => 'Enter Remarks', 'label' => false,'type'=>'textarea', 'rows'=>'2', 'value'=>$formdata['Tempformdata']['remark1']));
    } ?>
       <?php if(isset($get_cert_sales['Tempcertificate']['remark2'])) { 
    
                 echo $this->Form->input('Tempformdata.remark2', array('id' => 'val_remark2', 'class' => 'form-control',
            'placeholder' => 'Enter Remarks', 'label' => false,'type'=>'textarea', 'rows'=>'2', 'value'=>$get_cert_sales['Tempcertificate']['remark2']));
    } else { ?>
      <?php
                echo $this->Form->input('Tempformdata.remark2', array('id' => 'val_remark2', 'class' => 'form-control',
            'placeholder' => 'Enter Remarks', 'label' => false,'type'=>'textarea', 'rows'=>'2', 'value'=>$formdata['Tempformdata']['remark2']));
    } ?>
            
            <?php if(isset($get_cert_sales['Tempcertificate']['remark3'])) { 
    
                 echo $this->Form->input('Tempformdata.remark3', array('id' => 'val_remark3', 'class' => 'form-control',
            'placeholder' => 'Enter Remarks', 'label' => false,'type'=>'textarea', 'rows'=>'2', 'value'=>$get_cert_sales['Tempcertificate']['remark3']));
    } else { ?>
      <?php
                echo $this->Form->input('Tempformdata.remark3', array('id' => 'val_remark3', 'class' => 'form-control',
            'placeholder' => 'Enter Remarks', 'label' => false,'type'=>'textarea', 'rows'=>'2', 'value'=>$formdata['Tempformdata']['remark3']));
    }  ?>
            
            <?php if(isset($get_cert_sales['Tempcertificate']['remark4'])) { 
    
                     echo $this->Form->input('Tempformdata.remark4', array('id' => 'val_remark4', 'class' => 'form-control',
            'placeholder' => 'Enter Remarks', 'label' => false,'type'=>'textarea', 'rows'=>'2', 'value'=>$get_cert_sales['Tempcertificate']['remark4']));
    } else { ?>
      <?php
                echo $this->Form->input('Tempformdata.remark4', array('id' => 'val_remark4', 'class' => 'form-control',
            'placeholder' => 'Enter Remarks', 'label' => false,'type'=>'textarea', 'rows'=>'2', 'value'=>$formdata['Tempformdata']['remark4']));
    } ?>
           <?php if(isset($get_cert_sales['Tempcertificate']['remark5'])) { 
    
                 echo $this->Form->input('Tempformdata.remark5', array('id' => 'val_remark5', 'class' => 'form-control',
            'placeholder' => 'Enter Remarks', 'label' => false,'type'=>'textarea', 'rows'=>'2', 'value'=>$get_cert_sales['Tempcertificate']['remark5']));
    } else { ?>
      <?php
                echo $this->Form->input('Tempformdata.remark5', array('id' => 'val_remark5', 'class' => 'form-control',
            'placeholder' => 'Enter Remarks', 'label' => false,'type'=>'textarea', 'rows'=>'2', 'value'=>$formdata['Tempformdata']['remark5']));
    }  ?>
            
            <?php if(isset($get_cert_sales['Tempcertificate']['remark6'])) { 
    
                echo $this->Form->input('Tempformdata.remark6', array('id' => 'val_remark6', 'class' => 'form-control',
            'placeholder' => 'Enter Remarks', 'label' => false,'type'=>'textarea', 'rows'=>'2', 'value'=>$get_cert_sales['Tempcertificate']['remark6']));
    } else { ?>
      <?php
                echo $this->Form->input('Tempformdata.remark6', array('id' => 'val_remark6', 'class' => 'form-control',
            'placeholder' => 'Enter Remarks', 'label' => false,'type'=>'textarea', 'rows'=>'2', 'value'=>$formdata['Tempformdata']['remark6']));
    }  ?>
            
            <?php if(isset($get_cert_sales['Tempcertificate']['remark7'])) { 
    
                echo $this->Form->input('Tempformdata.remark7', array('id' => 'val_remark7', 'class' => 'form-control',
            'placeholder' => 'Enter Remarks', 'label' => false,'type'=>'textarea', 'rows'=>'2', 'value'=>$get_cert_sales['Tempcertificate']['remark7']));
    } else { ?>
      <?php
                echo $this->Form->input('Tempformdata.remark7', array('id' => 'val_remark7', 'class' => 'form-control',
            'placeholder' => 'Enter Remarks', 'label' => false,'type'=>'textarea', 'rows'=>'2', 'value'=>$formdata['Tempformdata']['remark7']));
    }  ?>
             <?php if(isset($get_cert_sales['Tempcertificate']['remark8'])) { 
    
                  echo $this->Form->input('Tempformdata.remark8', array('id' => 'val_remark8', 'class' => 'form-control',
            'placeholder' => 'Enter Remarks', 'label' => false,'type'=>'textarea', 'rows'=>'2', 'value'=>$get_cert_sales['Tempcertificate']['remark8']));
    } else { ?>
      <?php
                echo $this->Form->input('Tempformdata.remark8', array('id' => 'val_remark8', 'class' => 'form-control',
            'placeholder' => 'Enter Remarks', 'label' => false,'type'=>'textarea', 'rows'=>'2', 'value'=>$formdata['Tempformdata']['remark8']));
    }  ?>
             
            
    </div>
  </div>
</div>
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
<!----------------------------------------- Uncertainty ------------------------------------------>

</div>
                                               
<?php //echo $this->Form->end(); ?>
<div class="tab-pane" id="tab4">
    
    <?php ?>

<div class="uncertainly_tab">
  <div class="col-sm-3 col-lg-12 subcontract_linear uncertainly_table">
    <h4>SOURCES OF UNCERTAINTY</h4>
    <!--SOURCES OF UNCERTAINTY TABLE-->
    <table  class="table table-vcenter table-condensed table-bordered">
      <thead>
        <tr class="c_dark_bg">
          <th class="text-center">R.No</th>
          <th class="text-center">RNo</th>
          <th class="text-center">SetTemp</th>
          <th class="text-center">R1</th>
          <th class="text-center">R2</th>
          <th class="text-center">R3</th>
          <th class="text-center">R4</th>
          <th class="text-center">R5</th>
          <th class="text-center">R6</th>
          <th class="text-center">R7</th>
          <th class="text-center">R8</th>
          <th class="text-center">R9</th>
          <th class="text-center">R10</th>
          <th class="text-center">AVG1</th>
          <th class="text-center">AVG2</th>
          <th class="text-center">AVG3</th>
          <th class="text-center">URep1</th>
          <th class="text-center">URep2</th>
          <th class="text-center">URep3</th>
          <th class="text-center">URes</th>
          <th class="text-center">UnCert</th>
          <th class="text-center">Count</th>
          <th class="text-center">Accuracy</th>
          <th class="text-center">IsAnalog</th>
          <th class="text-center">IsAfterAd</th>
        </tr>
      </thead>
      <tbody class="calcul1_instrument_info">
          <?php //foreach($cert as $k=>$cert_all) { ?>
          <?php for($j = 1; $j<=15; $j++){
          if(isset($cert['Tempcertificatedata']['temp'.$j]) && isset($cert['Tempcertificatedata']['uncert'.$j]))
          {
          for($i=1;$i<=3;$i++)
          { ?>
          <tr class="text-center">
          <td class="text-center"><?php echo $j ?></td>
          <td class="text-center"><?php echo $i; ?></td>
          <td class="text-center"><?php echo $cert['Tempcertificatedata']['temp'.$j];?></td>
          <td class="text-center"><?php if($i==1){echo $cert['Tempcertificatedata']['m'.$j.'_1'];}if($i==2){echo $cert['Tempcertificatedata']['b'.$j.'_1'];}else{echo $cert['Tempcertificatedata']['a'.$j.'_1'];} ?></td>
          <td class="text-center"><?php if($i==1){echo $cert['Tempcertificatedata']['m'.$j.'_2'];}if($i==2){echo $cert['Tempcertificatedata']['b'.$j.'_2'];}else{echo $cert['Tempcertificatedata']['a'.$j.'_2'];} ?></td>
          <td class="text-center"><?php if($i==1){echo $cert['Tempcertificatedata']['m'.$j.'_3'];}if($i==2){echo $cert['Tempcertificatedata']['b'.$j.'_3'];}else{echo $cert['Tempcertificatedata']['a'.$j.'_3'];} ?></td>
          <td class="text-center"><?php if($i==1){echo $cert['Tempcertificatedata']['m'.$j.'_4'];}if($i==2){echo $cert['Tempcertificatedata']['b'.$j.'_4'];}else{echo $cert['Tempcertificatedata']['a'.$j.'_4'];} ?></td>
          <td class="text-center"><?php if($i==1){echo $cert['Tempcertificatedata']['m'.$j.'_5'];}if($i==2){echo $cert['Tempcertificatedata']['b'.$j.'_5'];}else{echo $cert['Tempcertificatedata']['a'.$j.'_5'];} ?></td>
          <td class="text-center"><?php if($i==1){echo $cert['Tempcertificatedata']['m'.$j.'_6'];}if($i==2){echo $cert['Tempcertificatedata']['b'.$j.'_6'];}else{echo $cert['Tempcertificatedata']['a'.$j.'_6'];} ?></td>
          <td class="text-center"><?php if($i==1){echo $cert['Tempcertificatedata']['m'.$j.'_7'];}if($i==2){echo $cert['Tempcertificatedata']['b'.$j.'_7'];}else{echo $cert['Tempcertificatedata']['a'.$j.'_7'];} ?></td>
          <td class="text-center"><?php if($i==1){echo $cert['Tempcertificatedata']['m'.$j.'_8'];}if($i==2){echo $cert['Tempcertificatedata']['b'.$j.'_8'];}else{echo $cert['Tempcertificatedata']['a'.$j.'_8'];} ?></td>
          <td class="text-center"><?php if($i==1){echo $cert['Tempcertificatedata']['m'.$j.'_9'];}if($i==2){echo $cert['Tempcertificatedata']['b'.$j.'_9'];}else{echo $cert['Tempcertificatedata']['a'.$j.'_9'];} ?></td>
          <td class="text-center"><?php if($i==1){echo $cert['Tempcertificatedata']['m'.$j.'_10'];}if($i==2){echo $cert['Tempcertificatedata']['b'.$j.'_10'];}else{echo $cert['Tempcertificatedata']['a'.$j.'_10'];} ?></td>
          <td class="text-center"><?php if($i==1){echo $cert['Tempcertificatedata']['m'.$j.'_11'];}if($i==2){echo $cert['Tempcertificatedata']['b'.$j.'_11'];}else{echo $cert['Tempcertificatedata']['a'.$j.'_11'];} ?></td>
          <td class="text-center"><?php if($i==1){echo $cert['Tempcertificatedata']['m'.($j+1).'_11'];}if($i==2){echo $cert['Tempcertificatedata']['b'.($j+1).'_11'];}else{echo $cert['Tempcertificatedata']['a'.($j+1).'_11'];} ?></td>
          <td class="text-center"><?php if($i==1){echo $cert['Tempcertificatedata']['m'.($j+2).'_11'];}if($i==2){echo $cert['Tempcertificatedata']['b'.($j+2).'_11'];}else{echo $cert['Tempcertificatedata']['a'.($j+2).'_11'];} ?></td>
          <td class="text-center"><?php if($i==1){echo $cert['Tempcertificatedata']['m'.$j.'_13'];}if($i==2){echo $cert['Tempcertificatedata']['b'.$j.'_13'];}else{echo $cert['Tempcertificatedata']['a'.$j.'_13'];} ?></td>
          <td class="text-center"><?php if($i==1){echo $cert['Tempcertificatedata']['m'.($j+1).'_13'];}if($i==2){echo $cert['Tempcertificatedata']['b'.($j+1).'_13'];}else{echo $cert['Tempcertificatedata']['a'.($j+1).'_13'];} ?></td>
          <td class="text-center"><?php if($i==1){echo $cert['Tempcertificatedata']['m'.($j+2).'_13'];}if($i==2){echo $cert['Tempcertificatedata']['b'.($j+2).'_13'];}else{echo $cert['Tempcertificatedata']['a'.($j+2).'_13'];} ?></td>
          <td class="text-center"><?php echo $cert['Tempcertificatedata']['res'.$j]; ?></td> 
          <td class="text-center"><?php echo $cert['Tempcertificatedata']['uncert'.$j]; ?></td>
          <td class="text-center"><?php echo $cert['Tempcertificatedata']['count'.$j]; ?></td>
          <td class="text-center"><?php echo $cert['Tempcertificatedata']['acc'.$j]; ?></td>
          <td class="text-center"><?php echo $cert['Tempcertificatedata']['is_analog']; ?></td>
          <td class="text-center"><?php echo $cert['Tempcertificatedata']['is_afteradjust']; ?></td>
          </tr>
          <?php } 
          
          }
          }?>
      </tbody>
    </table>
  </div>
  <div class="col-sm-3 col-lg-12 subcontract_linear uncertainly_table">
    <h4>EXPANDED UNCERTAINTY</h4>
    <!--EXPANDED UNCERTAINTY TABLE-->
    <table  class="table table-vcenter table-condensed table-bordered">
      <thead>
        <tr class="c_dark_bg">
          <th class="text-center">Tag no</th>
          <th class="text-center">Name</th>
          <th class="text-center">TempInstrumentDataID</th>
          <th class="text-center">SNo</th>
          <th class="text-center">Range</th>
          <th class="text-center">uref1</th>
          <th class="text-center">uref2</th>
          <th class="text-center">uref3</th>
          <th class="text-center">uacc1</th>
          <th class="text-center">uacc2</th>
          <th class="text-center">uacc3</th>
          <th class="text-center">urefdivisor</th>
          <th class="text-center">uresdivisoranalog</th>
          <th class="text-center">uresdivisordigital</th>
          <th class="text-center">urepdivisor</th>
          <th class="text-center">divisor</th>
          <th class="text-center">uicestability</th>
          <th class="text-center">ustability</th>
          <th class="text-center">uuniformity</th>
          <th class="text-center">udrift</th>
          <th class="text-center">uimm</th>
          <th class="text-center">uheateffect</th>
          <th class="text-center">ugravity</th>
          <th class="text-center">uother1</th>
          <th class="text-center">uother2</th>
          <th class="text-center">uother3</th>
          <th class="text-center">uother4</th>
          <th class="text-center">uother5</th>
          <th class="text-center">uother6</th>
          <th class="text-center">uother7</th>
          <th class="text-center">uother8</th>
          <th class="text-center">uother9</th>
          <th class="text-center">uother10</th>
          <th class="text-center">uother11</th>
          <th class="text-center">uother12</th>
          <th class="text-center">uother13</th>
        </tr>
      </thead>
      <tbody class="calcul2_instrument_info">
          <?php if(isset($uncertaintyda)) { foreach($uncertaintyda as $uncertainty){  ?>
          <tr class="text-center">
          <td class="text-center"><?php echo $uncertainty['Tempuncertaintydata']['count']; ?></td>
          <td class="text-center"></td>
          <td class="text-center"></td>
          <td class="text-center"></td>
          <td class="text-center"><?php echo $uncertainty['Tempuncertaintydata']['rangename']; ?></td>
          <td class="text-center"><?php echo $uncertainty['Tempuncertaintydata']['uref1_data1']; ?></td>
          <td class="text-center"><?php echo $uncertainty['Tempuncertaintydata']['uref1_data2']; ?></td>
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
          </tr>
          <?php } } ?>
      </tbody>
    </table>
  </div>
  <div class="col-sm-3 col-lg-12 subcontract_linear uncertainly_table">
    <h4>UNCERTAINTY DATA</h4>
    <!--UNCERTAINTY DATA-->
    <table  class="table table-vcenter table-condensed table-bordered">
      <thead>
        <tr class="c_dark_bg">
          <th class="text-center">uc</th>
          <th class="text-center">dof</th>
          <th class="text-center">cf</th>
          <th class="text-center">uncert</th>
        </tr>
      </thead>
      <tbody class="subcontract_instrument_info">
           <?php for($j = 1; $j<=15; $j++){
          if(isset($cert['Tempcertificatedata']['temp'.$j]) && isset($cert['Tempcertificatedata']['uncert'.$j]))
          { ?>
        <tr class="text-center">
          <td class="text-center"><?php echo $cert['Tempcertificatedata']['uc'.$j]; ?></td>
          <td class="text-center"><?php echo $cert['Tempcertificatedata']['dof'.$j]; ?></td>
          <td class="text-center"><?php echo $cert['Tempcertificatedata']['kfac'.$j]; ?></td>
          <td class="text-center"><?php echo $cert['Tempcertificatedata']['uncert'.$j]; ?></td>
        </tr>
           <?php } }?>
<!--        <tr class="text-center">
          <td class="text-center">0.038845849199110064</td>
          <td class="text-center">101</td>
          <td class="text-center">2</td>
          <td class="text-center">0.07769169839822013</td>
        </tr>
        <tr class="text-center">
          <td class="text-center">0.038845849199110064</td>
          <td class="text-center">101</td>
          <td class="text-center">2</td>
          <td class="text-center">0.07769169839822013</td>
        </tr>-->
      </tbody>
    </table>
  </div>
</div>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
<!---------------------------------------------- Specification ---------------------->

</div>
                                                 <div class="tab-pane" id="tab5">
<?php ?>

<div class="c_form1 c_form2">
  <div class="form-group">
    <label for="val_duedate" class="col-md-1 control-label">Title1 </label>
    <div class="col-md-5">
      <?php
                echo $this->Form->input('title1', array('id' => 'val_title1', 'class' => 'form-control',
             'label' => false,'type'=>'textarea','readonly'=>true, 'rows'=>'2','value'=>''));
            ?>
    </div>
    <label for="val_duedate" class="col-md-1 control-label">Description1 </label>
    <div class="col-md-5">
      <?php
                echo $this->Form->input('description1', array('id' => 'val_description1', 'class' => 'form-control',
             'label' => false,'type'=>'textarea','readonly'=>true, 'rows'=>'2','value'=>''));
            ?>
    </div>
  </div>
  <div class="form-group">
    <label for="val_duedate" class="col-md-1 control-label">Title2 </label>
    <div class="col-md-5">
      <?php
                echo $this->Form->input('title2', array('id' => 'val_title2', 'class' => 'form-control',
             'label' => false,'type'=>'textarea','readonly'=>true, 'rows'=>'2','value'=>''));
            ?>
    </div>
    <label for="val_duedate" class="col-md-1 control-label">Description2 </label>
    <div class="col-md-5">
      <?php
                echo $this->Form->input('description2', array('id' => 'val_description2', 'class' => 'form-control',
             'label' => false,'type'=>'textarea','readonly'=>true, 'rows'=>'2','value'=>''));
            ?>
    </div>
  </div>
  <div class="form-group">
    <label for="val_duedate" class="col-md-1 control-label">Title3 </label>
    <div class="col-md-5">
      <?php
                echo $this->Form->input('title3', array('id' => 'val_title3', 'class' => 'form-control',
             'label' => false,'type'=>'textarea','readonly'=>true, 'rows'=>'2','value'=>''));
            ?>
    </div>
    <label for="val_duedate" class="col-md-1 control-label">Description3 </label>
    <div class="col-md-5">
      <?php
                echo $this->Form->input('description3', array('id' => 'val_description3', 'class' => 'form-control',
             'label' => false,'type'=>'textarea','readonly'=>true, 'rows'=>'2','value'=>''));
            ?>
    </div>
  </div>
  <div class="form-group">
    <label for="val_duedate" class="col-md-1 control-label">Title4 </label>
    <div class="col-md-5">
      <?php
                echo $this->Form->input('title4', array('id' => 'val_title4', 'class' => 'form-control',
             'label' => false,'type'=>'textarea','readonly'=>true, 'rows'=>'2','value'=>''));
            ?>
    </div>
    <label for="val_duedate" class="col-md-1 control-label">Description4 </label>
    <div class="col-md-5">
      <?php
                echo $this->Form->input('description4', array('id' => 'val_description4', 'class' => 'form-control',
             'label' => false,'type'=>'textarea','readonly'=>true, 'rows'=>'2','value'=>''));
            ?>
    </div>
  </div>
  <div class="form-group">
    <label for="val_duedate" class="col-md-1 control-label">Title5 </label>
    <div class="col-md-5">
      <?php
                echo $this->Form->input('title5', array('id' => 'val_title5', 'class' => 'form-control',
             'label' => false,'type'=>'textarea','readonly'=>true, 'rows'=>'2','value'=>''));
            ?>
    </div>
    <label for="val_duedate" class="col-md-1 control-label">Description5 </label>
    <div class="col-md-5">
      <?php
                echo $this->Form->input('description5', array('id' => 'val_description5', 'class' => 'form-control',
             'label' => false,'type'=>'textarea','readonly'=>true, 'rows'=>'2','value'=>''));
            ?>
    </div>
  </div>
  <div class="form-group">
    <label for="val_duedate" class="col-md-1 control-label">Title6 </label>
    <div class="col-md-5">
      <?php
                echo $this->Form->input('title6', array('id' => 'val_title6', 'class' => 'form-control',
             'label' => false,'type'=>'textarea','readonly'=>true, 'rows'=>'2','value'=>''));
            ?>
    </div>
    <label for="val_duedate" class="col-md-1 control-label">Description6 </label>
    <div class="col-md-5">
      <?php
                echo $this->Form->input('description6', array('id' => 'val_description6', 'class' => 'form-control',
             'label' => false,'type'=>'textarea','readonly'=>true, 'rows'=>'2','value'=>''));
            ?>
    </div>
  </div>
  <div class="form-group">
    <label for="val_duedate" class="col-md-2 control-label">Remarks </label>
    <div class="col-md-10">
      <?php
                echo $this->Form->input('remarks', array('id' => 'val_remarks', 'class' => 'form-control',
             'label' => false,'type'=>'textarea','readonly'=>true, 'rows'=>'2','value'=>''));
            ?>
    </div>
  </div>
  <div class="form-group">
    <label for="val_duedate" class="col-md-2 control-label">Sub Con Report Type </label>
    <div class="col-md-10">
      <?php
                echo $this->Form->input('sub_conreport', array('id' => 'val_sub_conreport', 'class' => 'form-control',
             'label' => false,'type'=>'textarea','readonly'=>true, 'rows'=>'2','value'=>'Standard'));
            ?>
    </div>
  </div>
  
<!--  <div class="col-md-9 col-md-offset-10">
                                                            <button class="btn btn-sm btn-primary" type="submit"><i class="fa fa-angle-right"></i> Submit</button>                                                            <button class="btn btn-sm btn-warning" type="reset"><i class="fa fa-repeat"></i> Reset</button>                                                        </div>-->
</div>
</div>
            
             </div><!-- tab-content -->
                                            <!-- #basicWizard -->
                                        </div><!-- panel-body -->
                                    </div>
                                    <!-- panel -->
                                </div>