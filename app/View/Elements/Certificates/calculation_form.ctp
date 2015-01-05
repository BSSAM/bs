<?php ?>
<div class="col-sm-3 col-lg-12 subcontract_linear certificate_table certificate_tab"> 
  <!-- table1-->
  <div class="form-group c_top_search">
    <label for="val_customername" class=" control-label">No.of Runs</label>
   <?php echo $this->Form->input('no_runs', array('id' => 'val_no_runs', 'class' => 'form-control', 'label' => false, 'type' => 'select', 'empty' => '10')); ?>
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
      <tbody class="subcontract_instrument_info">
        <tr class="text-center c_light_bg">
          <td class="text-center">1</td>
          <td class="text-center">Set Temperature</td>
          <td class="text-center"><input type="text" value="0.000000000000000000"></td>
          <td class="text-center">Unit </td>
          <td class="text-center"><select>
              <option value="">-- Select Unit --</option>
              <option value="1" selected="selected">°C</option>
              <option value="2">°F</option>
              <option value="3">°C</option>
              <option value="4">°F</option>
              <option value="5">Ω</option>
              <option value="6">mV</option>
              <option value="7">% rh</option>
            </select></td>
          <td class="text-center">Resolution </td>
          <td class="text-center"><input type="text" value="0.100000000000000000"></td>
          <td class="text-center">Accuracy </td>
          <td class="text-center"><input type="text" value="0.000000000000000000"></td>
          <td class="text-center">Count </td>
          <td class="text-center"><input type="text" value="0.000000000000000000"></td>
          <td class="text-center">Uncertainty </td>
          <td class="text-center"><input type="text" value="0"></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> Master </td>
          <td class="text-center">0</td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> B.Set </td>
          <td class="text-center">0</td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> A.Set </td>
          <td class="text-center">0</td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
        </tr>
      </tbody>
    </table>
    <div class="c_refress_blog">
      <div class="pref_ref">Pref Reference </div>
      <div class="c_overflow">
        <div class="c_ref_btn">
          <button class="btn btn-sm btn-success" type="reset"><i class="fa fa-repeat"></i>Refresh</button>
        </div>
        <div class="c_refress_blog_input">
          <input type="checkbox">
          <label>BS 1328</label>
        </div>
        <div class="c_refress_blog_input">
          <input type="checkbox">
          <label>BS 1340</label>
        </div>
		<div class="c_refress_blog_input">
          <input type="checkbox">
          <label>BS 1341</label>
        </div>
        <div class="c_refress_blog_input">
          <input type="checkbox">
          <label>TYPE</label>
        </div>
      </div>
    </div>
  </div>
  <!-- table2-->
  <div class="pos_relative">
    <table  class="table table-vcenter table-condensed table-bordered">
      <tbody class="subcontract_instrument_info">
        <tr class="text-center c_light_bg">
          <td class="text-center">2</td>
          <td class="text-center">Set Temperature</td>
          <td class="text-center"><input type="text" value="0.000000000000000000"></td>
          <td class="text-center">Unit </td>
          <td class="text-center"><select>
              <option value="">-- Select Unit --</option>
              <option value="1" selected="selected">°C</option>
              <option value="2">°F</option>
              <option value="3">°C</option>
              <option value="4">°F</option>
              <option value="5">Ω</option>
              <option value="6">mV</option>
              <option value="7">% rh</option>
            </select></td>
          <td class="text-center">Resolution </td>
          <td class="text-center"><input type="text" value="0.100000000000000000"></td>
          <td class="text-center">Accuracy </td>
          <td class="text-center"><input type="text" value="0.000000000000000000"></td>
          <td class="text-center">Count </td>
          <td class="text-center"><input type="text" value="0.000000000000000000"></td>
          <td class="text-center">Uncertainty </td>
          <td class="text-center"><input type="text" value="0"></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> Master </td>
          <td class="text-center">0</td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> B.Set </td>
          <td class="text-center">0</td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> A.Set </td>
          <td class="text-center">0</td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
        </tr>
      </tbody>
    </table>
    <div class="c_refress_blog">
      <div class="c_overflow">
        <div class="c_ref_btn">
          <button class="btn btn-sm btn-success" type="reset"><i class="fa fa-repeat"></i>Refresh</button>
        </div>
        <div class="c_refress_blog_input">
          <input type="checkbox">
          <label>BS 1328</label>
        </div>
        <div class="c_refress_blog_input">
          <input type="checkbox">
          <label>BS 1340</label>
        </div>
        <div class="c_refress_blog_input">
          <input type="checkbox">
          <label>TYPE</label>
        </div>
      </div>
    </div>
  </div>
  <!-- table3-->
  <div class="pos_relative">
    <table  class="table table-vcenter table-condensed table-bordered">
      <tbody class="subcontract_instrument_info">
        <tr class="text-center c_light_bg">
          <td class="text-center">3</td>
          <td class="text-center">Set Temperature</td>
          <td class="text-center"><input type="text" value="0.000000000000000000"></td>
          <td class="text-center">Unit </td>
          <td class="text-center"><select>
              <option value="">-- Select Unit --</option>
              <option value="1" selected="selected">°C</option>
              <option value="2">°F</option>
              <option value="3">°C</option>
              <option value="4">°F</option>
              <option value="5">Ω</option>
              <option value="6">mV</option>
              <option value="7">% rh</option>
            </select></td>
          <td class="text-center">Resolution </td>
          <td class="text-center"><input type="text" value="0.100000000000000000"></td>
          <td class="text-center">Accuracy </td>
          <td class="text-center"><input type="text" value="0.000000000000000000"></td>
          <td class="text-center">Count </td>
          <td class="text-center"><input type="text" value="0.000000000000000000"></td>
          <td class="text-center">Uncertainty </td>
          <td class="text-center"><input type="text" value="0"></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> Master </td>
          <td class="text-center">0</td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> B.Set </td>
          <td class="text-center">0</td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> A.Set </td>
          <td class="text-center">0</td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
        </tr>
      </tbody>
    </table>
    <div class="c_refress_blog">
      <div class="c_overflow">
        <div class="c_ref_btn">
          <button class="btn btn-sm btn-success" type="reset"><i class="fa fa-repeat"></i>Refresh</button>
        </div>
        <div class="c_refress_blog_input">
          <input type="checkbox">
          <label>BS 1328</label>
        </div>
        <div class="c_refress_blog_input">
          <input type="checkbox">
          <label>BS 1340</label>
        </div>
		<div class="c_refress_blog_input">
          <input type="checkbox">
          <label>BS 1344</label>
        </div>
        <div class="c_refress_blog_input">
          <input type="checkbox">
          <label>TYPE</label>
        </div>
      </div>
    </div>
  </div>
  <!-- table4-->
  <div class="pos_relative">
    <table  class="table table-vcenter table-condensed table-bordered">
      <tbody class="subcontract_instrument_info">
        <tr class="text-center c_light_bg">
          <td class="text-center">4</td>
          <td class="text-center">Set Temperature</td>
          <td class="text-center"><input type="text" value="0.000000000000000000"></td>
          <td class="text-center">Unit </td>
          <td class="text-center"><select>
              <option value="">-- Select Unit --</option>
              <option value="1" selected="selected">°C</option>
              <option value="2">°F</option>
              <option value="3">°C</option>
              <option value="4">°F</option>
              <option value="5">Ω</option>
              <option value="6">mV</option>
              <option value="7">% rh</option>
            </select></td>
          <td class="text-center">Resolution </td>
          <td class="text-center"><input type="text" value="0.100000000000000000"></td>
          <td class="text-center">Accuracy </td>
          <td class="text-center"><input type="text" value="0.000000000000000000"></td>
          <td class="text-center">Count </td>
          <td class="text-center"><input type="text" value="0.000000000000000000"></td>
          <td class="text-center">Uncertainty </td>
          <td class="text-center"><input type="text" value="0"></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> Master </td>
          <td class="text-center">0</td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> B.Set </td>
          <td class="text-center">0</td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> A.Set </td>
          <td class="text-center">0</td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
        </tr>
      </tbody>
    </table>
    <div class="c_refress_blog">
      <div class="c_overflow">
        <div class="c_ref_btn">
          <button class="btn btn-sm btn-success" type="reset"><i class="fa fa-repeat"></i>Refresh</button>
        </div>
        <div class="c_refress_blog_input">
          <input type="checkbox">
          <label>BS 1328</label>
        </div>
        <div class="c_refress_blog_input">
          <input type="checkbox">
          <label>BS 1340</label>
        </div>
        <div class="c_refress_blog_input">
          <input type="checkbox">
          <label>TYPE</label>
        </div>
      </div>
    </div>
  </div>
  <!-- table5-->
  <div class="pos_relative">
    <table  class="table table-vcenter table-condensed table-bordered">
      <tbody class="subcontract_instrument_info">
        <tr class="text-center c_light_bg">
          <td class="text-center">5</td>
          <td class="text-center">Set Temperature</td>
          <td class="text-center"><input type="text" value="0.000000000000000000"></td>
          <td class="text-center">Unit </td>
          <td class="text-center"><select>
              <option value="">-- Select Unit --</option>
              <option value="1" selected="selected">°C</option>
              <option value="2">°F</option>
              <option value="3">°C</option>
              <option value="4">°F</option>
              <option value="5">Ω</option>
              <option value="6">mV</option>
              <option value="7">% rh</option>
            </select></td>
          <td class="text-center">Resolution </td>
          <td class="text-center"><input type="text" value="0.100000000000000000"></td>
          <td class="text-center">Accuracy </td>
          <td class="text-center"><input type="text" value="0.000000000000000000"></td>
          <td class="text-center">Count </td>
          <td class="text-center"><input type="text" value="0.000000000000000000"></td>
          <td class="text-center">Uncertainty </td>
          <td class="text-center"><input type="text" value="0"></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> Master </td>
          <td class="text-center">0</td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> B.Set </td>
          <td class="text-center">0</td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> A.Set </td>
          <td class="text-center">0</td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
        </tr>
      </tbody>
    </table>
    <div class="c_refress_blog">
      <div class="c_overflow">
        <div class="c_ref_btn">
          <button class="btn btn-sm btn-success" type="reset"><i class="fa fa-repeat"></i>Refresh</button>
        </div>
        <div class="c_refress_blog_input">
          <input type="checkbox">
          <label>BS 1328</label>
        </div>
        <div class="c_refress_blog_input">
          <input type="checkbox">
          <label>BS 1340</label>
        </div>
        <div class="c_refress_blog_input">
          <input type="checkbox">
          <label>TYPE</label>
        </div>
      </div>
    </div>
  </div>
  <!-- table6-->
  <div class="pos_relative">
    <table  class="table table-vcenter table-condensed table-bordered">
      <tbody class="subcontract_instrument_info">
        <tr class="text-center c_light_bg">
          <td class="text-center">6</td>
          <td class="text-center">Set Temperature</td>
          <td class="text-center"><input type="text" value="0.000000000000000000"></td>
          <td class="text-center">Unit </td>
          <td class="text-center"><select>
              <option value="">-- Select Unit --</option>
              <option value="1" selected="selected">°C</option>
              <option value="2">°F</option>
              <option value="3">°C</option>
              <option value="4">°F</option>
              <option value="5">Ω</option>
              <option value="6">mV</option>
              <option value="7">% rh</option>
            </select></td>
          <td class="text-center">Resolution </td>
          <td class="text-center"><input type="text" value="0.100000000000000000"></td>
          <td class="text-center">Accuracy </td>
          <td class="text-center"><input type="text" value="0.000000000000000000"></td>
          <td class="text-center">Count </td>
          <td class="text-center"><input type="text" value="0.000000000000000000"></td>
          <td class="text-center">Uncertainty </td>
          <td class="text-center"><input type="text" value="0"></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> Master </td>
          <td class="text-center">0</td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> B.Set </td>
          <td class="text-center">0</td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> A.Set </td>
          <td class="text-center">0</td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
        </tr>
      </tbody>
    </table>
    <div class="c_refress_blog">
      <div class="c_overflow">
        <div class="c_ref_btn">
          <button class="btn btn-sm btn-success" type="reset"><i class="fa fa-repeat"></i>Refresh</button>
        </div>
        <div class="c_refress_blog_input">
          <input type="checkbox">
          <label>BS 1328</label>
        </div>
        <div class="c_refress_blog_input">
          <input type="checkbox">
          <label>BS 1340</label>
        </div>
        <div class="c_refress_blog_input">
          <input type="checkbox">
          <label>TYPE</label>
        </div>
      </div>
    </div>
  </div>
  <!-- table7-->
  <div class="pos_relative">
    <table  class="table table-vcenter table-condensed table-bordered">
      <tbody class="subcontract_instrument_info">
        <tr class="text-center c_light_bg">
          <td class="text-center">7</td>
          <td class="text-center">Set Temperature</td>
          <td class="text-center"><input type="text" value="0.000000000000000000"></td>
          <td class="text-center">Unit </td>
          <td class="text-center"><select>
              <option value="">-- Select Unit --</option>
              <option value="1" selected="selected">°C</option>
              <option value="2">°F</option>
              <option value="3">°C</option>
              <option value="4">°F</option>
              <option value="5">Ω</option>
              <option value="6">mV</option>
              <option value="7">% rh</option>
            </select></td>
          <td class="text-center">Resolution </td>
          <td class="text-center"><input type="text" value="0.100000000000000000"></td>
          <td class="text-center">Accuracy </td>
          <td class="text-center"><input type="text" value="0.000000000000000000"></td>
          <td class="text-center">Count </td>
          <td class="text-center"><input type="text" value="0.000000000000000000"></td>
          <td class="text-center">Uncertainty </td>
          <td class="text-center"><input type="text" value="0"></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> Master </td>
          <td class="text-center">0</td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> B.Set </td>
          <td class="text-center">0</td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> A.Set </td>
          <td class="text-center">0</td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
        </tr>
      </tbody>
    </table>
    <div class="c_refress_blog">
      <div class="c_overflow">
        <div class="c_ref_btn">
          <button class="btn btn-sm btn-success" type="reset"><i class="fa fa-repeat"></i>Refresh</button>
        </div>
        <div class="c_refress_blog_input">
          <input type="checkbox">
          <label>BS 1328</label>
        </div>
        <div class="c_refress_blog_input">
          <input type="checkbox">
          <label>BS 1340</label>
        </div>
        <div class="c_refress_blog_input">
          <input type="checkbox">
          <label>TYPE</label>
        </div>
      </div>
    </div>
  </div>
  <!-- table8-->
  <div class="pos_relative">
    <table  class="table table-vcenter table-condensed table-bordered">
      <tbody class="subcontract_instrument_info">
        <tr class="text-center c_light_bg">
          <td class="text-center">8</td>
          <td class="text-center">Set Temperature</td>
          <td class="text-center"><input type="text" value="0.000000000000000000"></td>
          <td class="text-center">Unit </td>
          <td class="text-center"><select>
              <option value="">-- Select Unit --</option>
              <option value="1" selected="selected">°C</option>
              <option value="2">°F</option>
              <option value="3">°C</option>
              <option value="4">°F</option>
              <option value="5">Ω</option>
              <option value="6">mV</option>
              <option value="7">% rh</option>
            </select></td>
          <td class="text-center">Resolution </td>
          <td class="text-center"><input type="text" value="0.100000000000000000"></td>
          <td class="text-center">Accuracy </td>
          <td class="text-center"><input type="text" value="0.000000000000000000"></td>
          <td class="text-center">Count </td>
          <td class="text-center"><input type="text" value="0.000000000000000000"></td>
          <td class="text-center">Uncertainty </td>
          <td class="text-center"><input type="text" value="0"></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> Master </td>
          <td class="text-center">0</td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> B.Set </td>
          <td class="text-center">0</td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> A.Set </td>
          <td class="text-center">0</td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
        </tr>
      </tbody>
    </table>
    <div class="c_refress_blog">
      <div class="c_overflow">
        <div class="c_ref_btn">
          <button class="btn btn-sm btn-success" type="reset"><i class="fa fa-repeat"></i>Refresh</button>
        </div>
        <div class="c_refress_blog_input">
          <input type="checkbox">
          <label>BS 1328</label>
        </div>
        <div class="c_refress_blog_input">
          <input type="checkbox">
          <label>BS 1340</label>
        </div>
        <div class="c_refress_blog_input">
          <input type="checkbox">
          <label>TYPE</label>
        </div>
      </div>
    </div>
  </div>
  <!-- table9-->
  <div class="pos_relative">
    <table  class="table table-vcenter table-condensed table-bordered">
      <tbody class="subcontract_instrument_info">
        <tr class="text-center c_light_bg">
          <td class="text-center">9</td>
          <td class="text-center">Set Temperature</td>
          <td class="text-center"><input type="text" value="0.000000000000000000"></td>
          <td class="text-center">Unit </td>
          <td class="text-center"><select>
              <option value="">-- Select Unit --</option>
              <option value="1" selected="selected">°C</option>
              <option value="2">°F</option>
              <option value="3">°C</option>
              <option value="4">°F</option>
              <option value="5">Ω</option>
              <option value="6">mV</option>
              <option value="7">% rh</option>
            </select></td>
          <td class="text-center">Resolution </td>
          <td class="text-center"><input type="text" value="0.100000000000000000"></td>
          <td class="text-center">Accuracy </td>
          <td class="text-center"><input type="text" value="0.000000000000000000"></td>
          <td class="text-center">Count </td>
          <td class="text-center"><input type="text" value="0.000000000000000000"></td>
          <td class="text-center">Uncertainty </td>
          <td class="text-center"><input type="text" value="0"></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> Master </td>
          <td class="text-center">0</td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> B.Set </td>
          <td class="text-center">0</td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> A.Set </td>
          <td class="text-center">0</td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
        </tr>
      </tbody>
    </table>
    <div class="c_refress_blog">
      <div class="c_overflow">
        <div class="c_ref_btn">
          <button class="btn btn-sm btn-success" type="reset"><i class="fa fa-repeat"></i>Refresh</button>
        </div>
        <div class="c_refress_blog_input">
          <input type="checkbox">
          <label>BS 1328</label>
        </div>
        <div class="c_refress_blog_input">
          <input type="checkbox">
          <label>BS 1340</label>
        </div>
        <div class="c_refress_blog_input">
          <input type="checkbox">
          <label>TYPE</label>
        </div>
      </div>
    </div>
  </div>
  <!-- table10-->
  <div class="pos_relative">
    <table  class="table table-vcenter table-condensed table-bordered">
      <tbody class="subcontract_instrument_info">
        <tr class="text-center c_light_bg">
          <td class="text-center">10</td>
          <td class="text-center">Set Temperature</td>
          <td class="text-center"><input type="text" value="0.000000000000000000"></td>
          <td class="text-center">Unit </td>
          <td class="text-center"><select>
              <option value="">-- Select Unit --</option>
              <option value="1" selected="selected">°C</option>
              <option value="2">°F</option>
              <option value="3">°C</option>
              <option value="4">°F</option>
              <option value="5">Ω</option>
              <option value="6">mV</option>
              <option value="7">% rh</option>
            </select></td>
          <td class="text-center">Resolution </td>
          <td class="text-center"><input type="text" value="0.100000000000000000"></td>
          <td class="text-center">Accuracy </td>
          <td class="text-center"><input type="text" value="0.000000000000000000"></td>
          <td class="text-center">Count </td>
          <td class="text-center"><input type="text" value="0.000000000000000000"></td>
          <td class="text-center">Uncertainty </td>
          <td class="text-center"><input type="text" value="0"></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> Master </td>
          <td class="text-center">0</td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> B.Set </td>
          <td class="text-center">0</td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> A.Set </td>
          <td class="text-center">0</td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
        </tr>
      </tbody>
    </table>
    <div class="c_refress_blog">
      <div class="c_overflow">
        <div class="c_ref_btn">
          <button class="btn btn-sm btn-success" type="reset"><i class="fa fa-repeat"></i>Refresh</button>
        </div>
        <div class="c_refress_blog_input">
          <input type="checkbox">
          <label>BS 1328</label>
        </div>
        <div class="c_refress_blog_input">
          <input type="checkbox">
          <label>BS 1340</label>
        </div>
        <div class="c_refress_blog_input">
          <input type="checkbox">
          <label>TYPE</label>
        </div>
      </div>
    </div>
  </div>
  <!-- table11-->
  <div class="pos_relative">
    <table  class="table table-vcenter table-condensed table-bordered">
      <tbody class="subcontract_instrument_info">
        <tr class="text-center c_light_bg">
          <td class="text-center">11</td>
          <td class="text-center">Set Temperature</td>
          <td class="text-center"><input type="text" value="0.000000000000000000"></td>
          <td class="text-center">Unit </td>
          <td class="text-center"><select>
              <option value="">-- Select Unit --</option>
              <option value="1" selected="selected">°C</option>
              <option value="2">°F</option>
              <option value="3">°C</option>
              <option value="4">°F</option>
              <option value="5">Ω</option>
              <option value="6">mV</option>
              <option value="7">% rh</option>
            </select></td>
          <td class="text-center">Resolution </td>
          <td class="text-center"><input type="text" value="0.100000000000000000"></td>
          <td class="text-center">Accuracy </td>
          <td class="text-center"><input type="text" value="0.000000000000000000"></td>
          <td class="text-center">Count </td>
          <td class="text-center"><input type="text" value="0.000000000000000000"></td>
          <td class="text-center">Uncertainty </td>
          <td class="text-center"><input type="text" value="0"></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> Master </td>
          <td class="text-center">0</td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> B.Set </td>
          <td class="text-center">0</td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> A.Set </td>
          <td class="text-center">0</td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
        </tr>
      </tbody>
    </table>
    <div class="c_refress_blog">
      <div class="c_overflow">
        <div class="c_ref_btn">
          <button class="btn btn-sm btn-success" type="reset"><i class="fa fa-repeat"></i>Refresh</button>
        </div>
        <div class="c_refress_blog_input">
          <input type="checkbox">
          <label>BS 1328</label>
        </div>
        <div class="c_refress_blog_input">
          <input type="checkbox">
          <label>BS 1340</label>
        </div>
        <div class="c_refress_blog_input">
          <input type="checkbox">
          <label>TYPE</label>
        </div>
      </div>
    </div>
  </div>
  <!-- table12-->
  <div class="pos_relative">
    <table  class="table table-vcenter table-condensed table-bordered">
      <tbody class="subcontract_instrument_info">
        <tr class="text-center c_light_bg">
          <td class="text-center">12</td>
          <td class="text-center">Set Temperature</td>
          <td class="text-center"><input type="text" value="0.000000000000000000"></td>
          <td class="text-center">Unit </td>
          <td class="text-center"><select>
              <option value="">-- Select Unit --</option>
              <option value="1" selected="selected">°C</option>
              <option value="2">°F</option>
              <option value="3">°C</option>
              <option value="4">°F</option>
              <option value="5">Ω</option>
              <option value="6">mV</option>
              <option value="7">% rh</option>
            </select></td>
          <td class="text-center">Resolution </td>
          <td class="text-center"><input type="text" value="0.100000000000000000"></td>
          <td class="text-center">Accuracy </td>
          <td class="text-center"><input type="text" value="0.000000000000000000"></td>
          <td class="text-center">Count </td>
          <td class="text-center"><input type="text" value="0.000000000000000000"></td>
          <td class="text-center">Uncertainty </td>
          <td class="text-center"><input type="text" value="0"></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> Master </td>
          <td class="text-center">0</td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> B.Set </td>
          <td class="text-center">0</td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> A.Set </td>
          <td class="text-center">0</td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
        </tr>
      </tbody>
    </table>
    <div class="c_refress_blog">
      <div class="c_overflow">
        <div class="c_ref_btn">
          <button class="btn btn-sm btn-success" type="reset"><i class="fa fa-repeat"></i>Refresh</button>
        </div>
        <div class="c_refress_blog_input">
          <input type="checkbox">
          <label>BS 1328</label>
        </div>
        <div class="c_refress_blog_input">
          <input type="checkbox">
          <label>BS 1340</label>
        </div>
        <div class="c_refress_blog_input">
          <input type="checkbox">
          <label>TYPE</label>
        </div>
      </div>
    </div>
  </div>
  <!-- table13-->
  <div class="pos_relative">
    <table  class="table table-vcenter table-condensed table-bordered">
      <tbody class="subcontract_instrument_info">
        <tr class="text-center c_light_bg">
          <td class="text-center">13</td>
          <td class="text-center">Set Temperature</td>
          <td class="text-center"><input type="text" value="0.000000000000000000"></td>
          <td class="text-center">Unit </td>
          <td class="text-center"><select>
              <option value="">-- Select Unit --</option>
              <option value="1" selected="selected">°C</option>
              <option value="2">°F</option>
              <option value="3">°C</option>
              <option value="4">°F</option>
              <option value="5">Ω</option>
              <option value="6">mV</option>
              <option value="7">% rh</option>
            </select></td>
          <td class="text-center">Resolution </td>
          <td class="text-center"><input type="text" value="0.100000000000000000"></td>
          <td class="text-center">Accuracy </td>
          <td class="text-center"><input type="text" value="0.000000000000000000"></td>
          <td class="text-center">Count </td>
          <td class="text-center"><input type="text" value="0.000000000000000000"></td>
          <td class="text-center">Uncertainty </td>
          <td class="text-center"><input type="text" value="0"></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> Master </td>
          <td class="text-center">0</td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> B.Set </td>
          <td class="text-center">0</td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> A.Set </td>
          <td class="text-center">0</td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
        </tr>
      </tbody>
    </table>
    <div class="c_refress_blog">
      <div class="c_overflow">
        <div class="c_ref_btn">
          <button class="btn btn-sm btn-success" type="reset"><i class="fa fa-repeat"></i>Refresh</button>
        </div>
        <div class="c_refress_blog_input">
          <input type="checkbox">
          <label>BS 1328</label>
        </div>
        <div class="c_refress_blog_input">
          <input type="checkbox">
          <label>BS 1340</label>
        </div>
        <div class="c_refress_blog_input">
          <input type="checkbox">
          <label>TYPE</label>
        </div>
      </div>
    </div>
  </div>
  <!-- table14-->
  <div class="pos_relative">
    <table  class="table table-vcenter table-condensed table-bordered">
      <tbody class="subcontract_instrument_info">
        <tr class="text-center c_light_bg">
          <td class="text-center">14</td>
          <td class="text-center">Set Temperature</td>
          <td class="text-center"><input type="text" value="0.000000000000000000"></td>
          <td class="text-center">Unit </td>
          <td class="text-center"><select>
              <option value="">-- Select Unit --</option>
              <option value="1" selected="selected">°C</option>
              <option value="2">°F</option>
              <option value="3">°C</option>
              <option value="4">°F</option>
              <option value="5">Ω</option>
              <option value="6">mV</option>
              <option value="7">% rh</option>
            </select></td>
          <td class="text-center">Resolution </td>
          <td class="text-center"><input type="text" value="0.100000000000000000"></td>
          <td class="text-center">Accuracy </td>
          <td class="text-center"><input type="text" value="0.000000000000000000"></td>
          <td class="text-center">Count </td>
          <td class="text-center"><input type="text" value="0.000000000000000000"></td>
          <td class="text-center">Uncertainty </td>
          <td class="text-center"><input type="text" value="0"></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> Master </td>
          <td class="text-center">0</td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> B.Set </td>
          <td class="text-center">0</td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> A.Set </td>
          <td class="text-center">0</td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
        </tr>
      </tbody>
    </table>
    <div class="c_refress_blog">
      <div class="c_overflow">
        <div class="c_ref_btn">
          <button class="btn btn-sm btn-success" type="reset"><i class="fa fa-repeat"></i>Refresh</button>
        </div>
        <div class="c_refress_blog_input">
          <input type="checkbox">
          <label>BS 1328</label>
        </div>
        <div class="c_refress_blog_input">
          <input type="checkbox">
          <label>BS 1340</label>
        </div>
        <div class="c_refress_blog_input">
          <input type="checkbox">
          <label>TYPE</label>
        </div>
      </div>
    </div>
  </div>
  <!-- table15-->
  <div class="pos_relative">
    <table  class="table table-vcenter table-condensed table-bordered">
      <tbody class="subcontract_instrument_info">
        <tr class="text-center c_light_bg">
          <td class="text-center">15</td>
          <td class="text-center">Set Temperature</td>
          <td class="text-center"><input type="text" value="0.000000000000000000"></td>
          <td class="text-center">Unit </td>
          <td class="text-center"><select>
              <option value="">-- Select Unit --</option>
              <option value="1" selected="selected">°C</option>
              <option value="2">°F</option>
              <option value="3">°C</option>
              <option value="4">°F</option>
              <option value="5">Ω</option>
              <option value="6">mV</option>
              <option value="7">% rh</option>
            </select></td>
          <td class="text-center">Resolution </td>
          <td class="text-center"><input type="text" value="0.100000000000000000"></td>
          <td class="text-center">Accuracy </td>
          <td class="text-center"><input type="text" value="0.000000000000000000"></td>
          <td class="text-center">Count </td>
          <td class="text-center"><input type="text" value="0.000000000000000000"></td>
          <td class="text-center">Uncertainty </td>
          <td class="text-center"><input type="text" value="0"></td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> Master </td>
          <td class="text-center">0</td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> B.Set </td>
          <td class="text-center">0</td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
        </tr>
        <tr class="text-center">
          <td class="text-center"> A.Set </td>
          <td class="text-center">0</td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
          <td class="text-center">0 </td>
          <td class="text-center">0</td>
        </tr>
      </tbody>
    </table>
    <div class="c_refress_blog">
      <div class="c_overflow">
        <div class="c_ref_btn">
          <button class="btn btn-sm btn-success" type="reset"><i class="fa fa-repeat"></i>Refresh</button>
        </div>
        <div class="c_refress_blog_input">
          <input type="checkbox">
          <label>BS 1328</label>
        </div>
        <div class="c_refress_blog_input">
          <input type="checkbox">
          <label>BS 1340</label>
        </div>
        <div class="c_refress_blog_input">
          <input type="checkbox">
          <label>TYPE</label>
        </div>
      </div>
    </div>
  </div>
</div>
