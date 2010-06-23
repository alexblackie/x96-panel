<?php
	if(isset($_POST['themedir'])){ //updated?
		$themedir = $_POST['themedir'];
		mysql_query("UPDATE `".tableprefix()."system` SET `value` = '$themedir' WHERE `function` = 'theme'") or die("Something went horribly wrong! The theme was not changed.");
		echo '<div class="msg"><strong>Theme Updated.</strong><br/><a href="'.siteurl().'/home">View Site</a></div>';
	}
?>
<h1>Change the Site's Theme</h1>
<p><strong>Current theme is <em><?php themedirname(); ?></em>.</strong></p>
<p>Upload site themes into the <tt>_files/themes/</tt> directory and they'll show up here. Click on a theme to activate it.</p>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="themechange">
<ul class="themelist">
<?php
// directory path can be either absolute or relative
$dirPath = '_files/themes';

// open the specified directory and check if it's opened successfully
if ($handle = opendir($dirPath)) {

	// keep reading the directory entries 'til the end
	while (false !== ($file = readdir($handle))) {

		// just skip the reference to current and parent directory
		if ($file != "." && $file != "..") {
			if (is_dir("$dirPath/$file")) {
				// found a directory, do something with it?
				echo '<li>
<a href="#" onclick="themechange.themedir.value=\''.$file.'\'; submitform(); return false">
<img src="';
				if(file_exists('_files/themes/'.$file.'/thumb.png')){ echo '_files/themes/'.$file.'/thumb.png'; } else { echo 'admin/cosmetics/thumb_missing.png'; }
				echo '" alt="" width="180" height="106" /><br/>
'.$file.'<br/><small style="line-height:1.6em">Click to change theme</small></a>
</li>
';
			} else {
		        // found an ordinary file
				// Don't do nothin' with 'em.
			}
		}
	}

	// ALWAYS remember to close what you opened
	closedir($handle);
}
?>
</ul>
<div class="clear" style="margin-bottom:20px;"></div>
	<input type="hidden" value="<?php themedirname(); ?>" name="themedir" /><br/>
</form>
<script type="text/javascript">
	function submitform(){
		document.themechange.submit();
	}
</script>
