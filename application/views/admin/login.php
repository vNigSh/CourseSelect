<!DOCTYPE html>
<html lang="ch">
<head>
	<meta charset="utf-8">
	<title>选课系统</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- The styles -->
	<link href="<?php echo base_url('static/css/bootstrap-cerulean.css'); ?>" rel="stylesheet">
	<style type="text/css">
	  body {
		padding-bottom: 40px;
	  }
	  .sidebar-nav {
		padding: 9px 0;
	  }
	</style>
	<link href="<?php echo base_url('static/css/bootstrap-responsive.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('static/css/charisma-app.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('static/css/jquery-ui-1.8.21.custom.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('static/css/fullcalendar.css'); ?>" rel='stylesheet'>
	<link href="<?php echo base_url('static/css/fullcalendar.print.css'); ?>" rel='stylesheet'  media='print'>
	<link href="<?php echo base_url('static/css/chosen.css'); ?>" rel='stylesheet'>
	<link href="<?php echo base_url('static/css/uniform.default.css'); ?>" rel='stylesheet'>
	<link href="<?php echo base_url('static/css/colorbox.css'); ?>" rel='stylesheet'>
	<link href="<?php echo base_url('static/css/jquery.cleditor.css'); ?>" rel='stylesheet'>
	<link href="<?php echo base_url('static/css/jquery.noty.css'); ?>" rel='stylesheet'>
	<link href="<?php echo base_url('static/css/noty_theme_default.css'); ?>" rel='stylesheet'>
	<link href="<?php echo base_url('static/css/elfinder.min.css'); ?>" rel='stylesheet'>
	<link href="<?php echo base_url('static/css/elfinder.theme.css'); ?>" rel='stylesheet'>
	<link href="<?php echo base_url('static/css/jquery.iphone.toggle.css'); ?>" rel='stylesheet'>
	<link href="<?php echo base_url('static/css/opa-icons.css'); ?>" rel='stylesheet'>
	<link href="<?php echo base_url('static/css/uploadify.css'); ?>" rel='stylesheet'>

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- The fav icon -->
	<link rel="shortcut icon" href="<?php echo base_url('static/img/favicon.ico'); ?>">
		
</head>

<body>
		<div class="container-fluid">
		<div class="row-fluid">
		
			<div class="row-fluid">
				<div class="span12 center login-header">
					<h2>选课系统</h2>
				</div><!--/span-->
			</div><!--/row-->
			
			<div class="row-fluid">
				<div class="well span5 center login-box">
					<div class="alert alert-info">
						请输入用户账号和密码
					</div>
					<form class="form-horizontal" action="index.html" method="post">
						<fieldset>
							<div class="input-prepend" title="Username" data-rel="tooltip">
								<span class="add-on"><i class="icon-user"></i></span><input autofocus class="input-large span10" name="username" id="username" type="text" value="admin" />
							</div>
							<div class="clearfix"></div>

							<div class="input-prepend" title="Password" data-rel="tooltip">
								<span class="add-on"><i class="icon-lock"></i></span><input class="input-large span10" name="password" id="password" type="password" value="admin123456" />
							</div>
							<div class="clearfix"></div>
<style>
.Myradio{display:inline;}
.Myradio label{display:inline;}
</style>
							
							
							
							<div class="Myradio">
							  <label>
								<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">
								教师
							  </label>
							</div>
							<div class="Myradio">
							  <label>
								<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2" checked>
								学生
							  </label>
							</div>
							<div class="Myradio">
							  <label>
								<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
								管理员
							  </label>
							  
							  
							  
							</div>
							<p class="center span5">
							<button type="submit" class="btn btn-primary">登录</button>
							</p>
						</fieldset>
					</form>
				</div><!--/span-->
			</div><!--/row-->
				</div><!--/fluid-row-->
		
	</div><!--/.fluid-container-->


