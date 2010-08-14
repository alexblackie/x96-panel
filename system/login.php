<?php
	// Always start a session...
	session_start();

	if(isset($_GET['logout'])) {
		// Are we logging out?
		
		// Unset the session...
		unset($_SESSION['login']);
		
		// Redirect
		header("Location: ?msg=loggedout");
	}
	
	// Require the DB connection details
	require "../global_config.php";
	require "admin-general.php";
	
	if(isset($_POST['submit'])){
		// If form was submitted...


	}
	else {
		// Nothing been submitted?
?>
<?php 
	loadHead("Please Log In", "login");
?>			
			<div class="title">
				Please log in!
			</div>
<?php
	if(isset($_GET['msg'])) {
		echo "<div class=\"msg\">";
		if($_GET['msg'] == "loginfailed") {
			echo "Login Failed. Please check your username &amp; password.";
		}
		echo "</div><!-- end .msg -->";
	}
?>
			<div class="padding">
				<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
					<fieldset>
						<table width="100%" cellspacing="0" border="0">
							<tbody>
								<tr>
									<td width="30%">
										<label for="user">Username</label>
									</td>
									<td width="70%">
										<input type="text" name="user" id="user" />
									</td>
								</tr>
								<tr>
									<td width="30%">
										<label for="pass">Password</label>
									</td>
									<td width="70%">
										<input type="password" name="pass" id="pass" />
									</td>
								</tr>
								<tr>
									<td width="30%"></td>
									<td width="70%">
										<input type="submit" name="submit" id="submit" value="Log In" class="button" />
									</td>
								</tr>
							</tbody>
						</table>
					</fieldset>
				</form>
			</div><!-- end .padding -->
<?php
		loadFoot();
	}