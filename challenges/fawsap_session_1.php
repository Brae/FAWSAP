<?php
$page = array(
	'title' => 'Session flaws',
	'app_src' => 'FAWSAP',
	'subtitle' => 'Gaining Admin privileges',
	'intro' => '',
	'body' => '',
	'help' => '',
	'output' => '',
	'scripts' => '',
	'required_db' => 'fawsap'
);

$page['intro'] .= "	<p>
						Sessions are extremely common in web applications, being used for many things including authentication, 
						user preferences and settings. Sessions can be established in most web-based languages, but PHP is most 
						often used to handle user authentication with a server.
					</p>
					<p>
						This most commonly takes the form of a user entering their login details, these being confirmed with a 
						database, and if correct a session being established for the user so that they can navigate around the 
						application and have their login persists across the page loads. Their access rights are often also 
						stored within the session, so that pages can check if they have access to certain resources without further 
						database queries and authentication processes.
					</p>
					<h4>
						The aim of this challenge is to manipulate the way the session is created to login as an administrative user.
					</h4>";
					
$page['body'] .= "<div class='row'><div class='col-md-4 col-md-offset-4'>";
require_once ('php/config_user.php');
if (isset($_GET['uname']) && isset($_GET['action'])) {
	// Creds have been 'confirmed' and session should be established for the username
	// Just check the username is valid
	if ($_GET['action'] == 'create') {
		$param = urldecode($_GET['uname']);
		$sql = "SELECT name,admin FROM users WHERE name='".$param."';";
		$result = mysqli_query($db_user,$sql);
		if ($result == FALSE) {
			$page['body'] .= "	<div class='box box-solid box-warning'>
									<div class='box-header'>
										<h3>Woops!</h3>
									</div>
									<div class='box-body'>
										<p>No user was found for that name</p>
									</div>
								</div>";
			
		} else if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_assoc($result);
			$_SESSION['chall_user_login'] = $row['name'];
			$_SESSION['chall_user_admin'] = $row['admin'];
			$text = '';
			if ($_SESSION['chall_user_admin'] == 1) {
				$text = ' are ';
			} else {
				$text = ' are not ';
			}
			
			$page['body'] .= "	<div class='box box-solid box-success'>
									<div class='box-header'>
										<h3>Welcome back ".$_SESSION['chall_user_login']."</h3>
									</div>
									<div class='box-body'>
										<p>You".$text."an admin.</p>
										<p>Returning to home page shortly...</p>
									</div>
								</div>";
								
			$page['scripts'] .= "	<script>
										var t = setTimeout(function() {
											window.location.href='./challenge.php';
										}, 5000);
									</script>";
			
			
		} else {
			$page['body'] .= "	<div class='box box-solid box-warning'>
									<div class='box-header'>
										<h3>Woops!</h3>
									</div>
									<div class='box-body'>
										<p>No user was found for that name</p>
									</div>
								</div>";
		}
	} else if ($_GET['action'] == 'login') {
		// Login has been attempted, verify the credentials
		// If valid, pass uname to page with action value to create 'session;
		$uname = $_POST['uname'];
		$pass = $_POST['password'];
	
	
		$stmt = $db_user->prepare('SELECT name, admin FROM users WHERE name= ? AND password= ? LIMIT 1;');
		$stmt->bind_param('ss', $uname, $pass);
		$stmt->execute();
		$stmt->bind_result($col_name, $col_admin);
		$stmt->fetch();
		if (!is_null($col_name) && !is_null($col_admin)) {
			header('Location: ./challenge.php?uname='.$col_name.'&action=create');
		} else {
			$page['body'] .= "	<div class='box box-solid box-warning'>
									<div class='box-header'>
										<h3>Woops!</h3>
									</div>
									<div class='box-body'>
										<p>The username or password you entered was incorrect. Please try again</p>
									</div>
									<div class='box-footer text-center'>
										<a href='./challenge.php' class='btn btn-default'>Go back</a>
									</div>
								</div>";
		}
			
	} else {
		$page['body'] .= "	<div class='box box-solid box-warning'>
									<div class='box-header'>
										<h3>Woops!</h3>
									</div>
									<div class='box-body'>
										<p>Unrecognised action!</p>
										<p>Only accepts: create, login</p>
									</div>
								</div>";
	}
	
} else if (isset($_SESSION['chall_user_login'])) {
	$text = '';
	if ($_SESSION['chall_user_admin'] == 1) {
		$text = '<p>Done.</p><p>PZi8UTDvy49S</p>';
	} else {
		$text = '<p>No admin rights</p>';
	}
	$page['body'] .= "<div class='box box-solid box-success'>
									<div class='box-header'>
										<h3>Welcome back ".$_SESSION['chall_user_login']."</h3>
									</div>
									<div class='box-body'>
										".$text."
									</div>
								</div>";
	unset($_SESSION['chall_user_login']);
	unset($_SESSION['chall_user_admin']);

	

} else {
	// Nothing has been done yet. Display the form for logging in
	$page['body'] .= "<div class='box box-primary'>";
	
	$page['body'] .= "	<div class='box-header'>
							<h3 class='box-title'>Login</h3>
						</div>
						<form role='form' action='./challenge.php?uname=&action=login' method='POST'>
							<div class='box-body'>
								<div class='form-group'>
									<input class='form-control' type='text' name='uname' placeholder='Username' size='15'>
								</div>
								<div class='form-group'>
									<input class='form-control' type='password' name='password' placeholder='Password' size='15'>
								</div>
							</div>
							<div class='box-footer'>
								<button type='submit' class='btn btn-primary'>Submit</button>
							</div>
						</form>";
						
	$page['body'] .= "</div>";
}




$page['body'] .= "</div></div>";


?>