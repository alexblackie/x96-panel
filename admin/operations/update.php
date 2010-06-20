<h1>Check For Updates</h1>
<p>This is the automatic updater for X96 Panel. It is still a work-in-progress and may or may not work. <strong>It is HIGHLY recommended you backup your database before upgrading.</strong></p>
<?php
	$file = fopen ("http://cms.x96design.com/version.txt", "r");
	if (!$file) {
		echo "<p>Unable to open remote file.</p>";
		exit;
	}
	while (!feof ($file)) {
		$line = fgets ($file, 1024);
		if (version_num() == $line) {
?>
	<h2>Good Job - You're All up-to-date!</h2>
	<p>You're running the latest and greatest version of X96 Panel!</p>
<?php
		}
		elseif(version_num() > $line) {
?>
	<h2>Time To Upgrade!</h2>
	<p>A new version of X96 Panel is out! Please <a href="http://cms.x96design.com/download">download</a> it!</p>
<?php
		}
		elseif(version_num() < $line) {
?>
	<h2>Okay Then...</h2>
	<p>You seem to be running a version of X96 Panel that doesn't exist yet... Maybe a beta release?</p>
<?php
		}
	}
	fclose($file);
?>