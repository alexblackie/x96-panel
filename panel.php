<?php
	if(!isset($_GET['action'])){ //no action defined?
		header("location: ?action=dashboard"); //Go to dashboard
	}
	require "system-functions.php"; //require system functions
	require "protect.php"; // Make sure logged in.
	if(isset($_GET['edit'])){ 
		$getpage = $_GET['edit'];
	}
	if(isset($_GET['msg'])){
		if($_GET['msg'] == "pagedeleted"){
			$delete_slug = $_GET['deleted'];
			mysql_query("DELETE FROM `".tableprefix()."pages` WHERE `slug` = '$delete_slug' LIMIT 1");
		}
	}
	if(isset($_POST['subnew'])){
		$title = $_POST['new-title'];
		$content = $_POST['newcontent'];
		$slug = $_POST['slug'];
		$order = $_POST['order'];
		mysql_query("INSERT INTO ".tableprefix()."pages VALUES('$title', '$content', CURRENT_TIMESTAMP, '$slug', '$order')");
		echo '<script type="text/javascript">window.location="?action=pages&edit='.$slug.'&msg=created";</script>';
	}
	function editorenabled(){ //Rich text editor (TinyMCE) enabled?
		$sql = mysql_query("SELECT * FROM ".tableprefix()."system WHERE `function` = 'editor'");
		while($row = mysql_fetch_array($sql)){
			return $row[1];
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
	<title>X96 Panel &ndash; Logged In</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="admin/cosmetics/admin.css" type="text/css" media="screen" />
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
	<script type="text/javascript" src="admin/scripts/jquery.effects.js"></script>
	<script type="text/javascript" src="admin/scripts/jquery.popup.js"></script>
	<script type="text/javascript">
	jQuery(document).ready(function($) {
		$("a[rel*=popcorn]").popupWindow({
			height:500,
			width:500,
			centerBrowser:1
		});
	});
	</script>
<?php
if(isset($_GET['action'])){
	$fooarray = array(":", "!", "?", "<", ">", "(", ")", "%", "$", "#", "@", "*", "&", "^", "{", "}", "[", "]", "/", "\\", "'", "\"", "+", ".", ",", ";");
	$getname = $_GET['action'];
	$replaceit = str_replace($fooarray, "_", $getname);
	echo '<script type="text/javascript">
$(document).ready(function(){
$(".menu a#'.$replaceit.'").addClass("current");
});
</script>
';
}
?>
	<!--[if IE]>
		<style type="text/css">.ieonly { display:block!important; }</style>
	<![endif]-->
</head>
<body>
	<div class="topbox">
		<div id="logo">
			<a href="panel.php?action=dashboard"><?php sitename(); ?> &ndash; Administration</a>
		</div><!-- /logo -->
		<a class="button" href="<?php echo siteurl(); ?>/"><img src="admin/cosmetics/icons/home.png" alt="View Site Icon" style="float:left; padding:5px 5px 0 0; margin-left:-12px" />Visit Site</a> &nbsp;
		<a href="login.php?log_out" class="button"><img src="admin/cosmetics/icons/error.png" alt="Logout Icon" style="float:left; padding:6px 5px 0 0; margin-left:-12px" />Log Out</a>
	</div><!-- /topbox -->
	<div class="wrap">
<?php
	if(file_exists('install/')){
?>
		<div class="msg" style="background-color:#F6B9B9; font-weight:bold; border-color:#E18484; color:#C32724;">
			<h3 style="text-shadow:0 1px 0 #FFCFCF;">Install Directory Still Exists!</h3>
			Please delete the install directory! If you don't, someone could compromise your website!<br/>
		</div><!-- /msg -->
<?php
	}
?>
		<div class="sidebar">
			<div class="menu">
				<a id="dashboard" class="dashboard" href="?action=dashboard"><div class="menu-img">&nbsp;</div>Dashboard</a>
				<a class="pages" href="?action=pages"><div class="menu-img">&nbsp;</div>Pages</a>
				<ul class="submenu">
					<li><a id="pages" href="?action=pages">Manage Pages</a></li>
					<li><a id="newpage" href="?action=newpage">Create New Page</a></li>
				</ul>
				<a class="files" href="?action=files"><div class="menu-img">&nbsp;</div>Files</a>
				<ul class="submenu">
					<li><a href="admin/popup/upload.php" rel="popcorn">Upload New File</a></li>
					<li><a id="files" href="?action=files">Manage Files</a></li>
				</ul>
				<a class="settings" href="?action=settings"><div class="menu-img">&nbsp;</div>Settings</a>
				<ul class="submenu">
					<li><a id="settings" href="?action=settings">Site Settings</a></li>
					<li><a id="update" href="?action=update">Check for Updates</a></li>
				</ul>
				<a id="theme" class="theme" href="?action=theme"><div class="menu-img">&nbsp;</div>Theme</a>
				<a class="logout" href="login.php?log_out"><div class="menu-img">&nbsp;</div>Log Out</a>
			</div><!-- /menu -->
		</div><!-- /sidebar -->
		<div class="content">
<?php
	if(isset($_GET['msg'])){
		echo '<div class="msg">';
		if($_GET['msg'] == "pagedeleted"){
			echo '<img class="msgicon" src="admin/cosmetics/icons/check.png" alt="Checkmark Icon" /><strong>Page Deleted</strong><br/>The page has been deleted. It is not recoverable.';
		}
		elseif($_GET['msg'] == "updated"){
			echo '<img style="border:none; margin:0 5px -3px 0; display:inline;" src="admin/cosmetics/icons/check.png" alt="Checkmark Icon" /><strong>Page has been updated successfully.</strong>';
		}
		elseif($_GET['msg'] == "created"){
			echo '<img class="msgicon" src="admin/cosmetics/icons/check.png" alt="Checkmark Icon" /><strong>Page has been created successfully.</strong>';
		}
		elseif($_GET['msg'] == "settingsupdated"){
			echo '<img class="msgicon" src="admin/cosmetics/icons/check.png" alt="Checkmark Icon" /><strong>The site settings and information has been updated.</strong>';
		}
		elseif($_GET['msg'] == "deletedinstall"){
			echo '<img class="msgicon" src="admin/cosmetics/icons/check.png" alt="Checkmark Icon" /><strong>The <tt>install</tt> directory has been successfully removed.</strong>';
		}
		elseif($_GET['msg'] == "filedeleted"){
			echo '<img class="msgicon" src="admin/cosmetics/icons/check.png" alt="Checkmark Icon" /><strong>File has been deleted successfully.</strong>';
		}
		echo '</div><!-- /msg -->';
	}
?>
<?php
	if(editorenabled() == 0){
?>
	<style type="text/css">
		textarea { font:normal 14px/21px "Courier New", monospace; color:#000; padding:0.6em }
	</style>
<?php
	}
	else{
?>
	<script type="text/javascript" src="admin/scripts/tiny_mce/tiny_mce.js"></script>
	<script type="text/javascript">
		tinyMCE.init({
			theme : "advanced",
			mode : "specific_textareas",
			editor_selector : "richEditor",
			skin : "o2k7",
			skin_variant : "silver",
			plugins : "inlinepopups,style,iespell,emotions,print,media,fullscreen,table,preview, searchreplace,wordcount",
			theme_advanced_buttons1: "undo, redo, |, bold, italic, underline, |, justifyleft, justifycenter, justifyright, |, link, unlink, |, cut, copy, pastetext,pasteword,selectall, |, sub, sup, |, formatselect",
			theme_advanced_buttons2 : "tablecontrols, deletecol, deleterow, merge_cells, row_before, row_after, col_before, col_after",
			theme_advanced_buttons3 : "bullist, numlist, |, outdent, indent, |, image, |, blockquote, | removeformat, |, code",
			theme_advanced_disable : "styleselect",
			theme_advanced_path_location : "bottom",
			theme_advanced_toolbar_location : "top",
			plugin_preview_width : "500",
			plugin_preview_height : "600",
			paste_auto_cleanup_on_paste : true,
			paste_preprocess : function(pl, o) {
					// Content string containing the HTML from the clipboard
					alert(o.content);
			},
			paste_postprocess : function(pl, o) {
					// Content DOM node containing the DOM structure of the clipboard
					alert(o.node.innerHTML);
			},
			theme_advanced_blockformats : "p,h1,h2,h3,h4,blockquote"
		});
	</script>
<?php
}


	if($_GET['action'] == "dashboard"){
		include("admin/operations/dashboard.php");
	}
	elseif($_GET['action'] == "settings"){
		include("admin/operations/settings.php");
	}
	elseif($_GET['action'] == "pages"){
		include("admin/operations/pages.php");
	}
	elseif($_GET['action'] == "newpage"){
		include("admin/operations/newpage.php");
	}
	elseif($_GET['action'] == "theme"){
		include('admin/operations/theme-manager.php');
	}
	elseif($_GET['action'] == "files"){
		include('admin/operations/file-manager.php');
	}
	elseif($_GET['action'] == "update"){
		include('admin/operations/update.php');
	}
	else {
		echo '<h1>Action Not Recognized!</h1><p>The action you have requested, <em>'.$_GET['action'].'</em>, is not available, or doesn\'t exist. Please make sure you clicked the navigation buttons to the left, and not typed the URL manually.</p><br/><p>If this problem persists, please <a href="http://cms.x96design.com/help/" target="_blank">post in our forums</a> and tell us of this error.</p>';
	}
?>
		</div><!-- /content -->
		<div class="clear">&nbsp;</div>
		<div class="footer">
			Developed by <a href="http://x96design.com/" target="_blank">X96 Design</a> with help from <a href="http://cms.x96design.com/docs/Contributors" target="_blank">some others</a>.<br/>
			<a href="http://cms.x96design.com/" target="_blank">Project Website</a> &bull; <a href="http://cms.x96design.com/docs" target="_blank">Documentation</a> &bull; <a href="http://cms.x96design.com/license" target="_blank">License</a>
		</div><!-- /footer -->
	</div><!-- /wrap -->
</body>
</html>
