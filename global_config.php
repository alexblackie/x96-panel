<?php
	// The global config file. This is where all the defines are as well as a
	// bunch of other stuff like database connection and functions.
	
	// Set the database host
	// Don't change unless you KNOW that it's not localhost
	define("APP_DB_HOST", "localhost");
	
	// Set the database username
	// The username to connect to the database.
	define("APP_DB_USER", "x96cms");
	
	// Set the database user password
	// The password for the user set above.
	define("APP_DB_PASS", "password");
	
	// Set the database name
	// The name of the database.
	define("APP_DB_NAME", "x96cms");
	
	// Set the base directory (the directory the app is located in, relative to
	// the website domain's root) Ex: /mysite/
	define("APP_BASEDIR", "/x96cms/trunk/");
	
	############################ Stop Editing Now ############################
	
	// Now to connect to the database...
	mysql_connect(APP_DB_HOST, APP_DB_USER, APP_DB_PASS);
	
	// Now to select the database...
	mysql_select_db(APP_DB_NAME);
	
	// Require that we have the functions so we can actually do stuff with the app.
	require "system/functions.php";