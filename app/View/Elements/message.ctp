<?php 
	$msg=$this->Session->flash();
	if($msg!=''):
?>
	<div class="alert_box <?php  if(strpos($msg,"Error")!=false) { echo 'failure_alert'; } else { echo 'success_alert'; } ?> margin_b_20 align_center group ft_merriweatherSans ft_siz_16">
		<?php echo $msg; ?>
		<a href="javascript:void(0)" class="close_btn float_right" title="">
			<?php echo $this->Html->image('front/field_cross.png',array('width'=>'14','height'=>'15','title'=>'close')); ?>
        </a>
	</div>
<?php
	endif;
?>
