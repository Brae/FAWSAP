<?php
$page = array(
	'title' => 'SQL Injection',
	'app_src' => 'FAWSAP',
	'subtitle' => 'Writing to a file',
	'intro' => '',
	'body' => '',
	'help' => '',
	'output' => '',
	'scripts' => '',
	'required_db' => 'challenges'
);

$page['intro'] .= "	<p>
						MySQL also allows for the creation of files on a web server, if the user logged into the server has 
						sufficient privileges. In addition, a folder must exist on the web server which has the permissions 
						set to allow write operations by the SQL user.
					</p>
					<p>
						In many cases it will be unlikely that these conditions are met. However, some web applications 
						may include functionality to upload files, for example as a profile picture or to be embedded in 
						a forum post. In these cases there may be an 'uploads' folder which has the needed permissions, and 
						a poorly configured SQL server may permit file creation.
					</p>
					<p>
						There is not always a need to write a file on the server, but there are instances where, in combination 
						with SQL injection to read files or other web app functionality (file inclusion for example), this may 
						allow an attacker to get feedback from the server where the attack would normally be blind or data 
						exfiltration impossible.
					</p>
					<p>
						As usual with any web server, permissions should always be set carefully and to the minimum needed to 
						permit the application to operate. In particular, the SQL user logged in through PHP scripts shouldn't 
						have access to any tables or operations it doesn't need.
					</p>
					<h4>
						The aim of this challenge is just to write the passwords from the users table into a file called 
						'dump.txt'.
					</h4>
				";

$page['body'] .= "<div class='row'><div class='col-md-4 col-md-offset-4'><div class='box box-primary'>";

$footer = '';
require_once './php/config_user.php';
if (isset($_POST['uname'])) {
	$sql = "SELECT uid, username FROM users WHERE username='{$_POST['uname']}' AND password='{$_POST['pass']}' LIMIT 1;";
	$result = mysqli_query($db_user, $sql) or die ($page['output'] .= "<p>PHP/MySQL error</p>");
	if ($result == true) {
		$footer ="<p>Result was true</p>";
	} else if (mysqli_num_rows($result) > 0) {
		$footer = "<p><b>You are now logged in</b></p>";
	}
} else {
	$footer = "<button type='submit' class='btn btn-primary'>Submit</button>";
}

$page['body'] .= "	<div class='box-header'>
						<h3 class='box-title'>Login</h3>
					</div>
					<form action='#' role='form' method='POST'>
						<div class='box-body'>
							<div class='form-group'>
								<label for='uname'>Username</label>
								<input type='text' class='form-control' name='uname' id='uname' size='15'>
							</div>
							<div class='form-group'>
								<label for='pass'>Password</label>
								<input type='password' class='form-control' name='pass' id='pass' size='15'>
							</div>
						</div>
						<div class='box-footer'>
							{$footer}
						</div>					
					</form>
				";



$page['body'] .= "</div></div></div>";

if (file_exists("uploads/dump.txt")) {
	if(strpos(file_get_contents("uploads/dump.txt"), "jKYp9Yv3MCR7660") != false) {
		$d = unlink("uploads/dump.txt");
		$page['scripts'] .= "	<script>
									var flag = 'jKYp9Yv3';
									var flag = flag + 'MCR7660';
									$('#answerbox').html(flag);
								</script>";
	}
	
}



?>