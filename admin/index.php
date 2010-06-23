<?php
	$index = true;
	require "../system-functions.php";
	$md5site = md5(siteurl());
	if(!defined("SESSION")){
		session_start();
		define("SESSION", true);
	}
	if((!isset($_SESSION["logged_in_".$md5site])) || !$_SESSION["logged_in_".$md5site][1]){ //No Session?!
		if(!isset($login)){
			header("Location: ../login.php"); //check to see if logged in, otherwise go to the login page
			exit; //stop anything after this command
		}
	} else if (isset($login) || isset($index)){ //Session IS there?
		header("Location: ../panel.php"); //Go to admin panel
		exit; //stop anything after this command
	}
?>
