<?php
if(!defined("SESSION")){ //No session?
	session_start(); //Start one.
	define("SESSION", true);
}
require "system-functions.php";
if(isset($_GET["log_out"])){
	unset($_SESSION["logged_in_".$md5site]);
	header('Location: login.php?msg=logout');
	exit;
}

$login = true;
require "protect.php";
require "user.php";

$logins[0]["user"] = $user;
$logins[0]["pass"] = $pass;
$logins[0]["redirect"] = "panel.php";

if(isset($_POST['submit'])){ //is the form submitted?
	if(empty($_POST['user']) || empty($_POST['pass'])){
		echo '<script type="text/javascript">window.location="?msg=noinput";</script>'; 
		exit;
	} //check for empty user name or password
	$is_logged = false;
	foreach($logins as $login){
		$user = $_POST;
		if(($user["user"] == $login["user"]) && (md5($user["pass"]) == $login["pass"])) {
			$is_logged = true;
			$_SESSION["logged_in_".$md5site] = array($login["redirect"], true);
			header("Location: ".$login["redirect"]);
		exit;
		}
	}
	if(!$is_logged){ echo '<script type="text/javascript">window.location="?msg=nomatch";</script>'; } //if none of the $logins arrays matched the input, give an error
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<title>X96 Panel &ndash; Log In</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="admin/cosmetics/admin.css" type="text/css" media="screen" />
<style type="text/css">.msg { width:500px; margin:8px auto;	}</style>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#autofocus').focus();
	});
</script>
</head>
<body>
	<div class="topbox">
		<div id="logo">
			 <a href="http://cms.x96design.com/" target="_blank">X96 Panel</a>
		</div><!-- /logo -->
		<a class="button" href="<?php echo siteurl(); ?>/"><img src="admin/cosmetics/icons/home.png" alt="View Site Icon" style="float:left; padding:5px 5px 0 0; margin-left:-12px" />Visit Site</a>
	</div><!-- /topbox -->
<?php
if(isset($_GET['msg'])){
echo '
<div class="msg">';
if($_GET['msg'] == "logout"){
	echo '<img style="border:none; margin:0 5px -3px 0; display:inline;" src="admin/cosmetics/icons/happy.png" alt="Smile Icon" /><strong>You have been logged out Successfully.</strong>';
}
elseif($_GET['msg'] == "noinput"){
	echo '<img style="border:none; margin:0 5px -3px 0; display:inline;" src="admin/cosmetics/icons/error.png" alt="Error Icon" /><strong>You Must Fill In a Username/Password.</strong>';
}
elseif($_GET['msg'] == "nomatch"){
	echo '<img style="border:none; margin:0 5px -3px 0; display:inline;" src="admin/cosmetics/icons/error.png" alt="Error Icon" /><strong>The Username/Password Did Not Match! Please Try Again.</strong>';
}
echo '</div>';
}

?>
<div class="login allround">
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<small>Username:</small><br/>
		<input type="text" id="autofocus" name="user" size="20" /><br/>
		<small>Password:</small><br/>
		<input type="password" name="pass" size="20" /><br />
		<div style="text-align:center; margin:3px 0"><a href="<?php echo siteurl(); ?>/" class="button">Cancel</a>&nbsp; <input type="submit" class="button" name="submit" value="Log In" /></div>
	</form>
</div><!-- /login -->

</body>
</html>
