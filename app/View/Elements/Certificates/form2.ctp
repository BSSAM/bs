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
                echo $this->Form->input('method_calibration', array('id' => 'val_method_calibration', 'class' => 'form-control',
            'placeholder' => 'Enter Remarks', 'label' => false,'type'=>'textarea', 'rows'=>'2', 'value'=>'The calibration certificate was produced in accordance to the instrument was calibrated for the points specified in the   relevant in-House Technical Procedure,BST 01-H,as defined for the instrument.'));
            ?>
      <?php
                echo $this->Form->input('method_calibration', array('id' => 'val_method_calibration', 'class' => 'form-control',
            'placeholder' => 'Enter Remarks', 'label' => false,'type'=>'textarea', 'rows'=>'2', 'value'=>'The described instrument has been calibrated at BS Laboratory under the ambient conditions stated in the first page.'));
            ?>
    </div>
  </div>
  
  <div class="form-group">
    <label for="val_customername" class="col-md-2 control-label">RESULTS OF CALIBRATION</label>
    <div class="col-md-10">
      <?php
                echo $this->Form->input('result_calibration', array('id' => 'val_result_calibration', 'class' => 'form-control',
            'placeholder' => 'Enter Remarks', 'label' => false,'type'=>'textarea', 'rows'=>'2', 'value'=>'The expanded uncertainty of measurement associated with the calibration is estimated at a confidence  level of approximately 95% with a coverage factor of k=2.'));
            ?>
      <?php
                echo $this->Form->input('result_calibration', array('id' => 'val_result_calibration', 'class' => 'form-control',
            'placeholder' => 'Enter Remarks', 'label' => false,'type'=>'textarea', 'rows'=>'2', 'value'=>'The results reported herein have been performed in accordance with the laboratory´s terms of accreditation under the Singapore Accreditation Council-Singapore Laboratory Accreditation Scheme.'));
            ?>
    </div>
  </div>
  
  <div class="form-group">
    <label for="val_customername" class="col-md-2 control-label">REMARKS</label>
    <div class="col-md-10">
      <?php
                echo $this->Form->input('remarks', array('id' => 'val_remarks', 'class' => 'form-control',
            'placeholder' => 'Enter Remarks', 'label' => false,'type'=>'textarea', 'rows'=>'2', 'value'=>'The results of the calibration are given on the attached following pages.'));
            ?>
      <?php
                echo $this->Form->input('remarks', array('id' => 'val_remarks', 'class' => 'form-control',
            'placeholder' => 'Enter Remarks', 'label' => false,'type'=>'textarea', 'rows'=>'2', 'value'=>'The results and their associated uncertainities are applicable at the time of calibration.'));
            ?>
            
            <?php
                echo $this->Form->input('remarks', array('id' => 'val_remarks', 'class' => 'form-control',
            'placeholder' => 'Enter Remarks', 'label' => false,'type'=>'textarea', 'rows'=>'2', 'value'=>'No adjusment was done unless otherwise stated.'));
            ?>
            
            <?php
                echo $this->Form->input('remarks', array('id' => 'val_remarks', 'class' => 'form-control',
            'placeholder' => 'Enter Remarks', 'label' => false,'type'=>'textarea', 'rows'=>'2', 'value'=>'The results and their associated uncertainities are applicable at the time of calibration.'));
            ?>
            
            <?php
                echo $this->Form->input('remarks', array('id' => 'val_remarks', 'class' => 'form-control',
            'placeholder' => 'Enter Remarks', 'label' => false,'type'=>'textarea', 'rows'=>'2', 'value'=>'The reports shall not be reproduced except in full, unless the management representative of BS TECH PTE LTD has given approval in writing and comply with the requirements specified in ISO/IEC 17025.'));
            ?>
            
            <?php
                echo $this->Form->input('remarks', array('id' => 'val_remarks', 'class' => 'form-control',
            'placeholder' => 'Enter Remarks', 'label' => false,'type'=>'textarea', 'rows'=>'2', 'value'=>'The user should determine the suitability of the instrument for its intended use.'));
            ?>
            
            <?php
                echo $this->Form->input('remarks', array('id' => 'val_remarks', 'class' => 'form-control',
            'placeholder' => 'Enter Remarks', 'label' => false,'type'=>'textarea', 'rows'=>'2', 'value'=>''));
            ?>
             <?php
                echo $this->Form->input('remarks', array('id' => 'val_remarks', 'class' => 'form-control',
            'placeholder' => 'Enter Remarks', 'label' => false,'type'=>'textarea', 'rows'=>'2', 'value'=>''));
            ?>
             <?php
                echo $this->Form->input('remarks', array('id' => 'val_remarks', 'class' => 'form-control',
            'placeholder' => 'Enter Remarks', 'label' => false,'type'=>'textarea', 'rows'=>'2', 'value'=>''));
            ?>
            
    </div>
  </div>
</div>
