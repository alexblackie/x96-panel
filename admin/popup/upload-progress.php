<?php
	if(isset($_POST['submit'])){ //Submitted?
		$target_path = "../../_files/uploads/"; //uploads folder path (relative)
		$target_path = $target_path . basename( $_FILES['uploadedfile']['name']); //?
		if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
			echo "<div style=\"background:#fffcde; color:#000; font:normal 13px/18px Arial, sans-serif; padding:8px; border:1px solid #fff000; -moz-border-radius:5px; -webkit-border-radius:5px; display:block; width:600px; margin:15% auto 10px;\">The file <tt>".  basename( $_FILES['uploadedfile']['name']). 
			"</tt> has been uploaded!</div>"; //Success message
			$fileurl = $target_path;
			chmod($fileurl, 0666); //Change permissions so it's read/write-able
		}
		else{
			echo "<div style=\"background:#fffcde; color:#000; font:normal 13px/18px Arial, sans-serif; padding:8px; border:1px solid #fff000; -moz-border-radius:5px; -webkit-border-radius:5px; display:block; width:600px; margin:15% auto 10px;\">There was an error uploading the file, please <a href=\"../panel.php?action=files\">try again</a>!<br/><br/>This could be because the file was too large. Try making the filesize smaller; if it's an image, try resizing it to a smaller size.</div>";//Error...
		}
		echo "<p>You can now close this window.</p>";
	}
	else { echo '<h1>Something didn\'t work!</h1>'; }
?>
