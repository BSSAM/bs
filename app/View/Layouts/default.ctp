<?php
/**
 *
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

//$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo "BS Standard"; ?>
	</title>
	<?php
		echo $this->Html->meta('description', 'A great page');
		echo $this->Html->meta('author', 'Samsys');
		echo $this->Html->meta('robots', 'noindex, nofollow');
		echo $this->Html->meta('viewport', 'width=device-width,initial-scale=1,maximum-scale=1.0');
		echo $this->Html->meta('icon');

		echo $this->Html->css('bootstrap.min');
		echo $this->Html->css('plugins');
		echo $this->Html->css('main');
		echo $this->Html->css('themes');
                echo $this->Html->css('file_upload_css/jquery.fileupload');
		echo $this->Html->css('file_upload_css/jquery.fileupload-ui');
		echo $this->Html->script('jquery.min');
                echo $this->Html->script('functions');
                
                ?>
                <script>!window.jQuery && document.write(unescape('%3Cscript src="js/vendor/jquery-1.11.0.min.js"%3E%3C/script%3E'));</script>
	<?php echo $this->Html->script('vendor/modernizr-2.7.1-respond-1.4.2.min');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
    <?php 
    $sess_username = $this->Session->read('sess_username');
    if(isset($sess_username))
    {
        echo $this->element('header');
    }?>
    <?php echo $this->fetch('content');?>
    <?php echo $this->Html->script('vendor/bootstrap.min'); ?>
    <?php echo $this->Html->script('plugins'); ?>
    <?php echo $this->Html->script('app'); ?>
    <?php echo $this->Html->script('pages/tablesDatatables'); ?>
    <script>$(function(){ TablesDatatables.init(); });</script>
    <script>$(function(){ WidgetsStats.init(); });</script>
    <?php echo $this->Html->script('pages/login'); ?>
    <script>$(function(){ Login.init(); });</script>
    <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <?php echo $this->Html->script('helpers/gmaps.min'); ?>
    <?php echo $this->Html->script('pages/index'); ?>
    <script>$(function(){ Index.init(); });</script>
</body>
</html>
  