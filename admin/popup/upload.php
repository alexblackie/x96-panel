<?php
	require "../../system-functions.php";
	require "../../protect.php";
	include('start.php');
?>
<h1>Upload a File</h1>
<p>Select a file from your hard drive below. <strong>Files are uploaded to <tt><?php echo siteurl()."/_files/uploads/"; ?></tt>.</strong></p>

<form enctype="multipart/form-data" action="upload-progress.php" method="POST">
	<input type="hidden" name="MAX_FILE_SIZE" value="1000000" />

	<strong>Choose a file to upload:</strong><br/>
	<input name="uploadedfile" type="file" /><br/>

	<input type="submit" class="button" value="Upload File" name="submit" />
</form>
<?php include('end.php'); ?>
