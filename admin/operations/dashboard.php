
	<div class="dashboxcontain">
		<h2 class="title stats"><div class="title-img">&nbsp;</div>Statistics</h2>
		<div class="dashbox">
<?php
$pages = mysql_query("SELECT * FROM ".tableprefix()."pages");
?>
			<table border="0" cellspacing="0" cellpadding="2" width="100%">
				<tbody>
					<tr>
						<td width="20%" style="border-bottom:1px solid #ccc; line-height:40px;"><big><big><big><big><strong><?php echohits(); ?></strong></big></big></big></big></td>
						<td width="80%" style="border-bottom:1px solid #ccc; line-height:40px;"><big><big>Website Hits</big></big></td>
					</tr>
					<tr>
						<td width="20%" style="border-bottom:1px solid #ccc; line-height:40px;"><big><big><big><big><strong><?php echo mysql_num_rows($pages); ?></strong></big></big></big></big></td>
						<td width="80%" style="border-bottom:1px solid #ccc; line-height:40px;"><big><big><a href="?action=pages">Page<?php if(mysql_num_rows($pages) == 1){} else{ echo 's'; } ?></a></big></big></td>
					</tr>
				</tbody>
			</table>
			<p>Web site URL: <tt><?php echo siteurl(); ?>/</tt></p>
			<img src="_files/themes/<?php themedirname(); ?>/thumb.png" alt="" width="80" height="47" style="float:left; margin:0 5px 0 0; background:#fff; border:1px solid #ccc; padding:3px;"/>
			<p style="float:left">
				<big><big><strong><?php themedirname(); ?></strong></big></big>
			</p>
			<a class="button" href="?action=theme" style="margin-left:6px;">Change Theme</a>
			<div style="clear:left"></div>
		</div><!-- /dashbox -->
	</div><!-- /dashboxcontain -->

