<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/style-metro.css" rel="stylesheet" />
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/plugins/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/style-responsive.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/plugins/glyphicons/css/glyphicons.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/plugins/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" type="text/css"/>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<div class="page-sidebar nav-collapse collapse">
    <? $this->beginWidget('Menu',array(
        'items'=>array(
            array('label'=>'Home', 'url'=>array('/index'), 'class'=>'icon-dashboard'),
            array('label'=>'Projects', 'url'=>array('/projects'), 'class'=>'icon-bolt'),
            array('label'=>'Users', 'url'=>array('/users'), 'class'=>'icon-underline'),
        )));
    $this->endWidget(); ?>
</div>
<div class="container" id="page">

	<?php echo $content; ?>

</div><!-- page -->

<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!--[if lt IE 9]>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/plugins/excanvas.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/plugins/respond.js"></script>
<![endif]-->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/plugins/breakpoints/breakpoints.js" type="text/javascript"></script>
<!-- IMPORTANT! jquery.slimscroll.min.js depends on jquery-ui-1.10.1.custom.min.js -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/plugins/jquery.blockui.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/plugins/jquery.cookie.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script>
<!-- END CORE <?php echo Yii::app()->request->baseUrl; ?> -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/plugins/bootstrap-daterangepicker/date.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/plugins/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/plugins/fullcalendar/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/scripts/app.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/scripts/index.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
    jQuery(document).ready(function() {
        App.init(); // initlayout and core plugins
        Index.init();
        Index.initCalendar(); // init index page's custom scripts
        Index.initCharts(); // init index page's custom scripts
        Index.initChat();
        Index.initDashboardDaterange();
        Index.initIntro();
    });
</script>
<!-- END JAVASCRIPTS -->

</body>
</html>
