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
	<style>
		.my_pagination{float:right;height:35px;line-height:35px;}
		.aaaaaa{text-align:center;}
		.bbb,.ccc{width:30px;height:35px;border:1px solid #ddd;}
		.ddd{width:30px;height:35px;background:#f5f5f5;border:1px solid #ddd;}
		.aaaaaa div{float:left;text-align:center;display:inline-block;}
		.fff{width:50px;height:35px;border:1px solid #ddd;}
		.aaaaaa a{display:block;width:30px;height:35px;}
		.fff a{width:50px;}
	</style>	
</head>

<body>
		<!-- topbar starts -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="<?php echo site_url('admin/main/index'); ?>"> <img alt="Charisma Logo" src="<?php echo base_url('static/img/logo20.png'); ?>" /> <span>学生选课系统</span></a>
				
				<!-- theme selector starts -->
				<!--
				<div class="btn-group pull-right theme-container" >
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="icon-tint"></i><span class="hidden-phone"> 修改网站主题</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu" id="themes">
						<li><a data-value="classic" href="#"><i class="icon-blank"></i> Classic</a></li>
						<li><a data-value="cerulean" href="#"><i class="icon-blank"></i> Cerulean</a></li>
						<li><a data-value="cyborg" href="#"><i class="icon-blank"></i> Cyborg</a></li>
						<li><a data-value="redy" href="#"><i class="icon-blank"></i> Redy</a></li>
						<li><a data-value="journal" href="#"><i class="icon-blank"></i> Journal</a></li>
						<li><a data-value="simplex" href="#"><i class="icon-blank"></i> Simplex</a></li>
						<li><a data-value="slate" href="#"><i class="icon-blank"></i> Slate</a></li>
						<li><a data-value="spacelab" href="#"><i class="icon-blank"></i> Spacelab</a></li>
						<li><a data-value="united" href="#"><i class="icon-blank"></i> United</a></li>
					</ul>
				</div>
				-->
				<!-- theme selector ends -->
				
				<!-- user dropdown starts -->
				<div class="btn-group pull-right" >
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="icon-user"></i><span class="hidden-phone"><?php echo $username; ?></span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo site_url('admin/main/change_password'); ?>">修改密码</a></li>
						<li class="divider"></li>
						<li><a href="<?php echo site_url('user/logout/'.$identity); ?>">注销</a></li>
					</ul>
				</div>
				<!-- user dropdown ends -->
			</div>
		</div>
	</div>
	<!-- topbar ends -->
		<div class="container-fluid">
		<div class="row-fluid">
				
			<!-- left menu starts -->
			<div class="span2 main-menu-span">
				<div class="well nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li class="nav-header hidden-tablet">资讯管理</li>
						<li><a class="ajax-link" href="<?php echo site_url('admin/main/index'); ?>"><i class="icon-home"></i><span class="hidden-tablet">资讯管理</span></a></li>
						<li class="nav-header hidden-tablet">选课管理</li>
						<li><a class="ajax-link" href="<?php echo site_url('admin/main/subject'); ?>"><i class="icon-th-list"></i><span class="hidden-tablet">专业课程管理</span></a></li>
						<li><a class="ajax-link" href="<?php echo site_url('admin/main/class_manage'); ?>"><i class="icon-th-list"></i><span class="hidden-tablet">班级管理</span></a></li>
						<li class="nav-header hidden-tablet">账户管理</li>
						<li><a class="ajax-link" href="<?php echo site_url('admin/main/student_manage'); ?>"><i class=" icon-th"></i><span class="hidden-tablet">学生账户管理</span></a></li>
						<li><a class="ajax-link" href="<?php echo site_url('admin/main/teacher_manage'); ?>"><i class=" icon-th"></i><span class="hidden-tablet">教师账户管理</span></a></li>
						<li><a class="ajax-link" href="<?php echo site_url('admin/main/admin_manage'); ?>"><i class="icon-th"></i><span class="hidden-tablet">管理员账户管理</span></a></li>
						<li class="nav-header hidden-tablet">课室管理</li>
						<li><a class="ajax-link" href="<?php echo site_url('admin/main/classroom_manage'); ?>"><i class="icon-align-justify"></i><span class="hidden-tablet">课室管理</span></a></li>
						<li class="nav-header hidden-tablet">专业管理</li>
						<li><a class="ajax-link" href="<?php echo site_url('admin/main/subject_manage'); ?>"><i class="icon-align-justify"></i><span class="hidden-tablet">专业管理</span></a></li>
						
						<li class="nav-header hidden-tablet">资料修改</li>
						<li><a class="ajax-link" href="<?php echo site_url('admin/main/change_password'); ?>"><i class="icon-user"></i><span class="hidden-tablet">修改密码</span></a></li>
						
					</ul>
				</div><!--/.well -->
			</div><!--/span-->
			<!-- left menu ends -->
			
			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>