<!DOCTYPE html>
<html lang="en">

	<head>
		<title><?php echo getInfo('sitename'); ?></title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" href="<?php echo APP_BASEDIR . "templates/default/style.css"; ?>" type="text/css" media="screen" />
	</head>
	
	<body>
	
		<div class="wrapper">
		
			<?php
				pageContent();
			?>		
		</div><!-- end .wrapper -->
	
	</body>

</html>