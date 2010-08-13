<?php

	if(!isset($_SESSION['login'])){
		// Login session variable not set? Then set it to "not logged in".
		$_SESSION['login'] = false;
	}
	
	if($_SESSION['login'] === false) {
		// Not logged in? Redirect to login form
		header("Location: login.php");
	}
	elseif($_SESSION['login'] === true) {
		// Logged in? Great - redirect to index page.
		header("Location: manage.php");
	}