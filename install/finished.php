<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
	<title>Finished Install &mdash; X96 Panel</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="../admin/cosmetics/admin.css" type="text/css"/>
	<style type="text/css">
		table td { margin:1px; border:1px solid #ddd; padding:4px; }
		label { display:block; cursor:pointer; color:#555; }
		label:hover { color:#000; }
	</style>
</head>
<body>
	<div class="topbox">
		<div id="logo">
			<a class="logo" href="http://cms.x96design.com/">X96 Panel</a>
		</div><!-- /logo -->
	</div><!-- /topbox -->
	<div class="wrap">
		<div class="sidebar">
			<div class="menu">
				<a class="projectsite" href="http://cms.x96design.com/"><div class="menu-img">&nbsp;</div>Project Web Site</a>
				<a class="docs" style="cursor:default;"><div class="menu-img">&nbsp;</div>Get Help</a>
				<ul class="submenu">
					<li><a href="http://cms.x96design.com/docs">Documentation</a></li>
					<li><a href="http://cms.x96design.com/help/">Forums</a></li>
				</ul>
			</div><!-- /menu -->
		</div><!-- /sidebar -->
		<div class="content">
			<div class="dashboxcontain">
			<h1 class="title"><?php if(isset($_GET['upgrade'])){ echo 'Upgrade'; } else { echo 'Install'; } ?> Complete!</h1>
				<div class="dashbox">
				<p>Congratulations! You made it! X96 Panel has now been <?php if(isset($_GET['upgrade'])){ echo 'upgraded'; } else { echo 'installed'; } ?> successfully!</p>
				<p>If you need help, don't hesitate to post in <a href="http://cms.x96design.com/help/">our support forums</a>.</p>
				<p style="text-align:center">
					<a class="button" href="../">Visit Your New Site</a>
				&nbsp;
					<a class="button" href="../admin/">Log In to Admin Panel</a>
				</p>
				</div><!-- /dashbox -->
			</div><!-- /dashboxcontain -->
		</div><!-- /content -->
	</div><!-- /wrap -->
</body>
</html>