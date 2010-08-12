<?php
	// Functions file. This file has all of the functions used by templates
	// and other stuff around the application.
	
	function load_theme() {
		// Probably the most important function in the entire program. This
		// function loads the current theme.
	
		require(APP_BASEDIR . "templates/" . APP_THEME . "/template.php") or die("<h1>Loading the Template Failed.</h1><p>X96 CMS Could not load the template. This could mean that the template file doesn't exist.</p>");
			
	}