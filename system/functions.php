<?php
	// Functions file. This file has all of the functions used by templates
	// and other stuff around the application.

	// If nothing is after index.php, it's the homepage.
	$uri = $_SERVER["PATH_INFO"];
	if(!$uri) {
		$uri = "/home";
	}
	// Trim off the starting forward slash
	$uri = substr($uri, 1);
	
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
	
	function content($type) {
		global $uri;
		// Gets the content from the database.
				
		$sql = mysql_query("SELECT * FROM " . APP_TABLEPREFIX . "pages WHERE `slug` = '$uri' LIMIT 1");

		if($type == "body") {
			// If it's the body content we want...	
			while($row = mysql_fetch_array($sql)) {
				echo $row[3];
			}
		}
		
		elseif($type == "title") {
			// If we want the title..
			
			while($row = mysql_fetch_array($sql)) {
				echo $row[1];
			}
		}
		else {
			echo "The <code>content()</code> function doesn't have a correct value.";
		}
		
	}
	function listpages($limit) {
		// List all the pages in the database.
		// Good for menus...
		
		global $uri;
		
		$sql = mysql_query("SELECT * FROM " . APP_TABLEPREFIX . "pages LIMIT " . $limit) or die("<h1>Could not List Pages</h1><p>Something went wrong… Are you you entered ONLY a number in the function (like <code>listpages('5')</code>)?</p>");
		while($row = mysql_fetch_array($sql)) {
?>
	<li class="menu-item pageid<?php echo $row[0]; ?> <?php echo $row[2]; ?>"><a href="<?php echo APP_BASEDIR; ?><?php echo APP_INDEX; ?>/<?php echo $row[2]; ?>"><?php echo $row[1]; ?></a></li>
<?php
		}
	}
?>