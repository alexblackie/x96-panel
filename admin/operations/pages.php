<?php
	if(isset($_GET['delete'])){
		$delete_slug = $_GET['delete'];
?>
<?php
	echo '
<script type="text/javascript">
	var answer = confirm("Are you sure you want to delete that page?")
	if (answer){
		window.location = "?action=pages&msg=pagedeleted&deleted='.$delete_slug.'";
	}
	else{
		window.location = "?action=pages";
	}
</script>';
	}
	elseif(isset($_GET['edit'])){
		include("editor.php");
	}
	else{
		include("pagelist.php");
	}	
?>

