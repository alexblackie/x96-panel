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
print("<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"itemtable\" width=\"100%\">\n");
print("<tr><th width=\"75%\">Filename</th><th width=\"25%\">Operations</th></tr>\n");
// loop through the array of files and print them all
// ************ NEED TO CLEAN UP THIS MESS ************
for($index=0; $index < $indexCount; $index++) {
        if (substr("$dirArray[$index]", 0, 1) != "."){

        	if(strpos($dirArray[$index], "index.php") === false){
		print("<tr class=\"table-row\">");
		print("<td width=\"70%\" style=\"padding:0 0 0 8px; border-bottom:1px solid #ccc; border-right:1px solid #ccc;\">$dirArray[$index]</td>");
		print("<td width=\"30%\" style=\"border-bottom:1px solid #ccc; padding-left:5px; text-align:center\">");
		print("<a href=\"".siteurl()."/_files/uploads/$dirArray[$index]\" style=\"margin-right:8px;\"><img src=\"admin/cosmetics/icons/view.png\" alt=\"Open\" title=\"Open File\" width=\"16\" height=\"16\" style=\"padding-top:5px;\" /></a> <a href=\"?action=files&del=$dirArray[$index]\"><img src=\"admin/cosmetics/icons/delete.png\" alt=\"Delete\" title=\"Delete\" width=\"16\" height=\"16\" style=\"padding-top:5px;\" /></a>");
		print("</td");
		print("</tr>\n");
			}
			else {}
		}
}
?>
<?php
print("</table>\n");
?>
