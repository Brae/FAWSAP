<?php

$page = array(
	'title' => 'SQL Injection',
	'app_src' => 'FAWSAP',
	'subtitle' => 'Reading a file',
	'intro' => '',
	'body' => '',
	'help' => '',
	'output' => '',
	'scripts' => '',
	'required_db' => 'inject'
);

$page['intro'] .= "	<p>
						MySQL includes functions to enable the reading and writing of files on the server. If set up
						correctly, access permissions and protection against SQL injection attacks should prevent
						any unintended access to the filesystem, but in some cases it can be possible to read very
						sensitive information.
					</p>
					<p>
						In this challenge, the aim is to read the flag.txt file in the server's root html directory.
					</p>";

$page['body'] .= "<div class='row'><div class='col-md-4 col-md-offset-4'><div class='box box-primary'>";

				
require_once './php/config_user.php';	
if (isset($_POST['uname'])) {
	$sql = "SELECT idusers, name, lang FROM users WHERE name='{$_POST['uname']}' AND password='{$_POST['pass']}' LIMIT 1;";
	$result = mysqli_query($db_user, $sql) or die($page['output'] .= "<p>PHP/MySQL error</p>");
	if (mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_assoc($result);
		$page['body'] .= "	<div class='box-body'>
								<p>Welcome {$row['name']}</p>
							</div>";
	}
	
} else {
	$page['body'] .= "	<div class='box-header'>
							<h3 class='box-title'>
								Login
							</h3>
						</div>";
	$page['body'] .= "	<form action='#' role='form' method='POST'>
							<div class='box-body'>
								<div class='form-group'>
									<label for='uname'>Username</label>
									<input type='text' class='form-control' name='uname' id='uname' size='15'>
								</div>
								<div class='form-group'>
									<label for='pass'>Password</label>
									<input type='password' class='form-control' name='pass' id='pass' placeholder='' size='15'>
								</div>
							</div>
							<div class='box-footer'>
								<button type='submit' class='btn btn-primary'>Submit</button>
							</div>
						</form>";
}
$page['body'] .= "</div></div></div>";
?>