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
?>