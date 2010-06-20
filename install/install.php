<?php
	if(isset($_GET['upgrade'])){
		require "../config.php";
		mysql_query("INSERT INTO ".tableprefix()."system VALUES('editor', '1')");
		echo "<script>window.location=\"finished.php?upgrade\";</script>";
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">

<head>
	<title>Install &mdash; X96 Panel</title>
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
</div>
</div>
	<div class="content">
		<div class="dashboxcontain">
			<h1 class="title">Install X96 Panel</h1>
			<div class="dashbox">
<?php
	if(file_exists('../config.php') || file_exists('../user.php')){
?>
				<h1>X96 Panel is already installed!</h1>
				<p>The site configuration file already exists! The install cannot happen until you remove the <tt>user.php</tt> and <tt>config.php</tt> files.</p>
				<p><strong style="display:block; text-align:center;">Are you trying to <a href="?upgrade">upgrade X96 Panel</a> instead?</strong></p>
			</div><!-- /dashbox -->
		</div><!-- /dashboxcontain -->
<?php
	}
	else {
?>
	<h1>Please fill in *ALL* the fields below.</h1>
	<form action="do.php" method="post" id="form">
	<table cellpadding="2" cellspacing="3" border="0" width="100%">
	<tbody>
	<tr>
		<td width="55%"><label for="user">MySQL User<br/><small>Your MySQL username that you use to connect to the database</small></label></td>
		<td width="45%"><input type="text" name="user" id="user" /></td>
	</tr>
	
	<tr>
		<td><label for="pass">MySQL Password<br/><small>The password for your MySQL user.</small></label></td>
		<td><input type="text" name="pass" id="pass" /></td>
	</tr>
	
	<tr>
		<td><label for="dbname">MySQL Database Name<br/><small>The name of the database you want to install X96 Panel into.</small></label></td>
		<td><input type="text" name="dbname" id="dbname" /></td>
	</tr>
	
	<tr>
		<td><label for="server">MySQL Server<br/><small>Most likely Correct, leave as-is if unsure</small></label></td>
		<td><input type="text" name="server" id="server" value="localhost" /></td>
	</tr>
	
	<tr>
		<td><label for="prefix">Table Prefix <br/><small>For multiple installations in a single database</small></label></td>
		<td><input type="text" name="prefix" id="prefix" value="site_" /></td>
	</tr>
	
	<tr>
		<td><label for="url">Site URL <br/><small>No slash "/" at the end!</small></label></td>
		<td>http://<?php echo $_SERVER['SERVER_NAME']; ?>/<input type="text" name="url" value="" id="url" /></td>
	</tr>
	
	<tr>
		<td><label for="loginuser">Create a username<br/><small>This is the username you will use to log into your site</small></label></td>
		<td><input type="text" name="loginuser" id="loginuser" /></td>
	</tr>
	
	<tr>
		<td><label for="loginpass">Create a Password<br/><small>This is the password you will use to log into your site</small></label></td>
		<td><input type="text" name="loginpass" id="loginpass" /></td>
	</tr>
	
	<tr>
		<td><label for="sitename">Site Name<br/><small>What is your site going to be called?</small></label></td>
		<td><input type="text" name="sitename" id="sitename" value="My Site" /></td>
	</tr>
	
	<tr>
		<td><strong>Make sure to double check that the settings are correct before proceeding!</strong></td>
		<td><input type="submit" value="Finish Install &raquo;" name="submit" class="button" /></td>
	</tr>
	
	</tbody>
	</table>
	</form>
	
	</div><!-- /dashbox -->
	</div><!-- /dashboxcontain -->
	
	<?php
		}
	?>
	
	</div><!-- /content -->
</div><!-- /wrap -->
</body>
</html>
