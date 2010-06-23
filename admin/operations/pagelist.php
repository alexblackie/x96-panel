<p><strong>Note:</strong> Pages are ordered the same as they will appear in the site's menu.</p>
<table cellspacing="0" cellpadding="3" width="100%" class="itemtable">
<tbody>	
<tr>
	<th width="95%">Page Name</th>
	<th width="5%"> </th>
</tr>
<?php
$listpgz = mysql_query("SELECT * from ".tableprefix()."pages ORDER BY `order` ASC");
while($pg = mysql_fetch_array($listpgz)){
$pagename = $pg[3];
?>
<tr class="table-row" id="<?php echo $pg[3]; ?>">
	<td width="60%">
		<a class="editlink" href="?action=pages&edit=<?php echo $pg[3]; ?>" title="Edit &quot;<?php echo $pg[0]; ?>&quot;"><?php echo $pg[0]; ?></a>
	</td>
	<td width="10%">
<?php
	if($pagename == "home"){ echo ""; }
	else {
?><a class="delx" href="?action=pages&delete=<?php echo $pg[3]; ?>" title="Delete">X</a>
<?php } ?>
	</td>
</tr>
<?php
}//End While

?>

</tbody>
</table>
