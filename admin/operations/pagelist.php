<table cellspacing="0" cellpadding="3" width="100%" class="itemtable">
<tbody>	
<tr>
	<th><big>Page Name</big></th>
	<th><big>Last Modified</big></th>
	<th><big>Operations</big></th>
</tr>
<?php
$listpgz = mysql_query("SELECT * from ".tableprefix()."pages ORDER BY `last_mod` DESC");
while($pg = mysql_fetch_array($listpgz)){
?>
<tr class="table-row" id="<?php echo $pg[3]; ?>">
	<td width="50%" style="border-right:1px solid #ccc; border-bottom:1px solid #ccc; padding-left:8px;">
		<?php echo $pg[0]; ?>
	</td>
	<td width="30%" style="padding-left:5px; border-right:1px solid #ccc; border-bottom:1px solid #ccc;">
		<?php echo $pg[2]; ?>
	</td>
	<td width="20%" style="padding-left:5px; border-bottom:1px solid #ccc;">
		<a class="editbut" href="?action=pages&edit=<?php echo $pg[3]; ?>" title="Edit Page"><img src="admin/cosmetics/icons/edit.png" style="padding-top:4px;" alt="Edit" /></a> &nbsp; 
		<a class="previewbut" href="<?php echo siteurl(); ?>/?page=<?php echo $pg[3]; ?>" title="View Page"><img src="admin/cosmetics/icons/view.png" style="padding-top:4px;" alt="View" /></a> &nbsp; 
		<a class="deletebut" href="?action=pages&delete=<?php echo $pg[3]; ?>" title="Delete"><img src="admin/cosmetics/icons/delete.png" style="padding-top:4px;" alt="Delete" /></a>
	</td>
</tr>
<?php
}//End While

?>

</tbody>
</table>
