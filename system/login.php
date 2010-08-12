<?php
	session_start();
	if(isset($_POST['submit'])){
		// If the login form's been submitted
		
	}
	else {
		// Nothing been submitted?
?>
<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Please Log In &rsaquo; X96 CMS</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" href="includes/style.css" type="text/css" media="screen" />
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
	</head>
	
	<body>
		<div class="login">
		
			<h2>Please Log In</h2>
			
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
						</tbody>
					</table>
				</fieldset>
			</form>
		
		</div><!-- end .wrapper -->
	</body>

</html>
<?php
	}