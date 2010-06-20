<?php
	if(isset($_POST['submit'])){ //Save button submitted?
	
	//Save all settings:
	
		mysql_query("UPDATE ".tableprefix()."system SET `value` = '".$_POST['title']."' WHERE `function` = 'title'");
		mysql_query("UPDATE ".tableprefix()."system SET `value` = '".$_POST['sitedesc']."' WHERE `function` = 'desc'");
		mysql_query("UPDATE ".tableprefix()."system SET `value` = '".$_POST['sitefooter']."' WHERE `function` = 'footer'");
		mysql_query("UPDATE ".tableprefix()."system SET `value` = '".$_POST['siteuri']."' WHERE `function` = 'url'");
		mysql_query("UPDATE ".tableprefix()."system SET `value` = '".$_POST['enablega']."' WHERE `function` = 'analytics'");
		mysql_query("UPDATE ".tableprefix()."system SET `value` = '".$_POST['ua_id']."' WHERE `function` = 'analytics_code'");
		mysql_query("UPDATE ".tableprefix()."system SET `value` = '".$_POST['enableeditor']."' WHERE `function` = 'editor'");
		echo '<script type="text/javascript">window.location="?action=settings&msg=settingsupdated";</script>'; //redirect to success message
		$posturl = $_POST['siteuri'];
		//Update .htaccess with site URI
		$ourFileName = "../.htaccess";
		$ourFileHandle = fopen($ourFileName, 'w') or die("User Configuration Failed!");
		$stringData = "\n\n## Start X96 Panel ##\n\nRewriteEngine on\nRewriteCond %{REQUEST_URI} !(\.[^./]+)$\nRewriteCond %{REQUEST_fileNAME} !-d\nRewriteCond %{REQUEST_fileNAME} !-f\nRewriteRule (.*) /$posturl/?page=$1 [L]\nRewriteCond %{THE_REQUEST} ^[A-Z]{3,9}\ /$posturl/([^?]+\?)+page=\ HTTP\nRewriteRule ^(.+)\?page=$ /$posturl/$1 [R=301,L]\n\n## End X96 Panel ##";
		fwrite($ourFileHandle, $stringData);
		fclose($ourFileHandle);
		chmod("../.htaccess", 0666);
	}
	function gaenabled(){ //Google Analytics enabled?
		$sql = mysql_query("SELECT * FROM ".tableprefix()."system WHERE `function` = 'analytics'");
		while($row = mysql_fetch_array($sql)){
			return $row[1];
		}
	}
	function getua(){ //Get UA-ID (Google Analytics)
		$sql = mysql_query("SELECT * FROM ".tableprefix()."system WHERE `function` = 'analytics_code'");
		while($row = mysql_fetch_array($sql)){
			echo $row[1];
		}
	}
?>

<form action="" method="post">
	<h2>Site Name</h2>
	<div style="padding-left:30px;">
		<input type="text" value="<?php sitename(); ?>" name="title" style="display:block; font-size:20px; width:600px;" />
	</div>
	<h2>Site URL</h2>
	<div style="padding-left:30px;">
		<strong>DO NOT put a slash ("/") at the end of the URL!</strong> Doing so will cause errors in your web site.
		<input type="text" name="siteuri" style="display:block; width:600px;" value="<?php echo siteurl(); ?>"/>
	</div>
	<h2>Site Description</h2>
	<div style="padding-left:30px;">
		<input type="text" name="sitedesc" style="display:block; width:600px;" value="<?php the_desc(); ?>"/>
	</div>
	<h2>Footer Info</h2>
	<div style="padding-left:30px;">
		<textarea name="sitefooter" id="textarea3" class="richEditor" style="width:600px; height:50px"><?php the_footer(); ?></textarea>
	</div>
	<h2>Google Analytics</h2>
	<div style="padding-left:30px;">
		<small>* This requires you to have a <a href="http://www.google.com/analytics/" target="_blank">Google Analytics</a> account.</small><br/>
		<input type="radio" value="1" name="enablega" <?php if(gaenabled() == 1){ echo 'checked'; } ?> /> Enable<br/>
		<input type="radio" value="0" name="enablega" <?php if(gaenabled() == 0){ echo 'checked'; } ?> /> Disable<br/>
		<strong>Tracking Account ID (<a href="admin/popup/ua_tracking_id.html" rel="popcorn">?</a>)</strong><br/>
		<input type="text" value="<?php getua(); ?>" name="ua_id" size="30" />
	</div>
	<h2>Rich Text Editor</h2>
	<div style="padding-left:30px;">
		<small>Turning the rich text editor off means you'll have to edit raw HTML code when creating or editing pages.</small><br/>
		<input type="radio" value="1" name="enableeditor" <?php if(editorenabled() == 1){ echo 'checked'; } ?> /> Enable<br/>
		<input type="radio" value="0" name="enableeditor" <?php if(editorenabled() == 0){ echo 'checked'; } ?> /> Disable<br/>
	</div>
	<p>&nbsp;</p>
	<input class="button" type="submit" value="Save Settings" name="submit" style="width:200px; text-align:center;" />

</form>

