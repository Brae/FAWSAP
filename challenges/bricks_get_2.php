<?php
$page = array('title' => 'GET Parameters', 'app_src' => 'Bricks', 'subtitle' => 'GET Vulnerability #2', 'intro' => '', 'body' => '', 'help' => '', 'output' => '', 'scripts' => '', 'required_db' => 'inject');

$page['intro'] .= "	<p>
							This challenge involves manipulating the values passed as HTTP GET parameters to access information
							within a database.
						</p>
						<p>
							In some cases, it may not be immediately obvious how the GET value relates to the information
							 displayed. This challenge requires you to work out what the GET variable is, and what it relates to.
						</p>
						<h4>To complete the challenge, dump the password for the user account 'Wesley'. Some information is 
						provided below to get started.</h4>
						<ul>
							<li>The initial query is <code>SELECT * FROM users WHERE idusers=\$id LIMIT 1</code></li>
							";

require_once "./php/config_user.php";
$id = 0;
if (isset($_GET['id'])) {
	$id = $_GET['id'];
}


$page['body'] .= "<div class='row'><div class='col-md-4 col-md-offset-4'><div class='box box-primary'>";
$page['body'] .= "<div class='box-body'>";
$page['body'] .= "<table class='table'><tbody>";
$sql = "SELECT * FROM users WHERE idusers={$id} LIMIT 1";
$result = mysqli_query($db_user, $sql);
if ($content = mysqli_fetch_assoc($result)) {
	$page['body'] .= "<tr><td><b>User ID</b></td><td>" . $content['idusers'] . "</td></tr>";
	$page['body'] .= "<tr><td><b>Username</b></td><td>" . $content['name'] . "</td></tr>";
	$page['body'] .= "<tr><td>E-mail</b></td><td>" . $content['email'] . "</td></tr>";
} else if (!$result) {
	echo "Database query failed!";
} else {
	echo "Error! User does not exist.";
}
$page['body'] .= "</tbody></table></div></div></div></div>";
?>