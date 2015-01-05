<?php ?>

<div class="c_form1">
  <div class="form-group">
    <label for="val_customername" class="col-md-2 control-label">Certificate No</label>
    <div class="col-md-2"> <?php echo $this->Form->input('certificateno', array('id' => 'val_certificateno','class' => 'form-control', 'label' => false, 'placeholder' => '','readonly'=>true, 'value'=>'TS 0004-13')); ?> </div>
    <label for="val_duedate" class="col-md-2 control-label">Manufacturer </label>
    <div class="col-md-2">
      <?php
                echo $this->Form->input('manufacturer', array('id' => 'val_manufacturer', 'class' => 'form-control',
            'placeholder' => 'Enter Remarks', 'label' => false,'type'=>'textarea', 'rows'=>'2','readonly'=>true, 'value'=>'LINE SEIKI'));
            ?>
    </div>
    <label for="val_attn" class="col-md-2 control-label">Date Calibrated</label>
    <div class="col-md-2"> <?php echo $this->Form->input('date_calibrated', array('id' => 'val_date_calibrated', 'class' => 'form-control input-datepicker-close', 'data-date-format' => 'dd-MM-yy', 'label' => false,'value'=>'12-jul-2013'));?> </div>
  </div>
  <div class="form-group">
    <label for="val_customername" class="col-md-2 control-label">SalesOrderID</label>
    <div class="col-md-2"> <?php echo $this->Form->input('salesorderid', array('id' => 'val_salesorderid','class' => 'form-control', 'label' => false, 'placeholder' => '','readonly'=>true, 'value'=>'BSO-13-000990')); ?> </div>
    <label for="val_duedate" class="col-md-2 control-label">Model No </label>
    <div class="col-md-2"> <?php echo $this->Form->input('modelno ', array('id' => 'val_modelno','class' => 'form-control', 'label' => false, 'placeholder' => '','readonly'=>true, 'value'=>'TS 0004-13')); ?> </div>
    <label for="val_attn" class="col-md-2 control-label">Due Date</label>
    <div class="col-md-2"> <?php echo $this->Form->input('due_date', array('id' => 'val_due_date', 'class' => 'form-control input-datepicker-close', 'data-date-format' => 'dd-MM-yy', 'label' => false,'value'=>'12-jul-2013'));?> </div>
  </div>
  <div class="form-group">
    <label for="val_customername" class="col-md-2 control-label">Customer</label>
    <div class="col-md-2">
      <?php
                echo $this->Form->input('customer', array('id' => 'val_customer', 'class' => 'form-control',
             'label' => false,'type'=>'textarea', 'rows'=>'2','readonly'=>true,'value'=>'31 Jurong Port Road
#1m1-17m/18m Jurong Logistic Hub
Singapore 619115'));
            ?>
    </div>
    <label for="val_duedate" class="col-md-2 control-label">Model No </label>
    <div class="col-md-2"> <?php echo $this->Form->input('modelno', array('id' => 'val_modelno','class' => 'form-control', 'label' => false, 'placeholder' => '','readonly'=>true, 'value'=>'TC-950')); ?> </div>
    <label for="val_attn" class="col-md-2 control-label">Range</label>
    <div class="col-md-2">
      <?php
                echo $this->Form->input('range', array('id' => 'val_range', 'class' => 'form-control',
            'placeholder' => 'Enter Remarks', 'label' => false,'type'=>'textarea', 'rows'=>'2','readonly'=>true, 'value'=>'(_)/-'));
            ?>
    </div>
  </div>
  <div class="form-group">
    <label for="val_customername" class="col-md-2 control-label">Instrument</label>
    <div class="col-md-2">
      <?php
                echo $this->Form->input('instrument', array('id' => 'val_instrument', 'class' => 'form-control',
             'label' => false,'type'=>'textarea', 'rows'=>'2','readonly'=>true,'value'=>'THERMOMETER C/W PROBE'));
            ?>
    </div>
    <label for="val_duedate" class="col-md-2 control-label">Temperature </label>
    <div class="col-md-2"> <?php echo $this->Form->input('temperature', array('id' => 'val_temperature', 'class' => 'form-control', 'label' => false, 'type' => 'select', 'empty' => '-- Select Temperature --')); ?> </div>
    <label for="val_attn" class="col-md-2 control-label">Humidity</label>
    <div class="col-md-2"> <?php echo $this->Form->input('humidity', array('id' => 'val_humidity', 'class' => 'form-control', 'label' => false, 'type' => 'select', 'empty' => '-- Select Humidity --')); ?> </div>
  </div>
  <div class="col-lg-12">
    <h4 class="sub-header"><small>The unit under test have been calibrated as per TECHNICAL PROCEDURE,</small></h4>
  </div>
  <div class="form-group">
    <div class="col-md-12">
      <?php
                echo $this->Form->input('customer', array('id' => 'val_customer', 'class' => 'form-control',
             'label' => false,'type'=>'textarea', 'rows'=>'2','value'=>'BS Tech´s organisation and practices have been duly accredited and are compliant to the requirements of ISO/IEC 17025;  the laboratory accreditation standard. Our Quality Management System ensures its compatibility with the requirements of   ISO 9001'));
            ?>
    </div>
  </div>
  <div class="form-group">
    <div class="col-md-12">
      <?php
                echo $this->Form->input('customer', array('id' => 'val_customer', 'class' => 'form-control',
             'label' => false,'type'=>'textarea', 'rows'=>'2','value'=>'The reference measurement standards used are traceable to National Metrology Centre,(NMC,SINGAPORE)  and/or other National standards.'));
            ?>
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
    <div class="col-md-12">
      <label for="val_duedate" class="col-md-6 control-label">Instrument Cal Status </label>
      <div class="col-md-6"> <?php echo $this->Form->input('instrument_cal_status', array('id' => 'val_instrument_cal_status', 'class' => 'form-control', 'label' => false, 'type' => 'select', 'empty' => '-- Select Instrument Cal Status --')); ?> </div>
      </div>
      <div class="col-md-12">
        <label for="val_duedate" class="col-md-6 control-label">Instrument Cal Status Description </label>
        <div class="col-md-6">
          <?php
                echo $this->Form->input('instrument_description', array('id' => 'val_instrument_description', 'class' => 'form-control',
             'label' => false,'type'=>'textarea', 'rows'=>'2','value'=>''));
            ?>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6">
   <div class="form-group">
  <div class="col-md-12">
   
      <label for="val_duedate" class="col-md-6 control-label">Calibration Type</label>
      <div class="col-md-6"> <?php echo $this->Form->input('certificateno', array('id' => 'val_certificateno','class' => 'form-control', 'label' => false, 'placeholder' => '','readonly'=>true, 'value'=>'Non-Singlas')); ?> </div>
      </div>
      <div class="col-md-12">
        <label for="val_duedate" class="col-md-6 control-label">Calibrated Status</label>
      <div class="col-md-6"> <?php echo $this->Form->input('cal_status', array('id' => 'val_cal_status', 'class' => 'form-control', 'label' => false, 'type' => 'select', 'empty' => '-- Select Instrument Cal Status --')); ?> </div>
      </div>
      <div class="col-md-12">
        <label for="val_duedate" class="col-md-6 control-label">Approved Status</label>
      <div class="col-md-6"> <?php echo $this->Form->input('approved_status', array('id' => 'val_approved_status', 'class' => 'form-control', 'label' => false, 'type' => 'select', 'empty' => '-- Approved --')); ?> </div>
      </div>
    </div>
  </div>
</div>
