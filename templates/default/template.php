<!DOCTYPE html>
<html lang="en">

	<head>
		<title><?php echo getInfo('sitename'); ?></title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" href="<?php echo APP_BASEDIR . "templates/default/style.css"; ?>" type="text/css" media="screen" />
	</head>
	
	<body>
		<div class="header">
			<div class="container">
				<h1><?php echo getInfo('sitename'); ?></h1>
				<div class="nav">
					<ul>
						<?php listpages('10'); ?>
					</ul>
				</div><!-- end .nav -->
			</div><!-- end .container -->
		</div><!-- end .header -->
		<div class="wrapper">
			<h2 class="pagetitle"><span><?php content("title"); ?></span></h2>
			<div class="content">
<?php content("body"); ?>
			</div><!-- end .content -->
		</div><!-- end .wrapper -->
	
	</body>

</html>