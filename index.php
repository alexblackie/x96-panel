<?php
if(!file_exists('config.php')){
	header("Location: install/");
}
require "system-functions.php";
load_theme();
?>
