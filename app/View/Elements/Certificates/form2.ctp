<?php ?>

<div class="c_form1 c_form2">
  <div class="form-group">
    <label for="val_customername" class="col-md-2 control-label">Certificateno</label>
    <div class="col-md-10"> <?php echo $this->Form->input('certificateno', array('id' => 'val_certificateno','class' => 'form-control', 'label' => false, 'placeholder' => '','readonly'=>true, 'value'=>'TS 0004-13')); ?> </div>
  </div>
  <div class="form-group">
    <label for="val_customername" class="col-md-2 control-label">METHOD OF CALIBRATION</label>
    <div class="col-md-10">
      <?php
                echo $this->Form->input('Tempformdata.methodofcal1', array('id' => 'val_method_calibration', 'class' => 'form-control',
            'placeholder' => 'Enter Remarks', 'label' => false,'type'=>'textarea', 'rows'=>'2', 'value'=>$formdata['Tempformdata']['methodofcal1']));
            ?>
      <?php
                echo $this->Form->input('Tempformdata.methodofcal2', array('id' => 'val_method_calibration', 'class' => 'form-control',
            'placeholder' => 'Enter Remarks', 'label' => false,'type'=>'textarea', 'rows'=>'2', 'value'=>$formdata['Tempformdata']['methodofcal2']));
            ?>
    </div>
  </div>
  
  <div class="form-group">
    <label for="val_customername" class="col-md-2 control-label">RESULTS OF CALIBRATION</label>
    <div class="col-md-10">
      <?php
                echo $this->Form->input('Tempformdata.resultofcal1', array('id' => 'val_resultofcal1', 'class' => 'form-control',
            'placeholder' => 'Enter Remarks', 'label' => false,'type'=>'textarea', 'rows'=>'2', 'value'=>$formdata['Tempformdata']['resultofcal1']));
            ?>
      <?php
                echo $this->Form->input('Tempformdata.resultofcal2', array('id' => 'val_resultofcal2', 'class' => 'form-control',
            'placeholder' => 'Enter Remarks', 'label' => false,'type'=>'textarea', 'rows'=>'2', 'value'=>$formdata['Tempformdata']['resultofcal2']));
            ?>
    </div>
  </div>
  
  <div class="form-group">
    <label for="val_customername" class="col-md-2 control-label">REMARKS</label>
    <div class="col-md-10">
      <?php
                echo $this->Form->input('Tempformdata.remark1', array('id' => 'val_remark1', 'class' => 'form-control',
            'placeholder' => 'Enter Remarks', 'label' => false,'type'=>'textarea', 'rows'=>'2', 'value'=>$formdata['Tempformdata']['remark1']));
            ?>
      <?php
                echo $this->Form->input('Tempformdata.remark2', array('id' => 'val_remark2', 'class' => 'form-control',
            'placeholder' => 'Enter Remarks', 'label' => false,'type'=>'textarea', 'rows'=>'2', 'value'=>$formdata['Tempformdata']['remark2']));
            ?>
            
            <?php
                echo $this->Form->input('Tempformdata.remark3', array('id' => 'val_remark3', 'class' => 'form-control',
            'placeholder' => 'Enter Remarks', 'label' => false,'type'=>'textarea', 'rows'=>'2', 'value'=>$formdata['Tempformdata']['remark3']));
            ?>
            
            <?php
                echo $this->Form->input('Tempformdata.remark4', array('id' => 'val_remark4', 'class' => 'form-control',
            'placeholder' => 'Enter Remarks', 'label' => false,'type'=>'textarea', 'rows'=>'2', 'value'=>$formdata['Tempformdata']['remark4']));
            ?>
            
            <?php
                echo $this->Form->input('Tempformdata.remark5', array('id' => 'val_remark5', 'class' => 'form-control',
            'placeholder' => 'Enter Remarks', 'label' => false,'type'=>'textarea', 'rows'=>'2', 'value'=>$formdata['Tempformdata']['remark5']));
            ?>
            
            <?php
                echo $this->Form->input('Tempformdata.remark6', array('id' => 'val_remark6', 'class' => 'form-control',
            'placeholder' => 'Enter Remarks', 'label' => false,'type'=>'textarea', 'rows'=>'2', 'value'=>$formdata['Tempformdata']['remark6']));
            ?>
            
            <?php
                echo $this->Form->input('Tempformdata.remark7', array('id' => 'val_remark7', 'class' => 'form-control',
            'placeholder' => 'Enter Remarks', 'label' => false,'type'=>'textarea', 'rows'=>'2', 'value'=>$formdata['Tempformdata']['remark7']));
            ?>
             <?php
                echo $this->Form->input('Tempformdata.remark8', array('id' => 'val_remark8', 'class' => 'form-control',
            'placeholder' => 'Enter Remarks', 'label' => false,'type'=>'textarea', 'rows'=>'2', 'value'=>$formdata['Tempformdata']['remark8']));
            ?>
             
            
    </div>
  </div>
</div>
