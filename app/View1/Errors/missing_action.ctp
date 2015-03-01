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
                echo $this->Html->meta('icon'); echo $this->Html->css('bootstrap.min');
		echo $this->Html->css('plugins');
		echo $this->Html->css('main');
		echo $this->Html->css('themes');
		 echo $this->Html->script('jquery.min'); ?>

 <script>!window.jQuery && document.write(unescape('%3Cscript src="js/vendor/jquery-1.11.0.min.js"%3E%3C/script%3E'));</script>
		<?php echo $this->Html->script('vendor/modernizr-2.7.1-respond-1.4.2.min');?>
		
    </head>
    <body>
        <!-- Error Container -->
        <div id="error-container">
            <div class="error-options">
                <h3><i class="fa fa-chevron-circle-left text-muted"></i> <?php echo $this->Html->link('Go Back',array('controller'=>'Dashboards','action'=>'index'),array('tile'=>'Go Back','class'=>'text-four')); ?></h3>
            </div>
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 text-center">
                    <h1 class="animation-pulse"><i class="fa fa-exclamation-circle text-warning"></i> 404</h1>
                    <h2 class="h3">Oops, we are sorry but the page you are looking for was not found..<br>But do not worry, we will have a look into it..</h2>
                </div>
                <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                    <form action="" method="post">
                        <input type="text" id="search-term" name="search-term" class="form-control input-lg" placeholder="Search ProUI..">
                    </form>
                </div>
            </div>
        </div>
        <!-- END Error Container -->
    </body>
</html>