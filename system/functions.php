<?php
	// Functions file. This file has all of the functions used by templates
	// and other stuff around the application.
	
	function getInfo($for) {
		// Queries the database for the value of $for.
	
		$sql = mysql_query("SELECT * from " . APP_TABLEPREFIX . "options WHERE `option` = '$for'") or die("<h1>An incorrect parameter was set for <code>getInfo()</code>.</h1><p>Please check your code for any errors.</p>");
		while($row = mysql_fetch_array($sql)) {
			return $row[1];
		}
	
	}
	
	function load_theme() {
		// Probably the most important function in the entire program. This
		// function loads the current theme.
	
		$currentTheme = getInfo('current_theme');
	
		require APP_FULLPATH . "templates/" . $currentTheme . "/template.php";
			
	}
	
	function pageContent() {
		// Gets the page content from the database.
		
		// If nothing is after index.php, it's the homepage.
		$uri = $_SERVER["PATH_INFO"];
		if(!$uri) {
			$uri = "/home";
		}
		
		// Trim off the starting forward slash
		$uri = substr($uri, 1);
		
		$sql = mysql_query("SELECT * FROM " . APP_TABLEPREFIX . "pages WHERE `slug` = '$uri' LIMIT 1");
		while($row = mysql_fetch_array($sql)) {
			echo $row[3];
		}
	}
?>