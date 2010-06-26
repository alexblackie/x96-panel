<?php
	if(isset($_POST['subupdate'])){ //Has the form been submitted?
		$title = $_POST['edit-title'];
		$content = $_POST['editor1'];
		$slug = $_POST['slug'];
		$slugget = $_GET['edit'];
		$ordernum = $_POST['order'];
		mysql_query("DELETE FROM ".tableprefix()."pages WHERE `slug`='$slugget'"); //delete old row
		mysql_query("INSERT INTO ".tableprefix()."pages VALUES('$title', '$content', CURRENT_TIMESTAMP, '$slug', '$ordernum')"); //insert new one
		echo '<script type="text/javascript">window.location="?action=pages&edit='.$slug.'&msg=updated";</script>';
	}
	function filename(){ //Page title
		$page_slug = $_GET['edit'];
		$getname = mysql_query("SELECT * FROM ".tableprefix()."pages WHERE `slug`='$page_slug'");
		while($pgeditnm = mysql_fetch_array($getname)){
			echo $pgeditnm[0];
		}
	}
	function page_content(){ //page content
		$page_slug = $_GET['edit'];
		$getname = mysql_query("SELECT * FROM ".tableprefix()."pages WHERE `slug`='$page_slug'");
		while($pgeditnm = mysql_fetch_array($getname)){
			echo $pgeditnm[1];
		}
	}
	function getordernum() { //Order Number
		$page_slug = $_GET['edit'];
		$getname = mysql_query("SELECT * FROM ".tableprefix()."pages WHERE `slug`='$page_slug'");
		while($pgeditnm = mysql_fetch_array($getname)){
			echo $pgeditnm[4];
		}
	}
?>
<form action="" method="post">
<div class="operationsbox">
	<div class="inside">
		<a href="admin/popup/upload.php" class="button" rel="popcorn"><img style="float:left; border:none; margin:6px 5px 0 0;" src="admin/cosmetics/icons/attach.png" alt="Upload Icon" />Upload File</a>
	</div><!-- /inside -->
	<div class="line"></div>
	<div class="inside">
		<strong>Page Order #</strong> (<a href="admin/popup/page-order-num.php" rel="popcorn">?</a>)<br/>
		<input type="text" name="order" value="<?php getordernum(); ?>" id="order" style="width:30px;text-align:center;" />
	</div><!-- /inside -->
	<div class="submitarea">
		<input type="submit" value="Save Page" name="subupdate" class="button" />
	</div><!-- /submitarea -->
</div><!-- /operationsbox -->
<div class="rapops">
	<input type="text" value="<?php filename(); ?>" name="edit-title" tabindex="1" style="font-size:25px; width:500px; display:block;" />
	<?php if($_GET['edit'] == "home"){
		echo '<input type="hidden" value="home" name="slug" />You cannot edit the URL of the homepage.<br/>';
	}
	else{ ?>
	<input type="text" value="<?php echo $_GET['edit']; ?>" name="slug" tabindex="2" style="display:inline-block; width:100px;" />&lsaquo; URL of page<br/>
	<?php
		}
	?>
<br/>
	<textarea id="richEditor" class="richEditor" name="editor1" style="height: 370px; width: 100%;" tabindex="3"><?php page_content(); ?></textarea>
</form>
</div><!-- /rapops -->
