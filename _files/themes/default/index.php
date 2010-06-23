<?php gotohome(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
	<head>
		<title><?php the_title(); ?> &raquo; <?php sitename(); ?></title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" href="<?php stylesheet(); ?>" type="text/css" />
<?php x96_head(); ?>
	</head>
	<body>
		<div id="wrap">
			<div id="header">
				<h1 id="logo"><?php sitename(); ?></h1>
				<ul id="menu">
<?php menu(); ?>
				</ul>
			</div><!-- /header -->
			<div id="contentwrapper">
				<?php the_content(); ?>
			</div><!-- /contentwrapper -->
			<div id="footer">
<?php the_footer(); ?>
<?php admin_link(); ?>
			</div><!-- /footer -->
		</div><!-- /wrap -->
<?php google_analytics(); ?>
	</body>
</html>
