<html lang="en"><!--<![endif]--><!-- BEGIN HEAD --><head>
    <meta charset="utf-8">
    <title>Scorepredictor Admin Login</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="description">
    <meta content="" name="author">
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/plugins/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/style-metro.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" rel="stylesheet" type="text/css">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/style-responsive.css" rel="stylesheet" type="text/css">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css">
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/pages/login.css" rel="stylesheet" type="text/css">
    <!-- END PAGE LEVEL STYLES -->
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login breakpoint-1280">
<!-- BEGIN LOGO -->
<div class="logo">

</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
    <!-- BEGIN LOGIN FORM -->
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'login-form',
        'enableClientValidation'=>true,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
        ),
    )); ?>
        <h3 class="form-title">Login to your account</h3>
        <?php if(!empty($errors)) : ?>
            <?php foreach($errors as $err) : ?>
                <div class="alert alert-error">
                    <button class="close" data-dismiss="alert"></button>
                    <span><?=$err;?></span>
                </div>
            <?php endforeach; ?>
        <?php endif;?>
        <div class="control-group">
            <label class="control-label visible-ie8 visible-ie9" >Email</label>
            <div class="controls" style="height: 30px;">
                <div class="input-icon left">
                    <i class="icon-user"></i>
                    <?php echo $form->textField($model,'email', array('style'=>'height: 30px;', 'class'=>'m-wrap placeholder-no-fix')); ?>
                </div>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label visible-ie8 visible-ie9" >Password</label>
            <div class="controls" style="height: 30px;">
                <div class="input-icon left">
                    <i class="icon-lock"></i>
                    <?php echo $form->passwordField($model,'password', array('style'=>'height: 30px;', 'class'=>'m-wrap placeholder-no-fix')); ?>
                </div>
            </div>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn green pull-right">
                Login <i class="m-icon-swapright m-icon-white"></i>
            </button>
        </div>
    <?php $this->endWidget(); ?>
    <!-- END LOGIN FORM -->
</div>
<!-- END LOGIN -->
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
<script src="<?php echo Yii::app()->request->baseUrl; ?>/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/plugins/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/scripts/app.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/scripts/login.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
    jQuery(document).ready(function() {
        App.init();
        Login.init();
    });
</script>
<!-- END JAVASCRIPTS -->

<!-- END BODY -->
</body></html>

