<form action="" method="post">
<div class="operationsbox">
	<div class="inside">
		<a href="admin/popup/upload.php" class="button" rel="popcorn"><img style="position:absolute; left:5px; top:4px;" src="admin/cosmetics/icons/attach.png" alt="Upload Icon" />Upload File</a>
		</div>
	<div class="line"></div>
	<div class="inside">
		<strong>Page Order #</strong> (<a href="admin/popup/page-order-num.php" rel="popcorn">?</a>)<br/>
		<input type="text" name="order" value="0" id="order" style="width:30px;text-align:center;" />
	</div><!-- /inside -->
	<div class="submitarea">
		<input type="submit" value="Create Page" name="subnew" class="button" />
	</div>
</div><!-- /operationsbox -->
<div class="rapops">
	<input type="text" tabindex="1" name="new-title" style="font-size:25px; width:500px; display:block;" value="New Page Title" /><br/>
	<input type="text" tabindex="2" name="slug" value="example-url" style="width:150px; display:inline-block;" /> &lsaquo; URL of new page (a-z and 0-9 only, please)<br/><br/>
	<textarea id="richEditor" class="richEditor" tabindex="3" name="newcontent" style="height: 370px; width: 100%;"></textarea>
</form>
</div>
