<?php
	
	function loadHead($title, $custom = null){
		// This function loads everything up to the main content...
?>
<!DOCTYPE html>
<html lang="en">

	<head>
		
		<title><?php echo $title; ?> &rsaquo; X96 CMS Admin</title>
		
		<meta name="robots" content="index, follow" />
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		
		<link rel="stylesheet" href="includes/style.css" type="text/css" media="screen" />
		
	</head>
	
	<body>

	
		<div class="wrapper">
		
			<div class="header">
			
				<h1>X96 CMS Admin</h1>
				
				<div class="links">
<?php
		if($custom == "login") {
?>
					<a class="current" href="./login.php">Login</a>
					<a href="../">Back to Website</a>
<?php
		}
		else {
?>
					<a class="pages" href="./manage.php/pages">Pages</a>
					<a class="themes" href="./manage.php/theme">Themes</a>
					<a class="settings" href="./manage.php/settings">Settings</a>
					<a class="logout" href="./login.php?logout=true">Log Out</a>
<?php
		}
?>
				</div><!-- end .links -->

				
			</div><!-- end .header -->

<?php
	}
	
	function loadFoot(){
?>
		</div><!-- end .wrapper -->
	</body>

</html>
<?php
	}