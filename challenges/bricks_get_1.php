<?php
$page = array(
	'title' => 'GET Parameters',
	'app_src' => 'Bricks',
	'subtitle' => 'GET Vulnerability #1',
	'intro' => '',
	'body' => '',
	'help' => '',
	'output' => '',
	'scripts' => '',
	'required_db' => 'inject'
);

$page['intro'] .= "	<p>
						This challenge is a basic example of manipulating HTTP GET parameters to access information which 
						a particular user may not be intended to be able to view.
					</p>
					<p>
						For example, if a GET parameter is used to choose which user's information is fetched from a database, 
						changing the value manually can give might give access to sensitive information. In general, GET should 
						never be used for anything involving sensitive data.
					</p>
					<h4>
						To complete this challenge, the information relating to the user 'Wesley' must be read.
					</h4>";

require_once "./php/config_user.php";
$id = "";
if (isset($_GET['id'])) {
	$id = $_GET['id'];

} else {
	$id = 0;
}

$page['body'] .= "<div class='row'><div class='col-md-4 col-md-offset-4'><div class='box box-primary'>";
$page['body'] .= "<div class='box-body'>";
$page['body'] .= "<table class='table'><tbody>";
$sql = "SELECT * FROM users WHERE idusers=$id LIMIT 1";
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