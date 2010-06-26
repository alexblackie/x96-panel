<?php
require "config.php"; // Require to have DB connection info
	if(isset($_GET['page'])){ //Is there a "?page" variable?
		$getpage = $_GET['page'];
		$sqlz = mysql_query("SELECT * FROM ".tableprefix()."pages WHERE `slug` = '$getpage'");
		$sqlzy = mysql_query("SELECT * FROM ".tableprefix()."pages WHERE `slug` = '$getpage'");
		$sql = mysql_query("SELECT * FROM ".tableprefix()."pages WHERE `slug` = '$getpage'");
		if(mysql_num_rows($sqlz) == 0){ //No database entry for page requested? Return "404"
			header("HTTP/1.0 404 Not Found");
			function the_content(){ //Echo 404 message
				echo '<p>The page you have requested could not be found!</p><p>Make sure that...</p><ul><li><strong>If you typed the URL yourself</strong>, all words are spelled correctly, and the page actually exists</li><li><strong>If you clicked on a link from a <em>different site</em></strong>, the link may be outdated. Please contact the owner of the site and inform them</li><li><strong>If you clicked on a link in <em>this site</em></strong>, please tell us about it.</li></ul>';
			}
			function the_title(){ //Echo 404 title
				echo '404 - Page Not Found';
			}
			function page_title(){ echo '404 - Not Found!'; }
		}
		else{ //Database rows returned for page requested?
			global $sqlz;
			global $sql;
			function the_title() { //echo page's title
				global $sqlz;
				while($row = mysql_fetch_array($sqlz)){
					echo $row[0];
				}
			}
			function the_content() { //echo page's content
				global $sql;
				while($rowz = mysql_fetch_array($sql)){
					echo $rowz[1];
				}
			}
			function page_title() { //echo page's title..
				global $sqlzy;
				while($rowy = mysql_fetch_array($sqlzy)){
					echo $rowy[0];
				}//End While
			}//End function
		}
	}
	function version_num() { //set version number of this release
		return "1.0.2";
	}
	function sitename(){ //Echo site name
		$sql3 = mysql_query("SELECT * FROM ".tableprefix()."system WHERE `function`='title'");
		while($row3 = mysql_fetch_array($sql3)){
			echo $row3[1];
		}
	} //end function
	function the_desc(){ //Echo site description
		$sql4 = mysql_query("SELECT * FROM ".tableprefix()."system WHERE `function`='desc'");
		while($row4 = mysql_fetch_array($sql4)){
			echo $row4[1];
		}
	} //end function
	function the_footer(){ //Echo the footer content
		$sql5 = mysql_query("SELECT * FROM ".tableprefix()."system WHERE `function`='footer'");
		while($row5 = mysql_fetch_array($sql5)){
			echo $row5[1];
		}
	} //end function
	function load_theme(){ //Load the theme (called from "index.php")
		$sql6 = mysql_query("SELECT * FROM ".tableprefix()."system WHERE `function`='theme'");
		while($row6 = mysql_fetch_array($sql6)){
			$theme = $row6[1];
		}
		require "_files/themes/".$theme."/index.php"; //make sure the theme has an index file...
	} //end function
	function siteurl(){ //RETURN site URL
		$sql8 = mysql_query("SELECT * FROM ".tableprefix()."system WHERE `function`='url'");
		while($row8 = mysql_fetch_array($sql8)){
			return $row8[1]; //RETURNS A VALUE!!
		}
	} //end function
	function stylesheet(){ //Echo URL directly to stylesheet
		$sql7 = mysql_query("SELECT * FROM ".tableprefix()."system WHERE `function`='theme'");
		while($row7 = mysql_fetch_array($sql7)){
			$themeurl = $row7[1];
		}
		echo siteurl()."/_files/themes/".$themeurl."/style.css";
	} //end function
	function themedir(){ //Echo theme directory URL
		$sql9 = mysql_query("SELECT * FROM ".tableprefix()."system WHERE `function`='theme'");
		while($row9 = mysql_fetch_array($sql9)){
			$themedir = $row9[1];
		}
		echo siteurl()."/_files/themes/".$themedir;
	} //end function
	function menu(){ //List all pages
		$sql01 = mysql_query("SELECT * FROM ".tableprefix()."pages ORDER BY `order`");
		while($menu = mysql_fetch_array($sql01)){
			$themenuitem = $menu[3];
			$fooarray = array(":", "!", "?", "<", ">", "(", ")", "%", "$", "#", "@", "*", "&", "^", "{", "}", "[", "]", "/", "\\", "'", "\"", "+", ".", ",", ";");
			$replaceit = str_replace($fooarray, "_", $themenuitem);
?>
	<?php if($_GET['page'] == $replaceit){ ?><li class="current-page"><?php } else { ?><li><?php } ?><a href="<?php echo siteurl(); ?>/<?php echo $menu[3]; ?>" id="<?php echo $replaceit; ?>"><?php echo $menu[0]; ?></a></li>
<?php
		}
	} //end function
	function themedirname(){
		//Echoes the directory name of the current theme. For example: if the theme was 'Default', this would echo 'default' (without quotes).
		$sqlex = mysql_query("SELECT * FROM ".tableprefix()."system WHERE `function` = 'theme'");
		while($rowrow = mysql_fetch_array($sqlex)){
			echo $rowrow[1];
		}
	} //end function
	function gotohome(){
		//Redirects the visitor to the homepage when no page is specified in the URL.
		if(!isset($_GET['page'])){
			header("Location: home");
		}
	} //end function
	function google_analytics(){
		//Echoes the Google Analytics tracking code if tracking is enabled.
		//Adds the tracking UA-ID automagically.
		$sql = mysql_query("SELECT * FROM ".tableprefix()."system WHERE  `function` = 'analytics'");
		while($row = mysql_fetch_array($sql)){
			$on = $row[1];
			if($on == 1){ //If Enabled...
				$sql = mysql_query("SELECT * FROM ".tableprefix()."system WHERE  `function` = 'analytics_code'");
				while($row = mysql_fetch_array($sql)){
					$ua_id = $row[1];
					// Echo code...
?>
<?php echo '
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push([\'_setAccount\', \''.$ua_id.'\']);
  _gaq.push([\'_trackPageview\']);

  (function() {
    var ga = document.createElement(\'script\'); ga.type = \'text/javascript\'; ga.async = true;
    ga.src = (\'https:\' == document.location.protocol ? \'https://ssl\' : \'http://www\') + \'.google-analytics.com/ga.js\';
    var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>';
				} //end while
			} //end if
		} //end while
	} //end function
	function x96_head(){
		//Outputs generator meta tag and syndication
?>
<meta name="generator" content="X96 Panel <?php echo version_num(); ?> (http://cms.x96design.com/)" />
<?php
	} //end function
	function admin_link(){
?>
	<div class="adminlink">
		<a href="<?php echo siteurl(); ?>/login.php">Log In</a>
	</div><!-- /adminlink -->
<?php
	}
	
$md5site = md5(siteurl());
?>
