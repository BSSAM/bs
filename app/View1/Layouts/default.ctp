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
<!DOCTYPE html ng-app>
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo "Best Standard Enterprise"; ?>
	</title>
	<?php
		echo $this->Html->meta('description', 'Best Standard Enterprise');
		echo $this->Html->meta('author', 'Samsys');
		echo $this->Html->meta('robots', 'noindex, nofollow');
		echo $this->Html->meta('viewport', 'width=device-width,initial-scale=1,maximum-scale=1.0');
		echo $this->Html->meta('icon');

		echo $this->Html->css('bootstrap.min');
		echo $this->Html->css('plugins');
		echo $this->Html->css('main');
             
                ?>
                <script>
                    /* add a class of 'loading' to the HTML, then remove it once the page has finished loading */
                    (function(c){
                        c('scripted loading')
                        window.onload = function(){setTimeout(function(){
                                c(c().replace('scripted loading',''))
                            },30)}
                    }(function(c){
                        var h = document.lastChild
                        return c ? h.className = c : h.className
                    }))
                </script>
                <?php
		echo $this->Html->css('themes');
                echo $this->Html->css('custom');
                echo $this->Html->css('file_upload_css/jquery.fileupload');
		echo $this->Html->css('file_upload_css/jquery.fileupload-ui');
		echo $this->Html->script('pages/uiProgress');
                echo $this->Html->script(array('jquery.min'));
                echo $this->Html->script('jedit/jquery.jeditable');
                echo $this->Html->script(array('sal_desc_func','functions','labprocess_js','onsite_schedule',
                    'delivery_order','pur_function_js','quo_function_js','cus_function','candds_function',
                    'invoice_function_js','subcontract_function_js','cus_tag_function_js','clientpos_function_js','customer_contactperson_js','Purchaseorder_requititon'));
                echo $this->Html->script('angular/angular.min');
                ?>
                <script>!window.jQuery && document.write(unescape('%3Cscript src="js/vendor/jquery-1.11.0.min.js"%3E%3C/script%3E'));</script>
                <?php 
                echo $this->Html->script(array('vendor/modernizr-2.7.1-respond-1.4.2.min','vendor/ajaxform'));
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
   <?php //echo $this->Html->script('pages/widgetsStats'); ?>
<!--    <script>$(function(){ WidgetsStats.init(); });</script>-->
    <?php echo $this->Html->script('pages/tablesDatatables'); ?>
    <script>$(function(){ TablesDatatables.init(); });</script>
    <script>$(function(){ UiProgress.init(); });</script>
    <?php echo $this->Html->script('pages/login'); ?>
    <script>$(function(){ Login.init(); });</script>
    
<!--    <script src="http://maps.google.com/maps/api/js?sensor=true"></script>-->
    <?php //echo $this->Html->script('helpers/gmaps.min'); ?>
    <?php echo $this->Html->script('pages/index'); ?>
    <script>$(function(){ Index.init(); });</script>
    
    <script>
    function ni_start(){
       NProgress.start();
   }
   function ni_end(){
       NProgress.done(); 
   }
    </script>
</body>
</html>
  
