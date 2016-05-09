<?php
$page = array(
	'title' => 'GET Parameters',
	'title_separator' => ' :: ',
	'app_src' => '',
	'subtitle' => 'GET Vulnerability #1',
	'body' => '',
	'help' => '',
	'output' => '',
	'scripts' => '',
	'page_id' => '',
	'required_db' => 'inject'
);
$page['page_id'] = 'sqli';

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