<?php ?>
<script>
$(document).ready(function(e) {
    $('.no_of_runs').change(function(e) {
        var run = $(this).val();
		$('input').prop("disabled",false);
		$('input').css("background-color", "none");
		//alert(run);
		var i,m;
		
		for (i = 1; i <= 15; ++i)
		{
			for(m = 15; m > run; m--)
			{
				$('.m'+i+'_'+m).prop("disabled", true);
				$('.m'+i+'_'+m).css("background-color", "#ccc");
				$('.b'+i+'_'+m).prop("disabled", true);
				$('.b'+i+'_'+m).css("background-color", "#ccc");
				$('.a'+i+'_'+m).prop("disabled", true);
				$('.a'+i+'_'+m).css("background-color", "#ccc");
			}
		}
                
    });
    $('.after_adjustment').change(function(e) {
        var run = $(this).val();
        var i,m;
        
        for (i = 1; i <= 15; ++i)
        {
                for(m = 15; m > run; m--)
                {
                    $('.a'+i+'_'+m).prop("disabled", true);
                    $('.a'+i+'_'+m).css("background-color", "#ccc");
                }
        }
    });
});
</script>
<div class="col-sm-3 col-lg-12 subcontract_linear certificate_table certificate_tab"> 
  <!-- table1-->
  <div class="form-group c_top_search">
    <label for="val_customername" class=" control-label">No.of Runs</label>
   <?php  $numbers = array('1' => 1,'2' => 2,'3' => 3,'4' => 4,'5' => 5,'6' => 6,'7' => 7,'8' => 8,'9' => 9,'10' => 10,'11' => 11, '12' => 12); ?> 
   <?php echo $this->Form->input('no_runs', array('id' => 'val_no_runs', 'class' => 'form-control no_of_runs', 'label' => false, 'type' => 'select', 'empty' => '12','options' => $numbers)); ?>
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
          <td class="text-center"><input type="text" value="0" name="temp1" class="temp1"></td>
          <td class="text-center">Unit </td>
          <td class="text-center"><select name="unit1" class="unit1">
              <option value="">-- Select Unit --</option>
              <option value="1" selected="selected" >°C</option>
              <option value="2">°F</option>
              <option value="3">°C</option>
              <option value="4">°F</option>
              <option value="5">Ω</option>
              <option value="6">mV</option>
              <option value="7">% rh</option>
            </select></td>
          <td class="text-center">Resolution </td>
          <td class="text-center"><input type="text" value="0" name="res1" class="res1"></td>
          <td class="text-center">Accuracy </td>
          <td class="text-center"><input type="text" value="0" name="acc1" class="acc1"></td>
          <td class="text-center">Count </td>
          <td class="text-center"><input type="text" value="0" name="count1" class="count1"></td>
          <td class="text-center">Uncertainty </td>
          <td class="text-center"><input type="text" value="0" name="uncert1" class="uncert1"></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> Master </td>
          <td class="text-center"><input type="text" value="0" name="m1_1" class="m1_1" ></td>
          <td class="text-center"><input type="text" value="0" name="m1_2" class="m1_2" ></td>
          <td class="text-center"><input type="text" value="0" name="m1_3" class="m1_3" > </td>
          <td class="text-center"><input type="text" value="0" name="m1_4" class="m1_4" ></td>
          <td class="text-center"><input type="text" value="0" name="m1_5" class="m1_5" ></td>
          <td class="text-center"><input type="text" value="0" name="m1_6" class="m1_6" ></td>
          <td class="text-center"><input type="text" value="0" name="m1_7" class="m1_7" > </td>
          <td class="text-center"><input type="text" value="0" name="m1_8" class="m1_8" ></td>
          <td class="text-center"><input type="text" value="0" name="m1_9" class="m1_9" ></td>
          <td class="text-center"><input type="text" value="0" name="m1_10" class="m1_10" ></td>
          <td class="text-center"><input type="text" value="0" name="m1_11" class="m1_11" ></td>
          <td class="text-center"><input type="text" value="0" name="m1_12" class="m1_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> B.Set </td>
          <td class="text-center"><input type="text" value="0" name="b1_1" class="b1_1" ></td>
          <td class="text-center"><input type="text" value="0" name="b1_2" class="b1_2" ></td>
          <td class="text-center"><input type="text" value="0" name="b1_3" class="b1_3" > </td>
          <td class="text-center"><input type="text" value="0" name="b1_4" class="b1_4" ></td>
          <td class="text-center"><input type="text" value="0" name="b1_5" class="b1_5" ></td>
          <td class="text-center"><input type="text" value="0" name="b1_6" class="b1_6" ></td>
          <td class="text-center"><input type="text" value="0" name="b1_7" class="b1_7" > </td>
          <td class="text-center"><input type="text" value="0" name="b1_8" class="b1_8" ></td>
          <td class="text-center"><input type="text" value="0" name="b1_9" class="b1_9" ></td>
          <td class="text-center"><input type="text" value="0" name="b1_10" class="b1_10" ></td>
          <td class="text-center"><input type="text" value="0" name="b1_11" class="b1_11" ></td>
          <td class="text-center"><input type="text" value="0" name="b1_12" class="b1_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> A.Set </td>
          <td class="text-center"><input type="text" value="0" name="a1_1" class="a1_1" ></td>
          <td class="text-center"><input type="text" value="0" name="a1_2" class="a1_2" ></td>
          <td class="text-center"><input type="text" value="0" name="a1_3" class="a1_3" > </td>
          <td class="text-center"><input type="text" value="0" name="a1_4" class="a1_4" ></td>
          <td class="text-center"><input type="text" value="0" name="a1_5" class="a1_5" ></td>
          <td class="text-center"><input type="text" value="0" name="a1_6" class="a1_6" ></td>
          <td class="text-center"><input type="text" value="0" name="a1_7" class="a1_7" > </td>
          <td class="text-center"><input type="text" value="0" name="a1_8" class="a1_8" ></td>
          <td class="text-center"><input type="text" value="0" name="a1_9" class="a1_9" ></td>
          <td class="text-center"><input type="text" value="0" name="a1_10" class="a1_10" ></td>
          <td class="text-center"><input type="text" value="0" name="a1_11" class="a1_11" ></td>
          <td class="text-center"><input type="text" value="0" name="a1_12" class="a1_12" ></td>
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
          <input type="checkbox" id="<?php echo $uncertainty_data['Tempuncertainty']['id'] ;?>" name="uncertainty1_val" class="uncertainty1_val">
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
          <td class="text-center"><input type="text" value="0" name="temp2" class="temp2"></td>
          <td class="text-center">Unit </td>
          <td class="text-center"><select name="unit2" class="unit2">
              <option value="">-- Select Unit --</option>
              <option value="1" selected="selected" >°C</option>
              <option value="2">°F</option>
              <option value="3">°C</option>
              <option value="4">°F</option>
              <option value="5">Ω</option>
              <option value="6">mV</option>
              <option value="7">% rh</option>
            </select></td>
          <td class="text-center">Resolution </td>
          <td class="text-center"><input type="text" value="0" name="res2" class="res2"></td>
          <td class="text-center">Accuracy </td>
          <td class="text-center"><input type="text" value="0" name="acc2" class="acc2"></td>
          <td class="text-center">Count </td>
          <td class="text-center"><input type="text" value="0" name="count2" class="count2"></td>
          <td class="text-center">Uncertainty </td>
          <td class="text-center"><input type="text" value="0" name="uncert2" class="uncert2"></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> Master </td>
         <td class="text-center"><input type="text" value="0" name="m2_1" class="m2_1" ></td>
          <td class="text-center"><input type="text" value="0" name="m2_2" class="m2_2" ></td>
          <td class="text-center"><input type="text" value="0" name="m2_3" class="m2_3" > </td>
          <td class="text-center"><input type="text" value="0" name="m2_4" class="m2_4" ></td>
          <td class="text-center"><input type="text" value="0" name="m2_5" class="m2_5" ></td>
          <td class="text-center"><input type="text" value="0" name="m2_6" class="m2_6" ></td>
          <td class="text-center"><input type="text" value="0" name="m2_7" class="m2_7" > </td>
          <td class="text-center"><input type="text" value="0" name="m2_8" class="m2_8" ></td>
          <td class="text-center"><input type="text" value="0" name="m2_9" class="m2_9" ></td>
          <td class="text-center"><input type="text" value="0" name="m2_10" class="m2_10" ></td>
          <td class="text-center"><input type="text" value="0" name="m2_11" class="m2_11" ></td>
          <td class="text-center"><input type="text" value="0" name="m2_12" class="m2_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> B.Set </td>
          <td class="text-center"><input type="text" value="0" name="b2_1" class="b2_1" ></td>
          <td class="text-center"><input type="text" value="0" name="b2_2" class="b2_2" ></td>
          <td class="text-center"><input type="text" value="0" name="b2_3" class="b2_3" > </td>
          <td class="text-center"><input type="text" value="0" name="b2_4" class="b2_4" ></td>
          <td class="text-center"><input type="text" value="0" name="b2_5" class="b2_5" ></td>
          <td class="text-center"><input type="text" value="0" name="b2_6" class="b2_6" ></td>
          <td class="text-center"><input type="text" value="0" name="b2_7" class="b2_7" > </td>
          <td class="text-center"><input type="text" value="0" name="b2_8" class="b2_8" ></td>
          <td class="text-center"><input type="text" value="0" name="b2_9" class="b2_9" ></td>
          <td class="text-center"><input type="text" value="0" name="b2_10" class="b2_10" ></td>
          <td class="text-center"><input type="text" value="0" name="b2_11" class="b2_11" ></td>
          <td class="text-center"><input type="text" value="0" name="b2_12" class="b2_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> A.Set </td>
          <td class="text-center"><input type="text" value="0" name="a2_1" class="a2_1" ></td>
          <td class="text-center"><input type="text" value="0" name="a2_2" class="a2_2" ></td>
          <td class="text-center"><input type="text" value="0" name="a2_3" class="a2_3" > </td>
          <td class="text-center"><input type="text" value="0" name="a2_4" class="a2_4" ></td>
          <td class="text-center"><input type="text" value="0" name="a2_5" class="a2_5" ></td>
          <td class="text-center"><input type="text" value="0" name="a2_6" class="a2_6" ></td>
          <td class="text-center"><input type="text" value="0" name="a2_7" class="a2_7" > </td>
          <td class="text-center"><input type="text" value="0" name="a2_8" class="a2_8" ></td>
          <td class="text-center"><input type="text" value="0" name="a2_9" class="a2_9" ></td>
          <td class="text-center"><input type="text" value="0" name="a2_10" class="a2_10" ></td>
          <td class="text-center"><input type="text" value="0" name="a2_11" class="a2_11" ></td>
          <td class="text-center"><input type="text" value="0" name="a2_12" class="a2_12" ></td>
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
          <input type="checkbox" id="<?php echo $uncertainty_data['Tempuncertainty']['id'] ;?>" name="uncertainty2_val" class="uncertainty2_val">
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
          <td class="text-center"><input type="text" value="0" name="temp3" class="temp3"></td>
          <td class="text-center">Unit </td>
          <td class="text-center"><select name="unit3" class="unit3">
              <option value="">-- Select Unit --</option>
              <option value="1" selected="selected" >°C</option>
              <option value="2">°F</option>
              <option value="3">°C</option>
              <option value="4">°F</option>
              <option value="5">Ω</option>
              <option value="6">mV</option>
              <option value="7">% rh</option>
            </select></td>
          <td class="text-center">Resolution </td>
          <td class="text-center"><input type="text" value="0" name="res3" class="res3"></td>
          <td class="text-center">Accuracy </td>
          <td class="text-center"><input type="text" value="0" name="acc3" class="acc3"></td>
          <td class="text-center">Count </td>
          <td class="text-center"><input type="text" value="0" name="count3" class="count3"></td>
          <td class="text-center">Uncertainty </td>
          <td class="text-center"><input type="text" value="0" name="uncert3" class="uncert3"></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> Master </td>
          <td class="text-center"><input type="text" value="0" name="m3_1" class="m3_1" ></td>
          <td class="text-center"><input type="text" value="0" name="m3_2" class="m3_2" ></td>
          <td class="text-center"><input type="text" value="0" name="m3_3" class="m3_3" > </td>
          <td class="text-center"><input type="text" value="0" name="m3_4" class="m3_4" ></td>
          <td class="text-center"><input type="text" value="0" name="m3_5" class="m3_5" ></td>
          <td class="text-center"><input type="text" value="0" name="m3_6" class="m3_6" ></td>
          <td class="text-center"><input type="text" value="0" name="m3_7" class="m3_7" > </td>
          <td class="text-center"><input type="text" value="0" name="m3_8" class="m3_8" ></td>
          <td class="text-center"><input type="text" value="0" name="m3_9" class="m3_9" ></td>
          <td class="text-center"><input type="text" value="0" name="m3_10" class="m3_10" ></td>
          <td class="text-center"><input type="text" value="0" name="m3_11" class="m3_11" ></td>
          <td class="text-center"><input type="text" value="0" name="m3_12" class="m3_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> B.Set </td>
          <td class="text-center"><input type="text" value="0" name="b3_1" class="b3_1" ></td>
          <td class="text-center"><input type="text" value="0" name="b3_2" class="b3_2" ></td>
          <td class="text-center"><input type="text" value="0" name="b3_3" class="b3_3" > </td>
          <td class="text-center"><input type="text" value="0" name="b3_4" class="b3_4" ></td>
          <td class="text-center"><input type="text" value="0" name="b3_5" class="b3_5" ></td>
          <td class="text-center"><input type="text" value="0" name="b3_6" class="b3_6" ></td>
          <td class="text-center"><input type="text" value="0" name="b3_7" class="b3_7" > </td>
          <td class="text-center"><input type="text" value="0" name="b3_8" class="b3_8" ></td>
          <td class="text-center"><input type="text" value="0" name="b3_9" class="b3_9" ></td>
          <td class="text-center"><input type="text" value="0" name="b3_10" class="b3_10" ></td>
          <td class="text-center"><input type="text" value="0" name="b3_11" class="b3_11" ></td>
          <td class="text-center"><input type="text" value="0" name="b3_12" class="b3_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> A.Set </td>
          <td class="text-center"><input type="text" value="0" name="a3_1" class="a3_1" ></td>
          <td class="text-center"><input type="text" value="0" name="a3_2" class="a3_2" ></td>
          <td class="text-center"><input type="text" value="0" name="a3_3" class="a3_3" > </td>
          <td class="text-center"><input type="text" value="0" name="a3_4" class="a3_4" ></td>
          <td class="text-center"><input type="text" value="0" name="a3_5" class="a3_5" ></td>
          <td class="text-center"><input type="text" value="0" name="a3_6" class="a3_6" ></td>
          <td class="text-center"><input type="text" value="0" name="a3_7" class="a3_7" > </td>
          <td class="text-center"><input type="text" value="0" name="a3_8" class="a3_8" ></td>
          <td class="text-center"><input type="text" value="0" name="a3_9" class="a3_9" ></td>
          <td class="text-center"><input type="text" value="0" name="a3_10" class="a3_10" ></td>
          <td class="text-center"><input type="text" value="0" name="a3_11" class="a3_11" ></td>
          <td class="text-center"><input type="text" value="0" name="a3_12" class="a3_12" ></td
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
          <input type="checkbox" id="<?php echo $uncertainty_data['Tempuncertainty']['id'] ;?>" name="uncertainty3_val" class="uncertainty3_val">
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
          <td class="text-center"><input type="text" value="0" name="temp4" class="temp4"></td>
          <td class="text-center">Unit </td>
          <td class="text-center"><select name="unit4" class="unit4">
              <option value="">-- Select Unit --</option>
              <option value="1" selected="selected" >°C</option>
              <option value="2">°F</option>
              <option value="3">°C</option>
              <option value="4">°F</option>
              <option value="5">Ω</option>
              <option value="6">mV</option>
              <option value="7">% rh</option>
            </select></td>
          <td class="text-center">Resolution </td>
          <td class="text-center"><input type="text" value="0" name="res4" class="res4"></td>
          <td class="text-center">Accuracy </td>
          <td class="text-center"><input type="text" value="0" name="acc4" class="acc4"></td>
          <td class="text-center">Count </td>
          <td class="text-center"><input type="text" value="0" name="count4" class="count4"></td>
          <td class="text-center">Uncertainty </td>
          <td class="text-center"><input type="text" value="0" name="uncert4" class="uncert4"></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> Master </td>
          <td class="text-center"><input type="text" value="0" name="m4_1" class="m4_1" ></td>
          <td class="text-center"><input type="text" value="0" name="m4_2" class="m4_2" ></td>
          <td class="text-center"><input type="text" value="0" name="m4_3" class="m4_3" > </td>
          <td class="text-center"><input type="text" value="0" name="m4_4" class="m4_4" ></td>
          <td class="text-center"><input type="text" value="0" name="m4_5" class="m4_5" ></td>
          <td class="text-center"><input type="text" value="0" name="m4_6" class="m4_6" ></td>
          <td class="text-center"><input type="text" value="0" name="m4_7" class="m4_7" > </td>
          <td class="text-center"><input type="text" value="0" name="m4_8" class="m4_8" ></td>
          <td class="text-center"><input type="text" value="0" name="m4_9" class="m4_9" ></td>
          <td class="text-center"><input type="text" value="0" name="m4_10" class="m4_10" ></td>
          <td class="text-center"><input type="text" value="0" name="m4_11" class="m4_11" ></td>
          <td class="text-center"><input type="text" value="0" name="m4_12" class="m4_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> B.Set </td>
         <td class="text-center"><input type="text" value="0" name="b4_1" class="b4_1" ></td>
          <td class="text-center"><input type="text" value="0" name="b4_2" class="b4_2" ></td>
          <td class="text-center"><input type="text" value="0" name="b4_3" class="b4_3" > </td>
          <td class="text-center"><input type="text" value="0" name="b4_4" class="b4_4" ></td>
          <td class="text-center"><input type="text" value="0" name="b4_5" class="b4_5" ></td>
          <td class="text-center"><input type="text" value="0" name="b4_6" class="b4_6" ></td>
          <td class="text-center"><input type="text" value="0" name="b4_7" class="b4_7" > </td>
          <td class="text-center"><input type="text" value="0" name="b4_8" class="b4_8" ></td>
          <td class="text-center"><input type="text" value="0" name="b4_9" class="b4_9" ></td>
          <td class="text-center"><input type="text" value="0" name="b4_10" class="b4_10" ></td>
          <td class="text-center"><input type="text" value="0" name="b4_11" class="b4_11" ></td>
          <td class="text-center"><input type="text" value="0" name="b4_12" class="b4_12" ></t
        </tr>
        <tr class="text-center">
          <td class="text-center"> A.Set </td>
          <td class="text-center"><input type="text" value="0" name="a4_1" class="a4_1" ></td>
          <td class="text-center"><input type="text" value="0" name="a4_2" class="a4_2" ></td>
          <td class="text-center"><input type="text" value="0" name="a4_3" class="a4_3" > </td>
          <td class="text-center"><input type="text" value="0" name="a4_4" class="a4_4" ></td>
          <td class="text-center"><input type="text" value="0" name="a4_5" class="a4_5" ></td>
          <td class="text-center"><input type="text" value="0" name="a4_6" class="a4_6" ></td>
          <td class="text-center"><input type="text" value="0" name="a4_7" class="a4_7" > </td>
          <td class="text-center"><input type="text" value="0" name="a4_8" class="a4_8" ></td>
          <td class="text-center"><input type="text" value="0" name="a4_9" class="a4_9" ></td>
          <td class="text-center"><input type="text" value="0" name="a4_10" class="a4_10" ></td>
          <td class="text-center"><input type="text" value="0" name="a4_11" class="a4_11" ></td>
          <td class="text-center"><input type="text" value="0" name="a4_12" class="a4_12" ></td>
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
          <input type="checkbox" id="<?php echo $uncertainty_data['Tempuncertainty']['id'] ;?>" name="uncertainty4_val" class="uncertainty4_val">
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
          <td class="text-center"><input type="text" value="0" name="temp5" class="temp5"></td>
          <td class="text-center">Unit </td>
          <td class="text-center"><select name="unit5" class="unit5">
              <option value="">-- Select Unit --</option>
              <option value="1" selected="selected" >°C</option>
              <option value="2">°F</option>
              <option value="3">°C</option>
              <option value="4">°F</option>
              <option value="5">Ω</option>
              <option value="6">mV</option>
              <option value="7">% rh</option>
            </select></td>
          <td class="text-center">Resolution </td>
          <td class="text-center"><input type="text" value="0" name="res5" class="res5"></td>
          <td class="text-center">Accuracy </td>
          <td class="text-center"><input type="text" value="0" name="acc5" class="acc5"></td>
          <td class="text-center">Count </td>
          <td class="text-center"><input type="text" value="0" name="count5" class="count5"></td>
          <td class="text-center">Uncertainty </td>
          <td class="text-center"><input type="text" value="0" name="uncert5" class="uncert5"></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> Master </td>
         <td class="text-center"><input type="text" value="0" name="m5_1" class="m5_1" ></td>
          <td class="text-center"><input type="text" value="0" name="m5_2" class="m5_2" ></td>
          <td class="text-center"><input type="text" value="0" name="m5_3" class="m5_3" > </td>
          <td class="text-center"><input type="text" value="0" name="m5_4" class="m5_4" ></td>
          <td class="text-center"><input type="text" value="0" name="m5_5" class="m5_5" ></td>
          <td class="text-center"><input type="text" value="0" name="m5_6" class="m5_6" ></td>
          <td class="text-center"><input type="text" value="0" name="m5_7" class="m5_7" > </td>
          <td class="text-center"><input type="text" value="0" name="m5_8" class="m5_8" ></td>
          <td class="text-center"><input type="text" value="0" name="m5_9" class="m5_9" ></td>
          <td class="text-center"><input type="text" value="0" name="m5_10" class="m5_10" ></td>
          <td class="text-center"><input type="text" value="0" name="m5_11" class="m5_11" ></td>
          <td class="text-center"><input type="text" value="0" name="m5_12" class="m5_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> B.Set </td>
          <td class="text-center"><input type="text" value="0" name="b5_1" class="b5_1" ></td>
          <td class="text-center"><input type="text" value="0" name="b5_2" class="b5_2" ></td>
          <td class="text-center"><input type="text" value="0" name="b5_3" class="b5_3" > </td>
          <td class="text-center"><input type="text" value="0" name="b5_4" class="b5_4" ></td>
          <td class="text-center"><input type="text" value="0" name="b5_5" class="b5_5" ></td>
          <td class="text-center"><input type="text" value="0" name="b5_6" class="b5_6" ></td>
          <td class="text-center"><input type="text" value="0" name="b5_7" class="b5_7" > </td>
          <td class="text-center"><input type="text" value="0" name="b5_8" class="b5_8" ></td>
          <td class="text-center"><input type="text" value="0" name="b5_9" class="b5_9" ></td>
          <td class="text-center"><input type="text" value="0" name="b5_10" class="b5_10" ></td>
          <td class="text-center"><input type="text" value="0" name="b5_11" class="b5_11" ></td>
          <td class="text-center"><input type="text" value="0" name="b5_12" class="b5_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> A.Set </td>
          <td class="text-center"><input type="text" value="0" name="a5_1" class="a5_1" ></td>
          <td class="text-center"><input type="text" value="0" name="a5_2" class="a5_2" ></td>
          <td class="text-center"><input type="text" value="0" name="a5_3" class="a5_3" > </td>
          <td class="text-center"><input type="text" value="0" name="a5_4" class="a5_4" ></td>
          <td class="text-center"><input type="text" value="0" name="a5_5" class="a5_5" ></td>
          <td class="text-center"><input type="text" value="0" name="a5_6" class="a5_6" ></td>
          <td class="text-center"><input type="text" value="0" name="a5_7" class="a5_7" > </td>
          <td class="text-center"><input type="text" value="0" name="a5_8" class="a5_8" ></td>
          <td class="text-center"><input type="text" value="0" name="a5_9" class="a5_9" ></td>
          <td class="text-center"><input type="text" value="0" name="a5_10" class="a5_10" ></td>
          <td class="text-center"><input type="text" value="0" name="a5_11" class="a5_11" ></td>
          <td class="text-center"><input type="text" value="0" name="a5_12" class="a5_12" ></td>
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
          <input type="checkbox" id="<?php echo $uncertainty_data['Tempuncertainty']['id'] ;?>" name="uncertainty5_val" class="uncertainty5_val">
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
          <td class="text-center"><input type="text" value="0" name="temp6" class="temp6"></td>
          <td class="text-center">Unit </td>
          <td class="text-center"><select name="unit6" class="unit6">
              <option value="">-- Select Unit --</option>
              <option value="1" selected="selected" >°C</option>
              <option value="2">°F</option>
              <option value="3">°C</option>
              <option value="4">°F</option>
              <option value="5">Ω</option>
              <option value="6">mV</option>
              <option value="7">% rh</option>
            </select></td>
          <td class="text-center">Resolution </td>
          <td class="text-center"><input type="text" value="0" name="res6" class="res6"></td>
          <td class="text-center">Accuracy </td>
          <td class="text-center"><input type="text" value="0" name="acc6" class="acc6"></td>
          <td class="text-center">Count </td>
          <td class="text-center"><input type="text" value="0" name="count6" class="count6"></td>
          <td class="text-center">Uncertainty </td>
          <td class="text-center"><input type="text" value="0" name="uncert6" class="uncert6"></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> Master </td>
          <td class="text-center"><input type="text" value="0" name="m6_1" class="m6_1" ></td>
          <td class="text-center"><input type="text" value="0" name="m6_2" class="m6_2" ></td>
          <td class="text-center"><input type="text" value="0" name="m6_3" class="m6_3" > </td>
          <td class="text-center"><input type="text" value="0" name="m6_4" class="m6_4" ></td>
          <td class="text-center"><input type="text" value="0" name="m6_5" class="m6_5" ></td>
          <td class="text-center"><input type="text" value="0" name="m6_6" class="m6_6" ></td>
          <td class="text-center"><input type="text" value="0" name="m6_7" class="m6_7" > </td>
          <td class="text-center"><input type="text" value="0" name="m6_8" class="m6_8" ></td>
          <td class="text-center"><input type="text" value="0" name="m6_9" class="m6_9" ></td>
          <td class="text-center"><input type="text" value="0" name="m6_10" class="m6_10" ></td>
          <td class="text-center"><input type="text" value="0" name="m6_11" class="m6_11" ></td>
          <td class="text-center"><input type="text" value="0" name="m6_12" class="m6_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> B.Set </td>
         <td class="text-center"><input type="text" value="0" name="m6_1" class="m6_1" ></td>
          <td class="text-center"><input type="text" value="0" name="m6_2" class="m6_2" ></td>
          <td class="text-center"><input type="text" value="0" name="m6_3" class="m6_3" > </td>
          <td class="text-center"><input type="text" value="0" name="m6_4" class="m6_4" ></td>
          <td class="text-center"><input type="text" value="0" name="m6_5" class="m6_5" ></td>
          <td class="text-center"><input type="text" value="0" name="m6_6" class="m6_6" ></td>
          <td class="text-center"><input type="text" value="0" name="m6_7" class="m6_7" > </td>
          <td class="text-center"><input type="text" value="0" name="m6_8" class="m6_8" ></td>
          <td class="text-center"><input type="text" value="0" name="m6_9" class="m6_9" ></td>
          <td class="text-center"><input type="text" value="0" name="m6_10" class="m6_10" ></td>
          <td class="text-center"><input type="text" value="0" name="m6_11" class="m6_11" ></td>
          <td class="text-center"><input type="text" value="0" name="m6_12" class="m6_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> A.Set </td>
          <td class="text-center"><input type="text" value="0" name="a6_1" class="a6_1" ></td>
          <td class="text-center"><input type="text" value="0" name="a6_2" class="a6_2" ></td>
          <td class="text-center"><input type="text" value="0" name="a6_3" class="a6_3" > </td>
          <td class="text-center"><input type="text" value="0" name="a6_4" class="a6_4" ></td>
          <td class="text-center"><input type="text" value="0" name="a6_5" class="a6_5" ></td>
          <td class="text-center"><input type="text" value="0" name="a6_6" class="a6_6" ></td>
          <td class="text-center"><input type="text" value="0" name="a6_7" class="a6_7" > </td>
          <td class="text-center"><input type="text" value="0" name="a6_8" class="a6_8" ></td>
          <td class="text-center"><input type="text" value="0" name="a6_9" class="a6_9" ></td>
          <td class="text-center"><input type="text" value="0" name="a6_10" class="a6_10" ></td>
          <td class="text-center"><input type="text" value="0" name="a6_11" class="a6_11" ></td>
          <td class="text-center"><input type="text" value="0" name="a6_12" class="a6_12" ></td>
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
          <input type="checkbox" id="<?php echo $uncertainty_data['Tempuncertainty']['id'] ;?>" name="uncertainty6_val" class="uncertainty6_val">
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
          <td class="text-center"><input type="text" value="0" name="temp7" class="temp7"></td>
          <td class="text-center">Unit </td>
          <td class="text-center"><select name="unit7" class="unit7">
              <option value="">-- Select Unit --</option>
              <option value="1" selected="selected" >°C</option>
              <option value="2">°F</option>
              <option value="3">°C</option>
              <option value="4">°F</option>
              <option value="5">Ω</option>
              <option value="6">mV</option>
              <option value="7">% rh</option>
            </select></td>
          <td class="text-center">Resolution </td>
          <td class="text-center"><input type="text" value="0" name="res7" class="res7"></td>
          <td class="text-center">Accuracy </td>
          <td class="text-center"><input type="text" value="0" name="acc7" class="acc7"></td>
          <td class="text-center">Count </td>
          <td class="text-center"><input type="text" value="0" name="count7" class="count7"></td>
          <td class="text-center">Uncertainty </td>
          <td class="text-center"><input type="text" value="0" name="uncert7" class="uncert7"></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> Master </td>
          <td class="text-center"><input type="text" value="0" name="m7_1" class="m7_1" ></td>
          <td class="text-center"><input type="text" value="0" name="m7_2" class="m7_2" ></td>
          <td class="text-center"><input type="text" value="0" name="m7_3" class="m7_3" > </td>
          <td class="text-center"><input type="text" value="0" name="m7_4" class="m7_4" ></td>
          <td class="text-center"><input type="text" value="0" name="m7_5" class="m7_5" ></td>
          <td class="text-center"><input type="text" value="0" name="m7_6" class="m7_6" ></td>
          <td class="text-center"><input type="text" value="0" name="m7_7" class="m7_7" > </td>
          <td class="text-center"><input type="text" value="0" name="m7_8" class="m7_8" ></td>
          <td class="text-center"><input type="text" value="0" name="m7_9" class="m7_9" ></td>
          <td class="text-center"><input type="text" value="0" name="m7_10" class="m7_10" ></td>
          <td class="text-center"><input type="text" value="0" name="m7_11" class="m7_11" ></td>
          <td class="text-center"><input type="text" value="0" name="m7_12" class="m7_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> B.Set </td>
          <td class="text-center"><input type="text" value="0" name="b7_1" class="b7_1" ></td>
          <td class="text-center"><input type="text" value="0" name="b7_2" class="b7_2" ></td>
          <td class="text-center"><input type="text" value="0" name="b7_3" class="b7_3" > </td>
          <td class="text-center"><input type="text" value="0" name="b7_4" class="b7_4" ></td>
          <td class="text-center"><input type="text" value="0" name="b7_5" class="b7_5" ></td>
          <td class="text-center"><input type="text" value="0" name="b7_6" class="b7_6" ></td>
          <td class="text-center"><input type="text" value="0" name="b7_7" class="b7_7" > </td>
          <td class="text-center"><input type="text" value="0" name="b7_8" class="b7_8" ></td>
          <td class="text-center"><input type="text" value="0" name="b7_9" class="b7_9" ></td>
          <td class="text-center"><input type="text" value="0" name="b7_10" class="b7_10" ></td>
          <td class="text-center"><input type="text" value="0" name="b7_11" class="b7_11" ></td>
          <td class="text-center"><input type="text" value="0" name="b7_12" class="b7_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> A.Set </td>
         <td class="text-center"><input type="text" value="0" name="a7_1" class="a7_1" ></td>
          <td class="text-center"><input type="text" value="0" name="a7_2" class="a7_2" ></td>
          <td class="text-center"><input type="text" value="0" name="a7_3" class="a7_3" > </td>
          <td class="text-center"><input type="text" value="0" name="a7_4" class="a7_4" ></td>
          <td class="text-center"><input type="text" value="0" name="a7_5" class="a7_5" ></td>
          <td class="text-center"><input type="text" value="0" name="a7_6" class="a7_6" ></td>
          <td class="text-center"><input type="text" value="0" name="a7_7" class="a7_7" > </td>
          <td class="text-center"><input type="text" value="0" name="a7_8" class="a7_8" ></td>
          <td class="text-center"><input type="text" value="0" name="a7_9" class="a7_9" ></td>
          <td class="text-center"><input type="text" value="0" name="a7_10" class="a7_10" ></td>
          <td class="text-center"><input type="text" value="0" name="a7_11" class="a7_11" ></td>
          <td class="text-center"><input type="text" value="0" name="a7_12" class="a7_12" ></td
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
          <input type="checkbox" id="<?php echo $uncertainty_data['Tempuncertainty']['id'] ;?>" name="uncertainty7_val" class="uncertainty7_val">
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
          <td class="text-center"><input type="text" value="0" name="temp8" class="temp8"></td>
          <td class="text-center">Unit </td>
          <td class="text-center"><select name="unit8" class="unit8">
              <option value="">-- Select Unit --</option>
              <option value="1" selected="selected" >°C</option>
              <option value="2">°F</option>
              <option value="3">°C</option>
              <option value="4">°F</option>
              <option value="5">Ω</option>
              <option value="6">mV</option>
              <option value="7">% rh</option>
            </select></td>
          <td class="text-center">Resolution </td>
          <td class="text-center"><input type="text" value="0" name="res8" class="res8"></td>
          <td class="text-center">Accuracy </td>
          <td class="text-center"><input type="text" value="0" name="acc8" class="acc8"></td>
          <td class="text-center">Count </td>
          <td class="text-center"><input type="text" value="0" name="count8" class="count8"></td>
          <td class="text-center">Uncertainty </td>
          <td class="text-center"><input type="text" value="0" name="uncert8" class="uncert8"></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> Master </td>
          <td class="text-center"><input type="text" value="0" name="m8_1" class="m8_1" ></td>
          <td class="text-center"><input type="text" value="0" name="m8_2" class="m8_2" ></td>
          <td class="text-center"><input type="text" value="0" name="m8_3" class="m8_3" > </td>
          <td class="text-center"><input type="text" value="0" name="m8_4" class="m8_4" ></td>
          <td class="text-center"><input type="text" value="0" name="m8_5" class="m8_5" ></td>
          <td class="text-center"><input type="text" value="0" name="m8_6" class="m8_6" ></td>
          <td class="text-center"><input type="text" value="0" name="m8_7" class="m8_7" > </td>
          <td class="text-center"><input type="text" value="0" name="m8_8" class="m8_8" ></td>
          <td class="text-center"><input type="text" value="0" name="m8_9" class="m8_9" ></td>
          <td class="text-center"><input type="text" value="0" name="m8_10" class="m8_10" ></td>
          <td class="text-center"><input type="text" value="0" name="m8_11" class="m8_11" ></td>
          <td class="text-center"><input type="text" value="0" name="m8_12" class="m8_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> B.Set </td>
          <td class="text-center"><input type="text" value="0" name="b8_1" class="b8_1" ></td>
          <td class="text-center"><input type="text" value="0" name="b8_2" class="b8_2" ></td>
          <td class="text-center"><input type="text" value="0" name="b8_3" class="b8_3" > </td>
          <td class="text-center"><input type="text" value="0" name="b8_4" class="b8_4" ></td>
          <td class="text-center"><input type="text" value="0" name="b8_5" class="b8_5" ></td>
          <td class="text-center"><input type="text" value="0" name="b8_6" class="b8_6" ></td>
          <td class="text-center"><input type="text" value="0" name="b8_7" class="b8_7" > </td>
          <td class="text-center"><input type="text" value="0" name="b8_8" class="b8_8" ></td>
          <td class="text-center"><input type="text" value="0" name="b8_9" class="b8_9" ></td>
          <td class="text-center"><input type="text" value="0" name="b8_10" class="b8_10" ></td>
          <td class="text-center"><input type="text" value="0" name="b8_11" class="b8_11" ></td>
          <td class="text-center"><input type="text" value="0" name="b8_12" class="b8_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> A.Set </td>
          <td class="text-center"><input type="text" value="0" name="a8_1" class="a8_1" ></td>
          <td class="text-center"><input type="text" value="0" name="a8_2" class="a8_2" ></td>
          <td class="text-center"><input type="text" value="0" name="a8_3" class="a8_3" > </td>
          <td class="text-center"><input type="text" value="0" name="a8_4" class="a8_4" ></td>
          <td class="text-center"><input type="text" value="0" name="a8_5" class="a8_5" ></td>
          <td class="text-center"><input type="text" value="0" name="a8_6" class="a8_6" ></td>
          <td class="text-center"><input type="text" value="0" name="a8_7" class="a8_7" > </td>
          <td class="text-center"><input type="text" value="0" name="a8_8" class="a8_8" ></td>
          <td class="text-center"><input type="text" value="0" name="a8_9" class="a8_9" ></td>
          <td class="text-center"><input type="text" value="0" name="a8_10" class="a8_10" ></td>
          <td class="text-center"><input type="text" value="0" name="a8_11" class="a8_11" ></td>
          <td class="text-center"><input type="text" value="0" name="a8_12" class="a8_12" ></td>
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
          <input type="checkbox" id="<?php echo $uncertainty_data['Tempuncertainty']['id'] ;?>" name="uncertainty8_val" class="uncertainty8_val">
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
          <td class="text-center"><input type="text" value="0" name="temp9" class="temp9"></td>
          <td class="text-center">Unit </td>
          <td class="text-center"><select name="unit9" class="unit9">
              <option value="">-- Select Unit --</option>
              <option value="1" selected="selected" >°C</option>
              <option value="2">°F</option>
              <option value="3">°C</option>
              <option value="4">°F</option>
              <option value="5">Ω</option>
              <option value="6">mV</option>
              <option value="7">% rh</option>
            </select></td>
          <td class="text-center">Resolution </td>
          <td class="text-center"><input type="text" value="0" name="res9" class="res9"></td>
          <td class="text-center">Accuracy </td>
          <td class="text-center"><input type="text" value="0" name="acc9" class="acc9"></td>
          <td class="text-center">Count </td>
          <td class="text-center"><input type="text" value="0" name="count9" class="count9"></td>
          <td class="text-center">Uncertainty </td>
          <td class="text-center"><input type="text" value="0" name="uncert9" class="uncert9"></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> Master </td>
          <td class="text-center"><input type="text" value="0" name="m9_1" class="m9_1" ></td>
          <td class="text-center"><input type="text" value="0" name="m9_2" class="m9_2" ></td>
          <td class="text-center"><input type="text" value="0" name="m9_3" class="m9_3" > </td>
          <td class="text-center"><input type="text" value="0" name="m9_4" class="m9_4" ></td>
          <td class="text-center"><input type="text" value="0" name="m9_5" class="m9_5" ></td>
          <td class="text-center"><input type="text" value="0" name="m9_6" class="m9_6" ></td>
          <td class="text-center"><input type="text" value="0" name="m9_7" class="m9_7" > </td>
          <td class="text-center"><input type="text" value="0" name="m9_8" class="m9_8" ></td>
          <td class="text-center"><input type="text" value="0" name="m9_9" class="m9_9" ></td>
          <td class="text-center"><input type="text" value="0" name="m9_10" class="m9_10" ></td>
          <td class="text-center"><input type="text" value="0" name="m9_11" class="m9_11" ></td>
          <td class="text-center"><input type="text" value="0" name="m9_12" class="m9_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> B.Set </td>
          <td class="text-center"><input type="text" value="0" name="b9_1" class="b9_1" ></td>
          <td class="text-center"><input type="text" value="0" name="b9_2" class="b9_2" ></td>
          <td class="text-center"><input type="text" value="0" name="b9_3" class="b9_3" > </td>
          <td class="text-center"><input type="text" value="0" name="b9_4" class="b9_4" ></td>
          <td class="text-center"><input type="text" value="0" name="b9_5" class="b9_5" ></td>
          <td class="text-center"><input type="text" value="0" name="b9_6" class="b9_6" ></td>
          <td class="text-center"><input type="text" value="0" name="b9_7" class="b9_7" > </td>
          <td class="text-center"><input type="text" value="0" name="b9_8" class="b9_8" ></td>
          <td class="text-center"><input type="text" value="0" name="b9_9" class="b9_9" ></td>
          <td class="text-center"><input type="text" value="0" name="b9_10" class="b9_10" ></td>
          <td class="text-center"><input type="text" value="0" name="b9_11" class="b9_11" ></td>
          <td class="text-center"><input type="text" value="0" name="b9_12" class="b9_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> A.Set </td>
          <td class="text-center"><input type="text" value="0" name="a9_1" class="a9_1" ></td>
          <td class="text-center"><input type="text" value="0" name="a9_2" class="a9_2" ></td>
          <td class="text-center"><input type="text" value="0" name="a9_3" class="a9_3" > </td>
          <td class="text-center"><input type="text" value="0" name="a9_4" class="a9_4" ></td>
          <td class="text-center"><input type="text" value="0" name="a9_5" class="a9_5" ></td>
          <td class="text-center"><input type="text" value="0" name="a9_6" class="a9_6" ></td>
          <td class="text-center"><input type="text" value="0" name="a9_7" class="a9_7" > </td>
          <td class="text-center"><input type="text" value="0" name="a9_8" class="a9_8" ></td>
          <td class="text-center"><input type="text" value="0" name="a9_9" class="a9_9" ></td>
          <td class="text-center"><input type="text" value="0" name="a9_10" class="a9_10" ></td>
          <td class="text-center"><input type="text" value="0" name="a9_11" class="a9_11" ></td>
          <td class="text-center"><input type="text" value="0" name="a9_12" class="a9_12" ></td>
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
          <input type="checkbox" id="<?php echo $uncertainty_data['Tempuncertainty']['id'] ;?>" name="uncertainty9_val" class="uncertainty9_val">
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
          <td class="text-center"><input type="text" value="0" name="temp10" class="temp10"></td>
          <td class="text-center">Unit </td>
          <td class="text-center"><select name="unit10" class="unit10">
              <option value="">-- Select Unit --</option>
              <option value="1" selected="selected" >°C</option>
              <option value="2">°F</option>
              <option value="3">°C</option>
              <option value="4">°F</option>
              <option value="5">Ω</option>
              <option value="6">mV</option>
              <option value="7">% rh</option>
            </select></td>
          <td class="text-center">Resolution </td>
          <td class="text-center"><input type="text" value="0" name="res10" class="res10"></td>
          <td class="text-center">Accuracy </td>
          <td class="text-center"><input type="text" value="0" name="acc10" class="acc10"></td>
          <td class="text-center">Count </td>
          <td class="text-center"><input type="text" value="0" name="count10" class="count10"></td>
          <td class="text-center">Uncertainty </td>
          <td class="text-center"><input type="text" value="0" name="uncert10" class="uncert10"></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> Master </td>
          <td class="text-center"><input type="text" value="0" name="m10_1" class="m10_1" ></td>
          <td class="text-center"><input type="text" value="0" name="m10_2" class="m10_2" ></td>
          <td class="text-center"><input type="text" value="0" name="m10_3" class="m10_3" > </td>
          <td class="text-center"><input type="text" value="0" name="m10_4" class="m10_4" ></td>
          <td class="text-center"><input type="text" value="0" name="m10_5" class="m10_5" ></td>
          <td class="text-center"><input type="text" value="0" name="m10_6" class="m10_6" ></td>
          <td class="text-center"><input type="text" value="0" name="m10_7" class="m10_7" > </td>
          <td class="text-center"><input type="text" value="0" name="m10_8" class="m10_8" ></td>
          <td class="text-center"><input type="text" value="0" name="m10_9" class="m10_9" ></td>
          <td class="text-center"><input type="text" value="0" name="m10_10" class="m10_10" ></td>
          <td class="text-center"><input type="text" value="0" name="m10_11" class="m10_11" ></td>
          <td class="text-center"><input type="text" value="0" name="m10_12" class="m10_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> B.Set </td>
          <td class="text-center"><input type="text" value="0" name="b10_1" class="b10_1" ></td>
          <td class="text-center"><input type="text" value="0" name="b10_2" class="b10_2" ></td>
          <td class="text-center"><input type="text" value="0" name="b10_3" class="b10_3" > </td>
          <td class="text-center"><input type="text" value="0" name="b10_4" class="b10_4" ></td>
          <td class="text-center"><input type="text" value="0" name="b10_5" class="b10_5" ></td>
          <td class="text-center"><input type="text" value="0" name="b10_6" class="b10_6" ></td>
          <td class="text-center"><input type="text" value="0" name="b10_7" class="b10_7" > </td>
          <td class="text-center"><input type="text" value="0" name="b10_8" class="b10_8" ></td>
          <td class="text-center"><input type="text" value="0" name="b10_9" class="b10_9" ></td>
          <td class="text-center"><input type="text" value="0" name="b10_10" class="b10_10" ></td>
          <td class="text-center"><input type="text" value="0" name="b10_11" class="b10_11" ></td>
          <td class="text-center"><input type="text" value="0" name="b10_12" class="b10_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> A.Set </td>
          <td class="text-center"><input type="text" value="0" name="a10_1" class="a10_1" ></td>
          <td class="text-center"><input type="text" value="0" name="a10_2" class="a10_2" ></td>
          <td class="text-center"><input type="text" value="0" name="a10_3" class="a10_3" > </td>
          <td class="text-center"><input type="text" value="0" name="a10_4" class="a10_4" ></td>
          <td class="text-center"><input type="text" value="0" name="a10_5" class="a10_5" ></td>
          <td class="text-center"><input type="text" value="0" name="a10_6" class="a10_6" ></td>
          <td class="text-center"><input type="text" value="0" name="a10_7" class="a10_7" > </td>
          <td class="text-center"><input type="text" value="0" name="a10_8" class="a10_8" ></td>
          <td class="text-center"><input type="text" value="0" name="a10_9" class="a10_9" ></td>
          <td class="text-center"><input type="text" value="0" name="a10_10" class="a10_10" ></td>
          <td class="text-center"><input type="text" value="0" name="a10_11" class="a10_11" ></td>
          <td class="text-center"><input type="text" value="0" name="a10_12" class="a10_12" ></td>
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
          <input type="checkbox" id="<?php echo $uncertainty_data['Tempuncertainty']['id'] ;?>" name="uncertainty10_val" class="uncertainty10_val">
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
          <td class="text-center"><input type="text" value="0" name="temp11" class="temp11"></td>
          <td class="text-center">Unit </td>
          <td class="text-center"><select name="unit11" class="unit11">
              <option value="">-- Select Unit --</option>
              <option value="1" selected="selected" >°C</option>
              <option value="2">°F</option>
              <option value="3">°C</option>
              <option value="4">°F</option>
              <option value="5">Ω</option>
              <option value="6">mV</option>
              <option value="7">% rh</option>
            </select></td>
          <td class="text-center">Resolution </td>
          <td class="text-center"><input type="text" value="0" name="res11" class="res11"></td>
          <td class="text-center">Accuracy </td>
          <td class="text-center"><input type="text" value="0" name="acc11" class="acc11"></td>
          <td class="text-center">Count </td>
          <td class="text-center"><input type="text" value="0" name="count11" class="count11"></td>
          <td class="text-center">Uncertainty </td>
          <td class="text-center"><input type="text" value="0" name="uncert11" class="uncert11"></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> Master </td>
          <td class="text-center"><input type="text" value="0" name="m11_1" class="m11_1" ></td>
          <td class="text-center"><input type="text" value="0" name="m11_2" class="m11_2" ></td>
          <td class="text-center"><input type="text" value="0" name="m11_3" class="m11_3" > </td>
          <td class="text-center"><input type="text" value="0" name="m11_4" class="m11_4" ></td>
          <td class="text-center"><input type="text" value="0" name="m11_5" class="m11_5" ></td>
          <td class="text-center"><input type="text" value="0" name="m11_6" class="m11_6" ></td>
          <td class="text-center"><input type="text" value="0" name="m11_7" class="m11_7" > </td>
          <td class="text-center"><input type="text" value="0" name="m11_8" class="m11_8" ></td>
          <td class="text-center"><input type="text" value="0" name="m11_9" class="m11_9" ></td>
          <td class="text-center"><input type="text" value="0" name="m11_10" class="m11_10" ></td>
          <td class="text-center"><input type="text" value="0" name="m11_11" class="m11_11" ></td>
          <td class="text-center"><input type="text" value="0" name="m11_12" class="m11_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> B.Set </td>
          <td class="text-center"><input type="text" value="0" name="b11_1" class="b11_1" ></td>
          <td class="text-center"><input type="text" value="0" name="b11_2" class="b11_2" ></td>
          <td class="text-center"><input type="text" value="0" name="b11_3" class="b11_3" > </td>
          <td class="text-center"><input type="text" value="0" name="b11_4" class="b11_4" ></td>
          <td class="text-center"><input type="text" value="0" name="b11_5" class="b11_5" ></td>
          <td class="text-center"><input type="text" value="0" name="b11_6" class="b11_6" ></td>
          <td class="text-center"><input type="text" value="0" name="b11_7" class="b11_7" > </td>
          <td class="text-center"><input type="text" value="0" name="b11_8" class="b11_8" ></td>
          <td class="text-center"><input type="text" value="0" name="b11_9" class="b11_9" ></td>
          <td class="text-center"><input type="text" value="0" name="b11_10" class="b11_10" ></td>
          <td class="text-center"><input type="text" value="0" name="b11_11" class="b11_11" ></td>
          <td class="text-center"><input type="text" value="0" name="b11_12" class="b11_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> A.Set </td>
          <td class="text-center"><input type="text" value="0" name="a11_1" class="a11_1" ></td>
          <td class="text-center"><input type="text" value="0" name="a11_2" class="a11_2" ></td>
          <td class="text-center"><input type="text" value="0" name="a11_3" class="a11_3" > </td>
          <td class="text-center"><input type="text" value="0" name="a11_4" class="a11_4" ></td>
          <td class="text-center"><input type="text" value="0" name="a11_5" class="a11_5" ></td>
          <td class="text-center"><input type="text" value="0" name="a11_6" class="a11_6" ></td>
          <td class="text-center"><input type="text" value="0" name="a11_7" class="a11_7" > </td>
          <td class="text-center"><input type="text" value="0" name="a11_8" class="a11_8" ></td>
          <td class="text-center"><input type="text" value="0" name="a11_9" class="a11_9" ></td>
          <td class="text-center"><input type="text" value="0" name="a11_10" class="a11_10" ></td>
          <td class="text-center"><input type="text" value="0" name="a11_11" class="a11_11" ></td>
          <td class="text-center"><input type="text" value="0" name="a11_12" class="a11_12" ></td>
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
          <input type="checkbox" id="<?php echo $uncertainty_data['Tempuncertainty']['id'] ;?>" name="uncertainty11_val" class="uncertainty11_val">
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
          <td class="text-center"><input type="text" value="0" name="temp12" class="temp12"></td>
          <td class="text-center">Unit </td>
          <td class="text-center"><select name="unit12" class="unit12">
              <option value="">-- Select Unit --</option>
              <option value="1" selected="selected" >°C</option>
              <option value="2">°F</option>
              <option value="3">°C</option>
              <option value="4">°F</option>
              <option value="5">Ω</option>
              <option value="6">mV</option>
              <option value="7">% rh</option>
            </select></td>
          <td class="text-center">Resolution </td>
          <td class="text-center"><input type="text" value="0" name="res12" class="res12"></td>
          <td class="text-center">Accuracy </td>
          <td class="text-center"><input type="text" value="0" name="acc12" class="acc12"></td>
          <td class="text-center">Count </td>
          <td class="text-center"><input type="text" value="0" name="count12" class="count12"></td>
          <td class="text-center">Uncertainty </td>
          <td class="text-center"><input type="text" value="0" name="uncert12" class="uncert12"></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> Master </td>
          <td class="text-center"><input type="text" value="0" name="m12_1" class="m12_1" ></td>
          <td class="text-center"><input type="text" value="0" name="m12_2" class="m12_2" ></td>
          <td class="text-center"><input type="text" value="0" name="m12_3" class="m12_3" > </td>
          <td class="text-center"><input type="text" value="0" name="m12_4" class="m12_4" ></td>
          <td class="text-center"><input type="text" value="0" name="m12_5" class="m12_5" ></td>
          <td class="text-center"><input type="text" value="0" name="m12_6" class="m12_6" ></td>
          <td class="text-center"><input type="text" value="0" name="m12_7" class="m12_7" > </td>
          <td class="text-center"><input type="text" value="0" name="m12_8" class="m12_8" ></td>
          <td class="text-center"><input type="text" value="0" name="m12_9" class="m12_9" ></td>
          <td class="text-center"><input type="text" value="0" name="m12_10" class="m12_10" ></td>
          <td class="text-center"><input type="text" value="0" name="m12_11" class="m12_11" ></td>
          <td class="text-center"><input type="text" value="0" name="m12_12" class="m12_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> B.Set </td>
          <td class="text-center"><input type="text" value="0" name="b12_1" class="b12_1" ></td>
          <td class="text-center"><input type="text" value="0" name="b12_2" class="b12_2" ></td>
          <td class="text-center"><input type="text" value="0" name="b12_3" class="b12_3" > </td>
          <td class="text-center"><input type="text" value="0" name="b12_4" class="b12_4" ></td>
          <td class="text-center"><input type="text" value="0" name="b12_5" class="b12_5" ></td>
          <td class="text-center"><input type="text" value="0" name="b12_6" class="b12_6" ></td>
          <td class="text-center"><input type="text" value="0" name="b12_7" class="b12_7" > </td>
          <td class="text-center"><input type="text" value="0" name="b12_8" class="b12_8" ></td>
          <td class="text-center"><input type="text" value="0" name="b12_9" class="b12_9" ></td>
          <td class="text-center"><input type="text" value="0" name="b12_10" class="b12_10" ></td>
          <td class="text-center"><input type="text" value="0" name="b12_11" class="b12_11" ></td>
          <td class="text-center"><input type="text" value="0" name="b12_12" class="b12_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> A.Set </td>
          <td class="text-center"><input type="text" value="0" name="a12_1" class="a12_1" ></td>
          <td class="text-center"><input type="text" value="0" name="a12_2" class="a12_2" ></td>
          <td class="text-center"><input type="text" value="0" name="a12_3" class="a12_3" > </td>
          <td class="text-center"><input type="text" value="0" name="a12_4" class="a12_4" ></td>
          <td class="text-center"><input type="text" value="0" name="a12_5" class="a12_5" ></td>
          <td class="text-center"><input type="text" value="0" name="a12_6" class="a12_6" ></td>
          <td class="text-center"><input type="text" value="0" name="a12_7" class="a12_7" > </td>
          <td class="text-center"><input type="text" value="0" name="a12_8" class="a12_8" ></td>
          <td class="text-center"><input type="text" value="0" name="a12_9" class="a12_9" ></td>
          <td class="text-center"><input type="text" value="0" name="a12_10" class="a12_10" ></td>
          <td class="text-center"><input type="text" value="0" name="a12_11" class="a12_11" ></td>
          <td class="text-center"><input type="text" value="0" name="a12_12" class="a12_12" ></td>
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
          <input type="checkbox" id="<?php echo $uncertainty_data['Tempuncertainty']['id'] ;?>" name="uncertainty12_val" class="uncertainty12_val">
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
          <td class="text-center"><input type="text" value="0" name="temp13" class="temp13"></td>
          <td class="text-center">Unit </td>
          <td class="text-center"><select name="unit13" class="unit13">
              <option value="">-- Select Unit --</option>
              <option value="1" selected="selected" >°C</option>
              <option value="2">°F</option>
              <option value="3">°C</option>
              <option value="4">°F</option>
              <option value="5">Ω</option>
              <option value="6">mV</option>
              <option value="7">% rh</option>
            </select></td>
          <td class="text-center">Resolution </td>
          <td class="text-center"><input type="text" value="0" name="res13" class="res13"></td>
          <td class="text-center">Accuracy </td>
          <td class="text-center"><input type="text" value="0" name="acc13" class="acc13"></td>
          <td class="text-center">Count </td>
          <td class="text-center"><input type="text" value="0" name="count13" class="count13"></td>
          <td class="text-center">Uncertainty </td>
          <td class="text-center"><input type="text" value="0" name="uncert13" class="uncert13"></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> Master </td>
          <td class="text-center"><input type="text" value="0" name="m13_1" class="m13_1" ></td>
          <td class="text-center"><input type="text" value="0" name="m13_2" class="m13_2" ></td>
          <td class="text-center"><input type="text" value="0" name="m13_3" class="m13_3" > </td>
          <td class="text-center"><input type="text" value="0" name="m13_4" class="m13_4" ></td>
          <td class="text-center"><input type="text" value="0" name="m13_5" class="m13_5" ></td>
          <td class="text-center"><input type="text" value="0" name="m13_6" class="m13_6" ></td>
          <td class="text-center"><input type="text" value="0" name="m13_7" class="m13_7" > </td>
          <td class="text-center"><input type="text" value="0" name="m13_8" class="m13_8" ></td>
          <td class="text-center"><input type="text" value="0" name="m13_9" class="m13_9" ></td>
          <td class="text-center"><input type="text" value="0" name="m13_10" class="m13_10" ></td>
          <td class="text-center"><input type="text" value="0" name="m13_11" class="m13_11" ></td>
          <td class="text-center"><input type="text" value="0" name="m13_12" class="m13_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> B.Set </td>
          <td class="text-center"><input type="text" value="0" name="b13_1" class="b13_1" ></td>
          <td class="text-center"><input type="text" value="0" name="b13_2" class="b13_2" ></td>
          <td class="text-center"><input type="text" value="0" name="b13_3" class="b13_3" > </td>
          <td class="text-center"><input type="text" value="0" name="b13_4" class="b13_4" ></td>
          <td class="text-center"><input type="text" value="0" name="b13_5" class="b13_5" ></td>
          <td class="text-center"><input type="text" value="0" name="b13_6" class="b13_6" ></td>
          <td class="text-center"><input type="text" value="0" name="b13_7" class="b13_7" > </td>
          <td class="text-center"><input type="text" value="0" name="b13_8" class="b13_8" ></td>
          <td class="text-center"><input type="text" value="0" name="b13_9" class="b13_9" ></td>
          <td class="text-center"><input type="text" value="0" name="b13_10" class="b13_10" ></td>
          <td class="text-center"><input type="text" value="0" name="b13_11" class="b13_11" ></td>
          <td class="text-center"><input type="text" value="0" name="b13_12" class="b13_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> A.Set </td>
         <td class="text-center"><input type="text" value="0" name="a13_1" class="a13_1" ></td>
          <td class="text-center"><input type="text" value="0" name="a13_2" class="a13_2" ></td>
          <td class="text-center"><input type="text" value="0" name="a13_3" class="a13_3" > </td>
          <td class="text-center"><input type="text" value="0" name="a13_4" class="a13_4" ></td>
          <td class="text-center"><input type="text" value="0" name="a13_5" class="a13_5" ></td>
          <td class="text-center"><input type="text" value="0" name="a13_6" class="a13_6" ></td>
          <td class="text-center"><input type="text" value="0" name="a13_7" class="a13_7" > </td>
          <td class="text-center"><input type="text" value="0" name="a13_8" class="a13_8" ></td>
          <td class="text-center"><input type="text" value="0" name="a13_9" class="a13_9" ></td>
          <td class="text-center"><input type="text" value="0" name="a13_10" class="a13_10" ></td>
          <td class="text-center"><input type="text" value="0" name="a13_11" class="a13_11" ></td>
          <td class="text-center"><input type="text" value="0" name="a13_12" class="a13_12" ></td>
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
          <input type="checkbox" id="<?php echo $uncertainty_data['Tempuncertainty']['id'] ;?>" name="uncertainty13_val" class="uncertainty13_val">
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
          <td class="text-center"><input type="text" value="0" name="temp14" class="temp14"></td>
          <td class="text-center">Unit </td>
          <td class="text-center"><select name="unit14" class="unit14">
              <option value="">-- Select Unit --</option>
              <option value="1" selected="selected" >°C</option>
              <option value="2">°F</option>
              <option value="3">°C</option>
              <option value="4">°F</option>
              <option value="5">Ω</option>
              <option value="6">mV</option>
              <option value="7">% rh</option>
            </select></td>
          <td class="text-center">Resolution </td>
          <td class="text-center"><input type="text" value="0" name="res14" class="res14"></td>
          <td class="text-center">Accuracy </td>
          <td class="text-center"><input type="text" value="0" name="acc14" class="acc14"></td>
          <td class="text-center">Count </td>
          <td class="text-center"><input type="text" value="0" name="count14" class="count14"></td>
          <td class="text-center">Uncertainty </td>
          <td class="text-center"><input type="text" value="0" name="uncert14" class="uncert14"></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> Master </td>
          <td class="text-center"><input type="text" value="0" name="m14_1" class="m14_1" ></td>
          <td class="text-center"><input type="text" value="0" name="m14_2" class="m14_2" ></td>
          <td class="text-center"><input type="text" value="0" name="m14_3" class="m14_3" > </td>
          <td class="text-center"><input type="text" value="0" name="m14_4" class="m14_4" ></td>
          <td class="text-center"><input type="text" value="0" name="m14_5" class="m14_5" ></td>
          <td class="text-center"><input type="text" value="0" name="m14_6" class="m14_6" ></td>
          <td class="text-center"><input type="text" value="0" name="m14_7" class="m14_7" > </td>
          <td class="text-center"><input type="text" value="0" name="m14_8" class="m14_8" ></td>
          <td class="text-center"><input type="text" value="0" name="m14_9" class="m14_9" ></td>
          <td class="text-center"><input type="text" value="0" name="m14_10" class="m14_10" ></td>
          <td class="text-center"><input type="text" value="0" name="m14_11" class="m14_11" ></td>
          <td class="text-center"><input type="text" value="0" name="m14_12" class="m14_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> B.Set </td>
          <td class="text-center"><input type="text" value="0" name="b14_1" class="b14_1" ></td>
          <td class="text-center"><input type="text" value="0" name="b14_2" class="b14_2" ></td>
          <td class="text-center"><input type="text" value="0" name="b14_3" class="b14_3" > </td>
          <td class="text-center"><input type="text" value="0" name="b14_4" class="b14_4" ></td>
          <td class="text-center"><input type="text" value="0" name="b14_5" class="b14_5" ></td>
          <td class="text-center"><input type="text" value="0" name="b14_6" class="b14_6" ></td>
          <td class="text-center"><input type="text" value="0" name="b14_7" class="b14_7" > </td>
          <td class="text-center"><input type="text" value="0" name="b14_8" class="b14_8" ></td>
          <td class="text-center"><input type="text" value="0" name="b14_9" class="b14_9" ></td>
          <td class="text-center"><input type="text" value="0" name="b14_10" class="b14_10" ></td>
          <td class="text-center"><input type="text" value="0" name="b14_11" class="b14_11" ></td>
          <td class="text-center"><input type="text" value="0" name="b14_12" class="b14_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> A.Set </td>
          <td class="text-center"><input type="text" value="0" name="a14_1" class="a14_1" ></td>
          <td class="text-center"><input type="text" value="0" name="a14_2" class="a14_2" ></td>
          <td class="text-center"><input type="text" value="0" name="a14_3" class="a14_3" > </td>
          <td class="text-center"><input type="text" value="0" name="a14_4" class="a14_4" ></td>
          <td class="text-center"><input type="text" value="0" name="a14_5" class="a14_5" ></td>
          <td class="text-center"><input type="text" value="0" name="a14_6" class="a14_6" ></td>
          <td class="text-center"><input type="text" value="0" name="a14_7" class="a14_7" > </td>
          <td class="text-center"><input type="text" value="0" name="a14_8" class="a14_8" ></td>
          <td class="text-center"><input type="text" value="0" name="a14_9" class="a14_9" ></td>
          <td class="text-center"><input type="text" value="0" name="a14_10" class="a14_10" ></td>
          <td class="text-center"><input type="text" value="0" name="a14_11" class="a14_11" ></td>
          <td class="text-center"><input type="text" value="0" name="a14_12" class="a14_12" ></td>
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
          <input type="checkbox" id="<?php echo $uncertainty_data['Tempuncertainty']['id'] ;?>" name="uncertainty14_val" class="uncertainty14_val">
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
          <td class="text-center"><input type="text" value="0" name="temp15" class="temp15"></td>
          <td class="text-center">Unit </td>
          <td class="text-center"><select name="unit15" class="unit15">
              <option value="">-- Select Unit --</option>
              <option value="1" selected="selected" >°C</option>
              <option value="2">°F</option>
              <option value="3">°C</option>
              <option value="4">°F</option>
              <option value="5">Ω</option>
              <option value="6">mV</option>
              <option value="7">% rh</option>
            </select></td>
          <td class="text-center">Resolution </td>
          <td class="text-center"><input type="text" value="0" name="res15" class="res15"></td>
          <td class="text-center">Accuracy </td>
          <td class="text-center"><input type="text" value="0" name="acc15" class="acc15"></td>
          <td class="text-center">Count </td>
          <td class="text-center"><input type="text" value="0" name="count15" class="count15"></td>
          <td class="text-center">Uncertainty </td>
          <td class="text-center"><input type="text" value="0" name="uncert15" class="uncert15"></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> Master </td>
          <td class="text-center"><input type="text" value="0" name="m15_1" class="m15_1" ></td>
          <td class="text-center"><input type="text" value="0" name="m15_2" class="m15_2" ></td>
          <td class="text-center"><input type="text" value="0" name="m15_3" class="m15_3" > </td>
          <td class="text-center"><input type="text" value="0" name="m15_4" class="m15_4" ></td>
          <td class="text-center"><input type="text" value="0" name="m15_5" class="m15_5" ></td>
          <td class="text-center"><input type="text" value="0" name="m15_6" class="m15_6" ></td>
          <td class="text-center"><input type="text" value="0" name="m15_7" class="m15_7" > </td>
          <td class="text-center"><input type="text" value="0" name="m15_8" class="m15_8" ></td>
          <td class="text-center"><input type="text" value="0" name="m15_9" class="m15_9" ></td>
          <td class="text-center"><input type="text" value="0" name="m15_10" class="m15_10" ></td>
          <td class="text-center"><input type="text" value="0" name="m15_11" class="m15_11" ></td>
          <td class="text-center"><input type="text" value="0" name="m15_12" class="m15_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> B.Set </td>
          <td class="text-center"><input type="text" value="0" name="b15_1" class="b15_1" ></td>
          <td class="text-center"><input type="text" value="0" name="b15_2" class="b15_2" ></td>
          <td class="text-center"><input type="text" value="0" name="b15_3" class="b15_3" > </td>
          <td class="text-center"><input type="text" value="0" name="b15_4" class="b15_4" ></td>
          <td class="text-center"><input type="text" value="0" name="b15_5" class="b15_5" ></td>
          <td class="text-center"><input type="text" value="0" name="b15_6" class="b15_6" ></td>
          <td class="text-center"><input type="text" value="0" name="b15_7" class="b15_7" > </td>
          <td class="text-center"><input type="text" value="0" name="b15_8" class="b15_8" ></td>
          <td class="text-center"><input type="text" value="0" name="b15_9" class="b15_9" ></td>
          <td class="text-center"><input type="text" value="0" name="b15_10" class="b15_10" ></td>
          <td class="text-center"><input type="text" value="0" name="b15_11" class="b15_11" ></td>
          <td class="text-center"><input type="text" value="0" name="b15_12" class="b15_12" ></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> A.Set </td>
          <td class="text-center"><input type="text" value="0" name="a15_1" class="a15_1" ></td>
          <td class="text-center"><input type="text" value="0" name="a15_2" class="a15_2" ></td>
          <td class="text-center"><input type="text" value="0" name="a15_3" class="a15_3" > </td>
          <td class="text-center"><input type="text" value="0" name="a15_4" class="a15_4" ></td>
          <td class="text-center"><input type="text" value="0" name="a15_5" class="a15_5" ></td>
          <td class="text-center"><input type="text" value="0" name="a15_6" class="a15_6" ></td>
          <td class="text-center"><input type="text" value="0" name="a15_7" class="a15_7" > </td>
          <td class="text-center"><input type="text" value="0" name="a15_8" class="a15_8" ></td>
          <td class="text-center"><input type="text" value="0" name="a15_9" class="a15_9" ></td>
          <td class="text-center"><input type="text" value="0" name="a15_10" class="a15_10" ></td>
          <td class="text-center"><input type="text" value="0" name="a15_11" class="a15_11" ></td>
          <td class="text-center"><input type="text" value="0" name="a15_12" class="a15_12" ></td>
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
          <input type="checkbox" id="<?php echo $uncertainty_data['Tempuncertainty']['id'] ;?>" name="uncertainty15_val" class="uncertainty15_val">
          <label><?php echo $uncertainty_data['Tempuncertainty']['tagno']; ?></label>
        </div>
          <?php } ?>
      </div>
    </div>
  </div>
  
</div>
