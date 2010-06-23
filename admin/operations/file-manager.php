<?php
	if(isset($_GET['del'])){ //deleting a file?
		$delete_slug = $_GET['del'];
		echo '
<script type="text/javascript">
	var answer = confirm("Are you sure you want to delete that file?")
	if (answer){
		window.location = "?action=files&msg=filedeleted&delete='.$delete_slug.'";
	}
	else{
		window.location = "?action=files";
	}
</script>'; //are you sure you want to delete?
	}
	if(isset($_GET['delete'])){ //YES - user clicked "OK" on confirmation dialogue
		$file = $_GET['delete'];
		unlink("_files/uploads/".$file); //unlink it.
	}
// open this directory 
$myDirectory = opendir("_files/uploads/");

// get each entry
while($entryName = readdir($myDirectory)) {
	$dirArray[] = $entryName;
}

// close directory
closedir($myDirectory);

//	count elements in array
$indexCount	= count($dirArray);
//print ("<span style=\"color:#cc0000; font-size:130%;\">$indexCount files</span><br/>\n");

// sort 'em
sort($dirArray);

// print 'em
?>
<table border="0" cellpadding="0" cellspacing="0" class="itemtable files" width="100%">
	<tr>
		<th width="45%">Filename</th>
		<th width="50%">URL</th>
		<th width="5%"> </th>
	</tr>
<?php
// loop through the array of files and print them all
for($index=0; $index < $indexCount; $index++) {
        if (substr("$dirArray[$index]", 0, 1) != "."){

        	if(strpos($dirArray[$index], "index.php") === false){
?>
	<tr class="table-row">
		<td width="45%">
			<?php print("$dirArray[$index]"); ?>
		</td>
		<td width="50%">
			<code><?php echo siteurl()."/_files/uploads/"; print("$dirArray[$index]"); ?></code>
		</td>
		<td width="5%" class="delcol">
			<a href="?action=files&del=<?php print("$dirArray[$index]"); ?>" class="delx">X</a>
		</td>
	</tr>
<?php
			}
			else {}
		}
}
?>
<?php
print("</table>\n");
?>
