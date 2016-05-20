<?php
$page = array(
	'title' => 'SQL Injection',
	'app_src' => 'FAWSAP',
	'subtitle' => 'Getting more information about the SQL server',
	'intro' => '',
	'body' => '',
	'help' => '',
	'output' => '',
	'scripts' => '',
	'required_db' => 'inject'
);

$page['intro'] .= "	<p>
						There are special tables within the structure of a MySQL server which store information relating to 
						table names etc. which the current user has access to.
					</p>
					<p>
						This can be an extremely useful source of information while crafting an SQL injection attack, removing 
						the guesswork from the process of finding which tables may contain useful information worth targetting.
					</p>
					<h4>
						For this challenge, complete it by dumping the database names accessible to the user logged in through 
						the web page's PHP.
					</h4>
					";
					
$page['body'] .= "<div class='row'><div class='col-md-4 col-md-offset-4'><div class='box box-primary'>";

$footer = '';
require_once './php/config_user.php';
if (isset($_POST['uname'])) {
	$sql = "SELECT idusers, name, lang FROM users WHERE name='{$_POST['uname']}' AND password='{$_POST['pass']}' LIMIT 1;";
	$result = mysqli_query($db_user, $sql) or die ($page['output'] .= "<p>PHP/MySQL error</p>");
	if (mysqli_num_rows($result) > 0) {
		$footer = "<p><b>You are now logged in</b></p>";
		if (strpos($_POST['uname'], "schema_name") != false && strpos($_POST['uname'],"information_schema.schemata") != false) {
			$page['scripts'] .= "	<script>
									var flag = 'jKYp9Yv3';
									var flag = flag + 'MCR7660';
									$('#answerbox').html(flag);
								</script>";
		} else if (strpos($_POST['pass'], "schema_name") != false && strpos($_POST['pass'],"information_schema.schemata") != false) {
			$page['scripts'] .= "	<script>
									var flag = 'jKYp9Yv3';
									var flag = flag + 'MCR7660';
									$('#answerbox').html(flag);
								</script>";
		}
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

?>