<?php
	$serverservername = $_SERVER["SERVER_NAME"]; //Server address

	$fooarray = array(":", "!", "?", "<", ">", "(", ")", "%", "$", "#", "@", "*", "&", "^", "{", "}", "[", "]", "/", "\\", "'", "\"", "+", ".", ",", ";","-");
	$getname = $_POST['prefix']; //DB prefix
	$returnprefix = str_replace($fooarray, "_", $getname); //Filtered Prefix (filtered thrugh $fooarray
	
	$posturl = $_POST['url']; //site URL
	
	$host = $_POST['server']; //MySQL Server
	$user = $_POST['user']; //DB User
	$pass = $_POST['pass']; //DB Pass
	$dbname = $_POST['dbname']; //DB Name
	
	$sitename = $_POST['sitename']; //Site Name
	$prefix = $returnprefix; //Filtered Prefix
	
	// START WRITING CONFIG FILES
	
	$ourFileName = "../config.php"; //CONFIG.php
	$ourFileHandle = fopen($ourFileName, 'w') or die("Main Configuration Failed!"); //Attempt to write to directory (create file)
	$stringData = "<?php\nmysql_connect(\"".$_POST['server']."\", \"".$_POST['user']."\", \"".$_POST['pass']."\");\nmysql_select_db(\"".$_POST['dbname']."\");\nfunction tableprefix(){ return \"".$prefix."\"; } \n ?>"; //Get DB connection info
	fwrite($ourFileHandle, $stringData); //Write the config info into the file
	fclose($ourFileHandle); //Close the file
	
	$ourFileName = "../user.php"; //USER.php
	$ourFileHandle = fopen($ourFileName, 'w') or die("User Configuration Failed!"); //Attempt to write
	$post = $_POST['loginpass'];
	$stringData = "<?php\n\t\$user = \"".$_POST['loginuser']."\";\n\t\$pass = \"".md5($post)."\";\n ?>"; //get user info
	fwrite($ourFileHandle, $stringData); //write it
fclose($ourFileHandle); //close
	$ourFileName = "../.htaccess"; //Creating server config (rewrite)
	$ourFileHandle = fopen($ourFileName, 'w') or die("<tt>.htaccess</tt> could not be created in the parent directory!"); //attempt to write
	$stringData = "\n## Start X96 Panel ##\nRewriteEngine on\nRewriteCond %{REQUEST_URI} !(\.[^./]+)$\nRewriteCond %{REQUEST_fileNAME} !-d\nRewriteCond %{REQUEST_fileNAME} !-f\nRewriteRule (.*) /$posturl/?page=$1 [L]\nRewriteCond %{THE_REQUEST} ^[A-Z]{3,9}\ /$posturl/([^?]+\?)+page=\ HTTP\nRewriteRule ^(.+)\?page=$ /$posturl/$1 [R=301,L]\n## End X96 Panel ##"; //.htaccess data
	fwrite($ourFileHandle, $stringData);//write
	fclose($ourFileHandle); //close
	chmod("../config.php", 0666); //change permissions of file
	chmod("../user.php", 0666); // same here
	mysql_connect($host, $user, $pass); //connect to DB
	mysql_select_db($dbname); //Select DB
	
	// START SETUP OF DATABASE

	mysql_query("CREATE TABLE IF NOT EXISTS `".$prefix."pages` (`title` mediumtext NOT NULL, `content` text NOT NULL, `last_mod` timestamp NOT NULL default CURRENT_TIMESTAMP, `slug` mediumtext NOT NULL, `order` tinytext NOT NULL)");
	mysql_query("INSERT INTO `".$prefix."pages` (`title`, `content`, `last_mod`, `slug` , `order`) VALUES
('Home', '<p><strong>You have now successfully installed X96 Panel!</strong></p><h3>Edit this Content</h3><p><strong>Jump right into it</strong> and start editing this page and adding new ones. To get started, <a href=\"admin/\">Log in</a>!</p><h3>Get up to Speed</h3><p><strong>Read the documentation</strong> to get yourself familiar with X96 Panel. <a href=\"http://cms.x96design.com/docs\">Read the Docs &raquo;</a></p><h3>Need Help?</h3><p><strong>Need some help </strong>with X96 Panel? Post in <a href=\"http://cms.x96design.com/help/\">the support forums</a> to get an answer to your question.</p><p>&nbsp;</p>', CURRENT_TIMESTAMP, 'home', '1')");
	mysql_query("CREATE TABLE IF NOT EXISTS `".$prefix."system` (`function` mediumtext NOT NULL, `value` text NOT NULL)");
	mysql_query("INSERT INTO `".$prefix."system` (`function`, `value`) VALUES('title', '$sitename'),('desc', 'Describe Your Site Here. This will show up in Search results under your site name.'),('footer', '<p>(C) 2010. All Rights Reserved.</p>'),('theme', 'default'),('url', '/".$posturl."'),('editor', '1');");
	mysql_query("INSERT INTO ".$prefix."system VALUES('analytics', '0')");
	mysql_query("INSERT INTO ".$prefix."system VALUES('analytics_code', 'UA-000000-0')");
	
	// Did it work? Redirect to "finished" page.
	
 	echo '<script type="text/javascript">window.location="finished.php";</script>';
?>
